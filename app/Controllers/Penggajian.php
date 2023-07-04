<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Penggajian extends BaseController
{
    protected $pegawaiModel;
    protected $presensiModel;
    protected $penggajianModel;
    protected $chatModel;
    protected $userModel;

    public function __construct()
    {
        $this->pegawaiModel = new \App\Models\User();
        $this->presensiModel = new \App\Models\presensiModel();
        $this->penggajianModel = new \App\Models\penggajianModel();
        $this->chatModel = new \App\Models\ChatModel();
        $this->userModel = new \App\Models\User();
    }

    public function hitungGaji()
    {
        $hariIni = new Time('now', 'Asia/Jakarta', 'id_id');

        $namaBulan = $hariIni->format('m');

        // ambil data nama karyawan dari tabel user join dengan tabel presensi group by nama count jam masuk
        $pegawai = $this->pegawaiModel->join('presensi', 'presensi.id_pegawai = user.id_user')->where('month(presensi.tanggal_presensi)', $namaBulan)->findAll();
        // mengubah data array dan menghitung jumlah jam masuk

        $penggajian = [];

        foreach ($pegawai as $p) {
            $jamMasuk = Time::parse($p['waktu_masuk']);
            $jamKeluar = Time::parse($p['waktu_keluar']);
            $jamKerjaHarian = $jamMasuk->difference($jamKeluar)->getHours();
            ($p['ket'] == 'terlambat') ? $terlambat = 1 : $terlambat = 0;
            ($p['info'] == 'sakit') ? $sakit = 1 : $sakit = 0;

            $hariMasuk = $this->jamKerja()['kerja_sampai_hari_ini'];
            $totalHariKerja = $this->jamKerja()['hari_kerja_sebulan'];

            // masukkan data ke array baru jika nama berbeda
            if (!array_key_exists($p['id_pegawai'], $penggajian)) {

                $penggajian[$p['id_pegawai']] = [
                    'id_pegawai' => $p['id_pegawai'],
                    'nama' => $p['username'] . '(' . $p['jabatan'] . ')',
                    'gaji' => $p['gaji'],
                    'jam_kerja' => $jamKerjaHarian,
                    'telat' => $terlambat,
                    'sakit' => $sakit,
                    'masuk' => $hariMasuk - $sakit,
                ];
            } else {
                $penggajian[$p['id_pegawai']]['jam_kerja'] += $jamKerjaHarian;
                $penggajian[$p['id_pegawai']]['telat'] += $terlambat;
                $penggajian[$p['id_pegawai']]['sakit'] += $sakit;
                $penggajian[$p['id_pegawai']]['masuk'] = $hariMasuk - $sakit;
            }
        }
        // foreach lagi untuk menambah gaji sekarang
        foreach ($penggajian as $p) {
            $penggajian[$p['id_pegawai']]['gaji_sekarang'] =  - ($p['telat'] * 10000) + ($p['masuk'] * $p['gaji'] / $totalHariKerja);
        }

        return $penggajian;
    }

    // menampilkan data seluruh jam kerja karyawan selama satu bulan
    public function index()
    {
        if (session()->get('jabatan') == 'hrd') {

            $hariIni = new Time('now', 'Asia/Jakarta', 'id_id');

            $penggajian = $this->hitungGaji();
            // cek apakah bulan ini sudah pernah approve
            $approve = $this->penggajianModel->where('month(tgl)', $hariIni->getMonth())->first();
            (is_null($approve)) ? $approve = '' : $approve = 'hidden';

            // $dataPegawai=nama,gaji,totaljam kerja, gaji sekarang
            $data = [
                'title' => 'Penggajian',
                'kerja' => $this->jamKerja(),
                'penggajian'    => $penggajian,
                'approve' => $approve,
            ];
            return view('penggajian/index', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function jamKerja()
    {
        $hariIni = new Time('now', 'Asia/Jakarta', 'id_id');
        $namaBulan = $hariIni->format('m');

        // hitung hari dalam bulan kecuali hari jumat
        $hariKerjaSebulan = 0;
        $MasukSampaiHariIni = 0;

        for ($i = 1; $i <= $hariIni->format('t'); $i++) {
            $hari = new Time($hariIni->format('Y') . '-' . $namaBulan . '-' . $i, 'Asia/Jakarta', 'id_id');
            if ($hari->format('D') != 'Fri') {
                if ($hari <= $hariIni) {
                    $MasukSampaiHariIni++;
                }
                $hariKerjaSebulan++;
            }
        }

        $value = [
            'hari_kerja_sebulan' => $hariKerjaSebulan,
            'kerja_sampai_hari_ini' => $MasukSampaiHariIni,
        ];
        return $value;
    }

    public function approveGaji() //berikan message ke bos
    {
        if (session()->get('jabatan') == 'hrd') {

            $pencatat = session()->get('id');
            $data = $this->request->getVar('data');

            // insert data ke tabel penggajian
            $tgl = Time::now('Asia/Jakarta', 'id_id')->toDateTimeString();
            $bulan = Time::parse($tgl, 'Asia/Jakarta', 'id_id')->toLocalizedString('MMMM');
            $tahun = Time::parse($tgl, 'Asia/Jakarta', 'id_id')->toLocalizedString('YYYY');

            foreach ($data as $d) {
                $this->penggajianModel->save([
                    'tgl' => $tgl,
                    'gaji_pokok' => str_replace(['.', 'Rp'], '', $d['2']),
                    'jam_kerja' => $d['4'],
                    'gaji' => str_replace(['.', 'Rp'], '', $d['7']),
                    'id_user' => $d['0'],
                    'terlambat' => $d['5'],
                    'sakit' => $d['6'],
                    'pencatat' => $pencatat,
                    'status' => 0,
                    'masuk' => $d['3'],
                ]);
            }
            // kirim chat berisi link laporan ke bos

            $messageForBos = '<a href="/penggajian/approveBos/' . $bulan . '" >Laporan Gaji Bulan ' . $bulan . ' ' . $tahun . '</a>';
            $this->chatModel->sendMessage($pencatat, 1, $messageForBos);


            $response = [
                'success' => true,
                'data' => $data,
            ];
            return $this->response->setJSON($response);
        } else {
            return redirect()->to('/dashboard');
        }
    }
    public function approveBos($bulan) //berikan message ke karyawan
    {
        // 2023-06-26 23:49:36
        if (session()->get('jabatan') == 'bos') {
            $penggajian = $this->userModel->join('penggajian', 'penggajian.id_user=user.id_user')->where('month(tgl)', Time::parse('01-' . $bulan . '-2023', 'Asia/Jakarta', 'id_id')->getMonth())->findAll();
            // cek apakah penggajian kosong
            if (empty($penggajian)) {
                return redirect()->to('/dashboard');
            }
            $approve = '';
            ($penggajian[0]['status'] == 0) ? $approve = '' : $approve = 'hidden';
            $data = [
                'title' => 'Laporan Gaji Bulan ' . $bulan . ' ' . Time::now('Asia/Jakarta', 'id_id')->toLocalizedString('YYYY'),
                'penggajian' => $penggajian,
                'kerja' => $this->jamKerja(),
                'tgl' => Time::parse($penggajian[0]['tgl'], 'Asia/Jakarta', 'id_id')->toLocalizedString('d MMMM YYYY HH:mm:ss'),
                'tglDb' => $penggajian[0]['tgl'],
                'approve' => $approve,
            ];
            // dd($data);
            return view('penggajian/approveBos', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }

    public function beriSlip($tgl)
    {
        // update penggajian menggunakan SQL query
        $berhasil = $this->penggajianModel->db->query("UPDATE penggajian SET status=1 WHERE tgl='$tgl'");

        // ambil data semua  id user 
        $id_user = $this->penggajianModel->select('id_user')->where('tgl', $tgl)->findAll();

        foreach ($id_user as $id) {
            $id_user = $id['id_user'];
            // kirim chat berisi link slip gaji ke karyawan
            $messageForKaryawan = '<a href="/penggajian/slipGaji/' . $tgl . '/' . $id_user . '" >Slip Gaji Bulan ' . Time::parse($tgl, 'Asia/Jakarta', 'id_id')->toLocalizedString('MMMM YYYY') . '</a>';
            $this->chatModel->sendMessage(1, $id_user, $messageForKaryawan);
        }


        if ($berhasil) {
            session()->setFlashdata('alert', 'success');
        } else {
            session()->setFlashdata('alert', 'gagal');
        }
        return redirect()->to('/penggajian/approveBos/' . Time::parse($tgl, 'Asia/Jakarta', 'id_id')->toLocalizedString('MMMM'));
    }

    public function slipGaji($tgl, $id)
    {
        if (session()->get('jabatan') == 'bos' || session()->get('id') == $id) {
            $penggajian = $this->userModel->join('penggajian', 'penggajian.id_user=user.id_user')->where('tgl', $tgl)->where('penggajian.id_user', $id)->first();
            $bulan = Time::parse($tgl, 'Asia/Jakarta', 'id_id')->toLocalizedString('MMMM YYYY');
            $pencatat =  $this->userModel->where('id_user', $penggajian['pencatat'])->first()['username'];
            $data = [
                'title' => 'Slip Gaji Bulan ' . $bulan,
                'penggajian' => $penggajian,
                'tgl' => Time::parse($penggajian['tgl'], 'Asia/Jakarta', 'id_id')->toLocalizedString('d MMMM YYYY'),
                'kerja' => $this->jamKerja(),
                'bulan' => $bulan,
                'pencatat'  => $pencatat,
            ];
            return view('penggajian/slipGaji', $data);
        }
        return redirect()->to('/dashboard');
    }
}

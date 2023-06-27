<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
    // menampilkan data seluruh jam kerja karyawan selama satu bulan
    public function index()
    {
        if (session()->get('jabatan') == 'hrd') {

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

                // masukkan data ke array baru jika nama berbeda
                if (!array_key_exists($p['id_pegawai'], $penggajian)) {
                    $penggajian[$p['id_pegawai']] = [
                        'id_pegawai' => $p['id_pegawai'],
                        'nama' => $p['username'] . '(' . $p['jabatan'] . ')',
                        'gaji' => $p['gaji'],
                        'jam_kerja' => $jamKerjaHarian,
                        'telat' => $terlambat,
                        'sakit' => $sakit,
                    ];
                } else {
                    $penggajian[$p['id_pegawai']]['jam_kerja'] += $jamKerjaHarian;
                    $penggajian[$p['id_pegawai']]['telat'] += $terlambat;
                    $penggajian[$p['id_pegawai']]['sakit'] += $sakit;
                }
            }
            // foreach lagi untuk menambah gaji sekarang
            foreach ($penggajian as $p) {
                $penggajian[$p['id_pegawai']]['gaji_sekarang'] = $p['gaji'] - ($p['telat'] * 10000) - ($p['sakit'] * $p['gaji'] / 25);
            }

            // cek apakah bulan ini sudah pernah approve
            $approve = $this->penggajianModel->where('month(tgl)', $hariIni->getMonth())->first();
            (is_null($approve)) ? $approve = '' : $approve = 'hidden';

            // $dataPegawai=nama,gaji,totaljam kerja, gaji sekarang
            $data = [
                'title' => 'Penggajian',
                'jam_kerja' => $this->jamKerja(),
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
        // hitung jumlah hari jumat bulan ini untuk menentukan jam kerja
        $hariIni = new Time('now', 'Asia/Jakarta', 'id_id');
        $namaBulan = $hariIni->format('m');
        // looping untuk menghitung jumlah hari jumat
        $hariJumat = 0;
        for ($i = 1; $i <= $hariIni->getDay(); $i++) {
            $hari = Time::parse($hariIni->format('Y-m') . '-' . $i);
            if ($hari->format('D') == 'Fri') {
                $hariJumat++;
            }
        }
        $jamKerja = 8 * ($hariIni->getDay() - $hariJumat);
        $stringJamKerja = $jamKerja . ' jam (8 jam x ' . ($hariIni->getDay() - $hariJumat) . ' hari)';

        return $stringJamKerja;
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
                    'gaji_pokok' => str_replace(['.', 'Rp'], '', $data[0]['2']),
                    'jam_kerja' => $d['3'],
                    'gaji' => str_replace(['.', 'Rp'], '', $data[0]['4']),
                    'id_user' => $d['0'],
                    'terlambat' => $d['5'],
                    'sakit' => $d['6'],
                    'pencatat' => $pencatat,
                    'status' => 0,
                ]);
            }
            // kirim chat berisi link laporan ke bos

            $messageForBos = '<a href="/penggajian/approveBos/' . $bulan . '" >Laporan Gaji Bulan ' . $bulan . ' ' . $tahun . '</a>';
            $this->chatModel->sendMessage($pencatat, 1, $messageForBos);


            $response = [
                'success' => true,
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
            $penggajian = $this->userModel->join('penggajian', 'penggajian.id_user=user.id_user')->where('month(tgl)', Time::parse('01-' . $bulan . '-2023', 'Asia/Jakarta', 'id_id')->getMonth())->where('status', 0)->findAll();
            // cek apakah penggajian kosong
            if (empty($penggajian)) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'title' => 'Laporan Gaji Bulan ' . $bulan . ' ' . Time::now('Asia/Jakarta', 'id_id')->toLocalizedString('YYYY'),
                'penggajian' => $penggajian,
                'jam_kerja' => $this->jamKerja(),
                'tgl' => Time::parse($penggajian[0]['tgl'], 'Asia/Jakarta', 'id_id')->toLocalizedString('d MMMM YYYY HH:mm:ss')
            ];
            // dd($data);
            return view('penggajian/approveBos', $data);
        } else {
            return redirect()->to('/dashboard');
        }
    }
}

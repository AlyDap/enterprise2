<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;


class Penggajian extends BaseController
{
    protected $pegawaiModel;
    protected $presensiModel;

    public function __construct()
    {
        $this->pegawaiModel = new \App\Models\User();
        $this->presensiModel = new \App\Models\presensiModel();
    }
    // menampilkan data seluruh jam kerja karyawan selama satu bulan
    public function index()
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
        // $dataPegawai=nama,gaji,totaljam kerja, gaji sekarang
        $data = [
            'title' => 'Penggajian',
            'jam_kerja' => $stringJamKerja,
            'penggajian'    => $penggajian,
        ];

        return view('penggajian/index', $data);
    }
}

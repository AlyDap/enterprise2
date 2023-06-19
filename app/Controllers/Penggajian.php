<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penggajian extends BaseController
{
    // menampilkan data seluruh jam kerja karyawan selama satu bulan
    public function index()
    {
        $data = [
            'title' => 'Penggajian'
        ];
        // butuh data nama, gaji, dan jam kerja,terlambat,sakit, gaji bulan ini
        // $data['pegawai'] = $this->pegawaiModel->findAll();
        // $data['absen'] = $this->absenModel->findAll();

        return view('penggajian/index', $data);
    }
}

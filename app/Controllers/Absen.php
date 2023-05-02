<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Absen extends BaseController
{
    public function index()
    {
        $data['title'] = 'Absen';
        return view('absen', $data);
    }

    public function presensi()
    {
        //tangkap data form
        $nama = $this->request->getPost('nama');
        $foto = $this->request->getFile('image');
        dd($nama, $foto);
    }
}

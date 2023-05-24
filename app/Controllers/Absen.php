<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Absen extends BaseController
{
    protected $presensiModel;

    public function __construct()
    {
        $this->presensiModel = new \App\Models\presensiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Absensi',
            'absen' => $this->presensiModel->where('id_pegawai', session()->get('id'))->findAll(),
        ];
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

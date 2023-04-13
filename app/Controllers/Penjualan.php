<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    public function __construct()
    {
        $this->penjualanModel = new \App\Models\penjualan();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('penjualan/index', $data);
    }

    public function tampol()
    {
        $data = [
            'title' => 'PENJUALAN',
            // Menampilkan daftar user
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/tampol', $data);
    }
}

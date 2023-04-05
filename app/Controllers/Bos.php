<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Bos extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('bos/index', $data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];
        return view('bos/produk', $data);
    }

    public function mitra()
    {
        $data = [
            'title' => 'Mitra'
        ];
        return view('bos/mitra', $data);
    }

    public function bahan()
    {
        $data = [
            'title' => 'Bahan'
        ];
        return view('bos/bahan', $data);
    }
}

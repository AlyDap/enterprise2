<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('penjualan/index', $data);
    }
}
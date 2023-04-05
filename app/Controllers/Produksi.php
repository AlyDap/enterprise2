<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Produksi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('produksi/index', $data);
    }
}
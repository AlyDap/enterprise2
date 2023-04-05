<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Gudang extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('gudang/index', $data);
    }
}
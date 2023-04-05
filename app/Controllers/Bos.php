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
}
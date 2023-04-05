<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Finance extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('finance/index', $data);
    }
}
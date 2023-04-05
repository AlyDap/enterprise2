<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Hrd extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('hrd/index', $data);
    }
}
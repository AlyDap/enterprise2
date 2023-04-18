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
}

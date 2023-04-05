<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        //cek dulu jabatannya
        // bos, penjualan, finance, hrd, gudang, produksi
        $session = session();
        $jabatan = $session->get('jabatan');
        if ($jabatan == 'bos') {
            return redirect()->to('bos');
        } else if ($jabatan == 'penjualan') {
            return redirect()->to('penjualan');
        } else if ($jabatan == 'finance') {
            return redirect()->to('finance');
        } else if ($jabatan == 'hrd') {
            return redirect()->to('hrd');
        } else if ($jabatan == 'gudang') {
            return redirect()->to('gudang');
        } else if ($jabatan == 'produksi') {
            return redirect()->to('produksi');
        } else {
            return redirect()->to('home');
        }
    }
}

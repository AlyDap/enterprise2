<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DetailPenjahitan;
use App\Models\Penjahitan;

class Produksi extends BaseController
{
    protected $jahit;
    protected $detailjahit;
    public function __construct()
    {
        $this->jahit = new Penjahitan();
        $this->detailjahit = new DetailPenjahitan();
    }
    public function index()
    {
        $model = new Penjahitan();

        $data = [
            'title' => 'Dashboard'
        ];
        $grafik = $model->getTotalProduksiBatik();
        $data['grafik'] = $grafik;
        return view('produksi/index', $data);
    }
    public function penjahitan()
    {
        $data = [
            'title' => 'penjahitan',
            // Menampilkan daftar user
            'users' => $this->jahit->findAll()
        ];
        return view('produksi/penjahitan', $data);
    }
    public function detailPenjahitan($id)
    {
        // $penjualanModel = new Penjualan_();
        // $detailpenjualanModel = new DetailPenjualan();
        // $produkModel = new Produk();
        $data['penjahitan'] = $this->jahit->findAll();
        // $data['produk'] = $produkModel->findAll();
        $data['details'] = $this->detailjahit->where('no_penjahitan',$id)->findAll();
       
        $data ['title'] = 'detail';

        return view('produksi/detailpenjahitan', $data);
    }

}
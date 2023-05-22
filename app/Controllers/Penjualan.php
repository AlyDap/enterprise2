<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DetailPenjualan;
use App\Models\Penjualan as ModelsPenjualan;
use App\Models\Penjualan_model;
use App\Models\Produk;

helper('form');

class Penjualan extends BaseController
{
    protected $penjualanModel;
    protected $produkModel;
    public function __construct()
    {
        $this->penjualanModel = new Penjualan_model();
        $this->produkModel = new Produk();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('penjualan/index', $data);
    }

    public function tampol()
    {
        $data = [
            'title' => 'PENJUALAN',
            // Menampilkan daftar user
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/tampol', $data);
    }
    
    public function tambahPenjualan()
    {
        $data = [
            'title' => 'Input Penjualan',
            'produk' => $this->produkModel->getProduk()
        ];
        return view('penjualan/tambahpenjualan', $data);
    }

    public function storePenjualan()
    {
        $data = array(
            'id_penjualan' => $this->request->getPost('id_penjualan'),
            'total_bayar' => $this->request->getPost('total_bayar'),
            'id_user' => $this->request->getPost('id_user')
        );
        
        $model = new Penjualan_model();
        $simpan = $model->insertPenjualan($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah penjualan');
            return redirect()->to(base_url('penjualan/tampol'));
        }

    }

    public function DetailPenjualan($id)
    {
        $penjualanModel = new DetailPenjualan();
        $produkModel = new Produk();
        $data['title'] = 'detail penjualan';
        $data['details'] = $penjualanModel->where('id_penjualan',$id)->findAll();
        $data['produk'] = $produkModel->findAll();

        return view('penjualan/detail_penjualan', $data);
    }

    public function storeDetailPenjualan()
    {
        $detailPenjualanModel = new DetailPenjualan();

        $data = [
            'id_penjualan' => $this->request->getPost('id_penjualan'),
            'id_produk' => $this->request->getPost('id_produk'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total' => $this->request->getPost('total'),
        ];

        $detailPenjualanModel->insert($data);

        return redirect()->to('/penjualan');
    }
    public function get_harga_produk()
{
    $id_produk = $this->request->getPost('id_produk');
    $produkModel = new Produk();
    $produk = $produkModel->find($id_produk);

    $data = [
        'harga' => $produk['biaya_jual'],
        'stok' => $produk['jumlah']
    ];

    return $this->response->setJSON($data);
}

}

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
    protected $detailPenjualan;
    public function __construct()
    {
        $this->penjualanModel = new Penjualan_model();
        $this->produkModel = new Produk();
        $this->detailPenjualan = new DetailPenjualan();
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
    public function coba()
    {
        $data = [
            'title' => 'COBA',
            // Menampilkan daftar user
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/coba', $data);
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
        $penjualanModel = new Penjualan_model();
        $detailpenjualanModel = new DetailPenjualan();
        $produkModel = new Produk();
        $data['penjualan'] = $penjualanModel->findAll();
        $data['produk'] = $produkModel->findAll();
        $data['details'] = $detailpenjualanModel->where('id_penjualan', $id)->findAll();

        $data['title'] = 'detail';

        return view('penjualan/detail_penjualan', $data);
    }

    public function storeDetailPenjualan()
    {
        $detailPenjualanModel = new DetailPenjualan();
        // masukkan data penjualan dulu baru detail
        $this->penjualanModel->insert(['id_user' => session('id')]);
        // ambil id terbaru
        $idPenjualan = $this->penjualanModel->ambilIdTerbaru();
        $data = [
            [
                'id_penjualan' => $idPenjualan[0]['id_penjualan'],
                'id_produk' => $this->request->getPost('id_produk'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total' => $this->request->getPost('total'),
            ]
        ];
        $data2 = [
            'id_penjualan' => $idPenjualan[0]['id_penjualan'],
        ];
        // dd($data2);
        $totalBayar = intval($this->request->getPost('total'));
        $detailPenjualanModel->insertBatch($data);
        $this->penjualanModel->update($data2, ['total_bayar' => strval($totalBayar)]);
        // $data2 = array(
        //     'total_bayar' => $this->request->getPost('total'),
        // );
        // dd($data2);
        // $this->penjualanModel->updatePenjualan( $data2 ,$idPenjualan);

        return redirect()->to('/penjualan/tampol');
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

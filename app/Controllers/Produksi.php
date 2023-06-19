<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DetailPenjahitan;
use App\Models\Penjahitan;
use App\Models\Penjahit;
use App\Models\Bahan;
use App\Models\Produk;

helper('form');

class Produksi extends BaseController
{
    protected $produkModel;
    protected $bahanModel;
    protected $penjahitModel;
    protected $jahit;
    protected $detailjahit;
    public function __construct()
    {
        $this->produkModel = new Produk();
        $this->bahanModel = new Bahan();
        $this->penjahitModel = new Penjahit();
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
        $data['details'] = $this->detailjahit->where('no_penjahitan', $id)->findAll();

        $data['title'] = 'detail';

        return view('produksi/detailpenjahitan', $data);
    }

    public function tambahProduksi()
    {
        $data = [
            'title' => 'Input Produksi',
            'produk' => $this->produkModel->getProduk(),
            'bahan' => $this->bahanModel->getBahan(),
            'penjahit' => $this->penjahitModel->getPenjahit(),
        ];
        return view('produksi/tambahproduksi', $data);
    }

    public function storeProduksi()
    {
        $data = array(
            'no_penjahitan' => $this->request->getPost('no_penjahitan'),
            'id_penjahit' => $this->request->getPost('id_penjahit'),
            'total_bayar' => $this->request->getPost('total_bayar'),
            'id_bahan' => $this->request->getPost('id_bahan'),
            'id_user' => $this->request->getPost('id_user')
        );

        $model = new Penjahitan();
        $simpan = $model->insertPenjahitan($data);
        if ($simpan) {
            $this->storeDetailProduksi();
            session()->setFlashdata('success', 'Berhasil Menambah Produksi');
            return redirect()->to(base_url('produksi/penjahitan'));
        }
    }

    public function storeDetailProduksi()
    {
        $detailPenjahitanModel = new DetailPenjahitan();
        // masukkan data penjualan dulu baru detail
        // $this->jahit->insert(['id_user' => session('id')]);
        // ambil id terbaru
        $noPenjahitan = $this->jahit->ambilIdTerbaru();
        $data = [
            [
                'no_penjahitan' => $noPenjahitan[0]['no_penjahitan'],
                'id_produk' => $this->request->getPost('id_produk'),
                'ukuran' => $this->request->getPost('ukuran'),
                'jumlah' => $this->request->getPost('jumlah'),
                'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            ]
        ];
        $data2 = [
            'no_penjahitan' => $noPenjahitan[0]['no_penjahitan'],
        ];
        // dd($data2);
        $totalBayar = intval($this->request->getPost('biaya_produksi'));
        $detailPenjahitanModel->insertBatch($data);
        $this->jahit->update($data2, ['total_bayar' => strval($totalBayar)]);
        // $data2 = array(
        //     'total_bayar' => $this->request->getPost('total'),
        // );
        // dd($data2);
        // $this->penjualanModel->updateProduksi( $data2 ,$noPenjahitan);
        // session()->setFlashdata('success', 'Berhasil Menambah Produksi');
        // return redirect()->to(base_url('produksi/penjahitan'));
    }
    public function get_harga_produk()
    {
        $id_produk = $this->request->getPost('id_produk');
        $produkModel = new Produk();
        $produk = $produkModel->find($id_produk);

        $data = [
            'harga' => $produk['biaya_produksi'],
            'stok' => $produk['jumlah'],
            'ukuran' => $produk['ukuran'],
        ];

        return $this->response->setJSON($data);
    }
}

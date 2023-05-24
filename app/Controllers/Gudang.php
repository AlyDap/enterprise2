<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Database\Migrations\Bahan;
use App\Models\DetailPembelian;
use App\Models\Bahan;
use App\Models\Pembelian;
use App\Models\Mitra;

helper('form');

class Gudang extends BaseController
{
    protected $pembelianModel;
    protected $mitraModel;
    protected $detailPembelian;
    public function __construct()
    {
        $this->pembelianModel = new Pembelian();
        $this->mitraModel = new Mitra();
        $this->detailPembelian = new DetailPembelian();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('gudang/index', $data);
    }

    public function tampil()
    {
        $data = [
            'title' => 'PEMBELIAN',
            // Menampilkan daftar user
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/tampil', $data);
    }

    public function tambahPembelian()
    {
        $data = [
            'title' => 'Input Pembelian',
            'mitra' => $this->mitraModel->getMitra()
        ];
        return view('gudang/tambahpembelian', $data);
    }

    public function storePembelian()
    {
        $data = array(
            'no_pembelian' => $this->request->getPost('no_pembelian'),
            'total_bayar' => $this->request->getPost('total_bayar'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_user' => $this->request->getPost('id_user')
        );

        $model = new Pembelian();
        $simpan = $model->insertPembelian($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Pembelian');
            return redirect()->to(base_url('gudang/tampil'));
        }
    }

    public function DetailPembelian($id)
    {
        $pembelianModel = new Pembelian();
        $detailPembelianModel = new DetailPembelian();
        $mitraModel = new Mitra();
        $data['pembelian'] = $pembelianModel->findAll();
        $data['mitra'] = $mitraModel->findAll();
        $data['details'] = $detailPembelianModel->where('no_pembelian', $id)->findAll();

        $data['title'] = 'Detail Pembelian';

        return view('gudang/detail_pembelian', $data);
    }

    public function storeDetailPembelian()
    {
        $detailPembelianModel = new DetailPembelian();
        // masukkan data penjualan dulu baru detail
        $this->pembelianModel->insert(['id_user' => session('id')]);
        // ambil id terbaru
        $idPembelian = $this->pembelianModel->ambilIdTerbaru();
        $data = [
            [
                'no_pembelian' => $idPembelian[0]['no_pembelian'],
                'id_bahan' => $this->request->getPost('id_bahan'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total' => $this->request->getPost('total'),
            ],
        ];
        $data2 = [
            'no_pembelian' => $idPembelian[0]['no_pembelian'],
        ];
        // dd($data2);
        $totalBayar = intval($this->request->getPost('total'));
        $detailPembelianModel->insertBatch($data);
        $this->pembelianModel->update($data2, ['total_bayar' => strval($totalBayar)]);
        // $data2 = array(
        //     'total_bayar' => $this->request->getPost('total'),
        // );
        // dd($data2);
        // $this->penjualanModel->updatePenjualan( $data2 ,$idPenjualan);

        return redirect()->to('/gudang/tampil');
    }
    public function get_harga_bahan()
    {
        $id_bahan = $this->request->getPost('id_bahan');
        $bahanModel = new Bahan();
        $bahan = $bahanModel->find($id_bahan);

        $data = [
            'harga' => $bahan['harga'],
            'jumlah' => $bahan['jumlah']
        ];

        return $this->response->setJSON($data);
    }
}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\Mitra;
use App\Models\Produk;

class Bos extends BaseController
{

    public function index()
    {
        $model = new Produk();

        $data = [
            'title' => 'Dashboard'
        ];
        // $grafik = $model->getTotalPenjualanTahunan();
        // $data['grafik'] = $grafik;

        $grafik2 = $model->getTotalPendapatanTahunan();
        $data['grafik2'] = $grafik2;

        return view('bos/index', $data);
    }


    public function produk()
    {
        $model = new Produk();
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Produk',
            'keyword' => $keyword,
        ];
        $produk = $model->like('nama', $keyword)->paginate(5, 'produk');
        $data['produk'] = $produk;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/produk', $data);
    }

    public function detailProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Detail Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('bos/detailproduk', $data);
    }

    public function createProduk()
    {
        $data = [
            'title' => 'Tambah Produk'
        ];
        return view('bos/createproduk', $data);
    }

    public function storeProduk()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'ukuran' => $this->request->getPost('ukuran'),
            'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            'biaya_jual' => $this->request->getPost('biaya_jual'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status')
        );

        $model = new Produk();
        $simpan = $model->insertProduk($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah produk');
            return redirect()->to(base_url('bos/produk'));
        }
    }

    public function editProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Edit Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('bos/editproduk', $data);
    }

    public function updateProduk()
    {
        $id = $this->request->getPost('id_produk');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'ukuran' => $this->request->getPost('ukuran'),
            'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            'biaya_jual' => $this->request->getPost('biaya_jual'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status')
        );
        $model = new Produk();
        $ubah = $model->updateProduk($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit produk');
            return redirect()->to(base_url('bos/produk'));
        }
    }

    public function mitra()
    {
        $model = new Mitra();
        $currentPage = $this->request->getVar('page_mitra') ? $this->request->getVar('page_mitra') : 1;
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Mitra',
            'keyword' => $keyword,
        ];
        $mitra = $model->like('nama', $keyword)->paginate(5, 'mitra');
        $data['mitra'] = $mitra;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/mitra', $data);
    }

    public function createMitra()
    {
        $data = [
            'title' => 'Tmabah Mitra'
        ];
        return view('bos/createmitra', $data);
    }

    public function storeMitra()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => $this->request->getPost('status')
        );

        $model = new Mitra();
        $simpan = $model->insertMitra($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Mitra');
            return redirect()->to(base_url('bos/mitra'));
        }
    }

    public function editMitra($id)
    {
        $model = new Mitra();
        $data = [
            'title' => 'Edit Mitra'
        ];
        $data['mitra'] = $model->getMitra($id)->getRowArray();
        echo view('bos/editmitra', $data);
    }

    public function updateMitra()
    {
        $id = $this->request->getPost('id_mitra');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'status' => $this->request->getPost('status')
        );
        $model = new Mitra();
        $ubah = $model->updateMitra($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit Mitra');
            return redirect()->to(base_url('bos/mitra'));
        }
    }

    public function bahan()
    {
        $currentPage = $this->request->getVar('page_bahan') ? $this->request->getVar('page_bahan') : 1;
        $model = new Bahan();
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Bahan',
            'keyword' => $keyword,
        ];
        $bahan = $model->like('nama', $keyword)->paginate(5, 'bahan');
        $data['bahan'] = $bahan;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/bahan', $data);
    }

    public function createBahan()
    {
        $data = [
            'title' => 'Tambah Bahan'
        ];
        return view('bos/createbahan', $data);
    }

    public function storeBahan()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status')
        );
        $model = new Bahan();
        $simpan = $model->insertBahan($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Bahan');
            return redirect()->to(base_url('bos/bahan'));
        }
    }

    public function editBahan($id)
    {
        $model = new Bahan();
        $data = [
            'title' => 'Edit Bahan'
        ];
        $data['bahan'] = $model->getBahan($id)->getRowArray();
        echo view('bos/editbahan', $data);
    }

    public function updateBahan()
    {
        $id = $this->request->getPost('id_bahan');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status')
        );
        $model = new Bahan();
        $ubah = $model->updateBahan($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit Bahan');
            return redirect()->to(base_url('bos/bahan'));
        }
    }
}

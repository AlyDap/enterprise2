<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bahan;

class Bos extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('bos/index', $data);
    }

    public function produk()
    {
        $data = [
            'title' => 'Produk'
        ];
        return view('bos/produk', $data);
    }

    public function mitra()
    {
        $data = [
            'title' => 'Mitra'
        ];
        return view('bos/mitra', $data);
    }

    public function bahan()
    {
        // $pager = \Config\Services::pager();
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
            'title' => 'createbahan'
        ];
        return view('bos/createbahan', $data);
    }

    public function storeBahan()
    {
        $validation = \Config\Services::validation();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status')
        );

        if ($validation->run($data, 'bahan') == false) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('bos/createbahan'));
        } else {
            $model = new Bahan();
            $simpan = $model->insertBahan($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Berhasil Menambah Bahan');
                return redirect()->to(base_url('bos/bahan'));
            }
        }
    }

    public function editBahan($id)
    {
        $model = new Bahan();
        $data = [
            'title' => 'editbahan'
        ];
        $data['bahan'] = $model->getBahan($id)->getRowArray();
        echo view('bos/editbahan', $data);
    }

    public function updateBahan()
    {
        $id = $this->request->getPost('id_bahan');
        $validation = \Config\Services::validation();
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status')
        );

        if ($validation->run($data, 'bahan') == false) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('bos/editbahan/' . $id));
        } else {
            $model = new Bahan();
            $ubah = $model->updateBahan($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Berhasil Mengedit Bahan');
                return redirect()->to(base_url('bos/bahan'));
            }
        }
    }
}

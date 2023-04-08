<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bos_Model;

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
        $model = new Bos_Model();
        $data = [
            'title' => 'Bahan'
        ];
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data['bahan'] = $model->like('nama', $keyword)->paginate(5);
        $data['pager'] = $model->pager;
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
            $model = new Bos_Model();
            $simpan = $model->insertBahan($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Berhasil Menambah Bahan');
                return redirect()->to(base_url('bos/bahan'));
            }
        }
    }

    public function editBahan($id)
    {
        $model = new Bos_Model();
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
            $model = new Bos_Model();
            $ubah = $model->updateBahan($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Berhasil Mengedit Bahan');
                return redirect()->to(base_url('bos/bahan'));
            }
        }
    }
}

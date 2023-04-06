<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bahan_model;

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
        $model = new Bahan_model();
        $data = [
            'title' => 'Bahan'
        ];
        $data['bahan'] = $model->getBahan();
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
            'harga' => $this->request->getPost('harga')
        );

        if ($validation->run($data, 'bahan') == false) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('bos/createbahan'));
        } else {
            $model = new Bahan_model();
            $simpan = $model->insertBahan($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Berhasil Menambah Bahan');
                return redirect()->to(base_url('bos/bahan'));
            }
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Hrd extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\User();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        // hrd/index itu laman dashboard
        return view('hrd/index', $data);
    }

    public function tampil()
    {
        $data = [
            'title' => 'HRD',
            // Menampilkan daftar user
            'users' => $this->userModel->findAll()
        ];
        return view('hrd/tampil', $data);
    }


    public function store()
    {
        $id = $this->request->getVar('id-user');
        $session = session();
        if ($id == '') { //ini berarti tambah data

            // Mengambil data dari form input
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'jabatan' => $this->request->getVar('jabatan'),
                'gaji' => $this->request->getVar('gaji')
            ];

            // Memasukkan data ke dalam database
            $this->userModel->insert($data);

            $session->set('alert', 'success');
        } else { //ini berarti edit data
            $this->update($id);
            $session->set('alert', 'edit');
        }
        // Mengarahkan pengguna kembali ke halaman daftar user
        return redirect()->to('/hrd/tampil');
    }


    public function update($id)
    {
        // Mengambil data dari form input
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jabatan' => $this->request->getVar('jabatan'),
            'gaji' => $this->request->getVar('gaji')
        ];
        if ($this->request->getVar('password') == '') {
            unset($data['password']);
        }

        // Memperbarui data ke dalam database
        $this->userModel->update($id, $data);
    }
}

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
        // Mengambil data dari form input
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'jabatan' => $this->request->getVar('jabatan'),
            'gaji' => $this->request->getVar('gaji')
        ];

        // Memasukkan data ke dalam database
        $this->userModel->insert($data);

        $session = session();
        $session->set('alert', 'success');
        // Mengarahkan pengguna kembali ke halaman daftar user
        return redirect()->to('/hrd/tampil');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit data user
        $data['user'] = $this->userModel->find($id);
        return view('hrd/edit', $data);
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

        // Memperbarui data ke dalam database
        $this->userModel->update($id, $data);

        // Mengarahkan pengguna kembali ke halaman daftar user
        return redirect()->to('/hrd');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Hrd extends BaseController
{
    protected $userModel;
    protected $penggajian;
    protected $presensiModel;
    public function __construct()
    {
        $this->userModel = new \App\Models\User();
        $this->penggajian = new \App\Controllers\Penggajian();
        $this->presensiModel = new \App\Models\presensiModel();
    }

    public function index()
    {
        if (session('jabatan') != 'hrd') return redirect()->to('/dashboard');

        $totalUser = $this->userModel->countAll();

        $penggajian = $this->penggajian->hitungGaji();

        $absensi = $this->presensiModel->where('tanggal_presensi', date('Y-m-d'))->findAll();

        foreach ($penggajian as $p) {
            foreach ($absensi as $a) {
                if ($p['id_pegawai'] == $a['id_pegawai']) {
                    $penggajian[$p['id_pegawai']]['info']   = $a['info'];
                } else {
                    $penggajian[$p['id_pegawai']]['info']   = 'belum absen';
                }
            }
        }
        dd($absensi);

        $data = [
            'title' => 'Dashboard',
            'totalUser' => $totalUser,
            'penggajian' => $penggajian,
        ];
        // hrd/index itu laman dashboard
        return view('hrd/index', $data);
    }

    public function tampil()
    {
        if (session('jabatan') != 'hrd') return redirect()->to('/dashboard');
        $data = [
            'title' => 'HRD',
            // Menampilkan daftar user
            'users' => $this->userModel->findAll()
        ];
        return view('hrd/tampil', $data);
    }


    public function store()
    {
        if (session('jabatan') != 'hrd') return redirect()->to('/dashboard');
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
        if (session('jabatan') != 'hrd') return redirect()->to('/dashboard');
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

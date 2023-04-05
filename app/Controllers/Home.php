<?php

namespace App\Controllers;

class Home extends BaseController
{
    //INI LAMAN LOGIN
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        //menerima data user + password kemudian validasi
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() == 'post') {
            // Ambil data username dan password dari form login
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('pass');

            // Validasi data
            if (!empty($username) && !empty($password)) {
                // Cek apakah username dan password cocok dengan data di database
                $model = new \App\Models\User();
                $user = $model->where('username', $username)
                    ->first();

                if ($user) {
                    $hashed_password = $user['password'];

                    if (password_verify($password, $hashed_password)) {
                        // cek jabatannya
                        $session = session();
                        $session->set('jabatan', $user['jabatan']);
                        // Jika username dan password cocok, redirect ke halaman selanjutnya
                        return redirect()->to('dashboard');
                    } else {
                        $data['error'] = 'Password yang dimasukkan salah';
                    }
                } else {
                    $data['error'] = 'Username tidak ditemukan';
                }
            } else {
                $data['error'] = 'Silakan masukkan username dan password Anda';
            }
        }

        // Tampilkan halaman login apabila salah
        return view('login', $data);
    }
}
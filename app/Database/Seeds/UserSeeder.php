<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // bos, penjualan, finance, hrd, gudang, produksi
        $data = [
            [
                'username' => 'ali',
                'password' => password_hash('ali', PASSWORD_DEFAULT),
                'jabatan'   => 'bos'
            ],
            [
                'username' => 'ian',
                'password' => password_hash('ian', PASSWORD_DEFAULT),
                'jabatan'   => 'penjualan'
            ],
            [
                'username' => 'anonim',
                'password' => password_hash('riqqi', PASSWORD_DEFAULT),
                'jabatan'   => 'finance'
            ],
            [
                'username' => 'riqqi',
                'password' => password_hash('riqqi', PASSWORD_DEFAULT),
                'jabatan'   => 'hrd'
            ],
            [
                'username' => 'febi',
                'password' => password_hash('febi', PASSWORD_DEFAULT),
                'jabatan'   => 'gudang'
            ],
            [
                'username' => 'arya',
                'password' => password_hash('arya', PASSWORD_DEFAULT),
                'jabatan'   => 'produksi'
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
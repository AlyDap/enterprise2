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
                'jabatan'   => 'bos',
                'gaji'   => '10000000'
            ],
            [
                'username' => 'ian',
                'password' => password_hash('ian', PASSWORD_DEFAULT),
                'jabatan'   => 'penjualan',
                'gaji'   => '3500000'
            ],
            [
                'username' => 'anonim',
                'password' => password_hash('riqqi', PASSWORD_DEFAULT),
                'jabatan'   => 'finance',
                'gaji'   => '4000000'
            ],
            [
                'username' => 'riqqi',
                'password' => password_hash('riqqi', PASSWORD_DEFAULT),
                'jabatan'   => 'hrd',
                'gaji'   => '4500000'
            ],
            [
                'username' => 'febi',
                'password' => password_hash('febi', PASSWORD_DEFAULT),
                'jabatan'   => 'gudang',
                'gaji'   => '4000000'
            ],
            [
                'username' => 'arya',
                'password' => password_hash('arya', PASSWORD_DEFAULT),
                'jabatan'   => 'produksi',
                'gaji'   => '3500000'
            ],
        ];

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}

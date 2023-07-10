<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MitraSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'PT Agung Jaya',
                'email' => 'agungjaya@gmail.com',
                'no_hp' => '0123123',
                'alamat' => 'Jalan Jaya'
            ],
            [
                'nama' => 'PT Berkah',
                'email' => 'berkah@gmail.com',
                'no_hp' => '0248248',
                'alamat' => 'Jalan Berkah'
            ],
            [
                'nama' => 'PT Lancar',
                'email' => 'lancar@gmail.com',
                'no_hp' => '0369369',
                'alamat' => 'Jalan Lancar'
            ],
            [
                'nama' => 'PT Terbuka',
                'email' => 'terbuka@gmail.com',
                'no_hp' => '019283',
                'alamat' => 'Jalan Terbuka'
            ]
        ];
        $this->db->table('mitra')->insertBatch($data);
    }
}

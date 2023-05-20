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
                'alamat' => 'Jalan Jaya'
            ],
            [
                'nama' => 'PT Berkah',
                'alamat' => 'Jalan Berkah'
            ],
            [
                'nama' => 'PT Lancar',
                'alamat' => 'Jalan Lancar'
            ],
            [
                'nama' => 'PT Terbuka',
                'alamat' => 'Jalan Terbuka'
            ]
        ];
        $this->db->table('mitra')->insertBatch($data);
    }
}

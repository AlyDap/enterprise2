<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MitraSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Mori Prima',
                'alamat' => '10000'
            ],
            [
                'nama' => 'Mori Primissima',
                'alamat' => '15000'
            ],
            [
                'nama' => 'Katun',
                'alamat' => '20000'
            ],
            [
                'nama' => 'Sutera',
                'alamat' => '30000'
            ]
        ];
        $this->db->table('mitra')->insertBatch($data);
    }
}

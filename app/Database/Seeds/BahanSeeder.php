<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BahanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Mori Prima',
                'jumlah' => '50',
                'harga' => '10000'
            ],
            [
                'nama' => 'Mori Primissima',
                'jumlah' => '45',
                'harga' => '15000'
            ],
            [
                'nama' => 'Katun',
                'jumlah' => '40',
                'harga' => '20000'
            ],
            [
                'nama' => 'Sutera',
                'jumlah' => '30',
                'harga' => '30000'
            ]
        ];
        $this->db->table('bahan')->insertBatch($data);
    }
}

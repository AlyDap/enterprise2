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
                'harga' => '75000',
                'panjang_kain' => '1.5 x 15 meter'
            ],
            [
                'nama' => 'Mori Primissima',
                'jumlah' => '45',
                'harga' => '90000',
                'panjang_kain' => '1.5 x 15 meter'
            ],
            [
                'nama' => 'Katun',
                'jumlah' => '40',
                'harga' => '120000',
                'panjang_kain' => '1.5 x 15 meter'
            ],
            [
                'nama' => 'Rayon',
                'jumlah' => '30',
                'harga' => '80000',
                'panjang_kain' => '1.5 x 15 meter'
            ]
        ];
        $this->db->table('bahan')->insertBatch($data);
    }
}

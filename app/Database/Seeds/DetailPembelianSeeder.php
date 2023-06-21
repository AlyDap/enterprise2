<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailPembelianSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_pembelian' => '1',
                'id_bahan' => '3',
                'harga' => '10000',
                'jumlah' => '10',
                'total' => '100000'
            ],
            [
                'no_pembelian' => '2',
                'id_bahan' => '3',
                'harga' => '20000',
                'jumlah' => '20',
                'total' => '400000'
            ],
            [
                'no_pembelian' => '2',
                'id_bahan' => '4',
                'harga' => '30000',
                'jumlah' => '30',
                'total' => '900000'
            ],
        ];
        $this->db->table('detail_pembelian')->insertBatch($data);
    }
}

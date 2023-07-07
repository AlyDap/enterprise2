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
                'id_bahan' => '1',
                'harga' => '75000',
                'jumlah' => '10',
                'total' => '750000'
            ],
            [
                'no_pembelian' => '2',
                'id_bahan' => '3',
                'harga' => '120000',
                'jumlah' => '20',
                'total' => '2400000'
            ],
            [
                'no_pembelian' => '2',
                'id_bahan' => '4',
                'harga' => '80000',
                'jumlah' => '30',
                'total' => '2400000'
            ],
        ];
        $this->db->table('detail_pembelian')->insertBatch($data);
    }
}

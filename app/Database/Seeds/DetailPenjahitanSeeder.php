<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailPenjahitanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'no_penjahitan' => '1',
                'id_produk' => '3',
                'ukuran' => 'XL',
                'jumlah' => '10',
                'biaya_produksi' => '1500000'
            ],
            [
                'no_penjahitan' => '1',
                'id_produk' => '4',
                'ukuran' => 'L',
                'jumlah' => '7',
                'biaya_produksi' => '1000000'
            ],
            [
                'no_penjahitan' => '2',
                'id_produk' => '1',
                'ukuran' => 'L',
                'jumlah' => '7',
                'biaya_produksi' => '1000000'
            ],
        ];
        $this->db->table('detail_jahit')->insertBatch($data);
    }
}

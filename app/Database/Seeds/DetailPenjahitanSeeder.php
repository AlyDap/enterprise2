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
                'ukuran' => 'All Size',
                'jumlah' => '10',
                'jumlah_bahan' => '2',
                'biaya_produksi' => '400000'
            ],
            [
                'no_penjahitan' => '1',
                'id_produk' => '4',
                'ukuran' => 'All Size',
                'jumlah' => '6',
                'jumlah_bahan' => '1',
                'biaya_produksi' => '180000'
            ],
            [
                'no_penjahitan' => '2',
                'id_produk' => '1',
                'ukuran' => 'All Size',
                'jumlah' => '7',
                'jumlah_bahan' => '1',
                'biaya_produksi' => '140000'
            ],
        ];
        $this->db->table('detail_jahit')->insertBatch($data);
    }
}

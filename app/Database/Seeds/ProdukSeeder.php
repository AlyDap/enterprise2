<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Daster Rayon',
                'ukuran' => 'All Size',
                'biaya_produksi' => '25000',
                'biaya_jual' => '50000',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Gamis Rayon',
                'ukuran' => 'All Size',
                'biaya_produksi' => '40000',
                'biaya_jual' => '65000',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Gamis Twil',
                'ukuran' => 'All Size',
                'biaya_produksi' => '30000',
                'biaya_jual' => '50000',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Midi Twil',
                'ukuran' => 'All Size',
                'biaya_produksi' => '35000',
                'biaya_jual' => '60000',
                'jumlah' => '100'
            ]
        ];
        $this->db->table('produk')->insertBatch($data);
    }
}

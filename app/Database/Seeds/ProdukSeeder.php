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
                'biaya_produksi' => '20000',
                'biaya_jual' => '50000',
                'jumlah_produksi_perkain' => '7',
                'panjang_kain_perproduksi' => '1.5 x 2 meter',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Gamis Rayon',
                'ukuran' => 'All Size',
                'biaya_produksi' => '50000',
                'biaya_jual' => '120000',
                'jumlah_produksi_perkain' => '5',
                'panjang_kain_perproduksi' => '1.5 x 3 meter',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Gamis Twil',
                'ukuran' => 'All Size',
                'biaya_produksi' => '40000',
                'biaya_jual' => '90000',
                'jumlah_produksi_perkain' => '5',
                'panjang_kain_perproduksi' => '1.5 x 3 meter',
                'jumlah' => '100'
            ],
            [
                'nama' => 'Midi Twil',
                'ukuran' => 'All Size',
                'biaya_produksi' => '30000',
                'biaya_jual' => '70000',
                'jumlah_produksi_perkain' => '6',
                'panjang_kain_perproduksi' => '1.5 x 2.5 meter',
                'jumlah' => '100'
            ]
        ];
        $this->db->table('produk')->insertBatch($data);
    }
}

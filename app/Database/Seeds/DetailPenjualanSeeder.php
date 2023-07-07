<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetailPenjualanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // thn 2019
            [
                'id_penjualan' => '1',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '12',
                'total' => '600000'
            ],
            [
                'id_penjualan' => '1',
                'id_produk' => '3',
                'harga' => '90000',
                'jumlah' => '8',
                'total' => '720000'
            ],
            [
                'id_penjualan' => '2',
                'id_produk' => '4',
                'harga' => '70000',
                'jumlah' => '20',
                'total' => '1400000'
            ],
            [
                'id_penjualan' => '3',
                'id_produk' => '3',
                'harga' => '90000',
                'jumlah' => '16',
                'total' => '1440000'
            ],
            // thn 2020
            [
                'id_penjualan' => '4',
                'id_produk' => '2',
                'harga' => '120000',
                'jumlah' => '20',
                'total' => '2400000'
            ],
            [
                'id_penjualan' => '5',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '5',
                'total' => '250000'
            ],
            [
                'id_penjualan' => '5',
                'id_produk' => '2',
                'harga' => '120000',
                'jumlah' => '15',
                'total' => '1800000'
            ],
            // thn 2021
            [
                'id_penjualan' => '6',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '8',
                'total' => '400000'
            ],
            [
                'id_penjualan' => '6',
                'id_produk' => '3',
                'harga' => '90000',
                'jumlah' => '12',
                'total' => '1080000'
            ],
            // thn 2022
            [
                'id_penjualan' => '7',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '12',
                'total' => '600000'
            ],
            [
                'id_penjualan' => '7',
                'id_produk' => '4',
                'harga' => '70000',
                'jumlah' => '8',
                'total' => '560000'
            ],
            // thn 2023
            [
                'id_penjualan' => '8',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '5',
                'total' => '250000'
            ],
            [
                'id_penjualan' => '8',
                'id_produk' => '2',
                'harga' => '120000',
                'jumlah' => '2',
                'total' => '240000'
            ],
            [
                'id_penjualan' => '8',
                'id_produk' => '3',
                'harga' => '90000',
                'jumlah' => '5',
                'total' => '450000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '2',
                'harga' => '120000',
                'jumlah' => '1',
                'total' => '120000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '3',
                'harga' => '90000',
                'jumlah' => '10',
                'total' => '900000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '4',
                'harga' => '70000',
                'jumlah' => '1',
                'total' => '70000'
            ]
        ];
        $this->db->table('detail_penjualan')->insertBatch($data);
    }
}

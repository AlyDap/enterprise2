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
                'harga' => '50000',
                'jumlah' => '8',
                'total' => '400000'
            ],
            [
                'id_penjualan' => '2',
                'id_produk' => '4',
                'harga' => '60000',
                'jumlah' => '20',
                'total' => '1200000'
            ],
            [
                'id_penjualan' => '3',
                'id_produk' => '3',
                'harga' => '50000',
                'jumlah' => '16',
                'total' => '800000'
            ],
            // thn 2020
            [
                'id_penjualan' => '4',
                'id_produk' => '2',
                'harga' => '65000',
                'jumlah' => '20',
                'total' => '1300000'
            ],
            [
                'id_penjualan' => '5',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '8',
                'total' => '400000'
            ],
            [
                'id_penjualan' => '5',
                'id_produk' => '3',
                'harga' => '50000',
                'jumlah' => '12',
                'total' => '600000'
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
                'harga' => '50000',
                'jumlah' => '12',
                'total' => '600000'
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
                'id_produk' => '3',
                'harga' => '50000',
                'jumlah' => '8',
                'total' => '400000'
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
                'harga' => '65000',
                'jumlah' => '2',
                'total' => '130000'
            ],
            [
                'id_penjualan' => '8',
                'id_produk' => '3',
                'harga' => '50000',
                'jumlah' => '5',
                'total' => '250000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '1',
                'harga' => '50000',
                'jumlah' => '1',
                'total' => '50000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '2',
                'harga' => '65000',
                'jumlah' => '10',
                'total' => '650000'
            ],
            [
                'id_penjualan' => '9',
                'id_produk' => '3',
                'harga' => '50000',
                'jumlah' => '1',
                'total' => '50000'
            ]
        ];
        $this->db->table('detail_penjualan')->insertBatch($data);
    }
}

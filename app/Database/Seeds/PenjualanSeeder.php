<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_penjualan' => '1',
                'tgl' => '2019-04-19 10:02:24.000000',
                'total_bayar' => '1320000',
                'id_user' => '2'
                // 1(12) 3(8)
            ],

            [
                'id_penjualan' => '2',
                'tgl' => '2019-07-19 10:02:24.000000',
                'total_bayar' => '1400000',
                'id_user' => '2'
                // 4(20)
            ],
            [
                'id_penjualan' => '3',
                'tgl' => '2019-09-19 10:02:24.000000',
                'total_bayar' => '1440000',
                'id_user' => '2'
                // 3(21)
            ],
            [
                'id_penjualan' => '4',
                'tgl' => '2020-04-19 10:02:24.000000',
                'total_bayar' => '2400000',
                'id_user' => '2'
                // 2(20)
            ],
            [
                'id_penjualan' => '5',
                'tgl' => '2020-09-19 10:02:24.000000',
                'total_bayar' => '2050000',
                'id_user' => '2'
                // 1(8) 3(12)
            ],
            [
                'id_penjualan' => '6',
                'tgl' => '2021-04-19 10:02:24.000000',
                'total_bayar' => '1480000',
                'id_user' => '2'
                // 1(8) 3(12)
            ],
            [
                'id_penjualan' => '7',
                'tgl' => '2022-04-19 10:02:24.000000',
                'total_bayar' => '1160000',
                'id_user' => '2'
                // 1(12) 3(8)
            ],
            [
                'id_penjualan' => '8',
                'tgl' => '2023-04-19 10:02:24.000000',
                'total_bayar' => '940000',
                'id_user' => '2'
                // 1(5) 2(2) 3(5)
            ],
            [
                'id_penjualan' => '9',
                'tgl' => '2023-010-19 10:02:24.000000',
                'total_bayar' => '1090000',
                'id_user' => '2'
                // 1(1) 2(10) 3(1)
            ]
        ];
        $this->db->table('penjualan')->insertBatch($data);
    }
}

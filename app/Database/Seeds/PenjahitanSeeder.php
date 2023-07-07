<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjahitanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_penjahit' => '1',
                'total_bayar' => '580000',
                'tgl' => '2019-04-19 10:02:24.000000',
                'id_bahan' => '3',
                'total_bahan' => '3',
                'id_user' => '6'
            ],
            [
                'id_penjahit' => '2',
                'total_bayar' => '140000',
                'tgl' => '2020-04-19 10:02:24.000000',
                'id_bahan' => '1',
                'total_bahan' => '1',
                'id_user' => '6'
            ],
        ];
        $this->db->table('penjahitan')->insertBatch($data);
    }
}

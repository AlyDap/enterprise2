<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PembelianSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tgl' => '2023-05-11 15:22:29.000000',
                'total_bayar' => '750000',
                'id_supplier' => '3',
                'id_user' => '5'
            ],
            [
                'tgl' => '2023-06-17 15:22:29.000000',
                'total_bayar' => '4800000',
                'id_supplier' => '2',
                'id_user' => '5'
            ],
        ];
        $this->db->table('pembelian')->insertBatch($data);
    }
}

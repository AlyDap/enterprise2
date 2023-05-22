<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenjahitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Pak Wal',
                'alamat' => 'Perumahan'
            ],
            [
                'nama' => 'Bu Neng',
                'alamat' => 'Pelosok'
            ],
            [
                'nama' => 'Kang Bob',
                'alamat' => 'Gang Buntu'
            ],
            [
                'nama' => 'Mbak Yun',
                'alamat' => 'Desa'
            ]
        ];
        $this->db->table('penjahit')->insertBatch($data);
    }
}

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
                'no_hp' => '0987654321',
                'alamat' => 'Perumahan'
            ],
            [
                'nama' => 'Bu Neng',
                'no_hp' => '088664422',
                'alamat' => 'Pelosok'
            ],
            [
                'nama' => 'Kang Bob',
                'no_hp' => '097531',
                'alamat' => 'Gang Buntu'
            ],
            [
                'nama' => 'Mbak Yun',
                'no_hp' => '01234567',
                'alamat' => 'Desa'
            ]
        ];
        $this->db->table('penjahit')->insertBatch($data);
    }
}

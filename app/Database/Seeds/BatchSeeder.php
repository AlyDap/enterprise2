<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BatchSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('ProdukSeeder');
        $this->call('BahanSeeder');
        $this->call('MitraSeeder');
        $this->call('PenjahitSeeder');
        $this->call('PenjualanSeeder');
        $this->call('PembelianSeeder');
        $this->call('DetailPenjualanSeeder');
        $this->call('DetailPembelianSeeder');
        $this->call('PenjahitanSeeder');
        $this->call('DetailPenjahitanSeeder');
        $this->call('PresensiSeeder');
        $this->call('ChatSeeder');
    }
}

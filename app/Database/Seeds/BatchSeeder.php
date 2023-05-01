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
        $this->call('PenjualanSeeder');
        $this->call('DetailPenjualanSeeder');
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PresensiSeeder extends Seeder
{
    public function run()
    {
        // truncate data di tabel presensi

        $this->db->table('presensi')->truncate();

        $faker = \Faker\Factory::create('id_ID');
        $awalBulan = date('Y-m-01');
        $hariIni = date('d');
        // buat perulangan untuk memasukkan faker data ke tabel presensi
        for ($i = 0; $i < ($hariIni - 1); $i++) {
            // kecuali hari jumat
            if (date('D', strtotime($awalBulan . '+' . $i . 'days')) == 'Fri') {
                continue;
            }
            for ($j = 1; $j <= 6; $j++) {
                $ket = '';
                $num = $faker->randomNumber(1);
                if ($num == 1) {
                    $ket = 'sakit';
                } elseif ($num == 2) {
                    $ket = 'terlambat';
                }
                $data = [
                    'id_pegawai' => $j,
                    // input tanggal setiap hari bulan juni 2023
                    'tanggal_presensi' => date('Y-m-d', strtotime($awalBulan . '+' . $i . 'days')),
                    // buat waktu masuk between 07:00:00 - 08:00:00
                    'waktu_masuk' => $faker->time('08:i:s'),
                    'waktu_keluar' => '16:' . $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]) . ':' . $faker->time('s'),
                    'gambar_masuk' => 'default.jpg',
                    'gambar_keluar' => 'default.jpg',
                    'info' => 'pulang',
                    'ket' => $ket,
                    'status' => 1,
                ];
                // insert data ke database
                $this->db->table('presensi')->insert($data);
            }
        }
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PresensiSeeder extends Seeder
{
    public function run()
    {
        // hapus data di tabel presensi
        $this->db->table('presensi')->emptyTable();
        // membuat data dummy tabel presensi, id presensi, id pegawai, tgl_presensi, waktu masuk/keluar, foto masuk/keluar,info, ket, status
        $faker = \Faker\Factory::create('id_ID');
        $awalBulan = date('Y-m-01');
        $hariIni = date('d');
        // buat perulangan untuk memasukkan faker data ke tabel presensi
        for ($i = 0; $i < $hariIni; $i++) {
            // kecuali hari jumat
            if (date('D', strtotime($awalBulan . '+' . $i . 'days')) == 'Fri') {
                continue;
            }
            for ($j = 1; $j <= 6; $j++) {
                $data = [
                    'id_pegawai' => $j,
                    // input tanggal setiap hari bulan juni 2023
                    'tanggal_presensi' => date('Y-m-d', strtotime($awalBulan . '+' . $i . 'days')),
                    // buat waktu masuk between 07:00:00 - 08:00:00
                    'waktu_masuk' => $faker->time('H:i:s'),
                    'waktu_keluar' => $faker->time('H:i:s'),
                    'gambar_masuk' => 'default.jpg',
                    'gambar_keluar' => 'default.jpg',
                    // masuk, pulang, sakit, izin, alpa 
                    'info' => $faker->randomElement(['tepat waktu', 'terlambat', 'sakit', 'izin', 'alpa']),
                    'ket' => '-',
                    'status' => $faker->numberBetween(0, 1),
                ];
                // insert data ke database
                $this->db->table('presensi')->insert($data);
            }
        }
    }
}

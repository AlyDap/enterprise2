<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PresensiSeeder extends Seeder
{
    public function run()
    {
        // membuat data dummy tabel presensi, id presensi, id pegawai, tgl_presensi, waktu masuk/keluar, foto masuk/keluar,info, ket, status
        $faker = \Faker\Factory::create('id_ID');
        // buat perulangan untuk memasukkan faker data ke tabel presensi
        for ($i = 0; $i < 50; $i++) {
            $data = [
                'id_pegawai' => $faker->numberBetween(1, 6),
                // input tanggal setiap hari bulan mei 2023
                'tanggal_presensi' => $faker->dateTimeBetween('2023-05-01', '2023-05-31')->format('Y-m-d'),
                // buat waktu masuk between 07:00:00 - 08:00:00
                'waktu_masuk' => $faker->time('H:i:s'),
                'waktu_keluar' => $faker->time('H:i:s'),
                // 'gambar_masuk' => $faker->image(base_url() . 'public/img/presensi', 640, 480, null, false),
                // 'gambar_keluar' => $faker->image('public/img/presensi', 640, 480, null, false),
                'gambar_masuk' => 'default.jpg',
                'gambar_keluar' => 'default.jpg',
                'info' => $faker->randomElement(['tepat waktu', 'terlambat', 'sakit', 'izin', 'alpa']),
                'ket' => '-',
                'status' => $faker->numberBetween(0, 1),
            ];
            // insert data ke database
            $this->db->table('presensi')->insert($data);
        }
    }
}

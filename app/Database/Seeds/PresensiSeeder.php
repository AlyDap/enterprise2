<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

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
            // semua id pegawai kecuali bos ali
            for ($j = 2; $j <= 6; $j++) {
                $info = '';
                $waktuMasuk = $faker->time('08:i:s');
                $waktuKeluar = '';
                $ket = '';
                $gambarKeluar = '';
                $num = $faker->randomNumber(1);
                if ($num == 1) {
                    $info = 'sakit';
                    $ket = 'maaf lagi sakit';
                } else {
                    $info = 'pulang';
                    $gambarKeluar = 'default.jpg';
                    $waktuKeluar = $faker->time('16:i:s');
                    // bisa saja maksudnya terlambat
                    $timeMasuk = Time::parse($waktuMasuk);
                    $timeKeluar = Time::parse($waktuKeluar);
                    if ($timeMasuk->difference($timeKeluar)->getHours() < 8) {
                        $ket = 'terlambat';
                    }
                }
                $data = [
                    'id_pegawai' => $j,
                    // input tanggal setiap hari bulan juni 2023
                    'tanggal_presensi' => date('Y-m-d', strtotime($awalBulan . '+' . $i . 'days')),
                    // buat waktu masuk between 07:00:00 - 08:00:00
                    'waktu_masuk' => $waktuMasuk,
                    'waktu_keluar' => $waktuKeluar,
                    'gambar_masuk' => 'default.jpg',
                    'gambar_keluar' => $gambarKeluar,
                    'info' => $info, //[masuk/terlambat, pulang], sakit, 
                    'ket' => $ket, // terlambat, ket sakit
                    'status' => 1,
                ];
                // insert data ke database
                $this->db->table('presensi')->insert($data);
            }
        }
    }
}

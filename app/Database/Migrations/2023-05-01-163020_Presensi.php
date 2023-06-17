<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Presensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_presensi' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'tanggal_presensi' => [
                'type' => 'DATE',
            ],
            'waktu_masuk' => [
                'type' => 'TIME',
            ],
            'waktu_keluar' => [
                'type' => 'TIME',
            ],
            'gambar_masuk' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'gambar_keluar' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'info' => [
                // masuk, pulang, sakit, izin, alpa
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'ket' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'status' => [
                // 0 = belum di verifikasi, 1 = sudah di verifikasi
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
            ],
        ]);

        $this->forge->addKey('id_presensi', true);
        $this->forge->createTable('presensi');
    }

    public function down()
    {
        $this->forge->dropTable('presensi');
    }
}

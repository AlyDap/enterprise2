<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjahitan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_penjahitan' => [
                'type'  => 'INT',
                'constraint'    => 11,
                'auto_increment'    => true
            ],
            'id_penjahit'  => [
                'type'  => 'int',
            ],
            'total_bayar'  => [
                'type'  => 'int',
            ],
            'tgl'  => [
                'type'  => 'datetime',
            ],
            'id_bahan'  => [
                'type'  => 'INT',
            ],
            'total_bahan'  => [
                'type'  => 'INT',
            ],
            'id_user'  => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addKey('no_penjahitan', true);
        $this->forge->addForeignKey('id_penjahit', 'penjahit', 'id_penjahit');
        $this->forge->addForeignKey('id_bahan', 'bahan', 'id_bahan');
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->createTable('penjahitan', true);
        $this->db->query('ALTER TABLE `penjahitan` CHANGE `tgl` `tgl` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;');
    }

    public function down()
    {
        $this->forge->dropTable('penjahitan', true);
    }
}

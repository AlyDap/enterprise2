<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{

    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id_penjualan' => [
                'type'  => 'INT',
                'auto_increment'    => true,
                'constraint'    => 11
            ],
            'tgl'   => [
                'type'  => 'DATETIME',
            ],
            'total_bayar'  => [
                'type'  => 'INT',
            ],
            'id_user'  => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addKey('id_penjualan', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'cascade', 'cascade');
        $this->forge->createTable('penjualan', true);
        $this->db->query('ALTER TABLE `penjualan` CHANGE `tgl` `tgl` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan', true);
    }
}

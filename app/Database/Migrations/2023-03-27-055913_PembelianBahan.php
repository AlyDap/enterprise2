<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembelianBahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_pembelian' => [
                'type'  => 'INT',
                'auto_increment'    => true,
                'constraint'    => 11
            ],
            'tgl' => [
                'type'  => 'DATETIME'
            ],
            'total_bayar'   => [
                'type'      => 'int'
            ],
            'id_supplier'   => [
                'type'      => 'int',
            ],
            'id_user'   => [
                'type'      => 'int',
            ],
        ]);
        $this->forge->addKey('no_pembelian', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_supplier', 'mitra', 'id_mitra');
        $this->forge->createTable('pembelian');
        $this->db->query('ALTER TABLE `pembelian` CHANGE `tgl` `tgl` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;');
    }

    public function down()
    {
        $this->forge->dropTable('pembelian', true);
    }
}

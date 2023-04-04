<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Finance extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_urut' => [
                'type'  => 'INT',
                'constraint'    => 11,
                'auto_increment'    => true
            ],
            'tgl'  => [
                'type'  => 'DATETIME',
            ],
            'nominal'  => [
                'type'  => 'int',
            ],
            'keterangan'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 50
            ],
            'saldo'  => [
                'type'  => 'INT',
            ],
            'pencatat'  => [
                'type'  => 'INT',
            ],
            'penerima'  => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addKey('no_urut', true);
        $this->forge->addForeignKey('pencatat', 'user', 'id_user');
        $this->forge->addForeignKey('penerima', 'user', 'id_user');
        $this->forge->createTable('finance', true);
    }

    public function down()
    {
        $this->forge->dropTable('finance', true);
    }
}
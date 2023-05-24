<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjahit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjahit' => [
                'type'  => 'INT',
                'constraint'    => 11,
                'auto_increment'    => true
            ],
            'nama'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 30
            ],
            'alamat'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 70
            ],
            'status'  => [
                'type'  => 'ENUM',
                'constraint'  => "'Active','Inactive'",
                'default'  => 'Active',
            ],

        ]);
        $this->forge->addKey('id_penjahit', true);
        $this->forge->createTable('penjahit', true);
    }

    public function down()
    {
        $this->forge->dropTable('mitra', true);
    }
}
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mitra extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mitra' => [
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

        ]);
        $this->forge->addKey('id_mitra', true);
        $this->forge->createTable('mitra', true);
    }

    public function down()
    {
        $this->forge->dropTable('mitra', true);
    }
}
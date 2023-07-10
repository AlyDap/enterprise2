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
            'email'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 50
            ],
            'no_hp'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 15
            ],
            'status'  => [
                'type'  => 'ENUM',
                'constraint'  => "'Active','Inactive'",
                'default'  => 'Active',
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

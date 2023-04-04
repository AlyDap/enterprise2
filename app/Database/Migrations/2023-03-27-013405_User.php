<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'  => 'INT',
                'auto_increment'    => true,
                'constraint'    => 11
            ],
            'username'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 20
            ],
            'password'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 255
            ],
            'jabatan'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 20
            ],
            'gaji'  => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
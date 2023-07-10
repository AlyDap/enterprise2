<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bahan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bahan' => [
                'type'  => 'INT',
                'auto_increment'    => true,
                'constraint'    => 11
            ],
            'nama' => [
                'type'  => 'VARCHAR',
                'constraint'    => 30
            ],
            'jumlah' => [
                'type'  => 'INT',
            ],
            'harga' => [
                'type'  => 'INT',
            ],
            'panjang_kain' => [
                'type'  => 'VARCHAR',
                'constraint'    => 50
            ],
            'status'  => [
                'type'  => 'ENUM',
                'constraint'  => "'Active','Inactive'",
                'default'  => 'Active',
            ],
        ]);
        $this->forge->addKey('id_bahan', true);
        $this->forge->createTable('bahan', true);
    }
    public function down()
    {
        $this->forge->dropTable('bahan', true);
    }
}

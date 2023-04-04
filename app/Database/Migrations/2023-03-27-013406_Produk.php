<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'  => 'INT',
                'constraint'    => 11,
                'auto_increment'    => true,
            ],
            'nama'  => [
                'type'  => 'VARCHAR',
                'constraint'    => 30
            ],
            'ukuran'  => [
                'type'  => 'CHAR',
                'constraint'    => 5
            ],
            'biaya_produksi'  => [
                'type'  => 'INT',
            ],
            'biaya_jual'  => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk', true);
    }

    public function down()
    {
        $this->forge->dropTable('produk', true);
    }
}
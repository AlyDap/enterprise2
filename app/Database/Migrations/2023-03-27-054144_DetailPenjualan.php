<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenjualan extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id_penjualan' => [
                'type'  => 'INT',
            ],
            'id_produk' => [
                'type'  => 'INT',
            ],
            'harga' => [
                'type'  => 'INT',
            ],
            'jumlah' => [
                'type'  => 'INT',
            ],
            'total' => [
                'type'  => 'INT',
            ],

        ]);
        $this->forge->addForeignKey('id_penjualan', 'penjualan', 'id_penjualan', 'cascade', 'cascade');
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk', 'cascade', 'cascade');
        $this->forge->createTable('detail_penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_penjualan', true);
    }
}
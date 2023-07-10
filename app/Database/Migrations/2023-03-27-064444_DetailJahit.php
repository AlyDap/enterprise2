<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailJahit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_penjahitan' => [
                'type'  => 'INT',
            ],
            'id_produk' => [
                'type'  => 'INT',
            ],
            'ukuran'  => [
                'type'  => 'CHAR',
                'constraint'    => 10
            ],
            'jumlah' => [
                'type'  => 'INT',
            ],
            'jumlah_bahan' => [
                'type'  => 'INT',
            ],
            'biaya_produksi' => [
                'type'  => 'INT',
            ],
        ]);
        $this->forge->addForeignKey('no_penjahitan', 'penjahitan', 'no_penjahitan');
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->createTable('detail_jahit', true);
    }

    public function down()
    {
        $this->forge->dropTable('detail_jahit', true);
    }
}

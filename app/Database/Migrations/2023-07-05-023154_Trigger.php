<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trigger extends Migration
{
    public function up()
    {
        $this->db->query("CREATE TRIGGER update_stock
        AFTER INSERT ON detail_penjualan
        FOR EACH ROW
        BEGIN
            UPDATE produk
            SET jumlah = jumlah - NEW.jumlah
            WHERE id_produk = NEW.id_produk;
        END;");
    }

    public function down()
    {
        $this->db->query("DROP TRIGGER update_stock");
    }
}

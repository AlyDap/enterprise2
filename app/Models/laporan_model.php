<?php

namespace App\Models;

use CodeIgniter\Model;

class laporan_model extends Model
{
    public function DataHarian()
    {
        return $this->db->query('SELECT
        p.id_produk,
        p.nama,
        p.biaya_produksi,
        p.biaya_jual,
        SUM(dp.jumlah) AS qty,
        SUM(dp.total) AS totalharga
    FROM
        produk AS p,
        detail_penjualan AS dp,
        penjualan AS pp
    WHERE
        p.id_produk = dp.id_produk AND dp.id_penjualan = pp.id_penjualan
    GROUP BY
        p.id_produk')->getResultArray();
    }
}

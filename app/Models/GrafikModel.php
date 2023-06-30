<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikModel extends Model
{

    public function getTotalPenjualanPerHari($tgl)
    {
        // menampilkan jumlah produk terjual dalam 1 hari 
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit, date(p.tgl) AS tanggal, TIME(p.tgl) AS waktu, COUNT(*) AS transaksi
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND date(p.tgl) = '" . $tgl . "'
        GROUP BY jammenit ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPenjualanPerHari2()
    {
        // menampilkan jumlah produk terjual dalam 1 hari 
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit, date(p.tgl) AS tanggal, TIME(p.tgl) AS waktu, COUNT(*) AS transaksi
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND date(p.tgl) = '2023-06-29'
        GROUP BY jammenit ORDER BY p.tgl")->getResultArray();
    }
}

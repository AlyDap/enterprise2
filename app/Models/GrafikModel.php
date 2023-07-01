<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikModel extends Model
{

    public function getTotalPenjualanPerHari($tgl)
    {
        // menampilkan jumlah produk terjual dalam 1 hari 
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi, concat('tanggal') as info
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND date(p.tgl) = '" . $tgl . "'
        GROUP BY waktu ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPenjualanPerBulan($bln)
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%d')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi, concat('bulan') as info
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "'
        GROUP BY waktu ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPenjualanPerTahun($thn)
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%M')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi , CONCAT(DATE_FORMAT(p.tgl, '%m')) as wkt, concat('tahun') as info
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "'
        GROUP BY wkt ORDER BY p.tgl")->getResultArray();
    }
    public function thn()
    {
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(p.tgl, '%Y') as tahun FROM penjualan as p ORDER BY tahun DESC")->getResultArray();
    }
    public function getTotalPenjualanPerHari2()
    {
        // menampilkan jumlah produk terjual dalam 1 hari 
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND date(p.tgl) = '2023-06-29'
        GROUP BY waktu ORDER BY p.tgl")->getResultArray();
    }
}

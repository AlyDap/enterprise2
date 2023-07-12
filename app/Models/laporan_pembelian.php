<?php

namespace App\Models;

use CodeIgniter\Model;

class laporan_pembelian extends Model
{
    public function DataHarian($tgl)
    {
        return $this->db->query('SELECT p.id_bahan, pp.tgl, p.nama, p.harga, p.biaya_jual, SUM(dp.jumlah) AS qty, SUM(dp.total) AS totalharga FROM produk AS p, detail_penjualan AS dp, penjualan AS pp WHERE p.id_produk = dp.id_produk AND dp.id_penjualan = pp.id_penjualan AND DATE(pp.tgl)="' . $tgl . '" GROUP BY p.id_produk;')->getResultArray();
    }
    public function GrandTotal($tgl)
    {
        return $this->db->query('SELECT
        SUM(dp.total) AS totalharga
    FROM
        bahan AS p,
        detail_penjualan AS dp,
        penjualan AS pp
    WHERE
        p.id_produk = dp.id_produk AND dp.id_penjualan = pp.id_penjualan AND DATE(pp.tgl)="' . $tgl . '" ')->getResultArray();
    }

    public function DataBulanan($bln)
    {
        return $this->db->query("SELECT
        p.id_bahan,
        pp.tgl,
        p.nama,
        p.harga,
        SUM(dp.jumlah) AS qty,
        SUM(dp.total) AS totalharga
    FROM
        bahan AS p,
        detail_pembelian AS dp,
        pembelian AS pp
    WHERE
        p.id_bahan = dp.id_bahan AND dp.no_pembelian = pp.no_pembelian AND DATE_FORMAT(pp.tgl, '%Y-%m') = '" . $bln . "'
    GROUP BY
        p.id_bahan;")->getResultArray();
    }
    public function GrandTotalbulanan($bln)
    {
        return $this->db->query("SELECT
        SUM(dp.total) AS totalharga
    FROM
        bahan AS p,
        detail_pembelian AS dp,
        pembelian AS pp
    WHERE
        p.id_bahan = dp.id_bahan AND dp.no_pembelian = pp.no_pembelian AND DATE_FORMAT(pp.tgl, '%Y-%m') = '" . $bln . "' ")->getResultArray();
    }

    public function DataTahunan($thn)
    {
        return $this->db->query("SELECT
        p.id_produk,
        pp.tgl,
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
        p.id_produk = dp.id_produk AND dp.id_penjualan = pp.id_penjualan AND DATE_FORMAT(pp.tgl, '%Y') = '" . $thn . "'
    GROUP BY
        p.id_produk;")->getResultArray();
    }
    public function GrandTotalTahunan($thn)
    {
        return $this->db->query("SELECT
        SUM(dp.total) AS totalharga
    FROM
        produk AS p,
        detail_penjualan AS dp,
        penjualan AS pp
    WHERE
        p.id_produk = dp.id_produk AND dp.id_penjualan = pp.id_penjualan AND DATE_FORMAT(pp.tgl, '%Y') = '" . $thn . "' ")->getResultArray();
    }
}

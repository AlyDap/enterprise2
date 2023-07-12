<?php

namespace App\Models;

use CodeIgniter\Model;

class laporan_pembelian extends Model
{
    public function DataHarian($tgl)
    {
        return $this->db->query('SELECT p.id_bahan, pp.tgl, p.nama, p.harga, SUM(dp.jumlah) AS qty, SUM(dp.total) AS totalharga FROM bahan AS p, detail_pembelian AS dp, pembelian AS pp WHERE p.id_bahan = dp.id_bahan AND dp.no_pembelian = pp.no_pembelian AND DATE(pp.tgl)="' . $tgl . '" GROUP BY p.id_bahan;')->getResultArray();
    }
    public function GrandTotal($tgl)
    {
        return $this->db->query('SELECT
        SUM(dp.total) AS totalharga
    FROM
        bahan AS p,
        detail_pembelian AS dp,
        pembelian AS pp
    WHERE
        p.id_bahan = dp.id_bahan AND dp.no_pembelian = pp.no_pembelian AND DATE(pp.tgl)="' . $tgl . '" ')->getResultArray();
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
        p.id_bahan = dp.id_bahan AND dp.no_pembelian = pp.no_pembelian AND DATE_FORMAT(pp.tgl, '%Y') = '" . $thn . "'
    GROUP BY
        p.id_bahan;")->getResultArray();
    }
    public function GrandTotalTahunan($thn)
    {
        return $this->db->query("SELECT
        SUM(dp.total) AS totalharga
    FROM
        bahan AS p,
        detail_pembelian AS dp,
        pembelian AS pp
    WHERE
        p.id_bahan = dp.id_bahan AND dp.id_pembelian = pp.id_pembelian AND DATE_FORMAT(pp.tgl, '%Y') = '" . $thn . "' ")->getResultArray();
    }
}

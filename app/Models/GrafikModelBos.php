<?php

namespace App\Models;

use CodeIgniter\Model;

class GrafikModelBos extends Model
{
    // cek penjualan 1 hari
    public function cekPenjualan1Hari()
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjualan p WHERE p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getROw();
    }
    // cek penjualan 7 hari
    public function cekPenjualan7Hari()
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjualan p WHERE  p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // cek penjualan 90 hari
    public function cekPenjualan90Hari()
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjualan p WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // cek penjahitan 1 hari
    public function cekPenjahitan1Hari()
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjahitan p WHERE p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getROw();
    }
    // cek penjahitan 7 hari
    public function cekPenjahitan7Hari()
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjahitan p WHERE  p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // cek penjahitan 90 hari
    public function cekPenjahitan90Hari()
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjahitan p WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // cek pembelian 1 hari
    public function cekPembelian1Hari()
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM pembelian p WHERE p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getROw();
    }
    // cek pembelian 7 hari
    public function cekPembelian7Hari()
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM pembelian p WHERE  p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // cek pembelian 90 hari
    public function cekPembelian90Hari()
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM pembelian p WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }

    // 1 HARI PENJUALAN
    public function getTotalPenjualan1Hari()
    {
        return $this->db->query("SELECT
        p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit,
        TIME(p.tgl) AS waktu, HOUR(p.tgl) AS jam, COUNT(*) AS hitung
    FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND 
        p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY jammenit ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPendapatan1Hari()
    {
        return $this->db->query("SELECT
        p.tgl,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit,
        TIME(p.tgl) AS waktu,
        HOUR(p.tgl) AS jam, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY
        jammenit
        ORDER BY p.tgl")->getResultArray();
    }
    public function getNamaProduk1Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit,
        TIME(p.tgl) AS waktu,
        HOUR(p.tgl) AS jam, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_produk ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPendapatan1Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total
        FROM penjualan p WHERE p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalTerjual1Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk 
        AND p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // 7 HARI PENJUALAN
    public function getTotalPenjualan7Hari()
    {
        return $this->db->query("SELECT
        p.tgl, SUM(dp.jumlah) AS jumlah, DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal, COUNT(*) AS hitung
    FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND 
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY dayname(p.tgl) ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPendapatan7Hari()
    {
        return $this->db->query("SELECT
        p.tgl,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total, DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY dayname(p.tgl) ORDER BY p.tgl")->getResultArray();
    }
    public function getNamaProduk7Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total, DAYNAME(p.tgl) AS hari, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_produk ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPendapatan7Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total
        FROM penjualan p WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalTerjual7Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk 
        AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // 90 HARI PENJUALAN
    public function getTotalPenjualan90Hari()
    {
        return $this->db->query("SELECT
        p.id_penjualan, p.tgl, SUM(dp.jumlah) AS jumlah,
        DATE_FORMAT(p.tgl, '%d-%M') AS bulanhari,
        DATE_FORMAT(p.tgl, '%Y-%m-%d') AS tanggal_grup, COUNT(*) AS hitung
    FROM
        detail_penjualan dp, penjualan p, produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY
        tanggal_grup
        ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPendapatan90Hari()
    {
        return $this->db->query("SELECT
        p.tgl,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total, 
        DATE_FORMAT(p.tgl, '%d-%M') AS bulanhari,
        DATE_FORMAT(p.tgl, '%Y-%m-%d') AS tanggal_grup, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY tanggal_grup ORDER BY p.tgl")->getResultArray();
    }
    public function getNamaProduk90Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama,
        SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total, DAYNAME(p.tgl) AS hari, COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
        WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_produk ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPendapatan90Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total
        FROM penjualan p WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalTerjual90Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk 
        AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }

    // 1 HARI PEMBELIAN
    // 7 HARI PEMBELIAN
    // 90 HARI PEMBELIAN
    // 1 HARI PENJAHITAN
    // 7 HARI PENJAHITAN
    // 90 HARI PENJAHITAN

    // menampilkan jumlah produk terjual dalam 1 hari HARI
    public function getInfoPerHari($tgl)
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjualan p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getTotalPenjualanPerHari($tgl)
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi, concat('tanggal') as info 
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND date(p.tgl) = '" . $tgl . "'
        GROUP BY waktu ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalTerjualPerHari($tgl)
    {
        return $this->db->query("SELECT DISTINCT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND date(p.tgl) = '" . $tgl . "'")->getRow();
    }
    public function getTotalPendapatanPerHari($tgl)
    {
        return $this->db->query("SELECT CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as waktu, sum(p.total_bayar) as jumlah
    FROM penjualan p WHERE date(p.tgl) = '" . $tgl . "' GROUP BY waktu")->getResultArray();
    }
    public function getRpPendapatanPerHari($tgl)
    {
        return $this->db->query("SELECT sum(p.total_bayar) as jumlah FROM penjualan p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getNamaProdukPerHari($tgl)
    {
        return $this->db->query("SELECT p.id_penjualan, pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM penjualan p, detail_penjualan dp, produk pr
    WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND date(p.tgl) = '" . $tgl . "'
        GROUP BY pr.id_produk ")->getResultArray();
    }

    public function getInfoPerBulan($bln)
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu  FROM penjualan p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getTotalPenjualanPerBulan($bln)
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%d')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi, concat('bulan') as info
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "'
        GROUP BY waktu ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalTerjualPerBulan($bln)
    {
        return $this->db->query("SELECT DISTINCT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "'")->getRow();
    }
    public function getTotalPendapatanPerBulan($bln)
    {
        return $this->db->query("SELECT CONCAT(DATE_FORMAT(p.tgl, '%d')) as waktu, sum(p.total_bayar) as jumlah
    FROM penjualan p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' GROUP BY waktu")->getResultArray();
    }
    public function getRpPendapatanPerBulan($bln)
    {
        return $this->db->query("SELECT sum(p.total_bayar) as jumlah FROM penjualan p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getNamaProdukPerBulan($bln)
    {
        return $this->db->query("SELECT p.id_penjualan, pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM penjualan p, detail_penjualan dp, produk pr
    WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "'
        GROUP BY pr.id_produk ")->getResultArray();
    }

    public function getInfoPerTahun($thn)
    {
        return $this->db->query("SELECT p.id_penjualan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu  FROM penjualan p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }
    public function getTotalPenjualanPerTahun($thn)
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, CONCAT(DATE_FORMAT(p.tgl, '%M')) as waktu , date(p.tgl) AS tanggal, TIME(p.tgl) AS jammenitdetik, COUNT(*) AS transaksi , CONCAT(DATE_FORMAT(p.tgl, '%m')) as wkt, concat('tahun') as info
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "'
        GROUP BY wkt ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalTerjualPerTahun($thn)
    {
        return $this->db->query("SELECT DISTINCT SUM(dp.jumlah) AS jumlah
        FROM detail_penjualan dp, penjualan p, produk pr
        WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "'")->getRow();
    }
    public function getTotalPendapatanPerTahun($thn)
    {
        return $this->db->query("SELECT CONCAT(DATE_FORMAT(p.tgl, '%M')) as waktu, sum(p.total_bayar) as jumlah
    FROM penjualan p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' GROUP BY waktu")->getResultArray();
    }
    public function getRpPendapatanPerTahun($thn)
    {
        return $this->db->query("SELECT sum(p.total_bayar) as jumlah FROM penjualan p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }
    public function getNamaProdukPerTahun($thn)
    {
        return $this->db->query("SELECT p.id_penjualan, pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM penjualan p, detail_penjualan dp, produk pr
    WHERE p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "'
        GROUP BY pr.id_produk ")->getResultArray();
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

    // Grafik Pembelian
    public function thnPembelian()
    {
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(p.tgl, '%Y') as tahun FROM pembelian as p ORDER BY tahun DESC")->getResultArray();
    }
    public function getInfoPerHariPembelian($tgl)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM pembelian p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getInfoPerBulanPembelian($bln)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu  FROM pembelian p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getInfoPerTahunPembelian($thn)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu  FROM pembelian p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }


    // Grafik Produksi / Penjahitan
    public function thnPenjahitan()
    {
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(p.tgl, '%Y') as tahun FROM penjahitan as p ORDER BY tahun DESC")->getResultArray();
    }
    public function getInfoPerHariPenjahitan($tgl)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjahitan p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getInfoPerBulanPenjahitan($bln)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu  FROM penjahitan p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getInfoPerTahunPenjahitan($thn)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu  FROM penjahitan p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }

    // Grafik Mitra
    public function thnMitra()
    {
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(p.tgl, '%Y') as tahun FROM pembelian as p ORDER BY tahun DESC")->getResultArray();
    }
    public function getInfoPerHariMitra($tgl)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM pembelian p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getInfoPerBulanMitra($bln)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu  FROM pembelian p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getInfoPerTahunMitra($thn)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu  FROM pembelian p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }
    public function getJumlahPembelianMitraFull()
    {
        return $this->db->query("SELECT p.tgl,SUM(d.jumlah) AS jumlah, pp.nama,p.id_supplier,COUNT(*) AS hitung
        FROM detail_pembelian d, pembelian p, mitra pp
        WHERE p.no_pembelian=d.no_pembelian && p.id_supplier=pp.id_mitra 
        GROUP BY p.id_supplier")->getResultArray();
    }
    public function getJumlahPembelianMitraPerHari($tgl)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu, p.id_supplier, sum(d.jumlah) as jumlah, pp.nama FROM pembelian p, detail_pembelian d, mitra pp WHERE p.no_pembelian=d.no_pembelian && pp.id_mitra=p.id_supplier && date(p.tgl) = '" . $tgl . "' GROUP BY p.id_supplier")->getResultArray();
    }
    public function getJumlahPembelianMitraPerBulan($bln)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu, p.id_supplier, sum(d.jumlah) as jumlah, pp.nama FROM pembelian p, detail_pembelian d, mitra pp WHERE p.no_pembelian=d.no_pembelian && pp.id_mitra=p.id_supplier && DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' GROUP BY p.id_supplier")->getResultArray();
    }
    public function getJumlahPembelianMitraPerTahun($thn)
    {
        return $this->db->query("SELECT p.no_pembelian as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu, p.id_supplier, sum(d.jumlah) as jumlah, pp.nama FROM pembelian p, detail_pembelian d, mitra pp WHERE p.no_pembelian=d.no_pembelian && pp.id_mitra=p.id_supplier && DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' GROUP BY p.id_supplier")->getResultArray();
    }

    // Grafik Penjahit
    public function thnPenjahit()
    {
        return $this->db->query("SELECT DISTINCT DATE_FORMAT(p.tgl, '%Y') as tahun FROM penjahitan as p ORDER BY tahun DESC")->getResultArray();
    }
    public function getInfoPerHariPenjahit($tgl)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu  FROM penjahitan p WHERE date(p.tgl) = '" . $tgl . "' ")->getRow();
    }
    public function getInfoPerBulanPenjahit($bln)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu  FROM penjahitan p WHERE DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' ")->getRow();
    }
    public function getInfoPerTahunPenjahit($thn)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu  FROM penjahitan p WHERE  DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' ")->getRow();
    }
    public function getJumlahProdukPenjahitFull()
    {
        return $this->db->query("SELECT p.tgl,SUM(d.jumlah) AS jumlah, pp.nama,p.id_penjahit,COUNT(*) AS hitung
        FROM detail_jahit d, penjahitan p, penjahit pp
        WHERE p.no_penjahitan=d.no_penjahitan && p.id_penjahit=pp.id_penjahit 
        GROUP BY p.id_penjahit")->getResultArray();
    }

    public function getJumlahProdukPenjahitPerHari($tgl)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'hari %W, %e %M %Y')) as waktu, p.id_penjahit, sum(d.jumlah) as jumlah, pp.nama FROM penjahitan p, detail_jahit d, penjahit pp WHERE p.no_penjahitan=d.no_penjahitan && pp.id_penjahit=p.id_penjahit && date(p.tgl) = '" . $tgl . "' GROUP BY p.id_penjahit")->getResultArray();
    }
    public function getJumlahProdukPenjahitPerBulan($bln)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'bulan %M %Y')) as waktu, p.id_penjahit, sum(d.jumlah) as jumlah, pp.nama FROM penjahitan p, detail_jahit d, penjahit pp WHERE p.no_penjahitan=d.no_penjahitan && pp.id_penjahit=p.id_penjahit && DATE_FORMAT(p.tgl, '%Y-%m') = '" . $bln . "' GROUP BY p.id_penjahit")->getResultArray();
    }
    public function getJumlahProdukPenjahitPerTahun($thn)
    {
        return $this->db->query("SELECT p.no_penjahitan as hasil, CONCAT(DATE_FORMAT(p.tgl, 'tahun %Y')) as waktu, p.id_penjahit, sum(d.jumlah) as jumlah, pp.nama FROM penjahitan p, detail_jahit d, penjahit pp WHERE p.no_penjahitan=d.no_penjahitan && pp.id_penjahit=p.id_penjahit && DATE_FORMAT(p.tgl, '%Y') = '" . $thn . "' GROUP BY p.id_penjahit")->getResultArray();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = "id_produk";
    protected $allowedFields = ['nama', 'ukuran', 'biaya_produksi', 'biaya_jual', 'jumlah', 'status'];

    public function getProduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_produk' => $id]);
        }
    }

    public function insertProduk($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduk($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_produk' => $id]);
    }
    public function getProdukAktif()
    {
        // return $this->db->table('view_jumlah_produk_penjualan_tahunan')->get()->getResultArray();
        return $this->db->query('SELECT * FROM `produk` WHERE status="Active"')->getResultArray();
    }

    // model untuk grafik
    public function getTahunPenjualan()
    {
        // return $this->db->table('view_jumlah_produk_penjualan_tahunan')->get()->getResultArray();
        return $this->db->query('SELECT DISTINCT
        YEAR(p.tgl) AS tahun
    FROM
        penjualan p ORDER BY YEAR(p.tgl) DESC')->getResultArray();
    }

    public function getTotalPenjualanTahunan()
    {
        // return $this->db->table('view_jumlah_produk_penjualan_tahunan')->get()->getResultArray();
        return $this->db->query('SELECT DISTINCT
        YEAR(p.tgl) AS tahun,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk
    GROUP BY
        YEAR(p.tgl)')->getResultArray();
    }
    public function getTotalPenjualan1Hari()
    {
        // menampilkan jumlah produk terjual dalam 1 hari 
        return $this->db->query("SELECT
        p.tgl,
        SUM(dp.jumlah) AS jumlah,
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
    public function getTotalPenjualan7Hari()
    {
        // menampilkan jumlah produk terjual dalam 1 pekan 
        return $this->db->query("SELECT
        p.id_penjualan,
        p.tgl,
        SUM(dp.jumlah) AS jumlah,
        DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal,
        COUNT(*) AS hitung
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk = dp.id_produk AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
    GROUP BY
        dayname(p.tgl)
        ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPenjualan90Hari()
    {
        // menampilkan jumlah produk terjual dalam 90 hari 
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

    public function getTotalTerjualTahunan()
    {
        return $this->db->query('SELECT DISTINCT
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk')->getResultArray();
    }

    public function getTotalPendapatanTahunan()
    {
        return $this->db->query('SELECT
year(p.tgl) as tahun,
	sum(p.total_bayar) as total
    FROM penjualan p
    GROUP BY year(p.tgl)')->getResultArray();
    }

    public function getRpPendapatanTahunan()
    {
        return $this->db->query('SELECT
        sum(p.total_bayar) as total
        FROM penjualan p')->getResultArray();
    }

    public function getNamaProdukTahunan()
    {
        return $this->db->query('SELECT
        p.id_penjualan,
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk
        GROUP BY pr.id_produk ')->getResultArray();
    }

    // DATA GRAFIK SEBELAH KIRI BULANAN
    public function getTotalPejualanBulananTahun2019()
    {
        return $this->db->query('SELECT DISTINCT
        monthname(p.tgl) AS bulan,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2019
    GROUP BY
        month(p.tgl)')->getResultArray();
    }
    public function getTotalPejualanBulananTahun2020()
    {
        return $this->db->query('SELECT DISTINCT
        monthname(p.tgl) AS bulan,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2020
    GROUP BY
        month(p.tgl)')->getResultArray();
    }
    public function getTotalPejualanBulananTahun2021()
    {
        return $this->db->query('SELECT DISTINCT
        monthname(p.tgl) AS bulan,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2021
    GROUP BY
        month(p.tgl)')->getResultArray();
    }
    public function getTotalPejualanBulananTahun2022()
    {
        return $this->db->query('SELECT DISTINCT
        monthname(p.tgl) AS bulan,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2022
    GROUP BY
        month(p.tgl)')->getResultArray();
    }
    public function getTotalPejualanBulananTahun2023()
    {
        return $this->db->query('SELECT DISTINCT
        monthname(p.tgl) AS bulan,
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2023
    GROUP BY
        month(p.tgl)')->getResultArray();
    }

    public function getTotalTerjualBulanan2019()
    {
        return $this->db->query('SELECT 
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2019')->getResultArray();
    }
    public function getTotalTerjualBulanan2020()
    {
        return $this->db->query('SELECT 
        SUM(dp.jumlah) AS jumlah
    FROM
        detail_penjualan dp,
        penjualan p,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND
        pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2020')->getResultArray();
    }
    public function getTotalTerjualBulanan2021()
    {
        return $this->db->query('SELECT 
    SUM(dp.jumlah) AS jumlah
FROM
    detail_penjualan dp,
    penjualan p,
    produk pr
WHERE
    p.id_penjualan = dp.id_penjualan AND
    pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2021')->getResultArray();
    }
    public function getTotalTerjualBulanan2022()
    {
        return $this->db->query('SELECT 
    SUM(dp.jumlah) AS jumlah
FROM
    detail_penjualan dp,
    penjualan p,
    produk pr
WHERE
    p.id_penjualan = dp.id_penjualan AND
    pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2022')->getResultArray();
    }
    public function getTotalTerjualBulanan2023()
    {
        return $this->db->query('SELECT 
    SUM(dp.jumlah) AS jumlah
FROM
    detail_penjualan dp,
    penjualan p,
    produk pr
WHERE
    p.id_penjualan = dp.id_penjualan AND
    pr.id_produk=dp.id_produk AND YEAR(p.tgl)=2023')->getResultArray();
    }

    // DATA GRAFIK SEBELAH KANAN BULANAN
    public function getTotalPendapatanBulanan2019()
    {
        return $this->db->query('SELECT
monthname(p.tgl) as bulan,
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2019
    GROUP BY month(p.tgl)')->getResultArray();
    }
    public function getTotalPendapatanBulanan2020()
    {
        return $this->db->query('SELECT
        monthname(p.tgl) as bulan,
            sum(p.total_bayar) as total
            FROM penjualan p
            WHERE year(p.tgl)=2020
            GROUP BY month(p.tgl)')->getResultArray();
    }
    public function getTotalPendapatanBulanan2021()
    {
        return $this->db->query('SELECT
        monthname(p.tgl) as bulan,
            sum(p.total_bayar) as total
            FROM penjualan p
            WHERE year(p.tgl)=2021
            GROUP BY month(p.tgl)')->getResultArray();
    }
    public function getTotalPendapatanBulanan2022()
    {
        return $this->db->query('SELECT
        monthname(p.tgl) as bulan,
            sum(p.total_bayar) as total
            FROM penjualan p
            WHERE year(p.tgl)=2022
            GROUP BY month(p.tgl)')->getResultArray();
    }
    public function getTotalPendapatanBulanan2023()
    {
        return $this->db->query('SELECT
        monthname(p.tgl) as bulan,
            sum(p.total_bayar) as total
            FROM penjualan p
            WHERE year(p.tgl)=2023
            GROUP BY month(p.tgl)')->getResultArray();
    }
    public function getRpPendapatanBulanan2019()
    {
        return $this->db->query('SELECT
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2019')->getResultArray();
    }
    public function getRpPendapatanBulanan2020()
    {
        return $this->db->query('SELECT
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2020')->getResultArray();
    }
    public function getRpPendapatanBulanan2021()
    {
        return $this->db->query('SELECT
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2021')->getResultArray();
    }
    public function getRpPendapatanBulanan2022()
    {
        return $this->db->query('SELECT
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2022')->getResultArray();
    }
    public function getRpPendapatanBulanan2023()
    {
        return $this->db->query('SELECT
	sum(p.total_bayar) as total
    FROM penjualan p
    WHERE year(p.tgl)=2023')->getResultArray();
    }

    // DATA GRAFIK SEBELAH TENGAH BULANAN
    public function getNamaProdukBulanan2019()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND year(p.tgl)=2019 GROUP BY pr.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2020()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND year(p.tgl)=2020 GROUP BY pr.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2021()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND year(p.tgl)=2021 GROUP BY pr.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2022()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND year(p.tgl)=2022 GROUP BY pr.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2023()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjualan p,
        detail_penjualan dp,
        produk pr
    WHERE
        p.id_penjualan = dp.id_penjualan AND pr.id_produk=dp.id_produk AND year(p.tgl)=2023 GROUP BY pr.id_produk')->getResultArray();
    }
    // public function getTotalProdukBulanan2019()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2019 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2020()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2020 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2021()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2021 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2022()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2022 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2023()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2023 vd')->getResultArray();
    // }
}

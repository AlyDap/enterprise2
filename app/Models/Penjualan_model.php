<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjualan_model extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penjualan';
    protected $primaryKey       = 'id_penjualan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_penjualan', 'tanggal', 'total_bayar', 'id_user'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPenjualan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_penjualan' => $id]);
        }
    }

    public function insertPenjualan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function ambilIdTerbaru()
    {
        return $this->db->query('SELECT id_penjualan FROM `penjualan` ORDER BY id_penjualan DESC LIMIT 1;')->getResultArray();
    }

    // model untuk grafik
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
}

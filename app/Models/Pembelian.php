<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelian extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pembelian';
    protected $primaryKey       = 'no_pembelian';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_pembelian', 'tgl', 'total_bayar', 'id_supplier', 'id_user'];

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

    public function getPembelian($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['no_pembelian' => $id]);
        }
    }

    public function insertPembelian($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function ambilIdTerbaru()
    {
        return $this->db->query('SELECT no_pembelian FROM `pembelian` ORDER BY no_pembelian DESC LIMIT 1;')->getResultArray();
    }

    // 1 HARI PEMBELIAN
    // getNamaBahan getRpPengeluaranPembelian getTotalDibeli
    public function getTotalPembelian1Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, 
        CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit, COUNT(*) AS hitung
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan AND 
        p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY jammenit ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPengeluaranPembelian1Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(p.total_bayar) AS total,
        CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) AS jammenit,COUNT(*) AS hitung
        FROM pembelian p
        WHERE
        p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY) GROUP BY jammenit
        ORDER BY p.tgl ")->getResultArray();
    }
    public function getNamaBahan1Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama, SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        CONCAT(DATE_FORMAT(p.tgl, '%H:%i')) as jammenit,
        TIME(p.tgl) AS waktu,
        HOUR(p.tgl) AS jam, COUNT(*) AS hitung
        FROM detail_pembelian dp,pembelian p,bahan pr
        WHERE
        p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan 
        AND p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_bahan ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPengeluaranPembelian1Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total FROM pembelian p 
        WHERE p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalDibeli1Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan=dp.id_bahan 
        AND p.tgl >= CURDATE() AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // 7 HARI PEMBELIAN
    public function getTotalPembelian7Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, 
        DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal,
        COUNT(*) AS hitung
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan AND 
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY hari ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPengeluaranPembelian7Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(p.total_bayar) AS total,
        DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal,
        COUNT(*) AS hitung
        FROM pembelian p
        WHERE
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY hari ORDER BY p.tgl ")->getResultArray();
    }
    public function getNamaBahan7Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama, SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        DAYNAME(p.tgl) AS hari,
        DATE_FORMAT(p.tgl, '%W-%d') AS haritanggal,
        COUNT(*) AS hitung
        FROM detail_pembelian dp,pembelian p,bahan pr
        WHERE
        p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan AND 
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_bahan ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPengeluaranPembelian7Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total FROM pembelian p 
        WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalDibeli7Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan=dp.id_bahan 
        AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 6 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // 90 HARI PEMBELIAN
    public function getTotalPembelian90Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, 
        DATE_FORMAT(p.tgl, '%d-%M') AS bulanhari,
        DATE_FORMAT(p.tgl, '%Y-%m-%d') AS tanggal_grup,
        COUNT(*) AS hitung
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan AND 
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY tanggal_grup ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPengeluaranPembelian90Hari()
    {
        return $this->db->query("SELECT p.tgl, SUM(p.total_bayar) AS total,        
        DATE_FORMAT(p.tgl, '%d-%M') AS bulanhari,
        DATE_FORMAT(p.tgl, '%Y-%m-%d') AS tanggal_grup,
        COUNT(*) AS hitung
        FROM pembelian p
        WHERE
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY) 
        GROUP BY tanggal_grup ORDER BY p.tgl ")->getResultArray();
    }
    public function getNamaBahan90Hari()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama, SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        DATE_FORMAT(p.tgl, '%d-%M') AS bulanhari,
        DATE_FORMAT(p.tgl, '%Y-%m-%d') AS tanggal_grup,
        COUNT(*) AS hitung
        FROM detail_pembelian dp,pembelian p,bahan pr
        WHERE
        p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan AND 
        p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)
        GROUP BY pr.id_bahan ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPengeluaranPembelian90Hari()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total FROM pembelian p 
        WHERE p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    public function getTotalDibeli90Hari()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan=dp.id_bahan 
        AND p.tgl >= DATE_SUB(CURDATE(), INTERVAL 89 DAY) AND p.tgl < DATE_ADD(CURDATE(), INTERVAL 1 DAY)")->getRow();
    }
    // seumur hidup pembelian
    public function getTotalPembelianTahunan()
    {
        return $this->db->query("SELECT p.tgl, SUM(dp.jumlah) AS jumlah, 
        YEAR(p.tgl) AS tahun,
        COUNT(*) AS hitung
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan 
        GROUP BY YEAR(p.tgl) ORDER BY p.tgl")->getResultArray();
    }
    public function getTotalPengeluaranPembelianTahunan()
    {
        return $this->db->query("SELECT p.tgl, SUM(p.total_bayar) AS total,        
       YEAR(p.tgl) AS tahun,
        COUNT(*) AS hitung
        FROM pembelian p
        GROUP BY YEAR(p.tgl) ORDER BY p.tgl ")->getResultArray();
    }
    public function getNamaBahanTahunan()
    {
        return $this->db->query("SELECT
        p.tgl,pr.nama, SUM(dp.jumlah) AS jumlah, sum(p.total_bayar) as total,
        YEAR(p.tgl) AS tahun,
        COUNT(*) AS hitung
        FROM detail_pembelian dp,pembelian p,bahan pr
        WHERE
        p.no_pembelian = dp.no_pembelian AND pr.id_bahan = dp.id_bahan 
        GROUP BY pr.id_bahan ORDER BY p.tgl")->getResultArray();
    }
    public function getRpPengeluaranPembelianTahunan()
    {
        return $this->db->query("SELECT sum(p.total_bayar) as total FROM pembelian p")->getRow();
    }
    public function getTotalDibeliTahunan()
    {
        return $this->db->query("SELECT SUM(dp.jumlah) AS jumlah
        FROM detail_pembelian dp, pembelian p, bahan pr
        WHERE p.no_pembelian = dp.no_pembelian AND pr.id_bahan=dp.id_bahan")->getRow();
    }
}

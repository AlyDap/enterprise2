<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjahitan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penjahitan';
    protected $primaryKey       = 'no_penjahitan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_penjahitan', 'id_penjahit', 'total_bayar', 'tgl', 'id_bahan', 'total_bahan', 'id_user'];

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

    public function getPenjahitan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['no_penjahitan' => $id]);
        }
    }

    public function insertPenjahitan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function ambilIdTerbaru()
    {
        return $this->db->query('SELECT no_penjahitan FROM `penjahitan` ORDER BY no_penjahitan DESC LIMIT 1;')->getResultArray();
    }

    public function getTahunProduksiBatik()
    {
        return $this->db->query('SELECT p.no_penjahitan, year(p.tgl) AS tahun FROM penjahitan AS p')->getResultArray();
    }
    public function getBulanProduksiBatik()
    {
        return $this->db->query('SELECT DISTINCT  month(p.tgl) AS bulan, monthname(p.tgl) AS namabulan FROM penjahitan AS p')->getResultArray();
    }

    public function getTotalProduksiBatik()
    {
        return $this->db->query('SELECT
        pr.id_produk,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        penjahitan p,
        detail_jahit dp,
        produk pr
    WHERE
        p.no_penjahitan = dp.no_penjahitan AND pr.id_produk=dp.id_produk GROUP BY pr.id_produk')->getResultArray();
    }
}

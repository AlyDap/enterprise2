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
        return $this->db->table('view_jumlah_produk_penjualan_tahunan')->get()->getResultArray();
    }
    public function getTotalTerjualTahunan()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_tahunan')->getResultArray();
    }


    public function getTotalPendapatanTahunan()
    {
        return $this->db->table('view_pendapatan_penjualan_tahunan')->get()->getResultArray();
    }

    public function getRpPendapatanTahunan()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_tahunan')->getResultArray();
    }

    public function getNamaProdukTahunan()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_tahunan vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    public function getTotalProdukTahunan()
    {
        return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_tahunan vd')->getResultArray();
    }
}

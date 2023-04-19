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

    public function getTotalPenjualanTahunan()
    {
        return $this->db->table('view_jumlah_produk_penjualan_tahunan')->get()->getResultArray();
    }

    public function getTotalPendapatanTahunan()
    {
        return $this->db->table('view_pendapatan_penjualan_tahunan')->get()->getResultArray();
    }

    public function insertProduk($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduk($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_produk' => $id]);
    }
}

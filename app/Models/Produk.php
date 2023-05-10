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

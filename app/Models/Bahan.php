<?php

namespace App\Models;

use CodeIgniter\Model;

class Bahan extends Model
{
    protected $table = 'bahan';
    protected $primaryKey = "id_bahan";
    protected $allowedFields = ['nama', 'jumlah', 'harga', 'status'];

    public function getBahan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_bahan' => $id]);
        }
    }
    public function getBahanAktif()
    {
        return $this->db->query('SELECT * FROM `bahan` WHERE status="Active"')->getResultArray();
    }
    public function insertBahan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBahan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_bahan' => $id]);
    }

    // model untuk grafik
    public function getTotalPembelian()
    {
        return $this->db->query('SELECT
        pr.id_bahan,pr.nama, SUM(dp.jumlah) as jumlah
    FROM
        pembelian p,
        detail_pembelian dp,
        bahan pr
    WHERE
        p.no_pembelian = dp.no_pembelian AND pr.id_bahan=dp.id_bahan GROUP BY pr.id_bahan')->getResultArray();
    }
}

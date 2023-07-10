<?php

namespace App\Models;

use CodeIgniter\Model;

class Penjahit extends Model
{
    protected $table = 'penjahit';
    protected $allowedFields = ['nama', 'alamat', 'status'];

    public function getPenjahit($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_penjahit' => $id]);
        }
    }
    public function getPenjahitAktif()
    {
        return $this->db->query('SELECT * FROM `penjahit` WHERE status="Active"')->getResultArray();
    }

    public function insertPenjahit($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePenjahit($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_penjahit' => $id]);
    }
}

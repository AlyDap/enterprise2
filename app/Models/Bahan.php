<?php

namespace App\Models;

use CodeIgniter\Model;

class Bahan extends Model
{
    protected $table = 'bahan';
    protected $allowedFields = ['nama', 'stok', 'harga', 'status'];

    public function getBahan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_bahan' => $id]);
        }
    }

    public function insertBahan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBahan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_bahan' => $id]);
    }
}

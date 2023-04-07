<?php

namespace App\Models;

use CodeIgniter\Model;

class Bos_model extends Model
{
    protected $table = 'bahan';
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

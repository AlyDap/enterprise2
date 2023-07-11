<?php

namespace App\Models;

use CodeIgniter\Model;

class Mitra extends Model
{
    protected $table = 'mitra';
    protected $allowedFields = ['nama', 'alamat', 'status'];

    public function getMitra($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_mitra' => $id]);
        }
    }
    public function getMitraAktif()
    {
        return $this->db->query('SELECT * FROM `mitra` WHERE status="Active"')->getResultArray();
    }
    public function insertMitra($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMitra($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_mitra' => $id]);
    }
}

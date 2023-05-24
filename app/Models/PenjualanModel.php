<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';

    public function insertPenjualan()
    {
        $data = [
            'tanggal' => date('Y-m-d'),
            // Tambahkan field lain yang diperlukan
        ];

        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function insertDetailPenjualan($idPenjualan, $harga, $jumlah)
    {
        $data = [
            'id_penjualan' => $idPenjualan,
            'harga' => $harga,
            'jumlah' => $jumlah,
        ];

        $this->db->table('detail_penjualan')->insert($data);
    }
}

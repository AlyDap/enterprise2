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
    // public function getTotalProdukTahunan()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_tahunan vd')->getResultArray();
    // }

    // DATA GRAFIK SEBELAH KIRI BULANAN
    public function getTotalPejualanBulananTahun2019()
    {
        return $this->db->table('view_jumlah_produk_penjualan_bulanan_2019')->get()->getResultArray();
    }
    public function getTotalPejualanBulananTahun2020()
    {
        return $this->db->table('view_jumlah_produk_penjualan_bulanan_2020')->get()->getResultArray();
    }
    public function getTotalPejualanBulananTahun2021()
    {
        return $this->db->table('view_jumlah_produk_penjualan_bulanan_2021')->get()->getResultArray();
    }
    public function getTotalPejualanBulananTahun2022()
    {
        return $this->db->table('view_jumlah_produk_penjualan_bulanan_2022')->get()->getResultArray();
    }
    public function getTotalPejualanBulananTahun2023()
    {
        return $this->db->table('view_jumlah_produk_penjualan_bulanan_2023')->get()->getResultArray();
    }
    public function getTotalTerjualBulanan2019()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_bulanan_2019')->getResultArray();
    }
    public function getTotalTerjualBulanan2020()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_bulanan_2020')->getResultArray();
    }
    public function getTotalTerjualBulanan2021()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_bulanan_2021')->getResultArray();
    }
    public function getTotalTerjualBulanan2022()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_bulanan_2022')->getResultArray();
    }
    public function getTotalTerjualBulanan2023()
    {
        return $this->db->query('SELECT DISTINCT SUM(jumlah) AS jumlah from view_jumlah_produk_penjualan_bulanan_2023')->getResultArray();
    }

    // DATA GRAFIK SEBELAH KANAN BULANAN
    public function getTotalPendapatanBulanan2019()
    {
        return $this->db->table('view_pendapatan_penjualan_bulanan_2019')->get()->getResultArray();
    }
    public function getTotalPendapatanBulanan2020()
    {
        return $this->db->table('view_pendapatan_penjualan_bulanan_2020')->get()->getResultArray();
    }
    public function getTotalPendapatanBulanan2021()
    {
        return $this->db->table('view_pendapatan_penjualan_bulanan_2021')->get()->getResultArray();
    }
    public function getTotalPendapatanBulanan2022()
    {
        return $this->db->table('view_pendapatan_penjualan_bulanan_2022')->get()->getResultArray();
    }
    public function getTotalPendapatanBulanan2023()
    {
        return $this->db->table('view_pendapatan_penjualan_bulanan_2023')->get()->getResultArray();
    }
    public function getRpPendapatanBulanan2019()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_bulanan_2019')->getResultArray();
    }
    public function getRpPendapatanBulanan2020()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_bulanan_2020')->getResultArray();
    }
    public function getRpPendapatanBulanan2021()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_bulanan_2021')->getResultArray();
    }
    public function getRpPendapatanBulanan2022()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_bulanan_2022')->getResultArray();
    }
    public function getRpPendapatanBulanan2023()
    {
        return $this->db->query('SELECT DISTINCT SUM(total) AS total from view_pendapatan_penjualan_bulanan_2023')->getResultArray();
    }

    // DATA GRAFIK SEBELAH TENGAH BULANAN
    public function getNamaProdukBulanan2019()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2019 vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2020()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2020 vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2021()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2021 vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2022()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2022 vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    public function getNamaProdukBulanan2023()
    {
        return $this->db->query('SELECT vd.id_produk,p.nama, SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2023 vd, produk p WHERE p.id_produk = vd.id_produk GROUP BY p.id_produk')->getResultArray();
    }
    // public function getTotalProdukBulanan2019()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2019 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2020()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2020 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2021()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2021 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2022()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2022 vd')->getResultArray();
    // }
    // public function getTotalProdukBulanan2023()
    // {
    //     return $this->db->query('SELECT SUM(vd.jumlah) as jumlah FROM view_data_penjualan_bulanan_2023 vd')->getResultArray();
    // }
}

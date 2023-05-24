<?php

namespace App\Controllers;

use App\Models\PenjualanModel;

class TransaksiController extends BaseController
{
    public function index()
    {
        return view('transaksi/form_tambah_transaksi');
    }

    public function simpan()
    {
        // Ambil data input dari form
        $harga = $this->request->getPost('harga');
        $jumlah = $this->request->getPost('jumlah');

        // Validasi input

        // Proses penyimpanan data
        $penjualanModel = new PenjualanModel();
        // Simpan data penjualan
        $idPenjualan = $penjualanModel->insertPenjualan();

        // Simpan data detail penjualan
        for ($i = 0; $i < count($harga); $i++) {
            $penjualanModel->insertDetailPenjualan($idPenjualan, $harga[$i], $jumlah[$i]);
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->to(base_url('transaksi'))->with('success', 'Data penjualan berhasil disimpan.');
    }
}

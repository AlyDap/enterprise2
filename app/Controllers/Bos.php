<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\GrafikModelBos;
use App\Models\Mitra;
use App\Models\Penjahit;
use App\Models\Produk;

class Bos extends BaseController
{

    public function index()
    {
        $model = new Produk();
        $modelGrafik = new GrafikModelBos();

        $data = [
            'title' => 'Dashboard Bos'
        ];


        // $data['tahungrafik'] = $model->getTahunPenjualan();



        // grafik penjualan
        // cek penjualan
        $data['cekPenjualan1Hari'] = $modelGrafik->cekPenjualan1Hari();
        $data['cekPenjualan7Hari'] = $modelGrafik->cekPenjualan7Hari();
        $data['cekPenjualan90Hari'] = $modelGrafik->cekPenjualan90Hari();
        // setiap 1 hari
        $data['grafik1hariA'] = $modelGrafik->getTotalPenjualan1Hari();
        $data['grafik1hariB'] = $modelGrafik->getTotalPendapatan1Hari();;
        $data['grafik1hariC'] = $modelGrafik->getNamaProduk1Hari();
        $data['Rp1hari'] = $modelGrafik->getRpPendapatan1Hari();
        $data['Qty1hari'] = $modelGrafik->getTotalTerjual1Hari();
        // setiap 7 hari
        $data['grafik7hariA'] = $modelGrafik->getTotalPenjualan7Hari();
        $data['grafik7hariB'] = $modelGrafik->getTotalPendapatan7Hari();;
        $data['grafik7hariC'] = $modelGrafik->getNamaProduk7Hari();
        $data['Rp7hari'] = $modelGrafik->getRpPendapatan7Hari();
        $data['Qty7hari'] = $modelGrafik->getTotalTerjual7Hari();
        // setiap 90 hari
        $data['grafik90hariA'] = $modelGrafik->getTotalPenjualan90Hari();
        $data['grafik90hariB'] = $modelGrafik->getTotalPendapatan90Hari();;
        $data['grafik90hariC'] = $modelGrafik->getNamaProduk90Hari();
        $data['Rp90hari'] = $modelGrafik->getRpPendapatan90Hari();
        $data['Qty90hari'] = $modelGrafik->getTotalTerjual90Hari();
        //setiap tahun
        $data['grafik'] = $model->getTotalPenjualanTahunan();
        $data['grafik2'] = $model->getTotalPendapatanTahunan();;
        $data['grafik3'] = $model->getNamaProdukTahunan();
        $data['Rptahunan'] = $model->getRpPendapatanTahunan();
        $data['Qtytahunan'] = $model->getTotalTerjualTahunan();

        // grafik pembelian
        // cek pembelian
        $data['cekPembelian1Hari'] = $modelGrafik->cekPembelian1Hari();
        $data['cekPembelian7Hari'] = $modelGrafik->cekPembelian7Hari();
        $data['cekPembelian90Hari'] = $modelGrafik->cekPembelian90Hari();
        $data['cekPembelianTahunan'] = $modelGrafik->cekPembelianTahunan();
        // setiap 1 hari
        $data['grafikpembelian1hariA'] = $modelGrafik->getTotalPembelian1Hari();
        $data['grafikpembelian1hariB'] = $modelGrafik->getTotalPengeluaranPembelian1Hari();;
        $data['grafikpembelian1hariC'] = $modelGrafik->getNamaBahan1Hari();
        $data['RpPembelian1hari'] = $modelGrafik->getRpPengeluaranPembelian1Hari();
        $data['QtyPembelian1hari'] = $modelGrafik->getTotalDibeli1Hari();
        // setiap 7 hari
        $data['grafikpembelian7hariA'] = $modelGrafik->getTotalPembelian7Hari();
        $data['grafikpembelian7hariB'] = $modelGrafik->getTotalPengeluaranPembelian7Hari();;
        $data['grafikpembelian7hariC'] = $modelGrafik->getNamaBahan7Hari();
        $data['RpPembelian7hari'] = $modelGrafik->getRpPengeluaranPembelian7Hari();
        $data['QtyPembelian7hari'] = $modelGrafik->getTotalDibeli7Hari();
        // setiap 90 hari
        $data['grafikpembelian90hariA'] = $modelGrafik->getTotalPembelian90Hari();
        $data['grafikpembelian90hariB'] = $modelGrafik->getTotalPengeluaranPembelian90Hari();;
        $data['grafikpembelian90hariC'] = $modelGrafik->getNamaBahan90Hari();
        $data['RpPembelian90hari'] = $modelGrafik->getRpPengeluaranPembelian90Hari();
        $data['QtyPembelian90hari'] = $modelGrafik->getTotalDibeli90Hari();
        //setiap tahun
        $data['grafikpembeliantahunanA'] = $modelGrafik->getTotalPembelianTahunan();
        $data['grafikpembeliantahunanB'] = $modelGrafik->getTotalPengeluaranPembelianTahunan();;
        $data['grafikpembeliantahunanC'] = $modelGrafik->getNamaBahanTahunan();
        $data['RpPembeliantahunan'] = $modelGrafik->getRpPengeluaranPembelianTahunan();
        $data['QtyPembeliantahunan'] = $modelGrafik->getTotalDibeliTahunan();


        // grafik penjahitan
        // cek penjahitan
        $data['cekPenjahitan1Hari'] = $modelGrafik->cekPenjahitan1Hari();
        $data['cekPenjahitan7Hari'] = $modelGrafik->cekPenjahitan7Hari();
        $data['cekPenjahitan90Hari'] = $modelGrafik->cekPenjahitan90Hari();
        $data['cekPenjahitanTahunan'] = $modelGrafik->cekPenjahitanTahunan();
        // setiap 1 hari
        $data['grafikpenjahitan1HariA'] = $modelGrafik->getTotalPenjahitanProduk1Hari();
        $data['grafikpenjahitan1HariB'] = $modelGrafik->getTotalPenjahitanBahan1Hari();;
        $data['grafikpenjahitan1HariC'] = $modelGrafik->getTotalPengeluaranPenjahitan1Hari();
        $data['grafikpenjahitan1HariD'] = $modelGrafik->getNamaPenjahitanProduk1Hari();
        $data['grafikpenjahitan1HariE'] = $modelGrafik->getNamaPenjahitanBahan1Hari();
        $data['Qtyprodukdihasilkan1Hari'] = $modelGrafik->getTotalProdukDihasilkan1Hari();
        $data['Qtybahandigunakan1Hari'] = $modelGrafik->getTotalBahanDigunakan1Hari();
        $data['RpPenjahitan1Hari'] = $modelGrafik->getRpPengeluaranPenjahitan1Hari();
        // setiap 7 hari
        $data['grafikpenjahitan7HariA'] = $modelGrafik->getTotalPenjahitanProduk7Hari();
        $data['grafikpenjahitan7HariB'] = $modelGrafik->getTotalPenjahitanBahan7Hari();;
        $data['grafikpenjahitan7HariC'] = $modelGrafik->getTotalPengeluaranPenjahitan7Hari();
        $data['grafikpenjahitan7HariD'] = $modelGrafik->getNamaPenjahitanProduk7Hari();
        $data['grafikpenjahitan7HariE'] = $modelGrafik->getNamaPenjahitanBahan7Hari();
        $data['Qtyprodukdihasilkan7Hari'] = $modelGrafik->getTotalProdukDihasilkan7Hari();
        $data['Qtybahandigunakan7Hari'] = $modelGrafik->getTotalBahanDigunakan7Hari();
        $data['RpPenjahitan7Hari'] = $modelGrafik->getRpPengeluaranPenjahitan7Hari();
        // setiap 90 hari
        $data['grafikpenjahitan90HariA'] = $modelGrafik->getTotalPenjahitanProduk90Hari();
        $data['grafikpenjahitan90HariB'] = $modelGrafik->getTotalPenjahitanBahan90Hari();;
        $data['grafikpenjahitan90HariC'] = $modelGrafik->getTotalPengeluaranPenjahitan90Hari();
        $data['grafikpenjahitan90HariD'] = $modelGrafik->getNamaPenjahitanProduk90Hari();
        $data['grafikpenjahitan90HariE'] = $modelGrafik->getNamaPenjahitanBahan90Hari();
        $data['Qtyprodukdihasilkan90Hari'] = $modelGrafik->getTotalProdukDihasilkan90Hari();
        $data['Qtybahandigunakan90Hari'] = $modelGrafik->getTotalBahanDigunakan90Hari();
        $data['RpPenjahitan90Hari'] = $modelGrafik->getRpPengeluaranPenjahitan90Hari();
        //setiap tahun
        $data['grafikpenjahitanTahunanA'] = $modelGrafik->getTotalPenjahitanProdukTahunan();
        $data['grafikpenjahitanTahunanB'] = $modelGrafik->getTotalPenjahitanBahanTahunan();;
        $data['grafikpenjahitanTahunanC'] = $modelGrafik->getTotalPengeluaranPenjahitanTahunan();
        $data['grafikpenjahitanTahunanD'] = $modelGrafik->getNamaPenjahitanProdukTahunan();
        $data['grafikpenjahitanTahunanE'] = $modelGrafik->getNamaPenjahitanBahanTahunan();
        $data['QtyprodukdihasilkanTahunan'] = $modelGrafik->getTotalProdukDihasilkanTahunan();
        $data['QtybahandigunakanTahunan'] = $modelGrafik->getTotalBahanDigunakanTahunan();
        $data['RpPenjahitanTahunan'] = $modelGrafik->getRpPengeluaranPenjahitanTahunan();

        // mitra
        $data['grafikmitra1hari'] = $modelGrafik->getJumlahPembelianMitra1hari();
        $data['grafikmitra7hari'] = $modelGrafik->getJumlahPembelianMitra7hari();
        $data['grafikmitra90hari'] = $modelGrafik->getJumlahPembelianMitra90hari();
        $data['grafikmitraFull'] = $modelGrafik->getJumlahPembelianMitraFull();
        // penjahit
        $data['grafikpenjahit1hari'] = $modelGrafik->getJumlahProdukPenjahit1hari();
        $data['grafikpenjahit7hari'] = $modelGrafik->getJumlahProdukPenjahit7hari();
        $data['grafikpenjahit90hari'] = $modelGrafik->getJumlahProdukPenjahit90hari();
        $data['grafikpenjahitFull'] = $modelGrafik->getJumlahProdukPenjahitFull();

        return view('bos/index', $data);
    }
    // Mulai pilihan grafik
    public function detailGrafikPenjualan()
    {
        $modelgrafik = new GrafikModelBos();
        $data = [
            'title' => 'Detail Grafik Penjualan',
            'pilihtahun' => $modelgrafik->thn(),
        ];
        return view('bos/grafikpenj1', $data);
    }
    public function detailGrafikPenjahit()
    {
        $modelgrafik = new GrafikModelBos();
        $data = [
            'title' => 'Detail Grafik Penjahit',
            'pilihtahun' => $modelgrafik->thnPenjahit(),
        ];
        return view('bos/grafikpenjahit', $data);
    }
    public function detailGrafikMitra()
    {
        $modelgrafik = new GrafikModelBos();
        $data = [
            'title' => 'Detail Grafik Mitra',
            'pilihtahun' => $modelgrafik->thnMitra(),
        ];
        return view('bos/grafikmitra', $data);
    }
    public function detailGrafikPenjahitan()
    {
        $modelgrafik = new GrafikModelBos();
        $data = [
            'title' => 'Detail Grafik Penjahitan',
            'pilihtahun' => $modelgrafik->thnPenjahitan(),
        ];
        return view('bos/grafikpenjahitan', $data);
    }
    public function detailGrafikPembelian()
    {
        $modelgrafik = new GrafikModelBos();
        $data = [
            'title' => 'Detail Grafik Pembelian',
            'pilihtahun' => $modelgrafik->thnPembelian(),
        ];
        return view('bos/grafikpembelian', $data);
    }
    // Mulai Harian
    public function viewDetailGrafikPenjahitanHarian()
    {
        $modelgrafik = new GrafikModelBos();
        $tgl = $this->request->getPost('tgl');
        $info = "tanggal";
        $data = [
            'cekpenjahitanperwaktu' => $modelgrafik->getInfoPerHariPenjahitan($tgl),
            // 'datagrafik' => $modelgrafik->getTotalPenjualanPerHari($tgl),
            // 'totalproduk' => $modelgrafik->getTotalTerjualPerHari($tgl),
            // 'datagrafik2' => $modelgrafik->getTotalPendapatanPerHari($tgl),
            // 'totalpendapatan' => $modelgrafik->getRpPendapatanPerHari($tgl),
            // 'datagrafik3' => $modelgrafik->getNamaProdukPerHari($tgl),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPembelianHarian()
    {
        $modelgrafik = new GrafikModelBos();
        $tgl = $this->request->getPost('tgl');
        $info = "tanggal";
        $data = [
            'cekpembelianperwaktu' => $modelgrafik->getInfoPerHariPembelian($tgl),
            // 'datagrafik' => $modelgrafik->getTotalPembelianPerHari($tgl),
            // 'totalproduk' => $modelgrafik->getTotalTerjualPerHari($tgl),
            // 'datagrafik2' => $modelgrafik->getTotalPendapatanPerHari($tgl),
            // 'totalpendapatan' => $modelgrafik->getRpPendapatanPerHari($tgl),
            // 'datagrafik3' => $modelgrafik->getNamaProdukPerHari($tgl),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPenjualanHarian()
    {
        $modelgrafik = new GrafikModelBos();
        $tgl = $this->request->getPost('tgl');
        $info = "tanggal";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerHari($tgl),
            'datagrafik' => $modelgrafik->getTotalPenjualanPerHari($tgl),
            'totalproduk' => $modelgrafik->getTotalTerjualPerHari($tgl),
            'datagrafik2' => $modelgrafik->getTotalPendapatanPerHari($tgl),
            'totalpendapatan' => $modelgrafik->getRpPendapatanPerHari($tgl),
            'datagrafik3' => $modelgrafik->getNamaProdukPerHari($tgl),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPenjahitHarian()
    {
        $modelgrafik = new GrafikModelBos();
        $tgl = $this->request->getPost('tgl');
        $info = "tanggal";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerHariPenjahit($tgl),
            'datagrafik' => $modelgrafik->getJumlahProdukPenjahitPerHari($tgl),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikpenjahit', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikMitraHarian()
    {
        $modelgrafik = new GrafikModelBos();
        $tgl = $this->request->getPost('tgl');
        $info = "tanggal";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerHariMitra($tgl),
            'datagrafik' => $modelgrafik->getJumlahPembelianMitraPerHari($tgl),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikmitra', $data)
        ];
        echo json_encode($response);
    }
    // Mulai Bulanan
    public function viewDetailGrafikPenjualanBulanan()
    {
        $modelgrafik = new GrafikModelBos();
        $bln = $this->request->getPost('bln');
        $info = "bulan";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerBulan($bln),
            'datagrafik' => $modelgrafik->getTotalPenjualanPerBulan($bln),
            'totalproduk' => $modelgrafik->getTotalTerjualPerBulan($bln),
            'datagrafik2' => $modelgrafik->getTotalPendapatanPerBulan($bln),
            'totalpendapatan' => $modelgrafik->getRpPendapatanPerBulan($bln),
            'datagrafik3' => $modelgrafik->getNamaProdukPerBulan($bln),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPenjahitBulanan()
    {
        $modelgrafik = new GrafikModelBos();
        $bln = $this->request->getPost('bln');
        $info = "bulan";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerBulanPenjahit($bln),
            'datagrafik' => $modelgrafik->getJumlahProdukPenjahitPerBulan($bln),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikpenjahit', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikMitraBulanan()
    {
        $modelgrafik = new GrafikModelBos();
        $bln = $this->request->getPost('bln');
        $info = "bulan";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerBulanMitra($bln),
            'datagrafik' => $modelgrafik->getJumlahPembelianMitraPerBulan($bln),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikmitra', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPenjualanTahunan()
    {
        $modelgrafik = new GrafikModelBos();
        $thn = $this->request->getPost('thn');
        $info = "tahun";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerTahun($thn),
            'datagrafik' => $modelgrafik->getTotalPenjualanPerTahun($thn),
            'totalproduk' => $modelgrafik->getTotalTerjualPerTahun($thn),
            'datagrafik2' => $modelgrafik->getTotalPendapatanPerTahun($thn),
            'totalpendapatan' => $modelgrafik->getRpPendapatanPerTahun($thn),
            'datagrafik3' => $modelgrafik->getNamaProdukPerTahun($thn),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikPenjahitTahunan()
    {
        $modelgrafik = new GrafikModelBos();
        $thn = $this->request->getPost('thn');
        $info = "tahun";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerTahunPenjahit($thn),
            'datagrafik' => $modelgrafik->getJumlahProdukPenjahitPerTahun($thn),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikpenjahit', $data)
        ];
        echo json_encode($response);
    }
    public function viewDetailGrafikMitraTahunan()
    {
        $modelgrafik = new GrafikModelBos();
        $thn = $this->request->getPost('thn');
        $info = "tahun";
        $data = [
            'cekpenjualanperwaktu' => $modelgrafik->getInfoPerTahunMitra($thn),
            'datagrafik' => $modelgrafik->getJumlahPembelianMitraPerTahun($thn),
            'info' => $info
        ];
        $response = [
            'data' => view('bos/hasilgrafikmitra', $data)
        ];
        echo json_encode($response);
    }


    public function produk()
    {
        $model = new Produk();
        $currentPage = $this->request->getVar('page_produk') ? $this->request->getVar('page_produk') : 1;
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Produk',
            'keyword' => $keyword,
        ];
        $produk = $model->like('nama', $keyword)->paginate(5, 'produk');
        $data['produk'] = $produk;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/produk', $data);
    }

    public function detailProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Detail Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('bos/detailproduk', $data);
    }

    public function createProduk()
    {
        $data = [
            'title' => 'Tambah Produk'
        ];
        return view('bos/createproduk', $data);
    }

    public function storeProduk()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'ukuran' => $this->request->getPost('ukuran'),
            'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            'biaya_jual' => $this->request->getPost('biaya_jual'),
            'jumlah_produksi_perkain' => $this->request->getPost('jumlah_produksi_perkain'),
            'panjang_kain_perproduksi' => $this->request->getPost('panjang_kain_perproduksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status')
        );

        $model = new Produk();
        $simpan = $model->insertProduk($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah produk');
            return redirect()->to(base_url('bos/produk'));
        }
    }

    public function editProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Edit Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('bos/editproduk', $data);
    }

    public function updateProduk()
    {
        $id = $this->request->getPost('id_produk');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'ukuran' => $this->request->getPost('ukuran'),
            'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            'biaya_jual' => $this->request->getPost('biaya_jual'),
            // 'jumlah' => $this->request->getPost('jumlah'),
            'jumlah_produksi_perkain' => $this->request->getPost('jumlah_produksi_perkain'),
            'panjang_kain_perproduksi' => $this->request->getPost('panjang_kain_perproduksi'),
            'status' => $this->request->getPost('status')
        );
        $model = new Produk();
        $ubah = $model->updateProduk($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit produk');
            return redirect()->to(base_url('bos/produk'));
        }
    }

    public function mitra()
    {
        $model = new Mitra();
        $currentPage = $this->request->getVar('page_mitra') ? $this->request->getVar('page_mitra') : 1;
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Mitra',
            'keyword' => $keyword,
        ];
        $mitra = $model->like('nama', $keyword)->paginate(5, 'mitra');
        $data['mitra'] = $mitra;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/mitra', $data);
    }

    public function createMitra()
    {
        $data = [
            'title' => 'Tmabah Mitra'
        ];
        return view('bos/createmitra', $data);
    }

    public function storeMitra()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        );

        $model = new Mitra();
        $simpan = $model->insertMitra($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Mitra');
            return redirect()->to(base_url('bos/mitra'));
        }
    }

    public function editMitra($id)
    {
        $model = new Mitra();
        $data = [
            'title' => 'Edit Mitra'
        ];
        $data['mitra'] = $model->getMitra($id)->getRowArray();
        echo view('bos/editmitra', $data);
    }

    public function updateMitra()
    {
        $id = $this->request->getPost('id_mitra');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        );
        $model = new Mitra();
        $ubah = $model->updateMitra($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit Mitra');
            return redirect()->to(base_url('bos/mitra'));
        }
    }

    public function penjahit()
    {
        $model = new Penjahit();
        $currentPage = $this->request->getVar('page_penjahit') ? $this->request->getVar('page_penjahit') : 1;
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Penjahit',
            'keyword' => $keyword,
        ];
        $penjahit = $model->like('nama', $keyword)->paginate(5, 'penjahit');
        $data['penjahit'] = $penjahit;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/penjahit', $data);
    }

    public function createPenjahit()
    {
        $data = [
            'title' => 'Tmabah Penjahit'
        ];
        return view('bos/createpenjahit', $data);
    }

    public function storePenjahit()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        );

        $model = new Penjahit();
        $simpan = $model->insertPenjahit($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Penjahit');
            return redirect()->to(base_url('bos/penjahit'));
        }
    }

    public function editPenjahit($id)
    {
        $model = new Penjahit();
        $data = [
            'title' => 'Edit Penjahit'
        ];
        $data['penjahit'] = $model->getPenjahit($id)->getRowArray();
        echo view('bos/editpenjahit', $data);
    }

    public function updatePenjahit()
    {
        $id = $this->request->getPost('id_penjahit');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'status' => $this->request->getPost('status')
        );
        $model = new Penjahit();
        $ubah = $model->updatePenjahit($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit Penjahit');
            return redirect()->to(base_url('bos/penjahit'));
        }
    }

    public function bahan()
    {
        $currentPage = $this->request->getVar('page_bahan') ? $this->request->getVar('page_bahan') : 1;
        $model = new Bahan();
        $keyword = $this->request->getVar('keyword');
        if (empty($keyword)) {
            $keyword = '';
        }
        $data = [
            'title' => 'Bahan',
            'keyword' => $keyword,
        ];
        $bahan = $model->like('nama', $keyword)->paginate(5, 'bahan');
        $data['bahan'] = $bahan;
        $data['pager'] = $model->pager;
        $data['currentPage'] = $currentPage;
        return view('bos/bahan', $data);
    }

    public function createBahan()
    {
        $data = [
            'title' => 'Tambah Bahan'
        ];
        return view('bos/createbahan', $data);
    }

    public function storeBahan()
    {
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'panjang_kain' => $this->request->getPost('panjang_kain'),
            'status' => $this->request->getPost('status')
        );
        $model = new Bahan();
        $simpan = $model->insertBahan($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah Bahan');
            return redirect()->to(base_url('bos/bahan'));
        }
    }

    public function editBahan($id)
    {
        $model = new Bahan();
        $data = [
            'title' => 'Edit Bahan'
        ];
        $data['bahan'] = $model->getBahan($id)->getRowArray();
        echo view('bos/editbahan', $data);
    }

    public function updateBahan()
    {
        $id = $this->request->getPost('id_bahan');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            // 'jumlah' => $this->request->getPost('jumlah'),
            'harga' => $this->request->getPost('harga'),
            'panjang_kain' => $this->request->getPost('panjang_kain'),
            'status' => $this->request->getPost('status')
        );
        $model = new Bahan();
        $ubah = $model->updateBahan($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit Bahan');
            return redirect()->to(base_url('bos/bahan'));
        }
    }
}

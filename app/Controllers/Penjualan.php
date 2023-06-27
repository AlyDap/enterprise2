<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DetailPenjualan;
use App\Models\Penjualan_model;
use App\Models\laporan_model;
use App\Models\Produk;

helper('form');

class Penjualan extends BaseController
{
    protected $penjualanModel;
    protected $laporanModel;
    protected $produkModel;
    protected $detailPenjualan;
    public function __construct()
    {
        $this->penjualanModel = new Penjualan_model();
        $this->laporanModel = new laporan_model();
        $this->produkModel = new Produk();
        $this->detailPenjualan = new DetailPenjualan();
    }
    public function index()
    {
        $model = new Produk();

        $data = [
            'title' => 'Dashboard'
        ];
        $grafik = $model->getTotalPenjualanTahunan();
        $data['grafik'] = $grafik;

        $grafik2 = $model->getTotalPendapatanTahunan();
        $data['grafik2'] = $grafik2;

        $data['grafik3'] = $model->getNamaProdukTahunan();
        // $data['Nmtahunan'] = $model->getTotalProdukTahunan();

        $Rptahunan = $model->getRpPendapatanTahunan();
        $data['Rptahunan'] = $Rptahunan;
        $Qtytahunan = $model->getTotalTerjualTahunan();
        $data['Qtytahunan'] = $Qtytahunan;

        $data['grafikbulan2021'] = $model->getTotalPejualanBulananTahun2021();
        $data['grafikbulan2022'] = $model->getTotalPejualanBulananTahun2022();
        $data['grafikbulan2023'] = $model->getTotalPejualanBulananTahun2023();

        $data['Qtybulanan2021'] = $model->getTotalTerjualBulanan2021();
        $data['Qtybulanan2022'] = $model->getTotalTerjualBulanan2022();
        $data['Qtybulanan2023'] = $model->getTotalTerjualBulanan2023();

        $data['grafik2bulan2021'] = $model->getTotalPendapatanBulanan2021();
        $data['grafik2bulan2022'] = $model->getTotalPendapatanBulanan2022();
        $data['grafik2bulan2023'] = $model->getTotalPendapatanBulanan2023();

        $data['Rpbulanan2021'] = $model->getRpPendapatanBulanan2021();
        $data['Rpbulanan2022'] = $model->getRpPendapatanBulanan2022();
        $data['Rpbulanan2023'] = $model->getRpPendapatanBulanan2023();

        $data['grafik3bulan2021'] = $model->getNamaProdukBulanan2021();
        $data['grafik3bulan2022'] = $model->getNamaProdukBulanan2022();
        $data['grafik3bulan2023'] = $model->getNamaProdukBulanan2023();

        return view('penjualan/index', $data);
    }

    public function tampol()
    {
        $data = [
            'title' => 'PENJUALAN',
            // Menampilkan daftar user
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/tampol', $data);
    }
    public function coba()
    {
        $data = [
            'title' => 'COBA',
            // Menampilkan daftar user
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/coba', $data);
    }

    public function tambahPenjualan()
    {
        $data = [
            'title' => 'Input Penjualan',
            'produk' => $this->produkModel->getProduk()
        ];
        return view('penjualan/tambahpenjualan', $data);
    }

    public function cetakPenjualan()
    {
        $data = [
            'title' => 'cetak Penjualan',
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/cetakpenjualan', $data);
    }


    // laporan penjualan harian bulanan tahunan
    public function laporanHarian()
    {
        $data = [
            'title' => 'laporan harian',
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/laporanharian', $data);
    }
    public function viewlaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'dataharian' => $this->laporanModel->DataHarian($tgl),
            'gt' => $this->laporanModel->GrandTotal($tgl),
        ];
        $response = [
            'data' => view('penjualan/tabellaporan', $data)
        ];
        echo json_encode($response);
    }

    public function laporanBulanan()
    {
        $data = [
            'title' => 'laporan bulanan',
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/laporanbulanan', $data);
    }
    public function viewlaporanBulanan()
    {
        $bln = $this->request->getPost('bln');
        $data = [
            'dataharian' => $this->laporanModel->DataBulanan($bln),
            'gt' => $this->laporanModel->GrandTotalBulanan($bln),
        ];
        $response = [
            'data' => view('penjualan/tabellaporan', $data)
        ];
        echo json_encode($response);
    }

    public function laporanTahunan()
    {
        $data = [
            'title' => 'laporan tahunan',
            'users' => $this->penjualanModel->findAll()
        ];
        return view('penjualan/laporantahunan', $data);
    }
    public function viewlaporanTahunan()
    {
        $thn = $this->request->getPost('thn');
        $data = [
            'dataharian' => $this->laporanModel->DataTahunan($thn),
            'gt' => $this->laporanModel->GrandTotalTahunan($thn),
        ];
        $response = [
            'data' => view('penjualan/tabellaporan', $data)
        ];
        echo json_encode($response);
    }
    // end laporan

    public function cetakLaporanHarian($tgl)
    {
        $data = [
            'dataharian' => $this->laporanModel->DataHarian($tgl),
            'gt' => $this->laporanModel->GrandTotalPenjualan($tgl),
        ];

        // Load library mPDF
        $mpdf = new \Mpdf\Mpdf();

        // Generate HTML laporan dengan menggunakan view
        $html = view('penjualan/laporanpenjualanharian', $data);

        // Set konfigurasi mPDF
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);

        // Cetak laporan dalam bentuk file PDF
        $mpdf->Output('laporanpenjualanharian.pdf', 'D');
    }


    public function storePenjualan()
    {
        $data = array(
            'id_penjualan' => $this->request->getPost('id_penjualan'),
            'total_bayar' => $this->request->getPost('total_bayar'),
            'id_user' => $this->request->getPost('id_user')
        );

        $model = new Penjualan_model();
        $simpan = $model->insertPenjualan($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Berhasil Menambah penjualan');
            return redirect()->to(base_url('penjualan/tampol'));
        }
    }

    public function DetailPenjualan($id)
    {
        $penjualanModel = new Penjualan_model();
        $detailpenjualanModel = new DetailPenjualan();
        $produkModel = new Produk();
        $data['penjualan'] = $penjualanModel->findAll();
        $data['produk'] = $produkModel->findAll();
        $data['details'] = $detailpenjualanModel->where('id_penjualan', $id)->findAll();

        $data['title'] = 'detail';

        return view('penjualan/detail_penjualan', $data);
    }

    public function storeDetailPenjualan()
    {
        $detailPenjualanModel = new DetailPenjualan();
        // masukkan data penjualan dulu baru detail
        $this->penjualanModel->insert(['id_user' => session('id')]);
        // ambil id terbaru
        $idPenjualan = $this->penjualanModel->ambilIdTerbaru();
        $data = [
            [
                'id_penjualan' => $idPenjualan[0]['id_penjualan'],
                'id_produk' => $this->request->getPost('id_produk'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total' => $this->request->getPost('total'),
            ]
        ];
        $data2 = [
            'id_penjualan' => $idPenjualan[0]['id_penjualan'],
        ];
        $totalBayar = intval($this->request->getPost('total'));
        $detailPenjualanModel->insertBatch($data);
        $this->penjualanModel->update($data2, ['total_bayar' => strval($totalBayar)]);

        return redirect()->to('/penjualan/tampol');
    }
    public function get_harga_produk()
    {
        $id_produk = $this->request->getPost('id_produk');
        $produkModel = new Produk();
        $produk = $produkModel->find($id_produk);
        $data = [
            'harga' => $produk['biaya_jual'],
            'stok' => $produk['jumlah']
        ];
        return $this->response->setJSON($data);
    }
}

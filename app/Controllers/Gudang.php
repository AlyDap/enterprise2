<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Database\Migrations\Bahan;
use App\Models\DetailPembelian;
use App\Models\Bahan;
use App\Models\Pembelian;
use App\Models\laporan_pembelian;
use App\Models\Mitra;
use App\Models\Produk;

helper('form');

class Gudang extends BaseController
{
    protected $pembelianModel;
    protected $laporanModel;
    protected $mitraModel;
    protected $bahanModel;
    protected $detailPembelian;
    public function __construct()
    {
        $this->pembelianModel = new Pembelian();
        $this->mitraModel = new Mitra();
        $this->laporanModel = new laporan_pembelian();
        $this->bahanModel = new Bahan();
        $this->detailPembelian = new DetailPembelian();
    }
    public function index()
    {
        $model = new Bahan();
        
        $data = [
            'title' => 'Dashboard'
        ];
        $grafik = $model->getTotalPembelian();
        $data['grafik'] = $grafik;
        return view('gudang/index', $data);
    }

    public function tampil()
    {
        $data = [
            'title' => 'PEMBELIAN',
            // Menampilkan daftar user
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/tampil', $data);
        // return view('penjualan/tampol', $data);
    }

    public function tambahPembelian()
    {
        $data = [
            'title' => 'Input Pembelian',
            'mitra' => $this->mitraModel->getMitraAktif(),
            'bahan' => $this->bahanModel->getBahanAktif()
        ];
        return view('gudang/tambahpembelian', $data);
    }

    public function storePembelian()
    {
        $data = array(
            'no_pembelian' => $this->request->getPost('no_pembelian'),
            'total_bayar' => $this->request->getPost('total_bayar'),
            'id_supplier' => $this->request->getPost('id_supplier'),
            'id_user' => $this->request->getPost('id_user')
        );
        // var_dump($data);
        $model = new Pembelian();
        $simpan = $model->insertPembelian($data);
        if ($simpan) {
            $this->storeDetailPembelian();
            session()->setFlashdata('success', 'Berhasil Menambah Pembelian');
            return redirect()->to(base_url('gudang/tampil'));
        }
    }

    public function storeDetailPembelian()
    {
        $detailPembelianModel = new DetailPembelian();
        // masukkan data pembeian dulu baru detail
        // $this->pembelianModel->insert(['id_user' => session('id')]);
        // ambil id terbaru
        $idPembelian = $this->pembelianModel->ambilIdTerbaru();
        $data = [
            [
                'no_pembelian' => $idPembelian[0]['no_pembelian'],
                'id_bahan' => $this->request->getPost('id_bahan'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total' => $this->request->getPost('total'),
            ],
        ];
        $data2 = [
            'no_pembelian' => $idPembelian[0]['no_pembelian'],
        ];
        // dd($data2);
        $totalBayar = intval($this->request->getPost('total'));
        $detailPembelianModel->insertBatch($data);
        $this->pembelianModel->update($data2, ['total_bayar' => strval($totalBayar)]);
        // $data2 = array(
        //     'total_bayar' => $this->request->getPost('total'),
        // );
        // dd($data2);
        // $this->pembelianModel->updatePenjualan( $data2 ,$idPenjualan);

        return redirect()->to('/gudang/tampil');
    }

    public function DetailPembelian($id)
    {
        $pembelianModel = new Pembelian();
        $detailPembelianModel = new DetailPembelian();
        $mitraModel = new Mitra();
        $data['pembelian'] = $pembelianModel->findAll();
        $data['mitra'] = $mitraModel->findAll();
        $data['details'] = $detailPembelianModel->where('no_pembelian', $id)->findAll();

        $data['title'] = 'Detail Pembelian';

        return view('gudang/detail_pembelian', $data);
    }

    
    public function get_harga_bahan()
    {
        $id_bahan = $this->request->getPost('id_bahan');
        $bahanModel = new Bahan();
        $bahan = $bahanModel->find($id_bahan);

        $data = [
            'harga' => $bahan['harga'],
            'jumlah' => $bahan['jumlah']
        ];

        return $this->response->setJSON($data);
    }

    // mellihat daftar bahan
    public function bahan()
    {
     
        $data = [
            'title' => 'Daftar Bahan',
            'bahan' => $this->bahanModel->getBahan(),
        ];
        return view('gudang/bahan', $data);
    }

    public function editBahan($id)
    {
        $model = new Bahan();
        $data = [
            'title' => 'Edit Bahan'
        ];
        $data['bahan'] = $model->getBahan($id)->getRowArray();
        echo view('gudang/editbahan', $data);
    }

    public function updateBahan()
    {
        $id = $this->request->getPost('id_bahan');
        $data = array(
            // 'nama' => $this->request->getPost('nama'),
            'jumlah' => $this->request->getPost('jumlah')
            // 'harga' => $this->request->getPost('harga'),
            // 'status' => $this->request->getPost('status')
        );
        $model = new Bahan();
        $ubah = $model->updateBahan($data, $id);
        if ($ubah) {
            session()->setFlashdata('info','Berhasil Mengedit Bahan');
            return redirect()->to(base_url('gudang/bahan'));
        }
    }

    // edit produk
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
        return view('gudang/produk', $data);
    }

    // controller untuk menampilkan view edit produk
    public function editProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Edit Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('gudang/editproduk', $data);
    }
// controller untuk menampilkan view edit produk
    public function updateProduk()
    {
        $id = $this->request->getPost('id_produk');
        $data = array(
            // 'nama' => $this->request->getPost('nama'),
            // 'ukuran' => $this->request->getPost('ukuran'),
            // 'biaya_produksi' => $this->request->getPost('biaya_produksi'),
            // 'biaya_jual' => $this->request->getPost('biaya_jual'),
            'jumlah' => $this->request->getPost('jumlah'),
            // 'status' => $this->request->getPost('status')
        );
        $model = new Produk();
        $ubah = $model->updateProduk($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Berhasil Mengedit produk');
            return redirect()->to(base_url('gudang/produk'));
        }
    }

    public function detailProduk($id)
    {
        $model = new Produk();
        $data = [
            'title' => 'Detail Produk'
        ];
        $data['produk'] = $model->getProduk($id)->getRowArray();
        echo view('gudang/detailproduk', $data);
    }

    // mellihat daftar mitra
    public function mitra()
    {
     
        $data = [
            'title' => 'Daftar Status Mitra',
            'mitra' => $this->mitraModel->getMitra(),
        ];
        return view('gudang/mitra', $data);
    }


    // laporan cetak pembelian
    public function cetakPembelian()
    {
        $data = [
            'title' => 'Cetak Pembelian',
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/cetakpembelian', $data);
    }

    // laporan penjualan harian bulanan tahunan
    public function laporanHarian()
    {
        $data = [
            'title' => 'laporan harian',
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/laporanharian', $data);
    }
    public function viewlaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'dataharian' => $this->laporanModel->DataHarian($tgl),
            'gt' => $this->laporanModel->GrandTotal($tgl),
        ];
        $response = [
            'data' => view('gudang/tabellaporan', $data),
            'tabel' => $tgl
        ];
        echo json_encode($response);
    }

    public function laporanBulanan()
    {
        $data = [
            'title' => 'laporan bulanan',
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/laporanbulanan', $data);
    }
    public function viewlaporanBulanan()
    {
        $bln = $this->request->getPost('bln');
        $data = [
            'dataharian' => $this->laporanModel->DataBulanan($bln),
            'gt' => $this->laporanModel->GrandTotalBulanan($bln),
        ];
        $response = [
            'data' => view('gudang/tabellaporan', $data)
        ];
        echo json_encode($response);
    }

    public function laporanTahunan()
    {
        $data = [
            'title' => 'laporan tahunan',
            'users' => $this->pembelianModel->findAll()
        ];
        return view('gudang/laporantahunan', $data);
    }
    public function viewlaporanTahunan()
    {
        $thn = $this->request->getPost('thn');
        $data = [
            'dataharian' => $this->laporanModel->DataTahunan($thn),
            'gt' => $this->laporanModel->GrandTotalTahunan($thn),
        ];
        $response = [
            'data' => view('gudang/tabellaporan', $data)
        ];
        echo json_encode($response);
    }
    // end laporan

    // grafik
    public function grafikPembelianTahunan($id)
    {
        $model = new Pembelian();
        $data = [
            'title' => 'Pembelian Produk'
        ];
        $data['grafik'] = $model->getTotalPembelianTahunan($id)->getRowArray();
        echo view('gudang/grafik', $data);
    }

}

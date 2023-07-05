<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\Bahan;
use App\Models\GrafikModel;
use App\Models\Mitra;
use App\Models\Penjahit;
use App\Models\Produk;

class Bos extends BaseController
{

    public function index()
    {
        $model = new Produk();

        $data = [
            'title' => 'Dashboard'
        ];
        $grafik = $model->getTotalPenjualanTahunan();
        $data['grafik'] = $grafik;

        $data['tahungrafik'] = $model->getTahunPenjualan();

        $grafik2 = $model->getTotalPendapatanTahunan();
        $data['grafik2'] = $grafik2;

        $data['grafik3'] = $model->getNamaProdukTahunan();

        $Rptahunan = $model->getRpPendapatanTahunan();
        $data['Rptahunan'] = $Rptahunan;
        $Qtytahunan = $model->getTotalTerjualTahunan();
        $data['Qtytahunan'] = $Qtytahunan;
        $data['grafik1hari'] = $model->getTotalPenjualan1Hari();
        $data['grafik7hari'] = $model->getTotalPenjualan7Hari();
        $data['grafik90hari'] = $model->getTotalPenjualan90Hari();

        return view('bos/index', $data);
    }

    public function detailGrafikPenjualan()
    {
        $modelgrafik = new GrafikModel();
        $data = [
            'title' => 'Detail Grafik Penjualan',
            'pilihtahun' => $modelgrafik->thn(),
        ];
        return view('bos/grafikpenj1', $data);
    }

    public function viewDetailGrafikPenjualanHarian()
    {
        $modelgrafik = new GrafikModel();
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
    public function viewDetailGrafikPenjualanBulanan()
    {
        $modelgrafik = new GrafikModel();
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
    public function viewDetailGrafikPenjualanTahunan()
    {
        $modelgrafik = new GrafikModel();
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

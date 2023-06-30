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


        $data['grafikbulan2019'] = $model->getTotalPejualanBulananTahun2019();
        $data['grafikbulan2020'] = $model->getTotalPejualanBulananTahun2020();
        $data['grafikbulan2021'] = $model->getTotalPejualanBulananTahun2021();
        $data['grafikbulan2022'] = $model->getTotalPejualanBulananTahun2022();
        $data['grafikbulan2023'] = $model->getTotalPejualanBulananTahun2023();
        $data['Qtybulanan2019'] = $model->getTotalTerjualBulanan2019();
        $data['Qtybulanan2020'] = $model->getTotalTerjualBulanan2020();
        $data['Qtybulanan2021'] = $model->getTotalTerjualBulanan2021();
        $data['Qtybulanan2022'] = $model->getTotalTerjualBulanan2022();
        $data['Qtybulanan2023'] = $model->getTotalTerjualBulanan2023();

        $data['grafik2bulan2019'] = $model->getTotalPendapatanBulanan2019();
        $data['grafik2bulan2020'] = $model->getTotalPendapatanBulanan2020();
        $data['grafik2bulan2021'] = $model->getTotalPendapatanBulanan2021();
        $data['grafik2bulan2022'] = $model->getTotalPendapatanBulanan2022();
        $data['grafik2bulan2023'] = $model->getTotalPendapatanBulanan2023();
        $data['Rpbulanan2019'] = $model->getRpPendapatanBulanan2019();
        $data['Rpbulanan2020'] = $model->getRpPendapatanBulanan2020();
        $data['Rpbulanan2021'] = $model->getRpPendapatanBulanan2021();
        $data['Rpbulanan2022'] = $model->getRpPendapatanBulanan2022();
        $data['Rpbulanan2023'] = $model->getRpPendapatanBulanan2023();

        $data['grafik3bulan2019'] = $model->getNamaProdukBulanan2019();
        $data['grafik3bulan2020'] = $model->getNamaProdukBulanan2020();
        $data['grafik3bulan2021'] = $model->getNamaProdukBulanan2021();
        $data['grafik3bulan2022'] = $model->getNamaProdukBulanan2022();
        $data['grafik3bulan2023'] = $model->getNamaProdukBulanan2023();
        // $data['Nmbulanan2019'] = $model->getTotalProdukBulanan2019();
        // $data['Nmbulanan2020'] = $model->getTotalProdukBulanan2020();
        // $data['Nmbulanan2021'] = $model->getTotalProdukBulanan2021();
        // $data['Nmbulanan2022'] = $model->getTotalProdukBulanan2022();
        // $data['Nmbulanan2023'] = $model->getTotalProdukBulanan2023();

        return view('bos/index', $data);
    }

    public function detailGrafikPenjualan()
    {
        $modelgrafik = new GrafikModel();
        $data = [
            'title' => 'Detail Grafik Penjualan',
            'datagrafik2' => $modelgrafik->getTotalPenjualanPerHari2(),
        ];
        return view('bos/grafikpenj1', $data);
    }

    public function viewDetailGrafikPenjualanHarian()
    {
        $modelgrafik = new GrafikModel();
        $tgl = $this->request->getPost('tgl');
        $data = [
            'datagrafik' => $modelgrafik->getTotalPenjualanPerHari($tgl),
            // 'tangg' => $tgl,
        ];
        $response = [
            'data' => view('bos/hasilgrafik', $data)
        ];
        echo json_encode($response);
        // return $this->response->setJSON($response);
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

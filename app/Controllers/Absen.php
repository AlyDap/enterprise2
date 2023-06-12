<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Absen extends BaseController
{
    protected $presensiModel;

    public function __construct()
    {
        $this->presensiModel = new \App\Models\presensiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Absensi',
            'absen' => $this->presensiModel->where('id_pegawai', session()->get('id'))->findAll(),
        ];
        // dd($this->presensiModel->where('id_pegawai', session()->get('id'))->findAll());
        return view('absen', $data);
    }

    public function presensi()
    {
        // Ambil data gambar yang diunggah
        $imageData = $this->request->getVar('imageData');

        // Simpan data gambar ke server
        $imagePath = WRITEPATH . 'uploads/' . time() . '.jpg'; // Contoh penyimpanan di folder uploads dengan nama berdasarkan waktu
        file_put_contents($imagePath, base64_decode($imageData));



        // masukkan data ke database    idpegawai,tanggalpresensi,waktumasuk,keluar,fotomasuk,keluar,info,ket,status
        $this->presensiModel->save([
            'id_pegawai' => session()->get('id'),
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'foto' => $imagePath,
            'info' => 'tepat waktu'
        ]);

        // Berikan respons ke klien
        $response = [
            'status' => 'success',
            'message' => 'Gambar berhasil diunggah dan diproses.',
            'image_path' => $imagePath // Jika perlu mengirim path gambar kembali ke klien
        ];
        return $this->response->setJSON($response);
    }

    public function getAbsen()
    {
        // dd('masuk');
        // $data = [
        //     // 'absen' => $this->presensiModel->where('id_pegawai', session()->get('id'))->findAll(),
        //     'title' => 'tes',
        //     'start' => '2023-06-01',
        // ];
        // dd($this->presensiModel->where('id_pegawai', session()->get('id'))->findAll());
        $absen = $this->presensiModel->where('id_pegawai', session()->get('id'))->findAll();
        // ganti format array menjadi json
        foreach ($absen as $a) {

            $response[] = [
                'title' => $a['info'],
                'start' => $a['waktu_masuk'],
                'color' => $a['info'] == 'tepat waktu' ? 'green' : 'red',
                'description' => $a['info'] == 'tepat waktu' ? 'tepat waktu' : 'terlambat',
            ];
        }
        dd($response);
        $response = [
            // title, start, color, description
        ];
        return $this->response->setJSON($response);
    }
}

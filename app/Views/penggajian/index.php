<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php if (isset($_GET['id'])) : ?>
  <?php $id = $_GET['id']; ?>
  <?php $nama = $_GET['nama'] ?>
  <script>
    var id = <?= $id ?>;
  </script>
<?php else : ?>
  <?php $nama = session('username') ?>
  <script>
    var id = 0;
  </script>
<?php endif ?>
<div class="row">
  <p>
    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Tata Tertib Penggajian
    </a>
    <a class="btn btn-info" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
      Tata Tertib Absen
    </a>
  </p>
  <p>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="alert alert-secondary" role="alert">
      <ul>
        <li>HRD mengapprove gaji bulanan tanggal 28 setiap bulan</li>
        <li>gaji karyawan = dihitung dari total jam masuk karyawan jika masih 8 jam walaupun terlambat maka tidak dikurangi jika kurang dari 8 jam maka dikurangi 15000 perhari jika kelebihan dari 8 jam itu lebih dari 1 jam maka dihitung lembur 10000 </li>
        <li>jam kerja normal bulan ini = <span class="jam"><?= $jam_kerja ?></span> </li>
      </ul>
    </div>
  </div>
  <!-- absen -->

  <div class="collapse" id="collapseExample1">
    <div class="alert alert-info" role="alert">
      <ul>
        <li>Jam kerja dimulai setiap hari pukul 08.00 - 16.00 WIB kecuali Hari Jumat (libur)</li>
        <li>absen memiliki batas keterlambatan 15 menit</li>
        <li>Pegawai yang tidak mengganti jam kerja, ketika sampai di akhir bulan akan dikenai pemotongan gaji sebanyak
          Rp10.000 perjamnya</li>
        <li>total jam kerja selama satu minggu adalah 48 jam terhitung 8x6 hari, kelebihan daripada itu dihitung jam
          lembur
        </li>
        <li>pegawai lembur diberikan gaji tambahan sebesar Rp15.000 per jamnya dengan catatan di setujui oleh atasan
        </li>
        <li>dengan catatan lembur yang dilakukan dilakukan di luar jam kerja serta telah melebihi jam kerja mingguan
        </li>
        <li>Setiap pegawai yang mengalami sakit, harus mengajukan surat keterangan sakit ke HRD</li>
        <li>ijin sakit akan diberikan, dan dilakukan pengurangan jam kerja </li>
      </ul>
    </div>
  </div>
</div>

<!-- tabel -->
<div class="row">
  <div class="col">
    <!-- h4 gaji bulan di sebelah kiri atas tabel -->

    <h4>Gaji Bulan <span class="bulan-gaji"></span></h4>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-primary" type="button">Approve Gaji</button>
    </div>
    <!-- dataPegawai=nama,gaji,totaljam kerja, gaji sekarang -->

    <table class="table table-bordered">
      <tr>
        <th>Nama</th>
        <th>Gaji Pokok</th>
        <th>Total Jam Kerja</th>
        <th>Gaji Bulan Ini</th>
        <th>terlambat</th>
        <th>sakit</th>
        <th></th>
      </tr>
      <?php foreach ($penggajian as $p) : ?>
        <tr>
          <td><?= $p['nama'] ?></td>
          <td><?= "Rp " . number_format($p['gaji'], 0, ',', '.');  ?></td>
          <td><?= $p['jam_kerja'] ?></td>
          <td><?= "Rp " . number_format($p['gaji_sekarang'], 0, ',', '.');  ?></td>
          <td><?= $p['telat'] ?></td>
          <td><?= $p['sakit'] ?></td>
          <td>
            <a href="<?= base_url('penggajian?id=' . $p['id_pegawai']) . '&nama=' . $p['nama'] ?>">detail</a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>
<!-- akhir tabel -->

<!-- kalender -->
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4>Detail Absen <?= $nama ?></h4>
        <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap my-3 mx-3">
        </div>
      </div>
    </div>
  </div>
  <!-- modal kalender -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="" class="img-thumbnail" width="200" alt="">
          <div class="waktu"></div>
        </div>
        <div class="modal-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 ">
                <button type="button" class="btn btn-danger" disabled>Terlambat : <span class="terlambat"></span></button>
              </div>
              <div class="col-md-4 ms-auto ">
                <button type="button" class="btn btn-warning" disabled>sakit : <span class="sakit"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- akhir kalender -->
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
  <script src="js/hrd.js"></script>
  <script src="js/moment.js"></script>
  <script>
    $('.bulan-gaji').text(moment().locale('id').format('MMMM YYYY'));
  </script>

  <?= $this->endSection() ?>
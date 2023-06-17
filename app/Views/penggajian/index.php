<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

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
        <li>Jam kerja bulan ini <span class="jam-kerja-bulanan">-</span> jam terhitung 8 x <span class="hari-kerja">-</span> hari kerja</li>
        <li>pegawai yang terlambat di kenakan pemotongan gaji Rp10.000 perjamnya</li>
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
    <table class="table table-bordered">
      <th>Nama</th>
      <th>Gaji Pokok</th>
      <th>Total Jam Kerja</th>
      <th>Gaji Bulan Ini</th>
      <th>Detail</th>
    </table>
  </div>
  <!-- akhir tabel -->


  <script>
    $('.bulan-gaji').text(moment().locale('id').format('MMMM YYYY'));
  </script>

  <?= $this->endSection() ?>
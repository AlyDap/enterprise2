<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->get('alert') == 'success') : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-regular fa-badge-check fa-bounce"></i>
    Berhasil mengirimkan slip gaji kepada karyawan
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif (session()->get('alert') == 'gagal') : ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-regular fa-badge-check fa-bounce"></i>
    Terdapat kesalahan saat mengirimkan slip gaji kepada karyawan
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif ?>

<div class="row">
  <div class="col">
    <h4><?= $title ?></h4>
    <a href="<?= base_url('/penggajian/beriSlip/') . $tglDb ?>" class="btn btn-warning my-2" onclick="return confirm('approve gaji akan mengirimkan slip kepada karyawan, apakah anda yakin?')" <?= $approve ?>>Approve</a>
    <table class="table table-bordered ">
      <caption><?= $tgl ?> ----- <?= $kerja['hari_kerja_sebulan'] ?> Hari (<?= $kerja['hari_kerja_sebulan'] * 8 ?> Jam)</caption>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Gaji Pokok</th>
          <th>Masuk</th>
          <th>Jam Kerja</th>
          <th>Terlambat</th>
          <th>Sakit</th>
          <th>Gaji </th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0 ?>
        <?php foreach ($penggajian as $p) : ?>
          <tr>
            <td><?= $p['username'] . ' (' . $p['jabatan'] . ')' ?></td>
            <td><?= "Rp " . number_format($p['gaji_pokok'], 0, ',', '.');  ?></td>
            <td><?= $p['masuk'] ?></td>
            <td><?= $p['jam_kerja'] ?></td>
            <td><?= $p['terlambat'] ?></td>
            <td><?= $p['sakit'] ?></td>
            <td><?= "Rp " . number_format($p['gaji'], 0, ',', '.');  ?></td>
            <?php $total += $p['gaji'] ?>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr class="text-center">
          <td colspan="2"><b>Total Pengeluaran</b></td>
          <td colspan="4"><b><?= "Rp " . number_format($total, 0, ',', '.'); ?></b></td>
        </tr>
      </tfoot>
      <!-- pengeluaran gaji bulan ini (td terakhir) -->
    </table>
  </div>
</div>
<?= $this->endSection() ?>
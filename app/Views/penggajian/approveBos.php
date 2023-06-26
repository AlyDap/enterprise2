<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <h4><?= $title ?></h4>
    <table class="table table-bordered ">
      <caption><?= $jam_kerja ?> ---- <?= $tgl ?></caption>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Gaji Pokok</th>
          <th>Gaji </th>
          <th>Jam Kerja</th>
          <th>Terlambat</th>
          <th>Sakit</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0 ?>
        <?php foreach ($penggajian as $p) : ?>
          <tr>
            <td><?= $p['username'] . ' (' . $p['jabatan'] . ')' ?></td>
            <td><?= "Rp " . number_format($p['gaji_pokok'], 0, ',', '.');  ?></td>
            <td><?= "Rp " . number_format($p['gaji'], 0, ',', '.');  ?></td>
            <?php $total += $p['gaji'] ?>
            <td><?= $p['jam_kerja'] ?></td>
            <td><?= $p['terlambat'] ?></td>
            <td><?= $p['sakit'] ?></td>
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
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
  <div class="dropdown">
    <a role="button" class="btn btn-outline-dark gaprint" href="<?= base_url('penjualan/tambahpenjualan'); ?>">Tambah Penjualan</a>
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Laporan
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url('penjualan/laporanharian'); ?>">laporan harian</a></li>
      <li><a class="dropdown-item" href="<?= base_url('penjualan/laporanbulanan'); ?>">laporan bulanan</a></li>
      <li><a class="dropdown-item" href="<?= base_url('penjualan/laporantahunan'); ?>">laporan tahunan</a></li>
    </ul>
  </div>



  <h1 class=" mt-2">Daftar penjualan</h1>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">id_penjualan</th>
        <th scope="col">tgl</th>
        <th scope="col">total_bayar</th>
        <th scope="col">id_user</th>
        <th scope="col" class="gaprint">aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php $totalpemasukan = 0; ?>
      <?php foreach ($users as $user) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $user['id_penjualan']; ?></td>
          <td><?= $user['tgl']; ?></td>
          <td><?= "Rp " . number_format($user['total_bayar'], 0, ',', '.');  ?></td>
          <td><?= $user['id_user']; ?></td>
          <td class="gaprint">
            <a class="btn btn-sm btn-outline-secondary gaprint" id="btnDetail" href="<?= base_url('penjualan/detailpenjualan/' . $user['id_penjualan']); ?>">Detail</a>
          </td>
        </tr>
        <?php $totalpemasukan += $user['total_bayar'] ?>
      <?php endforeach; ?>
    </tbody>
</div>
<?= $this->endSection(); ?>
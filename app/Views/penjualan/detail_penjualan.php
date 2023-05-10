<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
  <h1 class="mt-2">Detail penjualan</h1>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">id_penjualan</th>
        <th scope="col">id_produk</th>
        <th scope="col">harga</th>
        <th scope="col">jumlah</th>
        <th scope="col">total</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($details as $user) : ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $user['id_penjualan']; ?></td>
        <td><?= $user['id_produk']; ?></td>
        <td><?= "Rp " . number_format($user['harga'], 0, ',', '.');  ?></td>
        <td><?= $user['jumlah']; ?></td>
        <td><?= "Rp " . number_format($user['total'], 0, ',', '.');  ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?= $this->endSection(); ?>


<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
  <h1 class="mt-2">Detail Produksi</h1>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">no_penjahitan</th>
        <th scope="col">id_produk</th>
        <th scope="col">ukuran</th>
        <th scope="col">jumlah</th>
        <th scope="col">biaya_produksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>

      <?php foreach ($details as $user) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $user['no_penjahitan']; ?></td>
          <td><?= $user['id_produk']; ?></td>
          <td><?= $user['ukuran']; ?></td>
          <td><?= $user['jumlah']; ?></td>
          <td><?= "Rp " . number_format($user['biaya_produksi'], 0, ',', '.');  ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a role="button" class="btn btn-outline-dark" href="<?= base_url('produksi/penjahitan'); ?>">Kembali</a>

  <?= $this->endSection(); ?>
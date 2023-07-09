<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
  <a role="button" class="btn btn-outline-dark" href="<?= base_url('produksi/tambahproduksi'); ?>">Tambah Produksi</a>
  <br>
  <br>


  <h1 class="mt-2">Daftar Produksi</h1>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">no_penjahitan</th>
        <th scope="col">id_penjahit</th>
        <th scope="col">tgl</th>
        <th scope="col">total_bayar</th>
        <th scope="col">id_bahan</th>
        <th scope="col">total_bahan</th>
        <th scope="col">id_user</th>
        <th scope="col">aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($users as $user) { ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $user['no_penjahitan']; ?></td>
          <td><?= $user['id_penjahit']; ?></td>
          <td><?= $user['tgl']; ?></td>
          <td><?= "Rp " . number_format($user['total_bayar'], 0, ',', '.');  ?></td>
          <td><?= $user['id_bahan']; ?></td>
          <td><?= $user['total_bahan']; ?></td>
          <td><?= $user['id_user']; ?></td>
          <td>
            <a class="btn btn-sm btn-outline-secondary" id="btnDetail" href="<?= base_url('produksi/detailPenjahitan/' . $user['no_penjahitan']); ?>">Detail</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>



  <?= $this->endSection(); ?>
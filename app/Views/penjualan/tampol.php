<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
<a role="button" class="btn btn-outline-dark" href="<?= base_url('penjualan/tambahpenjualan'); ?>" >Tambah Penjualan</a>

  <h1 class="mt-2">Daftar penjualan</h1>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">NO</th>
        <th scope="col">id_penjualan</th>
        <th scope="col">tgl</th>
        <th scope="col">total_bayar</th>
        <th scope="col">id_user</th>
        <th scope="col">aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($users as $user) : ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $user['id_penjualan']; ?></td>
        <td><?= $user['tgl']; ?></td>
        <td><?= "Rp " . number_format($user['total_bayar'], 0, ',', '.');  ?></td>
        <td><?= $user['id_user']; ?></td>
        <td>
            <a class="btn btn-sm btn-outline-secondary" id="btnDetail" href="<?= base_url('penjualan/detailpenjualan/' . $user['id_penjualan']); ?>">Detail</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <?= $this->endSection(); ?>
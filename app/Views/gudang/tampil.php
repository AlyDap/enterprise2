<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
  .page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #212529 !important;
    background-color: #e2e3e5 !important;
    border: 1px solid #a4a4a4 !important;
  }

  .page-link:hover {
    z-index: 2;
    color: #fff !important;
    text-decoration: none;
    background-color: #a4a4a4 !important;
    border-color: #dee2e6;
  }

  .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #a4a4a4 !important;
    border-color: #a4a4a4;
  }

  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
<?php
if (!empty(session()->getFlashdata('success'))) { ?>
  <div class="alert alert-dark alert-dismissible fade show" role="alert" style="text-align: center;">
    <strong><?php echo session()->getFlashdata('success'); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<?php if (!empty(session()->getFlashdata('info'))) { ?>
  <div class="alert alert-dark alert-dismissible fade show" role="alert" style="text-align: center;">
    <strong><?php echo session()->getFlashdata('info'); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php } ?>

<h1 style="text-align: center;">Daftar Pembelian</h1>
<hr>

<div class="dropdown">
  <a role="button" class="btn btn-outline-dark gaprint" href="<?= base_url('gudang/tambahpembelian'); ?>">Tambah Pembelian</a>
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> Laporan
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?= base_url('gudang/laporanharian'); ?>">laporan harian</a></li>
    <li><a class="dropdown-item" href="<?= base_url('gudang/laporanbulanan'); ?>">laporan bulanan</a></li>
    <li><a class="dropdown-item" href="<?= base_url('gudang/laporantahunan'); ?>">laporan tahunan</a></li>
  </ul>
</div><br>
<table class="table table-secondary table-striped-columns" style="border-collapse:collapse ;border-radius: 10px;overflow: hidden;">
  <thead>
    <tr style="text-align: center;">
      <th scope="col" style="padding: 15px;">No</th>
      <th scope="col" style="padding: 15px;">No Pembelian</th>
      <th scope="col" style="padding: 15px;">Tanggal</th>
      <th scope="col" style="padding: 15px;">Total Bayar</th>
      <th scope="col" style="padding: 15px;">Id Supplier</th>
      <th scope="col" style="padding: 15px;">Id User</th>
      <th scope="col" style="padding: 15px;">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php $i = 1;
    foreach ($users as  $row) { ?>
      <tr style="text-align: center; vertical-align: middle;">
        <th scope="row"><?= $i++; ?></td>
        <td><?= $row['no_pembelian']; ?></td>
        <td><?= $row['tgl']; ?></td>
        <td>Rp <?= number_format($row['total_bayar'], 0, ',', '.'); ?></td>
        <td><?= $row['id_supplier']; ?></td>
        <td><?= $row['id_user']; ?></td>
        <td><a href="<?= base_url('gudang/detailpembelian/' . $row['no_pembelian']); ?>" class="btn btn-sm btn-outline-secondary">Detail</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div class="pagination">
  <?php //var_dump($pager); 
  ?>

</div>
<?= $this->endSection(); ?>
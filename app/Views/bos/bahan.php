<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (!empty(session()->getFlashdata('success'))) { ?>
    <div class="alert alert-dark" style="text-align: center;">
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php } ?>

<?php if (!empty(session()->getFlashdata('info'))) { ?>
    <div class="alert alert-secondary" style="text-align: center;">
        <?php echo session()->getFlashdata('info'); ?>
    </div>
<?php } ?>

<?php if (!empty(session()->getFlashdata('warning'))) { ?>
    <div class="alert alert-warning" style="text-align: center;">
        <?php echo session()->getFlashdata('warning'); ?>
    </div>
<?php } ?>
<h1 style="text-align: center;">Tabel Bahan</h1>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan/createbahan'); ?>" style="margin-bottom: 5px; float: right;">Tambah Bahan</a>
<table class="table table-dark table-striped-columns" style="border-collapse:collapse ;border-radius: 10px;overflow: hidden;">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" style="padding: 15px;">No</th>
            <th scope="col" style="padding: 15px;">Nama</th>
            <th scope="col" style="padding: 15px;">Qty</th>
            <th scope="col" style="padding: 15px;">Harga</th>
            <th scope="col" style="padding: 15px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bahan as $key => $row) { ?>
            <tr style="text-align: center; vertical-align: middle;">
                <th scope="row"><?= $key + 1; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td>Rp<?= $row['harga']; ?>,00</td>
                <td><a href="<?= base_url('bahan/edit' . $row['id_bahan']); ?>" class="btn btn-sm btn-outline-light">Edit</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?= $this->endSection(); ?>
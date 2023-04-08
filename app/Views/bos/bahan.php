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
<h1 style="text-align: center;">Bahan Pembuatan Batik</h1>
<hr>
<br>
<form action="<?= base_url('bahan'); ?>" method="get">
    <div class="mb-3">
        <a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan/createbahan'); ?>" style="margin-bottom: 5px; float: right;">Tambah Bahan</a>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label class="col-form-label">Cari Bahan</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" name="keyword" placeholder="Masukan nama bahan..." value="<?= session()->get('keyword'); ?>">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    <em>press Enter</em>
                </span>
            </div>
        </div>
    </div>
</form>
<table class="table table-secondary table-striped-columns" style="border-collapse:collapse ;border-radius: 10px;overflow: hidden;">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" style="padding: 15px;">No</th>
            <th scope="col" style="padding: 15px;">Nama</th>
            <th scope="col" style="padding: 15px;">Qty</th>
            <th scope="col" style="padding: 15px;">Harga</th>
            <th scope="col" style="padding: 15px;">Status</th>
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
                <td><?= $row['status']; ?></td>
                <td><a href="<?= base_url('bahan/editbahan/' . $row['id_bahan']); ?>" class="btn btn-sm btn-outline-secondary">Edit</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?= $pager->links(); ?>
</div>
<?= $this->endSection(); ?>
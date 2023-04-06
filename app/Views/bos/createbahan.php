<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Tambah Bahan</h1>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<?php
// if (!empty($inputs)){
//   $inputs = session()->getFlashdata('inputs');
//}
$errors = session()->getFlashdata('errors');
if (!empty($errors)) { ?>
    <div class="alert alert-dark" role="alert">
        Whoops! Ada kesalahan saat input data, yaitu:
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php } ?>
<form action="<?= base_url('bahan/storebahan'); ?>" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Bahan</label>
        <input type="text" class="form-control" placeholder="Masukan nama bahan" name="nama">
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Bahan</label>
        <input type="number" class="form-control" placeholder="Masukan jumlah bahan" name="jumlah">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Bahan</label>
        <input type="number" class="form-control" placeholder="Masukan harga bahan" name="harga">
    </div>
    <button type="submit" class="btn btn-outline-dark">Save</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan/createbahan'); ?>" style="margin-bottom: 5px; float: right;">Clear</a>
</form>
<?= $this->endSection(); ?>
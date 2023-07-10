<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Tambah Penjahit</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('penjahit'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('penjahit/storepenjahit'); ?>" method="post" autocomplete="off">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Penjahit</label>
        <input type="text" class="form-control" placeholder="Masukan nama penjahit" name="nama" autofocus required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Penjahit</label>
        <input type="text" class="form-control" placeholder="Masukan alamat penjahit" name="alamat" required minlength="7" maxlength="70" oninvalid="this.setCustomValidity('Wajib dengan 7-70 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No Hp Penjahit</label>
        <input type="text" class="form-control" placeholder="Masukan No Hp penjahit" name="no_hp" required minlength="5" maxlength="15" oninvalid="this.setCustomValidity('Wajib dengan 5-15 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Penjahit</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status Penjahit</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Save</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('penjahit/createpenjahit'); ?>" style="margin-bottom: 5px; float: right;">Clear</a>
</form>
<?= $this->endSection(); ?>
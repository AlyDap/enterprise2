<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Tambah Mitra</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('mitra'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('mitra/storemitra'); ?>" method="post" autocomplete="off">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan nama mitra" name="nama" autofocus required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan alamat mitra" name="alamat" required minlength="7" maxlength="70" oninvalid="this.setCustomValidity('Wajib diisi dengan 7-70 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Mitra</label>
        <input type="email" class="form-control" placeholder="Masukan email mitra" name="email" required minlength="5" maxlength="50" oninvalid="this.setCustomValidity('Wajib diisi 5-50 karakter dengan format email yang benar')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No Hp Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan no Hp mitra" name="no_hp" required minlength="5" maxlength="15" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-15 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Mitra</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status Mitra</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Save</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('mitra/createmitra'); ?>" style="margin-bottom: 5px; float: right;">Clear</a>
</form>
<?= $this->endSection(); ?>
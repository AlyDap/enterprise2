<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Edit Mitra</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('mitra'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('mitra/updatemitra'); ?>" method="post" autocomplete="off">
    <input type="hidden" name="id_mitra" value="<?= $mitra['id_mitra']; ?>">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan nama mitra" name="nama" value="<?= $mitra['nama']; ?>" required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">alamat Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan alamat mitra" name="alamat" value="<?= $mitra['alamat']; ?>" required minlength="7" maxlength="70" oninvalid="this.setCustomValidity('Wajib diisi dengan 7-70 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan Email mitra" name="email" value="<?= $mitra['email']; ?>" required minlength="5" maxlength="50" oninvalid="this.setCustomValidity('Wajib diisi 5-50 karakter dengan format email yang benar')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="no_hp" class="form-label">No Hp Mitra</label>
        <input type="text" class="form-control" placeholder="Masukan No Hp mitra" name="no_hp" value="<?= $mitra['no_hp']; ?>" required minlength="5" maxlength="15" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-15 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Mitra</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status mitra</option>
            <option value="Active" <?= $mitra['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?= $mitra['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Update</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('mitra/createmitra'); ?>" style="margin-bottom: 5px; float: right;">Tambah Mitra Baru</a>
</form>
<?= $this->endSection(); ?>
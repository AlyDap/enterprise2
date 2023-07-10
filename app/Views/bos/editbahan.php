<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Edit Bahan</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('bahan/updatebahan'); ?>" method="post" autocomplete="off">
    <input type="hidden" name="id_bahan" value="<?= $bahan['id_bahan']; ?>">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Bahan</label>
        <input type="text" class="form-control" placeholder="Masukan nama bahan" name="nama" value="<?= $bahan['nama']; ?>" required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Bahan</label>
        <input type="number" class="form-control" placeholder="Masukan jumlah bahan" value="<?= $bahan['jumlah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Bahan</label>
        <input type="number" class="form-control" placeholder="Masukan harga bahan" name="harga" value="<?= $bahan['harga']; ?>" required min="1000" step="1000" oninvalid="this.setCustomValidity('Wajib diisi dengan kelipatan 1000')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="panjang" class="form-label">Panjang Bahan</label>
        <input type="text" class="form-control" placeholder="Masukan panjang bahan" name="panjang_kain" value="<?= $bahan['panjang_kain']; ?>" required maxlength="50" oninvalid="this.setCustomValidity('Wajib diisi dengan 1-50 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Bahan</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status bahan</option>
            <option value="Active" <?= $bahan['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?= $bahan['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Update</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('bahan/createbahan'); ?>" style="margin-bottom: 5px; float: right;">Tambah Bahan Baru</a>
</form>
<?= $this->endSection(); ?>
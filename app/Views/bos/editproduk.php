<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Edit Produk</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('produk'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('produk/updateproduk'); ?>" method="post" autocomplete="off">
    <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" placeholder="Masukan nama produk" name="nama" value="<?= $produk['nama']; ?>" required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="ukuran" class="form-label">Ukuran Produk</label>
        <input type="text" class="form-control" placeholder="Masukan ukuran produk" name="ukuran" value="<?= $produk['ukuran']; ?>" required minlength="1" maxlength="10" oninvalid="this.setCustomValidity('Wajib diisi dengan 1-10 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Produk</label>
        <input type="number" class="form-control" placeholder="Masukan jumlah produk" value="<?= $produk['jumlah']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="biaya_jual" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" placeholder="Masukan harga produk" name="biaya_jual" value="<?= $produk['biaya_jual']; ?>" required min="1000" step="1000" oninvalid="this.setCustomValidity('Wajib diisi dengan kelipatan 1000')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="biaya_produksi" class="form-label">Biaya Pembuatan Produk</label>
        <input type="number" class="form-control" placeholder="Masukan biaya pembuatan produk" name="biaya_produksi" value="<?= $produk['biaya_produksi']; ?>" required min="1000" step="1000" oninvalid="this.setCustomValidity('Wajib diisi dengan kelipatan 1000')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="jumlah_produksi_perkain" class="form-label">Jumlah Produksi Per Kain</label>
        <input type="number" class="form-control" placeholder="Masukan Jumlah Produksi Per Kain" name="jumlah_produksi_perkain" value="<?= $produk['jumlah_produksi_perkain']; ?>" required min="1" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="panjang_kain_perproduksi" class="form-label">Panjang Kain Per Produksi</label>
        <input type="text" class="form-control" placeholder="Masukan Panjang Kain Per Produksi" name="panjang_kain_perproduksi" value="<?= $produk['panjang_kain_perproduksi']; ?>" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Produk</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status Produk</option>
            <option value="Active" <?= $produk['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?= $produk['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Update</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('produk/createproduk'); ?>" style="margin-bottom: 5px; float: right;">Tambah Produk Baru</a>
</form>
<?= $this->endSection(); ?>
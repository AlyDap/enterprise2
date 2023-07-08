<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Tambah Produk</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('produk'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?= base_url('produk/storeproduk'); ?>" method="post" autocomplete="off">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" placeholder="Masukan nama produk" name="nama" autofocus required minlength="5" maxlength="30" oninvalid="this.setCustomValidity('Wajib diisi dengan 5-30 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="ukuran" class="form-label">Ukuran Produk</label>
        <input type="text" class="form-control" placeholder="Masukan ukuran produk" name="ukuran" autofocus required minlength="1" maxlength="10" oninvalid="this.setCustomValidity('Wajib diisi dengan 1-10 karakter')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Produk</label>
        <input type="number" class="form-control" placeholder="Masukan jumlah produk" name="jumlah" required min="1" oninvalid="this.setCustomValidity('Wajib diisi min 1 produk')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="biaya_jual" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" placeholder="Masukan harga produk" name="biaya_jual" required min="1000" step="1000" oninvalid="this.setCustomValidity('Wajib diisi dengan kelipatan 1000')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="biaya_produksi" class="form-label">Biaya Pembuatan Produk</label>
        <input type="number" class="form-control" placeholder="Masukan biaya pembuatan produk" name="biaya_produksi" required min="1000" step="1000" oninvalid="this.setCustomValidity('Wajib diisi dengan kelipatan 1000')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="jumlah_produksi_perkain" class="form-label">Jumlah Produksi Per Kain</label>
        <input type="number" class="form-control" placeholder="Masukan Jumlah Produksi Per Kain" name="jumlah_produksi_perkain" required min="1" oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="panjang_kain_perproduksi" class="form-label">Panjang Kain Per Produksi</label>
        <input type="text" class="form-control" placeholder="Masukan Panjang Kain Per Produksi" name="panjang_kain_perproduksi" required oninvalid="this.setCustomValidity('Wajib diisi')" oninput="this.setCustomValidity('')">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Produk</label>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected value="Active">Pilih status Produk</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>
    <button type="submit" class="btn btn-outline-dark">Save</button>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('produk/createproduk'); ?>" style="margin-bottom: 5px; float: right;">Clear</a>
</form>
<?= $this->endSection(); ?>
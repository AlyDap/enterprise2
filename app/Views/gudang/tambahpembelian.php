<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Tambah Pembelian</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('gudang/tampil'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<?= form_open('gudang/storeDetailPembelian') ?>


<input type="hidden" name="id_user" value="<?= session('username') ?>"><br>
<label>ID Mitra:</label><br>
<select name="id_mitra" id="id_mitra" required>
    <option value=""></option>
    <?php foreach ($mitra as $row) : ?>
        <option value="<?= $row['id_mitra'] ?>"><?= $row['nama'] ?> </option>
    <?php endforeach; ?>
</select><br>

<!-- bahan -->
<label>ID Bahan:</label><br>
<select name="id_bahan" id="id_bahan" required>
    <option value=""></option>
    <?php foreach ($bahan as $row) : ?>
        <option value="<?= $row['id_bahan'] ?>"><?= $row['nama'] ?> </option>
    <?php endforeach; ?>
</select><br>


<label>Harga:</label><br>
<input type="text" name="harga" readonly id="harga"><br>

<label>Jumlah:</label><br>
<input type="number" name="jumlah" id="stok"><br>

<label>Total:</label><br>
<input type="number" name="total" id="total" readonly><br>

<input type="submit" value="Submit" id="submit" onclick="isi()">


<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    let hargasubmit;
    $(document).ready(function() {
        // Ketika dropdown produk dipilih
        $('#id_bahan').on('change', function() {
            // Ambil nilai ID produk yang dipilih
            var id_bahan = $(this).val();

            // Lakukan request AJAX ke controller untuk mendapatkan harga produk
            $.ajax({
                url: '<?php echo base_url('penjualan/get_harga_bahan') ?>',
                method: 'post',
                data: {
                    id_bahan: id_bahan
                },
                dataType: 'json',
                success: function(response) {
                    // Set nilai harga pada input harga
                    $('#harga').val(response.harga);
                    hargasubmit = response.harga;
                    var inputNumber = document.getElementById('stok');
                    inputNumber.setAttribute('max', response.stok);
                },
                error: function(xhr, status, error) {
                    $('#harga').val(0);
                    console.error(xhr.responseText);
                }
            });
        });
        $('#stok').on('change', function() {
            $('#total').val($('#harga').val() * $('#stok').val());
        });

        function isi() {
            $('#harga').val(hargasubmit);
            $('#total').val($('#harga').val() * $('#stok').val());

        };
    });
</script>


<?= $this->endSection(); ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1 style="text-align: center;">Tambah Produksi</h1>
<hr>
<a role="button" class="btn btn-outline-dark" href="<?= base_url('produksi/penjahitan'); ?>" style="margin-bottom: 5px; float: right;">Back</a>
<br>
<br>
<form action="<?php echo base_url('produksi/storeproduksi'); ?>" method="post">

  <input type="hidden" name="id_user" value="<?php // echo session('id_user') 
                                              ?>"><br>
  <input type="hidden" name="id_user" value="6"><br>

  <label>Pilih Bahan</label><br>
  <select name="id_bahan" id="id_bahan" required>
    <option value=""></option>
    <?php foreach ($bahan as $row) : ?>
      <option value="<?= $row['id_bahan'] ?>"><?= $row['nama'] ?> </option>
    <?php endforeach; ?>
  </select><br>

  <label>Pilih Penjahit</label><br>
  <select name="id_penjahit" id="id_penjahit" required>
    <option value=""></option>
    <?php foreach ($penjahit as $row) : ?>
      <option value="<?= $row['id_penjahit'] ?>"><?= $row['nama'] ?> </option>
    <?php endforeach; ?>
  </select><br>

  <label>Pilih Produk</label><br>
  <select name="id_produk" id="id_produk" required>
    <option value=""></option>
    <?php foreach ($produk as $row) : ?>
      <option value="<?= $row['id_produk'] ?>"><?= $row['nama'] ?> </option>
    <?php endforeach; ?>
  </select><br>

  <label>Ukuran:</label><br>
  <input type="text" name="ukuran" readonly id="ukuran"><br>

  <label>Harga Produksi:</label><br>
  <input type="text" name="harga" readonly id="harga"><br>

  <label>Jumlah:</label><br>
  <input type="number" name="jumlah" required min="1" id="stok"><br>

  <label>Total Produksi:</label><br>
  <input type="number" name="total_bayar" id="total" readonly><br>
  <input type="hidden" name="biaya_produksi" id="total2">

  <input type="submit" value="Submit" id="submit" onclick="isi()">
</form>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  let hargasubmit;
  let ukuransubmit;
  $(document).ready(function() {
    // Ketika dropdown produk dipilih
    $('#id_produk').on('change', function() {
      // Ambil nilai ID produk yang dipilih
      var id_produk = $(this).val();

      // Lakukan request AJAX ke controller untuk mendapatkan harga produk
      $.ajax({
        url: '<?php echo base_url('produksi/get_harga_produk') ?>',
        method: 'post',
        data: {
          id_produk: id_produk
        },
        dataType: 'json',
        success: function(response) {
          // Set nilai harga pada input harga
          $('#harga').val(response.harga);
          hargasubmit = response.harga;
          $('#ukuran').val(response.ukuran);
          ukuransubmit = response.ukuran;
          // var inputNumber = document.getElementById('stok');
          // inputNumber.setAttribute('max', response.stok);
        },
        error: function(xhr, status, error) {
          $('#harga').val(0);
          console.error(xhr.responseText);
        }
      });
    });
    $('#stok').on('change', function() {
      $('#total').val($('#harga').val() * $('#stok').val());
      $('#total2').val($('#harga').val() * $('#stok').val());
    });

    function isi() {
      $('#harga').val(hargasubmit);
      $('#total').val($('#harga').val() * $('#stok').val());
      $('#total2').val($('#harga').val() * $('#stok').val());

    };
  });
</script>


<?= $this->endSection(); ?>
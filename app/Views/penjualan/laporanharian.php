<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session('sucessLaporan')) : ?>
    <script>
        alert('LAPORAN BERHASIL DIKIRIMKAN KE BOS');
    </script>

    <?php session()->destroy('successLaporan') ?>
<?php endif ?>

<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">tanggal</label>
        <div class="col-sm-3 input-group">
            <input type="date" class="form-control" name="tgl" id="tgl">
            <span class="input-group-append">
                <button onclick="viewtabellaporan()" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#">
                    <i class="fas fa-file-alt"></i> view laporan
                    </a>
                </button>
                <button onclick="kirimLaporanharian()" class="btn btn-secondary">Kirim Laporan</button>
            </span>
        </div>
    </div>
    <div class="col-sm-12">
        <hr>
        <div class="tabel">

        </div>
    </div>
    <script>
        function viewtabellaporan() {
            let tgl = $('#tgl').val();
            console.log(tgl);
            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/viewlaporanharian') ?>",
                data: {
                    tgl: tgl,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.tabel').html(response.data);
                        console.log(response.data);
                    }
                }
            })
        }

        function kirimLaporanharian() {
            let tgl = $('#tgl').val();
            if (tgl) {
                location.href = '<?= base_url('penjualan/kirimlaporanharian/') ?>' + tgl;
            } else {
                alert('DATA KOSONG GAUSA KIRIM KE BOS TEMAN2')
            }
        }
    </script>


    <?= $this->endSection(); ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">tanggal</label>
        <div class="col-sm-3 input-group">
            <input type="date" class="form-control" id="tanggal" placeholder="tanggal">
            <span class="input-group-append">
                <button onclick="viewtabellaporan()" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#">
                    <i class="fas fa-file-alt"></i> view laporan
                    </a>
                    <button class="btn btn-success btn-flat">
                        <i target="_blank" class="fas fa-print"></i> cetak laporan
                    </button>
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
            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/viewlaporanharian') ?>",
                data: {

                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.tabel').html(response.data)
                    }
                }
            })
        }
    </script>


    <?= $this->endSection(); ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Bulan</label>
        <div class="col-sm-3 input-group">
            <input type="month" class="form-control" name="bln" id="bln">
            <span class="input-group-append">
                <button onclick="viewtabellaporan()" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#">
                    <i class="fas fa-file-alt"></i> view laporan
                    </a>
                </button>
                <a role="button" target="_blank" class="btn btn-outline-dark gaprint" href="<?= base_url('penjualan/cetaklaporanharian'); ?>">Cetak Penjualan</a>
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
            let bln = $('#bln').val();
            console.log(bln);
            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/viewlaporanbulanan') ?>",
                data: {
                    bln: bln,
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
    </script>


    <?= $this->endSection(); ?>
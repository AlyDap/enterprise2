<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card-body">
    <div class="form-group row">
        <label class="col-sm-1 col-form-label">Tahun</label>
        <div class="col-sm-3 input-group">
            <input type="year" class="form-control" name="thn" id="thn">
            <span class="input-group-append">
                <button onclick="viewtabellaporan()" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#">
                    <i class="fas fa-file-alt"></i> view laporan
                    </a>
                </button>
                <button onclick="kirimLaporantahunan()" class="btn btn-secondary">Kirim Laporan</button>
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
            let thn = $('#thn').val();
            console.log(thn);
            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/viewlaporantahunan') ?>",
                data: {
                    thn: thn,
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

        function kirimLaporantahunan() {
            let thn = $('#thn').val();
            if (thn) {
                location.href = '<?= base_url('penjualan/kirimlaporantahunan/') ?>' + thn;
            } else {
                alert('DATA KOSONG GAUSA KIRIM KE BOS TEMAN2')
            }
        }
    </script>


    <?= $this->endSection(); ?>
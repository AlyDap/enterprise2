<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card-body">
    <a role="button" class="btn btn-outline-dark " href="<?= base_url('bos/index'); ?>" style="float: right; margin-right: 12px;">Kembali</a>
    <div class="btn-group" style="float: right; margin-right: 12px;">
        <button type="button" class="btn btn-outline-dark" disabled>Grafik</button>
        <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('Bos/detailGrafikPenjualan'); ?>">Grafik Bulanan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Bos/detailGrafikPenjualan'); ?>">Grafik Tahunan</a></li>
            <!-- <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li> -->
        </ul>
    </div>

    <div class="form-group row">

        <div class="col-sm-3 input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Tanggal</span>
            <input type="date" class="form-control" name="tgl" id="tgl">
            <button onclick="viewgrafik()" class="btn btn-outline-dark btn-flat" data-toggle="modal" data-target="#" disabled>
                <i class="fas fa-file-alt"></i> Lihat
                </a>
            </button>
            <!-- <span class="input-group-append"> -->
            <!-- </span> -->
        </div>
    </div>
    <div class="col-sm-12">
        <hr>
        <div class="grafik">

        </div>
    </div>
    <script>
        function viewgrafik() {
            let tgl = $('#tgl').val();
            console.log(tgl);
            $.ajax({
                type: "POST",
                url: "<?= base_url('Bos/viewDetailGrafikPenjualanHarian') ?>",
                data: {
                    tgl: tgl,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.grafik').html(response.data);
                        console.log(response.data);
                    }
                }
            })
        }
        $(document).ready(function() {
            $('#tgl').change(function() {
                if ($('#tgl').val() !== '') {
                    $('button').prop('disabled', false); // Mengaktifkan tombol "Lihat Grafik"
                } else {
                    $('button').prop('disabled', true); // Menonaktifkan tombol "Lihat Grafik"
                }
            });
        });
    </script>
    <?= $this->endSection(); ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
    #hari,
    #gbln,
    #gthn,
    #bulan2,
    #tahun2 {
        display: none;
    }

    .dropdown-item:hover {
        cursor: pointer;
    }

    .ccc {
        height: 7px;
        /* border: 1px solid #fa4233; */
    }

    .ccc2 {
        height: 1px;
        margin: 7px 0 23px 0;
        border: 1px solid #000;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<a role="button" class="btn btn-outline-dark " href="<?= base_url('bos/index'); ?>">Kembali</a>
<div class="btn-group" style="float: right; ">
    <button type="button" class="btn btn-outline-dark disabled" disabled>Grafik</button>
    <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li id="hari" onclick="viewgrafik()"><a class="dropdown-item">Harian</a></li>
        <li id="bulan" onclick="viewgrafikk()"><a class="dropdown-item">Bulanan</a></li>
        <li id="tahun" onclick="viewgrafikkk()"><a class="dropdown-item">Tahunan</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li id="hari2"><a class="dropdown-item disabled">Harian</a></li>
        <li id="bulan2"><a class="dropdown-item disabled">Bulanan</a></li>
        <li id="tahun2"><a class="dropdown-item disabled">Tahunan</a></li>
    </ul>
</div>

<div class="ccc"></div>
<div class="form-group row" id="gtgl">
    <div class="col-sm-3 input-group">
        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal</span>
        <input type="date" class="form-control" name="tgl" id="tgl">
        <button onclick="viewgrafik()" id="lihattgl" class="btn btn-outline-dark btn-flat" data-toggle="modal" data-target="#" disabled>
            <i class="fas fa-chart-bar"></i> Lihat
            </a>
        </button>
    </div>
</div>

<div class="form-group row" id="gbln">
    <div class="col-sm-3 input-group">
        <span class="input-group-text" id="inputGroup-sizing-default">Bulan</span>
        <input type="month" class="form-control" name="bln" id="bln">
        <button onclick="viewgrafikk()" id="lihatbln" class="btn btn-outline-dark btn-flat" data-toggle="modal" data-target="#" disabled>
            <i class="fas fa-chart-bar"></i> Lihat
            </a>
        </button>
    </div>
</div>

<div class="form-group row" id="gthn">
    <div class="col-sm-3 input-group">
        <span class="input-group-text" id="inputGroup-sizing-default">Tahun</span>
        <!-- <input type="year" class="form-control" name="thn" id="thn"> -->
        <select class="form-select" aria-label="Default select example" name="thn" id="thn">
            <option value="">-- pilih --</option>
            <?php foreach ($pilihtahun as $thh) {
            ?>

                <option value="<?= $thh['tahun']; ?>"><?= $thh['tahun']; ?></option>
            <?php
            } ?>
        </select>
        <button onclick="viewgrafikkk()" id="lihatthn" class="btn btn-outline-dark btn-flat" data-toggle="modal" data-target="#" disabled>
            <i class="fas fa-chart-bar"></i> Lihat
            </a>
        </button>
    </div>
</div>

<div class="col-sm-12">
    <div class="ccc2"></div>
    <div class="grafik">

    </div>
</div>
<script>
    function viewgrafik() {
        let tgl = $('#tgl').val();
        console.log(tgl);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Bos/viewDetailGrafikPenjahitanHarian') ?>",
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

    function viewgrafikk() {
        let bln = $('#bln').val();
        console.log(bln);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Bos/viewDetailGrafikPenjahitanBulanan') ?>",
            data: {
                bln: bln,
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

    function viewgrafikkk() {
        let thn = $('#thn').val();
        console.log(thn);
        $.ajax({
            type: "POST",
            url: "<?= base_url('Bos/viewDetailGrafikPenjahitanTahunan') ?>",
            data: {
                thn: thn,
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
                $('#lihattgl').prop('disabled', false); // Mengaktifkan tombol "Lihat Grafik"
            } else {
                $('#lihattgl').prop('disabled', true); // Menonaktifkan tombol "Lihat Grafik"
            }
        });
        $('#bln').change(function() {
            if ($('#bln').val() !== '') {
                $('#lihatbln').prop('disabled', false); // Mengaktifkan tombol "Lihat Grafik"
            } else {
                $('#lihatbln').prop('disabled', true); // Menonaktifkan tombol "Lihat Grafik"
            }
        });
        $('#thn').change(function() {
            if ($('#thn').val() !== '') {
                $('#lihatthn').prop('disabled', false); // Mengaktifkan tombol "Lihat Grafik"
            } else {
                $('#lihatthn').prop('disabled', true); // Menonaktifkan tombol "Lihat Grafik"
            }
        });
    });
</script>
<!-- script untuk pilihan grafik-->
<script>
    // Mengambil referensi elemen "bulan" dan "tahun"
    var hariElement = document.getElementById("hari");
    var hari2Element = document.getElementById("hari2");
    var bulanElement = document.getElementById("bulan");
    var bulan2Element = document.getElementById("bulan2");
    var tahunElement = document.getElementById("tahun");
    var tahun2Element = document.getElementById("tahun2");
    var gTgl = document.getElementById("gtgl");
    var gBln = document.getElementById("gbln");
    var gThn = document.getElementById("gthn");

    // Fungsi untuk menyembunyikan elemen "hari"
    function hideHari() {
        hariElement.style.display = "none";
        hari2Element.style.display = "block";
    }
    // Fungsi untuk menampilkan elemen "hari"
    function showHari() {
        hariElement.style.display = "block";
        hari2Element.style.display = "none";
    }
    // Fungsi menampilkan inputan hari
    function showTgl() {
        gTgl.style.display = "block";
    }
    // Fungsi menampilkan inputan hari
    function hideTgl() {
        gTgl.style.display = "none";
    }

    // Fungsi untuk menyembunyikan elemen "bulan"
    function hideBulan() {
        bulanElement.style.display = "none";
        bulan2Element.style.display = "block";
    }
    // Fungsi untuk menampilkan elemen "bulan"
    function showBulan() {
        bulanElement.style.display = "block";
        bulan2Element.style.display = "none";
    }
    // Fungsi menampilkan inputan bulan
    function showBln() {
        gBln.style.display = "block";
    }
    // Fungsi menampilkan inputan bulan
    function hideBln() {
        gBln.style.display = "none";
    }

    // Fungsi untuk menyembunyikan elemen "tahun"
    function hideTahun() {
        tahunElement.style.display = "none";
        tahun2Element.style.display = "block";
    }
    // Fungsi untuk menampilkan elemen "tahun"
    function showTahun() {
        tahunElement.style.display = "block";
        tahun2Element.style.display = "none";
    }
    // Fungsi menampilkan inputan hari
    function showThn() {
        gThn.style.display = "block";
    }
    // Fungsi menampilkan inputan hari
    function hideThn() {
        gThn.style.display = "none";
    }

    // Menambahkan event listener untuk mengubah tampilan saat elemen diklik
    hariElement.addEventListener("click", function() {
        hideHari();
        showBulan();
        showTahun();
        showTgl();
        hideBln();
        hideThn();
    });

    bulanElement.addEventListener("click", function() {
        hideBulan();
        showHari();
        showTahun();
        showBln();
        hideTgl();
        hideThn();
    });

    tahunElement.addEventListener("click", function() {
        hideTahun();
        showHari();
        showBulan();
        showThn();
        hideTgl();
        hideBln();
    });
</script>

<?= $this->endSection(); ?>
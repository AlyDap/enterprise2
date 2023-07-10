<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* 
    gray #868B8E
    gray #707370
    Sumetal gray #595e60
    blask #171710
    misty blue #b0b7c0
    pewter #B9B7BD
    ivory #EEEDE7
    
    
    */
    button {
        text-decoration: none;
        border: 0;
        background: none;
    }

    .terang2 {
        background: #EEEDE7;
        border-radius: 5px;
        padding: 9px;
        padding-bottom: 5.7px;
        padding-left: 13px;
    }

    .terang {
        /* background: #E2DCD6; */
        border-radius: 5px;
        padding: 9px;
        padding-bottom: 5.7px;
        padding-left: 13px;
    }

    .kanan1,
    .kiri1 {
        border: #595e60 solid 3px;
    }

    .kaki {
        margin: 0;
        padding: 3px;
        width: 100%;
        display: grid;
        /* grid-template-columns: auto auto; */
        grid-template-columns: auto auto auto;
        justify-content: center;
        align-items: center;
        /* border: #595e60 solid 3px; */
        gap: 5%;
        padding-bottom: 39px;
        padding-top: 9px;
    }

    .kiri,
    .kanan,
    .tengah {
        display: grid;
        /* justify-content: center; */
        justify-self: center;
    }

    .kiri,
    .kanan {
        width: 355px;
    }

    .tengah {
        width: 275px;
    }

    @media(max-width:1399px) {
        .kaki {
            grid-template-columns: auto auto;
        }

        .tengah {
            width: 315px;
            grid-column: 1/3;
        }
    }

    @media(max-width:992px) {

        .kiri,
        .kanan {
            width: 300px;
        }

        .tengah {
            width: 285px;
        }
    }

    @media (max-width:767px) {
        .kaki {
            grid-template-columns: auto;
            justify-content: center;
            align-items: center;
            gap: 1.5%;
            grid-template-columns: auto;

        }

        .tengah {
            width: 300px;
            grid-column: 1/1;
        }
    }

    .heh {
        display: flex;
        justify-items: center;
        justify-content: left;
    }

    .ykiri,
    .ykanan,
    .ytengah {
        margin-top: 3px;
        text-align: center;
    }

    .kiri1 {
        text-align: center;
        border-radius: 5px 35px 0 35px;
        padding: 3.99px 11px 0 11px;
        background: #595e60;
        z-index: 4;
        color: #E2DCD6;
    }

    .kiri1 button {
        color: #E2DCD6;
        font-size: 17px;
        font-weight: 900;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .kika {
        border: #868B8E solid 3px;
        /* background: #868B8E; */
        background: #868B8E;
        border-radius: 5px 34px 0 35px;
        padding: 3px 7px 0 7px;
        height: 100%;
        color: #868B8E;
        margin: 0 -39px 0 -39px;
        z-index: 3;
    }

    .kanan1 {
        border-radius: 0 35px 0 35px;
        padding: 5px 17px 0 41px;
        color: #E2DCD6;
        background: #595e60;
        z-index: 2;
    }

    #content {
        margin: 13px 0;
        border-radius: 0 35px 0 35px;
        /* border: solid 3px #E2DCD6; */
        padding: 5px 0 5px 0;
        background: #E2DCD6;
    }

    #dropdown-menu li {
        cursor: pointer;
    }

    /* #hasilpil4,
    #hasilpil5 {
        display: none;
    } */
</style>

<div style="display: flex; align-items: center;">
    <h2 style="flex: 1;">DASHBOARD BOS</h2>
    <!-- Example split danger button -->
    <div class="btn-group" style="margin-right: 7px;">
        <button type="button" class="btn btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" id="pil0">Semua</a></li>
            <li><a class="dropdown-item" href="#" id="pil1">Penjualan</a></li>
            <li><a class="dropdown-item" href="#" id="pil2">Produksi</a></li>
            <li><a class="dropdown-item" href="#" id="pil3">Pembelian</a></li>
            <li><a class="dropdown-item" href="#" id="pil4">Penjahit</a></li>
            <li><a class="dropdown-item" href="#" id="pil5">Mitra</a></li>
        </ul>
        <button type="button" class="btn btn btn-outline-dark" disabled>Tampilkan Grafik</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn btn-outline-dark" disabled>Detail Grafik</button>
        <button type="button" class="btn btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('Bos/detailGrafikPenjualan'); ?>">Penjualan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('chatAll'); ?>">Produksi</a></li>
            <li><a class="dropdown-item" href="<?= base_url('chatAll'); ?>">Pembelian</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Bos/detailGrafikPenjahit'); ?>">Penjahit</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Bos/detailGrafikMitra'); ?>">Mitra</a></li>
            <!-- <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li> -->
        </ul>
    </div>
</div>


<div id="hasilpil1">
    <hr>
    <h3 style="text-align: center;" id="penj">Penjualan</h3>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplePenjualan">
        <div class="accordion-body">
            <div class="accordion" id="accordionPanelsStayOpenExamplePenjualan">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Hari Ini
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <?php echo view('bos/grafik1hari.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne2">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne2" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne2">
                            Selama 1 Pekan
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne2">
                        <div class="accordion-body">
                            <?php echo view('bos/grafik7hari.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne3">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne3" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne3">
                            Selama 90 Hari
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne3" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne3">
                        <div class="accordion-body">
                            <?php echo view('bos/grafik90hari.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne4">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne4" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne4">
                            Selama Ini
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne4">
                        <div class="accordion-body">
                            <?php echo view('bos/grafik.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <hr> -->


<div id="hasilpil2">
    <hr>
    <h3 style="text-align: center;">Produksi</h3>
    <div class="accordion" id="accordionFlushExample">
        <div class="accordion-body">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneproduksi1a" aria-expanded="true" aria-controls="collapseOneproduksi1a">
                        Hari Ini
                    </button>
                </h2>
                <div id="collapseOneproduksi1a" class="accordion-collapse collapse show" data-bs-parent="#accordionExampleproduksi">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpenjahitan1hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneproduksi1b" aria-expanded="true" aria-controls="collapseOneproduksi1b">
                        Selama 1 Pekan
                    </button>
                </h2>
                <div id="collapseOneproduksi1b" class="accordion-collapse collapse show" data-bs-parent="#accordionExampleproduksi">
                    <div class="accordion-body">
                        <?php //echo view('bos/grafikpenjahitan7hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneproduksi1c" aria-expanded="true" aria-controls="collapseOneproduksi1c">
                        Selama 90 Hari
                    </button>
                </h2>
                <div id="collapseOneproduksi1c" class="accordion-collapse collapse show" data-bs-parent="#accordionExampleproduksi">
                    <div class="accordion-body">
                        <?php //echo view('bos/grafikpenjahitan90hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneproduksi1d" aria-expanded="true" aria-controls="collapseOneproduksi1d">
                        Selama Ini
                    </button>
                </h2>
                <div id="collapseOneproduksi1d" class="accordion-collapse collapse show" data-bs-parent="#accordionExampleproduksi">
                    <div class="accordion-body">
                        <?php //echo view('bos/grafikpenjahitanfull.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hasilpil3">
    <hr>
    <h3 style="text-align: center;">Pembelian</h3>
    <div class="accordion" id="accordionFlushExample">
        <div class="accordion-body">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepembelian1a" aria-expanded="true" aria-controls="collapseOnepembelian1a">
                        Hari Ini
                    </button>
                </h2>
                <div id="collapseOnepembelian1a" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepembelian">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpembelian1hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepembelian1b" aria-expanded="true" aria-controls="collapseOnepembelian1b">
                        Selama 1 Pekan
                    </button>
                </h2>
                <div id="collapseOnepembelian1b" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepembelian">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpembelian7hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepembelian1c" aria-expanded="true" aria-controls="collapseOnepembelian1c">
                        Selama 90 Hari
                    </button>
                </h2>
                <div id="collapseOnepembelian1c" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepembelian">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpembelian90hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepembelian1d" aria-expanded="true" aria-controls="collapseOnepembelian1d">
                        Selama Ini
                    </button>
                </h2>
                <div id="collapseOnepembelian1d" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepembelian">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpembelianfull.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hasilpil4">
    <hr>
    <h3 style="text-align: center;">Penjahit</h3>
    <div class="accordion" id="accordionFlushExample">
        <div class="accordion-body">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepenjahit1a" aria-expanded="true" aria-controls="collapseOnepenjahit1a">
                        Hari Ini
                    </button>
                </h2>
                <div id="collapseOnepenjahit1a" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepenjahit">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpenjahit1hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepenjahit1b" aria-expanded="true" aria-controls="collapseOnepenjahit1b">
                        Selama 1 Pekan
                    </button>
                </h2>
                <div id="collapseOnepenjahit1b" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepenjahit">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpenjahit7hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepenjahit1c" aria-expanded="true" aria-controls="collapseOnepenjahit1c">
                        Selama 90 Hari
                    </button>
                </h2>
                <div id="collapseOnepenjahit1c" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepenjahit">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpenjahit90hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnepenjahit1d" aria-expanded="true" aria-controls="collapseOnepenjahit1d">
                        Selama Ini
                    </button>
                </h2>
                <div id="collapseOnepenjahit1d" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplepenjahit">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikpenjahitfull.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="hasilpil5">
    <hr>
    <h3 style="text-align: center;" id="mitra">Mitra</h3>
    <div class="accordion" id="accordionFlushExample">
        <div class="accordion-body">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnemitra1" aria-expanded="true" aria-controls="collapseOnemitra1">
                        Hari Ini
                    </button>
                </h2>
                <div id="collapseOnemitra1" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplemitra">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikmitra1hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnemitra2" aria-expanded="true" aria-controls="collapseOnemitra2">
                        Selama 1 Pekan
                    </button>
                </h2>
                <div id="collapseOnemitra2" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplemitra">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikmitra7hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnemitra3" aria-expanded="true" aria-controls="collapseOnemitra3">
                        Selama 90 Hari
                    </button>
                </h2>
                <div id="collapseOnemitra3" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplemitra">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikmitra90hari.php');
                        ?>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnemitra4" aria-expanded="true" aria-controls="collapseOnemitra4">
                        Selama Ini
                    </button>
                </h2>
                <div id="collapseOnemitra4" class="accordion-collapse collapse show" data-bs-parent="#accordionExamplemitra">
                    <div class="accordion-body">
                        <?php echo view('bos/grafikmitrafull.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<script>
    var pil0 = document.getElementById("pil0");
    var pil1 = document.getElementById("pil1");
    var pil2 = document.getElementById("pil2");
    var pil3 = document.getElementById("pil3");
    var pil4 = document.getElementById("pil4");
    var pil5 = document.getElementById("pil5");
    var hasilpil1 = document.getElementById("hasilpil1");
    var hasilpil2 = document.getElementById("hasilpil2");
    var hasilpil3 = document.getElementById("hasilpil3");
    var hasilpil4 = document.getElementById("hasilpil4");
    var hasilpil5 = document.getElementById("hasilpil5");

    function showpil0() {
        hasilpil1.style.display = "block";
        hasilpil2.style.display = "block";
        hasilpil3.style.display = "block";
        hasilpil4.style.display = "block";
        hasilpil5.style.display = "block";
    }

    function showpil1() {
        hasilpil1.style.display = "block";
        hasilpil2.style.display = "none";
        hasilpil3.style.display = "none";
        hasilpil4.style.display = "none";
        hasilpil5.style.display = "none";
    }

    function showpil2() {
        hasilpil2.style.display = "block";
        hasilpil1.style.display = "none";
        hasilpil3.style.display = "none";
        hasilpil4.style.display = "none";
        hasilpil5.style.display = "none";
    }

    function showpil3() {
        hasilpil3.style.display = "block";
        hasilpil1.style.display = "none";
        hasilpil2.style.display = "none";
        hasilpil4.style.display = "none";
        hasilpil5.style.display = "none";
    }

    function showpil4() {
        hasilpil4.style.display = "block";
        hasilpil1.style.display = "none";
        hasilpil2.style.display = "none";
        hasilpil3.style.display = "none";
        hasilpil5.style.display = "none";
    }

    function showpil5() {
        hasilpil5.style.display = "block";
        hasilpil1.style.display = "none";
        hasilpil2.style.display = "none";
        hasilpil3.style.display = "none";
        hasilpil4.style.display = "none";
    }

    pil0.addEventListener("click", function() {
        showpil0();
    })
    pil1.addEventListener("click", function() {
        showpil1();
    })
    pil2.addEventListener("click", function() {
        showpil2();
    })
    pil3.addEventListener("click", function() {
        showpil3();
    })
    pil4.addEventListener("click", function() {
        showpil4();
    })
    pil5.addEventListener("click", function() {
        showpil5();
    })
</script>

<?= $this->endSection(); ?>
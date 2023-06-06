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
</style>

<h1>DASHBOARD BOSSS</h1>
<hr>
<div class="terang">
    <div class="heh" style="margin-left: -5px;">
        <div class="kiri1">
            <button onclick="toggleVisibility()">
                +
            </button>
            <button onclick="toggleVisibility01()">
                -
            </button>
        </div>
        <div class="kika">
            <h4>a a</h4>
        </div>
        <div class="kanan1">
            <h5 style="margin-left: 5px;">Penjualan Setiap Tahun
            </h5>
        </div>
    </div>
    <div id="content">
        <?php
        echo view('bos/grafik.php');
        ?>
    </div>
</div>
<br>
<div class="terang2">
    <h5>Penjualan Per Bulan
        <button onclick="toggleVisibility2()"><strong>+/-</strong></button>
    </h5>
    <hr>
    <div id="content2">
        <details>
            <summary>2019</summary>
            <?= view('bos/grafik2019.php'); ?>
        </details>
        <details>
            <summary>2020</summary>
            <?= view('bos/grafik2020.php'); ?>
        </details>
        <details>
            <summary>2021</summary>
            <?= view('bos/grafik2021.php'); ?>
        </details>
        <details>
            <summary>2022</summary>
            <?= view('bos/grafik2022.php'); ?>
        </details>
        <details>
            <summary>2023</summary>
            <?= view('bos/grafik2023.php'); ?>
        </details>
        <hr>
        <form method="get">
            <select id="tahunDropdown" name="tahun">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <input type="button" value="Tampilkan" onclick="loadGrafik()">
        </form>
        <p id="ppp">Penjualan Tahun 2019</p>
        <div id="output"></div>
        <!-- <div id="grafikContainer"></div> -->
        <?php $grafff = 'grafik2019.php';
        if (isset($_GET['tahun'])) {
            $tahunTerpilih = $_GET['tahun'];
            if ($tahunTerpilih === "2019") {
                $grafff = 'produk';
            } else if ($tahunTerpilih === "2020") {
                $grafff = 'mitra';
            } else {
                $grafff = 'bahan';
            }
            // Tambahkan kondisi untuk tahun lain jika diperlukan
        }
        // echo view('bos/' . $grafff);
        ?>
    </div>
</div>


<script>
    var selectElement = document.getElementById("tahunDropdown");
    var outputElement = document.getElementById("output");
    var ppp = document.getElementById("ppp");
    var content2Element = document.getElementById("content2");

    // Menambahkan event listener pada perubahan nilai select
    selectElement.addEventListener("change", function() {
        ppp.style.display = "none";
        var tahunTerpilih = selectElement.value;
        if (tahunTerpilih == 2019) {
            outputElement.textContent = "Penjualan Tahun " + tahunTerpilih;
            <?php  // $grafff = 'mitra'; 
            ?>
        } else if (tahunTerpilih == 2020) {
            outputElement.textContent = "Penjualan Tahun " + tahunTerpilih;
            <?php // $grafff = 'bahan'; 
            ?>
        } else {
            outputElement.textContent = "Anda tidak memilih tahun 2019 atau 2020";
            <?php // $grafff = 'produk'; 
            ?>
        }
        // Memuat ulang konten grafik dengan nilai $grafff yang baru
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                content2Element.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "bos/" + "<?php echo $grafff; ?>", true);
        // xhttp.open("GET", "bos/bahan" + "", true);

        xhttp.send();
    });

    function toggleVisibility2() {
        var content2 = document.getElementById("content2");
        if (content2.style.display === "none") {
            content2.style.display = "block";
        } else {
            content2.style.display = "none";
        }
    }

    function toggleVisibility() {
        var content = document.getElementById("content");
        content.style.display = "block";
    }

    function toggleVisibility01() {
        var content = document.getElementById("content");
        content.style.display = "none";
    }
</script>
<?= $this->endSection(); ?>
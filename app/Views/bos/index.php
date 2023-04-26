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

    .kaki {
        margin: 0;
        padding: 0;
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
        justify-content: center;
        align-items: center;
        /* border: #595e60 solid 3px; */
        gap: 5%;
    }

    .kanan1,
    .kiri1 {
        border: #595e60 solid 3px;

    }

    @media (max-width:768px) {
        .kaki {
            grid-template-columns: auto;
            justify-content: center;
            align-items: center;
            gap: 1.5%;
        }
    }

    .heh {
        display: flex;
        justify-items: center;
        justify-content: left;
    }

    .ykiri,
    .ykanan {
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
            <h5 style="margin-left: 5px;">Pendapatan & Produk Terjual Tahunan
            </h5>
        </div>
    </div>
    <div id="content">
        <?php
        echo view('bos/grafik2.php');
        ?>
    </div>
</div>
<br>
<div class="terang2">
    <h5>Jumlah Produk Terjual Setiap Tahun
        <button onclick="toggleVisibility2()"><strong>+/-</strong></button>
    </h5>
    <div id="content2">
        <hr>
    </div>

</div>


<script>
    function toggleVisibility() {
        var content = document.getElementById("content");
        content.style.display = "block";
    }

    function toggleVisibility01() {
        var content = document.getElementById("content");
        content.style.display = "none";
    }

    function toggleVisibility2() {
        var content2 = document.getElementById("content2");
        if (content2.style.display === "none") {
            content2.style.display = "block";
        } else {
            content2.style.display = "none";
        }
    }
</script>
<?= $this->endSection(); ?>
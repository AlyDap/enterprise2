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

<h1>DASHBOARD PENJUALAN</h1>
<hr>

<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                <strong>Penjualan Setiap Tahun</strong>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <?php
                echo view('penjualan/grafik.php');
                ?>
            </div>
        </div>
    </div>
</div>
<br>



<script>
    var content2Element = document.getElementById("content2");
    var content = document.getElementById("content");

    function toggleVisibility2() {
        var content2 = document.getElementById("content2");
        if (content2.style.display === "none") {
            content2.style.display = "block";
        } else {
            content2.style.display = "none";
        }
    }

    function toggleVisibility() {
        content.style.display = "block";
    }

    function toggleVisibility01() {
        content.style.display = "none";
    }
</script>
<?= $this->endSection(); ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
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

    .gelap {
        background: #EEEDE7;
        border-radius: 5px;
        padding: 9px;
        padding-bottom: 5.7px;
        padding-left: 13px;
    }
</style>
<h1>DASHBOARD BOSSS</h1>
<hr>
<br>
<h5>Total Pendapatan Setiap Tahun<button onclick="toggleVisibility()"><strong>+</strong></button></h5>
<div id="content">
    <?php
    echo view('bos/grafik2.php');
    ?>
</div>
<br>
<hr>
<br>
<div class="gelap">

    <h5>Jumlah Produk Terjual Setiap Tahun
        <button onclick="toggleVisibility2()"><strong>-</strong></button>
    </h5>
    <div id="content2">
        <hr>
        <?php
        echo view('bos/grafik.php');
        ?>
        <br>
    </div>
</div>

<script>
    function toggleVisibility() {
        var content = document.getElementById("content");
        if (content.style.display === "none") {
            content.style.display = "block";
        } else {
            content.style.display = "none";
        }
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
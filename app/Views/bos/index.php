<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>DASHBOARD BOSSS</h1>
<hr>
<br>
<details>
    <summary>Total Pendapatan Setiap Tahun</summary>
    <?php
    echo view('bos/grafik2.php');
    ?>
</details>
<br>
<details>
    <summary>Jumlah Produk Terjual Setiap Tahun</summary>
    <?php
    echo view('bos/grafik.php');
    ?>
</details>


<?= $this->endSection(); ?>
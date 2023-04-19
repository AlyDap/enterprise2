<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>DASHBOARD BOSSS</h1>

<br>
<!-- <details> -->
<!-- <summary>Total Pendapatan Per Tahun</summary> -->
<?= view('bos/grafik2.php'); ?>
<!-- </details> -->
<br>
<!-- <details> -->
<!-- <summary>Jumlah Produk Terjual Per Tahun</summary> -->
<?php
// echo view('bos/grafik.php'); 
?>
<!-- </details> -->



<br>
<?= $this->endSection(); ?>
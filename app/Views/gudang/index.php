<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1>ini laman dashboard untuk bagian pembelian</h1>

<?php
if (!empty($grafik)) {
    foreach ($grafik as $key => $value) {
        $nama[] = $value['nama'];
        $jumlah[] = $value['jumlah'];
    }
} else {
    $nama = array('Data kosong');
    $jumlah = array(0);
}
?>
<div class="tengah">
    <canvas id="myChart3"></canvas>
</div>
<script>
    const ctx = document.getElementById('myChart3');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nama); ?>,
            datasets: [{
                label: 'Pembelian Bahan',
                data: <?= json_encode($jumlah); ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection(); ?>
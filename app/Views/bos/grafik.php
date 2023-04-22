<?php

foreach ($grafik as $key => $value) {
    $tahun[] = $value['tahun'];
    $jumlah[] = $value['jumlah'];
}


?>
<div class="con" style="width: 100%; display: flex; justify-content: center; align-items: center; align-content: center;">

    <div style="justify-content: center;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    // type: pie, bar, line
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?= json_encode($tahun); ?>,
            datasets: [{
                label: 'Produk Yang Terjual Per Tahun',
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
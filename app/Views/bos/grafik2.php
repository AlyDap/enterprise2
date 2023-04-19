<?php

foreach ($grafik2 as $key => $value) {
    $tahun[] = $value['tahun'];
    $total[] = $value['total'];
}

?>

<div class="con" style="width: 100%; display: flex; justify-content: center; align-items: center; align-content: center;">

    <div style="width: 755px; justify-content: center;">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($tahun); ?>,
            datasets: [{
                label: 'Pendapatan Tahunan',
                data: <?= json_encode($total); ?>,
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
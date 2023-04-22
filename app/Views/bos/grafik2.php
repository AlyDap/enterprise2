<?php

foreach ($grafik2 as $key => $value) {
    $tahun2[] = $value['tahun'];
    $total2[] = $value['total'];
}

?>

<div class="con" style="width: 100%; display: flex; justify-content: center; align-items: center; align-content: center;">

    <div style="width: 755px; justify-content: center;">
        <canvas id="myChart2"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx2 = document.getElementById('myChart2');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?= json_encode($tahun2); ?>,
            datasets: [{
                label: 'Pendapatan Tahunan',
                data: <?= json_encode($total2); ?>,
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
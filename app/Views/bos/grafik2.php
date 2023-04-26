<?php

foreach ($grafik2 as $key => $value) {
    $tahun2[] = $value['tahun'];
    $total2[] = $value['total'];
}
foreach ($grafik as $key => $value) {
    $tahun[] = $value['tahun'];
    $jumlah[] = $value['jumlah'];
}
?>



<div class="kaki">
    <div class="kiri">
        <canvas id="myChart"></canvas>
        <div class="ykiri">
            <?php foreach ($Qtytahunan as $QtyT) : ?>
                <h6>Total Produk Terjual <?=
                                            number_format($QtyT['jumlah'], 0, ',', '.');
                                            ?> Pcs</h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="kanan">
        <canvas id="myChart2"></canvas>
        <div class="ykanan">
            <?php foreach ($Rptahunan as $RPT) : ?>
                <h6>Total Pendapatan Rp <?=
                                        number_format($RPT['total'], 0, ',', '.');
                                        ?>,00</h6>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<script>
    const ctx2 = document.getElementById('myChart2');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?= json_encode($tahun2); ?>,
            datasets: [{
                label: 'Pendapatan Per Tahun',
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
<script>
    const ctx = document.getElementById('myChart');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctx, {
        type: 'bar',
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
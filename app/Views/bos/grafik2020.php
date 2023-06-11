<?php

if (!empty($grafikbulan2020)) {
    foreach ($grafikbulan2020 as $key => $value) {
        $bulan[] = $value['bulan'];
        $jumlah[] = $value['jumlah'];
    }
} else {
    $bulan = array('Data kosong');
    $jumlah = array(0);
}

if (!empty($grafik2bulan2020)) {
    foreach ($grafik2bulan2020 as $key => $value) {
        $bulan2[] = $value['bulan'];
        $total2[] = $value['total'];
    }
} else {
    $bulan2 = array('', 'Data kosong', '');
    $total2 = array();
}

if (!empty($grafik3bulan2020)) {
    foreach ($grafik3bulan2020 as $key => $value) {
        $nama3[] = $value['nama'];
        $jumlah3[] = $value['jumlah'];
    }
} else {
    $nama3[] = 'Produk belum terjual';
    $jumlah3[] = 0;
}


?>



<div class="kaki">
    <div class="kiri">
        <canvas id="myChartab"></canvas>
        <div class="ykiri">
            <?php foreach ($Qtybulanan2020 as $QtyB2020) : ?>
                <h6>Total Produk Terjual <?=
                                            number_format($QtyB2020['jumlah'], 0, ',', '.');
                                            ?> Pcs</h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="kanan">
        <canvas id="myChartab2"></canvas>
        <div class="ykanan">
            <?php foreach ($Rpbulanan2020 as $RpB2020) : ?>
                <h6>Total Pendapatan Rp <?=
                                        number_format($RpB2020['total'], 0, ',', '.');
                                        ?>,00</h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tengah">
        <canvas id="myChartab3"></canvas>
    </div>
</div>


<script>
    const ctxab2 = document.getElementById('myChartab2');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxab2, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode($bulan2); ?>,
            datasets: [{
                label: 'Pendapatan Per Bulan',
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
    const ctxab = document.getElementById('myChartab');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxab, {
        type: 'polarArea',
        data: {
            labels: <?= json_encode($bulan); ?>,
            datasets: [{
                label: 'Produk Yang Terjual Per Bulan',
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
<script>
    const ctxab3 = document.getElementById('myChartab3');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxab3, {
        type: 'radar',
        data: {
            labels: <?= json_encode($nama3); ?>,
            datasets: [{
                label: 'Produk Yang Terjual',
                data: <?= json_encode($jumlah3); ?>,
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
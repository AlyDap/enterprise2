<?php

if (!empty($grafikbulan2021)) {
    foreach ($grafikbulan2021 as $key => $value) {
        $bulan[] = $value['bulan'];
        $jumlah[] = $value['jumlah'];
    }
} else {
    $bulan = array('Data kosong');
    $jumlah = array(0);
}

if (!empty($grafik2bulan2021)) {
    foreach ($grafik2bulan2021 as $key => $value) {
        $bulan2[] = $value['bulan'];
        $total2[] = $value['total'];
    }
} else {
    $bulan2 = array('', 'Data kosong', '');
    $total2 = array();
}

if (!empty($grafik3bulan2021)) {
    foreach ($grafik3bulan2021 as $key => $value) {
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
        <canvas id="myChartac"></canvas>
        <div class="ykiri">
            <?php foreach ($Qtybulanan2021 as $QtyB2021) : ?>
                <h6>Total Produk Terjual <?=
                                            number_format($QtyB2021['jumlah'], 0, ',', '.');
                                            ?> Pcs</h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="kanan">
        <canvas id="myChartac2"></canvas>
        <div class="ykanan">
            <?php foreach ($Rpbulanan2021 as $RpB2021) : ?>
                <h6>Total Pendapatan Rp <?=
                                        number_format($RpB2021['total'], 0, ',', '.');
                                        ?>,00</h6>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tengah">
        <canvas id="myChartac3"></canvas>
    </div>
</div>


<script>
    const ctxac2 = document.getElementById('myChartac2');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxac2, {
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
    const ctxac = document.getElementById('myChartac');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxac, {
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
    const ctxac3 = document.getElementById('myChartac3');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxac3, {
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
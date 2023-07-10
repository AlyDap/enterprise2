<?php

if (!empty($cekPenjualan1Hari)) {
    foreach ($grafik1hariA as $key => $value) {
        $infoA[] = $value['jammenit'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafik1hariB as $key => $value) {
        $infoB[] = $value['jammenit'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafik1hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-1hari-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Terjual <?= number_format($Qty1hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-1hari-B"></canvas>
            <div class="ykanan">
                <h6>Total Pendapatan Rp <?= number_format($Rp1hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-1hari-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa1hariA = document.getElementById('myChart-1hari-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariA, {
            type: 'bar',
            data: {
                labels: <?= json_encode($infoA); ?>,
                datasets: [{
                    label: 'Produk Yang Terjual',
                    data: <?= json_encode($hasilA); ?>,
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
        const ctxa1hariB = document.getElementById('myChart-1hari-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariB, {
            type: 'line',
            data: {
                labels: <?= json_encode($infoB); ?>,
                datasets: [{
                    label: 'Pendapatan',
                    data: <?= json_encode($hasilB); ?>,
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
        const ctxa1hariC = document.getElementById('myChart-1hari-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariC, {
            type: 'pie',
            data: {
                labels: <?= json_encode($infoC); ?>,
                datasets: [{
                    label: 'Produk Yang Terjual Hari Ini',
                    data: <?= json_encode($hasilC); ?>,
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



<?php
} else {
?>
    <div class="alert alert-info" role="alert">
        Belum ada produk terjual hari ini.
    </div>
<?php
}
?>
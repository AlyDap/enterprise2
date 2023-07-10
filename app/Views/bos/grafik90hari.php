<?php

if (!empty($cekPenjualan90Hari)) {
    foreach ($grafik90hariA as $key => $value) {
        $infoA[] = $value['bulanhari'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafik90hariB as $key => $value) {
        $infoB[] = $value['bulanhari'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafik90hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-90hari-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Terjual <?= number_format($Qty90hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-90hari-B"></canvas>
            <div class="ykanan">
                <h6>Total Pendapatan Rp <?= number_format($Rp90hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-90hari-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa90hariA = document.getElementById('myChart-90hari-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariA, {
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
        const ctxa90hariB = document.getElementById('myChart-90hari-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariB, {
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
        const ctxa90hariC = document.getElementById('myChart-90hari-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariC, {
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
        Belum ada produk terjual selama 90 hari .
    </div>
<?php
}
?>
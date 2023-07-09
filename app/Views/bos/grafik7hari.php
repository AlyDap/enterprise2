<?php

if (!empty($cekPenjualan7Hari)) {
    foreach ($grafik7hariA as $key => $value) {
        $infoA[] = $value['haritanggal'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafik7hariB as $key => $value) {
        $infoB[] = $value['haritanggal'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafik7hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-7hari-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Terjual <?= number_format($Qty7hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-7hari-B"></canvas>
            <div class="ykanan">
                <h6>Total Pendapatan Rp <?= number_format($Rp7hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-7hari-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa7hariA = document.getElementById('myChart-7hari-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariA, {
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
        const ctxa7hariB = document.getElementById('myChart-7hari-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariB, {
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
        const ctxa7hariC = document.getElementById('myChart-7hari-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariC, {
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
        Belum ada produk terjual dalam 7 hari.
    </div>
<?php
}
?>
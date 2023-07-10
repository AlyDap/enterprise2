<?php

if (!empty($cekPenjualan90Hari)) {
    foreach ($grafikpembelian90hariA as $key => $value) {
        $infoA[] = $value['bulanhari'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpembelian90hariB as $key => $value) {
        $infoB[] = $value['bulanhari'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafikpembelian90hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-90hari-pembelian-A"></canvas>
            <div class="ykiri">
                <h6>Total Bahan Dibeli <?= number_format($QtyPembelian90hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-90hari-pembelian-B"></canvas>
            <div class="ykanan">
                <h6>Total Pengeluaran Pembelian Rp <?= number_format($RpPembelian90hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-90hari-pembelian-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa90hariPembelianA = document.getElementById('myChart-90hari-pembelian-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariPembelianA, {
            type: 'bar',
            data: {
                labels: <?= json_encode($infoA); ?>,
                datasets: [{
                    label: 'Bahan Yang Dibeli',
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
        const ctxa90hariPembelianB = document.getElementById('myChart-90hari-pembelian-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariPembelianB, {
            type: 'line',
            data: {
                labels: <?= json_encode($infoB); ?>,
                datasets: [{
                    label: 'Pengeluaran Pembelian',
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
        const ctxa90hariPembelianC = document.getElementById('myChart-90hari-pembelian-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90hariPembelianC, {
            type: 'pie',
            data: {
                labels: <?= json_encode($infoC); ?>,
                datasets: [{
                    label: 'Bahan Yang Dibeli',
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
        Belum ada bahan yang dibeli selama 90 hari.
    </div>
<?php
}
?>
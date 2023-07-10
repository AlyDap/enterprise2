<?php

if (!empty($cekPembelian1Hari)) {
    foreach ($grafikpembelian1hariA as $key => $value) {
        $infoA[] = $value['jammenit'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpembelian1hariB as $key => $value) {
        $infoB[] = $value['jammenit'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafikpembelian1hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-1hari-pembelian-A"></canvas>
            <div class="ykiri">
                <h6>Total Bahan Dibeli <?= number_format($QtyPembelian1hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-1hari-pembelian-B"></canvas>
            <div class="ykanan">
                <h6>Total Pengeluaran Pembelian Rp <?= number_format($RpPembelian1hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-1hari-pembelian-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa1hariPembelianA = document.getElementById('myChart-1hari-pembelian-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariPembelianA, {
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
        const ctxa1hariPembelianB = document.getElementById('myChart-1hari-pembelian-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariPembelianB, {
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
        const ctxa1hariPembelianC = document.getElementById('myChart-1hari-pembelian-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hariPembelianC, {
            type: 'pie',
            data: {
                labels: <?= json_encode($infoC); ?>,
                datasets: [{
                    label: 'Bahan Yang Dibeli Hari Ini',
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
        Belum ada bahan yang dibeli hari ini.
    </div>
<?php
}
?>
<?php

if (!empty($cekPenjahitan90Hari)) {
    foreach ($grafikpenjahitan90HariA as $key => $value) {
        $infoA[] = $value['bulanhari'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan90HariB as $key => $value) {
        $infoB[] = $value['bulanhari'];
        $hasilB[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan90HariC as $key => $value) {
        $infoC[] = $value['bulanhari'];
        $hasilC[] = $value['total'];
    }
    foreach ($grafikpenjahitan90HariD as $key => $value) {
        $infoD[] = $value['nama'];
        $hasilD[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan90HariE as $key => $value) {
        $infoE[] = $value['nama'];
        $hasilE[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-90Hari-penjahitan-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Dijahit <?= number_format($Qtyprodukdihasilkan90Hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-90Hari-penjahitan-B"></canvas>
            <div class="ykanan">
                <h6>Total Bahan Digunakan <?= number_format($Qtybahandigunakan90Hari->jumlah, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-90Hari-penjahitan-C"></canvas>
            <div class="ytengah">
                <h6>Total Pengeluaran penjahitan Rp <?= number_format($RpPenjahitan90Hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="kiri">
            <canvas id="myChart-90Hari-penjahitan-D"></canvas>
        </div>
        <div class="kanan">
            <canvas id="myChart-90Hari-penjahitan-E"></canvas>
        </div>
        <br><br>
    </div>




    <script>
        const ctxa90HaripenjahitanA = document.getElementById('myChart-90Hari-penjahitan-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90HaripenjahitanA, {
            type: 'bar',
            data: {
                labels: <?= json_encode($infoA); ?>,
                datasets: [{
                    label: 'Produk yang dijahit',
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
        const ctxa90HaripenjahitanB = document.getElementById('myChart-90Hari-penjahitan-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90HaripenjahitanB, {
            type: 'bar',
            data: {
                labels: <?= json_encode($infoB); ?>,
                datasets: [{
                    label: 'Bahan yang digunakan',
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
        const ctxa90HaripenjahitanC = document.getElementById('myChart-90Hari-penjahitan-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90HaripenjahitanC, {
            type: 'line',
            data: {
                labels: <?= json_encode($infoC); ?>,
                datasets: [{
                    label: 'Pengeluaran Produksi',
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
        const ctxa90HaripenjahitanD = document.getElementById('myChart-90Hari-penjahitan-D');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90HaripenjahitanD, {
            type: 'doughnut',
            data: {
                labels: <?= json_encode($infoD); ?>,
                datasets: [{
                    label: 'Produk yang dijahit',
                    data: <?= json_encode($hasilD); ?>,
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
        const ctxa90HaripenjahitanE = document.getElementById('myChart-90Hari-penjahitan-E');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa90HaripenjahitanE, {
            type: 'doughnut',
            data: {
                labels: <?= json_encode($infoE); ?>,
                datasets: [{
                    label: 'Bahan yang digunakan',
                    data: <?= json_encode($hasilE); ?>,
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
        Belum Ada Tranksaksi Penjahitan Selama 90 Hari.
    </div>
<?php
}
?>
<?php

if (!empty($cekPenjahitanTahunan)) {
    foreach ($grafikpenjahitanTahunanA as $key => $value) {
        $infoA[] = $value['tahun'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitanTahunanB as $key => $value) {
        $infoB[] = $value['tahun'];
        $hasilB[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitanTahunanC as $key => $value) {
        $infoC[] = $value['tahun'];
        $hasilC[] = $value['total'];
    }
    foreach ($grafikpenjahitanTahunanD as $key => $value) {
        $infoD[] = $value['nama'];
        $hasilD[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitanTahunanE as $key => $value) {
        $infoE[] = $value['nama'];
        $hasilE[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-Tahunan-penjahitan-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Dijahit <?= number_format($QtyprodukdihasilkanTahunan->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-Tahunan-penjahitan-B"></canvas>
            <div class="ykanan">
                <h6>Total Bahan Digunakan <?= number_format($QtybahandigunakanTahunan->jumlah, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-Tahunan-penjahitan-C"></canvas>
            <div class="ytengah">
                <h6>Total Pengeluaran penjahitan Rp <?= number_format($RpPenjahitanTahunan->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="kiri">
            <canvas id="myChart-Tahunan-penjahitan-D"></canvas>
        </div>
        <div class="kanan">
            <canvas id="myChart-Tahunan-penjahitan-E"></canvas>
        </div>
        <br><br>
    </div>




    <script>
        const ctxaTahunanpenjahitanA = document.getElementById('myChart-Tahunan-penjahitan-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanpenjahitanA, {
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
        const ctxaTahunanpenjahitanB = document.getElementById('myChart-Tahunan-penjahitan-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanpenjahitanB, {
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
        const ctxaTahunanpenjahitanC = document.getElementById('myChart-Tahunan-penjahitan-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanpenjahitanC, {
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
        const ctxaTahunanpenjahitanD = document.getElementById('myChart-Tahunan-penjahitan-D');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanpenjahitanD, {
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
        const ctxaTahunanpenjahitanE = document.getElementById('myChart-Tahunan-penjahitan-E');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanpenjahitanE, {
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
        Belum Ada Tranksaksi Penjahitan Selama Ini.
    </div>
<?php
}
?>
<?php

if (!empty($cekPenjahitan1Hari)) {
    foreach ($grafikpenjahitan1HariA as $key => $value) {
        $infoA[] = $value['jammenit'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan1HariB as $key => $value) {
        $infoB[] = $value['jammenit'];
        $hasilB[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan1HariC as $key => $value) {
        $infoC[] = $value['jammenit'];
        $hasilC[] = $value['total'];
    }
    foreach ($grafikpenjahitan1HariD as $key => $value) {
        $infoD[] = $value['nama'];
        $hasilD[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan1HariE as $key => $value) {
        $infoE[] = $value['nama'];
        $hasilE[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-1hari-penjahitan-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Dijahit <?= number_format($Qtyprodukdihasilkan1Hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-1hari-penjahitan-B"></canvas>
            <div class="ykanan">
                <h6>Total Bahan Digunakan <?= number_format($Qtybahandigunakan1Hari->jumlah, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-1hari-penjahitan-C"></canvas>
            <div class="ytengah">
                <h6>Total Pengeluaran penjahitan Rp <?= number_format($RpPenjahitan1Hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="kiri">
            <canvas id="myChart-1hari-penjahitan-D"></canvas>
        </div>
        <div class="kanan">
            <canvas id="myChart-1hari-penjahitan-E"></canvas>
        </div>
        <br><br>
    </div>




    <script>
        const ctxa1haripenjahitanA = document.getElementById('myChart-1hari-penjahitan-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahitanA, {
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
        const ctxa1haripenjahitanB = document.getElementById('myChart-1hari-penjahitan-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahitanB, {
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
        const ctxa1haripenjahitanC = document.getElementById('myChart-1hari-penjahitan-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahitanC, {
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
        const ctxa1haripenjahitanD = document.getElementById('myChart-1hari-penjahitan-D');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahitanD, {
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
        const ctxa1haripenjahitanE = document.getElementById('myChart-1hari-penjahitan-E');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahitanE, {
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
        Belum Ada Tranksaksi Penjahitan Hari Ini.
    </div>
<?php
}
?>
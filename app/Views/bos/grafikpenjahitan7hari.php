<?php

if (!empty($cekPenjahitan7Hari)) {
    foreach ($grafikpenjahitan7HariA as $key => $value) {
        $infoA[] = $value['haritanggal'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan7HariB as $key => $value) {
        $infoB[] = $value['haritanggal'];
        $hasilB[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan7HariC as $key => $value) {
        $infoC[] = $value['haritanggal'];
        $hasilC[] = $value['total'];
    }
    foreach ($grafikpenjahitan7HariD as $key => $value) {
        $infoD[] = $value['nama'];
        $hasilD[] = $value['jumlah'];
    }
    foreach ($grafikpenjahitan7HariE as $key => $value) {
        $infoE[] = $value['nama'];
        $hasilE[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-7Hari-penjahitan-A"></canvas>
            <div class="ykiri">
                <h6>Total Produk Dijahit <?= number_format($Qtyprodukdihasilkan7Hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-7Hari-penjahitan-B"></canvas>
            <div class="ykanan">
                <h6>Total Bahan Digunakan <?= number_format($Qtybahandigunakan7Hari->jumlah, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-7Hari-penjahitan-C"></canvas>
            <div class="ytengah">
                <h6>Total Pengeluaran penjahitan Rp <?= number_format($RpPenjahitan7Hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="kiri">
            <canvas id="myChart-7Hari-penjahitan-D"></canvas>
        </div>
        <div class="kanan">
            <canvas id="myChart-7Hari-penjahitan-E"></canvas>
        </div>
        <br><br>
    </div>




    <script>
        const ctxa7HaripenjahitanA = document.getElementById('myChart-7Hari-penjahitan-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7HaripenjahitanA, {
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
        const ctxa7HaripenjahitanB = document.getElementById('myChart-7Hari-penjahitan-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7HaripenjahitanB, {
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
        const ctxa7HaripenjahitanC = document.getElementById('myChart-7Hari-penjahitan-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7HaripenjahitanC, {
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
        const ctxa7HaripenjahitanD = document.getElementById('myChart-7Hari-penjahitan-D');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7HaripenjahitanD, {
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
        const ctxa7HaripenjahitanE = document.getElementById('myChart-7Hari-penjahitan-E');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7HaripenjahitanE, {
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
        Belum Ada Tranksaksi Penjahitan Selama 1 Pekan.
    </div>
<?php
}
?>
<?php

if (!empty($cekPenjualan90Hari)) {
    foreach ($grafikpembeliantahunanA as $key => $value) {
        $infoA[] = $value['tahun'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpembeliantahunanB as $key => $value) {
        $infoB[] = $value['tahun'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafikpembeliantahunanC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-Tahunan-pembelian-A"></canvas>
            <div class="ykiri">
                <h6>Total Bahan Dibeli <?php echo number_format($QtyPembeliantahunan->jumlah, 0, ',', '.');
                                        ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-Tahunan-pembelian-B"></canvas>
            <div class="ykanan">
                <h6>Total Pengeluaran Pembelian Rp <?= number_format($RpPembeliantahunan->total, 0, ',', '.');
                                                    ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-Tahunan-pembelian-C"></canvas>
        </div>
    </div>




    <script>
        const ctxaTahunanPembelianA = document.getElementById('myChart-Tahunan-pembelian-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanPembelianA, {
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
        const ctxaTahunanPembelianB = document.getElementById('myChart-Tahunan-pembelian-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanPembelianB, {
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
        const ctxaTahunanPembelianC = document.getElementById('myChart-Tahunan-pembelian-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxaTahunanPembelianC, {
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
        Belum ada bahan yang dibeli selama 90.
    </div>
<?php
}
?>
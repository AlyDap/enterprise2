<?php

if (!empty($cekPenjualan7Hari)) {
    foreach ($grafikpembelian7hariA as $key => $value) {
        $infoA[] = $value['haritanggal'];
        $hasilA[] = $value['jumlah'];
    }
    foreach ($grafikpembelian7hariB as $key => $value) {
        $infoB[] = $value['haritanggal'];
        $hasilB[] = $value['total'];
    }
    foreach ($grafikpembelian7hariC as $key => $value) {
        $infoC[] = $value['nama'];
        $hasilC[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-7hari-pembelian-A"></canvas>
            <div class="ykiri">
                <h6>Total Bahan Dibeli <?= number_format($QtyPembelian7hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
            </div>
        </div>
        <div class="kanan">
            <canvas id="myChart-7hari-pembelian-B"></canvas>
            <div class="ykanan">
                <h6>Total Pengeluaran Pembelian Rp <?= number_format($RpPembelian7hari->total, 0, ',', '.'); ?></h6>
            </div>
        </div>
        <div class="tengah">
            <canvas id="myChart-7hari-pembelian-C"></canvas>
        </div>
    </div>




    <script>
        const ctxa7hariPembelianA = document.getElementById('myChart-7hari-pembelian-A');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariPembelianA, {
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
        const ctxa7hariPembelianB = document.getElementById('myChart-7hari-pembelian-B');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariPembelianB, {
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
        const ctxa7hariPembelianC = document.getElementById('myChart-7hari-pembelian-C');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hariPembelianC, {
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
        Belum ada bahan yang dibeli selama 1 pekan.
    </div>
<?php
}
?>
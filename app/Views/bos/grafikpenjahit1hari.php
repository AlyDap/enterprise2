<?php

if (!empty($grafikpenjahit1hari)) {
    foreach ($grafikpenjahit1hari as $key => $value) {
        $nama[] = $value['nama'];
        $jumlah[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-1hari-penjahit"></canvas>
            <div class="ykiri">
                <?php //foreach ($Qtytahunan as $QtyT) : 
                ?>
                <!-- <h6>Total Produk Terjual <?php //echo number_format($QtyT['jumlah'], 0, ',', '.');
                                                ?> Pcs</h6> -->
                <?php //endforeach; 
                ?>
            </div>
        </div>
    </div>

    <script>
        const ctxa1haripenjahit = document.getElementById('myChart-1hari-penjahit');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1haripenjahit, {
            type: 'polarArea',
            data: {
                labels: <?= json_encode($nama); ?>,
                datasets: [{
                    label: 'Jumlah Produk yang dijahit',
                    data: <?= json_encode($jumlah); ?>,
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
    $nama = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-info" role="alert">
        Belum ada transaksi dengan Penjahit Hari ini.
    </div>
<?php
}

?>
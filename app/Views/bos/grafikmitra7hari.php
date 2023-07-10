<?php

if (!empty($grafikmitra7hari)) {
    foreach ($grafikmitra7hari as $key => $value) {
        $nama[] = $value['nama'];
        $jumlah[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-7hari-mitra"></canvas>
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
        const ctxa7harimitra = document.getElementById('myChart-7hari-mitra');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7harimitra, {
            type: 'polarArea',
            data: {
                labels: <?= json_encode($nama); ?>,
                datasets: [{
                    label: 'Jumlah Bahan yang dibeli',
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
        Belum ada transaksi dengan Mitra Dalam 1 Pekan.
    </div>
<?php
}

?>
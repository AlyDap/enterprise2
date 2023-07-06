<?php

if (!empty($grafik1hari)) {
    foreach ($grafik1hari as $key => $value) {
        $jammenit[] = $value['jammenit'];
        $jumlah[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-1hari"></canvas>
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
        const ctxa1hari = document.getElementById('myChart-1hari');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa1hari, {
            type: 'bar',
            data: {
                labels: <?= json_encode($jammenit); ?>,
                datasets: [{
                    label: 'Produk Yang Terjual Hari Ini',
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
    $jammenit = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-info" role="alert">
        Belum ada produk terjual hari ini.
    </div>
<?php
}
?>
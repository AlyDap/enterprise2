<?php

if (!empty($grafik7hari)) {
    foreach ($grafik7hari as $key => $value) {
        $hari[] = $value['hari'];
        $jumlah[] = $value['jumlah'];
    }
?>
    <div class="kaki">
        <div class="kiri">
            <canvas id="myChart-7hari"></canvas>
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
        const ctxa7hari = document.getElementById('myChart-7hari');
        // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
        new Chart(ctxa7hari, {
            type: 'bar',
            data: {
                labels: <?= json_encode($hari); ?>,
                datasets: [{
                    label: 'Produk Yang Terjual Dalam 7 Hari',
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
    $hari = array('Data kosong');
    $jumlah = array(0);
}
?>
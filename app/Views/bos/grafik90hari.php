<?php

if (!empty($grafik90hari)) {
    foreach ($grafik90hari as $key => $value) {
        $bulanhari[] = $value['bulanhari'];
        $jumlah[] = $value['jumlah'];
    }
} else {
    $bulanhari = array('Data kosong');
    $jumlah = array(0);
}



?>



<div class="kaki">
    <div class="kiri">
        <canvas id="myChart-90hari"></canvas>
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
    const ctxa90hari = document.getElementById('myChart-90hari');
    // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
    new Chart(ctxa90hari, {
        type: 'bar',
        data: {
            labels: <?= json_encode($bulanhari); ?>,
            datasets: [{
                label: 'Produk Yang Terjual Selama 90 Hari',
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
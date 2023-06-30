<?php $no = 1; ?>
<?php if (!empty($datagrafik)) {
    foreach ($datagrafik as $key => $value) {
        $jammenit[] = $value['jammenit'];
        $jumlah[] = $value['jumlah'];
        $no++;
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
        // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
        $(document).ready(function() {
            const ctx1 = document.getElementById('myChart-1hari');
            // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($jammenit); ?>,
                    datasets: [{
                        label: 'Produk Yang Terjual',
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
        });
    </script>


<?php
} else {
    $jammenit = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-info" role="alert">
        Tidak ada produk yang terjual
    </div>
<?php
} ?>
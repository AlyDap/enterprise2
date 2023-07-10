<style>
    .h6-keterangan {
        text-align: center;
    }
</style>
<?php if (!empty($cekpenjualanperwaktu)) {
    foreach ($datagrafik as $key => $value) {
        $nama[] = $value['nama'];
        $jumlah[] = $value['jumlah'];
    }
    $stringsToReplace  = array(
        'January'   => 'Januari',
        'February'  => 'Februari',
        'March'     => 'Maret',
        'April'     => 'April',
        'May'       => 'Mei',
        'June'      => 'Juni',
        'July'      => 'Juli',
        'August'    => 'Agustus',
        'September' => 'September',
        'October'   => 'Oktober',
        'November'  => 'November',
        'December'  => 'Desember',
        'Sunday'    => 'Minggu',
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu'
    );
    $cekpenjualanperwaktu->waktu = str_replace(array_keys($stringsToReplace), array_values($stringsToReplace), $cekpenjualanperwaktu->waktu);
?>
    <h4 class="h6-keterangan">Grafik Penjahit pada <?= $cekpenjualanperwaktu->waktu; ?></h4>
    <canvas id="myChart-1hari"></canvas>


    <script>
        // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
        $(document).ready(function() {
            const ctx1 = document.getElementById('myChart-1hari');
            // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
            new Chart(ctx1, {
                type: 'doughnut',
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
        });
    </script>


<?php
} else {
    $nama = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-dark" role="alert" style="text-align: center;">
        Tidak ada Transaksi dengan Penjahit<br> Silahkan Pilih <?= $info; ?> yang memiliki transaksi untuk melihat grafik <br>&#128522; -- Terimakasih -- &#128522;
    </div>
<?php
} ?>
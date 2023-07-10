<style>
    .h6-keterangan {
        text-align: center;
    }

    .float-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
        display: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #fff;
        color: #000;
        font-size: 24px;
        text-align: center;
        line-height: 20px;
        cursor: pointer;
        border: #595e60 solid 1px;
    }

    .float-button.show {
        display: block;
    }
</style>
<?php if (!empty($cekpenjualanperwaktu)) {
    foreach ($datagrafik as $key => $value) {
        $waktu[] = $value['waktu'];
        $jumlah[] = $value['jumlah'];
    }
    foreach ($datagrafik2 as $key => $value) {
        $waktu1[] = $value['waktu'];
        $jumlah1[] = $value['jumlah'];
    }
    foreach ($datagrafik3 as $key => $value) {
        $nama[] = $value['nama'];
        $jumlah11[] = $value['jumlah'];
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
    <h4 class="h6-keterangan">Grafik Penjualan pada <?= $cekpenjualanperwaktu->waktu; ?></h4>
    <canvas id="myChart-1hari"></canvas>
    <h6 class="h6-keterangan">
        Total Produk Terjual <?php echo number_format($totalproduk->jumlah, 0, ',', '.'); ?> Pcs
    </h6>

    <div class="ccc2"></div>

    <canvas id="myChart-1harii"></canvas>

    <h6 class="h6-keterangan">Total Pendapatan Rp
        <?php echo number_format($totalpendapatan->jumlah, 0, ',', '.'); ?>
    </h6>

    <div class="ccc2"></div>
    <h6 class="h6-keterangan">Nama Produk yang laku terjual
    </h6>
    <canvas id="myChart-1hariii"></canvas>
    <button onclick="scrollToTop()" class="float-button">&#8593;</button>


    <script>
        // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
        $(document).ready(function() {
            const ctx1 = document.getElementById('myChart-1hari');
            const ctx11 = document.getElementById('myChart-1harii');
            const ctx111 = document.getElementById('myChart-1hariii');
            // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($waktu); ?>,
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
            new Chart(ctx11, {
                type: 'line',
                data: {
                    labels: <?= json_encode($waktu1); ?>,
                    datasets: [{
                        label: 'Pendapatan Yang diperoleh',
                        data: <?= json_encode($jumlah1); ?>,
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
            new Chart(ctx111, {
                type: 'polarArea',
                data: {
                    labels: <?= json_encode($nama); ?>,
                    datasets: [{
                        label: 'Produk Yang Terjual',
                        data: <?= json_encode($jumlah11); ?>,
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
    $waktu = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-dark" role="alert" style="text-align: center;">
        Tidak ada Transaksi Penjualan<br> Silahkan Pilih <?= $info; ?> yang memiliki transaksi untuk melihat grafik <br>&#128522; -- Terimakasih -- &#128522;
    </div>
<?php
} ?>
<script>
    // fungsi scroll ke atas
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.querySelector('.float-button').classList.add('show');
        } else {
            document.querySelector('.float-button').classList.remove('show');
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
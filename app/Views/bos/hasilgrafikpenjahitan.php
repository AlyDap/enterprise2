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
<?php if (!empty($cekpenjahitanperwaktu)) {
    foreach ($datagrafik as $key => $value) {
        $waktu[] = $value['waktu'];
        $jumlah[] = $value['jumlah'];
    }
    foreach ($datagrafik2 as $key => $value) {
        $waktu2[] = $value['waktu'];
        $jumlah2[] = $value['jumlah'];
    }
    foreach ($datagrafik3 as $key => $value) {
        $waktu3[] = $value['waktu'];
        $jumlah3[] = $value['total'];
    }
    foreach ($datagrafik4 as $key => $value) {
        $nama4[] = $value['nama'];
        $jumlah4[] = $value['jumlah'];
    }
    foreach ($datagrafik5 as $key => $value) {
        $nama5[] = $value['nama'];
        $jumlah5[] = $value['jumlah'];
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
    $cekpenjahitanperwaktu->waktu = str_replace(array_keys($stringsToReplace), array_values($stringsToReplace), $cekpenjahitanperwaktu->waktu);
?>
    <h4 class="h6-keterangan">Grafik Produksi pada <?= $cekpenjahitanperwaktu->waktu; ?></h4>

    <canvas id="myChart-1hari1"></canvas>
    <h6 class="h6-keterangan">
        Total Produk Diproduksi <?php echo number_format($totalproduk->jumlah, 0, ',', '.'); ?> Pcs
    </h6>
    <canvas id="myChart-1hari2"></canvas>
    <h6 class="h6-keterangan">
        Total Bahan Digunakan <?php echo number_format($totalbahan->jumlah, 0, ',', '.'); ?> Pcs
    </h6>

    <div class="ccc2"></div>
    <canvas id="myChart-1hari3"></canvas>
    <h6 class="h6-keterangan">Total Pengeluaran Produksi Rp
        <?php echo number_format($totalpendapatan->total, 0, ',', '.'); ?>
    </h6>

    <div class="ccc2"></div>
    <h6 class="h6-keterangan">Nama Produk yang diproduksi
    </h6>
    <canvas id="myChart-1hari4"></canvas>
    <div class="ccc2"></div>
    <h6 class="h6-keterangan">Nama Bahan yang digunakan
    </h6>
    <canvas id="myChart-1hari5"></canvas>
    <button onclick="scrollToTop()" class="float-button">&#8593;</button>


    <script>
        // $(document).ready(function() Untuk Refresh code script grafik setiap kali klik lihat
        $(document).ready(function() {
            const ctx1 = document.getElementById('myChart-1hari1');
            const ctx2 = document.getElementById('myChart-1hari2');
            const ctx3 = document.getElementById('myChart-1hari3');
            const ctx4 = document.getElementById('myChart-1hari4');
            const ctx5 = document.getElementById('myChart-1hari5');
            // type: pie, bar, line, bubble, doughnut, polarArea, radar, scatter
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($waktu); ?>,
                    datasets: [{
                        label: 'Produk Yang Diproduksi',
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
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($waktu2); ?>,
                    datasets: [{
                        label: 'Bahan Yang Digunakan',
                        data: <?= json_encode($jumlah2); ?>,
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
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: <?= json_encode($waktu3); ?>,
                    datasets: [{
                        label: 'Pengeluaran Pembelian',
                        data: <?= json_encode($jumlah3); ?>,
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
            new Chart(ctx4, {
                type: 'polarArea',
                data: {
                    labels: <?= json_encode($nama4); ?>,
                    datasets: [{
                        label: 'Produk Yang Diproduksi',
                        data: <?= json_encode($jumlah4); ?>,
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
            new Chart(ctx5, {
                type: 'polarArea',
                data: {
                    labels: <?= json_encode($nama5); ?>,
                    datasets: [{
                        label: 'Bahan Yang Digunakan',
                        data: <?= json_encode($jumlah5); ?>,
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
        Tidak ada Transaksi Produksi<br> Silahkan Pilih <?= $info; ?> yang memiliki transaksi untuk melihat grafik <br>&#128522; -- Terimakasih -- &#128522;
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
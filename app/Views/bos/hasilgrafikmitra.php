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
    <h4 class="h6-keterangan">Grafik Mitra pada <?= $cekpenjualanperwaktu->waktu; ?></h4>
    <canvas id="myChart-1hari"></canvas>
    <button onclick="scrollToTop()" class="float-button">&#8593;</button>



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
        });
    </script>


<?php
} else {
    $nama = array('Data kosong');
    $jumlah = array(0);
?>
    <div class="alert alert-dark" role="alert" style="text-align: center;">
        Tidak ada Transaksi dengan Mitra<br> Silahkan Pilih <?= $info; ?> yang memiliki transaksi untuk melihat grafik <br>&#128522; -- Terimakasih -- &#128522;
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
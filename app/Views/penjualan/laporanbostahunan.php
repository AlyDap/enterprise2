<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<script src="https://unpkg.com/@develoka/angka-terbilang-js/index.min.js"> </script>

<div class="row">
    <div class="col">
        <div class="card border-primary">
            <table>
                <tr>
                    <td colspan="2">
                        <article class=""> <b>BATIK M SARI</b></article>
                        <article class="">Jl. Raya Jenggot No 67</article>
                        <article class="">Telp. 086498755521</article>
                    </td>
                    <td class="text-center">
                        <article class="text-white"> -</article>
                        <article class="fs-5 p-2 "><b>LAPORAN PENJUALAN <?= $thn ?></b></article>
                        <article class="fs-6 "><b><?= $thn ?></b></article>
                    </td>
                    <td>
                        <article>Tahun</article>
                    </td>
                    <td>
                        <article>: <?= $thn ?></article>
                    </td>
                </tr>
            </table>
            <style>
                .hh {
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
            <div class="hh">

                <table class="table">

                    <script>
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url('penjualan/viewlaporantahunan') ?>",
                            data: {
                                thn: '<?= $thn ?>',
                            },
                            dataType: "JSON",
                            success: function(response) {
                                if (response.data) {
                                    $('.table').html(response.data);
                                    console.log(response);
                                }
                            }
                        })
                    </script>

                </table>
            </div>
            <table>

                <tr class="text-center">
                    <td colspan="2">
                        <article>Dibuat Oleh,</article>
                        <article class="text-white">-</article>
                        <article class="text-white">-</article>
                        <article class="text-white">-</article>
                        <article>Iyan</article>
                        <article>PENJUALAN</article>
                    </td>
                    <td></td>
                    <td colspan="2">
                        <article>Penerima</article>
                        <article class="text-white">-</article>
                        <article class="text-white">-</article>
                        <article class="text-white">-</article>
                        <article>Ali</article>
                        <article>BOS</article>
                        </article>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<a href="<?= base_url('dashboard') ?>" class="btn btn-primary">Kembali</a>

<?= $this->endSection() ?>
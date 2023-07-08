<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
    .con {
        display: contents;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .top {
        width: 100%;
    }

    .ssss {
        border: 2px solid #002320;
        border-radius: 10px;
        padding: 7px;
    }

    .isi {
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
        justify-content: center;
        align-items: center;
        text-align: center;
        row-gap: 13px;
        column-gap: 13px;
    }

    .kolom {
        text-align: end;
    }

    .kol {
        text-align: start;
    }

    .kanan {
        text-align: end;
        margin-top: 13px;
    }


    @media(max-width:500px) {

        .isi {
            grid-template-columns: auto;
            row-gap: 0;
            column-gap: 0;
        }

        .kolom,
        .kol {
            text-align: center;
        }

        .kolom {
            /* margin-top: 7px; */
            margin-bottom: 3px;
        }

        .kol {
            top: 0;
            margin-bottom: 15px;

        }

        .hhh {
            margin: 0;
        }
    }
</style>
<!-- 21.230.0079 -->
<div class="con">
    <div class="top">
    </div>
    <div class="ssss">
        <h5 style="margin-top: 5px;">Detail Produk <?= $produk['nama']; ?> </h5>

        <hr style="margin-top: 11.5px;">
        <div class="isi">
            <div class="kolom"><strong>Ukuran</strong> produk </div>
            <div class="kol">
                <strong><?= $produk['ukuran']; ?></strong>
            </div>
            <div class="kolom"><strong>Jumlah</strong> produk </div>
            <div class="kol">
                <strong><?= $produk['jumlah']; ?></strong>
            </div>
            <div class="kolom"><strong>Harga </strong> produk </div>
            <div class="kol">
                <strong>Rp <?= number_format($produk['biaya_jual'], 0, ',', '.'); ?></strong>
            </div>
            <div class="kolom"> <strong>Biaya pembuatan</strong> produk </div>
            <div class="kol">
                <strong>Rp <?= number_format($produk['biaya_produksi'], 0, ',', '.'); ?></strong>
            </div>
            <div class="kolom"> <strong>Jumlah Produksi</strong> Per Kain </div>
            <div class="kol">
                <strong><?= $produk['jumlah_produksi_perkain']; ?> Pics</strong>
            </div>
            <div class="kolom"> <strong>Panjang Kain</strong> Per Produksi </div>
            <div class="kol">
                <strong><?= $produk['panjang_kain_perproduksi']; ?> </strong>
            </div>
            <div class="kolom"><strong>Status</strong> Produk </div>
            <div class="kol">
                <strong> <?= $produk['status']; ?></strong>
            </div>
        </div>
        <hr class="hhh" style="margin-top: -3px; border: none; border-top: 1px solid rgba(0, 0, 0, 0.0);
  background-color: rgba(0, 0, 0, 0.0);">
    </div>
    <div class="kanan">
        <a class=" btn btn-sm btn-outline-secondary" href="<?= base_url('bos/produk'); ?>">Kembali</a>
    </div>
</div>
<?= $this->endSection(); ?>
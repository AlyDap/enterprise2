<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<style>
    .page-link {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #212529 !important;
        background-color: #e2e3e5 !important;
        border: 1px solid #a4a4a4 !important;
    }

    .page-link:hover {
        z-index: 2;
        color: #fff !important;
        text-decoration: none;
        background-color: #a4a4a4 !important;
        border-color: #dee2e6;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #a4a4a4 !important;
        border-color: #a4a4a4;
    }

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<?php
if (!empty(session()->getFlashdata('success'))) { ?>
    <div class="alert alert-dark" style="text-align: center;">
        <?php echo session()->getFlashdata('success'); ?>
    </div>
<?php } ?>

<?php if (!empty(session()->getFlashdata('info'))) { ?>
    <div class="alert alert-secondary" style="text-align: center;">
        <?php echo session()->getFlashdata('info'); ?>
    </div>
<?php } ?>

<h1 style="text-align: center;">Produk Batik M Sari</h1>
<hr>

<form action="<?= base_url('produk'); ?>" method="get">
    <div class="mb-3">
        <a role="button" class="btn btn-outline-dark" href="<?= base_url('produk/createproduk'); ?>" style="margin-top: 15px; float: right;">Tambah Produk</a>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label class="col-form-label">Cari Produk</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Masukan nama produk..." value="<?= $keyword; ?>">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                    <em>press Enter</em>
                </span>
            </div>
        </div>
    </div>
</form>
<table class="table table-secondary table-striped-columns" style="border-collapse:collapse ;border-radius: 10px;overflow: hidden;">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" style="padding: 15px;">No</th>
            <th scope="col" style="padding: 15px;">Nama</th>
            <th scope="col" style="padding: 15px;">Qty</th>
            <th scope="col" style="padding: 15px;">Harga</th>
            <th scope="col" style="padding: 15px;">Status</th>
            <th scope="col" style="padding: 15px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
        <?php foreach ($produk as  $row) { ?>
            <tr style="text-align: center; vertical-align: middle;">
                <th scope="row"><?= $i++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td>Rp<?= $row['biaya_jual']; ?>,00</td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a class="btn btn-sm btn-outline-secondary" id="btnDetail">Detail</a>
                    <a href="<?= base_url('produk/editproduk/' . $row['id_produk']); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php //var_dump($pager); 
    ?>
    <?php echo $pager->links('produk', 'bos_pagination');
    ?>
</div>
<div class="card" id="produkDetail" style="display: none;">
    <h5 class="card-header" style="margin-top: 5px;">Detail Produk Daster Rayon <div class="kanan" style="text-align: end; margin-top: -29px;"><a class="btn btn-sm btn-outline-secondary" id="btnClose">Tutup</a></div>
    </h5>
    <div class="card-body">
        <p class="card-text">Ukuran produk <strong>XL</strong> </p>
        <p class="card-text">Jumlah produk <strong>10</strong></p>
        <p class="card-text"><strong>Harga </strong> produk <strong>Rp50.000,00</strong> </p>
        <p class="card-text"> <strong>Biaya pembuatan</strong> produk <strong>Rp25.000,00</strong></p>
        <p class="card-text">Status Produk<strong> Aktif</strong> </p>

    </div>
</div>
<script>
    const btnDetail = document.querySelector('#btnDetail');
    const btnClose = document.querySelector('#btnClose');
    const produkDetail = document.querySelector('#produkDetail');
    btnDetail.addEventListener('click', function() {
        produkDetail.style.display = 'block';
    })
    btnClose.addEventListener('click', function() {
        produkDetail.style.display = 'none';
    })
</script>
<?= $this->endSection(); ?>
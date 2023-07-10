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
    <div class="alert alert-dark alert-dismissible fade show" role="alert" style="text-align: center;">
        <strong><?php echo session()->getFlashdata('success'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<?php if (!empty(session()->getFlashdata('info'))) { ?>
    <div class="alert alert-dark alert-dismissible fade show" role="alert" style="text-align: center;">
        <strong><?php echo session()->getFlashdata('info'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<h1 style="text-align: center;">Penjahit Batik</h1>
<hr>

<form action="<?= base_url('penjahit'); ?>" method="get">
    <div class="mb-3">
        <a role="button" class="btn btn-outline-dark" href="<?= base_url('penjahit/createpenjahit'); ?>" style="margin-top: 15px; float: right;">Tambah Penjahit</a>
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label class="col-form-label">Cari Penjahit</label>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Masukan nama penjahit..." value="<?= $keyword; ?>">
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
            <th scope="col" style="padding: 15px;">Alamat</th>
            <th scope="col" style="padding: 15px;">No Hp</th>
            <th scope="col" style="padding: 15px;">Status</th>
            <th scope="col" style="padding: 15px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
        <?php foreach ($penjahit as  $row) { ?>
            <tr style="text-align: center; vertical-align: middle;">
                <th scope="row"><?= $i++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['status']; ?></td>
                <td>
                    <a href="<?= base_url('penjahit/editpenjahit/' . $row['id_penjahit']); ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php //var_dump($pager); 
    ?>
    <?php echo $pager->links('penjahit', 'bos_pagination');
    ?>
</div>
<?= $this->endSection(); ?>
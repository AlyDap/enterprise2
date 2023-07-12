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

<h1 style="text-align: center;">Mitra Kain Batik</h1>
<hr>

<table class="table table-secondary table-striped-columns" style="border-collapse:collapse ;border-radius: 10px;overflow: hidden;">
    <thead>
        <tr style="text-align: center;">
            <th scope="col" style="padding: 15px;">No</th>
            <th scope="col" style="padding: 15px;">Nama</th>
            <th scope="col" style="padding: 15px;">Alamat</th>
            <th scope="col" style="padding: 15px;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($mitra as  $row) { ?>
            <tr style="text-align: center; vertical-align: middle;">
                <th scope="row"><?= $i++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php //var_dump($pager); 
    ?>

</div>
<?= $this->endSection(); ?>
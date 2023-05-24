<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="col-sm-8">
    <h1 class="mt-2">Detail Pembelian</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">no_pembelian</th>
                <th scope="col">id_bahan</th>
                <th scope="col">harga</th>
                <th scope="col">jumlah</th>
                <th scope="col">total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($details as $user) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $user['no_pembelian']; ?></td>
                    <td><?= $user['id_bahan']; ?></td>
                    <td><?= "Rp " . number_format($user['harga'], 0, ',', '.');  ?></td>
                    <td><?= $user['jumlah']; ?></td>
                    <td><?= "Rp " . number_format($user['total'], 0, ',', '.');  ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a role="button" class="btn btn-outline-dark" href="<?= base_url('gudang/tampil'); ?>">Kembali</a>

    <?= $this->endSection(); ?>
<table class="table table-bordered table-striped">
    <tr class="text-center">
        <th>no</th>
        <th>id produk</th>
        <th>nama produk</th>
        <th>harga produksi</th>
        <th>harga jual</th>
        <th>qty</th>
        <th>total harga</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($dataharian as $key => $value) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['id_produk'] ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['biaya_produksi'] ?></td>
            <td><?= $value['biaya_jual'] ?></td>
            <td><?= $value['qty'] ?></td>
            <td><?= $value['totalharga'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
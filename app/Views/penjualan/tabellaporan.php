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
            <td class="text-right"><?= $value['biaya_produksi'] ?></td>
            <td class="text-right"><?= $value['biaya_jual'] ?></td>
            <td><?= $value['qty'] ?></td>
            <td class="text-right"><?= $value['totalharga'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td class="text-center bg-grey" colspan="6">
            <h5>Grand Total</h5>
        </td>
        <td class="text-right">
            <?php foreach ($gt as $key => $value) : ?>
                <?= $value['totalharga'] ?>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
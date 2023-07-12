<table class="table table-bordered table-striped">
    <tr class="text-center">
        <th>no</th>
        <th>id bahan</th>
        <th>nama bahan</th>
        <th>harga bahan</th>
        <th>qty</th>
        <th>total harga</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($dataharian as $key => $value) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['id_bahan'] ?></td>
            <td><?= $value['nama'] ?></td>
            <td class="text-right"><?= $value['harga'] ?></td>
            <td><?= $value['qty'] ?></td>
            <td class="text-right"><?= $value['totalharga'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td class="text-center bg-grey" colspan="5">
            <h5>Grand Total</h5>
        </td>
        <td class="text-right">
            <?php foreach ($gt as $key => $value) : ?>
                <?= $value['totalharga'] ?>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
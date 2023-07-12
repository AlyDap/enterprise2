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
            <td class="text-center"><?= $value['id_bahan'] ?></td>
            <td class="text-center"><?= $value['nama'] ?></td>
            <td class="text-center"><?= $value['harga'] ?></td>
            <td class="text-center"><?= $value['qty'] ?></td>
            <td class="text-center"><?= $value['totalharga'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td class="text-center bg-grey" colspan="5">
            <h5>Grand Total</h5>
        </td>
        <td class="text-center">
            <?php foreach ($gt as $key => $value) : ?>
                <?= $value['totalharga'] ?>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
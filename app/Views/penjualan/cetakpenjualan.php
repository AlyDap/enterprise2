<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>A4</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4" onload="print()">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <!-- Write HTML just like a web page -->
        <center>
            <h1>Laporan penjualan</h1>
        </center>
        <table border="" align="center">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">id_penjualan</th>
                <th scope="col">tgl</th>
                <th scope="col">total_bayar</th>
                <th scope="col">id_user</th>
            </tr>
            <?php $no = 1; ?>
            <?php $totalpemasukan = 0; ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $user['id_penjualan']; ?></td>
                    <td><?= $user['tgl']; ?></td>
                    <td><?= "Rp " . number_format($user['total_bayar'], 0, ',', '.');  ?></td>
                    <td><?= $user['id_user']; ?></td>
                </tr>
                <?php $totalpemasukan += $user['total_bayar'] ?>
            <?php endforeach; ?>
        </table>
        <div class="total ">
            <table align="center">
                <tr>
                    <td>total pemasukan</td>
                    <td> : </td>
                    <td><?= "Rp " . number_format($totalpemasukan, 0, ',', '.');  ?></td>
                </tr>
            </table>
        </div>

    </section>

</body>

</html>
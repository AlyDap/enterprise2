<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Harian</title>
    <style>
        /* Gaya CSS untuk laporan */
        /* Sesuaikan dengan kebutuhan Anda */
    </style>
</head>

<body>
    <h1>Laporan Harian</h1>
    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Biaya Produksi</th>
                <th>Biaya Jual</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataharian as $row)
            <tr>
                <td>{{ $row['id_produk'] }}</td>
                <td>{{ $row['tgl'] }}</td>
                <td>{{ $row['nama'] }}</td>
                <td>{{ $row['biaya_produksi'] }}</td>
                <td>{{ $row['biaya_jual'] }}</td>
                <td>{{ $row['qty'] }}</td>
                <td>{{ $row['totalharga'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h3>Grand Total Penjualan: {{ $gt }}</h3>
    </div>
</body>

</html>
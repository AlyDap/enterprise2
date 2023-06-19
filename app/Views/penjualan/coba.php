<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Transaksi</title>
</head>

<body>
    <h1>Tambah Transaksi</h1>
    <form id="transaksiForm" method="post" action="<?= base_url('transaksi/simpan') ?>">
        <table>
            <tr>
                <th>Id Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
            <tbody id="produk-container">
                <tr>
                    <td>
                        <input type="number" name="id_produk[]" required>
                    </td>
                    <td>
                        <input type="number" name="harga[]" required>
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" required>
                    </td>
                    <td>
                        <input type="number" name="total[]" required>
                    </td>
                    <td>
                        <button type="button" onclick="tambahProduk()">Tambah</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit">Simpan</button>
        <button type="button" onclick="batalkanTransaksi()">Batal</button>
    </form>

    <script>
        function tambahProduk() {
            var produkContainer = document.getElementById('produk-container');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                    <td>
                        <input type="number" name="id_produk[]" required>
                    </td>
                    <td>
                        <input type="number" name="harga[]" required>
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" required>
                    </td>
                    <td>
                        <input type="number" name="total[]" required>
                    </td>
                <td>
                    <button type="button" onclick="hapusProduk(this)">Hapus</button>
                </td>
            `;
            produkContainer.appendChild(newRow);
        }

        function hapusProduk(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function batalkanTransaksi() {
            var form = document.getElementById('transaksiForm');
            form.reset();

            // Hapus form yang terbentuk setelah elemen pertama
            var produkContainer = document.getElementById('produk-container');
            while (produkContainer.children.length > 1) {
                produkContainer.removeChild(produkContainer.lastChild);
            }

            // Clear nilai input pada elemen type="number"
            var inputNumbers = document.querySelectorAll('input[type="number"]');
            inputNumbers.forEach(function(input) {
                input.value = '';
            });

            // Lakukan tindakan lain yang diperlukan saat transaksi dibatalkan
            alert("Transaksi dibatalkan.");
        }
    </script>
</body>

</html>
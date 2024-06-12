<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Semua Invoice</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Daftar Semua Invoice</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Invoice</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Kurir</th>
                    <th>Tanggal Pemesanan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                    <tr>
                        <td><?= $invoice['id'] ?></td>
                        <td><?= $invoice['nama'] ?></td>
                        <td><?= $invoice['alamat'] ?></td>
                        <td><?= $invoice['kurir'] ?></td>
                        <td><?= $invoice['tgl_pesan'] ?></td>
                    </tr>                    
                <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Invoice</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pesanan as $pesan): ?>
                    <tr>
                        <td><?= $pesan['id_invoice'] ?></td>
                        <td><?= $pesan['id_brg'] ?></td>
                        <td><?= $pesan['nama_brg'] ?></td>
                        <td><?= $pesan['jumlah'] ?></td>
                        <td><?= $pesan['harga'] ?></td>
                    </tr>                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
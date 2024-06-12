<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid align-center">
        <div class="d-flex justify-content-center mb-4 align-center">
            <img src="<?= base_url('assets/img/logokita.png') ?>" alt="Logo" width="150">
        </div>
        <h4 class="text-center">Detail Pesanan</h4>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>No. Invoice</td>
                <td>: <?= $invoice->id ?></td>
            </tr>
            <tr>
                <td>Nama Penerima</td>
                <td>: <?= $invoice->nama ?></td>
            </tr>
            <tr>
                <td>Alamat Tujuan</td>
                <td>: <?= $invoice->alamat ?></td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>: <?= $invoice->tgl_pesan ?></td>
            </tr>
            <tr>
                <td>Jasa Pengiriman</td>
                <td>: <?= $invoice->kurir ?></td>
            </tr>
        </table>
        <hr>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-right">Harga Satuan</th>
                    <th class="text-right">Sub-Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomer = 1;
                $total = 0;
                foreach ($pesanan as $psn) :
                    $subtotal = $psn->jumlah * $psn->harga;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= $nomer++; ?></td>
                        <td><?= $psn->nama_brg ?></td>
                        <td class="text-center"><?= $psn->jumlah ?></td>
                        <td class="text-right">Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                        <td class="text-right">Rp. <?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right font-weight-bold">Total Belanja</td>
                    <td class="text-right font-weight-bold">Rp. <?= number_format($total, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
</body>
</html>

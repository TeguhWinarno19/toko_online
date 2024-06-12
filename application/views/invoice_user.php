<div class="container-fluid">
    <style>
        .status-paid {
            color: green;
        }
        .status-not-paid {
            color: red;
        }
    </style>
    <h4>Invoice Pemesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Status</th>
            <th colspan="3">Aksi</th>
        </tr>
        
        <?php foreach ($invoice as $inv): ?>
        <tr>
            <td><?php echo $inv->id ?></td>
            <td><?php echo $inv->nama ?></td>
            <td><?php echo $inv->alamat ?></td>
            <td><?php echo $inv->tgl_pesan ?></td>
            <td><?php echo $inv->batas_bayar ?></td>
            <td>
                <?php if($inv->status != 0)
                {echo "<span class='status-paid'>Paid</span>";}else{echo "<span class='status-not-paid'>not paid</span>";} ?>
            </td>
            <td>
                <?php echo anchor('dashboard/detail_invoice/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?>
            </td>
            <td>
                <?= anchor('user/panduan_pembayaran/'.$inv->id, '<div class="btn btn-sm btn-success">Bayar</div>') ?>
            </td>
            <td> <?php if($inv->status == 1) {?>
                <?php echo anchor('user/cetak_pdf_user/'.$inv->id, '<div class="btn btn-sm btn-warning">cetak</div>');} ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

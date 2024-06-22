<div class="container-fluid">
    <style>
        .status-paid {
            color: green;
        }
        .status-not-paid {
            color: red;
        }
    </style>
    <h4>INVOICE TRANSAKSI</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Email Pembeli</th>
            <th>Pembayaran</th>
            <th colspan="3">Aksi</th>

        </tr>
        <?php if (!empty($invoice)) { ?> 
        <?php
        $no = 1;
        foreach ($invoice as $inv): ?>
        <tr>
            <td><?php echo $no;$no++; ?></td>
            <td><?php echo $inv->nama ?></td>
            <td><?php echo $inv->alamat ?></td>
            <td><?php echo $inv->tgl_pesan ?></td>
            <td><?php echo $inv->batas_bayar ?></td>
            <td><?php echo $inv->email ?></td>
            <td>
                <?php if($inv->status != 0)
                {echo "<span class='status-paid'>Paid</span>";}else{echo "<span class='status-not-paid'>not paid</span>";} ?>
            </td>
            <td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            <td><?php if($inv->status == 0){
                echo anchor('admin/invoice/confirm/'.$inv->id, '<div class="btn btn-sm btn-success">Confirm</div>');
            }else{
                echo '<div class="btn btn-sm btn-secondary">Confirm</div>';
            }
            ?></td>
            <td><?php if($inv->status == 1){
                echo anchor('admin/invoice/cetak_pdf_user/'.$inv->id, '<div class="btn btn-sm btn-warning">Cetak</div>');
            } ?></td>
        </tr>
        <?php endforeach; ?>
        <?php } ?>
    </table>
</div>
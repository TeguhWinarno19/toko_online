<div class="container-fluid">
    <h4>Keranjang belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>
        <?php
        $no=1;
        foreach ($this->cart->contents() as $items) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $items['name'] ?></td>
            <td><?php echo $items['qty'] ?></td>
            <td align="right">Rp. <?php echo number_format( $items['price'],0,',','.') ?></td>
            <td align="right">Rp. <?php echo number_format( $items['subtotal'],0,',','.') ?></td>
        </tr>
        
        <?php endforeach; ?>
        <tr>
            <td align='right' colspan="5">
                Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?>
            </td>
        </tr>

    </table>
    <div align="right">
        <?php
        $barangkeranjang = $this->cart->total_items();
        if ($barangkeranjang > 0) 
        {
            echo '<a href="'.  base_url('dashboard/hapus_keranjang').'"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>';
        }
        ?>
        <a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
        <?php
        
        if ($barangkeranjang > 0) 
        {
            echo '<a href="' . base_url('dashboard/pembayaran') . '"><div class="btn btn-sm btn-success">Pembayaran</div></a>';
        }
        ?>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-success">
                <?php
                $grand_total = 0;
                if($keranjang = $this->cart->contents())
                {
                    foreach($keranjang as $item)
                    {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda : Rp.".number_format($grand_total,0,',','.');
                ?>
            </div>
            <br>
            <br>
            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form method="post" action="<?php echo base_url().'dashboard/pembayaran'?>">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap anda" class="form-control" value="<?= $user['name'] ?>">
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <input type="text" name="alamat" id="alamat"  placeholder="Alamat Lengkap anda" class="form-control">
                <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="No. Telepon anda" class="form-control">
                <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="No. Telepon anda" class="form-control" value="<?= $user['email'] ?>" readonly>
                <input type="hidden" name="email" placeholder="No. Telepon anda" class="form-control" value="<?= $grand_total?>" readonly>
            </div>
            <div class="form-group">
                <label>Jasa Pengiriman</label>
                <select name="kurir" id="kurir" class="form-control">
                    <option value="JNE">JNE</option>
                    <option value="TIKI">TIKI</option>
                    <option value="POS INDONESIA">POS Indonesia</option>
                    <option value="GOJEK">GOJEK</option>
                    <option value="GRAB">GRAB</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pilih BANK</label>
                <select name="bank" id="bank" class="form-control">
                    <option value="BCA 12345678">BCA - 12345678</option>
                    <option value="BNI 87654321">BNI - 87654321</option>
                    <option value="BRI 11223344">BRI - 11223344</option>
                    <option value="MANDIRI 44332211">MANDIRI - 44332211</option>
                </select>
                <input type="hidden" name="total_belanja" placeholder="No. Telepon anda" class="form-control" value="<?= $grand_total?>" readonly>
            </div>
            <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
            <?php
                }
                else
                {
                    echo "<h4>Keranjang Belanja anda masih Kosong</h4>";
                }
            ?>
        </div>  
        <div class="col-md-2">
        </div>
    </div>
</div>
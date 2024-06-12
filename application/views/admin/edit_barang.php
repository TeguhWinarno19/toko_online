<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

    <?php foreach($barang as $brg) : ?>
        <form action="<?php echo base_url().'admin/data_barang/update' ?>" method="post">
       
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
        </div>

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
        </div>
        
        <div class="form-group">
            <label for="">Kategori</label>
            <input type="text" name="kategori" class="form-control"
             value="<?php echo $brg->kategori ?>">
        </div>
        
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
        </div>
        
        <div class="form-group">
            <label for="">Stok</label>
            <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
            <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>
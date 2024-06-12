<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA USER</h3>

    <?php foreach($barang as $brg) : ?>
        <form action="<?php echo base_url().'admin/data_user/update' ?>" method="post">
       
        <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="name" class="form-control" value="<?php echo $brg->name?>">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $brg->id ?>">
            <input type="text" name="email" class="form-control" value="<?php echo $brg->email ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>
<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA USER</h3>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th colspan="2">AKSI</th>
        </tr>
        <?php
        $no=1;
        foreach($barang as $brg) :?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $brg->name ?></td>
            <td><?php echo $brg->email ?></td>
            <td><?php echo anchor('admin/data_user/edit/' .$brg->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>' ) ?></td>
            <td><?php echo anchor('admin/data_user/hapus/' .$brg->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
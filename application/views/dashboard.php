<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/sliderA.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/sliderB.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/sliderC.png') ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/sliderD.png') ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row m-1 w-100">
        <?php if (!empty($barang)) { ?>
            <?php foreach ($barang as $brg) : ?>
                <div class="card m-1" style="width: 19%;">
                    <img src="<?php echo base_url('/uploads/'.$brg->gambar) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo htmlspecialchars($brg->nama_brg); ?></h5>
                        <small>
                            <?php 
                            $max_length = 30;
                            if(strlen($brg->keterangan) > $max_length) {
                                echo htmlspecialchars(substr($brg->keterangan, 0, $max_length) . '...');
                            } else {
                                echo htmlspecialchars($brg->keterangan);
                            }
                            ?>
                        </small><br>
                        <h6 class="card-subtitle mt-1 mb-1 text-success">Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?></h6>
                        <div class="d-grid gap-2 d-md-block">
                        <?php
                                if ($user['name'] == "") {
                                } else {
                                    echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_brg, '<div class="btn btn-warning mb-1">add to chart</div>');
                                }
                                ?>
                                <?php echo anchor('dashboard/detail/'.$brg->id_brg, '<div class="btn btn-success">Detail</div>'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <p style="font-style: italic; color: #888;">Maaf, tidak ada barang yang tersedia saat ini.</p>
        <?php } ?>
    </div>
</div>

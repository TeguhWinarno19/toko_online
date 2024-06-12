<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-birthday-cake"></i>
                </div>
                <div class="sidebar-brand-text mx-3">The Cake Lounge</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="
                <?php echo base_url('dashboard') ?>
                ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kategori
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="
                <?php echo base_url('kategori/cake') ?>
                
                ">
                    <i class="fa fa-birthday-cake"></i>
                    <span>Cake</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="
                <?= base_url('kategori/cookies') ?>
                ">
                    <i class="fas fa-cookie-bite"></i>
                    <span>Cookies</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="
                <?= base_url('kategori/candy') ?>
                ">
                    <i class="fas fa-candy-cane"></i>
                    <span>Candy</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="
                <?php echo base_url('kategori/accesories') ?>
                ">
                    <i class="fas fa-utensils"></i>
                    <span>Accesories</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="
                <?php echo base_url('kategori/hampers') ?>
                ">
                    <i class="fas fa-fw fa-gift"></i>
                    <span>Hampers</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                        method="post" action="<?php echo base_url().'dashboard/caribarang'?>">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <?php 
                        if($user['name'] == "")
                        {
                        ?>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item">
                                    <a class="btn btn-primary btn-user btn-block" href="<?= base_url('auth') ?>">Login</a>
                                </li>
                            </ul>
                        </div>

                        
                        <?php }

                        else 
                        { ?>
                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item">
                                    <?php
                                    $isi = $this->cart->total_items();
                                    $keranjang = '<i class="fas fa-2x fa-shopping-cart position-relative"><span class="badge badge-danger badge-counter position-absolute top-0 start-100 translate-right" style="top: -10px; right: -10px;">'.$isi.'</span></i>';
                                    ?>
                                    <?php echo anchor('dashboard/detail_keranjang', $keranjang, array('class' => 'nav-link')) ?>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/img/profile/') . $user['image']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('user/edit')?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('user/invoice')?>">
                                    <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Invoice Saya
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        <?php }
                        ?>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

     <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Logout to end this session</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
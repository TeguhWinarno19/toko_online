
 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <form action="<?= base_url('admin/admin_profile/changepassword') ?>" method="post">
                                <div class="form-group">
                                    <label for="current_password" class="col-sm-3 col-form-label">Curret Password</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="current_password" 
                                    name="current_password">
                                    <?= form_error('current_password','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="new_password1" 
                                        name="new_password1">
                                        <?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2" class="col-sm-3 col-form-label">Repeat Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="new_password2" 
                                        name="new_password2">
                                        <?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"> </div>
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Login 2024 </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>


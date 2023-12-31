                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar Aktivitas <?= $jenis ?></h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php 
                                        if($jenis=="Sepeda"){
                                            $title_jenis = "Nama Sepeda";
                                            $jen = 1;
                                        }
                                        else{
                                            $title_jenis = "No. Polisi";
                                            $jen = 2;
                                        }
                                        ?>
                                        <tr>
                                            <th>Tanggal</th>
                                            <!-- <th>Lokasi</th> -->
                                            <th><?= $title_jenis ?></th>
                                            <th>Nama Pengguna</th>
                                            <th>Ket</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                    foreach($view as $v) { 
                                        $tgl = date('d-m-Y', strtotime($v->checkin));
                                        $checkin = date('H:i', strtotime($v->checkin));

                                        $chekout_new = $v->checkout;
                                        if(empty($chekout_new) || $chekout_new==NULL || $chekout_new=0){
                                            $checkout = "Masih OTW";
                                        }
                                        else {
                                            $checkout = date('H:i', strtotime($v->checkout));
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $tgl ?></td>
                                            <!-- <td><?= $v->lokasi ?></td> -->
                                            <td><?= $v->identitas ?></td>
                                            <td><?= $v->nama_user ?></td>
                                            <td><span style="color: #1D6C2F"><b>↑</b> <?= $checkin ?></span><br><span
                                                    style="color: #5D0B0B"><b>↓</b> <?= $checkout ?></span></td>
                                            <td>
                                                <?php if(($v->status)==0) { ?>
                                                <form style="display:inline-block;"
                                                    onclick="return confirm('Apakah Anda yakin dengan pilihan Anda?');"
                                                    method="post" action="<?= base_url('petugas/finish') ?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <input type='hidden' name="jenis" value="<?= $v->jenis ?>">
                                                    <button type="Submit" data-toggle="tooltip" data-placement="bottom"
                                                        title="Finish" class="btn btn-success">
                                                        <i class="fas fa-fw fa-check"></i>
                                                    </button>
                                                </form>
                                                <?php }else { ?>
                                                    <button class="btn btn-secondary" data-toggle="tooltip"
                                                        data-placement="bottom" title="finish">
                                                        <i class="fa fa-check">
                                                        </i>
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin melakukan Log
                                    Out?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Pilih "Log Out" apabila Anda ingin mengakhiri sesi</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="<?= base_url('welcome/logout');?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span>
                        </div>
                    </div>
                </footer> -->

                <!-- Bootstrap core JavaScript-->
                <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
                <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

                <!-- Core plugin JavaScript-->
                <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

                <!-- Page level plugins -->
                <script src="<?= base_url('assets/main/vendor/datatables/jquery.dataTables.min.js');?>"></script>
                <script src="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

                <!-- Page level custom scripts -->
                <script src="<?= base_url('assets/main/js/demo/datatables-demo.js');?>"></script>

                </body>

                </html>
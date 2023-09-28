                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Daftar <?= $jenis ?></h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#tambah"><i
                                    class="fas fa-fw fa-plus"></i> Tambah</button>
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
                                            <th>Lokasi</th>
                                            <th><?= $title_jenis ?></th>
                                            <th>Last Update</th>
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
                                        $tgl = date('d-m-Y', strtotime($v->date));?>
                                        <tr>
                                            <td><b><?= $v->fakultas ?></b></td>
                                            <td><b><?= $v->identitas ?> </b></td>
                                            <td><b><?= $tgl ?> </b></td>
                                            <td>
                                                <!-- <form style="display:inline-block;" method="post"
                                                    action="<?= base_url('admin/edit_kendaraan') ?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <button type="Submit" data-toggle="tooltip" data-placement="bottom"
                                                        title="Edit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-edit"></i> </button>
                                                </form> -->
                                                <form style="display:inline-block;"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                                                    method="post" action="<?= base_url('petugas/hapus_kendaraan') ?>">
                                                    <input type='hidden' name="id" value="<?= $v->id ?>">
                                                    <input type='hidden' name="jenis" value="<?= $v->jenis ?>">
                                                    <button type="Submit" data-toggle="tooltip" data-placement="bottom"
                                                        title="Hapus" class="btn btn-danger">
                                                        <i class="fas fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
                                                <button
                                                    onclick='window.open("<?=base_url("common/download?qr=$v->qr")?>")'
                                                    class="btn btn-success" data-toggle="tooltip"
                                                    data-placement="bottom" title="Download">
                                                    <i class="fas fa-fw fa-qrcode"> </i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <?php if($jen==1){ ?>

                    <!-- Tambah Sepeda -->
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"
                                        style="color: black; font-weight:bold">Tambah Sepeda</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form role="form" method="post" action="<?= base_url('petugas/tambah_kendaraan');?>"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="jenis" value="1" />
                                        <label style="font-weight: bold; color:black">Nama Sepeda</label><label
                                            style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <textarea class="form-control" rows="2" name="nama" required=""></textarea><br>
                                        <label style="font-weight: bold; color:black">Lokasi</label><label
                                            style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <select class="form-control" name="fakultas" style="pointer-events: none;" required="">
                                            <option value="<?php echo $lokasi->id; ?>" selected="selected"><?php echo $lokasi->fakultas ?> </option>
                                        </select><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php } else{ ?>

                    <!-- Tambah Bus -->
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"
                                        style="color: black; font-weight:bold">Tambah Bus</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form role="form" method="post" action="<?= base_url('petugas/tambah_kendaraan');?>"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="fakultas" value="0" />
                                        <input type="hidden" name="jenis" value="2" />
                                        <label style="font-weight: bold; color:black">No. Polisi Bus</label><label
                                            style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <input class="form-control" name="nama" required=""><br>
                                        <!-- <label style="font-weight: bold; color:black">Lokasi</label><label
                                            style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <select class="form-control" name="fakultas" required="">
                                            <option value="">Please Select</option>
                                            <?php
                                        foreach ($lokasi as $l) {
                                            ?>
                                            <option value="<?php echo $l->id; ?>"><?php echo $l->fakultas ?> </option>
                                            <?php
                                        }
                                        ?>
                                        </select> -->
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

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
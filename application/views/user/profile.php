<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Profile</h1>
            <div class="row">

                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 1rem">
                    <div class="card border-left-warning shadow h-100 py-2 text-center">
                        <img src="<?= base_url('assets/profile.png');?>"
                            style="max-width: 100%; max-height: 100%; display: block; margin-left:0.5rem; margin-right:0.5rem;"
                            alt="Scan QR">
                        <div>
                            <button class="btn btn-primary" type="button" onclick='location.href="<?=base_url("welcome/changePass")?>"' style="margin-top:1rem"><i class="fas fa-fw fa-lock"></i> Ganti Password</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9" style="margin-bottom: 1rem">
                    <form role="form" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label style="font-weight: bold; color:black">NIM/NIP</label>
                            <input class="form-control" type="text" name="nim" value="<?=$profile->nim?>"
                                placeholder="NIM" readonly=""><br>
                            <label style="font-weight: bold; color:black">Username</label>
                            <input class="form-control" type="text" value="<?=$profile->id_user?>" name="username"
                                placeholder="Username" readonly=""><br>
                            <label style="font-weight: bold; color:black">Nama Lengkap</label>
                            <textarea rows="2" class="form-control" name="nama" placeholder="Nama Lengkap"
                                readonly=""><?=$profile->nama?></textarea><br>
                            <label style="font-weight: bold; color:black">Fakultas</label>
                            <input class="form-control" type="text" value="<?=$profile->fakultas?>" name="fakultas"
                                placeholder="fakultas" readonly=""><br>
                            <label style="font-weight: bold; color:black">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email"
                                value="<?=$profile->email?>" readonly=""><br>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
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
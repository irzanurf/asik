<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
            <div class="row">
                <?php if(!empty($aktivitas)) { ?>
                <div class="card-body col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:0rem">
                    <h6 class="mb-2 font-weight-bold text-info">On Progress</h6>
                </div>
                <?php } ?>
                <!-- /.row -->
                <?php for($i=0;$i<(count($aktivitas));$i++) {
                    if(($aktivitas[$i]->jenis)==1){
                        $icon = "bicycle";
                        $color = "success";
                        $jen = "1" ;
                    }
                    elseif(($aktivitas[$i]->jenis)==2){
                        $icon = "bus";
                        $color = "primary";
                        $jen = "2" ;
                    }
                    $tgl = date('d-m-Y', strtotime($aktivitas[$i]->checkin));
                    $checkin = date('H:i', strtotime($aktivitas[$i]->checkin));

                    $chekout_new = $aktivitas[$i]->checkout;
                    if(empty($chekout_new) || $chekout_new==NULL || $chekout_new=0){
                        $checkout = "Masih OTW";
                    }
                    else {
                        $checkout = date('H:i', strtotime($aktivitas[$i]->checkout));
                    }
                    ?>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 mb-4">
                    <div class="card border-left-<?=$color?> shadow h-100 py-2">
                        <a data-toggle="modal" data-target="#info<?=$aktivitas[$i]->id?>">
                            <div class="row no-gutters align-items-center" style="margin-left:0.5rem">
                                <div class="col-12 text-center">
                                    <div class="icon-circle bg-<?=$color?>" style="height: 2.5rem; width: 2.5rem">
                                        <i class="fas fa-<?=$icon?> text-white" style="font-size: 1.5rem"></i>
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top:6px">
                                    <i class="fas fa-fw fa-calendar" style="font-size:0.7rem; color:#1ba3b9"></i><span
                                        style="font-size:0.7rem; color:#1ba3b9"><b><?=$tgl?></b></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Info -->
                <div class="modal fade" id="info<?=$aktivitas[$i]->id?>" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">
                                    Informasi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card border-left-<?=$color?> shadow h-100 py-2">
                                    <a data-toggle="modal" data-target="#info">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-center">
                                                        <div class="small text-gray-500"></div>
                                                        <?= $aktivitas[$i]->identitas ?>
                                                    </div>
                                                    <div
                                                        class="text-xs mb-0 font-weight-bold text-gray-800 text-center">
                                                        <i class="fas fa-fw fa-calendar"></i> <?= $tgl ?>
                                                    </div><br>
                                                    <div class="text-xs mb-0 font-weight-bold text-gray-800"><i
                                                            class="fas fa-fw fa-map"></i> <?= $aktivitas[$i]->lokasi ?>
                                                    </div>
                                                    <div class="text-xs mb-0 font-weight-bold"><i style="color:#1D6C2F"
                                                            class="fas fa-fw fa-arrow-up"></i>
                                                        <span style="color:#1D6C2F"><?= $checkin ?></span>
                                                    </div>
                                                    <div class="text-xs mb-0 font-weight-bold"><i style="color:#5D0B0B"
                                                            class="fas fa-fw fa-arrow-down"></i>
                                                        <span style="color:#5D0B0B"><?= $checkout ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon-circle bg-<?=$color?>"
                                                        style="height: 4rem; width: 4rem">
                                                        <i class="fas fa-<?=$icon?> text-white"
                                                            style="font-size: 2.5rem"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($jen==1 && $aktivitas[$i]->status==0) { ?>
                                        <div class=card-body>
                                            <div class="text-xs mb-0 font-weight-bold">
                                                <span style="color:#e74a3b">Hubungi petugas untuk menyelesaikan
                                                    peminjaman</span>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </a>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer"><?php if($jen==2 && $aktivitas[$i]->status==0) { ?>
                                <div>
                                    <form onclick="return confirm('Apakah Kamu yakin dengan pilihan Kamu?');"
                                        method="post" action="<?= base_url('user/finish') ?>">
                                        <input type='hidden' name="id" value="<?= $aktivitas[$i]->id ?>">
                                        <button type="Submit" class="btn btn-info btn-block"
                                            style="font-size:0.7rem">Selesaikan Perjalanan
                                        </button>
                                    </form>
                                </div>
                                <?php } ?>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal"
                                    style="font-size:0.7rem">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <div class="card-body col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-bottom:0rem">
                    <h6 class="font-weight-bold text-info">Menu</h6>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="margin-bottom: 1rem">
                    <a href="<?=base_url('user/scanner_qr')?>">
                        <div class="card border-left-info shadow h-100 py-2 text-center">
                            <img src="<?= base_url('assets/qr.png');?>"
                                style="max-width: 100%; max-height: 100%; display: block; margin-left:0.5rem; margin-right:0.5rem;"
                                alt="Scan QR">
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="margin-bottom: 1rem">
                    <a href="<?=base_url('user/daftar_sepeda')?>">
                        <div class="card border-left-warning shadow h-100 py-2 text-center">
                            <img src="<?= base_url('assets/bicycle.png');?>"
                                style="max-width: 100%; max-height: 100%; display: block; margin-left:0.5rem; margin-right:0.5rem;"
                                alt="Scan QR">
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="margin-bottom: 1rem">
                    <a href="<?=base_url('user/daftar_bus')?>">
                        <div class="card border-left-danger shadow h-100 py-2 text-center">
                            <img src="<?= base_url('assets/bus.png');?>"
                                style="max-width: 100%; max-height: 100%; display: block; margin-left:0.5rem; margin-right:0.5rem;"
                                alt="Scan QR">
                        </div>
                    </a>
                </div>
                <!-- /.row -->
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
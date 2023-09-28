<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Daftar Sepeda</h1>
            <div class="row">
                <!-- /.row -->
                <?php
                if(empty($avail) || $avail==NULL){
                    $a=0;
                    $color="success";
                }
                for($i=0;$i<(count($kendaraan));$i++) {
                    for($j=0; $j<(count($avail));$j++) {
                        if(($kendaraan[$i]->id)==($avail[$j]->id_kendaraan)) {
                            $a=1;
                            $color="danger";
                        }
                        else {
                            $a=0;
                            $color="success";
                        }
                    }
                    
                    ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                    <a data-toggle="modal" data-target="#info<?=$kendaraan[$i]->id?>">
                        <div class="card border-left-<?=$color?> shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div>
                                            <div class="text-gray-500"></div>
                                            <h5><?= $kendaraan[$i]->identitas ?></h5>
                                        </div>
                                        <div class="text-xs mb-0 text-gray-800"><i class="fas fa-fw fa-map"></i>
                                            <?= $kendaraan[$i]->fakultas ?></div>
                                        <?php if($a==1){ ?>
                                        <div class="text-xs mb-0"><i class="fas fa-fw fa-toggle-off"
                                                style="color:red"></i>
                                            Not Available</div>
                                        <?php }elseif($a==0){ ?>
                                        <div class="text-xs mb-0"><i class="fas fa-fw fa-toggle-on"
                                                style="color:green"></i>
                                            Available</div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon-circle bg-<?=$color?>" style="height: 3rem; width: 3rem">
                                            <i class="fas fa-bicycle text-white" style="font-size: 1.5rem"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Info -->
                <div class="modal fade" id="info<?=$kendaraan[$i]->id?>" tabindex="-1" role="dialog"
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
                                                        <h5><?= $kendaraan[$i]->identitas ?></h5>
                                                    </div>
                                                    <div class="text-xs mb-0 font-weight-bold text-gray-800"><i
                                                            class="fas fa-fw fa-map"></i> <?=$kendaraan[$i]->fakultas ?>
                                                    </div>
                                                    <?php if($a==1){ ?>
                                                    <div class="text-xs mb-0"><i class="fas fa-fw fa-toggle-off"
                                                            style="color:red"></i>
                                                        Not Available</div>
                                                    <?php }elseif($a==0){ ?>
                                                    <div class="text-xs mb-0"><i class="fas fa-fw fa-toggle-on"
                                                            style="color:green"></i>
                                                        Available</div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon-circle bg-<?=$color?>"
                                                        style="height: 4rem; width: 4rem">
                                                        <i class="fas fa-bicycle text-white"
                                                            style="font-size: 2.5rem"></i>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div style="text-align: justify">
                                                <?=$kendaraan[$i]->keterangan ?>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal"
                                    style="font-size:0.7rem">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
</div>
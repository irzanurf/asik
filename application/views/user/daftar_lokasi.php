<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Daftar Lokasi</h1>
            <div class="row">
                <!-- /.row -->
                <?php for($i=0;$i<(count($lokasi));$i++) {
                    $id = $lokasi[$i]->id;
                    if(($i%5)==0){
                        $color = "primary";
                    } elseif(($i%5)==1){
                        $color = "warning";
                    } elseif(($i%5)==2){
                        $color = "success";
                    } elseif(($i%5)==3){
                        $color = "info";
                    } elseif(($i%5)==4){
                        $color = "danger";
                    }?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                    <a href="<?=base_url("user/daftar_sepeda?lokasi=$id")?>">
                        <div class="card border-left-<?=$color?> shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <!-- <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Lokasi
                                    </div> -->
                                        <div class="text-small mb-0 font-weight-bold text-<?=$color?>"><i
                                                class="fas fa-fw fa-map"></i> <?= $lokasi[$i]->fakultas ?></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
</div>
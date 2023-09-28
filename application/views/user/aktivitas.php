<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="h3 mb-2 text-gray-800">Aktivitas</h1>
            <div class="row">
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mb-4">
                    <div class="card border-left-<?=$color?> shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div>
                                        <div class="small text-gray-500"></div>
                                        <?= $aktivitas[$i]->identitas ?>
                                    </div>
                                    <div class="text-xs mb-0 font-weight-bold text-gray-800"><i
                                            class="fas fa-fw fa-calendar"></i> <?= $tgl ?></div>
                                    <div class="text-xs mb-0 font-weight-bold text-gray-800"><i
                                            class="fas fa-fw fa-map"></i> <?= $aktivitas[$i]->lokasi ?></div>
                                    <div class="text-xs mb-0"><i style="color:#1D6C2F"
                                            class="fas fa-fw fa-arrow-up"></i>
                                        <span style="color:#1D6C2F"><?= $checkin ?></span>
                                    </div>
                                    <div class="text-xs mb-0"><i style="color:#5D0B0B"
                                            class="fas fa-fw fa-arrow-down"></i>
                                        <span style="color:#5D0B0B"><?= $checkout ?></span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="icon-circle bg-<?=$color?>" style="height: 3rem; width: 3rem">
                                        <i class="fas fa-<?=$icon?> text-white" style="font-size: 1.5rem"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($jen==2 && $aktivitas[$i]->status==0) { ?>
                        <div class="text-center">
                            <form onclick="return confirm('Apakah Kamu yakin dengan pilihan Kamu?');" method="post"
                                action="<?= base_url('user/finish') ?>">
                                <input type='hidden' name="id" value="<?= $aktivitas[$i]->id ?>">
                                <button type="Submit" class="btn btn-info">Selesaikan Perjalanan
                                </button>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<style>
.nav_new {
    color: #b3c2ef;
}

.nav_new:hover {
    color: white;
}
</style>
<hr><hr>
<nav class="navbar fixed-bottom navbar-dark text-center"
    style="background: #2d55c6; border-radius: 7px; margin-bottom: 0.3rem; margin-left:0.15rem; margin-right:0.15rem;">
    <div class="row text-center mx-auto">
        <div class="col-3 col-xs-3 col-md-3 col-lg-3 col-xl-3 text-center">
            <a class="nav-link nav_new" href="<?= base_url('/');?>">
                <i class="fas fa-fw fa-home" style="font-size:1.1rem"></i></a>
        </div>
        <div class="col-3 col-xs-3 col-md-3 col-lg-3 col-xl-3 text-center">
            <a class="nav-link nav_new" href="<?= base_url('user/scanner_qr');?>">
                <i class="fas fa-fw fa-qrcode" style="font-size:1.1rem"></i></a>
        </div>
        <div class="col-3 col-xs-3 col-md-3 col-lg-3 col-xl-3 text-center">
            <a class="nav-link nav_new" href="<?= base_url('user/aktivitas');?>">
                <i class="fas fa-fw fa-history" style="font-size:1.1rem"></i></a>
        </div>
        <div class="col-3 col-xs-3 col-md-3 col-lg-3 col-xl-3 text-center">
            <a class="nav-link nav_new" href="<?= base_url('user/profile');?>">
                <i class="fas fa-fw fa-user-circle" style="font-size:1.1rem"></i></a>
        </div>
    </div>
</nav>

<!-- <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light justify-content-center"
    style="background: #2d55c6">
    <div class="mx-auto order-0">
        <div class="navbar-brand mx-auto">
            <li class="nav-item">
                <a class="nav-link" style="color: white" href="<?= base_url('admin/berita');?>">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Pengumuman</span></a>
            </li>
        </div>
    </div>
</nav> -->
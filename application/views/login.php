<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASIK UNDIP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets/undip.png'); ?>" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/animate/animate.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/select2/select2.min.css'); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/util.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/main.css'); ?>">
    <!--===============================================================================================-->
    <style>
    .input100:focus {
        outline: solid;
        outline-width: 2px;
        outline-color: #476dda;
    }
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: <?= base_url('assets/login/images/img-01.jpg'); ?>">
            <div class="wrap-login100 p-t-30 p-b-30 p-r-30 p-l-30"
                style="background:white; border-radius: 25px; padding-top:15px">
                <form class="login100-form validate-form" role="form" autocomplete="off" method="POST"
                    action="<?= base_url('Welcome'); ?>" enctype="multipart/form-data">

                    <span class="login100-form-title p-t-20 p-b-45">
                        <img src="<?= base_url('assets/logo_blue.png'); ?>" width="250" height="105" alt="AVATAR">
                    </span>

                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <input class="input100" style="border: 1px solid #476dda;" type="text" name="username"
                            placeholder="Username" required="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100" style="border: 1px solid #476dda;" type="password" name="password"
                            placeholder="Password" required="">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" style="background:#476dda" type="submit">
                            Login
                        </button>
                        <span style="margin-top:1rem; font-size:1rem">Belum punya akun? daftar <a href="#" type="button"
                                data-toggle="modal" data-target="#register"
                                style="font-size:1rem; color: #476dda"><b>disini</b></a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/vendor/bootstrap/js/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/vendor/select2/select2.min.js'); ?>"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets/login/js/main.js'); ?>"></script>

</body>

</html>



<!-- register -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">
                    Form Register</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" method="post" action="<?= base_url('welcome/register');?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <label style="font-weight: bold; color:black">NIM/NIP</label><label style="color:red; font-size:12px;">
                        (*Wajib diisi)</label>
                    <input class="form-control" type="text" name="nim" placeholder="NIM" required=""><br>
                    <label style="font-weight: bold; color:black">Username</label><label
                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
                    <label style="font-weight: bold; color:black">Nama Lengkap</label><label
                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <textarea rows="2" class="form-control" name="nama" placeholder="Nama Lengkap"
                        required=""></textarea><br>
                    <label style="font-weight: bold; color:black">Fakultas</label><label
                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <select class="form-control" name="fakultas" required="">
                        <option value="">Please Select</option>
                        <?php foreach($fakultas as $f){ ?>
                        <option value="<?= $f->id ?>"><?= $f->fakultas ?></option>
                        <?php } ?>
                    </select><br>
                    <label style="font-weight: bold; color:black">Email</label><label
                        style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required=""><br>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if(!empty($this->session->flashdata('info')) || ($this->session->flashdata('info')!='')){ ?>
<div class="modal fade" id="alert" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-primary ms-2" data-dismiss="modal" aria-label="Close">
                    <i class="la la-close" style="color:black"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <?php if($this->session->flashdata('info')){echo $this->session->flashdata('info');}?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#alert').modal('show');
});
</script>
<?php } ?>
<?php
					$this->session->set_flashdata('info','' );
					?>
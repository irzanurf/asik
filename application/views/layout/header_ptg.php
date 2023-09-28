<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASIK UNDIP</title>
    <link rel="stylesheet" href="<?= base_url('assets/searchable/chosen.css');?>">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/main/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/main/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/');?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/undip.png');?>" alt="logo" width="47" height="54" />
                </div>
                <div class="sidebar-brand-text mx-3">ASIK UNDIP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin');?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('petugas/daftar_sepeda')?>" aria-expanded="true"
                    aria-controls="sempro">
                    <i class="fas fa-fw fa-bicycle"></i>
                    <span>Manajemen Kendaraan</span></a>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('petugas/aktivitas_sepeda')?>" aria-expanded="true"
                    aria-controls="ujian">
                    <i class="fas fa-fw fa-history"></i>
                    <span>Aktivitas Peminjaman</span></a>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/daftar_tesis');?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Daftar Tesis</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <a href="<?=base_url('/')?>">
                        <img src="<?= base_url('assets/logo_blue.png');?>" width="105" height="45">
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <img src="<?= base_url('assets/profile.png');?>" width="33" height="33">
                                <!-- Counter - Alerts -->
                                <!-- <span class="badge badge-danger badge-counter">i</span> -->
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Profile Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url('Welcome/changePass');?>">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-user-edit text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"></div>
                                        Ganti Password
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-power-off text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"></div>
                                        Log Out
                                    </div>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
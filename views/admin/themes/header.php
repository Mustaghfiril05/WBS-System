<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>ALP WBS</title>


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">    
    <link href="<?php echo base_url('assets/admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui.structure.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui.theme.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui-timepicker-addon.min.css') ?>" rel="stylesheet">

    <!-- <link href="<?php echo base_url('assets/admin/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('assets/admin/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/buttons.dataTables.min.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">


    <!-- Page level plugin CSS-->
    <!-- <link href="<?php echo base_url('assets/admin/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/admin/css/sb-admin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/amcharts/export.css') ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/admin/js/jquery-3.3.1.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/js/datetime-moment.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/timepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/timepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/timepicker-id.js') ?>"></script>
 

</head>
<body id="page-top"> 
      <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <!-- <a class="navbar-brand mr-1" href="index.html">WEBOLT</a> -->
      <a class="navbar-brand mr-1" href="<?php echo current_url(); ?>"><span><img src="<?php echo base_url('assets/img/Agip.png') ?>" style="width: 50px" ></span>&nbsp;PT. ALP Petro Industry </a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
         
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <!-- <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <?php
          if($this->router->fetch_method()!='progress_approve'){
        ?>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown"> 
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
  <?php } ?>
    </nav>

    <body id="page-top">

    <div id="wrapper">

<?php
  if($this->router->fetch_method()!='approving_progress'){
?>
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('admin/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Laporan:</h6>
            <a class="dropdown-item" href="<?php echo site_url('admin/Alaporan/l_laporan') ?>">List Laporan</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Admin</h6>
            <a class="dropdown-item" href="<?php echo site_url('admin/Alaporan/l_masalah') ?>">Master Masalah</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Alaporan/l_user') ?>">List User</a>
          </div>
        </li>
    </ul>
    <?php
  }
?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

        <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo site_url('admin/home/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div> 


        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <a class="navbar-brand" href="<?php echo site_url('') ?>"><span><img src="<?php echo base_url('assets/img/logo.png') ?>" style="width: 50px" ></span>&nbsp;WEBOLT </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> 


          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"> 
              
            </ul>
          </div>
        </nav> --> 
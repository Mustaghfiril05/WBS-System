<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>WBS PT. ALP Petro Industry</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">    
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!-- <link href="<?php echo base_url('assets/css/bootstrap-datepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker3.css') ?>" rel="stylesheet"> -->

    <link href="<?php echo base_url('assets/css/jquery-ui.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui.structure.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui.theme.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery-ui-timepicker-addon.min.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
    <!-- <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.id.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/js/timepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/timepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/timepicker-id.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui-sliderAccess.js') ?>"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
     <div id="wrapper">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #0079B7 !important;">
          <a class="navbar-brand" href="<?php echo site_url('') ?>"><span><img src="<?php echo base_url('assets/img/Agip.png') ?>" style="width: 100px" ></span><strong>&nbsp;PT. ALP Petro Industry </strong></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> 


          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('') ?>">Home<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" ></i>informasi <span class="caret"></span></a>
                <div class="dropdown-menu" aria-labelledby="download">
                  <a class="dropdown-item" href="<?php echo site_url('syarat/sy_pelapor') ?>">Menjadi Pelapor</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo site_url('Syarat/sy_terkait') ?>">Jenis Pelanggaran</a>
                  <div class="dropdown-divider"></div>  
                  <a class="dropdown-item" href="<?php echo site_url('syarat/sy_gcg') ?>">Good Coorporate Governance</a>
                  <div class="dropdown-divider"></div>
                  <!-- <a class="dropdown-item" href="<?php echo site_url('Syarat/sy_khusus') ?>">Hal Khusus</a>  --> 
                </div>
              </li> 

              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('laporan/create') ?>"><i class="fas fa-sticky-note"></i>&nbsp; Buat Laporan</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('laporan/check') ?>"><i class="fas fa-search"></i>&nbsp;Cek Laporan</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/login') ?>"><i class="fas fa-key"></i></a>
              </li>
              
            </ul>
          </div>
        </nav>
    </div>
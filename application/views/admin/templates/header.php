
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Dodi Novembri & Tri Ratna Sari - 2018">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/lo.png">

    <title>ADMINISTRATOR - SISKPPNSOLOK</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('index.php/c_admin/admin') ?>">SISKPPNSOLOK</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('index.php/c_login/logout') ?>">Logout</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php if($this->uri->segment('2')=='admin'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_admin/admin') ?>">ADMINISTRATOR <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($this->uri->segment('2')=='data_pegawai'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_admin/data_pegawai') ?>">DATA PEGAWAI</a></li>
            <li class="<?php if($this->uri->segment('2')=='data_pegawai_atas'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_admin/data_pegawai_atas') ?>">DATA ATASAN</a></li>
            <li class="<?php if($this->uri->segment('2')=='data_daerah'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_admin/data_daerah') ?>">DATA DAERAH</a></li>
            <li class="<?php if($this->uri->segment('2')=='bidang'){echo "active";} if($this->uri->segment('2')=='surat_mski'){echo "active";} if($this->uri->segment('2')=='home_pd'){echo "active";} if($this->uri->segment('2')=='surat_bank'){echo "active";} if($this->uri->segment('2')=='surat_vera'){echo "active";} if($this->uri->segment('2')=='semua_surat_spb'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_admin/bidang') ?>">SEKSI</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

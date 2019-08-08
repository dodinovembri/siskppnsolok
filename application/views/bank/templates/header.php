
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

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/csstri.css" rel="stylesheet">

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
    <script>
      function cetak(){
      window.print();
      }
    </script>
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
          <a class="navbar-brand" href="<?php echo base_url('index.php/c_pengguna/bank') ?>">SISKPPNSOLOK</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
             <li  <?php if($this->uri->segment('2')!='simpan_surat' && ($this->uri->segment('2')!='tampil_surat')) {echo 'style="visibility:hidden"';} ?>><a href="#" onclick="cetak()"><img src="<?php echo base_url() ?>assets/img/cetak.png" style="width:20px; height:20px;"></a></li>
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
            <li class="<?php if($this->uri->segment('2')=='bank'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_pengguna/bank') ?>">BANK <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($this->uri->segment('2')=='buat_surat'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_bank/buat_surat') ?>">BUAT SURAT</a></li>
            <li class="<?php if($this->uri->segment('2')=='semua_surat'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_bank/semua_surat') ?>">SEMUA SURAT</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


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

    <title>MSKI - SISKPPNSOLOK</title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/csstri.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dashboard.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>
    <script>
      function cetak(){
      window.print();
      }
    </script>

<!--     <textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
//<![CDATA[
function printDiv(elementId) {
    var a = document.getElementById('printing-css').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    
    window.frames["print_frame"].window.print();
}
//]]>
</script> -->

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
          <a class="navbar-brand" href="<?php echo base_url('index.php/c_pengguna/mski') ?>">SISKPPNSOLOK</a>
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
            <li class="<?php if($this->uri->segment('2')=='mski'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_pengguna/mski') ?>">MSKI <span class="sr-only">(current)</span></a></li>
            <li class="<?php if($this->uri->segment('2')=='buat_surat'){echo "active";} ?>"><a  href="<?php echo base_url('index.php/c_pengguna/buat_surat') ?>">BUAT SURAT</a></li>
            <li class="<?php if($this->uri->segment('2')=='semua_surat'){echo "active";} ?>"><a href="<?php echo base_url('index.php/c_pengguna/semua_surat') ?>">SEMUA SURAT</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

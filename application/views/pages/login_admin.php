<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/lo.png">
    <title>SISKPPNSOLOK</title>
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href=<?php echo base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/signin.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <div class="container">
      <form class="form-signin" action="<?php echo base_url('index.php/c_login/cek_admin'); ?>" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
      </form>
    </div>

    <script src="<?php echo base_url() ?>assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

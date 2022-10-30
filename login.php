<?php
include "./config/global.php";
include "./config/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pendukung Keputusan</title>
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/popper.js"></script>
  <script src="./assets/js/boostrap.bundle.min.js"></script>
  <script src="./assets/js/boostrap.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body class="d-flex justify-content-center align-items-center">
  <form action="<?=$app_root?>/actions/auth/login.php" method="POST">
    <?php if ($_SESSION["error"]) { ?>
    <div class="alert alert-danger" role="alert">
      <?= $_SESSION["error"] ?>
    </div>
    <?php } ?>
    <div class="card">
      <div class="card-header p-3">
        <div class="text-center fw-bolder h5 mb-0">
          Selamat Datang!!
        </div>
      </div>
      <div class="card-body">
        <div class="text-center">
          Silakan Masukan Username dan Password Anda!
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Masukan username">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukan password">
        </div>
        <input type="submit" value="Login" class="btn btn-primary">
      </div>
    </div>
  </form>
</body>
</html>
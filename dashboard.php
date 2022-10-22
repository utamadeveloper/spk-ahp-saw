<?php
include "./config/database.php";
include "./config/global.php";
include "./middleware/auth.php";

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
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
  <nav class="navbar sticky-top navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">SPK - Panca Bhuana</a>
      <form action="<?= $app_root ?>/actions/auth/logout.php" method="POST" class="d-flex">
        <button class="btn btn-primary px-3" onclick="return confirm('Yakin ingin logout?');" type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <div style="overflow: hidden; height: 100%;">
    <div class="d-flex" style="height: 100%;">
      <div class="" style="width: 290px;">
        <div class="card" style="position:fixed; height: 100%; width: 240px;">
          <div class="card-body">
            <a href="<?= $app_root ?>/dashboard.php?page=home" class="<?= $_GET["page"] == "home" ? "btn-primary" : "btn-light" ?> btn btn-block mb-2" style="width: 100%;">Beranda</a>
            <a href="<?= $app_root ?>/dashboard.php?page=analis" class="<?= $_GET["page"] == "analis" ? "btn-primary" : "btn-light" ?> btn btn-block mb-2" style="width: 100%;">Data Analis</a>
            <a href="<?= $app_root ?>/dashboard.php?page=pengajuan" class="<?= $_GET["page"] == "pengajuan" ? "btn-primary" : "btn-light" ?> btn btn-block mb-2" style="width: 100%;">Data Pengajuan</a>
          </div>
        </div>
      </div>
      <div class="" style="width: 100%;">
        <div class="p-4">
        <?php
          $q_page = $_GET["page"] ?? null;
  
          switch ($q_page) {
            case 'home':
              if ($auth["tipe"] == 1) {
                include "./pages/credit/home.php";
              }
              if ($auth["tipe"] == 2) {
                include "./pages/manajer/home.php";
              }
              break;
            
            case 'pengajuan':
              if ($auth["tipe"] == 1) {
                include "./pages/credit/pengajuan.php";
              }
              break;
            
            default:
              # code...
              break;
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
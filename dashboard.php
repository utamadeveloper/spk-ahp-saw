<?php
include "./config/database.php";
include "./config/global.php";
include "./middleware/auth.php";

function isActiveMenu($key) {
  $page = $_GET["page"] ?? "";
  return in_array($key, explode("-", $page)) ? "active text-white" : "text-dark";
}
function isActiveSubMenu($keys) {
  $page = $_GET["page"] ?? "";
  $is_active = false;
  foreach ($keys as $key) {
    if (in_array($key, explode("-", $page))) {
      return "text-primary";
      $is_active = true;
      break;
    }
  }
  if ($is_active === false) {
    return "text-dark";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Pendukung Keputusan</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
  <nav class="navbar fixed-top navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">SPK - Panca Bhuana</a>
      <form action="<?=$app_root?>/actions/auth/logout.php" method="POST" class="d-flex">
        <button class="btn btn-primary px-3" onclick="return confirm('Yakin ingin logout?');" type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <div class="d-flex" style="margin-top: 48px;">
    <div style="width: 290px;">
      <div class="card" style="position: fixed; height: 100%; width: 240px;">
        <div class="card-body">
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="<?=$app_root?>/dashboard.php?page=home" class="<?=isActiveMenu("home")?> nav-link">
                <span>Beranda</span>
              </a>
            </li>
            <li class="nav-item" style="cursor: pointer;">
              <a data-bs-toggle="collapse" href="#collapseAnalis" class="<?=isActiveSubMenu(["perbandingan", "kriteria"])?> nav-link">
                <span>Data Analis</span>
              </a>
              <div id="collapseAnalis" class="collapse">
                <ul class="nav nav-pills flex-column mb-auto" style="padding-left: 20px">
                  <li class="nav-item">
                    <a href="<?=$app_root?>/dashboard.php?page=kriteria" class="<?=isActiveMenu("kriteria")?> nav-link">
                      <span>Kriteria</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=$app_root?>/dashboard.php?page=perbandingan" class="<?=isActiveMenu("perbandingan")?> nav-link">
                      <span>Metode Analis</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a href="<?=$app_root?>/dashboard.php?page=pengajuan" class="<?=isActiveMenu("pengajuan")?> nav-link">
                <span>Data Pengajuan</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="" style="width: 100%">
      <div class="p-4">
      <?php
        $q_page = $_GET["page"] ?? null;

        switch ($q_page) {
          case 'home':
            include "./pages/home.php";
            break;

          case 'pengajuan':
            include "./pages/pengajuan.php";
            break;
          case 'pengajuan-tambah':
            include "./pages/pengajuan_tambah.php";
            break;
          case 'pengajuan-edit':
            include "./pages/pengajuan_edit.php";
            break;

          case 'kriteria':
            include "./pages/kriteria.php";
            break;

          case 'perbandingan':
            include "./pages/perbandingan.php";
            break;
          
          default:
            # code...
            break;
        }
      ?>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="./assets/js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="./assets/js/popper.js"></script>
  <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./assets/js/main.js"></script>
</body>
</html>
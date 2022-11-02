<?php
include "../../config/global.php";
include "../../config/database.php";

// Delete old
$q_old = "
  DELETE FROM perbandingan
  WHERE idperbandingan IN (1,2,3,4,5)
";

$stmt_old = $conn->query($q_old);

if (!$stmt_old) {
  $_SESSION["error"] = "Gagal menghapus perbandingan!\n$stmt_old";
  header("Location: $app_root/dashboard.php?page=perbandingan");
  die();
}

$in_values = [];

// i = baris
// j = kolom

// Perhitungan lambda max
$lambda_max = (float) 0;
for ($i=1; $i <= 5; $i++) { 
  $in_total = $_POST["totalk".$i];
  $in_evn = $_POST["evnk".$i];
  $lambda_max += (float) $in_total * (float) $in_evn;
}

for ($i=1; $i <= 5; $i++) { 
  $in_total = $_POST["totalk".$i];
  $in_evn = $_POST["evnk".$i];
  $in_k = [];
  
  // Generate SQL values K1,K2,K3,K4,K5
  for ($j=1; $j <= 5; $j++) {
    $in_kolom = $_POST["k".$j."k".$i];
    array_push($in_k, $in_kolom);
  } 

  // Perhitungan CI
  $jumlah_kriteria = 5;
  $in_ci = (float) ($lambda_max-$jumlah_kriteria)/($jumlah_kriteria-1);
  
  // Perhitungan CR
  $random_index = (float) 1.22;
  $in_cr = (float) $in_ci / $random_index;

  // Generate SQL values insert
  array_push($in_values, "
    (
      $i,
      ".implode(", ", $in_k).",
      $in_total,
      $in_evn,
      $in_ci,
      $in_cr
    )
  ");
}

$q_perbandingan = "
  INSERT INTO perbandingan
  (
    idperbandingan,
    k1,
    k2,
    k3,
    k4,
    k5,
    total,
    evn,
    ci,
    cr
  )
  VALUES
  ".implode(", ", $in_values)."
";

$stmt_perbandingan = $conn->query($q_perbandingan);

if (!$stmt_perbandingan) {
  $_SESSION["error"] = "Gagal menyimpan perbandingan!\n$q_perbandingan";
  header("Location: $app_root/dashboard.php?page=perbandingan");
  die();
}

$_SESSION["error"] = null;
header("Location: $app_root/dashboard.php?page=perbandingan");
die();
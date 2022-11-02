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
for ($i=1; $i <= 5; $i++) { 
  $in_total = $_POST["totalk".$i];
  $in_k = [];
  
  for ($j=1; $j <= 5; $j++) {
    $in_kolom = $_POST["k".$j."k".$i];

    array_push($in_k, $in_kolom);
  } 

  array_push($in_values, "
    (
      $i,
      ".implode(", ", $in_k).",
      $in_total
    )
  ");
}

$q_perbandingan = "
  INSERT INTO perbandingan
  (
    idperbandingan,
    K1,
    K2,
    K3,
    K4,
    K5,
    total
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
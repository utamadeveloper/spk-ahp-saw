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

// i = baris
// j = kolom
$in_data = [];

// Menghitung kriteria 1,2,3,4,5
for ($i=1; $i <= 5; $i++) {   
  for ($j=1; $j <= 5; $j++) {
    $baris = (float) $_POST["k".$i."k".$j];
    $kolom = (float) $_POST["k".$j."k".$i];
    $in_data[$i]['k'.$j] = $kolom;
  }
}

// Menghitung total kolom
for ($i=1; $i <= 5; $i++) { 
  $hitung_total = (float) 0.00;
  for ($j=1; $j <= 5; $j++) {
    $baris = (float) $_POST["k".$i."k".$j];
    $kolom = (float) $_POST["k".$j."k".$i];
    if ($kolom !== '') {
      $hitung_total += $kolom;
    }
  }
  $in_data[$i]['total'] = (float) number_format($hitung_total, 2, '.', '');
}

// Menghitung nilai rata-rata (kolom/total)
for ($i=1; $i <= 5; $i++) {
  for ($j=1; $j <= 5; $j++) {
    $baris = (float) $_POST["k".$i."k".$j];
    $kolom = (float) $_POST["k".$j."k".$i];
    $in_data[$j]['r'.$i] = (float) number_format(($kolom / $in_data[$i]['total']), 3, '.', '');
  }
}

// Menghitung Eigen Vektor Normalisasi
for ($i=1; $i <= 5; $i++) {
  $hitung_total = (float) 0.00;
  for ($j=1; $j <= 5; $j++) {
    $nilai = $in_data[$i]['r'.$j];
    $hitung_total += $nilai;
  }
  $in_data[$i]['evn'] = (float) number_format(($hitung_total / 5), 3, '.', '');
}

// Perhitungan lambda max
$lambda_max = (float) 0;
for ($i=1; $i <= 5; $i++) { 
  $total = $in_data[$i]['total'];
  $evn = $in_data[$i]['evn'];
  $lambda_max += (float) $total * (float) $evn;
}

// Perhitungan nilai CI dan CR
$jumlah_kriteria = 5;
$random_index = (float) 1.22;
for ($i=1; $i <= 5; $i++) {
  $ci = (float) ($lambda_max-$jumlah_kriteria)/($jumlah_kriteria-1);
  $cr = (float) $ci / $random_index;
  $in_data[$i]['ci'] = (float) number_format($ci, 3, '.', '');
  $in_data[$i]['cr'] = (float) number_format($cr, 3, '.', '');
}

// Generate values insert
$in_values = [];
for ($i=1; $i <= 5; $i++) {
  // Generate SQL values insert
  array_push($in_values, "
    (
      $i,
      '".$in_data[$i]['k1']."',
      '".$in_data[$i]['k2']."',
      '".$in_data[$i]['k3']."',
      '".$in_data[$i]['k4']."',
      '".$in_data[$i]['k5']."',
      '".$in_data[$i]['total']."',
      '".$in_data[$i]['evn']."',
      '".$in_data[$i]['ci']."',
      '".$in_data[$i]['cr']."'
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
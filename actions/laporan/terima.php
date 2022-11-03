<?php
include __DIR__."./../../config/global.php";
include __DIR__."./../../config/database.php";
include __DIR__."./hitung_ahp.php";

$_SESSION["error"] = null;

$in_idpengajuan = $_POST["idpengajuan"];
$in_stlaporan = $_POST["stlaporan"];
$in_hasil = $_POST["hasil"];
$in_kelayakan = $_POST["kelayakan"];

$q_laporan = "
  INSERT INTO hasil
  (
    idpengajuan,
    stlaporan,
    hasil,
    kelayakan
  )
  VALUES
  (
    '$in_idpengajuan',
    '$in_stlaporan',
    '$in_hasil',
    '$in_kelayakan'
  )
";

$stmt_laporan = $conn->query($q_laporan);

if (!$stmt_laporan) {
  $_SESSION["error"] = "Gagal menyimpan laporan!\n$q_plaporan";
  header("Location: $app_root/dashboard.php?page=laporan");
  die();
}

$_SESSION["error"] = null;
header("Location: $app_root/dashboard.php?page=laporan");
die();
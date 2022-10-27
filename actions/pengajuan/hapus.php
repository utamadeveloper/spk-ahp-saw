<?php
include "../../config/global.php";
include "../../config/database.php";

$in_idpengajuan = $_POST['idpengajuan'] ?? null;

$q_old = "
  SELECT 
    pengajuan.*, 
    nasabah.nmnasabah
  FROM pengajuan
  INNER JOIN nasabah ON nasabah.id_nasabah = pengajuan.id_nasabah
  WHERE pengajuan.idpengajuan = '$in_idpengajuan'
";

$stmt_old = $conn->query($q_old);
$d_old = $stmt_old->fetch_assoc();

$q_nasabah = "
  DELETE FROM nasabah
  WHERE id_nasabah = '".$d_old['id_nasabah']."'
";
$stmt_nasabah = $conn->query($q_nasabah);

if (!$stmt_nasabah) {
  $_SESSION["error"] = "Gagal menghapus nasabah!\n$q_nasabah";
  header("Location: $app_root/dashboard.php?page=pengajuan");
  die();
}


$q_pengajuan = "
  DELETE FROM pengajuan
  WHERE idpengajuan = '".$d_old['idpengajuan']."'
";
$stmt_pengajuan = $conn->query($q_pengajuan);

if (!$stmt_pengajuan) {
  $_SESSION["error"] = "Gagal menghapus pengajuan!\n$q_pengajuan";
  header("Location: $app_root/dashboard.php?page=pengajuan");
  die();
}

$_SESSION["error"] = null;
header("Location: $app_root/dashboard.php?page=pengajuan");
die();
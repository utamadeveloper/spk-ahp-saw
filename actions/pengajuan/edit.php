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

$in_nmnasabah = $_POST["nmnasabah"];
$in_jk = $_POST["jk"];
$in_pekerjaan = $_POST["pekerjaan"];
$in_tmptlahir = $_POST["tmptlahir"];
$in_tgllahir = $_POST["tgllahir"];
$in_nohp = $_POST["nohp"];
$in_alamat = $_POST["alamat"];

$q_nasabah = "
  UPDATE nasabah
  SET
    nmnasabah = '$in_nmnasabah',
    jk = '$in_jk',
    pekerjaan = '$in_pekerjaan',
    tmptlahir = '$in_tmptlahir',
    tgllahir = '$in_tgllahir',
    nohp = '$in_nohp',
    alamat = '$in_alamat'
  WHERE id_nasabah = '".$d_old['id_nasabah']."'
";

$stmt_nasabah = $conn->query($q_nasabah);

if (!$stmt_nasabah) {
  $_SESSION["error"] = "Gagal mengedit nasabah!\n$q_nasabah";
  header("Location: $app_root/dashboard.php?page=pengajuan-edit");
  die();
}

$in_kemampuan = $_POST["kemampuan"];
$in_njaminan = $_POST["njaminan"];
$in_pinjaman = $_POST["pinjaman"];
$in_karakter = $_POST["karakter"];
$in_jangkawkt = $_POST["jangkawkt"];
$in_jnskredit = $_POST["jnskredit"];

$q_pengajuan = "
  UPDATE pengajuan
  SET
    kemampuan = '$in_kemampuan',
    njaminan = '$in_njaminan',
    pinjaman = '$in_pinjaman',
    karakter = '$in_karakter',
    jangkawkt = '$in_jangkawkt',
    jnskredit = '$in_jnskredit'
  WHERE idpengajuan = '".$d_old['idpengajuan']."'
";

$stmt_pengajuan = $conn->query($q_pengajuan);

if (!$stmt_pengajuan) {
  $_SESSION["error"] = "Gagal mengedit pengajuan!\n$q_pengajuan";
  header("Location: $app_root/dashboard.php?page=pengajuan-edit");
  die();
}

$_SESSION["error"] = null;
header("Location: $app_root/dashboard.php?page=pengajuan");
die();
<?php
include "../../config/global.php";
include "../../config/database.php";

$in_nama = $_POST["nama"];
$in_jk = $_POST["jk"];
$in_pekerjaan = $_POST["pekerjaan"];
$in_tmptlahir = $_POST["tmptlahir"];
$in_tgllahir = $_POST["tgllahir"];
$in_nohp = $_POST["nohp"];
$in_alamat = $_POST["alamat"];

$q_nasabah = "
  INSERT INTO nasabah
  (
    nmnasabah,
    jk,
    pekerjaan,
    tmptlahir,
    tgllahir,
    nohp,
    alamat
  )
  VALUES
  (
    '$in_nama',
    '$in_jk',
    '$in_pekerjaan',
    '$in_tmptlahir',
    '$in_tgllahir',
    '$in_nohp',
    '$in_alamat'
  )
";

$stmt_nasabah = $conn->query($q_nasabah);

if (!$stmt_nasabah) {
  $_SESSION["error"] = "Gagal menambahkan nasabah!\n$q_nasabah";
  header("Location: $app_root/dashboard.php?page=pengajuan-tambah");
  die();
}

$in_id_nasabah = $conn->insert_id;
$in_kemampuan = $_POST["kemampuan"];
$in_njaminan = $_POST["njaminan"];
$in_pinjaman = $_POST["pinjaman"];
$in_karakter = $_POST["karakter"];
$in_jangkawkt = $_POST["jangkawkt"];
$in_jnskredit = $_POST["jnskredit"];
$in_tglpengajuan = date('Y-m-d H:i:s');

$q_pengajuan = "
  INSERT INTO pengajuan
  (
    idhasil,
    id_nasabah,
    kemampuan,
    njaminan,
    pinjaman,
    karakter,
    jangkawkt,
    jnskredit,
    tglpengajuan
  )
  VALUES
  (
    NULL,
    '$in_id_nasabah',
    '$in_kemampuan',
    '$in_njaminan',
    '$in_pinjaman',
    '$in_karakter',
    '$in_jangkawkt',
    '$in_jnskredit',
    '$in_tglpengajuan'
  )
";

$stmt_pengajuan = $conn->query($q_pengajuan);

if (!$stmt_pengajuan) {
  $_SESSION["error"] = "Gagal menambahkan pengajuan!\n$q_pengajuan";
  header("Location: $app_root/dashboard.php?page=pengajuan-tambah");
  die();
}

$_SESSION["error"] = null;
header("Location: $app_root/dashboard.php?page=pengajuan");
die();
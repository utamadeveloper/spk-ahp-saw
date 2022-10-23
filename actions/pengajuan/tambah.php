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

$q_tambah = "
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

$stmt_tambah = $conn->query($q_tambah);

if ($stmt_tambah) {
  header("Location: $app_root/dashboard.php?page=pengajuan");
  die();
}
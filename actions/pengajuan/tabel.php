<?php
include "./config/global.php";
include "./config/database.php";

$_SESSION["error"] = null;

$in_cari = $_GET['cari'] ?? '';

$q_tabel = "
  SELECT 
    pengajuan.*, 
    nasabah.nmnasabah
  FROM pengajuan
  INNER JOIN nasabah ON nasabah.id_nasabah = pengajuan.id_nasabah
  WHERE nasabah.nmnasabah LIKE '%$in_cari%'
";
$stmt_tabel = $conn->query($q_tabel);

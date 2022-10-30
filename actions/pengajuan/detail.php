<?php
include "./config/global.php";
include "./config/database.php";

$_SESSION["error"] = null;

$in_idpengajuan = $_GET['idpengajuan'] ?? '';

$q_detail = "
  SELECT 
    pengajuan.*,
    nasabah.*
  FROM pengajuan
  INNER JOIN nasabah ON nasabah.id_nasabah = pengajuan.id_nasabah
  WHERE pengajuan.idpengajuan = '$in_idpengajuan'
";

$stmt_detail = $conn->query($q_detail);
$d_detail = $stmt_detail->fetch_assoc();

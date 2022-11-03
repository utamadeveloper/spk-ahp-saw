<?php
include "./config/global.php";
include "./config/database.php";

$q_opsi_jangka_waktu = "
  SELECT *
  FROM kriteria
  WHERE nmkriteria = 'Jangka waktu'
";

$stmt_opsi_jangka_waktu = $conn->query($q_opsi_jangka_waktu);
$d_opsi_jangka_waktu = [];
while ($row = $stmt_opsi_jangka_waktu->fetch_assoc()) {
  array_push($d_opsi_jangka_waktu, $row);
}

<?php
include "./config/global.php";
include "./config/database.php";

$q_opsi_karakter = "
  SELECT *
  FROM kriteria
  WHERE nmkriteria = 'Karakter'
";

$stmt_opsi_karakter = $conn->query($q_opsi_karakter);
$d_opsi_karakter = [];
while ($row = $stmt_opsi_karakter->fetch_assoc()) {
  array_push($d_opsi_karakter, $row);
}

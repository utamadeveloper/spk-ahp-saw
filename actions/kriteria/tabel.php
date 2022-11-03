<?php
include "./config/global.php";
include "./config/database.php";

$_SESSION["error"] = null;

$q_tabel = "
  SELECT *
  FROM kriteria
";
$stmt_tabel = $conn->query($q_tabel);
$d_tabel = [];
while ($row = $stmt_tabel->fetch_assoc()) {
  array_push($d_tabel, $row);
}

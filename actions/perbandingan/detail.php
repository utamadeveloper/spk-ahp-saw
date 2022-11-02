<?php
include "./config/global.php";
include "./config/database.php";

$q_detail = "
  SELECT *
  FROM perbandingan
  ORDER BY idperbandingan ASC
";

$stmt_detail = $conn->query($q_detail);

$d_detail = [];

while ($row = $stmt_detail->fetch_assoc()) {
  array_push($d_detail, $row);
}
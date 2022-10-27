<?php
date_default_timezone_set('Asia/Makassar');

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "spk_ahp_saw";

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

<?php
include "../../config/global.php";
include "../../config/database.php";

$in_username = $_POST["username"];
$in_password = $_POST["password"];

$q_login = "
  SELECT username, pass, tipe, nmpengguna
  FROM pengguna
  WHERE username='$in_username'
  AND pass='$in_password'
";

$stmt_login = $conn->query($q_login);
$d_login = $stmt_login->fetch_assoc();

if($stmt_login->num_rows == 1) {
  $_SESSION["auth"]["username"] = $d_login["username"];
  $_SESSION["auth"]["nmpengguna"] = $d_login["nmpengguna"];
  $_SESSION["auth"]["tipe"] = $d_login["tipe"];
  $_SESSION["error"] = null;
  header("Location: $app_root/index.php");
  die();
} else {
  $_SESSION["auth"] = null;
  $_SESSION["error"] = "username atau password salah";
  header("Location: $app_root/login.php");
  die();
}
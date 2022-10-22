<?php
include "./config/global.php";

$auth = $_SESSION["auth"] ?? null;

if ($auth != null && $auth["tipe"] != 1) {
  header("Location: $app_root/login.php");
  die();
}

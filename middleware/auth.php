<?php
include "./config/global.php";

$auth = $_SESSION["auth"] ?? null;

if ($auth == null) {
  header("Location: $app_root/login.php");
  die();
}

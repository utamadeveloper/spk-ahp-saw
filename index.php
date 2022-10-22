<?php
include "./config/global.php";

$url = null;
$auth = $_SESSION["auth"] ?? null;

if ($auth != null) {
  $_SESSION["error"] = null;
  $url = "$app_root/dashboard.php?page=home";
} else {
  $_SESSION["error"] = null;
  $url = "$app_root/login.php";
}

header('Location: '.$url);
die();
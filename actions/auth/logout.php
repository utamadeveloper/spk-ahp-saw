<?php
include "../../config/global.php";
include "../../config/database.php";

$_SESSION["auth"] = null;
$_SESSION["error"] = null;
header("Location: $app_root/login.php");
die();
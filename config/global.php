<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$app_root = "/spk-ahp-saw";
$bunga = (float) 200000;
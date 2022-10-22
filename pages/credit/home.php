<?php
  include "./middleware/credit.php";
?>

<h3>Selamat datang, <?= $_SESSION["auth"]["nmpengguna"] ?></h3>

<div class="row mt-4">
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center">20</h1>
        <div class="text-center">Data Pengajuan</div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center">12</h1>
        <div class="text-center">Pengajuan Diterima</div>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <h1 class="text-center">8</h1>
        <div class="text-center">Pengajuan Ditolak</div>
      </div>
    </div>
  </div>
</div>
<?php
  include "./middleware/credit.php";
?>

<div class="row">
  <form method="GET" class="col-10">
    <input type="hidden" name="page" value="<?=$_GET["page"]?>">
    <input type="text" name="cari" class="form-control" placeholder="Cari...">
  </form>
  <div class="col-2">
    <a href="<?= $app_root ?>/dashboard.php?page=pengajuan-tambah" class="btn btn-primary px-3">Tambah Pengajuan</a>
  </div>
</div>

<div class="table-responsive bg-white mt-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">ID Nasabah</th>
        <th scope="col">Nama</th>
        <th scope="col">Pinjaman</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>
</div>
<?php
  include "./middleware/credit.php";
  include "./actions/pengajuan/tabel.php";
?>

<?php if ($_SESSION["error"]) { ?>
<div class="alert alert-danger" role="alert">
  <?= $_SESSION["error"] ?>
</div>
<?php } ?>

<div class="row">
  <form method="GET" class="col-10">
    <input type="hidden" name="page" value="<?=$_GET["page"]?>">
    <input value="<?=$_GET['cari']??''?>" type="text" name="cari" class="form-control" placeholder="Cari...">
  </form>
  <div class="col-2">
    <a href="<?= $app_root ?>/dashboard.php?page=pengajuan-tambah" class="btn btn-primary px-3">Tambah Pengajuan</a>
  </div>
</div>

<div class="table-responsive bg-white mt-4">
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-start">Tanggal</th>
        <th class="text-start">ID Nasabah</th>
        <th class="text-start">Nama</th>
        <th class="text-end">Pinjaman</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($row = $stmt_tabel->fetch_assoc()) {
      ?>
      <tr>
        <th class="text-start"><?=$row["tglpengajuan"]?></th>
        <td class="text-start"><?=$row["id_nasabah"]?></td>
        <td class="text-start"><?=$row["nmnasabah"]?></td>
        <td class="text-end"><?=number_format($row["pinjaman"],0,",",".")?></td>
        <td class="d-flex align-items-center justify-content-center">
          <a class="btn btn-primary mx-1">
            Detail
          </a>
          <form action="<?= $app_root ?>/actions/pengajuan/hapus.php" method="POST">
            <input type="hidden" name="idpengajuan" value="<?=$row['idpengajuan']?>">
            <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Apakah anda yakin ingin mengghapus?')">
              Hapus
            </button>
          </form>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
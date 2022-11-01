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
    <a href="<?=$app_root?>/dashboard.php?page=pengajuan-tambah" class="btn btn-primary px-3">Tambah Pengajuan</a>
  </div>
</div>
<?php
  include "./actions/kriteria/tabel.php";
?>

<?php if ($_SESSION["error"]) { ?>
<div class="alert alert-danger" role="alert">
  <?= $_SESSION["error"] ?>
</div>
<?php } ?>

<div class="table-responsive bg-white">
  <table class="table table-hover">
    <thead>
      <tr>
        <th class="text-center" colspan="5">Kriteria</th>
      </tr>
      <tr>
        <th class="text-center">Nama</th>
        <th class="text-center">Kode</th>
        <th class="text-center">Keterangan</th>
        <th class="text-center">Nilai</th>
        <th class="text-center">Jenis</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($d_tabel as $key => $value) {
      ?>
      <tr>
        <td class="text-center"><?=$value["nmkriteria"]?></td>
        <td class="text-center"><?=$value["kodekriteria"]?></td>
        <td class="text-center"><?=$value["ketkriteria"]?></td>
        <td class="text-center"><?=$value["nilaik"]?></td>
        <td class="text-center"><?=$value["jnskriteria"]?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
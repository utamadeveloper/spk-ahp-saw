<?php
  include "./actions/laporan/tabel.php";
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
        <th class="text-center">Rank</th>
        <th class="text-center">Hasil</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Analisis Kelayakan</th>
        <th class="text-center">Status</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($d_tabel as $key => $value) {
      ?>
      <tr>
        <td class="text-center"><?=$value['rank']?></td>
        <td class="text-center"><?=$value['hasil']?></td>
        <td class="text-center"><?=$value['nmnasabah']?></td>
        <td class="text-center"><?=$value['kelayakan']?></td>
        <td class="text-center"><?=$value['stlaporan'] ?? '-'?></td>
        <td class="d-flex align-items-center justify-content-center">
          <a href="<?=$app_root?>/dashboard.php?page=pengajuan-edit&idpengajuan=<?=$value['idpengajuan']?>" class="btn btn-secondary mx-1">
            Detail
          </a>
          
          <?php if ($_SESSION["auth"]["tipe"] == 2) { ?>
          <form action="<?=$app_root?>/actions/laporan/terima.php" method="POST">
            <input type="hidden" name="idpengajuan" value="<?=$value['idpengajuan']?>">
            <input type="hidden" name="kelayakan" value="<?=$value['kelayakan']?>">
            <input type="hidden" name="hasil" value="<?=$value['hasil']?>">
            <input type="hidden" name="stlaporan" value="diterima">
            <button type="submit" class="btn btn-primary mx-1" onclick="return confirm('Apakah anda yakin ingin menerima?')">
              Terima
            </button>
          </form>
          <form action="<?=$app_root?>/actions/laporan/tolak.php" method="POST">
            <input type="hidden" name="idpengajuan" value="<?=$value['idpengajuan']?>">
            <input type="hidden" name="kelayakan" value="<?=$value['kelayakan']?>">
            <input type="hidden" name="hasil" value="<?=$value['hasil']?>">
            <input type="hidden" name="stlaporan" value="ditolak">
            <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Apakah anda yakin ingin menolak?')">
              Tolak
            </button>
          </form>
          <?php } ?>
        </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
<?php
  include "./actions/perbandingan/detail.php";
?>

<?php if ($_SESSION["error"]) { ?>
<div class="alert alert-danger" role="alert">
  <?= $_SESSION["error"] ?>
</div>
<?php } ?>

<form action="<?=$app_root?>/actions/perbandingan/simpan.php" method="POST" class="row">
  <div class="col-12 pb-4">
    <button onclick="return confirm('Apakah anda yakin ingin menyimpan perbandingan kriteria?')" type="submit" class="btn btn-primary">Simpan</button>
  </div>
  <div class="col-8">
    <div class="table-responsive bg-white">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center" colspan="6">Perbandingan Kriteria</th>
          </tr>
          <tr>
            <th class="text-center">X</th>
            <th class="text-center">Kemampuan</th>
            <th class="text-center">Nilai Jaminan</th>
            <th class="text-center">Pinjaman</th>
            <th class="text-center">Karakter</th>
            <th class="text-center">Jangka Waktu</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-start">Kemampuan</td>
            <td class="text-center">
              <input id="k1k1" name="k1k1" value="<?=$d_detail? $d_detail[0]['k1'] : '1'?>" type="text" class="number form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k1k2" name="k1k2" value="<?=$d_detail? $d_detail[1]['k1'] : ''?>" type="text" class="number form-control" maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k1k3" name="k1k3" value="<?=$d_detail? $d_detail[2]['k1'] : ''?>" type="text" class="number form-control" maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k1k4" name="k1k4" value="<?=$d_detail? $d_detail[3]['k1'] : ''?>" type="text" class="number form-control" maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k1k5" name="k1k5" value="<?=$d_detail? $d_detail[4]['k1'] : ''?>" type="text" class="number form-control" maxlength="1" required>
            </td>
          </tr>
          <tr>
            <td class="text-start">Nilai Jaminan</td>
            <td class="text-center">
              <input id="k2k1" name="k2k1" value="<?=$d_detail? $d_detail[0]['k2'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k2k2" name="k2k2" value="<?=$d_detail? $d_detail[1]['k2'] : '1'?>" type="text" class="number form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k2k3" name="k2k3" value="<?=$d_detail? $d_detail[2]['k2'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k2k4" name="k2k4" value="<?=$d_detail? $d_detail[3]['k2'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k2k5" name="k2k5" value="<?=$d_detail? $d_detail[4]['k2'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
          </tr>
          <tr>
            <td class="text-start">Pinjaman</td>
            <td class="text-center">
              <input id="k3k1" name="k3k1" value="<?=$d_detail? $d_detail[0]['k3'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k3k2" name="k3k2" value="<?=$d_detail? $d_detail[1]['k3'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center"> 
              <input id="k3k3" name="k3k3" value="<?=$d_detail? $d_detail[2]['k3'] : '1'?>" type="text" class="number form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k3k4" name="k3k4" value="<?=$d_detail? $d_detail[3]['k3'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
            <td class="text-center">
              <input id="k3k5" name="k3k5" value="<?=$d_detail? $d_detail[4]['k3'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
          </tr>
          <tr>
            <td class="text-start">Karakter</td>
            <td class="text-center">
              <input id="k4k1" name="k4k1" value="<?=$d_detail? $d_detail[0]['k4'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k4k2" name="k4k2" value="<?=$d_detail? $d_detail[1]['k4'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k4k3" name="k4k3" value="<?=$d_detail? $d_detail[2]['k4'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k4k4" name="k4k4" value="<?=$d_detail? $d_detail[3]['k4'] : '1'?>" type="text" class="number form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k4k5" name="k4k5" value="<?=$d_detail? $d_detail[4]['k4'] : ''?>" type="text" class="number form-control"  maxlength="1" required>
            </td>
          </tr>
          <tr>
            <td class="text-start">Jangka Waktu</td>
            <td class="text-center">
              <input id="k5k1" name="k5k1" value="<?=$d_detail? $d_detail[0]['k5'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k5k2" name="k5k2" value="<?=$d_detail? $d_detail[1]['k5'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k5k3" name="k5k3" value="<?=$d_detail? $d_detail[2]['k5'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k5k4" name="k5k4" value="<?=$d_detail? $d_detail[3]['k5'] : ''?>" type="text" class="comma form-control" readonly>
            </td>
            <td class="text-center">
              <input id="k5k5" name="k5k5" value="<?=$d_detail? $d_detail[4]['k5'] : '1'?>" type="text" class="number form-control" readonly>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-4">
    <div class="table-responsive bg-white">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-start">Nilai</th>
            <th class="text-start">Penjelasan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Sama penting</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sedikit lebih penting</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Lebih penting</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Sangat lebih penting</td>
          </tr>
          <tr>
            <td>9</td>
            <td>Mutlak lebih penting</td>
          </tr>
          <tr>
            <td>2,4,6,8</td>
            <td>Nilai berada diantara nilai berdekatan</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</form>
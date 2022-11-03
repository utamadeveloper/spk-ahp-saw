<?php
  include "./middleware/credit.php";
  include "./actions/karakter/opsi.php";
  include "./actions/jangka_waktu/opsi.php";

  $d_opsi_jenis_kredit = [
    [
      'value' => 'pribadi',
      'text' => 'Pribadi',
    ],
    [
      'value' => 'usaha',
      'text' => 'Usaha',
    ],
  ];
?>

<?php if ($_SESSION["error"]) { ?>
<div class="alert alert-danger" role="alert">
  <?= $_SESSION["error"] ?>
</div>
<?php } ?>

<form action="<?=$app_root?>/actions/pengajuan/tambah.php" method="POST">
  <div class="card">
    <div class="card-header p-3">
      <div class="text-center fw-bolder h5 mb-0">
        Formulir Nasabah
      </div>
    </div>
    <div class="card-body">
      <div class="fw-bolder h6">
        Data Nasabah
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Nama</label>
        <div class="col-sm-10">
          <input type="text" name="nmnasabah" class="form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Jenis Kelamin</label>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" value="1" checked>
            <label class="form-check-label">
              Pria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jk" value="2">
            <label class="form-check-label">
              Wanita
            </label>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Nomor HP (+62)</label>
        <div class="col-sm-10">
          <input type="text" name="nohp" class="number form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Alamat</label>
        <div class="col-sm-10">
          <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Pekerjaan</label>
        <div class="col-sm-10">
          <input type="text" name="pekerjaan" class="form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Tempat/Tanggal Lahir</label>
        <div class="col-sm-10 row">
          <div class="col-4">
            <input type="text" name="tmptlahir" class="form-control" required>
          </div>
          <div class="col-8">
            <input type="date" name="tgllahir" class="form-control" required>
          </div>
        </div>
      </div>

      <div class="fw-bolder h6 mt-5">
        Data Pengajuan
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Kemampuan</label>
        <div class="col-sm-10">
          <input type="text" name="kemampuan" class="money form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Nilai Jaminan</label>
        <div class="col-sm-10">
          <input type="text" name="njaminan" class="money form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Pinjaman</label>
        <div class="col-sm-10">
          <input type="text" name="pinjaman" class="money form-control" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Karakter</label>
        <div class="col-sm-10">
          <select name="karakter" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php
              foreach ($d_opsi_karakter as $key => $value) {
                ?>
            <option value="<?=$value['nilaik']?>"><?=$value['ketkriteria']?></option>
            <?php
              }
              ?>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Jangka Waktu (Bulan)</label>
        <div class="col-sm-10">
          <select name="jangkawkt" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php
              foreach ($d_opsi_jangka_waktu as $key => $value) {
            ?>
            <option value="<?=$value['ketkriteria']?>"><?=$value['ketkriteria']?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label class="form-label col-sm-2">Jenis Kredit</label>
        <div class="col-sm-10">
          <select name="jnskredit" class="form-control" required>
            <option value="">--Pilih--</option>
            <?php
              foreach ($d_opsi_jenis_kredit as $key => $value) {
            ?>
            <option value="<?=$value['value']?>"><?=$value['text']?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <input type="button" onclick="history.back()" value="Kembali" class="btn btn-secondary px-4">
      <input type="submit" onclick="return confirm('Apakah anda yakin menyimpan data pengajuan nasabah?')" value="Simpan" class="btn btn-primary px-4">
    </div>
  </div>
</form>
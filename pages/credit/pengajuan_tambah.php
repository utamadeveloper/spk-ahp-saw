<?php
  include "./middleware/credit.php";
?>

<form method="POST">
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
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Nomor HP</label>
        <input type="text" name="nohp" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <input type="text" name="jeniskelamin" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Pekerjaan</label>
        <input type="text" name="pekerjaan" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Tempat/Tanggal Lahir</label>
        <input type="text" name="ttl" class="form-control">
      </div>

      <div class="fw-bolder h6 mt-5">
        Data Pengajuan
      </div>
      <div class="mb-3">
        <label class="form-label">Kemampuan</label>
        <input type="text" name="kemampuan" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Nilai Jaminan</label>
        <input type="text" name="njaminan" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Pinjaman</label>
        <input type="text" name="pinjaman" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Karakter</label>
        <input type="text" name="karakter" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Jangka Waktu</label>
        <input type="text" name="jangkawaktu" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kredit</label>
        <input type="text" name="ttl" class="form-control">
      </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
      <!-- <input type="button" value="Batal" class="btn btn-secondary px-4"> -->
      <input type="submit" onclick="return confirm('Apakah anda yakin menyimpan data pengajuan nasabah?')" value="Simpan" class="btn btn-primary px-4">
    </div>
  </div>
</form>
<?php
function perhitunganSAW($in_idpengajuan) {
  include "../../config/global.php";
  include "../../config/database.php";

  // Delete old
  $q_old = "
    DELETE FROM detail_pengajuan
    WHERE idpengajuan = '$in_idpengajuan'
  ";

  $stmt_old = $conn->query($q_old);

  if (!$stmt_old) {
    $_SESSION["error"] = "Gagal menghapus detail pengajuan!\n$stmt_old";
    header("Location: $app_root/dashboard.php?page=pengajuan");
    die();
  }

  // Kriteria
  $q_kriteria = "
    SELECT *
    FROM kriteria
  ";

  $stmt_kriteria = $conn->query($q_kriteria);
  $d_kriteria = [];
  while ($row = $stmt_kriteria->fetch_assoc()) {
    array_push($d_kriteria, $row);
  }

  // Pengajuan
  // Bunga ada di config/global.php
  $q_pengajuan = "
    SELECT 
      pengajuan.*, 
      nasabah.nmnasabah,
      (
        SELECT ROUND((((pengajuan.pinjaman / pengajuan.jangkawkt) + $bunga) / pengajuan.kemampuan) * 100)
      ) AS persen_kemampuan,
      (
        SELECT ROUND((pengajuan.pinjaman / pengajuan.njaminan) * 100)
      ) AS persen_pinjaman
    FROM pengajuan
    INNER JOIN nasabah ON nasabah.id_nasabah = pengajuan.id_nasabah
    WHERE pengajuan.idpengajuan = '$in_idpengajuan'
  ";
  
  $stmt_pengajuan = $conn->query($q_pengajuan);
  $d_pengajuan = $stmt_pengajuan->fetch_assoc();
  
  // Penilaian
  $in_values = [];
  
  // Kemampuan
  $persen_kemampuan = (float) $d_pengajuan['persen_kemampuan'];
  if ($persen_kemampuan <= 29) {
    $in_values['kemampuan'] = 1;
  }
  else if ($persen_kemampuan <= 39) {
    $in_values['kemampuan'] = 2;
  }
  else if ($persen_kemampuan <= 50) {
    $in_values['kemampuan'] = 3;
  }
  else if ($persen_kemampuan <= 60) {
    $in_values['kemampuan'] = 4;
  }
  else if ($persen_kemampuan > 60) {
    $in_values['kemampuan'] = 5;
  }

  // Karakter
  $karakter = (int) $d_pengajuan['karakter'];
  if ($karakter == 1) {
    $in_values['karakter'] = 6;
  }
  else if ($karakter == 3) {
    $in_values['karakter'] = 7;
  }
  else if ($karakter == 5) {
    $in_values['karakter'] = 8;
  }
  
  // Nilai Jaminan
  $njaminan = (float) $d_pengajuan['njaminan'];
  if ($njaminan <= 5000000) {
    $in_values['njaminan'] = 9;
  }
  else if ($njaminan <= 20000000) {
    $in_values['njaminan'] = 10;
  }
  else if ($njaminan <= 50000000) {
    $in_values['njaminan'] = 11;
  }
  else if ($njaminan <= 100000000) {
    $in_values['njaminan'] = 12;
  }
  else if ($njaminan >= 100000001) {
    $in_values['njaminan'] = 13;
  }

  // Pinjaman
  $persen_pinjaman = (float) $d_pengajuan['persen_pinjaman'];
  if ($persen_pinjaman <= 19) {
    $in_values['pinjaman'] = 14;
  }
  else if ($persen_pinjaman <= 29) {
    $in_values['pinjaman'] = 15;
  }
  else if ($persen_pinjaman <= 39) {
    $in_values['pinjaman'] = 16;
  }
  else if ($persen_pinjaman <= 49) {
    $in_values['pinjaman'] = 17;
  }
  else if ($persen_pinjaman >= 50) {
    $in_values['pinjaman'] = 18;
  }

  // Jangka waktu
  $jangkawkt = (int) $d_pengajuan['jangkawkt'];
  if ($jangkawkt == 12) {
    $in_values['jangkawkt'] = 19;
  }
  else if ($jangkawkt == 24) {
    $in_values['jangkawkt'] = 20;
  }
  else if ($jangkawkt == 36) {
    $in_values['jangkawkt'] = 21;
  }

  $q_detail_pengajuan = "
    INSERT INTO detail_pengajuan
    VALUES 
    (
      '".$d_pengajuan['tglpengajuan']."',
      '".$in_idpengajuan."',
      '".$in_values['kemampuan']."'
    ),
    (
      '".$d_pengajuan['tglpengajuan']."',
      '".$in_idpengajuan."',
      '".$in_values['karakter']."'
    ),
    (
      '".$d_pengajuan['tglpengajuan']."',
      '".$in_idpengajuan."',
      '".$in_values['njaminan']."'
    ),
    (
      '".$d_pengajuan['tglpengajuan']."',
      '".$in_idpengajuan."',
      '".$in_values['pinjaman']."'
    ),
    (
      '".$d_pengajuan['tglpengajuan']."',
      '".$in_idpengajuan."',
      '".$in_values['jangkawkt']."'
    )
  ";
  $stmt_detail_pengajuan = $conn->query($q_detail_pengajuan);

  if (!$stmt_detail_pengajuan) {
    $_SESSION["error"] = "Gagal menyimpan detail pengajuan!\n$stmt_detail_pengajuan";
    header("Location: $app_root/dashboard.php?page=pengajuan");
    die();
  }
}
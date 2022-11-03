<?php
function perhitunganAHP($in_idpengajuan) {
  include __DIR__."./../../config/global.php";
  include __DIR__."./../../config/database.php";

  // Perbandingan EVN
  $q_perbandingan = "
    SELECT *
    FROM perbandingan
    ORDER BY idperbandingan ASC
  ";
  $stmt_perbandingan = $conn->query($q_perbandingan);
  $d_perbandingan = [];
  $i = 1;
  while ($row = $stmt_perbandingan->fetch_assoc()) {
    $d_perbandingan["k".$i] = (float) $row['evn'];
    $i++;
  }

  // Min cost
  $q_min_cost = "
    SELECT
      MIN(
        ROUND((((pengajuan.pinjaman / pengajuan.jangkawkt) + $bunga) / pengajuan.kemampuan) * 100)
      ) AS k1,
      MIN(
        ROUND((pengajuan.pinjaman / pengajuan.njaminan) * 100)
      ) AS k4
    FROM detail_pengajuan
    INNER JOIN kriteria ON kriteria.idkriteria = detail_pengajuan.idkriteria
    INNER JOIN pengajuan ON pengajuan.idpengajuan = detail_pengajuan.idpengajuan
  ";
  $stmt_min_cost = $conn->query($q_min_cost);
  $d_min_cost = $stmt_min_cost->fetch_assoc();
  
  // Max benefit
  $q_max_benefit = "
    SELECT (
      SELECT MAX(kriteria.nilaik)
      FROM detail_pengajuan
      INNER JOIN kriteria ON kriteria.idkriteria = detail_pengajuan.idkriteria
      WHERE kriteria.kodekriteria = 'k2'
    ) AS k2,
    (
      SELECT MAX(kriteria.nilaik)
      FROM detail_pengajuan
      INNER JOIN kriteria ON kriteria.idkriteria = detail_pengajuan.idkriteria
      WHERE kriteria.kodekriteria = 'k3'
    ) AS k3,
    (
      SELECT MAX(kriteria.nilaik)
      FROM detail_pengajuan
      INNER JOIN kriteria ON kriteria.idkriteria = detail_pengajuan.idkriteria
      WHERE kriteria.kodekriteria = 'k5'
    ) AS k5
  ";
  $stmt_max_benefit = $conn->query($q_max_benefit);  
  $d_max_benefit = $stmt_max_benefit->fetch_assoc();
  
  // Detail pengajuan
  $q_detail = "
    SELECT 
      pengajuan.pinjaman, 
      pengajuan.jangkawkt, 
      pengajuan.kemampuan, 
      pengajuan.njaminan, 
      detail_pengajuan.*, 
      kriteria.*,
      (
        ROUND((((pengajuan.pinjaman / pengajuan.jangkawkt) + $bunga) / pengajuan.kemampuan) * 100)
      ) AS k1,
      (
        ROUND((pengajuan.pinjaman / pengajuan.njaminan) * 100)
      ) AS k4
    FROM detail_pengajuan
    INNER JOIN kriteria ON kriteria.idkriteria = detail_pengajuan.idkriteria
    INNER JOIN pengajuan ON pengajuan.idpengajuan = detail_pengajuan.idpengajuan
    WHERE detail_pengajuan.idpengajuan = '$in_idpengajuan'
  ";
  $stmt_detail = $conn->query($q_detail);
  $d_detail = [];
  
  $hasil = (float) 0;

  // Perhitungan cost / benefit tiap data pengajuan
  while ($row = $stmt_detail->fetch_assoc()) {
    $k = $row['kodekriteria'];

    if ($row['jnskriteria'] == 'benefit') {
      $max = $d_max_benefit[$k];
      $hitung = (float) $row['nilaik'] / $max;
    }
    
    if ($row['jnskriteria'] == 'cost') {
      $min = $d_min_cost[$k];
      $hitung = (float) $min / $row[$k];
    }

    $normalisasi = (float) number_format($hitung, 3, '.', '');
    $evn = $d_perbandingan[$k];
    $hasil += (float) number_format($normalisasi * $evn, 3, '.', '');
  }

  // echo json_encode($d_detail);
  // die();

  return $hasil;
}
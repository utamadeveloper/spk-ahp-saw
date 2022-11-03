<?php
include __DIR__."./../../config/global.php";
include __DIR__."./../../config/database.php";
include __DIR__."./hitung_ahp.php";

// Bunga ada di config/global.php
$q_tabel = "
  SELECT 
    pengajuan.*, 
    hasil.stlaporan,
    nasabah.nmnasabah
  FROM pengajuan
  INNER JOIN nasabah ON nasabah.id_nasabah = pengajuan.id_nasabah
  LEFT JOIN hasil ON hasil.idpengajuan = pengajuan.idpengajuan
";
$stmt_tabel = $conn->query($q_tabel);
$d_tabel = [];
$i = 1;
while ($row = $stmt_tabel->fetch_assoc()) {
  $hasil = perhitunganAHP($row['idpengajuan']);
  $row['rank'] = $i;
  $row['hasil'] = (float) number_format($hasil, 2, '.', '');
  $row['kelayakan'] = $row['hasil'] > 0.55 ? 'layak' : 'tidak layak';
  $i++;
  array_push($d_tabel, $row);
}
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `detail_pengajuan` (
  `tglurut` int(11) NOT NULL AUTO_INCREMENT,
  `idpengajuan` int(11) NOT NULL,
  `idkriteria` int(11) NOT NULL,
  PRIMARY KEY (`tglurut`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `detail_pengajuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengajuan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `hasil` (
  `idhasil` int(11) NOT NULL AUTO_INCREMENT,
  `idpengajuan` int(11) DEFAULT NULL,
  `stlaporan` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `kelayakan` int(11) DEFAULT NULL,
  PRIMARY KEY (`idhasil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `hasil` DISABLE KEYS */;
/*!40000 ALTER TABLE `hasil` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `kriteria` (
  `idkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nmkriteria` varchar(50) NOT NULL,
  `ketkriteria` varchar(50) NOT NULL,
  `jnskriteria` int(11) NOT NULL,
  `nilaik` int(11) NOT NULL,
  PRIMARY KEY (`idkriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `nasabah` (
  `id_nasabah` int(11) NOT NULL AUTO_INCREMENT,
  `nmnasabah` varchar(100) NOT NULL,
  `jk` int(1) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `tmptlahir` varchar(50) NOT NULL,
  `tgllahir` date NOT NULL,
  `nohp` int(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nasabah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `nasabah` DISABLE KEYS */;
/*!40000 ALTER TABLE `nasabah` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pengajuan` (
  `idpengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `idhasil` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `kemampuan` int(11) NOT NULL,
  `njaminan` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL,
  `karakter` int(11) NOT NULL,
  `jangkawkt` int(11) NOT NULL,
  `jnskredit` int(11) NOT NULL,
  PRIMARY KEY (`idpengajuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(10) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `nmpengguna` varchar(100) NOT NULL,
  `nik` int(16) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `perbandingan` (
  `idperbandingan` int(11) NOT NULL AUTO_INCREMENT,
  `idhasil` int(11) NOT NULL,
  `K1` int(11) NOT NULL,
  `K2` int(11) NOT NULL,
  `K3` int(11) NOT NULL,
  `K4` int(11) NOT NULL,
  `K5` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `EVN` int(11) NOT NULL,
  `CI` int(11) NOT NULL,
  `CR` int(11) NOT NULL,
  PRIMARY KEY (`idperbandingan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `perbandingan` DISABLE KEYS */;
/*!40000 ALTER TABLE `perbandingan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

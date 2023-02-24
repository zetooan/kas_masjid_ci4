-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_kas
CREATE DATABASE IF NOT EXISTS `db_kas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_kas`;

-- Dumping structure for table db_kas.tb_artikel
CREATE TABLE IF NOT EXISTS `tb_artikel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_artikel: ~0 rows (approximately)

-- Dumping structure for table db_kas.tb_datapengguna
CREATE TABLE IF NOT EXISTS `tb_datapengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `role` int NOT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7919 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_datapengguna: ~4 rows (approximately)
INSERT INTO `tb_datapengguna` (`id`, `nama`, `username`, `email`, `password`, `role`, `profil`, `created_at`, `updated_at`) VALUES
	(7912, 'seto', 'zeto', 'saj@sj.a', '$2y$10$uXDfoBwjdbdriMXXCeI6AegZFicGbvStm3oSWAJ0e3KAskb3cTW/i', 1, NULL, '2022-11-25 07:18:14', '2022-11-27 23:33:42'),
	(7915, 'admin', 'admin', 'admin@adm.adm', '$2y$10$irhCpSBa3s9uRToKJsPbJeY2C9r/V9vM/uk6XH2LbB3zs8i2fo/R.', 3, NULL, '2022-11-27 19:27:29', '2022-11-27 23:32:50'),
	(7917, 'Ridho Gilang B', 'ridho', 'ridho@gmail.com', '$2y$10$FKIYQvaYT70P6zxvxtBk9eyW0WglhipKbbpm.nbJ37WUHNF2n5/UG', 2, NULL, '2022-11-27 19:28:51', '2022-11-27 23:33:27'),
	(7918, 'Agung Budi Nuridza', 'agung', 'agung@gmail.com', '$2y$10$ozEdVogjsnB.7zKfeFWjeOnPXqTYhCGStUPNSXyelPvadOi1bMMCW', 3, NULL, '2022-11-27 23:21:18', '2022-11-27 23:33:10');

-- Dumping structure for table db_kas.tb_hakakses
CREATE TABLE IF NOT EXISTS `tb_hakakses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `akses` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_hakakses: ~3 rows (approximately)
INSERT INTO `tb_hakakses` (`id`, `akses`) VALUES
	(1, 'anggota'),
	(2, 'bendahara'),
	(3, 'admin');

-- Dumping structure for table db_kas.tb_kegiatan
CREATE TABLE IF NOT EXISTS `tb_kegiatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_kegiatan: ~0 rows (approximately)
INSERT INTO `tb_kegiatan` (`id`, `tanggal`, `keterangan`, `pj`, `created_at`, `updated_at`) VALUES
	(7, '2022-11-30', 'kultum pagi jam 6', 'seto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, '2022-11-30', 'u', 'uiii', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, '2022-12-01', 'Kajian Bersama Ust Ridho di Masjid Jam 09.00', 'Seto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, '2022-12-09', 'asd', 'asd', '2022-12-08 15:22:15', '2022-12-08 15:22:15');

-- Dumping structure for table db_kas.tb_pemasukan
CREATE TABLE IF NOT EXISTS `tb_pemasukan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_pemasukan: ~0 rows (approximately)
INSERT INTO `tb_pemasukan` (`id`, `tanggal`, `jumlah`, `ket`, `created_at`, `updated_at`) VALUES
	(1, '2022-11-03', '4000', 'infaq', '2022-11-18 08:07:37', '2022-11-18 08:07:37'),
	(2, '2022-11-04', '4000', 'infaq', '2022-11-18 08:07:37', '2022-11-18 08:07:37'),
	(5, '2022-11-09', '2000', 'infaq', '2022-11-23 07:21:38', '2022-11-23 07:21:38'),
	(6, '2022-11-14', '5000', 'infaq', '2022-11-23 07:21:38', '2022-11-23 07:21:38'),
	(10, '2022-11-28', '20000', 'infaq', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, '2022-12-16', '100000', 'infag', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Dumping structure for table db_kas.tb_pengeluaran
CREATE TABLE IF NOT EXISTS `tb_pengeluaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `ket` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_pengeluaran: ~0 rows (approximately)
INSERT INTO `tb_pengeluaran` (`id`, `tanggal`, `jumlah`, `ket`, `created_at`, `updated_at`) VALUES
	(2, '2022-11-08', '25000', 'Pengajian', '2022-11-24 02:58:28', '2022-11-24 02:58:28'),
	(4, '2022-12-16', '15000', 'beliaqua', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Dumping structure for table db_kas.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `id` int NOT NULL,
  `nama_masjid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` varchar(50) NOT NULL DEFAULT '',
  `nama_kota` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_kas.tb_setting: ~1 rows (approximately)
INSERT INTO `tb_setting` (`id`, `nama_masjid`, `id_kota`, `nama_kota`, `alamat`) VALUES
	(1, 'Al-furqon', '1504', 'KAB. SLEMAN', 'Sleman yogyakarta');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

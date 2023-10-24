-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2023 at 03:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kemas`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

DROP TABLE IF EXISTS `keluarga`;
CREATE TABLE IF NOT EXISTS `keluarga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `murid_name` text,
  `nama` text,
  `kad_pengenalan` text,
  `tarikh_lahir` text,
  `tempat_lahir` text,
  `warganegara` text,
  `keturunan` text,
  `pekerjaan` text,
  `status` text,
  `pendapatan_sebulan` text,
  `no_telefon_pejabat` text,
  `nama_majikan` text,
  `alamat_majikan` text,
  `file_pengesahan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_tanggungan`
--

DROP TABLE IF EXISTS `keluarga_tanggungan`;
CREATE TABLE IF NOT EXISTS `keluarga_tanggungan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `murid_name` text,
  `nama` text,
  `perhubungan` text,
  `nama_institusi` text,
  `nilai_biasiswa` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

DROP TABLE IF EXISTS `murid`;
CREATE TABLE IF NOT EXISTS `murid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `age` text,
  `no_kad_pengenalan` text,
  `tarikh_mula` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warganegara` text,
  `bangsa` text,
  `tarikh_lahir` datetime DEFAULT NULL,
  `no_sijil_lahir` text,
  `tempat_lahir` text,
  `jantina` text,
  `alamat_rumah` text,
  `saizbaju` text,
  `penyakit` text,
  `tinggi` text,
  `berat` text,
  `masalah_makanan` text,
  `kecacatan` text,
  `nama_penjaga` text,
  `alamat_rumah_penjaga` text,
  `telefen_penjaga` text,
  `hubungan_penjaga` text,
  `gambar` text,
  `file_mykid` text,
  `file_sijil` text,
  `file_rekod_kesihatan` text,
  `status_kemasukan` int DEFAULT NULL,
  `status_kemasukan_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemarkahan`
--

DROP TABLE IF EXISTS `pemarkahan`;
CREATE TABLE IF NOT EXISTS `pemarkahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `murid_id` int NOT NULL,
  `subjek` text,
  `kategori` text,
  `tafsiran` text,
  `tarikh` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

DROP TABLE IF EXISTS `staf`;
CREATE TABLE IF NOT EXISTS `staf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpengguna` text,
  `katalaluan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id`, `idpengguna`, `katalaluan`) VALUES
(2, 'test', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

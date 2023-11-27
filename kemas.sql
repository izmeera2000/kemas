-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2023 at 03:13 PM
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
  `no_kad_pengenalan_murid` text,
  `hubungan` text,
  `kad_pengenalan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama` text,
  `tarikh_lahir` datetime DEFAULT NULL,
  `tempat_lahir` text,
  `warganegara` text,
  `keturunan` text,
  `pekerjaan` text,
  `status` text,
  `pendapatan_sebulan` text,
  `no_telefon_pejabat` text,
  `nama_majikan` text,
  `alamat_majikan` text,
  `file_slipgaji` text,
  `file_pengesahan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `no_kad_pengenalan_murid`, `hubungan`, `kad_pengenalan`, `nama`, `tarikh_lahir`, `tempat_lahir`, `warganegara`, `keturunan`, `pekerjaan`, `status`, `pendapatan_sebulan`, `no_telefon_pejabat`, `nama_majikan`, `alamat_majikan`, `file_slipgaji`, `file_pengesahan`) VALUES
(3, '000723140251', 'Bapa', '000723140242', 'asd', '2000-07-23 00:00:00', 'asd', 'asd', 'asd', 'asd', 'Kahwin', '1232', '12321', 'asd', 'asd', 'slipgaji.pdf', 'bahagianc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_tanggungan`
--

DROP TABLE IF EXISTS `keluarga_tanggungan`;
CREATE TABLE IF NOT EXISTS `keluarga_tanggungan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_kad_pengenalan_murid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama` text,
  `umur` text,
  `perhubungan` text,
  `nama_institusi` text,
  `nilai_biasiswa` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keluarga_tanggungan`
--

INSERT INTO `keluarga_tanggungan` (`id`, `no_kad_pengenalan_murid`, `nama`, `umur`, `perhubungan`, `nama_institusi`, `nilai_biasiswa`) VALUES
(2, '000723140251', 'asd', 'sad', 'asd', 'asd', '12');

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
  `telefon_penjaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hubungan_penjaga` text,
  `gambar` text,
  `file_mykid` text,
  `file_sijil` text,
  `file_rekod_kesihatan` text,
  `geran` text,
  `status_kemasukan` int DEFAULT NULL,
  `status_kemasukan_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `name`, `age`, `no_kad_pengenalan`, `tarikh_mula`, `warganegara`, `bangsa`, `tarikh_lahir`, `no_sijil_lahir`, `tempat_lahir`, `jantina`, `alamat_rumah`, `saizbaju`, `penyakit`, `tinggi`, `berat`, `masalah_makanan`, `kecacatan`, `nama_penjaga`, `alamat_rumah_penjaga`, `telefon_penjaga`, `hubungan_penjaga`, `gambar`, `file_mykid`, `file_sijil`, `file_rekod_kesihatan`, `geran`, `status_kemasukan`, `status_kemasukan_text`) VALUES
(2, 'asd', '23', '000723140251', '2023-11-21 13:28:54', 'asd', 'asd', '2000-07-23 00:00:00', 'asd', 'asd', 'asd', 'asd', 'S', 'Lelah', '23', '23', NULL, 'asd', 'asd', 'asd', 'asd', 'asd', 'gambar.jpg', 'mykid.pdf', 'sijillahir.pdf', 'kesihatan.pdf', '0', 1, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `pemarkahan`
--

DROP TABLE IF EXISTS `pemarkahan`;
CREATE TABLE IF NOT EXISTS `pemarkahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `murid_id` int NOT NULL,
  `tarikh` datetime DEFAULT CURRENT_TIMESTAMP,
  `idpengguna` text,
  `bm1` text,
  `bm2` text,
  `bm3` text,
  `bi1` text,
  `bi2` text,
  `bi3` text,
  `pi1` text,
  `pi2` text,
  `pi3` text,
  `pi4` text,
  `pi5` text,
  `pi6` text,
  `keterampilan` text,
  `perkem1` text,
  `perkem2` text,
  `perkem3` text,
  `perkem4` text,
  `perkem5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kreativ1` text,
  `kreativ2` text,
  `sainsawal1` text,
  `sainsawal2` text,
  `matematikawal1` text,
  `matematikawal2` text,
  `matematikawal3` text,
  `matematikawal4` text,
  `matematikawal5` text,
  `matematikawal6` text,
  `kemanusiaan` text,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemarkahan`
--

INSERT INTO `pemarkahan` (`id`, `murid_id`, `tarikh`, `idpengguna`, `bm1`, `bm2`, `bm3`, `bi1`, `bi2`, `bi3`, `pi1`, `pi2`, `pi3`, `pi4`, `pi5`, `pi6`, `keterampilan`, `perkem1`, `perkem2`, `perkem3`, `perkem4`, `perkem5`, `perkem6`, `kreativ1`, `kreativ2`, `sainsawal1`, `sainsawal2`, `matematikawal1`, `matematikawal2`, `matematikawal3`, `matematikawal4`, `matematikawal5`, `matematikawal6`, `kemanusiaan`, `catatan`) VALUES
(9, 2, '2023-11-27 22:50:11', '', 'asd', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

DROP TABLE IF EXISTS `staf`;
CREATE TABLE IF NOT EXISTS `staf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpengguna` text,
  `katalaluan` text,
  `level` int DEFAULT NULL,
  `tarikh` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id`, `idpengguna`, `katalaluan`, `level`, `tarikh`) VALUES
(2, 'test', 'test', 1, '2023-11-27 14:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `staf_profile`
--

DROP TABLE IF EXISTS `staf_profile`;
CREATE TABLE IF NOT EXISTS `staf_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpengguna` text,
  `nama` text,
  `umur` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staf_profile`
--

INSERT INTO `staf_profile` (`id`, `idpengguna`, `nama`, `umur`) VALUES
(1, 'test', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

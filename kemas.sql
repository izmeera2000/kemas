-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2023 at 03:55 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

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
  `no_kad_pengenalan_murid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hubungan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kad_pengenalan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh_lahir` datetime DEFAULT NULL,
  `tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `warganegara` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `keturunan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pekerjaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pendapatan_sebulan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `no_telefon_pejabat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama_majikan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `alamat_majikan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_slipgaji` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_pengesahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `no_kad_pengenalan_murid`, `hubungan`, `kad_pengenalan`, `nama`, `tarikh_lahir`, `tempat_lahir`, `warganegara`, `keturunan`, `pekerjaan`, `status`, `pendapatan_sebulan`, `no_telefon_pejabat`, `nama_majikan`, `alamat_majikan`, `file_slipgaji`, `file_pengesahan`) VALUES
(8, '000723140151', 'Bapa', '000723140259', 'asd', '2000-07-23 00:00:00', 'asas', 'asd', 'asd', 'asd', 'Kahwin', '1232', '12321', 'asd', 'LOT 1214, LORONG PERTANIAN, KAMPUNG JAYA SETIA', 'slipgaji.pdf', 'bahagianc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_tanggungan`
--

DROP TABLE IF EXISTS `keluarga_tanggungan`;
CREATE TABLE IF NOT EXISTS `keluarga_tanggungan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_kad_pengenalan_murid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `umur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perhubungan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama_institusi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nilai_biasiswa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluarga_tanggungan`
--

INSERT INTO `keluarga_tanggungan` (`id`, `no_kad_pengenalan_murid`, `nama`, `umur`, `perhubungan`, `nama_institusi`, `nilai_biasiswa`) VALUES
(3, '000723140151', 'asd', '12', 'asd', 'asd', '121');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `maklumat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh_mula` timestamp NULL DEFAULT NULL,
  `tarikh_akhir` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_kehadiran`
--

DROP TABLE IF EXISTS `meeting_kehadiran`;
CREATE TABLE IF NOT EXISTS `meeting_kehadiran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_murid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_meeting` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

DROP TABLE IF EXISTS `murid`;
CREATE TABLE IF NOT EXISTS `murid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `age` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `no_kad_pengenalan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh_mula` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warganegara` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bangsa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh_lahir` datetime DEFAULT NULL,
  `no_sijil_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `jantina` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `alamat_rumah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `saizbaju` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `penyakit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tinggi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `berat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `masalah_makanan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kecacatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama_penjaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `alamat_rumah_penjaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `telefon_penjaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hubungan_penjaga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `gambar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_mykid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_sijil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file_rekod_kesihatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `geran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status_kemasukan` int DEFAULT NULL,
  `status_kemasukan_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` int DEFAULT NULL,
  `title` int DEFAULT NULL,
  `body` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemarkahan`
--

DROP TABLE IF EXISTS `pemarkahan`;
CREATE TABLE IF NOT EXISTS `pemarkahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `murid_id` int NOT NULL,
  `tarikh` datetime DEFAULT CURRENT_TIMESTAMP,
  `idpengguna` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bm1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bm2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bm3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bi1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bi2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bi3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pi6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `keterampilan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `perkem6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kreativ1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kreativ2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `sainsawal1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `sainsawal2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `matematikawal6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kemanusiaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

DROP TABLE IF EXISTS `staf`;
CREATE TABLE IF NOT EXISTS `staf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpengguna` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `katalaluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `level` int DEFAULT '2',
  `tarikh` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`id`, `idpengguna`, `katalaluan`, `level`, `tarikh`) VALUES
(4, 'asdasd', '7815696ecbf1c96e6894b779456d330e', 1, '2023-11-27 15:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `staf_profile`
--

DROP TABLE IF EXISTS `staf_profile`;
CREATE TABLE IF NOT EXISTS `staf_profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpengguna` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `umur` int NOT NULL,
  `gambar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staf_profile`
--

INSERT INTO `staf_profile` (`id`, `idpengguna`, `nama`, `umur`, `gambar`) VALUES
(1, 'test', NULL, 0, NULL),
(2, '123', '123', 123, NULL),
(6, 'asdasd', 'asdd', 12312, 'gambar.jpg'),
(7, 'asd', 'asd', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yuran`
--

DROP TABLE IF EXISTS `yuran`;
CREATE TABLE IF NOT EXISTS `yuran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_murid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tarikh` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_yuran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

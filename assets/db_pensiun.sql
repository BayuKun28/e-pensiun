-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2022 at 12:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pensiun`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(255) NOT NULL,
  `ttd` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`, `ttd`) VALUES
(1, 'Direktur', 0),
(2, 'Pegawai', 0),
(4, 'Analis Kepegawaian Ahli Muda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_pengguna`
--

DROP TABLE IF EXISTS `level_pengguna`;
CREATE TABLE IF NOT EXISTS `level_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_pengguna`
--

INSERT INTO `level_pengguna` (`id`, `nama_level`) VALUES
(1, 'admin'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

DROP TABLE IF EXISTS `pangkat`;
CREATE TABLE IF NOT EXISTS `pangkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pangkat` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id`, `pangkat`) VALUES
(1, 'Analis Kepegawaian Ahli Muda'),
(3, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `pangkat` int(11) NOT NULL,
  `bt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `nip`, `jk`, `tgl_lahir`, `alamat`, `jabatan`, `pangkat`, `bt`) VALUES
(1, 'Bayu Prastyo', '111.111.111.111', 'Laki-laki', '2018-03-28', 'Tawangmangu', 2, 3, 0),
(2, 'Esti Setyaningrum', '111.111.112.112', 'Perempuan', '2001-03-17', 'Mojogedang', 2, 0, 0),
(6, 'Solikin', '555.5555.555.555', 'Laki-laki', '1967-06-11', 'gatau', 2, 0, 0),
(7, 'Sofian', '333.333.333.333', 'Laki-laki', '1950-01-16', 'Denpasar', 2, 3, 2),
(8, 'Sri Sulastri, S.Sos', '19690127 199103 2 001', 'Laki-laki', '1986-08-20', 'Alamat', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_pensiun` date NOT NULL,
  `tgl_last_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `id_pegawai`, `tgl_input`, `tgl_pensiun`, `tgl_last_update`) VALUES
(1, 1, '2022-05-21', '2060-03-28', '2022-05-22'),
(2, 2, '2022-05-22', '2022-05-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `level`, `is_active`) VALUES
(1, 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'Admin', 1, 1),
(2, 'direktur', '$2y$10$J/GAbDQ3diMQ0mYiLlQl4u4wrUwQYyruqKkzVBWE6BMgVRWkRuUUy', 'Direktur', 2, 1),
(5, 'bayu', '$2y$10$.Utpy2/FJRprCUiKgX9WoeSeyokQ6XiaiBqerjXdFOMf/qdE9Y04W', 'Bayu Prastyo', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

DROP TABLE IF EXISTS `tahun`;
CREATE TABLE IF NOT EXISTS `tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(1, 2018),
(2, 2019),
(4, 2020),
(6, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `usia_pensiun`
--

DROP TABLE IF EXISTS `usia_pensiun`;
CREATE TABLE IF NOT EXISTS `usia_pensiun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usia_pensiun`
--

INSERT INTO `usia_pensiun` (`id`, `usia`) VALUES
(1, 56);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

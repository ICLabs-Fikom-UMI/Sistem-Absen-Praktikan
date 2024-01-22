-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2024 at 08:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `frekuensi`
--

CREATE TABLE `frekuensi` (
  `frekuensi` varchar(20) NOT NULL,
  `waktu_dimulai` time NOT NULL,
  `waktu_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `kode_absen` int(11) NOT NULL,
  `stb` varchar(15) NOT NULL,
  `status` enum('A','H','I','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kode_kelas` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `kode_surat` int(11) NOT NULL,
  `stb` varchar(15) NOT NULL,
  `frekuensi` varchar(15) NOT NULL,
  `path` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `stb` varchar(15) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `frekuensi` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_user` enum('ADMIN','ASISTEN','PRAKTIKAN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frekuensi`
--
ALTER TABLE `frekuensi`
  ADD PRIMARY KEY (`frekuensi`);

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`kode_absen`),
  ADD KEY `FK_USER_ABSEN` (`stb`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`kode_surat`),
  ADD KEY `FK_USER_SURAT` (`stb`),
  ADD KEY `FK_FREKUENSI_SURAT` (`frekuensi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`stb`),
  ADD KEY `FK_KELAS_USER` (`kode_kelas`),
  ADD KEY `FK_FREKUENSI_USER` (`frekuensi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `kode_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `FK_USER_ABSEN` FOREIGN KEY (`stb`) REFERENCES `tbl_user` (`stb`);

--
-- Constraints for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD CONSTRAINT `FK_FREKUENSI_SURAT` FOREIGN KEY (`frekuensi`) REFERENCES `frekuensi` (`frekuensi`),
  ADD CONSTRAINT `FK_USER_SURAT` FOREIGN KEY (`stb`) REFERENCES `tbl_user` (`stb`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_FREKUENSI_USER` FOREIGN KEY (`frekuensi`) REFERENCES `frekuensi` (`frekuensi`),
  ADD CONSTRAINT `FK_KELAS_USER` FOREIGN KEY (`kode_kelas`) REFERENCES `tbl_kelas` (`kode_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

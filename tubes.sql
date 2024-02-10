-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2024 at 06:54 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAbsen` (IN `kodeFrekuensi` INT)   BEGIN
        DELETE FROM tbl_absen WHERE kode_frekuensi = kodeFrekuensi;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAbsenUseKodeFrekuensi` (IN `stbk` VARCHAR(20))   BEGIN
        DECLARE temp INT;
        SELECT tbl_frekuensi_matkul.kode_frekuensi INTO temp FROM tbl_frekuensi_matkul
        WHERE stb = stbk;

        CALL deleteAbsen(temp);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDataMahasiswa` (IN `stbk` VARCHAR(20))   BEGIN
        DECLARE temp INT;
        SELECT tbl_frekuensi_matkul.kode_frekuensi INTO temp FROM tbl_frekuensi_matkul
        WHERE stb = stbk;

        CALL deleteAbsen(temp);

        DELETE FROM tbl_frekuensi_matkul WHERE kode_frekuensi = temp;

        DELETE FROM tbl_surat WHERE stb = stbk;

        DELETE FROM tbl_user WHERE stb = stbk;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_surat` (IN `stbk` VARCHAR(15), IN `frekuensis` VARCHAR(20), IN `pathsh` VARCHAR(100), IN `keterangans` TEXT)   BEGIN
            INSERT INTO tbl_surat(stb, frekuensi, paths, waktu, keterangan) VALUES (stbk, frekuensis, pathsh, NOW(), keterangans);
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDataAbsen` (IN `kode_frekuensi` VARCHAR(20))   BEGIN
        DECLARE tempKode INT;
        SELECT getKodeAbsen(kode_frekuensi) INTO tempKode;
        UPDATE tbl_absen
        SET status = 'H'
        WHERE tbl_absen.kode_absen = tempKode;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDataMahasiswa` (IN `stbk` VARCHAR(20), IN `frekuensis` VARCHAR(20), IN `frekuensiBaru` VARCHAR(20), IN `nama` VARCHAR(50), IN `kelas` VARCHAR(10))   BEGIN 
            DECLARE temp INT;
            UPDATE tbl_user
                SET tbl_user.nama = nama,
                    tbl_user.kode_kelas = kelas
                WHERE stb = stbk;

            IF frekuensiBaru != 'NULL' THEN
                SELECT searchKodeFrekuensi(stbk, frekuensis) INTO temp;
                UPDATE tbl_frekuensi_matkul
                    SET frekuensi = frekuensiBaru
                    WHERE kode_frekuensi = temp;
            END IF;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTableAbsen` (IN `stbk` VARCHAR(20), IN `frekuensis` VARCHAR(20), IN `value` VARCHAR(2), IN `iterasi` INT)   BEGIN

        DECLARE tempKodeFrekuensi INT;
        DECLARE tempKodeAbsen INT;
        SELECT searchKodeFrekuensi(stbk, frekuensis) INTO tempKodeFrekuensi;

        SELECT kode_absen INTO tempKodeAbsen FROM tbl_absen WHERE kode_frekuensi = tempKodeFrekuensi
        ORDER BY kode_absen  LIMIT 1;

        SET tempKodeAbsen = tempKodeAbsen + iterasi;

        UPDATE tbl_absen
        SET status = value
        WHERE kode_absen = tempKodeAbsen;
        
    END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getKodeAbsen` (`kode_frekuensis` VARCHAR(20)) RETURNS INT(11) DETERMINISTIC BEGIN
        DECLARE tempId INT;
        DECLARE tempInt INT;
        DECLARE temp VARCHAR(2);
        DECLARE i INT DEFAULT 0;
        SELECT kode_absen INTO tempId FROM tbl_absen WHERE kode_frekuensi = kode_frekuensis
        ORDER BY kode_absen ASC LIMIT 1;

        my_loop : WHILE i < 10 DO

            IF i = 0 THEN
                SET tempId = tempId;
            ELSE
                SET tempId = tempId + 1;
            END IF;
            
            SELECT status INTO temp FROM tbl_absen WHERE tbl_absen.kode_absen = tempId;
            SELECT kode_absen INTO tempInt FROM tbl_absen WHERE tbl_absen.kode_absen = tempId;

            IF temp = 'T' THEN
                LEAVE my_loop;
            END IF;
            SET i = i + 1;
        END WHILE;

        RETURN tempInt;
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `login` (`stbk` VARCHAR(15), `password` VARCHAR(20)) RETURNS VARCHAR(25) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
        DECLARE temp VARCHAR (20);
        DECLARE result VARCHAR(25);

        SELECT jenis_user INTO temp FROM tbl_user
        WHERE stb = stbk AND passwords = password;

        IF temp = 'ADMIN' THEN
            SET result = temp;
        ELSEIF temp = 'ASISTEN' THEN
            SET result = temp;
        ELSEIF temp = 'PRAKTIKAN' THEN
            SET result = temp;
        ELSE 
            SET result = 'USER TIDAK DITEMUKAN';
        END IF;

        RETURN result;
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `searchFrekuensi` (`frek` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
        DECLARE temp VARCHAR(20);
        SELECT frekuensi INTO temp FROM frekuensi WHERE frekuensi = frek;

        RETURN temp;
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `searchKodeFrekuensi` (`stbk` VARCHAR(15), `frek` VARCHAR(20)) RETURNS INT(11) DETERMINISTIC BEGIN
            DECLARE temp INT;
            SELECT kode_frekuensi INTO temp FROM tbl_frekuensi_matkul
            WHERE stb = stbk AND frekuensi = frek;

            RETURN temp;
        END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `searchStb` (`cari` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
        DECLARE temp VARCHAR(20);

        SELECT stb INTO temp FROM tbl_user WHERE stb = cari;
        RETURN temp;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `frekuensi`
--

CREATE TABLE `frekuensi` (
  `frekuensi` varchar(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `waktu_dimulai` time NOT NULL,
  `waktu_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frekuensi`
--

INSERT INTO `frekuensi` (`frekuensi`, `hari`, `waktu_dimulai`, `waktu_berakhir`) VALUES
('TI_ALPRO-1', 'Senin', '08:00:00', '10:00:00'),
('TI_ALPRO-2', 'Senin', '08:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `kode_absen` int(11) NOT NULL,
  `kode_frekuensi` int(11) NOT NULL,
  `status` enum('A','H','I','S','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`kode_absen`, `kode_frekuensi`, `status`) VALUES
(307, 51, 'H'),
(308, 51, 'T'),
(309, 51, 'A'),
(310, 51, 'S'),
(311, 51, 'H'),
(312, 51, 'T'),
(313, 51, 'S'),
(314, 51, 'T'),
(315, 51, 'T'),
(316, 51, 'H'),
(317, 52, 'I'),
(318, 52, 'T'),
(319, 52, 'H'),
(320, 52, 'T'),
(321, 52, 'H'),
(322, 52, 'H'),
(323, 52, 'H'),
(324, 52, 'T'),
(325, 52, 'S'),
(326, 52, 'A'),
(327, 53, 'H'),
(328, 53, 'T'),
(329, 53, 'I'),
(330, 53, 'T'),
(331, 53, 'H'),
(332, 53, 'T'),
(333, 53, 'T'),
(334, 53, 'T'),
(335, 53, 'T'),
(336, 53, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_frekuensi_matkul`
--

CREATE TABLE `tbl_frekuensi_matkul` (
  `kode_frekuensi` int(11) NOT NULL,
  `stb` varchar(15) DEFAULT NULL,
  `frekuensi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_frekuensi_matkul`
--

INSERT INTO `tbl_frekuensi_matkul` (`kode_frekuensi`, `stb`, `frekuensi`) VALUES
(51, '13020210048', 'TI_ALPRO-2'),
(52, '13020210048', 'TI_ALPRO-1'),
(53, '13020210049', 'TI_ALPRO-2');

--
-- Triggers `tbl_frekuensi_matkul`
--
DELIMITER $$
CREATE TRIGGER `insert_absen_after_insert_frekuensi_matkul` AFTER INSERT ON `tbl_frekuensi_matkul` FOR EACH ROW BEGIN
        DECLARE i INT DEFAULT 1;
        WHILE i <= 10 DO 
            INSERT INTO tbl_absen (kode_frekuensi, status)
            VALUE (NEW.kode_frekuensi, 'T');
            SET i = i + 1;
            END WHILE;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kode_kelas` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kode_kelas`, `kelas`) VALUES
('A1-2021', 'A1'),
('A1-2022', 'A1'),
('A1-2023', 'A1'),
('A2-2021', 'A2'),
('A2-2022', 'A2'),
('A2-2023', 'A2'),
('ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `kode_surat` int(11) NOT NULL,
  `stb` varchar(15) NOT NULL,
  `frekuensi` varchar(15) NOT NULL,
  `paths` varchar(225) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`kode_surat`, `stb`, `frekuensi`, `paths`, `waktu`, `keterangan`) VALUES
(53, '13020210048', 'TI_ALPRO-1', '65c46d429c1ad.png', '2024-02-08 05:57:22', ''),
(54, '13020210048', 'TI_ALPRO-2', '65c4d6606b4b7.jpeg', '2024-02-08 13:25:52', ''),
(55, '13020210048', 'TI_ALPRO-2', '65c4eb7a9b0c5.png', '2024-02-08 14:55:54', 'Asesmen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `stb` varchar(15) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `jenis_user` enum('ADMIN','ASISTEN','PRAKTIKAN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`stb`, `kode_kelas`, `nama`, `passwords`, `jenis_user`) VALUES
('13020210048', 'A1-2021', 'Ahmad Rendi', '13020210048-123', 'PRAKTIKAN'),
('13020210049', 'A1-2022', 'Sari Rahmadani', '13020210049-123', 'PRAKTIKAN'),
('admin', 'ADMIN', 'admin', 'admin-123-4', 'ADMIN'),
('asisten', 'ADMIN', 'asisten', 'asisten-123-4', 'ASISTEN');

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
  ADD KEY `FK_FREKUENSI_ABSEN` (`kode_frekuensi`);

--
-- Indexes for table `tbl_frekuensi_matkul`
--
ALTER TABLE `tbl_frekuensi_matkul`
  ADD PRIMARY KEY (`kode_frekuensi`),
  ADD KEY `fk_tbl_frekuensi_matkul_stb` (`stb`),
  ADD KEY `fk_tbl_frekuensi_matkul_frekuensi` (`frekuensi`);

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
  ADD KEY `FK_FREKUENSI_SURAT` (`frekuensi`),
  ADD KEY `FK_USER` (`stb`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`stb`),
  ADD KEY `FK_KELAS_USER` (`kode_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `kode_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `tbl_frekuensi_matkul`
--
ALTER TABLE `tbl_frekuensi_matkul`
  MODIFY `kode_frekuensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `kode_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD CONSTRAINT `FK_FREKUENSI_ABSEN` FOREIGN KEY (`kode_frekuensi`) REFERENCES `tbl_frekuensi_matkul` (`kode_frekuensi`);

--
-- Constraints for table `tbl_frekuensi_matkul`
--
ALTER TABLE `tbl_frekuensi_matkul`
  ADD CONSTRAINT `fk_tbl_frekuensi_matkul_frekuensi` FOREIGN KEY (`frekuensi`) REFERENCES `frekuensi` (`frekuensi`),
  ADD CONSTRAINT `fk_tbl_frekuensi_matkul_stb` FOREIGN KEY (`stb`) REFERENCES `tbl_user` (`stb`);

--
-- Constraints for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD CONSTRAINT `FK_FREKUENSI_SURAT` FOREIGN KEY (`frekuensi`) REFERENCES `frekuensi` (`frekuensi`),
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`stb`) REFERENCES `tbl_user` (`stb`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_KELAS_USER` FOREIGN KEY (`kode_kelas`) REFERENCES `tbl_kelas` (`kode_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

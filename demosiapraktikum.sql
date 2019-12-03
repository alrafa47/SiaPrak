-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 01:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demosiapraktikum`
--

-- --------------------------------------------------------

--
-- Table structure for table `detilkrp`
--

CREATE TABLE `detilkrp` (
  `idDetilKrp` int(11) NOT NULL,
  `idKrp` int(11) DEFAULT NULL,
  `idMataPraktikum` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detilkrp`
--

INSERT INTO `detilkrp` (`idDetilKrp`, `idKrp`, `idMataPraktikum`, `tugas`, `uts`, `uas`) VALUES
(1, 1, 3, 10, 30, 10),
(2, 2, 3, 40, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `krp`
--

CREATE TABLE `krp` (
  `idKrp` int(11) NOT NULL,
  `npm` varchar(50) DEFAULT NULL,
  `tahunAjaran` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krp`
--

INSERT INTO `krp` (`idKrp`, `npm`, `tahunAjaran`, `tanggal`) VALUES
(1, '17', '2019', '2019-11-10'),
(2, '12', '2019', '2019-11-20'),
(3, '17', '2019', '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `matapraktikum`
--

CREATE TABLE `matapraktikum` (
  `idMataPraktikum` int(11) NOT NULL,
  `idMk` int(11) NOT NULL,
  `namaMataPraktikum` varchar(50) DEFAULT NULL,
  `tahunAjaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapraktikum`
--

INSERT INTO `matapraktikum` (`idMataPraktikum`, `idMk`, `namaMataPraktikum`, `tahunAjaran`) VALUES
(1, 5, 'mobile', '2019'),
(2, 4, '3d', '2019'),
(3, 1, 'pemrograman', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detilkrp`
--
ALTER TABLE `detilkrp`
  ADD PRIMARY KEY (`idDetilKrp`),
  ADD KEY `FK_detilkrp_krp` (`idKrp`),
  ADD KEY `FK_detilkrp_matapraktikum` (`idMataPraktikum`);

--
-- Indexes for table `krp`
--
ALTER TABLE `krp`
  ADD PRIMARY KEY (`idKrp`);

--
-- Indexes for table `matapraktikum`
--
ALTER TABLE `matapraktikum`
  ADD PRIMARY KEY (`idMataPraktikum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detilkrp`
--
ALTER TABLE `detilkrp`
  MODIFY `idDetilKrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `krp`
--
ALTER TABLE `krp`
  MODIFY `idKrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matapraktikum`
--
ALTER TABLE `matapraktikum`
  MODIFY `idMataPraktikum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detilkrp`
--
ALTER TABLE `detilkrp`
  ADD CONSTRAINT `FK_detilkrp_krp` FOREIGN KEY (`idKrp`) REFERENCES `krp` (`idKrp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detilkrp_matapraktikum` FOREIGN KEY (`idMataPraktikum`) REFERENCES `matapraktikum` (`idMataPraktikum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

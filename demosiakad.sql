-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 03:34 PM
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
-- Database: `demosiakad`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `datanilai`
-- (See below for the actual view)
--
CREATE TABLE `datanilai` (
`idDetilKrs` int(11)
,`idKrs` int(11)
,`idMk` int(11)
,`uts` int(11)
,`uas` int(11)
,`praktikum` int(11)
,`tugas` int(11)
,`npm` varchar(50)
,`tahunAjaran` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `detilkrs`
--

CREATE TABLE `detilkrs` (
  `idDetilKrs` int(11) NOT NULL,
  `idKrs` int(11) DEFAULT NULL,
  `idMk` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `praktikum` int(11) DEFAULT NULL,
  `tugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detilkrs`
--

INSERT INTO `detilkrs` (`idDetilKrs`, `idKrs`, `idMk`, `uts`, `uas`, `praktikum`, `tugas`) VALUES
(2, 14, 1, 2, 2, 50, 2),
(3, 15, 1, 10, 10, 60, 10);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `idKrs` int(11) NOT NULL,
  `npm` varchar(50) DEFAULT NULL,
  `tahunAjaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`idKrs`, `npm`, `tahunAjaran`) VALUES
(14, '17', '2017'),
(15, '12', '2020'),
(17, '123', '2012');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `alamat`, `password`, `status`) VALUES
('12', 'ada', 'asda', '123', 'Tidak Aktif'),
('123', 'al', 'malang', 'al', 'Aktif'),
('17', '12ew', 'we2', '1231', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `idMk` int(11) NOT NULL,
  `namaMk` varchar(50) NOT NULL,
  `tahunAjaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`idMk`, `namaMk`, `tahunAjaran`) VALUES
(1, 'pemrog', '2020'),
(3, 'ave', '2020'),
(4, 'animasi 3D', '2019'),
(5, 'mobile', '2019');

-- --------------------------------------------------------

--
-- Structure for view `datanilai`
--
DROP TABLE IF EXISTS `datanilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `datanilai`  AS  select `detilkrs`.`idDetilKrs` AS `idDetilKrs`,`detilkrs`.`idKrs` AS `idKrs`,`detilkrs`.`idMk` AS `idMk`,`detilkrs`.`uts` AS `uts`,`detilkrs`.`uas` AS `uas`,`detilkrs`.`praktikum` AS `praktikum`,`detilkrs`.`tugas` AS `tugas`,`krs`.`npm` AS `npm`,`krs`.`tahunAjaran` AS `tahunAjaran` from (`detilkrs` join `krs` on((`detilkrs`.`idKrs` = `krs`.`idKrs`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detilkrs`
--
ALTER TABLE `detilkrs`
  ADD PRIMARY KEY (`idDetilKrs`),
  ADD KEY `FK_detilkrs_krs` (`idKrs`),
  ADD KEY `FK_detilkrs_mk` (`idMk`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`idKrs`),
  ADD KEY `FK_krs_mahasiswa` (`npm`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`idMk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detilkrs`
--
ALTER TABLE `detilkrs`
  MODIFY `idDetilKrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `idKrs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `idMk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detilkrs`
--
ALTER TABLE `detilkrs`
  ADD CONSTRAINT `FK_detilkrs_krs` FOREIGN KEY (`idKrs`) REFERENCES `krs` (`idKrs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detilkrs_mk` FOREIGN KEY (`idMk`) REFERENCES `mk` (`idMk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `FK_krs_mahasiswa` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

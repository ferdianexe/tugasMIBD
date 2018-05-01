-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 01:01 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mibd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSpesialisasi` int(11) NOT NULL,
  `noRuangan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpraktek`
--

CREATE TABLE `jadwalpraktek` (
  `idPraktek` int(11) NOT NULL,
  `idDokter` int(11) NOT NULL,
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nomortelepon`
--

CREATE TABLE `nomortelepon` (
  `idUser` int(11) DEFAULT NULL,
  `nomorTelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaandokter`
--

CREATE TABLE `pekerjaandokter` (
  `idDokter` int(11) NOT NULL,
  `idPasien` int(11) NOT NULL,
  `idPenanganan` int(11) NOT NULL,
  `waktuDaftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktuTemu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `idPenanganan` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `waktuPengubahan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`idPenanganan`, `tarif`, `waktuMulai`, `waktuSelesai`, `tanggal`, `catatan`, `isDeleted`, `waktuPengubahan`) VALUES
(1, 0, '12:00:00', '12:30:00', '2018-04-05', 'Sakit Hati ga dapet pacar', 0, NULL),
(2, 0, '13:00:00', '13:30:00', '2018-04-07', 'Tifus', 0, '2018-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `idSpesialisasi` int(11) NOT NULL,
  `namaSpesialisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialisasi`
--

INSERT INTO `spesialisasi` (`idSpesialisasi`, `namaSpesialisasi`) VALUES
(1, 'Dokter Umum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenisKelamin` varchar(2) NOT NULL,
  `priviledge` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `nama`, `umur`, `jenisKelamin`, `priviledge`, `isActive`, `username`, `alamat`, `password`) VALUES
(1, 'Roxy', 16, 'P', 1, 1, 'Roxy', 'Jln Jendral Sderman', 'Roxy'),
(2, 'Roy Kiyoshi', 25, 'L', 2, 1, 'RoyK', 'Jln kesalahan garam', 'Royy'),
(3, 'admin', 22, 'L', 3, 1, 'admin', 'jalan kurang sehat', 'admin'),
(4, 'Ferdi', NULL, 'L', 1, 0, 'Ferdiboy', 'Kddff', 'test'),
(5, 'UserTest', NULL, 'L', 1, 0, 'Root', 'Hahay', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`idDokter`),
  ADD UNIQUE KEY `noRuangan` (`noRuangan`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSpesialisasi` (`idSpesialisasi`);

--
-- Indexes for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  ADD PRIMARY KEY (`idPraktek`),
  ADD KEY `idDokter` (`idDokter`);

--
-- Indexes for table `nomortelepon`
--
ALTER TABLE `nomortelepon`
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `pekerjaandokter`
--
ALTER TABLE `pekerjaandokter`
  ADD KEY `idPenanganan` (`idPenanganan`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`idPenanganan`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`idSpesialisasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  MODIFY `idPraktek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `idPenanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `idSpesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`idSpesialisasi`) REFERENCES `spesialisasi` (`idSpesialisasi`);

--
-- Constraints for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  ADD CONSTRAINT `jadwalpraktek_ibfk_1` FOREIGN KEY (`idDokter`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `nomortelepon`
--
ALTER TABLE `nomortelepon`
  ADD CONSTRAINT `nomortelepon_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Constraints for table `pekerjaandokter`
--
ALTER TABLE `pekerjaandokter`
  ADD CONSTRAINT `pekerjaandokter_ibfk_1` FOREIGN KEY (`idPenanganan`) REFERENCES `penanganan` (`idPenanganan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

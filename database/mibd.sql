-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 08:33 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `idUser`, `idSpesialisasi`, `noRuangan`) VALUES
(1, 2, 1, '55555'),
(2, 6, 2, NULL),
(3, 7, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpraktek`
--

CREATE TABLE `jadwalpraktek` (
  `idPraktek` int(11) NOT NULL,
  `idDokter` int(11) NOT NULL,
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL,
  `hari` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalpraktek`
--

INSERT INTO `jadwalpraktek` (`idPraktek`, `idDokter`, `waktuMulai`, `waktuSelesai`, `hari`) VALUES
(2, 1, '10:00:00', '15:00:00', 1),
(3, 1, '10:00:00', '15:00:00', 2),
(4, 1, '15:00:00', '19:00:00', 3),
(5, 1, '16:00:00', '20:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nomortelepon`
--

CREATE TABLE `nomortelepon` (
  `idUser` int(11) DEFAULT NULL,
  `nomorTelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomortelepon`
--

INSERT INTO `nomortelepon` (`idUser`, `nomorTelp`) VALUES
(6, '086759123'),
(7, '1234123');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaandokter`
--

CREATE TABLE `pekerjaandokter` (
  `idDokter` int(11) NOT NULL,
  `idPasien` int(11) NOT NULL,
  `idPenanganan` int(11) NOT NULL,
  `waktuDaftar` date NOT NULL,
  `waktuTemu` date NOT NULL,
  `sudahBertemu` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaandokter`
--

INSERT INTO `pekerjaandokter` (`idDokter`, `idPasien`, `idPenanganan`, `waktuDaftar`, `waktuTemu`, `sudahBertemu`) VALUES
(1, 1, 3, '2018-05-07', '2018-05-07', 0),
(1, 1, 4, '2018-05-10', '2018-05-10', 1);

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
(3, 0, '00:00:00', '00:00:00', '0000-00-00', NULL, 0, NULL),
(4, 0, '12:02:55', '12:32:55', '2018-05-10', 'Pasien sudah sembuh sebelumnya terkena tifus', 0, '2018-05-10');

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
(2, 'Dokter Cinta'),
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
(5, 'UserTest', NULL, 'L', 1, 0, 'Root', 'Hahay', 'root'),
(6, 'Donald Trump', 78, 'L', 2, 1, 'Dtrump', 'Jln Kebayoran 20154', 'trump'),
(7, 'Megan Fox', 33, 'L', 2, 1, 'mfox', 'Jln Dursasana', 'fox');

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
  ADD UNIQUE KEY `idPenanganan_2` (`idPenanganan`),
  ADD KEY `idPenanganan` (`idPenanganan`),
  ADD KEY `idDokter` (`idDokter`),
  ADD KEY `idPasien` (`idPasien`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`idPenanganan`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`idSpesialisasi`),
  ADD UNIQUE KEY `namaSpesialisasi` (`namaSpesialisasi`);

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
  MODIFY `idDokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  MODIFY `idPraktek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `idPenanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `idSpesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `pekerjaandokter_ibfk_1` FOREIGN KEY (`idPenanganan`) REFERENCES `penanganan` (`idPenanganan`),
  ADD CONSTRAINT `pekerjaandokter_ibfk_2` FOREIGN KEY (`idDokter`) REFERENCES `dokter` (`idDokter`),
  ADD CONSTRAINT `pekerjaandokter_ibfk_3` FOREIGN KEY (`idPasien`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

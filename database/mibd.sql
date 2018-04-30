-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Apr 2018 pada 07.16
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Struktur dari tabel `jadwalpraktek`
--

CREATE TABLE `jadwalpraktek` (
  `idPraktek` int(11) NOT NULL,
  `idDokter` int(11) NOT NULL,
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL,
  `tanggal` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwalpraktek`
--

INSERT INTO `jadwalpraktek` (`idPraktek`, `idDokter`, `waktuMulai`, `waktuSelesai`, `tanggal`) VALUES
(2, 2, '07:00:00', '10:00:00', 1),
(3, 2, '15:00:00', '19:00:00', 2),
(4, 2, '10:00:00', '19:00:00', 3),
(5, 2, '10:00:00', '22:00:00', 4),
(6, 2, '17:00:00', '23:00:00', 5),
(7, 2, '11:00:00', '22:00:00', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomortelepon`
--

CREATE TABLE `nomortelepon` (
  `idUser` int(11) DEFAULT NULL,
  `nomorTelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaandokter`
--

CREATE TABLE `pekerjaandokter` (
  `idDokter` int(11) NOT NULL,
  `idPasien` int(11) NOT NULL,
  `idPenanganan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
--

CREATE TABLE `penanganan` (
  `idPenanganan` int(11) NOT NULL,
  `idDokter` int(11) NOT NULL,
  `idPasien` int(11) NOT NULL,
  `waktuMulai` time NOT NULL,
  `waktuSelesai` time NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `waktuPengubahan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penanganan`
--

INSERT INTO `penanganan` (`idPenanganan`, `idDokter`, `idPasien`, `waktuMulai`, `waktuSelesai`, `tanggal`, `catatan`, `isDeleted`, `waktuPengubahan`) VALUES
(1, 2, 1, '12:00:00', '12:30:00', '2018-04-05', 'Sakit Hati ga dapet pacar', 0, NULL),
(2, 2, 1, '13:00:00', '13:30:00', '2018-04-07', 'Tifus', 0, '2018-04-11'),
(3, 2, 1, '13:56:58', '00:00:00', '2018-04-27', 'Sehat Walfiat', 0, NULL),
(4, 2, 1, '13:58:05', '13:58:35', '0000-00-00', 'Ga Sehat Walfiat', 0, NULL),
(5, 2, 1, '14:01:15', '14:19:15', '0000-00-00', 'TIFUS MODAR SIAAAA', 0, NULL),
(6, 2, 1, '14:05:19', '14:23:19', '2018-04-27', 'BABIBUBA', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `idSpesialisasi` int(11) NOT NULL,
  `namaSpesialisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spesialisasi`
--

INSERT INTO `spesialisasi` (`idSpesialisasi`, `namaSpesialisasi`) VALUES
(1, 'Dokter Umum'),
(2, 'Telingat WIbu Tenggorokan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenisKelamin` varchar(2) NOT NULL,
  `priviledge` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `idSpesialisasi` int(11) DEFAULT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idUser`, `nama`, `umur`, `jenisKelamin`, `priviledge`, `isActive`, `username`, `tarif`, `alamat`, `idSpesialisasi`, `password`) VALUES
(1, 'Roxy', 16, 'P', 1, 1, 'Roxy', 0, 'Jln Jendral Sderman', NULL, 'Roxy'),
(2, 'Roy Kiyoshi', 25, 'L', 2, 1, 'RoyK', 50000, 'Jln kesalahan garam', 1, 'Royy'),
(3, 'admin', 22, 'L', 3, 1, 'admin', 0, 'jalan kurang sehat', NULL, 'admin'),
(4, 'Ferdi', NULL, 'L', 1, 0, 'Ferdiboy', 0, 'Kddff', NULL, 'test'),
(5, 'UserTest', NULL, 'L', 1, 0, 'Root', 0, 'Hahay', NULL, 'root'),
(6, 'Emilia', 25, 'P', 2, 1, 'emili', 0, 'Jln.Shibuya Arab', 2, 'mil');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`idPenanganan`),
  ADD KEY `idDokter` (`idDokter`),
  ADD KEY `idPasien` (`idPasien`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`idSpesialisasi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idSpesialisasi` (`idSpesialisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  MODIFY `idPraktek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `idPenanganan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `idSpesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwalpraktek`
--
ALTER TABLE `jadwalpraktek`
  ADD CONSTRAINT `jadwalpraktek_ibfk_1` FOREIGN KEY (`idDokter`) REFERENCES `users` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `nomortelepon`
--
ALTER TABLE `nomortelepon`
  ADD CONSTRAINT `nomortelepon_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `pekerjaandokter`
--
ALTER TABLE `pekerjaandokter`
  ADD CONSTRAINT `pekerjaandokter_ibfk_1` FOREIGN KEY (`idPenanganan`) REFERENCES `penanganan` (`idPenanganan`);

--
-- Ketidakleluasaan untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD CONSTRAINT `penanganan_ibfk_1` FOREIGN KEY (`idDokter`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `penanganan_ibfk_2` FOREIGN KEY (`idPasien`) REFERENCES `users` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idSpesialisasi`) REFERENCES `spesialisasi` (`idSpesialisasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

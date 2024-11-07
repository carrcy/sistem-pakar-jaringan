-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idmasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idmasalah`) VALUES
(9, 1),
(10, 2),
(11, 3),
(12, 4),
(13, 5),
(14, 6),
(15, 7),
(16, 8),
(17, 9),
(18, 10),
(19, 11);

-- --------------------------------------------------------

--
-- Table structure for table `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`) VALUES
(9, 1),
(9, 2),
(10, 7),
(10, 4),
(10, 6),
(11, 10),
(11, 11),
(12, 12),
(12, 14),
(13, 15),
(13, 16),
(14, 17),
(15, 18),
(16, 23),
(17, 19),
(17, 20),
(18, 21),
(19, 22);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`idkonsultasi`, `idgejala`) VALUES
(21, 23),
(21, 10),
(22, 10),
(22, 7),
(22, 4),
(23, 23),
(23, 19),
(23, 7),
(23, 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_masalah`
--

CREATE TABLE `detail_masalah` (
  `idkonsultasi` int(11) NOT NULL,
  `idmasalah` int(11) NOT NULL,
  `persentase` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_masalah`
--

INSERT INTO `detail_masalah` (`idkonsultasi`, `idmasalah`, `persentase`) VALUES
(21, 3, 50.00),
(21, 8, 100.00),
(22, 2, 66.67),
(22, 3, 50.00),
(23, 2, 66.67),
(23, 8, 100.00),
(23, 9, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `nmgejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`idgejala`, `nmgejala`) VALUES
(1, 'Lampu indikator router tidak menyala'),
(2, 'Perangkat tidak dapat mengakses router'),
(4, 'Kecepatan internet lebih lambat dari biasanya'),
(6, 'Tidak ada perangkat yang mengunduh file besar'),
(7, 'Hanya terjadi pada wiffi (tidak pada perangkat kabel)'),
(10, 'Ada pesan kesalahan pada ip confiq'),
(11, 'Tidak bisa mendapat ip pada router'),
(12, 'Tidak bisa melakukan ping pada perangkat lain di jaringan'),
(14, 'Tidak bisa mengakses perangkat tertentu seperti printer'),
(15, 'Koneksi terputus secara acak tanpa pola tertentu'),
(16, 'Router terlalu jauh dari perangkat'),
(17, 'lampu indikator tidak menyala ketika router dinyalakan'),
(18, 'Tidak bisa menemukan printer atau perangkat lain yang terhubung ke jaringan'),
(19, 'Aktifitas jaringan meningkat secara tiba-tiba'),
(20, 'Koneksi melambat tanpa sebab'),
(21, 'Beberapa situs web tidak bisa terakses tetapi situs lainya normal'),
(22, 'Tidak bisa terhubung ke vpn meski koneksi internet normal'),
(23, 'Ada perangkat tidak dikenal terhubung ke jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kosultasi`
--

CREATE TABLE `kosultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kosultasi`
--

INSERT INTO `kosultasi` (`idkonsultasi`, `tanggal`, `iduser`) VALUES
(21, '2024-09-30', 2),
(22, '2024-09-30', 4),
(23, '2024-09-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `masalah`
--

CREATE TABLE `masalah` (
  `idmasalah` int(4) NOT NULL,
  `nmmasalah` varchar(200) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masalah`
--

INSERT INTO `masalah` (`idmasalah`, `nmmasalah`, `solusi`) VALUES
(1, 'Tidak Ada Koneksi Internet', 'Cek daya dan koneksi router  '),
(2, 'Koneksi Internet Lambat', 'Cek kekuatan wiffi dan posisi router, pindahkan router ke tempat terbuka atau berdekatan dengan perangkat'),
(3, 'IP confiq', 'restart router atau atur ulang alamat ip'),
(4, 'Tidak bisa melakukan ping', 'cek pengaturan firewall yang mungkin memblokir jaringan dan pastikan perangkat di jaringan yang sama'),
(5, 'Terputusnya secara acak', 'pindahkan router lebih dekat dengan perangkat yang bermasalah dan periksa kemungkinan interfarensi sinyal dari perangkat lain'),
(6, 'Lampu indikator router tidak menyala', 'periksa kabel daya dan restart router atau mereset ke pengaturan pabrik'),
(7, 'Tidak bisa mengakses printer atau perangkat jaringan lainnya', 'cek apakah perangkat printer di jaringan yang sama dan pastikan printer di mode aktif'),
(8, 'Munculnya perangkat tidak di kenal di jaringan', 'ubah kata sandi wiffi dan pastikan router menggunakan endkripsi wpa2 atau wpa3'),
(9, 'Trafik jaringan yang mencurigakan', 'cek perangkat yang terhubung jaringan dan gunakan firewall untuk memblokir akses yang mencurigakan'),
(10, 'Tidak dapat mengakses situs web tertentu', 'cek pengaturan dns di router dan ubah ke dns public seperti google dns'),
(11, 'Gagal terhubung ke vpn', 'cek pengaturan firewall atau router yang memblokir port yang diperlukan dan pastikan vpn menggunkan protokol yang diizinkan oleh router');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Rafid Pratama', 'tama', 'tama123', 'admin'),
(2, 'Rijal Mahmud Alfaruq', 'rijal', 'rijal123', 'user'),
(3, 'Salman', 'salman', 'salman2005', 'user'),
(4, 'Jauharul umam', 'umam', 'umam123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`),
  ADD KEY `idmasalah` (`idmasalah`);

--
-- Indexes for table `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD KEY `idaturan` (`idaturan`),
  ADD KEY `idgejala` (`idgejala`);

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD KEY `idgejala` (`idgejala`),
  ADD KEY `idkonsultasi` (`idkonsultasi`);

--
-- Indexes for table `detail_masalah`
--
ALTER TABLE `detail_masalah`
  ADD KEY `idmasalah` (`idmasalah`),
  ADD KEY `idkonsultasi` (`idkonsultasi`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `kosultasi`
--
ALTER TABLE `kosultasi`
  ADD PRIMARY KEY (`idkonsultasi`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `masalah`
--
ALTER TABLE `masalah`
  ADD PRIMARY KEY (`idmasalah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kosultasi`
--
ALTER TABLE `kosultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `idmasalah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD CONSTRAINT `basis_aturan_ibfk_1` FOREIGN KEY (`idmasalah`) REFERENCES `masalah` (`idmasalah`);

--
-- Constraints for table `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD CONSTRAINT `detail_basis_aturan_ibfk_1` FOREIGN KEY (`idaturan`) REFERENCES `basis_aturan` (`idaturan`),
  ADD CONSTRAINT `detail_basis_aturan_ibfk_2` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`);

--
-- Constraints for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `detail_konsultasi_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`),
  ADD CONSTRAINT `detail_konsultasi_ibfk_2` FOREIGN KEY (`idkonsultasi`) REFERENCES `kosultasi` (`idkonsultasi`);

--
-- Constraints for table `detail_masalah`
--
ALTER TABLE `detail_masalah`
  ADD CONSTRAINT `detail_masalah_ibfk_1` FOREIGN KEY (`idkonsultasi`) REFERENCES `kosultasi` (`idkonsultasi`),
  ADD CONSTRAINT `detail_masalah_ibfk_2` FOREIGN KEY (`idmasalah`) REFERENCES `masalah` (`idmasalah`),
  ADD CONSTRAINT `detail_masalah_ibfk_3` FOREIGN KEY (`idkonsultasi`) REFERENCES `detail_konsultasi` (`idkonsultasi`);

--
-- Constraints for table `kosultasi`
--
ALTER TABLE `kosultasi`
  ADD CONSTRAINT `kosultasi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

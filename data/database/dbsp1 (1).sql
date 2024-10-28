-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 01:14 PM
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
(6, 1),
(7, 2),
(8, 3);

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
(6, 6),
(6, 2),
(6, 4),
(6, 1),
(6, 7),
(7, 10),
(7, 16),
(8, 15),
(8, 11),
(8, 12),
(8, 14);

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
(19, 14),
(19, 6),
(19, 2),
(19, 10),
(19, 11),
(20, 2),
(20, 10),
(20, 11);

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
(19, 1, 40.00),
(19, 2, 50.00),
(19, 3, 50.00),
(20, 1, 20.00),
(20, 2, 50.00),
(20, 3, 25.00);

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
(1, 'Tidak Ada Koneksi Internet'),
(2, 'Koneksi Internet Lambat'),
(4, 'Terputusnya Koneksi Secara Acak'),
(6, 'IP Config'),
(7, 'Tidak Bisa Melakukan Ping'),
(10, 'Lampu Indikator Router Tidak Menyala'),
(11, 'Munculnya Perangkat Tidak Dikenal di Jaringan'),
(12, 'Tidak Dapat Mengakses Situs Web Tertentu'),
(14, 'Gagal Terhubung ke VPN'),
(15, 'Trafik Jaringan yang Mencurigakan'),
(16, 'Tidak Bisa Mengakses Printer atau Perangkat Jaringan Lainnya');

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
(19, '2024-09-23', 2),
(20, '2024-09-23', 2);

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
(1, 'Network Connection (Koneksi Jaringan)', '1. Cek kabel daya dan koneksi router  2. Restart router atau modem'),
(2, 'Router Configuration (Konfigurasi Router)', '1. Cek kekuatan sinyal Wi-Fi dan posisi router   2. Pindahkan router ke tempat yang lebih terbuka atau dekatkan perangkat'),
(3, 'Network Security (Keamanan Jaringan)', '1. Ubah kata sandi Wi-Fi segera 2. Pastikan router menggunakan enkripsi WPA2 atau WPA3'),
(4, 'Konflik IP yang mempengaruhi koneksi internet dan ', 'Periksa sambungan daya dan pengaturan IP.'),
(5, 'Masalah router yang mempengaruhi koneksi internet dan jaringan tamu.', 'Periksa fungsi router dan konfigurasi jaringan tamu.'),
(6, 'Masalah konektivitas router yang mempengaruhi semua fungsi.', 'Periksa pengaturan router dan perangkat yang terhubung.'),
(7, 'Masalah daya pada router yang mempengaruhi semua konektivitas.', 'Periksa sambungan daya dan perangkat keras router.'),
(8, 'Masalah daya atau kerusakan router yang menyebabkan konflik IP dan tidak ada koneksi.', 'Periksa sambungan daya dan pengaturan IP.'),
(9, 'Konflik IP yang mempengaruhi konektivitas dan pengaturan jaringan tamu.', 'Periksa pengaturan IP dan jaringan tamu.'),
(10, 'Konflik IP dan masalah dengan pengaturan jaringan yang mempengaruhi perangkat lain.', 'Periksa pengaturan IP dan perangkat yang terhubung.'),
(11, 'Konflik IP dan masalah jaringan tamu yang mempengaruhi akses ke perangkat.', 'Periksa pengaturan IP dan konfigurasi jaringan tamu.'),
(12, 'Masalah daya pada router yang menyebabkan konflik IP dan akses perangkat.', 'Periksa sambungan daya dan pengaturan IP.'),
(13, 'Masalah dengan konfigurasi router yang mempengaruhi semua konektivitas.', 'Periksa pengaturan router dan perangkat yang terhubung.'),
(14, 'Masalah daya atau kerusakan router yang mempengaruhi konektivitas.', 'Periksa sambungan daya dan pengaturan router.'),
(15, 'Masalah daya pada router yang mempengaruhi konektivitas dan akses perangkat.', 'Periksa sambungan daya dan pengaturan router.'),
(16, 'Masalah dengan router yang mempengaruhi jaringan tamu dan perangkat lainnya.', 'Periksa sambungan daya dan pengaturan jaringan tamu.'),
(17, 'Masalah daya pada router yang mempengaruhi konektivitas dan akses ke perangkat.', 'Periksa sambungan daya dan fungsi router.');

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
(2, 'Rijal Mahmud Alfaruq', 'rijal', 'rijal123', 'user');

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
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kosultasi`
--
ALTER TABLE `kosultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `masalah`
--
ALTER TABLE `masalah`
  MODIFY `idmasalah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2024 pada 11.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsistempakar1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idmasalah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `basis_aturan`
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
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_basis_aturan`
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
(19, 22),
(11, 1),
(11, 2),
(13, 7),
(13, 4),
(13, 6),
(15, 12),
(15, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_konsultasi`
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
(23, 4),
(24, 23),
(24, 10),
(24, 15),
(24, 1),
(25, 12),
(25, 11),
(25, 18),
(25, 14),
(25, 22),
(26, 23),
(26, 10),
(26, 19),
(26, 21),
(26, 7),
(26, 4),
(26, 20),
(26, 15),
(26, 1),
(26, 17),
(26, 2),
(26, 16),
(26, 6),
(26, 12),
(26, 11),
(26, 18),
(26, 14),
(26, 22),
(27, 4),
(27, 20),
(28, 23),
(28, 10),
(29, 1),
(30, 1),
(30, 2),
(31, 23),
(31, 10),
(31, 19),
(31, 21),
(31, 7),
(31, 4),
(31, 20),
(31, 15),
(31, 1),
(31, 17),
(31, 2),
(31, 16),
(31, 6),
(31, 12),
(31, 11),
(31, 18),
(31, 14),
(31, 22),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 17),
(35, 4),
(35, 2),
(36, 19),
(36, 21),
(36, 7),
(37, 1),
(37, 2),
(38, 1),
(38, 17),
(39, 4),
(39, 2),
(40, 4),
(40, 20),
(41, 21),
(41, 4),
(42, 19),
(42, 6),
(43, 7),
(43, 16),
(44, 10),
(44, 16),
(45, 10),
(45, 22),
(46, 12),
(46, 11),
(47, 12),
(47, 18),
(48, 18),
(48, 14),
(49, 15),
(49, 16),
(50, 19),
(50, 16),
(51, 23),
(51, 17),
(52, 23),
(52, 19),
(53, 19),
(53, 20),
(54, 21),
(54, 20),
(55, 21),
(55, 22),
(56, 15),
(56, 22),
(57, 15),
(58, 22),
(59, 1),
(59, 17),
(60, 2),
(60, 12),
(60, 11),
(60, 18),
(60, 14),
(60, 22),
(61, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_masalah`
--

CREATE TABLE `detail_masalah` (
  `idkonsultasi` int(11) NOT NULL,
  `idmasalah` int(11) NOT NULL,
  `persentase` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_masalah`
--

INSERT INTO `detail_masalah` (`idkonsultasi`, `idmasalah`, `persentase`) VALUES
(21, 3, 50.00),
(21, 8, 100.00),
(22, 2, 66.67),
(22, 3, 50.00),
(23, 2, 66.67),
(23, 8, 100.00),
(23, 9, 50.00),
(24, 1, 50.00),
(24, 3, 50.00),
(24, 5, 50.00),
(24, 8, 100.00),
(25, 3, 50.00),
(25, 4, 100.00),
(25, 7, 100.00),
(25, 11, 100.00),
(26, 1, 100.00),
(26, 2, 100.00),
(26, 3, 100.00),
(26, 4, 100.00),
(26, 5, 100.00),
(26, 6, 100.00),
(26, 7, 100.00),
(26, 8, 100.00),
(26, 9, 100.00),
(26, 10, 100.00),
(26, 11, 100.00),
(27, 2, 33.33),
(27, 9, 50.00),
(28, 3, 50.00),
(28, 8, 100.00),
(29, 1, 50.00),
(30, 1, 100.00),
(31, 1, 100.00),
(31, 2, 100.00),
(31, 3, 100.00),
(31, 4, 100.00),
(31, 5, 100.00),
(31, 6, 100.00),
(31, 7, 100.00),
(31, 8, 100.00),
(31, 9, 100.00),
(31, 10, 100.00),
(31, 11, 100.00),
(32, 1, 100.00),
(32, 3, 50.00),
(33, 1, 100.00),
(33, 3, 50.00),
(34, 1, 50.00),
(34, 3, 25.00),
(34, 6, 100.00),
(35, 1, 50.00),
(35, 2, 33.33),
(35, 3, 25.00),
(35, 5, 20.00),
(36, 2, 33.33),
(36, 5, 20.00),
(36, 9, 50.00),
(36, 10, 100.00),
(37, 1, 100.00),
(37, 3, 50.00),
(38, 1, 50.00),
(38, 3, 25.00),
(38, 6, 100.00),
(39, 1, 50.00),
(39, 2, 33.33),
(39, 3, 25.00),
(39, 5, 20.00),
(40, 2, 33.33),
(40, 5, 20.00),
(40, 9, 50.00),
(41, 2, 33.33),
(41, 5, 20.00),
(41, 10, 100.00),
(42, 2, 33.33),
(42, 5, 20.00),
(42, 9, 50.00),
(43, 2, 33.33),
(43, 5, 40.00),
(44, 3, 25.00),
(44, 5, 20.00),
(45, 3, 25.00),
(45, 11, 100.00),
(46, 3, 25.00),
(46, 4, 50.00),
(46, 7, 33.33),
(47, 4, 50.00),
(47, 7, 66.67),
(48, 4, 50.00),
(48, 7, 66.67),
(49, 5, 40.00),
(50, 5, 20.00),
(50, 9, 50.00),
(51, 6, 100.00),
(51, 8, 100.00),
(52, 8, 100.00),
(52, 9, 50.00),
(53, 9, 100.00),
(54, 9, 50.00),
(54, 10, 100.00),
(55, 10, 100.00),
(55, 11, 100.00),
(56, 5, 20.00),
(56, 11, 100.00),
(57, 5, 20.00),
(58, 11, 100.00),
(59, 1, 50.00),
(59, 3, 25.00),
(59, 6, 100.00),
(60, 1, 50.00),
(60, 3, 50.00),
(60, 4, 100.00),
(60, 7, 100.00),
(60, 11, 100.00),
(61, 11, 100.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int(11) NOT NULL,
  `nmgejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
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
-- Struktur dari tabel `kosultasi`
--

CREATE TABLE `kosultasi` (
  `idkonsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kosultasi`
--

INSERT INTO `kosultasi` (`idkonsultasi`, `tanggal`, `iduser`) VALUES
(21, '2024-09-30', 2),
(22, '2024-09-30', 4),
(23, '2024-09-30', 4),
(24, '2024-11-07', 4),
(25, '2024-11-07', 4),
(26, '2024-11-07', 4),
(27, '2024-11-07', 4),
(28, '2024-11-08', 4),
(29, '2024-11-11', 4),
(30, '2024-11-11', 4),
(31, '2024-11-11', 4),
(32, '2024-11-11', 4),
(33, '2024-11-11', 4),
(34, '2024-11-11', 6),
(35, '2024-11-11', 6),
(36, '2024-11-11', 6),
(37, '2024-11-11', 7),
(38, '2024-11-11', 7),
(39, '2024-11-11', 7),
(40, '2024-11-11', 7),
(41, '2024-11-11', 7),
(42, '2024-11-11', 7),
(43, '2024-11-11', 7),
(44, '2024-11-11', 7),
(45, '2024-11-11', 7),
(46, '2024-11-11', 7),
(47, '2024-11-11', 7),
(48, '2024-11-11', 7),
(49, '2024-11-11', 7),
(50, '2024-11-11', 7),
(51, '2024-11-11', 7),
(52, '2024-11-11', 7),
(53, '2024-11-11', 7),
(54, '2024-11-11', 7),
(55, '2024-11-11', 7),
(56, '2024-11-11', 7),
(57, '2024-11-12', 4),
(58, '2024-11-12', 4),
(59, '2024-11-12', 4),
(60, '2024-11-16', 4),
(61, '2024-11-16', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masalah`
--

CREATE TABLE `masalah` (
  `idmasalah` int(4) NOT NULL,
  `nmmasalah` varchar(200) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masalah`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Rafid Pratama', 'tama', 'tama123', 'admin'),
(2, 'Rijal Mahmud Alfaruq', 'rijal', 'rijal123', 'user'),
(3, 'Salman', 'salman', 'salman2005', 'user'),
(4, 'Jauharul umam', 'umam', '123', 'user'),
(5, 'admin', 'admin', '123', 'admin'),
(6, 'rafid', 'rafid', '123', 'user'),
(7, 'abc', 'abc', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`),
  ADD KEY `idmasalah` (`idmasalah`);

--
-- Indeks untuk tabel `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD KEY `idaturan` (`idaturan`),
  ADD KEY `idgejala` (`idgejala`);

--
-- Indeks untuk tabel `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD KEY `idgejala` (`idgejala`),
  ADD KEY `idkonsultasi` (`idkonsultasi`);

--
-- Indeks untuk tabel `detail_masalah`
--
ALTER TABLE `detail_masalah`
  ADD KEY `idmasalah` (`idmasalah`),
  ADD KEY `idkonsultasi` (`idkonsultasi`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `kosultasi`
--
ALTER TABLE `kosultasi`
  ADD PRIMARY KEY (`idkonsultasi`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `masalah`
--
ALTER TABLE `masalah`
  ADD PRIMARY KEY (`idmasalah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kosultasi`
--
ALTER TABLE `kosultasi`
  MODIFY `idkonsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `masalah`
--
ALTER TABLE `masalah`
  MODIFY `idmasalah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD CONSTRAINT `basis_aturan_ibfk_1` FOREIGN KEY (`idmasalah`) REFERENCES `masalah` (`idmasalah`);

--
-- Ketidakleluasaan untuk tabel `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD CONSTRAINT `detail_basis_aturan_ibfk_1` FOREIGN KEY (`idaturan`) REFERENCES `basis_aturan` (`idaturan`),
  ADD CONSTRAINT `detail_basis_aturan_ibfk_2` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`);

--
-- Ketidakleluasaan untuk tabel `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `detail_konsultasi_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`),
  ADD CONSTRAINT `detail_konsultasi_ibfk_2` FOREIGN KEY (`idkonsultasi`) REFERENCES `kosultasi` (`idkonsultasi`);

--
-- Ketidakleluasaan untuk tabel `detail_masalah`
--
ALTER TABLE `detail_masalah`
  ADD CONSTRAINT `detail_masalah_ibfk_1` FOREIGN KEY (`idkonsultasi`) REFERENCES `kosultasi` (`idkonsultasi`),
  ADD CONSTRAINT `detail_masalah_ibfk_2` FOREIGN KEY (`idmasalah`) REFERENCES `masalah` (`idmasalah`),
  ADD CONSTRAINT `detail_masalah_ibfk_3` FOREIGN KEY (`idkonsultasi`) REFERENCES `detail_konsultasi` (`idkonsultasi`);

--
-- Ketidakleluasaan untuk tabel `kosultasi`
--
ALTER TABLE `kosultasi`
  ADD CONSTRAINT `kosultasi_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

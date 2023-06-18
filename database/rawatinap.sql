
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 07.14
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawatinap`
--

CREATE TABLE `rawatinap` (
  `id_rawatinap` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `tanggal_rawatinap` date NOT NULL,
  `no_reg` varchar(50) NOT NULL,
  `perawatan` varchar(20) NOT NULL,
  `jumlah_perawatan` int(11) NOT NULL,
  `biaya_radiologi` int(11) NOT NULL,
  `biaya_labor` int(11) NOT NULL,
  `biaya_ekg` int(11) NOT NULL,
  `biaya_bdrs` int(11) NOT NULL,
  `jumlah_tindakan` int(11) NOT NULL,
  `total_pendapatan` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawatinap`
--

INSERT INTO `rawatinap` (`id_rawatinap`, `id_pasien`, `id_unit`, `tanggal_rawatinap`, `no_reg`, `perawatan`, `jumlah_perawatan`, `biaya_radiologi`, `biaya_labor`, `biaya_ekg`, `biaya_bdrs`, `jumlah_tindakan`, `total_pendapatan`, `date_created`) VALUES
(9, 7, 3, '2023-06-06', '123123', 'Kelas III', 123453, 50000, 10000, 500000, 15000, 700000, 1398453, 1686010153);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rawatinap`
--
ALTER TABLE `rawatinap`
  ADD PRIMARY KEY (`id_rawatinap`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rawatinap`
--
ALTER TABLE `rawatinap`
  MODIFY `id_rawatinap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

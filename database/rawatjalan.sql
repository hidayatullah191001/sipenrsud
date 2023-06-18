
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 07.12
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
-- Struktur dari tabel `rawatjalan`
--

CREATE TABLE `rawatjalan` (
  `id_rawatjalan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tanggal_rawatjalan` date NOT NULL,
  `rontgen` int(11) NOT NULL,
  `dr` int(11) NOT NULL,
  `labor` int(11) NOT NULL,
  `kiur` int(11) NOT NULL,
  `dr1` int(11) NOT NULL,
  `pbedah` int(11) NOT NULL,
  `dr2` int(11) NOT NULL,
  `pgigi` int(11) NOT NULL,
  `dr3` int(11) NOT NULL,
  `igd` int(11) NOT NULL,
  `karcis` int(11) NOT NULL,
  `dr4` int(11) NOT NULL,
  `pkb` int(11) NOT NULL,
  `dr5` int(11) NOT NULL,
  `ptht` int(11) NOT NULL,
  `dr6` int(11) NOT NULL,
  `pmata` int(11) NOT NULL,
  `dr7` int(11) NOT NULL,
  `fisio` int(11) NOT NULL,
  `dr8` int(11) NOT NULL,
  `panak` int(11) NOT NULL,
  `dr9` int(11) NOT NULL,
  `hemodia` int(11) NOT NULL,
  `dr10` int(11) NOT NULL,
  `pimu` int(11) NOT NULL,
  `pvct` int(11) NOT NULL,
  `visum` int(11) NOT NULL,
  `asuransi` int(11) NOT NULL,
  `drpparu` int(11) NOT NULL,
  `drpsaraf` int(11) NOT NULL,
  `pdalam` int(11) NOT NULL,
  `dr11` int(11) NOT NULL,
  `psikolog` int(11) NOT NULL,
  `drkulit` int(11) NOT NULL,
  `ambulance` int(11) NOT NULL,
  `jumlah_rawatjalan` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawatjalan`
--

INSERT INTO `rawatjalan` (`id_rawatjalan`, `id_pasien`, `tanggal_rawatjalan`, `rontgen`, `dr`, `labor`, `kiur`, `dr1`, `pbedah`, `dr2`, `pgigi`, `dr3`, `igd`, `karcis`, `dr4`, `pkb`, `dr5`, `ptht`, `dr6`, `pmata`, `dr7`, `fisio`, `dr8`, `panak`, `dr9`, `hemodia`, `dr10`, `pimu`, `pvct`, `visum`, `asuransi`, `drpparu`, `drpsaraf`, `pdalam`, `dr11`, `psikolog`, `drkulit`, `ambulance`, `jumlah_rawatjalan`, `date_created`) VALUES
(4, 5, '2023-06-07', 1, 11, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 45, 1686017577);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rawatjalan`
--
ALTER TABLE `rawatjalan`
  ADD PRIMARY KEY (`id_rawatjalan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rawatjalan`
--
ALTER TABLE `rawatjalan`
  MODIFY `id_rawatjalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

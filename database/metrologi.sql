-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2025 pada 15.52
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
-- Database: `metrologi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `massa`
--

CREATE TABLE `massa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `timbangan` varchar(200) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `seri` varchar(200) NOT NULL,
  `kapasitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `massa`
--

INSERT INTO `massa` (`id`, `nama`, `alamat`, `telp`, `timbangan`, `merk`, `model`, `seri`, `kapasitas`) VALUES
(3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 1),
(4, '10000', '1', '1', '1', '1', '1', '1', 1),
(5, '1', '1', '1', '1', '1', '1', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `massa`
--
ALTER TABLE `massa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `massa`
--
ALTER TABLE `massa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

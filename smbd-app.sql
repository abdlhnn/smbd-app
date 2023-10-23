-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2023 pada 05.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smbd-app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$m1Y2AdW5ecGjJ90ohfvVfu5Dwn5xpa/fmDzYg3VGTABr60IM.fwR2', '2023-04-28 07:22:09', '2023-10-21 05:23:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(7) NOT NULL,
  `gas` float(5,2) DEFAULT NULL,
  `suhu_lingkungan` float(4,2) DEFAULT NULL,
  `warna_buah_id` int(3) DEFAULT NULL,
  `kelayakan` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `gas`, `suhu_lingkungan`, `warna_buah_id`, `kelayakan`, `created_at`, `updated_at`) VALUES
(1, 2.00, 2.00, 1, 1, '2023-10-20 15:36:21', '2023-10-20 15:36:21'),
(2, 2.00, 2.00, 1, 1, '2023-10-20 15:36:21', '2023-10-20 15:36:21'),
(3, 2.00, 2.00, 1, 1, '2023-10-20 15:36:21', '2023-10-20 15:36:21'),
(14, 2.00, 2.00, 1, 1, '2023-10-20 15:36:21', '2023-10-20 15:36:21'),
(15, 2.00, 2.00, 3, 0, '2023-10-20 15:36:21', '2023-10-20 15:36:21'),
(16, 6.00, 6.00, 3, 0, '2023-10-20 15:36:21', '2023-10-21 07:45:59'),
(17, 6.00, 6.00, 3, 0, '2023-10-20 15:36:21', '2023-10-20 15:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna_buah`
--

CREATE TABLE `warna_buah` (
  `id` int(3) NOT NULL,
  `warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warna_buah`
--

INSERT INTO `warna_buah` (`id`, `warna`) VALUES
(1, 'hijau'),
(2, 'kuning'),
(3, 'kuning kehitaman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warna_buah` (`warna_buah_id`) USING BTREE;

--
-- Indeks untuk tabel `warna_buah`
--
ALTER TABLE `warna_buah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `warna_buah`
--
ALTER TABLE `warna_buah`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`warna_buah_id`) REFERENCES `warna_buah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

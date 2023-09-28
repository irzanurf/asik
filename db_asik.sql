-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2023 pada 09.18
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime DEFAULT NULL,
  `id_user` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id`, `id_kendaraan`, `checkin`, `checkout`, `id_user`, `status`) VALUES
(1, 1, '2023-07-29 17:14:27', '2023-07-30 10:26:41', 'user', '1'),
(3, 3, '2023-07-29 18:44:02', '2023-07-30 04:50:53', 'user', '1'),
(4, 4, '2023-07-30 06:52:05', '2023-07-30 06:52:55', 'user', '1'),
(5, 5, '2023-07-30 06:54:43', '2023-07-30 07:01:20', 'user', '1'),
(6, 1, '2023-07-30 07:01:30', NULL, 'user', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fakultas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `username`, `fakultas`) VALUES
(1, 'undip', 'Universitas Diponegoro (Umum)'),
(2, 'fisip', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(3, 'kedokteran', 'Fakultas Kedokteran'),
(4, 'feb', 'Fakultas Ekonomika dan Bisnis'),
(5, 'hukum', 'Fakultas Hukum'),
(6, 'fpik', 'Fakultas Perikanan dan Ilmu Kelautan'),
(7, 'psikologi', 'Fakultas Psikologi'),
(8, 'fpp', 'Fakultas Peternakan dan Pertanian'),
(9, 'fib', 'Fakultas Ilmu Budaya'),
(10, 'fkm', 'Fakultas Kesehatan Masyarakat'),
(11, 'fsm', 'Fakultas Sains dan Matematika'),
(12, 'vokasi', 'Sekolah Vokasi'),
(13, 'pascasarjana', 'Pasca Sarjana'),
(14, 'teknik', 'Fakultas Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id` int(11) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `jenis` varchar(2) NOT NULL,
  `fakultas` int(11) NOT NULL,
  `qr` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id`, `identitas`, `jenis`, `fakultas`, `qr`, `date`, `image`, `status`, `keterangan`) VALUES
(1, 'Alpha', '1', 1, '89b2045c25cd21fa755c2d4890cfc97b', '2023-07-29', NULL, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'H1920XG', '2', 1, '09cb86dcac972a91eccabe4755b860a8', '2023-07-29', NULL, 0, NULL),
(3, 'Beta', '1', 1, '9fce902802bc39b9cca9a2b9230500bf', '2023-08-01', NULL, 0, NULL),
(4, 'Cahrlie', '1', 3, 'f100a7c8ff3a6212b3eea9a501a7bca0', '2023-08-01', NULL, 0, NULL),
(5, 'Delta', '1', 7, '28d84123e3e2c62ee0ee3d03689268b6', '2023-08-01', NULL, 0, NULL),
(7, 'Echo', '1', 14, '5ee85723ece77e0dbfa294ac127c251f', '2023-08-02', NULL, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 'H1111XG', '2', 1, '3d8651ccacdd0343b19513ada46e86d8', '2023-08-02', NULL, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `id_fakultas` varchar(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profiles`
--

INSERT INTO `tb_profiles` (`id`, `id_user`, `nim`, `id_fakultas`, `nama`, `email`) VALUES
(1, 'user', '21060117130082', '1', 'User Dummy', 'user@gmail.com'),
(2, 'coba', 'coba', '1', 'coba', 'coba@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(3, 'teknik', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(4, 'coba', '1621a5dc746d5d19665ed742b2ef9736', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_profiles`
--
ALTER TABLE `tb_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

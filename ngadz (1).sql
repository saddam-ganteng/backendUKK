-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 20.00
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngadz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Keamanan', '2021-06-15 11:49:21', '2021-06-15 11:49:21'),
(2, 'Kesehatan', '2021-06-18 08:54:02', '2021-06-18 08:54:02'),
(8, 'Bencana Alam', '2021-07-05 16:53:47', '2021-07-05 16:53:47'),
(10, 'Covid', '2021-07-05 17:28:09', '2021-07-05 17:28:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id_laporan` bigint(20) UNSIGNED NOT NULL,
  `tgl_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id_laporan`, `tgl_laporan`, `nik`, `judul`, `isi_laporan`, `kategori`, `provinsi`, `kota`, `kecamatan`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Tuesday, 15th June 2021', 1, 'test', 'lorem lorem lorme lorem lorem lorme lorem lorem lorme test kebakaran', 'Keamanan', 'DKI Jakarta', 'Kota Depok', 'Tapos', 'selesai', '2021-06-15 12:21:46', '2021-06-15 12:46:03'),
(24, 'Friday, 18th June 2021', 2, 'test', 'lorem test lorem test lorem test lorem test lorem test', 'Kesehatan', 'Bali', 'Kota Denpasar', 'Denpasar Barat', 'selesai', '2021-06-18 13:52:34', '2021-07-05 17:30:18'),
(39, 'Friday, 18th June 2021', 311, 'test', 'asdasd asdasd awdqw eqwe asddas', 'Keamanan', 'Sulawesi', 'test', 'test', 'proses', '2021-06-18 17:41:44', '2021-06-18 17:41:44'),
(40, 'Friday, 18th June 2021', 2, 'kasbhdbka', 'skabdibasdnasdjoadsnasldk', 'Kesehatan', 'Aceh', 'Kabupaten Aceh Selatan', 'Trumon Timur', 'proses', '2021-06-18 23:48:10', '2021-06-18 23:48:10'),
(41, 'Sunday, 4th July 2021', 311, 'test', 'asdasd asdasd awdqw eqwe asddas', 'Keamanan', 'Sulawesi', 'test', 'test', 'proses', '2021-07-04 16:49:41', '2021-07-04 16:49:41'),
(42, 'Monday, 5th July 2021', 431, 'Kebakaran', 'test lorem lorem lorem lorem lorem', 'Covid', 'Bali', 'Kabupaten Bangli', 'Tembuku', 'selesai', '2021-07-05 14:07:53', '2021-07-05 16:55:07'),
(43, 'Monday, 5th July 2021', 431, 'asd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdv', 'Covid', 'Sumatera Barat', 'Kabupaten Pesisir Selatan', 'Basa Ampek Balai Tapan', 'proses', '2021-07-05 17:03:41', '2021-07-05 17:03:41'),
(44, 'Monday, 5th July 2021', 431, 'asdasdsa', 'asdasdasdasdasdasdasdasdasdasdasdasd', 'Covid', 'Sumatera Utara', 'Kabupaten Mandailing Natal', 'Ranto Baek', 'proses', '2021-07-05 17:05:30', '2021-07-05 17:05:30'),
(45, 'Monday, 5th July 2021', 433, 'ada covid', 'tolong ada virus covid 19', 'Covid', 'Dki Jakarta', 'Kota Jakarta Pusat', 'Tanah Abang', 'proses', '2021-07-05 17:35:19', '2021-07-05 17:35:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `nik` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`nik`, `nama`, `username`, `password`, `telp`, `token`, `image`, `created_at`, `updated_at`) VALUES
(430, 'saddam', 'dermadn', '$2y$10$OcIZ0ggchGRHpNuFc39Wr.vfjiqsN1EjbVg0wW2I28mxO31HTXWhy', 82198869, '07d12ff663d1f59333da9b838470bbb2bbc85f746dfbf24b8790249a2ee4c39a797368cd116ca464', '', '2021-06-15 11:47:21', '2021-06-16 13:57:42'),
(431, 'Dmare awn', 'jkl', '$2y$10$.Elf.aTFdr0vBb0JBdrETu.0QALv5zqBl4.msStAqtHwJuX67Cyki', 821955888, '30fbaa50d3be4c3e8b09b54f759c44e69d2df975769d9cf422b2e911c14e6bbc131c69432bd6ffea', 'avatar_431_bot.PNG', '2021-06-18 12:54:16', '2021-07-05 17:00:17'),
(432, 'tasd', 'tesad', '$2y$10$/CudyTE3FQi3TepskrTcou5Eh24amZJK1lkPHDGCnOL7LReWMyjIu', 23213, NULL, NULL, '2021-07-05 17:08:35', '2021-07-05 17:08:35'),
(433, 'ferry awn', 'fer', '$2y$10$woT/viGXZkM3Dx1vHPpqZuZ9ZWTpJwFInE6mzd/ynTeFRo25E.5s.', 445566, '796de5c240792a2926386e9795944486e9e224bf58f9cd9566233f5d06f9f9e238f469070388e33f', 'avatar_433_WhatsApp Image 2021-07-05 at 11.30.19.jpeg', '2021-07-05 17:34:16', '2021-07-05 17:36:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_19_173036_create_masyarakats_table', 1),
(2, '2021_03_20_122921_create_pengaduans_table', 1),
(3, '2021_03_25_025124_create_kategoris_table', 1),
(4, '2021_03_26_210255_create_petugass_table', 1),
(5, '2021_03_28_132207_create_tanggapans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugass`
--

CREATE TABLE `petugass` (
  `id_petugas` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugass`
--

INSERT INTO `petugass` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `token`, `level`, `image`, `created_at`, `updated_at`) VALUES
(2, 'saddam', 'asd', '$2y$10$ZXTFeUTgl7ZajBGgLewLZeceGEG5sDitgu3kNTMzXTYkoeExKpFvK', 821, '602b3bd690caf80d42870047f6397901ef23b24fd7945ebf96ae0d2acc9470794a2e1c7f9c558a8a', 'petugas', 'avatar_2_pas_foto.jpg', '2021-06-15 12:35:39', '2021-07-05 17:32:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapans`
--

CREATE TABLE `tanggapans` (
  `id_tanggapan` bigint(20) UNSIGNED NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `tgl_tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapans`
--

INSERT INTO `tanggapans` (`id_tanggapan`, `id_laporan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `nama_petugas`, `created_at`, `updated_at`) VALUES
(1, 23, 'Tuesday, 15th June 2021', 'oke nanti kami banti', 2, 'tesaf', '2021-06-15 12:45:20', '2021-06-15 12:45:20'),
(2, 42, 'Monday, 5th July 2021', 'oke saya akan kesana', 2, 'saddam', '2021-07-05 16:54:56', '2021-07-05 16:54:56'),
(3, 24, 'Monday, 5th July 2021', 'baik akan di laksanakan', 2, 'dermawan', '2021-07-05 17:29:58', '2021-07-05 17:29:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `masyarakats_username_unique` (`username`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugass`
--
ALTER TABLE `petugass`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id_laporan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `nik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `petugass`
--
ALTER TABLE `petugass`
  MODIFY `id_petugas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanggapans`
--
ALTER TABLE `tanggapans`
  MODIFY `id_tanggapan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

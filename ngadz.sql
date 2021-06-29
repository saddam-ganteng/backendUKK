-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 15.54
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
(2, 'Kesehatan', '2021-06-18 08:54:02', '2021-06-18 08:54:02');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id_laporan`, `tgl_laporan`, `nik`, `judul`, `isi_laporan`, `kategori`, `provinsi`, `kota`, `kecamatan`, `image`, `status`, `created_at`, `updated_at`) VALUES
(23, 'Tuesday, 15th June 2021', 1, 'test', 'lorem lorem lorme lorem lorem lorme lorem lorem lorme test kebakaran', 'Keamanan', 'DKI Jakarta', 'Kota Depok', 'Tapos', 'lorem lorem lorme lorem lorem lorme lorem lorem lorme test kebakaran', 'selesai', '2021-06-15 12:21:46', '2021-06-15 12:46:03'),
(24, 'Friday, 18th June 2021', 2, 'test', 'lorem test lorem test lorem test lorem test lorem test', 'Kesehatan', 'Bali', 'Kota Denpasar', 'Denpasar Barat', 'lorem test lorem test lorem test lorem test lorem test', 'proses', '2021-06-18 13:52:34', '2021-06-18 13:52:34'),
(39, 'Friday, 18th June 2021', 311, 'test', 'asdasd asdasd awdqw eqwe asddas', 'Keamanan', 'Sulawesi', 'test', 'test', 'foto_diri.png', 'proses', '2021-06-18 17:41:44', '2021-06-18 17:41:44'),
(40, 'Friday, 18th June 2021', 2, 'kasbhdbka', 'skabdibasdnasdjoadsnasldk', 'Kesehatan', 'Aceh', 'Kabupaten Aceh Selatan', 'Trumon Timur', 'skabdibasdnasdjoadsnasldk', 'proses', '2021-06-18 23:48:10', '2021-06-18 23:48:10');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`nik`, `nama`, `username`, `password`, `telp`, `token`, `created_at`, `updated_at`) VALUES
(1, 'saddam', 'dermadn', '$2y$10$OcIZ0ggchGRHpNuFc39Wr.vfjiqsN1EjbVg0wW2I28mxO31HTXWhy', 82198869, '07d12ff663d1f59333da9b838470bbb2bbc85f746dfbf24b8790249a2ee4c39a797368cd116ca464', '2021-06-15 11:47:21', '2021-06-16 13:57:42'),
(2, 'Dmare', 'jkl', '$2y$10$u/Cs4synjJAMvVWWeb5VpOtdXjA3eDFp9oxttOI2X1Q8m6z5EPXmu', 82111546, '0acde64216bf8aad1806376010fee4e113b1c0bd78659f07a2ebf8ade3205e9e98e6a741b5fd221d', '2021-06-18 12:54:16', '2021-06-19 02:12:23');

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
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugass`
--

INSERT INTO `petugass` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `token`, `level`, `image`, `created_at`, `updated_at`) VALUES
(2, 'wallkeyq', 'asd', '$2y$10$l6ILO8yEOJphTWYGbZ4G2eMss94WzjKtAVenblOQQwa96CIbSPKLe', 4645682, '1173888fb64b632f647d9660b63b4acd51b86f3827f0c257e10a7da4269da96a2b628f0eda1e7a29', 'petugas', '', '2021-06-15 12:35:39', '2021-06-18 13:52:59');

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
(1, 23, 'Tuesday, 15th June 2021', 'oke nanti kami banti', 2, 'tesaf', '2021-06-15 12:45:20', '2021-06-15 12:45:20');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id_laporan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  MODIFY `nik` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_tanggapan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

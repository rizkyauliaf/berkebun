-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 15 Nov 2022 pada 01.55
-- Versi server: 5.7.36
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berkebun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci,
  `gambar_artikel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `id_galeri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gambar_galeri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_02_112012_create_promo_table', 1),
(6, '2022_11_02_112336_create_galeri_table', 1),
(7, '2022_11_02_112416_create_artikel_table', 1),
(8, '2022_11_02_112458_create_status_table', 1),
(9, '2022_11_02_112539_create_paket_table', 1),
(10, '2022_11_02_112707_create_reservasi_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

DROP TABLE IF EXISTS `paket`;
CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_paket` text COLLATE utf8mb4_unicode_ci,
  `harga_weekday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_weekend` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_paket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `deskripsi_paket`, `harga_weekday`, `harga_weekend`, `gambar_paket`, `created_at`, `updated_at`) VALUES
(1, 'PAKET 1', 'PAKET1', '2000', '1500', NULL, NULL, NULL),
(2, 'PAKET 2', 'PAKET 2', '4000', '3500', NULL, NULL, NULL),
(3, 'PAKET 3', 'PAKET 3', '6000', '5500', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

DROP TABLE IF EXISTS `promo`;
CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_promo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_promo` text COLLATE utf8mb4_unicode_ci,
  `potongan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_promo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `deskripsi_promo`, `potongan`, `gambar_promo`, `created_at`, `updated_at`) VALUES
(1, 'promo nyeni', 'promo nyeni', '2000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

DROP TABLE IF EXISTS `reservasi`;
CREATE TABLE IF NOT EXISTS `reservasi` (
  `id_reservasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_promo` bigint(20) UNSIGNED DEFAULT NULL,
  `id_status` bigint(20) UNSIGNED DEFAULT NULL,
  `id_paket` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_pesan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci,
  `total_bayar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_reservasi`),
  KEY `reservasi_id_promo_foreign` (`id_promo`),
  KEY `reservasi_id_status_foreign` (`id_status`),
  KEY `reservasi_id_paket_foreign` (`id_paket`),
  KEY `reservasi_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_promo`, `id_status`, `id_paket`, `id_user`, `nama_pesan`, `tgl_pesan`, `jumlah_pesan`, `alasan`, `total_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 1, 'Lutfi Gans', '2022-11-14', 3, NULL, '4000', '2022-11-14 05:15:16', '2022-11-14 05:37:00'),
(2, 1, 4, 1, 1, 'tes', '2022-12-13', 5, NULL, '10000', NULL, NULL),
(3, 1, 4, 1, 1, 'tes', '2023-01-13', 5, NULL, '10000', NULL, NULL),
(4, 1, 4, 1, 1, 'tes', '2023-02-13', 5, NULL, '10000', NULL, NULL),
(5, 1, 4, 1, 1, 'tes', '2023-02-13', 5, NULL, '10000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Waiting', NULL, NULL),
(2, 'ACC', NULL, NULL),
(3, 'Cancel', NULL, NULL),
(4, 'Done', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','petugas','pengunjung') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `alamat`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pengunjung coba', 'California', '1999-01-01', 'L', '08237394738474', 'Pinggir Jalan Besar, Kota Malang', 'pengunjung@gmail.com', NULL, '$2y$10$w0H5Yzmqto/Xtjv2bekU7eHifZzUwsVIurokyZRMUTvgQ4TB.oDiq', 'pengunjung', NULL, '2022-11-14 05:06:30', '2022-11-14 05:06:30'),
(2, 'petugas', 'California', '1999-01-02', 'L', '08237394738474', 'Pinggir Jalan Besar, Kota Malangg', 'petugas@gmail.com', NULL, '$2y$10$MChhY8DPYXv46k1SDyNSJeDj9LPE2ukwQqDW1Asd/52OePZmrSNrC', 'petugas', NULL, '2022-11-14 05:06:30', '2022-11-14 18:38:59'),
(3, 'admin coba', 'California B', '1999-01-01', 'L', '08237394738474', 'Pinggir Jalan Besar, Kota Malang', 'admin@gmail.com', NULL, '$2y$10$VWww.p.3IwUk6lhSkuUaAuazEZ.cEwOjvmyLKjPLR0/VAD8iQg/g6', 'admin', NULL, '2022-11-14 05:06:30', '2022-11-14 05:06:30'),
(4, 'tes', 'kdr', '1999-08-12', 'L', '908', 'jnhb', 'a@gmail.com', NULL, '$2y$10$u5T4sayu/L2qYAYfM125W.4oMN.oUjzT25B3pxa0Nd7nyTqJeaz8u', 'admin', NULL, '2022-11-14 10:13:43', '2022-11-14 10:13:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2017 at 09:45 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emalalom_emala`
--

-- --------------------------------------------------------

--
-- Table structure for table `custombackends`
--

CREATE TABLE `custombackends` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_kiri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custombackends`
--

INSERT INTO `custombackends` (`id`, `foto`, `header`, `footer_kiri`, `versi`, `status`, `created_at`, `updated_at`) VALUES
(6, 'file-17-08-11-02-39-16.jpeg', 'E-MALA', '© Tim LPSE Kab. Lombok Tengah 2017', 'versi 1.0', 1, '2017-08-10 19:39:16', '2017-08-10 20:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `custom_header_frontends`
--

CREATE TABLE `custom_header_frontends` (
  `id` int(10) UNSIGNED NOT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_header_frontends`
--

INSERT INTO `custom_header_frontends` (`id`, `header`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(14, 'E-MALA LPSE LOMBOK', 'file-17-08-01-10-13-07.jpeg', 0, '2017-08-01 15:13:07', '2017-08-06 23:57:47'),
(16, 'E-MALA LPSE LOMBOK', 'file-17-08-07-07-51-08.png', 0, '2017-08-07 00:51:08', '2017-08-07 00:51:37'),
(18, 'Pusat Data Tangerang', 'file-17-08-07-03-40-33.png', 1, '2017-08-07 08:40:33', '2017-08-07 08:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tamu`
--

CREATE TABLE `daftar_tamu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebagai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panggilan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_tamu`
--

INSERT INTO `daftar_tamu` (`id`, `nama`, `sebagai`, `panggilan`, `nama_perusahaan`, `nama_admin`, `email`, `no_hp`, `alamat`, `tujuan`, `tanggal_kunjungan`, `created_at`, `updated_at`) VALUES
(1, 'asep dadan', 'Penyedia', 'Bapak', 'smc', 'asdan', 'dadanasep74@gmail.com', '08997344989', 'garut garut', 'ulin we hungkul', '2017-07-26', '2017-07-26 08:12:39', '2017-07-26 08:12:39'),
(2, 'asep dadan', 'Penyedia', 'Bapak', 'smc', 'asdan', 'dadanasep74@gmail.com', '08997344989', 'garut test', 'garut we', '2017-07-27', '2017-07-27 04:30:34', '2017-07-27 04:30:34'),
(3, 'taeste', 'Publik', 'Bapak', NULL, NULL, 'dadanasep74@gmail.com', '08997344989', 'test alamat', 'test tujuan', '2017-07-28', '2017-07-28 05:55:14', '2017-07-28 05:55:14'),
(4, 'publik', 'Publik', 'Ibu', NULL, NULL, 'dadanasep74@gmail.com', '08997344989', 'testtest', 'cek test', '2017-07-28', '2017-07-28 05:55:57', '2017-07-28 05:55:57'),
(5, 'test flash', 'Penyedia', 'Bapak', 'test', 'test', 'dadanasep7@gmai.com', '08997344989', 'test cek', 'test tujuan', '2017-07-28', '2017-07-28 05:58:01', '2017-07-28 05:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `home_gambars`
--

CREATE TABLE `home_gambars` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe_gambar` int(191) NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_gambars`
--

INSERT INTO `home_gambars` (`id`, `tipe_gambar`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(16, 1, 'file-1317-08-05-10-56-22.png', '1', '2017-08-05 03:56:22', '2017-08-05 21:35:03'),
(17, 2, 'file-617-08-05-10-56-22.png', '1', '2017-08-05 03:56:22', '2017-08-05 21:35:03'),
(18, 3, 'file-717-08-05-10-56-22.png', '1', '2017-08-05 03:56:22', '2017-08-05 21:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `keluhans`
--

CREATE TABLE `keluhans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pelapor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebagai` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluhans`
--

INSERT INTO `keluhans` (`id`, `nama_pelapor`, `no_telp`, `sebagai`, `isi_laporan`, `created_at`, `updated_at`) VALUES
(166, 'FORM KELUHAN PENGGUNA LPSE', '3434343434343', 'Pejabat', 'FORM KELUHAN PENGGUNA LPSE', '2017-08-03 02:05:58', '2017-08-03 02:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_photos`
--

CREATE TABLE `keluhan_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `keluhan_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2017_07_20_143324_table_pegawai_pengguna', 1),
(16, '2017_07_20_144331_table_daftar_tamu', 2),
(17, '2017_07_22_102600_create_keluhans_table', 3),
(20, '2017_07_28_125956_table_pelatihan', 5),
(21, '2017_07_26_154038_create_tentang_kamis_table', 6),
(22, '2017_07_29_155955_create_notifikasis_table', 7),
(23, '2017_07_30_042251_create_sessions_table', 8),
(26, '2017_07_30_063455_create_surveys_table', 9),
(28, '2017_07_31_152532_create_custom_header_frontends_table', 10),
(29, '2017_08_01_044012_create_template_emails_table', 11),
(33, '2017_08_03_080105_create_keluhan_photos_table', 12),
(34, '2017_08_03_113550_add_coloumn_template_email', 12),
(35, '2017_08_05_031018_add_coloumn_tentang_kami', 13),
(37, '2017_08_05_032345_create_home_gambars_table', 14),
(38, '2017_08_05_233332_add_table_soal_survey', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tabel` int(11) NOT NULL,
  `nama_tabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasis`
--

INSERT INTO `notifikasis` (`id`, `id_tabel`, `nama_tabel`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 'keluhans', 'ini isi laporan yang ingin memberi notifikasi', 0, '2017-07-29 09:08:52', '2017-07-29 09:08:52'),
(2, 13, 'keluhans', 'test hello apakah ada tidak', 0, '2017-07-29 09:11:23', '2017-07-29 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pengguna`
--

CREATE TABLE `pegawai_pengguna` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_berlaku` date NOT NULL,
  `file_sk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai_pengguna`
--

INSERT INTO `pegawai_pengguna` (`id`, `nama`, `nip`, `userId`, `alamat`, `no_telp`, `no_hp`, `email`, `golongan`, `pangkat`, `jabatan`, `no_sk`, `masa_berlaku`, `file_sk`, `created_at`, `updated_at`) VALUES
(1, 'asep dadan S.tr.Kom', '9298384893932329329859392', 'asdan15', 'garut jawa barat', '08997344989', '085861566756', 'dadanasep74@gmail.com', 'IV', '-', 'Direktur', '12.sk', '2017-07-25', 'file-17-07-25-03-54-58.pdf', '2017-07-25 08:54:58', '2017-07-25 08:54:58'),
(3, 'asdan dadan', '08997344989', 'asepdadan', 'garut jawabarat', '08997344989', '08997344989', 'dadanasep174@gmail.com', 'gol', 'gol', 'gol', 'gol', '2017-07-25', 'file-17-07-25-03-58-08.pdf', '2017-07-25 08:58:08', '2017-07-25 08:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pelatihan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = belum di verifikasi; 1 sudah di verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `id_pelatihan`, `nama`, `nama_perusahaan`, `alamat`, `no_hp`, `email`, `tanggal_pelatihan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'teste', 'teste', 'tesettest', '08997344989', 'dadanasepe74@gmail.com', '2017-07-31', 1, NULL, NULL),
(2, 1, 'Asep Dadan', 'Smc Codesign.com', 'surapati core', '089973449899', 'dadanasep74@gmail.com', '2017-07-31', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_surveys`
--

CREATE TABLE `penilaian_surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_soal` int(10) UNSIGNED NOT NULL,
  `id_pilihan` int(10) UNSIGNED NOT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian_surveys`
--

INSERT INTO `penilaian_surveys` (`id`, `id_soal`, `id_pilihan`, `saran`, `created_at`, `updated_at`) VALUES
(25, 1, 3, NULL, '2017-08-05 20:46:25', NULL),
(26, 2, 3, NULL, '2017-08-05 20:46:25', NULL),
(27, 3, 3, NULL, '2017-08-05 20:46:25', NULL),
(28, 4, 3, NULL, '2017-08-05 20:46:25', NULL),
(29, 1, 1, NULL, '2017-08-05 20:46:48', NULL),
(30, 2, 4, NULL, '2017-08-05 20:46:48', NULL),
(31, 3, 5, NULL, '2017-08-05 20:46:48', NULL),
(32, 4, 1, NULL, '2017-08-05 20:46:48', NULL),
(33, 1, 1, NULL, '2017-08-07 21:58:01', NULL),
(34, 2, 2, NULL, '2017-08-07 21:58:01', NULL),
(35, 3, 3, NULL, '2017-08-07 21:58:01', NULL),
(36, 4, 4, NULL, '2017-08-07 21:58:01', NULL),
(37, 1, 4, NULL, '2017-08-07 21:58:22', NULL),
(38, 2, 4, NULL, '2017-08-07 21:58:22', NULL),
(39, 3, 4, NULL, '2017-08-07 21:58:22', NULL),
(40, 4, 4, NULL, '2017-08-07 21:58:22', NULL),
(41, 1, 2, NULL, '2017-08-07 22:00:46', NULL),
(42, 2, 2, NULL, '2017-08-07 22:00:46', NULL),
(43, 3, 2, NULL, '2017-08-07 22:00:46', NULL),
(44, 4, 2, NULL, '2017-08-07 22:00:46', NULL),
(45, 1, 1, NULL, '2017-08-10 02:35:17', NULL),
(46, 2, 4, NULL, '2017-08-10 02:35:17', NULL),
(47, 3, 1, NULL, '2017-08-10 02:35:17', NULL),
(48, 4, 1, NULL, '2017-08-10 02:35:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_survey`
--

CREATE TABLE `pilihan_survey` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pilihan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pilihan_survey`
--

INSERT INTO `pilihan_survey` (`id`, `nama_pilihan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sangat Memuaskan', 1, NULL, NULL),
(2, 'Memuaskan', 1, NULL, NULL),
(3, 'Cukup Memuaskan', 1, NULL, NULL),
(4, 'Kurang Memuaskan', 1, NULL, NULL),
(5, 'Tidak Memuaskan', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaRule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `namaRule`) VALUES
(1, 'Superadmin'),
(2, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('09hJzC5FeOcSqWAinYBcdvaQV5UR03THoyy80px5', 1, '115.178.211.235', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/59.0.3071.102 Mobile/14G57 Safari/602.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU2M2eVg0ekJjdVJYbmVOc29rSlh1amhldWJwTkFZN21LZVRLa0tORCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2VkaXQvdGVudGFuZy1rYW1pLzQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1502520819),
('1OwKAE9nepel5Vje2jaaw9ADqWZ1VrcxeHYL8n2d', NULL, '112.215.241.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWR2Tk1ZY25aSFd6bVNmZGlLSUV2a1JjZEh5NUpCS3Y4R01oS2ZOSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVtcGxhdGUtZW1haWwiO319', 1502358118),
('2iqggqgazY9ZrDcVZEakqnpWd1nYWGL2gZoVPfzt', NULL, '37.9.113.192', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVJ5U2pmNDNzWlRYQkZyNmxJbDc4RXBjWnlQa0tNVGFvVkpoWnpGMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9lbWFsYWxvbWJvay50ayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1502539928),
('6DpKozL7krzgE1wHf8jqOispe0sfQYf3RaQC14fr', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFVMd3NYd2dJOWplOTBPdHVPMlNONFgxTktQaWlrWkp4Um5hTFE2NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502600000),
('8FC7BDcu7X1bt4ePdDuJNXg5JAHGukZK6bdRrQ33', NULL, '112.215.236.220', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3lMNGp5dE4yT0ZHY1o2WFhaajZzREJXWG4zdGN0MGc4anJkZjhaTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502434958),
('bzK37i68CPwite7JMlGWFvBAZFUVGrQYu0zccwv3', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSVNOM3g4bGJDa09tdzcwSHhHWURKd3F3Tm93UGNqSFdkc0c4UTZpRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502419290),
('CnwSmrBemux6ax9KFlWMeZqYksG3Onp81SiwZYVl', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUU2QXkyTlczeGNBcG9WYUtGQko4OHdOWUJFRk81dTIyYmlRcTJQRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357722),
('D5pilSU498v1f8qu3ZCIrdFrRhq7NCrW0etqNqSN', NULL, '54.165.90.203', 'ia_archiver', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDA3a2d0M0dyVG85NVhpN0J3YmlVVHVKT01OaUZWUlczaUlWa1pXUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvcGVtYnVhdGFuLWFrdW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvcGVtYnVhdGFuLWFrdW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502358058),
('F0JjHk7SQdlY4R3BsBfh2fIkE4eUsusftx3ltqWB', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRk1VUmlKU2NUb0ZOUTBCRDNTamEwcWNkTHVBOXlkUUMwSTN6bFl1byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357693),
('fC002jecIkFvOdbOjipnLK05uc14caTa5kXa6SGK', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmM1MUQ4MVhnajZyZHljMWpaYjUwdlptS1dIZWY1NWc0cmt5NlVzcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502418705),
('GV4AHLHGkCe37CfLYr9Bc9uwLLAtO71V45yPy5dW', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzU1UklzSnNZU0ZzWE0wT3psaW9TWFIyYmhHeFBXanFhcXRuN3F1OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502358338),
('GZoWI1U0wOTJJ5dwniYw0oZuZ7uflCqpLFlodqBC', 1, '103.213.130.85', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibm96eGIwUFJYMGFpWkxNZ3JCdk5mN2R4T1phYUUzaENhdVA2SDBVbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2N1c3RvbWl6ZS1mcm9udGVuZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1502676258),
('hEFWcQI3kay5ooMGCwh2Z9X4ftzthw5fre6b8vxM', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHdwTHcwUmVkYThzNnRBWWxXVnA3c1B3dGZjM2VCN2x1TTc5UFhQVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502676162),
('ISyWUHdpbsIOviOZESBP9YMRNtIGVdNsLpvcCLGJ', NULL, '54.165.90.203', 'ia_archiver', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1hBRFRxWXlTWE9wY3Y1anhDbTlxTHdXVjRtWFFyZVNWNDlkVTlzYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9mb3JtdWxpci1idWt1LXRhbXUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502356781),
('K9pRNlayJhokn9v399PRGyVNgvCQ92bc8RM49nFt', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYk9nT3h5ejJGUFowamhXRzlRWnJESTRxN1d6TDJMNFpFQjNpb0NvaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502360382),
('kh5Vwm52sRBFVacaztUDa7xPdRDN9VbRXcFA65Gw', NULL, '36.84.67.213', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2RZYk00QjNiejZIMFdaekN5bXBQeDY2UVkwb1lZbmp1NWlCdFNndCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9lbWFsYWxvbWJvay50ayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1502359207),
('KNlpDu3OayGtu1dRCxcJ2dKc6rGQxtPVA2ODDwrh', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDI2WkJmaDNENTNGQmJnVDRFTDh2ckZRTlQyUjJ2UUtMQ093MXlycSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502638471),
('kO2dWoCGESnadF64f7BzPqfVMOt83LuZTVsCPA5F', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFk0T1NEN1pqOUQ2SWV2aE9FRWF4ZnN6Y29QWUUzOGl3TkU0Q0ZSTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357663),
('LDQc8ODKwsRXfTTVmCuLILKP2SHDGeEJeSP6lAxM', NULL, '37.9.113.165', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDNaSzFqcVJsWmpNeUszeDZ3Y081M1kxMGg4RjRpVlgxU1Z2SHpybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502539932),
('lpD9uxztnRJseWmtacXeulOx2iDm55BMcU0Vtpx9', NULL, '158.140.184.122', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFppNXdDY3Y1Ung3ZTFGYWhNblBydEpuVFJNZk1Dd3g1NkZib1BTMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9rZWx1aGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502638473),
('MMer39wyENEtjDPDBkttKXFMkb12WkH7W52XQRR4', NULL, '52.71.155.178', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.1.25 (KHTML, like Gecko) Version/8.0 Safari/600.1.25', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMUllT3lkQWg4bGRPTWp1d0JjZ1BTN0p6bzBEUXE1ZDI0cWMyeFl3cCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NjoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvcGVnYXdhaV9wZW5nZ3VuYSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vZW1hbGFsb21ib2sudGsvYmFja2VuZC9wZWdhd2FpX3BlbmdndW5hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502367946),
('MW5OCL9fLPYmpJXc1AWm5XsDQI7iGSZxjnVyzfKh', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDlqWkwwOHdFVHF5Z0pUbWZKQ1dhajZxRmMxSFJXRVF5d1hLbzh3ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357761),
('n0Ab2YLpxDqzOxA3pT54sJ4X9N5TTtkelT0OYjNo', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkwwWlpNeU1DeTVVeTdFRTBzdXd5U3h1RlBlTm0yVjRERTE0b0s4ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357721),
('NRYue8N9doOpjp88xhfPBgPvRByevmjnUyly9o10', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVhSWVNJQktUZ2xjdWFobTVGdEJnY3B1RGt2bWtyUUl0OFQ3WmpLdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502359726),
('PfZbhXK4BcuCdKuJNMOT9VbfWn9nmPzzz70RY9Hq', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjVKck1pM09IMEt3OFdlSUZINTB0bmd3Q2FBendmaXlCNVdBenFvYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502613395),
('Pi6ZtOcYYRHOiweueufRCU6M3Ds3tgxLCg8dmutP', NULL, '54.165.90.203', 'ia_archiver', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic08wc2xLdWV1bUFYaUNaZ091SXlLTzIwMFliTjg4UG1qaHdQODd5TCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVudGFuZy1rYW1pIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502358338),
('pKpDCWwoDPoJwV3dFJ3KltLAyfb9shIFhw1IHlhO', NULL, '52.71.155.178', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.1.25 (KHTML, like Gecko) Version/8.0 Safari/600.1.25', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSm11MFFMaGdRWkNoT1RWMFRYZ21oQ25NYURXeTI4dTdmYkZPRFdZWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502367947),
('plhkn8pGMgIRg6yRlHMc5fNYjrXF8Rf6DzwyjSQP', NULL, '52.71.155.178', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/600.1.25 (KHTML, like Gecko) Version/8.0 Safari/600.1.25', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzAxRWFOQ1hHUjZnU3NiN0I0UkF4cVdTR3ZoUWszTmRJMzNxY3FrVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502367944),
('Pnlp7CMq03diHMvW5VNHanyAzjznbZaSDbsZffcC', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDh3bDkzQWRHaUFWam1tWHQ0RFdidVVIT2FoUVlJa21lWjVINVh3bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502676186),
('pyXNjgwgTYsIzKdxPVFq7O5Gy7Wt1jD5cVcPN4Ab', 1, '36.84.67.213', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUVyTlBqeVU5UjYwQ3VSNHlKVno1dW5xNUFuc25DQmFFd25hUkhkOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2N1c3RvbWl6ZS1mcm9udGVuZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1502360598),
('qbQYrT5NEd1MbkTm5VabTSS052cndmI45cSm0qtd', NULL, '64.233.173.40', 'Mozilla/5.0 (Linux; Android 6.0.1; Redmi 4 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.85 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnFjeEpVZWlPSHJaOFBaWWF6N2d0djF4RHlJcDlLcU1RMVRPcW5WQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9wZWxhdGloYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502428387),
('QERE8JGuGrMIHwzmS81h6yNOcMdMZIYJ9iuSFi4x', NULL, '66.102.6.72', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnZ4bnpjSEs1WWVlYkhHRWVTekViN2ZJREVBS29HWkNpc1kxTGVsTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502432697),
('QRxusyAFR4j8wesrdWgPdFNurVu1dMrsiScmgib9', NULL, '112.215.241.13', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGJYeXdsb3VqdGY5RlNxdHN6UFB0b0x2TFNsSk5qdmdITzRxOGs3eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9lbWFsYWxvbWJvay50ayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1502356177),
('solfehIJz4ZbYEcDZFDRnYQXBdVDwVnmWqePKHnE', NULL, '115.178.194.199', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/59.0.3071.102 Mobile/14G57 Safari/602.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWXJQQXN4RHhTMktyOEFsVFhhd1VwT21MUVBJS21rNVFnOFpsVWJuUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVudGFuZy1rYW1pIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9iYWNrZW5kL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502534059),
('tOd3cmxJxGNvYnnQK87InEMPJN0Yf8wgZKKtV57d', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGJxUWJYc2FEODV0b0ZPZlJwSjNqbmN3R1F0ZjVkaWI4b3NKZ09YRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502357760),
('uCy2PhYhOsv0fDeiCF9E8hXTTChi9BJc4OK3kzyk', NULL, '114.124.241.205', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUt4NHF3R2ZxdUd1VG1Ra3RldExtc3ZxeGlIVEw3cVZTYmh5bWV6ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9wZWxhdGloYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502663005),
('umuL1O3kKFKfkGnPBhttKd6qoorlx8afdyeITTNm', NULL, '103.213.131.171', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFIzS3hnUXJRQ3o4eVRaVjVuMG1yYlhwcThBR0c1Z0N4TWlNMkg0SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502425678),
('y3qC7l5epAoCEa3zokX2bjapgVybAc1hxkE7Wsd3', NULL, '112.215.236.42', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWk1TTjN3REtpN1BSeWFmcTVMQWxubkROOFlWSXl2RG1hMEdCbDYwOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502424297),
('YdG3IcMaWjaV2A6HPCdzRhoSbq9f3qhdv0ZuqHC7', NULL, '103.31.233.162', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWFaRmpOWmVmOVV0d2M0TzN5NHJUVzNxNzJlOFEybnNQa0lsMTNWNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9oYXNpbC1zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502359725),
('yzhAfj7WWpAunKsuAD7BJqXFAJpcCHHHe00Rhvi5', NULL, '54.165.90.203', 'ia_archiver', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNldBWXhrdFFodGQ0cE52NTczdjhhRnkyTU5hU0FJRWFCeldGTkltQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVtcGxhdGUtZW1haWwiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NDoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVtcGxhdGUtZW1haWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502358915),
('ZauCYWFD3vj8YRYQfgIy5eE2vmMu5vjv919l6Hfi', NULL, '158.140.184.122', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.1.2 Safari/603.3.8', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlc2cnp4NUhXUDdEdmFqdjl5RDE1bTA4TGJjZDFtRW5qR2NqVG04eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9rZWx1aGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502384085),
('zvGxMvR7zJxy78ILdvYH3IG7Zm61OjtHS5HIWUj6', NULL, '115.178.200.104', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/59.0.3071.102 Mobile/14G57 Safari/602.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGZjYnFCZUxSZHBEWmFrd0p4djF4Rzc3eE9aVFF2UzFuNlgyMHkybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1502613456),
('Zvk8dmMFG89RqEhho08SW3Bl8juWjlzlJcAJjPWV', NULL, '115.178.215.223', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) CriOS/59.0.3071.102 Mobile/14G57 Safari/602.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnphRHNiZklXMEZmU0VyTUJucHZzMzJOTWFUQWZ1ZVRuSXVISE9zeCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovL2VtYWxhbG9tYm9rLnRrL2JhY2tlbmQvdGVudGFuZy1rYW1pIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9lbWFsYWxvbWJvay50ay9zdXJ2ZXkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1502600000);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `url`, `isi`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'http://emalalombok.tk', 'help desk emala', 'file-917-08-10-02-30-21.png', 1, '2017-08-09 19:30:21', NULL),
(2, 'http://emalalombok.tk', 'help desk emala', 'file-817-08-10-02-30-56.jpeg', 1, '2017-08-09 19:30:56', NULL),
(3, 'http://emalalombok.tk', 'Email Berubah', 'file-817-08-10-09-13-50.jpeg', 1, '2017-08-10 02:13:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal_surveys`
--

CREATE TABLE `soal_surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `soal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal_surveys`
--

INSERT INTO `soal_surveys` (`id`, `soal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana tingkat kepuasan Anda terhadap media penyampaian permasalahan (Email, Telp, dll) ?', 1, '2017-07-31 17:00:00', '2017-07-31 17:00:00'),
(2, 'Bagaimana tingkat kepuasan Anda terhadap kecepatan penanganan permasalahan ?\r\n\r\n', 1, '2017-07-31 17:00:00', '2017-07-31 17:00:00'),
(3, 'Bagaimana tingkat kepuasan Anda terhadap kualitas cara penyelesaian permasalahan ?', 1, '2017-07-31 17:00:00', '2017-07-31 17:00:00'),
(4, 'Bagaimana tingkat kepuasan Anda terhadap kesesuaian penyelesaian permasalahan ?', 1, '2017-07-31 17:00:00', '2017-07-31 17:00:00'),
(10, 'test  edited test', 10, '2017-08-05 22:46:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `media` int(11) NOT NULL,
  `kecepatan` int(11) NOT NULL,
  `kualitas` int(11) NOT NULL,
  `kesesuaian` int(11) NOT NULL,
  `saran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `media`, `kecepatan`, `kualitas`, `kesesuaian`, `saran`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 2, 1, 'testes', '2017-07-30 08:24:57', '2017-07-30 08:24:57'),
(2, 1, 1, 2, 3, 'teste', '2017-07-30 08:25:22', '2017-07-30 08:25:22'),
(3, 3, 1, 4, 4, 'test', '2017-07-30 08:26:17', '2017-07-30 08:26:17'),
(4, 3, 5, 3, 3, 'testes', '2017-08-05 16:29:31', '2017-08-05 16:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `template_emails`
--

CREATE TABLE `template_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '0',
  `view_template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_emails`
--

INSERT INTO `template_emails` (`id`, `subject`, `isi`, `status`, `view_template`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Kepada Yth, {{$nama_lengkap}}<br>\ndi <br>\n{{$alamat}} <br>\n<p>sesuai dengan permohonan anda melalui aplikasi [Nama Aplikasi] berikut kami lampirkan akses anda ke [Nama LPSE] : <p>\n<br>\n\nUsername : <?php echo $data[\'userId\']; ?> <br>\npassword : {{$data[\'password\']}} <br>\n<br>\n<p>Silahkan gunakan userid dan password anda untuk mengakses [Nama LPSE] pada link berikut [Link LPSE]. \nUntuk alasan keamanan silahkan login dan ganti password standar dari kami! </p>\n<br>\nTerimakasih. <br>\nSalam Super!', 0, NULL, '2017-08-04 19:48:58', '2017-08-04 19:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kamis`
--

CREATE TABLE `tentang_kamis` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi1` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang_kamis`
--

INSERT INTO `tentang_kamis` (`id`, `judul`, `isi`, `judul1`, `isi1`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Layanan Pengadaan Secara Elektronik (LPSE)', '<p >LPSE adalah unit kerja yang dibentuk di seluruh Kementerian/Lembaga/Satuan Kerja Perangkat Daerah/lnstitusi Lainnya (K/L/D/I) untuk menyelenggarakan sistem pelayanan pengadaan barang/jasa secara elektronik serta memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik. ULP/Pejabat Pengadaan pada Kementerian/Lembaga/Perguruan Tinggi/BUMN yang tidak membentuk LPSE dapat menggunakan fasilitas LPSE yang terdekat dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik. Selain memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik LPSE juga melayani registrasi penyedia barang dan jasa yang berdomisili di wilayah kerja LPSE yang bersangkutan Pengadaan barang/jasa secara elektronik akan meningkatkan transparansi dan akuntabilitas, meningkatkan akses pasar dan persaingan usaha yang sehat, memperbaiki tingkat efisiensi proses pengadaan, mendukung proses monitoring dan audit dan memenuhi kebutuhan akses informasi yang real time guna mewujudkan clean and good government dalam pengadaan barang/jasa pemerintah Dasar hukum pembentukan LPSE adalah Pasal 111 Nomor 54 Tahun 2010 tentang pengadaan barang/jasa pemerintah yang ketentuan teknis operasionalnya diatur oleh Peraturan Kepala LKPP Nomor 2 Tahun 2010 tentang Layanan pengadaan Secara Elektronik. LPSE dalam menyelenggarakan sistem pelayanan Pengadaan Barang/Jasa secara elektronik juga wajib memenuhi persyaratan sebagaimana yang ditentukan dalam Undang-undang Nomor 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik Layanan yang tersedia dalam Sistem Pengadaan Secara Elektronik saat ini adalah e-tendering yang ketentuan teknis operasionalnya diatur dengan Peraturan Kepala LKPP Nomor 1 Tahun 2011 tentang Tata Cara E-Tendering. Selain itu LKPP juga menyediakan fasilitas Katalog Elektronik (e-Catalogue) yang merupakan sistem informasi elektronik yang memuat daftar,jenis, spesifikasi teknis dan harga barang tertentu dari berbagai penyedia barang/jasa pemerintah, proses audit secara online (e-Audit), dan tata cara pembelian barang/jasa melalui katalog elektronik (e-Purchasing).</p>', 'Sistem Pengadaan Secara Elektronik (SPSE)', '<p>SPSE merupakan aplikasi e-procurement yang dikembangkan oleh Direktorat e-Procurement - LKPP untuk digunakan oleh LPSE di seluruh K/L/D/I. Aplikasi ini dikembangkan dengan semangat efisiensi nasional sehingga tidak memerlukan biaya lisensi, baik lisensi SPSE itu sendiri maupun perangkat lunak pendukungnya. SPSE dikembangkan oleh LKPP bekerja sama dengan:<br />\r\n1. Lembaga Sandi Negara (Lemsaneg) untuk fungsi enkripsi dokumen<br />\r\n2. Badan Pengawasan Keuangan dan Pembangunan (BPKP) untuk sub sistem audit</p>', 0, '2017-08-04 20:16:09', '2017-08-04 20:22:33'),
(4, 'Layanan Pengadaan Secara Elektronik (LPSE)', '<p>LPSE adalah unit kerja yang dibentuk di seluruh Kementerian/Lembaga/Satuan Kerja Perangkat Daerah/lnstitusi Lainnya (K/L/D/I) untuk menyelenggarakan sistem pelayanan pengadaan barang/jasa secara elektronik serta memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik. ULP/Pejabat Pengadaan pada Kementerian/Lembaga/Perguruan Tinggi/BUMN yang tidak membentuk LPSE dapat menggunakan fasilitas LPSE yang terdekat dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik. Selain memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik LPSE juga melayani registrasi penyedia barang dan jasa yang berdomisili di wilayah kerja LPSE yang bersangkutan Pengadaan barang/jasa secara elektronik akan meningkatkan transparansi dan akuntabilitas, meningkatkan akses pasar dan persaingan usaha yang sehat, memperbaiki tingkat efisiensi proses pengadaan, mendukung proses monitoring dan audit dan memenuhi kebutuhan akses informasi yang real time guna mewujudkan clean and good government dalam pengadaan barang/jasa pemerintah Dasar hukum pembentukan LPSE adalah Pasal 111 Nomor 54 Tahun 2010 tentang pengadaan barang/jasa pemerintah yang ketentuan teknis operasionalnya diatur oleh Peraturan Kepala LKPP Nomor 2 Tahun 2010 tentang Layanan pengadaan Secara Elektronik. LPSE dalam menyelenggarakan sistem pelayanan Pengadaan Barang/Jasa secara elektronik juga wajib memenuhi persyaratan sebagaimana yang ditentukan dalam Undang-undang Nomor 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik Layanan yang tersedia dalam Sistem Pengadaan Secara Elektronik saat ini adalah e-tendering yang ketentuan teknis operasionalnya diatur dengan Peraturan Kepala LKPP Nomor 1 Tahun 2011 tentang Tata Cara E-Tendering. Selain itu LKPP juga menyediakan fasilitas Katalog Elektronik (e-Catalogue) yang merupakan sistem informasi elektronik yang memuat daftar,jenis, spesifikasi teknis dan harga barang tertentu dari berbagai penyedia barang/jasa pemerintah, proses audit secara online (e-Audit), dan tata cara pembelian barang/jasa melalui katalog elektronik (e-Purchasing).</p>\r\n\r\n<ol>\r\n	<li>kanta</li>\r\n	<li>sukanta</li>\r\n</ol>', NULL, NULL, 1, '2017-08-04 20:22:33', '2017-08-07 08:33:22'),
(5, 'Layanan Pengadaan Secara Elektronik (LPSE) edited', '<p>LPSE adalah unit kerja yang dibentuk di seluruh Kementerian/Lembaga/Satuan Kerja Perangkat Daerah/lnstitusi Lainnya (K/L/D/I) untuk menyelenggarakan sistem pelayanan pengadaan barang/jasa secara elektronik serta memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik. ULP/Pejabat Pengadaan pada Kementerian/Lembaga/Perguruan Tinggi/BUMN yang tidak membentuk LPSE dapat menggunakan fasilitas LPSE yang terdekat dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik. Selain memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik LPSE juga melayani registrasi penyedia barang dan jasa yang berdomisili di wilayah kerja LPSE yang bersangkutan Pengadaan barang/jasa secara elektronik akan meningkatkan transparansi dan akuntabilitas, meningkatkan akses pasar dan persaingan usaha yang sehat, memperbaiki tingkat efisiensi proses pengadaan, mendukung proses monitoring dan audit dan memenuhi kebutuhan akses informasi yang real time guna mewujudkan clean and good government dalam pengadaan barang/jasa pemerintah Dasar hukum pembentukan LPSE adalah Pasal 111 Nomor 54 Tahun 2010 tentang pengadaan barang/jasa pemerintah yang ketentuan teknis operasionalnya diatur oleh Peraturan Kepala LKPP Nomor 2 Tahun 2010 tentang Layanan pengadaan Secara Elektronik. LPSE dalam menyelenggarakan sistem pelayanan Pengadaan Barang/Jasa secara elektronik juga wajib memenuhi persyaratan sebagaimana yang ditentukan dalam Undang-undang Nomor 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik Layanan yang tersedia dalam Sistem Pengadaan Secara Elektronik saat ini adalah e-tendering yang ketentuan teknis operasionalnya diatur dengan Peraturan Kepala LKPP Nomor 1 Tahun 2011 tentang Tata Cara E-Tendering. Selain itu LKPP juga menyediakan fasilitas Katalog Elektronik (e-Catalogue) yang merupakan sistem informasi elektronik yang memuat daftar,jenis, spesifikasi teknis dan harga barang tertentu dari berbagai penyedia barang/jasa pemerintah, proses audit secara online (e-Audit), dan tata cara pembelian barang/jasa melalui katalog elektronik (e-Purchasing).</p>', 'Sistem Pengadaan Secara Elektronik (SPSE)', '<p>SPSE merupakan aplikasi e-procurement yang dikembangkan oleh Direktorat e-Procurement - LKPP untuk digunakan oleh LPSE di seluruh K/L/D/I. Aplikasi ini dikembangkan dengan semangat efisiensi nasional sehingga tidak memerlukan biaya lisensi, baik lisensi SPSE itu sendiri maupun perangkat lunak pendukungnya. SPSE dikembangkan oleh LKPP bekerja sama dengan:<br />\r\n1. Lembaga Sandi Negara (Lemsaneg) untuk fungsi enkripsi dokumen<br />\r\n2. Badan Pengawasan Keuangan dan Pembangunan (BPKP) untuk sub sistem audit</p>', 0, '2017-08-06 23:41:10', '2017-08-06 23:41:10'),
(6, 'Layanan Pengadaan Secara Elektronik (LPSE) edited', '<p>LPSE adalah unit kerja yang dibentuk di seluruh Kementerian/Lembaga/Satuan Kerja Perangkat Daerah/lnstitusi Lainnya (K/L/D/I) untuk menyelenggarakan sistem pelayanan pengadaan barang/jasa secara elektronik serta memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik. ULP/Pejabat Pengadaan pada Kementerian/Lembaga/Perguruan Tinggi/BUMN yang tidak membentuk LPSE dapat menggunakan fasilitas LPSE yang terdekat dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik. Selain memfasilitasi ULP/Pejabat Pengadaan dalam melaksanakan pengadaan barang/jasa secara elektronik LPSE juga melayani registrasi penyedia barang dan jasa yang berdomisili di wilayah kerja LPSE yang bersangkutan Pengadaan barang/jasa secara elektronik akan meningkatkan transparansi dan akuntabilitas, meningkatkan akses pasar dan persaingan usaha yang sehat, memperbaiki tingkat efisiensi proses pengadaan, mendukung proses monitoring dan audit dan memenuhi kebutuhan akses informasi yang real time guna mewujudkan clean and good government dalam pengadaan barang/jasa pemerintah Dasar hukum pembentukan LPSE adalah Pasal 111 Nomor 54 Tahun 2010 tentang pengadaan barang/jasa pemerintah yang ketentuan teknis operasionalnya diatur oleh Peraturan Kepala LKPP Nomor 2 Tahun 2010 tentang Layanan pengadaan Secara Elektronik. LPSE dalam menyelenggarakan sistem pelayanan Pengadaan Barang/Jasa secara elektronik juga wajib memenuhi persyaratan sebagaimana yang ditentukan dalam Undang-undang Nomor 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik Layanan yang tersedia dalam Sistem Pengadaan Secara Elektronik saat ini adalah e-tendering yang ketentuan teknis operasionalnya diatur dengan Peraturan Kepala LKPP Nomor 1 Tahun 2011 tentang Tata Cara E-Tendering. Selain itu LKPP juga menyediakan fasilitas Katalog Elektronik (e-Catalogue) yang merupakan sistem informasi elektronik yang memuat daftar,jenis, spesifikasi teknis dan harga barang tertentu dari berbagai penyedia barang/jasa pemerintah, proses audit secara online (e-Audit), dan tata cara pembelian barang/jasa melalui katalog elektronik (e-Purchasing).</p>', 'Sistem Pengadaan Secara Elektronik (SPSE)', '<p>SPSE merupakan aplikasi e-procurement yang dikembangkan oleh Direktorat e-Procurement - LKPP untuk digunakan oleh LPSE di seluruh K/L/D/I. Aplikasi ini dikembangkan dengan semangat efisiensi nasional sehingga tidak memerlukan biaya lisensi, baik lisensi SPSE itu sendiri maupun perangkat lunak pendukungnya. SPSE dikembangkan oleh LKPP bekerja sama dengan:<br />\r\n1. Lembaga Sandi Negara (Lemsaneg) untuk fungsi enkripsi dokumen<br />\r\n2. Badan Pengawasan Keuangan dan Pembangunan (BPKP) untuk sub sistem audit</p>', 0, '2017-08-06 23:41:33', '2017-08-09 19:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pelatihan`
--

CREATE TABLE `tipe_pelatihan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe_pelatihan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_pelatihan`
--

INSERT INTO `tipe_pelatihan` (`id`, `tipe_pelatihan`, `created_at`, `updated_at`) VALUES
(1, 'Pelatihan Rekanan', '2017-07-28 14:23:28', NULL),
(2, 'Pelatihan Pejabat Pengadaan', '2017-07-28 14:23:44', NULL),
(3, 'Pelatihan PPK', '2017-07-28 14:23:56', NULL),
(4, 'Pelatihan Auditor', '2017-07-28 14:24:11', NULL),
(5, 'Pelatihan Pokja ULP', '2017-07-28 14:24:26', NULL),
(6, 'Dll', '2017-08-09 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rule_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rule_id`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super4dmin', 'Superadmin (pass :Super4dm1n2017)', 'superadmin@gmail.com', '$2y$10$63cKEiPocnR021VkpNd0ve0fD64vigFIMTiu.aSV8iKxc1kcHV6Ey', 'tOaIQXvE5G38OyoappkazZN2C7hthfj3BCye5xnIDTS3wf340bbGRMofLEYd', '2017-07-29 01:31:35', '2017-07-29 01:31:35'),
(20, 2, 'asdan15', 'Asep dadan', 'dadanasep74@gmail.com', '$2y$10$77JdiIBpZheblXyezCZFk.TUwCIC4SGic2MQzKJXarmAcRIBCbYjS', 'bvhUwbzM02JyPSEbPMIblX8TYz6JZN5AQHzEXE68XlJ0N8YnBn9ckLIJpVnY', '2017-07-29 23:00:40', '2017-07-29 23:00:40'),
(21, 2, 'ridha', 'ridha', 'ridha@lebakhosting.com', '$2y$10$iDoQkZFFLoHFGzPSohWBi..DyILMiG7eecnjGxiUD8UfA5qO4eMsa', NULL, '2017-07-31 05:42:26', '2017-07-31 05:42:26'),
(22, 2, 'ridha15', 'ridha', 'ridhaa.c.f@gmail.com', '$2y$10$hHnVMQlYgvk2oe..bldVledC3LsMHSWrJVoVBOhntAfOTEo.9LY3W', NULL, '2017-07-31 05:44:20', '2017-07-31 05:44:20'),
(23, 2, 'test', 'test send email', 'johaniip@gmail.com', '$2y$10$vqUCJKBCTW1cNltXIQIXYec1uQUh93sa0TNBmABMOuOaLT3muTX8C', NULL, '2017-07-31 06:18:55', '2017-07-31 06:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_pelatihan`
--

CREATE TABLE `waktu_pelatihan` (
  `id` int(11) NOT NULL,
  `pelatihan_id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `kuota` int(4) DEFAULT NULL COMMENT 'jumlah orang (limti batas orang)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waktu_pelatihan`
--

INSERT INTO `waktu_pelatihan` (`id`, `pelatihan_id`, `judul`, `keterangan`, `tanggal_pelatihan`, `kuota`, `created_at`, `updated_at`) VALUES
(2, 1, 'test', 'test', '2017-08-26', 10, '2017-08-11 22:45:52', '2017-08-11 22:45:52'),
(3, 2, 'test', 'test', '2017-08-12', 20, '2017-08-12 07:28:39', '0000-00-00 00:00:00'),
(4, 3, 'judul', 'keter', '2017-08-23', 2, '2017-08-12 07:36:50', '2017-08-13 22:56:29'),
(5, 4, 'test', 'test', '2017-08-19', 100, '2017-08-12 07:46:06', '2017-08-11 17:00:00'),
(6, 5, 'test', 'test', '2017-08-25', 12, '2017-08-12 07:51:14', '2017-08-12 07:51:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custombackends`
--
ALTER TABLE `custombackends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_header_frontends`
--
ALTER TABLE `custom_header_frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_tamu`
--
ALTER TABLE `daftar_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_gambars`
--
ALTER TABLE `home_gambars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhans`
--
ALTER TABLE `keluhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan_photos`
--
ALTER TABLE `keluhan_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluhan_photos_keluhan_id_foreign` (`keluhan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai_pengguna`
--
ALTER TABLE `pegawai_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_pengguna_userid_unique` (`userId`),
  ADD UNIQUE KEY `pegawai_pengguna_email_unique` (`email`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihan_id_pelatihan_foreign` (`id_pelatihan`);

--
-- Indexes for table `penilaian_surveys`
--
ALTER TABLE `penilaian_surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_surveys_id_soal_foreign` (`id_soal`),
  ADD KEY `penilaian_surveys_id_pilihan_foreign` (`id_pilihan`);

--
-- Indexes for table `pilihan_survey`
--
ALTER TABLE `pilihan_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_surveys`
--
ALTER TABLE `soal_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_emails`
--
ALTER TABLE `template_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kamis`
--
ALTER TABLE `tentang_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_pelatihan`
--
ALTER TABLE `tipe_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_rule_id_foreign` (`rule_id`);

--
-- Indexes for table `waktu_pelatihan`
--
ALTER TABLE `waktu_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelatihan_id` (`pelatihan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custombackends`
--
ALTER TABLE `custombackends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `custom_header_frontends`
--
ALTER TABLE `custom_header_frontends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `daftar_tamu`
--
ALTER TABLE `daftar_tamu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `home_gambars`
--
ALTER TABLE `home_gambars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `keluhans`
--
ALTER TABLE `keluhans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `keluhan_photos`
--
ALTER TABLE `keluhan_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pegawai_pengguna`
--
ALTER TABLE `pegawai_pengguna`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penilaian_surveys`
--
ALTER TABLE `penilaian_surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `pilihan_survey`
--
ALTER TABLE `pilihan_survey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `soal_surveys`
--
ALTER TABLE `soal_surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `template_emails`
--
ALTER TABLE `template_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tentang_kamis`
--
ALTER TABLE `tentang_kamis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tipe_pelatihan`
--
ALTER TABLE `tipe_pelatihan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `waktu_pelatihan`
--
ALTER TABLE `waktu_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluhan_photos`
--
ALTER TABLE `keluhan_photos`
  ADD CONSTRAINT `keluhan_photos_keluhan_id_foreign` FOREIGN KEY (`keluhan_id`) REFERENCES `keluhans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `pelatihan_id_pelatihan_foreign` FOREIGN KEY (`id_pelatihan`) REFERENCES `tipe_pelatihan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_surveys`
--
ALTER TABLE `penilaian_surveys`
  ADD CONSTRAINT `penilaian_surveys_id_pilihan_foreign` FOREIGN KEY (`id_pilihan`) REFERENCES `pilihan_survey` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_surveys_id_soal_foreign` FOREIGN KEY (`id_soal`) REFERENCES `soal_surveys` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

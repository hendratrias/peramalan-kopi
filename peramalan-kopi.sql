-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 01:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peramalan-kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `nama`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'kopi', '1', NULL, NULL),
(2, 'SKM', '2', '2022-04-09 22:12:31', '2022-04-09 22:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `menu_id`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 40, 2, NULL, NULL),
(2, 1, 2, 125, 2, NULL, NULL),
(3, 1, 3, 15, 2, NULL, NULL),
(4, 2, 1, 56, 2, NULL, NULL),
(5, 2, 2, 114, 2, NULL, NULL),
(6, 2, 3, 11, 2, NULL, NULL),
(7, 3, 1, 45, 2, NULL, NULL),
(8, 3, 2, 126, 2, NULL, NULL),
(9, 3, 3, 14, 2, NULL, NULL),
(10, 4, 1, 43, 2, NULL, NULL),
(11, 4, 2, 105, 2, NULL, NULL),
(12, 4, 3, 10, 2, NULL, NULL),
(13, 5, 1, 54, 2, NULL, NULL),
(14, 5, 2, 74, 2, NULL, NULL),
(15, 5, 3, 16, 2, NULL, NULL),
(16, 6, 1, 41, 2, NULL, NULL),
(17, 6, 2, 87, 2, NULL, NULL),
(18, 6, 3, 15, 2, NULL, NULL),
(19, 7, 1, 30, 2, NULL, NULL),
(20, 7, 2, 64, 2, NULL, NULL),
(21, 7, 3, 17, 2, NULL, NULL),
(22, 8, 1, 54, 2, NULL, NULL),
(23, 8, 2, 94, 2, NULL, NULL),
(24, 8, 3, 8, 2, NULL, NULL),
(25, 9, 1, 37, 2, NULL, NULL),
(26, 9, 2, 87, 2, NULL, NULL),
(27, 9, 3, 20, 2, NULL, NULL),
(28, 10, 1, 59, 2, NULL, NULL),
(29, 10, 2, 99, 2, NULL, NULL),
(30, 10, 3, 10, 2, NULL, NULL),
(31, 11, 1, 47, 2, NULL, NULL),
(32, 11, 2, 67, 2, NULL, NULL),
(33, 11, 3, 14, 2, NULL, NULL),
(34, 12, 1, 45, 2, NULL, NULL),
(35, 12, 2, 79, 2, NULL, NULL),
(36, 12, 3, 9, 2, NULL, NULL),
(37, 13, 1, 40, 2, NULL, NULL),
(38, 13, 2, 89, 2, NULL, NULL),
(39, 13, 3, 19, 2, NULL, NULL),
(40, 14, 1, 32, 2, NULL, NULL),
(41, 14, 2, 114, 2, NULL, NULL),
(42, 14, 3, 11, 2, NULL, NULL),
(43, 15, 1, 47, 2, NULL, NULL),
(44, 15, 2, 98, 2, NULL, NULL),
(45, 15, 3, 12, 2, NULL, NULL),
(46, 16, 1, 49, 2, NULL, NULL),
(47, 16, 2, 86, 2, NULL, NULL),
(48, 16, 3, 18, 2, NULL, NULL),
(49, 17, 1, 44, 2, NULL, NULL),
(50, 17, 2, 76, 2, NULL, NULL),
(51, 17, 3, 15, 2, NULL, NULL),
(52, 18, 1, 42, 2, NULL, NULL),
(53, 18, 2, 64, 2, NULL, NULL),
(54, 18, 3, 8, 2, NULL, NULL),
(55, 19, 1, 53, 2, NULL, NULL),
(56, 19, 2, 66, 2, NULL, NULL),
(57, 19, 3, 11, 2, NULL, NULL),
(58, 20, 1, 47, 2, NULL, NULL),
(59, 20, 2, 54, 2, NULL, NULL),
(60, 20, 3, 19, 2, NULL, NULL),
(61, 21, 1, 50, 2, NULL, NULL),
(62, 21, 2, 87, 2, NULL, NULL),
(63, 21, 3, 20, 2, NULL, NULL),
(64, 22, 1, 43, 2, NULL, NULL),
(65, 22, 2, 65, 2, NULL, NULL),
(66, 22, 3, 16, 2, NULL, NULL),
(67, 23, 1, 44, 2, NULL, NULL),
(68, 23, 2, 77, 2, NULL, NULL),
(69, 23, 3, 18, 2, NULL, NULL),
(70, 24, 1, 49, 2, NULL, NULL),
(71, 24, 2, 69, 2, NULL, NULL),
(72, 24, 3, 9, 2, NULL, NULL),
(73, 25, 1, 47, 2, NULL, NULL),
(74, 25, 2, 53, 2, NULL, NULL),
(75, 25, 3, 16, 2, NULL, NULL),
(76, 26, 1, 40, 2, '2022-04-08 11:05:21', '2022-04-08 11:06:19'),
(77, 27, 4, 2, 1, '2022-04-10 03:09:18', '2022-04-10 03:10:04'),
(78, 27, 2, 5, 1, '2022-04-10 03:09:39', '2022-04-10 03:10:04'),
(79, 28, 1, 3, 1, '2022-04-10 03:17:04', '2022-04-10 03:17:36'),
(80, 28, 2, 8, 1, '2022-04-10 03:17:09', '2022-04-10 03:17:36'),
(81, 28, 3, 6, 1, '2022-04-10 03:17:18', '2022-04-10 03:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Bold Coffee', 12000, '/storage/gambar/bold.jpg', NULL, NULL),
(2, 'Soft Coffee', 10000, '/storage/gambar/soft.jpg', NULL, NULL),
(3, 'Cocoffee', 11000, '/storage/gambar/cocoffee.jpg', NULL, NULL),
(4, 'caramel', 150, '/storage/gambar/1649585209-Ijo bg.png', '2022-04-10 03:06:49', '2022-04-10 03:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_07_054600_create_role_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_03_21_163527_create_bahan_baku_table', 1),
(6, '2022_03_21_163528_create_stok_table', 1),
(7, '2022_03_21_163537_create_menu_table', 1),
(8, '2022_03_21_163605_create_resep_table', 1),
(9, '2022_03_21_163619_create_transaksi_table', 1),
(10, '2022_03_21_163628_create_detail_transaksi_table', 1),
(11, '2022_04_02_050522_create_peramalan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `periode` date NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktual` decimal(8,2) NOT NULL,
  `hasil` decimal(8,2) NOT NULL,
  `MAPE` decimal(8,2) NOT NULL,
  `rekomendasi_stok` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id`, `menu_id`, `tgl`, `periode`, `metode`, `aktual`, `hasil`, `MAPE`, `rekomendasi_stok`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-04-10', '2021-01-02', 'Single Moving Average 7', '86.00', '86.57', '14.36', '1038.86', '2022-04-10 03:14:24', '2022-04-10 03:14:24'),
(2, 1, '2022-04-10', '2021-01-02', 'Single Moving Average 9', '42.00', '45.00', '12.44', '540.00', '2022-04-10 03:14:59', '2022-04-10 03:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `bahan_baku_id` bigint(20) UNSIGNED NOT NULL,
  `takaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `menu_id`, `bahan_baku_id`, `takaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, NULL, '2022-04-08 11:07:29'),
(2, 2, 1, 12, NULL, '2022-04-08 11:07:44'),
(3, 3, 1, 10, NULL, '2022-04-08 11:07:17'),
(4, 4, 1, 12, '2022-04-10 03:06:49', '2022-04-10 03:06:49'),
(5, 4, 2, 30, '2022-04-10 03:06:49', '2022-04-10 03:06:49'),
(6, 1, 2, 30, '2022-04-10 03:21:01', '2022-04-10 03:21:01'),
(7, 2, 2, 10, '2022-04-10 03:21:22', '2022-04-10 03:21:22'),
(8, 3, 2, 15, '2022-04-10 03:21:44', '2022-04-10 03:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `posisi`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'stok', NULL, NULL),
(3, 'keuangan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan_baku_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `bahan_baku_id`, `tgl_beli`, `tgl_kadaluarsa`, `jumlah_beli`, `sisa`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-04-08', '2022-04-29', 5000, 724, 1, '2022-04-08 11:04:52', '2022-04-10 03:17:36'),
(2, 2, '2022-04-10', '2022-07-30', 1750, 1690, 1, '2022-04-09 22:12:59', '2022-04-10 03:10:04'),
(3, 1, '2022-04-10', '2022-05-01', 26, 26, 1, '2022-04-10 03:20:05', '2022-04-10 03:20:05'),
(4, 2, '2022-04-10', '2022-05-01', 10, 10, 1, '2022-04-10 03:20:14', '2022-04-10 03:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_trans` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `tgl_trans`, `total`, `bayar`, `kembali`, `no_meja`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-05', 400000, 400000, 0, 1, 2, NULL, NULL),
(2, 1, '2020-09-12', 560000, 560000, 0, 1, 2, NULL, NULL),
(3, 1, '2020-09-19', 450000, 450000, 0, 1, 2, NULL, NULL),
(4, 1, '2020-09-26', 430000, 430000, 0, 1, 2, NULL, NULL),
(5, 1, '2020-10-03', 540000, 540000, 0, 1, 2, NULL, NULL),
(6, 1, '2020-10-10', 410000, 410000, 0, 1, 2, NULL, NULL),
(7, 1, '2020-10-17', 300000, 300000, 0, 1, 2, NULL, NULL),
(8, 1, '2020-10-24', 540000, 540000, 0, 1, 2, NULL, NULL),
(9, 1, '2020-11-01', 370000, 370000, 0, 1, 2, NULL, NULL),
(10, 1, '2020-11-08', 590000, 590000, 0, 1, 2, NULL, NULL),
(11, 1, '2020-11-15', 470000, 470000, 0, 1, 2, NULL, NULL),
(12, 1, '2020-11-22', 450000, 450000, 0, 1, 2, NULL, NULL),
(13, 1, '2020-11-29', 400000, 400000, 0, 1, 2, NULL, NULL),
(14, 1, '2020-12-05', 320000, 320000, 0, 1, 2, NULL, NULL),
(15, 1, '2020-12-12', 470000, 470000, 0, 1, 2, NULL, NULL),
(16, 1, '2020-12-19', 490000, 490000, 0, 1, 2, NULL, NULL),
(17, 1, '2020-12-26', 440000, 440000, 0, 1, 2, NULL, NULL),
(18, 1, '2021-01-03', 420000, 420000, 0, 1, 2, NULL, NULL),
(19, 1, '2021-01-10', 530000, 530000, 0, 1, 2, NULL, NULL),
(20, 1, '2021-01-17', 470000, 470000, 0, 1, 2, NULL, NULL),
(21, 1, '2021-01-24', 500000, 500000, 0, 1, 2, NULL, NULL),
(22, 1, '2021-01-31', 430000, 430000, 0, 1, 2, NULL, NULL),
(23, 1, '2021-02-07', 440000, 440000, 0, 1, 2, NULL, NULL),
(24, 1, '2021-02-14', 490000, 490000, 0, 1, 2, NULL, NULL),
(25, 1, '2021-02-21', 470000, 470000, 0, 1, 2, NULL, NULL),
(26, 1, '2022-04-08', 12000, 15000, 3000, 1, 2, '2022-04-08 11:05:46', '2022-04-10 03:10:19'),
(27, 1, '2022-04-10', 10150, 50000, 39850, 2, 2, '2022-04-10 03:10:04', '2022-04-10 03:10:25'),
(28, 3, '2022-04-10', 33000, 35000, 2000, 3, 2, '2022-04-10 03:17:36', '2022-04-10 03:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/storage/user/user.jpg',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `foto`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User Admin', 'admin', '$2y$10$dL25f0tztLFWPPXoijbm..CM8019F78GTqZaWauNSdFft3NSON456', '/storage/user/user.jpg', 1, NULL, NULL, NULL),
(2, 'User Stok', 'stok', '$2y$10$GPaYPVlfoLpJ7LMoN4SNC.NqbEOSYWo1Equf2BTFRwtbOvj5cImNa', '/storage/user/user.jpg', 2, NULL, NULL, NULL),
(3, 'User Keuangan', 'keuangan', '$2y$10$nNTKXRmuq9ClPKvKgN997.xU2vQnhRtdiP0WhcNd9DI274/ZkEpby', '/storage/user/user.jpg', 3, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksi_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peramalan_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resep_bahan_baku_id_foreign` (`bahan_baku_id`),
  ADD KEY `resep_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksi_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resep_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

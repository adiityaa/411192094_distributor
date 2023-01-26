-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 01:53 PM
-- Server version: 8.0.21
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `411192094_distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok_barang` int DEFAULT NULL,
  `harga_barang` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok_barang`, `harga_barang`) VALUES
(5, 'B7697', 'Mouse Gaming', 33, 100000),
(6, 'B5418', 'Headshet Gaming', 28, 150000),
(7, 'B9156', 'Keyboard', NULL, 200000),
(8, 'B8226', 'Monitor', NULL, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`) VALUES
(1, 'P4077', 'Aditya Dwi Aprianto', 'Jalan Bambu no 2', '087123890111'),
(4, 'P7422', 'Meghan Levana Epifani', 'Jalan dua no 223', '081234567892'),
(6, 'P2219', 'Maya Arinas Pramudita', 'Jalan Dewa no 234 Jakarta Barat', '081234567812'),
(7, 'P2666', 'Arjun Octavianus', 'Jalan Muria 2', '082156789972');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_pembelian` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_supplier` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int NOT NULL,
  `harga_barang` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_pembelian`, `tanggal`, `id_supplier`, `id_barang`, `jumlah_barang`, `harga_barang`, `created_at`, `created_by`) VALUES
(1, 'PB8032', '2023-01-26', '1', '5', 20, 2000000, '2023-01-26 15:32:00', 'Aditya'),
(2, 'PB2401', '2023-01-04', '1', '5', 12, 1200000, '2023-01-26 15:49:00', 'Aditya'),
(3, 'PB1771', '2023-01-19', '1', '5', 10, 1000000, '2023-01-26 15:50:00', 'Aditya'),
(4, 'PB5722', '2023-01-19', '2', '6', 20, 3000000, '2023-01-26 15:50:00', 'Aditya'),
(5, 'PB7761', '2023-01-25', '2', '6', 10, 1500000, '2023-01-26 15:51:00', 'Aditya');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_penjualan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int NOT NULL,
  `harga_barang` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_penjualan`, `tanggal`, `id_pelanggan`, `id_barang`, `jumlah_barang`, `harga_barang`, `created_at`, `created_by`) VALUES
(1, 'PJ5755', '2023-01-18', '6', '5', 9, 900000, '2023-01-26 15:52:00', 'Aditya'),
(2, 'PJ1749', '2023-01-17', '6', '6', 2, 300000, '2023-01-26 15:52:00', 'Aditya');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `no_telepon`) VALUES
(1, 'S9511', 'Angga Kurniawan', 'Taman Jeruk no 249 gang U', '082328901888'),
(2, 'S7413', 'Redy Septyanto', 'Jalan Apel no 250', '088123561221');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Aditya', 'aditya@gmail.com', NULL, '$2y$10$QctefxB/dguCOcFyGVClbOURDDN39vya0h4xxNoaFVjoK2lxV0kYa', NULL, '2023-01-16 20:20:02', '2023-01-16 20:20:02'),
(3, 'Aditya Dwi Aprianto', 'aditya.aprianto@gmail.com', NULL, '$2y$10$cjOiuBgMkVZSq58S7W.oL.V9HnRa4wieuRMWsCNXttZCnDJvWtgNG', NULL, '2023-01-16 20:48:01', '2023-01-16 20:48:01'),
(4, 'Adama Gusta Chrisnladi', 'adama@gmail.com', NULL, '$2y$10$W2hQCBHmtIZ6Cs0AHMCix.NijBzX1UgWFTCE6kuxglXAFQzbwtguu', NULL, '2023-01-16 20:49:39', '2023-01-16 20:49:39'),
(5, 'Stefanus Appe', 'appe@gmail.com', NULL, '$2y$10$W2bHecypW0hAt5olXpUD5uRyD3x/ebSv2J7dxwzBbbf.7.wKqDPu2', NULL, '2023-01-16 20:51:35', '2023-01-16 20:51:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

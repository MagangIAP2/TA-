-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2021 at 03:53 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bewok`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_perut`
--

CREATE TABLE `data_perut` (
  `id` bigint(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tfu` int(20) NOT NULL,
  `x` int(10) NOT NULL,
  `minggu_ke` varchar(20) NOT NULL,
  `tbh` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_perut`
--

INSERT INTO `data_perut` (`id`, `user_id`, `tfu`, `x`, `minggu_ke`, `tbh`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 50, 11, 'minggu ke-1', 1500, '2021-02-02 10:44:54', '2021-02-02 10:44:54', NULL),
(9, 1, 45, 12, 'minggu ke-2', 1900, '2021-02-02 10:59:48', '2021-02-02 10:59:48', NULL),
(10, 1, 31, 12, 'minggu ke-3', 2400, '2021-02-02 11:05:17', '2021-02-02 11:05:17', NULL),
(11, 1, 23, 12, 'minggu ke-4', 3400, '2021-02-02 11:05:17', '2021-02-02 11:05:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dokumen` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `user_id`, `name`, `dokumen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Arrrr', '1', '2021-02-03 08:39:49', '2021-02-03 08:39:49', NULL),
(2, 1, 'asasdasd', '1', '2021-02-03 08:41:23', '2021-02-03 08:41:23', NULL),
(3, 1, 'asdasd', '1', '2021-02-03 08:43:12', '2021-02-03 08:43:12', NULL),
(4, 1, 'qwewqweqwe', 'images/7RsfQpbrInqtAecWBdrecuXPP9O102HOrfHhggHd.png', '2021-02-03 08:44:47', '2021-02-03 08:44:47', NULL),
(5, 1, 'asddd', 'images/0ZSLlgGrqpsylxKZFmfeyNcGxLNmx6EEmSiN0w06.png', '2021-02-03 08:50:32', '2021-02-03 08:50:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `role` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `nik`, `username`, `nama_lengkap`, `no_telp`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '0', 'bewok5', 'Rusa Hijau', '021554875', 'arif_ariya', '$2y$10$r8Z1v49OYAJKwbOchWRFJOefkGp5bBxUjiAVprmS4fJ9IQOCQoDw.', '2020-12-29 00:29:52', '2020-12-29 00:29:52', NULL),
(27, 1, '123123123', 'bewok2', 'arif ariyanto admin', '3131312', 'a@g.c', '$2y$10$r8Z1v49OYAJKwbOchWRFJOefkGp5bBxUjiAVprmS4fJ9IQOCQoDw.', '2021-02-02 17:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_perut`
--
ALTER TABLE `data_perut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_perut`
--
ALTER TABLE `data_perut`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

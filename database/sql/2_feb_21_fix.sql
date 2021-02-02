-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2021 at 04:02 PM
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
  `lingkar_perut_atas` varchar(20) NOT NULL,
  `lingkar_perut_kanan` varchar(20) NOT NULL,
  `minggu_ke` varchar(20) NOT NULL,
  `lingkar_total` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_perut`
--

INSERT INTO `data_perut` (`id`, `user_id`, `lingkar_perut_atas`, `lingkar_perut_kanan`, `minggu_ke`, `lingkar_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, '10', '10', 'minggu ke-1', 11, '2020-12-29 07:17:46', '2020-12-29 07:17:46', NULL),
(6, 1, '11', '11', 'minggu ke-2', 11, '2020-12-29 08:18:43', '2020-12-29 08:18:43', NULL),
(7, 1, '12', '12', 'minggu ke-3', 24, '2020-12-29 08:19:53', '2020-12-29 08:19:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_perut`
--
ALTER TABLE `data_perut`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_perut`
--
ALTER TABLE `data_perut`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

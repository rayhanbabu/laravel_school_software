-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 01:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `roll` int(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `date` date DEFAULT NULL,
  `year` int(25) DEFAULT NULL,
  `month` int(25) DEFAULT NULL,
  `day` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `invoice_des1` varchar(255) DEFAULT NULL,
  `invoice_des_amount1` varchar(255) DEFAULT NULL,
  `invoice_amount1` int(120) NOT NULL DEFAULT 0,
  `invoice_des2` varchar(650) DEFAULT NULL,
  `invoice_des_amount2` varchar(550) DEFAULT NULL,
  `invoice_amount2` int(25) DEFAULT 0,
  `invoice_amount` int(255) NOT NULL DEFAULT 0,
  `payment_amount` int(255) NOT NULL DEFAULT 0,
  `payment_type` varchar(255) DEFAULT NULL,
  `received_type` varchar(100) DEFAULT NULL,
  `tran_id` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `uid`, `student_id`, `roll`, `name`, `eiin`, `class`, `babu`, `section`, `category`, `time`, `date`, `year`, `month`, `day`, `status`, `invoice_des1`, `invoice_des_amount1`, `invoice_amount1`, `invoice_des2`, `invoice_des_amount2`, `invoice_amount2`, `invoice_amount`, `payment_amount`, `payment_type`, `received_type`, `tran_id`, `created_at`, `updated_at`) VALUES
(259, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-05 02:57:58', '2023-07-05', 2023, 7, 5, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Admin', NULL, NULL, '2023-07-05 02:57:58', '2023-07-05 02:57:58'),
(263, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Invoice', NULL, '2023-06-02', 2023, 6, 2, NULL, 'Monthly payment  June, July', '200,200', 400, '10% Discount', '200,200,100', 20, 380, 0, NULL, NULL, NULL, '2023-07-05 04:16:04', '2023-07-20 10:09:13'),
(265, 236, 5000235, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', 'Invoice', NULL, '2023-06-02', 2023, 6, 2, NULL, 'Monthly payment  June, July', '200,200', 400, NULL, NULL, 0, 400, 0, NULL, NULL, NULL, '2023-07-05 04:16:04', '2023-07-05 04:16:04'),
(266, 267, 5000264, 1, 'Rayhan', 999001, 'Six', 'NA', 'A', 'Invoice', NULL, '2023-07-18', 2023, 7, 18, NULL, 'Payment July2022', '200', 200, NULL, NULL, 0, 200, 0, NULL, NULL, NULL, '2023-07-17 04:36:49', '2023-07-17 04:36:49'),
(267, 268, 5000267, 2, 'Istiak', 999001, 'Six', 'NA', 'A', 'Invoice', NULL, '2023-07-18', 2023, 7, 18, NULL, 'Payment July2022', '200', 200, NULL, NULL, 0, 200, 0, NULL, NULL, NULL, '2023-07-17 04:36:49', '2023-07-17 04:36:49'),
(268, 269, 5000268, 3, 'Akramul islam', 999001, 'Six', 'NA', 'A', 'Invoice', NULL, '2023-07-18', 2023, 7, 18, NULL, 'Payment July2022', '200', 200, NULL, NULL, 0, 200, 0, NULL, NULL, NULL, '2023-07-17 04:36:49', '2023-07-17 04:36:49'),
(269, 267, 5000264, 1, 'Rayhan', 999001, 'Six', 'NA', 'A', 'Payment', '2023-07-17 05:30:22', '2023-07-17', 2023, 7, 17, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 200, 'Admin', NULL, NULL, '2023-07-17 05:30:22', '2023-07-17 05:30:22'),
(270, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-18 03:57:34', '2023-07-18', 2023, 7, 18, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-18 03:57:34', '2023-07-18 03:57:34'),
(271, 258, 5000218, 1, 'Name 1', 120120, 'Seven', 'NA', 'A', 'Invoice', NULL, '2023-07-11', 2023, 7, 11, NULL, 'Payment dec 2022,trtt', '250,250', 500, NULL, NULL, 0, 500, 0, NULL, NULL, NULL, '2023-07-18 04:49:53', '2023-07-18 04:49:53'),
(272, 259, 5000218, 2, 'Name 2', 120120, 'Seven', 'NA', 'A', 'Invoice', NULL, '2023-07-11', 2023, 7, 11, NULL, 'Payment dec 2022,trtt', '250,250', 500, NULL, NULL, 0, 500, 0, NULL, NULL, NULL, '2023-07-18 04:49:53', '2023-07-18 04:49:53'),
(276, 259, 5000218, 2, 'Name 2', 120120, 'Seven', 'NA', 'A', 'Payment', '2023-07-18 06:17:39', '2023-07-18', 2023, 7, 18, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 200, 'Offline', 'School', NULL, '2023-07-18 06:17:39', '2023-07-18 06:17:39'),
(277, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:47:10', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 12:47:10', '2023-07-19 12:47:10'),
(278, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:47:35', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 12:47:35', '2023-07-19 12:47:35'),
(279, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:53:49', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 12:53:49', '2023-07-19 12:53:49'),
(280, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:54:13', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 12:54:13', '2023-07-19 12:54:13'),
(281, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:54:18', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 122, 'Offline', 'School', NULL, '2023-07-19 12:54:18', '2023-07-19 12:54:18'),
(282, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 12:54:40', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 12:54:40', '2023-07-19 12:54:40'),
(283, 236, 5000235, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 14:00:50', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 14:00:50', '2023-07-19 14:00:50'),
(284, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 14:17:54', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 10, 'Offline', 'School', NULL, '2023-07-19 14:17:54', '2023-07-19 14:17:54'),
(285, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-19 14:37:47', '2023-07-19', 2023, 7, 19, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-19 14:37:47', '2023-07-19 14:37:47'),
(286, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 05:54:32', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 50, 'Offline', 'School', NULL, '2023-07-20 05:54:32', '2023-07-20 05:54:32'),
(287, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 06:02:42', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'School', NULL, '2023-07-20 06:02:42', '2023-07-20 06:02:42'),
(288, 258, 5000218, 1, 'Name 1', 120120, 'Seven', 'NA', 'A', 'Payment', '2023-07-20 06:35:11', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 10, 'Offline', 'School', NULL, '2023-07-20 06:35:11', '2023-07-20 06:35:11'),
(289, 236, 5000235, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 06:35:26', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 20, 'Offline', 'School', NULL, '2023-07-20 06:35:26', '2023-07-20 06:35:26'),
(290, 236, 5000235, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 07:06:04', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 50, 'Offline', 'T-Rayhan', NULL, '2023-07-20 07:06:04', '2023-07-20 07:06:04'),
(291, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 09:44:38', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 1, 'Offline', 'School', NULL, '2023-07-20 09:44:38', '2023-07-20 09:44:38'),
(292, 258, 5000218, 1, 'Name 1', 120120, 'Seven', 'NA', 'A', 'Payment', '2023-07-20 10:10:28', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 100, 'Offline', 'T-Rayhan', NULL, '2023-07-20 10:10:28', '2023-07-20 10:10:28'),
(293, 234, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 'Payment', '2023-07-20 10:12:58', '2023-07-20', 2023, 7, 20, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 10, 'Offline', '12012005', NULL, '2023-07-20 10:12:58', '2023-07-20 10:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

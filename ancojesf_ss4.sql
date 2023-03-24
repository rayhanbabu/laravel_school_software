-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2023 at 01:10 AM
-- Server version: 10.3.38-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ancojesf_ss4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `forget_code` varchar(255) DEFAULT NULL,
  `forget_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admits`
--

CREATE TABLE `admits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `babu` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `sub1` varchar(255) DEFAULT NULL,
  `sub2` varchar(255) DEFAULT NULL,
  `sub3` varchar(255) DEFAULT NULL,
  `sub4` varchar(255) DEFAULT NULL,
  `sub5` varchar(255) DEFAULT NULL,
  `sub6` varchar(255) DEFAULT NULL,
  `sub7` varchar(255) DEFAULT NULL,
  `sub8` varchar(255) DEFAULT NULL,
  `sub9` varchar(255) DEFAULT NULL,
  `sub10` varchar(255) DEFAULT NULL,
  `sub11` varchar(255) DEFAULT NULL,
  `sub12` varchar(255) DEFAULT NULL,
  `sub13` varchar(255) DEFAULT NULL,
  `sub14` varchar(255) DEFAULT NULL,
  `sub15` varchar(255) DEFAULT NULL,
  `sub16` varchar(255) DEFAULT NULL,
  `sub17` varchar(255) DEFAULT NULL,
  `sub18` varchar(255) DEFAULT NULL,
  `sub19` varchar(255) DEFAULT NULL,
  `sub20` varchar(255) DEFAULT NULL,
  `time1` text DEFAULT NULL,
  `time2` text DEFAULT NULL,
  `time3` text DEFAULT NULL,
  `time4` text DEFAULT NULL,
  `time5` text DEFAULT NULL,
  `time6` text DEFAULT NULL,
  `time7` text DEFAULT NULL,
  `time8` text DEFAULT NULL,
  `time9` text DEFAULT NULL,
  `time10` text DEFAULT NULL,
  `time11` text DEFAULT NULL,
  `time12` text DEFAULT NULL,
  `time13` text DEFAULT NULL,
  `time14` text DEFAULT NULL,
  `time15` varchar(255) DEFAULT NULL,
  `time16` varchar(255) DEFAULT NULL,
  `time17` varchar(255) DEFAULT NULL,
  `time18` varchar(255) DEFAULT NULL,
  `time19` varchar(255) DEFAULT NULL,
  `time20` varchar(255) DEFAULT NULL,
  `date1` date DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `date4` date DEFAULT NULL,
  `date5` date DEFAULT NULL,
  `date6` date DEFAULT NULL,
  `date7` date DEFAULT NULL,
  `date8` date DEFAULT NULL,
  `date9` date DEFAULT NULL,
  `date10` date DEFAULT NULL,
  `date11` date DEFAULT NULL,
  `date12` date DEFAULT NULL,
  `date13` date DEFAULT NULL,
  `date14` date DEFAULT NULL,
  `date15` date DEFAULT NULL,
  `date16` date DEFAULT NULL,
  `date17` date DEFAULT NULL,
  `date18` date DEFAULT NULL,
  `date19` date DEFAULT NULL,
  `date20` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admits`
--

INSERT INTO `admits` (`id`, `eiin`, `class`, `babu`, `section`, `time`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`, `sub19`, `sub20`, `time1`, `time2`, `time3`, `time4`, `time5`, `time6`, `time7`, `time8`, `time9`, `time10`, `time11`, `time12`, `time13`, `time14`, `time15`, `time16`, `time17`, `time18`, `time19`, `time20`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`, `date7`, `date8`, `date9`, `date10`, `date11`, `date12`, `date13`, `date14`, `date15`, `date16`, `date17`, `date18`, `date19`, `date20`, `created_at`, `updated_at`) VALUES
(2, 130130, 'Ten', 'Science', 'A', '434', '117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12.00am-02.00pm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2022-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:35:45', '2022-12-06 13:35:45'),
(3, 120161, 'Six', 'NA', 'A', '434', '101', '104', '107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10am-1.00pm', '10am- 1.00pm', '10am- 1.00pm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2022-12-13', '2022-12-14', '2022-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 15:50:58', '2022-12-12 15:50:58'),
(9, 120120, 'Six', 'NA', 'B', '434', '102', '103', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10.00 am - 1.00', '10.00 am - 1.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2023-06-06', '2023-06-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 01:17:25', '2023-01-15 01:17:25'),
(10, 999000, 'Ten', 'Science', 'A', '434', '116', '121', '117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10.00-01.00', '10.00-01.00', '10.00-01.00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2023-01-16', '2023-01-17', '2023-01-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 16:52:23', '2023-01-15 16:52:23'),
(11, 999001, 'Six', 'NA', 'A', '434', '125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10:00-1:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2023-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:58:10', '2023-02-13 22:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `attens`
--

CREATE TABLE `attens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attens`
--

INSERT INTO `attens` (`id`, `uid`, `eiin`, `class`, `babu`, `section`, `date`, `day`, `month`, `year`, `status`, `others`, `created_at`, `updated_at`) VALUES
(8, 23, 130130, 'Six', 'Na', 'A', '2022-12-06', 6, 12, 2022, 1, NULL, '2022-12-06 14:06:54', '2022-12-06 14:06:54'),
(9, 24, 130130, 'Six', 'Na', 'A', '2022-12-06', 6, 12, 2022, 0, NULL, '2022-12-06 14:06:54', '2022-12-06 14:07:09'),
(10, 25, 130130, 'Six', 'Na', 'A', '2022-12-06', 6, 12, 2022, 1, NULL, '2022-12-06 14:06:54', '2022-12-06 14:06:54'),
(11, 23, 130130, 'Six', 'Na', 'A', '2022-12-07', 7, 12, 2022, 0, NULL, '2022-12-06 14:07:20', '2022-12-06 14:07:30'),
(12, 24, 130130, 'Six', 'Na', 'A', '2022-12-07', 7, 12, 2022, 1, NULL, '2022-12-06 14:07:20', '2022-12-06 14:07:20'),
(13, 25, 130130, 'Six', 'Na', 'A', '2022-12-07', 7, 12, 2022, 1, NULL, '2022-12-06 14:07:20', '2022-12-06 14:07:20'),
(15, 30, 120161, 'Six', 'NA', 'A', '2022-12-02', 2, 12, 2022, 0, NULL, '2022-12-12 16:08:17', '2022-12-12 16:08:17'),
(16, 31, 120161, 'Six', 'NA', 'A', '2022-12-02', 2, 12, 2022, 1, NULL, '2022-12-12 16:08:17', '2022-12-12 16:08:17'),
(18, 30, 120161, 'Six', 'NA', 'A', '2022-12-13', 13, 12, 2022, 1, NULL, '2022-12-12 16:08:28', '2022-12-12 16:08:28'),
(19, 31, 120161, 'Six', 'NA', 'A', '2022-12-13', 13, 12, 2022, 1, NULL, '2022-12-12 16:08:28', '2022-12-12 16:08:28'),
(20, 67, 120120, 'Six', 'NA', 'A', '2023-01-02', 2, 1, 2023, 0, NULL, '2023-01-03 00:59:04', '2023-01-03 00:59:04'),
(21, 68, 120120, 'Six', 'NA', 'A', '2023-01-02', 2, 1, 2023, 1, NULL, '2023-01-03 00:59:04', '2023-01-03 00:59:04'),
(22, 67, 120120, 'Six', 'NA', 'A', '2023-01-03', 3, 1, 2023, 1, NULL, '2023-01-03 00:59:46', '2023-01-03 00:59:46'),
(23, 68, 120120, 'Six', 'NA', 'A', '2023-01-03', 3, 1, 2023, 1, NULL, '2023-01-03 00:59:46', '2023-01-03 00:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE `calculations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `babu` varchar(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subcode` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `babu`, `eiin`, `class`, `subcode`, `text3`, `text4`, `created_at`, `updated_at`) VALUES
(1, 'NA', 120120, 'Six', '111,112,113,114,', NULL, NULL, '2023-02-07 03:25:46', '2023-03-21 03:04:11'),
(3, 'NA', 120120, 'Eight', '311,312,313,314,315,20316,317,', NULL, NULL, '2023-02-14 10:52:32', '2023-02-16 11:46:08'),
(4, 'Science', 120120, 'Nine', '411,412,413,414,415,20416,417,418,419,420,20423,20424,', NULL, NULL, '2023-02-14 10:53:03', '2023-02-16 11:48:46'),
(5, 'NA', 120120, 'Seven', '211,213,215,20216,217,218,219,', NULL, NULL, '2023-02-16 11:46:19', '2023-02-16 11:46:52'),
(6, 'Humanities', 120120, 'Nine', '611,612,613,614,615,20616,617,618,619,620,20623,20624,', NULL, NULL, '2023-02-16 11:47:06', '2023-02-16 11:47:38'),
(7, 'Commerce', 120120, 'Nine', '911,912,913,914,915,20916,917,918,919,920,20923,20924,', NULL, NULL, '2023-02-16 11:48:59', '2023-02-16 11:49:53'),
(9, 'Science', 120120, 'Ten', '511,512,513,514,515,20516,517,518,519,520,20523,20524,', NULL, NULL, '2023-02-16 11:50:30', '2023-02-16 11:51:00'),
(10, 'Humanities', 120120, 'Ten', '711,712,713,714,715,20716,717,718,719,720,20723,20724,', NULL, NULL, '2023-02-16 11:51:12', '2023-02-16 11:51:41'),
(11, 'Commerce', 120120, 'Ten', '811,812,813,814,815,20816,817,818,819,820,20823,20824,', NULL, NULL, '2023-02-16 11:51:54', '2023-02-16 11:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `color1` varchar(255) DEFAULT NULL,
  `color2` varchar(255) DEFAULT NULL,
  `color3` varchar(255) DEFAULT NULL,
  `color4` varchar(255) DEFAULT NULL,
  `color5` varchar(255) DEFAULT NULL,
  `color6` varchar(255) DEFAULT NULL,
  `color7` varchar(255) DEFAULT NULL,
  `color8` varchar(255) DEFAULT NULL,
  `color9` varchar(255) DEFAULT NULL,
  `color10` varchar(255) DEFAULT NULL,
  `color11` varchar(255) DEFAULT NULL,
  `color12` varchar(255) DEFAULT NULL,
  `color13` varchar(255) DEFAULT NULL,
  `color14` varchar(255) DEFAULT NULL,
  `color15` varchar(255) DEFAULT NULL,
  `color16` varchar(255) DEFAULT NULL,
  `color17` varchar(255) DEFAULT NULL,
  `color18` varchar(255) DEFAULT NULL,
  `color19` varchar(255) DEFAULT NULL,
  `color20` varchar(255) DEFAULT NULL,
  `color21` varchar(255) DEFAULT NULL,
  `color22` varchar(255) DEFAULT NULL,
  `color23` varchar(255) DEFAULT NULL,
  `color24` varchar(255) DEFAULT NULL,
  `color25` varchar(255) DEFAULT NULL,
  `color26` varchar(255) DEFAULT NULL,
  `color27` varchar(255) DEFAULT NULL,
  `color28` varchar(255) DEFAULT NULL,
  `color29` varchar(255) DEFAULT NULL,
  `color30` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `eiin`, `color1`, `color2`, `color3`, `color4`, `color5`, `color6`, `color7`, `color8`, `color9`, `color10`, `color11`, `color12`, `color13`, `color14`, `color15`, `color16`, `color17`, `color18`, `color19`, `color20`, `color21`, `color22`, `color23`, `color24`, `color25`, `color26`, `color27`, `color28`, `color29`, `color30`, `created_at`, `updated_at`) VALUES
(2, 130130, '41', '41', '41', '41', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:00:38', '2022-12-06 13:00:38'),
(3, 120161, '41', '41', '0', '153', '#0d0d0d', '#706666', '#0039e6', '#4d79ff', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:01:17', '2022-12-13 00:59:47'),
(4, 120154, '41', '41', '41', '41', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-21 16:15:52', '2022-12-21 16:15:52'),
(5, 120120, '41', '41', '41', '41', '#0d0d0d', '#706666', '#002699', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03 01:18:39', '2023-03-21 03:34:36'),
(6, 120144, '41', '41', '41', '41', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 16:06:52', '2023-01-11 16:06:52'),
(7, 999000, '41', '41', '41', '41', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21 03:41:56', '2023-01-21 03:41:56'),
(8, 999001, '41', '41', '41', '41', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0d0d0d', '#706666', '#0066ff', '#80b3ff', NULL, NULL, NULL, NULL, NULL, NULL, '61', '61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:09:58', '2023-02-13 22:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `eiin_sms`
--

CREATE TABLE `eiin_sms` (
  `id` int(255) NOT NULL,
  `eiin` int(100) NOT NULL,
  `school` varchar(450) DEFAULT NULL,
  `smsno` int(255) NOT NULL,
  `payment` int(120) NOT NULL,
  `payment_type` varchar(500) DEFAULT NULL,
  `ref` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) DEFAULT NULL,
  `verify_status` varchar(100) DEFAULT NULL,
  `payment_time` timestamp NULL DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_year` int(25) DEFAULT NULL,
  `payment_month` int(25) DEFAULT NULL,
  `payment_day` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eiin_sms`
--

INSERT INTO `eiin_sms` (`id`, `eiin`, `school`, `smsno`, `payment`, `payment_type`, `ref`, `created_at`, `status`, `verify_status`, `payment_time`, `payment_date`, `payment_year`, `payment_month`, `payment_day`) VALUES
(6, 120154, 'AlHaj Kasimuddin Ahmed High School', 750, 300, 'Admin', '', '2022-12-27 13:00:14', '1', '1', '2022-12-23 00:03:40', '2022-12-22', 2022, 12, 22),
(7, 120120, 'Demo High School', 750, 300, '', '', '2022-12-31 02:43:33', '0', '0', '2010-10-10 14:10:10', '2022-12-31', 2022, 12, 31),
(8, 120120, 'Demo High School', 750, 300, 'Admin', '', '2022-12-31 02:44:01', '1', '1', '2022-12-31 13:44:01', '2022-12-31', 2022, 12, 31),
(9, 120120, 'Demo High School', 750, 300, '', '', '2023-01-02 22:06:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 999000, 'nExclusive Tuition  Point', 750, 300, 'Admin', '', '2023-01-07 08:09:47', '1', '1', '2023-01-07 19:09:42', '2023-01-07', 2023, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `examinfos`
--

CREATE TABLE `examinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinfos`
--

INSERT INTO `examinfos` (`id`, `eiin`, `class`, `babu`, `section`, `year`, `exam`, `created_at`, `updated_at`) VALUES
(3, 120120, 'Eight', 'NA', 'A', 2023, 1, '2022-12-02 02:23:27', '2023-03-09 02:02:24'),
(4, 120120, 'Nine', 'Science', 'A', 2023, 2, '2022-12-02 02:23:40', '2023-03-22 03:06:33'),
(5, 120120, 'Nine', 'Humanities', 'A', 2023, 2, '2022-12-02 02:23:51', '2023-03-23 14:14:56'),
(6, 120120, 'Nine', 'Commerce', 'A', 2023, 2, '2022-12-02 02:24:03', '2023-03-23 18:42:49'),
(7, 120120, 'Ten', 'Science', 'A', 2023, 1, '2022-12-02 02:24:14', '2023-01-12 14:16:54'),
(8, 120120, 'Ten', 'Humanities', 'A', 2023, 1, '2022-12-02 02:24:24', '2023-01-12 14:17:04'),
(9, 120120, 'Ten', 'Commerce', 'A', 2023, 1, '2022-12-02 02:24:36', '2023-01-12 14:17:15'),
(10, 130130, 'Six', 'NA', 'A', 2022, 1, '2022-12-06 12:48:48', '2022-12-06 12:48:48'),
(11, 130130, 'Seven', 'NA', 'A', 2022, 1, '2022-12-06 12:49:00', '2022-12-06 12:49:00'),
(12, 130130, 'Eight', 'NA', 'A', 2022, 1, '2022-12-06 12:49:10', '2022-12-06 12:49:10'),
(13, 130130, 'Nine', 'Science', 'A', 2022, 1, '2022-12-06 12:49:19', '2022-12-06 12:49:19'),
(14, 130130, 'Nine', 'Humanities', 'A', 2022, 1, '2022-12-06 12:49:28', '2022-12-06 12:49:28'),
(15, 130130, 'Nine', 'Commerce', 'A', 2022, 1, '2022-12-06 12:49:37', '2022-12-06 12:49:37'),
(16, 130130, 'Ten', 'Science', 'A', 2022, 1, '2022-12-06 12:49:46', '2022-12-06 12:49:46'),
(17, 130130, 'Ten', 'Humanities', 'A', 2022, 1, '2022-12-06 12:50:02', '2022-12-06 12:50:02'),
(18, 130130, 'Ten', 'Commerce', 'A', 2022, 1, '2022-12-06 12:50:13', '2022-12-06 12:50:13'),
(19, 120161, 'Six', 'NA', 'A', 2022, 2, '2022-12-12 13:45:47', '2022-12-13 00:49:31'),
(20, 120161, 'Seven', 'NA', 'A', 2022, 1, '2022-12-12 13:46:25', '2022-12-12 13:46:25'),
(21, 120161, 'Eight', 'NA', 'A', 2022, 1, '2022-12-12 13:46:36', '2022-12-12 13:46:36'),
(22, 120161, 'Nine', 'Science', 'A', 2022, 2, '2022-12-12 13:46:46', '2022-12-13 01:38:45'),
(23, 120161, 'Nine', 'Humanities', 'A', 2022, 1, '2022-12-12 13:47:02', '2022-12-12 13:47:02'),
(24, 120161, 'Nine', 'Commerce', 'A', 2022, 1, '2022-12-12 13:47:13', '2022-12-12 13:47:13'),
(25, 120161, 'Ten', 'Science', 'A', 2022, 1, '2022-12-12 13:47:24', '2022-12-12 13:47:24'),
(26, 120161, 'Ten', 'Humanities', 'A', 2022, 1, '2022-12-12 13:47:34', '2022-12-12 13:47:34'),
(27, 120161, 'Ten', 'Commerce', 'A', 2022, 1, '2022-12-12 13:47:44', '2022-12-12 13:47:44'),
(29, 999000, 'Six', 'NA', 'A', 2022, 1, '2023-01-07 03:20:53', '2023-01-07 03:20:53'),
(30, 999000, 'Seven', 'NA', 'A', 2022, 1, '2023-01-07 03:21:06', '2023-01-07 03:21:06'),
(31, 999000, 'Eight', 'NA', 'A', 2022, 1, '2023-01-07 03:21:17', '2023-01-07 03:21:17'),
(32, 999000, 'Nine', 'Science', 'A', 2022, 1, '2023-01-07 03:59:37', '2023-01-07 03:59:37'),
(33, 999000, 'Nine', 'Humanities', 'A', 2022, 1, '2023-01-07 03:59:47', '2023-01-07 03:59:47'),
(34, 999000, 'Nine', 'Commerce', 'A', 2022, 1, '2023-01-07 03:59:59', '2023-01-07 03:59:59'),
(35, 999000, 'Ten', 'Science', 'A', 2022, 1, '2023-01-07 04:00:08', '2023-01-07 04:00:08'),
(36, 999000, 'Ten', 'Humanities', 'A', 2022, 1, '2023-01-07 04:00:28', '2023-01-07 04:00:28'),
(37, 999000, 'Ten', 'Commerce', 'A', 2022, 1, '2023-01-07 04:00:37', '2023-01-07 04:00:37'),
(38, 999001, 'Six', 'NA', 'A', 2023, 4, '2023-02-13 22:01:14', '2023-02-13 22:01:14'),
(39, 999001, 'Seven', 'NA', 'A', 2023, 4, '2023-02-13 22:01:32', '2023-02-13 22:01:32'),
(40, 999001, 'Eight', 'NA', 'A', 2023, 4, '2023-02-13 22:01:52', '2023-02-13 22:01:52'),
(41, 999001, 'Nine', 'Science', 'A', 2023, 4, '2023-02-13 22:02:09', '2023-02-13 22:02:09'),
(42, 999001, 'Ten', 'Science', 'A', 2023, 4, '2023-02-13 22:02:50', '2023-02-13 22:02:50'),
(46, 120120, 'Six', 'NA', 'A', 2023, 1, '2023-03-22 01:49:51', '2023-03-22 01:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` int(11) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `text1` varchar(255) NOT NULL,
  `text2` varchar(255) NOT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `serial`, `babu`, `text1`, `text2`, `text3`, `text4`, `created_at`, `updated_at`) VALUES
(1, 1, 'class', 'Six', 'Six', NULL, NULL, '2022-10-12 04:34:00', '2022-10-12 04:34:00'),
(2, 2, 'class', 'Seven', 'Seven', NULL, NULL, '2022-10-12 04:34:16', '2022-10-12 04:34:16'),
(3, 3, 'class', 'Eight', 'Eight', NULL, NULL, '2022-10-12 04:34:29', '2022-10-12 04:34:29'),
(4, 4, 'class', 'Nine', 'Nine', NULL, NULL, '2022-10-12 04:34:43', '2022-10-12 04:34:43'),
(5, 5, 'class', 'Ten', 'Ten', NULL, NULL, '2022-10-12 04:34:58', '2022-10-12 04:34:58'),
(6, 1, 'exam', 'Half Yearly', 'Half Yearly', 'Half Yearly Examination', NULL, '2022-10-12 04:35:18', '2022-12-03 13:33:50'),
(7, 2, 'exam', 'Annual', 'Annual', 'Annual  Examination', NULL, '2022-10-12 04:35:43', '2022-12-03 13:34:04'),
(8, 1, 'group', 'NA', 'NA', NULL, NULL, '2022-10-12 04:35:59', '2022-12-01 06:55:58'),
(9, 2, 'group', 'Science', 'Science', NULL, NULL, '2022-10-12 04:36:58', '2022-10-12 04:36:58'),
(10, 3, 'group', 'Humanities', 'Humanities', NULL, NULL, '2022-10-12 04:37:14', '2022-10-12 04:37:14'),
(11, 101, 'subject', 'Bangla', 'Bangla', NULL, NULL, '2022-10-12 04:37:56', '2022-10-12 04:38:19'),
(12, 102, 'subject', 'Bangla 1st Paper', 'Bangla 1st Paper', NULL, NULL, '2022-10-12 04:38:40', '2022-10-12 04:38:50'),
(13, 103, 'subject', 'Bangla 2nd Paper', 'Bangla 2nd Paper', NULL, NULL, '2022-10-12 04:39:10', '2022-10-12 04:39:10'),
(14, 104, 'subject', 'English', 'English', NULL, NULL, '2022-10-12 04:39:28', '2022-10-12 04:39:28'),
(15, 105, 'subject', 'English 1st Paper', 'English 1st Paper', NULL, NULL, '2022-10-12 04:39:54', '2022-10-12 04:39:54'),
(16, 106, 'subject', 'English 2nd Paper', 'English 2nd Paper', NULL, NULL, '2022-10-12 04:40:18', '2022-10-12 04:40:18'),
(17, 107, 'subject', 'Mathematics', 'Mathematics', NULL, NULL, '2022-10-12 04:40:38', '2022-10-12 04:40:38'),
(18, 108, 'subject', 'Moral Education', 'Moral Education', NULL, NULL, '2022-10-12 04:41:11', '2022-10-12 04:41:11'),
(19, 109, 'subject', 'Science', 'Science', NULL, NULL, '2022-10-12 04:41:25', '2022-10-12 04:41:25'),
(20, 110, 'subject', 'Bangladesh & Global studies', 'Bangladesh & Global studies', NULL, NULL, '2022-10-12 04:41:47', '2022-10-12 04:41:47'),
(21, 111, 'subject', 'I.C.T.', 'I.C.T.', NULL, NULL, '2022-10-12 04:42:01', '2022-10-12 04:42:01'),
(22, 112, 'subject', 'Agriculture', 'Agriculture', NULL, NULL, '2022-10-12 04:42:16', '2022-10-12 04:42:16'),
(23, 113, 'subject', 'Work & LOE', 'Work & LOE', NULL, NULL, '2022-10-12 04:42:44', '2022-10-12 04:42:44'),
(24, 114, 'subject', 'Physical Education', 'Physical Education', NULL, NULL, '2022-10-12 04:43:04', '2022-10-12 04:43:04'),
(25, 115, 'subject', 'Arts & Crafts', 'Arts & Crafts', NULL, NULL, '2022-10-12 04:43:20', '2022-10-12 04:43:20'),
(26, 116, 'subject', 'Physics', 'Physics', NULL, NULL, '2022-10-12 04:43:37', '2022-10-12 04:43:37'),
(27, 117, 'subject', 'Chemistry', 'Chemistry', NULL, NULL, '2022-10-12 04:43:55', '2022-10-12 04:43:55'),
(29, 118, 'subject', 'Career Education', 'Career Education', NULL, NULL, '2022-10-12 04:45:06', '2022-10-12 04:45:06'),
(30, 119, 'subject', 'Geography & Environment', 'Geography & Environment', NULL, NULL, '2022-10-12 04:45:28', '2022-12-01 06:59:12'),
(31, 120, 'subject', 'History Of BWC', 'History Of BWC', NULL, NULL, '2022-10-12 04:45:54', '2022-10-12 04:45:54'),
(32, 121, 'subject', 'Biology', 'Biology', NULL, NULL, '2022-10-12 04:46:14', '2022-10-12 04:46:14'),
(33, 122, 'subject', 'Higher Math', 'Higher Math', NULL, NULL, '2022-10-12 04:46:29', '2022-10-12 04:46:29'),
(34, 123, 'subject', 'Civics & Citizenship', 'Civics & Citizenship', NULL, NULL, '2022-10-12 04:46:48', '2022-12-01 07:00:18'),
(35, 124, 'subject', 'Economics', 'Economics', NULL, NULL, '2022-10-12 04:47:27', '2022-10-12 04:47:27'),
(36, 1, 'year', '2021', '2021', NULL, NULL, '2022-10-12 04:47:43', '2022-10-12 04:47:43'),
(37, 1, 'shortsubject', 'Agr', 'Agriculture', NULL, NULL, '2022-10-12 04:48:06', '2023-01-02 00:52:01'),
(38, 2, 'shortsubject', 'Bio', 'Biology', NULL, NULL, '2022-10-12 04:48:39', '2022-10-12 04:48:39'),
(39, 3, 'shortsubject', 'Hig', 'Higher Math', NULL, NULL, '2022-10-12 04:49:07', '2022-10-12 04:49:07'),
(40, 4, 'shortsubject', 'Islam', 'Islam & Moral Education', NULL, NULL, '2022-10-12 04:49:44', '2022-10-12 04:49:44'),
(41, 5, 'shortsubject', 'Hindu', 'Hindu & Moral Education', NULL, NULL, '2022-10-12 04:50:01', '2022-10-12 04:50:01'),
(42, 6, 'shortsubject', 'Chirstian', 'Chirstian & Moral Education', NULL, NULL, '2022-10-12 04:51:02', '2022-10-12 04:51:02'),
(43, 7, 'shortsubject', 'Buddist', 'Buddist & Moral Education', NULL, NULL, '2022-10-12 04:51:15', '2022-10-12 04:51:15'),
(44, 8, 'shortsubject', 'Civ', 'Civics & Citizenship', NULL, NULL, '2022-10-12 04:51:36', '2022-12-01 06:51:38'),
(45, 9, 'shortsubject', 'Eco', 'Economics', NULL, NULL, '2022-10-12 04:51:55', '2022-10-12 04:51:55'),
(46, 2, 'year', '2022', '2022', NULL, NULL, '2022-10-12 04:52:26', '2022-10-12 04:52:26'),
(47, 3, 'exam', 'Model/Test', 'Model/Test', 'Model/Test  Examination', NULL, '2022-12-01 06:53:52', '2022-12-03 13:34:23'),
(48, 4, 'group', 'Commerce', 'Commerce', 'Business  Study', NULL, '2022-12-01 06:57:02', '2022-12-01 06:57:02'),
(49, 125, 'subject', 'Accounting', 'Accounting', NULL, NULL, '2022-12-01 07:01:46', '2022-12-01 07:01:46'),
(50, 126, 'subject', 'Finance Banking', 'Finance Banking', NULL, NULL, '2022-12-01 07:02:02', '2022-12-01 07:02:02'),
(51, 127, 'subject', 'Entrepreneurship', 'Entrepreneurship', NULL, NULL, '2022-12-01 07:02:30', '2022-12-01 07:02:30'),
(52, 128, 'subject', 'Agriculture/Higher Math', 'Agriculture/Higher Math', NULL, NULL, '2022-12-01 07:02:52', '2022-12-01 07:02:52'),
(53, 129, 'subject', 'Agriculture/Home Econ...', 'Agriculture/Home Econ...', NULL, NULL, '2022-12-01 07:03:08', '2022-12-01 07:03:08'),
(54, 3, 'year', '2023', '2023', NULL, NULL, '2022-12-01 07:03:48', '2022-12-01 07:03:48'),
(58, 10, 'shortsubject', 'Ent', 'Entrepreneurship', NULL, NULL, '2022-12-01 07:06:54', '2022-12-01 07:06:54'),
(59, 4, 'exam', '1st Term Annual', '1st Term Annual', '1st Term Annual  Examination', NULL, '2022-12-02 02:19:59', '2022-12-03 13:34:46'),
(60, 5, 'exam', '2nd Term Annual', '2nd Term Annual', '2nd Term Annual Examination', NULL, '2022-12-02 02:21:25', '2022-12-03 13:35:03'),
(61, 1, 'section', 'A', 'A', NULL, NULL, '2022-12-02 05:29:03', '2022-12-02 05:29:03'),
(62, 2, 'section', 'B', 'B', NULL, NULL, '2022-12-02 05:29:13', '2022-12-02 05:29:13'),
(63, 3, 'section', 'C', 'C', NULL, NULL, '2022-12-02 05:29:22', '2022-12-02 05:29:22'),
(64, 4, 'section', 'D', 'D', NULL, NULL, '2022-12-02 05:29:32', '2022-12-02 05:29:32'),
(66, 1, 'sms', '300', '750sms(300TK)', NULL, NULL, '2022-12-05 03:27:23', '2022-12-05 03:27:23'),
(67, 2, 'sms', '500', '1250sms(500TK)', NULL, NULL, '2022-12-05 03:27:53', '2022-12-05 03:27:53'),
(68, 3, 'sms', '1000', '2500sms(1000TK)', NULL, NULL, '2022-12-05 03:28:24', '2022-12-05 03:28:24'),
(69, 15, 'shortsubject', 'NA', 'NA', NULL, NULL, '2023-01-02 00:52:43', '2023-01-02 00:52:43'),
(70, 4, 'year', '2020', '2020', NULL, NULL, '2023-01-04 04:40:48', '2023-01-04 04:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `exstudents`
--

CREATE TABLE `exstudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `codema` varchar(255) DEFAULT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `roll` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `moral` varchar(255) DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `addi` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `pre_class` varchar(255) DEFAULT NULL,
  `next_class` varchar(255) DEFAULT NULL,
  `pre_babu` varchar(255) DEFAULT NULL,
  `next_babu` varchar(255) DEFAULT NULL,
  `pre_year` varchar(255) DEFAULT NULL,
  `next_year` varchar(255) DEFAULT NULL,
  `other1` varchar(255) DEFAULT NULL,
  `other2` varchar(255) DEFAULT NULL,
  `other3` varchar(255) DEFAULT NULL,
  `other4` varchar(255) DEFAULT NULL,
  `syear` varchar(25) DEFAULT NULL,
  `sexam` text DEFAULT NULL,
  `sgp` text DEFAULT NULL,
  `sg` text DEFAULT NULL,
  `sroll` text DEFAULT NULL,
  `sreg` text DEFAULT NULL,
  `sboard` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exstudents`
--

INSERT INTO `exstudents` (`id`, `image`, `codema`, `stu_id`, `roll`, `name`, `eiin`, `class`, `section`, `babu`, `year`, `exam`, `moral`, `main`, `addi`, `birth_date`, `father`, `mother`, `address`, `phone`, `pre_class`, `next_class`, `pre_babu`, `next_babu`, `pre_year`, `next_year`, `other1`, `other2`, `other3`, `other4`, `syear`, `sexam`, `sgp`, `sg`, `sroll`, `sreg`, `sboard`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, 5000000, 1, 'Md Rayhan Babu', 120120, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2022-12-15', 'MD MEHERUL ISLAM MEHERUL', 'MOST RANI ARA RANI ARA', 'VILLAGE: JOGOTPUR, UPZULA:BIROL,ZILA:DINAJPUR', 1750360044, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'HSC', '3.52', 'A-', '254522', '545256562545', 'Dinajpur', '2022-12-13 15:51:45', '2023-01-09 17:31:10'),
(10, NULL, NULL, 5000003, 247032, 'MST:TASMIN AKTER', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2007-01-01', 'MD. MATIAR RAHMAN', 'MST.RANUJA BEGUM', 'Village:-BISNUPUR, Post office:-BIRAL, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.50', 'A', '247032', '1910664141', 'Dinajpur', '2023-01-08 18:47:43', '2023-01-10 06:05:45'),
(11, NULL, NULL, 5000010, 1, 'Md Rayhan Babu', 120144, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2007-01-02', 'MD MEHERUL ISLAM MEHERUL', 'MOST RANI ARA RANI ARA', 'VILLAGE: JOGOTPUR, UPZULA:BIROL,ZILA:DINAJPUR', 1750360044, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-2022', 'SSC', '3.52', 'A-', '254522', '545256562545', 'Dinajpur', '2023-01-11 16:05:48', '2023-01-11 16:06:04'),
(12, NULL, NULL, 5000011, 247041, 'MST. ATIYA TAJMIN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-09-01', 'MD.ATABUR ROHAMAN', 'MST. MOHIMA KHATUN', 'Village:-KAZIPARA, Post office:-KAZIPARA, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.50', 'A', '247041', '1917806782', 'Dinajpur', '2023-01-11 17:19:01', '2023-01-11 18:01:09'),
(13, NULL, NULL, 5000012, 247042, 'MST.BEAUTY BEGUM', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-03-26', 'MD. ALAUDDIN', 'MST. AKHTER BANU', 'Village:-KAZIPARA, Post office:-KAZIPARA, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.61', 'A', '247042', '1917806783', 'Dinajpur', '2023-01-15 18:02:58', '2023-01-16 18:35:06'),
(14, NULL, NULL, 5000013, 247039, 'MST.SANJIDA AKTER', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-08-04', 'MD. ABDUL MALEK', 'MST. ARFATUN NEHAR', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.22', 'A-', '247039', '1917806039', 'Dinajpur', '2023-01-16 18:30:26', '2023-01-18 16:04:23'),
(15, NULL, NULL, 5000014, 247043, 'MARIYA AKTER MIM', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2006-11-01', 'MD. MONTAJUL ISLAM', 'MST.REHANA PARVIN', 'Village:-RAMPUR, Post office:- M NAGOR BARI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.56', 'A', '247043', '1918824999', 'Dinajpur', '2023-01-16 18:45:23', '2023-01-18 16:48:52'),
(16, NULL, NULL, 5000015, 564697, 'MST. AMRUNA AKTER AFRIN', 120154, 'Ten', 'A', 'Humanities', 2022, NULL, NULL, NULL, NULL, '2003-05-10', 'MD. AMIRUDDIN', 'MST. KOHINUR BEGUM', 'Village:-EVIRAMPUR, Post office:-SARANGAI PALASHBARI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '2.94', 'C', '564697', '1817804231', 'Dinajpur', '2023-01-16 19:08:47', '2023-01-16 19:10:21'),
(17, NULL, NULL, 5000016, 247055, 'MD. MINHAJUL ISLAM', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2006-01-01', 'MD. ABDUS SALAM', 'MST. MAHABUBA KHATUN', 'Village:-ROBIPUR, Post office:-BIRAL, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.17', 'A', '247055', '1917806667', 'Dinajpur', '2023-01-22 14:27:38', '2023-01-22 14:29:34'),
(18, NULL, NULL, 5000017, 247054, 'MD. MUSADDAK HOSSAIN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2006-07-09', 'MD. MAHBUB ALAM', 'MST. BABY AKTER', 'Village:-ROBIPUR, Post office:-BIRAL, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.44', 'A', '247054', '1917806664', 'Dinajpur', '2023-01-22 14:35:28', '2023-01-22 14:37:48'),
(19, NULL, NULL, 5000018, 247047, 'MD. JISAN BABU', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2007-12-02', 'MD. KHOLIL', 'MST. JINNATUN BEGUM', 'Village:-POLASHBARI, Post office:-SARANGAI POLASHBARI , Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.83', 'A', '247047', '1917805675', 'Dinajpur', '2023-01-22 16:07:36', '2023-01-22 16:11:22'),
(20, NULL, NULL, 5000019, 247040, 'MST. SATHI PARVEEN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2003-12-30', 'MD. SORIF UDDIN', 'MST. ROHIMA KHATUN', 'Village:-KAZIPARA, Post office:-KAZIPARA, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.28', 'A', '247040', '1917806777', 'Dinajpur', '2023-01-22 16:16:44', '2023-01-22 16:19:35'),
(21, NULL, NULL, 5000020, 757432, 'MD. RASSAD BABU', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2003-09-10', 'MD. ABDUL MALEQ', 'MST. AKTAR BANU', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-2020', 'SSC', '2.72', 'C', '757432', '1817805324', 'Dinajpur', '2023-01-23 16:02:31', '2023-01-23 16:18:07'),
(22, NULL, NULL, 5000021, 564704, 'LITON CHANDRA ROY', 120154, 'Ten', 'A', 'Humanities', 2022, NULL, NULL, NULL, NULL, '2003-08-19', 'JHADUB CHANDRA', 'ULBALA', 'Village:-BISNUPUR, Post office:-BIRAL, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '2.72', 'C', '564704', '1917806044', 'Dinajpur', '2023-01-23 16:32:56', '2023-01-23 16:37:34'),
(23, NULL, NULL, 5000022, 247052, 'TUSHAR CHANDRA ROY', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-02-05', 'SONATON BARMON', 'BULBULI RANI', 'Village:-MIRZAPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.78', 'A-', '247052', '1917806045', 'Dinajpur', '2023-01-23 16:42:17', '2023-01-23 16:43:47'),
(24, NULL, NULL, 5000023, 247045, 'MD. REZANUR BABU', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-06-21', 'MD. ALIMUDDIN', 'MST. REHANA BANU', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.94', 'A-', '247045', '1817804279', 'Dinajpur', '2023-01-23 16:48:46', '2023-01-23 16:50:32'),
(25, NULL, NULL, 5000024, 247044, 'TANJILA AKTER', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-06-10', 'MD. TORIKUL ISLAM', 'LOVELY BEGUM', 'Village:-MADHOB-BATI, Post office:-MADHOB-BATI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.89', 'A', '247044', '1918825000', 'Dinajpur', '2023-01-23 17:02:42', '2023-01-23 17:04:32'),
(27, NULL, NULL, 5000026, 247058, 'MD. RIPON HOSSAN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-02-12', 'MD. ASRAF ALI', 'MST. ROJINA KHATUN', 'Village:-BROMMOPUR, Post office:-BROMMOPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.94', 'A-', '247058', '1917807101', 'Dinajpur', '2023-01-23 17:42:37', '2023-01-23 17:43:40'),
(28, NULL, NULL, 5000027, 247046, 'MD. ROCKNURJJAMAN ROCKY', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-11-11', 'MD. NAJMUL ISLAM', 'MST. RAZIA KHATUN', 'Village:-POCHAKANDOR, Post office:-MADHOBBATI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.83', 'A', '247046', '1917803751', 'Dinajpur', '2023-01-23 17:48:23', '2023-01-23 17:49:38'),
(29, NULL, NULL, 5000028, 247056, 'MD. NAJMUL HOSSAIN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-10-06', 'MD. AINUL HOQUE', 'MST. NARGIS BEGUM', 'Village:-BORAHA NAGOR, Post office:-KAZIPARA, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.78', 'A-', '247056', '1917806668', 'Dinajpur', '2023-01-23 17:57:56', '2023-01-23 17:59:03'),
(30, NULL, NULL, 5000029, 247059, 'MD. SAZZAD HOSSIN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2006-02-05', 'MD. ZAHANGIR ALAM', 'SAHINA BEGUM', 'Village:-GHAGRAGACI, Post office:-M. NAGARBARI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.33', 'A', '247059', '1918824976', 'Dinajpur', '2023-01-23 18:06:00', '2023-01-23 18:07:33'),
(31, NULL, NULL, 5000030, 247053, 'MD.SOFIQUL ISLAM', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2003-10-07', 'MD. AMINUL ISLAM', 'MST. SORIFA KHATUN', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.67', 'A', '247053', '1917806049', 'Dinajpur', '2023-01-29 15:51:59', '2023-01-29 15:53:21'),
(32, NULL, NULL, 5000031, 247033, 'MST. REBEKA SULTANA', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-06-23', 'MD. REAZUL ISLAM', 'MST. HUSNEARA', 'Village:- DAKKHIN JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '5.00', 'A+', '247033', '1912850112', 'Dinajpur', '2023-01-29 16:28:48', '2023-01-29 16:30:48'),
(33, NULL, NULL, 5000032, 247057, 'MD. ARMAN ALI', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-10-09', 'MD. ROMJAN ALI', 'MST. ARZUNA KHATUN', 'Village:-BISNUPUR, P.o:-BIRAL, Upazila:-BIRAL, Dis:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.44', 'A', '247057', '1917807036', 'Dinajpur', '2023-02-01 16:29:42', '2023-02-01 16:32:39'),
(34, NULL, NULL, 5000033, 5, 'gfhdfhj', 999001, 'Ten', 'A', 'Science', 2023, NULL, NULL, NULL, NULL, '2006-02-08', 'fgh', 'fghd', 'fg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-2022', 'ssc', '5.00', 'A+', '4556', '545645623', 'D', '2023-02-13 23:11:09', '2023-02-13 23:11:59'),
(35, NULL, NULL, 5000034, 247031, 'RAZIYA KHATUN LAM', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2006-07-26', 'MD. ABDUR RAZZAK', 'MST. PARUL BEGUM', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.89', 'A', '247031', '1910251711', 'DINAJPUR', '2023-02-16 16:34:46', '2023-02-16 16:40:14'),
(36, NULL, NULL, 5000035, 247050, 'MD. ABU BOKKOR', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-01-26', 'MD. NOZRUL ISLAM', 'MST. SULTANA', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '4.22', 'A', '247050', '1917806034', 'DINAJPUR', '2023-02-16 16:59:24', '2023-02-16 19:46:01'),
(37, NULL, NULL, 5000036, 247048, 'MD. LIMON BADSHA', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2005-04-12', 'MD. LAYAKOT ALI', 'MST. BUETY ARA', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.67', 'A-', '247048', '1917806030', 'DINAJPUR', '2023-03-19 16:29:07', '2023-03-19 16:31:21'),
(38, NULL, NULL, 5000037, 564702, 'MD. MOSADDAK HOSSAIN', 120154, 'Ten', 'A', 'Humanities', 2022, NULL, NULL, NULL, NULL, '2004-05-13', 'MD. NEAJUL ISLAM', 'MST. MOKSENARA KHATUN', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '2.89', 'C', '564702', '1917806038', 'DINAJPUR', '2023-03-19 16:34:59', '2023-03-19 16:37:04'),
(39, NULL, NULL, 5000038, 247051, 'MD. PARVEJ HOSSAIN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2003-12-12', 'MD. RAZAQUL HOSSAIN', 'MST. PARVEN BEGUM', 'Village:-IVRAMPUR, Post office:-SARANGI POLAS BARI, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.83', 'A-', '247051', '1917806035', 'DINAJPUR', '2023-03-19 16:48:57', '2023-03-19 16:50:27'),
(40, NULL, NULL, 5000039, 247049, 'MD. MAMUN', 120154, 'Ten', 'A', 'Science', 2022, NULL, NULL, NULL, NULL, '2004-01-10', 'MD. MAFIZUR RAHMAN', 'MST. MONJUARA', 'Village:-JAGATPUR, Post office:-BOZRAPUR, Upazila:-BIRAL, Dist:-DINAJPUR.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-2021', 'SSC', '3.94', 'A-', '247049', '1917806032', 'DINAJPUR', '2023-03-19 16:54:26', '2023-03-19 16:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `roll` int(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `pre_monthdue` int(11) NOT NULL DEFAULT 0,
  `invoice_date` date DEFAULT NULL,
  `invoice_month` int(11) NOT NULL,
  `invoice_year` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `des1` varchar(255) DEFAULT NULL,
  `amount1` int(11) NOT NULL DEFAULT 0,
  `des2` varchar(255) DEFAULT NULL,
  `amount2` int(11) NOT NULL DEFAULT 0,
  `des3` varchar(255) DEFAULT NULL,
  `amount3` int(11) NOT NULL DEFAULT 0,
  `des4` varchar(255) DEFAULT NULL,
  `amount4` int(11) NOT NULL DEFAULT 0,
  `des5` varchar(255) DEFAULT NULL,
  `amount5` int(11) NOT NULL DEFAULT 0,
  `des6` varchar(255) DEFAULT NULL,
  `amount6` int(11) NOT NULL DEFAULT 0,
  `totalamount` int(11) NOT NULL DEFAULT 0,
  `cur_monthpayment` int(11) NOT NULL DEFAULT 0,
  `cur_monthdue` int(11) NOT NULL DEFAULT 0,
  `payment_time` timestamp NULL DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_day` varchar(255) DEFAULT NULL,
  `payment_month` varchar(255) DEFAULT NULL,
  `payment_year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `uid`, `roll`, `name`, `eiin`, `class`, `babu`, `section`, `pre_monthdue`, `invoice_date`, `invoice_month`, `invoice_year`, `status`, `des1`, `amount1`, `des2`, `amount2`, `des3`, `amount3`, `des4`, `amount4`, `des5`, `amount5`, `des6`, `amount6`, `totalamount`, `cur_monthpayment`, `cur_monthdue`, `payment_time`, `payment_type`, `payment_date`, `payment_day`, `payment_month`, `payment_year`, `created_at`, `updated_at`) VALUES
(23, 23, NULL, NULL, 130130, 'Six', 'Na', 'A', 0, '2022-12-01', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:02:24', '2022-12-06 13:02:24'),
(24, 24, NULL, NULL, 130130, 'Six', 'Na', 'A', 0, '2022-12-01', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:03:33', '2022-12-06 13:03:33'),
(25, 25, NULL, NULL, 130130, 'Six', 'Na', 'A', 0, '2022-12-01', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:05:24', '2022-12-06 13:05:24'),
(26, 26, NULL, NULL, 130130, 'Ten', 'Science', 'A', 0, '2022-12-06', 12, 2022, '0', 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 300, 300, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:22:53', '2022-12-06 13:22:53'),
(27, 27, NULL, NULL, 130130, 'Ten', 'Science', 'A', 0, '2022-12-06', 12, 2022, '0', 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 300, 300, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:23:48', '2022-12-06 13:23:48'),
(28, 28, NULL, NULL, 130130, 'Ten', 'Science', 'A', 0, '2022-12-06', 12, 2022, '0', 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 300, 300, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-06 13:40:15', '2022-12-06 13:40:15'),
(30, 30, NULL, NULL, 120161, 'Six', 'NA', 'A', 0, '2022-12-05', 12, 2022, '0', 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 60, 60, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:13:44', '2022-12-12 14:13:44'),
(31, 31, NULL, NULL, 120161, 'Six', 'NA', 'A', 0, '2022-12-05', 12, 2022, '0', 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 60, 60, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:15:18', '2022-12-12 14:15:18'),
(32, 32, NULL, NULL, 120161, 'Nine', 'Science', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:17:09', '2022-12-12 14:17:09'),
(33, 33, NULL, NULL, 120161, 'Nine', 'Science', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:19:51', '2022-12-12 14:19:51'),
(34, 34, NULL, NULL, 120161, 'Nine', 'Science', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:20:25', '2022-12-12 14:20:25'),
(35, 35, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:21:22', '2022-12-12 14:21:22'),
(36, 36, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:22:56', '2022-12-12 14:22:56'),
(37, 37, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:24:42', '2022-12-12 14:24:42'),
(38, 38, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:26:38', '2022-12-12 14:26:38'),
(39, 39, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:27:14', '2022-12-12 14:27:14'),
(40, 40, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 0, '2022-12-12', 12, 2022, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-12 14:29:07', '2022-12-12 14:29:07'),
(78, 30, NULL, NULL, 120161, 'Six', 'NA', 'A', 60, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 60, 120, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(79, 31, NULL, NULL, 120161, 'Six', 'NA', 'A', 60, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 60, 120, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(80, 32, NULL, NULL, 120161, 'Nine', 'Science', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(81, 33, NULL, NULL, 120161, 'Nine', 'Science', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(82, 34, NULL, NULL, 120161, 'Nine', 'Science', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(83, 35, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(84, 36, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(85, 37, NULL, NULL, 120161, 'Ten', 'Humanities', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(86, 38, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(87, 39, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:49', '2022-12-13 02:52:49'),
(88, 40, NULL, NULL, 120161, 'Ten', 'Commerce', 'A', 100, '2023-01-01', 1, 2023, '0', 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 100, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-13 02:52:50', '2022-12-13 02:52:50'),
(192, 167, 1, 'Md Rayhan babu', 120120, 'Six', 'NA', 'B', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 15:49:47', '2023-01-14 15:49:47'),
(193, 168, 2, 'Humayan', 120120, 'Six', 'NA', 'B', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 15:50:00', '2023-01-14 15:50:00'),
(194, 169, 1, 'abcdefgh', 120120, 'Nine', 'Science', 'B', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 02:47:21', '2023-01-15 02:47:21'),
(208, 193, 1, 'MD Nafis Sultana', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-09 02:20:24', '2023-03-09 02:20:24'),
(209, 194, 2, 'Md Imran Hasan', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:04:56', '2023-03-12 04:04:56'),
(210, 195, 3, 'Md Labib Hasan', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:06:49', '2023-03-12 04:06:49'),
(211, 196, 4, 'Histesh Roy', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:08:51', '2023-03-12 04:08:51'),
(212, 197, 5, 'Md Abdul Ahad', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:09:54', '2023-03-12 04:09:54'),
(213, 198, 6, 'Md Ruhul Amin', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:10:59', '2023-03-12 04:10:59'),
(214, 199, 7, 'Md Ryatul Islam', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:11:46', '2023-03-12 04:11:46'),
(215, 200, 8, 'Prokash Sarker', 120120, 'Eight', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-12 04:13:04', '2023-03-12 04:13:04'),
(217, 202, 1, 'Laboni Akther Mou', 120120, 'Nine', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 01:45:45', '2023-03-15 01:45:45'),
(218, 203, 2, 'Farisha Rahman', 120120, 'Nine', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 01:47:07', '2023-03-15 01:47:07'),
(219, 204, 3, 'Maftahul Jannat Mou', 120120, 'Nine', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 01:48:49', '2023-03-15 01:48:49'),
(220, 205, 4, 'Mst. Soheli', 120120, 'Nine', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 01:50:28', '2023-03-15 01:50:28'),
(221, 206, 1, 'Md Rifat Hossain', 120120, 'Nine', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 03:15:15', '2023-03-15 03:15:15'),
(222, 207, 2, 'Sakhawat Hossain', 120120, 'Nine', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 03:15:54', '2023-03-15 03:15:54'),
(223, 208, 3, 'Imran Ali', 120120, 'Nine', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 03:16:33', '2023-03-15 03:16:33'),
(224, 209, 4, 'Durjoy Chandra Roy', 120120, 'Nine', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-15 03:17:05', '2023-03-15 03:17:05'),
(225, 210, 1, 'Ontorra Saha', 120120, 'Ten', 'Commerce', 'A', 0, '2023-01-03', 1, 2023, '0', 'Payment January 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:30:51', '2023-03-16 21:30:51'),
(226, 211, 2, 'Bithi', 120120, 'Ten', 'Commerce', 'A', 0, '2023-01-03', 1, 2023, '0', 'Payment January 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:31:36', '2023-03-16 21:31:36'),
(227, 212, 4, 'Maruf', 120120, 'Ten', 'Commerce', 'A', 0, '2023-01-03', 1, 2023, '0', 'Payment January 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:32:17', '2023-03-16 21:32:17'),
(232, 217, 1, 'Sharmin  Akther  Shik', 120120, 'Ten', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 13:38:54', '2023-03-17 13:38:54'),
(233, 218, 2, 'Jafrin Akther Jui', 120120, 'Ten', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 13:40:14', '2023-03-17 13:40:14'),
(234, 219, 3, 'Mst. Ripa', 120120, 'Ten', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 13:41:02', '2023-03-17 13:41:02'),
(235, 220, 1, 'Shree Moti Arpona', 120120, 'Ten', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:27:32', '2023-03-18 17:27:32'),
(236, 221, 2, 'Puja Rani', 120120, 'Ten', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:28:31', '2023-03-18 17:28:31'),
(237, 222, 3, 'Sanjida Akter', 120120, 'Ten', 'Science', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:29:41', '2023-03-18 17:29:41'),
(238, 223, 5, 'Hitest Roy', 120120, 'Seven', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 00:11:46', '2023-03-19 00:11:46'),
(239, 224, 6, 'Md Abdul Ahmed', 120120, 'Seven', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 00:12:53', '2023-03-19 00:12:53'),
(240, 225, 7, 'MD Ruhul Ahad', 120120, 'Seven', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 00:13:21', '2023-03-19 00:13:21'),
(241, 226, 8, 'MD RYATUL ISLAM', 120120, 'Seven', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 00:13:44', '2023-03-19 00:13:44'),
(242, 227, 1, 'Fatema', 120120, 'Nine', 'Commerce', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:20:26', '2023-03-19 20:20:26'),
(243, 228, 2, 'Sumon', 120120, 'Nine', 'Commerce', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:20:51', '2023-03-19 20:20:51'),
(244, 229, 3, 'Reyad', 120120, 'Nine', 'Commerce', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:21:19', '2023-03-19 20:21:19'),
(245, 230, 1, 'Md Rayhan Babu', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 03:05:28', '2023-03-21 03:05:28'),
(246, 231, 2, 'Rakibul Islam', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 03:05:38', '2023-03-21 03:05:38'),
(247, 232, 3, 'Fazlul Huq Muslim Hall', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 03:35:54', '2023-03-21 03:35:54'),
(248, 233, 4, 'Golap Mostofa', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 03:36:11', '2023-03-21 03:36:11'),
(249, 234, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:29:41', '2023-03-22 02:29:41'),
(250, 235, 2, 'Md Imran Hasan', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:30:02', '2023-03-22 02:30:02'),
(251, 236, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 200, 200, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:30:19', '2023-03-22 02:30:19'),
(252, 237, 6, 'Golap Mostofa', 120120, 'Nine', 'Humanities', 'A', 0, '2022-12-02', 12, 2022, '0', 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, 250, 250, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:17:37', '2023-03-23 14:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `maintains`
--

CREATE TABLE `maintains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `maintain_name` varchar(255) NOT NULL,
  `maintain_password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `forget_code` varchar(255) DEFAULT NULL,
  `forget_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintains`
--

INSERT INTO `maintains` (`id`, `name`, `email`, `mobile`, `maintain_name`, `maintain_password`, `role`, `status`, `forget_code`, `forget_time`, `created_at`, `updated_at`) VALUES
(1, 'Md Rayhan Babu', 'rayhanbabu458@gmail.com', 1750360044, 'maintain', 'Rayhanbabu458@', 'maintain', '1', '74727', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `markinfos`
--

CREATE TABLE `markinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `gpa` double(8,2) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `gparange` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markinfos`
--

INSERT INTO `markinfos` (`id`, `eiin`, `serial`, `class`, `babu`, `section`, `start`, `end`, `gpa`, `grade`, `gparange`, `created_at`, `updated_at`) VALUES
(21, 120120, 1, 'Eight', 'NA', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 04:49:45', '2023-03-14 00:11:52'),
(22, 120120, 2, 'Eight', 'NA', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 04:49:45', '2023-03-13 20:23:57'),
(23, 120120, 3, 'Eight', 'NA', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 04:49:45', '2023-03-13 20:23:03'),
(24, 120120, 4, 'Eight', 'NA', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 04:49:45', '2023-03-14 00:12:18'),
(25, 120120, 5, 'Eight', 'NA', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 04:49:45', '2023-03-14 00:12:31'),
(26, 120120, 6, 'Eight', 'NA', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 04:49:45', '2023-03-14 00:12:43'),
(27, 120120, 7, 'Eight', 'NA', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 04:49:45', '2023-03-14 00:13:06'),
(28, 120120, 1, 'Nine', 'Science', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 04:51:44', '2023-03-14 13:15:03'),
(29, 120120, 2, 'Nine', 'Science', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 04:51:44', '2023-03-13 20:12:47'),
(30, 120120, 3, 'Nine', 'Science', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 04:51:44', '2023-03-13 20:12:56'),
(31, 120120, 4, 'Nine', 'Science', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 04:51:44', '2023-03-13 20:13:04'),
(32, 120120, 5, 'Nine', 'Science', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 04:51:44', '2023-03-13 20:13:12'),
(33, 120120, 6, 'Nine', 'Science', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 04:51:44', '2023-03-13 20:13:22'),
(34, 120120, 7, 'Nine', 'Science', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 04:51:44', '2023-03-14 13:15:23'),
(35, 120120, 1, 'Nine', 'Humanities', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 04:53:43', '2023-03-14 13:16:25'),
(36, 120120, 2, 'Nine', 'Humanities', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 04:53:43', '2023-03-14 13:16:39'),
(37, 120120, 3, 'Nine', 'Humanities', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 04:53:43', '2023-03-14 13:16:47'),
(38, 120120, 4, 'Nine', 'Humanities', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 04:53:43', '2023-03-14 13:16:54'),
(39, 120120, 5, 'Nine', 'Humanities', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 04:53:43', '2023-03-14 13:17:13'),
(40, 120120, 6, 'Nine', 'Humanities', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 04:53:43', '2023-03-14 13:17:29'),
(41, 120120, 7, 'Nine', 'Humanities', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 04:53:43', '2023-03-14 13:17:46'),
(42, 120120, 1, 'Nine', 'Commerce', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 04:55:53', '2023-03-14 13:18:32'),
(43, 120120, 2, 'Nine', 'Commerce', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 04:55:53', '2023-03-14 13:18:49'),
(44, 120120, 3, 'Nine', 'Commerce', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 04:55:53', '2023-03-14 13:18:56'),
(45, 120120, 4, 'Nine', 'Commerce', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 04:55:53', '2023-03-14 13:19:03'),
(46, 120120, 5, 'Nine', 'Commerce', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 04:55:53', '2023-03-14 13:19:12'),
(47, 120120, 6, 'Nine', 'Commerce', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 04:55:53', '2023-03-14 13:19:19'),
(48, 120120, 7, 'Nine', 'Commerce', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 04:55:53', '2023-03-14 13:19:28'),
(49, 120120, 1, 'Ten', 'Science', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 04:58:45', '2023-03-14 13:20:08'),
(50, 120120, 2, 'Ten', 'Science', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 04:58:45', '2023-03-14 13:20:15'),
(51, 120120, 3, 'Ten', 'Science', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 04:58:45', '2023-03-14 13:20:22'),
(52, 120120, 4, 'Ten', 'Science', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 04:58:45', '2023-03-14 13:20:32'),
(53, 120120, 5, 'Ten', 'Science', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 04:58:45', '2023-03-14 13:20:40'),
(54, 120120, 6, 'Ten', 'Science', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 04:58:45', '2023-03-14 13:20:49'),
(55, 120120, 7, 'Ten', 'Science', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 04:58:45', '2023-03-14 13:21:29'),
(56, 120120, 1, 'Ten', 'Humanities', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 05:00:12', '2023-03-16 23:58:46'),
(57, 120120, 2, 'Ten', 'Humanities', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 05:00:12', '2023-03-16 23:58:54'),
(58, 120120, 3, 'Ten', 'Humanities', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 05:00:12', '2023-03-16 23:59:00'),
(59, 120120, 4, 'Ten', 'Humanities', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 05:00:12', '2023-03-16 23:59:08'),
(60, 120120, 5, 'Ten', 'Humanities', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 05:00:12', '2023-03-16 23:59:15'),
(61, 120120, 6, 'Ten', 'Humanities', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 05:00:12', '2023-03-16 23:59:24'),
(62, 120120, 7, 'Ten', 'Humanities', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 05:00:12', '2023-03-16 23:59:42'),
(63, 120120, 1, 'Ten', 'Commerce', NULL, 80, 100, 5.00, 'A+', 5.25, '2022-12-02 05:01:54', '2023-03-17 00:00:15'),
(64, 120120, 2, 'Ten', 'Commerce', NULL, 70, 80, 4.00, 'A', 5.00, '2022-12-02 05:01:54', '2023-03-17 00:00:25'),
(65, 120120, 3, 'Ten', 'Commerce', NULL, 60, 70, 3.50, 'A-', 4.00, '2022-12-02 05:01:54', '2023-03-17 00:00:37'),
(66, 120120, 4, 'Ten', 'Commerce', NULL, 50, 60, 3.00, 'B', 3.50, '2022-12-02 05:01:54', '2023-03-17 00:01:15'),
(67, 120120, 5, 'Ten', 'Commerce', NULL, 40, 50, 2.00, 'C', 3.00, '2022-12-02 05:01:54', '2023-03-17 00:01:28'),
(68, 120120, 6, 'Ten', 'Commerce', NULL, 33, 40, 1.00, 'D', 2.00, '2022-12-02 05:01:54', '2023-03-17 00:01:40'),
(69, 120120, 7, 'Ten', 'Commerce', NULL, 0, 33, 0.00, 'F', -0.25, '2022-12-02 05:01:54', '2023-03-17 00:03:36'),
(208, 999001, 1, 'Eight', 'NA', NULL, 80, 100, 5.00, 'A+', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(209, 999001, 2, 'Eight', 'NA', NULL, 70, 80, 4.00, 'A', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(210, 999001, 3, 'Eight', 'NA', NULL, 60, 70, 3.50, 'A-', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(211, 999001, 4, 'Eight', 'NA', NULL, 50, 60, 3.00, 'B', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(212, 999001, 5, 'Eight', 'NA', NULL, 40, 50, 2.00, 'C', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(213, 999001, 6, 'Eight', 'NA', NULL, 33, 40, 1.00, 'D', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(214, 999001, 7, 'Eight', 'NA', NULL, 0, 33, 0.00, 'F', NULL, '2023-02-13 22:03:39', '2023-02-13 22:03:39'),
(216, 120120, 1, 'Seven', 'NA', 'A', 80, 101, 5.00, 'A+', 5.25, '2023-03-14 12:30:25', '2023-03-14 12:30:25'),
(217, 120120, 2, 'Seven', 'NA', 'A', 70, 80, 4.00, 'A', 5.00, '2023-03-14 12:31:11', '2023-03-14 12:31:11'),
(218, 120120, 3, 'Seven', 'NA', 'A', 60, 70, 3.50, 'A-', 4.00, '2023-03-14 12:31:34', '2023-03-14 12:31:34'),
(219, 120120, 4, 'Seven', 'NA', 'A', 50, 60, 3.00, 'B', 3.50, '2023-03-14 12:32:26', '2023-03-14 12:32:26'),
(220, 120120, 5, 'Seven', 'NA', 'A', 40, 50, 2.00, 'C', 3.00, '2023-03-14 12:32:50', '2023-03-14 12:32:50'),
(221, 120120, 6, 'Seven', 'NA', 'A', 33, 40, 1.00, 'D', 2.00, '2023-03-14 12:33:19', '2023-03-14 12:33:19'),
(222, 120120, 7, 'Seven', 'NA', 'A', 0, 33, 0.00, 'F', -0.25, '2023-03-14 12:34:06', '2023-03-14 12:34:06'),
(223, 120120, 1, 'Six', 'NA', 'A', 80, 101, 5.00, 'A+', 5.25, '2023-03-14 12:35:15', '2023-03-14 12:35:15'),
(224, 120120, 2, 'Six', 'NA', 'A', 70, 80, 4.00, 'A', 5.00, '2023-03-14 13:09:38', '2023-03-14 13:09:38'),
(225, 120120, 3, 'Six', 'NA', 'A', 60, 70, 3.50, 'A-', 4.00, '2023-03-14 13:10:08', '2023-03-14 13:10:08'),
(226, 120120, 4, 'Six', 'NA', 'A', 50, 60, 3.00, 'B', 3.50, '2023-03-14 13:11:07', '2023-03-14 13:12:53'),
(227, 120120, 5, 'Six', 'NA', 'A', 40, 50, 2.00, 'C', 3.00, '2023-03-14 13:12:11', '2023-03-14 13:13:00'),
(228, 120120, 6, 'Six', 'NA', 'A', 33, 40, 1.00, 'D', 2.00, '2023-03-14 13:13:28', '2023-03-14 13:13:28'),
(229, 120120, 7, 'Six', 'NA', 'A', 0, 33, 0.00, 'F', -0.25, '2023-03-14 13:14:05', '2023-03-17 11:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `roll` int(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `sub11code` varchar(255) DEFAULT NULL,
  `sub11n` varchar(255) DEFAULT NULL,
  `sub11c` int(11) NOT NULL DEFAULT 0,
  `sub11m` int(11) NOT NULL DEFAULT 0,
  `sub11p` int(11) NOT NULL DEFAULT 0,
  `sub11t` int(11) NOT NULL DEFAULT 0,
  `sub11gp` double(8,2) DEFAULT NULL,
  `sub11g` varchar(255) DEFAULT NULL,
  `sub11h` int(11) DEFAULT NULL,
  `sub12code` varchar(255) DEFAULT NULL,
  `sub12n` varchar(255) DEFAULT NULL,
  `sub12c` int(11) NOT NULL DEFAULT 0,
  `sub12m` int(11) NOT NULL DEFAULT 0,
  `sub12p` int(11) NOT NULL DEFAULT 0,
  `sub12t` int(11) NOT NULL DEFAULT 0,
  `sub12gp` double(8,2) DEFAULT NULL,
  `sub12g` varchar(255) DEFAULT NULL,
  `sub12h` int(11) DEFAULT NULL,
  `sub13code` varchar(255) DEFAULT NULL,
  `sub13n` varchar(255) DEFAULT NULL,
  `sub13c` int(11) NOT NULL DEFAULT 0,
  `sub13m` int(11) NOT NULL DEFAULT 0,
  `sub13p` int(11) NOT NULL DEFAULT 0,
  `sub13t` int(11) NOT NULL DEFAULT 0,
  `sub13gp` double(8,2) DEFAULT NULL,
  `sub13g` varchar(255) DEFAULT NULL,
  `sub13h` int(11) DEFAULT NULL,
  `sub14code` varchar(255) DEFAULT NULL,
  `sub14n` varchar(255) DEFAULT NULL,
  `sub14c` int(11) NOT NULL DEFAULT 0,
  `sub14m` int(11) NOT NULL DEFAULT 0,
  `sub14p` int(11) NOT NULL DEFAULT 0,
  `sub14t` int(11) NOT NULL DEFAULT 0,
  `sub14gp` double(8,2) DEFAULT NULL,
  `sub14g` varchar(255) DEFAULT NULL,
  `sub14h` int(11) DEFAULT NULL,
  `sub15code` varchar(255) DEFAULT NULL,
  `sub15n` varchar(255) DEFAULT NULL,
  `sub15c` int(11) NOT NULL DEFAULT 0,
  `sub15m` int(11) NOT NULL DEFAULT 0,
  `sub15p` int(11) NOT NULL DEFAULT 0,
  `sub15t` int(11) NOT NULL DEFAULT 0,
  `sub15gp` double(8,2) DEFAULT NULL,
  `sub15g` varchar(255) DEFAULT NULL,
  `sub15h` int(11) DEFAULT NULL,
  `sub16code` varchar(255) DEFAULT NULL,
  `sub16n` varchar(255) DEFAULT NULL,
  `sub16sn` varchar(255) DEFAULT NULL,
  `sub16c` int(11) NOT NULL DEFAULT 0,
  `sub16m` int(11) NOT NULL DEFAULT 0,
  `sub16p` int(11) NOT NULL DEFAULT 0,
  `sub16t` int(11) NOT NULL DEFAULT 0,
  `sub16gp` double(8,2) DEFAULT NULL,
  `sub16g` varchar(255) DEFAULT NULL,
  `sub16h` int(11) DEFAULT NULL,
  `sub17code` varchar(255) DEFAULT NULL,
  `sub17n` varchar(255) DEFAULT NULL,
  `sub17c` int(11) NOT NULL DEFAULT 0,
  `sub17m` int(11) NOT NULL DEFAULT 0,
  `sub17p` int(11) NOT NULL DEFAULT 0,
  `sub17t` int(11) NOT NULL DEFAULT 0,
  `sub17gp` double(8,2) DEFAULT NULL,
  `sub17g` varchar(255) DEFAULT NULL,
  `sub17h` int(11) DEFAULT NULL,
  `sub18code` varchar(255) DEFAULT NULL,
  `sub18n` varchar(255) DEFAULT NULL,
  `sub18c` int(11) NOT NULL DEFAULT 0,
  `sub18m` int(11) NOT NULL DEFAULT 0,
  `sub18p` int(11) NOT NULL DEFAULT 0,
  `sub18t` int(11) NOT NULL DEFAULT 0,
  `sub18gp` double(8,2) DEFAULT NULL,
  `sub18g` varchar(255) DEFAULT NULL,
  `sub18h` int(11) DEFAULT NULL,
  `sub19code` varchar(255) DEFAULT NULL,
  `sub19n` varchar(255) DEFAULT NULL,
  `sub19c` int(11) NOT NULL DEFAULT 0,
  `sub19m` int(11) NOT NULL DEFAULT 0,
  `sub19p` int(11) NOT NULL DEFAULT 0,
  `sub19t` int(11) NOT NULL DEFAULT 0,
  `sub19gp` double(8,2) DEFAULT NULL,
  `sub19g` varchar(255) DEFAULT NULL,
  `sub19h` int(11) DEFAULT NULL,
  `sub20code` varchar(255) DEFAULT NULL,
  `sub20n` varchar(255) DEFAULT NULL,
  `sub20c` int(11) NOT NULL DEFAULT 0,
  `sub20m` int(11) NOT NULL DEFAULT 0,
  `sub20p` int(11) NOT NULL DEFAULT 0,
  `sub20t` int(11) NOT NULL DEFAULT 0,
  `sub20gp` double(8,2) DEFAULT NULL,
  `sub20g` varchar(255) DEFAULT NULL,
  `sub20h` int(11) DEFAULT NULL,
  `sub21code` varchar(255) DEFAULT NULL,
  `sub21n` varchar(255) DEFAULT NULL,
  `sub21c` int(11) NOT NULL DEFAULT 0,
  `sub21m` int(11) NOT NULL DEFAULT 0,
  `sub21p` int(11) NOT NULL DEFAULT 0,
  `sub21t` int(11) NOT NULL DEFAULT 0,
  `sub21gp` double(8,2) DEFAULT NULL,
  `sub21g` varchar(255) DEFAULT NULL,
  `sub21h` int(11) DEFAULT NULL,
  `sub22code` varchar(255) DEFAULT NULL,
  `sub22n` varchar(255) DEFAULT NULL,
  `sub22c` int(11) NOT NULL DEFAULT 0,
  `sub22m` int(11) NOT NULL DEFAULT 0,
  `sub22p` int(11) NOT NULL DEFAULT 0,
  `sub22t` int(11) NOT NULL DEFAULT 0,
  `sub22gp` double(8,2) DEFAULT NULL,
  `sub22g` varchar(255) DEFAULT NULL,
  `sub22h` int(11) DEFAULT NULL,
  `sub23code` varchar(255) DEFAULT NULL,
  `sub23n` varchar(255) DEFAULT NULL,
  `sub23sn` varchar(255) DEFAULT NULL,
  `sub23c` int(11) NOT NULL DEFAULT 0,
  `sub23m` int(11) NOT NULL DEFAULT 0,
  `sub23p` int(11) NOT NULL DEFAULT 0,
  `sub23t` int(11) NOT NULL DEFAULT 0,
  `sub23gp` double(8,2) DEFAULT NULL,
  `sub23g` varchar(255) DEFAULT NULL,
  `sub23h` int(11) DEFAULT NULL,
  `sub24code` varchar(255) DEFAULT NULL,
  `sub24n` varchar(255) DEFAULT NULL,
  `sub24sn` varchar(255) DEFAULT NULL,
  `sub24c` int(11) NOT NULL DEFAULT 0,
  `sub24m` int(11) NOT NULL DEFAULT 0,
  `sub24p` int(11) NOT NULL DEFAULT 0,
  `sub24t` int(11) NOT NULL DEFAULT 0,
  `sub24gp` double(8,2) DEFAULT NULL,
  `sub24g` varchar(255) DEFAULT NULL,
  `sub24h` int(11) DEFAULT NULL,
  `sub11` varchar(255) DEFAULT NULL,
  `sub12` varchar(255) DEFAULT NULL,
  `sub13` varchar(255) DEFAULT NULL,
  `sub14` varchar(255) DEFAULT NULL,
  `sub15` varchar(255) DEFAULT NULL,
  `sub16` varchar(255) DEFAULT NULL,
  `sub17` text DEFAULT NULL,
  `sub18` text DEFAULT NULL,
  `sub19` text DEFAULT NULL,
  `sub20` text DEFAULT NULL,
  `sub21` text DEFAULT NULL,
  `sub22` text DEFAULT NULL,
  `sub23` text DEFAULT NULL,
  `sub24` text DEFAULT NULL,
  `tfail` int(11) DEFAULT NULL,
  `pclass` int(11) DEFAULT NULL,
  `tclass` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `totalgpa` double(8,2) DEFAULT NULL,
  `gpa1` double(8,2) DEFAULT NULL,
  `gpa` double(8,2) DEFAULT NULL,
  `g` varchar(255) DEFAULT NULL,
  `rs` int(11) NOT NULL DEFAULT 1,
  `fgp` double(8,2) DEFAULT NULL,
  `fg` text DEFAULT NULL,
  `cgp` double(8,2) DEFAULT NULL,
  `cg` text DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `uid`, `roll`, `name`, `eiin`, `class`, `babu`, `section`, `exam`, `year`, `sub11code`, `sub11n`, `sub11c`, `sub11m`, `sub11p`, `sub11t`, `sub11gp`, `sub11g`, `sub11h`, `sub12code`, `sub12n`, `sub12c`, `sub12m`, `sub12p`, `sub12t`, `sub12gp`, `sub12g`, `sub12h`, `sub13code`, `sub13n`, `sub13c`, `sub13m`, `sub13p`, `sub13t`, `sub13gp`, `sub13g`, `sub13h`, `sub14code`, `sub14n`, `sub14c`, `sub14m`, `sub14p`, `sub14t`, `sub14gp`, `sub14g`, `sub14h`, `sub15code`, `sub15n`, `sub15c`, `sub15m`, `sub15p`, `sub15t`, `sub15gp`, `sub15g`, `sub15h`, `sub16code`, `sub16n`, `sub16sn`, `sub16c`, `sub16m`, `sub16p`, `sub16t`, `sub16gp`, `sub16g`, `sub16h`, `sub17code`, `sub17n`, `sub17c`, `sub17m`, `sub17p`, `sub17t`, `sub17gp`, `sub17g`, `sub17h`, `sub18code`, `sub18n`, `sub18c`, `sub18m`, `sub18p`, `sub18t`, `sub18gp`, `sub18g`, `sub18h`, `sub19code`, `sub19n`, `sub19c`, `sub19m`, `sub19p`, `sub19t`, `sub19gp`, `sub19g`, `sub19h`, `sub20code`, `sub20n`, `sub20c`, `sub20m`, `sub20p`, `sub20t`, `sub20gp`, `sub20g`, `sub20h`, `sub21code`, `sub21n`, `sub21c`, `sub21m`, `sub21p`, `sub21t`, `sub21gp`, `sub21g`, `sub21h`, `sub22code`, `sub22n`, `sub22c`, `sub22m`, `sub22p`, `sub22t`, `sub22gp`, `sub22g`, `sub22h`, `sub23code`, `sub23n`, `sub23sn`, `sub23c`, `sub23m`, `sub23p`, `sub23t`, `sub23gp`, `sub23g`, `sub23h`, `sub24code`, `sub24n`, `sub24sn`, `sub24c`, `sub24m`, `sub24p`, `sub24t`, `sub24gp`, `sub24g`, `sub24h`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`, `sub19`, `sub20`, `sub21`, `sub22`, `sub23`, `sub24`, `tfail`, `pclass`, `tclass`, `total`, `totalgpa`, `gpa1`, `gpa`, `g`, `rs`, `fgp`, `fg`, `cgp`, `cg`, `result`, `created_at`, `updated_at`) VALUES
(115, 118, NULL, NULL, 999000, 'Ten', 'Science', 'A', '1', 2022, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Biology', 'Bio', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Higher Math', 'Hig', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, NULL, NULL, NULL, NULL, '2023-01-09 18:24:25', '2023-01-09 18:24:25'),
(116, 119, NULL, NULL, 999000, 'Ten', 'Science', 'A', '1', 2022, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Biology', 'Bio', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Higher Math', 'Hig', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, NULL, NULL, NULL, NULL, '2023-01-09 18:27:02', '2023-01-09 18:27:02'),
(117, 120, NULL, NULL, 999000, 'Ten', 'Humanities', 'A', '1', 2022, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Economics', 'Eco', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Agriculture', 'Agr', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0.00, NULL, NULL, NULL, NULL, '2023-01-09 18:29:14', '2023-01-09 18:29:14'),
(209, 157, 1, 'MST MIFTAHUL ZANATH', 120120, 'Nine', 'Science', 'A', '1', 2022, '411', 'Bangla 1st Paper', 57, 22, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 53, 29, 0, 161, 5.00, 'A+', 161, '413', 'English 1st Paper', 85, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 82, 0, 0, 167, 5.00, 'A+', 167, '415', 'Mathematics', 64, 30, 0, 94, 5.00, 'A+', 94, '20416', 'Islam & Moral Education', 'Islam', 55, 25, 0, 80, 5.00, 'A+', 80, '417', 'Bangladesh & Global studies', 63, 28, 0, 91, 5.00, 'A+', 91, '418', 'Physics', 48, 23, 25, 96, 5.00, 'A+', 97, '419', 'Chemistry', 41, 22, 23, 86, 5.00, 'A+', 91, '420', 'I.C.T.', 0, 23, 24, 47, 5.00, 'A+', 47, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20423', 'Biology', 'Bio', 34, 20, 23, 77, 4.00, 'A', 77, '20424', 'Higher Math', 'Hig', 46, 21, 25, 92, 3.00, '5-A+', 92, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 991, 47.00, 5.22, 5.00, 'A+', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:42:16', '2023-01-11 17:42:16'),
(210, 158, 2, 'PRAPTI RANI ROY', 120120, 'Nine', 'Science', 'A', '1', 2022, '411', 'Bangla 1st Paper', 54, 19, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 50, 24, 0, 147, 4.00, 'A', 161, '413', 'English 1st Paper', 75, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 80, 0, 0, 155, 4.00, 'A', 167, '415', 'Mathematics', 58, 28, 0, 86, 5.00, 'A+', 94, '20416', 'Hindu & Moral Education', 'Hindu', 58, 22, 0, 80, 5.00, 'A+', 80, '417', 'Bangladesh & Global studies', 56, 26, 0, 82, 5.00, 'A+', 91, '418', 'Physics', 48, 17, 25, 90, 5.00, 'A+', 97, '419', 'Chemistry', 41, 19, 23, 83, 5.00, 'A+', 91, '420', 'I.C.T.', 0, 13, 24, 37, 4.00, 'A', 47, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20423', 'Biology', 'Bio', 30, 21, 20, 71, 4.00, 'A', 77, '20424', 'Higher Math', 'Hig', 44, 22, 25, 91, 3.00, '5-A+', 92, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 922, 44.00, 4.89, 4.89, 'A', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:42:43', '2023-01-11 17:42:43'),
(211, 159, 3, 'UPOPA RANI SARKAR', 120120, 'Nine', 'Science', 'A', '1', 2022, '411', 'Bangla 1st Paper', 50, 15, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 51, 14, 0, 130, 3.50, 'A-', 161, '413', 'English 1st Paper', 80, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 75, 0, 0, 155, 4.00, 'A', 167, '415', 'Mathematics', 64, 29, 0, 93, 5.00, 'A+', 94, '20416', 'Hindu & Moral Education', 'Hindu', 55, 20, 0, 75, 4.00, 'A', 80, '417', 'Bangladesh & Global studies', 60, 18, 0, 78, 4.00, 'A', 91, '418', 'Physics', 48, 24, 25, 97, 5.00, 'A+', 97, '419', 'Chemistry', 46, 20, 25, 91, 5.00, 'A+', 91, '420', 'I.C.T.', 0, 12, 24, 36, 4.00, 'A', 47, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20423', 'Biology', 'Bio', 31, 16, 23, 70, 4.00, 'A', 77, '20424', 'Higher Math', 'Hig', 46, 20, 25, 91, 3.00, '5-A+', 92, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 916, 41.50, 4.61, 4.61, 'A', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:43:02', '2023-01-11 17:43:02'),
(212, 160, 1, 'MD RIFAT HOSSAN', 120120, 'Nine', 'Humanities', 'A', '1', 2022, '611', 'Bangla 1st Paper', 58, 22, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 61, 27, 0, 168, 5.00, 'A+', 168, '613', 'English 1st Paper', 72, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 71, 0, 0, 143, 4.00, 'A', 143, '615', 'Mathematics', 52, 15, 0, 67, 3.50, 'A-', 67, '20616', 'Islam & Moral Education', 'Islam', 61, 26, 0, 87, 5.00, 'A+', 87, '617', 'Science', 62, 20, 0, 82, 5.00, 'A+', 82, '618', 'Geography', 57, 23, 0, 80, 5.00, 'A+', 80, '619', 'History Of BWC', 63, 23, 0, 86, 5.00, 'A+', 86, '620', 'I.C.T.', 0, 21, 25, 46, 5.00, 'A+', 46, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20623', 'Civics & Citizenship', 'Civ', 60, 25, 0, 85, 5.00, 'A+', 85, '20624', 'Agriculture', 'Agr', 38, 11, 24, 73, 2.00, '4-A', 73, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 917, 44.50, 4.94, 4.94, 'A', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:43:48', '2023-01-11 17:43:48'),
(213, 161, 2, 'SAKHAOWAT HOSSEN', 120120, 'Nine', 'Humanities', 'A', '1', 2022, '611', 'Bangla 1st Paper', 29, 20, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 24, 16, 0, 89, 2.00, 'C', 168, '613', 'English 1st Paper', 36, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 33, 0, 0, 69, 1.00, 'D', 143, '615', 'Mathematics', 28, 13, 0, 41, 2.00, 'C', 67, '20616', 'Islam & Moral Education', 'Islam', 34, 16, 0, 50, 3.00, 'B', 87, '617', 'Science', 41, 16, 0, 57, 3.00, 'B', 82, '618', 'Geography', 23, 14, 0, 37, 1.00, 'D', 80, '619', 'History Of BWC', 34, 16, 0, 50, 3.00, 'B', 86, '620', 'I.C.T.', 0, 15, 24, 39, 4.00, 'A', 46, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20623', 'Civics & Citizenship', 'Civ', 34, 18, 0, 52, 3.00, 'B', 85, '20624', 'Agriculture', 'Agr', 28, 13, 24, 65, 1.50, '3.5 A-', 73, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 549, 23.50, 2.61, 2.61, 'C', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:44:08', '2023-01-11 17:44:08'),
(214, 162, 3, 'MD IMRAN HOSSAIN', 120120, 'Nine', 'Humanities', 'A', '1', 2022, '611', 'Bangla 1st Paper', 23, 12, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 32, 13, 0, 80, 2.00, 'C', 168, '613', 'English 1st Paper', 20, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 6, 0, 0, 26, 0.00, '0', 143, '615', 'Mathematics', 6, 8, 0, 14, 0.00, 'F', 67, '20616', 'Islam & Moral Education', 'Islam', 41, 14, 0, 55, 3.00, 'B', 87, '617', 'Science', 42, 14, 0, 56, 3.00, 'B', 82, '618', 'Geography', 23, 13, 0, 36, 1.00, 'D', 80, '619', 'History Of BWC', 33, 14, 0, 47, 2.00, 'C', 86, '620', 'I.C.T.', 0, 20, 23, 43, 5.00, 'A+', 46, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20623', 'Civics & Citizenship', 'Civ', 28, 18, 0, 46, 2.00, 'C', 85, '20624', 'Agriculture', 'Agr', 26, 11, 24, 61, 1.50, '3.5 A-', 73, '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 2, NULL, NULL, 464, 19.50, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-01-11 17:44:39', '2023-01-11 17:44:39'),
(215, 163, 1, 'ONTORA SAHA', 120120, 'Nine', 'Commerce', 'A', '1', 2022, '911', 'Bangla 1st Paper', 60, 23, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 50, 14, 0, 147, 4.00, 'A', 147, '913', 'English 1st Paper', 61, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 58, 0, 0, 119, 3.00, 'B', 119, '915', 'Mathematics', 30, 10, 0, 40, 2.00, 'C', 40, '20916', 'Hindu & Moral Education', 'Hindu', 57, 25, 0, 82, 5.00, 'A+', 82, '917', 'Science', 57, 17, 0, 74, 4.00, 'A', 74, '918', 'Accounting', 49, 18, 0, 67, 3.50, 'A-', 67, '919', 'Finance Banking', 63, 27, 0, 90, 5.00, 'A+', 90, '920', 'I.C.T.', 0, 13, 25, 38, 4.00, 'A', 38, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 64, 26, 0, 90, 5.00, 'A+', 90, '20924', 'Agriculture', 'Agr', 41, 16, 25, 82, 3.00, '5-A+', 82, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 829, 38.50, 4.28, 4.28, 'A', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:45:05', '2023-01-11 17:45:05'),
(216, 164, 2, 'BITHI', 120120, 'Nine', 'Commerce', 'A', '1', 2022, '911', 'Bangla 1st Paper', 47, 23, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 40, 10, 0, 120, 3.50, 'A-', 147, '913', 'English 1st Paper', 43, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 47, 0, 0, 90, 2.00, 'C', 119, '915', 'Mathematics', 23, 10, 0, 33, 1.00, 'D', 40, '20916', 'Hindu & Moral Education', 'Hindu', 56, 24, 0, 80, 5.00, 'A+', 82, '917', 'Science', 50, 18, 0, 68, 3.50, 'A-', 74, '918', 'Accounting', 37, 20, 0, 57, 3.00, 'B', 67, '919', 'Finance Banking', 50, 25, 0, 75, 4.00, 'A', 90, '920', 'I.C.T.', 0, 10, 25, 35, 4.00, 'A', 38, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 60, 20, 0, 80, 5.00, 'A+', 90, '20924', 'Agriculture', 'Agr', 34, 15, 25, 74, 2.00, '4-A', 82, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 712, 33.00, 3.67, 3.67, 'A-', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:45:23', '2023-01-11 17:45:23'),
(217, 165, 3, 'CHADNI', 120120, 'Nine', 'Commerce', 'A', '1', 2022, '911', 'Bangla 1st Paper', 0, 0, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 0, 0, 0, 0, 0.00, 'F', 147, '913', 'English 1st Paper', 0, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 0, 0, 0, 0, 0.00, '0', 119, '915', 'Mathematics', 0, 0, 0, 0, 0.00, 'F', 40, '20916', 'Hindu & Moral Education', 'Hindu', 0, 0, 0, 0, 0.00, 'F', 82, '917', 'Science', 0, 0, 0, 0, 0.00, 'F', 74, '918', 'Accounting', 0, 0, 0, 0, 0.00, 'F', 67, '919', 'Finance Banking', 0, 0, 0, 0, 0.00, 'F', 90, '920', 'I.C.T.', 0, 0, 0, 0, 0.00, 'F', 38, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 0, 0, 0, 0, 0.00, 'F', 90, '20924', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', 82, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 10, NULL, NULL, 0, 0.00, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-01-11 17:45:35', '2023-01-11 17:45:35'),
(218, 152, 1, 'MD NAFIS SULTAN', 120120, 'Eight', 'NA', 'A', '1', 2022, '311', 'Bangla', 51, 19, 0, 70, 4.00, 'A', 89, '312', 'English', 40, 0, 0, 40, 2.00, 'C', 56, '313', 'Mathematics', 38, 25, 0, 63, 3.50, 'A-', 92, '314', 'Science', 42, 20, 0, 62, 3.50, 'A-', 63, '315', 'Bangladesh & Global studies', 56, 24, 0, 80, 5.00, 'A+', 80, '20316', 'Islam & Moral Education', 'Islam', 38, 25, 0, 63, 3.50, 'A-', 92, '317', 'I.C.T.', 15, 17, 0, 32, 3.50, 'A-', 37, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 410, 25.00, 3.57, 3.57, 'A-', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:47:56', '2023-01-11 17:47:56'),
(219, 153, 2, 'MD IMRAN HOSSAIN', 120120, 'Eight', 'NA', 'A', '1', 2022, '311', 'Bangla', 69, 20, 0, 89, 5.00, 'A+', 89, '312', 'English', 56, 0, 0, 56, 3.00, 'B', 56, '313', 'Mathematics', 66, 26, 0, 92, 5.00, 'A+', 92, '314', 'Science', 47, 16, 0, 63, 3.50, 'A-', 63, '315', 'Bangladesh & Global studies', 55, 20, 0, 75, 4.00, 'A', 80, '20316', 'Islam & Moral Education', 'Islam', 66, 26, 0, 92, 5.00, 'A+', 92, '317', 'I.C.T.', 22, 14, 0, 36, 4.00, 'A', 37, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 503, 29.50, 4.21, 4.00, 'A+', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:47:56', '2023-01-11 17:47:56'),
(220, 154, 3, 'MD LABIB HASAN', 120120, 'Eight', 'NA', 'A', '1', 2022, '311', 'Bangla', 52, 13, 0, 65, 3.50, 'A-', 89, '312', 'English', 23, 0, 0, 23, 0.00, 'F', 56, '313', 'Mathematics', 24, 12, 0, 36, 1.00, 'D', 92, '314', 'Science', 40, 18, 0, 58, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 46, 21, 0, 67, 3.50, 'A-', 80, '20316', 'Islam & Moral Education', 'Islam', 24, 12, 0, 36, 1.00, 'D', 92, '317', 'I.C.T.', 20, 15, 0, 35, 4.00, 'A', 37, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 1, NULL, NULL, 320, 16.00, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-01-11 17:47:56', '2023-01-11 17:47:56'),
(221, 155, 4, 'HITESH ROY', 120120, 'Eight', 'NA', 'A', '1', 2022, '311', 'Bangla', 49, 16, 0, 65, 3.50, 'A-', 89, '312', 'English', 51, 0, 0, 51, 3.00, 'B', 56, '313', 'Mathematics', 38, 18, 0, 56, 3.00, 'B', 92, '314', 'Science', 38, 17, 0, 55, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 45, 17, 0, 62, 3.50, 'A-', 80, '20316', 'Hindu & Moral Education', 'Hindu', 38, 18, 0, 56, 3.00, 'B', 92, '317', 'I.C.T.', 17, 20, 0, 37, 4.00, 'A', 37, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 382, 23.00, 3.29, 3.29, 'B+', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:47:56', '2023-01-11 17:47:56'),
(222, 156, 5, 'MD ABDUL AHAD', 120120, 'Eight', 'NA', 'A', '1', 2022, '311', 'Bangla', 46, 16, 0, 62, 3.50, 'A-', 89, '312', 'English', 56, 0, 0, 56, 3.00, 'B', 56, '313', 'Mathematics', 24, 19, 0, 43, 2.00, 'C', 92, '314', 'Science', 38, 16, 0, 54, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 47, 15, 0, 62, 3.50, 'A-', 80, '20316', 'Islam & Moral Education', 'Islam', 24, 19, 0, 43, 2.00, 'C', 92, '317', 'I.C.T.', 17, 20, 0, 37, 4.00, 'A', 37, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 357, 21.00, 3.00, 3.00, 'B', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-01-11 17:47:56', '2023-01-11 17:47:56'),
(238, 167, 1, 'Md Rayhan babu', 120120, 'Six', 'NA', 'B', '1', 2022, '111', 'Bangla', 12, 15, 0, 27, 0.00, 'F', 50, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '113', 'English', 89, 0, 0, 89, 4.00, 'A+', 89, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '115', 'Mathematics', 43, 23, 0, 66, 3.25, 'B+', 66, '20116', 'Islam & Moral Education', 'Islam', 43, 21, 0, 64, 3.00, 'B', 64, '117', 'Science', 32, 23, 0, 55, 2.75, 'B-', 62, '118', 'Bangladesh & Global studies', 41, 23, 0, 64, 3.00, 'B', 66, '119', 'I.C.T.', 15, 13, 0, 28, 2.75, 'B-', 34, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '0', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', 1, NULL, NULL, 393, 18.75, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-01-14 15:49:47', '2023-01-14 15:49:47'),
(239, 168, 2, 'Humayan', 120120, 'Six', 'NA', 'B', '1', 2022, '111', 'Bangla', 35, 15, 0, 50, 2.50, 'C+', 50, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '113', 'English', 67, 0, 0, 67, 3.25, 'B+', 89, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '115', 'Mathematics', 12, 14, 0, 26, 0.00, 'F', 66, '20116', 'Islam & Moral Education', 'Islam', 36, 23, 0, 59, 2.75, 'B-', 64, '117', 'Science', 41, 21, 0, 62, 3.00, 'B', 62, '118', 'Bangladesh & Global studies', 46, 20, 0, 66, 3.25, 'B+', 66, '119', 'I.C.T.', 12, 22, 0, 34, 3.25, 'B+', 34, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', 1, NULL, NULL, 364, 18.00, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-01-14 15:50:00', '2023-01-14 15:50:00'),
(240, 169, 1, 'abcdefgh', 120120, 'Nine', 'Science', 'B', '2', 2022, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Higher Math', 'Hig', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Biology', 'Bio', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-01-15 02:47:21', '2023-01-15 02:47:21'),
(242, 174, 1, 'Priti', 999001, 'Eight', 'NA', 'A', '4', 2023, '311', 'Bangla', 69, 30, 0, 99, 5.00, 'A+', 99, '312', 'English', 53, 0, 0, 53, 3.00, 'B', 77, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Hindu & Moral Education', 'Hindu', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 5, NULL, NULL, 152, NULL, NULL, NULL, 'F', 1, NULL, 'F', NULL, 'F', 'Passed', '2023-02-13 22:06:08', '2023-02-13 22:06:08'),
(243, 175, 2, 'Brithi', 999001, 'Eight', 'NA', 'A', '4', 2023, '311', 'Bangla', 0, 0, 0, 0, 0.00, 'F', 99, '312', 'English', 43, 0, 0, 43, 2.00, 'C', 77, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Hindu & Moral Education', 'Hindu', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 6, NULL, NULL, 43, NULL, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-02-13 22:06:44', '2023-02-13 22:06:44'),
(244, 176, 3, 'nova', 999001, 'Eight', 'NA', 'A', '4', 2023, '311', 'Bangla', 0, 0, 0, 0, 0.00, 'F', 99, '312', 'English', 45, 0, 0, 45, 2.00, 'C', 77, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 6, NULL, NULL, 45, NULL, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-02-13 22:20:32', '2023-02-13 22:20:32'),
(245, 177, 4, 'sumon', 999001, 'Eight', 'NA', 'A', '4', 2023, '311', 'Bangla', 0, 0, 0, 0, 0.00, 'F', 99, '312', 'English', 77, 0, 0, 77, 4.00, 'A', 77, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 6, NULL, NULL, 77, NULL, 0.00, 0.00, 'F', 1, NULL, 'F', NULL, 'F', 'Failed', '2023-02-13 22:21:33', '2023-02-13 22:21:33'),
(246, 178, 1, '1', 999001, 'Six', 'NA', 'A', '4', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:56:28', '2023-02-13 22:56:28'),
(260, 193, 1, 'MD Nafis Sultana', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 51, 19, 0, 70, 4.00, 'A', 72, '312', 'English', 40, 0, 0, 40, 2.00, 'C', 57, '313', 'Mathematics', 38, 25, 0, 63, 3.50, 'A-', 92, '314', 'Science', 42, 20, 0, 62, 3.50, 'A-', 63, '315', 'Bangladesh & Global studies', 56, 24, 0, 80, 5.00, 'A+', 80, '20316', 'Islam & Moral Education', 'Islam', 53, 17, 0, 70, 4.00, 'A', 81, '317', 'I.C.T.', 15, 17, 0, 32, 3.50, 'A-', 40, '318', 'Agriculture', 44, 14, 0, 58, 3.00, 'B', 68, '319', 'Work & LOE', 17, 0, 25, 42, 5.00, 'A+', 45, '320', 'Physical Education', 20, 0, 0, 20, 2.00, 'C', 23, '321', 'Arts & Crafts', 42, 0, 0, 42, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 579, 25.50, 3.64, 3.64, 'A-', 1, NULL, NULL, 3.64, 'A-', 'Passed', '2023-03-09 02:20:24', '2023-03-09 02:20:24'),
(261, 194, 2, 'Md Imran Hasan', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 42, 20, 0, 62, 3.50, 'A-', 72, '312', 'English', 56, 0, 0, 56, 3.00, 'B', 57, '313', 'Mathematics', 66, 26, 0, 92, 5.00, 'A+', 92, '314', 'Science', 47, 16, 0, 63, 3.50, 'A-', 63, '315', 'Bangladesh & Global studies', 55, 20, 0, 75, 4.00, 'A', 80, '20316', 'Islam & Moral Education', 'Islam', 54, 20, 0, 74, 4.00, 'A', 81, '317', 'I.C.T.', 22, 14, 0, 36, 4.00, 'A', 40, '318', 'Agriculture', 49, 10, 0, 59, 3.00, 'B', 68, '319', 'Work & LOE', 16, 0, 25, 41, 5.00, 'A+', 45, '320', 'Physical Education', 11, 0, 0, 11, 0.00, 'F', 23, '321', 'Arts & Crafts', 42, 0, 0, 42, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 611, 27.00, 3.86, 3.86, 'A-', 1, NULL, NULL, 3.86, 'A-', 'Passed', '2023-03-12 04:04:56', '2023-03-12 04:04:56'),
(262, 195, 3, 'Md Labib Hasan', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 52, 13, 0, 65, 3.50, 'A-', 72, '312', 'English', 23, 0, 0, 23, 0.00, 'F', 57, '313', 'Mathematics', 24, 12, 0, 36, 1.00, 'D', 92, '314', 'Science', 40, 18, 0, 58, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 46, 21, 0, 67, 3.50, 'A-', 80, '20316', 'Islam & Moral Education', 'Islam', 46, 16, 0, 62, 3.50, 'A-', 81, '317', 'I.C.T.', 20, 15, 0, 35, 4.00, 'A', 40, '318', 'Agriculture', 46, 16, 0, 62, 3.50, 'A-', 68, '319', 'Work & LOE', 16, 0, 25, 41, 5.00, 'A+', 45, '320', 'Physical Education', 23, 0, 0, 23, 2.00, 'C', 23, '321', 'Arts & Crafts', 43, 0, 0, 43, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 1, NULL, NULL, 515, 18.50, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-12 04:06:49', '2023-03-12 04:06:49'),
(263, 196, 4, 'Histesh Roy', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 49, 16, 0, 65, 3.50, 'A-', 72, '312', 'English', 51, 0, 0, 51, 3.00, 'B', 57, '313', 'Mathematics', 2, 18, 0, 20, 0.00, 'F', 92, '314', 'Science', 38, 17, 0, 55, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 45, 17, 0, 62, 3.50, 'A-', 80, '20316', 'Hindu & Moral Education', 'Hindu', 60, 21, 0, 81, 5.00, 'A+', 81, '317', 'I.C.T.', 17, 20, 0, 37, 4.00, 'A', 40, '318', 'Agriculture', 44, 23, 0, 67, 3.50, 'A-', 68, '319', 'Work & LOE', 20, 0, 25, 45, 5.00, 'A+', 45, '320', 'Physical Education', 23, 0, 0, 23, 2.00, 'C', 23, '321', 'Arts & Crafts', 43, 0, 0, 43, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 585, 25.00, 3.57, 3.57, 'A-', 1, NULL, NULL, 3.57, 'A-', 'Passed', '2023-03-12 04:08:51', '2023-03-12 04:08:51'),
(264, 197, 5, 'Md Abdul Ahad', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 46, 16, 0, 62, 3.50, 'A-', 72, '312', 'English', 56, 0, 0, 56, 3.00, 'B', 57, '313', 'Mathematics', 24, 19, 0, 43, 2.00, 'C', 92, '314', 'Science', 38, 16, 0, 54, 3.00, 'B', 63, '315', 'Bangladesh & Global studies', 47, 15, 0, 62, 3.50, 'A-', 80, '20316', 'Islam & Moral Education', 'Islam', 52, 15, 0, 67, 3.50, 'A-', 81, '317', 'I.C.T.', 15, 15, 0, 30, 3.50, 'A-', 40, '318', 'Agriculture', 47, 13, 0, 60, 3.50, 'A-', 68, '319', 'Work & LOE', 15, 0, 25, 40, 5.00, 'A+', 45, '320', 'Physical Education', 15, 0, 0, 15, 0.00, 'F', 23, '321', 'Arts & Crafts', 40, 0, 0, 40, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 529, 22.00, 3.14, 3.14, 'B', 1, NULL, NULL, 3.14, 'B', 'Passed', '2023-03-12 04:09:54', '2023-03-12 04:09:54'),
(265, 198, 6, 'Md Ruhul Amin', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 5, 18, 0, 23, 0.00, 'F', 72, '312', 'English', 12, 0, 0, 12, 0.00, 'F', 57, '313', 'Mathematics', 33, 20, 0, 53, 3.00, 'B', 92, '314', 'Science', 33, 10, 0, 43, 2.00, 'C', 63, '315', 'Bangladesh & Global studies', 58, 19, 0, 77, 4.00, 'A', 80, '20316', 'Islam & Moral Education', 'Islam', 54, 14, 0, 68, 3.50, 'A-', 81, '317', 'I.C.T.', 23, 17, 0, 40, 5.00, 'A+', 40, '318', 'Agriculture', 50, 18, 0, 68, 3.50, 'A-', 68, '319', 'Work & LOE', 20, 0, 25, 45, 5.00, 'A+', 45, '320', 'Physical Education', 23, 0, 0, 23, 2.00, 'C', 23, '321', 'Arts & Crafts', 42, 0, 0, 42, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 588, 24.50, 3.50, 3.50, 'A-', 1, NULL, NULL, 3.50, 'A-', 'Passed', '2023-03-12 04:10:59', '2023-03-12 04:10:59'),
(266, 199, 7, 'Md Ryatul Islam', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 43, 11, 0, 54, 3.00, 'B', 72, '312', 'English', 38, 0, 0, 38, 1.00, 'D', 57, '313', 'Mathematics', 12, 13, 0, 25, 0.00, 'F', 92, '314', 'Science', 12, 10, 0, 22, 0.00, 'F', 63, '315', 'Bangladesh & Global studies', 42, 15, 0, 57, 3.00, 'B', 80, '20316', 'Islam & Moral Education', 'Islam', 51, 21, 0, 72, 4.00, 'A', 81, '317', 'I.C.T.', 9, 18, 0, 27, 3.00, 'B', 40, '318', 'Agriculture', 38, 18, 0, 56, 3.00, 'B', 68, '319', 'Work & LOE', 14, 0, 25, 39, 4.00, 'A', 45, '320', 'Physical Education', 21, 0, 0, 21, 2.00, 'C', 23, '321', 'Arts & Crafts', 44, 0, 0, 44, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 2, NULL, NULL, 436, 13.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-12 04:11:46', '2023-03-12 04:11:46'),
(267, 200, 8, 'Prokash Sarker', 120120, 'Eight', 'NA', 'A', '1', 2023, '311', 'Bangla', 35, 15, 0, 50, 3.00, 'B', 72, '312', 'English', 50, 0, 0, 50, 3.00, 'B', 57, '313', 'Mathematics', 24, 21, 0, 45, 2.00, 'C', 92, '314', 'Science', 23, 13, 0, 36, 1.00, 'D', 63, '315', 'Bangladesh & Global studies', 37, 13, 0, 50, 3.00, 'B', 80, '20316', 'Hindu & Moral Education', 'Hindu', 56, 20, 0, 76, 4.00, 'A', 81, '317', 'I.C.T.', 8, 14, 0, 22, 2.00, 'C', 40, '318', 'Agriculture', 13, 7, 0, 20, 0.00, 'F', 68, '319', 'Work & LOE', 13, 0, 25, 38, 4.00, 'A', 45, '320', 'Physical Education', 11, 0, 0, 11, 0.00, 'F', 23, '321', 'Arts & Crafts', 40, 0, 0, 40, 5.00, 'A+', 44, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', 0, NULL, NULL, 438, 18.00, 2.57, 2.57, 'C', 1, NULL, NULL, 2.57, 'C', 'Passed', '2023-03-12 04:13:04', '2023-03-12 04:13:04'),
(269, 202, 1, 'Laboni Akther Mou', 120120, 'Nine', 'Science', 'A', '1', 2023, '411', 'Bangla 1st Paper', 61, 23, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 62, 25, 0, 171, 5.00, 'A+', 171, '413', 'English 1st Paper', 73, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 86, 0, 0, 159, 4.00, 'A', 159, '415', 'Mathematics', 58, 18, 0, 76, 4.00, 'A', 76, '20416', 'Islam & Moral Education', 'Islam', 57, 19, 0, 76, 4.00, 'A', 76, '417', 'Bangladesh & Global studies', 66, 14, 0, 80, 5.00, 'A+', 80, '418', 'Physics', 46, 13, 25, 84, 5.00, 'A+', 87, '419', 'Chemistry', 37, 13, 25, 75, 4.00, 'A', 75, '420', 'I.C.T.', 0, 20, 25, 45, 5.00, 'A+', 45, '421', 'Career Education', 0, 23, 25, 48, 5.00, 'A+', 48, '422', 'Physical Education', 46, 15, 25, 86, 5.00, 'A+', 86, '20423', 'Biology', 'Bio', 40, 8, 23, 71, 4.00, 'A', 76, '20424', 'Higher Math', 'Hig', 43, 24, 25, 92, 3.00, '5-A+', 92, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 1063, 43.00, 4.78, 4.78, 'A', 1, NULL, NULL, 4.78, 'A', 'Passed', '2023-03-15 01:45:45', '2023-03-15 01:45:45'),
(270, 203, 2, 'Farisha Rahman', 120120, 'Nine', 'Science', 'A', '1', 2023, '411', 'Bangla 1st Paper', 60, 22, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 62, 25, 0, 169, 5.00, 'A+', 171, '413', 'English 1st Paper', 80, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 66, 0, 0, 146, 4.00, 'A', 159, '415', 'Mathematics', 50, 20, 0, 70, 4.00, 'A', 76, '20416', 'Islam & Moral Education', 'Islam', 57, 16, 0, 73, 4.00, 'A', 76, '417', 'Bangladesh & Global studies', 63, 13, 0, 76, 4.00, 'A', 80, '418', 'Physics', 46, 16, 25, 87, 5.00, 'A+', 87, '419', 'Chemistry', 35, 9, 25, 69, 3.50, 'A-', 75, '420', 'I.C.T.', 0, 17, 25, 42, 5.00, 'A+', 45, '421', 'Career Education', 0, 23, 25, 48, 5.00, 'A+', 48, '422', 'Physical Education', 45, 15, 25, 85, 5.00, 'A+', 86, '20423', 'Biology', 'Bio', 40, 13, 23, 76, 4.00, 'A', 76, '20424', 'Higher Math', 'Hig', 43, 24, 25, 92, 3.00, '5-A+', 92, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 1033, 41.50, 4.61, 4.61, 'A', 1, NULL, NULL, 4.61, 'A', 'Passed', '2023-03-15 01:47:07', '2023-03-15 01:47:07'),
(271, 204, 3, 'Maftahul Jannat Mou', 120120, 'Nine', 'Science', 'A', '1', 2023, '411', 'Bangla 1st Paper', 47, 16, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 56, 20, 0, 139, 3.50, 'A-', 171, '413', 'English 1st Paper', 65, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 43, 0, 0, 108, 3.00, 'B', 159, '415', 'Mathematics', 17, 11, 0, 28, 0.00, 'F', 76, '20416', 'Islam & Moral Education', 'Islam', 51, 17, 0, 68, 3.50, 'A-', 76, '417', 'Bangladesh & Global studies', 51, 12, 0, 63, 3.50, 'A-', 80, '418', 'Physics', 45, 14, 25, 84, 5.00, 'A+', 87, '419', 'Chemistry', 18, 8, 25, 51, 3.00, 'B', 75, '420', 'I.C.T.', 0, 16, 25, 41, 5.00, 'A+', 45, '421', 'Career Education', 0, 23, 25, 48, 5.00, 'A+', 48, '422', 'Physical Education', 41, 15, 25, 81, 5.00, 'A+', 86, '20423', 'Biology', 'Bio', 28, 18, 23, 69, 3.50, 'A-', 76, '20424', 'Higher Math', 'Hig', 43, 15, 25, 83, 3.00, '5-A+', 92, '0', '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 1, NULL, NULL, 863, 33.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-15 01:48:49', '2023-03-15 01:48:49'),
(272, 205, 4, 'Mst. Soheli', 120120, 'Nine', 'Science', 'A', '1', 2023, '411', 'Bangla 1st Paper', 42, 12, 0, 0, NULL, NULL, 0, '412', 'Bangla 2nd Paper', 44, 16, 0, 114, 3.00, 'B', 171, '413', 'English 1st Paper', 46, 0, 0, 0, NULL, NULL, 0, '414', 'English 2nd Paper', 40, 0, 0, 86, 2.00, 'C', 159, '415', 'Mathematics', 24, 6, 0, 30, 0.00, 'F', 76, '20416', 'Islam & Moral Education', 'Islam', 53, 16, 0, 69, 3.50, 'A-', 76, '417', 'Bangladesh & Global studies', 42, 11, 0, 53, 3.00, 'B', 80, '418', 'Physics', 40, 9, 25, 74, 4.00, 'A', 87, '419', 'Chemistry', 17, 10, 25, 52, 3.00, 'B', 75, '420', 'I.C.T.', 0, 12, 25, 37, 4.00, 'A', 45, '421', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 48, '422', 'Physical Education', 36, 14, 25, 75, 4.00, 'A', 86, '20423', 'Biology', 'Bio', 26, 8, 23, 57, 3.00, 'B', 76, '20424', 'Agriculture', 'Agr', 27, 11, 24, 62, 1.50, '3.5 A-', 92, '0', '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 1, NULL, NULL, 756, 27.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-15 01:50:28', '2023-03-15 01:50:28'),
(273, 206, 1, 'Md Rifat Hossain', 120120, 'Nine', 'Humanities', 'A', '1', 2023, '611', 'Bangla 1st Paper', 58, 22, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 61, 27, 0, 168, 5.00, 'A+', 168, '613', 'English 1st Paper', 72, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 71, 0, 0, 143, 4.00, 'A', 143, '615', 'Mathematics', 52, 15, 0, 67, 3.50, 'A-', 67, '20616', 'Islam & Moral Education', 'Islam', 61, 26, 0, 87, 5.00, 'A+', 87, '617', 'Science', 62, 20, 0, 82, 5.00, 'A+', 82, '618', 'Geography', 57, 23, 0, 80, 5.00, 'A+', 80, '619', 'History Of BWC', 63, 23, 0, 86, 5.00, 'A+', 86, '620', 'I.C.T.', 0, 21, 25, 46, 5.00, 'A+', 46, '621', 'Career Education', 0, 23, 25, 48, 5.00, 'A+', 48, '622', 'Physical Education', 41, 15, 25, 81, 5.00, 'A+', 81, '20623', 'Civics & Citizenship', 'Civ', 60, 25, 0, 85, 5.00, 'A+', 85, '20624', 'Agriculture', 'Agr', 38, 11, 24, 73, 2.00, '4-A', 73, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 1046, 44.50, 4.94, 4.94, 'A', 1, NULL, NULL, 4.94, 'A', 'Passed', '2023-03-15 03:15:15', '2023-03-15 03:15:15'),
(274, 207, 2, 'Sakhawat Hossain', 120120, 'Nine', 'Humanities', 'A', '1', 2023, '611', 'Bangla 1st Paper', 29, 20, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 24, 16, 0, 89, 2.00, 'C', 168, '613', 'English 1st Paper', 36, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 33, 0, 0, 69, 1.00, 'D', 143, '615', 'Mathematics', 28, 13, 0, 41, 2.00, 'C', 67, '20616', 'Islam & Moral Education', 'Islam', 34, 16, 0, 50, 3.00, 'B', 87, '617', 'Science', 41, 16, 0, 57, 3.00, 'B', 82, '618', 'Geography', 23, 14, 0, 37, 1.00, 'D', 80, '619', 'History Of BWC', 34, 13, 0, 47, 2.00, 'C', 86, '620', 'I.C.T.', 0, 15, 24, 39, 4.00, 'A', 46, '621', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 48, '622', 'Physical Education', 30, 15, 25, 70, 4.00, 'A', 81, '20623', 'Civics & Citizenship', 'Civ', 34, 18, 0, 52, 3.00, 'B', 85, '20624', 'Agriculture', 'Agr', 28, 13, 24, 65, 1.50, '3.5 A-', 73, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 663, 22.50, 2.50, 2.50, 'C', 1, NULL, NULL, 2.50, 'C', 'Passed', '2023-03-15 03:15:54', '2023-03-15 03:15:54'),
(275, 208, 3, 'Imran Ali', 120120, 'Nine', 'Humanities', 'A', '1', 2023, '611', 'Bangla 1st Paper', 23, 12, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 32, 13, 0, 80, 2.00, 'C', 168, '613', 'English 1st Paper', 20, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 6, 0, 0, 26, 0.00, '0', 143, '615', 'Mathematics', 6, 8, 0, 14, 0.00, 'F', 67, '20616', 'Islam & Moral Education', 'Islam', 41, 14, 0, 55, 3.00, 'B', 87, '617', 'Science', 42, 14, 0, 56, 3.00, 'B', 82, '618', 'Geography', 23, 13, 0, 36, 1.00, 'D', 80, '619', 'History Of BWC', 33, 14, 0, 47, 2.00, 'C', 86, '620', 'I.C.T.', 0, 20, 23, 43, 5.00, 'A+', 46, '621', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 48, '622', 'Physical Education', 26, 14, 25, 65, 3.50, 'A-', 81, '20623', 'Civics & Citizenship', 'Civ', 28, 18, 0, 46, 2.00, 'C', 85, '20624', 'Agriculture', 'Agr', 26, 11, 24, 61, 1.50, '3.5 A-', 73, '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 2, NULL, NULL, 576, 19.50, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-15 03:16:33', '2023-03-15 03:16:33'),
(276, 209, 4, 'Durjoy Chandra Roy', 120120, 'Nine', 'Humanities', 'A', '1', 2023, '611', 'Bangla 1st Paper', 23, 15, 0, 0, NULL, NULL, 0, '612', 'Bangla 2nd Paper', 23, 15, 0, 76, 1.00, 'D', 168, '613', 'English 1st Paper', 33, 0, 0, 0, NULL, NULL, 0, '614', 'English 2nd Paper', 12, 0, 0, 45, 0.00, '0', 143, '615', 'Mathematics', 10, 5, 0, 15, 0.00, 'F', 67, '20616', 'Hindu & Moral Education', 'Hindu', 40, 13, 0, 53, 3.00, 'B', 87, '617', 'Science', 43, 15, 0, 58, 3.00, 'B', 82, '618', 'Geography', 38, 11, 0, 49, 2.00, 'C', 80, '619', 'History Of BWC', 30, 5, 0, 35, 0.00, 'F', 86, '620', 'I.C.T.', 0, 12, 23, 35, 4.00, 'A', 46, '621', 'Career Education', 0, 22, 22, 44, 5.00, 'A+', 48, '622', 'Physical Education', 25, 12, 25, 62, 3.50, 'A-', 81, '20623', 'Civics & Citizenship', 'Civ', 56, 27, 0, 83, 5.00, 'A+', 85, '20624', 'Agriculture', 'Agr', 20, 12, 24, 56, 1.00, '3-B', 73, '0', '1', '0', '0', '0', '1', '1', '1', '0', '1', '0', '0', '1', '1', 3, NULL, NULL, 577, 16.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-15 03:17:05', '2023-03-15 03:17:05'),
(277, 210, 1, 'Ontorra Saha', 120120, 'Ten', 'Commerce', 'A', '1', 2023, '811', 'Bangla 1st Paper', 60, 23, 0, 0, NULL, NULL, 0, '812', 'Bangla 2nd Paper', 50, 14, 0, 147, 4.00, 'A', 147, '813', 'English 1st Paper', 61, 0, 0, 0, NULL, NULL, 0, '814', 'English 2nd Paper', 58, 0, 0, 119, 3.00, 'B', 119, '815', 'Mathematics', 30, 10, 0, 40, 2.00, 'C', 43, '20816', 'Hindu & Moral Education', 'Hindu', 57, 25, 0, 82, 5.00, 'A+', 82, '817', 'Science', 57, 17, 0, 74, 4.00, 'A', 74, '818', 'Accounting', 49, 18, 0, 67, 3.50, 'A-', 67, '819', 'Finance Banking', 63, 27, 0, 90, 5.00, 'A+', 90, '820', 'I.C.T.', 0, 13, 25, 38, 4.00, 'A', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20823', 'Entrepreneurship', 'Ent', 64, 26, 0, 90, 5.00, 'A+', 90, '20824', 'Agriculture', 'Agr', 41, 16, 25, 82, 3.00, '5-A+', 82, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 829, 38.50, 4.28, 4.28, 'A', 1, NULL, NULL, 4.28, 'A', 'Passed', '2023-03-16 21:30:51', '2023-03-16 21:30:51'),
(278, 211, 2, 'Bithi', 120120, 'Ten', 'Commerce', 'A', '1', 2023, '811', 'Bangla 1st Paper', 47, 23, 0, 0, NULL, NULL, 0, '812', 'Bangla 2nd Paper', 40, 10, 0, 120, 3.50, 'A-', 147, '813', 'English 1st Paper', 43, 0, 0, 0, NULL, NULL, 0, '814', 'English 2nd Paper', 47, 0, 0, 90, 2.00, 'C', 119, '815', 'Mathematics', 23, 10, 0, 33, 1.00, 'D', 43, '20816', 'Hindu & Moral Education', 'Hindu', 56, 24, 0, 80, 5.00, 'A+', 82, '817', 'Science', 50, 18, 0, 68, 3.50, 'A-', 74, '818', 'Accounting', 37, 20, 0, 57, 3.00, 'B', 67, '819', 'Finance Banking', 50, 25, 0, 75, 4.00, 'A', 90, '820', 'I.C.T.', 0, 10, 25, 35, 4.00, 'A', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20823', 'Entrepreneurship', 'Ent', 60, 20, 0, 80, 5.00, 'A+', 90, '20824', 'Agriculture', 'Agr', 34, 15, 25, 74, 2.00, '4-A', 82, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 712, 33.00, 3.67, 3.67, 'A-', 1, NULL, NULL, 3.67, 'A-', 'Passed', '2023-03-16 21:31:36', '2023-03-16 21:31:36'),
(279, 212, 4, 'Maruf', 120120, 'Ten', 'Commerce', 'A', '1', 2023, '811', 'Bangla 1st Paper', 25, 15, 0, 0, NULL, NULL, 0, '812', 'Bangla 2nd Paper', 43, 13, 0, 96, 2.00, 'C', 147, '813', 'English 1st Paper', 34, 0, 0, 0, NULL, NULL, 0, '814', 'English 2nd Paper', 45, 0, 0, 79, 1.00, 'D', 119, '815', 'Mathematics', 23, 20, 0, 43, 2.00, 'C', 43, '20816', 'Islam & Moral Education', 'Islam', 41, 22, 0, 63, 3.50, 'A-', 82, '817', 'Science', 32, 12, 0, 44, 2.00, 'C', 74, '818', 'Accounting', 25, 15, 0, 40, 2.00, 'C', 67, '819', 'Finance Banking', 27, 15, 0, 42, 2.00, 'C', 90, '820', 'I.C.T.', 0, 17, 25, 42, 5.00, 'A+', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20823', 'Entrepreneurship', 'Ent', 40, 20, 0, 60, 3.50, 'A-', 90, '20824', 'Agriculture', 'Agr', 26, 7, 25, 58, 0.00, 'F', 82, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '0', 1, NULL, NULL, 567, 23.00, 2.56, 2.56, 'C', 1, NULL, NULL, 2.56, 'C', 'Passed', '2023-03-16 21:32:17', '2023-03-16 21:32:17'),
(284, 217, 1, 'Sharmin  Akther  Shik', 120120, 'Ten', 'Humanities', 'A', '1', 2023, '711', 'Bangla 1st Paper', 35, 19, 0, 0, NULL, NULL, 0, '712', 'Bangla 2nd Paper', 47, 25, 0, 126, 3.50, 'A-', 126, '713', 'English 1st Paper', 40, 0, 0, 0, NULL, NULL, 0, '714', 'English 2nd Paper', 33, 0, 0, 73, 1.00, 'D', 73, '715', 'Mathematics', 23, 16, 0, 39, 1.00, 'D', 39, '20716', 'Islam & Moral Education', 'Islam', 41, 26, 0, 67, 3.50, 'A-', 67, '717', 'Science', 53, 17, 0, 70, 4.00, 'A', 70, '718', 'Geography', 32, 19, 0, 51, 3.00, 'B', 56, '719', 'History Of BWC', 36, 18, 0, 54, 3.00, 'B', 54, '720', 'I.C.T.', 0, 19, 24, 43, 5.00, 'A+', 43, '721', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 47, '722', 'Physical Education', 35, 15, 25, 75, 4.00, 'A', 76, '20723', 'Civics & Citizenship', 'Civ', 38, 24, 0, 62, 3.50, 'A-', 62, '20724', 'Agriculture', 'Agr', 32, 16, 24, 72, 2.00, '4-A', 72, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 779, 29.50, 3.28, 3.28, 'B', 1, NULL, NULL, 3.28, 'B', 'Passed', '2023-03-17 13:38:54', '2023-03-17 13:38:54'),
(285, 218, 2, 'Jafrin Akther Jui', 120120, 'Ten', 'Humanities', 'A', '1', 2023, '711', 'Bangla 1st Paper', 38, 10, 0, 0, NULL, NULL, 0, '712', 'Bangla 2nd Paper', 32, 20, 0, 100, 3.00, 'B', 126, '713', 'English 1st Paper', 40, 0, 0, 0, NULL, NULL, 0, '714', 'English 2nd Paper', 33, 0, 0, 73, 1.00, 'D', 73, '715', 'Mathematics', 13, 6, 0, 19, 0.00, 'F', 39, '20716', 'Islam & Moral Education', 'Islam', 48, 16, 0, 64, 3.50, 'A-', 67, '717', 'Science', 60, 10, 0, 70, 4.00, 'A', 70, '718', 'Geography', 44, 12, 0, 56, 3.00, 'B', 56, '719', 'History Of BWC', 37, 13, 0, 50, 3.00, 'B', 54, '720', 'I.C.T.', 0, 16, 25, 41, 5.00, 'A+', 43, '721', 'Career Education', 0, 21, 25, 46, 5.00, 'A+', 47, '722', 'Physical Education', 28, 15, 25, 68, 3.50, 'A-', 76, '20723', 'Civics & Citizenship', 'Civ', 36, 20, 0, 56, 3.00, 'B', 62, '20724', 'Agriculture', 'Agr', 32, 6, 24, 62, 0.00, 'F', 72, '0', '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '0', 2, NULL, NULL, 705, 25.50, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-17 13:40:14', '2023-03-17 13:40:14'),
(286, 219, 3, 'Mst. Ripa', 120120, 'Ten', 'Humanities', 'A', '1', 2023, '711', 'Bangla 1st Paper', 28, 18, 0, 0, NULL, NULL, 0, '712', 'Bangla 2nd Paper', 34, 21, 0, 101, 3.00, 'B', 126, '713', 'English 1st Paper', 22, 0, 0, 0, NULL, NULL, 0, '714', 'English 2nd Paper', 33, 0, 0, 55, 0.00, '0', 73, '715', 'Mathematics', 13, 9, 0, 22, 0.00, 'F', 39, '20716', 'Islam & Moral Education', 'Islam', 36, 14, 0, 50, 3.00, 'B', 67, '717', 'Science', 40, 10, 0, 50, 3.00, 'B', 70, '718', 'Geography', 36, 18, 0, 54, 3.00, 'B', 56, '719', 'History Of BWC', 26, 10, 0, 36, 1.00, 'D', 54, '720', 'I.C.T.', 0, 14, 25, 39, 4.00, 'A', 43, '721', 'Career Education', 0, 22, 22, 44, 5.00, 'A+', 47, '722', 'Physical Education', 36, 15, 25, 76, 4.00, 'A', 76, '20723', 'Civics & Citizenship', 'Civ', 29, 17, 0, 46, 2.00, 'C', 62, '20724', 'Agriculture', 'Agr', 28, 8, 24, 60, 1.50, '3.5 A-', 72, '0', '1', '0', '0', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 2, NULL, NULL, 633, 20.50, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-17 13:41:02', '2023-03-17 13:41:02'),
(287, 220, 1, 'Shree Moti Arpona', 120120, 'Ten', 'Science', 'A', '1', 2023, '511', 'Bangla 1st Paper', 50, 12, 0, 0, NULL, NULL, 0, '512', 'Bangla 2nd Paper', 56, 20, 0, 138, 3.50, 'A-', 149, '513', 'English 1st Paper', 46, 0, 0, 0, NULL, NULL, 0, '514', 'English 2nd Paper', 40, 0, 0, 86, 2.00, 'C', 108, '515', 'Mathematics', 43, 10, 0, 53, 3.00, 'B', 56, '20516', 'Hindu & Moral Education', 'Hindu', 65, 21, 0, 86, 5.00, 'A+', 87, '517', 'Bangladesh & Global studies', 58, 18, 0, 76, 4.00, 'A', 77, '518', 'Physics', 42, 13, 25, 80, 5.00, 'A+', 85, '519', 'Chemistry', 22, 10, 25, 57, 3.00, 'B', 68, '520', 'I.C.T.', 0, 18, 25, 43, 5.00, 'A+', 45, '521', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 47, '522', 'Physical Education', 44, 13, 25, 82, 5.00, 'A+', 84, '20523', 'Biology', 'Bio', 36, 11, 23, 70, 4.00, 'A', 76, '20524', 'Higher Math', 'Hig', 23, 18, 25, 66, 1.50, '3.5 A-', 74, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 884, 36.00, 4.00, 4.00, 'A', 1, NULL, NULL, 4.00, 'A', 'Passed', '2023-03-18 17:27:32', '2023-03-18 17:27:32');
INSERT INTO `marks` (`id`, `uid`, `roll`, `name`, `eiin`, `class`, `babu`, `section`, `exam`, `year`, `sub11code`, `sub11n`, `sub11c`, `sub11m`, `sub11p`, `sub11t`, `sub11gp`, `sub11g`, `sub11h`, `sub12code`, `sub12n`, `sub12c`, `sub12m`, `sub12p`, `sub12t`, `sub12gp`, `sub12g`, `sub12h`, `sub13code`, `sub13n`, `sub13c`, `sub13m`, `sub13p`, `sub13t`, `sub13gp`, `sub13g`, `sub13h`, `sub14code`, `sub14n`, `sub14c`, `sub14m`, `sub14p`, `sub14t`, `sub14gp`, `sub14g`, `sub14h`, `sub15code`, `sub15n`, `sub15c`, `sub15m`, `sub15p`, `sub15t`, `sub15gp`, `sub15g`, `sub15h`, `sub16code`, `sub16n`, `sub16sn`, `sub16c`, `sub16m`, `sub16p`, `sub16t`, `sub16gp`, `sub16g`, `sub16h`, `sub17code`, `sub17n`, `sub17c`, `sub17m`, `sub17p`, `sub17t`, `sub17gp`, `sub17g`, `sub17h`, `sub18code`, `sub18n`, `sub18c`, `sub18m`, `sub18p`, `sub18t`, `sub18gp`, `sub18g`, `sub18h`, `sub19code`, `sub19n`, `sub19c`, `sub19m`, `sub19p`, `sub19t`, `sub19gp`, `sub19g`, `sub19h`, `sub20code`, `sub20n`, `sub20c`, `sub20m`, `sub20p`, `sub20t`, `sub20gp`, `sub20g`, `sub20h`, `sub21code`, `sub21n`, `sub21c`, `sub21m`, `sub21p`, `sub21t`, `sub21gp`, `sub21g`, `sub21h`, `sub22code`, `sub22n`, `sub22c`, `sub22m`, `sub22p`, `sub22t`, `sub22gp`, `sub22g`, `sub22h`, `sub23code`, `sub23n`, `sub23sn`, `sub23c`, `sub23m`, `sub23p`, `sub23t`, `sub23gp`, `sub23g`, `sub23h`, `sub24code`, `sub24n`, `sub24sn`, `sub24c`, `sub24m`, `sub24p`, `sub24t`, `sub24gp`, `sub24g`, `sub24h`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `sub17`, `sub18`, `sub19`, `sub20`, `sub21`, `sub22`, `sub23`, `sub24`, `tfail`, `pclass`, `tclass`, `total`, `totalgpa`, `gpa1`, `gpa`, `g`, `rs`, `fgp`, `fg`, `cgp`, `cg`, `result`, `created_at`, `updated_at`) VALUES
(288, 221, 2, 'Puja Rani', 120120, 'Ten', 'Science', 'A', '1', 2023, '511', 'Bangla 1st Paper', 50, 15, 0, 0, NULL, NULL, 0, '512', 'Bangla 2nd Paper', 61, 23, 0, 149, 4.00, 'A', 149, '513', 'English 1st Paper', 53, 0, 0, 0, NULL, NULL, 0, '514', 'English 2nd Paper', 55, 0, 0, 108, 3.00, 'B', 108, '515', 'Mathematics', 43, 13, 0, 56, 3.00, 'B', 56, '20516', 'Hindu & Moral Education', 'Hindu', 65, 22, 0, 87, 5.00, 'A+', 87, '517', 'Bangladesh & Global studies', 60, 17, 0, 77, 4.00, 'A', 77, '518', 'Physics', 43, 17, 25, 85, 5.00, 'A+', 85, '519', 'Chemistry', 32, 11, 25, 68, 3.50, 'A-', 68, '520', 'I.C.T.', 0, 20, 25, 45, 5.00, 'A+', 45, '521', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 47, '522', 'Physical Education', 44, 15, 25, 84, 5.00, 'A+', 84, '20523', 'Biology', 'Bio', 41, 12, 23, 76, 4.00, 'A', 76, '20524', 'Higher Math', 'Hig', 31, 18, 25, 74, 2.00, '4-A', 74, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 956, 38.50, 4.28, 4.28, 'A', 1, NULL, NULL, 4.28, 'A', 'Passed', '2023-03-18 17:28:31', '2023-03-18 17:28:31'),
(289, 222, 3, 'Sanjida Akter', 120120, 'Ten', 'Science', 'A', '1', 2023, '511', 'Bangla 1st Paper', 55, 15, 0, 0, NULL, NULL, 0, '512', 'Bangla 2nd Paper', 56, 20, 0, 146, 4.00, 'A', 149, '513', 'English 1st Paper', 52, 0, 0, 0, NULL, NULL, 0, '514', 'English 2nd Paper', 40, 0, 0, 92, 2.00, 'C', 108, '515', 'Mathematics', 27, 7, 0, 34, 0.00, 'F', 56, '20516', 'Islam & Moral Education', 'Islam', 59, 21, 0, 80, 5.00, 'A+', 87, '517', 'Bangladesh & Global studies', 56, 13, 0, 69, 3.50, 'A-', 77, '518', 'Physics', 33, 16, 25, 74, 4.00, 'A', 85, '519', 'Chemistry', 32, 11, 25, 68, 3.50, 'A-', 68, '520', 'I.C.T.', 0, 20, 25, 45, 5.00, 'A+', 45, '521', 'Career Education', 0, 22, 25, 47, 5.00, 'A+', 47, '522', 'Physical Education', 43, 14, 25, 82, 5.00, 'A+', 84, '20523', 'Biology', 'Bio', 35, 11, 23, 69, 3.50, 'A-', 76, '20524', 'Higher Math', 'Hig', 27, 15, 25, 67, 1.50, '3.5 A-', 74, '0', '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '1', 1, NULL, NULL, 873, 32.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-18 17:29:41', '2023-03-18 17:29:41'),
(290, 223, 5, 'Hitest Roy', 120120, 'Seven', 'NA', 'A', '1', 2023, '211', 'Bangla', 49, 16, 0, 65, 3.50, 'A-', 65, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '213', 'English 1st Paper', 51, 0, 0, 51, 3.00, 'B', 57, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '215', 'Mathematics', 38, 18, 0, 56, 3.00, 'B', 56, '20216', 'Hindu & Moral Education', 'Hindu', 60, 21, 0, 81, 5.00, 'A+', 81, '217', 'Science', 38, 17, 0, 55, 3.00, 'B', 55, '218', 'Bangladesh & Global studies', 45, 17, 0, 62, 3.50, 'A-', 77, '219', 'I.C.T.', 17, 20, 0, 37, 4.00, 'A', 40, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', 0, NULL, NULL, 407, 25.00, 3.57, 3.57, 'A-', 1, NULL, NULL, 3.57, 'A-', 'Passed', '2023-03-19 00:11:46', '2023-03-19 00:11:46'),
(291, 224, 6, 'Md Abdul Ahmed', 120120, 'Seven', 'NA', 'A', '1', 2023, '211', 'Bangla', 46, 16, 0, 62, 3.50, 'A-', 65, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '213', 'English 1st Paper', 56, 0, 0, 56, 3.00, 'B', 57, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '215', 'Mathematics', 24, 19, 0, 43, 2.00, 'C', 56, '20216', 'Islam & Moral Education', 'Islam', 52, 15, 0, 67, 3.50, 'A-', 81, '217', 'Science', 38, 16, 0, 54, 3.00, 'B', 55, '218', 'Bangladesh & Global studies', 47, 15, 0, 62, 3.50, 'A-', 77, '219', 'I.C.T.', 15, 15, 0, 30, 3.50, 'A-', 40, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', 0, NULL, NULL, 374, 22.00, 3.14, 3.14, 'B', 1, NULL, NULL, 3.14, 'B', 'Passed', '2023-03-19 00:12:53', '2023-03-19 00:12:53'),
(292, 225, 7, 'MD Ruhul Ahad', 120120, 'Seven', 'NA', 'A', '1', 2023, '211', 'Bangla', 44, 18, 0, 62, 3.50, 'A-', 65, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '213', 'English 1st Paper', 57, 0, 0, 57, 3.00, 'B', 57, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '215', 'Mathematics', 33, 20, 0, 53, 3.00, 'B', 56, '20216', 'Islam & Moral Education', 'Islam', 54, 14, 0, 68, 3.50, 'A-', 81, '217', 'Science', 33, 10, 0, 43, 2.00, 'C', 55, '218', 'Bangladesh & Global studies', 58, 19, 0, 77, 4.00, 'A', 77, '219', 'I.C.T.', 23, 17, 0, 40, 5.00, 'A+', 40, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', 0, NULL, NULL, 400, 24.00, 3.43, 3.43, 'B', 1, NULL, NULL, 3.43, 'B', 'Passed', '2023-03-19 00:13:21', '2023-03-19 00:13:21'),
(293, 226, 8, 'MD RYATUL ISLAM', 120120, 'Seven', 'NA', 'A', '1', 2023, '211', 'Bangla', 43, 21, 0, 64, 3.50, 'A-', 65, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '213', 'English 1st Paper', 38, 0, 0, 38, 1.00, 'D', 57, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '215', 'Mathematics', 12, 13, 0, 25, 0.00, 'F', 56, '20216', 'Islam & Moral Education', 'Islam', 41, 12, 0, 53, 3.00, 'B', 81, '217', 'Science', 32, 10, 0, 42, 2.00, 'C', 55, '218', 'Bangladesh & Global studies', 42, 15, 0, 57, 3.00, 'B', 77, '219', 'I.C.T.', 9, 18, 0, 27, 3.00, 'B', 40, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '1', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', '0', 1, NULL, NULL, 296, 15.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-19 00:13:44', '2023-03-19 00:13:44'),
(294, 227, 1, 'Fatema', 120120, 'Nine', 'Commerce', 'A', '1', 2023, '911', 'Bangla 1st Paper', 24, 22, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 35, 10, 0, 91, 2.00, 'C', 102, '913', 'English 1st Paper', 40, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 33, 0, 0, 73, 1.00, 'D', 95, '915', 'Mathematics', 6, 12, 0, 18, 0.00, 'F', 61, '20916', 'Islam & Moral Education', 'Islam', 40, 18, 0, 58, 3.00, 'B', 59, '917', 'Science', 36, 16, 0, 52, 3.00, 'B', 52, '918', 'Accounting', 47, 18, 0, 65, 3.50, 'A-', 65, '919', 'Finance Banking', 38, 21, 0, 59, 3.00, 'B', 59, '920', 'I.C.T.', 0, 12, 25, 37, 4.00, 'A', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 48, 22, 0, 70, 4.00, 'A', 70, '20924', 'Agriculture', 'Agr', 24, 7, 25, 56, 0.00, 'F', 56, '0', '1', '0', '1', '0', '1', '1', '1', '1', '1', '0', '0', '1', '0', 2, NULL, NULL, 579, 23.50, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-19 20:20:26', '2023-03-19 20:20:26'),
(295, 228, 2, 'Sumon', 120120, 'Nine', 'Commerce', 'A', '1', 2023, '911', 'Bangla 1st Paper', 24, 17, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 22, 15, 0, 78, 1.00, 'D', 102, '913', 'English 1st Paper', 35, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 34, 0, 0, 69, 1.00, 'D', 95, '915', 'Mathematics', 23, 16, 0, 39, 1.00, 'D', 61, '20916', 'Islam & Moral Education', 'Islam', 25, 19, 0, 44, 2.00, 'C', 59, '917', 'Science', 25, 10, 0, 35, 1.00, 'D', 52, '918', 'Accounting', 25, 11, 0, 36, 1.00, 'D', 65, '919', 'Finance Banking', 24, 11, 0, 35, 1.00, 'D', 59, '920', 'I.C.T.', 0, 17, 25, 42, 5.00, 'A+', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 25, 20, 0, 45, 2.00, 'C', 70, '20924', 'Agriculture', 'Agr', 17, 8, 25, 50, 1.00, '3-B', 56, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 473, 16.00, 1.78, 1.78, 'D', 1, NULL, NULL, 1.78, 'D', 'Passed', '2023-03-19 20:20:51', '2023-03-19 20:20:51'),
(296, 229, 3, 'Reyad', 120120, 'Nine', 'Commerce', 'A', '1', 2023, '911', 'Bangla 1st Paper', 34, 24, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 30, 14, 0, 102, 3.00, 'B', 102, '913', 'English 1st Paper', 55, 0, 0, 0, NULL, NULL, 0, '914', 'English 2nd Paper', 40, 0, 0, 95, 2.00, 'C', 95, '915', 'Mathematics', 36, 25, 0, 61, 3.50, 'A-', 61, '20916', 'Islam & Moral Education', 'Islam', 41, 18, 0, 59, 3.00, 'B', 59, '917', 'Science', 38, 13, 0, 51, 3.00, 'B', 52, '918', 'Accounting', 37, 17, 0, 54, 3.00, 'B', 65, '919', 'Finance Banking', 27, 12, 0, 39, 1.00, 'D', 59, '920', 'I.C.T.', 0, 13, 25, 38, 4.00, 'A', 42, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20923', 'Entrepreneurship', 'Ent', 35, 20, 0, 55, 3.00, 'B', 70, '20924', 'Agriculture', 'Agr', 18, 10, 25, 53, 1.00, '3-B', 56, '0', '1', '0', '1', '1', '1', '1', '1', '1', '1', '0', '0', '1', '1', 0, NULL, NULL, 607, 26.50, 2.94, 2.94, 'C', 1, NULL, NULL, 2.94, 'C', 'Passed', '2023-03-19 20:21:19', '2023-03-19 20:21:19'),
(301, 234, 1, 'Shree Moti Arpona', 120120, 'Six', 'NA', 'A', '1', 2023, '111', 'Bangla 1st', 55, 15, 0, 70, 4.00, 'A', 72, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 3, NULL, NULL, 70, 4.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-22 02:29:41', '2023-03-22 02:29:41'),
(302, 235, 2, 'Md Imran Hasan', 120120, 'Six', 'NA', 'A', '1', 2023, '111', 'Bangla 1st', 42, 9, 0, 51, 0.00, 'F', 72, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 4, NULL, NULL, 51, 0.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-22 02:30:02', '2023-03-22 02:30:02'),
(303, 236, 3, 'Histesh Roy', 120120, 'Six', 'NA', 'A', '1', 2023, '111', 'Bangla 1st', 56, 16, 0, 72, 4.00, 'A', 72, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Hindu & Moral Education', 'Hindu', 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'NA', 'NA', 0, 0, 0, 0, NULL, NULL, 0, '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 3, NULL, NULL, 72, 4.00, 0.00, 0.00, 'F', 1, NULL, NULL, 0.00, 'F', 'Failed', '2023-03-22 02:30:19', '2023-03-22 02:30:19'),
(313, 253, 1, 'Name 1', 120120, 'Nine', 'Humanities', 'A', '2', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20616', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '618', 'Geography', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20623', 'Civics & Citizenship', 'Civ', 0, 0, 0, 0, 0.00, 'F', NULL, '20624', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:05:41', '2023-03-23 15:05:41'),
(314, 254, 2, 'Name 2', 120120, 'Nine', 'Humanities', 'A', '2', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20616', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '618', 'Geography', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20623', 'Civics & Citizenship', 'Civ', 0, 0, 0, 0, 0.00, 'F', NULL, '20624', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:05:41', '2023-03-23 15:05:41'),
(315, 255, 3, 'Name 3', 120120, 'Nine', 'Humanities', 'A', '2', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20616', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '618', 'Geography', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20623', 'Civics & Citizenship', 'Civ', 0, 0, 0, 0, 0.00, 'F', NULL, '20624', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:05:41', '2023-03-23 15:05:41'),
(316, 256, 4, 'Name 4', 120120, 'Nine', 'Humanities', 'A', '2', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20616', 'Hindu & Moral Education', 'Hindu', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '618', 'Geography', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20623', 'Civics & Citizenship', 'Civ', 0, 0, 0, 0, 0.00, 'F', NULL, '20624', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:05:41', '2023-03-23 15:05:41'),
(317, 257, 6, 'Name 5', 120120, 'Nine', 'Humanities', 'A', '2', 2023, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20616', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '618', 'Geography', 0, 0, 0, 0, 0.00, 'F', NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL, NULL, '20623', 'Civics & Citizenship', 'Civ', 0, 0, 0, 0, 0.00, 'F', NULL, '20624', 'Agriculture', 'Agr', 0, 0, 0, 0, 0.00, 'Abs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:05:41', '2023-03-23 15:05:41'),
(318, 227, 1, 'Fatema', 120120, 'Nine', 'Commerce', 'A', '2', 2023, '911', 'Bangla 1st Paper', 32, 12, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 32, 12, 0, 88, 2.00, 'C', 88, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20916', 'Islam & Moral Education', 'Islam', 43, 21, 0, 64, 3.50, 'A-', 64, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Entrepreneurship', 'Ent', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Agriculture', 'Agr', 0, 0, 0, 0, NULL, NULL, 0, '0', '1', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', 8, NULL, NULL, 152, 5.50, 0.00, 0.00, 'F', 2, 0.00, NULL, 0.00, 'F', 'Failed', '2023-03-23 18:44:20', '2023-03-23 18:44:20'),
(319, 228, 2, 'Sumon', 120120, 'Nine', 'Commerce', 'A', '2', 2023, '911', 'Bangla 1st Paper', 0, 0, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 0, 0, 0, 0, 0.00, 'F', 88, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20916', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', 64, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Entrepreneurship', 'Ent', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Agriculture', 'Agr', 0, 0, 0, 0, NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 10, NULL, NULL, 0, 0.00, 0.00, 0.00, 'F', 2, 1.78, NULL, 0.89, 'F', 'Failed', '2023-03-23 18:44:20', '2023-03-23 18:44:20'),
(320, 229, 3, 'Reyad', 120120, 'Nine', 'Commerce', 'A', '2', 2023, '911', 'Bangla 1st Paper', 0, 0, 0, 0, NULL, NULL, 0, '912', 'Bangla 2nd Paper', 0, 0, 0, 0, 0.00, 'F', 88, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, '20916', 'Islam & Moral Education', 'Islam', 0, 0, 0, 0, 0.00, 'F', 64, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Entrepreneurship', 'Ent', 0, 0, 0, 0, NULL, NULL, 0, NULL, 'Agriculture', 'Agr', 0, 0, 0, 0, NULL, NULL, 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 10, NULL, NULL, 0, 0.00, 0.00, 0.00, 'F', 2, 2.94, NULL, 1.47, 'D', 'Failed', '2023-03-23 18:44:20', '2023-03-23 18:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_15_060925_create_maintains_table', 1),
(6, '2022_06_15_103041_create_admins_table', 1),
(8, '2022_07_03_200451_create_teachers_table', 2),
(9, '2022_07_04_140422_create_subjects_table', 2),
(10, '2022_07_05_070036_create_students_table', 2),
(11, '2022_07_09_163058_create_exams_table', 2),
(12, '2022_07_14_155445_create_admits_table', 2),
(13, '2022_07_25_072609_create_colors_table', 2),
(14, '2022_07_25_152343_create_routines_table', 2),
(15, '2022_10_01_065608_create_attens_table', 2),
(16, '2022_10_02_090144_create_paymentinfos_table', 2),
(17, '2022_10_02_120149_create_invoices_table', 2),
(18, '2022_10_07_073216_create_examinfos_table', 2),
(19, '2022_10_07_074659_create_markinfos_table', 2),
(20, '2022_10_09_104406_create_shifts_table', 2),
(21, '2022_10_09_183613_create_marks_table', 2),
(22, '2022_10_23_092601_create_subjectauths_table', 2),
(23, '2022_10_25_194752_create_exstudents_table', 2),
(24, '2022_10_29_160700_create_spends_table', 2),
(25, '2022_11_04_071016_create_sms_table', 2),
(26, '2022_11_24_215531_create_onlinepayments_table', 2),
(27, '2022_06_30_215308_create_schools_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `onlinepayments`
--

CREATE TABLE `onlinepayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `des1` varchar(255) DEFAULT NULL,
  `des2` varchar(255) DEFAULT NULL,
  `des3` varchar(255) DEFAULT NULL,
  `amount1` int(11) NOT NULL DEFAULT 0,
  `amount2` int(11) NOT NULL DEFAULT 0,
  `amount3` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subscribe` int(11) DEFAULT NULL,
  `payment_duration` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_time` timestamp NULL DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_year` varchar(255) DEFAULT NULL,
  `payment_month` varchar(255) DEFAULT NULL,
  `payment_day` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `onlinepayments`
--

INSERT INTO `onlinepayments` (`id`, `eiin`, `des1`, `des2`, `des3`, `amount1`, `amount2`, `amount3`, `payment`, `status`, `type`, `subscribe`, `payment_duration`, `created_date`, `expired_date`, `payment_type`, `payment_time`, `payment_date`, `payment_year`, `payment_month`, `payment_day`, `others`, `created_at`, `updated_at`) VALUES
(15, 120120, 'Website & Software Setup', NULL, NULL, 5000, 0, 0, 5000, '1', NULL, 3, 1, '2022-12-26', '2022-12-29', 'Admin', '2022-12-31 14:26:26', '2022-12-31', '2022', '12', '31', NULL, '2022-12-31 14:25:58', '2022-12-31 14:25:58'),
(16, 120120, 'Website & Software Setup', NULL, NULL, 5000, 0, 0, 5000, '1', NULL, 3, 1, '2022-12-29', '2023-01-01', 'Admin', '2023-01-01 00:19:26', '2022-12-31', '2022', '12', '31', NULL, '2022-12-31 14:26:14', '2022-12-31 14:26:14'),
(17, 120120, 'Website & Software Setup', NULL, NULL, 5000, 0, 0, 5000, '1', NULL, 3, 1, '2023-01-04', '2023-04-04', 'Admin', '2023-01-09 02:34:20', '2023-01-08', '2023', '1', '08', NULL, '2023-01-05 17:07:21', '2023-01-05 17:07:21'),
(18, 120154, 'Software Renew', NULL, NULL, 3500, 0, 0, 3500, NULL, NULL, 12, 5, '2023-01-03', '2024-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 17:07:21', '2023-01-05 17:07:21'),
(20, 999000, 'Website & Software Renew', NULL, NULL, 8000, 0, 0, 8000, '1', NULL, 6, 1, '2023-01-05', '2023-07-05', 'Admin', '2023-01-07 03:51:42', '2023-01-06', '2023', '1', '06', NULL, '2023-01-07 03:49:14', '2023-01-07 03:49:14'),
(21, 120144, 'Website & Software Renew', NULL, NULL, 6000, 0, 0, 6000, NULL, NULL, 6, 2, '2023-01-11', '2023-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 16:02:57', '2023-01-11 16:02:57'),
(22, 999001, 'Website & Software Setup', NULL, NULL, 6000, 0, 0, 6000, NULL, NULL, 12, 1, '2023-02-13', '2024-02-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 21:27:43', '2023-02-13 21:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfos`
--

CREATE TABLE `paymentinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `pre_date` date DEFAULT NULL,
  `pre_month` int(11) DEFAULT NULL,
  `pre_year` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `des1` varchar(255) DEFAULT NULL,
  `amount1` int(11) DEFAULT NULL,
  `des2` varchar(255) DEFAULT NULL,
  `amount2` int(11) DEFAULT NULL,
  `des3` varchar(255) DEFAULT NULL,
  `amount3` int(11) DEFAULT NULL,
  `des4` varchar(255) DEFAULT NULL,
  `amount4` int(11) DEFAULT NULL,
  `des5` varchar(255) DEFAULT NULL,
  `amount5` int(11) DEFAULT NULL,
  `des6` varchar(255) DEFAULT NULL,
  `amount6` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentinfos`
--

INSERT INTO `paymentinfos` (`id`, `eiin`, `class`, `babu`, `section`, `pre_date`, `pre_month`, `pre_year`, `date`, `month`, `year`, `des1`, `amount1`, `des2`, `amount2`, `des3`, `amount3`, `des4`, `amount4`, `des5`, `amount5`, `des6`, `amount6`, `created_at`, `updated_at`) VALUES
(1, 120120, 'Six', 'NA', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:41:39', '2022-12-02 03:41:39'),
(2, 120120, 'Seven', 'NA', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:42:08', '2022-12-02 03:42:08'),
(3, 120120, 'Eight', 'NA', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:42:32', '2022-12-02 03:42:32'),
(4, 120120, 'Nine', 'Science', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:42:52', '2022-12-02 03:42:52'),
(5, 120120, 'Nine', 'Humanities', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:43:09', '2022-12-02 03:43:09'),
(6, 120120, 'Nine', 'Commerce', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:43:39', '2022-12-02 03:43:39'),
(7, 120120, 'Ten', 'Science', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:43:57', '2022-12-02 03:43:57'),
(8, 120120, 'Ten', 'Humanities', 'A', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:44:10', '2022-12-02 03:44:10'),
(11, 120120, 'Six', 'NA', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:45:48', '2022-12-02 03:45:48'),
(12, 120120, 'Seven', 'NA', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:46:01', '2022-12-02 03:46:01'),
(13, 120120, 'Eight', 'NA', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:46:13', '2022-12-02 03:47:10'),
(14, 120120, 'Nine', 'Science', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:46:27', '2022-12-02 03:46:27'),
(15, 120120, 'Nine', 'Humanities', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:46:38', '2022-12-02 03:46:38'),
(16, 120120, 'Nine', 'Commerce', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-02 03:47:02', '2022-12-02 03:47:02'),
(17, 120120, 'Ten', 'Science', 'B', NULL, NULL, NULL, '2022-12-01', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 02:20:20', '2022-12-06 02:20:20'),
(18, 120120, 'Ten', 'Humanities', 'B', NULL, NULL, NULL, '2022-12-02', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 02:20:32', '2022-12-06 02:20:32'),
(19, 120120, 'Ten', 'Commerce', 'B', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 250, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 02:20:44', '2022-12-06 02:20:44'),
(20, 130130, 'Six', 'NA', 'A', NULL, NULL, NULL, '2022-12-01', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:54:21', '2022-12-06 12:54:21'),
(21, 130130, 'Seven', 'NA', 'A', NULL, NULL, NULL, '2022-12-01', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:54:39', '2022-12-06 12:54:39'),
(22, 130130, 'Eight', 'NA', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:54:53', '2022-12-06 12:54:53'),
(23, 130130, 'Nine', 'Science', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:55:08', '2022-12-06 12:55:08'),
(24, 130130, 'Nine', 'Humanities', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:55:20', '2022-12-06 12:55:20'),
(25, 130130, 'Nine', 'Commerce', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:55:34', '2022-12-06 12:55:34'),
(26, 130130, 'Ten', 'Science', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:55:49', '2022-12-06 12:55:49'),
(27, 130130, 'Ten', 'Humanities', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:56:02', '2022-12-06 12:56:02'),
(28, 130130, 'Ten', 'Commerce', 'A', NULL, NULL, NULL, '2022-12-06', 12, 2022, 'Payment dec 2022', 300, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-06 12:56:18', '2022-12-06 12:56:18'),
(38, 120161, 'Six', 'NA', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:37:52', '2022-12-13 02:37:52'),
(39, 120161, 'Seven', 'NA', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:38:04', '2022-12-13 02:38:04'),
(40, 120161, 'Eight', 'NA', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 60, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:38:14', '2022-12-13 02:38:14'),
(41, 120161, 'Nine', 'Science', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:38:24', '2022-12-13 02:38:24'),
(42, 120161, 'Nine', 'Humanities', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:38:37', '2022-12-13 02:38:37'),
(43, 120161, 'Nine', 'Commerce', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:38:49', '2022-12-13 02:38:49'),
(44, 120161, 'Ten', 'Science', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:39:05', '2022-12-13 02:39:05'),
(45, 120161, 'Ten', 'Humanities', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:39:16', '2022-12-13 02:39:16'),
(46, 120161, 'Ten', 'Commerce', 'A', '2022-12-13', 12, 2022, '2023-01-01', 1, 2023, 'Payment dec 2022', 100, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2022-12-13 02:39:29', '2022-12-13 02:39:29'),
(47, 120120, 'Ten', 'Commerce', 'A', NULL, NULL, NULL, '2023-01-03', 1, 2023, 'Payment January 2022', 200, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, '2023-01-03 12:34:57', '2023-01-03 12:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `babu` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `sub1` int(11) DEFAULT NULL,
  `sub2` int(11) DEFAULT NULL,
  `sub3` int(11) DEFAULT NULL,
  `sub4` int(11) DEFAULT NULL,
  `sub5` int(11) DEFAULT NULL,
  `sub6` int(11) DEFAULT NULL,
  `sub7` int(11) DEFAULT NULL,
  `sub8` int(11) DEFAULT NULL,
  `sub9` int(11) DEFAULT NULL,
  `sub10` int(11) DEFAULT NULL,
  `sub11` int(11) DEFAULT NULL,
  `sub12` int(11) DEFAULT NULL,
  `sub13` int(11) DEFAULT NULL,
  `sub14` int(11) DEFAULT NULL,
  `sub15` int(11) DEFAULT NULL,
  `sub16` int(11) DEFAULT NULL,
  `date1` varchar(255) DEFAULT NULL,
  `date2` varchar(255) DEFAULT NULL,
  `date3` varchar(255) DEFAULT NULL,
  `date4` varchar(255) DEFAULT NULL,
  `date5` varchar(255) DEFAULT NULL,
  `date6` varchar(255) DEFAULT NULL,
  `date7` varchar(255) DEFAULT NULL,
  `date8` varchar(255) DEFAULT NULL,
  `date9` varchar(255) DEFAULT NULL,
  `date10` varchar(255) DEFAULT NULL,
  `date11` varchar(255) DEFAULT NULL,
  `date12` varchar(255) DEFAULT NULL,
  `date13` varchar(255) DEFAULT NULL,
  `date14` varchar(255) DEFAULT NULL,
  `date15` varchar(255) DEFAULT NULL,
  `date16` varchar(255) DEFAULT NULL,
  `tea1` int(11) DEFAULT NULL,
  `tea2` int(11) DEFAULT NULL,
  `tea3` int(11) DEFAULT NULL,
  `tea4` int(11) DEFAULT NULL,
  `tea5` int(11) DEFAULT NULL,
  `tea6` int(11) DEFAULT NULL,
  `tea7` int(11) DEFAULT NULL,
  `tea8` int(11) DEFAULT NULL,
  `tea9` int(11) DEFAULT NULL,
  `tea10` int(11) DEFAULT NULL,
  `tea11` int(11) DEFAULT NULL,
  `tea12` int(11) DEFAULT NULL,
  `tea13` int(11) DEFAULT NULL,
  `tea14` int(11) DEFAULT NULL,
  `tea15` int(11) DEFAULT NULL,
  `tea16` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `eiin`, `class`, `babu`, `section`, `day`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`, `sub10`, `sub11`, `sub12`, `sub13`, `sub14`, `sub15`, `sub16`, `date1`, `date2`, `date3`, `date4`, `date5`, `date6`, `date7`, `date8`, `date9`, `date10`, `date11`, `date12`, `date13`, `date14`, `date15`, `date16`, `tea1`, `tea2`, `tea3`, `tea4`, `tea5`, `tea6`, `tea7`, `tea8`, `tea9`, `tea10`, `tea11`, `tea12`, `tea13`, `tea14`, `tea15`, `tea16`, `created_at`, `updated_at`) VALUES
(5, 120120, 'Eight', 'NA', 'A', 'Saturday', 102, 107, NULL, 108, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10.00AM-11.00AM', '11.00AM-11.45AM', '11.45AM-12.30PM', '12.30PM-1.00PM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-02 22:18:11', '2023-03-15 01:28:27'),
(8, 120120, 'Six', 'NA', 'B', 'Sunday', 102, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.00 am - 9.00 am', '9.00 am - 10.00 am', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 01:12:23', '2023-01-15 01:12:23'),
(9, 120120, 'Six', 'NA', 'B', 'Monday', 103, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8.00 am - 9.00 am', '9.00 am - 10.00 am', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 01:13:26', '2023-01-15 01:13:26'),
(10, 999001, 'Six', 'NA', 'A', 'Saturday', 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9:00-10:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:45:28', '2023-02-13 22:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `school_phone` varchar(255) NOT NULL,
  `teacher_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `school_pass` varchar(255) DEFAULT NULL,
  `admin_pass` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `stu_insert_status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `admin_status` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `forget_code` varchar(255) DEFAULT NULL,
  `forget_time` varchar(255) DEFAULT NULL,
  `mnsize` int(11) DEFAULT NULL,
  `ansize` int(11) DEFAULT NULL,
  `sasize` int(11) DEFAULT NULL,
  `shsize` int(11) DEFAULT NULL,
  `image_access` varchar(255) DEFAULT NULL,
  `sms_access` varchar(255) DEFAULT NULL,
  `atten_access` varchar(255) DEFAULT NULL,
  `fin_access` varchar(255) DEFAULT NULL,
  `other_access` varchar(255) DEFAULT NULL,
  `aid` varchar(255) DEFAULT NULL,
  `aname` varchar(255) DEFAULT NULL,
  `aphone` varchar(255) DEFAULT NULL,
  `aemail` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `section_des` varchar(255) DEFAULT NULL,
  `address_details` text DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `admin_section` varchar(255) DEFAULT NULL,
  `test1` int(11) DEFAULT NULL,
  `test2` int(11) DEFAULT NULL,
  `test3` int(11) DEFAULT NULL,
  `test4` int(11) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `inv_part` varchar(255) DEFAULT NULL,
  `sms_access2` varchar(255) DEFAULT NULL,
  `inv_access_day` varchar(255) DEFAULT NULL,
  `spend_access` varchar(255) DEFAULT NULL,
  `atten_group_access` varchar(255) DEFAULT NULL,
  `atten_section_access` varchar(255) DEFAULT NULL,
  `sms_text1` text DEFAULT NULL,
  `sms_text2` text DEFAULT NULL,
  `sms_text3` text DEFAULT NULL,
  `sms_text4` text DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `subscribe` int(11) DEFAULT NULL,
  `payment_duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `address`, `eiin`, `school_phone`, `teacher_phone`, `email`, `school_pass`, `admin_pass`, `status`, `stu_insert_status`, `image`, `admin_status`, `year`, `exam`, `payment`, `payment_details`, `forget_code`, `forget_time`, `mnsize`, `ansize`, `sasize`, `shsize`, `image_access`, `sms_access`, `atten_access`, `fin_access`, `other_access`, `aid`, `aname`, `aphone`, `aemail`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `text8`, `section_des`, `address_details`, `shift`, `admin_section`, `test1`, `test2`, `test3`, `test4`, `bank_account`, `bank_name`, `inv_part`, `sms_access2`, `inv_access_day`, `spend_access`, `atten_group_access`, `atten_section_access`, `sms_text1`, `sms_text2`, `sms_text3`, `sms_text4`, `created_date`, `expired_date`, `subscribe`, `payment_duration`, `created_at`, `updated_at`) VALUES
(5, 'Demo High School', 'Birol, Dinajpur', 120120, '01309120120', '01750360044,', 'ancova2020@gmail.com', '120120', 'rayhanschool', '1', NULL, '2145346011.jpg', '1', 2020, NULL, 5000, 'Website & Software Setup', NULL, NULL, 23, 22, 18, 19, 'Yes', 'Yes', 'Yes', 'Yes', NULL, 'ancova7', 'Md Rayhan babu', '01750360044', 'rayhanbabu458@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 'Birol, Dinajpur-5210 <br>EST:1998', NULL, 'A', 23, 17, 18, 18, '58585', 'Bank Asia', 'three', 'Yes', '1', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL, NULL, '2023-01-04', '2023-04-04', 3, 1, '2022-12-02 02:14:04', '2023-01-09 18:10:27'),
(8, 'Al-Haz Kasimuddin Ahmed High School', 'Biral , Dinajpur', 120154, '01725949626', '01750360044', 'rayhanbabu4521218@gmail.com', '9105937', 'rayhanschool', '1', NULL, '1358024934.jpg', '1', 2022, NULL, 3500, 'Software Renew', NULL, NULL, 23, 22, 18, 19, 'No', 'No', 'No', 'No', NULL, 'ancova7', 'MD Rayhan Babu', '01750360044', 'rayhanbabu458@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nai', 'P.O:Bazrapur, Upazila:Biral, Dist:Dinajpur<br>EST:1988', NULL, 'A', 24, 20, 17, 18, '2323', 'Nai', 'two', 'No', '2', 'No', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-03', '2024-01-03', 12, 5, '2022-12-21 15:55:19', '2023-01-11 17:31:56'),
(9, 'nExclusive Tuition  Point', 'Dhamrai, Dhaka', 999000, '01741807787', '01741807787', 'kamrulislam7787@gmail.com', '3012771', 'rayhanschool', '1', NULL, '1210765496.jpg', '1', 2023, NULL, 8000, 'Website & Software Renew', NULL, NULL, 23, 22, 18, 19, 'No', 'No', 'No', 'No', NULL, 'ancova7', 'Md Rayhan babu', '01750360044', 'rayhanbabu458@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A,B', NULL, NULL, 'A', 23, 22, 17, 18, '12345', 'Bank Asia', 'three', 'Yes', '3', 'No', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05', '2023-07-05', 6, 1, '2023-01-07 03:07:54', '2023-01-21 15:08:16'),
(10, 'Dharmopur Union Council High School', 'Birol , Dinajpur', 120144, '01718648332', '01718648332', 'schanarani@gmail.com', '5886685', 'rayhanschool', '1', NULL, '1966899857.jpg', '1', 2023, NULL, 6000, 'Website & Software Renew', NULL, NULL, 23, 22, 18, 19, 'No', 'No', 'No', 'No', NULL, 'ancova7', 'Md Rayhan babu', '01750360044', 'rayhanbabu458@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Section A', 'P.O:Bazrapur, Upazila:Biral, Dist:Dinajpur<br>EST:1966', NULL, 'A', 24, 20, 17, 18, '12345', 'Bank Asia', 'three', 'No', '2', 'No', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11', '2023-07-11', 6, 2, '2023-01-11 16:02:57', '2023-01-11 16:07:47'),
(11, 'Nurul Hasna Cadet School', 'Pirgonj, Thakurgoan', 999001, '01718910890', '01722091690', 'anwarul.idb@gmail.com', '4559251', 'rayhanschool', '1', NULL, '504552229.jpg', '1', 2023, NULL, 6000, 'Website & Software Setup', NULL, NULL, 23, 22, 18, 19, 'Yes', 'No', 'No', 'No', NULL, 'ancova7', 'Md Rayhan babu', '01750360044', 'rayhanbabu458@gmail.com', '1', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, 'P.O:Vadua, Upazila:Pirgonj, Dist:Thakurgaon<br>EST:2013', NULL, 'A', 23, 22, 17, 18, '12325', 'Bank Asia', 'two', 'No', '2', 'No', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13', '2023-04-13', 12, 2, '2023-02-13 21:27:43', '2023-03-24 14:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `eiin`, `section`, `shift`, `created_at`, `updated_at`) VALUES
(1, 120120, 'B', 'Day', '2022-12-02 02:25:06', '2023-03-09 02:04:09'),
(3, 130130, 'A', 'Evening', '2022-12-06 12:50:46', '2022-12-06 12:50:46'),
(4, 130130, 'B', 'Morning', '2022-12-06 12:50:52', '2022-12-06 12:50:52'),
(5, 120161, 'A', 'Morning', '2022-12-12 13:49:08', '2022-12-12 13:49:08'),
(6, 120161, 'B', 'Evening', '2022-12-12 13:49:15', '2022-12-12 13:49:15'),
(7, 120120, 'A', 'Morning', '2023-01-03 13:08:17', '2023-03-09 02:04:19'),
(8, 999001, 'A', 'Morning', '2023-02-13 22:03:13', '2023-02-13 22:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `sms_type` varchar(255) NOT NULL,
  `sms_count` int(11) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `babu` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `others1` varchar(255) DEFAULT NULL,
  `others2` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `eiin`, `sms_type`, `sms_count`, `class`, `babu`, `section`, `others1`, `others2`, `subject`, `text`, `created_at`, `updated_at`) VALUES
(2, 130130, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'gd std', '2022-12-06 13:08:57', '2022-12-06 13:08:57'),
(3, 130130, 'students', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'atik bad boy', '2022-12-06 13:10:01', '2022-12-06 13:10:01'),
(4, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hi', '2022-12-12 15:35:27', '2022-12-12 15:35:27'),
(5, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hi', '2022-12-12 15:36:50', '2022-12-12 15:36:50'),
(6, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hiii', '2022-12-12 15:40:39', '2022-12-12 15:40:39'),
(7, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'ds', '2022-12-12 15:40:58', '2022-12-12 15:40:58'),
(8, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hi', '2022-12-12 15:44:16', '2022-12-12 15:44:16'),
(9, 120161, 'students', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2022-12-12 15:45:54', '2022-12-12 15:45:54'),
(10, 120161, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'dgfg', '2022-12-13 03:01:52', '2022-12-13 03:01:52'),
(11, 120154, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2022-12-23 00:04:10', '2022-12-23 00:04:10'),
(12, 120154, 'students', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'testing sms', '2022-12-23 00:04:33', '2022-12-23 00:04:33'),
(13, 120154, 'students', 0, NULL, NULL, NULL, NULL, NULL, NULL, 'testing sms', '2022-12-23 00:07:10', '2022-12-23 00:07:10'),
(14, 120154, 'students', 2, NULL, NULL, NULL, NULL, NULL, NULL, 'testing sms', '2022-12-23 00:07:26', '2022-12-23 00:07:26'),
(15, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2023-01-02 22:05:29', '2023-01-02 22:05:29'),
(16, 999000, 'students', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2023-01-07 03:30:23', '2023-01-07 03:30:23'),
(17, 999000, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'ancova testing', '2023-01-07 03:31:12', '2023-01-07 03:31:12'),
(18, 999000, 'teachers', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'hi', '2023-01-07 19:13:11', '2023-01-07 19:13:11'),
(19, 999000, 'teachers', 6, NULL, NULL, NULL, NULL, NULL, NULL, 'Good Evening,\r\nWe are happy to inform you that today our Educational Institution website is open for everyone. We invite you to visit our website.\r\nlink: https://netpbd.com/', '2023-01-08 02:26:47', '2023-01-08 02:26:47'),
(20, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2023-01-09 12:57:46', '2023-01-09 12:57:46'),
(21, 120120, 'teachers', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'teacher panel', '2023-01-09 12:58:26', '2023-01-09 12:58:26'),
(22, 120120, 'students', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Student Panel', '2023-01-09 13:03:37', '2023-01-09 13:03:37'),
(23, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2023-02-16 12:19:41', '2023-02-16 12:19:41'),
(24, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'manik vai', '2023-02-16 13:37:02', '2023-02-16 13:37:02'),
(25, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'testing', '2023-02-24 02:04:44', '2023-02-24 02:04:44'),
(26, 120120, 'single', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'sohel', '2023-03-09 03:46:06', '2023-03-09 03:46:06'),
(27, 120120, 'result', 8, 'Eight', 'NA', 'A', NULL, NULL, NULL, 'x.xx GPA  of Half Yearly Examination-2023', '2023-03-13 03:56:38', '2023-03-13 03:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `spends`
--

CREATE TABLE `spends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spends`
--

INSERT INTO `spends` (`id`, `eiin`, `date`, `description`, `day`, `month`, `year`, `qty`, `unit`, `price`, `total`, `created_at`, `updated_at`) VALUES
(2, 120161, '2022-12-14', 'rer', 14, 12, 2022, '1', 'Unit', 2424, 2424, '2022-12-13 02:56:19', '2022-12-13 02:56:19'),
(3, 120120, '2023-01-11', 'rer', 11, 1, 2023, '1', 'Unit', 333, 333, '2023-01-03 13:11:46', '2023-01-03 13:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `codema` varchar(255) DEFAULT NULL,
  `stu_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `babu` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `moral` varchar(255) DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `addi` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `father` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pre_class` varchar(255) DEFAULT NULL,
  `next_class` varchar(255) DEFAULT NULL,
  `pre_babu` varchar(255) DEFAULT NULL,
  `next_babu` varchar(255) DEFAULT NULL,
  `pre_year` varchar(255) DEFAULT NULL,
  `next_year` varchar(255) DEFAULT NULL,
  `other1` varchar(255) DEFAULT NULL,
  `other2` varchar(255) DEFAULT NULL,
  `other3` varchar(255) DEFAULT NULL,
  `other4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `image`, `codema`, `stu_id`, `roll`, `name`, `eiin`, `class`, `section`, `babu`, `year`, `exam`, `moral`, `main`, `addi`, `birth_date`, `father`, `mother`, `address`, `phone`, `pre_class`, `next_class`, `pre_babu`, `next_babu`, `pre_year`, `next_year`, `other1`, `other2`, `other3`, `other4`, `created_at`, `updated_at`) VALUES
(51, NULL, NULL, 5000050, 1, 'Md Rayhan Babu', 120154, 'Six', 'B', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, '1750360044', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 00:05:33', '2022-12-23 00:05:33'),
(52, NULL, NULL, 5000051, 2, 'abcd', 120154, 'Six', 'B', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, '1761681401', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 00:06:14', '2022-12-23 00:06:14'),
(118, NULL, NULL, 5000117, 1, 'Md. Rifad Hossain', 999000, 'Ten', 'A', 'Science', NULL, NULL, 'Islam', 'Bio', 'Hig', '2008-01-05', 'Md. Alomgir Hossain', 'Mukta Begum', 'Sutipara, Kalampur, Dhamrai, Dhaka', '01921054729', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 18:24:25', '2023-01-09 18:24:25'),
(119, NULL, NULL, 5000118, 2, 'Nusrat Islam Nuha', 999000, 'Ten', 'A', 'Science', NULL, NULL, 'Islam', 'Bio', 'Hig', '2007-12-10', 'Nurul Islam Vhuiya', 'Runa Islam', 'Model Town, Dhamrai', '01730332250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 18:27:02', '2023-01-09 18:27:02'),
(120, NULL, NULL, 5000119, 1, 'Rahib Al Rizah', 999000, 'Ten', 'A', 'Humanities', NULL, NULL, 'Islam', 'Eco', 'Agr', '2007-11-10', 'Nurul Islam Vhuiya', 'Runa Islam', 'Model Town, Dhamrai', '01730332250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 18:29:14', '2023-01-09 18:29:14'),
(167, 'SixNA1-287137915.jpg', NULL, 5000166, 1, 'Md Rayhan babu', 120120, 'Six', 'B', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 15:49:47', '2023-01-14 15:49:47'),
(168, NULL, NULL, 5000167, 2, 'Humayan', 120120, 'Six', 'B', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 15:50:00', '2023-01-14 15:50:00'),
(169, NULL, NULL, 5000168, 1, 'abcdefgh', 120120, 'Nine', 'B', 'Science', NULL, NULL, 'Islam', 'Hig', 'Bio', NULL, NULL, NULL, NULL, '01700000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-15 02:47:21', '2023-01-15 02:47:21'),
(174, NULL, NULL, 5000169, 1, 'Priti', 999001, 'Eight', 'A', 'NA', NULL, NULL, 'Hindu', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:06:08', '2023-02-13 22:06:08'),
(175, NULL, NULL, 5000174, 2, 'Brithi', 999001, 'Eight', 'A', 'NA', NULL, NULL, 'Hindu', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:06:44', '2023-02-13 22:06:44'),
(176, NULL, NULL, 5000175, 3, 'nova', 999001, 'Eight', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:20:32', '2023-02-13 22:20:32'),
(177, NULL, NULL, 5000176, 4, 'sumon', 999001, 'Eight', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:21:33', '2023-02-13 22:21:33'),
(178, 'SixNA1-1157479958.jpg', NULL, 5000177, 1, '1', 999001, 'Six', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', '2023-02-14', 's', 's', 's', '01722091690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:56:28', '2023-02-13 22:56:28'),
(210, NULL, NULL, 5000209, 1, 'Ontorra Saha', 120120, 'Ten', 'A', 'Commerce', NULL, NULL, 'Hindu', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:30:51', '2023-03-16 21:30:51'),
(211, NULL, NULL, 5000210, 2, 'Bithi', 120120, 'Ten', 'A', 'Commerce', NULL, NULL, 'Hindu', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:31:36', '2023-03-16 21:31:36'),
(212, NULL, NULL, 5000211, 4, 'Maruf', 120120, 'Ten', 'A', 'Commerce', NULL, NULL, 'Islam', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:32:17', '2023-03-16 21:34:20'),
(220, NULL, NULL, 5000219, 1, 'Shree Moti Arpona', 120120, 'Ten', 'A', 'Science', NULL, NULL, 'Hindu', 'Bio', 'Hig', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:27:32', '2023-03-18 17:39:51'),
(221, NULL, NULL, 5000220, 2, 'Puja Rani', 120120, 'Ten', 'A', 'Science', NULL, NULL, 'Hindu', 'Bio', 'Hig', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:28:31', '2023-03-18 17:28:31'),
(222, NULL, NULL, 5000221, 3, 'Sanjida Akter', 120120, 'Ten', 'A', 'Science', NULL, NULL, 'Islam', 'Bio', 'Hig', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 17:29:41', '2023-03-18 17:29:41'),
(227, NULL, NULL, 5000226, 1, 'Fatema', 120120, 'Nine', 'A', 'Commerce', NULL, NULL, 'Islam', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:20:26', '2023-03-19 20:20:26'),
(228, NULL, NULL, 5000227, 2, 'Sumon', 120120, 'Nine', 'A', 'Commerce', NULL, NULL, 'Islam', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:20:51', '2023-03-19 20:20:51'),
(229, NULL, NULL, 5000228, 3, 'Reyad', 120120, 'Nine', 'A', 'Commerce', NULL, NULL, 'Islam', 'Ent', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:21:19', '2023-03-19 20:21:19'),
(234, NULL, NULL, 5000229, 1, 'Shree Moti Arpona', 120120, 'Six', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:29:41', '2023-03-22 02:29:41'),
(235, NULL, NULL, 5000234, 2, 'Md Imran Hasan', 120120, 'Six', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:30:02', '2023-03-22 02:30:02'),
(236, NULL, NULL, 5000235, 3, 'Histesh Roy', 120120, 'Six', 'A', 'NA', NULL, NULL, 'Hindu', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-22 02:30:19', '2023-03-22 02:30:19'),
(243, NULL, '120120NinHuA7186', 5000205, 1, 'Md Rifat Hossain', 120120, 'Ten', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:37:15', '2023-03-23 14:37:15'),
(244, NULL, '120120NinHuA7186', 5000206, 2, 'Sakhawat Hossain', 120120, 'Ten', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:37:15', '2023-03-23 14:37:15'),
(245, NULL, '120120NinHuA7186', 5000207, 3, 'Imran Ali', 120120, 'Ten', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:37:15', '2023-03-23 14:37:15'),
(246, NULL, '120120NinHuA7186', 5000208, 4, 'Durjoy Chandra Roy', 120120, 'Ten', 'A', 'Humanities', NULL, NULL, 'Hindu', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:37:15', '2023-03-23 14:37:15'),
(247, NULL, '120120NinHuA7186', 5000236, 6, 'Golap Mostofa', 120120, 'Ten', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 14:37:15', '2023-03-23 14:37:15'),
(253, 'imag', NULL, 5000205, 1, 'Name 1', 120120, 'Nine', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, 'father', 'mother', 'address', '175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:03:31', '2023-03-23 15:03:31'),
(254, NULL, NULL, 5000206, 2, 'Name 2', 120120, 'Nine', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:03:31', '2023-03-23 15:03:31'),
(255, NULL, NULL, 5000207, 3, 'Name 3', 120120, 'Nine', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:03:31', '2023-03-23 15:03:31'),
(256, NULL, NULL, 5000208, 4, 'Name 4', 120120, 'Nine', 'A', 'Humanities', NULL, NULL, 'Hindu', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:03:31', '2023-03-23 15:03:31'),
(257, NULL, NULL, 5000236, 6, 'Name 5', 120120, 'Nine', 'A', 'Humanities', NULL, NULL, 'Islam', 'Civ', 'Agr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 15:03:31', '2023-03-23 15:03:31'),
(258, 'imag', NULL, 5000218, 1, 'Name 1', 120120, 'Seven', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, 'father', 'mother', 'address', '175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 18:51:36', '2023-03-23 18:51:36'),
(259, NULL, NULL, 5000218, 2, 'Name 2', 120120, 'Seven', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 18:51:36', '2023-03-23 18:51:36'),
(260, NULL, NULL, 5000218, 3, 'Name 3', 120120, 'Seven', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 18:51:36', '2023-03-23 18:51:36'),
(261, NULL, NULL, 5000218, 4, 'Name 4', 120120, 'Seven', 'A', 'NA', NULL, NULL, 'Hindu', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 18:51:36', '2023-03-23 18:51:36'),
(262, NULL, NULL, 5000218, 6, 'Name 5', 120120, 'Seven', 'A', 'NA', NULL, NULL, 'Islam', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-23 18:51:36', '2023-03-23 18:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `subjectauths`
--

CREATE TABLE `subjectauths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eiin` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `tecode` varchar(255) NOT NULL,
  `lavel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjectauths`
--

INSERT INTO `subjectauths` (`id`, `eiin`, `teacher_id`, `section`, `subcode`, `tecode`, `lavel`, `created_at`, `updated_at`) VALUES
(2, 130130, '2', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(3, 130130, '2', 'A', 'SixNAsub16', 'SixNAsub16A', 'Islam', NULL, NULL),
(4, 130130, '3', 'A', 'TenScsub18', 'TenScsub18A', 'NA', NULL, NULL),
(5, 130130, '2', 'A', 'TenScsub18', 'TenScsub18A', 'NA', NULL, NULL),
(6, 120161, '4', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(7, 120161, '4', 'A', 'NinScsub11', 'NinScsub11A', 'NA', NULL, NULL),
(8, 120161, '4', 'A', 'TenHusub11', 'TenHusub11A', 'NA', NULL, NULL),
(9, 120161, '5', 'A', 'SixNAsub15', 'SixNAsub15A', 'NA', NULL, NULL),
(10, 120161, '5', 'A', 'NinScsub15', 'NinScsub15A', 'NA', NULL, NULL),
(11, 120161, '5', 'A', 'TenHusub15', 'TenHusub15A', 'NA', NULL, NULL),
(12, 120120, '6', 'B', 'SixNAsub11', 'SixNAsub11B', 'NA', NULL, NULL),
(13, 120120, '6', 'A', 'NinScsub11', 'NinScsub11A', 'NA', NULL, NULL),
(14, 120120, '6', 'B', 'SixNAsub16', 'SixNAsub16B', 'Islam', NULL, NULL),
(15, 120120, '6', 'A', 'SixNAsub17', 'SixNAsub17A', 'NA', NULL, NULL),
(16, 120120, '6', 'A', 'NinScsub19', 'NinScsub19A', 'NA', NULL, NULL),
(19, 120120, '6', 'A', 'NinHusub20', 'NinHusub20A', 'NA', NULL, NULL),
(20, 120120, '6', 'A', 'NinCosub17', 'NinCosub17A', 'NA', NULL, NULL),
(21, 999000, '8', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(22, 999000, '9', 'A', 'SixNAsub19', 'SixNAsub19A', 'NA', NULL, NULL),
(23, 999000, '9', 'A', 'SixNAsub17', 'SixNAsub17A', 'NA', NULL, NULL),
(24, 999000, '10', 'A', 'SixNAsub17', 'SixNAsub17A', 'NA', NULL, NULL),
(25, 999000, '11', 'A', 'SixNAsub15', 'SixNAsub15A', 'NA', NULL, NULL),
(26, 999000, '12', 'A', 'SixNAsub13', 'SixNAsub13A', 'NA', NULL, NULL),
(27, 999000, '13', 'A', 'SixNAsub15', 'SixNAsub15A', 'NA', NULL, NULL),
(28, 999000, '14', 'A', 'SixNAsub17', 'SixNAsub17A', 'Islam', NULL, NULL),
(29, 999000, '15', 'A', 'SixNAsub23', 'SixNAsub23A', 'NA', NULL, NULL),
(30, 999000, '16', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(31, 999000, '17', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(32, 999000, '18', 'A', 'SixNAsub13', 'SixNAsub13A', 'NA', NULL, NULL),
(33, 120120, '19', 'A', 'SixNAsub15', 'SixNAsub15A', 'NA', NULL, NULL),
(34, 120120, '19', 'A', 'SevNAsub15', 'SevNAsub15A', 'NA', NULL, NULL),
(35, 999001, '20', 'A', 'EigNAsub12', 'EigNAsub12A', 'NA', NULL, NULL),
(36, 999001, '21', 'A', 'EigNAsub11', 'EigNAsub11A', 'NA', NULL, NULL),
(37, 999001, '22', 'A', 'EigNAsub14', 'EigNAsub14A', 'NA', NULL, NULL),
(38, 999001, '22', 'A', 'NinScsub20', 'NinScsub20A', 'NA', NULL, NULL),
(39, 120120, '23', 'A', 'SixNAsub11', 'SixNAsub11A', 'NA', NULL, NULL),
(40, 120120, '23', 'A', 'SevNAsub11', 'SevNAsub11A', 'NA', NULL, NULL),
(41, 120120, '23', 'A', 'EigNAsub16', 'EigNAsub16A', 'Islam', NULL, NULL),
(42, 120120, '23', 'A', 'NinHusub23', 'NinHusub23A', 'Civ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subid` int(11) NOT NULL,
  `eiin` int(11) DEFAULT NULL,
  `subcode` varchar(255) DEFAULT NULL,
  `tecode` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `babu` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `subt` int(11) DEFAULT NULL,
  `tmark` int(11) DEFAULT NULL,
  `cstatus` varchar(255) DEFAULT NULL,
  `mstatus` varchar(255) DEFAULT NULL,
  `pstatus` varchar(255) DEFAULT NULL,
  `cmark` int(11) DEFAULT NULL,
  `mmark` int(11) DEFAULT NULL,
  `pmark` int(11) DEFAULT NULL,
  `cfail` int(11) DEFAULT NULL,
  `mfail` int(11) DEFAULT NULL,
  `pfail` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subid`, `eiin`, `subcode`, `tecode`, `class`, `babu`, `subject`, `subt`, `tmark`, `cstatus`, `mstatus`, `pstatus`, `cmark`, `mmark`, `pmark`, `cfail`, `mfail`, `pfail`, `created_at`, `updated_at`) VALUES
(34, 211, 120120, 'sub11', 'SevNAsub11', 'Seven', 'NA', 'Bangla', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2023-02-17 14:45:29'),
(35, 213, 120120, 'sub13', 'SevNAsub13', 'Seven', 'NA', 'English 1st Paper', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:14:33'),
(36, 215, 120120, 'sub15', 'SevNAsub15', 'Seven', 'NA', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:19'),
(37, 20216, 120120, 'sub16', 'SevNAsub16', 'Seven', 'NA', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-06 02:17:33'),
(38, 217, 120120, 'sub17', 'SevNAsub17', 'Seven', 'NA', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:29'),
(39, 218, 120120, 'sub18', 'SevNAsub18', 'Seven', 'NA', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:35'),
(40, 219, 120120, 'sub19', 'SevNAsub19', 'Seven', 'NA', 'I.C.T.', NULL, 50, 'number', 'number', 'hidden', 50, 25, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:40'),
(41, 220, 120120, 'sub20', 'SevNAsub20', 'Seven', 'NA', 'Agriculture', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:45'),
(42, 221, 120120, 'sub21', 'SevNAsub21', 'Seven', 'NA', 'Work & LOE', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:50'),
(43, 222, 120120, 'sub22', 'SevNAsub22', 'Seven', 'NA', 'Physical Education', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:41:54'),
(44, 223, 120120, 'sub23', 'SevNAsub23', 'Seven', 'NA', 'Arts & Crafts', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2022-12-02 06:20:33', '2022-12-04 06:42:08'),
(45, 311, 120120, 'sub11', 'EigNAsub11', 'Eight', 'NA', 'Bangla', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2022-12-04 06:42:19'),
(46, 312, 120120, 'sub12', 'EigNAsub12', 'Eight', 'NA', 'English', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 22:04:18'),
(47, 313, 120120, 'sub13', 'EigNAsub13', 'Eight', 'NA', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 21:57:47'),
(48, 20316, 120120, 'sub16', 'EigNAsub16', 'Eight', 'NA', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2022-12-06 02:17:43'),
(49, 314, 120120, 'sub14', 'EigNAsub14', 'Eight', 'NA', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 21:58:55'),
(50, 315, 120120, 'sub15', 'EigNAsub15', 'Eight', 'NA', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 22:00:10'),
(51, 317, 120120, 'sub17', 'EigNAsub17', 'Eight', 'NA', 'I.C.T.', NULL, 50, 'number', 'number', 'hidden', 50, 25, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 22:00:53'),
(52, 318, 120120, 'sub18', 'EigNAsub18', 'Eight', 'NA', 'Agriculture', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-07 22:02:25'),
(53, 319, 120120, 'sub19', 'EigNAsub19', 'Eight', 'NA', 'Work & LOE', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-09 13:18:57'),
(54, 320, 120120, 'sub20', 'EigNAsub20', 'Eight', 'NA', 'Physical Education', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-09 13:19:07'),
(55, 321, 120120, 'sub21', 'EigNAsub21', 'Eight', 'NA', 'Arts & Crafts', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2022-12-02 06:24:43', '2023-01-09 13:19:14'),
(56, 411, 120120, 'sub11', 'NinScsub11', 'Nine', 'Science', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(57, 412, 120120, 'sub12', 'NinScsub12', 'Nine', 'Science', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(58, 413, 120120, 'sub13', 'NinScsub13', 'Nine', 'Science', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(59, 414, 120120, 'sub14', 'NinScsub14', 'Nine', 'Science', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(60, 415, 120120, 'sub15', 'NinScsub15', 'Nine', 'Science', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(61, 20416, 120120, 'sub16', 'NinScsub16', 'Nine', 'Science', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:31:53', '2022-12-06 02:17:53'),
(62, 417, 120120, 'sub17', 'NinScsub17', 'Nine', 'Science', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(63, 418, 120120, 'sub18', 'NinScsub18', 'Nine', 'Science', 'Physics', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(64, 419, 120120, 'sub19', 'NinScsub19', 'Nine', 'Science', 'Chemistry', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(65, 420, 120120, 'sub20', 'NinScsub20', 'Nine', 'Science', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(66, 20423, 120120, 'sub23', 'NinScsub23', 'Nine', 'Science', 'Main Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:31:53', '2023-01-02 13:32:08'),
(67, 20424, 120120, 'sub24', 'NinScsub24', 'Nine', 'Science', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:31:53', '2023-01-02 13:31:56'),
(68, 421, 120120, 'sub21', 'NinScsub21', 'Nine', 'Science', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(69, 422, 120120, 'sub22', 'NinScsub22', 'Nine', 'Science', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:31:53', '2022-12-02 06:31:53'),
(70, 611, 120120, 'sub11', 'NinHusub11', 'Nine', 'Humanities', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(71, 612, 120120, 'sub12', 'NinHusub12', 'Nine', 'Humanities', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(72, 613, 120120, 'sub13', 'NinHusub13', 'Nine', 'Humanities', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(73, 614, 120120, 'sub14', 'NinHusub14', 'Nine', 'Humanities', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(74, 615, 120120, 'sub15', 'NinHusub15', 'Nine', 'Humanities', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(75, 20616, 120120, 'sub16', 'NinHusub16', 'Nine', 'Humanities', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2022-12-06 02:18:09'),
(76, 617, 120120, 'sub17', 'NinHusub17', 'Nine', 'Humanities', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(77, 618, 120120, 'sub18', 'NinHusub18', 'Nine', 'Humanities', 'Geography', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(78, 619, 120120, 'sub19', 'NinHusub19', 'Nine', 'Humanities', 'History Of BWC', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(79, 620, 120120, 'sub20', 'NinHusub20', 'Nine', 'Humanities', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(80, 621, 120120, 'sub21', 'NinHusub21', 'Nine', 'Humanities', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(81, 622, 120120, 'sub22', 'NinHusub22', 'Nine', 'Humanities', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:36:17', '2022-12-02 06:36:17'),
(82, 20623, 120120, 'sub23', 'NinHusub23', 'Nine', 'Humanities', 'Main Subject', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:36:17', '2023-01-02 13:36:57'),
(83, 20624, 120120, 'sub24', 'NinHusub24', 'Nine', 'Humanities', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:36:17', '2023-01-09 18:22:36'),
(84, 511, 120120, 'sub11', 'TenScsub11', 'Ten', 'Science', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(85, 512, 120120, 'sub12', 'TenScsub12', 'Ten', 'Science', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(86, 513, 120120, 'sub13', 'TenScsub13', 'Ten', 'Science', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(87, 514, 120120, 'sub14', 'TenScsub14', 'Ten', 'Science', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(88, 515, 120120, 'sub15', 'TenScsub15', 'Ten', 'Science', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(89, 20516, 120120, 'sub16', 'TenScsub16', 'Ten', 'Science', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:37:47', '2022-12-06 02:18:32'),
(90, 517, 120120, 'sub17', 'TenScsub17', 'Ten', 'Science', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(91, 518, 120120, 'sub18', 'TenScsub18', 'Ten', 'Science', 'Physics', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(92, 519, 120120, 'sub19', 'TenScsub19', 'Ten', 'Science', 'Chemistry', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(93, 520, 120120, 'sub20', 'TenScsub20', 'Ten', 'Science', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(94, 521, 120120, 'sub21', 'TenScsub21', 'Ten', 'Science', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(95, 522, 120120, 'sub22', 'TenScsub22', 'Ten', 'Science', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:37:47', '2022-12-02 06:37:47'),
(96, 20523, 120120, 'sub23', 'TenScsub23', 'Ten', 'Science', 'Main Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:37:47', '2023-01-02 13:33:31'),
(97, 20524, 120120, 'sub24', 'TenScsub24', 'Ten', 'Science', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:37:47', '2023-01-02 13:33:22'),
(98, 711, 120120, 'sub11', 'TenHusub11', 'Ten', 'Humanities', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(99, 712, 120120, 'sub12', 'TenHusub12', 'Ten', 'Humanities', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(100, 713, 120120, 'sub13', 'TenHusub13', 'Ten', 'Humanities', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(101, 714, 120120, 'sub14', 'TenHusub14', 'Ten', 'Humanities', 'English 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(102, 715, 120120, 'sub15', 'TenHusub15', 'Ten', 'Humanities', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(103, 20716, 120120, 'sub16', 'TenHusub16', 'Ten', 'Humanities', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2022-12-06 02:18:44'),
(104, 718, 120120, 'sub18', 'TenHusub18', 'Ten', 'Humanities', 'Geography', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(105, 717, 120120, 'sub17', 'TenHusub17', 'Ten', 'Humanities', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(106, 719, 120120, 'sub19', 'TenHusub19', 'Ten', 'Humanities', 'History Of BWC', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(107, 720, 120120, 'sub20', 'TenHusub20', 'Ten', 'Humanities', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(108, 721, 120120, 'sub21', 'TenHusub21', 'Ten', 'Humanities', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(109, 722, 120120, 'sub22', 'TenHusub22', 'Ten', 'Humanities', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:40:30', '2022-12-02 06:40:30'),
(110, 20723, 120120, 'sub23', 'TenHusub23', 'Ten', 'Humanities', 'Main Subject', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:40:30', '2023-01-02 13:32:42'),
(111, 20724, 120120, 'sub24', 'TenHusub24', 'Ten', 'Humanities', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:40:30', '2023-01-10 02:19:14'),
(112, 911, 120120, 'sub11', 'NinCosub11', 'Nine', 'Commerce', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(113, 912, 120120, 'sub12', 'NinCosub12', 'Nine', 'Commerce', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(114, 913, 120120, 'sub13', 'NinCosub13', 'Nine', 'Commerce', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(115, 914, 120120, 'sub14', 'NinCosub14', 'Nine', 'Commerce', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(116, 915, 120120, 'sub15', 'NinCosub15', 'Nine', 'Commerce', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(117, 20916, 120120, 'sub16', 'NinCosub16', 'Nine', 'Commerce', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:46:21', '2022-12-06 02:18:21'),
(118, 917, 120120, 'sub17', 'NinCosub17', 'Nine', 'Commerce', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(119, 918, 120120, 'sub18', 'NinCosub18', 'Nine', 'Commerce', 'Accounting', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(120, 919, 120120, 'sub19', 'NinCosub19', 'Nine', 'Commerce', 'Finance Banking', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(121, 920, 120120, 'sub20', 'NinCosub20', 'Nine', 'Commerce', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(122, 921, 120120, 'sub21', 'NinCosub21', 'Nine', 'Commerce', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(123, 922, 120120, 'sub22', 'NinCosub22', 'Nine', 'Commerce', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:46:21', '2022-12-02 06:46:21'),
(124, 20923, 120120, 'sub23', 'NinCosub23', 'Nine', 'Commerce', 'Main Subject', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:46:21', '2023-01-02 13:33:07'),
(125, 20924, 120120, 'sub24', 'NinCosub24', 'Nine', 'Commerce', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:46:21', '2023-01-02 13:32:58'),
(126, 811, 120120, 'sub11', 'TenCosub11', 'Ten', 'Commerce', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(127, 812, 120120, 'sub12', 'TenCosub12', 'Ten', 'Commerce', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(128, 813, 120120, 'sub13', 'TenCosub13', 'Ten', 'Commerce', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(129, 814, 120120, 'sub14', 'TenCosub14', 'Ten', 'Commerce', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(130, 815, 120120, 'sub15', 'TenCosub15', 'Ten', 'Commerce', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(131, 20816, 120120, 'sub16', 'TenCosub16', 'Ten', 'Commerce', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2022-12-06 02:18:54'),
(132, 817, 120120, 'sub17', 'TenCosub17', 'Ten', 'Commerce', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(133, 818, 120120, 'sub18', 'TenCosub18', 'Ten', 'Commerce', 'Accounting', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(134, 819, 120120, 'sub19', 'TenCosub19', 'Ten', 'Commerce', 'Finance Banking', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(135, 820, 120120, 'sub20', 'TenCosub20', 'Ten', 'Commerce', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(136, 821, 120120, 'sub21', 'TenCosub21', 'Ten', 'Commerce', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(137, 822, 120120, 'sub22', 'TenCosub22', 'Ten', 'Commerce', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:48:01', '2022-12-02 06:48:01'),
(138, 20823, 120120, 'sub23', 'TenCosub23', 'Ten', 'Commerce', 'Main Subject', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2022-12-02 06:48:01', '2023-01-02 13:34:15'),
(139, 20824, 120120, 'sub24', 'TenCosub24', 'Ten', 'Commerce', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2022-12-02 06:48:01', '2023-01-02 13:34:07'),
(361, 111, 999000, 'sub11', 'SixNAsub11', 'Six', 'NA', 'Bangla', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:23', '2023-01-07 03:25:23'),
(362, 113, 999000, 'sub13', 'SixNAsub13', 'Six', 'NA', 'English', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-01-07 03:25:23', '2023-01-07 03:25:23'),
(363, 115, 999000, 'sub15', 'SixNAsub15', 'Six', 'NA', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:23', '2023-01-07 03:25:23'),
(364, 117, 999000, 'sub17', 'SixNAsub17', 'Six', 'NA', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:23', '2023-01-07 03:25:23'),
(365, 118, 999000, 'sub18', 'SixNAsub18', 'Six', 'NA', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(366, 119, 999000, 'sub19', 'SixNAsub19', 'Six', 'NA', 'I.C.T.', NULL, 50, 'number', 'number', 'hidden', 50, 25, 0, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(367, 120, 999000, 'sub20', 'SixNAsub20', 'Six', 'NA', 'Agriculture', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(368, 121, 999000, 'sub21', 'SixNAsub21', 'Six', 'NA', 'Work & LOE', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(369, 122, 999000, 'sub22', 'SixNAsub22', 'Six', 'NA', 'Physical Education', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(370, 123, 999000, 'sub23', 'SixNAsub23', 'Six', 'NA', 'Arts & Crafts', NULL, 50, 'number', 'hidden', 'number', 25, 0, 25, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(371, 20116, 999000, 'sub16', 'SixNAsub16', 'Six', 'NA', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-01-07 03:25:24', '2023-01-07 03:25:24'),
(372, 311, 999001, 'sub11', 'EigNAsub11', 'Eight', 'NA', 'Bangla', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(373, 312, 999001, 'sub12', 'EigNAsub12', 'Eight', 'NA', 'English', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(374, 313, 999001, 'sub13', 'EigNAsub13', 'Eight', 'NA', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(375, 314, 999001, 'sub14', 'EigNAsub14', 'Eight', 'NA', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(376, 315, 999001, 'sub15', 'EigNAsub15', 'Eight', 'NA', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(377, 317, 999001, 'sub17', 'EigNAsub17', 'Eight', 'NA', 'I.C.T.', NULL, 50, 'number', 'number', 'hidden', 50, 25, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(378, 318, 999001, 'sub18', 'EigNAsub18', 'Eight', 'NA', 'Agriculture', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(379, 319, 999001, 'sub19', 'EigNAsub19', 'Eight', 'NA', 'Work & LOE', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(380, 320, 999001, 'sub20', 'EigNAsub20', 'Eight', 'NA', 'Physical Education', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(381, 321, 999001, 'sub21', 'EigNAsub21', 'Eight', 'NA', 'Arts & Crafts', NULL, 50, 'number', 'hidden', 'number', 50, 0, 25, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(382, 20316, 999001, 'sub16', 'EigNAsub16', 'Eight', 'NA', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 21:50:44', '2023-02-13 21:50:44'),
(383, 411, 999001, 'sub11', 'NinScsub11', 'Nine', 'Science', 'Bangla 1st Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(384, 412, 999001, 'sub12', 'NinScsub12', 'Nine', 'Science', 'Bangla 2nd Paper', NULL, 200, 'number', 'number', 'hidden', 70, 30, 0, 30, 18, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(385, 413, 999001, 'sub13', 'NinScsub13', 'Nine', 'Science', 'English 1st Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(386, 414, 999001, 'sub14', 'NinScsub14', 'Nine', 'Science', 'English 2nd Paper', NULL, 200, 'number', 'hidden', 'hidden', 100, 0, 0, 66, 0, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(387, 415, 999001, 'sub15', 'NinScsub15', 'Nine', 'Science', 'Mathematics', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(388, 417, 999001, 'sub17', 'NinScsub17', 'Nine', 'Science', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(389, 418, 999001, 'sub18', 'NinScsub18', 'Nine', 'Science', 'Physics', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(390, 419, 999001, 'sub19', 'NinScsub19', 'Nine', 'Science', 'Chemistry', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(391, 420, 999001, 'sub20', 'NinScsub20', 'Nine', 'Science', 'I.C.T.', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(392, 421, 999001, 'sub21', 'NinScsub21', 'Nine', 'Science', 'Career Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(393, 422, 999001, 'sub22', 'NinScsub22', 'Nine', 'Science', 'Physical Education', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(394, 20416, 999001, 'sub16', 'NinScsub16', 'Nine', 'Science', 'Moral Education', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 15, 9, 0, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(395, 20423, 999001, 'sub23', 'NinScsub23', 'Nine', 'Science', 'Main Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(396, 20424, 999001, 'sub24', 'NinScsub24', 'Nine', 'Science', 'Additional Subject', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 11, 8, 8, '2023-02-13 22:40:19', '2023-02-13 22:40:19'),
(402, 111, 120120, 'sub11', 'SixNAsub11', 'Six', 'NA', 'Bangla 1st', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-03-22 01:55:15', '2023-03-22 02:49:13'),
(403, 112, 120120, 'sub12', 'SixNAsub12', 'Six', 'NA', 'Bangla 2nd', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-03-22 01:56:29', '2023-03-22 02:49:31'),
(404, 113, 120120, 'sub13', 'SixNAsub13', 'Six', 'NA', 'English 1st', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-03-22 02:04:48', '2023-03-22 02:49:51'),
(405, 114, 120120, 'sub14', 'SixNAsub14', 'Six', 'NA', 'English 2nd', NULL, 100, 'number', 'hidden', 'hidden', 100, 0, 0, 0, 0, 0, '2023-03-22 02:07:14', '2023-03-22 02:50:13'),
(406, 115, 120120, 'sub15', 'SixNAsub15', 'Six', 'NA', 'Math', NULL, 100, 'number', 'number', 'hidden', 70, 30, 0, 0, 0, 0, '2023-03-22 02:08:11', '2023-03-22 02:50:37'),
(407, 116, 120120, 'sub16', 'SixNAsub16', 'Six', 'NA', 'Science', NULL, 100, 'number', 'number', 'hidden', 70, 30, NULL, 23, 10, NULL, '2023-03-22 02:15:10', '2023-03-22 02:15:10'),
(408, 117, 120120, 'sub17', 'SixNAsub17', 'Six', 'NA', 'Bangladesh & Global studies', NULL, 100, 'number', 'number', 'hidden', 70, 30, NULL, 23, 10, NULL, '2023-03-22 02:18:01', '2023-03-22 02:18:01'),
(409, 118, 120120, 'sub18', 'SixNAsub18', 'Six', 'NA', 'Agriculture', NULL, 100, 'number', 'number', 'number', 50, 25, 25, 17, 9, 9, '2023-03-22 02:19:49', '2023-03-22 02:19:49'),
(410, 119, 120120, 'sub19', 'SixNAsub19', 'Six', 'NA', 'Physical Education', NULL, 50, 'hidden', 'number', 'number', 0, 25, 25, 0, 0, 0, '2023-03-22 02:21:08', '2023-03-22 02:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desig` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `teacher_userid` varchar(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tecode1` varchar(255) DEFAULT NULL,
  `tecode2` varchar(255) DEFAULT NULL,
  `tecode3` varchar(255) DEFAULT NULL,
  `tecode4` varchar(255) DEFAULT NULL,
  `tecode5` varchar(255) DEFAULT NULL,
  `tecode6` varchar(255) DEFAULT NULL,
  `tecode7` varchar(255) DEFAULT NULL,
  `tecode8` varchar(255) DEFAULT NULL,
  `tecode9` varchar(255) DEFAULT NULL,
  `tecode10` varchar(255) DEFAULT NULL,
  `tecode11` varchar(255) DEFAULT NULL,
  `tecode12` varchar(255) DEFAULT NULL,
  `atten_class` varchar(255) DEFAULT NULL,
  `atten_babu` varchar(255) DEFAULT NULL,
  `atten_section` varchar(255) DEFAULT NULL,
  `teacher_fin_access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `desig`, `phone`, `email`, `teacher_userid`, `eiin`, `teacher_password`, `status`, `tecode1`, `tecode2`, `tecode3`, `tecode4`, `tecode5`, `tecode6`, `tecode7`, `tecode8`, `tecode9`, `tecode10`, `tecode11`, `tecode12`, `atten_class`, `atten_babu`, `atten_section`, `teacher_fin_access`, `created_at`, `updated_at`) VALUES
(6, 'Md Ataur Rahman', 'Assistant Teacher', '01516501602', 'abcd@yahoo.com', '12012001', 120120, '111111', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-20 20:08:49', '2023-01-09 12:58:09'),
(8, 'Kamrul islam', 'Co Ordinator', '1741807787', 'kamrulislam7787@gmial.com', '99900001', 999000, '123456', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '2023-01-07 03:25:46', '2023-01-08 01:47:19'),
(9, 'Rafiatul Shihab', 'ICT & Biology', '1757118796', 'rafiatulshihab12@gmail.com', '99900002', 999000, '123456', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 01:50:48', '2023-01-08 01:50:48'),
(10, 'Selim Ahmed', NULL, '1626429928', 'ahmedselim8880@gmail.com', '99900003', 999000, '123456', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 01:53:19', '2023-01-08 01:53:19'),
(11, 'Elias Hasan', NULL, '1750409747', 'ehsohag7@gmail.com', '99900004', 999000, '234567', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 01:54:50', '2023-01-08 01:54:50'),
(12, 'Shohel Dewan', 'English', '1744506073', 'ddd@gmail.com', '99900005', 999000, '234567', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 01:58:18', '2023-01-08 01:58:18'),
(13, 'Hridoy Khan VP', 'Math', '1967902481', 'ddddd12@gmail.com', '99900006', 999000, '234567', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-08 02:14:56', '2023-01-08 02:15:33'),
(14, 'Alomgir Hossain', 'Science', '01887608967', 'jaidabh7777@gmail.com', '99900007', 999000, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 17:29:48', '2023-01-09 17:29:48'),
(15, 'Rijuana Nusrat Dina', 'Teacher', '01311205679', 'rijuanadina@gmail.com', '99900008', 999000, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 17:33:00', '2023-01-09 17:33:00'),
(16, 'Tajrina Akter Maya', 'Teacher', '01760348165', 'mayatajrina2001@gmail.com', '99900009', 999000, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 17:34:35', '2023-01-09 17:34:35'),
(17, 'Parvin Akter', 'Teacher', '01872920980', 'mardiyaislam742@gmail.com', '99900010', 999000, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 17:49:06', '2023-01-09 17:49:06'),
(18, 'Zahirul Islam', 'Teacher', '01870789414', 'zahirulislam@gmail.com', '99900011', 999000, '345678', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-09 17:52:33', '2023-01-09 17:52:33'),
(19, 'MA Jolil', 'prime minister', '01750360043', 'jolil@gmail.com', '12012002', 120120, '123456', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 15:51:10', '2023-01-14 15:51:10'),
(20, 'Md Aminul Islam Nahid', 'Assistant Teacher', '01773509208', 'nahid233374@gmail.com', '99900101', 999001, '509208', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 21:53:29', '2023-02-13 21:53:29'),
(21, 'Muslim', NULL, '01723335674', 'muslim@gamil.com', '99900102', 999001, '3335674', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:28:14', '2023-02-13 22:28:14'),
(22, 'Md. Anwarul Haque', NULL, '01722091690', 'anwarul.idb@gmail.com', '99900103', 999001, '169052', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 22:40:09', '2023-02-13 22:40:09'),
(23, 'Sohel Parvez', 'Teacher', '01786796244', 'soheldnj99@gmail.com', '12012003', 120120, '796244', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 04:48:11', '2023-03-20 04:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vedios`
--

CREATE TABLE `vedios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` int(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `vedio` text NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vedios`
--

INSERT INTO `vedios` (`id`, `serial`, `category`, `vedio`, `text1`, `text2`, `text3`, `text4`, `created_at`, `updated_at`) VALUES
(3, 1, 'Vedio', 'https://www.youtube.com/embed/_d07nB85Esk', 'Part 1: Students entry .', NULL, NULL, NULL, '2023-03-13 05:14:24', '2023-03-13 06:15:59'),
(4, 2, 'Vedio', 'https://www.youtube.com/embed/aAP5IWQpDbs', 'Part 2: Teacher info', NULL, NULL, NULL, '2023-03-13 05:37:05', '2023-03-13 06:17:51'),
(5, 3, 'Vedio', 'https://www.youtube.com/embed/xaNmo9Axf6s', 'Part 3 : SMS getaway', NULL, NULL, NULL, '2023-03-13 06:20:15', '2023-03-13 06:20:15'),
(6, 4, 'Vedio', 'https://www.youtube.com/embed/THWhIlZvULM', 'Part 4 : Class Routine, SeatPlan, AdmitCard', NULL, NULL, NULL, '2023-03-13 06:22:48', '2023-03-13 06:22:48'),
(7, 5, 'Vedio', 'https://www.youtube.com/embed/yxXn13frKno', 'Part 5 : Marks input', NULL, NULL, NULL, '2023-03-13 06:24:16', '2023-03-13 06:24:16'),
(8, 6, 'Vedio', 'https://www.youtube.com/embed/qjU9ik9a4sE', 'Part 6 : Results Summary, Marksheets, TabulationSheets', NULL, NULL, NULL, '2023-03-13 06:25:58', '2023-03-13 06:25:58'),
(9, 7, 'Vedio', 'https://www.youtube.com/embed/TmCeXmnUclE', 'Part 7 : Teachers Login.', NULL, NULL, NULL, '2023-03-13 06:26:55', '2023-03-13 06:26:55'),
(11, 1, 'Dining', 'vedio link 1', 'https://fhhalldining.org/', 'SHRISTY', 'Fazlul Huq Muslim Hall', 'University Of Dhaka', '2023-03-16 12:00:35', '2023-03-16 12:02:16'),
(12, 2, 'Dining', 'vedio link 2', 'https://rosona.org/', 'Rosona', 'Amar Ekushey Hall', 'University of Dhaka', '2023-03-16 12:03:18', '2023-03-16 12:03:18'),
(13, 3, 'Dining', 'vedio link 3', 'https://bikalpamess.org/', 'Bikalpa', 'Dr. Muhammad Shahidullah Hall', 'University Of Dhaka', '2023-03-16 12:04:56', '2023-03-16 12:04:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admits`
--
ALTER TABLE `admits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attens`
--
ALTER TABLE `attens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eiin_sms`
--
ALTER TABLE `eiin_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinfos`
--
ALTER TABLE `examinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exstudents`
--
ALTER TABLE `exstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintains`
--
ALTER TABLE `maintains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markinfos`
--
ALTER TABLE `markinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlinepayments`
--
ALTER TABLE `onlinepayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spends`
--
ALTER TABLE `spends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectauths`
--
ALTER TABLE `subjectauths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vedios`
--
ALTER TABLE `vedios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admits`
--
ALTER TABLE `admits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attens`
--
ALTER TABLE `attens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eiin_sms`
--
ALTER TABLE `eiin_sms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `examinfos`
--
ALTER TABLE `examinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `exstudents`
--
ALTER TABLE `exstudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `maintains`
--
ALTER TABLE `maintains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markinfos`
--
ALTER TABLE `markinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `onlinepayments`
--
ALTER TABLE `onlinepayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `spends`
--
ALTER TABLE `spends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `subjectauths`
--
ALTER TABLE `subjectauths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vedios`
--
ALTER TABLE `vedios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

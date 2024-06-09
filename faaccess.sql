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
-- Table structure for table `faaccess`
--

CREATE TABLE `faaccess` (
  `id` int(255) NOT NULL,
  `eiin` int(11) NOT NULL,
  `teacher_id` int(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `babu` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `facode` varchar(100) NOT NULL,
  `others` varchar(100) DEFAULT NULL,
  `others1` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faaccess`
--

INSERT INTO `faaccess` (`id`, `eiin`, `teacher_id`, `class`, `babu`, `section`, `category`, `facode`, `others`, `others1`) VALUES
(3, 120120, 26, 'Seven', 'NA', 'A', 'Fin', 'FinSevNAA', NULL, NULL),
(4, 120120, 26, 'Nine', 'Science', 'B', 'Att', 'AttNinScB', NULL, NULL),
(5, 120120, 26, 'Six', 'NA', 'A', 'Fin', 'FinSixNAA', NULL, NULL),
(6, 120120, 26, 'Ten', 'Humanities', 'B', 'Att', 'AttTenHuB', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faaccess`
--
ALTER TABLE `faaccess`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faaccess`
--
ALTER TABLE `faaccess`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

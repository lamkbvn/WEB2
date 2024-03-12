-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 05:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `amount`, `status`) VALUES
(1, 1, 1, 2, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 3, 1),
(4, 1, 4, 2, 1),
(5, 2, 5, 2, 1),
(6, 2, 6, 1, 1),
(7, 2, 7, 3, 1),
(8, 2, 8, 1, 1),
(9, 3, 9, 1, 1),
(10, 3, 10, 2, 1),
(11, 3, 11, 3, 1),
(12, 3, 12, 1, 1),
(13, 4, 13, 2, 1),
(14, 4, 14, 1, 1),
(15, 4, 15, 3, 1),
(16, 4, 16, 1, 1),
(17, 5, 17, 1, 1),
(18, 5, 18, 2, 1),
(19, 5, 19, 3, 1),
(20, 5, 20, 1, 1),
(21, 6, 21, 2, 1),
(22, 6, 22, 1, 1),
(23, 6, 23, 3, 1),
(24, 6, 24, 1, 1),
(25, 7, 25, 2, 1),
(26, 7, 26, 1, 1),
(27, 7, 27, 3, 1),
(28, 7, 28, 1, 1),
(29, 8, 29, 2, 1),
(30, 8, 30, 1, 1),
(31, 8, 31, 3, 1),
(32, 8, 32, 1, 1),
(33, 9, 33, 2, 1),
(34, 9, 34, 1, 1),
(35, 9, 35, 3, 1),
(36, 9, 36, 1, 1),
(37, 10, 37, 2, 1),
(38, 10, 38, 1, 1),
(39, 10, 39, 3, 1),
(40, 10, 40, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

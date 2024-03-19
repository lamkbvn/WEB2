-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 07:24 PM
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
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_money` int(11) NOT NULL,
  `date_go` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `price`, `amount`, `total_money`, `date_go`) VALUES
(1, 1, 3, 1700000, 2, 3400000, '2024-03-10'),
(2, 2, 6, 2100000, 1, 2100000, '2024-03-10'),
(3, 3, 9, 1800000, 3, 5400000, '2024-03-11'),
(4, 4, 12, 2500000, 1, 2500000, '2024-03-11'),
(5, 5, 15, 1900000, 2, 3800000, '2024-03-12'),
(6, 6, 2, 2100000, 1, 2100000, '2024-03-12'),
(7, 7, 21, 2300000, 2, 4600000, '2024-03-13'),
(8, 8, 3, 2000000, 1, 2000000, '2024-03-13'),
(9, 9, 5, 1800000, 3, 5400000, '2024-03-14'),
(10, 10, 30, 2400000, 1, 2400000, '2024-03-14'),
(11, 11, 33, 2200000, 2, 4400000, '2024-03-15'),
(12, 12, 36, 2600000, 1, 2600000, '2024-03-15'),
(13, 13, 5, 1700000, 2, 3400000, '2024-03-16'),
(14, 14, 2, 2000000, 1, 2000000, '2024-03-16'),
(15, 15, 5, 1800000, 3, 5400000, '2024-03-17'),
(16, 16, 8, 2300000, 1, 2300000, '2024-03-17'),
(17, 17, 11, 2100000, 2, 4200000, '2024-03-18'),
(18, 18, 4, 1900000, 1, 1900000, '2024-03-18'),
(19, 19, 17, 2200000, 2, 4400000, '2024-03-19'),
(20, 20, 20, 2000000, 1, 2000000, '2024-03-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product_id` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_id_product_id` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

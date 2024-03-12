-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 07:29 AM
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
-- Table structure for table `provincial`
--

CREATE TABLE `provincial` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_procince` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provincial`
--

INSERT INTO `provincial` (`id`, `name_procince`) VALUES
(1, 'Quảng Ninh'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Quy Nhơn, Bình Định'),
(4, 'Đồng Nai'),
(5, 'Điện Biên'),
(6, 'Cần Thơ, An Giang'),
(7, 'Vũng Tàu, Bà Rịa - Vũng Tàu'),
(8, 'Ninh Bình'),
(9, 'Lạng Sơn'),
(10, 'Hậu Giang'),
(11, 'Huế, Thừa Thiên Huế'),
(12, 'Phan Thiết, Bình Thuận'),
(13, 'Vĩnh Long'),
(14, 'Cao Bằng'),
(15, 'Tiền Giang'),
(16, 'Hà Giang'),
(17, 'Cà Mau'),
(18, 'Bến Tre'),
(19, 'Lào Cai'),
(20, 'Bạc Liêu'),
(21, 'Nha Trang, Khánh Hòa'),
(22, 'Long An'),
(23, 'Đồng Tháp'),
(24, 'Lâm Đồng, Đà Lạt'),
(25, 'Thái Bình'),
(26, 'TP.Hồ Chí Minh'),
(27, 'Hải Dương'),
(28, 'Ninh Thuận'),
(29, 'Hòa Bình'),
(30, 'Nam Định'),
(31, 'Gia Lai'),
(32, 'Vĩnh Phúc'),
(33, 'Kon Tum'),
(34, 'Bình Định'),
(35, 'Hà Nam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provincial`
--
ALTER TABLE `provincial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provincial`
--
ALTER TABLE `provincial`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

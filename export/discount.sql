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
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `percent` double(8,2) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount_name`, `percent`, `code`, `description`, `date_start`, `date_end`, `status`) VALUES
(1, 'Khuyến mãi Mùa Hè', 10.50, 'SUMMER01', 'Ưu đãi đặc biệt cho kỳ nghỉ mùa hè', '2024-03-09', '2024-03-19', 1),
(2, 'Ưu đãi Đặt Trước', 15.00, 'EARLY02', 'Đặt trước và nhận được ưu đãi', '2024-03-09', '2024-03-24', 1),
(3, 'Nghỉ Đông Vui Vẻ', 12.80, 'WINTER03', 'Thưởng thức mùa đông với giá giảm', '2024-03-09', '2024-03-29', 1),
(4, 'Ưu đãi Cho Gia Đình', 20.00, 'FAMILY04', 'Ưu đãi cho đặt phòng của gia đình', '2024-03-09', '2024-04-03', 1),
(5, 'Du lịch Cuối Tuần', 8.70, 'WEEKEND05', 'Ưu đãi đặc biệt cho các chuyến đi cuối tuần', '2024-03-09', '2024-04-08', 1),
(6, 'Khuyến mãi Năm Mới', 18.30, 'NEWYEAR06', 'Chào đón năm mới với ưu đãi đặc biệt', '2024-03-09', '2024-04-13', 1),
(7, 'Ưu đãi Mùa Xuân', 14.60, 'SPRING07', 'Ưu đãi cho những kỳ nghỉ mùa xuân', '2024-03-09', '2024-04-18', 1),
(8, 'Ưu đãi Đặt Phòng Cuối Cùng', 10.00, 'LASTMIN08', 'Nhận ưu đãi cho đặt phòng vào phút cuối', '2024-03-09', '2024-04-23', 1),
(9, 'Khuyến mãi Kỷ Niệm', 25.20, 'ANNIV09', 'Chào mừng kỷ niệm với ưu đãi đặc biệt', '2024-03-09', '2024-04-28', 1),
(10, 'Quay lại Trường Học', 12.00, 'SCHOOL10', 'Ưu đãi cho mùa trở lại trường', '2024-03-09', '2024-05-03', 1),
(11, 'Nghỉ Mát Mùa Thu', 16.90, 'AUTUMN11', 'Ưu đãi cho kỳ nghỉ mùa thu', '2024-03-09', '2024-05-08', 1),
(12, 'Khuyến mãi Lễ Hội', 22.50, 'HOLIDAY12', 'Ưu đãi đặc biệt cho mùa lễ hội', '2024-03-09', '2024-05-13', 1),
(13, 'Ưu đãi Phục Sinh', 17.80, 'EASTER13', 'Ưu đãi theo chủ đề Phục Sinh cho mùa xuân', '2024-03-09', '2024-05-18', 1),
(14, 'Tuần Phiêu Lưu', 11.20, 'ADVEN14', 'Ưu đãi cho các chuyến phiêu lưu', '2024-03-09', '2024-05-23', 1),
(15, 'Kỳ Nghỉ Lãng Mạn', 14.00, 'ROMAN15', 'Ưu đãi cho kỳ nghỉ lãng mạn', '2024-03-09', '2024-05-28', 1),
(16, 'Mùa Hè Sôi Động', 9.50, 'SUMMER16', 'Đối mặt với cái nóng với ưu đãi mùa hè', '2024-03-09', '2024-06-02', 1),
(17, 'Nghỉ Mát Mùa Xuân', 13.30, 'SPRING17', 'Ưu đãi cho kỳ nghỉ mát mùa xuân', '2024-03-09', '2024-06-07', 1),
(18, 'Trải nghiệm Văn Hóa', 19.70, 'CULTURAL18', 'Ưu đãi cho các chuyến thăm văn hóa', '2024-03-09', '2024-06-12', 1),
(19, 'Trốn Thành Phố', 10.80, 'CITY19', 'Thưởng thức cuộc sống thành phố với giá giảm', '2024-03-09', '2024-06-17', 1),
(20, 'Sức Khỏe và Sự Sống', 15.50, 'WELLNES20', 'Ưu đãi cho kỳ nghỉ thư giãn và sức khỏe', '2024-03-09', '2024-06-22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

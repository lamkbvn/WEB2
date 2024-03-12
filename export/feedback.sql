-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 05:44 AM
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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` date NOT NULL,
  `num_star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `product_id`, `note`, `create_at`, `update_at`, `num_star`) VALUES
(1, 1, 1, 'Sản phẩm tốt!', '2024-03-09 12:00:00', '2024-03-09', 4),
(2, 1, 2, 'Dịch vụ xuất sắc!', '2024-03-09 12:30:00', '2024-03-09', 5),
(3, 1, 3, 'Trải nghiệm trung bình.', '2024-03-09 13:00:00', '2024-03-09', 3),
(4, 1, 4, 'Tour tuyệt vời!', '2024-03-09 13:30:00', '2024-03-09', 5),
(5, 2, 5, 'Điểm đến tuyệt vời!', '2024-03-09 14:00:00', '2024-03-09', 4),
(6, 2, 6, 'Không hài lòng.', '2024-03-09 14:30:00', '2024-03-09', 2),
(7, 2, 7, 'Phong cảnh đẹp!', '2024-03-09 15:00:00', '2024-03-09', 5),
(8, 2, 8, 'Nên khuyến khích!', '2024-03-09 15:30:00', '2024-03-09', 4),
(9, 3, 9, 'Yêu thích trải nghiệm!', '2024-03-09 16:00:00', '2024-03-09', 5),
(10, 3, 10, 'Hành trình dễ chịu.', '2024-03-09 16:30:00', '2024-03-09', 3),
(11, 3, 11, 'Thất vọng.', '2024-03-09 17:00:00', '2024-03-09', 2),
(12, 3, 12, 'Tổ chức tốt!', '2024-03-09 17:30:00', '2024-03-09', 4),
(13, 4, 13, 'Chất lượng tốt, giá hợp lý.', '2024-03-09 18:00:00', '2024-03-09', 4),
(14, 4, 14, 'Dịch vụ chuyên nghiệp.', '2024-03-09 18:30:00', '2024-03-09', 5),
(15, 4, 15, 'Không gian thoải mái.', '2024-03-09 19:00:00', '2024-03-09', 3),
(16, 4, 16, 'Tour thú vị!', '2024-03-09 19:30:00', '2024-03-09', 5),
(17, 5, 17, 'Đồ ăn ngon, nhân viên thân thiện.', '2024-03-09 20:00:00', '2024-03-09', 4),
(18, 5, 18, 'Dễ dàng đặt tour online.', '2024-03-09 20:30:00', '2024-03-09', 2),
(19, 5, 19, 'Không gian đẹp, phục vụ tốt.', '2024-03-09 21:00:00', '2024-03-09', 5),
(20, 5, 20, 'Tour hấp dẫn.', '2024-03-09 21:30:00', '2024-03-09', 4),
(21, 6, 21, 'Điểm đến tuyệt vời!', '2024-03-09 22:00:00', '2024-03-09', 5),
(22, 6, 22, 'Dịch vụ ấn tượng.', '2024-03-09 22:30:00', '2024-03-09', 3),
(23, 6, 23, 'Trải nghiệm thú vị.', '2024-03-09 23:00:00', '2024-03-09', 2),
(24, 6, 24, 'Tour đáng nhớ!', '2024-03-09 23:30:00', '2024-03-09', 4),
(25, 7, 25, 'Thực phẩm ngon miệng.', '2024-03-10 00:00:00', '2024-03-10', 4),
(26, 7, 26, 'Dịch vụ chuyên nghiệp.', '2024-03-10 00:30:00', '2024-03-10', 5),
(27, 7, 27, 'Khám phá độc đáo.', '2024-03-10 01:00:00', '2024-03-10', 3),
(28, 7, 28, 'Tour thú vị!', '2024-03-10 01:30:00', '2024-03-10', 5),
(29, 8, 29, 'Khám phá văn hóa độc đáo.', '2024-03-10 02:00:00', '2024-03-10', 4),
(30, 8, 30, 'Dịch vụ tốt, giá hợp lý.', '2024-03-10 02:30:00', '2024-03-10', 2),
(31, 8, 31, 'Trải nghiệm thú vị.', '2024-03-10 03:00:00', '2024-03-10', 5),
(32, 8, 32, 'Tour tuyệt vời!', '2024-03-10 03:30:00', '2024-03-10', 4),
(33, 9, 33, 'Phong cảnh đẹp tuyệt vời.', '2024-03-10 04:00:00', '2024-03-10', 5),
(34, 9, 34, 'Dịch vụ chuyên nghiệp.', '2024-03-10 04:30:00', '2024-03-10', 3),
(35, 9, 35, 'Trải nghiệm thú vị.', '2024-03-10 05:00:00', '2024-03-10', 2),
(36, 9, 36, 'Tour đáng nhớ!', '2024-03-10 05:30:00', '2024-03-10', 4),
(37, 10, 37, 'Thực phẩm ngon miệng.', '2024-03-10 06:00:00', '2024-03-10', 4),
(38, 10, 38, 'Dịch vụ chuyên nghiệp.', '2024-03-10 06:30:00', '2024-03-10', 5),
(39, 10, 39, 'Khám phá độc đáo.', '2024-03-10 07:00:00', '2024-03-10', 3),
(40, 10, 40, 'Tour thú vị!', '2024-03-10 07:30:00', '2024-03-10', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

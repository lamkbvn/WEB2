-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 06:58 AM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_provincial` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  `status` int(11) NOT NULL,
  `num_bought` int(11) NOT NULL,
  `star_feedback` double(8,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `soLuongConLai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `id_user`, `id_provincial`, `title`, `price`, `content`, `create_at`, `update_at`, `status`, `num_bought`, `star_feedback`, `address`, `soLuongConLai`) VALUES
(1, 1, 5, 1, 'Tour Đảo Cô Tô', 1900000, 'Khám phá vẻ đẹp hoang sơ của Cô Tô', '2024-03-09', '2024-03-09', 1, 55, 4.40, 'Quảng Ninh', 30),
(2, 2, 8, 2, 'Hành trình Bà Rịa - Vũng Tàu', 2200000, 'Trải nghiệm vịnh biển và cảnh đẹp núi rừng', '2024-03-09', '2024-03-09', 1, 48, 4.70, 'Bà Rịa - Vũng Tàu', 25),
(3, 3, 14, 3, 'Du lịch Quy Nhơn', 1700000, 'Khám phá vùng đất của những bãi biển tuyệt vời', '2024-03-09', '2024-03-09', 1, 60, 4.20, 'Quy Nhơn, Bình Định', 35),
(4, 1, 6, 4, 'Tour Đồng Nai', 1500000, 'Khám phá địa điểm du lịch mới lạ tại Đồng Nai', '2024-03-09', '2024-03-09', 1, 45, 4.90, 'Đồng Nai', 28),
(5, 5, 10, 5, 'Hành trình Điện Biên', 2000000, 'Đặt chân đến vùng đất lịch sử Điện Biên', '2024-03-09', '2024-03-09', 1, 55, 4.60, 'Điện Biên', 32),
(6, 3, 13, 6, 'Du lịch Cần Thơ', 2200000, 'Thưởng thức ẩm thực đặc sản và cảnh đẹp sông nước', '2024-03-09', '2024-03-09', 1, 48, 4.80, 'Cần Thơ, An Giang', 27),
(7, 1, 17, 7, 'Tour Vũng Tàu', 1700000, 'Nghỉ dưỡng và thư giãn tại bãi biển Vũng Tàu', '2024-03-09', '2024-03-09', 1, 42, 4.30, 'Vũng Tàu, Bà Rịa - Vũng Tàu', 29),
(8, 2, 4, 8, 'Khám phá Ninh Bình', 1900000, 'Thưởng thức vẻ đẹp hùng vĩ của những cánh đồng lúa', '2024-03-09', '2024-03-09', 1, 38, 4.70, 'Ninh Bình', 31),
(9, 3, 12, 9, 'Du lịch Lạng Sơn', 2800000, 'Khám phá văn hóa và lịch sử của Lạng Sơn', '2024-03-09', '2024-03-09', 1, 52, 4.30, 'Lạng Sơn', 26),
(10, 1, 1, 10, 'Tour Yên Tử', 1600000, 'Hành trình linh thiêng tại chùa Yên Tử', '2024-03-09', '2024-03-09', 1, 58, 4.70, 'Quảng Ninh', 33),
(11, 5, 14, 11, 'Du lịch Hậu Giang', 2700000, 'Trải nghiệm cuộc sống ven sông sông nước tại Hậu Giang', '2024-03-09', '2024-03-09', 1, 47, 4.40, 'Hậu Giang', 30),
(12, 1, 7, 12, 'Tour Huế', 2000000, 'Khám phá di sản văn hóa Huế', '2024-03-09', '2024-03-09', 1, 44, 4.60, 'Huế, Thừa Thiên Huế', 29),
(13, 1, 16, 13, 'Du lịch Phan Thiết', 2400000, 'Thưởng thức bãi biển đẹp nhất Phan Thiết', '2024-03-09', '2024-03-09', 1, 51, 4.50, 'Phan Thiết, Bình Thuận', 27),
(14, 2, 8, 14, 'Hành trình Vĩnh Long', 1800000, 'Trải nghiệm cuộc sống ven sông Vĩnh Long', '2024-03-09', '2024-03-09', 1, 49, 4.80, 'Vĩnh Long', 30),
(15, 3, 11, 6, 'Khám phá Cần Thơ', 2100000, 'Thưởng thức vẻ đẹp sông nước và đặc sản miền Tây', '2024-03-09', '2024-03-09', 1, 46, 4.40, 'Cần Thơ, An Giang', 28),
(16, 4, 17, 16, 'Du lịch Cao Bằng', 1500000, 'Khám phá vùng đất đầy huyền bí của Cao Bằng', '2024-03-09', '2024-03-09', 1, 43, 4.90, 'Cao Bằng', 33),
(17, 1, 4, 17, 'Tour Tiền Giang', 1900000, 'Thăm quan và trải nghiệm ẩm thực tại Tiền Giang', '2024-03-09', '2024-03-09', 1, 37, 4.20, 'Tiền Giang', 31),
(18, 2, 13, 18, 'Hành trình Hà Giang', 2300000, 'Khám phá vùng đất cao nguyên đá Hà Giang', '2024-03-09', '2024-03-09', 1, 53, 4.30, 'Hà Giang', 29),
(19, 2, 2, 10, 'Du lịch Vịnh Hạ Long', 2600000, 'Nghỉ dưỡng tại vịnh Hạ Long huyền bí', '2024-03-09', '2024-03-09', 1, 59, 4.80, 'Quảng Ninh', 32),
(20, 1, 10, 20, 'Tour Cà Mau', 1700000, 'Trải nghiệm cảnh đẹp thiên nhiên tại Cà Mau', '2024-03-09', '2024-03-09', 1, 41, 4.10, 'Cà Mau', 27),
(21, 3, 7, 21, 'Du lịch Bến Tre', 1800000, 'Trải nghiệm cuộc sống ven sông Bến Tre', '2024-03-10', '2024-03-10', 1, 39, 4.60, 'Bến Tre', 28),
(22, 1, 16, 22, 'Tour Sapa', 2500000, 'Khám phá vẻ đẹp hùng vĩ của núi rừng Sapa', '2024-03-10', '2024-03-10', 1, 55, 4.80, 'Lào Cai', 32),
(23, 5, 9, 23, 'Hành trình Bạc Liêu', 2000000, 'Thưởng thức ẩm thực đặc sản tại Bạc Liêu', '2024-03-10', '2024-03-10', 1, 48, 4.20, 'Bạc Liêu', 29),
(24, 1, 3, 24, 'Tour Nha Trang', 2200000, 'Nghỉ dưỡng và thư giãn tại bãi biển Nha Trang', '2024-03-10', '2024-03-10', 1, 45, 4.90, 'Nha Trang, Khánh Hòa', 27),
(25, 2, 14, 25, 'Du lịch Long An', 1600000, 'Khám phá vùng đất lịch sử Long An', '2024-03-10', '2024-03-10', 1, 52, 4.70, 'Long An', 33),
(26, 3, 6, 6, 'Khám phá Đồng Tháp', 1900000, 'Thưởng thức vẻ đẹp sông nước và di tích lịch sử', '2024-03-10', '2024-03-10', 1, 44, 4.40, 'Đồng Tháp', 30),
(27, 4, 19, 27, 'Du lịch Lâm Đồng', 2400000, 'Khám phá vùng đất của hoa và mây đẹp nhất', '2024-03-10', '2024-03-10', 1, 51, 4.60, 'Lâm Đồng, Đà Lạt', 29),
(28, 1, 5, 28, 'Tour Thái Bình', 1800000, 'Trải nghiệm cuộc sống ven sông Thái Bình', '2024-03-10', '2024-03-10', 1, 49, 4.30, 'Thái Bình', 31),
(29, 3, 12, 29, 'Hành trình Hồ Chí Minh', 2800000, 'Khám phá lịch sử và văn hóa của TP.Hồ Chí Minh', '2024-03-10', '2024-03-10', 1, 53, 4.80, 'TP.Hồ Chí Minh', 27),
(30, 1, 1, 30, 'Tour Hải Dương', 1500000, 'Trải nghiệm cuộc sống và di tích lịch sử Hải Dương', '2024-03-10', '2024-03-10', 1, 37, 4.50, 'Hải Dương', 28),
(31, 3, 17, 31, 'Du lịch Ninh Thuận', 1900000, 'Thưởng thức nét đẹp tự nhiên của Ninh Thuận', '2024-03-10', '2024-03-10', 1, 46, 4.20, 'Ninh Thuận', 30),
(32, 4, 2, 32, 'Hành trình Hòa Bình', 2100000, 'Khám phá vùng núi Hòa Bình tươi tắn', '2024-03-10', '2024-03-10', 1, 43, 4.90, 'Hòa Bình', 32),
(33, 1, 15, 33, 'Tour Nam Định', 1700000, 'Trải nghiệm cuộc sống ven sông Nam Định', '2024-03-10', '2024-03-10', 1, 38, 4.60, 'Nam Định', 29),
(34, 2, 18, 34, 'Du lịch Gia Lai', 2200000, 'Khám phá văn hóa và địa điểm đẹp của Gia Lai', '2024-03-10', '2024-03-10', 1, 47, 4.80, 'Gia Lai', 26),
(35, 1, 11, 35, 'Tour Vĩnh Phúc', 2000000, 'Thăm quan và thưởng thức đặc sản Vĩnh Phúc', '2024-03-10', '2024-03-10', 1, 42, 4.30, 'Vĩnh Phúc', 33),
(36, 3, 4, 36, 'Du lịch Kon Tum', 1700000, 'Khám phá vẻ đẹp của Kon Tum đầy màu sắc', '2024-03-10', '2024-03-10', 1, 58, 4.70, 'Kon Tum', 30),
(37, 1, 13, 37, 'Tour Lào Cai', 2500000, 'Hành trình đến với vùng đất nổi tiếng của Lào Cai', '2024-03-10', '2024-03-10', 1, 47, 4.40, 'Lào Cai', 29),
(38, 5, 6, 38, 'Hành trình Bình Định', 1800000, 'Trải nghiệm văn hóa và ẩm thực Bình Định', '2024-03-10', '2024-03-10', 1, 41, 4.10, 'Bình Định', 27),
(39, 4, 8, 39, 'Du lịch Thừa Thiên Huế', 2600000, 'Khám phá di sản lịch sử của Thừa Thiên Huế', '2024-03-10', '2024-03-10', 1, 59, 4.50, 'Huế, Thừa Thiên Huế', 28),
(40, 1, 10, 40, 'Tour Hà Nam', 1700000, 'Trải nghiệm cuộc sống và văn hóa Hà Nam', '2024-03-10', '2024-03-10', 1, 41, 4.30, 'Hà Nam', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

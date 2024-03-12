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
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `create_at` date NOT NULL,
  `status` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `id_acount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `fullname`, `email`, `phone_number`, `create_at`, `status`, `address`, `id_acount`) VALUES
(1, 'lam phuc', 'nguyenvana@email.com', '123456789', '2023-01-01', 1, '123 Street, City', 1),
(2, 'Tran Thi B', 'tranthib@email.com', '987654321', '2023-02-15', 1, '456 Avenue, Town', 2),
(3, 'Le Van C', 'levanc@email.com', '555444333', '2023-03-20', 1, '789 Road, Village', 3),
(4, 'Pham Thi D', 'phamthid@email.com', '111222333', '2023-04-10', 1, '567 Lane, Suburb', 4),
(5, 'Hoang Van E', 'hoangvane@email.com', '999888777', '2023-05-05', 1, '432 Drive, District', 5),
(6, 'Nguyen Thi F', 'nguyenthif@email.com', '444555666', '2023-06-22', 1, '876 Crescent, City', 6),
(7, 'Tran Van G', 'tranvang@email.com', '777888999', '2023-07-18', 1, '654 Boulevard, Town', 7),
(8, 'Le Thi H', 'lethih@email.com', '222333444', '2023-08-30', 1, '987 Street, Village', 8),
(9, 'Pham Van I', 'phamvani@email.com', '666777888', '2023-09-12', 1, '321 Road, Suburb', 9),
(10, 'Hoang Thi K', 'hoangthik@email.com', '333222111', '2023-10-05', 1, '234 Lane, District', 10),
(11, 'Nguyen Van L', 'nguyenvanl@email.com', '888777666', '2023-11-11', 1, '789 Drive, City', 11),
(12, 'Tran Thi M', 'tranthim@email.com', '111222333', '2023-12-25', 1, '876 Avenue, Town', 12),
(13, 'Le Van N', 'levann@email.com', '555444333', '2024-01-07', 1, '345 Road, Village', 13),
(14, 'Pham Thi O', 'phamthio@email.com', '999888777', '2024-02-14', 1, '567 Lane, Suburb', 14),
(15, 'Hoang Van P', 'hoangvanp@email.com', '333444555', '2024-03-01', 1, '432 Crescent, District', 15),
(16, 'Nguyen Thi Q', 'nguyenthiq@email.com', '777888999', '2024-04-15', 1, '321 Street, City', 16),
(17, 'Tran Van R', 'tranvanr@email.com', '444555666', '2024-05-20', 1, '654 Boulevard, Town', 17),
(18, 'Le Thi S', 'lethis@email.com', '666777888', '2024-06-10', 1, '987 Road, Village', 18),
(19, 'Pham Van T', 'phamvant@email.com', '222333444', '2024-07-05', 1, '123 Lane, Suburb', 19),
(20, 'Hoang Thi U', 'hoangthiu@email.com', '888777666', '2024-08-18', 1, '876 Drive, District', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

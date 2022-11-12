-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 10:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `Category_Name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Category_Name`, `title`, `created_at`) VALUES
(1, 'Phòng đơn', 'Có phòng đơn', '2022-11-08 08:49:47'),
(2, 'Phòng đôi', 'Phòng rộng rãi, có giường đôi...', '2022-11-08 08:50:39'),
(3, 'Chung cư mini', 'chung cư ', '2022-11-08 09:18:31'),
(4, 'căn hộ', 'căn hộ cao cấp', '2022-11-08 09:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(1, 'Thành phố Vinh'),
(2, 'Thị xã Cửa Lò\r\n'),
(3, 'Thị xã Hoàng Mai'),
(4, 'Thanh Hóa');

-- --------------------------------------------------------

--
-- Table structure for table `motel`
--

CREATE TABLE `motel` (
  `Id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `count_view` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latlng` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `utilities` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(255) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motel`
--

INSERT INTO `motel` (`Id`, `title`, `description`, `price`, `area`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `utilities`, `created_at`, `phone`, `approve`) VALUES
(1, 'phòng 101', 'Phòng đơn có giường đơn, khép kín.', 850000, 1, 0, '20 Phạm Kinh Vỹ, Phường Bến Thủy, Thành phố Vinh', '', '', 4, 1, 1, 'Phòng có không gian rộng rãi, thoáng đáng, view không gian xanh.', '2022-11-08 09:02:55', '0368123123', 1),
(2, 'Phòng 201', 'Phòng đơn, không khép kín', 650000, 1, 0, '06 Nguyễn Kiệm, phường trung đô, thành phố Vinh.', '', '', 2, 1, 1, 'Phòng có kích thước 20m2', '2022-11-08 09:06:13', '0348564912', 0),
(3, 'phòng 102', 'phòng đôi, có hai giường, khép kín', 900000, 2, 0, '20 Phạm Kinh Vỹ, phường Bến Thủy, thành phố vinh', '', '', 5, 2, 2, 'Phòng có nóng lạnh, điều hòa', '2022-11-08 09:09:31', '0352220118', 1),
(4, 'Phòng 103', 'phòng đôi, khép kín', 950000, 2, 0, '36 Phạm Minh, phường Bến Thủy, thành phố cửa lò', '', '', 6, 2, 2, 'Có điều hòa, nóng lạnh', '2022-11-08 09:15:17', '0234156248', 1),
(5, 'Phòng 104', 'phòng đôi, khép kín, có điều hòa, nóng lạnh.', 950000, 2, 0, '36 Phạm Minh, phường Bến Thủy, thành phố cửa lò', '', '', 3, 2, 2, 'Có điều hòa, nóng lạnh, đèn cảm ứng...', '2022-11-08 09:15:17', '0234156248', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`, `phone`, `avatar`) VALUES
(1, 'nhom7', 'nhom7', 'nhom7@gmail.com', 'nhom7123', 1, '12345678', ''),
(2, 'thanh', 'bathanh', 'nguyenbathanh88888@gmail.com', 'thanh123', 0, '12345678', ''),
(3, 'truc', 'vantruc', 'vantruc123@gmail.com', 'truc123', 0, '12345678', ''),
(4, 'linh', 'thuylinh', 'thuylinh123@gmail.com', 'linh123', 0, '12345678', ''),
(5, 'tu', 'vantu', 'vantu123@gmail.com', 'tu123', 0, '12345678', ''),
(6, 'tra', 'thutra', 'thutra123@gmail.com', 'tra123', 0, '12345678', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motel`
--
ALTER TABLE `motel`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `motel`
--
ALTER TABLE `motel`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motel`
--
ALTER TABLE `motel`
  ADD CONSTRAINT `motel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `motel_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

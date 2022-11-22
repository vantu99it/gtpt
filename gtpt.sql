-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 21, 2022 lúc 01:08 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gtpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `title`, `created_at`) VALUES
(1, 'Phòng đơn', 'Có phòng đơn', '2022-11-08 08:49:47'),
(2, 'Phòng đôi', 'Phòng rộng rãi, có giường đôi...', '2022-11-08 08:50:39'),
(3, 'Chung cư mini', 'chung cư ', '2022-11-08 09:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(1, 'Thành phố Vinh'),
(2, 'Thị xã Cửa Lò\r\n'),
(3, 'Thị xã Hoàng Mai'),
(4, 'Thanh Hóa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motel`
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
  `images` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `utilities` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `motel`
--

INSERT INTO `motel` (`Id`, `title`, `description`, `price`, `area`, `count_view`, `address`, `latlng`, `images`, `user_id`, `category_id`, `district_id`, `utilities`, `created_at`, `phone`, `status`) VALUES
(2, 'Phòng 201', 'Phòng đơn, không khép kín', 650000, 1, 0, '06 Nguyễn Kiệm, phường trung đô, thành phố Vinh.', '', './image/td.jpg', 8, 1, 1, '               Phòng có kích thước 20m2', '2022-11-21 01:25:22', '0348564912', 1),
(3, 'phòng 102', 'phòng đôi, có hai giường, khép kín', 900000, 2, 0, '20 Phạm Kinh Vỹ, phường Bến Thủy, thành phố vinh', '', './image/sud.jpg', 8, 2, 2, '  Phòng có nóng lạnh, điều hòa', '2022-11-20 14:09:45', '0352220118', 1),
(4, 'Phòng 103', 'phòng đôi, khép kín', 950000, 2, 0, '36 Phạm Minh, phường Bến Thủy, thành phố cửa lò', '', './image/txz.jpg', 8, 2, 2, ' Có điều hòa, nóng lạnh', '2022-11-20 14:04:10', '0234156248', 1),
(5, 'Phòng 104', 'phòng đôi, khép kín, có điều hòa, nóng lạnh.', 950000, 2, 0, '36 Phạm Minh, phường Bến Thủy, thành phố cửa lò', '', './image/tai-xuong4.jpg', 8, 2, 2, ' Có điều hòa, nóng lạnh, đèn cảm ứng...', '2022-11-20 14:10:03', '0234156248', 1),
(11, 'Cho thuê trọ giá rẻ', 'Trọ giá rẻ', 800000, 18, 0, 'Ngõ 2, nhà 23 Bạch Liêu, Bến Thủy', '', './image/tai-xuong.png', 8, 1, 1, 'Cho thuê trọ giá rẻ', '2022-11-20 11:51:55', '0376553525', 1),
(12, 'Cho thuê phòng trọ cao cấp', 'Phòng trọ cao cấp dạng chung cư mini', 1800000, 25, 0, 'Ngõ 18, nhà 2 Bạch Liêu, Bến Thủy', '', './image/tai-xuong3.jpg', 8, 3, 1, '  Chung cư mini cao cấp', '2022-11-20 14:09:31', '0927441099', 1),
(13, 'Trọ mới đẹp', 'Trọ đẹp', 850000, 18, 0, 'Ngõ 2, nhà 25 Bạch Liêu, Bến Thủy', '', './image/tai-xuong3.jpg', 8, 1, 1, ' asmcb dgg', '2022-11-20 14:24:32', '0949535587', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
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
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `role`, `phone`, `avatar`) VALUES
(7, 'Nguyễn Văn Tú', 'tu', 'Tu123@gmail.com', '$2y$10$J567LEzEAjGmo5QF6qKu.ONgbc2R/fhQF2Nz7YKU4Nc.7/DlsS/d6', 0, '0932379943', 'image/tim-phong-nhanh--1--removebg-preview.png'),
(8, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$LdZdsX1K.N3lfMrG/nwkh.s6aOBeqpeG.cftzIUjb4Y9JVQDnBkIO', 1, '', ''),
(9, 'Phạm Thị Thu Trà', 'tra', 'tra@gmail.com', '$2y$10$0/X02asM2exCLfSV1.Xnie/Sp9juUCfd4qkmqim0jgJzNDioKRi6K', 0, '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `motel`
--
ALTER TABLE `motel`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `motel`
--
ALTER TABLE `motel`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `motel`
--
ALTER TABLE `motel`
  ADD CONSTRAINT `motel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `motel_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

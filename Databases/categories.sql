-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2021 lúc 03:36 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myadmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_created`) VALUES
(3, 'Nguyễn Mindsgshhjs', '12345656788'),
(4, 'Nguyễn Minh Tuấn ', '1234565678899'),
(5, 'Nguyễn Minh Tuấn ', '1234565678899'),
(6, 'Nguyễn Minh Tuấn ', '1234565678899'),
(7, 'Nguyễn Minh ', '1234565678899'),
(8, 'Nguyễn Minh Tuấn ', '1234565678899'),
(9, 'Nguyễn Minh Tuấn ', '1234565678899'),
(10, 'Nguyễn Minh Tuấn ', '1234565678899'),
(11, 'Nguyễn Minh Tuấn ', '1234565678899'),
(12, 'Nguyễn Minh Tuấn ', '1234565678899'),
(13, 'Nguyễn Minh Tuấn ', '1234565678899'),
(14, 'Nguyễn Minh Tuấn ', '1234565678899'),
(15, 'Nguyễn Minh Tuấn ', '1234565678899'),
(16, 'Nguyễn Minh Tuấn ', '1234565678899'),
(17, 'Nguyễn Minh Tuấn ', '1234567890'),
(18, '1222222', '1234565678899');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 04:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avartar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `date_created`, `avartar`) VALUES
(2, '24855', '123456', 'abcd abcd abvcd', 'sdkjsndkj@gmail.com', '1234567890', '23/02/2021', '/upload/avatar/images (1).jpg'),
(6, 'admin2', '123456', 'abcd abcd abvcd123', 'sdkjsndkj@gmail.com', '0123456789', '23/12/2021', '/upload/avatar/images (2).jpg'),
(7, 'admin', '123321', 'abcd abcd 1234edit', 'sdkjsndkj@gmail.com', '1234567890', '23/12/2021', '/upload/avatar/images (3).jpg'),
(8, '2485', '123456', 'abcd abcd abvcdedit', 'esfqwserdfs@gmail.com', '0123456789', '23/02/2022', '/upload/avatar/images (4).jpg'),
(10, 'abcde', '123456', 'abcd abcd abvcd123', 'sdkjsndkj@gmail.com', '12345678902', '23/12/2021', '/upload/avatar/images (1).jpg'),
(12, 'viethq1', '123123', 'abcd abcd abvcd edit', 'sdkjsndkj@gmail.com', '0123456789', '23/12/2012', '/upload/avatar/tải xuống.jpg'),
(14, 'abcde', '12341234', 'abcd abcd abvcd', '0866080333@gmail.com', '12345678902', '23/12/2021', '/upload/avatar/tải xuống.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

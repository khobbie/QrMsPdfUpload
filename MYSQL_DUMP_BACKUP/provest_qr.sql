-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 11:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provest_qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `qrs`
--

CREATE TABLE `qrs` (
  `id` int(15) NOT NULL,
  `uuid` varchar(200) DEFAULT NULL,
  `fileName` text DEFAULT NULL,
  `fileExtension` varchar(10) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrs`
--

INSERT INTO `qrs` (`id`, `uuid`, `fileName`, `fileExtension`, `content`, `status`, `created_at`, `updated_at`) VALUES
(3, '343156cca7f111ec9a4854ee75bcf4ce', '1647741433.png', 'png', 'http://www.unionsg.com/', 'Submitted', '2022-03-20 01:57:14', '2022-03-20 20:57:00'),
(4, 'c7b42e04a7f111ec9a4854ee75bcf4ce', '1647741679.pdf', 'pdf', 'http://www.unionsg.com/', 'OnProcessing', '2022-03-20 02:01:21', '2022-03-20 21:17:35'),
(5, 'dbac1cdba7f111ec9a4854ee75bcf4ce', '1647741712.pdf', 'pdf', 'http://www.unionsg.com/', 'Processed', '2022-03-20 02:01:55', '2022-03-20 20:28:57'),
(6, 'ff9a5374a7f211ec9a4854ee75bcf4ce', '1647742203.png', 'png', 'http://www.unionsg.com/', 'OnProcessing', '2022-03-20 02:10:04', '2022-03-20 21:17:53'),
(7, 'adb02c3aa7f311ec9a4854ee75bcf4ce', '1647742496.png', 'png', 'http://www.unionsg.com/', 'Processed', '2022-03-20 02:14:56', '2022-03-20 20:44:09'),
(9, 'ec9dba5da7f311ec9a4854ee75bcf4ce', '1647742601.png', 'png', 'http://www.unionsg.com/', 'OnProcessing', '2022-03-20 02:16:42', '2022-03-20 20:44:04'),
(10, '5b168d89a7f411ec9a4854ee75bcf4ce', '1647742786.png', 'png', 'http://www.unionsg.com/', 'Submitted', '2022-03-20 02:19:47', '2022-03-20 20:57:07');

--
-- Triggers `qrs`
--
DELIMITER $$
CREATE TRIGGER `qrs_uuid_generate_trig` BEFORE INSERT ON `qrs` FOR EACH ROW SET new.uuid = replace(uuid(), '-', '')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'TestUser', 'test@qrms.com', 'BD1A264C2A3C003F1FDFDC388B7D8B2829FBA2CF', NULL, '2022-03-19 20:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qrs`
--
ALTER TABLE `qrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qrs`
--
ALTER TABLE `qrs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

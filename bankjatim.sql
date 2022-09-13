-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 05:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankjatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `deleteduser`
--

CREATE TABLE `deleteduser` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deltime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleteduser`
--

INSERT INTO `deleteduser` (`id`, `email`, `deltime`) VALUES
(21, 'ayang@gmail.com', '2022-08-11 14:27:02'),
(22, 'bapak@gmail.com', '2022-08-12 01:40:08'),
(23, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:02:01'),
(24, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:02:32'),
(25, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:02:44'),
(26, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:02:55'),
(27, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:25:29'),
(28, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:27:06'),
(29, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:27:57'),
(30, '2222@gmail', '2022-08-22 16:01:28'),
(31, '2222@gmail', '2022-08-22 16:02:04'),
(32, '4444@gmail', '2022-08-29 02:11:06'),
(33, '4444@gmail', '2022-08-29 02:24:30'),
(34, '3333@gmail', '2022-08-29 04:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedbackdata` varchar(500) NOT NULL,
  `attachment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `unit_kerja` varchar(200) NOT NULL COMMENT '1: planning\r\n2: pmo\r\n3: gov\r\n4: security',
  `name` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `unit_kerja`, `name`, `tanggal`, `user_id`) VALUES
(1, '2', 'Nurlita Ayu Rakhmawati_Bendahara.pdf', '2022-09-12', 21);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notiuser` varchar(50) NOT NULL,
  `notireciver` varchar(50) NOT NULL,
  `notitype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notiuser`, `notireciver`, `notitype`, `time`) VALUES
(18, 'ayu@email.com', 'Admin', 'Create Account', '2022-08-11 11:28:37'),
(19, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:09:52'),
(20, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:10:49'),
(21, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:11:03'),
(22, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:11:23'),
(23, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:12:10'),
(24, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:12:22'),
(25, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:12:47'),
(26, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:12:58'),
(27, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:13:54'),
(28, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:14:04'),
(29, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:14:11'),
(30, 'putreg@gmil.com', 'Admin', 'Create Account', '2022-08-11 12:14:45'),
(31, 'laili@email.com', 'Admin', 'Create Account', '2022-08-11 12:16:41'),
(32, 'ayang@gmail.com', 'Admin', 'Create Account', '2022-08-11 14:12:27'),
(33, 'bapak@gmail.com', 'Admin', 'Create Account', '2022-08-12 01:37:39'),
(34, 'ayang@email.com', 'Admin', 'Create Account', '2022-08-16 08:26:55'),
(35, '1111@gmail', 'Admin', 'Create Account', '2022-08-19 09:58:38'),
(36, '1111@gmail', 'Admin', 'Create Account', '2022-08-19 10:03:24'),
(37, '2222@gmail', 'Admin', 'Create Account', '2022-08-22 14:09:16'),
(38, '2222@gmail', 'Admin', 'Create Account', '2022-08-22 16:19:43'),
(39, '3333@gmail', 'Admin', 'Create Account', '2022-08-29 01:51:47'),
(40, '4444@gmail', 'Admin', 'Create Account', '2022-08-29 02:08:23'),
(41, '3333@gmail', 'Admin', 'Create Account', '2022-08-29 04:05:22'),
(42, '7777@gmail', 'Admin', 'Create Account', '2022-08-29 08:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `baned` enum('n','y') NOT NULL,
  `logintime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `email`, `password`, `role`, `mobile`, `designation`, `image`, `status`, `baned`, `logintime`) VALUES
(20, 31231, 'Nurlita Ayu', 'admin@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', '320930232', 'Lumajang', '38575-ayu.jpg', 1, 'n', 0),
(21, 1212123, 'Putri Regina', 'operator@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Operator', '0832083', 'Bondowoso', 'img_20220328_105234.jpg', 1, 'n', 0),
(22, 1231313, 'Laili Wahyu', 'supervisor@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Supervisor', '12312313', 'Jember', 'laili-jas-resmi.png', 1, 'n', 0),
(24, 65238274, 'Viewer', 'viewer@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Viewer', '081280060', 'Surabaya', 'polije.jpg', 1, 'n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleteduser`
--
ALTER TABLE `deleteduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deleteduser`
--
ALTER TABLE `deleteduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

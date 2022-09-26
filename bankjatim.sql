-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2022 at 04:57 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `frequency_id` int(1) NOT NULL,
  `work_unit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `frequency_id`, `work_unit`) VALUES
(1, 'Laporan Dewan Komisaris', 3, 1),
(2, 'Laporan Progress TI ke Direktur TI', 3, 1),
(3, 'Laporan Transformasi BPD', 3, 1),
(4, 'Laporan KPI Divisi TI', 3, 1),
(5, 'Laporan Realilsasi RBB', 2, 1),
(6, 'Laporan RSTI', 1, 1),
(7, 'doc Fasibility Study', 3, 2),
(8, 'doc RFI', 3, 2),
(9, 'doc TOR', 3, 2),
(10, 'doc ijin prinsip', 3, 2),
(11, 'doc nota pengadaan', 3, 2),
(12, 'doc nota invois', 3, 2),
(13, 'doc SPK (Surat Perintah Kerja)', 3, 2),
(14, 'doc pengembangan', 3, 2),
(15, 'Laporan Triwulan PMO', 2, 2),
(16, 'Laporan Tahunan PMO', 1, 2),
(17, 'document temuan audit', 3, 3),
(18, 'laporan resources assignment', 3, 3),
(19, 'laporan juknis (petunjuk teknis)', 3, 3),
(20, 'laporan SOP (Standart Operating Procedure)', 3, 3),
(21, 'Laporan Triwulan Gov', 2, 3),
(22, 'Laporan Tahunan Gov', 1, 3),
(31, 'Laporan Monitoring Kemanan Informasi Firewall KP', 3, 4),
(32, 'Laporan Monitoring Power User (Log Management System)', 3, 4),
(33, 'Laporan Monitoring User VPN (Forticlient)', 3, 4),
(34, 'Laporan Monitoring User (Log management System)', 3, 4),
(35, 'Laporan Monitoring Antivirus (Kaspersky)', 3, 4),
(36, 'Laporan Monitoring User (Admin Transaksional)', 3, 4),
(37, 'Laporan Triwulan Security', 2, 4),
(38, 'Laporan Tahunan Security', 1, 4);

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
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(1) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `month_id` int(2) DEFAULT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frequencies`
--

CREATE TABLE `frequencies` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frequencies`
--

INSERT INTO `frequencies` (`id`, `name`) VALUES
(1, 'Laporan Tahunan'),
(2, 'Laporan Triwulan'),
(3, 'Laporan Bulanan');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(1) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_frequency` (`frequency_id`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE,
  ADD KEY `files_month_fk` (`month_id`);

--
-- Indexes for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frequencies`
--
ALTER TABLE `frequencies`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_frequency` FOREIGN KEY (`frequency_id`) REFERENCES `frequencies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `files_month_fk` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

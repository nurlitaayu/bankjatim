-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 05:16 AM
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
(1, 'admin', 'admin@admin.com', '0192023a7bbd73250516f069df18b500');

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
(29, '<?php echo htmlentities($result->email);?>', '2022-08-16 03:27:57');

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
(34, 'ayang@email.com', 'Admin', 'Create Account', '2022-08-16 08:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `baned` enum('n','y') NOT NULL,
  `logintime` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `email`, `password`, `role`, `mobile`, `designation`, `image`, `status`, `baned`, `logintime`) VALUES
(20, 31231, 'Nurlita ayu', 'ayu@email.com', '0192023a7bbd73250516f069df18b500', 'Administrator', '320930232', 'eqeq', '38575-ayu.jpg', 1, 'n', 0),
(21, 1212123, 'putri regina', 'putreg@email.com', '0192023a7bbd73250516f069df18b500', 'operator', '0832083', 'eqeq', 'img_20220328_105234.jpg', 1, 'y', 1),
(22, 1231313, 'laili wahyu', 'laili@email.com', '0192023a7bbd73250516f069df18b500', 'Supervisor', '12312313', 'jember', 'laili-jas-resmi.png', 1, 'y', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

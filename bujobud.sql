-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 09:56 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bujobud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(512) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'sahara@gmail.com', '$2y$10$ZQp0g9Uh4.WSeCiYha6rjed3Gtmgn5eSmh25x3./vS9WMyKv.Fosq', '2020-08-15 06:22:25', '2020-08-15 21:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `details`, `user_id`, `created_at`) VALUES
(1, 'Password updated', 2, '2020-08-15 21:12:44'),
(2, 'Task added by user id 2', 2, '2020-08-21 11:09:10'),
(3, 'Password updated', 2, '2020-08-28 18:53:44'),
(4, 'Task updated', 2, '2020-08-28 20:43:04'),
(5, 'Task deleted', 2020, '0000-00-00 00:00:00'),
(6, 'Task deleted', 2020, '0000-00-00 00:00:00'),
(7, 'Task deleted', 2020, '0000-00-00 00:00:00'),
(8, 'Task deleted', 2020, '0000-00-00 00:00:00'),
(9, 'Password Updated', 4, '2020-09-12 09:51:55'),
(10, 'Task added by user id 2', 2, '2020-09-13 17:20:45'),
(11, 'Task added by user id 2', 2, '2020-09-13 17:21:28'),
(12, 'Task added by user id 2', 2, '2020-09-13 17:21:46'),
(13, 'Task added by user id 2', 2, '2020-09-13 17:21:54'),
(14, 'Task added by user id 2', 2, '2020-09-13 17:22:42'),
(15, 'Task added by user id 2', 2, '2020-09-13 17:23:15'),
(16, 'Task added by user id 2', 2, '2020-09-13 17:23:17'),
(17, 'Task added by user id 2', 2, '2020-09-13 17:23:38'),
(18, 'Task added by user id 2', 2, '2020-09-13 17:23:40'),
(19, 'Task added by user id 2', 2, '2020-09-13 17:23:43'),
(20, 'Task added by user id 2', 2, '2020-09-13 17:24:18'),
(21, 'Task added by user id 2', 2, '2020-09-13 17:24:20'),
(22, 'Task added by user id 2', 2, '2020-09-13 17:25:39'),
(23, 'Task added by user id 2', 2, '2020-09-13 17:26:18'),
(24, 'Task added by user id 2', 2, '2020-09-13 17:29:53'),
(25, 'Task added by user id 2', 2, '2020-09-13 17:30:25'),
(26, 'Task added by user id 2', 2, '2020-09-13 17:30:27'),
(27, 'Task added by user id 2', 2, '2020-09-13 17:30:30'),
(28, 'Task added by user id 2', 2, '2020-09-13 17:30:32'),
(29, 'Task added by user id 2', 2, '2020-09-13 17:30:34'),
(30, 'Task added by user id 2', 2, '2020-09-13 17:31:57'),
(31, 'Task added by user id 2', 2, '2020-09-13 17:32:00'),
(32, 'Task added by user id 2', 2, '2020-09-13 17:32:02'),
(33, 'Task added by user id 2', 2, '2020-09-13 17:32:04'),
(34, 'Task added by user id 2', 2, '2020-09-13 17:32:31'),
(35, 'Task added by user id 2', 2, '2020-09-13 17:32:51'),
(36, 'Task added by user id 2', 2, '2020-09-13 17:33:35'),
(37, 'Task added by user id 2', 2, '2020-09-13 17:33:41'),
(38, 'Task added by user id 2', 2, '2020-09-13 17:34:11'),
(39, 'Task added by user id 2', 2, '2020-09-13 17:34:45'),
(40, 'Task added by user id 2', 2, '2020-09-13 17:34:49'),
(41, 'Task added by user id 2', 2, '2020-09-13 17:35:48'),
(42, 'Task added by user id 2', 2, '2020-09-13 17:35:54'),
(43, 'Task added by user id 2', 2, '2020-09-13 17:50:45'),
(44, 'Task added by user id 2', 2, '2020-09-13 17:50:49'),
(45, 'Task added by user id 2', 2, '2020-09-13 17:57:31'),
(46, 'Task added by user id 2', 2, '2020-09-13 18:08:52'),
(47, 'New task added and start on2020-09-09 12:46', 2, '2020-09-13 20:47:12'),
(48, 'New task added and start on2020-09-10 00:48', 2, '2020-09-13 20:48:25'),
(49, 'New task added and start on2020-09-13 00:00', 2, '2020-09-13 20:59:22'),
(50, 'New task added and start on2020-09-14 01:29', 2, '2020-09-13 21:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task` text NOT NULL,
  `details` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Test task', 'Test description Tested', '2020-08-18 00:00:00', '2020-08-24 20:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `profession` varchar(128) DEFAULT NULL,
  `dob` varchar(128) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `bio` text,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `password`, `image`, `profession`, `dob`, `sex`, `bio`, `is_verified`, `token`, `created_at`, `updated_at`) VALUES
(2, 'Sahara Sultana', 'sahara@gmail.com', '01710684220', '$2y$10$UtyB5IZZaIlR.7wP.m5i/OI57NEWcuxDy3wwb/DB5gQ38GE.ARA0K', 'uploads/output-onlinepngtools.png', 'Software Developer', '1986-01-01', 'male', 'What can I say about myself. Hopefully the best will be achieved.', 1, NULL, '2020-08-09 18:17:29', '2020-09-13 08:22:48'),
(3, 'Adil Ibne Sifat', 'shuvashishpaul64@gmail.com', NULL, '$2y$10$8K3D1WOjUU/ypqL4EIG3SeloDNYOPlWWohbZf4FtMejaSj4OmzvqC', 'uploads/output-onlinepngtools (7).png', NULL, NULL, NULL, NULL, 0, 'c715c1ccd97b2a3e4ff66579e2f17444', '2020-09-12 08:37:39', NULL),
(4, 'Adil Ibne Sifat', 'ssn@gmail.com', NULL, '$2y$10$Rpcdr8pUOkD72T5TJGD4UOtlTfBqwgP6Uny.2537QNp5TDO2RHP1a', 'uploads/output-onlinepngtools.png', NULL, NULL, NULL, NULL, 0, 'f5adc8394a68e13acc9d415c2437221d', '2020-09-12 09:16:38', '2020-09-12 09:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `details` text,
  `start_dt` datetime DEFAULT NULL,
  `is_repeat` tinyint(4) NOT NULL DEFAULT '0',
  `repeat_type` varchar(20) DEFAULT NULL,
  `repeat_after` int(11) DEFAULT NULL,
  `end_dt` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`, `details`, `start_dt`, `is_repeat`, `repeat_type`, `repeat_after`, `end_dt`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Test details', '2020-08-22 00:00:00', 0, NULL, NULL, NULL, '2020-08-21 11:09:10', NULL),
(3, 3, 1, 'Test details', '2020-08-22 00:00:00', 0, NULL, NULL, NULL, '2020-08-21 11:11:04', NULL),
(5, 2, 1, 'ABC Test', '2020-08-19 00:00:00', 0, NULL, NULL, NULL, '2020-08-23 17:11:05', NULL),
(6, 2, 1, 'sefdfASdv', '2020-08-12 00:00:00', 0, NULL, NULL, NULL, '2020-08-23 21:57:09', NULL),
(8, 2, 1, 'werwasd', '2020-08-17 00:00:00', 0, NULL, NULL, NULL, '2020-08-23 22:01:45', NULL),
(11, 2, 1, 'hen', '2020-08-10 00:00:00', 0, NULL, NULL, NULL, '2020-08-23 22:29:59', NULL),
(20, 2, 1, 'testfgfd', '2020-08-27 03:03:00', 0, NULL, NULL, NULL, '2020-08-25 20:29:38', '2020-08-28 20:43:04'),
(22, 2, 1, 'TESTSFSDSG', '2020-08-05 06:58:00', 0, NULL, NULL, NULL, '2020-08-25 20:54:31', NULL),
(23, 2, 1, 'TESTSFSDSG', '2020-08-06 06:58:00', 0, NULL, NULL, NULL, '2020-08-25 20:54:31', NULL),
(25, 2, 1, 'Get test', '2020-08-04 17:31:00', 0, NULL, NULL, NULL, '2020-08-25 21:27:19', NULL),
(27, 2, 1, 'Tested', '2020-08-02 16:44:00', 0, NULL, NULL, NULL, '2020-08-25 21:42:10', '2020-08-25 22:06:31'),
(30, 2, 1, 'test', '2020-08-21 01:50:00', 0, NULL, NULL, NULL, '2020-08-25 21:49:23', NULL),
(45, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:29:53', NULL),
(46, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:30:25', NULL),
(47, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:30:27', NULL),
(48, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:30:30', NULL),
(49, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:30:32', NULL),
(50, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:30:34', NULL),
(51, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:31:57', NULL),
(52, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:32:00', NULL),
(53, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:32:02', NULL),
(54, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:32:04', NULL),
(55, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:32:31', NULL),
(56, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:32:51', NULL),
(57, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:33:35', NULL),
(58, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:33:41', NULL),
(59, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:34:11', NULL),
(60, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:34:45', NULL),
(61, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:34:49', NULL),
(62, 1, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:35:48', NULL),
(63, 1, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:35:54', NULL),
(64, 1, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:50:45', NULL),
(65, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:50:49', NULL),
(66, 0, 2, '', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, '2020-09-13 17:57:31', NULL),
(67, 1, 2, 'Test', '2020-09-07 22:11:00', 1, 'daily', 1, '2020-09-22 12:08:00', '2020-09-13 18:08:52', NULL),
(68, 2, 1, 'Needed Task', '2020-09-09 12:46:00', 0, 'weekly', 2, '2020-09-18 00:51:00', '2020-09-13 20:47:12', NULL),
(69, 2, 1, 'Test', '2020-09-10 00:48:00', 0, 'weekly', 3, '2020-09-18 00:51:00', '2020-09-13 20:48:25', NULL),
(70, 2, 1, 'Fernando Torres', '2020-09-13 00:00:00', 0, 'weekly', 2, '2020-09-16 23:02:00', '2020-09-13 20:59:22', NULL),
(71, 2, 1, 'Fernando Torres 9', '2020-09-14 01:29:00', 1, 'daily', 2, '2020-09-17 01:31:00', '2020-09-13 21:28:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
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
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

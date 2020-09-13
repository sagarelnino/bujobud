-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 09:01 PM
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
(8, 'Task deleted', 2020, '0000-00-00 00:00:00');

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
  `token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone`, `password`, `image`, `profession`, `dob`, `sex`, `bio`, `token`, `created_at`, `updated_at`) VALUES
(2, 'Sahara Sultana', 'sahara@gmail.com', '01710684220', '$2y$10$HwjfuqNAPydDQ1oIpt.WdOdAP8oP6urwVeMZsfyUwExhRma098VKq', 'uploads/107766144_2735437629890770_443377130132561580_n.jpg', 'Software Developer', '1986-01-01', 'male', 'What can I say about myself. Hopefully the best will be achieved.', NULL, '2020-08-09 18:17:29', '2020-08-28 18:53:44');

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user_id`, `task_id`, `details`, `start_dt`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Test details', '2020-08-22 00:00:00', '2020-08-21 11:09:10', NULL),
(3, 3, 1, 'Test details', '2020-08-22 00:00:00', '2020-08-21 11:11:04', NULL),
(5, 2, 1, 'ABC Test', '2020-08-19 00:00:00', '2020-08-23 17:11:05', NULL),
(6, 2, 1, 'sefdfASdv', '2020-08-12 00:00:00', '2020-08-23 21:57:09', NULL),
(8, 2, 1, 'werwasd', '2020-08-17 00:00:00', '2020-08-23 22:01:45', NULL),
(11, 2, 1, 'hen', '2020-08-10 00:00:00', '2020-08-23 22:29:59', NULL),
(20, 2, 1, 'testfgfd', '2020-08-27 03:03:00', '2020-08-25 20:29:38', '2020-08-28 20:43:04'),
(22, 2, 1, 'TESTSFSDSG', '2020-08-05 06:58:00', '2020-08-25 20:54:31', NULL),
(23, 2, 1, 'TESTSFSDSG', '2020-08-06 06:58:00', '2020-08-25 20:54:31', NULL),
(25, 2, 1, 'Get test', '2020-08-04 17:31:00', '2020-08-25 21:27:19', NULL),
(27, 2, 1, 'Tested', '2020-08-02 16:44:00', '2020-08-25 21:42:10', '2020-08-25 22:06:31'),
(30, 2, 1, 'test', '2020-08-21 01:50:00', '2020-08-25 21:49:23', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_category`
--

CREATE TABLE `1_category` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1_category`
--

INSERT INTO `1_category` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Staff', 'Stuff for Staff Course 4', '2023-09-12 15:39:54', '2023-09-15 11:30:33', NULL),
(2, 'Supervisor', 'Supervisor of Category E-Learning', '2023-09-15 11:09:30', '2023-09-15 11:09:30', NULL),
(3, 'Test', 'Test', '2023-09-15 11:31:37', '2023-09-15 13:30:56', '2023-09-15 13:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `1_course`
--

CREATE TABLE `1_course` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `status` enum('Available','Pending','Hold','') NOT NULL,
  `content` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1_course`
--

INSERT INTO `1_course` (`id`, `name`, `category_id`, `status`, `content`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tes Psikologi', 0, '', '', 'Tes Psikologi untuk tahap awal recruitment', '2023-09-15 09:22:13', '2023-09-15 09:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1_course_file`
--

CREATE TABLE `1_course_file` (
  `id` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1_course_file`
--

INSERT INTO `1_course_file` (`id`, `id_course`, `photo_path`, `photo_name`, `file_path`, `file_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '', '', '', '', '2023-09-15 09:23:10', '2023-09-15 09:23:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1_quiz`
--

CREATE TABLE `1_quiz` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `correct_answer` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `1_result`
--

CREATE TABLE `1_result` (
  `id` int(11) NOT NULL,
  `course_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_recorded` datetime NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `booking_menu` int(10) DEFAULT NULL,
  `helpdesk_menu` int(10) DEFAULT NULL,
  `iso_menu` int(10) DEFAULT NULL,
  `ehs_menu` int(11) DEFAULT NULL,
  `assets_menu` int(11) DEFAULT NULL,
  `dash_a` int(11) DEFAULT NULL,
  `dash_b` int(11) DEFAULT NULL,
  `dash_c` int(11) DEFAULT NULL,
  `dash_d` int(11) DEFAULT NULL,
  `earsip` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `user_id`, `booking_menu`, `helpdesk_menu`, `iso_menu`, `ehs_menu`, `assets_menu`, `dash_a`, `dash_b`, `dash_c`, `dash_d`, `earsip`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, '2023-08-28 14:39:47', NULL),
(2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 16:31:11', NULL),
(3, 5, 1, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-11 16:41:08', NULL),
(4, 8, 1, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-27 15:13:30', NULL),
(5, 9, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-07 15:13:45', NULL),
(6, 10, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 15:45:43', NULL),
(7, 11, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 15:49:22', NULL),
(8, 12, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:09:03', NULL),
(9, 13, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:09:04', NULL),
(10, 14, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:09:04', NULL),
(11, 15, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:49:53', NULL),
(12, 16, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:52:11', NULL),
(13, 17, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-08 16:53:45', NULL),
(14, 18, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 08:41:33', NULL),
(15, 19, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 09:42:24', NULL),
(16, 20, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 09:55:33', NULL),
(17, 21, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 09:56:02', NULL),
(18, 22, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 09:56:39', NULL),
(19, 23, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:00:17', NULL),
(20, 24, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:03:36', NULL),
(21, 25, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:51:37', NULL),
(22, 26, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:52:29', NULL),
(23, 27, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:53:30', NULL),
(24, 28, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:55:45', NULL),
(25, 29, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 10:57:38', NULL),
(26, 30, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 11:08:18', NULL),
(27, 31, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 14:30:17', NULL),
(28, 32, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 14:30:44', NULL),
(29, 33, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 14:30:56', NULL),
(30, 34, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 14:30:56', NULL),
(31, 35, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 14:30:59', NULL),
(32, 36, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 15:30:03', NULL),
(33, 37, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 15:30:37', NULL),
(34, 38, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-09 15:30:42', NULL),
(35, 39, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-17 09:30:27', NULL),
(36, 40, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-17 09:30:28', NULL),
(37, 41, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-17 10:30:37', NULL),
(38, 42, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:18', NULL),
(39, 43, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:21', NULL),
(40, 44, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:25', NULL),
(41, 45, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:31', NULL),
(42, 46, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:39', NULL),
(43, 50, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-10 10:30:58', NULL),
(44, 54, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '2023-07-18 14:30:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `last_update` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `active_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name`, `email`, `password`, `level`, `dept_id`, `last_update`, `created_at`, `deleted_at`, `active_at`) VALUES
(2, 'Prayoga', 'prayoga5070@gmail.com', '$2y$05$LPxEyV5b9m8J2ilrvaBh.uJ61Gorhw.b.figSUpmF5.vMM9ZlGCH2', 1, 8, '2023-08-18 14:15:28', '2022-10-27 16:26:49', NULL, '2022-10-27 16:38:27'),
(3, 'Mirza Soenarto', 'mirza@mitrakiaraindonesia.com', '$2y$05$CtodNQZgwSnnQhE8HGdXPuQN0SgALPRHX4V4aB4cfAc5ofqBSRgm6', 1, 0, '2022-12-09 04:01:56', '2022-12-09 04:01:56', NULL, '2022-12-09 04:01:56'),
(4, 'Sungkono', 'sungkono@mitrakiaraindonesia.com', '$2y$05$CtodNQZgwSnnQhE8HGdXPuQN0SgALPRHX4V4aB4cfAc5ofqBSRgm6', 1, 3, '2023-08-18 14:47:53', '2022-12-09 04:01:56', NULL, '2022-12-09 04:01:56'),
(5, 'admin 2', 'pkmnmaniak@gmail.com', '$2y$05$ZrQNZKIv15fVUCyeUhTo2elvDhS6A/GaLdb76vzPgDV94XeNn2MA2', 3, 0, '2022-12-12 09:08:24', '2022-12-12 09:08:24', NULL, '2022-12-12 09:08:24'),
(15, 'novan', 'novan@mitrakiaraindonesia.com', '$2y$05$n4h8qrrx1qjf7MnHQ/f7sOuvbx/ZqG.nglmXmSqsirBAc/bH7/XTK', 2, 0, '2023-06-22 11:28:48', '2023-06-22 11:28:48', NULL, '2023-06-22 11:28:48'),
(16, 'Andi', 'andi@mitrakiaraindonesia.com', '$2y$05$eL80e9MVoNk/rdmqY1syM.V61xFtlFM6G3XDDqKinRSFhceHS3GdW', 2, 0, '2023-06-22 11:28:48', '2023-06-22 11:28:48', NULL, '2023-06-22 11:28:48'),
(48, 'agoy', 'agoy@mitrakiaraindonesia.com', '$2y$05$VDcJkt5EMjIltFpx7HEtkuNcfJCmMPgrbdKcJRiYR1y62a5mYCqsi', 3, 0, '2023-05-23 11:20:36', '2023-05-23 11:20:36', NULL, '2023-05-23 11:20:36'),
(49, 'agoy', 'agoy1@mitrakiaraindonesia.com', '$2y$05$pxTfRm41pY/PmCSUUXAQHO87n1mabUxdMXU.EXXh.2hNlRx92ROLG', 3, 0, '2023-05-23 11:47:54', '2023-05-23 11:47:54', NULL, '2023-05-23 11:47:54'),
(50, 'coba', 'coba@mitrakiaraindonesia.com', '$2y$05$.72UCPmnDiOf8oCrd5AAyOrSCTsuOzYk2FCNh.TAoTMhRxl3JjdKu', 3, 0, '2023-05-31 09:35:56', '2023-05-31 09:35:56', NULL, '2023-05-31 09:35:56'),
(51, 'coba1', 'coba1@mitrakiaraindonesia.com', '$2y$05$QKst1GbiGnMrEtRXUDoMnek7djpjgkf.LY/ytqKaet5oMnG3ZcFAa', 3, 0, '2023-06-08 11:27:11', '2023-06-08 11:27:11', NULL, '2023-06-08 11:27:11'),
(54, 'asd', '123777@mitrakiaraindonesia.com', '$2y$05$qNbsmlY9fPKuHuBm7LI1/.7CxZAzQR6BfzRlWRyGslcBQ25LdE9VS', 3, 0, '2023-07-18 14:29:52', '2023-07-18 14:29:52', NULL, '2023-07-18 14:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `name`, `description`, `url`, `image`, `created_at`, `edited_at`, `deleted_at`, `user_id`) VALUES
(1, 'image', '-', 'assets/images/uploads/slider/', 'slider-1.jpeg', '2023-02-17 08:30:50', '2023-02-17 08:30:50', NULL, 0),
(2, 'image', '-', 'assets/images/uploads/slider/', 'slider-2.jpeg', '2023-02-17 08:30:50', '2023-02-17 08:30:50', NULL, 8),
(3, 'image', '-', 'assets/images/uploads/slider/', 'slider-3.jpeg', '2023-02-17 08:32:56', '2023-02-17 08:32:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Supply Chain Management', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(2, 'Technical & Spesification', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(3, 'HR & GA', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(4, 'Marketing ', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(5, 'Finance ', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(6, 'Accounting ', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(7, 'Procurement', '2023-08-18 04:30:28', '2023-08-18 04:30:28'),
(8, 'IT', '2023-08-18 09:14:40', '2023-08-18 09:14:40'),
(9, 'R&D', '2023-09-01 06:10:50', '2023-09-01 06:10:50'),
(10, 'QC', '2023-09-01 06:11:12', '2023-09-01 06:11:12'),
(11, 'Sales', '2023-09-01 09:15:45', '2023-09-01 09:15:45'),
(12, 'Production', '2023-09-01 09:16:37', '2023-09-01 09:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `nolog_content`
--

CREATE TABLE `nolog_content` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `edited_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verif`
--

CREATE TABLE `verif` (
  `id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `verif` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `expired_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verif`
--

INSERT INTO `verif` (`id`, `user_id`, `verif`, `created_at`, `expired_at`) VALUES
(21, 30, 6324, '2023-03-09 11:08:18', '0000-00-00 00:00:00'),
(22, 31, 5783, '2023-03-09 14:17:58', '2023-03-09 14:17:30'),
(23, 32, 813, '2023-03-09 14:44:25', '0000-00-00 00:00:00'),
(24, 33, 7390, '2023-03-09 14:56:01', '0000-00-00 00:00:00'),
(25, 34, 8650, '2023-03-09 14:56:55', '2023-03-09 14:56:30'),
(26, 35, 2961, '2023-03-09 14:59:42', '2023-03-09 14:59:30'),
(27, 36, 7942, '2023-03-09 15:03:20', '2023-03-09 15:03:30'),
(28, 37, 4758, '2023-03-09 15:37:53', '2023-03-09 15:37:30'),
(29, 38, 3576, '2023-03-09 15:42:17', '0000-00-00 00:00:00'),
(30, 39, 6943, '2023-03-17 09:27:02', '2023-03-17 09:27:30'),
(31, 40, 4678, '2023-03-17 09:28:33', '2023-03-17 09:28:30'),
(32, 41, 1597, '2023-03-17 10:37:20', '0000-00-00 00:00:00'),
(33, 42, 1689, '2023-04-10 10:18:19', '2023-04-10 10:18:30'),
(34, 43, 2596, '2023-04-10 10:21:10', '2023-04-10 10:21:30'),
(35, 44, 4308, '2023-04-10 10:25:14', '2023-04-10 10:25:30'),
(36, 45, 4967, '2023-04-10 10:31:19', '2023-04-10 10:31:30'),
(37, 46, 8913, '2023-04-10 10:39:20', '2023-04-10 10:39:30'),
(38, 47, 5189, '2023-04-10 10:58:29', '2023-04-10 10:58:30'),
(39, 54, 2657, '2023-07-18 14:29:53', '2023-07-18 14:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1_category`
--
ALTER TABLE `1_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1_course`
--
ALTER TABLE `1_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1_course_file`
--
ALTER TABLE `1_course_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1_quiz`
--
ALTER TABLE `1_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1_result`
--
ALTER TABLE `1_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nolog_content`
--
ALTER TABLE `nolog_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verif`
--
ALTER TABLE `verif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1_category`
--
ALTER TABLE `1_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `1_course`
--
ALTER TABLE `1_course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `1_course_file`
--
ALTER TABLE `1_course_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `1_quiz`
--
ALTER TABLE `1_quiz`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `1_result`
--
ALTER TABLE `1_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nolog_content`
--
ALTER TABLE `nolog_content`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verif`
--
ALTER TABLE `verif`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

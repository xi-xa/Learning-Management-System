-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 01:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asac`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `course_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_code`) VALUES
(1, 'General Academic', 'test', 'GA'),
(9, 'Humanities and Social Sciences', 'test', 'HUMSS'),
(10, 'Science, Technology, Engineering and Mathematics', 'test', 'STEM'),
(11, 'Accountancy, Business and Management', 'test', 'ABM'),
(12, 'Technical-Vocational-Livelihood', 'test', 'TVL'),
(14, 'dada', 'dadadad', 'adada'),
(15, 'wdasda', 'dada', 'wadsas'),
(23, 'Test', 'lang ', 'po');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `request_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`id`, `email`, `request_time`, `status`) VALUES
(1, 'alexis.viloria23@gmail.com', '2024-08-23 12:02:08', 'pending'),
(2, 'alexis.viloria23@gmail.com', '2024-08-23 12:07:05', 'pending'),
(3, 'jimuelmontillana1234@gmail.com', '2024-08-23 12:09:34', 'pending'),
(4, 'siezydtz@gmail.com', '2024-08-23 13:21:52', 'pending'),
(5, 'alexis.viloria23@gmail.com', '2024-08-24 09:42:49', 'pending'),
(6, 'jimuelmontillana1234@gmail.com', '2024-08-24 20:21:53', 'pending'),
(7, 'jimuelmontillana1234@gmail.com', '2024-08-24 20:28:46', 'pending'),
(8, 'alexis.viloria23@gmail.com', '2024-08-25 21:40:34', 'pending'),
(9, 'alexis.viloria23@gmail.com', '2024-08-25 21:58:14', 'pending'),
(10, 'alexis.viloria23@gmail.com', '2024-08-25 22:06:44', 'pending'),
(11, 'alexis.viloria23@gmail.com', '2024-08-25 22:10:13', 'pending'),
(12, 'alexis.viloria23@gmail.com', '2024-08-25 22:20:41', 'pending'),
(13, 'alexis.viloria23@gmail.com', '2024-08-25 22:20:59', 'pending'),
(14, 'alexis.viloria23@gmail.com', '2024-08-25 22:25:02', 'pending'),
(15, 'alexis.viloria23@gmail.com', '2024-08-25 22:32:10', 'pending'),
(16, 'alexis.viloria23@gmail.com', '2024-08-25 22:32:10', 'pending'),
(17, 'alexis.viloria23@gmail.com', '2024-08-25 22:37:47', 'pending'),
(18, 'alexis.viloria23@gmail.com', '2024-08-26 08:56:08', 'pending'),
(19, 'alexis.viloria23@gmail.com', '2024-08-26 08:57:21', 'pending'),
(20, 'alexis.viloria23@gmail.com', '2024-08-26 09:14:12', 'pending'),
(21, 'alexis.viloria23@gmail.com', '2024-08-26 09:19:44', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Aid` int(11) NOT NULL,
  `Admin_ID` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `last_failed_attempt` datetime DEFAULT NULL,
  `lockout_until` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Aid`, `Admin_ID`, `fname`, `mname`, `lname`, `phone`, `email`, `username`, `password`, `Role`, `failed_attempts`, `last_failed_attempt`, `lockout_until`) VALUES
(1, '112233', 'Alexis', 'F.', 'Viloria', 0, 'alexis.viloria23@gmail.com', 'alexis23', '$2y$10$0sL6L9ZM8QZPh8sQkiEZ.e0NIMYUDjY7dyDDgqOcWkSv9V3mD6V/e', 'Admin', 3, '0000-00-00 00:00:00', '2025-09-03 06:46:32'),
(2, '54321', 'Jimuel', 'I', 'Montillana', 0, 'jimuelmontillana1234@gmail.com', 'jimmon', 'ASAC', 'Admin', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

CREATE TABLE `tbl_announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `announcement_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`id`, `title`, `description`, `announcement_date`, `created_at`) VALUES
(1, 'new', 'walang pasok', '2024-09-09', '2024-09-08 09:04:38'),
(4, '2', 'new', '2024-10-09', '2024-09-08 11:02:37'),
(5, '2', 'new', '2024-10-09', '2024-09-08 11:02:39'),
(6, '2', 'new', '2024-10-09', '2024-09-08 11:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gradelevel`
--

CREATE TABLE `tbl_gradelevel` (
  `gradeID` int(11) NOT NULL,
  `grade_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gradelevel`
--

INSERT INTO `tbl_gradelevel` (`gradeID`, `grade_level`) VALUES
(6, 'Grade 9'),
(7, 'grade 9'),
(8, 'grade 7'),
(16, 'Grade 11'),
(17, 'Grade 8'),
(18, 'Grade 10'),
(19, 'Grade 12'),
(20, 'Grade 7'),
(21, 'Grade 7'),
(22, 'Grade 7'),
(30, 'dadadadad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_reset`
--

CREATE TABLE `tbl_password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expire_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_password_reset`
--

INSERT INTO `tbl_password_reset` (`id`, `email`, `token`, `expire_time`) VALUES
(1, 'alexis.viloria23@gmail.com', 'eb40b76ca2f2fe90cc161456fcf235d717468849349d44f609b0321dfc5c03ed', '2024-08-23 07:02:08'),
(2, 'alexis.viloria23@gmail.com', '227008de62e787bf9bfc8ac535d29731f59fe6cf5ab76e27360b68b5f42628e3', '2024-08-23 07:07:05'),
(3, 'jimuelmontillana1234@gmail.com', '92e117365264dd0f827c1a76b0a3b362c8f204ec601ff26d0259d88d8e12f2b3', '2024-08-23 07:09:34'),
(4, 'siezydtz@gmail.com', '93e2a9dc7d2f07452c5e466c120eeaaffcae2d8184f10e11bbc84b78b81738ba', '2024-08-23 08:21:52'),
(5, 'alexis.viloria23@gmail.com', 'cf4c4f96ee304bba2e880c1c172981aa5455f557e074904f01912dc32fd31258', '2024-08-24 04:42:49'),
(6, 'jimuelmontillana1234@gmail.com', '1fba6dfa84287b69a357eecaaf627a44f3756cd3205f7ba883d3e408ccdf9d6c', '2024-08-24 15:21:53'),
(7, 'jimuelmontillana1234@gmail.com', '77748241b96a1754af8b532eb7285d0aa3980adaed0cb35aece89bed0ddf3e0d', '2024-08-24 15:28:46'),
(8, 'alexis.viloria23@gmail.com', '4b9c328a793e8664339c27afc72de8d12c7b94633dc64287c734564d2b9a9f59', '2024-08-25 16:40:34'),
(9, 'alexis.viloria23@gmail.com', '03d41ff47d225c5d11542d41462f06787f30ce9daa9729718154e8c392685588', '2024-08-25 16:58:14'),
(10, 'alexis.viloria23@gmail.com', 'd984feee1d0908c8384f078fd8d2f2f232e84a25a3c69634840c8c033a75da42', '2024-08-25 15:06:44'),
(11, 'alexis.viloria23@gmail.com', '2314903686e92d6709728922cd244aa0f16b841ed4a79ce7bfdc68d367f5645c', '2024-08-25 15:10:13'),
(12, 'alexis.viloria23@gmail.com', '942206af54cf17a695d13af27cc0a6618095365bcbf8d9b0efa8512674c37c71', '2024-08-25 15:16:50'),
(13, 'alexis.viloria23@gmail.com', 'f6159580c69ba25faa8ecf9451f783c52473561eadfc43d205c7fca72d075c69', '2024-08-25 15:17:15'),
(14, 'alexis.viloria23@gmail.com', '6ffad6b2dfbdefcd2bcbc5501baa1aec0824bb18b41b2ace2ff6dd8f83e82b1f', '2024-08-25 15:20:41'),
(15, 'alexis.viloria23@gmail.com', '633c72ca4b2dcb2eed6dd506d1c058bf680f085776f023f7c9f3ee0dc381c362', '2024-08-25 15:20:59'),
(16, 'alexis.viloria23@gmail.com', '1c869677657d4ffc4a251ad10e8a1a8e8ea1b4ab9fc576a6a64f0b797d38942b', '2024-08-25 15:25:02'),
(17, 'alexis.viloria23@gmail.com', '4c5d93ad33f6b768dbdf8d5c07361413aa8e93c811dbb093b89662eed8705d3a', '2024-08-25 15:32:10'),
(18, 'alexis.viloria23@gmail.com', '2b0682f172c61898c61171661aa5dbfa3ee31a3ca22ec402f978ec0fef721421', '2024-08-25 15:32:10'),
(19, 'alexis.viloria23@gmail.com', 'ca51d39d261fc4dea37264e0b54cf4c6b323992f166bc7dadb969b945e7e2e67', '2024-08-25 15:37:47'),
(20, 'alexis.viloria23@gmail.com', '9702e324b75fbaeb4cabe1fa03221a6ef906731e45e41d6dbc828c65001f6582', '2024-08-26 01:56:08'),
(21, 'alexis.viloria23@gmail.com', '51f42ccd45d18587cde6384f528b5fadc0661b2ba94eca397972e3cbb34e9e77', '2024-08-26 01:57:21'),
(22, 'alexis.viloria23@gmail.com', 'eba70c667b1832f5c90a96cfc164341f96cf33312a5be71d4d71e12d3e85bf31', '2024-08-26 02:14:12'),
(23, 'alexis.viloria23@gmail.com', '5031c25b3b52817d998e6ff7c66439232f3c320f7c4f2f00bceb94deca85d0cf', '2024-08-26 02:19:44'),
(24, 'alexis.viloria23@gmail.com', '25ffaafcaa0e9bd7b9d53effada9807844e64d868cc60fc41443a37ebefa1ac5', '2024-08-26 02:36:31'),
(27, 'alexis.viloria23@gmail.com', '67ab212e4da8d51f22ef96b01b029a78f385665ba4b6f312934e33d4fc44b428', '2024-08-29 07:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `secID` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `section_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`secID`, `section`, `section_code`) VALUES
(6, 'Flow', 'test5'),
(7, 'Daisy', 'test2'),
(8, 'Lily', 'test3'),
(16, 'Try', '12345'),
(17, 'heh', 'hehe'),
(18, 'test', '1234'),
(19, 'Sakura', 'test'),
(20, 'Merry', 'Christmas'),
(21, 'Happy ', 'New Year'),
(22, 'Happy', 'Birthday'),
(23, 'test', 'testtest'),
(24, 'dsad', 'adadad'),
(26, 'dadada', 'dadadadada'),
(27, 'dada', 'adada'),
(29, 'dad', 'adadadad'),
(30, 'dadaddadad', 'adadadad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gradelevel`
--
ALTER TABLE `tbl_gradelevel`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`secID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_announcements`
--
ALTER TABLE `tbl_announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gradelevel`
--
ALTER TABLE `tbl_gradelevel`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `secID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2026 at 09:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halloween_it_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitor_logs`
--

CREATE TABLE `visitor_logs` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(20) NOT NULL,
  `visitor_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `curse_assigned` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_logs`
--

INSERT INTO `visitor_logs` (`id`, `ticket_number`, `visitor_name`, `department`, `curse_assigned`, `photo`, `timestamp`) VALUES
(1, '666-3496', 'Josh', 'Accounting', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:03:01'),
(2, '666-7655', 'Jhhh', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:08:50'),
(3, '666-2470', 'Jo', 'Accounting', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:09:11'),
(4, '666-8150', 'asd', 'HR', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 10:09:44'),
(5, '666-6183', 'sample', 'Accounting', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:12:17'),
(6, '666-6199', 'Sample', 'Operations', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 10:13:57'),
(7, '666-8571', 'sampe', 'Accounting', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:14:14'),
(8, '666-9849', 'samppl', 'Accounting', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 10:16:28'),
(9, '666-8218', 'ddd', 'Operations', 'NOTICE: Keyboard key \'Esc\' disabled for your soul.', NULL, '2026-10-22 10:17:12'),
(10, '666-2925', 'as', 'Accounting', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 10:22:04'),
(11, '666-1980', 'sa', 'Accounting', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 10:22:13'),
(12, '666-7742', 'asd', 'Accounting', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:22:24'),
(13, '666-6125', 'asd', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:22:33'),
(14, '666-8064', 'sdff', 'Accounting', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:22:58'),
(15, '666-3294', 'asdasd', 'Accounting', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 10:23:07'),
(16, '666-8009', 'asd', 'Accounting', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:23:17'),
(17, '666-2128', 'asd', 'Accounting', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 10:27:38'),
(18, '666-8339', 'asd', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:32:31'),
(19, '666-6536', 'asd', 'Accounting', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:32:40'),
(20, '666-7282', 'asd', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:34:04'),
(21, '666-4881', 'asd', 'HR', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 10:34:21'),
(22, '666-6525', '123', 'HR', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:35:21'),
(23, '666-3828', 'asd', 'HR', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 10:35:37'),
(24, '666-9045', 'as', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:35:54'),
(25, '666-1131', 'asd', 'HR', 'NOTICE: Keyboard key \'Esc\' disabled for your soul.', NULL, '2026-10-22 10:36:01'),
(26, '666-9258', 'asd', 'HR', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:36:16'),
(27, '666-7776', 'asd', 'HR', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 10:36:25'),
(28, '666-8124', 'ty', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 10:38:45'),
(29, '666-9570', 'asd', 'HR', '403 Forbidden: Soul file corrupted in server room.', NULL, '2026-10-22 10:42:35'),
(30, '666-1559', 'asd', 'HR', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 11:00:49'),
(31, '666-3283', '123', 'Accounting', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 11:06:20'),
(32, '666-5880', 'asd', 'HR', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 11:07:29'),
(33, '666-3763', 'asd', 'Accounting', 'WARNING: Unexpected entity detected behind you.', NULL, '2026-10-22 11:12:42'),
(34, '666-3755', 'asd', 'Accounting', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 11:12:58'),
(35, '666-8416', '123', 'ITD', 'STATUS: System trapped your shadow in MySQL database.', NULL, '2026-10-22 11:36:10'),
(36, '666-1486', 'asd', 'IAD', 'NOTICE: Keyboard key \'Esc\' disabled for your soul.', NULL, '2026-10-22 11:42:22'),
(37, '666-5032', 'asd', 'LD', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 11:42:59'),
(38, '666-8664', 'asd', 'BSD', 'ERROR 666: Soul file corrupted in server room.', NULL, '2026-10-22 11:43:27'),
(39, '666-7189', 'asd', 'Guest', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 11:43:59'),
(40, '666-5210', 'asd', 'HRD', 'TICKET ASSIGNED TO: Ghost in the Closet.', NULL, '2026-10-22 11:44:18'),
(41, '666-6186', 'asd', 'CMG', 'NOTICE: Hinahanap ka na ng Barangay Captain sa baba.', NULL, '2026-10-23 10:16:27'),
(42, '666-8187', 'asd', 'ITD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-23 10:20:39'),
(43, '666-8494', 'asd', 'ITD', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-23 10:23:46'),
(44, '666-9631', 'asd', 'HRD', 'Error 403: Pumasok na ang Credit Card Due Date mo.', NULL, '2026-10-23 11:55:46'),
(45, '666-6919', 'qwe', 'IAD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-23 11:56:35'),
(46, '666-9731', 'asd', 'IAD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-23 11:57:55'),
(47, '666-5425', 'asd', 'ASG', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-23 12:03:18'),
(48, '666-6875', 'csc', 'ITD', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-23 12:26:53'),
(49, '666-6727', 'asd', 'ITD', 'TICKET ASSIGNED TO: the President.', NULL, '2026-10-23 12:27:39'),
(50, '666-9119', 'asd', 'ASG', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:12:26'),
(51, '666-2688', 'asd', 'BSD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:12:59'),
(52, '666-8107', 'asd', 'LD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:13:42'),
(53, '666-3145', 'asdasd', 'Guest', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:15:30'),
(54, '666-7470', 'asdasd', 'BSD', 'Error 403: Pumasok na ang Credit Card Due Date mo.', NULL, '2026-10-26 09:15:52'),
(55, '666-6432', 'asd', 'RCD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:22:58'),
(56, '666-6934', 'qwwweeqw', 'RCD', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:23:16'),
(57, '666-1564', 'qweqwe', 'HRD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:23:36'),
(58, '666-4805', 'asd', 'Guest', 'Error 403: Pumasok na ang Credit Card Due Date mo.', NULL, '2026-10-26 09:24:09'),
(59, '666-9951', 'asd', 'IAD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:24:30'),
(60, '666-2830', 'asd', 'LD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:25:09'),
(61, '666-5289', 'asd', 'IAD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:25:31'),
(62, '666-1969', 'asd', 'RCD', 'Error 403: Pumasok na ang Credit Card Due Date mo.', NULL, '2026-10-26 09:29:38'),
(63, '666-6582', 'asd', 'RCD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:29:54'),
(64, '666-6513', 'asd', 'Guest', 'NOTICE: Hinahanap ka na ng Barangay Captain sa baba.', NULL, '2026-10-26 09:35:20'),
(65, '666-1078', 'asd', 'IAD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:35:39'),
(66, '666-4915', 'asd', 'RCD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:39:32'),
(67, '666-6893', 'asdasd', 'CMG', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:40:00'),
(68, '666-2992', 'adsad', 'ASG', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:40:27'),
(69, '666-5248', 'asdasd', 'IAD', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:50:49'),
(70, '666-3782', 'asd', 'IAD', 'NOTICE: Hinahanap ka na ng Barangay Captain sa baba.', NULL, '2026-10-26 09:51:26'),
(71, '666-1225', 'asd', 'LD', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:51:57'),
(72, '666-5357', 'asdasd', 'ASG', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:53:22'),
(73, '666-2201', 'asd', 'AFG', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:53:39'),
(74, '666-9078', 'asd', 'CMG', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:53:55'),
(75, '666-1685', 'asd', 'AFG', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:54:12'),
(76, '666-5125', 'asd', 'ITD', 'SYSTEM WARNING: Nag-chat ang Ex mo ng \'Musta? Can we talk?\'', NULL, '2026-10-26 09:54:28'),
(77, '666-7556', 'asd', 'AFG', 'WARNING: Electricity Bill for this month has arrived.', NULL, '2026-10-26 09:54:44'),
(78, '666-1401', 'asd', 'ASG', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:55:16'),
(79, '666-1362', 'asd', 'LD', 'NOTICE: Hinahanap ka na ng Barangay Captain sa baba.', NULL, '2026-10-26 09:55:45'),
(80, '666-1368', 'asd', 'ITD', '404 Not Found: Nakabili ka na ba ng balde?.', NULL, '2026-10-26 09:56:12'),
(81, '666-7821', 'asd', 'HRD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-26 10:00:07'),
(82, '666-7905', 'asd', 'CMG', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 10:00:27'),
(83, '666-6119', 'asd', 'ASG', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-26 10:04:35'),
(84, '666-4164', 'asd', 'RCD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 10:18:06'),
(85, '666-8566', 'asd', 'IAD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-26 10:18:28'),
(86, '666-2321', 'asd', 'CMG', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 10:18:49'),
(87, '666-5637', 'asdd', 'BSD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 10:19:10'),
(88, '666-7913', 'asd', 'ASG', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-26 10:20:25'),
(89, '666-1330', 'asd', 'HRD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 10:21:53'),
(90, '666-4214', 'asdasd', 'ITD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-26 10:23:52'),
(91, '666-9815', 'asd', 'AFG', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-26 11:22:39'),
(92, '666-6446', 'asdasd', 'ITD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-27 15:04:34'),
(93, '666-7712', 'asdsad', 'ITD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-27 15:05:20'),
(94, '666-2778', 'asd', 'BSD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', NULL, '2026-10-27 15:06:35'),
(95, '666-6787', 'asd', 'ITD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', NULL, '2026-10-27 15:30:41'),
(96, '666-4047', 'asd', 'ASG', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', '', '2026-10-27 15:37:27'),
(97, '666-7720', 'asd', 'BSD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', '', '2026-10-27 15:38:19'),
(98, '666-9897', 'asd', 'BSD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', '', '2026-10-27 15:45:23'),
(99, '666-2616', 'asd', 'Guest', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', '', '2026-10-27 15:45:55'),
(100, '666-8516', 'sdf', 'AFG', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', '', '2026-10-27 15:46:20'),
(101, '666-4858', 'asd', 'IAD', '🍬 SWEET WARNING: Don\'t forget to share your treats with friends!', '', '2026-10-27 15:50:47'),
(102, '666-6338', 'asd', 'ITD', '🍬 SWEET WARNING: Claim your sweet Halloween candies now!', '', '2026-10-27 15:53:57'),
(103, '666-4414', 'asd', 'ITD', '🍬 REWARD: 3 pcs of Special Chocolate Bar & 2 Chupa Chups!', 'visitor_1793087785_561.jpg', '2026-10-27 15:55:58'),
(104, '666-7568', 'asd', 'BSD', '🍫 REWARD: 5 pcs of Mixed Candies & 1 Big Milky Lollipop!', 'visitor_1793087838_688.jpg', '2026-10-27 15:57:09'),
(105, '666-7704', 'asdsad', 'ITD', '🍭 REWARD: 2 pcs of Gummy Worms & 1 Pack of Marshmallows!', NULL, '2026-10-27 15:58:27'),
(106, '666-3732', 'qwe', 'ITD', '🍫 REWARD: 5 pcs of Mixed Candies & 1 Big Milky Lollipop!', 'visitor_1793087979_403.jpg', '2026-10-27 15:58:53'),
(107, '666-1347', 'asd', 'ITD', '🍬 REWARD: 4 pcs of Fruit Candies & 2 Chocolate Eyeballs!', NULL, '2026-10-27 16:26:31'),
(108, '666-7734', 'asd', 'ITD', '🍬 REWARD: 4 pcs of Fruit Candies & 2 Chocolate Eyeballs!', NULL, '2026-10-27 16:39:45'),
(109, '666-7910', 'asdsad', 'ITD', '🍬 REWARD: 4 pcs of Fruit Candies & 2 Chocolate Eyeballs!', NULL, '2026-10-27 16:55:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitor_logs`
--
ALTER TABLE `visitor_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

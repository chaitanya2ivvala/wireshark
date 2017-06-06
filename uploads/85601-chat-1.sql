-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 12:05 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user1`, `user2`) VALUES
(1, 6, 2),
(2, 6, 3),
(3, 6, 8),
(4, 2, 3),
(5, 2, 8),
(6, 6, 9),
(7, 9, 3),
(8, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciver` int(11) NOT NULL,
  `chatid` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `reciver`, `chatid`, `ip`, `time`, `message`) VALUES
(1, 6, 2, 1, '::1', '2017-05-17 14:56:54.000000', 'chaitu'),
(2, 6, 3, 2, '::1', '2017-05-17 14:57:25.000000', 'chaitu'),
(3, 6, 3, 2, '::1', '2017-05-17 15:04:46.000000', 'hi'),
(4, 2, 6, 1, '::1', '2017-05-17 15:08:30.000000', 'hi'),
(5, 6, 2, 1, '::1', '2017-05-17 15:29:33.000000', 'how are you'),
(6, 6, 2, 1, '::1', '2017-05-17 20:28:20.000000', 'fine'),
(7, 2, 6, 1, '::1', '2017-05-17 20:29:00.000000', 'nice'),
(8, 6, 2, 1, '::1', '2017-05-17 20:29:11.000000', 'cool'),
(9, 2, 6, 1, '::1', '2017-05-17 20:29:19.000000', 'wow'),
(10, 6, 2, 1, '::1', '2017-05-17 20:29:51.000000', 'whay'),
(11, 6, 2, 1, '::1', '2017-05-17 20:29:56.000000', 'sd'),
(12, 6, 2, 1, '::1', '2017-05-18 13:02:27.000000', 'hi'),
(13, 6, 2, 1, '::1', '2017-05-18 13:20:24.000000', 'tak'),
(14, 6, 2, 1, '::1', '2017-05-20 12:15:32.000000', 'hi'),
(15, 6, 9, 6, '::1', '2017-05-20 12:28:58.000000', 'hi'),
(16, 6, 9, 6, '::1', '2017-05-20 12:29:12.000000', 'chaitu'),
(17, 6, 9, 6, '::1', '2017-05-20 12:31:08.000000', 'chaitanya'),
(18, 6, 9, 6, '::1', '2017-05-20 12:36:19.000000', 'hi'),
(19, 6, 9, 6, '::1', '2017-05-20 12:37:24.000000', 'hi'),
(20, 6, 9, 6, '::1', '2017-05-20 12:38:06.000000', 'chaitu'),
(21, 6, 9, 6, '::1', '2017-05-20 12:43:00.000000', 'hi'),
(22, 6, 9, 6, '::1', '2017-05-20 12:50:44.000000', 'hi'),
(23, 6, 9, 6, '::1', '2017-05-20 12:53:31.000000', 'chaitu'),
(24, 6, 9, 6, '::1', '2017-05-20 12:54:15.000000', 'hi'),
(25, 6, 9, 6, '::1', '2017-05-20 12:55:05.000000', 'hi'),
(26, 6, 9, 6, '::1', '2017-05-20 12:56:18.000000', 'chaitu'),
(27, 6, 2, 1, '::1', '2017-05-20 19:49:36.000000', 'hi'),
(28, 6, 2, 1, '::1', '2017-05-20 20:30:11.000000', 'nice'),
(29, 6, 2, 1, '::1', '2017-05-20 20:32:06.000000', 'hi'),
(30, 6, 9, 6, '::1', '2017-05-20 21:15:18.000000', '\r\n \r\nnew message\r\n \r\n'),
(31, 6, 9, 6, '::1', '2017-05-20 21:16:54.000000', 'chaitu'),
(32, 6, 9, 6, '::1', '2017-05-20 21:18:28.000000', 'chaitanya is good boy'),
(33, 6, 9, 6, '::1', '2017-05-20 21:25:09.000000', 'hi'),
(34, 6, 9, 6, '::1', '2017-05-20 21:25:18.000000', 'chAITU'),
(35, 6, 9, 6, '::1', '2017-05-20 21:29:15.000000', 'hi'),
(36, 6, 9, 6, '::1', '2017-05-20 21:32:29.000000', 'chaitanya'),
(37, 6, 9, 6, '::1', '2017-05-20 21:33:43.000000', 'chaitu is good boy'),
(38, 6, 9, 6, '::1', '2017-05-20 21:34:38.000000', 'hi'),
(39, 6, 8, 3, '::1', '2017-05-20 21:34:49.000000', 'hi'),
(40, 9, 6, 6, '::1', '2017-05-20 21:46:24.000000', 'hi'),
(41, 6, 9, 6, '::1', '2017-05-20 21:46:40.000000', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `activation` enum('0','1','','') NOT NULL,
  `checkin` timestamp(6) NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` enum('0','1') NOT NULL,
  `checkout` timestamp(6) NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `ip`, `time`, `activation`, `checkin`, `status`, `checkout`) VALUES
(2, 'satish', 'satishkohli183@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '::1', '2017-05-17 20:28:44.085753', '0', '2017-05-17 20:28:44.000000', '1', '0000-00-00 00:00:00.000000'),
(3, 'chaitanya', 'chaitu.dominator@gmail.coml', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '::1', '2017-05-09 08:18:20.055019', '0', '2017-05-09 08:18:20.000000', '1', '2017-04-24 13:11:17.000000'),
(6, 'chaitanya', 'chaitu.dominator@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '::1', '2017-05-20 21:55:54.848688', '1', '2017-05-20 19:54:35.000000', '0', '2017-05-20 21:55:54.000000'),
(8, 'anusha', 'anusha.ginka@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '::1', '2017-05-14 12:58:56.000000', '0', '0000-00-00 00:00:00.000000', '0', '0000-00-00 00:00:00.000000'),
(9, 'chaitu', 'chaitanyaivvala1996@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '::1', '2017-05-20 21:34:28.032152', '1', '2017-05-20 21:34:28.000000', '1', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1` (`user1`),
  ADD KEY `user2` (`user2`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `reciver` (`reciver`),
  ADD KEY `chatid` (`chatid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`reciver`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`chatid`) REFERENCES `chat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 апр 2019 в 11:22
-- Версия на сървъра: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_village`
--

-- --------------------------------------------------------

--
-- Структура на таблица `history_of_games`
--

CREATE TABLE `history_of_games` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `field` int(2) NOT NULL,
  `moves` int(1) NOT NULL,
  `money` int(11) NOT NULL,
  `motels` int(1) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `in_progress`
--

CREATE TABLE `in_progress` (
  `user_id` int(11) NOT NULL,
  `in_progress` varchar(3) NOT NULL DEFAULT 'NO',
  `money` int(6) DEFAULT NULL,
  `moves` int(2) DEFAULT NULL,
  `field` int(2) DEFAULT NULL,
  `motels` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `in_progress`
--

INSERT INTO `in_progress` (`user_id`, `in_progress`, `money`, `moves`, `field`, `motels`) VALUES
(1, 'YES', 350, 11, 6, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `total_games` int(6) NOT NULL DEFAULT '0',
  `victories` int(5) NOT NULL DEFAULT '0',
  `defeats` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users_info`
--

INSERT INTO `users_info` (`user_id`, `username`, `password`, `total_games`, `victories`, `defeats`) VALUES
(1, 'player_123', 'aafdc23870ecbcd3d557b6423a8982134e17927e', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_of_games`
--
ALTER TABLE `history_of_games`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `in_progress`
--
ALTER TABLE `in_progress`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_of_games`
--
ALTER TABLE `history_of_games`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=837;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

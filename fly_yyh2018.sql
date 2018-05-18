-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-05-18 22:57:22
-- 服务器版本： 5.7.20-log
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fly_yyh2018`
--

-- --------------------------------------------------------

--
-- 表的结构 `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `sid` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `user` text NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `sp_code`
--

CREATE TABLE `sp_code` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `stall` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `sp_code`
--

INSERT INTO `sp_code` (`id`, `code`, `stall`) VALUES
(1, 77423356, '1'),
(2, 97503625, '2'),
(3, 23607785, '3'),
(4, 65802159, '4'),
(5, 57739259, '5'),
(6, 71003092, '6'),
(7, 64743890, '7'),
(8, 57660850, '8'),
(9, 60292279, '9'),
(10, 10832325, '10'),
(11, 76799288, '11'),
(12, 59555151, '12'),
(13, 80034944, '13'),
(14, 14883484, '14'),
(15, 33499719, '15'),
(16, 74260589, '16'),
(17, 77570417, '17'),
(18, 91259781, '18'),
(19, 39882005, '19'),
(20, 49531462, '20'),
(21, 13350467, '21'),
(22, 92751352, '22'),
(23, 98407538, '23'),
(24, 70884479, '24'),
(25, 49008904, '25'),
(26, 93080077, '26'),
(27, 20805194, '27'),
(28, 27476875, '28'),
(29, 21528559, '29'),
(30, 71027306, '30'),
(31, 29769264, '31'),
(32, 66189216, '32'),
(33, 33428979, '33'),
(34, 26345492, '34'),
(35, 39916666, '35'),
(36, 22949437, '36'),
(37, 11501929, '37'),
(38, 29637781, '38'),
(39, 81644043, '39'),
(40, 25472217, '40,41'),
(41, 75923964, '40,41'),
(42, 51561317, '42'),
(43, 85648541, '43');

-- --------------------------------------------------------

--
-- 表的结构 `stalls`
--

CREATE TABLE `stalls` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `stalls`
--

INSERT INTO `stalls` (`id`, `name`) VALUES
(1, '高一年1班'),
(2, '高一年2班'),
(3, '高一年3班'),
(4, '高一年4班'),
(5, '高一年5班'),
(6, '高一年6班'),
(7, '高一年7班'),
(8, '高一年8班'),
(9, '高一年9班'),
(10, '高一年10班'),
(11, '高一年11班'),
(12, '高一年12班'),
(13, '高一年13班'),
(14, '高一年14班'),
(15, '高一年15班'),
(16, '高一年16班'),
(17, '高一年17班'),
(18, '高一年18班'),
(19, '高二年1班'),
(20, '高二年2班'),
(21, '高二年3班'),
(22, '高二年4班'),
(23, '高二年5班'),
(24, '高二年6班'),
(25, '高二年7班'),
(26, '高二年8班'),
(27, '高二年9班'),
(28, '高二年10班'),
(29, '高二年11班'),
(30, '高二年12班'),
(31, '高二年13班'),
(32, '高二年14班'),
(33, '高二年15班'),
(34, '高二年16班'),
(35, '高二年17班'),
(36, '高二年18班'),
(37, '高二年19班'),
(38, '高二年20班'),
(39, '高二年21班'),
(40, '学生会'),
(41, '捐书点'),
(42, '料理社'),
(43, '动漫社');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_code`
--
ALTER TABLE `sp_code`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `stalls`
--
ALTER TABLE `stalls`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `sp_code`
--
ALTER TABLE `sp_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

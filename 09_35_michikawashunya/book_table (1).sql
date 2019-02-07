-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 2 月 07 日 13:36
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `book_table`
--

CREATE TABLE IF NOT EXISTS `book_table` (
`id` int(12) NOT NULL,
  `book` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `book_table`
--

INSERT INTO `book_table` (`id`, `book`, `url`, `comment`, `indate`) VALUES
(1, 'aaa', 'aaa', 'aaa', '2019-01-20 22:58:16'),
(4, '2', '2', '2', '2019-01-21 23:46:51'),
(5, 'bbb', 'bb', 'bb', '2019-01-21 23:46:52'),
(6, 'bb', 'bb', 'bb', '2019-01-21 23:46:52'),
(7, 'c', 'c', 'c', '2019-01-21 23:46:52'),
(8, 'd', 'd', 'd', '2019-01-21 23:46:53'),
(9, 'aaa', 'aaa', 'aaa', '2019-01-22 22:40:26'),
(10, 'aaa', 'bbbb', 'bbbbb', '2019-01-26 18:16:08'),
(11, 'hh', 'hhhh', 'hhh', '2019-01-26 18:16:19'),
(12, 'aaa', 'aaa', 'aaa', '2019-01-26 18:16:49'),
(13, 'bbb', 'bbb', 'bbb', '2019-02-04 21:33:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

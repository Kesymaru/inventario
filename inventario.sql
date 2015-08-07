-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2015 at 01:55 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='items table';

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Desktop', '2015-07-10 04:06:09', '2015-07-10 22:40:45'),
(2, 'Test update', '2015-07-10 04:36:43', '2015-07-11 01:46:05'),
(3, 'Computer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Ipad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Iphone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Iphone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Mousepad', '2015-07-23 05:00:00', '2015-07-10 21:13:38'),
(9, 'Test New', '2015-07-11 01:42:48', '2015-07-11 01:42:48'),
(11, 'Test 2', '2015-07-11 01:45:50', '2015-07-11 01:45:50'),
(12, 'Test 2', '2015-07-11 01:46:05', '2015-07-11 01:46:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

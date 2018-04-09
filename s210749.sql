-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2014 at 11:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `s210749`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `descr` tinytext,
  `owner` varchar(40) DEFAULT NULL,
  `bidder` varchar(40) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `highPrice` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`(15)),
  KEY `owner` (`owner`(15)),
  KEY `bidder` (`bidder`(15))
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `descr`, `owner`, `bidder`, `date`, `highPrice`) VALUES
(1, 'galaxy S3', 'good condition,used.', 'u1@polito.it', 'u3@polito.it', '2014-06-16 17:03:02', 16),
(2, 'Notebook hp Probook 4530s', 'intel i5\r\n4Gb ram\r\n1Gb VGA\r\n640Gb HDD', 'u1@polito.it', 'u2@polito.it', '2014-06-16 17:04:42', 400),
(5, 'rolex watch', 'new', 'u2@polito.it', NULL, '2014-06-17 23:27:10', 0),
(8, 'Sony Smart Watch', 'new', 'u2@polito.it', 'u1@polito.it', '2014-06-18 16:53:30', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `surname`, `mail`, `pass`) VALUES
('Shahboz', 'Abdunabiev', 'u1@polito.it', 'p1'),
('Bobur', 'Faiziev', 'u2@polito.it', 'p2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

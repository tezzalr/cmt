-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2015 at 11:17 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `summary_desc`
--

CREATE TABLE IF NOT EXISTS `summary_desc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sum_desc` text NOT NULL,
  `for_what` varchar(255) NOT NULL,
  `comp_id` varchar(255) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `summary_desc`
--

INSERT INTO `summary_desc` (`id`, `sum_desc`, `for_what`, `comp_id`, `kind`, `month`, `year`, `user_id`) VALUES
(5, 'Desc CB', 'basic_info', 'CB', 'directorate', 5, 2015, 3),
(6, 'CB 1', 'basic_info', 'CB1', 'directorate', 5, 2015, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

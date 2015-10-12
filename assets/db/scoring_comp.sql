-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 10:03 AM
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
-- Table structure for table `scoring_comp`
--

CREATE TABLE IF NOT EXISTS `scoring_comp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comp` varchar(255) DEFAULT NULL,
  `desc_comp` text,
  `high_limit` int(11) DEFAULT NULL,
  `med_limit` int(11) DEFAULT NULL,
  `low_limit` int(11) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `group_scor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `scoring_comp`
--

INSERT INTO `scoring_comp` (`id`, `id_comp`, `desc_comp`, `high_limit`, `med_limit`, `low_limit`, `bobot`, `group_scor`) VALUES
(1, 'CASA_vol', 'CASA Vol (Wallet)', NULL, NULL, NULL, 10, 'wallet_size'),
(2, 'Trade_vol', 'Trade Vol (Wallet)', NULL, NULL, NULL, 5, 'wallet_size'),
(3, 'FX_vol', 'Forex Vol (Wallet)', NULL, NULL, NULL, 5, 'wallet_size'),
(4, 'BG_vol', 'BG Vol (Wallet)', NULL, NULL, NULL, 5, 'wallet_size'),
(5, 'CASA_vol', 'CASA Vol (Realisasi)', NULL, NULL, NULL, 0, 'realization'),
(6, 'Loan_vol', 'Loan Vol (Realisasi)', NULL, NULL, NULL, 10, 'realization'),
(7, 'WH_inc', 'Wholesale Income', NULL, NULL, NULL, 20, 'realization'),
(9, 'num_of_comp', 'Num of Companies', NULL, NULL, NULL, 20, 'profile'),
(10, 'gas', 'Gas', NULL, NULL, NULL, 15, 'wallet_size'),
(11, 'PCD_vol', 'Payroll', NULL, NULL, NULL, 5, 'wallet_size');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

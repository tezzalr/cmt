-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2014 at 06:27 AM
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
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `location` varchar(600) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `description` text NOT NULL,
  `maker_id` int(11) NOT NULL,
  `required` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `location`, `start`, `end`, `description`, `maker_id`, `required`) VALUES
(9, 'Internal Meeting', 'Ruang Rapat', '2014-10-06 08:00:00', NULL, '<p>Membahas tentang distribusi</p>\n', 12, ''),
(12, 'Suplier Gathering MAP', 'Shangrila', '2014-10-27 08:00:00', NULL, '<p>Dihadiri oleh supplier gathering ada cross selling kartu kredit</p>\n', 4, '7,3'),
(14, 'Pertamina Lubricant', 'Hotel Borobudur', '2014-10-15 10:00:00', NULL, '<p>Diikuti oleh 32 distributor. Pengelola acara ini adalah Kanwil 4.</p>\n', 4, '7'),
(15, 'Workshop Branchless Banking', 'Hotel Arion Swiss Bell Kemang', '2014-10-14 08:00:00', NULL, '<p>Branchless Banking untuk PT Indomarco Adi Prima (Salim Group). Diikuti oleh 25 peserta dari unit kerja :&nbsp;</p>\n\n<ol>\n	<li>CB1</li>\n	<li>Mikro</li>\n	<li>DN 2</li>\n	<li>Kanwil 6 Bandung</li>\n	<li>EBG</li>\n	<li>MRB</li>\n	<li>TB (Sales Group)</li>\n	<li>CMT</li>\n</ol>\n', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(600) NOT NULL,
  `username` varchar(600) NOT NULL,
  `password` varchar(600) NOT NULL,
  `role` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(2, 'Gaby Valeria', '1254459795', '7b0f27133a8a2a1d09295163c9d00c61', 'User'),
(3, 'Tezza Lantika Riyanto', 'tezzalr', 'a6313405d7d34459bca505ebc6cebd93', 'admin'),
(4, 'Ria Susiaty', '9962005336', '936f38535aaab3faab425092c53577f7', 'User'),
(5, 'I Putu Anandika Kusuma Bakta', '0278187794', 'cf56c0670aa022c611e1fa8afc5b4d00', 'User'),
(6, 'Hermawan Soebagio', '9968018580', '417ed6e9be0c95d903aa005e13402ffe', 'User'),
(7, 'R.C. Mursitawati', '9959020868', 'ea9d65219fe7253a29fd7fa3aacfa5f5', 'User'),
(8, 'Mahatma Pajar Peranginangin', '9971017462', 'ea9d65219fe7253a29fd7fa3aacfa5f5', 'User'),
(9, 'Agatha Rachel Widihandayani', '1289431835', '09a7a0d6f6797935457e92d47dbb4e9a', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

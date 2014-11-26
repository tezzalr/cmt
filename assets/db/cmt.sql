-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2014 at 02:44 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `location`, `start`, `end`, `description`, `maker_id`, `required`) VALUES
(12, 'Suplier Gathering MAP', 'Shangrila', '2014-10-27 08:00:00', NULL, '<p>Dihadiri oleh supplier gathering ada cross selling kartu kredit</p>\n', 3, '7,3'),
(14, 'Pertamina Lubricant', 'Hotel Borobudur', '2014-10-15 10:00:00', NULL, '<p>Diikuti oleh 32 distributor. Pengelola acara ini adalah Kanwil 4.</p>\n', 3, '7'),
(15, 'Workshop Branchless Banking', 'Hotel Arion Swiss Bell Kemang', '2014-10-14 08:00:00', NULL, '<p>Branchless Banking untuk PT Indomarco Adi Prima (Salim Group). Diikuti oleh 25 peserta dari unit kerja :&nbsp;</p>\n\n<ol>\n	<li>CB1</li>\n	<li>Mikro</li>\n	<li>DN 2</li>\n	<li>Kanwil 6 Bandung</li>\n	<li>EBG</li>\n	<li>MRB</li>\n	<li>TB (Sales Group)</li>\n	<li>CMT</li>\n</ol>\n', 3, ''),
(17, 'antam', 'pulo gadung', '2014-10-16 09:00:00', NULL, '<p>Persiapan joint promo, gathering dan forum kajian mining</p>\r\n\r\n<p><br />\r\n<strong>---Follow Up---</strong></p>\r\n\r\n<p><strong>meeting berikut dengan kartu kredit dan wealth management</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 7, '13,7'),
(18, 'Rapat MDM', 'Wisma Mandiri', '2014-11-21 00:00:00', NULL, '<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>---Follow Up---</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 11, '3'),
(22, 'Meeting Port Solution dgn Bpk Ventje', 'CMO', '2014-11-21 00:00:00', NULL, '<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>---Follow Up---</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 15, '15'),
(23, 'Sektor Solution : Government linked budget', 'R. Rapat CMO', '2014-11-21 09:00:00', NULL, '<p><strong>Pembahasan ekosistem government linked budget</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 4, '9,4');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(9, 'Agatha Rachel Widihandayani', '1289431835', '09a7a0d6f6797935457e92d47dbb4e9a', 'User'),
(11, 'Tegar Riyono Putra', '1288447824', '9a7816283bc2a4e887e6d4d1e432f602', 'User'),
(12, 'Pranowo Dewantoro', '1385489497', 'c220db4e717bc030ac786e3eb59c105b', 'User'),
(13, 'Ferry Adrian Raditya Kurniawan', '1388497075', 'bbd9ee3bbaca195944ee2ccbdb44140e', 'User'),
(14, 'Claudio Suhalim', '1389497041', 'a86e879161583796de3aa41ae03d68d6', 'User'),
(15, 'Mahatma Pajar P', '9971017462', '59cb934f42acf13e76b5884d42aa0e5f', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

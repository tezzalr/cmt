-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 10:02 AM
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
-- Table structure for table `anchor`
--

CREATE TABLE IF NOT EXISTS `anchor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `gas` double DEFAULT NULL,
  `bank_comp` varchar(366) NOT NULL,
  `srt_name` varchar(366) NOT NULL,
  `is_group_holding` int(11) DEFAULT NULL,
  `holding` varchar(255) NOT NULL,
  `show_anc` int(11) DEFAULT NULL,
  `code_dept` varchar(255) NOT NULL,
  `ring` int(11) NOT NULL,
  `scoring` double NOT NULL,
  `class` varchar(255) NOT NULL,
  `num_of_comp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2727 ;

--
-- Dumping data for table `anchor`
--

INSERT INTO `anchor` (`id`, `name`, `group`, `dept`, `gas`, `bank_comp`, `srt_name`, `is_group_holding`, `holding`, `show_anc`, `code_dept`, `ring`, `scoring`, `class`, `num_of_comp`) VALUES
(138, 'CENTRAL CIPTA MURDAYA GROUP', 'CORPORATE BANKING IV', '3', 10, 'BCA, HSBC', 'Murdaya', 0, '', 1, '403', 0, 1.6, 'C', 44),
(139, 'CITRA BORNEO INDAH GROUP', 'CORPORATE BANKING IV', '3', 2.6, 'BNI, BRI', 'Citra Borneo', 0, '', 1, '403', 0, 1.3, 'D', 24),
(140, 'DARMEX AGRO GROUP', 'CORPORATE BANKING IV', '3', 5.6, 'BCA, CIMB', 'Darmex Agro', 0, '', 1, '403', 0, 1.75, 'C', 58),
(141, 'INCASI RAYA GROUP', 'CORPORATE BANKING IV', '2', 10.7, 'DBS, PERMATA', 'Incasi Raya', 0, '', 1, '402', 0, 2, 'B', 46),
(142, 'JAPFA GROUP', 'CORPORATE BANKING III', '2', 17.8, 'PANIN, BCA', 'JAPFA', 0, '', 1, '302', 0, 1.65, 'C', 17),
(143, 'PERMATA HIJAU SAWIT GROUP', 'CORPORATE BANKING IV', '6', 19.4, 'DBS', 'Permata H Sawit', 0, '', 1, '406', 0, 1.8, 'C', 16),
(144, 'PTPN 3 GROUP', 'CORPORATE BANKING IV', '6', 6.6, 'AGRO, BNI', 'PTPN 3', 0, '', 1, '406', 0, 1.4, 'D', 5),
(145, 'PTPN 4 GROUP', 'CORPORATE BANKING IV', '6', 6.3, 'AGRO, BNI', 'PTPN 4', 0, '', 1, '406', 0, 1.6, 'C', 11),
(146, 'PTPN 5 GROUP', 'CORPORATE BANKING IV', '4', 31.6, 'BNI, BRI', 'PTPN 5', 0, '', 1, '404', 0, 1.65, 'C', 8),
(147, 'RAJAWALI GROUP', 'CORPORATE BANKING IV', '2', 5.5, 'BCA, BRI', 'Rajawali', 0, '', 1, '402', 0, 1.6, 'C', 43),
(148, 'RIAU ANDALAN PULP & PAPER GROUP', 'CORPORATE BANKING IV', '5', 22.1, 'BNI, CIMB', 'RAPP', 0, '', 1, '405', 0, 1.85, 'C', 42),
(149, 'SAMPOERNA AGRO GROUP', 'CORPORATE BANKING IV', '', 2561, 'BNI, BRI', 'Sampoerna Agro', 0, '', NULL, '', 0, 0, '', 0),
(150, 'SINAR MAS GROUP', 'CORPORATE BANKING IV', '1', 255.2, 'SINARMAS, BCA', 'Sinar Mas', 0, '', 1, '401', 0, 3.25, 'A', 112),
(151, 'SUNGAI BUDI GROUP', 'CORPORATE BANKING IV', '2', 13.3, 'UOB', 'Sungai Budi ', 0, '', 1, '402', 0, 2.45, 'B', 92),
(152, 'ADHI KARYA GROUP', 'CORPORATE BANKING II', '2', 8.6, 'BNI, BRI', 'Adhi Karya', 0, '', 1, '202', 0, 1.65, 'C', 8),
(153, 'ARGO MANUNGGAL GROUP', '', '', 2895, 'BNI', 'Argo Manunggal', 0, '', NULL, '', 0, 0, '', 0),
(154, 'ASTRA GROUP', 'CORPORATE BANKING I', '4', 201.2, 'BCA, Permata', 'Astra', 0, '', 1, '104', 0, 3.35, 'A', 129),
(155, 'DJARUM GROUP', 'CORPORATE BANKING I', '3', 40, 'BCA, HSBC', 'Djarum', 0, '', 1, '103', 0, 1.75, 'C', 13),
(156, 'GUDANG GARAM GROUP', 'CORPORATE BANKING I', '5', 65, '', 'Gudang Garam', 0, '', 1, '105', 0, 3, 'B', 48),
(157, 'GUNUNG STEEL GROUP', 'CORPORATE BANKING II', '4', 7.1, 'DBS, JP MORGAN', 'Gunung Steel', 0, '', 1, '204', 0, 1.05, 'D', 6),
(158, 'INDOMARET GROUP', 'CORPORATE BANKING I', '', 29915, 'BCA, BRI', 'Indomaret', 0, 'SALIM HOLDING GROUP', 1, '', 0, 0, '', 0),
(159, 'INDOMOBIL GROUP', 'CORPORATE BANKING I', '', 19781, 'BCA', 'Indomobil', 0, 'SALIM HOLDING GROUP', 1, '', 0, 0, '', 0),
(160, 'KAPAL API GROUP', 'CORPORATE BANKING I', '5', 10, 'BCA', 'Kapal Api', 0, '', 1, '105', 0, 1.5, 'C', 16),
(161, 'KRAKATAU STEEL GROUP', 'CORPORATE BANKING II', '4', 24.3, 'BNI, Dan', 'Krakatau Steel', 0, '', 1, '204', 0, 2.75, 'B', 40),
(162, 'LION AIR GROUP', '', '', 0, 'BCA', 'Lion Air', 0, '', NULL, '', 0, 0, '', 0),
(163, 'MASPION GROUP', 'CORPORATE BANKING I', '5', 6, '', 'Maspion', 0, '', 1, '105', 0, 1.65, 'C', 29),
(164, 'MAYORA GROUP', 'CORPORATE BANKING I', '1', 17.6, 'BCA', 'Mayora', 0, '', 1, '101', 0, 1.75, 'C', 12),
(165, 'MITRA ADI PERKASA GROUP', 'CORPORATE BANKING I', '3', 11.8, 'BCA, SCB', 'MAP', 0, '', 1, '103', 0, 1.5, 'C', 35),
(166, 'PEMBANGUNAN PERUMAHAN GROUP', 'CORPORATE BANKING II', '2', 12.4, 'BNI, BRI', 'P Perumahan', 0, '', 1, '202', 0, 1.9, 'C', 8),
(167, 'PURA BARUTAMA GROUP', 'CORPORATE BANKING I', '6', 2.9, 'BRI, BCS', 'Pura Barutama', 0, '', 1, '106', 0, 1.05, 'D', 5),
(168, 'SALIM GROUP', 'CORPORATE BANKING I', '', 50059, 'DBS, BCA', 'Salim', 0, 'SALIM HOLDING GROUP', 1, '', 0, 0, '', 0),
(169, 'SUMBER ALFARIA GROUP', 'CORPORATE BANKING I', '3', 34.9, '', 'Sumber Alfaria', 0, '', 1, '103', 0, 1.4, 'D', 9),
(170, 'TIGARAKSA GROUP', 'CORPORATE BANKING I', '1', 8.2, 'BCA', 'Tigaraksa', 0, '', 1, '101', 0, 0.9, 'D', 2),
(171, 'TRAKINDO GROUP', 'CORPORATE BANKING I', '4', 32, 'CIMB, Citi', 'Trakindo', 0, '', 1, '104', 0, 2.3, 'B', 34),
(172, 'TUDUNG GROUP', '', '', 7500, 'BCA', 'Tudung', 0, '', NULL, '', 0, 0, '', 0),
(173, 'WASKITA KARYA GROUP', 'CORPORATE BANKING II', '2', 10.2, 'BRI, BNI', 'Waskita Karya', 0, '', 1, '202', 0, 1.35, 'D', 4),
(174, 'WIJAYA KARYA GROUP', 'CORPORATE BANKING II', '2', 12.4, 'BNI, BRI', 'Wijaya Karya', 0, '', 1, '202', 0, 1.9, 'C', 11),
(175, 'ANEKA KIMIA RAYA GROUP', 'CORPORATE BANKING V', '2', 22.3, 'BCA, JP MORGAN', 'AKR', 0, '', 1, '502', 0, 1.5, 'C', 13),
(176, 'ANEKA TAMBANG GROUP', 'CORPORATE BANKING V', '3', 11.3, 'BRI, BTN, Mizuho, BTMU', 'Antam', 0, '', 1, '503', 0, 1.9, 'C', 22),
(177, 'CIPUTRA GROUP', 'CORPORATE BANKING II', '3', 6.344, 'BCA, Ciputra', 'Ciputra', 0, '', 1, '203', 0, 1.75, 'C', 52),
(178, 'INDOCEMENT GROUP', 'CORPORATE BANKING II', '', 18690, 'BCA, CIMB, SCB, Permata', 'Indocement', 0, '', NULL, '', 0, 0, '', 0),
(179, 'JASA MARGA GROUP', 'CORPORATE BANKING II', '1', 9.2, 'BCA, BRI', 'Jasa Marga', 0, '', 1, '201', 0, 1.95, 'B', 19),
(180, 'KALBE FARMA GROUP', 'CORPORATE BANKING I', '2', 17.4, 'BII, PERMATA, HSBC', 'Kalbe Farma', 0, '', 1, '102', 0, 1.05, 'D', 4),
(181, 'KOMPAS GRAMEDIA GROUP', 'CORPORATE BANKING III', '2', 26.4, 'BCA, BRI', 'Kompas', 0, '', 1, '302', 0, 1.2, 'D', 53),
(182, 'PEMBANGUNAN JAYA GROUP', 'CORPORATE BANKING II', '3', 6.2, 'CIMB, BCA,  PERMATA', 'Pemb Jaya', 0, '', 1, '203', 0, 1.65, 'C', 53),
(183, 'PERTAMINA GROUP', 'CORPORATE BANKING V', '1', 888.8, 'BNI, BRI', 'Pertamina', 0, '', 1, '501', 0, 3.15, 'A', 76),
(184, 'PERUSAHAAN GAS NEGARA GROUP', 'CORPORATE BANKING V', '2', 42.4, 'BNI, BRI, BTN', 'PGN', 0, '', 1, '502', 0, 2.1, 'B', 13),
(185, 'SEMEN INDONESIA GROUP', 'CORPORATE BANKING II', '4', 26.9, 'BRI, BNI', 'Semen Ind', 0, '', 1, '204', 0, 2.1, 'B', 34),
(186, 'TAMBANG BUKIT ASAM GROUP', 'CORPORATE BANKING V', '3', 13, 'BNI, Citi, DB', 'T Bukit Asam', 0, '', 1, '503', 0, 1.6, 'C', 14),
(187, 'TAMBANG TIMAH GROUP', 'CORPORATE BANKING V', '3', 9.1, 'BRI, BOT', 'Tambang Timah', 0, '', 1, '503', 0, 1.2, 'D', 11),
(188, 'VALE INDONESIA GROUP', 'CORPORATE BANKING II', '', 11300, 'Citi, DB', 'Vale Indonesia', 0, '', NULL, '', 0, 0, '', 0),
(189, 'ADARO GROUP', 'CORPORATE BANKING III', '', 34912.87, 'SMBC, DBS', 'Adaro', 0, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(190, 'AXIATA GROUP', 'CORPORATE BANKING III', '1', 21.3, 'PERMATA, SCB', 'Axiata', 0, '', 1, '301', 0, 2.05, 'B', 2),
(191, 'BINA BUSANA INTERNUSA GROUP', 'CORPORATE BANKING III', '', 388.7, 'BCA', 'Bina Busana Int', 0, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(192, 'DHARMA POLIMETAL GROUP', 'CORPORATE BANKING III', '', 1000, '', 'Dharma Polimetal', 0, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(193, 'GANDA GROUP', 'CORPORATE BANKING III', '', 319, 'BNI', 'Ganda', 0, '', NULL, '', 0, 0, '', 0),
(194, 'HM SAMPOERNA GROUP', 'CORPORATE BANKING III', '', 75025, 'DB, BCA', 'HM Sampoerna', 0, '', NULL, '', 0, 0, '', 0),
(195, 'HOLCIM GROUP', 'CORPORATE BANKING II', '4', 10.5, 'SCB, CIMB', 'Holcim', 0, '', 1, '204', 0, 0.9500000000000001, 'D', 4),
(196, 'INDOSAT GROUP', 'CORPORATE BANKING III', '1', 23.9, 'Citi', 'Indosat', 0, '', 1, '301', 0, 1.25, 'D', 11),
(197, 'NEWMONT CORPORATION GROUP', 'CORPORATE BANKING III', '', 21788.9767, 'SMBC', 'Newmont', 0, '', NULL, '', 0, 0, '', 0),
(198, 'PUNINAR GROUP', 'CORPORATE BANKING III', '', 965, '', 'Puninar', 0, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(199, 'TELKOM GROUP', 'CORPORATE BANKING III', '1', 83, 'BRI, BNI', 'Telkom', 0, '', 1, '301', 0, 2.45, 'B', 30),
(200, 'TRIKOMSEL GROUP', 'CORPORATE BANKING III', '1', 10.4, 'ANZ, UOB', 'Trikomsel', 0, '', 1, '301', 0, 1.05, 'D', 9),
(201, 'UNILEVER GROUP', 'CORPORATE BANKING I', '1', 30.8, 'CIMB, HSBC', 'Unilever', 0, '', 1, '101', 0, 1.3, 'D', 4),
(202, 'WILMAR GROUP', 'CORPORATE BANKING III', '3', 91.6, 'BCA', 'Wilmar', 0, '', 1, '303', 0, 2.65, 'B', 116),
(203, 'CITRAMAS GROUP', 'CORPORATE BANKING V', '2', 3.47, 'HSBC, Mitsuo', 'Citramas', 0, '', 1, '502', 0, 1.55, 'C', 47),
(204, 'MEDCO GROUP', 'CORPORATE BANKING V', '4', 10.9, 'BNI, Citi, SCB, Dan', 'Medco', 0, '', 1, '504', 0, 2.85, 'B', 79),
(205, 'TELADAN RESOURCES GROUP', 'CORPORATE BANKING V', '2', 14.9, 'CIMB, Citi, UBS, JPM, ANZ', 'Teladan', 0, '', 1, '502', 0, 2.85, 'B', 76),
(2641, 'ANGKASA PURA I GROUP', 'CORPORATE BANKING VI', '5', 3.063, '', 'Angkasa Pura I', 0, '', 1, '605', 0, 1.2, 'D', 8),
(2642, 'ANGKASA PURA II GROUP', 'CORPORATE BANKING VI', '5', 4.205, '', 'ANGKASA PURA II', 0, '', 1, '605', 0, 0.8, 'D', 7),
(2643, 'KEMENTERIAN KEUANGAN GROUP', 'CORPORATE BANKING VI', '6', 18.711, '', 'Kemenkeu', 0, '', 1, '606', 0, 2.05, 'B', 21),
(2644, 'KEMENTERIAN PENDIDIKAN NASIONAL GROUP', 'CORPORATE BANKING VII', '4', 80.6, '', 'Kemen Diknas', 0, '', 1, '704', 0, 2.15, 'B', 66),
(2645, 'PEGADAIAN GROUP', 'CORPORATE BANKING VI', '', 7724.57, '', 'Pegadaian', 0, '', NULL, '', 0, 0, '', 0),
(2646, 'PELINDO II GROUP', 'CORPORATE BANKING VI', '4', 6.116, '', 'Pelindo II', 0, '', 1, '604', 0, 1.5, 'C', 17),
(2647, 'PLN GROUP', 'CORPORATE BANKING VI', '3', 257.404, '', 'PLN', 0, '', 1, '603', 0, 3.25, 'A', 23),
(2648, 'PUPUK INDONESIA GROUP', 'CORPORATE BANKING VI', '2', 56.320230418926, '', 'Pupuk Indonesia', 0, '', 1, '602', 0, 3.25, 'A', 73),
(2649, 'BPJS KESEHATAN GROUP', 'CORPORATE BANKING VII', '6', 6.2, '', 'BPJS Kesehatan', 0, '', 1, '706', 0, 0.8000000000000002, 'D', 4),
(2650, 'BPJS KETENAGAKERJAAN GROUP', 'CORPORATE BANKING VII', '6', 29.7, '', 'BPJS Ketenagakerjaan', 0, '', 1, '706', 0, 1.2, 'D', 8),
(2652, 'KEMENTERIAN ESDM & SKK MIGAS GROUP', 'CORPORATE BANKING VII', '', 15800, '', 'Kemen ESDM & SKK', 0, '', NULL, '', 0, 0, '', 0),
(2653, 'KEMENTERIAN KESEHATAN GROUP', 'CORPORATE BANKING VII', '', 29920, '', 'Kemen Kes', 0, '', NULL, '', 0, 0, '', 0),
(2654, 'KEMENTERIAN PEKERJAAN UMUM GROUP', 'CORPORATE BANKING VII', '1', 84.14, '', 'Kemen PU', 0, '', 1, '701', 0, 1.3, 'D', 16),
(2656, 'KEMENTERIAN PERTAHANAN GROUP', 'CORPORATE BANKING VII', '', 112320, '', 'KemenHan', 0, '', NULL, '', 0, 0, '', 0),
(2657, 'POS INDONESIA GROUP', 'CORPORATE BANKING VII', '', 2278.068, '', 'Pos Indonesia', 0, '', NULL, '', 0, 0, '', 0),
(2658, 'AVIASTAR MANDIRI ', 'JAKARTA COMMERCIAL SALES', '', 170.6, '', 'Aviastar Mandiri', 0, '', NULL, '', 0, 0, '', 0),
(2659, 'BAYAN RESOURCES', 'JAKARTA COMMERCIAL SALES', '', 13500, '', 'Bayan', 0, '', NULL, '', 0, 0, '', 0),
(2660, 'CITRA BARU STEEL', 'JAKARTA COMMERCIAL SALES', '', 1213, '', 'Citra Baru Steel', 0, '', NULL, '', 0, 0, '', 0),
(2661, 'DUTA ADHIKARYA NEGERI', 'JAKARTA COMMERCIAL SALES', '', 698, '', 'Duta Adhikarya', 0, '', NULL, '', 0, 0, '', 0),
(2662, 'DWI ANEKA JAYA KEMASINDO', 'JAKARTA COMMERCIAL SALES', '', 184.7, '', 'Dwi Aneka J.K.', 0, '', NULL, '', 0, 0, '', 0),
(2663, 'KAWAN LAMA GROUP', 'JAKARTA COMMERCIAL SALES', '', 1463.785, '', 'Kawan Lama', 0, '', NULL, '', 0, 0, '', 0),
(2664, 'MESINDO PUTRA PERKASA GROUP', 'JAKARTA COMMERCIAL SALES', '', 528, '', 'Mesisdo Putra', 0, '', NULL, '', 0, 0, '', 0),
(2665, 'NUSA PRIMA PANGAN', 'JAKARTA COMMERCIAL SALES', '', 1000, '', 'Nusa Prima', 0, '', NULL, '', 0, 0, '', 0),
(2666, 'PARAGON TECHNOLOGY & INNOVATION', 'JAKARTA COMMERCIAL SALES', '', 630, '', 'Paragon Tech', 0, '', NULL, '', 0, 0, '', 0),
(2667, 'PONGS INDONESIA', 'JAKARTA COMMERCIAL SALES', '', 80.87, '', 'Pongs Indonesia', 0, '', NULL, '', 0, 0, '', 0),
(2668, 'POWER STEEL GROUP', 'JAKARTA COMMERCIAL SALES', '', 1949, '', 'Power Steel', 0, '', NULL, '', 0, 0, '', 0),
(2669, 'SANKEN GROUP', 'JAKARTA COMMERCIAL SALES', '', 327, '', 'Sanken', 0, '', NULL, '', 0, 0, '', 0),
(2670, 'SARANA GASTEKINDO UTAMA', 'JAKARTA COMMERCIAL SALES', '', 120.51, '', 'Sarana Gastekindo', 0, '', NULL, '', 0, 0, '', 0),
(2671, 'SENTRA BARUNA HIJAU', 'JAKARTA COMMERCIAL SALES', '', 550, '', 'Sentra Baruna', 0, '', NULL, '', 0, 0, '', 0),
(2672, 'TIGA SERANGKAI GROUP', 'JAKARTA COMMERCIAL SALES', '', 195.748, '', 'Tiga Serangkai', 0, '', NULL, '', 0, 0, '', 0),
(2673, 'TJAKRINDO GROUP', 'JAKARTA COMMERCIAL SALES', '', 850, '', 'Tjakrindo', 0, '', NULL, '', 0, 0, '', 0),
(2674, 'ALISAN GROUP ', 'REGIONAL COMMERCIAL SALES I', '', 800, '', 'Alisan', 0, '', NULL, '', 0, 0, '', 0),
(2675, 'ASIA SAWIT MAKMUR GROUP', 'REGIONAL COMMERCIAL SALES I', '', 457, '', 'Asia S Makmur', 0, '', NULL, '', 0, 0, '', 0),
(2676, 'BALIKPAPAN READY MIX GROUP', 'REGIONAL COMMERCIAL SALES I', '', 420, '', 'Balikpapan Ready', 0, '', NULL, '', 0, 0, '', 0),
(2677, 'HASNUR GROUP ', 'REGIONAL COMMERCIAL SALES I', '', 1782, '', 'Hasnur', 0, '', NULL, '', 0, 0, '', 0),
(2678, 'INDAKO GROUP', 'REGIONAL COMMERCIAL SALES I', '', 2.8, '', 'Indako', 0, '', NULL, '', 0, 0, '', 0),
(2679, 'KALDU SARI NABATI GROUP', 'REGIONAL COMMERCIAL SALES I', '', 2800, '', 'Kaldu S Nabati', 0, '', NULL, '', 0, 0, '', 0),
(2680, 'KARYA JAYA MANDIRI PERKASA GROUP', 'REGIONAL COMMERCIAL SALES I', '', 822, '', 'karya Jaya Mandiri', 0, '', NULL, '', 0, 0, '', 0),
(2681, 'MABAR FEED INDONESIA GROUP', 'REGIONAL COMMERCIAL SALES I', '', 2.3, '', 'Mabar Feed', 0, '', NULL, '', 0, 0, '', 0),
(2682, 'MENSA BINASUKSES', 'REGIONAL COMMERCIAL SALES I', '', 3000, '', 'Mensa Binasukses', 0, '', NULL, '', 0, 0, '', 0),
(2683, 'NUSANTARA BUILDING INDUSTRIES', 'REGIONAL COMMERCIAL SALES I', '', 816, '', 'Nusantara Building', 0, '', NULL, '', 0, 0, '', 0),
(2684, 'PELNAS BBS GROUP', 'REGIONAL COMMERCIAL SALES I', '', 65.931, '', 'Pelnas BBS', 0, '', NULL, '', 0, 0, '', 0),
(2685, 'PUTRA TANJUNG PURA GROUP', 'REGIONAL COMMERCIAL SALES I', '', 2.83, '', 'Putra Tanjung', 0, '', NULL, '', 0, 0, '', 0),
(2686, 'RABBANI ASYSA', 'REGIONAL COMMERCIAL SALES I', '', 361.18, '', 'Rabbani Asysa', 0, '', NULL, '', 0, 0, '', 0),
(2687, 'SUKA FAJAR GROUP', 'REGIONAL COMMERCIAL SALES I', '', 1.728, '', 'Suka Fajar', 0, '', NULL, '', 0, 0, '', 0),
(2688, 'TEGUH METTA GROUP', 'REGIONAL COMMERCIAL SALES I', '', 53.08, '', 'Teguh Metta', 0, '', NULL, '', 0, 0, '', 0),
(2689, 'TIRTA AMARTA GROUP', 'REGIONAL COMMERCIAL SALES I', '', 2450, '', 'Tirta Amarta', 0, '', NULL, '', 0, 0, '', 0),
(2690, 'ARMADA GROUP', 'REGIONAL COMMERCIAL SALES II', '', 1495, '', 'Armada', 0, '', NULL, '', 0, 0, '', 0),
(2691, 'ASLI MOTOR KLATEN GROUP', 'REGIONAL COMMERCIAL SALES II', '', 270, '', 'Asli Motor Klaten', 0, '', NULL, '', 0, 0, '', 0),
(2692, 'DUNIATEX GROUP', 'REGIONAL COMMERCIAL SALES II', '', 13088, '', 'Duniatex', 0, '', NULL, '', 0, 0, '', 0),
(2693, 'GERBANG NUSA PERKASA', 'REGIONAL COMMERCIAL SALES II', '', 100, '', 'Gerbang Nusa P', 0, '', NULL, '', 0, 0, '', 0),
(2695, 'KEDAWUNG GROUP', 'REGIONAL COMMERCIAL SALES II', '', 1140, '', 'Kedawung', 0, '', NULL, '', 0, 0, '', 0),
(2696, 'MATAHARI PUTRA MAKMUR GROUP', 'REGIONAL COMMERCIAL SALES II', '', 0, '', '', 0, '', NULL, '', 0, 0, '', 0),
(2697, 'MOTASA INDONESIA', 'REGIONAL COMMERCIAL SALES II', '', 181.5, '', 'Motasa Indonesia', 0, '', NULL, '', 0, 0, '', 0),
(2698, 'MULTIPLAST GROUP', 'REGIONAL COMMERCIAL SALES II', '', 1298, '', 'Multiplast', 0, '', NULL, '', 0, 0, '', 0),
(2699, 'SAMATOR GROUP', 'REGIONAL COMMERCIAL SALES II', '', 1330.8, '', 'Samator', 0, '', NULL, '', 0, 0, '', 0),
(2700, 'SATRIAGRAHA GROUP', 'REGIONAL COMMERCIAL SALES II', '', 907, '', 'Satriagraha', 0, '', NULL, '', 0, 0, '', 0),
(2701, 'SINARGROUP INDOCEMERLANG', 'REGIONAL COMMERCIAL SALES II', '', 73, '', 'Sinargroup Indo', 0, '', NULL, '', 0, 0, '', 0),
(2702, 'SUKSES JAYA UTAMA GROUP', 'REGIONAL COMMERCIAL SALES II', '', 783.13, '', 'Sukses Jaya U', 0, '', NULL, '', 0, 0, '', 0),
(2703, 'TA DISANGKA ', 'REGIONAL COMMERCIAL SALES II', '', 674, 'TA Disangka', '', 0, '', NULL, '', 0, 0, '', 0),
(2705, 'DELTA PUSAKA INDAH GROUP', 'REGIONAL COMMERCIAL SALES II', '', 161, '', 'Delta Pusaka I', 0, '', NULL, '', 0, 0, '', 0),
(2707, 'SALIM HOLDING GROUP', 'CORPORATE BANKING I', '1', 175.3, '', 'Salim', 1, '', 1, '101', 0, 3.450000000000001, 'A', 117),
(2708, 'KIMIA FARMA GROUP', 'CORPORATE BANKING I', '2', 4.5, '', 'Kimia Farma', 0, '', 1, '102', 0, 1.05, 'D', 5),
(2709, 'PAKUWON GROUP', 'CORPORATE BANKING II', '3', 3.87, '', 'Pakuwon', 0, '', 1, '203', 0, 1.15, 'D', 19),
(2710, 'SUMMARECON GROUP', 'CORPORATE BANKING II', '3', 5.33, '', 'Summarecon', 0, '', 1, '203', 0, 1.35, 'D', 19),
(2711, 'TRIPUTRA HOLDING GROUP', 'CORPORATE BANKING III', '2', 37.3, '', 'Triputra', 1, '', 1, '302', 0, 3.1, 'A', 86),
(2712, 'MUSIM MAS GROUP', 'CORPORATE BANKING IV', '6', 84.5, '', 'Musim Mas', 0, '', 1, '406', 0, 1.8, 'C', 22),
(2713, 'JABABEKA GROUP', 'CORPORATE BANKING V', '4', 27.4, '', 'Jababeka', 0, '', 1, '504', 0, 0.95, 'D', 10),
(2714, 'KAI GROUP', 'CORPORATE BANKING VI', '1', 10.35, '', 'Kai', 0, '', 1, '601', 0, 0.9999999999999999, 'D', 6),
(2715, 'PELINDO I GROUP', 'CORPORATE BANKING VI', '4', 2, '', 'Pelindo 1', 0, '', 1, '604', 0, 0.9, 'D', 2),
(2716, 'PELINDO III GROUP', 'CORPORATE BANKING VI', '4', 5.9, '', 'Pelindo 3', 0, '', 1, '604', 0, 0.9, 'D', 7),
(2717, 'PELINDO IV GROUP', 'CORPORATE BANKING VI', '4', 2.422473404567, '', 'Pelindo 4', 0, '', 1, '604', 0, 0.8500000000000001, 'D', 3),
(2718, 'KEMENTERIAN KOMUNIKASI DAN INFORMASI', 'CORPORATE BANKING VII', '5', 3.55, '', 'Kemkominfo', 0, '', 1, '705', 0, 0.7000000000000001, 'D', 4),
(2719, 'TNI/ POLRI GROUP', 'CORPORATE BANKING VII', '2', 104.03, '', 'Tni/Polri', 0, '', 1, '702', 0, 2.3, 'B', 20),
(2720, 'TASPEN GROUP', 'CORPORATE BANKING VII', '3', 20.2, '', 'Taspen', 0, '', 1, '703', 0, 0.8500000000000001, 'D', 4),
(2722, 'ADI SARANA GROUP', 'CORPORATE BANKING III', '2', 0, '', '', 0, 'TRIPUTRA HOLDING GROUP', 1, '0', 0, 0, '', 0),
(2723, 'KIRANA GROUP', 'CORPORATE BANKING III', '2', NULL, '', '', NULL, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(2724, 'PADANG KARUNIA GROUP', 'CORPORATE BANKING III', '2', NULL, '', '', NULL, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(2725, 'TRIPUTRA AGRO PERSADA GROUP', 'CORPORATE BANKING III', '2', NULL, '', '', NULL, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0),
(2726, 'USTP GROUP', 'CORPORATE BANKING III', '2', NULL, '', '', NULL, 'TRIPUTRA HOLDING GROUP', 1, '', 0, 0, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

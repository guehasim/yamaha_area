-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 12:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yamaha_area`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_area`
--

CREATE TABLE `log_area` (
  `ID_log` int(11) NOT NULL,
  `Tgl` date DEFAULT NULL,
  `Jam` time DEFAULT NULL,
  `ID_Item` varchar(255) DEFAULT NULL,
  `Operator` varchar(255) DEFAULT NULL,
  `Ket` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_area`
--

INSERT INTO `log_area` (`ID_log`, `Tgl`, `Jam`, `ID_Item`, `Operator`, `Ket`, `image`) VALUES
(90, '2022-08-09', '10:35:52', '35', '-', 'kosong', NULL),
(91, '2022-08-09', '10:35:54', '33', '-', 'kosong', NULL),
(92, '2022-08-09', '10:35:58', '35', 'junet', 'tersedia', '945f3528ce32133d104c11497580cc3c.jpg'),
(93, '2022-08-09', '10:37:38', '33', 'junet', 'tersedia', '68bb8834c28b64d380590f4af85045c3.jpg'),
(94, '2022-08-09', '10:40:41', '35', '-', 'kosong', NULL),
(95, '2022-08-09', '10:40:44', '32', '-', 'kosong', NULL),
(96, '2022-08-09', '10:40:47', '34', '-', 'kosong', NULL),
(97, '2022-08-09', '10:42:11', '34', 'junet', 'tersedia', '7f5765d7c94da53a8a1c20540e3d3e7c.jpg'),
(98, '2022-08-09', '10:42:24', '32', 'junet', 'tersedia', 'e5b3b24bb60805b6e2128307ba47a996.jpg'),
(99, '2022-08-09', '10:49:40', '35', '-', 'kosong', NULL),
(100, '2022-08-09', '10:49:42', '34', '-', 'kosong', NULL),
(101, '2022-08-09', '10:49:44', '33', '-', 'kosong', NULL),
(102, '2022-08-09', '03:49:48', '35', 'junet', 'tersedia', 'a15a144f56b4d6ca1b2f14c4fc1ef7d3.jpg'),
(103, '2022-08-09', '03:53:59', '34', 'junet', 'tersedia', 'f04f6d8baac58d1e732249c4d1666660.jpg'),
(104, '2022-08-09', '03:54:22', '33', 'junet', 'tersedia', '5729b75ed128664d7d22b26204a0410b.jpg'),
(105, '2022-08-09', '10:59:09', '32', '-', 'kosong', NULL),
(106, '2022-08-09', '10:59:11', '35', '-', 'kosong', NULL),
(107, '2022-08-09', '11:12:21', '33', '-', 'kosong', NULL),
(108, '2022-08-09', '04:13:30', '33', 'junet', 'tersedia', 'e8c3cebc78ded98709d4bc8165540e70.jpg'),
(109, '2022-08-09', '04:20:02', '35', 'junet', 'tersedia', '57c521982dfcf480a4d4c2c16c8184b6.jpg'),
(110, '2022-08-09', '04:21:56', '32', 'junet', 'tersedia', 'd2c5d751dcf13aef82a0bfd8a04af54f.jpg'),
(111, '2022-08-09', '12:00:43', '35', '-', 'kosong', NULL),
(112, '2022-08-09', '05:00:46', '35', 'junet', 'tersedia', 'f0fe8fcb17bf60543b75b981f795bcc6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `ID_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`ID_admin`, `nama`, `username`, `password`) VALUES
(1, 'administrator', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- --------------------------------------------------------

--
-- Table structure for table `m_area`
--

CREATE TABLE `m_area` (
  `ID_area` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `ID_pic` int(11) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_area`
--

INSERT INTO `m_area` (`ID_area`, `nama`, `ID_pic`, `qrcode`) VALUES
(15, 'TOILET PRIA', 2, '15.png'),
(16, 'KANTIN', 3, '16.png'),
(17, 'TOILET WANITA', 3, '17.png'),
(18, 'TES LAIN', 3, '18.png'),
(19, 'TES BARU', 3, '19.png'),
(20, 'TES BARU', 4, '20.png');

-- --------------------------------------------------------

--
-- Table structure for table `m_item`
--

CREATE TABLE `m_item` (
  `ID_item` int(11) NOT NULL,
  `ID_area` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_item`
--

INSERT INTO `m_item` (`ID_item`, `ID_area`, `item`, `status`) VALUES
(29, 15, 'HAND SHOAP', 0),
(30, 15, 'TISU', 0),
(31, 15, 'PEWANGI TOILET', 0),
(32, 16, 'SENDOK', 0),
(33, 16, 'WAJAN', 0),
(34, 16, 'KOMPOR', 0),
(35, 16, 'PIRING', 0),
(36, 17, 'TISU', 0),
(37, 17, 'HANDSOAP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_pic`
--

CREATE TABLE `m_pic` (
  `ID_pic` int(11) NOT NULL,
  `NO_pic` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `NoHP` varchar(50) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_pic`
--

INSERT INTO `m_pic` (`ID_pic`, `NO_pic`, `nama`, `NoHP`, `username`, `password`) VALUES
(2, '7654321', 'supri', '628123456789', 'supri', '5fc3024221f62819c0532d4b20ae62eed077c89b'),
(3, '5756324', 'junet', '62123456789', 'junet', 'ec99266b39c8f975b487749a467209c14ebd7b09'),
(4, '123456', 'sudron', '0812234567', 'sudron', 'c80b688d76a68000daaaa551fd61141bec4c98cb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_area`
--
ALTER TABLE `log_area`
  ADD PRIMARY KEY (`ID_log`);

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `m_area`
--
ALTER TABLE `m_area`
  ADD PRIMARY KEY (`ID_area`);

--
-- Indexes for table `m_item`
--
ALTER TABLE `m_item`
  ADD PRIMARY KEY (`ID_item`);

--
-- Indexes for table `m_pic`
--
ALTER TABLE `m_pic`
  ADD PRIMARY KEY (`ID_pic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_area`
--
ALTER TABLE `log_area`
  MODIFY `ID_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_area`
--
ALTER TABLE `m_area`
  MODIFY `ID_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `m_item`
--
ALTER TABLE `m_item`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `m_pic`
--
ALTER TABLE `m_pic`
  MODIFY `ID_pic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

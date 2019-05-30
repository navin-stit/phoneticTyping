-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 05:51 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `typing`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_picture`
--

CREATE TABLE IF NOT EXISTS `ms_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(150) NOT NULL,
  `size_photo` int(11) NOT NULL,
  `type_photo` varchar(30) NOT NULL,
  `upload_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ms_picture`
--

INSERT INTO `ms_picture` (`id`, `name_photo`, `size_photo`, `type_photo`, `upload_date`) VALUES
(1, 'p1.jpg', 2740, 'image/jpeg', '2012-01-17 20:36:11'),
(2, 'p2.jpg', 2694, 'image/jpeg', '2012-01-17 20:36:34'),
(3, 'p3.jpg', 2509, 'image/jpeg', '2012-01-17 20:36:43'),
(4, 'p4.jpg', 2824, 'image/jpeg', '2012-01-17 20:36:52'),
(5, 'p5.jpg', 2740, 'image/jpeg', '2012-01-17 20:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `namaLogin` varchar(50) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pangkat` int(11) NOT NULL,
  `verifikasi` varchar(20) NOT NULL,
  `tanggalRegister` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`namaLogin`, `namaLengkap`, `telepon`, `email`, `website`, `password`, `jabatan`, `pangkat`, `verifikasi`, `tanggalRegister`) VALUES
('admin', 'admincms', NULL, NULL, NULL, '123', 'admin', 9, 'true', '27-Dec-2011');

-- --------------------------------------------------------

--
-- Table structure for table `user_allow`
--

CREATE TABLE IF NOT EXISTS `user_allow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_allow`
--

INSERT INTO `user_allow` (`id`, `username`, `status`, `date_create`) VALUES
(1, 'wirawan', 1, '2014-08-10 07:22:35'),
(2, 'Agung', 1, '2014-08-10 07:37:46'),
(3, 'petra', 0, '2014-08-10 07:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `logindate` datetime NOT NULL,
  `ket1` varchar(200) NOT NULL,
  `ket2` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `logindate`, `ket1`, `ket2`) VALUES
(1, 'wirawan', '2014-08-10 04:03:49', '', ''),
(2, 'wirawan', '2014-08-10 04:13:46', '', ''),
(3, 'asd', '2014-08-10 04:17:41', '', ''),
(4, 'wirawan', '2014-08-10 10:37:58', '', ''),
(5, 'WIRawaN', '2014-08-10 10:50:26', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_record`
--

CREATE TABLE IF NOT EXISTS `user_record` (
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `recorddate` date NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_record`
--


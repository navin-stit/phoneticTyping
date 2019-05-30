-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2014 at 10:31 
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `logindate`, `ket1`, `ket2`) VALUES
(1, 'wirawan', '2014-08-11 08:38:20', '', ''),
(2, 'wirawan', '2014-08-11 08:47:42', '', ''),
(3, 'wirawan', '2014-08-12 08:53:59', '', ''),
(4, 'wirawan', '2014-08-12 09:00:43', '', ''),
(5, 'wirawan', '2014-08-12 09:20:31', '', ''),
(6, 'wirawan', '2014-08-12 09:23:01', '', ''),
(7, 'wirawan', '2014-08-12 10:29:39', '', ''),
(8, 'wirawan', '2014-08-12 10:33:38', '', ''),
(9, 'wirawan', '2014-08-12 10:39:31', '', ''),
(10, 'wirawan', '2014-08-12 10:46:20', '', ''),
(11, 'wirawan', '2014-08-12 10:50:51', '', ''),
(12, 'wirawan', '2014-08-12 10:52:41', '', ''),
(13, 'wirawan', '2014-08-12 10:56:23', '', ''),
(14, 'wirawan', '2014-08-12 10:59:58', '', ''),
(15, 'wirawan', '2014-08-12 11:02:19', '', ''),
(16, 'wirawan', '2014-08-12 11:11:51', '', ''),
(17, 'wirawan', '2014-08-12 11:14:40', '', ''),
(18, 'wirawan', '2014-08-11 11:16:14', '', ''),
(19, 'wirawan', '2014-08-11 11:34:35', '', ''),
(20, 'wirawan', '2014-08-11 11:37:39', '', ''),
(21, 'wirawan', '2014-08-12 11:39:22', '', ''),
(22, 'wirawan', '2014-08-12 11:53:06', '', ''),
(23, 'wirawan', '2014-08-12 11:57:57', '', ''),
(24, 'wirawan', '2014-08-12 12:00:14', '', ''),
(25, 'wirawan', '2014-08-12 12:01:55', '', ''),
(26, 'wirawan', '2014-08-12 12:04:39', '', ''),
(27, 'wirawan', '2014-08-11 12:06:57', '', ''),
(28, 'wirawan', '2014-08-11 12:12:25', '', ''),
(29, 'wirawan', '2014-08-11 12:14:38', '', ''),
(30, 'wirawan', '2014-08-11 12:16:57', '', ''),
(31, 'wirawan', '2014-08-09 12:18:08', '', ''),
(32, 'wirawan', '2014-08-11 12:20:16', '', ''),
(33, 'Agung', '2014-08-11 12:21:52', '', ''),
(34, 'wirawan', '2014-08-11 12:24:53', '', ''),
(35, 'Agung', '2014-08-13 12:28:06', '', ''),
(36, 'wirawan', '2014-08-11 14:50:07', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_record`
--

CREATE TABLE IF NOT EXISTS `user_record` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `recorddate` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_record`
--

INSERT INTO `user_record` (`no`, `id`, `nama`, `waktu`, `score`, `tanggal`, `recorddate`, `keterangan`) VALUES
(1, 1, 'wirawan', '00:00:00', 92, '2014-08-11 08:39:21', '2014-08-11', 'Lesson 1'),
(2, 1, 'wirawan', '00:00:00', 777, '2014-08-09 08:42:18', '2014-08-09', 'Lesson 1'),
(3, 1, 'wirawan', '00:00:00', 10000, '2014-08-11 08:43:00', '2014-08-11', 'Lesson 4'),
(5, 34, 'Agung', '00:00:00', 98, '2014-08-11 12:26:29', '2014-08-11', 'Lesson 3'),
(6, 34, 'Agung', '00:00:00', 95, '2014-08-11 12:25:44', '2014-08-11', 'Lesson 1');

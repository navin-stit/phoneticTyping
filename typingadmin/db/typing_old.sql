-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2012 at 01:58 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

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
  `id` int(11) NOT NULL auto_increment,
  `name_photo` varchar(150) NOT NULL,
  `size_photo` int(11) NOT NULL,
  `type_photo` varchar(30) NOT NULL,
  `upload_date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
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
  `telepon` varchar(50) default NULL,
  `email` varchar(100) default NULL,
  `website` varchar(100) default NULL,
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
('admin', 'admincms', NULL, NULL, NULL, '123123', 'admin', 9, 'true', '27-Dec-2011');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(200) NOT NULL,
  `logindate` datetime NOT NULL,
  `ket1` varchar(200) NOT NULL,
  `ket2` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `logindate`, `ket1`, `ket2`) VALUES
(23, 'wirawan', '2012-01-19 00:51:27', '', ''),
(24, 'wirawan', '2012-01-19 00:53:54', '', ''),
(25, 'adsadsd', '2012-01-19 00:56:30', '', ''),
(26, 'dfsdf', '2012-01-19 01:00:46', '', ''),
(27, 'dfsdf', '2012-01-19 01:03:13', '', ''),
(28, 'asdwww', '2012-01-19 02:16:00', '', ''),
(29, 'asdwww', '2012-01-19 02:17:09', '', ''),
(30, 'asdwww', '2012-01-19 02:19:07', '', ''),
(31, 'Dinda', '2012-01-19 02:23:46', '', ''),
(32, 'Dinda', '2012-01-19 02:25:47', '', ''),
(33, 'Dinda', '2012-01-19 02:27:14', '', ''),
(34, 'wwasd', '2012-01-19 20:40:09', '', ''),
(35, 'wirawanKerenz', '2012-01-19 20:45:16', '', ''),
(36, 'wirawanKerenz', '2012-01-19 20:46:46', '', ''),
(37, 'wirawanKerenz', '2012-01-19 20:48:23', '', ''),
(38, 'windinda', '2012-01-19 21:03:19', '', ''),
(39, 'wirawandinda', '2012-01-19 21:11:25', '', ''),
(40, 'fafa', '2012-01-19 23:17:14', '', ''),
(41, 'jjj', '2012-01-19 23:39:38', '', ''),
(42, 'asd', '2012-01-20 01:29:02', '', ''),
(43, 'asw', '2012-01-25 18:39:41', '', ''),
(44, 'asw', '2012-01-25 19:16:04', '', ''),
(45, 'wwws', '2012-01-25 19:25:46', '', ''),
(46, 'sss', '2012-01-25 19:28:23', '', ''),
(47, 'aaa', '2012-01-25 19:37:08', '', ''),
(48, 'ww', '2012-01-25 19:49:29', '', ''),
(49, 'sss', '2012-01-25 20:00:02', '', ''),
(50, 'asdsa', '2012-01-25 20:07:44', '', ''),
(51, 'asds', '2012-01-25 20:10:01', '', ''),
(52, 'ass', '2012-01-25 20:12:12', '', ''),
(53, 'sdsdwwas', '2012-01-25 20:15:07', '', ''),
(54, 'asdsdww', '2012-01-25 20:19:42', '', ''),
(55, 'asd', '2012-01-25 20:22:23', '', ''),
(56, 'wwwasd', '2012-01-25 20:25:51', '', ''),
(57, 'wwasda', '2012-01-25 20:28:40', '', ''),
(58, 'wweadasd', '2012-01-25 20:31:23', '', ''),
(59, 'aswwwdfsdf', '2012-01-25 20:36:26', '', ''),
(60, 'wwasdasd', '2012-01-25 20:39:58', '', ''),
(61, 'asdww', '2012-01-25 20:42:52', '', ''),
(62, 'wwasasd', '2012-01-25 20:46:21', '', ''),
(63, 'wsfasd', '2012-01-25 20:49:55', '', ''),
(64, 'wwdfdf', '2012-01-25 20:54:12', '', ''),
(65, 'asdww', '2012-01-29 06:20:40', '', ''),
(66, 'swwdasd', '2012-01-29 06:29:44', '', ''),
(67, 'wsd', '2012-01-29 06:32:21', '', ''),
(68, 'wwwe', '2012-01-29 06:35:23', '', ''),
(69, 'wasd', '2012-01-29 06:37:52', '', ''),
(70, 'asdw', '2012-01-29 06:42:00', '', ''),
(71, 'asds', '2012-01-29 06:47:01', '', ''),
(72, 'sdsd', '2012-01-29 06:54:37', '', ''),
(73, 'dsfe', '2012-01-29 06:57:41', '', '');

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

INSERT INTO `user_record` (`id`, `nama`, `waktu`, `score`, `tanggal`, `recorddate`, `keterangan`) VALUES
(23, 'wirawan', '00:00:00', 0, '2012-01-19 00:52:02', '2012-01-19', '2'),
(23, 'wirawan', '00:00:00', 0, '2012-01-19 00:52:42', '2012-01-19', '4'),
(28, 'asdwww', '00:00:00', 0, '2012-01-19 02:16:55', '2012-01-19', 'Assessment 2'),
(30, 'asdwww', '00:00:00', 94, '2012-01-19 02:20:42', '2012-01-19', 'Assessment 1'),
(31, 'Dinda', '00:00:00', 100, '2012-01-19 02:24:57', '2012-01-19', 'Assessment 1'),
(31, 'Dinda', '00:00:00', 90, '2012-01-19 02:25:36', '2012-01-19', 'Lesson 19'),
(32, 'Dinda', '00:00:00', 94, '2012-01-19 02:27:00', '2012-01-19', 'Assessment 2'),
(35, 'wirawanKerenz', '00:00:00', 94, '2012-01-19 20:45:49', '2012-01-19', 'Lesson 1'),
(35, 'wirawanKerenz', '00:00:00', 88, '2012-01-19 20:46:24', '2012-01-19', 'Lesson 2'),
(36, 'wirawanKerenz', '00:00:00', 92, '2012-01-19 20:47:22', '2012-01-19', 'Lesson 5'),
(37, 'wirawanKerenz', '00:00:00', 94, '2012-01-19 20:48:57', '2012-01-19', 'Lesson 1'),
(38, 'windinda', '00:00:00', 99, '2012-01-19 21:03:59', '2012-01-19', 'Lesson 1'),
(38, 'windinda', '00:00:00', 93, '2012-01-19 21:04:42', '2012-01-19', 'Lesson 5'),
(38, 'windinda', '00:00:00', 98, '2012-01-19 21:06:20', '2012-01-19', 'Assessment 1'),
(39, 'wirawandinda', '00:00:00', 96, '2012-01-19 21:11:59', '2012-01-19', 'Lesson 1'),
(39, 'wirawandinda', '00:00:00', 99, '2012-01-19 21:12:24', '2012-01-19', 'Lesson 2'),
(39, 'wirawandinda', '00:00:00', 89, '2012-01-19 21:13:15', '2012-01-19', 'Lesson 7'),
(40, 'fafa', '00:00:00', 90, '2012-01-19 23:19:54', '2012-01-19', 'Lesson 1'),
(40, 'fafa', '00:00:00', 86, '2012-01-19 23:21:41', '2012-01-19', 'Lesson 5'),
(40, 'fafa', '00:00:00', 64, '2012-01-19 23:23:12', '2012-01-19', 'Lesson 6'),
(40, 'fafa', '00:00:00', 94, '2012-01-19 23:23:20', '2012-01-19', 'Lesson 3'),
(56, 'wwwasd', '00:00:00', 100, '2012-01-25 20:26:38', '2012-01-25', 'Lesson 1'),
(57, 'wwasda', '00:00:00', 100, '2012-01-25 20:29:06', '2012-01-25', 'Lesson 1'),
(57, 'wwasda', '00:00:00', 91, '2012-01-25 20:29:35', '2012-01-25', 'Lesson 2'),
(58, 'wweadasd', '00:00:00', 96, '2012-01-25 20:32:30', '2012-01-25', 'Lesson 1'),
(64, 'wwdfdf', '00:00:00', 100, '2012-01-25 20:55:10', '2012-01-25', 'Lesson 1');

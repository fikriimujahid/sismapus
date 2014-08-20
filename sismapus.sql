-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2014 at 10:31 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sismapus`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nis` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_balik` date NOT NULL,
  `booking` int(1) NOT NULL DEFAULT '1',
  `expired` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nis`, `id_buku`, `tgl_balik`, `booking`, `expired`) VALUES
(21, 12345, 1, '2014-08-26', 1, '2014-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `kategori` int(2) DEFAULT NULL,
  `stock` int(3) DEFAULT NULL,
  `tgl_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `kategori`, `stock`, `tgl_update`) VALUES
(1, 'Analisis dan Desain Pengembangan Sistem Informasi', 'Al-Bahra Bin Ladjamudin', 'Graha Ilmu8', 1, 0, '2014-08-19 20:56:28'),
(2, 'Membuat Website Canggih dengan jQuery untuk pemula', 'Toni Kun2', 'mediakita', 1, 2, '2014-08-01 04:40:08'),
(3, 'Membuat Aplikasi GPS & Suara Antrian dengan PHP', 'Ronal Rusli', 'Toko Media', NULL, 3, '2014-07-15 11:26:32'),
(4, 'Pemrograman web dengan HTML Revisi Ketiga', 'Betha Sidik, Ir-Husni I. Pohan. Ir., M.Eng', 'Informatika', NULL, 1, '2014-08-08 21:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Ilmu Komputer'),
(3, 'estssetsts');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nis` varchar(32) NOT NULL,
  `id_buku` int(3) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_balik` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nis`, `id_buku`, `tgl_pinjam`, `tgl_balik`, `status`) VALUES
(7, '12345', 1, '2014-07-25', '2014-07-25', 0),
(9, '12345', 2, '2013-07-30', '2013-07-31', 1),
(8, '12345', 4, '2014-07-25', '2014-08-01', 1),
(10, '12345', 3, '2014-06-29', '2014-06-30', 1),
(11, '123456', 1, '2014-07-28', '2014-07-30', 1),
(12, '12110775', 1, '2014-08-08', '2014-08-15', 1),
(13, '111111', 3, '2014-08-08', '2014-08-15', 1),
(17, '111111', 4, '2014-08-08', '2014-08-15', 1),
(16, '111111', 2, '2014-08-08', '2014-08-15', 1),
(18, '111111', 4, '2014-08-08', '2014-08-15', 1),
(19, '111111', 4, '2014-08-08', '2014-08-15', 1),
(20, '111111', 4, '2014-08-08', '2014-08-15', 1),
(21, '111111', 4, '2014-08-08', '2014-08-15', 1),
(22, '111111', 4, '2014-08-08', '2014-08-15', 1),
(23, '111111', 4, '2014-08-08', '2014-08-15', 1),
(24, '111111', 4, '2014-08-08', '2014-08-15', 1),
(25, '111111', 4, '2014-08-08', '2014-08-15', 1),
(26, '111111', 4, '2014-08-08', '2014-08-15', 1),
(27, '111111', 1, '2014-08-08', '2014-08-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `nis` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(2) NOT NULL,
  `name` varchar(32) NOT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `password`, `level`, `name`, `jk`, `alamat`) VALUES
(1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Fikri', NULL, ''),
(2, '123456', '827ccb0eea8a706c4c34a16891f84e7b', 10, 'Admin', NULL, ''),
(4, '12110775', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Fikri', 'L', 'Jalan Jalan'),
(5, '18110684', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Yopita', 'P', 'ugiuub'),
(6, '111111', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'asdadda', 'L', 'asdadsasd');

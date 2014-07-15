-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2014 at 07:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sismapus`
--

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
(1, 'Analisis dan Desain Pengembangan Sistem Informasi ', 'Al-Bahra Bin Ladjamudin', 'Graha Ilmu', NULL, 3, '2014-07-08 17:00:00'),
(2, 'Membuat Website Canggih dengan jQuery untuk pemula', 'Toni Kun', 'mediakita', NULL, 4, '2014-07-15 17:00:00'),
(3, 'Membuat Aplikasi GPS & Suara Antrian dengan PHP', 'Ronal Rusli', 'Toko Media', NULL, 4, '2014-07-15 04:26:32'),
(4, 'Pemrograman web dengan HTML Revisi Ketiga', 'Betha Sidik, Ir-Husni I. Pohan. Ir., M.Eng', 'Informatika', NULL, 4, '2014-07-15 17:00:00');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis`, `password`, `level`, `name`) VALUES
(1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Fikri'),
(2, '123456', '827ccb0eea8a706c4c34a16891f84e7b', 10, 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

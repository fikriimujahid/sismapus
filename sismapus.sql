-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2014 at 11:27 AM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `nis`, `id_buku`, `tgl_balik`, `booking`) VALUES
(1, 12345, 1, '2014-07-19', 1);

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
(1, 'Analisis dan Desain Pengembangan Sistem Informasi ', 'Al-Bahra Bin Ladjamudin', 'Graha Ilmu', NULL, 0, '2014-07-20 10:23:07'),
(2, 'Membuat Website Canggih dengan jQuery untuk pemula', 'Toni Kun', 'mediakita', NULL, 4, '2014-07-16 00:00:00'),
(3, 'Membuat Aplikasi GPS & Suara Antrian dengan PHP', 'Ronal Rusli', 'Toko Media', NULL, 4, '2014-07-15 11:26:32'),
(4, 'Pemrograman web dengan HTML Revisi Ketiga', 'Betha Sidik, Ir-Husni I. Pohan. Ir., M.Eng', 'Informatika', NULL, 4, '2014-07-16 00:00:00');

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
  `denda` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nis`, `id_buku`, `tgl_pinjam`, `tgl_balik`, `denda`) VALUES
(1, '12345', 1, '2014-07-05', '2014-07-20', '10000');

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

-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2014 at 04:55 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(14) DEFAULT NULL,
  `kategori_id` int(2) DEFAULT NULL,
  `judul` varchar(35) DEFAULT NULL,
  `penerbit` varchar(32) DEFAULT NULL,
  `pengarang` varchar(32) DEFAULT NULL,
  `tahun_terbit` int(4) DEFAULT NULL,
  `edisi` varchar(5) DEFAULT NULL,
  `ISBN` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `kategori_id`, `judul`, `penerbit`, `pengarang`, `tahun_terbit`, `edisi`, `ISBN`) VALUES
(1, '23c42342c342', 1, 'ggfgdgdfg', 'dfgdgfdfg', 'dgdfgdgd', 1992, '12', '2c423c2342');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) DEFAULT NULL,
  `nis` varchar(9) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nohandphone` int(10) DEFAULT NULL,
  `jenis_user` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nis`, `password`, `nohandphone`, `jenis_user`) VALUES
(1, 'Administrator', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

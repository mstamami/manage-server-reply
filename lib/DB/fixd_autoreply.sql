-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2020 at 07:45 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixd_autoreply`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(10) NOT NULL,
  `level_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kode` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok_ada` int(1) NOT NULL DEFAULT '1',
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `user_id`, `nama`, `kode`, `deskripsi`, `stok_ada`, `aktif`) VALUES
(1, 1, 'Permen Kuat', 'FD01', 'Permen Kuat adalah untuk membuat kuat', 1, 1),
(2, 1, 'Roti Lemah', 'FD02', 'Roti yang membuat lemah atau terbuat dari lemah, pilih  sendiri', 1, 1),
(3, 1, 'product baru', 'kode', 'deskripsi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rulenya`
--

CREATE TABLE `rulenya` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `in_value_1` text NOT NULL,
  `in_value_2` text NOT NULL,
  `in_value_3` text NOT NULL,
  `in_value_4` text NOT NULL,
  `in_value_5` text NOT NULL,
  `in_value_6` text NOT NULL,
  `in_value_7` text NOT NULL,
  `in_value_8` text NOT NULL,
  `in_value_9` text NOT NULL,
  `in_value_10` text NOT NULL,
  `out_tipe` int(3) NOT NULL DEFAULT '0',
  `out_data` text NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rulenya`
--

INSERT INTO `rulenya` (`id`, `user_id`, `in_value_1`, `in_value_2`, `in_value_3`, `in_value_4`, `in_value_5`, `in_value_6`, `in_value_7`, `in_value_8`, `in_value_9`, `in_value_10`, `out_tipe`, `out_data`, `aktif`) VALUES
(1, 1, 'fixd', 'cek', '', '', '', '', '', '', '', '', 1, '', 1),
(2, 1, 'fixd', 'toko offline', '', '', '', '', '', '', '', '', 3, 'DBenk\r\n0816338875\r\nJl. Kresna 28 Kademangan\r\nBlitar, 66161.\r\nwww.dbenk.com', 1),
(3, 1, 'fixd', 'Alamat toko', '', '', '', '', '', '', '', '', 3, 'DBenk\r\n0816338875\r\nJl. Kresna 28 Kademangan\r\nBlitar, 66161.\r\nwww.dbenk.com', 1),
(4, 1, 'fixd', 'link marketplace', '', '', '', '', '', '', '', '', 3, 'Tokopedia : http://www.tokopedia.com/123\r\n\r\nBukalapak : http://www.bukalapak.com/123\r\n\r\nShopee : http://www.shopee.com/123', 1),
(5, 1, 'fixd', 'Bisa COD', '', '', '', '', '', '', '', '', 3, 'Kami melayani COD.\r\nSilahkan cek produk dengan cara :\r\nfixd cek <kode produk>\r\natau\r\nfixd produk <kodep roduk>\r\nSelanjutnya, jika berminat COD, lakukan.. bla bla', 1),
(6, 1, 'fixd', 'Cara pesan', '', '', '', '', '', '', '', '', 3, 'Cara Pesan, Silahkan tranfer ke rekening :\r\nBCA\r\nAn: Arif Kurniawan\r\nAc: 0900 732 732\r\n\r\nKemudian konfirmasi pembayaran ke : 0816979766', 1),
(7, 1, 'fixd', 'Ongkir ke', '', '', '', '', '', '', '', '', 3, 'Untuk Ongkir, silahkan cek dulu dengan cara :\r\ncek ongkir blitar <kota anda>', 1),
(8, 1, 'fixd', 'produk', '', '', '', '', '', '', '', '', 1, '', 1),
(9, 1, 'fixd', 'list', 'produk', '', '', '', '', '', '', '', 4, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level_id` int(10) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_kota` varchar(200) DEFAULT NULL,
  `user_indent` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `level_id`, `user_nama`, `user_email`, `user_pass`, `user_kota`, `user_indent`, `type`) VALUES
(1, 1, 'admin', 'admin@admin.com', 'admin', '', 0, 0),
(2, 2, 'user1', 'user@user.com', 'user1', '', 0, 0),
(3, 2, 'user2', 'user2@user.com', 'user2', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rulenya`
--
ALTER TABLE `rulenya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rulenya`
--
ALTER TABLE `rulenya`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

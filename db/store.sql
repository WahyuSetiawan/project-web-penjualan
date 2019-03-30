-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2018 at 06:13 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `password_admin` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email_admin`, `password_admin`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_bank_pembayaran` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_rekening` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_pembayaran`
--

INSERT INTO `tbl_bank_pembayaran` (`id_bank`, `nama_bank`, `atas_nama`, `no_rekening`) VALUES
(1, 'BRI', 'EKo', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pesan`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_pesan` (
  `id_detail_pesan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan_produk` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_pesan`
--

INSERT INTO `tbl_detail_pesan` (`id_detail_pesan`, `id_pesanan`, `id_produk`, `qty`, `catatan_produk`) VALUES
(3, 3, 14, 1, ''),
(4, 3, 14, 213, ''),
(5, 3, 14, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsumen`
--

CREATE TABLE IF NOT EXISTS `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(200) NOT NULL,
  `email_konsumen` varchar(200) NOT NULL,
  `password_konsumen` varchar(200) NOT NULL,
  `no_hp_konsumen` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id_konsumen`, `nama_konsumen`, `email_konsumen`, `password_konsumen`, `no_hp_konsumen`) VALUES
(1, 'Eko Rismaryanto', 'eko.rme@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '082377673248');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `no_hp_penerima` varchar(200) NOT NULL,
  `provinsi_penerima` varchar(200) NOT NULL,
  `kota_penerima` varchar(200) NOT NULL,
  `kode_pos` char(200) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_ongkir` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kode_unix` char(200) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `status_pesanan` enum('Menunggu','Konfirmasi','Dikonfirmasi') NOT NULL,
  `kurir` varchar(200) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `resi_pengiriman` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_konsumen`, `nama_penerima`, `no_hp_penerima`, `provinsi_penerima`, `kota_penerima`, `kode_pos`, `alamat`, `jumlah_ongkir`, `jumlah_pesan`, `total_bayar`, `kode_unix`, `tanggal_pesan`, `status_pesanan`, `kurir`, `id_bank`, `bukti_transfer`, `resi_pengiriman`) VALUES
(3, 1, 'Eko Rismaryanto', '12345678', 'Jambi', 'Jambi', '123', 'akdjksd', 22000, 0, 235173, '173', '2018-10-06', 'Menunggu', 'jne - OKE', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok_produk` enum('Tersedia','Kosong') NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_1` varchar(200) NOT NULL,
  `gambar_2` varchar(200) NOT NULL,
  `gambar_3` varchar(200) NOT NULL,
  `gambar_4` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `id_kategori`, `stok_produk`, `deskripsi_produk`, `harga_produk`, `gambar_1`, `gambar_2`, `gambar_3`, `gambar_4`) VALUES
(12, 'xzczxcxzc', 1, 'Kosong', 'adasd', 23123, 'uploads/file_1538796485.jpg', 'uploads/file_1538796485.jpg', '', ''),
(13, '123123', 1, 'Tersedia', '213', 213, 'uploads/file_1538796579.jpg', 'uploads/file_1538796579.jpg', '', ''),
(14, 'acczx', 1, 'Tersedia', 'adssa', 213213, 'uploads/file_15387966870.jpg', 'uploads/file_15387966871.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_produk_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk_kategori`
--

INSERT INTO `tbl_produk_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Mobil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_bank_pembayaran`
--
ALTER TABLE `tbl_bank_pembayaran`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tbl_detail_pesan`
--
ALTER TABLE `tbl_detail_pesan`
  ADD PRIMARY KEY (`id_detail_pesan`);

--
-- Indexes for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_produk_kategori`
--
ALTER TABLE `tbl_produk_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bank_pembayaran`
--
ALTER TABLE `tbl_bank_pembayaran`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_detail_pesan`
--
ALTER TABLE `tbl_detail_pesan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_produk_kategori`
--
ALTER TABLE `tbl_produk_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

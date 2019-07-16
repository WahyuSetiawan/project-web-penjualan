-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.2-dmr - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             10.0.0.5460
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for penjualan
CREATE DATABASE IF NOT EXISTS `penjualan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `penjualan`;

-- Dumping structure for table penjualan.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email_admin` varchar(200) NOT NULL,
  `password_admin` varchar(200) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_admin: ~-1 rows (approximately)
DELETE FROM `tbl_admin`;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id_admin`, `email_admin`, `password_admin`) VALUES
	(1, 'admin2@gmail.com', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_bank_pembayaran
CREATE TABLE IF NOT EXISTS `tbl_bank_pembayaran` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(200) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_bank_pembayaran: ~-1 rows (approximately)
DELETE FROM `tbl_bank_pembayaran`;
/*!40000 ALTER TABLE `tbl_bank_pembayaran` DISABLE KEYS */;
INSERT INTO `tbl_bank_pembayaran` (`id_bank`, `nama_bank`, `atas_nama`, `no_rekening`) VALUES
	(1, 'BRI', 'EKo', 12345);
/*!40000 ALTER TABLE `tbl_bank_pembayaran` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_carousell
CREATE TABLE IF NOT EXISTS `tbl_carousell` (
  `id_carousell` int(11) NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_carousell`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_carousell: ~-1 rows (approximately)
DELETE FROM `tbl_carousell`;
/*!40000 ALTER TABLE `tbl_carousell` DISABLE KEYS */;
INSERT INTO `tbl_carousell` (`id_carousell`, `sub_title`, `title`, `content`, `img`) VALUES
	(1, 'asdfasdfasasdfasdf', 'asdfasdfasdfasd', 'Contentasdfasd', 'uploads//carousell/carousell_15492895890.jpg'),
	(12, 'asdfasdfasdf', 'asdfasdfasdf', 'Contenasdftasdf', 'uploads//carousell/carousell_15492914170.jpg'),
	(13, 'adsfasdf', 'asdfasdfas', 'Casdfasdfontent', 'uploads//carousell/carousell_15492914380.jpg');
/*!40000 ALTER TABLE `tbl_carousell` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_detail_kategori
CREATE TABLE IF NOT EXISTS `tbl_detail_kategori` (
  `id_detail_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_detail_kategori: ~-1 rows (approximately)
DELETE FROM `tbl_detail_kategori`;
/*!40000 ALTER TABLE `tbl_detail_kategori` DISABLE KEYS */;
INSERT INTO `tbl_detail_kategori` (`id_detail_kategori`, `id_produk`, `id_kategori`) VALUES
	(3, 17, 1),
	(19, 18, 1),
	(20, 12, 1);
/*!40000 ALTER TABLE `tbl_detail_kategori` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_detail_pesan
CREATE TABLE IF NOT EXISTS `tbl_detail_pesan` (
  `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan_produk` text NOT NULL,
  PRIMARY KEY (`id_detail_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_detail_pesan: ~-1 rows (approximately)
DELETE FROM `tbl_detail_pesan`;
/*!40000 ALTER TABLE `tbl_detail_pesan` DISABLE KEYS */;
INSERT INTO `tbl_detail_pesan` (`id_detail_pesan`, `id_pesanan`, `id_produk`, `qty`, `catatan_produk`) VALUES
	(3, 3, 14, 1, ''),
	(4, 3, 14, 1, ''),
	(5, 3, 14, 1, ''),
	(6, 4, 14, 1, '');
/*!40000 ALTER TABLE `tbl_detail_pesan` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_gambar_produk
CREATE TABLE IF NOT EXISTS `tbl_gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `path` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_gambar_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_gambar_produk: ~-1 rows (approximately)
DELETE FROM `tbl_gambar_produk`;
/*!40000 ALTER TABLE `tbl_gambar_produk` DISABLE KEYS */;
INSERT INTO `tbl_gambar_produk` (`id_gambar_produk`, `id_produk`, `path`) VALUES
	(1, 17, 'uploads/file_15485845730.jpg'),
	(2, 18, 'uploads/file_15486067492.jpg'),
	(4, 12, 'uploads/file_15488121640.jpg');
/*!40000 ALTER TABLE `tbl_gambar_produk` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_konsumen
CREATE TABLE IF NOT EXISTS `tbl_konsumen` (
  `id_konsumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_konsumen` varchar(200) NOT NULL,
  `email_konsumen` varchar(200) NOT NULL,
  `password_konsumen` varchar(200) NOT NULL,
  `no_hp_konsumen` varchar(200) NOT NULL,
  `tmp_forgot_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_konsumen`),
  UNIQUE KEY `email_konsumen` (`email_konsumen`),
  UNIQUE KEY `tmp_forgot_password` (`tmp_forgot_password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_konsumen: ~-1 rows (approximately)
DELETE FROM `tbl_konsumen`;
/*!40000 ALTER TABLE `tbl_konsumen` DISABLE KEYS */;
INSERT INTO `tbl_konsumen` (`id_konsumen`, `nama_konsumen`, `email_konsumen`, `password_konsumen`, `no_hp_konsumen`, `tmp_forgot_password`) VALUES
	(2, 'kaskus', 'wahyu.creator911@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '080980808080', 'PCKUCS7GV5QFJU5');
/*!40000 ALTER TABLE `tbl_konsumen` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_pembelian
CREATE TABLE IF NOT EXISTS `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL DEFAULT '0',
  `id_produk` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0',
  `tanggal` datetime DEFAULT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
  PRIMARY KEY (`id_pembelian`),
  KEY `FK_tbl_pembelian_tbl_supplier` (`id_supplier`),
  KEY `FK_tbl_pembelian_tbl_produk` (`id_produk`),
  CONSTRAINT `FK_tbl_pembelian_tbl_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_pembelian_tbl_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_supplier` (`id_supplier`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_pembelian: ~-1 rows (approximately)
DELETE FROM `tbl_pembelian`;
/*!40000 ALTER TABLE `tbl_pembelian` DISABLE KEYS */;
INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_supplier`, `id_produk`, `jumlah`, `nominal`, `tanggal`, `created_at`, `updated_at`) VALUES
	(1, 3, 14, 5, 100000, NULL, '2019-01-14 19:45:22', '2019-01-14 19:53:25');
/*!40000 ALTER TABLE `tbl_pembelian` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_pesanan
CREATE TABLE IF NOT EXISTS `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
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
  `resi_pengiriman` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_pesanan: ~-1 rows (approximately)
DELETE FROM `tbl_pesanan`;
/*!40000 ALTER TABLE `tbl_pesanan` DISABLE KEYS */;
INSERT INTO `tbl_pesanan` (`id_pesanan`, `id_konsumen`, `nama_penerima`, `no_hp_penerima`, `provinsi_penerima`, `kota_penerima`, `kode_pos`, `alamat`, `jumlah_ongkir`, `jumlah_pesan`, `total_bayar`, `kode_unix`, `tanggal_pesan`, `status_pesanan`, `kurir`, `id_bank`, `bukti_transfer`, `resi_pengiriman`) VALUES
	(3, 1, 'Eko Rismaryanto', '12345678', 'Jambi', 'Jambi', '123', 'akdjksd', 22000, 0, 235173, '173', '2018-10-06', 'Menunggu', 'jne - OKE', 1, '', ''),
	(4, 2, 'kornalius agus', '08090080809808', 'DI Yogyakarta', 'Bantul', '74111', 'jalan kaliurang', 7000, 0, 127866, '866', '2019-01-25', 'Dikonfirmasi', 'pos - Paket Kilat Khusus', 1, '', '123');
/*!40000 ALTER TABLE `tbl_pesanan` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_produk
CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok_produk` enum('Tersedia','Kosong') NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_utama` varchar(200) NOT NULL DEFAULT '0',
  `gambar_1` varchar(200) NOT NULL,
  `gambar_2` varchar(200) NOT NULL,
  `gambar_3` varchar(200) NOT NULL,
  `gambar_4` varchar(200) NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `FK_tbl_produk_tbl_produk_kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_produk: ~-1 rows (approximately)
DELETE FROM `tbl_produk`;
/*!40000 ALTER TABLE `tbl_produk` DISABLE KEYS */;
INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `id_kategori`, `stok_produk`, `deskripsi_produk`, `harga_produk`, `gambar_utama`, `gambar_1`, `gambar_2`, `gambar_3`, `gambar_4`) VALUES
	(12, 'Fog Lamp', 1, 'Tersedia', '	\r\nKegunaan Foglamp pada Mobil Penembus Kabut Dengan View Jarak Jauh Terbaik\r\n\r\nPemasangan dapat dilakukan di bengkel terpercaya anda\r\nDapat digunakan secara universal (Semua Merk Mobil)\r\n\r\nMampu memperbaiki jarak pandang sampai 20m kedepan\r\nTerdapat Standing Feet sehingga dapat memperindah tampilan eksterior lampu mobil\r\n\r\nVOLT: 12v\r\nPower: 10W\r\nlum: 3200LM\r\nHousing: Aluminium Black\r\n1sets= 2 pcs +bracket\r\n\r\nUkuran Yang tersedia :\r\n- 89 mm\r\n\r\nWarna Ring Yang tersedia : \r\n- Putih & Biru \r\n\r\nMohon pada saat pembelian Disertakan Ukuran Dan warna !!!', 150000, 'uploads/file_u_1548812318.jpg', 'uploads/file_1538796485.jpg', 'uploads/file_1538796485.jpg', '', ''),
	(14, 'Jaket Touring', 2, 'Tersedia', 'kaskas', 120000, 'uploads/file_15387966870.jpg', 'uploads/file_15387966870.jpg', 'uploads/file_15387966871.jpg', '', ''),
	(17, 'kempopong', 0, 'Tersedia', 'barang kan', 10000, 'uploads/file_15387966870.jpg', '', '', '', ''),
	(18, 'asdfasdf', 0, 'Tersedia', 'asdfasdf', 234234, 'uploads/file_u_1548607459.jpg', '', '', '', '');
/*!40000 ALTER TABLE `tbl_produk` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_produk_image
CREATE TABLE IF NOT EXISTS `tbl_produk_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT '0',
  `image` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_produk_image_tbl_produk` (`id_produk`),
  CONSTRAINT `FK_tbl_produk_image_tbl_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_produk_image: ~-1 rows (approximately)
DELETE FROM `tbl_produk_image`;
/*!40000 ALTER TABLE `tbl_produk_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produk_image` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_produk_kategori
CREATE TABLE IF NOT EXISTS `tbl_produk_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table penjualan.tbl_produk_kategori: ~-1 rows (approximately)
DELETE FROM `tbl_produk_kategori`;
/*!40000 ALTER TABLE `tbl_produk_kategori` DISABLE KEYS */;
INSERT INTO `tbl_produk_kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Mobil'),
	(2, 'Motor'),
	(3, 'Lamp'),
	(4, 'Pannier'),
	(5, 'Tubullar'),
	(6, 'Engine 2'),
	(7, 'Tas'),
	(8, 'Sepatu'),
	(9, 'Helm'),
	(10, 'Kaos'),
	(11, 'Jas hujan');
/*!40000 ALTER TABLE `tbl_produk_kategori` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_settings
CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(20) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_settings: ~-1 rows (approximately)
DELETE FROM `tbl_settings`;
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` (`id`, `setting`, `value`) VALUES
	(1, 'nama_website', 'Penjualan Aksesoris Motor Tulung Agung'),
	(2, 'facebook', 'www.facebook.com/kiosmotor'),
	(3, 'instagram', 'www.instagram.com'),
	(4, 'phone', '085651xxxxxxxx'),
	(5, 'alamat', 'Jl. Diponegoro antasari'),
	(6, 'about_us', 'Toko yang berdiri pada tahun 1997, yang bertempat di surabaya yang memiliki keinginan untuk memberikan suatu kepercayaan terhadap para penikmat roda dua yang ingin memuaskan harsrat mereka akan tunggang pribadi dengan nyaman, aman dan terutama aman.'),
	(7, 'email', 'kaskus@gmail.com'),
	(8, 'no_telepon', '085651xxxxxxxx'),
	(9, 'logo', 'uploads/asset/logo/logo.png');
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;

-- Dumping structure for table penjualan.tbl_supplier
CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table penjualan.tbl_supplier: ~-1 rows (approximately)
DELETE FROM `tbl_supplier`;
/*!40000 ALTER TABLE `tbl_supplier` DISABLE KEYS */;
INSERT INTO `tbl_supplier` (`id_supplier`, `nama`, `alamat`, `telepon`) VALUES
	(1, 'Bukalapak', 'jakarta', 'xxxxxxx'),
	(3, 'Tokopedia', 'Bekasi', 'xxxxxxxx'),
	(4, 'Jakarta Street Racing', 'Jakarta Utara, Tanjung Priok', '085677xxxxxx');
/*!40000 ALTER TABLE `tbl_supplier` ENABLE KEYS */;

-- Dumping structure for view penjualan.view_stok_produk
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_produk` (
	`deskripsi_produk` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`gambar_1` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`gambar_2` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`gambar_3` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`gambar_4` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`harga_produk` INT(11) NOT NULL,
	`id_kategori` INT(11) NOT NULL,
	`id_produk` INT(11) NOT NULL,
	`jumlah_pembelian_total` DECIMAL(32,0) NOT NULL,
	`jumlah_terjual` DECIMAL(32,0) NOT NULL,
	`nama_produk` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
	`stok` DECIMAL(33,0) NOT NULL,
	`stok_produk` ENUM('Tersedia','Kosong') NOT NULL COLLATE 'latin1_swedish_ci',
	`tersedia` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view penjualan.view_stok_produk
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_produk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_produk` AS select `tbl_produk`.`id_produk` AS `id_produk`,`tbl_produk`.`nama_produk` AS `nama_produk`,`tbl_produk`.`id_kategori` AS `id_kategori`,`tbl_produk`.`stok_produk` AS `stok_produk`,`tbl_produk`.`deskripsi_produk` AS `deskripsi_produk`,`tbl_produk`.`harga_produk` AS `harga_produk`,`tbl_produk`.`gambar_1` AS `gambar_1`,`tbl_produk`.`gambar_2` AS `gambar_2`,`tbl_produk`.`gambar_3` AS `gambar_3`,`tbl_produk`.`gambar_4` AS `gambar_4`,ifnull((select sum(`tbl_pembelian`.`jumlah`) from `tbl_pembelian` where (`tbl_pembelian`.`id_produk` = `tbl_produk`.`id_produk`)),0) AS `jumlah_pembelian_total`,ifnull((select sum(`tbl_detail_pesan`.`qty`) from `tbl_detail_pesan` where (`tbl_detail_pesan`.`id_produk` = `tbl_produk`.`id_produk`)),0) AS `jumlah_terjual`,(ifnull((select sum(`tbl_pembelian`.`jumlah`) from `tbl_pembelian` where (`tbl_pembelian`.`id_produk` = `tbl_produk`.`id_produk`)),0) - ifnull((select sum(`tbl_detail_pesan`.`qty`) from `tbl_detail_pesan` where (`tbl_detail_pesan`.`id_produk` = `tbl_produk`.`id_produk`)),0)) AS `stok`,(case when (ifnull((select sum(`tbl_pembelian`.`jumlah`) from `tbl_pembelian` where (`tbl_pembelian`.`id_produk` = `tbl_produk`.`id_produk`)),0) > ifnull((select sum(`tbl_detail_pesan`.`qty`) from `tbl_detail_pesan` where (`tbl_detail_pesan`.`id_produk` = `tbl_produk`.`id_produk`)),0)) then 1 else 0 end) AS `tersedia` from `tbl_produk`;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

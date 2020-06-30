-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 09:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstylecustom`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(30) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_update`, `tanggal_post`) VALUES
(10, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420DFN0OCVP', '2020-04-20 00:00:00', 610000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:01:17', '2020-04-20 15:01:17'),
(11, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420UW52M0MV', '2020-04-20 00:00:00', 610000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:02:07', '2020-04-20 15:02:07'),
(12, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420OSNWLU19', '2020-04-20 00:00:00', 460000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:04:00', '2020-04-20 15:04:00'),
(13, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420X87SPGCZ', '2020-04-20 00:00:00', 460000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:19:59', '2020-04-20 15:19:59'),
(14, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420AIHXL0DW', '2020-04-20 00:00:00', 460000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:25:28', '2020-04-20 15:25:28'),
(15, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '200420PRAPK5HS', '2020-04-20 00:00:00', 380000, 'Konfirmasi', 380000, 'Agung', '9812987698123', 'WhatsApp_Image_2020-03-26_at_13_04_04.jpeg', 1, '20-04-20', 'BRI', '2020-04-20 13:29:36', '2020-04-20 15:26:07'),
(16, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '2004206ZIWVOSY', '2020-04-20 00:00:00', 380000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 13:32:07', '2020-04-20 15:32:07'),
(17, 0, 1, 'Agung Li', 'agungismail414@gmail.com', '089674694221', 'kp cicalengka', '2004200QLXY4BC', '2020-04-20 00:00:00', 840000, 'Sudah', 840000, 'Agung', '9812987698123', 'WhatsApp_Image_2020-03-26_at_13_04_041.jpeg', 1, '20-04-20', 'BRI', '2020-05-02 17:06:29', '2020-04-20 15:44:30'),
(19, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '110520KHQ0DVZR', '2020-05-11 00:00:00', 760000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-11 07:50:10', '2020-05-11 09:50:10'),
(20, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '090620Y2ECH0FG', '2020-06-09 00:00:00', 690000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 12:18:59', '2020-06-09 14:18:59'),
(21, 0, 2, 'Agung', 'Agung@gmail.com', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '090620LHQCIHP0', '2020-06-09 00:00:00', 230000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 13:02:23', '2020-06-09 15:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'hoodie', 'Hoodie', 1, '2020-03-20 16:56:16'),
(8, 't-shirt', 'T-Shirt', 2, '2020-04-01 10:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Style custom saestore', 'TOKO ONLINE STYLE CUSTOM', 'saestore@gmail.com', NULL, '', '', '089674694221', 'Cianjur', 'http://facebook.com/stylecustom', 'http://instagram.com/stylecustom', '', 'sae6.png', 'sae7.PNG', '', '2020-05-03 11:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(40) NOT NULL,
  `nama_pelanggan` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'Agung Li', 'agungismail414@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '089674694221', 'kp cicalengka', '2020-04-19 05:32:32', '2020-04-19 03:32:32'),
(2, 0, 'Pending', 'Agung', 'Agung@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '089674694221', 'kp. cicalengka desa.mekarmukti kec.cihampelas', '2020-04-20 14:38:14', '2020-04-20 12:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(32) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keyword` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keyword`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`, `keterangan`) VALUES
(10, 14, 1, 'Hoodie01', 'Hoodie', 'hoodie-hoodie01', '', 130000, 9, 'hoodie21.JPG', 100, 'XL', 'Publish', '2020-03-23 15:23:18', '2020-03-30 07:34:22', ''),
(11, 14, 8, 'TSHIRT01', 'T-Shirt', 't-shirt-tshirt01', '', 150000, 9, 'tshirt1.JPG', 100, 'XL', 'Publish', '2020-03-30 09:47:58', '2020-04-01 10:56:43', '<div class=\"gtx-trans-icon\"> </div>\r\n</div>\r\n\" id=\"editor\">'),
(12, 14, 1, 'Hoodie02', 'Hoddie Jumper', 'hoddie-jumper-hoodie02', 'hoodie', 230000, 9, 'hoodie1.PNG', 400, 'XL', 'Publish', '2020-03-30 09:48:45', '2020-03-30 07:48:45', '<p>hoodie</p>\r\n'),
(13, 14, 8, 'TSHIRT02', 'T-Shirt', 't-shirt-tshirt02', '', 150000, 50, 'ts.jpg', 100, 'L', 'Publish', '2020-03-30 09:49:32', '2020-04-01 10:56:37', '<div class=\"gtx-trans-icon\"> </div>\r\n</div>\r\n\" id=\"editor\">'),
(14, 14, 1, 'Hoodie03', 'Hoddie Jumper', 'hoddie-jumper-hoodie03', 'Hoodie jumper', 230000, 123, 'hoodie1.JPG', 400, 'XL', 'Publish', '2020-03-30 09:50:41', '2020-03-30 07:50:41', '<p>Hoodie jumper</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -19px; top: 38px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n'),
(15, 14, 8, 'TSHIRT03', 'T-Shirt', 't-shirt-tshirt03', '', 150000, 34, 'ts1.jpg', 100, 'XL', 'Publish', '2020-03-30 09:51:22', '2020-04-01 10:56:15', ''),
(16, 14, 1, 'Hoodie04', 'Hoddie Jumper', 'hoddie-jumper-hoodie04', 'jaket', 150000, 9, 'hoodie22.JPG', 400, 'XL', 'Publish', '2020-03-30 09:52:19', '2020-03-30 07:52:19', '<p>jaket</p>\r\n'),
(17, 14, 1, 'Hoodie05', 'Hoddie Jumper', 'hoddie-jumper-hoodie05', '', 230000, 54, 'hoodie11.JPG', 400, 'M', 'Publish', '2020-03-30 09:53:39', '2020-04-01 10:56:27', '<div class=\"gtx-trans-icon\"> </div>\r\n</div>\r\n\" id=\"editor\">'),
(19, 1, 8, 'Hoodie07', 'Hoddie Jumper', 'hoddie-jumper-hoodie07', '', 230000, 10, 'hoodie2.PNG', 400, 'M', 'Publish', '2020-04-19 06:42:07', '2020-04-19 04:42:07', ''),
(20, 0, 8, 't983', 'T-Shirt', 't-shirt-t983', 'tshirt', 150000, 10, 'tshirt12.JPG', 400, 'XL', 'Publish', '2020-06-09 15:04:36', '2020-06-09 13:04:36', '<p>tshirt</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BRI', '12341358768712', 'Agung Laksmana Ismail', 'ft.jpg', '2020-03-15 04:40:54'),
(3, 'BNI', '348761764353245', 'Prasetia Hermawan', '', '2020-03-15 11:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'agung', 'kp cicalengka, kbb', '2020-03-14 19:34:49', '2020-03-15 19:34:49'),
(2, 'dani', 'majalengka', '2020-03-14 19:41:14', '2020-03-15 19:41:14'),
(3, '', '', '2020-03-15 01:44:38', '2020-03-16 01:44:38'),
(4, '', '', '2020-03-15 01:45:19', '2020-03-16 01:45:19'),
(5, 'agung laksmana ismail', 'kp cicalengka, kbb', '2020-03-15 09:15:41', '2020-03-16 09:15:41'),
(6, 'agung', 'kp cicalengka, kbb', '2020-03-15 19:14:19', '2020-03-16 19:14:19'),
(7, 'agung', 'kp cicalengka, kbb', '2020-03-16 10:27:19', '2020-03-17 10:27:19'),
(8, 'agung', 'kp cicalengka, kbb', '2020-03-16 21:07:51', '2020-03-17 21:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_produk`, `nama_produk`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Hoodie ', 1, 230000, ''),
(2, 1, 2, 'Hoodie Jumper', 1, 230000, ''),
(3, 1, 3, 'Hoodie Jumper', 1, 230000, ''),
(4, 2, 1, 'Hoodie ', 2, 230000, ''),
(5, 2, 2, 'Hoodie Jumper', 1, 230000, ''),
(6, 2, 3, 'Hoodie Jumper', 1, 230000, ''),
(7, 3, 1, 'Hoodie ', 2, 230000, ''),
(8, 3, 2, 'Hoodie Jumper', 1, 230000, ''),
(9, 3, 3, 'Hoodie Jumper', 1, 230000, ''),
(10, 3, 21, 'T-Shirt', 1, 150000, ''),
(11, 4, 21, 'T-Shirt', 2, 150000, ''),
(12, 5, 1, 'Hoodie ', 3, 230000, ''),
(13, 5, 2, 'Hoodie Jumper', 2, 230000, ''),
(14, 5, 3, 'Hoodie Jumper', 1, 230000, ''),
(15, 5, 20, 'Hoddie Jumper', 2, 2300000, ''),
(16, 6, 1, 'Hoodie ', 2, 230000, ''),
(17, 6, 2, 'Hoodie Jumper', 1, 230000, ''),
(18, 6, 3, 'Hoodie Jumper', 1, 230000, ''),
(19, 6, 20, 'Hoddie Jumper', 1, 2300000, ''),
(20, 6, 23, 'T-Shirt', 4, 150000, ''),
(21, 7, 1, 'Hoodie ', 1, 230000, ''),
(22, 7, 2, 'Hoodie Jumper', 1, 230000, ''),
(23, 7, 3, 'Hoodie Jumper', 1, 230000, ''),
(24, 7, 20, 'Hoddie Jumper', 1, 2300000, ''),
(25, 7, 21, 'T-Shirt', 1, 150000, ''),
(26, 8, 1, 'Hoodie ', 2, 230000, ''),
(27, 8, 2, 'Hoodie Jumper', 2, 230000, ''),
(28, 8, 3, 'Hoodie Jumper', 1, 230000, ''),
(29, 8, 21, 'T-Shirt', 1, 150000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_produk SET stok = stok-NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL,
  `warna` varchar(20) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`, `warna`, `ukuran`) VALUES
(1, 'Hoodie ', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'hoodie', 230000, -2, 'hoodie.jpg', 'biru', 'L'),
(2, 'Hoodie Jumper', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX)\r\nMaterial : Cotton Terrydoor | Pleece', 'Hoodie', 230000, -2, 'hoodie1.jpg', 'Merah Maroon', 'XL'),
(3, 'Hoodie Jumper', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX)\r\nMaterial : Cotton Terrydoor | Pleece', 'Hoodie', 230000, 0, 'hoodie2.jpg', 'Hijau Army', 'XL'),
(20, 'Hoddie Jumper', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'Hoodie', 2300000, 5, 'hoodie1.PNG', '', ''),
(21, 'T-Shirt', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'T-Shirt', 150000, 4, 'tshirt11.JPG', '', ''),
(22, 'T-Shirt', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'T-Shirt', 150000, 9, 'ts.jpg', '', ''),
(25, 'T-Shirt', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'T-Shirt', 150000, 9, 'tshirt12.JPG', '', ''),
(26, 'T-Shirt', 'On Model : All Size | 53cm x 63cm | (L x P) UNISEX) Material : Cotton Terrydoor | Pleece', 'T-Shirt', 150000, 9, 'ts1.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_tansaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_tansaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 2, '200420DFN0OCVP', 17, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:01:17'),
(5, 0, 2, '200420SV5B8LYO', 19, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 12:58:38'),
(6, 0, 2, '200420AIHXL0DW', 19, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:25:28'),
(7, 0, 2, '200420AIHXL0DW', 17, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:25:28'),
(8, 0, 2, '200420PRAPK5HS', 19, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:26:07'),
(9, 0, 2, '200420PRAPK5HS', 15, 150000, 1, 150000, '2020-04-20 00:00:00', '2020-04-20 13:26:07'),
(10, 0, 2, '2004206ZIWVOSY', 17, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:32:07'),
(11, 0, 2, '2004206ZIWVOSY', 16, 150000, 1, 150000, '2020-04-20 00:00:00', '2020-04-20 13:32:07'),
(12, 0, 1, '2004200QLXY4BC', 19, 230000, 2, 460000, '2020-04-20 00:00:00', '2020-04-20 13:44:31'),
(13, 0, 1, '2004200QLXY4BC', 17, 230000, 1, 230000, '2020-04-20 00:00:00', '2020-04-20 13:44:31'),
(14, 0, 1, '2004200QLXY4BC', 16, 150000, 1, 150000, '2020-04-20 00:00:00', '2020-04-20 13:44:31'),
(15, 0, 2, '110520KHQ0DVZR', 19, 230000, 1, 230000, '2020-05-11 00:00:00', '2020-05-11 07:50:10'),
(16, 0, 2, '110520KHQ0DVZR', 17, 230000, 1, 230000, '2020-05-11 00:00:00', '2020-05-11 07:50:10'),
(17, 0, 2, '110520KHQ0DVZR', 16, 150000, 1, 150000, '2020-05-11 00:00:00', '2020-05-11 07:50:10'),
(18, 0, 2, '110520KHQ0DVZR', 15, 150000, 1, 150000, '2020-05-11 00:00:00', '2020-05-11 07:50:10'),
(19, 0, 2, '090620Y2ECH0FG', 19, 230000, 2, 460000, '2020-06-09 00:00:00', '2020-06-09 12:18:59'),
(20, 0, 2, '090620Y2ECH0FG', 17, 230000, 1, 230000, '2020-06-09 00:00:00', '2020-06-09 12:18:59'),
(21, 0, 2, '090620LHQCIHP0', 19, 230000, 1, 230000, '2020-06-09 00:00:00', '2020-06-09 13:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(0, 'prasetya', 'prasetya@gmail.com', 'prasetya', 'fb19d583c53e486ebb7a4669da6519fcf0ba142d', 'Admin', '2020-05-02 15:33:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_tansaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_tansaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

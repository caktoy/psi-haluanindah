-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2014 at 10:01 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hit_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_id_pengiriman`()
BEGIN
	SET @jumlah = (SELECT max(id_pengiriman) FROM pengiriman);
	SET @id_pengiriman = @jumlah+1;
	SELECT @id_pengiriman AS "id_pengiriman";
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procedure_1`(IN param1 int)
BEGIN
	SET @NILAI = (SELECT COUNT(*) FROM KOTA);
	SELECT @NILAI+1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procIdPengiriman`()
BEGIN
	SET @MAX_ID = (SELECT MAX(ID_PENGIRIMAN) FROM PENGIRIMAN);
	SET @NEW_ID = @MAX_ID + 1;
	SELECT @NEW_ID  AS "NEW_ID";
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(10) DEFAULT NULL,
  `ADMIN_PASSWORD` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_PASSWORD`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JENIS_BARANG` int(11) DEFAULT NULL,
  `NAMA_BARANG` varchar(30) DEFAULT NULL,
  `BERAT_BARANG` decimal(8,2) DEFAULT NULL,
  `SATUAN_BARANG` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_BARANG`),
  KEY `FK_BARANG_BERJENIS_JENIS_BARANG` (`ID_JENIS_BARANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_JENIS_BARANG`, `NAMA_BARANG`, `BERAT_BARANG`, `SATUAN_BARANG`) VALUES
(1, 2, 'Meja American Wooden', 10.00, 'kg'),
(2, 4, 'Beras Raja Lele', 500.00, 'kg'),
(3, 2, 'Plastik Alumunium Foil', 100.00, 'kg'),
(4, 2, 'Balok Kayu', 100.00, 'kg'),
(5, 2, 'Paku Beton', 10.00, 'kg'),
(6, 2, 'Paku Beton', 10.00, 'kg'),
(7, 5, 'Kain Perca', 50.00, 'kg'),
(8, 5, 'Kertas HVS', 50.00, 'kg'),
(9, 2, 'Komponen Mesin Pencetak Uang', 20.00, 'kg'),
(10, 3, 'Kaca Plat Pencetak Uang', 15.00, 'kg'),
(11, 5, 'Kertas Bahan Uang', 5.00, 'kg'),
(12, 3, 'Kaca Plat Pencetak Uang', 15.00, 'kg'),
(13, 3, 'Kaca Plat Pencetak Uang', 15.00, 'kg'),
(14, 3, 'Kaca Plat Pencetak Uang', 15.00, 'kg'),
(15, 1, 'Minyak Tanah Mentah', 50.00, 'kg'),
(16, 4, 'Tepung Terigu', 150.00, 'kg'),
(17, 4, 'Pangan Ikan', 100.00, 'kg'),
(18, 5, 'Bahan baku pembuat plastik', 150.00, 'kg'),
(19, 5, 'Kertas Bahan Uang', 30.00, 'kg'),
(20, 2, 'Balok Kayu', 150.00, 'kg'),
(21, 2, 'Plastik Alumunium Foil', 20.00, 'kg'),
(22, 4, 'Tepung Terigu', 100.00, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_pengiriman`
--

CREATE TABLE IF NOT EXISTS `biaya_pengiriman` (
  `ID_BIAYA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA_ASAL` int(11) DEFAULT NULL,
  `ID_KOTA_TUJUAN` int(11) DEFAULT NULL,
  `TOTAL_BERAT` decimal(8,2) DEFAULT NULL,
  `BIAYA` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`ID_BIAYA`),
  KEY `FK_BIAYA_PENGIRIMAN_DARI_KOTA` (`ID_KOTA_ASAL`),
  KEY `FK_BIAYA_PENGIRIMAN_KE_KOTA` (`ID_KOTA_TUJUAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `biaya_pengiriman`
--

INSERT INTO `biaya_pengiriman` (`ID_BIAYA`, `ID_KOTA_ASAL`, `ID_KOTA_TUJUAN`, `TOTAL_BERAT`, `BIAYA`) VALUES
(1, 1, 1, 50.00, 20000.00),
(2, 1, 3, 100.00, 500000.00),
(3, 1, 6, 40.00, 75000.00),
(4, 1, 4, 50.00, 35000.00),
(5, 1, 5, 50.00, 45000.00),
(7, 1, 2, 40.00, 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `bidang_kerja`
--

CREATE TABLE IF NOT EXISTS `bidang_kerja` (
  `ID_BIDANG_KERJA` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_BIDANG_KERJA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_BIDANG_KERJA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bidang_kerja`
--

INSERT INTO `bidang_kerja` (`ID_BIDANG_KERJA`, `NAMA_BIDANG_KERJA`) VALUES
(1, 'Pertanian'),
(3, 'Meubel dan Furniture'),
(4, 'Pertambangan');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID_CUST` int(11) NOT NULL AUTO_INCREMENT,
  `ID_BIDANG_KERJA` int(11) DEFAULT NULL,
  `EMAIL_CUST` varchar(50) NOT NULL,
  `PASSWORD_CUST` varchar(20) NOT NULL,
  `NAMA_CUST` varchar(50) DEFAULT NULL,
  `JENIS_KEL_CUST` char(1) DEFAULT NULL,
  `TGL_LAHIR_CUST` date DEFAULT NULL,
  `ALAMAT_CUST` varchar(100) DEFAULT NULL,
  `KOTA_CUST` varchar(50) DEFAULT NULL,
  `NO_TELP_CUST` char(15) DEFAULT NULL,
  `PERUSAHAAN_CUST` varchar(50) DEFAULT NULL,
  `ALAMAT_PER_CUST` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CUST`),
  UNIQUE KEY `EMAIL_CUST` (`EMAIL_CUST`),
  KEY `FK_CUSTOMER_BERBIDANG_KERJA` (`ID_BIDANG_KERJA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_CUST`, `ID_BIDANG_KERJA`, `EMAIL_CUST`, `PASSWORD_CUST`, `NAMA_CUST`, `JENIS_KEL_CUST`, `TGL_LAHIR_CUST`, `ALAMAT_CUST`, `KOTA_CUST`, `NO_TELP_CUST`, `PERUSAHAAN_CUST`, `ALAMAT_PER_CUST`) VALUES
(1, 3, 'thony.caktoy@gmail.com', '26101993', 'Thony Hermawan', 'L', '1993-10-26', 'Jl. Tenggilis Lama 3B No. 38A', 'Surabaya', '085755300811', 'Kupu Corp', 'Jl. Seluruh Surabaya No. 1'),
(2, 1, 'obygothic@gmail.com', 'obysetyawan', 'M. Oby Maulana', 'L', '1993-08-31', '', '', '', '', ''),
(4, 1, 'dwicbk@ymail.com', 'dwicbk', 'Dwi Prasetyo Pambudi', 'L', '1993-09-20', 'Jl. Sambikerep No. 100', 'Surabaya', '085646737818', 'UD. Rianti Jaya Makmur', 'Jl. Sambikerep No. 100-101'),
(5, 1, 'cumapian@gmail.com', '123', 'Septyan', 'L', '2014-05-22', 'Manukan', 'Surabaya', '085647298', 'UD. Rianti Jaya Makmur', 'Manukan'),
(6, 3, 'johanes@gmail.com', 'jojo', 'Johanes Aditya', 'L', '1992-08-12', 'Jl. Perum. Nirwana Blok VII No.86', 'Surabaya', '085638010929', 'CV. Karunia Bakti Bersama', 'Jl. Kedung Baruk No. 98 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `detil_pengiriman`
--

CREATE TABLE IF NOT EXISTS `detil_pengiriman` (
  `ID_BARANG` int(11) DEFAULT NULL,
  `ID_PENGIRIMAN` int(11) DEFAULT NULL,
  KEY `FK_DETIL_PENGIRIMAN_BERISI_BARANG` (`ID_BARANG`),
  KEY `FK_DETIL_PENGIRIMAN_DARI_PENGIRIMAN` (`ID_PENGIRIMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_pengiriman`
--

INSERT INTO `detil_pengiriman` (`ID_BARANG`, `ID_PENGIRIMAN`) VALUES
(3, 1006),
(4, 1006),
(7, 1001),
(6, 1006),
(8, 1008),
(9, 1009),
(14, 1009),
(15, 1010),
(16, 1011),
(17, 1012),
(18, 1013),
(19, 1014),
(20, 1015),
(21, 1016),
(22, 1016);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `ID_JENIS_BARANG` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_BARANG` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS_BARANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`ID_JENIS_BARANG`, `JENIS_BARANG`) VALUES
(1, 'Cair mudah terbakar'),
(2, 'Benda padat keras'),
(3, 'Benda padat rawan pecah'),
(4, 'Bahan pangan'),
(5, 'Padat mudah terbakar');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `ID_KOTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROVINSI` int(11) DEFAULT NULL,
  `NAMA_KOTA` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_KOTA`),
  KEY `FK_KOTA_BERASAL_PROVINSI` (`ID_PROVINSI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_KOTA`, `ID_PROVINSI`, `NAMA_KOTA`) VALUES
(1, 1, 'Surabaya'),
(2, 2, 'Samarinda'),
(3, 3, 'Bandung'),
(4, 1, 'Sidoarjo'),
(5, 1, 'Pasuruan'),
(6, 5, 'Aceh');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `ID_PENGIRIMAN` int(11) NOT NULL,
  `ID_BIAYA` int(11) DEFAULT NULL,
  `TGL_PENGIRIMAN` date DEFAULT NULL,
  `BIAYA_PENGIRIMAN` decimal(8,2) DEFAULT NULL,
  `NAMA_PENERIMA` varchar(50) DEFAULT NULL,
  `TUJUAN_PENGIRIMAN` varchar(50) DEFAULT NULL,
  `ALAMAT_PENERIMA` varchar(100) DEFAULT NULL,
  `BERAT_PENGIRIMAN` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`ID_PENGIRIMAN`),
  KEY `FK_PENGIRIMAN_MEMPUNYAI_BIAYA_PENGIRIMAN` (`ID_BIAYA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`ID_PENGIRIMAN`, `ID_BIAYA`, `TGL_PENGIRIMAN`, `BIAYA_PENGIRIMAN`, `NAMA_PENERIMA`, `TUJUAN_PENGIRIMAN`, `ALAMAT_PENERIMA`, `BERAT_PENGIRIMAN`) VALUES
(1001, 1, '2014-05-22', 100000.00, 'Risqi Kurniawan', 'PT. Joyo Agromulyo', 'Jalan Anggrek No. 109', 0.00),
(1002, 2, '2014-05-24', 500000.00, 'Rio Sonja', 'PT. Karnamu Aku Ada', 'Jl. Cinta Kasih No. 69 Bandung', 0.00),
(1003, 2, '2014-05-24', 500000.00, 'Johanes', 'PT. Joyo Agromulyo', 'Jl. Indah ', 0.00),
(1006, 1, '2014-05-27', 100000.00, 'Moh. Oby Maulana', 'PT. Gunung Sari Merdeka', 'Jl. Sumatera No. 202-205', 0.00),
(1008, 3, '2014-05-28', 75000.00, 'Ali Bachtiar', 'PT. Karangan Indah Semesta', 'Jl. Nusantara No. 16', 0.00),
(1009, 5, '2014-05-30', 45000.00, 'Moh. Oby Maulana', 'CV. Kami Sayang Anda', 'Jl. Kusumo No. 86 Bangil', 0.00),
(1010, 7, '2014-06-02', 100000.00, 'Rio Sonja Permana', 'PT. Karangan Indah Semesta', 'Jl. Nias Nusantara No. 190-201', 50.00),
(1011, 7, '2014-06-05', 100000.00, 'Thony Hermawan', 'PT. Semoga Tidak Bencana', 'Jl. Selamat No. 99', 150.00),
(1012, 7, '2014-06-02', 100000.00, 'Dwi Prasetyo', 'PT. Pesona Bahari Nusantara', 'Jl. Cinggarum No. 24-29', 100.00),
(1013, 5, '2014-06-04', 45000.00, 'Thony Hermawan', 'PT. Sumbangan Suka Rela', 'Jl. Pandaan Malang Km. 30', 150.00),
(1014, 4, '2014-05-31', 35000.00, 'Moh. Oby Maulana', 'PT. Semoga Tidak Bencana', 'Jl. Sidoarjo Malang Km. 40', 30.00),
(1015, 5, '2014-05-31', 45000.00, 'Thony Hermawan', 'PT. Karnamu Aku Ada', 'Jl. Pandaan-Malang Km 30', 150.00),
(1016, 2, '2014-05-31', 500000.00, 'Johanes Aditya', 'PT. Karangan Indah Semesta', 'Jl. Cidangkeum Industri Blok III No. 297', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `ID_PROVINSI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PROVINSI` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_PROVINSI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`ID_PROVINSI`, `NAMA_PROVINSI`) VALUES
(1, 'Jawa Timur'),
(2, 'Kalimantan Timur'),
(3, 'Jawa Barat'),
(4, 'Sumatra Utara'),
(5, 'Sumatera');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengiriman`
--

CREATE TABLE IF NOT EXISTS `status_pengiriman` (
  `STATUS_PENGIRIMAN` varchar(30) NOT NULL,
  `KETERANGAN` text,
  PRIMARY KEY (`STATUS_PENGIRIMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pengiriman`
--

INSERT INTO `status_pengiriman` (`STATUS_PENGIRIMAN`, `KETERANGAN`) VALUES
('Pengambilan Barang', 'Barang yang ingin Anda kirimkan sedang dalam proses pengambilan barang ke tempat perusahaan/intitusi'),
('Pengemasan', 'Permintaan pengiriman barang Anda dalam tahap pengemasan, hal ini dilakukan untuk keamanan kondisi b'),
('Pengiriman', 'Permintaan pengiriman Anda sudah atau sedang dalam proses pengiriman.'),
('Penurunan Barang', 'Pengiriman barang telah sampai dipelabuhan atau tujuan yang Anda inginkan.'),
('Sedang Diproses', 'Permintaan pengiriman barang Anda sedang diproses secara administratif untuk tahap berikutnya.'),
('Selesai', 'Pengiriman barang yang Anda minta sudah terlaksana dengan baik.'),
('Serah Terima', 'Barang yang Anda kirimkan sudah sampai ditujuan dan sudah diterima oleh penerima yang Anda tujukan.');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `NO_RESI` varchar(10) NOT NULL,
  `ID_PENGIRIMAN` int(11) DEFAULT NULL,
  `ID_CUST` int(11) DEFAULT NULL,
  `STATUS_PENGIRIMAN` varchar(30) NOT NULL,
  `TANGGAL` date NOT NULL,
  `POSISI` varchar(30) DEFAULT NULL,
  `KETERANGAN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NO_RESI`,`STATUS_PENGIRIMAN`),
  KEY `FK_DETIL_TRACKING_PENGIRIMAN` (`ID_PENGIRIMAN`),
  KEY `FK_TRACKING_DILAKUKAN_CUSTOMER` (`ID_CUST`),
  KEY `FK_TRACKING_MEMPUNYAI_STATUS` (`STATUS_PENGIRIMAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`NO_RESI`, `ID_PENGIRIMAN`, `ID_CUST`, `STATUS_PENGIRIMAN`, `TANGGAL`, `POSISI`, `KETERANGAN`) VALUES
('BMHS819050', 1013, 2, 'Sedang Diproses', '2014-05-31', 'Surabaya', ''),
('HCGG933312', 1015, 5, 'Pengambilan Barang', '2014-05-31', 'Pasuruan', 'Barang Anda sudah kami ambil di tempat yang Anda m'),
('HCGG933312', 1015, 5, 'Sedang Diproses', '2014-05-31', 'Surabaya', ''),
('MGOH973487', 1012, 2, 'Sedang Diproses', '2014-05-31', 'Surabaya', ''),
('RXK001', 1001, 4, 'Sedang Diproses', '2014-05-21', 'Surabaya', ''),
('RXK002', 1006, 4, 'Sedang Diproses', '2014-05-24', 'Surabaya', ''),
('RXK003', 1008, 1, 'Sedang Diproses', '2014-05-25', 'Surabaya', NULL),
('VGDR253575', 1014, 5, 'Sedang Diproses', '2014-05-31', 'Surabaya', ''),
('VJPX324744', 1016, 5, 'Sedang Diproses', '2014-05-31', 'Surabaya', ''),
('VPFB067573', 1011, 6, 'Sedang Diproses', '2014-05-27', 'Surabaya', ''),
('YOFX719159', 1010, 1, 'Sedang Diproses', '2014-05-27', 'Surabaya', ''),
('YVVN191918', 1009, 1, 'Pengambilan Barang', '2014-05-25', 'Surabaya', ''),
('YVVN191918', 1009, 1, 'Pengemasan', '2014-05-25', 'Surabaya', ''),
('YVVN191918', 1009, 1, 'Pengiriman', '2014-05-31', 'Surabaya', ''),
('YVVN191918', 1009, 1, 'Sedang Diproses', '2014-05-25', 'Surabaya', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
--
CREATE TABLE IF NOT EXISTS `view_barang` (
`id_barang` int(11)
,`jenis_barang` varchar(30)
,`nama_barang` varchar(30)
,`berat_barang` decimal(8,2)
,`satuan_barang` varchar(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_biaya`
--
CREATE TABLE IF NOT EXISTS `view_biaya` (
`id_biaya` int(11)
,`kota_asal` varchar(30)
,`kota_tujuan` varchar(30)
,`total_berat` decimal(8,2)
,`biaya` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cari_biaya`
--
CREATE TABLE IF NOT EXISTS `view_cari_biaya` (
`id_biaya` int(11)
,`id_kota_tujuan` int(11)
,`nama_kota_tujuan` varchar(30)
,`total_berat` decimal(8,2)
,`biaya` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_customer`
--
CREATE TABLE IF NOT EXISTS `view_customer` (
`ID_CUST` int(11)
,`NAMA_BIDANG_KERJA` varchar(50)
,`EMAIL_CUST` varchar(50)
,`PASSWORD_CUST` varchar(20)
,`NAMA_CUST` varchar(50)
,`JENIS_KEL_CUST` char(1)
,`TGL_LAHIR_CUST` date
,`ALAMAT_CUST` varchar(100)
,`KOTA_CUST` varchar(50)
,`NO_TELP_CUST` char(15)
,`PERUSAHAAN_CUST` varchar(50)
,`ALAMAT_PER_CUST` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detil_barang_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_detil_barang_pengiriman` (
`id_pengiriman` int(11)
,`id_barang` int(11)
,`nama_barang` varchar(30)
,`berat_barang` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detil_pengiriman_barang`
--
CREATE TABLE IF NOT EXISTS `view_detil_pengiriman_barang` (
`id_cust` int(11)
,`id_pengiriman` int(11)
,`id_barang` int(11)
,`nama_barang` varchar(30)
,`berat_barang` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_det_tracking`
--
CREATE TABLE IF NOT EXISTS `view_det_tracking` (
`no_resi` varchar(10)
,`tanggal` date
,`posisi` varchar(30)
,`status_pengiriman` varchar(30)
,`nama_barang` varchar(30)
,`jenis_barang` varchar(30)
,`berat_barang` decimal(8,2)
,`nama_penerima` varchar(50)
,`tujuan_pengiriman` varchar(50)
,`biaya_pengiriman` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_history_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_history_pengiriman` (
`id_cust` int(11)
,`id_pengiriman` int(11)
,`no_resi` varchar(10)
,`tgl_pengiriman` date
,`nama_penerima` varchar(50)
,`tujuan_pengiriman` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jumlah_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_jumlah_pengiriman` (
`kota` varchar(30)
,`jumlah` bigint(21)
,`bulan` int(2)
,`tahun` int(4)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan_pengiriman_bulanan`
--
CREATE TABLE IF NOT EXISTS `view_laporan_pengiriman_bulanan` (
`id_pengiriman` int(11)
,`nama_cust` varchar(50)
,`nama_kota` varchar(30)
,`berat_pengiriman` decimal(30,2)
,`tanggal` int(2)
,`bulan` int(2)
,`tahun` int(4)
,`status_pengiriman` varchar(30)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_list_tracking`
--
CREATE TABLE IF NOT EXISTS `view_list_tracking` (
`no_resi` varchar(10)
,`id_pengiriman` int(11)
,`id_cust` int(11)
,`nama_cust` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_pengiriman` (
`id_pengiriman` int(11)
,`nama_penerima` varchar(50)
,`tgl_pengiriman` date
,`kota_tujuan` varchar(30)
,`biaya_pengiriman` decimal(8,2)
,`tujuan_pengiriman` varchar(50)
,`alamat_penerima` varchar(100)
,`berat_pengiriman` decimal(8,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sum_berat_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_sum_berat_pengiriman` (
`id_pengiriman` int(11)
,`tot_berat` decimal(30,2)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_surat_pengiriman`
--
CREATE TABLE IF NOT EXISTS `view_surat_pengiriman` (
`id_pengiriman` int(11)
,`nama_penerima` varchar(50)
,`nama_cust` varchar(50)
,`tgl_pengiriman` date
);
-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang` AS select `b`.`ID_BARANG` AS `id_barang`,`j`.`JENIS_BARANG` AS `jenis_barang`,`b`.`NAMA_BARANG` AS `nama_barang`,`b`.`BERAT_BARANG` AS `berat_barang`,`b`.`SATUAN_BARANG` AS `satuan_barang` from (`barang` `b` join `jenis_barang` `j`) where (`b`.`ID_JENIS_BARANG` = `j`.`ID_JENIS_BARANG`);

-- --------------------------------------------------------

--
-- Structure for view `view_biaya`
--
DROP TABLE IF EXISTS `view_biaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_biaya` AS select `biaya_pengiriman`.`ID_BIAYA` AS `id_biaya`,(select `k`.`NAMA_KOTA` from (`kota` `k` join `biaya_pengiriman` `b`) where (`k`.`ID_KOTA` = `b`.`ID_KOTA_ASAL`)) AS `kota_asal`,(select `k`.`NAMA_KOTA` from (`kota` `k` join `biaya_pengiriman` `b`) where (`k`.`ID_KOTA` = `b`.`ID_KOTA_TUJUAN`)) AS `kota_tujuan`,`biaya_pengiriman`.`TOTAL_BERAT` AS `total_berat`,`biaya_pengiriman`.`BIAYA` AS `biaya` from `biaya_pengiriman`;

-- --------------------------------------------------------

--
-- Structure for view `view_cari_biaya`
--
DROP TABLE IF EXISTS `view_cari_biaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cari_biaya` AS select `b`.`ID_BIAYA` AS `id_biaya`,`b`.`ID_KOTA_TUJUAN` AS `id_kota_tujuan`,`k`.`NAMA_KOTA` AS `nama_kota_tujuan`,`b`.`TOTAL_BERAT` AS `total_berat`,`b`.`BIAYA` AS `biaya` from (`biaya_pengiriman` `b` join `kota` `k`) where (`b`.`ID_KOTA_TUJUAN` = `k`.`ID_KOTA`);

-- --------------------------------------------------------

--
-- Structure for view `view_customer`
--
DROP TABLE IF EXISTS `view_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_customer` AS select `c`.`ID_CUST` AS `ID_CUST`,`b`.`NAMA_BIDANG_KERJA` AS `NAMA_BIDANG_KERJA`,`c`.`EMAIL_CUST` AS `EMAIL_CUST`,`c`.`PASSWORD_CUST` AS `PASSWORD_CUST`,`c`.`NAMA_CUST` AS `NAMA_CUST`,`c`.`JENIS_KEL_CUST` AS `JENIS_KEL_CUST`,`c`.`TGL_LAHIR_CUST` AS `TGL_LAHIR_CUST`,`c`.`ALAMAT_CUST` AS `ALAMAT_CUST`,`c`.`KOTA_CUST` AS `KOTA_CUST`,`c`.`NO_TELP_CUST` AS `NO_TELP_CUST`,`c`.`PERUSAHAAN_CUST` AS `PERUSAHAAN_CUST`,`c`.`ALAMAT_PER_CUST` AS `ALAMAT_PER_CUST` from (`customer` `c` join `bidang_kerja` `b`) where (`b`.`ID_BIDANG_KERJA` = `c`.`ID_BIDANG_KERJA`);

-- --------------------------------------------------------

--
-- Structure for view `view_detil_barang_pengiriman`
--
DROP TABLE IF EXISTS `view_detil_barang_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detil_barang_pengiriman` AS select `p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`b`.`ID_BARANG` AS `id_barang`,`b`.`NAMA_BARANG` AS `nama_barang`,`b`.`BERAT_BARANG` AS `berat_barang` from ((`pengiriman` `p` join `detil_pengiriman` `d`) join `barang` `b`) where ((`p`.`ID_PENGIRIMAN` = `d`.`ID_PENGIRIMAN`) and (`b`.`ID_BARANG` = `d`.`ID_BARANG`));

-- --------------------------------------------------------

--
-- Structure for view `view_detil_pengiriman_barang`
--
DROP TABLE IF EXISTS `view_detil_pengiriman_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detil_pengiriman_barang` AS select `c`.`ID_CUST` AS `id_cust`,`p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`b`.`ID_BARANG` AS `id_barang`,`b`.`NAMA_BARANG` AS `nama_barang`,`b`.`BERAT_BARANG` AS `berat_barang` from ((((`pengiriman` `p` join `detil_pengiriman` `d`) join `barang` `b`) join `customer` `c`) join `tracking` `t`) where ((`p`.`ID_PENGIRIMAN` = `d`.`ID_PENGIRIMAN`) and (`d`.`ID_BARANG` = `b`.`ID_BARANG`) and (`c`.`ID_CUST` = `t`.`ID_CUST`) and (`t`.`ID_PENGIRIMAN` = `p`.`ID_PENGIRIMAN`));

-- --------------------------------------------------------

--
-- Structure for view `view_det_tracking`
--
DROP TABLE IF EXISTS `view_det_tracking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_det_tracking` AS select `t`.`NO_RESI` AS `no_resi`,`t`.`TANGGAL` AS `tanggal`,`t`.`POSISI` AS `posisi`,`t`.`STATUS_PENGIRIMAN` AS `status_pengiriman`,`b`.`NAMA_BARANG` AS `nama_barang`,`j`.`JENIS_BARANG` AS `jenis_barang`,`b`.`BERAT_BARANG` AS `berat_barang`,`p`.`NAMA_PENERIMA` AS `nama_penerima`,`p`.`TUJUAN_PENGIRIMAN` AS `tujuan_pengiriman`,`p`.`BIAYA_PENGIRIMAN` AS `biaya_pengiriman` from (((((`tracking` `t` join `pengiriman` `p`) join `customer` `c`) join `detil_pengiriman` `d`) join `barang` `b`) join `jenis_barang` `j`) where ((`c`.`ID_CUST` = `t`.`ID_CUST`) and (`t`.`ID_PENGIRIMAN` = `p`.`ID_PENGIRIMAN`) and (`p`.`ID_PENGIRIMAN` = `d`.`ID_PENGIRIMAN`) and (`d`.`ID_BARANG` = `b`.`ID_BARANG`) and (`b`.`ID_JENIS_BARANG` = `j`.`ID_JENIS_BARANG`));

-- --------------------------------------------------------

--
-- Structure for view `view_history_pengiriman`
--
DROP TABLE IF EXISTS `view_history_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_pengiriman` AS select `c`.`ID_CUST` AS `id_cust`,`p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`t`.`NO_RESI` AS `no_resi`,`p`.`TGL_PENGIRIMAN` AS `tgl_pengiriman`,`p`.`NAMA_PENERIMA` AS `nama_penerima`,`p`.`TUJUAN_PENGIRIMAN` AS `tujuan_pengiriman` from ((`pengiriman` `p` join `tracking` `t`) join `customer` `c`) where ((`p`.`ID_PENGIRIMAN` = `t`.`ID_PENGIRIMAN`) and (`c`.`ID_CUST` = `t`.`ID_CUST`));

-- --------------------------------------------------------

--
-- Structure for view `view_jumlah_pengiriman`
--
DROP TABLE IF EXISTS `view_jumlah_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_pengiriman` AS select distinct `k`.`NAMA_KOTA` AS `kota`,count(`p`.`ID_PENGIRIMAN`) AS `jumlah`,month(`p`.`TGL_PENGIRIMAN`) AS `bulan`,year(`p`.`TGL_PENGIRIMAN`) AS `tahun` from ((`kota` `k` join `pengiriman` `p`) join `biaya_pengiriman` `b`) where ((`p`.`ID_BIAYA` = `b`.`ID_BIAYA`) and (`b`.`ID_KOTA_TUJUAN` = `k`.`ID_KOTA`)) group by `k`.`NAMA_KOTA`;

-- --------------------------------------------------------

--
-- Structure for view `view_laporan_pengiriman_bulanan`
--
DROP TABLE IF EXISTS `view_laporan_pengiriman_bulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan_pengiriman_bulanan` AS select distinct `p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`c`.`NAMA_CUST` AS `nama_cust`,`k`.`NAMA_KOTA` AS `nama_kota`,sum(`b`.`BERAT_BARANG`) AS `berat_pengiriman`,dayofmonth(`p`.`TGL_PENGIRIMAN`) AS `tanggal`,month(`p`.`TGL_PENGIRIMAN`) AS `bulan`,year(`p`.`TGL_PENGIRIMAN`) AS `tahun`,`t`.`STATUS_PENGIRIMAN` AS `status_pengiriman` from ((((((`pengiriman` `p` join `customer` `c`) join `barang` `b`) join `detil_pengiriman` `d`) join `tracking` `t`) join `biaya_pengiriman` `bp`) join `kota` `k`) where ((`c`.`ID_CUST` = `t`.`ID_CUST`) and (`t`.`ID_PENGIRIMAN` = `p`.`ID_PENGIRIMAN`) and (`p`.`ID_PENGIRIMAN` = `d`.`ID_PENGIRIMAN`) and (`d`.`ID_BARANG` = `b`.`ID_BARANG`) and (`p`.`ID_BIAYA` = `bp`.`ID_BIAYA`) and (`k`.`ID_KOTA` = `bp`.`ID_KOTA_TUJUAN`)) group by `p`.`ID_PENGIRIMAN`;

-- --------------------------------------------------------

--
-- Structure for view `view_list_tracking`
--
DROP TABLE IF EXISTS `view_list_tracking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list_tracking` AS select distinct `t`.`NO_RESI` AS `no_resi`,`t`.`ID_PENGIRIMAN` AS `id_pengiriman`,`c`.`ID_CUST` AS `id_cust`,`c`.`NAMA_CUST` AS `nama_cust` from (`customer` `c` join `tracking` `t`) where (`c`.`ID_CUST` = `t`.`ID_CUST`) order by `t`.`NO_RESI`;

-- --------------------------------------------------------

--
-- Structure for view `view_pengiriman`
--
DROP TABLE IF EXISTS `view_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengiriman` AS select `p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`p`.`NAMA_PENERIMA` AS `nama_penerima`,`p`.`TGL_PENGIRIMAN` AS `tgl_pengiriman`,`k`.`NAMA_KOTA` AS `kota_tujuan`,`p`.`BIAYA_PENGIRIMAN` AS `biaya_pengiriman`,`p`.`TUJUAN_PENGIRIMAN` AS `tujuan_pengiriman`,`p`.`ALAMAT_PENERIMA` AS `alamat_penerima`,`p`.`BERAT_PENGIRIMAN` AS `berat_pengiriman` from ((`pengiriman` `p` join `biaya_pengiriman` `b`) join `kota` `k`) where ((`p`.`ID_BIAYA` = `b`.`ID_BIAYA`) and (`b`.`ID_KOTA_TUJUAN` = `k`.`ID_KOTA`));

-- --------------------------------------------------------

--
-- Structure for view `view_sum_berat_pengiriman`
--
DROP TABLE IF EXISTS `view_sum_berat_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sum_berat_pengiriman` AS select `view_detil_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`,sum(`view_detil_pengiriman_barang`.`berat_barang`) AS `tot_berat` from `view_detil_pengiriman_barang` group by `view_detil_pengiriman_barang`.`id_pengiriman`;

-- --------------------------------------------------------

--
-- Structure for view `view_surat_pengiriman`
--
DROP TABLE IF EXISTS `view_surat_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_surat_pengiriman` AS select distinct `p`.`ID_PENGIRIMAN` AS `id_pengiriman`,`p`.`NAMA_PENERIMA` AS `nama_penerima`,`c`.`NAMA_CUST` AS `nama_cust`,`p`.`TGL_PENGIRIMAN` AS `tgl_pengiriman` from ((`pengiriman` `p` join `tracking` `t`) join `customer` `c`) where ((`p`.`ID_PENGIRIMAN` = `t`.`ID_PENGIRIMAN`) and (`c`.`ID_CUST` = `t`.`ID_CUST`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_BARANG_BERJENIS_JENIS_BARANG` FOREIGN KEY (`ID_JENIS_BARANG`) REFERENCES `jenis_barang` (`ID_JENIS_BARANG`);

--
-- Constraints for table `biaya_pengiriman`
--
ALTER TABLE `biaya_pengiriman`
  ADD CONSTRAINT `FK_BIAYA_PENGIRIMAN_DARI_KOTA` FOREIGN KEY (`ID_KOTA_ASAL`) REFERENCES `kota` (`ID_KOTA`),
  ADD CONSTRAINT `FK_BIAYA_PENGIRIMAN_KE_KOTA` FOREIGN KEY (`ID_KOTA_TUJUAN`) REFERENCES `kota` (`ID_KOTA`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_CUSTOMER_BERBIDANG_KERJA` FOREIGN KEY (`ID_BIDANG_KERJA`) REFERENCES `bidang_kerja` (`ID_BIDANG_KERJA`);

--
-- Constraints for table `detil_pengiriman`
--
ALTER TABLE `detil_pengiriman`
  ADD CONSTRAINT `FK_DETIL_PENGIRIMAN_BERISI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_DETIL_PENGIRIMAN_DARI_PENGIRIMAN` FOREIGN KEY (`ID_PENGIRIMAN`) REFERENCES `pengiriman` (`ID_PENGIRIMAN`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `FK_KOTA_BERASAL_PROVINSI` FOREIGN KEY (`ID_PROVINSI`) REFERENCES `provinsi` (`ID_PROVINSI`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `FK_PENGIRIMAN_MEMPUNYAI_BIAYA_PENGIRIMAN` FOREIGN KEY (`ID_BIAYA`) REFERENCES `biaya_pengiriman` (`ID_BIAYA`);

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `FK_DETIL_TRACKING_PENGIRIMAN` FOREIGN KEY (`ID_PENGIRIMAN`) REFERENCES `pengiriman` (`ID_PENGIRIMAN`),
  ADD CONSTRAINT `FK_TRACKING_DILAKUKAN_CUSTOMER` FOREIGN KEY (`ID_CUST`) REFERENCES `customer` (`ID_CUST`),
  ADD CONSTRAINT `FK_TRACKING_MEMPUNYAI_STATUS` FOREIGN KEY (`STATUS_PENGIRIMAN`) REFERENCES `status_pengiriman` (`STATUS_PENGIRIMAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 14 Nov 2020 pada 05.48
-- Versi server: 5.7.26
-- Versi PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rusunawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_name`
--

DROP TABLE IF EXISTS `access_name`;
CREATE TABLE IF NOT EXISTS `access_name` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_name`
--

INSERT INTO `access_name` (`access_id`, `display_name`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Role', 'Role-View', NULL, 'Inject', NULL, NULL, NULL),
(2, 'Role Add', 'Role-Add', NULL, NULL, NULL, NULL, NULL),
(3, 'Role Edit', 'Role-Edit', NULL, NULL, NULL, NULL, NULL),
(4, 'Role Delete', 'Role-Delete', NULL, NULL, NULL, NULL, NULL),
(5, 'User', 'User-View', NULL, NULL, NULL, NULL, NULL),
(6, 'User Add', 'User-Add', NULL, NULL, NULL, NULL, NULL),
(7, 'User Edit', 'User-Edit', NULL, NULL, NULL, NULL, NULL),
(8, 'User Delete', 'User-Delete', NULL, NULL, NULL, NULL, NULL),
(9, 'Permission', 'Permission-View', NULL, NULL, NULL, NULL, NULL),
(10, 'Permission Add', 'Permission-Add', NULL, NULL, NULL, NULL, NULL),
(11, 'Permission Edit', 'Permission-Edit', NULL, NULL, NULL, NULL, NULL),
(12, 'Permission Delete', 'Permission-Delete', NULL, NULL, NULL, NULL, NULL),
(58, 'Pengaturan Add', 'Informasi-Add', 'Menu Untuk Pengaturan Informasi', 'Super Administrator', '2019-12-01 11:15:24', NULL, NULL),
(53, 'Tagihan View', 'Tagihan-View', 'Menu Untuk Membuat Tagihan', 'Super Administrator', '2019-12-01 11:09:18', NULL, NULL),
(57, 'Pengaturan View', 'Informasi-View', 'Menu Untuk Pengaturan Informasi', 'Super Administrator', '2019-12-01 11:15:24', NULL, NULL),
(54, 'Tagihan Add', 'Tagihan-Add', 'Menu Untuk Membuat Tagihan', 'Super Administrator', '2019-12-01 11:09:18', NULL, NULL),
(17, 'Master Bulan', 'Bulan-View', 'Menu Untuk Master Bulan', 'Super Administrator', '2019-10-24 08:48:06', NULL, NULL),
(18, 'Bulan Edit', 'Bulan-Edit', 'Menu Untuk Mengubah Bulan', 'Super Administrator', '2019-10-24 08:48:34', NULL, NULL),
(19, 'Bulan Add', 'Bulan-Add', 'Menu Untuk Menambahkan Bulan', 'Super Administrator', '2019-10-24 08:49:02', NULL, NULL),
(20, 'Bulan Delete', 'Bulan-Delete', 'Menu Untuk Menghaspus Bulan', 'Super Administrator', '2019-10-24 08:49:23', NULL, NULL),
(21, 'Tahun', 'Tahun-View', 'Menu Untuk Menampilkan Tahun', 'Super Administrator', '2019-10-25 03:46:08', NULL, NULL),
(22, 'Tahun Add', 'Tahun-Add', 'Menu Untuk Menambah Tahun', 'Super Administrator', '2019-10-25 03:46:28', NULL, NULL),
(23, 'Tahun Edit', 'Tahun-Edit', 'Menu Untuk Mengubah Tahun', 'Super Administrator', '2019-10-25 03:46:51', NULL, NULL),
(24, 'Tahun Delete', 'Tahun-Delete', 'Menu Untuk Mengahus Tahun', 'Super Administrator', '2019-10-25 03:47:24', NULL, NULL),
(25, 'Tipe Sewa', 'TipeSewa-View', 'Menu Tipe Sewa', 'Super Administrator', '2019-10-25 05:45:09', NULL, NULL),
(26, 'Tipe Sewa Add', 'TipeSewa-Add', 'TipeSewa Tambah Data', 'Super Administrator', '2019-10-25 05:45:30', NULL, NULL),
(27, 'Tipe Sewa Edit', 'TipeSewa-Edit', 'Menu Tipe Sewa Edit', 'Super Administrator', '2019-10-25 05:45:54', NULL, NULL),
(28, 'Tipe Sewa Delete', 'TipeSewa-Delete', 'TipeSewa Delete Data', 'Super Administrator', '2019-10-25 05:46:15', NULL, NULL),
(29, 'Unit Sewa', 'UnitSewa-View', NULL, 'Super Administrator', '2019-10-25 06:13:11', NULL, NULL),
(30, 'UnitSewa Add', 'UnitSewa-Add', 'Unit Sewa Add', 'Super Administrator', '2019-10-25 06:13:28', NULL, NULL),
(31, 'Unit Sewa Edit', 'UnitSewa-Edit', 'UnitSewa', 'Super Administrator', '2019-10-25 06:13:46', NULL, NULL),
(32, 'UnitSewa Delete', 'UnitSewa-Delete', 'UnitSewa', 'Super Administrator', '2019-10-25 06:14:06', NULL, NULL),
(33, 'Check In', 'CheckIn-View', 'Cek in', 'Super Administrator', '2019-10-26 20:46:43', 'Super Administrator', '2019-10-26 20:47:32'),
(34, 'Check In Add', 'CheckIn-Add', NULL, 'Super Administrator', '2019-10-26 20:46:51', NULL, NULL),
(35, 'Check In Edit', 'CheckIn-Edit', NULL, 'Super Administrator', '2019-10-26 20:47:01', NULL, NULL),
(36, 'Check In Delete', 'CheckIn-Delete', NULL, 'Super Administrator', '2019-10-26 20:47:14', NULL, NULL),
(37, 'Penyewa', 'Penyewa-View', 'Menu Untuk Penyewa', 'Super Administrator', '2019-10-26 20:50:13', 'Super Administrator', '2019-10-26 20:50:24'),
(38, 'Penyewa Add', 'Penyewa-Add', NULL, 'Super Administrator', '2019-10-26 20:50:34', NULL, NULL),
(39, 'Penyewa Edit', 'Penyewa-Edit', NULL, 'Super Administrator', '2019-10-26 20:50:42', NULL, NULL),
(40, 'Penyewa Delete', 'Penyewa-Delete', NULL, 'Super Administrator', '2019-10-26 20:50:54', NULL, NULL),
(41, 'Rusun', 'Rusun-View', 'Menu Untuk Master Rusun', 'Super Administrator', '2019-11-30 10:58:41', NULL, NULL),
(42, 'Rusun Add', 'Rusun-Add', NULL, 'Super Administrator', '2019-11-30 10:58:56', NULL, NULL),
(43, 'Rusun Edit', 'Rusun-Edit', NULL, 'Super Administrator', '2019-11-30 10:59:15', NULL, NULL),
(44, 'Rusun Delete', 'Rusun-Delete', NULL, 'Super Administrator', '2019-11-30 10:59:31', NULL, NULL),
(51, 'Pembayaran Edit', 'Pembayaran-Edit', 'Menu Untuk Pembayaran', 'Super Administrator', '2019-11-30 13:37:47', NULL, NULL),
(50, 'Pembayaran Add', 'Pembayaran-Add', 'Menu Untuk Pembayaran', 'Super Administrator', '2019-11-30 13:37:47', NULL, NULL),
(49, 'Pembayaran View', 'Pembayaran-View', 'Menu Untuk Pembayaran', 'Super Administrator', '2019-11-30 13:37:47', NULL, NULL),
(52, 'Pembayaran Delete', 'Pembayaran-Delete', 'Menu Untuk Pembayaran', 'Super Administrator', '2019-11-30 13:37:47', NULL, NULL),
(55, 'Tagihan Edit', 'Tagihan-Edit', 'Menu Untuk Membuat Tagihan', 'Super Administrator', '2019-12-01 11:09:18', NULL, NULL),
(56, 'Tagihan Delete', 'Tagihan-Delete', 'Menu Untuk Membuat Tagihan', 'Super Administrator', '2019-12-01 11:09:18', NULL, NULL),
(59, 'Pengaturan Edit', 'Informasi-Edit', 'Menu Untuk Pengaturan Informasi', 'Super Administrator', '2019-12-01 11:15:24', NULL, NULL),
(60, 'Pengaturan Delete', 'Informasi-Delete', 'Menu Untuk Pengaturan Informasi', 'Super Administrator', '2019-12-01 11:15:24', NULL, NULL),
(61, 'User Role View', 'UserRole-View', 'Akses User Role', 'Super Administrator', '2019-12-31 05:24:51', NULL, NULL),
(62, 'User Role Add', 'UserRole-Add', 'Akses User Role', 'Super Administrator', '2019-12-31 05:24:51', NULL, NULL),
(63, 'User Role Edit', 'UserRole-Edit', 'Akses User Role', 'Super Administrator', '2019-12-31 05:24:51', NULL, NULL),
(64, 'User Role Delete', 'UserRole-Delete', 'Akses User Role', 'Super Administrator', '2019-12-31 05:24:51', NULL, NULL),
(65, 'CheckOut View', 'CheckOut-View', 'Akses CheckOut', 'Super Administrator', '2020-02-04 04:59:25', NULL, NULL),
(69, 'CashFlow View', 'CashFlow-View', 'Permisiion CashFlow', 'Super Administrator', '2020-02-06 08:00:05', NULL, NULL),
(67, 'CheckOut Edit', 'CheckOut-Edit', 'Akses CheckOut', 'Super Administrator', '2020-02-04 04:59:25', NULL, NULL),
(70, 'CashFlow Add', 'CashFlow-Add', 'Permisiion CashFlow', 'Super Administrator', '2020-02-06 08:00:05', NULL, NULL),
(71, 'CashFlow Edit', 'CashFlow-Edit', 'Permisiion CashFlow', 'Super Administrator', '2020-02-06 08:00:05', NULL, NULL),
(72, 'CashFlow Delete', 'CashFlow-Delete', 'Permisiion CashFlow', 'Super Administrator', '2020-02-06 08:00:05', NULL, NULL),
(73, 'Dispensasi View', 'Dispensasi-View', 'Role Untuk Dispensasi', 'Super Administrator', '2020-08-12 11:12:15', NULL, NULL),
(74, 'Dispensasi Add', 'Dispensasi-Add', 'Role Untuk Dispensasi', 'Super Administrator', '2020-08-12 11:12:15', NULL, NULL),
(75, 'Dispensasi Edit', 'Dispensasi-Edit', 'Role Untuk Dispensasi', 'Super Administrator', '2020-08-12 11:12:15', NULL, NULL),
(76, 'Dispensasi Delete', 'Dispensasi-Delete', 'Role Untuk Dispensasi', 'Super Administrator', '2020-08-12 11:12:15', NULL, NULL),
(77, 'Laporan Harian View', 'LaporanHarian-View', 'Laporan Harian', 'Super Administrator', '2020-08-15 11:21:01', NULL, NULL),
(81, 'Laporan Bulanan View', 'LaporanBulanan-View', 'Perimission Untuk Laporan Bulanan', 'Super Administrator', '2020-08-15 13:01:23', NULL, NULL),
(85, 'LaporanTahunan View', 'LaporanTahunan-View', 'LaporanTahunan', 'Super Administrator', '2020-09-11 12:41:34', NULL, NULL),
(89, 'ResumePenyewa View', 'ResumePenyewa-View', 'ResumePenyewa', 'Super Administrator', '2020-09-11 12:42:05', NULL, NULL),
(93, 'Daftar Penyewa View', 'DaftarPenyewa-View', 'Daftar Penyewa', 'Super Administrator', '2020-09-11 12:42:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role`
--

DROP TABLE IF EXISTS `access_role`;
CREATE TABLE IF NOT EXISTS `access_role` (
  `group_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role`
--

INSERT INTO `access_role` (`group_id`, `access_id`) VALUES
(1, 81),
(1, 77),
(1, 69),
(1, 67),
(1, 65),
(1, 50),
(1, 49),
(1, 54),
(1, 53),
(1, 36),
(1, 35),
(1, 34),
(1, 33),
(1, 40),
(1, 39),
(1, 38),
(1, 37),
(1, 76),
(1, 75),
(1, 74),
(1, 73),
(1, 32),
(1, 31),
(1, 30),
(1, 29),
(1, 28),
(1, 27),
(1, 26),
(1, 25),
(1, 24),
(1, 23),
(1, 22),
(1, 21),
(1, 20),
(1, 18),
(1, 19),
(1, 17),
(1, 44),
(1, 43),
(1, 42),
(1, 41),
(1, 59),
(1, 57),
(1, 63),
(1, 61),
(1, 8),
(2, 56),
(2, 55),
(2, 54),
(2, 53),
(2, 36),
(2, 35),
(2, 34),
(2, 33),
(2, 40),
(2, 39),
(2, 38),
(2, 37),
(2, 31),
(2, 30),
(2, 29),
(2, 59),
(2, 57),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(4, 37),
(4, 33),
(4, 53),
(4, 49),
(4, 50),
(1, 7),
(1, 6),
(1, 5),
(2, 49),
(2, 50),
(1, 4),
(1, 3),
(1, 2),
(1, 1),
(1, 12),
(1, 11),
(1, 10),
(1, 9),
(5, 41),
(5, 25),
(5, 29),
(1, 85),
(1, 89),
(1, 93);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_group`
--

DROP TABLE IF EXISTS `access_role_group`;
CREATE TABLE IF NOT EXISTS `access_role_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(250) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_group`
--

INSERT INTO `access_role_group` (`group_id`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Super Administrator', 'Role Group Untuk Admin', 'Inject', '2019-10-24 05:23:00', 'Super Administrator', '2020-09-11 00:43:40'),
(2, 'Admin Rusun', 'Role Untuk Admin Rusun', 'Super Administrator', '2019-12-02 23:22:56', 'Super Administrator', '2020-02-03 18:17:34'),
(3, 'admin tagihan', 'petugas penginput tagihan', 'Super Administrator', '2019-12-14 20:25:07', NULL, NULL),
(4, 'kasir', 'menerima pembayaran', 'Super Administrator', '2019-12-14 20:26:05', NULL, NULL),
(5, 'Dinas Perkim', NULL, 'Super Administrator', '2020-08-15 18:23:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_users`
--

DROP TABLE IF EXISTS `access_role_users`;
CREATE TABLE IF NOT EXISTS `access_role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_role_users_access_role_group_id_group_fk` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_users`
--

INSERT INTO `access_role_users` (`id`, `group_id`, `users_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(7, 5, 4),
(5, 4, 5),
(8, 5, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

DROP TABLE IF EXISTS `bulan`;
CREATE TABLE IF NOT EXISTS `bulan` (
  `Bulan_Id` smallint(6) NOT NULL,
  `Nama_Bulan` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Bulan_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`Bulan_Id`, `Nama_Bulan`, `Singkatan`) VALUES
(1, 'Januari', 'Jan'),
(2, 'Febuari', 'Feb'),
(3, 'Maret', 'Mar'),
(4, 'April', 'Apr'),
(5, 'Mei', 'Mei'),
(6, 'Juni', 'Jun'),
(7, 'Juli', 'Jul'),
(8, 'Agustus', 'Ags'),
(9, 'September', 'Sep'),
(10, 'Oktober', 'Okt'),
(11, 'November', 'Nov'),
(12, 'Desember', 'Des');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cash_flow`
--

DROP TABLE IF EXISTS `cash_flow`;
CREATE TABLE IF NOT EXISTS `cash_flow` (
  `Cash_Flow_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Tgl_Trans` datetime DEFAULT NULL,
  `Item_Pembayaran_Id` smallint(6) DEFAULT NULL,
  `Jml_Masuk` int(11) DEFAULT NULL,
  `Jml_Keluar` int(11) DEFAULT NULL,
  `Jml_Subsidi` int(11) DEFAULT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Cash_Flow_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cash_flow`
--

INSERT INTO `cash_flow` (`Cash_Flow_Id`, `Tgl_Trans`, `Item_Pembayaran_Id`, `Jml_Masuk`, `Jml_Keluar`, `Jml_Subsidi`, `Keterangan`, `Created_By`, `Created_Date`, `Modified_By`, `Modified_Date`) VALUES
(3, '2020-07-20 23:08:27', 3, 1982000, NULL, NULL, 'Penerimaan Iuran Air', NULL, NULL, NULL, NULL),
(4, '2020-07-20 23:08:52', 1, 100000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(5, '2020-07-20 23:08:52', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(6, '2020-07-19 00:00:00', 2, NULL, 2250000, NULL, 'Pembayaran Listrik', NULL, NULL, NULL, NULL),
(7, '2020-07-20 23:17:18', 1, 25000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(8, '2020-07-20 23:17:18', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(9, '2020-07-21 00:20:01', 2, NULL, 25000, NULL, NULL, 'Super Administrator', '2020-07-21 00:20:01', NULL, NULL),
(10, '2020-07-21 00:42:09', 2, 3502000, NULL, NULL, 'Penerimaan Iuran Listrik', NULL, NULL, NULL, NULL),
(11, '2020-07-21 00:42:40', 1, 25000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(12, '2020-07-21 00:42:40', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(13, '2020-07-21 00:43:29', 3, 2303000, NULL, NULL, 'Penerimaan Iuran Air', NULL, NULL, NULL, NULL),
(14, '2020-07-21 00:44:12', 2, NULL, 250000, NULL, 'Pembayaran Listrik Agustus', 'Super Administrator', '2020-07-21 00:44:12', NULL, NULL),
(15, '2020-07-21 00:44:41', 1, 150000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(16, '2020-07-21 00:44:41', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(17, '2020-07-21 00:44:41', 1, 150000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(18, '2020-07-21 00:44:41', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(19, '2020-07-21 20:43:39', 1, 100000, NULL, NULL, 'Penerimaan Sewa Unit Bulanan', NULL, NULL, NULL, NULL),
(20, '2020-07-21 20:43:39', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL),
(21, '2020-08-15 19:05:13', 2, 1785600, NULL, NULL, 'Penerimaan Iuran Listrik', NULL, NULL, NULL, NULL),
(22, '2020-08-15 19:05:13', 2, 1785600, NULL, NULL, 'Penerimaan Iuran Listrik', NULL, NULL, NULL, NULL),
(23, '2020-08-15 19:36:57', 2, 1785600, NULL, NULL, 'Penerimaan Iuran Listrik', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_in`
--

DROP TABLE IF EXISTS `check_in`;
CREATE TABLE IF NOT EXISTS `check_in` (
  `Check_In_Id` varchar(50) NOT NULL,
  `Unit_Sewa_Id` smallint(6) NOT NULL,
  `Penyewa_Id` int(11) NOT NULL,
  `Tipe_Sewa_Id` varchar(10) DEFAULT NULL,
  `Tgl_Check_In` datetime DEFAULT NULL,
  `Listrik_Awal` int(11) DEFAULT NULL,
  `Air_Awal` int(11) DEFAULT NULL,
  `Tgl_Check_Out` datetime DEFAULT NULL,
  `Listrik_Akhir` int(11) DEFAULT NULL,
  `Air_Akhir` int(11) DEFAULT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Check_Out` int(11) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Mofied_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Check_In_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `check_in`
--

INSERT INTO `check_in` (`Check_In_Id`, `Unit_Sewa_Id`, `Penyewa_Id`, `Tipe_Sewa_Id`, `Tgl_Check_In`, `Listrik_Awal`, `Air_Awal`, `Tgl_Check_Out`, `Listrik_Akhir`, `Air_Akhir`, `Keterangan`, `Check_Out`, `Created_By`, `Created_Date`, `Modified_By`, `Mofied_Date`) VALUES
('20191109-0001', 1, 1, 'bln', '2019-11-09 00:00:00', 900, 1200, NULL, NULL, NULL, 'Cekin - 20191109-0001', NULL, 'Super Administrator', '2019-11-30 19:49:51', NULL, NULL),
('20191130-0001', 2, 2, 'bln', '2019-11-30 00:00:00', 900, 900, NULL, NULL, NULL, 'Cekin - 20191130-0001', NULL, 'Super Administrator', '2019-11-30 22:17:41', NULL, NULL),
('20191201-0001', 3, 3, 'hr', '2019-12-01 00:00:00', 325, 560, '2020-02-04 00:00:00', NULL, NULL, 'Cekin - 20191201-0001', 1, 'Super Administrator', '2019-12-01 01:48:30', NULL, NULL),
('20200204-0001', 4, 5, 'pkt', '2020-02-04 00:00:00', 1560, 1250, NULL, NULL, NULL, 'Cekin - 20200204-0001', NULL, 'Super Administrator', '2020-02-04 12:15:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungan_keluarga`
--

DROP TABLE IF EXISTS `hubungan_keluarga`;
CREATE TABLE IF NOT EXISTS `hubungan_keluarga` (
  `Hub_Keluarga_Id` smallint(6) NOT NULL AUTO_INCREMENT,
  `Nama_Hub_Keluarga` varchar(250) DEFAULT NULL,
  `Urut` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`Hub_Keluarga_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungan_keluarga`
--

INSERT INTO `hubungan_keluarga` (`Hub_Keluarga_Id`, `Nama_Hub_Keluarga`, `Urut`) VALUES
(1, 'Istri', 1),
(2, 'Suami', 2),
(3, 'Anak', 3),
(4, 'Saudara', 4),
(5, 'Ayah', 5),
(6, 'Ibu', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pembayaran`
--

DROP TABLE IF EXISTS `item_pembayaran`;
CREATE TABLE IF NOT EXISTS `item_pembayaran` (
  `Item_Pembayaran_Id` int(11) NOT NULL,
  `Kode_Item` varchar(50) DEFAULT NULL,
  `Nama_Item` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(10) DEFAULT NULL,
  `Urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`Item_Pembayaran_Id`),
  UNIQUE KEY `Item_Pembayaran_Item_Pembayaran_Id_uindex` (`Item_Pembayaran_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_pembayaran`
--

INSERT INTO `item_pembayaran` (`Item_Pembayaran_Id`, `Kode_Item`, `Nama_Item`, `Singkatan`, `Urut`) VALUES
(1, 'SWB', 'Sewa Unit Bulanan', 'Sewa Bulan', 1),
(2, 'LIS', 'Iuran Listrik', 'Listrik', 2),
(3, 'AIR', 'Iuran Air', 'Air', NULL),
(4, 'SMP', 'Iuran Kebersihan', 'Kebersihan', NULL),
(5, 'UJMN', 'Uang Jaminan', 'U.Jaminan', NULL),
(6, 'SNON', 'Sewa Non Hunian', 'Sewa Non H', NULL),
(7, 'DSWB', 'Denda Sewa Bulanan', 'D.SewaBln', NULL),
(8, 'DLIS', 'Denda Iuran Listrik', 'D.Listrik', 2),
(9, 'DAIR', 'Denda Iuran Air', 'D.Air', 3),
(10, 'DSMP', 'Denda Iuran Kebersih', 'D.Kebersi', NULL),
(11, 'DSWN', 'Denda Sewa Non Hunia', 'D.SewaNon', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_stand_meter`
--

DROP TABLE IF EXISTS `jns_stand_meter`;
CREATE TABLE IF NOT EXISTS `jns_stand_meter` (
  `Jns_Stand_Meter_Id` smallint(6) NOT NULL DEFAULT '0',
  `Nama_Stand_Meter` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Jns_Stand_Meter_Id`),
  UNIQUE KEY `"Jns_Stand_Meter"_"Jns_Stand_Meter_Id"_uindex` (`Jns_Stand_Meter_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jns_stand_meter`
--

INSERT INTO `jns_stand_meter` (`Jns_Stand_Meter_Id`, `Nama_Stand_Meter`) VALUES
(1, 'Listrik'),
(2, 'Air');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstr_dispensasi`
--

DROP TABLE IF EXISTS `mstr_dispensasi`;
CREATE TABLE IF NOT EXISTS `mstr_dispensasi` (
  `Dispensasi_Id` int(12) NOT NULL AUTO_INCREMENT,
  `Penyewa_Id` int(12) NOT NULL,
  `Persen_Dispen` int(12) NOT NULL,
  `Bulan_Mulai` int(12) NOT NULL,
  `Tahun_Mulai` int(12) NOT NULL,
  `Bulan_Selesai` int(12) NOT NULL,
  `Tahun_Selesai` int(12) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `Created_Date` datetime NOT NULL,
  `Created_By` varchar(255) NOT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Dispensasi_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstr_dispensasi`
--

INSERT INTO `mstr_dispensasi` (`Dispensasi_Id`, `Penyewa_Id`, `Persen_Dispen`, `Bulan_Mulai`, `Tahun_Mulai`, `Bulan_Selesai`, `Tahun_Selesai`, `Keterangan`, `Created_Date`, `Created_By`, `Modified_Date`, `Modified_By`) VALUES
(2, 1, 10, 6, 2020, 8, 2020, 'Dana Bantuan Pemkot Magelang : SK/VII/002/MGL/2020', '2020-08-15 18:15:08', 'Super Administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstr_option`
--

DROP TABLE IF EXISTS `mstr_option`;
CREATE TABLE IF NOT EXISTS `mstr_option` (
  `Section` varchar(250) DEFAULT NULL,
  `Keys` varchar(250) DEFAULT NULL,
  `Data` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstr_option`
--

INSERT INTO `mstr_option` (`Section`, `Keys`, `Data`) VALUES
('Default Tanggal Pembayaran', 'DefTglByr', '11'),
('Default Denda Telat Bayar', 'DefDendBayar', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstr_rusun`
--

DROP TABLE IF EXISTS `mstr_rusun`;
CREATE TABLE IF NOT EXISTS `mstr_rusun` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rusun` varchar(255) NOT NULL,
  `nama_rusun` varchar(250) NOT NULL,
  `alamat_rusun` varchar(250) NOT NULL,
  `nama_kasubag_tu` varchar(200) NOT NULL,
  `nip_kasubag_tu` varchar(200) NOT NULL,
  `nama_kepala_dpu` varchar(200) NOT NULL,
  `nip_kepala_dpu` varchar(200) NOT NULL,
  `nama_kepala_upt` varchar(200) NOT NULL,
  `nip_kepala_upt` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstr_rusun`
--

INSERT INTO `mstr_rusun` (`info_id`, `kode_rusun`, `nama_rusun`, `alamat_rusun`, `nama_kasubag_tu`, `nip_kasubag_tu`, `nama_kepala_dpu`, `nip_kepala_dpu`, `nama_kepala_upt`, `nip_kepala_upt`, `status`) VALUES
(1, 'TDR', 'Rusunawa Tidar', 'Jl. Pegangsaan Timur No.32', 'Andi Nurhidayat', '103.201.366.20', 'Nur Rahmawati', '103.201.325.11', 'Adi Nurcahyo', '103.222.315.22', 0),
(2, '02', 'Rusunawa Jogjakarta', 'Jl. Wonosari', 'Adi Hidayar', '12344.04487', 'Onno W Purbo', '1124.1114.00', 'Untung Kasunan', '233145.010.111', 0),
(4, 'PTB', 'Rusunawa Potrobangsan', 'Jl. Potrobangasan No.32', 'Wawan Kurniawa', '103.201.366.20', 'Onno W Purbo', '103.201.325.11', 'Adem Dan', '103.222.315.22', 0),
(5, 'WTS', 'RUSUS WATES', 'Sanggrahan Magelang', 'Budiyono', '123', 'Handini', '456', 'Budi Prakosa', '789', 0),
(6, '05', 'Rusunawa Kota Panjatan', 'Panjatan, Kulon Progo', 'Abudul Rozak Fackrudin', '223.0012.012', 'Ahmad Arifin', '223.0013.013', 'Dimas Andrean', '223.0012.015', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `Pembayaran_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Check_In_Id` varchar(250) DEFAULT NULL,
  `Tagihan_Id` int(11) NOT NULL,
  `Tgl_Bayar` datetime DEFAULT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Pembayaran_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`Pembayaran_Id`, `Check_In_Id`, `Tagihan_Id`, `Tgl_Bayar`, `Keterangan`, `Created_By`, `Created_Date`, `Modified_By`, `Modified_Date`) VALUES
(1, '20191109-0001', 1, '2020-02-06 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-02-06 10:22:11', NULL, NULL),
(2, '20191109-0001', 4, '2020-07-01 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-07-01 11:27:55', NULL, NULL),
(3, '20191109-0001', 6, '2020-07-17 00:00:00', 'Iuran Air', 'Super Administrator', '2020-07-17 12:23:47', NULL, NULL),
(4, '20191109-0001', 8, '2020-07-17 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-17 12:28:34', NULL, NULL),
(5, '20191130-0001', 9, '2020-07-17 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-17 12:30:15', NULL, NULL),
(6, '20191130-0001', 9, '2020-07-17 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-17 12:30:15', NULL, NULL),
(7, '20191130-0001', 5, '2020-07-17 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-07-17 12:30:32', NULL, NULL),
(8, '20191109-0001', 13, '2020-07-20 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-07-20 21:15:40', NULL, NULL),
(9, '20191109-0001', 15, '2020-07-20 00:00:00', 'Iuran Air', 'Super Administrator', '2020-07-20 21:25:22', NULL, NULL),
(10, '20191109-0001', 17, '2020-07-20 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-20 21:25:37', NULL, NULL),
(11, '20191130-0001', 14, '2020-07-20 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-07-20 23:06:00', NULL, NULL),
(14, '20191130-0001', 16, '2020-07-20 00:00:00', 'Iuran Air', 'Super Administrator', '2020-07-20 23:08:27', NULL, NULL),
(15, '20191130-0001', 18, '2020-07-20 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-20 23:08:52', NULL, NULL),
(16, '20200204-0001', 19, '2020-07-20 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-20 23:17:18', NULL, NULL),
(17, '20191109-0001', 20, '2020-07-21 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-07-21 00:42:09', NULL, NULL),
(18, '20200204-0001', 24, '2020-07-21 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-21 00:42:40', NULL, NULL),
(19, '20191109-0001', 21, '2020-07-21 00:00:00', 'Iuran Air', 'Super Administrator', '2020-07-21 00:43:29', NULL, NULL),
(20, '20191109-0001', 22, '2020-07-21 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-21 00:44:41', NULL, NULL),
(21, '20191109-0001', 22, '2020-07-21 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-21 00:44:41', NULL, NULL),
(22, '20191130-0001', 23, '2020-07-21 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-21 20:43:39', NULL, NULL),
(25, '20191109-0001', 27, '2020-08-15 00:00:00', 'Iuran Listrik', 'Super Administrator', '2020-08-15 19:36:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail`
--

DROP TABLE IF EXISTS `pembayaran_detail`;
CREATE TABLE IF NOT EXISTS `pembayaran_detail` (
  `Pembayaran_Detail_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Pembayaran_Id` int(11) NOT NULL,
  `Item_Pembayaran_Id` smallint(6) DEFAULT NULL,
  `Tahun` smallint(6) DEFAULT NULL,
  `Bulan` smallint(6) DEFAULT NULL,
  `Meter_Awal` int(11) DEFAULT NULL,
  `Meter_Akhir` int(11) DEFAULT NULL,
  `Meter_Pakai` smallint(6) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Harga_Satuan` int(11) DEFAULT NULL,
  `Biaya_Beban` int(11) DEFAULT NULL,
  `PPJ` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pembayaran_Detail_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_detail`
--

INSERT INTO `pembayaran_detail` (`Pembayaran_Detail_Id`, `Pembayaran_Id`, `Item_Pembayaran_Id`, `Tahun`, `Bulan`, `Meter_Awal`, `Meter_Akhir`, `Meter_Pakai`, `Jumlah`, `Harga_Satuan`, `Biaya_Beban`, `PPJ`) VALUES
(1, 1, 1, 2020, 1, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(2, 1, 4, 2020, 1, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(3, 2, 2, 2020, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 7, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, 3, 3, 2020, 7, NULL, NULL, NULL, 1341000, NULL, NULL, NULL),
(6, 4, 1, 2020, 7, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(7, 4, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(8, 4, 1, 2020, 7, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(9, 4, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(10, 5, 1, 2020, 7, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(11, 5, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(12, 6, 1, 2020, 7, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(13, 6, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(14, 7, 2, 2020, 7, NULL, NULL, NULL, 1635000, NULL, NULL, NULL),
(15, 8, 2, 2020, 6, NULL, NULL, NULL, 1487000, NULL, NULL, NULL),
(16, 9, 3, 2020, 6, NULL, NULL, NULL, 1622000, NULL, NULL, NULL),
(17, 10, 1, 2020, 6, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(18, 10, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(19, 11, 2, 2020, 6, NULL, NULL, NULL, 1487000, NULL, NULL, NULL),
(22, 14, 3, 2020, 6, NULL, NULL, NULL, 1982000, NULL, NULL, NULL),
(23, 15, 1, 2020, 6, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(24, 15, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(25, 16, 1, 2020, 6, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(26, 16, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(27, 17, 2, 2020, 8, NULL, NULL, NULL, 3502000, NULL, NULL, NULL),
(28, 17, 7, NULL, NULL, NULL, NULL, NULL, 350200, NULL, NULL, NULL),
(29, 18, 1, 2020, 8, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(30, 18, 7, NULL, NULL, NULL, NULL, NULL, 4000, NULL, NULL, NULL),
(31, 18, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(32, 18, 7, NULL, NULL, NULL, NULL, NULL, 4000, NULL, NULL, NULL),
(33, 19, 3, 2020, 8, NULL, NULL, NULL, 2303000, NULL, NULL, NULL),
(34, 19, 7, NULL, NULL, NULL, NULL, NULL, 230300, NULL, NULL, NULL),
(35, 20, 1, 2020, 8, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(36, 20, 7, NULL, NULL, NULL, NULL, NULL, 16500, NULL, NULL, NULL),
(37, 20, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(38, 20, 7, NULL, NULL, NULL, NULL, NULL, 16500, NULL, NULL, NULL),
(39, 21, 1, 2020, 8, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(40, 21, 7, NULL, NULL, NULL, NULL, NULL, 16500, NULL, NULL, NULL),
(41, 21, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(42, 21, 7, NULL, NULL, NULL, NULL, NULL, 16500, NULL, NULL, NULL),
(43, 22, 1, 2020, 8, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(44, 22, 7, NULL, NULL, NULL, NULL, NULL, 11500, NULL, NULL, NULL),
(45, 22, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(46, 22, 7, NULL, NULL, NULL, NULL, NULL, 11500, NULL, NULL, NULL),
(47, 23, 2, 2020, 5, NULL, NULL, NULL, 1785600, NULL, NULL, NULL),
(48, 24, 2, 2020, 5, NULL, NULL, NULL, 1785600, NULL, NULL, NULL),
(51, 25, 2, 2020, 5, NULL, NULL, NULL, 1785600, NULL, NULL, NULL),
(52, 25, 7, NULL, NULL, NULL, NULL, NULL, 178560, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

DROP TABLE IF EXISTS `penyewa`;
CREATE TABLE IF NOT EXISTS `penyewa` (
  `Penyewa_Id` int(11) NOT NULL AUTO_INCREMENT,
  `No_Reg` varchar(100) DEFAULT NULL,
  `Rusun_Id` int(11) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Tempat_Lahir` varchar(250) DEFAULT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `Ktp_Nik` varchar(100) DEFAULT NULL,
  `Ktp_Alamat` varchar(255) DEFAULT NULL,
  `No_Hp` varchar(250) DEFAULT NULL,
  `Jml_Penghuni` int(11) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `Is_Aktif` int(11) DEFAULT NULL,
  PRIMARY KEY (`Penyewa_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`Penyewa_Id`, `No_Reg`, `Rusun_Id`, `Nama`, `Tempat_Lahir`, `Tgl_Lahir`, `Ktp_Nik`, `Ktp_Alamat`, `No_Hp`, `Jml_Penghuni`, `foto`, `Is_Aktif`) VALUES
(1, '191027-0001', 2, 'REFKY SATRIA BIMA', 'Metro', '1997-10-29', '1872022910970001', 'Jl. Godean Km.10', '089631449716', 2, 'avatar-1.png', 1),
(2, '191027-0002', 1, 'RITA PANJAITAN', 'Karang Asem', '1986-08-10', '187201488999587', 'Kemusuk', '089561254879', 3, 'avatar-17.png', 1),
(3, '191027-0003', 3, 'ABDUL SATRIA', 'Jakarta', '1988-06-27', '1872022910972314', 'Sleman, Gamping', '081235879541', 2, 'avatar-18.png', 1),
(5, '191215-0004', 6, 'abcde', 'magelang', '2019-12-01', '346790076533124', 'sdghjyulpo', '08587453234', 2, '20170223_103834.jpg', 1),
(6, '191222-0005', 6, 'coba deh', 'magelang', '2000-10-24', '212121212312', 'alamatnya', '0819212121', 3, 'Capture.JPG', 1),
(23, 'PTB-160002', 4, 'Wahyu Budi Prasetyo', 'Magelang', '1988-10-02', '3371020210880002', 'Bogeman Lor Gg. Subali RT/RW 07/01 No. 1099 Panjang Magelang Tengah ', '085743939607', 4, NULL, 1),
(24, 'PTB-160003', 4, 'Eko Marsudi', 'Magelang', '1976-10-11', '3371011110760002', 'Paten Jurang RT/RW 04/17 Rejowinangun Utara Magelang Tengah - Magelang', '085729478471', 4, NULL, 1),
(25, 'PTB-160004', 4, 'Rudyanto Wahyu Ismoyo', 'Magelang', '1989-08-09', '3371020908890001', 'Kp .Tulung No 98/265 RT/RW 04/02 Magelang Tengah - Magelang', '08886440967', 5, NULL, 1),
(26, 'PTB-160005', 4, 'B.Sisko Waluyo', 'Magelang', '1979-10-27', '3371022710790004', 'Kp.Tulung RT/RW 03/02  Magelang', '085878777450', 5, NULL, 1),
(27, 'PTB-160006', 4, 'Suwarsono', 'Magelang', '1955-12-29', '3371022912540004', 'Kp.Tulung RT/RW 03/02 Magelang', '085640109626', 2, NULL, 1),
(28, 'PTB-160007', 4, 'Ahmad Ilhari', 'Magelang', '1989-05-06', '3371020605890004', 'Sanden RT/RW 04/08 Kramat Selatan  Magelang Utara', '081568272014', 4, NULL, 1),
(29, 'PTB-160008', 4, 'Hari Prasetyo', 'Magelang', '1984-05-23', '3371022305840002', 'Kp.Tulung RT/RW 02/02  Magelang Tengah', '089608307797', 3, NULL, 1),
(30, 'PTB-160009', 4, 'Henry Hendra K', 'Magelang', '1990-01-11', '3371021101900003', 'Pasar Telo RT/RW 07/05 Gelangan - Magelang Tengah', '085875773877', 4, NULL, 1),
(31, 'PTB-160010', 4, 'Tri Sakti Setyobudi', 'Magelang', '1973-10-01', '3371020110730001 ', 'Gg.Badaan Baru I No 1205 RT/RW 08/04 Potrobangsan ', '085601005509', 4, NULL, 1),
(32, 'PTB-160011', 4, 'Defri Adewantoro', 'Magelang', '1993-12-20', '3371012012930002', 'Paten Jurang RT/RW 04/17 Rejowinangun Utara Magelang Tengah', '085799461869', 3, NULL, 0),
(33, 'PTB-160012', 4, 'Ngatminah', 'Kendal', '1974-12-31', '3371027112730017', 'Kedungsari RT/RW 04/06 Magelang Tengah', '085642672631', 4, NULL, 1),
(34, 'PTB-160013', 4, 'Caswin', 'Brebes', '1977-08-02', '3371030208770001', 'Kp.Tulung RT/RW 05/01 Magelang', '085329046208', 5, NULL, 1),
(35, 'PTB-160014', 4, 'Lucky Ady Wibowo', 'Magelang', '1988-06-22', '3371022206880001', 'Jl. Salak II No 16 RT/RW 04/02 Kramat Selatan Magelang Utara', '085786466644', 3, NULL, 1),
(36, 'PTB-160015', 4, 'Septian Budiawan', 'Magelang', '1987-09-19', '3371011909870002', 'Bojong RT/RW 03/09 Jurangombo Selatan Magelang Selatan', '082243785969', 3, NULL, 1),
(37, 'PTB-160016', 4, 'Endriawan', 'Magelang', '1988-07-19', '3371021907880001', 'Jl. Duku VI No. 5 Perum Korpri RT/RW 02/10 Kramat Selatan Magelang Utara', '085868315097', 4, NULL, 1),
(38, 'PTB-160017', 4, 'Yayan Haryana', 'Garut', '1972-11-05', '3371020511720001', 'Bogeman lor Rt 01/01 Kel.Panjang Magelang Tengah', '081578190695', 4, NULL, 1),
(39, 'PTB-160018', 4, 'Suryani', 'Magelang', '1976-01-24', '3371026401760001', 'Bogeman Wetan RT/RW 01/02 Panjang Magelang Tengah', '081802627099', 4, NULL, 1),
(40, 'PTB-160019', 4, 'Yohanes Anekanyata Budi Prasetya', 'Yogyakarta', '1963-06-27', '3371022706630004', 'Jl. Tobong 255L RT/RW 10/06 Potrobangsan Magelang Utara', '081578400437', 4, NULL, 0),
(41, 'PTB-160020', 4, 'Danang Pramudianto', 'Magelang', '1982-05-23', '3371012305820001', 'Jambon Legok No. 10 02/03 Cacaban Magelang Tengah', '085782332963', 5, NULL, 1),
(42, 'PTB-160021', 4, 'Agung Wahyu Mardiyanto', 'Magelang', '1983-03-08', '3308180803830002', 'Panggungsari No. 738-17 RT/RW 4/11 Cacaban Magelang Tengah', '085712921122', 3, NULL, 1),
(43, 'PTB-160022', 4, 'Bona Purwani Yoga', 'Magelang', '1980-03-05', '3371030503800001', 'Samban Utara RT/RW 06/06 Gelangan Magelang Tengah', '085600687560', 4, NULL, 1),
(44, 'PTB-160023', 4, 'Ariyani Parimeta', 'Magelang', '1980-01-02', '3371024201800003', 'Potrobangsan Tengah No. 368C RT/RW 01/04 Potrobangsan Magelang Utara', '082243787173', 5, NULL, 1),
(45, 'PTB-160024', 4, 'Sidik', 'Magelang', '1964-03-05', '3371010503640002', 'Rejosari RT/RW 02/06 Magersari Magelang Selatan', '085743147994', 4, NULL, 1),
(46, 'PTB-160025', 4, 'Danang Triyulianto', 'Magelang ', '1982-07-18', '3371021807820002', 'Potrobangsan IE RT/RW 07/04 Potrongsan Magelang Utara', '08159487472 ', 3, NULL, 1),
(47, 'PTB-160026', 4, 'Endang Widiyanti', 'Magelang', '1969-10-22', '3371026210690003', 'Polosari VII RT/RW 06/01 Kedungsari Magelang Utara ', '085643727369', 3, NULL, 0),
(48, 'PTB-160027', 4, 'Eko Sumartono', 'Magelang', '1983-12-21', '3371022112830006', 'Sanden RT/RW 03/09 Kramat Selatan - Magelang Utara', '089650679403', 3, NULL, 1),
(49, 'PTB-160028', 4, 'Ninik Sugiharti', 'Magelang', '1972-01-20', '3371026001720003', 'Dumpoh No 99 RT/RW 07/07 Potrobangsan - Magelang Utara', '085810331868', 3, NULL, 1),
(50, 'PTB-160029', 4, 'Heri Sudarto', 'Magelang', '1977-07-29', '3371022907770001', 'Bodongan RT/RW 04/04 Kramat Selatan - Magelang Utara', '088806011824', 3, NULL, 1),
(51, 'PTB-160030', 4, 'Sugeng Hari Sungkono', 'Magelang ', '1973-11-13', '3371011311730003', 'Cacaban Timur No 461 RT/RW 04/07 Cacaban - Magelang Tengah', '085878919898', 4, NULL, 1),
(52, 'PTB-160031', 4, 'Prio Kus Nugroho', 'Sintang', '1982-11-13', '3371011311820001', 'Kp . Tulung RT/RW  07/01 Magelang Tengah', '081325513066', 4, NULL, 1),
(53, 'PTB-160032', 4, 'Suhar Slamet Sutrisno', 'Magelang ', '1975-08-24', '3371022408750002', 'Ngentak Murni No 168 RT/RW 02/03 Gelangan - Magelang Tengah', '087705443195', 4, NULL, 1),
(54, 'PTB-160033', 4, 'Muchamad Rafi', 'Magelang', '1987-09-13', '3371036012920001', 'Samban Kidul RT/RW 02/06 Panjang - Magelang Tengah', '085600465443', 3, NULL, 1),
(55, 'PTB-160034', 4, 'Beni Kurniawan Meimantiyo', 'Magelang', '1985-05-25', '3308142505850005', 'Samban Kidul RT/RW 02/06 Panjang - Magelang Tengah', '085729444978', 3, NULL, 1),
(56, 'PTB-160035', 4, 'Sugiharto', 'Jepara', '1980-06-13', '3322101306800005', 'Bogeman Lor Jl.Rama Gang Subali RT/RW 02/01 Panjang - Magelang Tenngah', '085799020503', 3, NULL, 1),
(57, 'PTB-160036', 4, 'Muhamad Arifin', 'Magelang', '1971-05-12', '3371011205710006', 'Gg.Kantil I / 47 RT/RW 02/08 Kemirirejo', '081325263916', 5, NULL, 1),
(58, 'PTB-160037', 4, 'Darmanto', 'Magelang', '1986-03-28', '3310032803860006', 'Gg.Melati RT/RW 01/06 Kemirirejo - Magelang Tengah', '085643106508', 3, NULL, 1),
(59, 'PTB-160038', 4, 'Joko Supriyono', 'Magelang', '1991-12-05', '3371020512910001', ' Bogeman Timur RT/RW 06/07 Panjang - Magelang Tengah', '085643063057', 4, NULL, 1),
(60, 'PTB-160039', 4, 'Suyitno', 'Magelang', '1968-09-11', '3371021109680003', 'Kandang Doro RT/RW 06/09 Gelanggan - Magelang Tengah', '081215288642', 4, NULL, NULL),
(61, 'PTB-160040', 4, 'Suyitno', 'Magelang', '1968-09-11', '3371021109680003', 'Kandang Doro RT/RW 06/09 Gelangan - Magelang Tengah', '081215288642', 4, NULL, 1),
(62, 'PTB-160041', 4, 'Andi Widodo', 'Magelang', '1983-04-28', '3371022804830001', 'Dumpoh RT/RW 02/07 Potrobangsan - Magelang Utara', '085878768688', 3, NULL, 1),
(63, 'PTB-160042', 4, 'Sumaryono', 'Magelang', '1964-03-01', '3371020103640003', 'Potrobangsan Tengah II No 370 Rt 01/04 Potrobangsan Magelang Utara', '085879878533', 3, NULL, 1),
(64, 'PTB-160043', 4, 'Sri Rumondang Fatmawati', 'Solo', '1968-05-01', '3371024105680002', 'Potrobangsan I No. 371 RT/RW 01/04 Potrobangsan Magelang Utara', '081226215773', 3, NULL, 1),
(65, 'PTB-160044', 4, 'Bambang Suryono Jati pamungkas', 'Yogyakarta', '1990-08-05', '3371020508900001', 'Wates Tengah RT/RW 02/02 Magelang Tengah ', '085878698636', 4, NULL, 1),
(66, 'PTB-160045', 4, 'Cristopo', 'Magelang', '1974-10-24', '3371022410740002', 'Potrobangsan Tengah RT/RW 01/04 Potrobangsan Magelang Utara', '085725208214', 5, NULL, 1),
(67, 'PTB-160046', 4, 'Budi Asri', 'Magelang', '1961-08-08', '33710248610001', 'Kebondalem I RT/RW 09/01 Potrobangsan - Magelang Utara', '085701339278', 2, NULL, 1),
(68, 'PTB-160047', 4, 'Sri Rukmiati', 'Magelang', '1960-01-15', '3308195501600003', 'Potrosaran III RT/RW 04/01 Potrobangsan - Magelang', '085878479370', 2, NULL, 1),
(69, 'PTB-160048', 4, 'Deni Pangestu', 'Magelang', '1994-04-30', '3371033004940001', 'Kedungsari RT/RW 02/07 Magelang Utara', '085786678050', 2, NULL, 0),
(70, 'PTB-160049', 4, 'Sri Rubiani', 'Salatiga', '1965-03-31', '3371027103650001', 'Potrobangsan I / 3 RT/RW 07/04 Potrobangsan - Magelang Utara', '085729138450', 2, NULL, NULL),
(71, 'PTB-160050', 4, 'Sri Rubiani', 'Salatiga', '1965-03-31', '3371027103650001', 'Potrobangsan I /3 RT/RW 07/04 Magelang Utara', '085729138450', 2, NULL, 1),
(72, 'PTB-160051', 4, 'Atriyanti', 'Magelang', '1964-03-21', '3371026103640003', 'Badaan Baru No.2A RT/RW 08/04 Potrobangsan - Magelang', '08562704425 ', 2, NULL, 1),
(73, 'PTB-160052', 4, 'Aditya Dimas Pratama', 'Bantul', '1994-08-28', '3371022808940002', 'Potrobangsan RT/RW 05/04 -  Magelang Utara', '085712933641', 3, NULL, 1),
(74, 'PTB-160053', 4, 'Muhamad Miftahudin', 'Magelang', '1990-11-21', '3308162111900001', 'Meteseh Selatan RT/RW 02/12 Magelang Tengah', '087734022900', 4, NULL, 1),
(75, 'PTB-160054', 4, 'Tri Wahyudi', 'Magelang', '1973-10-03', '3371010310730003', 'Karang Lor RT/RW 02/13 Rejowinangun Utara - Magelang Utara', '085875470785', 4, NULL, 1),
(76, 'PTB-160055', 4, 'Supardi', 'Magelang', '1962-06-06', '1671070606620012', 'Potrobangsan I RT/RW 07/04 Magelang Utara', '082137140258', 2, NULL, 1),
(77, 'PTB-160056', 4, 'Sigit Prio Pamungkas', 'Magelang', '1985-11-30', '3371013011850001', 'Losmenan RT/RW 03/05 Panjang - Magelang Tengah', '085726930433', 4, NULL, 1),
(78, 'PTB-160057', 4, 'Waluyo', 'Magelang', '1965-02-07', '3371020702650003', 'Perum Depkes Blok C 2 / II rt/rw 03/04 Kramat Utara - Magelang Utara', '081227889160', 4, NULL, 1),
(79, 'PTB-160058', 4, 'Lasiem Catur Utami', 'Magelang ', '1978-06-10', '3371025006780005', 'Wates Tengah RT/RW 06/02 Wates - Magelang Utara', '085729542473', 3, NULL, 1),
(80, 'PTB-160059', 4, 'Anni Priyatini', 'Magelang', '1668-01-11', '3371015202690001', 'Cacaban Barat No 18 RT/RW 06/09 Cacaban - Magelang Tengah', '085870387401', 2, NULL, 1),
(81, 'PTB-160060', 4, 'Hendro Sulistiono', 'Magelang ', '1975-10-25', '3371012510750002', 'Gg. Kantil I / 8 RT/RW 01/08 Kemirirejo - Magelang Tengah', '085743291599', 4, NULL, 1),
(82, 'PTB-160061', 4, 'Erwin Hendrawan', 'Pekalongan', '1974-03-14', '3371031403740001', 'Gelangan RT/RW 03/05 Magelang Tengah', '085729340878', 2, NULL, 1),
(83, 'PTB-160062', 4, 'Dendi Pamungkas', 'Magelang', '1983-12-01', '3371010112830006', 'Karang Lor RT/RW 01/13 Rejowinangun Selatan - Magelang Selatan', '087834217797', 3, NULL, 1),
(84, 'PTB-160063', 4, 'Sarito Rofi\'i', 'Magelang', '1943-07-12', '3371011207430001', 'Semplon No.17 RT/RW 06/01 Kemirirejo - Magelang Tengah', '087719130196', 2, NULL, 1),
(85, 'PTB-160064', 4, 'Hutiana Subagyo', 'Magelang', '1966-05-30', '3371023005660003', 'Perum Griya Asri I Blok F7 RT/RW 10/07 Potrobangsan Magelang Utara', '082134991186', 2, NULL, 1),
(86, 'PTB-160065', 4, 'Joko Pitoyo', 'Magelang ', '1973-04-08', '3308100804730004', 'Ngembik Kidul RT/RW 06/02 Kramat Selatan  - Magelang Utara', '082137103766', 5, NULL, 1),
(87, 'PTB-160066', 4, 'Sri Rahayuningsih', 'Magelang', '1969-01-10', '3371035001690001', 'Jl. Abdulah Potrosaran II /39 RT/RW 03/01 Potrobangsan - Magelang Utara', '085101558418', 4, NULL, 1),
(88, 'PTB-160067', 4, 'Sunaryo', 'Magelang', '1974-01-15', '3371021501740004', 'Samban Kidul RT/RW 03/06  Panjang - Magelang Tengah', '085799131419', 5, NULL, 0),
(89, 'PTB-160068', 4, 'Aldi Eka Saputra', 'Magelang', '1998-03-19', '3371021903980003', 'Paten Jurang RT/RW 05/17 Rejowinangun Utara - Magelang Tengah', '085878596553', 3, NULL, 1),
(90, 'PTB-160069', 4, 'Muhamad Kofriyanto', 'Magelang', '1993-03-08', '3371020803930002', 'Gumuk Rejo I / 941 Potrobangsan I RT/RW 01/04 Magelang Utara', '085729945308', 3, NULL, 1),
(91, 'PTB-160070', 4, 'Maryadi', 'Magelang', '1961-08-18', '3371011808610001', 'Cacaban Barat RT/RW 06/09 Cacaban - Magelang Tengah', '085651094025', 3, NULL, 1),
(92, 'PTB-160071', 4, 'Parwito', 'Magelang', '1956-10-10', '33710210105560001', 'Botton Balong RT/RW 03/08  Magelang Tengah', '081328735623', 3, NULL, 0),
(93, 'PTB-160072', 4, 'Wahidi', 'Magelang ', '1972-09-21', '3371032109720001', 'Sanggrahan Legok RT/RW 04/09 Wates - Magelang Utara', '085643260903', 4, NULL, 1),
(94, 'PTB-160073', 4, 'Jonny Hermady', 'Magelang', '1962-03-13', '3371021303620001', 'Bogeman Timur R5T/RW 04/07 pANJANG - Magelang Utara', '082327022292', 3, NULL, 1),
(95, 'PTB-160074', 4, 'Fiat Wiraharja', 'Tegal', '1965-05-05', '3376020505650006', 'Jl.Tentara Pelajar No.7 RT/RW 01/01 Kemirirejo', '081329995740', 4, NULL, 1),
(96, 'PTB-160075', 4, 'Anita Amanda', 'Magelang', '1986-09-06', '3371024609860002', 'Kalisari RT/RW 04/08  Wates - Magelang Utara', '085725944331', 4, NULL, 1),
(97, 'PTB-160076', 4, 'Woro Wahyudi', 'Jaya Pura ', '1973-07-30', '337102300773001', 'Poncol Legok II / RT/RW 03/04 Gelanggan - Magelang Tengah', '085747431175', 3, NULL, 1),
(98, 'PTB-160077', 4, 'Pujo Sugiarto', 'Magelang', '1948-01-01', '3371020101480003', 'Botton Balong RT/RW 03/08 - Magelang tengah', '085643950725', 2, NULL, 1),
(99, 'PTB-160078', 4, 'Sri Astutik', 'Surabaya', '1959-05-22', '3371016204590001', 'Jl. Sumba 255 RT/RW 02/01 Wates - Magelang Utara', '085643965585', 2, NULL, 1),
(100, 'PTB-160079', 4, 'Yuni Lestari', 'Semarang', '1974-05-31', '3371017105740003', 'Karet RT/RW 06/07 Jurangombo Selatan - Magelang Selatan', '08122770047', 3, NULL, 0),
(101, 'PTB-160080', 4, 'Herly Davidson', 'Magelang', '1984-05-10', '3371011605840001', 'Ketepeng RT/RW 07/08 - Magelang Utara', '085643172116', 4, NULL, 1),
(102, 'PTB-160081', 4, 'Tri Kusuma Wijaya', 'Magelang', '1986-03-05', '337102050860001', 'Botton 1/138 RT/RW 02/06 Magelang Magelang Tengah', '085786510551', 3, NULL, 1),
(103, 'PTB-160082', 4, 'Beno Suroto', 'Surakarta', '1955-12-22', '3371012212550003', 'Villa Gading Mas D-7 RT/RW 06/07 Jurangombo Selatan - Magelang Selatan', '085743378337', 3, NULL, 1),
(104, 'PTB-160083', 4, 'Dina Emie Sukaemi', 'Batang', '1957-07-10', '3371015007570005', 'Wates Tengah RT/RW 01/02 Wates  Magelang Utara', '085761245798', 2, NULL, 1),
(105, 'PTB-160084', 4, 'Ari Tri Wibowo', 'Yogyakarta', '1986-03-24', '3308152403860005', 'Botton I No. 555/88 RT/RW 05/05 Magelang Magelang Tengah', '085742818453', 4, NULL, 1),
(106, 'PTB-160085', 4, 'Sumardi', 'Magelang', '1956-02-08', '3371010802560002', 'Jl. Anggrek I/274 RT/RW 03/04 Kemirirejo Magelang Tengah', '085868068524', 4, NULL, 1),
(107, 'PTB-160086', 4, 'Arie Sulistio', 'Bandung', '1982-08-26', '3371032608820001', 'Bogeman Kidul Gg. Sugriwo RT/RW 07/03 Panjang Magelang Tengah', '081578738100', 4, NULL, 1),
(108, 'PTB-160087', 4, 'Meirifva Harsanto', 'Magelang', '1982-05-03', '3371010305820005', 'Jambon Wot Tegal Asri RT/RW 04/06 Cacaban Magelang Tengah', '085642080000', 4, NULL, 0),
(109, 'PTB-160088', 4, 'Tri Setiawan', 'Magelang', '1984-10-01', '3371020110840001', 'Jl. A. Yani 258 RT/RW 01/08 Kedungsari Magelang Utara', '085729385758', 2, NULL, 1),
(111, 'PTB-160089', 4, 'Rohmat Supraba', 'Gunung Kidul', '1982-08-22', '3371012208820005', 'Jambon Wot Tegal Asri RT/RW 04/06 Cacaban Magelang Tengah', '085727138494', 4, NULL, 1),
(112, 'PTB-160090', 4, 'Sunaryo', 'Magelang', '1974-01-15', '3371021501740004', 'Samban Kidul RT/RW 03/06 Panjang Magelang Tengah', '085799131419', 5, NULL, 1),
(113, 'PTB-160091', 4, 'Samuel Christi', 'Magelang', '1980-08-08', '3371030608800001', 'Malanggaten RT/RW 02/10 Rejowinangun Utara Magelang Tengah', '085877161806', 4, NULL, 1),
(114, 'PTB-160092', 4, 'Joko Supriyono', 'Magelang', '1991-12-05', '3371020512910001', 'Bogeman Timur RT/RW 06/07 Panjang Magelang Tengah', '085800288933', 4, NULL, 1),
(115, 'PTB-160093', 4, 'Yuni Hartono', 'Magelang', '1981-06-09', '3371020906810002', 'Meteseh Jayengan RT/RW 03/12 Magelang magelang Tengah', '089674335508', 3, NULL, 1),
(116, 'PTB-160094', 4, 'Prahasta Ody Sanjaya', 'Magelang', '2016-04-10', '3371031004900001', 'Malanggaten RT/RW 02/12 Rejowinangun Utara Magelang Tengah', '085713477738', 5, NULL, 1),
(117, 'PTB-160095', 4, 'Ari Prasetyo', 'Magelang', '1988-02-12', '3371021202880001', 'Botton Kopen RT/RW 04/07 Magelang Magelang Tengah', '08164283504', 3, NULL, 1),
(118, 'PTB-160096', 4, 'Adi Heru Purwanto', 'Magelang', '1982-04-06', '3371022604820001', 'Beliksari Potrobangsan RT/RW 11/01 Potrobangsan Magelang Utara', '085727824411', 3, NULL, 1),
(119, 'PTB-160097', 4, 'Deddy Sugiarto', 'Magelang', '1982-03-06', '3371020603820001', 'Sanden RT/RW 01/09 Kramat Selatan Magelang Utara', '085729826874', 4, NULL, 1),
(120, 'PTB-160098', 4, 'Meta Hadi Prabowo', 'Surakarta', '1974-09-07', '3371010709740003', 'Sanden RT/RW 03/07 Kramat Selatan Magelang Utara', '085729833963', 3, NULL, 1),
(121, 'PTB-160099', 4, 'Nanang Yulianto', 'Magelang', '1980-07-21', '3401122107800002', 'Samban Utara RT/RW 06/06 Gelangan Magelang Utara', '087834295564', 3, NULL, 1),
(122, 'PTB-160100', 4, 'Ridwan Prasetyo', 'Magelang', '1985-01-27', '3371022701850001', 'Menowo RT/RW 03/03 Kedungsari Magelang Utara', '085643032033', 4, NULL, 1),
(123, 'PTB-160101', 4, 'Laksa Tri Winarto', 'Surabaya', '1967-02-27', '3371012702670002', 'Jaranan 1505 RT/RW 01/09  Rejowinangun Utara', '085878890800', 4, NULL, 1),
(124, 'PTB-160102', 4, 'Septiar Untoro', 'Magelang', '1986-09-07', '3308100709860002', 'Samban Utara RT/RW 06/06 Gelangan Magelang Tengah', '088211637218', 3, NULL, 1),
(125, 'PTB-160103', 4, 'Satrianingsih', 'Magelang', '1972-02-21', '3371026102720001', 'Potrobangsan IV/327 RT/RW 08/05 Potrobangsan Magelang Utara', '085878404824', 4, NULL, 1),
(126, 'PTB-160104', 4, 'Indah Fitri Rejeki', 'Magelang', '1982-10-08', '3371034810820001', 'Jambon Tengah 297 RT/RW 05/03 Cacaban Magelang Tengah', '085868280533', 5, NULL, 1),
(127, 'PTB-160105', 4, 'Susilo Teguh Kurniawan', 'Magelang', '1985-09-22', '3371032209850001', 'Dukuh 2 No. 179 RT/RW 02/03 Magelang Magelang Tengah', '085877965644', 3, NULL, 1),
(128, 'PTB-160106', 4, 'Mia Suci Hapsari', 'Magelang', '1982-07-26', '3371016607820004', 'Paten Jurang RT/RW 01/16 Rejowinangun Utara Magelang Tengah', '085601819192', 3, NULL, 1),
(129, 'PTB-160107', 4, 'Sumardi Wiyono', 'Klaten', '1972-07-10', '3216091007720011', 'Paten Gunung RT/RW 01/10 Rejowinangun Selatan Magelang Selatan', '081315590722', 4, NULL, 1),
(130, 'PTB-160108', 4, 'Muchamat Suhaeri', 'Magelang', '1985-04-05', '3371020504850002', 'Kriyan 123 RT/RW 07/03 Potrobangsan Magelang Utara', '085643173096', 3, NULL, 1),
(131, 'PTB-160109', 4, 'Dwi Ariyati', 'Magelang', '1973-11-08', '3371014811730003', 'Tidar Warung RT/RW 02/05 Tidar Selatan Magelang Selatan', '085601087048', 4, NULL, 1),
(132, 'PTB-160110', 4, 'Supriyatno', 'Magelang', '1963-11-14', '3371011411630001', 'Karang Kidul RT/RW 04/05 Rejowinangun Selatan Magelang Selatan', '081542890491', 3, NULL, 1),
(133, 'PTB-160111', 4, 'Johartono', 'Klaten', '1963-12-16', '3371021612630001', 'Tuguran RT/RW 04/06 Potrobangsan Magelang Utara', '085643433515', 2, NULL, 1),
(134, 'PTB-160112', 4, 'Riyanti', 'Magelang', '1981-06-30', '3371027006810001', 'Tulungsari 121 RT/RW 03/01 Magelang Magelang Tengah', '085641891810', 3, NULL, 1),
(135, 'PTB-160113', 4, 'Murwayati', 'Magelang', '1970-05-15', '3371025505700001', 'Boton Kopen RT/RW 05/07 Magelang Tengah', '085643485451', 3, NULL, 1),
(136, 'PTB-160114', 4, 'Bimo Wicaksono', 'Magelang', '1988-07-13', '3371021307880002', 'Potrosaran II No. 12 RT/RW 03/01 Potrobangsan Magelang Utara', '085780462287', 3, NULL, 1),
(137, 'PTB-160115', 4, 'Sudarman', 'Temanggung', '1959-01-17', '3371011701590003', 'Paten Jurang RT/RW 01/16 Rejowinangun Utara Magelang Tengah', '08976800501', 3, NULL, 1),
(138, 'PTB-170001', 4, 'Muhamad Bilal', 'Sragen', '1990-09-02', '3314010209900002', 'Kebondalem I RT/RW 09/01 Potrobangsan Magelang Uara', '085776066077', 3, NULL, 1),
(139, 'PTB-170002', 4, 'Putra Bagus Wira Dharma', 'Magelang', '1986-01-03', '3371020301860005', 'Pasar Telo RT/RW 06/05 Gelangan Magelang Tengah', '08562900873', 3, NULL, 1),
(140, 'PTB-170003', 4, 'Ema Amalia Nurjanah', 'Magelang', '1993-10-24', '33.7101.641193.0001', 'Jl. Kyai Mojo 31 A RT/RW 003/011 Kel .Cacaban kec.Magelang Tengah - Magelang', '085866660497', 3, NULL, 1),
(141, 'PTB-170004', 4, 'Ema Amalia Nurjanah', 'Magelang', '1993-11-25', '3371016411930001', 'Jl. Kyai Mojo No 31 A  RT/RW 03/11 Cacaban  Magelangn Tengah', '085701099186', 3, NULL, 1),
(142, 'PTB-170005', 4, 'Purwanti', 'Magelang', '1968-06-28', '3371026806680001', 'Jl. Rama Gang Subali RT/RW 02/01 Panjang Magelang Tengah', '081226866924', 2, NULL, 1),
(143, 'PTB-170006', 4, 'Widodo', 'Magelang', '1969-09-26', '3371022609690001', 'Dumpoh RT/RW 09/07 Potrobangsan  Magelang Utara', '085600687800', 2, NULL, 1),
(144, 'PTB-170007', 4, 'Aristoteles Chrisostomos', 'Cilacap', '1994-04-06', '3302100603940002', 'Jambon Tempel Sari RT/RW 02/06 Cacaban  Magelang Tengah', '085600357944', 3, NULL, 1),
(145, 'PTB-170008', 4, 'Fajar Abdul Amin', 'Semarang ', '1968-07-18', '3308201807680001', 'Menowo RT/RW 05/02 Kedungsari Magelang Utara', '085729835150', 3, NULL, 1),
(146, 'PTB-170009', 4, 'Niko Adhie Surya Purna Y.', 'Magelang', '1985-03-30', '3374063003850003', 'Paten Gunung RT/RW 03/10 Rejowinangun Selatan Magelang Selatan', '089648072671', 3, NULL, 1),
(147, 'PTB-170010', 4, 'Yanuar Arifin', 'Surabaya', '1986-12-31', '3578063112850005', 'Sempon104 RT/RW 06/01 Kemirirejo Magelang Tengah', '082284245888', 3, NULL, 1),
(148, 'PTB-170011', 4, 'Slamet Riyanto', 'Lampung', '1969-06-20', '3308192006690007', 'Karangwuni RT/RW 05/07 Kramat Utara Magelang Utara', '085727008949', 3, NULL, 1),
(149, 'PTB-170012', 4, 'Ardani', 'Magelang', '1986-04-08', '33710260804860001', 'Samban Kidul RT/RW 02/06 Panjang Magelang Tengah', '085877511647', 4, NULL, 1),
(150, 'PTB-170013', 4, 'Rudi Giyanto', 'Magelang', '1985-05-04', '3371010405850001', 'Malanggaten RT/RW 05/10 Rejowinangun Utara Magelang Tengah', '085729626085', 3, NULL, 1),
(151, 'PTB-170014', 4, 'Rizkyawan Dwi Saputra', 'Magelang', '1990-04-12', '3371011204900003', 'Komodjoyo 97 RT/RW 06/04 Magersari Magelang Selatan', '085726963865', 3, NULL, 1),
(152, 'PTB-170015', 4, 'Ahmad Ansori', 'Magelang', '1976-12-28', '3371022812750003', 'Dumpoh RT/RW 09/07 Potrobangsan Magelang Utara', '082220392394', 3, NULL, 1),
(153, 'PTB-170016', 4, 'Bima Novia Saputra', 'Jakarta', '1989-11-08', '3371010811890004', 'Cacaban Barat RT/RW 01/09 Cacaban Magelang Tengah', '081584381011', 2, NULL, 1),
(154, 'PTB-170017', 4, 'Zefanya Alfa Yunanda', 'Magelang', '1997-06-26', '3371022606970001', 'Karang Gading RT/RW 02/02 Rejowinangun Selatan Magelang Selatan', '083896391407', 3, NULL, 1),
(155, 'PTB-170018', 4, 'Ardian Yustiyanto', 'Magelang', '1988-03-02', '3371020203880001', 'Tulung RT/RW 04/01 Magelang Magelang Tengah', '085729627812', 4, NULL, 1),
(156, 'PTB-170019', 4, 'Andreas Cahyo Pambudi', 'Magelang', '1974-04-27', '3371022704740001', 'Botton Balong 74 RT/RW 03/08 Magelang Tengah', '087734254835', 2, NULL, 1),
(157, 'PTB-180001', 4, 'Adhnan Bachtiar', 'Magelang', '1990-10-20', '3371022010800001', 'Menowo RT/RW 01/03 Kedungsari Magelang Utara', '085747758440', 4, NULL, 1),
(158, 'PTB-180002', 4, 'Habil Ayommi', 'Magelang', '1989-11-26', '3371022611890002', 'Jl. Sunan Ampel 8 No. 108 Ganten RT/RW 07/01 Jurangombo Selatan Magelang Selatan', '085878702026', 3, NULL, 1),
(159, 'PTB-180003', 4, 'Wawan Setiyo Warjono', 'Magelang', '1980-02-07', '3371010702800001', 'Karang Gading RT/RW 05/04 Rejowinangun Selatan Magelang Selatan', '081326572689', 3, NULL, 1),
(160, 'PTB-180004', 4, 'Yosep Adhi Gunawan', 'Magelang', '1974-09-21', '3371022109740002', 'Kebondalem II/754 RT/RW 01/03 Potrobangsan Magelang Utara Kota Magelang', '081227488864', 4, NULL, 1),
(162, 'PTB-180005', 4, 'Edi Hariyanto', 'Magelang', '1989-11-05', '3371020511890001', 'Gg. Cempaka II RT/RW 05/07 Kemirirejo Magelang Tengah', '0895671213', 3, NULL, 1),
(163, 'PTB-180006', 4, 'Asep Catur Purwono', 'Magelang', '1982-01-17', '3371021701820001', 'Sanggrahan No. 4 RT/RW 02/05 Wates Magelang Utara', '08995180127', 3, NULL, 1),
(164, 'PTB-180007', 4, 'Anf Iwan Pribadi', 'Magelang', '1978-12-13', '3371021312780003', 'Pucangsari RT/RW 01/05 Kedungsari Magelang Utara', '082138876738', 4, NULL, 1),
(165, 'PTB-180008', 4, 'Budhi Yuniyanto', 'Magelang', '1980-06-02', '3371020206800001', 'Kp. Tulung RT/RW 07/01 Magelang Tengah', '081287330801', 3, NULL, 1),
(166, 'PTB-180009', 4, 'Vicky Aritonang Leonardo', 'Magelang', '1987-03-18', '3371023101870001', 'Meteseh Selatan No.14 RT/RW 01/12 Magelang Tengah', '085747462574', 5, NULL, 1),
(167, 'PTB-180010', 4, 'Rokhmadi', 'Magelang', '1986-03-30', '3308183003860001', 'Botton Kopen RT/RW 05/07 Magelang - Magelang Tengah', '085783486326', 3, NULL, 1),
(168, 'PTB-180011', 4, 'Eko Wahyu Sulistiyo', 'Magelang', '1981-07-21', '337102107810002', 'Beliksari  Potrobangsan RT/RW 11/01 Potrobangsan - Magelang Utara', NULL, 4, NULL, 1),
(169, 'PTB-180012', 4, 'Sugiyarto', 'Magelang', '1986-03-30', '3308183003860001', 'Botton Kopen RT/RW 05/07 Magelang - Magelang Tengah', '082327279706', 3, NULL, 1),
(170, 'PTB-180013', 4, 'Heri Susilo', 'Magelang', '1986-02-18', '3371011802860003', 'Malangan Tidar RT/RW 04/05 Tidar Utara, Magelang Selatan', '085643779011', 3, NULL, NULL),
(171, 'PTB-180014', 4, 'T. Andhi Prasetyo', 'Magelang', '1985-04-21', '	3371012003180001', 'Jl.Beringin V Tanon Tidar Selatan Magelang Selatan', '085842725575', 4, NULL, 1),
(172, 'PTB-180015', 4, 'Ari Setyawan', 'Kulon Progo ', '0986-01-09', '3371010901860005', 'Cacaban Barat  RT/RW 01/10 Cacaban - Magelang Tengah', '085643887420', 3, NULL, 1),
(173, 'PTB-180016', 4, 'Ivanadi Santoso', 'Magelang', '1978-11-16', '3308031611780003', 'Panjang Baru RT/RW 02/07 Gelangan - Magelang Tengah', '081328664701', 4, NULL, 1),
(174, 'PTB-180017', 4, 'Rio Angkasa Irawan', 'Magelang ', '1996-06-17', '33711021706960001', 'Botton Kopen Rt/rw 01/07 Magelangn Tengah', '085848515891', 4, NULL, 1),
(175, 'PTB-180018', 4, 'Ichsanudin', 'Magelang', '1980-08-16', '33708191608800001', 'Tulung sari No.121 RT/RW 03/01 Magelang - Magelang Tengah', '085700237050', 4, NULL, 1),
(176, 'PTB-190001', 4, 'Bastian Tito Arnendyo', 'Magelang', '1992-06-14', '3371031406920001', 'Bogeman Lor RT 07 RW 01 Panjang Magelang Tengah', '085877161904', 3, NULL, 1),
(177, 'PTB-190002', 4, 'Pepen Efendi', 'Kuningan', '1976-06-22', '330813220670003', 'Jurangombo Utara RT 02 RW 01 Jurangombo Utara Magelang Selatan', '081575287376', 4, NULL, 1),
(178, 'PTB-190003', 4, 'Rizal Prihantoko', 'Magelang', '1996-10-07', '3308100710960004', 'Jaranan 626 Rt 01 RW 09 Rejowinangun Utara-Magelang Tengah', '085713248911', 2, NULL, 1),
(179, 'PTB-190004', 4, 'Riki Syahputra', 'Magelang', '1994-11-29', '3371032909940001', 'Bojong Timur RT/RW 04/08 Jurangombo Selatan - Magelang Selatan', '0895363349447', 3, NULL, 1),
(180, 'PTB-190005', 4, 'Joko Siyam Pamungkas', 'magelang', '1984-06-29', '3371022906840004', 'Botton 1 No.475 RT/RW 04/05 Magelang', '085868715281', 2, NULL, 1),
(181, 'PTB-190006', 4, 'Basuki Widodo', 'Magelang', '1970-12-14', '337102142700001', 'Wates Tengah RT/RW 05/02 Magelang Tengah', '08562797737', 3, NULL, 1),
(182, 'PTB-190007', 4, 'Kurniawan Susanto', 'Magelang', '1990-09-04', '351008040990005', 'Tidar Sari RT/RW 03/12 Tidar Selatan - Magelang Selatan', '085643677343', 4, NULL, 1),
(183, 'PTB-190008', 4, 'Paulo Rossi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'PTB-190009', 4, 'Setio Tri Utomo', 'Jambi ', '1998-05-03', '3308100305980002', 'Kp.Tulung RT/RW 01/01 Magelang Tengah', '085727178733', 3, NULL, 1),
(185, 'PTB-190010', 4, 'Paulo Rossi', 'Purworejo', '1986-07-14', '3371021407860003', 'Karang Gading RT/RW 01/01 Rejowinangun Selatan Magelang Selatan ', '085866886686', 2, NULL, 1),
(186, 'PTB-190011', 4, 'Agung Sadewo', 'Magelang', '1982-10-12', '3371011212820002', 'Magersari Timur No. 169 RT 10/09, Magerari, Magelang Selatan', '085810423237', 4, NULL, 1),
(187, 'PTB-190012', 4, 'Budi Wahyono', 'Magelang', '1989-03-18', '3371011803890003', 'Jl. Lamtoro No. 120 Tidar Baru RT01 RW 08 Magersari, Magelang Selatan', '08136722220', 3, NULL, 1),
(188, 'PTB-190013', 4, 'Irwan Septiawan', 'Magelang', '1990-09-05', '3308100509900003', 'Juritan GG Raharjo RT 4 RW 4 No. 834 Panjang, Magelang Tengah', '083827013337', 3, NULL, 1),
(189, 'PTB-190014', 4, 'Ongki Rahadiyanto', 'Magelang ', '1982-10-22', '3374021210820009', 'Samban Kidul Gg. Wibisono RT/RW 06/06 Panjang Magelang Tengah', '089667682818', 4, NULL, 1),
(190, 'PTB-200001', 4, 'Septian Yoga Saputra', 'Magelang', '1988-09-10', '3371011009880001', 'Perumda Mantiasih Meteseh RT 04 RW 10 Magelang Tengah', '085643798642', 2, NULL, 1),
(191, 'PTB-200002', 4, 'Muhammad Agus', 'Magelang', '1989-10-01', '3371030109890003', 'Paten Jurang RT 05 RW 17 Rejowinangun Utara, Magelang Tengah', '089652231734', 3, NULL, 1),
(192, 'PTB-200003', 4, 'Antok Prasetyo', 'Magelang', '1984-11-29', '3371012911840002', 'Jl. Anggrek I/281 RT 04 RW 04 Kemirirejo, Magelang Tengah', '085290147779', 2, NULL, 1),
(193, 'PTB-200004', 4, 'Juni Haryanto', 'Magelang', '1977-06-16', '3308061606770004', 'Samban Kidul RT 07 RW 06 Panjang, Magelang Tengah', '089632337760', 4, NULL, NULL),
(194, 'PTB-200005', 4, 'Juni Haryanto', 'Magelang', '1977-06-16', '3308061606770004', 'Samban Kidul RT 07 RW 06 Kel. Panjang, Magelang Tengah', '089632337760', 4, NULL, 1),
(195, 'PTB-200006', 4, 'Timotius Garin Margo Christian', 'Magelang', '1995-05-10', '33081010005950003', 'Tidar Sari RT/RW 02/12 Tidar Selatan - Magelang Selatan', '085749175645', 2, NULL, 1),
(196, 'PTB-200007', 4, 'Setyo Anggoro', 'Magelang', '1991-06-15', '3371011506910005', 'Bojong RT 003 RW 009 Jurangombo Selatan, Magelang Selatan', '089517345061', 4, NULL, 1),
(197, 'PTB-200008', 4, 'Prasetiono', 'Magelang', '1988-12-08', '3371020812880004', 'Tuguran No. 1556A Potrobangsan RT 4 RW 6, Magelang Utara', '083139900772', 4, NULL, 1),
(198, 'PTB-200009', 4, 'Tri Siswanto', 'Semarang', '1983-01-12', '3373011201830003', 'Ngentak Kwayuhan RT 01 RW 08 Gelangan, Magelang Tengah', '085729246451', 4, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa_keluaraga`
--

DROP TABLE IF EXISTS `penyewa_keluaraga`;
CREATE TABLE IF NOT EXISTS `penyewa_keluaraga` (
  `Penyewa_Keluarga_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Penyewa_Id` int(11) DEFAULT NULL,
  `Urut` smallint(6) DEFAULT NULL,
  `Hub_Keluarga_Id` smallint(6) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Tempat_Lahir` varchar(250) DEFAULT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `Ktp_Nik` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Penyewa_Keluarga_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=427 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa_keluaraga`
--

INSERT INTO `penyewa_keluaraga` (`Penyewa_Keluarga_Id`, `Penyewa_Id`, `Urut`, `Hub_Keluarga_Id`, `Nama`, `Tempat_Lahir`, `Tgl_Lahir`, `Ktp_Nik`) VALUES
(1, 1, NULL, 1, 'Pevita Pearce', 'Jakarta', '1991-08-19', '1872022910972314'),
(2, 1, NULL, 3, 'Aliando Syarif', 'Jakarta', '2000-01-01', '1872022910970020'),
(11, 23, 1, 1, 'Aldika Prasanti', 'Magelang', '1988-02-04', '3371034402880001'),
(12, 23, 2, 3, 'Tabita Satya Puspita', 'Magelang', '2010-01-04', '3371034401100002'),
(13, 23, 3, 3, 'Daniel Satya Budi', 'Magelang', '2011-09-02', '3371030209110001'),
(14, 24, 1, 1, 'Yuniani', 'Magelang', '1979-06-12', '3371015206790005'),
(15, 24, 2, 3, 'Eni Yuliastika', 'Magelang', '1998-07-05', '3371014507980002'),
(16, 24, 3, 3, 'Sandi Adi Saputra', 'Magelang', '2005-09-06', '3371010609050001'),
(17, 25, 1, 1, 'Reynita Andari', 'Magelang', '1985-04-23', '3371016304850004'),
(18, 25, 2, 3, 'Valentina Cindy Ryanita', 'Magelang', '2015-02-10', '3371035602150002'),
(19, 25, 3, 3, 'Cinta Callista Ryanita', 'Magelang', '2012-05-15', '3371035505120001'),
(20, 25, 4, 3, 'Dinda Nafisa Ryanita', 'Magelang', '2013-05-31', '3371037105130002'),
(21, 26, 1, 1, 'Nurma Dwi Nuryanti', 'Magelang ', '1980-12-08', '3371024812800001'),
(22, 26, 2, 3, 'Giska Zamrud Pratama', 'Magelang', '2000-01-13', '3371021301000001'),
(23, 26, 3, 3, 'Stella Vega Mutiara', 'Magelang', '2004-03-17', '3371025703040001'),
(24, 26, 4, 3, 'Sky Anggra Saputra', 'Magelang', '2010-12-02', '3371030212100001'),
(25, 27, 1, 1, 'Sriyiati Sulastri', 'Magelang', '1958-05-10', '3371025005580003'),
(26, 28, 1, 1, 'Anita Putri Purwanto', 'Magelang', '1990-05-06', '3371024605900002'),
(27, 28, 2, 3, 'Kirana Salsabila Purwanti', 'Magelang', '2010-11-07', '3371024711100002'),
(28, 28, 3, 3, 'Muhammad Syahputra Ilhari', 'Magelang', '2012-10-07', '3371020710120001'),
(29, 29, 1, 1, 'Hartatik', 'Magelang', '1987-09-07', '3371034709870001'),
(30, 29, 2, 3, 'Rama Ali Akbar Prasetyo', 'Magelang', '2009-09-24', '3371032409090001'),
(31, 30, 1, 1, 'Ika Septi Puji Lestari', 'Magelang', '1994-09-18', '3371025809940001'),
(32, 30, 2, 3, 'Anggia Salwa Putri Kusuma', 'Magelang', '2021-08-20', '3371036908120001'),
(33, 30, 3, 3, 'Daffa Arya Kusuma', 'Magelang', '2015-11-16', '3371031611150001'),
(34, 31, 1, 1, 'Eka Wati', 'Magelang', '1974-02-13', '3371025302740001'),
(35, 31, 2, 3, 'Emanuel Setyoko', 'Magelang', '1997-01-10', '3371021001970006'),
(36, 31, 3, 3, 'Yohanes Okka Prasetyo', 'Magelang', '2004-03-24', '3371022403040001'),
(37, 32, 1, 1, 'Kiki Puspita Ningrum', 'Magelang', '1994-02-26', '3308206602940002'),
(38, 32, 2, 3, 'Agatha Alysia', 'Magelang', '2015-08-17', '3371035708150002'),
(39, 33, 1, 3, 'Eka Kurniawati', 'Magelang', '1997-02-22', '3371026202970006'),
(40, 33, 2, 3, 'Dwi Agung Kurniawan', ' Magelang', '2000-06-20', '3371022006000005'),
(41, 34, 1, 1, 'Tiri', 'Brebes', '1983-11-13', '3371035311830001'),
(42, 34, 2, 3, 'Indriyani', 'Brebes', '2000-10-11', '3371035110000001'),
(43, 34, 3, 3, 'Intan Dwi Rahayu', 'Brebes', '2006-10-30', '3371037010060001'),
(44, 34, 4, 3, 'Yuliani Nur Khasanah', 'Magelang', '2013-07-04', '3371034407130001'),
(45, 35, 1, 1, 'Reni Purnamasari', 'Magelang', '1995-06-20', '3371016006950002'),
(46, 35, 2, 3, 'Aneila Zhafira Maheswari', 'Magelang', '2015-12-28', '3371026812140001'),
(47, 36, 1, 1, 'Arum Widiawati', 'Magelang', '1990-01-07', '3371014701900001'),
(48, 36, 2, 3, 'Sergio Pratama', 'Magelang', '2014-02-04', '3371010402140001'),
(49, 37, 1, 1, 'Dwi Rahayu', 'Magelang', '1990-01-04', '3371024401900006'),
(50, 37, 2, 3, 'Lavechiara Gestha Auliandini', 'Magelang', '2009-12-09', '3371024912090001'),
(51, 37, 3, 3, 'Ranestha Omar Alkatiri', 'Magelang', '2013-11-12', '3371021211130002'),
(52, 38, 1, 1, 'Budi Setiowati', 'Magelang', '1974-05-30', '3371027005740001'),
(53, 38, 2, 3, 'Diaz Ajeng Nurpratiwi Haryana', 'Magelang', '1997-12-14', '3371025412970001'),
(54, 38, 3, 3, 'Aldiyansyah Nurrahman Haryana', 'Magelang', '2005-11-22', '3371022211050002'),
(55, 39, 1, 2, 'Ronnie Eduard Boode', 'Yogyakarta', '1973-06-07', '3371020706730001'),
(56, 39, 2, 3, 'Michelle Sara Angelica Boode', 'Magelang', '2007-06-17', '3371036706070001'),
(57, 39, 3, 3, 'Daniel Sebastian Boode', 'Magelang', '2013-04-03', '3371030304130001'),
(58, 40, 1, 3, 'Peni Susilowati', 'Magelang', '1972-01-20', '3308106001720002'),
(59, 40, 2, 3, 'Fransiscus Xaverius Fernando Bagas Praditya', 'Magelang', '1998-07-09', '3371020907980004'),
(60, 40, 3, 3, 'Abigail Christ Celo Marsha Prasetya', 'Magelang', '2015-03-25', '3371026503150001'),
(61, 41, 1, 1, 'Partini Setyaningsih', 'Magelang', '1984-02-27', '3371036702840002'),
(62, 41, 2, 3, 'Alvino Drievansa Pramudianto', 'Magelang', '2010-10-12', '3371031210100002'),
(63, 41, 3, 3, 'Irvan Puji Nur Wahyudianto', 'Magelang', '1997-04-09', '3371030904970001'),
(64, 41, 4, 3, 'Steven Oktavian Puji Susanto', 'Magelang', '2005-10-24', '3371032410050003'),
(65, 42, 1, 1, 'Delliana Arsihapsari', 'Magelang', '1989-02-12', '3371015202890001'),
(66, 42, 2, 3, 'Salsabila Athaya Ramadhani', 'Magelang', '2012-07-26', '3371036607120001'),
(67, 43, 1, 1, 'Mira Tri Wahyuni', 'Purworejo', '1981-09-04', '3371024409810002'),
(68, 43, 2, 3, 'Bagus Pratama Putra', 'Magelang', '2008-07-11', '3371031107080006'),
(69, 43, 3, 3, 'Karenina Dwi Wahyuni', 'Magelang', '2015-09-03', '3371034309150001'),
(70, 44, 1, 2, 'Agus Mulyono', 'Magelang', '1976-03-28', '3371022803760002'),
(71, 44, 2, 3, 'Ghazy Zufar', 'Magelang', '1999-07-21', '3371022107990003'),
(72, 44, 3, 3, 'Gyda Zufar', 'Magelang', '2000-11-07', '3371020711000002'),
(73, 44, 4, 3, 'Syahla Zufar', 'Magelang', '2006-09-07', '3371024709060001'),
(74, 45, 1, 1, 'Tri Mulyani', 'Magelang', '1966-09-26', '3371016609660001'),
(75, 45, 2, 3, 'Alif Windarti', 'Magelang', '1995-10-18', '3371015810950001'),
(76, 45, 3, 3, 'Indra Bayu Saputra', 'Magelang', '2004-06-24', '3371012406040003'),
(77, 46, 1, 1, 'Harni Latifah', 'Magelang', '1992-05-10', '3308135005920003'),
(78, 46, 2, 3, 'Danny Khusniyati', 'Magelang', '2015-10-15', '337102551050001'),
(79, 47, 1, 3, 'Aldy Kusuma Wardanu', 'Magelang', '1995-09-07', '3371020709950002'),
(80, 47, 2, 3, 'Handy Priambodo', 'Magelang', '1999-12-25', '3371022612990002'),
(81, 48, 1, 1, 'Mutrikah', 'Kendal', '1991-11-08', '3324144811910002'),
(82, 48, 2, 3, 'Rahmannisa Rayya Alfiyah', 'Kendal', '2015-02-18', '3371025802150002'),
(83, 49, 1, 3, 'Adinda Salma Novita ', 'Magelang', '2003-11-07', '3371024711030001'),
(84, 49, 2, 3, 'Muhammad Vicky Raffa Hananda', 'Magelang', '2007-03-15', '3371021503070002'),
(85, 50, 1, 1, 'Tri Purwanti ', 'Magelang', '1980-03-20', '337026503800002'),
(86, 50, 2, 3, 'Tasya Icha Sulistyowati', 'Magelang', '2004-01-02', '3371024201040003'),
(87, 51, 1, 1, 'Endang Legowati', 'Magelang', '1979-07-04', '3371034407790001'),
(88, 51, 2, 3, 'Nabilla Nurul Sungkono', 'Magelang', '2007-04-01', '3371034104070002'),
(89, 51, 3, 3, 'Khirania Dewi Suryani ', 'Magelang', '2011-05-05', '3371034505110003'),
(90, 52, 1, 1, 'Ayu Vera Karunia Hapsari', 'Magelang', '1990-02-06', '3371014602900003'),
(91, 52, 2, 3, 'Kirana Ayu Nugroho', 'Magelang', '2013-04-15', '3371035504130001'),
(92, 52, 3, 3, 'Kenzo Ahsanu Graha', 'Magelang', '2015-01-30', '3371033001150003'),
(93, 53, 1, 1, 'Riyanti', 'Magelang', '1986-06-06', '3371024606860004'),
(94, 53, 2, 3, 'Nandita Alexa Suhariyanti', 'Magelang', '2006-03-24', '337103643060001'),
(95, 53, 3, 3, 'Adia Rafa Fathina', 'Magelang', '2013-06-22', '3371036206130001'),
(96, 54, 1, 1, 'Usmanur Dian Rosidah', 'Magelang', '1992-12-10', '3371036012920001'),
(97, 54, 2, 3, 'Dafi Raffasya Syafi', 'Magelang', '2011-04-21', '337103210410001'),
(98, 55, 1, 1, 'Tina Octavia', 'Magelang', '1989-10-04', '3371024410890001'),
(99, 55, 2, 3, 'Dewanta Keriel All Nasri', 'Magelang', '2011-06-15', '3371031506110001'),
(100, 56, 1, 1, 'Riana Wahyuni', 'Magelang', '1980-03-31', '3371027103800002'),
(101, 56, 2, 3, 'Ubaydillah Damar Maulana', 'Magelang', '2014-12-18', '3371031812140001'),
(102, 57, 1, 1, 'Dwi Septina ', 'Magelang', '1983-09-02', '3371014209830001'),
(103, 57, 2, 3, 'Muhammad Razaq Luhur Maulana', 'Magelang', '2003-08-31', '3371013108030001'),
(104, 57, 3, 3, 'Zalfa Ramadhani', 'Magelang', '2005-10-09', '3371014910050002'),
(105, 57, 4, 3, 'Ahmad Ali Gibran Maulana', 'Magelang', '2014-10-24', '3371032410140001'),
(106, 58, 1, 1, 'Dewi Ayu Puspitasari', 'Magelang', '1990-02-07', '3371014702900001'),
(107, 58, 2, 3, 'Sevira Bintang Maharani', 'Klaten', '2007-06-30', '3310037006070003'),
(108, 59, 1, 1, 'Novi Damawiyanti', 'Magelang', '1987-12-04', '3308144412870005'),
(109, 59, 2, 3, 'Arviana Aisya Achtania Salma', 'Magelang', '2005-07-26', '3308146607050001'),
(110, 59, 3, 3, 'Clarissa Rizkia Ayu Shafania', 'Magelang', '2014-05-26', '3371036605140003'),
(111, 60, 1, 1, 'Yurnita', 'Bukit Tinggi', '1969-11-15', '33710211096800003'),
(112, 60, 2, 3, 'Hendra Surya Nugraha', 'Jakarta', '1999-03-07', '337102070399000'),
(113, 60, 3, 3, 'Ab\'dan Syukur', 'Magelang', '2004-03-17', '3371021703040001'),
(114, 61, 1, 1, 'Yurnita', 'Magelang', '1969-11-15', '3371025511690002'),
(115, 61, 2, 3, 'Hendra Surya Nugraha', 'Jakarta', '1999-03-07', '3371020703990001'),
(116, 61, 3, 3, 'Ab\'dan Syukur', 'Magelang ', '2004-03-17', '3371021703040001'),
(117, 62, 1, 1, 'Astin Hidaroyah', 'Magelang', '1988-05-06', '3308194605880001'),
(118, 62, 2, 3, 'Kevin Radithya Pratama', 'Magelang', '2015-07-19', '3371021907150001'),
(119, 63, 1, 1, 'Iva Sylviana', 'Tegal', '1968-05-25', '3371026606690006'),
(120, 63, 2, 3, 'Oka Priambodo', 'Semarang', '1995-10-27', '3371022710950003'),
(121, 64, 1, 3, 'Kelvin Febrianto Putra', 'Dili', '1998-02-15', '3371021502980006'),
(122, 64, 2, 3, 'Yustina Mulyani', 'Magelang', '2005-01-06', '3371024601050002'),
(123, 65, 1, 1, 'Ria Ristanti', 'Magelang', '1992-07-17', '3371025707920001'),
(124, 65, 2, 3, 'Muchamad Raihan Hernanda', 'Magelang', '2011-01-19', '3371021901110001'),
(125, 65, 3, 3, 'Rafael Aprilio Hernanda', 'Magelang', '2013-04-30', '3371023004130001'),
(126, 66, 1, 1, 'Sri Purwati', 'Magelang', '1978-06-23', '3371016306780002'),
(127, 66, 2, 3, 'Alan Pranata', 'Magelang', '2002-10-03', '3371010310020003'),
(128, 66, 3, 3, 'Lanang Pranata', 'Magelang', '2006-11-05', '3371010511060002'),
(129, 66, 4, 3, 'Nicki Khasana Pranata', 'Magelang', '2008-04-28', '3371016804080001'),
(130, 67, 1, 3, 'Muhammad Irfan Cahya Aditya', 'Magelang', '2000-12-28', '3371022812990001'),
(131, 68, 1, 3, 'Ramzah Saputra', 'Magelang', '1995-06-15', '3308191506950001'),
(132, 69, 1, 1, 'Aprillia Shinta Dewi', 'Magelang', '1996-04-20', '33710126004960006'),
(133, 71, 1, 3, 'Satrio Suryo Wibowo', 'Magelang', '2000-09-10', '3371021009000004'),
(134, 72, 1, 3, 'Putri Dwiyanti', 'Magelang', '2000-01-02', '3371024201000004'),
(135, 73, 1, 1, 'Wina Puji Astuti', 'Magelang', '1994-08-06', '3371024608940001'),
(136, 73, 2, 3, 'Lingga Putra Mahesa', 'Magelang', '2013-01-25', '3371022501130001'),
(137, 74, 1, 1, 'Ika Asriyani', 'Magelang', '1982-11-13', '3371025311820001'),
(138, 74, 2, 3, 'Muhamad Fahmi Haikal', 'Magelang', '2011-06-20', '3371032806110001'),
(140, 74, 4, 3, 'Melsy Febiola Valentina.C', 'Magelang', '2005-02-01', '3371024102050001'),
(141, 75, 1, 1, 'Budi Puryani', 'Magelang', '1974-04-07', '3371014704740003'),
(142, 75, 2, 3, 'Gabriel Tri Wahyu S', 'Magelang', '2011-12-20', '3308112012010004'),
(143, 75, 3, 3, 'Johanes Petra Rivaldo', 'Magelang', '2012-01-01', '3308110101120001'),
(144, 76, 1, 1, 'Istikanah', 'Magelang', '1955-05-07', '1606114705550003'),
(145, 77, 1, 1, 'Istia Reni', 'Magelang', '1987-08-27', '3371026708670002'),
(146, 77, 2, 3, 'Alifa Shiren Yasykur Zhafran', 'Magelang', '2010-06-29', '3371036906100001'),
(147, 77, 3, 3, 'Muhammad Fauzan Akbar', 'Magelang', '2015-09-03', '3371030309150002'),
(148, 78, 1, 1, 'Prasetyawati Dwi Astuti ', 'Magelang', '1979-09-01', '3371024109790001'),
(149, 78, 2, 3, 'Bagas Rizky Pratama', 'Magelang', '2002-08-25', '3371022508020003'),
(150, 78, 3, 3, 'Anisa Syahidina Ardiani', 'Magelang', '2003-09-25', '3371026509030002'),
(151, 79, 1, 2, 'Gunadi', 'Magelang', '1977-10-04', '3371020410770001'),
(152, 79, 2, 3, 'Yulio Rangga Adisti', 'Magelang', '2002-07-22', '3371022207020003'),
(153, 80, 1, 3, 'Aldino Syaka Taruna Wijaya', 'Magelang', '1968-02-12', '3371031311060001'),
(154, 81, 1, 1, 'Rustinah', 'Magelang', '1973-07-29', '3371016907730008'),
(155, 81, 2, 3, 'Hani Setyaning Putri', 'Magelang', '2003-07-18', '3371035807030001'),
(156, 81, 3, 3, 'Helmi Febriano', 'Magelang', '2008-02-25', '3371032502080001'),
(157, 82, 1, 3, 'Nursyafricha Dinda Riznada', 'Magelang', '2000-10-01', '3371034110000001'),
(158, 83, 1, 1, 'Kartikawati Wijaya', 'Magelang', '1989-04-26', '3371026604890001'),
(159, 83, 2, 3, 'Christian Dicha Permana', 'Magelang', '2011-12-20', '3371012012110001'),
(160, 84, 1, 1, 'Siti Asiyah', 'Magelang', '1957-06-22', '337106205570001'),
(161, 85, 1, 1, 'Endah Purwanigrum', 'Purworejo', '1967-03-28', '3371026803670004'),
(162, 86, 1, 1, 'Istikomah', 'Magelang', '1970-03-12', '3308105203700002'),
(163, 86, 2, 3, 'Shofwan Fuad  Abdussalim', 'Magelang', '2005-01-25', '3308106403030003'),
(164, 86, 3, 3, 'Muhammad Abdul Chamid As Sidiqi', 'Magelang', '2009-02-20', '3308102002090001'),
(165, 86, 4, 3, 'Saniyya Putri Izzati', 'Magelang ', '2012-08-31', '3308107108120002'),
(166, 87, 1, 3, 'Yunior William Susanto', 'Magelang', '1994-05-04', '3371030405940002'),
(167, 87, 2, 3, 'Amelia Intan Permata Sari', 'Magelang', '1998-04-24', '33710364049890002'),
(168, 87, 3, 3, 'Ronaldo Yunior Susanto', 'Magelang', '2000-04-24', '3371037112540003'),
(169, 88, 1, 1, 'Lilik Maryani', 'Magelang', '1975-12-24', '3371026412750003'),
(170, 88, 2, 3, 'Aldo Dwi Saputra', 'Magelang', '1999-06-01', '33710201069900003'),
(171, 88, 3, 3, 'Aldila Kurnia Dewi', 'Magelang', '2005-09-02', '3371034405130002'),
(172, 88, 4, 3, 'Alfika Maysheila Putri', 'Magelang', '2013-05-04', '3371034405130002'),
(173, 89, 1, 1, 'Dwi Okta Nuraini', 'Magelang', '1996-10-07', '3371014710980001'),
(174, 89, 2, 3, 'Muhammad Nur Almahesa', 'Magelang', '2016-12-29', '3371032912150001'),
(175, 90, 1, 1, 'Malaita Sari', 'Magelang', '1994-09-30', '3371037009940001'),
(176, 91, 1, 1, 'Maryamah', 'Magelang', '1963-05-10', '3371015006630002'),
(177, 91, 2, 3, 'Septian Tri Wicaksono', 'Magelang', '1996-09-03', '3371010309960002'),
(178, 92, 1, 1, 'Suharni', 'Magelang', '1957-11-18', '337102581157001'),
(179, 93, 1, 1, 'Dwi Umorowati ', 'Magelang', '1968-10-07', '3371014710680004'),
(180, 93, 2, 3, 'Laili Syifa Yusriyah', 'Magelang', '2009-03-26', '3371036603090001'),
(181, 93, 3, 3, 'Isnaini Kumala Sari', 'Magelang', '2012-09-10', '3308155009120001'),
(182, 94, 1, 1, 'Mistri ', 'Surabaya', '1964-12-31', '3371027112630039'),
(183, 94, 2, 3, 'Deby Shinta Dewi', 'Magelang', '2006-09-05', '3371024509060001'),
(184, 95, 1, 1, 'Inggriana', 'Tegal', '1969-06-28', '3376036806690002'),
(185, 95, 2, 3, 'Clief Fiant\'s Wiraharja', 'Tegal', '1999-01-02', '33760218070200003'),
(186, 95, 3, 3, 'Calvin Astra Wiraharja', 'Tegal', '2000-07-18', '3376021807020003'),
(187, 96, 1, 2, 'Mardianto', 'Bukit tinggi', '1976-03-17', '3371021703760004'),
(188, 96, 2, 3, 'Shakyla Dava Revana', 'Magelang', '2006-05-15', '3371025505060002'),
(189, 96, 3, 3, 'Abdul malik Al Farisi', 'Magelang', '2011-03-11', '3371021103110001'),
(190, 97, 1, 1, 'Ria Agustina ', 'Magelang', '1976-08-10', '3371025008760001'),
(191, 97, 2, 3, 'Rizky Mehendra W ', 'Magelang', '2000-03-18', '3371021803000002'),
(192, 98, 1, 1, 'Tan Swie Nio', 'Magelang', '1964-03-10', '3371025003640006'),
(194, 99, 1, 3, 'Devi Rosantika', 'Magelang', '1997-07-29', '3371016907970006'),
(195, 100, 1, 3, 'Sani Safitri', 'Temanggung', '2009-09-25', '3371015509090001'),
(196, 100, 2, 6, 'Prihatiningsih', 'Jakarta', '1955-11-11', '3371015111560003'),
(197, 101, 1, 1, 'Olis Setriani', 'Magelang', '1988-07-07', '3371024707880003'),
(198, 101, 2, 3, 'Vida Bintang Azalia', 'Magelang', '2007-11-17', '3371036711070002'),
(199, 101, 3, 3, 'Vidi Javier Ghazali ', 'Magelang', '2013-07-14', '3371031407130001'),
(200, 102, 1, 1, 'Eko Sunarti', 'Temanggung', '1984-01-07', '3323094701810001'),
(201, 102, 2, 3, 'Adila Jati Anggraeni', 'Temanggung', '2015-10-16', '3371035610150001'),
(202, 103, 1, 1, 'Sri Wulan Susijami', 'Madiun', '1959-03-24', '3371016403590001'),
(203, 103, 2, 3, 'Dian Ayu Wardani', 'Magelang', '1999-05-16', '3371015605990001'),
(204, 104, 1, 3, 'Beni Kurniawan Aditya Perdana', 'Magelang', '1996-09-23', '3371012309960007'),
(205, 105, 1, 1, 'Listiyani Rahayu', 'Magelang', '1988-04-16', '3308155804880003'),
(206, 105, 2, 3, 'Zahra Nabil Lorenza', 'Magelang', '2008-01-11', '3308155101080003'),
(207, 105, 3, 3, 'Aldo Fauzi Dwi Wibowo', 'Magelang', '2015-12-09', NULL),
(208, 106, 1, 1, 'Lina Susanti', 'Magelang', '1969-10-20', '3371016110690003'),
(209, 107, 1, 1, 'Azqia Verna Devi Sulis Nur D', 'Magelang', '1999-10-31', '3371027110990004'),
(210, 107, 2, 3, 'Baina Putri Uidzuka', 'Magelang', '2002-10-08', '3371024810020001'),
(211, 107, 3, 3, 'Cikha Alim Meiling', 'Magelang', '2007-05-28', '3371036805070001'),
(212, 108, 1, 1, 'Wiwin Ferawati', 'Jirak', '1986-06-26', '3371036806860001'),
(213, 108, 2, 3, 'Akmal Kaka ferdinand', 'Magelang', '2006-08-05', '3371030508060003'),
(214, 108, 3, 3, 'Adiba Dwi Azzahra Rivera', 'Magelang', '2013-11-28', '3371036911130001'),
(215, 109, 1, 1, 'Dian Prafitri Larasati', 'Magelang', '1992-03-22', '3308086203920001'),
(218, 69, 2, 3, 'Rey Jevero Jekonio', 'Magelang', '2016-03-12', NULL),
(219, 90, 2, 3, 'Muhammad Zidan Al Fatih', 'Magelang', '2016-03-28', NULL),
(221, 92, 2, 4, 'Rafa Avida', 'Magelang', '2005-11-24', NULL),
(222, 111, 1, 1, 'Ester Laxmiyati', 'Magelang', '1981-04-30', '3371017004810001'),
(223, 111, 2, 3, 'Eundrew Kiky Esra Putra', 'Magelang', '2004-12-07', '3371030712040001'),
(224, 111, 3, 3, 'Fairuz Rifqa Anisa Rahmah', 'Magelang', '2011-05-01', '3371034105110001'),
(225, 40, 4, 3, 'Veronika Pascatesa Anneke Prastica', 'Magelang', '1996-04-07', '3371024704960004'),
(226, 112, 1, 1, 'Lilik Maryani', 'Magelang', '1975-12-24', '3371026412750003'),
(227, 112, 2, 3, 'Alfika Maysheila Putri', 'Magelang', '2013-05-04', '3371034405130003'),
(228, 112, 3, 3, 'Aldila Kurnia Dewi', 'Magelang', '2005-09-02', '33710344505130002'),
(229, 112, 4, 3, 'Aldo Dwi Saputra', 'Magelang', '1999-06-01', '3371020106990002'),
(230, 113, 1, 1, 'Marlina Setiowati', 'Magelang', '1981-10-18', '3371015810810001'),
(231, 113, 2, 3, 'Nathanael Timmoty Christi', 'Magelang', '2018-11-29', '3371032911080001'),
(232, 113, 3, 3, 'Abigael  Samantha Christi', 'Magelang', '2013-11-02', '3371034211130001'),
(233, 114, 1, 1, 'Novi Damawiyanti', 'Magelang', '1987-12-04', '3308144412870005'),
(234, 114, 2, 3, 'Clarissa Rizkia Ayu Shafania', 'Magelang', '2014-05-26', '3371036605140003'),
(235, 114, 3, 3, 'Rafasya Satria Ramadan', 'Magelang', '2016-06-30', NULL),
(236, 115, 1, 1, 'Ika Septiyani', 'Magelang', '1989-09-12', '3308145209890001'),
(237, 115, 2, 3, 'Vendra Aprilyo', 'Magelang', '2015-04-22', '3371032204150001'),
(238, 116, 1, 1, 'Tiwi Rahayu', 'Magelang', '1992-06-02', '3371014206920002'),
(239, 116, 2, 3, 'Livia Agisni Ramadhani', 'Magelang', '2010-09-03', '3371034309100001'),
(240, 116, 3, 3, 'Tsabata Ramadipta Sanjaya', 'Magelang', '2014-12-03', '3371030312140001'),
(241, 116, 4, 3, 'Aprilia Lupita Revalina', 'Magelang', '2016-04-07', '3371034704160002'),
(242, 117, 1, 1, 'Bangkit Tri Subekti Zumrotul', 'Magelang', '1988-12-08', '3308104812880002'),
(243, 117, 2, 3, 'Muhammad Latif Prasetyo', 'Magelang', '2012-09-27', '3371032709120001'),
(244, 118, 1, 1, 'Nia Dening Marta', 'Jember', '1993-01-04', '3308204401930001'),
(245, 118, 2, 3, 'Abinaya Hafidz Martaditya', 'Magelang', '2015-05-23', '3371022305150001'),
(246, 119, 1, 1, 'Wulandari', 'Magelang', '1988-10-15', '3371025510880003'),
(247, 119, 2, 3, 'Mahsa Anggita Sugiarto', 'Magelang', '2012-01-07', '3371024701120001'),
(248, 119, 3, 3, 'Hafiz Syarief Sugiarto', 'Magelang', '2014-09-22', '3371022209140001'),
(249, 120, 1, 1, 'Ismiyati Iskandar', 'Magelang', '1977-08-15', '3371015508770002'),
(250, 120, 2, 3, 'Nur Hanifah', 'Magelang', '2007-07-06', '3371014607070001'),
(251, 121, 1, 1, 'Aprilia Nur Fitri', 'Magelang', '1990-04-19', '3371026904900001'),
(252, 121, 2, 3, 'Manes', 'Magelang', '2014-12-08', '3371034812140001'),
(253, 122, 1, 1, 'Diah Maharani Wulandari Citradewi', 'Semarang', '1985-09-09', '3371024909850001'),
(254, 122, 2, 3, 'Arkana Fadel Qur\' Anulhakim', 'Magelang', '2012-08-04', '3371020408120002'),
(255, 122, 3, 3, 'Raihana Rafa Zhaafirah', 'Magelang', '2016-06-14', '3371025406160002'),
(256, 123, 1, 1, 'Ida Karomah Nurul Kusuma', 'Magelang', '1974-07-17', '3371015707740002'),
(257, 123, 2, 3, 'Syafila Roza Azzahra', 'Magelang', '2000-10-31', '3371017110000003'),
(258, 123, 3, 3, 'Syafla Alyul Azzahra', 'Magelang', '2006-08-08', '3371034808060001'),
(259, 124, 1, 1, 'Trisna Setyawati', 'Magelang', '1993-02-03', '3371024302930002'),
(260, 124, 2, 3, 'Nino Tristar Untoro', 'Magelang', '2013-06-27', '3371032706130003'),
(262, 125, 2, 3, 'Dwi Erika Damayanti', 'Magelang', '1996-05-16', '3371025605960001'),
(263, 125, 3, 3, 'Desyta tri Puspitasari', 'Magelang', '2005-12-06', '3371024612050006'),
(264, 126, 1, 2, 'Nugroho Budi Susanto', 'Magelang', '1980-08-17', '3371031708800001'),
(265, 126, 2, 3, 'Syafa Putri Meyra', 'Magelang', '2002-05-17', '3371035705020001'),
(266, 126, 3, 3, 'Arya Putra Rangga', 'Magelang', '2004-03-09', '3371030903040001'),
(267, 126, 4, 3, 'Defa Ferry Ardiansyah', 'Magelang', '2006-09-15', '3371031509060001'),
(268, 127, 1, 1, 'Anggraeni Puspita Sari', 'Magelang', '1991-05-31', '3371027105910001'),
(269, 127, 2, 3, 'Flanela Regina Putri', 'Magelang', '2011-12-05', '3371034512110001'),
(270, 128, 1, 3, 'Fahrizal Aziz', 'Magelang', '1998-07-21', '3371012107980003'),
(271, 128, 2, 3, 'Fahreza Elma Nafiah Azizah', 'Magelang', '2002-08-30', '3371017008020001'),
(272, 129, 1, 1, 'Nunung Dwi Purwati', 'Magelang', '1972-09-19', '3371015909720002'),
(273, 129, 2, 3, 'Chelsy Sumardi Saputri', 'Magelang', '1999-06-22', '3371016206990001'),
(274, 129, 3, 3, 'Graitto Pringgodani S.I.P', 'Magelang', '2006-06-03', '3371010306060001'),
(275, 130, 1, 1, 'Nita Anggraeni', 'Magelang', '1988-02-10', '3371025002880001'),
(276, 130, 2, 3, 'Muhammad Alif Al-Faudzi', 'Magelang', '2013-03-31', '3371023103130001'),
(277, 131, 1, 2, 'Muhammad Muntjar Tjahjono', 'Klaten', '1972-05-07', '3371010705720002'),
(278, 131, 2, 3, 'Diaz Arsya Ramadhan', 'Magelang', '2002-10-23', '3371012310020005'),
(279, 131, 3, 3, 'Shaira jasmine Salsabila', 'Magelang', '2005-10-05', '3371014510050001'),
(280, 132, 1, 1, 'Nanik Hartini', 'Magelang', '1968-09-14', '3371015409680004'),
(281, 132, 2, 3, 'Yashinta Anjar Maharani', 'Magelang', '2002-11-23', '3371016311020004'),
(282, 133, 1, 1, 'Ritaningsih', 'Magelang', '1969-03-16', '3371022312140002'),
(283, 134, 1, 3, 'Cut Alfira', 'Bandung', '2004-02-25', '3371032101150004'),
(284, 134, 2, 4, 'Alfisya  Kania Brillianti', 'Magelang', NULL, NULL),
(285, 135, 1, 2, 'Suwandi', 'Pacitan', '1971-12-31', '367405112700004'),
(286, 135, 2, 3, 'Nurul Azizah Ramahwati', 'Jakarta', '2008-03-14', '3371035403080001'),
(287, 136, 1, 1, 'Chony Oktaviani', 'Magelang', '1994-10-28', '33710268110940001'),
(288, 136, 2, 3, 'Gavriel Alvaro Wicaksono', 'Magelang', '2015-01-06', '3371020601150002'),
(289, 137, 1, 1, 'Tri Latianingsih', 'Magelang', '1962-03-11', '3371015103620004'),
(290, 137, 2, 3, 'Anisa Purnaningsih', 'Magelang', '1997-09-22', '3371016209970004'),
(291, 138, 1, 1, 'Risna Sastika Sari', 'Magelang', '1991-01-14', '3371025401910005'),
(292, 138, 2, 3, 'Albie Febrian Naufal Rafandra', 'Magelang', '2012-02-17', '3371021702120003'),
(293, 139, 1, 1, 'Prihatma Septarani', 'Jakarta', '1986-09-16', '3372055609860002'),
(294, 139, 2, 3, 'Hassya Rama Prakosa', 'Surakarta', '2013-03-03', '3372050303130002'),
(295, 140, 1, 2, 'Hosea Subroto', 'Magelang', '1983-10-31', '3308103110830001'),
(296, 141, 1, 2, 'Hosea Subroto', 'Magelang', '1983-10-31', '3308103110830001'),
(297, 141, 2, 3, 'Aqilah Khanza Azzahra', 'Magelang', NULL, '3371034703160001'),
(298, 142, 1, 4, 'Alvares Dimas Zevansa', 'Temanggung', '2015-09-05', '3371030509150001'),
(299, 143, 1, 1, 'Vitria Anggralevi', 'Magelang', '1988-04-25', '3371036504880001'),
(300, 144, 1, 1, 'Aulia Dinta Dwi Audina A.D', 'Magelang', '1995-07-21', '3371016107950003'),
(301, 144, 2, 3, 'Samuel Alvaro Lesna Adikara', 'Magelang', '2014-08-21', '3371032108140003'),
(302, 145, 1, 1, 'Fajriyah', 'Banjarnegara', '1973-06-25', '3308206506730003'),
(303, 145, 2, 3, 'Lail Widya Selima', 'Banjarnegara', '1996-05-10', '3308205005960003'),
(304, 146, 1, 1, 'Metta Ridla Kholifah', 'Magelang', '1993-06-20', '3371026006930003'),
(305, 146, 2, 3, 'Yudhistira Farezky', 'kab.Semarang', '2013-02-16', '3374111602130004'),
(306, 147, 1, 1, 'Tyas Rukmi', 'Magelang, ', '1990-10-26', '3371016609900003'),
(307, 147, 2, 3, 'Reyvino Adi Putra Ramadhan', 'Magelang', '2010-08-28', '3371032808100001'),
(308, 148, 1, 1, 'Budiyanti', 'Magelang', '1976-07-16', '3308195607760002'),
(309, 148, 2, 3, 'Winda Ayu Fitriana', 'Lampung Tengah', '2003-11-29', '3308196911030005'),
(310, 140, 2, 3, 'Aqilah Khanza Azzahra', 'Magelang', NULL, '3371034703160001'),
(311, 149, 1, 1, 'Indiana Arfika', 'Magelang', '1990-01-15', '3371015501900002'),
(312, 149, 2, 3, 'Rava Shidqi Rihadatul \'Aisy', 'Magelang', '2011-03-15', '3371031503110001'),
(313, 149, 3, 3, 'Kania Shidqi Azni', 'Magelang', '2015-04-22', '33710362041500001'),
(314, 150, 1, 1, 'Dyah Zullistyawati', 'Paniai', '1984-10-26', '3371036610840001'),
(315, 150, 2, 5, 'Naysilla Az Zahra', 'Magelang', '2011-12-26', '3371036612100002'),
(316, 151, 1, 1, 'Rini Nurcahyanti', 'Magelang', '1993-10-27', '3371016710930001'),
(317, 152, 1, 1, 'Sri Muntari', 'Magelang', '1968-12-17', '3371025712680002'),
(318, 152, 2, 3, 'Elda Krismawati', 'Magelang', '1998-04-24', '3371025805980004'),
(319, 134, 3, 2, 'Ichsanudin', 'Magelang', '1980-08-16', '3308191608800001'),
(320, 154, 1, 1, 'Christina Marlina Anjani', 'Magelang', '1998-01-19', '3371015901980001'),
(321, 154, 2, 3, 'Giovani Risal Chedva Yerik', 'Magelang', '2013-12-23', '3371012312130002'),
(322, 155, 1, 1, 'Agesti Nuraftiani', 'Magelang', '1998-06-20', '3371026006980004'),
(323, 155, 2, 3, 'Keano Rendra Putra Adyasta', 'Magelang', '2015-08-21', '33710321061500003'),
(324, 155, 3, 3, 'Queena Kirania Putri Adyasta', 'Magelang', '2016-12-22', '3371036212160001'),
(325, 156, 1, 1, 'Risanti NindyaSaputri', 'Magelang', '1995-09-04', '3371014409950002'),
(326, 157, 1, 1, 'Ria Puspita', 'Magelang', '1985-06-29', '3371026906850001'),
(327, 157, 2, 3, 'Rizky Wahid Al Hasan', 'Magelang', '2004-02-14', '3371021402040001'),
(328, 157, 3, 3, 'Sania Wildan Da Nisa', 'Magelang', '2006-06-15', '3371025506060002'),
(329, 158, 1, 1, 'Lina Kurniati', 'Magelang', '1992-04-04', '3371014404920001'),
(330, 158, 2, 3, 'Valencia Winona Ayommi', 'Magelang', '2014-10-26', '3371016610140001'),
(331, 159, 1, 1, 'Yeni Rismawati', 'Magelang', '1989-01-21', NULL),
(332, 159, 2, 5, 'Wildan Revand Asya Pradana', 'Magelang', '2010-11-02', NULL),
(333, 153, 1, 1, 'Fransisca Selvyanna Putri', 'Jakarta', '1992-08-25', '3371026508920002'),
(334, 160, 1, 1, 'Eni Asiati', 'Magelang', '1969-05-03', '3371024305690003'),
(335, 160, 2, 3, 'Muhammad Akhdan At Tamimy', 'Magelang', '2008-01-17', '3371021701080002'),
(336, 160, 3, 3, 'Rafi\' Al Faruq', 'Magelang', '2009-11-20', '3371022011090001'),
(340, 162, 1, 1, 'Nuri Febriyanti', 'Magelang', '1986-01-31', '3371017101860001'),
(341, 162, 2, 3, 'Syarif Tirta Mahardika', 'Magelang', '2006-04-24', '3371012404060001'),
(342, 163, 1, 1, 'RR Dewiyana Natalia', 'Brebes', '1990-12-05', NULL),
(343, 163, 2, 3, 'Salsika Zizi Akeila', 'Magelang', '2014-07-31', NULL),
(344, 146, 3, 3, 'Dwiky Arjuna', 'Kota Magelang', '2017-01-01', '3371010101170001'),
(345, 156, 2, 3, 'Andrea Given Putri Pambudi', 'Magelang', '2004-06-21', '3371026106040003'),
(346, 164, 1, 1, 'Rida Ristiyani', 'Magelang', '1983-09-15', '3371025509830004'),
(347, 164, 2, 3, 'Pradika Bagas Prakoso', 'Magelang', '2004-08-08', '3371020808040001'),
(348, 164, 3, 3, 'Praja Dimas Prakoso', 'Magelang', '2007-04-27', '3371022704070001'),
(349, 165, 1, 1, 'Susanti', 'Jakarta', '1983-02-28', '3371036802830001'),
(350, 165, 2, 3, 'Daffa Achmad Najib', 'Depok', '2009-03-30', '3371033003080002'),
(351, 166, 1, 1, 'Syarifah Nurul Tsani', 'Magelang', '1987-12-20', '3374036012870004'),
(352, 166, 2, 3, 'Akbar H Rafiif', 'Semarang', '2011-12-29', '3374032912110001'),
(353, 166, 3, 3, 'Zhidan Asy-Syafiq', 'Magelang', '2014-04-15', '3371021504140003'),
(354, 166, 4, 3, 'Lalana Aal Ya Fitri Widatama', 'Magelang', '2018-03-05', '3371024503160002'),
(355, 167, 1, 1, 'Surti Anggraeni', 'Magelang', '1990-08-07', '3371024708900001'),
(356, 167, 2, 3, 'Kanaka Gilang Aditya', 'Magelang', '2016-01-30', '3371033001160001'),
(357, 168, 1, 1, 'Srahati', NULL, NULL, NULL),
(358, 168, 2, 3, 'Fendri Arwanto', NULL, NULL, NULL),
(359, 168, 3, 3, 'Achika Hayyu Ariafensila', NULL, NULL, NULL),
(360, 169, 1, 1, 'Eni Nuryani', 'Malang', '1977-09-10', '3371025009770001'),
(361, 169, 2, 3, 'Rizwan Nurhafiz Pratama', 'Trenggalek', '2003-03-11', '3371021103030003'),
(362, 169, 3, 3, 'Ary Dimas Farhan', 'Magelang', '2008-01-01', '3371020101080003'),
(363, 170, 1, 1, 'Erni Yudiyanti', 'Magelang', '1974-04-19', '3371025904740003'),
(364, 170, 2, 3, 'Aisyah Putri Shaliha', 'Magelang', '2014-10-22', '3371016210140001'),
(365, 83, 3, 3, 'Alea', 'Magelang', NULL, NULL),
(366, 147, 3, 3, 'Kenzie Sakha Arifin', 'Magelang', '2018-05-09', '3371030905180002'),
(367, 171, 1, 1, 'Antonio Puri Nugrahanti', 'Magelang', '1964-06-13', '3371015306840005'),
(368, 171, 2, 3, 'Emanuel Nathan Januzalaj Nugrahanta', 'Magelang', '2014-01-10', '3308101001140001'),
(369, 171, 3, 3, 'Rafael Kristianto', 'Magelang', '2016-12-31', '3308103112160009'),
(370, 154, 3, 3, 'Johanes Elihu Teguh', 'Magelang', '2018-02-20', '3371012802180002'),
(371, 172, 1, 1, 'Budi Sulastri', 'Magelang', '1981-08-17', '3371035708810001'),
(372, 172, 2, 3, 'Anandita Indah Utami', 'Kota Magelang', '2009-12-14', '3371035412090001'),
(373, 173, 1, 1, 'Heni Susanti', 'Magelang', '1981-10-25', '33808036510810004'),
(374, 173, 2, 3, 'Mutiara Azzahra', 'Magelang', '2006-02-11', '3308035102060001'),
(375, 173, 3, 3, 'Agra Resha Fahlefi', 'Magelang', '2017-03-30', '3371033003170001'),
(376, 174, 1, 1, 'Intan Setiani', 'Magelang', '1997-05-06', '3308104605970008'),
(377, 174, 2, 3, 'Ricky Putra Setiawan', 'Kota Magelang', '2014-01-11', '3371031101140002'),
(378, 174, 3, 3, 'Reyhan Virendra Setiawan', 'Kota Magelang', '2016-08-06', '3371030608160002'),
(379, 175, 1, 1, 'Riyanti', 'Magelang', '1981-06-30', '3371027006810001'),
(380, 175, 2, 3, 'Cut Alfira', 'Magelang', '2004-02-25', '3371036502040001'),
(381, 175, 3, 3, 'Alfisa Kania .B', 'Magelang', '2008-07-29', NULL),
(382, 176, 1, 1, 'Ladhina Putri Jaya', 'Magelang', '1994-08-18', '3371035808940001'),
(383, 176, 2, 3, 'Almeina Shidqia Az Zahwa', 'Kota Magelang', '2013-05-19', '3371036905130001'),
(384, 177, 1, 1, 'Ike Yuliana', 'Magelang', '1982-03-09', '3308134903820007'),
(385, 177, 2, 3, 'Rayhan Niesta Milandry', 'Magelang', '2003-09-20', '3308132909030002'),
(386, 177, 3, 3, 'Noviana Aulia Agista', 'Magelang', '2007-11-09', '3308134911070003'),
(387, 178, 1, 1, 'Dara Astriani Pangesti', 'Magelang', '1996-10-12', '3371015210990001'),
(388, 179, 1, 1, 'Meita Damayanti Wibowo', 'Magelang', '1994-05-30', '3371017005940002'),
(389, 179, 2, 3, 'Irine Titania Prameswari', 'Kota Magelang', '2015-12-15', '3371035512150002'),
(390, 180, 1, 1, 'Ratnawati Sukamdi', 'Magelang', '1988-12-28', '3371026812870002'),
(391, 181, 1, 1, 'Sulastri', 'Magelang', '1969-10-08', '3308104810690005'),
(392, 181, 2, 3, 'Rahmat Daniyanto', 'Magelang ', '2004-09-29', '3308102909040001'),
(393, 182, 1, 1, 'Istianah', 'Magelang', '1991-08-06', '3380814460891002'),
(394, 182, 2, 3, 'Satria Afif Firdauz', 'Magelang', '2014-12-06', '3308140612140003'),
(395, 182, 3, 3, 'Muhammad Arsenio Ajmal', 'Magelang', '2017-10-21', NULL),
(396, 183, 1, 1, 'Dian Fitriyana', 'Magelang', '1998-02-02', '3371014202980002'),
(397, 184, 1, 1, 'Putri Arum Sari ', 'Kota Magelang', '2001-05-09', '3371024905010003'),
(398, 184, 2, 3, 'Muhammad Pratama Putra ', 'Kota Magelang', '2018-01-21', '3371032101180002'),
(399, 185, 1, 1, 'Dian Fitriana', 'Magelang ', '1998-02-02', '3371014202980002'),
(400, 186, 1, 1, 'Rika Triana Sari', 'Magelang', '1986-10-18', '3371015810860002'),
(401, 186, 2, 3, 'Adelia Renata', 'Magelang', '2004-09-02', '3371014209040001'),
(402, 186, 3, 3, 'Ferrel Alviano', 'Magelang', '2014-12-07', '3371010712140001'),
(403, 187, 1, 1, 'Eva  Ariyani', 'Magelang', '1998-06-27', '3308136706960006'),
(404, 187, 2, 3, 'Keysa Nabila Saputri', 'Magelang', '2016-08-27', '3371018708100002'),
(405, 188, 1, 1, 'Reni Dwi Apriliani', 'Magelang', '1999-04-16', '3371025604990003'),
(406, 188, 2, 3, 'Queen Rara Putri', 'Magelang', '2017-06-30', '3371037006170001'),
(407, 189, 1, 1, 'Roh kayatun', 'Semarang ', '1985-06-28', '3374026808850004'),
(408, 189, 2, 3, 'Muhamad Aditya Rahardiyanto', 'Semarang', '2010-02-27', '3374022702100002'),
(409, 189, 3, 3, 'Sultan Fatah Rahardiyanto', 'Semarang', '2014-05-03', '3374020305140002'),
(410, 190, 1, 1, 'Rosita Liestiani', 'Magelang', '1990-07-23', '3371016307900001'),
(411, 191, 1, 1, 'Sri Wahyuni', 'Bogor', '1993-09-24', '3201186409930003'),
(412, 191, 2, 3, 'Nadia Adeva Ramadhani', 'Bogor', '2015-07-08', '3201184807150002'),
(413, 192, 1, 1, 'Wina Ajeng Rismawati', 'Magelang', '1987-08-05', '3371024508870001'),
(414, 194, 1, 1, 'Sarinten', 'Magelang', '1985-05-07', '3308064705850004'),
(415, 194, 2, 3, 'Redondo Alifiano Haryanto', 'Magelang', '2007-12-08', '3308060812070002'),
(416, 194, 3, 3, 'Arini Rahmania Haryanto', 'Magelang', '2015-12-08', '3371034812150002'),
(417, 195, 1, 1, 'Elisabeth Adelia', 'Magelang', '1998-07-16', '3371015607980001'),
(418, 196, 1, 1, 'Ririn Setiani', 'Magelang', '1994-11-11', '337105111940001'),
(419, 196, 2, 3, 'Bara Ristya Anggara', 'Kota Magelang', '2017-01-14', '3371011401170001'),
(420, 196, 3, 3, 'Sabrina Ristya Febryani', 'Kota Magelang', '2015-02-20', '3371016002150004'),
(421, 197, 1, 1, 'Sri Utami', 'Magelang', '1986-06-03', '3308214306860006'),
(422, 197, 2, 3, 'Yohana Azzahra', 'Kota Magelang', '2013-12-23', '3371026312130001'),
(423, 197, 3, 3, 'Muhammad Zeva Prasetiono', 'Kota Magelang', '2020-04-08', '3371020804200001'),
(424, 198, 1, 1, 'Eko Rumiyati', 'Salatiga', '1975-05-05', '3373014805750001'),
(425, 198, 2, 3, 'Galang Wahyu Asoka', 'Salatiga', '2004-04-29', '3373012902040002'),
(426, 198, 3, 3, 'Rafael Attahya Wicaksana', 'Salatiga', '2007-03-06', '3373010803070005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_rusun_user`
--

DROP TABLE IF EXISTS `role_rusun_user`;
CREATE TABLE IF NOT EXISTS `role_rusun_user` (
  `User_Id` int(11) NOT NULL,
  `Rusun_Id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_rusun_user`
--

INSERT INTO `role_rusun_user` (`User_Id`, `Rusun_Id`) VALUES
(3, 4),
(3, 1),
(3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stand_meter`
--

DROP TABLE IF EXISTS `stand_meter`;
CREATE TABLE IF NOT EXISTS `stand_meter` (
  `Stand_Meter_Id` bigint(20) NOT NULL,
  `Jns_Stand_Meter_Id` int(11) DEFAULT NULL,
  `Unit_Sewa_Id` int(11) DEFAULT NULL,
  `Tahun` smallint(6) DEFAULT NULL,
  `Bulan` smallint(6) DEFAULT NULL,
  `Meter_Awal` int(11) DEFAULT NULL,
  `Meter_Akhir` int(11) DEFAULT NULL,
  `Meter_Pakai` int(11) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE IF NOT EXISTS `tagihan` (
  `Tagihan_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Check_In_Id` varchar(250) DEFAULT NULL,
  `Tgl_Tagihan` datetime DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Tahun` smallint(6) DEFAULT NULL,
  `Bulan` smallint(6) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Tagihan_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`Tagihan_Id`, `Check_In_Id`, `Tgl_Tagihan`, `Keterangan`, `Tahun`, `Bulan`, `Created_By`, `Created_Date`, `Modified_By`, `Modified_Date`) VALUES
(1, '20191109-0001', '2020-02-06 10:17:14', 'Tagihan Sewa Bulanan - Januari', 2020, 1, 'Super Administrator', '2020-02-06 10:17:14', NULL, NULL),
(2, '20191130-0001', '2020-02-06 10:17:14', 'Tagihan Sewa Bulanan - Januari', 2020, 1, 'Super Administrator', '2020-02-06 10:17:14', NULL, NULL),
(3, '20200204-0001', '2020-02-06 10:17:14', 'Tagihan Sewa Bulanan - Januari', 2020, 1, 'Super Administrator', '2020-02-06 10:17:14', NULL, NULL),
(4, '20191109-0001', '2020-07-16 00:00:00', 'Iuran Listrik Bulan Juli 2020', 2020, 7, 'Super Administrator', '2020-07-01 11:20:21', NULL, NULL),
(5, '20191130-0001', '2020-07-16 00:00:00', 'Iuran Listrik Bulan Juli 2020', 2020, 7, 'Super Administrator', '2020-07-17 12:21:07', NULL, NULL),
(6, '20191109-0001', '2020-07-16 00:00:00', 'Iuran Air Bulan Juli 2020', 2020, 7, 'Super Administrator', '2020-07-17 12:21:34', NULL, NULL),
(7, '20191109-0001', '2020-07-17 12:23:05', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:05', NULL, NULL),
(8, '20191109-0001', '2020-07-17 12:23:05', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:05', NULL, NULL),
(9, '20191130-0001', '2020-07-17 12:23:06', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:06', NULL, NULL),
(10, '20191130-0001', '2020-07-17 12:23:06', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:06', NULL, NULL),
(11, '20200204-0001', '2020-07-17 12:23:06', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:06', NULL, NULL),
(12, '20200204-0001', '2020-07-17 12:23:06', 'Tagihan Sewa Bulanan - Juli', 2020, 7, 'Super Administrator', '2020-07-17 12:23:06', NULL, NULL),
(13, '20191109-0001', '2020-06-16 00:00:00', 'Iuran Listrik Bulan Juni 2020', 2020, 6, 'Super Administrator', '2020-07-20 21:03:46', NULL, NULL),
(14, '20191130-0001', '2020-06-16 00:00:00', 'Iuran Listrik Bulan Juni 2020', 2020, 6, 'Super Administrator', '2020-07-20 21:03:56', NULL, NULL),
(15, '20191109-0001', '2020-06-16 00:00:00', 'Iuran Air Bulan Juni 2020', 2020, 6, 'Super Administrator', '2020-07-20 21:06:18', NULL, NULL),
(16, '20191130-0001', '2020-06-16 00:00:00', 'Iuran Air Bulan Juni 2020', 2020, 6, 'Super Administrator', '2020-07-20 21:06:26', NULL, NULL),
(17, '20191109-0001', '2020-07-20 21:07:56', 'Tagihan Sewa Bulanan - Juni', 2020, 6, 'Super Administrator', '2020-07-20 21:07:56', NULL, NULL),
(18, '20191130-0001', '2020-07-20 21:07:56', 'Tagihan Sewa Bulanan - Juni', 2020, 6, 'Super Administrator', '2020-07-20 21:07:56', NULL, NULL),
(19, '20200204-0001', '2020-07-20 21:07:56', 'Tagihan Sewa Bulanan - Juni', 2020, 6, 'Super Administrator', '2020-07-20 21:07:56', NULL, NULL),
(20, '20191109-0001', '2020-08-16 00:00:00', 'Iuran Listrik Bulan Agustus 2020', 2020, 8, 'Super Administrator', '2020-07-21 00:40:12', NULL, NULL),
(21, '20191109-0001', '2020-08-16 00:00:00', 'Iuran Air Bulan Agustus 2020', 2020, 8, 'Super Administrator', '2020-07-21 00:40:32', NULL, NULL),
(22, '20191109-0001', '2020-07-21 00:41:49', 'Tagihan Sewa Bulanan - Agustus', 2020, 8, 'Super Administrator', '2020-07-21 00:41:49', NULL, NULL),
(23, '20191130-0001', '2020-07-21 00:41:49', 'Tagihan Sewa Bulanan - Agustus', 2020, 8, 'Super Administrator', '2020-07-21 00:41:49', NULL, NULL),
(24, '20200204-0001', '2020-07-21 00:41:49', 'Tagihan Sewa Bulanan - Agustus', 2020, 8, 'Super Administrator', '2020-07-21 00:41:49', NULL, NULL),
(25, '20191109-0001', '2020-09-16 00:00:00', 'Iuran Listrik Bulan September 2020', 2020, 9, 'Super Administrator', '2020-08-13 18:08:05', NULL, NULL),
(26, '20191109-0001', '2020-09-16 00:00:00', 'Iuran Air Bulan September 2020', 2020, 9, 'Super Administrator', '2020-08-13 18:08:51', NULL, NULL),
(27, '20191109-0001', '2020-05-11 00:00:00', 'Iuran Listrik Bulan Mei 2020', 2020, 5, 'Super Administrator', '2020-08-13 19:32:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan_detail`
--

DROP TABLE IF EXISTS `tagihan_detail`;
CREATE TABLE IF NOT EXISTS `tagihan_detail` (
  `Tagihan_Detail_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tagihan_Id` int(11) DEFAULT NULL,
  `Item_Pembayaran_Id` smallint(6) DEFAULT NULL,
  `Tahun` smallint(6) DEFAULT NULL,
  `Bulan` smallint(6) DEFAULT NULL,
  `Meter_Awal` int(11) DEFAULT NULL,
  `Meter_Akhir` int(11) DEFAULT NULL,
  `Meter_Pakai` smallint(6) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Harga_Satuan` int(11) DEFAULT NULL,
  `Biaya_Beban` int(11) DEFAULT NULL,
  `PPJ` int(11) DEFAULT NULL,
  PRIMARY KEY (`Tagihan_Detail_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan_detail`
--

INSERT INTO `tagihan_detail` (`Tagihan_Detail_Id`, `Tagihan_Id`, `Item_Pembayaran_Id`, `Tahun`, `Bulan`, `Meter_Awal`, `Meter_Akhir`, `Meter_Pakai`, `Jumlah`, `Harga_Satuan`, `Biaya_Beban`, `PPJ`) VALUES
(1, 1, 1, 2020, 1, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(2, 1, 4, 2020, 1, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(3, 2, 1, 2020, 1, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(4, 2, 4, 2020, 1, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(5, 3, 1, 2020, 1, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(6, 3, 4, 2020, 1, NULL, NULL, NULL, 1000, NULL, NULL, NULL),
(7, 4, 2, 2020, 7, 900, 1250, 350, 348000, 900, 1200, 31620),
(8, 5, 2, 2020, 7, 900, 2550, 1650, 1635000, 900, 1200, 148620),
(9, 6, 3, 2020, 7, 1200, 2550, 1350, 1341000, 900, 3600, 121860),
(10, 8, 1, 2020, 7, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(11, 8, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(12, 8, 1, 2020, 7, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(13, 8, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(14, 9, 1, 2020, 7, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(15, 9, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(16, 10, 1, 2020, 7, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(17, 10, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(18, 11, 1, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(19, 11, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(20, 12, 1, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(21, 12, 4, 2020, 7, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(22, 13, 2, 2020, 6, 900, 2550, 1650, 1487000, 900, 1200, 0),
(23, 14, 2, 2020, 6, 900, 2550, 1650, 1487000, 900, 1200, 0),
(24, 15, 3, 2020, 6, 1200, 2550, 1350, 1622000, 1200, 1550, 0),
(25, 16, 3, 2020, 6, 900, 2550, 1650, 1982000, 1200, 1550, 0),
(26, 17, 1, 2020, 6, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(27, 17, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(28, 18, 1, 2020, 6, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(29, 18, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(30, 19, 1, 2020, 6, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(31, 19, 4, 2020, 6, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(32, 20, 2, 2020, 8, 900, 3550, 2650, 3502000, 1200, 3600, 318360),
(33, 21, 3, 2020, 8, 1200, 3550, 2350, 2303000, 890, 1540, 209304),
(34, 22, 1, 2020, 8, NULL, NULL, NULL, 150000, NULL, NULL, NULL),
(35, 22, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(36, 23, 1, 2020, 8, NULL, NULL, NULL, 100000, NULL, NULL, NULL),
(37, 23, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(38, 24, 1, 2020, 8, NULL, NULL, NULL, 25000, NULL, NULL, NULL),
(39, 24, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL),
(40, 25, 2, 2020, 9, 900, 2550, 1650, 1635000, 900, 1200, 148620),
(41, 26, 3, 2020, 9, 1200, 2550, 1350, 1622000, 1200, 1200, 0),
(42, 27, 2, 2020, 5, 900, 2550, 1650, 1984000, 1200, 3600, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

DROP TABLE IF EXISTS `tahun`;
CREATE TABLE IF NOT EXISTS `tahun` (
  `tahun_id` int(11) NOT NULL,
  `nama_tahun` varchar(100) NOT NULL,
  PRIMARY KEY (`tahun_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `nama_tahun`) VALUES
(2016, '2016'),
(2017, '2017'),
(2018, '2018'),
(2019, '2019'),
(2020, '2020'),
(2021, '2021'),
(2022, '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_sewa`
--

DROP TABLE IF EXISTS `tipe_sewa`;
CREATE TABLE IF NOT EXISTS `tipe_sewa` (
  `Tipe_Sewa_Id` varchar(250) NOT NULL,
  `Nama_Tipe_Sewa` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Tipe_Sewa_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_sewa`
--

INSERT INTO `tipe_sewa` (`Tipe_Sewa_Id`, `Nama_Tipe_Sewa`, `Singkatan`) VALUES
('bln', 'Per Bulan', 'Bulan'),
('hr', 'Per Hari', 'Hari'),
('pkt', 'Per Paket', 'Paket'),
('thn', 'Per Tahun', 'Tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_sewa`
--

DROP TABLE IF EXISTS `unit_sewa`;
CREATE TABLE IF NOT EXISTS `unit_sewa` (
  `Unit_Sewa_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rusun_Id` int(11) NOT NULL,
  `Kode_Unit` varchar(15) NOT NULL,
  `Nama_Unit` varchar(250) DEFAULT NULL,
  `Lantai` smallint(6) DEFAULT NULL,
  `Tipe_Sewa_Id` varchar(11) DEFAULT NULL,
  `Tarif` int(11) NOT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Unit_Sewa_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_sewa`
--

INSERT INTO `unit_sewa` (`Unit_Sewa_Id`, `Rusun_Id`, `Kode_Unit`, `Nama_Unit`, `Lantai`, `Tipe_Sewa_Id`, `Tarif`, `Keterangan`) VALUES
(1, 2, '02-20001', 'Rusun Kelas 1A', 1, 'bln', 150000, 'Rumah Susun Kelas 1A Lantai 1'),
(2, 4, '03-20001', 'Rusun Kelas 3C', 1, 'thn', 100000, 'Rusun Kelas 3C Lantai 1'),
(3, 1, '01-20001', 'Rusun Kelas 4A', 5, 'hr', 35000, 'Rusun Kelas 4A Lantai 5'),
(4, 6, '05-20001', 'Rusunawa Tipe A', 1, 'bln', 25000, 'Rusunawa Panjatan Tipe A'),
(5, 6, '05-20002', 'Rusunawa  Panjatan Tipe B', 2, 'pkt', 350000, 'Rusunawa Panjatan Tipe B Biasa'),
(6, 6, '05-20003', 'Rusunawa Panjatan Premium', 5, 'bln', 150000, 'Rusunawa Panjatan Premiums');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, 'Super Administrator', 'admin@admin.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Miftahul Yaum', 'yaum@gmail.com', NULL, '$2y$10$28uXe8b6aVXtM14uPlJwNe9wO77/FbLCqnGU6RdeqjpkmhGL1yJ0W', NULL, '2019-12-03 12:05:21', NULL, 'Super Administrator', NULL),
(3, 'Test User', 'admin@test.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '2019-12-15 08:02:05', NULL, 'Super Administrator', NULL),
(4, 'Irna Setiyanningrum', 'irnasetiya123@gmail.com', NULL, '$2y$10$1JWLGkxCtQlErZ4J4FgdieqkOzA35aI6MSxaebatmdb5Nq/yIHMPi', NULL, '2019-12-15 08:14:48', '2020-08-16 06:23:51', 'Super Administrator', 'Super Administrator'),
(5, 'cde', 'cde@email.com', NULL, '$2y$10$U3fOTJ0ViWbEE72S4N8c..zpcugbM3nicpB0KCi16rQkIWZUiRgH6', NULL, '2019-12-15 17:02:28', NULL, 'Super Administrator', NULL),
(6, 'Customer Service', 'cs@rusunawakotamagelang.id', NULL, '$2y$10$jCWy4rgYv6pobD3XDtPdrOz0mf/eH21GfZyPZMkCTR32nUzr2ziVi', NULL, '2020-11-11 02:15:29', NULL, 'Super Administrator', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

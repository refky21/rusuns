-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Agu 2020 pada 14.20
-- Versi server: 10.1.41-MariaDB-cll-lve
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `centra78_rusunawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_name`
--

CREATE TABLE `access_name` (
  `access_id` int(11) NOT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(72, 'CashFlow Delete', 'CashFlow-Delete', 'Permisiion CashFlow', 'Super Administrator', '2020-02-06 08:00:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role`
--

CREATE TABLE `access_role` (
  `group_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role`
--

INSERT INTO `access_role` (`group_id`, `access_id`) VALUES
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
(1, 7),
(1, 6),
(1, 5),
(1, 4),
(1, 3),
(1, 2),
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
(4, 50),
(4, 49),
(4, 53),
(4, 33),
(4, 37),
(1, 1),
(1, 12),
(1, 11),
(2, 49),
(2, 50),
(1, 10),
(1, 9),
(4, 69),
(4, 70),
(4, 71),
(4, 72);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_group`
--

CREATE TABLE `access_role_group` (
  `group_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(250) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_group`
--

INSERT INTO `access_role_group` (`group_id`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Super Administrator', 'Role Group Untuk Admin', 'Inject', '2019-10-24 05:23:00', 'Super Administrator', '2020-02-05 20:04:09'),
(2, 'Admin Rusun', 'Role Untuk Admin Rusun', 'Super Administrator', '2019-12-02 23:22:56', 'Super Administrator', '2020-02-03 18:17:34'),
(3, 'admin tagihan', 'petugas penginput tagihan', 'Super Administrator', '2019-12-14 20:25:07', NULL, NULL),
(4, 'kasir', 'menerima pembayaran', 'Super Administrator', '2019-12-14 20:26:05', 'Super Administrator', '2020-07-22 21:41:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_users`
--

CREATE TABLE `access_role_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_users`
--

INSERT INTO `access_role_users` (`id`, `group_id`, `users_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(6, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `Bulan_Id` smallint(6) NOT NULL,
  `Nama_Bulan` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(10) DEFAULT NULL
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

CREATE TABLE `cash_flow` (
  `Cash_Flow_Id` bigint(20) NOT NULL,
  `Tgl_Trans` datetime DEFAULT NULL,
  `Item_Pembayaran_Id` smallint(6) DEFAULT NULL,
  `Jml_Masuk` int(11) DEFAULT NULL,
  `Jml_Keluar` int(11) DEFAULT NULL,
  `Jml_Subsidi` int(11) DEFAULT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(20, '2020-07-21 20:43:39', 4, 15000, NULL, NULL, 'Penerimaan Iuran Kebersihan', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_in`
--

CREATE TABLE `check_in` (
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
  `Mofied_Date` datetime DEFAULT NULL
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

CREATE TABLE `hubungan_keluarga` (
  `Hub_Keluarga_Id` smallint(6) NOT NULL,
  `Nama_Hub_Keluarga` varchar(250) DEFAULT NULL,
  `Urut` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `item_pembayaran` (
  `Item_Pembayaran_Id` int(11) NOT NULL,
  `Kode_Item` varchar(50) DEFAULT NULL,
  `Nama_Item` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(10) DEFAULT NULL,
  `Urut` int(11) DEFAULT NULL
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

CREATE TABLE `jns_stand_meter` (
  `Jns_Stand_Meter_Id` smallint(6) NOT NULL DEFAULT '0',
  `Nama_Stand_Meter` varchar(100) DEFAULT NULL
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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstr_option`
--

CREATE TABLE `mstr_option` (
  `Section` varchar(250) DEFAULT NULL,
  `Keys` varchar(250) DEFAULT NULL,
  `Data` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstr_option`
--

INSERT INTO `mstr_option` (`Section`, `Keys`, `Data`) VALUES
('Default Tanggal Pembayaran', 'DefTglByr', '16'),
('Default Denda Telat Bayar', 'DefDendBayar', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mstr_rusun`
--

CREATE TABLE `mstr_rusun` (
  `info_id` int(11) NOT NULL,
  `kode_rusun` varchar(255) NOT NULL,
  `nama_rusun` varchar(250) NOT NULL,
  `alamat_rusun` varchar(250) NOT NULL,
  `nama_kasubag_tu` varchar(200) NOT NULL,
  `nip_kasubag_tu` varchar(200) NOT NULL,
  `nama_kepala_dpu` varchar(200) NOT NULL,
  `nip_kepala_dpu` varchar(200) NOT NULL,
  `nama_kepala_upt` varchar(200) NOT NULL,
  `nip_kepala_upt` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mstr_rusun`
--

INSERT INTO `mstr_rusun` (`info_id`, `kode_rusun`, `nama_rusun`, `alamat_rusun`, `nama_kasubag_tu`, `nip_kasubag_tu`, `nama_kepala_dpu`, `nip_kepala_dpu`, `nama_kepala_upt`, `nip_kepala_upt`, `status`) VALUES
(1, '01', 'Rusunawa Magelang', 'Jl. Pegangsaan Timur No.32', 'Andi Nurhidayat', '103.201.366.20', 'Nur Rahmawati', '103.201.325.11', 'Adi Nurcahyo', '103.222.315.22', 0),
(2, '02', 'Rusunawa Jogjakarta', 'Jl. Wonosari', 'Adi Hidayar', '12344.04487', 'Onno W Purbo', '1124.1114.00', 'Untung Kasunan', '233145.010.111', 0),
(4, '03', 'Rusunawa Potrobangsan', 'Jl. Potrobangasan No.32', 'Wawan Kurniawa', '103.201.366.20', 'Onno W Purbo', '103.201.325.11', 'Adem Dan', '103.222.315.22', 0),
(5, '04', 'RUSUS WATES', 'Sanggrahan Magelang', 'Budiyono', '123', 'Handini', '456', 'Budi Prakosa', '789', 0),
(6, '05', 'Rusunawa Kota Panjatan', 'Panjatan, Kulon Progo', 'Abudul Rozak Fackrudin', '223.0012.012', 'Ahmad Arifin', '223.0013.013', 'Dimas Andrean', '223.0012.015', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `Pembayaran_Id` int(11) NOT NULL,
  `Check_In_Id` varchar(250) DEFAULT NULL,
  `Tagihan_Id` int(11) NOT NULL,
  `Tgl_Bayar` datetime DEFAULT NULL,
  `Keterangan` varchar(250) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, '20191130-0001', 23, '2020-07-21 00:00:00', 'Sewa Unit Bulanan', 'Super Administrator', '2020-07-21 20:43:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail`
--

CREATE TABLE `pembayaran_detail` (
  `Pembayaran_Detail_Id` bigint(20) NOT NULL,
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
  `PPJ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(46, 22, 7, NULL, NULL, NULL, NULL, NULL, 11500, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `Penyewa_Id` int(11) NOT NULL,
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
  `Is_Aktif` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`Penyewa_Id`, `No_Reg`, `Rusun_Id`, `Nama`, `Tempat_Lahir`, `Tgl_Lahir`, `Ktp_Nik`, `Ktp_Alamat`, `No_Hp`, `Jml_Penghuni`, `foto`, `Is_Aktif`) VALUES
(1, '191027-0001', 2, 'REFKY SATRIA BIMA', 'Metro', '1997-10-29', '1872022910970001', 'Jl. Godean Km.10', '089631449716', 2, 'avatar-1.png', 1),
(2, '191027-0002', 1, 'RITA PANJAITAN', 'Karang Asem', '1986-08-10', '187201488999587', 'Kemusuk', '089561254879', 3, 'avatar-17.png', 1),
(3, '191027-0003', 3, 'ABDUL SATRIA', 'Jakarta', '1988-06-27', '1872022910972314', 'Sleman, Gamping', '081235879541', 2, 'avatar-18.png', 1),
(5, '191215-0004', 6, 'abcde', 'magelang', '2019-12-01', '346790076533124', 'sdghjyulpo', '08587453234', 2, '20170223_103834.jpg', 1),
(6, '191222-0005', 6, 'coba deh', 'magelang', '2000-10-24', '212121212312', 'alamatnya', '0819212121', 3, 'Capture.JPG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa_keluaraga`
--

CREATE TABLE `penyewa_keluaraga` (
  `Penyewa_Keluarga_Id` int(11) NOT NULL,
  `Penyewa_Id` int(11) DEFAULT NULL,
  `Urut` smallint(6) DEFAULT NULL,
  `Hub_Keluarga_Id` smallint(6) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Tempat_Lahir` varchar(250) DEFAULT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `Ktp_Nik` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa_keluaraga`
--

INSERT INTO `penyewa_keluaraga` (`Penyewa_Keluarga_Id`, `Penyewa_Id`, `Urut`, `Hub_Keluarga_Id`, `Nama`, `Tempat_Lahir`, `Tgl_Lahir`, `Ktp_Nik`) VALUES
(1, 1, NULL, 1, 'Pevita Pearce', 'Jakarta', '1991-08-19', '1872022910972314'),
(2, 1, NULL, 3, 'Aliando Syarif', 'Jakarta', '2000-01-01', '1872022910970020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_rusun_user`
--

CREATE TABLE `role_rusun_user` (
  `User_Id` int(11) NOT NULL,
  `Rusun_Id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_rusun_user`
--

INSERT INTO `role_rusun_user` (`User_Id`, `Rusun_Id`) VALUES
(3, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stand_meter`
--

CREATE TABLE `stand_meter` (
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

CREATE TABLE `tagihan` (
  `Tagihan_Id` int(11) NOT NULL,
  `Check_In_Id` varchar(250) DEFAULT NULL,
  `Tgl_Tagihan` datetime DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Tahun` smallint(6) DEFAULT NULL,
  `Bulan` smallint(6) DEFAULT NULL,
  `Created_By` varchar(250) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `Modified_By` varchar(250) DEFAULT NULL,
  `Modified_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(24, '20200204-0001', '2020-07-21 00:41:49', 'Tagihan Sewa Bulanan - Agustus', 2020, 8, 'Super Administrator', '2020-07-21 00:41:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan_detail`
--

CREATE TABLE `tagihan_detail` (
  `Tagihan_Detail_Id` int(11) NOT NULL,
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
  `PPJ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(39, 24, 4, 2020, 8, NULL, NULL, NULL, 15000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(11) NOT NULL,
  `nama_tahun` varchar(100) NOT NULL
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

CREATE TABLE `tipe_sewa` (
  `Tipe_Sewa_Id` varchar(250) NOT NULL,
  `Nama_Tipe_Sewa` varchar(250) DEFAULT NULL,
  `Singkatan` varchar(100) DEFAULT NULL
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

CREATE TABLE `unit_sewa` (
  `Unit_Sewa_Id` int(11) NOT NULL,
  `Rusun_Id` int(11) NOT NULL,
  `Kode_Unit` varchar(15) NOT NULL,
  `Nama_Unit` varchar(250) DEFAULT NULL,
  `Lantai` smallint(6) DEFAULT NULL,
  `Tipe_Sewa_Id` varchar(11) DEFAULT NULL,
  `Tarif` int(11) NOT NULL,
  `Keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, 'Super Administrator', 'admin@admin.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Miftahul Yaum', 'yaum@gmail.com', NULL, '$2y$10$28uXe8b6aVXtM14uPlJwNe9wO77/FbLCqnGU6RdeqjpkmhGL1yJ0W', NULL, '2019-12-03 12:05:21', NULL, 'Super Administrator', NULL),
(3, 'Test User', 'admin@test.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '2019-12-15 08:02:05', NULL, 'Super Administrator', NULL),
(4, 'Irna Setiyanningrum', 'irnasetiya123@gmail.com', NULL, '$2y$10$6JCIQT4Aqsk0KU8CxCzJs.7ThxvugM2.mFyllBX5rKQWIJWAQozZu', NULL, '2019-12-15 08:14:48', NULL, 'Super Administrator', NULL),
(5, 'cde', 'cde@email.com', NULL, '$2y$10$c3JSMZI8gqpllUDs0PQHke8jAUYH4GhAwobM630dVpgZRI658m9rC', NULL, '2019-12-15 17:02:28', '2020-07-23 09:37:40', 'Super Administrator', 'Super Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_name`
--
ALTER TABLE `access_name`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `access_role_group`
--
ALTER TABLE `access_role_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `access_role_users`
--
ALTER TABLE `access_role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_role_users_access_role_group_id_group_fk` (`group_id`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`Bulan_Id`);

--
-- Indeks untuk tabel `cash_flow`
--
ALTER TABLE `cash_flow`
  ADD PRIMARY KEY (`Cash_Flow_Id`);

--
-- Indeks untuk tabel `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`Check_In_Id`);

--
-- Indeks untuk tabel `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  ADD PRIMARY KEY (`Hub_Keluarga_Id`);

--
-- Indeks untuk tabel `item_pembayaran`
--
ALTER TABLE `item_pembayaran`
  ADD PRIMARY KEY (`Item_Pembayaran_Id`),
  ADD UNIQUE KEY `Item_Pembayaran_Item_Pembayaran_Id_uindex` (`Item_Pembayaran_Id`);

--
-- Indeks untuk tabel `jns_stand_meter`
--
ALTER TABLE `jns_stand_meter`
  ADD PRIMARY KEY (`Jns_Stand_Meter_Id`),
  ADD UNIQUE KEY `"Jns_Stand_Meter"_"Jns_Stand_Meter_Id"_uindex` (`Jns_Stand_Meter_Id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mstr_rusun`
--
ALTER TABLE `mstr_rusun`
  ADD PRIMARY KEY (`info_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`Pembayaran_Id`);

--
-- Indeks untuk tabel `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD PRIMARY KEY (`Pembayaran_Detail_Id`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`Penyewa_Id`);

--
-- Indeks untuk tabel `penyewa_keluaraga`
--
ALTER TABLE `penyewa_keluaraga`
  ADD PRIMARY KEY (`Penyewa_Keluarga_Id`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`Tagihan_Id`);

--
-- Indeks untuk tabel `tagihan_detail`
--
ALTER TABLE `tagihan_detail`
  ADD PRIMARY KEY (`Tagihan_Detail_Id`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- Indeks untuk tabel `tipe_sewa`
--
ALTER TABLE `tipe_sewa`
  ADD PRIMARY KEY (`Tipe_Sewa_Id`);

--
-- Indeks untuk tabel `unit_sewa`
--
ALTER TABLE `unit_sewa`
  ADD PRIMARY KEY (`Unit_Sewa_Id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_name`
--
ALTER TABLE `access_name`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `access_role_group`
--
ALTER TABLE `access_role_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `access_role_users`
--
ALTER TABLE `access_role_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `cash_flow`
--
ALTER TABLE `cash_flow`
  MODIFY `Cash_Flow_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hubungan_keluarga`
--
ALTER TABLE `hubungan_keluarga`
  MODIFY `Hub_Keluarga_Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mstr_rusun`
--
ALTER TABLE `mstr_rusun`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `Pembayaran_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  MODIFY `Pembayaran_Detail_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `Penyewa_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penyewa_keluaraga`
--
ALTER TABLE `penyewa_keluaraga`
  MODIFY `Penyewa_Keluarga_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `Tagihan_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tagihan_detail`
--
ALTER TABLE `tagihan_detail`
  MODIFY `Tagihan_Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `unit_sewa`
--
ALTER TABLE `unit_sewa`
  MODIFY `Unit_Sewa_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

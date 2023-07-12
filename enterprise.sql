-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama`, `jumlah`, `harga`, `status`) VALUES
(1, 'Mori Prima', 50, 10000, 'Active'),
(2, 'Mori Primissima', 45, 15000, 'Active'),
(3, 'Katun', 40, 20000, 'Active'),
(4, 'Sutera', 30, 30000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_read` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`message_id`, `sender_id`, `receiver_id`, `message_content`, `timestamp`, `is_read`) VALUES
(1, 1, 2, 'halo Yan Pie Kabarmu?', '2023-05-20 14:59:38', 0),
(2, 2, 1, 'Apik a', '2023-05-20 14:59:48', 0),
(3, 1, 2, 'Pie Proges Enterprise?', '2023-05-20 14:59:58', 0),
(4, 2, 1, 'Mbuh Ah Mumet', '2023-05-20 15:00:38', 0),
(5, 1, 2, 'wkwkwk, jare koncoku minimal login', '2023-05-20 15:00:48', 0),
(6, 1, 3, 'Sopo Koe?', '2023-05-20 15:00:55', 0),
(7, 4, 1, 'Li', '2023-05-20 15:01:48', 0),
(8, 1, 4, 'Eh Riqq', '2023-05-20 15:01:55', 0),
(9, 5, 4, 'Ya Riqqi', '2023-05-20 15:02:55', 0),
(10, 5, 6, 'Ya Arya', '2023-05-20 15:03:55', 0),
(11, 1, 5, 'oi Feb!!!', '2023-05-20 15:04:55', 0),
(12, 4, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-02 03:44:15', 0),
(13, 4, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-02 03:47:53', 0),
(14, 4, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-02 03:50:35', 0),
(15, 4, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-02 03:54:39', 0),
(16, 1, 2, '<a href=\"/penggajian/slipGaji/2023-07-02 10:54:39/2\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 03:59:12', 0),
(17, 1, 3, '<a href=\"/penggajian/slipGaji/2023-07-02 10:54:39/3\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 03:59:12', 0),
(18, 1, 4, '<a href=\"/penggajian/slipGaji/2023-07-02 10:54:39/4\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 03:59:12', 0),
(19, 1, 5, '<a href=\"/penggajian/slipGaji/2023-07-02 10:54:39/5\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 03:59:12', 0),
(20, 1, 6, '<a href=\"/penggajian/slipGaji/2023-07-02 10:54:39/6\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 03:59:12', 0),
(21, 4, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:19', 0),
(22, 1, 3, '<a href=\"/penggajian/slipGaji/2023-07-02 12:06:19/3\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:46', 0),
(23, 1, 4, '<a href=\"/penggajian/slipGaji/2023-07-02 12:06:19/4\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:46', 0),
(24, 1, 5, '<a href=\"/penggajian/slipGaji/2023-07-02 12:06:19/5\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:46', 0),
(25, 1, 2, '<a href=\"/penggajian/slipGaji/2023-07-02 12:06:19/2\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:46', 0),
(26, 1, 6, '<a href=\"/penggajian/slipGaji/2023-07-02 12:06:19/6\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-02 05:06:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jahit`
--

CREATE TABLE `detail_jahit` (
  `no_penjahitan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_jahit`
--

INSERT INTO `detail_jahit` (`no_penjahitan`, `id_produk`, `ukuran`, `jumlah`, `biaya_produksi`) VALUES
(1, 3, 'XL', 10, 1500000),
(1, 4, 'L', 7, 1000000),
(2, 1, 'L', 7, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_pembelian` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`no_pembelian`, `id_bahan`, `harga`, `jumlah`, `total`) VALUES
(1, 3, 10000, 10, 100000),
(2, 3, 20000, 20, 400000),
(2, 4, 30000, 30, 900000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_produk`, `harga`, `jumlah`, `total`) VALUES
(1, 1, 50000, 12, 600000),
(1, 3, 50000, 8, 400000),
(2, 4, 60000, 20, 1200000),
(3, 3, 50000, 16, 800000),
(4, 2, 65000, 20, 1300000),
(5, 1, 50000, 8, 400000),
(5, 3, 50000, 12, 600000),
(6, 1, 50000, 8, 400000),
(6, 3, 50000, 12, 600000),
(7, 1, 50000, 12, 600000),
(7, 3, 50000, 8, 400000),
(8, 1, 50000, 5, 250000),
(8, 2, 65000, 2, 130000),
(8, 3, 50000, 5, 250000),
(9, 1, 50000, 1, 50000),
(9, 2, 65000, 10, 650000),
(9, 3, 50000, 1, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `no_urut` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `pencatat` int(11) NOT NULL,
  `penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(31, '2023-03-27-013405', 'App\\Database\\Migrations\\User', 'default', 'App', 1688269365, 1),
(32, '2023-03-27-013406', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1688269366, 1),
(33, '2023-03-27-013407', 'App\\Database\\Migrations\\Mitra', 'default', 'App', 1688269366, 1),
(34, '2023-03-27-023407', 'App\\Database\\Migrations\\Penjahit', 'default', 'App', 1688269366, 1),
(35, '2023-03-27-052009', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1688269366, 1),
(36, '2023-03-27-054144', 'App\\Database\\Migrations\\DetailPenjualan', 'default', 'App', 1688269367, 1),
(37, '2023-03-27-055714', 'App\\Database\\Migrations\\Bahan', 'default', 'App', 1688269367, 1),
(38, '2023-03-27-055913', 'App\\Database\\Migrations\\PembelianBahan', 'default', 'App', 1688269368, 1),
(39, '2023-03-27-062538', 'App\\Database\\Migrations\\Penjahitan', 'default', 'App', 1688269369, 1),
(40, '2023-03-27-062539', 'App\\Database\\Migrations\\DetailPembelian', 'default', 'App', 1688269369, 1),
(41, '2023-03-27-063012', 'App\\Database\\Migrations\\Finance', 'default', 'App', 1688269370, 1),
(42, '2023-03-27-063331', 'App\\Database\\Migrations\\Penggajian', 'default', 'App', 1688269370, 1),
(43, '2023-03-27-064444', 'App\\Database\\Migrations\\DetailJahit', 'default', 'App', 1688269370, 1),
(44, '2023-05-01-163020', 'App\\Database\\Migrations\\Presensi', 'default', 'App', 1688269371, 1),
(45, '2023-06-17-062538', 'App\\Database\\Migrations\\Chat', 'default', 'App', 1688269371, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama`, `alamat`, `status`) VALUES
(1, 'PT Agung Jaya', 'Jalan Jaya', 'Active'),
(2, 'PT Berkah', 'Jalan Berkah', 'Active'),
(3, 'PT Lancar', 'Jalan Lancar', 'Active'),
(4, 'PT Terbuka', 'Jalan Terbuka', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_pembelian` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl`, `total_bayar`, `id_supplier`, `id_user`) VALUES
(1, '2023-05-11 15:22:29', 100000, 3, 5),
(2, '2023-06-17 15:22:29', 1300000, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `no_penggajian` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `jam_kerja` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `terlambat` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `pencatat` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`no_penggajian`, `tgl`, `gaji_pokok`, `gaji`, `masuk`, `jam_kerja`, `id_user`, `terlambat`, `sakit`, `pencatat`, `status`) VALUES
(21, '2023-07-02 12:06:19', 4000000, 286296, 2, 7, 3, 1, 0, 4, 1),
(22, '2023-07-02 12:06:19', 4500000, 323333, 2, 7, 4, 1, 0, 4, 1),
(23, '2023-07-02 12:06:19', 4000000, 286296, 2, 7, 5, 1, 0, 4, 1),
(24, '2023-07-02 12:06:19', 3500000, 259259, 2, 8, 2, 0, 0, 4, 1),
(25, '2023-07-02 12:06:19', 3500000, 259259, 2, 8, 6, 0, 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjahit`
--

CREATE TABLE `penjahit` (
  `id_penjahit` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjahit`
--

INSERT INTO `penjahit` (`id_penjahit`, `nama`, `alamat`, `status`) VALUES
(1, 'Pak Wal', 'Perumahan', 'Active'),
(2, 'Bu Neng', 'Pelosok', 'Active'),
(3, 'Kang Bob', 'Gang Buntu', 'Active'),
(4, 'Mbak Yun', 'Desa', 'Active'),
(5, 'Pak Wal', 'Perumahan', 'Active'),
(6, 'Bu Neng', 'Pelosok', 'Active'),
(7, 'Kang Bob', 'Gang Buntu', 'Active'),
(8, 'Mbak Yun', 'Desa', 'Active'),
(9, 'Pak Wal', 'Perumahan', 'Active'),
(10, 'Bu Neng', 'Pelosok', 'Active'),
(11, 'Kang Bob', 'Gang Buntu', 'Active'),
(12, 'Mbak Yun', 'Desa', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `penjahitan`
--

CREATE TABLE `penjahitan` (
  `no_penjahitan` int(11) NOT NULL,
  `id_penjahit` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjahitan`
--

INSERT INTO `penjahitan` (`no_penjahitan`, `id_penjahit`, `total_bayar`, `tgl`, `id_bahan`, `id_user`) VALUES
(1, 1, 2500000, '2019-04-19 10:02:24', 3, 6),
(2, 2, 1000000, '2020-04-19 10:02:24', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl`, `total_bayar`, `id_user`) VALUES
(1, '2019-04-19 10:02:24', 1000000, 2),
(2, '2019-07-19 10:02:24', 1200000, 2),
(3, '2019-09-19 10:02:24', 800000, 2),
(4, '2020-04-19 10:02:24', 1300000, 2),
(5, '2020-09-19 10:02:24', 1000000, 2),
(6, '2021-04-19 10:02:24', 1000000, 2),
(7, '2022-04-19 10:02:24', 1000000, 2),
(8, '2023-04-19 10:02:24', 630000, 2),
(9, '2023-10-19 10:02:24', 750000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `gambar_masuk` varchar(150) NOT NULL,
  `gambar_keluar` varchar(150) NOT NULL,
  `info` varchar(50) DEFAULT NULL,
  `ket` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pegawai`, `tanggal_presensi`, `waktu_masuk`, `waktu_keluar`, `gambar_masuk`, `gambar_keluar`, `info`, `ket`, `status`) VALUES
(1, 2, '2023-07-01', '08:20:42', '13:25:43', 'default.jpg', '1688538343.jpg', 'pulang', '', 1),
(2, 3, '2023-07-01', '08:50:38', '13:25:43', 'default.jpg', '1688538343.jpg', 'pulang', '', 1),
(3, 4, '2023-07-01', '08:51:17', '16:03:39', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(4, 5, '2023-07-01', '08:51:45', '13:22:55', 'default.jpg', '1688538175.jpg', 'pulang', 'terlambat', 1),
(5, 6, '2023-07-01', '08:55:54', '16:15:37', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(6, 2, '2023-07-02', '08:25:28', '16:11:07', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(7, 3, '2023-07-02', '08:03:32', '16:38:02', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(8, 4, '2023-07-02', '08:39:30', '16:39:49', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(9, 5, '2023-07-02', '08:23:09', '16:37:31', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(10, 6, '2023-07-02', '08:45:21', '16:31:31', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(11, 2, '2023-07-03', '08:32:41', '16:13:41', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(12, 3, '2023-07-03', '08:28:37', '13:22:55', 'default.jpg', '1688538175.jpg', 'pulang', 'terlambat', 1),
(13, 4, '2023-07-03', '08:03:07', '13:25:43', 'default.jpg', '1688538343.jpg', 'pulang', '', 1),
(14, 5, '2023-07-03', '08:19:42', '16:32:13', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(15, 6, '2023-07-03', '08:38:53', '16:02:15', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(16, 4, '2023-07-04', '19:15:53', '00:00:00', '1688472953.jpg', '', 'sakit', 'sakit gigi', 1),
(17, 2, '2023-07-04', '19:16:11', '00:00:00', '1688472971.jpg', '', 'masuk', 'terlambat', 1),
(18, 4, '2023-07-05', '12:55:41', '13:22:55', '1688536541.jpg', '1688538175.jpg', 'pulang', 'terlambat', 1),
(19, 2, '2023-07-05', '13:24:41', '13:25:43', '1688538281.jpg', '1688538343.jpg', 'pulang', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `ukuran`, `biaya_produksi`, `biaya_jual`, `jumlah`, `status`) VALUES
(1, 'Daster Rayon', 'All Size', 25000, 50000, 100, 'Active'),
(2, 'Gamis Rayon', 'All Size', 40000, 65000, 100, 'Active'),
(3, 'Gamis Twil', 'All Size', 30000, 50000, 100, 'Active'),
(4, 'Midi Twil', 'All Size', 35000, 60000, 100, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`, `gaji`) VALUES
(1, 'ali', '$2y$10$EThiTIW/1Z3ao1GokMfy1uwhzy87skPAHwA/utDPqKcFT5F5dSpGG', 'bos', 10000000),
(2, 'ian', '$2y$10$4drTqnS5Zk9GID8IXC3uI.lSkJgkvVh1jFrc89HFHWNg90BMgZfZ2', 'penjualan', 3500000),
(3, 'anonim', '$2y$10$CNJFeibRcWB3rGa7zawXG.0hBjIquzFYamRaeir5SE9K5OeDeZOmO', 'finance', 4000000),
(4, 'riqqi', '$2y$10$3aI5otqPRcoZuRcCkgl2E.ZLOXd3ipF5l6QEmVKZ3Mmi5x8T4BjS.', 'hrd', 4500000),
(5, 'febi', '$2y$10$i8UEq/5lptqi1pvCQ4o9r.cc/Zx2p3sK/im1ZweOs3DLRuO8zL3h.', 'gudang', 4000000),
(6, 'arya', '$2y$10$L4rx2wVBcn4ha3dC4OoC.ugsnGOvN58fzTC7zHSAuksz81Rm/n1/m', 'produksi', 3500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_sender_id_foreign` (`sender_id`),
  ADD KEY `chat_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `detail_jahit`
--
ALTER TABLE `detail_jahit`
  ADD KEY `detail_jahit_no_penjahitan_foreign` (`no_penjahitan`),
  ADD KEY `detail_jahit_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `detail_pembelian_no_pembelian_foreign` (`no_pembelian`),
  ADD KEY `detail_pembelian_id_bahan_foreign` (`id_bahan`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `detail_penjualan_id_penjualan_foreign` (`id_penjualan`),
  ADD KEY `detail_penjualan_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `finance_pencatat_foreign` (`pencatat`),
  ADD KEY `finance_penerima_foreign` (`penerima`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `pembelian_id_user_foreign` (`id_user`),
  ADD KEY `pembelian_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`no_penggajian`),
  ADD KEY `penggajian_id_user_foreign` (`id_user`),
  ADD KEY `penggajian_pencatat_foreign` (`pencatat`);

--
-- Indexes for table `penjahit`
--
ALTER TABLE `penjahit`
  ADD PRIMARY KEY (`id_penjahit`);

--
-- Indexes for table `penjahitan`
--
ALTER TABLE `penjahitan`
  ADD PRIMARY KEY (`no_penjahitan`),
  ADD KEY `penjahitan_id_penjahit_foreign` (`id_penjahit`),
  ADD KEY `penjahitan_id_bahan_foreign` (`id_bahan`),
  ADD KEY `penjahitan_id_user_foreign` (`id_user`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `penjualan_id_user_foreign` (`id_user`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `no_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id_penjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjahitan`
--
ALTER TABLE `penjahitan`
  MODIFY `no_penjahitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `chat_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `detail_jahit`
--
ALTER TABLE `detail_jahit`
  ADD CONSTRAINT `detail_jahit_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_jahit_no_penjahitan_foreign` FOREIGN KEY (`no_penjahitan`) REFERENCES `penjahitan` (`no_penjahitan`);

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_id_bahan_foreign` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `detail_pembelian_no_pembelian_foreign` FOREIGN KEY (`no_pembelian`) REFERENCES `pembelian` (`no_pembelian`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_pencatat_foreign` FOREIGN KEY (`pencatat`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `finance_penerima_foreign` FOREIGN KEY (`penerima`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `mitra` (`id_mitra`),
  ADD CONSTRAINT `pembelian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `penggajian_pencatat_foreign` FOREIGN KEY (`pencatat`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penjahitan`
--
ALTER TABLE `penjahitan`
  ADD CONSTRAINT `penjahitan_id_bahan_foreign` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `penjahitan_id_penjahit_foreign` FOREIGN KEY (`id_penjahit`) REFERENCES `penjahit` (`id_penjahit`),
  ADD CONSTRAINT `penjahitan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 17.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprise2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama`, `jumlah`, `harga`, `status`) VALUES
(1, 'Mori Prima', 50, 10000, 'Active'),
(2, 'Mori Primissima', 45, 15000, 'Active'),
(3, 'Katun', 40, 20000, 'Active'),
(4, 'Sutera', 30, 30000, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_content` text DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`message_id`, `sender_id`, `receiver_id`, `message_content`, `timestamp`, `is_read`) VALUES
(1, 1, 2, 'hh', '2023-05-20 14:52:39', 0),
(2, 1, 2, 'hhgg', '2023-05-20 14:53:33', 0),
(3, 1, 2, 'hhggfgfg', '2023-05-20 14:53:43', 0),
(4, 1, 2, '12121', '2023-05-20 14:54:06', 0),
(5, 1, 2, '23232323', '2023-05-20 14:54:53', 0),
(6, 1, 2, 'aku', '2023-05-20 14:55:39', 0),
(7, 1, 2, 'dia', '2023-05-20 14:55:56', 0),
(8, 1, 2, 'aku dia \r\nmereka', '2023-05-20 14:59:38', 0),
(9, 1, 2, 'asasasasas', '2023-05-20 15:04:10', 0),
(11, 1, 2, '', '2023-05-20 15:07:00', 0),
(12, 1, 2, '', '2023-05-20 15:07:22', 0),
(13, 1, 2, '  ', '2023-05-20 15:08:04', 0),
(14, 1, 2, '    ', '2023-05-20 15:09:41', 0),
(15, 1, 2, 'dfdfd', '2023-05-20 15:09:49', 0),
(16, 1, 2, ' fh fh ', '2023-05-20 15:10:03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jahit`
--

CREATE TABLE `detail_jahit` (
  `no_penjahitan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `detail_jahit`
--

INSERT INTO `detail_jahit` (`no_penjahitan`, `id_produk`, `ukuran`, `jumlah`, `biaya_produksi`) VALUES
(1, 2, 'XL', 10, 800000),
(2, 1, 'L', 20, 500000),
(2, 3, 'XL', 15, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_pembelian` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`no_pembelian`, `id_bahan`, `harga`, `jumlah`, `total`) VALUES
(1, 4, 50000, 10, 500000),
(2, 1, 40000, 5, 800000),
(2, 2, 35000, 4, 140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
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
-- Struktur dari tabel `finance`
--

CREATE TABLE `finance` (
  `no_urut` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `pencatat` int(11) NOT NULL,
  `penerima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(14, '2023-03-27-013405', 'App\\Database\\Migrations\\User', 'default', 'App', 1684585233, 1),
(15, '2023-03-27-013406', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1684585233, 1),
(16, '2023-03-27-013407', 'App\\Database\\Migrations\\Mitra', 'default', 'App', 1684585233, 1),
(17, '2023-03-27-023407', 'App\\Database\\Migrations\\Penjahit', 'default', 'App', 1684585233, 1),
(18, '2023-03-27-052009', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1684585233, 1),
(19, '2023-03-27-054144', 'App\\Database\\Migrations\\DetailPenjualan', 'default', 'App', 1684585233, 1),
(20, '2023-03-27-055714', 'App\\Database\\Migrations\\Bahan', 'default', 'App', 1684585233, 1),
(21, '2023-03-27-055913', 'App\\Database\\Migrations\\PembelianBahan', 'default', 'App', 1684585233, 1),
(22, '2023-03-27-062538', 'App\\Database\\Migrations\\Penjahitan', 'default', 'App', 1684585233, 1),
(23, '2023-03-27-062539', 'App\\Database\\Migrations\\DetailPembelian', 'default', 'App', 1684585233, 1),
(24, '2023-03-27-063012', 'App\\Database\\Migrations\\Finance', 'default', 'App', 1684585233, 1),
(25, '2023-03-27-063331', 'App\\Database\\Migrations\\Penggajian', 'default', 'App', 1684585233, 1),
(26, '2023-03-27-064444', 'App\\Database\\Migrations\\DetailJahit', 'default', 'App', 1684585233, 1),
(27, '2023-05-01-163020', 'App\\Database\\Migrations\\Presensi', 'default', 'App', 1684585233, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama`, `alamat`, `status`) VALUES
(1, 'PT Agung Jaya', 'Jalan Jaya', 'Active'),
(2, 'PT Berkah', 'Jalan Berkah', 'Active'),
(3, 'PT Lancar', 'Jalan Lancar', 'Active'),
(4, 'PT Terbuka', 'Jalan Terbuka', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_pembelian` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl`, `total_bayar`, `id_supplier`, `id_user`) VALUES
(1, '2023-05-25 02:18:23', 800000, 2, 5),
(2, '2023-05-25 02:18:23', 1000000, 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `no_penggajian` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `gaji` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pencatat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjahit`
--

CREATE TABLE `penjahit` (
  `id_penjahit` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjahit`
--

INSERT INTO `penjahit` (`id_penjahit`, `nama`, `alamat`, `status`) VALUES
(5, 'Pak Wal', 'Perumahan', 'Active'),
(6, 'Bu Neng', 'Pelosok', 'Active'),
(7, 'Kang Bob', 'Gang Buntu', 'Active'),
(8, 'Mbak Yun', 'Desa', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjahitan`
--

CREATE TABLE `penjahitan` (
  `no_penjahitan` int(11) NOT NULL,
  `id_penjahit` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjahitan`
--

INSERT INTO `penjahitan` (`no_penjahitan`, `id_penjahit`, `total_bayar`, `tgl`, `id_bahan`, `id_user`) VALUES
(1, 6, 500000, '2023-05-25 02:17:25', 1, 6),
(2, 7, 1000000, '2023-05-25 02:17:25', 4, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjualan`
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
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_keluar` time NOT NULL,
  `gambar_masuk` varchar(150) NOT NULL,
  `gambar_keluar` varchar(150) NOT NULL,
  `info` varchar(50) NOT NULL,
  `ket` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pegawai`, `tanggal_presensi`, `waktu_masuk`, `waktu_keluar`, `gambar_masuk`, `gambar_keluar`, `info`, `ket`, `status`) VALUES
(1, 4, '2019-08-07', '11:06:03', '00:11:04', 'default.jpg', 'default.jpg', 'alpa', '-', 1),
(2, 5, '1995-02-06', '23:59:13', '18:01:29', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(3, 6, '1993-09-20', '05:16:10', '21:29:53', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(4, 2, '1982-08-30', '19:26:23', '19:25:44', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(5, 6, '2020-01-24', '16:05:33', '22:19:06', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(6, 5, '2023-03-16', '08:41:10', '02:44:41', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(7, 1, '1986-06-30', '05:10:30', '15:05:11', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(8, 1, '1975-12-03', '06:38:03', '23:20:01', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(9, 5, '1999-03-10', '08:31:03', '11:07:20', 'default.jpg', 'default.jpg', 'masuk', '-', 0),
(10, 4, '1985-01-08', '23:48:56', '13:58:24', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(11, 6, '1979-08-30', '04:47:54', '23:23:11', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(12, 1, '2013-08-31', '14:30:35', '11:03:00', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(13, 3, '2009-10-03', '22:24:58', '04:43:18', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(14, 6, '1979-07-27', '03:56:38', '15:53:26', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(15, 2, '1976-02-10', '10:46:39', '18:12:50', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(16, 2, '2006-12-17', '09:14:46', '02:53:16', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(17, 5, '1982-06-02', '14:25:34', '01:39:13', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(18, 5, '1985-09-22', '07:57:40', '00:32:03', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(19, 3, '2016-07-22', '03:24:32', '12:12:19', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(20, 6, '1989-09-07', '12:30:53', '05:28:47', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(21, 2, '2006-09-23', '01:54:42', '06:59:37', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(22, 6, '2020-11-18', '10:35:45', '13:31:11', 'default.jpg', 'default.jpg', 'masuk', '-', 0),
(23, 6, '2000-02-10', '14:33:18', '15:46:14', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(24, 4, '1999-11-07', '17:25:08', '01:50:01', 'default.jpg', 'default.jpg', 'alpa', '-', 1),
(25, 4, '1973-07-08', '21:57:07', '00:57:53', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(26, 4, '1997-10-24', '11:08:07', '09:47:04', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(27, 1, '1990-11-12', '06:01:10', '03:00:04', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(28, 6, '2011-10-19', '12:03:05', '09:27:14', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(29, 6, '1987-08-30', '06:48:42', '21:50:25', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(30, 6, '1973-05-29', '13:26:31', '03:31:57', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(31, 3, '2004-05-02', '09:07:04', '03:54:33', 'default.jpg', 'default.jpg', 'alpa', '-', 0),
(32, 2, '2007-11-11', '16:38:23', '00:47:05', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(33, 6, '2005-04-25', '09:24:19', '15:01:21', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(34, 2, '2001-04-27', '02:29:52', '06:37:26', 'default.jpg', 'default.jpg', 'pulang', '-', 1),
(35, 6, '1983-12-27', '23:48:35', '15:58:24', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(36, 4, '1986-03-01', '00:33:00', '00:24:59', 'default.jpg', 'default.jpg', 'masuk', '-', 0),
(37, 6, '1982-03-09', '10:22:51', '19:59:12', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(38, 3, '2000-10-28', '13:45:35', '08:35:08', 'default.jpg', 'default.jpg', 'izin', '-', 1),
(39, 6, '2021-05-31', '03:54:46', '02:45:55', 'default.jpg', 'default.jpg', 'alpa', '-', 0),
(40, 1, '1988-12-10', '12:08:43', '02:16:27', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(41, 5, '1982-08-15', '01:37:13', '12:10:35', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(42, 2, '2022-05-30', '16:51:27', '04:59:00', 'default.jpg', 'default.jpg', 'izin', '-', 0),
(43, 2, '2017-02-22', '01:54:16', '06:17:38', 'default.jpg', 'default.jpg', 'sakit', '-', 0),
(44, 6, '2006-10-13', '05:24:49', '12:36:44', 'default.jpg', 'default.jpg', 'sakit', '-', 1),
(45, 4, '2020-07-05', '03:41:41', '17:18:40', 'default.jpg', 'default.jpg', 'alpa', '-', 1),
(46, 4, '1976-09-25', '00:59:05', '19:42:43', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(47, 1, '2020-05-01', '13:29:42', '08:01:01', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(48, 3, '1999-10-11', '23:43:08', '18:52:41', 'default.jpg', 'default.jpg', 'masuk', '-', 1),
(49, 5, '1980-02-29', '13:15:31', '15:29:55', 'default.jpg', 'default.jpg', 'pulang', '-', 0),
(50, 3, '1984-09-29', '03:51:55', '10:08:09', 'default.jpg', 'default.jpg', 'alpa', '-', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ukuran` char(5) NOT NULL,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `ukuran`, `biaya_produksi`, `biaya_jual`, `jumlah`, `status`) VALUES
(1, 'Daster Rayon', 'XL', 25000, 50000, 100, 'Active'),
(2, 'Gamis Rayon', 'XXL', 40000, 65000, 100, 'Active'),
(3, 'Gamis Twil', 'L', 30000, 50000, 100, 'Active'),
(4, 'Midi Twil', 'LL', 35000, 60000, 100, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`, `gaji`) VALUES
(1, 'ali', '$2y$10$EycDsYkyicIb9qaOb/PjGOSSc5T5cTClT/BTYJHo.woOa82hxtKCi', 'bos', 10000000),
(2, 'ian', '$2y$10$zW5pukF6j.ffhf5/yL5B/.z85qlkXCgzj14K67qyc267claIca0ue', 'penjualan', 3500000),
(3, 'anonim', '$2y$10$o/EHZTiRmTCmMdCFCsoW5uLufA7ADryhuyrfvUWx9p7Jvu4b/KSV2', 'finance', 4000000),
(4, 'riqqi', '$2y$10$D16KXm1zsLAg4S8ecg3lj.Gkz2VhBHQvfMav1nvPgSbqZquHz6vMu', 'hrd', 4500000),
(5, 'febi', '$2y$10$S6ZHptsMk1tHzZOfrIB14.CMhrBZJQIZbeJLoXkxEwNPOouofzGIC', 'gudang', 4000000),
(6, 'arya', '$2y$10$LbuM/ESa6ZlS2i4Cs5lA7OgzzsqLNx83nbpBH0m.mJC.SX/6lsLnq', 'produksi', 3500000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_bulanan_2019`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_bulanan_2019` (
`id_penjualan` int(11)
,`bulan` varchar(9)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_bulanan_2020`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_bulanan_2020` (
`id_penjualan` int(11)
,`bulan` varchar(9)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_bulanan_2021`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_bulanan_2021` (
`id_penjualan` int(11)
,`bulan` varchar(9)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_bulanan_2022`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_bulanan_2022` (
`id_penjualan` int(11)
,`bulan` varchar(9)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_bulanan_2023`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_bulanan_2023` (
`id_penjualan` int(11)
,`bulan` varchar(9)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_penjualan_tahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_penjualan_tahunan` (
`id_penjualan` int(11)
,`tahun` int(4)
,`total_bayar` int(11)
,`id_produk` int(11)
,`jumlah` int(11)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produksi_total_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produksi_total_produk` (
`nama` varchar(30)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_bulanan_2019`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_bulanan_2019` (
`bulan` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_bulanan_2020`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_bulanan_2020` (
`bulan` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_bulanan_2021`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_bulanan_2021` (
`bulan` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_bulanan_2022`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_bulanan_2022` (
`bulan` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_bulanan_2023`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_bulanan_2023` (
`bulan` varchar(9)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jumlah_produk_penjualan_tahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jumlah_produk_penjualan_tahunan` (
`tahun` int(4)
,`jumlah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_bulanan_2019`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_bulanan_2019` (
`bulan` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_bulanan_2020`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_bulanan_2020` (
`bulan` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_bulanan_2021`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_bulanan_2021` (
`bulan` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_bulanan_2022`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_bulanan_2022` (
`bulan` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_bulanan_2023`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_bulanan_2023` (
`bulan` varchar(9)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pendapatan_penjualan_tahunan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pendapatan_penjualan_tahunan` (
`tahun` int(4)
,`total` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_bulanan_2019`
--
DROP TABLE IF EXISTS `view_data_penjualan_bulanan_2019`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_bulanan_2019`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, monthname(`p`.`tgl`) AS `bulan`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2019 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_bulanan_2020`
--
DROP TABLE IF EXISTS `view_data_penjualan_bulanan_2020`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_bulanan_2020`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, monthname(`p`.`tgl`) AS `bulan`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2020 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_bulanan_2021`
--
DROP TABLE IF EXISTS `view_data_penjualan_bulanan_2021`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_bulanan_2021`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, monthname(`p`.`tgl`) AS `bulan`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2021 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_bulanan_2022`
--
DROP TABLE IF EXISTS `view_data_penjualan_bulanan_2022`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_bulanan_2022`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, monthname(`p`.`tgl`) AS `bulan`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2022 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_bulanan_2023`
--
DROP TABLE IF EXISTS `view_data_penjualan_bulanan_2023`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_bulanan_2023`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, monthname(`p`.`tgl`) AS `bulan`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2023 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_penjualan_tahunan`
--
DROP TABLE IF EXISTS `view_data_penjualan_tahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan_tahunan`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, year(`p`.`tgl`) AS `tahun`, `p`.`total_bayar` AS `total_bayar`, `pr`.`id_produk` AS `id_produk`, `dp`.`jumlah` AS `jumlah`, `dp`.`total` AS `total` FROM ((`penjualan` `p` join `detail_penjualan` `dp`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produksi_total_produk`
--
DROP TABLE IF EXISTS `view_jumlah_produksi_total_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produksi_total_produk`  AS SELECT `p`.`nama` AS `nama`, sum(`dj`.`jumlah`) AS `jumlah` FROM (`produk` `p` join `detail_jahit` `dj`) WHERE `p`.`id_produk` = `dj`.`id_produk` GROUP BY `p`.`id_produk` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_bulanan_2019`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_bulanan_2019`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_bulanan_2019`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2019 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_bulanan_2020`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_bulanan_2020`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_bulanan_2020`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2020 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_bulanan_2021`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_bulanan_2021`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_bulanan_2021`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2021 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_bulanan_2022`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_bulanan_2022`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_bulanan_2022`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2022 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_bulanan_2023`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_bulanan_2023`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_bulanan_2023`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` AND year(`p`.`tgl`) = 2023 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jumlah_produk_penjualan_tahunan`
--
DROP TABLE IF EXISTS `view_jumlah_produk_penjualan_tahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_produk_penjualan_tahunan`  AS SELECT DISTINCT year(`p`.`tgl`) AS `tahun`, sum(`dp`.`jumlah`) AS `jumlah` FROM ((`detail_penjualan` `dp` join `penjualan` `p`) join `produk` `pr`) WHERE `p`.`id_penjualan` = `dp`.`id_penjualan` AND `pr`.`id_produk` = `dp`.`id_produk` GROUP BY year(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_bulanan_2019`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_bulanan_2019`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_bulanan_2019`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` WHERE year(`p`.`tgl`) = 2019 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_bulanan_2020`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_bulanan_2020`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_bulanan_2020`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` WHERE year(`p`.`tgl`) = 2020 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_bulanan_2021`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_bulanan_2021`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_bulanan_2021`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` WHERE year(`p`.`tgl`) = 2021 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_bulanan_2022`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_bulanan_2022`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_bulanan_2022`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` WHERE year(`p`.`tgl`) = 2022 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_bulanan_2023`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_bulanan_2023`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_bulanan_2023`  AS SELECT monthname(`p`.`tgl`) AS `bulan`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` WHERE year(`p`.`tgl`) = 2023 GROUP BY month(`p`.`tgl`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pendapatan_penjualan_tahunan`
--
DROP TABLE IF EXISTS `view_pendapatan_penjualan_tahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pendapatan_penjualan_tahunan`  AS SELECT year(`p`.`tgl`) AS `tahun`, sum(`p`.`total_bayar`) AS `total` FROM `penjualan` AS `p` GROUP BY year(`p`.`tgl`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indeks untuk tabel `detail_jahit`
--
ALTER TABLE `detail_jahit`
  ADD KEY `detail_jahit_no_penjahitan_foreign` (`no_penjahitan`),
  ADD KEY `detail_jahit_id_produk_foreign` (`id_produk`);

--
-- Indeks untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `detail_pembelian_no_pembelian_foreign` (`no_pembelian`),
  ADD KEY `detail_pembelian_id_bahan_foreign` (`id_bahan`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `detail_penjualan_id_penjualan_foreign` (`id_penjualan`),
  ADD KEY `detail_penjualan_id_produk_foreign` (`id_produk`);

--
-- Indeks untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `finance_pencatat_foreign` (`pencatat`),
  ADD KEY `finance_penerima_foreign` (`penerima`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `pembelian_id_user_foreign` (`id_user`),
  ADD KEY `pembelian_id_supplier_foreign` (`id_supplier`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`no_penggajian`),
  ADD KEY `penggajian_id_user_foreign` (`id_user`),
  ADD KEY `penggajian_pencatat_foreign` (`pencatat`);

--
-- Indeks untuk tabel `penjahit`
--
ALTER TABLE `penjahit`
  ADD PRIMARY KEY (`id_penjahit`);

--
-- Indeks untuk tabel `penjahitan`
--
ALTER TABLE `penjahitan`
  ADD PRIMARY KEY (`no_penjahitan`),
  ADD KEY `penjahitan_id_penjahit_foreign` (`id_penjahit`),
  ADD KEY `penjahitan_id_bahan_foreign` (`id_bahan`),
  ADD KEY `penjahitan_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `penjualan_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `finance`
--
ALTER TABLE `finance`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `no_penggajian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id_penjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penjahitan`
--
ALTER TABLE `penjahitan`
  MODIFY `no_penjahitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `detail_jahit`
--
ALTER TABLE `detail_jahit`
  ADD CONSTRAINT `detail_jahit_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_jahit_no_penjahitan_foreign` FOREIGN KEY (`no_penjahitan`) REFERENCES `penjahitan` (`no_penjahitan`);

--
-- Ketidakleluasaan untuk tabel `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_id_bahan_foreign` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `detail_pembelian_no_pembelian_foreign` FOREIGN KEY (`no_pembelian`) REFERENCES `pembelian` (`no_pembelian`);

--
-- Ketidakleluasaan untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_pencatat_foreign` FOREIGN KEY (`pencatat`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `finance_penerima_foreign` FOREIGN KEY (`penerima`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `mitra` (`id_mitra`),
  ADD CONSTRAINT `pembelian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `penggajian_pencatat_foreign` FOREIGN KEY (`pencatat`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `penjahitan`
--
ALTER TABLE `penjahitan`
  ADD CONSTRAINT `penjahitan_id_bahan_foreign` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `penjahitan_id_penjahit_foreign` FOREIGN KEY (`id_penjahit`) REFERENCES `penjahit` (`id_penjahit`),
  ADD CONSTRAINT `penjahitan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

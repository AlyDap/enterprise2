-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2023 pada 02.58
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
  `panjang_kain` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama`, `jumlah`, `harga`, `panjang_kain`, `status`) VALUES
(1, 'Mori Prima', 50, 75000, '1.5 x 15 meter', 'Active'),
(2, 'Mori Primissima', 45, 90000, '1.5 x 15 meter', 'Active'),
(3, 'Katun', 40, 120000, '1.5 x 15 meter', 'Active'),
(4, 'Rayon', 30, 80000, '1.5 x 15 meter', 'Inactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `is_read` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `chat`
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
(12, 1, 6, 'hi ', '2023-07-10 09:12:37', 0),
(13, 1, 6, 'oi', '2023-07-10 09:12:49', 0),
(14, 1, 5, 'aman feb?', '2023-07-11 13:49:51', 0),
(15, 1, 5, 'pre Feb\r\n', '2023-07-11 13:55:32', 0),
(16, 1, 5, 'sudhoashdosua', '2023-07-11 13:58:00', 0),
(17, 7, 1, '<a href=\"/penggajian/approveBos/Juli\" >Laporan Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:14', 0),
(18, 1, 2, '<a href=\"/penggajian/slipGaji/2023-07-11 21:01:14/2\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:55', 0),
(19, 1, 3, '<a href=\"/penggajian/slipGaji/2023-07-11 21:01:14/3\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:55', 0),
(20, 1, 4, '<a href=\"/penggajian/slipGaji/2023-07-11 21:01:14/4\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:55', 0),
(21, 1, 5, '<a href=\"/penggajian/slipGaji/2023-07-11 21:01:14/5\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:55', 0),
(22, 1, 6, '<a href=\"/penggajian/slipGaji/2023-07-11 21:01:14/6\" >Slip Gaji Bulan Juli 2023</a>', '2023-07-11 14:01:55', 0),
(23, 1, 7, 'aaaa', '2023-07-11 14:13:27', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jahit`
--

CREATE TABLE `detail_jahit` (
  `no_penjahitan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` char(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_bahan` int(11) NOT NULL,
  `biaya_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `detail_jahit`
--

INSERT INTO `detail_jahit` (`no_penjahitan`, `id_produk`, `ukuran`, `jumlah`, `jumlah_bahan`, `biaya_produksi`) VALUES
(1, 3, 'All Size', 10, 2, 400000),
(1, 4, 'All Size', 6, 1, 180000),
(2, 1, 'All Size', 7, 1, 140000),
(3, 1, 'All Size', 14, 2, 280000),
(4, 2, 'All Size', 15, 3, 750000),
(5, 3, 'All Size', 25, 5, 1000000),
(6, 4, 'All Size', 6, 1, 180000),
(7, 2, 'All Size', 5, 1, 250000);

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
(1, 1, 75000, 10, 750000),
(2, 3, 120000, 20, 2400000),
(2, 4, 80000, 30, 2400000);

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
(1, 3, 90000, 8, 720000),
(2, 4, 70000, 20, 1400000),
(3, 3, 90000, 16, 1440000),
(4, 2, 120000, 20, 2400000),
(5, 1, 50000, 5, 250000),
(5, 2, 120000, 15, 1800000),
(6, 1, 50000, 8, 400000),
(6, 3, 90000, 12, 1080000),
(7, 1, 50000, 12, 600000),
(7, 4, 70000, 8, 560000),
(8, 1, 50000, 5, 250000),
(8, 2, 120000, 2, 240000),
(8, 3, 90000, 5, 450000),
(9, 2, 120000, 1, 120000),
(9, 3, 90000, 10, 900000),
(9, 4, 70000, 1, 70000);

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
            UPDATE produk
            SET jumlah = jumlah - NEW.jumlah
            WHERE id_produk = NEW.id_produk;
        END
$$
DELIMITER ;

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
(202, '2023-03-27-013405', 'App\\Database\\Migrations\\User', 'default', 'App', 1688980218, 1),
(203, '2023-03-27-013406', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1688980218, 1),
(204, '2023-03-27-013407', 'App\\Database\\Migrations\\Mitra', 'default', 'App', 1688980218, 1),
(205, '2023-03-27-023407', 'App\\Database\\Migrations\\Penjahit', 'default', 'App', 1688980218, 1),
(206, '2023-03-27-052009', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1688980218, 1),
(207, '2023-03-27-054144', 'App\\Database\\Migrations\\DetailPenjualan', 'default', 'App', 1688980218, 1),
(208, '2023-03-27-055714', 'App\\Database\\Migrations\\Bahan', 'default', 'App', 1688980218, 1),
(209, '2023-03-27-055913', 'App\\Database\\Migrations\\PembelianBahan', 'default', 'App', 1688980218, 1),
(210, '2023-03-27-062538', 'App\\Database\\Migrations\\Penjahitan', 'default', 'App', 1688980218, 1),
(211, '2023-03-27-062539', 'App\\Database\\Migrations\\DetailPembelian', 'default', 'App', 1688980218, 1),
(212, '2023-03-27-063012', 'App\\Database\\Migrations\\Finance', 'default', 'App', 1688980218, 1),
(213, '2023-03-27-063331', 'App\\Database\\Migrations\\Penggajian', 'default', 'App', 1688980218, 1),
(214, '2023-03-27-064444', 'App\\Database\\Migrations\\DetailJahit', 'default', 'App', 1688980218, 1),
(215, '2023-05-01-163020', 'App\\Database\\Migrations\\Presensi', 'default', 'App', 1688980218, 1),
(216, '2023-06-17-062538', 'App\\Database\\Migrations\\Chat', 'default', 'App', 1688980219, 1),
(217, '2023-07-05-023154', 'App\\Database\\Migrations\\Trigger', 'default', 'App', 1688980219, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama`, `alamat`, `email`, `no_hp`, `status`) VALUES
(1, 'PT Agung Jaya', 'Jalan Jaya', 'agungjaya@gmail.com', '0123123', 'Active'),
(2, 'PT Berkah', 'Jalan Berkah', 'berkah@gmail.com', '0248248', 'Active'),
(3, 'PT Lancar', 'Jalan Lancar', 'lancar@gmail.com', '0369369', 'Active'),
(4, 'PT Terbuka', 'Jalan Terbuka', 'terbuka@gmail.com', '019283', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_pembelian` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl`, `total_bayar`, `id_supplier`, `id_user`) VALUES
(1, '2023-07-15 11:22:29', 750000, 3, 5),
(2, '2023-07-10 15:22:29', 4800000, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`no_penggajian`, `tgl`, `gaji_pokok`, `gaji`, `masuk`, `jam_kerja`, `id_user`, `terlambat`, `sakit`, `pencatat`, `status`) VALUES
(1, '2023-07-11 21:01:14', 3500000, 1256296, 10, 44, 2, 4, 1, 7, 1),
(2, '2023-07-11 21:01:14', 4000000, 1451481, 10, 29, 3, 3, 2, 7, 1),
(3, '2023-07-11 21:01:14', 4500000, 1626667, 10, 60, 4, 4, 0, 7, 1),
(4, '2023-07-11 21:01:14', 4000000, 1441481, 10, 60, 5, 4, 0, 7, 1),
(5, '2023-07-11 21:01:14', 3500000, 1276296, 10, 46, 6, 2, 1, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjahit`
--

CREATE TABLE `penjahit` (
  `id_penjahit` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjahit`
--

INSERT INTO `penjahit` (`id_penjahit`, `nama`, `alamat`, `no_hp`, `status`) VALUES
(1, 'Pak Wal', 'Perumahan', '0987654321', 'Active'),
(2, 'Bu Neng', 'Pelosok', '088664422', 'Active'),
(3, 'Kang Bob', 'Gang Buntu', '097531', 'Active'),
(4, 'Mbak Yun', 'Desa', '01234567', 'Inactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjahitan`
--

CREATE TABLE `penjahitan` (
  `no_penjahitan` int(11) NOT NULL,
  `id_penjahit` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `id_bahan` int(11) NOT NULL,
  `total_bahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjahitan`
--

INSERT INTO `penjahitan` (`no_penjahitan`, `id_penjahit`, `total_bayar`, `tgl`, `id_bahan`, `total_bahan`, `id_user`) VALUES
(1, 1, 580000, '2023-06-10 07:02:24', 3, 3, 6),
(2, 2, 140000, '2023-07-05 16:31:10', 1, 1, 6),
(3, 3, 280000, '2023-07-10 12:15:08', 2, 2, 6),
(4, 1, 750000, '2023-07-10 17:15:19', 4, 3, 6),
(5, 4, 1000000, '2022-07-10 17:16:07', 1, 5, 6),
(6, 3, 180000, '2021-07-10 17:16:15', 3, 1, 6),
(7, 2, 250000, '2023-07-10 21:35:57', 2, 1, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl`, `total_bayar`, `id_user`) VALUES
(1, '2019-04-19 10:02:24', 1320000, 2),
(2, '2019-07-19 10:02:24', 1400000, 2),
(3, '2019-09-19 10:02:24', 1440000, 2),
(4, '2020-04-19 10:02:24', 2400000, 2),
(5, '2020-09-19 10:02:24', 2050000, 2),
(6, '2021-04-19 10:02:24', 1480000, 2),
(7, '2022-04-19 10:02:24', 1160000, 2),
(8, '2023-07-10 09:02:24', 940000, 2),
(9, '2023-07-10 10:02:24', 1090000, 2);

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
  `info` varchar(50) DEFAULT NULL,
  `ket` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_pegawai`, `tanggal_presensi`, `waktu_masuk`, `waktu_keluar`, `gambar_masuk`, `gambar_keluar`, `info`, `ket`, `status`) VALUES
(1, 2, '2023-07-01', '08:57:00', '16:29:33', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(2, 3, '2023-07-01', '08:57:47', '00:00:00', 'default.jpg', '', 'sakit', 'maaf lagi sakit', 1),
(3, 4, '2023-07-01', '08:32:14', '16:56:31', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(4, 5, '2023-07-01', '08:33:17', '16:04:27', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(5, 6, '2023-07-01', '08:02:48', '16:26:41', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(6, 2, '2023-07-02', '08:20:44', '16:57:19', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(7, 3, '2023-07-02', '08:22:44', '16:12:16', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(8, 4, '2023-07-02', '08:27:23', '16:17:44', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(9, 5, '2023-07-02', '08:25:49', '16:25:48', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(10, 6, '2023-07-02', '08:41:37', '00:00:00', 'default.jpg', '', 'sakit', 'maaf lagi sakit', 1),
(11, 2, '2023-07-03', '08:09:51', '16:31:09', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(12, 3, '2023-07-03', '08:19:04', '16:37:09', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(13, 4, '2023-07-03', '08:45:42', '16:11:26', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(14, 5, '2023-07-03', '08:36:09', '16:20:22', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(15, 6, '2023-07-03', '08:50:45', '16:48:53', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(16, 2, '2023-07-04', '08:55:06', '16:08:40', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(17, 3, '2023-07-04', '08:32:02', '16:39:44', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(18, 4, '2023-07-04', '08:34:49', '16:32:32', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(19, 5, '2023-07-04', '08:47:36', '16:55:11', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(20, 6, '2023-07-04', '08:15:20', '16:56:24', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(21, 2, '2023-07-05', '08:00:37', '16:12:21', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(22, 3, '2023-07-05', '08:03:40', '16:59:24', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(23, 4, '2023-07-05', '08:03:23', '16:45:08', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(24, 5, '2023-07-05', '08:19:55', '16:08:59', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(25, 6, '2023-07-05', '08:29:59', '16:29:31', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(26, 2, '2023-07-06', '08:10:36', '16:02:34', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(27, 3, '2023-07-06', '08:28:39', '16:24:39', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(28, 4, '2023-07-06', '08:14:32', '16:27:34', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(29, 5, '2023-07-06', '08:12:04', '16:26:49', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(30, 6, '2023-07-06', '08:20:01', '16:49:05', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(31, 2, '2023-07-08', '08:02:25', '00:00:00', 'default.jpg', '', 'sakit', 'maaf lagi sakit', 1),
(32, 3, '2023-07-08', '08:16:26', '00:00:00', 'default.jpg', '', 'sakit', 'maaf lagi sakit', 1),
(33, 4, '2023-07-08', '08:02:46', '16:01:43', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(34, 5, '2023-07-08', '08:26:27', '16:44:46', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(35, 6, '2023-07-08', '08:02:43', '16:38:04', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(36, 2, '2023-07-09', '08:47:43', '16:24:24', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(37, 3, '2023-07-09', '08:59:51', '16:24:13', 'default.jpg', 'default.jpg', 'pulang', 'terlambat', 1),
(38, 4, '2023-07-09', '08:25:21', '16:57:29', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(39, 5, '2023-07-09', '08:20:03', '16:23:35', 'default.jpg', 'default.jpg', 'pulang', '', 1),
(40, 6, '2023-07-09', '08:32:51', '16:46:14', 'default.jpg', 'default.jpg', 'pulang', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `biaya_produksi` int(11) NOT NULL,
  `biaya_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_produksi_perkain` int(11) NOT NULL,
  `panjang_kain_perproduksi` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `ukuran`, `biaya_produksi`, `biaya_jual`, `jumlah`, `jumlah_produksi_perkain`, `panjang_kain_perproduksi`, `status`) VALUES
(1, 'Daster Rayon', 'All Size', 20000, 50000, 58, 7, '1.5 x 2 meter', 'Active'),
(2, 'Gamis Rayon', 'All Size', 50000, 120000, 62, 5, '1.5 x 3 meter', 'Active'),
(3, 'Gamis Twil', 'All Size', 40000, 90000, 49, 5, '1.5 x 3 meter', 'Active'),
(4, 'Midi Twil', 'All Size', 30000, 70000, 71, 6, '1.5 x 2.5 meter', 'Inactive');

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
(1, 'ali', '$2y$10$svu8hyvsmetA9wvdfkmuLubhLWIDZ1YXPwbAlSDYYn6DrZHofvIVu', 'bos', 10000000),
(2, 'ian', '$2y$10$LVNHJ232UzfXcKIXgJasJOyDwYtKF1hiQIQmH1Rv335fIAsTxXB2W', 'penjualan', 3500000),
(3, 'anonim', '$2y$10$weD8FL3lB1CujBp9wA1rc.N6K6RFQBtdXAdniAKqgdnGpyZLMzx76', 'finance', 4000000),
(4, 'riqqi', '$2y$10$L5n/AUFWOAptZIY8gQ6ISuy6tdN1Qv0/GhmuvgIx5ywkz75u6EBai', 'hrd', 4500000),
(5, 'febi', '$2y$10$hnZ.iq56q1jBlSZD8XgTO.9hmRavulj/azRppJVZRicq7tkAf37iG', 'gudang', 4000000),
(6, 'arya', '$2y$10$PfoHVt1wt33w6eISmSL8sO1idP73oouSrGPXV2gkaYFQkRzfdBiyy', 'produksi', 3500000),
(7, 'aq1', '$2y$10$ORiqJJtz2otArsfVW05i6eiSaVz59sjSxHAV888vBK9A5uXQOkohW', 'produksi', 1),
(8, 'anam112', '$2y$10$5IFmzXvPEPK7ezI0mHl7BONiahUg1Px/1c9Z57/e3q4l3ji0xiAQ6', 'produksi', 222),
(9, '1', '$2y$10$70u8CSokeuqRHcHIMKm4y.dbQzKzLpc7cQs58Vpz4JsaNtPEzbPLi', 'gudang', 123),
(10, '32', '$2y$10$8pKs/dBZHZLGr.KEwLx1tedM86s6tkB0Vjmed3dr4JYLeZvg92oze', 'gudang', 12221),
(11, '3', '$2y$10$LyavQHlJ5uYW7uct6yp5Y.tAIymUwWG5RA2/4P8cTuNna5.taBQeC', 'gudang', 55),
(12, '23', '$2y$10$aUcOyURvuU6jETMP1dKvw.Nn3EJG34BZbdRDkrdQYbv74p1mM.0Ke', 'hrd', 2222),
(13, '12221', '$2y$10$KSYTBkyYV8ZmL4uXtNIGB.IrWXK/m2S2piqtTimsmomVRR5v72vyK', 'gudang', 2132),
(14, '11', '$2y$10$SBYLLCmdbcP/BqQTUkMWwOlMkub19u6fGOlcsodtLGRk.p6kw/0/i', 'penjualan', 332);

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
  ADD KEY `chat_sender_id_foreign` (`sender_id`),
  ADD KEY `chat_receiver_id_foreign` (`receiver_id`);

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `finance`
--
ALTER TABLE `finance`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

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
  MODIFY `no_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id_penjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penjahitan`
--
ALTER TABLE `penjahitan`
  MODIFY `no_penjahitan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `chat_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id_user`);

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

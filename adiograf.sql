-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2021 pada 10.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adiograf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `finishing_laminasi`
--

CREATE TABLE `finishing_laminasi` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `finishing_laminasi`
--

INSERT INTO `finishing_laminasi` (`id`, `nama`, `produk`, `foto`, `ket`) VALUES
(1, 'Doff', 'Brosur', 'brosur-Doff.jpg', ''),
(2, 'Glossy', 'Brosur', 'brosur-Glossy.jpg', ''),
(3, 'Varnish Uv', 'Brosur', 'brosur-Varnish Uv.jpg', ''),
(4, 'Tidak Dilaminasi', 'Brosur', 'brosur-Tidak Dilaminasi.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `finishing_produk`
--

CREATE TABLE `finishing_produk` (
  `id` int(50) NOT NULL,
  `nama` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `finishing_produk`
--

INSERT INTO `finishing_produk` (`id`, `nama`, `produk`, `foto`, `ket`) VALUES
(1, 'Mata Ayam', 'Spanduk', '_500_Finishing_Mata_Ikan__600x600.jpg', 'Finishing agar mudah dipasangkan dengan tali.'),
(2, 'Selongso Atas/Bawah', 'Spanduk', '_500_Finishing_Selongsong_Atas-Bawah_600x600.jpg', 'Finishing yang dipasang dibagian samping atas dan bawah spanduk. tidak termasuk tiang.'),
(5, 'Tanpa Finishing', 'Spanduk', '_500_Finishing_tanpa_finishing600x600.jpg', 'Spanduk tidak menggunakan finishing'),
(6, 'Selongso Kiri/Kanan', 'Spanduk', '_500_Finishing_Selongsong_kanan-kiri_600x600.jpg', 'Finishing yang Finishing yang dipasang dibagian samping kanan dan kiri spanduk. tidak termasuk tiang.'),
(7, 'Lipat Dua', 'Brosur', 'Deskripsi_BROSUR-LIPAT-DUA_215x215.jpg', 'Lipatan dibagian tengah untuk membagi brosur menjadi 2 bagian.'),
(8, 'Lipat Tiga Z', 'Brosur', 'Deskripsi_BROSUR-LIPAT-Z_215x215.jpg', '2 lipatan zig-zag untuk membagi brosur menjadi 3 bagian.                                       '),
(9, 'Lipat Tiga U', 'Brosur', 'Deskripsi_BROSUR-LIPAT-U_215x215.jpg', '2 Lipatan ke arah dalam untuk membagi brosur menjadi 3 bagian.'),
(15, 'Laminating Doff/Matte', 'Tripod Banner', '', 'Tambahkan laminasi pelindung yang tidak mengkilap.'),
(16, 'Laminating Glossy', 'Tripod Banner', '', 'Tambahkan laminasi pelindung yang mengkilap.'),
(17, 'Laminating Doff/Matte', 'Kartu Nama', '', 'Tambahkan laminasi pelindung yang tidak mengkilap.'),
(18, 'Laminating Glossy', 'Kartu Nama', '', 'Tambahkan laminasi pelindung yang mengkilap.'),
(19, 'Tanpa Laminating', 'Kartu Nama', '', 'Tanpa tambahan laminating pelindung.'),
(20, 'Laminating Doff/Matte', 'Kartu Undangan', '', 'Permukaan halus, tidak mengkilap, terlihat lebih elegan.'),
(21, 'Laminating Glossy', 'Kartu Undangan', '', 'Permukaan licin, hasil print warna lebih terang dan nyata.'),
(22, 'Tanpa Laminating', 'Kartu Undangan', '', 'Permukaan kertas tidak dilaminasi.'),
(23, 'Satu Sisi', 'Flyer', '1 sisi.jpg', 'Jenis finishing yang hanya akan menampilkan isi dari flyer di salah satu sisinya saja.'),
(24, 'Dua Sisi', 'Flyer', '2 sisi.jpg', 'Jenis finishing yang akan menampilkan isi dari flyer pada kedua sisinya (bolak-balik).'),
(25, 'Satu Sisi', 'Sisi Brosur', 'brosur-1 sisi.jpg', ''),
(26, 'Dua Sisi', 'Sisi Brosur', 'brosur-2 sisi.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_brosur`
--

CREATE TABLE `pesan_brosur` (
  `brosur_id` varchar(10) NOT NULL,
  `brosur_keranjang_id` varchar(10) NOT NULL,
  `brosur_ukuran` text NOT NULL,
  `brosur_bahan` text NOT NULL,
  `brosur_finishing` text NOT NULL,
  `brosur_laminasi` varchar(30) NOT NULL,
  `brosur_lipatan` text NOT NULL,
  `brosur_jumlah` int(11) NOT NULL,
  `brosur_total` int(11) NOT NULL,
  `brosur_foto` text NOT NULL,
  `brosur_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_brosur`
--

INSERT INTO `pesan_brosur` (`brosur_id`, `brosur_keranjang_id`, `brosur_ukuran`, `brosur_bahan`, `brosur_finishing`, `brosur_laminasi`, `brosur_lipatan`, `brosur_jumlah`, `brosur_total`, `brosur_foto`, `brosur_date_created`) VALUES
('BRC-42266', 'CRT-42266', 'A4', '5', 'satu sisi', '3', 'Lipat Tiga Z', 20, 90000, 'flyer.jpg', '2021-06-15 14:31:06'),
('BRC-82171', 'CRT-82062', 'A4', '6', 'satu sisi', '2', 'Lipat Tiga Z', 1, 3500, '116.jpeg', '2021-06-14 21:49:31'),
('BRC-82224', 'CRT-82062', 'A5', '6', 'satu sisi', '2', 'Lipat Tiga Z', 2, 7000, '117.jpeg', '2021-06-14 21:50:24'),
('BSR-13678', 'CRT-13678', 'A4', '6', 'dua sisi', '2', 'Lipat Tiga Z', 20, 140000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-17 14:07:58'),
('BSR-15196', 'CRT-15196', 'A5', '6', 'satu sisi', '3', 'Lipat Tiga Z', 9, 36000, 'Biodata_Peserta.jpg', '2021-06-22 05:39:56'),
('BSR-23017', 'CRT-23017', 'A5', '6', 'dua sisi', '1', 'Lipat Tiga Z', 20, 132000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat2.jpg', '2021-06-18 20:30:17'),
('BSR-37180', 'CRT-37180', 'A4', '5', 'satu sisi', '2', 'Lipat Dua', 50, 200000, 'undangan.jpg', '2021-06-29 10:26:20'),
('BSR-47534', 'CRT-47534', 'A4', '5', 'satu sisi', '3', 'Lipat Tiga Z', 30, 135000, 'undangan1.jpg', '2021-06-29 13:18:54'),
('BSR-58997', 'CRT-58997', 'A4', '6', 'satu sisi', '4', 'Lipat Tiga U', 30, 90000, 'desain_undangan1.jpg', '2021-06-28 12:43:17'),
('BSR-71602', 'CRT-62256', 'A4', '5', 'satu sisi', '1', 'Lipat Tiga Z', 9, 34200, 'desain_undangan.jpg', '2021-06-27 12:26:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_flyer`
--

CREATE TABLE `pesan_flyer` (
  `flyer_id` varchar(10) NOT NULL,
  `flyer_keranjang_id` varchar(10) NOT NULL,
  `flyer_ukuran` text NOT NULL,
  `flyer_bahan` text NOT NULL,
  `flyer_finishing` text NOT NULL,
  `flyer_jumlah` int(11) NOT NULL,
  `flyer_estimasi` int(11) NOT NULL,
  `flyer_total` int(11) NOT NULL,
  `flyer_foto` text NOT NULL,
  `flyer_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_flyer`
--

INSERT INTO `pesan_flyer` (`flyer_id`, `flyer_keranjang_id`, `flyer_ukuran`, `flyer_bahan`, `flyer_finishing`, `flyer_jumlah`, `flyer_estimasi`, `flyer_total`, `flyer_foto`, `flyer_date_created`) VALUES
('CRD-82143', 'CRT-82062', 'A5', '27', 'satu sisi', 30, 0, 30000, '11.jpeg', '2021-06-14 21:49:03'),
('FYR-02652', 'CRT-02652', 'A5', '31', 'satu sisi', 40, 0, 48000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat1.jpg', '2021-06-18 14:50:52'),
('FYR-23566', 'CRT-23566', 'A4', '27', 'satu sisi', 100, 0, 100000, '12.jpeg', '2021-06-18 20:39:26'),
('FYR-99511', 'CRT-99387', 'A4', '31', 'dua sisi', 30, 0, 72000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-18 13:58:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_kalender`
--

CREATE TABLE `pesan_kalender` (
  `kalender_id` varchar(10) NOT NULL,
  `kalender_keranjang_id` varchar(10) NOT NULL,
  `kalender_ukuran` text NOT NULL,
  `kalender_bahan` text NOT NULL,
  `kalender_finishing` text NOT NULL,
  `kalender_dudukan` text NOT NULL,
  `kalender_laminasi` varchar(50) NOT NULL,
  `kalender_sisi` varchar(50) NOT NULL,
  `kalender_jumlah` int(11) NOT NULL,
  `kalender_total` int(11) NOT NULL,
  `kalender_foto` text NOT NULL,
  `kalender_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_kalender`
--

INSERT INTO `pesan_kalender` (`kalender_id`, `kalender_keranjang_id`, `kalender_ukuran`, `kalender_bahan`, `kalender_finishing`, `kalender_dudukan`, `kalender_laminasi`, `kalender_sisi`, `kalender_jumlah`, `kalender_total`, `kalender_foto`, `kalender_date_created`) VALUES
('BRC-79183', 'CRT-78722', 'A5', '38', '27', '30', '9', 'dua sisi', 9, 315000, '13.jpeg', '2021-06-17 04:33:03'),
('BRC-82361', 'CRT-82062', 'A5', '39', '28', '29', '9', 'dua sisi', 4, 164000, '11.jpeg', '2021-06-14 21:52:41'),
('KLM-05667', 'CRT-05667', 'A5', '39', '27', '29', '9', 'dua sisi', 7, 287000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-18 15:41:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_kartu_nama`
--

CREATE TABLE `pesan_kartu_nama` (
  `kartu_nama_id` varchar(10) NOT NULL,
  `kartu_nama_keranjang_id` varchar(10) NOT NULL,
  `kartu_nama_ukuran` text NOT NULL,
  `kartu_nama_bahan` text NOT NULL,
  `kartu_nama_sisi` text NOT NULL,
  `kartu_nama_sudut` text NOT NULL,
  `kartu_nama_laminasi` text NOT NULL,
  `kartu_nama_jumlah` int(11) NOT NULL,
  `kartu_nama_total` int(11) NOT NULL,
  `kartu_nama_foto` text NOT NULL,
  `kartu_nama_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_kartu_nama`
--

INSERT INTO `pesan_kartu_nama` (`kartu_nama_id`, `kartu_nama_keranjang_id`, `kartu_nama_ukuran`, `kartu_nama_bahan`, `kartu_nama_sisi`, `kartu_nama_sudut`, `kartu_nama_laminasi`, `kartu_nama_jumlah`, `kartu_nama_total`, `kartu_nama_foto`, `kartu_nama_date_created`) VALUES
('BRC-82260', 'CRT-82062', '9 x 5.5 cm', '12', 'satu sisi', 'Sudut Lancip', '6', 4, 196000, '1.jpeg', '2021-06-14 21:51:00'),
('BRC-89022', 'CRT-89022', '9 x 5.5 cm', '12', 'satu sisi', 'Sudut Lancip', '6', 5, 245000, 'c0b3bc62d17aa77e3da8fbef37630dfd.jpg', '2021-06-14 23:43:42'),
('KTN-03458', 'CRT-03458', '9 x 5.5 cm', '11', 'satu sisi', 'Sudut Lengkung', '6', 5, 195000, 'multifunctional-adjustable-x-banner-stands.jpg', '2021-06-18 15:04:18'),
('KTN-03510', 'CRT-03458', '9 x 5.5 cm', '11', 'dua sisi', 'Sudut Lancip', '6', 6, 468000, 'multifunctional-adjustable-x-banner-stands1.jpg', '2021-06-18 15:05:10'),
('KTN-22921', 'CRT-22921', '9 x 5.5 cm', '11', 'satu sisi', 'Sudut Lengkung', '6', 6, 234000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat2.jpg', '2021-06-18 20:28:41'),
('KTN-23044', 'CRT-23017', '9 x 5.5 cm', '11', 'satu sisi', 'Sudut Lancip', '5', 6, 234000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat3.jpg', '2021-06-18 20:30:44'),
('KTN-25531', 'CRT-25531', '9 x 5.5 cm', '12', 'satu sisi', 'Sudut Lengkung', '5', 30, 1470000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat5.jpg', '2021-06-18 21:12:11'),
('KTN-46175', 'CRT-46175', '9 x 5.5 cm', '12', 'dua sisi', 'Sudut Lengkung', '6', 8, 784000, 'kartu_nama1.jpg', '2021-07-06 11:36:15'),
('KTN-47390', 'CRT-47390', '9 x 5.5 cm', '12', 'satu sisi', 'Sudut Lengkung', '7', 15, 435000, 'kartu_nama2.jpg', '2021-07-06 11:56:30'),
('KTN-62256', 'CRT-62256', '9 x 5.5 cm', '11', 'dua sisi', 'Sudut Lancip', '7', 9, 342000, 'kartu_nama.jpg', '2021-06-27 09:50:56'),
('KTN-99267', 'CRT-99267', '9 x 5.5 cm', '12', 'dua sisi', 'Sudut Lancip', '6', 4, 392000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-18 13:54:27'),
('KTN-99387', 'CRT-99387', '9 x 5.5 cm', '12', 'satu sisi', 'Sudut Lengkung', '6', 7, 343000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat1.jpg', '2021-06-18 13:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_kartu_undangan`
--

CREATE TABLE `pesan_kartu_undangan` (
  `undangan_id` varchar(10) NOT NULL,
  `undangan_keranjang_id` varchar(10) NOT NULL,
  `undangan_ukuran` text NOT NULL,
  `undangan_bahan` text NOT NULL,
  `undangan_sisi` text NOT NULL,
  `undangan_laminasi` int(11) NOT NULL,
  `undangan_orientasi` text NOT NULL,
  `undangan_jumlah` int(11) NOT NULL,
  `undangan_total` int(11) NOT NULL,
  `undangan_foto` text NOT NULL,
  `undangan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_kartu_undangan`
--

INSERT INTO `pesan_kartu_undangan` (`undangan_id`, `undangan_keranjang_id`, `undangan_ukuran`, `undangan_bahan`, `undangan_sisi`, `undangan_laminasi`, `undangan_orientasi`, `undangan_jumlah`, `undangan_total`, `undangan_foto`, `undangan_date_created`) VALUES
('BRC-79582', 'CRT-79582', 'A5', '14', 'satu sisi', 11, 'landscape', 30, 105000, '15.jpeg', '2021-06-17 04:39:42'),
('BRC-79769', 'CRT-79582', 'A6', '14', 'satu sisi', 10, 'potrait', 90, 405000, '16.jpeg', '2021-06-17 04:42:49'),
('BRC-82292', 'CRT-82062', 'A5', '14', 'dua sisi', 10, 'potrait', 4, 52000, '12.jpeg', '2021-06-14 21:51:32'),
('BRC-82320', 'CRT-82062', 'A5', '14', 'dua sisi', 9, 'landscape', 3, 39000, '13.jpeg', '2021-06-14 21:52:00'),
('BRC-89216', 'CRT-89186', 'A6', '14', 'satu sisi', 10, 'potrait', 9, 40500, 'c0b3bc62d17aa77e3da8fbef37630dfd.jpg', '2021-06-14 23:46:56'),
('KTU-23424', 'CRT-23424', 'A5', '13', 'satu sisi', 9, 'landscape', 5, 32500, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-18 20:37:04'),
('KTU-25702', 'CRT-25702', 'A5', '14', 'satu sisi', 11, 'landscape', 500, 1750000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat1.jpg', '2021-06-18 21:15:02'),
('KTU-31283', 'CRT-31283', 'A5', '15', 'satu sisi', 10, 'potrait', 100, 800000, 'desain_undangan1.jpg', '2021-06-29 08:48:03'),
('KTU-47763', 'CRT-47763', 'A6', '14', 'satu sisi', 10, 'landscape', 200, 900000, 'desain_undangan2.jpg', '2021-06-29 13:22:43'),
('KTU-56161', 'CRT-56161', 'A6', '14', 'dua sisi', 10, 'potrait', 300, 2700000, 'undangan.jpg', '2021-06-22 17:02:41'),
('KTU-72972', 'CRT-72972', 'A6', '14', 'satu sisi', 10, 'potrait', 300, 1350000, 'desain_undangan.jpg', '2021-06-22 21:42:52'),
('KTU-73889', 'CRT-73889', 'A6', '14', 'dua sisi', 10, 'potrait', 100, 900000, 'undangan1.jpg', '2021-06-22 21:58:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_sertifikat`
--

CREATE TABLE `pesan_sertifikat` (
  `sertifikat_id` varchar(10) NOT NULL,
  `sertifikat_keranjang_id` varchar(10) NOT NULL,
  `sertifikat_ukuran` text NOT NULL,
  `sertifikat_bahan` text NOT NULL,
  `sertifikat_sisi` text NOT NULL,
  `sertifikat_jumlah` int(11) NOT NULL,
  `sertifikat_laminasi` text NOT NULL,
  `sertifikat_total` int(11) NOT NULL,
  `sertifikat_foto` text NOT NULL,
  `sertifikat_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_sertifikat`
--

INSERT INTO `pesan_sertifikat` (`sertifikat_id`, `sertifikat_keranjang_id`, `sertifikat_ukuran`, `sertifikat_bahan`, `sertifikat_sisi`, `sertifikat_jumlah`, `sertifikat_laminasi`, `sertifikat_total`, `sertifikat_foto`, `sertifikat_date_created`) VALUES
('BRC-78722', 'CRT-78722', 'F4', '41', 'dua sisi', 90, '10', 1620000, '14.jpeg', '2021-06-17 04:25:22'),
('BRC-78770', 'CRT-89022', 'A4', '43', 'satu sisi', 30, '11', 150000, '15.jpeg', '2021-06-17 04:26:10'),
('BRC-78988', 'CRT-78892', 'F4', '43', 'dua sisi', 2, '10', 44000, '16.jpeg', '2021-06-17 04:29:48'),
('BRC-79052', 'CRT-78722', 'F4', '42', 'satu sisi', 9, '10', 81000, '17.jpeg', '2021-06-17 04:30:52'),
('BRC-82390', 'CRT-82062', 'F4', '43', 'satu sisi', 3, '11', 24000, '11.jpeg', '2021-06-14 21:53:10'),
('SRF-24365', 'CRT-24365', 'A4', '41', 'satu sisi', 9, '9', 54000, 'Screenshot_(115).png', '2021-06-18 20:52:45'),
('SRF-24501', 'CRT-24365', 'A4', '42', 'satu sisi', 10, '10', 60000, 'multifunctional-adjustable-x-banner-stands.jpg', '2021-06-18 20:55:01'),
('SRF-61865', 'CRT-61865', 'A4', '43', 'satu sisi', 40, '10', 320000, 'sertifikat.JPG', '2021-06-27 09:44:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_spanduk_indoor`
--

CREATE TABLE `pesan_spanduk_indoor` (
  `spanduk_id` varchar(10) NOT NULL,
  `spanduk_keranjang_id` varchar(10) DEFAULT NULL,
  `spanduk_panjang` double NOT NULL,
  `spanduk_lebar` double NOT NULL,
  `spanduk_bahan` text NOT NULL,
  `spanduk_finishing` text NOT NULL,
  `spanduk_jumlah` int(11) NOT NULL,
  `spanduk_estimasi` int(11) NOT NULL,
  `spanduk_total` int(11) NOT NULL,
  `spanduk_foto` text NOT NULL,
  `spanduk_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_spanduk_indoor`
--

INSERT INTO `pesan_spanduk_indoor` (`spanduk_id`, `spanduk_keranjang_id`, `spanduk_panjang`, `spanduk_lebar`, `spanduk_bahan`, `spanduk_finishing`, `spanduk_jumlah`, `spanduk_estimasi`, `spanduk_total`, `spanduk_foto`, `spanduk_date_created`) VALUES
('SDK-49470', 'CRT-49470', 4, 4, '2', 'Tanpa Finishing', 3, 0, 1680000, 'WIN_20200509_22_03_42_Pro.jpg', '2021-06-28 10:04:30'),
('SDK-78339', 'CRT-78339', 2, 3, '2', 'Mata Ayam', 8, 0, 1680000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-19 11:52:19'),
('SDK-78484', 'CRT-78463', 3, 2, '2', 'Mata Ayam', 6, 7, 1260000, '12.jpeg', '2021-06-17 04:21:24'),
('SDK-82062', 'CRT-82062', 3, 2, '1', 'Tanpa Finishing', 2, 1, 240000, '11.jpeg', '2021-06-14 21:47:42'),
('SDK-87494', 'CRT-87494', 5, 2, '2', 'Selongso Atas/Bawah ', 9, 0, 3150000, 'spanduk.jpg', '2021-07-11 14:11:34'),
('SDK-98804', 'CRT-98804', 3, 1, '2', 'Mata Ayam', 20, 0, 2100000, 'spanduk1.jpg', '2021-07-11 17:20:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_spanduk_outdoor`
--

CREATE TABLE `pesan_spanduk_outdoor` (
  `spanduk_outdoor_id` varchar(10) NOT NULL,
  `spanduk_outdoor_keranjang_id` varchar(10) NOT NULL,
  `spanduk_outdoor_panjang` text NOT NULL,
  `spanduk_outdoor_lebar` text NOT NULL,
  `spanduk_outdoor_bahan` text NOT NULL,
  `spanduk_outdoor_jumlah` int(11) NOT NULL,
  `spanduk_outdoor_finishing` text NOT NULL,
  `spanduk_outdoor_total` int(11) NOT NULL,
  `spanduk_outdoor_estimasi` int(11) NOT NULL,
  `spanduk_outdoor_foto` text NOT NULL,
  `spanduk_outdoor_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_spanduk_outdoor`
--

INSERT INTO `pesan_spanduk_outdoor` (`spanduk_outdoor_id`, `spanduk_outdoor_keranjang_id`, `spanduk_outdoor_panjang`, `spanduk_outdoor_lebar`, `spanduk_outdoor_bahan`, `spanduk_outdoor_jumlah`, `spanduk_outdoor_finishing`, `spanduk_outdoor_total`, `spanduk_outdoor_estimasi`, `spanduk_outdoor_foto`, `spanduk_outdoor_date_created`) VALUES
('SDK-82108', 'CRT-82062', '5', '4', '23', 3, 'Mata Ayam', 1800000, 1, '11.jpeg', '2021-06-14 21:48:28'),
('SDKI-03315', 'CRT-03315', '2', '2', '20', 4, 'Tanpa Finishing', 224000, 3, 'multifunctional-adjustable-x-banner-stands.jpg', '2021-06-18 15:01:55'),
('SDKI-46517', 'CRT-46517', '2', '3', '21', 5, 'Selongso Atas/Bawah ', 510000, 0, 'spanduk.jpg', '2021-06-28 09:15:17'),
('SDKI-78407', 'CRT-78339', '3', '3', '22', 6, 'Selongso Atas/Bawah', 1782000, 0, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-19 11:53:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_xbanner`
--

CREATE TABLE `pesan_xbanner` (
  `xbanner_id` varchar(10) NOT NULL,
  `xbanner_keranjang_id` varchar(10) NOT NULL,
  `xbanner_ukuran` text NOT NULL,
  `xbanner_bahan` text NOT NULL,
  `xbanner_jumlah` int(11) NOT NULL,
  `xbanner_estimasi` int(11) NOT NULL,
  `xbanner_total` int(11) NOT NULL,
  `xbanner_foto` text NOT NULL,
  `xbanner_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan_xbanner`
--

INSERT INTO `pesan_xbanner` (`xbanner_id`, `xbanner_keranjang_id`, `xbanner_ukuran`, `xbanner_bahan`, `xbanner_jumlah`, `xbanner_estimasi`, `xbanner_total`, `xbanner_foto`, `xbanner_date_created`) VALUES
('SKR-78946', 'CRT-78892', 'kecil', '17', 6, 9, 200000, '16.jpeg', '2021-06-17 04:29:06'),
('SKR-82081', 'CRT-82062', 'kecil', '17', 3, 1, 125000, '15.jpeg', '2021-06-14 21:48:01'),
('SKR-89186', 'CRT-89186', 'sedang', '18', 2, 4, 145000, 'multifunctional-adjustable-x-banner-stands5.jpg', '2021-06-14 23:46:26'),
('XBR-23753', 'CRT-23753', 'kecil', '16', 50, 4, 800000, 'multifunctional-adjustable-x-banner-stands6.jpg', '2021-06-18 20:42:33'),
('XBR-45399', 'CRT-45399', 'sedang', '17', 7, 0, 250000, 'xbanner.jpg', '2021-06-28 08:56:39'),
('XBR-78386', 'CRT-78339', 'kecil', '16', 9, 0, 185000, 'Muhamad_Haekal_Ainun_Rafi_Jawa_Barat.jpg', '2021-06-19 11:53:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `id` int(10) NOT NULL,
  `bahan` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bahan`
--

INSERT INTO `tbl_bahan` (`id`, `bahan`, `produk`, `foto`, `ket`) VALUES
(1, 'Flexy China 280gsm (Eco Solvent)', 'Spanduk', 'Flexy_China_280gsm.jpg', 'Permukaan halus. lebih tebal, lebih baik dan lebih tahan lama dari albatros.'),
(2, 'Flexy Korea 440gsm (Eco Solvent)', 'Spanduk', 'Flexy_Korea_440gsm.jpg', '\r\nPermukaan halus. lebih tebal, lebih baik dan lebih tahan lama dari flexy China.'),
(3, 'Flexy China 340gsm (Eco Solvent)', 'Spanduk', 'Flexy_China_340gsm.jpg', '\r\nFlexy China dengan pilihan lebih tebal.'),
(4, 'Art Paper 120gsm', 'Brosur', 'DESC-ART_PAPER.jpg', 'Mengkilap dan halus. Bagus untuk memaksimalkan cetakan full color. Tingkat ketebalan tipis.'),
(5, 'Art Paper 150gsm', 'Brosur', 'DESC-ART_PAPER.jpg', 'Mengkilap dan halus. Bagus untuk memaksimalkan cetakan full color. Tingkat ketebalan sedang.'),
(6, 'Matte Paper 120gsm', 'Brosur', 'DESC-MATTE_PAPER.jpg', 'Mengkilap dan halus. Bagus untuk memaksimalkan cetakan full color. Tingkat ketebalan tipis.\r\n'),
(7, 'Matte Paper 150gsm', 'Brosur', 'DESC-MATTE_PAPER.jpg', 'Mengkilap dan halus. Bagus untuk memaksimalkan cetakan full color. Tingkat ketebalan sedang.'),
(11, 'Art Carton 260gsm', 'Kartu Nama', 'PPG_-_ART_CARTON.jpg', 'Berkualitas namun ekonomis. Bagus dalam memaksimalkan hasil cetak. Permukaan mengkilap di kedua sisi.'),
(12, 'Art Carton 310gsm', 'Kartu Nama', 'PPG_-_ART_CARTON.jpg', 'Lebih tebal. Bagus dalam memaksimalkan hasil cetak. Permukaan mengkilap di kedua sisi.'),
(13, 'Art Carton 210gsm', 'Kartu Undangan', 'PPG_-_ART_CARTON.jpg', 'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 210 gsm.'),
(14, 'Art Carton 260gsm', 'Kartu Undangan', 'PPG_-_ART_CARTON.jpg', 'Berkualitas namun ekonomis. Bagus dalam memaksimalkan hasil cetak. Permukaan mengkilap di kedua sisi.'),
(15, 'Art Carton 310gsm', 'Kartu Undangan', 'PPG_-_ART_CARTON.jpg', 'Sama dengan Art Carton 210 & 260 gsm, namun dengan ketebalan paling tinggi sehingga semakin kokoh.'),
(16, 'Albatross', 'x-banner', 'DESC-ALBATROS.jpg', 'Bahan dengan permukaan mengkilap dan cocok untuk keperluan dalam ruangan.'),
(17, 'Flexy China 340gsm', 'x-banner', 'DESC-FLEXY-CHINA.jpg', 'Bahan ekonomis dengan tekstur permukaan kasar dan berserat serta dimensi yang tipis'),
(18, 'Flexy Korea 440gsm', 'x-banner', 'DESC-FLEXY-KOREA.jpg', 'Bahan bertekstur halus & tebal serta lebih awet untuk penggunaan dalam/luar ruangan.'),
(20, 'Flexy China 280gsm', 'Spanduk Outdoor', 'DESC-FLEXY-CHINA.jpg', 'Bahan ekonomis dengan tekstur permukaan kasar dan berserat serta dimensi yang tipis.'),
(21, 'Flexy China 340gsm', 'Spanduk Outdoor', 'DESC-FLEXY-CHINA.jpg', 'Bahan ekonomis dengan tekstur permukaan kasar dan berserat serta dimensi yang tipis.'),
(22, 'Flexy Korea 440gsm', 'Spanduk Outdoor', 'DESC-FLEXY-KOREA.jpg', 'Bahan bertekstur halus & tebal serta lebih awet untuk penggunaan dalam/luar ruangan.'),
(23, 'Flexy China UV', 'Spanduk Outdoor', 'DESC-FLEXY-CHINA-UV.jpg', 'Bahan ekonomis dengan tekstur kasar & berserat serta bisa dipadukan dengan tinta UV.'),
(24, 'Flexy Korea UV 440gsm', 'Spanduk Outdoor', 'DESC-FLEXY-KOREA-UV.jpg', 'Bahan bertekstur halus & tebal yang awat serta bisa dipadukan dengan tinta UV.'),
(26, 'Art Paper 150gsm', 'flyer', 'DESC-ART_PAPER.jpg', 'Kertas dengan permukaan mengkilap dan cocok digunakan untuk cetak full color.'),
(27, 'Matte Paper 120gsm', 'flyer', 'DESC-MATTE_PAPER.jpg', 'Kertas dengan permukaan tidak mengkilap (doff) dan cocok untuk cetak warna.'),
(31, 'Matte Paper 150gsm', 'flyer', 'DESC-MATTE_PAPER.jpg', 'Kertas dengan permukaan tidak mengkilap (doff) dan cocok untuk cetak warna.'),
(34, 'Art Paper 120gsm', 'flyer', 'DESC-ART_PAPER.jpg', 'Kertas dengan permukaan mengkilap dan cocok digunakan untuk cetak full color.'),
(36, 'HVS', 'flyer', 'DESC-HVS.jpg', 'Kertas dengan tekstur agak kasar. yang mutifungsi dan bisa menerima tulisan tangan.'),
(38, 'Art Carton 210gsm', 'kalender', 'PPG_-_ART_CARTON.jpg', 'Tebal namun ekonomis. Permukaan mengkilap di kedua sisi dengan ketebalan 210 gsm.'),
(39, 'Art Carton 260gsm', 'kalender', 'PPG_-_ART_CARTON.jpg', 'Berkualitas namun ekonomis. Bagus dalam memaksimalkan hasil cetak. Permukaan mengkilap di kedua sisi.'),
(40, 'Art Carton 310gsm', 'kalender', 'PPG_-_ART_CARTON.jpg', 'Lebih tebal. Bagus dalam memaksimalkan hasil cetak. Permukaan mengkilap di kedua sisi.'),
(41, 'Art Carton 260gsm', 'sertifikat', 'PPG---BAHAN-SERTIFIKAT-_600x600_.jpg', ''),
(42, 'Art Carton 310gsm', 'sertifikat', 'PPG---BAHAN-SERTIFIKAT-_600x600_.jpg', ''),
(43, 'Blues White 250gsm', 'sertifikat', 'PPG---BAHAN-SERTIFIKAT-_600x600_.jpg', ''),
(45, 'test', 'Brosur', '1.jpeg', 'bagus'),
(46, 'testing', 'Flyer', '', '(Peringkat 4)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faktur`
--

CREATE TABLE `tbl_faktur` (
  `faktur_id` varchar(10) NOT NULL,
  `faktur_keranjang_id` varchar(10) NOT NULL,
  `faktur_bank` text NOT NULL,
  `faktur_status` enum('belum','sudah','tunggu','cetak','selesai','tidak_sesuai') NOT NULL DEFAULT 'belum',
  `deadline_pesanan` date NOT NULL,
  `faktur_date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `pesanan_dicetak` timestamp NOT NULL DEFAULT current_timestamp(),
  `pesanan_selesai` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_faktur`
--

INSERT INTO `tbl_faktur` (`faktur_id`, `faktur_keranjang_id`, `faktur_bank`, `faktur_status`, `deadline_pesanan`, `faktur_date_created`, `pesanan_dicetak`, `pesanan_selesai`, `status`) VALUES
('INV-00213', 'CRT-00190', 'bni', 'sudah', '0000-00-00', '2021-06-08 04:10:13', '2021-06-07 21:14:32', '2021-06-07 21:14:59', 0),
('INV-03327', 'CRT-03315', 'bri', 'selesai', '2021-06-23', '2021-06-22 15:09:07', '2021-06-22 14:46:23', '2021-06-22 15:01:22', 0),
('INV-03763', 'CRT-03756', 'bni', 'sudah', '0000-00-00', '2021-06-08 05:09:23', '2021-06-07 23:07:53', '2021-06-07 23:09:21', 0),
('INV-03768', 'CRT-03458', 'bni', 'cetak', '2021-06-30', '2021-06-22 15:09:07', '2021-06-29 03:29:10', '2021-06-18 08:09:28', 0),
('INV-05678', 'CRT-05667', 'bri', 'selesai', '2021-06-23', '2021-06-18 15:41:18', '2021-06-18 20:48:25', '2021-06-28 19:14:17', 0),
('INV-14735', 'CRT-14134', 'bni', 'cetak', '0000-00-00', '2021-06-08 14:04:11', '2021-06-08 09:03:34', '2021-06-08 07:23:37', 0),
('INV-23060', 'CRT-23017', 'bri', 'tidak_sesuai', '0000-00-00', '2021-06-18 20:31:00', '2021-06-18 13:31:00', '2021-06-18 13:31:00', 0),
('INV-23198', 'CRT-22921', 'bri', 'tunggu', '0000-00-00', '2021-06-18 20:33:18', '2021-06-18 13:33:18', '2021-06-18 13:33:18', 0),
('INV-23578', 'CRT-23566', 'bni', 'tidak_sesuai', '0000-00-00', '2021-06-18 20:39:38', '2021-06-18 13:39:38', '2021-06-18 13:39:38', 0),
('INV-24195', 'CRT-23753', 'bri', 'tunggu', '0000-00-00', '2021-06-18 20:49:55', '2021-06-18 13:49:55', '2021-06-18 13:49:55', 0),
('INV-25097', 'CRT-24365', 'bni', 'tunggu', '0000-00-00', '2021-06-18 21:04:57', '2021-06-18 14:04:57', '2021-06-18 14:04:57', 0),
('INV-25540', 'CRT-25531', 'bni', 'tunggu', '0000-00-00', '2021-06-18 21:12:20', '2021-06-18 14:12:20', '2021-06-18 14:12:20', 0),
('INV-25709', 'CRT-25702', 'bni', 'tunggu', '0000-00-00', '2021-06-18 21:15:09', '2021-06-18 14:15:09', '2021-06-18 14:15:09', 0),
('INV-31301', 'CRT-31283', 'Ovo', 'sudah', '2021-07-02', '2021-06-29 08:48:21', '2021-06-29 01:48:21', '2021-06-29 01:48:21', 0),
('INV-35851', 'CRT-15013', 'bri', 'sudah', '0000-00-00', '2021-06-08 14:04:11', '2021-06-08 07:15:11', '2021-06-08 07:15:36', 0),
('INV-37206', 'CRT-37180', 'Gopay', 'sudah', '2021-07-02', '2021-06-29 10:26:46', '2021-06-29 03:26:46', '2021-06-29 03:26:46', 0),
('INV-39373', 'CRT-39365', 'bni', 'belum', '0000-00-00', '2021-06-14 09:56:13', '2021-06-14 02:56:13', '2021-06-14 02:56:13', 0),
('INV-42780', 'CRT-42770', 'bni', 'sudah', '0000-00-00', '2021-06-08 15:59:40', '2021-06-08 08:59:40', '2021-06-08 08:59:40', 0),
('INV-42874', 'CRT-42266', 'bni', 'selesai', '2021-06-19', '2021-06-15 14:41:14', '2021-06-16 22:34:55', '2021-06-18 08:31:24', 0),
('INV-43527', 'CRT-43515', 'bni', 'sudah', '0000-00-00', '2021-06-08 16:12:07', '2021-06-08 09:12:07', '2021-06-08 09:12:07', 0),
('INV-43557', 'CRT-43548', 'bni', 'sudah', '0000-00-00', '2021-06-08 16:12:37', '2021-06-08 09:12:37', '2021-06-08 09:12:37', 0),
('INV-43589', 'CRT-43578', 'bni', 'sudah', '0000-00-00', '2021-06-08 16:13:09', '2021-06-08 09:13:09', '2021-06-08 09:13:09', 0),
('INV-43844', 'CRT-43833', 'bni', 'sudah', '0000-00-00', '2021-06-08 16:17:24', '2021-06-08 09:17:24', '2021-06-08 09:17:24', 0),
('INV-43879', 'CRT-43869', 'bni', 'sudah', '0000-00-00', '2021-06-08 16:17:59', '2021-06-08 09:17:59', '2021-06-08 09:17:59', 0),
('INV-44603', 'CRT-62256', 'Transfer Bank BRI', 'belum', '2021-06-24', '2021-06-28 08:43:23', '2021-06-28 01:43:23', '2021-06-28 01:43:23', 0),
('INV-45514', 'CRT-45399', 'BNI', 'belum', '2021-06-30', '2021-06-28 08:58:34', '2021-06-28 01:58:34', '2021-06-28 01:58:34', 0),
('INV-46193', 'CRT-46175', 'Ovo', 'sudah', '2021-07-09', '2021-07-06 11:36:33', '2021-07-06 04:36:33', '2021-07-06 04:36:33', 0),
('INV-47473', 'CRT-47390', 'Gopay', 'sudah', '2021-07-16', '2021-07-06 11:57:53', '2021-07-06 04:57:53', '2021-07-06 04:57:53', 0),
('INV-47556', 'CRT-47534', 'BRI', 'sudah', '2021-06-30', '2021-06-29 13:19:16', '2021-06-29 06:19:16', '2021-06-29 06:19:16', 0),
('INV-47776', 'CRT-47763', 'Gopay', 'cetak', '2021-06-30', '2021-06-29 13:19:16', '2021-07-11 10:41:54', '2021-06-29 06:22:56', 0),
('INV-49079', 'CRT-46517', 'BNI', 'belum', '2021-07-02', '2021-06-28 09:57:59', '2021-06-28 02:57:59', '2021-06-28 02:57:59', 0),
('INV-52923', 'CRT-32197', 'bni', 'sudah', '0000-00-00', '2021-06-07 15:02:03', '2021-06-07 09:33:01', '2021-06-07 19:27:12', 0),
('INV-53125', 'CRT-53120', 'bni', 'sudah', '0000-00-00', '2021-06-07 15:05:25', '2021-06-07 09:34:54', '2021-06-07 09:36:14', 0),
('INV-56310', 'CRT-56161', 'bri', 'belum', '0000-00-00', '2021-06-22 17:05:10', '2021-06-22 10:05:10', '2021-06-22 10:05:10', 0),
('INV-59024', 'CRT-58997', 'BRI', 'sudah', '2021-07-02', '2021-06-28 12:43:44', '2021-06-28 05:43:44', '2021-06-28 05:43:44', 0),
('INV-59167', 'CRT-15196', 'bri', 'cetak', '2021-06-30', '2021-06-27 08:59:27', '2021-07-06 05:02:33', '2021-06-27 01:59:27', 0),
('INV-61921', 'CRT-61865', 'bni', 'selesai', '2021-06-30', '2021-06-27 09:45:21', '2021-06-28 05:46:16', '2021-06-28 05:46:43', 0),
('INV-73000', 'CRT-72972', 'bri', 'cetak', '2021-06-30', '2021-06-22 21:43:20', '2021-06-29 06:31:29', '2021-06-22 14:43:20', 0),
('INV-73912', 'CRT-73889', 'bni', 'cetak', '2021-06-30', '2021-06-22 21:58:32', '2021-07-06 04:41:38', '2021-06-22 14:58:32', 0),
('INV-78495', 'CRT-78463', 'bni', 'selesai', '2021-06-30', '2021-06-22 04:21:35', '2021-06-29 02:09:42', '2021-06-29 03:29:31', 0),
('INV-78795', 'CRT-89022', 'bri', 'selesai', '2021-06-19', '2021-06-17 04:26:35', '2021-06-18 07:39:43', '2021-06-18 08:31:45', 0),
('INV-79013', 'CRT-78892', 'bri', 'belum', '0000-00-00', '2021-06-17 04:30:13', '2021-06-16 21:30:13', '2021-06-16 21:30:13', 0),
('INV-79226', 'CRT-78722', 'bni', 'selesai', '2021-06-30', '2021-06-22 04:33:46', '2021-06-29 02:09:50', '2021-07-11 10:42:17', 0),
('INV-79785', 'CRT-79582', 'bni', 'belum', '0000-00-00', '2021-06-17 04:43:05', '2021-06-16 21:43:05', '2021-06-16 21:43:05', 0),
('INV-83346', 'CRT-82062', 'bri', 'selesai', '2021-06-15', '2021-06-14 22:09:06', '2021-06-14 16:27:09', '2021-06-14 16:38:16', 0),
('INV-89233', 'CRT-89186', 'bni', 'sudah', '0000-00-00', '2021-06-14 23:47:13', '2021-06-14 16:49:26', '2021-06-14 16:47:13', 0),
('INV-90638', 'CRT-78339', 'bri', 'tunggu', '0000-00-00', '2021-06-19 15:17:18', '2021-06-19 08:17:18', '2021-06-19 08:17:18', 0),
('INV-96706', 'CRT-96699', 'bni', 'sudah', '0000-00-00', '2021-06-08 03:11:46', '2021-06-07 21:14:46', '2021-06-07 22:56:14', 0),
('INV-98869', 'CRT-98804', 'Gopay', 'tidak_sesuai', '2021-07-15', '2021-07-11 17:21:09', '2021-07-11 10:21:09', '2021-07-11 10:21:09', 0),
('INV-99625', 'CRT-97726', 'bri', 'sudah', '0000-00-00', '2021-06-08 04:00:25', '2021-06-07 23:04:11', '2021-06-07 23:04:32', 0),
('INV-99755', 'CRT-99387', 'bri', 'selesai', '2021-06-30', '2021-06-22 15:09:07', '2021-06-22 15:00:44', '2021-06-28 19:14:21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_finishing`
--

CREATE TABLE `tbl_finishing` (
  `id` int(50) NOT NULL,
  `nama` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_finishing`
--

INSERT INTO `tbl_finishing` (`id`, `nama`, `produk`, `foto`, `ket`) VALUES
(1, 'Mata Ayam', 'Spanduk', '_500_Finishing_Mata_Ikan__600x600.jpg', 'Finishing agar mudah dipasangkan dengan tali.'),
(2, 'Selongso Atas/Bawah ', 'Spanduk', '_500_Finishing_Selongsong_Atas-Bawah_600x600.jpg', 'Finishing yang dipasang dibagian samping atas dan bawah spanduk. tidak termasuk tiang.'),
(5, 'Tanpa Finishing', 'Spanduk', '_500_Finishing_tanpa_finishing600x600.jpg', 'Spanduk tidak menggunakan finishing'),
(6, 'Selongso Kiri/Kanan', 'Spanduk', '_500_Finishing_Selongsong_kanan-kiri_600x600.jpg', 'Finishing yang Finishing yang dipasang dibagian samping kanan dan kiri spanduk. tidak termasuk tiang.'),
(7, 'Lipat Dua', 'Brosur', 'Deskripsi_BROSUR-LIPAT-DUA_215x215.jpg', 'Lipatan dibagian tengah untuk membagi brosur menjadi 2 bagian.'),
(8, 'Lipat Tiga Z', 'Brosur', 'Deskripsi_BROSUR-LIPAT-Z_215x215.jpg', '2 lipatan zig-zag untuk membagi brosur menjadi 3 bagian.                                       '),
(9, 'Lipat Tiga U', 'Brosur', 'Deskripsi_BROSUR-LIPAT-U_215x215.jpg', '2 Lipatan ke arah dalam untuk membagi brosur menjadi 3 bagian.'),
(18, 'Sudut Lengkung', 'Kartu Nama', 'tumpul.jpg', 'Potongan ujung kartu nama dengan sudut tumpul.'),
(19, 'Sudut Lancip', 'Kartu Nama', 'lancip.jpg', 'Potongan ujung kartu nama dengan sudut lancip.'),
(20, 'Laminating Doff/Matte', 'Kartu Undangan', '', 'Permukaan halus, tidak mengkilap, terlihat lebih elegan.'),
(21, 'Laminating Glossy', 'Kartu Undangan', '', 'Permukaan licin, hasil print warna lebih terang dan nyata.'),
(22, 'Tanpa Laminating', 'Kartu Undangan', '', 'Permukaan kertas tidak dilaminasi.'),
(23, 'Satu Sisi', 'Flyer', '1 sisi.jpg', 'Jenis finishing yang hanya akan menampilkan isi dari flyer di salah satu sisinya saja.'),
(24, 'Dua Sisi', 'Flyer', '2 sisi.jpg', 'Jenis finishing yang akan menampilkan isi dari flyer pada kedua sisinya (bolak-balik).'),
(25, 'Satu Sisi', 'Sisi Brosur', 'brosur-1 sisi.jpg', ''),
(26, 'Dua Sisi', 'Sisi Brosur', 'brosur-2 sisi.jpg', ''),
(27, 'Spiral Putih', 'finishing kalender', 'FINISHING-SPIRAL-HANGER-PUTIH_600x600.jpg', 'Berbentuk lilitan dan terbuat dari bahan kawat/plastik yang kuat dan tahan lama dengan hanger berwarna putih.'),
(28, 'Spiral Hitam', 'finishing kalender', 'FINISHING-SPIRAL-HANGER-HITAM_600x600.jpg', 'Berbentuk lilitan dan terbuat dari bahan kawat/plastik yang kuat dan tahan lama dengan hanger berwarna hitam.'),
(29, 'Board + Linen Biru', 'dudukan kalender', 'FINISHING-BOARD-BIRU-LINEN_600x600.jpg', 'Penyangga berbahan papan yang digunakan sebagai dudukan dan terdapat lapisan linen berwarna biru.'),
(30, 'Board + Linen Hitam', 'dudukan kalender', 'FINISHING-BOARD-HITAM-LINEN_600x600.jpg', 'Penyangga berbahan papan yang digunakan sebagai dudukan dan terdapat lapisan linen berwarna hitam.'),
(31, '', '', '', ''),
(32, '', '', '', ''),
(33, '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_bahan`
--

CREATE TABLE `tbl_harga_bahan` (
  `id_hrg_bahan` int(10) NOT NULL,
  `id_bhn_fk` int(11) NOT NULL,
  `harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_bahan`
--

INSERT INTO `tbl_harga_bahan` (`id_hrg_bahan`, `id_bhn_fk`, `harga`) VALUES
(1, 0, '3003'),
(2, 2, '35000'),
(3, 3, '25000'),
(5, 16, '15000'),
(6, 17, '25000'),
(8, 18, '35000'),
(9, 20, '14000'),
(10, 21, '17000'),
(11, 22, '33000'),
(12, 23, '30000'),
(13, 24, '45000'),
(15, 26, '900'),
(16, 27, '1000'),
(17, 31, '1200'),
(18, 34, '700'),
(19, 36, '300'),
(21, 4, '4000'),
(22, 5, '3500'),
(23, 6, '3000'),
(24, 7, '2500'),
(26, 12, '29000'),
(27, 13, '1500'),
(28, 14, '1500'),
(29, 15, '3000'),
(30, 38, '32000'),
(31, 39, '38000'),
(32, 40, '38000'),
(33, 41, '3000'),
(34, 42, '3000'),
(35, 43, '5000'),
(47, 46, '350');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_finishing`
--

CREATE TABLE `tbl_harga_finishing` (
  `id_hrg_finishing` int(10) NOT NULL,
  `id_finishing_fk` int(10) NOT NULL,
  `harga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_harga_laminasi`
--

CREATE TABLE `tbl_harga_laminasi` (
  `id_hrg_laminasi` int(11) NOT NULL,
  `id_laminasi_fk` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_harga_laminasi`
--

INSERT INTO `tbl_harga_laminasi` (`id_hrg_laminasi`, `id_laminasi_fk`, `harga`) VALUES
(1, 1, 300),
(2, 2, 500),
(3, 3, 1000),
(4, 4, 0),
(5, 5, 20000),
(6, 6, 20000),
(7, 7, 0),
(8, 9, 3000),
(9, 10, 3000),
(10, 11, 0),
(15, 13, 3000),
(16, 14, 3000),
(17, 15, 0),
(19, 13, 3000),
(20, 14, 3000),
(21, 17, 3000),
(22, 18, 3000),
(23, 19, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `keranjang_id` varchar(10) NOT NULL,
  `keranjang_pengguna_id` int(11) NOT NULL,
  `keranjang_total` int(11) NOT NULL,
  `keranjang_status` enum('belum','selesai','bayar_diterima','bayar_menunggu','bayar_verifikasi') NOT NULL DEFAULT 'belum',
  `keranjang_estimasi` int(11) NOT NULL,
  `keranjang_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`keranjang_id`, `keranjang_pengguna_id`, `keranjang_total`, `keranjang_status`, `keranjang_estimasi`, `keranjang_date_created`) VALUES
('CRT-02652', 21, 48000, 'bayar_menunggu', 0, '2021-06-18 14:50:52'),
('CRT-03315', 22, 224000, 'bayar_menunggu', 0, '2021-06-18 15:01:55'),
('CRT-03458', 22, 663000, 'bayar_menunggu', 0, '2021-06-18 15:04:18'),
('CRT-05667', 22, 287000, 'bayar_menunggu', 0, '2021-06-18 15:41:07'),
('CRT-13678', 2, 140000, 'bayar_menunggu', 0, '2021-06-17 14:07:58'),
('CRT-15196', 2, 36000, 'bayar_menunggu', 0, '2021-06-22 05:39:56'),
('CRT-22921', 23, 234000, 'bayar_menunggu', 0, '2021-06-18 20:28:41'),
('CRT-23017', 24, 366000, 'bayar_menunggu', 0, '2021-06-18 20:30:17'),
('CRT-23424', 25, 32500, 'belum', 0, '2021-06-18 20:37:04'),
('CRT-23566', 26, 100000, 'bayar_menunggu', 0, '2021-06-18 20:39:26'),
('CRT-23753', 27, 800000, 'bayar_menunggu', 0, '2021-06-18 20:42:33'),
('CRT-24365', 28, 114000, 'bayar_menunggu', 0, '2021-06-18 20:52:45'),
('CRT-25531', 29, 1470000, 'bayar_menunggu', 0, '2021-06-18 21:12:11'),
('CRT-25702', 30, 1750000, 'bayar_menunggu', 0, '2021-06-18 21:15:02'),
('CRT-31283', 17, 800000, 'bayar_menunggu', 0, '2021-06-29 08:48:03'),
('CRT-37180', 17, 200000, 'bayar_menunggu', 0, '2021-06-29 10:26:20'),
('CRT-42266', 2, 90000, 'bayar_menunggu', 0, '2021-06-15 14:31:06'),
('CRT-45399', 2, 250000, 'bayar_menunggu', 0, '2021-06-28 08:56:39'),
('CRT-46175', 2, 784000, 'bayar_menunggu', 0, '2021-07-06 11:36:15'),
('CRT-46517', 2, 510000, 'bayar_menunggu', 0, '2021-06-28 09:15:17'),
('CRT-47390', 2, 435000, 'bayar_menunggu', 0, '2021-07-06 11:56:30'),
('CRT-47534', 17, 1000000, 'bayar_menunggu', 0, '2021-06-29 13:18:54'),
('CRT-47763', 17, 900000, 'bayar_menunggu', 0, '2021-06-29 13:22:43'),
('CRT-49470', 21, 1680000, 'belum', 0, '2021-06-28 10:04:30'),
('CRT-56161', 31, 2700000, 'bayar_menunggu', 0, '2021-06-22 17:02:41'),
('CRT-58997', 34, 90000, 'bayar_menunggu', 0, '2021-06-28 12:43:17'),
('CRT-61865', 2, 320000, 'bayar_menunggu', 0, '2021-06-27 09:44:25'),
('CRT-62256', 2, 376200, 'bayar_menunggu', 0, '2021-06-27 09:50:56'),
('CRT-72972', 32, 1350000, 'bayar_menunggu', 0, '2021-06-22 21:42:52'),
('CRT-73889', 33, 900000, 'bayar_menunggu', 0, '2021-06-22 21:58:09'),
('CRT-78339', 2, 3647000, 'bayar_menunggu', 0, '2021-06-19 11:52:19'),
('CRT-78411', 2, 990000, 'bayar_menunggu', 0, '2021-06-17 04:20:11'),
('CRT-78463', 2, 2556000, 'bayar_menunggu', 0, '2021-06-17 04:21:03'),
('CRT-78722', 2, 2016000, 'bayar_menunggu', 0, '2021-06-17 04:25:22'),
('CRT-78892', 5, 478000, 'bayar_menunggu', 0, '2021-06-17 04:28:12'),
('CRT-79582', 2, 510000, 'bayar_menunggu', 0, '2021-06-17 04:39:42'),
('CRT-82062', 2, 2680500, 'bayar_menunggu', 0, '2021-06-14 21:47:42'),
('CRT-87494', 35, 3150000, 'belum', 0, '2021-07-11 14:11:34'),
('CRT-89022', 5, 395000, 'bayar_menunggu', 0, '2021-06-14 23:43:42'),
('CRT-89186', 15, 185500, 'bayar_menunggu', 0, '2021-06-14 23:46:26'),
('CRT-98804', 2, 2100000, 'bayar_menunggu', 0, '2021-07-11 17:20:04'),
('CRT-99267', 5, 392000, 'belum', 0, '2021-06-18 13:54:27'),
('CRT-99387', 21, 415000, 'bayar_menunggu', 0, '2021-06-18 13:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_website` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `favicon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `keywords` varchar(225) NOT NULL,
  `metatext` varchar(225) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_website`, `logo`, `favicon`, `email`, `no_telp`, `alamat`, `facebook`, `instagram`, `keywords`, `metatext`, `about`) VALUES
(1, 'SUSANTOKUN', 'member.png', 'admin.png', 'admin@susantokun.com', '081906515912', 'KOMPLEK BTN Munjul No.12A 02/06, Sukaresmi, Cianjur, Jawa Barat, Indonesia (43253)', 'https://facebook.com/susantokundotcom', 'https://instagram.com/susantokun', 'info-susantokun, demo-susantokun, susantokun', 'Situs Edukasi, Tips dan Tutorial', 'Susantokun adalah situs edukasi seperti pelajaran dan ilmu pengetahuan, serta membahas tentang tips, tutorial, teknologi, tugas-tugas hingga berita terkini.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `konfirmasi_id` varchar(10) NOT NULL,
  `konfirmasi_faktur_id` varchar(10) NOT NULL,
  `konfirmasi_rekening` varchar(30) NOT NULL,
  `konfirmasi_atas_nama` varchar(50) NOT NULL,
  `konfirmasi_nominal` int(11) NOT NULL,
  `konfirmasi_struk` text NOT NULL,
  `konfirmasi_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`konfirmasi_id`, `konfirmasi_faktur_id`, `konfirmasi_rekening`, `konfirmasi_atas_nama`, `konfirmasi_nominal`, `konfirmasi_struk`, `konfirmasi_date_created`) VALUES
('CFM-00244', 'INV-00213', '12345', 'ainun', 355000, 'multifunctional-adjustable-x-banner-stands2.jpg', '2021-06-08 04:10:44'),
('CFM-00325', 'INV-99755', '12345', 'irwandi', 415000, 'Bukti_Pembayaran5.jpg', '2021-06-18 14:12:05'),
('CFM-01339', 'INV-91631', '22222', 'xxxx', 2310000, '1.jpeg', '2021-05-22 23:35:39'),
('CFM-01506', 'INV-56425', '123456789', 'rafi', 1400000, '93750458910-tem.jpeg', '2021-05-22 23:38:26'),
('CFM-02717', 'INV-02684', '12345', 'MAS IRWAN', 48000, 'Bukti_Pembayaran6.jpg', '2021-06-18 14:51:57'),
('CFM-02785', 'INV-02684', '43224532', 'rudi', 48000, '14.jpeg', '2021-06-18 14:53:05'),
('CFM-03374', 'INV-03327', '4982739', 'haekal akmal', 224000, 'multifunctional-adjustable-x-banner-stands7.jpg', '2021-06-18 15:02:54'),
('CFM-03794', 'INV-03763', '123', 'ainun', 210000, 'multifunctional-adjustable-x-banner-stands3.jpg', '2021-06-08 05:09:54'),
('CFM-04121', 'INV-03768', '1238291', 'akmal ', 663000, 'Bukti_Pembayaran8.jpg', '2021-06-18 15:15:21'),
('CFM-05784', 'INV-05678', '5356433', 'thoriq', 287000, 'Bukti_Pembayaran9.jpg', '2021-06-18 15:43:04'),
('CFM-07032', 'INV-06993', '123333', 'ainun', 33333, 'unnamed.png', '2021-06-03 14:57:12'),
('CFM-07922', 'INV-11776', '123456789', 'ainun', 207500, '93750458910-tem.jpeg', '2021-05-30 00:05:22'),
('CFM-14769', 'INV-14735', '12345', 'ainun', 1625000, 'multifunctional-adjustable-x-banner-stands.jpg', '2021-06-08 08:12:49'),
('CFM-18901', 'INV-79785', '123', 'ainun', 20000, 'Instastory_Muhamad_Haekal_Ainun_Rafi.JPG', '2021-06-17 15:35:01'),
('CFM-19320', 'INV-79785', '123', 'ainun', 202222, 'Instastory_Muhamad_Haekal_Ainun_Rafi1.JPG', '2021-06-17 15:42:00'),
('CFM-19602', 'INV-79785', '123', 'ainun', 200000, 'Instastory_Muhamad_Haekal_Ainun_Rafi2.JPG', '2021-06-17 15:46:42'),
('CFM-23089', 'INV-23060', '12345542', 'Faisal Rahman', 366000, 'Bukti_Pembayaran10.jpg', '2021-06-18 20:31:29'),
('CFM-23218', 'INV-23198', '89457474', 'Hikmal Akbar', 234000, 'Bukti_Pembayaran11.jpg', '2021-06-18 20:33:38'),
('CFM-23601', 'INV-23578', '34567543', 'arka ramadhan', 100000, 'Bukti_Pembayaran12.jpg', '2021-06-18 20:40:01'),
('CFM-24220', 'INV-24195', '9864677765', 'Ika Sari', 800000, 'Bukti_Pembayaran13.jpg', '2021-06-18 20:50:20'),
('CFM-25125', 'INV-25097', '542545665', 'Zainab Maimunah', 114000, 'Bukti_Pembayaran14.jpg', '2021-06-18 21:05:25'),
('CFM-25558', 'INV-25540', '4354333', 'giovandy E', 1470000, 'Bukti_Pembayaran15.jpg', '2021-06-18 21:12:38'),
('CFM-25738', 'INV-25709', '65786433', 'Sandi Aul', 1750000, 'Bukti_Pembayaran16.jpg', '2021-06-18 21:15:38'),
('CFM-31336', 'INV-31301', '089171717', 'haekal ainun', 800000, 'Bukti_Pembayaran22.jpg', '2021-06-29 08:48:56'),
('CFM-32462', 'INV-30460', '123415151', 'Jihad Benastey', 4100000, 'Screenshot_(3).png', '2019-08-11 21:07:42'),
('CFM-33545', 'INV-33514', '12345', 'fuadi', 200000, '93750458910-tem1.jpeg', '2021-05-31 10:59:06'),
('CFM-34741', 'INV-34702', '12345', 'fuadi', 1975000, '93750458910-tem2.jpeg', '2021-05-31 11:19:01'),
('CFM-35898', 'INV-35851', '123', 'ainun', 2140000, 'c0b3bc62d17aa77e3da8fbef37630dfd.jpg', '2021-06-08 14:04:58'),
('CFM-37279', 'INV-37206', '12390288', 'haekal ainun', 200000, 'Bukti_Pembayaran23.jpg', '2021-06-29 10:27:59'),
('CFM-42811', 'INV-42780', '12345', 'atul', 250000, 'c0b3bc62d17aa77e3da8fbef37630dfd.jpg', '2021-06-08 16:00:12'),
('CFM-43620', 'INV-43589', '123444', 'atul', 285000, 'c0b3bc62d17aa77e3da8fbef37630dfd1.jpg', '2021-06-08 16:13:40'),
('CFM-43662', 'INV-43557', '12345', 'mele', 285000, 'multifunctional-adjustable-x-banner-stands5.jpg', '2021-06-08 16:14:22'),
('CFM-43692', 'INV-43527', '12345', 'oji', 215000, 'c0b3bc62d17aa77e3da8fbef37630dfd2.jpg', '2021-06-08 16:14:52'),
('CFM-43913', 'INV-43879', '12345', 'jioo', 650000, 'multifunctional-adjustable-x-banner-stands6.jpg', '2021-06-08 16:18:33'),
('CFM-43947', 'INV-43844', '2355444', 'wirs rud', 550000, '1.jpeg', '2021-06-08 16:19:07'),
('CFM-46258', 'INV-46193', '87899999', 'ainun rafi', 784000, 'Bukti_Pembayaran26.jpg', '2021-07-06 11:37:38'),
('CFM-47561', 'INV-47473', '89867890', 'haekal ainun', 435000, 'Bukti_Pembayaran27.jpg', '2021-07-06 11:59:21'),
('CFM-47655', 'INV-47556', '4563567', 'Haekal Ainun Rafi', 135000, 'Bukti_Pembayaran24.jpg', '2021-06-29 13:20:55'),
('CFM-47801', 'INV-47776', '74683839', 'Haekal Ainun rafi', 900000, 'Bukti_Pembayaran25.jpg', '2021-06-29 13:23:21'),
('CFM-52972', 'INV-52923', '322222', 'ainun', 1895000, 'x-banner-sai.jpg', '2021-06-07 15:02:52'),
('CFM-53168', 'INV-53125', '12334', 'ainun', 960000, 'Screenshot_(115).png', '2021-06-07 15:06:08'),
('CFM-59071', 'INV-59024', '98699768', 'fattah fauzan', 90000, 'Bukti_Pembayaran21.jpg', '2021-06-28 12:44:31'),
('CFM-71130', 'INV-41623', '43574333', '987678999', 140000, 'Bukti Pembayaran.jpg', '2021-06-22 21:12:10'),
('CFM-73052', 'INV-73000', '987890976', 'sherina', 1350000, 'Bukti_Pembayaran19.jpg', '2021-06-22 21:44:12'),
('CFM-73287', 'INV-73209', '21312312', 'Randi', 4500000, 'imk_jadwal_test.png', '2019-08-08 21:08:07'),
('CFM-73963', 'INV-73912', '12345677', 'mawar', 900000, 'Bukti_Pembayaran20.jpg', '2021-06-22 21:59:23'),
('CFM-76907', 'INV-42874', '123', 'ainun', 90000, '1.jpeg', '2021-06-17 03:55:07'),
('CFM-78563', 'INV-78435', '12345', 'ainun', 990000, '12.jpeg', '2021-06-17 04:22:43'),
('CFM-78834', 'INV-78795', '12345', 'fuadi', 395000, 'Bukti_Pembayaran.jpg', '2021-06-17 04:27:14'),
('CFM-79277', 'INV-79226', '90900', 'ainun', 2016000, 'MUHAMAD HAEKAL AINUN RAFI.pdf', '2021-06-17 04:34:37'),
('CFM-79300', 'INV-78495', '898888', 'ainun', 2556000, 'logo-jgu1.png', '2021-06-17 04:35:00'),
('CFM-84689', 'INV-83346', '123', 'ainun', 2680500, '11.jpeg', '2021-06-14 22:31:29'),
('CFM-89309', 'INV-89233', '12345', 'Dodi ', 185500, 'Bukti_Pembayaran.jpg', '2021-06-14 23:48:29'),
('CFM-90666', 'INV-90638', '12345', 'haekal', 3000000, 'Bukti_Pembayaran17.jpg', '2021-06-19 15:17:46'),
('CFM-92850', 'INV-98806', '123', 'ainun', 30000, '5.png', '2021-05-29 19:54:10'),
('CFM-95038', 'INV-11376', '11551102648', 'Jihad Benastey', 1230000, '430scuderia.jpg', '2019-08-05 15:50:38'),
('CFM-96779', 'INV-96706', '12345', 'ainun', 150000, 'multifunctional-adjustable-x-banner-stands.jpg', '2021-06-08 03:12:59'),
('CFM-99219', 'INV-98869', '098768977', 'Haekal ', 2100000, 'Bukti Pembayaran.jpg', '2021-07-11 17:26:59'),
('CFM-99647', 'INV-99625', '123', 'ainun', 515000, 'multifunctional-adjustable-x-banner-stands1.jpg', '2021-06-08 04:00:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laminasi`
--

CREATE TABLE `tbl_laminasi` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laminasi`
--

INSERT INTO `tbl_laminasi` (`id`, `nama`, `produk`, `foto`, `ket`) VALUES
(1, 'Doff', 'Brosur', 'brosur-Doff.jpg', ''),
(2, 'Glossy', 'Brosur', 'brosur-Glossy.jpg', ''),
(3, 'Varnish UV', 'Brosur', 'brosur-Varnish Uv.jpg', ''),
(4, 'Tidak Dilaminasi', 'Brosur', 'brosur-Tidak Dilaminasi.jpg', ''),
(5, 'Doff', 'Kartu Nama', 'FINISHING-DOFF_600x600.jpg', 'Laminasi dengan efek kesat yang terasa halus ketika dipegang dan membuat permukaan tidak memantulkan cahaya.'),
(6, 'Glossy', 'Kartu Nama', 'FINISHING-GLOSSY_600x600.jpg', 'Laminasi dengan efek mengkilap seperti kaca yang membantu memancarkan warna dan juga lebih mudah dibersihkan.'),
(7, 'Tidak Dilaminasi', 'Kartu Nama', 'FINISHING-TDKLAMINASI_600x600.jpg', 'Tanpa menggunakan glossy ataupun doff sebagai finishing produk namun warna yang timbul akan terlihat lebih natural.'),
(9, 'Glossy', 'Kartu Undangan', 'FINISHING-DOFF_600x600.jpg', 'Laminasi dengan efek mengkilap seperti kaca yang membantu memancarkan warna dan juga lebih mudah dibersihkan.'),
(10, 'Doff', 'Kartu Undangan', 'FINISHING-GLOSSY_600x600.jpg', 'Laminasi dengan efek kesat yang terasa halus ketika dipegang dan membuat permukaan tidak memantulkan cahaya.'),
(11, 'Tidak Dilaminasi', 'Kartu Undangan', 'FINISHING-TDKLAMINASI_600x600.jpg', 'Tanpa menggunakan glossy ataupun doff sebagai finishing produk namun warna yang timbul akan terlihat lebih natural.'),
(13, 'Doff', 'Kalender', 'FINISHING-GLOSSY_600x600.jpg', 'Laminasi dengan efek kesat yang terasa halus ketika dipegang dan membuat permukaan tidak memantulkan cahaya.'),
(14, 'Glossy', 'Kalender', 'FINISHING-DOFF_600x600.jpg', 'Laminasi dengan efek mengkilap seperti kaca yang membantu memancarkan warna dan juga lebih mudah dibersihkan.'),
(15, 'Tidak Dilaminasi', 'Kalender', 'FINISHING-TDKLAMINASI_600x600.jpg', 'Tanpa menggunakan glossy ataupun doff sebagai finishing produk namun warna yang timbul akan terlihat lebih natural.'),
(16, 'Glossy', 'Sertifikat', 'FINISHING-DOFF_600x600.jpg', 'Laminasi dengan efek mengkilap seperti kaca yang membantu memancarkan warna dan juga lebih mudah dibersihkan.'),
(17, 'Doff', 'Sertifikat', 'FINISHING-GLOSSY_600x600.jpg', 'FINISHING-GLOSSY_600x600.jpg'),
(18, 'Glossy', 'Sertifikat', 'FINISHING-DOFF_600x600.jpg', 'Laminasi dengan efek mengkilap seperti kaca yang membantu memancarkan warna dan juga lebih mudah dibersihkan.'),
(19, 'Tidak Laminasi', 'Sertifikat', 'FINISHING-TDKLAMINASI_600x600.jpg', 'Tanpa menggunakan glossy ataupun doff sebagai finishing produk namun warna yang timbul akan terlihat lebih natural.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(30) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `jenis`, `rekening`, `nomor`, `atas_nama`) VALUES
(1, 'Transfer Bank ', 'BNI', '986785439', 'Adiograf Digital Printing'),
(2, 'Transfer Bank ', 'BRI', '115511026', 'Adiograf Digital Printing'),
(5, 'Transfer Fintech', 'Gopay', '08972626728', 'Adiograf Indonesia'),
(6, 'Transfer Fintech', 'Ovo', '08123826726', 'Adiograf Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(10) NOT NULL,
  `nama` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ukuran` text NOT NULL,
  `bahan` text NOT NULL,
  `harga` text NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_bahan` int(10) DEFAULT NULL,
  `gambar_bahan` text NOT NULL,
  `bahan_desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama`, `kategori`, `ukuran`, `bahan`, `harga`, `gambar`, `keterangan`, `id_bahan`, `gambar_bahan`, `bahan_desk`) VALUES
(1, 'Spanduk Indoor', 'Spanduk', '', 'Flexy China 280gsm (Eco Solvent)', '30000', 'spanduk indoor.jpg', 'Berbahan tebal', 1, 'bahan 1.png', 'Permukaan halus. lebih tebal, lebih baik dan lebih tahan lama dari albatros.'),
(2, 'Brosur', 'Brosur', '', '', '1000', 'brosur.jpg', '', NULL, '0', '0'),
(3, 'Flyer', 'Flyer', '', '', '1500', 'flyer.jpg', '', NULL, '0', '0'),
(4, 'Sertifikat', 'Sertifikat', '', '', '2500', 'sertifikat.jpg', '', NULL, '0', '0'),
(5, 'Kartu Nama', 'Kartu Nama', '', '', '10000', 'kartu nama.jpg', '', NULL, '0', '0'),
(6, 'Kartu Undangan', 'Kartu Undangan', '', '', '2500', 'kartu undangan.jpg', '', NULL, '0', '0'),
(7, 'Kalender Meja', 'kalender', '', '', '4000', 'kalender.jpg', '', NULL, '0', '0'),
(13, 'X-Banner', 'Spanduk', '', '', '60000', 'xbanner.jpeg', '', NULL, '', ''),
(14, 'Spanduk Outdoor', 'Spanduk', '', '', '50000', 'spanduk_outdoor.jpg', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Hak akses Administrator'),
(2, 'Customer', 'Hak akses Customer'),
(3, 'Operator Cetak', 'Hak akses Operator Cetak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sisi`
--

CREATE TABLE `tbl_sisi` (
  `id` int(10) NOT NULL,
  `jenis` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sisi`
--

INSERT INTO `tbl_sisi` (`id`, `jenis`, `produk`, `foto`, `ket`) VALUES
(1, '1 Sisi', 'Flyer', '', 'Cetak satu sisi dengan full color.'),
(2, '2 Sisi', 'Flyer', '', 'Cetak dua sisi dengan full color.'),
(3, '1 Sisi', 'Kartu Nama', '', 'Cetak desain kartu nama hanya di satu permukaan kertas.'),
(4, '2 Sisi', 'Kartu Nama', '', 'Cetak desain kartu nama bolak-balik di kedua permukaan kertas.'),
(5, '1 Sisi', 'Kartu Undangan', '', 'Desain dicetak pada satu sisi undangan.'),
(6, '2 Sisi', 'Kartu Undangan', '', 'Desain dicetak pada kedua sisi undangan.'),
(7, '2 Sisi', 'Brosur', '', 'Desain dicetak pada kedua sisi Brosur.'),
(8, '1 Sisi', 'Brosur', '', 'Desain dicetak pada kedua sisi Brosur.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tipe_sudut`
--

CREATE TABLE `tbl_tipe_sudut` (
  `id` int(11) NOT NULL,
  `sudut` text NOT NULL,
  `produk` text NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tipe_sudut`
--

INSERT INTO `tbl_tipe_sudut` (`id`, `sudut`, `produk`, `foto`, `ket`) VALUES
(1, 'Sudut Lengkung', 'Kartu Nama', 'tumpul.jpg', 'Potongan ujung kartu nama dengan sudut tumpul.'),
(2, 'Sudut Lancip', 'Kartu Nama', 'lancip.jpg', 'Potongan ujung kartu nama dengan sudut lancip.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `alamat`, `no_hp`, `email`, `username`, `password`, `id_role`) VALUES
(2, 'ainun', 'Kelapa Gading', '0895369263886', 'rafihaikal@gmail.com', 'ainun', 'ainun', '2'),
(5, 'fuadi', 'Cipondoh', '089232322', 'rafihaikal@gmail.com', 'fuadi', '123', '2'),
(7, 'operator', 'cisarua', '0896353738', 'sandi@gmail.com', 'operator', 'operator', '3'),
(13, 'stepen', 'Kelapa Gading', NULL, 'rafihaikal@gmail.com', 'stepen', '12345', '2'),
(14, 'admin 1', 'Grogol', '123456789', 'admin@admin.com', 'admin1', 'admin1', '1'),
(16, 'ayid', 'bogor', '089878898', 'ayid@gmail.com', 'ayid', '123', '2'),
(17, 'haekal', 'cikabon wetan', '0895369263886', 'rafihaikal@gmail.com', 'haekal', '1234567', '2'),
(18, 'bambang', 'bogor', '09878999', 'bambang@gmail.com', 'bambang96127', '123456', '2'),
(19, 'bambang', 'bogor', '0972727', 'bambang@gmail.com', 'bambang96274', '123456', '2'),
(20, 'Irwandi', 'jatiwaringin', '08584444', 'irwandi@gmail.com', 'irwantak', '1234567', '2'),
(21, 'irwandi', 'Grogol', '08584444', 'irwandi@gmail.com', 'irwandi', '123456', '2'),
(22, 'akmal', 'akmal', '0896353738', 'akmal@gmail.com', 'haekal_akmal', 'haekal123', '2'),
(23, 'Hikmal', 'Bogor', '0897678867', 'hikmal.akbar@gmail.com', 'hikmal.akbar', '123456', '2'),
(24, 'faisal', 'Bogor', '098756789', 'faisal@gmail.com', 'faisal', '123456', '2'),
(25, 'fasya', 'Bogor', '09856787', 'fasya21@gmail.com', 'sultan.fasya', '123456', '2'),
(26, 'Arka', 'Bogor', '08986789', 'arka@gmail.com', 'arka23', '123456', '2'),
(27, 'Ika Sari', 'Jakarta Selatan', '098567889', 'ika.sari@gmail.com', 'ika.sari', '123456', '2'),
(28, 'zainab', 'jakarta timur', '085676579', 'zainab99@gmail.com', 'zainab99', '123456', '2'),
(29, 'giovandy', 'jakarta timur', '081232212', 'giovandy@gmail.com', 'giovandy', '123456', '2'),
(30, 'sandi', 'Jakarta Barat', '089867789', 'sandi@gmail.com', 'sandi aul', '123456', '2'),
(31, 'amanda', 'cimanggis', '08967578', 'amanda21@gmail.com', 'amanda21', '123456', '2'),
(32, 'sherina', 'cimanggis', '08986578909', 'sherina23@gmail.com', 'sherina23', '123456', '2'),
(33, 'mawar', 'cimanggis', '081210041263', 'mawar23@gmail.com', 'mawar23', '123456', '2'),
(34, 'fattah', 'cikande', '081210041263', 'fattah@gmail.com', 'fattah99', '123456', '2'),
(35, 'melenia', 'Pondok Indah', '0898678045', 'meleniawinda@gmail.com', 'meleniawinda', '123456', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_produk`
--

CREATE TABLE `ukuran_produk` (
  `id` int(11) NOT NULL,
  `ukuran` text NOT NULL,
  `produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran_produk`
--

INSERT INTO `ukuran_produk` (`id`, `ukuran`, `produk`) VALUES
(1, '1 m x 1 m', 'Spanduk'),
(2, '2 m x 1 m', 'Spanduk'),
(3, '3 m x 1 m', 'Spanduk'),
(4, '4 m x 1 m', 'Spanduk'),
(5, '5 m x 1 m', 'Spanduk'),
(7, 'A4 (21 x 29,7 cm)', 'Brosur'),
(9, 'A4 (21 x 29,7 cm)', 'Flyer'),
(10, 'A5 (14,8 x 21 cm)', 'Flyer'),
(11, '50 x 70 cm', 'Tripod Banner'),
(12, '60 x 80 cm', 'Tripod Banner'),
(13, '60 x 90 cm', 'Tripod Banner'),
(14, '9,0 x 5,5 cm', 'Kartu Nama'),
(15, 'A5 (21 x 14,8 cm)', 'Kartu Undangan'),
(16, 'A6 (14,8 x 10,5 cm)', 'Kartu Undangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_nama` varchar(255) DEFAULT NULL,
  `pengguna_nomor_hp` varchar(20) DEFAULT NULL,
  `pengguna_email` varchar(255) DEFAULT NULL,
  `pengguna_level` enum('administrator','pemesan') NOT NULL,
  `pengguna_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_nama`, `pengguna_nomor_hp`, `pengguna_email`, `pengguna_level`, `pengguna_date_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, 'administrator', '2019-07-18 16:35:32'),
(2, 'pemesan', 'd58910536eed6faa657ba7dbc012534c', 'Randi', '081234567890', 'pemesan@gmail.com', 'pemesan', '2019-07-24 11:05:24'),
(3, 'testing', '7f2ababa423061c509f4923dd04b6cf1', 'nama test', '1234567', 'testing@gmail.com', 'pemesan', '2019-08-11 23:10:40'),
(4, 'haekal', '827ccb0eea8a706c4c34a16891f84e7b', 'Haekal', '09889098', 'rafihaikal@gmail.com', 'pemesan', '2021-04-30 09:29:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `finishing_laminasi`
--
ALTER TABLE `finishing_laminasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `finishing_produk`
--
ALTER TABLE `finishing_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan_brosur`
--
ALTER TABLE `pesan_brosur`
  ADD PRIMARY KEY (`brosur_id`),
  ADD KEY `kartu_keranjang_id` (`brosur_keranjang_id`);

--
-- Indeks untuk tabel `pesan_flyer`
--
ALTER TABLE `pesan_flyer`
  ADD PRIMARY KEY (`flyer_id`),
  ADD KEY `kartu_keranjang_id` (`flyer_keranjang_id`);

--
-- Indeks untuk tabel `pesan_kalender`
--
ALTER TABLE `pesan_kalender`
  ADD PRIMARY KEY (`kalender_id`),
  ADD KEY `kartu_keranjang_id` (`kalender_keranjang_id`);

--
-- Indeks untuk tabel `pesan_kartu_nama`
--
ALTER TABLE `pesan_kartu_nama`
  ADD PRIMARY KEY (`kartu_nama_id`),
  ADD KEY `kartu_keranjang_id` (`kartu_nama_keranjang_id`);

--
-- Indeks untuk tabel `pesan_kartu_undangan`
--
ALTER TABLE `pesan_kartu_undangan`
  ADD PRIMARY KEY (`undangan_id`),
  ADD KEY `kartu_keranjang_id` (`undangan_keranjang_id`);

--
-- Indeks untuk tabel `pesan_sertifikat`
--
ALTER TABLE `pesan_sertifikat`
  ADD PRIMARY KEY (`sertifikat_id`),
  ADD KEY `kartu_keranjang_id` (`sertifikat_keranjang_id`);

--
-- Indeks untuk tabel `pesan_spanduk_indoor`
--
ALTER TABLE `pesan_spanduk_indoor`
  ADD PRIMARY KEY (`spanduk_id`),
  ADD KEY `spanduk_keranjang_id` (`spanduk_keranjang_id`);

--
-- Indeks untuk tabel `pesan_spanduk_outdoor`
--
ALTER TABLE `pesan_spanduk_outdoor`
  ADD PRIMARY KEY (`spanduk_outdoor_id`),
  ADD KEY `brosur_keranjang_id` (`spanduk_outdoor_keranjang_id`);

--
-- Indeks untuk tabel `pesan_xbanner`
--
ALTER TABLE `pesan_xbanner`
  ADD PRIMARY KEY (`xbanner_id`),
  ADD KEY `stiker_keranjang_id` (`xbanner_keranjang_id`);

--
-- Indeks untuk tabel `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_faktur`
--
ALTER TABLE `tbl_faktur`
  ADD PRIMARY KEY (`faktur_id`),
  ADD KEY `faktur_keranjang_id` (`faktur_keranjang_id`);

--
-- Indeks untuk tabel `tbl_finishing`
--
ALTER TABLE `tbl_finishing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_harga_bahan`
--
ALTER TABLE `tbl_harga_bahan`
  ADD PRIMARY KEY (`id_hrg_bahan`);

--
-- Indeks untuk tabel `tbl_harga_laminasi`
--
ALTER TABLE `tbl_harga_laminasi`
  ADD PRIMARY KEY (`id_hrg_laminasi`);

--
-- Indeks untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`keranjang_id`),
  ADD KEY `keranjang_pengguna_id` (`keranjang_pengguna_id`);

--
-- Indeks untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `konfirmasi_faktur_id` (`konfirmasi_faktur_id`);

--
-- Indeks untuk tabel `tbl_laminasi`
--
ALTER TABLE `tbl_laminasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sisi`
--
ALTER TABLE `tbl_sisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tipe_sudut`
--
ALTER TABLE `tbl_tipe_sudut`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `finishing_laminasi`
--
ALTER TABLE `finishing_laminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `finishing_produk`
--
ALTER TABLE `finishing_produk`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_finishing`
--
ALTER TABLE `tbl_finishing`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_harga_bahan`
--
ALTER TABLE `tbl_harga_bahan`
  MODIFY `id_hrg_bahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tbl_harga_laminasi`
--
ALTER TABLE `tbl_harga_laminasi`
  MODIFY `id_hrg_laminasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_laminasi`
--
ALTER TABLE `tbl_laminasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_sisi`
--
ALTER TABLE `tbl_sisi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_tipe_sudut`
--
ALTER TABLE `tbl_tipe_sudut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ukuran_produk`
--
ALTER TABLE `ukuran_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `tbl_bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

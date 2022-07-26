-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 06:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dropdown`
--

CREATE TABLE `dropdown` (
  `id_dropdown` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `panel_tujuan` varchar(12) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropdown`
--

INSERT INTO `dropdown` (`id_dropdown`, `id_kuisioner`, `id_panel`, `pertanyaan`, `opsi`, `panel_tujuan`, `tanggal_post`) VALUES
(117, '66', '34', NULL, '1 BULAN', '', '2021-01-31 20:47:39'),
(118, '66', '34', NULL, '2 BULAN', '', '2021-01-31 20:47:39'),
(119, '66', '34', NULL, '3 BULAN', '', '2021-01-31 20:47:39'),
(120, '66', '34', NULL, '4 BULAN', '', '2021-01-31 20:47:39'),
(121, '66', '34', NULL, 'Lainnya', '', '2021-01-31 20:47:39'),
(126, '66', '36', NULL, 'a', '', '2022-03-30 19:12:40'),
(127, '66', '36', NULL, 'b', '', '2022-03-30 19:12:40'),
(128, '66', '36', NULL, 'c', '', '2022-03-30 19:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `essai`
--

CREATE TABLE `essai` (
  `id_essai` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jumlah_karakter` varchar(12) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(12) NOT NULL,
  `nama_fakultas` text DEFAULT NULL,
  `kode_fakultas` varchar(225) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `kode_fakultas`, `tanggal_post`) VALUES
(2, 'Fakultas Ilmu Komputer', 'KOM001', '2020-10-13 10:35:53'),
(3, 'MIPA', 'MIPA001', '2020-10-13 21:29:24'),
(4, 'FISIP', 'FIS004', '2020-10-14 18:46:05'),
(5, 'FAKULTAS SASTRA', 'STS001', '2020-11-13 13:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `home_kuisioner`
--

CREATE TABLE `home_kuisioner` (
  `id_home_kuisioner` int(12) NOT NULL,
  `nama_kuisioner` text DEFAULT NULL,
  `judul_kuisioner` text DEFAULT NULL,
  `deskripsi_kuisioner` text DEFAULT NULL,
  `logo_kuisioner` text DEFAULT NULL,
  `logo_kuisioner_thumb` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_kuisioner`
--

INSERT INTO `home_kuisioner` (`id_home_kuisioner`, `nama_kuisioner`, `judul_kuisioner`, `deskripsi_kuisioner`, `logo_kuisioner`, `logo_kuisioner_thumb`, `tanggal_post`) VALUES
(1, 'Tracer Study Alumni S-1 Program Studi Bahasa dan Sastra Arab', 'Tracer Study Alumni S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora UIN Maulana Malik Ibrahim Malang ', '<b>Yang Terhormat.<br></b><br>Para Alumni  S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora UIN Maulana Malik Ibrahim Malang Tahun Lulus 2018.<br><br>Assalamu’alaikum Warahmatullahi Wabarakatuh<br><br>Salam hormat bagi seluruh alumni S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora Universitas Islam Negeri (UIN) Maulana Malik Ibrahim Malang. Semoga kita semua senantiasa mendapatkan nikmat dan hidayah Allah SWT. Shalawat dan salam semoga terus terlimpahkan kepada Nabi Muhammad SAW. dan kita semua kelak akan mendapatkan syafaat beliau di hari akhir. Amin.<br><br>Perkembangan dan kemajuan sebuah perguruan tinggi tidak terlepas dari keberadaan dan dukungan alumninya. Peran dan kontribusi alumni menjadi salah satu faktor penting dalam mengembangkan perguruan tinggi. Oleh karena itu, kami terus berusaha untuk menjalin komunikasi dengan alumni melalui berbagai media, termasuk pelacakan alumni (tracer study). Informasi isian dalam tracer study ini akan sangat bermanfaat bagi program studi dan fakultas dalam rangka mengevaluasi, memperbaiki, dan meningkatkan kualitas baik akademik maupun non akademik. Selain itu, hasil tracer study juga sangat berguna untuk pengisian borang dalam rangka akreditasi program studi dan perguruan tinggi.<br><br>Kami sangat berharap kesediaan para alumni S.1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora Universitas Islam Negeri (UIN) Maulana Malik Ibrahim Malang yang lulus pada tahun 2018 untuk meluangkan waktu guna mengisi kuesioner tracer study dengan sebenar-benarnya. Pengisian kuesioner dapat dilakukan tanggal 13-30 Oktober 2020. <br><br>Wassalamu’alaikum Warahmatullahi Wabarakatuh<br><br><b>Ttd</b><br><b>Dekan</b><br><br><b>Dr. Hj. Syafiyah, M.A.</b>', 'uploads/icon/1d7014b93a33189a749af917f130fab8.png', 'uploads/icon/thumbs/1d7014b93a33189a749af917f130fab8.png', '2020-10-14 20:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kisi_jamak`
--

CREATE TABLE `jawaban_kisi_jamak` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kisi_tunggal`
--

CREATE TABLE `jawaban_kisi_tunggal` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_dropdown`
--

CREATE TABLE `jawaban_pilihan_dropdown` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `opsi_lainnya` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pilihan_dropdown`
--

INSERT INTO `jawaban_pilihan_dropdown` (`id_jawaban`, `id_mahasiswa`, `id_kuisioner`, `id_panel`, `pertanyaan`, `jawaban`, `opsi_lainnya`, `tanggal_post`) VALUES
(7, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', 'lainnya', 'kk', '2021-01-31 20:22:25'),
(8, '12', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '4 bulan', '', '2021-02-08 13:18:31'),
(9, '13', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '4 bulan', '', '2021-02-08 13:23:15'),
(10, '13', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-02-08 13:23:43'),
(11, '13', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '3 bulan', '', '2021-02-08 13:24:40'),
(12, '13', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-02-08 13:24:46'),
(13, '17', '66', '36', 'pertanyaan coba ?', 'a', '', '2021-03-17 07:18:11'),
(14, '17', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-03-17 07:20:49'),
(15, '18', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '2 bulan', '', '2021-03-17 07:28:41'),
(16, '18', '66', '36', 'pertanyaan coba ?', 'lainnya', '12', '2021-03-17 07:28:51'),
(17, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '3 bulan', '', '2021-08-12 21:07:06'),
(18, '16', '66', '36', 'pertanyaan coba ?', 'b', '', '2021-08-12 21:07:18'),
(19, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '1 bulan', '', '2021-08-12 21:53:23'),
(20, '16', '66', '36', 'pertanyaan coba ?', 'b', '', '2021-08-12 21:53:41'),
(21, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '2 bulan', '', '2021-08-12 21:54:37'),
(22, '16', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-08-12 21:54:43'),
(23, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '2 bulan', '', '2021-08-12 22:06:27'),
(24, '16', '66', '36', 'pertanyaan coba ?', 'b', '', '2021-08-12 22:06:33'),
(25, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '1 bulan', '', '2021-08-12 22:14:10'),
(26, '16', '66', '36', 'pertanyaan coba ?', 'b', '', '2021-08-12 22:14:15'),
(27, '16', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-08-12 22:17:02'),
(28, '16', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '1 bulan', '', '2021-08-12 22:18:05'),
(29, '16', '66', '36', 'pertanyaan coba ?', 'b', '', '2021-08-12 22:18:09'),
(30, '18', '66', '34', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', '2 bulan', '', '2021-08-12 22:32:01'),
(31, '18', '66', '36', 'pertanyaan coba ?', 'c', '', '2021-08-12 22:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_essai`
--

CREATE TABLE `jawaban_pilihan_essai` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_jamak`
--

CREATE TABLE `jawaban_pilihan_jamak` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `opsi_lainnya` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pilihan_jamak`
--

INSERT INTO `jawaban_pilihan_jamak` (`id_jawaban`, `id_mahasiswa`, `id_kuisioner`, `id_panel`, `pertanyaan`, `jawaban`, `opsi_lainnya`, `tanggal_post`) VALUES
(9, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'lainnya', 'hj', '2021-01-31 20:22:20'),
(10, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'dihubungi oleh perusahaan', '', '2021-02-08 19:27:35'),
(11, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'pergi ke bursa/pameran kerja,memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas', '', '2021-08-12 21:53:20'),
(12, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'menghubungi kemenakertrans,menghubungi agen tenaga kerja komersial/swasta', '', '2021-08-12 22:06:25'),
(13, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'dihubungi oleh perusahaan', '', '2021-08-12 22:14:08'),
(14, '16', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'pergi ke bursa/pameran kerja', '', '2021-08-12 22:18:02'),
(15, '18', '66', '33', 'Bagaimana anda mencari pekerjaan tersebut?', 'dihubungi oleh perusahaan', '', '2021-08-12 22:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_singkat`
--

CREATE TABLE `jawaban_pilihan_singkat` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pilihan_singkat`
--

INSERT INTO `jawaban_pilihan_singkat` (`id_jawaban`, `id_mahasiswa`, `id_kuisioner`, `id_panel`, `pertanyaan`, `jawaban`, `tanggal_post`) VALUES
(7, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '4', '2021-01-31 20:23:20'),
(8, '13', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '2', '2021-01-31 20:52:11'),
(9, '13', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '4', '2021-02-08 13:23:32'),
(10, '13', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '2', '2021-02-08 13:24:43'),
(11, '17', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '2', '2021-03-17 07:18:07'),
(12, '17', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-03-17 07:20:46'),
(13, '18', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-03-17 07:28:45'),
(14, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '2', '2021-08-12 21:07:12'),
(15, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '4', '2021-08-12 21:53:38'),
(16, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-08-12 21:54:41'),
(17, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-08-12 22:06:30'),
(18, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-08-12 22:14:13'),
(19, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-08-12 22:16:59'),
(20, '16', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '3', '2021-08-12 22:18:07'),
(21, '18', '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', '6', '2021-08-12 22:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_skala`
--

CREATE TABLE `jawaban_pilihan_skala` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_tunggal`
--

CREATE TABLE `jawaban_pilihan_tunggal` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `opsi_lainnya` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pilihan_tunggal`
--

INSERT INTO `jawaban_pilihan_tunggal` (`id_jawaban`, `id_mahasiswa`, `id_kuisioner`, `id_panel`, `pertanyaan`, `jawaban`, `opsi_lainnya`, `tanggal_post`) VALUES
(14, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', 'lainnya', 'as', '2021-01-31 20:21:57'),
(15, '13', '66', '32', 'Kapan anda mulai mencari pekerjaan?', 'lainnya', '23', '2021-01-31 20:52:06'),
(16, '12', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-02-08 13:11:57'),
(17, '12', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-02-08 13:18:25'),
(18, '13', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-02-08 13:23:12'),
(19, '13', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-02-08 13:24:38'),
(20, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-02-08 19:27:31'),
(21, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-02-08 19:47:27'),
(22, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-02-08 19:58:07'),
(23, '17', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '1 bulan', '', '2021-03-17 07:17:42'),
(24, '17', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '1 bulan', '', '2021-03-17 07:20:32'),
(25, '18', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-03-17 07:28:29'),
(26, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-08-12 21:52:03'),
(27, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '3 bulan', '', '2021-08-12 21:54:35'),
(28, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-08-12 22:06:10'),
(29, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-08-12 22:13:59'),
(30, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '1 bulan', '', '2021-08-12 22:16:57'),
(31, '16', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-08-12 22:17:59'),
(32, '18', '66', '32', 'Kapan anda mulai mencari pekerjaan?', '2 bulan', '', '2021-08-12 22:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_upload`
--

CREATE TABLE `jawaban_pilihan_upload` (
  `id_jawaban` int(12) NOT NULL,
  `id_mahasiswa` varchar(12) DEFAULT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_singkat`
--

CREATE TABLE `jawaban_singkat` (
  `id_jawaban_singkat` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `tipe_pertanyaan` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_singkat`
--

INSERT INTO `jawaban_singkat` (`id_jawaban_singkat`, `id_kuisioner`, `id_panel`, `pertanyaan`, `tipe_pertanyaan`, `tanggal_post`) VALUES
(4, '66', '35', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', 'number', '2021-01-30 20:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `kisi_jamak`
--

CREATE TABLE `kisi_jamak` (
  `id_kisi_jamak` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `opsi_baris` text DEFAULT NULL,
  `opsi_kolom` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kisi_tunggal`
--

CREATE TABLE `kisi_tunggal` (
  `id_kisi_tunggal` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `opsi_baris` text DEFAULT NULL,
  `opsi_kolom` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(12) NOT NULL,
  `id_admin` varchar(12) DEFAULT NULL,
  `nama_kuisioner` text DEFAULT NULL,
  `deskripsi_kuisioner` text DEFAULT NULL,
  `tipe_kuisioner` varchar(12) DEFAULT NULL,
  `status_kuisioner` varchar(12) NOT NULL DEFAULT '0',
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `id_admin`, `nama_kuisioner`, `deskripsi_kuisioner`, `tipe_kuisioner`, `status_kuisioner`, `tanggal_post`) VALUES
(66, '1', 'FORM TRACER STUDY DIKTI UIN', 'TRACER STUDY ALUMNI S-1 PROGRAM STUDI BAHASA DAN SASTRA ARAB FAKULTAS HUMANIORA UIN MAULANA MALIK IBRAHIM MALANG', '2', '1', '2021-01-30 20:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(12) NOT NULL,
  `id_fakultas_mhs` varchar(12) DEFAULT NULL,
  `id_prodi_mhs` varchar(12) DEFAULT NULL,
  `subjek_laporan` text DEFAULT NULL,
  `nama_mhs` text DEFAULT NULL,
  `nim_mhs` varchar(225) DEFAULT NULL,
  `email_mhs` text DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_fakultas_mhs`, `id_prodi_mhs`, `subjek_laporan`, `nama_mhs`, `nim_mhs`, `email_mhs`, `isi_laporan`, `tanggal_post`) VALUES
(1, '2', '3', 'Kesalahan Biodata', 'test', '12345', 'test@gmail.com', 'asa', '2020-10-16 16:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `login_kuisioner`
--

CREATE TABLE `login_kuisioner` (
  `id_login_kuisioner` int(12) NOT NULL,
  `nama_login` text DEFAULT NULL,
  `foto_background` text DEFAULT NULL,
  `logo_login` text DEFAULT NULL,
  `gambar_nama_login` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_kuisioner`
--

INSERT INTO `login_kuisioner` (`id_login_kuisioner`, `nama_login`, `foto_background`, `logo_login`, `gambar_nama_login`, `tanggal_post`) VALUES
(1, 'HALAMAN LOGIN SITS-A', 'uploads/icon/4d8a95b20735316a5ad653eee9b324fd.png', 'uploads/icon/673e8dff33cb95296e14766b4d760cca.png', 'uploads/icon/b1f58407d430876e290919f1b76de12a.png', '2020-10-14 21:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(12) NOT NULL,
  `id_admin` varchar(12) DEFAULT NULL,
  `nim_mhs` text DEFAULT NULL,
  `password_mhs` text DEFAULT NULL,
  `nama_mhs` text DEFAULT NULL,
  `nomor_ijazah_mhs` varchar(225) DEFAULT NULL,
  `email_mhs` text DEFAULT NULL,
  `nomor_hp_mhs` text DEFAULT NULL,
  `id_fakultas_mhs` varchar(12) DEFAULT NULL,
  `id_prodi_mhs` varchar(12) DEFAULT NULL,
  `tahun_lulus_mhs` text DEFAULT NULL,
  `tahun_masuk_mhs` text DEFAULT NULL,
  `status_isian_kuisioner` varchar(10) DEFAULT '0',
  `log_isian_kuisioner` varchar(10) NOT NULL DEFAULT '0',
  `tanggal_kirim_email` text NOT NULL DEFAULT '00/00/0000',
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `id_admin`, `nim_mhs`, `password_mhs`, `nama_mhs`, `nomor_ijazah_mhs`, `email_mhs`, `nomor_hp_mhs`, `id_fakultas_mhs`, `id_prodi_mhs`, `tahun_lulus_mhs`, `tahun_masuk_mhs`, `status_isian_kuisioner`, `log_isian_kuisioner`, `tanggal_kirim_email`, `tanggal_post`) VALUES
(12, '23', '13110049', '12345', 'DITA PRAYOGA', '20232084', 'fatonianggris@gmail.com', '089726863', '2', '3', '2020', '2010', '1', 'start', '03/11/2020', '2020-11-02 22:47:23'),
(13, '56', '13110043', '12345', 'MARCO POLO', '122324', 'fatonianggris@gmail.com', '0895367047789', '5', '6', '2009', '2007', '2', 'finish', '13/11/2020', '2020-11-13 06:35:28'),
(16, '23', '12345', '12345', 'MHS COBA', '12345', '12345@gmail.com', '0795854788', '2', '3', '2020', '2019', '2', 'finish', '00/00/0000', '2021-01-21 18:12:15'),
(17, '23', '123', '12345', 'coba1', '12345', 'coba@gmail.com', '083432323', '2', '3', '2021', '2019', '1', 'finish', '00/00/0000', '2021-03-17 00:16:38'),
(18, '24', '1234', '12345', 'coba2', '1234', 'cab2@gmail.com', '082932323', '2', '4', '2021', '2019', '2', 'finish', '00/00/0000', '2021-03-17 00:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_config`
--

CREATE TABLE `mailer_config` (
  `id_mailer` int(10) NOT NULL,
  `nama_pengirim` text NOT NULL,
  `subjek_email` text NOT NULL,
  `judul_email` text DEFAULT NULL,
  `keterangan_email` text NOT NULL,
  `host` text NOT NULL,
  `email_website` text NOT NULL,
  `password` text NOT NULL,
  `port` text NOT NULL,
  `smtp_auth` text NOT NULL,
  `smtp_secure` text NOT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailer_config`
--

INSERT INTO `mailer_config` (`id_mailer`, `nama_pengirim`, `subjek_email`, `judul_email`, `keterangan_email`, `host`, `email_website`, `password`, `port`, `smtp_auth`, `smtp_secure`, `tanggal_post`) VALUES
(1, 'UIN MALIKI MALANG', 'PENGISIAN TRACER STUDY', 'Tracer Study Alumni S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora UIN Maulana Malik Ibrahim Malang', 'Kami sangat berharap kesediaan para alumni S.1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora Universitas Islam Negeri (UIN) Maulana Malik Ibrahim Malang yang lulus untuk meluangkan waktu guna mengisi kuesioner tracer study dengan sebenar-benarnya', 'smtp.gmail.com', 'anonixmous@gmail.com', 'doweparty00', '465', 'true', 'ssl', '2020-06-02 19:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id_panel` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_unique` varchar(225) DEFAULT NULL,
  `status_required_panel` varchar(12) DEFAULT NULL,
  `tipe_panel` varchar(12) DEFAULT NULL,
  `status_jawaban_panel` varchar(12) DEFAULT NULL,
  `nama_panel` text DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `path_img` text DEFAULT NULL,
  `panel_tujuan` varchar(12) DEFAULT NULL,
  `start_panel` varchar(12) NOT NULL DEFAULT '0',
  `opsi_lainnya` varchar(12) NOT NULL DEFAULT '0',
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id_panel`, `id_kuisioner`, `id_unique`, `status_required_panel`, `tipe_panel`, `status_jawaban_panel`, `nama_panel`, `pertanyaan`, `path_img`, `panel_tujuan`, `start_panel`, `opsi_lainnya`, `tanggal_post`) VALUES
(32, '66', 'rnV20Cu53t1FDiJSwqzZj6yXv', 'required', '2', '1', 'PERTANYAAN F3', 'Kapan anda mulai mencari pekerjaan?', NULL, '', '1', '1', '2021-01-30 20:41:00'),
(33, '66', 'leqjtkEGyUJ4SXRirIH9M2LD5', 'required', '3', '0', 'PERTANYAAN F4', 'Bagaimana anda mencari pekerjaan tersebut?', NULL, '34', '0', '1', '2021-01-30 20:42:37'),
(34, '66', 'W9fwhYSeriTs164lLU0IaHRZX', 'required', '4', '0', 'PERTANYAAN F5', 'Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?', NULL, '35', '0', '1', '2021-01-30 20:45:18'),
(35, '66', 'RvwbqEoXVkaNlHrLcyGTpQfM4', 'required', '9', '0', 'PERTANYAAN F6', 'Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?', NULL, '36', '0', '0', '2021-01-30 20:47:38'),
(36, '66', 'kIYcu9i6mPDCAdtGqx7eKfa3v', '', '4', '0', 'PERTANYAAN F7', 'pertanyaan coba ?', NULL, '35', '0', '0', '2021-02-08 12:53:35'),
(37, '66', '6T5CMRhyxEwUk31mQPDdb2jfa', 'required', '2', '0', 'Nama Panel Belum Diisi', 'Pertanyaan Belum Diisi', NULL, NULL, '0', '0', '2022-05-18 20:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jamak`
--

CREATE TABLE `pilihan_jamak` (
  `id_pilihan_jamak` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `panel_tujuan` varchar(12) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan_jamak`
--

INSERT INTO `pilihan_jamak` (`id_pilihan_jamak`, `id_kuisioner`, `id_panel`, `pertanyaan`, `opsi`, `panel_tujuan`, `tanggal_post`) VALUES
(252, '66', '33', NULL, 'Melalui iklan di koran/majalah, brosur', NULL, '2021-02-08 12:59:51'),
(253, '66', '33', NULL, 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada', NULL, '2021-02-08 12:59:51'),
(254, '66', '33', NULL, 'Pergi ke bursa/pameran kerja', NULL, '2021-02-08 12:59:51'),
(255, '66', '33', NULL, 'Mencari lewat internet/iklan online/milis ', NULL, '2021-02-08 12:59:51'),
(256, '66', '33', NULL, 'Dihubungi oleh perusahaan', NULL, '2021-02-08 12:59:51'),
(257, '66', '33', NULL, 'Menghubungi Kemenakertrans', NULL, '2021-02-08 12:59:51'),
(258, '66', '33', NULL, 'Menghubungi agen tenaga kerja komersial/swasta', NULL, '2021-02-08 12:59:51'),
(259, '66', '33', NULL, 'Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas', NULL, '2021-02-08 12:59:51'),
(260, '66', '33', NULL, 'Menghubungi kantor kemahasiswaan/hubungan alumni', NULL, '2021-02-08 12:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_tunggal`
--

CREATE TABLE `pilihan_tunggal` (
  `id_pilihan_tunggal` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `panel_tujuan` varchar(12) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan_tunggal`
--

INSERT INTO `pilihan_tunggal` (`id_pilihan_tunggal`, `id_kuisioner`, `id_panel`, `pertanyaan`, `opsi`, `panel_tujuan`, `tanggal_post`) VALUES
(112, '66', '32', NULL, '1 BULAN', '35', '2021-01-31 20:50:03'),
(113, '66', '32', NULL, '2 BULAN', '33', '2021-01-31 20:50:03'),
(114, '66', '32', NULL, '3 BULAN', '34', '2021-01-31 20:50:03'),
(115, '66', '32', NULL, 'Lainnya', '35', '2021-01-31 20:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(12) NOT NULL,
  `id_fakultas` varchar(12) DEFAULT NULL,
  `nama_prodi` text DEFAULT NULL,
  `kode_prodi` varchar(225) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`, `kode_prodi`, `tanggal_post`) VALUES
(3, '2', 'teknik informatika', 'TK009', '2020-10-13 10:59:01'),
(4, '2', 'teknik komputer', 'tk003', '2020-10-13 11:54:49'),
(5, '3', 'FISIKA', 'FSK006', '2020-10-14 18:46:38'),
(6, '5', 'BAHASA INGGRIS', 'BING001', '2020-11-13 13:16:33'),
(7, '5', 'BAHASA ARAB', 'ARB001', '2020-11-16 13:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(12) NOT NULL,
  `nim_mhs` varchar(225) DEFAULT NULL,
  `nama_mhs` text DEFAULT NULL,
  `id_mhs` varchar(12) DEFAULT NULL,
  `id_fakultas_mhs` varchar(12) DEFAULT NULL,
  `id_prodi_mhs` varchar(12) DEFAULT NULL,
  `isi_saran` text DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nim_mhs`, `nama_mhs`, `id_mhs`, `id_fakultas_mhs`, `id_prodi_mhs`, `isi_saran`, `tanggal_post`) VALUES
(2, '65432', 'YUDA PRAKOSO', NULL, '3', '5', 'asas', '2020-10-22 14:35:27'),
(3, '13110043', 'MARCO POLO', NULL, '5', '6', 'kampus nya bagus', '2020-11-13 13:53:02'),
(5, '13110049', 'DITA PRAYOGA', NULL, '2', '3', 'kampus impian', '2021-01-22 01:14:12'),
(10, '13110043', 'MARCO POLO', NULL, '5', '6', 'test', '2021-02-08 13:24:54'),
(11, '123', 'COBA1', NULL, '2', '3', '232323', '2021-03-17 07:18:16'),
(12, '123', 'COBA1', NULL, '2', '3', '23', '2021-03-17 07:21:04'),
(13, '1234', 'COBA2', NULL, '2', '4', '12', '2021-03-17 07:29:08'),
(14, '12345', 'MHS COBA', NULL, '2', '3', 'wewe', '2021-08-12 21:07:30'),
(15, '12345', 'MHS COBA', NULL, '2', '3', 'hehe', '2021-08-12 21:53:47'),
(16, '12345', 'MHS COBA', NULL, '2', '3', '3232', '2021-08-12 21:54:47'),
(17, '12345', 'MHS COBA', NULL, '2', '3', 'hehe', '2021-08-12 22:06:39'),
(18, '12345', 'MHS COBA', NULL, '2', '3', 'aas', '2021-08-12 22:14:18'),
(19, '12345', 'MHS COBA', NULL, '2', '3', 'hehe', '2021-08-12 22:31:19'),
(20, '1234', 'COBA2', NULL, '2', '4', 'ok', '2021-08-12 22:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `skala`
--

CREATE TABLE `skala` (
  `id_skala` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `nama_rentang_awal` text DEFAULT NULL,
  `nama_rentang_akhir` text DEFAULT NULL,
  `ukuran_rentang` varchar(12) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(12) NOT NULL,
  `id_kuisioner` varchar(12) DEFAULT NULL,
  `id_panel` varchar(12) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `ukuran_file` varchar(12) DEFAULT NULL,
  `format_file` text DEFAULT NULL,
  `tanggal_post` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `id_ref` varchar(12) DEFAULT NULL,
  `role_akun` varchar(12) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_akun` text DEFAULT NULL,
  `email_akun` text DEFAULT NULL,
  `no_telepon_akun` text DEFAULT NULL,
  `foto_akun` text DEFAULT NULL,
  `foto_akun_thumb` text DEFAULT NULL,
  `status_akun` varchar(12) NOT NULL DEFAULT '1',
  `tanggal_post` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_ref`, `role_akun`, `username`, `password`, `nama_akun`, `email_akun`, `no_telepon_akun`, `foto_akun`, `foto_akun_thumb`, `status_akun`, `tanggal_post`) VALUES
(2, '1', '0', 'abangshop', '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN', 'admin@gmail.com', '081242347115', 'uploads/user/1ef5e26aafe718050447516f01268927.jpg', 'uploads/user/thumbs/1ef5e26aafe718050447516f01268927.jpg', '1', '2019-09-29 23:16:51'),
(4, '23', '2', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN PRODI', 'prodi@gmail.com', '08923632942', 'uploads/user/3.PNG', 'uploads/user/thumbs/3.PNG', '1', '2020-10-14 06:13:34'),
(5, '2', '1', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN FAKULTAS', 'fakultas@gmail.com', '0892372923', 'uploads/user/a9db1ec3e16a574697734a1e10bdf752.jpg', 'uploads/user/thumbs/a9db1ec3e16a574697734a1e10bdf752.jpg', '1', '2020-10-14 06:15:14'),
(6, '5', '1', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN FAKULTAS SASTRA', 'sastra@gmail.com', '089649464875', 'uploads/user/e1347c11f0904ae729ee2e099725027b.png', 'uploads/user/thumbs/e1347c11f0904ae729ee2e099725027b.png', '1', '2020-11-13 13:18:24'),
(7, '56', '2', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'PRODI BAHASA INGGRIS', 'bhsinggris@gmail.com', '087282638262', 'uploads/user/ea5d264adf7ce35cedad8a1e7216d32f.png', 'uploads/user/thumbs/ea5d264adf7ce35cedad8a1e7216d32f.png', '1', '2020-11-13 13:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dropdown`
--
ALTER TABLE `dropdown`
  ADD PRIMARY KEY (`id_dropdown`);

--
-- Indexes for table `essai`
--
ALTER TABLE `essai`
  ADD PRIMARY KEY (`id_essai`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `home_kuisioner`
--
ALTER TABLE `home_kuisioner`
  ADD PRIMARY KEY (`id_home_kuisioner`);

--
-- Indexes for table `jawaban_kisi_jamak`
--
ALTER TABLE `jawaban_kisi_jamak`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_kisi_tunggal`
--
ALTER TABLE `jawaban_kisi_tunggal`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_dropdown`
--
ALTER TABLE `jawaban_pilihan_dropdown`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_essai`
--
ALTER TABLE `jawaban_pilihan_essai`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_jamak`
--
ALTER TABLE `jawaban_pilihan_jamak`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_singkat`
--
ALTER TABLE `jawaban_pilihan_singkat`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_skala`
--
ALTER TABLE `jawaban_pilihan_skala`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_tunggal`
--
ALTER TABLE `jawaban_pilihan_tunggal`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_pilihan_upload`
--
ALTER TABLE `jawaban_pilihan_upload`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `jawaban_singkat`
--
ALTER TABLE `jawaban_singkat`
  ADD PRIMARY KEY (`id_jawaban_singkat`);

--
-- Indexes for table `kisi_jamak`
--
ALTER TABLE `kisi_jamak`
  ADD PRIMARY KEY (`id_kisi_jamak`);

--
-- Indexes for table `kisi_tunggal`
--
ALTER TABLE `kisi_tunggal`
  ADD PRIMARY KEY (`id_kisi_tunggal`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `login_kuisioner`
--
ALTER TABLE `login_kuisioner`
  ADD PRIMARY KEY (`id_login_kuisioner`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `mailer_config`
--
ALTER TABLE `mailer_config`
  ADD PRIMARY KEY (`id_mailer`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id_panel`);

--
-- Indexes for table `pilihan_jamak`
--
ALTER TABLE `pilihan_jamak`
  ADD PRIMARY KEY (`id_pilihan_jamak`);

--
-- Indexes for table `pilihan_tunggal`
--
ALTER TABLE `pilihan_tunggal`
  ADD PRIMARY KEY (`id_pilihan_tunggal`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `skala`
--
ALTER TABLE `skala`
  ADD PRIMARY KEY (`id_skala`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dropdown`
--
ALTER TABLE `dropdown`
  MODIFY `id_dropdown` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `essai`
--
ALTER TABLE `essai`
  MODIFY `id_essai` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_kuisioner`
--
ALTER TABLE `home_kuisioner`
  MODIFY `id_home_kuisioner` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban_kisi_jamak`
--
ALTER TABLE `jawaban_kisi_jamak`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jawaban_kisi_tunggal`
--
ALTER TABLE `jawaban_kisi_tunggal`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_dropdown`
--
ALTER TABLE `jawaban_pilihan_dropdown`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_essai`
--
ALTER TABLE `jawaban_pilihan_essai`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_jamak`
--
ALTER TABLE `jawaban_pilihan_jamak`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_singkat`
--
ALTER TABLE `jawaban_pilihan_singkat`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_skala`
--
ALTER TABLE `jawaban_pilihan_skala`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_tunggal`
--
ALTER TABLE `jawaban_pilihan_tunggal`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_upload`
--
ALTER TABLE `jawaban_pilihan_upload`
  MODIFY `id_jawaban` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jawaban_singkat`
--
ALTER TABLE `jawaban_singkat`
  MODIFY `id_jawaban_singkat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kisi_jamak`
--
ALTER TABLE `kisi_jamak`
  MODIFY `id_kisi_jamak` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kisi_tunggal`
--
ALTER TABLE `kisi_tunggal`
  MODIFY `id_kisi_tunggal` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_kuisioner`
--
ALTER TABLE `login_kuisioner`
  MODIFY `id_login_kuisioner` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mailer_config`
--
ALTER TABLE `mailer_config`
  MODIFY `id_mailer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id_panel` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pilihan_jamak`
--
ALTER TABLE `pilihan_jamak`
  MODIFY `id_pilihan_jamak` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `pilihan_tunggal`
--
ALTER TABLE `pilihan_tunggal`
  MODIFY `id_pilihan_tunggal` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `skala`
--
ALTER TABLE `skala`
  MODIFY `id_skala` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2021 at 10:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komunitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(8) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `nama_kategori`, `deskripsi`, `created`) VALUES
(1, 'Phyton', 'Python adalah bahasa pemrograman tujuan umum yang ditafsirkan, tingkat tinggi. Dibuat oleh Guido van Rossum dan pertama kali dirilis pada tahun 1991, filosofi desain Python menekankan keterbacaan kode dengan penggunaan spasi putih yang signifikan.', '2021-01-18 00:00:00'),
(2, 'JavaScript', 'JavaScript adalah bahasa pemrograman tingkat tinggi dan dinamis. JavaScript populer di internet dan dapat bekerja di sebagian besar penjelajah web populer seperti Google Chrome, Internet Explorer, Mozilla Firefox, Netscape dan Opera. Kode JavaScript dapat disisipkan dalam halaman web menggunakan tag SCRIPT.', '2021-01-18 00:00:00'),
(3, 'HTML', 'Hypertext Markup Language adalah bahasa markah standar untuk dokumen yang dirancang untuk ditampilkan di peramban internet. Ini dapat dibantu oleh teknologi seperti Cascading Style Sheets dan bahasa scripting seperti JavaScript dan VBScript.', '2021-01-18 00:00:00'),
(4, 'PHP', 'PHP: Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memprogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS.', '2021-01-18 00:00:00'),
(5, 'CSS', 'Cascading Style Sheet merupakan aturan untuk mengatur beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam. CSS bukan merupakan bahasa pemograman.', '2021-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(8) NOT NULL,
  `komentar` text NOT NULL,
  `id_pertanyaan` int(8) NOT NULL,
  `komentar_by` int(8) NOT NULL,
  `waktu_komentar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `komentar`, `id_pertanyaan`, `komentar_by`, `waktu_komentar`) VALUES
(1, 'komentar', 1, 2, '2021-01-20 20:30:59'),
(2, 'koment', 1, 3, '2021-01-20 20:54:17'),
(10, 'googling mas', 1, 4, '2021-01-20 21:07:37'),
(11, 'googling mas', 1, 5, '2021-01-20 21:10:47'),
(12, 'googling mas', 1, 6, '2021-01-20 21:16:45'),
(13, 'googling mas', 1, 7, '2021-01-20 21:21:54'),
(14, 'minum racun tikus gan', 9, 8, '2021-01-21 17:36:24'),
(15, 'tamb ah lagi satu', 9, 9, '2021-01-21 17:37:15'),
(16, 'dede', 9, 10, '2021-01-21 19:13:34'),
(17, 'gg', 9, 11, '2021-01-21 19:54:38'),
(18, 'halo', 2, 14, '2021-01-21 20:50:05'),
(19, 'id pertanyaan 1', 1, 9, '2021-01-22 03:54:51'),
(20, 'id pertanyaan 1', 1, 9, '2021-01-22 04:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int(7) NOT NULL,
  `judul_pertanyaan` text NOT NULL,
  `desk_pertanyaan` text NOT NULL,
  `pertanyaan_kat_id` int(7) NOT NULL,
  `pertanyaan_user_id` int(7) NOT NULL,
  `waktu_pertanyaan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `judul_pertanyaan`, `desk_pertanyaan`, `pertanyaan_kat_id`, `pertanyaan_user_id`, `waktu_pertanyaan`) VALUES
(1, 'bagaimana cara mengkoneksikan database dengan php', 'mohon bantuannya  cara install php', 4, 13, '2021-01-19 03:48:45'),
(2, 'test', 'test', 1, 0, '2021-01-20 19:46:10'),
(6, 'halo', 'halo', 1, 0, '2021-01-20 19:52:48'),
(7, 'judul', 'deskripsi', 1, 0, '2021-01-20 20:05:12'),
(8, 'php', 'php', 4, 0, '2021-01-20 20:07:05'),
(9, 'advan', 'surya lagi galu', 2, 0, '2021-01-21 17:35:27'),
(10, 'test', 'test', 1, 0, '2021-01-21 18:40:34'),
(11, 'gg', 'gg', 1, 0, '2021-01-21 18:40:56'),
(12, 'galau', 'cara mengatasi', 2, 13, '2021-01-21 19:59:52'),
(13, 'linux', 'cara mengatasi', 2, 14, '2021-01-21 20:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(8) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email_user`, `password`, `waktu`) VALUES
(1, 'admin', 'admin', 'admin', '2021-01-20 22:13:33'),
(9, 'dede', 'dede@gmail.com', '$2y$10$Vjrk6Y.gkK9C0kFz5G.Qyux8c3KqeCy.Lk1ZMXDnnrTnS1Rs7qjhe', '2021-01-21 00:14:26'),
(10, 'dede', 'kiki@gmail.com', '$2y$10$LQ0myIk8ih7fmMTnAN3NZOqi.c0QIYhUWNMMcDnoA1/B2X6MsjbGm', '2021-01-21 00:31:19'),
(11, 'dede', 'd@gmail.com', '$2y$10$t1nNky5uemVdTKC/8zD61eeOyuulqEm0lodpQ8YKzOdPlPlKqbJpO', '2021-01-21 00:42:00'),
(12, 'dede', 'fedi.fandawa.5@facebook.com', '$2y$10$dMaRRb6aXR0TChrKxlSGX.VwGQUfzYoRBCuX.y4aiAGGqNrn0Lvrm', '2021-01-21 00:43:57'),
(13, 'surya love riska', 'surya@riska.com', '$2y$10$DSBmlqjrodFtI7eX.W6y6uziUIpcuCSQNKNzeGa4EiYYJ2H8SqgXa', '2021-01-21 17:19:41'),
(14, 'vingkyn', 'kiky89@Wgmail.com', '$2y$10$PM0vWsIvTf8fIDf/5kWexO.ujRoZFC563gGvs/wxMwkTaQI5qmfZa', '2021-01-21 19:52:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indexes for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `pertanyaan_user_id` (`pertanyaan_user_id`),
  ADD KEY `pertanyaan_user_id_2` (`pertanyaan_user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD CONSTRAINT `tbl_komentar_ibfk_1` FOREIGN KEY (`id_pertanyaan`) REFERENCES `tbl_pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

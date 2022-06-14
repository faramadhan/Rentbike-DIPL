-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 08:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test01`
--

-- --------------------------------------------------------

--
-- Table structure for table `butuh_konfirmasi`
--

CREATE TABLE `butuh_konfirmasi` (
  `id_sdpinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pinjaman` varchar(50) NOT NULL,
  `id_motor` int(10) NOT NULL,
  `paket` int(3) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_motor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `nama`, `merk`, `harga`, `jumlah`, `tahun`) VALUES
(1, 'Astrea', 'Honda', 30000, 5, 2004),
(2, 'MultiStrada', 'Ducati', 250000, 2, 2019),
(3, 'Aerox', 'Yamaha', 50000, 2, 2019),
(4, 'Road Glide', 'Harley Davidson', 230000, 1, 2020),
(7, 'Hayabusa', 'Suzuki', 75000, 4, 2005),
(8, 'Scoopy', 'Honda', 35000, 0, 2019),
(9, 'MT-07', 'Yamaha', 80000, 3, 2020),
(71, 'CRF', 'Honda', 60000, 4, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_motor` int(10) NOT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `paket` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_motor`, `tanggal_pinjam`, `tanggal_kembali`, `paket`) VALUES
(164, 16, 3, '2022-05-23 10:49:13', '2022-05-23 10:49:14', 4),
(165, 16, 1, '2022-05-23 10:50:56', '2022-05-23 10:55:16', 1),
(166, 16, 2, '2022-05-23 10:56:29', '2022-05-23 10:56:32', 1),
(167, 18, 3, '2022-05-23 11:08:35', '2022-05-23 11:08:39', 1),
(168, 18, 2, '2022-05-23 11:09:34', '2022-05-23 11:09:36', 1),
(169, 18, 2, '2022-05-23 11:11:03', '2022-05-23 11:11:07', 1),
(170, 18, 3, '2022-05-23 11:17:05', '2022-05-23 11:19:42', 1),
(171, 16, 2, '2022-05-23 11:19:50', '2022-05-23 11:21:32', 2),
(172, 16, 2, '2022-05-23 11:21:34', '2022-05-23 11:21:36', 1),
(173, 18, 3, '2022-05-23 11:21:48', '2022-05-23 11:21:49', 3),
(174, 16, 4, '2022-05-23 04:36:47', '2022-05-23 04:36:48', 3),
(175, 24, 4, '2022-05-23 04:48:38', '2022-05-23 05:05:49', 1),
(176, 16, 4, '2022-05-23 04:56:43', '2022-05-23 05:05:53', 3),
(177, 16, 3, '2022-05-23 04:56:46', '2022-05-23 05:05:53', 1),
(178, 24, 4, '2022-05-23 04:56:47', '2022-05-23 05:05:54', 1),
(179, 24, 2, '2022-05-23 05:05:54', '2022-05-23 05:05:55', 1),
(180, 18, 4, '2022-05-23 08:20:48', '2022-05-23 08:21:14', 3),
(181, 18, 1, '2022-05-23 08:41:54', '2022-05-23 08:42:13', 2),
(182, 18, 2, '2022-05-23 09:19:19', '2022-05-23 09:22:40', 7),
(183, 16, 4, '2022-05-23 09:20:50', '2022-05-24 04:22:27', 7),
(184, 24, 4, '2022-05-24 03:43:33', '2022-05-24 04:22:29', 3),
(185, 18, 1, '2022-05-24 04:22:31', '2022-05-24 04:27:39', 2),
(186, 16, 1, '2022-05-24 04:22:32', '2022-05-24 04:27:42', 3),
(187, 16, 1, '2022-05-24 04:22:33', '2022-05-24 04:27:42', 3),
(188, 16, 1, '2022-05-24 04:22:33', '2022-05-24 04:27:42', 3),
(189, 16, 1, '2022-05-24 04:22:34', '2022-05-24 04:27:43', 7),
(190, 16, 1, '2022-05-24 04:22:34', '2022-05-24 04:27:43', 7),
(191, 16, 1, '2022-05-24 04:22:35', '2022-05-24 04:27:43', 3),
(192, 16, 1, '2022-05-24 04:22:35', '2022-05-24 04:27:44', 3),
(193, 16, 4, '2022-05-24 04:22:36', '2022-05-24 04:27:44', 7),
(194, 16, 3, '2022-05-24 04:22:36', '2022-05-24 04:27:44', 3),
(195, 16, 1, '2022-05-24 04:22:37', '2022-05-24 04:27:45', 7),
(196, 16, 2, '2022-05-24 04:22:37', '2022-05-24 04:27:45', 3),
(197, 16, 2, '2022-05-24 04:22:38', '2022-05-24 04:27:46', 3),
(198, 16, 3, '2022-05-24 04:22:39', '2022-05-24 04:27:46', 3),
(199, 16, 4, '2022-05-24 04:22:39', '2022-05-24 04:27:47', 3),
(200, 16, 3, '2022-05-24 04:22:40', '2022-05-24 04:27:47', 3),
(201, 16, 2, '2022-05-24 04:22:40', '2022-05-24 04:27:47', 3),
(202, 18, 9, '2022-05-24 10:19:17', '2022-05-24 10:19:18', 7),
(203, 24, 1, '2022-05-24 10:21:07', '2022-05-24 11:07:31', 7),
(204, 18, 1, '2022-05-24 11:05:40', '2022-05-24 11:07:44', 1),
(205, 18, 3, '2022-05-24 11:05:47', '2022-05-24 11:07:48', 1),
(206, 18, 4, '2022-05-24 11:05:59', '2022-05-24 11:14:43', 1),
(207, 18, 9, '2022-05-24 11:06:24', '2022-05-24 11:21:55', 1),
(208, 18, 1, '2022-05-24 11:21:42', '2022-05-24 11:22:00', 1),
(209, 18, 8, '2022-05-24 11:06:13', '2022-05-25 12:10:55', 1),
(210, 18, 1, '2022-05-24 11:06:18', '2022-05-25 12:11:11', 1),
(211, 16, 4, '2022-05-24 11:29:22', '2022-05-25 12:11:14', 7),
(212, 16, 3, '2022-05-24 11:29:45', '2022-05-25 12:11:16', 1),
(213, 16, 4, '2022-05-24 11:33:58', '2022-05-25 12:11:18', 7),
(214, 18, 1, '2022-05-24 11:45:01', '2022-05-25 12:11:20', 1),
(215, 18, 3, '2022-05-24 11:46:15', '2022-05-25 12:11:22', 1),
(216, 16, 2, '2022-05-24 11:52:10', '2022-05-25 12:11:24', 1),
(217, 16, 2, '2022-05-24 11:52:10', '2022-05-25 01:28:00', 1),
(218, 16, 3, '2022-05-24 11:52:49', '2022-05-25 01:28:12', 1),
(219, 16, 4, '2022-05-24 11:52:52', '2022-05-25 01:43:00', 1),
(220, 16, 1, '2022-05-25 01:28:05', '2022-05-25 01:47:23', 1),
(221, 16, 71, '2022-05-25 01:47:20', '2022-05-25 01:47:25', 1),
(222, 16, 2, '2022-05-25 01:42:49', '2022-05-25 01:47:51', 1),
(223, 18, 3, '2022-06-06 08:37:40', '2022-06-06 08:39:03', 7),
(224, 24, 3, '2022-05-25 03:27:31', '2022-06-10 08:04:41', 7),
(225, 18, 1, '2022-05-25 02:57:25', '2022-06-10 08:12:27', 3),
(226, 24, 3, '2022-05-25 03:00:04', '2022-06-10 08:12:33', 7),
(227, 24, 1, '2022-05-25 02:58:41', '2022-06-10 08:12:35', 3),
(228, 24, 2, '2022-05-25 02:59:29', '2022-06-10 08:56:48', 3),
(229, 24, 7, '2022-05-25 03:01:36', '2022-06-10 08:56:54', 7),
(230, 24, 4, '2022-05-25 03:03:45', '2022-06-10 08:56:57', 1),
(231, 24, 1, '2022-05-25 03:08:42', '2022-06-10 08:57:00', 1),
(232, 24, 2, '2022-05-25 03:45:08', '2022-06-10 08:59:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sedang_dipinjam`
--

CREATE TABLE `sedang_dipinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pinjaman` varchar(50) NOT NULL,
  `id_motor` varchar(100) NOT NULL,
  `paket` int(3) NOT NULL,
  `waktu_pinjam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sedang_dipinjam`
--

INSERT INTO `sedang_dipinjam` (`id_pinjam`, `id_user`, `status_pinjaman`, `id_motor`, `paket`, `waktu_pinjam`) VALUES
(191, 24, 'Sedang Dipinjam', '1', 1, '2022-05-25 03:15:40'),
(192, 18, 'Sedang Dipinjam', '2', 7, '2022-05-25 03:27:27'),
(196, 16, 'Sedang Dipinjam', '3', 7, '2022-06-10 08:03:00'),
(197, 24, 'Sedang Dipinjam', '3', 7, '2022-06-10 08:04:55'),
(198, 16, 'Sedang Dipinjam', '3', 7, '2022-06-10 08:13:46'),
(199, 16, 'Sedang Dipinjam', '1', 1, '2022-06-10 08:56:44'),
(200, 16, 'Sedang Dipinjam', '1', 3, '2022-06-10 08:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `auth_pass` varchar(200) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `auth_pass`, `user_role`, `no_telp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '1', ''),
(12, 'mahasiswa', '5787be38ee03a9ae5360f54d9026465f', 'mahasiswa@gmail.com', 'mahasiswa', '3', '081281273212'),
(14, 'penyewa', 'ca8692aabeb75728837836763de05b8c', 'penyewa@rocketmail', 'penyewa', '3', '08882371221'),
(16, 'fadlan', 'be21f2a850d52d7bc61bc81349b56ea3', 'fadlan@gmail', 'fadlan', '3', '08180923126'),
(17, 'musthafa', '917a20b424f36045f17b2a95c6a6e1d2', 'musthafa@gmail', 'musthafa', '1', '08128238723'),
(18, 'nabil', '070aa66550916626673f492bdbdb655f', 'nabil@gmail', 'nabil', '3', '082837823723'),
(22, 'johndoe', '5858c9491e16f606692d27538960597f', 'johndoe@gmail.com', 'johndoe26', '3', '088823237432'),
(24, 'zaki', '9784ea3da268563469df99b2e6593564', 'zaki@gmail.com', 'zaki', '3', '081286127322'),
(28, 'JoeRogan', 'c7f874eab29cb18d526c45c2116c08ff', 'joerogan@rocketmail.com', 'joerogan', '3', '081287238723');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(3, 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `butuh_konfirmasi`
--
ALTER TABLE `butuh_konfirmasi`
  ADD PRIMARY KEY (`id_sdpinjam`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `sedang_dipinjam`
--
ALTER TABLE `sedang_dipinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `butuh_konfirmasi`
--
ALTER TABLE `butuh_konfirmasi`
  MODIFY `id_sdpinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `sedang_dipinjam`
--
ALTER TABLE `sedang_dipinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2023 at 04:49 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryId` varchar(10) NOT NULL,
  `userId` int(5) NOT NULL DEFAULT '1',
  `proses` varchar(30) NOT NULL,
  `jenis_material` varchar(30) NOT NULL,
  `tahun` varchar(30) NOT NULL DEFAULT '2020',
  `nama_material` varchar(255) NOT NULL,
  `jumlah_material` decimal(35,5) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `tipedata` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryId`, `userId`, `proses`, `jenis_material`, `tahun`, `nama_material`, `jumlah_material`, `satuan`, `tipedata`, `waktu`) VALUES
('8zyKkv06c9', 18, 'Pemeliharaan', 'Energi', '2020', 'Ammonia (NH3) (kg)', '80.00000', '', 'Primer', '2022-08-23 21:47:20'),
('cmtqHMSwIJ', 18, 'Pemeliharaan', 'Energi', '2020', 'Listrik (kWh)', '100.00000', '', 'Primer', '2022-08-22 22:40:48'),
('cwjnTdhXJ0', 18, 'Pemanenan', 'Air', '2020', 'Air (liter)', '25.00000', '', 'Primer', '2022-08-24 19:12:48'),
('h3AGmrPcbF', 18, 'Pembibitan', 'Bahan Kimia', '2020', 'Nitrogen (N) (kg)', '15.00000', '', 'Primer', '2022-08-23 22:04:08'),
('RrYwt1AsDl', 18, 'Pembibitan', 'Raw Material', '2020', 'Air (liter)', '10.00000', '', 'Primer', '2022-08-19 23:29:14'),
('SGAslzkZr0', 18, 'Pembibitan', 'Support Material', '2020', 'Poultry manure (kg)', '10.00000', '', 'Primer', '2022-08-23 22:05:00'),
('SZD8xmszrF', 18, 'Pemanenan', 'Raw Material', '2020', 'Potassium (K2O) (kg)', '10.00000', '', 'Primer', '2022-08-23 22:39:36'),
('TfkZNpsv4B', 18, 'Pembibitan', 'Raw Material', '2020', 'Air (liter)', '15.00000', '', 'Primer', '2022-08-20 23:41:53'),
('xaZnAbX9S1', 18, 'Pemanenan', 'Energi', '2020', 'Phosphorus (P2O5) (kg)', '5.00000', '', 'Sekunder', '2022-08-20 23:01:35'),
('zyKWdhCH51', 18, 'Pemeliharaan', 'Raw Material', '2020', 'Air (liter)', '10.00000', '', 'Primer', '2022-08-20 23:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `kalkulator`
--

CREATE TABLE `kalkulator` (
  `id` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nutrisi` decimal(10,3) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kalkulator`
--

INSERT INTO `kalkulator` (`id`, `tanggal`, `nutrisi`, `user_id`) VALUES
('n4PRcmQ5uq', '2022-08-18', '125.000', 18),
('XG2ico4lPU', '2022-08-18', '125.000', 18);

-- --------------------------------------------------------

--
-- Table structure for table `lca_emisi`
--

CREATE TABLE `lca_emisi` (
  `id_emisi` int(11) NOT NULL,
  `nama_material` varchar(255) NOT NULL,
  `GWP` decimal(65,15) DEFAULT NULL,
  `AP` decimal(65,15) DEFAULT NULL,
  `EP` decimal(65,15) DEFAULT NULL,
  `ODP` decimal(65,15) DEFAULT NULL,
  `HCT` decimal(65,15) DEFAULT NULL,
  `sumberdata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lca_emisi`
--

INSERT INTO `lca_emisi` (`id_emisi`, `nama_material`, `GWP`, `AP`, `EP`, `ODP`, `HCT`, `sumberdata`) VALUES
(1, 'Air (liter) ', '0.000000000794188', '0.000000000000047', '0.000000000000157', '0.000000000000063', '0.000000008533510', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(2, 'Nitrogen (N) (kg)', '0.000058311508916', '0.000000004181113', '0.000000001548299', '0.000000032491634', '0.000038315842070', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(3, 'Phosphorus (P2O5) (kg)', '0.000022123200000', '0.000000002288710', '0.000000000785225', '0.000000033738600', '0.000013094300000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(4, 'Potassium (K2O) (kg)', '0.000026837200000', '0.000000001796720', '0.000000000577230', '0.000000044500300', '0.000017527300000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(5, 'Kalsium (Ca) (kg)', '0.000023384400000', '0.000000001453570', '0.000000000328097', '0.000000099996600', '0.000014610900000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(6, 'Magnesium (Mg) (kg)', '0.000014066700000', '0.000000000351954', '0.000000000271106', '0.000000000247500', '0.000037015000000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(7, 'Sulfur (S) (kg)', '0.000000156383000', '0.000000000025422', '0.000000000001735', '0.000000000016776', '0.000000040901200', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(8, 'Listrik (kWh)', '0.000007341740000', '0.000000000455722', '0.000000000342045', '0.000000000474536', '0.000020179100000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(9, 'Poultry manure (kg)', '0.000005078030000', '0.000000000363095', '0.000000000117914', '0.000000006418780', '0.000003012120000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(10, 'Ammonia (NH3) (kg)', '0.000020946900000', '0.000000000225407', '0.000000000000007', '0.000000000162231', '0.000000109874000', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(11, 'Urea (CO(NH2)2) (kg)', '0.000006719570000', '0.000000000173591', '0.000000000000004', '0.000000000176239', '0.000000071182400', 'ReCiPe 2016 Endpoint (E) V1.06 / World (2010) E/A'),
(12, 'Pekerja (MJ)', NULL, NULL, NULL, NULL, NULL, '-'),
(16, 'Benih Selada (kg)', '0.000000000000000', '0.000000000000000', '0.000000000000000', '0.000000000000000', '0.000000000000000', '-');

-- --------------------------------------------------------

--
-- Table structure for table `lca_jenismat`
--

CREATE TABLE `lca_jenismat` (
  `id_jenismat` int(11) NOT NULL,
  `jenis_material` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lca_jenismat`
--

INSERT INTO `lca_jenismat` (`id_jenismat`, `jenis_material`) VALUES
(1, 'Raw Material'),
(2, 'Support Material'),
(3, 'Bahan Kimia'),
(4, 'Energi'),
(5, 'Air'),
(6, 'Emisi ke udara'),
(7, 'Emisi ke tanah'),
(8, 'Emisi ke air'),
(10, 'Produk'),
(11, 'Limbah');

-- --------------------------------------------------------

--
-- Table structure for table `lca_material`
--

CREATE TABLE `lca_material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lca_material`
--

INSERT INTO `lca_material` (`id_material`, `nama_material`) VALUES
(1, 'Air (liter)'),
(2, 'Nitrogen (N) (kg)'),
(3, 'Phosphorus (P2O5) (kg)'),
(4, 'Potassium (K2O) (kg)'),
(5, 'Kalsium (Ca) (kg)'),
(6, 'Magnesium (Mg) (kg)'),
(7, 'Sulfur (S) (kg)'),
(8, 'Listrik (kWh)'),
(9, 'Poultry manure (kg)'),
(10, 'Ammonia (NH3) (kg)'),
(11, 'Urea (CO(NH2)2) (kg)'),
(12, 'Pekerja (MJ)'),
(16, 'Benih Selada (kg)');

-- --------------------------------------------------------

--
-- Table structure for table `lca_proses`
--

CREATE TABLE `lca_proses` (
  `id_proses` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `proses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lca_proses`
--

INSERT INTO `lca_proses` (`id_proses`, `userId`, `proses`) VALUES
(1, 11, 'Pembibitan'),
(2, 11, 'Pemeliharaan'),
(3, 11, 'Pemanenan'),
(4, 12, 'Pembibitan'),
(5, 12, 'Pemeliharaan'),
(6, 12, 'Pemanenan'),
(7, 13, 'Pembibitan'),
(8, 13, 'Pemeliharaan'),
(9, 13, 'Pemanenan'),
(10, 14, 'Pembibitan'),
(11, 14, 'Pemeliharaan'),
(12, 14, 'Pemanenan'),
(13, NULL, 'Pembibitan'),
(14, NULL, 'Pemeliharaan'),
(15, NULL, 'Pemanenan');

-- --------------------------------------------------------

--
-- Table structure for table `lca_tahun`
--

CREATE TABLE `lca_tahun` (
  `id_tahun` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lca_tahun`
--

INSERT INTO `lca_tahun` (`id_tahun`, `userId`, `tahun`) VALUES
(1, 11, '2020'),
(2, 11, '2021'),
(3, 11, '2022'),
(4, 11, '2023'),
(5, 13, '2020'),
(6, 13, '2021'),
(7, 13, '2022'),
(8, 13, '2023'),
(9, NULL, '2020'),
(10, NULL, '2021'),
(11, NULL, '2022'),
(12, NULL, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(260) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `nama_gh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `lokasi`, `nama_gh`) VALUES
(11, 'Irfan Azmi Al-Hayat', 'irfan6699@gmail.com', 'avatar31.png', '$2y$10$N07IzieINXBHQmgGyWsBjeCZcjN1/POjg.Td8lSZsVHDrwEg9Faaa', 2, 1, 1657883071, 'Dramaga, Bogor', 'Greenhouse Leuwikopo'),
(12, 'Nafri A', 'nafri6699@gmail.com', 'avatar3.png', '$2y$10$UHUPM930wjqNWy3YNnxluuvBG0GBZz0u1AMTe0maZSqjVlZVpE7YK', 1, 1, 1657883082, NULL, NULL),
(13, 'Bob si Petani', 'bob@gmail.com', 'avatar53.png', '$2y$10$cPr7P/nyP5QiZ9eyw2yUz.ShScW7En7vjm9Q1wnp/jbapQiE0r2Ny', 2, 1, 1657944496, 'Dramaga, Bogor', 'Greenhouse Selada 1 Bob'),
(14, 'irfan', 'irfan2@gmail.com', 'avatar3.png', '$2y$10$oxXnOuUE3mj1SNIVnPWnnuCRcqKkt6017jpjMOKmmz/xSEPW4wyTq', 2, 1, 1658910305, 'asdas', 'asds'),
(18, 'userbaru', 'userbaru@gmail.com', 'avatar3.png', '$2y$10$3HPFGiEA.dIopk7bet6PT.HwUKJHtci/IaxFb4yVj9znA8l7oPMae', 2, 1, 1660742327, 'Zimbabwe', 'house baru'),
(19, 'userbaru2', 'userbaru2@gmail.com', 'avatar3.png', '$2y$10$7oGtugRvAzPEUM.WoAS5ZOT5EKC6xgYGFPhOgHcxHSklJEuC9Jq86', 2, 1, 1661269270, 'Wakanda', 'house baru');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'ADMINISTRATOR'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `group_menu` int(5) NOT NULL DEFAULT '0',
  `is_active` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `group_menu`, `is_active`, `urutan`) VALUES
(2, 2, 'My Profile', 'myprofile', 'fas fa-fw fa-user', 0, 1, 2),
(3, 2, 'Master Data', '', 'fas fa-fw fa-address-book', 4, 1, 4),
(8, 1, 'Menu Management', 'admin/menu', 'fa-solid fa-folder', 0, 1, 2),
(9, 1, 'Sub Menu Management', 'admin/submenu', 'fa-solid fa-folder-open', 0, 1, 3),
(24, 2, 'Interpretasi', 'interpretasi', 'fas fa-fw fa-chart-line', 0, 1, 9),
(27, 2, 'Life Cycle Impact Assessment', '', 'fas fa-fw fa-biohazard', 1, 1, 7),
(31, 2, 'Life Cycle Inventory', '', 'fas fa-fw fa-warehouse', 3, 1, 6),
(32, 2, 'Material Mass Balance', 'material', 'fas fa-fw fa-circle-half-stroke', 0, 1, 8),
(35, 2, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 0, 1, 1),
(40, 1, 'Role', 'admin/role', 'fa solid fa-user-tie', 0, 1, 1),
(58, 2, 'Kalkulator Nutrisi', 'kalkulatornutrisi', 'fa-solid fa-calculator', 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_sub_menu`
--

CREATE TABLE `user_sub_sub_menu` (
  `id` int(5) NOT NULL,
  `userId` int(11) NOT NULL,
  `group_menu` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `urutan` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_sub_menu`
--

INSERT INTO `user_sub_sub_menu` (`id`, `userId`, `group_menu`, `title`, `url`, `urutan`, `date_created`) VALUES
(1, 11, 4, 'Data', 'masterdata', 1, 0),
(72, 11, 1, 'Pembibitan', 'lcia?proses=Pembibitan', 1, 1658495044),
(73, 11, 3, 'Pembibitan', 'lci?proses=Pembibitan', 1, 1658495044),
(74, 13, 2, 'Dalam Greenhouse', 'datlingdalam', 0, 0),
(75, 13, 2, 'Luar Greenhouse', 'datlingluar', 0, 0),
(77, 11, 1, 'Pemeliharaan', 'lcia?proses=Pemeliharaan', 2, 1658495120),
(78, 11, 3, 'Pemeliharaan', 'lci?proses=Pemeliharaan', 2, 1658495120),
(83, 11, 1, 'Pemanenan', 'lcia?proses=Pemanenan', 3, 1658495185),
(84, 11, 3, 'Pemanenan', 'lci?proses=Pemanenan', 3, 1658495185),
(85, 13, 1, 'Pembibitan', 'lcia?proses=Pembibitan', 1, 1658500837),
(86, 13, 3, 'Pembibitan', 'lci?proses=Pembibitan', 1, 1658500837),
(87, 13, 1, 'Pemeliharaan', 'lcia?proses=Pemeliharaan', 2, 1658500843),
(88, 13, 3, 'Pemeliharaan', 'lci?proses=Pemeliharaan', 2, 1658500843),
(89, 13, 1, 'Pemanenan', 'lcia?proses=Pemanenan', 3, 1658500853),
(90, 13, 3, 'Pemanenan', 'lci?proses=Pemanenan', 3, 1658500853),
(99, 11, 4, 'Proses', 'masterdata/proses', 2, 0),
(100, 11, 4, 'Tahun', 'masterdata/Tahun', 3, 0),
(101, 13, 4, 'Proses', 'masterdata/proses', 2, 0),
(102, 13, 4, 'Tahun', 'masterdata/Tahun', 3, 0),
(105, 13, 4, 'Data', 'masterdata', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `tahun` (`tahun`);

--
-- Indexes for table `kalkulator`
--
ALTER TABLE `kalkulator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lca_emisi`
--
ALTER TABLE `lca_emisi`
  ADD PRIMARY KEY (`id_emisi`),
  ADD KEY `nama_material` (`nama_material`);

--
-- Indexes for table `lca_jenismat`
--
ALTER TABLE `lca_jenismat`
  ADD PRIMARY KEY (`id_jenismat`);

--
-- Indexes for table `lca_material`
--
ALTER TABLE `lca_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `lca_proses`
--
ALTER TABLE `lca_proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `lca_tahun`
--
ALTER TABLE `lca_tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role menu` (`role_id`),
  ADD KEY `menu` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_sub_sub_menu`
--
ALTER TABLE `user_sub_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lca_emisi`
--
ALTER TABLE `lca_emisi`
  MODIFY `id_emisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lca_jenismat`
--
ALTER TABLE `lca_jenismat`
  MODIFY `id_jenismat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lca_material`
--
ALTER TABLE `lca_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lca_proses`
--
ALTER TABLE `lca_proses`
  MODIFY `id_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lca_tahun`
--
ALTER TABLE `lca_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_sub_sub_menu`
--
ALTER TABLE `user_sub_sub_menu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lca_proses`
--
ALTER TABLE `lca_proses`
  ADD CONSTRAINT `lca_proses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lca_tahun`
--
ALTER TABLE `lca_tahun`
  ADD CONSTRAINT `lca_tahun_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`),
  ADD CONSTRAINT `role menu` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_sub_menu`
--
ALTER TABLE `user_sub_sub_menu`
  ADD CONSTRAINT `user_sub_sub_menu_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

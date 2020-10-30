-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 30, 2020 at 07:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travelur`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_pass`, `admin_name`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin name');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hotel`
--

CREATE TABLE `tb_hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_nama` varchar(50) NOT NULL,
  `hotel_alamat` text NOT NULL,
  `hotel_kualitas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kereta`
--

CREATE TABLE `tb_kereta` (
  `kereta_id` int(11) NOT NULL,
  `kereta_nama` varchar(50) NOT NULL,
  `kereta_berangkat` datetime NOT NULL,
  `kereta_tiba` datetime NOT NULL,
  `kereta_dari` varchar(50) NOT NULL,
  `kereta_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `psn_id` int(11) NOT NULL,
  `psn_nama` varchar(255) NOT NULL,
  `psn_email` varchar(255) NOT NULL,
  `psn_telp` varchar(16) NOT NULL,
  `psn_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesawat`
--

CREATE TABLE `tb_pesawat` (
  `pesawat_id` int(11) NOT NULL,
  `pesawat_nama` varchar(50) NOT NULL,
  `pesawat_berangkat` datetime NOT NULL,
  `pesawat_tiba` datetime NOT NULL,
  `pesawat_dari` varchar(50) NOT NULL,
  `pesawat_tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(3, 'petugase', 'petugas 13', '$2y$10$24NoOAv6ATaxtT8g/ocubeOHZsBfrYHvt33JscLfsNLPcC4nRROZ6', 'Petugas'),
(4, 'admin', 'admin', '$2y$10$IjQID8N2P5hpI5Dx6FkNtuDt.yGw6u70cgw.QdnMSguvofljFEube', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `kode_reservasi` decimal(10,0) NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `kursi` decimal(10,0) NOT NULL,
  `keberangkatan` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `status` enum('Dibayar','Proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `kode_reservasi`, `tgl_reservasi`, `kursi`, `keberangkatan`, `harga`, `user_id`, `rute_id`, `status`) VALUES
(1, '352761894', '2020-10-25', '0', '2020-10-23', 'Rp 250,000', 5, 2, 'Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id_rute` int(11) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `rute_dari` text NOT NULL,
  `rute_ke` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rute`
--

INSERT INTO `tb_rute` (`id_rute`, `tgl_keberangkatan`, `rute_dari`, `rute_ke`, `harga`, `trans_id`) VALUES
(1, '2020-10-31', 'bandungo', 'jakartao', '1000009', 3),
(2, '2020-10-23', 'bantul', 'bali', '250000', 2),
(3, '2020-10-29', 'jawa', 'jakartaa', '4000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiketpesawat`
--

CREATE TABLE `tb_tiketpesawat` (
  `tiket_id` int(11) NOT NULL,
  `tiket_user` int(11) NOT NULL,
  `tiket_penerbangan` int(11) NOT NULL,
  `tiket_tarif` int(11) NOT NULL,
  `tiket_status` enum('Belum','Terbayar') NOT NULL,
  `tiket_class` enum('First Class','Business','Economy') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_trans`
--

CREATE TABLE `tb_trans` (
  `id_trans` int(11) NOT NULL,
  `kode` decimal(10,0) NOT NULL,
  `deskripsi` text NOT NULL,
  `kursi` text NOT NULL,
  `type_trans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_trans`
--

INSERT INTO `tb_trans` (`id_trans`, `kode`, `deskripsi`, `kursi`, `type_trans_id`) VALUES
(2, '321794568', 'mobilio', '23', 2),
(3, '384295671', 'api', '12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_trans`
--

CREATE TABLE `tb_type_trans` (
  `id_type_trans` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type_trans`
--

INSERT INTO `tb_type_trans` (`id_type_trans`, `description`) VALUES
(2, 'pesawat'),
(3, 'kereta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_nama_lengkap` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `user_alamat` text NOT NULL,
  `user_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nama`, `user_nama_lengkap`, `user_pass`, `user_jk`, `user_alamat`, `user_telp`) VALUES
(4, 'aku', 'awesrdcfghb', '$2y$10$j.zUWUhQYvOD/3vDjG/HpegbUv6rfU1l6wP7itsJnZ3Bd7T0QNxJy', NULL, '', ''),
(5, 'popo', 'popoku', '$2y$10$nco8PC.5FMUIMAb8HRuv4efcC3Eva71kjT7.G9EdGq5vh4sprwy/e', 'Laki-laki', 'bantul', '12435346547'),
(6, 'x', 'x', '$2y$10$B8c/uU40tx3aZ3T9jYbseOZAqRcNDrYMPU8iK2z5/DF.lVrkeC0i6', NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `tb_kereta`
--
ALTER TABLE `tb_kereta`
  ADD PRIMARY KEY (`kereta_id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`psn_id`),
  ADD UNIQUE KEY `user_id` (`psn_user`);

--
-- Indexes for table `tb_pesawat`
--
ALTER TABLE `tb_pesawat`
  ADD PRIMARY KEY (`pesawat_id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `tb_trans`
--
ALTER TABLE `tb_trans`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `tb_type_trans`
--
ALTER TABLE `tb_type_trans`
  ADD PRIMARY KEY (`id_type_trans`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_hotel`
--
ALTER TABLE `tb_hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kereta`
--
ALTER TABLE `tb_kereta`
  MODIFY `kereta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesawat`
--
ALTER TABLE `tb_pesawat`
  MODIFY `pesawat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rute`
--
ALTER TABLE `tb_rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_trans`
--
ALTER TABLE `tb_trans`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_type_trans`
--
ALTER TABLE `tb_type_trans`
  MODIFY `id_type_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

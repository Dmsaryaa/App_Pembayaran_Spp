-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 06:01 AM
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
-- Database: `db_spp_dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(1) NOT NULL,
  `id_transaksi` int(1) DEFAULT NULL,
  `bulan_bayar` varchar(20) DEFAULT NULL,
  `id_jenis_pembayaran` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `bulan_bayar`, `id_jenis_pembayaran`) VALUES
(15, 15, 'Cash', 21),
(16, 16, 'Dana', 23),
(17, 17, 'SPP Februari 2021', 22),
(18, 18, 'SPP Maret 2021', 23),
(19, 19, 'SPP April 2021', 24),
(20, 20, 'SPP Mei 2021', 25),
(21, 21, 'SPP Juni 2021', 26),
(22, 22, 'DU Juli 2021', 27),
(23, 23, 'SPP Agustus 2021', 28),
(24, 24, 'SPP September 2021', 29),
(25, 25, 'SPP Oktober 2021', 30),
(26, 26, 'SPP November 2021', 31),
(27, 27, 'SPP Desember 2021', 32),
(28, 28, 'aada', 33),
(29, 29, 'DU Januari 2021', 34),
(30, 30, 'SPP Februari 2021', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id_jenis_pembayaran` int(1) NOT NULL,
  `nama_jenis_pembayaran` varchar(20) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `tahun_ajaran` enum('2020/2021','2021/2022','2022/2023') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_pembayaran`
--

INSERT INTO `tb_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`, `nominal`, `tahun_ajaran`) VALUES
(21, 'DU Januari 2021', 175000, '2020/2021'),
(22, 'SPP Februari 2021', 175000, '2020/2021'),
(23, 'SPP Maret 2021', 175000, '2020/2021'),
(24, 'SPP April 2021', 175000, '2020/2021'),
(25, 'SPP Mei 2021', 175000, '2020/2021'),
(26, 'SPP Juni 2021', 175000, '2020/2021'),
(27, 'DU Juli 2021', 175000, '2020/2021'),
(28, 'SPP Agustus 2021', 175000, '2020/2021'),
(29, 'SPP September 2021', 175000, '2020/2021'),
(30, 'SPP Oktober 2021', 175000, '2020/2021'),
(31, 'SPP November 2021', 175000, '2020/2021'),
(32, 'SPP Desember 2021', 175000, '2020/2021'),
(33, 'aada', 212, '2020/2021'),
(34, 'DU Januari 2021', 175000, '2020/2021'),
(35, 'SPP Februari 2021', 175000, '2020/2021'),
(36, 'SPP Maret 2021', 175000, '2020/2021'),
(37, 'SPP April 2021', 175000, '2020/2021'),
(38, 'SPP Mei 2021', 175000, '2020/2021'),
(39, 'SPP Juni 2021', 175000, '2020/2021'),
(40, 'DU Juli 2021', 175000, '2020/2021'),
(41, 'SPP Agustus 2021', 175000, '2020/2021'),
(42, 'SPP September 2021', 175000, '2020/2021'),
(43, 'SPP Oktober 2021', 175000, '2020/2021'),
(44, 'SPP November 2021', 175000, '2020/2021'),
(45, 'SPP Desember 2021', 175000, '2020/2021'),
(46, 'aada', 212, '2020/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'Rendra', 'Pluto', '999999999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(1) NOT NULL,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `hak_akses` enum('Admin','Kasir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_telpon`, `jabatan`, `hak_akses`) VALUES
(14, 'Mukli', 'Klee', '$2y$10$XItDFj5V8VTHhn8wHUedve5k1scVhLTBn.aUM7XXiAvdLm3e8e9xm', '081235467892', 'Manager', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(1) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `tahun_masuk` enum('2020/2021','2021/2022','2022/2023') DEFAULT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `nis`, `kelas`, `tahun_masuk`, `no_rek`, `jk`) VALUES
(20, 'Arya', '15717227065', 'XII RPL 2', '2020/2021', '123', 'Laki-Laki'),
(23, 'Aldo', '15717227065', 'XII RPL 2', '2021/2022', '1234', 'Laki-Laki'),
(24, 'Rendra', '15717227065', 'XII RPL 2', '2022/2023', '12345', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(1) NOT NULL,
  `id_siswa` int(1) DEFAULT NULL,
  `id_petugas` int(1) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_siswa`, `id_petugas`, `tanggal_bayar`) VALUES
(15, 20, 14, '2022-11-02'),
(16, 24, 14, '2022-11-02'),
(17, 20, 14, '2022-11-03'),
(18, 20, 14, '2022-11-03'),
(19, 20, 14, '2022-11-03'),
(20, 20, 14, '2022-11-03'),
(21, 20, 14, '2022-11-03'),
(22, 20, 14, '2022-11-03'),
(23, 20, 14, '2022-11-03'),
(24, 20, 14, '2022-11-03'),
(25, 20, 14, '2022-11-03'),
(26, 20, 14, '2022-11-03'),
(27, 20, 14, '2022-11-03'),
(28, 20, 14, '2022-11-10'),
(29, 20, 14, '2022-11-10'),
(30, 20, 14, '2022-11-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

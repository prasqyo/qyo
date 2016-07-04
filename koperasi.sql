-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 10:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `No_Anggota` varchar(10) NOT NULL,
  `ID_Unit` varchar(10) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Tempat` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Tanggal_Masuk_Anggota` date NOT NULL,
  `Jenis_Kelamin` enum('Pria','Wanita') NOT NULL,
  `Alamat_Rumah` varchar(100) NOT NULL,
  `Status` enum('Pengurus','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`No_Anggota`, `ID_Unit`, `NIK`, `Nama_Anggota`, `Tempat`, `Tanggal_Lahir`, `Tanggal_Masuk_Anggota`, `Jenis_Kelamin`, `Alamat_Rumah`, `Status`) VALUES
('ANG--001', 'UK01', '42190481', 'Yolanda Margareth', 'Jakarta', '1995-07-19', '2016-07-26', 'Wanita', 'Jalan Lewa', 'Pengurus');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_pinjam`
--

CREATE TABLE IF NOT EXISTS `angsuran_pinjam` (
  `Kode_Angsuran` varchar(10) NOT NULL,
  `Kode_Peminjaman` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Nominal_Angsuran` int(12) NOT NULL,
  `Status_Angsuran` enum('Belum_Bayar','Sudah_Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `Kode_Jabatan` varchar(10) NOT NULL,
  `Jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`Kode_Jabatan`, `Jabatan`) VALUES
('J0001', 'Ketua Koperasi'),
('J002', 'Kadiv. Logistik'),
('J003', 'Kadiv. Keuangan'),
('J004', 'Wakil Ketua'),
('J005', 'Sekretaris I');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE IF NOT EXISTS `jenis_simpanan` (
  `Kode_Jenis_Simpanan` varchar(10) NOT NULL,
  `Jenis_Simpanan` varchar(20) NOT NULL,
  `Nominal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`Kode_Jenis_Simpanan`, `Jenis_Simpanan`, `Nominal`) VALUES
('JS001', 'Simpanan_Sukarela', 0),
('JS002', 'Simpanan_Wajib', 20000),
('JS003', 'Simpanan_Pokok', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `nama` int(10) NOT NULL,
  `pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `ID_Pengurus` varchar(10) NOT NULL,
  `Nama_Pengurus` varchar(20) NOT NULL,
  `Kode_Jabatan` varchar(10) NOT NULL,
  `Tanggal_Mulai_Jabat` varchar(12) NOT NULL,
  `Periode` varchar(12) NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`ID_Pengurus`, `Nama_Pengurus`, `Kode_Jabatan`, `Tanggal_Mulai_Jabat`, `Periode`, `Status`, `Alamat`) VALUES
('PNG--002', 'Dindo', 'J0001', '2016-06-28', '2013-2016', 'Aktif', 'Jl. Lapan III');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `Kode_Pinjaman` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Unit_Kerja` varchar(20) NOT NULL,
  `Jabatan` varchar(15) NOT NULL,
  `Pendapatan_Per_Bulan` int(12) NOT NULL,
  `Nominal_Pinjaman` int(12) NOT NULL,
  `Nominal_Angsuran_Per_Bulan` int(12) NOT NULL,
  `Deskripsi` varchar(1000) NOT NULL,
  `Tgl_Transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_detail`
--

CREATE TABLE IF NOT EXISTS `pinjaman_detail` (
  `Kode_Pinjaman_Detail` varchar(12) NOT NULL,
  `Kode_Pinjaman_Header` varchar(12) NOT NULL,
  `No_Anggota` varchar(12) NOT NULL,
  `ID_Unit` varchar(12) NOT NULL,
  `Kode_Jabatan` varchar(12) NOT NULL,
  `Pendapatan_Per_Bulan` int(12) NOT NULL,
  `Nominal_Pinjaman` int(12) NOT NULL,
  `Nominal_Angsuran_Per_Bulan` int(12) NOT NULL,
  `Deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_header`
--

CREATE TABLE IF NOT EXISTS `pinjaman_header` (
  `Kode_Pinjaman_Header` varchar(12) NOT NULL,
  `Tgl_Transaksi` date NOT NULL,
  `No_Anggota` varchar(12) NOT NULL,
  `Total_Pinjaman` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_detail`
--

CREATE TABLE IF NOT EXISTS `simpanan_detail` (
  `Kode_Simpanan` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Kode_Jenis_Simpanan` varchar(10) NOT NULL,
  `Nominal_Simpanan` int(12) NOT NULL,
  `Tgl_Setor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan_detail`
--

INSERT INTO `simpanan_detail` (`Kode_Simpanan`, `No_Anggota`, `Nama_Anggota`, `Kode_Jenis_Simpanan`, `Nominal_Simpanan`, `Tgl_Setor`) VALUES
('TS01', 'A009', 'Susi', 'JS002', 20000, '2016-06-01'),
('TS02', 'A010', 'Sasa', 'JS001', 50000, '2016-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_header`
--

CREATE TABLE IF NOT EXISTS `simpanan_header` (
  `Kode_Simpanan_Header` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `Total_Simpanan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `ID_Unit` varchar(10) NOT NULL,
  `Unit_Kerja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`ID_Unit`, `Unit_Kerja`) VALUES
('UK01', 'Kantor Pusat'),
('UK02', 'Galangan 1'),
('UK03', 'Galangan 2'),
('UK04', 'Galangan 3'),
('UK05', 'Galangan 4'),
('UK06', 'Galangan 5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`Id` int(11) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Nama_Lengkap`, `Username`, `Password`, `Level`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'Pengurus', 'pengurus', '0181a4b54d3adfd637ba1cf16e167e1e', 2),
(3, 'Ketua', 'ketua', 'c39f48f2b9f2499963622152a2e9a97b', 3),
(5, '', 'Bambang', 'a9711cbb2e3c2d5fc97a63e45bbe5076', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`No_Anggota`);

--
-- Indexes for table `angsuran_pinjam`
--
ALTER TABLE `angsuran_pinjam`
 ADD PRIMARY KEY (`Kode_Angsuran`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`Kode_Jabatan`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
 ADD PRIMARY KEY (`Kode_Jenis_Simpanan`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
 ADD PRIMARY KEY (`ID_Pengurus`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`Kode_Pinjaman`);

--
-- Indexes for table `pinjaman_detail`
--
ALTER TABLE `pinjaman_detail`
 ADD PRIMARY KEY (`Kode_Pinjaman_Detail`);

--
-- Indexes for table `pinjaman_header`
--
ALTER TABLE `pinjaman_header`
 ADD PRIMARY KEY (`Kode_Pinjaman_Header`);

--
-- Indexes for table `simpanan_detail`
--
ALTER TABLE `simpanan_detail`
 ADD PRIMARY KEY (`Kode_Simpanan`);

--
-- Indexes for table `simpanan_header`
--
ALTER TABLE `simpanan_header`
 ADD PRIMARY KEY (`Kode_Simpanan_Header`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
 ADD PRIMARY KEY (`ID_Unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

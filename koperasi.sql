-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2016 at 10:41 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `No_Anggota` varchar(10) NOT NULL,
  `ID_Unit` varchar(10) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(30) NOT NULL,
  `Tempat` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Tanggal_Masuk_Anggota` date NOT NULL,
  `Jenis_Kelamin` enum('Pria','Wanita') NOT NULL,
  `Alamat_Rumah` varchar(100) NOT NULL,
  `Status` enum('Pengurus','Anggota') NOT NULL,
  `simpansukarela` enum('iya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`No_Anggota`, `ID_Unit`, `NIK`, `Nama_Anggota`, `Tempat`, `Tanggal_Lahir`, `Tanggal_Masuk_Anggota`, `Jenis_Kelamin`, `Alamat_Rumah`, `Status`, `simpansukarela`) VALUES
('ANG-001', 'UK-001', '201543501315', 'Yolanda Margareth', 'Jakarta', '1997-05-21', '2016-07-28', 'Pria', 'Jalan Kalisari', 'Anggota', 'iya'),
('ANG-002', 'UK-002', '201643501316', 'Anugrah Prastyo', 'Jakarta', '1995-08-26', '2016-07-28', 'Pria', 'Jalan condet batu ampar', 'Anggota', 'iya');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_pinjam`
--

CREATE TABLE `angsuran_pinjam` (
  `kode_angsuran` varchar(10) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `tanggal_angsuran` varchar(20) NOT NULL,
  `kode_cicilan` varchar(10) NOT NULL,
  `nominal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran_pinjam`
--

INSERT INTO `angsuran_pinjam` (`kode_angsuran`, `kode_transaksi`, `No_Anggota`, `tanggal_angsuran`, `kode_cicilan`, `nominal`) VALUES
('AP-001', 'TR-001', 'ANG-002', '28/07/2016 14:48:32', 'CL-002', 85000);

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `kode_cicilan` varchar(10) NOT NULL,
  `nominal` int(15) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `nominal_cicilan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`kode_cicilan`, `nominal`, `jangka_waktu`, `nominal_cicilan`) VALUES
('CL-001', 1000000, 1, 90000),
('CL-002', 1000000, 2, 85000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `Kode_Jabatan` varchar(10) NOT NULL,
  `Jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`Kode_Jabatan`, `Jabatan`) VALUES
('JB-001', 'Kadiv Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `Kode_Jenis_Simpanan` varchar(10) NOT NULL,
  `Jenis_Simpanan` varchar(20) NOT NULL,
  `Nominal` int(12) NOT NULL,
  `id_jenis` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`Kode_Jenis_Simpanan`, `Jenis_Simpanan`, `Nominal`, `id_jenis`) VALUES
('JS-001', 'Simpanan Sukarela', 0, ''),
('JS-002', 'Simpanan Wajib', 20000, ''),
('JS-003', 'Simpanan Pokok', 20000, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `nama` int(10) NOT NULL,
  `pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `ID_Pengurus` varchar(10) NOT NULL,
  `Nama_Pengurus` varchar(20) NOT NULL,
  `Kode_Jabatan` varchar(10) NOT NULL,
  `Tanggal_Mulai_Jabat` varchar(12) NOT NULL,
  `Periode` varchar(12) NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`ID_Pengurus`, `Nama_Pengurus`, `Kode_Jabatan`, `Tanggal_Mulai_Jabat`, `Periode`, `Status`, `Alamat`) VALUES
('PNG-001', 'Yolanda Margareth', 'JB-001', '07/27/2016', '2016', 'Aktif', 'Jalan Kalisari');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `kode_transaksi` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `kode_cicilan` varchar(10) NOT NULL,
  `tanggal_transaksi` varchar(20) NOT NULL,
  `banyak_cicilan` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`kode_transaksi`, `No_Anggota`, `kode_cicilan`, `tanggal_transaksi`, `banyak_cicilan`, `status`, `bulan`, `tahun`) VALUES
('TR-001', 'ANG-002', 'CL-002', '28/07/2016 14:37:59', 12, 'aktif', 'Juli', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `settingnominalsimpanan`
--

CREATE TABLE `settingnominalsimpanan` (
  `id` int(11) NOT NULL,
  `simpan_pokok` int(11) NOT NULL,
  `simpan_wajib` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settingnominalsimpanan`
--

INSERT INTO `settingnominalsimpanan` (`id`, `simpan_pokok`, `simpan_wajib`) VALUES
(1, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `simpanpokok`
--

CREATE TABLE `simpanpokok` (
  `kode_transaksi` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `tanggal_transaksi` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanpokok`
--

INSERT INTO `simpanpokok` (`kode_transaksi`, `No_Anggota`, `tanggal_transaksi`, `nominal`, `Bulan`, `Tahun`) VALUES
('TR-001', 'ANG-001', '28/07/2016 10:32:29', 10000, 'Juli', 2016),
('TR-002', 'ANG-002', '28/07/2016 11:30:54', 10000, 'Juli', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `simpansukarela`
--

CREATE TABLE `simpansukarela` (
  `kode_transaksi` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_transaksi` varchar(15) NOT NULL,
  `waktu` varchar(15) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpansukarela`
--

INSERT INTO `simpansukarela` (`kode_transaksi`, `No_Anggota`, `nominal`, `tanggal_transaksi`, `waktu`, `Bulan`, `Tahun`) VALUES
('TR-001', 'ANG-001', 15000, '28/07/2016', '10:34:05', 'Juli', 2016),
('TR-002', 'ANG-002', 25000, '28/07/2016', '11:31:58', 'Juli', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `simpanwajib`
--

CREATE TABLE `simpanwajib` (
  `kode_transaksi` varchar(10) NOT NULL,
  `No_Anggota` varchar(10) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `tanggal_transaksi` varchar(25) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanwajib`
--

INSERT INTO `simpanwajib` (`kode_transaksi`, `No_Anggota`, `Bulan`, `Tahun`, `tanggal_transaksi`, `nominal`) VALUES
('TR-001', 'ANG-001', 'Januari', 2016, '28/07/2016 10:34:27', 10000),
('TR-002', 'ANG-002', 'Januari', 2016, '28/07/2016 11:31:34', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `ID_Unit` varchar(10) NOT NULL,
  `Unit_Kerja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`ID_Unit`, `Unit_Kerja`) VALUES
('UK-001', 'Galangan 1'),
('UK-002', 'Galangan 2'),
('UK-003', 'Galangan 3'),
('UK-004', 'Galangan 4'),
('UK-005', 'Galangan 5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `kode_user`, `Nama_Lengkap`, `Username`, `Password`, `Level`) VALUES
(6, 'USR-001', 'Pengurus', 'pengurus', '0181a4b54d3adfd637ba1cf16e167e1e', 3),
(7, 'adminuser', 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(9, 'USR-002', 'Ketua', 'ketua', 'c39f48f2b9f2499963622152a2e9a97b', 2);

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
  ADD PRIMARY KEY (`kode_angsuran`);

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`kode_cicilan`);

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
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `settingnominalsimpanan`
--
ALTER TABLE `settingnominalsimpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanpokok`
--
ALTER TABLE `simpanpokok`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `simpansukarela`
--
ALTER TABLE `simpansukarela`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `simpanwajib`
--
ALTER TABLE `simpanwajib`
  ADD PRIMARY KEY (`kode_transaksi`);

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
-- AUTO_INCREMENT for table `settingnominalsimpanan`
--
ALTER TABLE `settingnominalsimpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

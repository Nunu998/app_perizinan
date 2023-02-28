-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 05:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perizinan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_barang`) VALUES
(2, 'Buah-buahan'),
(3, 'Beras');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_daftar` int(11) NOT NULL,
  `nama_permohonan` char(50) NOT NULL,
  `kecamatan` char(40) NOT NULL,
  `kelurahan` char(40) NOT NULL,
  `nomor_surat` varchar(70) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nomor_telahaan` varchar(70) NOT NULL,
  `tanggal` date NOT NULL,
  `dibangun` char(40) NOT NULL,
  `luas_tanah` char(40) NOT NULL,
  `dalam_bentuk` char(10) NOT NULL,
  `kawasan` char(40) NOT NULL,
  `titik1` char(40) NOT NULL,
  `titik2` char(40) NOT NULL,
  `file_telahaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` int(11) NOT NULL,
  `institusi` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kepala` varchar(250) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepala`, `nip`, `email`, `notelp`, `logo`) VALUES
(1, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Banjarmasin', 'Permerintah Kota Banjarmasin', 'Pemerintahan', 'Jl. Sultan Adam No.49, Surgi Mufti, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70122', '-', '-', '-', '(0511) 3302980', 'logo2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` varchar(6) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('J001', 'Kepala Dinas'),
('J002', 'Kepala Bidang'),
('J003', 'Kepala Seksi'),
('J004', 'Staf Pelaksana'),
('J005', ' Cleaning Service '),
('J006', 'Honorer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kbli`
--

CREATE TABLE `tb_kbli` (
  `id` int(11) NOT NULL,
  `nama_kbli` varchar(225) NOT NULL,
  `kode_kbli` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kbli`
--

INSERT INTO `tb_kbli` (`id`, `nama_kbli`, `kode_kbli`) VALUES
(1, 'Pertokoaan', 'KB-10191'),
(2, 'Perumahan', 'KB-Q9912'),
(3, 'Perdagangan', 'KH-923482'),
(4, 'Pariwisata', 'KD-91881');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkat`
--

CREATE TABLE `tb_pangkat` (
  `id_pangkat` varchar(6) NOT NULL,
  `nama_golongan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pangkat`
--

INSERT INTO `tb_pangkat` (`id_pangkat`, `nama_golongan`) VALUES
('P001', 'I/a'),
('P002', 'I/b'),
('P004', 'I/d'),
('P005', 'II/a'),
('P006', 'II/b'),
('P007', 'II/c'),
('P008', 'II/d'),
('P009', 'III/a'),
('P010', 'III/b'),
('P011', 'III/c'),
('P012', 'III/d'),
('P013', 'IV/a'),
('P014', 'IV/b'),
('P015', 'IV/c'),
('P016', 'IV/d'),
('P017', 'IV/e'),
('P018', 'Lainya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `no_urut` int(6) NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tempat` varchar(60) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `hp` varchar(225) NOT NULL,
  `id_pangkat` varchar(30) NOT NULL,
  `id_jabatan` varchar(30) NOT NULL,
  `id_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`no_urut`, `nama_pegawai`, `nip`, `tempat`, `tanggal_lahir`, `jk`, `agama`, `hp`, `id_pangkat`, `id_jabatan`, `id_status`) VALUES
(35, 'Ainun Jariyah', '911311919199', 'Banjarmasin', '1996-09-01', 'Perempuan', 'islam', '085347576930', 'Pembina Utama Muda (IV/c)', 'Kadis', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_telahaan`
--

CREATE TABLE `tb_telahaan` (
  `id_telahaan` int(11) NOT NULL,
  `nama_lengkap` char(50) CHARACTER SET latin1 NOT NULL,
  `nomor_surat` varchar(225) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `nama_perusahan` varchar(225) CHARACTER SET latin1 NOT NULL,
  `no_induk` varchar(225) CHARACTER SET latin1 NOT NULL,
  `nama_kbli` varchar(225) CHARACTER SET latin1 NOT NULL,
  `kode_kbli` varchar(225) CHARACTER SET latin1 NOT NULL,
  `bidang` varchar(225) CHARACTER SET latin1 NOT NULL,
  `alamat_usaha` text CHARACTER SET latin1 NOT NULL,
  `desa` varchar(225) CHARACTER SET latin1 NOT NULL,
  `kecamatan` varchar(225) CHARACTER SET latin1 NOT NULL,
  `kabupaten` varchar(225) CHARACTER SET latin1 NOT NULL,
  `provinsi` varchar(225) CHARACTER SET latin1 NOT NULL,
  `file_telahaan` varchar(225) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(225) CHARACTER SET latin1 NOT NULL,
  `konfirmasi` enum('Menunggu','Sukses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_telahaan`
--

INSERT INTO `tb_telahaan` (`id_telahaan`, `nama_lengkap`, `nomor_surat`, `tanggal`, `perihal`, `alamat`, `nama_perusahan`, `no_induk`, `nama_kbli`, `kode_kbli`, `bidang`, `alamat_usaha`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `file_telahaan`, `keterangan`, `konfirmasi`) VALUES
(33, 'Tegar Putera', '6161616/uwhwi/2002', '2023-02-10', 'permohonn izin usaha', 'jl. cemara', 'PT.MANTAP', '81718131', 'Pertokoaan', 'KB-10191', 'Pertokoaan', 'JL.MAWAR', 'Sei miai', 'banjarmasin', 'banjarmasin', 'kalsel', '40353655_WhatsApp Image 2023-02-03 at 12.26.30.jpeg', '- Permohonan Izin Usaha Telah Selesai-\r\n(Admin)', 'Sukses'),
(34, 'Tegar Putera', '1414', '2023-02-15', '324234', '23423', '2342', '234', 'Perdagangan', 'KH-923482', 'Pariwisata', '2342', '234', '234', '234', '234', '19908327_WhatsApp Image 2023-02-03 at 12.26.30.jpeg', '-Mohon Tunggu Ya, Admin Akan Memberikan Keterangan-', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usaha`
--

CREATE TABLE `tb_usaha` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_permohonan` varchar(225) NOT NULL,
  `nama_permohonan` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `skala` varchar(225) NOT NULL,
  `nib` varchar(225) NOT NULL,
  `nama_perizinan` varchar(225) NOT NULL,
  `jenis_perizinan` varchar(225) NOT NULL,
  `kategori` varchar(225) NOT NULL,
  `sektor_perizinan` varchar(225) NOT NULL,
  `sektor_usaha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usaha`
--

INSERT INTO `tb_usaha` (`id`, `tanggal`, `jenis_permohonan`, `nama_permohonan`, `alamat`, `skala`, `nib`, `nama_perizinan`, `jenis_perizinan`, `kategori`, `sektor_perizinan`, `sektor_usaha`) VALUES
(4, '2023-02-07', 'PT', 'Tegar Putera', 'Jl. Cemara Raya Sultan Adam', 'UMK', '1818912910', 'Persetujuan PKPLH', 'Persyaratan Dasar', 'Perizinan Berusaha', 'Lingkungan Hidup', '	Perikanan');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(225) NOT NULL,
  `nama_belakang` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` varchar(30) NOT NULL,
  `no_hp` varchar(225) NOT NULL,
  `status` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_depan`, `nama_belakang`, `nama_lengkap`, `username`, `password`, `email`, `level`, `no_hp`, `status`) VALUES
(26, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '085347576930', 'yes'),
(50, 'Tegar ', 'Putera', 'Tegar Putera ', 'tegar', '1d31802d64bae29d88923d795fc73734', 'tegar@gmail.com', 'pemohon', '085347576930', 'yes'),
(51, 'Saipulah', 'Amat', 'Saipukah Amat', 'saipulah', '84cadc6894f7731745b45c38163d179e', 'saipulah@gmail.com', 'pemohon', '085347576930', 'yes'),
(52, 'Ahmad', 'Laili', 'Ahmad Laili Saputra', 'amat', 'c6c6eabaf10b3a79d73cd5810a56643e', 'amat@gmail.com', 'pemohon', '085347576930', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kbli`
--
ALTER TABLE `tb_kbli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `tb_telahaan`
--
ALTER TABLE `tb_telahaan`
  ADD PRIMARY KEY (`id_telahaan`);

--
-- Indexes for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kbli`
--
ALTER TABLE `tb_kbli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `no_urut` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_telahaan`
--
ALTER TABLE `tb_telahaan`
  MODIFY `id_telahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

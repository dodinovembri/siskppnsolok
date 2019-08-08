-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 08:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siskppnsolok`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21548ea3f8da333f6410c12ae31a17b4'),
('dnx', 'dc82a0e0107a31ba5d137a47ab09a26b');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `no_surat` varchar(10) NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `satker` varchar(300) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `bank_retur` varchar(200) NOT NULL,
  `tanggal_ralat` varchar(20) NOT NULL,
  `status_kepala` varchar(5) NOT NULL,
  `ket_jabatan_kepala` varchar(40) NOT NULL,
  `nama_kepala` varchar(75) NOT NULL,
  `nip_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`no_surat`, `tanggal_surat`, `kode`, `kepada`, `satker`, `tempat`, `bank_retur`, `tanggal_ralat`, `status_kepala`, `ket_jabatan_kepala`, `nama_kepala`, `nip_kepala`) VALUES
('1', '2018-08-07', '656109', ' Komisi Pemilihan Umum Kab. Solok Selatan', 'PA/PP-SPM Satker', 'Koto Baru', 'BRI Cabang Solok', '2018-08-18', '', '', 'Junaidi', ' 196408271985031003'),
('2', '2018-08-07', '656109', ' Komisi Pemilihan Umum Kab. Solok Selatan', 'PA/PP-SPM Satker', 'kantor', 'BRI Cabang Solok', '2018-08-16', '', '', 'Junaidi', ' 196408271985031003'),
('23', '2018-08-07', '656109', ' Komisi Pemilihan Umum Kab. Solok Selatan', 'PA/PP-SPM Satker', 'kantor', 'BRI Cabang Solok', '2018-08-16', '', '', 'Junaidi', ' 196408271985031003');

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`kode`, `nama`) VALUES
('123', 'Solok'),
('656109', 'Komisi Pemilihan Umum Kab. Solok Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama_pegawai`, `password`, `jabatan`) VALUES
('123', 'dodi', 'dodi', 'kepala'),
('196408271985031003', 'Junaidi', 'p123', 'Kepala Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_atas`
--

CREATE TABLE `pegawai_atas` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jabatan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_atas`
--

INSERT INTO `pegawai_atas` (`nip`, `nama`, `jabatan`) VALUES
('196008191985102001', 'Gusmeri', 'Kepala Seksi Bank'),
('196408271985031003', 'Junaidi', 'Kepala Kantor'),
('197504191996021001', 'In Setyo Utomo', 'Kasubbag Umum'),
('197903052002121007', 'Andi Kurnia', 'Kepala Seksi MSKI');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_skpp`
--

CREATE TABLE `pengembalian_skpp` (
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `pengembalian_atas_nama` varchar(75) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `no_surat_pengajuan` varchar(100) NOT NULL,
  `tanggal_pengajuan` varchar(20) NOT NULL,
  `alasan` text NOT NULL,
  `status_kepala` varchar(20) NOT NULL,
  `ket_jabatan_kepala` varchar(100) NOT NULL,
  `nama_kepala` varchar(75) NOT NULL,
  `nip_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian_skpp`
--

INSERT INTO `pengembalian_skpp` (`no_surat`, `tanggal_surat`, `lampiran`, `pengembalian_atas_nama`, `kepada`, `tempat`, `no_surat_pengajuan`, `tanggal_pengajuan`, `alasan`, `status_kepala`, `ket_jabatan_kepala`, `nama_kepala`, `nip_kepala`) VALUES
('1', '2018-08-06', 'satu', 'Dodi', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 'sakit', '', '', 'Junaidi', '196408271985031003'),
('11', '2018-08-06', 'satu', 'Dodi', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 'sakit', '', '', 'Junaidi', '196408271985031003'),
('111', '2018-08-06', 'satu', 'Dodi', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 'sakit', '', '', 'Junaidi', '196408271985031003'),
('1111', '2018-08-06', 'satu', 'Dodi', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 'sakit', 'Plt.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007');

-- --------------------------------------------------------

--
-- Table structure for table `penolakan_spms`
--

CREATE TABLE `penolakan_spms` (
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `no_surat_pengajuan` varchar(50) NOT NULL,
  `tanggal_pengajuan` varchar(20) NOT NULL,
  `alasan` varchar(400) NOT NULL,
  `pesan` varchar(400) NOT NULL,
  `status_kepala` varchar(20) NOT NULL,
  `ket_jabatan_kepala` varchar(100) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `nip_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penolakan_spms`
--

INSERT INTO `penolakan_spms` (`no_surat`, `tanggal_surat`, `kepada`, `tempat`, `no_surat_pengajuan`, `tanggal_pengajuan`, `alasan`, `pesan`, `status_kepala`, `ket_jabatan_kepala`, `nama_kepala`, `nip_kepala`) VALUES
('1', '2018-08-06', 'Solok', 'kantor', '222', '2018-08-04', 'Tertolak', 'Pemalas Lu', 'Plt.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('11', '2018-08-06', 'Solok', 'kantor', '222', '2018-08-04', 'Tertolak', 'Pemalas Lu', 'Plt.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('111', '2018-08-06', 'Solok', 'kantor', '222', '2018-08-04', 'Tertolak', 'Pemalas Lu', 'Plt.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('2', '2018-08-06', 'Solok', 'dd', 'hh', '2018-08-22', 'sakit', 'ss', '', '', 'Junaidi', '196408271985031003');

-- --------------------------------------------------------

--
-- Table structure for table `ptup`
--

CREATE TABLE `ptup` (
  `no_surat` varchar(5) NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `no_surat_pengajuan` varchar(150) NOT NULL,
  `tanggal_pengajuan` varchar(20) NOT NULL,
  `jumlah_uang` bigint(20) NOT NULL,
  `no_beban` varchar(150) NOT NULL,
  `tanggal_ketetapan_beban` varchar(20) NOT NULL,
  `status_kepala` varchar(50) NOT NULL,
  `ket_jabatan_kepala` varchar(100) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `nip_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ptup`
--

INSERT INTO `ptup` (`no_surat`, `tanggal_surat`, `kode`, `kepada`, `tempat`, `no_surat_pengajuan`, `tanggal_pengajuan`, `jumlah_uang`, `no_beban`, `tanggal_ketetapan_beban`, `status_kepala`, `ket_jabatan_kepala`, `nama_kepala`, `nip_kepala`) VALUES
('1', '2018-08-06', '656109', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 2000988, '2321', '2018-08-06', 'Plh.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('11', '2018-08-06', '656109', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 2000988, '2321', '2018-08-06', 'Plh.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('111', '2018-08-06', '656109', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 2000988, '2321', '2018-08-06', 'Plh.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007'),
('1111', '2018-08-06', '656109', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'kantor', '222', '2018-08-06', 2000988, '2321', '2018-08-06', 'Plh.', 'Kepala Pencairan Dana', 'Andi Kurnia', '197903052002121007');

-- --------------------------------------------------------

--
-- Table structure for table `vera`
--

CREATE TABLE `vera` (
  `no_surat` varchar(10) NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `sanksi` varchar(100) NOT NULL,
  `status_kepala` varchar(50) NOT NULL,
  `ket_jabatan_kepala` varchar(100) NOT NULL,
  `nama_kepala` varchar(75) NOT NULL,
  `nip_kepala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vera`
--

INSERT INTO `vera` (`no_surat`, `tanggal_surat`, `kepada`, `sanksi`, `status_kepala`, `ket_jabatan_kepala`, `nama_kepala`, `nip_kepala`) VALUES
('1', '2018-08-06', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'Tegas', '', '', 'Junaidi', '196408271985031003'),
('11', '2018-08-06', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'Tegas', '', '', 'Junaidi', '196408271985031003'),
('113', '2018-08-06', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'Tegas', '', '', 'Junaidi', '196408271985031003'),
('32', '2018-08-15', 'Komisi Pemilihan Umum Kab. Solok Selatan', 'Tegas', '', '', 'Junaidi', '196408271985031003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pegawai_atas`
--
ALTER TABLE `pegawai_atas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pengembalian_skpp`
--
ALTER TABLE `pengembalian_skpp`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `penolakan_spms`
--
ALTER TABLE `penolakan_spms`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `ptup`
--
ALTER TABLE `ptup`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `vera`
--
ALTER TABLE `vera`
  ADD PRIMARY KEY (`no_surat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

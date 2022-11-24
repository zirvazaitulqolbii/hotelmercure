-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 03:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbuhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Pasha Bhimasty', 'pasa', 'pasa1234');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` varchar(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `tipe`, `deskripsi`, `harga`, `status`) VALUES
('Dlx001', 'Deluxe', 'Kamar ini bertipe Deluxe.', 2000000, 'Unbooked'),
('Dlx002', 'Deluxe', 'Kamar nomor 2 tipe Deluxe', 3000000, 'Unbooked'),
('Dlx003', 'Deluxe', 'Kamar nomor 3 tipe Deluxe', 2000000, 'Unbooked'),
('Dlx004', 'Deluxe', 'Kamar nomor 3 tipe Deluxe', 2500000, 'Unbooked'),
('Dlx005', 'Deluxe', 'Kamar nomor 5 tipe Deluxe', 2750000, 'Unbooked'),
('Std001', 'Standard', 'Kamar ini bertipe Standard.', 500000, 'Unbooked'),
('Std002', 'Standard', 'Kamar nomor 2 tipe Standard', 450000, 'Unbooked'),
('Std003', 'Standard', 'Kamar nomor 3 tipe Standard', 500000, 'Unbooked'),
('Std004', 'Standard', 'Kamar nomor 4 tipe Standard', 500000, 'Unbooked'),
('Std005', 'Standard', 'Kamar nomor 5 tipe Standard', 600000, 'Unbooked'),
('Sup001', 'Superior', 'Kamar ini bertipe Superior.', 1000000, 'Unbooked'),
('Sup002', 'Superior', 'Kamar nomor 2 tipe Superior', 1000000, 'Unbooked'),
('Sup003', 'Superior', 'Kamar nomor 3 tipe Superior', 1000000, 'Unbooked'),
('Sup004', 'Superior', 'Kamar nomor 4 tipe Superior', 1200000, 'Unbooked'),
('Sup005', 'Superior', 'Kamar nomor 5 tipe Superior', 1200000, 'Unbooked');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`nik`, `nama`, `alamat`, `telepon`) VALUES
('33122006000002', 'Ana Lusi', 'Solo, Jawa Tengah', '083445066899'),
('33122006000011', 'Nita Sari', 'Sragen, Jawa Tengah', '085604054402'),
('3312201200201', 'Xelin Shine', 'Solo, Jawa Tengah', '082234345678'),
('33122012170001', 'Rina Rain', 'Bantul, Yogyakarta', '087804050098'),
('3331110220001', 'Pasha Bhimasty', 'Wonogiri, Jawa Tengah', '082221172827');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_kamar` varchar(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_kamar`, `nik`, `checkin`, `checkout`, `total_harga`, `status`) VALUES
(16, 'Dlx001', '3312201200201', '2020-01-12', '2020-01-20', 16000000, 'Check Out'),
(17, 'Sup004', '3312201200201', '2020-02-11', '2020-01-28', 16800000, 'Check Out'),
(18, 'Dlx003', '3312201200201', '2020-01-20', '2020-01-22', 4000000, 'Check Out'),
(19, 'Dlx002', '3312201200201', '2020-02-18', '2020-01-20', 87000000, 'Check Out'),
(20, 'Dlx005', '3312201200201', '2020-03-17', '2020-01-24', 143000000, 'Check Out'),
(21, 'Std002', '3312201200201', '2020-03-19', '2020-01-21', 25650000, 'Check Out'),
(22, 'Sup002', '3312201200201', '2020-04-08', '2020-04-10', 2000000, 'Check Out'),
(23, 'Std004', '3312201200201', '2020-04-27', '2020-04-29', 1000000, 'Check Out'),
(24, 'Std005', '33122006000011', '2020-05-12', '2020-05-14', 1200000, 'Check Out'),
(26, 'Sup003', '33122006000011', '2020-07-13', '2020-07-15', 2000000, 'Check In'),
(27, 'Sup001', '33122006000011', '2020-08-25', '2020-07-28', 28000000, 'Check In'),
(28, 'Sup005', '33122006000011', '2020-08-01', '2020-08-03', 2400000, 'Check In'),
(30, 'Sup003', '3331110220001', '2020-09-02', '2020-09-05', 3000000, 'Check Out'),
(31, 'Std003', '3331110220001', '2020-09-20', '2020-09-22', 1000000, 'Check Out'),
(32, 'Dlx004', '3331110220001', '2020-10-21', '2020-10-22', 2500000, 'Check Out'),
(33, 'Dlx002', '3331110220001', '2020-11-21', '2020-11-23', 6000000, 'Check Out'),
(34, 'Sup004', '3331110220001', '2020-11-25', '2020-11-28', 3600000, 'Check Out'),
(35, 'Std001', '3331110220001', '2020-11-13', '2020-11-16', 1500000, 'Check Out'),
(36, 'Dlx005', '3331110220001', '2020-12-15', '2020-12-21', 16500000, 'Check Out'),
(37, 'Sup002', '3331110220001', '2020-12-30', '2021-01-31', 32000000, 'Check Out'),
(38, 'Dlx001', '33122006000002', '2020-12-15', '2020-12-24', 18000000, 'Check Out'),
(39, 'Sup004', '33122006000002', '2020-12-27', '2020-12-30', 3600000, 'Check Out');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nik` (`nik`),
  ADD KEY `no_kamar` (`no_kamar`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tamu` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

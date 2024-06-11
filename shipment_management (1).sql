-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 07:20 PM
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
-- Database: `shipment_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `nama_client` varchar(100) NOT NULL,
  `alamat_client` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `nama_client`, `alamat_client`, `telepon`, `email`) VALUES
(1, 'Rizki Mufid', 'Padang Panjang', '089528496623', 'geroo@gmail.com'),
(3, 'Angor', 'Pariaman', '0823827897283', 'angor@jj.com'),
(4, 'Agum', 'Payakumbuh', '082372387812', 'agumjojo@may.co');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `nama_supir` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `nama_supir`, `alamat`, `telepon`, `email`) VALUES
(1, 'Supriandi', 'Padang Luar', '82378981723', 'pupri@gmail.com'),
(2, 'Latief', 'Maninjau', '087066234521', 'latipgay@gmail.com'),
(4, 'Rafi', 'Solok Selatan', '082372837123', 'rapidin@gmail.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `warehouse_id` int(11) NOT NULL,
  `nama_gudang` varchar(100) NOT NULL,
  `alamat_gudang` varchar(200) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `kapasitas_terpakai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`warehouse_id`, `nama_gudang`, `alamat_gudang`, `kapasitas`, `kapasitas_terpakai`) VALUES
(1, 'PT HABI', 'Padang', 10000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `shipment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `tanggal_muat` date NOT NULL,
  `tanggal_bongkar` date NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `target_pengiriman` int(11) NOT NULL,
  `asal_gudang_id` int(11) NOT NULL,
  `tujuan_bongkar` varchar(100) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `realisasi_pengiriman` int(11) NOT NULL,
  `keterlambatan` int(11) DEFAULT NULL,
  `status_pengiriman` enum('Belum Berangkat','Dalam Perjalanan','Telah Sampai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`shipment_id`, `client_id`, `tanggal_muat`, `tanggal_bongkar`, `jenis_barang`, `target_pengiriman`, `asal_gudang_id`, `tujuan_bongkar`, `plat`, `driver_id`, `realisasi_pengiriman`, `keterlambatan`, `status_pengiriman`) VALUES
(1, 1, '2024-06-08', '2024-06-11', 'ESTA KIESER-MAG', 4, 1, 'CIPTA FUTURA ESTATE', 'BA 8219 QU', 4, 4, 0, 'Belum Berangkat'),
(2, 3, '2024-06-11', '2024-06-15', 'ESTA KIESER-MAG', 4, 1, 'CIPTA FUTURA ESTATE', 'BA 2302 NA', 4, 0, 0, 'Telah Sampai'),
(3, 4, '2024-06-10', '2024-06-13', 'ESTA KIESER-MAG', 4, 1, 'CIPTA FUTURA ESTATE', 'BA 1234 ON', 4, 3, 0, 'Dalam Perjalanan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'reyhan', 'alfaro', 'reyhan@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `asal_gudang_id` (`asal_gudang_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`asal_gudang_id`) REFERENCES `gudang` (`warehouse_id`),
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

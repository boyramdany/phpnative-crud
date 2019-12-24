-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 03:31 PM
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
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `umur` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `email`, `alamat`, `umur`, `jenis_kelamin`, `gambar`) VALUES
(1, 'Boy Ramdany', 'boyramdany97@gmail.com', 'Depok', '22 Tahun', 'Pria', '5.JPG'),
(2, 'Wina', 'wina@gmail.com', 'Depok', '21 Tahun', 'Wanita', 'wina.jpg'),
(3, 'Hasbi', 'hasbi@gmail.com', 'Depok', '22 Tahun', 'Pria', 'hasbi.jpg'),
(4, 'Chamim', 'chamim@gmail.com', 'Depok', '21 Tahun', 'Pria', 'chamim.jpg'),
(5, 'Sabil', 'sabil@yahoo.co.id', 'Rawadenok', '22 Tahun', 'Pria', 'sabil.jpg'),
(6, 'Satria', 'satria@yahoo.com', 'Bogor', '22 Tahun', 'Pria', 'satria.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'dani', 'dani@gmail.com', '$2y$10$RwtJqOswt3pVHMtAnLUy5um72DDz.jIu9nCO/9MQa6ARnEt97GEcK'),
(2, 'boyramdany', 'boyramdany97@gmail.com', '$2y$10$1o1wDbTAjVESgbV.a6HBlOAQmr/VPwcUulgvra8L0.QWbUNuuD3xe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

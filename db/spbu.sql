-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 08:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spbu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtl_penerimaan`
--

CREATE TABLE `dtl_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_penerimaan` varchar(100) NOT NULL,
  `nozzle` varchar(100) NOT NULL,
  `awal` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `volume_nozzle` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `jenis_bbm` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_penerimaan`
--

INSERT INTO `dtl_penerimaan` (`id`, `kode_penerimaan`, `nozzle`, `awal`, `akhir`, `volume_nozzle`, `user_id`, `jenis_bbm`, `tanggal`) VALUES
(1, 'PR-admin-22102019001', 'Nozzle a', 2000, 5000, 3000, 'admin', 'Bensin', '0000-00-00'),
(2, 'PR-admin-22102019002', 'Nozzle a', 500, 2000, 1500, 'admin', 'Bensin', '0000-00-00'),
(3, 'PR-admin-22102019003', 'Nozzle a', 500, 500, 0, 'admin', 'Pertamax', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bbm`
--

CREATE TABLE `jenis_bbm` (
  `id` int(11) NOT NULL,
  `kode_bbm` varchar(100) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `stok_awal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bbm`
--

INSERT INTO `jenis_bbm` (`id`, `kode_bbm`, `bbm`, `stok_awal`) VALUES
(2, '001', 'Bensin', 0),
(3, '002', 'Solar', 0),
(4, '003', 'Pertamax', 100),
(5, '004', 'Pertalite', 5000);

--
-- Triggers `jenis_bbm`
--
DELIMITER $$
CREATE TRIGGER `insert_stok` AFTER INSERT ON `jenis_bbm` FOR EACH ROW BEGIN
 INSERT INTO stok SET
 kode_bbm = NEW.kode_bbm,bbm=NEW.bbm,stok=NEW.stok_awal
 ON DUPLICATE KEY UPDATE stok=NEW.stok_awal;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(20) NOT NULL,
  `kode_penerimaan` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_bbm` varchar(100) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jml_penerimaan` int(100) NOT NULL,
  `titipan` int(11) NOT NULL,
  `subtotal_stok` int(11) NOT NULL,
  `volume_totalisator` int(11) NOT NULL,
  `tera` int(11) NOT NULL,
  `volume_penjualan` double NOT NULL,
  `akhir_teoritis` int(11) NOT NULL,
  `akhir_actual` int(11) NOT NULL,
  `losses` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `kode_penerimaan`, `user_id`, `tanggal`, `jenis_bbm`, `stok_awal`, `jml_penerimaan`, `titipan`, `subtotal_stok`, `volume_totalisator`, `tera`, `volume_penjualan`, `akhir_teoritis`, `akhir_actual`, `losses`, `status`) VALUES
(1, 'PR-admin-22102019001', 'admin', '2019-10-22', 'Bensin', 53490, 1000, 0, 54490, 3000, 500, 2500, 51990, 49000, '-0.06%/(-2990 liter)', 'Clear'),
(2, 'PR-admin-22102019002', 'admin', '2019-10-22', 'Bensin', 51990, 500, 0, 52490, 1500, 500, 1000, 51490, 49000, '-0.05%/(-2490 liter)', 'Clear'),
(3, 'PR-admin-22102019003', 'admin', '2019-10-22', 'Pertamax', 16950, 500, 0, 17450, 0, 0, 0, 17450, 1500, '-10.63%/(-15950 liter)', 'Clear');

--
-- Triggers `penerimaan`
--
DELIMITER $$
CREATE TRIGGER `update_stok_akhir` BEFORE INSERT ON `penerimaan` FOR EACH ROW BEGIN
UPDATE stok set stok = NEW.akhir_teoritis where bbm = NEW.jenis_bbm;
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `kode_bbm` varchar(100) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `stok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `kode_bbm`, `bbm`, `stok`) VALUES
(1, '001', 'Bensin', 51490),
(2, '002', 'Solar', 1000),
(3, '003', 'Pertamax', 17450),
(4, '004', 'Pertalite', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Pengawas') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', ''),
(3, 'Eko Kurniadi', 'pengawas001', '029cea6f834c9fec914ba204fb39598757e94a04', 'Pengawas', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtl_penerimaan`
--
ALTER TABLE `dtl_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtl_penerimaan`
--
ALTER TABLE `dtl_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_bbm`
--
ALTER TABLE `jenis_bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

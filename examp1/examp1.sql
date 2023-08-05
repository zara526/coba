-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 06:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` float NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama`, `harga`, `stok`) VALUES
('K1', 'kitab', 50000, 20),
('S1', 'Sarung Batik Pajajaran', 225000, 60),
('S2', 'Syurban Tarim', 100000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pem` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pem`, `nama`, `jenis_kelamin`, `alamat`) VALUES
('A01', 'Fahid Anwar', 'L', 'Jl. Mangkubumi, Kota Malang'),
('A02', 'Aina Meisara', 'P', 'Jl. Harapan, Kota Banyuwangi'),
('A03', 'Ahnaf Lathifullah', 'L', 'Jl. Masakini, Kota Surabaya'),
('A04', 'Zain El Farizi', 'L', 'Jl. Cibubur, Kota Jakarta'),
('B01', 'Fatma Rosalia', 'P', 'Jl. Danau Kecebong, Kota Medan'),
('B02', 'Puput Wilona', 'P', 'Jl. Kahuripan, Kota Malang'),
('A05', 'Ananta Burhan Hasbullah', 'L', 'Jl. Unta , Kota Jepara');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_brg` varchar(10) NOT NULL,
  `id_pem` varchar(10) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `jml_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode_brg`, `id_pem`, `tgl_beli`, `jml_beli`) VALUES
('S2', 'A01', '2023-08-01 11:03:16', 2),
('K1', 'B01', '2023-08-04 06:03:16', 3);
COMMIT;

-- Indeks untuk tabel 'barang'
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
--
--

-- Indeks untuk tabel 'pembeli'
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pem`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

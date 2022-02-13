-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 06:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset_bangunan`
--

CREATE TABLE `aset_bangunan` (
  `Idx` int(11) NOT NULL,
  `Nama Bangunan` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Luas_Bangunan` int(11) DEFAULT NULL,
  `Jumlah_Lantai` int(11) DEFAULT NULL,
  `Tahun_Dibangun` int(11) DEFAULT NULL,
  `Tahun_Digunakan` int(11) DEFAULT NULL,
  `Nilai_Perolehan` int(11) DEFAULT NULL,
  `Penambahan_Nilai_Manfaat` int(11) DEFAULT NULL,
  `Umur_Ekonomis` int(11) DEFAULT NULL,
  `Lama_Digunakan` int(11) DEFAULT NULL,
  `Tarif` float DEFAULT NULL,
  `Akumulasi` int(11) DEFAULT NULL,
  `Nilai_Buku` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_bangunan`
--

INSERT INTO `aset_bangunan` (`Idx`, `Nama Bangunan`, `Alamat`, `Luas_Bangunan`, `Jumlah_Lantai`, `Tahun_Dibangun`, `Tahun_Digunakan`, `Nilai_Perolehan`, `Penambahan_Nilai_Manfaat`, `Umur_Ekonomis`, `Lama_Digunakan`, `Tarif`, `Akumulasi`, `Nilai_Buku`) VALUES
(1, 'Menara', 'Jln Ganesha 7 Bandung', 9, 1, NULL, 2013, NULL, NULL, 20, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aset_furniture_peralatan`
--

CREATE TABLE `aset_furniture_peralatan` (
  `Idx` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `merk_type` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `tahun_perolehan` int(11) DEFAULT NULL,
  `sumber_perolehan` varchar(255) DEFAULT NULL,
  `jumlah_perolehan` int(11) DEFAULT NULL,
  `harga_satuan_perolehan` int(11) DEFAULT NULL,
  `nilai_perolehan` int(11) DEFAULT NULL,
  `UE_penyusutan` int(11) DEFAULT NULL,
  `tarif_penyusutan` float DEFAULT NULL,
  `akumulasi_penyusutan` float DEFAULT NULL,
  `nilai_buku` int(11) DEFAULT NULL,
  `PJ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_furniture_peralatan`
--

INSERT INTO `aset_furniture_peralatan` (`Idx`, `nama_barang`, `merk_type`, `kategori`, `tahun_perolehan`, `sumber_perolehan`, `jumlah_perolehan`, `harga_satuan_perolehan`, `nilai_perolehan`, `UE_penyusutan`, `tarif_penyusutan`, `akumulasi_penyusutan`, `nilai_buku`, `PJ`) VALUES
(1, 'Setrika', 'Phillips HD 1172', 'Elektronik Multimedia', 2003, 'YPM', 1, NULL, NULL, 4, NULL, NULL, NULL, 'Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `aset_kendaraan`
--

CREATE TABLE `aset_kendaraan` (
  `Idx` int(11) NOT NULL,
  `Jenis_merk` varchar(255) DEFAULT NULL,
  `nomor_mesin` varchar(255) DEFAULT NULL,
  `nomor_rangka` varchar(255) DEFAULT NULL,
  `isi_silinder` int(11) DEFAULT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL,
  `no_bpkb` varchar(255) DEFAULT NULL,
  `no_polisi` varchar(255) DEFAULT NULL,
  `sumber_dana` varchar(255) DEFAULT NULL,
  `jumlah_unit` int(11) DEFAULT NULL,
  `nilai_perolehan` int(11) DEFAULT NULL,
  `ue_penyusutan` int(11) DEFAULT NULL,
  `tarif_penyusutan` float DEFAULT NULL,
  `akumulasi_penyusutan` float DEFAULT NULL,
  `nilai_buku` int(11) DEFAULT NULL,
  `pj` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_kendaraan`
--

INSERT INTO `aset_kendaraan` (`Idx`, `Jenis_merk`, `nomor_mesin`, `nomor_rangka`, `isi_silinder`, `tahun_pembuatan`, `no_bpkb`, `no_polisi`, `sumber_dana`, `jumlah_unit`, `nilai_perolehan`, `ue_penyusutan`, `tarif_penyusutan`, `akumulasi_penyusutan`, `nilai_buku`, `pj`) VALUES
(1, 'Honda Supra V', 'KEV5E - 1011246', 'MHIKEV51X2K011078', 100, 2002, '1587582', 'D 3134 SR', 'Hibah', 1, NULL, 8, 12.5, NULL, NULL, 'Motor - Pusat');

-- --------------------------------------------------------

--
-- Table structure for table `aset_tanah`
--

CREATE TABLE `aset_tanah` (
  `Idx` int(11) NOT NULL,
  `Jalan` varchar(255) DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `RT` int(11) DEFAULT NULL,
  `RW` int(11) DEFAULT NULL,
  `Desa_Kelurahan` varchar(255) DEFAULT NULL,
  `Kecamatan` varchar(255) DEFAULT NULL,
  `Kabupaten_Kota` varchar(255) DEFAULT NULL,
  `Propinsi` varchar(255) DEFAULT NULL,
  `Tanggal_Perolehan` date DEFAULT NULL,
  `No_Persil` int(11) DEFAULT NULL,
  `No_Sertifikat` varchar(255) DEFAULT NULL,
  `NIB` varchar(255) DEFAULT NULL,
  `Luas` int(11) DEFAULT NULL,
  `Harga_Satuan` int(11) DEFAULT NULL,
  `Nilai_Perolehan` int(11) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_tanah`
--

INSERT INTO `aset_tanah` (`Idx`, `Jalan`, `No`, `RT`, `RW`, `Desa_Kelurahan`, `Kecamatan`, `Kabupaten_Kota`, `Propinsi`, `Tanggal_Perolehan`, `No_Persil`, `No_Sertifikat`, `NIB`, `Luas`, `Harga_Satuan`, `Nilai_Perolehan`, `Keterangan`) VALUES
(1, NULL, NULL, NULL, NULL, 'Cigadung', 'Cibeunying Kaler', 'Bandung', 'Jawa Barat', '2001-04-03', 14, '10.15.1804.-.00014', NULL, 225, NULL, NULL, 'Wakaf dari Ny. Meiyanne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset_bangunan`
--
ALTER TABLE `aset_bangunan`
  ADD PRIMARY KEY (`Idx`);

--
-- Indexes for table `aset_furniture_peralatan`
--
ALTER TABLE `aset_furniture_peralatan`
  ADD PRIMARY KEY (`Idx`);

--
-- Indexes for table `aset_kendaraan`
--
ALTER TABLE `aset_kendaraan`
  ADD PRIMARY KEY (`Idx`);

--
-- Indexes for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  ADD PRIMARY KEY (`Idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset_bangunan`
--
ALTER TABLE `aset_bangunan`
  MODIFY `Idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset_furniture_peralatan`
--
ALTER TABLE `aset_furniture_peralatan`
  MODIFY `Idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset_kendaraan`
--
ALTER TABLE `aset_kendaraan`
  MODIFY `Idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  MODIFY `Idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

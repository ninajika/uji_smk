-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 05:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuis_pameran_prod`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswa`
--

CREATE TABLE `jawaban_siswa` (
  `id` int(11) NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `soal1` text NOT NULL,
  `soal2` text NOT NULL,
  `soal3` text NOT NULL,
  `soal4` text NOT NULL,
  `soal5` text NOT NULL,
  `soal6` text NOT NULL,
  `soal7` text NOT NULL,
  `soal8` text NOT NULL,
  `soal9` text NOT NULL,
  `soal10` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `waktu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban_siswa`
--

INSERT INTO `jawaban_siswa` (`id`, `pengguna`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `soal6`, `soal7`, `soal8`, `soal9`, `soal10`, `jurusan`, `waktu`) VALUES
(23, 'mahasiswa', 'B', 'B', 'D', 'B', 'A', 'A', 'A', 'A', 'A', 'A', 'telekomunikasi', ''),
(24, 'mahasiswa', 'D', 'A', 'A', 'B', 'null', 'null', 'null', 'null', 'null', 'null', 'aksestelekomunikasi', '08:15');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `score` int(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `waktu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `nama`, `score`, `jurusan`, `waktu`) VALUES
(1, 'mahasiswa', 550, 'aksestelekomunikasi', '08:15'),
(2, 'Deden', 570, 'otomatisasiperkebunan', '08:15');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `nama_soal` varchar(255) NOT NULL,
  `jawab1` varchar(255) NOT NULL,
  `jawab2` varchar(255) NOT NULL,
  `jawab3` varchar(255) NOT NULL,
  `jawab4` varchar(255) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `nama_soal`, `jawab1`, `jawab2`, `jawab3`, `jawab4`, `jurusan`) VALUES
(1, 'Apa Itu Kalajengking?', 'A) Hewan berkaki delapan yang memiliki cangkang keras.', 'B) Tanaman berbunga dengan duri tajam.', 'C) Jenis tanaman hias berdaun lebar dan berwarna-warni.', 'D) Ikan predator yang hidup di perairan laut dalam.', 'aksestelekomunikasi'),
(2, 'Apa Itu Kadal?', 'A) Ikan predator yang hidup di perairan laut dalam.', 'B) Jenis tanaman hias berdaun lebar dan berwarna-warni.', 'C) Hewan berkaki delapan yang memiliki cangkang keras.', 'D) Tanaman berbunga dengan duri tajam.', 'aksestelekomunikasi'),
(3, 'Apa Itu Fotosintesis?', 'A) Proses penguraian senyawa organik menjadi senyawa anorganik dengan bantuan energi matahari.', 'B) Proses pembentukan senyawa organik dari senyawa anorganik dengan bantuan energi matahari.', 'C) Proses penguraian senyawa anorganik menjadi senyawa organik tanpa bantuan energi matahari.', 'D) Proses pembentukan senyawa anorganik dari senyawa organik tanpa bantuan energi matahari.', 'aksestelekomunikasi'),
(4, 'Apa yang dimaksud dengan Iklim?', 'A) Kondisi atmosfer suatu tempat pada saat tertentu.', 'B) Cuaca rata-rata suatu tempat dalam rentang waktu yang cukup lama.', 'C) Proses perubahan suhu di Bumi.', 'D) Kondisi udara di atmosfer yang berlangsung dalam waktu yang lama.', 'aksestelekomunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `no_telp`, `asal_sekolah`, `jurusan`) VALUES
(1, 'Deden', '010920192192', 'SMKN 1 Samput', 'perkebunan'),
(7, 'a', '', '', ''),
(8, 'Deden', '010920192192', 'SMKN 1 Samput', 'aksestelekomunikasi'),
(9, 'Alika', '010920192192', 'SMKN 1 Samput', 'otomatisasiperkebunan'),
(10, 'Alika', '010920192192', 'SMKN 1 Samput', 'aksestelekomunikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 10:44 AM
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
(1, 'mahasiswa', 600, 'aksestelekomunikasi', '09:24'),
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
(1, 'Apa yang dimaksud dengan jaringan akses telekomunikasi?', 'A. Jaringan yang menghubungkan komputer dengan internet.', 'B. Jaringan yang menghubungkan perangkat komunikasi pelanggan dengan jaringan inti operator.', 'C. Jaringan yang menghubungkan perangkat lunak dengan perangkat keras.', 'D. Jaringan yang menghubungkan dua komputer secara langsung.', 'aksestelekomunikasi'),
(2, 'Apa fungsi utama dari jaringan akses telekomunikasi?', 'A. Mengatur lalu lintas jaringan di dalam kantor.', 'B. Menghubungkan pengguna akhir dengan penyedia layanan telekomunikasi.', 'C. Mengontrol semua perangkat elektronik di rumah.', 'D. Meningkatkan kecepatan internet di area perumahan.', 'aksestelekomunikasi'),
(3, 'Apa yang dimaksud dengan fiber optik dalam jaringan akses telekomunikasi?', 'A. Kabel yang terbuat dari logam yang menghantarkan sinyal listrik.', 'B. Kabel yang menggunakan serat kaca untuk mentransmisikan data dalam bentuk cahaya.', 'C. Kabel yang terbuat dari plastik dan digunakan untuk jaringan listrik.', 'D. Kabel yang digunakan untuk menghubungkan perangkat audio.', 'aksestelekomunikasi'),
(4, 'Teknologi apa yang biasanya digunakan dalam jaringan akses nirkabel?', 'A. Bluetooth', 'B. Wi-Fi', 'C. Ethernet', 'D. USB', 'aksestelekomunikasi'),
(5, 'Apa kepanjangan dari GPON dalam konteks jaringan akses telekomunikasi?', 'A. General Packet Optical Network', 'B. Gigabit Passive Optical Network', 'C. General Passive Optical Network', 'D. Gigabit Protocol Optical Network', 'aksestelekomunikasi'),
(6, 'Apa perbedaan utama antara jaringan akses nirkabel dan jaringan akses kabel?', 'A. Jaringan nirkabel menggunakan gelombang radio, sedangkan jaringan kabel menggunakan kabel fisik.', 'B. Jaringan nirkabel lebih lambat daripada jaringan kabel.', 'C. Jaringan nirkabel hanya digunakan untuk perangkat seluler.', 'D. Jaringan kabel tidak memerlukan konfigurasi.', 'aksestelekomunikasi'),
(7, 'Perangkat apa yang biasanya digunakan untuk memperluas jangkauan jaringan Wi-Fi?', 'A. Router', 'B. Repeater', 'C. Modem', 'D. Switch', 'aksestelekomunikasi'),
(8, 'Apa kepanjangan dari FTTH dalam jaringan akses telekomunikasi?', 'A. Fiber to the Hub', 'B. Fiber to the Home', 'C. Fiber to the Host', 'D. Fiber to the Hardware', 'aksestelekomunikasi'),
(9, 'Dalam jaringan akses telekomunikasi, apa fungsi dari modem?', 'A. Menghubungkan perangkat jaringan dengan internet.', 'B. Mengubah sinyal digital menjadi sinyal analog dan sebaliknya.', 'C. Menghubungkan perangkat komputer dengan printer.', 'D. Menyimpan data pengguna.', 'aksestelekomunikasi'),
(10, 'Apa yang dimaksud dengan topologi jaringan dalam konteks jaringan akses telekomunikasi?', 'A. Bentuk fisik dari perangkat jaringan.', 'B. Metode enkripsi data dalam jaringan.', 'C. Tata letak atau struktur hubungan antara perangkat dalam jaringan.', 'D. Proses pengiriman data dalam jaringan.', 'aksestelekomunikasi'),
(11, 'Apa yang dimaksud dengan Desain Permodelan dan Informasi Bangunan?', 'a. Jurusan yang mempelajari teknik pembuatan perangkat keras komputer', 'b. Jurusan yang mempelajari pembuatan dan permodelan bangunan serta pengelolaan informasinya', 'c. Jurusan yang mempelajari teknologi pangan dan pertanian', 'd. Jurusan yang mempelajari teknik mesin dan manufaktur', 'modelbangunan'),
(12, 'Software apa yang sering digunakan dalam permodelan bangunan di jurusan ini?', 'a. Microsoft Word', 'b. AutoCAD', 'c. Adobe Photoshop', 'd. CorelDRAW', 'modelbangunan'),
(13, 'Apa tujuan utama dari permodelan bangunan?', 'a. Menghias bangunan agar terlihat menarik', 'b. Membuat gambaran visual dan teknis dari sebuah bangunan sebelum dibangun', 'c. Membuat bangunan menjadi tahan gempa', 'd. Meningkatkan nilai jual properti', 'modelbangunan'),
(14, 'Apa yang dimaksud dengan BIM dalam konteks jurusan Desain Permodelan dan Informasi Bangunan?', 'a. Building Information Modeling', 'b. Building Internet Management', 'c. Basic Information Manual', 'd. Building Improvement Module', 'modelbangunan'),
(15, 'Perangkat lunak mana yang digunakan untuk membuat visualisasi 3D bangunan?', 'a. Blender', 'b. Notepad++', 'c. MATLAB', 'd. SketchUp', 'modelbangunan'),
(16, 'Apa fungsi dari rancangan detail dalam proyek konstruksi?', 'a. Membuat desain interior bangunan', 'b. Memberikan gambaran umum tentang proyek', 'c. Menyediakan panduan teknis untuk konstruksi dan instalasi', 'd. Menghitung anggaran proyek', 'modelbangunan'),
(17, 'Jenis gambar apa yang menunjukkan potongan vertikal bangunan?', 'a. Denah', 'b. Potongan', 'c. Tampak', 'd. Perspektif', 'modelbangunan'),
(18, 'Apa tujuan dari analisis struktural dalam desain bangunan?', 'a. Menentukan warna cat yang tepat untuk bangunan', 'b. Menganalisis beban dan gaya yang bekerja pada bangunan untuk memastikan kestabilannya', 'c. Membuat desain interior yang menarik', 'd. Menghitung biaya material bangunan', 'modelbangunan'),
(19, 'Apa itu RAB dalam konteks konstruksi?', 'a. Rencana Anggaran Biaya', 'b. Rencana Analisis Bangunan', 'c. Rancangan Arsitektur Bangunan', 'd. Rencana Alur Bangunan', 'modelbangunan'),
(20, 'Perangkat lunak apa yang digunakan untuk mengelola proyek konstruksi dan informasi bangunan secara terintegrasi?', 'a. Microsoft Excel', 'b. Revit', 'c. PowerPoint', 'd. Notepad', 'modelbangunan'),
(21, 'Apa yang dimaksud dengan otomatisasi pertanian?', 'a. Penggunaan teknologi dan mesin untuk meningkatkan efisiensi dalam produksi pertanian.', 'b. Pembudidayaan tanaman secara manual.', 'c. Penggunaan hewan untuk membantu dalam pekerjaan pertanian.', 'd. Penjualan hasil pertanian di pasar lokal.', 'otomatisasiperkebunan'),
(22, 'Apa fungsi utama dari sensor kelembaban tanah dalam otomatisasi pertanian?', 'a. Mengukur suhu udara.', 'b. Mengukur kadar air dalam tanah.', 'c. Mengukur intensitas cahaya.', 'd. Mengukur keasaman tanah.', 'otomatisasiperkebunan'),
(23, 'Teknologi apa yang sering digunakan untuk irigasi otomatis dalam pertanian?', 'a. Drone', 'b. Sensor ultrasonik', 'c. Sistem irigasi tetes', 'd. GPS', 'otomatisasiperkebunan'),
(24, 'Apa keuntungan utama dari penggunaan drone dalam pertanian?', 'a. Mempercepat proses penanaman', 'b. Mengurangi kebutuhan tenaga kerja', 'c. Meningkatkan pemupukan dan penyemprotan yang akurat', 'd. Menambah keindahan lahan pertanian', 'otomatisasiperkebunan'),
(25, 'Apa yang dimaksud dengan Precision Agriculture?', 'a. Penanaman tanaman secara manual', 'b. Penggunaan teknologi informasi untuk memastikan tanaman dan tanah menerima input yang tepat', 'c. Penggunaan mesin tua dalam pertanian', 'd. Penjualan hasil pertanian melalui internet', 'otomatisasiperkebunan'),
(26, 'Alat apa yang digunakan untuk mengukur pH tanah secara otomatis?', 'a. Termometer', 'b. Hygrometer', 'c. pH meter', 'd. Barometer', 'otomatisasiperkebunan'),
(27, 'Bagaimana otomatisasi pertanian dapat membantu dalam pengelolaan hama?', 'a. Dengan mengurangi jumlah hama di lapangan', 'b. Dengan menggunakan robot untuk menangkap hama', 'c. Dengan penggunaan pestisida secara presisi berdasarkan data sensor', 'd. Dengan menanam tanaman yang tahan hama', 'otomatisasiperkebunan'),
(28, 'Apa tujuan utama dari otomatisasi dalam pengolahan hasil pertanian?', 'a. Meningkatkan jumlah tenaga kerja', 'b. Mengurangi biaya produksi dan meningkatkan efisiensi', 'c. Mengurangi penggunaan teknologi dalam pertanian', 'd. Menjual produk pertanian dengan harga tinggi', 'otomatisasiperkebunan'),
(29, 'Apa peran teknologi Internet of Things (IoT) dalam otomatisasi pertanian?', 'a. Menyediakan koneksi internet gratis di pedesaan', 'b. Menghubungkan berbagai perangkat dan sensor untuk memantau dan mengontrol kondisi pertanian secara real-time', 'c. Mengganti tenaga kerja manusia dengan robot', 'd. Membuat prediksi cuaca jangka panjang', 'otomatisasiperkebunan'),
(30, 'Apa yang dimaksud dengan Smart Farming?', 'a. Pertanian yang dilakukan oleh petani berpengalaman', 'b. Penggunaan teknologi canggih untuk meningkatkan efisiensi dan hasil pertanian', 'c. Pertanian tradisional tanpa bantuan teknologi', 'd. Penggunaan hewan untuk membantu dalam pekerjaan pertanian', 'otomatisasiperkebunan');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

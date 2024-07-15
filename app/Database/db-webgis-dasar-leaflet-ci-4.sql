-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 04:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-webgis-dasar-leaflet-ci-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(255) NOT NULL,
  `tgl_kejadian` date DEFAULT NULL,
  `nm_kapal` varchar(255) DEFAULT NULL,
  `jenis_kapal` text DEFAULT NULL,
  `imo` varchar(255) DEFAULT NULL,
  `mmsi` varchar(255) DEFAULT NULL,
  `perusahaan_kapal` varchar(255) DEFAULT NULL,
  `jenis_pelanggaran` varchar(255) DEFAULT NULL,
  `lokasi_kejadian` varchar(255) DEFAULT NULL,
  `jml_muatan` varchar(255) DEFAULT NULL,
  `jenis_muatan` varchar(255) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `bendera_kapal` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `asal_abk` varchar(255) DEFAULT NULL,
  `jumlah_abk` int(11) DEFAULT NULL,
  `pelanggaran` varchar(255) DEFAULT NULL,
  `kerugian_negara` varchar(255) DEFAULT NULL,
  `instansi_penangkap` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `foto_lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `tgl_kejadian`, `nm_kapal`, `jenis_kapal`, `imo`, `mmsi`, `perusahaan_kapal`, `jenis_pelanggaran`, `lokasi_kejadian`, `jml_muatan`, `jenis_muatan`, `asal`, `bendera_kapal`, `tujuan`, `asal_abk`, `jumlah_abk`, `pelanggaran`, `kerugian_negara`, `instansi_penangkap`, `latitude`, `longitude`, `foto_lokasi`) VALUES
(9, '2024-01-19', 'KM Mega Padang dan KM Guna 1', 'KAPAL NELAYAN', 'N/A', 'N/A', 'N/A', 'Perampokan', 'Perairan Bangka Barat', 'N/A', 'N/A', 'Pulau Nangka, Bangka barat', 'Indonesia', 'Mentok, Bangka Barat', 'Indonesia', 6, 'Pasal 365 ayat (1) dan (2) ke-2 Jo Pasal 363 ayat (1) ke-4 KUHPidana atau Pasal 480 ayat (1) KUHPidana Jo Pasal 55 dan pasal 56 KUHPidana', 'N/A', 'Polres Bangka Barat', '105.192518', '-1.902870', '1713329649_febaea67f8afb047036b.jpg'),
(10, '2024-03-16', 'FB. LB. JM A-2', 'Kapal Ikan', 'N/A', 'N/A', 'N/A', 'IUU Fishing', 'WPPNRI 716 Laut Sulawesi', 'N/A', 'Ikan', 'Filipina', 'Filipina', 'Filipina', 'Filipina', 12, 'Pasal 92 Jo Pasal 26 ayat (1) UU No. 31 Tahun 2004 tentang Perikanan', '1.400.000.000', 'Kementerian Kelautan dan Perikanan (KKP) Kapal Pengawas Orca 04', '125.500005', '2.333547', '1713332384_e5f712c5b947fd101fe9.png'),
(12, '2024-01-09', 'KM Swarna', 'Kapal Ikan', 'N/A', 'N/A', 'N/A', 'IUU Fishing', 'WPPNRI 572 Sebelah Barat Sibolga, Sumatera Utara', 'N/A', 'Ikan', 'Indonesia', 'Indonesia', 'N/A', 'Indonesia', 32, 'Undang-Undang Nomor 6 Tahun 2023 tentang penetapan Peraturan Pemerintah Pengganti Undang-Undang Nomor 2 Tahun 2022 tentang Cipta Kerja', 'N/A', 'Pengawas (Satwas) PSDKP Sibolga menggunakan kapal KP Napoleon 036', '98.775163', '1.728291', '1716863618_a0ddf93e272dc379b407.png'),
(13, '2024-02-29', 'MV African Halcyon', 'Kapal Kargo', '9343613 ', '311032200', 'Halcyon Shipping Company Ltd.', 'Pencurian', 'Perairan Dumai, Selat Malaka', 'N/A', 'N/A', 'N/A', 'Bahama', 'N/A', 'N/A', 0, 'N/A', 'N/A', 'Pangkalan TNI Angkatan Laut Dumai', '101.420036', '1.699128', '1716952856_3c5d6a128f464d0f0807.jpeg'),
(14, '2024-03-15', 'KM Pioneer Cargo', 'Kapal Motor', 'N/A', 'N/A', 'N/A', 'Penyelundupan Narkoba', 'Pelabuhan Tengkayu 1 SDF Tarakan, Kalimantan Utara', '1 Kardus', '100 butir pil ekstasi jenis Inex dan 96.000 butir pil Double L', 'N/A', 'N/A', 'Tanjung Selor', 'Indonesia', 2, 'Undang-Undang Narkotika', 'N/A', 'Tim Lantamal XIII Tarakan', '117.585274', '3.289884', '1718154380_34aadba24e2abb108171.png'),
(22, '2024-03-08', 'N/A', 'Kapal Pompong', 'N/A', 'N/A', 'N/A', 'Penyelundupan Barang', 'ding, Karimun, KepPerairan Tanjung Gaulauan Riau', '45 kotak/dus rokok', 'Rokok Ilegal', 'Batam', 'Indonesia', 'N/A', 'N/A', 2, 'Undang-undang Nomor 11 Tahun 1995 tentang Cukai, Undang-undang Nomor 39 Tahun 2007 tentang Cukai', 'Rp300,000,000', 'Patroli Pangkalan TNI Angkatan Laut (Lanal) Tanjungbalai Karimun', '103.370173', '1.003279', '1719973667_9ad9e3f67cd6004d2431.jpg'),
(23, '2024-02-04', 'TB Royal 27', 'Tugboat', 'N/A', 'N/A', 'PT Pelayaran Royal', 'Perampokan', 'Perairan Batulicin, Kabupaten Tanah Laut, Kalimantan Selatan', '3959 KL', 'BBM', 'Indoenesia', 'Indonesia', 'Batulicin, Kalimantan Selatan', 'Indonesia', 14, 'Undang-Undang Nomor 17 Tahun 2008 tentang Pelayaran', 'N/A', 'Polairud Polda Kalimantan Selatan', '115.759161', '-3.733658', '1719973913_e3d16c92478ea94628f1.jpeg'),
(24, '2024-03-07', 'N/A', 'Kapal penangkap ikan', 'N/A', 'N/A', 'N/A', 'IUU Fishing', 'Perairan Laut Sulawesi', 'N/A', 'Ikan air laut, ikan blue marlin, ikan campuran, cumi', 'Filipina', 'Filipina', 'Filipina', 'Filipina', 16, 'Undang-Undang Nomor 31 Tahun 2004 tentang Perikanan', 'Rp15,000,000,000', 'KP Baladewa-8002 milik Baharkam Polri', '124.199080', '-5.936049', '1719974127_817eebbb0758f72783b0.png'),
(25, '2024-03-01', 'KM Arsyi II', 'Kapal kayu', 'N/A', 'N/A', 'N/A', 'Penyelundupan Barang', 'Perairan Batam, Kepulauan Riau', 'N/A', 'Baju dan sepatu bekas', 'N/A', 'N/A', 'N/A', 'N/A', 2, 'Pasal 102 Huruf a Undang-Undang Nomor 17 tahun 2006 Tentang Perubahan Atas UU Nomor 10 Tahun 1995 Tentang Kepabeanan', 'N/A', 'Tim Patroli Laut Bea Cukai Batam', '104.146305', '1.161513', '1719974266_5511e1aaf8288821d78b.jpg'),
(26, '2024-01-28', 'N/A', 'Kapal Pelni', 'N/A', 'N/A', 'PT Pelayaran Nasional Indonesia (PELNI)', 'Penyelundupan Barang', 'Pelabuhan Yos Sudarso Ambon, Maluku', '120L', 'Miras ilegal', 'Ambon', 'Indonesia', 'Tual Maluku', 'Indonesia', 0, 'Pasal 102 huruf a UU Kepabeanan jo. Pasal 54 UU Cukai', 'N/A', 'Prajurit Batalyon Marinir Pertahanan Pangkalan (Yonmarhanlan) IX Ambon', '128.175901', '-3.693664', '1719974673_4b0c4e03a7a37332af5d.png'),
(28, '2024-02-24', 'KM Dharma Kartika VII', 'Kapal Motor Penumpang (KMP)', 'N/A', 'N/A', 'PT Dharma Lautan Utama (DLU)', 'Penyelundupan Hewan', 'Pelabuhan Tanjung Perak Surabaya, Jawa Timur', '193 ekor', 'Burung dilindungi', 'Makassar, Sulawesi Selatan', 'Indonesia', 'Surabaya, Jawa Timu', 'N/A', 0, 'Undang-undang Konservasi Sumber Daya Alam Hayati dan Ekosistemnya', 'N/A', 'Pejabat Karantina Hewan Satuan Pelaksana (Satpel) Tanjung Perak Karantina Jatim dan Polres KPPP Tanjung Perak', '112.733185', '-7.196142', '1719975225_79030dd0cccaf986a08b.png'),
(29, '2024-02-04', ' KM Dorolonda', 'Kapal Penumpang', 'N/A', 'N/A', 'PT Pelayaran Nasional Indonesia (PELNI)', 'Penyelundupan Hewan', 'Pelabuhan Namlea, Kabupaten Buru, Maluku', '16 ekor', 'Nuri Maluku dan Burung Perkici', 'Namlea, Kabupaten Buru, Maluku', 'Indonesia', 'Pulau Jawa', 'N/A', 0, 'Undang-undang Konservasi Sumber Daya Alam Hayati dan Ekosistemnya', 'N/A', 'Balai Karantina Hewan, Ikan, dan Tumbuhan (BKHIT) Maluku Satuan Pelayanan Laut Namlea, Pelni, TNI, POM, dan KP3', '127.083902', '-3.269307', '1719975466_beadaf30984520b45d25.jpeg'),
(30, '2024-03-20', 'N/A', 'Kapal Pelni', 'N/A', 'N/A', 'PT Pelayaran Nasional Indonesia (PELNI)', 'Penyelundupan Hewan', 'Tempat Layanan Pelabuhan Laut Gorontalo', '180 ekor atau sekitar 60 kg', 'Daging tikus beku', 'Pagimana, Sulawesi Tengah', 'Indonesia', 'Manado, Sulawesi Utara', 'N/A', 0, 'Undang-undang Karantina Hewan, Ikan, dan Tumbuhan', 'N/A', 'Balai Karantina Hewan, Ikan, dan Tumbuhan (BKHIT) Gorontalo, Polsek Pelabuhan, TNI AL, dan Satpel Pelabuhan Penyeberangan Gorontalo', '123.064038', '0.516612', '1719975925_1be4ad2aa6c47bb58b44.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'user 1', 'user1@gmail.com', '12345', 3),
(2, 'admin 1', 'admin1@gmail.com', '12345', 1),
(7, 'user 2', 'user2@gmail.com', '$2y$10$xjsc9fURNaA.djAL7PgT7e5psFGvqyLAJQVZUa6HQm3ORYSz1KpjG', 3),
(8, 'user 3', 'user3@gmail.com', '$2y$10$S7UeqwsnlpHhzkFDwLQhXuGUc9c1yA/fhAVXxaCzKT3sdQEQRXVbG', 3),
(9, 'user 4', 'user4@gmail.com', '$2y$10$lyB/rr1ZLlywp3ymbpgkFusS/TVgzc9r/JLtPPZI4J8gwvj7EBtfK', 3),
(10, 'user 5', 'user5@gmail.com', '$2y$10$MgVc35ZGRXt5YeCY0zw4vebrYwWMh23B6FVlS4i2Eyzh0hy1Z0jO2', 3),
(11, 'user 6', 'user6@gmail.com', '$2y$10$d9BgfOHIh95kcNlGq6BaSODXlTLPbFLZ8xtjy1azQyY4a3W4f9Q0u', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

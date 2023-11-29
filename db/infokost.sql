-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 03:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infokost`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `hitungan_sewa` int(11) NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `update_kamar` AFTER INSERT ON `booking` FOR EACH ROW BEGIN
	UPDATE kamar SET jumlah_kamar=jumlah_kamar-NEW.jumlah_kamar
    WHERE id_kamar=NEW.id_kamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `panjang_kamar` int(11) NOT NULL,
  `lebar_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `biaya_fasilitas` int(11) NOT NULL,
  `fasilitas_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kost`, `jumlah_kamar`, `panjang_kamar`, `lebar_kamar`, `tipe_kamar`, `biaya_fasilitas`, `fasilitas_kamar`) VALUES
(14, 15, 4, 5, 4, 'kamar mandi luar', 450000, 'Tempat Tidur, Lemari, Kipas Angin'),
(15, 15, 2, 5, 4, 'kamar mandi dalam', 500000, 'Tempat Tidur, Lemari, Kipas Angin'),
(16, 16, 21, 5, 4, 'kamar mandi luar', 425000, 'Tempat Tidur, Lemari, TV, Kulkas, Kipas Angin'),
(17, 16, 4, 10, 8, 'kamar mandi luar', 650000, 'Tempat Tidur, Lemari, TV, Kulkas, Kipas Angin'),
(18, 17, 9, 5, 4, 'kamar mandi luar', 400000, 'Tempat Tidur, Lemari, Kulkas, Kipas Angin'),
(19, 17, 2, 5, 4, 'kamar mandi dalam', 500000, 'Tempat Tidur, Lemari, Kulkas, Kipas Angin'),
(20, 18, 2, 5, 4, 'kamar mandi luar', 400000, 'AC, Tempat Tidur, Lemari, Kulkas'),
(21, 18, 3, 5, 4, 'kamar mandi dalam', 500000, 'AC, Tempat Tidur, Lemari, Kulkas'),
(22, 19, 6, 5, 4, 'kamar mandi luar', 350000, '\"kasur, lemari, meja, kursi, wifi, \"'),
(23, 19, 6, 5, 4, 'kamar mandi luar', 350000, '\"kasur, lemari, meja, kursi, wifi\"'),
(24, 20, 3, 5, 4, 'kamar mandi luar', 450000, '\"kasur, lemari, meja, kursi\"'),
(25, 20, 3, 5, 4, 'kamar mandi dalam', 500000, '\"kasur, lemari, meja, kursi\"');

--
-- Triggers `kamar`
--
DELIMITER $$
CREATE TRIGGER `after_update` AFTER UPDATE ON `kamar` FOR EACH ROW BEGIN
	UPDATE kost SET jumlah_kamar=jumlah_kamar-1
	WHERE id_kost=NEW.id_kost;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_kamar` AFTER DELETE ON `kamar` FOR EACH ROW UPDATE kost SET kost.jumlah_kamar = kost.jumlah_kamar-old.jumlah_kamar
WHERE kost.id_kost=old.id_kost
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_kamar` AFTER INSERT ON `kamar` FOR EACH ROW BEGIN
	UPDATE kost SET jumlah_kamar=jumlah_kamar+NEW.jumlah_kamar
	WHERE id_kost=NEW.id_kost;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `tipe_kost` varchar(255) NOT NULL,
  `jenis_kost` varchar(255) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `tanggal_tagih` date NOT NULL,
  `nama_pemilik` text NOT NULL,
  `nama_bank` text NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `foto_bangunan_utama` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `foto_kamar_mandi` varchar(255) NOT NULL,
  `foto_interior` varchar(255) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `fasilitas_kost` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama_kost`, `tipe_kost`, `jenis_kost`, `jumlah_kamar`, `tanggal_tagih`, `nama_pemilik`, `nama_bank`, `no_rekening`, `foto_bangunan_utama`, `foto_kamar`, `foto_kamar_mandi`, `foto_interior`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `harga_sewa`, `kontak`, `deskripsi`, `id_pemilik`, `fasilitas_kost`) VALUES
(15, 'Kos Semeru', 'Bulan', 'Putra', 1, '2023-11-01', 'Iqbal', 'BNI', 872534765, 'IMG-20231128-WA0010.jpg', 'IMG-20231128-WA0011.jpg', 'IMG-20231128-WA0012.jpg', 'IMG-20231128-WA0009.jpg', 'Jawa Timur', 'Jember', 'Sumbersari', 'Sumbersari', 'Jl. Semeru no. 03', 0, '082338636603', 'Kos Laki-Laki', 46, 'Parkir Mobil, WIFI/Internet'),
(16, 'Kos Putri Calysta ', 'Bulan', 'Putri', 22, '2023-11-01', 'Aisyah', 'BNI', 2147483647, 'o70ibRGM0DSJD4CaEIxGj24rz5bB3RopABJcnp8XiPo=_plaintext_638367343263134160.jpg', 'k04_MT4qwS2HqT--8lSzym0ZEgirJ5-0UY_E51dT1-0=_plaintext_638367343289062873.jpg', 'FZeJczIMbN_z5jHJyfqyObPbXl9qW0yxk9nNxQUtc1o=_plaintext_638367343269639410.jpg', 'SCoflmCxIzK5AUIAvOxt_9rOD5pkkSNrf8oRONS9H3o=_plaintext_638367343293230416.jpg', 'Jawa Timur', 'Jember', 'Sumbersari', 'Sumbersari', 'Jl. Mastrip Gg. 2 no.14', 0, '085267322720', 'Kost Putri \r\n21 kamar perorang.\r\n4 kamar isi 2 orang', 47, 'Parkir Mobil, WIFI/Internet, Ruang Makan, Dapur'),
(17, 'Kos Istana Tidar', 'Bulan', 'Putra', 10, '2023-11-01', 'Sena', 'BRI', 2147483647, 'IMG-20231128-WA0020.jpg', 'IMG-20231128-WA0022.jpg', 'IMG-20231128-WA0019.jpg', 'IMG-20231128-WA0021.jpg', 'Jawa Timur', 'Jember', 'Sumbersari', 'Sumbersari', 'Perum Istana Tidar B4 no.23', 0, '081935166922', 'Kos Laki-Laki\r\n9 kamar mandi luar\r\n2 kamar mandi dalam\r\nfree wifi', 48, 'Parkir Mobil, WIFI/Internet, Ruang Tamu, Ruang Makan, Dapur'),
(18, 'Rey Kos', 'Bulan', 'Putra', 4, '2023-11-01', 'Reynand', 'BRI', 23879654, 'IMG-20231128-WA0017.jpg', 'IMG-20231128-WA0015.jpg', 'IMG-20231128-WA0014.jpg', 'IMG-20231128-WA0018.jpg', 'Jawa Timur', 'Jember', 'Mangli', 'Mangli', 'Perum Mangli ', 0, '082332606541', 'Kost Laki-Laki', 50, 'Parkir Mobil, WIFI/Internet, Ruang Tamu, Ruang Makan, Dapur'),
(19, 'Kost Bambu', 'Bulan', 'Campuran', 11, '2023-11-01', 'Rama', 'BRI', 33786532, 'IMG-20231128-WA0040.jpg', 'IMG-20231128-WA0038.jpg', 'IMG-20231128-WA0039.jpg', 'IMG-20231128-WA0037.jpg', 'Jawa Timur', 'Jember', 'Sumbersari', 'Sumbersari', 'Jl Mastrip 2', 0, '082332606541', 'kos Campuran\r\n6 kamar kos perempuan\r\n6 kamar kos laki-laki', 51, 'Parkir Mobil, WIFI/Internet, Dapur, Musholla'),
(20, 'Kos Lily', 'Bulan', 'Putri', 6, '2023-11-01', 'Adit', 'BCA', 7623354, 'WhatsApp Image 2023-11-28 at 16.49.29_bd694380.jpg', 'WhatsApp Image 2023-11-28 at 16.48.59_bc7ffdd6.jpg', 'WhatsApp Image 2023-11-29 at 09.44.15_fa442885.jpg', 'WhatsApp Image 2023-11-28 at 16.48.59_bc7ffdd6.jpg', 'Jawa Timur', 'Jember', 'Ajung', 'Ajung', 'Dsn. Krasak Desa Pancakarya', 0, '088226245415', 'Kos Putri\r\n6 kamar', 52, 'Parkir Mobil, WIFI/Internet, Ruang Tamu, Ruang Makan, Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `Id_kost` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_user`
--

CREATE TABLE `roles_user` (
  `id_roles` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles_user`
--

INSERT INTO `roles_user` (`id_roles`, `nama`) VALUES
(1, 'penghuni kost'),
(2, 'pemilik kost'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `no_tagihan` int(11) NOT NULL,
  `no_booking` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `stats` int(11) NOT NULL,
  `tanggal_tagihan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_profil` text NOT NULL,
  `roles` int(11) NOT NULL,
  `id_kost_saya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `email`, `username`, `password`, `no_hp`, `foto_ktp`, `foto_profil`, `roles`, `id_kost_saya`) VALUES
(46, 'IQBAL AMIN', 'iqbal@gmail.com', 'Iqbal', 'Iqbal', '82338636603', '', 'IQBAL AMIN.jpeg', 2, 0),
(47, 'Aisyah.S', 'aisyah@gmail.com', 'Aisyah', 'Aisyah', '85267322720', '', 'WhatsApp Image 2023-11-28 at 09.30.11_d2e82ac8.jpg', 2, 0),
(48, 'Arya Advicenna', 'sena@gmail.com', 'Sena', 'Sena', '81935166922', '', 'WhatsApp Image 2023-11-28 at 09.34.39_480510a3.jpg', 2, 0),
(49, 'user', 'user@gmail.com', 'user', 'user', '98765432', 'bg1.jpg', 'bg1.jpg', 1, 0),
(50, 'Reynand', 'reynand@gmail.com', 'Reynand', 'Reynand', '082332606541', '', 'WhatsApp Image 2023-11-28 at 10.19.27_acd4f172.jpg', 2, 0),
(51, 'Muh Rama Pradipa Wijya', 'rama@gmail.com', 'Rama', 'Rama', '082139425332', '', 'WhatsApp Image 2023-11-29 at 01.38.42_139f0ac5.jpg', 2, 0),
(52, 'Aditya Ridho', 'adit@gmail.com', 'Adit', 'Adit', '088226245415', '', 'WhatsApp Image 2023-11-28 at 21.35.45_e415a406.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`,`id_kamar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kost` (`id_kost`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `Id_kost` (`Id_kost`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Indexes for table `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`no_tagihan`),
  ADD KEY `no_booking` (`no_booking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kost_saya` (`id_kost_saya`),
  ADD KEY `roles` (`roles`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_kost` (`id_kost`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_user`
--
ALTER TABLE `roles_user`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `no_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `user` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`Id_kost`) REFERENCES `kost` (`id_kost`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`no_booking`) REFERENCES `booking` (`id_booking`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles_user` (`id_roles`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

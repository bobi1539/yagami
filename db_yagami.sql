-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2024 at 12:30 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yagami`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_aktif` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_depan`, `nama_belakang`, `no_telepon`, `jenis_kelamin`, `email`, `password`, `role_id`, `is_aktif`, `tgl_dibuat`, `gambar`) VALUES
(5, 'ucup', 'surucup', '083180808080', 'Laki-laki', 'acco34293@gmail.com', '$2y$10$G3A3lifz7q0IgbX7xauuIO4acA0JvXwEcrhr2JqUoRVTwlmHvVJqG', 2, 1, '0000-00-00', 'profil.jpg'),
(6, 'admin', 'admin', '08318080', 'laki-laki', 'admin@gmail.com', '$2y$10$G3A3lifz7q0IgbX7xauuIO4acA0JvXwEcrhr2JqUoRVTwlmHvVJqG', 1, 1, '2024-03-01', 'profil.jpg'),
(7, 'tono', 'sutono', '0831808080', 'Laki-laki', 'tono@gmail.com', '$2y$10$ZIIbVTFcdSuoHIbnqrLZu..mhw6Nt5ZWM8UN4CRJpmsgqhDz.Idpq', 2, 1, '0000-00-00', 'profil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alamat_user`
--

CREATE TABLE `tbl_alamat_user` (
  `id_alamat` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `nama_jalan1` varchar(255) NOT NULL,
  `nama_jalan2` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alamat_user`
--

INSERT INTO `tbl_alamat_user` (`id_alamat`, `email`, `nama_depan`, `nama_belakang`, `no_telepon`, `nama_jalan1`, `nama_jalan2`, `negara`, `provinsi`, `kota`, `kecamatan`, `kelurahan`) VALUES
(1, 'acco34293@gmail.com', 'ucup', 'surucup', '0831808080', 'jalan gadut', '', 'Indonesia', 'sumbar', 'agam', 'tilkam', 'gadut');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buat_pesanan`
--

CREATE TABLE `tbl_buat_pesanan` (
  `id` int(11) NOT NULL,
  `dikirim` varchar(255) NOT NULL,
  `diterima` varchar(255) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jalan1` varchar(255) NOT NULL,
  `jalan2` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `ukuran_produk` varchar(255) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buat_pesanan`
--

INSERT INTO `tbl_buat_pesanan` (`id`, `dikirim`, `diterima`, `kurir`, `no_resi`, `id_bayar`, `email`, `id_keranjang`, `waktu`, `id_alamat`, `id_produk`, `jalan1`, `jalan2`, `kota`, `nama`, `telepon`, `ukuran_produk`, `jumlah_beli`) VALUES
(3, 'belum', 'belum', '', '', 0, 'acco34293@gmail.com', 3, '1709292262', 1, 2, 'jalan gadut', '', 'sumbar, agam, tilkam, gadut', 'ucup surucup', '0831808080', '38', 2),
(4, 'belum', 'belum', '', '', 0, 'acco34293@gmail.com', 4, '1709292262', 1, 1, 'jalan gadut', '', 'sumbar, agam, tilkam, gadut', 'ucup surucup', '0831808080', '38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi_kami`
--

CREATE TABLE `tbl_hubungi_kami` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hubungi_kami`
--

INSERT INTO `tbl_hubungi_kami` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'tono', 'tono@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_yagami`
--

CREATE TABLE `tbl_info_yagami` (
  `id_info_yagami` int(11) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info_yagami`
--

INSERT INTO `tbl_info_yagami` (`id_info_yagami`, `no_telepon`, `email`, `facebook`, `twitter`, `instagram`, `alamat`, `logo`) VALUES
(1, '0831808080', 'mart@gmail.com', 'mart', 'mart', 'mart', 'jalan gadut', 'logo_yagami.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_beli` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `ukuran_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_keranjang`, `email`, `jumlah_beli`, `id_produk`, `waktu`, `nama_produk`, `harga_produk`, `ukuran_produk`, `gambar_produk`) VALUES
(3, 'acco34293@gmail.com', '2', 2, '00:00:00', 'sepatu bagus', 200000, '38', 'sepatu2.png'),
(4, 'acco34293@gmail.com', '1', 1, '00:00:00', 'sepatu', 150000, '38', 'sepatu_faq.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga_produk` double NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `gambar_produk`, `harga_produk`, `stok_produk`) VALUES
(1, 'sepatu', 'sepatu_faq.png', 150000, 150),
(2, 'sepatu bagus', 'sepatu2.png', 200000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'acco34293@gmail.com', 'SRshvk8PoBqr4vN90ZYPvQakTUSBr3Y3NXjHAb+pWCo=', '0000-00-00'),
(5, 'tono@gmail.com', 'RcWTOLeifMAJejfZV43qwHitQgYcGN7ty3xdf1xpHOI=', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `ulasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ulasan`
--

INSERT INTO `tbl_ulasan` (`id_ulasan`, `email`, `nama_depan`, `nama_belakang`, `gambar`, `ulasan`) VALUES
(1, 'acco34293@gmail.com', 'ucup', 'surucup', 'profil.jpg', 'bagus sekali');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_akses_menu`
--

CREATE TABLE `tbl_user_akses_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_akses_menu`
--

INSERT INTO `tbl_user_akses_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id`, `menu`) VALUES
(1, 'User'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_alamat_user`
--
ALTER TABLE `tbl_alamat_user`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tbl_buat_pesanan`
--
ALTER TABLE `tbl_buat_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_yagami`
--
ALTER TABLE `tbl_info_yagami`
  ADD PRIMARY KEY (`id_info_yagami`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `tbl_user_akses_menu`
--
ALTER TABLE `tbl_user_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_alamat_user`
--
ALTER TABLE `tbl_alamat_user`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_buat_pesanan`
--
ALTER TABLE `tbl_buat_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hubungi_kami`
--
ALTER TABLE `tbl_hubungi_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_info_yagami`
--
ALTER TABLE `tbl_info_yagami`
  MODIFY `id_info_yagami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_akses_menu`
--
ALTER TABLE `tbl_user_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

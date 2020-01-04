-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2020 pada 10.27
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arkademy14`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `new_query`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `new_query` (
`nama_kasir` varchar(50)
,`nama_produk` varchar(50)
,`nama_kategori` varchar(50)
,`price` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cashier`
--

CREATE TABLE `tb_cashier` (
  `id` int(11) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cashier`
--

INSERT INTO `tb_cashier` (`id`, `nama_kasir`) VALUES
(1, 'Pevita Pearce'),
(2, 'Raisa Andriana'),
(3, 'Raga Sukmana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id`, `nama_kategori`) VALUES
(1, 'Food'),
(2, 'Drink');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `idp` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_cashier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`idp`, `nama_produk`, `price`, `id_category`, `id_cashier`) VALUES
(1, 'Latte', '10000', 2, 1),
(2, 'Cake', '20001', 1, 2),
(3, 'Pizza', '45000', 1, 3);

-- --------------------------------------------------------

--
-- Struktur untuk view `new_query`
--
DROP TABLE IF EXISTS `new_query`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_query`  AS  select `y`.`nama_kasir` AS `nama_kasir`,`x`.`nama_produk` AS `nama_produk`,`z`.`nama_kategori` AS `nama_kategori`,`x`.`price` AS `price` from ((`tb_product` `x` join `tb_cashier` `y`) join `tb_category` `z`) where `x`.`id_cashier` = `y`.`id` and `x`.`id_category` = `z`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_cashier`
--
ALTER TABLE `tb_cashier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`idp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

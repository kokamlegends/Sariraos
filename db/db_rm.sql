-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jun 2022 pada 09.31
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
`id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_made` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basket`
--

INSERT INTO `basket` (`id`, `customer_id`, `customer_name`, `contact_number`, `address`, `email`, `total`, `status`, `date_made`) VALUES
(28, 19, 'sidik', '08653716312', 'BK11', 'sidik@gmail.com', '141000', 'confirmed', '2022-04-08 00:58:34'),
(29, 20, 'agus', '08256765897', 'BK12', 'agus@gmail.com', '108000', 'confirmed', '2022-04-08 01:02:18'),
(30, 21, 'dayat', '087627852612', 'BK13', 'dayat@gmail.com', '111000', 'pending', '2022-04-08 01:08:42'),
(31, 22, 'ikhsan', '081276876356', 'BK14', 'ikhsan@gmail.com', '131000', 'pending', '2022-04-08 01:11:40'),
(32, 19, 'sidik', '08653716312', 'BK15', 'sidik@gmail.com', '48000', 'pending', '2022-06-02 11:03:01'),
(33, 29, 'aldi', '082285456090', 'BK16', 'aldi@gmail.com', '30000', 'confirmed', '2022-06-02 13:54:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_number`, `email`, `password`, `address`) VALUES
(19, 'sidik', '08653716312', 'sidik@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. merpati 2'),
(20, 'agus', '08256765897', 'agus@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Merapi 8'),
(21, 'dayat', '087627852612', 'dayat@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Anggrek 6'),
(22, 'ikhsan', '081276876356', 'ikhsan@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Merpati 3'),
(23, 'topik', '097267517267', 'topik@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Merapi 2'),
(24, 'alim', '08762715267', 'alim@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Semeru 2'),
(25, 'Anju', '087286561765', 'anju@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Marapalam 3'),
(26, 'eko', '08273816287', 'eko@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl.R.a Kartini'),
(27, 'wawan', '087261876187', 'wawan@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Kamboja'),
(28, 'andi', '081271898765', 'andi@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl. Cempaka'),
(29, 'aldi', '082285456090', 'aldi@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl.R.a Kartini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `food`
--

CREATE TABLE IF NOT EXISTS `food` (
`id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_category` varchar(50) NOT NULL,
  `food_price` varchar(50) NOT NULL,
  `food_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_price`, `food_description`) VALUES
(14, 'Ayam Goreng Kampung', 'Makanan', '24000', 'Ayam Goreng asli ayam kampung'),
(15, 'Gurame Goreng', 'Makanan', '12000', 'Gurame Goreng Crispy'),
(16, 'Nasi Goreng Seafood', 'Makanan', '24000', 'Nasi Goreng dengan toping Seafood'),
(26, 'Cumi Saos Tiram', 'Makanan', '30000', 'Olahan cumi dengan saos tiram'),
(27, 'Nasi Timbal Komplit', 'Makanan', '35000', 'Nasi Timbel Menu Komplit'),
(28, 'Cah Kangkung Polos', 'Makanan', '17000', 'Sayur Kangkung polos'),
(29, 'Es Teh Manis', 'Minuman', '6000', 'Teh manis dingin'),
(30, 'Juice Alpukat', 'Minuman', '12000', 'jus buah alpukat manis'),
(31, 'Juice Jeruk', 'Minuman', '12000', 'Jus buah jeruk manis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `food` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`) VALUES
(20, '28', 'Ayam Goreng Kampung', '1'),
(21, '28', ' Gurame Goreng', '1'),
(22, '28', ' Nasi Timbal Komplit', '3'),
(23, '29', 'Nasi Goreng Seafood', '3'),
(24, '29', ' Juice Jeruk', '3'),
(25, '30', 'Nasi Timbal Komplit', '2'),
(26, '30', ' Cah Kangkung Polos', '1'),
(27, '30', ' Juice Alpukat', '2'),
(28, '31', 'Ayam Goreng Kampung', '1'),
(29, '31', ' Gurame Goreng', '1'),
(30, '31', ' Nasi Goreng Seafood', '2'),
(31, '32', 'Ayam Goreng Kampung', '2'),
(32, '33', 'Ayam Goreng Kampung', '1'),
(33, '33', ' Es Teh Manis', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`reserve_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_of_guest` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date_res` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `suggestions` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `name`, `no_of_guest`, `email`, `phone`, `date_res`, `time`, `suggestions`, `status`) VALUES
(11, 'sidik', '5', 'sidik@gmail.com', '08653716312', '2022-04-08', '10:00', ' ', ''),
(12, 'agus', '3', 'agus@gmail.com', '08256765897', '2022-04-08', '11:01', ' ', ''),
(13, 'dayat', '2', 'dayat@gmail.com', '087627852612', '2022-04-08', '12:00', ' ', ''),
(14, 'ikhsan', '5', 'ikhsan@gmail.com', '081276876356', '2022-04-08', '15:00', ' ', ''),
(15, 'sidik', '5', 'msidikx@gmail.com', '082285456082', '2022-06-02', '11:00', ' ', ''),
(16, 'aldi', '5', 'aldi@gmail.com', '082285456082', '2022-06-04', '14:00', ' gfdfd', ''),
(17, 'Muhammad Sidik', '5', 'sidik@gmail.com', '082285456082', '2022-06-04', '14:00', 'thrt', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`reserve_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

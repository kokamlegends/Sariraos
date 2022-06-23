-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 10:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `reserve_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_made` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `customer_id`, `reserve_id`, `customer_name`, `contact_number`, `address`, `email`, `total`, `status`, `date_made`) VALUES
(1, 30, 1, 'Kaqa', '089776628861', 'BK1', 'kokamlegends@gmail.com', '30000', 'pending', '2022-06-23 15:21:25'),
(2, 30, 2, 'Kaqa', '089776628861', 'BK2', 'kokamlegends@gmail.com', '36000', 'pending', '2022-06-23 15:23:06'),
(3, 30, 3, 'Kaqa', '089776628861', 'BK3', 'kokamlegends@gmail.com', '101000', 'pending', '2022-06-23 15:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
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
(29, 'aldi', '082285456090', 'aldi@gmail.com', '202cb962ac59075b964b07152d234b70', 'jl.R.a Kartini'),
(30, 'Kaqa', '089776628861', 'kokamlegends@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jl.Terusan Larwotherhood');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_category` varchar(50) NOT NULL,
  `food_price` varchar(50) NOT NULL,
  `food_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `food` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`) VALUES
(1, '1', 'Es Teh Manis', '1'),
(2, '1', ' Ayam Goreng Kampung', '1'),
(3, '2', 'Es Teh Manis', '1'),
(4, '2', ' Cumi Saos Tiram', '1'),
(5, '3', 'Nasi Timbal Komplit', '1'),
(6, '3', ' Es Teh Manis', '3'),
(7, '3', ' Ayam Goreng Kampung', '1'),
(8, '3', ' Nasi Goreng Seafood', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_of_guest` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date_res` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `suggestions` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `name`, `no_of_guest`, `email`, `phone`, `date_res`, `time`, `suggestions`, `status`) VALUES
(1, 'Kaqa', '1', 'kokamlegends@gmail.com', '08963534638', '2022-06-23', '15:27', '1', ''),
(2, 'Kaqa', '1', 'p@gmail.com', '2121', '2022-06-23', '15:28', '2', ''),
(3, 'Kaqa', '3', 'faisaldany63@gmail.com', '32324', '2022-07-07', '15:27', '3', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

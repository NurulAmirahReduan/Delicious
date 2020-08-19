-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 10:50 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
   `name` varchar(100) NOT NULL,
  `flavour` varchar(1000) NOT NULL,
  `quantity` int NOT NULL,
  `addon` varchar(2000) NOT NULL,
  `ordernotes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `product`,'name', `flavour`, `quantity`, `addon`, `ordernotes`) VALUES
(1, 'Cakes', 'CHEESECAKES', 'chocolate, vanilla flavour', 2,'candles, giftcard', 'Happy Birthday Dear'),
(2, 'Cakes', 'CHEESECAKES', 'chocolate, vanilla flavour', 1,'candle', 'Happy Anniversary'),
(3, 'Cookies', 'CUBIC TART', 'consist of pineapple jam', 50,'giftcard', 'Best Frienf Forever'),
(4, 'Cookies', 'RED PEARL', 'combination of chocolate chips and peanut', 50, 'giftcard', 'Special 4 You'),



--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

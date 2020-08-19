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
-- Table structure for table `product_catalogue_detail`
--

CREATE TABLE `product_catalogue_detail` (
  `pID` int(11) NOT NULL,
  `pType` varchar(100) NOT NULL,
  `pName` varchar(1000) NOT NULL,
  `pPrice` double NOT NULL,
  `pDescription` varchar(1000) NOT NULL,
  `pDetail` varchar(5000) NOT NULL,
  `pImg` varchar(2000) NOT NULL,
  `pLogDet` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_catalogue_detail`
--

INSERT INTO `product_catalogue_detail` (`pID`, `pType`, `pName`, `pPrice`, `pDescription`, `pDetail`, `pImg`, `pLogDet`) VALUES
(1, 'Cakes', 'CHEESECAKES', 0, 'chocolate, vanilla flavour', '', '', ''),
(2, 'Cakes', 'CHEESECAKES', 20.99, 'chocolate, vanilla flavour', '', '', ''),
(3, 'Cakes', 'BORNEO LAYER', 20.99, 'consist of chocolate bars', '', '', ''),
(4, 'Cakes', 'CHOCOLATE', 20.99, 'baked, steam ', '', '', ''),
(5, 'Cakes', 'SPAN CAKES', 20.99, 'chocolate, vanilla', '', '', ''),
(6, 'Cakes', 'CARAMEL PUDDING', 20.99, 'rainbow cakes with caramel on top', '', '', ''),
(7, 'Cakes', 'MARBLE CAKES', 20.99, 'fluffy cakes for tea party', '', '', ''),
(8, 'Cookies', 'CUBIC TART', 20.99, 'consist of pineapple jam', '', '', ''),
(9, 'Cookies', 'RED PEARL', 20.99, 'combination of chocolate chips and peanut', '', '', ''),
(10, 'Cookies', 'UNTAIAN KASIH', 20.99, 'combination of butter and dates jam', '', '', ''),
(11, 'Cookies', 'PINEAPPLE TART', 20.99, 'combination of butter and pineapple jam', '', '', ''),
(12, 'Cookies', 'DATES LAYER', 20.99, 'combination of almond and chocolate chips', '', '', ''),
(13, 'Cookies', 'ALMOND LONDON', 20.99, 'consist of almond', '', '', ''),
(14, 'Cookies ', 'CHOCOLATE COOKIES', 20.99, 'consist of almond and chocolate chips', '', '', ''),
(15, 'Cookies', 'SHORTBREAD COOKIES', 20.99, 'fluffy cookies with cherry on top', '', '', ''),
(16, 'Dessert', 'PAVLOVA FRUIT', 20.99, '+Mixed fruit,+Extra fruit', '', '', ''),
(17, 'Dessert', 'FLUFFY CREAMPUFF', 20.99, '+Custard, +Creamy Corn', '', '', ''),
(18, 'Dessert', 'CHEESETART', 20.99, '+Peanut, +Strawberry, +Blueberry, +Kiwi', '', '', ''),
(19, 'Dessert', 'DELICIOUS EGG TART', 20.99, '+Mini tart, +Large tart', '', '', ''),
(20, 'Traditional', 'PULUT BERHIAS', 20.99, 'For wedding and engagement', '', '', ''),
(21, 'Traditional', 'APAM POLKADOT', 20.99, 'dessert with the polkadot decoration on top', '', '', ''),
(22, 'Traditional', 'TALAM SRI MUKA', 20.99, 'pandan flavour and coconut milk', '', '', ''),
(23, 'Traditional', 'PUTERI AYU', 20.99, 'dessert with the grated coconut on top', '', '', ''),
(24, 'Bread', 'FLUFFY DOUGHNUT', 20.99, 'bread that coated with castor sugar', '', '', ''),
(25, 'Bread', 'CINNAMON ROLL', 20.99, 'bread that coated with cinnamon spices and sugar', '', '', ''),
(26, 'Bread', 'MINI PIZZA', 20.99, 'consist of sausages , vegetables on top', '', '', ''),
(27, 'Bread', 'MINCED BREAD', 20.99, 'chicken or meat on top', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_catalogue_detail`
--
ALTER TABLE `product_catalogue_detail`
  ADD PRIMARY KEY (`pID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_catalogue_detail`
--
ALTER TABLE `product_catalogue_detail`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

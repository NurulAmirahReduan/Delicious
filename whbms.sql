-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 09:45 AM
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
-- Table structure for table `feedback_detail`
--

CREATE TABLE `feedback_detail` (
  `fID` int(5) NOT NULL,
  `fRate` tinyint(1) NOT NULL,
  `fDetail` varchar(20) NOT NULL,
  `fUser` varchar(20) NOT NULL,
  `fEmail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_detail`
--

INSERT INTO `feedback_detail` (`fID`, `fRate`, `fDetail`, `fUser`, `fEmail`) VALUES
(1, 0, 'Taste marvelous', 'halim', '0'),
(2, 4, 'Taste marvelous', 'amalina ayuni', 'yunani@gmail.com'),
(3, 5, 'the cake tastes extr', 'nurul amirah', 'amimi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `news_detail`
--

CREATE TABLE `news_detail` (
  `nID` int(5) NOT NULL,
  `nTitle` varchar(1000) NOT NULL,
  `nDetail` varchar(1000) NOT NULL,
  `nDescription` varchar(2000) NOT NULL,
  `nDate` date NOT NULL,
  `nImg` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_detail`
--

INSERT INTO `news_detail` (`nID`, `nTitle`, `nDetail`, `nDescription`, `nDate`, `nImg`) VALUES
(2, 'Workshop For Pastry', 'Hey there, let\'s join our pastry\'s workshop. Let us show you how to make the fluffy pastry from the beginner to become the professional ones.', 'dough tart,cheese tart ', '2020-02-26', ''),
(3, 'Workshop For Cake ', 'Hey there, let\'s join our cake\'s workshop. Let us share with you how to bake the tips and tricks to make the marvelous cake', 'sponge cake, marble', '2020-02-04', 'cake.jpeg'),
(4, 'Pavlova Mixed Fruit', 'Hey there, this week, we will bake many pavlova mixed fruit just for you.Come and let yourself enjoy the great moment.', '', '2020-03-04', ''),
(5, 'Chocolate Lava Cheesecake', 'Hey there, this week, we will bake many lava cheesecakes just for you.Come and let yourself enjoy the great moment.', '', '2020-03-06', ''),
(6, 'Emoji Cheese Tart', 'Hey there, this week, we will bake many emoji cheese tart for you.Come and let yourself enjoy the great moment.', '', '2020-03-07', ''),
(7, 'Workshop For Fruit Tart', 'Hey there, this upcoming, we will having the workshop to dare you to challenge yourself to turn the tart into the cute fruit tart.', '', '2020-04-15', ''),
(8, 'Caramel Pudding Cake', 'Hey there, this upcoming, we will bake many caramel pudding cake just for you.Come and let yourself enjoy the great moment.', '', '2020-05-14', ''),
(9, 'Chocolate Muffin', 'Hey there, this upcoming, we will bake many mini chocolate muffin just for you.Come and let yourself enjoy the great moment.', '', '2020-04-01', ''),
(10, '', '', '', '2020-04-03', ''),
(11, '', '', '', '2020-04-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orID` int(11) NOT NULL,
  `oName` varchar(1000) NOT NULL,
  `oPhoneNum` int(50) NOT NULL,
  `oEmail` varchar(100) NOT NULL,
  `oType` varchar(1000) NOT NULL,
  `oSize` int(11) NOT NULL,
  `oDetFlav` varchar(100) NOT NULL,
  `oQuantity` int(11) NOT NULL,
  `oDetWght` int(11) NOT NULL,
  `oDetAddOn` varchar(1000) NOT NULL,
  `oDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orID`, `oName`, `oPhoneNum`, `oEmail`, `oType`, `oSize`, `oDetFlav`, `oQuantity`, `oDetWght`, `oDetAddOn`, `oDate`) VALUES
(1, 'nurul amirah', 145477447, 'mia@gmail.com', '', 0, 'strawberry', 0, 1, 'candles', ''),
(2, 'amalina ayuni', 145477447, 'yunani@gmail.com', 'cookies', 0, 'chocolate', 50, 0, 'gifted card', '12/05/2011'),
(3, 'zainal abidin', 141421521, 'zainal@gmail.com', 'cake', 4, 'strawberry', 2, 1, 'candles, gifted card', '12/12/2011');

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `mID` int(5) NOT NULL,
  `mName` int(20) NOT NULL,
  `mType` int(20) NOT NULL,
  `mDate` date NOT NULL,
  `mAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `uID` int(5) NOT NULL,
  `uName` varchar(20) NOT NULL,
  `uPwd` varchar(20) NOT NULL,
  `uFname` varchar(30) NOT NULL,
  `uPnum` int(200) NOT NULL,
  `uAddress` varchar(50) NOT NULL,
  `uEmail` varchar(20) NOT NULL,
  `uImg` varchar(2000) NOT NULL,
  `uCreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`uID`, `uName`, `uPwd`, `uFname`, `uPnum`, `uAddress`, `uEmail`, `uImg`, `uCreatedAt`) VALUES
(1, 'nurul amirah', 'amirah', 'nurul amirah binti ahmad albab', 141471458, 'gambang', 'nurul@gmail.com', '', '2020-04-28 10:29:08'),
(2, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(3, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(4, 'mahmood', '', '', 0, '', 'mahmood@gmail.com', '', '2020-04-28 10:29:08'),
(5, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(6, 'ali', '', '', 0, '', 'ali@gmail.com', '', '2020-04-28 10:29:08'),
(7, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(8, 'mira', '1226565', 'mira reduan', 0, 'gambang', 'meera@gmail.com', '', '2020-04-28 10:29:08'),
(9, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(10, 'aini', 'aini12345', 'aini marzuki', 0, 'gambang', 'aini@gmail.com', '', '2020-04-28 10:29:08'),
(11, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(12, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(13, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(14, 'ali', '1212121', 'ali baba', 0, 'gambang', 'ali2012@gmail.com', '', '2020-04-28 10:29:08'),
(21, '', '$2y$10$hCYZGxAcASi9q', '', 0, '', '', '', '2020-04-28 10:29:08'),
(22, '', '$2y$10$3M.gx7iCKJtgM', '', 0, '', '', '', '2020-04-28 10:29:08'),
(23, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(24, '', '$2y$10$QbEA4cJ8JoyCW', '', 0, '', '', '', '2020-04-28 10:29:08'),
(25, '', '$2y$10$1UOTT6cIxSQQn', '', 0, '', '', '', '2020-04-28 10:29:08'),
(26, 'ali', '$2y$10$g.DO5NL1Qa6EE', '', 0, '', '', '', '2020-04-28 10:29:08'),
(27, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(28, 'admin', '$2y$10$yI6TVM4msC.8g', '', 0, '', '', '', '2020-04-28 10:29:08'),
(29, 'mina', '$2y$10$0Z3KMY1o3bop/', '', 0, '', '', '', '2020-04-28 10:29:08'),
(30, 'mimi', '$2y$10$oD4pf7UM5Jygq', '', 0, '', '', '', '2020-04-28 10:29:08'),
(31, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(32, 'aiman', 'aiman123', 'aiman hakim', 0, 'gambang', 'aimanhak@gmail.com', '', '2020-04-28 10:29:08'),
(33, 'husnini', 'husnini123', 'adira husni', 0, 'gambang', 'husni@gmail.com', '', '2020-04-28 10:29:08'),
(34, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(35, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(36, 'aira', 'aira123', 'aira zawawi', 0, 'gambang', 'aira@gmail.com', '', '2020-04-28 10:29:08'),
(37, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(38, 'zahirah', 'zahirah123', 'zahirah macwilson', 141587421, 'gambang', 'zahirah@gmail.com', '', '2020-04-28 10:29:08'),
(39, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(40, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(41, '', '', '', 0, '', '', '', '2020-04-28 10:29:08'),
(42, 'jacob', '$2y$10$KctprXrWaKudf', '', 0, '', '', '', '2020-04-28 10:29:08'),
(43, 'nina', '$2y$10$9aLk4KyW5Htk9', '', 0, '', '', '', '2020-04-28 10:33:32'),
(44, '', '', '', 0, '', '', '', '2020-04-28 10:34:34'),
(45, '', '', '', 0, '', '', '', '2020-04-28 10:58:43'),
(46, 'nadia', 'nadia123', 'nadia mustafa', 1471471474, 'gambang', 'nadia@gmail.com', '', '2020-04-28 11:00:14'),
(47, '', '', '', 0, '', '', '', '2020-04-28 11:02:34'),
(48, '', '', '', 0, '', '', '', '2020-04-28 11:03:52'),
(49, '', '', '', 0, '', '', '', '2020-04-28 15:23:22'),
(50, '', '', '', 0, '', '', '', '2020-04-28 15:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  ADD PRIMARY KEY (`fID`);

--
-- Indexes for table `news_detail`
--
ALTER TABLE `news_detail`
  ADD PRIMARY KEY (`nID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orID`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`mID`);

--
-- Indexes for table `product_catalogue_detail`
--
ALTER TABLE `product_catalogue_detail`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_detail`
--
ALTER TABLE `feedback_detail`
  MODIFY `fID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_detail`
--
ALTER TABLE `news_detail`
  MODIFY `nID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `mID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_catalogue_detail`
--
ALTER TABLE `product_catalogue_detail`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `uID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

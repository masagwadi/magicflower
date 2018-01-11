-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2017 at 08:37 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afmfaith_magicflower`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--


--
-- Dumping data for table `orders`
--

INSERT INTO `orders` ( `OrdersFreq`, `OrdersRooms`, `OrdersBathRooms`, `OrdersCleaningMaterials`, `OrdersCleanWindow`, `OrdersName`, `OrdersLname`, `OrdersEmail`, `OrdersPhone`, `OrdersAdress`, `OrdersDate`, `create_time`, `OrderTotal`, `OrdersTime`, `city`, `province`, `pcode`, `OrderStatus`, `restype`, `pets`, `mypets`, `kids`, `payop`, `payref`, `orderDue`, `voucherIDorder`) VALUES
( 'OnceOff', '1', '1', 'No', 'No', 'Sandakahle', 'Zitha', 'zitha.sanda@gmail.com', '0610990608', '78 Gretna green, Summer greens', '2017-07-29 00:00:00', '2017-07-20 08:22:07', '201', '09H00 AM', 'Cape Town', 'WesternCape', '7441', 'scheduled', 'irent', 'nopets', '', 'nokids', 'cash', 'ZHGX6WX4', '201', 'no voucher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`


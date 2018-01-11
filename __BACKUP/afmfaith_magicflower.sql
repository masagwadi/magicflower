-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 04:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afmfaith_magicflower`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `idAddress` int(11) NOT NULL,
  `addressName` varchar(145) NOT NULL,
  `addressStreet` varchar(145) NOT NULL,
  `addressCity` varchar(45) NOT NULL,
  `addressProvince` varchar(45) NOT NULL,
  `addressCode` varchar(45) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminName` varchar(45) DEFAULT NULL,
  `AdminLname` varchar(45) DEFAULT NULL,
  `AdminPhone` varchar(45) DEFAULT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`, `create_time`, `AdminName`, `AdminLname`, `AdminPhone`, `AdminID`) VALUES
('masagwadi', 'masagwadi@gmail.com', '*7ED2C4EC9032D553EDF20A420D86E4DF8B34C796', '2017-02-14 19:43:01', 'Sagwadi', 'Maluleke', '0848358732', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--

CREATE TABLE `cleaners` (
  `CleanerID` int(11) NOT NULL,
  `CleanerName` varchar(45) DEFAULT NULL,
  `CleanerLname` varchar(45) DEFAULT NULL,
  `CleanerPhone` varchar(45) DEFAULT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(250) NOT NULL DEFAULT 'noimage',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cleaners`
--

INSERT INTO `cleaners` (`CleanerID`, `CleanerName`, `CleanerLname`, `CleanerPhone`, `username`, `password`, `email`, `image`, `create_time`) VALUES
(7, 'Sagwadi', 'Maluleke', '848358732', 'masagwadi05', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'masagwadi@gmail.comm', '350-orphan-black-sarah.jpg', '2017-06-17 18:36:03'),
(8, 'Wena', 'Mgaga', '0848358765', 'masagwadi', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'masagwadi@gmail.com', '418-image.jpg', '2017-06-17 20:20:16'),
(9, 'Lrt ', 'It work', '02220', 'letitwork', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'letit@gmail.com', '847-18839046_970731076362934_291435393745024406_n.jpg', '2017-06-27 10:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `cleanersorders`
--

CREATE TABLE `cleanersorders` (
  `cleanerD` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cleanertoorder`
--

CREATE TABLE `cleanertoorder` (
  `cleanertoorderID` int(11) NOT NULL,
  `c2oclenerID` int(11) NOT NULL,
  `c2oorderID` int(11) NOT NULL,
  `c2ocreatesdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleanertoorder`
--

INSERT INTO `cleanertoorder` (`cleanertoorderID`, `c2oclenerID`, `c2oorderID`, `c2ocreatesdate`) VALUES
(17, 7, 19, '2017-07-02 19:44:52'),
(18, 8, 19, '2017-07-02 19:44:56'),
(20, 7, 18, '2017-07-02 19:45:21'),
(21, 8, 18, '2017-07-02 19:45:34'),
(22, 7, 17, '2017-07-02 19:45:46'),
(23, 9, 17, '2017-07-02 19:45:51'),
(24, 8, 30, '2017-07-08 18:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `customerID` int(11) DEFAULT NULL,
  `addressID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customerorders`
--

CREATE TABLE `customerorders` (
  `customerID` int(11) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `idCustomers` int(11) NOT NULL,
  `CustomerName` varchar(45) NOT NULL,
  `CustomerLname` varchar(45) NOT NULL,
  `CustomerEmail` varchar(45) NOT NULL,
  `CustomerPhone` varchar(45) NOT NULL,
  `CustomerPass` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `Customerscol` varchar(250) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`idCustomers`, `CustomerName`, `CustomerLname`, `CustomerEmail`, `CustomerPhone`, `CustomerPass`, `username`, `Customerscol`, `create_time`, `activation_code`) VALUES
(7, 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '0848358732', '*7ED2C4EC9032D553EDF20A420D86E4DF8B34C796', 'masagwadi', '372-hsdr.png', '2017-02-09 12:29:44', 2919311);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrders` int(11) NOT NULL,
  `OrdersFreq` varchar(45) DEFAULT NULL,
  `OrdersRooms` varchar(45) DEFAULT NULL,
  `OrdersBathRooms` varchar(45) DEFAULT NULL,
  `OrdersCleaningMaterials` varchar(45) DEFAULT NULL,
  `OrdersCleanWindow` varchar(45) DEFAULT NULL,
  `OrdersName` varchar(45) DEFAULT NULL,
  `OrdersLname` varchar(45) DEFAULT NULL,
  `OrdersEmail` varchar(45) DEFAULT NULL,
  `OrdersPhone` varchar(45) DEFAULT NULL,
  `OrdersAdress` varchar(45) DEFAULT NULL,
  `OrdersDate` datetime DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderTotal` varchar(20) NOT NULL,
  `OrdersTime` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `OrderStatus` varchar(250) NOT NULL DEFAULT 'processing',
  `restype` varchar(250) NOT NULL,
  `pets` varchar(500) NOT NULL,
  `mypets` varchar(500) NOT NULL,
  `kids` varchar(500) NOT NULL,
  `payop` varchar(250) NOT NULL,
  `payref` varchar(250) NOT NULL,
  `orderDue` varchar(250) NOT NULL,
  `voucherIDorder` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrders`, `OrdersFreq`, `OrdersRooms`, `OrdersBathRooms`, `OrdersCleaningMaterials`, `OrdersCleanWindow`, `OrdersName`, `OrdersLname`, `OrdersEmail`, `OrdersPhone`, `OrdersAdress`, `OrdersDate`, `create_time`, `OrderTotal`, `OrdersTime`, `city`, `province`, `pcode`, `OrderStatus`, `restype`, `pets`, `mypets`, `kids`, `payop`, `payref`, `orderDue`, `voucherIDorder`) VALUES
(17, 'Weekly', '2', '1', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-05-18 00:00:00', '2017-05-10 09:59:42', '202,00', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'cancelled', 'irent', 'yespets', 'ggg', 'yeskids', 'transfare', 'Q1DXFD1M', '', ''),
(18, 'Weekly', '3', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-05-18 00:00:00', '2017-05-10 10:09:50', '261,00', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', 'hghg', 'yeskids', 'transfare', 'HM4XR7IH', '', ''),
(19, 'Bi-Weekly', '3', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-05-11 00:00:00', '2017-05-10 10:11:51', '266,90', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'iown', 'nopets', '', 'yeskids', 'cash', 'BNYH62A2', '', ''),
(20, 'Bi-Weekly', '3', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-13 00:00:00', '2017-07-07 16:31:36', '186,83', '14H00 PM', 'Bellville', 'WesternCape', '3575', 'processing', '', 'yespets', '', 'yeskids', 'transfare', '1R50H4DQ', '', ''),
(21, 'Bi-Weekly', '3', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-13 00:00:00', '2017-07-07 16:53:02', '214,83', '14H00 PM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'transfare', 'Y2GRAUVK', '214,83', ''),
(22, 'Monthly', '5', '4', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-14 00:00:00', '2017-07-07 17:04:56', '192,25', '11H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'transfare', '8S6UZROF', '192,25', ''),
(23, 'Bi-Weekly', '3', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-27 00:00:00', '2017-07-07 17:08:37', '286,90', '11H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'cash', 'V859OTRL', '286,90', ''),
(24, 'Monthly', '3', '4', 'No', 'No', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-28 00:00:00', '2017-07-07 17:12:54', '332,50', '15H00 PM', 'Bellville', 'WesternCape', '3575', 'processing', 'iown', 'yespets', '', 'yeskids', 'cash', 'UAM25SAZ', '332,50', ''),
(25, 'Monthly', '5', '3', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-19 00:00:00', '2017-07-07 17:40:05', '362,25', '11H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'cash', 'NURVBTGG', '362,25', ''),
(26, 'Monthly', '4', '4', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-20 00:00:00', '2017-07-07 17:42:30', '182,50', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'yeskids', 'cash', '217PC8SQ', '382,50', ''),
(27, 'Bi-Weekly', '5', '4', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-14 00:00:00', '2017-07-07 17:45:05', '385,63', '12H00 PM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'cash', 'KRHGDSBF', '385,63', ''),
(28, 'Bi-Weekly', '4', '4', 'No', 'No', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-31 00:00:00', '2017-07-07 17:53:27', '276,25', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'processing', 'irent', 'yespets', '', 'nokids', 'cash', '7ZZI1HRF', '76', ''),
(29, 'Bi-Weekly', '5', '2', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-14 00:00:00', '2017-07-07 17:58:18', '285.63', '12H00 PM', 'Bellville', 'WesternCape', '3575', 'processing', 'iown', 'yespets', '', 'nokids', 'cash', 'KL48PYGZ', '199,94', ''),
(30, 'Bi-Weekly', '4', '4', 'No', 'Yes', 'Sagwadi', 'Maluleke', 'masagwadi@gmail.com', '848358732', '24 Stratton Court', '2017-07-19 00:00:00', '2017-07-07 18:06:13', '376.25', '08H00 AM', 'Bellville', 'WesternCape', '3575', 'cancelled', 'irent', 'yespets', '', 'nokids', 'cash', 'ZZY6ZY94', '176,25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucherName` varchar(250) NOT NULL,
  `voucherDscrp` varchar(500) NOT NULL,
  `voucherID` int(11) NOT NULL,
  `voucherType` varchar(250) NOT NULL DEFAULT 'general',
  `voucherValue` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `voucherCode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucherName`, `voucherDscrp`, `voucherID`, `voucherType`, `voucherValue`, `dateCreated`, `number`, `status`, `voucherCode`) VALUES
('', '', 1, 'value', 200, '2017-03-01 13:33:46', 25, 'active', 'masagwadi'),
('Sagwadi', 'This is just a test nje', 2, 'percent', 30, '2017-07-03 19:28:59', 50, 'active', 'FIRTSTMAGIC'),
('Sagwadi', 'Mrnaledi@30', 4, 'value', 50, '2017-07-03 20:12:18', 220, 'active', '2000'),
('2010', 'test 3', 5, 'percent', 10, '2017-07-07 19:53:51', 20, 'inactive', '2010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idAddress`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD PRIMARY KEY (`CleanerID`);

--
-- Indexes for table `cleanertoorder`
--
ALTER TABLE `cleanertoorder`
  ADD PRIMARY KEY (`cleanertoorderID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`idCustomers`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrders`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `idAddress` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cleaners`
--
ALTER TABLE `cleaners`
  MODIFY `CleanerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cleanertoorder`
--
ALTER TABLE `cleanertoorder`
  MODIFY `cleanertoorderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `idCustomers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

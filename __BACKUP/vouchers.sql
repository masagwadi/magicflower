-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2017 at 08:32 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

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
('', '', 1, 'value', 200, '2017-03-01 13:33:46', 25, 'inactive', 'masagwadi'),
('Sagwadi', 'This is just a test nje', 2, 'percent', 30, '2017-07-03 19:28:59', 50, 'inactive', 'FIRTSTMAGIC'),
('Sagwadi', 'Mrnaledi@30', 4, 'value', 50, '2017-07-03 20:12:18', 220, 'inactive', '2000'),
('2010', 'test 3', 5, 'percent', 10, '2017-07-07 19:53:51', 20, 'inactive', '2010'),
('50% off', '50% off your order ', 6, 'percent', 50, '2017-07-15 19:35:37', 100, 'active', 'FACEBOOK50%OFF'),
('50% OFF', '50% off your first booking', 7, 'percent', 50, '2017-08-31 11:28:47', 20, 'active', 'CV6TMVL9'),
('30% off', '30%', 8, 'percent', 30, '2017-09-13 06:43:28', 20, 'active', 'D4NFF30F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

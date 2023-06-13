-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2023 at 12:04 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milkman_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `machinedetails`
--

DROP TABLE IF EXISTS `machinedetails`;
CREATE TABLE IF NOT EXISTS `machinedetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machinecode` varchar(10) NOT NULL,
  `milktemp` varchar(5) NOT NULL,
  `milkvolume` varchar(5) NOT NULL,
  `oilvolume` varchar(5) NOT NULL,
  `machinelatitude` varchar(16) NOT NULL,
  `machinelongitude` varchar(16) NOT NULL,
  `machinerent` varchar(6) NOT NULL,
  `createdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machinedetails`
--

INSERT INTO `machinedetails` (`id`, `machinecode`, `milktemp`, `milkvolume`, `oilvolume`, `machinelatitude`, `machinelongitude`, `machinerent`, `createdatetime`) VALUES
(11, '23', '111', '111', '112', '12', '122', '121', '2023-06-13 08:18:47'),
(12, '112', '233', '567', '89', '12', '45', '5555', '2023-06-13 10:53:23'),
(13, '112', '233', '567', '89', '12', '45', '5555', '2023-06-13 10:57:56'),
(14, '112', '233', '567', '89', '12', '45', '5555', '2023-06-13 10:58:06'),
(15, '500', '122', '400', '300', '289', '123', '333', '2023-06-13 11:00:53'),
(16, '33', '22', '234', '12', '124', '23', '33', '2023-06-13 11:57:57'),
(17, '56', '334', '478', '689', '90', '89', '788', '2023-06-13 11:58:29'),
(18, '325', '267', '2789', '677', '78', '88', '8', '2023-06-13 11:59:02'),
(19, '345', '336', '34', '57', '888', '89', '890', '2023-06-13 11:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `code` int(11) NOT NULL,
  `milkprice` varchar(4) NOT NULL,
  `oilprice` varchar(4) NOT NULL,
  `validto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdtimedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`code`),
  KEY `id` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`code`, `milkprice`, `oilprice`, `validto`, `createdtimedate`) VALUES
(1, '22', '42', '2023-06-13 08:20:17', '2023-06-13 08:20:29'),
(122, '122', '123', '2023-06-13 13:33:59', '2023-06-13 10:33:59'),
(12, '333', '124', '2023-06-13 13:38:15', '2023-06-13 10:38:15'),
(13, '56', '78', '2023-06-13 13:42:08', '2023-06-13 10:42:08'),
(126, '567', '88', '2023-06-13 14:03:43', '2023-06-13 11:03:43'),
(33, '45', '33', '2023-06-13 14:57:00', '2023-06-13 11:57:00'),
(35, '34', '56', '2023-06-13 14:57:11', '2023-06-13 11:57:11'),
(234, '267', '167', '2023-06-13 14:57:20', '2023-06-13 11:57:20'),
(67, '66', '67', '2023-06-13 14:57:30', '2023-06-13 11:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment\r\n',
  `xid_machinecode` varchar(10) NOT NULL,
  `transaction_ref` varchar(10) NOT NULL,
  `request_id` varchar(50) NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `transactiondate` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(16) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `xid_machinecode`, `transaction_ref`, `request_id`, `transaction_code`, `amount`, `phone_number`, `transactiondate`, `status`) VALUES
(12, '22', '21', '12', '123', 31, '33', '2023-06-13 08:19:37', 1),
(13, '12', '1122', '112', '13', 334, '1122', NULL, 1),
(14, '126', '123', '33', '34', 12, '34', NULL, 1),
(15, '444', '444', '444', '444', 444, '444', '2023-06-13 14:24:48', 1),
(55, '55', '78', '57', '123', 23, '34567', '2023-06-13 14:54:06', 1),
(23, '34', '567', '678', '890', 9000, '99', '2023-06-13 14:55:03', 1),
(3, '345', '23', '67', '88', 89, '88990', '2023-06-13 14:56:19', 1),
(56, '34', '56', '89', '677', 777, '777', '2023-06-13 14:59:55', 1),
(57, '778', '78', '999', '457', 789, '90', '2023-06-13 15:00:22', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

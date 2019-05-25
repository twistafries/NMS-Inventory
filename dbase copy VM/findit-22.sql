-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2019 at 08:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findit`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `done_by` varchar(100) NOT NULL,
  `data` bigint(20) DEFAULT NULL,
  `system_unit` bigint(20) DEFAULT NULL,
  `issued_to` varchar(100) DEFAULT NULL,
  `deleted_item` varchar(255) DEFAULT NULL,
  `from_status` varchar(20) DEFAULT NULL,
  `to_status` varchar(20) DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`done_by`),
  KEY `data` (`data`),
  KEY `system_unit` (`system_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Information Technology Development Department', '2019-03-09 15:18:55', NULL, 'active'),
(2, 'Production Development Department', '2019-03-22 00:26:46', NULL, 'active'),
(3, 'Financial Department', '2019-03-22 00:26:46', NULL, 'active'),
(4, 'Human Resources Department', '2019-03-22 00:27:09', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `email`, `dept_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Justine', 'Garcia', '2153591@slu.edu.ph', 1, '2019-03-13 12:54:23', NULL, 'active'),
(2, 'Lovelyn', 'Paris', 'lovelynparis@gmail.com', 1, '2019-03-27 21:46:11', NULL, 'active'),
(3, 'Aika Vien', 'Dayrit', 'aikaviend@gmail.com', 1, '2019-04-10 12:21:18', NULL, 'active'),
(4, 'Jon Paulo', 'Faypon', 'jonpaulo@gmail.com', 1, '2019-04-10 12:21:18', NULL, 'active'),
(5, 'Gavin Roy', 'Ferrer', 'gavinroy@gmail.com', 1, '2019-04-10 12:21:56', NULL, 'active'),
(6, 'Mehanie', 'Lonogan', 'mehanie@gmail.com', 1, '2019-04-10 12:21:56', NULL, 'active'),
(7, 'Kim', 'Willy', 'kim@gmail.com', 2, '2019-04-10 12:22:38', NULL, 'active'),
(8, 'Geovelle Jhoyce', 'Andres', 'geovelle@gmail.com', 2, '2019-04-10 12:22:38', NULL, 'active'),
(9, 'Amy', 'Santiago', 'amy@gmail.com', 2, '2019-04-10 12:23:25', NULL, 'active'),
(10, 'Raymond', 'Holt', 'raymond@gmail.com', 2, '2019-04-10 12:23:25', NULL, 'active'),
(11, 'Rosa', 'Diaz', 'rosa@gmail.com', 2, '2019-04-26 12:54:07', NULL, 'active'),
(12, 'Charles', 'Boyle', 'charles@email.com', 2, '2019-04-28 05:09:23', NULL, 'active'),
(13, 'Gina', 'Linetti', 'gina@gmail.com', 3, '2019-04-28 05:15:46', NULL, 'active'),
(14, 'Terry', 'Jeffords', 'terry@gmail.com', 3, '2019-04-28 05:19:53', NULL, 'active'),
(15, 'Norm', 'Skully', 'norm@gmail.com', 3, '2019-04-28 05:22:28', NULL, 'active'),
(16, 'Michael', 'Hitchcock', 'michael@gmail.com', 3, '2019-04-28 05:36:05', NULL, 'active'),
(17, 'Adrian', 'Pimento', 'adrian@gmail.com', 3, '2019-04-28 05:39:52', NULL, 'active'),
(18, 'Doug', 'Judy', 'doug@gmail.com', 3, '2019-04-28 05:43:37', NULL, 'active'),
(19, 'Melvin', 'Stermly', 'melvin@gmail.com', 4, '2019-04-28 05:51:49', NULL, 'active'),
(20, 'John', 'Doe', 'johndoe@gmail.com', 4, '2019-04-28 05:54:28', NULL, 'active'),
(21, 'Sarah', 'Maas', 'sarah@gmail.com', 4, '2019-04-28 05:55:00', NULL, 'active'),
(22, 'Brandon', 'Sanderson', 'brandon@gmail.com', 4, '2019-04-28 05:59:03', NULL, 'active'),
(23, 'Victoria', 'Aveyard', 'victoria@gmail.com', 4, '2019-05-19 21:43:10', NULL, 'active'),
(24, 'Jenny', 'Han', 'jenny@gmail.com', 4, '2019-05-19 21:43:10', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_status`
--

DROP TABLE IF EXISTS `equipment_status`;
CREATE TABLE IF NOT EXISTS `equipment_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_status`
--

INSERT INTO `equipment_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Available', '2019-03-09 15:12:25', NULL),
(2, 'Issued', '2019-03-09 15:12:25', NULL),
(3, 'For repair', '2019-03-09 15:13:07', NULL),
(4, 'For return', '2019-03-09 15:13:07', NULL),
(5, 'For disposal', '2019-03-09 15:13:28', NULL),
(6, 'Pending', '2019-03-09 15:13:28', NULL),
(7, 'Decommissioned', '2019-03-11 22:43:40', NULL),
(8, 'In-use', '2019-04-15 13:17:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_concerns`
--

DROP TABLE IF EXISTS `inventory_concerns`;
CREATE TABLE IF NOT EXISTS `inventory_concerns` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name_component` bigint(20) NOT NULL,
  `system_unit` bigint(20) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_user` bigint(20) NOT NULL,
  `added_by` bigint(20) NOT NULL,
  `remarks` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name_component` (`name_component`),
  KEY `system_unit` (`system_unit`),
  KEY `status_id` (`status_id`),
  KEY `last_user` (`last_user`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuance`
--

DROP TABLE IF EXISTS `issuance`;
CREATE TABLE IF NOT EXISTS `issuance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `equipment_id` bigint(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `issued_to` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `issued_until` date DEFAULT NULL,
  `returned_at` date DEFAULT NULL,
  `remarks` varchar(120) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `unit_id` (`unit_id`),
  KEY `issued_to` (`issued_to`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`),
  KEY `equipment_id` (`equipment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`id`, `equipment_id`, `unit_id`, `issued_to`, `user_id`, `created_at`, `updated_at`, `issued_until`, `returned_at`, `remarks`, `status_id`) VALUES
(1, 13, NULL, 8, 1, '2019-04-16 19:20:06', NULL, '2019-06-30', NULL, 'Issued with charger.', 2),
(2, 13, NULL, 7, 2, '2019-04-28 03:35:01', NULL, '2019-05-31', NULL, NULL, 2),
(9, 68, NULL, 13, 2, '2019-05-01 00:00:00', NULL, NULL, NULL, 'Issued with charger.', 2),
(10, 70, NULL, 14, 2, '2019-05-01 00:00:00', NULL, NULL, NULL, 'Issued with charger.', 2),
(13, 71, NULL, 15, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.', 2),
(14, 72, NULL, 16, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.', 2),
(15, 73, NULL, 17, 3, '2019-05-19 21:55:20', '2019-05-07 00:00:00', NULL, NULL, 'Issued with charger.', 2),
(16, 74, NULL, 18, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.', 2),
(17, 77, NULL, 7, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and laptop bag.', 2),
(18, 78, NULL, 8, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.', 2),
(19, 79, NULL, 9, 4, '2019-05-13 22:17:48', NULL, NULL, NULL, 'Issued with charger and bag.', 2),
(20, 80, NULL, 10, 4, '2019-05-13 22:17:48', NULL, NULL, NULL, 'Issued with charger and bag.', 2),
(21, 81, NULL, 11, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.', 2),
(22, 82, NULL, 12, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.', 2),
(23, NULL, 1, 1, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL, 2),
(24, NULL, 2, 2, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL, 2),
(25, NULL, 5, 5, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL, 2),
(26, NULL, 6, 6, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL, 2),
(27, 39, NULL, 1, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL, 2),
(28, 40, NULL, 2, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL, 2),
(29, 41, NULL, 3, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL, 2),
(30, 115, NULL, 4, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL, 2),
(31, 42, NULL, 1, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL, 2),
(32, 43, NULL, 2, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL, 2),
(33, 44, NULL, 3, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL, 2),
(34, 45, NULL, 4, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL, 2),
(37, 46, NULL, 1, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL, 2),
(38, 47, NULL, 2, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL, 2),
(39, 48, NULL, 3, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL, 2),
(40, 116, NULL, 4, 1, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL, 2),
(41, NULL, 7, 7, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(42, NULL, 8, 8, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(43, NULL, 9, 9, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(44, NULL, 10, 10, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(45, NULL, 11, 11, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(46, NULL, 12, 12, 2, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(47, 161, NULL, 7, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(48, 162, NULL, 8, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(49, 163, NULL, 9, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(50, 164, NULL, 10, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(51, 165, NULL, 11, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(52, 166, NULL, 12, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(53, 167, NULL, 7, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(54, 168, NULL, 8, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(55, 169, NULL, 9, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(56, 170, NULL, 10, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(57, 171, NULL, 11, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(58, 172, NULL, 12, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(59, 173, NULL, 7, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(60, 174, NULL, 8, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(61, 175, NULL, 9, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(62, 176, NULL, 10, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(63, 177, NULL, 11, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(64, 178, NULL, 12, 3, '2019-05-18 00:00:00', NULL, NULL, NULL, NULL, 2),
(65, NULL, 13, 19, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.', 2),
(66, NULL, 14, 20, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.', 2),
(67, NULL, 15, 21, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.', 2),
(68, NULL, 16, 22, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.', 2),
(69, NULL, 17, 23, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.', 2),
(70, NULL, 18, 24, 4, '2019-05-24 01:11:31', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment`
--

DROP TABLE IF EXISTS `it_equipment`;
CREATE TABLE IF NOT EXISTS `it_equipment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subtype_id` tinyint(4) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `or_no` varchar(50) NOT NULL,
  `imei_or_macaddress` varchar(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `supplier` varchar(50) NOT NULL,
  `warranty_start` date DEFAULT NULL,
  `warranty_end` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_no` (`serial_no`),
  UNIQUE KEY `imei_or_macaddress` (`imei_or_macaddress`),
  KEY `unit_id` (`unit_id`),
  KEY `status_id` (`status_id`),
  KEY `subtype_id` (`subtype_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_equipment`
--

INSERT INTO `it_equipment` (`id`, `subtype_id`, `brand`, `model`, `details`, `serial_no`, `or_no`, `imei_or_macaddress`, `unit_id`, `supplier`, `warranty_start`, `warranty_end`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(1, 1, 'MSI', 'B450-A Pro', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903273465', ' 601-7577-010B0903273465', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(2, 2, 'AMD', 'R5 1500X', 'Socket: AM4\r\n4-core 8-thread 3.5GHz-3.7GHz\r\nTDP: 65W', 'YD170XBCM88AE', 'YD170XBCM88AE', NULL, NULL, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(3, 3, 'Seagate', 'HDD', '1TB Harddisk Drive', 'YST-657A-DATSDC', '0399', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(4, 1, 'MSI', 'Z390-A PRO', 'Socket: LGA 1151\r\nChipset: Intel Z390\r\nSize: ATX\r\nRAM: 4 slots, DDR4\r\nPCIe: x16/x4, PCIe 3.0, CrossFireX', 'AZT-F72346', '0399', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:11:35', NULL, 2, 1),
(5, 2, 'Intel', 'i5 9600K', '6-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR90O', '53792', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(6, 3, 'Seagate', 'HDD', '1TB HDD', 'SYT099-AXHN9P-WT34', 'SYT099-AXHN9P-WT34', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(7, 4, 'Kingston', '16GB DDR4 RAM', '8GB DDR4 RAM x2', '09UT-DRY7-90M8', '09UT-DRY7-90M8', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(8, 5, 'NVIDIA', 'GTX 1060 6GB', 'GeForce GTX 1060 6GB VRAM', ' WSD9-RH790', ' WSD9-RH790', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(9, 6, 'SeaSonic', 'M12II 620', '620 Watt Power Supply', '120-G1-0650-XR', '43790', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(10, 7, 'Noctua', 'NH-U12S', '120mm fans; 158mm Height.\r\nSocket: LGA1151\r\nTDP: 140W', 'JHY78-DF678', 'TDP: 140W', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(13, 14, 'Apple', 'Iphone 8', '64GB', 'IPH-12345678', '09878', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 2),
(14, 1, 'ASUS', 'A320M-K ', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', ' 601-7577-010B0703273216', ' 601-7577-010B0703273216', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(15, 1, 'ASRock', 'Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 801-7210-218B0903810386', ' 801-7210-218B0903810386', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(16, 1, 'GIGABYTE', 'A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903212615', ' 601-7577-010B0903212615', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(17, 3, 'Sony', 'HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'SNY-216C-DDATSW', '21251', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(18, 4, 'HyperX ', 'Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', '09UT-DRY7-80M1', '09UT-DRY7-80M1', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(19, 5, 'MSI', '1050Ti 4GB', '4GB; 2 Doors', ' WSD9-DH690', ' WSD9-DH690', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(20, 5, 'Palit', '1050ti 4GB', '1050ti 4GB 2 Doors', ' WSD9-BG750', ' WSD9-BG750', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(21, 2, 'AMD', 'Ryzen 5 2400g with Vega 11 Graphics', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ215', 'ATY-V87RST-DEQ215', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 3),
(22, 2, 'AMD', 'Ryzen 5 2600g ', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ220', 'ATY-V87RST-DEQ220', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(23, 2, 'AMD', 'Ryzen 7 1700g ', '8 Cores\r\n16 Threads\r\n3.7 Base Clock', 'ATY-V87RST-SET201', 'ATY-V87RST-SET201', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(24, 2, 'Intel', 'i5 9900K', '8-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR222', 'ATY-V87RST-CHR222', NULL, 2, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(25, 6, 'EVGA', '700', 'EVGA 700W Power Supply', '260-H1-0210-DR', '260-H1-0210-DR', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 3),
(26, 6, 'EVGA', '600', 'EVGA 600W Power Supply', '260-H1-0211-DR', '260-H1-0211-DR', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(27, 7, 'ID Cooling', 'DF-12025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'JHY78-DW2125', 'JHY78-DW2125', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(28, 14, 'Apple', 'Iphone 7', '64GB', 'IPH-223345213', 'IPH-223345213', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(29, 4, 'Kingston ', '4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', '09UT-DRT7-2212', '09UT-DRT7-2212', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(30, 4, 'HyperX', '16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', '09UT-DRY7-1126', '09UT-DRY7-1126', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 3),
(31, 3, 'WD', '1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'WD-122C-DDATSG', 'WD-122C-DDATSG', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(32, 1, 'MSI ', 'X470 Motherboard', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903272123', ' 601-7577-010B0903272123', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(33, 14, 'Apple', 'Iphone 6', 'Space Grey\r\n16GB', 'IPH-1325423', 'IPH-1325423', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(34, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1121', 'JHY78-DW1121', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 3),
(35, 15, 'Microsoft ', 'Windows 10 Pro', 'Windows 10 Pro', '290528961_PH-471404239', '290528961_PH-471404239', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(36, 15, 'Microsoft ', 'Windows 10 ', 'Windows 10 ', '290528961_PH-471404126', '290528961_PH-471404126', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 2),
(37, 13, 'Samsung', 'Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 'SSG-121824', 'SSG-121824', NULL, NULL, 'Samsung Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 2),
(38, 13, 'Apple', 'iPad Pro', 'Space Grey\r\n64GB\r\niOS 12\r\nAndroid Kitkat', 'IPD-210642', 'IPD-210642', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 2),
(39, 9, 'Razer ', 'Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 'RZR-1291502', 'RZR-1291502', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(40, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463', 'LGT-921463', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(41, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261233', 'RZR-1261233', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(42, 10, 'A4Tech', 'KD-600L', 'Red Backlight Keyboard\r\nNormal Key Caps\r\nUltra-Slim \r\n', 'RZR-1261972', 'RZR-1261972', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(43, 10, 'Razer', 'Cynosa', 'Razer Cynosa Keyboard\r\n', 'RZR-9212611', 'RZR-9212611', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(44, 10, 'Logitech', 'MK235', 'Logitech MK235 Keyboard\r\nOrange Key Switches\r\nBlue Backlight', 'LGT-M12612', 'LGT-M12612', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(45, 10, 'Logitech ', 'K480', 'Logitech K480 Keyboard', 'LGT-K210654', 'LGT-K210654', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(46, 11, 'NVISION ', '24\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n144 Refresh Rate\r\n1920 x 1080 Screen Resolution', 'NVS-C991284', 'NVS-C991284', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(47, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212884', 'BEN-C212884', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(48, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13508', 'SMS-SW13508', NULL, NULL, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(49, 7, 'Rakk', 'Kisig PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'RAK-210421', 'RAK-210421', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(50, 7, 'Rakk ', 'Anyag PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1151\r\nTDP: 140W', 'RAK-210512', 'RAK-210512', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(51, 7, 'Rakk ', 'Hawani Flow PC Case', 'Noctua 6 120mm fans; 158mm Height.\r\nSocket: 1151 and AM4\r\nTDP: 140W', 'RAK-212123', 'RAK-212123', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(55, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1122', 'JHY78-DW1121', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(56, 10, 'Razer', 'Blackwidow Lite', 'Razer Blackwidow Lite \r\nBrown Key Switches\r\n', 'RZR-1261213', 'RZR-1261213', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(58, 10, 'Logitech', 'MK445', 'Logitech MK445 Keyboard\r\nBrown Key Switches\r\nRGB Lighting', 'LGT-M12622', 'LGT-M12622', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(59, 9, 'A4Tech', 'OP-720', '1000 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261221', 'A4-1261221', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 3),
(60, 9, 'A4Tech', 'N-708x', '1200 DPI\r\nAmbidextrous Style\r\n4 Mouse button\r\n', 'A4-921222', 'A4-921222', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 3),
(62, 10, 'A4Tech', 'KD-650', 'Blue Backlight Keyboard\r\nGreen Key Switches', 'RZR-1262212', 'RZR-1262212', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(63, 10, 'A4Tech', 'KD-126', 'LED Backlight\r\nLaser-inscribed Keys\r\nUltra Slim ', 'RZR-1263311', 'RZR-1263311', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(65, 9, 'A4Tech', 'G3-220N', 'Wireless mouse\r\n1800 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261132', 'A4-1261132', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(66, 11, 'Lenovo', '19\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n75 Refresh Rate\r\n1280 x 1024 Screen Resolution', 'NVS-C991122', 'NVS-C991122', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(67, 11, 'BenQ', '24\" LED Monitor', 'BenQ 24\" LED Monitor\r\n144hz Refresh Rate\r\n1920 x 1080 Resolution', 'BEN-C212222', 'BEN-C212222', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 3),
(68, 14, 'Apple', 'iPhone 8 Plus', 'CPU: Apple A11 Bionic\r\nRAM: 3GB\r\nStorage: 64GB', 'XY6XYXZ7WZ01', '0499', '123456789012345', NULL, 'Apple Store', '2019-01-07', '2020-01-07', '2019-01-07 15:32:24', NULL, 3, 2),
(70, 14, 'Apple', 'iPhone 8 Plus', 'CPU: Apple A11 Bionic\r\nRAM: 3GB\r\nStorage: 64GB', 'XY6XYXZ7WZ02', '0499', '123456789098765', NULL, 'Apple Store', '2019-01-07', '2020-01-07', '2019-01-07 15:38:33', NULL, 3, 2),
(71, 14, 'Apple', 'iPhone 8', 'Storage: 64GB\r\nRAM: 2GB\r\nCPU: A11 with Bionic chip with 64-bit architecture', 'XY6XYXZ7WZ03', '0499', '123456789034567', NULL, 'Apple Store', '2018-04-04', '2019-04-04', '2018-04-04 15:42:18', NULL, 3, 2),
(72, 14, 'Apple', 'iPhone 8', 'Storage: 64GB RAM: 2GB CPU: A11 with Bionic chip with 64-bit architecture', 'XY6XYXZ7WZ04', '0499', '123456789034569', NULL, 'Apple Store', '2018-04-04', '2019-04-04', '2018-04-04 15:44:56', NULL, 3, 2),
(73, 14, 'Apple', 'iPhone 7', 'Storage: 32GB\r\nCPU: Apple A10 Fussion\r\nRAM: 2GB', 'XY6XYXZ7WZ05', '0127', '987654321054321', NULL, 'Apple Store', '2017-10-20', '2018-10-20', '2017-10-20 15:50:04', NULL, 3, 2),
(74, 14, 'Apple', 'iPhone 7', 'Storage: 64GB CPU: Apple A10 Fussion RAM: 2GB', 'XY6XY7XYZ06', '0127', '543219876556789', NULL, 'Apple Store', '2018-10-20', '2018-10-20', '2017-10-10 15:50:04', NULL, 3, 2),
(75, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'XZ32YX56ZY98', '1234', '167890123456789', NULL, 'Apple Store', '2019-04-29', '2020-04-29', '2019-04-29 15:59:18', NULL, 1, 6),
(76, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'XY46XY5Z7W89', '1234', '209876543217865', NULL, 'Apple Store', '2019-04-29', '2020-04-29', '2019-04-29 15:59:18', NULL, 1, 6),
(77, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'WHY-546B-DATDOPE', '5678', NULL, NULL, 'PC Depot', '2019-04-26', '2020-05-26', '2019-04-26 16:05:01', NULL, 2, 2),
(78, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'WHY-435C-DATNICE', '5678', NULL, NULL, 'PC Depot', '2019-04-26', '2020-05-26', '2019-04-26 16:08:07', NULL, 2, 2),
(79, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-435C-ARTSYY', '5678', '', NULL, 'PC Depot', '2019-04-26', '2019-05-26', '2019-04-26 00:00:00', NULL, 2, 2),
(80, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-435C-RTYERW', '5678', NULL, NULL, 'PC Depot', '2019-04-26', '2019-05-26', '2019-05-19 22:12:08', '2019-04-26 00:00:00', 2, 2),
(81, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-487D-ARTSYZ', '5678', NULL, NULL, 'PC Depot', '2019-04-26', '2019-05-26', '2019-05-26 00:00:00', NULL, 2, 2),
(82, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'IUO-234E-1234', '5678', NULL, NULL, 'PC Depot', '2019-04-26', '2019-05-26', '2019-05-19 22:15:04', '2019-04-26 00:00:00', 2, 2),
(83, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(84, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(85, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(86, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00004', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(87, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-00001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(88, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-00002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(89, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-00003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(90, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-00004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(91, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(92, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(93, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(94, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(95, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:17:56', '2020-04-16 00:00:00', 1, 8),
(96, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:17:56', '2020-04-16 00:00:00', 1, 8),
(97, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:17:56', '2020-04-16 00:00:00', 2, 8),
(98, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:17:56', '2020-04-16 00:00:00', 2, 8),
(99, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(100, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(101, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(102, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(103, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:28:01', '2019-04-16 00:00:00', 1, 8),
(104, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:28:01', '2019-04-16 00:00:00', 1, 8),
(105, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:28:01', '2019-04-16 00:00:00', 2, 8),
(106, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-05-22 20:28:01', '2019-04-16 00:00:00', 2, 8),
(107, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2020-04-16 00:00:00', NULL, 1, 8),
(108, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2020-04-16 00:00:00', NULL, 1, 8),
(109, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2020-04-16 00:00:00', NULL, 2, 8),
(110, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2020-04-16 00:00:00', NULL, 2, 8),
(111, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0001', '4321', NULL, 1, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(112, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0002', '4321', NULL, 2, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(113, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0003', '0567', NULL, 3, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(114, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0004', '0567', NULL, 4, 'Octagon', '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(115, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261234', 'RZR-1261233', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(116, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13509', 'SMS-SW13508', NULL, NULL, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 2),
(117, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(118, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(119, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(120, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(121, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(122, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(123, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(124, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(125, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(126, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(127, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(128, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 'CPU-RYZEN51500X-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(129, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(130, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(131, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(132, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(133, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(134, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(135, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(136, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0002', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(137, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(138, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(139, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(140, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(141, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(142, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(143, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(144, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(145, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(146, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(147, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(148, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(151, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0003', '0234', NULL, 9, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(152, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(153, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(154, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2020-05-22 00:00:00', NULL, 4, 8),
(155, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0001', '0234', NULL, 7, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(156, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0002', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(157, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0003', '0234', NULL, 8, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(158, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0004', '0234', NULL, 10, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(159, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0005', '0234', NULL, 11, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(160, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0006', '0234', NULL, 12, 'PC Express', '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(161, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0001', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(162, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0002', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(163, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0003', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(164, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0004', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(165, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0005', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(166, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0006', '921463', NULL, NULL, 'Data Blitz', '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 2),
(167, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0001', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(168, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0002', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(169, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0003', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(170, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0004', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(171, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0005', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(172, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0006', '3508', NULL, NULL, 'PC Depot', '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 2),
(173, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0001', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2),
(174, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0002', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2),
(175, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0003', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2),
(176, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0004', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2),
(177, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0005', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2),
(178, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0006', '9845', NULL, NULL, 'Octagon', '2019-04-17', '2019-05-17', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment_subtype`
--

DROP TABLE IF EXISTS `it_equipment_subtype`;
CREATE TABLE IF NOT EXISTS `it_equipment_subtype` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_equipment_subtype`
--

INSERT INTO `it_equipment_subtype` (`id`, `type_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Motherboard', '2019-03-20 14:07:51', NULL),
(2, 1, 'CPU', '2019-03-20 14:07:51', NULL),
(3, 1, 'Storage', '2019-03-20 14:08:27', NULL),
(4, 1, 'RAM', '2019-03-20 14:08:27', NULL),
(5, 1, 'GPU', '2019-03-20 14:08:51', NULL),
(6, 1, 'Power Supply', '2019-03-20 14:08:51', NULL),
(7, 1, 'Case', '2019-03-20 14:09:51', NULL),
(8, 1, 'Heat Sink Fan', '2019-03-20 14:09:51', NULL),
(9, 2, 'Mouse', '2019-03-20 14:10:11', NULL),
(10, 2, 'Keyboard', '2019-03-20 14:10:11', NULL),
(11, 2, 'Monitor', '2019-03-20 14:10:36', NULL),
(12, 3, 'Laptop', '2019-03-20 14:10:36', NULL),
(13, 3, 'Tablet', '2019-03-20 14:11:10', NULL),
(14, 3, 'Mobile Phone', '2019-03-20 14:11:10', NULL),
(15, 4, 'Operating System', '2019-03-20 14:11:10', NULL),
(16, 4, 'Licensed Software', '2019-03-20 14:11:10', NULL),
(17, 4, 'Software Suite', '2019-03-20 14:11:10', NULL),
(18, 1, 'Sound Card', '2019-04-15 11:56:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment_type`
--

DROP TABLE IF EXISTS `it_equipment_type`;
CREATE TABLE IF NOT EXISTS `it_equipment_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_equipment_type`
--

INSERT INTO `it_equipment_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Computer Component', '2019-03-20 13:03:24', NULL),
(2, 'Computer Peripheral', '2019-03-20 13:03:24', NULL),
(3, 'Mobile Device', '2019-03-20 13:03:32', NULL),
(4, 'Software License', '2019-03-20 13:03:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_no` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `subtype` tinyint(4) NOT NULL,
  `qty` int(11) NOT NULL,
  KEY `type` (`type`),
  KEY `subtype` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replacement_issuance`
--

DROP TABLE IF EXISTS `replacement_issuance`;
CREATE TABLE IF NOT EXISTS `replacement_issuance` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `current_issuance` bigint(20) NOT NULL,
  `replaced_issuance` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `original_id` (`current_issuance`),
  KEY `replaced_id` (`replaced_issuance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_units`
--

DROP TABLE IF EXISTS `system_units`;
CREATE TABLE IF NOT EXISTS `system_units` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'ITPC', '', 1, '2019-04-16 19:02:51', NULL, 2),
(2, 'ITPC', '', 1, '2019-04-16 19:02:51', NULL, 2),
(3, 'ITPC', '', 2, '2019-04-16 19:03:43', NULL, 2),
(4, 'ITPC', '', 2, '2019-04-16 19:03:43', NULL, 2),
(5, 'ITIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 2, '2019-05-06 19:36:29', NULL, 2),
(6, 'ITIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 2, '2019-05-06 19:36:29', NULL, 2),
(7, 'PDPC', '', 3, '2019-05-22 19:38:08', NULL, 1),
(8, 'PDPC', '', 3, '2019-05-22 19:38:08', NULL, 1),
(9, 'PDPC', '', 3, '2019-05-22 19:38:56', NULL, 1),
(10, 'PDPC', '', 3, '2019-05-22 19:38:56', NULL, 1),
(11, 'PDPC', '', 3, '2019-05-22 19:39:16', NULL, 1),
(12, 'PDPC', '', 3, '2019-05-22 19:39:16', NULL, 1),
(13, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(14, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(15, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(16, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(17, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(18, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL DEFAULT '',
  `dept_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `user_type` varchar(16) NOT NULL DEFAULT 'associate',
  `status` varchar(16) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `dept_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(1, 'Aika Vien', 'Dayrit', 'aikaviend@gmail.com', '$2y$10$ZQbr3HKOeYhKnw17VgQM.OO5ATysBNCbFGVN/Vr18eSX8D5uW73rK', 1, '2019-04-16 18:26:19', NULL, 'admin', 'active'),
(2, 'Jon Paulo', 'Faypon', 'jonpaulo@gmail.com', '$2y$10$cVNBFra0VTY18YqUb0jro.7hYj0BeMdeyL/J42N7ETB48PKylin82', 2, '2019-04-16 18:27:24', NULL, 'associate', 'active'),
(3, 'Justine', 'Garcia', 'justine@gmail.com', '$2y$10$.wSfH7CTT5muuQDpn/jpBedW6Rt/e6M2VHa7W2paHOAeJnyY4bTDq', 3, '2019-04-16 18:27:49', NULL, 'associate', 'active'),
(4, 'Lovelyn', 'Paris', 'lovelynparis@gmail.com', '$2y$10$6NQ8/pk/agR9Jjs82VkYA.caCbz/Y8crIlvMoYCQXEhbk7Jb7dhE6', 4, '2019-04-16 18:28:10', NULL, 'associate', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`data`) REFERENCES `it_equipment` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`system_unit`) REFERENCES `system_units` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `inventory_concerns`
--
ALTER TABLE `inventory_concerns`
  ADD CONSTRAINT `inventory_concerns_ibfk_3` FOREIGN KEY (`last_user`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `inventory_concerns_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `inventory_concerns_ibfk_7` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `inventory_concerns_ibfk_8` FOREIGN KEY (`name_component`) REFERENCES `it_equipment` (`id`),
  ADD CONSTRAINT `inventory_concerns_ibfk_9` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `issuance`
--
ALTER TABLE `issuance`
  ADD CONSTRAINT `issuance_ibfk_2` FOREIGN KEY (`issued_to`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `issuance_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `issuance_ibfk_5` FOREIGN KEY (`equipment_id`) REFERENCES `it_equipment` (`id`),
  ADD CONSTRAINT `issuance_ibfk_6` FOREIGN KEY (`unit_id`) REFERENCES `system_units` (`id`),
  ADD CONSTRAINT `issuance_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `it_equipment`
--
ALTER TABLE `it_equipment`
  ADD CONSTRAINT `it_equipment_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `it_equipment_ibfk_5` FOREIGN KEY (`subtype_id`) REFERENCES `it_equipment_subtype` (`id`),
  ADD CONSTRAINT `it_equipment_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `it_equipment_ibfk_7` FOREIGN KEY (`unit_id`) REFERENCES `system_units` (`id`);

--
-- Constraints for table `it_equipment_subtype`
--
ALTER TABLE `it_equipment_subtype`
  ADD CONSTRAINT `it_equipment_subtype_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `it_equipment_type` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`type`) REFERENCES `it_equipment_type` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`subtype`) REFERENCES `it_equipment_subtype` (`id`);

--
-- Constraints for table `replacement_issuance`
--
ALTER TABLE `replacement_issuance`
  ADD CONSTRAINT `replacement_issuance_ibfk_1` FOREIGN KEY (`current_issuance`) REFERENCES `issuance` (`id`),
  ADD CONSTRAINT `replacement_issuance_ibfk_2` FOREIGN KEY (`replaced_issuance`) REFERENCES `issuance` (`id`);

--
-- Constraints for table `system_units`
--
ALTER TABLE `system_units`
  ADD CONSTRAINT `system_units_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `system_units_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

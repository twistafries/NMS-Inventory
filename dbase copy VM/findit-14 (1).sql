-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2019 at 09:24 AM
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
  `done_by` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `dept_id` tinyint(4) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `equipstatus_id` tinyint(4) DEFAULT NULL,
  `concerns_id` bigint(20) DEFAULT NULL,
  `issuance_id` bigint(20) DEFAULT NULL,
  `equipment_id` bigint(20) DEFAULT NULL,
  `type_id` tinyint(4) DEFAULT NULL,
  `subtype_id` tinyint(4) DEFAULT NULL,
  `replacement_id` bigint(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status_id` tinyint(4) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`done_by`),
  KEY `dept_id` (`dept_id`),
  KEY `employee_id` (`employee_id`),
  KEY `equipstatus_id` (`equipstatus_id`),
  KEY `concerns_id` (`concerns_id`),
  KEY `issuance_id` (`issuance_id`),
  KEY `equipment_id` (`equipment_id`),
  KEY `type_id` (`type_id`),
  KEY `subtype_id` (`subtype_id`),
  KEY `replacement_id` (`replacement_id`),
  KEY `unit_id` (`unit_id`),
  KEY `users_id` (`user_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `done_by`, `action`, `dept_id`, `employee_id`, `equipstatus_id`, `concerns_id`, `issuance_id`, `equipment_id`, `type_id`, `subtype_id`, `replacement_id`, `unit_id`, `user_id`, `status_id`, `created_at`) VALUES
(1, 1, 'added', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:43:47'),
(2, 1, 'added', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:43:47'),
(3, 1, 'added', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:44:26'),
(4, 1, 'added', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:44:26'),
(5, 1, 'added', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:45:27'),
(6, 1, 'added', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:45:27'),
(7, 1, 'added', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:45:49'),
(8, 1, 'added', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:45:49'),
(9, 1, 'added', NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:47:48'),
(10, 1, 'added', NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:47:48'),
(11, 1, 'added', NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:48:24'),
(12, 1, 'added', NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:48:24'),
(13, 1, 'added', NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:49:12'),
(14, 1, 'added', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:49:12'),
(15, 1, 'added', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:49:32'),
(16, 1, 'added', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:49:32'),
(19, 1, 'added', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:56:52'),
(20, 1, 'added', NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:56:52'),
(21, 1, 'added', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:58:54'),
(22, 1, 'added', NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:58:54'),
(23, 1, 'added', NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:59:17'),
(24, 1, 'added', NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 16:59:17'),
(25, 1, 'added', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:00:38'),
(26, 1, 'added', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:01:50'),
(27, 1, 'added', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:01:50'),
(28, 1, 'added', NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:02:19'),
(29, 2, 'added', NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:02:19'),
(30, 2, 'added', NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:04:51'),
(31, 2, 'added', NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:04:51'),
(32, 2, 'added', NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:05:51'),
(33, 2, 'added', NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:05:51'),
(34, 2, 'added', NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:06:38'),
(35, 2, 'added', NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:06:38'),
(36, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:13:09'),
(37, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:13:09'),
(38, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:13:49'),
(39, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, '2019-04-27 17:13:49'),
(40, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-04-27 17:14:31'),
(41, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2019-04-27 17:14:31'),
(42, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '2019-04-27 17:15:51'),
(43, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, '2019-04-27 17:15:51'),
(44, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, '2019-04-27 17:16:38'),
(45, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, '2019-04-27 17:16:38'),
(46, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL, NULL, '2019-04-27 17:17:05'),
(47, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, '2019-04-27 17:17:05'),
(48, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, '2019-04-27 17:17:33'),
(49, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, '2019-04-27 17:17:33'),
(50, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, '2019-04-27 17:17:58'),
(51, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, NULL, '2019-04-27 17:17:58'),
(52, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL, NULL, NULL, '2019-04-27 17:18:31'),
(53, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, '2019-04-27 17:18:31'),
(54, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, '2019-04-27 17:19:00'),
(55, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, NULL, '2019-04-27 17:19:00'),
(56, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, NULL, '2019-04-27 17:19:29'),
(57, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, NULL, '2019-04-27 17:19:29'),
(58, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-04-27 17:22:28'),
(59, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2019-04-27 17:22:28'),
(60, 2, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '2019-04-27 17:22:53'),
(61, 2, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2019-04-27 17:22:53'),
(62, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-04-27 17:24:15'),
(63, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, '2019-04-27 17:24:15'),
(64, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2019-04-27 17:24:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `email`, `dept_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Justine', 'Garcia', '2153591@slu.edu.ph', 1, '2019-03-13 12:54:23', NULL, 'active'),
(2, 'Lovelyn', 'Paris', 'lovelynparis@gmail.com', 1, '2019-03-27 21:46:11', NULL, 'active'),
(3, 'Aika Vien', 'Dayrit', 'aikaviend@gmail.com', 1, '2019-04-10 12:21:18', NULL, 'active'),
(4, 'Jon Paulo', 'Faypon', 'jonpaulo@gmail.com', 4, '2019-04-10 12:21:18', NULL, 'active'),
(5, 'Gavin Roy', 'Ferrer', 'gavinroy@gmail.com', 2, '2019-04-10 12:21:56', NULL, 'active'),
(6, 'Mehanie', 'Lonogan', 'mehanie@gmail.com', 2, '2019-04-10 12:21:56', NULL, 'active'),
(7, 'Kim', 'Willy', 'kim@gmail.com', 3, '2019-04-10 12:22:38', NULL, 'active'),
(8, 'Jake', 'Peralta', 'jake@gmail.com', 4, '2019-04-10 12:22:38', NULL, 'active'),
(9, 'Amy', 'Santiago', 'amy@gmail.com', 3, '2019-04-10 12:23:25', NULL, 'active'),
(10, 'Raymond', 'Holt', 'raymond@gmail.com', 4, '2019-04-10 12:23:25', NULL, 'active'),
(11, 'Rosa', 'Diaz', 'rosa@gmail.com', 2, '2019-04-26 12:54:07', NULL, 'active');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`id`, `equipment_id`, `unit_id`, `issued_to`, `user_id`, `created_at`, `updated_at`, `issued_until`, `returned_at`, `remarks`, `status_id`) VALUES
(1, 13, NULL, 8, 1, '2019-04-16 19:20:06', NULL, '2019-06-30', NULL, 'Issued with charger.', 2);

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
  `warranty_start` date NOT NULL,
  `warranty_end` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

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
(13, 14, 'Apple', 'Iphone 8', '64GB', 'IPH-12345678', '09878', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(14, 1, 'ASUS', 'A320M-K ', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', ' 601-7577-010B0703273216', ' 601-7577-010B0703273216', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(15, 1, 'ASRock', 'Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 801-7210-218B0903810386', ' 801-7210-218B0903810386', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(16, 1, 'GIGABYTE', 'A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903212615', ' 601-7577-010B0903212615', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(17, 3, 'Sony', 'HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'SNY-216C-DDATSW', '21251', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(18, 4, 'HyperX ', 'Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', '09UT-DRY7-80M1', '09UT-DRY7-80M1', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(19, 5, 'MSI', '1050Ti 4GB', '4GB; 2 Doors', ' WSD9-DH690', ' WSD9-DH690', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(20, 5, 'Palit', '1050ti 4GB', '1050ti 4GB 2 Doors', ' WSD9-BG750', ' WSD9-BG750', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(21, 2, 'AMD', 'Ryzen 5 2400g with Vega 11 Graphics', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ215', 'ATY-V87RST-DEQ215', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(22, 2, 'AMD', 'Ryzen 5 2600g ', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ220', 'ATY-V87RST-DEQ220', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(23, 2, 'AMD', 'Ryzen 7 1700g ', '8 Cores\r\n16 Threads\r\n3.7 Base Clock', 'ATY-V87RST-SET201', 'ATY-V87RST-SET201', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(24, 2, 'Intel', 'i5 9900K', '8-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR222', 'ATY-V87RST-CHR222', NULL, 2, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(25, 6, 'EVGA', '700', 'EVGA 700W Power Supply', '260-H1-0210-DR', '260-H1-0210-DR', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(26, 6, 'EVGA', '600', 'EVGA 600W Power Supply', '260-H1-0211-DR', '260-H1-0211-DR', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(27, 7, 'ID Cooling', 'DF-12025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'JHY78-DW2125', 'JHY78-DW2125', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(28, 14, 'Apple', 'Iphone 7', '64GB', 'IPH-223345213', 'IPH-223345213', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(29, 4, 'Kingston ', '4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', '09UT-DRT7-2212', '09UT-DRT7-2212', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(30, 4, 'HyperX', '16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', '09UT-DRY7-1126', '09UT-DRY7-1126', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(31, 3, 'WD', '1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'WD-122C-DDATSG', 'WD-122C-DDATSG', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(32, 1, 'MSI ', 'X470 Motherboard', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903272123', ' 601-7577-010B0903272123', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(33, 14, 'Apple', 'Iphone 6', 'Space Grey\r\n16GB', 'IPH-1325423', 'IPH-1325423', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(34, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1121', 'JHY78-DW1121', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(35, 15, 'Microsoft ', 'Windows 10 Pro', 'Windows 10 Pro', '290528961_PH-471404239', '290528961_PH-471404239', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(36, 15, 'Microsoft ', 'Windows 10 ', 'Windows 10 ', '290528961_PH-471404126', '290528961_PH-471404126', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(37, 13, 'Samsung', 'Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 'SSG-121824', 'SSG-121824', NULL, NULL, 'Samsung Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(38, 13, 'Apple', 'iPad Pro', 'Space Grey\r\n64GB\r\niOS 12\r\nAndroid Kitkat', 'IPD-210642', 'IPD-210642', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(39, 9, 'Razer ', 'Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 'RZR-1291502', 'RZR-1291502', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(40, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463', 'LGT-921463', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(41, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261233', 'RZR-1261233', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(42, 10, 'A4Tech', 'KD-600L', 'Red Backlight Keyboard\r\nNormal Key Caps\r\nUltra-Slim \r\n', 'RZR-1261972', 'RZR-1261972', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(43, 10, 'Razer', 'Cynosa', 'Razer Cynosa Keyboard\r\n', 'RZR-9212611', 'RZR-9212611', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(44, 10, 'Logitech', 'MK235', 'Logitech MK235 Keyboard\r\nOrange Key Switches\r\nBlue Backlight', 'LGT-M12612', 'LGT-M12612', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(45, 10, 'Logitech ', 'K480', 'Logitech K480 Keyboard', 'LGT-K210654', 'LGT-K210654', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(46, 11, 'NVISION ', '24\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n144 Refresh Rate\r\n1920 x 1080 Screen Resolution', 'NVS-C991284', 'NVS-C991284', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(47, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212884', 'BEN-C212884', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(48, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13508', 'SMS-SW13508', NULL, NULL, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(49, 7, 'Rakk', 'Kisig PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'RAK-210421', 'RAK-210421', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(50, 7, 'Rakk ', 'Anyag PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1151\r\nTDP: 140W', 'RAK-210512', 'RAK-210512', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(51, 7, 'Rakk ', 'Hawani Flow PC Case', 'Noctua 6 120mm fans; 158mm Height.\r\nSocket: 1151 and AM4\r\nTDP: 140W', 'RAK-212123', 'RAK-212123', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(55, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1122', 'JHY78-DW1121', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(56, 10, 'Razer', 'Blackwidow Lite', 'Razer Blackwidow Lite \r\nBrown Key Switches\r\n', 'RZR-1261213', 'RZR-1261213', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(58, 10, 'Logitech', 'MK445', 'Logitech MK445 Keyboard\r\nBrown Key Switches\r\nRGB Lighting', 'LGT-M12622', 'LGT-M12622', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(59, 9, 'A4Tech', 'OP-720', '1000 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261221', 'A4-1261221', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(60, 9, 'A4Tech', 'N-708x', '1200 DPI\r\nAmbidextrous Style\r\n4 Mouse button\r\n', 'A4-921222', 'A4-921222', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(62, 10, 'A4Tech', 'KD-650', 'Blue Backlight Keyboard\r\nGreen Key Switches', 'RZR-1262212', 'RZR-1262212', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(63, 10, 'A4Tech', 'KD-126', 'LED Backlight\r\nLaser-inscribed Keys\r\nUltra Slim ', 'RZR-1263311', 'RZR-1263311', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(65, 9, 'A4Tech', 'G3-220N', 'Wireless mouse\r\n1800 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261132', 'A4-1261132', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(66, 11, 'Lenovo', '19\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n75 Refresh Rate\r\n1280 x 1024 Screen Resolution', 'NVS-C991122', 'NVS-C991122', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(67, 11, 'BenQ', '24\" LED Monitor', 'BenQ 24\" LED Monitor\r\n144hz Refresh Rate\r\n1920 x 1080 Resolution', 'BEN-C212222', 'BEN-C212222', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1);

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
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`id`, `description`, `user_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'PC Workstation', 1, '2019-04-16 19:02:51', NULL, 1),
(2, 'PC Workstation', 1, '2019-04-16 19:02:51', NULL, 1),
(3, 'PC Workstation', 2, '2019-04-16 19:03:43', NULL, 1),
(4, 'PC Workstation', 2, '2019-04-16 19:03:43', NULL, 1);

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
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`concerns_id`) REFERENCES `inventory_concerns` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_10` FOREIGN KEY (`unit_id`) REFERENCES `system_units` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_12` FOREIGN KEY (`type_id`) REFERENCES `it_equipment_type` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_13` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_3` FOREIGN KEY (`done_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_4` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_5` FOREIGN KEY (`equipment_id`) REFERENCES `it_equipment` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_6` FOREIGN KEY (`equipstatus_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_7` FOREIGN KEY (`issuance_id`) REFERENCES `issuance` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_8` FOREIGN KEY (`replacement_id`) REFERENCES `replacement_issuance` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_9` FOREIGN KEY (`subtype_id`) REFERENCES `it_equipment_subtype` (`id`);

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

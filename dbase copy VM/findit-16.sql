-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 06:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findit15`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) NOT NULL,
  `done_by` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `departments` tinyint(4) DEFAULT NULL,
  `employees` bigint(20) DEFAULT NULL,
  `equipment_status` tinyint(4) DEFAULT NULL,
  `inventory_concerns` bigint(20) DEFAULT NULL,
  `issuance` bigint(20) DEFAULT NULL,
  `it_equipment` bigint(20) DEFAULT NULL,
  `it_equipment_type` tinyint(4) DEFAULT NULL,
  `it_equipment_subtype` tinyint(4) DEFAULT NULL,
  `replacement_issuance` bigint(20) DEFAULT NULL,
  `system_units` bigint(20) DEFAULT NULL,
  `users` bigint(20) DEFAULT NULL,
  `status_id` tinyint(4) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `done_by`, `action`, `departments`, `employees`, `equipment_status`, `inventory_concerns`, `issuance`, `it_equipment`, `it_equipment_type`, `it_equipment_subtype`, `replacement_issuance`, `system_units`, `users`, `status_id`, `created_at`) VALUES
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
(64, 1, 'added', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '2019-04-27 17:24:27'),
(65, 2, 'issued', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2019-04-28 03:35:01'),
(66, 1, 'added', NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-28 05:55:00'),
(67, 1, 'added', NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-28 05:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employees` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'Rosa', 'Diaz', 'rosa@gmail.com', 2, '2019-04-26 12:54:07', NULL, 'active'),
(12, 'Charles', 'Boyle', 'charles@email.com', 3, '2019-04-28 05:09:23', NULL, 'active'),
(13, 'Gina', 'Linetti', 'gina@gmail.com', 3, '2019-04-28 05:15:46', NULL, 'active'),
(14, 'Terry', 'Jeffords', 'terry@gmail.com', 4, '2019-04-28 05:19:53', NULL, 'active'),
(15, 'Norm', 'Skully', 'norm@gmail.com', 2, '2019-04-28 05:22:28', NULL, 'active'),
(16, 'Michael', 'Hitchcock', 'michael@gmail.com', 2, '2019-04-28 05:36:05', NULL, 'active'),
(17, 'Adrian', 'Pimento', 'adrian@gmail.com', 1, '2019-04-28 05:39:52', NULL, 'active'),
(18, 'Doug', 'Judy', 'doug@gmail.com', 1, '2019-04-28 05:43:37', NULL, 'active'),
(19, 'Eddard', 'Stark', 'eddard@gmail.com', 1, '2019-04-28 05:51:49', NULL, 'active'),
(20, 'Catelyn', 'Stark', 'catelyn@gmail.com', 3, '2019-04-28 05:54:28', NULL, 'active'),
(21, 'Jon', 'Snow', 'jon@gmail.com', 1, '2019-04-28 05:55:00', NULL, 'active'),
(22, 'Tyrion', 'Lannister', 'tyrion@gmail.com', 4, '2019-04-28 05:59:03', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_status`
--

CREATE TABLE `equipment_status` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `inventory_concerns` (
  `id` bigint(20) NOT NULL,
  `name_component` bigint(20) NOT NULL,
  `system_unit` bigint(20) NOT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_user` bigint(20) NOT NULL,
  `added_by` bigint(20) NOT NULL,
  `remarks` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuance`
--

CREATE TABLE `issuance` (
  `id` bigint(20) NOT NULL,
  `equipment_id` bigint(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `issued_to` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `issued_until` date DEFAULT NULL,
  `returned_at` date DEFAULT NULL,
  `remarks` varchar(120) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`id`, `equipment_id`, `unit_id`, `issued_to`, `user_id`, `created_at`, `updated_at`, `issued_until`, `returned_at`, `remarks`, `status_id`) VALUES
(1, 13, NULL, 8, 1, '2019-04-16 19:20:06', NULL, '2019-06-30', NULL, 'Issued with charger.', 2),
(2, 13, NULL, 7, 2, '2019-04-28 03:35:01', NULL, '2019-05-31', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment`
--

CREATE TABLE `it_equipment` (
  `id` bigint(20) NOT NULL,
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
  `status_id` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_equipment`
--

INSERT INTO `it_equipment` (`id`, `subtype_id`, `brand`, `model`, `details`, `serial_no`, `or_no`, `imei_or_macaddress`, `unit_id`, `supplier`, `warranty_start`, `warranty_end`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(1, 1, 'MSI', 'B450-A Pro', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903273465', '53792', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(2, 2, 'AMD', 'R5 1500X', 'Socket: AM4\r\n4-core 8-thread 3.5GHz-3.7GHz\r\nTDP: 65W', 'YD170XBCM88AE', '53793', NULL, NULL, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(3, 3, 'Seagate', 'HDD', '1TB Harddisk Drive', 'YST-657A-DATSDC', '0399', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(4, 1, 'MSI', 'Z390-A PRO', 'Socket: LGA 1151\r\nChipset: Intel Z390\r\nSize: ATX\r\nRAM: 4 slots, DDR4\r\nPCIe: x16/x4, PCIe 3.0, CrossFireX', 'AZT-F72346', '0399', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:11:35', NULL, 2, 1),
(5, 2, 'Intel', 'i5 9600K', '6-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR90O', '53792', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(6, 3, 'Seagate', 'HDD', '1TB HDD', 'SYT099-AXHN9P-WT34', '53794', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(7, 4, 'Kingston', '16GB DDR4 RAM', '8GB DDR4 RAM x2', '09UT-DRY7-90M8', '53795', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(8, 5, 'NVIDIA', 'GTX 1060 6GB', 'GeForce GTX 1060 6GB VRAM', ' WSD9-RH790', '53796', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(9, 6, 'SeaSonic', 'M12II 620', '620 Watt Power Supply', '120-G1-0650-XR', '43790', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(10, 7, 'Noctua', 'NH-U12S', '120mm fans; 158mm Height.\r\nSocket: LGA1151\r\nTDP: 140W', 'JHY78-DF678', '53797', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(13, 14, 'Apple', 'Iphone 8', '64GB', 'IPH-12345678', '09878', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 2),
(14, 1, 'ASUS', 'A320M-K ', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', ' 601-7577-010B0703273216', '53798', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(15, 1, 'ASRock', 'Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 801-7210-218B0903810386', '53799', NULL, 1, 'Chelsey', '2019-04-01', '2020-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(16, 1, 'GIGABYTE', 'A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903212615', '53800', NULL, 1, 'Chelsey', '2019-04-01', '2020-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(17, 3, 'Sony', 'HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'SNY-216C-DDATSW', '21251', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(18, 4, 'HyperX ', 'Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', '09UT-DRY7-80M1', '53801', NULL, NULL, 'Chelsey', '2019-04-14', '2020-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(19, 5, 'MSI', '1050Ti 4GB', '4GB; 2 Doors', ' WSD9-DH690', '53802', NULL, NULL, 'PC Express', '2019-04-14', '2020-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(20, 5, 'Palit', '1050ti 4GB', 'Overall: 24%-26%\r\nBenchmark: 78%\r\n4gb 128-bit DDR5', ' WSD9-BG750', '53801', NULL, NULL, 'PC Express', '2019-04-14', '2020-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(21, 2, 'AMD', 'Ryzen 5 2400g with Vega 11 Graphics', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ215', '53803', NULL, 2, 'PC Depot', '2019-01-14', '2021-04-28', '2019-01-16 19:13:11', NULL, 2, 1),
(22, 2, 'AMD', 'Ryzen 5 2600g ', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ220', '53804', NULL, 2, 'PC Depot', '2019-04-13', '2020-04-13', '2019-01-14 19:13:11', NULL, 2, 1),
(23, 2, 'AMD', 'Ryzen 7 1700g ', '8 Cores\r\n16 Threads\r\n3.7 Base Clock', 'ATY-V87RST-SET201', '53804', NULL, 3, 'PC Depot', '2019-01-14', '2020-01-14', '2019-01-16 19:13:11', NULL, 3, 1),
(24, 2, 'Intel', 'i5 9900K', '8-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR222', '53805', NULL, 1, 'Data Blitz', '2019-02-21', '2020-02-21', '2019-02-22 17:22:11', NULL, 1, 1),
(25, 6, 'EVGA', '700', 'EVGA 700W Power Supply', '260-H1-0210-DR', '53806', NULL, NULL, 'Chelsey', '2019-03-15', '2020-03-15', '2019-03-16 08:16:55', NULL, 2, 1),
(26, 6, 'EVGA', '600', 'EVGA 600W Power Supply', '260-H1-0211-DR', '53807', NULL, NULL, 'PC Express', '2019-01-04', '2020-01-04', '2019-01-05 19:16:55', NULL, 4, 1),
(27, 7, 'ID Cooling', 'DF-12025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'JHY78-DW2125', '83007', NULL, NULL, 'Chelsey', '0000-00-00', '0000-00-00', '2019-04-16 19:16:55', NULL, 2, 1),
(28, 14, 'Apple', 'Iphone 7', '64GB', 'IPH-223345213', '53806', NULL, NULL, 'Apple Store', '2019-02-20', '2020-02-27', '2019-02-21 19:19:13', NULL, 3, 1),
(29, 4, 'Kingston ', '4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', '09UT-DRT7-2212', '53809', NULL, NULL, 'PC Express', '2019-04-14', '2020-04-18', '2019-04-16 19:14:57', NULL, 1, 1),
(30, 4, 'HyperX', '16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', '09UT-DRY7-1126', '53810', NULL, NULL, 'Chelsey', '2019-03-12', '2021-03-12', '2019-02-13 19:14:57', NULL, 2, 1),
(31, 3, 'WD', '1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'WD-122C-DDATSG', '53811', NULL, 1, 'Octagon', '2019-02-01', '2020-02-01', '2019-02-01 19:11:35', NULL, 1, 1),
(32, 1, 'MSI ', 'X470 Motherboard', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903272123', '53812', NULL, 1, 'Data Blitz', '2019-04-01', '2021-04-01', '2019-04-02 19:08:50', NULL, 1, 1),
(33, 14, 'Apple', 'Iphone 6', 'Space Grey\r\n16GB', 'IPH-1325423', '53813', NULL, NULL, 'Apple Store', '2019-04-20', '2022-04-20', '2019-04-20 19:19:13', NULL, 3, 1),
(34, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1121', '53814', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-14', '2019-04-16 19:16:55', NULL, 2, 1),
(35, 15, 'Microsoft ', 'Windows 10 Pro', 'Windows 10 Pro', '290528961_PH-471404239', '53815', NULL, 1, 'Octagon', '2019-01-02', '2022-01-02', '2019-01-03 17:18:50', NULL, 1, 1),
(36, 15, 'Microsoft ', 'Windows 10 ', 'Windows 10 ', '290528961_PH-471404126', '53816', NULL, 1, 'Octagon', '2019-01-02', '2022-01-02', '2019-01-03 17:38:50', NULL, 1, 1),
(37, 13, 'Samsung', 'Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 'SSG-121824', '61831', NULL, NULL, 'Samsung Store', '2019-04-20', '2021-04-20', '2019-04-21 19:19:13', NULL, 3, 1),
(38, 13, 'Apple', 'iPad Pro', 'Space Grey\r\n64GB\r\niOS 12\r\nAndroid Kitkat', 'IPD-210642', '61313', NULL, NULL, 'Apple Store', '2019-02-03', '2020-02-03', '2019-02-04 13:19:13', NULL, 3, 2),
(39, 9, 'Razer ', 'Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 'RZR-1291502', '613321', NULL, NULL, 'Data Blitz', '2019-04-14', '2020-04-14', '2020-04-16 19:16:55', NULL, 2, 1),
(40, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463', '31812', NULL, NULL, 'Data Blitz', '2019-01-14', '2020-01-14', '2019-01-15 19:16:55', NULL, 2, 1),
(41, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261233', '613321', NULL, NULL, 'Data Blitz', '2019-04-14', '2020-04-14', '2019-04-15 10:16:55', NULL, 3, 1),
(42, 10, 'A4Tech', 'KD-600L', 'Red Backlight Keyboard\r\nNormal Key Caps\r\nUltra-Slim \r\n', 'RZR-1261972', '613311', NULL, NULL, 'Data Blitz', '2019-03-14', '2020-03-14', '2019-03-16 19:16:55', NULL, 4, 1),
(43, 10, 'Razer', 'Cynosa', 'Razer Cynosa Keyboard\r\n', 'RZR-9212611', '613621', NULL, NULL, 'Data Blitz', '2019-04-03', '2020-04-03', '2019-04-04 10:16:55', NULL, 4, 1),
(44, 10, 'Logitech', 'MK235', 'Logitech MK235 Keyboard\r\nOrange Key Switches\r\nBlue Backlight', 'LGT-M12612', '746321', NULL, NULL, 'Octagon', '2019-04-20', '2019-04-20', '2019-04-21 11:21:52', NULL, 2, 1),
(45, 10, 'Logitech ', 'K480', 'Logitech K480 Keyboard', 'LGT-K210654', '746321', '', NULL, 'PC Depot', '2019-04-07', '2021-04-07', '2019-04-08 09:51:35', NULL, 1, 1),
(46, 11, 'NVISION ', '24\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n144 Refresh Rate\r\n1920 x 1080 Screen Resolution', 'NVS-C991284', '746389', NULL, NULL, 'Octagon', '2019-01-23', '2020-01-23', '2019-01-24 11:31:01', NULL, 4, 1),
(47, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212884', '746323', NULL, NULL, 'PC Express', '2019-01-05', '2020-01-05', '2019-01-06 13:22:41', NULL, 2, 1),
(48, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13508', '746217', NULL, NULL, 'PC Depot', '2019-02-12', '2020-02-12', '2019-02-13 19:16:55', NULL, 3, 1),
(49, 7, 'Rakk', 'Kisig PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'RAK-210421', '746321', NULL, NULL, 'Chelsey', '2019-01-25', '2020-01-25', '2019-01-26 12:11:37', NULL, 1, 1),
(50, 7, 'Rakk ', 'Anyag PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1151\r\nTDP: 140W', 'RAK-210512', '746333', NULL, NULL, 'Chelsey', '2019-01-14', '2020-01-14', '2019-01-15 11:16:55', NULL, 4, 1),
(51, 7, 'Rakk ', 'Hawani Flow PC Case', 'Noctua 6 120mm fans; 158mm Height.\r\nSocket: 1151 and AM4\r\nTDP: 140W', 'RAK-212123', '746221', NULL, NULL, 'Chelsey', '2019-01-10', '2020-01-10', '2019-01-11 10:22:35', NULL, 1, 1),
(55, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1122', '416321', NULL, NULL, 'Chelsey', '2019-04-11', '2020-04-11', '2019-04-12 11:26:55', NULL, 2, 1),
(56, 10, 'Razer', 'Blackwidow Lite', 'Razer Blackwidow Lite \r\nBrown Key Switches\r\n', 'RZR-1261213', '416322', NULL, NULL, 'Data Blitz', '2019-04-04', '2020-04-04', '2019-04-05 12:28:31', NULL, 4, 1),
(58, 10, 'Logitech', 'MK445', 'Logitech MK445 Keyboard\r\nBrown Key Switches\r\nRGB Lighting', 'LGT-M12622', '416329', NULL, NULL, 'Octagon', '2019-04-14', '2020-04-14', '2019-04-15 11:26:15', NULL, 1, 1),
(59, 9, 'A4Tech', 'OP-720', '1000 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261221', '417121', NULL, NULL, 'Data Blitz', '2019-01-12', '2020-01-12', '2019-01-12 19:29:52', NULL, 1, 1),
(60, 9, 'A4Tech', 'N-708x', '1200 DPI\r\nAmbidextrous Style\r\n4 Mouse button\r\n', 'A4-921222', '116321', NULL, NULL, 'Data Blitz', '2019-01-22', '2020-01-22', '2019-01-22 19:46:12', NULL, 4, 1),
(62, 10, 'A4Tech', 'KD-650', 'Blue Backlight Keyboard\r\nGreen Key Switches', 'RZR-1262212', '416891', NULL, NULL, 'Data Blitz', '2019-01-21', '2020-01-21', '2019-01-21 16:11:52', NULL, 1, 1),
(63, 10, 'A4Tech', 'KD-126', 'LED Backlight\r\nLaser-inscribed Keys\r\nUltra Slim ', 'RZR-1263311', '201941', NULL, NULL, 'Data Blitz', '2019-01-01', '2020-01-01', '2019-01-01 12:56:15', NULL, 2, 1),
(65, 9, 'A4Tech', 'G3-220N', 'Wireless mouse\r\n1800 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261132', '221841', NULL, NULL, 'Data Blitz', '2019-04-14', '2020-04-14', '2019-04-15 12:16:28', NULL, 2, 1),
(66, 11, 'Lenovo', '19\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n75 Refresh Rate\r\n1280 x 1024 Screen Resolution', 'NVS-C991122', '291931', NULL, NULL, 'Octagon', '2019-04-04', '2021-04-04', '2019-04-15 20:16:21', NULL, 3, 1),
(67, 11, 'BenQ', '24\" LED Monitor', 'BenQ 24\" LED Monitor\r\n144hz Refresh Rate\r\n1920 x 1080 Resolution', 'BEN-C212222', '251941', NULL, NULL, 'PC Express', '2019-04-12', '2020-04-12', '2019-04-13 09:31:19', NULL, 4, 1),
(68, 1, 'ASRock', 'B450M-HDV', 'Socket: AM4\r\nChipset: B450\r\nSize: mATX\r\nRAM: 2 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, ', ' 601-7577-010B0903124191', '718213', NULL, 5, 'Octagon', '2019-04-27', '2021-04-27', '2019-01-04 19:08:50', NULL, 4, 8),
(69, 2, 'AMD ', 'Athlon 200GE', 'Cores: 2\r\nThreads: 4\r\nSpeed: 3.2GHz\r\nSocket: AM4\r\nTDP: 35W', 'AMD-20183', '416331', NULL, 5, 'PC Depot', '2019-04-14', '2020-04-14', '2019-04-15 19:13:11', NULL, 4, 1),
(70, 4, 'Kingston', '4GB DDR4 RAM', '4GB DDR4 RAM\r\nSpeed: 2166MHz', 'KNG-14194', '293741', NULL, 5, 'Octagon', '2019-04-14', '2020-04-14', '2019-04-15 21:49:45', '2019-04-16 19:14:57', 4, 8),
(71, 3, 'WD', '250GB Hard Drive', '250GB Harddisk Drive\r\nPort: USB 3.0', 'WD-19410', '183941', NULL, 5, 'Data Blitz', '2019-04-01', '2020-04-01', '2019-04-02 11:11:35', NULL, 4, 8),
(72, 6, 'EVGA', '500B ', 'Power: 500W\r\nEfficiency: 80+ Bronze\r\nModular: No\r\nPCIe: 2x 6+2-pin', 'EVG-91812', '502141', NULL, 5, 'Chelsey', '2019-02-11', '2020-02-11', '2019-02-12 19:16:55', NULL, 4, 8),
(73, 7, 'Raijintek', 'Arcadia', 'Case Size: Mid Tower\r\nMobo Size: mATX, ATX\r\nMax Cooler Height: 160mm', 'RJT-19513', '201312', NULL, 5, 'Chelsey', '2019-02-09', '2020-02-09', '2019-02-10 19:16:55', NULL, 4, 8),
(74, 1, 'Gigabyte', 'Z390 SLI', 'Socket: LGA 1151\r\nChipset: Intel Z390\r\nSize: ATX\r\nRAM: 4 slots, DDR4\r\nPCIe: x16, PCIe 3.0, CrossFireX, SLI\r\nPorts: M.2, USB 3.1', 'GGB-29561', '523951', NULL, 6, 'Octagon', '2019-04-27', '2021-04-27', '2019-04-28 19:08:50', NULL, 3, 8),
(75, 2, 'Intel', 'Core i7-8700', 'Cores: 6\r\nThreads: 12\r\nSpeed: 3.2GHz\r\nSocket: LGA 1151\r\nIntegrated GPU: Intel UHD Graphics 630\r\n', 'INT-29171', '523952', NULL, 6, 'PC Depot', '2019-04-14', '2020-04-14', '2019-04-15 19:13:11', NULL, 3, 8),
(76, 4, 'Aegis', 'GSkill 8GB DDR4 RAM', '8GB DDR4 RAM\r\nSpeed: 2666MHz', 'AEG-76125', '523952', NULL, 6, 'Octagon', '2019-04-14', '2022-04-14', '2019-04-16 19:14:57', NULL, 3, 8),
(77, 5, 'NVIDIA', 'GeForce RTX 2060', 'Performance:\r\nOverall: 76-80%', 'NVD-18461', '523955', NULL, 6, 'Octagon', '2019-04-14', '2021-04-14', '2019-04-15 19:14:57', NULL, 3, 8),
(78, 3, 'Seagate', '2TB Hard Drive', '2TB Hard disk Drive\r\nPort: USB 3.0', 'SEA-18101', '523956', NULL, 6, 'Data Blitz', '2019-04-01', '2020-04-01', '2019-04-02 19:22:35', NULL, 3, 8),
(79, 6, 'SeaSonic', 'M12II 620', 'Power: 620W\r\nEfficiency: 80+ Bronze\r\nModular: Fully modular\r\nPCIe: 4x 6+2-pin', 'SES-89109', '523957', NULL, 6, 'Chelsey', '2019-04-14', '2020-04-14', '2019-04-15 19:25:51', NULL, 3, 8),
(80, 7, 'Phanteks', 'Enthoo Pro', 'Case Size: Full Tower\r\nMobo Size: mATX, ATX, E-ATX, EEB\r\nMax Cooler Height: 193mm', 'PHT-77899', '523959', NULL, 6, 'Chelsey', '2019-04-09', '2020-04-09', '2019-04-10 19:16:55', NULL, 3, 8),
(81, 5, 'NVIDIA', 'GeForce RTX 1660 Ti', 'Performance:\r\nOverall: 64-68%', 'NVD-18422', '523965', NULL, NULL, 'Octagon', '2018-04-14', '2019-04-14', '2018-04-15 22:05:20', NULL, 3, 3),
(82, 2, 'Intel', 'Core i5-9600K', 'Cores: 6\r\nThreads: 6\r\nSpeed: 3.7GHz\r\nSocket: LGA 1151\r\nIntegrated GPU: Intel UHD Graphics 630\r\n', 'INT-29122', '523963', NULL, 2, 'PC Depot', '2019-04-14', '2021-04-14', '2019-04-15 19:13:11', NULL, 1, 4),
(83, 5, 'NVIDIA', 'GeForce GTX 1050 ', 'Overall: 19-23%\r\nSynthetic Benchmarks: 26%', 'NVD-94992', '654065', NULL, 7, 'PC Depot', '2019-04-27', '2020-04-28', '2019-04-28 02:01:12', NULL, 1, 1),
(84, 1, 'MSI', 'B450 Gaming', 'Socket: AM4\r\nChipset: B450\r\nSize: mATX\r\nRAM: 2 Slots, DDR4\r\nPCIe: x16 PCIe 3.0\r\nPorts: M.2, USB 3.1', 'MSI-88390', '654066', NULL, 7, 'Octagon', '2019-03-19', '2020-03-19', '2019-03-20 12:32:18', NULL, 1, 8),
(85, 4, 'Corsair', '8GB DDR4 Ram', '8GB DDR4 Single Stick Ram\r\n2166MHz', 'CRS-59148', '718391', NULL, 7, 'Chelsey', '2019-01-06', '2019-01-06', '2019-01-07 12:32:18', NULL, 1, 8),
(86, 3, 'Toshiba', '500GB Hard Drive', '500GB Hard Drive\r\nUSB 3.0', 'TOS-83912', '317391', NULL, 7, 'PC Depot', '2019-02-05', '2020-02-05', '2019-02-06 09:23:12', NULL, 1, 8),
(87, 6, 'SeaSonic', 'M12II 520', 'Power: 520W\r\nEfficiency: 80+ Bronze\r\nModular: Fully Modular', 'SEA-83912', '617492', NULL, 7, '', '2019-02-05', '2021-02-05', '2019-02-06 09:32:21', NULL, 1, 8),
(88, 2, 'AMD', 'Ryzen 5 1600', 'Cores: 6\r\nThreads: 12\r\nSpeed: 3.2GHz-3.6GHz\r\nSocket: AM4', 'AMD-99201', '612712', NULL, 3, '', '2018-02-17', '2019-01-11', '2018-02-17 09:13:22', NULL, 3, 3),
(89, 5, 'AMD', 'Radeon RX 560', 'Overall: 15-19%\r\nSynthetic Benchmarks: 26%\r\n4GB 128-bit GDDR5\r\nPCIe: 3.0 x16', 'AMD-20992', '816491', NULL, 9, 'Octagon', '2019-02-05', '2020-02-05', '2019-02-06 18:02:37', NULL, 3, 8),
(90, 14, 'Samsung', 'A50', 'OS: Android v9.0\r\nCPU: Exynos 7 Octa 9610 Octa core\r\nRam: 4gb\r\n4000 mAh battery', 'R2014KA3101491', '718311', '00-50-A3-2H-19-22', NULL, 'Octagon', '2018-01-15', '2019-01-15', '2018-01-16 22:23:26', NULL, 4, 3),
(91, 14, 'Samsung', 'Note 9', 'OS: Android v8.1\r\nCPU: Snapdragon 845\r\nRam: 8GB\r\n4000 mAh Battery', 'R2014KA319120', '50126', '00-50-B1-2A-A1-AD', NULL, 'Octagon', '2019-01-15', '2020-01-15', '2019-01-16 12:21:02', NULL, 4, 1),
(92, 14, 'Samsung', 'Galaxy S10', 'OS: Android v9.0\r\nCPU: Octa-core chipset\r\nRam: 8GB\r\n3400 mAh Battery', 'R2014KA32212', '50127', '00-1A-1B-20-01-0A', 8, 'Octagon', '2019-01-15', '2020-01-15', '2019-01-16 12:31:21', NULL, 2, 2),
(93, 14, 'Huawei', 'P30 Pro', 'OS: Android v9.0\r\nCPU: Huawei Kirin 980 Octa-core Processor\r\nRam: 8GB\r\n4200 mAh Battery', 'HK1291H1982K', '50128', '10-0A-AD-04-21-2A', 4, 'PC Depot', '2019-01-15', '2020-01-15', '2019-01-16 12:32:21', NULL, 4, 1),
(94, 14, 'Huawei', 'P30 Lite', 'OS: Android v9.0\r\nCPU: Huawei Kirin 980 Octa-core Processor\r\nRam: 4GB\r\n4000 mAh Battery', 'HK1291H1921K', '50129', '10-0A-AD-04-1D-2A', NULL, 'PC Depot', '2019-01-15', '2020-01-15', '2019-01-16 12:33:21', NULL, 3, 1),
(95, 14, 'Oppo', 'F11', 'OS: Android 9\r\nCPU: MediaTek Helio P70 2.1GHz Octa-core\r\nGPU: Mali-G72\r\nRam: 4GB', 'HK1291H19312', '50130', '0A-A1-00-50-9A-01', 3, 'PC Depot', '2019-01-15', '2019-01-15', '2019-01-16 12:35:21', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment_subtype`
--

CREATE TABLE `it_equipment_subtype` (
  `id` tinyint(4) NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `it_equipment_type` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `replacement_issuance` (
  `id` bigint(20) NOT NULL,
  `current_issuance` bigint(20) NOT NULL,
  `replaced_issuance` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_units`
--

CREATE TABLE `system_units` (
  `id` bigint(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`id`, `description`, `user_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'PC Workstation', 1, '2019-04-16 19:02:51', NULL, 1),
(2, 'PC Workstation', 1, '2019-04-16 19:02:51', NULL, 1),
(3, 'PC Workstation', 2, '2019-04-16 19:03:43', NULL, 1),
(4, 'PC Workstation', 2, '2019-04-16 19:03:43', NULL, 1),
(5, 'PC Workstation', 4, '2019-04-16 19:03:43', NULL, 1),
(6, 'PC Workstation', 3, '2019-04-16 19:03:43', NULL, 1),
(7, 'PC Workstation', 1, '2019-04-16 19:03:43', NULL, 1),
(8, 'PC Workstation', 2, '2019-04-16 19:03:43', NULL, 1),
(9, 'PC Workstation', 3, '2019-04-16 19:03:43', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL DEFAULT '',
  `dept_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `user_type` varchar(16) NOT NULL DEFAULT 'associate',
  `status` varchar(16) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `dept_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(1, 'Aika Vien', 'Dayrit', 'aikaviend@gmail.com', '$2y$10$ZQbr3HKOeYhKnw17VgQM.OO5ATysBNCbFGVN/Vr18eSX8D5uW73rK', 1, '2019-04-16 18:26:19', NULL, 'admin', 'active'),
(2, 'Jon Paulo', 'Faypon', 'jonpaulo@gmail.com', '$2y$10$cVNBFra0VTY18YqUb0jro.7hYj0BeMdeyL/J42N7ETB48PKylin82', 2, '2019-04-16 18:27:24', NULL, 'associate', 'active'),
(3, 'Justine', 'Garcia', 'justine@gmail.com', '$2y$10$.wSfH7CTT5muuQDpn/jpBedW6Rt/e6M2VHa7W2paHOAeJnyY4bTDq', 3, '2019-04-16 18:27:49', NULL, 'associate', 'active'),
(4, 'Lovelyn', 'Paris', 'lovelynparis@gmail.com', '$2y$10$6NQ8/pk/agR9Jjs82VkYA.caCbz/Y8crIlvMoYCQXEhbk7Jb7dhE6', 4, '2019-04-16 18:28:10', NULL, 'associate', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`done_by`),
  ADD KEY `dept_id` (`departments`),
  ADD KEY `employee_id` (`employees`),
  ADD KEY `equipstatus_id` (`equipment_status`),
  ADD KEY `concerns_id` (`inventory_concerns`),
  ADD KEY `issuance_id` (`issuance`),
  ADD KEY `equipment_id` (`it_equipment`),
  ADD KEY `type_id` (`it_equipment_type`),
  ADD KEY `subtype_id` (`it_equipment_subtype`),
  ADD KEY `replacement_id` (`replacement_issuance`),
  ADD KEY `unit_id` (`system_units`),
  ADD KEY `users_id` (`users`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `equipment_status`
--
ALTER TABLE `equipment_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `inventory_concerns`
--
ALTER TABLE `inventory_concerns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_component` (`name_component`),
  ADD KEY `system_unit` (`system_unit`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `last_user` (`last_user`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `issuance`
--
ALTER TABLE `issuance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `issued_to` (`issued_to`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Indexes for table `it_equipment`
--
ALTER TABLE `it_equipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_no` (`serial_no`),
  ADD UNIQUE KEY `imei_or_macaddress` (`imei_or_macaddress`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `subtype_id` (`subtype_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `it_equipment_subtype`
--
ALTER TABLE `it_equipment_subtype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `it_equipment_type`
--
ALTER TABLE `it_equipment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replacement_issuance`
--
ALTER TABLE `replacement_issuance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `original_id` (`current_issuance`),
  ADD KEY `replaced_id` (`replaced_issuance`);

--
-- Indexes for table `system_units`
--
ALTER TABLE `system_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `equipment_status`
--
ALTER TABLE `equipment_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory_concerns`
--
ALTER TABLE `inventory_concerns`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `it_equipment`
--
ALTER TABLE `it_equipment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `it_equipment_subtype`
--
ALTER TABLE `it_equipment_subtype`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `it_equipment_type`
--
ALTER TABLE `it_equipment_type`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replacement_issuance`
--
ALTER TABLE `replacement_issuance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_units`
--
ALTER TABLE `system_units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`inventory_concerns`) REFERENCES `inventory_concerns` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_10` FOREIGN KEY (`system_units`) REFERENCES `system_units` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_11` FOREIGN KEY (`users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_12` FOREIGN KEY (`it_equipment_type`) REFERENCES `it_equipment_type` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_13` FOREIGN KEY (`status_id`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_2` FOREIGN KEY (`departments`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_3` FOREIGN KEY (`done_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_4` FOREIGN KEY (`employees`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_5` FOREIGN KEY (`it_equipment`) REFERENCES `it_equipment` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_6` FOREIGN KEY (`equipment_status`) REFERENCES `equipment_status` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_7` FOREIGN KEY (`issuance`) REFERENCES `issuance` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_8` FOREIGN KEY (`replacement_issuance`) REFERENCES `replacement_issuance` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_9` FOREIGN KEY (`it_equipment_subtype`) REFERENCES `it_equipment_subtype` (`id`);

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

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 08:01 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmsfindit`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) NOT NULL,
  `done_by` varchar(100) NOT NULL,
  `data` bigint(20) DEFAULT NULL,
  `system_unit` bigint(20) DEFAULT NULL,
  `issued_to` varchar(100) DEFAULT NULL,
  `deleted_item` varchar(255) DEFAULT NULL,
  `from_status` varchar(20) DEFAULT NULL,
  `to_status` varchar(20) DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `field` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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

CREATE TABLE `equipment_status` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
(6, 'Pending', '2019-03-09 15:13:28', NULL),
(7, 'Decommissioned', '2019-03-11 22:43:40', NULL),
(8, 'In-use', '2019-04-15 13:17:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_concerns`
--

CREATE TABLE `inventory_concerns` (
  `id` bigint(20) NOT NULL,
  `name_component` bigint(20) DEFAULT NULL,
  `system_unit` bigint(20) DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_user` bigint(20) DEFAULT NULL,
  `added_by` bigint(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remarks` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_concerns`
--

INSERT INTO `inventory_concerns` (`id`, `name_component`, `system_unit`, `status_id`, `created_at`, `last_user`, `added_by`, `updated_at`, `remarks`) VALUES
(1, 307, NULL, 3, '2019-01-09 00:00:00', NULL, 3, NULL, 'Broken buttons.'),
(2, 332, NULL, 4, '2019-01-10 00:00:00', NULL, 4, NULL, 'Broken touchpad.'),
(3, 335, NULL, 4, '2019-01-19 00:00:00', NULL, 2, NULL, 'Broken speakers.'),
(4, 284, NULL, 3, '2019-02-08 00:00:00', NULL, 1, NULL, 'Broken camera.'),
(5, 59, NULL, 3, '2019-02-18 00:00:00', NULL, 2, NULL, 'Broken keys.'),
(6, 283, NULL, 3, '2019-02-21 00:00:00', NULL, 3, NULL, 'Broken sensor.'),
(7, 30, NULL, 3, '2019-03-18 00:00:00', NULL, 4, NULL, 'Broken socket.'),
(8, 67, NULL, 3, '2019-03-18 19:16:55', NULL, 4, NULL, 'Broken buttons.'),
(9, 60, NULL, 3, '2019-03-22 00:00:00', NULL, 2, NULL, 'Broken keys.'),
(10, 21, NULL, 3, '2019-03-26 00:00:00', NULL, 2, NULL, 'Broken socket.'),
(11, 25, NULL, 3, '2019-03-29 00:00:00', NULL, 1, NULL, 'Won\'t turn on.'),
(12, 34, NULL, 3, '2019-04-08 00:00:00', NULL, 1, NULL, 'Broken socket.'),
(13, 248, NULL, 4, '2019-04-18 00:00:00', NULL, 2, NULL, 'Broken socket.'),
(14, 333, NULL, 3, '2019-04-25 00:00:00', NULL, 3, NULL, 'Power button is malfunctioning.'),
(15, 308, NULL, 3, '2019-04-30 00:00:00', NULL, 3, NULL, 'Broken buttons.'),
(16, 297, NULL, 3, '2019-05-15 00:00:00', NULL, 4, NULL, 'Broken charging pin.'),
(17, 298, NULL, 3, '2019-05-20 00:00:00', NULL, 3, NULL, 'Broken charging pin.'),
(18, 213, NULL, 4, '2019-05-22 00:00:00', NULL, 2, NULL, 'Wrong item delivered.'),
(19, 120, NULL, 4, '2019-05-25 00:00:00', NULL, 1, NULL, 'Wrong item delivered.'),
(20, 212, NULL, 4, '2019-05-27 00:00:00', NULL, 3, NULL, 'Wrong item delivered.');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `issued_until` date DEFAULT NULL,
  `returned_at` date DEFAULT NULL,
  `remarks` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`id`, `equipment_id`, `unit_id`, `issued_to`, `user_id`, `created_at`, `updated_at`, `issued_until`, `returned_at`, `remarks`) VALUES
(1, 13, NULL, 8, 1, '2019-04-16 19:20:06', NULL, '2019-06-30', NULL, 'Issued with charger.'),
(9, 68, NULL, 13, 2, '2019-05-01 00:00:00', NULL, NULL, NULL, 'Issued with charger.'),
(10, 70, NULL, 14, 2, '2019-05-01 00:00:00', NULL, NULL, NULL, 'Issued with charger.'),
(13, 71, NULL, 15, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.'),
(14, 72, NULL, 16, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.'),
(15, 73, NULL, 17, 3, '2019-05-19 21:55:20', '2019-05-07 00:00:00', NULL, NULL, 'Issued with charger.'),
(16, 74, NULL, 18, 3, '2019-05-07 00:00:00', NULL, NULL, NULL, 'Issued with charger.'),
(17, 77, NULL, 7, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and laptop bag.'),
(18, 78, NULL, 8, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.'),
(19, 79, NULL, 9, 4, '2019-05-13 22:17:48', NULL, NULL, NULL, 'Issued with charger and bag.'),
(20, 80, NULL, 10, 4, '2019-05-13 22:17:48', NULL, NULL, NULL, 'Issued with charger and bag.'),
(21, 81, NULL, 11, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.'),
(22, 82, NULL, 12, 4, '2019-05-13 00:00:00', NULL, NULL, NULL, 'Issued with charger and bag.'),
(23, NULL, 1, 1, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL),
(24, NULL, 2, 2, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL),
(25, NULL, 5, 5, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL),
(26, NULL, 6, 6, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL),
(27, 39, NULL, 1, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL),
(28, 40, NULL, 2, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL),
(29, 41, NULL, 3, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL),
(30, 115, NULL, 4, 1, '2019-05-22 20:50:02', NULL, NULL, NULL, NULL),
(31, 42, NULL, 1, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL),
(32, 43, NULL, 2, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL),
(33, 44, NULL, 3, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL),
(34, 45, NULL, 4, 1, '2019-05-22 20:51:45', NULL, NULL, NULL, NULL),
(37, 46, NULL, 1, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL),
(38, 47, NULL, 2, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL),
(39, 48, NULL, 3, 2, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL),
(40, 116, NULL, 4, 1, '2019-05-22 20:54:26', NULL, NULL, NULL, NULL),
(65, NULL, 13, 19, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.'),
(66, NULL, 14, 20, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.'),
(67, NULL, 15, 21, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.'),
(68, NULL, 16, 22, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.'),
(69, NULL, 17, 23, 4, '2019-05-24 01:07:35', NULL, NULL, NULL, 'Issued with Apple keyboard and mouse.'),
(70, NULL, 18, 24, 4, '2019-05-24 01:11:31', NULL, NULL, NULL, NULL),
(71, NULL, 7, 13, 4, '2019-05-23 15:57:54', NULL, NULL, NULL, NULL),
(72, NULL, 8, 14, 4, '2019-05-23 15:57:54', NULL, NULL, NULL, NULL),
(73, NULL, 9, 15, 4, '2019-05-23 15:57:54', NULL, NULL, NULL, NULL),
(74, NULL, 10, 16, 4, '2019-05-23 15:57:54', '2019-05-25 00:00:00', NULL, NULL, NULL),
(75, NULL, 11, 17, 4, '2019-05-23 15:57:54', NULL, NULL, NULL, NULL),
(76, NULL, 12, 18, 4, '2019-05-23 15:57:54', NULL, NULL, NULL, NULL),
(77, NULL, 21, 16, 4, '2019-05-25 15:57:54', NULL, NULL, NULL, NULL),
(78, 313, NULL, 13, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(79, 314, NULL, 14, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(80, 315, NULL, 15, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(81, 316, NULL, 16, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(82, 317, NULL, 17, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(83, 318, NULL, 18, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(84, 319, NULL, 13, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(85, 320, NULL, 14, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(86, 321, NULL, 15, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(87, 322, NULL, 16, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(88, 323, NULL, 17, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(89, 324, NULL, 18, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(90, 325, NULL, 13, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(91, 326, NULL, 14, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(92, 327, NULL, 15, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(93, 328, NULL, 16, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(94, 329, NULL, 17, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(95, 330, NULL, 18, 3, '2019-05-24 00:00:00', NULL, NULL, NULL, NULL),
(96, NULL, 3, 3, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL),
(97, NULL, 4, 4, 1, '2019-04-22 00:00:00', NULL, NULL, NULL, NULL);

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
  `supplier_id` bigint(20) DEFAULT NULL,
  `imei_or_macaddress` varchar(20) DEFAULT NULL,
  `unit_id` bigint(20) DEFAULT NULL,
  `warranty_start` date DEFAULT NULL,
  `warranty_end` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_equipment`
--

INSERT INTO `it_equipment` (`id`, `subtype_id`, `brand`, `model`, `details`, `serial_no`, `or_no`, `supplier_id`, `imei_or_macaddress`, `unit_id`, `warranty_start`, `warranty_end`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(1, 1, 'MSI', 'B450-A Pro', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903273465', '5587', 6, NULL, NULL, '2019-04-01', '2019-04-14', '2019-04-01 19:08:50', NULL, 1, 1),
(2, 2, 'AMD', 'R5 1500X', 'Socket: AM4\r\n4-core 8-thread 3.5GHz-3.7GHz\r\nTDP: 65W', 'YD170XBCM88AE', '5587', 6, NULL, NULL, '2019-04-01', '2019-04-14', '2019-04-01 19:08:50', NULL, 1, 1),
(3, 3, 'Seagate', 'HDD', '1TB Harddisk Drive', 'YST-657A-DATSDC', '5587', 6, NULL, NULL, '2019-04-01', '2019-04-14', '2019-04-01 19:11:35', NULL, 2, 1),
(4, 1, 'MSI', 'Z390-A PRO', 'Socket: LGA 1151\r\nChipset: Intel Z390\r\nSize: ATX\r\nRAM: 4 slots, DDR4\r\nPCIe: x16/x4, PCIe 3.0, CrossFireX', 'AZT-F72346', '0399', 7, NULL, NULL, '2019-04-14', '2019-04-28', '2019-04-14 19:11:35', NULL, 2, 1),
(5, 2, 'Intel', 'i5 9600K', 'Socket: LGA 1151\r\n6-Core 3.7GHz OC-capable.\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR90O', '53792', 7, NULL, NULL, '2019-04-14', '2019-04-28', '2019-04-14 19:13:11', NULL, 2, 1),
(6, 3, 'Seagate', 'HDD', '1TB HDD', 'SYT099-AXHN9P-WT34', '6923', 7, NULL, NULL, '2019-04-14', '2019-04-28', '2019-04-14 19:13:11', NULL, 2, 1),
(7, 4, 'Kingston', '16GB DDR4 RAM', '8GB DDR4 RAM x2', '09UT-DRY7-90M8', '6923', 7, NULL, NULL, '2019-04-14', '2019-04-18', '2019-04-14 19:14:57', NULL, 2, 1),
(8, 5, 'NVIDIA', 'GTX 1060 6GB', 'GeForce GTX 1060 6GB VRAM', ' WSD9-RH790', '6923', 7, NULL, NULL, '2019-04-14', '2019-04-18', '2019-04-14 19:14:57', NULL, 2, 1),
(9, 6, 'SeaSonic', 'M12II 620', '620 Watt Power Supply', '120-G1-0650-XR', '6923', 7, NULL, NULL, '2019-04-14', '2019-04-28', '2019-04-14 19:16:55', NULL, 2, 1),
(10, 7, 'Noctua', 'NH-U12S', '120mm fans; 158mm Height.\r\nSocket: LGA1151\r\nTDP: 140W', 'JHY78-DF678', '6923', 7, NULL, NULL, '2019-04-14', '2019-04-28', '2019-04-14 19:16:55', NULL, 2, 1),
(13, 14, 'Apple', 'Iphone 8', '64GB', 'IPH-12345678', '09878', 1, NULL, NULL, '2019-04-20', '2019-04-27', '2019-04-20 19:19:13', NULL, 3, 2),
(14, 1, 'ASUS', 'A320M-K ', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', ' 601-7577-010B0703273216', '2578', 5, NULL, NULL, '2019-02-22', '2019-04-14', '2019-02-22 19:08:50', NULL, 1, 1),
(15, 1, 'ASRock', 'Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 801-7210-218B0903810386', '2578', 5, NULL, NULL, '2019-02-22', '2019-04-14', '2019-02-22 19:08:50', NULL, 1, 1),
(16, 1, 'GIGABYTE', 'A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903212615', '2578', 5, NULL, NULL, '2019-02-22', '2019-04-14', '2019-02-22 19:08:50', NULL, 1, 1),
(17, 3, 'Sony', 'HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'SNY-216C-DDATSW', '2578', 5, NULL, NULL, '2019-02-22', '2019-04-14', '2019-02-22 19:11:35', NULL, 2, 1),
(18, 4, 'HyperX ', 'Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', '09UT-DRY7-80M1', '4428', 4, NULL, NULL, '2019-03-02', '2019-04-18', '2019-03-02 19:14:57', NULL, 2, 1),
(19, 5, 'MSI', '1050Ti 4GB', '4GB; 2 Doors', ' WSD9-DH690', '4428', 4, NULL, NULL, '2019-03-02', '2019-04-18', '2019-03-02 19:14:57', NULL, 2, 1),
(20, 5, 'Palit', '1050ti 4GB', '1050ti 4GB 2 Doors', ' WSD9-BG750', '4428', 4, NULL, NULL, '2019-03-02', '2019-04-18', '2019-03-02 19:14:57', NULL, 2, 1),
(21, 2, 'AMD', 'Ryzen 5 2400g with Vega 11 Graphics', 'Socket: AM4\r\n4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ215', '7894', 3, NULL, NULL, '2019-01-12', '2019-04-28', '2019-01-12 19:13:11', '2019-03-26 00:00:00', 2, 3),
(22, 2, 'AMD', 'Ryzen 5 2600g ', 'Socket: AM4\r\n4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ220', '7894', 3, NULL, NULL, '2019-01-12', '2019-04-28', '2019-01-12 19:13:11', NULL, 2, 1),
(23, 2, 'AMD', 'Ryzen 7 1700g ', 'Socket: AM4;\r\n8 Cores;\r\n16 Threads;\r\n3.7 Base Clock', 'ATY-V87RST-SET201', '7894', 3, NULL, NULL, '2019-01-12', '2019-04-28', '2019-01-12 19:13:11', NULL, 2, 1),
(24, 2, 'Intel', 'i5 9900K', 'Socket: LGA 1151;\r\n8-Core 3.7GHz OC-capable;\r\nTDP: 95W;\r\nNo stock HSF', 'ATY-V87RST-CHR222', '4123', 6, NULL, NULL, '2019-04-03', '2019-04-28', '2019-04-03 19:13:11', NULL, 2, 1),
(25, 6, 'EVGA', '700', 'EVGA 700W Power Supply', '260-H1-0210-DR', '8724', 5, NULL, NULL, '2019-01-29', '2019-04-28', '2019-01-29 19:16:55', '2019-03-29 00:00:00', 2, 3),
(26, 6, 'EVGA', '600', 'EVGA 600W Power Supply', '260-H1-0211-DR', '6278', 4, NULL, NULL, '2019-04-05', '2019-04-28', '2019-04-05 19:16:55', NULL, 2, 1),
(27, 7, 'ID Cooling', 'DF-12025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'JHY78-DW2125', '8724', 5, NULL, NULL, '2019-01-29', '2019-04-28', '2019-01-29 19:16:55', NULL, 2, 1),
(28, 14, 'Apple', 'Iphone 7', '64GB', 'IPH-223345213', '1478', 1, NULL, NULL, '2019-02-17', '2019-04-27', '2019-02-17 19:19:13', NULL, 3, 1),
(29, 4, 'Kingston ', '4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', '09UT-DRT7-2212', '3578', 4, NULL, NULL, '2019-01-25', '2019-04-18', '2019-01-25 19:14:57', NULL, 2, 1),
(30, 4, 'HyperX', '16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', '09UT-DRY7-1126', '1687', 5, NULL, NULL, '2019-02-02', '2019-04-18', '2019-02-02 19:14:57', '2019-03-18 00:00:00', 2, 3),
(31, 3, 'WD', '1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'WD-122C-DDATSG', '6782', 7, NULL, NULL, '2019-03-06', '2020-03-06', '2019-03-06 19:11:35', NULL, 2, 1),
(32, 1, 'MSI ', 'X470 Motherboard', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903272123', '8879', 6, NULL, NULL, '2019-03-07', '2020-03-07', '2019-03-07 19:08:50', NULL, 1, 1),
(33, 14, 'Apple', 'Iphone 6', 'Space Grey\r\n16GB', 'IPH-1325423', '1478', 1, NULL, NULL, '2017-02-17', '2017-04-27', '2017-02-17 19:19:13', '2019-04-20 19:19:13', 3, 7),
(34, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1121', '5213', 5, NULL, NULL, '2019-01-09', '2019-04-28', '2019-01-09 19:16:55', '2019-04-08 00:00:00', 2, 3),
(35, 15, 'Microsoft ', 'Windows 10 Pro', 'Windows 10 Pro', '290528961_PH-471404239', '4117', 7, NULL, NULL, '2019-03-11', '2019-04-14', '2019-03-11 19:08:50', NULL, 1, 1),
(36, 15, 'Microsoft ', 'Windows 10 ', 'Windows 10 ', '290528961_PH-471404126', '4117', 7, NULL, NULL, '2019-03-11', '2019-04-14', '2019-03-11 19:08:50', NULL, 1, 1),
(37, 13, 'Samsung', 'Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 'SSG-121824', '5224', 2, NULL, NULL, '2019-01-16', '2019-04-27', '2019-01-16 19:19:13', NULL, 3, 2),
(38, 13, 'Apple', 'iPad Pro', '12.9\" 2732x2048 Resoultion;\r\nRAM: 4GB;\r\n64GB', 'IPD-210642', '1478', 1, NULL, NULL, '2019-02-17', '2019-04-27', '2019-02-17 19:19:13', NULL, 3, 2),
(39, 9, 'Razer ', 'Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 'RZR-1291502', '7366', 6, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 2),
(40, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463', '7366', 6, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 2),
(41, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261233', '7366', 6, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 2),
(42, 10, 'A4Tech', 'KD-600L', 'Red Backlight Keyboard\r\nNormal Key Caps\r\nUltra-Slim \r\n', 'RZR-1261972', '7366', 6, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 2),
(43, 10, 'Razer', 'Cynosa', 'Razer Cynosa Keyboard\r\n', 'RZR-9212611', '7366', 6, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 2),
(44, 10, 'Logitech', 'K480', 'Logitech K480 Keyboard', 'LGT-M12612', '1412', 7, NULL, NULL, '2019-04-02', '2019-04-28', '2019-04-02 19:16:55', NULL, 2, 2),
(45, 10, 'Logitech ', 'K480', 'Logitech K480 Keyboard', 'LGT-K210654', '1412', 7, NULL, NULL, '2019-04-02', '2019-04-28', '2019-04-02 19:16:55', NULL, 2, 2),
(46, 11, 'NVISION ', '24\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n144 Refresh Rate\r\n1920 x 1080 Screen Resolution', 'NVS-C991284', '1412', 7, NULL, NULL, '2019-04-02', '2019-04-28', '2019-04-02 19:16:55', NULL, 2, 2),
(47, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212884', '5589', 4, NULL, NULL, '2019-03-27', '2019-04-28', '2019-03-27 19:16:55', NULL, 2, 2),
(48, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13508', '6333', 3, NULL, NULL, '2019-01-21', '2019-04-28', '2019-01-21 19:16:55', NULL, 2, 2),
(49, 7, 'Rakk', 'Kisig PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'RAK-210421', '5213', 5, NULL, NULL, '2019-01-09', '2019-04-28', '2019-01-09 19:16:55', NULL, 1, 1),
(50, 7, 'Rakk ', 'Anyag PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1151\r\nTDP: 140W', 'RAK-210512', '5213', 5, NULL, NULL, '2019-01-09', '2019-04-28', '2019-01-09 19:16:55', NULL, 1, 1),
(51, 7, 'Rakk ', 'Hawani Flow PC Case', 'Noctua 6 120mm fans; 158mm Height.\r\nSocket: 1151 and AM4\r\nTDP: 140W', 'RAK-212123', '5213', 5, NULL, NULL, '2019-01-09', '2019-04-28', '2019-01-09 19:16:55', NULL, 1, 1),
(55, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1122', '5213', 5, NULL, NULL, '2019-01-09', '2019-04-28', '2019-01-09 19:16:55', NULL, 2, 1),
(56, 10, 'Razer', 'Blackwidow Lite', 'Razer Blackwidow Lite \r\nBrown Key Switches\r\n', 'RZR-1261213', '1477', 6, NULL, NULL, '2019-02-01', '2019-04-28', '2019-02-01 19:16:55', NULL, 2, 1),
(58, 10, 'Logitech', 'MK445', 'Logitech MK445 Keyboard\r\nBrown Key Switches\r\nRGB Lighting', 'LGT-M12622', '2223', 7, NULL, NULL, '2019-01-21', '2019-04-28', '2019-01-21 19:16:55', NULL, 2, 1),
(59, 9, 'A4Tech', 'OP-720', '1000 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261221', '1477', 6, NULL, NULL, '2019-02-01', '2018-06-28', '2018-12-03 19:16:55', '2019-02-18 00:00:00', 2, 3),
(60, 9, 'A4Tech', 'N-708x', '1200 DPI\r\nAmbidextrous Style\r\n4 Mouse button\r\n', 'A4-921222', '1477', 6, NULL, NULL, '2019-02-01', '2018-06-28', '2018-11-21 00:00:00', '2019-03-22 00:00:00', 2, 3),
(62, 10, 'A4Tech', 'KD-650', 'Blue Backlight Keyboard\r\nGreen Key Switches', 'RZR-1262212', '1477', 6, NULL, NULL, '2019-02-01', '2019-04-28', '2019-02-01 19:16:55', NULL, 2, 1),
(63, 10, 'A4Tech', 'KD-126', 'LED Backlight\r\nLaser-inscribed Keys\r\nUltra Slim ', 'RZR-1263311', '1477', 6, NULL, NULL, '2019-02-01', '2019-04-28', '2019-02-01 19:16:55', NULL, 2, 1),
(65, 9, 'A4Tech', 'G3-220N', 'Wireless mouse\r\n1800 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 'A4-1261132', '2234', 6, NULL, NULL, '2019-04-23', '2019-04-28', '2019-04-23 19:16:55', NULL, 2, 1),
(66, 11, 'Lenovo', '19\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n75 Refresh Rate\r\n1280 x 1024 Screen Resolution', 'NVS-C991122', '4755', 7, NULL, NULL, '2019-02-12', '2019-04-28', '2019-02-12 19:16:55', NULL, 2, 1),
(67, 11, 'BenQ', '24\" LED Monitor', 'BenQ 24\" LED Monitor\r\n144hz Refresh Rate\r\n1920 x 1080 Resolution', 'BEN-C212222', '9987', 4, NULL, NULL, '2018-02-28', '2018-05-28', '2018-02-28 19:16:55', '2019-03-18 19:16:55', 2, 3),
(68, 14, 'Apple', 'iPhone 8 Plus', 'CPU: Apple A11 Bionic\r\nRAM: 3GB\r\nStorage: 64GB', 'XY6XYXZ7WZ01', '0499', 1, '123456789012345', NULL, '2019-01-07', '2020-01-07', '2019-01-07 15:32:24', '2019-05-01 00:00:00', 3, 2),
(70, 14, 'Apple', 'iPhone 8 Plus', 'CPU: Apple A11 Bionic\r\nRAM: 3GB\r\nStorage: 64GB', 'XY6XYXZ7WZ02', '0499', 1, '123456789098765', NULL, '2019-01-07', '2020-01-07', '2019-01-07 15:38:33', '2019-05-01 00:00:00', 3, 2),
(71, 14, 'Apple', 'iPhone 8', 'Storage: 64GB\r\nRAM: 2GB\r\nCPU: A11 with Bionic chip with 64-bit architecture', 'XY6XYXZ7WZ03', '0499', 1, '123456789034567', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:42:18', '2019-05-01 00:00:00', 3, 2),
(72, 14, 'Apple', 'iPhone 8', 'Storage: 64GB RAM: 2GB CPU: A11 with Bionic chip with 64-bit architecture', 'XY6XYXZ7WZ04', '0499', 1, '123456789034569', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:44:56', '2019-05-01 00:00:00', 3, 2),
(73, 14, 'Apple', 'iPhone 7', 'Storage: 32GB\r\nCPU: Apple A10 Fussion\r\nRAM: 2GB', 'XY6XYXZ7WZ05', '0128', 1, '987654321054321', NULL, '2017-10-20', '2018-10-20', '2017-10-20 15:50:04', '2019-05-01 00:00:00', 3, 2),
(74, 14, 'Apple', 'iPhone 7', 'Storage: 64GB CPU: Apple A10 Fussion RAM: 2GB', 'XY6XY7XYZ06', '0128', 1, '543219876556789', NULL, '2018-10-20', '2018-10-20', '2017-10-10 15:50:04', '2019-05-01 00:00:00', 3, 2),
(75, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'XZ32YX56ZY98', '217685', 1, '167890123456789', NULL, '2019-03-14', '2020-03-14', '2019-03-14 15:59:18', NULL, 1, 6),
(76, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'XY46XY5Z7W89', '217685', 1, '209876543217865', NULL, '2019-03-14', '2020-03-14', '2019-03-14 15:59:18', NULL, 1, 6),
(77, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'WHY-546B-DATDOPE', '5678', 3, NULL, NULL, '2019-04-26', '2020-05-26', '2019-04-26 16:05:01', '2019-05-13 00:00:00', 2, 2),
(78, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'WHY-435C-DATNICE', '5678', 3, NULL, NULL, '2019-04-26', '2020-05-26', '2019-04-26 16:08:07', '2019-05-13 00:00:00', 2, 2),
(79, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-435C-ARTSYY', '5678', 3, '', NULL, '2019-04-26', '2019-05-26', '2019-04-26 00:00:00', '2019-05-13 00:00:00', 2, 2),
(80, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-435C-RTYERW', '5678', 3, NULL, NULL, '2019-04-26', '2019-05-26', '2019-04-26 22:12:08', '2019-04-26 00:00:00', 2, 2),
(81, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'ASD-487D-ARTSYZ', '5678', 3, NULL, NULL, '2019-04-26', '2019-05-26', '2019-04-26 00:00:00', '2019-05-13 00:00:00', 2, 2),
(82, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'IUO-234E-1234', '5678', 3, NULL, NULL, '2019-04-26', '2019-05-26', '2019-04-26 22:15:04', '2019-05-13 00:00:00', 2, 2),
(83, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(84, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(85, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(86, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(87, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(88, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 1),
(89, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(90, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(91, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(92, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(93, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(94, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(95, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 20:17:56', '2020-05-16 00:00:00', 1, 8),
(96, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 20:17:56', '2020-05-16 00:00:00', 1, 8),
(97, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 20:17:56', '2020-04-16 00:00:00', 2, 8),
(98, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 20:17:56', '2019-04-17 00:00:00', 2, 8),
(99, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(100, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(101, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(102, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(103, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 20:28:01', '2019-05-23 00:00:00', 1, 8),
(104, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 20:28:01', '2019-05-23 00:00:00', 1, 8),
(105, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 20:28:01', '2019-05-23 00:00:00', 2, 8),
(106, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 20:28:01', '2019-05-17 00:00:00', 2, 8),
(107, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(108, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(109, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(110, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 2, 8),
(111, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0001', '4321', 7, NULL, 1, '2019-04-16', '2020-04-16', '2019-04-16 09:31:22', NULL, 1, 8),
(112, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0002', '4321', 7, NULL, 2, '2019-04-16', '2020-04-16', '2019-04-16 09:31:22', NULL, 1, 8),
(113, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0003', '4321', 7, NULL, 3, '2019-04-16', '2020-04-16', '2019-04-16 13:19:41', NULL, 2, 8),
(114, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0004', '4321', 7, NULL, 4, '2019-04-16', '2020-04-16', '2019-04-16 13:19:41', NULL, 2, 8),
(115, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 'RZR-1261234', '21897', 6, NULL, NULL, '2019-03-09', '2019-04-28', '2019-03-09 19:16:55', '2019-05-22 00:00:00', 2, 2),
(116, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW13509', '2147', 3, NULL, NULL, '2019-02-19', '2019-04-28', '2019-02-19 19:16:55', '2019-05-22 00:00:00', 2, 2),
(117, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(118, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(119, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(120, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-25 00:00:00', 4, 4),
(121, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(122, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(123, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(124, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(125, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(126, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(127, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(128, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(129, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(130, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(131, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(132, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(133, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(134, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-05-22 00:00:00', 4, 8),
(135, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(136, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(137, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(138, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(139, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(140, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(141, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(142, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(143, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(144, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(145, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(146, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', '2019-04-23 00:00:00', 4, 8),
(147, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(148, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(151, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(152, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(153, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(154, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(155, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0001', '0234', 4, NULL, 7, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(156, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0002', '0234', 4, NULL, 8, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(157, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0003', '0234', 4, NULL, 9, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(158, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0004', '0234', 4, NULL, 10, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(159, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0005', '0234', 4, NULL, 11, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(160, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0006', '0234', 4, NULL, 12, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 4, 8),
(161, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0001', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(162, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0002', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(163, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0003', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(164, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0004', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(165, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0005', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(166, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0006', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 00:00:00', '2019-04-18 00:00:00', 3, 1),
(167, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0001', '3508', 3, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(168, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0002', '3508', NULL, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(169, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0003', '3508', NULL, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(170, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0004', '3508', NULL, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(171, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0005', '3508', 3, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(172, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0006', '3508', NULL, NULL, NULL, '2019-04-17', '2019-05-17', '2019-05-17 19:16:55', '2019-04-18 00:00:00', 3, 1),
(173, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0001', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(174, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0002', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(175, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0003', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(176, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0004', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(177, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0005', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(178, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-0006', '98452', 7, NULL, NULL, '2019-04-09', '2019-05-17', '2019-04-09 00:00:00', '2019-04-18 00:00:00', 2, 1),
(179, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-089', '7492', 7, NULL, 1, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(180, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-090', '7492', 7, NULL, 2, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(181, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-091', '7492', 7, NULL, 3, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(182, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-092', '7492', 7, NULL, 4, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(183, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-093', '7492', 7, NULL, 7, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(184, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-094', '7492', 7, NULL, 8, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(189, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-095', '7492', 7, NULL, 9, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(190, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-096', '7492', 7, NULL, 10, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(191, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-097', '7492', 7, NULL, 11, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(192, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-WIN123DOWS-098', '7492', 7, NULL, 12, NULL, NULL, '2019-04-05 14:21:24', NULL, 3, 8),
(203, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00765', '906591', 7, NULL, 19, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(204, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00766', '906591', 7, NULL, 20, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(205, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00767', '906591', 7, NULL, 21, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(206, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00768', '906591', 7, NULL, 22, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(207, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00769', '906591', 7, NULL, 23, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(208, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00770', '906591', 7, NULL, 24, NULL, NULL, '2019-05-08 16:31:11', NULL, 1, 8),
(209, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 2, 8),
(210, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 2, 8),
(211, 5, 'AMD', 'Radeon RX 560', '2 GB', 'GPU-RRX560-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 00:00:00', NULL, 2, 8),
(212, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-27 00:00:00', 2, 4),
(213, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-04-22', '2019-05-22 19:02:17', '2019-05-22 00:00:00', 2, 4),
(214, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(215, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-23 00:00:00', 2, 8),
(216, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-22 00:00:00', 2, 8),
(217, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-MATEB350-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-22 00:00:00', 2, 8),
(218, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(219, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(220, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-VENLPX4GB-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(221, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-23 00:00:00', 2, 8),
(222, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-23 00:00:00', 2, 8),
(223, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATEBAR1TB-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', '2019-05-23 00:00:00', 2, 8),
(224, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(225, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(226, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450WCOR-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(227, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0007', '0234', 4, NULL, 19, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(228, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0008', '0234', 4, NULL, 20, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(229, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 'CSE-FRDES1000-0009', '0234', 4, NULL, 21, '2019-05-22', '2020-05-22', '2019-05-22 19:02:17', NULL, 2, 8),
(230, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-00021', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 18:41:51', '2019-04-18 00:00:00', 4, 1),
(231, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-00022', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 18:41:51', '2019-04-18 00:00:00', 4, 1),
(232, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-00023', '921463', 6, NULL, NULL, '2019-04-17', '2019-05-01', '2019-04-17 18:41:51', '2019-04-18 00:00:00', 4, 1),
(233, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-0015', '3508', 3, NULL, NULL, '2019-05-17', '2019-05-17', '2019-05-17 15:02:18', '2019-04-18 00:00:00', 4, 1),
(234, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00016', '3508', 3, NULL, NULL, '2019-05-17', '2019-05-17', '2019-05-17 15:02:18', '2019-04-18 00:00:00', 4, 1),
(235, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00017', '3508', 3, NULL, NULL, '2019-05-17', '2019-05-17', '2019-05-17 15:02:18', '2019-04-18 00:00:00', 4, 1),
(236, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-00081', '98451', 7, NULL, NULL, '2019-01-01', '2019-05-17', '2019-01-01 00:00:00', '2019-04-18 00:00:00', 4, 1),
(237, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-00082', '98451', 7, NULL, NULL, '2019-01-01', '2019-05-17', '2019-01-01 00:00:00', '2019-04-18 00:00:00', 4, 1),
(238, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-00083', '98451', 7, NULL, NULL, '2019-01-01', '2019-05-17', '2019-01-01 00:00:00', '2019-04-18 00:00:00', 4, 1),
(239, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(240, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(241, 5, 'NVIDIA', 'GTX 1050', '2 GB', 'GPU-GTX150-00007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(242, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(243, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(244, 2, 'AMD', 'Ryzen 5 1500X', 'Socket: AM4;\r\n4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nTDP: 65W', 'CPU-RYZEN51500X-00007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(245, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(246, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(247, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 'HSF-GAMMAXX400-00007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(248, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', '2019-04-18 00:00:00', 1, 4),
(249, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', '2019-04-17 00:00:00', 1, 8),
(250, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 'MBD-B350-0007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', '2020-04-18 00:00:00', 2, 8),
(251, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(252, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(253, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400Mhz', 'RAM-LPX4GB-0007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(254, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', '2019-04-17 00:00:00', 1, 8),
(255, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', '2019-04-17 00:00:00', 1, 8),
(256, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 'HDD-SEAGATE1TB-0007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', '2019-04-16 00:00:00', 2, 8),
(257, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(258, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(259, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 'PSU-VS450W-0007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(260, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0005', '4321', 7, NULL, 22, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(261, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0006', '4321', 7, NULL, 23, '2019-04-16', '2020-04-16', '2019-04-16 00:00:00', NULL, 1, 8),
(262, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 'CSE-PHANTOM410-0007', '4321', 7, NULL, 24, '2019-04-16', '2020-04-16', '2019-04-16 22:02:05', NULL, 2, 8),
(264, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00771', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(265, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00772', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(266, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00773', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(267, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00774', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(268, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00775', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(269, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 'OS-MSWIND456-00776', '9065', 8, NULL, NULL, NULL, NULL, '2019-02-19 08:09:41', NULL, 3, 1),
(273, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'LPTP-DELLINSP346-0001', '7098', 3, NULL, NULL, '2019-05-24', '2020-05-24', '2019-05-24 00:00:00', NULL, 3, 1),
(276, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'LPTP-DELLINSP346-0002', '7098', 3, NULL, NULL, '2019-05-24', '2020-05-24', '2019-05-24 00:00:00', NULL, 3, 1),
(277, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'LPTP-DELLINSP346-0003', '7098', 3, NULL, NULL, '2019-05-24', '2020-05-24', '2019-05-24 00:00:00', NULL, 3, 1);
INSERT INTO `it_equipment` (`id`, `subtype_id`, `brand`, `model`, `details`, `serial_no`, `or_no`, `supplier_id`, `imei_or_macaddress`, `unit_id`, `warranty_start`, `warranty_end`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(278, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 'LPTP-DELLINSP346-0004', '7098', 3, NULL, NULL, '2019-05-24', '2020-05-24', '2019-05-24 00:00:00', NULL, 3, 1),
(283, 14, 'Apple', 'iPhone 7', 'Storage: 32GB\r\nCPU: Apple A10 Fussion\r\nRAM: 2GB', 'APPLE-IPH345-78901', '0127', 1, '987654321054399', NULL, '2017-01-26', '2018-10-20', '2017-01-26 15:50:04', '2019-02-21 00:00:00', 3, 3),
(284, 14, 'Apple', 'iPhone 7', 'Storage: 64GB CPU: Apple A10 Fussion RAM: 2GB', 'APPLE-IPH345-78902', '0127', 1, '543219876556765', NULL, '2017-01-26', '2018-10-20', '2017-01-26 15:50:04', '2019-02-08 00:00:00', 3, 3),
(289, 14, 'Apple', 'iPhone 8', 'Storage: 64GB\r\nRAM: 2GB\r\nCPU: A11 with Bionic chip with 64-bit architecture', 'APPLE-IPH3287-92503', '0499', 1, '123456789034345', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:42:18', NULL, 3, 1),
(290, 14, 'Apple', 'iPhone 8', 'Storage: 64GB RAM: 2GB CPU: A11 with Bionic chip with 64-bit architecture', 'APPLE-IPH3287-92504', '0499', 1, '123456789034098', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:44:56', NULL, 3, 1),
(293, 14, 'Apple', 'iPhone 8', 'Storage: 64GB\r\nRAM: 2GB\r\nCPU: A11 with Bionic chip with 64-bit architecture', 'APPLE-IPH3287-92505', '0499', 1, '12345678945632', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:42:18', NULL, 3, 1),
(294, 14, 'Apple', 'iPhone 8', 'Storage: 64GB RAM: 2GB CPU: A11 with Bionic chip with 64-bit architecture', 'APPLE-IPH3287-92506', '0499', 1, '1234567890347891', NULL, '2018-04-04', '2019-04-04', '2018-04-04 15:44:56', NULL, 3, 1),
(297, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'MP-IPHAP123-0001', '1234', 1, '167890123451234', NULL, '2019-04-29', '2020-04-29', '2019-04-29 15:59:18', '2019-05-15 00:00:00', 1, 3),
(298, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 'MP-IPHAP123-0002', '1234', 1, '209876543214321', NULL, '2019-04-29', '2020-04-29', '2019-04-29 15:59:18', '2019-05-20 00:00:00', 1, 3),
(299, 10, 'Logitech', 'K120', 'Ergonomic', 'KBD-LOGI12TECHX32-001', '000234', 3, NULL, NULL, NULL, NULL, '2017-03-04 00:00:00', '2019-01-24 00:00:00', 3, 7),
(300, 10, 'Logitech', 'K120', 'Ergonomic', 'KBD-LOGI12TECHX32-002', '000234', 3, NULL, NULL, NULL, NULL, '2017-03-04 00:00:00', '2019-01-24 00:00:00', 3, 7),
(301, 10, 'Logitech', 'K120', 'Ergonomic', 'KBD-LOGI12TECHX32-003', '000234', 3, NULL, NULL, NULL, NULL, '2017-03-04 00:00:00', '2019-01-24 00:00:00', 3, 7),
(302, 10, 'Logitech', 'K120', 'Ergonomic', 'KBD-LOGI12TECHX32-004', '000234', 3, NULL, NULL, NULL, NULL, '2017-03-04 00:00:00', '2019-01-24 00:00:00', 3, 7),
(303, 9, 'Logitech', 'Business B100', 'Optical Mouse', 'MSE-B100BUS-001', '3457', 3, NULL, NULL, NULL, NULL, '2017-12-11 00:00:00', '2019-01-09 00:00:00', 4, 7),
(304, 9, 'Logitech', 'Business B100', 'Optical Mouse', 'MSE-B100BUS-002', '3457', 3, NULL, NULL, NULL, NULL, '2017-12-11 00:00:00', '2019-01-09 00:00:00', 4, 7),
(305, 9, 'Logitech', 'Business B100', 'Optical Mouse', 'MSE-B100BUS-003', '3457', 3, NULL, NULL, NULL, NULL, '2017-12-11 00:00:00', '2019-01-09 00:00:00', 4, 7),
(306, 9, 'Logitech', 'Business B100', 'Optical Mouse', 'MSE-B100BUS-004', '3457', 3, NULL, NULL, NULL, NULL, '2017-12-11 00:00:00', '2019-01-09 00:00:00', 4, 7),
(307, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212741', '6549', 4, NULL, NULL, '2018-09-19', '2018-12-28', '2018-09-19 21:04:22', '2019-01-09 00:00:00', 2, 3),
(308, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212742', '6549', 4, NULL, NULL, '2019-03-20', '2019-04-28', '2019-03-20 21:04:22', '2019-04-30 00:00:00', 2, 3),
(309, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212743', '6549', 4, NULL, NULL, '2019-03-20', '2019-04-28', '2019-03-20 21:04:22', NULL, 2, 1),
(310, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212744', '6549', 4, NULL, NULL, '2019-03-20', '2019-04-28', '2019-03-20 21:04:22', NULL, 2, 1),
(311, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212745', '6549', 4, NULL, NULL, '2019-03-20', '2019-04-28', '2019-03-20 21:04:22', NULL, 2, 1),
(312, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 'BEN-C212746', '6549', 4, NULL, NULL, '2019-03-20', '2019-04-28', '2019-03-20 21:04:22', NULL, 2, 1),
(313, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-0017', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(314, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-00018', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(315, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-00019', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(316, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-000110', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(317, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-000112', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(318, 9, 'Logitech ', 'G102 ', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463-000113', '921463', 6, NULL, NULL, '2019-02-01', '2019-05-01', '2019-02-01 00:00:00', '2019-04-18 00:00:00', 3, 2),
(319, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00011', '3508', 3, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-05-24 00:00:00', 3, 2),
(320, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00022', '3508', 3, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-05-24 00:00:00', 3, 2),
(321, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00033', '3508', 3, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-05-24 00:00:00', 3, 2),
(322, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00044', '3508', 3, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-05-18 00:00:00', 3, 2),
(323, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00055', '3508', NULL, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-05-24 00:00:00', 3, 2),
(324, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 'SMS-SW12479-00066', '3508', 3, NULL, NULL, '2019-03-11', '2019-05-17', '2019-03-11 19:16:55', '2019-04-18 00:00:00', 3, 2),
(325, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000112', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(326, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000213', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(327, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000314', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(328, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000415', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(329, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000516', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(330, 10, 'Logitech', 'MK120', 'Spill resistant.', 'KBD-LGMK120-000617', '9845', 7, NULL, NULL, '2019-03-25', '2019-05-17', '2019-03-25 22:14:33', '2019-05-24 00:00:00', 2, 2),
(331, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK-0001', '36260', 1, NULL, NULL, '2018-07-24', '2019-07-24', '2018-07-24 00:00:00', NULL, 2, 1),
(332, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK-0002', '36260', 1, NULL, NULL, '2018-07-24', '2019-07-24', '2018-07-24 00:00:00', '2019-01-10 00:00:00', 2, 4),
(333, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK-0003', '36260', 1, NULL, NULL, '2018-07-24', '2019-07-24', '2018-07-24 00:00:00', '2019-04-25 00:00:00', 2, 3),
(334, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK14-3401', '9654', 1, NULL, NULL, '2018-09-04', '2019-09-04', '2018-09-04 00:00:00', NULL, 1, 1),
(335, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK14-3402', '9654', 1, NULL, NULL, '2018-09-04', '2019-09-04', '2018-09-04 00:00:00', '2019-01-19 00:00:00', 1, 4),
(336, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 'LPT-APP20MCBK14-3403', '9654', 1, NULL, NULL, '2018-09-04', '2019-09-04', '2018-09-04 00:00:00', NULL, 1, 1),
(337, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE234-0001', '2191', 2, '1234567890654789', NULL, '2018-10-15', '2019-10-15', '2018-10-15 00:00:00', NULL, 3, 1),
(338, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE234-0002', '2191', 2, '1234567890654321', NULL, '2018-10-15', '2019-10-15', '2018-10-15 00:00:00', NULL, 3, 1),
(341, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE675-0001', '90812', 2, '1234567890655656', NULL, '2018-11-12', '2019-11-12', '2018-11-12 00:00:00', NULL, 3, 1),
(342, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE675-0002', '90812', 2, '9876543210445446', NULL, '2018-11-12', '2019-11-12', '2018-11-12 00:00:00', NULL, 3, 1),
(343, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE675-0981', '45362', 2, '1234567890655698', NULL, '2018-12-14', '2019-12-14', '2018-12-14 00:00:00', NULL, 1, 1),
(344, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 'MBSM-NOTE675-0982', '45362', 2, '9876543210445332', NULL, '2018-12-14', '2019-12-14', '2018-12-14 00:00:00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment_subtype`
--

CREATE TABLE `it_equipment_subtype` (
  `id` tinyint(4) NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `purchased_items`
--

CREATE TABLE `purchased_items` (
  `id` bigint(20) NOT NULL,
  `p_id` bigint(20) NOT NULL,
  `subtype_id` tinyint(4) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_added` int(11) DEFAULT NULL,
  `is_part` tinyint(1) NOT NULL,
  `unit_number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased_items`
--

INSERT INTO `purchased_items` (`id`, `p_id`, `subtype_id`, `brand`, `model`, `details`, `supplier_id`, `qty`, `qty_added`, `is_part`, `unit_number`) VALUES
(1, 1, 14, 'Apple', 'iPhone 7', 'Storage: 64GB CPU: Apple A10 Fussion RAM: 2GB', 1, 2, 2, 0, NULL),
(2, 2, 14, 'Apple', 'iPhone 6', 'Space Grey 16GB', 1, 1, 1, 0, NULL),
(3, 3, 10, 'Logitech ', 'K120', 'Ergonomic', 3, 4, 4, 0, NULL),
(4, 4, 14, 'Apple', 'iPhone 7', 'Storage: 32GB\r\nCPU: Apple A10 Fussion\r\nRAM: 2GB', 1, 2, 2, 0, NULL),
(5, 5, 9, 'Logitech', 'Business B100', 'Optical Mouse', 3, 4, 4, 0, NULL),
(6, 6, 11, 'BenQ', '24\" LED Monitor', 'BenQ 24\" LED Monitor\r\n144hz Refresh Rate\r\n1920 x 1080 Resolution', 4, 1, 1, 0, NULL),
(7, 7, 14, 'Apple', 'iPhone 8', 'Storage: 64GB RAM: 2GB CPU: A11 with Bionic chip with 64-bit architecture', 1, 6, 6, 0, NULL),
(8, 8, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 1, 3, 3, 0, NULL),
(9, 9, 12, 'Apple', 'Macbook', '12-inch LED-backlit display;\r\n2304x1440 resolution;\r\nCPU: 1.2GHz Intel Core i5;\r\n8GB of 1866 MHz LPDDR3;\r\n256GB PCIe-based onboard SSD', 1, 3, 3, 0, NULL),
(10, 10, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 2, 2, 2, 0, NULL),
(11, 11, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 2, 2, 2, 0, NULL),
(12, 12, 14, 'Samsung', 'Note 10', '6.75\" display 1440x3040;\r\nOcta core (2.7Ghz, Quad core, M3 Mongoose);\r\n6GB RAM', 2, 2, 2, 0, NULL),
(13, 13, 10, 'Logitech', 'MK120', 'Spill resistant.', 7, 3, 3, 0, NULL),
(14, 14, 14, 'Apple', 'iPhone 8 Plus', 'CPU: Apple A11 Bionic\r\nRAM: 3GB\r\nStorage: 64GB', 1, 2, 2, 0, NULL),
(15, 15, 7, 'ID-Cooling', 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 5, 2, 2, 0, NULL),
(16, 15, 7, 'Rakk', 'Anyang PC Case', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 5, 2, 2, 0, NULL),
(17, 16, 3, 'AMD', 'Ryzen 5 2400g with Vega 11 Graphics', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 3, 1, 1, 0, NULL),
(18, 16, 3, 'AMD', 'Ryzen 5 2600g', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 3, 1, 1, 0, NULL),
(19, 16, 3, 'AMD', 'Ryzen 7 1700g', '8 Cores\r\n16 Threads\r\n3.7 Base Clock', 3, 1, 1, 0, NULL),
(20, 17, 13, 'Samsung', 'Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 2, 1, 1, 0, NULL),
(21, 18, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor 144Hz Refresh Rate 1920 x 1080 Screen Resolution', 3, 1, 1, 0, NULL),
(22, 19, 10, 'Logitech', 'MK445', 'Logitech MK445 Keyboard\r\nBrown Key Switches\r\nRGB Lighting', 7, 1, 1, 0, NULL),
(23, 20, 4, 'Kingston', '4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', 4, 1, 1, 0, NULL),
(24, 21, 6, 'EVGA', '700', 'EVGA 700W Power Supply', 5, 1, 1, 0, NULL),
(25, 22, 9, 'A4Tech', 'N-708x', '1200 DPI\r\nAmbidextrous Style\r\n4 Mouse button', 6, 1, 1, 0, NULL),
(26, 22, 9, 'Razer', 'Blackwidow Lite', 'Razer Blackwidow Lite \r\nBrown Key Switches', 6, 1, 1, 0, NULL),
(27, 22, 9, 'A4Tech', 'OP-720', '1000 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 6, 1, 1, 0, NULL),
(28, 22, 10, 'A4Tech', 'KD-650', 'Blue Backlight Keyboard\r\nGreen Key Switches', 6, 1, 1, 0, NULL),
(29, 22, 10, 'A4Tech', 'KD-126', 'LED Backlight\r\nLaser-inscribed Keys\r\nUltra Slim', 6, 1, 1, 0, NULL),
(30, 23, 9, 'Logitech', 'G120', '	\r\nLogitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 6, 6, 6, 0, NULL),
(31, 24, 4, 'HyperX', '16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', 6, 1, 1, 0, NULL),
(32, 25, 9, 'Razer', 'Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 6, 1, 1, 0, NULL),
(33, 25, 9, 'Logitech', 'G102', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 6, 1, 1, 0, NULL),
(34, 25, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 6, 1, 1, 0, NULL),
(35, 25, 10, 'A4Tech', 'KD-600L', 'Red Backlight Keyboard\r\nNormal Key Caps\r\nUltra-Slim ', 6, 1, 1, 0, NULL),
(36, 25, 10, 'Razer', 'Cynosa', 'Razer Cynosa Keyboard', 6, 1, 1, 0, NULL),
(37, 26, 11, 'Lenovo', '19\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n75 Refresh Rate\r\n1280 x 1024 Screen Resolution', 7, 1, 1, 0, NULL),
(38, 27, 14, 'Apple', 'iPhone 7', '64GB', 1, 1, 1, 0, NULL),
(39, 27, 13, 'Apple', 'iPad Pro', '12.9\" 2732x2048 Resoultion;\r\nRAM: 4GB;\r\n64GB', 1, 1, 1, 0, NULL),
(40, 28, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 8, 6, 6, 0, NULL),
(41, 29, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 3, 1, 1, 0, NULL),
(42, 30, 1, 'ASUS', 'A320M-K', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', 5, 1, 1, 0, NULL),
(43, 30, 1, 'ASRock', 'Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', 5, 1, 1, 0, NULL),
(44, 30, 1, 'GIGABYTE', 'A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', 5, 1, 1, 0, NULL),
(45, 30, 3, 'Sony', 'HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 5, 1, 1, 0, NULL),
(46, 31, 4, 'HyperX', 'Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', 4, 1, 1, 0, NULL),
(47, 31, 5, 'MSI', '1050Ti 4GB', '4GB; 2 Doors', 4, 1, 1, 0, NULL),
(48, 31, 5, 'Palit', '1050Ti 4GB', '1050ti 4GB 2 Doors', 4, 1, 1, 0, NULL),
(49, 32, 3, 'WD', '1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 4, 1, 1, 0, NULL),
(50, 33, 1, 'MSI', 'X470 Motherboard', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', 6, 1, 1, 0, NULL),
(51, 34, 9, 'Razer', 'Mamba Elite Chroma', 'Razer Mamba Elite Chroma\r\n7 programmable keys\r\n8300dpi', 6, 1, 1, 0, NULL),
(52, 35, 15, 'Microsoft', 'Windows 10 Pro', 'Windows 10 Pro', 7, 2, 2, 0, NULL),
(53, 36, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 3, 6, 6, 0, NULL),
(54, 37, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 1, 2, 2, 0, NULL),
(55, 38, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 4, 6, 6, 0, NULL),
(56, 39, 10, 'Logitech', 'MK120', 'Spill resistant.', 7, 6, 6, 0, NULL),
(57, 40, 11, 'BenQ', '20\" LED Monitor', 'BenQ 20\" LED Monitor\r\n144hz Refresh Rate\r\n1400 x 1050 Resolution', 4, 1, 1, 0, NULL),
(58, 41, 1, 'MSI', 'B450-A Pro', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', 6, 1, 1, 0, NULL),
(59, 41, 2, 'AMD', 'R5 1500X', 'Socket: AM4\r\n4-core 8-thread 3.5GHz-3.7GHz\r\nTDP: 65W', 6, 1, 1, 0, NULL),
(60, 41, 3, 'Seagate', 'HDD', '1TB Harddisk Drive', 6, 1, 1, 0, NULL),
(61, 42, 10, 'Logitech', 'K480', 'Logitech K480 Keyboard', 7, 2, 2, 0, NULL),
(62, 42, 11, 'NVISION', '24\" Curved Monitor', 'NVISION 24\" Curved Monitor\r\n144 Refresh Rate\r\n1920 x 1080 Screen Resolution', 7, 1, 1, 0, NULL),
(63, 43, 2, 'Intel', 'i5 9900K', '8-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 6, 1, 1, 0, NULL),
(64, 44, 15, 'Windows', '10 15603', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 7, 10, 10, 0, NULL),
(65, 45, 6, 'EVGA', '600', 'EVGA 600W Power Supply', 4, 1, 1, 0, NULL),
(66, 46, 10, 'Logitech', 'MK120', 'Spill resistant.', 7, 6, 6, 0, NULL),
(67, 47, 1, 'MSI', 'Z390-A PRO', '6-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 7, 1, 1, 0, NULL),
(68, 48, 2, 'Intel', 'i5 9600K', '6-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 7, 1, 1, 0, NULL),
(69, 49, 3, 'Seagate', 'HDD', '1TB HDD', 7, 1, 1, 0, NULL),
(70, 49, 4, 'Kingston', '16Gb DDR4 RAM', '8GB DDDR4 RAM x2', 7, 1, 1, 0, NULL),
(71, 49, 6, 'Seasonic', 'M12II 620', '620 Watt Power Supply', 7, 1, 1, 0, NULL),
(72, 49, 7, 'Noctua', 'NH-U12S', '120mm fans; 158mm Height.\r\nSocket: LGA1151\r\nTDP: 140W', 7, 1, 1, 0, NULL),
(73, 50, 5, 'NVIDIA', 'GTX 1050', '2 GB', 7, 7, 7, 1, 1),
(74, 50, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 7, 7, 7, 1, 1),
(75, 50, 8, 'Deepcool', 'Gammaxx 400', 'Fans: 120mm;\r\nSocket: LGA2011, LGA1366, LGA115X, AM4, AM3+', 7, 7, 7, 1, 1),
(76, 50, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400MHz', 7, 7, 7, 1, 1),
(77, 50, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 7, 7, 7, 1, 1),
(78, 50, 1, 'MSI', 'B350 PC MATe', 'Socket: AM4;\r\nChipset: AMD 350;\r\nRAM: 4 slots, DDR4', 7, 6, 6, 1, 1),
(79, 50, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 7, 7, 7, 1, 1),
(81, 50, 7, 'NZXT', 'Phantom 410', '215 x 516 x 532 mm', 7, 7, 7, 1, 1),
(82, 51, 9, 'Logitech', 'G102', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 6, 9, 9, 0, NULL),
(83, 52, 14, 'Apple', 'Iphone 8', '64GB', 1, 1, 1, 0, NULL),
(84, 53, 9, 'A4Tech', 'G3-220N', 'Wireless mouse\r\n1800 DPI\r\nErgonomic Symmetric Style\r\n3 Mouse Buttons', 6, 1, 1, 0, NULL),
(85, 54, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz) Graphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530 RAM: 8GB DDR3L (1,600MHz) Storage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 3, 6, 6, 0, NULL),
(86, 55, 14, 'Apple', 'iPhone X', 'CPU: A11 Bionic\r\nStorage: 64GB\r\nRAM: 3GB', 1, 2, 2, 0, NULL),
(87, 56, 15, 'Windows', '10 10653', 'License: Trialware, Microsoft Software Assurance, MSDN subscription, Microsoft Imagine;\r\nPlatforms: IA-32, x86-64 and, as of version 1709, ARM64', 7, 6, 6, 0, NULL),
(88, 57, 11, 'Samsung', '24\" LED Monitor', 'Samsung 24\" LED Curved Monitor\r\n144Hz Refresh Rate\r\n1920 x 1080 Screen Resolution', 3, 9, 9, 0, NULL),
(89, 58, 5, 'AMD', 'Radeon RX 560', '2 GB', 4, 9, 9, 1, 2),
(90, 58, 2, 'AMD', 'Ryzen 5 1500X', '4-core/8-thread;\r\nSpeed: 3.5GHz-3.7GHz;\r\nSocket: AM4;\r\nTDP: 65W', 4, 9, 9, 1, 2),
(91, 58, 1, 'MSI', 'B350 PC MATe', '2 GB', 4, 9, 9, 1, 2),
(92, 58, 4, 'Corsair', 'Vengeance LPX 4GB DDR4', '2400MHz', 4, 9, 9, 1, 2),
(93, 58, 3, 'Seagate', 'BarraCuda 1TB', '1TB HDD', 4, 9, 9, 1, 2),
(94, 58, 6, 'Corsair', 'VS450W', '80+ Bronze PSU', 4, 9, 9, 1, 2),
(95, 58, 7, 'Fractal', 'Design Core 1000', '175x355x420 mm', 4, 9, 9, 1, 2),
(96, 59, 12, 'Dell', 'Inspiron 15 7000', 'CPU: 2.3 GHz Intel Core i5-6300HQ (quad-core, 3MB Cache, up to 3.2GHz)\r\nGraphics: Nvidia GeForce GTX 960M (4GB GDDR5 RAM), Intel HD Graphics 530\r\nRAM: 8GB DDR3L (1,600MHz)\r\nStorage: 1TB 5,400 RPM hybrid drive w/ 8GB cache', 3, 4, 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_no` bigint(20) NOT NULL,
  `or_no` varchar(50) DEFAULT NULL,
  `date_of_purchase` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_no`, `or_no`, `date_of_purchase`, `user_id`) VALUES
(1, '0127', '2017-01-16 15:50:04', 1),
(2, '1478', '2017-02-07 19:19:13', 2),
(3, '000234', '2017-03-24 00:00:00', 3),
(4, '0128', '2017-10-01 15:50:04', 4),
(5, '3457', '2017-12-01 00:00:00', 4),
(6, '9987', '2018-02-18 19:16:55', 3),
(7, '0499', '2018-03-24 15:42:18', 2),
(8, '36260', '2018-07-14 00:00:00', 1),
(9, '9654', '2018-08-24 00:00:00', 1),
(10, '2191', '2018-10-05 00:00:00', 2),
(11, '90812', '2018-11-02 00:00:00', 3),
(12, '45362', '2018-12-04 00:00:00', 4),
(13, '98451', '2018-12-21 00:00:00', 4),
(14, '0499', '2018-12-27 15:38:33', 3),
(15, '5213', '2018-12-29 19:16:55', 2),
(16, '7894', '2019-01-02 19:13:11', 1),
(17, '5224', '2019-01-06 19:19:13', 1),
(18, '6333', '2019-01-11 19:16:55', 2),
(19, '2223', '2019-01-11 19:16:55', 3),
(20, '3578', '2019-01-15 19:14:57', 4),
(21, '8724', '2019-01-19 19:16:55', 1),
(22, '1477', '2019-01-21 00:00:00', 2),
(23, '921463', '2019-01-21 00:00:00', 3),
(24, '1687', '2019-01-22 19:14:57', 4),
(25, '7366', '2019-02-02 19:16:55', 4),
(26, '4755', '2019-02-12 19:16:55', 3),
(27, '1478', '2019-02-07 19:19:13', 2),
(28, '9065', '2019-02-09 08:09:41', 1),
(29, '2147', '2019-02-09 19:16:55', 1),
(30, '2578', '2019-02-12 19:08:50', 2),
(31, '4428', '2019-02-22 19:14:57', 3),
(32, '6782', '2019-02-26 19:11:35', 4),
(33, '8879', '2019-02-27 19:08:50', 4),
(34, '21897', '2019-02-28 19:16:55', 3),
(35, '4117', '2019-03-01 19:08:50', 2),
(36, '3508', '2019-03-11 19:16:55', 1),
(37, '217685', '2019-03-04 15:59:18', 1),
(38, '6549', '2019-03-10 21:04:22', 2),
(39, '9845', '2019-03-15 22:14:33', 3),
(40, '5589', '2019-03-17 19:16:55', 4),
(41, '5587', '2019-03-21 19:08:50', 4),
(42, '1412', '2019-03-22 19:16:55', 3),
(43, '4123', '2019-03-23 19:13:11', 2),
(44, '7492', '2019-03-25 14:21:24', 1),
(45, '6278', '2019-03-25 19:16:55', 1),
(46, '98452', '2019-03-31 00:00:00', 2),
(47, '0399', '2019-04-04 19:11:35', 3),
(48, '53792', '2019-04-04 19:13:11', 4),
(49, '6923', '2019-04-04 19:13:11', 1),
(50, '4321', '2019-04-06 00:00:00', 2),
(51, '921463', '2019-04-07 00:00:00', 3),
(52, '09878', '2019-04-10 19:19:13', 4),
(53, '2234', '2019-04-13 19:16:55', 4),
(54, '5678', '2019-04-16 00:00:00', 3),
(55, '1234', '2019-04-19 15:59:18', 2),
(56, '906591', '2019-04-28 16:31:11', 1),
(57, '3508', '2019-05-07 15:02:18', 1),
(58, '0234', '2019-05-12 00:00:00', 2),
(59, '7098', '2019-05-14 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `replacement_issuance`
--

CREATE TABLE `replacement_issuance` (
  `id` bigint(20) NOT NULL,
  `current_issuance` bigint(20) NOT NULL,
  `replaced_issuance` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replacement_issuance`
--

INSERT INTO `replacement_issuance` (`id`, `current_issuance`, `replaced_issuance`, `created_at`, `updated_at`) VALUES
(1, 74, 77, '2019-05-25 16:04:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `supplier_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`) VALUES
(1, 'Apple Store'),
(2, 'Samsung'),
(3, 'PC Depot'),
(4, 'PC Express'),
(5, 'Chelsey'),
(6, 'Data Blitz'),
(7, 'Octagon'),
(8, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `system_units`
--

CREATE TABLE `system_units` (
  `id` bigint(20) NOT NULL,
  `name` varchar(16) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dept_id` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`id`, `name`, `description`, `dept_id`, `user_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'ITPC', NULL, 1, 1, '2019-04-16 19:02:51', NULL, 2),
(2, 'ITPC', NULL, 1, 1, '2019-04-16 19:02:51', NULL, 2),
(3, 'ITPC', NULL, 1, 2, '2019-04-16 19:03:43', NULL, 2),
(4, 'ITPC', NULL, 1, 2, '2019-04-16 19:03:43', NULL, 2),
(5, 'ITIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, 2, '2019-05-06 19:36:29', NULL, 2),
(6, 'ITIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 1, 2, '2019-05-06 19:36:29', NULL, 2),
(7, 'FDPC', NULL, 3, 3, '2019-05-22 19:38:08', NULL, 2),
(8, 'FDPC', NULL, 3, 3, '2019-05-22 19:38:08', NULL, 2),
(9, 'FDPC', NULL, 3, 3, '2019-05-22 19:38:56', NULL, 2),
(10, 'FDPC', NULL, 3, 3, '2019-05-22 19:38:56', '2019-05-25 00:00:00', 4),
(11, 'FDPC', NULL, 3, 3, '2019-05-22 19:39:16', NULL, 2),
(12, 'FDPC', NULL, 3, 3, '2019-05-22 19:39:16', NULL, 2),
(13, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(14, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(15, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(16, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(17, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(18, 'HRIMAC', 'CPU: 2.3GHz dual-core Intel Core i5;\r\nMemory: 8GB of 2133MHz DDR;\r\nStorage: 1TB;\r\nGraphics: Intel Iris Plus Graphics 640', 4, 1, '2019-05-06 19:36:29', '2019-05-24 00:00:00', 2),
(19, 'FDPC', NULL, 3, 2, '2019-05-22 00:00:00', '2019-05-25 00:00:00', 4),
(20, 'FDPC', NULL, 3, 2, '2019-05-22 00:00:00', '2019-05-25 00:00:00', 4),
(21, 'FDPC', NULL, 3, 2, '2019-05-22 00:00:00', NULL, 2),
(22, 'ITPC', NULL, 1, 4, '2019-05-22 00:00:00', '2019-05-25 00:00:00', 3),
(23, 'ITPC', NULL, 1, 4, '2019-05-22 00:00:00', NULL, 1),
(24, 'ITPC', NULL, 1, 4, '2019-05-22 00:00:00', NULL, 1);

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `user_type` varchar(16) NOT NULL DEFAULT 'associate',
  `status` varchar(16) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `dept_id`, `created_at`, `updated_at`, `user_type`, `status`) VALUES
(1, 'Admin', '', 'admin@admin.com', '$2y$10$ZQbr3HKOeYhKnw17VgQM.OO5ATysBNCbFGVN/Vr18eSX8D5uW73rK', 1, '2019-04-16 18:26:19', NULL, 'admin', 'active'),
(2, 'Jon Paulo', 'Faypon', 'jonpaulo@gmail.com', '$2y$10$cVNBFra0VTY18YqUb0jro.7hYj0BeMdeyL/J42N7ETB48PKylin82', 2, '2019-04-16 18:27:24', NULL, 'associate', 'active'),
(3, 'Justine', 'Garcia', 'justine@gmail.com', '$2y$10$.wSfH7CTT5muuQDpn/jpBedW6Rt/e6M2VHa7W2paHOAeJnyY4bTDq', 3, '2019-04-16 18:27:49', NULL, 'associate', 'active'),
(4, 'Lovelyn', 'Paris', 'lovelynparis@gmail.com', '$2y$10$6NQ8/pk/agR9Jjs82VkYA.caCbz/Y8crIlvMoYCQXEhbk7Jb7dhE6', 4, '2019-04-16 18:28:10', NULL, 'associate', 'active'),
(5, 'Aika Vien', 'Dayrit', 'aikaviend@gmail.com', '$2y$10$v3ci2y5KRXZ/gLUbL8EdpePMVWAlMGhypbpfVvoK69uB0oEKV8FG.', 1, '2019-06-21 13:59:48', NULL, 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`done_by`),
  ADD KEY `data` (`data`),
  ADD KEY `system_unit` (`system_unit`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `it_equipment_ibfk_9` (`supplier_id`);

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
-- Indexes for table `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `subtype_id` (`subtype_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `replacement_issuance`
--
ALTER TABLE `replacement_issuance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `original_id` (`current_issuance`),
  ADD KEY `replaced_id` (`replaced_issuance`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_units`
--
ALTER TABLE `system_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `equipment_status`
--
ALTER TABLE `equipment_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory_concerns`
--
ALTER TABLE `inventory_concerns`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `it_equipment`
--
ALTER TABLE `it_equipment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

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
-- AUTO_INCREMENT for table `purchased_items`
--
ALTER TABLE `purchased_items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `replacement_issuance`
--
ALTER TABLE `replacement_issuance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_units`
--
ALTER TABLE `system_units`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `inventory_concerns_ibfk_10` FOREIGN KEY (`system_unit`) REFERENCES `system_units` (`id`),
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
  ADD CONSTRAINT `it_equipment_ibfk_7` FOREIGN KEY (`unit_id`) REFERENCES `system_units` (`id`),
  ADD CONSTRAINT `it_equipment_ibfk_9` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `it_equipment_subtype`
--
ALTER TABLE `it_equipment_subtype`
  ADD CONSTRAINT `it_equipment_subtype_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `it_equipment_type` (`id`);

--
-- Constraints for table `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD CONSTRAINT `purchased_items_ibfk_1` FOREIGN KEY (`subtype_id`) REFERENCES `it_equipment_subtype` (`id`),
  ADD CONSTRAINT `purchased_items_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `purchased_items_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `purchases` (`purchase_no`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
  ADD CONSTRAINT `system_units_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `system_units_ibfk_4` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

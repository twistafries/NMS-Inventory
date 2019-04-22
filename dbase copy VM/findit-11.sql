-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 04:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findit8`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) NOT NULL,
  `done_by` bigint(20) NOT NULL,
  `action` varchar(50) NOT NULL,
  `dept_id` tinyint(4) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `equipstatus_id` tinyint(4) NOT NULL,
  `concerns_id` bigint(20) NOT NULL,
  `issuance_id` bigint(20) NOT NULL,
  `equipment_id` bigint(20) NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  `subtype_id` tinyint(4) NOT NULL,
  `replacement_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 'Raymond', 'Holt', 'raymond@gmail.com', 4, '2019-04-10 12:23:25', NULL, 'active');

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
(1, 13, NULL, 8, 1, '2019-04-16 19:20:06', NULL, '2019-06-30', NULL, 'Issued with charger.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `it_equipment`
--

CREATE TABLE `it_equipment` (
  `id` bigint(20) NOT NULL,
  `subtype_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
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

INSERT INTO `it_equipment` (`id`, `subtype_id`, `name`, `details`, `serial_no`, `or_no`, `imei_or_macaddress`, `unit_id`, `supplier`, `warranty_start`, `warranty_end`, `created_at`, `updated_at`, `user_id`, `status_id`) VALUES
(1, 1, 'MSI B450-A Pro', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903273465', ' 601-7577-010B0903273465', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(2, 2, 'R5 1500X', 'Socket: AM4\r\n4-core 8-thread 3.5GHz-3.7GHz\r\nTDP: 65W', 'YD170XBCM88AE', 'YD170XBCM88AE', NULL, NULL, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(3, 3, 'HDD 1TB', 'Seagate 1TB Harddisk Drive', 'YST-657A-DATSDC', '0399', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(4, 1, 'MSI Z390-A PRO', 'Socket: LGA 1151\r\nChipset: Intel Z390\r\nSize: ATX\r\nRAM: 4 slots, DDR4\r\nPCIe: x16/x4, PCIe 3.0, CrossFireX', 'AZT-F72346', '0399', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:11:35', NULL, 2, 1),
(5, 2, 'i5 9600K', '6-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR90O', '53792', NULL, 2, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(6, 3, '1TB HDD', 'Seagate 1TB HDD', 'SYT099-AXHN9P-WT34', 'SYT099-AXHN9P-WT34', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(7, 4, '16GB DDR4 RAM', '8GB DDR4 RAM x2', '09UT-DRY7-90M8', '09UT-DRY7-90M8', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(8, 5, 'GTX 1060 6GB', 'NVIDIA GeForce GTX 1060 6GB VRAM', ' WSD9-RH790', ' WSD9-RH790', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(9, 6, 'SeaSonic M12II 620', '620 Watt Power Supply', '120-G1-0650-XR', '43790', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(10, 7, 'NH-U12S', 'Noctua 120mm fans; 158mm Height.\r\nSocket: LGA1151\r\nTDP: 140W', 'JHY78-DF678', 'TDP: 140W', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(13, 14, 'Iphone 8', '64GB', 'IPH-12345678', '09878', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(14, 1, 'ASUS A320M-K ', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4 3200MHz\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.0, SATA 6Gb/s', ' 601-7577-010B0703273216', ' 601-7577-010B0703273216', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(15, 1, 'ASRock Z390 Extreme', 'Socket: 1151\r\nChipset: Intel 9th and 8th Gen\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 801-7210-218B0903810386', ' 801-7210-218B0903810386', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(16, 1, 'GIGABYTE A320-DS3', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903212615', ' 601-7577-010B0903212615', NULL, 1, 'Chelsey', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(17, 3, 'Sony HD-E1', 'Sony 1TB Harddisk Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'SNY-216C-DDATSW', '21251', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(18, 4, 'HyperX Fury 32GB DDR4 RAM', 'HyperX Fury 16GB DDR4 RAM x2', '09UT-DRY7-80M1', '09UT-DRY7-80M1', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(19, 5, 'MSI 1050Ti 4GB', 'MSI 1050Ti 4GB 2Doors', ' WSD9-DH690', ' WSD9-DH690', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(20, 5, 'Palit 1050ti 4GB', 'Palit 1050ti 4GB 2 Doors', ' WSD9-BG750', ' WSD9-BG750', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(21, 2, 'Ryzen 5 2400g with Vega 11 Graphics', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ215', 'ATY-V87RST-DEQ215', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(22, 2, 'Ryzen 5 2600g ', '4 Cores\r\n8 Threads\r\n11 GPU Cores\r\n3.6 Base Clock', 'ATY-V87RST-DEQ220', 'ATY-V87RST-DEQ220', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(23, 2, 'Ryzen 7 1700g ', '8 Cores\r\n16 Threads\r\n3.7 Base Clock', 'ATY-V87RST-SET201', 'ATY-V87RST-SET201', NULL, 2, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(24, 2, 'i5 9900K', '8-Core 3.7GHz OC-capable.\r\nSocket: LGA 1151\r\nTDP: 95W\r\nNo stock HSF', 'ATY-V87RST-CHR222', 'ATY-V87RST-CHR222', NULL, 2, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:13:11', NULL, 2, 1),
(25, 6, 'EVGA 700', 'EVGA 700W Power Supply', '260-H1-0210-DR', '260-H1-0210-DR', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(26, 6, 'EVGA 600', 'EVGA 600W Power Supply', '260-H1-0211-DR', '260-H1-0211-DR', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(27, 7, 'DF-12025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'JHY78-DW2125', 'JHY78-DW2125', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(28, 14, 'Iphone 7', '64GB', 'IPH-223345213', 'IPH-223345213', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(29, 4, 'Kingston 4GB DDR4 RAM', 'Kingston 2GB DDR4 RAM x2', '09UT-DRT7-2212', '09UT-DRT7-2212', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(30, 4, 'Corsair 16GB DDR4 RAM', 'HyperX Fury 8GB DDR4 RAM x2', '09UT-DRY7-1126', '09UT-DRY7-1126', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-18', '2019-04-16 19:14:57', NULL, 2, 1),
(31, 3, 'WD 1TB Hard Drive', 'WD 1TB Hard Drive\r\nUSB Port : USB 3.0/USB 2.0×1\r\nPower Supply : DC 5V (USB bus powered)', 'WD-122C-DDATSG', 'WD-122C-DDATSG', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:11:35', NULL, 2, 1),
(32, 1, 'MSI X470', 'Socket: AM4\r\nChipset: AMD B450\r\nSize: ATX\r\nRAM: 4 Slots, DDR4\r\nPCIe: x16, PCIe 3.0\r\nPorts: USB 3.1, SATA 6Gb/s', ' 601-7577-010B0903272123', ' 601-7577-010B0903272123', NULL, 1, 'Data Blitz', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(33, 14, 'Iphone 6', 'Space Grey\r\n16GB', 'IPH-1325423', 'IPH-1325423', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(34, 7, 'DF-15025', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1155\r\nTDP: 140W', 'JHY78-DW1121', 'JHY78-DW1121', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(35, 15, 'Microsoft Windows 10 Pro', 'Windows 10 Pro', '290528961_PH-471404239', '290528961_PH-471404239', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(36, 15, 'Microsoft Windows 10 ', 'Windows 10 ', '290528961_PH-471404126', '290528961_PH-471404126', NULL, 1, 'Octagon', '2019-04-01', '2019-04-14', '2019-04-16 19:08:50', NULL, 1, 1),
(37, 13, 'Samsung Galaxy Tab', 'Dark Grey\r\n64GB\r\nAndroid Kitkat', 'SSG-121824', 'SSG-121824', NULL, NULL, 'Samsung Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(38, 13, 'iPad Pro', 'Space Grey\r\n64GB\r\niOS 12\r\nAndroid Kitkat', 'IPD-210642', 'IPD-210642', NULL, NULL, 'Apple Store', '2019-04-20', '2019-04-27', '2019-04-16 19:19:13', NULL, 3, 1),
(39, 9, 'Razer Deathadder', 'Razer Deathadder Mouse\r\n3200Dpi', 'RZR-1291502', 'RZR-1291502', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(40, 9, 'Logitech g102', 'Logitech g102 Mouse\r\n6 programmable keys\r\n3200dpi', 'LGT-921463', 'LGT-921463', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(41, 9, 'Razer Mamba', 'Razer Mamba Elite Chroma\r\n8 programmable keys\r\n8300dpi', 'RZR-1261222', 'RZR-1261222', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(42, 10, 'Razer Blackwidow X', 'Razer Blackwidow X Keyboard\r\n', 'RZR-1261972', 'RZR-1261972', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(43, 10, 'Razer Cynosa', 'Razer Cynosa Keyboard\r\n', 'RZR-9212611', 'RZR-9212611', NULL, NULL, 'Data Blitz', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(44, 10, 'Logitech MK235', 'Logitech MK235 Keyboard', 'LGT-M12612', 'LGT-M12612', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(45, 10, 'Logitech K480', 'Logitech K480 Keyboard', 'LGT-K210654', 'LGT-K210654', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(46, 11, 'NVISION 24" Curved', 'NVISION 24" Curved Monitor', 'NVS-C991284', 'NVS-C991284', NULL, NULL, 'Octagon', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(47, 11, 'BenQ 20" LED', 'BenQ 20" LED Monitor', 'BEN-C212884', 'BEN-C212884', NULL, NULL, 'PC Express', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(48, 11, 'Samsung 24" LED', 'Samsung 24" LED Curved Monitor', 'SMS-SW13508', 'SMS-SW13508', NULL, NULL, 'PC Depot', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 2, 1),
(49, 7, 'Rakk Kisig', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: AM4\r\nTDP: 140W', 'RAK-210421', 'RAK-210421', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(50, 7, 'Rakk Anyag', 'Noctua 3 120mm fans; 158mm Height.\r\nSocket: 1151\r\nTDP: 140W', 'RAK-210512', 'RAK-210512', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1),
(51, 7, 'Rakk Hawani Flow', 'Noctua 6 120mm fans; 158mm Height.\r\nSocket: 1151 and AM4\r\nTDP: 140W', 'RAK-212123', 'RAK-212123', NULL, NULL, 'Chelsey', '2019-04-14', '2019-04-28', '2019-04-16 19:16:55', NULL, 1, 1);

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
  `mac_address` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_units`
--

INSERT INTO `system_units` (`id`, `description`, `mac_address`, `user_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, 'PC Workstation', '2C-6F-C9-30-40-25', 1, '2019-04-16 19:02:51', NULL, 1),
(2, 'PC Workstation', '0A-28-19-D3-84-79', 1, '2019-04-16 19:02:51', NULL, 1),
(3, 'PC Workstation', '40-B8-9A-AA-DC-23', 2, '2019-04-16 19:03:43', NULL, 1),
(4, 'PC Workstation', '94-DE-80-77-C7-68', 2, '2019-04-16 19:03:43', NULL, 1);

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
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `equipstatus_id` (`equipstatus_id`),
  ADD KEY `concerns_id` (`concerns_id`),
  ADD KEY `issuance_id` (`issuance_id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `subtype_id` (`subtype_id`),
  ADD KEY `replacement_id` (`replacement_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `users_id` (`user_id`);

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
  ADD UNIQUE KEY `mac_address` (`mac_address`),
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `it_equipment`
--
ALTER TABLE `it_equipment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`concerns_id`) REFERENCES `inventory_concerns` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_10` FOREIGN KEY (`unit_id`) REFERENCES `system_units` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `activity_logs_ibfk_12` FOREIGN KEY (`type_id`) REFERENCES `it_equipment_type` (`id`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

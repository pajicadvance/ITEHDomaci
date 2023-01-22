-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 10:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc_part_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `coreClock` double DEFAULT NULL,
  `coreCount` int(11) DEFAULT NULL,
  `tdp` int(11) DEFAULT NULL,
  `socket_id` bigint(20) DEFAULT NULL,
  `memoryType_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`id`, `manufacturer_id`, `model`, `coreClock`, `coreCount`, `tdp`, `socket_id`, `memoryType_id`) VALUES
(1, 1, 'Ryzen 7 5800X3D', 3600, 8, 105, 1, 1),
(2, 1, 'Ryzen 5 2600', 3400, 6, 65, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL,
  `coreClock` int(11) DEFAULT NULL,
  `memoryClock` int(11) DEFAULT NULL,
  `tdp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`id`, `manufacturer_id`, `model`, `memory`, `coreClock`, `memoryClock`, `tdp`) VALUES
(1, 3, 'GeForce RTX 4090', 24, 2800, 20000, 340),
(2, 7, '7900 XTX Nitro+', 16, 2900, 22500, 280);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'AMD'),
(2, 'Intel'),
(3, 'Nvidia'),
(4, 'MSI'),
(5, 'AsRock'),
(6, 'Gigabyte'),
(7, 'Sapphire'),
(8, 'EVGA'),
(9, 'Corsair'),
(10, 'Patriot');

-- --------------------------------------------------------

--
-- Table structure for table `memory_type`
--

CREATE TABLE `memory_type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memory_type`
--

INSERT INTO `memory_type` (`id`, `name`) VALUES
(1, 'DDR4'),
(3, 'DDR5');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `formFactor` varchar(10) DEFAULT NULL,
  `socket_id` bigint(20) DEFAULT NULL,
  `memoryType_id` bigint(20) DEFAULT NULL,
  `memorySlots` int(11) DEFAULT NULL,
  `maxMemory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `manufacturer_id`, `model`, `formFactor`, `socket_id`, `memoryType_id`, `memorySlots`, `maxMemory`) VALUES
(1, 4, 'B450 Tomahawk', 'ATX', 1, 1, 4, 128),
(2, 6, 'B550M Aorus Pro-P', 'mATX', 1, 1, 4, 128);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` bigint(20) NOT NULL,
  `manufacturer_id` bigint(20) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `memory` int(11) DEFAULT NULL,
  `modules` int(11) DEFAULT NULL,
  `memorySpeed` int(11) DEFAULT NULL,
  `memoryType_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `manufacturer_id`, `model`, `memory`, `modules`, `memorySpeed`, `memoryType_id`) VALUES
(1, 9, 'LPX', 32, 2, 3600, 1),
(2, 10, 'Viper', 16, 2, 3200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `socket`
--

CREATE TABLE `socket` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socket`
--

INSERT INTO `socket` (`id`, `name`) VALUES
(1, 'AM4'),
(2, 'AM5'),
(3, 'LGA1200'),
(4, 'LGA1700');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `socket_id` (`socket_id`),
  ADD KEY `memoryType_id` (`memoryType_id`);

--
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_type`
--
ALTER TABLE `memory_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socket_id` (`socket_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `memoryType_id` (`memoryType_id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `memoryType_id` (`memoryType_id`);

--
-- Indexes for table `socket`
--
ALTER TABLE `socket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpu`
--
ALTER TABLE `cpu`
  ADD CONSTRAINT `cpu_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `cpu_ibfk_2` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`),
  ADD CONSTRAINT `cpu_ibfk_3` FOREIGN KEY (`memoryType_id`) REFERENCES `memory_type` (`id`);

--
-- Constraints for table `gpu`
--
ALTER TABLE `gpu`
  ADD CONSTRAINT `gpu_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ibfk_1` FOREIGN KEY (`socket_id`) REFERENCES `socket` (`id`),
  ADD CONSTRAINT `motherboard_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `motherboard_ibfk_3` FOREIGN KEY (`memoryType_id`) REFERENCES `memory_type` (`id`);

--
-- Constraints for table `ram`
--
ALTER TABLE `ram`
  ADD CONSTRAINT `ram_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `ram_ibfk_2` FOREIGN KEY (`memoryType_id`) REFERENCES `memory_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

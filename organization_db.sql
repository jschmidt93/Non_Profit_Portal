-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 03:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `npo`
--

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Description` text NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` char(3) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Website` varchar(200) NOT NULL,
  `Creation_date` date NOT NULL,
  `Last_update` date NOT NULL,
  `Note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `Name`, `Type`, `Description`, `Address`, `City`, `State`, `Country`, `Email`, `Phone`, `Website`, `Creation_date`, `Last_update`, `Note`) VALUES
(7, 'Nonprofit Association Ore', 'Charity', ' Nonprofit Association of Oregon is the statewide nonprofit membership organization', '4800 S Macadam Ave ', 'Portland', 'OR', 'USA', 'connect@nonprofitoregon.org', '5032394001', 'www.nonprofitoregon.org', '0000-00-00', '0000-00-00', ''),
(101, 'Rebuilding Together Texas', 'safe and healthy housing', 'Rebuilding Together North Texas restores hope and revitalizes neighborhoods.', '3905 Hedgcoxe Rd', 'Plano', 'Tex', 'USA', 'Maija@rtntx.org', '9722456900', 'rtntx.org', '1973-04-01', '2023-06-09', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

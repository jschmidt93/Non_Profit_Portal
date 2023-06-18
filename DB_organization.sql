-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 03:49 AM
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
-- Database: `npo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `orgID` int(11) NOT NULL,
  `Name` mediumtext NOT NULL,
  `Type` mediumtext NOT NULL,
  `Description` text NOT NULL,
  `Address` mediumtext NOT NULL,
  `City` mediumtext NOT NULL,
  `State` mediumtext NOT NULL,
  `Country` mediumtext NOT NULL,
  `Email` mediumtext NOT NULL,
  `Phone` mediumtext NOT NULL,
  `Website` mediumtext NOT NULL,
  `Creation_date` timestamp NULL DEFAULT current_timestamp(),
  `Last_updated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`orgID`, `Name`, `Type`, `Description`, `Address`, `City`, `State`, `Country`, `Email`, `Phone`, `Website`, `Creation_date`, `Last_updated`) VALUES
(1, 'Golden Valley Historical Society', 'Educational Organization', 'The Golden Valley Historical Society was established in 1974. Its mission is to find, preserve, and disseminate historical knowledge about the City of Golden Valley, Minnesota.', '6731 Golden Valley Rd', 'Golden Valley', 'Minnesota', 'United STates', 'gvhistoricalsociety@gmail.com', '763-308-5059', 'https://www.goldenvalleyhistoricalsociety.org/', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Grand Marais Art Colony', 'Educational Organization', 'The Grand Marais Art Colony fosters the exploratory growth and experimental power of contemporary artists.', '120 3rd Ave W', 'Grand Marais', 'Minnesota', 'United States', 'info@grandmaraisartcolony.org', '218-387-2737', 'https://grandmaraisartcolony.org/', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

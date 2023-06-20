-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 03:19 AM
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
-- Database: `merged_db`
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
  `Last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `Name`, `Type`, `Description`, `Address`, `City`, `State`, `Country`, `Email`, `Phone`, `Website`, `Creation_date`, `Last_update`) VALUES
(1, 'Golden Valley Historical ', 'Educational Organization', 'The Golden Valley Historical Society was established in 1974. Its mission is to find, preserve, and disseminate historical knowledge about the City of Golden Valley, Minnesota.', '6731 Golden Valley Rd', 'Golden Valley', 'Min', 'United STates', 'gvhistoricalsociety@gmail.com', '763-308-5059', 'https://www.goldenvalleyhistoricalsociety.org/', '1969-12-31', '1969-12-31'),
(2, 'Grand Marais Art Colony', 'Educational Organization', 'The Grand Marais Art Colony fosters the exploratory growth and experimental power of contemporary artists.', '120 3rd Ave W', 'Grand Marais', 'Min', 'United States', 'info@grandmaraisartcolony.org', '218-387-2737', 'https://grandmaraisartcolony.org/', '1969-12-31', '1969-12-31'),
(3, 'St. Jude Children\'s Resea', 'Specialized', 'St. Jude Children\'s Research Hospital is a pediatric treatment and research facility located in Memphis, Tennessee. Founded by entertainer Danny Thomas in 1962, it is a 501(c)(3) designated nonprofit medical corporation which focuses on children\'s catastrophic diseases, particularly leukemia and other cancers.[1] In the 2021 fiscal year, St. Jude received $2 billion in donations.[2] Daily operating costs average $1.7 million, but patients are not charged for their care.[3] St. Jude treats patients up to age 21, and for some conditions, up to age 25.[4]', '262 Danny Thomas Place', 'Memphis', 'Ten', 'United States', '', '(866) 278-5833', 'https://www.stjude.org/', '2023-06-19', '0000-00-00'),
(4, 'Mayo Clinic', 'Private', 'Mayo Clinic (/ˈmeɪjoʊ/) is a nonprofit American academic medical center focused on integrated health care, education, and research.[6] It employs over 4,500 physicians and scientists, along with another 58,400 administrative and allied health staff, across three major campuses: Rochester, Minnesota; Jacksonville, Florida; and Phoenix/Scottsdale, Arizona.[7][8] The practice specializes in treating difficult cases through tertiary care and destination medicine.', '200 First St. SW', 'Rochester', 'Min', 'United States', '', '480-301-8000', 'https://www.mayoclinic.org/', '2023-06-19', '0000-00-00'),
(5, 'Washburn Center for Child', '', ' 1100 Glenwood Avenue', ' Minneapolis', 'MN', 'Uni', '55405', '', ' (612) 871-1454', 'www.washburn.org ', '0000-00-00', '0000-00-00'),
(6, 'Veterans Airlift Command', '', ' 5775 Wayzata Blvd Ste 700', 'Saint Louis Park', 'MN', 'uni', '55416', 'info@veteransairlift.org', '(952) 582-2911', 'https://veteransairlift.org/', '0000-00-00', '0000-00-00'),
(7, 'Nonprofit Association Ore', 'Charity', ' Nonprofit Association of Oregon is the statewide nonprofit membership organization', '4800 S Macadam Ave ', 'Portland', 'OR', 'USA', 'connect@nonprofitoregon.org', '5032394001', 'www.nonprofitoregon.org', '0000-00-00', '0000-00-00'),
(8, 'NSC', '', '1750 105th Ave NE\r\nBlaine, MN 55449', 'Blaine', 'Mi', 'US', '', 'webmaster@nscsports.org', '7637855632', 'https://www.nscsports.org/page/show/1551613-contact-us', '2023-06-15', '0000-00-00'),
(9, 'Ethans reason', '', '7725 Mustang Lane', 'Lino Lakes', 'Mi', 'US', '', 'ethansreason@gmail.com', '', 'https://ethansreason.org/contact-us/', '2023-06-15', '0000-00-00'),
(101, 'Rebuilding Together Texas', 'safe and healthy housing', 'Rebuilding Together North Texas restores hope and revitalizes neighborhoods.', '3905 Hedgcoxe Rd', 'Plano', 'Tex', 'USA', 'Maija@rtntx.org', '9722456900', 'rtntx.org', '1973-04-01', '2023-06-09');

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

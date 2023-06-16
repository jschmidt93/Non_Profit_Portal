-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 12:51 AM
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
-- Database: `npo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `type`, `description`, `address`, `city`, `state`, `country`, `email`, `phone`, `website`, `creation_date`, `last_updated`) VALUES
(1, 'St. Jude Children\'s Research Hospital', 'Specialized', 'St. Jude Children\'s Research Hospital is a pediatric treatment and research facility located in Memphis, Tennessee. Founded by entertainer Danny Thomas in 1962, it is a 501(c)(3) designated nonprofit medical corporation which focuses on children\'s catastrophic diseases, particularly leukemia and other cancers.[1] In the 2021 fiscal year, St. Jude received $2 billion in donations.[2] Daily operating costs average $1.7 million, but patients are not charged for their care.[3] St. Jude treats patients up to age 21, and for some conditions, up to age 25.[4]', '262 Danny Thomas Place', 'Memphis', 'Tennessee', 'United States', '', '(866) 278-5833', 'https://www.stjude.org/', '2023-06-14 22:47:02', NULL),
(2, 'Mayo Clinic', 'Private', 'Mayo Clinic (/ˈmeɪjoʊ/) is a nonprofit American academic medical center focused on integrated health care, education, and research.[6] It employs over 4,500 physicians and scientists, along with another 58,400 administrative and allied health staff, across three major campuses: Rochester, Minnesota; Jacksonville, Florida; and Phoenix/Scottsdale, Arizona.[7][8] The practice specializes in treating difficult cases through tertiary care and destination medicine.', '200 First St. SW', 'Rochester', 'Minnesota', 'United States', '', '480-301-8000', 'https://www.mayoclinic.org/', '2023-06-14 22:50:31', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

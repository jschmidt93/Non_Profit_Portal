-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 04:35 AM
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
  `country` varchar(100) NOT NULL DEFAULT 'United States',
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `website` varchar(500) NOT NULL,
  `logo_url` varchar(500) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `type`, `description`, `address`, `city`, `state`, `country`, `email`, `phone`, `website`, `logo_url`, `creation_date`, `last_updated`, `created_by`) VALUES
(1, 'St. Jude Children\'s Research Hospital', 'Specialized', 'St. Jude Children\'s Research Hospital is a pediatric treatment and research facility located in Memphis, Tennessee. Founded by entertainer Danny Thomas in 1962, it is a 501(c)(3) designated nonprofit medical corporation which focuses on children\'s catastrophic diseases, particularly leukemia and other cancers.', '262 Danny Thomas Place', 'Memphis', 'Tennessee', 'United States', '', '(866) 278-5833', 'https://www.stjude.org/', 'https://stjude.cloud-cme.com/assets/stjude/images/SJ_Tag_H_C.png', '2023-06-23 14:23:51', NULL, 0),
(2, 'Mayo Clinic', 'Private', 'Mayo Clinic (/ˈmeɪjoʊ/) is a nonprofit American academic medical center focused on integrated health care, education, and research.', '200 First St. SW', 'Rochester', 'Minnesota', 'United States', '', '480-301-8000', 'https://www.mayoclinic.org/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Mayo_Clinic_logo.svg/800px-Mayo_Clinic_logo.svg.png', '2023-06-23 14:25:11', NULL, 0),
(3, 'Golden Valley Historical', 'Educational', 'The Golden Valley Historical Society was established in 1974. Its mission is to find, preserve, and disseminate historical knowledge about the City of Golden Valley.', '6731 Golden Valley Rd', 'Golden Valley', 'Minnesota', 'United States', 'gvhistoricalsociety@gmail.com', '763-308-5059', 'https://www.goldenvalleyhistoricalsociety.org/', 'https://static.wixstatic.com/media/f6f213_2324ff099a664d5a9dbc204a8bb43c2b~mv2_d_3001_3001_s_4_2.jpg/v1/crop/x_346,y_385,w_2308,h_2232/fill/w_120,h_116,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/GVHS_logo_vector_BW.jpg', '2023-06-23 13:31:56', NULL, 0),
(4, 'Grand Marais Art Colony', 'Educational', 'The Grand Marais Art Colony fosters the exploratory growth and experimental power of contemporary artists.', '120 3rd Ave W', 'Grand Marais', 'Minnesota', 'United States', 'info@grandmaraisartcolony.org', '218-387-2737', 'https://grandmaraisartcolony.org/', 'https://grandmaraisartcolony.org/wp-content/uploads/2023/05/GMAC_Horz_Multicolor_Png-01-e1683140283579.png', '2023-06-23 13:31:56', NULL, 0),
(5, 'Washburn Center For Children', 'Charity', 'Washburn Center for Children is the state’s leading children’s mental health center, caring for a wide variety of children’s needs such as:\r\n\r\nattention deficit disorders\r\ntrauma\r\nbehavioral problems\r\nanxiety\r\nlearning difficulties\r\ndepression', '1100 Glenwood Avenue', 'Minneapolis', 'Minnesota', 'United States', '', '(612) 871-1454', 'www.washburn.org', 'https://washburn.org/wp-content/uploads/2020/02/Washburn_Secondary_icon_RGB_5-01-e1582921309781.png', '2023-06-23 13:37:18', NULL, 0),
(6, 'Veterans Airlift Command', 'Private', 'We provide free, private air transportation to our nation\'s combat injured veterans for medical or other compassionate purposes through a national network of volunteer aircraft owners and pilots.', '5775 Wayzata Blvd Ste 700', 'Saint Louis Park', 'Minnesota', 'United States', 'info@veteransairlift.org', '(952) 582-2911', 'https://veteransairlift.org/', 'https://veteransairlift.org/wp-content/uploads/vac-logo-horizontal@700-200x65.png', '2023-06-23 13:37:18', NULL, 0),
(7, 'Nonprofit Association of Oregon', 'Charity', 'Nonprofit Association of Oregon is the statewide nonprofit membership organization', '4800 S Macadam Ave', 'Portland', 'Oregon', 'United States', 'connect@nonprofitoregon.org', '503-239-4001', 'www.nonprofitoregon.org', 'https://nonprofitoregon.org/sites/default/files/NAO%20Logo%20-%20ConnectImproveAdvance-homepage_0.jpg', '2023-06-23 13:43:38', NULL, 0),
(8, 'National Sports Center (NSC)', 'Charity', 'The National Sports Center Foundation, a 501(c)3 non-profit organization, seeks donations in order to remain open and continue to run programs and events that generate over $89 million in annual visitor impact.', '1750 105th Ave NE', 'Blaine', 'Minnesota', 'United States', 'webmaster@nscsports.org', '763-785-5632', 'https://www.nscsports.org/', 'https://www.tcgateway.com/wp-content/uploads/2019/12/nsc.png', '2023-06-23 13:43:38', NULL, 0),
(9, 'Ethans Reason', 'Charity', 'Ethan\'s Reason is a 501(c)(3) organization that raises awareness and funds to support research for a cure for Batten Disease.', '7725 Mustang Lane', 'Lino Lakes', 'Minnesota', 'United States', 'ethansreason@gmail.com', '', 'https://ethansreason.org/', 'https://ethansreason.org/wp-content/uploads/2021/03/logo-sm-e1617134749813.png', '2023-06-23 13:48:43', NULL, 0),
(10, 'Rebuilding Together Texas', 'Housing', 'Rebuilding Together North Texas restores hope and revitalizes neighborhoods.', '3905 Hedgcoxe Rd', 'Plano', 'Texas', 'United States', 'Maija@rtntx.org', '972-245-6900', 'https://rtntx.org/', 'https://images.squarespace-cdn.com/content/v1/5e76721b410ca8202ec16f0c/04610988-d5b6-441e-8dbd-080ff923a37a/PrimaryLogo_Horizontal.png', '2023-06-23 13:48:43', NULL, 0),
(15, 'Jake Schmidt', 'Charity', 'FP3 Submission', '', '', '', 'United States', '', '', '', '', '2023-06-29 01:50:56', NULL, 0),
(16, 'Testing User Roles', 'Housing', 'erwersersf', 'sdfsdfsd', 'fsdfsdfsd', 'Kansas', 'United States', 'sfsfdd@gmail.com', '952-388-4269', 'https://www.google.com/', 'https://1000logos.net/wp-content/uploads/2016/11/google-logo.jpg', '2023-07-05 23:02:01', NULL, 1),
(17, 'Testing User Roles', 'Private', 'sdfsdfg', 'dsfgsdf', 'sdfgsdf', 'Illinois', 'United States', 'apple@gmail.com', '952-388-4269', 'https://www.google.com/', 'https://1000logos.net/wp-content/uploads/2016/11/google-logo.jpg', '2023-07-06 00:10:28', NULL, 1),
(18, 'testing another user', 'Educational', 'sdafasdf', 'asdfasdf', 'Savage', 'Connecticut', 'United States', 'asdfas@gmasil.com', '952-388-4269', 'https://www.UnicefUSA.org', 'https://1000logos.net/wp-content/uploads/2016/11/google-logo.jpg', '2023-07-06 01:51:31', NULL, 5),
(19, 'asdfas', 'Specialized', 'asdf', 'asdfas', 'asdf', 'Iowa', 'United States', 'asdf@gmail', 'asdf', 'https://www.google.com/', 'https://1000logos.net/wp-content/uploads/2016/11/google-logo.jpg', '2023-07-06 01:52:01', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` enum('visitor','admin','super') NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `permissions`) VALUES
(1, 'Normal Admin', '', 'normaladmin@gmail.com', 'abc123', 'admin'),
(4, 'Super Admin', '', 'superadmin@gmail.com', '123abc', 'super'),
(5, 'Test Admin', '', 'test@gmail.com', '123abc', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

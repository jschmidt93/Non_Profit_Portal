-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 11:31 PM
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
  `logo` varchar(500) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_updated` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `type`, `description`, `address`, `city`, `state`, `country`, `email`, `phone`, `website`, `logo_url`, `logo`, `creation_date`, `last_updated`, `created_by`) VALUES
(3, 'Rice Sales Hotel', 'Housing', 'dgdgdgd', '6731 Golden Valley RXZBXBd', 'Springfield', 'Colorado', 'United States', 'gvhistoricalsociety@gmail.com', '763-308-5059', 'https://www.goldenvalleyhistoricalsociety.org/', 'https://avatars.githubusercontent.com/u/292302?v=4', 'np_1690406317_gk.jpg', '2023-07-26 21:18:37', '2023-07-19 23:47:58', 0),
(4, 'Grand MArais Coffe and Coders', 'Educational', 'We like to drink coffe and code in php and python.', 'ifehlkghlkdsf', 'Detroit', 'Iowa', 'United States', 'request@grandmaraisartcolony.org', '445.355.13324', 'https://grandmaraisartcolony.org/', 'https://cdn.greatnonprofits.org/images/logos/ETI.logo.ROSEN.White.Frame1.png', 'np_1690253021_gk.jpg', '2023-07-25 02:43:41', '2023-07-13 01:50:28', 0),
(6, 'Rainbow Health', 'Housing', 'For nearly 40 years we have been advocating for and serving the LGBTQ+ community, those living with HIV, and all folks facing barriers to equitable healthcare. Since our formation through the Minnesota AIDS Project and Rainbow Health Initiative merger—and later the acquisition of Training to Serve—we have continued to grow and identify new ways to commit to our mission.', '3249 Hennepin Ave S Suite 45', 'Minneapolis', 'Delaware', 'United States', 'info@rainbowhealth.org', ' (612) 373-2451', 'https://veteransairlift.org/', 'https://veteransairlift.org/wp-content/uploads/vac-logo-horizontal@700-200x65.png', 'default-logo.jpg', '2023-07-26 21:22:10', '2023-07-19 23:32:17', 0),
(7, 'Goos feathering Association', 'Housing', 'kafssALFLJSa', '1010 Whatever Ln', 'Eugene', 'Indiana', 'United States', 'connect@nonprofitoregon.org', '335.3242.1331', 'www.nonprofitoregon.org', 'https://nonprofitoregon.org/sites/default/files/NAO%20Logo%20-%20ConnectImproveAdvance-homepage_0.jpg', 'np_1690049568_gk.jpg', '2023-07-22 18:12:48', '2023-07-13 01:45:28', 0),
(8, 'Witch Appreciation Society', 'Educational', 'The elevation and glory of witches and witchcraft', '1750 105th Ave NE', 'Salem', 'Georgia', 'United States', 'webmaster@nscsports.org', '763-785-5632', 'https://www.nscsports.org/', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.TVM2h9Oegprp5EXRnRZ5GgHaFj%26pid%3DApi&f=1&ipt=ce984efd811d7801f2c542c24cab01bed93149094a8999fa1828e1158f2bc37d&ipo=images', 'np_1690050535_gk.jpg', '2023-07-22 18:28:55', '2023-07-16 20:13:59', 0),
(9, 'Ethans Reason', 'Charity', 'Ethans Reason is a 501(c)(3) organization that raises awareness and funds to support research for a cure for Batten Disease.', '7725 Mustang Lane', 'Lino Lakes', 'Minnesota', 'United States', 'ethansreason@gmail.com', '(786) 456-1212', 'https://ethansreason.org/', 'https://ethansreason.org/wp-content/uploads/2021/03/logo-sm-e1617134749813.png', 'np_1690406736_gk.jpg', '2023-07-26 21:25:36', NULL, 0),
(10, 'Rebuilding Together Texas', 'Educational', 'Rebuilding Together North Texas restores hope and revitalizes neighborhoods.', '3905 Hedgcoxe Rd', 'Plano', 'Alabama', 'United States', 'Maija@rtntx.org', '972-245-6900', 'https://rtntx.org/', 'https://images.squarespace-cdn.com/content/v1/5e76721b410ca8202ec16f0c/04610988-d5b6-441e-8dbd-080ff923a37a/PrimaryLogo_Horizontal.png', 'np_1690051422_gk.jpg', '2023-07-22 18:43:42', '2023-07-19 23:42:11', 0),
(11, 'Fedred', 'Housing', 'adsafsf', 'dsff', 'dadf', 'Alabama', 'United States', 'gdh@hete.com', '23535', 'http://www.fpiesfoundation.org/', 'https://cdn.greatnonprofits.org/images/logos/logowithurl2.jpg', 'np_1690406804_gk.jpg', '2023-07-26 21:26:44', '2023-07-16 20:10:27', 0),
(12, 'Penmanship Depreciation Society', 'Educational', 'We kdanksdlkagsd', 'fsahosa', 'daaf', 'Iowa', 'United States', 'root@elihu.com', '(456) 632-1066', 'https://www.raf.mod.uk/our-organisation/squadrons/617-squadron/', '', 'np_1690220278_gk.jpg', '2023-07-24 17:37:58', NULL, 1),
(13, 'Hecate Appreciation Society', 'Educational', 'To promote the elevation and Wicca and wiccans on sea, air, land.  ', '6666 Mather Aver', 'Salem ', 'Vermont', 'United States', 'root@elihu.com', '(666) 666-9999', 'https://librivox.org/', '', 'np_1690406672_gk.jpeg', '2023-07-26 21:24:32', NULL, 1),
(14, 'Help the Helpless', 'Charity', 'Our mission at Help the Helpless is to provide for the physical and spiritual needs, formal education, and vocational opportunities to poor children and families, both in India and Ecuador. The objective is to help those in poverty become self-sufficient and to break the bond of poverty that they live in.', '2716 Colfax Ave S ', 'Minneapolis', 'Minnesota', 'United States', 'info@helpthehelpless.com', '877-762-8857', 'http://www.helpthehelpless.org/', '', 'np_1690404388_gk.png', '2023-07-26 20:46:28', NULL, 1),
(15, 'St. David\'s Center for Child & Family Development', 'Specialized', 'Building relationships that nurture the development of every child and family.', ' 3395 Plymouth Rd ', 'Los Angeles', 'California', 'United States', 'MedicalRecordsRequests@stdavidscenter.org', '952.939.0396', 'http://www.stdavidscenter.org/', '', 'default-logo.jpg', '2023-07-26 20:49:28', NULL, 1),
(16, 'Wilderness Inquiry Inc', 'Educational', 'Our mission is to provide outdoor adventure experiences that inspire personal growth, community integration, and enhanced awareness of the environment. Wilderness inquiry adventures encourage people to open themselves to new possibilities and opportunities. ', '1611 County Road B W Ste 135 ', 'Los Angeles', 'California', 'United States', 'ann@wildernessinquiry.org', ' (612) 676-9400', 'http://www.wildernessinquiry.org/', '', 'np_1690404780_gk.png', '2023-07-26 20:53:00', NULL, 1),
(17, 'Planned Parenthood Minnesota North Dakota South Dakota', 'Specialized', 'Affirming human rights to reproductive health and freedom. ', '671 Vandalia St', 'Saint Paul', 'Minnesota', 'United States', 'advocacy@ppncs.org', ' (651) 696-5500', 'http://www.ppmns.org/', '', 'default-logo.jpg', '2023-07-26 20:59:35', NULL, 1),
(18, 'CCI Health Services', 'Specialized', 'We are uniquely positioned to provide a wide range of services, including primary and pediatric care, dental care, behavioral health services, family planning services, WIC, and prenatal care.', 'Po Box 67 Dodge Center', 'Dodge City', 'Kansas', 'United States', 'info@cciweb.org', ' (866) 877-7258', 'https://cciweb.org', '', 'default-logo.jpg', '2023-07-26 21:06:21', NULL, 1),
(19, 'ANNEX TEEN CLINIC', 'Specialized', 'The Annex Teen Clinic helps youth take charge of their sexual health by providing confidential health services and education.', ' 5810 42ND Ave N', 'Doddge City', 'Kansas', 'United States', 'holly@annexteenclinic.org', ' 763-533-1316', 'http://www.annexteenclinic.org/', '', 'np_1690405865_gk.png', '2023-07-26 21:11:05', NULL, 1),
(20, 'League Of Women Voters Of Minneapolis Inc', 'Educational', 'We are a non-partisan political organization that encourages informed and active participation in all levels of government, works to increase understanding of major policy issues, and influences public policy through education and advocacy.', '3537 Nicollet Ave', 'Minneapolis', 'Minnesota', 'United States', 'vote@lwvmpls.org', '(612) 234-5503‬', 'http://www.lwvmpls.org/', '', 'np_1690406219_gk.png', '2023-07-26 21:16:59', NULL, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `permissions`) VALUES
(1, 'banji', 'lawal', 'banji@banji.com', 'banji', 'super');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

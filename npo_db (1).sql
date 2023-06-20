SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `npo_db`

-- Table structure for table `organization`

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` char(2) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` char(5) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `link` varchar(100) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `organization`

INSERT INTO `organization` (`id`, `name`, `address`, `city`, `state`, `country`, `zipcode`, `email`, `phone`, `link`, `creation_date`, `last_updated`) VALUES
(1, 'NSC', '1750 105th Ave NE\r\nBlaine, MN 55449', 'Blaine', 'Minnesota', 'US', '', 'webmaster@nscsports.org', '7637855632', 'https://www.nscsports.org/page/show/1551613-contact-us', '2023-06-15 01:20:37', '0000-00-00 00:00:00'),
(2, 'Ethans reason', '7725 Mustang Lane', 'Lino Lakes', 'Minnesota', 'US', '', 'ethansreason@gmail.com', '', 'https://ethansreason.org/contact-us/', '2023-06-15 01:25:02', '0000-00-00 00:00:00');

-- Indexes for dumped tables

-- Indexes for table `organization`

ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `organization`

ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

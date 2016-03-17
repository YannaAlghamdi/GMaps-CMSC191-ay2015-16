-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for googlemaps
CREATE DATABASE IF NOT EXISTS `googlemaps` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gmaps`;


-- Dumping structure for table googlemaps.markers
CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table googlemaps.markers: 11 rows
DELETE FROM `markers`;
/*!40000 ALTER TABLE `markers` DISABLE KEYS */;
INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
	(1, 'Bonitos Bar and Restaurant', 'Oregano St. cor Lopez Ave. Demarses Subd. Batong Malake Los Baños Laguna 4030', 14.168989, 121.244522, 'Restaurant'),
	(2, 'DL Umali Auditorium', 'University of the Philippines Los Banos Laguna 4031', 14.163720, 121.240250, 'Auditorium'),
	(3, 'Vega Center', 'Grove', 14.167870, 121.243820, 'Mall'),
	(4, 'Robinsons Town Center', '3 Lopez Avenue Batong Malake Los Banos Laguna 4030', 14.177290, 121.242157, 'Mall'),
	(5, 'Country Inn', '1113 Bangkal St San Antonio Los Banos Laguna 4030', 14.1774664,121.242427, 'Inn'),
	(6, 'Olivarez Plaza', 'National Highway, Batong Malake Los Banos, Laguna 4030', 14.179185, 121.239067, 'Mall'),
	(7, 'Bank of the Philippine Islands Los Banos', 'National Highway, Batong Malake Los Banos, Laguna 4030', 14.179211, 121.238625, 'Bank'),
	(8, 'Los Banos Municipal Hall', 'Bayan Los Banos Laguna 4030', 14.177136, 121.221886, 'Municipal Hall'),
	(9, 'Gem\'s Resort', 'Brgy Lalakay Los Banos Laguna 4030', 14.171720, 121.206482, 'Resort'),
	(10, 'SM City Calamba', 'Calamba Laguna 4027', 14.202888, 121.155655, 'Mall'),
	(11, 'Sky Fun Amusement Park at Sky Ranch', 'Tagaytay - Nasugbu Highway, Tagaytay, Cavite', 14.095336, 120.937599, 'Amusement Park');
/*!40000 ALTER TABLE `markers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

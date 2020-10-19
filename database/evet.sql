-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for evet
CREATE DATABASE IF NOT EXISTS `evet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `evet`;

-- Dumping structure for table evet.animal
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(50) DEFAULT NULL,
  `typeofpet` varchar(50) DEFAULT NULL,
  `petname` varchar(255) DEFAULT NULL,
  `breed` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.animal: ~2 rows (approximately)
DELETE FROM `animal`;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` (`id`, `customerid`, `typeofpet`, `petname`, `breed`) VALUES
	(6, '1', 'Dog', 'Nama Satu', 'Bull Dog'),
	(7, '1', 'Fish', 'Nama Dua', 'Ikan Kering');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Dumping structure for table evet.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(50) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `petname` varchar(250) DEFAULT NULL,
  `dateappointment` varchar(50) DEFAULT NULL,
  `timeappointment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.appointment: ~0 rows (approximately)
DELETE FROM `appointment`;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` (`id`, `customerid`, `service`, `petname`, `dateappointment`, `timeappointment`) VALUES
	(1, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:51'),
	(2, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:51'),
	(3, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:51'),
	(4, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:51'),
	(5, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:51'),
	(6, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:53'),
	(7, '1', 'Pet Grooming', 'Nama Dua', '2020-10-20', '00:55'),
	(8, '1', 'Pet Boarding', 'Nama Satu', '2020-10-20', '00:56');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- Dumping structure for table evet.breed
CREATE TABLE IF NOT EXISTS `breed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeofpeet` varchar(50) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.breed: ~7 rows (approximately)
DELETE FROM `breed`;
/*!40000 ALTER TABLE `breed` DISABLE KEYS */;
INSERT INTO `breed` (`id`, `typeofpeet`, `breed`) VALUES
	(1, 'Cat', 'Domestic Shorthair'),
	(2, 'Cat', 'Domestic Longhair'),
	(3, 'Cat', 'British Shorthair'),
	(4, 'Dog', 'Bull Dog'),
	(5, 'Dog', 'Afador'),
	(6, 'Fish', 'Ikan Karing'),
	(7, 'Fish', 'Ikan Kering');
/*!40000 ALTER TABLE `breed` ENABLE KEYS */;

-- Dumping structure for table evet.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.pengguna: ~3 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id`, `username`, `fullname`, `password`, `role`, `phonenumber`) VALUES
	(1, 'ijanmat@gmail.com', 'Hapizan', 'abc123', 'Admin', NULL),
	(2, 'pijan@gmail.com', 'Pijan', '123', 'Pet Owner', '01431212121'),
	(3, 'admin@gmail.com', 'admin', '123', 'Admin', '0121321312');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.animal: ~8 rows (approximately)
DELETE FROM `animal`;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` (`id`, `customerid`, `typeofpet`, `petname`, `breed`) VALUES
	(6, '1', 'Dog', 'Nama Satu', 'Bull Dog'),
	(7, '1', 'Fish', 'Nama Dua', 'Ikan Kering'),
	(15, '1', 'Dog', 'dog1', 'German Shepherd'),
	(16, '1', 'Cat', 'bubuu', 'American Shorthair'),
	(17, '1', 'Cat', 'bobby', 'British Shorthair'),
	(18, '1', 'Cat', 'bobbyy', 'American Shorthair'),
	(19, '1', 'Bird', 'Cekodok', 'Brotogeris'),
	(20, '8', 'Bird', 'Pisang panas', 'Cockatiel');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;

-- Dumping structure for table evet.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` varchar(50) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `petname` varchar(250) DEFAULT NULL,
  `dateappointment` varchar(50) DEFAULT NULL,
  `timeappointment` varchar(50) DEFAULT NULL,
  `note` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.appointment: ~10 rows (approximately)
DELETE FROM `appointment`;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` (`id`, `customerid`, `service`, `petname`, `dateappointment`, `timeappointment`, `note`) VALUES
	(17, '1', 'Pet Boarding', 'Nama Satu', '2020-12-03', '10:00', '3 Layer'),
	(18, '1', 'Pet Grooming', 'dog1', '2020-12-09', '16:00', ''),
	(19, '1', 'Veterinarian Services', 'bubuu', '2020-12-14', '14:00', 'bubuu'),
	(20, '1', 'Pet Grooming', 'dog1', '2020-12-03', '10:40', 'grooming'),
	(21, '1', 'Pet Boarding', 'Nama Satu', '2020-12-03', '09:00', 'Cage 1 Layer'),
	(22, '1', 'Veterinarian Services', 'Nama Dua', '2020-12-05', '09:00', ''),
	(23, '1', 'Pet Grooming', 'bobbyy', '2020-12-06', '10:50', 'grooming bobbyy'),
	(24, '1', 'Pet Boarding', 'Pisang panas', '2021-01-05', '14:58', 'Cage 1 Layer'),
	(25, '8', 'Pet Boarding', 'Pisang panas', '2021-01-05', '14:00', 'Cage 3 Layer'),
	(26, '8', 'Veterinarian Services', 'Pisang panas', '2021-01-12', '00:05', '1231');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;

-- Dumping structure for table evet.breed
CREATE TABLE IF NOT EXISTS `breed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeofpeet` varchar(50) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.breed: ~47 rows (approximately)
DELETE FROM `breed`;
/*!40000 ALTER TABLE `breed` DISABLE KEYS */;
INSERT INTO `breed` (`id`, `typeofpeet`, `breed`) VALUES
	(1, 'Bird', 'Brotogeris'),
	(2, 'Bird', 'Cockatiel'),
	(3, 'Bird', 'Cockatoo'),
	(4, 'Bird', 'Conure'),
	(5, 'Bird', 'Eclectus'),
	(6, 'Bird', 'Finch'),
	(7, 'Bird', 'Kakariki'),
	(8, 'Bird', 'Parrot'),
	(9, 'Bird', 'Pigeon'),
	(10, 'Bird', 'Rosella'),
	(11, 'Cat', 'American Shorthair'),
	(12, 'Cat', 'Bengal'),
	(13, 'Cat', 'British Shorthair'),
	(14, 'Cat', 'Burmese'),
	(15, 'Cat', 'Domestic Longhair'),
	(16, 'Cat', 'Domestic Shorthair'),
	(17, 'Cat', 'Exotic Shorthair'),
	(18, 'Cat', 'Maine Coon'),
	(19, 'Cat', 'Norwegian Forest'),
	(20, 'Cat', 'Persian'),
	(21, 'Cat', 'Ragdoll'),
	(22, 'Cat', 'Scottish Fold'),
	(23, 'Dog', 'German Shepherd'),
	(24, 'Dog', 'Golden Retriever'),
	(25, 'Dog', 'Husky'),
	(26, 'Dog', 'Labrador'),
	(27, 'Dog', 'Mixed'),
	(28, 'Dog', 'Pomeranian'),
	(29, 'Dog', 'Poodle'),
	(30, 'Dog', 'Schnauzer'),
	(31, 'Dog', 'Shih Tzu'),
	(32, 'Dog', 'Silky Terrier'),
	(33, 'Hamster', 'Campbell'),
	(34, 'Hamster', 'Chinese'),
	(35, 'Hamster', 'Roborovski'),
	(36, 'Hamster', 'Syrian'),
	(37, 'Hamster', 'Whinter White'),
	(38, 'Rabbit', 'Angora'),
	(39, 'Rabbit', 'Bunny'),
	(40, 'Rabbit', 'Dutch'),
	(41, 'Rabbit', 'Holland Lop'),
	(42, 'Rabbit', 'Lionhead'),
	(43, 'Rabbit', 'Mini Lop'),
	(44, 'Rabbit', 'Mini Rex'),
	(45, 'Rabbit', 'Netherland Dwarf'),
	(46, 'Rabbit', 'Polish'),
	(47, 'Rabbit', 'Rex');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table evet.pengguna: ~4 rows (approximately)
DELETE FROM `pengguna`;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` (`id`, `username`, `fullname`, `password`, `role`, `phonenumber`) VALUES
	(1, 'saya@admin.com', 'Mira', 'sasa', 'Admin', '194331290'),
	(3, 'mirasept29@gmail.com', 'miraa', '123', 'Pet Owner', '0125479091'),
	(7, 'rohaini@gmail.com', 'rohaini', '123', 'Veterinarian', '0195551680'),
	(8, 'mirasept30@gmail.com', 'miraa', '123', 'Pet Owner', '0125479091');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;

-- Dumping structure for table evet.record
CREATE TABLE IF NOT EXISTS `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `record` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table evet.record: ~0 rows (approximately)
DELETE FROM `record`;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
/*!40000 ALTER TABLE `record` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

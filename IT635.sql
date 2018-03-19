-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: IT635
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Appointments`
--

DROP TABLE IF EXISTS `Appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Appointments` (
  `AppointID` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(20) DEFAULT NULL,
  `ScheduleDate` date DEFAULT NULL,
  `ScheduleTime` time DEFAULT NULL,
  `CarID` int(10) DEFAULT NULL,
  PRIMARY KEY (`AppointID`),
  KEY `CarID` (`CarID`),
  CONSTRAINT `Appointments_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `Cars` (`CarID`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appointments`
--

LOCK TABLES `Appointments` WRITE;
/*!40000 ALTER TABLE `Appointments` DISABLE KEYS */;
INSERT INTO `Appointments` VALUES (1000,'Barney Stinson','2018-03-05','15:00:00',1),(1001,'Ted Bosby','2018-04-23','12:00:00',2),(1002,'Robin Scherbatsky','2018-04-25','11:00:00',3);
/*!40000 ALTER TABLE `Appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cars`
--

DROP TABLE IF EXISTS `Cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cars` (
  `CarID` int(10) NOT NULL AUTO_INCREMENT,
  `CarModel` varchar(20) DEFAULT NULL,
  `Year` int(10) DEFAULT NULL,
  `MilesUsed` int(10) DEFAULT NULL,
  `Availability` varchar(20) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL,
  `SalesRep` varchar(20) DEFAULT NULL,
  `Age` int(10) DEFAULT NULL,
  PRIMARY KEY (`CarID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cars`
--

LOCK TABLES `Cars` WRITE;
/*!40000 ALTER TABLE `Cars` DISABLE KEYS */;
INSERT INTO `Cars` VALUES (1,'Honda',2009,5000,'Lease',5000,'Rachel Green',29),(2,'Infiniti',2007,100000,'Purchase',20000,'Joey Tribbiani',32),(3,'Lexus',2015,0,'Purchase',50000,'Ross Geller',30),(4,'BMW',2013,30000,'Lease',15000,'Phoebe Buffay',26);
/*!40000 ALTER TABLE `Cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sales`
--

DROP TABLE IF EXISTS `Sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sales` (
  `SalesID` int(10) NOT NULL AUTO_INCREMENT,
  `AppointID` int(10) DEFAULT NULL,
  PRIMARY KEY (`SalesID`),
  KEY `AppointID` (`AppointID`),
  CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`AppointID`) REFERENCES `Appointments` (`AppointID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sales`
--

LOCK TABLES `Sales` WRITE;
/*!40000 ALTER TABLE `Sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `Sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Barney Stinson','12345','Customer'),(2,'Rachel Green','12345','SalesRep');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-19 18:54:34

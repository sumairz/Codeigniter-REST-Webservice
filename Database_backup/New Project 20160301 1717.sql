-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.17


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema inrentory
--

CREATE DATABASE IF NOT EXISTS inrentory;
USE inrentory;

--
-- Definition of table `currentuser`
--

DROP TABLE IF EXISTS `currentuser`;
CREATE TABLE `currentuser` (
  `curretUserId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `people_peopleId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`curretUserId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentuser`
--

/*!40000 ALTER TABLE `currentuser` DISABLE KEYS */;
INSERT INTO `currentuser` (`curretUserId`,`people_peopleId`) VALUES 
 (1,12);
/*!40000 ALTER TABLE `currentuser` ENABLE KEYS */;


--
-- Definition of table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `peopleId` int(11) NOT NULL AUTO_INCREMENT,
  `peopleEmail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`peopleId`),
  UNIQUE KEY `peopleEmail_UNIQUE` (`peopleEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`peopleId`,`peopleEmail`) VALUES 
 (12,'new@new.com'),
 (11,'sample@gmail.com'),
 (10,'sumairz@gmail.com');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;


--
-- Definition of table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `taskId` int(11) NOT NULL AUTO_INCREMENT,
  `taskDesc` varchar(45) DEFAULT NULL,
  `taskDueDate` varchar(45) DEFAULT NULL,
  `taskAssignedTo` int(11) DEFAULT NULL,
  `people_peopleId` int(11) NOT NULL,
  PRIMARY KEY (`taskId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`taskId`,`taskDesc`,`taskDueDate`,`taskAssignedTo`,`people_peopleId`) VALUES 
 (3,'asdasaskdbasjdjas','02/02/2016',11,11),
 (4,'asdasaskdbasjdjas','02/02/2016',1,1),
 (5,'new task is to add a new page','02/09/12',10,10),
 (10,'third task for sample','02/03/16',11,11);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;


--
-- Definition of table `tasksnote`
--

DROP TABLE IF EXISTS `tasksnote`;
CREATE TABLE `tasksnote` (
  `taskNoteId` int(11) NOT NULL AUTO_INCREMENT,
  `taskNote` varchar(45) DEFAULT NULL,
  `taskImage` varchar(45) DEFAULT NULL,
  `tasks_taskId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`taskNoteId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasksnote`
--

/*!40000 ALTER TABLE `tasksnote` DISABLE KEYS */;
INSERT INTO `tasksnote` (`taskNoteId`,`taskNote`,`taskImage`,`tasks_taskId`,`date`) VALUES 
 (3,'sample note 1','',3,'2016-03-01 16:49:47'),
 (4,'sample note 2','',3,'2016-03-01 16:49:56');
/*!40000 ALTER TABLE `tasksnote` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

CREATE DATABASE  IF NOT EXISTS `admin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `admin`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: admin
-- ------------------------------------------------------
-- Server version	5.6.19-log

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` bigint(20) DEFAULT '0',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` char(60) NOT NULL,
  `status` int(1) DEFAULT '0',
  `register_date` datetime NOT NULL,
  `newsletter` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(2,102063180139254,'Draazen','Dev','draazen.dev@gmail.com','',0,'2015-07-03 14:32:02',0),
(3,0,'John','Doe','john.doe@gmail.com','$2y$10$llvvGl8X0dANXffNJ3Z3qutPySVVZ1AxUh5FBJHFiyfT9MJjXT2TS',0,'2015-07-03 15:10:21',1),
(4,0,'Frédéric','Legembre','frederic.legembre@gmail.com','fbaa344d6f79c35123cdd4eef4dd1592bac1dd2fb7e09a04eb7577919d67',0,'2015-07-05 14:26:48',0),
(5,0,'Snow','John','john.snow@winterfell.com','azerty',0,'2015-06-26 11:13:32',0),
(6,0,'Nieve','Juan','juan.nieve@invierno.com','frio123',0,'2015-06-26 12:05:56',1),
(7,0,'Salt','Linda','linda.salt@example.com','$2y$10$wZgbkeeBcL18LwG98M5XgO7VYYrV1w7kMCgR/xE4T83Z6rcb6ADRe',0,'2015-06-26 12:42:15',0),
(8,0,'Smith','Dana','dana.smith@example.com','$2y$10$PFutkevLt/xf0rQcLGBndeUAENt0nnbSon.akXFivEZdUP9s/GGNO',0,'2015-06-26 12:45:18',1),
(9,0,'Brown','Lucy','lucy.brown@example.com','$2y$10$wCV6k6MJrrxVkO/sYKYmy.jK7bW/JBNYTUDP0ODzvdxv.C0sKTBqi',0,'2015-06-26 14:48:15',0),
(10,0,'Panini','Mario','mario.panini@example.com','$2y$10$Fj6jhuqUYiNVtmrY99gTU.8mQY7JpSXv2jT9IBU6espJwNtAtfvl6',0,'2015-06-26 15:36:13',0),
(11,10155778168000331,'Aly','Rodríguez','aly.heart@ymail.com','',0,'2015-06-29 13:15:56',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-06  7:27:16

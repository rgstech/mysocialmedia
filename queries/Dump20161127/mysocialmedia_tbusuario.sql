-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mysocialmedia
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuario` (
  `usu_pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_login` varchar(25) NOT NULL,
  `usu_senha` varchar(16) NOT NULL,
  `usu_nome` varchar(150) NOT NULL,
  `usu_email` varchar(45) DEFAULT NULL,
  `usu_tel` varchar(25) DEFAULT NULL,
  `usu_img` varchar(45) DEFAULT NULL,
  `usu_dt_cad` datetime DEFAULT NULL,
  `usu_sexo` char(1) DEFAULT NULL,
  PRIMARY KEY (`usu_pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'rodrigo','123','Rodrigo O.','rodrigo@email.net','7188888888','images/rod.jpg','2016-11-18 00:00:00','m'),(2,'usuario','123','Manolo da Silva','manolo@email.net','799999999','images/manolo.jpg','2016-11-18 00:00:00','m'),(3,'Rachel','123','Rachel Lawrence','rachel@email.net','796666666','images/rachel.jpg','2016-11-18 00:00:00','f'),(4,'jessica','123','Jessica Wauters','jessica@myemail.net','7177889900','images/jessica.jpg','2016-11-26 00:00:00','f'),(5,'inna','123','Elena Alexandra ','inna@email.net','7188997766','images/inna.jpg','2016-11-26 00:00:00','f');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-27 23:14:32

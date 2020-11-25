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
-- Table structure for table `tbcomment`
--

DROP TABLE IF EXISTS `tbcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcomment` (
  `com_pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_fk_usu` int(11) DEFAULT NULL,
  `com_fk_pst` int(11) DEFAULT NULL,
  `com_text` varchar(250) DEFAULT NULL,
  `com_dt_com` datetime DEFAULT NULL,
  PRIMARY KEY (`com_pk_id`),
  KEY `com_fk_usu_idx` (`com_fk_usu`),
  KEY `com_fk_pst_idx` (`com_fk_pst`),
  CONSTRAINT `com_fk_pst` FOREIGN KEY (`com_fk_pst`) REFERENCES `tbpost` (`pst_pk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `com_fk_usu` FOREIGN KEY (`com_fk_usu`) REFERENCES `tbusuario` (`usu_pk_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcomment`
--

LOCK TABLES `tbcomment` WRITE;
/*!40000 ALTER TABLE `tbcomment` DISABLE KEYS */;
INSERT INTO `tbcomment` VALUES (27,3,5,'quem é essa menina bonita aí =P','2016-11-25 14:37:59'),(28,3,5,' ','2016-11-25 14:37:59'),(29,3,5,' aaaaaaa bbbbb ccccc','2016-11-25 14:38:30'),(35,1,5,' testando....','2016-11-27 20:03:56'),(36,1,5,'teste teste teste','2016-11-27 21:41:33');
/*!40000 ALTER TABLE `tbcomment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-27 23:14:31

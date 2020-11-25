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
-- Table structure for table `tblike`
--

DROP TABLE IF EXISTS `tblike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblike` (
  `lik_pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `lik_fk_post` int(11) DEFAULT NULL,
  `lik_fk_usu` int(11) DEFAULT NULL,
  `lik_fk_com` int(11) DEFAULT NULL,
  PRIMARY KEY (`lik_pk_id`),
  KEY `lik_fk_post_idx` (`lik_fk_post`),
  KEY `lik_fk_usu_idx` (`lik_fk_usu`),
  KEY `lik_fk_com_idx` (`lik_fk_com`),
  CONSTRAINT `lik_fk_com` FOREIGN KEY (`lik_fk_com`) REFERENCES `tbcomment` (`com_pk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lik_fk_post` FOREIGN KEY (`lik_fk_post`) REFERENCES `tbpost` (`pst_pk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lik_fk_usu` FOREIGN KEY (`lik_fk_usu`) REFERENCES `tbusuario` (`usu_pk_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblike`
--

LOCK TABLES `tblike` WRITE;
/*!40000 ALTER TABLE `tblike` DISABLE KEYS */;
INSERT INTO `tblike` VALUES (84,NULL,3,28),(85,6,3,NULL),(86,5,4,NULL),(87,6,1,NULL),(88,5,1,NULL),(89,NULL,1,28),(91,10,1,NULL),(92,NULL,1,35),(93,NULL,1,29),(94,NULL,1,36),(96,5,5,NULL),(97,11,1,NULL),(98,9,1,NULL),(99,9,2,NULL),(100,6,2,NULL),(101,5,2,NULL),(102,11,2,NULL);
/*!40000 ALTER TABLE `tblike` ENABLE KEYS */;
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

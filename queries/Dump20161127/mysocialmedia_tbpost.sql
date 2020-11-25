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
-- Table structure for table `tbpost`
--

DROP TABLE IF EXISTS `tbpost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpost` (
  `pst_pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `pst_fk_usu` int(11) DEFAULT NULL,
  `pst_text` varchar(250) DEFAULT NULL,
  `pst_dt_pst` datetime DEFAULT NULL,
  PRIMARY KEY (`pst_pk_id`),
  KEY `pst_fk_usu_idx` (`pst_fk_usu`),
  CONSTRAINT `pst_fk_usu` FOREIGN KEY (`pst_fk_usu`) REFERENCES `tbusuario` (`usu_pk_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpost`
--

LOCK TABLES `tbpost` WRITE;
/*!40000 ALTER TABLE `tbpost` DISABLE KEYS */;
INSERT INTO `tbpost` VALUES (5,3,'Bom dia queridossss =)) S2 S2','2016-11-25 14:36:34'),(6,1,'  fala gata! XD','2016-11-25 14:39:35'),(9,2,' Oia eu aqui pra fazer manolagem! =P','2016-11-26 02:04:58'),(10,5,'  To na area! Kisses =****','2016-11-26 02:06:03'),(11,4,'E ai gente como foi o evento ontem? ^^','2016-11-26 02:07:00');
/*!40000 ALTER TABLE `tbpost` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-27 23:14:30

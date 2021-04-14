-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: roteirizador
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `rotas`
--

DROP TABLE IF EXISTS `rotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroPedagio` int(11) DEFAULT NULL,
  `gastoPedagio` float DEFAULT NULL,
  `descricaoRota` varchar(45) DEFAULT NULL,
  `REGIAO_id` int(11) DEFAULT NULL,
  `ativoInativo` varchar(3) DEFAULT NULL,
  `dataInativacao` varchar(25) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ROTA_REGIAO1_idx` (`REGIAO_id`),
  CONSTRAINT `fk_ROTA_REGIAO1` FOREIGN KEY (`REGIAO_id`) REFERENCES `regioes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rotas`
--

LOCK TABLES `rotas` WRITE;
/*!40000 ALTER TABLE `rotas` DISABLE KEYS */;
INSERT INTO `rotas` VALUES (1,100,70,'Sul',NULL,'1',NULL,'2021-01-19 17:13:27',NULL,'2021-01-19 17:13:27'),(2,10,100,'Centro',NULL,'1',NULL,'2021-01-19 13:28:33','2020-12-22 02:54:33','2021-01-19 13:28:33'),(3,10,200,'Centro',NULL,'0',NULL,'2021-01-19 17:46:38','2021-01-19 17:46:31','2021-01-19 17:46:38'),(4,10,200,'Metropolitana',NULL,'0',NULL,'2021-01-19 19:14:28','2021-01-19 17:46:52','2021-01-19 19:14:28'),(5,10,15,'Oeste',NULL,'1','2021-01-25 19:26:07','2021-01-25 19:27:40','2021-01-19 17:57:15','2021-01-25 19:27:40'),(6,10,10,'Centro',NULL,'0','2021-01-25 19:35:44','2021-01-25 19:35:51','2021-01-19 19:13:53','2021-01-25 19:35:51'),(10,10,1,'Centro',NULL,NULL,NULL,'2021-01-26 19:12:56','2021-01-26 19:12:56',NULL);
/*!40000 ALTER TABLE `rotas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-14 11:31:46

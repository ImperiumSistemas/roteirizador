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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codPedido` varchar(15) DEFAULT NULL,
  `codCliente` varchar(45) DEFAULT NULL,
  `nomePedido` varchar(45) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `cubagem` varchar(15) DEFAULT NULL,
  `valorPedido` varchar(10) DEFAULT NULL,
  `codFilial` varchar(15) DEFAULT NULL,
  `cargaErp` varchar(50) DEFAULT NULL,
  `codPraca` int(11) DEFAULT NULL,
  `dataPedido` varchar(10) DEFAULT NULL,
  `podeFormarCarga` varchar(1) DEFAULT NULL,
  `statusPedido` varchar(15) DEFAULT NULL,
  `ativoInativo` varchar(45) DEFAULT NULL,
  `dataInativacao` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `codCliente` (`codCliente`),
  KEY `codPraca` (`codPraca`),
  KEY `codFilial` (`codFilial`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (4,'1515','1010','1010','1010','1010','1010','1010','1010',1010,'1010','s',NULL,'1','','2021-03-09 17:32:55','2021-03-16 13:43:11'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-03-09 17:34:05','2021-03-09 17:34:05'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-03-09 17:34:17','2021-03-09 17:34:17'),(7,'5050','1010','1010','1010','1010','1010','1010','1010',1010,'1010','s',NULL,'1','','2021-03-09 17:37:19','2021-03-09 17:37:26');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-16 11:35:19

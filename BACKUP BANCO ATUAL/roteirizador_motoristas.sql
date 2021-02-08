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
-- Table structure for table `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motoristas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(20) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `numero_cnh` varchar(45) DEFAULT NULL,
  `data_validade_cnh` date DEFAULT NULL,
  `tipo_contrato` varchar(20) DEFAULT NULL,
  `PESSOAS_id` int(11) DEFAULT NULL,
  `ativoInativo` varchar(3) DEFAULT NULL,
  `dataInativacao` varchar(25) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_MOTORISTAS_PESSOAS1_idx` (`PESSOAS_id`),
  CONSTRAINT `fk_MOTORISTAS_PESSOAS1` FOREIGN KEY (`PESSOAS_id`) REFERENCES `pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motoristas`
--

LOCK TABLES `motoristas` WRITE;
/*!40000 ALTER TABLE `motoristas` DISABLE KEYS */;
INSERT INTO `motoristas` VALUES (10,'116.834.076-44','Anderson','2020-10-20','3155111211','2121','2021-10-10','2',NULL,'0','2021-02-04 15:53:05','2021-02-04 17:00:31','2021-02-03 19:35:14','2021-02-04 17:00:31'),(11,'116.834.076-44','Anderson','2020-10-10','3155111211','11212558','2021-10-10','1',NULL,'1','','2021-02-04 19:33:07','2021-02-04 19:32:28',NULL);
/*!40000 ALTER TABLE `motoristas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-08 16:39:13

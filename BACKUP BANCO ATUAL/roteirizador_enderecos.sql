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
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `PESSOAS_id` int(11) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `confirmado` varchar(45) DEFAULT NULL,
  `ativoInativo` varchar(2) DEFAULT NULL,
  `dataInativacao` varchar(25) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (23,'eteste','teste','222','Betim','32681592','MG','Brasil',5,'-19.9421647','-44.1303903',NULL,NULL,NULL,'2021-03-11 15:15:11','2021-03-03 17:38:50'),(24,'GG','Monte','1','Contagem','32285080','MG','Brasil',7,'-19.9414565','-44.0627256',NULL,NULL,NULL,'2021-03-11 15:14:37','2021-03-03 17:49:21'),(25,'Rua Campo Formoso','Funcionarios','Rua Campo Formoso','BETIM','32285080','Mg','Brasil',32,NULL,NULL,NULL,NULL,NULL,'2021-03-03 17:52:12','2021-03-03 17:52:12'),(26,'Campo Formoso','JD','Campo Formoso','Betim','32681592','Mg','Brasil',34,NULL,NULL,NULL,NULL,NULL,'2021-03-03 17:55:22','2021-03-03 17:55:22'),(27,'Campo Formoso','Bairro','Campo Formoso','Betim','32681592','Estado','Brasil',35,NULL,NULL,NULL,NULL,NULL,'2021-03-03 17:56:10','2021-03-03 17:56:10'),(28,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-19.9466605','-44.0686908',NULL,NULL,NULL,'2021-03-05 14:48:26','2021-03-05 14:48:26'),(30,'Rua caparao','Monte castelo','282','Contagem','32285080','MG','Brasil',36,'-19.945','-44.070',NULL,NULL,NULL,'2021-03-05 18:53:56','2021-03-05 18:48:28'),(31,'Teste','JD','1010','Betim',NULL,'MG','Brasil',37,NULL,NULL,NULL,NULL,NULL,'2021-03-08 13:26:06','2021-03-08 13:26:06'),(32,'888','888','888','888',NULL,'888','888',38,NULL,NULL,NULL,NULL,NULL,'2021-03-08 13:28:58','2021-03-08 13:28:58'),(33,'88','888','888','888',NULL,'888','888',39,NULL,NULL,NULL,NULL,NULL,'2021-03-08 13:30:25','2021-03-08 13:30:25'),(34,'10','10','10','10',NULL,'10','10',40,NULL,NULL,NULL,NULL,NULL,'2021-03-08 13:32:41','2021-03-08 13:32:41'),(35,'1010','1010','1010','1010',NULL,'1010','1010',41,NULL,NULL,NULL,NULL,NULL,'2021-03-08 13:38:32','2021-03-08 13:38:32'),(36,'1010','1010','1010','1010',NULL,'1010','1010',42,NULL,NULL,NULL,NULL,NULL,'2021-03-08 14:10:49','2021-03-08 14:10:49'),(37,'7','7','7','7',NULL,'7','7',43,NULL,NULL,NULL,NULL,NULL,'2021-03-08 14:27:33','2021-03-08 14:27:33'),(38,'88','88','88','88','32681592','88','88',44,'-19.9507977','-44.1181594',NULL,NULL,NULL,'2021-03-08 17:13:46','2021-03-08 14:29:57'),(39,'111','11','11','11','32681592','MG','Brasil',45,'-19.9487807','-44.1079885',NULL,NULL,NULL,'2021-03-12 15:56:06','2021-03-12 15:53:06'),(40,'111','11','11','11',NULL,'MG','Brasil',46,NULL,NULL,NULL,NULL,NULL,'2021-03-12 15:53:06','2021-03-12 15:53:06'),(41,'Rua maria de Lurdes','Novo Horizonte','545','Betim','32606108','MG','Brasil',47,'-19.9429252','-44.2007845',NULL,NULL,NULL,'2021-03-21 23:04:59','2021-03-21 22:58:44'),(42,'999','999','999','999',NULL,'999','999',48,NULL,NULL,NULL,NULL,NULL,'2021-04-08 15:34:40','2021-04-08 15:34:40'),(43,'999','999','999','999',NULL,'999','999',49,NULL,NULL,NULL,NULL,NULL,'2021-04-08 15:47:07','2021-04-08 15:47:07'),(44,'Teste','JD','597','Betim',NULL,'MG','32681592',50,NULL,NULL,NULL,NULL,NULL,'2021-04-08 16:42:27','2021-04-08 16:42:27'),(45,'Teste','555','555','555',NULL,'555','32681592',51,NULL,NULL,NULL,'1',NULL,'2021-04-08 16:54:44','2021-04-08 16:54:44'),(46,'Campo Formoso','Jardim Teresopolis','Campo Formoso','Betim',NULL,'MG','32681592',52,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:02:05','2021-04-08 17:02:05'),(47,'Campo Formoso','Tere','Campo Formoso','Betim',NULL,'MG','32681592',53,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:03:53','2021-04-08 17:03:53'),(48,'Campo Formoso','Jardim Teresopolis','Campo Formoso','Betim',NULL,'MG','32681592',54,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:04:31','2021-04-08 17:04:31'),(49,'99','99','99','99',NULL,'99','32681592',55,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:10:16','2021-04-08 17:10:16'),(50,'99','99','99','99','32681592','99','99',56,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:16:40','2021-04-08 17:16:40'),(51,'99','99','99','99','32681592','99','99',57,NULL,NULL,NULL,'1',NULL,'2021-04-08 17:17:16','2021-04-08 17:17:16');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-14 11:31:52

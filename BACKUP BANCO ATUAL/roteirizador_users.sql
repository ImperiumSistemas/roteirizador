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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idNivelAcesso` int(15) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Anderson','anderson@anderson.com.br','$2y$10$Wah7pab5I2TqOd0Wr3fZMOaL9M3xaGG1.QlecBNNioq84ylrn9AL.',NULL,'LzZHuo2sVgHD0fa7WlAcEOFg12RXIFe6MejyxM0FEcqnKSGZfGcwH1VIDoJK','2021-02-04 22:26:20','2021-02-04 22:26:20'),(2,'Imperium','imperium@imperium.com.br','$2y$10$C/9WSRDgZUWrSiNzOvARief474AL5PPOb1Ytw/vNdFUt/1wrI3wh.',NULL,'bvhDERuvgJ4NZvSvRHIe6zSUYDyn6nNrmcpyFvmRJDorFAgDwz6RBWOmMBKB','2021-02-08 22:28:50','2021-02-08 22:28:50'),(3,'Anderson','anderson@anderson.com','$2y$10$wJwcJZj0VDutzxE1jGrn5O3S0XnAh2.uxUaPqjAKgIWmbv8hoEltS',NULL,'YbFWSXCQB92OxCFrRamyVuCadWGXvp6mfRTMpuIs9ely1tAGwgKssUf5onUD','2021-02-24 19:34:48','2021-02-24 19:34:48'),(4,'Anderson Alves','anderson123@gmail.com','$2y$10$4H8IRyHdl74CgQDQqLwasuPjHGqkVxqbMwnpIwq55Oy69Px4bPtOa',NULL,NULL,'2021-03-10 15:23:23','2021-03-10 15:23:23'),(5,'Anderson Alves','a@a.com.br','$2y$10$VvzOYQVXogCpKrDEnE6wWOuCaxR3pEwAeUSIeUuCeaPGWCDKvcOZ2',NULL,NULL,'2021-03-15 16:46:06','2021-03-15 16:46:06'),(9,'Anderson Alves Antunes','teste@teste.com.br','$2y$10$Ncf.QhkCERXAlkeklWLPQ.lEZNEsnAbsPcA1YnWbPkGlIgZmUKeWW',3,'BS5T13ymiFclXf30WrkEW614yAlbqmuPGCIlqQmVJNLTDz3l9Pgr21IHXpo5','2021-03-18 18:55:21','2021-03-18 18:55:21');
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

-- Dump completed on 2021-03-19 10:00:09

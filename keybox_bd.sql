-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gabriel
-- ------------------------------------------------------
-- Server version	8.4.0

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
-- Table structure for table `chave`
--

DROP TABLE IF EXISTS `chave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chave` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `numero` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chave`
--

LOCK TABLES `chave` WRITE;
/*!40000 ALTER TABLE `chave` DISABLE KEYS */;
INSERT INTO `chave` VALUES (1,'lab maker','1'),(2,'sala do gestor','2'),(3,'Biblioteca','3'),(4,'cozinha','4'),(5,'secretaria','5'),(6,'auditorio grande','6');
/*!40000 ALTER TABLE `chave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `func`
--

DROP TABLE IF EXISTS `func`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `func` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `cod_tip_func` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cod_tip_func` (`cod_tip_func`),
  CONSTRAINT `fk_cod_tip_func` FOREIGN KEY (`cod_tip_func`) REFERENCES `tipo_funcionario` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `func`
--

LOCK TABLES `func` WRITE;
/*!40000 ALTER TABLE `func` DISABLE KEYS */;
INSERT INTO `func` VALUES (1,'Vinicius','example@gmail.com',1,''),(2,'Gilberto','example@gmail.com',2,''),(3,'Renata','example@gmail.com',3,''),(4,'Jeine','example@gmail.com',4,'');
/*!40000 ALTER TABLE `func` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_emp` timestamp NULL DEFAULT NULL,
  `data_dev` timestamp NULL DEFAULT NULL,
  `id_chave` int DEFAULT NULL,
  `id_func` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_chave` (`id_chave`),
  KEY `fk_id_func` (`id_func`),
  CONSTRAINT `fk_id_chave` FOREIGN KEY (`id_chave`) REFERENCES `chave` (`id`),
  CONSTRAINT `fk_id_func` FOREIGN KEY (`id_func`) REFERENCES `func` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (2,'2024-06-26 12:19:55','2024-12-04 18:37:31',1,1),(3,'2024-06-26 12:20:40',NULL,1,1),(5,'2024-06-26 15:08:55',NULL,6,1),(6,'2024-06-26 15:14:13',NULL,6,1),(7,'2024-06-26 15:14:13','2024-12-04 18:37:24',1,2),(8,'2024-06-26 15:14:13','2024-12-04 18:37:30',2,2),(9,'2024-06-26 15:14:13','2024-06-26 15:14:13',3,2),(10,'2024-06-26 15:14:13','2024-06-26 15:14:13',4,2),(11,'2024-06-26 15:14:13','2024-06-26 15:14:13',5,2),(12,'2024-06-26 15:14:13','2024-06-26 15:14:13',6,2),(13,'2024-06-26 15:14:13','2024-06-26 15:14:13',4,4),(14,'2024-06-26 15:14:13','2024-06-26 15:14:13',1,3),(15,'2024-06-26 15:14:13','2024-06-26 15:14:13',2,3),(16,'2024-06-26 15:14:13','2024-06-26 15:14:13',3,3),(17,'2024-06-26 15:14:13','2024-06-26 15:14:13',4,3),(18,'2024-06-26 15:14:13','2024-06-26 15:14:13',5,3),(19,'2024-06-26 15:14:13','2024-06-26 15:14:13',6,3),(20,'2024-11-29 14:42:00','2024-11-29 14:42:00',1,1);
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_funcionario`
--

DROP TABLE IF EXISTS `tipo_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_funcionario` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `tip_func` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_funcionario`
--

LOCK TABLES `tipo_funcionario` WRITE;
/*!40000 ALTER TABLE `tipo_funcionario` DISABLE KEYS */;
INSERT INTO `tipo_funcionario` VALUES (1,'Professores'),(2,'Faxineiro'),(3,'coordenador'),(4,'bibliotecaria');
/*!40000 ALTER TABLE `tipo_funcionario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-09 14:06:04

/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.6.2-MariaDB, for osx10.19 (arm64)
--
-- Host: localhost    Database: empresa_4
-- ------------------------------------------------------
-- Server version	11.6.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `conceptos_cotizacion`
--

DROP TABLE IF EXISTS `conceptos_cotizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conceptos_cotizacion` (
  `id_ConceptosCotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cotizacion2` int(11) NOT NULL,
  `total_concepto` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_ConceptosCotizacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conceptos_cotizacion`
--

LOCK TABLES `conceptos_cotizacion` WRITE;
/*!40000 ALTER TABLE `conceptos_cotizacion` DISABLE KEYS */;
INSERT INTO `conceptos_cotizacion` VALUES
(1,1,700.00),
(2,2,500.00),
(3,3,700.00),
(4,4,500.00),
(5,5,700.00);
/*!40000 ALTER TABLE `conceptos_cotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizacion4`
--

DROP TABLE IF EXISTS `cotizacion4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizacion4` (
  `id_cotizacion2` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cotizacion2`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacion4`
--

LOCK TABLES `cotizacion4` WRITE;
/*!40000 ALTER TABLE `cotizacion4` DISABLE KEYS */;
INSERT INTO `cotizacion4` VALUES
(1),
(2),
(3),
(4),
(5);
/*!40000 ALTER TABLE `cotizacion4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas4`
--

DROP TABLE IF EXISTS `ventas4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas4` (
  `id_ventas4` int(11) NOT NULL AUTO_INCREMENT,
  `id_cotizacion2` int(11) NOT NULL,
  PRIMARY KEY (`id_ventas4`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas4`
--

LOCK TABLES `ventas4` WRITE;
/*!40000 ALTER TABLE `ventas4` DISABLE KEYS */;
INSERT INTO `ventas4` VALUES
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);
/*!40000 ALTER TABLE `ventas4` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-02-11 14:08:34

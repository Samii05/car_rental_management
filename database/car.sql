-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: car
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `immat` char(100) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `priceByDay` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`immat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES ('000001','FORD','focus','25000'),('000002','WOLKWAGEN','Touran','4500'),('000003','WOLKWAGEN','golf','4500'),('000004','MERCEDES','E-Class','4000000'),('000005','AUDI','Q5','2000000'),('000006','AUDI','Q3','550000'),('000007','SEAT','Ibiza','2000'),('000008','SEAT','leon','1500'),('000009','Toyota','corolla','4500'),('000010','Toyota','camry','502000'),('000011','MERCEDES','C-Class','25000'),('000012','FORD','Mondeo','25000'),('000013','AUDI','R8','2500000'),('000014','Peugeot','2008','250000'),('000015','Peugeot','2007','2500'),('000016','Peugeot','2006','2555'),('000017','Peugeot','3008','28000500'),('000018','RENAULT','Austral','5000000'),('000019','RENAULT','Captur','280050'),('000020','AUDI','Q6','2500000'),('000021','FIAT','500','2500'),('000022','FIAT','Palio','5000'),('000023','RENAULT','Arkana','5000000'),('000024','PEUGEOT','508','370000'),('000025','CITROEN','C4','5000'),('000026','KIA','Besta','70000'),('000027','VOLKSWAGEN','Amarok','500000'),('000028','CITROEN','Ami','27000'),('000029','CITROEN','Berlingo','25000.0'),('000030','KIA','Carnival','450000'),('000031','KIA','Cee','76000'),('000032','RENAULT','Symbol','6500'),('000033','ll','jj','788'),('000034','AUDI','Q3','70000'),('000035','BMW','extra','254555');
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `idClient` varchar(10) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `phone` char(10) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `job` varchar(20) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('000001','Ahmed','Benaouda','0555555555','bougara','elharrach','student'),('000002','Omar','Merazka','0777777777','ali koudja','kouba','teacher'),('000003','Hassiba','Hadji','0666555555','boumendjal','achour','engineer'),('000004','Hocine','Benchikou','0775588555','benboulaid','tamanrasset','engineer'),('000005','Fatima','Nafaa','0675558515','amirouche','benaknoun','student'),('000006','Ali','Baba ali','0555552345','boudiaf','bouzarea','student'),('000007','Amar','Mansouri','0655765555','benMhidi','bouzarea','student'),('000008','Malika','Lounes','0555555555','Didouche','bordj elkiffan','teacher'),('000009','Hocine','Haniche','0555554321','amirouche','bab ezzouar','student'),('000010','Khadidja','Boudraa','0665555555','Abane Ramdane','oued smar','teacher'),('000011','Bilal','Tama','0566665577','krim belcassem','tamanrasset','student'),('000012','Ali','Messili','0775576555','Chaabani','biskra','lawyer'),('000013','Ahmed','Meridja','0578888887','laarbaa nath irathen','Tizi ouzou','Etudiant'),('000014','Fares','Mebarki','0777586777','Castors','Rouiba','Dentiste'),('000015','Sami','Rezig','0578945623','Ahmed zabana','Reghaia','Boulanger'),('000016','Ramy','Aksil','07849555','Tirouche Mourad','El-Harrach','Student'),('000017','Fares','Rezig','0755555555','Ferradj','Rouiba','Etudiant'),('000018','Hadil','Oucina','0778884597','palmiers','souidania','student'),('000019','Malik','LAKEB','0541884804','13 Rue Ahmed ZABANA Reghaia','Alger','Etudiant'),('000020','Ahlem','LAIB','0541884807','15 Rue BENDIAF Cheraga','Alger','Etudiant'),('000021','Kamer','MERAZKA','0551119803','10 Rue de la liberté Draria','Alger','Dentiste'),('000022','Djalel','MEKKI','0661119803','15 Rue Dahleb Achour','Alger','Bijoutier'),('000023','Salem','AKSIL','0668795248','14 Rue Feradj et Zabani Rouiba','Alger','Etudiant'),('000024','Hala','DJAFAR','0798885467','Boulevard des martyrs','Alger','Architecte'),('000025','Saber','ALIOUAT','0541778975','17 Rue Bitate Douira','Alger','Peintre'),('000026','Linda','MAKHLOUF','0547115987','17 Rue Ben Mhidi','Alger ','Patissiere');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rental`
--

DROP TABLE IF EXISTS `rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rental` (
  `rentalID` int NOT NULL AUTO_INCREMENT,
  `locDate` date NOT NULL,
  `sDate` date NOT NULL,
  `eDate` date NOT NULL,
  `rentalType` char(2) NOT NULL,
  `immat` char(10) NOT NULL,
  `idClient` varchar(10) NOT NULL,
  PRIMARY KEY (`rentalID`),
  KEY `immat` (`immat`),
  KEY `idClient` (`idClient`),
  CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`immat`) REFERENCES `car` (`immat`),
  CONSTRAINT `rental_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rental`
--

LOCK TABLES `rental` WRITE;
/*!40000 ALTER TABLE `rental` DISABLE KEYS */;
INSERT INTO `rental` VALUES (1,'2021-03-20','2021-03-23','2021-03-25','ND','000003','000006'),(2,'2021-03-20','2021-03-23','2021-03-25','ND','000001','000002'),(3,'2021-03-20','2021-03-23','2021-03-25','WD','000002','000003'),(4,'2021-03-20','2021-03-23','2021-03-25','ND','000003','000005'),(5,'2021-03-20','2021-03-23','2021-03-25','ND','000005','000006'),(6,'2021-03-20','2021-03-23','2021-03-25','WD','000007','000002'),(7,'2020-03-20','2021-01-23','2021-04-25','WD','000008','000007'),(8,'2021-03-20','2021-02-23','2021-05-25','WD','000005','000003'),(9,'2021-03-20','2020-03-23','2021-04-25','ND','000003','000009'),(10,'2021-03-20','2020-04-23','2020-06-25','WD','000004','000010'),(11,'2021-04-20','2021-03-23','2021-05-29','ND','000007','000004'),(12,'2021-04-20','2021-03-23','2021-05-29','ND','000004','000004'),(13,'2021-04-20','2021-03-23','2021-05-29','ND','000010','000004'),(14,'2021-04-20','2021-03-23','2021-05-29','ND','000004','000004'),(15,'2021-04-20','2021-03-23','2021-05-29','ND','000004','000004'),(16,'2020-03-20','2020-04-23','2020-06-25','ND','000008','000007'),(17,'2020-03-20','2020-04-23','2020-06-25','ND','000012','000012'),(18,'2021-03-20','2021-03-23','2021-03-25','ND','000012','000002'),(19,'2021-04-20','2021-04-23','2021-05-25','ND','000011','000004'),(20,'2021-03-20','2021-03-23','2021-03-25','WD','000001','000003'),(21,'2021-01-20','2021-02-23','2021-03-25','WD','000004','000003'),(22,'2021-02-12','2021-02-23','2021-03-25','WD','000008','000003'),(23,'2021-04-20','2021-04-23','2021-03-25','WD','000010','000003'),(24,'2021-04-20','2021-04-23','2021-04-24','WD','000012','000011'),(27,'2022-02-05','2022-02-10','2022-02-20','ND','000011','000003'),(28,'2022-02-05','2022-02-10','2022-02-20','ND','000011','000003'),(29,'2022-02-05','2022-02-10','2022-02-20','ND','000011','000003'),(30,'2022-02-05','2022-02-10','2024-05-17','ND','000011','000003'),(31,'2024-05-06','2024-05-07','2024-05-10','ND','000010','000017'),(32,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(33,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(34,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(35,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(36,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(37,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(38,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(39,'2024-05-17','2024-05-21','2024-05-28','ND','000011','000013'),(40,'2024-05-17','2024-05-21','2024-05-29','ND','000011','000013'),(42,'2024-05-18','2024-05-19','2024-05-21','ND','000014','000004'),(43,'2024-05-18','2024-05-19','2024-05-21','ND','000014','000004'),(44,'2024-05-18','2024-05-19','2024-05-22','ND','000014','000004'),(45,'2024-05-20','2024-05-22','2024-05-25','WD','000009','000016'),(46,'2024-05-31','2024-06-03','2024-06-09','ND','000027','000017'),(53,'2024-05-21','2024-05-21','2024-05-23','WD','000008','000012'),(54,'2024-05-21','2024-05-22','2024-05-27','ND','000008','000001'),(57,'2024-05-04','2024-05-23','2024-05-25','ND','000015','000004'),(58,'2024-05-21','2024-05-22','2024-05-25','ND','000018','000007');
/*!40000 ALTER TABLE `rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale` (
  `idClient` varchar(10) NOT NULL,
  `immat` char(10) NOT NULL,
  `salePrice` float NOT NULL,
  `saleDate` date DEFAULT NULL,
  PRIMARY KEY (`idClient`,`immat`),
  KEY `immat` (`immat`),
  CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`immat`) REFERENCES `car` (`immat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES ('000001','000002',58000,'2024-05-29'),('000001','000010',4700000,'2024-05-30'),('000001','000024',25000,'2024-05-28'),('000002','000008',47000,'2024-05-24'),('000002','000020',580000,'2024-05-19'),('000003','000005',580000,'2024-05-15'),('000003','000006',580000,'2024-05-15'),('000003','000018',258000,'2024-05-22'),('000012','000009',250654,'2024-05-17');
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-16 22:45:18

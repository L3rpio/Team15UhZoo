-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: zoodbteam15-server.mysql.database.azure.com    Database: uh_zoo
-- ------------------------------------------------------
-- Server version	5.6.47.0

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(1) NOT NULL,
  `species` varchar(50) DEFAULT NULL,
  `enclosure_num` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `enclosure_num` (`enclosure_num`),
  CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`enclosure_num`) REFERENCES `enclosure` (`enclosure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'M','Cougar',1),(2,'F','Cougar',1),(3,'M','Cougar',1),(4,'F','Cougar',1),(5,'M','Cougar',1);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `user_name` varchar(500) DEFAULT NULL,
`email` varchar(255) DEFAULT NULL,
  `pass_word` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Renu','Khator','renu01','go cougars'),(2,'James','Harden','james01','wetherockets');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_first_name` varchar(500) NOT NULL,
  `employee_last_name` varchar(500) NOT NULL,
  `employee_Address` varchar(1000) NOT NULL,
  `employee_email` varchar(500) NOT NULL,
  `hourly_wage` decimal(6,2) NOT NULL,
  `workplace_id` int(11) DEFAULT '9',
  `user_name` varchar(500) NOT NULL DEFAULT 'tempuser123',
  `pass_word` varchar(500) NOT NULL DEFAULT 'pass123',
  `hours_worked` int(11) DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `paycheck` int(11) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `workplace_id` (`workplace_id`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`workplace_id`) REFERENCES `workplace` (`workplace_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'John','Doe','1234 Main St.','jdoe@gmail.com',20.00,1,'jdoe123','iloveanimals321',NULL,NULL,NULL),(2,'Emily','Smith','4561 Gessner Ave.','emilysmith@gmail.com',22.00,2,'emilysmi777','generalkenobi54',NULL,NULL,NULL),(3,'Angel','Vu','8575 Old Lincoln','avu45@gmail.com',21.00,3,'avu098','iamtheimposter57',NULL,NULL,NULL),(4,'Mike','Donover','8575 Beaumont Ct.','mikedonover43@gmail.com',22.00,4,'donover.mike@gmail.com','Dragon12',1,NULL,NULL),(5,'Keith','Keyes','117 Reach St.','kkeyes117@gmail.com',15.50,2,'commanderkeyes117','imissreach117',2,NULL,NULL),(6,'Carlos','Molina','123 Something St.','carlos@uh.edu',21.00,3,'user123','f6f0c85fba59f38863dfb7ffd38d8f17',0,'pexels-mohamed-abdelghaffar-771742.jpg',NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enclosure`
--

DROP TABLE IF EXISTS `enclosure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enclosure` (
  `enclosure_id` int(11) NOT NULL AUTO_INCREMENT,
  `exhibit_name` varchar(50) NOT NULL,
  `species_kept` varchar(50) NOT NULL,
  `expense` decimal(10,0) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`enclosure_id`),
  KEY `work_id` (`work_id`),
  CONSTRAINT `enclosure_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `workplace` (`workplace_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enclosure`
--

LOCK TABLES `enclosure` WRITE;
/*!40000 ALTER TABLE `enclosure` DISABLE KEYS */;
INSERT INTO `enclosure` VALUES (1,'Shasta and Friends','Cougar',0,1),(2,'Tiger\'s Den','Bengal Tiger',0,4);
/*!40000 ALTER TABLE `enclosure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_item`
--

DROP TABLE IF EXISTS `food_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food_item` (
  `cost` decimal(10,0) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `served_by` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  KEY `served_by` (`served_by`),
  KEY `order_num` (`order_num`),
  CONSTRAINT `food_item_ibfk_1` FOREIGN KEY (`served_by`) REFERENCES `food_service` (`service_id`),
  CONSTRAINT `food_item_ibfk_2` FOREIGN KEY (`order_num`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_item`
--

LOCK TABLES `food_item` WRITE;
/*!40000 ALTER TABLE `food_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_service`
--

DROP TABLE IF EXISTS `food_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `food_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `expense` decimal(10,0) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `work_id` (`work_id`),
  CONSTRAINT `food_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `workplace` (`workplace_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_service`
--

LOCK TABLES `food_service` WRITE;
/*!40000 ALTER TABLE `food_service` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(10,0) NOT NULL,
  `ordered_by` int(11) NOT NULL,
  `first_item` varchar(50) DEFAULT NULL,
  `second_item` varchar(50) DEFAULT NULL,
  `third_item` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `ordered_by` (`ordered_by`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ordered_by`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_of_purchase` date NOT NULL,
  `date_of_visit` date NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `bought_by` int(11) NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `bought_by` (`bought_by`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`bought_by`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workplace`
--

DROP TABLE IF EXISTS `workplace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workplace` (
  `workplace_id` int(11) NOT NULL AUTO_INCREMENT,
  `workplace_name` varchar(50) NOT NULL,
  `manager_id` int(11) NOT NULL,
  PRIMARY KEY (`workplace_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workplace`
--

LOCK TABLES `workplace` WRITE;
/*!40000 ALTER TABLE `workplace` DISABLE KEYS */;
INSERT INTO `workplace` VALUES (1,'Shasta and Friends',1),(2,'Dippin\' Dots',2),(3,'Shasta\'s Cones',3),(4,'Tiger\'s Den',4),(5,'Unassigned',0);
/*!40000 ALTER TABLE `workplace` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-14 10:56:05

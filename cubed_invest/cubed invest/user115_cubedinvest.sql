-- MySQL dump 10.15  Distrib 10.0.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: user115_cubedinvest
-- ------------------------------------------------------
-- Server version	10.0.26-MariaDB

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
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data` (
  `users` int(11) NOT NULL DEFAULT '0',
  `depozit` int(1) unsigned NOT NULL DEFAULT '0',
  `invest` int(1) unsigned NOT NULL DEFAULT '0',
  `payment` int(1) unsigned NOT NULL DEFAULT '0',
  `admin` varchar(255) NOT NULL DEFAULT 'admin',
  `name_project` varchar(255) NOT NULL DEFAULT 'demo',
  `free_referal` varchar(255) NOT NULL DEFAULT 'first',
  `depozit_min` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `depozit_max` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `payment_min` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `payment_max` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `percent_referal` int(5) unsigned NOT NULL DEFAULT '0',
  `percent` int(5) unsigned NOT NULL DEFAULT '0',
  `percent_admin` int(5) unsigned NOT NULL DEFAULT '0',
  `time_hour` int(2) unsigned NOT NULL DEFAULT '0',
  `start_data` varchar(255) NOT NULL DEFAULT '0',
  `fake_users` int(10) unsigned NOT NULL DEFAULT '0',
  `fake_invest` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `fake_payment` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `fake_online` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_phone` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL DEFAULT '',
  `group_vk` varchar(255) NOT NULL,
  PRIMARY KEY (`users`),
  KEY `users` (`users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data`
--

LOCK TABLES `data` WRITE;
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`users`, `depozit`, `invest`, `payment`, `admin`, `name_project`, `free_referal`, `depozit_min`, `depozit_max`, `payment_min`, `payment_max`, `percent_referal`, `percent`, `percent_admin`, `time_hour`, `start_data`, `fake_users`, `fake_invest`, `fake_payment`, `fake_online`, `admin_phone`, `admin_email`, `group_vk`) VALUES (0,0,0,0,'cubed24','Cubed24','first',10.00,10000.00,0.25,1000.00,10,50,8,24,'6.06.2016.12-00',1,241898.42,0.00,89,'cubed24','admin@Cubed24.com','https://vk.com/blitz_market');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depozit`
--

DROP TABLE IF EXISTS `depozit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depozit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `summa` decimal(10,2) unsigned NOT NULL,
  `summa_plus` decimal(10,2) unsigned NOT NULL,
  `date_start` int(11) unsigned NOT NULL,
  `date_end` int(11) unsigned NOT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depozit`
--

LOCK TABLES `depozit` WRITE;
/*!40000 ALTER TABLE `depozit` DISABLE KEYS */;
INSERT INTO `depozit` (`id`, `login`, `summa`, `summa_plus`, `date_start`, `date_end`, `status`) VALUES (1,'erfolg16',10.00,10.00,1464806480,1469990480,0),(2,'cubed24',0.01,0.01,1464815065,1469999065,0),(3,'cubed24',0.01,0.01,1464816193,1470000193,0),(4,'erfolg16',10.00,10.00,1464851371,1470035371,0),(5,'Globus',10.00,10.00,1464988996,1470172996,0),(6,'Ewald',10.00,10.00,1465417803,1470601803,0),(7,'Evgen',10.00,10.00,1465810365,1470994365,0);
/*!40000 ALTER TABLE `depozit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invest`
--

DROP TABLE IF EXISTS `invest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `summa` decimal(10,2) unsigned NOT NULL,
  `transfer` varchar(255) NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `plan_id` int(11) unsigned NOT NULL,
  `refer` varchar(255) NOT NULL,
  `refback` int(11) unsigned NOT NULL DEFAULT '0',
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  `pay_system` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invest`
--

LOCK TABLES `invest` WRITE;
/*!40000 ALTER TABLE `invest` DISABLE KEYS */;
INSERT INTO `invest` (`id`, `login`, `summa`, `transfer`, `date`, `plan_id`, `refer`, `refback`, `status`, `pay_system`) VALUES (44,'erfolg16',10.00,'',1464806448,4,'first',0,1,'Payeer'),(65,'Globus',10.00,'',1464988902,4,'erfolg16',0,1,'Payeer'),(67,'Ewald',10.00,'',1465417770,4,'Globus',0,1,'Payeer'),(68,'Evgen',100.00,'',1465494615,4,'first',0,1,'Payeer'),(69,'clickmonitoring',100.00,'',1465809465,4,'first',0,1,'Payeer'),(71,'Evgen',10.00,'',1465810161,4,'first',0,0,'Payeer'),(72,'Evgen',10.00,'',1465810228,4,'first',0,1,'Payeer'),(73,'Evgen',100.00,'',1465494615,4,'first',0,1,'Payeer'),(74,'clickmonitoring',10.00,'',1465830186,4,'first',0,0,'PerfectMoney'),(75,'admin',100.00,'',1466251430,4,'admin',0,0,'Payeer');
/*!40000 ALTER TABLE `invest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `full_news` text NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `online`
--

DROP TABLE IF EXISTS `online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `online` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `last_time` int(10) NOT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online`
--

LOCK TABLES `online` WRITE;
/*!40000 ALTER TABLE `online` DISABLE KEYS */;
/*!40000 ALTER TABLE `online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_methods`
--

DROP TABLE IF EXISTS `pay_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_methods` (
  `id` int(11) unsigned NOT NULL,
  `qiwi_inv_phone` varchar(255) NOT NULL,
  `qiwi_inv_password` varchar(255) NOT NULL,
  `payeer_account_number` varchar(255) NOT NULL,
  `payeer_shop` varchar(255) NOT NULL,
  `payeer_secret_key` varchar(255) NOT NULL,
  `payeer_api_id` varchar(255) NOT NULL,
  `payeer_api_key` varchar(255) NOT NULL,
  `payeer_val` varchar(255) NOT NULL,
  `perfect_money_api_id` varchar(255) NOT NULL,
  `perfect_money_account_number` varchar(255) NOT NULL,
  `perfect_money_api_pass` varchar(255) NOT NULL,
  `perfect_money_alt_phrase` varchar(255) NOT NULL,
  `perfect_money_val` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_methods`
--

LOCK TABLES `pay_methods` WRITE;
/*!40000 ALTER TABLE `pay_methods` DISABLE KEYS */;
INSERT INTO `pay_methods` (`id`, `qiwi_inv_phone`, `qiwi_inv_password`, `payeer_account_number`, `payeer_shop`, `payeer_secret_key`, `payeer_api_id`, `payeer_api_key`, `payeer_val`, `perfect_money_api_id`, `perfect_money_account_number`, `perfect_money_api_pass`, `perfect_money_alt_phrase`, `perfect_money_val`) VALUES (0,'7**********','********','P37687684','190463835','bU9rYisR4OR3I6U1jeLKl15vdcA987LJV76KB','190464944','wzY9kDNCnFATt3Q98nDCAk5bv7skSFB3ll8','USD','6449908','U11490196','Nosachuk1989','7LE5956omQDVKwZpFUieSsLig','USD');
/*!40000 ALTER TABLE `pay_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `summa` decimal(10,2) unsigned NOT NULL,
  `transfer` varchar(255) NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `status` int(1) unsigned NOT NULL,
  `pay_system` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL,
  `percent` float NOT NULL DEFAULT '0',
  `count` int(11) unsigned NOT NULL DEFAULT '1',
  `seconds` int(11) NOT NULL DEFAULT '1',
  `title` varchar(128) NOT NULL,
  `min` decimal(10,2) unsigned NOT NULL,
  `max` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` (`id`, `description`, `percent`, `count`, `seconds`, `title`, `min`, `max`) VALUES (4,'2.5% in day',2.5,60,86400,'Base',10.00,999.00),(5,'3% in day',3,60,86400,'Base*2',1000.00,10000.00);
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profit`
--

DROP TABLE IF EXISTS `profit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `depozit_id` int(11) unsigned NOT NULL,
  `date_end` int(11) unsigned NOT NULL,
  `summa` decimal(10,2) unsigned NOT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=421 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profit`
--

LOCK TABLES `profit` WRITE;
/*!40000 ALTER TABLE `profit` DISABLE KEYS */;
INSERT INTO `profit` (`id`, `login`, `depozit_id`, `date_end`, `summa`, `status`) VALUES (1,'erfolg16',1,1464892880,0.25,1),(2,'erfolg16',1,1464979280,0.25,1),(3,'erfolg16',1,1465065680,0.25,1),(4,'erfolg16',1,1465152080,0.25,1),(5,'erfolg16',1,1465238480,0.25,1),(6,'erfolg16',1,1465324880,0.25,1),(7,'erfolg16',1,1465411280,0.25,1),(8,'erfolg16',1,1465497680,0.25,1),(9,'erfolg16',1,1465584080,0.25,1),(10,'erfolg16',1,1465670480,0.25,1),(11,'erfolg16',1,1465756880,0.25,1),(12,'erfolg16',1,1465843280,0.25,1),(13,'erfolg16',1,1465929680,0.25,1),(14,'erfolg16',1,1466016080,0.25,1),(15,'erfolg16',1,1466102480,0.25,1),(16,'erfolg16',1,1466188880,0.25,1),(17,'erfolg16',1,1466275280,0.25,1),(18,'erfolg16',1,1466361680,0.25,1),(19,'erfolg16',1,1466448080,0.25,1),(20,'erfolg16',1,1466534480,0.25,1),(21,'erfolg16',1,1466620880,0.25,1),(22,'erfolg16',1,1466707280,0.25,1),(23,'erfolg16',1,1466793680,0.25,1),(24,'erfolg16',1,1466880080,0.25,1),(25,'erfolg16',1,1466966480,0.25,1),(26,'erfolg16',1,1467052880,0.25,1),(27,'erfolg16',1,1467139280,0.25,1),(28,'erfolg16',1,1467225680,0.25,1),(29,'erfolg16',1,1467312080,0.25,1),(30,'erfolg16',1,1467398480,0.25,1),(31,'erfolg16',1,1467484880,0.25,1),(32,'erfolg16',1,1467571280,0.25,1),(33,'erfolg16',1,1467657680,0.25,0),(34,'erfolg16',1,1467744080,0.25,0),(35,'erfolg16',1,1467830480,0.25,0),(36,'erfolg16',1,1467916880,0.25,0),(37,'erfolg16',1,1468003280,0.25,0),(38,'erfolg16',1,1468089680,0.25,0),(39,'erfolg16',1,1468176080,0.25,0),(40,'erfolg16',1,1468262480,0.25,0),(41,'erfolg16',1,1468348880,0.25,0),(42,'erfolg16',1,1468435280,0.25,0),(43,'erfolg16',1,1468521680,0.25,0),(44,'erfolg16',1,1468608080,0.25,0),(45,'erfolg16',1,1468694480,0.25,0),(46,'erfolg16',1,1468780880,0.25,0),(47,'erfolg16',1,1468867280,0.25,0),(48,'erfolg16',1,1468953680,0.25,0),(49,'erfolg16',1,1469040080,0.25,0),(50,'erfolg16',1,1469126480,0.25,0),(51,'erfolg16',1,1469212880,0.25,0),(52,'erfolg16',1,1469299280,0.25,0),(53,'erfolg16',1,1469385680,0.25,0),(54,'erfolg16',1,1469472080,0.25,0),(55,'erfolg16',1,1469558480,0.25,0),(56,'erfolg16',1,1469644880,0.25,0),(57,'erfolg16',1,1469731280,0.25,0),(58,'erfolg16',1,1469817680,0.25,0),(59,'erfolg16',1,1469904080,0.25,0),(60,'erfolg16',1,1469990480,0.25,0),(61,'cubed24',2,1464901465,0.00,1),(62,'cubed24',2,1464987865,0.00,1),(63,'cubed24',2,1465074265,0.00,1),(64,'cubed24',2,1465160665,0.00,1),(65,'cubed24',2,1465247065,0.00,1),(66,'cubed24',2,1465333465,0.00,1),(67,'cubed24',2,1465419865,0.00,1),(68,'cubed24',2,1465506265,0.00,1),(69,'cubed24',2,1465592665,0.00,1),(70,'cubed24',2,1465679065,0.00,1),(71,'cubed24',2,1465765465,0.00,1),(72,'cubed24',2,1465851865,0.00,1),(73,'cubed24',2,1465938265,0.00,1),(74,'cubed24',2,1466024665,0.00,1),(75,'cubed24',2,1466111065,0.00,1),(76,'cubed24',2,1466197465,0.00,1),(77,'cubed24',2,1466283865,0.00,1),(78,'cubed24',2,1466370265,0.00,1),(79,'cubed24',2,1466456665,0.00,1),(80,'cubed24',2,1466543065,0.00,1),(81,'cubed24',2,1466629465,0.00,1),(82,'cubed24',2,1466715865,0.00,1),(83,'cubed24',2,1466802265,0.00,1),(84,'cubed24',2,1466888665,0.00,1),(85,'cubed24',2,1466975065,0.00,1),(86,'cubed24',2,1467061465,0.00,1),(87,'cubed24',2,1467147865,0.00,1),(88,'cubed24',2,1467234265,0.00,1),(89,'cubed24',2,1467320665,0.00,1),(90,'cubed24',2,1467407065,0.00,1),(91,'cubed24',2,1467493465,0.00,1),(92,'cubed24',2,1467579865,0.00,1),(93,'cubed24',2,1467666265,0.00,0),(94,'cubed24',2,1467752665,0.00,0),(95,'cubed24',2,1467839065,0.00,0),(96,'cubed24',2,1467925465,0.00,0),(97,'cubed24',2,1468011865,0.00,0),(98,'cubed24',2,1468098265,0.00,0),(99,'cubed24',2,1468184665,0.00,0),(100,'cubed24',2,1468271065,0.00,0),(101,'cubed24',2,1468357465,0.00,0),(102,'cubed24',2,1468443865,0.00,0),(103,'cubed24',2,1468530265,0.00,0),(104,'cubed24',2,1468616665,0.00,0),(105,'cubed24',2,1468703065,0.00,0),(106,'cubed24',2,1468789465,0.00,0),(107,'cubed24',2,1468875865,0.00,0),(108,'cubed24',2,1468962265,0.00,0),(109,'cubed24',2,1469048665,0.00,0),(110,'cubed24',2,1469135065,0.00,0),(111,'cubed24',2,1469221465,0.00,0),(112,'cubed24',2,1469307865,0.00,0),(113,'cubed24',2,1469394265,0.00,0),(114,'cubed24',2,1469480665,0.00,0),(115,'cubed24',2,1469567065,0.00,0),(116,'cubed24',2,1469653465,0.00,0),(117,'cubed24',2,1469739865,0.00,0),(118,'cubed24',2,1469826265,0.00,0),(119,'cubed24',2,1469912665,0.00,0),(120,'cubed24',2,1469999065,0.00,0),(121,'cubed24',3,1464902593,0.00,1),(122,'cubed24',3,1464988993,0.00,1),(123,'cubed24',3,1465075393,0.00,1),(124,'cubed24',3,1465161793,0.00,1),(125,'cubed24',3,1465248193,0.00,1),(126,'cubed24',3,1465334593,0.00,1),(127,'cubed24',3,1465420993,0.00,1),(128,'cubed24',3,1465507393,0.00,1),(129,'cubed24',3,1465593793,0.00,1),(130,'cubed24',3,1465680193,0.00,1),(131,'cubed24',3,1465766593,0.00,1),(132,'cubed24',3,1465852993,0.00,1),(133,'cubed24',3,1465939393,0.00,1),(134,'cubed24',3,1466025793,0.00,1),(135,'cubed24',3,1466112193,0.00,1),(136,'cubed24',3,1466198593,0.00,1),(137,'cubed24',3,1466284993,0.00,1),(138,'cubed24',3,1466371393,0.00,1),(139,'cubed24',3,1466457793,0.00,1),(140,'cubed24',3,1466544193,0.00,1),(141,'cubed24',3,1466630593,0.00,1),(142,'cubed24',3,1466716993,0.00,1),(143,'cubed24',3,1466803393,0.00,1),(144,'cubed24',3,1466889793,0.00,1),(145,'cubed24',3,1466976193,0.00,1),(146,'cubed24',3,1467062593,0.00,1),(147,'cubed24',3,1467148993,0.00,1),(148,'cubed24',3,1467235393,0.00,1),(149,'cubed24',3,1467321793,0.00,1),(150,'cubed24',3,1467408193,0.00,1),(151,'cubed24',3,1467494593,0.00,1),(152,'cubed24',3,1467580993,0.00,1),(153,'cubed24',3,1467667393,0.00,0),(154,'cubed24',3,1467753793,0.00,0),(155,'cubed24',3,1467840193,0.00,0),(156,'cubed24',3,1467926593,0.00,0),(157,'cubed24',3,1468012993,0.00,0),(158,'cubed24',3,1468099393,0.00,0),(159,'cubed24',3,1468185793,0.00,0),(160,'cubed24',3,1468272193,0.00,0),(161,'cubed24',3,1468358593,0.00,0),(162,'cubed24',3,1468444993,0.00,0),(163,'cubed24',3,1468531393,0.00,0),(164,'cubed24',3,1468617793,0.00,0),(165,'cubed24',3,1468704193,0.00,0),(166,'cubed24',3,1468790593,0.00,0),(167,'cubed24',3,1468876993,0.00,0),(168,'cubed24',3,1468963393,0.00,0),(169,'cubed24',3,1469049793,0.00,0),(170,'cubed24',3,1469136193,0.00,0),(171,'cubed24',3,1469222593,0.00,0),(172,'cubed24',3,1469308993,0.00,0),(173,'cubed24',3,1469395393,0.00,0),(174,'cubed24',3,1469481793,0.00,0),(175,'cubed24',3,1469568193,0.00,0),(176,'cubed24',3,1469654593,0.00,0),(177,'cubed24',3,1469740993,0.00,0),(178,'cubed24',3,1469827393,0.00,0),(179,'cubed24',3,1469913793,0.00,0),(180,'cubed24',3,1470000193,0.00,0),(181,'erfolg16',4,1464937771,0.25,1),(182,'erfolg16',4,1465024171,0.25,1),(183,'erfolg16',4,1465110571,0.25,1),(184,'erfolg16',4,1465196971,0.25,1),(185,'erfolg16',4,1465283371,0.25,1),(186,'erfolg16',4,1465369771,0.25,1),(187,'erfolg16',4,1465456171,0.25,1),(188,'erfolg16',4,1465542571,0.25,1),(189,'erfolg16',4,1465628971,0.25,1),(190,'erfolg16',4,1465715371,0.25,1),(191,'erfolg16',4,1465801771,0.25,1),(192,'erfolg16',4,1465888171,0.25,1),(193,'erfolg16',4,1465974571,0.25,1),(194,'erfolg16',4,1466060971,0.25,1),(195,'erfolg16',4,1466147371,0.25,1),(196,'erfolg16',4,1466233771,0.25,1),(197,'erfolg16',4,1466320171,0.25,1),(198,'erfolg16',4,1466406571,0.25,1),(199,'erfolg16',4,1466492971,0.25,1),(200,'erfolg16',4,1466579371,0.25,1),(201,'erfolg16',4,1466665771,0.25,1),(202,'erfolg16',4,1466752171,0.25,1),(203,'erfolg16',4,1466838571,0.25,1),(204,'erfolg16',4,1466924971,0.25,1),(205,'erfolg16',4,1467011371,0.25,1),(206,'erfolg16',4,1467097771,0.25,1),(207,'erfolg16',4,1467184171,0.25,1),(208,'erfolg16',4,1467270571,0.25,1),(209,'erfolg16',4,1467356971,0.25,1),(210,'erfolg16',4,1467443371,0.25,1),(211,'erfolg16',4,1467529771,0.25,1),(212,'erfolg16',4,1467616171,0.25,1),(213,'erfolg16',4,1467702571,0.25,0),(214,'erfolg16',4,1467788971,0.25,0),(215,'erfolg16',4,1467875371,0.25,0),(216,'erfolg16',4,1467961771,0.25,0),(217,'erfolg16',4,1468048171,0.25,0),(218,'erfolg16',4,1468134571,0.25,0),(219,'erfolg16',4,1468220971,0.25,0),(220,'erfolg16',4,1468307371,0.25,0),(221,'erfolg16',4,1468393771,0.25,0),(222,'erfolg16',4,1468480171,0.25,0),(223,'erfolg16',4,1468566571,0.25,0),(224,'erfolg16',4,1468652971,0.25,0),(225,'erfolg16',4,1468739371,0.25,0),(226,'erfolg16',4,1468825771,0.25,0),(227,'erfolg16',4,1468912171,0.25,0),(228,'erfolg16',4,1468998571,0.25,0),(229,'erfolg16',4,1469084971,0.25,0),(230,'erfolg16',4,1469171371,0.25,0),(231,'erfolg16',4,1469257771,0.25,0),(232,'erfolg16',4,1469344171,0.25,0),(233,'erfolg16',4,1469430571,0.25,0),(234,'erfolg16',4,1469516971,0.25,0),(235,'erfolg16',4,1469603371,0.25,0),(236,'erfolg16',4,1469689771,0.25,0),(237,'erfolg16',4,1469776171,0.25,0),(238,'erfolg16',4,1469862571,0.25,0),(239,'erfolg16',4,1469948971,0.25,0),(240,'erfolg16',4,1470035371,0.25,0),(241,'Globus',5,1465075396,0.25,1),(242,'Globus',5,1465161796,0.25,1),(243,'Globus',5,1465248196,0.25,1),(244,'Globus',5,1465334596,0.25,1),(245,'Globus',5,1465420996,0.25,1),(246,'Globus',5,1465507396,0.25,1),(247,'Globus',5,1465593796,0.25,1),(248,'Globus',5,1465680196,0.25,1),(249,'Globus',5,1465766596,0.25,1),(250,'Globus',5,1465852996,0.25,1),(251,'Globus',5,1465939396,0.25,1),(252,'Globus',5,1466025796,0.25,1),(253,'Globus',5,1466112196,0.25,1),(254,'Globus',5,1466198596,0.25,1),(255,'Globus',5,1466284996,0.25,1),(256,'Globus',5,1466371396,0.25,1),(257,'Globus',5,1466457796,0.25,1),(258,'Globus',5,1466544196,0.25,1),(259,'Globus',5,1466630596,0.25,1),(260,'Globus',5,1466716996,0.25,1),(261,'Globus',5,1466803396,0.25,1),(262,'Globus',5,1466889796,0.25,1),(263,'Globus',5,1466976196,0.25,1),(264,'Globus',5,1467062596,0.25,1),(265,'Globus',5,1467148996,0.25,1),(266,'Globus',5,1467235396,0.25,1),(267,'Globus',5,1467321796,0.25,1),(268,'Globus',5,1467408196,0.25,1),(269,'Globus',5,1467494596,0.25,1),(270,'Globus',5,1467580996,0.25,1),(271,'Globus',5,1467667396,0.25,0),(272,'Globus',5,1467753796,0.25,0),(273,'Globus',5,1467840196,0.25,0),(274,'Globus',5,1467926596,0.25,0),(275,'Globus',5,1468012996,0.25,0),(276,'Globus',5,1468099396,0.25,0),(277,'Globus',5,1468185796,0.25,0),(278,'Globus',5,1468272196,0.25,0),(279,'Globus',5,1468358596,0.25,0),(280,'Globus',5,1468444996,0.25,0),(281,'Globus',5,1468531396,0.25,0),(282,'Globus',5,1468617796,0.25,0),(283,'Globus',5,1468704196,0.25,0),(284,'Globus',5,1468790596,0.25,0),(285,'Globus',5,1468876996,0.25,0),(286,'Globus',5,1468963396,0.25,0),(287,'Globus',5,1469049796,0.25,0),(288,'Globus',5,1469136196,0.25,0),(289,'Globus',5,1469222596,0.25,0),(290,'Globus',5,1469308996,0.25,0),(291,'Globus',5,1469395396,0.25,0),(292,'Globus',5,1469481796,0.25,0),(293,'Globus',5,1469568196,0.25,0),(294,'Globus',5,1469654596,0.25,0),(295,'Globus',5,1469740996,0.25,0),(296,'Globus',5,1469827396,0.25,0),(297,'Globus',5,1469913796,0.25,0),(298,'Globus',5,1470000196,0.25,0),(299,'Globus',5,1470086596,0.25,0),(300,'Globus',5,1470172996,0.25,0),(301,'Ewald',6,1465504203,0.25,1),(302,'Ewald',6,1465590603,0.25,1),(303,'Ewald',6,1465677003,0.25,1),(304,'Ewald',6,1465763403,0.25,1),(305,'Ewald',6,1465849803,0.25,1),(306,'Ewald',6,1465936203,0.25,1),(307,'Ewald',6,1466022603,0.25,1),(308,'Ewald',6,1466109003,0.25,1),(309,'Ewald',6,1466195403,0.25,1),(310,'Ewald',6,1466281803,0.25,1),(311,'Ewald',6,1466368203,0.25,1),(312,'Ewald',6,1466454603,0.25,1),(313,'Ewald',6,1466541003,0.25,1),(314,'Ewald',6,1466627403,0.25,1),(315,'Ewald',6,1466713803,0.25,1),(316,'Ewald',6,1466800203,0.25,1),(317,'Ewald',6,1466886603,0.25,1),(318,'Ewald',6,1466973003,0.25,1),(319,'Ewald',6,1467059403,0.25,1),(320,'Ewald',6,1467145803,0.25,1),(321,'Ewald',6,1467232203,0.25,1),(322,'Ewald',6,1467318603,0.25,1),(323,'Ewald',6,1467405003,0.25,1),(324,'Ewald',6,1467491403,0.25,1),(325,'Ewald',6,1467577803,0.25,1),(326,'Ewald',6,1467664203,0.25,0),(327,'Ewald',6,1467750603,0.25,0),(328,'Ewald',6,1467837003,0.25,0),(329,'Ewald',6,1467923403,0.25,0),(330,'Ewald',6,1468009803,0.25,0),(331,'Ewald',6,1468096203,0.25,0),(332,'Ewald',6,1468182603,0.25,0),(333,'Ewald',6,1468269003,0.25,0),(334,'Ewald',6,1468355403,0.25,0),(335,'Ewald',6,1468441803,0.25,0),(336,'Ewald',6,1468528203,0.25,0),(337,'Ewald',6,1468614603,0.25,0),(338,'Ewald',6,1468701003,0.25,0),(339,'Ewald',6,1468787403,0.25,0),(340,'Ewald',6,1468873803,0.25,0),(341,'Ewald',6,1468960203,0.25,0),(342,'Ewald',6,1469046603,0.25,0),(343,'Ewald',6,1469133003,0.25,0),(344,'Ewald',6,1469219403,0.25,0),(345,'Ewald',6,1469305803,0.25,0),(346,'Ewald',6,1469392203,0.25,0),(347,'Ewald',6,1469478603,0.25,0),(348,'Ewald',6,1469565003,0.25,0),(349,'Ewald',6,1469651403,0.25,0),(350,'Ewald',6,1469737803,0.25,0),(351,'Ewald',6,1469824203,0.25,0),(352,'Ewald',6,1469910603,0.25,0),(353,'Ewald',6,1469997003,0.25,0),(354,'Ewald',6,1470083403,0.25,0),(355,'Ewald',6,1470169803,0.25,0),(356,'Ewald',6,1470256203,0.25,0),(357,'Ewald',6,1470342603,0.25,0),(358,'Ewald',6,1470429003,0.25,0),(359,'Ewald',6,1470515403,0.25,0),(360,'Ewald',6,1470601803,0.25,0),(361,'Evgen',7,1465896765,0.25,1),(362,'Evgen',7,1465983165,0.25,1),(363,'Evgen',7,1466069565,0.25,1),(364,'Evgen',7,1466155965,0.25,1),(365,'Evgen',7,1466242365,0.25,1),(366,'Evgen',7,1466328765,0.25,1),(367,'Evgen',7,1466415165,0.25,1),(368,'Evgen',7,1466501565,0.25,1),(369,'Evgen',7,1466587965,0.25,1),(370,'Evgen',7,1466674365,0.25,1),(371,'Evgen',7,1466760765,0.25,1),(372,'Evgen',7,1466847165,0.25,1),(373,'Evgen',7,1466933565,0.25,1),(374,'Evgen',7,1467019965,0.25,1),(375,'Evgen',7,1467106365,0.25,1),(376,'Evgen',7,1467192765,0.25,1),(377,'Evgen',7,1467279165,0.25,1),(378,'Evgen',7,1467365565,0.25,1),(379,'Evgen',7,1467451965,0.25,1),(380,'Evgen',7,1467538365,0.25,1),(381,'Evgen',7,1467624765,0.25,1),(382,'Evgen',7,1467711165,0.25,0),(383,'Evgen',7,1467797565,0.25,0),(384,'Evgen',7,1467883965,0.25,0),(385,'Evgen',7,1467970365,0.25,0),(386,'Evgen',7,1468056765,0.25,0),(387,'Evgen',7,1468143165,0.25,0),(388,'Evgen',7,1468229565,0.25,0),(389,'Evgen',7,1468315965,0.25,0),(390,'Evgen',7,1468402365,0.25,0),(391,'Evgen',7,1468488765,0.25,0),(392,'Evgen',7,1468575165,0.25,0),(393,'Evgen',7,1468661565,0.25,0),(394,'Evgen',7,1468747965,0.25,0),(395,'Evgen',7,1468834365,0.25,0),(396,'Evgen',7,1468920765,0.25,0),(397,'Evgen',7,1469007165,0.25,0),(398,'Evgen',7,1469093565,0.25,0),(399,'Evgen',7,1469179965,0.25,0),(400,'Evgen',7,1469266365,0.25,0),(401,'Evgen',7,1469352765,0.25,0),(402,'Evgen',7,1469439165,0.25,0),(403,'Evgen',7,1469525565,0.25,0),(404,'Evgen',7,1469611965,0.25,0),(405,'Evgen',7,1469698365,0.25,0),(406,'Evgen',7,1469784765,0.25,0),(407,'Evgen',7,1469871165,0.25,0),(408,'Evgen',7,1469957565,0.25,0),(409,'Evgen',7,1470043965,0.25,0),(410,'Evgen',7,1470130365,0.25,0),(411,'Evgen',7,1470216765,0.25,0),(412,'Evgen',7,1470303165,0.25,0),(413,'Evgen',7,1470389565,0.25,0),(414,'Evgen',7,1470475965,0.25,0),(415,'Evgen',7,1470562365,0.25,0),(416,'Evgen',7,1470648765,0.25,0),(417,'Evgen',7,1470735165,0.25,0),(418,'Evgen',7,1470821565,0.25,0),(419,'Evgen',7,1470907965,0.25,0),(420,'Evgen',7,1470994365,0.25,0);
/*!40000 ALTER TABLE `profit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `reviews` text NOT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date` int(11) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `vk` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip` varchar(128) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `refer` varchar(30) NOT NULL,
  `refback` int(11) unsigned NOT NULL DEFAULT '0',
  `payeer` varchar(255) NOT NULL,
  `perfect` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`, `date`, `email`, `vk`, `phone`, `name`, `ip`, `lastname`, `refer`, `refback`, `payeer`, `perfect`) VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1426962205,'admin@mail.ru','','','','','','admin',30,'P123232','U9702248'),(3,'Szlowezki','df1b600393ca7cf575bb41863ceca827',0,'Szlowezki@wp.pl','','','','78.131.195.138','','first',0,'',''),(4,'Evgen','f033341a1490cfebee818412f55013e2',0,'nostolya@yandex.ru','','','','46.201.58.66','','first',0,'',''),(5,'cubed24','f033341a1490cfebee818412f55013e2',0,'admin@Cubed24.com','','','','78.25.121.178','','first',0,'',''),(6,'swissmade','8ce39d1ea964f1b2459d596013c60765',0,'mcfesch22@hotmail.com','','','','83.78.113.236','','first',0,'',''),(7,'erfolg16','0884b7ec8e3026a162bb682d87d97a85',0,'erfolg16@gmx.ch','','','','95.211.226.36','','first',0,'P26976376',''),(8,'Klikun','733ef318520dad266313c03fce853b28',0,'klikun8@gmail.com','','','','5.153.182.169','','first',0,'P29117522','U11423395'),(9,'STOPSCAM','c9a679077d34c9cfee9626d456f985e8',0,'lav0909@gmail.com','','','','87.103.114.6','','Klikun',0,'P21492108','U8756395'),(10,'ecomax','96e79218965eb72c92a549dd5a330112',0,'big-hayper@bigmir.net','','','','176.101.214.224','','first',0,'',''),(11,'kamui','4f42dc1517d9cf3144e9f4eb96e39a3e',0,'yaroslav_borsh@ukr.net','','','','134.249.68.128','','first',0,'',''),(12,'sapphire01','25f9e794323b453885f5181f1b624d0b',0,'sapphire91@hotmail.com','','','','146.185.28.58','','first',0,'',''),(13,'Globus','8a1f9f141017d3a45f3a3c2999fc675a',0,'info@globus-marketing.com','','','','89.204.139.90','','erfolg16',0,'P33508528','U11509190'),(14,'saurus24','c78c76874bbd34e3d7acbd44adf01b83',0,'saurus24@gmx.com','','','','206.190.136.245','','erfolg16',0,'',''),(15,'murka','3e4414e3902ebf4273eb92ff93f6ae7b',0,'murka@mail.ru','','','','217.66.152.30','','first',0,'',''),(16,'Ewald','9cc7e959adfaedd73efeb0a13d753de1',0,'efreindt@mail.ru','','','','188.108.174.45','','Globus',0,'P33950335',''),(17,'clickmonitoring','97cee3149662822fc31dd148896b96e3',0,'a.berng@mail.ru','','','','178.162.81.28','','first',0,'',''),(18,'Olga','23599cfebd6a2628f2365875ebc4903e',0,'aub2006@ya.ru','','','','176.194.135.90','','first',0,'P10683518','U8279430');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'user115_cubedinvest'
--

--
-- Dumping routines for database 'user115_cubedinvest'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-04  9:08:31

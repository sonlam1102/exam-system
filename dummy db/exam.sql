-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	5.6.39

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  `contest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contest_id` (`contest_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (85,31,'When',4),(86,31,'While',4),(87,31,'If',4),(88,31,'Because',4),(89,32,'concerning',4),(90,32,'the concern of',4),(91,32,'concerned that',4),(92,32,'concerns about',4),(93,33,'during the last',4),(94,33,'in the following',4),(95,33,'periodically over',4),(96,33,'since the last',4),(97,35,'show off the ARPAnet',4),(98,35,'share information',4),(99,35,'test the abilities of the Department of Defense',4),(100,35,'to send person-to-person messages, or e-mail',4),(101,36,'1969',4),(102,36,'1972',4),(103,36,'the 1970s',4),(104,36,'the 1960s',4),(105,37,'the 1990s',4),(106,37,'1991',4),(107,37,'1993',4),(108,37,'the 1980s',4),(109,38,'words',4),(110,38,'pictures',4),(111,38,'data',4),(112,38,'sound',4),(113,39,'computing progress',4),(114,39,'browsers',4),(115,39,'links',4),(116,39,'personal computers',4);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest`
--

DROP TABLE IF EXISTS `contest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest`
--

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;
INSERT INTO `contest` VALUES (4,5,'Kiem tra Anh van 1','2018-04-03 00:00:00');
/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  KEY `contest_id` (`contest_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (32,4,'Commercial builders downplayed __________ a bust in the superheated housing market.'),(33,4,'The report showed that overall prices are up 3.1 percent _________ 12 months.'),(34,4,'The idea for the Internet began in the early 1960s in the United States. The Department of Defense wanted to connect then computers together in order to share private information. In 1969, the ARPAnet (an early form of the Internet) first connected computers at four American universities. One computer successfully sent information to another. In 1972, scientists shared the ARPAnet with the world. They created a way to send person-to-person messages using the ARPAnet. This was the beginning of e-mail.\n\nOver the next few years, there was a lot of progress made in the world of computing, but most people were not using the Internet. Then, in the 1980s, personal computers became more common. In the early 1990s, two important things happened] the birth of the World Wide Web in 1991, and the creation of the first Web browser in 1993. The Web made it easier to find information on the Internet, and to move from place to place using links. The Web and browser made it possible to see information as a web site with data, including pictures, sounds, and words.'),(35,4,'The original purpose of creating a world-wide network is to.......'),(36,4,'People in America first thought about creating the Internet in......'),(37,4,'Two important inventions in the world of computing happened in.......'),(38,4,'Information is stored in a web site in forms of.......'),(39,4,'People who work online can move easily from place to place with the help of.......');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  UNIQUE KEY `one_result` (`contest_id`,`question_id`,`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (4,31,87),(4,32,90),(4,33,93),(4,35,99),(4,36,103),(4,37,105),(4,38,111),(4,39,114);
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Toan'),(2,'Ly'),(3,'Hoa'),(4,'Van'),(5,'Anh Van');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subquestion`
--

DROP TABLE IF EXISTS `subquestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subquestion` (
  `question_id` int(11) DEFAULT NULL,
  `subquestion_id` int(11) DEFAULT NULL,
  UNIQUE KEY `question_id` (`question_id`,`subquestion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subquestion`
--

LOCK TABLES `subquestion` WRITE;
/*!40000 ALTER TABLE `subquestion` DISABLE KEYS */;
INSERT INTO `subquestion` VALUES (34,35),(34,36),(34,37),(34,38),(34,39);
/*!40000 ALTER TABLE `subquestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `remember_token` text,
  `timestamp` time DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `address` text,
  `img` text,
  `birthday` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`(100))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@admin.com','$2y$10$lTqN3EFK/sVpKrGKqCXtOOoV3c2.CyVT.PmwI6GBsIdw20TMusCua','n47azatpzQN5Kh0OQgeOFqpghIGkpRJWzqb6GSsnhHeJTtEhnt9U5Cb6StaW',NULL,'2018-03-24 09:59:54','2018-03-17 10:20:40',1,'Distric 7, Tan Phu Ward, HCMC','','1996-11-03 00:00:00'),(3,'root','root@root.com','$2y$10$n6xSG0E3AZhTeta0G64/7.tjbdkfC/XTCfCWc5T7cnztJWNU6HiOa','CGhxg5djnF7cqP5xpIxfsCks81RB1vSdyH4UTi6GGGaz1DHkp12MngY9VZUC',NULL,'2018-03-30 09:30:17','2018-03-17 10:33:44',1,'Vinh Long City','','1996-03-11 00:00:00'),(4,'Son T Luu','son.lt1103@gmail.com','$2y$10$gxABOMWklYQBpP26.aoHquIoI.gnNrVe8t/PIXOlu/6qeCf4YEpWi','jvosndnhoPmM3qggT3UYFhX6va6csP62H4LHjirI8C44bFSs2ryDqmCNXO2E',NULL,'2018-03-17 12:54:25','2018-03-17 12:54:25',0,NULL,NULL,NULL),(5,'Luu Thanh Son','sonlam1102@hotmail.com','$2y$10$ZANiosdqOkTrG8wjEHhMBeBILae4K7SHGUBJJ3mHhz2utmYdSFCoC','Jru8rvmFWGmQiTGWcFcmA46hGRe5070kaQ2dfOegnSqdSU9Qp8gxII1VW7zW',NULL,'2018-03-17 10:47:39','2018-03-17 10:47:39',0,NULL,NULL,NULL);
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

-- Dump completed on 2018-03-31 15:40:44

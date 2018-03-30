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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (9,4,'2',1),(10,4,'3',1),(11,4,'4',1),(12,4,'5',1),(13,5,'21',1),(14,5,'40',1),(15,5,'22',1),(16,5,'1',1),(17,6,'10',1),(18,6,'55',1),(19,6,'65',1),(20,6,'100',1),(21,7,'A^2 + 2AB + B^2',1),(22,7,'A^2 - 2AB + B^2',1),(23,7,'A^2 + B^2',1),(24,7,'A^2 - B^2',1),(25,8,'Hình chữ nhật có 2 cạnh kề bằng nhau',1),(26,8,'Hình thoi có 2 đường chéo vuông góc',1),(27,8,'Hình chữ nhật có 2 đường chéo vuông góc',1),(28,8,'Cả 3 đều đúng',1),(29,9,'1.2.3 = 6',1),(30,9,'1.2 = 2',1),(31,9,'1',1),(32,9,'0',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest`
--

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;
INSERT INTO `contest` VALUES (1,1,'Kiem tra toan','2018-04-17 00:00:00'),(2,3,'Kiem tra Hoa 8','2018-04-06 00:00:00'),(3,2,'Kiem tra Ly CLDN','2018-08-22 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (4,1,'Số nguyên tố kế tiếp của 2 là:'),(5,1,'(7-3)*4+6 = ?'),(6,1,'tổng của 10 số tự nhiên liên tiếp là'),(7,1,'Khai triển hằng đẳng thức (A+B)^2 là:'),(8,1,'Hình vuông là:'),(9,1,'3! ?');
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
INSERT INTO `result` VALUES (1,4,10),(1,5,15),(1,6,18),(1,7,23),(1,8,28),(1,9,29);
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
INSERT INTO `users` VALUES (2,'admin','admin@admin.com','$2y$10$lTqN3EFK/sVpKrGKqCXtOOoV3c2.CyVT.PmwI6GBsIdw20TMusCua','n47azatpzQN5Kh0OQgeOFqpghIGkpRJWzqb6GSsnhHeJTtEhnt9U5Cb6StaW',NULL,'2018-03-24 09:59:54','2018-03-17 10:20:40',1,'Distric 7, Tan Phu Ward, HCMC','','1996-11-03 00:00:00'),(3,'root','root@root.com','$2y$10$n6xSG0E3AZhTeta0G64/7.tjbdkfC/XTCfCWc5T7cnztJWNU6HiOa','4DVLXcPXvsOGszjBK0KBenOlorVK1SUxJmdASxWe85zcB6MpVJGRP2oDfhXj',NULL,'2018-03-30 09:30:17','2018-03-17 10:33:44',1,'Vinh Long City','','1996-03-11 00:00:00'),(4,'Son T Luu','son.lt1103@gmail.com','$2y$10$gxABOMWklYQBpP26.aoHquIoI.gnNrVe8t/PIXOlu/6qeCf4YEpWi','jvosndnhoPmM3qggT3UYFhX6va6csP62H4LHjirI8C44bFSs2ryDqmCNXO2E',NULL,'2018-03-17 12:54:25','2018-03-17 12:54:25',0,NULL,NULL,NULL),(5,'Luu Thanh Son','sonlam1102@hotmail.com','$2y$10$ZANiosdqOkTrG8wjEHhMBeBILae4K7SHGUBJJ3mHhz2utmYdSFCoC','Jru8rvmFWGmQiTGWcFcmA46hGRe5070kaQ2dfOegnSqdSU9Qp8gxII1VW7zW',NULL,'2018-03-17 10:47:39','2018-03-17 10:47:39',0,NULL,NULL,NULL);
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

-- Dump completed on 2018-03-30  9:37:59

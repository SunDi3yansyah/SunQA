-- MySQL dump 10.14  Distrib 5.5.47-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pwl
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB-1~trusty-log

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
-- Table structure for table `pwl_answer`
--

DROP TABLE IF EXISTS `pwl_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_answer` (
  `id_answer` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `description_answer` text NOT NULL,
  `answer_date` datetime NOT NULL,
  `answer_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `pwl_answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_answer`
--

LOCK TABLES `pwl_answer` WRITE;
/*!40000 ALTER TABLE `pwl_answer` DISABLE KEYS */;
INSERT INTO `pwl_answer` VALUES (1,2,4,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-12-14 08:19:18','2015-12-14 10:26:28'),(2,1,4,'Lorem ipsum dolor sit amet, consectetur adipisicing elit','2015-12-14 22:28:27',NULL),(3,2,3,'culpa qui officia deserunt mollit anim id est laborum.','2015-12-15 15:48:57',NULL),(4,2,1,'lorem','2015-12-21 09:16:01',NULL);
/*!40000 ALTER TABLE `pwl_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_category`
--

DROP TABLE IF EXISTS `pwl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_category`
--

LOCK TABLES `pwl_category` WRITE;
/*!40000 ALTER TABLE `pwl_category` DISABLE KEYS */;
INSERT INTO `pwl_category` VALUES (1,'Programming');
/*!40000 ALTER TABLE `pwl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_comment`
--

DROP TABLE IF EXISTS `pwl_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `comment_in` enum('Question','Answer') NOT NULL,
  `description_comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_comment_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_comment_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_comment`
--

LOCK TABLES `pwl_comment` WRITE;
/*!40000 ALTER TABLE `pwl_comment` DISABLE KEYS */;
INSERT INTO `pwl_comment` VALUES (1,2,4,NULL,'Question','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-12-14 09:21:26','2015-12-14 09:24:32'),(2,1,NULL,1,'Answer','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-12-14 06:21:27','2015-12-14 11:23:26');
/*!40000 ALTER TABLE `pwl_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_migrations`
--

DROP TABLE IF EXISTS `pwl_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_migrations`
--

LOCK TABLES `pwl_migrations` WRITE;
/*!40000 ALTER TABLE `pwl_migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `pwl_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_question`
--

DROP TABLE IF EXISTS `pwl_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description_question` text NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `question_date` datetime NOT NULL,
  `question_update` datetime DEFAULT NULL,
  `viewers` int(11) NOT NULL DEFAULT '0',
  `url_question` varchar(250) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `pwl_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_question`
--

LOCK TABLES `pwl_question` WRITE;
/*!40000 ALTER TABLE `pwl_question` DISABLE KEYS */;
INSERT INTO `pwl_question` VALUES (1,1,'lorem ipsum dolor sit amet?',1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,'2015-12-14 04:04:39','2015-12-14 04:37:14',75,'1-lorem-ipsum-dolor-sit-amet'),(3,1,'Excepteur sint occaecat cupidatat',1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,'2015-12-14 18:59:19',NULL,35,'2-excepteur-sint-occaecat-cupidatat'),(4,1,'Duis aute irure dolor in reprehenderit in',1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2015-12-14 19:00:13','2015-12-14 23:07:17',382,'4-duis-aute-irure-dolor-in-reprehenderit-in');
/*!40000 ALTER TABLE `pwl_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_question_tag`
--

DROP TABLE IF EXISTS `pwl_question_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_question_tag` (
  `id_qt` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id_qt`),
  KEY `question_id` (`question_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `pwl_question_tag_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `pwl_tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_question_tag`
--

LOCK TABLES `pwl_question_tag` WRITE;
/*!40000 ALTER TABLE `pwl_question_tag` DISABLE KEYS */;
INSERT INTO `pwl_question_tag` VALUES (5,1,4),(6,1,5),(8,3,10),(9,3,12),(13,4,4),(14,4,6);
/*!40000 ALTER TABLE `pwl_question_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_role`
--

DROP TABLE IF EXISTS `pwl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_role`
--

LOCK TABLES `pwl_role` WRITE;
/*!40000 ALTER TABLE `pwl_role` DISABLE KEYS */;
INSERT INTO `pwl_role` VALUES (1,'Administrator'),(2,'User');
/*!40000 ALTER TABLE `pwl_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_session`
--

DROP TABLE IF EXISTS `pwl_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_session`
--

LOCK TABLES `pwl_session` WRITE;
/*!40000 ALTER TABLE `pwl_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `pwl_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_tag`
--

DROP TABLE IF EXISTS `pwl_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_tag` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_tag`
--

LOCK TABLES `pwl_tag` WRITE;
/*!40000 ALTER TABLE `pwl_tag` DISABLE KEYS */;
INSERT INTO `pwl_tag` VALUES (1,'PHP'),(2,'MySQL'),(3,'MariaDB'),(4,'Nginx'),(5,'Apache'),(6,'Framework'),(7,'CSS'),(8,'HTML'),(9,'SCSS'),(10,'SASS'),(11,'JavaScript'),(12,'jQuery');
/*!40000 ALTER TABLE `pwl_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_user`
--

DROP TABLE IF EXISTS `pwl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `web` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `user_date` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(50) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lost_password` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `activated_hash` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `role` (`role_id`),
  CONSTRAINT `pwl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `pwl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_user`
--

LOCK TABLES `pwl_user` WRITE;
/*!40000 ALTER TABLE `pwl_user` DISABLE KEYS */;
INSERT INTO `pwl_user` VALUES (1,'SunDI3yansyah','$2a$08$htI9FWPKvfp7XUvgZRQdOO9QqAo7.rUs1C2Tb/8H2lh/r/InawzSy',1,'Cahyadi Triyansyah','sundi3yansyah@gmail.com','Nothing else','sundi3yansyah.com','Yogyakarta',1,'2015-11-25 00:00:00','2015-12-21 00:21:11','127.0.0.1','2015-12-21 02:56:08','','e9f389d2fefb94940770cbbca4409d17b61e013b.png',NULL),(2,'demo','$2a$08$eYut2efSKe.gBaszoQoNw.mdrTlziKa74UiSSf.DAzUi0hizFOt2y',1,'Demo User','demo@demo.com','','','',2,'2015-12-14 04:44:14','2015-12-21 03:34:24','127.0.0.1','2015-12-20 20:34:24',NULL,NULL,NULL);
/*!40000 ALTER TABLE `pwl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_vote`
--

DROP TABLE IF EXISTS `pwl_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_vote` (
  `id_vote` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `vote_in` enum('Question','Answer') NOT NULL,
  `vote_date` datetime NOT NULL,
  `vote_update` datetime DEFAULT NULL,
  `vote_for` enum('Up','Down') NOT NULL,
  PRIMARY KEY (`id_vote`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_vote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_vote_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_vote_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_vote`
--

LOCK TABLES `pwl_vote` WRITE;
/*!40000 ALTER TABLE `pwl_vote` DISABLE KEYS */;
INSERT INTO `pwl_vote` VALUES (30,1,NULL,1,'Answer','2015-12-21 09:39:16','2015-12-21 09:42:05','Up'),(31,2,NULL,2,'Answer','2015-12-21 09:41:03','2015-12-21 09:42:18','Down'),(32,2,4,NULL,'Question','2015-12-21 09:41:17',NULL,'Down');
/*!40000 ALTER TABLE `pwl_vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-21 10:30:51

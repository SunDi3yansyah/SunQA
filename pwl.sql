-- MySQL dump 10.14  Distrib 5.5.46-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pwl
-- ------------------------------------------------------
-- Server version	5.5.46-MariaDB-1~trusty-log

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
  PRIMARY KEY (`id_answer`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `pwl_answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_answer`
--

LOCK TABLES `pwl_answer` WRITE;
/*!40000 ALTER TABLE `pwl_answer` DISABLE KEYS */;
INSERT INTO `pwl_answer` VALUES (1,1,1,'Answer ... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-11-27 00:00:00');
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
  `comment_in` enum('question','answer') NOT NULL,
  `description_comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_comment_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_comment_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_comment`
--

LOCK TABLES `pwl_comment` WRITE;
/*!40000 ALTER TABLE `pwl_comment` DISABLE KEYS */;
INSERT INTO `pwl_comment` VALUES (1,1,1,NULL,'question','Comment ... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-11-26 00:00:00');
/*!40000 ALTER TABLE `pwl_comment` ENABLE KEYS */;
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
  PRIMARY KEY (`id_question`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `pwl_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_question`
--

LOCK TABLES `pwl_question` WRITE;
/*!40000 ALTER TABLE `pwl_question` DISABLE KEYS */;
INSERT INTO `pwl_question` VALUES (1,1,'Lorem ipsum dolor sit amet',1,'Question ... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,'2015-11-25 00:00:00');
/*!40000 ALTER TABLE `pwl_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwl_question_tag`
--

DROP TABLE IF EXISTS `pwl_question_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pwl_question_tag` (
  `id_qc` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id_qc`),
  KEY `question_id` (`question_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `pwl_question_tag_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_question_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `pwl_tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_question_tag`
--

LOCK TABLES `pwl_question_tag` WRITE;
/*!40000 ALTER TABLE `pwl_question_tag` DISABLE KEYS */;
INSERT INTO `pwl_question_tag` VALUES (1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_tag`
--

LOCK TABLES `pwl_tag` WRITE;
/*!40000 ALTER TABLE `pwl_tag` DISABLE KEYS */;
INSERT INTO `pwl_tag` VALUES (1,'PHP');
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
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `modified` datetime NOT NULL,
  `lost_password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `role` (`role_id`),
  CONSTRAINT `pwl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `pwl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_user`
--

LOCK TABLES `pwl_user` WRITE;
/*!40000 ALTER TABLE `pwl_user` DISABLE KEYS */;
INSERT INTO `pwl_user` VALUES (1,'SunDi3yansyah','$2a$08$ZQx0L7fF1nxBD7PdonVUreg3TUBRM9cO5T4QjJvF7LswP6pYq6VVW',1,'Cahyadi Triyansyah','sundi3yansyah@gmail.com','Nothing else','sundi3yansyah.com','Yogyakarta',1,'2015-11-25 00:00:00','2015-11-25 00:00:00','127.0.0.1','2015-11-25 00:00:00','');
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
  `vote_in` enum('question','answer') NOT NULL,
  PRIMARY KEY (`id_vote`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `pwl_vote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pwl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_vote_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `pwl_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pwl_vote_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `pwl_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwl_vote`
--

LOCK TABLES `pwl_vote` WRITE;
/*!40000 ALTER TABLE `pwl_vote` DISABLE KEYS */;
INSERT INTO `pwl_vote` VALUES (1,1,NULL,1,'answer');
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

-- Dump completed on 2015-11-27 17:58:44

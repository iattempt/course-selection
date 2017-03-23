-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classrooms`
--

LOCK TABLES `classrooms` WRITE;
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;
INSERT INTO `classrooms` VALUES (2,'C107'),(1,'LAN009'),(4,'SS108'),(3,'ST436');
/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_base`
--

DROP TABLE IF EXISTS `course_base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_base`
--

LOCK TABLES `course_base` WRITE;
/*!40000 ALTER TABLE `course_base` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_credits`
--

DROP TABLE IF EXISTS `course_credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_credits` (
  `credit` int(2) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`credit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_credits`
--

LOCK TABLES `course_credits` WRITE;
/*!40000 ALTER TABLE `course_credits` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_credits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_days`
--

DROP TABLE IF EXISTS `course_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_days` (
  `day` int(1) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_days`
--

LOCK TABLES `course_days` WRITE;
/*!40000 ALTER TABLE `course_days` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_enrollments`
--

DROP TABLE IF EXISTS `course_enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_enrollments` (
  `remaining_enroll` int(10) unsigned NOT NULL,
  `max_enroll` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`remaining_enroll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_enrollments`
--

LOCK TABLES `course_enrollments` WRITE;
/*!40000 ALTER TABLE `course_enrollments` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_language`
--

DROP TABLE IF EXISTS `course_language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_language` (
  `language` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_language`
--

LOCK TABLES `course_language` WRITE;
/*!40000 ALTER TABLE `course_language` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_moocs`
--

DROP TABLE IF EXISTS `course_moocs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_moocs` (
  `is_mooc` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`is_mooc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_moocs`
--

LOCK TABLES `course_moocs` WRITE;
/*!40000 ALTER TABLE `course_moocs` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_moocs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_owners`
--

DROP TABLE IF EXISTS `course_owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_owners` (
  `unit_id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_owners`
--

LOCK TABLES `course_owners` WRITE;
/*!40000 ALTER TABLE `course_owners` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_periods`
--

DROP TABLE IF EXISTS `course_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_periods` (
  `period` int(3) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`period`),
  KEY `course_id_idx` (`course_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_periods`
--

LOCK TABLES `course_periods` WRITE;
/*!40000 ALTER TABLE `course_periods` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_professors`
--

DROP TABLE IF EXISTS `course_professors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_professors` (
  `professor_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_professors`
--

LOCK TABLES `course_professors` WRITE;
/*!40000 ALTER TABLE `course_professors` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_professors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_types`
--

DROP TABLE IF EXISTS `course_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_types` (
  `type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_types`
--

LOCK TABLES `course_types` WRITE;
/*!40000 ALTER TABLE `course_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `classroom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `year` year(4) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `his_apply_courses`
--

DROP TABLE IF EXISTS `his_apply_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `his_apply_courses` (
  `student_id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `professor_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `his_apply_courses`
--

LOCK TABLES `his_apply_courses` WRITE;
/*!40000 ALTER TABLE `his_apply_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `his_apply_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `his_take_courses`
--

DROP TABLE IF EXISTS `his_take_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `his_take_courses` (
  `student_id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `his_take_courses`
--

LOCK TABLES `his_take_courses` WRITE;
/*!40000 ALTER TABLE `his_take_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `his_take_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prerequisites`
--

DROP TABLE IF EXISTS `prerequisites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prerequisites` (
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pre_course_base_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  KEY `pre_course_base_name` (`pre_course_base_name`),
  KEY `course_name` (`course_name`),
  CONSTRAINT `prerequisites_ibfk_1` FOREIGN KEY (`pre_course_base_name`) REFERENCES `course_base` (`name`),
  CONSTRAINT `prerequisites_ibfk_2` FOREIGN KEY (`course_name`) REFERENCES `courses` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prerequisites`
--

LOCK TABLES `prerequisites` WRITE;
/*!40000 ALTER TABLE `prerequisites` DISABLE KEYS */;
/*!40000 ALTER TABLE `prerequisites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_enrolls`
--

DROP TABLE IF EXISTS `special_enrolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_enrolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `state` bit(1) NOT NULL DEFAULT b'0',
  `reason` varchar(225) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_enrolls`
--

LOCK TABLES `special_enrolls` WRITE;
/*!40000 ALTER TABLE `special_enrolls` DISABLE KEYS */;
/*!40000 ALTER TABLE `special_enrolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `syllabuses`
--

DROP TABLE IF EXISTS `syllabuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `syllabuses` (
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `w1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w3` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w4` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w5` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w6` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w7` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w8` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w9` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w10` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w11` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w12` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w13` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w14` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w15` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w16` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w17` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w18` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `syllabuses`
--

LOCK TABLES `syllabuses` WRITE;
/*!40000 ALTER TABLE `syllabuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `syllabuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thresholds`
--

DROP TABLE IF EXISTS `thresholds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thresholds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `year` year(4) NOT NULL,
  `default_grade` int(2) unsigned NOT NULL,
  `default_semester` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thresholds`
--

LOCK TABLES `thresholds` WRITE;
/*!40000 ALTER TABLE `thresholds` DISABLE KEYS */;
/*!40000 ALTER TABLE `thresholds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-18 16:34:07

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
  `name_tw` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_tw_UNIQUE` (`name_tw`),
  UNIQUE KEY `name_en_UNIQUE` (`name_en`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classrooms`
--

LOCK TABLES `classrooms` WRITE;
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_bases`
--

DROP TABLE IF EXISTS `course_bases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_bases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_tw` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_tw_UNIQUE` (`name_tw`),
  UNIQUE KEY `name_en_UNIQUE` (`name_en`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_bases`
--

LOCK TABLES `course_bases` WRITE;
/*!40000 ALTER TABLE `course_bases` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_bases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_credits`
--

DROP TABLE IF EXISTS `course_credits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_credits` (
  `credit` int(2) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`credit`),
  UNIQUE KEY `course_id_UNIQUE` (`course_id`),
  KEY `course_id_idx` (`course_id`),
  CONSTRAINT `course_credits_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`day`),
  KEY `course_id_idx` (`course_id`),
  CONSTRAINT `course_days_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`remaining_enroll`),
  UNIQUE KEY `course_id_UNIQUE` (`course_id`),
  KEY `course_enrollments_course_id_idx` (`course_id`),
  CONSTRAINT `course_enrollments_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `language` varchar(255) NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`language`),
  KEY `course_language_course_id_idx` (`course_id`),
  CONSTRAINT `course_language_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`is_mooc`),
  KEY `course_moocs_course_id_idx` (`course_id`),
  CONSTRAINT `course_moocs_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`unit_id`),
  KEY `course_owner_unit_id_idx` (`unit_id`),
  KEY `course_owner_course_id_idx` (`course_id`),
  CONSTRAINT `course_owner_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_owner_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`period`),
  KEY `course_id_idx` (`course_id`),
  CONSTRAINT `course_periods_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `professor_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  KEY `course_professor_course_id_idx` (`course_id`),
  KEY `course_professor_professor_id_idx` (`professor_id`),
  CONSTRAINT `course_professor_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_professor_professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `type` varchar(255) NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`type`),
  KEY `course_types_course_id_idx` (`course_id`),
  CONSTRAINT `course_types_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_base_id` int(10) unsigned NOT NULL,
  `classroom_id` int(11) unsigned NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `course_base_id_idx` (`course_base_id`),
  KEY `classroom_id_idx` (`classroom_id`),
  CONSTRAINT `course_classroom_id` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_course_base_id` FOREIGN KEY (`course_base_id`) REFERENCES `course_bases` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  `professor_id` int(10) unsigned DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `his_apply_course_course_id_idx` (`course_id`),
  KEY `his_apply_course_student_id_idx` (`student_id`),
  KEY `his_apply_course_professor_id_idx` (`professor_id`),
  CONSTRAINT `his_apply_course_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `his_apply_course_professor_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `his_apply_course_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `his_take_course_course_id_idx` (`course_id`),
  KEY `his_take_course_student_id_idx` (`student_id`),
  CONSTRAINT `his_take_course_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `his_take_course_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  `pre_course_id` int(10) unsigned NOT NULL,
  KEY `prerequite_pre_course_id_idx` (`pre_course_id`),
  KEY `prerequite_course_id` (`course_id`),
  CONSTRAINT `prerequite_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `prerequite_pre_course_id` FOREIGN KEY (`pre_course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `series` varchar(255) NOT NULL,
  `name_tw` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `series_UNIQUE` (`series`),
  KEY `unit_id_idx` (`unit_id`),
  CONSTRAINT `professor_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `series` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name_tw` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  `grade` int(10) unsigned NOT NULL,
  `state` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `series_UNIQUE` (`series`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `unit_id_idx` (`unit_id`),
  CONSTRAINT `students_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_id` int(10) unsigned NOT NULL,
  `w1` varchar(255) DEFAULT NULL,
  `w2` varchar(255) DEFAULT NULL,
  `w3` varchar(255) DEFAULT NULL,
  `w4` varchar(255) DEFAULT NULL,
  `w5` varchar(255) DEFAULT NULL,
  `w6` varchar(255) DEFAULT NULL,
  `w7` varchar(255) DEFAULT NULL,
  `w8` varchar(255) DEFAULT NULL,
  `w9` varchar(255) DEFAULT NULL,
  `w10` varchar(255) DEFAULT NULL,
  `w11` varchar(255) DEFAULT NULL,
  `w12` varchar(255) DEFAULT NULL,
  `w13` varchar(255) DEFAULT NULL,
  `w14` varchar(255) DEFAULT NULL,
  `w15` varchar(255) DEFAULT NULL,
  `w16` varchar(255) DEFAULT NULL,
  `w17` varchar(255) DEFAULT NULL,
  `w18` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  UNIQUE KEY `course_id_UNIQUE` (`course_id`),
  KEY `syllabuse_course_id_idx` (`course_id`),
  CONSTRAINT `syllabuse_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `course_base_id` int(10) unsigned NOT NULL,
  `year` year(4) NOT NULL,
  `default_grade` int(2) unsigned NOT NULL,
  `default_semester` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `course_base_id_idx` (`course_base_id`),
  KEY `unit_id_idx` (`unit_id`),
  CONSTRAINT `thresholds_course_base_id` FOREIGN KEY (`course_base_id`) REFERENCES `course_bases` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `thresholds_unit_id` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `name_tw` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_tw_UNIQUE` (`name_tw`),
  UNIQUE KEY `name_en_UNIQUE` (`name_en`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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

-- Dump completed on 2017-03-02 15:30:28

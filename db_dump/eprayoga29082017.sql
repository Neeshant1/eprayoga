-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: eprayoga
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.17.04.1

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
-- Table structure for table `bl_address_type_master`
--

DROP TABLE IF EXISTS `bl_address_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_address_type_master` (
  `add_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_type_code` varchar(20) DEFAULT NULL,
  `add_type_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `origin_type_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`add_type_id`,`add_type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_address_type_master`
--

LOCK TABLES `bl_address_type_master` WRITE;
/*!40000 ALTER TABLE `bl_address_type_master` DISABLE KEYS */;
INSERT INTO `bl_address_type_master` VALUES (10,'BLATP20170829105604','ch','2017-08-29 05:26:04','1','2017-08-29 05:26:04','1',1,0,'BLORT20170822195842');
/*!40000 ALTER TABLE `bl_address_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_aws_s3_master`
--

DROP TABLE IF EXISTS `bl_aws_s3_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_aws_s3_master` (
  `aws_s3_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `aws_s3_id` varchar(150) NOT NULL,
  `aws_access_key_id` varchar(150) NOT NULL,
  `aws_secret_access_key` varchar(150) NOT NULL,
  `s3_bucket_name` varchar(150) NOT NULL,
  `s3_url` varchar(150) NOT NULL,
  `used_for` varchar(150) NOT NULL,
  `is_active` varchar(1) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(150) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aws_s3_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_aws_s3_master`
--

LOCK TABLES `bl_aws_s3_master` WRITE;
/*!40000 ALTER TABLE `bl_aws_s3_master` DISABLE KEYS */;
INSERT INTO `bl_aws_s3_master` VALUES (2,'safasf','ascas','ascasc','sacasc','sacasc','scascasc','1','2017-08-28 12:24:13','1','2017-08-28 12:24:13','123',0);
/*!40000 ALTER TABLE `bl_aws_s3_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_category`
--

DROP TABLE IF EXISTS `bl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_category` (
  `category_id` int(12) NOT NULL AUTO_INCREMENT,
  `clnt_id` varchar(12) NOT NULL,
  `category_code` varchar(20) DEFAULT NULL,
  `category_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_category`
--

LOCK TABLES `bl_category` WRITE;
/*!40000 ALTER TABLE `bl_category` DISABLE KEYS */;
INSERT INTO `bl_category` VALUES (2,'22','AAA','mariiii','2017-08-15 17:16:40','1','2017-08-29 05:19:47','2',1,1),(3,'123','A1B','BBB','2017-08-19 11:05:48','1','2017-08-29 05:19:50','2',1,1),(4,'22','vvv','vre','2017-08-23 13:49:57','1','2017-08-29 05:19:51','2',1,1),(5,'123','BLSCT20170829105118','sdfd','2017-08-29 05:21:18','1','2017-08-29 05:21:18','1',1,0);
/*!40000 ALTER TABLE `bl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_city_master`
--

DROP TABLE IF EXISTS `bl_city_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_city_master` (
  `city_id` int(13) NOT NULL AUTO_INCREMENT,
  `city_code` varchar(15) NOT NULL,
  `state_id` int(13) NOT NULL,
  `country_id` int(13) NOT NULL,
  `city_full_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`city_id`,`state_id`,`city_full_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_city_master`
--

LOCK TABLES `bl_city_master` WRITE;
/*!40000 ALTER TABLE `bl_city_master` DISABLE KEYS */;
INSERT INTO `bl_city_master` VALUES (1,'CH',2,3,'Chennai','2017-08-23 06:11:49','1','2017-08-23 10:16:55','11',1,1),(2,'ki',3,3,'jii','2017-08-23 09:48:58','1','2017-08-23 10:42:05','11',1,1),(3,'tnvl',2,3,'tnvl','2017-08-23 10:41:17','1','2017-08-23 10:42:05','11',1,1),(4,'kii',3,3,'reni','2017-08-23 10:41:43','1','2017-08-23 10:42:05','11',1,1),(5,'hhh',3,3,'jjj','2017-08-23 11:26:06','1','2017-08-23 11:26:06','11',0,1);
/*!40000 ALTER TABLE `bl_city_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_client`
--

DROP TABLE IF EXISTS `bl_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_client` (
  `client_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `clnt_type_id` varchar(1) NOT NULL,
  `clnt_id` varchar(12) NOT NULL,
  `clnt_name` varchar(150) NOT NULL,
  `clnt_contact_person_first_name` varchar(150) NOT NULL,
  `clnt_contact_person_last_name` varchar(150) NOT NULL,
  `clnt_contact_person_off_phone` varchar(10) DEFAULT NULL,
  `clnt_contact_person_mobile` varchar(10) NOT NULL,
  `clnt_dept_name` varchar(15) NOT NULL,
  `clnt_contact_person_desgination` varchar(30) NOT NULL,
  `clnt_pan` varchar(10) NOT NULL,
  `website_url` varchar(150) NOT NULL,
  `clnt_off_email_id` varchar(30) NOT NULL,
  `tax_id` varchar(150) NOT NULL,
  `clnt_twitter_id` varchar(30) DEFAULT NULL,
  `clnt_facbook_id` varchar(30) DEFAULT NULL,
  `clnt_logo_file_name` varchar(50) NOT NULL,
  `clnt_logo_location` varchar(50) NOT NULL,
  `orig_type_id` int(11) NOT NULL,
  `created_on_timestamp` timestamp NULL DEFAULT NULL,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NULL DEFAULT NULL,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `clnt_group_id` varchar(12) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client`
--

LOCK TABLES `bl_client` WRITE;
/*!40000 ALTER TABLE `bl_client` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_client_group`
--

DROP TABLE IF EXISTS `bl_client_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_client_group` (
  `clnt_group_id` int(13) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `clnt_group_code` varchar(12) NOT NULL,
  `clnt_group_name` varchar(150) NOT NULL,
  `clnt_group_contact_person_first_name` varchar(150) NOT NULL,
  `clnt_group_contact_person_last_name` varchar(150) NOT NULL,
  `clnt_group_contact_person_off_phone` varchar(10) DEFAULT NULL,
  `clnt_group_contact_person_mobile` varchar(10) NOT NULL,
  `clnt_group_dept_name` varchar(15) NOT NULL,
  `clnt_group_contact_person_desgination` varchar(30) NOT NULL,
  `clnt_group_pan` varchar(10) NOT NULL,
  `clnt_group_off_email_id` varchar(30) NOT NULL,
  `clnt_group_twitter_id` varchar(30) DEFAULT NULL,
  `clnt_group_facbook_id` varchar(30) DEFAULT NULL,
  `clnt_group_logo_file_name` varchar(50) NOT NULL,
  `clnt_group_logo_location` varchar(50) NOT NULL,
  `orig_type_id` int(11) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `clnt_group_location` varchar(12) DEFAULT NULL,
  `clnt_group_city` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`clnt_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_group`
--

LOCK TABLES `bl_client_group` WRITE;
/*!40000 ALTER TABLE `bl_client_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_client_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_client_type_master`
--

DROP TABLE IF EXISTS `bl_client_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_client_type_master` (
  `clnt_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `clnt_type_code` varchar(20) DEFAULT NULL,
  `clnt_type_name` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`clnt_type_id`,`clnt_type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_type_master`
--

LOCK TABLES `bl_client_type_master` WRITE;
/*!40000 ALTER TABLE `bl_client_type_master` DISABLE KEYS */;
INSERT INTO `bl_client_type_master` VALUES (1,'BLCTP20170824105204','Adminin',1,0,'2017-08-24 05:22:04','1','2017-08-24 05:22:04','1');
/*!40000 ALTER TABLE `bl_client_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_country_master`
--

DROP TABLE IF EXISTS `bl_country_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_country_master` (
  `country_id` int(13) NOT NULL AUTO_INCREMENT,
  `country_short_name` varchar(3) NOT NULL,
  `country_full_name` varchar(150) NOT NULL,
  `country_phonecode` int(13) NOT NULL,
  `zone_area_id` int(13) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country_mastercol` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`country_id`,`country_short_name`,`country_full_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_country_master`
--

LOCK TABLES `bl_country_master` WRITE;
/*!40000 ALTER TABLE `bl_country_master` DISABLE KEYS */;
INSERT INTO `bl_country_master` VALUES (1,'chn','China',91,2,'2017-08-20 18:13:13','active','2017-08-22 12:48:19','11',1,1),(2,'It','Italy TOWN',999,2,'2017-08-22 10:41:40','active','2017-08-28 07:28:13','11',0,1),(3,'US','USA',99,2,'2017-08-22 11:25:11','active','2017-08-28 09:29:47','11',1,1),(4,'ch','china',345,3,'2017-08-28 09:29:59','active','2017-08-28 12:38:53','11',1,0),(5,'s','sds',333,3,'2017-08-28 10:24:00','active','2017-08-28 12:40:24','11',1,0),(6,'s s','edfe',999,3,'2017-08-28 10:28:04','active','2017-08-28 10:28:04','11',1,0),(7,'w','detreytr',43561234,3,'2017-08-28 10:30:16','active','2017-08-28 10:30:16','11',1,0);
/*!40000 ALTER TABLE `bl_country_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_currency_code_master`
--

DROP TABLE IF EXISTS `bl_currency_code_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_currency_code_master` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(150) NOT NULL,
  `currency_code` varchar(20) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `conv_rate` decimal(5,3) NOT NULL,
  `type` varchar(1) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`currency_id`,`currency_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_currency_code_master`
--

LOCK TABLES `bl_currency_code_master` WRITE;
/*!40000 ALTER TABLE `bl_currency_code_master` DISABLE KEYS */;
INSERT INTO `bl_currency_code_master` VALUES (1,'euro','gg','2017-08-22 06:35:05','1','2017-08-24 07:25:50','2',18.000,'0',1,1),(2,'euro','gg','2017-08-22 07:12:04','1','2017-08-24 07:25:56','2',18.000,'0',1,1),(3,'euro','11','2017-08-24 07:03:00','1','2017-08-24 07:48:29','2',18.000,'1',1,1),(4,'dolllar','BLCCD20170824124812','2017-08-24 07:18:12','1','2017-08-24 07:48:29','2',18.000,'0',1,1),(5,'euro','BLCCD20170824131840','2017-08-24 07:48:40','1','2017-08-29 08:22:33','2',18.000,'1',1,1),(6,'dfdfd','BLCCD20170829133915','2017-08-29 08:09:15','1','2017-08-29 08:22:33','2',89.000,'1',1,1),(7,'ru','BLCCD20170829135249','2017-08-29 08:22:49','1','2017-08-29 08:22:49','2',78.000,'1',1,0),(8,'red','BLCCD20170829135301','2017-08-29 08:23:01','1','2017-08-29 08:23:01','2',89.000,'1',1,0),(9,'dam','BLCCD20170829135312','2017-08-29 08:23:12','1','2017-08-29 08:23:12','2',74.000,'1',1,0);
/*!40000 ALTER TABLE `bl_currency_code_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_cust_scrtyqtn_ans`
--

DROP TABLE IF EXISTS `bl_cust_scrtyqtn_ans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_cust_scrtyqtn_ans` (
  `cust_scrtyqtn_ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` varchar(12) NOT NULL,
  `question_id` varchar(12) NOT NULL,
  `cust_answer` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cust_scrtyqtn_ans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_cust_scrtyqtn_ans`
--

LOCK TABLES `bl_cust_scrtyqtn_ans` WRITE;
/*!40000 ALTER TABLE `bl_cust_scrtyqtn_ans` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_cust_scrtyqtn_ans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_customer`
--

DROP TABLE IF EXISTS `bl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` varchar(1) NOT NULL,
  `cust_id` varchar(12) NOT NULL,
  `cust_first_name` varchar(150) NOT NULL,
  `cust_last_name` varchar(150) NOT NULL,
  `cust_dob` date NOT NULL,
  `cust_aadhar_number` varchar(15) NOT NULL,
  `cust_pan` varchar(15) NOT NULL,
  `cust_passport` varchar(15) NOT NULL,
  `cust_sex` varchar(1) NOT NULL,
  `cust_res_phone_number` varchar(10) NOT NULL,
  `cust_mobile_phone_number` varchar(10) NOT NULL,
  `cust_off_phone_number` varchar(10) DEFAULT NULL,
  `cust_off_email_id` varchar(50) NOT NULL,
  `cust_per_emai_id` varchar(50) NOT NULL,
  `cust_twitter_id` varchar(50) DEFAULT NULL,
  `cust_facebook_id` varchar(50) DEFAULT NULL,
  `cust_photo_file_name` varchar(50) NOT NULL,
  `cust_photo_location` varchar(50) NOT NULL,
  `orig_type_id` int(11) NOT NULL,
  `cust_father_name` varchar(150) NOT NULL,
  `cust_mother_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_customer`
--

LOCK TABLES `bl_customer` WRITE;
/*!40000 ALTER TABLE `bl_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_customer_address`
--

DROP TABLE IF EXISTS `bl_customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_customer_address` (
  `customer_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_id` varchar(12) NOT NULL,
  `add_type_id` varchar(10) NOT NULL,
  `cust_id` varchar(12) NOT NULL,
  `clnt_id` varchar(12) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `cust_add_line_1` varchar(150) NOT NULL,
  `cust_add_line_2` varchar(150) NOT NULL,
  `cust_add_line_3` varchar(150) NOT NULL,
  `country_id` varchar(12) NOT NULL,
  `state_id` varchar(12) NOT NULL,
  `city_id` varchar(12) NOT NULL,
  `cust_add_landmark` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`customer_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_customer_address`
--

LOCK TABLES `bl_customer_address` WRITE;
/*!40000 ALTER TABLE `bl_customer_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_difficulty_level_master`
--

DROP TABLE IF EXISTS `bl_difficulty_level_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_difficulty_level_master` (
  `difficulty_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `difficulty_level_code` varchar(150) NOT NULL,
  `difficulty_level_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`difficulty_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_difficulty_level_master`
--

LOCK TABLES `bl_difficulty_level_master` WRITE;
/*!40000 ALTER TABLE `bl_difficulty_level_master` DISABLE KEYS */;
INSERT INTO `bl_difficulty_level_master` VALUES (2,'BLDI20170824015334','wwe','2017-08-23 20:23:34','1','2017-08-23 20:23:48','2',0,1),(3,'BLDI20170828162159','S','2017-08-28 10:51:59','1','2017-08-28 10:51:59','1',0,1),(4,'BLDI20170828162213','DSSDWSD','2017-08-28 10:52:13','1','2017-08-28 10:52:13','1',0,1);
/*!40000 ALTER TABLE `bl_difficulty_level_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_education`
--

DROP TABLE IF EXISTS `bl_education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_education` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `edu_type_code` varchar(12) NOT NULL,
  `edu_univ_code` varchar(12) NOT NULL,
  `edu_category_name` varchar(150) NOT NULL,
  `edu_sub_category` varchar(150) NOT NULL,
  `edu_active` varchar(1) NOT NULL,
  `edu_university_name` varchar(150) DEFAULT NULL,
  `edu_country` varchar(50) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_education`
--

LOCK TABLES `bl_education` WRITE;
/*!40000 ALTER TABLE `bl_education` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_email_config`
--

DROP TABLE IF EXISTS `bl_email_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_email_config` (
  `email_config_id` int(13) NOT NULL AUTO_INCREMENT,
  `app_email_code` varchar(12) NOT NULL,
  `server_name` varchar(150) NOT NULL,
  `port` int(13) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_email_config`
--

LOCK TABLES `bl_email_config` WRITE;
/*!40000 ALTER TABLE `bl_email_config` DISABLE KEYS */;
INSERT INTO `bl_email_config` VALUES (4,'ADAD','cdAD',556,'aASAs@gmail.com','AAS',1,0,1);
/*!40000 ALTER TABLE `bl_email_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_emp_department`
--

DROP TABLE IF EXISTS `bl_emp_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_emp_department` (
  `emp_dept_id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_dept_code` varchar(15) DEFAULT NULL,
  `emp_dept_name` varchar(30) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_emp_department`
--

LOCK TABLES `bl_emp_department` WRITE;
/*!40000 ALTER TABLE `bl_emp_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_emp_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_emp_department_master`
--

DROP TABLE IF EXISTS `bl_emp_department_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_emp_department_master` (
  `emp_dept_id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_dept_code` varchar(20) DEFAULT NULL,
  `emp_dept_name` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_emp_department_master`
--

LOCK TABLES `bl_emp_department_master` WRITE;
/*!40000 ALTER TABLE `bl_emp_department_master` DISABLE KEYS */;
INSERT INTO `bl_emp_department_master` VALUES (1,'BLDEP20170829105616','wfef',1,0,'2017-08-29 05:26:16','1','2017-08-29 05:26:16','123');
/*!40000 ALTER TABLE `bl_emp_department_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_employee`
--

DROP TABLE IF EXISTS `bl_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_employee` (
  `emp_employee_id` int(15) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(150) NOT NULL,
  `emp_first_name` varchar(150) NOT NULL,
  `emp_last_name` varchar(150) NOT NULL,
  `emp_off_phone` varchar(10) DEFAULT NULL,
  `emp_mobile` varchar(10) NOT NULL,
  `emp_dept_id` varchar(15) NOT NULL,
  `emp_designation` varchar(45) NOT NULL,
  `emp_pan` varchar(30) NOT NULL,
  `emp_off_email_id` varchar(150) NOT NULL,
  `emp_twitter_id` varchar(150) DEFAULT NULL,
  `emp_facbook_id` varchar(100) DEFAULT NULL,
  `emp_photo_file_name` varchar(150) NOT NULL,
  `emp_photo_location` varchar(150) NOT NULL,
  `emp_department` varchar(50) NOT NULL,
  `emp_reporting_manager` varchar(50) NOT NULL,
  `emp_status` varchar(1) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `clnt_group_id` varchar(12) NOT NULL,
  PRIMARY KEY (`emp_employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_employee`
--

LOCK TABLES `bl_employee` WRITE;
/*!40000 ALTER TABLE `bl_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_exam_schedule`
--

DROP TABLE IF EXISTS `bl_exam_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_exam_schedule` (
  `exam_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_date` date NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` varchar(12) NOT NULL,
  `subject_id` varchar(12) NOT NULL,
  `topic_id` varchar(12) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`exam_schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_exam_schedule`
--

LOCK TABLES `bl_exam_schedule` WRITE;
/*!40000 ALTER TABLE `bl_exam_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_exam_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_faq`
--

DROP TABLE IF EXISTS `bl_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_faq` (
  `faq_id` int(10) NOT NULL AUTO_INCREMENT,
  `faq_code` varchar(20) DEFAULT NULL,
  `faq_category_id` varchar(20) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `keywords` tinytext,
  `notes` text,
  `is_public` tinyint(1) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_faq`
--

LOCK TABLES `bl_faq` WRITE;
/*!40000 ALTER TABLE `bl_faq` DISABLE KEYS */;
INSERT INTO `bl_faq` VALUES (3,'BLFAQ20170829152503','5',1,'dafgsd','wetwsgsdsdgsg','fsegfsrrg','afsgsg',1,'2017-08-29 09:55:03','1','2017-08-29 09:55:03','1',1,0);
/*!40000 ALTER TABLE `bl_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_faq_category`
--

DROP TABLE IF EXISTS `bl_faq_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_faq_category` (
  `faq_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `faq_category_code` varchar(20) DEFAULT NULL,
  `is_public` tinyint(1) unsigned NOT NULL,
  `faq_category_name` varchar(125) DEFAULT NULL,
  `faq_category_description` text NOT NULL,
  `notes` tinytext NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`faq_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_faq_category`
--

LOCK TABLES `bl_faq_category` WRITE;
/*!40000 ALTER TABLE `bl_faq_category` DISABLE KEYS */;
INSERT INTO `bl_faq_category` VALUES (5,'BLFAC20170824110641',1,'FA','ffffff','fffffffff','2017-08-24 05:36:41','1','2017-08-24 05:36:41','123',0,1),(6,'BLFAC20170828162935',1,'FWF EFEWF','SDSDSD','SFSFW','2017-08-28 10:59:35','1','2017-08-28 10:59:35','1',0,1);
/*!40000 ALTER TABLE `bl_faq_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_file_type_master`
--

DROP TABLE IF EXISTS `bl_file_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_file_type_master` (
  `file_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `file_type_extension` varchar(10) NOT NULL,
  `file_type_description` varchar(125) DEFAULT NULL,
  `is_allowed` tinyint(1) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`file_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_file_type_master`
--

LOCK TABLES `bl_file_type_master` WRITE;
/*!40000 ALTER TABLE `bl_file_type_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_file_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_generic_param`
--

DROP TABLE IF EXISTS `bl_generic_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_generic_param` (
  `generic_param_id` int(10) NOT NULL AUTO_INCREMENT,
  `genp_code` varchar(12) NOT NULL,
  `genp_type` varchar(3) NOT NULL,
  `genp_desc` varchar(50) NOT NULL,
  `genp_app_timezone` varchar(50) NOT NULL,
  `genp_app_date_format` date NOT NULL,
  `genp_app_currency` varchar(3) NOT NULL,
  `genp_app_currency_symbol` varchar(5) NOT NULL,
  `genp_app_default_language` varchar(50) NOT NULL,
  `genp_app_out_going_email_add` varchar(50) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `genp_active` varchar(1) NOT NULL,
  PRIMARY KEY (`generic_param_id`,`genp_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_generic_param`
--

LOCK TABLES `bl_generic_param` WRITE;
/*!40000 ALTER TABLE `bl_generic_param` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_generic_param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_instruction`
--

DROP TABLE IF EXISTS `bl_instruction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_instruction` (
  `instruction_id` int(10) NOT NULL AUTO_INCREMENT,
  `inst_type_code` varchar(20) DEFAULT NULL,
  `inst_description` varchar(12) NOT NULL,
  `inst_active` varchar(150) NOT NULL,
  `inst_eff_date_from` date NOT NULL,
  `inst_eff_date_to` date NOT NULL,
  `inst_type` varchar(3) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`instruction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_instruction`
--

LOCK TABLES `bl_instruction` WRITE;
/*!40000 ALTER TABLE `bl_instruction` DISABLE KEYS */;
INSERT INTO `bl_instruction` VALUES (5,'BLITP20170829104938','erbt','1','2017-08-29','2017-08-30','DIS','2017-08-29 05:19:38','1','2017-08-29 05:19:38','123',1,0);
/*!40000 ALTER TABLE `bl_instruction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_online_exam_answer`
--

DROP TABLE IF EXISTS `bl_online_exam_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_online_exam_answer` (
  `online_exam_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_exam_question_id` int(11) NOT NULL,
  `answer` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`online_exam_answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_online_exam_answer`
--

LOCK TABLES `bl_online_exam_answer` WRITE;
/*!40000 ALTER TABLE `bl_online_exam_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_online_exam_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_online_exam_question`
--

DROP TABLE IF EXISTS `bl_online_exam_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_online_exam_question` (
  `online_exam_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_examination_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `result` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`online_exam_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_online_exam_question`
--

LOCK TABLES `bl_online_exam_question` WRITE;
/*!40000 ALTER TABLE `bl_online_exam_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_online_exam_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_online_examination`
--

DROP TABLE IF EXISTS `bl_online_examination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_online_examination` (
  `online_examination_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_profile_id` int(11) NOT NULL,
  `exam_schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`online_examination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_online_examination`
--

LOCK TABLES `bl_online_examination` WRITE;
/*!40000 ALTER TABLE `bl_online_examination` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_online_examination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_origin_type_master`
--

DROP TABLE IF EXISTS `bl_origin_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_origin_type_master` (
  `orig_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `orig_type_code` varchar(150) NOT NULL,
  `orig_type_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`orig_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_origin_type_master`
--

LOCK TABLES `bl_origin_type_master` WRITE;
/*!40000 ALTER TABLE `bl_origin_type_master` DISABLE KEYS */;
INSERT INTO `bl_origin_type_master` VALUES (5,'BLORT20170822195842','Google','2017-08-22 14:28:42','1','2017-08-23 04:55:17','123',0,0);
/*!40000 ALTER TABLE `bl_origin_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_pricing`
--

DROP TABLE IF EXISTS `bl_pricing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_pricing` (
  `pricing_id` int(11) NOT NULL AUTO_INCREMENT,
  `prc_code` varchar(12) NOT NULL,
  `prc_type` varchar(10) NOT NULL,
  `prc_description` varchar(150) NOT NULL,
  `prc_eff_from_date` date NOT NULL,
  `prc_eff_to_date` date NOT NULL,
  `prc_detail_desc` varchar(150) NOT NULL,
  `prc_active` varchar(1) NOT NULL,
  `prc_currency` varchar(3) NOT NULL,
  `prc_price` decimal(12,3) NOT NULL,
  `prc_disc` decimal(2,2) NOT NULL,
  `prc_payment_mode` varchar(15) NOT NULL,
  `prc_usance` int(5) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`pricing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_pricing`
--

LOCK TABLES `bl_pricing` WRITE;
/*!40000 ALTER TABLE `bl_pricing` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_pricing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_question_answer`
--

DROP TABLE IF EXISTS `bl_question_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_question_answer` (
  `question_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `question_answer_txt` varchar(150) DEFAULT NULL,
  `question_answer_img` blob,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`question_answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_answer`
--

LOCK TABLES `bl_question_answer` WRITE;
/*!40000 ALTER TABLE `bl_question_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_question_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_question_master`
--

DROP TABLE IF EXISTS `bl_question_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_question_master` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_code` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `subject_id` varchar(30) NOT NULL,
  `topic_id` varchar(150) NOT NULL,
  `complexity_level_id` varchar(30) NOT NULL,
  `contributed_by` varchar(30) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `descriptive` varchar(1) NOT NULL,
  `question_txt_format` text,
  `question_img_format` blob,
  `weightage` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `neg_marks` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_master`
--

LOCK TABLES `bl_question_master` WRITE;
/*!40000 ALTER TABLE `bl_question_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_question_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_question_option`
--

DROP TABLE IF EXISTS `bl_question_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_question_option` (
  `question_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `question_option_txt` varchar(150) DEFAULT NULL,
  `question_option_img` blob,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`question_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_option`
--

LOCK TABLES `bl_question_option` WRITE;
/*!40000 ALTER TABLE `bl_question_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_question_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_question_type_master`
--

DROP TABLE IF EXISTS `bl_question_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_question_type_master` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_code` varchar(20) DEFAULT NULL,
  `question_type_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`question_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_type_master`
--

LOCK TABLES `bl_question_type_master` WRITE;
/*!40000 ALTER TABLE `bl_question_type_master` DISABLE KEYS */;
INSERT INTO `bl_question_type_master` VALUES (5,'BLQD20170824113543','fggg','2017-08-24 06:05:43','1','2017-08-24 06:05:43','123',1,0),(6,'BLQD20170828161622','SDGH','2017-08-28 10:46:22','1','2017-08-28 10:46:22','1',1,0),(7,'BLQD20170828161629','DDGSG/','2017-08-28 10:46:29','1','2017-08-28 10:46:29','1',1,0),(8,'BLQD20170828161649','SGWRGW HKLYKG?','2017-08-28 10:46:49','1','2017-08-28 10:46:49','1',1,0),(9,'BLQD20170828161657','ASADA21212','2017-08-28 10:46:57','1','2017-08-28 10:46:57','1',1,0);
/*!40000 ALTER TABLE `bl_question_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_security_questions_master`
--

DROP TABLE IF EXISTS `bl_security_questions_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_security_questions_master` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` varchar(255) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `security_question_code` varchar(15) DEFAULT NULL,
  `sec_quest_code` varchar(20) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`question_id`,`question_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_security_questions_master`
--

LOCK TABLES `bl_security_questions_master` WRITE;
/*!40000 ALTER TABLE `bl_security_questions_master` DISABLE KEYS */;
INSERT INTO `bl_security_questions_master` VALUES (1,'xsdfbghn','2017-08-29 05:14:58','1','2017-08-29 05:14:58','1',NULL,'BLSQC20170829104458',0,1);
/*!40000 ALTER TABLE `bl_security_questions_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_sms_config`
--

DROP TABLE IF EXISTS `bl_sms_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_sms_config` (
  `sms_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `app_sms_code` varchar(12) NOT NULL,
  `app_sms_gateway_name` varchar(150) NOT NULL,
  `app_sms_user_id` varchar(60) NOT NULL,
  `app_sms_user_password` varchar(60) NOT NULL,
  `app_sms_gateway_url` varchar(60) NOT NULL,
  `app_sms_gateway_status` varchar(10) NOT NULL,
  `app_sms_registered_phone_number` varchar(10) NOT NULL,
  `app_sms_gateway_authentication_tocken` varchar(150) NOT NULL,
  `app_sms_gateway_api_id` varchar(150) NOT NULL,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `genp_active` varchar(1) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sms_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_sms_config`
--

LOCK TABLES `bl_sms_config` WRITE;
/*!40000 ALTER TABLE `bl_sms_config` DISABLE KEYS */;
INSERT INTO `bl_sms_config` VALUES (1,'safasf','afaf','asf','adsd','afsf','1','asfad','adad','ada','1','2017-08-28 12:33:08','123','1',1,0),(2,'sfsd','sfs','dsffd','sfdfsdf','sdfsdf','1','95845','dfsdfsf','sdfsdfs','1','2017-08-28 13:01:42','123','1',1,0);
/*!40000 ALTER TABLE `bl_sms_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_state_master`
--

DROP TABLE IF EXISTS `bl_state_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_state_master` (
  `state_id` int(13) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(15) NOT NULL,
  `country_id` int(13) NOT NULL,
  `state_full_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `zone_area_id` int(13) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_state_master`
--

LOCK TABLES `bl_state_master` WRITE;
/*!40000 ALTER TABLE `bl_state_master` DISABLE KEYS */;
INSERT INTO `bl_state_master` VALUES (1,'TN',1,'TAmil Nadu','2017-08-21 04:37:14','1','2017-08-28 12:39:08','11',2,0,0),(2,'TN',3,'Tamil Nadu','2017-08-23 05:42:01','1','2017-08-23 05:45:55','11',2,1,0),(3,'AT',3,'Andhra','2017-08-23 05:43:19','1','2017-08-23 05:43:19','11',2,1,0);
/*!40000 ALTER TABLE `bl_state_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_subject`
--

DROP TABLE IF EXISTS `bl_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_subject` (
  `subject_id` int(13) NOT NULL AUTO_INCREMENT,
  `clnt_id` varchar(12) NOT NULL,
  `category_id` varchar(12) NOT NULL,
  `subject_code` varchar(20) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`subject_id`,`subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_subject`
--

LOCK TABLES `bl_subject` WRITE;
/*!40000 ALTER TABLE `bl_subject` DISABLE KEYS */;
INSERT INTO `bl_subject` VALUES (1,'111','2','1','mari','2017-08-15 18:59:51','1','2017-08-29 05:21:24','123',1,1),(2,'23','2','11','mat','2017-08-15 19:03:09','1','2017-08-29 05:21:26','123',1,1),(3,'111','2','H1','c','2017-08-15 19:03:48','1','2017-08-29 05:21:27','123',1,1),(4,'12','3','BE2','BE2','2017-08-19 11:08:29','1','2017-08-29 05:21:28','123',1,1),(5,'ch','5','BLSUB20170829105229','v mxcklvm','2017-08-29 05:22:29','1','2017-08-29 05:22:29','123',0,1);
/*!40000 ALTER TABLE `bl_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_topic`
--

DROP TABLE IF EXISTS `bl_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_topic` (
  `topic_id` int(13) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `category_id` varchar(3) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_code` varchar(20) NOT NULL,
  `topic_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_topic`
--

LOCK TABLES `bl_topic` WRITE;
/*!40000 ALTER TABLE `bl_topic` DISABLE KEYS */;
INSERT INTO `bl_topic` VALUES (1,22,'3',4,'TO12','TOPIC','2017-08-19 12:48:07','1','2017-08-29 05:22:39','123',1,1),(2,11,'5',5,'BLTOP20170829113316','asas','2017-08-29 06:03:16','1','2017-08-29 06:03:16','123',0,1);
/*!40000 ALTER TABLE `bl_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_user_access_log`
--

DROP TABLE IF EXISTS `bl_user_access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_user_access_log` (
  `user_access_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_profile_id` int(11) NOT NULL,
  `login_ip_address` varchar(12) NOT NULL,
  `login_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `app_signon_type` varchar(30) NOT NULL,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`user_access_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_user_access_log`
--

LOCK TABLES `bl_user_access_log` WRITE;
/*!40000 ALTER TABLE `bl_user_access_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_user_access_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_user_profile_defn`
--

DROP TABLE IF EXISTS `bl_user_profile_defn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_user_profile_defn` (
  `user_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(12) NOT NULL,
  `cust_id` varchar(12) NOT NULL,
  `clnt_id` varchar(12) NOT NULL,
  `user_login_id` varchar(60) NOT NULL,
  `user_login_password` varchar(60) NOT NULL,
  `encrypted` varchar(1) NOT NULL,
  `acctlock` varchar(1) NOT NULL,
  `last_signon_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `clnt_group_id` varchar(12) NOT NULL,
  PRIMARY KEY (`user_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_user_profile_defn`
--

LOCK TABLES `bl_user_profile_defn` WRITE;
/*!40000 ALTER TABLE `bl_user_profile_defn` DISABLE KEYS */;
/*!40000 ALTER TABLE `bl_user_profile_defn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_user_type_master`
--

DROP TABLE IF EXISTS `bl_user_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_user_type_master` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_code` varchar(20) DEFAULT NULL,
  `user_type_name` varchar(60) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_type_id`,`user_type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_user_type_master`
--

LOCK TABLES `bl_user_type_master` WRITE;
/*!40000 ALTER TABLE `bl_user_type_master` DISABLE KEYS */;
INSERT INTO `bl_user_type_master` VALUES (22,'BLUTP20170824105342','Chennai','2017-08-24 05:23:42','1','2017-08-24 05:23:42','1',1,0),(23,'BLUTP20170828161122','ch','2017-08-28 10:41:22','1','2017-08-28 10:41:22','1',1,0),(24,'BLUTP20170828161141','asas qsad','2017-08-28 10:41:41','1','2017-08-28 10:41:41','1',1,0),(25,'BLUTP20170829174635','che','2017-08-29 12:16:36','1','2017-08-29 12:16:36','1',1,0);
/*!40000 ALTER TABLE `bl_user_type_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_zone_area_master`
--

DROP TABLE IF EXISTS `bl_zone_area_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_zone_area_master` (
  `zone_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_code` varchar(150) NOT NULL,
  `zone_name` varchar(150) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`zone_area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_zone_area_master`
--

LOCK TABLES `bl_zone_area_master` WRITE;
/*!40000 ALTER TABLE `bl_zone_area_master` DISABLE KEYS */;
INSERT INTO `bl_zone_area_master` VALUES (2,'IND','IND',1,1,'2017-08-19 19:19:29','1','2017-08-28 09:29:37','123'),(3,'BLZON20170828145935','efefe',1,0,'2017-08-28 09:29:35','1','2017-08-28 09:29:35','1');
/*!40000 ALTER TABLE `bl_zone_area_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-29 19:24:41

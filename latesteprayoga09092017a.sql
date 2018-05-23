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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_address_type_master`
--

LOCK TABLES `bl_address_type_master` WRITE;
/*!40000 ALTER TABLE `bl_address_type_master` DISABLE KEYS */;
INSERT INTO `bl_address_type_master` VALUES (10,'BLATP20170829105604','ch','2017-08-29 05:26:04','1','2017-08-30 11:57:23','1',1,1,'BLORT20170822195842'),(11,'BLATP20170830123714','Address Types','2017-08-30 07:07:14','1','2017-08-30 11:57:23','1',1,1,'BLORT20170822195842'),(12,'BLATP20170830171531','Address Type','2017-08-30 11:45:31','1','2017-08-30 11:57:23','1',1,1,'BLORT20170830125136'),(13,'BLATP20170901205943','RESIDENCEASDFASDFASDFASDFASDFASDFASDFASDFASDFASDFASDFSADFASDFASDFASDFDASF','2017-09-01 15:29:43','1','2017-09-01 15:33:23','1',1,1,'BLORT20170831115254'),(14,'BLATP20170901210201','RESIDENT','2017-09-01 15:32:01','1','2017-09-01 15:33:23','1',1,1,'BLORT20170831115254'),(15,'BLATP20170901210338','RESIDENCE','2017-09-01 15:33:38','1','2017-09-01 15:33:38','1',1,0,'BLORT20170831115254'),(16,'BLATP20170901210349','OFFICE','2017-09-01 15:33:49','1','2017-09-01 15:33:49','1',1,0,'BLORT20170831115254'),(17,'BLATP20170908173444','resident 1','2017-09-08 12:04:44','1','2017-09-08 12:04:44','1',1,0,'BLORT20170901211110');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_aws_s3_master`
--

LOCK TABLES `bl_aws_s3_master` WRITE;
/*!40000 ALTER TABLE `bl_aws_s3_master` DISABLE KEYS */;
INSERT INTO `bl_aws_s3_master` VALUES (2,'safasf','ascas','ascasc','sacasc','sacasc','scascasc','1','2017-08-28 12:24:13','1','2017-08-30 07:30:09','123',1),(4,'AWS S3 ID','Access Key ID','Secret Access Key','S3 Bucket Name','S3 Url','Used For','1','2017-08-30 07:29:43','1','2017-08-30 07:44:26','123',1),(5,'AWS S3 ID','Access Key ID','Secret Access Key','S3 Bucket Name','S3 Url','Used For','1','2017-08-30 11:54:00','1','2017-08-30 11:54:00','1',0),(6,'234213412341234EASDFSDF','1TWO3FOUR','WHO ARE YOU','1380ABC','WWW.ABC.COM','UPLOAD','1','2017-09-01 15:43:59','1','2017-09-01 15:43:59','1',0);
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
  `category_code` varchar(20) DEFAULT NULL,
  `category_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  `clnt_id` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_category`
--

LOCK TABLES `bl_category` WRITE;
/*!40000 ALTER TABLE `bl_category` DISABLE KEYS */;
INSERT INTO `bl_category` VALUES (1,'BLSCT20170908205522','DAS','2017-09-08 15:25:22','1','2017-09-08 15:25:22','1',1,0,'BLCLT20170908191531'),(2,'BLSCT20170908205700','MEC','2017-09-08 15:27:00','1','2017-09-08 15:41:10','1',1,1,'BLCLT20170908191531'),(3,'BLSCT20170908211212','CSC','2017-09-08 15:42:12','1','2017-09-08 15:42:12','1',1,0,'BLCLT20170908191531');
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
  `city_code` varchar(150) DEFAULT NULL,
  `code` varchar(150) NOT NULL,
  `city_full_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `state_code` varchar(150) DEFAULT NULL,
  `country_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`city_id`,`city_full_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_city_master`
--

LOCK TABLES `bl_city_master` WRITE;
/*!40000 ALTER TABLE `bl_city_master` DISABLE KEYS */;
INSERT INTO `bl_city_master` VALUES (15,'BLCIT20170908185112','tvpm','Trivandrum','2017-09-08 13:21:12','1','2017-09-08 13:21:12','11',0,1,'BLSTC20170908183805','BLCNT20170908182622'),(16,'BLCIT20170908185135','chn','Cochin','2017-09-08 13:21:35','1','2017-09-08 13:21:35','11',0,1,'BLSTC20170908183805','BLCNT20170908182622'),(17,'BLCIT20170909133537','sdsd','ssd','2017-09-09 08:05:37','1','2017-09-09 08:23:21','11',0,1,'BLSTC20170908183805','BLCNT20170908182622');
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
  `user_type_code` varchar(20) NOT NULL,
  `clnt_type_code` varchar(20) NOT NULL,
  `clnt_code` varchar(20) NOT NULL,
  `orig_type_code` varchar(20) NOT NULL,
  `clnt_group_code` varchar(20) NOT NULL,
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
  `created_on_timestamp` timestamp NULL DEFAULT NULL,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NULL DEFAULT NULL,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client`
--

LOCK TABLES `bl_client` WRITE;
/*!40000 ALTER TABLE `bl_client` DISABLE KEYS */;
INSERT INTO `bl_client` VALUES (6,'1','BLCTP20170901210633','BLCLT20170908191531','BLORT20170901211122','1','vahai','vini','r','9876534321','9876543210','cse','STIU','VINI1234H','jhkijk','vini@vahai.com','1jjlkjls','vinitha','vinitha','aa','a',NULL,'1',NULL,'1',0,1);
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
  `clnt_group_code` varchar(150) DEFAULT NULL,
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
  `orig_type_id` varchar(150) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `clnt_group_location` varchar(12) DEFAULT NULL,
  `clnt_group_city` varchar(12) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `website_url` varchar(150) DEFAULT NULL,
  `tax_id` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`clnt_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_group`
--

LOCK TABLES `bl_client_group` WRITE;
/*!40000 ALTER TABLE `bl_client_group` DISABLE KEYS */;
INSERT INTO `bl_client_group` VALUES (12,1,'BLCLG20170908194322','gh','vini','r','9876564544','9876543210','csre','shjk','vh1233','vini@vahai.com','njnj','bjhij','a','a','BLORT20170901211110','2017-09-08 14:13:22','1','2017-09-08 14:13:22','1',NULL,NULL,0,'njnhj','1hkj',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_type_master`
--

LOCK TABLES `bl_client_type_master` WRITE;
/*!40000 ALTER TABLE `bl_client_type_master` DISABLE KEYS */;
INSERT INTO `bl_client_type_master` VALUES (1,'BLCTP20170824105204','Adminin',1,1,'2017-08-24 05:22:04','1','2017-08-30 07:20:12','1'),(2,'BLCTP20170830125029','Clients NameS',1,1,'2017-08-30 07:20:29','1','2017-08-30 11:51:49','1'),(3,'BLCTP20170901210621','ASHOK LEYLAND',1,1,'2017-09-01 15:36:21','1','2017-09-08 12:04:00','1'),(4,'BLCTP20170901210633','HONEYWEL INC',1,0,'2017-09-01 15:36:33','1','2017-09-01 15:36:33','1'),(5,'BLCTP20170901210651','ROBERT BOSCH ENGINEERING INC',1,0,'2017-09-01 15:36:51','1','2017-09-01 15:36:51','1'),(6,'BLCTP20170901210701','IMPERIAL BANK OF CANADA',1,0,'2017-09-01 15:37:01','1','2017-09-01 15:37:01','1'),(7,'BLCTP20170901210714','ROYAL BANK OF SCOTLAND',1,0,'2017-09-01 15:37:14','1','2017-09-01 15:37:14','1'),(8,'BLCTP20170901210723','LLOYDS BANK OF LONDON',1,0,'2017-09-01 15:37:23','1','2017-09-01 15:37:23','1'),(9,'BLCTP20170901210734','PRUDENTIAL',1,0,'2017-09-01 15:37:34','1','2017-09-01 15:37:34','1'),(10,'BLCTP20170908173347','Wipro',1,0,'2017-09-08 12:03:47','1','2017-09-08 12:03:47','1');
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
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country_mastercol` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  `zone_code` varchar(150) DEFAULT NULL,
  `country_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_country_master`
--

LOCK TABLES `bl_country_master` WRITE;
/*!40000 ALTER TABLE `bl_country_master` DISABLE KEYS */;
INSERT INTO `bl_country_master` VALUES (1,'IND','India',91,'2017-09-08 12:56:22','active','2017-09-08 12:57:17','11',1,0,'BLZON20170908180254','BLCNT20170908182622'),(2,'pak','Pakistan',96,'2017-09-08 12:59:32','active','2017-09-08 12:59:36','11',1,1,'BLZON20170908180254','BLCNT20170908182932'),(3,'nwz','Newzealand',87,'2017-09-08 12:59:58','active','2017-09-08 12:59:58','11',1,0,'BLZON20170908180254','BLCNT20170908182958');
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
  `code` varchar(10) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `conv_rate` decimal(5,3) NOT NULL,
  `type` varchar(1) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`currency_id`,`currency_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_currency_code_master`
--

LOCK TABLES `bl_currency_code_master` WRITE;
/*!40000 ALTER TABLE `bl_currency_code_master` DISABLE KEYS */;
INSERT INTO `bl_currency_code_master` VALUES (23,'Rupees','BLCCD20170908173646','rs','2017-09-08 12:06:46','1','2017-09-08 12:06:46','2',12.000,'1',1,0),(24,'Euro','BLCCD20170908173839','er','2017-09-08 12:08:39','1','2017-09-08 12:08:44','2',12.200,'0',1,1),(25,'Dollar','BLCCD20170908173945','usd','2017-09-08 12:09:45','1','2017-09-08 12:09:45','2',66.000,'1',1,0);
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
  `cust_id` varchar(150) DEFAULT NULL,
  `question_id` varchar(150) DEFAULT NULL,
  `cust_answer` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `sec_quest_code` varchar(20) DEFAULT NULL,
  `clnt_id` varchar(20) DEFAULT NULL,
  `clnt_group_id` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`cust_scrtyqtn_ans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_cust_scrtyqtn_ans`
--

LOCK TABLES `bl_cust_scrtyqtn_ans` WRITE;
/*!40000 ALTER TABLE `bl_cust_scrtyqtn_ans` DISABLE KEYS */;
INSERT INTO `bl_cust_scrtyqtn_ans` VALUES (51,'BLCST20170909153436',NULL,'dsfsdvsvsd','2017-09-09 10:04:37','1','2017-09-09 10:10:46','12',1,'BLSQC20170901204243',NULL,NULL,1);
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
  `cust_id` varchar(150) DEFAULT NULL,
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
  `orig_type_id` varchar(150) NOT NULL,
  `cust_father_name` varchar(150) NOT NULL,
  `cust_mother_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_customer`
--

LOCK TABLES `bl_customer` WRITE;
/*!40000 ALTER TABLE `bl_customer` DISABLE KEYS */;
INSERT INTO `bl_customer` VALUES (5,'1','BLCST20170909153436','cacdc sdsadsa','sdasdas sdsadasd','2017-10-04','555555555555555','sdasdas222','sas2222','1','8888888888','2522555555','0895222122','sasda@gmail.com','sasda@gmail.com','sasda@gmail.com','sasda@gmail.com','aaaa','a','BLORT20170901211110','wdd','dsdsd','2017-09-09 10:04:36','1','2017-09-09 10:10:46','12',1,1);
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
  `add_type_id` varchar(150) DEFAULT NULL,
  `cust_id` varchar(150) DEFAULT NULL,
  `clnt_id` varchar(20) DEFAULT NULL,
  `emp_id` varchar(150) DEFAULT NULL,
  `cust_add_line_1` varchar(150) NOT NULL,
  `cust_add_line_2` varchar(150) NOT NULL,
  `cust_add_line_3` varchar(150) NOT NULL,
  `country_code` varchar(150) DEFAULT NULL,
  `state_code` varchar(150) DEFAULT NULL,
  `city_code` varchar(150) DEFAULT NULL,
  `cust_add_landmark` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `clnt_group_id` varchar(150) DEFAULT NULL,
  `zone_code` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`customer_address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_customer_address`
--

LOCK TABLES `bl_customer_address` WRITE;
/*!40000 ALTER TABLE `bl_customer_address` DISABLE KEYS */;
INSERT INTO `bl_customer_address` VALUES (131,'1','BLATP20170901210338','BLCST20170909153436',NULL,NULL,'dvssdvsdv','sdvsdvsdv','sdvsdvsdv','BLCNT20170908182622','BLSTC20170908183805','BLCIT20170908185112','sdvsdvsdv','2017-09-09 10:04:36','1','2017-09-09 10:10:46','12',1,'1','BLZON20170908180254',1),(132,'1','BLATP20170901210338','BLCST20170909153436',NULL,NULL,'dvssdvsdv','sdvsdvsdv','sdvsdvsdv','BLCNT20170908182622','BLSTC20170908183805','BLCIT20170908185135','sdvsdvsdv','2017-09-09 10:04:36','1','2017-09-09 10:10:46','12',1,'1','BLZON20170908180254',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_difficulty_level_master`
--

LOCK TABLES `bl_difficulty_level_master` WRITE;
/*!40000 ALTER TABLE `bl_difficulty_level_master` DISABLE KEYS */;
INSERT INTO `bl_difficulty_level_master` VALUES (2,'BLDI20170824015334','wwe','2017-08-23 20:23:34','1','2017-08-30 12:18:49','2',1,1),(3,'BLDI20170828162159','S','2017-08-28 10:51:59','1','2017-08-30 12:18:49','1',1,1),(4,'BLDI20170828162213','DSSDWSD','2017-08-28 10:52:13','1','2017-08-30 12:18:49','1',1,1),(5,'BLDI20170830114224','high','2017-08-30 06:12:24','1','2017-08-30 12:18:49','1',1,1),(6,'BLDI20170830114300','Levels','2017-08-30 06:13:00','1','2017-08-30 12:18:49','1',1,0),(7,'BLDI20170830174948','HIGH','2017-08-30 12:19:48','1','2017-08-30 12:19:50','1',1,1),(8,'BLDI20170901202427','A','2017-09-01 14:54:27','1','2017-09-01 14:54:44','1',1,1),(9,'BLDI20170901202434','B','2017-09-01 14:54:34','1','2017-09-01 14:54:44','1',1,1),(10,'BLDI20170901202438','C','2017-09-01 14:54:38','1','2017-09-01 14:54:44','1',1,1),(11,'BLDI20170901202451','S','2017-09-01 14:54:51','1','2017-09-08 13:50:42','1',1,1),(12,'BLDI20170901202455','M','2017-09-01 14:54:55','1','2017-09-08 13:50:45','1',1,1),(13,'BLDI20170901202459','C','2017-09-01 14:54:59','1','2017-09-08 13:50:48','1',1,1),(14,'BLDI20170908185832','Inermediate','2017-09-08 13:28:32','1','2017-09-08 13:28:32','1',0,1),(15,'BLDI20170908192035','Basic','2017-09-08 13:50:35','1','2017-09-08 13:50:35','1',0,1);
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
  `edu_type_code` varchar(150) DEFAULT NULL,
  `edu_univ_code` varchar(150) DEFAULT NULL,
  `edu_category_name` varchar(150) NOT NULL,
  `edu_sub_category` varchar(150) NOT NULL,
  `edu_active` varchar(1) NOT NULL,
  `edu_university_name` varchar(150) DEFAULT NULL,
  `edu_country` varchar(50) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) DEFAULT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `cust_id` varchar(20) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_education`
--

LOCK TABLES `bl_education` WRITE;
/*!40000 ALTER TABLE `bl_education` DISABLE KEYS */;
INSERT INTO `bl_education` VALUES (2,'BLETP20170909153436','sdvsdv334','BLSCT20170908205522','BLSUB20170908214029','0','sdvsdvdsv','BLCNT20170908182622','2017-09-09 10:04:37','1','2017-09-09 10:10:46','12',1,'BLCST20170909153436',1);
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
  `app_email_code` varchar(150) DEFAULT NULL,
  `server_name` varchar(150) NOT NULL,
  `port` int(13) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_email_config`
--

LOCK TABLES `bl_email_config` WRITE;
/*!40000 ALTER TABLE `bl_email_config` DISABLE KEYS */;
INSERT INTO `bl_email_config` VALUES (4,'ADAD','cdAD',556,'aASAs@gmail.com','AAS',1,1,1),(5,'Email Code','ServerName',123,'ram@vahaitech.com','Password',1,1,1),(6,'EMAIL','123124',2222,'222@GMAIL.COM','EFGSDFGFGS',1,1,1),(7,'MB0001','LOCALHOST',8080,'magesh@bytesandlogic.com','1231bac&*#',1,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_emp_department_master`
--

LOCK TABLES `bl_emp_department_master` WRITE;
/*!40000 ALTER TABLE `bl_emp_department_master` DISABLE KEYS */;
INSERT INTO `bl_emp_department_master` VALUES (1,'BLDEP20170829105616','wfef',1,1,'2017-08-29 05:26:16','1','2017-08-30 07:14:53','123'),(2,'BLDEP20170830124434','Departments Name',0,1,'2017-08-30 07:14:34','1','2017-08-30 07:19:41','123'),(3,'BLDEP20170830125002','Department Name',1,1,'2017-08-30 07:20:02','1','2017-08-30 11:51:09','123'),(4,'BLDEP20170830172123','Department Name',1,1,'2017-08-30 11:51:23','1','2017-08-30 11:51:30','1'),(5,'BLDEP20170901210419','BANKING',1,0,'2017-09-01 15:34:19','1','2017-09-01 15:34:19','1'),(6,'BLDEP20170901210429','FOREX',1,0,'2017-09-01 15:34:29','1','2017-09-08 12:04:27','1'),(7,'BLDEP20170901210444','CORPORATE FINANCE',1,0,'2017-09-01 15:34:44','1','2017-09-01 15:34:44','1'),(8,'BLDEP20170908173412','cse',1,0,'2017-09-08 12:04:12','1','2017-09-08 12:04:12','1'),(9,'BLDEP20170908195638','dedf',1,0,'2017-09-08 14:26:38','1','2017-09-08 14:26:38','1');
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
  `emp_id` varchar(150) DEFAULT NULL,
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
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`emp_employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_employee`
--

LOCK TABLES `bl_employee` WRITE;
/*!40000 ALTER TABLE `bl_employee` DISABLE KEYS */;
INSERT INTO `bl_employee` VALUES (14,'BLEMP20170908194532','vini','r','9876543211','8767654344','1','A','vin1233','vini@vahai.com','hujj','vhj','a','A','jkjk','jkj','s','2017-09-08 14:15:32','1','2017-09-08 14:15:32','1','1',0,1);
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
  `faq_category_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_faq`
--

LOCK TABLES `bl_faq` WRITE;
/*!40000 ALTER TABLE `bl_faq` DISABLE KEYS */;
INSERT INTO `bl_faq` VALUES (1,'BLFAQ20170908195347',0,'fdg gfgf gfg gfgf fgdg hgdh ghh','trwtrtrt trt trt trt tr trt rtrt trt t','jdbjg gfgsg jgjfg jhgjhfjgf jjgfsg','ngfkgkfg gfhghf gfgl g',1,'2017-09-08 14:23:47','1','2017-09-08 14:25:15','1',1,0,'Engineering'),(3,'BLFAQ20170908195930',0,'sffdff','fdfdfad','fffd','fdf fdf fefe',0,'2017-09-08 14:29:30','1','2017-09-08 14:29:50','1',1,0,'BLFAC20170901202553');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_faq_category`
--

LOCK TABLES `bl_faq_category` WRITE;
/*!40000 ALTER TABLE `bl_faq_category` DISABLE KEYS */;
INSERT INTO `bl_faq_category` VALUES (5,'BLFAC20170824110641',1,'FA','ffffff','fffffffff','2017-08-24 05:36:41','1','2017-08-30 06:16:52','123',1,1),(6,'BLFAC20170828162935',1,'FWF EFEWF','SDSDSD','SFSFW','2017-08-28 10:59:35','1','2017-08-30 06:16:52','1',1,1),(9,'BLFAC20170901202553',1,'PAYMENT','PAYMENT METHODS','LET US KNOW THE PAYMENT METHODOLOGY','2017-09-01 14:55:53','1','2017-09-01 14:55:53','1',0,1),(12,'BLFAC20170908192616',0,'SAMS','samson','sFADFDFF','2017-09-08 13:56:16','1','2017-09-08 13:56:28','1',0,1);
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
  `inst_description` text NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_instruction`
--

LOCK TABLES `bl_instruction` WRITE;
/*!40000 ALTER TABLE `bl_instruction` DISABLE KEYS */;
INSERT INTO `bl_instruction` VALUES (5,'BLITP20170829104938','erbt','1','2017-08-29','2017-08-30','DIS','2017-08-29 05:19:38','1','2017-08-30 12:22:25','123',1,1),(6,'BLITP20170830113521','hjhfjhfjdfjsf','1','2017-08-08','2017-08-10','AGR','2017-08-30 06:05:21','1','2017-08-30 12:22:25','123',1,1),(7,'BLITP20170830113612','Instruction','1','2017-08-30','2017-08-31','INS','2017-08-30 06:06:12','1','2017-08-30 12:22:25','123',1,1),(8,'BLITP20170830115320','Description','1','2017-08-30','2017-09-02','AGR','2017-08-30 06:23:20','1','2017-08-30 12:22:25','123',1,1),(9,'BLITP20170901203751','Disclaimer','1','2017-09-01','2018-08-31','AGR','2017-09-01 15:07:51','1','2017-09-08 14:40:23','123',1,1),(10,'BLITP20170901203818','Disclaimer','1','2017-09-01','2018-08-31','AGR','2017-09-01 15:08:18','1','2017-09-08 14:40:27','123',1,1),(11,'BLITP20170901203907','DISCLAIMER','1','2017-09-01','2017-08-31','AGR','2017-09-01 15:09:07','1','2017-09-08 14:40:31','123',1,1),(12,'BLITP20170908200950','jgjkgkljjk','1','2017-08-29','2017-09-28','DIS','2017-09-08 14:39:50','1','2017-09-08 14:39:50','123',1,0),(13,'BLITP20170908201007','AGR','1','2017-08-28','2017-09-20','AGR','2017-09-08 14:40:07','1','2017-09-08 14:40:07','123',1,0),(14,'BLITP20170908201104','AGR','1','2017-09-04','2017-09-26','AGR','2017-09-08 14:41:04','1','2017-09-08 14:41:04','123',1,0),(15,'BLITP20170908202231','FTV','1','2017-08-29','2017-10-03','AGR','2017-09-08 14:52:31','1','2017-09-08 14:52:31','123',1,0);
/*!40000 ALTER TABLE `bl_instruction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bl_language_master`
--

DROP TABLE IF EXISTS `bl_language_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_language_master` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(25) NOT NULL,
  `language_code` varchar(20) NOT NULL,
  `language_short_name` varchar(5) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_language_master`
--

LOCK TABLES `bl_language_master` WRITE;
/*!40000 ALTER TABLE `bl_language_master` DISABLE KEYS */;
INSERT INTO `bl_language_master` VALUES (1,'Tamil Nadu','BLLAN20170908173105','tam',1,1,'2017-09-08 12:01:05','1','2017-09-08 12:01:38','1'),(2,'tamil','BLLAN20170908173152','tamil',1,0,'2017-09-08 12:01:52','1','2017-09-08 12:01:52','1');
/*!40000 ALTER TABLE `bl_language_master` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_origin_type_master`
--

LOCK TABLES `bl_origin_type_master` WRITE;
/*!40000 ALTER TABLE `bl_origin_type_master` DISABLE KEYS */;
INSERT INTO `bl_origin_type_master` VALUES (5,'BLORT20170822195842','Google','2017-08-22 14:28:42','1','2017-08-30 07:21:24','123',1,0),(6,'BLORT20170830125136','Origin Name','2017-08-30 07:21:36','1','2017-08-30 11:52:14','123',1,1),(7,'BLORT20170830172225','Origin Name','2017-08-30 11:52:25','1','2017-08-30 12:24:13','1',1,1),(8,'BLORT20170831115254','RAM','2017-08-31 06:22:54','1','2017-09-01 15:41:00','1',1,1),(9,'BLORT20170901211055','NEWS PAPER','2017-09-01 15:40:55','1','2017-09-08 12:02:37','1',1,1),(10,'BLORT20170901211110','PERSON REFERENCE','2017-09-01 15:41:10','1','2017-09-01 15:41:10','1',0,1),(11,'BLORT20170901211122','INETERNET ADVT','2017-09-01 15:41:22','1','2017-09-01 15:41:22','1',0,1),(12,'BLORT20170901211140','VISUAL MEDIA','2017-09-01 15:41:40','1','2017-09-01 15:41:40','1',0,1),(13,'BLORT20170901211149','ROAD SHOW','2017-09-01 15:41:49','1','2017-09-01 15:41:49','1',0,1),(14,'BLORT20170908173218','google.com','2017-09-08 12:02:18','1','2017-09-08 12:02:47','1',1,1);
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
  `question_code` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_answer`
--

LOCK TABLES `bl_question_answer` WRITE;
/*!40000 ALTER TABLE `bl_question_answer` DISABLE KEYS */;
INSERT INTO `bl_question_answer` VALUES (2,'BLQST20170909131310','scsd',NULL,'scsd',1,0,'2017-09-09 07:44:37','123','2017-09-09 07:44:37','123');
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
  `contributed_by` varchar(30) NOT NULL,
  `descriptive` varchar(1) NOT NULL,
  `question_txt_format` text,
  `question_img_format` blob,
  `pos_marks` int(11) NOT NULL,
  `neg_marks` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `weightage` int(3) DEFAULT '0',
  `client_code` varchar(20) NOT NULL,
  `category_code` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `topic_code` varchar(20) NOT NULL,
  `difficult_level_code` varchar(20) NOT NULL,
  `question_type_code` varchar(20) NOT NULL,
  `question_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_master`
--

LOCK TABLES `bl_question_master` WRITE;
/*!40000 ALTER TABLE `bl_question_master` DISABLE KEYS */;
INSERT INTO `bl_question_master` VALUES (1,'BLCLT20170908191531','y','sdsds',NULL,99,45,1,0,'2017-09-09 07:43:10','123','2017-09-09 07:43:10','123',2,'BLCLT20170908191531','BLSCT20170908205522','BLSUB20170908214029','BLTOP20170908222141','BLDI20170908185832','BLQD20170901135554','BLQST20170909131310');
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
  `question_option_txt` varchar(150) DEFAULT NULL,
  `question_option_img` blob,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `question_code` varchar(20) NOT NULL,
  PRIMARY KEY (`question_option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_option`
--

LOCK TABLES `bl_question_option` WRITE;
/*!40000 ALTER TABLE `bl_question_option` DISABLE KEYS */;
INSERT INTO `bl_question_option` VALUES (3,'scscsc',NULL,'scscsc',1,0,'2017-09-09 07:44:37','123','2017-09-09 07:44:37','123','BLQST20170909131310'),(4,'scsd',NULL,'scsd',1,0,'2017-09-09 07:44:37','123','2017-09-09 07:44:37','123','BLQST20170909131310');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_question_type_master`
--

LOCK TABLES `bl_question_type_master` WRITE;
/*!40000 ALTER TABLE `bl_question_type_master` DISABLE KEYS */;
INSERT INTO `bl_question_type_master` VALUES (5,'BLQD20170824113543','fggg','2017-08-24 06:05:43','1','2017-08-30 06:05:01','123',1,1),(6,'BLQD20170828161622','SDGH','2017-08-28 10:46:22','1','2017-08-30 06:05:01','1',1,1),(7,'BLQD20170828161629','DDGSG/','2017-08-28 10:46:29','1','2017-08-30 06:05:01','1',1,1),(8,'BLQD20170828161649','SGWRGW HKLYKG?','2017-08-28 10:46:49','1','2017-08-30 06:05:01','1',1,1),(9,'BLQD20170828161657','ASADA21212','2017-08-28 10:46:57','1','2017-08-30 06:05:01','1',1,1),(10,'BLQD20170830113511','new user','2017-08-30 06:05:11','1','2017-08-30 12:21:30','1',1,1),(11,'BLQD20170830114026','Questions Type','2017-08-30 06:10:26','1','2017-08-30 12:21:30','1',1,1),(12,'BLQD20170830114107','qqqqqqqqq','2017-08-30 06:11:07','1','2017-08-30 12:21:30','1',1,1),(13,'BLQD20170901135554','Logical','2017-09-01 08:25:54','1','2017-09-01 08:25:54','1',1,0),(14,'BLQD20170901135603','Narative','2017-09-01 08:26:03','1','2017-09-01 08:26:03','1',1,0),(15,'BLQD20170901135612','Multi Choice','2017-09-01 08:26:12','1','2017-09-01 08:26:12','1',1,0),(16,'BLQD20170901135618','Single Choice','2017-09-01 08:26:18','1','2017-09-01 08:26:18','1',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_security_questions_master`
--

LOCK TABLES `bl_security_questions_master` WRITE;
/*!40000 ALTER TABLE `bl_security_questions_master` DISABLE KEYS */;
INSERT INTO `bl_security_questions_master` VALUES (1,'xsdfbghn','2017-08-29 05:14:58','1','2017-08-30 12:22:43','1',NULL,'BLSQC20170829104458',1,1),(2,'Description','2017-08-30 06:24:28','1','2017-08-30 12:22:43','1',NULL,'BLSQC20170830115428',1,1),(3,'Security Question','2017-08-30 06:37:26','1','2017-08-30 12:22:43','1',NULL,'BLSQC20170830120725',1,1),(4,'Security Question','2017-08-30 06:38:11','1','2017-08-30 06:38:58','1',NULL,'BLSQC20170830120811',1,1),(5,'WHAT IS YOUR MOTHER\'S MIDDLE NAME','2017-09-01 15:11:57','1','2017-09-08 14:59:14','1',NULL,'BLSQC20170901204157',1,0),(6,'JOOOOOOOOMA','2017-09-01 15:12:13','1','2017-09-08 14:59:47','1',NULL,'BLSQC20170901204213',0,1),(7,'FAVOURITE GOD\'S NAME','2017-09-01 15:12:26','1','2017-09-08 14:59:19','1',NULL,'BLSQC20170901204226',1,1),(8,'YOUR LUCKY NUMBER','2017-09-01 15:12:43','1','2017-09-01 15:12:43','1',NULL,'BLSQC20170901204243',0,1),(9,'THE NATIONAL LEADER WHOM YOU RESPECT MORE','2017-09-01 15:13:01','1','2017-09-01 15:13:01','1',NULL,'BLSQC20170901204301',0,1),(10,'THE GAME WHICH YOU LIKE MORE','2017-09-01 15:13:25','1','2017-09-01 15:13:25','1',NULL,'BLSQC20170901204325',0,1),(11,'YOUR PET NAME','2017-09-01 15:13:40','1','2017-09-01 15:13:40','1',NULL,'BLSQC20170901204340',0,1),(12,'WHEN DID YOU VISIT YOUR HOME TOWN LAST','2017-09-01 15:14:16','1','2017-09-01 15:14:16','1',NULL,'BLSQC20170901204416',0,1),(13,'YOUR FIRST - JOB TITLE','2017-09-01 15:14:35','1','2017-09-01 15:17:00','1',NULL,'BLSQC20170901204434',0,1),(14,'YOUR DAUGHTER\'S NAME','2017-09-01 15:16:04','1','2017-09-01 15:16:04','1',NULL,'BLSQC20170901204604',0,1),(15,'YOUR DOB\'S REVERSE ORDER','2017-09-01 15:16:25','1','2017-09-01 15:16:25','1',NULL,'BLSQC20170901204625',0,1);
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
  `app_sms_code` varchar(150) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_sms_config`
--

LOCK TABLES `bl_sms_config` WRITE;
/*!40000 ALTER TABLE `bl_sms_config` DISABLE KEYS */;
INSERT INTO `bl_sms_config` VALUES (1,'safasf','afaf','asf','adsd','afsf','1','asfad','adad','ada','1','2017-08-28 12:33:08','123','1',1,1),(2,'sfsd','sfs','dsffd','sfdfsdf','sdfsdf','1','95845','dfsdfsf','sdfsdfs','1','2017-08-28 13:01:42','123','1',1,1),(3,'sms codes','gateway names','User IDs','Passwords','www.vahaitech.comss','1','9865225971','Authentication Tokens','SMS','1','2017-08-30 08:17:47','123','1',1,1),(4,'sms code','gateway name','CSCSDCSDCSDVC','SDCSDCSDC','GATE','1','999999999','SDCSDVSDV','CSDVCSDVS','1','2017-08-30 11:55:42','1','1',1,1),(5,'sms code','RAM','www','www.vahaitech.com','www.vahaitech.com','1','999999999','www.vahaitech.com','www.vahaitech.com','1','2017-08-31 06:22:06','1','1',1,0);
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
  `state_full_name` varchar(150) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  `zone_code` varchar(150) DEFAULT NULL,
  `country_code` varchar(150) DEFAULT NULL,
  `state_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_state_master`
--

LOCK TABLES `bl_state_master` WRITE;
/*!40000 ALTER TABLE `bl_state_master` DISABLE KEYS */;
INSERT INTO `bl_state_master` VALUES (1,'Kerala','ker','2017-09-08 13:08:05','1','2017-09-08 13:08:05','11',1,0,'BLZON20170908180254','BLCNT20170908182622','BLSTC20170908183805'),(2,'Hydrabad','hdb','2017-09-08 13:11:33','1','2017-09-08 13:11:33','11',1,0,'BLZON20170908180254','BLCNT20170908182622','BLSTC20170908184133');
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
  `clnt_id` varchar(20) NOT NULL,
  `subject_code` varchar(20) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `category_code` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`,`subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_subject`
--

LOCK TABLES `bl_subject` WRITE;
/*!40000 ALTER TABLE `bl_subject` DISABLE KEYS */;
INSERT INTO `bl_subject` VALUES (1,'BLCLT20170908191531','BLSUB20170908214029','db','2017-09-08 16:10:29','1','2017-09-08 16:10:29','1',0,1,'BLSCT20170908205522'),(2,'BLCLT20170908191531','BLSUB20170908214823','db123','2017-09-08 16:18:23','1','2017-09-08 16:39:18','1',0,0,'BLSCT20170908205522');
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
  `client_id` varchar(20) NOT NULL,
  `topic_code` varchar(20) NOT NULL,
  `topic_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `category_code` varchar(150) DEFAULT NULL,
  `subject_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_topic`
--

LOCK TABLES `bl_topic` WRITE;
/*!40000 ALTER TABLE `bl_topic` DISABLE KEYS */;
INSERT INTO `bl_topic` VALUES (11,'BLCLT20170908191531','BLTOP20170908222141','dc','2017-09-08 16:51:41','1','2017-09-08 16:54:08','1',0,0,'BLSCT20170908205522','BLSUB20170908214029');
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_user_type_master`
--

LOCK TABLES `bl_user_type_master` WRITE;
/*!40000 ALTER TABLE `bl_user_type_master` DISABLE KEYS */;
INSERT INTO `bl_user_type_master` VALUES (22,'BLUTP20170824105342','Chennai','2017-08-24 05:23:42','1','2017-08-30 12:22:04','1',1,1),(23,'BLUTP20170828161122','ch','2017-08-28 10:41:22','1','2017-08-30 12:22:04','1',1,1),(24,'BLUTP20170828161141','asas qsad','2017-08-28 10:41:41','1','2017-08-30 12:22:04','1',1,1),(25,'BLUTP20170829174635','che','2017-08-29 12:16:36','1','2017-08-30 06:04:32','1',1,1),(26,'BLUTP20170830113446','new user','2017-08-30 06:04:46','1','2017-08-30 12:22:04','1',1,1),(27,'BLUTP20170830113708','new user','2017-08-30 06:07:08','1','2017-08-30 06:09:54','1',1,1),(28,'BLUTP20170830113725','jerry','2017-08-30 06:07:25','1','2017-08-30 06:09:40','1',1,1),(29,'BLUTP20170831114914','RAM DF  E FETR','2017-08-31 06:19:14','1','2017-09-08 13:27:42','1',1,1),(30,'BLUTP20170901135533','Internal','2017-09-01 08:25:33','1','2017-09-01 08:25:33','1',1,0),(31,'BLUTP20170901135540','External','2017-09-01 08:25:40','1','2017-09-01 08:25:40','1',1,0),(32,'BLUTP20170908103908','User Types','2017-09-08 05:09:08','1','2017-09-08 05:09:08','1',1,0),(33,'BLUTP20170908185646','Client Group','2017-09-08 13:26:46','1','2017-09-08 13:27:14','1',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_zone_area_master`
--

LOCK TABLES `bl_zone_area_master` WRITE;
/*!40000 ALTER TABLE `bl_zone_area_master` DISABLE KEYS */;
INSERT INTO `bl_zone_area_master` VALUES (2,'IND','IND',1,1,'2017-08-19 19:19:29','1','2017-08-28 09:29:37','123'),(3,'BLZON20170828145935','efefe',1,1,'2017-08-28 09:29:35','1','2017-08-30 05:38:56','1'),(4,'BLZON20170830105248','Create',0,1,'2017-08-30 05:22:48','1','2017-08-30 05:38:09','1'),(5,'BLZON20170830105846','ZONE',1,1,'2017-08-30 05:28:46','1','2017-08-30 05:38:15','1'),(6,'BLZON20170830110802','ZONE',1,1,'2017-08-30 05:38:02','1','2017-08-30 05:38:47','1'),(7,'BLZON20170830110912','CREATE',1,1,'2017-08-30 05:39:12','1','2017-08-30 11:42:50','1'),(8,'BLZON20170830111642','ZONE',1,1,'2017-08-30 05:46:42','1','2017-08-30 11:42:50','1'),(9,'BLZON20170830171228','ZoneArea',1,1,'2017-08-30 11:42:28','1','2017-08-30 11:42:50','1'),(10,'BLZON20170830171258','ZONE',1,1,'2017-08-30 11:42:58','1','2017-08-30 12:15:37','1'),(11,'BLZON20170830174616','ZONE',1,1,'2017-08-30 12:16:16','1','2017-08-30 12:16:25','1'),(12,'BLZON20170830174719','ZONE',1,1,'2017-08-30 12:17:19','1','2017-08-30 12:17:21','1'),(13,'BLZON20170830174732','ZONE',1,1,'2017-08-30 12:17:32','1','2017-08-30 12:25:13','1'),(14,'BLZON20170901132850','North',1,1,'2017-09-01 07:58:50','1','2017-09-08 12:33:25','1'),(15,'BLZON20170901132859','South',1,1,'2017-09-01 07:58:59','1','2017-09-08 12:33:28','1'),(16,'BLZON20170901132906','East',1,1,'2017-09-01 07:59:06','1','2017-09-08 12:33:31','1'),(17,'BLZON20170901132911','West',1,1,'2017-09-01 07:59:11','1','2017-09-08 12:33:34','1'),(18,'BLZON20170908102559','SDST',1,1,'2017-09-08 04:55:59','1','2017-09-08 12:33:37','1'),(19,'BLZON20170908175419','north east',1,1,'2017-09-08 12:24:19','1','2017-09-08 12:33:42','1'),(20,'BLZON20170908180254','zoneer',1,0,'2017-09-08 12:32:54','1','2017-09-09 08:16:49','1'),(21,'BLZON20170909134124','top',1,0,'2017-09-09 08:11:24','1','2017-09-09 08:11:24','1');
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

-- Dump completed on 2017-09-09 15:44:54

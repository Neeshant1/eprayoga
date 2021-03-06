-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: eprayoga
-- ------------------------------------------------------
-- Server version	5.7.12

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_address_type_master`
--

LOCK TABLES `bl_address_type_master` WRITE;
/*!40000 ALTER TABLE `bl_address_type_master` DISABLE KEYS */;
INSERT INTO `bl_address_type_master` VALUES (10,'BLATP20170829105604','ch','2017-08-29 05:26:04','1','2017-08-30 11:51:57','1',1,1,'BLORT20170822195842'),(11,'BLATP20170901123614','Billing','2017-09-01 07:06:14','1','2017-09-01 07:06:14','1',1,0,'BLORT20170822195842'),(12,'BLATP20170901200653','Residential','2017-09-01 14:36:53','1','2017-09-01 14:36:53','1',1,0,'BLORT20170822195842'),(13,'BLATP20170907184345','rrr','2017-09-07 13:13:45','1','2017-09-07 13:13:52','1',1,1,'BLORT20170906181629');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_category`
--

LOCK TABLES `bl_category` WRITE;
/*!40000 ALTER TABLE `bl_category` DISABLE KEYS */;
INSERT INTO `bl_category` VALUES (2,'22','AAA','mariiii','2017-08-15 17:16:40','1','2017-08-29 05:19:47','2',1,1),(3,'123','A1B','BBB','2017-08-19 11:05:48','1','2017-08-29 05:19:50','2',1,1),(4,'22','vvv','vre','2017-08-23 13:49:57','1','2017-08-29 05:19:51','2',1,1),(5,'123','BLSCT20170829105118','sdfd','2017-08-29 05:21:18','1','2017-08-30 09:39:04','1',1,1),(6,'123','BLSCT20170830150928','science','2017-08-30 09:39:28','1','2017-08-30 09:39:28','1',1,0),(7,'124','BLSCT20170830151505','maths','2017-08-30 09:45:05','1','2017-08-30 09:45:05','1',1,0),(8,'1','BLSCT20170907191004','ew','2017-09-07 13:40:04','1','2017-09-07 13:40:04','1',1,0),(9,'3','BLSCT20170907191037','ssssssssssss','2017-09-07 13:40:37','1','2017-09-07 13:40:37','1',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_city_master`
--

LOCK TABLES `bl_city_master` WRITE;
/*!40000 ALTER TABLE `bl_city_master` DISABLE KEYS */;
INSERT INTO `bl_city_master` VALUES (10,'BLCIT20170831151025','chennai','2017-08-31 09:40:25','1','2017-08-31 10:02:28','11',1,1,'BLSTC20170831145025','BLCNT20170831131758'),(11,'BLCIT20170831153246','ch','2017-08-31 10:02:46','1','2017-08-31 10:05:56','11',1,1,'BLSTC20170831153151','BLCNT20170831131758'),(12,'BLCIT20170831153325','aut','2017-08-31 10:03:25','1','2017-08-31 10:03:25','11',0,1,'BLSTC20170831153103','BLCNT20170831153038'),(13,'BLCIT20170831153607','chennai','2017-08-31 10:06:07','1','2017-08-31 10:06:07','11',0,1,'BLSTC20170831153151','BLCNT20170831131758'),(14,'BLCIT20170831154012','sydney','2017-08-31 10:10:12','1','2017-08-31 10:10:12','11',0,1,'BLSTC20170831153943','BLCNT20170831153902');
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
  `clnt_type_code` varchar(20) DEFAULT NULL,
  `clnt_code` varchar(20) DEFAULT NULL,
  `orig_type_code` varchar(20) DEFAULT NULL,
  `clnt_group_code` varchar(12) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client`
--

LOCK TABLES `bl_client` WRITE;
/*!40000 ALTER TABLE `bl_client` DISABLE KEYS */;
INSERT INTO `bl_client` VALUES (1,'1','BLCTP20170906162645','BLCLT20170906210437','BLORT20170906181629','1','vahai','vini','r','0112776654','9585751450','cse','stu','VINI1234','asdww','vini@vahai.com','123456789','vinitha_rathinam','vinitha_rathinam','aa','a',NULL,'1',NULL,'1',0,1),(2,'1','BLCTP20170906162942','BLCLT20170906214353','BLORT20170906160553','1','sdrq','vini','r','8766544321','9876543210','cseq','stu','VBGH1234','vbhjnik','vini@vahai.com','1234456789','sd','cdf','aa','a',NULL,'1',NULL,'1',0,1),(3,'1','BLCTP20170906162645','BLCLT20170907103301','BLORT20170906181629','1','vinitha','dff','sx','8765432109','9876543210','cse','assssdf','DVHJ1233','cdfr','vini@vahai.com','123456789','hikjikj','vini','aa','a',NULL,'1',NULL,'1',0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_group`
--

LOCK TABLES `bl_client_group` WRITE;
/*!40000 ALTER TABLE `bl_client_group` DISABLE KEYS */;
INSERT INTO `bl_client_group` VALUES (8,1,'BLCLG20170905125640','vahai','vinitha','ram','908','909','df','dff','vini','vini@vahai.com','vinitha','vinitha','vinitha','a','BLORT20170822195842','2017-09-05 07:26:40','1','2017-09-07 06:22:09','1',NULL,NULL,1,'sdf','df',1),(9,1,'BLCLG20170905152857','asdd','ram','krish','9989','9790','me','ij','erffgtgt','edfffed','wsdf','wedf','rffff','a','BLORT20170822195842','2017-09-05 09:58:57','1','2017-09-07 06:22:13','1',NULL,NULL,1,'asdf','ssdfg',1),(10,1,'BLCLG20170907115154','Infy','qwq','dew','8998765432','9876543221','cse','syt','DSFE1234','vinitha@vahai.com','viibjk','vinitha','a','a','BLORT20170906181629','2017-09-07 06:21:54','1','2017-09-07 07:06:23','1',NULL,NULL,0,'huhh','123456789999',1),(11,1,'BLCLG20170907123109','Group Name','RAM RAM','ram','1245678901','1233457890','wwwww','zzzzz','pan123','ram@vahai.com','ram@vahai.com','ram@vahai.com','a','a','BLORT20170906181629','2017-09-07 07:01:09','1','2017-09-07 07:01:09','1',NULL,NULL,0,'ram@vahai.com','1233',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_client_type_master`
--

LOCK TABLES `bl_client_type_master` WRITE;
/*!40000 ALTER TABLE `bl_client_type_master` DISABLE KEYS */;
INSERT INTO `bl_client_type_master` VALUES (1,'BLCTP20170824105204','Adminin',1,1,'2017-08-24 05:22:04','1','2017-09-06 11:03:05','1'),(2,'BLCTP20170906162645','client',1,0,'2017-09-06 10:56:45','1','2017-09-06 11:04:03','1'),(3,'BLCTP20170906162942','ADMIN-Q',1,0,'2017-09-06 10:59:42','1','2017-09-06 11:03:00','1'),(4,'BLCTP20170906163458','If you wanted to test just the first character as being alph',1,1,'2017-09-06 11:04:58','1','2017-09-06 11:05:03','1'),(5,'BLCTP20170906180909','RAMRAM  RAMRAM',1,0,'2017-09-06 12:39:09','1','2017-09-06 12:39:27','1'),(6,'BLCTP20170907182626','clien-',1,0,'2017-09-07 12:56:26','1','2017-09-07 12:56:26','1');
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
  PRIMARY KEY (`country_id`,`country_short_name`,`country_full_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_country_master`
--

LOCK TABLES `bl_country_master` WRITE;
/*!40000 ALTER TABLE `bl_country_master` DISABLE KEYS */;
INSERT INTO `bl_country_master` VALUES (18,'ind','india',1,'2017-08-31 07:47:58','active','2017-08-31 07:48:34','11',1,1,'BLZON20170830144832','BLCNT20170831131758'),(19,'sri','sri lanka',2,'2017-08-31 10:00:38','active','2017-08-31 10:00:38','11',1,0,'BLZON20170830144832','BLCNT20170831153038'),(20,'aus','australia',3,'2017-08-31 10:09:02','active','2017-08-31 10:09:02','11',1,0,'BLZON20170831153349','BLCNT20170831153902');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_currency_code_master`
--

LOCK TABLES `bl_currency_code_master` WRITE;
/*!40000 ALTER TABLE `bl_currency_code_master` DISABLE KEYS */;
INSERT INTO `bl_currency_code_master` VALUES (1,'euro','gg',NULL,'2017-08-22 06:35:05','1','2017-08-24 07:25:50','2',18.000,'0',1,1),(2,'euro','gg',NULL,'2017-08-22 07:12:04','1','2017-08-24 07:25:56','2',18.000,'0',1,1),(3,'euro','11',NULL,'2017-08-24 07:03:00','1','2017-08-24 07:48:29','2',18.000,'1',1,1),(4,'dolllar','BLCCD20170824124812',NULL,'2017-08-24 07:18:12','1','2017-08-24 07:48:29','2',18.000,'0',1,1),(5,'euro','BLCCD20170824131840',NULL,'2017-08-24 07:48:40','1','2017-08-29 08:22:33','2',18.000,'1',1,1),(6,'dfdfd','BLCCD20170829133915',NULL,'2017-08-29 08:09:15','1','2017-08-29 08:22:33','2',89.000,'1',1,1),(7,'ru','BLCCD20170829135249',NULL,'2017-08-29 08:22:49','1','2017-08-29 08:22:49','2',78.000,'1',1,0),(8,'red','BLCCD20170829135301',NULL,'2017-08-29 08:23:01','1','2017-08-29 08:23:01','2',89.000,'1',1,0),(9,'dam','BLCCD20170829135312',NULL,'2017-08-29 08:23:12','1','2017-08-29 08:23:12','2',74.000,'1',1,0),(10,'rupess','BLCCD20170830095133',NULL,'2017-08-30 04:21:33','1','2017-08-30 04:21:33','2',67.000,'1',1,0),(11,'grgr','BLCCD20170830100533',NULL,'2017-08-30 04:35:33','1','2017-08-30 04:35:33','2',56.000,'1',1,0);
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
  `cust_id` varchar(12) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_cust_scrtyqtn_ans`
--

LOCK TABLES `bl_cust_scrtyqtn_ans` WRITE;
/*!40000 ALTER TABLE `bl_cust_scrtyqtn_ans` DISABLE KEYS */;
INSERT INTO `bl_cust_scrtyqtn_ans` VALUES (12,NULL,NULL,'fgfg','2017-09-05 07:26:40',NULL,'2017-09-05 09:40:51',NULL,1,'BLSQC20170829104458',NULL,'BLCLG20170905125640',1),(13,NULL,NULL,'fgfg','2017-09-05 09:22:47',NULL,'2017-09-05 09:40:51',NULL,1,'BLSQC20170829104458',NULL,'BLCLG20170905125640',1),(14,NULL,NULL,'fgfg','2017-09-05 09:26:54',NULL,'2017-09-05 09:40:51',NULL,1,'BLSQC20170829104458',NULL,'BLCLG20170905125640',1),(15,NULL,NULL,'fg','2017-09-05 09:58:57','1','2017-09-05 10:13:30','1',1,'BLSQC20170829104458',NULL,'BLCLG20170905152857',1),(16,NULL,NULL,'dfdf','2017-09-05 10:06:32','1','2017-09-05 10:13:30','1',1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(17,NULL,NULL,'fdff','2017-09-05 10:07:33','1','2017-09-05 10:11:44','1',1,'BLSQC20170829104458','BLCLT20170905153733',NULL,1),(18,NULL,NULL,'dfdf','2017-09-05 10:13:22',NULL,'2017-09-05 10:13:30',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(19,NULL,NULL,'ds','2017-09-06 05:16:34',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(20,NULL,NULL,'dfdf','2017-09-06 05:18:00',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(21,NULL,NULL,'dfdf','2017-09-06 06:21:36',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(22,NULL,NULL,'dfdf','2017-09-06 06:22:01',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(23,NULL,NULL,'dfdf','2017-09-06 13:38:09',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(24,NULL,NULL,'dfdf','2017-09-06 13:45:22',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(25,NULL,NULL,'dfdf','2017-09-06 13:46:54',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(26,NULL,NULL,'dfdf','2017-09-06 13:54:16',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(27,NULL,NULL,'dfdf','2017-09-06 14:05:31',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(28,NULL,NULL,'dfdf','2017-09-06 14:10:36',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(29,NULL,NULL,'dfdf','2017-09-06 14:15:21',NULL,'2017-09-06 14:42:57',NULL,1,'BLSQC20170829104458','BLCLT20170905153632',NULL,1),(30,NULL,NULL,'dsd23','2017-09-06 14:42:18','1','2017-09-06 14:42:18','1',0,'BLSQC20170829104458','BLCLT20170906201218',NULL,1),(31,NULL,NULL,'CDC@#','2017-09-06 14:57:53','1','2017-09-06 14:57:53','1',0,'BLSQC20170829104458','BLCLT20170906202753',NULL,1),(32,NULL,NULL,'CDC@#','2017-09-06 14:59:30',NULL,'2017-09-06 14:59:30',NULL,0,'BLSQC20170829104458','BLCLT20170906202753',NULL,1),(33,NULL,NULL,'CDC@#','2017-09-06 14:59:51',NULL,'2017-09-06 14:59:51',NULL,0,'BLSQC20170829104458','BLCLT20170906202753',NULL,1),(34,NULL,NULL,'CDC@#','2017-09-06 15:00:09',NULL,'2017-09-06 15:00:09',NULL,0,'BLSQC20170829104458','BLCLT20170906202753',NULL,1),(35,NULL,NULL,'sdwd','2017-09-06 15:34:37','1','2017-09-06 15:34:37','1',0,'BLSQC20170829104458','BLCLT20170906210437',NULL,1),(36,NULL,NULL,'sdwd','2017-09-06 15:39:31',NULL,'2017-09-06 15:39:31',NULL,0,'BLSQC20170829104458','BLCLT20170906210437',NULL,1),(37,NULL,NULL,'dcgh','2017-09-06 16:13:53','1','2017-09-06 16:13:53','1',0,'BLSQC20170829104458','BLCLT20170906214353',NULL,1),(38,NULL,NULL,'Security Question?=@Answer','2017-09-07 05:03:01','1','2017-09-07 05:03:01','1',0,'BLSQC20170829104458','BLCLT20170907103301',NULL,1),(39,NULL,NULL,'sdwd','2017-09-07 05:28:14',NULL,'2017-09-07 05:28:14',NULL,0,'BLSQC20170829104458','BLCLT20170906210437',NULL,1),(40,NULL,NULL,'sdwd','2017-09-07 05:35:45',NULL,'2017-09-07 05:35:45',NULL,0,'BLSQC20170829104458','BLCLT20170906210437',NULL,1),(41,NULL,NULL,'sdwd','2017-09-07 05:36:16',NULL,'2017-09-07 05:36:16',NULL,0,'BLSQC20170829104458','BLCLT20170906210437',NULL,1),(42,NULL,NULL,'asa','2017-09-07 06:21:54','1','2017-09-07 06:21:54','1',0,'BLSQC20170829104458',NULL,'BLCLG20170907115154',1),(43,NULL,NULL,'ram @ 134','2017-09-07 07:01:09','1','2017-09-07 07:01:09','1',0,'BLSQC20170829104458',NULL,'BLCLG20170907123109',1),(44,NULL,NULL,'asa','2017-09-07 07:06:23',NULL,'2017-09-07 07:06:23',NULL,0,'BLSQC20170829104458',NULL,'BLCLG20170907115154',1);
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
  `is_deleted` tinyint(1) DEFAULT '0',
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
  `add_type_id` varchar(150) DEFAULT NULL,
  `cust_id` varchar(12) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_customer_address`
--

LOCK TABLES `bl_customer_address` WRITE;
/*!40000 ALTER TABLE `bl_customer_address` DISABLE KEYS */;
INSERT INTO `bl_customer_address` VALUES (37,'1','BLATP20170901123614',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dff','2017-09-05 07:26:40','1','2017-09-05 09:40:51','1',1,'BLCLG20170905125640','BLZON20170830144832',1),(38,'1','BLATP20170901200653',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','dff','2017-09-05 07:26:40','1','2017-09-05 09:40:51','1',1,'BLCLG20170905125640','BLZON20170831153349',1),(39,'1','BLATP20170901123614',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dff','2017-09-05 09:22:46',NULL,'2017-09-05 09:40:51',NULL,1,'BLCLG20170905125640','BLZON20170830144832',1),(40,'1','BLATP20170901200653',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','dff','2017-09-05 09:22:46',NULL,'2017-09-05 09:40:51',NULL,1,'BLCLG20170905125640','BLZON20170831153349',1),(41,'1','BLATP20170901123614',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dff','2017-09-05 09:26:54',NULL,'2017-09-05 09:40:51',NULL,1,'BLCLG20170905125640','BLZON20170830144832',1),(42,'1','BLATP20170901123614',NULL,NULL,NULL,'dfd','dff','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dff','2017-09-05 09:26:54',NULL,'2017-09-05 09:40:51',NULL,1,'BLCLG20170905125640','BLZON20170830144832',1),(43,'1','BLATP20170901123614',NULL,NULL,NULL,'as','sd','fg`','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','hhj','2017-09-05 09:58:57','1','2017-09-05 10:13:30','1',1,'BLCLG20170905152857','BLZON20170830144832',1),(44,'1','BLATP20170901200653',NULL,NULL,NULL,'as','sd','fg`','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','hhj','2017-09-05 09:58:57','1','2017-09-05 10:13:30','1',1,'BLCLG20170905152857','BLZON20170830144832',1),(45,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-05 10:06:32','1','2017-09-05 10:13:30','1',1,'1','BLZON20170830144832',1),(46,'1','BLATP20170901200653',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-05 10:06:32','1','2017-09-05 10:13:30','1',1,'1','BLZON20170830144832',1),(47,'1','BLATP20170901200653',NULL,'BLCLT20170905153733',NULL,'fdf','df','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfdf','2017-09-05 10:07:33','1','2017-09-05 10:11:44','1',1,'1','BLZON20170830144832',1),(48,'1','BLATP20170901200653',NULL,'BLCLT20170905153733',NULL,'fdf','df','df','BLCNT20170831153902','BLSTC20170831153943',NULL,'dfdf','2017-09-05 10:07:33','1','2017-09-05 10:11:44','1',1,'1','BLZON20170831153349',1),(49,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-05 10:13:22',NULL,'2017-09-05 10:13:30',NULL,1,'1','BLZON20170830144832',1),(50,'1','BLATP20170901200653',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-05 10:13:22',NULL,'2017-09-05 10:13:30',NULL,1,'1','BLZON20170830144832',1),(51,'1','BLATP20170901123614',NULL,NULL,'BLEMP20170905154838','asd','asd','as','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','as','2017-09-05 10:18:38','1','2017-09-07 09:24:29','1',1,'1','BLZON20170830144832',1),(52,'1','BLATP20170901200653',NULL,NULL,'BLEMP20170905154838','asd','asd','as','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','as','2017-09-05 10:18:38','1','2017-09-07 09:24:29','1',1,'1','BLZON20170831153349',1),(53,'1','BLATP20170901123614',NULL,NULL,'BLEMP20170905154838','asd','asd','as','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','as','2017-09-05 10:19:36',NULL,'2017-09-07 09:24:29',NULL,1,'1','BLZON20170830144832',1),(54,'1','BLATP20170901200653',NULL,NULL,'BLEMP20170905154838','asd','asd','as','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','as','2017-09-05 10:19:36',NULL,'2017-09-07 09:24:29',NULL,1,'1','BLZON20170831153349',1),(55,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 05:16:34',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(56,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 05:16:34',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(57,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 05:18:00',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(58,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 05:18:00',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(59,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 06:21:36',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(60,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 06:21:36',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(61,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 06:22:01',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(62,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 06:22:01',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(63,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:38:09',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(64,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:38:09',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(65,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:45:22',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(66,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:45:22',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(67,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:46:54',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(68,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:46:54',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(69,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:54:16',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(70,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 13:54:16',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(71,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:05:31',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(72,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:05:31',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(73,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:10:36',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(74,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:10:36',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(75,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:15:21',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(76,'1','BLATP20170901123614',NULL,'BLCLT20170905153632',NULL,'cfg','fgg','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dffg','2017-09-06 14:15:21',NULL,'2017-09-06 14:42:57',NULL,1,'1','BLZON20170830144832',1),(77,'1','BLATP20170901123614',NULL,'BLCLT20170906201218',NULL,'sd','sdsd','sds','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','sdsd','2017-09-06 14:42:18','1','2017-09-06 14:42:18','1',0,'1','BLZON20170831153349',1),(78,'1','BLATP20170901200653',NULL,'BLCLT20170906201218',NULL,'dsd','sdd','sds','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sds','2017-09-06 14:42:18','1','2017-09-06 14:42:18','1',0,'1','BLZON20170830144832',1),(79,'1','BLATP20170901200653',NULL,'BLCLT20170906202753',NULL,'sds','asd','sdw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dde','2017-09-06 14:57:53','1','2017-09-06 14:57:53','1',0,'1','BLZON20170830144832',1),(80,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 14:57:53','1','2017-09-06 14:57:53','1',0,'1','BLZON20170830144832',1),(81,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 14:59:30',NULL,'2017-09-06 14:59:30',NULL,0,'1','BLZON20170830144832',1),(82,'1','BLATP20170901200653',NULL,'BLCLT20170906202753',NULL,'sds','asd','sdw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dde','2017-09-06 14:59:30',NULL,'2017-09-06 14:59:30',NULL,0,'1','BLZON20170830144832',1),(83,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 14:59:51',NULL,'2017-09-06 14:59:51',NULL,0,'1','BLZON20170830144832',1),(84,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 14:59:51',NULL,'2017-09-06 14:59:51',NULL,0,'1','BLZON20170830144832',1),(85,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 15:00:09',NULL,'2017-09-06 15:00:09',NULL,0,'1','BLZON20170830144832',1),(86,'1','BLATP20170901123614',NULL,'BLCLT20170906202753',NULL,'sde','dfrq','fr','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','dfgh','2017-09-06 15:00:09',NULL,'2017-09-06 15:00:09',NULL,0,'1','BLZON20170830144832',1),(87,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-06 15:34:37','1','2017-09-06 15:34:37','1',0,'1','BLZON20170830144832',1),(88,'1','BLATP20170901200653',NULL,'BLCLT20170906210437',NULL,'ssd','w','d','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sds','2017-09-06 15:34:37','1','2017-09-06 15:34:37','1',0,'1','BLZON20170830144832',1),(89,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-06 15:39:31',NULL,'2017-09-06 15:39:31',NULL,0,'1','BLZON20170830144832',1),(90,'1','BLATP20170901200653',NULL,'BLCLT20170906210437',NULL,'ssd','w','d','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sds','2017-09-06 15:39:31',NULL,'2017-09-06 15:39:31',NULL,0,'1','BLZON20170830144832',1),(91,'1','BLATP20170901123614',NULL,'BLCLT20170906214353',NULL,'hjhn','esrf','estr','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','det','2017-09-06 16:13:53','1','2017-09-06 16:13:53','1',0,'1','BLZON20170831153349',1),(92,'1','BLATP20170901200653',NULL,'BLCLT20170906214353',NULL,'vh','drf','drtrf','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','rdt','2017-09-06 16:13:53','1','2017-09-06 16:13:53','1',0,'1','BLZON20170831153349',1),(93,'1','BLATP20170901123614',NULL,'BLCLT20170907103301',NULL,'fcd','df','df','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','df','2017-09-07 05:03:01','1','2017-09-07 05:03:01','1',0,'1','BLZON20170830144832',1),(94,'1','BLATP20170901200653',NULL,'BLCLT20170907103301',NULL,'d','d','d','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','d','2017-09-07 05:03:01','1','2017-09-07 05:03:01','1',0,'1','BLZON20170831153349',1),(95,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:28:14',NULL,'2017-09-07 05:28:14',NULL,0,'1','BLZON20170830144832',1),(96,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:28:14',NULL,'2017-09-07 05:28:14',NULL,0,'1','BLZON20170830144832',1),(97,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:35:45',NULL,'2017-09-07 05:35:45',NULL,0,'1','BLZON20170830144832',1),(98,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:35:45',NULL,'2017-09-07 05:35:45',NULL,0,'1','BLZON20170830144832',1),(99,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:36:16',NULL,'2017-09-07 05:36:16',NULL,0,'1','BLZON20170830144832',1),(100,'1','BLATP20170901123614',NULL,'BLCLT20170906210437',NULL,'as','aswa','sadw','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sed','2017-09-07 05:36:16',NULL,'2017-09-07 05:36:16',NULL,0,'1','BLZON20170830144832',1),(101,'1','BLATP20170901200653',NULL,NULL,NULL,'as','saas','as','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sss','2017-09-07 06:21:54','1','2017-09-07 06:21:54','1',0,'BLCLG20170907115154','BLZON20170830144832',1),(102,'1','BLATP20170901200653',NULL,NULL,NULL,'s','sas','sss','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','sd','2017-09-07 06:21:54','1','2017-09-07 06:21:54','1',0,'BLCLG20170907115154','BLZON20170831153349',1),(103,'1','BLATP20170901200653',NULL,NULL,NULL,'# 1 a','# 1 a','# 1 a','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','# 1 a','2017-09-07 07:01:09','1','2017-09-07 07:01:09','1',0,'BLCLG20170907123109','BLZON20170830144832',1),(104,'1','BLATP20170901123614',NULL,NULL,NULL,'# 1 a','# 1 a','# 1 a','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','# 1 a','2017-09-07 07:01:09','1','2017-09-07 07:01:09','1',0,'BLCLG20170907123109','BLZON20170831153349',1),(105,'1','BLATP20170901200653',NULL,NULL,NULL,'as','saas','as','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','sss','2017-09-07 07:06:23',NULL,'2017-09-07 07:06:23',NULL,0,'BLCLG20170907115154','BLZON20170830144832',1),(106,'1','BLATP20170901200653',NULL,NULL,NULL,'s','sas','sss','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','sd','2017-09-07 07:06:23',NULL,'2017-09-07 07:06:23',NULL,0,'BLCLG20170907115154','BLZON20170831153349',1),(107,'1','BLATP20170901123614',NULL,NULL,'BLEMP20170907145825','dfsd','df','dsf','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','ds','2017-09-07 09:28:25','1','2017-09-07 10:41:31','1',1,'1','BLZON20170830144832',1),(108,'1','BLATP20170901200653',NULL,NULL,'BLEMP20170907145825','fdd','sd','dfs','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','df','2017-09-07 09:28:25','1','2017-09-07 10:41:31','1',1,'1','BLZON20170830144832',1),(109,'1','BLATP20170901123614',NULL,NULL,'BLEMP20170907160934','#  12 W','W @ 12','@ 12 E','BLCNT20170831153902','BLSTC20170831153943','BLCIT20170831154012','QWFWER  QRTRET124R45','2017-09-07 10:39:34','1','2017-09-07 10:39:34','1',0,'1','BLZON20170831153349',1),(110,'1','BLATP20170901123614',NULL,NULL,'BLEMP20170907160934','2 @ A','A @ 2','@ E r 1','BLCNT20170831153038','BLSTC20170831153103','BLCIT20170831153325','SB SNDM F  @@@@@@','2017-09-07 10:39:34','1','2017-09-07 10:39:34','1',0,'1','BLZON20170830144832',1);
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
  `edu_student` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `cust_id` varchar(15) DEFAULT NULL,
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
  `app_email_code` varchar(150) DEFAULT NULL,
  `server_name` varchar(150) NOT NULL,
  `port` int(13) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_email_config`
--

LOCK TABLES `bl_email_config` WRITE;
/*!40000 ALTER TABLE `bl_email_config` DISABLE KEYS */;
INSERT INTO `bl_email_config` VALUES (4,'ADAD','cdAD',556,'aASAs@gmail.com','AAS',1,0,1),(5,'BLEML20170907180010','localhost',8080,'vinitha@vahai.com','1234',1,0,1),(6,'BLEML20170907180049','localhost',8080,'vinitha@vahaitech.com','12345.',1,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_emp_department_master`
--

LOCK TABLES `bl_emp_department_master` WRITE;
/*!40000 ALTER TABLE `bl_emp_department_master` DISABLE KEYS */;
INSERT INTO `bl_emp_department_master` VALUES (1,'BLDEP20170829105616','wfef',1,1,'2017-08-29 05:26:16','1','2017-09-06 11:55:40','123'),(2,'BLDEP20170906165018','Bio-Technology',1,0,'2017-09-06 11:20:18','1','2017-09-06 11:20:18','1'),(3,'BLDEP20170906165033','Computer Science and Engg.',1,0,'2017-09-06 11:20:33','1','2017-09-06 11:20:33','1'),(4,'BLDEP20170906165051','.aA',1,1,'2017-09-06 11:20:51','1','2017-09-06 11:21:05','1'),(5,'BLDEP20170906165345','Computer Science and Enggggg.',1,0,'2017-09-06 11:23:45','1','2017-09-06 11:23:45','1'),(6,'BLDEP20170906181406','Department Name',1,0,'2017-09-06 12:44:06','1','2017-09-06 12:44:06','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_employee`
--

LOCK TABLES `bl_employee` WRITE;
/*!40000 ALTER TABLE `bl_employee` DISABLE KEYS */;
INSERT INTO `bl_employee` VALUES (9,'BLEMP20170904154539','vini','r','90','988','1','A','bj','hkj','hjjhj','hjh','df','A','xd','sd','s','2017-09-04 10:15:40','1','2017-09-04 10:15:40','1','1',1,1),(10,'BLEMP20170904155012','vinitha','ramkrish','98','890','1','A','iu','vini','jkj','hjh','jkj','A','jk','jkj','s','2017-09-04 10:20:12','1','2017-09-04 10:20:12','1','1',1,1),(11,'BLEMP20170905154838','vini','r','9876543210','8976543210','1','A','bii','huoio','iok','hjih','ioio','A','fdf','df','s','2017-09-05 10:18:38','1','2017-09-05 10:18:38','1','1',1,1),(12,'BLEMP20170907145825','vini','r','9876543210','7865643179','1','A','gjhj1233','vini@vahai.com','bhj','vini','a','A','sd','jhjh','s','2017-09-07 09:28:25','1','2017-09-07 09:28:25','1','1',1,0),(13,'BLEMP20170907160934','ram ram','RAM RAM','1234567890','9123456788','1','A','ABC','234@RAM.COM','SFGDFHDHHH','ASDFGSG','a','A','SFGFHDHH','SDFGFHHFH','s','2017-09-07 10:39:34','1','2017-09-07 10:39:34','1','2',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_faq`
--

LOCK TABLES `bl_faq` WRITE;
/*!40000 ALTER TABLE `bl_faq` DISABLE KEYS */;
INSERT INTO `bl_faq` VALUES (4,'BLFAQ20170831180436',1,'cvxf','vdsvsdv','sdvsdvsd','dsvvd',1,'2017-08-31 12:34:36','1','2017-08-31 12:34:36','1',1,0,'BLFAC20170824110641'),(5,'BLFAQ20170831184243',1,'dndnd','sdffve','efcece','ececec',0,'2017-08-31 13:12:43','1','2017-08-31 13:12:43','1',1,0,'BLFAC20170828162935');
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
-- Table structure for table `bl_language_master`
--

DROP TABLE IF EXISTS `bl_language_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bl_language_master` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(25) NOT NULL,
  `language_code` varchar(20) NOT NULL,
  `iso_code` varchar(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_language_master`
--

LOCK TABLES `bl_language_master` WRITE;
/*!40000 ALTER TABLE `bl_language_master` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_origin_type_master`
--

LOCK TABLES `bl_origin_type_master` WRITE;
/*!40000 ALTER TABLE `bl_origin_type_master` DISABLE KEYS */;
INSERT INTO `bl_origin_type_master` VALUES (5,'BLORT20170822195842','Google','2017-08-22 14:28:42','1','2017-09-06 10:35:59','123',1,0),(6,'BLORT20170906160505','GOOGLE p','2017-09-06 10:35:05','1','2017-09-06 10:43:59','1',1,1),(7,'BLORT20170906160553','FACEBOOK','2017-09-06 10:35:53','1','2017-09-06 10:44:19','1',0,1),(8,'BLORT20170906161517','vA','2017-09-06 10:45:17','1','2017-09-06 12:46:39','1',1,1),(9,'BLORT20170906181629','Google+','2017-09-06 12:46:29','1','2017-09-06 12:46:29','1',0,1),(10,'BLORT20170906181644','google.com','2017-09-06 12:46:44','1','2017-09-06 12:46:56','1',0,1),(11,'BLORT20170907181759','xc','2017-09-07 12:47:59','1','2017-09-07 12:48:04','1',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_sms_config`
--

LOCK TABLES `bl_sms_config` WRITE;
/*!40000 ALTER TABLE `bl_sms_config` DISABLE KEYS */;
INSERT INTO `bl_sms_config` VALUES (1,'safasf','afaf','asf','adsd','afsf','1','asfad','adad','ada','1','2017-08-28 12:33:08','123','1',1,1),(2,'sfsd','sfs','dsffd','sfdfsdf','sdfsdf','1','95845','dfsdfsf','sdfsdfs','1','2017-08-28 13:01:42','123','1',1,0),(3,'BLSMS20170907174258','feds','fd','qwer','eed','1','5667879890','sdfs','dffffg','1','2017-09-07 12:12:58','1','1',1,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_state_master`
--

LOCK TABLES `bl_state_master` WRITE;
/*!40000 ALTER TABLE `bl_state_master` DISABLE KEYS */;
INSERT INTO `bl_state_master` VALUES (8,'tamil nadu',NULL,'2017-08-31 09:20:25','1','2017-08-31 10:01:34','11',1,1,'BLZON20170830144832','BLCNT20170831131758','BLSTC20170831145025'),(9,'ap',NULL,'2017-08-31 09:58:08','1','2017-08-31 10:01:40','11',1,1,'BLZON20170830144832','BLCNT20170831131758','BLSTC20170831152808'),(10,'colombo',NULL,'2017-08-31 10:01:03','1','2017-08-31 10:01:03','11',1,0,'BLZON20170830144832','BLCNT20170831153038','BLSTC20170831153103'),(11,'tn',NULL,'2017-08-31 10:01:51','1','2017-08-31 10:01:51','11',1,0,'BLZON20170830144832','BLCNT20170831131758','BLSTC20170831153151'),(12,'east',NULL,'2017-08-31 10:09:43','1','2017-08-31 10:09:43','11',1,0,'BLZON20170831153349','BLCNT20170831153902','BLSTC20170831153943'),(13,'State Name',NULL,'2017-09-07 10:52:50','1','2017-09-07 10:52:50','11',1,0,'BLZON20170830144832','BLCNT20170831153038','BLSTC20170907162250');
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
  `subject_code` varchar(20) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `created_on_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` varchar(30) NOT NULL,
  `last_update_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_update_user_id` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `category_code` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`subject_id`,`subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_subject`
--

LOCK TABLES `bl_subject` WRITE;
/*!40000 ALTER TABLE `bl_subject` DISABLE KEYS */;
INSERT INTO `bl_subject` VALUES (10,'343','BLSUB20170831172708','bio','2017-08-31 11:57:08','1','2017-08-31 11:57:08','1',0,1,'BLSCT20170830150928'),(11,'345','BLSUB20170831173130','physics','2017-08-31 12:01:30','1','2017-08-31 12:01:40','1',0,1,'BLSCT20170830150928');
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
INSERT INTO `bl_topic` VALUES (10,3,'BLTOP20170907185941','vinih','2017-09-07 13:29:41','1','2017-09-07 13:29:41','1',0,1,'BLSCT20170830150928','BLSUB20170831173130'),(11,1,'BLTOP20170907185953','zoo','2017-09-07 13:29:53','1','2017-09-07 13:29:53','1',0,1,'BLSCT20170830150928','BLSUB20170831172708');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bl_zone_area_master`
--

LOCK TABLES `bl_zone_area_master` WRITE;
/*!40000 ALTER TABLE `bl_zone_area_master` DISABLE KEYS */;
INSERT INTO `bl_zone_area_master` VALUES (2,'IND','IND',1,1,'2017-08-19 19:19:29','1','2017-08-28 09:29:37','123'),(3,'BLZON20170828145935','efefe',1,1,'2017-08-28 09:29:35','1','2017-08-31 07:35:02','1'),(4,'BLZON20170829194616','sdsd',1,1,'2017-08-29 14:16:16','1','2017-08-31 07:35:04','1'),(5,'BLZON20170830144832','zoneone',1,0,'2017-08-30 09:18:32','1','2017-08-30 09:18:32','1'),(6,'BLZON20170831153349','zonetwo',1,0,'2017-08-31 10:03:49','1','2017-08-31 10:03:49','1');
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

-- Dump completed on 2017-09-07 19:12:22

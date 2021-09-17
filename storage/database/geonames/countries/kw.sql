-- MySQL dump 10.13  Distrib 5.7.32, for osx10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: laraclassified
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Dumping data for table `<<prefix>>subadmin1`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin1` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.08','KW','{\"en\":\"Hawalli\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.02','KW','{\"en\":\"Al Asimah\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.05','KW','{\"en\":\"Al Jahrāʼ\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.07','KW','{\"en\":\"Al Farwaniyah\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.04','KW','{\"en\":\"Al Aḩmadī\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('KW.09','KW','{\"en\":\"Mubārak al Kabīr\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Janūb as Surrah\"}',47.98,29.27,'P','PPL','KW.07',NULL,18496,'Asia/Kuwait',1,'2015-01-03 23:00:00','2015-01-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ḩawallī\"}',48.03,29.33,'P','PPLA','KW.08',NULL,164212,'Asia/Kuwait',1,'2013-08-03 23:00:00','2013-08-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Bayān\"}',48.05,29.30,'P','PPLX','KW.08',NULL,30635,'Asia/Kuwait',1,'2016-09-12 23:00:00','2016-09-12 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Az Zawr\"}',48.27,29.44,'P','PPL','KW.02',NULL,5750,'Asia/Kuwait',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"As Sālimīyah\"}',48.08,29.33,'P','PPLX','KW.08',NULL,147649,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ash Shāmīyah\"}',47.96,29.35,'P','PPLX','KW.02',NULL,13762,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ar Rumaythīyah\"}',48.07,29.31,'P','PPLX','KW.08',NULL,58135,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ar Riqqah\"}',48.09,29.15,'P','PPL','KW.04',NULL,52068,'Asia/Kuwait',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Wafrah\"}',47.93,28.64,'P','PPL','KW.04',NULL,10017,'Asia/Kuwait',1,'2013-05-03 23:00:00','2013-05-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Manqaf\"}',48.13,29.10,'P','PPL','KW.04',NULL,39025,'Asia/Kuwait',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Mahbūlah\"}',48.13,29.14,'P','PPL','KW.04',NULL,18178,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Kuwait City\"}',47.98,29.37,'P','PPLC','KW.02',NULL,60064,'Asia/Kuwait',1,'2017-06-21 23:00:00','2017-06-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Jahrā’\"}',47.66,29.34,'P','PPLA','KW.05',NULL,24281,'Asia/Kuwait',1,'2013-05-04 23:00:00','2013-05-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Faḩāḩīl\"}',48.13,29.08,'P','PPL','KW.04',NULL,68290,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Finţās\"}',48.12,29.17,'P','PPL','KW.04',NULL,23071,'Asia/Kuwait',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Farwānīyah\"}',47.96,29.28,'P','PPLA','KW.07',NULL,86525,'Asia/Kuwait',1,'2019-02-25 23:00:00','2019-02-25 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Al Aḩmadī\"}',48.08,29.08,'P','PPLA','KW.04',NULL,637411,'Asia/Kuwait',1,'2014-01-03 23:00:00','2014-01-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ad Dasmah\"}',48.00,29.36,'P','PPL','KW.02',NULL,17585,'Asia/Kuwait',1,'2015-01-03 23:00:00','2015-01-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Salwá\"}',48.08,29.30,'P','PPLX','KW.08',NULL,40945,'Asia/Kuwait',1,'2020-06-10 23:00:00','2020-06-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Ar Rābiyah\"}',47.93,29.30,'P','PPLX','KW.02',NULL,36447,'Asia/Kuwait',1,'2012-10-18 23:00:00','2012-10-18 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Şabāḩ as Sālim\"}',48.06,29.26,'P','PPL','KW.09',NULL,139163,'Asia/Kuwait',1,'2017-06-21 23:00:00','2017-06-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('KW','{\"en\":\"Mubārak al Kabīr\"}',48.09,29.19,'P','PPLA','KW.09',NULL,0,'Asia/Kuwait',1,'2013-07-02 23:00:00','2013-07-02 23:00:00');
/*!40000 ALTER TABLE `<<prefix>>cities` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed

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
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.06','BZ','{\"en\":\"Toledo\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.05','BZ','{\"en\":\"Stann Creek\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.04','BZ','{\"en\":\"Orange Walk\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.03','BZ','{\"en\":\"Corozal\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.02','BZ','{\"en\":\"Cayo\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('BZ.01','BZ','{\"en\":\"Belize\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('BZ.04.6942862','BZ','BZ.04','{\"en\":\"Hopelchén\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('BZ.05.9252696','BZ','BZ.05','{\"en\":\"Dangriga\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"San Pedro\"}',-87.97,17.92,'P','PPL','BZ.01',NULL,8418,'America/Belize',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"San Ignacio\"}',-89.07,17.16,'P','PPL','BZ.02',NULL,16812,'America/Belize',1,'2016-10-15 23:00:00','2016-10-15 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Punta Gorda\"}',-88.81,16.10,'P','PPLA','BZ.06',NULL,5205,'America/Belize',1,'2013-06-26 23:00:00','2013-06-26 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Orange Walk\"}',-88.56,18.08,'P','PPLA','BZ.04',NULL,15298,'America/Belize',1,'2017-12-24 23:00:00','2017-12-24 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Dangriga\"}',-88.23,16.97,'P','PPLA','BZ.05','BZ.05.9252696',10750,'America/Belize',1,'2014-08-02 23:00:00','2014-08-02 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Corozal\"}',-88.39,18.39,'P','PPLA','BZ.03',NULL,9871,'America/Belize',1,'2013-06-26 23:00:00','2013-06-26 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Benque Viejo el Carmen\"}',-89.14,17.07,'P','PPL','BZ.02',NULL,7092,'America/Belize',1,'2017-08-01 23:00:00','2017-08-01 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Belmopan\"}',-88.77,17.25,'P','PPLC','BZ.02',NULL,13381,'America/Belize',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('BZ','{\"en\":\"Belize City\"}',-88.20,17.50,'P','PPLA','BZ.01',NULL,61461,'America/Belize',1,'2013-09-26 23:00:00','2013-09-26 23:00:00');
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

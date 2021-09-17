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
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.01','OM','{\"en\":\"Ad Dakhiliyah\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.02','OM','{\"en\":\"Al Batinah South\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.03','OM','{\"en\":\"Al Wusţá\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.04','OM','{\"en\":\"Southeastern Governorate\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.09','OM','{\"en\":\"Az̧ Z̧āhirah\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.06','OM','{\"en\":\"Muscat\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.07','OM','{\"en\":\"Musandam\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.08','OM','{\"en\":\"Dhofar\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.10','OM','{\"en\":\"Al Buraimi\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.12','OM','{\"en\":\"Northeastern Governorate\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('OM.11','OM','{\"en\":\"Al Batinah North\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('OM.07.11748046','OM','OM.07','{\"en\":\"Madha\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Sur\"}',59.53,22.57,'P','PPLA','OM.04',NULL,71152,'Asia/Muscat',1,'2016-01-22 23:00:00','2016-01-22 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Sohar\"}',56.71,24.35,'P','PPLA','OM.11',NULL,108274,'Asia/Muscat',1,'2017-05-23 23:00:00','2017-05-23 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Sufālat Samā’il\"}',58.02,23.32,'P','PPL','OM.01',NULL,47718,'Asia/Muscat',1,'2014-09-30 23:00:00','2014-09-30 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Shināş\"}',56.47,24.74,'P','PPL','OM.11',NULL,48009,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Şalālah\"}',54.09,17.02,'P','PPLA','OM.08',NULL,163140,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Şaḩam\"}',56.89,24.17,'P','PPL','OM.11',NULL,89327,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Nizwá\"}',57.53,22.93,'P','PPLA','OM.01',NULL,72076,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Muscat\"}',58.41,23.58,'P','PPLC','OM.06',NULL,797000,'Asia/Muscat',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Khasab\"}',56.25,26.18,'P','PPLA','OM.07',NULL,17904,'Asia/Muscat',1,'2017-04-24 23:00:00','2017-04-24 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Izkī\"}',57.77,22.93,'P','PPL','OM.01',NULL,36203,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"‘Ibrī\"}',56.52,23.23,'P','PPL','OM.09',NULL,101640,'Asia/Muscat',1,'2019-09-26 23:00:00','2019-09-26 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Ibrā’\"}',58.53,22.69,'P','PPLA','OM.12',NULL,25265,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Haymā’\"}',56.28,19.96,'P','PPLA','OM.03',NULL,1294,'Asia/Muscat',1,'2013-11-11 23:00:00','2013-11-11 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Bidbid\"}',58.13,23.41,'P','PPL','OM.01',NULL,21188,'Asia/Muscat',1,'2012-04-04 23:00:00','2012-04-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Bawshar\"}',58.40,23.58,'P','PPL','OM.06',NULL,159487,'Asia/Muscat',1,'2018-01-09 23:00:00','2018-01-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Barkā’\"}',57.89,23.68,'P','PPLX','OM.02',NULL,81647,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Bahlā’\"}',57.30,22.98,'P','PPL','OM.01',NULL,54338,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Badīyah\"}',58.80,22.45,'P','PPL','OM.12',NULL,18479,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"As Suwayq\"}',57.44,23.85,'P','PPL','OM.11',NULL,107143,'Asia/Muscat',1,'2018-01-09 23:00:00','2018-01-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Seeb\"}',58.19,23.67,'P','PPL','OM.06',NULL,237816,'Asia/Muscat',1,'2015-11-29 23:00:00','2015-11-29 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Rustaq\"}',57.42,23.39,'P','PPL','OM.02',NULL,79383,'Asia/Muscat',1,'2013-08-09 23:00:00','2013-08-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Al Qābil\"}',58.69,22.57,'P','PPL','OM.12',NULL,14008,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Liwá\"}',56.56,24.53,'P','PPL','OM.11',NULL,26372,'Asia/Muscat',1,'2017-12-06 23:00:00','2017-12-06 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Al Khābūrah\"}',57.09,23.97,'P','PPL','OM.11',NULL,50223,'Asia/Muscat',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Al Buraymī\"}',55.79,24.25,'P','PPLA','OM.10',NULL,73670,'Asia/Muscat',1,'2017-04-23 23:00:00','2017-04-23 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Adam\"}',57.53,22.38,'P','PPL','OM.01',NULL,17283,'Asia/Muscat',1,'2018-04-05 23:00:00','2018-04-05 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Yanqul\"}',56.54,23.59,'P','PPL','OM.09',NULL,16599,'Asia/Muscat',1,'2018-01-10 23:00:00','2018-01-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Bayt al ‘Awābī\"}',57.52,23.30,'P','PPLX','OM.02',NULL,10711,'Asia/Muscat',1,'2018-01-10 23:00:00','2018-01-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('OM','{\"en\":\"Oman Smart Future City\"}',57.60,23.65,'P','PPLF','OM.02',NULL,25000,'Asia/Muscat',1,'2018-01-23 23:00:00','2018-01-23 23:00:00');
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

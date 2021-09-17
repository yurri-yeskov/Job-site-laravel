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
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.01','ER','{\"en\":\"Anseba\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.02','ER','{\"en\":\"Debub\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.03','ER','{\"en\":\"Southern Red Sea\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.04','ER','{\"en\":\"Gash-Barka\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.05','ER','{\"en\":\"Maekel\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('ER.06','ER','{\"en\":\"Northern Red Sea\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.328827','ER','ER.02','{\"en\":\"Serayē Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.329423','ER','ER.06','{\"en\":\"Sahil Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.335174','ER','ER.04','{\"en\":\"Hamasēn Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.344451','ER','ER.02','{\"en\":\"Ākale Guzay Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.413927','ER','ER.04','{\"en\":\"Barka Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.03.413928','ER','ER.03','{\"en\":\"Denkel Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.413929','ER','ER.06','{\"en\":\"Semhar Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.413930','ER','ER.06','{\"en\":\"Senhit Āwraja\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9165816','ER','ER.06','{\"en\":\"Af\'abet\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.9165822','ER','ER.04','{\"en\":\"Dghe\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.05.9166015','ER','ER.05','{\"en\":\"Berikh\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.05.9166018','ER','ER.05','{\"en\":\"Ghala Nefhi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.05.9166024','ER','ER.05','{\"en\":\"Serejaka\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.05.9166027','ER','ER.05','{\"en\":\"South Eastern Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.05.9166028','ER','ER.05','{\"en\":\"South Western Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166029','ER','ER.01','{\"en\":\"Adi Tekelezan Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166032','ER','ER.01','{\"en\":\"Asmat\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166033','ER','ER.01','{\"en\":\"Elabered Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9166034','ER','ER.06','{\"en\":\"North Eastern Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166038','ER','ER.01','{\"en\":\"Hagaz Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166039','ER','ER.01','{\"en\":\"Halhal Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166040','ER','ER.01','{\"en\":\"Habero Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166042','ER','ER.01','{\"en\":\"Kerkebet\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166043','ER','ER.01','{\"en\":\"Keren Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.9166044','ER','ER.01','{\"en\":\"Sela Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.9166045','ER','ER.04','{\"en\":\"Akurdet Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.9166046','ER','ER.04','{\"en\":\"Barentu Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9166047','ER','ER.06','{\"en\":\"Dahlak Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9166048','ER','ER.06','{\"en\":\"Ghinda Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9166050','ER','ER.06','{\"en\":\"Massawa Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.9166052','ER','ER.06','{\"en\":\"Nakfa Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.9166054','ER','ER.02','{\"en\":\"Dekemhare Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.9166055','ER','ER.02','{\"en\":\"Mendefera Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.9166056','ER','ER.02','{\"en\":\"Senafe Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.03.9166057','ER','ER.03','{\"en\":\"Southern Denkalya Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.10114297','ER','ER.02','{\"en\":\"Mai-Mne Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10172859','ER','ER.04','{\"en\":\"Logo Anseba\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177504','ER','ER.04','{\"en\":\"Teseney Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177509','ER','ER.04','{\"en\":\"Haykota Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177510','ER','ER.04','{\"en\":\"Gogne Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177511','ER','ER.04','{\"en\":\"Mogolo Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177512','ER','ER.04','{\"en\":\"Mensura Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.04.10177513','ER','ER.04','{\"en\":\"Shambuko Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.02.10177514','ER','ER.02','{\"en\":\"Areza Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.03.10375723','ER','ER.03','{\"en\":\"Central Denkalya Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.01.10627798','ER','ER.01','{\"en\":\"Geleb Subregion\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.10628668','ER','ER.06','{\"en\":\"Ghelaelo\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('ER.06.10628671','ER','ER.06','{\"en\":\"Foro Sub-Region\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Massawa\"}',39.47,15.61,'P','PPLA','ER.06',NULL,23100,'Africa/Asmara',1,'2012-08-04 23:00:00','2012-08-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Keren\"}',38.45,15.78,'P','PPLA','ER.01',NULL,74800,'Africa/Asmara',1,'2019-03-11 23:00:00','2019-03-11 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Edd\"}',41.69,13.93,'P','PPL','ER.03',NULL,11259,'Africa/Asmara',1,'2020-02-27 23:00:00','2020-02-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Dek’emhāre\"}',39.05,15.07,'P','PPL','ER.02',NULL,10959,'Africa/Asmara',1,'2020-06-10 23:00:00','2020-06-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Barentu\"}',37.59,15.11,'P','PPLA','ER.04',NULL,15891,'Africa/Asmara',1,'2019-03-11 23:00:00','2019-03-11 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Asmara\"}',38.93,15.34,'P','PPLC','ER.05',NULL,563930,'Africa/Asmara',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Assab\"}',42.74,13.01,'P','PPLA','ER.03',NULL,21300,'Africa/Asmara',1,'2012-01-18 23:00:00','2012-01-18 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Ak’ordat\"}',37.88,15.55,'P','PPL','ER.04',NULL,8857,'Africa/Asmara',1,'2020-06-10 23:00:00','2020-06-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Mendefera\"}',38.82,14.89,'P','PPLA','ER.02',NULL,17781,'Africa/Asmara',1,'2020-02-28 23:00:00','2020-02-28 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('ER','{\"en\":\"Adi Keyh\"}',39.38,14.84,'P','PPL','ER.02',NULL,13061,'Africa/Asmara',1,'2020-06-19 23:00:00','2020-06-19 23:00:00');
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

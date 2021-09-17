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
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.G2','NZ','{\"en\":\"Wellington\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F3','NZ','{\"en\":\"Manawatu-Wanganui\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.G1','NZ','{\"en\":\"Waikato\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.TAS','NZ','{\"en\":\"Tasman\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F9','NZ','{\"en\":\"Taranaki\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F8','NZ','{\"en\":\"Southland\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.E8','NZ','{\"en\":\"Bay of Plenty\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F6','NZ','{\"en\":\"Northland\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F4','NZ','{\"en\":\"Marlborough\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F2','NZ','{\"en\":\"Hawke\'s Bay\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F1','NZ','{\"en\":\"Gisborne\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.E9','NZ','{\"en\":\"Canterbury\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.E7','NZ','{\"en\":\"Auckland\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.10','NZ','{\"en\":\"Chatham Islands\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F5','NZ','{\"en\":\"Nelson\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.F7','NZ','{\"en\":\"Otago\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('NZ.G3','NZ','{\"en\":\"West Coast\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F6.002','NZ','NZ.F6','{\"en\":\"Whangarei\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.025','NZ','NZ.E8','{\"en\":\"Whakatane District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G3.057','NZ','NZ.G3','{\"en\":\"Westland District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.020','NZ','NZ.G1','{\"en\":\"Waitomo District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F2.029','NZ','NZ.F2','{\"en\":\"Wairoa District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.066','NZ','NZ.E9','{\"en\":\"Waimate District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.064','NZ','NZ.E9','{\"en\":\"Timaru District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.011','NZ','NZ.G1','{\"en\":\"Thames-Coromandel District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.021','NZ','NZ.G1','{\"en\":\"Taupo District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F9.034','NZ','NZ.F9','{\"en\":\"Stratford District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.024','NZ','NZ.E8','{\"en\":\"Rotorua District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.038','NZ','NZ.F3','{\"en\":\"Rangitikei District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.018','NZ','NZ.G1','{\"en\":\"Otorohanga District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.027','NZ','NZ.E8','{\"en\":\"Opotiki District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F9.033','NZ','NZ.F9','{\"en\":\"New Plymouth District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.048','NZ','NZ.G2','{\"en\":\"Masterton District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.026','NZ','NZ.E8','{\"en\":\"Kawerau District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F2.030','NZ','NZ.F2','{\"en\":\"Hastings District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F8.074','NZ','NZ.F8','{\"en\":\"Gore District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F1.028','NZ','NZ.F1','{\"en\":\"Gisborne District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.049','NZ','NZ.G2','{\"en\":\"Carterton District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E7.076','NZ','NZ.E7','{\"en\":\"Auckland\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.063','NZ','NZ.E9','{\"en\":\"Ashburton District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G3.055','NZ','NZ.G3','{\"en\":\"Buller District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F2.032','NZ','NZ.F2','{\"en\":\"Central Hawke\'s Bay District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F7.069','NZ','NZ.F7','{\"en\":\"Central Otago District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.060','NZ','NZ.E9','{\"en\":\"Christchurch City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F7.072','NZ','NZ.F7','{\"en\":\"Clutha District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F7.071','NZ','NZ.F7','{\"en\":\"Dunedin City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F6.001','NZ','NZ.F6','{\"en\":\"Far North District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G3.056','NZ','NZ.G3','{\"en\":\"Grey District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.016','NZ','NZ.G1','{\"en\":\"Hamilton City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.012','NZ','NZ.G1','{\"en\":\"Hauraki District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.042','NZ','NZ.F3','{\"en\":\"Horowhenua District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.058','NZ','NZ.E9','{\"en\":\"Hurunui District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F8.075','NZ','NZ.F8','{\"en\":\"Invercargill City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.054','NZ','NZ.E9','{\"en\":\"Kaikoura District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F6.003','NZ','NZ.F6','{\"en\":\"Kaipara District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.043','NZ','NZ.G2','{\"en\":\"Kapiti Coast District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.046','NZ','NZ.G2','{\"en\":\"Lower Hutt City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.065','NZ','NZ.E9','{\"en\":\"Mackenzie District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.039','NZ','NZ.F3','{\"en\":\"Manawatu District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F4.053','NZ','NZ.F4','{\"en\":\"Marlborough District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.015','NZ','NZ.G1','{\"en\":\"Matamata-Piako District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F2.031','NZ','NZ.F2','{\"en\":\"Napier City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F5.052','NZ','NZ.F5','{\"en\":\"Nelson City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.040','NZ','NZ.F3','{\"en\":\"Palmerston North City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.044','NZ','NZ.G2','{\"en\":\"Porirua City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F7.070','NZ','NZ.F7','{\"en\":\"Queenstown-Lakes District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.036','NZ','NZ.F3','{\"en\":\"Ruapehu District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.062','NZ','NZ.E9','{\"en\":\"Selwyn District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F8.073','NZ','NZ.F8','{\"en\":\"Southland District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F9.035','NZ','NZ.F9','{\"en\":\"South Taranaki District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.019','NZ','NZ.G1','{\"en\":\"South Waikato District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.050','NZ','NZ.G2','{\"en\":\"South Wairarapa District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.TAS.051','NZ','NZ.TAS','{\"en\":\"Tasman District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.023','NZ','NZ.E8','{\"en\":\"Tauranga City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.045','NZ','NZ.G2','{\"en\":\"Upper Hutt City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.013','NZ','NZ.G1','{\"en\":\"Waikato District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.059','NZ','NZ.E9','{\"en\":\"Waimakariri District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G1.017','NZ','NZ.G1','{\"en\":\"Waipa District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.037','NZ','NZ.F3','{\"en\":\"Wanganui District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.G2.047','NZ','NZ.G2','{\"en\":\"Wellington City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E8.022','NZ','NZ.E8','{\"en\":\"Western Bay of Plenty District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.F3.041','NZ','NZ.F3','{\"en\":\"Tararua District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('NZ.E9.068','NZ','NZ.E9','{\"en\":\"Waitaki District\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Wellington\"}',174.78,-41.29,'P','PPLC','NZ.G2','NZ.G2.047',381900,'Pacific/Auckland',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Whanganui\"}',175.05,-39.93,'P','PPL','NZ.F3','NZ.F3.037',40268,'Pacific/Auckland',1,'2020-10-27 23:00:00','2020-10-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Waiuku\"}',174.73,-37.25,'P','PPL','NZ.E7','NZ.E7.076',7555,'Pacific/Auckland',1,'2015-03-16 23:00:00','2015-03-16 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Tokoroa\"}',175.87,-38.23,'P','PPL','NZ.G1','NZ.G1.019',14277,'Pacific/Auckland',1,'2014-11-02 23:00:00','2014-11-02 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Timaru\"}',171.25,-44.40,'P','PPL','NZ.E9','NZ.E9.064',28007,'Pacific/Auckland',1,'2015-04-30 23:00:00','2015-04-30 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Taupo\"}',176.08,-38.68,'P','PPL','NZ.G1','NZ.G1.021',22469,'Pacific/Auckland',1,'2017-09-14 23:00:00','2017-09-14 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Richmond\"}',173.18,-41.33,'P','PPLA','NZ.TAS','NZ.TAS.051',14000,'Pacific/Auckland',1,'2019-06-04 23:00:00','2019-06-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Pukekohe East\"}',174.95,-37.20,'P','PPL','NZ.E7','NZ.E7.076',21438,'Pacific/Auckland',1,'2015-03-04 23:00:00','2015-03-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Motueka\"}',173.02,-41.13,'P','PPL','NZ.TAS','NZ.TAS.051',7485,'Pacific/Auckland',1,'2017-06-04 23:00:00','2017-06-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Porirua\"}',174.85,-41.13,'P','PPL','NZ.G2','NZ.G2.044',50914,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Paraparaumu\"}',175.02,-40.92,'P','PPL','NZ.G2','NZ.G2.043',25263,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Papatowai\"}',169.47,-46.56,'P','PPL','NZ.F7','NZ.F7.072',6593,'Pacific/Auckland',1,'2015-03-05 23:00:00','2015-03-05 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Palmerston North\"}',175.61,-40.36,'P','PPLA','NZ.F3','NZ.F3.040',75996,'Pacific/Auckland',1,'2019-02-27 23:00:00','2019-02-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"North Shore\"}',174.75,-36.80,'P','PPLX','NZ.E7','NZ.E7.076',207865,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"New Plymouth\"}',174.08,-39.07,'P','PPLA','NZ.F9','NZ.F9.033',49168,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Nelson\"}',173.28,-41.27,'P','PPLA','NZ.F5','NZ.F5.052',59200,'Pacific/Auckland',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Napier\"}',176.91,-39.49,'P','PPLA','NZ.F2','NZ.F2.031',56787,'Pacific/Auckland',1,'2017-05-23 23:00:00','2017-05-23 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Manukau City\"}',174.88,-36.99,'P','PPL','NZ.E7','NZ.E7.076',362000,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Mangere\"}',174.80,-36.97,'P','PPL','NZ.E7','NZ.E7.076',55266,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Lower Hutt\"}',174.92,-41.22,'P','PPL','NZ.G2','NZ.G2.046',101194,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Khandallah\"}',174.79,-41.24,'P','PPL','NZ.G2','NZ.G2.047',8500,'Pacific/Auckland',1,'2018-11-13 23:00:00','2018-11-13 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Kerikeri\"}',173.95,-35.23,'P','PPL','NZ.F6','NZ.F6.001',5654,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Kawerau\"}',176.70,-38.10,'P','PPL','NZ.E8','NZ.E8.026',6702,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Invercargill\"}',168.35,-46.40,'P','PPLA','NZ.F8','NZ.F8.075',47287,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Hastings\"}',176.85,-39.64,'P','PPL','NZ.F2','NZ.F2.030',61696,'Pacific/Auckland',1,'2014-01-05 23:00:00','2014-01-05 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Hamilton\"}',175.28,-37.78,'P','PPLA','NZ.G1','NZ.G1.016',152641,'Pacific/Auckland',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Dunedin\"}',170.50,-45.87,'P','PPLA','NZ.F7','NZ.F7.071',114347,'Pacific/Auckland',1,'2017-12-08 23:00:00','2017-12-08 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Christchurch\"}',172.63,-43.53,'P','PPLA','NZ.E9','NZ.E9.060',363926,'Pacific/Auckland',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Auckland\"}',174.76,-36.85,'P','PPLA','NZ.E7','NZ.E7.076',417910,'Pacific/Auckland',1,'2020-05-27 23:00:00','2020-05-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Hawera\"}',174.28,-39.59,'P','PPL','NZ.F9','NZ.F9.035',11068,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Levin\"}',175.28,-40.63,'P','PPL','NZ.F3','NZ.F3.042',19789,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Otaki\"}',175.15,-40.76,'P','PPL','NZ.G2','NZ.G2.043',6086,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Gisborne\"}',178.00,-38.65,'P','PPLA','NZ.F1','NZ.F1.028',34274,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Masterton\"}',175.66,-40.96,'P','PPL','NZ.G2','NZ.G2.048',20698,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Greymouth\"}',171.20,-42.47,'P','PPLA','NZ.G3','NZ.G3.056',9419,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Tauranga\"}',176.17,-37.69,'P','PPLA2','NZ.E8','NZ.E8.023',110338,'Pacific/Auckland',1,'2020-07-24 23:00:00','2020-07-24 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Waitara\"}',174.24,-39.00,'P','PPL','NZ.F9','NZ.F9.033',6318,'Pacific/Auckland',1,'2015-03-04 23:00:00','2015-03-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Papakura\"}',174.94,-37.07,'P','PPL','NZ.E7','NZ.E7.076',28010,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Whakatane\"}',176.99,-37.96,'P','PPLA','NZ.E8','NZ.E8.025',18602,'Pacific/Auckland',1,'2012-02-12 23:00:00','2012-02-12 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Thames\"}',175.54,-37.14,'P','PPL','NZ.G1','NZ.G1.011',7136,'Pacific/Auckland',1,'2014-09-27 23:00:00','2014-09-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Waitangi\"}',-176.56,-43.95,'P','PPLA','NZ.10',NULL,300,'Pacific/Chatham',1,'2011-11-05 23:00:00','2011-11-05 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Gore\"}',168.94,-46.10,'P','PPL','NZ.F8','NZ.F8.074',12108,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Queenstown\"}',168.66,-45.03,'P','PPL','NZ.F7','NZ.F7.070',10442,'Pacific/Auckland',1,'2018-07-24 23:00:00','2018-07-24 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Cromwell\"}',169.20,-45.04,'P','PPL','NZ.F7','NZ.F7.069',5160,'Pacific/Auckland',1,'2019-03-29 23:00:00','2019-03-29 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Oamaru\"}',170.97,-45.10,'P','PPL','NZ.F7',NULL,13000,'Pacific/Auckland',1,'2017-05-23 23:00:00','2017-05-23 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Ashburton\"}',171.73,-43.90,'P','PPL','NZ.E9','NZ.E9.063',30100,'Pacific/Auckland',1,'2017-04-18 23:00:00','2017-04-18 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Rangiora\"}',172.58,-43.30,'P','PPLA2','NZ.E9','NZ.E9.059',18400,'Pacific/Auckland',1,'2020-12-13 23:00:00','2020-12-13 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Kaiapoi\"}',172.64,-43.38,'P','PPL','NZ.E9','NZ.E9.059',10200,'Pacific/Auckland',1,'2020-12-13 23:00:00','2020-12-13 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Whangarei\"}',174.32,-35.73,'P','PPLA','NZ.F6','NZ.F6.002',50900,'Pacific/Auckland',1,'2011-02-27 23:00:00','2011-02-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Takanini\"}',174.90,-37.05,'P','PPL','NZ.E7','NZ.E7.076',10870,'Pacific/Auckland',1,'2014-07-02 23:00:00','2014-07-02 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Pakuranga\"}',174.92,-36.88,'P','PPL','NZ.E7','NZ.E7.076',8907,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Matamata\"}',175.76,-37.81,'P','PPL','NZ.G1','NZ.G1.015',6306,'Pacific/Auckland',1,'2017-02-03 23:00:00','2017-02-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Cambridge\"}',175.44,-37.88,'P','PPL','NZ.G1','NZ.G1.017',15192,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Rotorua\"}',176.25,-38.14,'P','PPLA2','NZ.E8','NZ.E8.024',65901,'Pacific/Auckland',1,'2017-09-14 23:00:00','2017-09-14 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Blenheim\"}',173.95,-41.52,'P','PPLA','NZ.F4','NZ.F4.053',26550,'Pacific/Auckland',1,'2020-05-20 23:00:00','2020-05-20 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Petone\"}',174.87,-41.23,'P','PPLX','NZ.G2',NULL,6609,'Pacific/Auckland',1,'2010-09-21 23:00:00','2010-09-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Upper Hutt\"}',175.05,-41.14,'P','PPL','NZ.G2','NZ.G2.045',38400,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Taradale\"}',176.85,-39.53,'P','PPLX','NZ.F2','NZ.F2.031',16599,'Pacific/Auckland',1,'2011-07-31 23:00:00','2011-07-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Ngaruawahia\"}',175.16,-37.67,'P','PPL','NZ.G1','NZ.G1.013',5106,'Pacific/Auckland',1,'2015-03-17 23:00:00','2015-03-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('NZ','{\"en\":\"Linton Military Camp\"}',175.58,-40.40,'P','PPLG','NZ.F3','NZ.F3.040',0,'Pacific/Auckland',1,'2018-07-24 23:00:00','2018-07-24 23:00:00');
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

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
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.31','CD','{\"en\":\"Tshuapa\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.30','CD','{\"en\":\"Tshopo\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.29','CD','{\"en\":\"Tanganyika\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.12','CD','{\"en\":\"South Kivu\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.27','CD','{\"en\":\"Sankuru\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.11','CD','{\"en\":\"Nord Kivu\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.25','CD','{\"en\":\"Mongala\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.10','CD','{\"en\":\"Maniema\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.23','CD','{\"en\":\"Kasai-Central\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.04','CD','{\"en\":\"Kasaï-Oriental\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.18','CD','{\"en\":\"Kasai\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.17','CD','{\"en\":\"Ituri\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.16','CD','{\"en\":\"Haut-Uele\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.15','CD','{\"en\":\"Haut-Lomami\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.02','CD','{\"en\":\"Équateur\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.13','CD','{\"en\":\"Bas-Uele\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.22','CD','{\"en\":\"Lualaba\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.24','CD','{\"en\":\"Mai-Ndombe\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.20','CD','{\"en\":\"Kwilu\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.19','CD','{\"en\":\"Kwango\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.06','CD','{\"en\":\"Kinshasa\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.08','CD','{\"en\":\"Bas-Congo\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.14','CD','{\"en\":\"Haut-Katanga\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.21','CD','{\"en\":\"Lomami\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.26','CD','{\"en\":\"Nord-Ubangi\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('CD.28','CD','{\"en\":\"Sud-Ubangi\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.04.209226','CD','CD.04','{\"en\":\"Mbuji-Mayi City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.211067','CD','CD.11','{\"en\":\"Lubero\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.30.212726','CD','CD.30','{\"en\":\"Ville de Kisangani\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.04.19','CD','CD.04','{\"en\":\"Kabinda\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.216279','CD','CD.11','{\"en\":\"Goma\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.219056','CD','CD.11','{\"en\":\"Beni\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.13.220287','CD','CD.13','{\"en\":\"Ango\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.22.922772','CD','CD.22','{\"en\":\"Kolwezi City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.923173','CD','CD.05','{\"en\":\"Sous-Région du Haut-Shaba\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.2310762','CD','CD.02','{\"en\":\"Ville de Zongo\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.2312894','CD','CD.02','{\"en\":\"Ville de Mbandaka\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.14','CD','CD.02','{\"en\":\"Equateur\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.2316119','CD','CD.08','{\"en\":\"Sous-Région des Catarates\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.2316701','CD','CD.08','{\"en\":\"Ville de Boma\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.2317281','CD','CD.08','{\"en\":\"Sous-Région du Bas-Fleuve\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.20.2317497','CD','CD.20','{\"en\":\"Bagata\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.15.15','CD','CD.15','{\"en\":\"Haut Lomami\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.14.16','CD','CD.14','{\"en\":\"Haut Katanga\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.32','CD','CD.02','{\"en\":\"Nord Ubangi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.36','CD','CD.02','{\"en\":\"Sud Ubangi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.01.7731962','CD','CD.01','{\"en\":\"Plateaux\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.27','CD','CD.08','{\"en\":\"Lukaya\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.13','CD','CD.08','{\"en\":\"Cataractes District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.10','CD','CD.08','{\"en\":\"Bas Fleuve District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.7731981','CD','CD.08','{\"en\":\"Matadi (city)\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.08.12','CD','CD.08','{\"en\":\"Boma (city)\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.09.7910143','CD','CD.09','{\"en\":\"Tumba\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.23','CD','CD.05','{\"en\":\"Kolwezi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.33','CD','CD.11','{\"en\":\"North Kivu\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.10.30','CD','CD.10','{\"en\":\"Maniema\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.04.38','CD','CD.04','{\"en\":\"Tshilenge District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.35','CD','CD.12','{\"en\":\"South Kivu\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.22','CD','CD.06','{\"en\":\"Kinshasa rural\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.21','CD','CD.06','{\"en\":\"Kinshasa Urban\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.8260598','CD','CD.11','{\"en\":\"Nyirangongo\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.8260604','CD','CD.11','{\"en\":\"Butembo\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.8260605','CD','CD.11','{\"en\":\"Oicha\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.03.8335010','CD','CD.03','{\"en\":\"Kananga City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.18.8335011','CD','CD.18','{\"en\":\"Tshikapa City\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9165800','CD','CD.05','{\"en\":\"Lubumbashi (city)\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.9166122','CD','CD.06','{\"en\":\"Lukunga District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.9166123','CD','CD.06','{\"en\":\"Tshangu District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179186','CD','CD.05','{\"en\":\"Kalemie Ville\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179188','CD','CD.05','{\"en\":\"Kipushi Ville\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179189','CD','CD.05','{\"en\":\"Kongolo Ville\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179191','CD','CD.05','{\"en\":\"Kambove Ville\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179195','CD','CD.05','{\"en\":\"Likasi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.9179197','CD','CD.12','{\"en\":\"Bukavu\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.9179198','CD','CD.06','{\"en\":\"Makala District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179199','CD','CD.05','{\"en\":\"Mutumba District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.03.9179202','CD','CD.03','{\"en\":\"Mutumba District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.9179463','CD','CD.12','{\"en\":\"Kalehe\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.9179476','CD','CD.12','{\"en\":\"Mwenga\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.9179483','CD','CD.12','{\"en\":\"Fizi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.12.9179531','CD','CD.12','{\"en\":\"Kabare\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.9179534','CD','CD.11','{\"en\":\"Masisi Territory\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.11.9179537','CD','CD.11','{\"en\":\"Rutshuru Territory\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179562','CD','CD.05','{\"en\":\"Kasaji\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.23.9179898','CD','CD.23','{\"en\":\"Ville de Kananga\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.05.9179907','CD','CD.05','{\"en\":\"Manono\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.9212657','CD','CD.02','{\"en\":\"Akula\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.10376945','CD','CD.02','{\"en\":\"Tshuapa District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.10400552','CD','CD.06','{\"en\":\"Funa\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.02.10402604','CD','CD.02','{\"en\":\"Nord-Ubangi District\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('CD.06.10861174','CD','CD.06','{\"en\":\"Mont Amba District\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Yangambi\"}',24.44,0.77,'P','PPL','CD.30',NULL,35531,'Africa/Lubumbashi',1,'2016-11-28 23:00:00','2016-11-28 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Watsa\"}',29.54,3.04,'P','PPL','CD.16',NULL,24516,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Wamba\"}',27.99,2.15,'P','PPL','CD.16',NULL,17373,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Uvira\"}',29.14,-3.40,'P','PPL','CD.12',NULL,170391,'Africa/Lubumbashi',1,'2012-12-04 23:00:00','2012-12-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Tshikapa\"}',20.80,-6.42,'P','PPLA2','CD.18','CD.18.8335011',267462,'Africa/Lubumbashi',1,'2016-11-27 23:00:00','2016-11-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Sake\"}',29.04,-1.57,'P','PPL','CD.11',NULL,17151,'Africa/Lubumbashi',1,'2012-12-04 23:00:00','2012-12-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mwene-Ditu\"}',23.45,-7.01,'P','PPL','CD.21',NULL,189177,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mweka\"}',21.56,-4.85,'P','PPL','CD.18',NULL,50675,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mbuji-Mayi\"}',23.59,-6.14,'P','PPLA','CD.04',NULL,874761,'Africa/Lubumbashi',1,'2012-06-10 23:00:00','2012-06-10 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lusambo\"}',23.44,-4.98,'P','PPLA','CD.27',NULL,41416,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Luebo\"}',21.42,-5.35,'P','PPLA','CD.18',NULL,35183,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lubao\"}',25.75,-5.39,'P','PPL','CD.21',NULL,43068,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lodja\"}',23.60,-3.52,'P','PPL','CD.27',NULL,68244,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lisala\"}',21.52,2.15,'P','PPL','CD.02',NULL,70087,'Africa/Kinshasa',1,'2012-05-30 23:00:00','2012-05-30 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kongolo\"}',27.00,-5.39,'P','PPL','CD.29',NULL,31943,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kisangani\"}',25.19,0.52,'P','PPLA','CD.30',NULL,539158,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kindu\"}',25.92,-2.94,'P','PPLA','CD.10',NULL,135698,'Africa/Lubumbashi',1,'2013-02-07 23:00:00','2013-02-07 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kasongo\"}',26.67,-4.43,'P','PPL','CD.10',NULL,55118,'Africa/Lubumbashi',1,'2012-04-04 23:00:00','2012-04-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kananga\"}',22.42,-5.90,'P','PPLA','CD.23','CD.23.9179898',463546,'Africa/Lubumbashi',1,'2016-12-30 23:00:00','2016-12-30 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kampene\"}',26.67,-3.60,'P','PPL','CD.10',NULL,37034,'Africa/Lubumbashi',1,'2018-12-03 23:00:00','2018-12-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kamina\"}',25.00,-8.74,'P','PPLA','CD.15',NULL,73557,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kalemie\"}',29.19,-5.95,'P','PPL','CD.29',NULL,146974,'Africa/Lubumbashi',1,'2016-11-27 23:00:00','2016-11-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kabinda\"}',24.48,-6.14,'P','PPL','CD.04',NULL,59004,'Africa/Lubumbashi',1,'2020-12-14 23:00:00','2020-12-14 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kabare\"}',28.79,-2.50,'P','PPL','CD.12',NULL,37034,'Africa/Lubumbashi',1,'2012-12-04 23:00:00','2012-12-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kabalo\"}',26.91,-6.05,'P','PPL','CD.29',NULL,29833,'Africa/Lubumbashi',1,'2016-11-28 23:00:00','2016-11-28 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Isiro\"}',27.62,2.77,'P','PPLA','CD.16',NULL,127076,'Africa/Lubumbashi',1,'2019-02-27 23:00:00','2019-02-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Ilebo\"}',20.59,-4.33,'P','PPL','CD.18',NULL,107093,'Africa/Lubumbashi',1,'2017-07-09 23:00:00','2017-07-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Goma\"}',29.23,-1.67,'P','PPLA','CD.11',NULL,144124,'Africa/Lubumbashi',1,'2012-12-04 23:00:00','2012-12-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Gbadolite\"}',21.00,4.28,'P','PPLA','CD.26',NULL,50493,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Gandajika\"}',23.95,-6.75,'P','PPL','CD.04',NULL,154425,'Africa/Lubumbashi',1,'2020-12-14 23:00:00','2020-12-14 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Demba\"}',22.27,-5.50,'P','PPL','CD.23',NULL,22263,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Butembo\"}',29.29,0.14,'P','PPLA3','CD.11','CD.11.33',154621,'Africa/Lubumbashi',1,'2013-01-01 23:00:00','2013-01-01 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Buta\"}',24.73,2.79,'P','PPLA','CD.13',NULL,50130,'Africa/Lubumbashi',1,'2017-07-09 23:00:00','2017-07-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Businga\"}',20.89,3.34,'P','PPL','CD.26',NULL,28919,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bunia\"}',30.25,1.56,'P','PPLA','CD.17',NULL,96764,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bumba\"}',22.47,2.19,'P','PPL','CD.25',NULL,95520,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bukavu\"}',28.84,-2.49,'P','PPLA','CD.12',NULL,225389,'Africa/Lubumbashi',1,'2015-05-24 23:00:00','2015-05-24 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bukama\"}',25.85,-9.20,'P','PPL','CD.15',NULL,38770,'Africa/Lubumbashi',1,'2016-11-28 23:00:00','2016-11-28 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bondo\"}',23.69,3.81,'P','PPL','CD.13',NULL,17860,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Boende\"}',20.88,-0.28,'P','PPLA','CD.31',NULL,32091,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Beni\"}',29.47,0.49,'P','PPL','CD.11',NULL,232000,'Africa/Lubumbashi',1,'2018-08-23 23:00:00','2018-08-23 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Basoko\"}',23.62,1.24,'P','PPL','CD.30',NULL,43709,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Aketi\"}',23.78,2.74,'P','PPL','CD.13',NULL,35161,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lubumbashi\"}',27.48,-11.66,'P','PPLA','CD.14',NULL,1373770,'Africa/Lubumbashi',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Likasi\"}',26.74,-10.98,'P','PPL','CD.14',NULL,422414,'Africa/Lubumbashi',1,'2016-11-27 23:00:00','2016-11-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kolwezi\"}',25.47,-10.71,'P','PPLA2','CD.22','CD.22.922772',418000,'Africa/Lubumbashi',1,'2016-11-27 23:00:00','2016-11-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kipushi\"}',27.25,-11.76,'P','PPL','CD.14',NULL,62332,'Africa/Lubumbashi',1,'2016-11-28 23:00:00','2016-11-28 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kambove\"}',26.60,-10.87,'P','PPL','CD.14',NULL,36702,'Africa/Lubumbashi',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Tshela\"}',12.95,-5.00,'P','PPL','CD.08',NULL,38845,'Africa/Kinshasa',1,'2013-01-09 23:00:00','2013-01-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Nioki\"}',17.69,-2.72,'P','PPL','CD.24',NULL,40695,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mushie\"}',16.92,-3.02,'P','PPL','CD.24',NULL,33062,'Africa/Kinshasa',1,'2018-12-03 23:00:00','2018-12-03 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Moanda\"}',12.37,-5.93,'P','PPL','CD.08',NULL,50000,'Africa/Kinshasa',1,'2017-08-31 23:00:00','2017-08-31 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mbanza-Ngungu\"}',14.86,-5.26,'P','PPL','CD.08',NULL,86356,'Africa/Kinshasa',1,'2012-06-04 23:00:00','2012-06-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mbandaka\"}',18.26,0.05,'P','PPLA','CD.02','CD.02.2312894',184185,'Africa/Kinshasa',1,'2016-12-29 23:00:00','2016-12-29 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Matadi\"}',13.46,-5.84,'P','PPLA','CD.08',NULL,180109,'Africa/Kinshasa',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Mangai\"}',19.53,-4.02,'P','PPL','CD.20',NULL,37188,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Lukolela\"}',17.18,-1.06,'P','PPL','CD.02',NULL,15000,'Africa/Kinshasa',1,'2013-06-06 23:00:00','2013-06-06 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Libenge\"}',18.64,3.65,'P','PPL','CD.28',NULL,27053,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kinshasa\"}',15.31,-4.33,'P','PPLC','CD.06',NULL,7785965,'Africa/Kinshasa',1,'2020-05-27 23:00:00','2020-05-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kikwit\"}',18.82,-5.04,'P','PPL','CD.20',NULL,186991,'Africa/Kinshasa',1,'2017-07-09 23:00:00','2017-07-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kasongo-Lunda\"}',16.82,-6.48,'P','PPL','CD.19',NULL,20060,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Kasangulu\"}',15.17,-4.58,'P','PPL','CD.08',NULL,27961,'Africa/Kinshasa',1,'2015-02-05 23:00:00','2015-02-05 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Inongo\"}',18.29,-1.93,'P','PPLA','CD.24',NULL,40113,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Gemena\"}',19.77,3.26,'P','PPL','CD.02',NULL,117639,'Africa/Kinshasa',1,'2012-04-04 23:00:00','2012-04-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bulungu\"}',18.60,-4.54,'P','PPL','CD.20',NULL,48344,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bosobolo\"}',19.88,4.19,'P','PPL','CD.26',NULL,14553,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Boma\"}',13.05,-5.85,'P','PPL','CD.08',NULL,162521,'Africa/Kinshasa',1,'2019-02-27 23:00:00','2019-02-27 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bolobo\"}',16.23,-2.16,'P','PPL','CD.24',NULL,27862,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Bandundu\"}',17.38,-3.32,'P','PPL','CD.20',NULL,118211,'Africa/Kinshasa',1,'2016-11-21 23:00:00','2016-11-21 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('CD','{\"en\":\"Masina\"}',15.39,-4.38,'P','PPL','CD.06',NULL,485167,'Africa/Kinshasa',1,'2007-05-30 23:00:00','2007-05-30 23:00:00');
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

/*
SQLyog Ultimate v8.55 
MySQL - 5.5.36 : Database - wipocos_1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `wipo_audit_trail` */

DROP TABLE IF EXISTS `wipo_audit_trail`;

CREATE TABLE `wipo_audit_trail` (
  `aud_id` int(11) NOT NULL AUTO_INCREMENT,
  `aud_user` int(11) NOT NULL,
  `aud_class` varchar(100) DEFAULT 'comment-o',
  `aud_action` varchar(255) DEFAULT NULL,
  `aud_message` varchar(255) NOT NULL,
  `aud_ip_address` varchar(100) DEFAULT NULL,
  `aud_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aud_id`),
  KEY `FK_wipo_audit_trail_user` (`aud_user`),
  CONSTRAINT `FK_wipo_audit_trail_user` FOREIGN KEY (`aud_user`) REFERENCES `wipo_user` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_audit_trail` */

insert  into `wipo_audit_trail`(`aud_id`,`aud_user`,`aud_class`,`aud_action`,`aud_message`,`aud_ip_address`,`aud_created_date`) values (1,1,'group','site.society.create','Created a SOC4 successfully.','::1','2015-04-30 12:29:29'),(2,1,'flag-o','site.masternationality.update','Updated a Nepal successfully.','127.0.0.1','2015-04-30 15:37:35'),(3,1,'flag-o','site.masternationality.create','Created Nation American successfully.','127.0.0.1','2015-04-30 16:28:54'),(4,1,'flag-o','site.masternationality.delete','Deleted Nation American successfully.','127.0.0.1','2015-04-30 16:29:03'),(5,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:30:09'),(6,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:30:09'),(7,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:31:25'),(8,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:31:25'),(9,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:31:25'),(10,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:33:55'),(11,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:30'),(12,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:30'),(13,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:43'),(14,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:43'),(15,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:39:43'),(16,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:55'),(17,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:39:55'),(18,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:39:55'),(19,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:39:55'),(20,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:12'),(21,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:12'),(22,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:12'),(23,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:12'),(24,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:25'),(25,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:25'),(26,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:25'),(27,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:25'),(28,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:58'),(29,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:40:58'),(30,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:58'),(31,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:40:58'),(32,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:40:58'),(33,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:44:24'),(34,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:44:24'),(35,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:44:24'),(36,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:44:24'),(37,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:44:24'),(38,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:44:47'),(39,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:44:47'),(40,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:44:47'),(41,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:44:47'),(42,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:44:47'),(43,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:45:12'),(44,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:45:12'),(45,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:45:12'),(46,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:45:12'),(47,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:45:12'),(48,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:45:21'),(49,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:45:21'),(50,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:45:21'),(51,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:45:21'),(52,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:09'),(53,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:09'),(54,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:09'),(55,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:46:09'),(56,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:15'),(57,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:15'),(58,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:15'),(59,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:46:15'),(60,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:24'),(61,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:24'),(62,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:24'),(63,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:24'),(64,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:46:24'),(65,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:51'),(66,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:46:51'),(67,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:51'),(68,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:46:51'),(69,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:46:51'),(70,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:47:20'),(71,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:47:20'),(72,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:47:20'),(73,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:47:20'),(74,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:47:21'),(75,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:06'),(76,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:07'),(77,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:07'),(78,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:07'),(79,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:16'),(80,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:16'),(81,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:16'),(82,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:16'),(83,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:24'),(84,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:24'),(85,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:24'),(86,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:24'),(87,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:48:24'),(88,1,'group','site.publishergroup.update','Updated Publisher Group Original Publisher EG100 successfully.','127.0.0.1','2015-04-30 17:48:47'),(89,1,'group','site.publishergroup.update','Updated Publisher Group Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:47'),(90,1,'group','site.publishergroup.update','Updated Publisher Group Sub Publisher Share EG100 successfully.','127.0.0.1','2015-04-30 17:48:47'),(91,1,'group','site.publishergroup.update','Updated Publisher Group Subcontracted Catalogue EG100 successfully.','127.0.0.1','2015-04-30 17:48:47'),(92,1,'group','site.group.delete','Deleted a Performer Group 5 successfully.','127.0.0.1','2015-05-05 13:11:47'),(93,1,'users','site.group.create','Created a Test successfully.','127.0.0.1','2015-05-05 13:40:47'),(94,1,'group','site.group.delete','Deleted a Test successfully.','127.0.0.1','2015-05-05 13:40:55'),(95,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','127.0.0.1','2015-05-05 15:22:37'),(96,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','127.0.0.1','2015-05-05 15:32:31'),(97,1,'group','site.publishergroup.create','Created Publisher Group EG103 successfully.','127.0.0.1','2015-05-05 15:38:45'),(98,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG103 successfully.','127.0.0.1','2015-05-05 15:38:55'),(99,1,'user','site.authoraccount.delete','Deleted a Auth sur aut  Auth Sur auth successfully.','127.0.0.1','2015-05-05 16:26:57'),(100,1,'music','site.performeraccount.update','Updated Performer Related Rights Perf First Second Perf Sur successfully.','127.0.0.1','2015-05-05 16:59:07'),(101,1,'music','site.performeraccount.update','Updated Performer Related Rights Perf First Second Perf Sur successfully.','127.0.0.1','2015-05-05 16:59:39'),(102,1,'music','site.performeraccount.update','Updated Performer Related Rights Perf First Second Perf Sur successfully.','127.0.0.1','2015-05-05 17:05:58'),(103,1,'users','site.group.update','Managed Rights Saved on Performer Group 1 successfully.','127.0.0.1','2015-05-05 17:08:11'),(104,1,'group','site.publishergroup.create','Created Publisher Group EG104 successfully.','127.0.0.1','2015-05-05 17:12:32'),(105,1,'money','site.produceraccount.create','Created Producer HPM Limited successfully.','127.0.0.1','2015-05-05 17:16:07'),(106,1,'money','site.produceraccount.update','Updated Producer Succession ABM Limited successfully.','127.0.0.1','2015-05-05 17:57:58'),(107,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-05-05 18:06:35'),(108,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-05-05 18:11:54'),(109,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-05-05 18:16:06'),(110,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-05-05 18:16:59'),(111,1,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-05-05 18:26:59'),(112,1,'money','site.produceraccount.update','Updated Producer Payment Method ABM Limited successfully.','127.0.0.1','2015-05-05 18:27:12'),(113,1,'money','site.produceraccount.update','Updated Producer Pseudonym ABM Limited successfully.','127.0.0.1','2015-05-05 18:27:25'),(114,1,'microphone','site.publisheraccount.create','Created Publisher ILOL Limited successfully.','127.0.0.1','2015-05-06 16:35:51'),(115,1,'money','site.produceraccount.create','Created Producer LIM Limited successfully.','127.0.0.1','2015-05-06 16:39:41'),(116,1,'money','site.produceraccount.delete','Deleted Producer LIM Limited successfully.','127.0.0.1','2015-05-06 16:40:31'),(117,1,'money','site.produceraccount.delete','Deleted Producer LIM Limited successfully.','127.0.0.1','2015-05-06 16:41:19'),(118,1,'money','site.produceraccount.create','Created Producer LIM Limited successfully.','127.0.0.1','2015-05-06 16:41:30'),(119,1,'group','site.publishergroup.update','Updated Publisher Group EG100 successfully.','127.0.0.1','2015-05-06 16:51:53'),(120,1,'group','site.publishergroup.update','Updated Publisher Group EG102 successfully.','127.0.0.1','2015-05-06 16:51:58'),(121,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-05-06 16:53:28'),(122,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG101 successfully.','127.0.0.1','2015-05-06 17:00:43'),(123,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:08:35'),(124,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:08:43'),(125,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:08:47'),(126,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:11:23'),(127,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-06 18:11:36'),(128,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:11:42'),(129,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:11:45'),(130,1,'user','site.authoraccount.update','Updated Authurr  Authur AuthorAccount successfully.','127.0.0.1','2015-05-06 18:13:16'),(131,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:17:43'),(132,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:18:18'),(133,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:18:25'),(134,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-06 18:18:48'),(135,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:18:55'),(136,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:19:01'),(137,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four AuthorAccount successfully.','127.0.0.1','2015-05-06 18:26:28'),(138,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-06 18:34:14'),(139,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-06 18:34:46'),(140,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-06 18:37:26'),(141,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-06 18:37:42'),(142,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-06 18:42:02'),(143,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-05-06 18:47:07'),(144,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-05-06 18:47:55'),(145,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-05-06 18:48:03'),(146,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-05-06 18:48:17'),(147,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-05-06 18:48:21'),(148,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','127.0.0.1','2015-05-06 18:53:59'),(149,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-05-06 18:58:55'),(150,1,'group','site.publishergroup.update','Updated Publisher Group EG100 successfully.','127.0.0.1','2015-05-06 19:04:32'),(151,1,'microphone','site.publisheraccount.update','Updated Publisher ILOL Limited successfully.','127.0.0.1','2015-05-07 11:32:56'),(152,1,'at','site.mastertyperights.create','Created Type of Right Music Publisher successfully.','127.0.0.1','2015-05-07 13:20:09'),(153,1,'at','site.mastertyperights.create','Created Type of Right Producer successfully.','127.0.0.1','2015-05-07 13:20:16'),(154,1,'microphone','site.publisheraccount.create','Created Publisher MTM Limited successfully.','127.0.0.1','2015-05-07 13:23:00'),(155,1,'microphone','site.publisheraccount.create','Created Publisher KOL Limited successfully.','127.0.0.1','2015-05-07 13:38:35'),(156,1,'money','site.produceraccount.create','Created Producer PST Limited successfully.','127.0.0.1','2015-05-07 13:40:25'),(157,1,'group','site.publishergroup.create','Created Publisher Group EG105 successfully.','127.0.0.1','2015-05-07 13:47:57'),(158,1,'group','site.publishergroup.create','Created Publisher Group EG106 successfully.','127.0.0.1','2015-05-07 13:51:58'),(159,1,'users','site.group.update','Updated a Performer Group 1 successfully.','127.0.0.1','2015-05-07 15:17:40'),(160,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG102 successfully.','127.0.0.1','2015-05-07 15:25:37'),(161,1,'money','site.produceraccount.update','Updated Producer Managed Rights HPM Limited successfully.','127.0.0.1','2015-05-07 15:25:59'),(162,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG102 successfully.','127.0.0.1','2015-05-07 15:26:18'),(163,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG104 successfully.','127.0.0.1','2015-05-07 15:26:42'),(164,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG104 successfully.','127.0.0.1','2015-05-07 15:26:52'),(165,1,'group','site.publishergroup.update','Updated Publisher Group EG100 successfully.','127.0.0.1','2015-05-07 16:13:19'),(166,1,'user','site.authoraccount.delete','Deleted a Auth Tets  Tets successfully.','127.0.0.1','2015-05-07 16:34:49'),(167,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-07 18:48:39'),(168,1,'user','site.default.login','admin2 logged-in successfully.','127.0.0.1','2015-05-07 18:48:49'),(169,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-07 18:49:07'),(170,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-07 18:49:11'),(171,1,'user','site.default.logout','admin2 logged-out successfully.','127.0.0.1','2015-05-07 18:50:25'),(172,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-07 18:50:28'),(173,1,'user','site.default.logout','admin2 logged-out successfully.','127.0.0.1','2015-05-07 18:50:33'),(174,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-07 18:50:41'),(175,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-08 12:33:34'),(176,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 12:33:39'),(177,1,'user','site.default.profile','Updated a admin successfully.','127.0.0.1','2015-05-08 12:34:03'),(178,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-08 12:34:07'),(179,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 12:34:10'),(180,1,'user','site.default.logout','admina logged-out successfully.','127.0.0.1','2015-05-08 12:40:32'),(181,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 12:40:43'),(182,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG106 successfully.','127.0.0.1','2015-05-08 17:36:04'),(183,1,'microphone','site.publisheraccount.create','Created Publisher RTL Limited successfully.','127.0.0.1','2015-05-08 18:18:44'),(184,1,'group','site.publishergroup.create','Created Publisher Group EG107 successfully.','127.0.0.1','2015-05-08 18:20:02'),(185,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-08 18:22:46'),(186,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 18:22:49'),(187,1,'user','site.default.logout','admin2 logged-out successfully.','127.0.0.1','2015-05-08 18:23:20'),(188,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 18:23:23'),(189,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-05-08 19:42:17'),(190,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 19:42:34'),(191,1,'user','site.default.logout','admin2 logged-out successfully.','127.0.0.1','2015-05-08 19:42:55'),(192,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-08 19:42:58'),(193,1,'user','site.masterlabel.create','Created MasterLabel successfully.','127.0.0.1','2015-05-09 11:40:05'),(194,1,'file-image-o','site.producerlabelowner.delete','Deleted ProducerLabelOwner successfully.','127.0.0.1','2015-05-09 17:10:43'),(195,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:32:34'),(196,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:32:46'),(197,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:33:12'),(198,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:34:10'),(199,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:35:15'),(200,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:35:16'),(201,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:35:48'),(202,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:36:13'),(203,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:36:41'),(204,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:36:56'),(205,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Managed Rights successfully.','127.0.0.1','2015-05-09 17:37:04'),(206,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-05-09 17:39:44'),(207,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-05-09 17:39:52'),(208,1,'music','site.performeraccount.update','Updated Performer Related Rights Perf First First Perf Sur successfully.','127.0.0.1','2015-05-09 17:41:01'),(209,1,'money','site.produceraccount.update','Updated Producer Managed Rights ABM Limited successfully.','127.0.0.1','2015-05-09 17:42:01'),(210,1,'money','site.produceraccount.update','Updated Producer Managed Rights OPM Limited successfully.','127.0.0.1','2015-05-09 17:42:53'),(211,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','127.0.0.1','2015-05-09 17:45:12'),(212,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','127.0.0.1','2015-05-09 17:45:24'),(213,1,'user','site.masterlabel.create','Created MasterLabel successfully.','127.0.0.1','2015-05-09 17:48:16'),(214,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','127.0.0.1','2015-05-09 17:49:09'),(215,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Samsung successfully.','127.0.0.1','2015-05-09 17:49:09'),(216,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','127.0.0.1','2015-05-09 17:49:09'),(217,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','127.0.0.1','2015-05-09 18:52:54'),(218,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Samsung successfully.','127.0.0.1','2015-05-09 18:52:54'),(219,1,'user','site.work.create','Created Work successfully.','127.0.0.1','2015-05-13 18:55:58'),(220,1,'user','site.work.create','Created Work successfully.','127.0.0.1','2015-05-13 19:05:04'),(221,1,'user','site.work.create','Created Work successfully.','127.0.0.1','2015-05-13 19:09:28'),(222,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:36:31'),(223,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:36:57'),(224,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:37:07'),(225,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:37:34'),(226,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:38:00'),(227,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:38:21'),(228,1,'user','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-13 19:38:28'),(229,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 12:40:21'),(230,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 12:42:12'),(231,1,'sliders','site.work.update','Added Work Subtitle successfully.','127.0.0.1','2015-05-14 13:12:47'),(232,1,'sliders','site.work.update','Added Work Subtitle successfully.','127.0.0.1','2015-05-14 13:14:12'),(233,1,'sliders','site.work.update','Added Work Subtitle successfully.','127.0.0.1','2015-05-14 13:18:37'),(234,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-05-14 13:31:43'),(235,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-05-14 13:31:55'),(236,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-05-14 13:32:02'),(237,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-14 14:04:14'),(238,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-14 14:04:25'),(239,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 15:40:52'),(240,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-14 18:00:19'),(241,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:24:47'),(242,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:30:54'),(243,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:30:58'),(244,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:31:06'),(245,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:32:53'),(246,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:37:15'),(247,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:37:19'),(248,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 18:59:26'),(249,1,'list','site.mastertype.create','Created Master Type Modern successfully.','127.0.0.1','2015-05-14 19:16:53'),(250,1,'language','site.masterlanguage.create','Created Master Language Nepali successfully.','127.0.0.1','2015-05-14 19:18:00'),(251,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 19:31:56'),(252,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-14 19:33:18'),(253,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-14 19:33:23'),(254,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-16 13:33:58'),(255,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-16 13:36:08'),(256,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-05-16 14:00:48'),(257,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-05-16 14:02:52'),(258,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-05-16 14:03:00'),(259,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-16 14:11:17'),(260,1,'sliders','site.work.delete','Deleted Work successfully.','127.0.0.1','2015-05-16 14:12:32'),(261,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-16 14:12:51'),(262,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-16 14:15:43'),(263,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-16 14:16:40'),(264,1,'user','site.masterinstrument.update','Updated MasterInstrument successfully.','127.0.0.1','2015-05-16 15:31:13'),(265,1,'globe','site.mastercountry.update','Updated Country Nepal successfully.','127.0.0.1','2015-05-18 12:27:35'),(266,1,'globe','site.mastercountry.update','Updated Country Nepal successfully.','127.0.0.1','2015-05-18 12:27:48'),(267,1,'at','site.mastertyperights.create','Created Type of Right Author, Writer, Lyricist successfully.','127.0.0.1','2015-05-18 13:33:08'),(268,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-05-18 15:49:19'),(269,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-05-19 10:15:39'),(270,1,'sliders','site.work.update','Saved Work Subtitle successfully.','127.0.0.1','2015-05-19 11:01:32'),(271,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-19 11:30:08'),(272,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:23:35'),(273,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:26:10'),(274,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:30:37'),(275,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-20 12:34:37'),(276,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-20 12:34:58'),(277,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-05-20 12:37:29'),(278,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:44:07'),(279,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:45:07'),(280,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:45:38'),(281,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:45:42'),(282,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:46:09'),(283,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:46:16'),(284,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:46:21'),(285,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:46:51'),(286,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:48:02'),(287,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:48:08'),(288,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:48:14'),(289,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:48:38'),(290,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:49:57'),(291,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-20 12:51:10'),(292,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-20 12:51:17'),(293,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-05-20 12:51:22'),(294,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-05-20 12:51:26'),(295,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:51:34'),(296,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-20 12:59:25'),(297,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-20 13:03:13'),(298,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-20 17:50:15'),(299,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-20 17:55:13'),(300,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-20 18:51:30'),(301,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-20 18:55:24'),(302,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-20 18:56:58'),(303,1,'sliders','site.work.update','Saved Work right holder successfully.','::1','2015-05-21 13:42:23'),(304,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-22 11:16:23'),(305,1,'sliders','site.work.holderremove','Deleted RightHolder A1006 at work Music 1.','127.0.0.1','2015-05-22 15:09:05'),(306,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 15:37:56'),(307,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 15:37:56'),(308,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 15:37:56'),(309,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 19:00:33'),(310,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 19:00:33'),(311,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-22 19:00:33'),(312,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-22 19:06:46'),(313,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-22 19:11:08'),(314,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 6 successfully.','127.0.0.1','2015-05-22 19:13:40'),(315,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 6 successfully.','127.0.0.1','2015-05-22 19:17:09'),(316,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 6 successfully.','127.0.0.1','2015-05-22 19:17:09'),(317,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:11'),(318,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:11'),(319,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:11'),(320,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:36'),(321,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:36'),(322,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-23 10:35:36'),(323,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-25 10:52:41'),(324,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 11:53:40'),(325,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 11:53:49'),(326,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 11:56:44'),(327,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 11:56:50'),(328,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 11:57:39'),(329,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-05-25 12:01:52'),(330,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-05-25 13:15:32'),(331,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 16:53:54'),(332,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 16:53:58'),(333,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 16:54:05'),(334,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 16:58:00'),(335,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 17:08:18'),(336,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 17:08:25'),(337,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-25 17:08:33'),(338,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Address successfully.','127.0.0.1','2015-05-25 17:12:48'),(339,1,'user','site.authoraccount.update','Updated Auth First  Auth Sur four Address successfully.','127.0.0.1','2015-05-25 17:12:51'),(340,1,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-05-25 17:14:23'),(341,1,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-05-25 17:14:27'),(342,1,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-05-25 17:14:31'),(343,1,'music','site.performeraccount.update','Updated Performer Address Perf First First Perf Sur successfully.','127.0.0.1','2015-05-25 17:15:12'),(344,1,'music','site.performeraccount.update','Updated Performer Address Perf First First Perf Sur successfully.','127.0.0.1','2015-05-25 17:15:16'),(345,1,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-05-25 17:16:07'),(346,1,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-05-25 17:16:10'),(347,1,'microphone','site.publisheraccount.update','Updated Publisher Address ACOL Limited successfully.','127.0.0.1','2015-05-25 17:16:48'),(348,1,'microphone','site.publisheraccount.update','Updated Publisher Address ACOL Limited successfully.','127.0.0.1','2015-05-25 17:16:52'),(349,1,'group','site.publishergroup.update','Updated Publisher Group Address EG100 successfully.','127.0.0.1','2015-05-25 17:17:34'),(350,1,'group','site.publishergroup.update','Updated Publisher Group Address EG100 successfully.','127.0.0.1','2015-05-25 17:17:54'),(351,1,'user','site.authoraccount.update','Updated Authurr  Authur AuthorAccount successfully.','127.0.0.1','2015-05-25 17:39:39'),(352,1,'user','site.authoraccount.update','Updated Authurr  Authur AuthorAccount successfully.','127.0.0.1','2015-05-25 17:40:08'),(353,1,'music','site.performeraccount.update','Updated Performer Testtest test successfully.','127.0.0.1','2015-05-25 17:45:06'),(354,1,'music','site.performeraccount.update','Updated Performer Testtest test successfully.','127.0.0.1','2015-05-25 17:45:17'),(355,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-25 17:46:05'),(356,1,'music','site.performeraccount.update','Updated Performer Perf First First Perf Sur successfully.','127.0.0.1','2015-05-25 17:46:23'),(357,1,'users','site.group.update','Updated a Author Group 5 successfully.','127.0.0.1','2015-05-25 17:50:28'),(358,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-05-25 17:59:45'),(359,1,'users','site.group.update','Updated a Author Group 5 successfully.','127.0.0.1','2015-05-25 18:00:42'),(360,1,'users','site.group.update','Updated a Author Group 5 successfully.','127.0.0.1','2015-05-25 18:04:15'),(361,1,'users','site.group.update','Updated a Author Group 5 successfully.','127.0.0.1','2015-05-25 18:07:13'),(362,1,'microphone','site.publisheraccount.update','Updated Publisher VEGA Limited successfully.','127.0.0.1','2015-05-25 18:08:14'),(363,1,'microphone','site.publisheraccount.update','Updated Publisher RTL Limited successfully.','127.0.0.1','2015-05-25 18:10:33'),(364,1,'money','site.produceraccount.update','Updated Producer PST Limited successfully.','127.0.0.1','2015-05-25 18:12:20'),(365,1,'money','site.produceraccount.update','Updated Producer PST Limited successfully.','127.0.0.1','2015-05-25 18:12:31'),(366,1,'group','site.publishergroup.update','Updated Publisher Group EG105 successfully.','127.0.0.1','2015-05-25 18:17:28'),(367,1,'group','site.publishergroup.update','Updated Publisher Group EG105 successfully.','127.0.0.1','2015-05-25 18:17:35'),(368,1,'group','site.publishergroup.update','Updated Publisher Group EG105 successfully.','127.0.0.1','2015-05-25 18:19:41'),(369,1,'user','site.authoraccount.create','Created a firrr  surr successfully.','127.0.0.1','2015-05-25 18:22:07'),(370,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:12:45'),(371,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:12:45'),(372,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:12:46'),(373,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:12:46'),(374,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:29'),(375,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:29'),(376,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:29'),(377,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:29'),(378,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:48'),(379,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:49'),(380,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:49'),(381,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:13:49'),(382,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:21:14'),(383,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:21:14'),(384,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:23:08'),(385,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:29:08'),(386,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:29:08'),(387,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:29:16'),(388,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:29:17'),(389,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:30:04'),(390,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:30:05'),(391,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-26 13:30:05'),(392,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-26 13:33:32'),(393,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-05-26 13:33:54'),(394,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-05-27 11:31:56'),(395,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:54:00'),(396,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:54:00'),(397,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:54:50'),(398,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:54:50'),(399,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:54:50'),(400,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:03'),(401,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:03'),(402,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:03'),(403,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:10'),(404,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:10'),(405,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:10'),(406,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:47'),(407,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:55:47'),(408,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:56:18'),(409,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:56:19'),(410,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:56:19'),(411,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:57:33'),(412,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:57:33'),(413,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:57:34'),(414,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:58:06'),(415,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:58:06'),(416,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:58:06'),(417,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 11:58:06'),(418,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:02:18'),(419,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:02:18'),(420,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:02:18'),(421,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:02:19'),(422,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:08:54'),(423,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:08:54'),(424,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:08:54'),(425,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 12:08:54'),(426,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:09:39'),(427,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:09:39'),(428,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:09:39'),(429,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:09:39'),(430,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:09:39'),(431,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:12:54'),(432,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:12:55'),(433,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','127.0.0.1','2015-05-27 13:12:55'),(434,1,'user','site.recording.create','Created Recording successfully.','127.0.0.1','2015-05-27 17:05:21'),(435,1,'sliders','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:20:39'),(436,1,'sliders','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:23:33'),(437,1,'sliders','site.work.update','Saved Work Subtitle successfully.','127.0.0.1','2015-05-27 17:25:17'),(438,1,'user','site.recording.subtitledelete','Deleted Recording subtitle English successfully.','127.0.0.1','2015-05-27 17:29:33'),(439,1,'sliders','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:30:27'),(440,1,'user','site.recording.subtitledelete','Deleted Recording subtitle New SB successfully.','127.0.0.1','2015-05-27 17:30:30'),(441,1,'sliders','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:31:30'),(442,1,'user','site.recording.subtitledelete','Deleted Recording subtitle New SB successfully.','127.0.0.1','2015-05-27 17:31:33'),(443,1,'sliders','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:38:12'),(444,1,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-05-27 17:38:55'),(445,1,'volume-up','site.work.subtitledelete','Deleted Recording subtitle Sub title One successfully.','127.0.0.1','2015-05-27 17:41:42'),(446,1,'volume-up','site.work.subtitledelete','Deleted Recording subtitle Sub title Two 2 successfully.','127.0.0.1','2015-05-27 17:42:27'),(447,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','127.0.0.1','2015-05-27 18:03:10'),(448,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 18:38:41'),(449,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 18:38:41'),(450,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 18:46:54'),(451,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 18:46:54'),(452,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 18:46:54'),(453,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:13:06'),(454,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:13:06'),(455,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:13:06'),(456,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:21:40'),(457,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:21:40'),(458,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:21:40'),(459,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:35:22'),(460,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:35:22'),(461,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-27 19:35:22'),(462,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 10:42:45'),(463,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 10:42:45'),(464,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 10:42:45'),(465,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','127.0.0.1','2015-05-28 13:27:53'),(466,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','127.0.0.1','2015-05-28 13:31:18'),(467,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','127.0.0.1','2015-05-28 13:34:53'),(468,1,'volume-up','site.recording.linkdelete','Deleted Recording Artist - Producer Test successfully.','127.0.0.1','2015-05-28 13:34:57'),(469,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','127.0.0.1','2015-05-28 13:36:59'),(470,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-05-28 15:34:12'),(471,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-05-28 15:34:44'),(472,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-05-28 16:12:51'),(473,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-05-28 16:14:25'),(474,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-05-28 16:14:57'),(475,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 16:37:36'),(476,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 16:37:36'),(477,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Org Title successfully.','127.0.0.1','2015-05-28 16:37:36');

/*Table structure for table `wipo_auth_resources` */

DROP TABLE IF EXISTS `wipo_auth_resources`;

CREATE TABLE `wipo_auth_resources` (
  `Master_Resource_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Master_User_ID` int(11) DEFAULT NULL,
  `Master_Role_ID` int(11) DEFAULT NULL,
  `Master_Module_ID` int(11) NOT NULL,
  `Master_Screen_ID` int(11) NOT NULL,
  `Master_Task_ADD` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_SEE` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_UPT` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_DEL` enum('0','1') NOT NULL DEFAULT '0',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Resource_ID`),
  KEY `FK_master_res_module` (`Master_Module_ID`),
  KEY `FK_master_res_task` (`Master_Screen_ID`),
  KEY `FK_master_res_role` (`Master_Role_ID`),
  KEY `FK_wipo_master_auth_resources_task` (`Master_Task_ADD`),
  KEY `FK_wipo_auth_resources_user` (`Master_User_ID`),
  CONSTRAINT `FK_wipo_auth_resources_role` FOREIGN KEY (`Master_Role_ID`) REFERENCES `wipo_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_auth_resources_user` FOREIGN KEY (`Master_User_ID`) REFERENCES `wipo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_master_auth_resources_module` FOREIGN KEY (`Master_Module_ID`) REFERENCES `wipo_master_module` (`Master_Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_master_auth_resources_screen` FOREIGN KEY (`Master_Screen_ID`) REFERENCES `wipo_master_screen` (`Master_Screen_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_auth_resources` */

insert  into `wipo_auth_resources`(`Master_Resource_ID`,`Master_User_ID`,`Master_Role_ID`,`Master_Module_ID`,`Master_Screen_ID`,`Master_Task_ADD`,`Master_Task_SEE`,`Master_Task_UPT`,`Master_Task_DEL`,`Active`,`Created_Date`,`Rowversion`) values (1,1,NULL,1,1,'1','0','1','1','1','2015-03-12 18:07:02','0000-00-00 00:00:00'),(2,1,NULL,1,2,'1','1','0','0','1','2015-03-12 18:07:02','0000-00-00 00:00:00'),(3,NULL,1,1,1,'1','0','0','0','1','2015-03-12 19:07:50','0000-00-00 00:00:00'),(4,NULL,1,1,2,'0','1','0','0','1','2015-03-12 19:07:50','0000-00-00 00:00:00'),(5,3,NULL,1,1,'0','0','0','1','1','2015-03-12 19:08:11','0000-00-00 00:00:00'),(6,3,NULL,1,2,'1','1','0','0','1','2015-03-12 19:08:11','0000-00-00 00:00:00'),(7,NULL,2,1,1,'0','0','0','0','1','2015-03-12 19:20:22','0000-00-00 00:00:00'),(8,NULL,2,1,2,'1','0','0','0','1','2015-03-12 19:20:22','0000-00-00 00:00:00'),(9,NULL,4,1,1,'1','0','0','0','1','2015-04-01 16:04:01','0000-00-00 00:00:00'),(10,NULL,4,1,2,'1','0','0','0','1','2015-04-01 16:04:01','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_account` */

DROP TABLE IF EXISTS `wipo_author_account`;

CREATE TABLE `wipo_author_account` (
  `Auth_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Sur_Name` varchar(50) NOT NULL,
  `Auth_First_Name` varchar(255) NOT NULL,
  `Auth_Internal_Code` varchar(255) NOT NULL,
  `Auth_Ipi` int(11) DEFAULT NULL,
  `Auth_Ipi_Base_Number` int(11) DEFAULT NULL,
  `Auth_Ipn_Number` int(11) DEFAULT NULL,
  `Auth_Place_Of_Birth_Id` int(11) DEFAULT NULL,
  `Auth_Birth_Country_Id` int(11) DEFAULT NULL,
  `Auth_Nationality_Id` int(11) DEFAULT NULL,
  `Auth_Language_Id` int(11) DEFAULT NULL,
  `Auth_Identity_Number` varchar(255) DEFAULT NULL,
  `Auth_Marital_Status_Id` int(11) DEFAULT NULL,
  `Auth_Spouse_Name` varchar(255) DEFAULT NULL,
  `Auth_Gender` enum('M','F') DEFAULT 'M',
  `Auth_DOB` date DEFAULT NULL,
  `Auth_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Acc_Id`),
  UNIQUE KEY `Internal_Code` (`Auth_Internal_Code`),
  KEY `Auth_Account_index` (`Auth_Place_Of_Birth_Id`,`Auth_Birth_Country_Id`,`Auth_Nationality_Id`,`Auth_Language_Id`,`Auth_Marital_Status_Id`),
  KEY `FK_wipo_author_account_country` (`Auth_Birth_Country_Id`),
  KEY `FK_wipo_author_account_nationality` (`Auth_Nationality_Id`),
  KEY `FK_wipo_author_account_language` (`Auth_Language_Id`),
  KEY `FK_wipo_author_account` (`Auth_Marital_Status_Id`),
  KEY `NewIndex1` (`Auth_Internal_Code`),
  CONSTRAINT `FK_wipo_author_account` FOREIGN KEY (`Auth_Marital_Status_Id`) REFERENCES `wipo_master_marital_status` (`Master_Marital_State_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_account_country` FOREIGN KEY (`Auth_Birth_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_account_language` FOREIGN KEY (`Auth_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_account_nationality` FOREIGN KEY (`Auth_Nationality_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account` */

insert  into `wipo_author_account`(`Auth_Acc_Id`,`Auth_Sur_Name`,`Auth_First_Name`,`Auth_Internal_Code`,`Auth_Ipi`,`Auth_Ipi_Base_Number`,`Auth_Ipn_Number`,`Auth_Place_Of_Birth_Id`,`Auth_Birth_Country_Id`,`Auth_Nationality_Id`,`Auth_Language_Id`,`Auth_Identity_Number`,`Auth_Marital_Status_Id`,`Auth_Spouse_Name`,`Auth_Gender`,`Auth_DOB`,`Auth_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (2,'Auth Sur four','Auth First','A1001',NULL,2147483647,778965125,1,3,4,1,'RT-2323123',1,'Jane','M','1950-06-06','Y','1','2015-03-26 11:45:23','0000-00-00 00:00:00'),(3,'Auth Sur two','Auth Two','A1002',42342342,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M','1960-06-22','N','1','2015-03-26 19:12:30','0000-00-00 00:00:00'),(4,'Auth Sur three','Auth Three','A1003',42342342,NULL,NULL,1,NULL,NULL,NULL,'',NULL,'','F',NULL,'N','1','2015-03-31 12:03:05','0000-00-00 00:00:00'),(6,'Auth Surr','Auth Four','A1004',42342342,NULL,NULL,0,NULL,NULL,NULL,'',1,'Jane','M',NULL,'N','1','2015-04-07 13:46:18','0000-00-00 00:00:00'),(11,'Auth Sur five','Auth Five','A1005',NULL,2147483647,778965125,1,3,4,1,'RT-2323123',1,'Jane','M',NULL,'N','1','2015-03-26 11:45:23','0000-00-00 00:00:00'),(12,'Auth Sur six','Auth six','A1006',42342342,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M',NULL,'N','1','2015-03-26 19:12:30','0000-00-00 00:00:00'),(13,'Auth Sur seven','Auth seven','A1007',42342342,NULL,NULL,1,NULL,NULL,NULL,'',NULL,'','F',NULL,'N','1','2015-03-31 12:03:05','0000-00-00 00:00:00'),(14,'Auth Sur eight','Auth eight','A1008',42342342,NULL,NULL,0,NULL,NULL,NULL,'',1,'Jane','M',NULL,'N','1','2015-04-07 13:46:18','0000-00-00 00:00:00'),(15,'Auth Sur nine','Auth nine','A1009',NULL,2147483647,778965125,1,3,4,1,'RT-2323123',1,'Jane','M',NULL,'N','1','2015-03-26 11:45:23','0000-00-00 00:00:00'),(16,'Auth Sur ten','Auth ten','A1010',42342342,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M',NULL,'N','1','2015-03-26 19:12:30','0000-00-00 00:00:00'),(17,'Auth Surrr','Auth surr','A1011',42342342,NULL,NULL,1,NULL,NULL,NULL,'',NULL,'','F',NULL,'N','1','2015-03-31 12:03:05','0000-00-00 00:00:00'),(21,'Author','Author','A1015',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','M','0000-00-00','N','1','2015-04-09 18:34:48','0000-00-00 00:00:00'),(23,'Authur','Authurr','A1017',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','Y','1','2015-04-09 19:29:37','0000-00-00 00:00:00'),(24,'surr','firrr','A1018',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N','1','2015-05-25 18:22:07','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_account_address` */

DROP TABLE IF EXISTS `wipo_author_account_address`;

CREATE TABLE `wipo_author_account_address` (
  `Auth_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Home_Address_1` varchar(255) NOT NULL,
  `Auth_Home_Address_2` varchar(255) DEFAULT NULL,
  `Auth_Home_Address_3` varchar(255) DEFAULT NULL,
  `Auth_Home_Fax` varchar(25) DEFAULT NULL,
  `Auth_Home_Telephone` varchar(25) NOT NULL,
  `Auth_Home_Email` varchar(50) NOT NULL,
  `Auth_Home_Website` varchar(100) DEFAULT NULL,
  `Auth_Mailing_Address_1` varchar(255) NOT NULL,
  `Auth_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Auth_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Auth_Mailing_Telephone` varchar(25) NOT NULL,
  `Auth_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Auth_Mailing_Email` varchar(50) NOT NULL,
  `Auth_Mailing_Website` varchar(100) DEFAULT NULL,
  `Auth_Author_Account_1` varchar(255) DEFAULT NULL,
  `Auth_Author_Account_2` varchar(255) DEFAULT NULL,
  `Auth_Author_Account_3` varchar(255) DEFAULT NULL,
  `Auth_Performer_Account_1` varchar(255) DEFAULT NULL,
  `Auth_Performer_Account_2` varchar(255) DEFAULT NULL,
  `Auth_Performer_Account_3` varchar(255) DEFAULT NULL,
  `Auth_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Addr_Id`),
  KEY `FK_wipo_author_account_address_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_account_address_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account_address` */

insert  into `wipo_author_account_address`(`Auth_Addr_Id`,`Auth_Acc_Id`,`Auth_Home_Address_1`,`Auth_Home_Address_2`,`Auth_Home_Address_3`,`Auth_Home_Fax`,`Auth_Home_Telephone`,`Auth_Home_Email`,`Auth_Home_Website`,`Auth_Mailing_Address_1`,`Auth_Mailing_Address_2`,`Auth_Mailing_Address_3`,`Auth_Mailing_Telephone`,`Auth_Mailing_Fax`,`Auth_Mailing_Email`,`Auth_Mailing_Website`,`Auth_Author_Account_1`,`Auth_Author_Account_2`,`Auth_Author_Account_3`,`Auth_Performer_Account_1`,`Auth_Performer_Account_2`,`Auth_Performer_Account_3`,`Auth_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,2,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','N','1','2015-03-26 12:07:13','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_biography` */

DROP TABLE IF EXISTS `wipo_author_biography`;

CREATE TABLE `wipo_author_biography` (
  `Auth_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Biogrph_Id`),
  KEY `FK_wipo_author_biography_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_biography_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_biography` */

insert  into `wipo_author_biography`(`Auth_Biogrph_Id`,`Auth_Acc_Id`,`Auth_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,2,'test','1','2015-03-30 14:24:06','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_death_inheritance` */

DROP TABLE IF EXISTS `wipo_author_death_inheritance`;

CREATE TABLE `wipo_author_death_inheritance` (
  `Auth_Death_Inhrt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Death_Inhrt_Firstname` varchar(50) NOT NULL,
  `Auth_Death_Inhrt_Surname` varchar(50) NOT NULL,
  `Auth_Death_Inhrt_Email` varchar(100) NOT NULL,
  `Auth_Death_Inhrt_Phone` varchar(50) NOT NULL,
  `Auth_Death_Inhrt_Address_1` varchar(500) NOT NULL,
  `Auth_Death_Inhrt_Address_2` varchar(500) NOT NULL,
  `Auth_Death_Inhrt_Address_3` varchar(500) NOT NULL,
  `Auth_Death_Inhrt_Addtion_Annotation` text,
  PRIMARY KEY (`Auth_Death_Inhrt_Id`),
  KEY `FK_wipo_author_death_inheritance_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_death_inheritance_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_death_inheritance` */

insert  into `wipo_author_death_inheritance`(`Auth_Death_Inhrt_Id`,`Auth_Acc_Id`,`Auth_Death_Inhrt_Firstname`,`Auth_Death_Inhrt_Surname`,`Auth_Death_Inhrt_Email`,`Auth_Death_Inhrt_Phone`,`Auth_Death_Inhrt_Address_1`,`Auth_Death_Inhrt_Address_2`,`Auth_Death_Inhrt_Address_3`,`Auth_Death_Inhrt_Addtion_Annotation`) values (1,2,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(2,3,'','Test','','','test','test','test','test');

/*Table structure for table `wipo_author_manage_rights` */

DROP TABLE IF EXISTS `wipo_author_manage_rights`;

CREATE TABLE `wipo_author_manage_rights` (
  `Auth_Mnge_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Mnge_Society_Id` int(11) NOT NULL,
  `Auth_Mnge_Entry_Date` date NOT NULL,
  `Auth_Mnge_Exit_Date` date DEFAULT NULL,
  `Auth_Mnge_Internal_Position_Id` int(11) NOT NULL,
  `Auth_Mnge_Entry_Date_2` date NOT NULL,
  `Auth_Mnge_Exit_Date_2` date DEFAULT NULL,
  `Auth_Mnge_Region_Id` int(11) DEFAULT NULL,
  `Auth_Mnge_Profession_Id` int(11) DEFAULT NULL,
  `Auth_Mnge_File` varchar(255) DEFAULT NULL,
  `Auth_Mnge_Duration` varchar(100) DEFAULT NULL,
  `Auth_Mnge_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Auth_Mnge_Type_Rght_Id` int(11) NOT NULL,
  `Auth_Mnge_Managed_Rights_Id` int(11) NOT NULL,
  `Auth_Mnge_Territories_Id` int(11) NOT NULL,
  PRIMARY KEY (`Auth_Mnge_Rgt_Id`),
  KEY `FK_wipo_author_manage_rights_account_id` (`Auth_Acc_Id`),
  KEY `FK_wipo_author_manage_rights_internal_position` (`Auth_Mnge_Internal_Position_Id`),
  KEY `FK_wipo_author_manage_rights_region` (`Auth_Mnge_Region_Id`),
  KEY `FK_wipo_author_manage_rights_profession` (`Auth_Mnge_Profession_Id`),
  KEY `FK_wipo_author_manage_rights_work_category` (`Auth_Mnge_Avl_Work_Cat_Id`),
  KEY `FK_wipo_author_manage_rights_type_of_rights` (`Auth_Mnge_Type_Rght_Id`),
  KEY `FK_wipo_author_manage_rights_managerd_rights` (`Auth_Mnge_Managed_Rights_Id`),
  KEY `FK_wipo_author_manage_rights_territories` (`Auth_Mnge_Territories_Id`),
  KEY `FK_wipo_author_manage_rights_society` (`Auth_Mnge_Society_Id`),
  CONSTRAINT `FK_wipo_author_manage_rights_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_internal_position` FOREIGN KEY (`Auth_Mnge_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_managerd_rights` FOREIGN KEY (`Auth_Mnge_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_profession` FOREIGN KEY (`Auth_Mnge_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_region` FOREIGN KEY (`Auth_Mnge_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_society` FOREIGN KEY (`Auth_Mnge_Society_Id`) REFERENCES `wipo_society` (`Society_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_territories` FOREIGN KEY (`Auth_Mnge_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_type_of_rights` FOREIGN KEY (`Auth_Mnge_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_manage_rights_work_category` FOREIGN KEY (`Auth_Mnge_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_manage_rights` */

insert  into `wipo_author_manage_rights`(`Auth_Mnge_Rgt_Id`,`Auth_Acc_Id`,`Auth_Mnge_Society_Id`,`Auth_Mnge_Entry_Date`,`Auth_Mnge_Exit_Date`,`Auth_Mnge_Internal_Position_Id`,`Auth_Mnge_Entry_Date_2`,`Auth_Mnge_Exit_Date_2`,`Auth_Mnge_Region_Id`,`Auth_Mnge_Profession_Id`,`Auth_Mnge_File`,`Auth_Mnge_Duration`,`Auth_Mnge_Avl_Work_Cat_Id`,`Auth_Mnge_Type_Rght_Id`,`Auth_Mnge_Managed_Rights_Id`,`Auth_Mnge_Territories_Id`) values (1,2,10,'2015-04-01','2015-04-03',1,'2015-04-01','2015-04-03',1,1,'test','50',1,1,1,6),(2,3,10,'2015-03-26','2015-08-30',1,'2015-03-26','2015-08-30',3,1,'rack','50',1,1,1,6),(3,4,10,'2015-04-28','2015-04-30',1,'2015-04-28','2015-04-30',1,1,'',NULL,1,1,1,6);

/*Table structure for table `wipo_author_payment_method` */

DROP TABLE IF EXISTS `wipo_author_payment_method`;

CREATE TABLE `wipo_author_payment_method` (
  `Auth_Pay_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Pay_Method_id` int(11) NOT NULL,
  `Auth_Bank_Account_1` varchar(255) NOT NULL,
  `Auth_Bank_Account_2` varchar(255) NOT NULL,
  `Auth_Bank_Account_3` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Pay_Id`),
  KEY `FK_wipo_author_payment_method_account_id` (`Auth_Acc_Id`),
  KEY `FK_wipo_author_payment_method_payment_mode` (`Auth_Pay_Method_id`),
  CONSTRAINT `FK_wipo_author_payment_method_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_payment_method_payment_mode` FOREIGN KEY (`Auth_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_payment_method` */

insert  into `wipo_author_payment_method`(`Auth_Pay_Id`,`Auth_Acc_Id`,`Auth_Pay_Method_id`,`Auth_Bank_Account_1`,`Auth_Bank_Account_2`,`Auth_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (1,2,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-03-26 12:46:08','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_pseudonym` */

DROP TABLE IF EXISTS `wipo_author_pseudonym`;

CREATE TABLE `wipo_author_pseudonym` (
  `Auth_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Pseudo_Type_Id` int(11) NOT NULL,
  `Auth_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Pseudo_Id`),
  KEY `FK_wipo_author_pseudonym_pseodo_type` (`Auth_Pseudo_Type_Id`),
  KEY `FK_wipo_author_pseudonym_author_account` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_pseudonym_author_account` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_pseudonym_pseodo_type` FOREIGN KEY (`Auth_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_pseudonym` */

insert  into `wipo_author_pseudonym`(`Auth_Pseudo_Id`,`Auth_Acc_Id`,`Auth_Pseudo_Type_Id`,`Auth_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,2,1,'Jack','1','2015-03-26 13:16:01','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_related_rights` */

DROP TABLE IF EXISTS `wipo_author_related_rights`;

CREATE TABLE `wipo_author_related_rights` (
  `Auth_Rel_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Rel_Society_Id` int(11) NOT NULL,
  `Auth_Rel_Entry_Date` date NOT NULL,
  `Auth_Rel_Exit_Date` date DEFAULT NULL,
  `Auth_Rel_Internal_Position_Id` int(11) NOT NULL,
  `Auth_Rel_Entry_Date_2` date NOT NULL,
  `Auth_Rel_Exit_Date_2` date DEFAULT NULL,
  `Auth_Rel_Region_Id` int(11) DEFAULT NULL,
  `Auth_Rel_Profession_Id` int(11) DEFAULT NULL,
  `Auth_Rel_File` varchar(255) DEFAULT NULL,
  `Auth_Rel_Duration` varchar(100) DEFAULT NULL,
  `Auth_Rel_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Auth_Rel_Type_Rght_Id` int(11) NOT NULL,
  `Auth_Rel_Managed_Rights_Id` int(11) NOT NULL,
  `Auth_Rel_Territories_Id` int(11) NOT NULL,
  PRIMARY KEY (`Auth_Rel_Rgt_Id`),
  KEY `FK_wipo_author_related_rights_account_id` (`Auth_Acc_Id`),
  KEY `FK_wipo_author_related_rights_internal_position` (`Auth_Rel_Internal_Position_Id`),
  KEY `FK_wipo_author_related_rights_region` (`Auth_Rel_Region_Id`),
  KEY `FK_wipo_author_related_rights_profession` (`Auth_Rel_Profession_Id`),
  KEY `FK_wipo_author_related_rights_work_category` (`Auth_Rel_Avl_Work_Cat_Id`),
  KEY `FK_wipo_author_related_rights_type_of_rights` (`Auth_Rel_Type_Rght_Id`),
  KEY `FK_wipo_author_related_rights_managerd_rights` (`Auth_Rel_Managed_Rights_Id`),
  KEY `FK_wipo_author_related_rights_territories` (`Auth_Rel_Territories_Id`),
  CONSTRAINT `FK_wipo_author_related_rights_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_internal_position` FOREIGN KEY (`Auth_Rel_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_managerd_rights` FOREIGN KEY (`Auth_Rel_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_profession` FOREIGN KEY (`Auth_Rel_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_region` FOREIGN KEY (`Auth_Rel_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_territories` FOREIGN KEY (`Auth_Rel_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_type_of_rights` FOREIGN KEY (`Auth_Rel_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_related_rights_work_category` FOREIGN KEY (`Auth_Rel_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_related_rights` */

/*Table structure for table `wipo_author_upload` */

DROP TABLE IF EXISTS `wipo_author_upload`;

CREATE TABLE `wipo_author_upload` (
  `Auth_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Upl_Doc_Name` varchar(255) NOT NULL,
  `Auth_Upl_File` varchar(1000) NOT NULL,
  PRIMARY KEY (`Auth_Upl_Id`),
  KEY `FK_wipo_author_upload_auth` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_upload_auth` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_upload` */

insert  into `wipo_author_upload`(`Auth_Upl_Id`,`Auth_Acc_Id`,`Auth_Upl_Doc_Name`,`Auth_Upl_File`) values (3,2,'Profile Picture','\\authorupload\\19b777d71f6999a9f5ec468b24551483.png'),(5,2,'Document 1','\\authorupload\\03db984dbfa1ed9066185887379a6855.docx'),(7,2,'New picture','\\authorupload\\0c953e52c413fdb6e9f99c9570abd4dd.jpg'),(8,2,'New picture 2','\\authorupload\\903bd2724aa9c2e684519e1b27ffe250.png'),(9,2,'Profile Picture','\\authorupload\\01ceef0140b91d726f0ad632b4405bdd.jpg');

/*Table structure for table `wipo_group` */

DROP TABLE IF EXISTS `wipo_group`;

CREATE TABLE `wipo_group` (
  `Group_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Name` varchar(100) NOT NULL,
  `Group_Is_Author` enum('0','1') DEFAULT '0',
  `Group_Is_Performer` enum('0','1') DEFAULT '0',
  `Group_Internal_Code` varchar(50) NOT NULL,
  `Group_IPI_Name_Number` int(11) DEFAULT NULL,
  `Group_IPN_Base_Number` int(11) DEFAULT NULL,
  `Group_IPN_Number` int(11) DEFAULT NULL,
  `Group_Date` date NOT NULL,
  `Group_Place` varchar(100) DEFAULT NULL,
  `Group_Country_Id` int(11) NOT NULL,
  `Group_Legal_Form_Id` int(11) DEFAULT NULL,
  `Group_Language_Id` int(11) DEFAULT NULL,
  `Group_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Id`),
  KEY `FK_wipo_group_country` (`Group_Country_Id`),
  KEY `FK_wipo_group_language` (`Group_Language_Id`),
  KEY `FK_wipo_group_legal_form` (`Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_group_country` FOREIGN KEY (`Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_language` FOREIGN KEY (`Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_legal_form` FOREIGN KEY (`Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group` */

insert  into `wipo_group`(`Group_Id`,`Group_Name`,`Group_Is_Author`,`Group_Is_Performer`,`Group_Internal_Code`,`Group_IPI_Name_Number`,`Group_IPN_Base_Number`,`Group_IPN_Number`,`Group_Date`,`Group_Place`,`Group_Country_Id`,`Group_Legal_Form_Id`,`Group_Language_Id`,`Group_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (1,'Author Group 2','1','0','G1001',NULL,NULL,89758451,'2015-02-01','',2,1,1,'N','1','2015-03-30 12:30:53','0000-00-00 00:00:00'),(2,'Performer Group 2','0','1','G1002',NULL,NULL,123312,'2015-03-03','',2,NULL,NULL,'N','1','2015-03-30 13:03:53','0000-00-00 00:00:00'),(3,'Author Group 4','1','0','G1003',NULL,NULL,23123,'2015-02-24','',2,NULL,NULL,'N','1','2015-03-30 14:01:04','0000-00-00 00:00:00'),(4,'Performer Group 4','0','1','G1004',NULL,NULL,2312323,'2015-03-19','',2,NULL,NULL,'N','1','2015-03-30 14:01:17','0000-00-00 00:00:00'),(5,'Author Group 3','1','0','G1005',NULL,NULL,321123,'2010-02-10','',3,NULL,NULL,'N','1','2015-03-30 14:01:37','0000-00-00 00:00:00'),(6,'Performer Group 1','0','1','G1006',NULL,NULL,123123,'2015-04-29','',2,NULL,1,'Y','1','2015-04-07 15:50:29','0000-00-00 00:00:00'),(9,'Author Group 1','1','0','G1007',NULL,NULL,123123,'2015-04-29','',2,1,3,'N','1','2015-04-07 15:55:47','0000-00-00 00:00:00'),(12,'Performer Group 3','0','1','G1009',NULL,NULL,123312,'2015-04-22','',5,NULL,NULL,'N','1','2015-04-07 16:02:58','0000-00-00 00:00:00'),(14,'Author Group 5','1','0','G1011',NULL,NULL,123312,'2015-03-31','',5,NULL,1,'N','1','2015-04-08 19:51:37','0000-00-00 00:00:00'),(15,'Performer group 12','0','1','G1012',NULL,NULL,123123,'2015-04-18','',2,1,1,'N','1','2015-04-09 14:05:16','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_biography` */

DROP TABLE IF EXISTS `wipo_group_biography`;

CREATE TABLE `wipo_group_biography` (
  `Group_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Biogrph_Id`),
  KEY `FK_wipo_group_biography_account_id` (`Group_Id`),
  CONSTRAINT `FK_wipo_group_biography_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_biography` */

insert  into `wipo_group_biography`(`Group_Biogrph_Id`,`Group_Id`,`Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (2,14,'Annotation','1','2015-04-08 20:01:07','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_manage_rights` */

DROP TABLE IF EXISTS `wipo_group_manage_rights`;

CREATE TABLE `wipo_group_manage_rights` (
  `Group_Mnge_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Mnge_Society_Id` int(11) NOT NULL,
  `Group_Mnge_Entry_Date` date NOT NULL,
  `Group_Mnge_Exit_Date` date DEFAULT NULL,
  `Group_Mnge_Internal_Position_Id` int(11) NOT NULL,
  `Group_Mnge_Entry_Date_2` date NOT NULL,
  `Group_Mnge_Exit_Date_2` date DEFAULT NULL,
  `Group_Mnge_Region_Id` int(11) DEFAULT NULL,
  `Group_Mnge_Profession_Id` int(11) DEFAULT NULL,
  `Group_Mnge_File` varchar(255) DEFAULT NULL,
  `Group_Mnge_Duration` varchar(100) DEFAULT NULL,
  `Group_Mnge_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Group_Mnge_Type_Rght_Id` int(11) NOT NULL,
  `Group_Mnge_Managed_Rights_Id` int(11) NOT NULL,
  `Group_Mnge_Territories_Id` int(11) NOT NULL,
  PRIMARY KEY (`Group_Mnge_Rgt_Id`),
  KEY `FK_wipo_group_manage_rights_account_id` (`Group_Id`),
  KEY `FK_wipo_group_manage_rights_internal_position` (`Group_Mnge_Internal_Position_Id`),
  KEY `FK_wipo_group_manage_rights_region` (`Group_Mnge_Region_Id`),
  KEY `FK_wipo_group_manage_rights_profession` (`Group_Mnge_Profession_Id`),
  KEY `FK_wipo_group_manage_rights_work_category` (`Group_Mnge_Avl_Work_Cat_Id`),
  KEY `FK_wipo_group_manage_rights_type_of_rights` (`Group_Mnge_Type_Rght_Id`),
  KEY `FK_wipo_group_manage_rights_managerd_rights` (`Group_Mnge_Managed_Rights_Id`),
  KEY `FK_wipo_group_manage_rights_territories` (`Group_Mnge_Territories_Id`),
  KEY `FK_wipo_group_manage_rights_society` (`Group_Mnge_Society_Id`),
  CONSTRAINT `FK_wipo_group_manage_rights_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_internal_position` FOREIGN KEY (`Group_Mnge_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_managerd_rights` FOREIGN KEY (`Group_Mnge_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_profession` FOREIGN KEY (`Group_Mnge_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_region` FOREIGN KEY (`Group_Mnge_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_society` FOREIGN KEY (`Group_Mnge_Society_Id`) REFERENCES `wipo_society` (`Society_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_territories` FOREIGN KEY (`Group_Mnge_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_type_of_rights` FOREIGN KEY (`Group_Mnge_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_manage_rights_work_category` FOREIGN KEY (`Group_Mnge_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_manage_rights` */

insert  into `wipo_group_manage_rights`(`Group_Mnge_Rgt_Id`,`Group_Id`,`Group_Mnge_Society_Id`,`Group_Mnge_Entry_Date`,`Group_Mnge_Exit_Date`,`Group_Mnge_Internal_Position_Id`,`Group_Mnge_Entry_Date_2`,`Group_Mnge_Exit_Date_2`,`Group_Mnge_Region_Id`,`Group_Mnge_Profession_Id`,`Group_Mnge_File`,`Group_Mnge_Duration`,`Group_Mnge_Avl_Work_Cat_Id`,`Group_Mnge_Type_Rght_Id`,`Group_Mnge_Managed_Rights_Id`,`Group_Mnge_Territories_Id`) values (3,1,10,'2015-04-08','2015-04-30',1,'2015-04-08','2015-04-08',1,1,'',NULL,1,1,2,6),(4,15,10,'2015-04-27','2020-03-30',1,'2015-04-27','2020-03-30',1,1,'File',NULL,1,1,1,6),(5,9,10,'2015-04-30','0000-00-00',1,'2015-04-30','0000-00-00',1,NULL,'',NULL,1,4,2,6),(6,6,10,'2015-05-05','0000-00-00',1,'2015-05-05','0000-00-00',1,NULL,'',NULL,1,1,1,6);

/*Table structure for table `wipo_group_members` */

DROP TABLE IF EXISTS `wipo_group_members`;

CREATE TABLE `wipo_group_members` (
  `Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Member_Internal_Code` varchar(255) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Member_Id`),
  KEY `FK_wipo_group_biography_account_id` (`Group_Id`),
  KEY `FK_wipo_group_members_Perf_Internal_Code` (`Group_Member_Internal_Code`),
  CONSTRAINT `FK_wipo_group_members_group` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_members` */

insert  into `wipo_group_members`(`Group_Member_Id`,`Group_Id`,`Group_Member_Internal_Code`,`Created_Date`,`Rowversion`) values (13,3,'A1002','2015-04-09 01:42:07','0000-00-00 00:00:00'),(14,3,'A1003','2015-04-09 01:42:07','0000-00-00 00:00:00'),(50,1,'A1002','2015-04-27 17:55:15','0000-00-00 00:00:00'),(51,1,'A1003','2015-04-27 17:55:15','0000-00-00 00:00:00'),(52,1,'A1004','2015-04-27 17:55:15','0000-00-00 00:00:00'),(53,1,'A1005','2015-04-27 17:55:15','0000-00-00 00:00:00'),(57,3,'A1001','2015-04-27 18:01:37','0000-00-00 00:00:00'),(58,5,'A1001','2015-04-27 18:01:37','0000-00-00 00:00:00'),(59,9,'A1001','2015-04-27 18:01:37','0000-00-00 00:00:00'),(60,4,'P1001','2015-04-27 18:03:39','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_payment_method` */

DROP TABLE IF EXISTS `wipo_group_payment_method`;

CREATE TABLE `wipo_group_payment_method` (
  `Group_Pay_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Pay_Method_id` int(11) NOT NULL,
  `Group_Bank_Account_1` varchar(255) NOT NULL,
  `Group_Bank_Account_2` varchar(255) NOT NULL,
  `Group_Bank_Account_3` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Pay_Id`),
  KEY `FK_wipo_group_payment_method_account_id` (`Group_Id`),
  KEY `FK_wipo_group_payment_method_payment_mode` (`Group_Pay_Method_id`),
  CONSTRAINT `FK_wipo_group_payment_method_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_payment_method_payment_mode` FOREIGN KEY (`Group_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_payment_method` */

insert  into `wipo_group_payment_method`(`Group_Pay_Id`,`Group_Id`,`Group_Pay_Method_id`,`Group_Bank_Account_1`,`Group_Bank_Account_2`,`Group_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (2,1,1,'1232123','3212321323','1232123231231','1','2015-04-08 16:32:03','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_pseudonym` */

DROP TABLE IF EXISTS `wipo_group_pseudonym`;

CREATE TABLE `wipo_group_pseudonym` (
  `Group_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Pseudo_Type_Id` int(11) NOT NULL,
  `Group_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Pseudo_Id`),
  KEY `FK_wipo_group_pseudonym_pseodo_type` (`Group_Pseudo_Type_Id`),
  KEY `FK_wipo_group_pseudonym_group` (`Group_Id`),
  CONSTRAINT `FK_wipo_group_pseudonym_group` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_pseudonym_pseodo_type` FOREIGN KEY (`Group_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_pseudonym` */

insert  into `wipo_group_pseudonym`(`Group_Pseudo_Id`,`Group_Id`,`Group_Pseudo_Type_Id`,`Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (2,1,2,'PP','1','2015-04-08 18:34:23','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_representative` */

DROP TABLE IF EXISTS `wipo_group_representative`;

CREATE TABLE `wipo_group_representative` (
  `Group_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Rep_Name` varchar(100) NOT NULL,
  `Group_Rep_Address_1` varchar(255) DEFAULT NULL,
  `Group_Rep_Address_2` varchar(255) DEFAULT NULL,
  `Group_Rep_Address_3` varchar(255) DEFAULT NULL,
  `Group_Rep_Address_4` varchar(255) DEFAULT NULL,
  `Group_Home_Address_1` varchar(255) NOT NULL,
  `Group_Home_Address_2` varchar(255) DEFAULT NULL,
  `Group_Home_Address_3` varchar(255) DEFAULT NULL,
  `Group_Home_Address_4` varchar(255) DEFAULT NULL,
  `Group_Home_Fax` varchar(25) DEFAULT NULL,
  `Group_Home_Telephone` varchar(25) NOT NULL,
  `Group_Home_Email` varchar(50) NOT NULL,
  `Group_Home_Website` varchar(100) DEFAULT NULL,
  `Group_Mailing_Address_1` varchar(255) NOT NULL,
  `Group_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Group_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Group_Mailing_Address_4` varchar(255) DEFAULT NULL,
  `Group_Mailing_Telephone` varchar(25) NOT NULL,
  `Group_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Group_Mailing_Email` varchar(50) NOT NULL,
  `Group_Mailing_Website` varchar(100) DEFAULT NULL,
  `Group_Country_Id` int(11) DEFAULT NULL,
  `Group_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Addr_Id`),
  KEY `FK_wipo_group_representative_account_id` (`Group_Id`),
  KEY `FK_wipo_group_representative_country` (`Group_Country_Id`),
  CONSTRAINT `FK_wipo_group_representative_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_representative_country` FOREIGN KEY (`Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_representative` */

insert  into `wipo_group_representative`(`Group_Addr_Id`,`Group_Id`,`Group_Rep_Name`,`Group_Rep_Address_1`,`Group_Rep_Address_2`,`Group_Rep_Address_3`,`Group_Rep_Address_4`,`Group_Home_Address_1`,`Group_Home_Address_2`,`Group_Home_Address_3`,`Group_Home_Address_4`,`Group_Home_Fax`,`Group_Home_Telephone`,`Group_Home_Email`,`Group_Home_Website`,`Group_Mailing_Address_1`,`Group_Mailing_Address_2`,`Group_Mailing_Address_3`,`Group_Mailing_Address_4`,`Group_Mailing_Telephone`,`Group_Mailing_Fax`,`Group_Mailing_Email`,`Group_Mailing_Website`,`Group_Country_Id`,`Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (2,1,'Ron','','','','','1, Main street','','','','','96626166111','rom@gmail.com','','1, Main street','','','','342342123231','','ron@gmail.com','',2,'Y','1','2015-04-08 18:29:47','0000-00-00 00:00:00'),(3,9,'Ron','','','','','1, Main street','','','','','96626166111','rom@gmail.com','','1, Main street','','','','342342123231','','ron@gmail.com','',2,'N','1','2015-05-25 17:14:23','0000-00-00 00:00:00');

/*Table structure for table `wipo_internalcode_generate` */

DROP TABLE IF EXISTS `wipo_internalcode_generate`;

CREATE TABLE `wipo_internalcode_generate` (
  `Gen_Inter_Code_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Gen_User_Type` enum('A','P','G','O','PU','PR','PG','W','R') NOT NULL DEFAULT 'A' COMMENT 'A -> Author, P -> Performer, G -> Group, O -> Organization, PU -> Publisher, PR -> Producer, PG -> Publisher/producer group',
  `Gen_Prefix` varchar(10) DEFAULT NULL,
  `Gen_Inter_Code` varchar(50) NOT NULL,
  `Gen_Suffix` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Gen_Inter_Code_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_internalcode_generate` */

insert  into `wipo_internalcode_generate`(`Gen_Inter_Code_Id`,`Gen_User_Type`,`Gen_Prefix`,`Gen_Inter_Code`,`Gen_Suffix`) values (1,'A','A','1019',NULL),(2,'P','P','1005',NULL),(3,'G','G','1014',NULL),(4,'O','SOC','003',NULL),(5,'PU','E','109',NULL),(6,'PG','EG','108',NULL),(7,'PR','R','106',NULL),(8,'W','A','0000009',NULL),(9,'R','R','101',NULL);

/*Table structure for table `wipo_master_country` */

DROP TABLE IF EXISTS `wipo_master_country`;

CREATE TABLE `wipo_master_country` (
  `Master_Country_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Country_Name` varchar(45) NOT NULL COMMENT 'Name:',
  `Country_Two_Code` varchar(2) DEFAULT NULL COMMENT 'Two Code:',
  `Country_Three_Code` varchar(3) DEFAULT NULL COMMENT 'Three Code:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Country_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_country` */

insert  into `wipo_master_country`(`Master_Country_Id`,`Country_Name`,`Country_Two_Code`,`Country_Three_Code`,`Active`,`Created_Date`,`Rowversion`) values (2,'Nepal','NE','NEP','1','2015-03-12 15:12:13','0000-00-00 00:00:00'),(3,'Malaysia','ML','MLI','1','2015-03-13 18:40:09','0000-00-00 00:00:00'),(5,'Philipines','PH','PHL','1','2015-04-08 12:28:14','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_currency` */

DROP TABLE IF EXISTS `wipo_master_currency`;

CREATE TABLE `wipo_master_currency` (
  `Master_Crncy_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Currency_Code` varchar(10) DEFAULT NULL,
  `Currency_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Crncy_Id`),
  UNIQUE KEY `Master_Crncy_Id` (`Master_Crncy_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_currency` */

insert  into `wipo_master_currency`(`Master_Crncy_Id`,`Currency_Code`,`Currency_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'US','Dollar','1','2015-03-26 18:10:18','0000-00-00 00:00:00'),(2,'EUR','Euro','1','2015-03-26 18:10:28','0000-00-00 00:00:00'),(3,'INR','Rupee','1','2015-03-26 18:10:34','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_document` */

DROP TABLE IF EXISTS `wipo_master_document`;

CREATE TABLE `wipo_master_document` (
  `Master_Doc_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Doc_Name` varchar(90) NOT NULL COMMENT 'Document Name:',
  `Doc_Comment` varchar(90) NOT NULL COMMENT 'Document Comment:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Doc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_document` */

insert  into `wipo_master_document`(`Master_Doc_Id`,`Doc_Name`,`Doc_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'CUE-Sheet ','Audiovisual Musical works','1','2015-03-13 18:59:26','0000-00-00 00:00:00'),(2,'International Documentation','International Documentation','1','2015-03-13 18:59:38','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_document_status` */

DROP TABLE IF EXISTS `wipo_master_document_status`;

CREATE TABLE `wipo_master_document_status` (
  `Master_Document_Sts_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id:',
  `Document_Sts_Code` char(1) NOT NULL COMMENT 'Code:',
  `Document_Sts_Name` varchar(50) NOT NULL COMMENT 'Name:',
  `Document_Sts_Comment` text COMMENT 'Comment:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Document_Sts_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_document_status` */

insert  into `wipo_master_document_status`(`Master_Document_Sts_Id`,`Document_Sts_Code`,`Document_Sts_Name`,`Document_Sts_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'N','Declared work','Declared work','1','2015-03-14 11:40:40','0000-00-00 00:00:00'),(2,'I','Work documented','work documented in an international file','1','2015-03-14 11:41:14','0000-00-00 00:00:00'),(3,'U','Undeclared national work','undeclared national work; the author has been invited to declare it','1','2015-03-14 11:41:34','0000-00-00 00:00:00'),(4,'V','Undocumented foreign work','undocumented foreign work which has been identified by the name of its author and for which the fees have been paid on the basis of the CISAC “Warsaw Rule???;','1','2015-03-14 11:41:56','0000-00-00 00:00:00'),(5,'W','Foreign work','foreign work for which the data have been transferred from the WWL or WID documentation','1','2015-03-14 11:42:16','0000-00-00 00:00:00'),(6,'Q','Unidentified work','unidentified work which has been entered in an inquiry list according to the CISAC rules','1','2015-03-14 11:42:30','0000-00-00 00:00:00'),(7,'X','Non-identified work','non-identified work which appeared in a statement of works performed, broadcast or reproduced','1','2015-03-14 11:42:43','0000-00-00 00:00:00'),(8,'Y','Worldwide non documented work','Worldwide non documented work (WID,WWL)','1','2015-03-14 11:43:01','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_document_type` */

DROP TABLE IF EXISTS `wipo_master_document_type`;

CREATE TABLE `wipo_master_document_type` (
  `Master_Doc_Type_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Doc_Type_Name` varchar(90) NOT NULL COMMENT 'Type:',
  `Doc_Type_Comment` varchar(255) NOT NULL COMMENT 'Comments:',
  `Doc_Type_Status_Id` int(11) NOT NULL COMMENT 'Status:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Doc_Type_Id`),
  KEY `Doc_Type_Status` (`Doc_Type_Status_Id`),
  CONSTRAINT `FK_wipo_master_document_type` FOREIGN KEY (`Doc_Type_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_document_type` */

insert  into `wipo_master_document_type`(`Master_Doc_Type_Id`,`Doc_Type_Name`,`Doc_Type_Comment`,`Doc_Type_Status_Id`,`Active`,`Created_Date`,`Rowversion`) values (1,'Declared','Declared',1,'1','2015-03-14 11:49:32','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_event_type` */

DROP TABLE IF EXISTS `wipo_master_event_type`;

CREATE TABLE `wipo_master_event_type` (
  `Master_Evt_Type_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Event Type ID:',
  `Evt_Type_Name` varchar(45) NOT NULL COMMENT 'Event Type Name:',
  `Evt_Type_Comment` varchar(500) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Evt_Type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_event_type` */

insert  into `wipo_master_event_type`(`Master_Evt_Type_Id`,`Evt_Type_Name`,`Evt_Type_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'Close','Establishment Closes','1','2015-03-13 19:08:13','0000-00-00 00:00:00'),(2,'Stop','Establishment Stop using the protected works ','1','2015-03-13 19:08:30','0000-00-00 00:00:00'),(3,'Terminate','Establishment Terminates the Contract','1','2015-03-13 19:08:39','0000-00-00 00:00:00'),(4,'Transfer','Establishment Transfers to other owner','1','2015-03-13 19:08:48','0000-00-00 00:00:00'),(5,'Other','Other types','1','2015-03-13 19:08:58','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_factor` */

DROP TABLE IF EXISTS `wipo_master_factor`;

CREATE TABLE `wipo_master_factor` (
  `Master_Factor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Factor` decimal(10,2) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Factor_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_factor` */

insert  into `wipo_master_factor`(`Master_Factor_Id`,`Factor`,`Active`,`Created_Date`,`Rowversion`) values (1,'1.00','1','2015-05-13 17:57:56','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_hierarchy` */

DROP TABLE IF EXISTS `wipo_master_hierarchy`;

CREATE TABLE `wipo_master_hierarchy` (
  `Master_Hierarchy_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Hierarchy_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Hierarchy_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_hierarchy` */

insert  into `wipo_master_hierarchy`(`Master_Hierarchy_Id`,`Hierarchy_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Full member','1','2015-03-30 15:41:25','0000-00-00 00:00:00'),(2,'Candidate Member','1','2015-03-30 15:46:07','0000-00-00 00:00:00'),(3,'Honorary Member','1','2015-03-30 15:50:28','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_instrument` */

DROP TABLE IF EXISTS `wipo_master_instrument`;

CREATE TABLE `wipo_master_instrument` (
  `Master_Inst_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Instrument_Code` varchar(50) NOT NULL,
  `Instrument_Name` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Inst_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_instrument` */

insert  into `wipo_master_instrument`(`Master_Inst_Id`,`Instrument_Code`,`Instrument_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'ACC','Accordian','1','2015-05-18 16:02:43','0000-00-00 00:00:00'),(2,'ACL','Alto Carinet','1','2015-05-18 16:02:50','0000-00-00 00:00:00'),(3,'AHN','Alto flute','1','2015-05-18 16:02:56','0000-00-00 00:00:00'),(4,'AHN','Alto Horn','1','2015-05-18 16:03:01','0000-00-00 00:00:00'),(5,'ALP','Alp Horn','1','2015-05-18 16:03:10','0000-00-00 00:00:00'),(6,'ALT','Alto Voice','1','2015-05-18 16:03:17','0000-00-00 00:00:00'),(7,'AMP','Amplifier','1','2015-05-18 16:03:31','0000-00-00 00:00:00'),(8,'ARC','Alto Recorder','1','2015-05-18 16:03:40','0000-00-00 00:00:00'),(9,'ASX','Alto Saxophone','1','2015-05-18 16:03:49','0000-00-00 00:00:00'),(10,'BAG','Bagpipes','1','2015-05-18 16:03:58','0000-00-00 00:00:00'),(11,'BAR','Baritone Horn','1','2015-05-18 16:04:08','0000-00-00 00:00:00'),(12,'BASDBS','Double Bass','1','2015-05-18 16:04:17','0000-00-00 00:00:00'),(13,'BBF','Bamboo Flute','1','2015-05-18 16:04:27','0000-00-00 00:00:00'),(14,'BBT','Bass Baritone','1','2015-05-18 16:04:34','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_internal_position` */

DROP TABLE IF EXISTS `wipo_master_internal_position`;

CREATE TABLE `wipo_master_internal_position` (
  `Master_Int_Post_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Int_Post_Name` varchar(90) NOT NULL COMMENT 'Internal position:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Int_Post_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_internal_position` */

insert  into `wipo_master_internal_position`(`Master_Int_Post_Id`,`Int_Post_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Full member','1','2015-03-13 18:53:51','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_international_number` */

DROP TABLE IF EXISTS `wipo_master_international_number`;

CREATE TABLE `wipo_master_international_number` (
  `Master_International_Id` int(11) NOT NULL AUTO_INCREMENT,
  `International_Number_Type` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_International_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_international_number` */

insert  into `wipo_master_international_number`(`Master_International_Id`,`International_Number_Type`,`Active`,`Created_Date`,`Rowversion`) values (1,'IPI','1','2015-03-30 16:43:25','0000-00-00 00:00:00'),(2,'AV Index','1','2015-03-30 16:43:34','0000-00-00 00:00:00'),(3,'ISAN','1','2015-03-30 16:43:42','0000-00-00 00:00:00'),(4,'ISRC','1','2015-03-30 16:43:52','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_label` */

DROP TABLE IF EXISTS `wipo_master_label`;

CREATE TABLE `wipo_master_label` (
  `Master_Label_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Label_Code` varchar(50) NOT NULL,
  `Label_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Label_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_label` */

insert  into `wipo_master_label`(`Master_Label_Id`,`Label_Code`,`Label_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Sony','Sony','1','2015-05-09 11:40:05','0000-00-00 00:00:00'),(2,'Samsung','Samsung','1','2015-05-09 17:48:16','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_language` */

DROP TABLE IF EXISTS `wipo_master_language`;

CREATE TABLE `wipo_master_language` (
  `Master_Lang_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Lang_Name` varchar(45) NOT NULL COMMENT 'Language:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Lang_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_language` */

insert  into `wipo_master_language`(`Master_Lang_Id`,`Lang_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'English','1','2015-03-13 18:41:49','0000-00-00 00:00:00'),(2,'Mandarin','1','2015-03-13 18:42:26','0000-00-00 00:00:00'),(3,'Spanish','1','2015-03-13 18:42:36','0000-00-00 00:00:00'),(4,'Hindi','1','2015-03-13 18:42:44','0000-00-00 00:00:00'),(5,'Nepali','1','2015-05-14 19:18:00','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_legal_form` */

DROP TABLE IF EXISTS `wipo_master_legal_form`;

CREATE TABLE `wipo_master_legal_form` (
  `Master_Legal_Form_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Legal_Form_Name` varchar(90) NOT NULL COMMENT 'Legal Form:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Legal_Form_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_legal_form` */

insert  into `wipo_master_legal_form`(`Master_Legal_Form_Id`,`Legal_Form_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Limited company','1','2015-03-13 18:54:02','0000-00-00 00:00:00'),(2,'Partnership','1','2015-03-13 18:54:10','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_managed_rights` */

DROP TABLE IF EXISTS `wipo_master_managed_rights`;

CREATE TABLE `wipo_master_managed_rights` (
  `Master_Mgd_Rights_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Mgd_Rights_Name` varchar(90) NOT NULL COMMENT 'Managed rights:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Mgd_Rights_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_managed_rights` */

insert  into `wipo_master_managed_rights`(`Master_Mgd_Rights_Id`,`Mgd_Rights_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'All rights','1','2015-03-13 18:52:15','0000-00-00 00:00:00'),(2,'Exclusive rights','1','2015-03-13 18:52:27','0000-00-00 00:00:00'),(3,'Equitable Remuneration','0','2015-03-13 18:52:41','0000-00-00 00:00:00'),(4,'Neighboring Rights','1','2015-03-13 18:52:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_marital_status` */

DROP TABLE IF EXISTS `wipo_master_marital_status`;

CREATE TABLE `wipo_master_marital_status` (
  `Master_Marital_State_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Marital_State` varchar(10) NOT NULL COMMENT 'Marital Status:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Marital_State_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_marital_status` */

insert  into `wipo_master_marital_status`(`Master_Marital_State_Id`,`Marital_State`,`Active`,`Created_Date`,`Rowversion`) values (1,'Single','1','2015-03-25 17:56:21','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_module` */

DROP TABLE IF EXISTS `wipo_master_module`;

CREATE TABLE `wipo_master_module` (
  `Master_Module_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Module_Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Module_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_module` */

insert  into `wipo_master_module`(`Master_Module_ID`,`Module_Code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values (1,'INS','Installation','0','2015-02-16 11:09:40','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_nationality` */

DROP TABLE IF EXISTS `wipo_master_nationality`;

CREATE TABLE `wipo_master_nationality` (
  `Master_Nation_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Nation_Name` varchar(90) NOT NULL COMMENT 'Nationality:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Nation_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_nationality` */

insert  into `wipo_master_nationality`(`Master_Nation_Id`,`Nation_Name`,`Active`,`Created_Date`,`Rowversion`) values (2,'Nepal','1','2015-03-13 18:40:20','0000-00-00 00:00:00'),(3,'Indonisia','1','2015-03-13 18:40:27','0000-00-00 00:00:00'),(4,'Malaysia','1','2015-03-13 18:40:35','0000-00-00 00:00:00'),(5,'Philipines','1','2015-04-08 23:22:40','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_payment_method` */

DROP TABLE IF EXISTS `wipo_master_payment_method`;

CREATE TABLE `wipo_master_payment_method` (
  `Master_Paymode_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Paymode_Name` varchar(45) NOT NULL COMMENT 'Payment Method:',
  `Paymode_Comment` varchar(90) NOT NULL COMMENT 'Payment Comment:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Paymode_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_payment_method` */

insert  into `wipo_master_payment_method`(`Master_Paymode_Id`,`Paymode_Name`,`Paymode_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'Paypal','Paypal','1','2015-03-13 19:03:36','0000-00-00 00:00:00'),(2,'Net Banking','Net Banking','1','2015-03-13 19:05:07','0000-00-00 00:00:00'),(3,'Google Wallet','Google Wallet','1','2015-03-13 19:05:16','0000-00-00 00:00:00'),(4,'VTC Pay','VTC Pay','1','2015-03-13 19:05:28','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_profession` */

DROP TABLE IF EXISTS `wipo_master_profession`;

CREATE TABLE `wipo_master_profession` (
  `Master_Profession_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Profession_Name` varchar(45) NOT NULL COMMENT 'Profession Title:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Profession_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_profession` */

insert  into `wipo_master_profession`(`Master_Profession_Id`,`Profession_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Artist','1','2015-03-13 18:47:52','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_pseudonym_types` */

DROP TABLE IF EXISTS `wipo_master_pseudonym_types`;

CREATE TABLE `wipo_master_pseudonym_types` (
  `Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Pseudo_Code` varchar(5) NOT NULL COMMENT 'Pseudonym Types:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pseudo_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_pseudonym_types` */

insert  into `wipo_master_pseudonym_types`(`Pseudo_Id`,`Pseudo_Code`,`Active`,`Created_Date`,`Rowversion`) values (1,'PP','1','2015-03-13 19:09:20','0000-00-00 00:00:00'),(2,'PS','1','2015-03-13 19:09:24','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_region` */

DROP TABLE IF EXISTS `wipo_master_region`;

CREATE TABLE `wipo_master_region` (
  `Master_Region_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Region_Name` varchar(90) NOT NULL COMMENT 'Region:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Region_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_region` */

insert  into `wipo_master_region`(`Master_Region_Id`,`Region_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Nepal','1','2015-03-13 18:44:44','0000-00-00 00:00:00'),(2,'Indonisia','1','2015-03-13 18:44:50','0000-00-00 00:00:00'),(3,'Malaysia','1','2015-03-13 18:44:57','0000-00-00 00:00:00'),(4,'Philipines','1','2015-03-13 18:45:05','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_role` */

DROP TABLE IF EXISTS `wipo_master_role`;

CREATE TABLE `wipo_master_role` (
  `Master_Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `is_Admin` enum('0','1') NOT NULL DEFAULT '0',
  `Active` enum('0','1') DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Role_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_role` */

insert  into `wipo_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values (1,'A','Artist','0','1','2015-03-12 16:02:31','0000-00-00 00:00:00'),(2,'A','Writer','0','1','2015-03-12 15:39:04','0000-00-00 00:00:00'),(3,'A','Lyricist','0','1','2015-03-12 15:52:51','0000-00-00 00:00:00'),(4,'AD','Adapter','0','1','2015-03-13 18:46:26','0000-00-00 00:00:00'),(5,'EM','Music Publisher','1','0','2015-03-13 18:46:36','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_screen` */

DROP TABLE IF EXISTS `wipo_master_screen`;

CREATE TABLE `wipo_master_screen` (
  `Master_Screen_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Module_ID` int(11) NOT NULL,
  `Screen_code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Screen_ID`),
  KEY `FK_wipo_master_screen_module` (`Module_ID`),
  CONSTRAINT `FK_wipo_master_screen_module` FOREIGN KEY (`Module_ID`) REFERENCES `wipo_master_module` (`Master_Module_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_screen` */

insert  into `wipo_master_screen`(`Master_Screen_ID`,`Module_ID`,`Screen_code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'COU','Country','0','2015-02-16 11:13:44','0000-00-00 00:00:00'),(2,1,'LAN','Languagae','0','2015-02-16 11:13:48','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_territories` */

DROP TABLE IF EXISTS `wipo_master_territories`;

CREATE TABLE `wipo_master_territories` (
  `Master_Territory_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Territory_Name` varchar(90) NOT NULL COMMENT 'Territory:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Territory_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_territories` */

insert  into `wipo_master_territories`(`Master_Territory_Id`,`Territory_Name`,`Active`,`Created_Date`,`Rowversion`) values (6,'Country','1','2015-03-13 18:53:26','0000-00-00 00:00:00'),(7,'Common Wealth Asian Territories','1','2015-03-13 18:53:39','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_type` */

DROP TABLE IF EXISTS `wipo_master_type`;

CREATE TABLE `wipo_master_type` (
  `Master_Type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_type` */

insert  into `wipo_master_type`(`Master_Type_Id`,`Type_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Jazz','1','2015-03-30 15:56:59','0000-00-00 00:00:00'),(2,'Popular','1','2015-03-30 15:57:05','0000-00-00 00:00:00'),(3,'Serious','1','2015-03-30 15:57:16','0000-00-00 00:00:00'),(4,'Modern','1','2015-05-14 19:16:53','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_type_rights` */

DROP TABLE IF EXISTS `wipo_master_type_rights`;

CREATE TABLE `wipo_master_type_rights` (
  `Master_Type_Rights_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Type_Rights_Name` varchar(90) NOT NULL COMMENT 'Type of Right holder:',
  `Type_Rights_Code` varchar(10) NOT NULL,
  `Type_Rights_Standard` varchar(10) DEFAULT NULL,
  `Type_Rights_Rank` smallint(6) DEFAULT NULL,
  `Type_Rights_Occupation` enum('AU','PE','PU','PR') NOT NULL COMMENT 'AU -> Author, PE -> Performer, PU -> Publisher, PR -> Producer',
  `Type_Rights_Domain` enum('C','R') NOT NULL COMMENT 'C -> Copyright, R -> Releated Right',
  `Type_Right_Use` varchar(100) DEFAULT NULL COMMENT 'Not used',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Type_Rights_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_type_rights` */

insert  into `wipo_master_type_rights`(`Master_Type_Rights_Id`,`Type_Rights_Name`,`Type_Rights_Code`,`Type_Rights_Standard`,`Type_Rights_Rank`,`Type_Rights_Occupation`,`Type_Rights_Domain`,`Type_Right_Use`,`Active`,`Created_Date`,`Rowversion`) values (1,'MC- Music composer','MC','MC',4,'PE','C',NULL,'1','2015-03-13 18:48:28','0000-00-00 00:00:00'),(2,'Music Publisher','MP','MP',3,'PU','C',NULL,'1','2015-05-07 13:20:09','0000-00-00 00:00:00'),(3,'Producer','PR','PR',2,'PR','C',NULL,'1','2015-05-07 13:20:16','0000-00-00 00:00:00'),(4,'Author, Writer, Lyricist','A','A',1,'AU','C',NULL,'1','2015-05-18 13:33:08','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_works_category` */

DROP TABLE IF EXISTS `wipo_master_works_category`;

CREATE TABLE `wipo_master_works_category` (
  `Master_Work_Category_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Work_Category_Name` varchar(90) NOT NULL COMMENT 'Works Category ',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Work_Category_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_works_category` */

insert  into `wipo_master_works_category`(`Master_Work_Category_Id`,`Work_Category_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'MW-Music works','1','2015-03-13 18:48:12','0000-00-00 00:00:00');

/*Table structure for table `wipo_number_assignment` */

DROP TABLE IF EXISTS `wipo_number_assignment`;

CREATE TABLE `wipo_number_assignment` (
  `Num_Assgn_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Assgn_System_Id` varchar(100) NOT NULL,
  `Num_Assgn_Series_From` mediumint(6) NOT NULL,
  `Num_Assgn_Series_To` mediumint(6) NOT NULL,
  `Num_Assgn_List` varchar(50) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Num_Assgn_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_number_assignment` */

insert  into `wipo_number_assignment`(`Num_Assgn_Id`,`Num_Assgn_System_Id`,`Num_Assgn_Series_From`,`Num_Assgn_Series_To`,`Num_Assgn_List`,`Active`,`Created_Date`,`Rowversion`) values (2,'test',0,0,'5,2,4','1','2015-03-20 17:55:48','0000-00-00 00:00:00');

/*Table structure for table `wipo_organization` */

DROP TABLE IF EXISTS `wipo_organization`;

CREATE TABLE `wipo_organization` (
  `Org_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Org_Code` varchar(25) NOT NULL,
  `Org_Abbrevation` varchar(100) NOT NULL,
  `Org_Nation_Id` int(11) DEFAULT NULL,
  `Org_Country_Id` int(11) DEFAULT NULL,
  `Org_Currency_Id` int(11) DEFAULT NULL,
  `Org_Society_Type_Id` varchar(50) DEFAULT NULL,
  `Org_Address` text,
  `Org_Telephone` varchar(50) DEFAULT NULL,
  `Org_Email` varchar(50) DEFAULT NULL,
  `Org_Fax` varchar(50) DEFAULT NULL,
  `Org_Website` varchar(50) DEFAULT NULL,
  `Org_Bank_Account` varchar(100) DEFAULT NULL,
  `Org_Related_Rights` int(11) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Org_Id`),
  UNIQUE KEY `NewIndex1` (`Org_Code`),
  KEY `FK_wipo_organization_nation` (`Org_Nation_Id`),
  KEY `Country` (`Org_Country_Id`),
  KEY `Currency` (`Org_Currency_Id`),
  CONSTRAINT `FK_wipo_organization` FOREIGN KEY (`Org_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_currency` FOREIGN KEY (`Org_Currency_Id`) REFERENCES `wipo_master_currency` (`Master_Crncy_Id`),
  CONSTRAINT `FK_wipo_organization_nation` FOREIGN KEY (`Org_Nation_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_organization` */

insert  into `wipo_organization`(`Org_Id`,`Org_Code`,`Org_Abbrevation`,`Org_Nation_Id`,`Org_Country_Id`,`Org_Currency_Id`,`Org_Society_Type_Id`,`Org_Address`,`Org_Telephone`,`Org_Email`,`Org_Fax`,`Org_Website`,`Org_Bank_Account`,`Org_Related_Rights`,`Active`,`Created_Date`,`Rowversion`) values (1,'SOC001','MRCSN',2,2,3,'Copyright','','','tes@test.com','','','',NULL,'1',NULL,'0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_account` */

DROP TABLE IF EXISTS `wipo_performer_account`;

CREATE TABLE `wipo_performer_account` (
  `Perf_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Sur_Name` varchar(50) NOT NULL,
  `Perf_First_Name` varchar(255) NOT NULL,
  `Perf_Internal_Code` varchar(255) NOT NULL,
  `Perf_Ipi` int(11) DEFAULT NULL,
  `Perf_Ipi_Base_Number` int(11) DEFAULT NULL,
  `Perf_Ipn_Number` int(11) DEFAULT NULL,
  `Perf_DOB` date DEFAULT NULL,
  `Perf_Place_Of_Birth_Id` int(11) DEFAULT NULL,
  `Perf_Birth_Country_Id` int(11) DEFAULT NULL,
  `Perf_Nationality_Id` int(11) DEFAULT NULL,
  `Perf_Language_Id` int(11) DEFAULT NULL,
  `Perf_Identity_Number` varchar(255) DEFAULT NULL,
  `Perf_Marital_Status_Id` int(11) DEFAULT NULL,
  `Perf_Spouse_Name` varchar(255) DEFAULT NULL,
  `Perf_Gender` enum('M','F') DEFAULT 'M',
  `Perf_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Acc_Id`),
  UNIQUE KEY `Internal_Code` (`Perf_Internal_Code`),
  KEY `Perf_Account_index` (`Perf_Place_Of_Birth_Id`,`Perf_Birth_Country_Id`,`Perf_Nationality_Id`,`Perf_Language_Id`,`Perf_Marital_Status_Id`),
  KEY `FK_wipo_performer_account_country` (`Perf_Birth_Country_Id`),
  KEY `FK_wipo_performer_account_nationality` (`Perf_Nationality_Id`),
  KEY `FK_wipo_performer_account_language` (`Perf_Language_Id`),
  KEY `FK_wipo_performer_account` (`Perf_Marital_Status_Id`),
  CONSTRAINT `FK_wipo_performer_account` FOREIGN KEY (`Perf_Marital_Status_Id`) REFERENCES `wipo_master_marital_status` (`Master_Marital_State_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_country` FOREIGN KEY (`Perf_Birth_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_language` FOREIGN KEY (`Perf_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_nationality` FOREIGN KEY (`Perf_Nationality_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account` */

insert  into `wipo_performer_account`(`Perf_Acc_Id`,`Perf_Sur_Name`,`Perf_First_Name`,`Perf_Internal_Code`,`Perf_Ipi`,`Perf_Ipi_Base_Number`,`Perf_Ipn_Number`,`Perf_DOB`,`Perf_Place_Of_Birth_Id`,`Perf_Birth_Country_Id`,`Perf_Nationality_Id`,`Perf_Language_Id`,`Perf_Identity_Number`,`Perf_Marital_Status_Id`,`Perf_Spouse_Name`,`Perf_Gender`,`Perf_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (1,'Perf Sur','Perf First First','P1001',NULL,NULL,NULL,'1959-02-11',1,2,2,4,'',1,'','M','Y','1','2015-03-31 11:18:24','0000-00-00 00:00:00'),(2,'Perf Sur','Perf First Second','P1002',12321321,NULL,NULL,'1990-03-01',1,NULL,NULL,NULL,'',1,'','M','N','1','2015-04-07 15:41:23','0000-00-00 00:00:00'),(3,'Perf Sur','Perf First Three','P1003',12321321,NULL,NULL,'2015-04-29',NULL,NULL,NULL,NULL,'',1,'','M','N','0','2015-04-07 17:30:09','0000-00-00 00:00:00'),(4,'test','Testtest','P1004',NULL,NULL,NULL,'2015-04-23',NULL,2,2,1,'',1,'','M','N','1','2015-04-27 18:48:07','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_account_address` */

DROP TABLE IF EXISTS `wipo_performer_account_address`;

CREATE TABLE `wipo_performer_account_address` (
  `Perf_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Home_Address_1` varchar(255) NOT NULL,
  `Perf_Home_Address_2` varchar(255) DEFAULT NULL,
  `Perf_Home_Address_3` varchar(255) DEFAULT NULL,
  `Perf_Home_Fax` varchar(25) DEFAULT NULL,
  `Perf_Home_Telephone` varchar(25) NOT NULL,
  `Perf_Home_Email` varchar(50) NOT NULL,
  `Perf_Home_Website` varchar(100) DEFAULT NULL,
  `Perf_Mailing_Address_1` varchar(255) NOT NULL,
  `Perf_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Perf_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Perf_Mailing_Telephone` varchar(25) NOT NULL,
  `Perf_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Perf_Mailing_Email` varchar(50) NOT NULL,
  `Perf_Mailing_Website` varchar(100) DEFAULT NULL,
  `Perf_Author_Account_1` varchar(255) DEFAULT NULL,
  `Perf_Author_Account_2` varchar(255) DEFAULT NULL,
  `Perf_Author_Account_3` varchar(255) DEFAULT NULL,
  `Perf_Performer_Account_1` varchar(255) DEFAULT NULL,
  `Perf_Performer_Account_2` varchar(255) DEFAULT NULL,
  `Perf_Performer_Account_3` varchar(255) DEFAULT NULL,
  `Perf_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Addr_Id`),
  KEY `FK_wipo_performer_account_address_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_account_address_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account_address` */

insert  into `wipo_performer_account_address`(`Perf_Addr_Id`,`Perf_Acc_Id`,`Perf_Home_Address_1`,`Perf_Home_Address_2`,`Perf_Home_Address_3`,`Perf_Home_Fax`,`Perf_Home_Telephone`,`Perf_Home_Email`,`Perf_Home_Website`,`Perf_Mailing_Address_1`,`Perf_Mailing_Address_2`,`Perf_Mailing_Address_3`,`Perf_Mailing_Telephone`,`Perf_Mailing_Fax`,`Perf_Mailing_Email`,`Perf_Mailing_Website`,`Perf_Author_Account_1`,`Perf_Author_Account_2`,`Perf_Author_Account_3`,`Perf_Performer_Account_1`,`Perf_Performer_Account_2`,`Perf_Performer_Account_3`,`Perf_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Test1','','','','12323123','test@etst.com','','Test','','','13123123','','test@etst.com','',NULL,NULL,NULL,'','','','Y','1','2015-03-31 11:25:12','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_biography` */

DROP TABLE IF EXISTS `wipo_performer_biography`;

CREATE TABLE `wipo_performer_biography` (
  `Perf_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Biogrph_Id`),
  KEY `FK_wipo_performer_biography_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_biography_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_biography` */

insert  into `wipo_performer_biography`(`Perf_Biogrph_Id`,`Perf_Acc_Id`,`Perf_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Test','1','2015-03-31 11:26:21','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_death_inheritance` */

DROP TABLE IF EXISTS `wipo_performer_death_inheritance`;

CREATE TABLE `wipo_performer_death_inheritance` (
  `Perf_Death_Inhrt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Death_Inhrt_Firstname` varchar(50) NOT NULL,
  `Perf_Death_Inhrt_Surname` varchar(50) NOT NULL,
  `Perf_Death_Inhrt_Email` varchar(100) NOT NULL,
  `Perf_Death_Inhrt_Phone` varchar(50) NOT NULL,
  `Perf_Death_Inhrt_Address_1` varchar(500) NOT NULL,
  `Perf_Death_Inhrt_Address_2` varchar(500) NOT NULL,
  `Perf_Death_Inhrt_Address_3` varchar(500) NOT NULL,
  `Perf_Death_Inhrt_Addtion_Annotation` text,
  PRIMARY KEY (`Perf_Death_Inhrt_Id`),
  KEY `FK_wipo_performer_death_inheritance_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_death_inheritance_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_death_inheritance` */

insert  into `wipo_performer_death_inheritance`(`Perf_Death_Inhrt_Id`,`Perf_Acc_Id`,`Perf_Death_Inhrt_Firstname`,`Perf_Death_Inhrt_Surname`,`Perf_Death_Inhrt_Email`,`Perf_Death_Inhrt_Phone`,`Perf_Death_Inhrt_Address_1`,`Perf_Death_Inhrt_Address_2`,`Perf_Death_Inhrt_Address_3`,`Perf_Death_Inhrt_Addtion_Annotation`) values (1,1,'test','Tset','test@etead.com','test','test','test','test','test');

/*Table structure for table `wipo_performer_payment_method` */

DROP TABLE IF EXISTS `wipo_performer_payment_method`;

CREATE TABLE `wipo_performer_payment_method` (
  `Perf_Pay_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Pay_Method_id` int(11) NOT NULL,
  `Perf_Bank_Account_1` varchar(255) NOT NULL,
  `Perf_Bank_Account_2` varchar(255) NOT NULL,
  `Perf_Bank_Account_3` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Pay_Id`),
  KEY `FK_wipo_performer_payment_method_account_id` (`Perf_Acc_Id`),
  KEY `FK_wipo_performer_payment_method_payment_mode` (`Perf_Pay_Method_id`),
  CONSTRAINT `FK_wipo_performer_payment_method_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_payment_method_payment_mode` FOREIGN KEY (`Perf_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_payment_method` */

insert  into `wipo_performer_payment_method`(`Perf_Pay_Id`,`Perf_Acc_Id`,`Perf_Pay_Method_id`,`Perf_Bank_Account_1`,`Perf_Bank_Account_2`,`Perf_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'test','test','test','1','2015-03-31 11:25:24','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_pseudonym` */

DROP TABLE IF EXISTS `wipo_performer_pseudonym`;

CREATE TABLE `wipo_performer_pseudonym` (
  `Perf_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Pseudo_Type_Id` int(11) NOT NULL,
  `Perf_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Pseudo_Id`),
  KEY `FK_wipo_performer_pseudonym_pseodo_type` (`Perf_Pseudo_Type_Id`),
  KEY `FK_wipo_performer_pseudonym_performer_account` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_pseudonym_performer_account` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_pseudonym_pseodo_type` FOREIGN KEY (`Perf_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_pseudonym` */

insert  into `wipo_performer_pseudonym`(`Perf_Pseudo_Id`,`Perf_Acc_Id`,`Perf_Pseudo_Type_Id`,`Perf_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,2,'PSH','1','2015-03-31 11:28:32','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_related_rights` */

DROP TABLE IF EXISTS `wipo_performer_related_rights`;

CREATE TABLE `wipo_performer_related_rights` (
  `Perf_Rel_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Rel_Society_Id` int(11) NOT NULL,
  `Perf_Rel_Entry_Date` date NOT NULL,
  `Perf_Rel_Exit_Date` date DEFAULT NULL,
  `Perf_Rel_Internal_Position_Id` int(11) NOT NULL,
  `Perf_Rel_Entry_Date_2` date NOT NULL,
  `Perf_Rel_Exit_Date_2` date DEFAULT NULL,
  `Perf_Rel_Region_Id` int(11) DEFAULT NULL,
  `Perf_Rel_Profession_Id` int(11) DEFAULT NULL,
  `Perf_Rel_File` varchar(255) DEFAULT NULL,
  `Perf_Rel_Duration` varchar(100) DEFAULT NULL,
  `Perf_Rel_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Perf_Rel_Type_Rght_Id` int(11) NOT NULL,
  `Perf_Rel_Managed_Rights_Id` int(11) NOT NULL,
  `Perf_Rel_Territories_Id` int(11) NOT NULL,
  PRIMARY KEY (`Perf_Rel_Rgt_Id`),
  KEY `FK_wipo_performer_related_rights_account_id` (`Perf_Acc_Id`),
  KEY `FK_wipo_performer_related_rights_internal_position` (`Perf_Rel_Internal_Position_Id`),
  KEY `FK_wipo_performer_related_rights_region` (`Perf_Rel_Region_Id`),
  KEY `FK_wipo_performer_related_rights_profession` (`Perf_Rel_Profession_Id`),
  KEY `FK_wipo_performer_related_rights_work_category` (`Perf_Rel_Avl_Work_Cat_Id`),
  KEY `FK_wipo_performer_related_rights_type_of_rights` (`Perf_Rel_Type_Rght_Id`),
  KEY `FK_wipo_performer_related_rights_managerd_rights` (`Perf_Rel_Managed_Rights_Id`),
  KEY `FK_wipo_performer_related_rights_territories` (`Perf_Rel_Territories_Id`),
  CONSTRAINT `FK_wipo_performer_related_rights_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_internal_position` FOREIGN KEY (`Perf_Rel_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_managerd_rights` FOREIGN KEY (`Perf_Rel_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_profession` FOREIGN KEY (`Perf_Rel_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_region` FOREIGN KEY (`Perf_Rel_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_territories` FOREIGN KEY (`Perf_Rel_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_type_of_rights` FOREIGN KEY (`Perf_Rel_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_related_rights_work_category` FOREIGN KEY (`Perf_Rel_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_related_rights` */

insert  into `wipo_performer_related_rights`(`Perf_Rel_Rgt_Id`,`Perf_Acc_Id`,`Perf_Rel_Society_Id`,`Perf_Rel_Entry_Date`,`Perf_Rel_Exit_Date`,`Perf_Rel_Internal_Position_Id`,`Perf_Rel_Entry_Date_2`,`Perf_Rel_Exit_Date_2`,`Perf_Rel_Region_Id`,`Perf_Rel_Profession_Id`,`Perf_Rel_File`,`Perf_Rel_Duration`,`Perf_Rel_Avl_Work_Cat_Id`,`Perf_Rel_Type_Rght_Id`,`Perf_Rel_Managed_Rights_Id`,`Perf_Rel_Territories_Id`) values (1,1,10,'2015-03-01','0000-00-00',1,'2015-03-01','0000-00-00',1,1,'','',1,1,1,6),(2,3,10,'2015-04-01','2015-04-01',1,'2015-04-01','2015-04-07',NULL,NULL,NULL,NULL,1,1,1,6),(3,2,10,'2015-04-09','0000-00-00',1,'2015-04-09','0000-00-00',1,1,NULL,NULL,1,1,2,6);

/*Table structure for table `wipo_performer_upload` */

DROP TABLE IF EXISTS `wipo_performer_upload`;

CREATE TABLE `wipo_performer_upload` (
  `Perf_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Upl_Doc_Name` varchar(255) NOT NULL,
  `Perf_Upl_File` varchar(1000) NOT NULL,
  PRIMARY KEY (`Perf_Upl_Id`),
  KEY `FK_wipo_performer_upload_auth` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_upload_auth` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_upload` */

insert  into `wipo_performer_upload`(`Perf_Upl_Id`,`Perf_Acc_Id`,`Perf_Upl_Doc_Name`,`Perf_Upl_File`) values (9,1,'test 5','\\performerupload\\0c1165ada6b73a5f050436ffdc026c4e.jpg'),(10,1,'test','\\performerupload\\17bb30b1bcb4ab9548b8af97b82e0a89.jpg'),(11,1,'test','\\performerupload\\17471c0775c364f14a84e46cbfccf156.png');

/*Table structure for table `wipo_producer_account` */

DROP TABLE IF EXISTS `wipo_producer_account`;

CREATE TABLE `wipo_producer_account` (
  `Pro_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Corporate_Name` varchar(255) NOT NULL,
  `Pro_Internal_Code` varchar(255) NOT NULL,
  `Pro_Ipi` mediumint(9) DEFAULT NULL,
  `Pro_Ipi_Base_Number` mediumint(9) DEFAULT NULL,
  `Pro_Date` date NOT NULL,
  `Pro_Place` varchar(255) DEFAULT NULL,
  `Pro_Country_Id` int(11) DEFAULT NULL,
  `Pro_Legal_Form_id` int(11) DEFAULT NULL,
  `Pro_Reg_Date` date DEFAULT NULL,
  `Pro_Reg_Number` varchar(255) DEFAULT NULL,
  `Pro_Excerpt_Date` date DEFAULT NULL,
  `Pro_Language_Id` int(11) DEFAULT NULL,
  `Pro_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_account_country` (`Pro_Country_Id`),
  KEY `FK_wipo_producer_account_legal_form` (`Pro_Legal_Form_id`),
  KEY `FK_wipo_producer_account_language` (`Pro_Language_Id`),
  CONSTRAINT `FK_wipo_producer_account_country` FOREIGN KEY (`Pro_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_language` FOREIGN KEY (`Pro_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_legal_form` FOREIGN KEY (`Pro_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account` */

insert  into `wipo_producer_account`(`Pro_Acc_Id`,`Pro_Corporate_Name`,`Pro_Internal_Code`,`Pro_Ipi`,`Pro_Ipi_Base_Number`,`Pro_Date`,`Pro_Place`,`Pro_Country_Id`,`Pro_Legal_Form_id`,`Pro_Reg_Date`,`Pro_Reg_Number`,`Pro_Excerpt_Date`,`Pro_Language_Id`,`Pro_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (4,'ABM Limited','R100',NULL,NULL,'2015-04-22','',2,1,'0000-00-00','','2015-04-29',1,'Y','1','2015-04-27 18:51:39','0000-00-00 00:00:00'),(5,'OPM Limited','R101',NULL,NULL,'2015-04-30','',2,1,'0000-00-00','','0000-00-00',2,'N','1','2015-04-28 19:51:11','0000-00-00 00:00:00'),(6,'HPM Limited','R103',NULL,NULL,'2015-05-30','',NULL,NULL,'0000-00-00','','0000-00-00',NULL,'N','1','2015-05-05 17:16:07','0000-00-00 00:00:00'),(9,'LIM Limited','R104',NULL,NULL,'2015-05-29','',2,NULL,'0000-00-00','','0000-00-00',NULL,'N','1','2015-05-06 16:41:30','0000-00-00 00:00:00'),(10,'PST Limited','R105',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N','1','2015-05-07 13:40:25','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_account_address` */

DROP TABLE IF EXISTS `wipo_producer_account_address`;

CREATE TABLE `wipo_producer_account_address` (
  `Pro_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Head_Address_1` varchar(255) NOT NULL,
  `Pro_Head_Address_2` varchar(255) DEFAULT NULL,
  `Pro_Head_Address_3` varchar(255) DEFAULT NULL,
  `Pro_Head_Fax` varchar(25) DEFAULT NULL,
  `Pro_Head_Telephone` varchar(25) NOT NULL,
  `Pro_Head_Email` varchar(50) NOT NULL,
  `Pro_Head_Website` varchar(100) DEFAULT NULL,
  `Pro_Mailing_Address_1` varchar(255) NOT NULL,
  `Pro_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Pro_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Pro_Mailing_Telephone` varchar(25) NOT NULL,
  `Pro_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Pro_Mailing_Email` varchar(50) NOT NULL,
  `Pro_Mailing_Website` varchar(100) DEFAULT NULL,
  `Pro_Publisher_Account_1` varchar(255) DEFAULT NULL,
  `Pro_Publisher_Account_2` varchar(255) DEFAULT NULL,
  `Pro_Publisher_Account_3` varchar(255) DEFAULT NULL,
  `Pro_Producer_Account_1` varchar(255) DEFAULT NULL,
  `Pro_Producer_Account_2` varchar(255) DEFAULT NULL,
  `Pro_Producer_Account_3` varchar(255) DEFAULT NULL,
  `Pro_Addr_Country_Id` int(11) DEFAULT NULL,
  `Pro_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Addr_Id`),
  KEY `FK_wipo_producer_account_address_account_id` (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_account_address_country` (`Pro_Addr_Country_Id`),
  CONSTRAINT `FK_wipo_producer_account_address_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_address_country` FOREIGN KEY (`Pro_Addr_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account_address` */

insert  into `wipo_producer_account_address`(`Pro_Addr_Id`,`Pro_Acc_Id`,`Pro_Head_Address_1`,`Pro_Head_Address_2`,`Pro_Head_Address_3`,`Pro_Head_Fax`,`Pro_Head_Telephone`,`Pro_Head_Email`,`Pro_Head_Website`,`Pro_Mailing_Address_1`,`Pro_Mailing_Address_2`,`Pro_Mailing_Address_3`,`Pro_Mailing_Telephone`,`Pro_Mailing_Fax`,`Pro_Mailing_Email`,`Pro_Mailing_Website`,`Pro_Publisher_Account_1`,`Pro_Publisher_Account_2`,`Pro_Publisher_Account_3`,`Pro_Producer_Account_1`,`Pro_Producer_Account_2`,`Pro_Producer_Account_3`,`Pro_Addr_Country_Id`,`Pro_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,4,'Test','','','','23123','test@test.com','','test','','','12321213123','','test@test.com','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-05-05 18:26:59','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_biography` */

DROP TABLE IF EXISTS `wipo_producer_biography`;

CREATE TABLE `wipo_producer_biography` (
  `Pro_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Managers` varchar(500) DEFAULT NULL,
  `Pro_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Biogrph_Id`),
  KEY `FK_wipo_producer_biography_account_id` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_biography_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_biography` */

insert  into `wipo_producer_biography`(`Pro_Biogrph_Id`,`Pro_Acc_Id`,`Pro_Managers`,`Pro_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,4,'','Test','1','2015-05-05 18:06:35','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_label_owner` */

DROP TABLE IF EXISTS `wipo_producer_label_owner`;

CREATE TABLE `wipo_producer_label_owner` (
  `Label_Owner_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Label_Id` int(11) NOT NULL,
  `Label_Owner_From` date NOT NULL,
  `Label_Owner_To` date NOT NULL,
  `Label_Share` decimal(10,2) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Label_Owner_Id`),
  KEY `FK_wipo_producer_label_owner_label` (`Label_Id`),
  KEY `FK_wipo_producer_label_owner_producer` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_label_owner_label` FOREIGN KEY (`Label_Id`) REFERENCES `wipo_master_label` (`Master_Label_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_label_owner_producer` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_label_owner` */

insert  into `wipo_producer_label_owner`(`Label_Owner_Id`,`Pro_Acc_Id`,`Label_Id`,`Label_Owner_From`,`Label_Owner_To`,`Label_Share`,`Created_Date`,`Rowversion`) values (1,4,1,'2015-05-01','2015-05-31','21.00','2015-05-09 17:49:08','0000-00-00 00:00:00'),(2,5,2,'2015-05-01','2015-05-31','50.00','2015-05-09 17:49:09','0000-00-00 00:00:00'),(3,6,1,'2015-05-01','2015-05-30','29.00','2015-05-09 17:49:09','0000-00-00 00:00:00'),(4,4,1,'2015-05-01','2015-05-31','50.00','2015-05-09 18:52:54','0000-00-00 00:00:00'),(5,6,2,'2015-05-01','2015-05-27','50.00','2015-05-09 18:52:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_payment_method` */

DROP TABLE IF EXISTS `wipo_producer_payment_method`;

CREATE TABLE `wipo_producer_payment_method` (
  `Pro_Pay_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Pay_Method_id` int(11) NOT NULL,
  `Pro_Bank_Account` mediumint(9) NOT NULL,
  `Pro_Bank_Code` mediumint(9) DEFAULT NULL,
  `Pro_Bank_Branch` mediumint(9) DEFAULT NULL,
  `Pro_Pay_Address` varchar(255) DEFAULT NULL,
  `Pro_Pay_Iban` varchar(255) DEFAULT NULL,
  `Pro_Pay_Swift` varchar(255) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Pay_Id`),
  KEY `FK_wipo_producer_payment_method_account_id` (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_payment_method_payment_mode` (`Pro_Pay_Method_id`),
  CONSTRAINT `FK_wipo_producer_payment_method_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_payment_method_payment_mode` FOREIGN KEY (`Pro_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_payment_method` */

insert  into `wipo_producer_payment_method`(`Pro_Pay_Id`,`Pro_Acc_Id`,`Pro_Pay_Method_id`,`Pro_Bank_Account`,`Pro_Bank_Code`,`Pro_Bank_Branch`,`Pro_Pay_Address`,`Pro_Pay_Iban`,`Pro_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`) values (1,4,2,8388607,NULL,NULL,'123213','231','23213','1','2015-05-05 18:27:11','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_pseudonym` */

DROP TABLE IF EXISTS `wipo_producer_pseudonym`;

CREATE TABLE `wipo_producer_pseudonym` (
  `Pro_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Pseudo_Type_Id` int(11) NOT NULL,
  `Pro_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Pseudo_Id`),
  KEY `FK_wipo_producer_pseudonym_pseodo_type` (`Pro_Pseudo_Type_Id`),
  KEY `FK_wipo_producer_pseudonym_producer_account` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_pseudonym_producer_account` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_pseudonym_pseodo_type` FOREIGN KEY (`Pro_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_pseudonym` */

insert  into `wipo_producer_pseudonym`(`Pro_Pseudo_Id`,`Pro_Acc_Id`,`Pro_Pseudo_Type_Id`,`Pro_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,4,2,'PS','1','2015-05-05 18:27:25','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_related_rights` */

DROP TABLE IF EXISTS `wipo_producer_related_rights`;

CREATE TABLE `wipo_producer_related_rights` (
  `Pro_Rel_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Rel_Society_Id` int(11) NOT NULL,
  `Pro_Rel_Entry_Date` date NOT NULL,
  `Pro_Rel_Exit_Date` date DEFAULT NULL,
  `Pro_Rel_Internal_Position_Id` int(11) NOT NULL,
  `Pro_Rel_Entry_Date_2` date NOT NULL,
  `Pro_Rel_Exit_Date_2` date DEFAULT NULL,
  `Pro_Rel_Region_Id` int(11) DEFAULT NULL,
  `Pro_Rel_Profession_Id` int(11) DEFAULT NULL,
  `Pro_Rel_File` varchar(255) DEFAULT NULL,
  `Pro_Rel_Duration` varchar(100) DEFAULT NULL,
  `Pro_Rel_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Pro_Rel_Type_Rght_Id` int(11) DEFAULT NULL,
  `Pro_Rel_Managed_Rights_Id` int(11) NOT NULL,
  `Pro_Rel_Territories_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Rel_Rgt_Id`),
  KEY `FK_wipo_producer_related_rights_account_id` (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_related_rights_internal_position` (`Pro_Rel_Internal_Position_Id`),
  KEY `FK_wipo_producer_related_rights_region` (`Pro_Rel_Region_Id`),
  KEY `FK_wipo_producer_related_rights_profession` (`Pro_Rel_Profession_Id`),
  KEY `FK_wipo_producer_related_rights_work_category` (`Pro_Rel_Avl_Work_Cat_Id`),
  KEY `FK_wipo_producer_related_rights_type_of_rights` (`Pro_Rel_Type_Rght_Id`),
  KEY `FK_wipo_producer_related_rights_managerd_rights` (`Pro_Rel_Managed_Rights_Id`),
  KEY `FK_wipo_producer_related_rights_territories` (`Pro_Rel_Territories_Id`),
  CONSTRAINT `FK_wipo_producer_related_rights_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_internal_position` FOREIGN KEY (`Pro_Rel_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_managerd_rights` FOREIGN KEY (`Pro_Rel_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_profession` FOREIGN KEY (`Pro_Rel_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_region` FOREIGN KEY (`Pro_Rel_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_territories` FOREIGN KEY (`Pro_Rel_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_type_of_rights` FOREIGN KEY (`Pro_Rel_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_related_rights_work_category` FOREIGN KEY (`Pro_Rel_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_related_rights` */

insert  into `wipo_producer_related_rights`(`Pro_Rel_Rgt_Id`,`Pro_Acc_Id`,`Pro_Rel_Society_Id`,`Pro_Rel_Entry_Date`,`Pro_Rel_Exit_Date`,`Pro_Rel_Internal_Position_Id`,`Pro_Rel_Entry_Date_2`,`Pro_Rel_Exit_Date_2`,`Pro_Rel_Region_Id`,`Pro_Rel_Profession_Id`,`Pro_Rel_File`,`Pro_Rel_Duration`,`Pro_Rel_Avl_Work_Cat_Id`,`Pro_Rel_Type_Rght_Id`,`Pro_Rel_Managed_Rights_Id`,`Pro_Rel_Territories_Id`,`Created_Date`,`Rowversion`) values (2,4,10,'2015-04-01','0000-00-00',1,'2015-04-01','0000-00-00',1,1,'',NULL,1,1,1,6,'2015-04-27 19:04:45','0000-00-00 00:00:00'),(3,5,10,'2015-04-29','2015-04-30',1,'2015-04-28','2015-04-30',1,1,'',NULL,1,1,1,6,'2015-04-28 19:52:00','0000-00-00 00:00:00'),(4,6,10,'2015-05-07','0000-00-00',1,'2015-05-07','0000-00-00',1,NULL,'',NULL,1,3,1,6,'2015-05-07 15:25:59','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_succession` */

DROP TABLE IF EXISTS `wipo_producer_succession`;

CREATE TABLE `wipo_producer_succession` (
  `Pro_Suc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Suc_Date_Transfer` date DEFAULT NULL,
  `Pro_Suc_Name` varchar(255) NOT NULL,
  `Pro_Suc_Address_1` varchar(500) NOT NULL,
  `Pro_Suc_Address_2` varchar(500) DEFAULT NULL,
  `Pro_Suc_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Suc_Id`),
  KEY `FK_wipo_producer_succession_acount` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_succession_acount` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_succession` */

insert  into `wipo_producer_succession`(`Pro_Suc_Id`,`Pro_Acc_Id`,`Pro_Suc_Date_Transfer`,`Pro_Suc_Name`,`Pro_Suc_Address_1`,`Pro_Suc_Address_2`,`Pro_Suc_Annotation`,`Created_Date`,`Rowversion`) values (1,4,NULL,'Test','test','etst','etst','2015-05-05 17:57:58','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_account` */

DROP TABLE IF EXISTS `wipo_publisher_account`;

CREATE TABLE `wipo_publisher_account` (
  `Pub_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Corporate_Name` varchar(255) NOT NULL,
  `Pub_Internal_Code` varchar(255) NOT NULL,
  `Pub_Ipi` mediumint(9) DEFAULT NULL,
  `Pub_Ipi_Base_Number` mediumint(9) DEFAULT NULL,
  `Pub_Date` date NOT NULL,
  `Pub_Place` varchar(255) DEFAULT NULL,
  `Pub_Country_Id` int(11) DEFAULT NULL,
  `Pub_Legal_Form_id` int(11) DEFAULT NULL,
  `Pub_Reg_Date` date DEFAULT NULL,
  `Pub_Reg_Number` varchar(255) DEFAULT NULL,
  `Pub_Excerpt_Date` date DEFAULT NULL,
  `Pub_Language_Id` int(11) DEFAULT NULL,
  `Pub_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_account_country` (`Pub_Country_Id`),
  KEY `FK_wipo_publisher_account_legal_form` (`Pub_Legal_Form_id`),
  KEY `FK_wipo_publisher_account_language` (`Pub_Language_Id`),
  CONSTRAINT `FK_wipo_publisher_account_country` FOREIGN KEY (`Pub_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_language` FOREIGN KEY (`Pub_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_legal_form` FOREIGN KEY (`Pub_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account` */

insert  into `wipo_publisher_account`(`Pub_Acc_Id`,`Pub_Corporate_Name`,`Pub_Internal_Code`,`Pub_Ipi`,`Pub_Ipi_Base_Number`,`Pub_Date`,`Pub_Place`,`Pub_Country_Id`,`Pub_Legal_Form_id`,`Pub_Reg_Date`,`Pub_Reg_Number`,`Pub_Excerpt_Date`,`Pub_Language_Id`,`Pub_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (1,'ACOL Limited','E101',12321,3212323,'1989-02-02','',2,1,'2015-04-30','','0000-00-00',2,'Y','1','2015-04-16 15:40:55','0000-00-00 00:00:00'),(2,'BGM Limited','E102',8388607,8388607,'1991-02-26','Nepal',2,1,'2015-06-17','A8985-45794-T78','2015-04-16',1,'N','1','2015-04-16 18:40:56','0000-00-00 00:00:00'),(3,'CAG Limited','E103',NULL,NULL,'1999-02-01','',2,NULL,'0000-00-00','','2012-02-08',1,'N','1','2015-04-16 18:43:15','0000-00-00 00:00:00'),(4,'VEGA Limited','E104',NULL,NULL,'2015-04-01','',2,NULL,'0000-00-00','','0000-00-00',1,'Y','1','2015-04-27 18:51:02','0000-00-00 00:00:00'),(5,'ILOL Limited','E105',NULL,NULL,'2015-05-13','',3,NULL,'0000-00-00','','0000-00-00',1,'N','1','2015-05-06 16:35:51','0000-00-00 00:00:00'),(6,'MTM Limited','E106',NULL,NULL,'2015-04-27',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N','1','2015-05-07 13:23:00','0000-00-00 00:00:00'),(7,'KOL Limited','E107',8388607,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N','1','2015-05-07 13:38:35','0000-00-00 00:00:00'),(8,'RTL Limited','E108',NULL,NULL,'2015-05-31',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'Y','1','2015-05-08 18:18:44','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_account_address` */

DROP TABLE IF EXISTS `wipo_publisher_account_address`;

CREATE TABLE `wipo_publisher_account_address` (
  `Pub_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Head_Address_1` varchar(255) NOT NULL,
  `Pub_Head_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Head_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Head_Fax` varchar(25) DEFAULT NULL,
  `Pub_Head_Telephone` varchar(25) NOT NULL,
  `Pub_Head_Email` varchar(50) NOT NULL,
  `Pub_Head_Website` varchar(100) DEFAULT NULL,
  `Pub_Mailing_Address_1` varchar(255) NOT NULL,
  `Pub_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Mailing_Telephone` varchar(25) NOT NULL,
  `Pub_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Pub_Mailing_Email` varchar(50) NOT NULL,
  `Pub_Mailing_Website` varchar(100) DEFAULT NULL,
  `Pub_Publisher_Account_1` varchar(255) DEFAULT NULL,
  `Pub_Publisher_Account_2` varchar(255) DEFAULT NULL,
  `Pub_Publisher_Account_3` varchar(255) DEFAULT NULL,
  `Pub_Producer_Account_1` varchar(255) DEFAULT NULL,
  `Pub_Producer_Account_2` varchar(255) DEFAULT NULL,
  `Pub_Producer_Account_3` varchar(255) DEFAULT NULL,
  `Pub_Addr_Country_Id` int(11) DEFAULT NULL,
  `Pub_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Addr_Id`),
  KEY `FK_wipo_publisher_account_address_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_account_address_country` (`Pub_Addr_Country_Id`),
  CONSTRAINT `FK_wipo_publisher_account_address_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_address_country` FOREIGN KEY (`Pub_Addr_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account_address` */

insert  into `wipo_publisher_account_address`(`Pub_Addr_Id`,`Pub_Acc_Id`,`Pub_Head_Address_1`,`Pub_Head_Address_2`,`Pub_Head_Address_3`,`Pub_Head_Fax`,`Pub_Head_Telephone`,`Pub_Head_Email`,`Pub_Head_Website`,`Pub_Mailing_Address_1`,`Pub_Mailing_Address_2`,`Pub_Mailing_Address_3`,`Pub_Mailing_Telephone`,`Pub_Mailing_Fax`,`Pub_Mailing_Email`,`Pub_Mailing_Website`,`Pub_Publisher_Account_1`,`Pub_Publisher_Account_2`,`Pub_Publisher_Account_3`,`Pub_Producer_Account_1`,`Pub_Producer_Account_2`,`Pub_Producer_Account_3`,`Pub_Addr_Country_Id`,`Pub_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-04-16 16:08:27','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_biography` */

DROP TABLE IF EXISTS `wipo_publisher_biography`;

CREATE TABLE `wipo_publisher_biography` (
  `Pub_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Managers` varchar(500) DEFAULT NULL,
  `Pub_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Biogrph_Id`),
  KEY `FK_wipo_publisher_biography_account_id` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_biography_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_biography` */

insert  into `wipo_publisher_biography`(`Pub_Biogrph_Id`,`Pub_Acc_Id`,`Pub_Managers`,`Pub_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'John','test','1','2015-04-16 17:41:20','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group` */

DROP TABLE IF EXISTS `wipo_publisher_group`;

CREATE TABLE `wipo_publisher_group` (
  `Pub_Group_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Name` varchar(100) NOT NULL,
  `Pub_Group_Is_Publisher` enum('0','1') DEFAULT '0',
  `Pub_Group_Is_Producer` enum('0','1') DEFAULT '0',
  `Pub_Group_Internal_Code` varchar(50) NOT NULL,
  `Pub_Group_IPI_Name_Number` int(11) DEFAULT NULL,
  `Pub_Group_IPN_Base_Number` int(11) DEFAULT NULL,
  `Pub_Group_IPD_Number` int(11) DEFAULT NULL,
  `Pub_Group_Date` date NOT NULL,
  `Pub_Group_Place` varchar(100) DEFAULT NULL,
  `Pub_Group_Country_Id` int(11) DEFAULT NULL,
  `Pub_Group_Legal_Form_Id` int(11) DEFAULT NULL,
  `Pub_Group_Language_Id` int(11) DEFAULT NULL,
  `Pub_Group_Non_Member` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_country` (`Pub_Group_Country_Id`),
  KEY `FK_wipo_publisher_group_language` (`Pub_Group_Language_Id`),
  KEY `FK_wipo_publisher_group_legal_form` (`Pub_Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_publisher_group_country` FOREIGN KEY (`Pub_Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_language` FOREIGN KEY (`Pub_Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_legal_form` FOREIGN KEY (`Pub_Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group` */

insert  into `wipo_publisher_group`(`Pub_Group_Id`,`Pub_Group_Name`,`Pub_Group_Is_Publisher`,`Pub_Group_Is_Producer`,`Pub_Group_Internal_Code`,`Pub_Group_IPI_Name_Number`,`Pub_Group_IPN_Base_Number`,`Pub_Group_IPD_Number`,`Pub_Group_Date`,`Pub_Group_Place`,`Pub_Group_Country_Id`,`Pub_Group_Legal_Form_Id`,`Pub_Group_Language_Id`,`Pub_Group_Non_Member`,`Active`,`Created_Date`,`Rowversion`) values (1,'Corporate name','1','0','EG100',1232123,232123,232123123,'2015-04-18','Nepal',2,1,1,'N','1','2015-04-23 11:45:46','0000-00-00 00:00:00'),(2,'Corporate name 2','1','0','EG101',NULL,NULL,232123123,'2015-04-30','',2,1,1,'N','1','2015-04-27 18:27:41','0000-00-00 00:00:00'),(3,'Corporate name 3','0','1','EG102',NULL,NULL,232123123,'2015-05-27','',2,NULL,1,'N','1','2015-04-28 15:11:29','0000-00-00 00:00:00'),(4,'Publisher group','1','0','EG103',NULL,NULL,232123123,'2015-05-31','',2,NULL,1,'N','1','2015-05-05 15:38:44','0000-00-00 00:00:00'),(5,'Producer Corporate name','0','1','EG104',NULL,NULL,232123123,'2015-05-29','',2,NULL,1,'N','1','2015-05-05 17:12:32','0000-00-00 00:00:00'),(6,'SONY','1','0','EG105',NULL,NULL,NULL,'2015-05-01','',2,NULL,1,'Y','1','2015-05-07 13:47:56','0000-00-00 00:00:00'),(7,'BGM','0','1','EG106',NULL,NULL,NULL,'2015-05-30','',2,NULL,1,'N','1','2015-05-07 13:51:58','0000-00-00 00:00:00'),(8,'Samsung','1','0','EG107',NULL,NULL,NULL,'2015-05-31','',2,NULL,1,'N','1','2015-05-08 18:20:02','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_biography` */

DROP TABLE IF EXISTS `wipo_publisher_group_biography`;

CREATE TABLE `wipo_publisher_group_biography` (
  `Pub_Group_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Biogrph_Id`),
  KEY `FK_wipo_publisher_group_biography_account_id` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_biography_account_id` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_biography` */

insert  into `wipo_publisher_group_biography`(`Pub_Group_Biogrph_Id`,`Pub_Group_Id`,`Pub_Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Annotation\r\n','1','2015-04-23 12:52:21','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_catalogue` */

DROP TABLE IF EXISTS `wipo_publisher_group_catalogue`;

CREATE TABLE `wipo_publisher_group_catalogue` (
  `Pub_Group_Cat_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Cat_Number` varchar(100) NOT NULL,
  `Pub_Group_Cat_Start_Date` date NOT NULL,
  `Pub_Group_Cat_End_Date` date NOT NULL,
  `Pub_Group_Cat_Name` varchar(100) NOT NULL,
  `Pub_Group_Cat_Territory_Id` int(11) NOT NULL,
  `Pub_Group_Cat_Clasue` enum('M','S') NOT NULL DEFAULT 'M',
  `Pub_Group_Cat_Sign_Date` date NOT NULL,
  `Pub_Group_Cat_File` varchar(255) NOT NULL,
  `Pub_Group_Cat_Reference` smallint(6) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Cat_Id`),
  KEY `FK_wipo_publisher_group_catalogue_group` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_catalogue_territory` (`Pub_Group_Cat_Territory_Id`),
  CONSTRAINT `FK_wipo_publisher_group_catalogue_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_catalogue_territory` FOREIGN KEY (`Pub_Group_Cat_Territory_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_catalogue` */

insert  into `wipo_publisher_group_catalogue`(`Pub_Group_Cat_Id`,`Pub_Group_Id`,`Pub_Group_Cat_Number`,`Pub_Group_Cat_Start_Date`,`Pub_Group_Cat_End_Date`,`Pub_Group_Cat_Name`,`Pub_Group_Cat_Territory_Id`,`Pub_Group_Cat_Clasue`,`Pub_Group_Cat_Sign_Date`,`Pub_Group_Cat_File`,`Pub_Group_Cat_Reference`,`Created_Date`,`Rowversion`) values (1,1,'TYHDYHH','2015-04-01','2015-04-30','test',6,'S','2015-04-04','\\publishergroupcatalogue\\396f1310b5e20520f2490e477c2441ed.xml',50,'2015-04-24 11:24:39','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_copyright_payment` */

DROP TABLE IF EXISTS `wipo_publisher_group_copyright_payment`;

CREATE TABLE `wipo_publisher_group_copyright_payment` (
  `Pub_Group_Pay_Copy_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Pay_Copy_Payee` varchar(100) NOT NULL,
  `Pub_Group_Pay_Copy_Rate` decimal(10,2) NOT NULL,
  `Pub_Group_Pay_Copy_Pay_Method` int(11) NOT NULL,
  `Pub_Group_Pay_Copy_Bank_Account` mediumint(9) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Pay_Copy_Id`),
  KEY `FK_wipo_publisher_group_copyright_payment_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_copyright_payment_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_copyright_payment` */

insert  into `wipo_publisher_group_copyright_payment`(`Pub_Group_Pay_Copy_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Copy_Payee`,`Pub_Group_Pay_Copy_Rate`,`Pub_Group_Pay_Copy_Pay_Method`,`Pub_Group_Pay_Copy_Bank_Account`,`Created_Date`,`Rowversion`) values (1,1,'John mc','50.00',1,8388607,'2015-04-23 12:44:01','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_manage_rights` */

DROP TABLE IF EXISTS `wipo_publisher_group_manage_rights`;

CREATE TABLE `wipo_publisher_group_manage_rights` (
  `Pub_Group_Mnge_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Society_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Entry_Date` date NOT NULL,
  `Pub_Group_Mnge_Exit_Date` date DEFAULT NULL,
  `Pub_Group_Mnge_Internal_Position_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Entry_Date_2` date NOT NULL,
  `Pub_Group_Mnge_Exit_Date_2` date DEFAULT NULL,
  `Pub_Group_Mnge_Region_Id` int(11) DEFAULT NULL,
  `Pub_Group_Mnge_Profession_Id` int(11) DEFAULT NULL,
  `Pub_Group_Mnge_File` varchar(255) DEFAULT NULL,
  `Pub_Group_Mnge_Duration` varchar(100) DEFAULT NULL,
  `Pub_Group_Mnge_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Type_Rght_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Managed_Rights_Id` int(11) NOT NULL,
  `Pub_Group_Mnge_Territories_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Mnge_Rgt_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_account_id` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_internal_position` (`Pub_Group_Mnge_Internal_Position_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_region` (`Pub_Group_Mnge_Region_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_profession` (`Pub_Group_Mnge_Profession_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_work_category` (`Pub_Group_Mnge_Avl_Work_Cat_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_type_of_rights` (`Pub_Group_Mnge_Type_Rght_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_managerd_rights` (`Pub_Group_Mnge_Managed_Rights_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_territories` (`Pub_Group_Mnge_Territories_Id`),
  KEY `FK_wipo_publisher_group_manage_rights_society` (`Pub_Group_Mnge_Society_Id`),
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_account_id` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_internal_position` FOREIGN KEY (`Pub_Group_Mnge_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_managerd_rights` FOREIGN KEY (`Pub_Group_Mnge_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_profession` FOREIGN KEY (`Pub_Group_Mnge_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_region` FOREIGN KEY (`Pub_Group_Mnge_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_society` FOREIGN KEY (`Pub_Group_Mnge_Society_Id`) REFERENCES `wipo_society` (`Society_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_territories` FOREIGN KEY (`Pub_Group_Mnge_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_type_of_rights` FOREIGN KEY (`Pub_Group_Mnge_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_manage_rights_work_category` FOREIGN KEY (`Pub_Group_Mnge_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_manage_rights` */

insert  into `wipo_publisher_group_manage_rights`(`Pub_Group_Mnge_Rgt_Id`,`Pub_Group_Id`,`Pub_Group_Mnge_Society_Id`,`Pub_Group_Mnge_Entry_Date`,`Pub_Group_Mnge_Exit_Date`,`Pub_Group_Mnge_Internal_Position_Id`,`Pub_Group_Mnge_Entry_Date_2`,`Pub_Group_Mnge_Exit_Date_2`,`Pub_Group_Mnge_Region_Id`,`Pub_Group_Mnge_Profession_Id`,`Pub_Group_Mnge_File`,`Pub_Group_Mnge_Duration`,`Pub_Group_Mnge_Avl_Work_Cat_Id`,`Pub_Group_Mnge_Type_Rght_Id`,`Pub_Group_Mnge_Managed_Rights_Id`,`Pub_Group_Mnge_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-23','2015-04-30',1,'2015-04-23','2015-04-23',1,1,'Test',NULL,1,1,1,6,'2015-04-23 12:04:17','0000-00-00 00:00:00'),(2,3,10,'2015-04-30','2015-04-30',1,'2015-04-30','2015-04-30',1,1,'',NULL,1,1,1,6,'2015-04-30 12:05:03','0000-00-00 00:00:00'),(3,2,10,'2015-05-05','0000-00-00',1,'2015-05-05','0000-00-00',1,1,'',NULL,1,1,1,6,'2015-05-05 15:22:37','0000-00-00 00:00:00'),(4,4,10,'2015-05-05','0000-00-00',1,'2015-05-05','0000-00-00',1,1,'',NULL,1,1,1,6,'2015-05-05 15:38:55','0000-00-00 00:00:00'),(5,5,10,'2015-05-07','0000-00-00',1,'2015-05-07','0000-00-00',1,NULL,'',NULL,1,3,1,6,'2015-05-07 15:26:42','0000-00-00 00:00:00'),(6,7,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,3,1,6,'2015-05-08 17:36:04','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_members` */

DROP TABLE IF EXISTS `wipo_publisher_group_members`;

CREATE TABLE `wipo_publisher_group_members` (
  `Pub_Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Member_Internal_Code` varchar(255) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Member_Id`),
  KEY `FK_wipo_publisher_group_biography_account_id` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_members_Internal_Code` (`Pub_Group_Member_Internal_Code`),
  CONSTRAINT `FK_wipo_publisher_group_members_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_members` */

insert  into `wipo_publisher_group_members`(`Pub_Group_Member_Id`,`Pub_Group_Id`,`Pub_Group_Member_Internal_Code`,`Created_Date`,`Rowversion`) values (15,4,'E101','2015-05-06 16:53:28','0000-00-00 00:00:00'),(16,2,'E102','2015-05-06 17:00:43','0000-00-00 00:00:00'),(17,2,'E104','2015-05-06 17:00:43','0000-00-00 00:00:00'),(19,5,'R103','2015-05-07 15:26:52','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_original_publisher` */

DROP TABLE IF EXISTS `wipo_publisher_group_original_publisher`;

CREATE TABLE `wipo_publisher_group_original_publisher` (
  `Pub_Group_Org_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Org_IPI_Name_Number` varchar(100) NOT NULL,
  `Pub_Group_Org_IPI_Base_Number` varchar(100) NOT NULL,
  `Pub_Group_Org_Internal_Code` varchar(100) NOT NULL,
  `Pub_Group_Org_Name` varchar(100) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Org_Id`),
  KEY `FK_wipo_publisher_group_original_publisher_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_original_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_original_publisher` */

insert  into `wipo_publisher_group_original_publisher`(`Pub_Group_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_IPI_Name_Number`,`Pub_Group_Org_IPI_Base_Number`,`Pub_Group_Org_Internal_Code`,`Pub_Group_Org_Name`,`Created_Date`,`Rowversion`) values (1,1,'AREYYE','51545111','A1001','Vira','2015-04-23 17:56:46','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_original_share` */

DROP TABLE IF EXISTS `wipo_publisher_group_original_share`;

CREATE TABLE `wipo_publisher_group_original_share` (
  `Pub_Group_Share_Org_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Org_Share_Broadcast` decimal(10,2) NOT NULL,
  `Pub_Group_Org_Share_Mechanical` decimal(10,2) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Share_Org_Id`),
  KEY `FK_wipo_publisher_group_original_share_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_original_share_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_original_share` */

insert  into `wipo_publisher_group_original_share`(`Pub_Group_Share_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_Share_Broadcast`,`Pub_Group_Org_Share_Mechanical`,`Created_Date`,`Rowversion`) values (1,1,'50.00','60.00','2015-04-23 18:32:12','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_pseudonym` */

DROP TABLE IF EXISTS `wipo_publisher_group_pseudonym`;

CREATE TABLE `wipo_publisher_group_pseudonym` (
  `Pub_Group_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Pseudo_Type_Id` int(11) NOT NULL,
  `Pub_Group_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Pseudo_Id`),
  KEY `FK_wipo_publisher_group_pseudonym_group` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_pseudonym` (`Pub_Group_Pseudo_Type_Id`),
  CONSTRAINT `FK_wipo_publisher_group_pseudonym` FOREIGN KEY (`Pub_Group_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_pseudonym_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_pseudonym` */

insert  into `wipo_publisher_group_pseudonym`(`Pub_Group_Pseudo_Id`,`Pub_Group_Id`,`Pub_Group_Pseudo_Type_Id`,`Pub_Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'XALLY','1','2015-04-23 12:55:42','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_related_payment` */

DROP TABLE IF EXISTS `wipo_publisher_group_related_payment`;

CREATE TABLE `wipo_publisher_group_related_payment` (
  `Pub_Group_Pay_Rel_Id` int(10) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Pay_Rel_Payee` varchar(100) NOT NULL,
  `Pub_Group_Pay_Rel_Rate` decimal(10,2) NOT NULL,
  `Pub_Group_Pay_Rel_Pay_Method` int(11) NOT NULL,
  `Pub_Group_Pay_Rel_Bank_Account` mediumint(9) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Pay_Rel_Id`),
  KEY `FK_wipo_publisher_group_related_payment_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_related_payment_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_related_payment` */

insert  into `wipo_publisher_group_related_payment`(`Pub_Group_Pay_Rel_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Rel_Payee`,`Pub_Group_Pay_Rel_Rate`,`Pub_Group_Pay_Rel_Pay_Method`,`Pub_Group_Pay_Rel_Bank_Account`,`Created_Date`,`Rowversion`) values (1,1,'Rutherfold','60.00',3,8388607,'2015-04-23 12:49:04','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_representative` */

DROP TABLE IF EXISTS `wipo_publisher_group_representative`;

CREATE TABLE `wipo_publisher_group_representative` (
  `Pub_Group_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Rep_Name` varchar(100) NOT NULL,
  `Pub_Group_Rep_Address_1` varchar(255) DEFAULT NULL,
  `Pub_Group_Rep_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Group_Rep_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Group_Rep_Address_4` varchar(255) DEFAULT NULL,
  `Pub_Group_Home_Address_1` varchar(255) NOT NULL,
  `Pub_Group_Home_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Group_Home_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Group_Home_Address_4` varchar(255) DEFAULT NULL,
  `Pub_Group_Home_Fax` varchar(25) DEFAULT NULL,
  `Pub_Group_Home_Telephone` varchar(25) NOT NULL,
  `Pub_Group_Home_Email` varchar(50) NOT NULL,
  `Pub_Group_Home_Website` varchar(100) DEFAULT NULL,
  `Pub_Group_Mailing_Address_1` varchar(255) NOT NULL,
  `Pub_Group_Mailing_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Group_Mailing_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Group_Mailing_Address_4` varchar(255) DEFAULT NULL,
  `Pub_Group_Mailing_Telephone` varchar(25) NOT NULL,
  `Pub_Group_Mailing_Fax` varchar(25) DEFAULT NULL,
  `Pub_Group_Mailing_Email` varchar(50) NOT NULL,
  `Pub_Group_Mailing_Website` varchar(100) DEFAULT NULL,
  `Pub_Group_Unknown_Address` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Addr_Id`),
  KEY `Pub_Group_id` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_representative_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_representative` */

insert  into `wipo_publisher_group_representative`(`Pub_Group_Addr_Id`,`Pub_Group_Id`,`Pub_Group_Rep_Name`,`Pub_Group_Rep_Address_1`,`Pub_Group_Rep_Address_2`,`Pub_Group_Rep_Address_3`,`Pub_Group_Rep_Address_4`,`Pub_Group_Home_Address_1`,`Pub_Group_Home_Address_2`,`Pub_Group_Home_Address_3`,`Pub_Group_Home_Address_4`,`Pub_Group_Home_Fax`,`Pub_Group_Home_Telephone`,`Pub_Group_Home_Email`,`Pub_Group_Home_Website`,`Pub_Group_Mailing_Address_1`,`Pub_Group_Mailing_Address_2`,`Pub_Group_Mailing_Address_3`,`Pub_Group_Mailing_Address_4`,`Pub_Group_Mailing_Telephone`,`Pub_Group_Mailing_Fax`,`Pub_Group_Mailing_Email`,`Pub_Group_Mailing_Website`,`Pub_Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Rep','','','','','1, Thomos street','','','','','959562','aaa@gmail.com','','10, J street','','','','232123123','','test@gmail.com','','Y','1','2015-04-23 13:02:41','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_sub_publisher` */

DROP TABLE IF EXISTS `wipo_publisher_group_sub_publisher`;

CREATE TABLE `wipo_publisher_group_sub_publisher` (
  `Pub_Group_Sub_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Sub_IPI_Name_Number` varchar(100) NOT NULL,
  `Pub_Group_Sub_IPI_Base_Number` varchar(100) NOT NULL,
  `Pub_Group_Sub_Internal_Code` varchar(100) NOT NULL,
  `Pub_Group_Sub_Name` varchar(100) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Sub_Id`),
  KEY `FK_wipo_publisher_group_sub_publisher_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_sub_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_sub_publisher` */

insert  into `wipo_publisher_group_sub_publisher`(`Pub_Group_Sub_Id`,`Pub_Group_Id`,`Pub_Group_Sub_IPI_Name_Number`,`Pub_Group_Sub_IPI_Base_Number`,`Pub_Group_Sub_Internal_Code`,`Pub_Group_Sub_Name`,`Created_Date`,`Rowversion`) values (1,1,'AREYYE','891545515151','1548515','Ron','2015-04-30 17:39:30','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_sub_share` */

DROP TABLE IF EXISTS `wipo_publisher_group_sub_share`;

CREATE TABLE `wipo_publisher_group_sub_share` (
  `Pub_Group_Sub_Share_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Sub_Share_Broadcast` decimal(10,2) NOT NULL,
  `Pub_Group_Sub_Share_Mechanical` decimal(10,2) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Sub_Share_Id`),
  KEY `FK_wipo_publisher_group_sub_share_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_sub_share_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_sub_share` */

insert  into `wipo_publisher_group_sub_share`(`Pub_Group_Sub_Share_Id`,`Pub_Group_Id`,`Pub_Group_Sub_Share_Broadcast`,`Pub_Group_Sub_Share_Mechanical`,`Created_Date`,`Rowversion`) values (1,1,'90.00','100.00','2015-04-23 18:51:40','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_manage_rights` */

DROP TABLE IF EXISTS `wipo_publisher_manage_rights`;

CREATE TABLE `wipo_publisher_manage_rights` (
  `Pub_Mnge_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Mnge_Society_Id` int(11) NOT NULL,
  `Pub_Mnge_Entry_Date` date NOT NULL,
  `Pub_Mnge_Exit_Date` date DEFAULT NULL,
  `Pub_Mnge_Internal_Position_Id` int(11) NOT NULL,
  `Pub_Mnge_Entry_Date_2` date NOT NULL,
  `Pub_Mnge_Exit_Date_2` date DEFAULT NULL,
  `Pub_Mnge_Region_Id` int(11) DEFAULT NULL,
  `Pub_Mnge_Profession_Id` int(11) DEFAULT NULL,
  `Pub_Mnge_File` varchar(255) DEFAULT NULL,
  `Pub_Mnge_Duration` varchar(100) DEFAULT NULL,
  `Pub_Mnge_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Pub_Mnge_Type_Rght_Id` int(11) NOT NULL,
  `Pub_Mnge_Managed_Rights_Id` int(11) NOT NULL,
  `Pub_Mnge_Territories_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Mnge_Rgt_Id`),
  KEY `FK_wipo_publisher_manage_rights_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_manage_rights_internal_position` (`Pub_Mnge_Internal_Position_Id`),
  KEY `FK_wipo_publisher_manage_rights_region` (`Pub_Mnge_Region_Id`),
  KEY `FK_wipo_publisher_manage_rights_profession` (`Pub_Mnge_Profession_Id`),
  KEY `FK_wipo_publisher_manage_rights_work_category` (`Pub_Mnge_Avl_Work_Cat_Id`),
  KEY `FK_wipo_publisher_manage_rights_type_of_rights` (`Pub_Mnge_Type_Rght_Id`),
  KEY `FK_wipo_publisher_manage_rights_managerd_rights` (`Pub_Mnge_Managed_Rights_Id`),
  KEY `FK_wipo_publisher_manage_rights_territories` (`Pub_Mnge_Territories_Id`),
  KEY `FK_wipo_publisher_manage_rights_society` (`Pub_Mnge_Society_Id`),
  CONSTRAINT `FK_wipo_publisher_manage_rights_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_internal_position` FOREIGN KEY (`Pub_Mnge_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_managerd_rights` FOREIGN KEY (`Pub_Mnge_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_profession` FOREIGN KEY (`Pub_Mnge_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_region` FOREIGN KEY (`Pub_Mnge_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_society` FOREIGN KEY (`Pub_Mnge_Society_Id`) REFERENCES `wipo_society` (`Society_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_territories` FOREIGN KEY (`Pub_Mnge_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_type_of_rights` FOREIGN KEY (`Pub_Mnge_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_manage_rights_work_category` FOREIGN KEY (`Pub_Mnge_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_manage_rights` */

insert  into `wipo_publisher_manage_rights`(`Pub_Mnge_Rgt_Id`,`Pub_Acc_Id`,`Pub_Mnge_Society_Id`,`Pub_Mnge_Entry_Date`,`Pub_Mnge_Exit_Date`,`Pub_Mnge_Internal_Position_Id`,`Pub_Mnge_Entry_Date_2`,`Pub_Mnge_Exit_Date_2`,`Pub_Mnge_Region_Id`,`Pub_Mnge_Profession_Id`,`Pub_Mnge_File`,`Pub_Mnge_Duration`,`Pub_Mnge_Avl_Work_Cat_Id`,`Pub_Mnge_Type_Rght_Id`,`Pub_Mnge_Managed_Rights_Id`,`Pub_Mnge_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-17','2015-04-25',1,'2015-04-17','0000-00-00',1,1,'',NULL,1,1,2,6,NULL,'0000-00-00 00:00:00'),(2,3,10,'2015-04-01','2015-04-30',1,'2015-04-01','2015-04-30',1,1,'',NULL,1,1,1,6,NULL,'0000-00-00 00:00:00'),(3,4,10,'2015-04-27','0000-00-00',1,'2015-04-27','0000-00-00',1,1,'',NULL,1,1,1,6,'2015-04-27 18:53:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_payment_method` */

DROP TABLE IF EXISTS `wipo_publisher_payment_method`;

CREATE TABLE `wipo_publisher_payment_method` (
  `Pub_Pay_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Pay_Method_id` int(11) NOT NULL,
  `Pub_Bank_Account` mediumint(9) NOT NULL,
  `Pub_Bank_Code` mediumint(9) DEFAULT NULL,
  `Pub_Bank_Branch` mediumint(9) DEFAULT NULL,
  `Pub_Pay_Address` varchar(255) DEFAULT NULL,
  `Pub_Pay_Iban` varchar(255) DEFAULT NULL,
  `Pub_Pay_Swift` varchar(255) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Pay_Id`),
  KEY `FK_wipo_publisher_payment_method_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_payment_method_payment_mode` (`Pub_Pay_Method_id`),
  CONSTRAINT `FK_wipo_publisher_payment_method_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_payment_method_payment_mode` FOREIGN KEY (`Pub_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_payment_method` */

insert  into `wipo_publisher_payment_method`(`Pub_Pay_Id`,`Pub_Acc_Id`,`Pub_Pay_Method_id`,`Pub_Bank_Account`,`Pub_Bank_Code`,`Pub_Bank_Branch`,`Pub_Pay_Address`,`Pub_Pay_Iban`,`Pub_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`) values (1,1,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-04-16 16:29:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_pseudonym` */

DROP TABLE IF EXISTS `wipo_publisher_pseudonym`;

CREATE TABLE `wipo_publisher_pseudonym` (
  `Pub_Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Pseudo_Type_Id` int(11) NOT NULL,
  `Pub_Pseudo_Name` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Pseudo_Id`),
  KEY `FK_wipo_publisher_pseudonym_pseodo_type` (`Pub_Pseudo_Type_Id`),
  KEY `FK_wipo_publisher_pseudonym_publisher_account` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_pseudonym_pseodo_type` FOREIGN KEY (`Pub_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_pseudonym_publisher_account` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_pseudonym` */

insert  into `wipo_publisher_pseudonym`(`Pub_Pseudo_Id`,`Pub_Acc_Id`,`Pub_Pseudo_Type_Id`,`Pub_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'Producer','1','2015-04-16 16:32:15','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_related_rights` */

DROP TABLE IF EXISTS `wipo_publisher_related_rights`;

CREATE TABLE `wipo_publisher_related_rights` (
  `Pub_Rel_Rgt_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Rel_Society_Id` int(11) NOT NULL,
  `Pub_Rel_Entry_Date` date NOT NULL,
  `Pub_Rel_Exit_Date` date DEFAULT NULL,
  `Pub_Rel_Internal_Position_Id` int(11) NOT NULL,
  `Pub_Rel_Entry_Date_2` date NOT NULL,
  `Pub_Rel_Exit_Date_2` date DEFAULT NULL,
  `Pub_Rel_Region_Id` int(11) DEFAULT NULL,
  `Pub_Rel_Profession_Id` int(11) DEFAULT NULL,
  `Pub_Rel_File` varchar(255) DEFAULT NULL,
  `Pub_Rel_Duration` varchar(100) DEFAULT NULL,
  `Pub_Rel_Avl_Work_Cat_Id` int(11) NOT NULL,
  `Pub_Rel_Type_Rght_Id` int(11) DEFAULT NULL,
  `Pub_Rel_Managed_Rights_Id` int(11) NOT NULL,
  `Pub_Rel_Territories_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Rel_Rgt_Id`),
  KEY `FK_wipo_publisher_related_rights_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_related_rights_internal_position` (`Pub_Rel_Internal_Position_Id`),
  KEY `FK_wipo_publisher_related_rights_region` (`Pub_Rel_Region_Id`),
  KEY `FK_wipo_publisher_related_rights_profession` (`Pub_Rel_Profession_Id`),
  KEY `FK_wipo_publisher_related_rights_work_category` (`Pub_Rel_Avl_Work_Cat_Id`),
  KEY `FK_wipo_publisher_related_rights_type_of_rights` (`Pub_Rel_Type_Rght_Id`),
  KEY `FK_wipo_publisher_related_rights_managerd_rights` (`Pub_Rel_Managed_Rights_Id`),
  KEY `FK_wipo_publisher_related_rights_territories` (`Pub_Rel_Territories_Id`),
  CONSTRAINT `FK_wipo_publisher_related_rights_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_internal_position` FOREIGN KEY (`Pub_Rel_Internal_Position_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_managerd_rights` FOREIGN KEY (`Pub_Rel_Managed_Rights_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_profession` FOREIGN KEY (`Pub_Rel_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_region` FOREIGN KEY (`Pub_Rel_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_territories` FOREIGN KEY (`Pub_Rel_Territories_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_type_of_rights` FOREIGN KEY (`Pub_Rel_Type_Rght_Id`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_related_rights_work_category` FOREIGN KEY (`Pub_Rel_Avl_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_related_rights` */

insert  into `wipo_publisher_related_rights`(`Pub_Rel_Rgt_Id`,`Pub_Acc_Id`,`Pub_Rel_Society_Id`,`Pub_Rel_Entry_Date`,`Pub_Rel_Exit_Date`,`Pub_Rel_Internal_Position_Id`,`Pub_Rel_Entry_Date_2`,`Pub_Rel_Exit_Date_2`,`Pub_Rel_Region_Id`,`Pub_Rel_Profession_Id`,`Pub_Rel_File`,`Pub_Rel_Duration`,`Pub_Rel_Avl_Work_Cat_Id`,`Pub_Rel_Type_Rght_Id`,`Pub_Rel_Managed_Rights_Id`,`Pub_Rel_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-16','2015-04-30',1,'2015-04-16','2015-04-30',1,1,'',NULL,1,1,1,6,NULL,'0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_succession` */

DROP TABLE IF EXISTS `wipo_publisher_succession`;

CREATE TABLE `wipo_publisher_succession` (
  `Pub_Suc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Suc_Date_Transfer` date DEFAULT NULL,
  `Pub_Suc_Name` varchar(255) NOT NULL,
  `Pub_Suc_Address_1` varchar(500) NOT NULL,
  `Pub_Suc_Address_2` varchar(500) DEFAULT NULL,
  `Pub_Suc_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Suc_Id`),
  KEY `FK_wipo_publisher_succession_acount` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_succession_acount` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_succession` */

insert  into `wipo_publisher_succession`(`Pub_Suc_Id`,`Pub_Acc_Id`,`Pub_Suc_Date_Transfer`,`Pub_Suc_Name`,`Pub_Suc_Address_1`,`Pub_Suc_Address_2`,`Pub_Suc_Annotation`,`Created_Date`,`Rowversion`) values (1,1,'2010-03-05','Sucessor','Address 1','Address 2','test',NULL,'0000-00-00 00:00:00'),(3,3,'2015-04-03','','','','',NULL,'0000-00-00 00:00:00');

/*Table structure for table `wipo_recording` */

DROP TABLE IF EXISTS `wipo_recording`;

CREATE TABLE `wipo_recording` (
  `Rcd_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Title` varchar(255) NOT NULL,
  `Rcd_Language_Id` int(11) DEFAULT NULL,
  `Rcd_Internal_Code` varchar(100) NOT NULL,
  `Rcd_Type_Id` int(11) NOT NULL,
  `Rcd_Date` date NOT NULL,
  `Rcd_Duration` time NOT NULL,
  `Rcd_Record_Country_id` int(11) NOT NULL,
  `Rcd_Product_Country_Id` int(11) NOT NULL,
  `Rcd_Doc_Status_Id` int(11) NOT NULL,
  `Rcd_Record_Type_Id` varchar(20) NOT NULL,
  `Rcd_Label_Id` varchar(20) NOT NULL,
  `Rcd_Reference` varchar(255) DEFAULT NULL,
  `Rcd_File` varchar(255) DEFAULT NULL,
  `Rcd_Isrc_Code` varchar(100) DEFAULT NULL,
  `Rcd_Iswc_Number` varchar(100) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Id`),
  UNIQUE KEY `NewIndex1` (`Rcd_Internal_Code`),
  KEY `FK_wipo_recording_language` (`Rcd_Language_Id`),
  KEY `FK_wipo_recording_type` (`Rcd_Type_Id`),
  KEY `FK_wipo_recording_record_country` (`Rcd_Record_Country_id`),
  KEY `FK_wipo_recording_production_country` (`Rcd_Product_Country_Id`),
  KEY `FK_wipo_recording_doc_status` (`Rcd_Doc_Status_Id`),
  CONSTRAINT `FK_wipo_recording_doc_status` FOREIGN KEY (`Rcd_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_language` FOREIGN KEY (`Rcd_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_production_country` FOREIGN KEY (`Rcd_Product_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_record_country` FOREIGN KEY (`Rcd_Record_Country_id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_type` FOREIGN KEY (`Rcd_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording` */

insert  into `wipo_recording`(`Rcd_Id`,`Rcd_Title`,`Rcd_Language_Id`,`Rcd_Internal_Code`,`Rcd_Type_Id`,`Rcd_Date`,`Rcd_Duration`,`Rcd_Record_Country_id`,`Rcd_Product_Country_Id`,`Rcd_Doc_Status_Id`,`Rcd_Record_Type_Id`,`Rcd_Label_Id`,`Rcd_Reference`,`Rcd_File`,`Rcd_Isrc_Code`,`Rcd_Iswc_Number`,`Created_Date`,`Rowversion`) values (2,'Org Title',5,'R100',4,'2015-05-01','05:59:00',2,2,2,'1','1','RT23123','File 2','123231','1232123','2015-05-28 16:14:25','0000-00-00 00:00:00');

/*Table structure for table `wipo_recording_link` */

DROP TABLE IF EXISTS `wipo_recording_link`;

CREATE TABLE `wipo_recording_link` (
  `Rcd_Link_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Link_Title` varchar(255) NOT NULL,
  `Rcd_Perf_Id` int(11) NOT NULL,
  `Rcd_Prod_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Link_Id`),
  KEY `FK_wipo_recording_link_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_link_performer` (`Rcd_Perf_Id`),
  KEY `FK_wipo_recording_link_producer` (`Rcd_Prod_Id`),
  CONSTRAINT `FK_wipo_recording_link_performer` FOREIGN KEY (`Rcd_Perf_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_link_producer` FOREIGN KEY (`Rcd_Prod_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_link_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_link` */

/*Table structure for table `wipo_recording_publication` */

DROP TABLE IF EXISTS `wipo_recording_publication`;

CREATE TABLE `wipo_recording_publication` (
  `Rcd_Publ_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Publ_Internal_Code` varchar(100) NOT NULL,
  `Rcd_Publ_Year` year(4) NOT NULL,
  `Rcd_Publ_Country_Id` int(11) DEFAULT NULL,
  `Rcd_Publ_Prod_Nation_Id` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Publ_Id`),
  UNIQUE KEY `NewIndex1` (`Rcd_Publ_Internal_Code`),
  KEY `FK_wipo_recording_publication_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_publication_country` (`Rcd_Publ_Country_Id`),
  KEY `FK_wipo_recording_publication_nationality` (`Rcd_Publ_Prod_Nation_Id`),
  CONSTRAINT `FK_wipo_recording_publication_country` FOREIGN KEY (`Rcd_Publ_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_publication_nationality` FOREIGN KEY (`Rcd_Publ_Prod_Nation_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_publication_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_publication` */

/*Table structure for table `wipo_recording_rightholder` */

DROP TABLE IF EXISTS `wipo_recording_rightholder`;

CREATE TABLE `wipo_recording_rightholder` (
  `Rcd_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Member_Internal_Code` varchar(100) NOT NULL,
  `Rcd_Right_Role` int(11) NOT NULL,
  `Rcd_Right_Equal_Share` decimal(10,2) NOT NULL,
  `Rcd_Right_Equal_Org_id` int(11) NOT NULL,
  `Rcd_Right_Blank_Share` decimal(10,2) NOT NULL,
  `Rcd_Right_Blank_Org_Id` int(11) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Right_Id`),
  KEY `FK_wipo_work_rightholder_work` (`Rcd_Id`),
  KEY `FK_wipo_work_rightholder_organization` (`Rcd_Right_Equal_Org_id`),
  KEY `FK_wipo_work_rightholder_organization_mechanical` (`Rcd_Right_Blank_Org_Id`),
  KEY `FK_wipo_work_rightholder_role` (`Rcd_Right_Role`),
  CONSTRAINT `FK_wipo_recording_rightholder_balnk_org` FOREIGN KEY (`Rcd_Right_Blank_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_equal_org` FOREIGN KEY (`Rcd_Right_Equal_Org_id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_type_right` FOREIGN KEY (`Rcd_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_rightholder` */

insert  into `wipo_recording_rightholder`(`Rcd_Right_Id`,`Rcd_Id`,`Rcd_Member_Internal_Code`,`Rcd_Right_Role`,`Rcd_Right_Equal_Share`,`Rcd_Right_Equal_Org_id`,`Rcd_Right_Blank_Share`,`Rcd_Right_Blank_Org_Id`,`Created_Date`,`Rowversion`) values (18,2,'P1002',1,'50.00',1,'50.00',1,'2015-05-28 16:37:36','0000-00-00 00:00:00'),(19,2,'R103',3,'25.00',1,'25.00',1,'2015-05-28 16:37:36','0000-00-00 00:00:00'),(20,2,'R105',3,'25.00',1,'25.00',1,'2015-05-28 16:37:36','0000-00-00 00:00:00');

/*Table structure for table `wipo_recording_subtitle` */

DROP TABLE IF EXISTS `wipo_recording_subtitle`;

CREATE TABLE `wipo_recording_subtitle` (
  `Rcd_Subtitle_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Subtitle_Name` varchar(255) NOT NULL,
  `Rcd_Subtitle_Type_Id` int(11) NOT NULL,
  `Rcd_Subtitle_Language_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Subtitle_Id`),
  KEY `FK_wipo_recording_subtitle_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_subtitle_type` (`Rcd_Subtitle_Type_Id`),
  KEY `FK_wipo_recording_subtitle_language` (`Rcd_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_recording_subtitle_language` FOREIGN KEY (`Rcd_Subtitle_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_subtitle_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_wipo_recording_subtitle_type` FOREIGN KEY (`Rcd_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_subtitle` */

/*Table structure for table `wipo_share_definition_per_role` */

DROP TABLE IF EXISTS `wipo_share_definition_per_role`;

CREATE TABLE `wipo_share_definition_per_role` (
  `Shr_Def_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Shr_Def_Role` int(11) NOT NULL,
  `Shr_Def_Equ_remn` mediumint(6) NOT NULL COMMENT 'Equitable remuneration',
  `Shr_Def_Blank_Tape_remn` mediumint(6) NOT NULL COMMENT 'Blank tape remuneration rights',
  `Shr_Def_Neigh_Rgts` mediumint(6) NOT NULL COMMENT 'Neighboring rights ',
  `Shr_Def_Excl_Rgts` mediumint(6) NOT NULL COMMENT 'Exclusive rights',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Shr_Def_Id`),
  KEY `FK_wipo_share_definition_per_role_role` (`Shr_Def_Role`),
  CONSTRAINT `FK_wipo_share_definition_per_role_role` FOREIGN KEY (`Shr_Def_Role`) REFERENCES `wipo_master_role` (`Master_Role_ID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_share_definition_per_role` */

/*Table structure for table `wipo_society` */

DROP TABLE IF EXISTS `wipo_society`;

CREATE TABLE `wipo_society` (
  `Society_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Society_Code` varchar(50) NOT NULL,
  `Society_Abbr_Id` int(11) NOT NULL,
  `Society_Logo_File` varchar(255) NOT NULL,
  `Society_Language_Id` int(11) NOT NULL,
  `Society_Mailing_Address` varchar(500) NOT NULL,
  `Society_Country_Id` int(11) DEFAULT NULL,
  `Society_Territory_Id` int(11) DEFAULT NULL,
  `Society_Region_Id` int(11) DEFAULT NULL,
  `Society_Profession_Id` int(11) DEFAULT NULL,
  `Society_Role_Id` int(11) DEFAULT NULL,
  `Society_Hirearchy_Id` int(11) DEFAULT NULL,
  `Society_Payment_Id` int(11) DEFAULT NULL,
  `Society_Type_Id` int(11) DEFAULT NULL,
  `Society_Factor` decimal(10,2) DEFAULT NULL,
  `Society_Doc_Type_Id` int(11) DEFAULT NULL,
  `Society_Doc_Id` int(11) DEFAULT NULL,
  `Society_Duration` smallint(6) DEFAULT NULL,
  `Society_CopyRight` mediumint(9) DEFAULT NULL,
  `Society_RelatedRights` mediumint(9) DEFAULT NULL,
  `Society_Currency_Id` int(11) DEFAULT NULL,
  `Society_Rate` decimal(10,2) DEFAULT NULL,
  `Society_Main_Performer_Id` varchar(100) DEFAULT NULL,
  `Society_Producer_Id` varchar(100) DEFAULT NULL,
  `Society_Subscription` varchar(100) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Society_Id`),
  KEY `FK_wipo_organization_country` (`Society_Country_Id`),
  KEY `FK_wipo_organization_document` (`Society_Doc_Id`),
  KEY `FK_wipo_organization_doc_type` (`Society_Doc_Type_Id`),
  KEY `FK_wipo_organization_payment` (`Society_Payment_Id`),
  KEY `FK_wipo_organization_profession` (`Society_Profession_Id`),
  KEY `FK_wipo_organization_region` (`Society_Region_Id`),
  KEY `FK_wipo_organization_role` (`Society_Role_Id`),
  KEY `FK_wipo_organization_territory` (`Society_Territory_Id`),
  KEY `Abbrevation` (`Society_Abbr_Id`),
  KEY `Hierarchy` (`Society_Hirearchy_Id`),
  KEY `FK_wipo_society_type` (`Society_Type_Id`),
  KEY `FK_wipo_society_language` (`Society_Language_Id`),
  KEY `FK_wipo_society_mailing_address` (`Society_Mailing_Address`),
  KEY `FK_wipo_society_currency` (`Society_Currency_Id`),
  CONSTRAINT `FK_wipo_organization_country` FOREIGN KEY (`Society_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_document` FOREIGN KEY (`Society_Doc_Id`) REFERENCES `wipo_master_document` (`Master_Doc_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_doc_type` FOREIGN KEY (`Society_Doc_Type_Id`) REFERENCES `wipo_master_document_type` (`Master_Doc_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_payment` FOREIGN KEY (`Society_Payment_Id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_profession` FOREIGN KEY (`Society_Profession_Id`) REFERENCES `wipo_master_profession` (`Master_Profession_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_region` FOREIGN KEY (`Society_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_role` FOREIGN KEY (`Society_Role_Id`) REFERENCES `wipo_master_role` (`Master_Role_ID`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_organization_territory` FOREIGN KEY (`Society_Territory_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society` FOREIGN KEY (`Society_Abbr_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_currency` FOREIGN KEY (`Society_Currency_Id`) REFERENCES `wipo_master_currency` (`Master_Crncy_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_hierarchy` FOREIGN KEY (`Society_Hirearchy_Id`) REFERENCES `wipo_master_hierarchy` (`Master_Hierarchy_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_language` FOREIGN KEY (`Society_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_type` FOREIGN KEY (`Society_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_society` */

insert  into `wipo_society`(`Society_Id`,`Society_Code`,`Society_Abbr_Id`,`Society_Logo_File`,`Society_Language_Id`,`Society_Mailing_Address`,`Society_Country_Id`,`Society_Territory_Id`,`Society_Region_Id`,`Society_Profession_Id`,`Society_Role_Id`,`Society_Hirearchy_Id`,`Society_Payment_Id`,`Society_Type_Id`,`Society_Factor`,`Society_Doc_Type_Id`,`Society_Doc_Id`,`Society_Duration`,`Society_CopyRight`,`Society_RelatedRights`,`Society_Currency_Id`,`Society_Rate`,`Society_Main_Performer_Id`,`Society_Producer_Id`,`Society_Subscription`,`Active`,`Created_Date`,`Rowversion`) values (10,'SOC1',1,'\\organization\\05be13266f895a0a745d22795c280920.png',3,'Main street',2,6,1,1,1,2,2,2,'50.50',1,1,5,6,1,1,'25.50','test','test','Subscription','1','2015-03-20 13:59:05','0000-00-00 00:00:00');

/*Table structure for table `wipo_user` */

DROP TABLE IF EXISTS `wipo_user`;

CREATE TABLE `wipo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wipo_user_role` (`role`),
  CONSTRAINT `FK_wipo_user_role` FOREIGN KEY (`role`) REFERENCES `wipo_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wipo_user` */

insert  into `wipo_user`(`id`,`username`,`name`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin','admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',NULL,'arivu.sacs@gmail.com',1,'1',1413526995,1424063457),(3,'admin2','admin 2','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62','','prakash.paramanandam@arkinfotec.com',1,'1',0,1426227686),(4,'admin3','admin 3','458881d833d40147f2de278c3a55cf27ef943c398ecd334b276065b70768862f181d4c2c326369a455cb182d794071251e71a5de4fe7b56870375a4e87d6d11c',NULL,'abcd@gmail.com',2,'0',0,0);

/*Table structure for table `wipo_work` */

DROP TABLE IF EXISTS `wipo_work`;

CREATE TABLE `wipo_work` (
  `Work_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Org_Title` varchar(100) NOT NULL,
  `Work_Language_Id` int(11) DEFAULT NULL,
  `Work_Internal_Code` varchar(100) NOT NULL,
  `Work_Iswc` varchar(100) DEFAULT NULL,
  `Work_Wic_Code` varchar(100) DEFAULT NULL,
  `Work_Type_Id` int(11) NOT NULL,
  `Work_Factor_Id` int(11) NOT NULL,
  `Work_Instrumentation` varchar(500) DEFAULT NULL,
  `Work_Duration` time NOT NULL,
  `Work_Creation` year(4) DEFAULT NULL,
  `Work_Opus_Number` smallint(6) DEFAULT NULL,
  `Work_Unknown` enum('Y','N') DEFAULT 'N',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Id`),
  KEY `FK_wipo_works_language` (`Work_Language_Id`),
  KEY `FK_wipo_work_type` (`Work_Type_Id`),
  KEY `FK_wipo_work` (`Work_Factor_Id`),
  CONSTRAINT `FK_wipo_work` FOREIGN KEY (`Work_Factor_Id`) REFERENCES `wipo_master_factor` (`Master_Factor_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_works_language` FOREIGN KEY (`Work_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_type` FOREIGN KEY (`Work_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work` */

insert  into `wipo_work`(`Work_Id`,`Work_Org_Title`,`Work_Language_Id`,`Work_Internal_Code`,`Work_Iswc`,`Work_Wic_Code`,`Work_Type_Id`,`Work_Factor_Id`,`Work_Instrumentation`,`Work_Duration`,`Work_Creation`,`Work_Opus_Number`,`Work_Unknown`,`Active`,`Created_Date`,`Rowversion`) values (2,'Music 1',5,'A0000001','89841515','895515415',1,1,'[\"8\",\"9\",\"11\",\"13\"]','120:50:50',2015,NULL,'Y','1','2015-05-13 19:05:04','0000-00-00 00:00:00'),(3,'Music 2',1,'A0000002','89841515','895515415',1,1,'','02:06:00',2015,NULL,'N','1','2015-05-13 19:09:28','0000-00-00 00:00:00'),(4,'Music 3',1,'A0000003','89841515','895515415',1,1,'','00:00:00',2015,NULL,'N','1','2015-05-14 18:00:19','0000-00-00 00:00:00'),(6,'Music 4',5,'A0000005','89841515','895515415',4,1,'','00:00:00',2015,NULL,'N','1','2015-05-16 14:12:51','0000-00-00 00:00:00'),(7,'Music 5',5,'A0000006','89841515','895515415',4,1,'[\"1\",\"2\"]','00:00:00',2015,NULL,'N','1','2015-05-19 11:30:08','0000-00-00 00:00:00'),(8,'Music 6',5,'A0000007','89841515','895515415',4,1,'[\"2\",\"3\",\"4\"]','10:00:00',2015,NULL,'N','1','2015-05-22 19:06:46','0000-00-00 00:00:00'),(9,'Music 7',5,'A0000008','89841515','895515415',4,1,'[\"1\",\"2\"]','50:10:00',2015,NULL,'N','1','2015-05-25 13:15:31','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_biography` */

DROP TABLE IF EXISTS `wipo_work_biography`;

CREATE TABLE `wipo_work_biography` (
  `Work_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Biogrph_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Biogrph_Id`),
  KEY `FK_wipo_work_biography_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_biography_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_biography` */

insert  into `wipo_work_biography`(`Work_Biogrph_Id`,`Work_Id`,`Work_Biogrph_Annotation`,`Created_Date`,`Rowversion`) values (1,2,'Annotations','2015-05-14 13:31:43','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_documentation` */

DROP TABLE IF EXISTS `wipo_work_documentation`;

CREATE TABLE `wipo_work_documentation` (
  `Work_Doc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Doc_Status_Id` int(11) NOT NULL,
  `Work_Doc_Inclusion` enum('Y','N') DEFAULT NULL,
  `Work_Doc_Dispute` enum('Y','N') DEFAULT NULL,
  `Work_Doc_Type_Id` int(11) NOT NULL,
  `Work_Doc_Sign_Date` date NOT NULL,
  `Work_Doc_File` varchar(255) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Doc_Id`),
  KEY `FK_wipo_work_documentation_work` (`Work_Id`),
  KEY `FK_wipo_work_documentation_document_status` (`Work_Doc_Status_Id`),
  KEY `FK_wipo_work_documentation_document_type` (`Work_Doc_Type_Id`),
  CONSTRAINT `FK_wipo_work_documentation_document_status` FOREIGN KEY (`Work_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_documentation_document_type` FOREIGN KEY (`Work_Doc_Type_Id`) REFERENCES `wipo_master_document` (`Master_Doc_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_documentation_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_documentation` */

insert  into `wipo_work_documentation`(`Work_Doc_Id`,`Work_Id`,`Work_Doc_Status_Id`,`Work_Doc_Inclusion`,`Work_Doc_Dispute`,`Work_Doc_Type_Id`,`Work_Doc_Sign_Date`,`Work_Doc_File`,`Created_Date`,`Rowversion`) values (1,2,1,'Y','Y',1,'2015-05-14','','2015-05-14 19:33:18','0000-00-00 00:00:00'),(2,7,1,'N','N',1,'2015-05-20','files','2015-05-20 13:03:13','0000-00-00 00:00:00'),(3,8,1,'Y','N',1,'2015-05-22','','2015-05-22 19:11:08','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_publishing` */

DROP TABLE IF EXISTS `wipo_work_publishing`;

CREATE TABLE `wipo_work_publishing` (
  `Work_Pub_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Pub_Contact_Start` date NOT NULL,
  `Work_Pub_Contact_End` date NOT NULL,
  `Work_Pub_Territories` varchar(500) NOT NULL,
  `Work_Pub_Sign_Date` date NOT NULL,
  `Work_Pub_File` varchar(255) DEFAULT NULL,
  `Work_Pub_References` smallint(6) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Pub_Id`),
  KEY `FK_wipo_work_publishing_territory` (`Work_Pub_Territories`),
  KEY `FK_wipo_work_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_publishing` */

insert  into `wipo_work_publishing`(`Work_Pub_Id`,`Work_Id`,`Work_Pub_Contact_Start`,`Work_Pub_Contact_End`,`Work_Pub_Territories`,`Work_Pub_Sign_Date`,`Work_Pub_File`,`Work_Pub_References`,`Created_Date`,`Rowversion`) values (1,2,'2015-05-01','2015-05-31','[\"7\",\"6\"]','2015-05-16','Test',60,'2015-05-16 13:33:58','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_rightholder` */

DROP TABLE IF EXISTS `wipo_work_rightholder`;

CREATE TABLE `wipo_work_rightholder` (
  `Work_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Member_Internal_Code` varchar(100) NOT NULL,
  `Work_Right_Role` int(11) NOT NULL,
  `Work_Right_Broad_Share` decimal(10,2) NOT NULL,
  `Work_Right_Broad_Special` enum('DI','IN','OT','PL') DEFAULT NULL,
  `Work_Right_Broad_Org_id` int(11) NOT NULL,
  `Work_Right_Mech_Share` decimal(10,2) NOT NULL,
  `Work_Right_Mech_Special` enum('DI','IN','OT','PL') DEFAULT NULL,
  `Work_Right_Mech_Org_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Right_Id`),
  KEY `FK_wipo_work_rightholder_work` (`Work_Id`),
  KEY `FK_wipo_work_rightholder_organization` (`Work_Right_Broad_Org_id`),
  KEY `FK_wipo_work_rightholder_organization_mechanical` (`Work_Right_Mech_Org_Id`),
  KEY `FK_wipo_work_rightholder_role` (`Work_Right_Role`),
  CONSTRAINT `FK_wipo_work_rightholder_organization` FOREIGN KEY (`Work_Right_Broad_Org_id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_organization_mechanical` FOREIGN KEY (`Work_Right_Mech_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_role` FOREIGN KEY (`Work_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_rightholder` */

insert  into `wipo_work_rightholder`(`Work_Right_Id`,`Work_Id`,`Work_Member_Internal_Code`,`Work_Right_Role`,`Work_Right_Broad_Share`,`Work_Right_Broad_Special`,`Work_Right_Broad_Org_id`,`Work_Right_Mech_Share`,`Work_Right_Mech_Special`,`Work_Right_Mech_Org_Id`,`Created_Date`,`Rowversion`) values (9,8,'A1002',4,'10.00','DI',1,'90.00','DI',1,'2015-05-22 19:17:09','0000-00-00 00:00:00'),(10,8,'E106',2,'90.00','PL',1,'10.00','PL',1,'2015-05-22 19:17:09','0000-00-00 00:00:00'),(75,2,'A1015',4,'30.00','OT',1,'60.00','OT',1,'2015-05-27 13:12:54','0000-00-00 00:00:00'),(76,2,'A1018',4,'5.00','PL',1,'20.00','OT',1,'2015-05-27 13:12:55','0000-00-00 00:00:00'),(77,2,'A1006',4,'65.00','OT',1,'20.00','OT',1,'2015-05-27 13:12:55','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_sub_publishing` */

DROP TABLE IF EXISTS `wipo_work_sub_publishing`;

CREATE TABLE `wipo_work_sub_publishing` (
  `Work_Sub_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Sub_Contact_Start` date NOT NULL,
  `Work_Sub_Contact_End` date NOT NULL,
  `Work_Sub_Territories` varchar(500) NOT NULL,
  `Work_Sub_Clause` enum('M','S') NOT NULL DEFAULT 'M',
  `Work_Sub_Sign_Date` date NOT NULL,
  `Work_Sub_File` varchar(255) DEFAULT NULL,
  `Work_Sub_References` smallint(6) NOT NULL,
  `Work_Sub_Catelog_Number` varchar(100) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Sub_Id`),
  KEY `FK_wipo_work_sub_publishing_territory` (`Work_Sub_Territories`),
  KEY `FK_wipo_work_sub_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_sub_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_sub_publishing` */

insert  into `wipo_work_sub_publishing`(`Work_Sub_Id`,`Work_Id`,`Work_Sub_Contact_Start`,`Work_Sub_Contact_End`,`Work_Sub_Territories`,`Work_Sub_Clause`,`Work_Sub_Sign_Date`,`Work_Sub_File`,`Work_Sub_References`,`Work_Sub_Catelog_Number`,`Created_Date`,`Rowversion`) values (1,2,'2015-05-01','2015-05-31','[\"7\",\"6\"]','S','2015-05-16','Test',50,'TN762736273','2015-05-16 14:00:48','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_subtitle` */

DROP TABLE IF EXISTS `wipo_work_subtitle`;

CREATE TABLE `wipo_work_subtitle` (
  `Work_Subtitle_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Subtitle_Name` varchar(255) NOT NULL,
  `Work_Subtitle_Type_Id` int(11) NOT NULL,
  `Work_Subtitle_Language_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Subtitle_Id`),
  KEY `FK_wipo_work_subtitle_work` (`Work_Id`),
  KEY `FK_wipo_work_subtitle_type` (`Work_Subtitle_Type_Id`),
  KEY `FK_wipo_work_subtitle_language` (`Work_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_work_subtitle_language` FOREIGN KEY (`Work_Subtitle_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_subtitle_type` FOREIGN KEY (`Work_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_subtitle_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_subtitle` */

insert  into `wipo_work_subtitle`(`Work_Subtitle_Id`,`Work_Id`,`Work_Subtitle_Name`,`Work_Subtitle_Type_Id`,`Work_Subtitle_Language_Id`,`Created_Date`,`Rowversion`) values (1,2,'Sub title One',1,1,'2015-05-14 13:12:47','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

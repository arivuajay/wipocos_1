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
) ENGINE=InnoDB AUTO_INCREMENT=1048 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_audit_trail` */

insert  into `wipo_audit_trail`(`aud_id`,`aud_user`,`aud_class`,`aud_action`,`aud_message`,`aud_ip_address`,`aud_created_date`) values (1,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 22:55:48'),(2,1,'user','site.authoraccount.update','Updated John  Mac AuthorAccount successfully.','122.174.109.122','2015-05-01 22:56:11'),(3,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','122.174.109.122','2015-05-01 22:56:30'),(4,1,'user','site.authoraccount.update','Updated Micheal  Geo AuthorAccount successfully.','122.174.109.122','2015-05-01 22:57:01'),(5,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 22:58:47'),(6,1,'music','site.performeraccount.update','Updated Performer Nancy C successfully.','122.174.109.122','2015-05-01 22:59:11'),(7,1,'music','site.performeraccount.update','Updated Performer Mary Hammer successfully.','122.174.109.122','2015-05-01 22:59:45'),(8,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','122.174.109.122','2015-05-01 23:00:04'),(9,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','122.174.109.122','2015-05-01 23:00:10'),(10,1,'music','site.performeraccount.update','Updated Performer Nancy Gilson successfully.','122.174.109.122','2015-05-01 23:00:25'),(11,1,'group','site.publishergroup.update','Publisher Group Subcontracted Catalogue EG100 saved successfully.','122.174.109.122','2015-05-01 23:27:57'),(12,1,'globe','site.mastercountry.delete','Deleted Country Nepal successfully.','122.174.109.122','2015-05-01 23:30:30'),(13,1,'globe','site.mastercountry.delete','Deleted Country Indonisia successfully.','122.174.109.122','2015-05-01 23:30:44'),(14,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 23:34:21'),(15,1,'globe','site.mastercountry.delete','Deleted Country Nepal successfully.','122.174.109.122','2015-05-01 23:34:31'),(16,1,'user','site.default.login','admin logged-in successfully.','122.174.100.76','2015-05-09 14:14:31'),(17,1,'at','site.mastertyperights.create','Created Type of Right Music Publisher successfully.','122.174.100.76','2015-05-09 14:20:00'),(18,1,'at','site.mastertyperights.create','Created Type of Right Producer successfully.','122.174.100.76','2015-05-09 14:20:07'),(19,1,'music','site.performeraccount.delete','Deleted Performer Test arumugam successfully.','110.159.120.210','2015-05-09 14:24:28'),(20,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-09 14:30:05'),(21,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-09 14:30:12'),(22,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:31:01'),(23,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.47','2015-05-09 14:31:12'),(24,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.47','2015-05-09 14:35:54'),(25,1,'user','site.default.login','admin logged-in successfully.','110.159.120.47','2015-05-09 14:36:01'),(26,1,'user','site.default.profile','Updated a admin successfully.','110.159.120.47','2015-05-09 14:36:27'),(27,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:36:32'),(28,1,'user','site.default.login','admin logged-in successfully.','110.159.120.47','2015-05-09 14:36:45'),(29,1,'user','site.default.logout','admin logged-out successfully.','122.174.100.76','2015-05-09 14:40:59'),(30,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:46:50'),(31,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.47','2015-05-09 14:46:57'),(32,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.47','2015-05-09 14:50:01'),(33,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-09 14:51:48'),(34,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-09 15:00:19'),(35,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-09 15:05:28'),(36,1,'user','site.default.login','admin logged-in successfully.','219.92.20.76','2015-05-10 03:35:07'),(37,1,'microphone','site.publisheraccount.create','Created Publisher Publisher 079 successfully.','219.92.20.76','2015-05-10 03:36:56'),(38,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Publisher 079 successfully.','219.92.20.76','2015-05-10 03:37:06'),(39,1,'money','site.produceraccount.create','Created Producer Producer 079 successfully.','219.92.20.76','2015-05-10 03:37:46'),(40,1,'money','site.produceraccount.update','Updated Producer Managed Rights Producer 079 successfully.','219.92.20.76','2015-05-10 03:37:54'),(41,1,'group','site.publishergroup.create','Created Publisher Group EG108 successfully.','219.92.20.76','2015-05-10 03:38:35'),(42,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG108 successfully.','219.92.20.76','2015-05-10 03:38:54'),(43,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-11 14:57:44'),(44,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-11 15:04:49'),(45,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-11 15:05:00'),(46,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','110.159.120.210','2015-05-11 15:19:22'),(47,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-11 15:22:11'),(48,1,'user','site.default.login','admin logged-in successfully.','175.143.54.201','2015-05-12 06:51:51'),(49,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','175.143.54.201','2015-05-12 06:54:32'),(50,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','175.143.54.201','2015-05-12 06:54:32'),(51,1,'user','site.default.login','admin logged-in successfully.','122.174.87.88','2015-05-12 10:54:38'),(52,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','122.174.87.88','2015-05-12 10:56:09'),(53,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','122.174.87.88','2015-05-12 10:56:09'),(54,1,'user','site.masterlabel.update','Updated MasterLabel successfully.','122.174.87.88','2015-05-12 10:59:55'),(55,5,'user','site.default.login','vinodh logged-in successfully.','121.121.108.238','2015-05-13 03:09:56'),(56,5,'user','site.user.update','Updated User admin successfully.','121.121.108.238','2015-05-13 03:10:34'),(57,5,'user','site.default.logout','vinodh logged-out successfully.','121.121.108.238','2015-05-13 03:10:47'),(58,5,'user','site.default.login','vinodh logged-in successfully.','121.121.108.238','2015-05-13 03:11:33'),(59,5,'user','site.default.logout','vinodh logged-out successfully.','121.121.108.238','2015-05-13 03:13:36'),(60,1,'user','site.default.logout','admin logged-out successfully.','122.174.95.229','2015-05-13 06:01:24'),(61,5,'user','site.default.login','Vinodh logged-in successfully.','113.210.128.238','2015-05-13 10:32:34'),(62,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-13 12:51:52'),(63,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-13 13:06:13'),(64,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-13 13:06:21'),(65,1,'user','site.default.profile','Updated a admin successfully.','110.159.120.210','2015-05-13 13:06:41'),(66,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-13 13:06:47'),(67,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-13 13:06:58'),(68,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 13:17:00'),(69,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 13:17:06'),(70,1,'microphone','site.publisheraccount.create','Created Publisher Kiyosaki successfully.','210.195.47.109','2015-05-13 13:17:52'),(71,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','210.195.47.109','2015-05-13 13:18:09'),(72,1,'user','site.authoraccount.create','Created a Robert  Kiyosaki successfully.','210.195.47.109','2015-05-13 13:18:27'),(73,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Managed Rights successfully.','210.195.47.109','2015-05-13 13:18:37'),(74,1,'money','site.produceraccount.create','Created Producer Jerry Bruckheimer successfully.','210.195.47.109','2015-05-13 13:19:03'),(75,1,'money','site.produceraccount.update','Updated Producer Managed Rights Jerry Bruckheimer successfully.','210.195.47.109','2015-05-13 13:19:10'),(76,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 14:19:46'),(77,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:20:16'),(78,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:20:51'),(79,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:21:07'),(80,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:21:33'),(81,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:21:44'),(82,5,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','210.195.47.109','2015-05-13 14:22:43'),(83,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:23:05'),(84,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:23:17'),(85,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:23:23'),(86,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 14:23:30'),(87,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-13 14:41:27'),(88,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-13 14:41:42'),(89,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-13 14:48:43'),(90,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 15:17:26'),(91,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 15:17:31'),(92,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 15:17:52'),(93,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 15:17:58'),(94,1,'users','site.group.update','Updated a Metallica successfully.','210.195.47.109','2015-05-13 15:37:24'),(95,1,'users','site.group.update','Updated a Metallica successfully.','210.195.47.109','2015-05-13 15:37:30'),(96,1,'users','site.group.update','Managed Rights Saved on Metallica successfully.','210.195.47.109','2015-05-13 15:37:41'),(97,1,'users','site.group.update','Memeber Saved on Metallica successfully.','210.195.47.109','2015-05-13 15:37:48'),(98,1,'microphone','site.publisheraccount.create','Created Publisher Trump successfully.','210.195.47.109','2015-05-13 15:47:11'),(99,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Trump successfully.','210.195.47.109','2015-05-13 15:48:46'),(100,1,'group','site.publishergroup.update','Updated Publisher Group EG101 successfully.','210.195.47.109','2015-05-13 15:50:32'),(101,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','210.195.47.109','2015-05-13 15:50:40'),(102,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG101 successfully.','210.195.47.109','2015-05-13 15:50:46'),(103,1,'money','site.produceraccount.create','Created Producer MGM successfully.','210.195.47.109','2015-05-13 15:54:16'),(104,1,'money','site.produceraccount.update','Updated Producer Managed Rights MGM successfully.','210.195.47.109','2015-05-13 15:54:22'),(105,1,'user','site.default.login','Admin logged-in successfully.','175.140.226.140','2015-05-14 12:43:25'),(106,1,'user','site.default.login','admin logged-in successfully.','122.174.95.102','2015-05-14 12:59:49'),(107,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-17 03:26:40'),(108,1,'user','site.default.logout','admin logged-out successfully.','122.174.86.6','2015-05-21 06:23:36'),(109,1,'list','site.mastertype.create','Created Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:34'),(110,1,'list','site.mastertype.create','Created Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:35'),(111,1,'list','site.mastertype.delete','Deleted Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:39'),(112,1,'sliders','site.work.create','Created Work successfully.','122.174.114.43','2015-05-21 14:30:00'),(113,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.114.43','2015-05-21 14:30:19'),(114,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.114.43','2015-05-21 14:31:55'),(115,1,'sliders','site.work.create','Created Work successfully.','110.159.120.210','2015-05-21 22:09:15'),(116,1,'sliders','site.work.update','Saved Work Documentation successfully.','110.159.120.210','2015-05-21 22:09:36'),(117,1,'sliders','site.work.update','Saved Work right holder successfully.','110.159.120.210','2015-05-21 22:13:19'),(118,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-21 22:42:50'),(119,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-21 22:43:10'),(120,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-21 22:43:32'),(121,1,'user','site.default.login','admin logged-in successfully.','122.174.127.79','2015-05-22 07:02:07'),(122,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 07:53:37'),(123,1,'at','site.mastertyperights.update','Updated Type of Right Music Publisher successfully.','122.174.127.79','2015-05-22 08:48:30'),(124,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.127.79','2015-05-22 08:48:42'),(125,1,'at','site.mastertyperights.update','Updated Type of Right Music Publisher successfully.','122.174.127.79','2015-05-22 08:48:59'),(126,1,'at','site.mastertyperights.create','Created Type of Right Performer successfully.','122.174.127.79','2015-05-22 08:49:24'),(127,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 09:10:24'),(128,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 09:11:08'),(129,1,'user','site.default.login','admin logged-in successfully.','122.174.127.79','2015-05-22 12:08:57'),(130,1,'sliders','site.work.holderremove','Deleted RightHolder A1006 at work Music 1.','122.174.127.79','2015-05-22 12:15:41'),(131,1,'sliders','site.work.create','Created Work successfully.','219.92.23.241','2015-05-22 13:01:16'),(132,1,'sliders','site.work.update','Saved Work Documentation successfully.','219.92.23.241','2015-05-22 13:02:37'),(133,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:06:02'),(134,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:11:43'),(135,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:14:55'),(136,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),(137,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),(138,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),(139,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),(140,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:45:49'),(141,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:46:15'),(142,1,'sliders','site.work.create','Created Work successfully.','122.174.144.200','2015-05-26 10:46:58'),(143,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 10:48:01'),(144,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:48:08'),(145,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','122.174.144.200','2015-05-26 10:49:55'),(146,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','122.174.144.200','2015-05-26 10:49:55'),(147,1,'user','site.authoraccount.create','Created a Auth First  Tets successfully.','122.174.144.200','2015-05-26 13:57:45'),(148,1,'user','site.authoraccount.update','Updated Auth First  Tets AuthorAccount successfully.','122.174.144.200','2015-05-26 13:57:53'),(149,1,'user','site.authoraccount.update','Updated Auth First  Tets AuthorAccount successfully.','122.174.144.200','2015-05-26 13:58:01'),(150,1,'user','site.authoraccount.delete','Deleted a Auth First  Tets successfully.','122.174.144.200','2015-05-26 13:58:26'),(151,1,'sliders','site.work.create','Created Work successfully.','122.174.144.200','2015-05-26 14:06:03'),(152,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:11'),(153,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:18'),(154,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 14:06:29'),(155,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:52'),(156,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.144.200','2015-05-26 14:07:10'),(157,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-26 14:22:20'),(158,1,'sliders','site.work.create','Created Work successfully.','124.13.34.187','2015-05-26 14:24:42'),(159,1,'sliders','site.work.update','Saved Work Documentation successfully.','124.13.34.187','2015-05-26 14:24:59'),(160,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-05-26 14:27:45'),(161,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-05-26 14:27:45'),(162,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-05-26 14:52:26'),(163,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-26 14:59:02'),(164,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.174.89.254','2015-05-27 14:52:44'),(165,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.174.89.254','2015-05-27 14:52:44'),(166,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),(167,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),(168,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),(169,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),(170,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),(171,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),(172,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),(173,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),(174,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),(175,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),(176,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),(177,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),(178,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),(179,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),(180,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),(181,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),(182,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),(183,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),(184,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),(185,1,'user','site.default.login','admin logged-in successfully.','60.48.178.132','2015-05-28 09:23:33'),(186,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-28 12:20:58'),(187,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-28 12:23:04'),(188,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.82.254','2015-05-28 12:45:06'),(189,1,'sliders','site.work.subtitledelete','Deleted Recording subtitle Sub title One successfully.','122.174.82.254','2015-05-28 12:45:13'),(190,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.82.254','2015-05-28 12:46:02'),(191,1,'sliders','site.work.subtitledelete','Deleted Work subtitle Sub title Two successfully.','122.174.82.254','2015-05-28 12:46:07'),(192,1,'sliders','site.work.create','Created Work successfully.','175.139.247.58','2015-05-28 13:44:37'),(193,1,'sliders','site.work.update','Saved Work Documentation successfully.','175.139.247.58','2015-05-28 13:44:50'),(194,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.247.58','2015-05-28 13:48:09'),(195,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.247.58','2015-05-28 13:48:09'),(196,1,'sliders','site.work.create','Created Work successfully.','175.139.247.58','2015-05-28 13:53:03'),(197,1,'sliders','site.work.update','Saved Work Documentation successfully.','175.139.247.58','2015-05-28 13:53:15'),(198,1,'sliders','site.work.delete','Deleted Work successfully.','175.139.247.58','2015-05-28 13:53:47'),(199,1,'sliders','site.work.update','Saved Work Subtitle successfully.','175.139.247.58','2015-05-28 13:59:31'),(200,1,'sliders','site.work.update','Saved Work Subtitle successfully.','175.139.247.58','2015-05-28 14:00:12'),(201,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:42:37'),(202,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:42:37'),(203,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),(204,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),(205,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),(206,1,'volume-up','site.recording.create','Created Recording successfully.','122.174.119.148','2015-05-29 11:48:08'),(207,1,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','122.174.119.148','2015-05-29 11:48:26'),(208,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','122.174.119.148','2015-05-29 11:48:33'),(209,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.119.148','2015-05-29 11:48:57'),(210,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.119.148','2015-05-29 11:48:57'),(211,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','122.174.119.148','2015-05-29 11:49:18'),(212,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 09:37:48'),(213,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 09:38:10'),(214,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 09:38:20'),(215,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 10:18:21'),(216,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 11:46:50'),(217,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 11:47:08'),(218,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 11:48:12'),(219,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 11:48:27'),(220,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 11:48:39'),(221,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 11:48:49'),(222,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.123.183','2015-05-30 11:49:54'),(223,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 14:45:49'),(224,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 14:46:05'),(225,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-30 15:35:01'),(226,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','124.13.34.187','2015-05-30 15:36:28'),(227,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-30 15:52:10'),(228,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','127.0.0.1','2015-06-02 05:39:11'),(229,1,'user','site.masterlabel.update','Updated MasterLabel successfully.','127.0.0.1','2015-06-02 06:54:15'),(230,1,'user','site.masterlabel.create','Created MasterLabel successfully.','127.0.0.1','2015-06-02 06:54:24'),(231,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-06-02 06:58:47'),(232,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-06-02 07:01:03'),(233,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 07:09:23'),(234,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 07:12:00'),(235,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 07:13:08'),(236,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 07:13:21'),(237,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 10:56:38'),(238,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 10:58:53'),(239,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 10:59:02'),(240,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 10:59:25'),(241,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-02 11:00:07'),(242,1,'sliders','site.work.delete','Deleted Work successfully.','127.0.0.1','2015-06-02 11:00:29'),(243,1,'user','site.authoraccount.create','Created a Robert  Mano successfully.','122.174.107.30','2015-06-04 05:02:50'),(244,1,'user','site.authoraccount.convert','Robert converted as performer successfully.','122.174.107.30','2015-06-04 05:03:04'),(245,1,'user','site.authoraccount.update','Updated Robert  Mano Address successfully.','122.174.107.30','2015-06-04 05:03:40'),(246,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:04:13'),(247,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:04:40'),(248,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:14:43'),(249,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-04 05:59:00'),(250,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-04 06:48:04'),(251,1,'at','site.mastertyperights.create','Created Type of Right Author, Writer, Lyricist successfully.','122.174.76.68','2015-06-04 22:16:02'),(252,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:05:23'),(253,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:05:23'),(254,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:45:08'),(255,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:45:08'),(256,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),(257,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),(258,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),(259,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-05 05:02:29'),(260,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-05 05:06:25'),(261,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-05 05:06:25'),(262,1,'volume-up','site.recording.create','Created Recording successfully.','124.13.34.187','2015-06-05 05:07:08'),(263,1,'female','site.mastermaritalstatus.update','Updated Master Marital Status LIMITED  successfully.','124.13.34.187','2015-06-05 05:15:09'),(264,1,'female','site.mastermaritalstatus.update','Updated Master Marital Status PARTERNER successfully.','124.13.34.187','2015-06-05 05:15:25'),(265,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:15'),(266,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:18'),(267,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:23'),(268,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.125.136','2015-06-07 03:47:03'),(269,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-07 06:14:29'),(270,1,'volume-up','site.recording.create','Created Recording successfully.','113.210.132.52','2015-06-07 17:05:06'),(271,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','113.210.132.52','2015-06-07 17:25:25'),(272,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','113.210.132.52','2015-06-07 17:25:25'),(273,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:06:56'),(274,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:07:06'),(275,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:07:47'),(276,1,'user','site.authoraccount.update','Updated Jennifer  Jeann AuthorAccount successfully.','122.174.119.97','2015-06-08 20:08:03'),(277,1,'user','site.authoraccount.delete','Deleted a Robert  Mano successfully.','122.174.119.97','2015-06-08 20:10:36'),(278,1,'user','site.authoraccount.create','Created a Willam  Y successfully.','122.174.119.97','2015-06-08 20:11:05'),(279,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-08 20:11:27'),(280,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-08 20:16:47'),(281,1,'music','site.performeraccount.update','Updated Performer Willam Y successfully.','122.174.119.97','2015-06-08 20:17:04'),(282,1,'music','site.performeraccount.update','Updated Performer Willam Y successfully.','122.174.119.97','2015-06-08 20:17:13'),(283,1,'user','site.authoraccount.update','Updated Willam  Y Managed Rights successfully.','122.174.119.97','2015-06-08 20:17:31'),(284,1,'music','site.authoraccount.update','Updated Performer Related Rights Willam Y successfully.','122.174.119.97','2015-06-08 20:17:47'),(285,1,'music','site.performeraccount.update','Updated Performer Pseudonym Willam Y successfully.','122.174.119.97','2015-06-08 20:18:01'),(286,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:20:25'),(287,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:20:40'),(288,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:25:40'),(289,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:31:48'),(290,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.119.97','2015-06-08 20:37:18'),(291,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.119.97','2015-06-08 20:37:26'),(292,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Managed Rights successfully.','122.174.119.97','2015-06-08 20:50:22'),(293,1,'music','site.authoraccount.update','Updated Performer Related Rights Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:51:27'),(294,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Address successfully.','122.174.119.97','2015-06-08 20:52:14'),(295,1,'music','site.performeraccount.update','Updated Performer Payment Method Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:52:28'),(296,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 1 successfully.','122.174.119.97','2015-06-09 04:04:42'),(297,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 2 successfully.','122.174.119.97','2015-06-09 04:05:06'),(298,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 1 successfully.','122.174.119.97','2015-06-09 04:05:16'),(299,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 2 successfully.','122.174.119.97','2015-06-09 04:05:25'),(300,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 3 successfully.','122.174.119.97','2015-06-09 04:05:34'),(301,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 4 successfully.','122.174.119.97','2015-06-09 04:05:42'),(302,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 5 successfully.','122.174.119.97','2015-06-09 04:05:54'),(303,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 6 successfully.','122.174.119.97','2015-06-09 04:06:08'),(304,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 7 successfully.','122.174.119.97','2015-06-09 04:06:18'),(305,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 8 successfully.','122.174.119.97','2015-06-09 04:06:30'),(306,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 9 successfully.','122.174.119.97','2015-06-09 04:06:42'),(307,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 10 successfully.','122.174.119.97','2015-06-09 04:07:09'),(308,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 11 successfully.','122.174.119.97','2015-06-09 04:07:21'),(309,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 12 successfully.','122.174.119.97','2015-06-09 04:07:33'),(310,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 13 successfully.','122.174.119.97','2015-06-09 04:07:57'),(311,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 14 successfully.','122.174.119.97','2015-06-09 04:08:08'),(312,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 15 successfully.','122.174.119.97','2015-06-09 04:08:18'),(313,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 16 successfully.','122.174.119.97','2015-06-09 04:08:30'),(314,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 17 successfully.','122.174.119.97','2015-06-09 04:08:43'),(315,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 18 successfully.','122.174.119.97','2015-06-09 04:08:53'),(316,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 19 successfully.','122.174.119.97','2015-06-09 04:09:05'),(317,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','122.174.119.97','2015-06-09 04:10:22'),(318,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','122.174.119.97','2015-06-09 04:10:22'),(319,1,'user','site.authoraccount.update','Updated Jennifer  Jeann AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:16'),(320,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:30'),(321,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:39'),(322,1,'music','site.performeraccount.update','Updated Performer Related Rights Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:01'),(323,1,'music','site.performeraccount.update','Updated Performer Address Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:13'),(324,1,'music','site.performeraccount.update','Updated Performer Death Inheritance Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:24'),(325,1,'user','site.authoraccount.create','Created a Harry  P successfully.','122.174.119.97','2015-06-09 04:17:31'),(326,1,'user','site.authoraccount.update','Updated Harry  P AuthorAccount successfully.','122.174.119.97','2015-06-09 04:17:49'),(327,1,'user','site.authoraccount.update','Updated Harry  P AuthorAccount successfully.','122.174.119.97','2015-06-09 04:18:04'),(328,1,'music','site.performeraccount.create','Created Performer Ron Jack successfully.','122.174.119.97','2015-06-09 04:18:30'),(329,1,'music','site.performeraccount.update','Updated Performer Ron Jack successfully.','122.174.119.97','2015-06-09 04:18:44'),(330,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','122.174.119.97','2015-06-09 04:20:37'),(331,1,'volume-up','site.recording.update','Updated Recording successfully.','122.174.119.97','2015-06-09 05:08:56'),(332,1,'music','site.performeraccount.update','Updated Performer Nancy Gilson successfully.','122.174.119.97','2015-06-09 05:22:38'),(333,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-09 06:08:12'),(334,1,'user','site.authoraccount.update','Updated John  Mac AuthorAccount successfully.','124.13.34.187','2015-06-09 06:11:47'),(335,1,'user','site.authoraccount.create','Created a Rovan  Atkinson successfully.','124.13.34.187','2015-06-09 06:31:08'),(336,1,'user','site.authoraccount.update','Updated Rovan  Atkinson Managed Rights successfully.','124.13.34.187','2015-06-09 06:32:45'),(337,1,'microphone','site.publisheraccount.update','Updated Publisher BGM Limited successfully.','124.13.34.187','2015-06-09 06:41:53'),(338,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-09 06:42:26'),(339,1,'user','site.authoraccount.create','Created a testtest  test successfully.','122.174.119.97','2015-06-09 06:56:22'),(340,1,'user','site.authoraccount.update','Updated testtest  test Managed Rights successfully.','122.174.119.97','2015-06-09 06:56:32'),(341,1,'user','site.authoraccount.delete','Deleted a testtest  test successfully.','122.174.119.97','2015-06-09 06:56:45'),(342,1,'volume-up','site.recording.update','Updated Recording successfully.','210.186.156.165','2015-06-09 18:47:37'),(343,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 12 successfully.','210.186.156.165','2015-06-09 18:50:37'),(344,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),(345,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),(346,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),(347,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:24'),(348,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:24'),(349,1,'volume-up','site.recording.update','Updated Recording successfully.','210.186.156.165','2015-06-09 18:52:57'),(350,1,'volume-up','site.recording.create','Created Recording successfully.','210.186.156.165','2015-06-09 19:16:02'),(351,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),(352,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),(353,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),(354,1,'user','site.default.login','admin logged-in successfully.','122.164.158.250','2015-06-09 22:00:56'),(355,1,'user','site.authoraccount.update','Updated Jennifer  Jeann Managed Rights successfully.','113.210.133.150','2015-06-10 02:41:56'),(356,1,'volume-up','site.recording.create','Created Recording successfully.','113.210.133.150','2015-06-10 02:44:26'),(357,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','113.210.133.150','2015-06-10 02:46:52'),(358,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','113.210.133.150','2015-06-10 02:46:52'),(359,1,'user','site.default.login','admin logged-in successfully.','24.90.173.42','2015-06-10 20:37:15'),(360,1,'building','site.organization.update','Updated Organization SOC001 successfully.','122.164.147.249','2015-06-10 22:19:13'),(361,1,'building','site.organization.update','Updated Organization SOC001 successfully.','122.164.147.249','2015-06-10 22:30:04'),(362,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-11 08:15:48'),(363,1,'user','site.default.login','admin logged-in successfully.','122.164.157.174','2015-06-12 01:04:58'),(364,1,'user','site.default.login','Admin logged-in successfully.','169.55.33.233','2015-06-12 02:53:03'),(365,1,'music','site.performeraccount.update','Updated Performer Jennifer Jeann successfully.','122.164.158.46','2015-06-12 04:58:08'),(366,1,'music','site.performeraccount.update','Updated Performer John Mac successfully.','122.164.158.46','2015-06-12 04:59:35'),(367,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','122.164.158.46','2015-06-12 04:59:39'),(368,1,'music','site.performeraccount.update','Updated Performer Harry P successfully.','122.164.158.46','2015-06-12 04:59:42'),(369,1,'music','site.performeraccount.update','Updated Performer Rovan Atkinson successfully.','122.164.158.46','2015-06-12 04:59:45'),(370,1,'money','site.produceraccount.update','Updated Producer ACOL Limited successfully.','122.164.28.164','2015-06-12 05:44:57'),(371,1,'money','site.produceraccount.update','Updated Producer BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:00'),(372,1,'money','site.produceraccount.update','Updated Producer ACOL Limited successfully.','122.164.28.164','2015-06-12 05:45:04'),(373,1,'money','site.produceraccount.update','Updated Producer BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:07'),(374,1,'microphone','site.publisheraccount.delete','Deleted Publisher ACOL Limited successfully.','122.164.28.164','2015-06-12 05:45:25'),(375,1,'microphone','site.publisheraccount.delete','Deleted Publisher BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:31'),(376,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-06-12 06:20:44'),(377,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','124.13.34.187','2015-06-12 06:27:34'),(378,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','124.13.34.187','2015-06-12 06:27:34'),(379,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','124.13.34.187','2015-06-12 06:28:31'),(380,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-06-12 06:29:11'),(381,1,'sliders','site.work.delete','Deleted Work successfully.','124.13.34.187','2015-06-12 06:33:49'),(382,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Nothing else matters successfully.','124.13.34.187','2015-06-12 06:34:46'),(383,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Nothing else matters successfully.','124.13.34.187','2015-06-12 06:34:46'),(384,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','124.13.34.187','2015-06-12 06:35:32'),(385,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-06-12 06:36:11'),(386,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','124.13.34.187','2015-06-12 06:36:49'),(387,1,'sliders','site.work.update','Saved Work Subtitle successfully.','124.13.34.187','2015-06-12 06:37:33'),(388,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','124.13.34.187','2015-06-12 06:39:40'),(389,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','124.13.34.187','2015-06-12 06:39:40'),(390,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','124.13.34.187','2015-06-12 06:42:16'),(391,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','124.13.34.187','2015-06-12 06:42:16'),(392,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-12 06:43:24'),(393,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-12 06:43:24'),(394,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','124.13.34.187','2015-06-12 06:44:16'),(395,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','124.13.34.187','2015-06-12 06:44:16'),(396,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','124.13.34.187','2015-06-12 06:45:03'),(397,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','124.13.34.187','2015-06-12 06:45:03'),(398,1,'institution','site.masterterritories.create','Created Territory AFGHANISTAN                                                                      successfully.','124.13.34.187','2015-06-12 06:48:16'),(399,1,'institution','site.masterterritories.create','Created Territory AFRICA                                                                           successfully.','124.13.34.187','2015-06-12 06:48:27'),(400,1,'institution','site.masterterritories.create','Created Territory ALBANIA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:40'),(401,1,'institution','site.masterterritories.create','Created Territory ALGERIA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:49'),(402,1,'institution','site.masterterritories.create','Created Territory AMERICA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:57'),(403,1,'institution','site.masterterritories.create','Created Territory AMERICAN CONTINENT                                                               successfully.','124.13.34.187','2015-06-12 06:49:08'),(404,1,'institution','site.masterterritories.create','Created Territory ANDORRA                                                                          successfully.','124.13.34.187','2015-06-12 06:49:16'),(405,1,'institution','site.masterterritories.create','Created Territory ANGOLA                                                                           successfully.','124.13.34.187','2015-06-12 06:49:23'),(406,1,'institution','site.masterterritories.create','Created Territory ANTIGUA AND BARBUDA                                                              successfully.','124.13.34.187','2015-06-12 06:49:33'),(407,1,'institution','site.masterterritories.create','Created Territory ANTILLES                                                                         successfully.','124.13.34.187','2015-06-12 06:49:43'),(408,1,'institution','site.masterterritories.create','Created Territory APEC COUNTRIES                                                                   successfully.','124.13.34.187','2015-06-12 06:49:52'),(409,1,'institution','site.masterterritories.create','Created Territory ARGENTINA                                                                        successfully.','124.13.34.187','2015-06-12 06:50:02'),(410,1,'institution','site.masterterritories.create','Created Territory ARMENIA                                                                          successfully.','124.13.34.187','2015-06-12 06:50:13'),(411,1,'institution','site.masterterritories.create','Created Territory ASEAN COUNTRIES                                                                  successfully.','124.13.34.187','2015-06-12 06:50:26'),(412,1,'institution','site.masterterritories.create','Created Territory ASIA  successfully.','124.13.34.187','2015-06-12 06:50:48'),(413,1,'institution','site.masterterritories.create','Created Territory AUSTRALASIA successfully.','124.13.34.187','2015-06-12 06:51:17'),(414,1,'institution','site.masterterritories.create','Created Territory AUSTRALIA                                                                        successfully.','124.13.34.187','2015-06-12 06:51:28'),(415,1,'institution','site.masterterritories.create','Created Territory AZERBAIJAN                                                                       successfully.','124.13.34.187','2015-06-12 06:51:37'),(416,1,'institution','site.masterterritories.create','Created Territory BAHAMAS                                                                          successfully.','124.13.34.187','2015-06-12 06:51:53'),(417,1,'institution','site.masterterritories.create','Created Territory BAHRAIN                                                                          successfully.','124.13.34.187','2015-06-12 06:52:01'),(418,1,'institution','site.masterterritories.create','Created Territory BALKANS                                                                          successfully.','124.13.34.187','2015-06-12 06:52:09'),(419,1,'institution','site.masterterritories.create','Created Territory BALTIC STATES                                                                    successfully.','124.13.34.187','2015-06-12 06:52:17'),(420,1,'institution','site.masterterritories.create','Created Territory BANGLADESH                                                                       successfully.','124.13.34.187','2015-06-12 06:52:26'),(421,1,'institution','site.masterterritories.create','Created Territory BARBADOS                                                                         successfully.','124.13.34.187','2015-06-12 06:52:40'),(422,1,'institution','site.masterterritories.create','Created Territory BELARUS                                                                          successfully.','124.13.34.187','2015-06-12 06:52:50'),(423,1,'institution','site.masterterritories.create','Created Territory BELGIUM                                                                          successfully.','124.13.34.187','2015-06-12 06:53:00'),(424,1,'institution','site.masterterritories.create','Created Territory BOSNIA AND HERZEGOVINA                                                           successfully.','124.13.34.187','2015-06-12 06:53:16'),(425,1,'institution','site.masterterritories.create','Created Territory BRITISH WEST INDIES                                                              successfully.','124.13.34.187','2015-06-12 06:53:27'),(426,1,'institution','site.masterterritories.create','Created Territory BRITISH WEST INDIES                                                              successfully.','124.13.34.187','2015-06-12 06:53:27'),(427,1,'institution','site.masterterritories.create','Created Territory BRITISH ISLES                                                                    successfully.','124.13.34.187','2015-06-12 06:53:35'),(428,1,'institution','site.masterterritories.create','Created Territory BRUNEI DARUSSALAM                                                                successfully.','124.13.34.187','2015-06-12 06:53:45'),(429,1,'institution','site.masterterritories.create','Created Territory BURKINA FASO                                                                     successfully.','124.13.34.187','2015-06-12 06:53:55'),(430,1,'institution','site.masterterritories.create','Created Territory CAMBODIA                                                                         successfully.','124.13.34.187','2015-06-12 06:54:10'),(431,1,'institution','site.masterterritories.create','Created Territory CAMEROON                                                                         successfully.','124.13.34.187','2015-06-12 06:54:17'),(432,1,'institution','site.masterterritories.create','Created Territory CANADA                                                                           successfully.','124.13.34.187','2015-06-12 06:54:24'),(433,1,'institution','site.masterterritories.create','Created Territory CAPE VERDE                                                                       successfully.','124.13.34.187','2015-06-12 06:54:37'),(434,1,'institution','site.masterterritories.create','Created Territory CENTRAL AFRICA REGION                                                            successfully.','124.13.34.187','2015-06-12 06:54:47'),(435,1,'institution','site.masterterritories.create','Created Territory CENTRAL AFRICAN REPUBLIC                                                         successfully.','124.13.34.187','2015-06-12 06:54:57'),(436,1,'institution','site.masterterritories.create','Created Territory CENTRAL AMERICA                                                                  successfully.','124.13.34.187','2015-06-12 06:55:10'),(437,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH                                                                     successfully.','124.13.34.187','2015-06-12 06:55:19'),(438,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH AFRICAN TERRITORIES                                                 successfully.','124.13.34.187','2015-06-12 06:55:35'),(439,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH ASIAN TERRITORIES                                                   successfully.','124.13.34.187','2015-06-12 06:55:52'),(440,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH AUSTRALASIAN TERRITORIES                                            successfully.','124.13.34.187','2015-06-12 06:56:03'),(441,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH OF INDEPENDENT STATES                                               successfully.','124.13.34.187','2015-06-12 06:56:11'),(442,1,'sliders','site.work.create','Created Work successfully.','202.188.40.103','2015-06-12 07:09:18'),(443,1,'sliders','site.work.update','Saved Work Documentation successfully.','202.188.40.103','2015-06-12 07:09:24'),(444,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:10:50'),(445,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:10:50'),(446,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:18:28'),(447,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:18:28'),(448,1,'volume-up','site.recording.create','Created Recording successfully.','202.188.40.103','2015-06-12 07:19:17'),(449,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','202.188.40.103','2015-06-12 07:19:55'),(450,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','202.188.40.103','2015-06-12 07:19:55'),(451,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','202.188.40.103','2015-06-12 07:27:47'),(452,1,'institution','site.masterterritories.create','Created Territory TAIWAN, PROVINCE OF CHINA                                                        successfully.','124.13.34.187','2015-06-12 07:33:30'),(453,1,'institution','site.masterterritories.create','Created Territory EQUATORIAL GUINEA                                                                successfully.','124.13.34.187','2015-06-12 07:33:47'),(454,1,'institution','site.masterterritories.create','Created Territory ETHIOPIA                                                                         successfully.','124.13.34.187','2015-06-12 07:43:20'),(455,1,'institution','site.masterterritories.create','Created Territory FRENCH POLYNESIA                                                                 successfully.','124.13.34.187','2015-06-12 07:43:49'),(456,1,'institution','site.masterterritories.create','Created Territory FINLAND                                                                          successfully.','124.13.34.187','2015-06-12 07:43:59'),(457,1,'institution','site.masterterritories.create','Created Territory FRANCE                                                                           successfully.','124.13.34.187','2015-06-12 07:44:26'),(458,1,'institution','site.masterterritories.create','Created Territory DJIBOUTI                                                                         successfully.','124.13.34.187','2015-06-12 07:44:36'),(459,1,'institution','site.masterterritories.create','Created Territory GABON                                                                            successfully.','124.13.34.187','2015-06-12 07:54:02'),(460,1,'institution','site.masterterritories.create','Created Territory GEORGIA                                                                          successfully.','124.13.34.187','2015-06-12 07:55:39'),(461,1,'institution','site.masterterritories.create','Created Territory GAMBIA                                                                           successfully.','124.13.34.187','2015-06-12 07:55:50'),(462,1,'institution','site.masterterritories.create','Created Territory GERMANY                                                                          successfully.','124.13.34.187','2015-06-12 07:55:58'),(463,1,'institution','site.masterterritories.create','Created Territory GERMAN DEMOCRATIC REPUBLIC                                                       successfully.','124.13.34.187','2015-06-12 07:56:08'),(464,1,'institution','site.masterterritories.create','Created Territory KIRIBATI                                                                            successfully.','124.13.34.187','2015-06-12 07:56:51'),(465,1,'institution','site.masterterritories.create','Created Territory GREECE                                                                           successfully.','124.13.34.187','2015-06-12 07:57:01'),(466,1,'institution','site.masterterritories.create','Created Territory GRENADA                                                                          successfully.','124.13.34.187','2015-06-12 07:57:09'),(467,1,'institution','site.masterterritories.create','Created Territory GUATEMALA                                                                        successfully.','124.13.34.187','2015-06-12 07:57:17'),(468,1,'institution','site.masterterritories.create','Created Territory HOLY SEE (VATICAN CITY STATE)                                                    successfully.','124.13.34.187','2015-06-12 07:57:29'),(469,1,'institution','site.masterterritories.create','Created Territory HONDURAS                                                                         successfully.','124.13.34.187','2015-06-12 07:57:37'),(470,1,'institution','site.masterterritories.create','Created Territory HONG KONG                                                                        successfully.','124.13.34.187','2015-06-12 07:57:44'),(471,1,'institution','site.masterterritories.create','Created Territory HUNGARY                                                                          successfully.','124.13.34.187','2015-06-12 07:57:52'),(472,1,'institution','site.masterterritories.create','Created Territory ICELAND                                                                          successfully.','124.13.34.187','2015-06-12 07:57:59'),(473,1,'institution','site.masterterritories.create','Created Territory INDIA                                                                            successfully.','124.13.34.187','2015-06-12 07:58:07'),(474,1,'institution','site.masterterritories.create','Created Territory INDONESIA                                                                        successfully.','124.13.34.187','2015-06-12 07:58:27'),(475,1,'institution','site.masterterritories.create','Created Territory IRAN, ISLAMIC REPUBLIC OF                                                        successfully.','124.13.34.187','2015-06-12 07:58:36'),(476,1,'institution','site.masterterritories.create','Created Territory IRAQ                                                                             successfully.','124.13.34.187','2015-06-12 07:59:10'),(477,1,'institution','site.masterterritories.create','Created Territory IRELAND                                                                          successfully.','124.13.34.187','2015-06-12 07:59:18'),(478,1,'institution','site.masterterritories.create','Created Territory ISRAEL                                                                           successfully.','124.13.34.187','2015-06-12 07:59:26'),(479,1,'institution','site.masterterritories.create','Created Territory ITALY                                                                            successfully.','124.13.34.187','2015-06-12 07:59:34'),(480,1,'institution','site.masterterritories.create','Created Territory COTE D\'IVOIRE                                                                    successfully.','124.13.34.187','2015-06-12 07:59:42'),(481,1,'institution','site.masterterritories.create','Created Territory JAMAICA                                                                          successfully.','124.13.34.187','2015-06-12 07:59:53'),(482,1,'institution','site.masterterritories.create','Created Territory JAPAN                                                                            successfully.','124.13.34.187','2015-06-12 08:00:02'),(483,1,'institution','site.masterterritories.create','Created Territory KAZAKSTAN                                                                        successfully.','124.13.34.187','2015-06-12 08:00:10'),(484,1,'institution','site.masterterritories.create','Created Territory JORDAN                                                                           successfully.','124.13.34.187','2015-06-12 08:00:18'),(485,1,'institution','site.masterterritories.create','Created Territory KENYA                                                                            successfully.','124.13.34.187','2015-06-12 08:00:26'),(486,1,'institution','site.masterterritories.create','Created Territory KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF                                           successfully.','124.13.34.187','2015-06-12 08:00:34'),(487,1,'institution','site.masterterritories.create','Created Territory KUWAIT                                                                           successfully.','124.13.34.187','2015-06-12 08:00:47'),(488,1,'institution','site.masterterritories.create','Created Territory KYRGYZSTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:00:57'),(489,1,'institution','site.masterterritories.create','Created Territory LAO PEOPLE\'S DEMOCRATIC REPUBLIC                                                 successfully.','124.13.34.187','2015-06-12 08:01:49'),(490,1,'institution','site.masterterritories.create','Created Territory LEBANON                                                                          successfully.','124.13.34.187','2015-06-12 08:01:57'),(491,1,'institution','site.masterterritories.create','Created Territory LESOTHO                                                                          successfully.','124.13.34.187','2015-06-12 08:02:05'),(492,1,'institution','site.masterterritories.create','Created Territory LIBERIA                                                                          successfully.','124.13.34.187','2015-06-12 08:02:13'),(493,1,'institution','site.masterterritories.create','Created Territory LIBYAN ARAB JAMAHIRIYA                                                           successfully.','124.13.34.187','2015-06-12 08:10:32'),(494,1,'institution','site.masterterritories.create','Created Territory LIECHTENSTEIN                                                                    successfully.','124.13.34.187','2015-06-12 08:10:40'),(495,1,'institution','site.masterterritories.create','Created Territory LUXEMBOURG                                                                       successfully.','124.13.34.187','2015-06-12 08:10:49'),(496,1,'institution','site.masterterritories.create','Created Territory MADAGASCAR                                                                       successfully.','124.13.34.187','2015-06-12 08:10:58'),(497,1,'institution','site.masterterritories.create','Created Territory MALAWI                                                                           successfully.','124.13.34.187','2015-06-12 08:11:06'),(498,1,'institution','site.masterterritories.create','Created Territory MALAYSIA                                                                         successfully.','124.13.34.187','2015-06-12 08:11:13'),(499,1,'institution','site.masterterritories.create','Created Territory MALDIVES                                                                         successfully.','124.13.34.187','2015-06-12 08:11:19'),(500,1,'institution','site.masterterritories.create','Created Territory MALI                                                                             successfully.','124.13.34.187','2015-06-12 08:12:44'),(501,1,'institution','site.masterterritories.create','Created Territory MAURITANIA                                                                       successfully.','124.13.34.187','2015-06-12 08:13:07'),(502,1,'institution','site.masterterritories.create','Created Territory MAURITIUS                                                                        successfully.','124.13.34.187','2015-06-12 08:13:16'),(503,1,'institution','site.masterterritories.create','Created Territory MEXICO                                                                           successfully.','124.13.34.187','2015-06-12 08:13:25'),(504,1,'institution','site.masterterritories.create','Created Territory MOLDOVA, REPUBLIC OF                                                             successfully.','124.13.34.187','2015-06-12 08:13:35'),(505,1,'institution','site.masterterritories.create','Created Territory MOZAMBIQUE                                                                       successfully.','124.13.34.187','2015-06-12 08:13:44'),(506,1,'institution','site.masterterritories.create','Created Territory NETHERLANDS                                                                      successfully.','124.13.34.187','2015-06-12 08:13:54'),(507,1,'institution','site.masterterritories.create','Created Territory NEPAL                                                                            successfully.','124.13.34.187','2015-06-12 08:14:02'),(508,1,'institution','site.masterterritories.create','Created Territory VANUATU                                                                          successfully.','124.13.34.187','2015-06-12 08:14:10'),(509,1,'institution','site.masterterritories.create','Created Territory NEW ZEALAND                                                                      successfully.','124.13.34.187','2015-06-12 08:14:16'),(510,1,'institution','site.masterterritories.create','Created Territory NICARAGUA                                                                        successfully.','124.13.34.187','2015-06-12 08:14:24'),(511,1,'institution','site.masterterritories.create','Created Territory NIGER                                                                            successfully.','124.13.34.187','2015-06-12 08:14:32'),(512,1,'institution','site.masterterritories.create','Created Territory NIGERIA                                                                          successfully.','124.13.34.187','2015-06-12 08:14:40'),(513,1,'institution','site.masterterritories.create','Created Territory MICRONESIA, FEDERATED STATES OF                                                  successfully.','124.13.34.187','2015-06-12 08:14:53'),(514,1,'institution','site.masterterritories.create','Created Territory NORWAY                                                                           successfully.','124.13.34.187','2015-06-12 08:15:00'),(515,1,'institution','site.masterterritories.create','Created Territory MARSHALL ISLANDS                                                                 successfully.','124.13.34.187','2015-06-12 08:15:08'),(516,1,'institution','site.masterterritories.create','Created Territory PAKISTAN                                                                         successfully.','124.13.34.187','2015-06-12 08:15:15'),(517,1,'institution','site.masterterritories.create','Created Territory PANAMA                                                                           successfully.','124.13.34.187','2015-06-12 08:15:23'),(518,1,'institution','site.masterterritories.create','Created Territory PAPUA NEW GUINEA                                                                 successfully.','124.13.34.187','2015-06-12 08:15:30'),(519,1,'institution','site.masterterritories.create','Created Territory PARAGUAY                                                                         successfully.','124.13.34.187','2015-06-12 08:15:37'),(520,1,'institution','site.masterterritories.create','Created Territory PERU                                                                             successfully.','124.13.34.187','2015-06-12 08:15:45'),(521,1,'institution','site.masterterritories.create','Created Territory PHILIPPINES                                                                      successfully.','124.13.34.187','2015-06-12 08:15:51'),(522,1,'institution','site.masterterritories.create','Created Territory POLAND                                                                           successfully.','124.13.34.187','2015-06-12 08:15:58'),(523,1,'institution','site.masterterritories.create','Created Territory PORTUGAL                                                                         successfully.','124.13.34.187','2015-06-12 08:16:04'),(524,1,'institution','site.masterterritories.create','Created Territory GUINEA-BISSAU                                                                    successfully.','124.13.34.187','2015-06-12 08:16:10'),(525,1,'institution','site.masterterritories.create','Created Territory PUERTO RICO                                                                      successfully.','124.13.34.187','2015-06-12 08:16:18'),(526,1,'institution','site.masterterritories.create','Created Territory QATAR                                                                            successfully.','124.13.34.187','2015-06-12 08:16:29'),(527,1,'institution','site.masterterritories.create','Created Territory ROMANIA                                                                          successfully.','124.13.34.187','2015-06-12 08:16:35'),(528,1,'institution','site.masterterritories.create','Created Territory RUSSIAN FEDERATION                                                               successfully.','124.13.34.187','2015-06-12 08:16:44'),(529,1,'institution','site.masterterritories.create','Created Territory RWANDA                                                                           successfully.','124.13.34.187','2015-06-12 08:16:54'),(530,1,'institution','site.masterterritories.create','Created Territory SAINT KITTS AND NEVIS                                                            successfully.','124.13.34.187','2015-06-12 08:17:28'),(531,1,'institution','site.masterterritories.create','Created Territory SAINT LUCIA                                                                      successfully.','124.13.34.187','2015-06-12 08:17:35'),(532,1,'institution','site.masterterritories.create','Created Territory SAINT VINCENT AND THE GRENADINES                                                 successfully.','124.13.34.187','2015-06-12 08:17:54'),(533,1,'institution','site.masterterritories.create','Created Territory SAO TOME AND PRINCIPE                                                            successfully.','124.13.34.187','2015-06-12 08:18:22'),(534,1,'institution','site.masterterritories.create','Created Territory SAUDI ARABIA                                                                     successfully.','124.13.34.187','2015-06-12 08:20:32'),(535,1,'institution','site.masterterritories.create','Created Territory SENEGAL                                                                          successfully.','124.13.34.187','2015-06-12 08:20:41'),(536,1,'institution','site.masterterritories.create','Created Territory SIERRA LEONE                                                                     successfully.','124.13.34.187','2015-06-12 08:21:23'),(537,1,'institution','site.masterterritories.create','Created Territory SINGAPORE                                                                        successfully.','124.13.34.187','2015-06-12 08:21:31'),(538,1,'institution','site.masterterritories.create','Created Territory SLOVAKIA                                                                         successfully.','124.13.34.187','2015-06-12 08:21:39'),(539,1,'institution','site.masterterritories.create','Created Territory VIET NAM                                                                         successfully.','124.13.34.187','2015-06-12 08:21:48'),(540,1,'institution','site.masterterritories.create','Created Territory SOMALIA                                                                          successfully.','124.13.34.187','2015-06-12 08:21:58'),(541,1,'institution','site.masterterritories.create','Created Territory SOUTH AFRICA                                                                     successfully.','124.13.34.187','2015-06-12 08:22:05'),(542,1,'institution','site.masterterritories.create','Created Territory ZIMBABWE                                                                         successfully.','124.13.34.187','2015-06-12 08:22:13'),(543,1,'institution','site.masterterritories.create','Created Territory YEMEN, DEMOCRATIC                                                                successfully.','124.13.34.187','2015-06-12 08:22:20'),(544,1,'institution','site.masterterritories.create','Created Territory SPAIN                                                                            successfully.','124.13.34.187','2015-06-12 08:22:27'),(545,1,'institution','site.masterterritories.create','Created Territory WESTERN SAHARA                                                                   successfully.','124.13.34.187','2015-06-12 08:22:33'),(546,1,'institution','site.masterterritories.create','Created Territory SUDAN                                                                            successfully.','124.13.34.187','2015-06-12 08:22:40'),(547,1,'institution','site.masterterritories.create','Created Territory SWAZILAND                                                                        successfully.','124.13.34.187','2015-06-12 08:22:50'),(548,1,'institution','site.masterterritories.create','Created Territory SWEDEN                                                                           successfully.','124.13.34.187','2015-06-12 08:22:58'),(549,1,'institution','site.masterterritories.create','Created Territory SWITZERLAND                                                                      successfully.','124.13.34.187','2015-06-12 08:23:05'),(550,1,'institution','site.masterterritories.create','Created Territory SYRIAN ARAB REPUBLIC                                                             successfully.','124.13.34.187','2015-06-12 08:23:14'),(551,1,'institution','site.masterterritories.create','Created Territory TAJIKISTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:23:21'),(552,1,'institution','site.masterterritories.create','Created Territory THAILAND                                                                         successfully.','124.13.34.187','2015-06-12 08:23:29'),(553,1,'institution','site.masterterritories.create','Created Territory TRINIDAD AND TOBAGO                                                              successfully.','124.13.34.187','2015-06-12 08:23:40'),(554,1,'institution','site.masterterritories.create','Created Territory UNITED ARAB EMIRATES                                                             successfully.','124.13.34.187','2015-06-12 08:23:49'),(555,1,'institution','site.masterterritories.create','Created Territory TUNISIA                                                                          successfully.','124.13.34.187','2015-06-12 08:23:57'),(556,1,'institution','site.masterterritories.create','Created Territory TURKEY                                                                           successfully.','124.13.34.187','2015-06-12 08:24:05'),(557,1,'institution','site.masterterritories.create','Created Territory TURKMENISTAN                                                                     successfully.','124.13.34.187','2015-06-12 08:24:38'),(558,1,'institution','site.masterterritories.create','Created Territory UGANDA                                                                           successfully.','124.13.34.187','2015-06-12 08:24:48'),(559,1,'institution','site.masterterritories.create','Created Territory UKRAINE                                                                          successfully.','124.13.34.187','2015-06-12 08:24:56'),(560,1,'institution','site.masterterritories.create','Created Territory MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF                                       successfully.','124.13.34.187','2015-06-12 08:25:02'),(561,1,'institution','site.masterterritories.create','Created Territory EGYPT                                                                            successfully.','124.13.34.187','2015-06-12 08:25:13'),(562,1,'institution','site.masterterritories.create','Created Territory UNITED KINGDOM                                                                   successfully.','124.13.34.187','2015-06-12 08:25:19'),(563,1,'institution','site.masterterritories.create','Created Territory TANZANIA, UNITED REPUBLIC OF                                                     successfully.','124.13.34.187','2015-06-12 08:25:27'),(564,1,'institution','site.masterterritories.create','Created Territory UNITED STATES                                                                    successfully.','124.13.34.187','2015-06-12 08:25:35'),(565,1,'institution','site.masterterritories.create','Created Territory BURKINA FASO                                                                     successfully.','124.13.34.187','2015-06-12 08:25:42'),(566,1,'institution','site.masterterritories.create','Created Territory URUGUAY                                                                          successfully.','124.13.34.187','2015-06-12 08:25:53'),(567,1,'institution','site.masterterritories.create','Created Territory UZBEKISTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:26:00'),(568,1,'institution','site.masterterritories.create','Created Territory VENEZUELA                                                                        successfully.','124.13.34.187','2015-06-12 08:26:08'),(569,1,'institution','site.masterterritories.create','Created Territory SAMOA                                                                            successfully.','124.13.34.187','2015-06-12 08:26:14'),(570,1,'institution','site.masterterritories.create','Created Territory YUGOSLAVIA (0890)                                                                successfully.','124.13.34.187','2015-06-12 08:26:26'),(571,1,'institution','site.masterterritories.create','Created Territory ZAMBIA                                                                           successfully.','124.13.34.187','2015-06-12 08:26:33'),(572,1,'institution','site.masterterritories.create','Created Territory WEST AFRICA REGION                                                               successfully.','124.13.34.187','2015-06-12 08:27:07'),(573,1,'institution','site.masterterritories.create','Created Territory WEST INDIES                                                                      successfully.','124.13.34.187','2015-06-12 08:27:17'),(574,1,'institution','site.masterterritories.create','Created Territory SOUTH EAST ASIA                                                                  successfully.','124.13.34.187','2015-06-12 08:27:25'),(575,1,'institution','site.masterterritories.create','Created Territory SOUTH AMERICA                                                                    successfully.','124.13.34.187','2015-06-12 08:27:38'),(576,1,'institution','site.masterterritories.create','Created Territory SCANDINAVIA                                                                      successfully.','124.13.34.187','2015-06-12 08:27:49'),(577,1,'institution','site.masterterritories.create','Created Territory OCEANIA                                                                          successfully.','124.13.34.187','2015-06-12 08:27:57'),(578,1,'institution','site.masterterritories.create','Created Territory NORTH AMERICA                                                                    successfully.','124.13.34.187','2015-06-12 08:28:04'),(579,1,'institution','site.masterterritories.create','Created Territory NORTH AFRICA                                                                     successfully.','124.13.34.187','2015-06-12 08:28:11'),(580,1,'institution','site.masterterritories.create','Created Territory NORDIC COUNTRIES                                                                 successfully.','124.13.34.187','2015-06-12 08:28:18'),(581,1,'institution','site.masterterritories.create','Created Territory NAFTA COUNTRIES                                                                  successfully.','124.13.34.187','2015-06-12 08:28:25'),(582,1,'institution','site.masterterritories.create','Created Territory MIDDLE EAST                                                                      successfully.','124.13.34.187','2015-06-12 08:28:33'),(583,1,'institution','site.masterterritories.create','Created Territory GSA COUNTRIES                                                                    successfully.','124.13.34.187','2015-06-12 08:28:40'),(584,1,'institution','site.masterterritories.create','Created Territory EUROPEAN UNION                                                                   successfully.','124.13.34.187','2015-06-12 08:28:46'),(585,1,'institution','site.masterterritories.create','Created Territory EUROPEAN ECONOMIC COMMUNITY                                                      successfully.','124.13.34.187','2015-06-12 08:28:53'),(586,1,'institution','site.masterterritories.create','Created Territory EUROPEAN CONTINENT                                                               successfully.','124.13.34.187','2015-06-12 08:29:04'),(587,1,'institution','site.masterterritories.create','Created Territory EUROPEAN ECONOMIC AREA                                                           successfully.','124.13.34.187','2015-06-12 08:29:13'),(588,1,'institution','site.masterterritories.create','Created Territory EASTERN EUROPE                                                                   successfully.','124.13.34.187','2015-06-12 08:29:22'),(589,1,'institution','site.masterterritories.create','Created Territory SOUTH AFRICA REGION                                                              successfully.','124.13.34.187','2015-06-12 08:30:01'),(590,1,'institution','site.masterterritories.create','Created Territory EAST AFRICA REGION                                                               successfully.','124.13.34.187','2015-06-12 08:30:22'),(591,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-12 08:32:03'),(592,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),(593,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),(594,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),(595,1,'user','site.default.login','Admin logged-in successfully.','121.121.108.72','2015-06-12 20:56:21'),(596,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),(597,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),(598,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),(599,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),(600,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),(601,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),(602,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),(603,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),(604,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),(605,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:06'),(606,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:06'),(607,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),(608,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),(609,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),(610,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),(611,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),(612,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),(613,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),(614,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),(615,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),(616,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),(617,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),(618,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),(619,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),(620,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),(621,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),(622,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),(623,1,'user','site.authoraccount.update','Updated Robertt  Kiyosaki AuthorAccount successfully.','122.164.196.219','2015-06-12 21:40:51'),(624,1,'user','site.default.logout','admin logged-out successfully.','122.164.196.219','2015-06-12 21:41:22'),(625,1,'user','site.default.login','admin logged-in successfully.','122.164.196.219','2015-06-12 22:16:10'),(626,1,'sliders','site.work.create','Created Work successfully.','121.121.108.72','2015-06-12 22:34:40'),(627,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.108.72','2015-06-12 22:35:33'),(628,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test Factor successfully.','121.121.108.72','2015-06-12 22:36:04'),(629,1,'volume-up','site.recording.create','Created Recording successfully.','121.121.108.72','2015-06-12 22:37:01'),(630,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Test Grid successfully.','121.121.108.72','2015-06-12 22:37:39'),(631,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Test Grid successfully.','121.121.108.72','2015-06-12 22:37:39'),(632,1,'at','site.mastertyperights.update','Updated Type of Right Performer successfully.','121.121.108.72','2015-06-12 22:38:18'),(633,1,'at','site.mastertyperights.update','Updated Type of Right Guest Singers, Musicians or Supporting Actor successfully.','121.121.108.72','2015-06-12 22:38:34'),(634,1,'at','site.mastertyperights.update','Updated Type of Right Soloist, Lead Singer successfully.','121.121.108.72','2015-06-12 22:39:11'),(635,1,'at','site.mastertyperights.update','Updated Type of Right Other Musicians and Perfomers successfully.','121.121.108.72','2015-06-12 22:39:31'),(636,1,'sliders','site.work.create','Created Work successfully.','121.121.108.72','2015-06-13 01:09:45'),(637,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.108.72','2015-06-13 01:15:53'),(638,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Yellow Tree successfully.','121.121.108.72','2015-06-13 01:22:37'),(639,1,'user','site.default.login','Admin logged-in successfully.','175.139.245.142','2015-06-15 01:41:41'),(640,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(641,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(642,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(643,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(644,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(645,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),(646,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-17 23:55:00'),(647,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 00:09:08'),(648,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-18 00:16:11'),(649,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),(650,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),(651,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),(652,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:20:48'),(653,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:20:48'),(654,1,'sliders','site.work.update','Saved Work Publishing successfully.','122.164.150.61','2015-06-17 18:21:09'),(655,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),(656,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),(657,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),(658,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:22:01'),(659,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:22:01'),(660,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),(661,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),(662,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),(663,1,'user','site.default.login','admin logged-in successfully.','118.101.75.158','2015-06-17 19:54:30'),(664,1,'sliders','site.work.update','Saved Work Publishing successfully.','118.101.75.158','2015-06-17 20:10:04'),(665,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),(666,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),(667,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),(668,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),(669,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),(670,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),(671,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),(672,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),(673,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),(674,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),(675,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),(676,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),(677,1,'at','site.mastertyperights.update','Updated Type of Right Sub- Publisher successfully.','121.121.109.252','2015-06-18 08:07:57'),(678,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),(679,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),(680,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),(681,1,'at','site.mastertyperights.delete','Deleted Type of Right Administrator successfully.','121.121.109.252','2015-06-18 08:10:00'),(682,1,'at','site.mastertyperights.delete','Deleted Type of Right Actor successfully.','121.121.109.252','2015-06-18 08:10:45'),(683,1,'at','site.mastertyperights.delete','Deleted Type of Right Graphic designer successfully.','121.121.109.252','2015-06-18 08:10:49'),(684,1,'at','site.mastertyperights.delete','Deleted Type of Right Analyst/Programmer successfully.','121.121.109.252','2015-06-18 08:10:54'),(685,1,'at','site.mastertyperights.delete','Deleted Type of Right Author of screen play/Author of dialogue successfully.','121.121.109.252','2015-06-18 08:11:00'),(686,1,'at','site.mastertyperights.update','Updated Type of Right Sub-Author successfully.','121.121.109.252','2015-06-18 08:11:55'),(687,1,'at','site.mastertyperights.update','Updated Type of Right Sub-Arranger successfully.','121.121.109.252','2015-06-18 08:12:29'),(688,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 08:12:38'),(689,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-18 08:12:51'),(690,1,'at','site.mastertyperights.update','Updated Type of Right Lyricist successfully.','121.121.109.252','2015-06-18 08:13:07'),(691,1,'at','site.mastertyperights.create','Created Type of Right Adapter / Translator successfully.','121.121.109.252','2015-06-18 08:14:06'),(692,1,'at','site.mastertyperights.create','Created Type of Right Music Publisher successfully.','121.121.109.252','2015-06-18 08:14:56'),(693,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','121.121.109.252','2015-06-18 08:21:43'),(694,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','121.121.109.252','2015-06-18 08:21:43'),(695,1,'at','site.mastertyperights.delete','Deleted Type of Right Producer successfully.','121.121.109.252','2015-06-18 08:22:27'),(696,1,'at','site.mastertyperights.delete','Deleted Type of Right Producer successfully.','121.121.109.252','2015-06-18 08:22:31'),(697,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 2 successfully.','121.121.109.252','2015-06-18 08:23:52'),(698,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 15 successfully.','121.121.109.252','2015-06-18 08:24:14'),(699,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 17 successfully.','121.121.109.252','2015-06-18 08:25:55'),(700,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','121.121.109.252','2015-06-18 08:26:33'),(701,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','121.121.109.252','2015-06-18 08:26:33'),(702,1,'music','site.performeraccount.create','Created Performer Hetfield James successfully.','121.121.109.252','2015-06-18 08:27:05'),(703,1,'music','site.performeraccount.update','Updated Performer Related Rights Hetfield James successfully.','121.121.109.252','2015-06-18 08:27:54'),(704,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','121.121.109.252','2015-06-18 08:28:38'),(705,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','121.121.109.252','2015-06-18 08:28:38'),(706,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','121.121.109.252','2015-06-18 08:29:11'),(707,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','121.121.109.252','2015-06-18 08:29:11'),(708,1,'volume-up','site.recording.delete','Deleted Recording successfully.','121.121.109.252','2015-06-18 08:29:20'),(709,1,'music','site.performeraccount.create','Created Performer Will Smith successfully.','121.121.109.252','2015-06-18 08:29:41'),(710,1,'music','site.performeraccount.update','Updated Performer Related Rights Will Smith successfully.','121.121.109.252','2015-06-18 08:30:06'),(711,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','121.121.109.252','2015-06-18 08:34:20'),(712,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','121.121.109.252','2015-06-18 08:34:20'),(713,1,'sliders','site.work.update','Updated Work successfully.','121.121.109.252','2015-06-18 08:34:36'),(714,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.109.252','2015-06-18 08:34:44'),(715,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','121.121.109.252','2015-06-18 08:35:31'),(716,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:35:52'),(717,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:35:57'),(718,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:03'),(719,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:07'),(720,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:14'),(721,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:17'),(722,1,'sliders','site.work.create','Created Work successfully.','121.121.109.252','2015-06-18 08:36:53'),(723,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.109.252','2015-06-18 08:36:58'),(724,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Old McDonalds successfully.','121.121.109.252','2015-06-18 08:37:43'),(725,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Old McDonalds successfully.','121.121.109.252','2015-06-18 08:37:43'),(726,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:08'),(727,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:08'),(728,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:22'),(729,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:22'),(730,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','175.139.236.111','2015-06-18 09:17:34'),(731,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','175.139.236.111','2015-06-18 09:17:34'),(732,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),(733,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),(734,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),(735,1,'sliders','site.work.update','Saved Work Publishing successfully.','175.139.236.111','2015-06-18 09:50:24'),(736,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 09:55:47'),(737,1,'user','site.default.login','Admin logged-in successfully.','118.100.80.230','2015-06-18 17:28:00'),(738,1,'user','site.authoraccount.create','Created a A  S successfully.','118.100.80.230','2015-06-18 17:33:19'),(739,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','118.100.80.230','2015-06-18 18:00:59'),(740,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','118.100.80.230','2015-06-18 18:00:59'),(741,1,'sliders','site.work.update','Saved Work Publishing successfully.','118.100.80.230','2015-06-18 18:12:17'),(742,1,'user','site.default.login','admin logged-in successfully.','122.164.186.175','2015-06-18 20:02:20'),(743,1,'user','site.default.logout','admin logged-out successfully.','118.101.75.158','2015-06-18 20:29:52'),(813,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:15:56'),(814,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:15:56'),(815,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 12:18:46'),(816,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),(817,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),(818,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),(819,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:23:08'),(820,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:23:08'),(821,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),(822,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),(823,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),(824,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 12:59:40'),(825,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:00:01'),(826,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:00:43'),(827,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:02:11'),(828,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:19:25'),(829,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','127.0.0.1','2015-06-22 13:20:43'),(830,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','127.0.0.1','2015-06-22 14:02:05'),(831,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:10:31'),(832,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:10:38'),(833,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:11:45'),(834,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:13:53'),(835,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-06-22 15:36:56'),(836,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000100 successfully.','127.0.0.1','2015-06-22 15:43:31'),(837,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000101 successfully.','127.0.0.1','2015-06-22 15:44:15'),(838,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 16:23:55'),(839,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:41:39'),(840,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:50:23'),(841,1,'user','site.authoraccount.update','Updated John  Mac Document saved successfully.','127.0.0.1','2015-06-22 17:54:43'),(842,1,'user','site.authoraccount.update','Updated John  Mac Document saved successfully.','127.0.0.1','2015-06-22 17:54:55'),(843,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:58:36'),(844,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:11:14'),(845,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:11:50'),(846,1,'user','site.authoraccount.create','Created a Vincent  Raj successfully.','127.0.0.1','2015-06-22 18:13:48'),(847,1,'music','site.performeraccount.create','Created Performer Mary Jean successfully.','127.0.0.1','2015-06-22 18:16:43'),(848,1,'microphone','site.publisheraccount.create','Created Publisher Man Power Tech successfully.','127.0.0.1','2015-06-22 18:17:32'),(849,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 18:18:54'),(850,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 18:19:27'),(851,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),(852,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),(853,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),(854,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:24:46'),(855,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:26:24'),(856,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:26:44'),(857,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:26:51'),(858,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:27:37'),(859,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:27:43'),(860,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:45'),(861,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:50'),(862,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),(863,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),(864,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),(865,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),(866,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:41:55'),(867,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:41:57'),(868,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:01'),(869,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:05'),(870,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:47'),(871,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:43:16'),(872,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:45:42'),(873,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:46:40'),(874,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:46:45'),(875,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:51:48'),(876,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:59:04'),(877,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:59:51'),(878,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 19:04:37'),(879,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-23 10:53:06'),(880,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-23 10:53:55'),(881,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Exclusive rights successfully.','127.0.0.1','2015-06-23 10:54:32'),(882,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Equitable Remuneration successfully.','127.0.0.1','2015-06-23 10:54:44'),(883,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Neighboring Rights successfully.','127.0.0.1','2015-06-23 10:54:51'),(884,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Exclusive rights successfully.','127.0.0.1','2015-06-23 10:55:00'),(885,1,'copyright','site.mastermanagedrights.create','Created Master Manage Rights B successfully.','127.0.0.1','2015-06-23 11:11:12'),(886,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights B successfully.','127.0.0.1','2015-06-23 11:11:20'),(887,1,'user','site.authoraccount.update','Updated John  Mac Managed Rights successfully.','127.0.0.1','2015-06-23 11:11:40'),(888,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-23 11:50:50'),(889,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-23 11:50:55'),(890,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-23 11:58:30'),(891,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-23 11:58:36'),(892,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 12:08:50'),(893,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 14:10:42'),(894,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 14:13:30'),(895,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 15:15:37'),(896,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:04:04'),(897,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:05:14'),(898,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:11:18'),(899,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 16:52:35'),(900,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 16:52:41'),(901,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:10:12'),(902,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:24:44'),(903,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:37:16'),(904,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:37:30'),(905,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:37:34'),(906,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:38:01'),(907,1,'user','site.performeraccount.update','Updated Jennifer  Jeann Managed Rights successfully.','127.0.0.1','2015-06-23 17:44:27'),(908,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 17:51:33'),(909,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 17:53:28'),(910,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:11'),(911,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:41'),(912,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:46'),(913,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:01:18'),(914,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:01:24'),(915,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:26'),(916,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:31'),(917,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:35'),(918,1,'cron','site.cron.cron','Cron Ru','0','2015-06-23 19:01:50'),(919,1,'cron','site.default.dailycron','Cron Run at 2015-06-23 15:37:03','127.0.0.1','2015-06-23 19:07:03'),(920,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-24 10:22:11'),(921,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-24 10:22:26'),(922,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-24 10:50:38'),(923,1,'user','site.authoraccount.create','Created a Vinod  Kumar successfully.','127.0.0.1','2015-06-24 11:00:52'),(924,1,'user','site.authoraccount.update','Updated Vinod  Kumar Biography successfully.','127.0.0.1','2015-06-24 11:01:05'),(925,1,'user','site.authoraccount.update','Updated Vinod  Kumar Biography successfully.','127.0.0.1','2015-06-24 11:01:09'),(926,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:04:31'),(927,1,'user','site.authoraccount.update','Updated Rajesh  Raj Managed Rights successfully.','127.0.0.1','2015-06-24 11:04:37'),(928,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:04:46'),(929,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:04:53'),(930,1,'music','site.authoraccount.update','Updated Performer Related Rights Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:05:11'),(931,1,'user','site.authoraccount.delete','Deleted a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:06:19'),(932,1,'user','site.authoraccount.delete','Deleted a Vinod  Kumar successfully.','127.0.0.1','2015-06-24 11:06:23'),(933,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:06:40'),(934,1,'user','site.authoraccount.update','Updated Rajesh  Raj Managed Rights successfully.','127.0.0.1','2015-06-24 11:06:44'),(935,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:06:52'),(936,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:06:59'),(937,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:07:34'),(938,1,'user','site.authoraccount.delete','Deleted a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:08:53'),(939,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:09:05'),(940,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:09:13'),(941,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:09:24'),(942,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:09:47'),(943,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:00'),(944,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:05'),(945,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:09'),(946,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:12'),(947,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:10:30'),(948,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:17:49'),(949,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:27:46'),(950,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:28:40'),(951,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:30:05'),(952,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:30:38'),(953,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:33:39'),(954,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:34:12'),(955,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:37:00'),(956,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:41:37'),(957,1,'music','site.performeraccount.create','Created Performer Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:05'),(958,1,'music','site.performeraccount.update','Updated Performer Related Rights Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:11'),(959,1,'music','site.performeraccount.update','Updated Performer Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:35'),(960,1,'music','site.performeraccount.update','Updated Performer Related Rights Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:46:12'),(961,1,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-06-24 11:47:09'),(962,1,'music','site.performeraccount.update','Updated Performer Related Rights Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:48:14'),(963,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:49:09'),(964,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:51:05'),(965,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:52:11'),(966,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:54:32'),(967,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:56:08'),(968,1,'user','site.authoraccount.update','Updated Jeanne  Raison Managed Rights successfully.','127.0.0.1','2015-06-24 11:56:34'),(969,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),(970,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),(971,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),(972,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),(973,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','127.0.0.1','2015-06-24 12:20:02'),(974,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:21:06'),(975,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:23:11'),(976,1,'user','site.publisheraccount.biofiledelete','Deleted a Biography file from ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:00'),(977,1,'user','site.publisheraccount.biofiledelete','Deleted a Biography file from ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:08'),(978,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:25'),(979,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 13:00:32'),(980,1,'user','site.produceraccount.biofiledelete','Deleted a Biography file from ABM Limited successfully.','127.0.0.1','2015-06-24 13:02:46'),(981,1,'user','site.produceraccount.biofiledelete','Deleted a Biography file from ABM Limited successfully.','127.0.0.1','2015-06-24 13:02:58'),(982,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 13:04:26'),(983,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-06-24 13:10:59'),(984,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:12:38'),(985,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:13:19'),(986,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:15:01'),(987,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 13:18:38'),(988,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:20:43'),(989,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:10'),(990,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:16'),(991,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:48'),(992,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:52'),(993,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-06-24 13:34:18'),(994,1,'user','site.publishergroup.biofiledelete','Deleted a Biography file from Corporate name successfully.','127.0.0.1','2015-06-24 13:37:32'),(995,1,'users','site.group.update','Biography Saved on Author Group 2 successfully.','127.0.0.1','2015-06-24 13:37:52'),(996,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 2 successfully.','127.0.0.1','2015-06-24 13:37:57'),(997,1,'users','site.group.update','Biography Saved on Author Group 2 successfully.','127.0.0.1','2015-06-24 13:39:22'),(998,1,'users','site.group.update','Biography Saved on test performer group successfully.','127.0.0.1','2015-06-24 13:40:16'),(999,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-24 13:42:08'),(1000,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:48:43'),(1001,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-24 13:51:31'),(1002,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-24 13:51:48'),(1003,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 13:52:06'),(1004,1,'money','site.produceraccount.update','Updated Producer Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 13:52:27'),(1005,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:52:43'),(1006,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-06-24 13:52:56'),(1007,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:00:53'),(1008,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:01:00'),(1009,1,'microphone','site.publisheraccount.update','Updated Publisher Biography CAG Limited successfully.','127.0.0.1','2015-06-24 14:01:13'),(1010,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:02:30'),(1011,1,'money','site.produceraccount.update','Updated Producer Managed Rights CAG Limited successfully.','127.0.0.1','2015-06-24 14:02:55'),(1012,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:22'),(1013,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:29'),(1014,1,'microphone','site.publisheraccount.update','Updated Publisher ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:42'),(1015,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),(1016,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),(1017,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),(1018,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),(1019,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),(1020,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),(1021,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),(1022,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),(1023,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),(1024,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),(1025,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),(1026,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),(1027,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),(1028,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),(1029,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),(1030,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),(1031,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:27'),(1032,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),(1033,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),(1034,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),(1035,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-24 18:11:32'),(1036,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-24 18:12:03'),(1037,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-06-24 18:13:03'),(1038,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-24 18:37:26'),(1039,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-06-24 18:37:30'),(1040,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),(1041,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),(1042,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),(1043,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),(1044,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-24 18:42:00'),(1045,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-24 18:42:14'),(1046,1,'sliders','site.work.update','New Work  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-24 18:42:24'),(1047,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-24 18:47:30');

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

insert  into `wipo_auth_resources`(`Master_Resource_ID`,`Master_User_ID`,`Master_Role_ID`,`Master_Module_ID`,`Master_Screen_ID`,`Master_Task_ADD`,`Master_Task_SEE`,`Master_Task_UPT`,`Master_Task_DEL`,`Active`,`Created_Date`,`Rowversion`) values (1,1,NULL,1,1,'1','0','1','1','1','2015-03-15 03:07:02','0000-00-00 00:00:00'),(2,1,NULL,1,2,'1','1','0','0','1','2015-03-15 03:07:02','0000-00-00 00:00:00'),(3,NULL,1,1,1,'1','0','0','0','1','2015-03-15 04:07:50','0000-00-00 00:00:00'),(4,NULL,1,1,2,'0','1','0','0','1','2015-03-15 04:07:50','0000-00-00 00:00:00'),(5,3,NULL,1,1,'0','0','0','1','1','2015-03-15 04:08:11','0000-00-00 00:00:00'),(6,3,NULL,1,2,'1','1','0','0','1','2015-03-15 04:08:11','0000-00-00 00:00:00'),(7,NULL,2,1,1,'0','0','0','0','1','2015-03-15 04:20:22','0000-00-00 00:00:00'),(8,NULL,2,1,2,'1','0','0','0','1','2015-03-15 04:20:22','0000-00-00 00:00:00'),(9,NULL,4,1,1,'1','0','0','0','1','2015-04-04 01:04:01','0000-00-00 00:00:00'),(10,NULL,4,1,2,'1','0','0','0','1','2015-04-04 01:04:01','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_account` */

DROP TABLE IF EXISTS `wipo_author_account`;

CREATE TABLE `wipo_author_account` (
  `Auth_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_GUID` varchar(50) NOT NULL,
  `Auth_Is_Performer` enum('Y','N') NOT NULL DEFAULT 'N',
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
  `Auth_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Acc_Id`),
  UNIQUE KEY `Internal_Code` (`Auth_Internal_Code`),
  UNIQUE KEY `Auth_GUID_unique` (`Auth_GUID`),
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account` */

insert  into `wipo_author_account`(`Auth_Acc_Id`,`Auth_GUID`,`Auth_Is_Performer`,`Auth_Sur_Name`,`Auth_First_Name`,`Auth_Internal_Code`,`Auth_Ipi`,`Auth_Ipi_Base_Number`,`Auth_Ipn_Number`,`Auth_Place_Of_Birth_Id`,`Auth_Birth_Country_Id`,`Auth_Nationality_Id`,`Auth_Language_Id`,`Auth_Identity_Number`,`Auth_Marital_Status_Id`,`Auth_Spouse_Name`,`Auth_Gender`,`Auth_DOB`,`Auth_Non_Member`,`Auth_Photo`,`Active`,`Created_Date`,`Rowversion`) values (2,'c08b3f47-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jenniferr','SOC-AP-0000036',NULL,2147483647,778965125,1,2,4,91,'RT-2323123',1,'Jane','F','0000-00-00','N','\\authoraccount\\cc74aac1d77dc2f23cb0b4f8e8baf0b3.jpg','1','2015-03-28 20:45:23','0000-00-00 00:00:00'),(3,'c08b43a7-14e4-11e5-b10a-74d435d335fe','Y','Mac','Johnn','SOC-AP-0000037',NULL,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-03-29 04:12:30','0000-00-00 00:00:00'),(4,'c08b4443-14e4-11e5-b10a-74d435d335fe','N','Van','Robert','SOC-A-0001003',NULL,NULL,NULL,1,NULL,NULL,NULL,'',1,'','F','0000-00-00','N',NULL,'1','2015-04-02 21:03:05','0000-00-00 00:00:00'),(6,'c08b44ca-14e4-11e5-b10a-74d435d335fe','N','Geo','Micheal','SOC-A-0001004',NULL,NULL,NULL,0,NULL,NULL,NULL,'',1,'Jane','M','0000-00-00','N',NULL,'1','2015-04-09 22:46:18','0000-00-00 00:00:00'),(7,'c08b454d-14e4-11e5-b10a-74d435d335fe','N','RAJ','SAGAR','SOC-A-0001006',NULL,NULL,NULL,NULL,2,2,NULL,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 08:51:50','0000-00-00 00:00:00'),(8,'c08b45d0-14e4-11e5-b10a-74d435d335fe','N','Samal','Himal','SOC-A-0001007',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:22:48','0000-00-00 00:00:00'),(9,'c08b4659-14e4-11e5-b10a-74d435d335fe','N','Mandal','Kamal','SOC-A-0001008',1234565565,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-04-11 09:30:43','0000-00-00 00:00:00'),(10,'c08b46da-14e4-11e5-b10a-74d435d335fe','N','Bhai','Manu','SOC-A-0001009',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:37:51','0000-00-00 00:00:00'),(11,'c08b475d-14e4-11e5-b10a-74d435d335fe','N','Kinar','Dewan','SOC-A-0001010',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:43:24','0000-00-00 00:00:00'),(12,'c08b47db-14e4-11e5-b10a-74d435d335fe','N','Dean','James','SOC-A-0001011',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:48:36','0000-00-00 00:00:00'),(13,'c08b48a7-14e4-11e5-b10a-74d435d335fe','N','Dean','James','SOC-A-0001012',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','M',NULL,'N',NULL,'1','2015-04-11 15:59:49','0000-00-00 00:00:00'),(14,'c08b4964-14e4-11e5-b10a-74d435d335fe','N','james','dean','SOC-A-0001013',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','M',NULL,'N',NULL,'1','2015-04-11 18:25:31','0000-00-00 00:00:00'),(15,'c08b4a22-14e4-11e5-b10a-74d435d335fe','N','james','dean1','SOC-A-0001014',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-11 10:21:25','0000-00-00 00:00:00'),(16,'c08b4ad2-14e4-11e5-b10a-74d435d335fe','N','Arumugam','Vinodh','SOC-A-0001015',2147483647,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-11 10:33:45','0000-00-00 00:00:00'),(17,'c08b4b7d-14e4-11e5-b10a-74d435d335fe','N','Arumugam1','Vinodh','SOC-A-0001016',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','1979-10-18','N',NULL,'1','2015-04-21 22:55:58','0000-00-00 00:00:00'),(18,'c08b4c2d-14e4-11e5-b10a-74d435d335fe','N','Lesaca','John','SOC-A-0001017',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-23 10:32:44','0000-00-00 00:00:00'),(19,'c08b4cd7-14e4-11e5-b10a-74d435d335fe','N','Kiyosaki','Robertt','SOC-A-0001018',NULL,NULL,NULL,NULL,2,2,40,'',NULL,'','M','2015-06-29','N',NULL,'1','2015-05-13 13:18:27','0000-00-00 00:00:00'),(21,'c08b4d7c-14e4-11e5-b10a-74d435d335fe','N','Y','Willam','SOC-A-0001021',NULL,NULL,NULL,NULL,133,131,92,'',1,'','M','1990-02-06','N',NULL,'1','2015-06-08 20:11:05','0000-00-00 00:00:00'),(22,'c08b4e2c-14e4-11e5-b10a-74d435d335fe','N','P','Harry','SOC-A-0001022',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','1995-10-24','Y',NULL,'1','2015-06-09 04:17:31','0000-00-00 00:00:00'),(24,'c08b4ed9-14e4-11e5-b10a-74d435d335fe','N','Atkinson','Rovan','SOC-A-0001024',NULL,NULL,NULL,NULL,2,2,5,'',4,'','M','0000-00-00','N',NULL,'1','2015-06-09 06:31:08','0000-00-00 00:00:00'),(26,'c08b4f92-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jennifer','SOC-AP-0000031',NULL,2147483647,778965125,1,2,4,91,'RT-2323123',1,'Jane','F','0000-00-00','N',NULL,'1','2015-06-12 04:58:08','0000-00-00 00:00:00'),(27,'c08b504d-14e4-11e5-b10a-74d435d335fe','Y','Mac','John','SOC-AP-0000032',NULL,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-06-12 04:59:35','0000-00-00 00:00:00'),(28,'c08b9125-14e4-11e5-b10a-74d435d335fe','Y','Kiyosaki','Robert','SOC-AP-0000033',NULL,NULL,NULL,NULL,2,2,40,'',NULL,'','M','2015-06-29','N','\\performeraccount\\767e4ee86cd5d5da2f6f8352019e20be.png','1','2015-06-12 04:59:39','0000-00-00 00:00:00'),(29,'c08b51bb-14e4-11e5-b10a-74d435d335fe','Y','P','Harry','SOC-AP-0000034',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','1995-10-24','Y',NULL,'1','2015-06-12 04:59:42','0000-00-00 00:00:00'),(30,'c08b526b-14e4-11e5-b10a-74d435d335fe','Y','Atkinson','Rovan','SOC-AP-0000035',NULL,NULL,NULL,NULL,2,2,5,'',4,'','M','0000-00-00','N',NULL,'1','2015-06-12 04:59:45','0000-00-00 00:00:00'),(31,'82C1D171-7291-E529-59C0-48E250A660EB','N','S','A','SOC-A-0001026',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-06-18 17:33:19','0000-00-00 00:00:00'),(50,'AA7EE8ED-4568-02AA-0F45-83D1FB5C24A2','N','Raj','Vincent','SOC-A-0001027',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','0000-00-00','N','\\authoraccount\\857fca123331b7fbc7ea2c8157733e7d.png','1','2015-06-22 18:13:48','0000-00-00 00:00:00'),(54,'6170D906-040B-5C94-66C6-6BCC32E0CD1A','Y','Raj','Rajesh','SOC-A-0001031',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','Y',NULL,'1','2015-06-24 11:09:05','0000-00-00 00:00:00'),(55,'c08b8e9f-14e4-11e5-b10a-74d435d335fe','Y','Raison','Jeanne','SOC-AP-0000042',NULL,NULL,NULL,NULL,NULL,NULL,1,'',1,'','F','0000-00-00','N',NULL,'0','2015-06-24 11:56:08','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account_address` */

insert  into `wipo_author_account_address`(`Auth_Addr_Id`,`Auth_Acc_Id`,`Auth_Home_Address_1`,`Auth_Home_Address_2`,`Auth_Home_Address_3`,`Auth_Home_Fax`,`Auth_Home_Telephone`,`Auth_Home_Email`,`Auth_Home_Website`,`Auth_Mailing_Address_1`,`Auth_Mailing_Address_2`,`Auth_Mailing_Address_3`,`Auth_Mailing_Telephone`,`Auth_Mailing_Fax`,`Auth_Mailing_Email`,`Auth_Mailing_Website`,`Auth_Author_Account_1`,`Auth_Author_Account_2`,`Auth_Author_Account_3`,`Auth_Performer_Account_1`,`Auth_Performer_Account_2`,`Auth_Performer_Account_3`,`Auth_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,2,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-03-28 21:07:13','0000-00-00 00:00:00'),(2,20,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','123213123','test@test.com','','','','','','','','Y','1','2015-06-04 05:03:40','0000-00-00 00:00:00'),(3,19,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-08 20:52:14','0000-00-00 00:00:00'),(4,26,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-12 04:58:08','0000-00-00 00:00:00'),(5,28,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-12 04:59:39','0000-00-00 00:00:00'),(10,28,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-22 13:20:42','0000-00-00 00:00:00');

/*Table structure for table `wipo_author_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_author_biograph_uploads`;

CREATE TABLE `wipo_author_biograph_uploads` (
  `Auth_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Biogrph_Id` int(11) NOT NULL,
  `Auth_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Biogrph_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_biography` (`Auth_Biogrph_Id`),
  CONSTRAINT `FK_wipo_author_biograph_uploads_biography` FOREIGN KEY (`Auth_Biogrph_Id`) REFERENCES `wipo_author_biography` (`Auth_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_biograph_uploads` */

insert  into `wipo_author_biograph_uploads`(`Auth_Biogrph_Upl_Id`,`Auth_Biogrph_Id`,`Auth_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,9,'\\authorbiographuploads\\d774a33344e77d06f5e98d339050b7a5.jpg','2015-06-24 13:51:31','0000-00-00 00:00:00'),(2,9,'\\authorbiographuploads\\60901b0d54ae59d59d0f65f4d3a17e02.jpg','2015-06-24 13:51:31','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_biography` */

insert  into `wipo_author_biography`(`Auth_Biogrph_Id`,`Auth_Acc_Id`,`Auth_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,2,'test','1','2015-04-01 23:24:06','0000-00-00 00:00:00'),(2,26,'test','1','2015-06-12 04:58:08','0000-00-00 00:00:00'),(3,3,'test','1','2015-06-23 12:08:50','0000-00-00 00:00:00'),(7,54,'test','1','2015-06-24 11:09:24','0000-00-00 00:00:00'),(8,55,'Test','1','2015-06-24 11:56:08','0000-00-00 00:00:00'),(9,4,'85151','1','2015-06-24 13:42:08','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_death_inheritance` */

insert  into `wipo_author_death_inheritance`(`Auth_Death_Inhrt_Id`,`Auth_Acc_Id`,`Auth_Death_Inhrt_Firstname`,`Auth_Death_Inhrt_Surname`,`Auth_Death_Inhrt_Email`,`Auth_Death_Inhrt_Phone`,`Auth_Death_Inhrt_Address_1`,`Auth_Death_Inhrt_Address_2`,`Auth_Death_Inhrt_Address_3`,`Auth_Death_Inhrt_Addtion_Annotation`) values (1,2,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(2,3,'','Test','','','test','test','test','test'),(3,26,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(4,27,'','Test','','','test','test','test','test');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_manage_rights` */

insert  into `wipo_author_manage_rights`(`Auth_Mnge_Rgt_Id`,`Auth_Acc_Id`,`Auth_Mnge_Society_Id`,`Auth_Mnge_Entry_Date`,`Auth_Mnge_Exit_Date`,`Auth_Mnge_Internal_Position_Id`,`Auth_Mnge_Entry_Date_2`,`Auth_Mnge_Exit_Date_2`,`Auth_Mnge_Region_Id`,`Auth_Mnge_Profession_Id`,`Auth_Mnge_File`,`Auth_Mnge_Duration`,`Auth_Mnge_Avl_Work_Cat_Id`,`Auth_Mnge_Type_Rght_Id`,`Auth_Mnge_Managed_Rights_Id`,`Auth_Mnge_Territories_Id`) values (1,2,10,'2015-03-01','2015-04-01',1,'2015-03-01','2015-03-31',NULL,1,'test','50',1,1,1,8),(2,3,10,'2015-03-26','2015-03-27',1,'2015-03-26','2015-03-27',3,1,'rack','50',1,1,1,8),(3,7,10,'2009-02-03','2015-12-31',1,'2010-02-16','2015-12-31',NULL,NULL,'',NULL,1,1,1,8),(4,8,10,'2015-04-09','2015-12-31',1,'2015-04-09','2015-12-31',1,1,'',NULL,1,1,1,8),(5,9,10,'2015-04-09','2015-12-31',1,'2015-04-09','2015-11-30',1,1,'',NULL,1,1,1,8),(6,10,10,'2015-04-10','2015-12-31',1,'2015-04-09','2015-04-09',1,1,'',NULL,1,1,1,8),(7,11,10,'2015-04-09','2015-10-31',3,'2015-04-09','2015-04-09',1,5,'',NULL,1,1,1,9),(8,12,10,'2010-02-14','2015-12-31',1,'2015-04-09','2015-04-09',NULL,2,'',NULL,1,1,1,8),(9,13,10,'2015-04-09','2015-04-09',1,'2015-04-09','2015-04-09',NULL,NULL,'',NULL,1,1,1,8),(10,15,10,'2015-04-09','0000-00-00',1,'2015-04-09','2015-04-09',1,1,'',NULL,1,1,1,8),(11,16,10,'2015-04-30','0000-00-00',1,'2015-04-30','2015-04-09',1,1,'',NULL,1,1,1,8),(12,17,10,'2015-04-19','0000-00-00',1,'2015-04-19','2015-04-19',1,1,'',NULL,1,1,1,8),(13,18,10,'2015-04-21','0000-00-00',1,'2015-04-21','2015-04-21',1,1,'',NULL,1,1,1,8),(14,19,10,'2015-05-12','2015-06-30',1,'2015-05-12','2015-06-30',1,1,'',NULL,1,1,1,8),(15,21,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9),(16,24,11,'2015-06-08','0000-00-00',6,'2015-06-08','0000-00-00',3,2,'',NULL,1,1,1,9),(17,25,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',NULL,NULL,'',NULL,1,1,1,9),(18,26,10,'2015-06-23','0000-00-00',6,'2015-06-23','0000-00-00',NULL,2,'','',1,1,1,8),(21,4,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,2,'','',1,1,1,8),(22,55,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,2,'','',1,1,1,8);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_payment_method` */

insert  into `wipo_author_payment_method`(`Auth_Pay_Id`,`Auth_Acc_Id`,`Auth_Pay_Method_id`,`Auth_Bank_Account_1`,`Auth_Bank_Account_2`,`Auth_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (1,2,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-03-28 21:46:08','0000-00-00 00:00:00'),(2,19,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-08 20:52:28','0000-00-00 00:00:00'),(3,26,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-12 04:58:08','0000-00-00 00:00:00'),(4,28,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-12 04:59:39','0000-00-00 00:00:00'),(7,28,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-22 13:20:42','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_pseudonym` */

insert  into `wipo_author_pseudonym`(`Auth_Pseudo_Id`,`Auth_Acc_Id`,`Auth_Pseudo_Type_Id`,`Auth_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,2,1,'Jack','1','2015-03-28 22:16:01','0000-00-00 00:00:00'),(2,7,1,'SAG','1','2015-04-11 09:18:47','0000-00-00 00:00:00'),(3,21,11,'PSH','1','2015-06-08 20:18:01','0000-00-00 00:00:00'),(4,26,1,'Jack','1','2015-06-12 04:58:08','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_upload` */

insert  into `wipo_author_upload`(`Auth_Upl_Id`,`Auth_Acc_Id`,`Auth_Upl_Doc_Name`,`Auth_Upl_File`) values (10,2,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(12,20,'Performer upload','/performerupload/4d7140575e4c0daafd308890d69f11bf.txt'),(13,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(14,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(15,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(16,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(17,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(18,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(19,3,'test 12','\\authorupload\\13b11390f2c56e137b6713628e74670b.sql'),(22,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png');

/*Table structure for table `wipo_group` */

DROP TABLE IF EXISTS `wipo_group`;

CREATE TABLE `wipo_group` (
  `Group_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_GUID` varchar(50) NOT NULL,
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
  `Group_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Id`),
  UNIQUE KEY `Group_GUID_unique` (`Group_GUID`),
  KEY `FK_wipo_group_country` (`Group_Country_Id`),
  KEY `FK_wipo_group_language` (`Group_Language_Id`),
  KEY `FK_wipo_group_legal_form` (`Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_group_country` FOREIGN KEY (`Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_language` FOREIGN KEY (`Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_legal_form` FOREIGN KEY (`Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group` */

insert  into `wipo_group`(`Group_Id`,`Group_GUID`,`Group_Name`,`Group_Is_Author`,`Group_Is_Performer`,`Group_Internal_Code`,`Group_IPI_Name_Number`,`Group_IPN_Base_Number`,`Group_IPN_Number`,`Group_Date`,`Group_Place`,`Group_Country_Id`,`Group_Legal_Form_Id`,`Group_Language_Id`,`Group_Non_Member`,`Group_Photo`,`Active`,`Created_Date`,`Rowversion`) values (1,'c097356a-14e4-11e5-b10a-74d435d335fe','Author Group 2','1','0','SOC-GA-0001001',NULL,NULL,89758451,'2015-02-01','',2,1,1,'N',NULL,'1','2015-04-01 21:30:53','0000-00-00 00:00:00'),(2,'c0973702-14e4-11e5-b10a-74d435d335fe','Performer Group 2','0','1','SOC-GP-0001002',NULL,NULL,123312,'2015-03-03','',2,NULL,1,'N',NULL,'1','2015-04-01 22:03:53','0000-00-00 00:00:00'),(3,'c09737de-14e4-11e5-b10a-74d435d335fe','Author Group 4','1','0','SOC-GA-0001003',NULL,NULL,23123,'2015-02-24','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:04','0000-00-00 00:00:00'),(4,'c09738a2-14e4-11e5-b10a-74d435d335fe','Performer Group 4','0','1','SOC-GP-0001004',NULL,NULL,2312323,'2015-03-19','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:17','0000-00-00 00:00:00'),(5,'c0973965-14e4-11e5-b10a-74d435d335fe','Author Group 3','1','0','SOC-GA-0001005',NULL,NULL,321123,'2010-02-10','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:37','0000-00-00 00:00:00'),(6,'c0973a23-14e4-11e5-b10a-74d435d335fe','Performer Group 1','0','1','SOC-GP-0001006',NULL,NULL,123123,'2015-04-29','',2,NULL,1,'N',NULL,'1','2015-04-10 00:50:29','0000-00-00 00:00:00'),(9,'c0973ae1-14e4-11e5-b10a-74d435d335fe','Author Group 1','1','0','SOC-GA-0001007',NULL,NULL,123123,'2015-04-29','',2,NULL,1,'Y','\\group\\2e400f04f8232e283be43ed26fdc71fa.png','1','2015-04-10 00:55:47','0000-00-00 00:00:00'),(11,'c0973ba2-14e4-11e5-b10a-74d435d335fe','Performer Group 5','0','1','SOC-GP-0001008',NULL,NULL,123123,'2015-04-23','',2,NULL,1,'N',NULL,'1','2015-04-10 01:01:02','0000-00-00 00:00:00'),(12,'c0973c58-14e4-11e5-b10a-74d435d335fe','Performer Group 3','0','1','SOC-GP-0001009',NULL,NULL,123312,'2015-04-22','',2,NULL,1,'N',NULL,'1','2015-04-10 01:02:58','0000-00-00 00:00:00'),(14,'c0973d10-14e4-11e5-b10a-74d435d335fe','Author Group 5','1','0','SOC-GA-0001011',NULL,NULL,123312,'2015-03-31','',2,NULL,1,'N',NULL,'1','2015-04-11 04:51:37','0000-00-00 00:00:00'),(15,'c0973dce-14e4-11e5-b10a-74d435d335fe','Test Group ','1','0','SOC-GA-0001012',NULL,NULL,232132,'2015-04-01','',2,NULL,NULL,'N',NULL,'1','2015-04-21 09:26:13','0000-00-00 00:00:00'),(16,'c0973e8f-14e4-11e5-b10a-74d435d335fe','test performer group','0','1','SOC-GP-0001013',NULL,NULL,2147483647,'2015-04-01','',2,NULL,NULL,'N',NULL,'1','2015-04-21 09:29:44','0000-00-00 00:00:00'),(17,'c0973f4d-14e4-11e5-b10a-74d435d335fe','Metallica','1','0','SOC-GA-0001014',NULL,NULL,2147483647,'2015-04-14','',2,NULL,1,'N',NULL,'1','2015-04-23 11:02:57','0000-00-00 00:00:00');

/*Table structure for table `wipo_group_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_group_biograph_uploads`;

CREATE TABLE `wipo_group_biograph_uploads` (
  `Group_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Biogrph_Id` int(11) NOT NULL,
  `Group_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Biogrph_Upl_Id`),
  KEY `FK_wipo_group_biograph_uploads_biography` (`Group_Biogrph_Id`),
  CONSTRAINT `FK_wipo_group_biograph_uploads_biography` FOREIGN KEY (`Group_Biogrph_Id`) REFERENCES `wipo_group_biography` (`Group_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_biograph_uploads` */

insert  into `wipo_group_biograph_uploads`(`Group_Biogrph_Upl_Id`,`Group_Biogrph_Id`,`Group_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,3,'\\groupbiographuploads\\6fe400c35a642bbaede3df9f73eaa915.png','2015-06-24 13:52:43','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_biography` */

insert  into `wipo_group_biography`(`Group_Biogrph_Id`,`Group_Id`,`Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (2,14,'Annotation','1','2015-04-11 05:01:07','0000-00-00 00:00:00'),(3,9,'Test','1','2015-06-24 13:12:38','0000-00-00 00:00:00'),(4,1,'Tets','1','2015-06-24 13:37:52','0000-00-00 00:00:00'),(5,16,'Test','1','2015-06-24 13:40:16','0000-00-00 00:00:00');

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

insert  into `wipo_group_manage_rights`(`Group_Mnge_Rgt_Id`,`Group_Id`,`Group_Mnge_Society_Id`,`Group_Mnge_Entry_Date`,`Group_Mnge_Exit_Date`,`Group_Mnge_Internal_Position_Id`,`Group_Mnge_Entry_Date_2`,`Group_Mnge_Exit_Date_2`,`Group_Mnge_Region_Id`,`Group_Mnge_Profession_Id`,`Group_Mnge_File`,`Group_Mnge_Duration`,`Group_Mnge_Avl_Work_Cat_Id`,`Group_Mnge_Type_Rght_Id`,`Group_Mnge_Managed_Rights_Id`,`Group_Mnge_Territories_Id`) values (3,1,10,'2015-04-08','2015-04-08',1,'2015-04-08','2015-04-08',1,1,'',NULL,1,1,2,8),(4,15,10,'2015-04-19','2015-04-19',1,'2015-04-19','2015-04-19',NULL,NULL,'',NULL,1,1,1,8),(5,16,10,'2015-04-19','2015-04-19',1,'2015-04-19','2015-04-19',NULL,NULL,'',NULL,1,1,1,8),(6,17,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,1,1,8);

/*Table structure for table `wipo_group_members` */

DROP TABLE IF EXISTS `wipo_group_members`;

CREATE TABLE `wipo_group_members` (
  `Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Member_GUID` varchar(50) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Group_Member_Id`),
  KEY `FK_wipo_group_biography_account_id` (`Group_Id`),
  KEY `FK_wipo_group_members_Perf_Internal_Code` (`Group_Member_GUID`),
  CONSTRAINT `FK_wipo_group_members_group` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_members` */

insert  into `wipo_group_members`(`Group_Member_Id`,`Group_Id`,`Group_Member_GUID`,`Created_Date`,`Rowversion`) values (5,1,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:02:45','0000-00-00 00:00:00'),(7,5,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:02:45','0000-00-00 00:00:00'),(9,4,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:16:34','0000-00-00 00:00:00'),(10,5,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:16:34','0000-00-00 00:00:00'),(12,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00'),(13,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00'),(14,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00'),(15,9,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:47:09','0000-00-00 00:00:00'),(16,17,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-05-13 15:37:48','0000-00-00 00:00:00'),(17,17,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-05-13 15:37:48','0000-00-00 00:00:00'),(20,2,'c08b90a4-14e4-11e5-b10a-74d435d335fe','2015-06-24 10:50:38','0000-00-00 00:00:00'),(21,4,'c08b90a4-14e4-11e5-b10a-74d435d335fe','2015-06-24 10:50:38','0000-00-00 00:00:00');

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

insert  into `wipo_group_payment_method`(`Group_Pay_Id`,`Group_Id`,`Group_Pay_Method_id`,`Group_Bank_Account_1`,`Group_Bank_Account_2`,`Group_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (2,1,1,'1232123','3212321323','1232123231231','1','2015-04-11 01:32:03','0000-00-00 00:00:00');

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

insert  into `wipo_group_pseudonym`(`Group_Pseudo_Id`,`Group_Id`,`Group_Pseudo_Type_Id`,`Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (2,1,2,'PP','1','2015-04-11 03:34:23','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_representative` */

insert  into `wipo_group_representative`(`Group_Addr_Id`,`Group_Id`,`Group_Rep_Name`,`Group_Rep_Address_1`,`Group_Rep_Address_2`,`Group_Rep_Address_3`,`Group_Rep_Address_4`,`Group_Home_Address_1`,`Group_Home_Address_2`,`Group_Home_Address_3`,`Group_Home_Address_4`,`Group_Home_Fax`,`Group_Home_Telephone`,`Group_Home_Email`,`Group_Home_Website`,`Group_Mailing_Address_1`,`Group_Mailing_Address_2`,`Group_Mailing_Address_3`,`Group_Mailing_Address_4`,`Group_Mailing_Telephone`,`Group_Mailing_Fax`,`Group_Mailing_Email`,`Group_Mailing_Website`,`Group_Country_Id`,`Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (2,1,'Ron','','','','','1, Main street','','','','','96626166111','rom@gmail.com','','1, Main street','','','','342342123231','','ron@gmail.com','',2,'Y','1','2015-04-11 03:29:47','0000-00-00 00:00:00');

/*Table structure for table `wipo_internalcode_generate` */

DROP TABLE IF EXISTS `wipo_internalcode_generate`;

CREATE TABLE `wipo_internalcode_generate` (
  `Gen_Inter_Code_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Gen_User_Type` enum('A','P','G','O','PU','PR','PG','W','R','GA','GP','GE','GR','AP','EP') NOT NULL DEFAULT 'A' COMMENT 'A -> Author, P -> Performer, G -> Group, O -> Organization, PU -> Publisher, PR -> Producer, PG -> Publisher/producer group, W -> Work, R -> Recording, GA -> Group Author, GP -> Group Performer, GE -> Group Publisher, GR -> Group Producer, AP -> Author & Performer, EP -> Publisher & producer',
  `Gen_Prefix` varchar(10) DEFAULT NULL,
  `Gen_Inter_Code` varchar(50) NOT NULL,
  `Gen_Suffix` varchar(10) DEFAULT NULL,
  `Gen_Code_Pad` tinyint(4) NOT NULL DEFAULT '7',
  PRIMARY KEY (`Gen_Inter_Code_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_internalcode_generate` */

insert  into `wipo_internalcode_generate`(`Gen_Inter_Code_Id`,`Gen_User_Type`,`Gen_Prefix`,`Gen_Inter_Code`,`Gen_Suffix`,`Gen_Code_Pad`) values (1,'A','A','1032',NULL,7),(2,'P','P','1019',NULL,7),(3,'G','G','1014',NULL,7),(4,'O','SOC','003',NULL,3),(5,'PU','E','114',NULL,7),(6,'PG','EG','109',NULL,7),(7,'PR','PR','111',NULL,7),(8,'W','W','19',NULL,7),(9,'R','T','111',NULL,7),(10,'GA','GA','2',NULL,7),(11,'GP','GP','2',NULL,7),(12,'GE','GE','2',NULL,7),(13,'GR','GPR','2',NULL,7),(14,'AP','AP','43',NULL,7),(15,'EP','EPR','9',NULL,7);

/*Table structure for table `wipo_master_country` */

DROP TABLE IF EXISTS `wipo_master_country`;

CREATE TABLE `wipo_master_country` (
  `Master_Country_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Country_Name` varchar(45) NOT NULL COMMENT 'Name:',
  `Country_Two_Code` varchar(3) DEFAULT NULL COMMENT 'Two Code:',
  `Country_Three_Code` varchar(5) DEFAULT NULL COMMENT 'Three Code:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Country_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_country` */

insert  into `wipo_master_country`(`Master_Country_Id`,`Country_Name`,`Country_Two_Code`,`Country_Three_Code`,`Active`,`Created_Date`,`Rowversion`) values (2,'NEPAL','NP','0524','1','2015-03-15 00:12:13','0000-00-00 00:00:00'),(5,'AFGHANISTAN','AF','0004','1','2015-04-10 21:28:14','0000-00-00 00:00:00'),(7,'ALBANIA','AL','0008','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(8,'ALGERIA','DZ','0012','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(9,'ANDORRA','AD','0020','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(10,'ANGOLA','AO','0024','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(11,'ANTIGUA AND BARBUDA','AG','0028','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(12,'AZERBAIJAN','AZ','0031','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(13,'ARGENTINA','AR','0032','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(14,'AUSTRALIA','AU','0036','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(15,'AUSTRIA','AT','0040','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(16,'BAHAMAS','BS','0044','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(17,'BAHRAIN','BH','0048','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(18,'BANGLADESH','BD','0050','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(19,'ARMENIA','AM','0051','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(20,'BARBADOS','BB','0052','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(21,'BELGIUM','BE','0056','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(22,'BHUTAN','BT','0064','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(23,'BOLIVIA','BO','0068','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(24,'BOSNIA AND HERZEGOVINA','BA','0070','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(25,'BOTSWANA','BW','0072','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(26,'BRAZIL','BR','0076','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(27,'BELIZE','BZ','0084','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(28,'SOLOMON ISLANDS','SB','0090','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(29,'BRUNEI DARUSSALAM','BN','0096','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(30,'BULGARIA','BG','0100','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(31,'BURMA','BU','0104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(32,'MYANMAR','MM','0104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(33,'BURUNDI','BI','0108','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(34,'BELARUS','BY','0112','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(35,'CAMBODIA','KH','0116','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(36,'CAMEROON','CM','0120','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(37,'CANADA','CA','0124','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(38,'CAPE VERDE','CV','0132','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(39,'CENTRAL AFRICAN REPUBLIC','CF','0140','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(40,'SRI LANKA','LK','0144','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(41,'CHAD','TD','0148','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(42,'CHILE','CL','0152','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(43,'CHINA','CN','0156','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(44,'TAIWAN, PROVINCE OF CHINA','TW','0158','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(45,'COLOMBIA','CO','0170','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(46,'COMOROS','KM','0174','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(47,'CONGO','CG','0178','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(48,'ZAIRE','ZR','0180','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(49,'CONGO, THE DEMOCRATIC REPUBLIC OF THE','CD','0180','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(50,'COSTA RICA','CR','0188','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(51,'CROATIA','HR','0191','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(52,'CUBA','CU','0192','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(53,'CYPRUS','CY','0196','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(54,'CZECHOSLOVAKIA','CS','0200','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(55,'CZECH REPUBLIC','CZ','0203','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(56,'BENIN','BJ','0204','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(57,'DENMARK','DK','0208','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(58,'DOMINICA','DM','0212','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(59,'DOMINICAN REPUBLIC','DO','0214','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(60,'ECUADOR','EC','0218','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(61,'EL SALVADOR','SV','0222','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(62,'EQUATORIAL GUINEA','GQ','0226','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(63,'ETHIOPIA','ET','0230','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(64,'ETHIOPIA','ET','0231','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(65,'ERITREA','ER','0232','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(66,'ESTONIA','EE','0233','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(67,'FIJI','FJ','0242','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(68,'FINLAND','FI','0246','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(69,'FRANCE','FR','0250','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(70,'FRENCH POLYNESIA','PF','0258','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(71,'DJIBOUTI','DJ','0262','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(72,'GABON','GA','0266','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(73,'GEORGIA','GE','0268','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(74,'GAMBIA','GM','0270','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(75,'GERMANY','DE','0276','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(76,'GERMAN DEMOCRATIC REPUBLIC','DD','0278','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(77,'GERMANY','DE','0280','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(78,'GHANA','GH','0288','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(79,'KIRIBATI','KI','0296','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(80,'GREECE','GR','0300','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(81,'GRENADA','GD','0308','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(82,'GUATEMALA','GT','0320','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(83,'GUINEA','GN','0324','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(84,'GUYANA','GY','0328','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(85,'HAITI','HT','0332','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(86,'HOLY SEE (VATICAN CITY STATE)','VA','0336','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(87,'HONDURAS','HN','0340','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(88,'HONG KONG','HK','0344','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(89,'HUNGARY','HU','0348','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(90,'ICELAND','IS','0352','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(91,'INDIA','IN','0356','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(92,'INDONESIA','ID','0360','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(93,'IRAN, ISLAMIC REPUBLIC OF','IR','0364','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(94,'IRAQ','IQ','0368','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(95,'IRELAND','IE','0372','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(96,'ISRAEL','IL','0376','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(97,'ITALY','IT','0380','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(98,'COTE D\'IVOIRE','CI','0384','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(99,'JAMAICA','JM','0388','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(100,'JAPAN','JP','0392','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(101,'KAZAKSTAN','KZ','0398','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(102,'JORDAN','JO','0400','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(103,'KENYA','KE','0404','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(104,'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','KP','0408','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(105,'KOREA, REPUBLIC OF','KR','0410','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(106,'KUWAIT','KW','0414','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(107,'KYRGYZSTAN','KG','0417','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(108,'LAO PEOPLE\'S DEMOCRATIC REPUBLIC','LA','0418','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(109,'LEBANON','LB','0422','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(110,'LESOTHO','LS','0426','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(111,'LATVIA','LV','0428','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(112,'LIBERIA','LR','0430','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(113,'LIBYAN ARAB JAMAHIRIYA','LY','0434','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(114,'LIECHTENSTEIN','LI','0438','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(115,'LITHUANIA','LT','0440','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(116,'LUXEMBOURG','LU','0442','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(117,'MADAGASCAR','MG','0450','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(118,'MALAWI','MW','0454','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(119,'MALAYSIA','MY','0458','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(120,'MALDIVES','MV','0462','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(121,'MALI','ML','0466','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(122,'MALTA','MT','0470','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(123,'MAURITANIA','MR','0478','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(124,'MAURITIUS','MU','0480','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(125,'MEXICO','MX','0484','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(126,'MONACO','MC','0492','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(127,'MONGOLIA','MN','0496','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(128,'MOLDOVA, REPUBLIC OF','MD','0498','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(129,'MOROCCO','MA','0504','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(130,'MOZAMBIQUE','MZ','0508','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(131,'OMAN','OM','0512','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(132,'NAMIBIA','NA','0516','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(133,'NAURU','NR','0520','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(135,'NETHERLANDS','NL','0528','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(136,'VANUATU','VU','0548','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(137,'NEW ZEALAND','NZ','0554','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(138,'NICARAGUA','NI','0558','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(139,'NIGER','NE','0562','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(140,'NIGERIA','NG','0566','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(141,'NORWAY','NO','0578','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(142,'MICRONESIA, FEDERATED STATES OF','FM','0583','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(143,'MARSHALL ISLANDS','MH','0584','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(144,'PALAU','PW','0585','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(145,'PAKISTAN','PK','0586','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(146,'PANAMA','PA','0591','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(147,'PAPUA NEW GUINEA','PG','0598','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(148,'PARAGUAY','PY','0600','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(149,'PERU','PE','0604','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(150,'PHILIPPINES','PH','0608','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(151,'POLAND','PL','0616','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(152,'PORTUGAL','PT','0620','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(153,'GUINEA-BISSAU','GW','0624','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(154,'PUERTO RICO','PR','0630','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(155,'QATAR','QA','0634','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(156,'ROMANIA','RO','0642','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(157,'RUSSIAN FEDERATION','RU','0643','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(158,'RWANDA','RW','0646','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(159,'SAINT KITTS AND NEVIS','KN','0659','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(160,'SAINT LUCIA','LC','0662','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(161,'SAINT VINCENT AND THE GRENADINES','VC','0670','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(162,'SAN MARINO','SM','0674','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(163,'SAO TOME AND PRINCIPE','ST','0678','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(164,'SAUDI ARABIA','SA','0682','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(165,'SENEGAL','SN','0686','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(166,'SEYCHELLES','SC','0690','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(167,'SIERRA LEONE','SL','0694','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(168,'SINGAPORE','SG','0702','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(169,'SLOVAKIA','SK','0703','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(170,'VIET NAM','VN','0704','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(171,'SLOVENIA','SI','0705','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(172,'SOMALIA','SO','0706','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(173,'SOUTH AFRICA','ZA','0710','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(174,'ZIMBABWE','ZW','0716','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(175,'YEMEN, DEMOCRATIC','YD','0720','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(176,'SPAIN','ES','0724','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(177,'WESTERN SAHARA','EH','0732','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(178,'SUDAN','SD','0736','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(179,'SURINAME','SR','0740','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(180,'SWAZILAND','SZ','0748','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(181,'SWEDEN','SE','0752','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(182,'SWITZERLAND','CH','0756','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(183,'SYRIAN ARAB REPUBLIC','SY','0760','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(184,'TAJIKISTAN','TJ','0762','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(185,'THAILAND','TH','0764','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(186,'TOGO','TG','0768','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(187,'TONGA','TO','0776','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(188,'TRINIDAD AND TOBAGO','TT','0780','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(189,'UNITED ARAB EMIRATES','AE','0784','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(190,'TUNISIA','TN','0788','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(191,'TURKEY','TR','0792','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(192,'TURKMENISTAN','TM','0795','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(193,'TUVALU','TV','0798','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(194,'UGANDA','UG','0800','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(195,'UKRAINE','UA','0804','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(196,'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','MK','0807','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(197,'USSR','SU','0810','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(198,'EGYPT','EG','0818','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(199,'UNITED KINGDOM','GB','0826','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(200,'TANZANIA, UNITED REPUBLIC OF','TZ','0834','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(201,'UNITED STATES','US','0840','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(202,'BURKINA FASO','BF','0854','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(203,'URUGUAY','UY','0858','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(204,'UZBEKISTAN','UZ','0860','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(205,'VENEZUELA','VE','0862','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(206,'SAMOA','WS','0882','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(207,'YEMEN (0886)','YE','0886','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(208,'YEMEN (0887)','YE','0887','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(209,'YUGOSLAVIA (0890)','YU','0890','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(210,'YUGOSLAVIA (0891)','YU','0891','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(211,'ZAMBIA','ZM','0894','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(212,'AFRICA','2AF','2100','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(213,'AMERICA','2AM','2101','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(214,'AMERICAN CONTINENT','2AC','2102','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(215,'ANTILLES','2AN','2103','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(216,'APEC COUNTRIES','2AP','2104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(217,'ASEAN COUNTRIES','2AE','2105','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(218,'ASIA','2AS','2106','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(219,'AUSTRALASIA','2AA','2107','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(220,'BALKANS','2BA','2108','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(221,'BALTIC STATES','2BS','2109','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(222,'BENELUX','2BE','2110','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(223,'BRITISH ISLES','2BI','2111','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(224,'BRITISH WEST INDIES','2BW','2112','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(225,'CENTRAL AMERICA','2CA','2113','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(226,'COMMONWEALTH','2CO','2114','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(227,'COMMONWEALTH AFRICAN TERRITORIES','2CF','2115','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(228,'COMMONWEALTH ASIAN TERRITORIES','2CS','2116','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(229,'COMMONWEALTH AUSTRALASIAN TERRITORIES','2CU','2117','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(230,'COMMONWEALTH OF INDEPENDENT STATES','2CI','2118','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(231,'EASTERN EUROPE','2EE','2119','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(232,'EUROPE','2EU','2120','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(233,'EUROPEAN ECONOMIC AREA','2EM','2121','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(234,'EUROPEAN CONTINENT','2EC','2122','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(235,'EUROPEAN ECONOMIC COMMUNITY','2EY','2123','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(236,'EUROPEAN UNION','2EN','2123','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(237,'GSA COUNTRIES','2GC','2124','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(238,'MIDDLE EAST','2ME','2125','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(239,'NAFTA COUNTRIES','2NT','2126','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(240,'NORDIC COUNTRIES','2NC','2127','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(241,'NORTH AFRICA','2NF','2128','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(242,'NORTH AMERICA','2NA','2129','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(243,'OCEANIA','2OC','2130','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(244,'SCANDINAVIA','2SC','2131','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(245,'SOUTH AMERICA','2SA','2132','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(246,'SOUTH EAST ASIA','2SE','2133','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(247,'WEST INDIES','2WI','2134','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(248,'WORLD','2WL','2136','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(249,'WEST AFRICA REGION','WAR','WA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(250,'CENTRAL AFRICA REGION','CAR','CA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(251,'EAST AFRICA REGION','EAR','EA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),(252,'SOUTH AFRICA REGION','SAR','SA','1','2015-06-02 11:58:36','0000-00-00 00:00:00');

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

insert  into `wipo_master_currency`(`Master_Crncy_Id`,`Currency_Code`,`Currency_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'US','Dollar','1','2015-03-29 03:10:18','0000-00-00 00:00:00'),(2,'EUR','Euro','1','2015-03-29 03:10:28','0000-00-00 00:00:00'),(3,'INR','Rupee','1','2015-03-29 03:10:34','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_document` */

DROP TABLE IF EXISTS `wipo_master_document`;

CREATE TABLE `wipo_master_document` (
  `Master_Doc_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Doc_Code` varchar(10) DEFAULT NULL,
  `Doc_Name` varchar(90) NOT NULL COMMENT 'Document Name:',
  `Doc_Comment` varchar(90) NOT NULL COMMENT 'Document Comment:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Doc_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_document` */

insert  into `wipo_master_document`(`Master_Doc_Id`,`Doc_Code`,`Doc_Name`,`Doc_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'CUE','CUE-SHEET (AUDIOVISUAL MUSICAL WORKS DOC)','CUE-SHEET (AUDIOVISUAL MUSICAL WORKS DOC)','1','2015-03-16 03:59:26','0000-00-00 00:00:00'),(2,'INT','INTERNATIONAL DOCUMENTATION (FI, ETC.)','INTERNATIONAL DOCUMENTATION (FI, ETC.)','1','2015-03-16 03:59:38','0000-00-00 00:00:00'),(3,'WDF','WORK DECLARATION FORM','WORK DECLARATION FORM','1','2015-04-11 09:14:04','0000-00-00 00:00:00'),(6,'COM','LETTERS AND OTHER COMMUNICATIONS','','1','2015-06-02 11:08:35','0000-00-00 00:00:00'),(8,'WID','WID DECLARATION','','1','2015-06-02 11:08:35','0000-00-00 00:00:00'),(9,'RDF','RECORDING DECLARATION FORM','','1','2015-06-02 11:08:35','0000-00-00 00:00:00');

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

insert  into `wipo_master_document_status`(`Master_Document_Sts_Id`,`Document_Sts_Code`,`Document_Sts_Name`,`Document_Sts_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'N','Declared work','Declared work','1','2015-03-16 20:40:40','0000-00-00 00:00:00'),(2,'I','Work documented','work documented in an international file','1','2015-03-16 20:41:14','0000-00-00 00:00:00'),(3,'U','Undeclared national work','undeclared national work; the author has been invited to declare it','1','2015-03-16 20:41:34','0000-00-00 00:00:00'),(4,'V','Undocumented foreign work','undocumented foreign work which has been identified by the name of its author and for which the fees have been paid on the basis of the CISAC “Warsaw Rule”;','1','2015-03-16 20:41:56','0000-00-00 00:00:00'),(5,'W','Foreign work','foreign work for which the data have been transferred from the WWL or WID documentation','1','2015-03-16 20:42:16','0000-00-00 00:00:00'),(6,'Q','Unidentified work','unidentified work which has been entered in an inquiry list according to the CISAC rules','1','2015-03-16 20:42:30','0000-00-00 00:00:00'),(7,'X','Non-identified work','non-identified work which appeared in a statement of works performed, broadcast or reproduced','1','2015-03-16 20:42:43','0000-00-00 00:00:00'),(8,'Y','Worldwide non documented work','Worldwide non documented work (WID,WWL)','1','2015-03-16 20:43:01','0000-00-00 00:00:00');

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

insert  into `wipo_master_document_type`(`Master_Doc_Type_Id`,`Doc_Type_Name`,`Doc_Type_Comment`,`Doc_Type_Status_Id`,`Active`,`Created_Date`,`Rowversion`) values (1,'Declared','Declared',1,'1','2015-03-16 20:49:32','0000-00-00 00:00:00');

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

insert  into `wipo_master_event_type`(`Master_Evt_Type_Id`,`Evt_Type_Name`,`Evt_Type_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'Close','Establishment Closes','1','2015-03-16 04:08:13','0000-00-00 00:00:00'),(2,'Stop','Establishment Stop using the protected works ','1','2015-03-16 04:08:30','0000-00-00 00:00:00'),(3,'Terminate','Establishment Terminates the Contract','1','2015-03-16 04:08:39','0000-00-00 00:00:00'),(4,'Transfer','Establishment Transfers to other owner','1','2015-03-16 04:08:48','0000-00-00 00:00:00'),(5,'Other','Other types','1','2015-03-16 04:08:58','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_factor` */

DROP TABLE IF EXISTS `wipo_master_factor`;

CREATE TABLE `wipo_master_factor` (
  `Master_Factor_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Factor` decimal(10,2) NOT NULL,
  `Factor_Name` varchar(100) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Factor_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_factor` */

insert  into `wipo_master_factor`(`Master_Factor_Id`,`Factor`,`Factor_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'2.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),(2,'3.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),(3,'4.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),(4,'5.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),(5,'1.00','UNKNOWN WORKS/RECORDINGS','1','2015-05-31 13:01:14','0000-00-00 00:00:00'),(6,'0.16','JINGLES','0','2015-05-31 13:01:14','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_hierarchy` */

DROP TABLE IF EXISTS `wipo_master_hierarchy`;

CREATE TABLE `wipo_master_hierarchy` (
  `Master_Hierarchy_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Hierarchy_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Hierarchy_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_hierarchy` */

insert  into `wipo_master_hierarchy`(`Master_Hierarchy_Id`,`Hierarchy_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Full member','1','2015-04-02 00:41:25','0000-00-00 00:00:00'),(2,'Candidate Member','1','2015-04-02 00:46:07','0000-00-00 00:00:00'),(3,'Honorary Member','1','2015-04-02 00:50:28','0000-00-00 00:00:00'),(4,'Associate Member','1','2015-04-11 09:11:15','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_instrument` */

insert  into `wipo_master_instrument`(`Master_Inst_Id`,`Instrument_Code`,`Instrument_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'ACC','Accordion','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(2,'ALP','Alp Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(3,'ACL','Alto Carinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(4,'AFL','Alto flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(5,'AHN','Alto Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(6,'ARC','Alto Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(7,'ASX','Alto Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(8,'ALT','Alto Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(9,'AMP','Amplifier','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(10,'BAG','Bagpipes','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(11,'BKA','Balalaika','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(12,'BBF','Bamboo Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(13,'BDN','Bandoneon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(14,'BNJ','Banjo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(15,'BAR','Baritone Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(16,'BSX','Baritone Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(17,'BTN','Baritone Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(18,'BQF','Baroque Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(19,'BBT','Bass Baritone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(20,'BCL','Bass Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(21,'BDR','Bass Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(22,'BFT','Bass Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(23,'BGT','Bass Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(24,'BOB','Bass Oboe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(25,'BRC','Bass Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(26,'BSP','Bass Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(27,'BRT','Bass Trombone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(28,'BSS','Bass Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(29,'BHN','Basset Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(30,'BSN','Bassoon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(31,'BEL','Bells','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(32,'BNG','Bongos','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(33,'BOY','Boy Soprano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(34,'BGL','Bugle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(35,'CAR','Carillon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(36,'CST','Castanets','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(37,'CEL','Celesta','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(38,'CHM','Chimes','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(39,'CIM','Cimbalom','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(40,'CLR','Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(41,'CVD','Clavichord','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(42,'COM','Computer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(43,'CNB','Concertina','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(44,'CNG','Congas','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(45,'CBN','Contra Bassoon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(46,'CBC','Contrabass Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(47,'CCL','Contralto Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(48,'CAL','Contralto Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(49,'CNT','Cornet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(50,'CTN','Countertenor Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(51,'CYM','Cymbals','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(52,'DIJ','Didjeridu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(53,'DIZ','Dizi/D\'Tzu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(54,'DJM','Djembe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(55,'BASDBS','Double Bass','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(56,'DRM','Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(57,'DRK','Drum Kit/Drum Set','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(58,'DUL','Dulcimer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(59,'EFC','E-Flat Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(60,'EBG','Electric Bass Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(61,'EGT','Electric Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(62,'EOG','Electronic Organ','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(63,'ELL','Electronics, Live','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(64,'ELP','Electronics, Pre-recorded','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(65,'EHN','English Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(66,'ERH','Erhu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(67,'EUP','Euphonium','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(68,'FLG','Flugelhorn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(69,'FLT','Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(70,'FRN','French Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(71,'GHM','Glass Harmonica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(72,'GHP','Glass  Harp','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(73,'GLS','Glockenspiel','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(74,'GNG','Gong','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(75,'GTR','Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(76,'HBL','Handbells','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(77,'HAR','Harmonica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(78,'HRM','Harmonium','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(79,'HRP','Harp','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(80,'HPS','Harpsichord','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(81,'HCK','Heckelphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(82,'HRN','Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(83,'HUR','Hurdy-Gurdy','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(84,'KAZ','Kazoo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(85,'KEY','Keyboard','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(86,'KLV','Klavier','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(87,'KOT','Koto','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(88,'LUT','Lute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(89,'LYR','Lyre','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(90,'MAN','Mandolin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(91,'MCS','Maracas','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(92,'MAR','Marimba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(93,'MBR','Mbira','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(94,'MEL','Melodica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(95,'MEZ','Mezzo Soprano Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(96,'MID','Midi','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(97,'MSB','Music Box','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(98,'NAR','Narrator/Speaker','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(99,'NAF','Native American Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(100,'NHN','Natural Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(101,'OBO','Oboe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(102,'OBD','Oboe d\'Amore','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(103,'OND','Ondes Martinot','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(104,'ORG','Organ','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(105,'PWH','Pennywhistle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(106,'PER','Percussion','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(107,'PIA','Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(108,'PIC','Piccolo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(109,'PPA','Pipa','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(110,'PRP','Prepared Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(111,'PRO','Processor','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(112,'REC','Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(113,'RUA','Ruan','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(114,'SAM','Sampler','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(115,'SAX','Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(116,'SEQ','Sequencer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(117,'SHK','Shakuhachi','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(118,'SHM','Shamisen','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(119,'SHW','Shawm','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(120,'SHO','Sho','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(121,'SIT','Sitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(122,'SDM','Snare Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(123,'SNR','Sopranino Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(124,'SNS','Sopranino Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(125,'SRC','Soprano Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(126,'SSX','Soprano Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(127,'SOP','Soprano Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(128,'SOU','Sousaphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(129,'SPO','Spoons','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(130,'STD','Steel Drums','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(131,'SYN','Synthesizer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(132,'TAB','Tabla','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(133,'TAM','Tambour','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(134,'TMN','Tambourine','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(135,'TTM','TAMTAM','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(136,'TAP','Tape','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(137,'THN','Tenor Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(138,'TRC','Tenor Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(139,'TSX','Tenor Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(140,'TEN','Tenor Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(141,'THE','Theremin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(142,'TIM','Timpani','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(143,'TYP','Toy Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(144,'TRI','Triangle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(145,'TMB','Trombone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(146,'TRM','Trumpet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(147,'TBA','Tuba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(148,'UKE','Ukelele','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(149,'VIB','Vibraphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(150,'VID','Video','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(151,'VLA','Viola','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(152,'VDG','Viola Da Gamba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(153,'VLN','Violin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(154,'VCL','Violoncello','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(155,'VOC','Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(156,'WTB','Wagner Tuba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(157,'WHS','Whistle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(158,'WBK','Wood block','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(159,'XYL','Xylophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(160,'YQN','Yang Quin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(161,'ZHG','Zheng','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(162,'ZIT','Zither','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(163,'KEY','KEYBOARD','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),(164,'ORGAN','ORGAN','1','2015-05-31 13:05:03','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_internal_position` */

DROP TABLE IF EXISTS `wipo_master_internal_position`;

CREATE TABLE `wipo_master_internal_position` (
  `Master_Int_Post_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Int_Post_Code` varchar(10) DEFAULT NULL,
  `Int_Post_Name` varchar(90) NOT NULL COMMENT 'Internal position:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Int_Post_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_internal_position` */

insert  into `wipo_master_internal_position`(`Master_Int_Post_Id`,`Int_Post_Code`,`Int_Post_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'FM','Full member','1','2015-03-16 03:53:51','0000-00-00 00:00:00'),(3,'HM','Honorary Member','1','2015-04-11 09:27:12','0000-00-00 00:00:00'),(4,'PM','Provisional Member','1','2015-06-02 11:35:15','0000-00-00 00:00:00'),(6,'CM','Candidate Member','1','2015-06-02 11:35:15','0000-00-00 00:00:00');

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

insert  into `wipo_master_international_number`(`Master_International_Id`,`International_Number_Type`,`Active`,`Created_Date`,`Rowversion`) values (1,'IPI','1','2015-04-02 01:43:25','0000-00-00 00:00:00'),(2,'AV Index','1','2015-04-02 01:43:34','0000-00-00 00:00:00'),(3,'ISAN','1','2015-04-02 01:43:42','0000-00-00 00:00:00'),(4,'ISRC','1','2015-04-02 01:43:52','0000-00-00 00:00:00');

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

insert  into `wipo_master_label`(`Master_Label_Id`,`Label_Code`,`Label_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'NL','No Label','1','2015-05-10 16:10:05','0000-00-00 00:00:00'),(2,'SNY','Sony','1','2015-06-02 06:54:24','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_language` */

DROP TABLE IF EXISTS `wipo_master_language`;

CREATE TABLE `wipo_master_language` (
  `Master_Lang_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Lang_Code` varchar(10) DEFAULT NULL,
  `Lang_Name` varchar(45) NOT NULL COMMENT 'Language:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Lang_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_language` */

insert  into `wipo_master_language`(`Master_Lang_Id`,`Lang_Code`,`Lang_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'EN','English','1','2015-03-16 03:41:49','0000-00-00 00:00:00'),(5,'NE','Nepalese','1','2015-04-11 08:58:57','0000-00-00 00:00:00'),(9,'FR','French','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(11,'ES','Spanish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(12,'DE','German','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(13,'RU','Russian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(14,'OA','(Afan) Oromo','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(15,'AB','Abkhasian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(16,'AA','Afar','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(17,'AF','Afrikaans','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(18,'SQ','Albanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(19,'AM','Amharic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(20,'AR','Arabic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(21,'HY','Armenian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(22,'AS','Assamese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(23,'AY','Aymara','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(24,'AZ','Azerbaijani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(25,'BA','Bashkir','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(26,'EU','Basque','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(27,'BN','Bengali;Bangla','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(28,'DZ','Bhutani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(29,'BH','Bihari','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(30,'BI','Bislama','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(31,'BR','Breton','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(32,'BG','Bulgarian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(33,'MY','Burmese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(34,'BE','Byelorussian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(35,'KM','Cambodian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(36,'CA','Catalan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(37,'ZH','Chinese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(38,'CO','Corsican','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(39,'HR','Croatian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(40,'CS','Czech','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(41,'DA','Danish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(42,'NL','Dutch','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(43,'EO','Esperanto','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(44,'ET','Estonian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(45,'FO','Faeroese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(46,'FA','Farsi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(47,'FJ','Fiji','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(48,'FI','Finnish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(49,'FY','Frisian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(50,'GL','Galician','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(51,'KA','Georgian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(52,'EL','Greek','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(53,'KL','Greenlandic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(54,'GN','Guarani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(55,'GU','Gujarati','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(56,'HA','Hausa','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(57,'HW','Hawaii','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(58,'IW','Hebrew','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(59,'HI','Hindi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(60,'HU','Hungarian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(61,'IS','Icelandic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(62,'IN','Indonesian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(63,'IA','Interlingua','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(64,'IE','Interlingue','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(65,'IK','Inupiak','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(66,'GA','Irish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(67,'IT','Italian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(68,'JA','Japanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(69,'JW','Javanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(70,'KN','Kannada','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(71,'KS','Kashmiri','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(72,'KK','Kazakh','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(73,'RW','Kinyarwanda','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(74,'KY','Kirghiz','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(75,'RN','Kirundi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(76,'KO','Korean','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(77,'KU','Kurdish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(78,'LO','Laothian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(79,'LA','Latin','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(80,'LV','Latvian;Lettish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(81,'LN','Lingala','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(82,'LT','Lithuanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(83,'MK','Macedonian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(84,'MG','Malagasy','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(85,'MS','Malay','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(86,'ML','Malayalam','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(87,'MT','Maltese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(88,'MI','Maori','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(89,'MR','Marathi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(90,'MO','Moldavian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(91,'MN','Mongolian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(92,'NA','Nauru','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(94,'NO','Norwegian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(95,'OC','Occitan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(96,'OR','Oriya','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(97,'OM','Oromo','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(98,'PM','Papiamento','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(99,'PS','Pashto;Pushto','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(100,'FA','Persian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(101,'PL','Polish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(102,'PT','Portuguese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(103,'PA','Punjabi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(104,'QU','Quechua','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(105,'RM','Rhaeto-Romance','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(106,'RO','Romanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(107,'SM','Samoan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(108,'SG','Sangro','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(109,'SA','Sanskrit','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(110,'GD','Scots Gaelic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(111,'SR','Serbian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(112,'SH','Serbo-Croatian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(113,'ST','Sesotho','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(114,'TN','Setswana','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(115,'SN','Shona','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(116,'SD','Sindhi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(117,'SI','Singhalese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(118,'SS','Siswati','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(119,'SK','Slovak','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(120,'SL','Slovenian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(121,'SO','Somali','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(122,'SU','Sundanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(123,'SW','Swahili','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(124,'SV','Swedish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(125,'TL','Tagalog','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(126,'TG','Tajik','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(127,'TA','Tamil','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(128,'TT','Tatar','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(129,'TE','Tegulu','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(130,'TH','Thai','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(131,'BO','Tibetan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(132,'TI','Tigrinya','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(133,'TO','Tonga','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(134,'TS','Tsonga','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(135,'TR','Turkish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(136,'TK','Turkmen','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(137,'TW','Twi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(138,'UK','Ukrainian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(139,'UR','Urdu','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(140,'UZ','Uzbek','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(141,'VI','Vietnamese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(142,'VO','Volapuk','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(143,'CY','Welsh','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(144,'WO','Wolof','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(145,'XH','Xhosa','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(146,'JI','Yiddish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(147,'YO','Yoruba','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),(148,'ZU','Zulu','1','2015-05-31 14:06:06','0000-00-00 00:00:00');

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

insert  into `wipo_master_legal_form`(`Master_Legal_Form_Id`,`Legal_Form_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Limited company','1','2015-03-16 03:54:02','0000-00-00 00:00:00'),(2,'Partnership','1','2015-03-16 03:54:10','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_managed_rights` */

DROP TABLE IF EXISTS `wipo_master_managed_rights`;

CREATE TABLE `wipo_master_managed_rights` (
  `Master_Mgd_Rights_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Mgd_Rights_Name` varchar(90) NOT NULL COMMENT 'Managed rights:',
  `Mgd_Rights_Rank` smallint(6) DEFAULT '0',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Mgd_Rights_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_managed_rights` */

insert  into `wipo_master_managed_rights`(`Master_Mgd_Rights_Id`,`Mgd_Rights_Name`,`Mgd_Rights_Rank`,`Active`,`Created_Date`,`Rowversion`) values (1,'All rights',10,'1','2015-03-16 03:52:15','0000-00-00 00:00:00'),(2,'Exclusive rights',10,'1','2015-03-16 03:52:27','0000-00-00 00:00:00'),(3,'Equitable Remuneration',5,'0','2015-03-16 03:52:41','0000-00-00 00:00:00'),(4,'Neighboring Rights',10,'1','2015-03-16 03:52:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_marital_status` */

DROP TABLE IF EXISTS `wipo_master_marital_status`;

CREATE TABLE `wipo_master_marital_status` (
  `Master_Marital_State_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Marital_Code` varchar(10) DEFAULT NULL,
  `Marital_State` varchar(100) NOT NULL COMMENT 'Marital Status:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Marital_State_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_marital_status` */

insert  into `wipo_master_marital_status`(`Master_Marital_State_Id`,`Marital_Code`,`Marital_State`,`Active`,`Created_Date`,`Rowversion`) values (1,'SIN','SINGLE','1','2015-03-28 02:56:21','0000-00-00 00:00:00'),(2,'DIV','DIVORCED','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),(3,'LTD','LIMITED ','0','2015-06-02 11:29:37','0000-00-00 00:00:00'),(4,'MAR','MARRIED','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),(5,'PAT','PARTERNER','0','2015-06-02 11:29:37','0000-00-00 00:00:00'),(6,'REL','RELIGIOUS','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),(7,'WID','WIDOWED','1','2015-06-02 11:29:37','0000-00-00 00:00:00');

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

insert  into `wipo_master_module`(`Master_Module_ID`,`Module_Code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values (1,'INS','Installation','0','2015-02-19 02:09:40','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_nationality` */

DROP TABLE IF EXISTS `wipo_master_nationality`;

CREATE TABLE `wipo_master_nationality` (
  `Master_Nation_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Nation_Code` varchar(10) DEFAULT NULL,
  `Nation_Name` varchar(90) NOT NULL COMMENT 'Nationality:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Nation_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_nationality` */

insert  into `wipo_master_nationality`(`Master_Nation_Id`,`Nation_Code`,`Nation_Name`,`Active`,`Created_Date`,`Rowversion`) values (2,'NP','NEPAL','1','2015-03-16 03:40:20','0000-00-00 00:00:00'),(4,'MY','MALAYSIA','1','2015-03-16 03:40:35','0000-00-00 00:00:00'),(6,'WL','WORLD','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(7,'AF','AFGHANISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(8,'AL','ALBANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(9,'DZ','ALGERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(10,'AD','ANDORRA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(11,'AO','ANGOLA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(12,'AG','ANTIGUA AND BARBUDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(13,'AZ','AZERBAIJAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(14,'AR','ARGENTINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(15,'AU','AUSTRALIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(16,'AT','AUSTRIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(17,'BS','BAHAMAS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(18,'BH','BAHRAIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(19,'BD','BANGLADESH','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(20,'AM','ARMENIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(21,'BB','BARBADOS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(22,'BE','BELGIUM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(23,'BT','BHUTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(24,'BO','BOLIVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(25,'BA','BOSNIA AND HERZEGOVINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(26,'BW','BOTSWANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(27,'BR','BRAZIL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(28,'BZ','BELIZE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(29,'SB','SOLOMON ISLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(30,'BN','BRUNEI DARUSSALAM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(31,'BG','BULGARIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(32,'BU','BURMA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(33,'MM','MYANMAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(34,'BI','BURUNDI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(35,'BY','BELARUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(36,'KH','CAMBODIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(37,'CM','CAMEROON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(38,'CA','CANADA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(39,'CV','CAPE VERDE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(40,'CF','CENTRAL AFRICAN REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(41,'LK','SRI LANKA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(42,'TD','CHAD','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(43,'CL','CHILE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(44,'CN','CHINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(45,'TW','TAIWAN, PROVINCE OF CHINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(46,'CO','COLOMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(47,'KM','COMOROS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(48,'CG','CONGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(49,'ZR','ZAIRE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(50,'CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(51,'CR','COSTA RICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(52,'HR','CROATIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(53,'CU','CUBA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(54,'CY','CYPRUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(55,'CS','CZECHOSLOVAKIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(56,'CZ','CZECH REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(57,'BJ','BENIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(58,'DK','DENMARK','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(59,'DM','DOMINICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(60,'DO','DOMINICAN REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(61,'EC','ECUADOR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(62,'SV','EL SALVADOR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(63,'GQ','EQUATORIAL GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(64,'ER','ERITREA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(65,'EE','ESTONIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(66,'FJ','FIJI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(67,'FI','FINLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(68,'FR','FRANCE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(69,'PF','FRENCH POLYNESIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(70,'DJ','DJIBOUTI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(71,'GA','GABON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(72,'GE','GEORGIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(73,'GM','GAMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(74,'DE','GERMANY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(75,'DD','GERMAN DEMOCRATIC REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(76,'GH','GHANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(77,'KI','KIRIBATI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(78,'GR','GREECE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(79,'GD','GRENADA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(80,'GT','GUATEMALA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(81,'GN','GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(82,'GY','GUYANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(83,'HT','HAITI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(84,'VA','HOLY SEE (VATICAN CITY STATE)','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(85,'HN','HONDURAS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(86,'HK','HONG KONG','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(87,'HU','HUNGARY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(88,'IS','ICELAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(89,'IN','INDIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(90,'ID','INDONESIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(91,'IR','IRAN, ISLAMIC REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(92,'IQ','IRAQ','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(93,'IE','IRELAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(94,'IL','ISRAEL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(95,'IT','ITALY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(96,'CI','COTE D\'IVOIRE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(97,'JM','JAMAICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(98,'JP','JAPAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(99,'KZ','KAZAKSTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(100,'JO','JORDAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(101,'KE','KENYA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(102,'KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(103,'KR','KOREA, REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(104,'KW','KUWAIT','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(105,'KG','KYRGYZSTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(106,'LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(107,'LB','LEBANON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(108,'LS','LESOTHO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(109,'LV','LATVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(110,'LR','LIBERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(111,'LY','LIBYAN ARAB JAMAHIRIYA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(112,'LI','LIECHTENSTEIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(113,'LT','LITHUANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(114,'LU','LUXEMBOURG','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(115,'MG','MADAGASCAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(116,'MW','MALAWI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(118,'MV','MALDIVES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(119,'ML','MALI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(120,'MT','MALTA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(121,'MR','MAURITANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(122,'MU','MAURITIUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(123,'MX','MEXICO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(124,'MC','MONACO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(125,'MN','MONGOLIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(126,'MD','MOLDOVA, REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(127,'MA','MOROCCO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(128,'MZ','MOCAMBIQUE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(129,'OM','OMAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(130,'NA','NAMIBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(131,'NR','NAURU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(133,'NL','NETHERLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(134,'VU','VANUATU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(135,'NZ','NEW ZEALAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(136,'NI','NICARAGUA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(137,'NE','NIGER','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(138,'NG','NIGERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(139,'NO','NORWAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(140,'FM','MICRONESIA, FEDERATED STATES OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(141,'MH','MARSHALL ISLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(142,'PW','PALAU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(143,'PK','PAKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(144,'PA','PANAMA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(145,'PG','PAPUA NEW GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(146,'PY','PARAGUAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(147,'PE','PERU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(148,'PH','PHILIPPINES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(149,'PL','POLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(150,'PT','PORTUGAL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(151,'GW','GUINEA-BISSAU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(152,'PR','PUERTO RICO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(153,'QA','QATAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(154,'RO','ROMANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(155,'RU','RUSSIAN FEDERATION','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(156,'RW','RWANDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(157,'KN','SAINT KITTS AND NEVIS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(158,'LC','SAINT LUCIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(159,'VC','SAINT VINCENT AND THE GRENADINES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(160,'SM','SAN MARINO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(161,'ST','SAO TOME AND PRINCIPE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(162,'SA','SAUDI ARABIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(163,'SN','SENEGAL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(164,'SC','SEYCHELLES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(165,'SL','SIERRA LEONE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(166,'SG','SINGAPORE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(167,'SK','SLOVAKIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(168,'VN','VIET NAM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(169,'SI','SLOVENIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(170,'SO','SOMALIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(171,'ZA','SOUTH AFRICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(172,'ZW','ZIMBABWE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(173,'YD','YEMEN, DEMOCRATIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(174,'ES','SPAIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(175,'EH','WESTERN SAHARA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(176,'SD','SUDAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(177,'SR','SURINAME','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(178,'SZ','SWAZILAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(179,'SE','SWEDEN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(180,'CH','SWITZERLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(181,'SY','SYRIAN ARAB REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(182,'TJ','TAJIKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(183,'TH','THAILAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(184,'TG','TOGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(185,'TO','TONGA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(186,'TT','TRINIDAD AND TOBAGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(187,'AE','UNITED ARAB EMIRATES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(188,'TN','TUNISIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(189,'TR','TURKEY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(190,'TM','TURKMENISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(191,'TV','TUVALU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(192,'UG','UGANDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(193,'UA','UKRAINE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(194,'MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(195,'SU','USSR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(196,'EG','EGYPT','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(197,'GB','UNITED KINGDOM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(198,'TZ','TANZANIA, UNITED REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(199,'US','UNITED STATES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(200,'UY','URUGUAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(201,'UZ','UZBEKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(202,'VE','VENEZUELA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(203,'WS','SAMOA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(204,'YE','YEMEN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(205,'YU','YUGOSLAVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(206,'ZA','ZAMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(207,'BF','BURKINA FASO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(208,'KMP','KUMVI PROFFESSIONALS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),(209,'XX','UNKNOWN COUNTRY','1','2015-05-31 14:24:39','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_payment_method` */

DROP TABLE IF EXISTS `wipo_master_payment_method`;

CREATE TABLE `wipo_master_payment_method` (
  `Master_Paymode_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Paymode_Code` varchar(10) DEFAULT NULL,
  `Paymode_Name` varchar(45) NOT NULL COMMENT 'Payment Method:',
  `Paymode_Comment` varchar(90) NOT NULL COMMENT 'Payment Comment:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Paymode_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_payment_method` */

insert  into `wipo_master_payment_method`(`Master_Paymode_Id`,`Paymode_Code`,`Paymode_Name`,`Paymode_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'CH','CHEQUE','CHEQUE','1','2015-03-16 04:03:36','0000-00-00 00:00:00'),(2,'CS','CASH','CASH','1','2015-03-16 04:05:07','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_profession` */

DROP TABLE IF EXISTS `wipo_master_profession`;

CREATE TABLE `wipo_master_profession` (
  `Master_Profession_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Profession_Name` varchar(45) NOT NULL COMMENT 'Profession Title:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Profession_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_profession` */

insert  into `wipo_master_profession`(`Master_Profession_Id`,`Profession_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Singer','1','2015-03-16 03:47:52','0000-00-00 00:00:00'),(2,'Author','1','2015-04-11 09:40:59','0000-00-00 00:00:00'),(3,'Writer','1','2015-04-11 09:41:09','0000-00-00 00:00:00'),(4,'Guitarist','1','2015-04-11 09:41:21','0000-00-00 00:00:00'),(5,'Lyricist','1','2015-04-11 09:41:33','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_pseudonym_types` */

DROP TABLE IF EXISTS `wipo_master_pseudonym_types`;

CREATE TABLE `wipo_master_pseudonym_types` (
  `Pseudo_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Pseudo_Code` varchar(5) NOT NULL COMMENT 'Pseudonym Types:',
  `Pseudo_Fulltype` varchar(255) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pseudo_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_pseudonym_types` */

insert  into `wipo_master_pseudonym_types`(`Pseudo_Id`,`Pseudo_Code`,`Pseudo_Fulltype`,`Active`,`Created_Date`,`Rowversion`) values (1,'PP','PSEUDONYM, PEN NAME','1','2015-03-16 04:09:20','0000-00-00 00:00:00'),(2,'PA','PATRONYM','1','2015-03-16 04:09:24','0000-00-00 00:00:00'),(5,'PG','GROUP PSEUDONYM','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(6,'PC','COLLECTIVE PSEUDONYM','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(7,'DF','DIFFERENT SPELLING','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(8,'ST','STANDARDISED NAME','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(9,'MO','MODIFIED NAME, FORMER PATRONYN','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(10,'OR','OTHER REFERENCES  FOR LEGAL ENTITIES','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),(11,'HR','HOLDING REFERENCES FOR LEGAL ENTITIES','1','2015-06-02 11:18:00','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_record_type` */

DROP TABLE IF EXISTS `wipo_master_record_type`;

CREATE TABLE `wipo_master_record_type` (
  `Master_Rec_Type_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rec_Type_Name` varchar(255) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Rec_Type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_record_type` */

insert  into `wipo_master_record_type`(`Master_Rec_Type_Id`,`Rec_Type_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Normal','1','2015-06-02 06:32:54','0000-00-00 00:00:00'),(2,'Digital','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),(3,'Non identified','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),(4,'Other','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),(5,'Recording Sessions','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),(6,'Sound Carriers','1','2015-06-09 06:32:12','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_region` */

DROP TABLE IF EXISTS `wipo_master_region`;

CREATE TABLE `wipo_master_region` (
  `Master_Region_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Region_Code` varchar(10) DEFAULT NULL,
  `Region_Name` varchar(90) NOT NULL COMMENT 'Region:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Region_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_region` */

insert  into `wipo_master_region`(`Master_Region_Id`,`Region_Code`,`Region_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'NEP','NEPAL','1','2015-03-16 03:44:44','0000-00-00 00:00:00'),(3,'BLK','BALAKA','1','2015-03-16 03:44:57','0000-00-00 00:00:00'),(7,'BT','BLANTYRE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(8,'CK','CHIKWAWA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(9,'CP','CHITIPA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(10,'CZ','CHIRADZULU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(11,'DA','DOWA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(12,'DZ','DEDZA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(13,'KA','KARONGA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(14,'KK','NKHOTAKOTA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(15,'KU','KASUNGU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(16,'LA','LIKOMA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(17,'LL','LILONGWE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(18,'MC','MCHINJI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(19,'MH','MANGOCHI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(20,'MHG','MACHINGA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(21,'MJ','MULANJE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(22,'MN','MWANZA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(23,'MV','MVERA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(24,'MZ','MZUZU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(25,'MZI','MZIMBA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(26,'NE','NSANJE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(27,'NJ','NTAJA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(28,'NS','NTCHISI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(29,'NU','NTCHEU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(30,'PMB','PHALOMBE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(31,'SA','SALIMA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(32,'TO','THYOLO','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),(33,'ZA','ZOMBA','1','2015-06-02 11:23:47','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_role` */

insert  into `wipo_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values (1,'A','Admin','1','1','2015-03-15 01:02:31','0000-00-00 00:00:00'),(2,'DE','Data Entry','0','1','2015-03-15 00:39:04','0000-00-00 00:00:00'),(3,'DO','Documentation Officer','0','1','2015-03-15 00:52:51','0000-00-00 00:00:00'),(4,'DS','Distribution Office','0','1','2015-03-16 03:46:26','0000-00-00 00:00:00');

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

insert  into `wipo_master_screen`(`Master_Screen_ID`,`Module_ID`,`Screen_code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'COU','Country','0','2015-02-19 02:13:44','0000-00-00 00:00:00'),(2,1,'LAN','Languagae','0','2015-02-19 02:13:48','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_territories` */

DROP TABLE IF EXISTS `wipo_master_territories`;

CREATE TABLE `wipo_master_territories` (
  `Master_Territory_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Territory_Name` varchar(90) NOT NULL COMMENT 'Territory:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Territory_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_territories` */

insert  into `wipo_master_territories`(`Master_Territory_Id`,`Territory_Name`,`Active`,`Created_Date`,`Rowversion`) values (8,'Worldwide','1','2015-04-11 09:01:02','0000-00-00 00:00:00'),(9,'Asean','1','2015-04-11 09:01:14','0000-00-00 00:00:00'),(10,'AFGHANISTAN                                                                     ','1','2015-06-12 06:48:16','0000-00-00 00:00:00'),(11,'AFRICA                                                                          ','1','2015-06-12 06:48:27','0000-00-00 00:00:00'),(12,'ALBANIA                                                                         ','1','2015-06-12 06:48:40','0000-00-00 00:00:00'),(13,'ALGERIA                                                                         ','1','2015-06-12 06:48:49','0000-00-00 00:00:00'),(14,'AMERICA                                                                         ','1','2015-06-12 06:48:57','0000-00-00 00:00:00'),(15,'AMERICAN CONTINENT                                                              ','1','2015-06-12 06:49:08','0000-00-00 00:00:00'),(16,'ANDORRA                                                                         ','1','2015-06-12 06:49:16','0000-00-00 00:00:00'),(17,'ANGOLA                                                                          ','1','2015-06-12 06:49:23','0000-00-00 00:00:00'),(18,'ANTIGUA AND BARBUDA                                                             ','1','2015-06-12 06:49:33','0000-00-00 00:00:00'),(19,'ANTILLES                                                                        ','1','2015-06-12 06:49:43','0000-00-00 00:00:00'),(20,'APEC COUNTRIES                                                                  ','1','2015-06-12 06:49:52','0000-00-00 00:00:00'),(21,'ARGENTINA                                                                       ','1','2015-06-12 06:50:02','0000-00-00 00:00:00'),(22,'ARMENIA                                                                         ','1','2015-06-12 06:50:13','0000-00-00 00:00:00'),(23,'ASEAN COUNTRIES                                                                 ','1','2015-06-12 06:50:26','0000-00-00 00:00:00'),(24,'ASIA ','1','2015-06-12 06:50:48','0000-00-00 00:00:00'),(25,'AUSTRALASIA','1','2015-06-12 06:51:17','0000-00-00 00:00:00'),(26,'AUSTRALIA                                                                       ','1','2015-06-12 06:51:28','0000-00-00 00:00:00'),(27,'AZERBAIJAN                                                                      ','1','2015-06-12 06:51:37','0000-00-00 00:00:00'),(28,'BAHAMAS                                                                         ','1','2015-06-12 06:51:53','0000-00-00 00:00:00'),(29,'BAHRAIN                                                                         ','1','2015-06-12 06:52:01','0000-00-00 00:00:00'),(30,'BALKANS                                                                         ','1','2015-06-12 06:52:09','0000-00-00 00:00:00'),(31,'BALTIC STATES                                                                   ','1','2015-06-12 06:52:17','0000-00-00 00:00:00'),(32,'BANGLADESH                                                                      ','1','2015-06-12 06:52:26','0000-00-00 00:00:00'),(33,'BARBADOS                                                                        ','1','2015-06-12 06:52:40','0000-00-00 00:00:00'),(34,'BELARUS                                                                         ','1','2015-06-12 06:52:50','0000-00-00 00:00:00'),(35,'BELGIUM                                                                         ','1','2015-06-12 06:53:00','0000-00-00 00:00:00'),(36,'BOSNIA AND HERZEGOVINA                                                          ','1','2015-06-12 06:53:16','0000-00-00 00:00:00'),(37,'BRITISH WEST INDIES                                                             ','1','2015-06-12 06:53:27','0000-00-00 00:00:00'),(38,'BRITISH WEST INDIES                                                             ','1','2015-06-12 06:53:27','0000-00-00 00:00:00'),(39,'BRITISH ISLES                                                                   ','1','2015-06-12 06:53:35','0000-00-00 00:00:00'),(40,'BRUNEI DARUSSALAM                                                               ','1','2015-06-12 06:53:45','0000-00-00 00:00:00'),(41,'BURKINA FASO                                                                    ','1','2015-06-12 06:53:55','0000-00-00 00:00:00'),(42,'CAMBODIA                                                                        ','1','2015-06-12 06:54:10','0000-00-00 00:00:00'),(43,'CAMEROON                                                                        ','1','2015-06-12 06:54:17','0000-00-00 00:00:00'),(44,'CANADA                                                                          ','1','2015-06-12 06:54:24','0000-00-00 00:00:00'),(45,'CAPE VERDE                                                                      ','1','2015-06-12 06:54:37','0000-00-00 00:00:00'),(46,'CENTRAL AFRICA REGION                                                           ','1','2015-06-12 06:54:47','0000-00-00 00:00:00'),(47,'CENTRAL AFRICAN REPUBLIC                                                        ','1','2015-06-12 06:54:57','0000-00-00 00:00:00'),(48,'CENTRAL AMERICA                                                                 ','1','2015-06-12 06:55:10','0000-00-00 00:00:00'),(49,'COMMONWEALTH                                                                    ','1','2015-06-12 06:55:19','0000-00-00 00:00:00'),(50,'COMMONWEALTH AFRICAN TERRITORIES                                                ','1','2015-06-12 06:55:35','0000-00-00 00:00:00'),(51,'COMMONWEALTH ASIAN TERRITORIES                                                  ','1','2015-06-12 06:55:52','0000-00-00 00:00:00'),(52,'COMMONWEALTH AUSTRALASIAN TERRITORIES                                           ','1','2015-06-12 06:56:03','0000-00-00 00:00:00'),(53,'COMMONWEALTH OF INDEPENDENT STATES                                              ','1','2015-06-12 06:56:11','0000-00-00 00:00:00'),(54,'TAIWAN, PROVINCE OF CHINA                                                       ','1','2015-06-12 07:33:30','0000-00-00 00:00:00'),(55,'EQUATORIAL GUINEA                                                               ','1','2015-06-12 07:33:47','0000-00-00 00:00:00'),(56,'ETHIOPIA                                                                        ','1','2015-06-12 07:43:20','0000-00-00 00:00:00'),(57,'FRENCH POLYNESIA                                                                ','1','2015-06-12 07:43:49','0000-00-00 00:00:00'),(58,'FINLAND                                                                         ','1','2015-06-12 07:43:59','0000-00-00 00:00:00'),(59,'FRANCE                                                                          ','1','2015-06-12 07:44:26','0000-00-00 00:00:00'),(60,'DJIBOUTI                                                                        ','1','2015-06-12 07:44:36','0000-00-00 00:00:00'),(61,'GABON                                                                           ','1','2015-06-12 07:54:02','0000-00-00 00:00:00'),(62,'GEORGIA                                                                         ','1','2015-06-12 07:55:39','0000-00-00 00:00:00'),(63,'GAMBIA                                                                          ','1','2015-06-12 07:55:49','0000-00-00 00:00:00'),(64,'GERMANY                                                                         ','1','2015-06-12 07:55:58','0000-00-00 00:00:00'),(65,'GERMAN DEMOCRATIC REPUBLIC                                                      ','1','2015-06-12 07:56:08','0000-00-00 00:00:00'),(66,'KIRIBATI                                                                           ','1','2015-06-12 07:56:51','0000-00-00 00:00:00'),(67,'GREECE                                                                          ','1','2015-06-12 07:57:01','0000-00-00 00:00:00'),(68,'GRENADA                                                                         ','1','2015-06-12 07:57:09','0000-00-00 00:00:00'),(69,'GUATEMALA                                                                       ','1','2015-06-12 07:57:17','0000-00-00 00:00:00'),(70,'HOLY SEE (VATICAN CITY STATE)                                                   ','1','2015-06-12 07:57:29','0000-00-00 00:00:00'),(71,'HONDURAS                                                                        ','1','2015-06-12 07:57:37','0000-00-00 00:00:00'),(72,'HONG KONG                                                                       ','1','2015-06-12 07:57:44','0000-00-00 00:00:00'),(73,'HUNGARY                                                                         ','1','2015-06-12 07:57:52','0000-00-00 00:00:00'),(74,'ICELAND                                                                         ','1','2015-06-12 07:57:59','0000-00-00 00:00:00'),(75,'INDIA                                                                           ','1','2015-06-12 07:58:07','0000-00-00 00:00:00'),(76,'INDONESIA                                                                       ','1','2015-06-12 07:58:27','0000-00-00 00:00:00'),(77,'IRAN, ISLAMIC REPUBLIC OF                                                       ','1','2015-06-12 07:58:36','0000-00-00 00:00:00'),(78,'IRAQ                                                                            ','1','2015-06-12 07:59:10','0000-00-00 00:00:00'),(79,'IRELAND                                                                         ','1','2015-06-12 07:59:18','0000-00-00 00:00:00'),(80,'ISRAEL                                                                          ','1','2015-06-12 07:59:26','0000-00-00 00:00:00'),(81,'ITALY                                                                           ','1','2015-06-12 07:59:34','0000-00-00 00:00:00'),(82,'COTE D\'IVOIRE                                                                   ','1','2015-06-12 07:59:42','0000-00-00 00:00:00'),(83,'JAMAICA                                                                         ','1','2015-06-12 07:59:53','0000-00-00 00:00:00'),(84,'JAPAN                                                                           ','1','2015-06-12 08:00:02','0000-00-00 00:00:00'),(85,'KAZAKSTAN                                                                       ','1','2015-06-12 08:00:10','0000-00-00 00:00:00'),(86,'JORDAN                                                                          ','1','2015-06-12 08:00:18','0000-00-00 00:00:00'),(87,'KENYA                                                                           ','1','2015-06-12 08:00:26','0000-00-00 00:00:00'),(88,'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF                                          ','1','2015-06-12 08:00:34','0000-00-00 00:00:00'),(89,'KUWAIT                                                                          ','1','2015-06-12 08:00:47','0000-00-00 00:00:00'),(90,'KYRGYZSTAN                                                                      ','1','2015-06-12 08:00:57','0000-00-00 00:00:00'),(91,'LAO PEOPLE\'S DEMOCRATIC REPUBLIC                                                ','1','2015-06-12 08:01:49','0000-00-00 00:00:00'),(92,'LEBANON                                                                         ','1','2015-06-12 08:01:57','0000-00-00 00:00:00'),(93,'LESOTHO                                                                         ','1','2015-06-12 08:02:05','0000-00-00 00:00:00'),(94,'LIBERIA                                                                         ','1','2015-06-12 08:02:13','0000-00-00 00:00:00'),(95,'LIBYAN ARAB JAMAHIRIYA                                                          ','1','2015-06-12 08:10:32','0000-00-00 00:00:00'),(96,'LIECHTENSTEIN                                                                   ','1','2015-06-12 08:10:40','0000-00-00 00:00:00'),(97,'LUXEMBOURG                                                                      ','1','2015-06-12 08:10:49','0000-00-00 00:00:00'),(98,'MADAGASCAR                                                                      ','1','2015-06-12 08:10:58','0000-00-00 00:00:00'),(99,'MALAWI                                                                          ','1','2015-06-12 08:11:06','0000-00-00 00:00:00'),(100,'MALAYSIA                                                                        ','1','2015-06-12 08:11:13','0000-00-00 00:00:00'),(101,'MALDIVES                                                                        ','1','2015-06-12 08:11:19','0000-00-00 00:00:00'),(102,'MALI                                                                            ','1','2015-06-12 08:12:44','0000-00-00 00:00:00'),(103,'MAURITANIA                                                                      ','1','2015-06-12 08:13:07','0000-00-00 00:00:00'),(104,'MAURITIUS                                                                       ','1','2015-06-12 08:13:16','0000-00-00 00:00:00'),(105,'MEXICO                                                                          ','1','2015-06-12 08:13:25','0000-00-00 00:00:00'),(106,'MOLDOVA, REPUBLIC OF                                                            ','1','2015-06-12 08:13:35','0000-00-00 00:00:00'),(107,'MOZAMBIQUE                                                                      ','1','2015-06-12 08:13:44','0000-00-00 00:00:00'),(108,'NETHERLANDS                                                                     ','1','2015-06-12 08:13:54','0000-00-00 00:00:00'),(109,'NEPAL                                                                           ','1','2015-06-12 08:14:02','0000-00-00 00:00:00'),(110,'VANUATU                                                                         ','1','2015-06-12 08:14:10','0000-00-00 00:00:00'),(111,'NEW ZEALAND                                                                     ','1','2015-06-12 08:14:16','0000-00-00 00:00:00'),(112,'NICARAGUA                                                                       ','1','2015-06-12 08:14:24','0000-00-00 00:00:00'),(113,'NIGER                                                                           ','1','2015-06-12 08:14:32','0000-00-00 00:00:00'),(114,'NIGERIA                                                                         ','1','2015-06-12 08:14:40','0000-00-00 00:00:00'),(115,'MICRONESIA, FEDERATED STATES OF                                                 ','1','2015-06-12 08:14:53','0000-00-00 00:00:00'),(116,'NORWAY                                                                          ','1','2015-06-12 08:15:00','0000-00-00 00:00:00'),(117,'MARSHALL ISLANDS                                                                ','1','2015-06-12 08:15:08','0000-00-00 00:00:00'),(118,'PAKISTAN                                                                        ','1','2015-06-12 08:15:15','0000-00-00 00:00:00'),(119,'PANAMA                                                                          ','1','2015-06-12 08:15:23','0000-00-00 00:00:00'),(120,'PAPUA NEW GUINEA                                                                ','1','2015-06-12 08:15:30','0000-00-00 00:00:00'),(121,'PARAGUAY                                                                        ','1','2015-06-12 08:15:37','0000-00-00 00:00:00'),(122,'PERU                                                                            ','1','2015-06-12 08:15:45','0000-00-00 00:00:00'),(123,'PHILIPPINES                                                                     ','1','2015-06-12 08:15:51','0000-00-00 00:00:00'),(124,'POLAND                                                                          ','1','2015-06-12 08:15:58','0000-00-00 00:00:00'),(125,'PORTUGAL                                                                        ','1','2015-06-12 08:16:04','0000-00-00 00:00:00'),(126,'GUINEA-BISSAU                                                                   ','1','2015-06-12 08:16:10','0000-00-00 00:00:00'),(127,'PUERTO RICO                                                                     ','1','2015-06-12 08:16:18','0000-00-00 00:00:00'),(128,'QATAR                                                                           ','1','2015-06-12 08:16:29','0000-00-00 00:00:00'),(129,'ROMANIA                                                                         ','1','2015-06-12 08:16:35','0000-00-00 00:00:00'),(130,'RUSSIAN FEDERATION                                                              ','1','2015-06-12 08:16:44','0000-00-00 00:00:00'),(131,'RWANDA                                                                          ','1','2015-06-12 08:16:54','0000-00-00 00:00:00'),(132,'SAINT KITTS AND NEVIS                                                           ','1','2015-06-12 08:17:28','0000-00-00 00:00:00'),(133,'SAINT LUCIA                                                                     ','1','2015-06-12 08:17:35','0000-00-00 00:00:00'),(134,'SAINT VINCENT AND THE GRENADINES                                                ','1','2015-06-12 08:17:54','0000-00-00 00:00:00'),(135,'SAO TOME AND PRINCIPE                                                           ','1','2015-06-12 08:18:22','0000-00-00 00:00:00'),(136,'SAUDI ARABIA                                                                    ','1','2015-06-12 08:20:32','0000-00-00 00:00:00'),(137,'SENEGAL                                                                         ','1','2015-06-12 08:20:41','0000-00-00 00:00:00'),(138,'SIERRA LEONE                                                                    ','1','2015-06-12 08:21:23','0000-00-00 00:00:00'),(139,'SINGAPORE                                                                       ','1','2015-06-12 08:21:31','0000-00-00 00:00:00'),(140,'SLOVAKIA                                                                        ','1','2015-06-12 08:21:39','0000-00-00 00:00:00'),(141,'VIET NAM                                                                        ','1','2015-06-12 08:21:48','0000-00-00 00:00:00'),(142,'SOMALIA                                                                         ','1','2015-06-12 08:21:58','0000-00-00 00:00:00'),(143,'SOUTH AFRICA                                                                    ','1','2015-06-12 08:22:05','0000-00-00 00:00:00'),(144,'ZIMBABWE                                                                        ','1','2015-06-12 08:22:13','0000-00-00 00:00:00'),(145,'YEMEN, DEMOCRATIC                                                               ','1','2015-06-12 08:22:20','0000-00-00 00:00:00'),(146,'SPAIN                                                                           ','1','2015-06-12 08:22:27','0000-00-00 00:00:00'),(147,'WESTERN SAHARA                                                                  ','1','2015-06-12 08:22:33','0000-00-00 00:00:00'),(148,'SUDAN                                                                           ','1','2015-06-12 08:22:40','0000-00-00 00:00:00'),(149,'SWAZILAND                                                                       ','1','2015-06-12 08:22:50','0000-00-00 00:00:00'),(150,'SWEDEN                                                                          ','1','2015-06-12 08:22:58','0000-00-00 00:00:00'),(151,'SWITZERLAND                                                                     ','1','2015-06-12 08:23:05','0000-00-00 00:00:00'),(152,'SYRIAN ARAB REPUBLIC                                                            ','1','2015-06-12 08:23:14','0000-00-00 00:00:00'),(153,'TAJIKISTAN                                                                      ','1','2015-06-12 08:23:21','0000-00-00 00:00:00'),(154,'THAILAND                                                                        ','1','2015-06-12 08:23:29','0000-00-00 00:00:00'),(155,'TRINIDAD AND TOBAGO                                                             ','1','2015-06-12 08:23:40','0000-00-00 00:00:00'),(156,'UNITED ARAB EMIRATES                                                            ','1','2015-06-12 08:23:49','0000-00-00 00:00:00'),(157,'TUNISIA                                                                         ','1','2015-06-12 08:23:57','0000-00-00 00:00:00'),(158,'TURKEY                                                                          ','1','2015-06-12 08:24:05','0000-00-00 00:00:00'),(159,'TURKMENISTAN                                                                    ','1','2015-06-12 08:24:38','0000-00-00 00:00:00'),(160,'UGANDA                                                                          ','1','2015-06-12 08:24:48','0000-00-00 00:00:00'),(161,'UKRAINE                                                                         ','1','2015-06-12 08:24:56','0000-00-00 00:00:00'),(162,'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF                                      ','1','2015-06-12 08:25:02','0000-00-00 00:00:00'),(163,'EGYPT                                                                           ','1','2015-06-12 08:25:13','0000-00-00 00:00:00'),(164,'UNITED KINGDOM                                                                  ','1','2015-06-12 08:25:19','0000-00-00 00:00:00'),(165,'TANZANIA, UNITED REPUBLIC OF                                                    ','1','2015-06-12 08:25:27','0000-00-00 00:00:00'),(166,'UNITED STATES                                                                   ','1','2015-06-12 08:25:35','0000-00-00 00:00:00'),(167,'BURKINA FASO                                                                    ','1','2015-06-12 08:25:42','0000-00-00 00:00:00'),(168,'URUGUAY                                                                         ','1','2015-06-12 08:25:53','0000-00-00 00:00:00'),(169,'UZBEKISTAN                                                                      ','1','2015-06-12 08:26:00','0000-00-00 00:00:00'),(170,'VENEZUELA                                                                       ','1','2015-06-12 08:26:08','0000-00-00 00:00:00'),(171,'SAMOA                                                                           ','1','2015-06-12 08:26:14','0000-00-00 00:00:00'),(172,'YUGOSLAVIA (0890)                                                               ','1','2015-06-12 08:26:26','0000-00-00 00:00:00'),(173,'ZAMBIA                                                                          ','1','2015-06-12 08:26:33','0000-00-00 00:00:00'),(174,'WEST AFRICA REGION                                                              ','1','2015-06-12 08:27:07','0000-00-00 00:00:00'),(175,'WEST INDIES                                                                     ','1','2015-06-12 08:27:17','0000-00-00 00:00:00'),(176,'SOUTH EAST ASIA                                                                 ','1','2015-06-12 08:27:25','0000-00-00 00:00:00'),(177,'SOUTH AMERICA                                                                   ','1','2015-06-12 08:27:38','0000-00-00 00:00:00'),(178,'SCANDINAVIA                                                                     ','1','2015-06-12 08:27:49','0000-00-00 00:00:00'),(179,'OCEANIA                                                                         ','1','2015-06-12 08:27:57','0000-00-00 00:00:00'),(180,'NORTH AMERICA                                                                   ','1','2015-06-12 08:28:04','0000-00-00 00:00:00'),(181,'NORTH AFRICA                                                                    ','1','2015-06-12 08:28:11','0000-00-00 00:00:00'),(182,'NORDIC COUNTRIES                                                                ','1','2015-06-12 08:28:18','0000-00-00 00:00:00'),(183,'NAFTA COUNTRIES                                                                 ','1','2015-06-12 08:28:25','0000-00-00 00:00:00'),(184,'MIDDLE EAST                                                                     ','1','2015-06-12 08:28:33','0000-00-00 00:00:00'),(185,'GSA COUNTRIES                                                                   ','1','2015-06-12 08:28:40','0000-00-00 00:00:00'),(186,'EUROPEAN UNION                                                                  ','1','2015-06-12 08:28:46','0000-00-00 00:00:00'),(187,'EUROPEAN ECONOMIC COMMUNITY                                                     ','1','2015-06-12 08:28:53','0000-00-00 00:00:00'),(188,'EUROPEAN CONTINENT                                                              ','1','2015-06-12 08:29:04','0000-00-00 00:00:00'),(189,'EUROPEAN ECONOMIC AREA                                                          ','1','2015-06-12 08:29:13','0000-00-00 00:00:00'),(190,'EASTERN EUROPE                                                                  ','1','2015-06-12 08:29:22','0000-00-00 00:00:00'),(191,'SOUTH AFRICA REGION                                                             ','1','2015-06-12 08:30:01','0000-00-00 00:00:00'),(192,'EAST AFRICA REGION                                                              ','1','2015-06-12 08:30:22','0000-00-00 00:00:00');

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

insert  into `wipo_master_type`(`Master_Type_Id`,`Type_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Jazz','1','2015-04-02 00:56:59','0000-00-00 00:00:00'),(2,'Popular','1','2015-04-02 00:57:05','0000-00-00 00:00:00'),(3,'Serious','1','2015-04-02 00:57:16','0000-00-00 00:00:00'),(4,'Modern','1','2015-05-21 14:29:34','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_type_rights` */

insert  into `wipo_master_type_rights`(`Master_Type_Rights_Id`,`Type_Rights_Name`,`Type_Rights_Code`,`Type_Rights_Standard`,`Type_Rights_Rank`,`Type_Rights_Occupation`,`Type_Rights_Domain`,`Type_Right_Use`,`Active`,`Created_Date`,`Rowversion`) values (1,'MC- Music composer','MC','MC',3,'AU','C',NULL,'1','2015-03-16 03:48:28','0000-00-00 00:00:00'),(2,'Sub- Publisher','SE','SE',NULL,'PU','C',NULL,'1','2015-05-09 14:20:00','0000-00-00 00:00:00'),(4,'Other Musicians and Perfomers','OMP','OMP',NULL,'PE','R',NULL,'1','2015-05-22 08:49:23','0000-00-00 00:00:00'),(5,'Author, Writer, Lyricist','A','A',3,'AU','C',NULL,'1','2015-06-05 07:48:25','0000-00-00 00:00:00'),(6,'Composer','C','C',2,'AU','C',NULL,'1','2015-06-05 07:55:14','0000-00-00 00:00:00'),(7,'Composer/Author','CA','CA',1,'AU','C',NULL,'1','2015-06-05 07:55:31','0000-00-00 00:00:00'),(8,'Publisher','E','E',4,'PU','C',NULL,'1','2015-06-05 07:55:48','0000-00-00 00:00:00'),(9,'Lyricist','LY','LY',0,'AU','C',NULL,'1','2015-06-05 07:56:19','0000-00-00 00:00:00'),(11,'Producer','PRO','PRO',101,'PR','R',NULL,'1','2015-06-05 07:57:06','0000-00-00 00:00:00'),(12,'Sub-Author','SA','SA',0,'AU','C',NULL,'1','2015-06-05 07:57:23','0000-00-00 00:00:00'),(14,'Soloist, Lead Singer','SLC','SLC',0,'PE','R',NULL,'1','2015-06-05 08:10:28','0000-00-00 00:00:00'),(17,'Guest Singers, Musicians or Supporting Actor','AMG','AMG',112,'PE','R',NULL,'1','2015-06-05 08:11:44','0000-00-00 00:00:00'),(19,'Arranger','AR','AR',5,'AU','C',NULL,'1','2015-06-05 08:16:19','0000-00-00 00:00:00'),(21,'Sub-Arranger','SR','SR',0,'AU','C',NULL,'1','2015-06-05 08:17:10','0000-00-00 00:00:00'),(22,'Adapter / Translator','AD/TR','AD/TR',NULL,'AU','C',NULL,'1','2015-06-18 08:14:06','0000-00-00 00:00:00'),(23,'Music Publisher','EM','EM',NULL,'PU','C',NULL,'1','2015-06-18 08:14:56','0000-00-00 00:00:00');

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

insert  into `wipo_master_works_category`(`Master_Work_Category_Id`,`Work_Category_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'MW-Music works','1','2015-03-16 03:48:12','0000-00-00 00:00:00');

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

insert  into `wipo_number_assignment`(`Num_Assgn_Id`,`Num_Assgn_System_Id`,`Num_Assgn_Series_From`,`Num_Assgn_Series_To`,`Num_Assgn_List`,`Active`,`Created_Date`,`Rowversion`) values (2,'test',0,0,'5,2,4','1','2015-03-23 02:55:48','0000-00-00 00:00:00');

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
  `Perf_GUID` varchar(50) NOT NULL,
  `Perf_Is_Author` enum('Y','N') DEFAULT 'N',
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
  `Perf_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Acc_Id`),
  UNIQUE KEY `Internal_Code` (`Perf_Internal_Code`),
  UNIQUE KEY `Perf_GUID_unique` (`Perf_GUID`),
  KEY `Perf_Account_index` (`Perf_Place_Of_Birth_Id`,`Perf_Birth_Country_Id`,`Perf_Nationality_Id`,`Perf_Language_Id`,`Perf_Marital_Status_Id`),
  KEY `FK_wipo_performer_account_country` (`Perf_Birth_Country_Id`),
  KEY `FK_wipo_performer_account_nationality` (`Perf_Nationality_Id`),
  KEY `FK_wipo_performer_account_language` (`Perf_Language_Id`),
  KEY `FK_wipo_performer_account` (`Perf_Marital_Status_Id`),
  CONSTRAINT `FK_wipo_performer_account` FOREIGN KEY (`Perf_Marital_Status_Id`) REFERENCES `wipo_master_marital_status` (`Master_Marital_State_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_country` FOREIGN KEY (`Perf_Birth_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_language` FOREIGN KEY (`Perf_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_account_nationality` FOREIGN KEY (`Perf_Nationality_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account` */

insert  into `wipo_performer_account`(`Perf_Acc_Id`,`Perf_GUID`,`Perf_Is_Author`,`Perf_Sur_Name`,`Perf_First_Name`,`Perf_Internal_Code`,`Perf_Ipi`,`Perf_Ipi_Base_Number`,`Perf_Ipn_Number`,`Perf_DOB`,`Perf_Place_Of_Birth_Id`,`Perf_Birth_Country_Id`,`Perf_Nationality_Id`,`Perf_Language_Id`,`Perf_Identity_Number`,`Perf_Marital_Status_Id`,`Perf_Spouse_Name`,`Perf_Gender`,`Perf_Non_Member`,`Perf_Photo`,`Active`,`Created_Date`,`Rowversion`) values (1,'c08b8b32-14e4-11e5-b10a-74d435d335fe','N','Gilson','Nancy','SOC-P-0001001',NULL,NULL,NULL,'0000-00-00',1,2,2,1,'',1,'','F','Y',NULL,'1','2015-04-02 20:18:24','0000-00-00 00:00:00'),(2,'c08b8e11-14e4-11e5-b10a-74d435d335fe','N','Hammer','Mary','SOC-P-0001002',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,1,'',1,'','F','N',NULL,'1','2015-04-10 00:41:23','0000-00-00 00:00:00'),(3,'c08b8e9f-14e4-11e5-b10a-74d435d335fe','Y','Raison','Jeanne','SOC-AP-0000042',NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,1,'',1,'','F','N',NULL,'0','2015-04-10 02:30:09','0000-00-00 00:00:00'),(4,'c08b8f23-14e4-11e5-b10a-74d435d335fe','N','Lohani','Rajiv','SOC-P-0001004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',1,'','M','N',NULL,'1','2015-04-11 09:52:17','0000-00-00 00:00:00'),(6,'c08b8fa0-14e4-11e5-b10a-74d435d335fe','N','Gimhire','Narottham','SOC-P-0001006',NULL,NULL,NULL,'1969-02-12',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-04-21 22:58:40','0000-00-00 00:00:00'),(8,'c08b90a4-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jennifer','SOC-AP-0000031',NULL,2147483647,778965125,'0000-00-00',1,2,4,91,'RT-2323123',1,'Jane','F','N',NULL,'1','2015-06-07 03:47:03','0000-00-00 00:00:00'),(9,'c08b9021-14e4-11e5-b10a-74d435d335fe','N','Y','Willam','SOC-P-0001021',NULL,NULL,NULL,'1990-02-06',NULL,133,131,92,'',1,'','M','N',NULL,'1','2015-06-08 20:11:05','0000-00-00 00:00:00'),(10,'c08b9125-14e4-11e5-b10a-74d435d335fe','Y','Kiyosaki','Robert','SOC-AP-0000033',NULL,NULL,NULL,'2015-06-29',NULL,2,2,40,'',NULL,'','M','N','\\performeraccount\\767e4ee86cd5d5da2f6f8352019e20be.png','1','2015-06-08 20:20:25','0000-00-00 00:00:00'),(12,'c08b91a2-14e4-11e5-b10a-74d435d335fe','Y','P','Harry','SOC-AP-0000034',NULL,NULL,NULL,'1995-10-24',NULL,2,2,5,'',1,'','M','Y',NULL,'1','2015-06-09 04:18:04','0000-00-00 00:00:00'),(13,'c08b921d-14e4-11e5-b10a-74d435d335fe','N','Jack','Ron','SOC-P-0001011',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',1,'','M','N',NULL,'1','2015-06-09 04:18:30','0000-00-00 00:00:00'),(14,'c08b929b-14e4-11e5-b10a-74d435d335fe','Y','Mac','John','SOC-AP-0000032',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,NULL,'',1,'','M','N',NULL,'1','2015-06-09 06:11:47','0000-00-00 00:00:00'),(15,'c08b931c-14e4-11e5-b10a-74d435d335fe','Y','Atkinson','Rovan','SOC-AP-0000035',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',4,'','M','N',NULL,'1','2015-06-09 06:31:08','0000-00-00 00:00:00'),(17,'B7E7D492-BF77-58D3-F6BD-0C8234C44424','N','James','Hetfield','SOC-P-0001015',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-18 08:27:05','0000-00-00 00:00:00'),(18,'D911F66D-FECF-9144-1A55-A43D760D2E6A','N','Smith','Will','SOC-P-0001016',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-18 08:29:41','0000-00-00 00:00:00'),(72,'c08b3f47-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jenniferr','SOC-AP-0000036',NULL,2147483647,778965125,'0000-00-00',1,2,4,91,'RT-2323123',1,'Jane','F','N','\\authoraccount\\cc74aac1d77dc2f23cb0b4f8e8baf0b3.jpg','1','2015-06-22 13:02:10','0000-00-00 00:00:00'),(73,'A158E10A-2004-0FDF-54BB-FC625B6BB798','N','Jean','Mary','SOC-P-0001017',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',4,'','F','N','\\performeraccount\\776b5962c1b27d70b072fa3eac5c8bb6.png','1','2015-06-22 18:16:43','0000-00-00 00:00:00'),(74,'c08b43a7-14e4-11e5-b10a-74d435d335fe','Y','Mac','Johnn','SOC-AP-0000037',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,NULL,'',1,'','M','N',NULL,'1','2015-06-24 10:58:52','0000-00-00 00:00:00'),(75,'79B94C27-C1CC-D0FB-BCCC-A84107E32514','Y','Kumar','Vinod','SOC-AP-0000038',NULL,NULL,NULL,'2000-02-08',NULL,2,2,5,'',1,'','M','Y','\\authoraccount\\a16eaf21d156a28a715cbe2c1c583056.png','1','2015-06-24 11:01:22','0000-00-00 00:00:00'),(79,'E284DCAC-35A8-0BB9-65D9-0148FEAFE274','Y','Raj','Rajesh','SOC-AP-0000040',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-06-24 11:07:46','0000-00-00 00:00:00'),(84,'6170D906-040B-5C94-66C6-6BCC32E0CD1A','Y','Raj','Rajesh','SOC-A-0001031',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','Y',NULL,'1','2015-06-24 11:41:37','0000-00-00 00:00:00'),(85,'7A79C621-5298-A6A3-EE66-488F71A70DD1','N','Ramesh','Ram','SOC-P-0001018',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-24 11:45:05','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account_address` */

insert  into `wipo_performer_account_address`(`Perf_Addr_Id`,`Perf_Acc_Id`,`Perf_Home_Address_1`,`Perf_Home_Address_2`,`Perf_Home_Address_3`,`Perf_Home_Fax`,`Perf_Home_Telephone`,`Perf_Home_Email`,`Perf_Home_Website`,`Perf_Mailing_Address_1`,`Perf_Mailing_Address_2`,`Perf_Mailing_Address_3`,`Perf_Mailing_Telephone`,`Perf_Mailing_Fax`,`Perf_Mailing_Email`,`Perf_Mailing_Website`,`Perf_Author_Account_1`,`Perf_Author_Account_2`,`Perf_Author_Account_3`,`Perf_Performer_Account_1`,`Perf_Performer_Account_2`,`Perf_Performer_Account_3`,`Perf_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Test1','','','','12323123','test@etst.com','','Test','','','13123123','','test@etst.com','',NULL,NULL,NULL,'','','','Y','1','2015-04-02 20:25:12','0000-00-00 00:00:00'),(2,7,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','123213123','test@test.com','','','','','','','','Y','1','2015-06-04 05:03:40','0000-00-00 00:00:00'),(3,8,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-07 03:47:03','0000-00-00 00:00:00'),(4,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:06:56','0000-00-00 00:00:00'),(5,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:07:06','0000-00-00 00:00:00'),(6,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:07:46','0000-00-00 00:00:00'),(7,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:08:03','0000-00-00 00:00:00'),(8,10,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-08 20:52:14','0000-00-00 00:00:00'),(9,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-09 04:14:16','0000-00-00 00:00:00'),(10,10,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-09 04:14:30','0000-00-00 00:00:00'),(27,72,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-22 13:02:11','0000-00-00 00:00:00'),(28,72,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-22 13:19:24','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_performer_biograph_uploads`;

CREATE TABLE `wipo_performer_biograph_uploads` (
  `Perf_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Biogrph_Id` int(11) NOT NULL,
  `Perf_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Biogrph_Upl_Id`),
  KEY `FK_wipo_performer_biograph_uploads_biography` (`Perf_Biogrph_Id`),
  CONSTRAINT `FK_wipo_performer_biograph_uploads_biography` FOREIGN KEY (`Perf_Biogrph_Id`) REFERENCES `wipo_performer_biography` (`Perf_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_biograph_uploads` */

insert  into `wipo_performer_biograph_uploads`(`Perf_Biogrph_Upl_Id`,`Perf_Biogrph_Id`,`Perf_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,29,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg','2015-06-24 13:51:48','0000-00-00 00:00:00'),(2,29,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg','2015-06-24 13:51:48','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_biography` */

insert  into `wipo_performer_biography`(`Perf_Biogrph_Id`,`Perf_Acc_Id`,`Perf_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Test','1','2015-04-02 20:26:21','0000-00-00 00:00:00'),(2,8,'test','1','2015-06-07 03:47:03','0000-00-00 00:00:00'),(3,8,'test','1','2015-06-08 20:06:56','0000-00-00 00:00:00'),(4,8,'test','1','2015-06-08 20:07:06','0000-00-00 00:00:00'),(5,8,'test','1','2015-06-08 20:07:46','0000-00-00 00:00:00'),(6,8,'test','1','2015-06-08 20:08:03','0000-00-00 00:00:00'),(7,8,'test','1','2015-06-09 04:14:16','0000-00-00 00:00:00'),(20,72,'test','1','2015-06-22 13:02:11','0000-00-00 00:00:00'),(21,72,'test','1','2015-06-22 13:19:25','0000-00-00 00:00:00'),(22,74,'test','1','2015-06-24 10:58:52','0000-00-00 00:00:00'),(23,75,'Testete ettst','1','2015-06-24 11:01:22','0000-00-00 00:00:00'),(25,79,'Test','1','2015-06-24 11:07:46','0000-00-00 00:00:00'),(29,84,'test','1','2015-06-24 11:41:37','0000-00-00 00:00:00'),(32,3,'Test','1','2015-06-24 11:54:32','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_death_inheritance` */

insert  into `wipo_performer_death_inheritance`(`Perf_Death_Inhrt_Id`,`Perf_Acc_Id`,`Perf_Death_Inhrt_Firstname`,`Perf_Death_Inhrt_Surname`,`Perf_Death_Inhrt_Email`,`Perf_Death_Inhrt_Phone`,`Perf_Death_Inhrt_Address_1`,`Perf_Death_Inhrt_Address_2`,`Perf_Death_Inhrt_Address_3`,`Perf_Death_Inhrt_Addtion_Annotation`) values (1,1,'test','Tset','test@etead.com','test','test','test','test','test'),(2,8,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(3,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(4,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(5,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(6,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(7,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(8,14,'','Test','','','test','test','test','test'),(15,72,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(16,72,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note'),(17,74,'','Test','','','test','test','test','test');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_payment_method` */

insert  into `wipo_performer_payment_method`(`Perf_Pay_Id`,`Perf_Acc_Id`,`Perf_Pay_Method_id`,`Perf_Bank_Account_1`,`Perf_Bank_Account_2`,`Perf_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'test','test','test','1','2015-04-02 20:25:24','0000-00-00 00:00:00'),(2,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-07 03:47:03','0000-00-00 00:00:00'),(3,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:06:56','0000-00-00 00:00:00'),(4,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:07:06','0000-00-00 00:00:00'),(5,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:07:46','0000-00-00 00:00:00'),(6,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:08:03','0000-00-00 00:00:00'),(7,10,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-08 20:52:28','0000-00-00 00:00:00'),(8,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-09 04:14:16','0000-00-00 00:00:00'),(9,10,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-09 04:14:30','0000-00-00 00:00:00'),(16,72,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-22 13:02:11','0000-00-00 00:00:00'),(17,72,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-22 13:19:24','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_pseudonym` */

insert  into `wipo_performer_pseudonym`(`Perf_Pseudo_Id`,`Perf_Acc_Id`,`Perf_Pseudo_Type_Id`,`Perf_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,2,'PSH','1','2015-04-02 20:28:32','0000-00-00 00:00:00'),(2,4,1,'The Lo Man','1','2015-04-11 09:56:27','0000-00-00 00:00:00'),(3,8,1,'Jack','1','2015-06-07 03:47:03','0000-00-00 00:00:00'),(4,8,1,'Jack','1','2015-06-08 20:06:56','0000-00-00 00:00:00'),(5,8,1,'Jack','1','2015-06-08 20:07:06','0000-00-00 00:00:00'),(6,8,1,'Jack','1','2015-06-08 20:07:47','0000-00-00 00:00:00'),(7,8,1,'Jack','1','2015-06-08 20:08:03','0000-00-00 00:00:00'),(8,9,11,'PSH','1','2015-06-08 20:18:01','0000-00-00 00:00:00'),(9,8,1,'Jack','1','2015-06-09 04:14:16','0000-00-00 00:00:00'),(10,9,11,'PSH','1','2015-06-09 04:14:39','0000-00-00 00:00:00'),(16,72,1,'Jack','1','2015-06-22 13:02:11','0000-00-00 00:00:00'),(17,72,1,'Jack','1','2015-06-22 13:19:25','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_related_rights` */

insert  into `wipo_performer_related_rights`(`Perf_Rel_Rgt_Id`,`Perf_Acc_Id`,`Perf_Rel_Society_Id`,`Perf_Rel_Entry_Date`,`Perf_Rel_Exit_Date`,`Perf_Rel_Internal_Position_Id`,`Perf_Rel_Entry_Date_2`,`Perf_Rel_Exit_Date_2`,`Perf_Rel_Region_Id`,`Perf_Rel_Profession_Id`,`Perf_Rel_File`,`Perf_Rel_Duration`,`Perf_Rel_Avl_Work_Cat_Id`,`Perf_Rel_Type_Rght_Id`,`Perf_Rel_Managed_Rights_Id`,`Perf_Rel_Territories_Id`) values (1,1,10,'2015-03-31','2015-04-30',1,'2015-03-31','2015-03-31',1,NULL,NULL,'',1,1,1,8),(2,3,10,'2015-04-07','2015-04-30',1,'2015-04-07','2015-04-30',NULL,NULL,'',NULL,1,1,1,8),(3,4,10,'2015-04-09','2015-04-09',1,'2015-04-09','2015-04-09',NULL,NULL,NULL,NULL,1,1,2,8),(5,6,10,'2015-04-19','0000-00-00',1,'2015-04-19','2015-04-19',1,1,NULL,NULL,1,1,1,8),(6,9,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9),(7,10,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9),(8,8,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9),(9,17,11,'2015-06-17','0000-00-00',1,'2015-06-17','0000-00-00',NULL,NULL,'',NULL,1,1,1,8),(10,18,11,'2015-06-17','0000-00-00',1,'2015-06-17','0000-00-00',NULL,NULL,'',NULL,1,1,1,8),(12,85,10,'2015-06-24','2015-06-30',6,'2015-06-24','2015-06-30',NULL,NULL,'',NULL,1,1,1,8);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_upload` */

insert  into `wipo_performer_upload`(`Perf_Upl_Id`,`Perf_Acc_Id`,`Perf_Upl_Doc_Name`,`Perf_Upl_File`) values (9,1,'test 5','\\performerupload\\0c1165ada6b73a5f050436ffdc026c4e.jpg'),(10,1,'test','\\performerupload\\17bb30b1bcb4ab9548b8af97b82e0a89.jpg'),(12,7,'Performer upload','/performerupload/4d7140575e4c0daafd308890d69f11bf.txt'),(13,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(14,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(15,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(16,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(17,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(18,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(19,72,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(20,72,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg'),(26,84,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png');

/*Table structure for table `wipo_producer_account` */

DROP TABLE IF EXISTS `wipo_producer_account`;

CREATE TABLE `wipo_producer_account` (
  `Pro_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_GUID` varchar(50) NOT NULL,
  `Pro_Is_Publisher` enum('N','Y') NOT NULL DEFAULT 'N',
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
  `Pro_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pro_Acc_Id`),
  UNIQUE KEY `Pro_GUID_unique` (`Pro_GUID`),
  KEY `FK_wipo_producer_account_country` (`Pro_Country_Id`),
  KEY `FK_wipo_producer_account_legal_form` (`Pro_Legal_Form_id`),
  KEY `FK_wipo_producer_account_language` (`Pro_Language_Id`),
  CONSTRAINT `FK_wipo_producer_account_country` FOREIGN KEY (`Pro_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_language` FOREIGN KEY (`Pro_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_legal_form` FOREIGN KEY (`Pro_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account` */

insert  into `wipo_producer_account`(`Pro_Acc_Id`,`Pro_GUID`,`Pro_Is_Publisher`,`Pro_Corporate_Name`,`Pro_Internal_Code`,`Pro_Ipi`,`Pro_Ipi_Base_Number`,`Pro_Date`,`Pro_Place`,`Pro_Country_Id`,`Pro_Legal_Form_id`,`Pro_Reg_Date`,`Pro_Reg_Number`,`Pro_Excerpt_Date`,`Pro_Language_Id`,`Pro_Non_Member`,`Pro_Photo`,`Active`,`Created_Date`,`Rowversion`) values (4,'c08be234-14e4-11e5-b10a-74d435d335fe','Y','ABM Limited','SOC-EPR-0000008',NULL,NULL,'2015-04-22','',2,1,'0000-00-00','','2015-04-29',1,'Y','\\produceraccount\\beb0d5fa7972e3553160195e32a54ebc.jpeg','1','2015-04-29 18:21:39','0000-00-00 00:00:00'),(5,'c08f18ba-14e4-11e5-b10a-74d435d335fe','N','OPM Limited','SOC-PR-0000101',NULL,NULL,'2015-04-30','',2,1,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-04-30 19:21:11','0000-00-00 00:00:00'),(6,'c08f1a1f-14e4-11e5-b10a-74d435d335fe','N','Producer 079','SOC-PR-0000106',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-10 03:37:46','0000-00-00 00:00:00'),(7,'c08f1b48-14e4-11e5-b10a-74d435d335fe','N','Jerry Bruckheimer','SOC-PR-0000107',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 13:19:03','0000-00-00 00:00:00'),(8,'c08f1c62-14e4-11e5-b10a-74d435d335fe','N','MGM','SOC-PR-0000108',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 15:54:16','0000-00-00 00:00:00'),(9,'c08bbf35-14e4-11e5-b10a-74d435d335fe','Y','ACOL Limited','SOC-EPR-0000004',12321,3212323,'1989-02-02','',2,1,'2015-04-30','','0000-00-00',1,'Y','\\publisheraccount\\2d3af81b19fe80808ed3269b0f65c262.png','1','2015-06-09 04:20:37','0000-00-00 00:00:00'),(10,'c08f1ec6-14e4-11e5-b10a-74d435d335fe','Y','BGM Limited','SOC-EPR-0000005',8388607,8388607,'1991-02-26','Nepal',2,1,'2015-06-17','A8985-45794-T78','2015-04-16',1,'N',NULL,'1','2015-06-09 06:41:53','0000-00-00 00:00:00'),(14,'c08bb73b-14e4-11e5-b10a-74d435d335fe','Y','CAG Limited','SOC-E-0000113',NULL,NULL,'1999-02-01','',2,NULL,'0000-00-00','','2012-02-08',1,'N',NULL,'1','2015-06-24 14:02:30','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account_address` */

insert  into `wipo_producer_account_address`(`Pro_Addr_Id`,`Pro_Acc_Id`,`Pro_Head_Address_1`,`Pro_Head_Address_2`,`Pro_Head_Address_3`,`Pro_Head_Fax`,`Pro_Head_Telephone`,`Pro_Head_Email`,`Pro_Head_Website`,`Pro_Mailing_Address_1`,`Pro_Mailing_Address_2`,`Pro_Mailing_Address_3`,`Pro_Mailing_Telephone`,`Pro_Mailing_Fax`,`Pro_Mailing_Email`,`Pro_Mailing_Website`,`Pro_Publisher_Account_1`,`Pro_Publisher_Account_2`,`Pro_Publisher_Account_3`,`Pro_Producer_Account_1`,`Pro_Producer_Account_2`,`Pro_Producer_Account_3`,`Pro_Addr_Country_Id`,`Pro_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-09 04:20:37','0000-00-00 00:00:00'),(12,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-22 14:02:05','0000-00-00 00:00:00'),(13,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-24 12:20:02','0000-00-00 00:00:00');

/*Table structure for table `wipo_producer_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_producer_biograph_uploads`;

CREATE TABLE `wipo_producer_biograph_uploads` (
  `Pro_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Biogrph_Id` int(11) NOT NULL,
  `Pro_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Pro_Biogrph_Upl_Id`),
  KEY `FK_wipo_producer_biograph_uploads_biography` (`Pro_Biogrph_Id`),
  CONSTRAINT `FK_wipo_producer_biograph_uploads_biography` FOREIGN KEY (`Pro_Biogrph_Id`) REFERENCES `wipo_producer_biography` (`Pro_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_biograph_uploads` */

insert  into `wipo_producer_biograph_uploads`(`Pro_Biogrph_Upl_Id`,`Pro_Biogrph_Id`,`Pro_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,1,'\\producerbiographuploads\\4e4f9156628ac503b0a1dcc0d03ecda8.jpg','2015-06-24 13:52:27',NULL),(2,1,'\\producerbiographuploads\\c47f802a8188a06b0b7e73f717083b80.jpg','2015-06-24 13:52:27',NULL),(3,12,'\\publisherbiographuploads\\0214e065bb58a7014c3fbe27db2448dd.jpg','2015-06-24 14:01:13',NULL),(4,12,'\\publisherbiographuploads\\d8d4d7918913b4808b058478441f07ae.jpg','2015-06-24 14:01:13',NULL),(5,9,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg','2015-06-24 14:07:22',NULL),(6,13,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg','2015-06-24 14:07:22',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_biography` */

insert  into `wipo_producer_biography`(`Pro_Biogrph_Id`,`Pro_Acc_Id`,`Pro_Managers`,`Pro_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,9,'John','test','1','2015-06-09 04:20:37','0000-00-00 00:00:00'),(7,9,'John','test','1','2015-06-22 14:02:05','0000-00-00 00:00:00'),(8,9,'John','test','1','2015-06-24 12:20:02','0000-00-00 00:00:00'),(9,4,'Test','Test','1','2015-06-24 13:00:31','0000-00-00 00:00:00'),(12,14,'','Test','1','2015-06-24 14:02:30','0000-00-00 00:00:00'),(13,4,'Test','Test','1','2015-06-24 14:07:42','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_label_owner` */

insert  into `wipo_producer_label_owner`(`Label_Owner_Id`,`Pro_Acc_Id`,`Label_Id`,`Label_Owner_From`,`Label_Owner_To`,`Label_Share`,`Created_Date`,`Rowversion`) values (1,4,1,'2015-03-30','2015-06-03','100.00','2015-05-11 15:19:22','0000-00-00 00:00:00'),(2,4,1,'2015-05-01','2015-05-31','50.00','2015-05-12 06:54:32','0000-00-00 00:00:00'),(3,6,1,'2015-05-01','2015-05-31','50.00','2015-05-12 06:54:32','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_payment_method` */

insert  into `wipo_producer_payment_method`(`Pro_Pay_Id`,`Pro_Acc_Id`,`Pro_Pay_Method_id`,`Pro_Bank_Account`,`Pro_Bank_Code`,`Pro_Bank_Branch`,`Pro_Pay_Address`,`Pro_Pay_Iban`,`Pro_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`) values (1,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-09 04:20:37','0000-00-00 00:00:00'),(11,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-22 14:02:05','0000-00-00 00:00:00'),(12,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-24 12:20:02','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_pseudonym` */

insert  into `wipo_producer_pseudonym`(`Pro_Pseudo_Id`,`Pro_Acc_Id`,`Pro_Pseudo_Type_Id`,`Pro_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,9,1,'Producer','1','2015-06-09 04:20:37','0000-00-00 00:00:00'),(6,9,1,'Producer','1','2015-06-22 14:02:05','0000-00-00 00:00:00'),(7,9,1,'Producer','1','2015-06-24 12:20:02','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_related_rights` */

insert  into `wipo_producer_related_rights`(`Pro_Rel_Rgt_Id`,`Pro_Acc_Id`,`Pro_Rel_Society_Id`,`Pro_Rel_Entry_Date`,`Pro_Rel_Exit_Date`,`Pro_Rel_Internal_Position_Id`,`Pro_Rel_Entry_Date_2`,`Pro_Rel_Exit_Date_2`,`Pro_Rel_Region_Id`,`Pro_Rel_Profession_Id`,`Pro_Rel_File`,`Pro_Rel_Duration`,`Pro_Rel_Avl_Work_Cat_Id`,`Pro_Rel_Type_Rght_Id`,`Pro_Rel_Managed_Rights_Id`,`Pro_Rel_Territories_Id`,`Created_Date`,`Rowversion`) values (2,4,10,'2015-04-27','0000-00-00',1,'2015-04-27','2015-04-27',1,1,'',NULL,1,NULL,1,8,'2015-04-29 18:34:45','0000-00-00 00:00:00'),(3,5,10,'2015-04-29','2015-04-30',1,'2015-04-28','2015-04-30',1,1,'',NULL,1,NULL,1,8,'2015-04-30 19:22:00','0000-00-00 00:00:00'),(4,6,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-10 03:37:54','0000-00-00 00:00:00'),(5,7,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-13 13:19:10','0000-00-00 00:00:00'),(6,8,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-13 15:54:22','0000-00-00 00:00:00'),(7,14,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,NULL,'',NULL,1,11,1,8,'2015-06-24 14:02:55','0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_succession` */

/*Table structure for table `wipo_publisher_account` */

DROP TABLE IF EXISTS `wipo_publisher_account`;

CREATE TABLE `wipo_publisher_account` (
  `Pub_Acc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_GUID` varchar(50) NOT NULL,
  `Pub_Is_Producer` enum('N','Y') DEFAULT 'N',
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
  `Pub_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Acc_Id`),
  UNIQUE KEY `Pub_GUID_unique` (`Pub_GUID`),
  KEY `FK_wipo_publisher_account_country` (`Pub_Country_Id`),
  KEY `FK_wipo_publisher_account_legal_form` (`Pub_Legal_Form_id`),
  KEY `FK_wipo_publisher_account_language` (`Pub_Language_Id`),
  CONSTRAINT `FK_wipo_publisher_account_country` FOREIGN KEY (`Pub_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_language` FOREIGN KEY (`Pub_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_legal_form` FOREIGN KEY (`Pub_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account` */

insert  into `wipo_publisher_account`(`Pub_Acc_Id`,`Pub_GUID`,`Pub_Is_Producer`,`Pub_Corporate_Name`,`Pub_Internal_Code`,`Pub_Ipi`,`Pub_Ipi_Base_Number`,`Pub_Date`,`Pub_Place`,`Pub_Country_Id`,`Pub_Legal_Form_id`,`Pub_Reg_Date`,`Pub_Reg_Number`,`Pub_Excerpt_Date`,`Pub_Language_Id`,`Pub_Non_Member`,`Pub_Photo`,`Active`,`Created_Date`,`Rowversion`) values (3,'c08bb73b-14e4-11e5-b10a-74d435d335fe','Y','CAG Limited','SOC-E-0000113',NULL,NULL,'1999-02-01','',2,NULL,'0000-00-00','','2012-02-08',1,'N',NULL,'1','2015-04-18 18:13:15','0000-00-00 00:00:00'),(4,'c08bbb90-14e4-11e5-b10a-74d435d335fe','N','VEGA Limited','SOC-E-0000104',NULL,NULL,'2015-04-01','',2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-04-29 18:21:02','0000-00-00 00:00:00'),(5,'c08bbdb3-14e4-11e5-b10a-74d435d335fe','N','Publisher 079','SOC-E-0000109',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-10 03:36:56','0000-00-00 00:00:00'),(6,'c08bbe3c-14e4-11e5-b10a-74d435d335fe','N','Kiyosaki','SOC-E-0000110',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 13:17:52','0000-00-00 00:00:00'),(7,'c08bbeba-14e4-11e5-b10a-74d435d335fe','N','Trump','SOC-E-0000111',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 15:47:10','0000-00-00 00:00:00'),(8,'c08bbf35-14e4-11e5-b10a-74d435d335fe','Y','ACOL Limited','SOC-EPR-0000004',12321,3212323,'1989-02-02','',2,1,'2015-04-30','','0000-00-00',1,'Y','\\publisheraccount\\2d3af81b19fe80808ed3269b0f65c262.png','1','2015-06-12 05:45:04','0000-00-00 00:00:00'),(9,'c08bbfb2-14e4-11e5-b10a-74d435d335fe','Y','BGM Limited','SOC-EPR-0000005',8388607,8388607,'1991-02-26','Nepal',2,1,'2015-06-17','A8985-45794-T78','2015-04-16',1,'N',NULL,'1','2015-06-12 05:45:06','0000-00-00 00:00:00'),(14,'66A3BB28-26D7-59CC-3007-5EC39C38DA97','N','Man Power Tech','SOC-E-0000112',NULL,NULL,'2015-06-08',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N','\\publisheraccount\\4b566f403dd7e7a90b9e3ab9095ff892.jpeg','1','2015-06-22 18:17:32','0000-00-00 00:00:00'),(15,'c08be234-14e4-11e5-b10a-74d435d335fe','Y','ABM Limited','SOC-EPR-0000008',NULL,NULL,'2015-04-22','',2,1,'0000-00-00','','2015-04-29',1,'Y','\\produceraccount\\beb0d5fa7972e3553160195e32a54ebc.jpeg','1','2015-06-24 14:07:28','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account_address` */

insert  into `wipo_publisher_account_address`(`Pub_Addr_Id`,`Pub_Acc_Id`,`Pub_Head_Address_1`,`Pub_Head_Address_2`,`Pub_Head_Address_3`,`Pub_Head_Fax`,`Pub_Head_Telephone`,`Pub_Head_Email`,`Pub_Head_Website`,`Pub_Mailing_Address_1`,`Pub_Mailing_Address_2`,`Pub_Mailing_Address_3`,`Pub_Mailing_Telephone`,`Pub_Mailing_Fax`,`Pub_Mailing_Email`,`Pub_Mailing_Website`,`Pub_Publisher_Account_1`,`Pub_Publisher_Account_2`,`Pub_Publisher_Account_3`,`Pub_Producer_Account_1`,`Pub_Producer_Account_2`,`Pub_Producer_Account_3`,`Pub_Addr_Country_Id`,`Pub_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-04-18 15:38:27','0000-00-00 00:00:00'),(2,8,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-12 05:45:04','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_publisher_biograph_uploads`;

CREATE TABLE `wipo_publisher_biograph_uploads` (
  `Pub_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Biogrph_Id` int(11) NOT NULL,
  `Pub_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Biogrph_Upl_Id`),
  KEY `FK_wipo_publisher_biograph_uploads_biography` (`Pub_Biogrph_Id`),
  CONSTRAINT `FK_wipo_publisher_biograph_uploads_biography` FOREIGN KEY (`Pub_Biogrph_Id`) REFERENCES `wipo_publisher_biography` (`Pub_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_biograph_uploads` */

insert  into `wipo_publisher_biograph_uploads`(`Pub_Biogrph_Upl_Id`,`Pub_Biogrph_Id`,`Pub_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,2,'\\publisherbiographuploads\\b7742943b92909c750e387f629bc726c.png','2015-06-24 13:52:06','0000-00-00 00:00:00'),(2,2,'\\publisherbiographuploads\\0887c44de1adb0e2b0ae958217b884a5.jpg','2015-06-24 13:52:06','0000-00-00 00:00:00'),(3,3,'\\publisherbiographuploads\\0214e065bb58a7014c3fbe27db2448dd.jpg','2015-06-24 14:01:13','0000-00-00 00:00:00'),(4,3,'\\publisherbiographuploads\\d8d4d7918913b4808b058478441f07ae.jpg','2015-06-24 14:01:13','0000-00-00 00:00:00'),(5,4,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg','2015-06-24 14:07:22','0000-00-00 00:00:00'),(6,4,'\\publisherbiographuploads\\90c2e6de5d8d54266c06a6dd862f2e5a.jpg','2015-06-24 18:13:03','0000-00-00 00:00:00'),(7,4,'\\publisherbiographuploads\\e25a61ba7c78a73973e4dab2cca03980.jpg','2015-06-24 18:13:03','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_biography` */

insert  into `wipo_publisher_biography`(`Pub_Biogrph_Id`,`Pub_Acc_Id`,`Pub_Managers`,`Pub_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'John','test','1','2015-04-18 17:11:20','0000-00-00 00:00:00'),(2,8,'John','test','1','2015-06-12 05:45:04','0000-00-00 00:00:00'),(3,3,'','Test','1','2015-06-24 14:01:13','0000-00-00 00:00:00'),(4,15,'Test','Test','1','2015-06-24 14:07:28','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group` */

DROP TABLE IF EXISTS `wipo_publisher_group`;

CREATE TABLE `wipo_publisher_group` (
  `Pub_Group_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_GUID` varchar(50) NOT NULL,
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
  `Pub_Group_Photo` varchar(500) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Id`),
  UNIQUE KEY `Pub_Group_GUID_unique` (`Pub_Group_GUID`),
  KEY `FK_wipo_publisher_group_country` (`Pub_Group_Country_Id`),
  KEY `FK_wipo_publisher_group_language` (`Pub_Group_Language_Id`),
  KEY `FK_wipo_publisher_group_legal_form` (`Pub_Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_publisher_group_country` FOREIGN KEY (`Pub_Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_language` FOREIGN KEY (`Pub_Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_legal_form` FOREIGN KEY (`Pub_Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group` */

insert  into `wipo_publisher_group`(`Pub_Group_Id`,`Pub_Group_GUID`,`Pub_Group_Name`,`Pub_Group_Is_Publisher`,`Pub_Group_Is_Producer`,`Pub_Group_Internal_Code`,`Pub_Group_IPI_Name_Number`,`Pub_Group_IPN_Base_Number`,`Pub_Group_IPD_Number`,`Pub_Group_Date`,`Pub_Group_Place`,`Pub_Group_Country_Id`,`Pub_Group_Legal_Form_Id`,`Pub_Group_Language_Id`,`Pub_Group_Non_Member`,`Pub_Group_Photo`,`Active`,`Created_Date`,`Rowversion`) values (1,'c09838d2-14e4-11e5-b10a-74d435d335fe','Corporate name','1','0','SOC-GE-0000100',1232123,232123,232123123,'2015-04-18','Nepal',2,1,1,'N','\\publishergroup\\ce00e96a72725a1b8700b54e18fbec2c.png','1','2015-04-25 11:15:46','0000-00-00 00:00:00'),(2,'c0983a1b-14e4-11e5-b10a-74d435d335fe','Corporate name 2','1','0','SOC-GE-0000101',NULL,NULL,232123123,'2015-04-30','',2,1,1,'N','\\publishergroup\\b24c9fdfec30d93be1a7bd0760028248.png','1','2015-04-29 17:57:41','0000-00-00 00:00:00'),(3,'c0983adf-14e4-11e5-b10a-74d435d335fe','Corporate name 3','1','0','SOC-GE-0000102',NULL,NULL,232123123,'2015-05-27','',2,NULL,1,'N',NULL,'1','2015-04-30 14:41:29','0000-00-00 00:00:00'),(4,'c0983b9a-14e4-11e5-b10a-74d435d335fe','Producer Group 1','1','0','SOC-GE-0000108',NULL,NULL,NULL,'2015-05-01','',2,NULL,1,'N',NULL,'1','2015-05-10 03:38:35','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_publisher_group_biograph_uploads`;

CREATE TABLE `wipo_publisher_group_biograph_uploads` (
  `Pub_Group_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Biogrph_Id` int(11) NOT NULL,
  `Pub_Group_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Biogrph_Upl_Id`),
  KEY `FK_wipo_publisher_group_biograph_uploads_biography` (`Pub_Group_Biogrph_Id`),
  CONSTRAINT `FK_wipo_publisher_group_biograph_uploads_biography` FOREIGN KEY (`Pub_Group_Biogrph_Id`) REFERENCES `wipo_publisher_group_biography` (`Pub_Group_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_biograph_uploads` */

insert  into `wipo_publisher_group_biograph_uploads`(`Pub_Group_Biogrph_Upl_Id`,`Pub_Group_Biogrph_Id`,`Pub_Group_Biogrph_Upl_File`,`Created`,`Rowversion`) values (1,1,'\\publishergroupbiographuploads\\9e63185467b3395b4b5d9fcd0e2af3c9.jpeg','2015-06-24 13:52:56','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_biography`(`Pub_Group_Biogrph_Id`,`Pub_Group_Id`,`Pub_Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Annotation\r\n','1','2015-04-25 12:22:21','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_catalogue`(`Pub_Group_Cat_Id`,`Pub_Group_Id`,`Pub_Group_Cat_Number`,`Pub_Group_Cat_Start_Date`,`Pub_Group_Cat_End_Date`,`Pub_Group_Cat_Name`,`Pub_Group_Cat_Territory_Id`,`Pub_Group_Cat_Clasue`,`Pub_Group_Cat_Sign_Date`,`Pub_Group_Cat_File`,`Pub_Group_Cat_Reference`,`Created_Date`,`Rowversion`) values (1,1,'TYHDYHH','2015-04-01','2015-04-30','test',8,'S','2015-04-04','\\publishergroupcatalogue\\e0df07b76de54e541cc193ce90ed2afb.png',50,'2015-04-26 10:54:39','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_copyright_payment`(`Pub_Group_Pay_Copy_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Copy_Payee`,`Pub_Group_Pay_Copy_Rate`,`Pub_Group_Pay_Copy_Pay_Method`,`Pub_Group_Pay_Copy_Bank_Account`,`Created_Date`,`Rowversion`) values (1,1,'John mc','50.00',1,8388607,'2015-04-25 12:14:01','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_manage_rights` */

insert  into `wipo_publisher_group_manage_rights`(`Pub_Group_Mnge_Rgt_Id`,`Pub_Group_Id`,`Pub_Group_Mnge_Society_Id`,`Pub_Group_Mnge_Entry_Date`,`Pub_Group_Mnge_Exit_Date`,`Pub_Group_Mnge_Internal_Position_Id`,`Pub_Group_Mnge_Entry_Date_2`,`Pub_Group_Mnge_Exit_Date_2`,`Pub_Group_Mnge_Region_Id`,`Pub_Group_Mnge_Profession_Id`,`Pub_Group_Mnge_File`,`Pub_Group_Mnge_Duration`,`Pub_Group_Mnge_Avl_Work_Cat_Id`,`Pub_Group_Mnge_Type_Rght_Id`,`Pub_Group_Mnge_Managed_Rights_Id`,`Pub_Group_Mnge_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-23','2015-04-23',1,'2015-04-23','2015-04-23',1,1,'Test',NULL,1,1,1,8,'2015-04-25 11:34:17','0000-00-00 00:00:00'),(2,4,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-10 03:38:54','0000-00-00 00:00:00'),(3,2,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-13 15:50:40','0000-00-00 00:00:00');

/*Table structure for table `wipo_publisher_group_members` */

DROP TABLE IF EXISTS `wipo_publisher_group_members`;

CREATE TABLE `wipo_publisher_group_members` (
  `Pub_Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Member_GUID` varchar(50) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Pub_Group_Member_Id`),
  KEY `FK_wipo_publisher_group_biography_account_id` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_members_Internal_Code` (`Pub_Group_Member_GUID`),
  CONSTRAINT `FK_wipo_publisher_group_members_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_members` */

insert  into `wipo_publisher_group_members`(`Pub_Group_Member_Id`,`Pub_Group_Id`,`Pub_Group_Member_GUID`,`Created_Date`,`Rowversion`) values (10,1,'c08bbb90-14e4-11e5-b10a-74d435d335fe','2015-04-26 10:53:49','0000-00-00 00:00:00'),(12,2,'c08bb73b-14e4-11e5-b10a-74d435d335fe','2015-06-24 14:01:13','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_original_publisher`(`Pub_Group_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_IPI_Name_Number`,`Pub_Group_Org_IPI_Base_Number`,`Pub_Group_Org_Internal_Code`,`Pub_Group_Org_Name`,`Created_Date`,`Rowversion`) values (1,1,'ABCDRE','51545111','A1001','Vira','2015-04-25 17:26:46','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_original_share`(`Pub_Group_Share_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_Share_Broadcast`,`Pub_Group_Org_Share_Mechanical`,`Created_Date`,`Rowversion`) values (1,1,'50.00','60.00','2015-04-25 18:02:12','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_pseudonym`(`Pub_Group_Pseudo_Id`,`Pub_Group_Id`,`Pub_Group_Pseudo_Type_Id`,`Pub_Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'XALLY','1','2015-04-25 12:25:42','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_related_payment`(`Pub_Group_Pay_Rel_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Rel_Payee`,`Pub_Group_Pay_Rel_Rate`,`Pub_Group_Pay_Rel_Pay_Method`,`Pub_Group_Pay_Rel_Bank_Account`,`Created_Date`,`Rowversion`) values (1,1,'Rutherfold','60.00',3,8388607,'2015-04-25 12:19:04','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_representative`(`Pub_Group_Addr_Id`,`Pub_Group_Id`,`Pub_Group_Rep_Name`,`Pub_Group_Rep_Address_1`,`Pub_Group_Rep_Address_2`,`Pub_Group_Rep_Address_3`,`Pub_Group_Rep_Address_4`,`Pub_Group_Home_Address_1`,`Pub_Group_Home_Address_2`,`Pub_Group_Home_Address_3`,`Pub_Group_Home_Address_4`,`Pub_Group_Home_Fax`,`Pub_Group_Home_Telephone`,`Pub_Group_Home_Email`,`Pub_Group_Home_Website`,`Pub_Group_Mailing_Address_1`,`Pub_Group_Mailing_Address_2`,`Pub_Group_Mailing_Address_3`,`Pub_Group_Mailing_Address_4`,`Pub_Group_Mailing_Telephone`,`Pub_Group_Mailing_Fax`,`Pub_Group_Mailing_Email`,`Pub_Group_Mailing_Website`,`Pub_Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`) values (1,1,'Rep','','','','','1, Thomos street','','','','','959562','aaa@gmail.com','','10, J street','','','','232123123','','test@gmail.com','','Y','1','2015-04-25 12:32:41','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_sub_publisher`(`Pub_Group_Sub_Id`,`Pub_Group_Id`,`Pub_Group_Sub_IPI_Name_Number`,`Pub_Group_Sub_IPI_Base_Number`,`Pub_Group_Sub_Internal_Code`,`Pub_Group_Sub_Name`,`Created_Date`,`Rowversion`) values (1,1,'ABCDRE','123123123','12321312323','Rio','2015-05-01 23:27:57','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_group_sub_share`(`Pub_Group_Sub_Share_Id`,`Pub_Group_Id`,`Pub_Group_Sub_Share_Broadcast`,`Pub_Group_Sub_Share_Mechanical`,`Created_Date`,`Rowversion`) values (1,1,'90.00','100.00','2015-04-25 18:21:40','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_manage_rights` */

insert  into `wipo_publisher_manage_rights`(`Pub_Mnge_Rgt_Id`,`Pub_Acc_Id`,`Pub_Mnge_Society_Id`,`Pub_Mnge_Entry_Date`,`Pub_Mnge_Exit_Date`,`Pub_Mnge_Internal_Position_Id`,`Pub_Mnge_Entry_Date_2`,`Pub_Mnge_Exit_Date_2`,`Pub_Mnge_Region_Id`,`Pub_Mnge_Profession_Id`,`Pub_Mnge_File`,`Pub_Mnge_Duration`,`Pub_Mnge_Avl_Work_Cat_Id`,`Pub_Mnge_Type_Rght_Id`,`Pub_Mnge_Managed_Rights_Id`,`Pub_Mnge_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-17','2015-04-25',1,'2015-04-17','0000-00-00',1,1,'',NULL,1,1,2,8,NULL,'0000-00-00 00:00:00'),(2,3,10,'2015-04-01','2015-04-30',1,'2015-04-01','2015-04-30',1,1,'',NULL,1,1,1,8,NULL,'0000-00-00 00:00:00'),(3,4,10,'2015-04-27','0000-00-00',1,'2015-04-27','0000-00-00',1,1,'',NULL,1,1,1,8,'2015-04-29 18:23:54','0000-00-00 00:00:00'),(4,5,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-10 03:37:06','0000-00-00 00:00:00'),(5,6,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-13 13:18:09','0000-00-00 00:00:00'),(6,7,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-13 15:48:46','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_payment_method` */

insert  into `wipo_publisher_payment_method`(`Pub_Pay_Id`,`Pub_Acc_Id`,`Pub_Pay_Method_id`,`Pub_Bank_Account`,`Pub_Bank_Code`,`Pub_Bank_Branch`,`Pub_Pay_Address`,`Pub_Pay_Iban`,`Pub_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`) values (1,1,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-04-18 15:59:54','0000-00-00 00:00:00'),(2,8,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-12 05:45:04','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_pseudonym` */

insert  into `wipo_publisher_pseudonym`(`Pub_Pseudo_Id`,`Pub_Acc_Id`,`Pub_Pseudo_Type_Id`,`Pub_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,1,1,'Producer','1','2015-04-18 16:02:15','0000-00-00 00:00:00'),(2,8,1,'Producer','1','2015-06-12 05:45:04','0000-00-00 00:00:00');

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

insert  into `wipo_publisher_related_rights`(`Pub_Rel_Rgt_Id`,`Pub_Acc_Id`,`Pub_Rel_Society_Id`,`Pub_Rel_Entry_Date`,`Pub_Rel_Exit_Date`,`Pub_Rel_Internal_Position_Id`,`Pub_Rel_Entry_Date_2`,`Pub_Rel_Exit_Date_2`,`Pub_Rel_Region_Id`,`Pub_Rel_Profession_Id`,`Pub_Rel_File`,`Pub_Rel_Duration`,`Pub_Rel_Avl_Work_Cat_Id`,`Pub_Rel_Type_Rght_Id`,`Pub_Rel_Managed_Rights_Id`,`Pub_Rel_Territories_Id`,`Created_Date`,`Rowversion`) values (1,1,10,'2015-04-16','2015-04-30',1,'2015-04-16','2015-04-30',1,1,'',NULL,1,1,1,8,NULL,'0000-00-00 00:00:00');

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
  `Rcd_Record_Type_Id` int(11) NOT NULL,
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
  KEY `FK_wipo_recording_record_type` (`Rcd_Record_Type_Id`),
  KEY `FK_wipo_recording_document_sts` (`Rcd_Doc_Status_Id`),
  CONSTRAINT `FK_wipo_recording_document_sts` FOREIGN KEY (`Rcd_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_language` FOREIGN KEY (`Rcd_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_production_country` FOREIGN KEY (`Rcd_Product_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_record_country` FOREIGN KEY (`Rcd_Record_Country_id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_record_type` FOREIGN KEY (`Rcd_Record_Type_Id`) REFERENCES `wipo_master_record_type` (`Master_Rec_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_type` FOREIGN KEY (`Rcd_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording` */

insert  into `wipo_recording`(`Rcd_Id`,`Rcd_Title`,`Rcd_Language_Id`,`Rcd_Internal_Code`,`Rcd_Type_Id`,`Rcd_Date`,`Rcd_Duration`,`Rcd_Record_Country_id`,`Rcd_Product_Country_Id`,`Rcd_Doc_Status_Id`,`Rcd_Record_Type_Id`,`Rcd_Label_Id`,`Rcd_Reference`,`Rcd_File`,`Rcd_Isrc_Code`,`Rcd_Iswc_Number`,`Created_Date`,`Rowversion`) values (1,'Music Recording 1',5,'SOC-T-0000100',4,'2015-05-01','10:00:00',2,2,2,1,'1','RT23123','File','123231','1232123','2015-05-29 11:48:08','0000-00-00 00:00:00'),(4,'As long as ',5,'SOC-T-0000105',4,'2015-06-04','00:03:00',2,2,2,1,'1','','','','','2015-06-05 05:07:08','0000-00-00 00:00:00'),(5,'dookie',5,'SOC-T-0000106',4,'2015-06-06','00:03:00',2,2,1,1,'1','','','','','2015-06-07 17:05:06','0000-00-00 00:00:00'),(6,'nothing else matters',5,'SOC-T-0000107',4,'2015-06-09','00:05:00',2,2,2,1,'1','','','','','2015-06-09 19:16:02','0000-00-00 00:00:00'),(7,'ride the lightning',5,'SOC-T-0000108',4,'2015-06-09','00:05:00',2,2,2,1,'1','','','','','2015-06-10 02:44:26','0000-00-00 00:00:00'),(8,'Wild wild west',5,'SOC-T-0000109',4,'2015-06-11','00:03:00',2,2,2,1,'1','','','','','2015-06-12 07:19:17','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_link` */

insert  into `wipo_recording_link`(`Rcd_Link_Id`,`Rcd_Id`,`Rcd_Link_Title`,`Rcd_Perf_Id`,`Rcd_Prod_Id`,`Created_Date`,`Rowversion`) values (1,1,'Orginal TT',3,4,'2015-05-29 11:49:18','0000-00-00 00:00:00'),(2,1,'test',1,8,'2015-05-30 15:36:28','0000-00-00 00:00:00');

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

insert  into `wipo_recording_publication`(`Rcd_Publ_Id`,`Rcd_Id`,`Rcd_Publ_Internal_Code`,`Rcd_Publ_Year`,`Rcd_Publ_Country_Id`,`Rcd_Publ_Prod_Nation_Id`,`Created_Date`,`Rowversion`) values (1,1,'Test',2000,2,2,'2015-05-29 11:48:33','0000-00-00 00:00:00');

/*Table structure for table `wipo_recording_rightholder` */

DROP TABLE IF EXISTS `wipo_recording_rightholder`;

CREATE TABLE `wipo_recording_rightholder` (
  `Rcd_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Member_GUID` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_rightholder` */

insert  into `wipo_recording_rightholder`(`Rcd_Right_Id`,`Rcd_Id`,`Rcd_Member_GUID`,`Rcd_Right_Role`,`Rcd_Right_Equal_Share`,`Rcd_Right_Equal_Org_id`,`Rcd_Right_Blank_Share`,`Rcd_Right_Blank_Org_Id`,`Created_Date`,`Rowversion`) values (1,1,'c08b8fa0-14e4-11e5-b10a-74d435d335fe',14,'6.00',1,'9.00',1,'2015-06-17 18:35:19','0000-00-00 00:00:00'),(2,1,'c08b921d-14e4-11e5-b10a-74d435d335fe',14,'6.00',1,'9.00',1,'2015-06-17 18:35:19','0000-00-00 00:00:00'),(3,1,'c08f1c62-14e4-11e5-b10a-74d435d335fe',10,'5.00',1,'0.00',1,'2015-06-17 18:35:19','0000-00-00 00:00:00'),(4,4,'c08b8fa0-14e4-11e5-b10a-74d435d335fe',14,'6.00',1,'9.00',1,'2015-06-18 08:21:43','0000-00-00 00:00:00'),(5,4,'c08be234-14e4-11e5-b10a-74d435d335fe',11,'8.00',1,'7.00',1,'2015-06-18 08:21:43','0000-00-00 00:00:00'),(6,5,'c08b90a4-14e4-11e5-b10a-74d435d335fe',14,'3.00',1,'3.00',1,'2015-06-18 08:26:33','0000-00-00 00:00:00'),(7,5,'c08be234-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:26:33','0000-00-00 00:00:00'),(8,6,'B7E7D492-BF77-58D3-F6BD-0C8234C44424',14,'3.00',1,'3.00',1,'2015-06-18 08:28:38','0000-00-00 00:00:00'),(9,6,'c08f1a1f-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:28:38','0000-00-00 00:00:00'),(10,7,'B7E7D492-BF77-58D3-F6BD-0C8234C44424',14,'3.00',1,'3.00',1,'2015-06-18 08:29:11','0000-00-00 00:00:00'),(11,7,'c08f1d9d-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:29:11','0000-00-00 00:00:00'),(12,8,'D911F66D-FECF-9144-1A55-A43D760D2E6A',14,'3.00',1,'3.00',1,'2015-06-18 08:34:20','0000-00-00 00:00:00'),(13,8,'c08f1a1f-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:34:20','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_subtitle` */

insert  into `wipo_recording_subtitle`(`Rcd_Subtitle_Id`,`Rcd_Id`,`Rcd_Subtitle_Name`,`Rcd_Subtitle_Type_Id`,`Rcd_Subtitle_Language_Id`,`Created_Date`,`Rowversion`) values (1,1,'Music Subtitle 1',1,1,'2015-05-29 11:48:26','0000-00-00 00:00:00');

/*Table structure for table `wipo_share_definition_per_role` */

DROP TABLE IF EXISTS `wipo_share_definition_per_role`;

CREATE TABLE `wipo_share_definition_per_role` (
  `Shr_Def_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Shr_Def_Role` int(11) NOT NULL,
  `Shr_Def_Equ_remn` decimal(10,2) NOT NULL COMMENT 'Equitable remuneration',
  `Shr_Def_Blank_Tape_remn` decimal(10,2) NOT NULL COMMENT 'Blank tape remuneration rights',
  `Shr_Def_Neigh_Rgts` decimal(10,2) NOT NULL COMMENT 'Neighboring rights ',
  `Shr_Def_Excl_Rgts` decimal(10,2) NOT NULL COMMENT 'Exclusive rights',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Shr_Def_Id`),
  UNIQUE KEY `FK_wipo_share_definition_per_role_role` (`Shr_Def_Role`),
  CONSTRAINT `FK_wipo_share_definition_per_role` FOREIGN KEY (`Shr_Def_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_share_definition_per_role` */

insert  into `wipo_share_definition_per_role`(`Shr_Def_Id`,`Shr_Def_Role`,`Shr_Def_Equ_remn`,`Shr_Def_Blank_Tape_remn`,`Shr_Def_Neigh_Rgts`,`Shr_Def_Excl_Rgts`,`Active`,`Created_Date`,`Rowversion`) values (4,18,'9.00','7.00','5.00','3.00','1','2015-06-09 04:05:42','0000-00-00 00:00:00'),(5,21,'4.00','5.00','8.00','2.00','1','2015-06-09 04:05:54','0000-00-00 00:00:00'),(6,19,'2.00','7.00','4.00','6.00','1','2015-06-09 04:06:08','0000-00-00 00:00:00'),(7,20,'3.00','4.00','7.00','2.00','1','2015-06-09 04:06:18','0000-00-00 00:00:00'),(8,5,'1.00','2.00','5.00','4.00','1','2015-06-09 04:06:30','0000-00-00 00:00:00'),(9,6,'9.00','4.00','7.00','1.00','1','2015-06-09 04:06:42','0000-00-00 00:00:00'),(10,7,'1.00','4.00','7.00','9.00','1','2015-06-09 04:07:09','0000-00-00 00:00:00'),(11,15,'6.00','8.00','1.00','7.00','1','2015-06-09 04:07:21','0000-00-00 00:00:00'),(12,17,'2.00','2.00','2.00','2.00','1','2015-06-09 04:07:33','0000-00-00 00:00:00'),(13,9,'6.00','5.00','8.00','8.00','1','2015-06-09 04:07:57','0000-00-00 00:00:00'),(14,1,'6.00','8.00','4.00','5.00','1','2015-06-09 04:08:08','0000-00-00 00:00:00'),(15,4,'1.00','1.00','1.00','1.00','1','2015-06-09 04:08:18','0000-00-00 00:00:00'),(16,3,'9.00','6.00','4.00','1.00','1','2015-06-09 04:08:30','0000-00-00 00:00:00'),(17,11,'1.00','1.00','1.00','1.00','1','2015-06-09 04:08:43','0000-00-00 00:00:00'),(18,8,'6.00','8.00','4.00','7.00','1','2015-06-09 04:08:53','0000-00-00 00:00:00'),(19,12,'6.00','3.00','5.00','7.00','1','2015-06-09 04:09:05','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_society` */

insert  into `wipo_society`(`Society_Id`,`Society_Code`,`Society_Abbr_Id`,`Society_Logo_File`,`Society_Language_Id`,`Society_Mailing_Address`,`Society_Country_Id`,`Society_Territory_Id`,`Society_Region_Id`,`Society_Profession_Id`,`Society_Role_Id`,`Society_Hirearchy_Id`,`Society_Payment_Id`,`Society_Type_Id`,`Society_Factor`,`Society_Doc_Type_Id`,`Society_Doc_Id`,`Society_Duration`,`Society_CopyRight`,`Society_RelatedRights`,`Society_Currency_Id`,`Society_Rate`,`Society_Main_Performer_Id`,`Society_Producer_Id`,`Society_Subscription`,`Active`,`Created_Date`,`Rowversion`) values (10,'SOC',1,'\\organization\\05be13266f895a0a745d22795c280920.png',5,'',2,8,1,1,NULL,2,2,2,'50.50',1,3,5,10,10,NULL,'100.00','test','test',NULL,'1','2015-03-22 22:59:05','0000-00-00 00:00:00'),(11,'130',1,'/society/746aba7f86171a268fe475b55f9e8863.jpg',1,'Togo',2,8,1,2,1,2,1,2,'1.00',1,1,NULL,NULL,NULL,NULL,'0.00',NULL,NULL,'','1','2015-04-17 08:42:37','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wipo_user` */

insert  into `wipo_user`(`id`,`username`,`name`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin','admin','be2ce3b45176df1d3e41e35d6aa0ea9a44b56b3575e15ebc6da0d3da7793489b9eb718dc2cfe7f5f2bc61151ad4ffc70ba4d234520ed51735fa98ec878ddc27b',NULL,'vinodh.arumugam@me.com',1,'1',1413526995,1431398513),(3,'admin2','admin 2','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62','','vinodh@test1.com',1,'1',0,1426227686),(4,'admin3','admin 2','458881d833d40147f2de278c3a55cf27ef943c398ecd334b276065b70768862f181d4c2c326369a455cb182d794071251e71a5de4fe7b56870375a4e87d6d11c',NULL,'abcd@gmail.com',2,'0',0,0),(5,'vinodh','vinodh','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',NULL,'abcd@gmail.com',2,'1',0,0),(6,'simon','simon','4bbe08a84111a8e5b75178648e1bf6177798ccd82ce5d74ce1206431c9579060fa54d959c95f7e7773aaa5728b5b7b877da7123454b3b1a99b73510b2a4cdd3c',NULL,'simon@testabc.com',1,'1',0,0),(8,'boukary','boukary','60427b60877dcbc6622a6ed313b88c207c59302d7c179dc383758d4c3ae849f8d72554e6804b2393ddf9552273004d0944c069cb1bdd33e92bebb677e7555114',NULL,'boukary@testabe.com',1,'1',0,0),(9,'arumugam','Vinodh Arumugam','e8e41db655bada369f5aa1b77cb9e84cfad8712d8fa6e5048e80a469c4d25bbab8b40b05a9831ec94c8f06a0f368e772b2508c25cd8c21baec7a2f418d9943eb',NULL,'vinodh.arumugam@wipo.int',1,'1',0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work` */

insert  into `wipo_work`(`Work_Id`,`Work_Org_Title`,`Work_Language_Id`,`Work_Internal_Code`,`Work_Iswc`,`Work_Wic_Code`,`Work_Type_Id`,`Work_Factor_Id`,`Work_Instrumentation`,`Work_Duration`,`Work_Creation`,`Work_Opus_Number`,`Work_Unknown`,`Active`,`Created_Date`,`Rowversion`) values (1,'Music 1',5,'SOC-W-0000001','89841515','895515415',4,1,'[\"2\",\"3\"]','05:05:05',2015,5,'N','1','2015-05-21 14:30:00','0000-00-00 00:00:00'),(7,'Enter Sandman',5,'SOC-W-0000007','','',4,1,'[\"8\"]','00:03:00',2015,NULL,'N','1','2015-05-28 13:44:37','0000-00-00 00:00:00'),(11,'Just the two of us',5,'SOC-W-0000014','','',4,5,'[\"75\"]','00:03:00',2015,NULL,'N','1','2015-06-12 07:09:18','0000-00-00 00:00:00'),(14,'Old McDonalds',5,'SOC-W-0000017','','',4,5,'','00:03:00',2015,NULL,'N','1','2015-06-18 08:36:53','0000-00-00 00:00:00'),(15,'New Work',5,'SOC-W-0000018','','',4,5,'','05:00:00',2015,NULL,'N','1','2015-06-24 18:37:26','0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_biography` */

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_documentation` */

insert  into `wipo_work_documentation`(`Work_Doc_Id`,`Work_Id`,`Work_Doc_Status_Id`,`Work_Doc_Inclusion`,`Work_Doc_Dispute`,`Work_Doc_Type_Id`,`Work_Doc_Sign_Date`,`Work_Doc_File`,`Created_Date`,`Rowversion`) values (1,1,1,'Y','N',3,'2015-05-20','','2015-05-21 14:30:19','0000-00-00 00:00:00'),(2,2,1,'Y','N',1,'2015-05-20','test','2015-05-21 22:09:35','0000-00-00 00:00:00'),(3,3,1,'N','N',1,'2015-05-21','12312312','2015-05-22 13:02:37','0000-00-00 00:00:00'),(4,4,1,'N','N',1,'2015-05-25','','2015-05-26 10:48:08','0000-00-00 00:00:00'),(5,5,1,'N','N',1,'2015-05-25','','2015-05-26 14:06:29','0000-00-00 00:00:00'),(6,6,1,'N','N',1,'2015-05-25','wewe','2015-05-26 14:24:58','0000-00-00 00:00:00'),(7,7,1,'N','N',3,'2015-05-27','','2015-05-28 13:44:50','0000-00-00 00:00:00'),(8,8,1,'N','N',1,'2015-05-27','','2015-05-28 13:53:15','0000-00-00 00:00:00'),(9,11,1,'N','N',1,'2015-06-11','','2015-06-12 07:09:24','0000-00-00 00:00:00'),(10,12,1,'N','N',1,'2015-06-12','','2015-06-12 22:35:33','0000-00-00 00:00:00'),(11,13,1,'N','N',3,'2015-06-12','','2015-06-13 01:15:53','0000-00-00 00:00:00'),(12,14,1,'N','N',1,'2015-06-17','','2015-06-18 08:36:58','0000-00-00 00:00:00'),(13,15,1,'N','N',1,'2015-06-24','','2015-06-24 18:37:30','0000-00-00 00:00:00');

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
  `Work_Pub_Tacit` enum('Y','N') DEFAULT 'N',
  `Work_Pub_Renewal_Period` smallint(6) DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Pub_Id`),
  KEY `FK_wipo_work_publishing_territory` (`Work_Pub_Territories`),
  KEY `FK_wipo_work_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_publishing` */

insert  into `wipo_work_publishing`(`Work_Pub_Id`,`Work_Id`,`Work_Pub_Contact_Start`,`Work_Pub_Contact_End`,`Work_Pub_Territories`,`Work_Pub_Sign_Date`,`Work_Pub_File`,`Work_Pub_References`,`Work_Pub_Tacit`,`Work_Pub_Renewal_Period`,`Created_Date`,`Rowversion`) values (1,1,'2015-06-01','2015-06-30','[\"10\",\"11\"]','2015-06-17','Test',60,'N',1,'2015-06-17 18:21:09','0000-00-00 00:00:00'),(2,7,'2015-06-19','2020-06-23','[\"8\"]','2015-06-23','test',3,'Y',5,'2015-06-17 20:10:04','0000-00-00 00:00:00'),(3,11,'2015-06-01','2016-06-23','[\"8\"]','2015-06-23','Test',60,'Y',1,'2015-06-22 12:18:46','0000-00-00 00:00:00'),(4,15,'2015-06-01','2015-06-30','[\"10\",\"11\",\"12\",\"14\"]','2015-06-24','Test',60,'N',1,'2015-06-24 18:42:00','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_publishing_uploads` */

DROP TABLE IF EXISTS `wipo_work_publishing_uploads`;

CREATE TABLE `wipo_work_publishing_uploads` (
  `Work_Pub_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Pub_Id` int(11) NOT NULL,
  `Work_Pub_Upl_Name` varchar(255) DEFAULT NULL,
  `Work_Pub_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Pub_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_author` (`Work_Pub_Id`),
  CONSTRAINT `FK_wipo_work_publishing_uploads_publishing` FOREIGN KEY (`Work_Pub_Id`) REFERENCES `wipo_work_publishing` (`Work_Pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_publishing_uploads` */

insert  into `wipo_work_publishing_uploads`(`Work_Pub_Upl_Id`,`Work_Pub_Id`,`Work_Pub_Upl_Name`,`Work_Pub_Upl_File`,`Created`,`Rowversion`) values (1,4,'Contract1','\\workpublishinguploads\\6231ed8e22c699370de398504c550818.jpg','2015-06-24 18:42:24','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_rightholder` */

DROP TABLE IF EXISTS `wipo_work_rightholder`;

CREATE TABLE `wipo_work_rightholder` (
  `Work_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Member_GUID` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_rightholder` */

insert  into `wipo_work_rightholder`(`Work_Right_Id`,`Work_Id`,`Work_Member_GUID`,`Work_Right_Role`,`Work_Right_Broad_Share`,`Work_Right_Broad_Special`,`Work_Right_Broad_Org_id`,`Work_Right_Mech_Share`,`Work_Right_Mech_Special`,`Work_Right_Mech_Org_Id`,`Created_Date`,`Rowversion`) values (115,11,'c08b4443-14e4-11e5-b10a-74d435d335fe',7,'10.00','',1,'10.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00'),(116,11,'c08bbf35-14e4-11e5-b10a-74d435d335fe',8,'80.00','',1,'80.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00'),(117,11,'c08bbeba-14e4-11e5-b10a-74d435d335fe',2,'10.00','',1,'10.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00'),(141,7,'c08b4ad2-14e4-11e5-b10a-74d435d335fe',7,'35.00','',1,'40.00','',1,'2015-06-24 17:36:27','0000-00-00 00:00:00'),(142,7,'c08bbdb3-14e4-11e5-b10a-74d435d335fe',8,'10.00','',1,'45.00','',1,'2015-06-24 17:36:28','0000-00-00 00:00:00'),(143,7,'c08bbeba-14e4-11e5-b10a-74d435d335fe',2,'50.00','',1,'10.00','',1,'2015-06-24 17:36:28','0000-00-00 00:00:00'),(144,7,'c08b4443-14e4-11e5-b10a-74d435d335fe',7,'5.00','DI',1,'5.00','DI',1,'2015-06-24 17:36:28','0000-00-00 00:00:00'),(145,15,'c08b4443-14e4-11e5-b10a-74d435d335fe',19,'20.00','',1,'20.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00'),(146,15,'c08bbeba-14e4-11e5-b10a-74d435d335fe',8,'40.00','DI',1,'40.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00'),(147,15,'c08bbe3c-14e4-11e5-b10a-74d435d335fe',2,'25.00','',1,'25.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00'),(148,15,'c08b4964-14e4-11e5-b10a-74d435d335fe',5,'15.00','',1,'15.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00');

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
  `Work_Sub_Tacit` enum('Y','N') DEFAULT 'N',
  `Work_Sub_Renewal_Period` smallint(6) DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Sub_Id`),
  KEY `FK_wipo_work_sub_publishing_territory` (`Work_Sub_Territories`),
  KEY `FK_wipo_work_sub_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_sub_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_sub_publishing` */

insert  into `wipo_work_sub_publishing`(`Work_Sub_Id`,`Work_Id`,`Work_Sub_Contact_Start`,`Work_Sub_Contact_End`,`Work_Sub_Territories`,`Work_Sub_Clause`,`Work_Sub_Sign_Date`,`Work_Sub_File`,`Work_Sub_References`,`Work_Sub_Catelog_Number`,`Work_Sub_Tacit`,`Work_Sub_Renewal_Period`,`Created_Date`,`Rowversion`) values (2,7,'2015-06-01','2025-06-23','[\"8\"]','M','2015-06-22','Test',333,'TN762736273','Y',10,'2015-06-22 18:26:24','0000-00-00 00:00:00'),(3,15,'2015-06-01','2015-06-30','[\"8\"]','M','2015-06-24','',333,'TN762736273','N',1,'2015-06-24 18:42:14','0000-00-00 00:00:00');

/*Table structure for table `wipo_work_sub_publishing_uploads` */

DROP TABLE IF EXISTS `wipo_work_sub_publishing_uploads`;

CREATE TABLE `wipo_work_sub_publishing_uploads` (
  `Work_Sub_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Sub_Id` int(11) NOT NULL,
  `Work_Sub_Upl_Name` varchar(255) DEFAULT NULL,
  `Work_Sub_Upl_File` varchar(500) NOT NULL,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Work_Sub_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_author` (`Work_Sub_Id`),
  CONSTRAINT `FK_wipo_work_sub_publishing_uploads_subpublishing` FOREIGN KEY (`Work_Sub_Id`) REFERENCES `wipo_work_sub_publishing` (`Work_Sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_sub_publishing_uploads` */

insert  into `wipo_work_sub_publishing_uploads`(`Work_Sub_Upl_Id`,`Work_Sub_Id`,`Work_Sub_Upl_Name`,`Work_Sub_Upl_File`,`Created`,`Rowversion`) values (2,2,'Testing','\\worksubpublishinguploads\\4524c2eca29155111182e8fcfb363369.pdf','2015-06-22 19:04:37','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_subtitle` */

insert  into `wipo_work_subtitle`(`Work_Subtitle_Id`,`Work_Id`,`Work_Subtitle_Name`,`Work_Subtitle_Type_Id`,`Work_Subtitle_Language_Id`,`Created_Date`,`Rowversion`) values (3,7,'exit light',4,5,'2015-05-28 13:59:31','0000-00-00 00:00:00'),(4,7,'New subtitle',4,5,'2015-05-30 11:49:54','0000-00-00 00:00:00'),(5,1,'New sub title',4,5,'2015-06-12 06:37:33','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

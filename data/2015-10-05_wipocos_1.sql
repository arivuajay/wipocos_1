/*
SQLyog Trial v12.14 (32 bit)
MySQL - 5.6.14 : Database - wipocos_1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wipocos_1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wipocos_1`;

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
) ENGINE=InnoDB AUTO_INCREMENT=2830 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_audit_trail` */

insert  into `wipo_audit_trail`(`aud_id`,`aud_user`,`aud_class`,`aud_action`,`aud_message`,`aud_ip_address`,`aud_created_date`) values 
(1,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 22:55:48'),
(2,1,'user','site.authoraccount.update','Updated John  Mac AuthorAccount successfully.','122.174.109.122','2015-05-01 22:56:11'),
(3,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','122.174.109.122','2015-05-01 22:56:30'),
(4,1,'user','site.authoraccount.update','Updated Micheal  Geo AuthorAccount successfully.','122.174.109.122','2015-05-01 22:57:01'),
(5,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 22:58:47'),
(6,1,'music','site.performeraccount.update','Updated Performer Nancy C successfully.','122.174.109.122','2015-05-01 22:59:11'),
(7,1,'music','site.performeraccount.update','Updated Performer Mary Hammer successfully.','122.174.109.122','2015-05-01 22:59:45'),
(8,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','122.174.109.122','2015-05-01 23:00:04'),
(9,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','122.174.109.122','2015-05-01 23:00:10'),
(10,1,'music','site.performeraccount.update','Updated Performer Nancy Gilson successfully.','122.174.109.122','2015-05-01 23:00:25'),
(11,1,'group','site.publishergroup.update','Publisher Group Subcontracted Catalogue EG100 saved successfully.','122.174.109.122','2015-05-01 23:27:57'),
(12,1,'globe','site.mastercountry.delete','Deleted Country Nepal successfully.','122.174.109.122','2015-05-01 23:30:30'),
(13,1,'globe','site.mastercountry.delete','Deleted Country Indonisia successfully.','122.174.109.122','2015-05-01 23:30:44'),
(14,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.109.122','2015-05-01 23:34:21'),
(15,1,'globe','site.mastercountry.delete','Deleted Country Nepal successfully.','122.174.109.122','2015-05-01 23:34:31'),
(16,1,'user','site.default.login','admin logged-in successfully.','122.174.100.76','2015-05-09 14:14:31'),
(17,1,'at','site.mastertyperights.create','Created Type of Right Music Publisher successfully.','122.174.100.76','2015-05-09 14:20:00'),
(18,1,'at','site.mastertyperights.create','Created Type of Right Producer successfully.','122.174.100.76','2015-05-09 14:20:07'),
(19,1,'music','site.performeraccount.delete','Deleted Performer Test arumugam successfully.','110.159.120.210','2015-05-09 14:24:28'),
(20,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-09 14:30:05'),
(21,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-09 14:30:12'),
(22,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:31:01'),
(23,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.47','2015-05-09 14:31:12'),
(24,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.47','2015-05-09 14:35:54'),
(25,1,'user','site.default.login','admin logged-in successfully.','110.159.120.47','2015-05-09 14:36:01'),
(26,1,'user','site.default.profile','Updated a admin successfully.','110.159.120.47','2015-05-09 14:36:27'),
(27,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:36:32'),
(28,1,'user','site.default.login','admin logged-in successfully.','110.159.120.47','2015-05-09 14:36:45'),
(29,1,'user','site.default.logout','admin logged-out successfully.','122.174.100.76','2015-05-09 14:40:59'),
(30,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.47','2015-05-09 14:46:50'),
(31,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.47','2015-05-09 14:46:57'),
(32,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.47','2015-05-09 14:50:01'),
(33,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-09 14:51:48'),
(34,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-09 15:00:19'),
(35,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-09 15:05:28'),
(36,1,'user','site.default.login','admin logged-in successfully.','219.92.20.76','2015-05-10 03:35:07'),
(37,1,'microphone','site.publisheraccount.create','Created Publisher Publisher 079 successfully.','219.92.20.76','2015-05-10 03:36:56'),
(38,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Publisher 079 successfully.','219.92.20.76','2015-05-10 03:37:06'),
(39,1,'money','site.produceraccount.create','Created Producer Producer 079 successfully.','219.92.20.76','2015-05-10 03:37:46'),
(40,1,'money','site.produceraccount.update','Updated Producer Managed Rights Producer 079 successfully.','219.92.20.76','2015-05-10 03:37:54'),
(41,1,'group','site.publishergroup.create','Created Publisher Group EG108 successfully.','219.92.20.76','2015-05-10 03:38:35'),
(42,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG108 successfully.','219.92.20.76','2015-05-10 03:38:54'),
(43,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-11 14:57:44'),
(44,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-11 15:04:49'),
(45,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-11 15:05:00'),
(46,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','110.159.120.210','2015-05-11 15:19:22'),
(47,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-11 15:22:11'),
(48,1,'user','site.default.login','admin logged-in successfully.','175.143.54.201','2015-05-12 06:51:51'),
(49,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','175.143.54.201','2015-05-12 06:54:32'),
(50,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','175.143.54.201','2015-05-12 06:54:32'),
(51,1,'user','site.default.login','admin logged-in successfully.','122.174.87.88','2015-05-12 10:54:38'),
(52,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','122.174.87.88','2015-05-12 10:56:09'),
(53,1,'file-image-o','site.producerlabelowner.insertlabel','Created Producer label Sony successfully.','122.174.87.88','2015-05-12 10:56:09'),
(54,1,'user','site.masterlabel.update','Updated MasterLabel successfully.','122.174.87.88','2015-05-12 10:59:55'),
(55,5,'user','site.default.login','vinodh logged-in successfully.','121.121.108.238','2015-05-13 03:09:56'),
(56,5,'user','site.user.update','Updated User admin successfully.','121.121.108.238','2015-05-13 03:10:34'),
(57,5,'user','site.default.logout','vinodh logged-out successfully.','121.121.108.238','2015-05-13 03:10:47'),
(58,5,'user','site.default.login','vinodh logged-in successfully.','121.121.108.238','2015-05-13 03:11:33'),
(59,5,'user','site.default.logout','vinodh logged-out successfully.','121.121.108.238','2015-05-13 03:13:36'),
(60,1,'user','site.default.logout','admin logged-out successfully.','122.174.95.229','2015-05-13 06:01:24'),
(61,5,'user','site.default.login','Vinodh logged-in successfully.','113.210.128.238','2015-05-13 10:32:34'),
(62,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-13 12:51:52'),
(63,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-13 13:06:13'),
(64,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-13 13:06:21'),
(65,1,'user','site.default.profile','Updated a admin successfully.','110.159.120.210','2015-05-13 13:06:41'),
(66,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-13 13:06:47'),
(67,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-13 13:06:58'),
(68,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 13:17:00'),
(69,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 13:17:06'),
(70,1,'microphone','site.publisheraccount.create','Created Publisher Kiyosaki successfully.','210.195.47.109','2015-05-13 13:17:52'),
(71,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','210.195.47.109','2015-05-13 13:18:09'),
(72,1,'user','site.authoraccount.create','Created a Robert  Kiyosaki successfully.','210.195.47.109','2015-05-13 13:18:27'),
(73,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Managed Rights successfully.','210.195.47.109','2015-05-13 13:18:37'),
(74,1,'money','site.produceraccount.create','Created Producer Jerry Bruckheimer successfully.','210.195.47.109','2015-05-13 13:19:03'),
(75,1,'money','site.produceraccount.update','Updated Producer Managed Rights Jerry Bruckheimer successfully.','210.195.47.109','2015-05-13 13:19:10'),
(76,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 14:19:46'),
(77,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:20:16'),
(78,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:20:51'),
(79,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:21:07'),
(80,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:21:33'),
(81,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:21:44'),
(82,5,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','210.195.47.109','2015-05-13 14:22:43'),
(83,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:23:05'),
(84,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 14:23:17'),
(85,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 14:23:23'),
(86,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 14:23:30'),
(87,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-13 14:41:27'),
(88,5,'user','site.default.login','vinodh logged-in successfully.','110.159.120.210','2015-05-13 14:41:42'),
(89,5,'user','site.default.logout','vinodh logged-out successfully.','110.159.120.210','2015-05-13 14:48:43'),
(90,1,'user','site.default.logout','admin logged-out successfully.','210.195.47.109','2015-05-13 15:17:26'),
(91,5,'user','site.default.login','vinodh logged-in successfully.','210.195.47.109','2015-05-13 15:17:31'),
(92,5,'user','site.default.logout','vinodh logged-out successfully.','210.195.47.109','2015-05-13 15:17:52'),
(93,1,'user','site.default.login','admin logged-in successfully.','210.195.47.109','2015-05-13 15:17:58'),
(94,1,'users','site.group.update','Updated a Metallica successfully.','210.195.47.109','2015-05-13 15:37:24'),
(95,1,'users','site.group.update','Updated a Metallica successfully.','210.195.47.109','2015-05-13 15:37:30'),
(96,1,'users','site.group.update','Managed Rights Saved on Metallica successfully.','210.195.47.109','2015-05-13 15:37:41'),
(97,1,'users','site.group.update','Memeber Saved on Metallica successfully.','210.195.47.109','2015-05-13 15:37:48'),
(98,1,'microphone','site.publisheraccount.create','Created Publisher Trump successfully.','210.195.47.109','2015-05-13 15:47:11'),
(99,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Trump successfully.','210.195.47.109','2015-05-13 15:48:46'),
(100,1,'group','site.publishergroup.update','Updated Publisher Group EG101 successfully.','210.195.47.109','2015-05-13 15:50:32'),
(101,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights EG101 successfully.','210.195.47.109','2015-05-13 15:50:40'),
(102,1,'group','site.publishergroup.update','Updated Publisher Group Memeber EG101 successfully.','210.195.47.109','2015-05-13 15:50:46'),
(103,1,'money','site.produceraccount.create','Created Producer MGM successfully.','210.195.47.109','2015-05-13 15:54:16'),
(104,1,'money','site.produceraccount.update','Updated Producer Managed Rights MGM successfully.','210.195.47.109','2015-05-13 15:54:22'),
(105,1,'user','site.default.login','Admin logged-in successfully.','175.140.226.140','2015-05-14 12:43:25'),
(106,1,'user','site.default.login','admin logged-in successfully.','122.174.95.102','2015-05-14 12:59:49'),
(107,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-17 03:26:40'),
(108,1,'user','site.default.logout','admin logged-out successfully.','122.174.86.6','2015-05-21 06:23:36'),
(109,1,'list','site.mastertype.create','Created Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:34'),
(110,1,'list','site.mastertype.create','Created Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:35'),
(111,1,'list','site.mastertype.delete','Deleted Master Type Modern successfully.','122.174.114.43','2015-05-21 14:29:39'),
(112,1,'sliders','site.work.create','Created Work successfully.','122.174.114.43','2015-05-21 14:30:00'),
(113,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.114.43','2015-05-21 14:30:19'),
(114,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.114.43','2015-05-21 14:31:55'),
(115,1,'sliders','site.work.create','Created Work successfully.','110.159.120.210','2015-05-21 22:09:15'),
(116,1,'sliders','site.work.update','Saved Work Documentation successfully.','110.159.120.210','2015-05-21 22:09:36'),
(117,1,'sliders','site.work.update','Saved Work right holder successfully.','110.159.120.210','2015-05-21 22:13:19'),
(118,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-21 22:42:50'),
(119,1,'user','site.default.login','admin logged-in successfully.','110.159.120.210','2015-05-21 22:43:10'),
(120,1,'user','site.default.logout','admin logged-out successfully.','110.159.120.210','2015-05-21 22:43:32'),
(121,1,'user','site.default.login','admin logged-in successfully.','122.174.127.79','2015-05-22 07:02:07'),
(122,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 07:53:37'),
(123,1,'at','site.mastertyperights.update','Updated Type of Right Music Publisher successfully.','122.174.127.79','2015-05-22 08:48:30'),
(124,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.127.79','2015-05-22 08:48:42'),
(125,1,'at','site.mastertyperights.update','Updated Type of Right Music Publisher successfully.','122.174.127.79','2015-05-22 08:48:59'),
(126,1,'at','site.mastertyperights.create','Created Type of Right Performer successfully.','122.174.127.79','2015-05-22 08:49:24'),
(127,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 09:10:24'),
(128,1,'sliders','site.work.update','Saved Work right holder successfully.','122.174.127.79','2015-05-22 09:11:08'),
(129,1,'user','site.default.login','admin logged-in successfully.','122.174.127.79','2015-05-22 12:08:57'),
(130,1,'sliders','site.work.holderremove','Deleted RightHolder A1006 at work Music 1.','122.174.127.79','2015-05-22 12:15:41'),
(131,1,'sliders','site.work.create','Created Work successfully.','219.92.23.241','2015-05-22 13:01:16'),
(132,1,'sliders','site.work.update','Saved Work Documentation successfully.','219.92.23.241','2015-05-22 13:02:37'),
(133,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:06:02'),
(134,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:11:43'),
(135,1,'sliders','site.work.update','Saved Work right holder successfully.','219.92.23.241','2015-05-22 13:14:55'),
(136,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),
(137,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),
(138,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),
(139,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.109.71','2015-05-23 14:26:51'),
(140,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:45:49'),
(141,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:46:15'),
(142,1,'sliders','site.work.create','Created Work successfully.','122.174.144.200','2015-05-26 10:46:58'),
(143,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 10:48:01'),
(144,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 10:48:08'),
(145,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','122.174.144.200','2015-05-26 10:49:55'),
(146,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','122.174.144.200','2015-05-26 10:49:55'),
(147,1,'user','site.authoraccount.create','Created a Auth First  Tets successfully.','122.174.144.200','2015-05-26 13:57:45'),
(148,1,'user','site.authoraccount.update','Updated Auth First  Tets AuthorAccount successfully.','122.174.144.200','2015-05-26 13:57:53'),
(149,1,'user','site.authoraccount.update','Updated Auth First  Tets AuthorAccount successfully.','122.174.144.200','2015-05-26 13:58:01'),
(150,1,'user','site.authoraccount.delete','Deleted a Auth First  Tets successfully.','122.174.144.200','2015-05-26 13:58:26'),
(151,1,'sliders','site.work.create','Created Work successfully.','122.174.144.200','2015-05-26 14:06:03'),
(152,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:11'),
(153,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:18'),
(154,1,'sliders','site.work.update','Saved Work Documentation successfully.','122.174.144.200','2015-05-26 14:06:29'),
(155,1,'sliders','site.work.update','Updated Work successfully.','122.174.144.200','2015-05-26 14:06:52'),
(156,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.144.200','2015-05-26 14:07:10'),
(157,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-26 14:22:20'),
(158,1,'sliders','site.work.create','Created Work successfully.','124.13.34.187','2015-05-26 14:24:42'),
(159,1,'sliders','site.work.update','Saved Work Documentation successfully.','124.13.34.187','2015-05-26 14:24:59'),
(160,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-05-26 14:27:45'),
(161,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-05-26 14:27:45'),
(162,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-05-26 14:52:26'),
(163,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-26 14:59:02'),
(164,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.174.89.254','2015-05-27 14:52:44'),
(165,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.174.89.254','2015-05-27 14:52:44'),
(166,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),
(167,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),
(168,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),
(169,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:08:05'),
(170,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),
(171,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),
(172,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),
(173,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 06:10:21'),
(174,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),
(175,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),
(176,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),
(177,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:50:04'),
(178,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),
(179,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),
(180,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),
(181,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 07:52:52'),
(182,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),
(183,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),
(184,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','122.174.82.254','2015-05-28 08:14:00'),
(185,1,'user','site.default.login','admin logged-in successfully.','60.48.178.132','2015-05-28 09:23:33'),
(186,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-28 12:20:58'),
(187,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-28 12:23:04'),
(188,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.82.254','2015-05-28 12:45:06'),
(189,1,'sliders','site.work.subtitledelete','Deleted Recording subtitle Sub title One successfully.','122.174.82.254','2015-05-28 12:45:13'),
(190,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.82.254','2015-05-28 12:46:02'),
(191,1,'sliders','site.work.subtitledelete','Deleted Work subtitle Sub title Two successfully.','122.174.82.254','2015-05-28 12:46:07'),
(192,1,'sliders','site.work.create','Created Work successfully.','175.139.247.58','2015-05-28 13:44:37'),
(193,1,'sliders','site.work.update','Saved Work Documentation successfully.','175.139.247.58','2015-05-28 13:44:50'),
(194,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.247.58','2015-05-28 13:48:09'),
(195,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.247.58','2015-05-28 13:48:09'),
(196,1,'sliders','site.work.create','Created Work successfully.','175.139.247.58','2015-05-28 13:53:03'),
(197,1,'sliders','site.work.update','Saved Work Documentation successfully.','175.139.247.58','2015-05-28 13:53:15'),
(198,1,'sliders','site.work.delete','Deleted Work successfully.','175.139.247.58','2015-05-28 13:53:47'),
(199,1,'sliders','site.work.update','Saved Work Subtitle successfully.','175.139.247.58','2015-05-28 13:59:31'),
(200,1,'sliders','site.work.update','Saved Work Subtitle successfully.','175.139.247.58','2015-05-28 14:00:12'),
(201,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:42:37'),
(202,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:42:37'),
(203,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),
(204,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),
(205,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.174.82.254','2015-05-28 14:43:24'),
(206,1,'volume-up','site.recording.create','Created Recording successfully.','122.174.119.148','2015-05-29 11:48:08'),
(207,1,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','122.174.119.148','2015-05-29 11:48:26'),
(208,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','122.174.119.148','2015-05-29 11:48:33'),
(209,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.119.148','2015-05-29 11:48:57'),
(210,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.119.148','2015-05-29 11:48:57'),
(211,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','122.174.119.148','2015-05-29 11:49:18'),
(212,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 09:37:48'),
(213,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 09:38:10'),
(214,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 09:38:20'),
(215,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 10:18:21'),
(216,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 11:46:50'),
(217,1,'sliders','site.work.update','Updated Work successfully.','122.174.123.183','2015-05-30 11:47:08'),
(218,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 11:48:12'),
(219,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 11:48:27'),
(220,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 11:48:39'),
(221,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 11:48:49'),
(222,1,'sliders','site.work.update','Saved Work Subtitle successfully.','122.174.123.183','2015-05-30 11:49:54'),
(223,1,'sliders','site.work.create','Created Work successfully.','122.174.123.183','2015-05-30 14:45:49'),
(224,1,'sliders','site.work.delete','Deleted Work successfully.','122.174.123.183','2015-05-30 14:46:05'),
(225,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-05-30 15:35:01'),
(226,1,'volume-up','site.recording.update','Saved Recording Artist - Producer successfully.','124.13.34.187','2015-05-30 15:36:28'),
(227,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-05-30 15:52:10'),
(228,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','127.0.0.1','2015-06-02 05:39:11'),
(229,1,'user','site.masterlabel.update','Updated MasterLabel successfully.','127.0.0.1','2015-06-02 06:54:15'),
(230,1,'user','site.masterlabel.create','Created MasterLabel successfully.','127.0.0.1','2015-06-02 06:54:24'),
(231,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-06-02 06:58:47'),
(232,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-06-02 07:01:03'),
(233,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 07:09:23'),
(234,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 07:12:00'),
(235,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 07:13:08'),
(236,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 07:13:21'),
(237,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 10:56:38'),
(238,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 10:58:53'),
(239,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-06-02 10:59:02'),
(240,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-06-02 10:59:25'),
(241,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-02 11:00:07'),
(242,1,'sliders','site.work.delete','Deleted Work successfully.','127.0.0.1','2015-06-02 11:00:29'),
(243,1,'user','site.authoraccount.create','Created a Robert  Mano successfully.','122.174.107.30','2015-06-04 05:02:50'),
(244,1,'user','site.authoraccount.convert','Robert converted as performer successfully.','122.174.107.30','2015-06-04 05:03:04'),
(245,1,'user','site.authoraccount.update','Updated Robert  Mano Address successfully.','122.174.107.30','2015-06-04 05:03:40'),
(246,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:04:13'),
(247,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:04:40'),
(248,1,'music','site.performeraccount.update','Updated Performer Document Robert Mano successfully.','122.174.107.30','2015-06-04 05:14:43'),
(249,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-04 05:59:00'),
(250,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-04 06:48:04'),
(251,1,'at','site.mastertyperights.create','Created Type of Right Author, Writer, Lyricist successfully.','122.174.76.68','2015-06-04 22:16:02'),
(252,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:05:23'),
(253,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:05:23'),
(254,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:45:08'),
(255,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 03:45:08'),
(256,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),
(257,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),
(258,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.174.76.68','2015-06-05 04:03:26'),
(259,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-05 05:02:29'),
(260,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-05 05:06:25'),
(261,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-05 05:06:25'),
(262,1,'volume-up','site.recording.create','Created Recording successfully.','124.13.34.187','2015-06-05 05:07:08'),
(263,1,'female','site.mastermaritalstatus.update','Updated Master Marital Status LIMITED  successfully.','124.13.34.187','2015-06-05 05:15:09'),
(264,1,'female','site.mastermaritalstatus.update','Updated Master Marital Status PARTERNER successfully.','124.13.34.187','2015-06-05 05:15:25'),
(265,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:15'),
(266,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:18'),
(267,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.120.14','2015-06-05 23:07:23'),
(268,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.125.136','2015-06-07 03:47:03'),
(269,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-07 06:14:29'),
(270,1,'volume-up','site.recording.create','Created Recording successfully.','113.210.132.52','2015-06-07 17:05:06'),
(271,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','113.210.132.52','2015-06-07 17:25:25'),
(272,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','113.210.132.52','2015-06-07 17:25:25'),
(273,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:06:56'),
(274,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:07:06'),
(275,1,'user','site.authoraccount.update','Updated Jennifer  Jean AuthorAccount successfully.','122.174.119.97','2015-06-08 20:07:47'),
(276,1,'user','site.authoraccount.update','Updated Jennifer  Jeann AuthorAccount successfully.','122.174.119.97','2015-06-08 20:08:03'),
(277,1,'user','site.authoraccount.delete','Deleted a Robert  Mano successfully.','122.174.119.97','2015-06-08 20:10:36'),
(278,1,'user','site.authoraccount.create','Created a Willam  Y successfully.','122.174.119.97','2015-06-08 20:11:05'),
(279,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-08 20:11:27'),
(280,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-08 20:16:47'),
(281,1,'music','site.performeraccount.update','Updated Performer Willam Y successfully.','122.174.119.97','2015-06-08 20:17:04'),
(282,1,'music','site.performeraccount.update','Updated Performer Willam Y successfully.','122.174.119.97','2015-06-08 20:17:13'),
(283,1,'user','site.authoraccount.update','Updated Willam  Y Managed Rights successfully.','122.174.119.97','2015-06-08 20:17:31'),
(284,1,'music','site.authoraccount.update','Updated Performer Related Rights Willam Y successfully.','122.174.119.97','2015-06-08 20:17:47'),
(285,1,'music','site.performeraccount.update','Updated Performer Pseudonym Willam Y successfully.','122.174.119.97','2015-06-08 20:18:01'),
(286,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:20:25'),
(287,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:20:40'),
(288,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:25:40'),
(289,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-08 20:31:48'),
(290,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.119.97','2015-06-08 20:37:18'),
(291,1,'at','site.mastertyperights.update','Updated Type of Right Producer successfully.','122.174.119.97','2015-06-08 20:37:26'),
(292,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Managed Rights successfully.','122.174.119.97','2015-06-08 20:50:22'),
(293,1,'music','site.authoraccount.update','Updated Performer Related Rights Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:51:27'),
(294,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Address successfully.','122.174.119.97','2015-06-08 20:52:14'),
(295,1,'music','site.performeraccount.update','Updated Performer Payment Method Robert Kiyosaki successfully.','122.174.119.97','2015-06-08 20:52:28'),
(296,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 1 successfully.','122.174.119.97','2015-06-09 04:04:42'),
(297,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 2 successfully.','122.174.119.97','2015-06-09 04:05:06'),
(298,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 1 successfully.','122.174.119.97','2015-06-09 04:05:16'),
(299,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 2 successfully.','122.174.119.97','2015-06-09 04:05:25'),
(300,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 3 successfully.','122.174.119.97','2015-06-09 04:05:34'),
(301,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 4 successfully.','122.174.119.97','2015-06-09 04:05:42'),
(302,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 5 successfully.','122.174.119.97','2015-06-09 04:05:54'),
(303,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 6 successfully.','122.174.119.97','2015-06-09 04:06:08'),
(304,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 7 successfully.','122.174.119.97','2015-06-09 04:06:18'),
(305,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 8 successfully.','122.174.119.97','2015-06-09 04:06:30'),
(306,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 9 successfully.','122.174.119.97','2015-06-09 04:06:42'),
(307,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 10 successfully.','122.174.119.97','2015-06-09 04:07:09'),
(308,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 11 successfully.','122.174.119.97','2015-06-09 04:07:21'),
(309,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 12 successfully.','122.174.119.97','2015-06-09 04:07:33'),
(310,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 13 successfully.','122.174.119.97','2015-06-09 04:07:57'),
(311,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 14 successfully.','122.174.119.97','2015-06-09 04:08:08'),
(312,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 15 successfully.','122.174.119.97','2015-06-09 04:08:18'),
(313,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 16 successfully.','122.174.119.97','2015-06-09 04:08:30'),
(314,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 17 successfully.','122.174.119.97','2015-06-09 04:08:43'),
(315,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 18 successfully.','122.174.119.97','2015-06-09 04:08:53'),
(316,1,'share-alt','site.sharedefinitionperrole.create','Created ShareDefinitionPerRole 19 successfully.','122.174.119.97','2015-06-09 04:09:05'),
(317,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','122.174.119.97','2015-06-09 04:10:22'),
(318,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','122.174.119.97','2015-06-09 04:10:22'),
(319,1,'user','site.authoraccount.update','Updated Jennifer  Jeann AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:16'),
(320,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:30'),
(321,1,'user','site.authoraccount.update','Updated Willam  Y AuthorAccount successfully.','122.174.119.97','2015-06-09 04:14:39'),
(322,1,'music','site.performeraccount.update','Updated Performer Related Rights Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:01'),
(323,1,'music','site.performeraccount.update','Updated Performer Address Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:13'),
(324,1,'music','site.performeraccount.update','Updated Performer Death Inheritance Jennifer Jeann successfully.','122.174.119.97','2015-06-09 04:15:24'),
(325,1,'user','site.authoraccount.create','Created a Harry  P successfully.','122.174.119.97','2015-06-09 04:17:31'),
(326,1,'user','site.authoraccount.update','Updated Harry  P AuthorAccount successfully.','122.174.119.97','2015-06-09 04:17:49'),
(327,1,'user','site.authoraccount.update','Updated Harry  P AuthorAccount successfully.','122.174.119.97','2015-06-09 04:18:04'),
(328,1,'music','site.performeraccount.create','Created Performer Ron Jack successfully.','122.174.119.97','2015-06-09 04:18:30'),
(329,1,'music','site.performeraccount.update','Updated Performer Ron Jack successfully.','122.174.119.97','2015-06-09 04:18:44'),
(330,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','122.174.119.97','2015-06-09 04:20:37'),
(331,1,'volume-up','site.recording.update','Updated Recording successfully.','122.174.119.97','2015-06-09 05:08:56'),
(332,1,'music','site.performeraccount.update','Updated Performer Nancy Gilson successfully.','122.174.119.97','2015-06-09 05:22:38'),
(333,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-09 06:08:12'),
(334,1,'user','site.authoraccount.update','Updated John  Mac AuthorAccount successfully.','124.13.34.187','2015-06-09 06:11:47'),
(335,1,'user','site.authoraccount.create','Created a Rovan  Atkinson successfully.','124.13.34.187','2015-06-09 06:31:08'),
(336,1,'user','site.authoraccount.update','Updated Rovan  Atkinson Managed Rights successfully.','124.13.34.187','2015-06-09 06:32:45'),
(337,1,'microphone','site.publisheraccount.update','Updated Publisher BGM Limited successfully.','124.13.34.187','2015-06-09 06:41:53'),
(338,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-09 06:42:26'),
(339,1,'user','site.authoraccount.create','Created a testtest  test successfully.','122.174.119.97','2015-06-09 06:56:22'),
(340,1,'user','site.authoraccount.update','Updated testtest  test Managed Rights successfully.','122.174.119.97','2015-06-09 06:56:32'),
(341,1,'user','site.authoraccount.delete','Deleted a testtest  test successfully.','122.174.119.97','2015-06-09 06:56:45'),
(342,1,'volume-up','site.recording.update','Updated Recording successfully.','210.186.156.165','2015-06-09 18:47:37'),
(343,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 12 successfully.','210.186.156.165','2015-06-09 18:50:37'),
(344,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),
(345,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),
(346,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:12'),
(347,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:24'),
(348,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','210.186.156.165','2015-06-09 18:51:24'),
(349,1,'volume-up','site.recording.update','Updated Recording successfully.','210.186.156.165','2015-06-09 18:52:57'),
(350,1,'volume-up','site.recording.create','Created Recording successfully.','210.186.156.165','2015-06-09 19:16:02'),
(351,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),
(352,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),
(353,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','210.186.156.165','2015-06-09 19:16:58'),
(354,1,'user','site.default.login','admin logged-in successfully.','122.164.158.250','2015-06-09 22:00:56'),
(355,1,'user','site.authoraccount.update','Updated Jennifer  Jeann Managed Rights successfully.','113.210.133.150','2015-06-10 02:41:56'),
(356,1,'volume-up','site.recording.create','Created Recording successfully.','113.210.133.150','2015-06-10 02:44:26'),
(357,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','113.210.133.150','2015-06-10 02:46:52'),
(358,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','113.210.133.150','2015-06-10 02:46:52'),
(359,1,'user','site.default.login','admin logged-in successfully.','24.90.173.42','2015-06-10 20:37:15'),
(360,1,'building','site.organization.update','Updated Organization SOC001 successfully.','122.164.147.249','2015-06-10 22:19:13'),
(361,1,'building','site.organization.update','Updated Organization SOC001 successfully.','122.164.147.249','2015-06-10 22:30:04'),
(362,1,'user','site.default.login','admin logged-in successfully.','124.13.34.187','2015-06-11 08:15:48'),
(363,1,'user','site.default.login','admin logged-in successfully.','122.164.157.174','2015-06-12 01:04:58'),
(364,1,'user','site.default.login','Admin logged-in successfully.','169.55.33.233','2015-06-12 02:53:03'),
(365,1,'music','site.performeraccount.update','Updated Performer Jennifer Jeann successfully.','122.164.158.46','2015-06-12 04:58:08'),
(366,1,'music','site.performeraccount.update','Updated Performer John Mac successfully.','122.164.158.46','2015-06-12 04:59:35'),
(367,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','122.164.158.46','2015-06-12 04:59:39'),
(368,1,'music','site.performeraccount.update','Updated Performer Harry P successfully.','122.164.158.46','2015-06-12 04:59:42'),
(369,1,'music','site.performeraccount.update','Updated Performer Rovan Atkinson successfully.','122.164.158.46','2015-06-12 04:59:45'),
(370,1,'money','site.produceraccount.update','Updated Producer ACOL Limited successfully.','122.164.28.164','2015-06-12 05:44:57'),
(371,1,'money','site.produceraccount.update','Updated Producer BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:00'),
(372,1,'money','site.produceraccount.update','Updated Producer ACOL Limited successfully.','122.164.28.164','2015-06-12 05:45:04'),
(373,1,'money','site.produceraccount.update','Updated Producer BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:07'),
(374,1,'microphone','site.publisheraccount.delete','Deleted Publisher ACOL Limited successfully.','122.164.28.164','2015-06-12 05:45:25'),
(375,1,'microphone','site.publisheraccount.delete','Deleted Publisher BGM Limited successfully.','122.164.28.164','2015-06-12 05:45:31'),
(376,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-06-12 06:20:44'),
(377,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','124.13.34.187','2015-06-12 06:27:34'),
(378,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','124.13.34.187','2015-06-12 06:27:34'),
(379,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','124.13.34.187','2015-06-12 06:28:31'),
(380,1,'sliders','site.work.update','Updated Work successfully.','124.13.34.187','2015-06-12 06:29:11'),
(381,1,'sliders','site.work.delete','Deleted Work successfully.','124.13.34.187','2015-06-12 06:33:49'),
(382,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Nothing else matters successfully.','124.13.34.187','2015-06-12 06:34:46'),
(383,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Nothing else matters successfully.','124.13.34.187','2015-06-12 06:34:46'),
(384,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Works successfully.','124.13.34.187','2015-06-12 06:35:32'),
(385,1,'fa fa-at','site.work.insertright','Created Right Holder saved for test you successfully.','124.13.34.187','2015-06-12 06:36:11'),
(386,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test12 successfully.','124.13.34.187','2015-06-12 06:36:49'),
(387,1,'sliders','site.work.update','Saved Work Subtitle successfully.','124.13.34.187','2015-06-12 06:37:33'),
(388,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','124.13.34.187','2015-06-12 06:39:40'),
(389,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','124.13.34.187','2015-06-12 06:39:40'),
(390,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','124.13.34.187','2015-06-12 06:42:16'),
(391,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','124.13.34.187','2015-06-12 06:42:16'),
(392,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-12 06:43:24'),
(393,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','124.13.34.187','2015-06-12 06:43:24'),
(394,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','124.13.34.187','2015-06-12 06:44:16'),
(395,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','124.13.34.187','2015-06-12 06:44:16'),
(396,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','124.13.34.187','2015-06-12 06:45:03'),
(397,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','124.13.34.187','2015-06-12 06:45:03'),
(398,1,'institution','site.masterterritories.create','Created Territory AFGHANISTAN                                                                      successfully.','124.13.34.187','2015-06-12 06:48:16'),
(399,1,'institution','site.masterterritories.create','Created Territory AFRICA                                                                           successfully.','124.13.34.187','2015-06-12 06:48:27'),
(400,1,'institution','site.masterterritories.create','Created Territory ALBANIA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:40'),
(401,1,'institution','site.masterterritories.create','Created Territory ALGERIA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:49'),
(402,1,'institution','site.masterterritories.create','Created Territory AMERICA                                                                          successfully.','124.13.34.187','2015-06-12 06:48:57'),
(403,1,'institution','site.masterterritories.create','Created Territory AMERICAN CONTINENT                                                               successfully.','124.13.34.187','2015-06-12 06:49:08'),
(404,1,'institution','site.masterterritories.create','Created Territory ANDORRA                                                                          successfully.','124.13.34.187','2015-06-12 06:49:16'),
(405,1,'institution','site.masterterritories.create','Created Territory ANGOLA                                                                           successfully.','124.13.34.187','2015-06-12 06:49:23'),
(406,1,'institution','site.masterterritories.create','Created Territory ANTIGUA AND BARBUDA                                                              successfully.','124.13.34.187','2015-06-12 06:49:33'),
(407,1,'institution','site.masterterritories.create','Created Territory ANTILLES                                                                         successfully.','124.13.34.187','2015-06-12 06:49:43'),
(408,1,'institution','site.masterterritories.create','Created Territory APEC COUNTRIES                                                                   successfully.','124.13.34.187','2015-06-12 06:49:52'),
(409,1,'institution','site.masterterritories.create','Created Territory ARGENTINA                                                                        successfully.','124.13.34.187','2015-06-12 06:50:02'),
(410,1,'institution','site.masterterritories.create','Created Territory ARMENIA                                                                          successfully.','124.13.34.187','2015-06-12 06:50:13'),
(411,1,'institution','site.masterterritories.create','Created Territory ASEAN COUNTRIES                                                                  successfully.','124.13.34.187','2015-06-12 06:50:26'),
(412,1,'institution','site.masterterritories.create','Created Territory ASIA  successfully.','124.13.34.187','2015-06-12 06:50:48'),
(413,1,'institution','site.masterterritories.create','Created Territory AUSTRALASIA successfully.','124.13.34.187','2015-06-12 06:51:17'),
(414,1,'institution','site.masterterritories.create','Created Territory AUSTRALIA                                                                        successfully.','124.13.34.187','2015-06-12 06:51:28'),
(415,1,'institution','site.masterterritories.create','Created Territory AZERBAIJAN                                                                       successfully.','124.13.34.187','2015-06-12 06:51:37'),
(416,1,'institution','site.masterterritories.create','Created Territory BAHAMAS                                                                          successfully.','124.13.34.187','2015-06-12 06:51:53'),
(417,1,'institution','site.masterterritories.create','Created Territory BAHRAIN                                                                          successfully.','124.13.34.187','2015-06-12 06:52:01'),
(418,1,'institution','site.masterterritories.create','Created Territory BALKANS                                                                          successfully.','124.13.34.187','2015-06-12 06:52:09'),
(419,1,'institution','site.masterterritories.create','Created Territory BALTIC STATES                                                                    successfully.','124.13.34.187','2015-06-12 06:52:17'),
(420,1,'institution','site.masterterritories.create','Created Territory BANGLADESH                                                                       successfully.','124.13.34.187','2015-06-12 06:52:26'),
(421,1,'institution','site.masterterritories.create','Created Territory BARBADOS                                                                         successfully.','124.13.34.187','2015-06-12 06:52:40'),
(422,1,'institution','site.masterterritories.create','Created Territory BELARUS                                                                          successfully.','124.13.34.187','2015-06-12 06:52:50'),
(423,1,'institution','site.masterterritories.create','Created Territory BELGIUM                                                                          successfully.','124.13.34.187','2015-06-12 06:53:00'),
(424,1,'institution','site.masterterritories.create','Created Territory BOSNIA AND HERZEGOVINA                                                           successfully.','124.13.34.187','2015-06-12 06:53:16'),
(425,1,'institution','site.masterterritories.create','Created Territory BRITISH WEST INDIES                                                              successfully.','124.13.34.187','2015-06-12 06:53:27'),
(426,1,'institution','site.masterterritories.create','Created Territory BRITISH WEST INDIES                                                              successfully.','124.13.34.187','2015-06-12 06:53:27'),
(427,1,'institution','site.masterterritories.create','Created Territory BRITISH ISLES                                                                    successfully.','124.13.34.187','2015-06-12 06:53:35'),
(428,1,'institution','site.masterterritories.create','Created Territory BRUNEI DARUSSALAM                                                                successfully.','124.13.34.187','2015-06-12 06:53:45'),
(429,1,'institution','site.masterterritories.create','Created Territory BURKINA FASO                                                                     successfully.','124.13.34.187','2015-06-12 06:53:55'),
(430,1,'institution','site.masterterritories.create','Created Territory CAMBODIA                                                                         successfully.','124.13.34.187','2015-06-12 06:54:10'),
(431,1,'institution','site.masterterritories.create','Created Territory CAMEROON                                                                         successfully.','124.13.34.187','2015-06-12 06:54:17'),
(432,1,'institution','site.masterterritories.create','Created Territory CANADA                                                                           successfully.','124.13.34.187','2015-06-12 06:54:24'),
(433,1,'institution','site.masterterritories.create','Created Territory CAPE VERDE                                                                       successfully.','124.13.34.187','2015-06-12 06:54:37'),
(434,1,'institution','site.masterterritories.create','Created Territory CENTRAL AFRICA REGION                                                            successfully.','124.13.34.187','2015-06-12 06:54:47'),
(435,1,'institution','site.masterterritories.create','Created Territory CENTRAL AFRICAN REPUBLIC                                                         successfully.','124.13.34.187','2015-06-12 06:54:57'),
(436,1,'institution','site.masterterritories.create','Created Territory CENTRAL AMERICA                                                                  successfully.','124.13.34.187','2015-06-12 06:55:10'),
(437,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH                                                                     successfully.','124.13.34.187','2015-06-12 06:55:19'),
(438,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH AFRICAN TERRITORIES                                                 successfully.','124.13.34.187','2015-06-12 06:55:35'),
(439,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH ASIAN TERRITORIES                                                   successfully.','124.13.34.187','2015-06-12 06:55:52'),
(440,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH AUSTRALASIAN TERRITORIES                                            successfully.','124.13.34.187','2015-06-12 06:56:03'),
(441,1,'institution','site.masterterritories.create','Created Territory COMMONWEALTH OF INDEPENDENT STATES                                               successfully.','124.13.34.187','2015-06-12 06:56:11'),
(442,1,'sliders','site.work.create','Created Work successfully.','202.188.40.103','2015-06-12 07:09:18'),
(443,1,'sliders','site.work.update','Saved Work Documentation successfully.','202.188.40.103','2015-06-12 07:09:24'),
(444,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:10:50'),
(445,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:10:50'),
(446,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:18:28'),
(447,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','202.188.40.103','2015-06-12 07:18:28'),
(448,1,'volume-up','site.recording.create','Created Recording successfully.','202.188.40.103','2015-06-12 07:19:17'),
(449,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','202.188.40.103','2015-06-12 07:19:55'),
(450,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','202.188.40.103','2015-06-12 07:19:55'),
(451,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','202.188.40.103','2015-06-12 07:27:47'),
(452,1,'institution','site.masterterritories.create','Created Territory TAIWAN, PROVINCE OF CHINA                                                        successfully.','124.13.34.187','2015-06-12 07:33:30'),
(453,1,'institution','site.masterterritories.create','Created Territory EQUATORIAL GUINEA                                                                successfully.','124.13.34.187','2015-06-12 07:33:47'),
(454,1,'institution','site.masterterritories.create','Created Territory ETHIOPIA                                                                         successfully.','124.13.34.187','2015-06-12 07:43:20'),
(455,1,'institution','site.masterterritories.create','Created Territory FRENCH POLYNESIA                                                                 successfully.','124.13.34.187','2015-06-12 07:43:49'),
(456,1,'institution','site.masterterritories.create','Created Territory FINLAND                                                                          successfully.','124.13.34.187','2015-06-12 07:43:59'),
(457,1,'institution','site.masterterritories.create','Created Territory FRANCE                                                                           successfully.','124.13.34.187','2015-06-12 07:44:26'),
(458,1,'institution','site.masterterritories.create','Created Territory DJIBOUTI                                                                         successfully.','124.13.34.187','2015-06-12 07:44:36'),
(459,1,'institution','site.masterterritories.create','Created Territory GABON                                                                            successfully.','124.13.34.187','2015-06-12 07:54:02'),
(460,1,'institution','site.masterterritories.create','Created Territory GEORGIA                                                                          successfully.','124.13.34.187','2015-06-12 07:55:39'),
(461,1,'institution','site.masterterritories.create','Created Territory GAMBIA                                                                           successfully.','124.13.34.187','2015-06-12 07:55:50'),
(462,1,'institution','site.masterterritories.create','Created Territory GERMANY                                                                          successfully.','124.13.34.187','2015-06-12 07:55:58'),
(463,1,'institution','site.masterterritories.create','Created Territory GERMAN DEMOCRATIC REPUBLIC                                                       successfully.','124.13.34.187','2015-06-12 07:56:08'),
(464,1,'institution','site.masterterritories.create','Created Territory KIRIBATI                                                                            successfully.','124.13.34.187','2015-06-12 07:56:51'),
(465,1,'institution','site.masterterritories.create','Created Territory GREECE                                                                           successfully.','124.13.34.187','2015-06-12 07:57:01'),
(466,1,'institution','site.masterterritories.create','Created Territory GRENADA                                                                          successfully.','124.13.34.187','2015-06-12 07:57:09'),
(467,1,'institution','site.masterterritories.create','Created Territory GUATEMALA                                                                        successfully.','124.13.34.187','2015-06-12 07:57:17'),
(468,1,'institution','site.masterterritories.create','Created Territory HOLY SEE (VATICAN CITY STATE)                                                    successfully.','124.13.34.187','2015-06-12 07:57:29'),
(469,1,'institution','site.masterterritories.create','Created Territory HONDURAS                                                                         successfully.','124.13.34.187','2015-06-12 07:57:37'),
(470,1,'institution','site.masterterritories.create','Created Territory HONG KONG                                                                        successfully.','124.13.34.187','2015-06-12 07:57:44'),
(471,1,'institution','site.masterterritories.create','Created Territory HUNGARY                                                                          successfully.','124.13.34.187','2015-06-12 07:57:52'),
(472,1,'institution','site.masterterritories.create','Created Territory ICELAND                                                                          successfully.','124.13.34.187','2015-06-12 07:57:59'),
(473,1,'institution','site.masterterritories.create','Created Territory INDIA                                                                            successfully.','124.13.34.187','2015-06-12 07:58:07'),
(474,1,'institution','site.masterterritories.create','Created Territory INDONESIA                                                                        successfully.','124.13.34.187','2015-06-12 07:58:27'),
(475,1,'institution','site.masterterritories.create','Created Territory IRAN, ISLAMIC REPUBLIC OF                                                        successfully.','124.13.34.187','2015-06-12 07:58:36'),
(476,1,'institution','site.masterterritories.create','Created Territory IRAQ                                                                             successfully.','124.13.34.187','2015-06-12 07:59:10'),
(477,1,'institution','site.masterterritories.create','Created Territory IRELAND                                                                          successfully.','124.13.34.187','2015-06-12 07:59:18'),
(478,1,'institution','site.masterterritories.create','Created Territory ISRAEL                                                                           successfully.','124.13.34.187','2015-06-12 07:59:26'),
(479,1,'institution','site.masterterritories.create','Created Territory ITALY                                                                            successfully.','124.13.34.187','2015-06-12 07:59:34'),
(480,1,'institution','site.masterterritories.create','Created Territory COTE D\'IVOIRE                                                                    successfully.','124.13.34.187','2015-06-12 07:59:42'),
(481,1,'institution','site.masterterritories.create','Created Territory JAMAICA                                                                          successfully.','124.13.34.187','2015-06-12 07:59:53'),
(482,1,'institution','site.masterterritories.create','Created Territory JAPAN                                                                            successfully.','124.13.34.187','2015-06-12 08:00:02'),
(483,1,'institution','site.masterterritories.create','Created Territory KAZAKSTAN                                                                        successfully.','124.13.34.187','2015-06-12 08:00:10'),
(484,1,'institution','site.masterterritories.create','Created Territory JORDAN                                                                           successfully.','124.13.34.187','2015-06-12 08:00:18'),
(485,1,'institution','site.masterterritories.create','Created Territory KENYA                                                                            successfully.','124.13.34.187','2015-06-12 08:00:26'),
(486,1,'institution','site.masterterritories.create','Created Territory KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF                                           successfully.','124.13.34.187','2015-06-12 08:00:34'),
(487,1,'institution','site.masterterritories.create','Created Territory KUWAIT                                                                           successfully.','124.13.34.187','2015-06-12 08:00:47'),
(488,1,'institution','site.masterterritories.create','Created Territory KYRGYZSTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:00:57'),
(489,1,'institution','site.masterterritories.create','Created Territory LAO PEOPLE\'S DEMOCRATIC REPUBLIC                                                 successfully.','124.13.34.187','2015-06-12 08:01:49'),
(490,1,'institution','site.masterterritories.create','Created Territory LEBANON                                                                          successfully.','124.13.34.187','2015-06-12 08:01:57'),
(491,1,'institution','site.masterterritories.create','Created Territory LESOTHO                                                                          successfully.','124.13.34.187','2015-06-12 08:02:05'),
(492,1,'institution','site.masterterritories.create','Created Territory LIBERIA                                                                          successfully.','124.13.34.187','2015-06-12 08:02:13'),
(493,1,'institution','site.masterterritories.create','Created Territory LIBYAN ARAB JAMAHIRIYA                                                           successfully.','124.13.34.187','2015-06-12 08:10:32'),
(494,1,'institution','site.masterterritories.create','Created Territory LIECHTENSTEIN                                                                    successfully.','124.13.34.187','2015-06-12 08:10:40'),
(495,1,'institution','site.masterterritories.create','Created Territory LUXEMBOURG                                                                       successfully.','124.13.34.187','2015-06-12 08:10:49'),
(496,1,'institution','site.masterterritories.create','Created Territory MADAGASCAR                                                                       successfully.','124.13.34.187','2015-06-12 08:10:58'),
(497,1,'institution','site.masterterritories.create','Created Territory MALAWI                                                                           successfully.','124.13.34.187','2015-06-12 08:11:06'),
(498,1,'institution','site.masterterritories.create','Created Territory MALAYSIA                                                                         successfully.','124.13.34.187','2015-06-12 08:11:13'),
(499,1,'institution','site.masterterritories.create','Created Territory MALDIVES                                                                         successfully.','124.13.34.187','2015-06-12 08:11:19'),
(500,1,'institution','site.masterterritories.create','Created Territory MALI                                                                             successfully.','124.13.34.187','2015-06-12 08:12:44'),
(501,1,'institution','site.masterterritories.create','Created Territory MAURITANIA                                                                       successfully.','124.13.34.187','2015-06-12 08:13:07'),
(502,1,'institution','site.masterterritories.create','Created Territory MAURITIUS                                                                        successfully.','124.13.34.187','2015-06-12 08:13:16'),
(503,1,'institution','site.masterterritories.create','Created Territory MEXICO                                                                           successfully.','124.13.34.187','2015-06-12 08:13:25'),
(504,1,'institution','site.masterterritories.create','Created Territory MOLDOVA, REPUBLIC OF                                                             successfully.','124.13.34.187','2015-06-12 08:13:35'),
(505,1,'institution','site.masterterritories.create','Created Territory MOZAMBIQUE                                                                       successfully.','124.13.34.187','2015-06-12 08:13:44'),
(506,1,'institution','site.masterterritories.create','Created Territory NETHERLANDS                                                                      successfully.','124.13.34.187','2015-06-12 08:13:54'),
(507,1,'institution','site.masterterritories.create','Created Territory NEPAL                                                                            successfully.','124.13.34.187','2015-06-12 08:14:02'),
(508,1,'institution','site.masterterritories.create','Created Territory VANUATU                                                                          successfully.','124.13.34.187','2015-06-12 08:14:10'),
(509,1,'institution','site.masterterritories.create','Created Territory NEW ZEALAND                                                                      successfully.','124.13.34.187','2015-06-12 08:14:16'),
(510,1,'institution','site.masterterritories.create','Created Territory NICARAGUA                                                                        successfully.','124.13.34.187','2015-06-12 08:14:24'),
(511,1,'institution','site.masterterritories.create','Created Territory NIGER                                                                            successfully.','124.13.34.187','2015-06-12 08:14:32'),
(512,1,'institution','site.masterterritories.create','Created Territory NIGERIA                                                                          successfully.','124.13.34.187','2015-06-12 08:14:40'),
(513,1,'institution','site.masterterritories.create','Created Territory MICRONESIA, FEDERATED STATES OF                                                  successfully.','124.13.34.187','2015-06-12 08:14:53'),
(514,1,'institution','site.masterterritories.create','Created Territory NORWAY                                                                           successfully.','124.13.34.187','2015-06-12 08:15:00'),
(515,1,'institution','site.masterterritories.create','Created Territory MARSHALL ISLANDS                                                                 successfully.','124.13.34.187','2015-06-12 08:15:08'),
(516,1,'institution','site.masterterritories.create','Created Territory PAKISTAN                                                                         successfully.','124.13.34.187','2015-06-12 08:15:15'),
(517,1,'institution','site.masterterritories.create','Created Territory PANAMA                                                                           successfully.','124.13.34.187','2015-06-12 08:15:23'),
(518,1,'institution','site.masterterritories.create','Created Territory PAPUA NEW GUINEA                                                                 successfully.','124.13.34.187','2015-06-12 08:15:30'),
(519,1,'institution','site.masterterritories.create','Created Territory PARAGUAY                                                                         successfully.','124.13.34.187','2015-06-12 08:15:37'),
(520,1,'institution','site.masterterritories.create','Created Territory PERU                                                                             successfully.','124.13.34.187','2015-06-12 08:15:45'),
(521,1,'institution','site.masterterritories.create','Created Territory PHILIPPINES                                                                      successfully.','124.13.34.187','2015-06-12 08:15:51'),
(522,1,'institution','site.masterterritories.create','Created Territory POLAND                                                                           successfully.','124.13.34.187','2015-06-12 08:15:58'),
(523,1,'institution','site.masterterritories.create','Created Territory PORTUGAL                                                                         successfully.','124.13.34.187','2015-06-12 08:16:04'),
(524,1,'institution','site.masterterritories.create','Created Territory GUINEA-BISSAU                                                                    successfully.','124.13.34.187','2015-06-12 08:16:10'),
(525,1,'institution','site.masterterritories.create','Created Territory PUERTO RICO                                                                      successfully.','124.13.34.187','2015-06-12 08:16:18'),
(526,1,'institution','site.masterterritories.create','Created Territory QATAR                                                                            successfully.','124.13.34.187','2015-06-12 08:16:29'),
(527,1,'institution','site.masterterritories.create','Created Territory ROMANIA                                                                          successfully.','124.13.34.187','2015-06-12 08:16:35'),
(528,1,'institution','site.masterterritories.create','Created Territory RUSSIAN FEDERATION                                                               successfully.','124.13.34.187','2015-06-12 08:16:44'),
(529,1,'institution','site.masterterritories.create','Created Territory RWANDA                                                                           successfully.','124.13.34.187','2015-06-12 08:16:54'),
(530,1,'institution','site.masterterritories.create','Created Territory SAINT KITTS AND NEVIS                                                            successfully.','124.13.34.187','2015-06-12 08:17:28'),
(531,1,'institution','site.masterterritories.create','Created Territory SAINT LUCIA                                                                      successfully.','124.13.34.187','2015-06-12 08:17:35'),
(532,1,'institution','site.masterterritories.create','Created Territory SAINT VINCENT AND THE GRENADINES                                                 successfully.','124.13.34.187','2015-06-12 08:17:54'),
(533,1,'institution','site.masterterritories.create','Created Territory SAO TOME AND PRINCIPE                                                            successfully.','124.13.34.187','2015-06-12 08:18:22'),
(534,1,'institution','site.masterterritories.create','Created Territory SAUDI ARABIA                                                                     successfully.','124.13.34.187','2015-06-12 08:20:32'),
(535,1,'institution','site.masterterritories.create','Created Territory SENEGAL                                                                          successfully.','124.13.34.187','2015-06-12 08:20:41'),
(536,1,'institution','site.masterterritories.create','Created Territory SIERRA LEONE                                                                     successfully.','124.13.34.187','2015-06-12 08:21:23'),
(537,1,'institution','site.masterterritories.create','Created Territory SINGAPORE                                                                        successfully.','124.13.34.187','2015-06-12 08:21:31'),
(538,1,'institution','site.masterterritories.create','Created Territory SLOVAKIA                                                                         successfully.','124.13.34.187','2015-06-12 08:21:39'),
(539,1,'institution','site.masterterritories.create','Created Territory VIET NAM                                                                         successfully.','124.13.34.187','2015-06-12 08:21:48'),
(540,1,'institution','site.masterterritories.create','Created Territory SOMALIA                                                                          successfully.','124.13.34.187','2015-06-12 08:21:58'),
(541,1,'institution','site.masterterritories.create','Created Territory SOUTH AFRICA                                                                     successfully.','124.13.34.187','2015-06-12 08:22:05'),
(542,1,'institution','site.masterterritories.create','Created Territory ZIMBABWE                                                                         successfully.','124.13.34.187','2015-06-12 08:22:13'),
(543,1,'institution','site.masterterritories.create','Created Territory YEMEN, DEMOCRATIC                                                                successfully.','124.13.34.187','2015-06-12 08:22:20'),
(544,1,'institution','site.masterterritories.create','Created Territory SPAIN                                                                            successfully.','124.13.34.187','2015-06-12 08:22:27'),
(545,1,'institution','site.masterterritories.create','Created Territory WESTERN SAHARA                                                                   successfully.','124.13.34.187','2015-06-12 08:22:33'),
(546,1,'institution','site.masterterritories.create','Created Territory SUDAN                                                                            successfully.','124.13.34.187','2015-06-12 08:22:40'),
(547,1,'institution','site.masterterritories.create','Created Territory SWAZILAND                                                                        successfully.','124.13.34.187','2015-06-12 08:22:50'),
(548,1,'institution','site.masterterritories.create','Created Territory SWEDEN                                                                           successfully.','124.13.34.187','2015-06-12 08:22:58'),
(549,1,'institution','site.masterterritories.create','Created Territory SWITZERLAND                                                                      successfully.','124.13.34.187','2015-06-12 08:23:05'),
(550,1,'institution','site.masterterritories.create','Created Territory SYRIAN ARAB REPUBLIC                                                             successfully.','124.13.34.187','2015-06-12 08:23:14'),
(551,1,'institution','site.masterterritories.create','Created Territory TAJIKISTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:23:21'),
(552,1,'institution','site.masterterritories.create','Created Territory THAILAND                                                                         successfully.','124.13.34.187','2015-06-12 08:23:29'),
(553,1,'institution','site.masterterritories.create','Created Territory TRINIDAD AND TOBAGO                                                              successfully.','124.13.34.187','2015-06-12 08:23:40'),
(554,1,'institution','site.masterterritories.create','Created Territory UNITED ARAB EMIRATES                                                             successfully.','124.13.34.187','2015-06-12 08:23:49'),
(555,1,'institution','site.masterterritories.create','Created Territory TUNISIA                                                                          successfully.','124.13.34.187','2015-06-12 08:23:57'),
(556,1,'institution','site.masterterritories.create','Created Territory TURKEY                                                                           successfully.','124.13.34.187','2015-06-12 08:24:05'),
(557,1,'institution','site.masterterritories.create','Created Territory TURKMENISTAN                                                                     successfully.','124.13.34.187','2015-06-12 08:24:38'),
(558,1,'institution','site.masterterritories.create','Created Territory UGANDA                                                                           successfully.','124.13.34.187','2015-06-12 08:24:48'),
(559,1,'institution','site.masterterritories.create','Created Territory UKRAINE                                                                          successfully.','124.13.34.187','2015-06-12 08:24:56'),
(560,1,'institution','site.masterterritories.create','Created Territory MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF                                       successfully.','124.13.34.187','2015-06-12 08:25:02'),
(561,1,'institution','site.masterterritories.create','Created Territory EGYPT                                                                            successfully.','124.13.34.187','2015-06-12 08:25:13'),
(562,1,'institution','site.masterterritories.create','Created Territory UNITED KINGDOM                                                                   successfully.','124.13.34.187','2015-06-12 08:25:19'),
(563,1,'institution','site.masterterritories.create','Created Territory TANZANIA, UNITED REPUBLIC OF                                                     successfully.','124.13.34.187','2015-06-12 08:25:27'),
(564,1,'institution','site.masterterritories.create','Created Territory UNITED STATES                                                                    successfully.','124.13.34.187','2015-06-12 08:25:35'),
(565,1,'institution','site.masterterritories.create','Created Territory BURKINA FASO                                                                     successfully.','124.13.34.187','2015-06-12 08:25:42'),
(566,1,'institution','site.masterterritories.create','Created Territory URUGUAY                                                                          successfully.','124.13.34.187','2015-06-12 08:25:53'),
(567,1,'institution','site.masterterritories.create','Created Territory UZBEKISTAN                                                                       successfully.','124.13.34.187','2015-06-12 08:26:00'),
(568,1,'institution','site.masterterritories.create','Created Territory VENEZUELA                                                                        successfully.','124.13.34.187','2015-06-12 08:26:08'),
(569,1,'institution','site.masterterritories.create','Created Territory SAMOA                                                                            successfully.','124.13.34.187','2015-06-12 08:26:14'),
(570,1,'institution','site.masterterritories.create','Created Territory YUGOSLAVIA (0890)                                                                successfully.','124.13.34.187','2015-06-12 08:26:26'),
(571,1,'institution','site.masterterritories.create','Created Territory ZAMBIA                                                                           successfully.','124.13.34.187','2015-06-12 08:26:33'),
(572,1,'institution','site.masterterritories.create','Created Territory WEST AFRICA REGION                                                               successfully.','124.13.34.187','2015-06-12 08:27:07'),
(573,1,'institution','site.masterterritories.create','Created Territory WEST INDIES                                                                      successfully.','124.13.34.187','2015-06-12 08:27:17'),
(574,1,'institution','site.masterterritories.create','Created Territory SOUTH EAST ASIA                                                                  successfully.','124.13.34.187','2015-06-12 08:27:25'),
(575,1,'institution','site.masterterritories.create','Created Territory SOUTH AMERICA                                                                    successfully.','124.13.34.187','2015-06-12 08:27:38'),
(576,1,'institution','site.masterterritories.create','Created Territory SCANDINAVIA                                                                      successfully.','124.13.34.187','2015-06-12 08:27:49'),
(577,1,'institution','site.masterterritories.create','Created Territory OCEANIA                                                                          successfully.','124.13.34.187','2015-06-12 08:27:57'),
(578,1,'institution','site.masterterritories.create','Created Territory NORTH AMERICA                                                                    successfully.','124.13.34.187','2015-06-12 08:28:04'),
(579,1,'institution','site.masterterritories.create','Created Territory NORTH AFRICA                                                                     successfully.','124.13.34.187','2015-06-12 08:28:11'),
(580,1,'institution','site.masterterritories.create','Created Territory NORDIC COUNTRIES                                                                 successfully.','124.13.34.187','2015-06-12 08:28:18'),
(581,1,'institution','site.masterterritories.create','Created Territory NAFTA COUNTRIES                                                                  successfully.','124.13.34.187','2015-06-12 08:28:25'),
(582,1,'institution','site.masterterritories.create','Created Territory MIDDLE EAST                                                                      successfully.','124.13.34.187','2015-06-12 08:28:33'),
(583,1,'institution','site.masterterritories.create','Created Territory GSA COUNTRIES                                                                    successfully.','124.13.34.187','2015-06-12 08:28:40'),
(584,1,'institution','site.masterterritories.create','Created Territory EUROPEAN UNION                                                                   successfully.','124.13.34.187','2015-06-12 08:28:46'),
(585,1,'institution','site.masterterritories.create','Created Territory EUROPEAN ECONOMIC COMMUNITY                                                      successfully.','124.13.34.187','2015-06-12 08:28:53'),
(586,1,'institution','site.masterterritories.create','Created Territory EUROPEAN CONTINENT                                                               successfully.','124.13.34.187','2015-06-12 08:29:04'),
(587,1,'institution','site.masterterritories.create','Created Territory EUROPEAN ECONOMIC AREA                                                           successfully.','124.13.34.187','2015-06-12 08:29:13'),
(588,1,'institution','site.masterterritories.create','Created Territory EASTERN EUROPE                                                                   successfully.','124.13.34.187','2015-06-12 08:29:22'),
(589,1,'institution','site.masterterritories.create','Created Territory SOUTH AFRICA REGION                                                              successfully.','124.13.34.187','2015-06-12 08:30:01'),
(590,1,'institution','site.masterterritories.create','Created Territory EAST AFRICA REGION                                                               successfully.','124.13.34.187','2015-06-12 08:30:22'),
(591,1,'user','site.default.logout','admin logged-out successfully.','124.13.34.187','2015-06-12 08:32:03'),
(592,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),
(593,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),
(594,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 20:51:41'),
(595,1,'user','site.default.login','Admin logged-in successfully.','121.121.108.72','2015-06-12 20:56:21'),
(596,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),
(597,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),
(598,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),
(599,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:08:01'),
(600,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),
(601,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),
(602,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),
(603,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),
(604,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','122.164.196.219','2015-06-12 21:14:10'),
(605,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:06'),
(606,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:06'),
(607,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),
(608,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),
(609,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),
(610,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','122.164.196.219','2015-06-12 21:15:28'),
(611,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),
(612,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),
(613,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),
(614,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:17:52'),
(615,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),
(616,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),
(617,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','123.136.107.51','2015-06-12 21:23:40'),
(618,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),
(619,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),
(620,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),
(621,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),
(622,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.196.219','2015-06-12 21:26:23'),
(623,1,'user','site.authoraccount.update','Updated Robertt  Kiyosaki AuthorAccount successfully.','122.164.196.219','2015-06-12 21:40:51'),
(624,1,'user','site.default.logout','admin logged-out successfully.','122.164.196.219','2015-06-12 21:41:22'),
(625,1,'user','site.default.login','admin logged-in successfully.','122.164.196.219','2015-06-12 22:16:10'),
(626,1,'sliders','site.work.create','Created Work successfully.','121.121.108.72','2015-06-12 22:34:40'),
(627,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.108.72','2015-06-12 22:35:33'),
(628,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Test Factor successfully.','121.121.108.72','2015-06-12 22:36:04'),
(629,1,'volume-up','site.recording.create','Created Recording successfully.','121.121.108.72','2015-06-12 22:37:01'),
(630,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Test Grid successfully.','121.121.108.72','2015-06-12 22:37:39'),
(631,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Test Grid successfully.','121.121.108.72','2015-06-12 22:37:39'),
(632,1,'at','site.mastertyperights.update','Updated Type of Right Performer successfully.','121.121.108.72','2015-06-12 22:38:18'),
(633,1,'at','site.mastertyperights.update','Updated Type of Right Guest Singers, Musicians or Supporting Actor successfully.','121.121.108.72','2015-06-12 22:38:34'),
(634,1,'at','site.mastertyperights.update','Updated Type of Right Soloist, Lead Singer successfully.','121.121.108.72','2015-06-12 22:39:11'),
(635,1,'at','site.mastertyperights.update','Updated Type of Right Other Musicians and Perfomers successfully.','121.121.108.72','2015-06-12 22:39:31'),
(636,1,'sliders','site.work.create','Created Work successfully.','121.121.108.72','2015-06-13 01:09:45'),
(637,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.108.72','2015-06-13 01:15:53'),
(638,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Yellow Tree successfully.','121.121.108.72','2015-06-13 01:22:37'),
(639,1,'user','site.default.login','Admin logged-in successfully.','175.139.245.142','2015-06-15 01:41:41'),
(640,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(641,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(642,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(643,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(644,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(645,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.136.135','2015-06-15 22:44:00'),
(646,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-17 23:55:00'),
(647,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 00:09:08'),
(648,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-18 00:16:11'),
(649,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),
(650,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),
(651,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','122.164.150.61','2015-06-17 17:55:02'),
(652,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:20:48'),
(653,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:20:48'),
(654,1,'sliders','site.work.update','Saved Work Publishing successfully.','122.164.150.61','2015-06-17 18:21:09'),
(655,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),
(656,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),
(657,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:21:34'),
(658,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:22:01'),
(659,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','122.164.150.61','2015-06-17 18:22:01'),
(660,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),
(661,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),
(662,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','122.164.150.61','2015-06-17 18:35:19'),
(663,1,'user','site.default.login','admin logged-in successfully.','118.101.75.158','2015-06-17 19:54:30'),
(664,1,'sliders','site.work.update','Saved Work Publishing successfully.','118.101.75.158','2015-06-17 20:10:04'),
(665,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),
(666,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),
(667,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:05:41'),
(668,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),
(669,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),
(670,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:12'),
(671,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),
(672,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),
(673,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:37'),
(674,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),
(675,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),
(676,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:06:51'),
(677,1,'at','site.mastertyperights.update','Updated Type of Right Sub- Publisher successfully.','121.121.109.252','2015-06-18 08:07:57'),
(678,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),
(679,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),
(680,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','121.121.109.252','2015-06-18 08:08:32'),
(681,1,'at','site.mastertyperights.delete','Deleted Type of Right Administrator successfully.','121.121.109.252','2015-06-18 08:10:00'),
(682,1,'at','site.mastertyperights.delete','Deleted Type of Right Actor successfully.','121.121.109.252','2015-06-18 08:10:45'),
(683,1,'at','site.mastertyperights.delete','Deleted Type of Right Graphic designer successfully.','121.121.109.252','2015-06-18 08:10:49'),
(684,1,'at','site.mastertyperights.delete','Deleted Type of Right Analyst/Programmer successfully.','121.121.109.252','2015-06-18 08:10:54'),
(685,1,'at','site.mastertyperights.delete','Deleted Type of Right Author of screen play/Author of dialogue successfully.','121.121.109.252','2015-06-18 08:11:00'),
(686,1,'at','site.mastertyperights.update','Updated Type of Right Sub-Author successfully.','121.121.109.252','2015-06-18 08:11:55'),
(687,1,'at','site.mastertyperights.update','Updated Type of Right Sub-Arranger successfully.','121.121.109.252','2015-06-18 08:12:29'),
(688,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 08:12:38'),
(689,1,'user','site.default.login','admin logged-in successfully.','175.139.236.111','2015-06-18 08:12:51'),
(690,1,'at','site.mastertyperights.update','Updated Type of Right Lyricist successfully.','121.121.109.252','2015-06-18 08:13:07'),
(691,1,'at','site.mastertyperights.create','Created Type of Right Adapter / Translator successfully.','121.121.109.252','2015-06-18 08:14:06'),
(692,1,'at','site.mastertyperights.create','Created Type of Right Music Publisher successfully.','121.121.109.252','2015-06-18 08:14:56'),
(693,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','121.121.109.252','2015-06-18 08:21:43'),
(694,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','121.121.109.252','2015-06-18 08:21:43'),
(695,1,'at','site.mastertyperights.delete','Deleted Type of Right Producer successfully.','121.121.109.252','2015-06-18 08:22:27'),
(696,1,'at','site.mastertyperights.delete','Deleted Type of Right Producer successfully.','121.121.109.252','2015-06-18 08:22:31'),
(697,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 2 successfully.','121.121.109.252','2015-06-18 08:23:52'),
(698,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 15 successfully.','121.121.109.252','2015-06-18 08:24:14'),
(699,1,'share-alt','site.sharedefinitionperrole.update','Updated ShareDefinitionPerRole 17 successfully.','121.121.109.252','2015-06-18 08:25:55'),
(700,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','121.121.109.252','2015-06-18 08:26:33'),
(701,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for dookie successfully.','121.121.109.252','2015-06-18 08:26:33'),
(702,1,'music','site.performeraccount.create','Created Performer Hetfield James successfully.','121.121.109.252','2015-06-18 08:27:05'),
(703,1,'music','site.performeraccount.update','Updated Performer Related Rights Hetfield James successfully.','121.121.109.252','2015-06-18 08:27:54'),
(704,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','121.121.109.252','2015-06-18 08:28:38'),
(705,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for nothing else matters successfully.','121.121.109.252','2015-06-18 08:28:38'),
(706,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','121.121.109.252','2015-06-18 08:29:11'),
(707,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for ride the lightning successfully.','121.121.109.252','2015-06-18 08:29:11'),
(708,1,'volume-up','site.recording.delete','Deleted Recording successfully.','121.121.109.252','2015-06-18 08:29:20'),
(709,1,'music','site.performeraccount.create','Created Performer Will Smith successfully.','121.121.109.252','2015-06-18 08:29:41'),
(710,1,'music','site.performeraccount.update','Updated Performer Related Rights Will Smith successfully.','121.121.109.252','2015-06-18 08:30:06'),
(711,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','121.121.109.252','2015-06-18 08:34:20'),
(712,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Wild wild west successfully.','121.121.109.252','2015-06-18 08:34:20'),
(713,1,'sliders','site.work.update','Updated Work successfully.','121.121.109.252','2015-06-18 08:34:36'),
(714,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.109.252','2015-06-18 08:34:44'),
(715,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','121.121.109.252','2015-06-18 08:35:31'),
(716,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:35:52'),
(717,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:35:57'),
(718,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:03'),
(719,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:07'),
(720,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:14'),
(721,1,'sliders','site.work.delete','Deleted Work successfully.','121.121.109.252','2015-06-18 08:36:17'),
(722,1,'sliders','site.work.create','Created Work successfully.','121.121.109.252','2015-06-18 08:36:53'),
(723,1,'sliders','site.work.update','Saved Work Documentation successfully.','121.121.109.252','2015-06-18 08:36:58'),
(724,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Old McDonalds successfully.','121.121.109.252','2015-06-18 08:37:43'),
(725,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Old McDonalds successfully.','121.121.109.252','2015-06-18 08:37:43'),
(726,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:08'),
(727,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:08'),
(728,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:22'),
(729,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','121.121.109.252','2015-06-18 08:40:22'),
(730,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','175.139.236.111','2015-06-18 09:17:34'),
(731,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Music 1 successfully.','175.139.236.111','2015-06-18 09:17:34'),
(732,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),
(733,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),
(734,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','175.139.236.111','2015-06-18 09:40:36'),
(735,1,'sliders','site.work.update','Saved Work Publishing successfully.','175.139.236.111','2015-06-18 09:50:24'),
(736,1,'user','site.default.logout','admin logged-out successfully.','175.139.236.111','2015-06-18 09:55:47'),
(737,1,'user','site.default.login','Admin logged-in successfully.','118.100.80.230','2015-06-18 17:28:00'),
(738,1,'user','site.authoraccount.create','Created a A  S successfully.','118.100.80.230','2015-06-18 17:33:19'),
(739,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','118.100.80.230','2015-06-18 18:00:59'),
(740,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','118.100.80.230','2015-06-18 18:00:59'),
(741,1,'sliders','site.work.update','Saved Work Publishing successfully.','118.100.80.230','2015-06-18 18:12:17'),
(742,1,'user','site.default.login','admin logged-in successfully.','122.164.186.175','2015-06-18 20:02:20'),
(743,1,'user','site.default.logout','admin logged-out successfully.','118.101.75.158','2015-06-18 20:29:52'),
(813,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:15:56'),
(814,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:15:56'),
(815,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 12:18:46'),
(816,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),
(817,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),
(818,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:22:05'),
(819,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:23:08'),
(820,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:23:08'),
(821,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),
(822,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),
(823,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Just the two of us successfully.','127.0.0.1','2015-06-22 12:42:31'),
(824,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 12:59:40'),
(825,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:00:01'),
(826,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:00:43'),
(827,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:02:11'),
(828,1,'user','site.authoraccount.update','Updated Jenniferr  Jeann AuthorAccount successfully.','127.0.0.1','2015-06-22 13:19:25'),
(829,1,'music','site.performeraccount.update','Updated Performer Robert Kiyosaki successfully.','127.0.0.1','2015-06-22 13:20:43'),
(830,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','127.0.0.1','2015-06-22 14:02:05'),
(831,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:10:31'),
(832,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:10:38'),
(833,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:11:45'),
(834,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-22 15:13:53'),
(835,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-06-22 15:36:56'),
(836,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000100 successfully.','127.0.0.1','2015-06-22 15:43:31'),
(837,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000101 successfully.','127.0.0.1','2015-06-22 15:44:15'),
(838,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 16:23:55'),
(839,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:41:39'),
(840,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:50:23'),
(841,1,'user','site.authoraccount.update','Updated John  Mac Document saved successfully.','127.0.0.1','2015-06-22 17:54:43'),
(842,1,'user','site.authoraccount.update','Updated John  Mac Document saved successfully.','127.0.0.1','2015-06-22 17:54:55'),
(843,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 17:58:36'),
(844,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:11:14'),
(845,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:11:50'),
(846,1,'user','site.authoraccount.create','Created a Vincent  Raj successfully.','127.0.0.1','2015-06-22 18:13:48'),
(847,1,'music','site.performeraccount.create','Created Performer Mary Jean successfully.','127.0.0.1','2015-06-22 18:16:43'),
(848,1,'microphone','site.publisheraccount.create','Created Publisher Man Power Tech successfully.','127.0.0.1','2015-06-22 18:17:32'),
(849,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 18:18:54'),
(850,1,'sliders','site.work.update','Updated Enter Sandman  Publishing Contract saved successfully.','127.0.0.1','2015-06-22 18:19:27'),
(851,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),
(852,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),
(853,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-22 18:20:38'),
(854,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:24:46'),
(855,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:26:24'),
(856,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:26:44'),
(857,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:26:51'),
(858,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:27:37'),
(859,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:27:43'),
(860,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:45'),
(861,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:50'),
(862,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),
(863,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),
(864,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),
(865,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:41:51'),
(866,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:41:55'),
(867,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:41:57'),
(868,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:01'),
(869,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:05'),
(870,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:42:47'),
(871,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-22 18:43:16'),
(872,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:45:42'),
(873,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:46:40'),
(874,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-22 18:46:45'),
(875,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:51:48'),
(876,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 18:59:04'),
(877,1,'sliders','site.work.filedelete','Deleted a file Enter Sandman successfully.','127.0.0.1','2015-06-22 18:59:51'),
(878,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-22 19:04:37'),
(879,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-23 10:53:06'),
(880,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-23 10:53:55'),
(881,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Exclusive rights successfully.','127.0.0.1','2015-06-23 10:54:32'),
(882,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Equitable Remuneration successfully.','127.0.0.1','2015-06-23 10:54:44'),
(883,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Neighboring Rights successfully.','127.0.0.1','2015-06-23 10:54:51'),
(884,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Exclusive rights successfully.','127.0.0.1','2015-06-23 10:55:00'),
(885,1,'copyright','site.mastermanagedrights.create','Created Master Manage Rights B successfully.','127.0.0.1','2015-06-23 11:11:12'),
(886,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights B successfully.','127.0.0.1','2015-06-23 11:11:20'),
(887,1,'user','site.authoraccount.update','Updated John  Mac Managed Rights successfully.','127.0.0.1','2015-06-23 11:11:40'),
(888,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-23 11:50:50'),
(889,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-23 11:50:55'),
(890,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-23 11:58:30'),
(891,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-23 11:58:36'),
(892,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 12:08:50'),
(893,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 14:10:42'),
(894,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 14:13:30'),
(895,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 15:15:37'),
(896,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:04:04'),
(897,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:05:14'),
(898,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 16:11:18'),
(899,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 16:52:35'),
(900,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 16:52:41'),
(901,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:10:12'),
(902,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:24:44'),
(903,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:37:16'),
(904,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:37:30'),
(905,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 17:37:34'),
(906,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-23 17:38:01'),
(907,1,'user','site.performeraccount.update','Updated Jennifer  Jeann Managed Rights successfully.','127.0.0.1','2015-06-23 17:44:27'),
(908,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 17:51:33'),
(909,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 17:53:28'),
(910,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:11'),
(911,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:41'),
(912,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:00:46'),
(913,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:01:18'),
(914,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Jennifer Jeann successfully.','127.0.0.1','2015-06-23 18:01:24'),
(915,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:26'),
(916,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:31'),
(917,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from John Mac successfully.','127.0.0.1','2015-06-23 18:16:35'),
(918,1,'cron','site.cron.cron','Cron Ru','0','2015-06-23 19:01:50'),
(919,1,'cron','site.default.dailycron','Cron Run at 2015-06-23 15:37:03','127.0.0.1','2015-06-23 19:07:03'),
(920,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-24 10:22:11'),
(921,1,'user','site.authoraccount.update','Updated John  Mac Biography successfully.','127.0.0.1','2015-06-24 10:22:26'),
(922,1,'music','site.performeraccount.update','Updated Performer Biography Jennifer Jeann successfully.','127.0.0.1','2015-06-24 10:50:38'),
(923,1,'user','site.authoraccount.create','Created a Vinod  Kumar successfully.','127.0.0.1','2015-06-24 11:00:52'),
(924,1,'user','site.authoraccount.update','Updated Vinod  Kumar Biography successfully.','127.0.0.1','2015-06-24 11:01:05'),
(925,1,'user','site.authoraccount.update','Updated Vinod  Kumar Biography successfully.','127.0.0.1','2015-06-24 11:01:09'),
(926,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:04:31'),
(927,1,'user','site.authoraccount.update','Updated Rajesh  Raj Managed Rights successfully.','127.0.0.1','2015-06-24 11:04:37'),
(928,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:04:46'),
(929,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:04:53'),
(930,1,'music','site.authoraccount.update','Updated Performer Related Rights Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:05:11'),
(931,1,'user','site.authoraccount.delete','Deleted a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:06:19'),
(932,1,'user','site.authoraccount.delete','Deleted a Vinod  Kumar successfully.','127.0.0.1','2015-06-24 11:06:23'),
(933,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:06:40'),
(934,1,'user','site.authoraccount.update','Updated Rajesh  Raj Managed Rights successfully.','127.0.0.1','2015-06-24 11:06:44'),
(935,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:06:52'),
(936,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:06:59'),
(937,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:07:34'),
(938,1,'user','site.authoraccount.delete','Deleted a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:08:53'),
(939,1,'user','site.authoraccount.create','Created a Rajesh  Raj successfully.','127.0.0.1','2015-06-24 11:09:05'),
(940,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:09:13'),
(941,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:09:24'),
(942,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:09:47'),
(943,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:00'),
(944,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:05'),
(945,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:09'),
(946,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 11:10:12'),
(947,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:10:30'),
(948,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:17:49'),
(949,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:27:46'),
(950,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:28:40'),
(951,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:30:05'),
(952,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:30:38'),
(953,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:33:39'),
(954,1,'user','site.authoraccount.update','Updated Rajesh  Raj Biography successfully.','127.0.0.1','2015-06-24 11:34:12'),
(955,1,'user','site.authoraccount.update','Updated Rajesh  Raj Document saved successfully.','127.0.0.1','2015-06-24 11:37:00'),
(956,1,'user','site.authoraccount.update','Updated Rajesh  Raj AuthorAccount successfully.','127.0.0.1','2015-06-24 11:41:37'),
(957,1,'music','site.performeraccount.create','Created Performer Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:05'),
(958,1,'music','site.performeraccount.update','Updated Performer Related Rights Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:11'),
(959,1,'music','site.performeraccount.update','Updated Performer Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:45:35'),
(960,1,'music','site.performeraccount.update','Updated Performer Related Rights Ram Ramesh successfully.','127.0.0.1','2015-06-24 11:46:12'),
(961,1,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-06-24 11:47:09'),
(962,1,'music','site.performeraccount.update','Updated Performer Related Rights Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:48:14'),
(963,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:49:09'),
(964,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:51:05'),
(965,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:52:11'),
(966,1,'music','site.performeraccount.update','Updated Performer Biography Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:54:32'),
(967,1,'music','site.performeraccount.update','Updated Performer Jeanne Raison successfully.','127.0.0.1','2015-06-24 11:56:08'),
(968,1,'user','site.authoraccount.update','Updated Jeanne  Raison Managed Rights successfully.','127.0.0.1','2015-06-24 11:56:34'),
(969,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),
(970,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),
(971,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),
(972,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 12:09:30'),
(973,1,'microphone','site.publisheraccount.update','Updated Publisher ACOL Limited successfully.','127.0.0.1','2015-06-24 12:20:02'),
(974,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:21:06'),
(975,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:23:11'),
(976,1,'user','site.publisheraccount.biofiledelete','Deleted a Biography file from ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:00'),
(977,1,'user','site.publisheraccount.biofiledelete','Deleted a Biography file from ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:08'),
(978,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 12:28:25'),
(979,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 13:00:32'),
(980,1,'user','site.produceraccount.biofiledelete','Deleted a Biography file from ABM Limited successfully.','127.0.0.1','2015-06-24 13:02:46'),
(981,1,'user','site.produceraccount.biofiledelete','Deleted a Biography file from ABM Limited successfully.','127.0.0.1','2015-06-24 13:02:58'),
(982,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 13:04:26'),
(983,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-06-24 13:10:59'),
(984,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:12:38'),
(985,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:13:19'),
(986,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:15:01'),
(987,1,'user','site.authoraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-24 13:18:38'),
(988,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:20:43'),
(989,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:10'),
(990,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:16'),
(991,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:48'),
(992,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 1 successfully.','127.0.0.1','2015-06-24 13:21:52'),
(993,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-06-24 13:34:18'),
(994,1,'user','site.publishergroup.biofiledelete','Deleted a Biography file from Corporate name successfully.','127.0.0.1','2015-06-24 13:37:32'),
(995,1,'users','site.group.update','Biography Saved on Author Group 2 successfully.','127.0.0.1','2015-06-24 13:37:52'),
(996,1,'user','site.group.biofiledelete','Deleted a Biography file from Author Group 2 successfully.','127.0.0.1','2015-06-24 13:37:57'),
(997,1,'users','site.group.update','Biography Saved on Author Group 2 successfully.','127.0.0.1','2015-06-24 13:39:22'),
(998,1,'users','site.group.update','Biography Saved on test performer group successfully.','127.0.0.1','2015-06-24 13:40:16'),
(999,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-24 13:42:08'),
(1000,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:48:43'),
(1001,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-24 13:51:31'),
(1002,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-24 13:51:48'),
(1003,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 13:52:06'),
(1004,1,'money','site.produceraccount.update','Updated Producer Biography ACOL Limited successfully.','127.0.0.1','2015-06-24 13:52:27'),
(1005,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-24 13:52:43'),
(1006,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-06-24 13:52:56'),
(1007,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:00:53'),
(1008,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:01:00'),
(1009,1,'microphone','site.publisheraccount.update','Updated Publisher Biography CAG Limited successfully.','127.0.0.1','2015-06-24 14:01:13'),
(1010,1,'microphone','site.publisheraccount.update','Updated Publisher CAG Limited successfully.','127.0.0.1','2015-06-24 14:02:30'),
(1011,1,'money','site.produceraccount.update','Updated Producer Managed Rights CAG Limited successfully.','127.0.0.1','2015-06-24 14:02:55'),
(1012,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:22'),
(1013,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:29'),
(1014,1,'microphone','site.publisheraccount.update','Updated Publisher ABM Limited successfully.','127.0.0.1','2015-06-24 14:07:42'),
(1015,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),
(1016,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),
(1017,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),
(1018,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:06:41'),
(1019,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),
(1020,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),
(1021,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),
(1022,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:18:38'),
(1023,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),
(1024,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),
(1025,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),
(1026,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:21:42'),
(1027,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),
(1028,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),
(1029,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),
(1030,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:22:18'),
(1031,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:27'),
(1032,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),
(1033,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),
(1034,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-24 17:36:28'),
(1035,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-24 18:11:32'),
(1036,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights All rights successfully.','127.0.0.1','2015-06-24 18:12:03'),
(1037,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-06-24 18:13:03'),
(1038,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-24 18:37:26'),
(1039,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-06-24 18:37:30'),
(1040,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),
(1041,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),
(1042,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),
(1043,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work successfully.','127.0.0.1','2015-06-24 18:41:37'),
(1044,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-24 18:42:00'),
(1045,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-24 18:42:14'),
(1046,1,'sliders','site.work.update','New Work  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-24 18:42:24'),
(1047,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-24 18:47:30'),
(1048,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-24 19:06:45'),
(1049,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-06-24 19:07:02'),
(1050,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-24 19:20:18'),
(1051,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-24 19:23:05'),
(1052,1,'user','site.authoraccount.update','Updated Vincent  Raj AuthorAccount successfully.','127.0.0.1','2015-06-26 11:04:47'),
(1053,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-26 11:45:37'),
(1054,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-06-26 12:00:08'),
(1055,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:32:15'),
(1056,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:32:15'),
(1057,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:32:16'),
(1058,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:32:16'),
(1059,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-26 12:33:22'),
(1060,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-26 12:33:52'),
(1061,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-26 12:50:21'),
(1062,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-26 12:51:18'),
(1063,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:59:23'),
(1064,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:59:23'),
(1065,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 12:59:23'),
(1066,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-26 13:12:44'),
(1067,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-06-26 13:13:35'),
(1068,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-26 13:23:33'),
(1069,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-26 13:23:43'),
(1070,1,'music','site.performeraccount.update','Updated Performer Biography Rajesh Raj successfully.','127.0.0.1','2015-06-26 13:24:49'),
(1071,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-26 13:24:56'),
(1072,1,'user','site.performeraccount.biofiledelete','Deleted a Biography file from Rajesh Raj successfully.','127.0.0.1','2015-06-26 13:25:03'),
(1073,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-06-26 13:36:41'),
(1074,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-06-26 13:44:32'),
(1075,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-06-26 13:44:50'),
(1076,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-06-26 13:48:19'),
(1077,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-06-26 13:51:51'),
(1078,1,'user','site.publishergroup.biofiledelete','Deleted a Biography file from Corporate name successfully.','127.0.0.1','2015-06-26 13:51:57'),
(1079,1,'users','site.group.update','Biography Saved on Author Group 2 successfully.','127.0.0.1','2015-06-26 13:52:52'),
(1080,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 15:25:23'),
(1081,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 15:25:23'),
(1082,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 15:25:23'),
(1083,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 15:26:38'),
(1084,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 15:27:37'),
(1085,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki AuthorAccount successfully.','127.0.0.1','2015-06-26 15:47:43'),
(1086,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 15:48:51'),
(1087,1,'user','site.authoraccount.update','Updated Robert  Kiyosaki Biography successfully.','127.0.0.1','2015-06-26 16:03:45'),
(1088,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 16:22:43'),
(1089,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 16:22:43'),
(1090,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 16:22:43'),
(1091,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-26 16:22:43'),
(1092,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-26 16:24:57'),
(1093,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:31:01'),
(1094,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:32:08'),
(1095,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:32:46'),
(1096,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:32:56'),
(1097,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:33:11'),
(1098,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:33:24'),
(1099,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:34:57'),
(1100,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-06-26 16:36:07'),
(1101,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-26 16:42:31'),
(1102,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','127.0.0.1','2015-06-26 17:59:08'),
(1103,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-27 10:29:24'),
(1104,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-06-27 15:44:14'),
(1105,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-27 15:45:03'),
(1106,1,'music','site.performeraccount.update','Updated Performer Nancy Gilson successfully.','127.0.0.1','2015-06-27 16:02:45'),
(1107,1,'music','site.performeraccount.update','Updated Performer Related Rights Nancy Gilson successfully.','127.0.0.1','2015-06-27 16:03:08'),
(1108,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-06-27 16:29:42'),
(1109,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-06-27 16:31:38'),
(1110,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-06-27 16:32:44'),
(1111,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-06-27 16:35:25'),
(1112,1,'user','site.work.biofiledelete','Deleted a Biography file from Enter Sandman successfully.','127.0.0.1','2015-06-27 16:36:44'),
(1113,1,'user','site.work.biofiledelete','Deleted a Biography file from Enter Sandman successfully.','127.0.0.1','2015-06-27 16:37:14'),
(1114,1,'at','site.mastertyperights.update','Updated Type of Right Composer/Author successfully.','127.0.0.1','2015-06-27 19:56:45'),
(1115,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 11:24:10'),
(1116,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 11:24:10'),
(1117,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 12:13:20'),
(1118,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 12:13:20'),
(1119,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 12:18:18'),
(1120,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 12:18:18'),
(1121,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 12:18:18'),
(1122,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-29 12:21:26'),
(1123,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:09:59'),
(1124,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:09:59'),
(1125,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:09:59'),
(1126,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:12:10'),
(1127,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:12:10'),
(1128,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:12:10'),
(1129,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:12:10'),
(1130,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:37:38'),
(1131,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:37:38'),
(1132,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:37:38'),
(1133,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:49:19'),
(1134,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:49:19'),
(1135,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:49:28'),
(1136,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:49:28'),
(1137,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:10'),
(1138,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:10'),
(1139,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:10'),
(1140,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:17'),
(1141,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:17'),
(1142,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 13:50:17'),
(1143,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 14:09:00'),
(1144,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 14:09:00'),
(1145,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 15:59:52'),
(1146,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 15:59:52'),
(1147,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 16:32:03'),
(1148,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 16:32:03'),
(1149,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 16:32:03'),
(1150,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 16:38:27'),
(1151,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 16:38:28'),
(1152,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 18:21:39'),
(1153,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 18:21:39'),
(1154,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 18:21:39'),
(1155,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-06-29 18:21:39'),
(1156,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-06-29 18:54:08'),
(1157,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-06-29 18:54:12'),
(1158,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:54:47'),
(1159,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:54:47'),
(1160,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:55:49'),
(1161,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:55:49'),
(1162,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:55:49'),
(1163,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-29 18:56:06'),
(1164,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:57:42'),
(1165,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:57:42'),
(1166,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:57:42'),
(1167,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 18:57:42'),
(1168,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 19:01:19'),
(1169,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 19:01:20'),
(1170,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 19:01:20'),
(1171,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-06-29 19:01:20'),
(1172,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-29 19:01:29'),
(1173,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-06-29 19:01:44'),
(1174,1,'copyright','site.mastermanagedrights.create','Created Master Manage Rights Retransmission Right successfully.','127.0.0.1','2015-06-29 19:17:05'),
(1175,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-06-30 12:22:41'),
(1176,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-06-30 13:51:22'),
(1177,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-06-30 13:59:51'),
(1178,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-06-30 14:00:00'),
(1179,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-06-30 16:01:02'),
(1180,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-06-30 16:01:07'),
(1181,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-07-01 17:48:46'),
(1182,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-01 17:48:50'),
(1183,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-07-01 17:52:31'),
(1184,3,'user','site.default.login','admin2 logged-in successfully.','127.0.0.1','2015-07-01 17:52:38'),
(1185,3,'user','site.default.logout','admin 2 logged-out successfully.','127.0.0.1','2015-07-01 18:39:27'),
(1186,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-01 18:39:32'),
(1187,5,'user','site.default.login','vinodh logged-in successfully.','127.0.0.1','2015-07-01 18:40:51'),
(1188,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','127.0.0.1','2015-07-02 16:50:14'),
(1189,1,'at','site.mastertyperights.update','Updated Type of Right Soloist, Lead Singer successfully.','127.0.0.1','2015-07-02 16:54:51'),
(1190,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-02 16:56:14'),
(1191,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-02 16:56:15'),
(1192,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-02 16:56:15'),
(1193,1,'user','site.authoraccount.create','Created a testtest  text successfully.','127.0.0.1','2015-07-02 18:14:15'),
(1194,1,'user','site.authoraccount.create','Created a test  testww successfully.','127.0.0.1','2015-07-02 18:19:36'),
(1195,1,'user','site.authoraccount.create','Created a wwww  wwwww successfully.','127.0.0.1','2015-07-02 18:39:22'),
(1196,1,'user','site.authoraccount.create','Created a rwerwer  rewre successfully.','127.0.0.1','2015-07-02 18:40:06'),
(1197,1,'user','site.authoraccount.create','Created a aassdss  asddsa successfully.','127.0.0.1','2015-07-02 18:41:04'),
(1198,1,'user','site.authoraccount.update','Updated aassdss  asddsa Managed Rights successfully.','127.0.0.1','2015-07-02 18:41:16'),
(1199,1,'user','site.authoraccount.update','Updated aassdss  asddsas AuthorAccount successfully.','127.0.0.1','2015-07-02 18:41:23'),
(1200,1,'user','site.authoraccount.update','Updated aassdss  asddsas AuthorAccount successfully.','127.0.0.1','2015-07-02 18:41:42'),
(1201,1,'user','site.authoraccount.update','Updated aassdss  asddsas Address successfully.','127.0.0.1','2015-07-02 19:07:20'),
(1202,1,'user','site.authoraccount.update','Updated aassdss  asddsas Address successfully.','127.0.0.1','2015-07-02 19:08:45'),
(1203,1,'user','site.authoraccount.update','Updated aassdss  asddsas Address successfully.','127.0.0.1','2015-07-02 19:09:08'),
(1204,1,'user','site.authoraccount.update','Updated aassdss  asddsas AuthorAccount successfully.','127.0.0.1','2015-07-02 19:10:28'),
(1205,1,'user','site.authoraccount.update','Updated aassdss  asddsas Address successfully.','127.0.0.1','2015-07-02 19:11:26'),
(1206,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','127.0.0.1','2015-07-02 19:17:13'),
(1207,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-03 11:10:41'),
(1208,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-07-03 11:33:57'),
(1209,1,'user','site.authoraccount.update','Updated Robert  Van Payment successfully.','127.0.0.1','2015-07-03 11:36:43'),
(1210,1,'user','site.authoraccount.update','Updated Robert  Van Pseudonym successfully.','127.0.0.1','2015-07-03 11:36:54'),
(1211,1,'user','site.authoraccount.update','Updated Robert  Van Death Inheritance successfully.','127.0.0.1','2015-07-03 11:37:04'),
(1212,1,'user','site.authoraccount.update','Updated Robert  Van Document saved successfully.','127.0.0.1','2015-07-03 11:37:10'),
(1213,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-07-03 11:37:34'),
(1214,1,'user','site.authoraccount.update','Updated Robert  Van Document saved successfully.','127.0.0.1','2015-07-03 11:38:08'),
(1215,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-07-03 11:38:51'),
(1216,1,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-07-03 11:41:07'),
(1217,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-07-03 11:42:16'),
(1218,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-07-03 11:45:36'),
(1219,1,'user','site.authoraccount.update','Updated Robert  Van Document saved successfully.','127.0.0.1','2015-07-03 11:50:02'),
(1220,1,'music','site.performeraccount.update','Updated Performer Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:00:59'),
(1221,1,'music','site.performeraccount.update','Updated Performer Address Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:04:24'),
(1222,1,'music','site.performeraccount.update','Updated Performer Payment Method Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:04:47'),
(1223,1,'music','site.performeraccount.update','Updated Performer Biography Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:05:06'),
(1224,1,'music','site.performeraccount.update','Updated Performer Pseudonym Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:05:21'),
(1225,1,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:05:33'),
(1226,1,'music','site.performeraccount.update','Updated Performer Death Inheritance Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:06:19'),
(1227,1,'music','site.performeraccount.update','Updated Performer Biography Rajeshn Raj successfully.','127.0.0.1','2015-07-03 12:06:40'),
(1228,1,'microphone','site.publisheraccount.update','Updated Publisher ABM Limited successfully.','127.0.0.1','2015-07-03 12:59:56'),
(1229,1,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-07-03 13:00:14'),
(1230,1,'microphone','site.publisheraccount.update','Updated Publisher Payment Method ABM Limited successfully.','127.0.0.1','2015-07-03 13:00:33'),
(1231,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-07-03 13:00:41'),
(1232,1,'microphone','site.publisheraccount.update','Updated Publisher Pseudonym ABM Limited successfully.','127.0.0.1','2015-07-03 13:01:05'),
(1233,1,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights ABM Limited successfully.','127.0.0.1','2015-07-03 13:05:10'),
(1234,1,'microphone','site.publisheraccount.update','Updated Publisher Succession ABM Limited successfully.','127.0.0.1','2015-07-03 13:06:44'),
(1235,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-07-03 13:07:32'),
(1236,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-07-03 13:07:50'),
(1237,1,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-07-03 13:08:07'),
(1238,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-07-03 13:16:25'),
(1239,1,'money','site.produceraccount.update','Updated Producer Managed Rights ABM Limited successfully.','127.0.0.1','2015-07-03 13:18:32'),
(1240,1,'money','site.produceraccount.update','Updated Producer Succession ABM Limited successfully.','127.0.0.1','2015-07-03 13:18:58'),
(1241,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-07-03 13:21:30'),
(1242,1,'users','site.group.update','Updated a Author Group 1 successfully.','127.0.0.1','2015-07-03 13:50:31'),
(1243,1,'users','site.group.update','Payment Method Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:50:47'),
(1244,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:50:55'),
(1245,1,'users','site.group.update','Pseudonym Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:51:07'),
(1246,1,'users','site.group.update','Payment Method Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:57:18'),
(1247,1,'users','site.group.update','Pseudonym Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:57:26'),
(1248,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:57:35'),
(1249,1,'users','site.group.update','Biography Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:57:49'),
(1250,1,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:58:40'),
(1251,1,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-07-03 13:58:56'),
(1252,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:07:56'),
(1253,1,'group','site.publishergroup.update','Updated Publisher Group Payment Method SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:08:24'),
(1254,1,'group','site.publishergroup.update','Updated Publisher Group Payment Method SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:09:36'),
(1255,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:09:52'),
(1256,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:10:03'),
(1257,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:10:29'),
(1258,1,'group','site.publishergroup.update','Updated Publisher Group Address SOC-GE-0000100 successfully.','127.0.0.1','2015-07-03 15:10:48'),
(1259,1,'group','site.publishergroup.create','Created Publisher Group SOC-GPR-0000002 successfully.','127.0.0.1','2015-07-03 15:36:16'),
(1260,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-07-03 15:52:39'),
(1261,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-07-03 15:52:51'),
(1262,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-07-03 15:53:51'),
(1263,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:54:45'),
(1264,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:54:45'),
(1265,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:54:45'),
(1266,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:55:29'),
(1267,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:55:29'),
(1268,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:55:29'),
(1269,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-03 15:55:29'),
(1270,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-07-03 15:55:36'),
(1271,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-07-03 15:55:44'),
(1272,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-07-03 15:58:22'),
(1273,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-07-03 15:58:33'),
(1274,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-03 15:58:50'),
(1275,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-03 15:59:06'),
(1276,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-07-03 16:06:05'),
(1277,1,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-07-03 16:06:14'),
(1278,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','127.0.0.1','2015-07-03 16:06:28'),
(1279,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-03 16:35:36'),
(1280,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-03 16:35:36'),
(1281,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-03 16:35:36'),
(1282,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','127.0.0.1','2015-07-03 17:01:59'),
(1283,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-07-03 17:04:59'),
(1284,3,'user','site.default.login','admin2 logged-in successfully.','127.0.0.1','2015-07-03 17:05:19'),
(1285,3,'user','site.default.logout','admin 2 logged-out successfully.','127.0.0.1','2015-07-03 17:19:22'),
(1286,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-03 17:19:27'),
(1287,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-07-03 17:33:19'),
(1288,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-03 17:51:03'),
(1289,1,'user','site.mastermanufacturer.create','Created MasterManufacturer successfully.','127.0.0.1','2015-07-04 15:31:39'),
(1290,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-07-04 16:02:03'),
(1291,1,'volume-up','site.recording.create','Created Recording successfully.','127.0.0.1','2015-07-04 16:02:27'),
(1292,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:11:31'),
(1293,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:11:31'),
(1294,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:11:31'),
(1295,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:11:31'),
(1296,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:14:58'),
(1297,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:14:58'),
(1298,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:14:59'),
(1299,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:14:59'),
(1300,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:15:54'),
(1301,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:15:54'),
(1302,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:15:54'),
(1303,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:15:54'),
(1304,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:08'),
(1305,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:09'),
(1306,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:09'),
(1307,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:09'),
(1308,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:24'),
(1309,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:24'),
(1310,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:24'),
(1311,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:16:24'),
(1312,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:20:34'),
(1313,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:20:34'),
(1314,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:20:34'),
(1315,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:20:34'),
(1316,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-07-04 19:24:59'),
(1317,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-07-04 19:25:04'),
(1318,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-04 19:29:13'),
(1319,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-04 19:29:13'),
(1320,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-04 19:29:13'),
(1321,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:38:25'),
(1322,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:38:25'),
(1323,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:38:25'),
(1324,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-04 19:38:25'),
(1325,1,'user','site.internalcodegenerate.create','Created InternalcodeGenerate successfully.','127.0.0.1','2015-07-07 11:44:13'),
(1326,1,'user','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 12:42:51'),
(1327,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 12:57:55'),
(1328,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 12:58:00'),
(1329,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 12:58:31'),
(1330,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 12:58:37'),
(1331,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 13:00:54'),
(1332,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 13:01:43'),
(1333,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 13:02:11'),
(1334,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 13:19:21'),
(1335,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 13:23:09'),
(1336,1,'user','site.soundcarrier.biofiledelete','Deleted a Biography file from Sound carrier 1 successfully.','127.0.0.1','2015-07-07 13:23:24'),
(1337,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 13:23:44'),
(1338,1,'user','site.soundcarrier.biofiledelete','Deleted a Biography file from Sound carrier 1 successfully.','127.0.0.1','2015-07-07 13:24:33'),
(1339,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 13:24:44'),
(1340,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 13:34:39'),
(1341,1,'headphones','site.soundcarrier.subtitledelete','Deleted Sound Carrier subtitle Test successfully.','127.0.0.1','2015-07-07 13:39:12'),
(1342,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 13:39:19'),
(1343,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 13:41:13'),
(1344,1,'user','site.mastermedium.create','Created MasterMedium successfully.','127.0.0.1','2015-07-07 15:38:35'),
(1345,1,'user','site.mastermedium.create','Created MasterMedium successfully.','127.0.0.1','2015-07-07 15:39:21'),
(1346,1,'user','site.mastermedium.create','Created MasterMedium successfully.','127.0.0.1','2015-07-07 15:39:29'),
(1347,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-07 15:43:24'),
(1348,1,'user','site.internalcodegenerate.create','Created InternalcodeGenerate successfully.','127.0.0.1','2015-07-07 16:00:51'),
(1349,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-07 16:05:11'),
(1350,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-07 16:05:43'),
(1351,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 16:21:50'),
(1352,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 16:22:01'),
(1353,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-07 16:22:07'),
(1354,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 16:22:59'),
(1355,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 16:23:06'),
(1356,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 16:23:21'),
(1357,1,'user','site.soundcarrier.biofiledelete','Deleted a Biography file from Sound carrier 1 successfully.','127.0.0.1','2015-07-07 16:31:13'),
(1358,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 16:39:12'),
(1359,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 16:39:20'),
(1360,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-07 16:39:25'),
(1361,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 16:40:04'),
(1362,1,'headphones','site.soundcarrier.delete','Deleted SoundCarrier successfully.','127.0.0.1','2015-07-07 16:50:16'),
(1363,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 16:52:27'),
(1364,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 16:52:37'),
(1365,1,'user','site.soundcarrier.biofiledelete','Deleted a Biography file from Sound carrier 3 successfully.','127.0.0.1','2015-07-07 16:52:47'),
(1366,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 16:52:55'),
(1367,1,'headphones','site.soundcarrier.delete','Deleted SoundCarrier successfully.','127.0.0.1','2015-07-07 16:53:06'),
(1368,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 16:55:04'),
(1369,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 16:56:38'),
(1370,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 17:02:32'),
(1371,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 17:05:42'),
(1372,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 17:05:58'),
(1373,1,'headphones','site.soundcarrier.delete','Deleted SoundCarrier successfully.','127.0.0.1','2015-07-07 17:06:08'),
(1374,1,'user','site.authoraccount.create','Created a Johnn  test successfully.','127.0.0.1','2015-07-07 17:10:42'),
(1375,1,'user','site.authoraccount.update','Updated Johnn  test Biography successfully.','127.0.0.1','2015-07-07 17:11:37'),
(1376,1,'user','site.authoraccount.delete','Deleted a Johnn  test successfully.','127.0.0.1','2015-07-07 17:13:03'),
(1377,1,'user','site.authoraccount.create','Created a test  testrwe successfully.','127.0.0.1','2015-07-07 17:15:27'),
(1378,1,'user','site.authoraccount.update','Updated test  testrwe Document saved successfully.','127.0.0.1','2015-07-07 17:15:34'),
(1379,1,'user','site.authoraccount.create','Created a test  tes successfully.','127.0.0.1','2015-07-07 17:19:12'),
(1380,1,'user','site.authoraccount.update','Updated test  tes Document saved successfully.','127.0.0.1','2015-07-07 17:19:20'),
(1381,1,'user','site.authoraccount.delete','Deleted a test  tes successfully.','127.0.0.1','2015-07-07 17:19:59'),
(1382,1,'music','site.performeraccount.create','Created Performer test testr successfully.','127.0.0.1','2015-07-07 17:21:31'),
(1383,1,'music','site.performeraccount.update','Updated Performer Document test testr successfully.','127.0.0.1','2015-07-07 17:21:46'),
(1384,1,'music','site.performeraccount.update','Updated Performer Biography test testr successfully.','127.0.0.1','2015-07-07 17:22:09'),
(1385,1,'music','site.performeraccount.create','Created Performer Newperformer test successfully.','127.0.0.1','2015-07-07 17:22:54'),
(1386,1,'music','site.performeraccount.update','Updated Performer Document Newperformer test successfully.','127.0.0.1','2015-07-07 17:23:00'),
(1387,1,'music','site.performeraccount.update','Updated Performer Biography Newperformer test successfully.','127.0.0.1','2015-07-07 17:23:19'),
(1388,1,'music','site.performeraccount.delete','Deleted Performer Newperformer test successfully.','127.0.0.1','2015-07-07 17:23:47'),
(1389,1,'microphone','site.publisheraccount.create','Created Publisher test successfully.','127.0.0.1','2015-07-07 17:26:55'),
(1390,1,'microphone','site.publisheraccount.update','Updated Publisher Biography test successfully.','127.0.0.1','2015-07-07 17:27:08'),
(1391,1,'microphone','site.publisheraccount.delete','Deleted Publisher test successfully.','127.0.0.1','2015-07-07 17:27:30'),
(1392,1,'money','site.produceraccount.create','Created Producer test successfully.','127.0.0.1','2015-07-07 17:28:50'),
(1393,1,'money','site.produceraccount.update','Updated Producer Biography test successfully.','127.0.0.1','2015-07-07 17:29:00'),
(1394,1,'money','site.produceraccount.delete','Deleted Producer test successfully.','127.0.0.1','2015-07-07 17:29:12'),
(1395,1,'users','site.group.create','Created a Groupauthor successfully.','127.0.0.1','2015-07-07 17:35:10'),
(1396,1,'users','site.group.update','Biography Saved on Groupauthor successfully.','127.0.0.1','2015-07-07 17:35:26'),
(1397,1,'group','site.group.delete','Deleted a Test Group  successfully.','127.0.0.1','2015-07-07 17:35:43'),
(1398,1,'group','site.group.delete','Deleted a Groupauthor successfully.','127.0.0.1','2015-07-07 17:36:24'),
(1399,1,'group','site.publishergroup.create','Created Publisher Group SOC-GE-0000002 successfully.','127.0.0.1','2015-07-07 17:38:54'),
(1400,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000002 successfully.','127.0.0.1','2015-07-07 17:39:09'),
(1401,1,'group','site.publishergroup.delete','Deleted Publisher Group SOC-GE-0000002 successfully.','127.0.0.1','2015-07-07 17:39:20'),
(1402,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-07-07 17:49:17'),
(1403,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-07-07 17:49:23'),
(1404,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:49:46'),
(1405,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:49:46'),
(1406,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:49:46'),
(1407,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-07-07 17:50:00'),
(1408,1,'sliders','site.work.update','New Work 1  Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-07 17:50:18'),
(1409,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:50:43'),
(1410,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:50:43'),
(1411,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:50:43'),
(1412,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work 1 successfully.','127.0.0.1','2015-07-07 17:50:43'),
(1413,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-07-07 17:51:03'),
(1414,1,'sliders','site.work.update','New Work 1  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-07 17:51:21'),
(1415,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-07-07 17:51:39'),
(1416,1,'sliders','site.work.delete','Deleted Work successfully.','127.0.0.1','2015-07-07 17:52:35'),
(1417,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-07 17:55:01'),
(1418,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-07 17:55:08'),
(1419,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-07 17:55:19'),
(1420,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-07 17:55:26'),
(1421,1,'headphones','site.soundcarrier.update','Saved Sound Carrier Biography successfully.','127.0.0.1','2015-07-07 17:55:39'),
(1422,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-07 17:56:32'),
(1423,1,'user','site.authoraccount.create','Created a Johnn  Raj successfully.','127.0.0.1','2015-07-07 18:09:11'),
(1424,1,'user','site.authoraccount.delete','Deleted a Johnn  Raj successfully.','127.0.0.1','2015-07-07 18:10:11'),
(1425,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-07-08 16:00:37'),
(1426,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-08 16:00:43'),
(1427,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-08 18:18:35'),
(1428,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-08 18:33:45'),
(1429,1,'user','site.masterstudio.create','Created MasterStudio successfully.','127.0.0.1','2015-07-09 11:00:15'),
(1430,1,'user','site.masterstudio.create','Created MasterStudio successfully.','127.0.0.1','2015-07-09 11:00:22'),
(1431,1,'user','site.masterstudio.create','Created MasterStudio successfully.','127.0.0.1','2015-07-09 11:01:06'),
(1432,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-09 11:15:15'),
(1433,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-09 11:15:24'),
(1434,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 12:12:11'),
(1435,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-09 12:27:22'),
(1436,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-09 13:47:28'),
(1437,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 13:51:34'),
(1438,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 13:51:41'),
(1439,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 13:51:49'),
(1440,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 13:52:24'),
(1441,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 14:06:01'),
(1442,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-09 17:01:19'),
(1443,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','127.0.0.1','2015-07-09 18:43:30'),
(1444,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-10 10:32:51'),
(1445,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:09:33'),
(1446,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:09:33'),
(1447,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:09:33'),
(1448,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:09:33'),
(1449,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:20:37'),
(1450,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:20:37'),
(1451,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:20:38'),
(1452,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:20:38'),
(1453,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:29:09'),
(1454,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:31:48'),
(1455,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:31:48'),
(1456,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:31:48'),
(1457,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:31:48'),
(1458,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1459,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1460,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1461,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1462,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1463,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:19'),
(1464,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:28'),
(1465,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:33:28'),
(1466,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:33'),
(1467,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:33'),
(1468,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:33'),
(1469,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:33'),
(1470,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:33'),
(1471,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:45'),
(1472,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:45'),
(1473,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:45'),
(1474,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:45'),
(1475,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:45'),
(1476,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:34:46'),
(1477,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:44'),
(1478,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:44'),
(1479,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:44'),
(1480,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:44'),
(1481,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:45'),
(1482,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:45'),
(1483,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 12:36:45'),
(1484,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1485,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1486,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1487,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1488,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1489,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1490,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1491,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1492,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:13:09'),
(1493,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1494,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1495,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1496,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1497,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1498,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1499,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1500,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1501,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1502,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 13:53:52'),
(1503,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 15:29:49'),
(1504,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 15:47:19'),
(1505,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 15:48:37'),
(1506,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 16:02:34'),
(1507,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 16:18:20'),
(1508,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 16:29:50'),
(1509,1,'headphones','site.soundcarrier.fixationdelete','Deleted Sound Carrier Fixation Sound carrier 1 successfully.','127.0.0.1','2015-07-10 16:33:28'),
(1510,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-10 16:55:46'),
(1511,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 18:28:28'),
(1512,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 18:28:28'),
(1513,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 18:28:28'),
(1514,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:16'),
(1515,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:16'),
(1516,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:16'),
(1517,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:16'),
(1518,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:39'),
(1519,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:39'),
(1520,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:39:39'),
(1521,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:41:26'),
(1522,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:41:27'),
(1523,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:41:27'),
(1524,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:41:39'),
(1525,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:42:07'),
(1526,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:42:07'),
(1527,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:42:32'),
(1528,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:42:32'),
(1529,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:42:32'),
(1530,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:44:21'),
(1531,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:44:30'),
(1532,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:17'),
(1533,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:28'),
(1534,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:28'),
(1535,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:40'),
(1536,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:55'),
(1537,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:55'),
(1538,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:46:55'),
(1539,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:47:40'),
(1540,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:47:46'),
(1541,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-10 19:47:46'),
(1542,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-10 19:52:15'),
(1543,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-10 19:59:11'),
(1544,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 15:59:16'),
(1545,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:08:00'),
(1546,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:08:00'),
(1547,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:08:00'),
(1548,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:08:00'),
(1549,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:08:00'),
(1550,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:33:43'),
(1551,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:33:43'),
(1552,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:33:43'),
(1553,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:33:43'),
(1554,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:33:43'),
(1555,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:04'),
(1556,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:04'),
(1557,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:04'),
(1558,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:04'),
(1559,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:04'),
(1560,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1561,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1562,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1563,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1564,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1565,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:05'),
(1566,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1567,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1568,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1569,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1570,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1571,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:14'),
(1572,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:15'),
(1573,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:15'),
(1574,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:15'),
(1575,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:15'),
(1576,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:15'),
(1577,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:24'),
(1578,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:24'),
(1579,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:24'),
(1580,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:24'),
(1581,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:24'),
(1582,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1583,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1584,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1585,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1586,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1587,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1588,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:25'),
(1589,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:37'),
(1590,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:37'),
(1591,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:37'),
(1592,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:36:37'),
(1593,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:16'),
(1594,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:16'),
(1595,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:16'),
(1596,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:29'),
(1597,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:29'),
(1598,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:29'),
(1599,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:41'),
(1600,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:41'),
(1601,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:41'),
(1602,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:41'),
(1603,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:58'),
(1604,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:58'),
(1605,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:58'),
(1606,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:48:58'),
(1607,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:49:15'),
(1608,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:49:15'),
(1609,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:49:15'),
(1610,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:49:15'),
(1611,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:54:37'),
(1612,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:54:37'),
(1613,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:56:47'),
(1614,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:56:48'),
(1615,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:57:22'),
(1616,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:57:23'),
(1617,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:57:23'),
(1618,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:59:51'),
(1619,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 16:59:51'),
(1620,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:00:24'),
(1621,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:00:24'),
(1622,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:02:25'),
(1623,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:02:25'),
(1624,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:02:25'),
(1625,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:03:56'),
(1626,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:03:57'),
(1627,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:04:04'),
(1628,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:04:04'),
(1629,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:04:12'),
(1630,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:04:12'),
(1631,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:07:18'),
(1632,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:07:18'),
(1633,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:07:18'),
(1634,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:08:54'),
(1635,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:08:54'),
(1636,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:08:54'),
(1637,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:02'),
(1638,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:02'),
(1639,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:02'),
(1640,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:15'),
(1641,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:16'),
(1642,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:09:16'),
(1643,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:14:21'),
(1644,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:14:21'),
(1645,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:14:21'),
(1646,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:14:22'),
(1647,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:15:44'),
(1648,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:15:44'),
(1649,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:15:44'),
(1650,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:15:44'),
(1651,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:16:36'),
(1652,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:16:36'),
(1653,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:16:36'),
(1654,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:17:20'),
(1655,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:17:20'),
(1656,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:17:20'),
(1657,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:17:20'),
(1658,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:18:31'),
(1659,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:18:31'),
(1660,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:18:31'),
(1661,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:18:32'),
(1662,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:18:32'),
(1663,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:31:15'),
(1664,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:31:15'),
(1665,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:31:15'),
(1666,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:31:15'),
(1667,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 17:31:15'),
(1668,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 18:02:05'),
(1669,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 18:02:05'),
(1670,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 18:02:05'),
(1671,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 18:02:05'),
(1672,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-13 18:02:05'),
(1673,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 09:45:39'),
(1674,1,'at','site.mastertyperights.update','Updated Type of Right Other Musicians and Perfomers successfully.','127.0.0.1','2015-07-14 09:50:14'),
(1675,1,'at','site.mastertyperights.update','Updated Type of Right Guest Singers, Musicians or Supporting Actor successfully.','127.0.0.1','2015-07-14 09:50:21'),
(1676,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:33:18'),
(1677,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:33:18'),
(1678,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:33:18'),
(1679,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:33:33'),
(1680,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:33:33'),
(1681,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:49:56'),
(1682,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:49:56'),
(1683,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-14 10:49:56'),
(1684,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-14 11:07:55'),
(1685,1,'headphones','site.soundcarrier.delete','Deleted SoundCarrier successfully.','127.0.0.1','2015-07-14 11:09:08'),
(1686,1,'headphones','site.soundcarrier.create','Created SoundCarrier successfully.','127.0.0.1','2015-07-14 11:09:23'),
(1687,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-14 11:09:35'),
(1688,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-14 11:13:42'),
(1689,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-14 11:14:12'),
(1690,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 5 successfully.','127.0.0.1','2015-07-14 11:14:27'),
(1691,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-14 11:14:38'),
(1692,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-14 11:15:55'),
(1693,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 11:44:00'),
(1694,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 12:03:36'),
(1695,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 12:03:44'),
(1696,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 12:43:28'),
(1697,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 12:43:35'),
(1698,1,'headphones','site.soundcarrier.publicationdelete','Deleted Sound Carrier Publication Sound carrier 1 successfully.','127.0.0.1','2015-07-14 13:29:06'),
(1699,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Publication successfully.','127.0.0.1','2015-07-14 13:54:39'),
(1700,1,'headphones','site.soundcarrier.publicationdelete','Deleted Sound Carrier Publication Sound carrier 1 successfully.','127.0.0.1','2015-07-14 15:31:42'),
(1701,1,'user','site.internalcodegenerate.create','Created InternalcodeGenerate successfully.','127.0.0.1','2015-07-14 17:34:15'),
(1702,1,'user','site.masterdestination.create','Created MasterDestination successfully.','127.0.0.1','2015-07-14 17:57:10'),
(1703,1,'user','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-07-14 17:57:42'),
(1704,1,'headphones','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-14 18:07:24'),
(1705,1,'headphones','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-14 18:09:43'),
(1706,1,'headphones','site.recordingsession.subtitledelete','Deleted Sound Carrier subtitle Tets2 successfully.','127.0.0.1','2015-07-14 18:11:36'),
(1707,1,'headphones','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-14 18:11:41'),
(1708,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-14 18:25:49'),
(1709,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-14 18:39:03'),
(1710,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-14 18:39:31'),
(1711,1,'file-audio-o','site.recordingsession.biofiledelete','Deleted a Biography file from Recording Session 1 successfully.','127.0.0.1','2015-07-14 18:55:25'),
(1712,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-14 18:58:40'),
(1713,1,'file-audio-o','site.recordingsession.biofiledelete','Deleted a Biography file from Recording Session 1 successfully.','127.0.0.1','2015-07-14 18:58:47'),
(1714,1,'user','site.masterdestination.update','Updated MasterDestination successfully.','127.0.0.1','2015-07-15 10:22:52'),
(1715,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-15 10:35:50'),
(1716,1,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-07-15 11:14:40'),
(1717,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-07-15 11:14:44'),
(1718,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work28 successfully.','127.0.0.1','2015-07-15 11:15:15'),
(1719,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work28 successfully.','127.0.0.1','2015-07-15 11:15:15'),
(1720,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work28 successfully.','127.0.0.1','2015-07-15 11:16:10'),
(1721,1,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work28 successfully.','127.0.0.1','2015-07-15 11:16:10'),
(1722,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-15 16:51:46'),
(1723,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-15 16:52:04'),
(1724,1,'headphones','site.soundcarrier.update','Updated SoundCarrier Documentation successfully.','127.0.0.1','2015-07-15 16:52:17'),
(1725,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-15 17:26:14'),
(1726,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-15 17:26:14'),
(1727,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:22:29'),
(1728,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:23:44'),
(1729,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:23:53'),
(1730,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:24:05'),
(1731,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:24:15'),
(1732,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:24:24'),
(1733,1,'file-audio-o','site.recordingsession.foliodelete','Deleted a Folio from Recording Session 1 successfully.','127.0.0.1','2015-07-15 18:34:09'),
(1734,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:35:34'),
(1735,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-15 18:35:52'),
(1736,1,'user','site.recordingsession.delete','Deleted RecordingSession successfully.','127.0.0.1','2015-07-15 18:38:09'),
(1737,1,'user','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-07-15 18:41:03'),
(1738,1,'user','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-07-15 18:42:07'),
(1739,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-15 18:42:16'),
(1740,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-15 18:42:54'),
(1741,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-15 18:42:54'),
(1742,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-15 18:42:54'),
(1743,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-15 18:42:54'),
(1744,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-15 18:43:03'),
(1745,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-15 18:43:10'),
(1746,1,'file-audio-o','site.recordingsession.subtitledelete','Deleted Recording Session subtitle Tets successfully.','127.0.0.1','2015-07-15 18:43:16'),
(1747,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-15 18:43:23'),
(1748,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-15 18:43:35'),
(1749,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-15 18:43:48'),
(1750,1,'file-audio-o','site.recordingsession.biofiledelete','Deleted a Biography file from Recording Session 2 successfully.','127.0.0.1','2015-07-15 18:43:55'),
(1751,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:44:19'),
(1752,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:44:26'),
(1753,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:48:35'),
(1754,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:48:55'),
(1755,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-15 18:50:19'),
(1756,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-15 18:57:10'),
(1757,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Biography successfully.','127.0.0.1','2015-07-15 18:59:29'),
(1758,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-15 19:26:38'),
(1759,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-16 11:56:16'),
(1760,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-16 11:56:16'),
(1761,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-16 11:56:16'),
(1762,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-16 11:56:16'),
(1763,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 2 successfully.','127.0.0.1','2015-07-16 11:56:16'),
(1764,1,'user','site.mastermanufacturer.update','Updated MasterManufacturer successfully.','127.0.0.1','2015-07-17 13:51:49'),
(1765,1,'user','site.mastermanufacturer.update','Updated MasterManufacturer successfully.','127.0.0.1','2015-07-17 13:52:06'),
(1766,1,'user','site.mastermanufacturer.update','Updated MasterManufacturer successfully.','127.0.0.1','2015-07-17 14:10:11'),
(1767,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 12:29:33'),
(1768,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 12:29:33'),
(1769,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 12:29:33'),
(1770,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 12:40:20'),
(1771,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 12:40:20'),
(1772,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-18 13:19:41'),
(1773,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-18 13:19:41'),
(1774,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-18 13:19:41'),
(1775,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-18 13:19:41'),
(1776,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 16:38:43'),
(1777,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 16:38:43'),
(1778,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-18 16:38:43'),
(1779,1,'globe','site.mastercountry.update','Updated Country AUSTRALIA successfully.','127.0.0.1','2015-07-20 11:15:54'),
(1780,1,'globe','site.mastercountry.update','Updated Country NEPALL successfully.','127.0.0.1','2015-07-20 11:43:31'),
(1781,1,'globe','site.mastercountry.update','Updated Country NEPAL successfully.','127.0.0.1','2015-07-20 11:43:52'),
(1782,1,'globe','site.mastercountry.update','Updated Country NEPAL successfully.','127.0.0.1','2015-07-20 12:04:53'),
(1783,1,'group','site.masterinternalposition.update','Updated MasterInternalPosition Provisional Member successfully.','127.0.0.1','2015-07-20 12:11:18'),
(1784,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-07-20 12:19:52'),
(1785,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-07-20 12:19:57'),
(1786,1,'language','site.masterlanguage.update','Updated Master Language English successfully.','127.0.0.1','2015-07-20 12:30:48'),
(1787,1,'language','site.masterlanguage.update','Updated Master Language Nepalese successfully.','127.0.0.1','2015-07-20 12:31:06'),
(1788,1,'language','site.masterlanguage.update','Updated Master Language French successfully.','127.0.0.1','2015-07-20 12:33:31'),
(1789,1,'copyright','site.mastermanagedrights.update','Updated Master Manage Rights Neighboring Rights successfully.','127.0.0.1','2015-07-20 12:37:57'),
(1790,1,'female','site.mastermaritalstatus.update','Updated Master Marital Status WIDOWED successfully.','127.0.0.1','2015-07-20 12:49:40'),
(1791,1,'flag-o','site.masternationality.update','Updated Nation WORLD successfully.','127.0.0.1','2015-07-20 12:53:32'),
(1792,1,'tty','site.masterpseudonymtypes.update','Updated Pseudonym ST successfully.','127.0.0.1','2015-07-20 13:10:19'),
(1793,1,'male','site.masterprofession.update','Updated Profession Guitarist successfully.','127.0.0.1','2015-07-20 13:16:51'),
(1794,1,'building-o','site.masterregion.update','Updated Region KARONGA successfully.','127.0.0.1','2015-07-20 13:18:59'),
(1795,1,'list','site.mastertype.update','Updated Master Type Serious successfully.','127.0.0.1','2015-07-20 13:25:03'),
(1796,1,'at','site.mastertyperights.update','Updated Type of Right Adapter / Translator successfully.','127.0.0.1','2015-07-20 13:31:59'),
(1797,1,'user','site.masterstudio.update','Updated MasterStudio successfully.','127.0.0.1','2015-07-20 13:38:09'),
(1798,1,'institution','site.masterterritories.update','Updated Territory ANDORRA                                                                          successfully.','127.0.0.1','2015-07-20 13:39:58'),
(1799,1,'institution','site.masterterritories.update','Updated Territory AFRICA                                                                           successfully.','127.0.0.1','2015-07-20 13:43:32'),
(1800,1,'globe','site.mastercurrency.update','Created Currency Dollar successfully.','127.0.0.1','2015-07-20 13:54:10'),
(1801,1,'globe','site.mastercurrency.update','Created Currency Rupee successfully.','127.0.0.1','2015-07-20 13:54:16'),
(1802,1,'globe','site.mastercountry.update','Updated Country ALGERIA successfully.','127.0.0.1','2015-07-20 13:54:39'),
(1803,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 15:29:51'),
(1804,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 16:17:39'),
(1805,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 16:19:11'),
(1806,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 16:19:54'),
(1807,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 16:22:08'),
(1808,1,'users','site.group.create','Created a Groupperformer successfully.','127.0.0.1','2015-07-20 16:50:36'),
(1809,1,'users','site.group.create','Created a Perf Group successfully.','127.0.0.1','2015-07-20 16:52:13'),
(1810,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 17:26:33'),
(1811,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:17:34'),
(1812,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:17:49'),
(1813,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:37:33'),
(1814,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:37:47'),
(1815,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:38:40'),
(1816,1,'user','site.internalcodegenerate.update','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-20 18:38:48'),
(1817,1,'globe','site.mastercountry.update','Updated Country ANGOLA successfully.','127.0.0.1','2015-07-20 19:38:19'),
(1818,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:03:48'),
(1819,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:03:57'),
(1820,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:08:30'),
(1821,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:08:55'),
(1822,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:10:34'),
(1823,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:12:31'),
(1824,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:14:11'),
(1825,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:14:19'),
(1826,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:15:36'),
(1827,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:17:20'),
(1828,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:18:03'),
(1829,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 13:19:04'),
(1830,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-07-21 15:15:29'),
(1831,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','127.0.0.1','2015-07-21 17:08:08'),
(1832,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for Music Recording 1 successfully.','127.0.0.1','2015-07-21 17:08:08'),
(1833,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:26:50'),
(1834,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:26:50'),
(1835,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:26:50'),
(1836,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:26:50'),
(1837,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1838,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1839,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1840,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1841,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1842,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:34:21'),
(1843,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:00'),
(1844,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1845,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1846,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1847,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1848,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1849,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:47:01'),
(1850,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:08'),
(1851,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:08'),
(1852,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:08'),
(1853,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:08'),
(1854,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:09'),
(1855,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:09'),
(1856,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:09'),
(1857,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:09'),
(1858,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-21 17:58:09'),
(1859,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:12:49'),
(1860,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:12:49'),
(1861,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:12:49'),
(1862,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:12:49'),
(1863,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:12:49'),
(1864,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:05'),
(1865,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:06'),
(1866,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:06'),
(1867,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:06'),
(1868,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:06'),
(1869,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1870,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1871,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1872,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1873,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1874,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:37'),
(1875,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-21 18:13:38'),
(1876,1,'user','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-07-21 18:33:51'),
(1877,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-21 18:33:58'),
(1878,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-21 18:34:31'),
(1879,1,'user','site.recordingsession.delete','Deleted RecordingSession successfully.','127.0.0.1','2015-07-21 18:35:20'),
(1880,1,'user','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-07-21 18:35:39'),
(1881,1,'file-audio-o','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-07-21 18:38:01'),
(1882,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 3 successfully.','127.0.0.1','2015-07-21 18:42:51'),
(1883,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 3 successfully.','127.0.0.1','2015-07-21 18:42:52'),
(1884,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-21 18:47:58'),
(1885,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Subtitle successfully.','127.0.0.1','2015-07-21 19:02:11'),
(1886,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-21 19:18:29'),
(1887,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-21 19:18:34'),
(1888,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Subtitle successfully.','127.0.0.1','2015-07-21 19:18:40'),
(1889,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-21 19:23:41'),
(1890,1,'user','site.masterplace.create','Created MasterPlace successfully.','127.0.0.1','2015-07-22 12:07:57'),
(1891,1,'user','site.masterplace.create','Created MasterPlace successfully.','127.0.0.1','2015-07-22 12:08:09'),
(1892,1,'user','site.masterplace.create','Created MasterPlace successfully.','127.0.0.1','2015-07-22 12:08:18'),
(1893,1,'user','site.masterplace.update','Updated MasterPlace successfully.','127.0.0.1','2015-07-22 12:08:23'),
(1894,1,'user','site.masterplace.update','Updated MasterPlace successfully.','127.0.0.1','2015-07-22 12:10:04'),
(1895,1,'user','site.masterplace.update','Updated MasterPlace successfully.','127.0.0.1','2015-07-22 12:10:11'),
(1896,1,'user','site.masterplace.delete','Deleted MasterPlace successfully.','127.0.0.1','2015-07-22 12:10:14'),
(1897,1,'user','site.masterplace.create','Created MasterPlace successfully.','127.0.0.1','2015-07-22 12:10:27'),
(1898,1,'user','site.mastertariff.create','Created MasterTariff successfully.','127.0.0.1','2015-07-22 18:19:58'),
(1899,1,'user','site.mastertariff.update','Updated MasterTariff successfully.','127.0.0.1','2015-07-22 18:24:27'),
(1900,1,'user','site.customeruser.create','Created CustomerUser successfully.','127.0.0.1','2015-07-22 19:14:05'),
(1901,1,'user','site.customeruser.create','Created CustomerUser successfully.','127.0.0.1','2015-07-22 19:25:22'),
(1902,1,'user','site.customeruser.update','Updated CustomerUser successfully.','127.0.0.1','2015-07-22 19:30:20'),
(1903,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 16:19:13'),
(1904,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:13:48'),
(1905,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:16:10'),
(1906,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:19:05'),
(1907,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:19:05'),
(1908,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:19:06'),
(1909,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 18:19:06'),
(1910,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:36:27'),
(1911,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:36:27'),
(1912,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:36:28'),
(1913,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:50:59'),
(1914,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:50:59'),
(1915,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 19:50:59'),
(1916,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:03:39'),
(1917,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:03:39'),
(1918,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:03:39'),
(1919,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:03:39'),
(1920,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:06:25'),
(1921,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:06:25'),
(1922,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:06:25'),
(1923,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:06:25'),
(1924,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:10:01'),
(1925,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:10:01'),
(1926,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:10:01'),
(1927,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:10:01'),
(1928,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:11:00'),
(1929,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:11:00'),
(1930,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:11:00'),
(1931,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:11:00'),
(1932,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:10'),
(1933,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:10'),
(1934,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:10'),
(1935,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:10'),
(1936,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:28'),
(1937,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:28'),
(1938,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:28'),
(1939,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-23 20:12:28'),
(1940,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:09:29'),
(1941,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:09:29'),
(1942,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:09:29'),
(1943,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:14:18'),
(1944,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:14:18'),
(1945,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:14:18'),
(1946,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:14:18'),
(1947,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1948,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1949,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1950,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1951,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1952,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 12:25:22'),
(1953,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:44'),
(1954,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1955,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1956,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1957,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1958,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1959,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1960,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1961,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 12:44:45'),
(1962,1,'file-audio-o','site.recordingsession.update','Saved Recording Session Sheet Biography successfully.','127.0.0.1','2015-07-24 12:46:40'),
(1963,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:04:44'),
(1964,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:04:44'),
(1965,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:04:45'),
(1966,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:06:46'),
(1967,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:06:46'),
(1968,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:06:46'),
(1969,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:06:46'),
(1970,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1971,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1972,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1973,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1974,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1975,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1976,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1977,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1978,1,'fa file-audio-o','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-07-24 13:18:56'),
(1979,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:53:51'),
(1980,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:53:51'),
(1981,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:53:51'),
(1982,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 13:53:52'),
(1983,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:01:59'),
(1984,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:01:59'),
(1985,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:01:59'),
(1986,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:01:59'),
(1987,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:36'),
(1988,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:36'),
(1989,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:36'),
(1990,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:36'),
(1991,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:46'),
(1992,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:46'),
(1993,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:46'),
(1994,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-24 14:03:46'),
(1995,1,'user','site.inspector.create','Created Inspector successfully.','127.0.0.1','2015-07-24 18:37:04'),
(1996,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-07-25 12:00:03'),
(1997,1,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-07-25 12:00:07'),
(1998,1,'newspaper-o','site.mastereventtype.update','Updated MasterEventType Close successfully.','127.0.0.1','2015-07-25 12:30:38'),
(1999,1,'user','site.inspector.create','Created Inspector successfully.','127.0.0.1','2015-07-25 13:03:16'),
(2000,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-07-25 13:08:41'),
(2001,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-25 13:31:08'),
(2002,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-25 15:44:00'),
(2003,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-25 15:44:53'),
(2004,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:07'),
(2005,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:07'),
(2006,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2007,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2008,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2009,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2010,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2011,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:08'),
(2012,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2013,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2014,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2015,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2016,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2017,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2018,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2019,1,'fa fa-at','site.soundcarrier.insertright','Created Right Holder saved for Sound carrier 1 successfully.','127.0.0.1','2015-07-25 17:21:26'),
(2020,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-27 12:52:27'),
(2021,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-27 13:49:55'),
(2022,1,'headphones','site.soundcarrier.fixationdelete','Deleted Sound Carrier Fixation Sound carrier 1 successfully.','127.0.0.1','2015-07-27 13:53:42'),
(2023,1,'headphones','site.soundcarrier.update','Saved SoundCarrier Fixations successfully.','127.0.0.1','2015-07-27 13:53:50'),
(2024,1,'music','site.soundcarrier.newperformer','Created Performer test ry successfully.','127.0.0.1','2015-07-27 17:26:46'),
(2025,1,'music','site.soundcarrier.newperformer','Created Performer test sdssd successfully.','127.0.0.1','2015-07-27 17:59:37'),
(2026,1,'music','site.soundcarrier.newperformer','Created Performer tests sdssd successfully.','127.0.0.1','2015-07-27 18:03:32'),
(2027,1,'music','site.soundcarrier.newperformer','Created Performer test aaa successfully.','127.0.0.1','2015-07-27 18:05:31'),
(2028,1,'music','site.soundcarrier.newperformer','Created Performer test tt successfully.','127.0.0.1','2015-07-27 18:21:20'),
(2029,1,'music','site.soundcarrier.newperformer','Created Performer Test prakash test successfully.','127.0.0.1','2015-07-27 18:21:52'),
(2030,1,'music','site.soundcarrier.newperformer','Created Performer test sad successfully.','127.0.0.1','2015-07-27 18:27:00'),
(2031,1,'music','site.soundcarrier.newperformer','Created Performer Test prakash prakash successfully.','127.0.0.1','2015-07-27 18:32:29'),
(2032,1,'music','site.soundcarrier.newperformer','Created Performer Test prakashte test successfully.','127.0.0.1','2015-07-27 18:33:20'),
(2033,1,'music','site.soundcarrier.newperformer','Created Performer aaaa aaaaa successfully.','127.0.0.1','2015-07-27 18:37:56'),
(2034,1,'music','site.soundcarrier.newperformer','Created Performer bbbbb bb successfully.','127.0.0.1','2015-07-27 18:39:49'),
(2035,1,'money','site.soundcarrier.newproducer','Created Performer test successfully.','127.0.0.1','2015-07-27 19:04:09'),
(2036,1,'music','site.soundcarrier.newperformer','Created Performer raju raj successfully.','127.0.0.1','2015-07-27 19:17:44'),
(2037,1,'money','site.soundcarrier.newproducer','Created Performer new prod successfully.','127.0.0.1','2015-07-27 19:17:59'),
(2038,1,'headphones','site.soundcarrier.update','Updated SoundCarrier successfully.','127.0.0.1','2015-07-27 19:18:02'),
(2039,1,'money','site.soundcarrier.newproducer','Created Performer adad successfully.','127.0.0.1','2015-07-27 20:20:17'),
(2040,1,'money','site.soundcarrier.newproducer','Created Performer asdasdsad successfully.','127.0.0.1','2015-07-27 20:20:36'),
(2041,1,'money','site.soundcarrier.newproducer','Created Performer asdsda successfully.','127.0.0.1','2015-07-27 20:21:43'),
(2042,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-07-28 10:28:25'),
(2043,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 12:13:07'),
(2044,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 12:22:17'),
(2045,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 12:22:33'),
(2046,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 12:23:32'),
(2047,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 12:26:31'),
(2048,1,'user','site.inspector.update','Updated Inspector successfully.','127.0.0.1','2015-07-28 12:29:05'),
(2049,1,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-07-28 12:56:40'),
(2050,1,'user','site.authoraccount.update','Updated Robert  Van Document saved successfully.','127.0.0.1','2015-07-28 12:57:58'),
(2051,1,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-07-28 13:01:14'),
(2052,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','127.0.0.1','2015-07-28 13:02:37'),
(2053,1,'music','site.performeraccount.update','Updated Performer Document Rajeshn Raj successfully.','127.0.0.1','2015-07-28 13:13:53'),
(2054,1,'music','site.performeraccount.update','Updated Performer Biography Rajeshn Raj successfully.','127.0.0.1','2015-07-28 13:14:22'),
(2055,1,'microphone','site.publisheraccount.update','Updated Publisher ABM Limited successfully.','127.0.0.1','2015-07-28 13:19:37'),
(2056,1,'money','site.produceraccount.update','Updated Producer ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:28'),
(2057,1,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:35'),
(2058,1,'money','site.produceraccount.update','Updated Producer Payment Method ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:39'),
(2059,1,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:46'),
(2060,1,'money','site.produceraccount.update','Updated Producer Pseudonym ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:51'),
(2061,1,'microphone','site.produceraccount.update','Updated Publisher Managed Rights ABM Limited successfully.','127.0.0.1','2015-07-28 13:22:56'),
(2062,1,'money','site.produceraccount.update','Updated Producer Managed Rights ABM Limited successfully.','127.0.0.1','2015-07-28 13:23:00'),
(2063,1,'money','site.produceraccount.update','Updated Producer Succession ABM Limited successfully.','127.0.0.1','2015-07-28 13:23:05'),
(2064,1,'user','site.mastercity.create','Created MasterCity successfully.','127.0.0.1','2015-07-28 13:39:04'),
(2065,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 13:44:57'),
(2066,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 13:46:50'),
(2067,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 13:47:51'),
(2068,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-28 13:47:58'),
(2069,1,'group','site.publishergroup.update','Updated Publisher Group Payment Method SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:28'),
(2070,1,'group','site.publishergroup.update','Updated Publisher Group SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:38'),
(2071,1,'group','site.publishergroup.update','Updated Publisher Group Payment Method SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:45'),
(2072,1,'group','site.publishergroup.update','Updated Publisher Group Biography SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:49'),
(2073,1,'group','site.publishergroup.update','Updated Publisher Group Pseudonym SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:54'),
(2074,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:23:59'),
(2075,1,'group','site.publishergroup.update','Updated Publisher Group Address SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:24:04'),
(2076,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:26:17'),
(2077,1,'group','site.publishergroup.update','Updated Publisher Group Managed Rights SOC-GE-0000100 successfully.','127.0.0.1','2015-07-28 15:26:41'),
(2078,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-07-28 15:29:58'),
(2079,1,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-07-28 15:30:11'),
(2080,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-28 15:30:23'),
(2081,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-28 15:30:23'),
(2082,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-28 15:30:24'),
(2083,1,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-07-28 15:30:24'),
(2084,1,'sliders','site.work.update','Saved Work Publishing successfully.','127.0.0.1','2015-07-28 15:30:29'),
(2085,1,'sliders','site.work.update','Enter Sandman  Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-28 15:30:37'),
(2086,1,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-07-28 15:30:42'),
(2087,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-28 15:30:52'),
(2088,1,'sliders','site.work.update','Saved Work Subtitle successfully.','127.0.0.1','2015-07-28 15:31:00'),
(2089,1,'sliders','site.work.update','Saved Work Biography successfully.','127.0.0.1','2015-07-28 15:31:04'),
(2090,1,'sliders','site.work.update','Enter Sandman  Sub Publishing Contract Uploaded successfully.','127.0.0.1','2015-07-28 15:42:07'),
(2091,1,'sliders','site.work.update','Updated Work successfully.','127.0.0.1','2015-07-28 15:46:32'),
(2092,1,'volume-up','site.recording.update','Updated Recording successfully.','127.0.0.1','2015-07-28 15:52:52'),
(2093,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-28 15:53:02'),
(2094,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-28 15:53:02'),
(2095,1,'fa fa-at','site.recording.insertright','Created Right Holder saved for As long as  successfully.','127.0.0.1','2015-07-28 15:53:02'),
(2096,1,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-07-28 15:53:09'),
(2097,1,'volume-up','site.recording.update','Saved Recording Publication successfully.','127.0.0.1','2015-07-28 15:53:16'),
(2098,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-07-29 19:55:20'),
(2099,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 12:43:39'),
(2100,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 12:47:43'),
(2101,1,'file-audio-o','site.recordingsession.foliodelete','Deleted a Folio from Recording Session 1 successfully.','127.0.0.1','2015-07-31 15:29:18'),
(2102,1,'file-audio-o','site.recordingsession.foliodelete','Deleted a Folio from Recording Session 1 successfully.','127.0.0.1','2015-07-31 15:29:26'),
(2103,1,'file-audio-o','site.recordingsession.foliodelete','Deleted a Folio from Recording Session 1 successfully.','127.0.0.1','2015-07-31 15:29:31'),
(2104,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 15:29:46'),
(2105,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 15:38:15'),
(2106,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 15:38:28'),
(2107,1,'file-audio-o','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-07-31 15:38:40'),
(2108,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-07-31 18:25:56'),
(2109,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:45:37'),
(2110,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:50:12'),
(2111,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:51:33'),
(2112,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:53:48'),
(2113,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:55:28'),
(2114,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 18:58:37'),
(2115,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:01:42'),
(2116,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:05:23'),
(2117,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:09:25'),
(2118,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:14:34'),
(2119,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:15:52'),
(2120,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-07-31 19:17:42'),
(2121,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-01 10:31:00'),
(2122,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-01 10:32:27'),
(2123,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-01 10:36:22'),
(2124,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-01 10:37:13'),
(2125,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-01 10:43:20'),
(2126,1,'user','site.customeruser.update','Updated CustomerUser successfully.','127.0.0.1','2015-08-01 10:54:45'),
(2127,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-01 10:55:30'),
(2128,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-01 10:57:32'),
(2129,1,'money','site.soundcarrier.newproducer','Created Performer New prod corp successfully.','127.0.0.1','2015-08-01 11:17:44'),
(2130,1,'money','site.soundcarrier.newproducer','Created Performer New corp successfully.','127.0.0.1','2015-08-01 11:21:22'),
(2131,1,'music','site.soundcarrier.newperformer','Created Performer Arti aaaaa successfully.','127.0.0.1','2015-08-01 11:21:33'),
(2132,1,'music','site.soundcarrier.newperformer','Created Performer Artist B successfully.','127.0.0.1','2015-08-01 11:21:50'),
(2133,1,'user','site.recordingsession.update','Updated RecordingSession successfully.','127.0.0.1','2015-08-01 11:21:55'),
(2134,1,'user','site.recordingsession.update','Updated RecordingSession successfully.','127.0.0.1','2015-08-01 11:22:34'),
(2135,1,'user','site.recordingsession.update','Updated RecordingSession successfully.','127.0.0.1','2015-08-01 11:31:24'),
(2136,1,'cny','site.recordingsession.update','Updated RecordingSession successfully.','127.0.0.1','2015-08-01 11:32:01'),
(2137,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-01 12:19:12'),
(2138,1,'music','site.soundcarrier.newperformer','Created Performer tesert ry successfully.','127.0.0.1','2015-08-03 10:32:06'),
(2139,1,'money','site.soundcarrier.newproducer','Created Performer test11 successfully.','127.0.0.1','2015-08-03 10:52:46'),
(2140,1,'cny','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-08-03 10:53:24'),
(2141,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-03 11:15:33'),
(2142,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording successfully.','127.0.0.1','2015-08-03 16:32:40'),
(2143,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording 2 successfully.','127.0.0.1','2015-08-03 16:35:22'),
(2144,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-08-03 16:35:48'),
(2145,1,'volume-up','site.recording.delete','Deleted Recording successfully.','127.0.0.1','2015-08-03 16:36:03'),
(2146,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording successfully.','127.0.0.1','2015-08-03 16:36:18'),
(2147,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording 2 successfully.','127.0.0.1','2015-08-03 16:41:23'),
(2148,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recordingq successfully.','127.0.0.1','2015-08-03 17:01:03'),
(2149,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording successfully.','127.0.0.1','2015-08-03 17:42:45'),
(2150,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording33 successfully.','127.0.0.1','2015-08-03 18:05:42'),
(2151,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording 5 successfully.','127.0.0.1','2015-08-03 18:10:57'),
(2152,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2153,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2154,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2155,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2156,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2157,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2158,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2159,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2160,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2161,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Recording Session 1 successfully.','127.0.0.1','2015-08-03 18:12:36'),
(2162,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording 59 successfully.','127.0.0.1','2015-08-03 18:32:12'),
(2163,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recordingqs successfully.','127.0.0.1','2015-08-03 19:25:00'),
(2164,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording133 successfully.','127.0.0.1','2015-08-03 19:28:55'),
(2165,1,'volume-up','site.recordingsession.newrecording','Created Recording Test recording 5996 successfully.','127.0.0.1','2015-08-03 19:33:50'),
(2166,1,'user','site.mastertariff.create','Created MasterTariff successfully.','127.0.0.1','2015-08-05 11:59:19'),
(2167,1,'user','site.mastertariff.delete','Deleted MasterTariff successfully.','127.0.0.1','2015-08-05 11:59:39'),
(2168,1,'user','site.mastertariff.create','Created MasterTariff successfully.','127.0.0.1','2015-08-05 12:01:35'),
(2169,1,'user','site.customeruser.create','Created CustomerUser successfully.','127.0.0.1','2015-08-05 12:12:14'),
(2170,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-05 12:12:49'),
(2171,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-05 12:25:39'),
(2172,1,'user','site.customeruser.update','Updated CustomerUser successfully.','127.0.0.1','2015-08-05 12:25:56'),
(2173,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-05 12:26:18'),
(2174,1,'music','site.soundcarrier.newperformer','Created Performer Testtest ry successfully.','127.0.0.1','2015-08-05 15:37:45'),
(2175,1,'music','site.soundcarrier.newperformer','Created Performer aaaaaaaa adad successfully.','127.0.0.1','2015-08-05 15:39:38'),
(2176,1,'music','site.soundcarrier.newperformer','Created Performer aadsadsadasd aa successfully.','127.0.0.1','2015-08-05 15:42:11'),
(2177,1,'music','site.soundcarrier.newperformer','Created Performer robin anderson successfully.','127.0.0.1','2015-08-05 15:43:06'),
(2178,1,'music','site.soundcarrier.newperformer','Created Performer ccccc cc successfully.','127.0.0.1','2015-08-05 15:47:26'),
(2179,1,'music','site.soundcarrier.newperformer','Created Performer dddddd dd successfully.','127.0.0.1','2015-08-05 15:53:36'),
(2180,1,'money','site.soundcarrier.newproducer','Created Performer adadaaa successfully.','127.0.0.1','2015-08-05 18:10:58'),
(2181,1,'music','site.soundcarrier.newperformer','Created Performer ddaadd aa successfully.','127.0.0.1','2015-08-05 18:11:07'),
(2182,1,'cny','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-08-05 18:11:10'),
(2183,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-05 18:11:17'),
(2184,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:12:32'),
(2185,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:12:32'),
(2186,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:12:32'),
(2187,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:12:33'),
(2188,1,'music','site.soundcarrier.newperformer','Created Performer ss sss successfully.','127.0.0.1','2015-08-05 18:12:54'),
(2189,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:13:03'),
(2190,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:13:03'),
(2191,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:13:03'),
(2192,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:13:03'),
(2193,1,'fa file-cny','site.recordingsession.insertright','Created Right Holder saved for Test successfully.','127.0.0.1','2015-08-05 18:13:04'),
(2194,1,'file-cny','site.recordingsession.update','Saved RecordingSession Folio successfully.','127.0.0.1','2015-08-05 18:13:14'),
(2195,1,'user','site.inspector.create','Created Inspector successfully.','127.0.0.1','2015-08-06 13:27:20'),
(2196,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-06 13:27:32'),
(2197,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-06 15:26:29'),
(2198,1,'user','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-06 15:57:37'),
(2199,1,'user','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-06 16:01:47'),
(2200,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 13:16:38'),
(2201,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 13:26:20'),
(2202,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 13:29:52'),
(2203,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 15:34:05'),
(2204,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 15:35:54'),
(2205,1,'user','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 15:36:58'),
(2206,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-07 15:39:27'),
(2207,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 15:41:13'),
(2208,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-07 15:41:36'),
(2209,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-07 16:30:10'),
(2210,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-08 15:54:45'),
(2211,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-08 19:02:32'),
(2212,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-08 19:03:25'),
(2213,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-10 10:29:08'),
(2214,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-10 10:39:01'),
(2215,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-10 10:44:44'),
(2216,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-10 10:57:31'),
(2217,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-10 11:31:25'),
(2218,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-10 12:15:58'),
(2219,1,'cny','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-08-10 12:16:48'),
(2220,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:16:54'),
(2221,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:18:27'),
(2222,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:23:03'),
(2223,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:28:00'),
(2224,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:28:07'),
(2225,1,'file-cny','site.recordingsession.update','Updated RecordingSession Documentation successfully.','127.0.0.1','2015-08-10 12:46:50'),
(2226,1,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-08-10 15:22:26'),
(2227,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-10 15:48:36'),
(2228,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-10 15:48:55'),
(2229,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:03:02'),
(2230,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:07:05'),
(2231,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 11:11:03'),
(2232,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-11 11:12:21'),
(2233,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-11 11:12:39'),
(2234,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 11:13:12'),
(2235,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:31:00'),
(2236,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:32:27'),
(2237,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:32:45'),
(2238,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 11:33:04'),
(2239,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:04:55'),
(2240,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:06:12'),
(2241,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:06:25'),
(2242,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:07:03'),
(2243,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:20:40'),
(2244,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:46:55'),
(2245,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 12:50:27'),
(2246,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 13:11:11'),
(2247,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 13:15:55'),
(2248,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-11 13:32:24'),
(2249,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 13:37:10'),
(2250,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 15:34:06'),
(2251,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 16:15:48'),
(2252,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-11 16:16:20'),
(2253,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:16:05'),
(2254,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:19:39'),
(2255,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:19:49'),
(2256,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:20:26'),
(2257,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:21:22'),
(2258,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:21:57'),
(2259,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:23:10'),
(2260,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:29:52'),
(2261,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:30:32'),
(2262,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:31:18'),
(2263,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-11 17:32:08'),
(2264,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:20:53'),
(2265,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:21:50'),
(2266,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:24:54'),
(2267,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:45:04'),
(2268,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:45:41'),
(2269,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-12 10:46:06'),
(2270,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:03:14'),
(2271,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:14:34'),
(2272,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-12 11:18:30'),
(2273,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:19:16'),
(2274,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:20:59'),
(2275,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-12 11:22:16'),
(2276,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:30:23'),
(2277,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 11:32:11'),
(2278,1,'file-text','site.contractinvoice.update','Updated ContractInvoice successfully.','127.0.0.1','2015-08-12 11:32:27'),
(2279,1,'file-text','site.contractinvoice.backdated','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 19:03:14'),
(2280,1,'file-text','site.contractinvoice.backdated','Created ContractInvoice successfully.','127.0.0.1','2015-08-12 19:05:11'),
(2281,1,'user','site.inspector.update','Updated Inspector successfully.','127.0.0.1','2015-08-14 11:23:27'),
(2282,1,'user','site.inspector.update','Updated Inspector successfully.','127.0.0.1','2015-08-14 11:29:53'),
(2283,1,'user','site.inspector.update','Updated Inspector successfully.','127.0.0.1','2015-08-14 12:18:13'),
(2284,1,'music','site.performeraccount.update','Updated Performer Rajeshn Raj successfully.','127.0.0.1','2015-08-14 12:28:20'),
(2285,1,'user','site.authoraccount.update','Updated Robert  Van AuthorAccount successfully.','127.0.0.1','2015-08-14 12:28:57'),
(2286,1,'user','site.recordingsession.update','Updated SOC-F-0000001  Recording session sheeet Document saved successfully.','127.0.0.1','2015-08-14 15:38:13'),
(2287,1,'user','site.recordingsession.filedelete','Deleted a file Test successfully.','127.0.0.1','2015-08-14 15:50:58'),
(2288,1,'cny','site.recordingsession.filedelete','Deleted a file Test successfully.','127.0.0.1','2015-08-14 15:53:00'),
(2289,1,'file-audio-o','site.recordingsession.update','Updated SOC-F-0000001  Recording session sheeet Document saved successfully.','127.0.0.1','2015-08-14 15:53:11'),
(2290,1,'file-audio-o','site.recordingsession.update','Updated SOC-F-0000001  Recording session sheeet Document saved successfully.','127.0.0.1','2015-08-14 15:56:56'),
(2291,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-14 18:28:47'),
(2292,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-14 19:16:29'),
(2293,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-17 11:42:26'),
(2294,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-17 16:22:48'),
(2295,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-17 18:12:45'),
(2296,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-18 10:23:08'),
(2297,1,'file-text','site.contractinvoice.create','Created ContractInvoice successfully.','127.0.0.1','2015-08-18 10:33:56'),
(2298,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-18 10:36:40'),
(2299,1,'building','site.organization.create','Created Organization SOC003 successfully.','127.0.0.1','2015-08-20 11:24:41'),
(2300,1,'group','site.society.create','Created a New Soc successfully.','127.0.0.1','2015-08-20 11:25:18'),
(2301,1,'user','site.user.create','Created User prakash successfully.','127.0.0.1','2015-08-20 11:26:17'),
(2302,1,'building','site.organization.update','Updated Organization SOC001 successfully.','127.0.0.1','2015-08-20 12:48:19'),
(2303,1,'building','site.organization.update','Updated Organization SOC003 successfully.','127.0.0.1','2015-08-20 12:48:30'),
(2304,1,'building','site.organization.update','Updated Organization SOC001 successfully.','127.0.0.1','2015-08-20 12:55:23'),
(2305,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-20 13:27:49'),
(2306,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-20 13:27:50'),
(2307,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-20 13:28:47'),
(2308,1,'user','site.internalcodegenerate.setup','Updated InternalcodeGenerate successfully.','127.0.0.1','2015-08-20 13:28:47'),
(2309,1,'user','site.authoraccount.create','Created a new autth  new successfully.','127.0.0.1','2015-08-20 13:28:59'),
(2310,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-20 18:48:27'),
(2311,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 15:11:54'),
(2312,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 15:56:32'),
(2313,1,'group','site.society.delete','Deleted a New Soc successfully.','127.0.0.1','2015-08-21 15:57:42'),
(2314,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 16:43:57'),
(2315,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 16:46:26'),
(2316,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 16:47:08'),
(2317,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-21 16:48:35'),
(2318,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-08-22 13:41:16'),
(2319,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-08-22 13:41:21'),
(2320,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-08-22 13:42:09'),
(2321,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-08-22 13:42:16'),
(2322,1,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-08-22 13:44:09'),
(2323,1,'music','site.performeraccount.update','Updated Performer Payment Method Rajeshn Raj successfully.','127.0.0.1','2015-08-22 13:46:20'),
(2324,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 17:30:00'),
(2325,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 17:30:43'),
(2326,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 17:31:08'),
(2327,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 18:30:36'),
(2328,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 18:32:49'),
(2329,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 19:14:00'),
(2330,1,'group','site.society.update','Updated a SOC successfully.','127.0.0.1','2015-08-22 19:16:13'),
(2331,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 17:59:01'),
(2332,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:03:41'),
(2333,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:04:29'),
(2334,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:04:44'),
(2335,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:05:24'),
(2336,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:06:31'),
(2337,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:06:50'),
(2338,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:07:04'),
(2339,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:10:09'),
(2340,1,'user','site.tariffcontracts.update','Updated TariffContracts successfully.','127.0.0.1','2015-08-25 18:11:07'),
(2341,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-08-26 10:57:18'),
(2342,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-08-26 10:57:31'),
(2343,1,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-08-26 12:25:48'),
(2344,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-26 13:31:29'),
(2345,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-08-26 16:46:11'),
(2346,3,'user','site.default.login','admin2 logged-in successfully.','127.0.0.1','2015-08-26 16:46:25'),
(2347,3,'user','site.default.logout','admin 2 logged-out successfully.','127.0.0.1','2015-08-26 16:46:40'),
(2348,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-08-26 16:46:56'),
(2349,1,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-08-26 18:31:54'),
(2350,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-08-29 16:59:15'),
(2351,1,'music','site.masterrole.create','Created Role TY successfully.','127.0.0.1','2015-08-29 17:50:29'),
(2352,1,'music','site.masterrole.delete','Deleted Role TY successfully.','127.0.0.1','2015-08-29 17:50:32'),
(2353,1,'music','site.masterrole.create','Created Role TY successfully.','127.0.0.1','2015-08-29 17:58:27'),
(2354,1,'music','site.masterrole.delete','Deleted Role TY successfully.','127.0.0.1','2015-08-29 17:58:53'),
(2355,1,'user','site.user.create','Created User test successfully.','127.0.0.1','2015-08-29 18:07:15'),
(2356,1,'user','site.user.delete','Deleted User test successfully.','127.0.0.1','2015-08-29 18:07:24'),
(2357,1,'user','site.user.update','Updated User admin successfully.','127.0.0.1','2015-09-01 12:09:52'),
(2358,1,'user','site.user.update','Updated User admin successfully.','127.0.0.1','2015-09-01 12:10:36'),
(2359,1,'group','site.society.update','Updated a AUTHOR successfully.','127.0.0.1','2015-09-01 12:11:33'),
(2360,1,'group','site.society.update','Updated a PERFORMER successfully.','127.0.0.1','2015-09-01 12:11:59'),
(2361,1,'group','site.society.create','Created a COPYRIGHT successfully.','127.0.0.1','2015-09-01 12:13:38'),
(2362,1,'group','site.society.create','Created a RELATED RIGHTS successfully.','127.0.0.1','2015-09-01 12:14:18'),
(2363,1,'group','site.society.create','Created a FULL ACCESS successfully.','127.0.0.1','2015-09-01 12:14:50'),
(2364,1,'group','site.society.update','Updated a COPY RIGHTS successfully.','127.0.0.1','2015-09-01 12:15:03'),
(2365,1,'group','site.society.update','Updated a AUTHOR successfully.','127.0.0.1','2015-09-01 12:15:34'),
(2366,1,'group','site.society.update','Updated a PERFORMER successfully.','127.0.0.1','2015-09-01 12:16:04'),
(2367,1,'user','site.user.update','Updated User admin successfully.','127.0.0.1','2015-09-01 12:19:31'),
(2368,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-01 13:02:45'),
(2369,10,'user','site.default.login','prakash logged-in successfully.','127.0.0.1','2015-09-01 13:03:16'),
(2370,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:04:34'),
(2371,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:04:49'),
(2372,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:05:51'),
(2373,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:06:05'),
(2374,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:06:15'),
(2375,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 13:10:15'),
(2376,10,'group','site.society.update','Updated a AUTHOR successfully.','127.0.0.1','2015-09-01 15:14:15'),
(2377,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 15:14:41'),
(2378,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 15:15:03'),
(2379,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 15:21:08'),
(2380,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 16:02:48'),
(2381,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 16:09:47'),
(2382,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 16:17:37'),
(2383,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 16:17:54'),
(2384,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 17:43:52'),
(2385,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-01 18:02:29'),
(2386,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 10:59:15'),
(2387,10,'group','site.society.update','Updated a COPYRIGHT successfully.','127.0.0.1','2015-09-02 11:02:46'),
(2388,10,'group','site.society.update','Updated a COPYRIGHT AND PUBLISHER successfully.','127.0.0.1','2015-09-02 11:03:45'),
(2389,10,'group','site.society.update','Updated a PRODUCER successfully.','127.0.0.1','2015-09-02 11:04:25'),
(2390,10,'group','site.society.update','Updated a PERFORMER AND PRODUCER successfully.','127.0.0.1','2015-09-02 11:04:56'),
(2391,10,'group','site.society.create','Created a PRODUCER successfully.','127.0.0.1','2015-09-02 11:08:30'),
(2392,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:09:55'),
(2393,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:10:20'),
(2394,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:10:40'),
(2395,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:16:17'),
(2396,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:16:34'),
(2397,10,'group','site.society.update','Updated a PRIME successfully.','127.0.0.1','2015-09-02 11:16:52'),
(2398,10,'user','site.user.update','Updated User prakash successfully.','127.0.0.1','2015-09-02 11:17:00'),
(2399,10,'user','site.user.update','Updated User john successfully.','127.0.0.1','2015-09-02 11:18:39'),
(2400,10,'user','site.default.logout','prak logged-out successfully.','127.0.0.1','2015-09-02 11:18:46'),
(2401,10,'user','site.default.login','john logged-in successfully.','127.0.0.1','2015-09-02 11:18:57'),
(2402,10,'user','site.default.logout','john logged-out successfully.','127.0.0.1','2015-09-02 15:57:49'),
(2403,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-02 15:57:59'),
(2404,10,'user','site.default.logout','Prime logged-out successfully.','127.0.0.1','2015-09-02 15:58:07'),
(2405,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-02 15:58:17'),
(2406,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-02 15:58:49'),
(2407,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-02 15:58:59'),
(2408,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-02 15:59:15'),
(2409,12,'user','site.default.login','performer logged-in successfully.','127.0.0.1','2015-09-02 15:59:24'),
(2410,12,'user','site.default.logout','Performer logged-out successfully.','127.0.0.1','2015-09-02 15:59:35'),
(2411,13,'user','site.default.login','copyright_publisher logged-in successfully.','127.0.0.1','2015-09-02 15:59:48'),
(2412,13,'user','site.default.logout','Copyright Publisher logged-out successfully.','127.0.0.1','2015-09-02 16:00:07'),
(2413,14,'user','site.default.login','performer_producer logged-in successfully.','127.0.0.1','2015-09-02 16:00:14'),
(2414,14,'user','site.default.logout','Performer Producer logged-out successfully.','127.0.0.1','2015-09-02 16:02:52'),
(2415,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-02 16:03:14'),
(2416,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-02 16:03:50'),
(2417,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-02 16:03:58'),
(2418,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-02 16:04:15'),
(2419,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-02 16:04:22'),
(2420,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-02 16:14:50'),
(2421,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-02 16:14:58'),
(2422,10,'user','site.default.logout','Prime logged-out successfully.','127.0.0.1','2015-09-02 16:15:05'),
(2423,14,'user','site.default.login','performer_producer logged-in successfully.','127.0.0.1','2015-09-02 16:18:51'),
(2424,14,'user','site.default.logout','Performer Producer logged-out successfully.','127.0.0.1','2015-09-02 16:18:58'),
(2425,13,'user','site.default.login','copyright_publisher logged-in successfully.','127.0.0.1','2015-09-02 16:19:08'),
(2426,13,'user','site.default.logout','Copyright Publisher logged-out successfully.','127.0.0.1','2015-09-02 16:19:21'),
(2427,13,'user','site.default.login','copyright_publisher logged-in successfully.','127.0.0.1','2015-09-02 16:19:36'),
(2428,13,'user','site.default.logout','Copyright Publisher logged-out successfully.','127.0.0.1','2015-09-02 16:21:28'),
(2429,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-02 16:21:32'),
(2430,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 16:59:08'),
(2431,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 16:59:52'),
(2432,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 17:02:30'),
(2433,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 17:02:53'),
(2434,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 17:03:13'),
(2435,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-02 18:27:04'),
(2436,10,'user','site.distributionsubclass.create','Created DistributionSubclass successfully.','127.0.0.1','2015-09-02 18:29:17'),
(2437,10,'user','site.distributionsubclass.update','Updated DistributionSubclass successfully.','127.0.0.1','2015-09-02 18:29:29'),
(2438,10,'user','site.default.logout','Prime logged-out successfully.','127.0.0.1','2015-09-02 18:59:06'),
(2439,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-02 18:59:25'),
(2440,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-02 19:05:32'),
(2441,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-02 19:05:37'),
(2442,10,'user','site.default.logout','Prime logged-out successfully.','127.0.0.1','2015-09-02 19:35:16'),
(2443,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-02 19:35:24'),
(2444,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-02 19:51:04'),
(2445,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-02 19:51:13'),
(2446,15,'user','site.distributionsetting.create','Created DistributionSetting successfully.','127.0.0.1','2015-09-03 11:16:18'),
(2447,15,'user','site.distributionsetting.create','Created DistributionSetting successfully.','127.0.0.1','2015-09-03 11:17:21'),
(2448,15,'user','site.distributionutlizationperiod.create','Created DistributionUtlizationPeriod successfully.','127.0.0.1','2015-09-03 11:45:06'),
(2449,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-03 11:59:23'),
(2450,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-03 11:59:47'),
(2451,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-03 12:16:20'),
(2452,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-03 12:16:30'),
(2453,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-03 12:28:39'),
(2454,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-03 12:28:45'),
(2455,10,'user','site.default.logout','Prime logged-out successfully.','127.0.0.1','2015-09-03 13:27:03'),
(2456,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-03 13:27:09'),
(2457,1,'user','site.user.create','Created User prakash successfully.','127.0.0.1','2015-09-03 13:32:46'),
(2458,1,'user','site.user.delete','Deleted User prakash successfully.','127.0.0.1','2015-09-03 13:33:37'),
(2459,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-03 15:27:24'),
(2460,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-03 15:27:32'),
(2461,1,'user','site.user.create','Created User prakash successfully.','127.0.0.1','2015-09-03 15:39:57'),
(2462,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-03 16:22:22'),
(2463,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-05 11:11:18'),
(2464,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-05 11:33:47'),
(2465,15,'user','site.default.profile','Updated a producer successfully.','127.0.0.1','2015-09-05 11:34:07'),
(2466,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-05 11:34:10'),
(2467,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-05 11:34:23'),
(2468,15,'user','site.default.profile','Updated a producer successfully.','127.0.0.1','2015-09-05 11:34:34'),
(2469,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-05 15:17:19'),
(2470,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-05 16:11:30'),
(2471,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-05 16:11:35'),
(2472,11,'user','site.user.update','Updated User copyright successfully.','127.0.0.1','2015-09-05 16:12:32'),
(2473,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-05 16:28:18'),
(2474,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-05 16:28:31'),
(2475,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-05 16:36:13'),
(2476,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-05 16:36:19'),
(2477,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-05 17:54:52'),
(2478,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-05 17:54:59'),
(2479,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-05 17:57:27'),
(2480,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-09 10:58:56'),
(2481,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-11 12:04:36'),
(2482,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-14 11:10:14'),
(2483,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-14 11:10:22'),
(2484,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-14 11:26:27'),
(2485,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-14 11:26:33'),
(2486,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-14 11:29:10'),
(2487,1,'user','site.default.login','admin logged-in successfully.','127.0.0.1','2015-09-14 11:29:21'),
(2488,1,'user','site.default.logout','admin logged-out successfully.','127.0.0.1','2015-09-14 11:30:22'),
(2489,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-14 11:30:27'),
(2490,11,'sliders','site.work.update','Saved Work Sub Publishing successfully.','127.0.0.1','2015-09-14 13:18:49'),
(2491,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:23:50'),
(2492,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:23:50'),
(2493,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:23:50'),
(2494,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:23:50'),
(2495,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:24:31'),
(2496,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:24:31'),
(2497,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:24:31'),
(2498,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:24:32'),
(2499,11,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-14 13:24:32'),
(2500,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-14 13:25:35'),
(2501,12,'user','site.default.login','performer logged-in successfully.','127.0.0.1','2015-09-14 13:26:11'),
(2502,12,'music','site.performeraccount.create','Created Performer New performer e ry successfully.','127.0.0.1','2015-09-14 13:31:50'),
(2503,12,'music','site.performeraccount.update','Updated Performer test ry successfully.','127.0.0.1','2015-09-14 13:50:36'),
(2504,12,'cny','site.recordingsession.update','Updated RecordingSession successfully.','127.0.0.1','2015-09-14 13:55:30'),
(2505,12,'cny','site.recordingsession.create','Created RecordingSession successfully.','127.0.0.1','2015-09-14 14:02:34'),
(2506,12,'user','site.default.logout','Performer logged-out successfully.','127.0.0.1','2015-09-14 15:14:52'),
(2507,11,'user','site.default.login','copyright logged-in successfully.','127.0.0.1','2015-09-14 15:14:56'),
(2508,11,'user','site.default.logout','Copyright logged-out successfully.','127.0.0.1','2015-09-14 15:18:07'),
(2509,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-14 15:18:12'),
(2510,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-14 18:37:35'),
(2511,13,'user','site.default.login','copyright_publisher logged-in successfully.','127.0.0.1','2015-09-14 18:40:16'),
(2512,13,'user','site.default.logout','Copyright Publisher logged-out successfully.','127.0.0.1','2015-09-15 15:54:12'),
(2513,15,'user','site.default.login','producer logged-in successfully.','127.0.0.1','2015-09-15 15:54:20'),
(2514,15,'user','site.default.logout','Producer logged-out successfully.','127.0.0.1','2015-09-15 15:55:30'),
(2515,14,'user','site.default.login','performer_producer logged-in successfully.','127.0.0.1','2015-09-15 15:55:35'),
(2516,14,'user','site.default.logout','Performer Producer logged-out successfully.','127.0.0.1','2015-09-15 16:34:21'),
(2517,12,'user','site.default.login','performer logged-in successfully.','127.0.0.1','2015-09-15 16:34:28'),
(2518,12,'user','site.default.logout','Performer logged-out successfully.','127.0.0.1','2015-09-15 16:37:49'),
(2519,14,'user','site.default.login','performer_producer logged-in successfully.','127.0.0.1','2015-09-15 16:37:54'),
(2520,14,'user','site.default.logout','Performer Producer logged-out successfully.','127.0.0.1','2015-09-15 16:40:24'),
(2521,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-15 16:40:29'),
(2522,10,'music','site.performeraccount.create','Created Performer testpp ry successfully.','127.0.0.1','2015-09-15 16:46:09'),
(2523,10,'music','site.performeraccount.delete','Deleted Performer testpp ry successfully.','127.0.0.1','2015-09-15 16:46:28'),
(2524,10,'music','site.performeraccount.update','Updated Performer Test prakashte test successfully.','127.0.0.1','2015-09-15 17:31:13'),
(2525,10,'group','site.society.import','Updated a COPYRIGHT successfully.','127.0.0.1','2015-09-18 11:15:15'),
(2526,10,'group','site.society.import','Updated a COPYRIGHT successfully.','127.0.0.1','2015-09-18 11:16:24'),
(2527,10,'group','site.society.import','Updated a COPYRIGHT successfully.','127.0.0.1','2015-09-18 11:17:46'),
(2528,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-18 19:01:53'),
(2529,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-18 19:03:11'),
(2530,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-18 19:11:00'),
(2531,10,'group','site.society.import','XLS Imported to Society : PERFORMER successfully.','127.0.0.1','2015-09-18 19:18:52'),
(2532,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-19 12:06:57'),
(2533,10,'user','site.emailtemplate.update','Updated EmailTemplate successfully.','127.0.0.1','2015-09-19 12:25:17'),
(2534,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-19 16:15:16'),
(2535,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-19 16:45:09'),
(2536,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-19 16:52:24'),
(2537,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-19 16:52:53'),
(2538,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-19 17:25:02'),
(2539,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-19 17:28:54'),
(2540,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-19 17:29:34'),
(2541,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:45:25'),
(2542,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:45:38'),
(2543,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:47:22'),
(2544,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:55:38'),
(2545,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:58:41'),
(2546,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 10:59:50'),
(2547,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 11:01:03'),
(2548,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 11:14:06'),
(2549,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 11:18:51'),
(2550,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 11:19:39'),
(2551,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 11:20:54'),
(2552,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 12:21:48'),
(2553,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:31:49'),
(2554,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:38:12'),
(2555,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:38:53'),
(2556,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:39:52'),
(2557,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:41:02'),
(2558,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:42:36'),
(2559,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 15:43:53'),
(2560,10,'user','site.distributionmainclass.update','Updated DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:10:09'),
(2561,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:10:31'),
(2562,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:11:10'),
(2563,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:11:28'),
(2564,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:12:02'),
(2565,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:12:32'),
(2566,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:12:48'),
(2567,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:13:00'),
(2568,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:13:15'),
(2569,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:13:27'),
(2570,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:13:39'),
(2571,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:14:11'),
(2572,10,'user','site.distributionmainclass.create','Created DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:14:38'),
(2573,10,'user','site.distributionmainclass.update','Updated DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:15:03'),
(2574,10,'user','site.distributionmainclass.update','Updated DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:15:04'),
(2575,10,'user','site.distributionmainclass.update','Updated DistributionMainClass successfully.','127.0.0.1','2015-09-21 16:18:34'),
(2576,10,'user','site.distributionclass.update','Updated DistributionClass successfully.','127.0.0.1','2015-09-21 16:25:49'),
(2577,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-21 17:19:24'),
(2578,10,'user','site.default.login','prime logged-in successfully.','127.0.0.1','2015-09-23 16:35:20'),
(2579,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 18:09:19'),
(2580,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-23 18:09:57'),
(2581,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 18:24:19'),
(2582,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-23 18:25:29'),
(2583,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 19:18:24'),
(2584,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-23 19:19:38'),
(2585,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-23 19:19:42'),
(2586,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 19:25:04'),
(2587,10,'user','site.tariffcontracts.delete','Deleted TariffContracts successfully.','127.0.0.1','2015-09-23 19:25:56'),
(2588,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 19:26:14'),
(2589,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-23 19:28:57'),
(2590,10,'user','site.tariffcontracts.create','Created TariffContracts successfully.','127.0.0.1','2015-09-24 10:42:23'),
(2591,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 11:23:31'),
(2592,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 11:23:31'),
(2593,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 11:23:31'),
(2594,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 11:23:31'),
(2595,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 11:23:31'),
(2596,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 12:13:03'),
(2597,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 12:13:03'),
(2598,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 12:13:03'),
(2599,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 12:13:03'),
(2600,10,'fa fa-at','site.work.insertright','Created Right Holder saved for Enter Sandman successfully.','127.0.0.1','2015-09-24 12:13:03'),
(2601,10,'sliders','site.work.create','Created Work successfully.','127.0.0.1','2015-09-24 12:21:29'),
(2602,10,'sliders','site.work.update','Saved Work Documentation successfully.','127.0.0.1','2015-09-24 12:21:43'),
(2603,10,'sliders','site.work.delete','Deleted Work successfully.','127.0.0.1','2015-09-24 12:45:36'),
(2604,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 13:36:11'),
(2605,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 15:17:11'),
(2606,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 15:21:28'),
(2607,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 15:21:57'),
(2608,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 15:59:12'),
(2609,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:06:35'),
(2610,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:07:07'),
(2611,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:07:43'),
(2612,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:18:12'),
(2613,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:19:23'),
(2614,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-24 16:24:00'),
(2615,10,'user','site.distributionclass.create','Created DistributionClass successfully.','127.0.0.1','2015-09-28 11:36:49'),
(2616,10,'user','site.distributionclass.delete','Deleted DistributionClass successfully.','127.0.0.1','2015-09-28 11:36:58'),
(2617,10,'user','site.distributionsubclass.create','Created DistributionSubclass successfully.','127.0.0.1','2015-09-28 11:46:57'),
(2618,10,'user','site.distributionsubclass.delete','Deleted DistributionSubclass successfully.','127.0.0.1','2015-09-28 11:47:11'),
(2619,10,'user','site.distributionsubclass.create','Created DistributionSubclass successfully.','127.0.0.1','2015-09-28 12:06:45'),
(2620,10,'user','site.distributionsubclass.delete','Deleted DistributionSubclass successfully.','127.0.0.1','2015-09-28 12:06:51'),
(2621,10,'user','site.distributionsetting.create','Created DistributionSetting successfully.','127.0.0.1','2015-09-28 12:20:19'),
(2622,10,'user','site.distributionsetting.delete','Deleted DistributionSetting successfully.','127.0.0.1','2015-09-28 12:20:32'),
(2623,10,'user','site.distributionutlizationperiod.create','Created DistributionUtlizationPeriod successfully.','127.0.0.1','2015-09-28 12:37:31'),
(2624,10,'user','site.distributionutlizationperiod.update','Updated DistributionUtlizationPeriod successfully.','127.0.0.1','2015-09-28 12:38:55'),
(2625,10,'building','site.organization.update','Updated Organization SOC001 successfully.','127.0.0.1','2015-09-28 13:28:23'),
(2626,10,'building','site.organization.update','Updated Organization SOC001 successfully.','127.0.0.1','2015-09-28 13:40:00'),
(2627,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-28 18:41:22'),
(2628,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-28 18:41:32'),
(2629,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 16:58:23'),
(2630,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:05:47'),
(2631,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:08:44'),
(2632,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:09:32'),
(2633,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:09:48'),
(2634,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:10:58'),
(2635,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:11:24'),
(2636,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:18:16'),
(2637,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:19:08'),
(2638,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:21:31'),
(2639,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:22:34'),
(2640,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:22:43'),
(2641,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:22:53'),
(2642,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:24:53'),
(2643,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:26:20'),
(2644,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:26:46'),
(2645,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:27:26'),
(2646,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:27:56'),
(2647,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:28:14'),
(2648,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:29:17'),
(2649,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:29:42'),
(2650,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:31:24'),
(2651,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:31:46'),
(2652,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:33:35'),
(2653,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:50:28'),
(2654,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:51:53'),
(2655,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:54:31'),
(2656,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:55:11'),
(2657,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:55:43'),
(2658,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:58:08'),
(2659,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 17:58:26'),
(2660,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:04:40'),
(2661,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:05:11'),
(2662,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:12:43'),
(2663,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:23:59'),
(2664,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:25:11'),
(2665,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:25:48'),
(2666,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:31:49'),
(2667,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:31:59'),
(2668,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:45:23'),
(2669,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:45:53'),
(2670,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 18:48:38'),
(2671,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-09-30 19:01:57'),
(2672,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 10:36:00'),
(2673,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 17:59:03'),
(2674,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:05:16'),
(2675,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:06:42'),
(2676,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:08:17'),
(2677,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:08:35'),
(2678,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:09:14'),
(2679,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:10:03'),
(2680,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:11:16'),
(2681,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:11:41'),
(2682,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:11:59'),
(2683,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:12:34'),
(2684,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:12:54'),
(2685,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:13:13'),
(2686,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:13:31'),
(2687,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:13:40'),
(2688,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:13:59'),
(2689,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:14:13'),
(2690,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:14:25'),
(2691,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:15:11'),
(2692,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:15:24'),
(2693,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:15:31'),
(2694,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:19:23'),
(2695,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:20:07'),
(2696,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:22:10'),
(2697,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:29:47'),
(2698,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:31:43'),
(2699,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:48:21'),
(2700,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:52:22'),
(2701,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 18:53:06'),
(2702,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:06:02'),
(2703,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:07:38'),
(2704,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:12:10'),
(2705,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:12:43'),
(2706,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:15:44'),
(2707,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:16:19'),
(2708,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:16:52'),
(2709,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-01 19:25:20'),
(2710,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 11:49:04'),
(2711,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 11:54:22'),
(2712,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 11:56:25'),
(2713,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:16:45'),
(2714,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:44:36'),
(2715,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:46:45'),
(2716,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:57:16'),
(2717,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:57:30'),
(2718,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 12:59:56'),
(2719,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 13:00:24'),
(2720,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 13:15:42'),
(2721,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 13:28:46'),
(2722,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 13:39:00'),
(2723,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:48:14'),
(2724,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:49:47'),
(2725,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:51:32'),
(2726,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:51:37'),
(2727,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:52:33'),
(2728,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 14:53:04'),
(2729,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:07:03'),
(2730,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:10:00'),
(2731,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:19:06'),
(2732,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:29:45'),
(2733,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:35:02'),
(2734,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:38:00'),
(2735,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:41:07'),
(2736,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:47:49'),
(2737,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:48:05'),
(2738,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:48:21'),
(2739,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:56:45'),
(2740,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 15:57:49'),
(2741,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 16:13:42'),
(2742,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 16:57:59'),
(2743,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 16:59:02'),
(2744,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 17:03:16'),
(2745,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 17:04:42'),
(2746,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 17:05:14'),
(2747,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 17:06:31'),
(2748,10,'group','site.society.import','XLS Imported to Society : COPYRIGHT successfully.','127.0.0.1','2015-10-03 17:07:52'),
(2749,10,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-10-05 11:05:56'),
(2750,10,'music','site.performeraccount.update','Updated Performer Address Rajeshn Raj successfully.','127.0.0.1','2015-10-05 11:10:39'),
(2751,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:13:27'),
(2752,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:13:35'),
(2753,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:15:55'),
(2754,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:16:22'),
(2755,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:17:56'),
(2756,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:18:10'),
(2757,10,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-10-05 11:21:16'),
(2758,10,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-10-05 11:30:58'),
(2759,10,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-10-05 11:31:19'),
(2760,10,'users','site.group.update','Address Saved on Author Group 1 successfully.','127.0.0.1','2015-10-05 11:32:23'),
(2761,10,'group','site.publishergroup.update','Updated Publisher Group Address SOC-GE-0000100 successfully.','127.0.0.1','2015-10-05 11:35:31'),
(2762,10,'user','site.authoraccount.update','Updated Robert  Van Death Inheritance successfully.','127.0.0.1','2015-10-05 11:51:50'),
(2763,10,'music','site.performeraccount.update','Updated Performer Death Inheritance Rajeshn Raj successfully.','127.0.0.1','2015-10-05 11:53:55'),
(2764,10,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-10-05 11:54:54'),
(2765,10,'user','site.authoraccount.update','Updated Robert  Van Address successfully.','127.0.0.1','2015-10-05 11:55:46'),
(2766,10,'music','site.performeraccount.update','Updated Performer Death Inheritance Rajeshn Raj successfully.','127.0.0.1','2015-10-05 11:59:33'),
(2767,10,'microphone','site.publisheraccount.update','Updated Publisher Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:03:31'),
(2768,10,'microphone','site.publisheraccount.update','Updated Publisher Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:04:08'),
(2769,10,'microphone','site.publisheraccount.update','Updated Publisher Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:05:15'),
(2770,10,'microphone','site.publisheraccount.update','Updated Publisher Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:07:13'),
(2771,10,'money','site.produceraccount.update','Updated Producer Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:12:25'),
(2772,10,'money','site.produceraccount.update','Updated Producer Succession ABM Limited successfully.','127.0.0.1','2015-10-05 12:13:38'),
(2773,10,'money','site.produceraccount.update','Updated Producer Biography ABM Limited successfully.','127.0.0.1','2015-10-05 12:19:38'),
(2774,10,'microphone','site.publisheraccount.update','Updated Publisher Biography ABM Limited successfully.','127.0.0.1','2015-10-05 12:22:27'),
(2775,10,'users','site.group.update','Updated a Performer Group 1 successfully.','127.0.0.1','2015-10-05 12:28:14'),
(2776,10,'users','site.group.update','Updated a Performer Group 1 successfully.','127.0.0.1','2015-10-05 12:29:14'),
(2777,10,'money','site.produceraccount.update','Updated Producer Address ABM Limited successfully.','127.0.0.1','2015-10-05 12:32:17'),
(2778,10,'microphone','site.publisheraccount.update','Updated Publisher Address ABM Limited successfully.','127.0.0.1','2015-10-05 12:33:02'),
(2779,10,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-10-05 12:54:31'),
(2780,10,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-10-05 12:54:31'),
(2781,10,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-10-05 12:54:31'),
(2782,10,'fa fa-at','site.work.insertright','Created Right Holder saved for New Work2 successfully.','127.0.0.1','2015-10-05 12:54:31'),
(2783,10,'sliders','site.work.update','Saved Work Subtitle successfully.','127.0.0.1','2015-10-05 13:09:36'),
(2784,10,'sliders','site.work.update','Saved Work Subtitle successfully.','127.0.0.1','2015-10-05 13:10:32'),
(2785,10,'volume-up','site.recording.update','Saved Recording Subtitle successfully.','127.0.0.1','2015-10-05 13:14:27'),
(2786,10,'volume-up','site.recording.subtitledelete','Deleted Recording subtitle asdda successfully.','127.0.0.1','2015-10-05 13:14:34'),
(2787,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:31:28'),
(2788,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:31:49'),
(2789,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:32:05'),
(2790,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:33:24'),
(2791,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:33:39'),
(2792,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:33:48'),
(2793,10,'user','site.authoraccount.update','Updated Robert  Van Managed Rights successfully.','127.0.0.1','2015-10-05 13:36:09'),
(2794,10,'user','site.authoraccount.create','Created a Test  testter successfully.','127.0.0.1','2015-10-05 13:36:31'),
(2795,10,'user','site.authoraccount.update','Updated Test  testter Managed Rights successfully.','127.0.0.1','2015-10-05 13:36:39'),
(2796,10,'user','site.authoraccount.update','Updated Test  testter Managed Rights successfully.','127.0.0.1','2015-10-05 13:36:51'),
(2797,10,'user','site.authoraccount.update','Updated Test  testter AuthorAccount successfully.','127.0.0.1','2015-10-05 13:37:19'),
(2798,10,'user','site.authoraccount.update','Updated Test  testter Managed Rights successfully.','127.0.0.1','2015-10-05 13:37:43'),
(2799,10,'user','site.authoraccount.update','Updated Test  testter Managed Rights successfully.','127.0.0.1','2015-10-05 13:37:52'),
(2800,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 14:57:11'),
(2801,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 14:57:20'),
(2802,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 14:58:16'),
(2803,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 14:58:26'),
(2804,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 14:58:44'),
(2805,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 14:58:49'),
(2806,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 15:00:24'),
(2807,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 15:01:01'),
(2808,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 15:03:47'),
(2809,10,'user','site.performeraccount.update','Updated Rajeshn  Raj Managed Rights successfully.','127.0.0.1','2015-10-05 15:05:10'),
(2810,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 15:05:40'),
(2811,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 15:07:03'),
(2812,10,'music','site.performeraccount.update','Updated Performer Related Rights Rajeshn Raj successfully.','127.0.0.1','2015-10-05 15:07:12'),
(2813,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:14:10'),
(2814,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:14:17'),
(2815,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:14:57'),
(2816,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:17:01'),
(2817,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:17:21'),
(2818,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:17:58'),
(2819,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:18:06'),
(2820,10,'microphone','site.publisheraccount.update','Updated Publisher Managed Rights Kiyosaki successfully.','127.0.0.1','2015-10-05 15:18:20'),
(2821,10,'money','site.produceraccount.update','Updated Producer Managed Rights adad successfully.','127.0.0.1','2015-10-05 15:21:34'),
(2822,10,'money','site.produceraccount.update','Updated Producer Managed Rights adad successfully.','127.0.0.1','2015-10-05 15:21:42'),
(2823,10,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-10-05 15:27:07'),
(2824,10,'users','site.group.update','Managed Rights Saved on Author Group 1 successfully.','127.0.0.1','2015-10-05 15:27:18'),
(2825,10,'group','site.publishergroup.update','Updated Publisher Group Managed Rights SOC-GE-0000101 successfully.','127.0.0.1','2015-10-05 15:30:54'),
(2826,10,'user','site.authoraccount.create','Created a New auth  auth successfully.','127.0.0.1','2015-10-05 16:39:01'),
(2827,10,'user','site.authoraccount.update','Updated New auth  auth Managed Rights successfully.','127.0.0.1','2015-10-05 16:39:08'),
(2828,10,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-10-05 17:59:02'),
(2829,10,'user','site.authoraccount.update','Updated Robert  Van Biography successfully.','127.0.0.1','2015-10-05 17:59:19');

/*Table structure for table `wipo_auth_resources` */

DROP TABLE IF EXISTS `wipo_auth_resources`;

CREATE TABLE `wipo_auth_resources` (
  `Master_Resource_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Master_User_ID` int(11) DEFAULT NULL,
  `Master_Role_ID` int(11) DEFAULT NULL,
  `Master_Society_ID` int(11) DEFAULT NULL,
  `Master_Module_ID` int(11) NOT NULL,
  `Master_Screen_ID` int(11) NOT NULL,
  `Master_Task_ADD` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_SEE` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_UPT` enum('0','1') NOT NULL DEFAULT '0',
  `Master_Task_DEL` enum('0','1') NOT NULL DEFAULT '0',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_auth_resources` */

insert  into `wipo_auth_resources`(`Master_Resource_ID`,`Master_User_ID`,`Master_Role_ID`,`Master_Society_ID`,`Master_Module_ID`,`Master_Screen_ID`,`Master_Task_ADD`,`Master_Task_SEE`,`Master_Task_UPT`,`Master_Task_DEL`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,NULL,NULL,10,3,28,'1','1','1','1','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(2,NULL,NULL,10,3,29,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(3,NULL,NULL,10,3,30,'1','1','1','1','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(4,NULL,NULL,10,3,31,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(5,NULL,NULL,10,3,32,'1','1','1','1','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(6,NULL,NULL,10,3,33,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(7,NULL,NULL,10,3,34,'1','1','1','1','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(8,NULL,NULL,10,3,35,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(9,NULL,NULL,10,3,36,'1','1','1','1','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(10,NULL,NULL,10,3,37,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(11,NULL,NULL,10,3,38,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(12,NULL,NULL,10,3,39,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(13,NULL,NULL,10,3,40,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(14,NULL,NULL,10,3,41,'0','0','0','0','1','2015-09-05 16:36:08','2015-09-14 13:20:27',1,11),
(15,NULL,NULL,11,3,28,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(16,NULL,NULL,11,3,29,'1','1','1','1','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(17,NULL,NULL,11,3,30,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(18,NULL,NULL,11,3,31,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(19,NULL,NULL,11,3,32,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(20,NULL,NULL,11,3,33,'1','1','1','1','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(21,NULL,NULL,11,3,34,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(22,NULL,NULL,11,3,35,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(23,NULL,NULL,11,3,36,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(24,NULL,NULL,11,3,37,'1','1','1','1','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(25,NULL,NULL,11,3,38,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(26,NULL,NULL,11,3,39,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(27,NULL,NULL,11,3,40,'0','0','0','0','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(28,NULL,NULL,11,3,41,'1','1','1','1','1','2015-09-05 17:17:46','0000-00-00 00:00:00',11,NULL),
(29,NULL,NULL,12,3,28,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:44',11,13),
(30,NULL,NULL,12,3,29,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:44',11,13),
(31,NULL,NULL,12,3,30,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:44',11,13),
(32,NULL,NULL,12,3,31,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:44',11,13),
(33,NULL,NULL,12,3,32,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(34,NULL,NULL,12,3,33,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(35,NULL,NULL,12,3,34,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(36,NULL,NULL,12,3,35,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(37,NULL,NULL,12,3,36,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(38,NULL,NULL,12,3,37,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(39,NULL,NULL,12,3,38,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(40,NULL,NULL,12,3,39,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(41,NULL,NULL,12,3,40,'0','0','0','0','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(42,NULL,NULL,12,3,41,'1','1','1','1','1','2015-09-05 17:18:44','2015-09-14 18:43:45',11,13),
(43,NULL,NULL,14,3,28,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(44,NULL,NULL,14,3,29,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(45,NULL,NULL,14,3,30,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(46,NULL,NULL,14,3,31,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(47,NULL,NULL,14,3,32,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(48,NULL,NULL,14,3,33,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(49,NULL,NULL,14,3,34,'1','1','1','1','1','2015-09-05 17:19:06','0000-00-00 00:00:00',11,NULL),
(50,NULL,NULL,14,3,35,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(51,NULL,NULL,14,3,36,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(52,NULL,NULL,14,3,37,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(53,NULL,NULL,14,3,38,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(54,NULL,NULL,14,3,39,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(55,NULL,NULL,14,3,40,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(56,NULL,NULL,14,3,41,'1','1','1','1','1','2015-09-05 17:19:07','0000-00-00 00:00:00',11,NULL),
(57,NULL,NULL,15,3,28,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(58,NULL,NULL,15,3,29,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(59,NULL,NULL,15,3,30,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(60,NULL,NULL,15,3,31,'1','1','1','1','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(61,NULL,NULL,15,3,32,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(62,NULL,NULL,15,3,33,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(63,NULL,NULL,15,3,34,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(64,NULL,NULL,15,3,35,'1','1','1','1','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(65,NULL,NULL,15,3,36,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(66,NULL,NULL,15,3,37,'1','1','1','1','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(67,NULL,NULL,15,3,38,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(68,NULL,NULL,15,3,39,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(69,NULL,NULL,15,3,40,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(70,NULL,NULL,15,3,41,'0','0','0','0','1','2015-09-05 17:19:40','0000-00-00 00:00:00',11,NULL),
(71,NULL,NULL,10,4,45,'0','0','0','0','1','2015-09-05 17:21:06','0000-00-00 00:00:00',11,NULL),
(72,NULL,NULL,10,4,46,'0','0','0','0','1','2015-09-05 17:21:06','0000-00-00 00:00:00',11,NULL),
(73,NULL,NULL,10,4,48,'0','0','0','0','1','2015-09-05 17:21:06','0000-00-00 00:00:00',11,NULL),
(74,NULL,NULL,10,4,49,'0','0','0','0','1','2015-09-05 17:21:06','0000-00-00 00:00:00',11,NULL),
(75,NULL,NULL,10,4,50,'0','0','0','0','1','2015-09-05 17:21:07','0000-00-00 00:00:00',11,NULL),
(76,NULL,NULL,11,4,45,'0','0','0','0','1','2015-09-05 17:21:11','0000-00-00 00:00:00',11,NULL),
(77,NULL,NULL,11,4,46,'0','0','0','0','1','2015-09-05 17:21:11','0000-00-00 00:00:00',11,NULL),
(78,NULL,NULL,11,4,48,'0','0','0','0','1','2015-09-05 17:21:11','0000-00-00 00:00:00',11,NULL),
(79,NULL,NULL,11,4,49,'0','0','0','0','1','2015-09-05 17:21:11','0000-00-00 00:00:00',11,NULL),
(80,NULL,NULL,11,4,50,'0','0','0','0','1','2015-09-05 17:21:11','0000-00-00 00:00:00',11,NULL),
(81,NULL,NULL,12,4,45,'0','0','0','0','1','2015-09-05 17:21:15','0000-00-00 00:00:00',11,NULL),
(82,NULL,NULL,12,4,46,'0','0','0','0','1','2015-09-05 17:21:15','0000-00-00 00:00:00',11,NULL),
(83,NULL,NULL,12,4,48,'0','0','0','0','1','2015-09-05 17:21:15','0000-00-00 00:00:00',11,NULL),
(84,NULL,NULL,12,4,49,'0','0','0','0','1','2015-09-05 17:21:15','0000-00-00 00:00:00',11,NULL),
(85,NULL,NULL,12,4,50,'0','0','0','0','1','2015-09-05 17:21:15','0000-00-00 00:00:00',11,NULL),
(86,NULL,NULL,13,4,45,'0','0','0','0','1','2015-09-05 17:21:20','0000-00-00 00:00:00',11,NULL),
(87,NULL,NULL,13,4,46,'0','0','0','0','1','2015-09-05 17:21:20','0000-00-00 00:00:00',11,NULL),
(88,NULL,NULL,13,4,48,'0','0','0','0','1','2015-09-05 17:21:20','0000-00-00 00:00:00',11,NULL),
(89,NULL,NULL,13,4,49,'0','0','0','0','1','2015-09-05 17:21:20','0000-00-00 00:00:00',11,NULL),
(90,NULL,NULL,13,4,50,'0','0','0','0','1','2015-09-05 17:21:20','0000-00-00 00:00:00',11,NULL),
(91,NULL,NULL,15,4,45,'0','0','0','0','1','2015-09-05 17:21:24','0000-00-00 00:00:00',11,NULL),
(92,NULL,NULL,15,4,46,'0','0','0','0','1','2015-09-05 17:21:24','0000-00-00 00:00:00',11,NULL),
(93,NULL,NULL,15,4,48,'0','0','0','0','1','2015-09-05 17:21:24','0000-00-00 00:00:00',11,NULL),
(94,NULL,NULL,15,4,49,'0','0','0','0','1','2015-09-05 17:21:24','0000-00-00 00:00:00',11,NULL),
(95,NULL,NULL,15,4,50,'0','0','0','0','1','2015-09-05 17:21:24','0000-00-00 00:00:00',11,NULL),
(96,NULL,NULL,13,3,28,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:34',14,14),
(97,NULL,NULL,13,3,29,'1','1','1','1','1','2015-09-15 15:56:38','2015-09-15 15:57:34',14,14),
(98,NULL,NULL,13,3,30,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:34',14,14),
(99,NULL,NULL,13,3,31,'1','1','1','1','1','2015-09-15 15:56:38','2015-09-15 15:57:34',14,14),
(100,NULL,NULL,13,3,32,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(101,NULL,NULL,13,3,33,'1','1','1','1','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(102,NULL,NULL,13,3,34,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(103,NULL,NULL,13,3,35,'1','1','1','1','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(104,NULL,NULL,13,3,36,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(105,NULL,NULL,13,3,37,'1','1','1','1','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(106,NULL,NULL,13,3,38,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(107,NULL,NULL,13,3,39,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(108,NULL,NULL,13,3,40,'0','0','0','0','1','2015-09-15 15:56:38','2015-09-15 15:57:35',14,14),
(109,NULL,NULL,13,3,41,'1','1','1','1','1','2015-09-15 15:56:39','2015-09-15 15:57:35',14,14);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account` */

insert  into `wipo_author_account`(`Auth_Acc_Id`,`Auth_GUID`,`Auth_Is_Performer`,`Auth_Sur_Name`,`Auth_First_Name`,`Auth_Internal_Code`,`Auth_Ipi`,`Auth_Ipi_Base_Number`,`Auth_Ipn_Number`,`Auth_Place_Of_Birth_Id`,`Auth_Birth_Country_Id`,`Auth_Nationality_Id`,`Auth_Language_Id`,`Auth_Identity_Number`,`Auth_Marital_Status_Id`,`Auth_Spouse_Name`,`Auth_Gender`,`Auth_DOB`,`Auth_Non_Member`,`Auth_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,'c08b3f47-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jenniferr','SOC-AP-0000036',NULL,2147483647,778965125,1,2,4,91,'RT-2323123',1,'Jane','F','0000-00-00','N','\\authoraccount\\cc74aac1d77dc2f23cb0b4f8e8baf0b3.jpg','1','2015-03-28 20:45:23','0000-00-00 00:00:00',1,NULL),
(3,'c08b43a7-14e4-11e5-b10a-74d435d335fe','Y','Mac','Johnn','SOC-AP-0000037',NULL,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-03-29 04:12:30','0000-00-00 00:00:00',1,NULL),
(4,'c08b4443-14e4-11e5-b10a-74d435d335fe','N','Van','Robert','SOC-A-0001003',NULL,NULL,NULL,1,NULL,7,NULL,'',1,'','F','0000-00-00','N','\\authoraccount\\ce68018e499d14a10769c269a628451c.jpg','1','2015-04-02 21:03:05','2015-10-05 13:36:09',1,10),
(6,'c08b44ca-14e4-11e5-b10a-74d435d335fe','N','Geo','Micheal','SOC-A-0001004',NULL,NULL,NULL,0,NULL,NULL,NULL,'',1,'Jane','M','0000-00-00','N',NULL,'1','2015-04-09 22:46:18','0000-00-00 00:00:00',1,NULL),
(7,'c08b454d-14e4-11e5-b10a-74d435d335fe','N','RAJ','SAGAR','SOC-A-0001006',NULL,NULL,NULL,NULL,2,2,NULL,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 08:51:50','0000-00-00 00:00:00',1,NULL),
(8,'c08b45d0-14e4-11e5-b10a-74d435d335fe','N','Samal','Himal','SOC-A-0001007',555115,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:22:48','0000-00-00 00:00:00',1,NULL),
(9,'c08b4659-14e4-11e5-b10a-74d435d335fe','N','Mandal','Kamal','SOC-A-0001008',1234565565,NULL,NULL,NULL,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-04-11 09:30:43','0000-00-00 00:00:00',1,NULL),
(10,'c08b46da-14e4-11e5-b10a-74d435d335fe','N','Bhai','Manu','SOC-A-0001009',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:37:51','0000-00-00 00:00:00',1,NULL),
(11,'c08b475d-14e4-11e5-b10a-74d435d335fe','N','Kinar','Dewan','SOC-A-0001010',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:43:24','0000-00-00 00:00:00',1,NULL),
(12,'c08b47db-14e4-11e5-b10a-74d435d335fe','N','Dean','James','SOC-A-0001011',NULL,NULL,NULL,NULL,2,2,1,'',1,'','M',NULL,'N',NULL,'1','2015-04-11 09:48:36','0000-00-00 00:00:00',1,NULL),
(13,'c08b48a7-14e4-11e5-b10a-74d435d335fe','N','Dean','James','SOC-A-0001012',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','M',NULL,'N',NULL,'1','2015-04-11 15:59:49','0000-00-00 00:00:00',1,NULL),
(14,'c08b4964-14e4-11e5-b10a-74d435d335fe','N','james','dean','SOC-A-0001013',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'','M',NULL,'N',NULL,'1','2015-04-11 18:25:31','0000-00-00 00:00:00',1,NULL),
(15,'c08b4a22-14e4-11e5-b10a-74d435d335fe','N','james','dean1','SOC-A-0001014',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-11 10:21:25','0000-00-00 00:00:00',1,NULL),
(16,'c08b4ad2-14e4-11e5-b10a-74d435d335fe','N','Arumugam','Vinodh','SOC-A-0001015',2147483647,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-11 10:33:45','0000-00-00 00:00:00',1,NULL),
(17,'c08b4b7d-14e4-11e5-b10a-74d435d335fe','N','Arumugam1','Vinodh','SOC-A-0001016',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','1979-10-18','N',NULL,'1','2015-04-21 22:55:58','0000-00-00 00:00:00',1,NULL),
(18,'c08b4c2d-14e4-11e5-b10a-74d435d335fe','N','Lesaca','John','SOC-A-0001017',NULL,NULL,NULL,NULL,2,2,1,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-04-23 10:32:44','0000-00-00 00:00:00',1,NULL),
(19,'c08b4cd7-14e4-11e5-b10a-74d435d335fe','N','Kiyosaki','Robertt','SOC-A-0001018',NULL,NULL,NULL,NULL,2,2,40,'',NULL,'','M','2015-06-29','N',NULL,'1','2015-05-13 13:18:27','0000-00-00 00:00:00',1,NULL),
(21,'c08b4d7c-14e4-11e5-b10a-74d435d335fe','N','Y','Willam','SOC-A-0001021',NULL,NULL,NULL,NULL,133,131,92,'',1,'','M','1990-02-06','N',NULL,'1','2015-06-08 20:11:05','0000-00-00 00:00:00',1,NULL),
(22,'c08b4e2c-14e4-11e5-b10a-74d435d335fe','N','P','Harry','SOC-A-0001022',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','1995-10-24','Y',NULL,'1','2015-06-09 04:17:31','0000-00-00 00:00:00',1,NULL),
(24,'c08b4ed9-14e4-11e5-b10a-74d435d335fe','N','Atkinson','Rovan','SOC-A-0001024',NULL,NULL,NULL,NULL,2,2,5,'',4,'','M','0000-00-00','N',NULL,'1','2015-06-09 06:31:08','0000-00-00 00:00:00',1,NULL),
(26,'c08b4f92-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jennifer','SOC-AP-0000031',NULL,2147483647,778965125,1,2,4,91,'RT-2323123',1,'Jane','F','0000-00-00','N',NULL,'1','2015-06-12 04:58:08','0000-00-00 00:00:00',1,NULL),
(27,'c08b504d-14e4-11e5-b10a-74d435d335fe','Y','Mac','John','SOC-AP-0000032',NULL,NULL,NULL,1,NULL,NULL,NULL,'',1,'','M','0000-00-00','N',NULL,'1','2015-06-12 04:59:35','0000-00-00 00:00:00',1,NULL),
(28,'c08b9125-14e4-11e5-b10a-74d435d335fe','Y','Kiyosaki','Robert','SOC-AP-0000033',NULL,NULL,NULL,NULL,2,2,40,'',NULL,'','M','2015-06-29','Y','\\performeraccount\\767e4ee86cd5d5da2f6f8352019e20be.png','1','2015-06-12 04:59:39','0000-00-00 00:00:00',1,NULL),
(29,'c08b51bb-14e4-11e5-b10a-74d435d335fe','Y','P','Harry','SOC-AP-0000034',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','1995-10-24','Y',NULL,'1','2015-06-12 04:59:42','0000-00-00 00:00:00',1,NULL),
(30,'c08b526b-14e4-11e5-b10a-74d435d335fe','Y','Atkinson','Rovan','SOC-AP-0000035',NULL,NULL,NULL,NULL,2,2,5,'',4,'','M','0000-00-00','N',NULL,'1','2015-06-12 04:59:45','0000-00-00 00:00:00',1,NULL),
(31,'82C1D171-7291-E529-59C0-48E250A660EB','N','S','A','SOC-A-0001026',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-06-18 17:33:19','0000-00-00 00:00:00',1,NULL),
(50,'AA7EE8ED-4568-02AA-0F45-83D1FB5C24A2','N','Raj','Vincent','SOC-A-0001027',NULL,NULL,NULL,NULL,2,2,5,'',1,'','M','0000-00-00','Y','\\authoraccount\\857fca123331b7fbc7ea2c8157733e7d.png','1','2015-06-22 18:13:48','0000-00-00 00:00:00',1,NULL),
(54,'6170D906-040B-5C94-66C6-6BCC32E0CD1A','Y','Raj','Rajeshn','SOC-A-0001031',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-06-24 11:09:05','2015-10-05 15:07:11',1,10),
(55,'c08b8e9f-14e4-11e5-b10a-74d435d335fe','Y','Raison','Jeanne','SOC-AP-0000042',NULL,NULL,NULL,NULL,NULL,NULL,1,'',1,'','F','0000-00-00','N',NULL,'0','2015-06-24 11:56:08','0000-00-00 00:00:00',1,NULL),
(62,'03D3DE65-6C71-7B66-2496-661E7DF0050C','N','asddsas','aassdss','SOC-A-0001038',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-07-02 18:41:04','0000-00-00 00:00:00',1,1),
(63,'DAB9DAD7-BA7B-1710-B541-DF7DC0D8422E','N','new','new autth','SOC-A-0001050',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-08-20 13:28:59','0000-00-00 00:00:00',1,NULL),
(64,'B2611435-D987-C2E6-12BB-B3AEE0114665','Y','test','Test prakashte','SOC-AP-0000305',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','N',NULL,'1','2015-09-15 17:31:13','0000-00-00 00:00:00',10,10),
(73,'02D0B693-D369-F1C0-379C-313EA4586E9D','N','Test','Tester testrr','SOC-A-0001631',123321232,123232123,343434,NULL,2,2,5,'12332123',1,NULL,'M',NULL,'N',NULL,'1','2015-09-18 19:18:49','0000-00-00 00:00:00',10,NULL),
(74,'2D9E2F5A-BBF0-3C35-D92C-7B3138479D55','N','Test','Tester testee','SOC-A-0001632',123321232,123232123,343434,NULL,2,2,5,'12332123',1,NULL,'M',NULL,'N',NULL,'1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(103,'84EE8F85-CA16-841F-C8B2-951064055E94','N','Willy','Robins','SOC-A-0001661',88277372,88737277,-1920586043,NULL,2,2,5,'86557486',1,'Catherine','M','1975-01-20','N',NULL,'1','2015-10-03 15:47:47','0000-00-00 00:00:00',10,NULL),
(105,'0EB2C077-13DB-1940-68A0-7F1A71C4D172','N','Johnny Blaze','Mac','SOC-A-0001663',88277372,88737277,-1920586043,NULL,2,2,5,'86557486',1,'Tresa','M','1989-01-20','N',NULL,'1','2015-10-03 15:48:19','0000-00-00 00:00:00',10,NULL),
(112,'5CCC916E-4126-6530-F985-3BA366FEDA78','N','Henry','Robins','SOC-A-0001670',88277372,88737277,-1920586043,NULL,2,2,5,'86557486',1,'Catherine','M','1989-01-20','N',NULL,'1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(113,'89D08150-67E8-655E-A2C5-3CFB5C265CE9','N','Rio','Mac','SOC-A-0001671',88277372,88737277,-1920586043,NULL,2,2,5,'86557486',1,'Tresa','M','1989-01-20','N',NULL,'1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(114,'C0E256DA-F42B-BE2B-7B75-70B3E9F6708D','N','Samson','Robins','SOC-A-0001672',88277372,88737277,-1920586043,NULL,2,2,5,'86557486',1,'Catherine','M','1989-01-20','N',NULL,'1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(115,'BF2D0A19-4D70-6AE7-2B21-426AA1AAB699','N','testter','Test','SOC-A-0001673',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','Y',NULL,'1','2015-10-05 13:36:31','2015-10-05 13:37:52',10,10),
(116,'3B632384-34C1-55F6-4CCD-E3048D727FFF','N','auth','New auth','SOC-A-0001674',NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','0000-00-00','Y',NULL,'1','2015-10-05 16:39:01','2015-10-05 16:39:08',10,10);

/*Table structure for table `wipo_author_account_address` */

DROP TABLE IF EXISTS `wipo_author_account_address`;

CREATE TABLE `wipo_author_account_address` (
  `Auth_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Home_Address_1` text NOT NULL,
  `Auth_Home_Address_2` varchar(255) DEFAULT NULL,
  `Auth_Home_Address_3` varchar(255) DEFAULT NULL,
  `Auth_Home_Fax` varchar(25) DEFAULT NULL,
  `Auth_Home_Telephone` varchar(25) NOT NULL,
  `Auth_Home_Email` varchar(50) NOT NULL,
  `Auth_Home_Website` varchar(100) DEFAULT NULL,
  `Auth_Mailing_Address_1` text NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Auth_Addr_Id`),
  KEY `FK_wipo_author_account_address_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_account_address_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_account_address` */

insert  into `wipo_author_account_address`(`Auth_Addr_Id`,`Auth_Acc_Id`,`Auth_Home_Address_1`,`Auth_Home_Address_2`,`Auth_Home_Address_3`,`Auth_Home_Fax`,`Auth_Home_Telephone`,`Auth_Home_Email`,`Auth_Home_Website`,`Auth_Mailing_Address_1`,`Auth_Mailing_Address_2`,`Auth_Mailing_Address_3`,`Auth_Mailing_Telephone`,`Auth_Mailing_Fax`,`Auth_Mailing_Email`,`Auth_Mailing_Website`,`Auth_Author_Account_1`,`Auth_Author_Account_2`,`Auth_Author_Account_3`,`Auth_Performer_Account_1`,`Auth_Performer_Account_2`,`Auth_Performer_Account_3`,`Auth_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-03-28 21:07:13','0000-00-00 00:00:00',1,NULL),
(2,20,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','123213123','test@test.com','','','','','','','','Y','1','2015-06-04 05:03:40','0000-00-00 00:00:00',1,NULL),
(3,19,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-08 20:52:14','0000-00-00 00:00:00',1,NULL),
(4,26,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-12 04:58:08','0000-00-00 00:00:00',1,NULL),
(5,28,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-12 04:59:39','0000-00-00 00:00:00',1,NULL),
(10,28,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-22 13:20:42','0000-00-00 00:00:00',1,NULL),
(11,62,'Home address 111','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','Author Account 3','','','','Y','1','2015-07-02 19:07:20','0000-00-00 00:00:00',1,1),
(12,4,'Lorem ipsum dolor sit amet,\r\n consectetur adipiscing elit. \r\nSed porttitor quam sit,\r\n amet dui pellentesque\r\n','','','','1232313','test@test.com','','Lorem ipsum dolor sit amet,\r\n consectetur adipiscing elit. \r\nSed porttitor quam sit,\r\n amet dui pellentesque\r\n','','','1232313','123213123','test@test.com','','','','','','','','N','1','2015-07-03 11:33:57','2015-10-05 11:55:46',1,10),
(13,54,'Home address 111','','','','12323123','test@etst.com','','Mail address 1a','','','13123123','','test@etst.com','','','','','','','','Y','1','2015-07-03 12:04:24','2015-10-05 15:07:11',10,10),
(14,54,'Home address 111','','','','12323123','test@etst.com','','Mail address 1a','','','13123123','','test@etst.com','','','','','','','','Y','1','2015-08-14 12:28:18','0000-00-00 00:00:00',1,NULL),
(31,73,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-18 19:18:49','0000-00-00 00:00:00',10,NULL),
(32,74,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(52,103,'HOME ADDRESS',NULL,'nepal','15211548','9584484515','will@gmail.com','http://will.com','MAILING ADDRESS',NULL,NULL,'784515154','1542200125','will@gmail.com','http://will.com',NULL,NULL,NULL,NULL,NULL,NULL,'','1','2015-10-03 15:47:47','0000-00-00 00:00:00',10,NULL),
(54,105,'HOME ADDRESS',NULL,'nepal','15211548','9584484515','will@gmail.com','http://will.com','MAILING ADDRESS',NULL,NULL,'784515154','1542200125','will@gmail.com','http://will.com',NULL,NULL,NULL,NULL,NULL,NULL,'','1','2015-10-03 15:48:20','0000-00-00 00:00:00',10,NULL),
(61,112,'HOME ADDRESS',NULL,'nepal','15211548','9584484515','will@gmail.com','http://will.com','MAILING ADDRESS',NULL,NULL,'784515154','1542200125','will@gmail.com','http://will.com',NULL,NULL,NULL,NULL,NULL,NULL,'','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(62,113,'HOME ADDRESS',NULL,'nepal','15211548','9584484515','will@gmail.com','http://will.com','MAILING ADDRESS',NULL,NULL,'784515154','1542200125','will@gmail.com','http://will.com',NULL,NULL,NULL,NULL,NULL,NULL,'','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(63,114,'HOME ADDRESS',NULL,'nepal','15211548','9584484515','will@gmail.com','http://will.com','MAILING ADDRESS',NULL,NULL,'784515154','1542200125','will@gmail.com','http://will.com',NULL,NULL,NULL,NULL,NULL,NULL,'','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(64,54,'Home address 111','','','','12323123','test@etst.com','','Mail address 1a','','','13123123','','test@etst.com','','','','','','','','Y','1','2015-10-05 15:07:01','0000-00-00 00:00:00',10,10),
(65,54,'Home address 111','','','','12323123','test@etst.com','','Mail address 1a','','','13123123','','test@etst.com','','','','','','','','Y','1','2015-10-05 15:07:11','0000-00-00 00:00:00',10,10);

/*Table structure for table `wipo_author_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_author_biograph_uploads`;

CREATE TABLE `wipo_author_biograph_uploads` (
  `Auth_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Biogrph_Id` int(11) NOT NULL,
  `Auth_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Auth_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Auth_Biogrph_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_biography` (`Auth_Biogrph_Id`),
  CONSTRAINT `FK_wipo_author_biograph_uploads_biography` FOREIGN KEY (`Auth_Biogrph_Id`) REFERENCES `wipo_author_biography` (`Auth_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_biograph_uploads` */

insert  into `wipo_author_biograph_uploads`(`Auth_Biogrph_Upl_Id`,`Auth_Biogrph_Id`,`Auth_Biogrph_Upl_File`,`Auth_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,9,'\\authorbiographuploads\\d774a33344e77d06f5e98d339050b7a5.jpg',NULL,'2015-06-24 13:51:31','0000-00-00 00:00:00',1,NULL),
(2,9,'\\authorbiographuploads\\60901b0d54ae59d59d0f65f4d3a17e02.jpg',NULL,'2015-06-24 13:51:31','0000-00-00 00:00:00',1,NULL),
(3,9,'\\authorbiographuploads\\90c2e6de5d8d54266c06a6dd862f2e5a.png','test','2015-06-26 13:12:44','0000-00-00 00:00:00',1,NULL),
(4,9,'\\authorbiographuploads\\e25a61ba7c78a73973e4dab2cca03980.png','Group description','2015-06-26 13:13:35','0000-00-00 00:00:00',1,NULL),
(5,9,'\\authorbiographuploads\\5a6a9c07485a0f9e763d3f152cfe15af.png','Group description','2015-06-26 13:13:35','0000-00-00 00:00:00',1,NULL),
(6,10,'\\authorbiographuploads\\362c5c3b8eddaceb406818b944d35b4c.jpg','Test','2015-06-26 16:03:45','0000-00-00 00:00:00',1,NULL),
(7,9,'\\authorbiographuploads\\4d90c8cc82bfaf7e4f470c0c1958ade0.jpeg','test este','2015-07-03 11:38:51','0000-00-00 00:00:00',1,NULL),
(8,11,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(9,11,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(10,12,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(11,12,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(12,12,'\\performerbiographuploads\\c85718d44cf184cfb3e9490eff9d51cd.jpg','test','2015-07-03 12:05:06','0000-00-00 00:00:00',1,NULL),
(13,50,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',10,NULL),
(14,50,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',10,NULL),
(15,50,'\\performerbiographuploads\\c85718d44cf184cfb3e9490eff9d51cd.jpg','test','2015-07-03 12:05:06','0000-00-00 00:00:00',10,NULL),
(16,51,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',10,NULL),
(17,51,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',10,NULL),
(18,51,'\\performerbiographuploads\\c85718d44cf184cfb3e9490eff9d51cd.jpg','test','2015-07-03 12:05:06','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_author_biography` */

DROP TABLE IF EXISTS `wipo_author_biography`;

CREATE TABLE `wipo_author_biography` (
  `Auth_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Auth_Biogrph_Id`),
  KEY `FK_wipo_author_biography_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_biography_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_biography` */

insert  into `wipo_author_biography`(`Auth_Biogrph_Id`,`Auth_Acc_Id`,`Auth_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,'test','1','2015-04-01 23:24:06','0000-00-00 00:00:00',1,NULL),
(2,26,'test','1','2015-06-12 04:58:08','0000-00-00 00:00:00',1,NULL),
(3,3,'test','1','2015-06-23 12:08:50','0000-00-00 00:00:00',1,NULL),
(7,54,'test 22','1','2015-06-24 11:09:24','2015-10-05 15:07:11',10,10),
(8,55,'Test','1','2015-06-24 11:56:08','0000-00-00 00:00:00',1,NULL),
(9,4,'85151','1','2015-06-24 13:42:08','2015-10-05 17:59:19',1,10),
(10,28,'test','1','2015-06-26 16:03:44','0000-00-00 00:00:00',1,NULL),
(11,54,'test','1','2015-07-03 12:00:58','0000-00-00 00:00:00',1,NULL),
(12,54,'test 22','1','2015-08-14 12:28:19','0000-00-00 00:00:00',1,1),
(17,73,'test test','1','2015-09-18 19:18:49','0000-00-00 00:00:00',10,NULL),
(18,74,'test test','1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(38,103,'ANNOTATIONS','1','2015-10-03 15:47:47','0000-00-00 00:00:00',10,NULL),
(40,105,'ANNOTATIONS','1','2015-10-03 15:48:20','0000-00-00 00:00:00',10,NULL),
(47,112,'ANNOTATIONS','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(48,113,'ANNOTATIONS','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(49,114,'ANNOTATIONS','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(50,54,'test 22','1','2015-10-05 15:07:02','0000-00-00 00:00:00',10,1),
(51,54,'test 22','1','2015-10-05 15:07:11','0000-00-00 00:00:00',10,10);

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
  `Auth_Death_Inhrt_Decease_Date` date DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Death_Inhrt_Id`),
  KEY `FK_wipo_author_death_inheritance_account_id` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_death_inheritance_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_death_inheritance` */

insert  into `wipo_author_death_inheritance`(`Auth_Death_Inhrt_Id`,`Auth_Acc_Id`,`Auth_Death_Inhrt_Firstname`,`Auth_Death_Inhrt_Surname`,`Auth_Death_Inhrt_Email`,`Auth_Death_Inhrt_Phone`,`Auth_Death_Inhrt_Address_1`,`Auth_Death_Inhrt_Address_2`,`Auth_Death_Inhrt_Address_3`,`Auth_Death_Inhrt_Addtion_Annotation`,`Auth_Death_Inhrt_Decease_Date`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(1,2,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(2,3,'','Test','','','test','test','test','test',NULL,1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(3,26,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(4,27,'','Test','','','test','test','test','test',NULL,1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(5,4,'Test','Test','test@test.com','12323123123','Address 11','Address 2','Address 33','','2013-05-29',1,10,'2015-07-01 01:00:00','2015-10-05 11:51:50'),
(6,54,'test','Surr','test@etead.com','test','test','test','test','','2013-02-14',10,10,'2015-07-01 01:00:00','2015-10-05 15:07:12'),
(7,54,'test','Surr','test@etead.com','test','test','test','test','',NULL,1,NULL,'2015-08-14 12:28:19','0000-00-00 00:00:00'),
(12,73,'','test death','','','12331 213','','','123321',NULL,10,NULL,'2015-09-18 19:18:50','0000-00-00 00:00:00'),
(13,74,'','test death','','','12331 213','','','123321',NULL,10,NULL,'2015-09-18 19:18:50','0000-00-00 00:00:00'),
(33,103,'','Jacob','','','ADDRESS','','','Annotation',NULL,10,NULL,'2015-10-03 15:47:48','0000-00-00 00:00:00'),
(35,105,'','Ibrahim','','','ADDRESS','','','Annotation',NULL,10,NULL,'2015-10-03 15:48:21','0000-00-00 00:00:00'),
(42,112,'','Jacob','','','ADDRESS','','','Annotation',NULL,10,NULL,'2015-10-03 17:07:50','0000-00-00 00:00:00'),
(43,113,'','Ibrahim','','','ADDRESS','','','Annotation',NULL,10,NULL,'2015-10-03 17:07:51','0000-00-00 00:00:00'),
(44,114,'','Jacob','','','ADDRESS','','','Annotation',NULL,10,NULL,'2015-10-03 17:07:52','0000-00-00 00:00:00'),
(45,54,'test','Surr','test@etead.com','test','test','test','test','','2013-02-14',10,10,'2015-10-05 15:07:02','0000-00-00 00:00:00'),
(46,54,'test','Surr','test@etead.com','test','test','test','test','','2013-02-14',10,10,'2015-10-05 15:07:12','0000-00-00 00:00:00');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_manage_rights` */

insert  into `wipo_author_manage_rights`(`Auth_Mnge_Rgt_Id`,`Auth_Acc_Id`,`Auth_Mnge_Society_Id`,`Auth_Mnge_Entry_Date`,`Auth_Mnge_Exit_Date`,`Auth_Mnge_Internal_Position_Id`,`Auth_Mnge_Entry_Date_2`,`Auth_Mnge_Exit_Date_2`,`Auth_Mnge_Region_Id`,`Auth_Mnge_Profession_Id`,`Auth_Mnge_File`,`Auth_Mnge_Duration`,`Auth_Mnge_Avl_Work_Cat_Id`,`Auth_Mnge_Type_Rght_Id`,`Auth_Mnge_Managed_Rights_Id`,`Auth_Mnge_Territories_Id`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(1,2,10,'2015-03-01','2015-04-01',1,'2015-03-01','2015-03-31',NULL,1,'test','50',1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(2,3,10,'2015-03-26','2015-03-27',1,'2015-03-26','2015-03-27',3,1,'rack','50',1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(3,7,10,'2009-02-03','2015-12-31',1,'2010-02-16','2015-12-31',NULL,NULL,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(4,8,10,'2015-04-09','2015-12-31',1,'2015-04-09','2015-12-31',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(5,9,10,'2015-04-09','2015-12-31',1,'2015-04-09','2015-11-30',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(6,10,10,'2015-04-10','2015-12-31',1,'2015-04-09','2015-04-09',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(7,11,10,'2015-04-09','2015-10-31',3,'2015-04-09','2015-04-09',1,5,'',NULL,1,1,1,9,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(8,12,10,'2010-02-14','2015-12-31',1,'2015-04-09','2015-04-09',NULL,2,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(9,13,10,'2015-04-09','2015-04-09',1,'2015-04-09','2015-04-09',NULL,NULL,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(10,15,10,'2015-04-09','0000-00-00',1,'2015-04-09','2015-04-09',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(11,16,10,'2015-04-30','0000-00-00',1,'2015-04-30','2015-04-09',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(12,17,10,'2015-04-19','0000-00-00',1,'2015-04-19','2015-04-19',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(13,18,10,'2015-04-21','0000-00-00',1,'2015-04-21','2015-04-21',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(14,19,10,'2015-05-12','2015-06-30',1,'2015-05-12','2015-06-30',1,1,'',NULL,1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(15,21,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(16,24,11,'2015-06-08','0000-00-00',6,'2015-06-08','0000-00-00',3,2,'',NULL,1,1,1,9,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(17,25,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',NULL,NULL,'',NULL,1,1,1,9,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(18,26,10,'2015-06-23','0000-00-00',6,'2015-06-23','0000-00-00',NULL,2,'','',1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(21,4,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,2,'','',1,5,1,8,NULL,10,'2015-07-01 01:00:00','2015-10-05 13:36:09'),
(22,55,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,2,'','',1,1,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(23,62,10,'2015-07-02','0000-00-00',6,'2015-07-02','0000-00-00',NULL,2,'','',1,5,1,8,NULL,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(28,73,11,'2016-01-01','2016-01-01',6,'2015-01-01','2016-01-01',1,2,'12312123',NULL,1,1,5,109,10,NULL,'2015-09-18 19:18:50','0000-00-00 00:00:00'),
(29,74,11,'2015-01-01','2016-01-01',6,'2015-01-01','2016-01-01',1,2,'12312123',NULL,1,1,5,109,10,NULL,'2015-09-18 19:18:50','0000-00-00 00:00:00'),
(35,103,10,'2015-05-01','2016-05-01',6,'2015-05-01','2016-05-01',1,2,'FILE',NULL,1,1,1,8,10,NULL,'2015-10-03 15:47:47','0000-00-00 00:00:00'),
(37,105,10,'2015-05-01','2016-05-01',6,'2015-05-01','2016-05-01',1,2,'FILE',NULL,1,1,1,8,10,NULL,'2015-10-03 15:48:20','0000-00-00 00:00:00'),
(44,112,10,'2015-05-01','2016-05-01',6,'2015-05-01','2016-05-01',1,2,'FILE',NULL,1,1,1,8,10,NULL,'2015-10-03 17:07:50','0000-00-00 00:00:00'),
(45,113,10,'2015-05-01','2016-05-01',6,'2015-05-01','2016-05-01',1,2,'FILE',NULL,1,1,1,8,10,NULL,'2015-10-03 17:07:51','0000-00-00 00:00:00'),
(46,114,10,'2015-05-01','2016-05-01',6,'2015-05-01','2016-05-01',1,2,'FILE',NULL,1,1,1,8,10,NULL,'2015-10-03 17:07:51','0000-00-00 00:00:00'),
(47,115,14,'2015-10-05','0000-00-00',6,'2015-10-05','0000-00-00',1,2,'','',1,5,1,8,10,10,'2015-10-05 13:36:39','2015-10-05 13:37:52'),
(48,54,14,'2015-10-05','0000-00-00',6,'2015-10-05','0000-00-00',1,2,'','',1,5,1,8,10,10,'2015-10-05 14:57:11','2015-10-05 15:05:10'),
(49,116,14,'2015-10-05','0000-00-00',6,'2015-10-05','0000-00-00',1,2,'','',1,5,1,8,10,NULL,'2015-10-05 16:39:08','0000-00-00 00:00:00');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Auth_Pay_Id`),
  KEY `FK_wipo_author_payment_method_account_id` (`Auth_Acc_Id`),
  KEY `FK_wipo_author_payment_method_payment_mode` (`Auth_Pay_Method_id`),
  CONSTRAINT `FK_wipo_author_payment_method_account_id` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_payment_method_payment_mode` FOREIGN KEY (`Auth_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_payment_method` */

insert  into `wipo_author_payment_method`(`Auth_Pay_Id`,`Auth_Acc_Id`,`Auth_Pay_Method_id`,`Auth_Bank_Account_1`,`Auth_Bank_Account_2`,`Auth_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-03-28 21:46:08','0000-00-00 00:00:00',1,NULL),
(2,19,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-08 20:52:28','0000-00-00 00:00:00',1,NULL),
(3,26,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-12 04:58:08','0000-00-00 00:00:00',1,NULL),
(4,28,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-12 04:59:39','0000-00-00 00:00:00',1,NULL),
(7,28,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-22 13:20:42','0000-00-00 00:00:00',1,NULL),
(8,4,1,'Bank  Account 11','Bank  Account 2','Bank  Account 3','1','2015-07-03 11:36:43','0000-00-00 00:00:00',1,NULL),
(9,54,2,'test','Bank  Account 21','Bank  Account 3','1','2015-07-03 12:04:46','2015-10-05 15:07:11',10,10),
(10,54,2,'test','Bank  Account 21','Bank  Account 3','1','2015-08-14 12:28:19','0000-00-00 00:00:00',1,NULL),
(15,73,2,'123231','123231','12323','1','2015-09-18 19:18:49','0000-00-00 00:00:00',10,NULL),
(16,74,2,'123231','123231','12323','1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(36,103,1,'BANK ACCOUNT 1','BANK ACCOUNT 2','BANK ACCOUNT 3','1','2015-10-03 15:47:47','0000-00-00 00:00:00',10,NULL),
(38,105,1,'BANK ACCOUNT 1','BANK ACCOUNT 2','BANK ACCOUNT 3','1','2015-10-03 15:48:20','0000-00-00 00:00:00',10,NULL),
(45,112,1,'BANK ACCOUNT 1','BANK ACCOUNT 2','BANK ACCOUNT 3','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(46,113,1,'BANK ACCOUNT 1','BANK ACCOUNT 2','BANK ACCOUNT 3','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(47,114,1,'BANK ACCOUNT 1','BANK ACCOUNT 2','BANK ACCOUNT 3','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(48,54,2,'test','Bank  Account 21','Bank  Account 3','1','2015-10-05 15:07:02','0000-00-00 00:00:00',10,1),
(49,54,2,'test','Bank  Account 21','Bank  Account 3','1','2015-10-05 15:07:11','0000-00-00 00:00:00',10,10);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Auth_Pseudo_Id`),
  KEY `FK_wipo_author_pseudonym_pseodo_type` (`Auth_Pseudo_Type_Id`),
  KEY `FK_wipo_author_pseudonym_author_account` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_pseudonym_author_account` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_author_pseudonym_pseodo_type` FOREIGN KEY (`Auth_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_pseudonym` */

insert  into `wipo_author_pseudonym`(`Auth_Pseudo_Id`,`Auth_Acc_Id`,`Auth_Pseudo_Type_Id`,`Auth_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,1,'Jack','1','2015-03-28 22:16:01','0000-00-00 00:00:00',1,NULL),
(2,7,1,'SAG','1','2015-04-11 09:18:47','0000-00-00 00:00:00',1,NULL),
(3,21,11,'PSH','1','2015-06-08 20:18:01','0000-00-00 00:00:00',1,NULL),
(4,26,1,'Jack','1','2015-06-12 04:58:08','0000-00-00 00:00:00',1,NULL),
(5,4,9,'OR','1','2015-07-03 11:36:54','0000-00-00 00:00:00',1,NULL),
(6,54,11,'PSH','1','2015-07-03 12:05:21','2015-10-05 15:07:12',10,10),
(7,54,11,'PSH','1','2015-08-14 12:28:19','0000-00-00 00:00:00',1,NULL),
(12,73,9,'OR','1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(13,74,9,'OR','1','2015-09-18 19:18:50','0000-00-00 00:00:00',10,NULL),
(33,103,9,'MO','1','2015-10-03 15:47:47','0000-00-00 00:00:00',10,NULL),
(35,105,9,'MO','1','2015-10-03 15:48:20','0000-00-00 00:00:00',10,NULL),
(42,112,9,'MO','1','2015-10-03 17:07:50','0000-00-00 00:00:00',10,NULL),
(43,113,9,'MO','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(44,114,9,'MO','1','2015-10-03 17:07:51','0000-00-00 00:00:00',10,NULL),
(45,54,11,'PSH','1','2015-10-05 15:07:02','0000-00-00 00:00:00',10,1),
(46,54,11,'PSH','1','2015-10-05 15:07:11','0000-00-00 00:00:00',10,10);

/*Table structure for table `wipo_author_upload` */

DROP TABLE IF EXISTS `wipo_author_upload`;

CREATE TABLE `wipo_author_upload` (
  `Auth_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Auth_Acc_Id` int(11) NOT NULL,
  `Auth_Upl_Doc_Name` varchar(255) NOT NULL,
  `Auth_Upl_File` varchar(1000) NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Auth_Upl_Id`),
  KEY `FK_wipo_author_upload_auth` (`Auth_Acc_Id`),
  CONSTRAINT `FK_wipo_author_upload_auth` FOREIGN KEY (`Auth_Acc_Id`) REFERENCES `wipo_author_account` (`Auth_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_author_upload` */

insert  into `wipo_author_upload`(`Auth_Upl_Id`,`Auth_Acc_Id`,`Auth_Upl_Doc_Name`,`Auth_Upl_File`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(10,2,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(12,20,'Performer upload','/performerupload/4d7140575e4c0daafd308890d69f11bf.txt',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(13,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(14,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(15,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(16,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(17,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(18,26,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(19,3,'test 12','\\authorupload\\13b11390f2c56e137b6713628e74670b.sql',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(22,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',10,10,'2015-07-01 01:00:00','2015-10-05 15:07:12'),
(23,4,'test2','\\authorupload\\a86614f0e88eded5e404c7273c3bc8f5.jpg',1,1,'2015-07-01 01:00:00','2015-07-28 09:27:58'),
(24,4,'test','\\authorupload\\7ccc68e859a484b7faba74a8d45bb469.jpeg',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(25,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',1,NULL,'2015-07-01 01:00:00','0000-00-00 00:00:00'),
(26,54,'test','/performerupload/9c16f2b2ce1f24ea7cdd3dd9f67cdd8a.png',10,10,'2015-07-28 13:13:53','2015-10-05 15:07:12'),
(27,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',1,1,'2015-08-14 12:28:19','0000-00-00 00:00:00'),
(28,54,'test','/performerupload/9c16f2b2ce1f24ea7cdd3dd9f67cdd8a.png',1,NULL,'2015-08-14 12:28:19','0000-00-00 00:00:00'),
(29,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',10,1,'2015-10-05 15:07:02','0000-00-00 00:00:00'),
(30,54,'test','/performerupload/9c16f2b2ce1f24ea7cdd3dd9f67cdd8a.png',10,1,'2015-10-05 15:07:02','0000-00-00 00:00:00'),
(31,54,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',10,10,'2015-10-05 15:07:12','0000-00-00 00:00:00'),
(32,54,'test','/performerupload/9c16f2b2ce1f24ea7cdd3dd9f67cdd8a.png',10,10,'2015-10-05 15:07:12','0000-00-00 00:00:00');

/*Table structure for table `wipo_contract_invoice` */

DROP TABLE IF EXISTS `wipo_contract_invoice`;

CREATE TABLE `wipo_contract_invoice` (
  `Inv_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Inv_Invoice` varchar(50) NOT NULL,
  `Inv_Date` date NOT NULL,
  `Tarf_Cont_Id` int(11) NOT NULL,
  `Inv_Repeat_Id` mediumint(9) DEFAULT NULL COMMENT 'Not needed. Not used',
  `Inv_Repeat_Count` smallint(6) DEFAULT NULL,
  `Inv_Next_Date` date DEFAULT NULL,
  `Inv_Amount` decimal(10,2) DEFAULT NULL,
  `Inv_Created_Type` enum('A','M') DEFAULT 'M' COMMENT 'A -> Automatic, M -> Manual',
  `Inv_Created_Mode` enum('C','B') DEFAULT 'C' COMMENT 'C -> Current, B -> Back Date',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Inv_Id`),
  UNIQUE KEY `invoiceUnique` (`Inv_Invoice`),
  KEY `FK_wipo_contract_invoice_tarif` (`Tarf_Cont_Id`),
  CONSTRAINT `FK_wipo_contract_invoice_tarif` FOREIGN KEY (`Tarf_Cont_Id`) REFERENCES `wipo_tariff_contracts` (`Tarf_Cont_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_contract_invoice` */

/*Table structure for table `wipo_customer_user` */

DROP TABLE IF EXISTS `wipo_customer_user`;

CREATE TABLE `wipo_customer_user` (
  `User_Cust_Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Cust_GUID` varchar(40) NOT NULL,
  `User_Cust_Internal_Code` varchar(50) NOT NULL,
  `User_Cust_Place_Id` int(11) NOT NULL,
  `User_Cust_Code` varchar(50) NOT NULL,
  `User_Cust_Name` varchar(100) NOT NULL,
  `User_Cust_Address` varchar(255) DEFAULT NULL,
  `User_Cust_Email` varchar(100) DEFAULT NULL,
  `User_Cust_Telephone` varchar(50) DEFAULT NULL,
  `User_Cust_Website` varchar(100) DEFAULT NULL,
  `User_Cust_Fax` varchar(50) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_Cust_Id`),
  UNIQUE KEY `NewIndex1` (`User_Cust_Internal_Code`),
  KEY `FK_wipo_customer_user` (`User_Cust_Place_Id`),
  CONSTRAINT `FK_wipo_customer_user` FOREIGN KEY (`User_Cust_Place_Id`) REFERENCES `wipo_master_place` (`Master_Place_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_customer_user` */

insert  into `wipo_customer_user`(`User_Cust_Id`,`User_Cust_GUID`,`User_Cust_Internal_Code`,`User_Cust_Place_Id`,`User_Cust_Code`,`User_Cust_Name`,`User_Cust_Address`,`User_Cust_Email`,`User_Cust_Telephone`,`User_Cust_Website`,`User_Cust_Fax`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'535AF15C-45BD-8782-3D01-4DD2E9D27128','SOC-U-0000001',1,'FULG','FULBARI F.M. 100.6 MHZ (#9104)','GALARIYA, BARADIYA','softwaretesterid@gmail.com','61515-154-15','http://www.google.com','55481-154-154','2015-07-22 19:25:22','2015-08-01 10:54:45',1,1),
(2,'5739FF2A-6B2D-9DC2-CDDE-7C210B4DC417','SOC-U-0000002',1,'TH','Television','','softwaretesterid@gmail.com','','','','2015-08-05 12:12:14','2015-08-05 12:25:56',1,1);

/*Table structure for table `wipo_distribution_class` */

DROP TABLE IF EXISTS `wipo_distribution_class`;

CREATE TABLE `wipo_distribution_class` (
  `Class_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_Internal_Code` varchar(50) NOT NULL,
  `Main_Class_Id` int(11) NOT NULL,
  `Class_Code` varchar(30) NOT NULL,
  `Class_Name` varchar(50) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Class_Id`),
  KEY `FK_wipo_distribution_class_main_class` (`Main_Class_Id`),
  CONSTRAINT `FK_wipo_distribution_class_main_class` FOREIGN KEY (`Main_Class_Id`) REFERENCES `wipo_distribution_main_class` (`Main_Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_distribution_class` */

insert  into `wipo_distribution_class`(`Class_Id`,`Class_Internal_Code`,`Main_Class_Id`,`Class_Code`,`Class_Name`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'SOC-CLS-0000001',1,'PR','Private Radios','2015-09-02 16:59:08','0000-00-00 00:00:00',10,NULL),
(2,'SOC-CLS-0000002',2,'PTV','Private Television Stations','2015-09-02 16:59:52','2015-09-21 16:25:49',10,10),
(3,'SOC-CLS-0000003',3,'PUR','Public Radios','2015-09-02 17:02:30','0000-00-00 00:00:00',10,NULL),
(4,'SOC-CLS-0000004',4,'PUV','Public Television Stations','2015-09-02 17:02:53','0000-00-00 00:00:00',10,NULL),
(5,'SOC-CLS-0000005',5,'REV','Religious Television Stations','2015-09-02 17:03:13','0000-00-00 00:00:00',10,NULL),
(6,'SOC-CLS-0000006',6,'FC','Foriegn Concerts','2015-09-02 18:27:04','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_distribution_main_class` */

DROP TABLE IF EXISTS `wipo_distribution_main_class`;

CREATE TABLE `wipo_distribution_main_class` (
  `Main_Class_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Main_Class_Name` varchar(50) NOT NULL,
  `Main_Class_Code` varchar(25) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Main_Class_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_distribution_main_class` */

insert  into `wipo_distribution_main_class`(`Main_Class_Id`,`Main_Class_Name`,`Main_Class_Code`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'BIG CONCERTS','','1','2015-09-21 16:03:10','0000-00-00 00:00:00',NULL,NULL),
(2,'CINEMAS (MOVIES)','','1','2015-09-21 16:10:31','0000-00-00 00:00:00',NULL,NULL),
(3,'CINEMATOGRAPHIC PROJECTION','','1','2015-09-21 16:11:10','0000-00-00 00:00:00',NULL,NULL),
(4,'COPYRIGHT BLANK TAPE LEVY','','1','2015-09-21 16:11:28','0000-00-00 00:00:00',NULL,NULL),
(5,'COPYRIGHT REPRODUCTION PER ALBUM / LICENSE','','1','2015-09-21 16:12:02','0000-00-00 00:00:00',NULL,NULL),
(6,'EQUITABLE REMUNERATION','','1','2015-09-21 16:12:32','0000-00-00 00:00:00',NULL,NULL),
(7,'EQUITABLE REMUNERATION BLANK TAPE LEVY','','1','2015-09-21 16:12:48','0000-00-00 00:00:00',NULL,NULL),
(8,'GENERAL RIGHTS','','1','2015-09-21 16:13:00','0000-00-00 00:00:00',NULL,NULL),
(9,'INTEGRAL BLANK TAPE CLASS','','1','2015-09-21 16:13:14','0000-00-00 00:00:00',NULL,NULL),
(10,'MECHANICAL REPRODUCTION','','1','2015-09-21 16:13:27','0000-00-00 00:00:00',NULL,NULL),
(11,'MUSIC OF FILM','','1','2015-09-21 16:13:39','0000-00-00 00:00:00',NULL,NULL),
(12,'NEIGHBORING RIGHTS BLANK TAPE LEVY ','','1','2015-09-21 16:14:11','0000-00-00 00:00:00',NULL,NULL),
(13,'NEIGHBORING RIGHTS REPRODUCTION PER ALBUM/LICENSE','','1','2015-09-21 16:14:38','0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `wipo_distribution_setting` */

DROP TABLE IF EXISTS `wipo_distribution_setting`;

CREATE TABLE `wipo_distribution_setting` (
  `Setting_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Setting_Internal_Code` varchar(50) NOT NULL,
  `Setting_Identifier` smallint(6) NOT NULL,
  `Setting_Date` date NOT NULL,
  `Total_Distribute` decimal(10,2) DEFAULT '0.00',
  `Closing_Distribute` tinyint(4) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Setting_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_distribution_setting` */

insert  into `wipo_distribution_setting`(`Setting_Id`,`Setting_Internal_Code`,`Setting_Identifier`,`Setting_Date`,`Total_Distribute`,`Closing_Distribute`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,'SOC-DDI-0000001',1,'2015-09-23','0.00',NULL,'2015-09-03 11:17:21','0000-00-00 00:00:00',15,NULL);

/*Table structure for table `wipo_distribution_subclass` */

DROP TABLE IF EXISTS `wipo_distribution_subclass`;

CREATE TABLE `wipo_distribution_subclass` (
  `Subclass_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_Id` int(11) NOT NULL,
  `Subclass_Internal_Code` varchar(50) NOT NULL,
  `Subclass_Code` varchar(30) NOT NULL,
  `Subclass_Name` varchar(50) NOT NULL,
  `Subclass_Measure_Unit` enum('D','F') NOT NULL DEFAULT 'D',
  `Subclass_Calc_Unit` enum('S','I','G') NOT NULL DEFAULT 'S',
  `Subclass_Dist_Params` enum('C','G') NOT NULL DEFAULT 'C',
  `Subclass_Admin_Cost` decimal(10,2) DEFAULT NULL,
  `Subclass_Social_Deduct` decimal(10,2) DEFAULT NULL,
  `Subclass_Cultural_Deduct` decimal(10,2) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Subclass_Id`),
  KEY `FK_wipo_subclass_class` (`Class_Id`),
  CONSTRAINT `FK_wipo_subclass_class` FOREIGN KEY (`Class_Id`) REFERENCES `wipo_distribution_class` (`Class_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_distribution_subclass` */

insert  into `wipo_distribution_subclass`(`Subclass_Id`,`Class_Id`,`Subclass_Internal_Code`,`Subclass_Code`,`Subclass_Name`,`Subclass_Measure_Unit`,`Subclass_Calc_Unit`,`Subclass_Dist_Params`,`Subclass_Admin_Cost`,`Subclass_Social_Deduct`,`Subclass_Cultural_Deduct`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,6,'SOC-SCL-0000001','AC','Asian Concerts','D','G','G','10.00','10.00','10.00','2015-09-02 18:29:17','2015-09-02 18:29:29',10,10);

/*Table structure for table `wipo_distribution_utlization_period` */

DROP TABLE IF EXISTS `wipo_distribution_utlization_period`;

CREATE TABLE `wipo_distribution_utlization_period` (
  `Period_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Period_Internal_Code` varchar(50) NOT NULL,
  `Period_Year` year(4) NOT NULL,
  `Period_Number` smallint(6) NOT NULL,
  `Period_From` date NOT NULL,
  `Period_To` date NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Setting_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Period_Id`),
  KEY `FK_wipo_utlization_period_setting` (`Setting_Id`),
  KEY `FK_wipo_utlization_period_class` (`Class_Id`),
  CONSTRAINT `FK_wipo_utlization_period_class` FOREIGN KEY (`Class_Id`) REFERENCES `wipo_distribution_class` (`Class_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_utlization_period_setting` FOREIGN KEY (`Setting_Id`) REFERENCES `wipo_distribution_setting` (`Setting_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_distribution_utlization_period` */

insert  into `wipo_distribution_utlization_period`(`Period_Id`,`Period_Internal_Code`,`Period_Year`,`Period_Number`,`Period_From`,`Period_To`,`Class_Id`,`Setting_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'DOC-UPD-0000001',2015,1,'2015-09-01','2015-09-30',2,2,'2015-09-03 11:45:06','0000-00-00 00:00:00',15,NULL),
(2,'DOC-UPD-0000002',2015,21312,'2015-09-01','2015-09-30',3,2,'2015-09-28 12:37:30','2015-09-28 12:38:55',10,10);

/*Table structure for table `wipo_email_template` */

DROP TABLE IF EXISTS `wipo_email_template`;

CREATE TABLE `wipo_email_template` (
  `Email_Temp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email_Temp_Name` varchar(100) NOT NULL,
  `Email_Temp_Username` varchar(50) DEFAULT NULL,
  `Email_Temp_From` varchar(50) DEFAULT NULL,
  `Email_Temp_ReplyTo` varchar(50) DEFAULT NULL,
  `Email_Temp_Subject` varchar(100) NOT NULL,
  `Email_Temp_Content` text NOT NULL,
  `Email_Temp_Params` text,
  `Tarf_Cont_Id` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Email_Temp_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_email_template` */

insert  into `wipo_email_template`(`Email_Temp_Id`,`Email_Temp_Name`,`Email_Temp_Username`,`Email_Temp_From`,`Email_Temp_ReplyTo`,`Email_Temp_Subject`,`Email_Temp_Content`,`Email_Temp_Params`,`Tarf_Cont_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(10,'FULBARI F.M. 100.6 MHZ (#9104)',NULL,'softwareid@gmail.com','softwareid@gmail.com','{CURRENT_MONTH} Invoice {INVOICE_NO} From {SOCIETY_NAME}','<title>{SITENAME}</title>\r\n        <meta charset=\"UTF-8\">\r\n        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n        <style>\r\n            body{\r\n                color: #333;\r\n                font-family: \"Helvetica Neue\",Helvetica,Arial,sans-serif;\r\n                font-size: 14px;\r\n                line-height: 1.42857;\r\n            }\r\n        </style>\r\n    \r\n        <div class=\"content invoice\" style=\"float: left;padding: 0px;background: none repeat scroll 0 0 #f9f9f9; width: 100%\">\r\n            <div class=\"row\" style=\"margin-right: -15px;margin-left: -15px;\">\r\n                <div class=\"col-xs-12\" style=\"float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;\">\r\n                    <h2 class=\"page-header\" style=\"padding-bottom: 9px;border-bottom: 1px solid #eee;\">\r\n                        {LOGO} {SITENAME}\r\n                        <small style=\"float: right; font-size: 12px; color:#777\">Date: {GEN_DATE}</small>\r\n                    </h2>\r\n                </div>\r\n            </div>\r\n            <div class=\"row invoice-info\" style=\"margin-right: -15px; margin-left: -15px;\">\r\n                <div class=\"col-sm-12\" style=\"width: 100%; min-height: 1px; padding-left: 15px; padding-right: 15px; position: relative; float: left;\">\r\n                    <p style=\"font-weight: normal; font-size: 13px; line-height: 20px;\">Hi {CUSTOMER_NAME},</p>\r\n                    <p style=\"font-weight: normal; font-size: 13px; line-height: 20px;\">Here is your {CURRENT_MONTH} invoice {INVOICE_NO} for {INVOICE_AMOUNT}</p>\r\n                    <p style=\"font-size: 13px; line-height: 20px;\">If you have any question please let us know.</p>\r\n                </div>\r\n            </div>\r\n            <div class=\"clearfix\" style=\"font-weight: normal; clear: both;\"></div>\r\n\r\n            <div class=\"row\" style=\"margin-right: -15px;margin-left: -15px;\">\r\n                <div class=\"col-xs-12\" style=\"float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative; margin-top: 1px solid #eee;\">\r\n                    <p style=\"font-size: 13px; line-height: 20px;\">Thanks, <br>{SITENAME}</p>\r\n                </div>\r\n            </div>\r\n        </div>','CONTRACT_NO,CONTRACT_DURATION,CUSTOMER_NAME,CUST_ADDRESS,CUST_PHONE,CUST_FAX,CUST_WEBSITE,CUST_EMAIL,CURRENT_MONTH,INVOICE_NO,INVOICE_AMOUNT,SOCIETY_NAME,TAR_CITY,TAR_DISTRICT,TAR_AREA,TAR_TARIF_CODE,TAR_INSP,TAR_BALANCE,TAR_TYPE,TAR_EVE_DATE,TAR_EVE_COMMENT,TAR_TO_PAY,TAR_FROM,TAR_TO,TAR_SIGN,TAR_PAYMENT,TAR_PORTION,TAR_ROY_COMMENT',31,'2015-09-23 19:28:57','0000-00-00 00:00:00',10,NULL),
(11,'FULBARI F.M. 100.6 MHZ (#9104) qq',NULL,'softwareid@gmail.come','softwareid@gmail.com','{CURRENT_MONTH} Invoice {INVOICE_NO} From {SOCIETY_NAME} we','<title>{SITENAME}</title>\r\n        <meta charset=\"UTF-8\">\r\n        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n        <style>\r\n            body{\r\n                color: #333;\r\n                font-family: \"Helvetica Neue\",Helvetica,Arial,sans-serif;\r\n                font-size: 14px;\r\n                line-height: 1.42857;\r\n            }\r\n        </style>\r\n    \r\n        <div class=\"content invoice\" style=\"float: left;padding: 0px;background: none repeat scroll 0 0 #f9f9f9; width: 100%\">\r\n            <div class=\"row\" style=\"margin-right: -15px;margin-left: -15px;\">\r\n                <div class=\"col-xs-12\" style=\"float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative;\">\r\n                    <h2 class=\"page-header\" style=\"padding-bottom: 9px;border-bottom: 1px solid #eee;\">\r\n                        {LOGO} {SITENAME}\r\n                        <small style=\"float: right; font-size: 12px; color:#777\">Date: {GEN_DATE}</small>\r\n                    </h2>\r\n                </div>\r\n            </div>\r\n            <div class=\"row invoice-info\" style=\"margin-right: -15px; margin-left: -15px;\">\r\n                <div class=\"col-sm-12\" style=\"width: 100%; min-height: 1px; padding-left: 15px; padding-right: 15px; position: relative; float: left;\">\r\n                    <p style=\"font-weight: normal; font-size: 13px; line-height: 20px;\">Hi {CUSTOMER_NAME},</p>\r\n                    <p style=\"font-weight: normal; font-size: 13px; line-height: 20px;\">Here is your {CURRENT_MONTH} invoice {INVOICE_NO} for {INVOICE_AMOUNT}</p>\r\n                    <p style=\"font-size: 13px; line-height: 20px;\">If you have any question please let us know. we we<br></p>\r\n                </div>\r\n            </div>\r\n            <div class=\"clearfix\" style=\"font-weight: normal; clear: both;\"></div>\r\n\r\n            <div class=\"row\" style=\"margin-right: -15px;margin-left: -15px;\">\r\n                <div class=\"col-xs-12\" style=\"float: left;width: 95%;min-height: 1px;padding-left: 15px;padding-right: 15px;position: relative; margin-top: 1px solid #eee;\">\r\n                    <p style=\"font-size: 13px; line-height: 20px;\">Thanks, <br>{SITENAME}</p>\r\n                </div>\r\n            </div>\r\n        </div>','CONTRACT_NO,CONTRACT_DURATION,CUSTOMER_NAME,CUST_ADDRESS,CUST_PHONE,CUST_FAX,CUST_WEBSITE,CUST_EMAIL,CURRENT_MONTH,INVOICE_NO,INVOICE_AMOUNT,SOCIETY_NAME,TAR_CITY,TAR_DISTRICT,TAR_AREA,TAR_TARIF_CODE,TAR_INSP,TAR_BALANCE,TAR_TYPE,TAR_EVE_DATE,TAR_EVE_COMMENT,TAR_TO_PAY,TAR_FROM,TAR_TO,TAR_SIGN,TAR_PAYMENT,TAR_PORTION,TAR_ROY_COMMENT',32,'2015-09-24 10:42:23','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Id`),
  UNIQUE KEY `Group_GUID_unique` (`Group_GUID`),
  KEY `FK_wipo_group_country` (`Group_Country_Id`),
  KEY `FK_wipo_group_language` (`Group_Language_Id`),
  KEY `FK_wipo_group_legal_form` (`Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_group_country` FOREIGN KEY (`Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_language` FOREIGN KEY (`Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_legal_form` FOREIGN KEY (`Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group` */

insert  into `wipo_group`(`Group_Id`,`Group_GUID`,`Group_Name`,`Group_Is_Author`,`Group_Is_Performer`,`Group_Internal_Code`,`Group_IPI_Name_Number`,`Group_IPN_Base_Number`,`Group_IPN_Number`,`Group_Date`,`Group_Place`,`Group_Country_Id`,`Group_Legal_Form_Id`,`Group_Language_Id`,`Group_Non_Member`,`Group_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'c097356a-14e4-11e5-b10a-74d435d335fe','Author Group 2','1','0','SOC-GA-0001001',NULL,NULL,89758451,'2015-02-01','',2,1,1,'N',NULL,'1','2015-04-01 21:30:53','0000-00-00 00:00:00',1,NULL),
(2,'c0973702-14e4-11e5-b10a-74d435d335fe','Performer Group 2','0','1','SOC-GP-0001002',NULL,NULL,123312,'2015-03-03','',2,NULL,1,'N',NULL,'1','2015-04-01 22:03:53','0000-00-00 00:00:00',1,NULL),
(3,'c09737de-14e4-11e5-b10a-74d435d335fe','Author Group 4','1','0','SOC-GA-0001003',NULL,NULL,23123,'2015-02-24','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:04','0000-00-00 00:00:00',1,NULL),
(4,'c09738a2-14e4-11e5-b10a-74d435d335fe','Performer Group 4','0','1','SOC-GP-0001004',NULL,NULL,2312323,'2015-03-19','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:17','0000-00-00 00:00:00',1,NULL),
(5,'c0973965-14e4-11e5-b10a-74d435d335fe','Author Group 3','1','0','SOC-GA-0001005',NULL,NULL,321123,'2010-02-10','',2,NULL,1,'N',NULL,'1','2015-04-01 23:01:37','0000-00-00 00:00:00',1,NULL),
(6,'c0973a23-14e4-11e5-b10a-74d435d335fe','Performer Group 1','0','1','SOC-GP-0001006',NULL,NULL,123123,'2015-04-29','',2,NULL,1,'Y',NULL,'1','2015-04-10 00:50:29','2015-10-05 12:29:14',1,10),
(9,'c0973ae1-14e4-11e5-b10a-74d435d335fe','Author Group 1','1','0','SOC-GA-0001007',NULL,NULL,123123,'2015-04-29','',2,NULL,1,'Y','\\group\\2e400f04f8232e283be43ed26fdc71fa.png','1','2015-04-10 00:55:47','2015-10-05 15:27:18',1,10),
(11,'c0973ba2-14e4-11e5-b10a-74d435d335fe','Performer Group 5','0','1','SOC-GP-0001008',NULL,NULL,123123,'2015-04-23','',2,NULL,1,'N',NULL,'1','2015-04-10 01:01:02','0000-00-00 00:00:00',1,NULL),
(12,'c0973c58-14e4-11e5-b10a-74d435d335fe','Performer Group 3','0','1','SOC-GP-0001009',NULL,NULL,123312,'2015-04-22','',2,NULL,1,'N',NULL,'1','2015-04-10 01:02:58','0000-00-00 00:00:00',1,NULL),
(14,'c0973d10-14e4-11e5-b10a-74d435d335fe','Author Group 5','1','0','SOC-GA-0001011',NULL,NULL,123312,'2015-03-31','',2,NULL,1,'N',NULL,'1','2015-04-11 04:51:37','0000-00-00 00:00:00',1,NULL),
(16,'c0973e8f-14e4-11e5-b10a-74d435d335fe','test performer group','0','1','SOC-GP-0001013',NULL,NULL,2147483647,'2015-04-01','',2,NULL,NULL,'N',NULL,'1','2015-04-21 09:29:44','0000-00-00 00:00:00',1,NULL),
(17,'c0973f4d-14e4-11e5-b10a-74d435d335fe','Metallica','1','0','SOC-GA-0001014',NULL,NULL,2147483647,'2015-04-14','',2,NULL,1,'N',NULL,'1','2015-04-23 11:02:57','0000-00-00 00:00:00',1,NULL),
(18,'1C3DE8F7-D5E3-1D55-8F13-A3F0BFBCB210','Groupperformer','1','0','SOC-G-0001014',NULL,NULL,NULL,'2015-07-01','',2,NULL,5,'N',NULL,'1','2015-07-20 16:50:36','0000-00-00 00:00:00',1,NULL),
(19,'FADA7957-2732-11CE-A676-3027C4BC106B','Perf Group','0','1','SOC-G-0001015',NULL,NULL,NULL,'2015-07-16','',2,NULL,5,'N',NULL,'1','2015-07-20 16:52:13','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_group_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_group_biograph_uploads`;

CREATE TABLE `wipo_group_biograph_uploads` (
  `Group_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Biogrph_Id` int(11) NOT NULL,
  `Group_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Group_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Biogrph_Upl_Id`),
  KEY `FK_wipo_group_biograph_uploads_biography` (`Group_Biogrph_Id`),
  CONSTRAINT `FK_wipo_group_biograph_uploads_biography` FOREIGN KEY (`Group_Biogrph_Id`) REFERENCES `wipo_group_biography` (`Group_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_biograph_uploads` */

insert  into `wipo_group_biograph_uploads`(`Group_Biogrph_Upl_Id`,`Group_Biogrph_Id`,`Group_Biogrph_Upl_File`,`Group_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,3,'\\groupbiographuploads\\6fe400c35a642bbaede3df9f73eaa915.png',NULL,'2015-06-24 13:52:43','0000-00-00 00:00:00',1,NULL),
(2,3,'\\groupbiographuploads\\864bcd38b6f1debfac4dfce12452aa0a.png','Test','2015-06-26 13:48:19','0000-00-00 00:00:00',1,NULL),
(3,4,'\\groupbiographuploads\\cf5d9416d5fdc22b0fe51209796e70d3.png','Test','2015-06-26 13:52:52','0000-00-00 00:00:00',1,NULL),
(4,3,'\\groupbiographuploads\\909f81541828cd07965a2da90c51951b.jpg','tessss','2015-07-03 13:57:49','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_group_biography` */

DROP TABLE IF EXISTS `wipo_group_biography`;

CREATE TABLE `wipo_group_biography` (
  `Group_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Biogrph_Id`),
  KEY `FK_wipo_group_biography_account_id` (`Group_Id`),
  CONSTRAINT `FK_wipo_group_biography_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_biography` */

insert  into `wipo_group_biography`(`Group_Biogrph_Id`,`Group_Id`,`Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,14,'Annotation','1','2015-04-11 05:01:07','0000-00-00 00:00:00',1,NULL),
(3,9,'Test','1','2015-06-24 13:12:38','0000-00-00 00:00:00',1,1),
(4,1,'Tets','1','2015-06-24 13:37:52','0000-00-00 00:00:00',1,NULL),
(5,16,'Test','1','2015-06-24 13:40:16','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_manage_rights` */

insert  into `wipo_group_manage_rights`(`Group_Mnge_Rgt_Id`,`Group_Id`,`Group_Mnge_Society_Id`,`Group_Mnge_Entry_Date`,`Group_Mnge_Exit_Date`,`Group_Mnge_Internal_Position_Id`,`Group_Mnge_Entry_Date_2`,`Group_Mnge_Exit_Date_2`,`Group_Mnge_Region_Id`,`Group_Mnge_Profession_Id`,`Group_Mnge_File`,`Group_Mnge_Duration`,`Group_Mnge_Avl_Work_Cat_Id`,`Group_Mnge_Type_Rght_Id`,`Group_Mnge_Managed_Rights_Id`,`Group_Mnge_Territories_Id`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(3,1,10,'2015-04-08','2015-04-08',1,'2015-04-08','2015-04-08',1,1,'',NULL,1,1,2,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(5,16,10,'2015-04-19','2015-04-19',1,'2015-04-19','2015-04-19',NULL,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(6,17,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(7,9,10,'2015-07-03','2015-07-29',6,'2015-07-03','2015-07-29',NULL,NULL,'',NULL,1,5,1,8,1,10,NULL,'2015-10-05 15:27:18');

/*Table structure for table `wipo_group_members` */

DROP TABLE IF EXISTS `wipo_group_members`;

CREATE TABLE `wipo_group_members` (
  `Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Id` int(11) NOT NULL,
  `Group_Member_GUID` varchar(50) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Member_Id`),
  KEY `FK_wipo_group_biography_account_id` (`Group_Id`),
  KEY `FK_wipo_group_members_Perf_Internal_Code` (`Group_Member_GUID`),
  CONSTRAINT `FK_wipo_group_members_group` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_members` */

insert  into `wipo_group_members`(`Group_Member_Id`,`Group_Id`,`Group_Member_GUID`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(5,1,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:02:45','0000-00-00 00:00:00',1,NULL),
(7,5,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:02:45','0000-00-00 00:00:00',1,NULL),
(9,4,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:16:34','0000-00-00 00:00:00',1,NULL),
(10,5,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:16:34','0000-00-00 00:00:00',1,NULL),
(12,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00',1,NULL),
(13,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00',1,NULL),
(14,3,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:42:07','0000-00-00 00:00:00',1,NULL),
(15,9,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-04-11 10:47:09','0000-00-00 00:00:00',1,NULL),
(16,17,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-05-13 15:37:48','0000-00-00 00:00:00',1,NULL),
(17,17,'c08b8b32-14e4-11e5-b10a-74d435d335fe','2015-05-13 15:37:48','0000-00-00 00:00:00',1,NULL),
(20,2,'c08b90a4-14e4-11e5-b10a-74d435d335fe','2015-06-24 10:50:38','0000-00-00 00:00:00',1,NULL),
(21,4,'c08b90a4-14e4-11e5-b10a-74d435d335fe','2015-06-24 10:50:38','0000-00-00 00:00:00',1,NULL),
(32,2,'1B8D30E4-CDD2-D39C-3AB7-03AAD98FE7D7','2015-07-07 17:22:09','0000-00-00 00:00:00',NULL,NULL),
(33,4,'1B8D30E4-CDD2-D39C-3AB7-03AAD98FE7D7','2015-07-07 17:22:09','0000-00-00 00:00:00',NULL,NULL),
(37,2,'6170D906-040B-5C94-66C6-6BCC32E0CD1A','2015-07-28 13:14:22','0000-00-00 00:00:00',NULL,NULL),
(44,5,'c08b4443-14e4-11e5-b10a-74d435d335fe','2015-10-05 17:59:19','0000-00-00 00:00:00',NULL,NULL),
(45,17,'c08b4443-14e4-11e5-b10a-74d435d335fe','2015-10-05 17:59:19','0000-00-00 00:00:00',NULL,NULL),
(46,18,'c08b4443-14e4-11e5-b10a-74d435d335fe','2015-10-05 17:59:19','0000-00-00 00:00:00',NULL,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Pay_Id`),
  KEY `FK_wipo_group_payment_method_account_id` (`Group_Id`),
  KEY `FK_wipo_group_payment_method_payment_mode` (`Group_Pay_Method_id`),
  CONSTRAINT `FK_wipo_group_payment_method_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_payment_method_payment_mode` FOREIGN KEY (`Group_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_payment_method` */

insert  into `wipo_group_payment_method`(`Group_Pay_Id`,`Group_Id`,`Group_Pay_Method_id`,`Group_Bank_Account_1`,`Group_Bank_Account_2`,`Group_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,1,1,'1232123','3212321323','1232123231231','1','2015-04-11 01:32:03','0000-00-00 00:00:00',1,NULL),
(3,9,2,'1232123','3212321323','12321232312312','1','2015-07-03 13:50:47','0000-00-00 00:00:00',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Pseudo_Id`),
  KEY `FK_wipo_group_pseudonym_pseodo_type` (`Group_Pseudo_Type_Id`),
  KEY `FK_wipo_group_pseudonym_group` (`Group_Id`),
  CONSTRAINT `FK_wipo_group_pseudonym_group` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_pseudonym_pseodo_type` FOREIGN KEY (`Group_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_pseudonym` */

insert  into `wipo_group_pseudonym`(`Group_Pseudo_Id`,`Group_Id`,`Group_Pseudo_Type_Id`,`Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,1,2,'PP','1','2015-04-11 03:34:23','0000-00-00 00:00:00',NULL,NULL),
(3,9,11,'PP','1','2015-07-03 13:51:07','0000-00-00 00:00:00',1,1);

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
  `Group_Home_Address_1` text NOT NULL,
  `Group_Home_Address_2` varchar(255) DEFAULT NULL,
  `Group_Home_Address_3` varchar(255) DEFAULT NULL,
  `Group_Home_Address_4` varchar(255) DEFAULT NULL,
  `Group_Home_Fax` varchar(25) DEFAULT NULL,
  `Group_Home_Telephone` varchar(25) NOT NULL,
  `Group_Home_Email` varchar(50) NOT NULL,
  `Group_Home_Website` varchar(100) DEFAULT NULL,
  `Group_Mailing_Address_1` text NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Group_Addr_Id`),
  KEY `FK_wipo_group_representative_account_id` (`Group_Id`),
  KEY `FK_wipo_group_representative_country` (`Group_Country_Id`),
  CONSTRAINT `FK_wipo_group_representative_account_id` FOREIGN KEY (`Group_Id`) REFERENCES `wipo_group` (`Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_group_representative_country` FOREIGN KEY (`Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_group_representative` */

insert  into `wipo_group_representative`(`Group_Addr_Id`,`Group_Id`,`Group_Rep_Name`,`Group_Rep_Address_1`,`Group_Rep_Address_2`,`Group_Rep_Address_3`,`Group_Rep_Address_4`,`Group_Home_Address_1`,`Group_Home_Address_2`,`Group_Home_Address_3`,`Group_Home_Address_4`,`Group_Home_Fax`,`Group_Home_Telephone`,`Group_Home_Email`,`Group_Home_Website`,`Group_Mailing_Address_1`,`Group_Mailing_Address_2`,`Group_Mailing_Address_3`,`Group_Mailing_Address_4`,`Group_Mailing_Telephone`,`Group_Mailing_Fax`,`Group_Mailing_Email`,`Group_Mailing_Website`,`Group_Country_Id`,`Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,1,'Ron','','','','','1, Main street','','','','','96626166111','rom@gmail.com','','1, Main street','','','','342342123231','','ron@gmail.com','',2,'Y','1','2015-04-11 03:29:47','0000-00-00 00:00:00',1,NULL),
(3,9,'Ron','','','','','1, Main street','','','','','96626166111','rom@gmail.com','','1, Main street','','','','342342123231','','ron@gmail.com','',2,'N','1','2015-07-03 13:58:40','2015-10-05 11:32:23',1,10);

/*Table structure for table `wipo_inspector` */

DROP TABLE IF EXISTS `wipo_inspector`;

CREATE TABLE `wipo_inspector` (
  `Insp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Insp_Internal_Code` varchar(50) NOT NULL,
  `Insp_GUID` varchar(40) NOT NULL,
  `Insp_Name` varchar(100) NOT NULL,
  `Insp_Occupation` varchar(100) DEFAULT NULL,
  `Insp_DOB` date DEFAULT NULL,
  `Insp_Nationality_Id` int(11) DEFAULT NULL,
  `Insp_Birth_Place` varchar(100) DEFAULT NULL,
  `Insp_Identity_Number` varchar(50) DEFAULT NULL,
  `Insp_Date` date DEFAULT NULL,
  `Insp_Region_Id` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Insp_Id`),
  KEY `FK_wipo_inspector_region` (`Insp_Region_Id`),
  KEY `FK_wipo_inspector_nationality` (`Insp_Nationality_Id`),
  CONSTRAINT `FK_wipo_inspector_nationality` FOREIGN KEY (`Insp_Nationality_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_inspector_region` FOREIGN KEY (`Insp_Region_Id`) REFERENCES `wipo_master_region` (`Master_Region_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_inspector` */

insert  into `wipo_inspector`(`Insp_Id`,`Insp_Internal_Code`,`Insp_GUID`,`Insp_Name`,`Insp_Occupation`,`Insp_DOB`,`Insp_Nationality_Id`,`Insp_Birth_Place`,`Insp_Identity_Number`,`Insp_Date`,`Insp_Region_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'SOC-I-0000001','7A66D643-E0AD-5A2D-B2D9-63DC5D1E320A','Inspector 1','OCC','1990-01-30',2,'UK','1232123','2015-07-30',1,'2015-07-25 13:03:16','2015-08-14 12:18:12',1,1),
(2,'SOC-I-0000001','DE32BF6D-4909-9C50-045A-2C7A16E0DD94','Wilson','Inspector','1981-01-29',116,'','','0000-00-00',1,'2015-08-06 13:27:20','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_internalcode_generate` */

DROP TABLE IF EXISTS `wipo_internalcode_generate`;

CREATE TABLE `wipo_internalcode_generate` (
  `Gen_Inter_Code_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Gen_Soc_Id` varchar(10) NOT NULL,
  `Gen_User_Type` varchar(4) NOT NULL COMMENT 'A -> Author, P -> Performer, G -> Group, O -> Organization, PU -> Publisher, PR -> Producer, PG -> Publisher/producer group, W -> Work, R -> Recording, GA -> Group Author, GP -> Group Performer, GE -> Group Publisher, GR -> Group Producer, AP -> Author & Performer, EP -> Publisher & producer',
  `Gen_Prefix` varchar(10) DEFAULT NULL,
  `Gen_Inter_Code` varchar(50) NOT NULL,
  `Gen_Suffix` varchar(10) DEFAULT NULL,
  `Gen_Code_Pad` tinyint(4) NOT NULL DEFAULT '7',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Gen_Inter_Code_Id`),
  UNIQUE KEY `UserType` (`Gen_User_Type`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_internalcode_generate` */

insert  into `wipo_internalcode_generate`(`Gen_Inter_Code_Id`,`Gen_Soc_Id`,`Gen_User_Type`,`Gen_Prefix`,`Gen_Inter_Code`,`Gen_Suffix`,`Gen_Code_Pad`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'SOC','A','A','1675','',7,NULL,'2015-08-20 13:28:47',NULL,1),
(2,'SOC','P','P','386',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(4,'SOC','O','SOC','4',NULL,3,NULL,'2015-08-20 13:28:47',NULL,1),
(5,'SOC','PU','E','193',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(7,'SOC','PR','PR','270',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(8,'SOC','W','W','39',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(9,'SOC','R','R','127',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(10,'SOC','GA','GA','3',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(11,'SOC','GP','GP','2',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(12,'SOC','GE','GE','3',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(13,'SOC','GR','GPR','3',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(14,'SOC','AP','AP','306',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(15,'SOC','EP','EPR','9',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(16,'SOC','RP','S','3',NULL,7,NULL,'2015-08-20 13:28:47',NULL,1),
(17,'SOC','S','SC','1036','',7,NULL,'2015-08-20 13:28:47',NULL,1),
(18,'SOC','SP','SP','9','',7,NULL,'2015-08-20 13:28:47',NULL,1),
(19,'SOC','RS','RSS','9','',7,NULL,'2015-08-20 13:28:47',NULL,1),
(20,'SOC','IS','I','1',NULL,7,'2015-07-23 12:01:01','2015-08-20 13:28:47',NULL,1),
(21,'SOC','TF','CON','45',NULL,7,'2015-07-24 19:09:45','2015-08-20 13:28:47',NULL,1),
(22,'SOC','TMS','TAR','3',NULL,7,'2015-08-05 12:00:41','2015-08-20 13:28:47',NULL,1),
(23,'SOC','CUS','U','4',NULL,7,'2015-08-05 12:01:13','2015-08-20 13:28:47',NULL,1),
(24,'SOC','DCLS','CLS','7',NULL,7,'2015-09-28 11:22:06','0000-00-00 00:00:00',NULL,NULL),
(25,'SOC','DSCL','SCL','4',NULL,7,'2015-09-28 11:22:28','0000-00-00 00:00:00',NULL,NULL),
(26,'SOC','DDI','DDI','2',NULL,7,'2015-09-28 11:22:49','0000-00-00 00:00:00',NULL,NULL),
(27,'DOC','DUPD','UPD','3',NULL,7,'2015-09-28 11:23:10','0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `wipo_master_city` */

DROP TABLE IF EXISTS `wipo_master_city`;

CREATE TABLE `wipo_master_city` (
  `Master_City_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Country_Id` int(11) NOT NULL,
  `City_Code` varchar(20) NOT NULL,
  `City_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Master_City_Id`),
  KEY `FK_wipo_master_city_country` (`Country_Id`),
  CONSTRAINT `FK_wipo_master_city_country` FOREIGN KEY (`Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_city` */

insert  into `wipo_master_city`(`Master_City_Id`,`Country_Id`,`City_Code`,`City_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,'ACH','Achham','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(2,2,'ARG','Arghakhanchi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(3,2,'BAG','Baglung','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(4,2,'BAI','Baitadi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(5,2,'BAJ','Bajhang','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(6,2,'BAJ','Bajura','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(7,2,'BAN','Banke','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(8,2,'BAR','Bara','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(9,2,'BAR','Bardiya','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(10,2,'BHA','Bhaktapur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(11,2,'BHO','Bhojpur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(12,2,'CHI','Chitwan','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(13,2,'DAD','Dadeldhura','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(14,2,'DAI','Dailekh','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(15,2,'DAN','Dang Deukhuri','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(16,2,'DAR','Darchula','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(17,2,'DHA','Dhading','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(18,2,'DHA','Dhankuta','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(19,2,'DHA','Dhanusa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(20,2,'DHO','Dholkha','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(21,2,'DOL','Dolpa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(22,2,'DOT','Doti','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(23,2,'GOR','Gorkha','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(24,2,'GUL','Gulmi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(25,2,'HUM','Humla','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(26,2,'ILA','Ilam','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(27,2,'JAJ','Jajarkot','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(28,2,'JHA','Jhapa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(29,2,'JUM','Jumla','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(30,2,'KAI','Kailali','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(31,2,'KAL','Kalikot','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(32,2,'KAN','Kanchanpur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(33,2,'KAP','Kapilvastu','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(34,2,'KAS','Kaski','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(35,2,'KAT','Kathmandu','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(36,2,'KAV','Kavrepalanchok','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(37,2,'KHO','Khotang','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(38,2,'LAL','Lalitpur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(39,2,'LAM','Lamjung','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(40,2,'MAH','Mahottari','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(41,2,'MAK','Makwanpur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(42,2,'MAN','Manang','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(43,2,'MOR','Morang','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(44,2,'MUG','Mugu','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(45,2,'MUS','Mustang','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(46,2,'MYA','Myagdi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(47,2,'NAW','Nawalparasi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(48,2,'NUW','Nuwakot','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(49,2,'OKH','Okhaldhunga','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(50,2,'PAL','Palpa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(51,2,'PAN','Panchthar','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(52,2,'PAR','Parbat','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(53,2,'PAR','Parsa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(54,2,'PYU','Pyuthan','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(55,2,'RAM','Ramechhap','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(56,2,'RAS','Rasuwa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(57,2,'RAU','Rautahat','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(58,2,'ROL','Rolpa','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(59,2,'RUK','Rukum','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(60,2,'RUP','Rupandehi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(61,2,'SAL','Salyan','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(62,2,'SAN','Sankhuwasabha','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(63,2,'SAP','Saptari','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(64,2,'SAR','Sarlahi','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(65,2,'SIN','Sindhuli','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(66,2,'SIN','Sindhupalchok','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(67,2,'SIR','Siraha','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(68,2,'SOL','Solukhumbu','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(69,2,'SUN','Sunsari','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(70,2,'SUR','Surkhet','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(71,2,'SYA','Syangja','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(72,2,'TAN','Tanahu','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(73,2,'TAP','Taplejung','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(74,2,'TER','Terhathum','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL),
(75,2,'UDA','Udayapur','1','2015-08-03 18:59:27','0000-00-00 00:00:00',1,NULL);

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

insert  into `wipo_master_country`(`Master_Country_Id`,`Country_Name`,`Country_Two_Code`,`Country_Three_Code`,`Active`,`Created_Date`,`Rowversion`) values 
(2,'NEPAL','NP','0524','1','2015-03-15 00:12:13','0000-00-00 00:00:00'),
(5,'AFGHANISTAN','AF','0004','1','2015-04-10 21:28:14','0000-00-00 00:00:00'),
(7,'ALBANIA','AL','0008','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(8,'ALGERIA','DZ','0012','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(9,'ANDORRA','AD','0020','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(10,'ANGOLA','AO','0024','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(11,'ANTIGUA AND BARBUDA','AG','0028','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(12,'AZERBAIJAN','AZ','0031','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(13,'ARGENTINA','AR','0032','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(14,'AUSTRALIA','AU','0036','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(15,'AUSTRIA','AT','0040','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(16,'BAHAMAS','BS','0044','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(17,'BAHRAIN','BH','0048','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(18,'BANGLADESH','BD','0050','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(19,'ARMENIA','AM','0051','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(20,'BARBADOS','BB','0052','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(21,'BELGIUM','BE','0056','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(22,'BHUTAN','BT','0064','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(23,'BOLIVIA','BO','0068','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(24,'BOSNIA AND HERZEGOVINA','BA','0070','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(25,'BOTSWANA','BW','0072','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(26,'BRAZIL','BR','0076','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(27,'BELIZE','BZ','0084','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(28,'SOLOMON ISLANDS','SB','0090','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(29,'BRUNEI DARUSSALAM','BN','0096','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(30,'BULGARIA','BG','0100','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(31,'BURMA','BU','0104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(32,'MYANMAR','MM','0104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(33,'BURUNDI','BI','0108','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(34,'BELARUS','BY','0112','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(35,'CAMBODIA','KH','0116','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(36,'CAMEROON','CM','0120','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(37,'CANADA','CA','0124','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(38,'CAPE VERDE','CV','0132','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(39,'CENTRAL AFRICAN REPUBLIC','CF','0140','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(40,'SRI LANKA','LK','0144','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(41,'CHAD','TD','0148','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(42,'CHILE','CL','0152','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(43,'CHINA','CN','0156','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(44,'TAIWAN, PROVINCE OF CHINA','TW','0158','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(45,'COLOMBIA','CO','0170','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(46,'COMOROS','KM','0174','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(47,'CONGO','CG','0178','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(48,'ZAIRE','ZR','0180','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(49,'CONGO, THE DEMOCRATIC REPUBLIC OF THE','CD','0180','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(50,'COSTA RICA','CR','0188','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(51,'CROATIA','HR','0191','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(52,'CUBA','CU','0192','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(53,'CYPRUS','CY','0196','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(54,'CZECHOSLOVAKIA','CS','0200','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(55,'CZECH REPUBLIC','CZ','0203','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(56,'BENIN','BJ','0204','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(57,'DENMARK','DK','0208','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(58,'DOMINICA','DM','0212','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(59,'DOMINICAN REPUBLIC','DO','0214','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(60,'ECUADOR','EC','0218','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(61,'EL SALVADOR','SV','0222','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(62,'EQUATORIAL GUINEA','GQ','0226','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(63,'ETHIOPIA','ET','0230','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(64,'ETHIOPIA','ET','0231','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(65,'ERITREA','ER','0232','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(66,'ESTONIA','EE','0233','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(67,'FIJI','FJ','0242','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(68,'FINLAND','FI','0246','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(69,'FRANCE','FR','0250','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(70,'FRENCH POLYNESIA','PF','0258','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(71,'DJIBOUTI','DJ','0262','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(72,'GABON','GA','0266','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(73,'GEORGIA','GE','0268','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(74,'GAMBIA','GM','0270','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(75,'GERMANY','DE','0276','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(76,'GERMAN DEMOCRATIC REPUBLIC','DD','0278','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(77,'GERMANY','DE','0280','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(78,'GHANA','GH','0288','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(79,'KIRIBATI','KI','0296','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(80,'GREECE','GR','0300','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(81,'GRENADA','GD','0308','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(82,'GUATEMALA','GT','0320','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(83,'GUINEA','GN','0324','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(84,'GUYANA','GY','0328','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(85,'HAITI','HT','0332','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(86,'HOLY SEE (VATICAN CITY STATE)','VA','0336','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(87,'HONDURAS','HN','0340','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(88,'HONG KONG','HK','0344','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(89,'HUNGARY','HU','0348','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(90,'ICELAND','IS','0352','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(91,'INDIA','IN','0356','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(92,'INDONESIA','ID','0360','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(93,'IRAN, ISLAMIC REPUBLIC OF','IR','0364','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(94,'IRAQ','IQ','0368','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(95,'IRELAND','IE','0372','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(96,'ISRAEL','IL','0376','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(97,'ITALY','IT','0380','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(98,'COTE D\'IVOIRE','CI','0384','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(99,'JAMAICA','JM','0388','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(100,'JAPAN','JP','0392','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(101,'KAZAKSTAN','KZ','0398','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(102,'JORDAN','JO','0400','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(103,'KENYA','KE','0404','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(104,'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','KP','0408','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(105,'KOREA, REPUBLIC OF','KR','0410','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(106,'KUWAIT','KW','0414','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(107,'KYRGYZSTAN','KG','0417','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(108,'LAO PEOPLE\'S DEMOCRATIC REPUBLIC','LA','0418','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(109,'LEBANON','LB','0422','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(110,'LESOTHO','LS','0426','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(111,'LATVIA','LV','0428','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(112,'LIBERIA','LR','0430','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(113,'LIBYAN ARAB JAMAHIRIYA','LY','0434','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(114,'LIECHTENSTEIN','LI','0438','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(115,'LITHUANIA','LT','0440','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(116,'LUXEMBOURG','LU','0442','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(117,'MADAGASCAR','MG','0450','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(118,'MALAWI','MW','0454','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(119,'MALAYSIA','MY','0458','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(120,'MALDIVES','MV','0462','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(121,'MALI','ML','0466','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(122,'MALTA','MT','0470','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(123,'MAURITANIA','MR','0478','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(124,'MAURITIUS','MU','0480','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(125,'MEXICO','MX','0484','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(126,'MONACO','MC','0492','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(127,'MONGOLIA','MN','0496','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(128,'MOLDOVA, REPUBLIC OF','MD','0498','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(129,'MOROCCO','MA','0504','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(130,'MOZAMBIQUE','MZ','0508','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(131,'OMAN','OM','0512','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(132,'NAMIBIA','NA','0516','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(133,'NAURU','NR','0520','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(135,'NETHERLANDS','NL','0528','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(136,'VANUATU','VU','0548','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(137,'NEW ZEALAND','NZ','0554','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(138,'NICARAGUA','NI','0558','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(139,'NIGER','NE','0562','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(140,'NIGERIA','NG','0566','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(141,'NORWAY','NO','0578','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(142,'MICRONESIA, FEDERATED STATES OF','FM','0583','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(143,'MARSHALL ISLANDS','MH','0584','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(144,'PALAU','PW','0585','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(145,'PAKISTAN','PK','0586','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(146,'PANAMA','PA','0591','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(147,'PAPUA NEW GUINEA','PG','0598','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(148,'PARAGUAY','PY','0600','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(149,'PERU','PE','0604','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(150,'PHILIPPINES','PH','0608','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(151,'POLAND','PL','0616','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(152,'PORTUGAL','PT','0620','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(153,'GUINEA-BISSAU','GW','0624','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(154,'PUERTO RICO','PR','0630','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(155,'QATAR','QA','0634','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(156,'ROMANIA','RO','0642','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(157,'RUSSIAN FEDERATION','RU','0643','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(158,'RWANDA','RW','0646','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(159,'SAINT KITTS AND NEVIS','KN','0659','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(160,'SAINT LUCIA','LC','0662','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(161,'SAINT VINCENT AND THE GRENADINES','VC','0670','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(162,'SAN MARINO','SM','0674','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(163,'SAO TOME AND PRINCIPE','ST','0678','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(164,'SAUDI ARABIA','SA','0682','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(165,'SENEGAL','SN','0686','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(166,'SEYCHELLES','SC','0690','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(167,'SIERRA LEONE','SL','0694','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(168,'SINGAPORE','SG','0702','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(169,'SLOVAKIA','SK','0703','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(170,'VIET NAM','VN','0704','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(171,'SLOVENIA','SI','0705','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(172,'SOMALIA','SO','0706','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(173,'SOUTH AFRICA','ZA','0710','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(174,'ZIMBABWE','ZW','0716','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(175,'YEMEN, DEMOCRATIC','YD','0720','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(176,'SPAIN','ES','0724','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(177,'WESTERN SAHARA','EH','0732','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(178,'SUDAN','SD','0736','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(179,'SURINAME','SR','0740','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(180,'SWAZILAND','SZ','0748','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(181,'SWEDEN','SE','0752','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(182,'SWITZERLAND','CH','0756','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(183,'SYRIAN ARAB REPUBLIC','SY','0760','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(184,'TAJIKISTAN','TJ','0762','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(185,'THAILAND','TH','0764','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(186,'TOGO','TG','0768','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(187,'TONGA','TO','0776','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(188,'TRINIDAD AND TOBAGO','TT','0780','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(189,'UNITED ARAB EMIRATES','AE','0784','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(190,'TUNISIA','TN','0788','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(191,'TURKEY','TR','0792','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(192,'TURKMENISTAN','TM','0795','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(193,'TUVALU','TV','0798','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(194,'UGANDA','UG','0800','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(195,'UKRAINE','UA','0804','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(196,'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','MK','0807','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(197,'USSR','SU','0810','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(198,'EGYPT','EG','0818','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(199,'UNITED KINGDOM','GB','0826','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(200,'TANZANIA, UNITED REPUBLIC OF','TZ','0834','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(201,'UNITED STATES','US','0840','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(202,'BURKINA FASO','BF','0854','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(203,'URUGUAY','UY','0858','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(204,'UZBEKISTAN','UZ','0860','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(205,'VENEZUELA','VE','0862','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(206,'SAMOA','WS','0882','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(207,'YEMEN (0886)','YE','0886','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(208,'YEMEN (0887)','YE','0887','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(209,'YUGOSLAVIA (0890)','YU','0890','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(210,'YUGOSLAVIA (0891)','YU','0891','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(211,'ZAMBIA','ZM','0894','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(212,'AFRICA','2AF','2100','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(213,'AMERICA','2AM','2101','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(214,'AMERICAN CONTINENT','2AC','2102','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(215,'ANTILLES','2AN','2103','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(216,'APEC COUNTRIES','2AP','2104','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(217,'ASEAN COUNTRIES','2AE','2105','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(218,'ASIA','2AS','2106','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(219,'AUSTRALASIA','2AA','2107','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(220,'BALKANS','2BA','2108','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(221,'BALTIC STATES','2BS','2109','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(222,'BENELUX','2BE','2110','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(223,'BRITISH ISLES','2BI','2111','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(224,'BRITISH WEST INDIES','2BW','2112','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(225,'CENTRAL AMERICA','2CA','2113','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(226,'COMMONWEALTH','2CO','2114','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(227,'COMMONWEALTH AFRICAN TERRITORIES','2CF','2115','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(228,'COMMONWEALTH ASIAN TERRITORIES','2CS','2116','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(229,'COMMONWEALTH AUSTRALASIAN TERRITORIES','2CU','2117','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(230,'COMMONWEALTH OF INDEPENDENT STATES','2CI','2118','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(231,'EASTERN EUROPE','2EE','2119','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(232,'EUROPE','2EU','2120','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(233,'EUROPEAN ECONOMIC AREA','2EM','2121','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(234,'EUROPEAN CONTINENT','2EC','2122','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(235,'EUROPEAN ECONOMIC COMMUNITY','2EY','2123','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(236,'EUROPEAN UNION','2EN','2123','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(237,'GSA COUNTRIES','2GC','2124','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(238,'MIDDLE EAST','2ME','2125','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(239,'NAFTA COUNTRIES','2NT','2126','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(240,'NORDIC COUNTRIES','2NC','2127','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(241,'NORTH AFRICA','2NF','2128','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(242,'NORTH AMERICA','2NA','2129','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(243,'OCEANIA','2OC','2130','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(244,'SCANDINAVIA','2SC','2131','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(245,'SOUTH AMERICA','2SA','2132','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(246,'SOUTH EAST ASIA','2SE','2133','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(247,'WEST INDIES','2WI','2134','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(248,'WORLD','2WL','2136','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(249,'WEST AFRICA REGION','WAR','WA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(250,'CENTRAL AFRICA REGION','CAR','CA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(251,'EAST AFRICA REGION','EAR','EA','1','2015-06-02 11:58:36','0000-00-00 00:00:00'),
(252,'SOUTH AFRICA REGION','SAR','SA','1','2015-06-02 11:58:36','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_currency` */

insert  into `wipo_master_currency`(`Master_Crncy_Id`,`Currency_Code`,`Currency_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'USD','US Dollar','1','2015-03-29 03:10:18','0000-00-00 00:00:00'),
(2,'EUR','Euro','1','2015-03-29 03:10:28','0000-00-00 00:00:00'),
(3,'INR','Indian Rupee','1','2015-03-29 03:10:34','0000-00-00 00:00:00'),
(4,'AED','United Arab Emirates dirham','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(5,'AFN','Afghani','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(6,'ALL','Lek','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(7,'AMD','Armenian Dram','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(8,'ANG','Netherlands Antillian Guilder','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(9,'AOA','Kwanza','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(10,'ARS','Argentine Peso','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(11,'AUD','Australian Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(12,'AWG','Aruban Guilder','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(13,'AZN','Azerbaijanian Manat','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(14,'BAM','Convertible Marks','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(15,'BBD','Barbados Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(16,'BDT','Bangladeshi Taka','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(17,'BGN','Bulgarian Lev','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(18,'BHD','Bahraini Dinar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(19,'BIF','Burundian Franc','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(20,'BMD','Bermudian Dollar (customarily known as Bermuda Dol','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(21,'BND','Brunei Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(22,'BOB','Boliviano','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(23,'BOV','Bolivian Mvdol (Funds code)','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(24,'BRL','Brazilian Real','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(25,'BSD','Bahamian Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(26,'BTN','Ngultrum','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(27,'BWP','Pula','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(28,'BYR','Belarussian Ruble','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(29,'BZD','Belize Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(30,'CAD','Canadian Dollar','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(31,'CDF','Franc Congolais','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(32,'CHE','WIR Euro (complementary currency)','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(33,'CHF','Swiss Franc','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(34,'CHW','WIR Franc (complementary currency)','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(35,'CLF','Unidades de formento (Funds code)','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(36,'CLP','Chilean Peso','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(37,'CNY','Yuan Renminbi','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(38,'COP','Colombian Peso','1','2015-09-30 15:29:59','0000-00-00 00:00:00'),
(39,'COU','Unidad de Valor Real','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(40,'CRC','Costa Rican Colon','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(41,'CUP','Cuban Peso','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(42,'CVE','Cape Verde Escudo','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(43,'CYP','Cyprus Pound','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(44,'CZK','Czech Koruna','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(45,'DJF','Djibouti Franc','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(46,'DKK','Danish Krone','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(47,'DOP','Dominican Peso','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(48,'DZD','Algerian Dinar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(49,'EEK','Kroon','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(50,'EGP','Egyptian Pound','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(51,'ERN','Nakfa','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(52,'ETB','Ethiopian Birr','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(54,'FJD','Fiji Dollar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(55,'FKP','Falkland Islands Pound','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(56,'GBP','Pound Sterling','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(57,'GEL','Lari','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(58,'GHS','Cedi','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(59,'GIP','Gibraltar pound','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(60,'GMD','Dalasi','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(61,'GNF','Guinea Franc','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(62,'GTQ','Quetzal','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(63,'GYD','Guyana Dollar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(64,'HKD','Hong Kong Dollar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(65,'HNL','Lempira','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(66,'HRK','Croatian Kuna','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(67,'HTG','Haiti Gourde','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(68,'HUF','Forint','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(69,'IDR','Rupiah','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(70,'ILS','New Israeli Shekel','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(72,'IQD','Iraqi Dinar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(73,'IRR','Iranian Rial','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(74,'ISK','Iceland Krona','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(75,'JMD','Jamaican Dollar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(76,'JOD','Jordanian Dinar','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(77,'JPY','Japanese yen','1','2015-09-30 15:30:00','0000-00-00 00:00:00'),
(78,'KES','Kenyan Shilling','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(79,'KGS','Som','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(80,'KHR','Riel','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(81,'KMF','Comoro Franc','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(82,'KPW','North Korean Won','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(83,'KRW','South Korean Won','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(84,'KWD','Kuwaiti Dinar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(85,'KYD','Cayman Islands Dollar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(86,'KZT','Tenge','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(87,'LAK','Kip','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(88,'LBP','Lebanese Pound','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(89,'LKR','Sri Lanka Rupee','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(90,'LRD','Liberian Dollar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(91,'LSL','Loti','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(92,'LTL','Lithuanian Litas','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(93,'LVL','Latvian Lats','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(94,'LYD','Libyan Dinar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(95,'MAD','Moroccan Dirham','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(96,'MDL','Moldovan Leu','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(97,'MGA','Malagasy Ariary','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(98,'MKD','Denar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(99,'MMK','Kyat','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(100,'MNT','Tugrik','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(101,'MOP','Pataca','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(102,'MRO','Ouguiya','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(103,'MTL','Maltese Lira','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(104,'MUR','Mauritius Rupee','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(105,'MVR','Rufiyaa','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(106,'MWK','Kwacha','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(107,'MXN','Mexican Peso','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(108,'MXV','Mexican Unidad de Inversion (UDI) (Funds code)','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(109,'MYR','Malaysian Ringgit','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(110,'MZN','Metical','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(111,'NAD','Namibian Dollar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(112,'NGN','Naira','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(113,'NIO','Cordoba Oro','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(114,'NOK','Norwegian Krone','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(115,'NPR','Nepalese Rupee','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(116,'NZD','New Zealand Dollar','1','2015-09-30 15:30:01','0000-00-00 00:00:00'),
(117,'OMR','Rial Omani','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(118,'PAB','Balboa','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(119,'PEN','Nuevo Sol','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(120,'PGK','Kina','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(121,'PHP','Philippine Peso','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(122,'PKR','Pakistan Rupee','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(123,'PLN','Zloty','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(124,'PYG','Guarani','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(125,'QAR','Qatari Rial','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(126,'RON','Romanian New Leu','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(127,'RSD','Serbian Dinar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(128,'RUB','Russian Ruble','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(129,'RWF','Rwanda Franc','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(130,'SAR','Saudi Riyal','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(131,'SBD','Solomon Islands Dollar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(132,'SCR','Seychelles Rupee','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(133,'SDG','Sudanese Pound','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(134,'SEK','Swedish Krona','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(135,'SGD','Singapore Dollar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(136,'SHP','Saint Helena Pound','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(137,'SKK','Slovak Koruna','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(138,'SLL','Leone','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(139,'SOS','Somali Shilling','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(140,'SRD','Surinam Dollar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(141,'STD','Dobra','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(142,'SYP','Syrian Pound','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(143,'SZL','Lilangeni','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(144,'THB','Baht','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(145,'TJS','Somoni','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(146,'TMM','Manat','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(147,'TND','Tunisian Dinar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(148,'TOP','Pa\'anga','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(149,'TRY','New Turkish Lira','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(150,'TTD','Trinidad and Tobago Dollar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(151,'TWD','New Taiwan Dollar','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(152,'TZS','Tanzanian Shilling','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(153,'UAH','Hryvnia','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(154,'UGX','Uganda Shilling','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(156,'USN','US Dollar (USN)','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(157,'USS','US Dollar (USS)','1','2015-09-30 15:30:02','0000-00-00 00:00:00'),
(158,'UYU','Peso Uruguayo','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(159,'UZS','Uzbekistan Som','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(160,'VEB','Venezuelan bolívar','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(161,'VND','Vietnamese ??ng','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(162,'VUV','Vatu','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(163,'WST','Samoan Tala','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(164,'XAF','CFA Franc BEAC','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(165,'XAG','Silver (one Troy ounce)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(166,'XAU','Gold (one Troy ounce)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(167,'XBA','European Composite Unit (EURCO) (Bonds market unit','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(168,'XBB','European Monetary Unit (E.M.U.-6) (Bonds market un','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(169,'XBC','European Unit of Account 9 (E.U.A.-9) (Bonds marke','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(170,'XBD','European Unit of Account 17 (E.U.A.-17) (Bonds mar','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(171,'XCD','East Caribbean Dollar','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(172,'XDR','Special Drawing Rights','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(173,'XFO','Gold franc (special settlement currency)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(174,'XFU','UIC franc (special settlement currency)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(175,'XOF','CFA Franc BCEAO','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(176,'XPD','Palladium (one Troy ounce)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(177,'XPF','CFP franc','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(178,'XPT','Platinum (one Troy ounce)','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(179,'XTS','Code reserved for testing purposes','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(180,'XXX','No currency','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(181,'YER','Yemeni Rial','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(182,'ZAR','South African Rand','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(183,'ZMK','Kwacha','1','2015-09-30 15:30:03','0000-00-00 00:00:00'),
(184,'ZWD','Zimbabwe Dollar','1','2015-09-30 15:30:03','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_destination` */

DROP TABLE IF EXISTS `wipo_master_destination`;

CREATE TABLE `wipo_master_destination` (
  `Master_Dist_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Dist_Name` varchar(100) NOT NULL,
  `Dist_Code` varchar(50) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Master_Dist_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_destination` */

insert  into `wipo_master_destination`(`Master_Dist_Id`,`Dist_Name`,`Dist_Code`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'Test Destination','TD','1','2015-07-14 17:57:10','0000-00-00 00:00:00',NULL,NULL);

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

insert  into `wipo_master_document`(`Master_Doc_Id`,`Doc_Code`,`Doc_Name`,`Doc_Comment`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'CUE','CUE-SHEET (AUDIOVISUAL MUSICAL WORKS DOC)','CUE-SHEET (AUDIOVISUAL MUSICAL WORKS DOC)','1','2015-03-16 03:59:26','0000-00-00 00:00:00'),
(2,'INT','INTERNATIONAL DOCUMENTATION (FI, ETC.)','INTERNATIONAL DOCUMENTATION (FI, ETC.)','1','2015-03-16 03:59:38','0000-00-00 00:00:00'),
(3,'WDF','WORK DECLARATION FORM','WORK DECLARATION FORM','1','2015-04-11 09:14:04','0000-00-00 00:00:00'),
(6,'COM','LETTERS AND OTHER COMMUNICATIONS','','1','2015-06-02 11:08:35','0000-00-00 00:00:00'),
(8,'WID','WID DECLARATION','','1','2015-06-02 11:08:35','0000-00-00 00:00:00'),
(9,'RDF','RECORDING DECLARATION FORM','','1','2015-06-02 11:08:35','0000-00-00 00:00:00');

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

insert  into `wipo_master_document_status`(`Master_Document_Sts_Id`,`Document_Sts_Code`,`Document_Sts_Name`,`Document_Sts_Comment`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'N','Declared','Declared work','1','2015-03-16 20:40:40','0000-00-00 00:00:00'),
(2,'I','Work documented','work documented in an international file','1','2015-03-16 20:41:14','0000-00-00 00:00:00'),
(3,'U','Undeclared national work','undeclared national work; the author has been invited to declare it','1','2015-03-16 20:41:34','0000-00-00 00:00:00'),
(4,'V','Undocumented foreign work','undocumented foreign work which has been identified by the name of its author and for which the fees have been paid on the basis of the CISAC “Warsaw Rule”;','1','2015-03-16 20:41:56','0000-00-00 00:00:00'),
(5,'W','Foreign work','foreign work for which the data have been transferred from the WWL or WID documentation','1','2015-03-16 20:42:16','0000-00-00 00:00:00'),
(6,'Q','Unidentified work','unidentified work which has been entered in an inquiry list according to the CISAC rules','1','2015-03-16 20:42:30','0000-00-00 00:00:00'),
(7,'X','Non-identified work','non-identified work which appeared in a statement of works performed, broadcast or reproduced','1','2015-03-16 20:42:43','0000-00-00 00:00:00'),
(8,'Y','Worldwide non documented work','Worldwide non documented work (WID,WWL)','1','2015-03-16 20:43:01','0000-00-00 00:00:00');

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

insert  into `wipo_master_document_type`(`Master_Doc_Type_Id`,`Doc_Type_Name`,`Doc_Type_Comment`,`Doc_Type_Status_Id`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Declared','Declared',1,'1','2015-03-16 20:49:32','0000-00-00 00:00:00');

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

insert  into `wipo_master_event_type`(`Master_Evt_Type_Id`,`Evt_Type_Name`,`Evt_Type_Comment`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Close','Establishment Closes','1','2015-03-16 04:08:13','0000-00-00 00:00:00'),
(2,'Stop','Establishment Stop using the protected works ','1','2015-03-16 04:08:30','0000-00-00 00:00:00'),
(3,'Terminate','Establishment Terminates the Contract','1','2015-03-16 04:08:39','0000-00-00 00:00:00'),
(4,'Transfer','Establishment Transfers to other owner','1','2015-03-16 04:08:48','0000-00-00 00:00:00'),
(5,'Other','Other types','1','2015-03-16 04:08:58','0000-00-00 00:00:00');

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

insert  into `wipo_master_factor`(`Master_Factor_Id`,`Factor`,`Factor_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'2.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),
(2,'3.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),
(3,'4.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),
(4,'5.00',NULL,'1','2015-05-31 13:01:14','0000-00-00 00:00:00'),
(5,'1.00','UNKNOWN WORKS/RECORDINGS','1','2015-05-31 13:01:14','0000-00-00 00:00:00'),
(6,'0.16','JINGLES','0','2015-05-31 13:01:14','0000-00-00 00:00:00');

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

insert  into `wipo_master_hierarchy`(`Master_Hierarchy_Id`,`Hierarchy_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Full member','1','2015-04-02 00:41:25','0000-00-00 00:00:00'),
(2,'Candidate Member','1','2015-04-02 00:46:07','0000-00-00 00:00:00'),
(3,'Honorary Member','1','2015-04-02 00:50:28','0000-00-00 00:00:00'),
(4,'Associate Member','1','2015-04-11 09:11:15','0000-00-00 00:00:00');

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

insert  into `wipo_master_instrument`(`Master_Inst_Id`,`Instrument_Code`,`Instrument_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'ACC','Accordion','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(2,'ALP','Alp Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(3,'ACL','Alto Carinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(4,'AFL','Alto flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(5,'AHN','Alto Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(6,'ARC','Alto Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(7,'ASX','Alto Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(8,'ALT','Alto Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(9,'AMP','Amplifier','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(10,'BAG','Bagpipes','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(11,'BKA','Balalaika','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(12,'BBF','Bamboo Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(13,'BDN','Bandoneon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(14,'BNJ','Banjo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(15,'BAR','Baritone Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(16,'BSX','Baritone Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(17,'BTN','Baritone Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(18,'BQF','Baroque Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(19,'BBT','Bass Baritone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(20,'BCL','Bass Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(21,'BDR','Bass Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(22,'BFT','Bass Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(23,'BGT','Bass Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(24,'BOB','Bass Oboe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(25,'BRC','Bass Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(26,'BSP','Bass Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(27,'BRT','Bass Trombone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(28,'BSS','Bass Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(29,'BHN','Basset Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(30,'BSN','Bassoon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(31,'BEL','Bells','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(32,'BNG','Bongos','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(33,'BOY','Boy Soprano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(34,'BGL','Bugle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(35,'CAR','Carillon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(36,'CST','Castanets','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(37,'CEL','Celesta','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(38,'CHM','Chimes','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(39,'CIM','Cimbalom','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(40,'CLR','Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(41,'CVD','Clavichord','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(42,'COM','Computer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(43,'CNB','Concertina','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(44,'CNG','Congas','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(45,'CBN','Contra Bassoon','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(46,'CBC','Contrabass Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(47,'CCL','Contralto Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(48,'CAL','Contralto Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(49,'CNT','Cornet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(50,'CTN','Countertenor Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(51,'CYM','Cymbals','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(52,'DIJ','Didjeridu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(53,'DIZ','Dizi/D\'Tzu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(54,'DJM','Djembe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(55,'BASDBS','Double Bass','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(56,'DRM','Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(57,'DRK','Drum Kit/Drum Set','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(58,'DUL','Dulcimer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(59,'EFC','E-Flat Clarinet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(60,'EBG','Electric Bass Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(61,'EGT','Electric Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(62,'EOG','Electronic Organ','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(63,'ELL','Electronics, Live','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(64,'ELP','Electronics, Pre-recorded','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(65,'EHN','English Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(66,'ERH','Erhu','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(67,'EUP','Euphonium','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(68,'FLG','Flugelhorn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(69,'FLT','Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(70,'FRN','French Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(71,'GHM','Glass Harmonica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(72,'GHP','Glass  Harp','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(73,'GLS','Glockenspiel','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(74,'GNG','Gong','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(75,'GTR','Guitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(76,'HBL','Handbells','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(77,'HAR','Harmonica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(78,'HRM','Harmonium','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(79,'HRP','Harp','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(80,'HPS','Harpsichord','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(81,'HCK','Heckelphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(82,'HRN','Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(83,'HUR','Hurdy-Gurdy','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(84,'KAZ','Kazoo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(85,'KEY','Keyboard','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(86,'KLV','Klavier','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(87,'KOT','Koto','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(88,'LUT','Lute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(89,'LYR','Lyre','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(90,'MAN','Mandolin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(91,'MCS','Maracas','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(92,'MAR','Marimba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(93,'MBR','Mbira','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(94,'MEL','Melodica','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(95,'MEZ','Mezzo Soprano Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(96,'MID','Midi','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(97,'MSB','Music Box','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(98,'NAR','Narrator/Speaker','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(99,'NAF','Native American Flute','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(100,'NHN','Natural Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(101,'OBO','Oboe','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(102,'OBD','Oboe d\'Amore','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(103,'OND','Ondes Martinot','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(104,'ORG','Organ','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(105,'PWH','Pennywhistle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(106,'PER','Percussion','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(107,'PIA','Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(108,'PIC','Piccolo','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(109,'PPA','Pipa','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(110,'PRP','Prepared Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(111,'PRO','Processor','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(112,'REC','Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(113,'RUA','Ruan','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(114,'SAM','Sampler','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(115,'SAX','Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(116,'SEQ','Sequencer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(117,'SHK','Shakuhachi','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(118,'SHM','Shamisen','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(119,'SHW','Shawm','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(120,'SHO','Sho','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(121,'SIT','Sitar','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(122,'SDM','Snare Drum','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(123,'SNR','Sopranino Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(124,'SNS','Sopranino Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(125,'SRC','Soprano Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(126,'SSX','Soprano Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(127,'SOP','Soprano Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(128,'SOU','Sousaphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(129,'SPO','Spoons','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(130,'STD','Steel Drums','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(131,'SYN','Synthesizer','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(132,'TAB','Tabla','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(133,'TAM','Tambour','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(134,'TMN','Tambourine','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(135,'TTM','TAMTAM','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(136,'TAP','Tape','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(137,'THN','Tenor Horn','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(138,'TRC','Tenor Recorder','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(139,'TSX','Tenor Saxophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(140,'TEN','Tenor Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(141,'THE','Theremin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(142,'TIM','Timpani','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(143,'TYP','Toy Piano','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(144,'TRI','Triangle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(145,'TMB','Trombone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(146,'TRM','Trumpet','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(147,'TBA','Tuba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(148,'UKE','Ukelele','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(149,'VIB','Vibraphone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(150,'VID','Video','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(151,'VLA','Viola','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(152,'VDG','Viola Da Gamba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(153,'VLN','Violin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(154,'VCL','Violoncello','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(155,'VOC','Voice','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(156,'WTB','Wagner Tuba','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(157,'WHS','Whistle','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(158,'WBK','Wood block','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(159,'XYL','Xylophone','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(160,'YQN','Yang Quin','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(161,'ZHG','Zheng','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(162,'ZIT','Zither','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(163,'KEY','KEYBOARD','1','2015-05-31 13:05:03','0000-00-00 00:00:00'),
(164,'ORGAN','ORGAN','1','2015-05-31 13:05:03','0000-00-00 00:00:00');

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

insert  into `wipo_master_internal_position`(`Master_Int_Post_Id`,`Int_Post_Code`,`Int_Post_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'FM','Full member','1','2015-03-16 03:53:51','0000-00-00 00:00:00'),
(3,'HM','Honorary Member','1','2015-04-11 09:27:12','0000-00-00 00:00:00'),
(4,'PM','Provisional Member','1','2015-06-02 11:35:15','0000-00-00 00:00:00'),
(6,'CM','Candidate Member','1','2015-06-02 11:35:15','0000-00-00 00:00:00');

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

insert  into `wipo_master_international_number`(`Master_International_Id`,`International_Number_Type`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'IPI','1','2015-04-02 01:43:25','0000-00-00 00:00:00'),
(2,'AV Index','1','2015-04-02 01:43:34','0000-00-00 00:00:00'),
(3,'ISAN','1','2015-04-02 01:43:42','0000-00-00 00:00:00'),
(4,'ISRC','1','2015-04-02 01:43:52','0000-00-00 00:00:00');

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

insert  into `wipo_master_label`(`Master_Label_Id`,`Label_Code`,`Label_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'NL','No Label','1','2015-05-10 16:10:05','0000-00-00 00:00:00'),
(2,'SNY','Sony','1','2015-06-02 06:54:24','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_language` */

insert  into `wipo_master_language`(`Master_Lang_Id`,`Lang_Code`,`Lang_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'EN','English','1','2015-03-16 03:41:49','0000-00-00 00:00:00'),
(5,'NE','Nepalese','1','2015-04-11 08:58:57','0000-00-00 00:00:00'),
(9,'FR','French','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(11,'ES','Spanish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(12,'DE','German','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(13,'RU','Russian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(14,'OA','(Afan) Oromo','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(15,'AB','Abkhasian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(16,'AA','Afar','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(17,'AF','Afrikaans','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(18,'SQ','Albanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(19,'AM','Amharic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(20,'AR','Arabic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(21,'HY','Armenian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(22,'AS','Assamese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(23,'AY','Aymara','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(24,'AZ','Azerbaijani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(25,'BA','Bashkir','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(26,'EU','Basque','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(27,'BN','Bengali;Bangla','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(28,'DZ','Bhutani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(29,'BH','Bihari','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(30,'BI','Bislama','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(31,'BR','Breton','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(32,'BG','Bulgarian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(33,'MY','Burmese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(34,'BE','Byelorussian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(35,'KM','Cambodian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(36,'CA','Catalan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(37,'ZH','Chinese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(38,'CO','Corsican','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(39,'HR','Croatian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(40,'CS','Czech','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(41,'DA','Danish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(42,'NL','Dutch','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(43,'EO','Esperanto','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(44,'ET','Estonian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(45,'FO','Faeroese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(46,'FA','Farsi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(47,'FJ','Fiji','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(48,'FI','Finnish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(49,'FY','Frisian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(50,'GL','Galician','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(51,'KA','Georgian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(52,'EL','Greek','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(53,'KL','Greenlandic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(54,'GN','Guarani','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(55,'GU','Gujarati','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(56,'HA','Hausa','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(57,'HW','Hawaii','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(58,'IW','Hebrew','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(59,'HI','Hindi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(60,'HU','Hungarian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(61,'IS','Icelandic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(62,'IN','Indonesian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(63,'IA','Interlingua','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(64,'IE','Interlingue','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(65,'IK','Inupiak','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(66,'GA','Irish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(67,'IT','Italian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(68,'JA','Japanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(69,'JW','Javanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(70,'KN','Kannada','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(71,'KS','Kashmiri','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(72,'KK','Kazakh','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(73,'RW','Kinyarwanda','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(74,'KY','Kirghiz','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(75,'RN','Kirundi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(76,'KO','Korean','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(77,'KU','Kurdish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(78,'LO','Laothian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(79,'LA','Latin','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(80,'LV','Latvian;Lettish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(81,'LN','Lingala','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(82,'LT','Lithuanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(83,'MK','Macedonian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(84,'MG','Malagasy','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(85,'MS','Malay','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(86,'ML','Malayalam','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(87,'MT','Maltese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(88,'MI','Maori','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(89,'MR','Marathi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(90,'MO','Moldavian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(91,'MN','Mongolian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(92,'NA','Nauru','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(94,'NO','Norwegian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(95,'OC','Occitan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(96,'OR','Oriya','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(97,'OM','Oromo','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(98,'PM','Papiamento','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(99,'PS','Pashto;Pushto','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(100,'FA','Persian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(101,'PL','Polish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(102,'PT','Portuguese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(103,'PA','Punjabi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(104,'QU','Quechua','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(105,'RM','Rhaeto-Romance','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(106,'RO','Romanian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(107,'SM','Samoan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(108,'SG','Sangro','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(109,'SA','Sanskrit','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(110,'GD','Scots Gaelic','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(111,'SR','Serbian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(112,'SH','Serbo-Croatian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(113,'ST','Sesotho','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(114,'TN','Setswana','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(115,'SN','Shona','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(116,'SD','Sindhi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(117,'SI','Singhalese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(118,'SS','Siswati','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(119,'SK','Slovak','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(120,'SL','Slovenian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(121,'SO','Somali','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(122,'SU','Sundanese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(123,'SW','Swahili','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(124,'SV','Swedish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(125,'TL','Tagalog','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(126,'TG','Tajik','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(127,'TA','Tamil','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(128,'TT','Tatar','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(129,'TE','Tegulu','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(130,'TH','Thai','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(131,'BO','Tibetan','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(132,'TI','Tigrinya','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(133,'TO','Tonga','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(134,'TS','Tsonga','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(135,'TR','Turkish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(136,'TK','Turkmen','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(137,'TW','Twi','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(138,'UK','Ukrainian','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(139,'UR','Urdu','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(140,'UZ','Uzbek','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(141,'VI','Vietnamese','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(142,'VO','Volapuk','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(143,'CY','Welsh','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(144,'WO','Wolof','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(145,'XH','Xhosa','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(146,'JI','Yiddish','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(147,'YO','Yoruba','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(148,'ZU','Zulu','1','2015-05-31 14:06:06','0000-00-00 00:00:00'),
(151,'TE','asdasd','1','2015-07-18 13:52:29','0000-00-00 00:00:00');

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

insert  into `wipo_master_legal_form`(`Master_Legal_Form_Id`,`Legal_Form_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Limited company','1','2015-03-16 03:54:02','0000-00-00 00:00:00'),
(2,'Partnership','1','2015-03-16 03:54:10','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_managed_rights` */

insert  into `wipo_master_managed_rights`(`Master_Mgd_Rights_Id`,`Mgd_Rights_Name`,`Mgd_Rights_Rank`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'All rights',10,'1','2015-03-16 03:52:15','0000-00-00 00:00:00'),
(2,'Exclusive rights',10,'1','2015-03-16 03:52:27','0000-00-00 00:00:00'),
(3,'Equitable Remuneration',5,'0','2015-03-16 03:52:41','0000-00-00 00:00:00'),
(4,'Neighboring Rights',10,'1','2015-03-16 03:52:54','0000-00-00 00:00:00'),
(5,'Retransmission Right',11,'1','2015-06-29 19:17:05','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_manufacturer` */

DROP TABLE IF EXISTS `wipo_master_manufacturer`;

CREATE TABLE `wipo_master_manufacturer` (
  `Master_Manf_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Manf_Code` varchar(50) DEFAULT NULL,
  `Manf_Name` varchar(100) NOT NULL,
  `Manf_Description` text,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Manf_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_manufacturer` */

insert  into `wipo_master_manufacturer`(`Master_Manf_Id`,`Manf_Code`,`Manf_Name`,`Manf_Description`,`Active`,`Created_Date`,`Rowversion`) values 
(1,NULL,'Manufacturer 1','Manufacturer onee','1','2015-07-04 15:31:39','0000-00-00 00:00:00');

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

insert  into `wipo_master_marital_status`(`Master_Marital_State_Id`,`Marital_Code`,`Marital_State`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'SIN','SINGLE','1','2015-03-28 02:56:21','0000-00-00 00:00:00'),
(2,'DIV','DIVORCED','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),
(3,'LTD','LIMITED ','0','2015-06-02 11:29:37','0000-00-00 00:00:00'),
(4,'MAR','MARRIED','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),
(5,'PAT','PARTERNER','0','2015-06-02 11:29:37','0000-00-00 00:00:00'),
(6,'REL','RELIGIOUS','1','2015-06-02 11:29:37','0000-00-00 00:00:00'),
(7,'WID','WIDOWED','1','2015-06-02 11:29:37','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_medium` */

DROP TABLE IF EXISTS `wipo_master_medium`;

CREATE TABLE `wipo_master_medium` (
  `Master_Medium_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Medium_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Master_Medium_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_medium` */

insert  into `wipo_master_medium`(`Master_Medium_Id`,`Medium_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'CD','1','2015-07-07 15:38:35','0000-00-00 00:00:00',NULL,NULL),
(2,'Discs','1','2015-07-07 15:39:21','0000-00-00 00:00:00',1,NULL),
(3,'Cassette','1','2015-07-07 15:39:29','0000-00-00 00:00:00',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_module` */

insert  into `wipo_master_module`(`Master_Module_ID`,`Module_Code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'site','Master','1','2015-06-30 17:41:24','0000-00-00 00:00:00'),
(2,'site','Administration','1','2015-06-30 15:21:56','0000-00-00 00:00:00'),
(3,'site','Documentation','1','2015-06-30 17:40:24','0000-00-00 00:00:00'),
(4,'site','Licensing','1','2015-07-22 18:43:50','0000-00-00 00:00:00'),
(5,'site','Distribution','1','2015-09-03 11:52:26','0000-00-00 00:00:00');

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

insert  into `wipo_master_nationality`(`Master_Nation_Id`,`Nation_Code`,`Nation_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(2,'NP','NEPAL','1','2015-03-16 03:40:20','0000-00-00 00:00:00'),
(4,'MY','MALAYSIA','1','2015-03-16 03:40:35','0000-00-00 00:00:00'),
(6,'WL','WORLD','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(7,'AF','AFGHANISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(8,'AL','ALBANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(9,'DZ','ALGERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(10,'AD','ANDORRA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(11,'AO','ANGOLA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(12,'AG','ANTIGUA AND BARBUDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(13,'AZ','AZERBAIJAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(14,'AR','ARGENTINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(15,'AU','AUSTRALIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(16,'AT','AUSTRIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(17,'BS','BAHAMAS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(18,'BH','BAHRAIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(19,'BD','BANGLADESH','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(20,'AM','ARMENIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(21,'BB','BARBADOS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(22,'BE','BELGIUM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(23,'BT','BHUTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(24,'BO','BOLIVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(25,'BA','BOSNIA AND HERZEGOVINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(26,'BW','BOTSWANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(27,'BR','BRAZIL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(28,'BZ','BELIZE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(29,'SB','SOLOMON ISLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(30,'BN','BRUNEI DARUSSALAM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(31,'BG','BULGARIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(32,'BU','BURMA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(33,'MM','MYANMAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(34,'BI','BURUNDI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(35,'BY','BELARUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(36,'KH','CAMBODIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(37,'CM','CAMEROON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(38,'CA','CANADA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(39,'CV','CAPE VERDE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(40,'CF','CENTRAL AFRICAN REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(41,'LK','SRI LANKA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(42,'TD','CHAD','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(43,'CL','CHILE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(44,'CN','CHINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(45,'TW','TAIWAN, PROVINCE OF CHINA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(46,'CO','COLOMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(47,'KM','COMOROS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(48,'CG','CONGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(49,'ZR','ZAIRE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(50,'CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(51,'CR','COSTA RICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(52,'HR','CROATIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(53,'CU','CUBA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(54,'CY','CYPRUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(55,'CS','CZECHOSLOVAKIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(56,'CZ','CZECH REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(57,'BJ','BENIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(58,'DK','DENMARK','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(59,'DM','DOMINICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(60,'DO','DOMINICAN REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(61,'EC','ECUADOR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(62,'SV','EL SALVADOR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(63,'GQ','EQUATORIAL GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(64,'ER','ERITREA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(65,'EE','ESTONIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(66,'FJ','FIJI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(67,'FI','FINLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(68,'FR','FRANCE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(69,'PF','FRENCH POLYNESIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(70,'DJ','DJIBOUTI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(71,'GA','GABON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(72,'GE','GEORGIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(73,'GM','GAMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(74,'DE','GERMANY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(75,'DD','GERMAN DEMOCRATIC REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(76,'GH','GHANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(77,'KI','KIRIBATI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(78,'GR','GREECE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(79,'GD','GRENADA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(80,'GT','GUATEMALA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(81,'GN','GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(82,'GY','GUYANA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(83,'HT','HAITI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(84,'VA','HOLY SEE (VATICAN CITY STATE)','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(85,'HN','HONDURAS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(86,'HK','HONG KONG','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(87,'HU','HUNGARY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(88,'IS','ICELAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(89,'IN','INDIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(90,'ID','INDONESIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(91,'IR','IRAN, ISLAMIC REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(92,'IQ','IRAQ','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(93,'IE','IRELAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(94,'IL','ISRAEL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(95,'IT','ITALY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(96,'CI','COTE D\'IVOIRE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(97,'JM','JAMAICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(98,'JP','JAPAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(99,'KZ','KAZAKSTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(100,'JO','JORDAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(101,'KE','KENYA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(102,'KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(103,'KR','KOREA, REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(104,'KW','KUWAIT','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(105,'KG','KYRGYZSTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(106,'LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(107,'LB','LEBANON','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(108,'LS','LESOTHO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(109,'LV','LATVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(110,'LR','LIBERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(111,'LY','LIBYAN ARAB JAMAHIRIYA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(112,'LI','LIECHTENSTEIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(113,'LT','LITHUANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(114,'LU','LUXEMBOURG','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(115,'MG','MADAGASCAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(116,'MW','MALAWI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(118,'MV','MALDIVES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(119,'ML','MALI','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(120,'MT','MALTA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(121,'MR','MAURITANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(122,'MU','MAURITIUS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(123,'MX','MEXICO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(124,'MC','MONACO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(125,'MN','MONGOLIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(126,'MD','MOLDOVA, REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(127,'MA','MOROCCO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(128,'MZ','MOCAMBIQUE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(129,'OM','OMAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(130,'NA','NAMIBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(131,'NR','NAURU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(133,'NL','NETHERLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(134,'VU','VANUATU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(135,'NZ','NEW ZEALAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(136,'NI','NICARAGUA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(137,'NE','NIGER','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(138,'NG','NIGERIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(139,'NO','NORWAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(140,'FM','MICRONESIA, FEDERATED STATES OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(141,'MH','MARSHALL ISLANDS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(142,'PW','PALAU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(143,'PK','PAKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(144,'PA','PANAMA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(145,'PG','PAPUA NEW GUINEA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(146,'PY','PARAGUAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(147,'PE','PERU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(148,'PH','PHILIPPINES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(149,'PL','POLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(150,'PT','PORTUGAL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(151,'GW','GUINEA-BISSAU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(152,'PR','PUERTO RICO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(153,'QA','QATAR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(154,'RO','ROMANIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(155,'RU','RUSSIAN FEDERATION','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(156,'RW','RWANDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(157,'KN','SAINT KITTS AND NEVIS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(158,'LC','SAINT LUCIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(159,'VC','SAINT VINCENT AND THE GRENADINES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(160,'SM','SAN MARINO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(161,'ST','SAO TOME AND PRINCIPE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(162,'SA','SAUDI ARABIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(163,'SN','SENEGAL','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(164,'SC','SEYCHELLES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(165,'SL','SIERRA LEONE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(166,'SG','SINGAPORE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(167,'SK','SLOVAKIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(168,'VN','VIET NAM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(169,'SI','SLOVENIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(170,'SO','SOMALIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(171,'ZA','SOUTH AFRICA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(172,'ZW','ZIMBABWE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(173,'YD','YEMEN, DEMOCRATIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(174,'ES','SPAIN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(175,'EH','WESTERN SAHARA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(176,'SD','SUDAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(177,'SR','SURINAME','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(178,'SZ','SWAZILAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(179,'SE','SWEDEN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(180,'CH','SWITZERLAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(181,'SY','SYRIAN ARAB REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(182,'TJ','TAJIKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(183,'TH','THAILAND','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(184,'TG','TOGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(185,'TO','TONGA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(186,'TT','TRINIDAD AND TOBAGO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(187,'AE','UNITED ARAB EMIRATES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(188,'TN','TUNISIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(189,'TR','TURKEY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(190,'TM','TURKMENISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(191,'TV','TUVALU','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(192,'UG','UGANDA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(193,'UA','UKRAINE','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(194,'MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(195,'SU','USSR','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(196,'EG','EGYPT','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(197,'GB','UNITED KINGDOM','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(198,'TZ','TANZANIA, UNITED REPUBLIC OF','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(199,'US','UNITED STATES','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(200,'UY','URUGUAY','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(201,'UZ','UZBEKISTAN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(202,'VE','VENEZUELA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(203,'WS','SAMOA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(204,'YE','YEMEN','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(205,'YU','YUGOSLAVIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(206,'ZA','ZAMBIA','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(207,'BF','BURKINA FASO','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(208,'KMP','KUMVI PROFFESSIONALS','1','2015-05-31 14:24:39','0000-00-00 00:00:00'),
(209,'XX','UNKNOWN COUNTRY','1','2015-05-31 14:24:39','0000-00-00 00:00:00');

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

insert  into `wipo_master_payment_method`(`Master_Paymode_Id`,`Paymode_Code`,`Paymode_Name`,`Paymode_Comment`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'CH','CHEQUE','CHEQUE','1','2015-03-16 04:03:36','0000-00-00 00:00:00'),
(2,'CS','CASH','CASH','1','2015-03-16 04:05:07','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_place` */

DROP TABLE IF EXISTS `wipo_master_place`;

CREATE TABLE `wipo_master_place` (
  `Master_Place_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Place_Code` varchar(50) NOT NULL,
  `Place_Name` varchar(100) NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Master_Place_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_place` */

insert  into `wipo_master_place`(`Master_Place_Id`,`Place_Code`,`Place_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'01','Radios','1','2015-07-22 12:07:56','0000-00-00 00:00:00',NULL,NULL),
(2,'02','Download','1','2015-07-22 12:08:09','0000-00-00 00:00:00',NULL,NULL),
(4,'03','Television','1','2015-07-22 12:10:27','0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `wipo_master_profession` */

DROP TABLE IF EXISTS `wipo_master_profession`;

CREATE TABLE `wipo_master_profession` (
  `Master_Profession_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Profession_Name` varchar(45) NOT NULL COMMENT 'Profession Title:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Profession_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_profession` */

insert  into `wipo_master_profession`(`Master_Profession_Id`,`Profession_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Singer','1','2015-03-16 03:47:52','0000-00-00 00:00:00'),
(2,'Author','1','2015-04-11 09:40:59','0000-00-00 00:00:00'),
(3,'Writer','1','2015-04-11 09:41:09','0000-00-00 00:00:00'),
(4,'Guitarist','1','2015-04-11 09:41:21','0000-00-00 00:00:00'),
(5,'Lyricist','1','2015-04-11 09:41:33','0000-00-00 00:00:00'),
(6,'Publisher','1','2015-09-21 13:13:21','0000-00-00 00:00:00');

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

insert  into `wipo_master_pseudonym_types`(`Pseudo_Id`,`Pseudo_Code`,`Pseudo_Fulltype`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'PP','PSEUDONYM, PEN NAME','1','2015-03-16 04:09:20','0000-00-00 00:00:00'),
(2,'PA','PATRONYM','1','2015-03-16 04:09:24','0000-00-00 00:00:00'),
(5,'PG','GROUP PSEUDONYM','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(6,'PC','COLLECTIVE PSEUDONYM','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(7,'DF','DIFFERENT SPELLING','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(8,'ST','STANDARDISED NAME','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(9,'MO','MODIFIED NAME, FORMER PATRONYN','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(10,'OR','OTHER REFERENCES  FOR LEGAL ENTITIES','1','2015-06-02 11:18:00','0000-00-00 00:00:00'),
(11,'HR','HOLDING REFERENCES FOR LEGAL ENTITIES','1','2015-06-02 11:18:00','0000-00-00 00:00:00');

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

insert  into `wipo_master_record_type`(`Master_Rec_Type_Id`,`Rec_Type_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Normal','1','2015-06-02 06:32:54','0000-00-00 00:00:00'),
(2,'Digital','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),
(3,'Non identified','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),
(4,'Other','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),
(5,'Recording Sessions','1','2015-06-09 06:32:12','0000-00-00 00:00:00'),
(6,'Sound Carriers','1','2015-06-09 06:32:12','0000-00-00 00:00:00');

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

insert  into `wipo_master_region`(`Master_Region_Id`,`Region_Code`,`Region_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'NEP','NEPAL','1','2015-03-16 03:44:44','0000-00-00 00:00:00'),
(3,'BLK','BALAKA','1','2015-03-16 03:44:57','0000-00-00 00:00:00'),
(7,'BT','BLANTYRE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(8,'CK','CHIKWAWA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(9,'CP','CHITIPA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(10,'CZ','CHIRADZULU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(11,'DA','DOWA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(12,'DZ','DEDZA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(13,'KA','KARONGA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(14,'KK','NKHOTAKOTA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(15,'KU','KASUNGU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(16,'LA','LIKOMA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(17,'LL','LILONGWE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(18,'MC','MCHINJI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(19,'MH','MANGOCHI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(20,'MHG','MACHINGA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(21,'MJ','MULANJE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(22,'MN','MWANZA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(23,'MV','MVERA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(24,'MZ','MZUZU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(25,'MZI','MZIMBA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(26,'NE','NSANJE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(27,'NJ','NTAJA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(28,'NS','NTCHISI','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(29,'NU','NTCHEU','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(30,'PMB','PHALOMBE','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(31,'SA','SALIMA','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(32,'TO','THYOLO','1','2015-06-02 11:23:47','0000-00-00 00:00:00'),
(33,'ZA','ZOMBA','1','2015-06-02 11:23:47','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_role` */

DROP TABLE IF EXISTS `wipo_master_role`;

CREATE TABLE `wipo_master_role` (
  `Master_Role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Code` varchar(45) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Rank` smallint(6) DEFAULT '100',
  `is_Admin` enum('0','1') NOT NULL DEFAULT '0',
  `Active` enum('0','1') DEFAULT '1',
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Rowversion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Role_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_role` */

insert  into `wipo_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`Rank`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'A','Admin',100,'1','1','2015-08-31 10:38:36','0000-00-00 00:00:00'),
(2,'DE','Data Entry',200,'0','1','2015-08-20 17:20:49','0000-00-00 00:00:00'),
(3,'DO','Documentation Officer',300,'0','1','2015-08-20 17:20:51','0000-00-00 00:00:00'),
(4,'DS','Distribution Office',400,'0','1','2015-08-20 17:20:52','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_screen` */

insert  into `wipo_master_screen`(`Master_Screen_ID`,`Module_ID`,`Screen_code`,`Description`,`Active`,`Created_Date`,`Rowversion`) values 
(1,1,'mastercurrency','Currency','1','2015-06-30 17:43:13','0000-00-00 00:00:00'),
(2,1,'mastercountry','Country','1','2015-06-30 17:43:43','0000-00-00 00:00:00'),
(3,1,'masterdocumentstatus','Document Status ','1','2015-06-30 17:43:55','0000-00-00 00:00:00'),
(4,1,'masterdocumenttype','Document Types ','1','2015-06-30 17:44:26','0000-00-00 00:00:00'),
(5,1,'masterdocument','Documents ','1','2015-06-30 17:44:24','0000-00-00 00:00:00'),
(6,1,'masterinternalposition','Internal Position','1','2015-06-30 17:44:40','0000-00-00 00:00:00'),
(7,1,'masterinternationalnumber','International Number','1','2015-06-30 17:44:56','0000-00-00 00:00:00'),
(8,1,'masterlabel','Labels','1','2015-06-30 17:45:13','0000-00-00 00:00:00'),
(9,1,'masterlegalform','Legal Forms','1','2015-06-30 17:45:30','0000-00-00 00:00:00'),
(10,1,'masterlanguage','Languages','1','2015-06-30 17:46:04','0000-00-00 00:00:00'),
(11,1,'mastermanagedrights','Managed Rights ','1','2015-06-30 17:45:51','0000-00-00 00:00:00'),
(12,1,'mastermaritalstatus','Marital Statuses ','1','2015-06-30 17:46:01','0000-00-00 00:00:00'),
(13,1,'masternationality','Nationalities','1','2015-06-30 17:46:23','0000-00-00 00:00:00'),
(14,1,'organization','Organizations','1','2015-06-30 17:46:35','0000-00-00 00:00:00'),
(15,1,'masterpseudonymtypes','Pseudonym Types','1','2015-06-30 17:46:50','0000-00-00 00:00:00'),
(16,1,'masterpaymentmethod','Payment Methods','1','2015-06-30 17:47:05','0000-00-00 00:00:00'),
(17,1,'masterprofession','Professions','1','2015-06-30 17:47:20','0000-00-00 00:00:00'),
(18,1,'masterregion','Regions','1','2015-06-30 17:47:44','0000-00-00 00:00:00'),
(19,1,'sharedefinitionperrole','Share Definition Per Roles ','1','2015-06-30 17:47:57','0000-00-00 00:00:00'),
(20,1,'mastertype','Types','1','2015-06-30 17:48:22','0000-00-00 00:00:00'),
(21,1,'mastereventtype','Event Types ','1','2015-06-30 17:48:38','0000-00-00 00:00:00'),
(22,1,'mastertyperights','Right Holder Types ','1','2015-06-30 17:48:52','0000-00-00 00:00:00'),
(23,1,'masterterritories','Territories','1','2015-06-30 17:49:03','0000-00-00 00:00:00'),
(24,1,'masterworkscategory','Works Categories','1','2015-06-30 17:49:15','0000-00-00 00:00:00'),
(25,2,'society','Societies','1','2015-06-30 17:50:42','0000-00-00 00:00:00'),
(26,2,'masterrole','Roles','1','2015-06-30 17:50:49','0000-00-00 00:00:00'),
(27,2,'user','Users','1','2015-06-30 17:50:59','0000-00-00 00:00:00'),
(28,3,'authoraccount','Authors','1','2015-06-30 17:51:16','0000-00-00 00:00:00'),
(29,3,'performeraccount','Performers','1','2015-06-30 17:51:26','0000-00-00 00:00:00'),
(30,3,'publisheraccount','Publishers','1','2015-06-30 17:51:44','0000-00-00 00:00:00'),
(31,3,'produceraccount','Producers','1','2015-06-30 17:51:56','0000-00-00 00:00:00'),
(32,3,'authorgroup','Author Groups','1','2015-07-01 10:56:05','0000-00-00 00:00:00'),
(33,3,'performergroup','Performer Groups','1','2015-07-01 10:56:12','0000-00-00 00:00:00'),
(34,3,'publishergroup','Publisher Groups','1','2015-06-30 17:53:27','0000-00-00 00:00:00'),
(35,3,'producergroup','Producer Groups','1','2015-07-01 10:56:16','0000-00-00 00:00:00'),
(36,3,'work','Works','1','2015-06-30 17:53:53','0000-00-00 00:00:00'),
(37,3,'recording','Recordings','1','2015-06-30 17:53:50','0000-00-00 00:00:00'),
(38,3,'contractexpiry','Contract Expiry','1','2015-07-01 13:52:54','0000-00-00 00:00:00'),
(39,3,'producerlabelowner','Product Label Owner','1','2015-07-01 16:30:49','0000-00-00 00:00:00'),
(40,3,'soundcarrier','Sound Carrier','1','2015-07-07 18:04:51','0000-00-00 00:00:00'),
(41,3,'recordingsession','Recording Session','1','2015-07-14 16:34:08','0000-00-00 00:00:00'),
(42,1,'internalcodegenerate','Code Definition','1','2015-07-20 19:17:28','0000-00-00 00:00:00'),
(43,1,'masterplace','Type (Places)','1','2015-07-22 12:03:17','0000-00-00 00:00:00'),
(44,1,'mastertariff','Tariff','1','2015-07-22 18:31:35','0000-00-00 00:00:00'),
(45,4,'customeruser','Users & Customers','1','2015-07-22 19:31:54','0000-00-00 00:00:00'),
(46,4,'inspector','Inspectors','1','2015-07-23 11:49:34','0000-00-00 00:00:00'),
(47,1,'mastercity','City','1','2015-07-28 13:49:45','0000-00-00 00:00:00'),
(48,4,'tariffcontracts','Customer Tariffication','1','2015-07-28 13:53:22','0000-00-00 00:00:00'),
(49,4,'contractinvoice','Invoice','1','2015-08-06 12:49:33','0000-00-00 00:00:00'),
(50,4,'emailtemplate','Email Template','1','2015-08-11 13:48:17','0000-00-00 00:00:00'),
(51,5,'distributionclass','Class','1','2015-09-03 11:52:44','0000-00-00 00:00:00'),
(52,5,'distributionsubclass','Sub-Class','1','2015-09-03 11:52:56','0000-00-00 00:00:00'),
(53,5,'distributionsetting','Setting Dates','1','2015-09-03 11:53:14','0000-00-00 00:00:00'),
(54,5,'distributionutlizationperiod','Utilization Periods','1','2015-09-03 11:53:36','0000-00-00 00:00:00');

/*Table structure for table `wipo_master_studio` */

DROP TABLE IF EXISTS `wipo_master_studio`;

CREATE TABLE `wipo_master_studio` (
  `Master_Studio_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Studio_Code` varchar(10) DEFAULT NULL,
  `Studio_Name` varchar(100) NOT NULL,
  `Studio_Description` text,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Master_Studio_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_studio` */

insert  into `wipo_master_studio`(`Master_Studio_Id`,`Studio_Code`,`Studio_Name`,`Studio_Description`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,NULL,'Studio 1','Studio 1','1','2015-07-09 11:00:15','0000-00-00 00:00:00',NULL,NULL),
(2,NULL,'Studio 2','Studio 1','1','2015-07-09 11:00:22','0000-00-00 00:00:00',NULL,NULL),
(3,NULL,'Studio 3','Studio 3','1','2015-07-09 11:01:06','0000-00-00 00:00:00',NULL,NULL);

/*Table structure for table `wipo_master_tariff` */

DROP TABLE IF EXISTS `wipo_master_tariff`;

CREATE TABLE `wipo_master_tariff` (
  `Master_Tarif_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tarif_Internal_Code` varchar(50) NOT NULL,
  `Tarif_Code` varchar(50) NOT NULL,
  `Tarif_Description` varchar(100) NOT NULL,
  `Tarif_Min_Tarif_Amount` decimal(10,2) DEFAULT NULL,
  `Tarif_Max_Tarif_Amount` decimal(10,2) DEFAULT NULL,
  `Tarif_Amount` decimal(10,2) DEFAULT NULL,
  `Tarif_Percentage` enum('1','0') DEFAULT '0',
  `Tarif_Comment` text,
  `Tarif_Currency_Id` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`Master_Tarif_Id`),
  UNIQUE KEY `NewIndex1` (`Tarif_Internal_Code`),
  KEY `FK_wipo_master_tariff` (`Tarif_Currency_Id`),
  CONSTRAINT `FK_wipo_master_tariff` FOREIGN KEY (`Tarif_Currency_Id`) REFERENCES `wipo_master_currency` (`Master_Crncy_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_tariff` */

insert  into `wipo_master_tariff`(`Master_Tarif_Id`,`Tarif_Internal_Code`,`Tarif_Code`,`Tarif_Description`,`Tarif_Min_Tarif_Amount`,`Tarif_Max_Tarif_Amount`,`Tarif_Amount`,`Tarif_Percentage`,`Tarif_Comment`,`Tarif_Currency_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`,`Active`) values 
(1,'SOC-TAR-0000001','FIX10K','ANNUAL FIXED AMOUNT','10000.00','10000.00','10000.00','1','Test',3,'2015-07-22 18:19:58','0000-00-00 00:00:00',NULL,NULL,'1'),
(3,'SOC-TAR-0000002','FIX12K','ANNUAL FIXED AMOUNT','12000.00','24000.00','12000.00','0','',1,'2015-08-05 12:01:34','0000-00-00 00:00:00',NULL,NULL,'1');

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

insert  into `wipo_master_territories`(`Master_Territory_Id`,`Territory_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(8,'Worldwide','1','2015-04-11 09:01:02','0000-00-00 00:00:00'),
(9,'Asean','1','2015-04-11 09:01:14','0000-00-00 00:00:00'),
(10,'AFGHANISTAN                                                                     ','1','2015-06-12 06:48:16','0000-00-00 00:00:00'),
(11,'AFRICA                                                                          ','1','2015-06-12 06:48:27','0000-00-00 00:00:00'),
(12,'ALBANIA                                                                         ','1','2015-06-12 06:48:40','0000-00-00 00:00:00'),
(13,'ALGERIA                                                                         ','1','2015-06-12 06:48:49','0000-00-00 00:00:00'),
(14,'AMERICA                                                                         ','1','2015-06-12 06:48:57','0000-00-00 00:00:00'),
(15,'AMERICAN CONTINENT                                                              ','1','2015-06-12 06:49:08','0000-00-00 00:00:00'),
(16,'ANDORRA                                                                         ','1','2015-06-12 06:49:16','0000-00-00 00:00:00'),
(17,'ANGOLA                                                                          ','1','2015-06-12 06:49:23','0000-00-00 00:00:00'),
(18,'ANTIGUA AND BARBUDA                                                             ','1','2015-06-12 06:49:33','0000-00-00 00:00:00'),
(19,'ANTILLES                                                                        ','1','2015-06-12 06:49:43','0000-00-00 00:00:00'),
(20,'APEC COUNTRIES                                                                  ','1','2015-06-12 06:49:52','0000-00-00 00:00:00'),
(21,'ARGENTINA                                                                       ','1','2015-06-12 06:50:02','0000-00-00 00:00:00'),
(22,'ARMENIA                                                                         ','1','2015-06-12 06:50:13','0000-00-00 00:00:00'),
(23,'ASEAN COUNTRIES                                                                 ','1','2015-06-12 06:50:26','0000-00-00 00:00:00'),
(24,'ASIA ','1','2015-06-12 06:50:48','0000-00-00 00:00:00'),
(25,'AUSTRALASIA','1','2015-06-12 06:51:17','0000-00-00 00:00:00'),
(26,'AUSTRALIA                                                                       ','1','2015-06-12 06:51:28','0000-00-00 00:00:00'),
(27,'AZERBAIJAN                                                                      ','1','2015-06-12 06:51:37','0000-00-00 00:00:00'),
(28,'BAHAMAS                                                                         ','1','2015-06-12 06:51:53','0000-00-00 00:00:00'),
(29,'BAHRAIN                                                                         ','1','2015-06-12 06:52:01','0000-00-00 00:00:00'),
(30,'BALKANS                                                                         ','1','2015-06-12 06:52:09','0000-00-00 00:00:00'),
(31,'BALTIC STATES                                                                   ','1','2015-06-12 06:52:17','0000-00-00 00:00:00'),
(32,'BANGLADESH                                                                      ','1','2015-06-12 06:52:26','0000-00-00 00:00:00'),
(33,'BARBADOS                                                                        ','1','2015-06-12 06:52:40','0000-00-00 00:00:00'),
(34,'BELARUS                                                                         ','1','2015-06-12 06:52:50','0000-00-00 00:00:00'),
(35,'BELGIUM                                                                         ','1','2015-06-12 06:53:00','0000-00-00 00:00:00'),
(36,'BOSNIA AND HERZEGOVINA                                                          ','1','2015-06-12 06:53:16','0000-00-00 00:00:00'),
(37,'BRITISH WEST INDIES                                                             ','1','2015-06-12 06:53:27','0000-00-00 00:00:00'),
(38,'BRITISH WEST INDIES                                                             ','1','2015-06-12 06:53:27','0000-00-00 00:00:00'),
(39,'BRITISH ISLES                                                                   ','1','2015-06-12 06:53:35','0000-00-00 00:00:00'),
(40,'BRUNEI DARUSSALAM                                                               ','1','2015-06-12 06:53:45','0000-00-00 00:00:00'),
(41,'BURKINA FASO                                                                    ','1','2015-06-12 06:53:55','0000-00-00 00:00:00'),
(42,'CAMBODIA                                                                        ','1','2015-06-12 06:54:10','0000-00-00 00:00:00'),
(43,'CAMEROON                                                                        ','1','2015-06-12 06:54:17','0000-00-00 00:00:00'),
(44,'CANADA                                                                          ','1','2015-06-12 06:54:24','0000-00-00 00:00:00'),
(45,'CAPE VERDE                                                                      ','1','2015-06-12 06:54:37','0000-00-00 00:00:00'),
(46,'CENTRAL AFRICA REGION                                                           ','1','2015-06-12 06:54:47','0000-00-00 00:00:00'),
(47,'CENTRAL AFRICAN REPUBLIC                                                        ','1','2015-06-12 06:54:57','0000-00-00 00:00:00'),
(48,'CENTRAL AMERICA                                                                 ','1','2015-06-12 06:55:10','0000-00-00 00:00:00'),
(49,'COMMONWEALTH                                                                    ','1','2015-06-12 06:55:19','0000-00-00 00:00:00'),
(50,'COMMONWEALTH AFRICAN TERRITORIES                                                ','1','2015-06-12 06:55:35','0000-00-00 00:00:00'),
(51,'COMMONWEALTH ASIAN TERRITORIES                                                  ','1','2015-06-12 06:55:52','0000-00-00 00:00:00'),
(52,'COMMONWEALTH AUSTRALASIAN TERRITORIES                                           ','1','2015-06-12 06:56:03','0000-00-00 00:00:00'),
(53,'COMMONWEALTH OF INDEPENDENT STATES                                              ','1','2015-06-12 06:56:11','0000-00-00 00:00:00'),
(54,'TAIWAN, PROVINCE OF CHINA                                                       ','1','2015-06-12 07:33:30','0000-00-00 00:00:00'),
(55,'EQUATORIAL GUINEA                                                               ','1','2015-06-12 07:33:47','0000-00-00 00:00:00'),
(56,'ETHIOPIA                                                                        ','1','2015-06-12 07:43:20','0000-00-00 00:00:00'),
(57,'FRENCH POLYNESIA                                                                ','1','2015-06-12 07:43:49','0000-00-00 00:00:00'),
(58,'FINLAND                                                                         ','1','2015-06-12 07:43:59','0000-00-00 00:00:00'),
(59,'FRANCE                                                                          ','1','2015-06-12 07:44:26','0000-00-00 00:00:00'),
(60,'DJIBOUTI                                                                        ','1','2015-06-12 07:44:36','0000-00-00 00:00:00'),
(61,'GABON                                                                           ','1','2015-06-12 07:54:02','0000-00-00 00:00:00'),
(62,'GEORGIA                                                                         ','1','2015-06-12 07:55:39','0000-00-00 00:00:00'),
(63,'GAMBIA                                                                          ','1','2015-06-12 07:55:49','0000-00-00 00:00:00'),
(64,'GERMANY                                                                         ','1','2015-06-12 07:55:58','0000-00-00 00:00:00'),
(65,'GERMAN DEMOCRATIC REPUBLIC                                                      ','1','2015-06-12 07:56:08','0000-00-00 00:00:00'),
(66,'KIRIBATI                                                                           ','1','2015-06-12 07:56:51','0000-00-00 00:00:00'),
(67,'GREECE                                                                          ','1','2015-06-12 07:57:01','0000-00-00 00:00:00'),
(68,'GRENADA                                                                         ','1','2015-06-12 07:57:09','0000-00-00 00:00:00'),
(69,'GUATEMALA                                                                       ','1','2015-06-12 07:57:17','0000-00-00 00:00:00'),
(70,'HOLY SEE (VATICAN CITY STATE)                                                   ','1','2015-06-12 07:57:29','0000-00-00 00:00:00'),
(71,'HONDURAS                                                                        ','1','2015-06-12 07:57:37','0000-00-00 00:00:00'),
(72,'HONG KONG                                                                       ','1','2015-06-12 07:57:44','0000-00-00 00:00:00'),
(73,'HUNGARY                                                                         ','1','2015-06-12 07:57:52','0000-00-00 00:00:00'),
(74,'ICELAND                                                                         ','1','2015-06-12 07:57:59','0000-00-00 00:00:00'),
(75,'INDIA                                                                           ','1','2015-06-12 07:58:07','0000-00-00 00:00:00'),
(76,'INDONESIA                                                                       ','1','2015-06-12 07:58:27','0000-00-00 00:00:00'),
(77,'IRAN, ISLAMIC REPUBLIC OF                                                       ','1','2015-06-12 07:58:36','0000-00-00 00:00:00'),
(78,'IRAQ                                                                            ','1','2015-06-12 07:59:10','0000-00-00 00:00:00'),
(79,'IRELAND                                                                         ','1','2015-06-12 07:59:18','0000-00-00 00:00:00'),
(80,'ISRAEL                                                                          ','1','2015-06-12 07:59:26','0000-00-00 00:00:00'),
(81,'ITALY                                                                           ','1','2015-06-12 07:59:34','0000-00-00 00:00:00'),
(82,'COTE D\'IVOIRE                                                                   ','1','2015-06-12 07:59:42','0000-00-00 00:00:00'),
(83,'JAMAICA                                                                         ','1','2015-06-12 07:59:53','0000-00-00 00:00:00'),
(84,'JAPAN                                                                           ','1','2015-06-12 08:00:02','0000-00-00 00:00:00'),
(85,'KAZAKSTAN                                                                       ','1','2015-06-12 08:00:10','0000-00-00 00:00:00'),
(86,'JORDAN                                                                          ','1','2015-06-12 08:00:18','0000-00-00 00:00:00'),
(87,'KENYA                                                                           ','1','2015-06-12 08:00:26','0000-00-00 00:00:00'),
(88,'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF                                          ','1','2015-06-12 08:00:34','0000-00-00 00:00:00'),
(89,'KUWAIT                                                                          ','1','2015-06-12 08:00:47','0000-00-00 00:00:00'),
(90,'KYRGYZSTAN                                                                      ','1','2015-06-12 08:00:57','0000-00-00 00:00:00'),
(91,'LAO PEOPLE\'S DEMOCRATIC REPUBLIC                                                ','1','2015-06-12 08:01:49','0000-00-00 00:00:00'),
(92,'LEBANON                                                                         ','1','2015-06-12 08:01:57','0000-00-00 00:00:00'),
(93,'LESOTHO                                                                         ','1','2015-06-12 08:02:05','0000-00-00 00:00:00'),
(94,'LIBERIA                                                                         ','1','2015-06-12 08:02:13','0000-00-00 00:00:00'),
(95,'LIBYAN ARAB JAMAHIRIYA                                                          ','1','2015-06-12 08:10:32','0000-00-00 00:00:00'),
(96,'LIECHTENSTEIN                                                                   ','1','2015-06-12 08:10:40','0000-00-00 00:00:00'),
(97,'LUXEMBOURG                                                                      ','1','2015-06-12 08:10:49','0000-00-00 00:00:00'),
(98,'MADAGASCAR                                                                      ','1','2015-06-12 08:10:58','0000-00-00 00:00:00'),
(99,'MALAWI                                                                          ','1','2015-06-12 08:11:06','0000-00-00 00:00:00'),
(100,'MALAYSIA                                                                        ','1','2015-06-12 08:11:13','0000-00-00 00:00:00'),
(101,'MALDIVES                                                                        ','1','2015-06-12 08:11:19','0000-00-00 00:00:00'),
(102,'MALI                                                                            ','1','2015-06-12 08:12:44','0000-00-00 00:00:00'),
(103,'MAURITANIA                                                                      ','1','2015-06-12 08:13:07','0000-00-00 00:00:00'),
(104,'MAURITIUS                                                                       ','1','2015-06-12 08:13:16','0000-00-00 00:00:00'),
(105,'MEXICO                                                                          ','1','2015-06-12 08:13:25','0000-00-00 00:00:00'),
(106,'MOLDOVA, REPUBLIC OF                                                            ','1','2015-06-12 08:13:35','0000-00-00 00:00:00'),
(107,'MOZAMBIQUE                                                                      ','1','2015-06-12 08:13:44','0000-00-00 00:00:00'),
(108,'NETHERLANDS                                                                     ','1','2015-06-12 08:13:54','0000-00-00 00:00:00'),
(109,'NEPAL                                                                           ','1','2015-06-12 08:14:02','0000-00-00 00:00:00'),
(110,'VANUATU                                                                         ','1','2015-06-12 08:14:10','0000-00-00 00:00:00'),
(111,'NEW ZEALAND                                                                     ','1','2015-06-12 08:14:16','0000-00-00 00:00:00'),
(112,'NICARAGUA                                                                       ','1','2015-06-12 08:14:24','0000-00-00 00:00:00'),
(113,'NIGER                                                                           ','1','2015-06-12 08:14:32','0000-00-00 00:00:00'),
(114,'NIGERIA                                                                         ','1','2015-06-12 08:14:40','0000-00-00 00:00:00'),
(115,'MICRONESIA, FEDERATED STATES OF                                                 ','1','2015-06-12 08:14:53','0000-00-00 00:00:00'),
(116,'NORWAY                                                                          ','1','2015-06-12 08:15:00','0000-00-00 00:00:00'),
(117,'MARSHALL ISLANDS                                                                ','1','2015-06-12 08:15:08','0000-00-00 00:00:00'),
(118,'PAKISTAN                                                                        ','1','2015-06-12 08:15:15','0000-00-00 00:00:00'),
(119,'PANAMA                                                                          ','1','2015-06-12 08:15:23','0000-00-00 00:00:00'),
(120,'PAPUA NEW GUINEA                                                                ','1','2015-06-12 08:15:30','0000-00-00 00:00:00'),
(121,'PARAGUAY                                                                        ','1','2015-06-12 08:15:37','0000-00-00 00:00:00'),
(122,'PERU                                                                            ','1','2015-06-12 08:15:45','0000-00-00 00:00:00'),
(123,'PHILIPPINES                                                                     ','1','2015-06-12 08:15:51','0000-00-00 00:00:00'),
(124,'POLAND                                                                          ','1','2015-06-12 08:15:58','0000-00-00 00:00:00'),
(125,'PORTUGAL                                                                        ','1','2015-06-12 08:16:04','0000-00-00 00:00:00'),
(126,'GUINEA-BISSAU                                                                   ','1','2015-06-12 08:16:10','0000-00-00 00:00:00'),
(127,'PUERTO RICO                                                                     ','1','2015-06-12 08:16:18','0000-00-00 00:00:00'),
(128,'QATAR                                                                           ','1','2015-06-12 08:16:29','0000-00-00 00:00:00'),
(129,'ROMANIA                                                                         ','1','2015-06-12 08:16:35','0000-00-00 00:00:00'),
(130,'RUSSIAN FEDERATION                                                              ','1','2015-06-12 08:16:44','0000-00-00 00:00:00'),
(131,'RWANDA                                                                          ','1','2015-06-12 08:16:54','0000-00-00 00:00:00'),
(132,'SAINT KITTS AND NEVIS                                                           ','1','2015-06-12 08:17:28','0000-00-00 00:00:00'),
(133,'SAINT LUCIA                                                                     ','1','2015-06-12 08:17:35','0000-00-00 00:00:00'),
(134,'SAINT VINCENT AND THE GRENADINES                                                ','1','2015-06-12 08:17:54','0000-00-00 00:00:00'),
(135,'SAO TOME AND PRINCIPE                                                           ','1','2015-06-12 08:18:22','0000-00-00 00:00:00'),
(136,'SAUDI ARABIA                                                                    ','1','2015-06-12 08:20:32','0000-00-00 00:00:00'),
(137,'SENEGAL                                                                         ','1','2015-06-12 08:20:41','0000-00-00 00:00:00'),
(138,'SIERRA LEONE                                                                    ','1','2015-06-12 08:21:23','0000-00-00 00:00:00'),
(139,'SINGAPORE                                                                       ','1','2015-06-12 08:21:31','0000-00-00 00:00:00'),
(140,'SLOVAKIA                                                                        ','1','2015-06-12 08:21:39','0000-00-00 00:00:00'),
(141,'VIET NAM                                                                        ','1','2015-06-12 08:21:48','0000-00-00 00:00:00'),
(142,'SOMALIA                                                                         ','1','2015-06-12 08:21:58','0000-00-00 00:00:00'),
(143,'SOUTH AFRICA                                                                    ','1','2015-06-12 08:22:05','0000-00-00 00:00:00'),
(144,'ZIMBABWE                                                                        ','1','2015-06-12 08:22:13','0000-00-00 00:00:00'),
(145,'YEMEN, DEMOCRATIC                                                               ','1','2015-06-12 08:22:20','0000-00-00 00:00:00'),
(146,'SPAIN                                                                           ','1','2015-06-12 08:22:27','0000-00-00 00:00:00'),
(147,'WESTERN SAHARA                                                                  ','1','2015-06-12 08:22:33','0000-00-00 00:00:00'),
(148,'SUDAN                                                                           ','1','2015-06-12 08:22:40','0000-00-00 00:00:00'),
(149,'SWAZILAND                                                                       ','1','2015-06-12 08:22:50','0000-00-00 00:00:00'),
(150,'SWEDEN                                                                          ','1','2015-06-12 08:22:58','0000-00-00 00:00:00'),
(151,'SWITZERLAND                                                                     ','1','2015-06-12 08:23:05','0000-00-00 00:00:00'),
(152,'SYRIAN ARAB REPUBLIC                                                            ','1','2015-06-12 08:23:14','0000-00-00 00:00:00'),
(153,'TAJIKISTAN                                                                      ','1','2015-06-12 08:23:21','0000-00-00 00:00:00'),
(154,'THAILAND                                                                        ','1','2015-06-12 08:23:29','0000-00-00 00:00:00'),
(155,'TRINIDAD AND TOBAGO                                                             ','1','2015-06-12 08:23:40','0000-00-00 00:00:00'),
(156,'UNITED ARAB EMIRATES                                                            ','1','2015-06-12 08:23:49','0000-00-00 00:00:00'),
(157,'TUNISIA                                                                         ','1','2015-06-12 08:23:57','0000-00-00 00:00:00'),
(158,'TURKEY                                                                          ','1','2015-06-12 08:24:05','0000-00-00 00:00:00'),
(159,'TURKMENISTAN                                                                    ','1','2015-06-12 08:24:38','0000-00-00 00:00:00'),
(160,'UGANDA                                                                          ','1','2015-06-12 08:24:48','0000-00-00 00:00:00'),
(161,'UKRAINE                                                                         ','1','2015-06-12 08:24:56','0000-00-00 00:00:00'),
(162,'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF                                      ','1','2015-06-12 08:25:02','0000-00-00 00:00:00'),
(163,'EGYPT                                                                           ','1','2015-06-12 08:25:13','0000-00-00 00:00:00'),
(164,'UNITED KINGDOM                                                                  ','1','2015-06-12 08:25:19','0000-00-00 00:00:00'),
(165,'TANZANIA, UNITED REPUBLIC OF                                                    ','1','2015-06-12 08:25:27','0000-00-00 00:00:00'),
(166,'UNITED STATES                                                                   ','1','2015-06-12 08:25:35','0000-00-00 00:00:00'),
(167,'BURKINA FASO                                                                    ','1','2015-06-12 08:25:42','0000-00-00 00:00:00'),
(168,'URUGUAY                                                                         ','1','2015-06-12 08:25:53','0000-00-00 00:00:00'),
(169,'UZBEKISTAN                                                                      ','1','2015-06-12 08:26:00','0000-00-00 00:00:00'),
(170,'VENEZUELA                                                                       ','1','2015-06-12 08:26:08','0000-00-00 00:00:00'),
(171,'SAMOA                                                                           ','1','2015-06-12 08:26:14','0000-00-00 00:00:00'),
(172,'YUGOSLAVIA (0890)                                                               ','1','2015-06-12 08:26:26','0000-00-00 00:00:00'),
(173,'ZAMBIA                                                                          ','1','2015-06-12 08:26:33','0000-00-00 00:00:00'),
(174,'WEST AFRICA REGION                                                              ','1','2015-06-12 08:27:07','0000-00-00 00:00:00'),
(175,'WEST INDIES                                                                     ','1','2015-06-12 08:27:17','0000-00-00 00:00:00'),
(176,'SOUTH EAST ASIA                                                                 ','1','2015-06-12 08:27:25','0000-00-00 00:00:00'),
(177,'SOUTH AMERICA                                                                   ','1','2015-06-12 08:27:38','0000-00-00 00:00:00'),
(178,'SCANDINAVIA                                                                     ','1','2015-06-12 08:27:49','0000-00-00 00:00:00'),
(179,'OCEANIA                                                                         ','1','2015-06-12 08:27:57','0000-00-00 00:00:00'),
(180,'NORTH AMERICA                                                                   ','1','2015-06-12 08:28:04','0000-00-00 00:00:00'),
(181,'NORTH AFRICA                                                                    ','1','2015-06-12 08:28:11','0000-00-00 00:00:00'),
(182,'NORDIC COUNTRIES                                                                ','1','2015-06-12 08:28:18','0000-00-00 00:00:00'),
(183,'NAFTA COUNTRIES                                                                 ','1','2015-06-12 08:28:25','0000-00-00 00:00:00'),
(184,'MIDDLE EAST                                                                     ','1','2015-06-12 08:28:33','0000-00-00 00:00:00'),
(185,'GSA COUNTRIES                                                                   ','1','2015-06-12 08:28:40','0000-00-00 00:00:00'),
(186,'EUROPEAN UNION                                                                  ','1','2015-06-12 08:28:46','0000-00-00 00:00:00'),
(187,'EUROPEAN ECONOMIC COMMUNITY                                                     ','1','2015-06-12 08:28:53','0000-00-00 00:00:00'),
(188,'EUROPEAN CONTINENT                                                              ','1','2015-06-12 08:29:04','0000-00-00 00:00:00'),
(189,'EUROPEAN ECONOMIC AREA                                                          ','1','2015-06-12 08:29:13','0000-00-00 00:00:00'),
(190,'EASTERN EUROPE                                                                  ','1','2015-06-12 08:29:22','0000-00-00 00:00:00'),
(191,'SOUTH AFRICA REGION                                                             ','1','2015-06-12 08:30:01','0000-00-00 00:00:00'),
(192,'EAST AFRICA REGION                                                              ','1','2015-06-12 08:30:22','0000-00-00 00:00:00');

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

insert  into `wipo_master_type`(`Master_Type_Id`,`Type_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'Jazz','1','2015-04-02 00:56:59','0000-00-00 00:00:00'),
(2,'Popular','1','2015-04-02 00:57:05','0000-00-00 00:00:00'),
(3,'Serious','1','2015-04-02 00:57:16','0000-00-00 00:00:00'),
(4,'Modern','1','2015-05-21 14:29:34','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_type_rights` */

insert  into `wipo_master_type_rights`(`Master_Type_Rights_Id`,`Type_Rights_Name`,`Type_Rights_Code`,`Type_Rights_Standard`,`Type_Rights_Rank`,`Type_Rights_Occupation`,`Type_Rights_Domain`,`Type_Right_Use`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'MC- Music composer','MC','MC',5,'AU','C',NULL,'1','2015-03-16 03:48:28','0000-00-00 00:00:00'),
(2,'Sub- Publisher','SE','SE',5,'PU','C',NULL,'1','2015-05-09 14:20:00','0000-00-00 00:00:00'),
(4,'Other Musicians and Perfomers','OMP','OMP',6,'PE','R',NULL,'1','2015-05-22 08:49:23','0000-00-00 00:00:00'),
(5,'Author, Writer, Lyricist','A','A',1,'AU','C',NULL,'1','2015-06-05 07:48:25','0000-00-00 00:00:00'),
(6,'Composer','C','C',1,'AU','C',NULL,'1','2015-06-05 07:55:14','0000-00-00 00:00:00'),
(7,'Composer/Author','CA','CA',5,'AU','C',NULL,'1','2015-06-05 07:55:31','0000-00-00 00:00:00'),
(8,'Publisher','E','E',5,'PU','C',NULL,'1','2015-06-05 07:55:48','0000-00-00 00:00:00'),
(9,'Lyricist','LY','LY',1,'AU','C',NULL,'1','2015-06-05 07:56:19','0000-00-00 00:00:00'),
(11,'Producer','PRO','PRO',4,'PR','R',NULL,'1','2015-06-05 07:57:06','0000-00-00 00:00:00'),
(12,'Sub-Author','SA','SA',1,'AU','C',NULL,'1','2015-06-05 07:57:23','0000-00-00 00:00:00'),
(14,'Soloist, Lead Singer','SLC','SLC',6,'PE','R',NULL,'1','2015-06-05 08:10:28','0000-00-00 00:00:00'),
(17,'Guest Singers, Musicians or Supporting Actor','AMG','AMG',6,'PE','R',NULL,'1','2015-06-05 08:11:44','0000-00-00 00:00:00'),
(19,'Arranger','AR','AR',1,'AU','C',NULL,'1','2015-06-05 08:16:19','0000-00-00 00:00:00'),
(21,'Sub-Arranger','SR','SR',1,'AU','C',NULL,'1','2015-06-05 08:17:10','0000-00-00 00:00:00'),
(22,'Adapter / Translator','AD/TR','AD/TR',1,'AU','C',NULL,'1','2015-06-18 08:14:06','0000-00-00 00:00:00'),
(23,'Music Publisher','EM','EM',3,'PU','C',NULL,'1','2015-06-18 08:14:56','0000-00-00 00:00:00'),
(32,'Music composerr','MU','MU',3,'PU','C',NULL,'1','2015-09-21 15:43:51','0000-00-00 00:00:00');

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

insert  into `wipo_master_works_category`(`Master_Work_Category_Id`,`Work_Category_Name`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'MW-Music works','1','2015-03-16 03:48:12','0000-00-00 00:00:00');

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

insert  into `wipo_number_assignment`(`Num_Assgn_Id`,`Num_Assgn_System_Id`,`Num_Assgn_Series_From`,`Num_Assgn_Series_To`,`Num_Assgn_List`,`Active`,`Created_Date`,`Rowversion`) values 
(2,'test',0,0,'5,2,4','1','2015-03-23 02:55:48','0000-00-00 00:00:00');

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
  `Org_Administrative_Cost` decimal(10,2) DEFAULT '0.00',
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_organization` */

insert  into `wipo_organization`(`Org_Id`,`Org_Code`,`Org_Abbrevation`,`Org_Nation_Id`,`Org_Country_Id`,`Org_Currency_Id`,`Org_Society_Type_Id`,`Org_Address`,`Org_Telephone`,`Org_Email`,`Org_Fax`,`Org_Website`,`Org_Bank_Account`,`Org_Related_Rights`,`Org_Administrative_Cost`,`Active`,`Created_Date`,`Rowversion`) values 
(1,'SOC001','MRCSN',2,2,3,'Copyright','','','tes@test.com','','','',NULL,'90.00','1',NULL,'0000-00-00 00:00:00'),
(2,'SOC003','NEW ORG',2,2,NULL,'Copyright_Publisher','','','','','','',NULL,'0.00','1','2015-08-20 11:24:41','0000-00-00 00:00:00');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account` */

insert  into `wipo_performer_account`(`Perf_Acc_Id`,`Perf_GUID`,`Perf_Is_Author`,`Perf_Sur_Name`,`Perf_First_Name`,`Perf_Internal_Code`,`Perf_Ipi`,`Perf_Ipi_Base_Number`,`Perf_Ipn_Number`,`Perf_DOB`,`Perf_Place_Of_Birth_Id`,`Perf_Birth_Country_Id`,`Perf_Nationality_Id`,`Perf_Language_Id`,`Perf_Identity_Number`,`Perf_Marital_Status_Id`,`Perf_Spouse_Name`,`Perf_Gender`,`Perf_Non_Member`,`Perf_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'c08b8b32-14e4-11e5-b10a-74d435d335fe','N','Gilson','Nancy','SOC-P-0001001',NULL,NULL,NULL,'0000-00-00',1,2,2,1,'',1,'','F','N',NULL,'1','2015-04-02 20:18:24','0000-00-00 00:00:00',1,NULL),
(2,'c08b8e11-14e4-11e5-b10a-74d435d335fe','N','Hammer','Mary','SOC-P-0001002',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,1,'',1,'','F','N',NULL,'1','2015-04-10 00:41:23','0000-00-00 00:00:00',1,NULL),
(3,'c08b8e9f-14e4-11e5-b10a-74d435d335fe','Y','Raison','Jeanne','SOC-AP-0000042',NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,1,'',1,'','F','N',NULL,'0','2015-04-10 02:30:09','0000-00-00 00:00:00',1,NULL),
(4,'c08b8f23-14e4-11e5-b10a-74d435d335fe','N','Lohani','Rajiv','SOC-P-0001004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'',1,'','M','N',NULL,'1','2015-04-11 09:52:17','0000-00-00 00:00:00',1,NULL),
(6,'c08b8fa0-14e4-11e5-b10a-74d435d335fe','N','Gimhire','Narottham','SOC-P-0001006',NULL,NULL,NULL,'1969-02-12',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-04-21 22:58:40','0000-00-00 00:00:00',1,NULL),
(8,'c08b90a4-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jennifer','SOC-AP-0000031',NULL,2147483647,778965125,'0000-00-00',1,2,4,91,'RT-2323123',1,'Jane','F','N',NULL,'1','2015-06-07 03:47:03','0000-00-00 00:00:00',1,NULL),
(9,'c08b9021-14e4-11e5-b10a-74d435d335fe','N','Y','Willam','SOC-P-0001021',NULL,NULL,NULL,'1990-02-06',NULL,133,131,92,'',1,'','M','N',NULL,'1','2015-06-08 20:11:05','0000-00-00 00:00:00',1,NULL),
(10,'c08b9125-14e4-11e5-b10a-74d435d335fe','Y','Kiyosaki','Robert','SOC-AP-0000033',NULL,NULL,NULL,'2015-06-29',NULL,2,2,40,'',NULL,'','M','Y','\\performeraccount\\767e4ee86cd5d5da2f6f8352019e20be.png','1','2015-06-08 20:20:25','0000-00-00 00:00:00',1,NULL),
(12,'c08b91a2-14e4-11e5-b10a-74d435d335fe','Y','P','Harry','SOC-AP-0000034',NULL,NULL,NULL,'1995-10-24',NULL,2,2,5,'',1,'','M','Y',NULL,'1','2015-06-09 04:18:04','0000-00-00 00:00:00',1,NULL),
(13,'c08b921d-14e4-11e5-b10a-74d435d335fe','N','Jack','Ron','SOC-P-0001011',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',1,'','M','N',NULL,'1','2015-06-09 04:18:30','0000-00-00 00:00:00',1,NULL),
(14,'c08b929b-14e4-11e5-b10a-74d435d335fe','Y','Mac','John','SOC-AP-0000032',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,NULL,'',1,'','M','N',NULL,'1','2015-06-09 06:11:47','0000-00-00 00:00:00',1,NULL),
(15,'c08b931c-14e4-11e5-b10a-74d435d335fe','Y','Atkinson','Rovan','SOC-AP-0000035',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',4,'','M','N',NULL,'1','2015-06-09 06:31:08','0000-00-00 00:00:00',1,NULL),
(17,'B7E7D492-BF77-58D3-F6BD-0C8234C44424','N','James','Hetfield','SOC-P-0001015',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-18 08:27:05','0000-00-00 00:00:00',1,NULL),
(18,'D911F66D-FECF-9144-1A55-A43D760D2E6A','N','Smith','Will','SOC-P-0001016',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-18 08:29:41','0000-00-00 00:00:00',1,NULL),
(72,'c08b3f47-14e4-11e5-b10a-74d435d335fe','Y','Jeann','Jenniferr','SOC-AP-0000036',NULL,2147483647,778965125,'0000-00-00',1,2,4,91,'RT-2323123',1,'Jane','F','N','\\authoraccount\\cc74aac1d77dc2f23cb0b4f8e8baf0b3.jpg','1','2015-06-22 13:02:10','0000-00-00 00:00:00',1,NULL),
(73,'A158E10A-2004-0FDF-54BB-FC625B6BB798','N','Jean','Mary','SOC-P-0001017',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',4,'','F','N','\\performeraccount\\776b5962c1b27d70b072fa3eac5c8bb6.png','1','2015-06-22 18:16:43','0000-00-00 00:00:00',1,NULL),
(74,'c08b43a7-14e4-11e5-b10a-74d435d335fe','Y','Mac','Johnn','SOC-AP-0000037',NULL,NULL,NULL,'0000-00-00',1,NULL,NULL,NULL,'',1,'','M','N',NULL,'1','2015-06-24 10:58:52','0000-00-00 00:00:00',1,NULL),
(75,'79B94C27-C1CC-D0FB-BCCC-A84107E32514','Y','Kumar','Vinod','SOC-AP-0000038',NULL,NULL,NULL,'2000-02-08',NULL,2,2,5,'',1,'','M','Y','\\authoraccount\\a16eaf21d156a28a715cbe2c1c583056.png','1','2015-06-24 11:01:22','0000-00-00 00:00:00',1,NULL),
(79,'E284DCAC-35A8-0BB9-65D9-0148FEAFE274','Y','Raj','Rajesh','SOC-AP-0000040',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-06-24 11:07:46','0000-00-00 00:00:00',1,NULL),
(84,'6170D906-040B-5C94-66C6-6BCC32E0CD1A','Y','Raj','Rajeshn','SOC-A-0001031',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-06-24 11:41:37','2015-10-05 15:07:11',1,10),
(85,'7A79C621-5298-A6A3-EE66-488F71A70DD1','N','Ramesh','Ram','SOC-P-0001018',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-06-24 11:45:05','0000-00-00 00:00:00',1,NULL),
(86,'376D024F-A087-1F1C-F848-BB559BB397A9','N','ry','test','SOC-P-0000151',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','N','/performeraccount/2802cc0b0949d5c20792c5d83810676d.jpeg','1','2015-07-27 17:26:46','2015-09-14 13:50:36',1,12),
(87,'3C40905B-DD47-76A1-00F3-4647F10233D0','N','sdssd','test','SOC-P-0000152',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 17:59:37','0000-00-00 00:00:00',1,NULL),
(88,'7118AE29-4FDB-9B39-6879-9B91F470B0EF','N','sdssd','tests','SOC-P-0000153',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:03:32','0000-00-00 00:00:00',1,NULL),
(89,'A7258787-A249-B883-3DC5-76D26A96493E','N','aaa','test','SOC-P-0000154',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:05:30','0000-00-00 00:00:00',1,NULL),
(90,'DBA74C8E-6344-B81B-2056-75252330630C','N','tt','test','SOC-P-0000155',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:21:20','0000-00-00 00:00:00',1,NULL),
(91,'16B661A7-3D21-9D8A-0E71-029F410253DE','N','test','Test prakash','SOC-P-0000156',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:21:52','0000-00-00 00:00:00',1,NULL),
(92,'5DEC4ADE-1060-C6AA-74F5-B533EADA1E0F','N','sad','test','SOC-P-0000157',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:27:00','0000-00-00 00:00:00',1,NULL),
(93,'99B31EBA-E720-02BE-5447-7A871DAB93AA','N','prakash','Test prakash','SOC-P-0000158',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:32:28','0000-00-00 00:00:00',1,NULL),
(94,'B2611435-D987-C2E6-12BB-B3AEE0114665','Y','test','Test prakashte','SOC-AP-0000305',NULL,NULL,NULL,'0000-00-00',NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:33:20','2015-09-15 17:31:13',10,10),
(95,'B0893BB0-F72A-EFD5-E3B4-26BD6F6AE678','N','aaaaa','aaaa','SOC-P-0000160',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:37:56','0000-00-00 00:00:00',1,NULL),
(96,'12B63C45-4970-7D6A-5272-CD36D60AEDAE','N','bb','bbbbb','SOC-P-0000161',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 18:39:49','0000-00-00 00:00:00',1,NULL),
(97,'C7315D7F-5A4F-5F97-B925-750C0A80B34B','N','raj','raju','SOC-P-0000162',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-07-27 19:17:44','0000-00-00 00:00:00',1,NULL),
(98,'117B805B-9178-8A42-9384-8342961DE794','N','aaaaa','Arti','SOC-P-0000163',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','F','N',NULL,'1','2015-08-01 11:21:33','0000-00-00 00:00:00',1,NULL),
(99,'95215F76-9FC6-6C8D-7BFE-8C7378DA9DFE','N','B','Artist','SOC-P-0000164',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-01 11:21:50','0000-00-00 00:00:00',1,NULL),
(100,'F4497334-8EA1-0E0A-E13D-C8A608BB5872','N','ry','tesert','SOC-P-0000165',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-03 10:32:06','0000-00-00 00:00:00',1,NULL),
(101,'F53FEFC4-FE69-D345-78D7-C83A1EF1B466','N','ry','Testtest','SOC-P-0000166',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:37:45','0000-00-00 00:00:00',1,NULL),
(102,'E44567A9-9268-DC9F-1F41-DBAB2B064BC3','N','adad','aaaaaaaa','SOC-P-0000167',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:39:38','0000-00-00 00:00:00',1,NULL),
(103,'612C806A-AFE1-42F7-0066-F00F2188C4A6','N','aa','aadsadsadasd','SOC-P-0000168',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:42:11','0000-00-00 00:00:00',1,NULL),
(104,'61F7974C-EEA9-85A0-9DD8-3CC865C41058','N','anderson','robin','SOC-P-0000169',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:43:06','0000-00-00 00:00:00',1,NULL),
(105,'E300E40E-063F-440A-8B66-D561FBDE3F56','N','cc','ccccc','SOC-P-0000170',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:47:26','0000-00-00 00:00:00',1,NULL),
(106,'0D628FD5-8574-B573-0726-6509A7B1D549','N','dd','dddddd','SOC-P-0000171',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 15:53:35','0000-00-00 00:00:00',1,NULL),
(107,'EF7414A7-B5F6-F074-0EE1-9451020461EB','N','aa','ddaadd','SOC-P-0000172',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 18:11:07','0000-00-00 00:00:00',1,NULL),
(108,'48BC95A0-E1B1-F91D-768D-E02FC074DF30','N','sss','ss','SOC-P-0000173',NULL,NULL,NULL,NULL,NULL,2,2,5,'',NULL,'','M','N',NULL,'1','2015-08-05 18:12:54','0000-00-00 00:00:00',1,NULL),
(109,'BF9587BC-4D7F-1B08-E607-614F0FD2E5B9','N','ry','New performer e','SOC-P-0000380',NULL,NULL,NULL,'0000-00-00',NULL,2,2,1,'',NULL,'','M','N',NULL,'1','2015-09-14 13:31:50','0000-00-00 00:00:00',12,NULL),
(110,'007A5AA1-7F5E-EE91-C375-2D010945677B','N','Test','Tester testrr','SOC-P-0000382',123321232,123232123,343434,NULL,NULL,2,2,5,'12332123',1,NULL,'M','N',NULL,'1','2015-09-19 16:51:07','0000-00-00 00:00:00',10,NULL),
(111,'814CBA61-1687-117F-6655-E8744431D41C','N','Test','Tester testee','SOC-P-0000383',123321232,123232123,343434,NULL,NULL,2,2,5,'12332123',1,NULL,'M','N',NULL,'1','2015-09-19 16:52:24','0000-00-00 00:00:00',10,NULL),
(112,'472DD011-C4C1-A5D5-C9AC-500698228F5D','N','Test rrrtr','Tester testrr','SOC-P-0000384',123321232,123232123,343434,NULL,NULL,2,2,5,'12332123',1,NULL,'M','N',NULL,'1','2015-09-21 11:20:53','0000-00-00 00:00:00',10,NULL),
(113,'FA596FAB-9873-9FF9-DBD9-7E3B5C854D49','N','Testwwee','Tester testee','SOC-P-0000385',123321232,123232123,343434,NULL,NULL,2,2,5,'12332123',1,NULL,'M','N',NULL,'1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_performer_account_address` */

DROP TABLE IF EXISTS `wipo_performer_account_address`;

CREATE TABLE `wipo_performer_account_address` (
  `Perf_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Home_Address_1` text NOT NULL,
  `Perf_Home_Address_2` varchar(255) DEFAULT NULL,
  `Perf_Home_Address_3` varchar(255) DEFAULT NULL,
  `Perf_Home_Fax` varchar(25) DEFAULT NULL,
  `Perf_Home_Telephone` varchar(25) NOT NULL,
  `Perf_Home_Email` varchar(50) NOT NULL,
  `Perf_Home_Website` varchar(100) DEFAULT NULL,
  `Perf_Mailing_Address_1` text NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Perf_Addr_Id`),
  KEY `FK_wipo_performer_account_address_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_account_address_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_account_address` */

insert  into `wipo_performer_account_address`(`Perf_Addr_Id`,`Perf_Acc_Id`,`Perf_Home_Address_1`,`Perf_Home_Address_2`,`Perf_Home_Address_3`,`Perf_Home_Fax`,`Perf_Home_Telephone`,`Perf_Home_Email`,`Perf_Home_Website`,`Perf_Mailing_Address_1`,`Perf_Mailing_Address_2`,`Perf_Mailing_Address_3`,`Perf_Mailing_Telephone`,`Perf_Mailing_Fax`,`Perf_Mailing_Email`,`Perf_Mailing_Website`,`Perf_Author_Account_1`,`Perf_Author_Account_2`,`Perf_Author_Account_3`,`Perf_Performer_Account_1`,`Perf_Performer_Account_2`,`Perf_Performer_Account_3`,`Perf_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Test1','','','','12323123','test@etst.com','','Test','','','13123123','','test@etst.com','',NULL,NULL,NULL,'','','','Y','1','2015-04-02 20:25:12','0000-00-00 00:00:00',1,NULL),
(2,7,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','123213123','test@test.com','','','','','','','','Y','1','2015-06-04 05:03:40','0000-00-00 00:00:00',1,NULL),
(3,8,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-07 03:47:03','0000-00-00 00:00:00',1,NULL),
(4,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:06:56','0000-00-00 00:00:00',1,NULL),
(5,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:07:06','0000-00-00 00:00:00',1,NULL),
(6,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:07:46','0000-00-00 00:00:00',1,NULL),
(7,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-08 20:08:03','0000-00-00 00:00:00',1,NULL),
(8,10,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-08 20:52:14','0000-00-00 00:00:00',1,NULL),
(9,8,'Home address 1','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-09 04:14:16','0000-00-00 00:00:00',1,NULL),
(10,10,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-09 04:14:30','0000-00-00 00:00:00',1,NULL),
(27,72,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-22 13:02:11','0000-00-00 00:00:00',1,NULL),
(28,72,'Home address 11','Home address 2','Home address 3','23213213','123312321','test@test.com','http://test.com','Mail address 1','Mail address 2','Mail address 3','1232313','123213123','test@test.com','http://test.com','Author Account 1','Author Account 2','Author Account 3','Account 1','Account 2','Account 3','Y','1','2015-06-22 13:19:24','0000-00-00 00:00:00',1,NULL),
(29,10,'Home address 11','','','','1232313','test@test.com','','Mail address 1','','','1232313','','test@test.com','','','','','','','','N','1','2015-06-26 15:47:43','0000-00-00 00:00:00',1,NULL),
(30,84,'Home address 111','','','','12323123','test@etst.com','','Mail address 1a','','','13123123','','test@etst.com','','','','','','','','Y','1','2015-07-03 12:04:24','2015-10-05 15:07:11',10,10),
(31,110,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-19 16:51:07','0000-00-00 00:00:00',10,NULL),
(32,111,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-19 16:52:24','0000-00-00 00:00:00',10,NULL),
(33,112,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-21 11:20:53','0000-00-00 00:00:00',10,NULL),
(34,113,'test',NULL,NULL,'23123123','32132123','test2@testoc.cpo','www.google.com','test',NULL,NULL,'1232312','2323123','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,'N','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_performer_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_performer_biograph_uploads`;

CREATE TABLE `wipo_performer_biograph_uploads` (
  `Perf_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Biogrph_Id` int(11) NOT NULL,
  `Perf_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Perf_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Perf_Biogrph_Upl_Id`),
  KEY `FK_wipo_performer_biograph_uploads_biography` (`Perf_Biogrph_Id`),
  CONSTRAINT `FK_wipo_performer_biograph_uploads_biography` FOREIGN KEY (`Perf_Biogrph_Id`) REFERENCES `wipo_performer_biography` (`Perf_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_biograph_uploads` */

insert  into `wipo_performer_biograph_uploads`(`Perf_Biogrph_Upl_Id`,`Perf_Biogrph_Id`,`Perf_Biogrph_Upl_File`,`Perf_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,29,'\\performerbiographuploads\\03cb2461521eab8793ac7c74427613e9.jpg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(2,29,'\\performerbiographuploads\\652b172a5e4337bc049ba53498129b22.jpeg',NULL,'2015-06-24 13:51:48','0000-00-00 00:00:00',1,NULL),
(3,29,'\\performerbiographuploads\\c85718d44cf184cfb3e9490eff9d51cd.jpg','test','2015-07-03 12:05:06','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_performer_biography` */

DROP TABLE IF EXISTS `wipo_performer_biography`;

CREATE TABLE `wipo_performer_biography` (
  `Perf_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Perf_Biogrph_Id`),
  KEY `FK_wipo_performer_biography_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_biography_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_biography` */

insert  into `wipo_performer_biography`(`Perf_Biogrph_Id`,`Perf_Acc_Id`,`Perf_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Test','1','2015-04-02 20:26:21','0000-00-00 00:00:00',NULL,NULL),
(2,8,'test','1','2015-06-07 03:47:03','0000-00-00 00:00:00',NULL,NULL),
(3,8,'test','1','2015-06-08 20:06:56','0000-00-00 00:00:00',NULL,NULL),
(4,8,'test','1','2015-06-08 20:07:06','0000-00-00 00:00:00',NULL,NULL),
(5,8,'test','1','2015-06-08 20:07:46','0000-00-00 00:00:00',NULL,NULL),
(6,8,'test','1','2015-06-08 20:08:03','0000-00-00 00:00:00',NULL,NULL),
(7,8,'test','1','2015-06-09 04:14:16','0000-00-00 00:00:00',NULL,NULL),
(20,72,'test','1','2015-06-22 13:02:11','0000-00-00 00:00:00',NULL,NULL),
(21,72,'test','1','2015-06-22 13:19:25','0000-00-00 00:00:00',NULL,NULL),
(22,74,'test','1','2015-06-24 10:58:52','0000-00-00 00:00:00',NULL,NULL),
(23,75,'Testete ettst','1','2015-06-24 11:01:22','0000-00-00 00:00:00',NULL,NULL),
(25,79,'Test','1','2015-06-24 11:07:46','0000-00-00 00:00:00',NULL,NULL),
(29,84,'test 22','1','2015-06-24 11:41:37','2015-10-05 15:07:11',10,10),
(32,3,'Test','1','2015-06-24 11:54:32','0000-00-00 00:00:00',NULL,NULL),
(33,10,'test','1','2015-06-26 16:03:45','0000-00-00 00:00:00',NULL,NULL),
(34,110,'test test','1','2015-09-19 16:51:07','0000-00-00 00:00:00',10,NULL),
(35,111,'test test','1','2015-09-19 16:52:24','0000-00-00 00:00:00',10,NULL),
(36,112,'test test','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL),
(37,113,'test test','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL);

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
  `Perf_Death_Inhrt_Decease_Date` date DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Death_Inhrt_Id`),
  KEY `FK_wipo_performer_death_inheritance_account_id` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_death_inheritance_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_death_inheritance` */

insert  into `wipo_performer_death_inheritance`(`Perf_Death_Inhrt_Id`,`Perf_Acc_Id`,`Perf_Death_Inhrt_Firstname`,`Perf_Death_Inhrt_Surname`,`Perf_Death_Inhrt_Email`,`Perf_Death_Inhrt_Phone`,`Perf_Death_Inhrt_Address_1`,`Perf_Death_Inhrt_Address_2`,`Perf_Death_Inhrt_Address_3`,`Perf_Death_Inhrt_Addtion_Annotation`,`Perf_Death_Inhrt_Decease_Date`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(1,1,'test','Tset','test@etead.com','test','test','test','test','test',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(2,8,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(3,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(4,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(5,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(6,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(7,8,'Test','Sur','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(8,14,'','Test','','','test','test','test','test',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(15,72,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(16,72,'Test','Surr','test@test.com','sdasd','Address 1','Address 2','Address 3','Note',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(17,74,'','Test','','','test','test','test','test',NULL,1,NULL,NULL,'0000-00-00 00:00:00'),
(18,84,'test','Surr','test@etead.com','test','test','test','test','','2013-02-14',10,10,NULL,'2015-10-05 15:07:12'),
(19,111,'','test death','','','12331 213','','','123321',NULL,10,NULL,'2015-09-19 16:52:24','0000-00-00 00:00:00'),
(20,112,'','test death','','','12331 213','','','123321',NULL,10,NULL,'2015-09-21 11:20:54','0000-00-00 00:00:00'),
(21,113,'','test death','','','12331 213','','','123321',NULL,10,NULL,'2015-09-21 11:20:54','0000-00-00 00:00:00');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Perf_Pay_Id`),
  KEY `FK_wipo_performer_payment_method_account_id` (`Perf_Acc_Id`),
  KEY `FK_wipo_performer_payment_method_payment_mode` (`Perf_Pay_Method_id`),
  CONSTRAINT `FK_wipo_performer_payment_method_account_id` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_payment_method_payment_mode` FOREIGN KEY (`Perf_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_payment_method` */

insert  into `wipo_performer_payment_method`(`Perf_Pay_Id`,`Perf_Acc_Id`,`Perf_Pay_Method_id`,`Perf_Bank_Account_1`,`Perf_Bank_Account_2`,`Perf_Bank_Account_3`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,1,'test','test','test','1','2015-04-02 20:25:24','0000-00-00 00:00:00',1,NULL),
(2,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-07 03:47:03','0000-00-00 00:00:00',1,NULL),
(3,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:06:56','0000-00-00 00:00:00',1,NULL),
(4,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:07:06','0000-00-00 00:00:00',1,NULL),
(5,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:07:46','0000-00-00 00:00:00',1,NULL),
(6,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-08 20:08:03','0000-00-00 00:00:00',1,NULL),
(7,10,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-08 20:52:28','0000-00-00 00:00:00',1,NULL),
(8,8,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-09 04:14:16','0000-00-00 00:00:00',1,NULL),
(9,10,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-09 04:14:30','0000-00-00 00:00:00',1,NULL),
(16,72,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-22 13:02:11','0000-00-00 00:00:00',1,NULL),
(17,72,1,'Bank  Account 1','Bank  Account 2','Bank  Account 3','1','2015-06-22 13:19:24','0000-00-00 00:00:00',1,NULL),
(18,10,2,'test','Bank  Account 21','Bank  Account 3','1','2015-06-26 15:47:43','0000-00-00 00:00:00',1,NULL),
(19,84,2,'test','Bank  Account 21','Bank  Account 3','1','2015-07-03 12:04:46','2015-10-05 15:07:11',10,10),
(20,110,2,'123231','123231','12323','1','2015-09-19 16:51:07','0000-00-00 00:00:00',10,NULL),
(21,111,2,'123231','123231','12323','1','2015-09-19 16:52:24','0000-00-00 00:00:00',10,NULL),
(22,112,2,'123231','123231','12323','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL),
(23,113,2,'123231','123231','12323','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Perf_Pseudo_Id`),
  KEY `FK_wipo_performer_pseudonym_pseodo_type` (`Perf_Pseudo_Type_Id`),
  KEY `FK_wipo_performer_pseudonym_performer_account` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_pseudonym_performer_account` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_performer_pseudonym_pseodo_type` FOREIGN KEY (`Perf_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_pseudonym` */

insert  into `wipo_performer_pseudonym`(`Perf_Pseudo_Id`,`Perf_Acc_Id`,`Perf_Pseudo_Type_Id`,`Perf_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,2,'PSH','1','2015-04-02 20:28:32','0000-00-00 00:00:00',1,NULL),
(2,4,1,'The Lo Man','1','2015-04-11 09:56:27','0000-00-00 00:00:00',1,NULL),
(3,8,1,'Jack','1','2015-06-07 03:47:03','0000-00-00 00:00:00',1,NULL),
(4,8,1,'Jack','1','2015-06-08 20:06:56','0000-00-00 00:00:00',1,NULL),
(5,8,1,'Jack','1','2015-06-08 20:07:06','0000-00-00 00:00:00',1,NULL),
(6,8,1,'Jack','1','2015-06-08 20:07:47','0000-00-00 00:00:00',1,NULL),
(7,8,1,'Jack','1','2015-06-08 20:08:03','0000-00-00 00:00:00',1,NULL),
(8,9,11,'PSH','1','2015-06-08 20:18:01','0000-00-00 00:00:00',1,NULL),
(9,8,1,'Jack','1','2015-06-09 04:14:16','0000-00-00 00:00:00',1,NULL),
(10,9,11,'PSH','1','2015-06-09 04:14:39','0000-00-00 00:00:00',1,NULL),
(16,72,1,'Jack','1','2015-06-22 13:02:11','0000-00-00 00:00:00',1,NULL),
(17,72,1,'Jack','1','2015-06-22 13:19:25','0000-00-00 00:00:00',1,NULL),
(18,84,11,'PSH','1','2015-07-03 12:05:21','2015-10-05 15:07:12',10,10),
(19,110,9,'OR','1','2015-09-19 16:51:07','0000-00-00 00:00:00',10,NULL),
(20,111,9,'OR','1','2015-09-19 16:52:24','0000-00-00 00:00:00',10,NULL),
(21,112,9,'OR','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL),
(22,113,9,'OR','1','2015-09-21 11:20:54','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_related_rights` */

insert  into `wipo_performer_related_rights`(`Perf_Rel_Rgt_Id`,`Perf_Acc_Id`,`Perf_Rel_Society_Id`,`Perf_Rel_Entry_Date`,`Perf_Rel_Exit_Date`,`Perf_Rel_Internal_Position_Id`,`Perf_Rel_Entry_Date_2`,`Perf_Rel_Exit_Date_2`,`Perf_Rel_Region_Id`,`Perf_Rel_Profession_Id`,`Perf_Rel_File`,`Perf_Rel_Duration`,`Perf_Rel_Avl_Work_Cat_Id`,`Perf_Rel_Type_Rght_Id`,`Perf_Rel_Managed_Rights_Id`,`Perf_Rel_Territories_Id`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(1,1,10,'2015-03-31','2015-11-30',1,'2015-03-31','2015-11-30',1,NULL,'','',1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(2,3,10,'2015-04-07','2015-04-30',1,'2015-04-07','2015-04-30',NULL,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(3,4,10,'2015-04-09','2015-04-09',1,'2015-04-09','2015-04-09',NULL,NULL,NULL,NULL,1,1,2,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(5,6,10,'2015-04-19','0000-00-00',1,'2015-04-19','2015-04-19',1,1,NULL,NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(6,9,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9,1,NULL,NULL,'0000-00-00 00:00:00'),
(7,10,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9,1,NULL,NULL,'0000-00-00 00:00:00'),
(8,8,11,'2015-06-08','2015-06-30',6,'2015-06-08','2015-06-30',3,2,'',NULL,1,1,1,9,1,NULL,NULL,'0000-00-00 00:00:00'),
(9,17,11,'2015-06-17','0000-00-00',1,'2015-06-17','0000-00-00',NULL,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(10,18,11,'2015-06-17','0000-00-00',1,'2015-06-17','0000-00-00',NULL,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(12,85,10,'2015-06-24','2015-06-30',6,'2015-06-24','2015-06-30',NULL,NULL,'',NULL,1,1,1,8,1,NULL,NULL,'0000-00-00 00:00:00'),
(13,84,10,'2015-07-03','2015-07-31',6,'2015-07-03','2015-07-31',NULL,NULL,'',NULL,1,1,5,8,1,10,NULL,'2015-10-05 15:07:11'),
(14,111,10,'2015-01-01','2016-01-01',6,'2015-01-01','2016-01-01',1,NULL,'12312123',NULL,1,1,5,109,10,NULL,'2015-09-19 16:52:24','0000-00-00 00:00:00'),
(15,112,10,'2016-01-01','2016-01-01',6,'2015-01-01','2016-01-01',1,NULL,'12312123',NULL,1,1,5,109,10,NULL,'2015-09-21 11:20:54','0000-00-00 00:00:00'),
(16,113,10,'2015-01-01','2016-01-01',6,'2015-01-01','2016-01-01',1,NULL,'12312123',NULL,1,1,5,109,10,NULL,'2015-09-21 11:20:54','0000-00-00 00:00:00');

/*Table structure for table `wipo_performer_upload` */

DROP TABLE IF EXISTS `wipo_performer_upload`;

CREATE TABLE `wipo_performer_upload` (
  `Perf_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Perf_Acc_Id` int(11) NOT NULL,
  `Perf_Upl_Doc_Name` varchar(255) NOT NULL,
  `Perf_Upl_File` varchar(1000) NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Perf_Upl_Id`),
  KEY `FK_wipo_performer_upload_auth` (`Perf_Acc_Id`),
  CONSTRAINT `FK_wipo_performer_upload_auth` FOREIGN KEY (`Perf_Acc_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_performer_upload` */

insert  into `wipo_performer_upload`(`Perf_Upl_Id`,`Perf_Acc_Id`,`Perf_Upl_Doc_Name`,`Perf_Upl_File`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(9,1,'test 5','\\performerupload\\0c1165ada6b73a5f050436ffdc026c4e.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(10,1,'test','\\performerupload\\17bb30b1bcb4ab9548b8af97b82e0a89.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(12,7,'Performer upload','/performerupload/4d7140575e4c0daafd308890d69f11bf.txt',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(13,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(14,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(15,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(16,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(17,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(18,8,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(19,72,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(20,72,'Profile Picture','/authorupload/7fdc068699cd10c841c416985560ea76.jpg',NULL,NULL,NULL,'0000-00-00 00:00:00'),
(26,84,'test','\\authorupload\\c0ad1680aabf78bcb7001151d6564849.png',10,10,NULL,'2015-10-05 15:07:12'),
(27,84,'test','/performerupload/9c16f2b2ce1f24ea7cdd3dd9f67cdd8a.png',10,10,'2015-07-28 13:13:53','2015-10-05 15:07:12');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Acc_Id`),
  UNIQUE KEY `Pro_GUID_unique` (`Pro_GUID`),
  KEY `FK_wipo_producer_account_country` (`Pro_Country_Id`),
  KEY `FK_wipo_producer_account_legal_form` (`Pro_Legal_Form_id`),
  KEY `FK_wipo_producer_account_language` (`Pro_Language_Id`),
  CONSTRAINT `FK_wipo_producer_account_country` FOREIGN KEY (`Pro_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_language` FOREIGN KEY (`Pro_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_legal_form` FOREIGN KEY (`Pro_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account` */

insert  into `wipo_producer_account`(`Pro_Acc_Id`,`Pro_GUID`,`Pro_Is_Publisher`,`Pro_Corporate_Name`,`Pro_Internal_Code`,`Pro_Ipi`,`Pro_Ipi_Base_Number`,`Pro_Date`,`Pro_Place`,`Pro_Country_Id`,`Pro_Legal_Form_id`,`Pro_Reg_Date`,`Pro_Reg_Number`,`Pro_Excerpt_Date`,`Pro_Language_Id`,`Pro_Non_Member`,`Pro_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(4,'c08be234-14e4-11e5-b10a-74d435d335fe','Y','ABM Limited','SOC-EPR-0000008',NULL,NULL,'2015-04-22','',2,1,'0000-00-00','','2015-04-29',1,'Y','\\produceraccount\\beb0d5fa7972e3553160195e32a54ebc.jpeg','1','2015-04-29 18:21:39','2015-07-28 09:52:27',1,1),
(5,'c08f18ba-14e4-11e5-b10a-74d435d335fe','N','OPM Limited','SOC-PR-0000101',NULL,NULL,'2015-04-30','',2,1,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-04-30 19:21:11','0000-00-00 00:00:00',1,NULL),
(6,'c08f1a1f-14e4-11e5-b10a-74d435d335fe','N','Producer 079','SOC-PR-0000106',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-10 03:37:46','0000-00-00 00:00:00',1,NULL),
(7,'c08f1b48-14e4-11e5-b10a-74d435d335fe','N','Jerry Bruckheimer','SOC-PR-0000107',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 13:19:03','0000-00-00 00:00:00',1,NULL),
(8,'c08f1c62-14e4-11e5-b10a-74d435d335fe','N','MGM','SOC-PR-0000108',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 15:54:16','0000-00-00 00:00:00',1,NULL),
(9,'c08bbf35-14e4-11e5-b10a-74d435d335fe','Y','ACOL Limited','SOC-EPR-0000004',12321,3212323,'1989-02-02','',2,1,'2015-04-30','','0000-00-00',1,'Y','\\publisheraccount\\2d3af81b19fe80808ed3269b0f65c262.png','1','2015-06-09 04:20:37','0000-00-00 00:00:00',1,NULL),
(10,'c08f1ec6-14e4-11e5-b10a-74d435d335fe','Y','BGM Limited','SOC-EPR-0000005',8388607,8388607,'1991-02-26','Nepal',2,1,'2015-06-17','A8985-45794-T78','2015-04-16',1,'N',NULL,'1','2015-06-09 06:41:53','0000-00-00 00:00:00',1,NULL),
(14,'c08bb73b-14e4-11e5-b10a-74d435d335fe','Y','CAG Limited','SOC-E-0000113',NULL,NULL,'1999-02-01','',2,NULL,'0000-00-00','','2012-02-08',1,'N',NULL,'1','2015-06-24 14:02:30','0000-00-00 00:00:00',1,NULL),
(15,'7B8B4F53-5142-AB67-8CA3-D7248E5042E1','N','test','SOC-PR-0000112',NULL,NULL,'2015-07-15',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-07-27 19:04:09','0000-00-00 00:00:00',1,NULL),
(16,'358A74B6-10F8-0690-B113-5ACA72A8D74B','N','new prod','SOC-PR-0000113',NULL,NULL,'2015-07-22',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-07-27 19:17:59','0000-00-00 00:00:00',1,NULL),
(17,'DEEE0290-FC91-D0B6-7627-07247B257380','N','adad','SOC-PR-0000114',NULL,NULL,'2015-07-09',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-07-27 20:20:17','2015-10-05 15:21:42',1,10),
(18,'0BCF0674-61DE-79C1-4D89-C5F9907F6AB9','N','asdasdsad','SOC-PR-0000115',NULL,NULL,'2015-07-14',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-07-27 20:20:36','0000-00-00 00:00:00',1,NULL),
(19,'8057536F-D513-8DEB-4E96-B2AD628956E7','N','asdsda','SOC-PR-0000116',NULL,NULL,'2015-07-14',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-07-27 20:21:42','0000-00-00 00:00:00',1,NULL),
(20,'DFB78953-991F-3EF2-F3CE-B5604803FCA8','N','New prod corp','SOC-PR-0000117',NULL,NULL,'2015-08-01',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-08-01 11:17:44','0000-00-00 00:00:00',1,NULL),
(21,'142279A6-E3B4-FA7F-2B1D-95479280B0B1','N','New corp','SOC-PR-0000118',NULL,NULL,'2015-08-01',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-08-01 11:21:22','0000-00-00 00:00:00',1,NULL),
(22,'9241B5AE-98F5-1C09-7A98-095A45B2ABEF','N','test11','SOC-PR-0000119',NULL,NULL,'2015-08-19',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-08-03 10:52:46','0000-00-00 00:00:00',1,NULL),
(23,'C58A39F0-1836-A975-8CFC-043882983250','N','adadaaa','SOC-PR-0000120',NULL,NULL,'2015-08-04',NULL,2,NULL,'0000-00-00','','0000-00-00',5,'N',NULL,'1','2015-08-05 18:10:58','0000-00-00 00:00:00',1,NULL),
(24,'1277A52C-D491-A839-F27C-9B4C7C81F0AE','N','New Corporate 2','SOC-PR-0000269',123123,8388607,'2015-01-01',NULL,2,1,'2015-01-01','123123231','2015-01-01',5,'N',NULL,'1','2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_producer_account_address` */

DROP TABLE IF EXISTS `wipo_producer_account_address`;

CREATE TABLE `wipo_producer_account_address` (
  `Pro_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Acc_Id` int(11) NOT NULL,
  `Pro_Head_Address_1` text NOT NULL,
  `Pro_Head_Address_2` varchar(255) DEFAULT NULL,
  `Pro_Head_Address_3` varchar(255) DEFAULT NULL,
  `Pro_Head_Fax` varchar(25) DEFAULT NULL,
  `Pro_Head_Telephone` varchar(25) NOT NULL,
  `Pro_Head_Email` varchar(50) NOT NULL,
  `Pro_Head_Website` varchar(100) DEFAULT NULL,
  `Pro_Mailing_Address_1` text NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Addr_Id`),
  KEY `FK_wipo_producer_account_address_account_id` (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_account_address_country` (`Pro_Addr_Country_Id`),
  CONSTRAINT `FK_wipo_producer_account_address_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_account_address_country` FOREIGN KEY (`Pro_Addr_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_account_address` */

insert  into `wipo_producer_account_address`(`Pro_Addr_Id`,`Pro_Acc_Id`,`Pro_Head_Address_1`,`Pro_Head_Address_2`,`Pro_Head_Address_3`,`Pro_Head_Fax`,`Pro_Head_Telephone`,`Pro_Head_Email`,`Pro_Head_Website`,`Pro_Mailing_Address_1`,`Pro_Mailing_Address_2`,`Pro_Mailing_Address_3`,`Pro_Mailing_Telephone`,`Pro_Mailing_Fax`,`Pro_Mailing_Email`,`Pro_Mailing_Website`,`Pro_Publisher_Account_1`,`Pro_Publisher_Account_2`,`Pro_Publisher_Account_3`,`Pro_Producer_Account_1`,`Pro_Producer_Account_2`,`Pro_Producer_Account_3`,`Pro_Addr_Country_Id`,`Pro_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-09 04:20:37','0000-00-00 00:00:00',1,NULL),
(12,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-22 14:02:05','0000-00-00 00:00:00',1,NULL),
(13,9,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-24 12:20:02','0000-00-00 00:00:00',1,NULL),
(14,4,'Lorem ipsum dolor sit amet','','','','','','','test','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,2,'N','1','2015-07-03 13:00:14','2015-10-05 12:33:02',1,10),
(15,4,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','',NULL,NULL,NULL,NULL,NULL,NULL,2,'N','1','2015-07-28 13:19:37','0000-00-00 00:00:00',1,1),
(16,24,'teste tet',NULL,NULL,'1232123','23123123','test2@testoc.cpo','www.google.com','tert rter',NULL,NULL,'343423','32394234','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,2,'Y','1','2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_producer_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_producer_biograph_uploads`;

CREATE TABLE `wipo_producer_biograph_uploads` (
  `Pro_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pro_Biogrph_Id` int(11) NOT NULL,
  `Pro_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Pro_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Biogrph_Upl_Id`),
  KEY `FK_wipo_producer_biograph_uploads_biography` (`Pro_Biogrph_Id`),
  CONSTRAINT `FK_wipo_producer_biograph_uploads_biography` FOREIGN KEY (`Pro_Biogrph_Id`) REFERENCES `wipo_producer_biography` (`Pro_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_biograph_uploads` */

insert  into `wipo_producer_biograph_uploads`(`Pro_Biogrph_Upl_Id`,`Pro_Biogrph_Id`,`Pro_Biogrph_Upl_File`,`Pro_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'\\producerbiographuploads\\4e4f9156628ac503b0a1dcc0d03ecda8.jpg',NULL,'2015-06-24 13:52:27',NULL,1,NULL),
(2,1,'\\producerbiographuploads\\c47f802a8188a06b0b7e73f717083b80.jpg',NULL,'2015-06-24 13:52:27',NULL,1,NULL),
(3,12,'\\publisherbiographuploads\\0214e065bb58a7014c3fbe27db2448dd.jpg',NULL,'2015-06-24 14:01:13',NULL,1,NULL),
(4,12,'\\publisherbiographuploads\\d8d4d7918913b4808b058478441f07ae.jpg',NULL,'2015-06-24 14:01:13',NULL,1,NULL),
(5,9,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22',NULL,1,NULL),
(6,13,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22',NULL,1,NULL),
(7,9,'\\producerbiographuploads\\a6ae514522106fd754a454d6753b55d7.png','pro','2015-06-26 13:44:49',NULL,1,NULL),
(8,14,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22',NULL,1,NULL),
(9,14,'\\publisherbiographuploads\\90c2e6de5d8d54266c06a6dd862f2e5a.jpg',NULL,'2015-06-24 18:13:03',NULL,1,NULL),
(10,14,'\\publisherbiographuploads\\e25a61ba7c78a73973e4dab2cca03980.jpg',NULL,'2015-06-24 18:13:03',NULL,1,NULL),
(11,14,'\\publisherbiographuploads\\a7413d35c06eb7444d2c918595296888.png','test','2015-06-26 13:36:41',NULL,1,NULL),
(12,14,'\\publisherbiographuploads\\2a2052855548d8812d4e6402cac59dcb.png','pro','2015-06-26 13:44:32',NULL,1,NULL),
(13,9,'\\producerbiographuploads\\b4d127845e8b1dcfb004a7f42d8c05c2.png','test','2015-07-03 13:21:29',NULL,1,NULL),
(14,15,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22',NULL,1,NULL),
(15,15,'\\publisherbiographuploads\\90c2e6de5d8d54266c06a6dd862f2e5a.jpg',NULL,'2015-06-24 18:13:03',NULL,1,NULL),
(16,15,'\\publisherbiographuploads\\e25a61ba7c78a73973e4dab2cca03980.jpg',NULL,'2015-06-24 18:13:03',NULL,1,NULL),
(17,15,'\\publisherbiographuploads\\a7413d35c06eb7444d2c918595296888.png','test','2015-06-26 13:36:41',NULL,1,NULL),
(18,15,'\\publisherbiographuploads\\2a2052855548d8812d4e6402cac59dcb.png','pro','2015-06-26 13:44:32',NULL,1,NULL),
(19,15,'\\publisherbiographuploads\\e8c04de1bf7df33d131aad588e6247c0.jpg','','2015-07-03 13:08:07',NULL,1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Biogrph_Id`),
  KEY `FK_wipo_producer_biography_account_id` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_biography_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_biography` */

insert  into `wipo_producer_biography`(`Pro_Biogrph_Id`,`Pro_Acc_Id`,`Pro_Managers`,`Pro_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,9,'John','test','1','2015-06-09 04:20:37','0000-00-00 00:00:00',1,NULL),
(7,9,'John','test','1','2015-06-22 14:02:05','0000-00-00 00:00:00',1,NULL),
(8,9,'John','test','1','2015-06-24 12:20:02','0000-00-00 00:00:00',1,NULL),
(9,4,'Test','Test','1','2015-06-24 13:00:31','2015-10-05 12:22:26',1,10),
(12,14,'','Test','1','2015-06-24 14:02:30','0000-00-00 00:00:00',1,NULL),
(13,4,'Test','Test','1','2015-06-24 14:07:42','0000-00-00 00:00:00',1,NULL),
(14,4,'Test','Test','1','2015-07-03 12:59:56','0000-00-00 00:00:00',1,NULL),
(15,4,'Test','Test','1','2015-07-28 13:19:37','0000-00-00 00:00:00',1,1),
(16,24,'Tes test te','test managers','1','2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

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

insert  into `wipo_producer_label_owner`(`Label_Owner_Id`,`Pro_Acc_Id`,`Label_Id`,`Label_Owner_From`,`Label_Owner_To`,`Label_Share`,`Created_Date`,`Rowversion`) values 
(1,4,1,'2015-03-30','2015-06-03','100.00','2015-05-11 15:19:22','0000-00-00 00:00:00'),
(2,4,1,'2015-05-01','2015-05-31','50.00','2015-05-12 06:54:32','0000-00-00 00:00:00'),
(3,6,1,'2015-05-01','2015-05-31','50.00','2015-05-12 06:54:32','0000-00-00 00:00:00');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Pay_Id`),
  KEY `FK_wipo_producer_payment_method_account_id` (`Pro_Acc_Id`),
  KEY `FK_wipo_producer_payment_method_payment_mode` (`Pro_Pay_Method_id`),
  CONSTRAINT `FK_wipo_producer_payment_method_account_id` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_payment_method_payment_mode` FOREIGN KEY (`Pro_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_payment_method` */

insert  into `wipo_producer_payment_method`(`Pro_Pay_Id`,`Pro_Acc_Id`,`Pro_Pay_Method_id`,`Pro_Bank_Account`,`Pro_Bank_Code`,`Pro_Bank_Branch`,`Pro_Pay_Address`,`Pro_Pay_Iban`,`Pro_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-09 04:20:37','0000-00-00 00:00:00',1,NULL),
(11,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-22 14:02:05','0000-00-00 00:00:00',1,NULL),
(12,9,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-24 12:20:02','0000-00-00 00:00:00',1,NULL),
(13,4,2,8388607,NULL,NULL,'','','','1','2015-07-03 13:00:33','2015-07-28 09:52:39',1,1),
(14,4,2,8388607,NULL,NULL,'','','','1','2015-07-28 13:19:37','0000-00-00 00:00:00',1,1),
(15,24,2,8388607,NULL,NULL,'teste','8986537','8776','1','2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Pseudo_Id`),
  KEY `FK_wipo_producer_pseudonym_pseodo_type` (`Pro_Pseudo_Type_Id`),
  KEY `FK_wipo_producer_pseudonym_producer_account` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_pseudonym_producer_account` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_producer_pseudonym_pseodo_type` FOREIGN KEY (`Pro_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_pseudonym` */

insert  into `wipo_producer_pseudonym`(`Pro_Pseudo_Id`,`Pro_Acc_Id`,`Pro_Pseudo_Type_Id`,`Pro_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,9,1,'Producer','1','2015-06-09 04:20:37','0000-00-00 00:00:00',1,NULL),
(6,9,1,'Producer','1','2015-06-22 14:02:05','0000-00-00 00:00:00',1,NULL),
(7,9,1,'Producer','1','2015-06-24 12:20:02','0000-00-00 00:00:00',1,NULL),
(8,4,9,'Producerr','1','2015-07-03 13:01:05','2015-07-28 09:52:51',1,1),
(9,4,9,'Producerr','1','2015-07-28 13:19:37','0000-00-00 00:00:00',1,1),
(10,24,9,'OR','1','2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_related_rights` */

insert  into `wipo_producer_related_rights`(`Pro_Rel_Rgt_Id`,`Pro_Acc_Id`,`Pro_Rel_Society_Id`,`Pro_Rel_Entry_Date`,`Pro_Rel_Exit_Date`,`Pro_Rel_Internal_Position_Id`,`Pro_Rel_Entry_Date_2`,`Pro_Rel_Exit_Date_2`,`Pro_Rel_Region_Id`,`Pro_Rel_Profession_Id`,`Pro_Rel_File`,`Pro_Rel_Duration`,`Pro_Rel_Avl_Work_Cat_Id`,`Pro_Rel_Type_Rght_Id`,`Pro_Rel_Managed_Rights_Id`,`Pro_Rel_Territories_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,4,10,'2015-04-27','2015-07-28',1,'2015-04-27','2015-07-28',1,1,'',NULL,1,11,5,8,'2015-04-29 18:34:45','2015-07-28 09:53:00',1,1),
(3,5,10,'2015-04-29','2015-04-30',1,'2015-04-28','2015-04-30',1,1,'',NULL,1,NULL,1,8,'2015-04-30 19:22:00','0000-00-00 00:00:00',1,NULL),
(4,6,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-10 03:37:54','0000-00-00 00:00:00',1,NULL),
(5,7,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-13 13:19:10','0000-00-00 00:00:00',1,NULL),
(6,8,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-13 15:54:22','0000-00-00 00:00:00',1,NULL),
(7,14,10,'2015-06-24','0000-00-00',6,'2015-06-24','0000-00-00',NULL,NULL,'',NULL,1,11,1,8,'2015-06-24 14:02:55','0000-00-00 00:00:00',1,NULL),
(8,24,10,'2015-01-01','2016-01-01',1,'2015-01-01','2016-01-01',1,NULL,'test',NULL,1,NULL,1,8,'2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL),
(9,17,14,'2015-10-05','0000-00-00',6,'2015-10-05','0000-00-00',1,NULL,'',NULL,1,11,5,8,'2015-10-05 15:21:34','2015-10-05 15:21:42',10,10);

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
  `Pro_Suc_Liquidation_Date` date DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pro_Suc_Id`),
  KEY `FK_wipo_producer_succession_acount` (`Pro_Acc_Id`),
  CONSTRAINT `FK_wipo_producer_succession_acount` FOREIGN KEY (`Pro_Acc_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_producer_succession` */

insert  into `wipo_producer_succession`(`Pro_Suc_Id`,`Pro_Acc_Id`,`Pro_Suc_Date_Transfer`,`Pro_Suc_Name`,`Pro_Suc_Address_1`,`Pro_Suc_Address_2`,`Pro_Suc_Annotation`,`Pro_Suc_Liquidation_Date`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(4,4,NULL,'Sucessor','Address 1','Address 2','8','2014-02-05','2015-07-03 13:06:44','2015-10-05 12:13:38',1,10),
(5,24,NULL,'SURNAME','ADDRESS',NULL,'ADDITIONAL DETAILS',NULL,'2015-09-21 17:19:17','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Acc_Id`),
  UNIQUE KEY `Pub_GUID_unique` (`Pub_GUID`),
  KEY `FK_wipo_publisher_account_country` (`Pub_Country_Id`),
  KEY `FK_wipo_publisher_account_legal_form` (`Pub_Legal_Form_id`),
  KEY `FK_wipo_publisher_account_language` (`Pub_Language_Id`),
  CONSTRAINT `FK_wipo_publisher_account_country` FOREIGN KEY (`Pub_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_language` FOREIGN KEY (`Pub_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_legal_form` FOREIGN KEY (`Pub_Legal_Form_id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account` */

insert  into `wipo_publisher_account`(`Pub_Acc_Id`,`Pub_GUID`,`Pub_Is_Producer`,`Pub_Corporate_Name`,`Pub_Internal_Code`,`Pub_Ipi`,`Pub_Ipi_Base_Number`,`Pub_Date`,`Pub_Place`,`Pub_Country_Id`,`Pub_Legal_Form_id`,`Pub_Reg_Date`,`Pub_Reg_Number`,`Pub_Excerpt_Date`,`Pub_Language_Id`,`Pub_Non_Member`,`Pub_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(3,'c08bb73b-14e4-11e5-b10a-74d435d335fe','Y','CAG Limited','SOC-E-0000113',NULL,NULL,'1999-02-01','',2,NULL,'0000-00-00','','2012-02-08',1,'N',NULL,'1','2015-04-18 18:13:15','0000-00-00 00:00:00',1,NULL),
(4,'c08bbb90-14e4-11e5-b10a-74d435d335fe','N','VEGA Limited','SOC-E-0000104',NULL,NULL,'2015-04-01','',2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-04-29 18:21:02','0000-00-00 00:00:00',1,NULL),
(5,'c08bbdb3-14e4-11e5-b10a-74d435d335fe','N','Publisher 079','SOC-E-0000109',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-10 03:36:56','0000-00-00 00:00:00',1,NULL),
(6,'c08bbe3c-14e4-11e5-b10a-74d435d335fe','N','Kiyosaki','SOC-E-0000110',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 13:17:52','2015-10-05 15:18:20',1,10),
(7,'c08bbeba-14e4-11e5-b10a-74d435d335fe','N','Trump','SOC-E-0000111',NULL,NULL,'2015-05-01',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N',NULL,'1','2015-05-13 15:47:10','0000-00-00 00:00:00',1,NULL),
(8,'c08bbf35-14e4-11e5-b10a-74d435d335fe','Y','ACOL Limited','SOC-EPR-0000004',12321,3212323,'1989-02-02','',2,1,'2015-04-30','','0000-00-00',1,'Y','\\publisheraccount\\2d3af81b19fe80808ed3269b0f65c262.png','1','2015-06-12 05:45:04','0000-00-00 00:00:00',1,NULL),
(9,'c08bbfb2-14e4-11e5-b10a-74d435d335fe','Y','BGM Limited','SOC-EPR-0000005',8388607,8388607,'1991-02-26','Nepal',2,1,'2015-06-17','A8985-45794-T78','2015-04-16',1,'N',NULL,'1','2015-06-12 05:45:06','0000-00-00 00:00:00',1,NULL),
(14,'66A3BB28-26D7-59CC-3007-5EC39C38DA97','N','Man Power Tech','SOC-E-0000112',NULL,NULL,'2015-06-08',NULL,2,NULL,'0000-00-00','','0000-00-00',1,'N','\\publisheraccount\\4b566f403dd7e7a90b9e3ab9095ff892.jpeg','1','2015-06-22 18:17:32','0000-00-00 00:00:00',1,NULL),
(15,'c08be234-14e4-11e5-b10a-74d435d335fe','Y','ABM Limited','SOC-EPR-0000008',NULL,NULL,'2015-04-22','',2,1,'0000-00-00','','2015-04-29',1,'Y','\\produceraccount\\beb0d5fa7972e3553160195e32a54ebc.jpeg','1','2015-06-24 14:07:28','2015-07-28 09:52:27',1,1),
(18,'73E06A3E-0E41-F38D-B212-C5923E0893D3','N','New Corporate','SOC-E-0000191',123123,8388607,'2015-01-01',NULL,2,1,'2015-01-01','123123231','2015-01-01',5,'N',NULL,'1','2015-09-21 15:43:51','0000-00-00 00:00:00',10,NULL),
(19,'DE216B7E-AD85-A5A7-7395-5F034A9AE3D2','N','New Corporate 2','SOC-E-0000192',123123,8388607,'2015-01-01',NULL,2,1,'2015-01-01','123123231','2015-01-01',5,'N',NULL,'1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_publisher_account_address` */

DROP TABLE IF EXISTS `wipo_publisher_account_address`;

CREATE TABLE `wipo_publisher_account_address` (
  `Pub_Addr_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Acc_Id` int(11) NOT NULL,
  `Pub_Head_Address_1` text NOT NULL,
  `Pub_Head_Address_2` varchar(255) DEFAULT NULL,
  `Pub_Head_Address_3` varchar(255) DEFAULT NULL,
  `Pub_Head_Fax` varchar(25) DEFAULT NULL,
  `Pub_Head_Telephone` varchar(25) NOT NULL,
  `Pub_Head_Email` varchar(50) NOT NULL,
  `Pub_Head_Website` varchar(100) DEFAULT NULL,
  `Pub_Mailing_Address_1` text NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Addr_Id`),
  KEY `FK_wipo_publisher_account_address_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_account_address_country` (`Pub_Addr_Country_Id`),
  CONSTRAINT `FK_wipo_publisher_account_address_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_account_address_country` FOREIGN KEY (`Pub_Addr_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_account_address` */

insert  into `wipo_publisher_account_address`(`Pub_Addr_Id`,`Pub_Acc_Id`,`Pub_Head_Address_1`,`Pub_Head_Address_2`,`Pub_Head_Address_3`,`Pub_Head_Fax`,`Pub_Head_Telephone`,`Pub_Head_Email`,`Pub_Head_Website`,`Pub_Mailing_Address_1`,`Pub_Mailing_Address_2`,`Pub_Mailing_Address_3`,`Pub_Mailing_Telephone`,`Pub_Mailing_Fax`,`Pub_Mailing_Email`,`Pub_Mailing_Website`,`Pub_Publisher_Account_1`,`Pub_Publisher_Account_2`,`Pub_Publisher_Account_3`,`Pub_Producer_Account_1`,`Pub_Producer_Account_2`,`Pub_Producer_Account_3`,`Pub_Addr_Country_Id`,`Pub_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-04-18 15:38:27','0000-00-00 00:00:00',1,NULL),
(2,8,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','','','','','','','',5,'N','1','2015-06-12 05:45:04','0000-00-00 00:00:00',1,NULL),
(3,15,'Lorem ipsum dolor sit amet','','','','','','','test','','','','','','',NULL,NULL,NULL,NULL,NULL,NULL,2,'N','1','2015-07-03 13:00:13','2015-10-05 12:33:02',1,10),
(4,15,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','',NULL,NULL,NULL,NULL,NULL,NULL,2,'N','1','2015-07-03 13:16:24','0000-00-00 00:00:00',1,NULL),
(5,15,'test','','','','1232132','test@test.com','','test','','','123213','','test@test.com','',NULL,NULL,NULL,NULL,NULL,NULL,2,'N','1','2015-07-28 13:22:27','0000-00-00 00:00:00',1,1),
(8,18,'teste tet',NULL,NULL,'1232123','23123123','test2@testoc.cpo','www.google.com','tert rter',NULL,NULL,'343423','32394234','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,2,'Y','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(9,19,'teste tet',NULL,NULL,'1232123','23123123','test2@testoc.cpo','www.google.com','tert rter',NULL,NULL,'343423','32394234','test2@testoc.cpo','www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,2,'Y','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_publisher_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_publisher_biograph_uploads`;

CREATE TABLE `wipo_publisher_biograph_uploads` (
  `Pub_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Biogrph_Id` int(11) NOT NULL,
  `Pub_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Pub_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Biogrph_Upl_Id`),
  KEY `FK_wipo_publisher_biograph_uploads_biography` (`Pub_Biogrph_Id`),
  CONSTRAINT `FK_wipo_publisher_biograph_uploads_biography` FOREIGN KEY (`Pub_Biogrph_Id`) REFERENCES `wipo_publisher_biography` (`Pub_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_biograph_uploads` */

insert  into `wipo_publisher_biograph_uploads`(`Pub_Biogrph_Upl_Id`,`Pub_Biogrph_Id`,`Pub_Biogrph_Upl_File`,`Pub_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,2,'\\publisherbiographuploads\\b7742943b92909c750e387f629bc726c.png',NULL,'2015-06-24 13:52:06','0000-00-00 00:00:00',1,NULL),
(2,2,'\\publisherbiographuploads\\0887c44de1adb0e2b0ae958217b884a5.jpg',NULL,'2015-06-24 13:52:06','0000-00-00 00:00:00',1,NULL),
(3,3,'\\publisherbiographuploads\\0214e065bb58a7014c3fbe27db2448dd.jpg',NULL,'2015-06-24 14:01:13','0000-00-00 00:00:00',1,NULL),
(4,3,'\\publisherbiographuploads\\d8d4d7918913b4808b058478441f07ae.jpg',NULL,'2015-06-24 14:01:13','0000-00-00 00:00:00',1,NULL),
(5,4,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22','0000-00-00 00:00:00',1,NULL),
(6,4,'\\publisherbiographuploads\\90c2e6de5d8d54266c06a6dd862f2e5a.jpg',NULL,'2015-06-24 18:13:03','0000-00-00 00:00:00',1,NULL),
(7,4,'\\publisherbiographuploads\\e25a61ba7c78a73973e4dab2cca03980.jpg',NULL,'2015-06-24 18:13:03','0000-00-00 00:00:00',1,NULL),
(8,4,'\\publisherbiographuploads\\a7413d35c06eb7444d2c918595296888.png','test','2015-06-26 13:36:41','0000-00-00 00:00:00',1,NULL),
(9,4,'\\publisherbiographuploads\\2a2052855548d8812d4e6402cac59dcb.png','pro','2015-06-26 13:44:32','0000-00-00 00:00:00',1,NULL),
(10,4,'\\publisherbiographuploads\\e8c04de1bf7df33d131aad588e6247c0.jpg','','2015-07-03 13:08:07','0000-00-00 00:00:00',1,NULL),
(11,5,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22','0000-00-00 00:00:00',1,NULL),
(12,5,'\\producerbiographuploads\\a6ae514522106fd754a454d6753b55d7.png','pro','2015-06-26 13:44:49','0000-00-00 00:00:00',1,NULL),
(13,6,'\\producerbiographuploads\\1f0e84e771181d214e3696fc3019109d.jpeg',NULL,'2015-06-24 14:07:22','0000-00-00 00:00:00',1,NULL),
(14,6,'\\producerbiographuploads\\a6ae514522106fd754a454d6753b55d7.png','pro','2015-06-26 13:44:49','0000-00-00 00:00:00',1,NULL),
(15,6,'\\producerbiographuploads\\b4d127845e8b1dcfb004a7f42d8c05c2.png','test','2015-07-03 13:21:29','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Biogrph_Id`),
  KEY `FK_wipo_publisher_biography_account_id` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_biography_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_biography` */

insert  into `wipo_publisher_biography`(`Pub_Biogrph_Id`,`Pub_Acc_Id`,`Pub_Managers`,`Pub_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'John','test','1','2015-04-18 17:11:20','0000-00-00 00:00:00',1,NULL),
(2,8,'John','test','1','2015-06-12 05:45:04','0000-00-00 00:00:00',1,NULL),
(3,3,'','Test','1','2015-06-24 14:01:13','0000-00-00 00:00:00',1,NULL),
(4,15,'Test','Test','1','2015-06-24 14:07:28','2015-10-05 12:22:26',1,10),
(5,15,'Test','Test','1','2015-07-03 13:16:24','0000-00-00 00:00:00',1,1),
(6,15,'Test','Test','1','2015-07-28 13:22:27','0000-00-00 00:00:00',1,1),
(9,18,'Tes test te','test managers','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(10,19,'Tes test te','test managers','1','2015-09-21 15:43:53','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Id`),
  UNIQUE KEY `Pub_Group_GUID_unique` (`Pub_Group_GUID`),
  KEY `FK_wipo_publisher_group_country` (`Pub_Group_Country_Id`),
  KEY `FK_wipo_publisher_group_language` (`Pub_Group_Language_Id`),
  KEY `FK_wipo_publisher_group_legal_form` (`Pub_Group_Legal_Form_Id`),
  CONSTRAINT `FK_wipo_publisher_group_country` FOREIGN KEY (`Pub_Group_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_language` FOREIGN KEY (`Pub_Group_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_legal_form` FOREIGN KEY (`Pub_Group_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group` */

insert  into `wipo_publisher_group`(`Pub_Group_Id`,`Pub_Group_GUID`,`Pub_Group_Name`,`Pub_Group_Is_Publisher`,`Pub_Group_Is_Producer`,`Pub_Group_Internal_Code`,`Pub_Group_IPI_Name_Number`,`Pub_Group_IPN_Base_Number`,`Pub_Group_IPD_Number`,`Pub_Group_Date`,`Pub_Group_Place`,`Pub_Group_Country_Id`,`Pub_Group_Legal_Form_Id`,`Pub_Group_Language_Id`,`Pub_Group_Non_Member`,`Pub_Group_Photo`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'c09838d2-14e4-11e5-b10a-74d435d335fe','Corporate name','1','0','SOC-GE-0000100',1232123,232123,232123123,'2015-04-18','Nepal',2,1,1,'N','\\publishergroup\\ce00e96a72725a1b8700b54e18fbec2c.png','1','2015-04-25 11:15:46','2015-07-28 11:53:38',1,1),
(2,'c0983a1b-14e4-11e5-b10a-74d435d335fe','Corporate name 2','1','0','SOC-GE-0000101',NULL,NULL,232123123,'2015-04-30','',2,1,1,'Y','\\publishergroup\\b24c9fdfec30d93be1a7bd0760028248.png','1','2015-04-29 17:57:41','2015-10-05 15:30:54',1,10),
(3,'c0983adf-14e4-11e5-b10a-74d435d335fe','Corporate name 3','1','0','SOC-GE-0000102',NULL,NULL,232123123,'2015-05-27','',2,NULL,1,'N',NULL,'1','2015-04-30 14:41:29','0000-00-00 00:00:00',1,NULL),
(4,'c0983b9a-14e4-11e5-b10a-74d435d335fe','Producer Group 1','1','0','SOC-GE-0000108',NULL,NULL,NULL,'2015-05-01','',2,NULL,1,'N',NULL,'1','2015-05-10 03:38:35','0000-00-00 00:00:00',1,NULL),
(5,'20D6089E-CE7F-0B88-5087-D190047FEB48','Corporate name 1','0','1','SOC-GPR-0000002',NULL,NULL,NULL,'2015-07-31','',2,NULL,5,'N',NULL,'1','2015-07-03 15:36:16','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_publisher_group_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_publisher_group_biograph_uploads`;

CREATE TABLE `wipo_publisher_group_biograph_uploads` (
  `Pub_Group_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Biogrph_Id` int(11) NOT NULL,
  `Pub_Group_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Pub_Group_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Biogrph_Upl_Id`),
  KEY `FK_wipo_publisher_group_biograph_uploads_biography` (`Pub_Group_Biogrph_Id`),
  CONSTRAINT `FK_wipo_publisher_group_biograph_uploads_biography` FOREIGN KEY (`Pub_Group_Biogrph_Id`) REFERENCES `wipo_publisher_group_biography` (`Pub_Group_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_biograph_uploads` */

insert  into `wipo_publisher_group_biograph_uploads`(`Pub_Group_Biogrph_Upl_Id`,`Pub_Group_Biogrph_Id`,`Pub_Group_Biogrph_Upl_File`,`Pub_Group_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'\\publishergroupbiographuploads\\9e63185467b3395b4b5d9fcd0e2af3c9.jpeg',NULL,'2015-06-24 13:52:56','0000-00-00 00:00:00',1,NULL),
(2,1,'\\publishergroupbiographuploads\\c298aa4738a794696c2ac48c71ce9c2f.jpg','yrdy','2015-07-03 15:10:03','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_publisher_group_biography` */

DROP TABLE IF EXISTS `wipo_publisher_group_biography`;

CREATE TABLE `wipo_publisher_group_biography` (
  `Pub_Group_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Biogrph_Annotation` text NOT NULL,
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Biogrph_Id`),
  KEY `FK_wipo_publisher_group_biography_account_id` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_biography_account_id` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_biography` */

insert  into `wipo_publisher_group_biography`(`Pub_Group_Biogrph_Id`,`Pub_Group_Id`,`Pub_Group_Biogrph_Annotation`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Annotation\r\n','1','2015-04-25 12:22:21','2015-07-28 11:53:49',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Cat_Id`),
  KEY `FK_wipo_publisher_group_catalogue_group` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_catalogue_territory` (`Pub_Group_Cat_Territory_Id`),
  CONSTRAINT `FK_wipo_publisher_group_catalogue_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_catalogue_territory` FOREIGN KEY (`Pub_Group_Cat_Territory_Id`) REFERENCES `wipo_master_territories` (`Master_Territory_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_catalogue` */

insert  into `wipo_publisher_group_catalogue`(`Pub_Group_Cat_Id`,`Pub_Group_Id`,`Pub_Group_Cat_Number`,`Pub_Group_Cat_Start_Date`,`Pub_Group_Cat_End_Date`,`Pub_Group_Cat_Name`,`Pub_Group_Cat_Territory_Id`,`Pub_Group_Cat_Clasue`,`Pub_Group_Cat_Sign_Date`,`Pub_Group_Cat_File`,`Pub_Group_Cat_Reference`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'TYHDYHH','2015-04-01','2015-04-30','test',8,'S','2015-04-04','\\publishergroupcatalogue\\e0df07b76de54e541cc193ce90ed2afb.png',50,'2015-04-26 10:54:39','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Pay_Copy_Id`),
  KEY `FK_wipo_publisher_group_copyright_payment_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_copyright_payment_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_copyright_payment` */

insert  into `wipo_publisher_group_copyright_payment`(`Pub_Group_Pay_Copy_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Copy_Payee`,`Pub_Group_Pay_Copy_Rate`,`Pub_Group_Pay_Copy_Pay_Method`,`Pub_Group_Pay_Copy_Bank_Account`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'John mc','50.00',1,8388607,'2015-04-25 12:14:01','2015-07-28 11:53:27',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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

insert  into `wipo_publisher_group_manage_rights`(`Pub_Group_Mnge_Rgt_Id`,`Pub_Group_Id`,`Pub_Group_Mnge_Society_Id`,`Pub_Group_Mnge_Entry_Date`,`Pub_Group_Mnge_Exit_Date`,`Pub_Group_Mnge_Internal_Position_Id`,`Pub_Group_Mnge_Entry_Date_2`,`Pub_Group_Mnge_Exit_Date_2`,`Pub_Group_Mnge_Region_Id`,`Pub_Group_Mnge_Profession_Id`,`Pub_Group_Mnge_File`,`Pub_Group_Mnge_Duration`,`Pub_Group_Mnge_Avl_Work_Cat_Id`,`Pub_Group_Mnge_Type_Rght_Id`,`Pub_Group_Mnge_Managed_Rights_Id`,`Pub_Group_Mnge_Territories_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,10,'2015-04-24','2015-07-15',1,'2015-04-24','2015-07-15',1,1,'Test',NULL,1,23,1,8,'2015-04-25 11:34:17','2015-07-28 11:56:41',1,1),
(2,4,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,3,1,8,'2015-05-10 03:38:54','0000-00-00 00:00:00',1,NULL),
(3,2,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,23,1,8,'2015-05-13 15:50:40','2015-10-05 15:30:54',1,10);

/*Table structure for table `wipo_publisher_group_members` */

DROP TABLE IF EXISTS `wipo_publisher_group_members`;

CREATE TABLE `wipo_publisher_group_members` (
  `Pub_Group_Member_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Member_GUID` varchar(50) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Member_Id`),
  KEY `FK_wipo_publisher_group_biography_account_id` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_members_Internal_Code` (`Pub_Group_Member_GUID`),
  CONSTRAINT `FK_wipo_publisher_group_members_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_members` */

insert  into `wipo_publisher_group_members`(`Pub_Group_Member_Id`,`Pub_Group_Id`,`Pub_Group_Member_GUID`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(10,1,'c08bbb90-14e4-11e5-b10a-74d435d335fe','2015-04-26 10:53:49','0000-00-00 00:00:00',NULL,NULL),
(12,2,'c08bb73b-14e4-11e5-b10a-74d435d335fe','2015-06-24 14:01:13','0000-00-00 00:00:00',NULL,NULL),
(14,4,'c08be234-14e4-11e5-b10a-74d435d335fe','2015-10-05 12:22:26','0000-00-00 00:00:00',10,NULL),
(15,3,'c08be234-14e4-11e5-b10a-74d435d335fe','2015-10-05 12:22:27','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Org_Id`),
  KEY `FK_wipo_publisher_group_original_publisher_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_original_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_original_publisher` */

insert  into `wipo_publisher_group_original_publisher`(`Pub_Group_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_IPI_Name_Number`,`Pub_Group_Org_IPI_Base_Number`,`Pub_Group_Org_Internal_Code`,`Pub_Group_Org_Name`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'ABCDRE','51545111','A1001','Vira','2015-04-25 17:26:46','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_publisher_group_original_share` */

DROP TABLE IF EXISTS `wipo_publisher_group_original_share`;

CREATE TABLE `wipo_publisher_group_original_share` (
  `Pub_Group_Share_Org_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Org_Share_Broadcast` decimal(10,2) NOT NULL,
  `Pub_Group_Org_Share_Mechanical` decimal(10,2) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Share_Org_Id`),
  KEY `FK_wipo_publisher_group_original_share_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_original_share_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_original_share` */

insert  into `wipo_publisher_group_original_share`(`Pub_Group_Share_Org_Id`,`Pub_Group_Id`,`Pub_Group_Org_Share_Broadcast`,`Pub_Group_Org_Share_Mechanical`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'50.00','60.00','2015-04-25 18:02:12','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Pseudo_Id`),
  KEY `FK_wipo_publisher_group_pseudonym_group` (`Pub_Group_Id`),
  KEY `FK_wipo_publisher_group_pseudonym` (`Pub_Group_Pseudo_Type_Id`),
  CONSTRAINT `FK_wipo_publisher_group_pseudonym` FOREIGN KEY (`Pub_Group_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_group_pseudonym_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_pseudonym` */

insert  into `wipo_publisher_group_pseudonym`(`Pub_Group_Pseudo_Id`,`Pub_Group_Id`,`Pub_Group_Pseudo_Type_Id`,`Pub_Group_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,1,'XALLY','1','2015-04-25 12:25:42','2015-07-28 11:53:54',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Pay_Rel_Id`),
  KEY `FK_wipo_publisher_group_related_payment_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_related_payment_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_related_payment` */

insert  into `wipo_publisher_group_related_payment`(`Pub_Group_Pay_Rel_Id`,`Pub_Group_Id`,`Pub_Group_Pay_Rel_Payee`,`Pub_Group_Pay_Rel_Rate`,`Pub_Group_Pay_Rel_Pay_Method`,`Pub_Group_Pay_Rel_Bank_Account`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Rutherfold','60.00',2,8388607,'2015-04-25 12:19:04','2015-07-28 11:53:45',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Addr_Id`),
  KEY `Pub_Group_id` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_representative_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_representative` */

insert  into `wipo_publisher_group_representative`(`Pub_Group_Addr_Id`,`Pub_Group_Id`,`Pub_Group_Rep_Name`,`Pub_Group_Rep_Address_1`,`Pub_Group_Rep_Address_2`,`Pub_Group_Rep_Address_3`,`Pub_Group_Rep_Address_4`,`Pub_Group_Home_Address_1`,`Pub_Group_Home_Address_2`,`Pub_Group_Home_Address_3`,`Pub_Group_Home_Address_4`,`Pub_Group_Home_Fax`,`Pub_Group_Home_Telephone`,`Pub_Group_Home_Email`,`Pub_Group_Home_Website`,`Pub_Group_Mailing_Address_1`,`Pub_Group_Mailing_Address_2`,`Pub_Group_Mailing_Address_3`,`Pub_Group_Mailing_Address_4`,`Pub_Group_Mailing_Telephone`,`Pub_Group_Mailing_Fax`,`Pub_Group_Mailing_Email`,`Pub_Group_Mailing_Website`,`Pub_Group_Unknown_Address`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Rep','','','','','1, Thomos street','','','','','959562','aaa@gmail.com','','10, J street','','','','232123123','','test@gmail.com','','Y','1','2015-04-25 12:32:41','2015-10-05 11:35:31',1,10);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Sub_Id`),
  KEY `FK_wipo_publisher_group_sub_publisher_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_sub_publisher_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_sub_publisher` */

insert  into `wipo_publisher_group_sub_publisher`(`Pub_Group_Sub_Id`,`Pub_Group_Id`,`Pub_Group_Sub_IPI_Name_Number`,`Pub_Group_Sub_IPI_Base_Number`,`Pub_Group_Sub_Internal_Code`,`Pub_Group_Sub_Name`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'ABCDRE','123123123','12321312323','Rio','2015-05-01 23:27:57','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_publisher_group_sub_share` */

DROP TABLE IF EXISTS `wipo_publisher_group_sub_share`;

CREATE TABLE `wipo_publisher_group_sub_share` (
  `Pub_Group_Sub_Share_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Pub_Group_Id` int(11) NOT NULL,
  `Pub_Group_Sub_Share_Broadcast` decimal(10,2) NOT NULL,
  `Pub_Group_Sub_Share_Mechanical` decimal(10,2) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Group_Sub_Share_Id`),
  KEY `FK_wipo_publisher_group_sub_share_group` (`Pub_Group_Id`),
  CONSTRAINT `FK_wipo_publisher_group_sub_share_group` FOREIGN KEY (`Pub_Group_Id`) REFERENCES `wipo_publisher_group` (`Pub_Group_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_group_sub_share` */

insert  into `wipo_publisher_group_sub_share`(`Pub_Group_Sub_Share_Id`,`Pub_Group_Id`,`Pub_Group_Sub_Share_Broadcast`,`Pub_Group_Sub_Share_Mechanical`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'90.00','100.00','2015-04-25 18:21:40','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_manage_rights` */

insert  into `wipo_publisher_manage_rights`(`Pub_Mnge_Rgt_Id`,`Pub_Acc_Id`,`Pub_Mnge_Society_Id`,`Pub_Mnge_Entry_Date`,`Pub_Mnge_Exit_Date`,`Pub_Mnge_Internal_Position_Id`,`Pub_Mnge_Entry_Date_2`,`Pub_Mnge_Exit_Date_2`,`Pub_Mnge_Region_Id`,`Pub_Mnge_Profession_Id`,`Pub_Mnge_File`,`Pub_Mnge_Duration`,`Pub_Mnge_Avl_Work_Cat_Id`,`Pub_Mnge_Type_Rght_Id`,`Pub_Mnge_Managed_Rights_Id`,`Pub_Mnge_Territories_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,10,'2015-04-17','2015-04-25',1,'2015-04-17','0000-00-00',1,1,'',NULL,1,1,2,8,NULL,'0000-00-00 00:00:00',1,NULL),
(2,3,10,'2015-04-01','2015-04-30',1,'2015-04-01','2015-04-30',1,1,'',NULL,1,1,1,8,NULL,'0000-00-00 00:00:00',1,NULL),
(3,4,10,'2015-04-27','0000-00-00',1,'2015-04-27','0000-00-00',1,1,'',NULL,1,1,1,8,'2015-04-29 18:23:54','0000-00-00 00:00:00',1,NULL),
(4,5,10,'2015-05-08','0000-00-00',1,'2015-05-08','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-10 03:37:06','0000-00-00 00:00:00',1,NULL),
(5,6,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,23,1,8,'2015-05-13 13:18:09','2015-10-05 15:18:20',1,10),
(6,7,10,'2015-05-12','0000-00-00',1,'2015-05-12','0000-00-00',1,NULL,'',NULL,1,2,1,8,'2015-05-13 15:48:46','0000-00-00 00:00:00',1,NULL),
(7,15,10,'2015-07-03','0000-00-00',6,'2015-07-03','0000-00-00',NULL,NULL,'',NULL,1,23,1,8,'2015-07-03 13:05:10','2015-07-28 09:52:56',1,1),
(10,18,10,'2015-08-01','2016-08-01',1,'2015-08-01','2016-08-01',1,6,'test',NULL,1,32,1,8,'2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(11,19,10,'2015-08-01','2016-08-01',1,'2015-08-01','2016-08-01',1,6,'test',NULL,1,32,1,8,'2015-09-21 15:43:53','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Pay_Id`),
  KEY `FK_wipo_publisher_payment_method_account_id` (`Pub_Acc_Id`),
  KEY `FK_wipo_publisher_payment_method_payment_mode` (`Pub_Pay_Method_id`),
  CONSTRAINT `FK_wipo_publisher_payment_method_account_id` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_payment_method_payment_mode` FOREIGN KEY (`Pub_Pay_Method_id`) REFERENCES `wipo_master_payment_method` (`Master_Paymode_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_payment_method` */

insert  into `wipo_publisher_payment_method`(`Pub_Pay_Id`,`Pub_Acc_Id`,`Pub_Pay_Method_id`,`Pub_Bank_Account`,`Pub_Bank_Code`,`Pub_Bank_Branch`,`Pub_Pay_Address`,`Pub_Pay_Iban`,`Pub_Pay_Swift`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-04-18 15:59:54','0000-00-00 00:00:00',1,NULL),
(2,8,2,1223123,2331213,8388607,'Address','IBAN-123','SW-12121','1','2015-06-12 05:45:04','0000-00-00 00:00:00',1,NULL),
(3,15,2,8388607,NULL,NULL,'','','','1','2015-07-03 13:00:33','2015-07-28 09:52:39',1,1),
(4,15,2,8388607,NULL,NULL,'','','','1','2015-07-03 13:16:24','0000-00-00 00:00:00',1,NULL),
(5,15,2,8388607,NULL,NULL,'','','','1','2015-07-28 13:22:27','0000-00-00 00:00:00',1,1),
(8,18,2,8388607,NULL,NULL,'teste','8986537','8776','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(9,19,2,8388607,NULL,NULL,'teste','8986537','8776','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Pseudo_Id`),
  KEY `FK_wipo_publisher_pseudonym_pseodo_type` (`Pub_Pseudo_Type_Id`),
  KEY `FK_wipo_publisher_pseudonym_publisher_account` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_pseudonym_pseodo_type` FOREIGN KEY (`Pub_Pseudo_Type_Id`) REFERENCES `wipo_master_pseudonym_types` (`Pseudo_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_publisher_pseudonym_publisher_account` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_pseudonym` */

insert  into `wipo_publisher_pseudonym`(`Pub_Pseudo_Id`,`Pub_Acc_Id`,`Pub_Pseudo_Type_Id`,`Pub_Pseudo_Name`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,1,'Producer','1','2015-04-18 16:02:15','0000-00-00 00:00:00',1,NULL),
(2,8,1,'Producer','1','2015-06-12 05:45:04','0000-00-00 00:00:00',1,NULL),
(3,15,9,'Producerr','1','2015-07-03 13:01:05','2015-07-28 09:52:51',1,1),
(4,15,9,'Producerr','1','2015-07-03 13:16:24','0000-00-00 00:00:00',1,NULL),
(5,15,9,'Producerr','1','2015-07-28 13:22:27','0000-00-00 00:00:00',1,1),
(8,18,9,'OR','1','2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(9,19,9,'OR','1','2015-09-21 15:43:53','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
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

insert  into `wipo_publisher_related_rights`(`Pub_Rel_Rgt_Id`,`Pub_Acc_Id`,`Pub_Rel_Society_Id`,`Pub_Rel_Entry_Date`,`Pub_Rel_Exit_Date`,`Pub_Rel_Internal_Position_Id`,`Pub_Rel_Entry_Date_2`,`Pub_Rel_Exit_Date_2`,`Pub_Rel_Region_Id`,`Pub_Rel_Profession_Id`,`Pub_Rel_File`,`Pub_Rel_Duration`,`Pub_Rel_Avl_Work_Cat_Id`,`Pub_Rel_Type_Rght_Id`,`Pub_Rel_Managed_Rights_Id`,`Pub_Rel_Territories_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,10,'2015-04-16','2015-04-30',1,'2015-04-16','2015-04-30',1,1,'',NULL,1,1,1,8,NULL,'0000-00-00 00:00:00',1,NULL);

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
  `Pub_Suc_Liquidation_Date` date DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pub_Suc_Id`),
  KEY `FK_wipo_publisher_succession_acount` (`Pub_Acc_Id`),
  CONSTRAINT `FK_wipo_publisher_succession_acount` FOREIGN KEY (`Pub_Acc_Id`) REFERENCES `wipo_publisher_account` (`Pub_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_publisher_succession` */

insert  into `wipo_publisher_succession`(`Pub_Suc_Id`,`Pub_Acc_Id`,`Pub_Suc_Date_Transfer`,`Pub_Suc_Name`,`Pub_Suc_Address_1`,`Pub_Suc_Address_2`,`Pub_Suc_Annotation`,`Pub_Suc_Liquidation_Date`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'2010-03-05','Sucessor','Address 1','Address 2','test',NULL,NULL,'0000-00-00 00:00:00',1,NULL),
(3,3,'2015-04-03','','','','',NULL,NULL,'0000-00-00 00:00:00',1,NULL),
(4,15,NULL,'Sucessor','Address 1','Address 2','8','2014-02-05','2015-07-03 13:06:44','2015-10-05 12:13:38',1,10),
(7,18,NULL,'test surnae','test address',NULL,'test annotation',NULL,'2015-09-21 15:43:52','0000-00-00 00:00:00',10,NULL),
(8,19,NULL,'test surnae','test address',NULL,'test annotation',NULL,'2015-09-21 15:43:53','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_recording` */

DROP TABLE IF EXISTS `wipo_recording`;

CREATE TABLE `wipo_recording` (
  `Rcd_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_GUID` varchar(50) NOT NULL,
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
  `Rcd_Label_Id` int(11) NOT NULL,
  `Rcd_Reference` varchar(255) DEFAULT NULL,
  `Rcd_File` varchar(255) DEFAULT NULL,
  `Rcd_Isrc_Code` varchar(100) DEFAULT NULL,
  `Rcd_Iswc_Number` varchar(100) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Id`),
  UNIQUE KEY `NewIndex1` (`Rcd_Internal_Code`),
  KEY `FK_wipo_recording_language` (`Rcd_Language_Id`),
  KEY `FK_wipo_recording_type` (`Rcd_Type_Id`),
  KEY `FK_wipo_recording_record_country` (`Rcd_Record_Country_id`),
  KEY `FK_wipo_recording_production_country` (`Rcd_Product_Country_Id`),
  KEY `FK_wipo_recording_record_type` (`Rcd_Record_Type_Id`),
  KEY `FK_wipo_recording_document_sts` (`Rcd_Doc_Status_Id`),
  KEY `FK_wipo_recording_label` (`Rcd_Label_Id`),
  CONSTRAINT `FK_wipo_recording_document_sts` FOREIGN KEY (`Rcd_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_label` FOREIGN KEY (`Rcd_Label_Id`) REFERENCES `wipo_master_label` (`Master_Label_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_language` FOREIGN KEY (`Rcd_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_production_country` FOREIGN KEY (`Rcd_Product_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_record_country` FOREIGN KEY (`Rcd_Record_Country_id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_record_type` FOREIGN KEY (`Rcd_Record_Type_Id`) REFERENCES `wipo_master_record_type` (`Master_Rec_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_type` FOREIGN KEY (`Rcd_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording` */

insert  into `wipo_recording`(`Rcd_Id`,`Rcd_GUID`,`Rcd_Title`,`Rcd_Language_Id`,`Rcd_Internal_Code`,`Rcd_Type_Id`,`Rcd_Date`,`Rcd_Duration`,`Rcd_Record_Country_id`,`Rcd_Product_Country_Id`,`Rcd_Doc_Status_Id`,`Rcd_Record_Type_Id`,`Rcd_Label_Id`,`Rcd_Reference`,`Rcd_File`,`Rcd_Isrc_Code`,`Rcd_Iswc_Number`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'41fe67e6-2237-11e5-8959-74d435d335fe','Music Recording 1',5,'SOC-T-0000100',4,'2015-05-01','10:00:00',2,2,2,1,1,'RT23123','File','123231','1232123','2015-05-29 11:48:08','0000-00-00 00:00:00',1,NULL),
(4,'41fe69ad-2237-11e5-8959-74d435d335fe','As long as ',5,'SOC-T-0000105',4,'2015-06-04','00:03:00',2,2,2,1,2,'','','','','2015-06-05 05:07:08','2015-07-28 15:52:52',1,1),
(5,'41fe6a87-2237-11e5-8959-74d435d335fe','dookie',5,'SOC-T-0000106',4,'2015-06-06','00:03:00',2,2,1,1,1,'','','','','2015-06-07 17:05:06','0000-00-00 00:00:00',1,NULL),
(6,'41fe6b50-2237-11e5-8959-74d435d335fe','nothing else matters',5,'SOC-T-0000107',4,'2015-06-09','00:05:00',2,2,2,1,1,'','','','','2015-06-09 19:16:02','0000-00-00 00:00:00',1,NULL),
(7,'41fe6c1a-2237-11e5-8959-74d435d335fe','ride the lightning',5,'SOC-T-0000108',4,'2015-06-09','00:05:00',2,2,2,1,1,'','','','','2015-06-10 02:44:26','0000-00-00 00:00:00',1,NULL),
(8,'41fe6ce0-2237-11e5-8959-74d435d335fe','Wild wild west',5,'SOC-T-0000109',4,'2015-06-11','00:03:00',2,2,2,1,1,'','','','','2015-06-12 07:19:17','0000-00-00 00:00:00',1,NULL),
(9,'3C6F40A8-23CD-C0D5-01F4-24B878D95D84','Org Title 5',5,'SOC-R-0000111',4,'2015-07-04','06:00:00',2,2,2,1,1,'','','','','2015-07-04 16:02:27','0000-00-00 00:00:00',1,NULL),
(12,'385C6540-D08D-9B66-5746-D35EE1C1E215','Test recording',5,'SOC-R-0000114',4,'2015-08-03','09:05:00',2,2,2,1,1,'','','','','2015-08-03 16:36:18','0000-00-00 00:00:00',1,NULL),
(13,'F6E66BD6-FE64-11EE-3C25-EA89180A1193','Test recording 22',5,'SOC-R-0000115',4,'2015-08-03','09:00:00',2,2,2,1,1,'','','','','2015-08-03 16:41:22','0000-00-00 00:00:00',1,NULL),
(14,'28A635F6-81D2-8F3E-4BC0-D03AE0D5CD1E','Test recordingq',5,'SOC-R-0000116',4,'2015-08-03','05:00:00',2,2,2,1,1,'','','','','2015-08-03 17:01:03','0000-00-00 00:00:00',1,NULL),
(15,'E1D5DA6F-DCD2-D85D-BF98-470AAE4A9DBB','Test recording',5,'SOC-R-0000117',4,'2015-08-03','09:00:00',2,2,2,1,1,'','','','','2015-08-03 17:42:45','0000-00-00 00:00:00',1,NULL),
(16,'57FADAB1-F8FC-3BC7-4C2F-9135C54B5681','Test recording33',5,'SOC-R-0000118',4,'2015-08-03','06:00:00',2,2,2,1,2,'','','','','2015-08-03 18:05:41','0000-00-00 00:00:00',1,NULL),
(17,'4134B1D9-7191-62E2-3572-660AB9C06D3B','Test recording 5',5,'SOC-R-0000119',4,'2015-08-03','00:09:00',2,2,2,1,1,'','','','','2015-08-03 18:10:57','0000-00-00 00:00:00',1,NULL),
(18,'6E5A80AF-2CE1-CD56-4FEA-4D7C377FBC8B','Test recording 59',5,'SOC-R-0000120',4,'2015-08-03','00:09:00',2,2,2,1,1,'','','','','2015-08-03 18:32:12','0000-00-00 00:00:00',1,NULL),
(19,'01D1F856-CC4B-CD11-8D4D-3725B688CE16','Test recordingqs',5,'SOC-R-0000121',4,'2015-08-03','07:00:00',2,2,2,1,1,'','','','','2015-08-03 19:25:00','0000-00-00 00:00:00',1,NULL),
(20,'BEB693EB-A287-1991-BB89-044D8D07244F','Test recording133',5,'SOC-R-0000122',4,'2015-08-03','03:03:03',2,2,2,1,1,'','','','','2015-08-03 19:28:55','0000-00-00 00:00:00',1,NULL),
(21,'FC5BFCFA-0297-0B77-6AD1-7CE9A4442428','Test recording 5996',5,'SOC-R-0000123',4,'2015-08-03','00:50:00',2,2,2,1,1,'','','','','2015-08-03 19:33:49','0000-00-00 00:00:00',1,NULL),
(23,'CA67B147-65FD-3549-8B70-48036F0DB2FB','New recording',5,'SOC-R-0000125',4,'2015-08-05','09:05:00',2,2,1,1,2,'12312312','FILE','1233212','2123212','2015-09-24 15:59:10','0000-00-00 00:00:00',10,NULL),
(24,'5C7B19B7-E1FF-CA55-5CC6-4FC274ACACF8','New recording 2',5,'SOC-R-0000126',4,'2015-08-05','15:05:50',2,2,1,1,2,'12312312','FILE','1233212','2123212','2015-09-24 15:59:11','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Link_Id`),
  KEY `FK_wipo_recording_link_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_link_performer` (`Rcd_Perf_Id`),
  KEY `FK_wipo_recording_link_producer` (`Rcd_Prod_Id`),
  CONSTRAINT `FK_wipo_recording_link_performer` FOREIGN KEY (`Rcd_Perf_Id`) REFERENCES `wipo_performer_account` (`Perf_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_link_producer` FOREIGN KEY (`Rcd_Prod_Id`) REFERENCES `wipo_producer_account` (`Pro_Acc_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_link_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_link` */

insert  into `wipo_recording_link`(`Rcd_Link_Id`,`Rcd_Id`,`Rcd_Link_Title`,`Rcd_Perf_Id`,`Rcd_Prod_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Orginal TT',3,4,'2015-05-29 11:49:18','0000-00-00 00:00:00',1,NULL),
(2,1,'test',1,8,'2015-05-30 15:36:28','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_recording_publication` */

DROP TABLE IF EXISTS `wipo_recording_publication`;

CREATE TABLE `wipo_recording_publication` (
  `Rcd_Publ_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Id` int(11) NOT NULL,
  `Rcd_Publ_Internal_Code` varchar(100) NOT NULL,
  `Rcd_Publ_Year` year(4) NOT NULL,
  `Rcd_Publ_Country_Id` int(11) NOT NULL,
  `Rcd_Publ_Prod_Nation_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Publ_Id`),
  UNIQUE KEY `NewIndex1` (`Rcd_Publ_Internal_Code`),
  KEY `FK_wipo_recording_publication_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_publication_country` (`Rcd_Publ_Country_Id`),
  KEY `FK_wipo_recording_publication_nationality` (`Rcd_Publ_Prod_Nation_Id`),
  CONSTRAINT `FK_wipo_recording_publication_country` FOREIGN KEY (`Rcd_Publ_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_publication_nationality` FOREIGN KEY (`Rcd_Publ_Prod_Nation_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_publication_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_publication` */

insert  into `wipo_recording_publication`(`Rcd_Publ_Id`,`Rcd_Id`,`Rcd_Publ_Internal_Code`,`Rcd_Publ_Year`,`Rcd_Publ_Country_Id`,`Rcd_Publ_Prod_Nation_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Test',2000,2,2,'2015-05-29 11:48:33','0000-00-00 00:00:00',1,NULL),
(2,4,'SOC-S-0000001',2000,2,2,'2015-07-02 16:50:14','2015-07-28 15:53:16',1,1);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Right_Id`),
  KEY `FK_wipo_work_rightholder_work` (`Rcd_Id`),
  KEY `FK_wipo_work_rightholder_organization` (`Rcd_Right_Equal_Org_id`),
  KEY `FK_wipo_work_rightholder_organization_mechanical` (`Rcd_Right_Blank_Org_Id`),
  KEY `FK_wipo_work_rightholder_role` (`Rcd_Right_Role`),
  CONSTRAINT `FK_wipo_recording_rightholder_balnk_org` FOREIGN KEY (`Rcd_Right_Blank_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_equal_org` FOREIGN KEY (`Rcd_Right_Equal_Org_id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_rightholder_type_right` FOREIGN KEY (`Rcd_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_rightholder` */

insert  into `wipo_recording_rightholder`(`Rcd_Right_Id`,`Rcd_Id`,`Rcd_Member_GUID`,`Rcd_Right_Role`,`Rcd_Right_Equal_Share`,`Rcd_Right_Equal_Org_id`,`Rcd_Right_Blank_Share`,`Rcd_Right_Blank_Org_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(6,5,'c08b90a4-14e4-11e5-b10a-74d435d335fe',14,'3.00',1,'3.00',1,'2015-06-18 08:26:33','0000-00-00 00:00:00',1,NULL),
(7,5,'c08be234-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:26:33','0000-00-00 00:00:00',1,NULL),
(8,6,'B7E7D492-BF77-58D3-F6BD-0C8234C44424',14,'3.00',1,'3.00',1,'2015-06-18 08:28:38','0000-00-00 00:00:00',1,NULL),
(9,6,'c08f1a1f-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:28:38','0000-00-00 00:00:00',1,NULL),
(10,7,'B7E7D492-BF77-58D3-F6BD-0C8234C44424',14,'3.00',1,'3.00',1,'2015-06-18 08:29:11','0000-00-00 00:00:00',1,NULL),
(11,7,'c08f1d9d-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:29:11','0000-00-00 00:00:00',1,NULL),
(12,8,'D911F66D-FECF-9144-1A55-A43D760D2E6A',14,'3.00',1,'3.00',1,'2015-06-18 08:34:20','0000-00-00 00:00:00',1,NULL),
(13,8,'c08f1a1f-14e4-11e5-b10a-74d435d335fe',11,'1.00',1,'1.00',1,'2015-06-18 08:34:20','0000-00-00 00:00:00',1,NULL),
(23,1,'c08b8fa0-14e4-11e5-b10a-74d435d335fe',14,'6.00',1,'9.00',1,'2015-06-17 18:35:19','2015-07-21 13:38:08',1,1),
(24,1,'c08b921d-14e4-11e5-b10a-74d435d335fe',14,'16.00',1,'15.00',1,'2015-06-17 18:35:19','2015-07-21 13:38:08',1,1),
(25,4,'c08b8fa0-14e4-11e5-b10a-74d435d335fe',14,'6.00',1,'9.00',1,'2015-07-03 16:35:35','2015-07-28 12:23:02',1,1),
(26,4,'c08be234-14e4-11e5-b10a-74d435d335fe',11,'8.00',1,'7.00',1,'2015-07-03 16:35:35','2015-07-28 12:23:02',1,1),
(27,4,'c08b929b-14e4-11e5-b10a-74d435d335fe',14,'5.00',1,'5.00',1,'2015-07-03 16:35:35','2015-07-28 12:23:02',1,1);

/*Table structure for table `wipo_recording_session` */

DROP TABLE IF EXISTS `wipo_recording_session`;

CREATE TABLE `wipo_recording_session` (
  `Rcd_Ses_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_GUID` varchar(40) NOT NULL,
  `Rcd_Ses_Title` varchar(255) NOT NULL,
  `Rcd_Ses_Internal_Code` varchar(100) NOT NULL,
  `Rcd_Ses_Language_Id` int(11) DEFAULT NULL,
  `Rcd_Ses_Orchestra` varchar(50) DEFAULT NULL,
  `Rcd_Ses_Ref_Medium` varchar(50) DEFAULT NULL,
  `Rcd_Ses_Hours` smallint(6) DEFAULT NULL,
  `Rcd_Ses_Record_Date` date NOT NULL,
  `Rcd_Ses_Studio_Id` int(11) NOT NULL,
  `Rcd_Ses_Producer` int(11) DEFAULT NULL,
  `Rcd_Ses_Main_Artist` int(11) DEFAULT NULL,
  `Rcd_Ses_Medium_Id` int(11) NOT NULL,
  `Rcd_Ses_Type_Id` int(11) NOT NULL,
  `Rcd_Ses_Destination_Id` int(11) NOT NULL,
  `Rcd_Ses_Country_Id` int(11) NOT NULL,
  `Rcd_Ses_Factor_Id` int(11) NOT NULL,
  `Rcd_Ses_Release_Year` year(4) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Id`),
  KEY `FK_wipo_recording_session_language` (`Rcd_Ses_Language_Id`),
  KEY `FK_wipo_recording_session_studio` (`Rcd_Ses_Studio_Id`),
  KEY `FK_wipo_recording_session_medium` (`Rcd_Ses_Medium_Id`),
  KEY `FK_wipo_recording_session_type` (`Rcd_Ses_Type_Id`),
  KEY `FK_wipo_recording_session_country` (`Rcd_Ses_Country_Id`),
  KEY `FK_wipo_recording_session_factor` (`Rcd_Ses_Factor_Id`),
  KEY `FK_wipo_recording_session_destination` (`Rcd_Ses_Destination_Id`),
  CONSTRAINT `FK_wipo_recording_session_country` FOREIGN KEY (`Rcd_Ses_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_destination` FOREIGN KEY (`Rcd_Ses_Destination_Id`) REFERENCES `wipo_master_destination` (`Master_Dist_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_factor` FOREIGN KEY (`Rcd_Ses_Factor_Id`) REFERENCES `wipo_master_factor` (`Master_Factor_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_language` FOREIGN KEY (`Rcd_Ses_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_medium` FOREIGN KEY (`Rcd_Ses_Medium_Id`) REFERENCES `wipo_master_medium` (`Master_Medium_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_studio` FOREIGN KEY (`Rcd_Ses_Studio_Id`) REFERENCES `wipo_master_studio` (`Master_Studio_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_type` FOREIGN KEY (`Rcd_Ses_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session` */

insert  into `wipo_recording_session`(`Rcd_Ses_Id`,`Rcd_Ses_GUID`,`Rcd_Ses_Title`,`Rcd_Ses_Internal_Code`,`Rcd_Ses_Language_Id`,`Rcd_Ses_Orchestra`,`Rcd_Ses_Ref_Medium`,`Rcd_Ses_Hours`,`Rcd_Ses_Record_Date`,`Rcd_Ses_Studio_Id`,`Rcd_Ses_Producer`,`Rcd_Ses_Main_Artist`,`Rcd_Ses_Medium_Id`,`Rcd_Ses_Type_Id`,`Rcd_Ses_Destination_Id`,`Rcd_Ses_Country_Id`,`Rcd_Ses_Factor_Id`,`Rcd_Ses_Release_Year`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,'6ADFB06B-4E44-7B49-F6D1-97500055E6AB','Recording Session 1','SOC-F-0000001',5,'Orchestra','Medium',5,'2015-07-01',1,21,99,1,4,1,2,5,2015,'2015-07-15 18:41:02','2015-09-14 13:55:30',1,12),
(3,'13ACFF34-9F0A-52AB-8E6C-CB752AEB1D31','Recording Session 2','SOC-F-0000002',5,'Orchestra','Medium',5,'2015-07-15',1,9,8,1,4,1,2,5,2015,'2015-07-15 18:42:07','0000-00-00 00:00:00',1,NULL),
(5,'6C091901-1543-5D16-F5BD-8CD434B46342','Recording Session 3','SOC-F-0000004',5,'','',NULL,'2015-07-15',1,10,14,1,4,1,2,5,2015,'2015-07-21 18:35:39','0000-00-00 00:00:00',1,NULL),
(6,'04301834-AFAA-60A4-37FE-2563FF96BF17','Test','SOC-RSS-0000005',5,'','',NULL,'2015-08-04',1,22,3,1,4,1,2,5,2015,'2015-08-03 10:53:24','0000-00-00 00:00:00',1,NULL),
(7,'54DA6510-146D-CCF4-8DA4-035F1141784A','Test','SOC-RSS-0000006',5,'','',NULL,'2015-08-12',1,23,107,1,4,1,2,5,2015,'2015-08-05 18:11:10','0000-00-00 00:00:00',1,NULL),
(8,'CCF07C8C-8601-5C07-3968-F74EEC10D2D7','Recording Session 3','SOC-RSS-0000007',5,'','',NULL,'2015-08-11',1,4,96,1,4,1,2,5,2015,'2015-08-10 12:16:48','0000-00-00 00:00:00',1,NULL),
(9,'6AF9F6BC-AA22-6A11-E1CA-D85A6E858470','Test new','SOC-RSS-0000008',5,'','',NULL,'2015-09-16',1,NULL,98,3,2,1,2,1,2015,'2015-09-14 14:02:34','0000-00-00 00:00:00',12,NULL);

/*Table structure for table `wipo_recording_session_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_recording_session_biograph_uploads`;

CREATE TABLE `wipo_recording_session_biograph_uploads` (
  `Rcd_Ses_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Biogrph_Id` int(11) NOT NULL,
  `Rcd_Ses_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Rcd_Ses_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Biogrph_Upl_Id`),
  KEY `FK_wipo_recording_session_biograph_uploads_biography` (`Rcd_Ses_Biogrph_Id`),
  CONSTRAINT `FK_wipo_recording_session_biograph_uploads_biography` FOREIGN KEY (`Rcd_Ses_Biogrph_Id`) REFERENCES `wipo_recording_session_biography` (`Rcd_Ses_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_biograph_uploads` */

insert  into `wipo_recording_session_biograph_uploads`(`Rcd_Ses_Biogrph_Upl_Id`,`Rcd_Ses_Biogrph_Id`,`Rcd_Ses_Biogrph_Upl_File`,`Rcd_Ses_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(12,3,'\\recordingsessionbiographuploads\\610d372180a7eb46952cd837ea36f75e.jpeg','Test','2015-07-15 18:43:35','0000-00-00 00:00:00',1,NULL),
(13,3,'\\recordingsessionbiographuploads\\456c475cdee76a20f77a4dd21967871b.jpeg','Test test','2015-07-15 18:43:48','0000-00-00 00:00:00',1,NULL),
(14,3,'\\recordingsessionbiographuploads\\9e6b5218daff30d08bdb7b550ba85a39.jpg','Test test','2015-07-15 18:43:48','0000-00-00 00:00:00',1,NULL),
(15,4,'\\recordingsessionbiographuploads\\1fd4f82f977eb6e0b45ee6ae3ee5fd1a.jpg','Test','2015-07-24 12:46:40','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_recording_session_biography` */

DROP TABLE IF EXISTS `wipo_recording_session_biography`;

CREATE TABLE `wipo_recording_session_biography` (
  `Rcd_Ses_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Biogrph_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Biogrph_Id`),
  KEY `FK_wipo_recording_session_biography_recording_session` (`Rcd_Ses_Id`),
  CONSTRAINT `FK_wipo_recording_session_biography_recording_session` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_biography` */

insert  into `wipo_recording_session_biography`(`Rcd_Ses_Biogrph_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Biogrph_Annotation`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(3,3,'Test','2015-07-15 18:43:35','2015-07-15 15:13:48',1,1),
(4,2,'66','2015-07-15 18:57:10','2015-07-24 09:16:40',1,1);

/*Table structure for table `wipo_recording_session_documentation` */

DROP TABLE IF EXISTS `wipo_recording_session_documentation`;

CREATE TABLE `wipo_recording_session_documentation` (
  `Rcd_Ses_Doc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Doc_Status_Id` int(11) NOT NULL,
  `Rcd_Ses_Doc_Type_Id` int(11) NOT NULL,
  `Rcd_Ses_Doc_Sign_Date` date NOT NULL,
  `Rcd_Ses_Doc_File` varchar(255) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Doc_Id`),
  KEY `FK_wipo_recording_session_documentation_work` (`Rcd_Ses_Id`),
  KEY `FK_wipo_recording_session_documentation_document_status` (`Rcd_Ses_Doc_Status_Id`),
  KEY `FK_wipo_recording_session_documentation_document_type` (`Rcd_Ses_Doc_Type_Id`),
  CONSTRAINT `FK_wipo_recording_session_documentation_document_status` FOREIGN KEY (`Rcd_Ses_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_documentation_document_type` FOREIGN KEY (`Rcd_Ses_Doc_Type_Id`) REFERENCES `wipo_master_document` (`Master_Doc_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_documentation_work` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_documentation` */

insert  into `wipo_recording_session_documentation`(`Rcd_Ses_Doc_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Doc_Status_Id`,`Rcd_Ses_Doc_Type_Id`,`Rcd_Ses_Doc_Sign_Date`,`Rcd_Ses_Doc_File`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(7,3,1,1,'2015-07-07','','2015-07-15 18:42:16','0000-00-00 00:00:00',1,NULL),
(8,2,1,1,'2015-07-01','','2015-07-15 19:26:38','0000-00-00 00:00:00',1,NULL),
(10,5,1,1,'2015-07-07','','2015-07-21 18:38:01','0000-00-00 00:00:00',1,NULL),
(11,6,1,1,'2015-07-29','','2015-08-03 11:15:33','0000-00-00 00:00:00',1,NULL),
(12,7,1,1,'2015-08-19','','2015-08-05 18:11:17','2015-08-10 12:46:50',1,1),
(13,8,1,1,'2015-08-06','','2015-08-10 12:16:54','2015-08-10 12:28:06',1,1);

/*Table structure for table `wipo_recording_session_folio` */

DROP TABLE IF EXISTS `wipo_recording_session_folio`;

CREATE TABLE `wipo_recording_session_folio` (
  `Rcd_Ses_Folio_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Folio_Name` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Folio_Id`),
  KEY `FK_wipo_recording_session_folio_recording_session` (`Rcd_Ses_Id`),
  CONSTRAINT `FK_wipo_recording_session_folio_recording_session` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_folio` */

insert  into `wipo_recording_session_folio`(`Rcd_Ses_Folio_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Folio_Name`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(4,3,213231,'2015-07-15 18:44:19','0000-00-00 00:00:00',1,NULL),
(5,3,2132319,'2015-07-15 18:44:26','2015-07-15 15:18:35',1,1),
(6,2,213231,'2015-07-15 18:48:55','2015-07-31 15:38:15',1,1),
(8,5,213231,'2015-07-21 18:47:58','0000-00-00 00:00:00',1,NULL),
(11,2,2132316,'2015-07-31 15:29:46','0000-00-00 00:00:00',1,NULL),
(12,2,21323166,'2015-07-31 15:38:28','2015-07-31 15:38:40',1,1),
(13,7,21323166,'2015-08-05 18:13:14','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_recording_session_rightholder` */

DROP TABLE IF EXISTS `wipo_recording_session_rightholder`;

CREATE TABLE `wipo_recording_session_rightholder` (
  `Rcd_Ses_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Right_Work_GUID` varchar(40) NOT NULL,
  `Rcd_Ses_Right_Member_GUID` varchar(40) NOT NULL,
  `Rcd_Ses_Right_Work_Type` enum('W','R') NOT NULL DEFAULT 'R' COMMENT 'W -> Work, R -> Recording',
  `Rcd_Ses_Right_Member_Type` enum('A','P') DEFAULT 'P' COMMENT 'A -> Author, P -> Performer',
  `Rcd_Ses_Right_Role` int(11) NOT NULL,
  `Rcd_Ses_Right_Equal_Share` decimal(10,2) NOT NULL,
  `Rcd_Ses_Right_Equal_Org_Id` int(11) NOT NULL,
  `Rcd_Ses_Right_Blank_Share` decimal(10,2) NOT NULL,
  `Rcd_Ses_Right_Blank_Org_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Right_Id`),
  KEY `FK_wipo_recording_session_rightholder_sound` (`Rcd_Ses_Id`),
  KEY `FK_wipo_recording_session_rightholder_equal_organization` (`Rcd_Ses_Right_Equal_Org_Id`),
  KEY `FK_wipo_recording_session_rightholder_blank_organization` (`Rcd_Ses_Right_Blank_Org_Id`),
  KEY `FK_wipo_recording_session_rightholder_role` (`Rcd_Ses_Right_Role`),
  CONSTRAINT `FK_wipo_recording_session_rightholder_blank_organization` FOREIGN KEY (`Rcd_Ses_Right_Blank_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_rightholder_equal_organization` FOREIGN KEY (`Rcd_Ses_Right_Equal_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_rightholder_role` FOREIGN KEY (`Rcd_Ses_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_rightholder_sound` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_rightholder` */

insert  into `wipo_recording_session_rightholder`(`Rcd_Ses_Right_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Right_Work_GUID`,`Rcd_Ses_Right_Member_GUID`,`Rcd_Ses_Right_Work_Type`,`Rcd_Ses_Right_Member_Type`,`Rcd_Ses_Right_Role`,`Rcd_Ses_Right_Equal_Share`,`Rcd_Ses_Right_Equal_Org_Id`,`Rcd_Ses_Right_Blank_Share`,`Rcd_Ses_Right_Blank_Org_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(21,2,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b8fa0-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(22,2,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b921d-14e4-11e5-b10a-74d435d335fe','R','P',14,'16.00',1,'15.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(23,2,'41fe69ad-2237-11e5-8959-74d435d335fe','c08b8fa0-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(24,2,'41fe69ad-2237-11e5-8959-74d435d335fe','c08b929b-14e4-11e5-b10a-74d435d335fe','R','P',14,'5.00',1,'5.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(25,2,'41fe6a87-2237-11e5-8959-74d435d335fe','c08b90a4-14e4-11e5-b10a-74d435d335fe','R','P',14,'3.00',1,'3.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(26,2,'41fe6a87-2237-11e5-8959-74d435d335fe','c08b3f47-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(27,2,'41fe6a87-2237-11e5-8959-74d435d335fe','c08b8e11-14e4-11e5-b10a-74d435d335fe','R','P',17,'2.00',1,'2.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(28,2,'41fe6c1a-2237-11e5-8959-74d435d335fe','B7E7D492-BF77-58D3-F6BD-0C8234C44424','R','P',14,'3.00',1,'3.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(29,2,'41fe6c1a-2237-11e5-8959-74d435d335fe','c08b8f23-14e4-11e5-b10a-74d435d335fe','R','P',14,'8.00',1,'9.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(30,2,'4134B1D9-7191-62E2-3572-660AB9C06D3B','c08b8e9f-14e4-11e5-b10a-74d435d335fe','R','P',17,'2.00',1,'2.00',1,'2015-07-24 09:14:44','2015-08-03 14:42:36',1,1),
(35,7,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b8fa0-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-08-05 14:42:32','2015-08-05 14:43:03',1,1),
(36,7,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b921d-14e4-11e5-b10a-74d435d335fe','R','P',14,'16.00',1,'15.00',1,'2015-08-05 14:42:32','2015-08-05 14:43:03',1,1),
(37,7,'41fe6ce0-2237-11e5-8959-74d435d335fe','D911F66D-FECF-9144-1A55-A43D760D2E6A','R','P',14,'3.00',1,'3.00',1,'2015-08-05 14:42:32','2015-08-05 14:43:03',1,1),
(38,7,'3C6F40A8-23CD-C0D5-01F4-24B878D95D84','95215F76-9FC6-6C8D-7BFE-8C7378DA9DFE','R','P',14,'9.00',1,'9.00',1,'2015-08-05 14:42:32','2015-08-05 14:43:03',1,1),
(39,7,'BEB693EB-A287-1991-BB89-044D8D07244F','48BC95A0-E1B1-F91D-768D-E02FC074DF30','R','P',17,'2.00',1,'2.00',1,'2015-08-05 14:42:32','2015-08-05 14:43:03',1,1);

/*Table structure for table `wipo_recording_session_subtitle` */

DROP TABLE IF EXISTS `wipo_recording_session_subtitle`;

CREATE TABLE `wipo_recording_session_subtitle` (
  `Rcd_Ses_Subtitle_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Subtitle_Name` varchar(255) NOT NULL,
  `Rcd_Ses_Subtitle_Type_Id` int(11) NOT NULL,
  `Rcd_Ses_Subtitle_Language_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Ses_Subtitle_Id`),
  KEY `FK_wipo_recording_session_subtitle_session` (`Rcd_Ses_Id`),
  KEY `FK_wipo_recording_session_subtitle_type` (`Rcd_Ses_Subtitle_Type_Id`),
  KEY `FK_wipo_recording_session_subtitle_language` (`Rcd_Ses_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_recording_session_subtitle_language` FOREIGN KEY (`Rcd_Ses_Subtitle_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_recording_session_subtitle_session` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_wipo_recording_session_subtitle_type` FOREIGN KEY (`Rcd_Ses_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_subtitle` */

insert  into `wipo_recording_session_subtitle`(`Rcd_Ses_Subtitle_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Subtitle_Name`,`Rcd_Ses_Subtitle_Type_Id`,`Rcd_Ses_Subtitle_Language_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(8,3,'Tets29',4,5,'2015-07-15 18:43:03','2015-07-15 15:13:23',1,1),
(9,2,'Tets',4,5,'2015-07-21 19:18:28','2015-07-21 15:48:40',1,1),
(10,2,'Tets2',4,5,'2015-07-21 19:18:33','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_recording_session_upload` */

DROP TABLE IF EXISTS `wipo_recording_session_upload`;

CREATE TABLE `wipo_recording_session_upload` (
  `Rcd_Ses_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rcd_Ses_Id` int(11) NOT NULL,
  `Rcd_Ses_Upl_Doc_Name` varchar(255) NOT NULL,
  `Rcd_Ses_Upl_File` varchar(1000) NOT NULL,
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Rcd_Ses_Upl_Id`),
  KEY `FK_wipo_recording_session_upload_auth` (`Rcd_Ses_Id`),
  CONSTRAINT `FK_wipo_recording_session_upload_auth` FOREIGN KEY (`Rcd_Ses_Id`) REFERENCES `wipo_recording_session` (`Rcd_Ses_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_session_upload` */

insert  into `wipo_recording_session_upload`(`Rcd_Ses_Upl_Id`,`Rcd_Ses_Id`,`Rcd_Ses_Upl_Doc_Name`,`Rcd_Ses_Upl_File`,`Created_By`,`Updated_By`,`Created_Date`,`Rowversion`) values 
(31,2,'Test 123','/recordingsessionupload/63337b60427bc6ba35a9559c9ffb1890.jpeg',1,1,'2015-08-14 15:53:11','2015-08-14 15:56:56');

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Rcd_Subtitle_Id`),
  KEY `FK_wipo_recording_subtitle_recording` (`Rcd_Id`),
  KEY `FK_wipo_recording_subtitle_type` (`Rcd_Subtitle_Type_Id`),
  KEY `FK_wipo_recording_subtitle_language` (`Rcd_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_recording_subtitle_recording` FOREIGN KEY (`Rcd_Id`) REFERENCES `wipo_recording` (`Rcd_Id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_wipo_recording_subtitle_type` FOREIGN KEY (`Rcd_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_recording_subtitle` */

insert  into `wipo_recording_subtitle`(`Rcd_Subtitle_Id`,`Rcd_Id`,`Rcd_Subtitle_Name`,`Rcd_Subtitle_Type_Id`,`Rcd_Subtitle_Language_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'Music Subtitle 1',1,1,'2015-05-29 11:48:26','0000-00-00 00:00:00',1,NULL),
(2,4,'New SB',4,5,'2015-07-03 16:06:14','2015-07-28 15:53:09',1,1),
(3,23,'TITLE',1,5,'2015-09-24 15:59:11','0000-00-00 00:00:00',10,NULL),
(4,24,'TITLE',1,5,'2015-09-24 15:59:11','0000-00-00 00:00:00',10,NULL);

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

insert  into `wipo_share_definition_per_role`(`Shr_Def_Id`,`Shr_Def_Role`,`Shr_Def_Equ_remn`,`Shr_Def_Blank_Tape_remn`,`Shr_Def_Neigh_Rgts`,`Shr_Def_Excl_Rgts`,`Active`,`Created_Date`,`Rowversion`) values 
(4,18,'9.00','7.00','5.00','3.00','1','2015-06-09 04:05:42','0000-00-00 00:00:00'),
(5,21,'4.00','5.00','8.00','2.00','1','2015-06-09 04:05:54','0000-00-00 00:00:00'),
(6,19,'2.00','7.00','4.00','6.00','1','2015-06-09 04:06:08','0000-00-00 00:00:00'),
(7,20,'3.00','4.00','7.00','2.00','1','2015-06-09 04:06:18','0000-00-00 00:00:00'),
(8,5,'1.00','2.00','5.00','4.00','1','2015-06-09 04:06:30','0000-00-00 00:00:00'),
(9,6,'9.00','4.00','7.00','1.00','1','2015-06-09 04:06:42','0000-00-00 00:00:00'),
(10,7,'1.00','4.00','7.00','9.00','1','2015-06-09 04:07:09','0000-00-00 00:00:00'),
(11,15,'6.00','8.00','1.00','7.00','1','2015-06-09 04:07:21','0000-00-00 00:00:00'),
(12,17,'2.00','2.00','2.00','2.00','1','2015-06-09 04:07:33','0000-00-00 00:00:00'),
(13,9,'6.00','5.00','8.00','8.00','1','2015-06-09 04:07:57','0000-00-00 00:00:00'),
(14,1,'6.00','8.00','4.00','5.00','1','2015-06-09 04:08:08','0000-00-00 00:00:00'),
(15,4,'1.00','1.00','1.00','1.00','1','2015-06-09 04:08:18','0000-00-00 00:00:00'),
(16,3,'9.00','6.00','4.00','1.00','1','2015-06-09 04:08:30','0000-00-00 00:00:00'),
(17,11,'1.00','1.00','1.00','1.00','1','2015-06-09 04:08:43','0000-00-00 00:00:00'),
(18,8,'6.00','8.00','4.00','7.00','1','2015-06-09 04:08:53','0000-00-00 00:00:00'),
(19,12,'6.00','3.00','5.00','7.00','1','2015-06-09 04:09:05','0000-00-00 00:00:00');

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
  `Society_Factor` int(11) DEFAULT NULL,
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
  `Soceity_Work_Cat_Id` int(11) DEFAULT NULL,
  `Soceity_Int_Pos_Id` int(11) DEFAULT NULL,
  `Soceity_Mnge_Rght_Id` int(11) DEFAULT NULL,
  `Soceity_Doc_Sts_Id` int(11) DEFAULT NULL,
  `Soceity_Rec_Type_Id` int(11) DEFAULT NULL,
  `Soceity_Medium_Id` int(11) DEFAULT NULL,
  `Soceity_Legal_Form_Id` int(11) DEFAULT NULL,
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
  KEY `FK_wipo_society_work_category` (`Soceity_Work_Cat_Id`),
  KEY `FK_wipo_society_int_pos` (`Soceity_Int_Pos_Id`),
  KEY `FK_wipo_society_managed_rights` (`Soceity_Mnge_Rght_Id`),
  KEY `FK_wipo_society_doc_sts` (`Soceity_Doc_Sts_Id`),
  KEY `FK_wipo_society_record_type` (`Soceity_Rec_Type_Id`),
  KEY `FK_wipo_society_medium` (`Soceity_Medium_Id`),
  KEY `FK_wipo_society_legal_form` (`Soceity_Legal_Form_Id`),
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
  CONSTRAINT `FK_wipo_society_doc_sts` FOREIGN KEY (`Soceity_Doc_Sts_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_hierarchy` FOREIGN KEY (`Society_Hirearchy_Id`) REFERENCES `wipo_master_hierarchy` (`Master_Hierarchy_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_int_pos` FOREIGN KEY (`Soceity_Int_Pos_Id`) REFERENCES `wipo_master_internal_position` (`Master_Int_Post_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_language` FOREIGN KEY (`Society_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_legal_form` FOREIGN KEY (`Soceity_Legal_Form_Id`) REFERENCES `wipo_master_legal_form` (`Master_Legal_Form_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_managed_rights` FOREIGN KEY (`Soceity_Mnge_Rght_Id`) REFERENCES `wipo_master_managed_rights` (`Master_Mgd_Rights_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_medium` FOREIGN KEY (`Soceity_Medium_Id`) REFERENCES `wipo_master_medium` (`Master_Medium_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_record_type` FOREIGN KEY (`Soceity_Rec_Type_Id`) REFERENCES `wipo_master_record_type` (`Master_Rec_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_type` FOREIGN KEY (`Society_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_society_work_category` FOREIGN KEY (`Soceity_Work_Cat_Id`) REFERENCES `wipo_master_works_category` (`Master_Work_Category_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_society` */

insert  into `wipo_society`(`Society_Id`,`Society_Code`,`Society_Abbr_Id`,`Society_Logo_File`,`Society_Language_Id`,`Society_Mailing_Address`,`Society_Country_Id`,`Society_Territory_Id`,`Society_Region_Id`,`Society_Profession_Id`,`Society_Role_Id`,`Society_Hirearchy_Id`,`Society_Payment_Id`,`Society_Type_Id`,`Society_Factor`,`Society_Doc_Type_Id`,`Society_Doc_Id`,`Society_Duration`,`Society_CopyRight`,`Society_RelatedRights`,`Society_Currency_Id`,`Society_Rate`,`Society_Main_Performer_Id`,`Society_Producer_Id`,`Society_Subscription`,`Soceity_Work_Cat_Id`,`Soceity_Int_Pos_Id`,`Soceity_Mnge_Rght_Id`,`Soceity_Doc_Sts_Id`,`Soceity_Rec_Type_Id`,`Soceity_Medium_Id`,`Soceity_Legal_Form_Id`,`Active`,`Created_Date`,`Rowversion`) values 
(10,'COPYRIGHT',1,'\\organization\\05be13266f895a0a745d22795c280920.png',5,'soc@gmail.com',2,8,1,2,NULL,2,2,4,5,1,3,5,10,10,1,'100.00','test','test','',1,6,1,2,1,3,1,'1','2015-03-22 22:59:05','0000-00-00 00:00:00'),
(11,'PERFORMER',1,'/society/746aba7f86171a268fe475b55f9e8863.jpg',5,'Togo',2,8,1,5,1,2,1,2,1,1,1,NULL,NULL,NULL,1,'0.00',NULL,NULL,'',1,NULL,1,1,1,3,1,'1','2015-04-17 08:42:37','0000-00-00 00:00:00'),
(12,'COPYRIGHT AND PUBLISHER',1,'/society/8818fc49a1fd9ae1e3e61ff90eb10708.jpeg',5,'soc@gmail.com',2,109,1,2,2,4,2,1,5,1,1,NULL,NULL,NULL,1,'0.00',NULL,NULL,'',1,1,1,1,1,3,2,'1','2015-09-01 12:13:38','0000-00-00 00:00:00'),
(13,'PERFORMER AND PRODUCER',1,'/society/898839265fa7a0b73139b6539ccc066a.jpeg',5,'soc@gmail.com',2,8,1,NULL,NULL,NULL,2,1,5,1,NULL,NULL,NULL,NULL,1,'0.00',NULL,NULL,'',1,NULL,1,2,1,3,2,'1','2015-09-01 12:14:15','0000-00-00 00:00:00'),
(14,'PRIME',1,'/society/75a89683b0323d487a166167f1207ede.jpeg',5,'soc@gmail.com',2,8,1,NULL,NULL,NULL,2,1,5,1,NULL,NULL,NULL,NULL,1,'0.00',NULL,NULL,'',1,NULL,1,2,1,3,1,'1','2015-09-01 12:14:50','0000-00-00 00:00:00'),
(15,'PRODUCER',1,'/society/2d308cd6a2eddb5aee43f3af07302776.jpeg',5,'soc@gmail.com',2,109,1,NULL,NULL,4,1,1,2,1,9,NULL,NULL,NULL,2,'0.00',NULL,NULL,'',1,6,1,3,4,3,2,'1','2015-09-02 11:08:30','0000-00-00 00:00:00');

/*Table structure for table `wipo_sound_carrier` */

DROP TABLE IF EXISTS `wipo_sound_carrier`;

CREATE TABLE `wipo_sound_carrier` (
  `Sound_Car_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_GUID` varchar(50) NOT NULL,
  `Sound_Car_Title` varchar(255) NOT NULL,
  `Sound_Car_Language_Id` int(11) DEFAULT NULL,
  `Sound_Car_Internal_Code` varchar(100) NOT NULL,
  `Sound_Car_Standardized_Code` varchar(100) DEFAULT NULL,
  `Sound_Car_Catelog` varchar(100) DEFAULT NULL,
  `Sound_Car_Barcode` varchar(255) DEFAULT NULL,
  `Sound_Car_Label_Id` int(11) DEFAULT NULL,
  `Sound_Car_Distributor` varchar(100) DEFAULT NULL,
  `Sound_Car_Medium` int(11) NOT NULL,
  `Sound_Car_Type_Id` int(11) DEFAULT NULL,
  `Sound_Car_Main_Artist` int(11) NOT NULL,
  `Sound_Car_Producer` int(11) NOT NULL,
  `Sound_Car_Product_Country_Id` int(11) NOT NULL,
  `Sound_Car_Year` year(4) NOT NULL,
  `Sound_Car_Release_Year` year(4) NOT NULL,
  `Sound_Car_Manf_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Id`),
  UNIQUE KEY `NewIndex1` (`Sound_Car_Internal_Code`),
  KEY `FK_wipo_sound_carrier_language` (`Sound_Car_Language_Id`),
  KEY `FK_wipo_sound_carrier_type` (`Sound_Car_Type_Id`),
  KEY `FK_wipo_sound_carrier_production_country` (`Sound_Car_Product_Country_Id`),
  KEY `FK_wipo_sound_carrier` (`Sound_Car_Manf_Id`),
  KEY `FK_wipo_sound_carrier_label` (`Sound_Car_Label_Id`),
  KEY `FK_wipo_sound_carrier_medium` (`Sound_Car_Medium`),
  KEY `FK_wipo_sound_carrier_performer` (`Sound_Car_Main_Artist`),
  KEY `FK_wipo_sound_carrier_producer` (`Sound_Car_Producer`),
  CONSTRAINT `FK_wipo_sound_carrier` FOREIGN KEY (`Sound_Car_Manf_Id`) REFERENCES `wipo_master_manufacturer` (`Master_Manf_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_label` FOREIGN KEY (`Sound_Car_Label_Id`) REFERENCES `wipo_master_label` (`Master_Label_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_language` FOREIGN KEY (`Sound_Car_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_medium` FOREIGN KEY (`Sound_Car_Medium`) REFERENCES `wipo_master_medium` (`Master_Medium_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_production_country` FOREIGN KEY (`Sound_Car_Product_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_type` FOREIGN KEY (`Sound_Car_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier` */

insert  into `wipo_sound_carrier`(`Sound_Car_Id`,`Sound_Car_GUID`,`Sound_Car_Title`,`Sound_Car_Language_Id`,`Sound_Car_Internal_Code`,`Sound_Car_Standardized_Code`,`Sound_Car_Catelog`,`Sound_Car_Barcode`,`Sound_Car_Label_Id`,`Sound_Car_Distributor`,`Sound_Car_Medium`,`Sound_Car_Type_Id`,`Sound_Car_Main_Artist`,`Sound_Car_Producer`,`Sound_Car_Product_Country_Id`,`Sound_Car_Year`,`Sound_Car_Release_Year`,`Sound_Car_Manf_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(8,'9FACA458-F484-C45B-88CF-E7FA7F79F976','Sound carrier 1',5,'SOC-SC-0000007','','catelog','barcode',1,'distributer',1,2,97,16,2,2015,2015,1,'2015-07-07 17:55:01','2015-07-27 15:48:02',1,1),
(9,'873B59E3-083A-9138-D522-6C8A95CBED26','Sound carrier 2',5,'SOC-SC-0000008','Test2','','',1,'',1,4,85,6,2,2015,2015,1,'2015-07-09 13:47:28','2015-07-09 10:36:01',1,1),
(11,'DB6E3C27-AA89-69E4-8724-CC32C224F707','Sound carrier 5',5,'SOC-SC-0000010','Test9','','',1,'',1,4,3,5,2,2015,2015,1,'2015-07-14 11:09:22','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_sound_carrier_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_sound_carrier_biograph_uploads`;

CREATE TABLE `wipo_sound_carrier_biograph_uploads` (
  `Sound_Car_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Biogrph_Id` int(11) NOT NULL,
  `Sound_Car_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Sound_Car_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Biogrph_Upl_Id`),
  KEY `FK_wipo_sound_carrier_biograph_uploads_biography` (`Sound_Car_Biogrph_Id`),
  CONSTRAINT `FK_wipo_sound_carrier_biograph_uploads_biography` FOREIGN KEY (`Sound_Car_Biogrph_Id`) REFERENCES `wipo_sound_carrier_biography` (`Sound_Car_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_biograph_uploads` */

insert  into `wipo_sound_carrier_biograph_uploads`(`Sound_Car_Biogrph_Upl_Id`,`Sound_Car_Biogrph_Id`,`Sound_Car_Biogrph_Upl_File`,`Sound_Car_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(19,6,'\\soundcarrierbiographuploads\\7214edba3822a6e2c013c5a9e8b74908.jpeg','999','2015-07-07 17:55:39','0000-00-00 00:00:00',1,NULL),
(20,6,'\\soundcarrierbiographuploads\\50d60e41fbf20c7b2ca0fa23de975167.jpg','999','2015-07-07 17:55:39','0000-00-00 00:00:00',1,NULL),
(21,6,'\\soundcarrierbiographuploads\\b1bc5d8e6c0147fdf0b86f350fa0b17a.jpg','999','2015-07-07 17:55:39','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_sound_carrier_biography` */

DROP TABLE IF EXISTS `wipo_sound_carrier_biography`;

CREATE TABLE `wipo_sound_carrier_biography` (
  `Sound_Car_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Biogrph_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Biogrph_Id`),
  KEY `FK_wipo_sound_carrier_biography_rcd` (`Sound_Car_Id`),
  CONSTRAINT `FK_wipo_sound_carrier_biography_rcd` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_biography` */

insert  into `wipo_sound_carrier_biography`(`Sound_Car_Biogrph_Id`,`Sound_Car_Id`,`Sound_Car_Biogrph_Annotation`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(6,8,'888','2015-07-07 17:55:39','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_sound_carrier_documentation` */

DROP TABLE IF EXISTS `wipo_sound_carrier_documentation`;

CREATE TABLE `wipo_sound_carrier_documentation` (
  `Sound_Car_Doc_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Doc_Status_Id` int(11) NOT NULL,
  `Sound_Car_Doc_Type_Id` int(11) NOT NULL,
  `Sound_Car_Doc_Sign_Date` date NOT NULL,
  `Sound_Car_Doc_File` varchar(255) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Doc_Id`),
  KEY `FK_wipo_sound_carrier_documentation_work` (`Sound_Car_Id`),
  KEY `FK_wipo_sound_carrier_documentation_document_status` (`Sound_Car_Doc_Status_Id`),
  KEY `FK_wipo_sound_carrier_documentation_document_type` (`Sound_Car_Doc_Type_Id`),
  CONSTRAINT `FK_wipo_sound_carrier_documentation_document_status` FOREIGN KEY (`Sound_Car_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_documentation_document_type` FOREIGN KEY (`Sound_Car_Doc_Type_Id`) REFERENCES `wipo_master_document` (`Master_Doc_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_documentation_work` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_documentation` */

insert  into `wipo_sound_carrier_documentation`(`Sound_Car_Doc_Id`,`Sound_Car_Id`,`Sound_Car_Doc_Status_Id`,`Sound_Car_Doc_Type_Id`,`Sound_Car_Doc_Sign_Date`,`Sound_Car_Doc_File`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(4,8,1,1,'2015-07-02','','2015-07-07 17:55:08','2015-07-15 13:21:46',1,1),
(5,11,1,1,'2015-07-29','','2015-07-14 11:09:35','2015-07-15 13:22:17',1,1);

/*Table structure for table `wipo_sound_carrier_fixations` */

DROP TABLE IF EXISTS `wipo_sound_carrier_fixations`;

CREATE TABLE `wipo_sound_carrier_fixations` (
  `Sound_Car_Fix_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Fix_GUID` varchar(40) NOT NULL,
  `Sound_Car_Fix_Duration` time NOT NULL,
  `Sound_Car_Fix_Date` date NOT NULL,
  `Sound_Car_Fix_Studio` int(11) NOT NULL,
  `Sound_Car_Fix_Country_Id` int(11) NOT NULL,
  `Sound_Car_Fix_Work_Type` enum('W','R') NOT NULL DEFAULT 'W',
  `Sound_Car_Fix_ISRC` varchar(50) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Fix_Id`),
  KEY `FK_wipo_sound_carrier_fixations_sound_carrier` (`Sound_Car_Id`),
  KEY `FK_wipo_sound_carrier_fixations_recording` (`Sound_Car_Fix_GUID`),
  KEY `FK_wipo_sound_carrier_fixations_country` (`Sound_Car_Fix_Country_Id`),
  KEY `FK_wipo_sound_carrier_fixations_studio` (`Sound_Car_Fix_Studio`),
  CONSTRAINT `FK_wipo_sound_carrier_fixations_country` FOREIGN KEY (`Sound_Car_Fix_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_fixations_sound_carrier` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_fixations_studio` FOREIGN KEY (`Sound_Car_Fix_Studio`) REFERENCES `wipo_master_studio` (`Master_Studio_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_fixations` */

insert  into `wipo_sound_carrier_fixations`(`Sound_Car_Fix_Id`,`Sound_Car_Id`,`Sound_Car_Fix_GUID`,`Sound_Car_Fix_Duration`,`Sound_Car_Fix_Date`,`Sound_Car_Fix_Studio`,`Sound_Car_Fix_Country_Id`,`Sound_Car_Fix_Work_Type`,`Sound_Car_Fix_ISRC`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,8,'41fd4b5f-2237-11e5-8959-74d435d335fe','05:00:00','2015-07-22',2,2,'W','','2015-07-10 15:48:37','2015-07-27 10:23:50',1,1),
(4,8,'41fe69ad-2237-11e5-8959-74d435d335fe','00:03:00','2015-07-28',2,2,'R',NULL,'2015-07-10 19:52:15','0000-00-00 00:00:00',1,NULL),
(5,11,'41fd4a13-2237-11e5-8959-74d435d335fe','05:05:05','2015-07-21',2,2,'W',NULL,'2015-07-14 11:14:38','2015-07-14 07:45:55',1,1),
(6,8,'41fd4be5-2237-11e5-8959-74d435d335fe','00:03:00','2015-07-22',2,2,'W','R23232132','2015-07-25 15:44:00','2015-07-25 12:14:53',1,1),
(7,8,'41fe6ce0-2237-11e5-8959-74d435d335fe','00:03:00','2015-07-01',2,2,'R','2333113','2015-07-27 12:52:27','0000-00-00 00:00:00',1,NULL),
(8,8,'41fe6b50-2237-11e5-8959-74d435d335fe','00:05:00','2015-07-07',2,2,'R','','2015-07-27 13:49:55','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_sound_carrier_publication` */

DROP TABLE IF EXISTS `wipo_sound_carrier_publication`;

CREATE TABLE `wipo_sound_carrier_publication` (
  `Sound_Car_Publ_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Publ_GUID` varchar(40) NOT NULL,
  `Sound_Car_Publ_Internal_Code` varchar(100) NOT NULL,
  `Sound_Car_Publ_Year` year(4) NOT NULL,
  `Sound_Car_Publ_Country_Id` int(11) NOT NULL,
  `Sound_Car_Publ_Prod_Nation_Id` int(11) NOT NULL,
  `Sound_Car_Publ_Studio` int(11) NOT NULL,
  `Sound_Car_Publ_Work_Type` enum('W','R') NOT NULL DEFAULT 'W',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Publ_Id`),
  UNIQUE KEY `NewIndex1` (`Sound_Car_Publ_Internal_Code`),
  KEY `FK_wipo_sound_carrier_publication_recording` (`Sound_Car_Id`),
  KEY `FK_wipo_sound_carrier_publication_country` (`Sound_Car_Publ_Country_Id`),
  KEY `FK_wipo_sound_carrier_publication_nationality` (`Sound_Car_Publ_Prod_Nation_Id`),
  KEY `FK_wipo_sound_carrier_publication` (`Sound_Car_Publ_Studio`),
  CONSTRAINT `FK_wipo_sound_carrier_publication` FOREIGN KEY (`Sound_Car_Publ_Studio`) REFERENCES `wipo_master_studio` (`Master_Studio_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_publication_country` FOREIGN KEY (`Sound_Car_Publ_Country_Id`) REFERENCES `wipo_master_country` (`Master_Country_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_publication_nationality` FOREIGN KEY (`Sound_Car_Publ_Prod_Nation_Id`) REFERENCES `wipo_master_nationality` (`Master_Nation_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_publication_recording` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_publication` */

insert  into `wipo_sound_carrier_publication`(`Sound_Car_Publ_Id`,`Sound_Car_Id`,`Sound_Car_Publ_GUID`,`Sound_Car_Publ_Internal_Code`,`Sound_Car_Publ_Year`,`Sound_Car_Publ_Country_Id`,`Sound_Car_Publ_Prod_Nation_Id`,`Sound_Car_Publ_Studio`,`Sound_Car_Publ_Work_Type`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,8,'41fd4cc8-2237-11e5-8959-74d435d335fe','SOC-SP-0000007',2000,2,2,2,'W','2015-07-14 12:43:35','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_sound_carrier_rightholder` */

DROP TABLE IF EXISTS `wipo_sound_carrier_rightholder`;

CREATE TABLE `wipo_sound_carrier_rightholder` (
  `Sound_Car_Right_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Right_Work_GUID` varchar(40) NOT NULL,
  `Sound_Car_Right_Member_GUID` varchar(40) NOT NULL,
  `Sound_Car_Right_Work_Type` enum('W','R') NOT NULL DEFAULT 'W' COMMENT 'W -> Work, R -> Recording',
  `Sound_Car_Right_Member_Type` enum('A','P') DEFAULT 'A' COMMENT 'A -> Author, P -> Performer',
  `Sound_Car_Right_Role` int(11) NOT NULL,
  `Sound_Car_Right_Equal_Share` decimal(10,2) NOT NULL,
  `Sound_Car_Right_Equal_Org_Id` int(11) NOT NULL,
  `Sound_Car_Right_Blank_Share` decimal(10,2) NOT NULL,
  `Sound_Car_Right_Blank_Org_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Right_Id`),
  KEY `FK_wipo_sound_carrier_rightholder_sound` (`Sound_Car_Id`),
  KEY `FK_wipo_sound_carrier_rightholder_equal_organization` (`Sound_Car_Right_Equal_Org_Id`),
  KEY `FK_wipo_sound_carrier_rightholder_blank_organization` (`Sound_Car_Right_Blank_Org_Id`),
  KEY `FK_wipo_sound_carrier_rightholder_role` (`Sound_Car_Right_Role`),
  CONSTRAINT `FK_wipo_sound_carrier_rightholder_blank_organization` FOREIGN KEY (`Sound_Car_Right_Blank_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_rightholder_equal_organization` FOREIGN KEY (`Sound_Car_Right_Equal_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_rightholder_role` FOREIGN KEY (`Sound_Car_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_rightholder_sound` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_rightholder` */

insert  into `wipo_sound_carrier_rightholder`(`Sound_Car_Right_Id`,`Sound_Car_Id`,`Sound_Car_Right_Work_GUID`,`Sound_Car_Right_Member_GUID`,`Sound_Car_Right_Work_Type`,`Sound_Car_Right_Member_Type`,`Sound_Car_Right_Role`,`Sound_Car_Right_Equal_Share`,`Sound_Car_Right_Equal_Org_Id`,`Sound_Car_Right_Blank_Share`,`Sound_Car_Right_Blank_Org_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(21,8,'41fd4b5f-2237-11e5-8959-74d435d335fe','c08b4ad2-14e4-11e5-b10a-74d435d335fe','W','A',7,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(22,8,'41fd4b5f-2237-11e5-8959-74d435d335fe','c08b4443-14e4-11e5-b10a-74d435d335fe','W','A',1,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(23,8,'41fd4be5-2237-11e5-8959-74d435d335fe','c08b4443-14e4-11e5-b10a-74d435d335fe','W','A',7,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(24,8,'41fd4be5-2237-11e5-8959-74d435d335fe','c08b8b32-14e4-11e5-b10a-74d435d335fe','W','P',4,'1.00',1,'6.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(25,8,'41fd4cc8-2237-11e5-8959-74d435d335fe','c08b4443-14e4-11e5-b10a-74d435d335fe','W','A',19,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(26,8,'41fd4cc8-2237-11e5-8959-74d435d335fe','c08b4964-14e4-11e5-b10a-74d435d335fe','W','A',5,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(27,8,'41fd4da4-2237-11e5-8959-74d435d335fe','c08b4443-14e4-11e5-b10a-74d435d335fe','W','A',1,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(28,8,'41fd4da4-2237-11e5-8959-74d435d335fe','c08b44ca-14e4-11e5-b10a-74d435d335fe','W','A',1,'1.00',1,'1.00',1,'2015-07-24 09:36:46','2015-07-25 13:51:07',1,1),
(29,8,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b8fa0-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-07-25 13:51:26',NULL,1,0),
(30,8,'41fe67e6-2237-11e5-8959-74d435d335fe','c08b921d-14e4-11e5-b10a-74d435d335fe','R','P',14,'16.00',1,'15.00',1,'2015-07-25 13:51:26',NULL,1,0),
(31,8,'41fe69ad-2237-11e5-8959-74d435d335fe','c08b8fa0-14e4-11e5-b10a-74d435d335fe','R','P',14,'6.00',1,'9.00',1,'2015-07-25 13:51:26',NULL,1,0),
(32,8,'41fe69ad-2237-11e5-8959-74d435d335fe','c08b929b-14e4-11e5-b10a-74d435d335fe','R','P',14,'5.00',1,'5.00',1,'2015-07-25 13:51:26',NULL,1,0),
(33,8,'41fe6a87-2237-11e5-8959-74d435d335fe','c08b90a4-14e4-11e5-b10a-74d435d335fe','R','P',14,'3.00',1,'3.00',1,'2015-07-25 13:51:26',NULL,1,0),
(34,8,'41fe6b50-2237-11e5-8959-74d435d335fe','B7E7D492-BF77-58D3-F6BD-0C8234C44424','R','P',14,'3.00',1,'3.00',1,'2015-07-25 13:51:26',NULL,1,0),
(35,8,'41fe6c1a-2237-11e5-8959-74d435d335fe','B7E7D492-BF77-58D3-F6BD-0C8234C44424','R','P',14,'3.00',1,'3.00',1,'2015-07-25 13:51:26',NULL,1,0),
(36,8,'41fe6ce0-2237-11e5-8959-74d435d335fe','D911F66D-FECF-9144-1A55-A43D760D2E6A','R','P',14,'3.00',1,'3.00',1,'2015-07-25 13:51:26',NULL,1,0);

/*Table structure for table `wipo_sound_carrier_subtitle` */

DROP TABLE IF EXISTS `wipo_sound_carrier_subtitle`;

CREATE TABLE `wipo_sound_carrier_subtitle` (
  `Sound_Car_Subtitle_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sound_Car_Id` int(11) NOT NULL,
  `Sound_Car_Subtitle_Name` varchar(255) NOT NULL,
  `Sound_Car_Subtitle_Type_Id` int(11) NOT NULL,
  `Sound_Car_Subtitle_Language_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sound_Car_Subtitle_Id`),
  KEY `FK_wipo_sound_carrier_subtitle_recording` (`Sound_Car_Id`),
  KEY `FK_wipo_sound_carrier_subtitle_type` (`Sound_Car_Subtitle_Type_Id`),
  KEY `FK_wipo_sound_carrier_subtitle_language` (`Sound_Car_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_sound_carrier_subtitle_language` FOREIGN KEY (`Sound_Car_Subtitle_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_sound_carrier_subtitle_recording` FOREIGN KEY (`Sound_Car_Id`) REFERENCES `wipo_sound_carrier` (`Sound_Car_Id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_wipo_sound_carrier_subtitle_type` FOREIGN KEY (`Sound_Car_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_sound_carrier_subtitle` */

insert  into `wipo_sound_carrier_subtitle`(`Sound_Car_Subtitle_Id`,`Sound_Car_Id`,`Sound_Car_Subtitle_Name`,`Sound_Car_Subtitle_Type_Id`,`Sound_Car_Subtitle_Language_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(5,8,'Test',4,5,'2015-07-07 17:55:26','0000-00-00 00:00:00',1,NULL),
(6,8,'Test',4,5,'2015-07-21 19:02:11','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_tariff_contracts` */

DROP TABLE IF EXISTS `wipo_tariff_contracts`;

CREATE TABLE `wipo_tariff_contracts` (
  `Tarf_Cont_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tarf_Cont_GUID` varchar(40) NOT NULL,
  `Tarf_Cont_Internal_Code` varchar(50) NOT NULL,
  `Tarf_Invoice` varchar(50) DEFAULT NULL COMMENT 'Not Used',
  `Tarf_Cont_User_Id` int(11) NOT NULL,
  `Tarf_Cont_City_Id` int(11) DEFAULT NULL,
  `Tarf_Cont_District` varchar(100) DEFAULT NULL,
  `Tarf_Cont_Area` varchar(100) DEFAULT NULL,
  `Tarf_Cont_Tariff_Id` int(11) NOT NULL,
  `Tarf_Cont_Insp_Id` int(11) NOT NULL,
  `Tarf_Cont_Balance` decimal(10,2) DEFAULT NULL,
  `Tarf_Cont_Amt_Pay` decimal(10,2) NOT NULL,
  `Tarf_Cont_From` date NOT NULL,
  `Tarf_Cont_To` date NOT NULL,
  `Tarf_Cont_Sign_Date` date NOT NULL,
  `Tarf_Cont_Pay_Id` int(11) NOT NULL,
  `Tarf_Cont_Portion` decimal(10,2) NOT NULL COMMENT 'Not used',
  `Tarf_Cont_Comment` text,
  `Tarf_Cont_Event_Id` int(11) DEFAULT NULL,
  `Tarf_Cont_Event_Date` date DEFAULT NULL,
  `Tarf_Cont_Event_Comment` text,
  `Tarf_Recurring_Amount` decimal(10,2) NOT NULL,
  `Tarf_Cont_Next_Inv_Date` date NOT NULL,
  `Tarf_Cont_Due_Count` smallint(6) NOT NULL,
  `Tarf_Cont_Renewal` enum('Y','N') DEFAULT 'N',
  `Tarf_Cont_Renewal_Year` tinyint(4) DEFAULT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Tarf_Cont_Id`),
  UNIQUE KEY `NewIndex2` (`Tarf_Cont_Internal_Code`),
  KEY `FK_wipo_tariff_contracts_tariff` (`Tarf_Cont_Tariff_Id`),
  KEY `FK_wipo_tariff_contracts_inspector` (`Tarf_Cont_Insp_Id`),
  KEY `FK_wipo_tariff_contracts_customer_user` (`Tarf_Cont_User_Id`),
  KEY `FK_wipo_tariff_contracts_events` (`Tarf_Cont_Event_Id`),
  CONSTRAINT `FK_wipo_tariff_contracts_customer_user` FOREIGN KEY (`Tarf_Cont_User_Id`) REFERENCES `wipo_customer_user` (`User_Cust_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_tariff_contracts_events` FOREIGN KEY (`Tarf_Cont_Event_Id`) REFERENCES `wipo_master_event_type` (`Master_Evt_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_tariff_contracts_inspector` FOREIGN KEY (`Tarf_Cont_Insp_Id`) REFERENCES `wipo_inspector` (`Insp_Id`) ON UPDATE NO ACTION,
  CONSTRAINT `FK_wipo_tariff_contracts_tariff` FOREIGN KEY (`Tarf_Cont_Tariff_Id`) REFERENCES `wipo_master_tariff` (`Master_Tarif_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_tariff_contracts` */

insert  into `wipo_tariff_contracts`(`Tarf_Cont_Id`,`Tarf_Cont_GUID`,`Tarf_Cont_Internal_Code`,`Tarf_Invoice`,`Tarf_Cont_User_Id`,`Tarf_Cont_City_Id`,`Tarf_Cont_District`,`Tarf_Cont_Area`,`Tarf_Cont_Tariff_Id`,`Tarf_Cont_Insp_Id`,`Tarf_Cont_Balance`,`Tarf_Cont_Amt_Pay`,`Tarf_Cont_From`,`Tarf_Cont_To`,`Tarf_Cont_Sign_Date`,`Tarf_Cont_Pay_Id`,`Tarf_Cont_Portion`,`Tarf_Cont_Comment`,`Tarf_Cont_Event_Id`,`Tarf_Cont_Event_Date`,`Tarf_Cont_Event_Comment`,`Tarf_Recurring_Amount`,`Tarf_Cont_Next_Inv_Date`,`Tarf_Cont_Due_Count`,`Tarf_Cont_Renewal`,`Tarf_Cont_Renewal_Year`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(31,'7644D398-7883-0835-B9AF-9F46D425817E','SOC-CON-0000041','0000004',1,1,'','',1,1,'10000.00','10000.00','2015-09-11','2015-10-09','2015-09-23',4,'0.00','',NULL,NULL,'','0.00','2015-10-11',0,'N',NULL,'2015-09-23 19:28:57','0000-00-00 00:00:00',10,NULL),
(32,'89604972-C539-F75A-BC5A-EC125B7F51B5','SOC-CON-0000044','0000002',1,1,'','',1,1,'10000.00','10000.00','2015-09-01','2015-10-31','2015-09-01',4,'0.00','',NULL,NULL,'','10000.00','2015-10-01',1,'N',NULL,'2015-09-24 10:42:23','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_tariff_contracts_history` */

DROP TABLE IF EXISTS `wipo_tariff_contracts_history`;

CREATE TABLE `wipo_tariff_contracts_history` (
  `Tarf_Hist_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tarf_Cont_Id` int(11) NOT NULL,
  `Tarf_Hist_City_Id` int(11) DEFAULT NULL,
  `Tarf_Hist_District` varchar(100) DEFAULT NULL,
  `Tarf_Hist_Area` varchar(100) DEFAULT NULL,
  `Tarf_Hist_Tariff_Id` int(11) NOT NULL,
  `Tarf_Hist_Insp_Id` int(11) NOT NULL,
  `Tarf_Hist_Balance` decimal(10,2) DEFAULT NULL,
  `Tarf_Hist_Amt_Pay` decimal(10,2) NOT NULL,
  `Tarf_Hist_From` date NOT NULL,
  `Tarf_Hist_To` date NOT NULL,
  `Tarf_Hist_Sign_Date` date NOT NULL,
  `Tarf_Hist_Pay_Id` int(11) NOT NULL,
  `Tarf_Hist_Portion` decimal(10,2) NOT NULL COMMENT 'Not used',
  `Tarf_Hist_Comment` text,
  `Tarf_Hist_Event_Id` int(11) DEFAULT NULL,
  `Tarf_Hist_Event_Date` date DEFAULT NULL,
  `Tarf_Hist_Event_Comment` text,
  `Tarf_Recurring_Amount` decimal(10,2) NOT NULL,
  `Tarf_Hist_Next_Inv_Date` date NOT NULL,
  `Tarf_Hist_Due_Count` smallint(6) NOT NULL,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Tarf_Hist_Id`),
  KEY `FK_wipo_tariff_contracts_tariff` (`Tarf_Hist_Tariff_Id`),
  KEY `FK_wipo_tariff_contracts_inspector` (`Tarf_Hist_Insp_Id`),
  KEY `FK_wipo_tariff_contracts_events` (`Tarf_Hist_Event_Id`),
  KEY `FK_wipo_tariff_contracts_history_cont` (`Tarf_Cont_Id`),
  CONSTRAINT `FK_wipo_tariff_contracts_history_cont` FOREIGN KEY (`Tarf_Cont_Id`) REFERENCES `wipo_tariff_contracts` (`Tarf_Cont_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_tariff_contracts_history_events` FOREIGN KEY (`Tarf_Hist_Event_Id`) REFERENCES `wipo_master_event_type` (`Master_Evt_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_tariff_contracts_history_inspector` FOREIGN KEY (`Tarf_Hist_Insp_Id`) REFERENCES `wipo_inspector` (`Insp_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_tariff_contracts_history_tariff` FOREIGN KEY (`Tarf_Hist_Tariff_Id`) REFERENCES `wipo_master_tariff` (`Master_Tarif_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_tariff_contracts_history` */

/*Table structure for table `wipo_user` */

DROP TABLE IF EXISTS `wipo_user`;

CREATE TABLE `wipo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `FK_wipo_user_role` (`role`),
  CONSTRAINT `FK_wipo_user_role` FOREIGN KEY (`role`) REFERENCES `wipo_master_role` (`Master_Role_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `wipo_user` */

insert  into `wipo_user`(`id`,`society_id`,`username`,`name`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values 
(1,14,'admin','admin','be2ce3b45176df1d3e41e35d6aa0ea9a44b56b3575e15ebc6da0d3da7793489b9eb718dc2cfe7f5f2bc61151ad4ffc70ba4d234520ed51735fa98ec878ddc27b',NULL,'vinodh.arumugam@me.com',1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,11,'admin2','admin 2','be2ce3b45176df1d3e41e35d6aa0ea9a44b56b3575e15ebc6da0d3da7793489b9eb718dc2cfe7f5f2bc61151ad4ffc70ba4d234520ed51735fa98ec878ddc27b','','vinodh@test1.com',2,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,11,'admin3','admin 2','be2ce3b45176df1d3e41e35d6aa0ea9a44b56b3575e15ebc6da0d3da7793489b9eb718dc2cfe7f5f2bc61151ad4ffc70ba4d234520ed51735fa98ec878ddc27b','','abcd@gmail.com',2,'0','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,11,'vinodh','vinodh','be2ce3b45176df1d3e41e35d6aa0ea9a44b56b3575e15ebc6da0d3da7793489b9eb718dc2cfe7f5f2bc61151ad4ffc70ba4d234520ed51735fa98ec878ddc27b',NULL,'abcd@gmail.com',2,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,11,'simon','simon','4bbe08a84111a8e5b75178648e1bf6177798ccd82ce5d74ce1206431c9579060fa54d959c95f7e7773aaa5728b5b7b877da7123454b3b1a99b73510b2a4cdd3c',NULL,'simon@testabc.com',1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,11,'boukary','boukary','60427b60877dcbc6622a6ed313b88c207c59302d7c179dc383758d4c3ae849f8d72554e6804b2393ddf9552273004d0944c069cb1bdd33e92bebb677e7555114',NULL,'boukary@testabe.com',1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,11,'arumugam','Vinodh Arumugam','e8e41db655bada369f5aa1b77cb9e84cfad8712d8fa6e5048e80a469c4d25bbab8b40b05a9831ec94c8f06a0f368e772b2508c25cd8c21baec7a2f418d9943eb',NULL,'vinodh.arumugam@wipo.int',2,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,14,'prime','Prime','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'prime@gmail.com',1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(11,10,'copyright','Copyright','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'copyright@gmail.com',2,'1','2015-09-02 15:55:10','0000-00-00 00:00:00'),
(12,11,'performer','Performer','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'performer@gmail.com',1,'1','2015-09-02 15:55:38','0000-00-00 00:00:00'),
(13,12,'copyright_publisher','Copyright Publisher','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'copyright_publisher@gmail.com',1,'1','2015-09-02 15:56:15','0000-00-00 00:00:00'),
(14,13,'performer_producer','Performer Producer','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'performer_producer@gmail.com',1,'1','2015-09-02 15:56:47','0000-00-00 00:00:00'),
(15,15,'producer','Producer','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'producer@gmail.com',1,'1','2015-09-02 15:57:12','0000-00-00 00:00:00'),
(17,14,'prakash','prak','a00086ead86bb16659b71ea4eee7ec5b52fab1527bf2ddead9af62ca2855dc8ca3d5cc0f3d441c305753c0deafef295e567614c8121e05a62e0cbd24b5625944',NULL,'prak@gmail.com',4,'1','2015-09-03 15:39:48','0000-00-00 00:00:00');

/*Table structure for table `wipo_work` */

DROP TABLE IF EXISTS `wipo_work`;

CREATE TABLE `wipo_work` (
  `Work_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_GUID` varchar(50) NOT NULL,
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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Id`),
  KEY `FK_wipo_works_language` (`Work_Language_Id`),
  KEY `FK_wipo_work_type` (`Work_Type_Id`),
  KEY `FK_wipo_work` (`Work_Factor_Id`),
  CONSTRAINT `FK_wipo_work` FOREIGN KEY (`Work_Factor_Id`) REFERENCES `wipo_master_factor` (`Master_Factor_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_works_language` FOREIGN KEY (`Work_Language_Id`) REFERENCES `wipo_master_language` (`Master_Lang_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_type` FOREIGN KEY (`Work_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work` */

insert  into `wipo_work`(`Work_Id`,`Work_GUID`,`Work_Org_Title`,`Work_Language_Id`,`Work_Internal_Code`,`Work_Iswc`,`Work_Wic_Code`,`Work_Type_Id`,`Work_Factor_Id`,`Work_Instrumentation`,`Work_Duration`,`Work_Creation`,`Work_Opus_Number`,`Work_Unknown`,`Active`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,'41fd4a13-2237-11e5-8959-74d435d335fe','Music 1',5,'SOC-W-0000001','89841515','895515415',4,1,'[\"2\",\"3\"]','05:05:05',2015,5,'N','1','2015-05-21 14:30:00','0000-00-00 00:00:00',1,NULL),
(7,'41fd4b5f-2237-11e5-8959-74d435d335fe','Enter Sandman',5,'SOC-W-0000007','','',4,1,'[\"8\"]','01:00:00',2015,NULL,'Y','1','2015-05-28 13:44:37','2015-07-28 15:46:32',1,1),
(11,'41fd4be5-2237-11e5-8959-74d435d335fe','Just the two of us',5,'SOC-W-0000014','','',4,5,'[\"75\"]','00:03:00',2015,NULL,'N','1','2015-06-12 07:09:18','0000-00-00 00:00:00',1,NULL),
(14,'41fd4c55-2237-11e5-8959-74d435d335fe','Old McDonalds',5,'SOC-W-0000017','','',4,5,'','00:03:00',2015,NULL,'N','1','2015-06-18 08:36:53','0000-00-00 00:00:00',1,NULL),
(15,'41fd4cc8-2237-11e5-8959-74d435d335fe','New Work',5,'SOC-W-0000018','','',4,5,'','05:00:00',2015,NULL,'N','1','2015-06-24 18:37:26','0000-00-00 00:00:00',1,NULL),
(16,'41fd4d37-2237-11e5-8959-74d435d335fe','Music 12',5,'SOC-W-0000019','','',4,5,'','05:00:00',2015,NULL,'N','1','2015-06-27 15:45:03','0000-00-00 00:00:00',1,NULL),
(17,'41fd4da4-2237-11e5-8959-74d435d335fe','New Work2',151,'SOC-W-0000020','','',4,5,'','05:00:00',2015,NULL,'N','1','2015-06-29 18:54:08','0000-00-00 00:00:00',1,NULL),
(31,'ECE6982C-93E5-D02F-7BFA-528A1D4C2209','New Work new',5,'SOC-W-0000037','123231223','1233123',1,5,'','05:00:00',2015,5,'N','1','2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL),
(32,'60987AC5-DFC3-9D0B-FB0E-5865F4205430','New Work new 2',5,'SOC-W-0000038','123231223','1233123',1,5,'','05:00:00',2015,6,'N','1','2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL);

/*Table structure for table `wipo_work_biograph_uploads` */

DROP TABLE IF EXISTS `wipo_work_biograph_uploads`;

CREATE TABLE `wipo_work_biograph_uploads` (
  `Work_Biogrph_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Biogrph_Id` int(11) NOT NULL,
  `Work_Biogrph_Upl_File` varchar(500) NOT NULL,
  `Work_Biogrph_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Biogrph_Upl_Id`),
  KEY `FK_wipo_work_biograph_uploads_biography` (`Work_Biogrph_Id`),
  CONSTRAINT `FK_wipo_work_biograph_uploads_biography` FOREIGN KEY (`Work_Biogrph_Id`) REFERENCES `wipo_work_biography` (`Work_Biogrph_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_biograph_uploads` */

insert  into `wipo_work_biograph_uploads`(`Work_Biogrph_Upl_Id`,`Work_Biogrph_Id`,`Work_Biogrph_Upl_File`,`Work_Biogrph_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(7,1,'\\workbiographuploads\\baecb8003708058073cbccdc56a5d696.jpg','tes t ert erte t er','2015-06-27 16:32:44','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_work_biography` */

DROP TABLE IF EXISTS `wipo_work_biography`;

CREATE TABLE `wipo_work_biography` (
  `Work_Biogrph_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Biogrph_Annotation` text NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Biogrph_Id`),
  KEY `FK_wipo_work_biography_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_biography_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_biography` */

insert  into `wipo_work_biography`(`Work_Biogrph_Id`,`Work_Id`,`Work_Biogrph_Annotation`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,7,'test','2015-06-27 15:44:13','2015-07-28 12:01:04',1,1),
(8,31,'ANNOTATIONS','2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL),
(9,32,'ANNOTATIONS','2015-09-24 15:21:28','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Doc_Id`),
  KEY `FK_wipo_work_documentation_work` (`Work_Id`),
  KEY `FK_wipo_work_documentation_document_status` (`Work_Doc_Status_Id`),
  KEY `FK_wipo_work_documentation_document_type` (`Work_Doc_Type_Id`),
  CONSTRAINT `FK_wipo_work_documentation_document_status` FOREIGN KEY (`Work_Doc_Status_Id`) REFERENCES `wipo_master_document_status` (`Master_Document_Sts_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_documentation_document_type` FOREIGN KEY (`Work_Doc_Type_Id`) REFERENCES `wipo_master_document` (`Master_Doc_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_documentation_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_documentation` */

insert  into `wipo_work_documentation`(`Work_Doc_Id`,`Work_Id`,`Work_Doc_Status_Id`,`Work_Doc_Inclusion`,`Work_Doc_Dispute`,`Work_Doc_Type_Id`,`Work_Doc_Sign_Date`,`Work_Doc_File`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,1,'Y','N',3,'2015-05-20','','2015-05-21 14:30:19','0000-00-00 00:00:00',1,NULL),
(2,2,1,'Y','N',1,'2015-05-20','test','2015-05-21 22:09:35','0000-00-00 00:00:00',1,NULL),
(3,3,1,'N','N',1,'2015-05-21','12312312','2015-05-22 13:02:37','0000-00-00 00:00:00',1,NULL),
(4,4,1,'N','N',1,'2015-05-25','','2015-05-26 10:48:08','0000-00-00 00:00:00',1,NULL),
(5,5,1,'N','N',1,'2015-05-25','','2015-05-26 14:06:29','0000-00-00 00:00:00',1,NULL),
(6,6,1,'N','N',1,'2015-05-25','wewe','2015-05-26 14:24:58','0000-00-00 00:00:00',1,NULL),
(7,7,1,'N','N',3,'2015-05-27','','2015-05-28 13:44:50','2015-07-28 12:00:11',1,1),
(8,8,1,'N','N',1,'2015-05-27','','2015-05-28 13:53:15','0000-00-00 00:00:00',1,NULL),
(9,11,1,'N','N',1,'2015-06-11','','2015-06-12 07:09:24','0000-00-00 00:00:00',1,NULL),
(10,12,1,'N','N',1,'2015-06-12','','2015-06-12 22:35:33','0000-00-00 00:00:00',1,NULL),
(11,13,1,'N','N',3,'2015-06-12','','2015-06-13 01:15:53','0000-00-00 00:00:00',1,NULL),
(12,14,1,'N','N',1,'2015-06-17','','2015-06-18 08:36:58','0000-00-00 00:00:00',1,NULL),
(13,15,1,'N','N',1,'2015-06-24','','2015-06-24 18:37:30','0000-00-00 00:00:00',1,NULL),
(14,17,2,'N','N',3,'2015-06-29','','2015-06-29 18:54:12','0000-00-00 00:00:00',1,NULL),
(28,31,2,'Y','N',3,'2015-05-01','FILE','2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL),
(29,32,2,'Y','N',3,'2015-05-01','FILE','2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Pub_Id`),
  KEY `FK_wipo_work_publishing_territory` (`Work_Pub_Territories`),
  KEY `FK_wipo_work_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_publishing` */

insert  into `wipo_work_publishing`(`Work_Pub_Id`,`Work_Id`,`Work_Pub_Contact_Start`,`Work_Pub_Contact_End`,`Work_Pub_Territories`,`Work_Pub_Sign_Date`,`Work_Pub_File`,`Work_Pub_References`,`Work_Pub_Tacit`,`Work_Pub_Renewal_Period`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,1,'2015-06-01','2016-06-30','[\"10\",\"11\"]','2015-06-17','Test',60,'N',1,'2015-06-17 18:21:09','0000-00-00 00:00:00',1,NULL),
(2,7,'2015-06-19','2015-06-29','[\"8\"]','2015-06-23','test',3,'N',5,'2015-06-17 20:10:04','2015-07-28 12:00:29',1,1),
(3,11,'2015-06-01','2016-06-23','[\"8\"]','2015-06-23','Test',60,'Y',1,'2015-06-22 12:18:46','0000-00-00 00:00:00',1,NULL),
(4,15,'2015-06-01','2015-06-30','[\"10\",\"11\",\"12\",\"14\"]','2015-06-24','Test',60,'N',1,'2015-06-24 18:42:00','0000-00-00 00:00:00',1,NULL),
(5,17,'2015-06-01','2015-06-30','[\"8\"]','2015-06-29','Test',60,'N',1,'2015-06-29 18:56:06','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_work_publishing_uploads` */

DROP TABLE IF EXISTS `wipo_work_publishing_uploads`;

CREATE TABLE `wipo_work_publishing_uploads` (
  `Work_Pub_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Pub_Id` int(11) NOT NULL,
  `Work_Pub_Upl_Name` varchar(255) DEFAULT NULL,
  `Work_Pub_Upl_File` varchar(500) NOT NULL,
  `Work_Pub_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Pub_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_author` (`Work_Pub_Id`),
  CONSTRAINT `FK_wipo_work_publishing_uploads_publishing` FOREIGN KEY (`Work_Pub_Id`) REFERENCES `wipo_work_publishing` (`Work_Pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_publishing_uploads` */

insert  into `wipo_work_publishing_uploads`(`Work_Pub_Upl_Id`,`Work_Pub_Id`,`Work_Pub_Upl_Name`,`Work_Pub_Upl_File`,`Work_Pub_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(1,4,'Contract1','\\workpublishinguploads\\6231ed8e22c699370de398504c550818.jpg',NULL,'2015-06-24 18:42:24','0000-00-00 00:00:00',1,NULL),
(2,2,'Contract1','\\workpublishinguploads\\43799c8df8b93f5cfe927a8d1c14bd29.pdf','asdadsad','2015-06-26 15:26:38','2015-07-28 12:00:37',1,1),
(3,2,'Test','\\workpublishinguploads\\5446a2253dcd58e299e666db8f722add.pdf','test','2015-06-26 15:27:37','0000-00-00 00:00:00',1,NULL),
(4,2,'Test 2','\\workpublishinguploads\\5df8d2819a4d9e11dcf566dcb0536ff4.pdf','ad asdsd asd','2015-06-26 15:48:51','0000-00-00 00:00:00',1,NULL),
(5,2,'Contract1','\\workpublishinguploads\\6cad27f4e05db274a52d9b44adb97368.pdf','test','2015-06-26 16:33:11','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Right_Id`),
  KEY `FK_wipo_work_rightholder_work` (`Work_Id`),
  KEY `FK_wipo_work_rightholder_organization` (`Work_Right_Broad_Org_id`),
  KEY `FK_wipo_work_rightholder_organization_mechanical` (`Work_Right_Mech_Org_Id`),
  KEY `FK_wipo_work_rightholder_role` (`Work_Right_Role`),
  CONSTRAINT `FK_wipo_work_rightholder_organization` FOREIGN KEY (`Work_Right_Broad_Org_id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_organization_mechanical` FOREIGN KEY (`Work_Right_Mech_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_role` FOREIGN KEY (`Work_Right_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=277 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_rightholder` */

insert  into `wipo_work_rightholder`(`Work_Right_Id`,`Work_Id`,`Work_Member_GUID`,`Work_Right_Role`,`Work_Right_Broad_Share`,`Work_Right_Broad_Special`,`Work_Right_Broad_Org_id`,`Work_Right_Mech_Share`,`Work_Right_Mech_Special`,`Work_Right_Mech_Org_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(115,11,'c08b4443-14e4-11e5-b10a-74d435d335fe',7,'10.00','',1,'10.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00',1,NULL),
(116,11,'c08bbf35-14e4-11e5-b10a-74d435d335fe',8,'80.00','',1,'80.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00',1,NULL),
(117,11,'c08bbeba-14e4-11e5-b10a-74d435d335fe',2,'10.00','',1,'10.00','',1,'2015-06-22 12:42:31','0000-00-00 00:00:00',1,NULL),
(145,15,'c08b4443-14e4-11e5-b10a-74d435d335fe',19,'20.00','',1,'20.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00',1,NULL),
(146,15,'c08bbeba-14e4-11e5-b10a-74d435d335fe',8,'40.00','DI',1,'40.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00',1,NULL),
(147,15,'c08bbe3c-14e4-11e5-b10a-74d435d335fe',2,'25.00','',1,'25.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00',1,NULL),
(148,15,'c08b4964-14e4-11e5-b10a-74d435d335fe',5,'15.00','',1,'15.00','',1,'2015-06-24 18:41:37','0000-00-00 00:00:00',1,NULL),
(268,7,'c08b4ad2-14e4-11e5-b10a-74d435d335fe',7,'10.00','',1,'10.00','',1,'2015-07-04 19:11:31','2015-09-24 08:43:02',1,10),
(269,7,'c08b4443-14e4-11e5-b10a-74d435d335fe',1,'20.00','DI',1,'20.00','DI',1,'2015-07-04 19:11:31','2015-09-24 08:43:02',1,10),
(270,7,'c08bbb90-14e4-11e5-b10a-74d435d335fe',8,'50.00','OT',1,'50.00','OT',1,'2015-07-04 19:11:31','2015-09-24 08:43:02',1,10),
(271,7,'c08bbdb3-14e4-11e5-b10a-74d435d335fe',2,'15.00','',1,'15.00','',1,'2015-07-04 19:11:31','2015-09-24 08:43:02',1,10),
(272,7,'c08b44ca-14e4-11e5-b10a-74d435d335fe',1,'5.00','',2,'5.00','',1,'2015-07-04 19:11:31','2015-09-24 08:43:02',1,10),
(273,17,'c08b4443-14e4-11e5-b10a-74d435d335fe',1,'5.00','',1,'5.00','',1,'2015-06-29 19:01:19','2015-10-05 09:24:31',1,10),
(274,17,'c08b44ca-14e4-11e5-b10a-74d435d335fe',1,'20.00','',1,'20.00','',1,'2015-06-29 19:01:19','2015-10-05 09:24:31',1,10),
(275,17,'c08bbe3c-14e4-11e5-b10a-74d435d335fe',8,'60.00','',1,'60.00','',1,'2015-06-29 19:01:19','2015-10-05 09:24:31',1,10),
(276,17,'c08bbeba-14e4-11e5-b10a-74d435d335fe',2,'15.00','',1,'15.00','',1,'2015-06-29 19:01:19','2015-10-05 09:24:31',1,10);

/*Table structure for table `wipo_work_rightholder_audit` */

DROP TABLE IF EXISTS `wipo_work_rightholder_audit`;

CREATE TABLE `wipo_work_rightholder_audit` (
  `Work_Right_Audit_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Id` int(11) NOT NULL,
  `Work_Member_GUID` varchar(50) NOT NULL,
  `Work_Right_Audit_Role` int(11) NOT NULL,
  `Work_Right_Audit_Broad_Share` decimal(10,2) NOT NULL,
  `Work_Right_Audit_Broad_Special` enum('DI','IN','OT','PL') DEFAULT NULL,
  `Work_Right_Audit_Broad_Org_id` int(11) NOT NULL,
  `Work_Right_Audit_Mech_Share` decimal(10,2) NOT NULL,
  `Work_Right_Audit_Mech_Special` enum('DI','IN','OT','PL') DEFAULT NULL,
  `Work_Right_Audit_Mech_Org_Id` int(11) NOT NULL,
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Right_Audit_Id`),
  KEY `FK_wipo_work_rightholder_audit_work` (`Work_Id`),
  KEY `FK_wipo_work_rightholder_audit_organization` (`Work_Right_Audit_Broad_Org_id`),
  KEY `FK_wipo_work_rightholder_audit_organization_mechanical` (`Work_Right_Audit_Mech_Org_Id`),
  KEY `FK_wipo_work_rightholder_audit_role` (`Work_Right_Audit_Role`),
  CONSTRAINT `FK_wipo_work_rightholder_audit_organization` FOREIGN KEY (`Work_Right_Audit_Broad_Org_id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_audit_organization_mechanical` FOREIGN KEY (`Work_Right_Audit_Mech_Org_Id`) REFERENCES `wipo_organization` (`Org_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_audit_role` FOREIGN KEY (`Work_Right_Audit_Role`) REFERENCES `wipo_master_type_rights` (`Master_Type_Rights_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_rightholder_audit_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_rightholder_audit` */

insert  into `wipo_work_rightholder_audit`(`Work_Right_Audit_Id`,`Work_Id`,`Work_Member_GUID`,`Work_Right_Audit_Role`,`Work_Right_Audit_Broad_Share`,`Work_Right_Audit_Broad_Special`,`Work_Right_Audit_Broad_Org_id`,`Work_Right_Audit_Mech_Share`,`Work_Right_Audit_Mech_Special`,`Work_Right_Audit_Mech_Org_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(13,7,'c08b4ad2-14e4-11e5-b10a-74d435d335fe',7,'60.00','',1,'60.00','',1,'2015-06-29 16:38:27','0000-00-00 00:00:00',1,NULL),
(14,7,'c08b4443-14e4-11e5-b10a-74d435d335fe',1,'40.00','DI',1,'40.00','DI',1,'2015-06-29 16:38:27','0000-00-00 00:00:00',1,NULL),
(15,17,'c08b4443-14e4-11e5-b10a-74d435d335fe',1,'30.00','',1,'30.00','',1,'2015-06-29 18:54:47','0000-00-00 00:00:00',1,NULL),
(16,17,'c08b44ca-14e4-11e5-b10a-74d435d335fe',1,'70.00','',1,'70.00','',1,'2015-06-29 18:54:47','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Sub_Id`),
  KEY `FK_wipo_work_sub_publishing_territory` (`Work_Sub_Territories`),
  KEY `FK_wipo_work_sub_publishing_work` (`Work_Id`),
  CONSTRAINT `FK_wipo_work_sub_publishing_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_sub_publishing` */

insert  into `wipo_work_sub_publishing`(`Work_Sub_Id`,`Work_Id`,`Work_Sub_Contact_Start`,`Work_Sub_Contact_End`,`Work_Sub_Territories`,`Work_Sub_Clause`,`Work_Sub_Sign_Date`,`Work_Sub_File`,`Work_Sub_References`,`Work_Sub_Catelog_Number`,`Work_Sub_Tacit`,`Work_Sub_Renewal_Period`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,7,'2015-06-01','2015-06-29','[\"8\"]','M','2015-06-22','Test',333,'TN762736273','N',10,'2015-06-22 18:26:24','2015-09-14 13:18:49',1,11),
(3,15,'2015-06-01','2015-06-30','[\"8\"]','M','2015-06-24','',333,'TN762736273','N',1,'2015-06-24 18:42:14','0000-00-00 00:00:00',1,NULL),
(4,17,'2015-06-01','2015-06-29','[\"8\"]','M','2015-06-29','',333,'TN762736273','N',1,'2015-06-29 19:01:44','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `wipo_work_sub_publishing_uploads` */

DROP TABLE IF EXISTS `wipo_work_sub_publishing_uploads`;

CREATE TABLE `wipo_work_sub_publishing_uploads` (
  `Work_Sub_Upl_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Work_Sub_Id` int(11) NOT NULL,
  `Work_Sub_Upl_Name` varchar(255) DEFAULT NULL,
  `Work_Sub_Upl_File` varchar(500) NOT NULL,
  `Work_Sub_Upl_Description` text,
  `Created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Sub_Upl_Id`),
  KEY `FK_wipo_author_biograph_uploads_author` (`Work_Sub_Id`),
  CONSTRAINT `FK_wipo_work_sub_publishing_uploads_subpublishing` FOREIGN KEY (`Work_Sub_Id`) REFERENCES `wipo_work_sub_publishing` (`Work_Sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_sub_publishing_uploads` */

insert  into `wipo_work_sub_publishing_uploads`(`Work_Sub_Upl_Id`,`Work_Sub_Id`,`Work_Sub_Upl_Name`,`Work_Sub_Upl_File`,`Work_Sub_Upl_Description`,`Created`,`Rowversion`,`Created_By`,`Updated_By`) values 
(2,2,'Testing','\\worksubpublishinguploads\\4524c2eca29155111182e8fcfb363369.pdf','asda sdasd','2015-06-22 19:04:37','2015-07-28 12:00:52',1,1),
(3,2,'Testingff','\\worksubpublishinguploads\\462b2b7e082945a78667c7b9e35827a9.pdf','','2015-06-26 16:31:01','2015-07-28 12:12:07',1,1),
(4,2,'Testing','\\worksubpublishinguploads\\86e4efce812c7735bd98dedfdacf3f5f.pdf',NULL,'2015-06-26 16:33:24','0000-00-00 00:00:00',1,NULL),
(5,2,'Testing','\\worksubpublishinguploads\\28ed9bf3f6eca2c618a52b75f4aa4781.jpg','','2015-07-03 15:58:50','0000-00-00 00:00:00',1,NULL);

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
  `Created_By` int(11) DEFAULT NULL,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Work_Subtitle_Id`),
  KEY `FK_wipo_work_subtitle_work` (`Work_Id`),
  KEY `FK_wipo_work_subtitle_type` (`Work_Subtitle_Type_Id`),
  KEY `FK_wipo_work_subtitle_language` (`Work_Subtitle_Language_Id`),
  CONSTRAINT `FK_wipo_work_subtitle_type` FOREIGN KEY (`Work_Subtitle_Type_Id`) REFERENCES `wipo_master_type` (`Master_Type_Id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_wipo_work_subtitle_work` FOREIGN KEY (`Work_Id`) REFERENCES `wipo_work` (`Work_Id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_work_subtitle` */

insert  into `wipo_work_subtitle`(`Work_Subtitle_Id`,`Work_Id`,`Work_Subtitle_Name`,`Work_Subtitle_Type_Id`,`Work_Subtitle_Language_Id`,`Created_Date`,`Rowversion`,`Created_By`,`Updated_By`) values 
(3,7,'exit light',4,0,'2015-05-28 13:59:31','2015-10-05 13:10:32',1,10),
(4,7,'New subtitle',4,5,'2015-05-30 11:49:54','0000-00-00 00:00:00',1,NULL),
(5,1,'New sub title',4,5,'2015-06-12 06:37:33','0000-00-00 00:00:00',1,NULL),
(18,31,'TITLE',1,5,'2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL),
(19,32,'TITLE',1,5,'2015-09-24 15:21:27','0000-00-00 00:00:00',10,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

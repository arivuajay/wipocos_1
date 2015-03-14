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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_auth_resources` */

insert  into `wipo_auth_resources`(`Master_Resource_ID`,`Master_User_ID`,`Master_Role_ID`,`Master_Module_ID`,`Master_Screen_ID`,`Master_Task_ADD`,`Master_Task_SEE`,`Master_Task_UPT`,`Master_Task_DEL`,`Active`,`Created_Date`,`Rowversion`) values (1,1,NULL,1,1,'1','0','0','0','1','2015-03-12 18:07:02','0000-00-00 00:00:00'),(2,1,NULL,1,2,'1','1','0','0','1','2015-03-12 18:07:02','0000-00-00 00:00:00'),(3,NULL,1,1,1,'1','0','0','0','1','2015-03-12 19:07:50','0000-00-00 00:00:00'),(4,NULL,1,1,2,'0','1','0','0','1','2015-03-12 19:07:50','0000-00-00 00:00:00'),(5,3,NULL,1,1,'0','0','0','1','1','2015-03-12 19:08:11','0000-00-00 00:00:00'),(6,3,NULL,1,2,'1','1','0','0','1','2015-03-12 19:08:11','0000-00-00 00:00:00'),(7,NULL,2,1,1,'0','0','0','0','1','2015-03-12 19:20:22','0000-00-00 00:00:00'),(8,NULL,2,1,2,'1','0','0','0','1','2015-03-12 19:20:22','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_country` */

insert  into `wipo_master_country`(`Master_Country_Id`,`Country_Name`,`Country_Two_Code`,`Country_Three_Code`,`Active`,`Created_Date`,`Rowversion`) values (2,'India','IN','IND','1','2015-03-12 15:12:13','0000-00-00 00:00:00'),(3,'Australia','AU','AU','0','2015-03-13 13:44:01','0000-00-00 00:00:00'),(4,'England','UK','UK','1','2015-03-13 18:40:09','0000-00-00 00:00:00');

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

insert  into `wipo_master_document_status`(`Master_Document_Sts_Id`,`Document_Sts_Code`,`Document_Sts_Name`,`Document_Sts_Comment`,`Active`,`Created_Date`,`Rowversion`) values (1,'N','Declared work','Declared work','1','2015-03-14 11:40:40','0000-00-00 00:00:00'),(2,'I','Work documented','work documented in an international file','1','2015-03-14 11:41:14','0000-00-00 00:00:00'),(3,'U','Undeclared national work','undeclared national work; the author has been invited to declare it','1','2015-03-14 11:41:34','0000-00-00 00:00:00'),(4,'V','Undocumented foreign work','undocumented foreign work which has been identified by the name of its author and for which the fees have been paid on the basis of the CISAC “Warsaw Rule”;','1','2015-03-14 11:41:56','0000-00-00 00:00:00'),(5,'W','Foreign work','foreign work for which the data have been transferred from the WWL or WID documentation','1','2015-03-14 11:42:16','0000-00-00 00:00:00'),(6,'Q','Unidentified work','unidentified work which has been entered in an inquiry list according to the CISAC rules','1','2015-03-14 11:42:30','0000-00-00 00:00:00'),(7,'X','Non-identified work','non-identified work which appeared in a statement of works performed, broadcast or reproduced','1','2015-03-14 11:42:43','0000-00-00 00:00:00'),(8,'Y','Worldwide non documented work','Worldwide non documented work (WID,WWL)','1','2015-03-14 11:43:01','0000-00-00 00:00:00');

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

/*Table structure for table `wipo_master_language` */

DROP TABLE IF EXISTS `wipo_master_language`;

CREATE TABLE `wipo_master_language` (
  `Master_Lang_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Lang_Name` varchar(45) NOT NULL COMMENT 'Language:',
  `Active` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Status:',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Lang_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_language` */

insert  into `wipo_master_language`(`Master_Lang_Id`,`Lang_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'English','1','2015-03-13 18:41:49','0000-00-00 00:00:00'),(2,'Mandarin','1','2015-03-13 18:42:26','0000-00-00 00:00:00'),(3,'Spanish','1','2015-03-13 18:42:36','0000-00-00 00:00:00'),(4,'Hindi','1','2015-03-13 18:42:44','0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_marital_status` */

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_nationality` */

insert  into `wipo_master_nationality`(`Master_Nation_Id`,`Nation_Name`,`Active`,`Created_Date`,`Rowversion`) values (2,'Indian','1','2015-03-13 18:40:20','0000-00-00 00:00:00'),(3,'American','1','2015-03-13 18:40:27','0000-00-00 00:00:00'),(4,'Pakistani','1','2015-03-13 18:40:35','0000-00-00 00:00:00');

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

insert  into `wipo_master_region`(`Master_Region_Id`,`Region_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'Alabama','1','2015-03-13 18:44:44','0000-00-00 00:00:00'),(2,'Delaware','0','2015-03-13 18:44:50','0000-00-00 00:00:00'),(3,'New Mexico','1','2015-03-13 18:44:57','0000-00-00 00:00:00'),(4,'Tennessee','1','2015-03-13 18:45:05','0000-00-00 00:00:00');

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

insert  into `wipo_master_role`(`Master_Role_ID`,`Role_Code`,`Description`,`is_Admin`,`Active`,`Created_Date`,`Rowversion`) values (1,'A','Artist','0','1','2015-03-12 16:02:31','0000-00-00 00:00:00'),(2,'A','Writer','0','1','2015-03-12 15:39:04','0000-00-00 00:00:00'),(3,'A','Lyricist','0','1','2015-03-12 15:52:51','0000-00-00 00:00:00'),(4,'AD','Adapter','0','1','2015-03-13 18:46:26','0000-00-00 00:00:00'),(5,'EM','Music Publisher','1','1','2015-03-13 18:46:36','0000-00-00 00:00:00');

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

/*Table structure for table `wipo_master_type_rights` */

DROP TABLE IF EXISTS `wipo_master_type_rights`;

CREATE TABLE `wipo_master_type_rights` (
  `Master_Type_Rights_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID:',
  `Type_Rights_Name` varchar(90) NOT NULL COMMENT 'Type of Right holder:',
  `Active` enum('0','1') NOT NULL DEFAULT '1',
  `Created_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Rowversion` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Master_Type_Rights_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `wipo_master_type_rights` */

insert  into `wipo_master_type_rights`(`Master_Type_Rights_Id`,`Type_Rights_Name`,`Active`,`Created_Date`,`Rowversion`) values (1,'MC- Music composer','1','2015-03-13 18:48:28','0000-00-00 00:00:00');

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

insert  into `wipo_user`(`id`,`username`,`name`,`password_hash`,`password_reset_token`,`email`,`role`,`status`,`created_at`,`updated_at`) values (1,'admin','Admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec',NULL,'arivu.sacs@gmail.com',1,'1',1413526995,1424063457),(3,'admin2','admin 2','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62','','prakash.paramanandam@arkinfotec.com',1,'1',0,1426227686),(4,'admin3','admin 2','458881d833d40147f2de278c3a55cf27ef943c398ecd334b276065b70768862f181d4c2c326369a455cb182d794071251e71a5de4fe7b56870375a4e87d6d11c',NULL,'abcd@gmail.com',2,'0',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

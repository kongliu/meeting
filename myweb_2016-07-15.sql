# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.13)
# Database: myweb
# Generation Time: 2016-07-15 10:09:16 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table myweb_cms_article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `myweb_cms_article`;

CREATE TABLE `myweb_cms_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `anthor` varchar(50) DEFAULT NULL,
  `afrom` varchar(50) DEFAULT NULL,
  `keyword` varchar(50) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `is_pub` tinyint(3) DEFAULT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `home_show` tinyint(3) DEFAULT NULL,
  `is_focus` tinyint(3) DEFAULT NULL,
  `focus_img` varchar(100) DEFAULT NULL,
  `atime` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table myweb_cms_column
# ------------------------------------------------------------

DROP TABLE IF EXISTS `myweb_cms_column`;

CREATE TABLE `myweb_cms_column` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) DEFAULT NULL,
  `cname_en` varchar(30) DEFAULT NULL,
  `is_nav` tinyint(3) DEFAULT NULL,
  `sort_order` tinyint(3) DEFAULT NULL,
  `page_title` tinyint(3) DEFAULT NULL,
  `page_key` tinyint(3) DEFAULT NULL,
  `page_desc` varchar(50) DEFAULT NULL,
  `is_close` tinyint(3) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `myweb_cms_column` WRITE;
/*!40000 ALTER TABLE `myweb_cms_column` DISABLE KEYS */;

INSERT INTO `myweb_cms_column` (`cid`, `cname`, `cname_en`, `is_nav`, `sort_order`, `page_title`, `page_key`, `page_desc`, `is_close`, `parent_id`)
VALUES
	(1,'首页','home',1,1,0,0,'',0,0),
	(2,'22','ddd',1,2,0,0,'df',0,0);

/*!40000 ALTER TABLE `myweb_cms_column` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table myweb_sys_account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `myweb_sys_account`;

CREATE TABLE `myweb_sys_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `myweb_sys_account` WRITE;
/*!40000 ALTER TABLE `myweb_sys_account` DISABLE KEYS */;

INSERT INTO `myweb_sys_account` (`id`, `username`, `password`)
VALUES
	(1,'test','e10adc3949ba59abbe56e057f20f883e');

/*!40000 ALTER TABLE `myweb_sys_account` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

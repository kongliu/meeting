# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.13)
# Database: myweb
# Generation Time: 2016-07-22 09:55:53 +0000
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
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `atime` datetime DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `admin_id` int(15) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `myweb_cms_article` WRITE;
/*!40000 ALTER TABLE `myweb_cms_article` DISABLE KEYS */;

INSERT INTO `myweb_cms_article` (`aid`, `cid`, `title`, `content`, `anthor`, `afrom`, `keyword`, `summary`, `is_pub`, `sort_order`, `home_show`, `is_focus`, `focus_img`, `atime`, `add_time`, `admin_id`, `video`)
VALUES
	(1,3,'ffffffffffff','<p style=\"text-align: center;\"><img src=\"http://meeting.app/Public/plugin/ueditor_mini1_0_0-utf8-php/php/upload/20160722/14691749049752.jpg\" _src=\"http://meeting.app/Public/plugin/ueditor_mini1_0_0-utf8-php/php/upload/20160722/14691749049752.jpg\" width=\"1004\" height=\"561\"/><embed type=\"application/x-shockwave-flash\" class=\"edui-faked-video\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" src=\"http://www.w3school.com.cn/i/movie.swf\" width=\"420\" height=\"280\" style=\"float:none\" wmode=\"transparent\" play=\"true\" loop=\"false\" menu=\"false\" allowscriptaccess=\"never\" allowfullscreen=\"true\"/></p>',NULL,'','','',1,8,0,1,'1469000128.jpg','2016-07-18 00:00:00','2016-07-22 16:13:14',0,NULL),
	(2,3,'啊啊啊啊啊啊啊','<p>\r\n	<a href=\"http://imgcache.qq.com/tencentvideo_v1/player/TPout.swf?max_age=86400&v=20140714\" target=\"_blank\"><span style=\"display:none;\" id=\"__kindeditor_bookmark_start_1__\"></span>http://imgcache.qq.com/tencentvideo_v1/player/TPout.swf?max_age=86400&amp;v=20140714</a> \r\n</p>\r\n<p>\r\n	弟弟顶顶顶顶顶顶顶顶顶顶<span style=\"display:none;\" id=\"__kindeditor_bookmark_end_2__\"></span> \r\n</p>',NULL,'','','',1,2,0,1,'1469000104.jpg','2016-07-18 00:00:00','2016-07-21 00:00:00',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(3,3,'少时诵诗书','试试事实上事实上事实上',NULL,'','','',1,3,0,1,'1469000093.jpg','2016-07-20 00:00:00','2016-07-21 00:00:00',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(4,3,'少时诵诗书','试试事实上事实上事实上',NULL,'','','',1,4,0,1,'1469070446.jpg','2016-07-20 00:00:00','2016-07-21 00:00:00',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(14,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:03:47',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(15,3,'少时诵诗书','试试事实上事实上事实上',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-21 16:15:50',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(16,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:00',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(17,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:12',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(18,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:19',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(19,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:30',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(20,3,'少时诵诗书','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;试试事实上事实上事实上 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:38',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(21,3,'少时诵诗书','<p><img src=\"/ueditor/php/upload/image/20160721/1469092764245363.jpg\" title=\"1469092764245363.jpg\" alt=\"Journey Screenshotplay 99.jpg\"/></p><p>\r\n		石流致恩施天然气管道破裂爆燃	</p><p><br/></p><p>\r\n		天然气管道爆燃现场。	</p><p><br/></p><p>\r\n		抢救伤员	</p><p>\r\n		本报讯（记者赵家新 谭德磊）记者昨天从湖北省恩施土家族苗族自治州恩施市政府办公室获悉，连日暴雨引发山体滑坡导致恩施市崔家坝镇境内川气东输天然气管道破裂，6点20分左右发生爆燃。具体情况正在进一步了解中，恩施市有关方面已赶赴现场处置。	</p><p>\r\n		据介绍，事发地段位于离崔家坝集镇约10公里的崔家坝镇水田坝村马家坡。有村民目击爆燃现场，发出惊呼声。从视频看，火势有六七层楼高。现场村民反馈信息，由于道路滑坡或被大水冲毁，消防车和救援车很难进入现场。	</p><p>\r\n		据该镇中心医院的一名工作人员介绍，她们在早上6点多接到紧急通知，所有医护人员全部取消休假，紧急赶往医院待命。随后由该院院长带队，4名副院长再加上14名医护人员	</p><p><br/></p>',NULL,'','','',1,0,0,0,'1469070446.jpg','2016-07-20 00:00:00','2016-07-22 13:04:47',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b'),
	(26,3,'慷慨格言是','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;这里写你的初始化内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><p><embed type=\"application/x-shockwave-flash\" class=\"edui-faked-video\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" src=\"http://www.w3school.com.cn/i/movie.swf\" width=\"666\" height=\"333\" style=\"float:none\" wmode=\"transparent\" play=\"true\" loop=\"false\" menu=\"false\" allowscriptaccess=\"never\" allowfullscreen=\"true\"/></p>',NULL,'','','',1,10,0,0,'1469093245.jpg','2016-07-21 17:27:25','2016-07-22 15:08:14',0,'http://cache.tv.qq.com/qqplayerout.swf?vid=o013075230b');

/*!40000 ALTER TABLE `myweb_cms_article` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,'专业入口','professional',1,1,0,0,'',0,0),
	(2,'粉丝入口','fans',1,2,0,0,'',0,0),
	(3,'新闻相关','news',1,4,0,0,'',0,0),
	(4,'APP相关','app',1,3,0,0,'',0,0);

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

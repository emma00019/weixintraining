-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: wx
-- ------------------------------------------------------
-- Server version 5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `tbl_follower`
--

DROP TABLE IF EXISTS `tbl_follower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_follower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscribe` int(11) NOT NULL,
  `openid` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `sex` varchar(128) DEFAULT NULL,
  `language` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `province` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `headimgurl` varchar(1024) DEFAULT NULL,
  `subscribe_time` varchar(128) NOT NULL,
  `unionid` varchar(128) DEFAULT NULL,
  `remark` varchar(128) DEFAULT NULL,
  `groupid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_follower`
--

LOCK TABLES `tbl_follower` WRITE;
/*!40000 ALTER TABLE `tbl_follower` DISABLE KEYS */;
INSERT INTO `tbl_follower` VALUES (3,1,'ovIYqwNwuZGafU9paPydSoMjxjPw','小菊','女','zh_CN','','','','','1437022094',NULL,'',0),(4,1,'ovIYqwHPnqFUYIBK5fIXCQmlh-aY','Eva wang','男','zh_CN','','上海','中国','http://wx.qlogo.cn/mmopen/vtJd0YUHoHZo6AgviaGgkuPgUPBHCic3iaXnEjo5nKFQJy8tNdEvvqSmyHRBC5NgwiatprSooAxpsZjwBdiczS37kO1aEnvXrGQRO/0','1437022192',NULL,'',0);
/*!40000 ALTER TABLE `tbl_follower` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_keyWord`
--

DROP TABLE IF EXISTS `tbl_keyWord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_keyWord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyWord` varchar(128) NOT NULL,
  `answer` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_keyWord`
--

LOCK TABLES `tbl_keyWord` WRITE;
/*!40000 ALTER TABLE `tbl_keyWord` DISABLE KEYS */;
INSERT INTO `tbl_keyWord` VALUES (1,'你好','你好,天天开心!'),(2,'钱','如果对方提到钱的话,请确认是否是欺骗!');
/*!40000 ALTER TABLE `tbl_keyWord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_material`
--

DROP TABLE IF EXISTS `tbl_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) DEFAULT NULL,
  `desc` varchar(512) DEFAULT NULL,
  `picUrl` varchar(1024) DEFAULT NULL,
  `url` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_material`
--

LOCK TABLES `tbl_material` WRITE;
/*!40000 ALTER TABLE `tbl_material` DISABLE KEYS */;
INSERT INTO `tbl_material` VALUES (1,'扫描二维码','','http://www.aiimg.com/uploads/userup/0906/15045I1D44.jpg','http://news.haiwainet.cn/n/2015/0723/c3541083-28972666.html'),(2,'素材1','','http://img3.3lian.com/2006/013/02/015.jpg','http://news.haiwainet.cn/n/2015/0723/c3541083-28972666.html'),(3,'素材2','','http://pic.sucai.com/tp/foto/img/xpic1348.jpg','http://lillianyang.baijia.baidu.com/article/116004');
/*!40000 ALTER TABLE `tbl_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `tag` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sub_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` VALUES (9,'新闻',1,0,2),(46,'美食新闻',1,0,0),(48,'用户登陆',0,9,0),(49,'扫描二维码',1,0,0);
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_qrcode`
--

DROP TABLE IF EXISTS `tbl_qrcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_qrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scene_str` varchar(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scene_str` (`scene_str`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_qrcode`
--

LOCK TABLES `tbl_qrcode` WRITE;
/*!40000 ALTER TABLE `tbl_qrcode` DISABLE KEYS */;
INSERT INTO `tbl_qrcode` VALUES (1,'123','test'),(2,'456','test1'),(3,'1121','测试三');
/*!40000 ALTER TABLE `tbl_qrcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_qrcode_material`
--

DROP TABLE IF EXISTS `tbl_qrcode_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_qrcode_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scene_str` varchar(11) DEFAULT NULL,
  `material_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_qrcode_material`
--

LOCK TABLES `tbl_qrcode_material` WRITE;
/*!40000 ALTER TABLE `tbl_qrcode_material` DISABLE KEYS */;
INSERT INTO `tbl_qrcode_material` VALUES (27,'123','2'),(29,'123','1'),(31,'456','3');
/*!40000 ALTER TABLE `tbl_qrcode_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `tag` int(11) NOT NULL,
  `openid` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'test1','pass1',1,'ovIYqwNwuZGafU9paPydSoMjxjPw');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-28 15:20:11


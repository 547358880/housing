/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.5.8-log : Database - housing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`housing` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `housing`;

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '区域名称',
  `longitude` varchar(50) DEFAULT NULL COMMENT '经度',
  `latitude` varchar(50) DEFAULT NULL COMMENT '纬度',
  `parent_id` int(11) DEFAULT '0' COMMENT '父级区域',
  `zoom` varchar(50) DEFAULT '13' COMMENT '缩放等级',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `areas` */

insert  into `areas`(`id`,`name`,`longitude`,`latitude`,`parent_id`,`zoom`,`created`,`modified`) values (1,'包河区','117.316582','31.799745',0,'13',NULL,NULL),(2,'北京路','117.332212','31.800727',1,'15',NULL,NULL),(3,'方兴大道','117.2878','31.731283',1,'15',NULL,NULL),(4,'龙川路','117.27429','31.803243',1,'15',NULL,NULL),(5,'南一环','117.306988','31.854171',1,'15',NULL,NULL),(6,'徽州大道','117.292759','31.777585',1,'15',NULL,NULL),(7,'习友路','117.272493','31.773287',1,'15',NULL,NULL);

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `column_id` int(11) DEFAULT NULL COMMENT '栏目id',
  `title` varchar(150) DEFAULT NULL COMMENT '标题',
  `shorttitle` varchar(36) DEFAULT NULL COMMENT '短标题',
  `color` varchar(10) DEFAULT NULL COMMENT '标题颜色',
  `description` varchar(255) DEFAULT NULL COMMENT '摘要',
  `keywords` varchar(60) DEFAULT NULL COMMENT '关键字',
  `content` text COMMENT '文章内容',
  `author` varchar(50) DEFAULT NULL COMMENT '作者',
  `source` varchar(50) DEFAULT NULL COMMENT '来源',
  `pubdate` datetime DEFAULT NULL COMMENT '发布时间',
  `image` varchar(50) DEFAULT NULL COMMENT '缩略图',
  `click` int(11) DEFAULT '0' COMMENT '点击次数',
  `isshow` smallint(1) DEFAULT '1' COMMENT '是否显示，1是，2否',
  `iscommend` smallint(1) DEFAULT '2' COMMENT '是否推荐，1是，2否',
  `isbold` smallint(1) DEFAULT '2' COMMENT '是否加粗，1是，2否',
  `istop` smallint(1) DEFAULT '2' COMMENT '是否置顶，1是，2否',
  `ishot` smallint(1) DEFAULT '2' COMMENT '是否热门，1是，2否',
  `user_id` int(11) DEFAULT NULL COMMENT '发布管理员id',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `articles` */

/*Table structure for table `columns` */

DROP TABLE IF EXISTS `columns`;

CREATE TABLE `columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(80) NOT NULL COMMENT '栏目名称',
  `pinyin` varchar(50) DEFAULT NULL COMMENT '栏目拼音',
  `parent_id` int(11) DEFAULT NULL COMMENT '上级栏目id',
  `level` int(1) DEFAULT '1' COMMENT '栏目等级',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `type` int(2) DEFAULT NULL COMMENT '栏目类型。1为主栏目，2为单页面，3列表栏目，4图片列表',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';

/*Data for the table `columns` */

/*Table structure for table `configs` */

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `title` varchar(255) DEFAULT NULL COMMENT '前台网站标题',
  `description` varchar(255) DEFAULT NULL COMMENT '前台网站描述',
  `keywords` varchar(255) DEFAULT NULL COMMENT '前台网站关键字',
  `author` varchar(255) DEFAULT NULL COMMENT '前台网站作者',
  `name` varchar(50) DEFAULT NULL COMMENT '系统名称',
  `logo` varchar(100) DEFAULT NULL COMMENT '系统logo',
  `startyear` year(4) DEFAULT NULL COMMENT '系统起始年份',
  `baiduak` varchar(100) DEFAULT NULL COMMENT '百度地图AK',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

/*Data for the table `configs` */

insert  into `configs`(`id`,`title`,`description`,`keywords`,`author`,`name`,`logo`,`startyear`,`baiduak`) values (3,'包河区大建设指挥部办公室征迁项目信息系统','','','','包河区大建设指挥部办公室征迁项目信息系统','gmpxsc87.png',2016,'');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`name`,`tel`,`created`,`modified`) values (1,'许静','15209852625',NULL,NULL),(2,'张辰成','15209852625',NULL,NULL),(3,'张兵','15209852625',NULL,NULL),(4,'张一','15209852625',NULL,NULL),(5,'张2','15209852625',NULL,NULL),(6,'张3','15209852625',NULL,NULL),(7,'张4','15209852625',NULL,NULL),(8,'张5','15209852625',NULL,NULL),(9,'张6','15209852625',NULL,NULL),(10,'张7','15209852625',NULL,NULL),(11,'张8','15209852625',NULL,NULL),(12,'张9','15209852625',NULL,NULL),(13,'张10','15209852625',NULL,NULL),(14,'张11','15209852625',NULL,NULL),(15,'张12','15209852625',NULL,NULL),(16,'张13','15209852625',NULL,NULL),(17,'张14','15209852625',NULL,NULL),(18,'张15','15209852625',NULL,NULL),(19,'张16','15209852625',NULL,NULL),(21,'张18','15209852625',NULL,NULL);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `intro` text COMMENT '项目简介',
  `image` varchar(100) DEFAULT NULL COMMENT '项目封面图片',
  `mianji` varchar(100) DEFAULT NULL COMMENT '项目面积',
  `households` int(11) DEFAULT NULL COMMENT '拆迁户数',
  `construction` varchar(100) DEFAULT NULL COMMENT '建设单位',
  `period` varchar(100) DEFAULT NULL COMMENT '建设周期',
  `state` tinyint(2) DEFAULT NULL COMMENT '项目状态(1拆 2建  3算 4安  5管)',
  `ok` tinyint(2) DEFAULT NULL COMMENT '完成状态(1未完成 2完成)',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `longitude` varchar(50) DEFAULT NULL COMMENT '经度',
  `latitude` varchar(50) DEFAULT NULL COMMENT '纬度',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `items` */

insert  into `items`(`id`,`name`,`intro`,`image`,`mianji`,`households`,`construction`,`period`,`state`,`ok`,`remark`,`longitude`,`latitude`,`created`,`modified`) values (1,'百合园回迁房','这是北京路沿线拆迁建设的回迁房',NULL,'100',NULL,NULL,NULL,2,2,NULL,'117.32614','31.80843',NULL,NULL),(2,'包河院','这是包河苑小区',NULL,NULL,NULL,NULL,NULL,5,1,NULL,'117.330919','31.803827',NULL,NULL),(3,'陈岗回迁楼','这是北京路沿线拆迁的房子',NULL,NULL,NULL,NULL,NULL,4,1,NULL,'117.332967','31.797259',NULL,NULL),(4,'龙川路1号回迁','龙川路1号回迁',NULL,NULL,NULL,NULL,NULL,1,1,NULL,'117.263733','31.800645',NULL,NULL),(5,'龙川路2号回迁','龙川路2号回迁',NULL,NULL,NULL,NULL,NULL,1,1,NULL,'117.276309','31.805064',NULL,NULL),(6,'南艳湖小区','南艳湖小区',NULL,NULL,NULL,NULL,NULL,2,1,NULL,'117.275124','31.771271',NULL,NULL),(7,'海恨社区','海恨社区',NULL,NULL,NULL,NULL,NULL,3,1,NULL,'117.268836','31.779897',NULL,NULL),(8,'书香门第','书香门第',NULL,NULL,NULL,NULL,NULL,3,1,NULL,'117.283855','31.734549',NULL,NULL),(9,'冰湖万科','冰湖万科',NULL,NULL,NULL,NULL,NULL,4,1,NULL,'117.280118','31.720175',NULL,NULL);

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `openid` varchar(50) NOT NULL COMMENT '微信id',
  `nickname` varchar(50) NOT NULL COMMENT '昵称',
  `headimgurl` varchar(150) DEFAULT NULL COMMENT '头像',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别 1:男 2:女 3:未知',
  `tel` varchar(50) DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `state` int(11) DEFAULT '1' COMMENT '用户状态（1正常会员 2冻结会员）',
  `follow_time` datetime DEFAULT NULL COMMENT '关注时间',
  `reg_time` datetime DEFAULT NULL COMMENT '注册时间',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  `last_login_ip` varchar(20) DEFAULT NULL COMMENT '最后一次登录ip',
  `created` datetime DEFAULT NULL COMMENT '添加时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `members` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `parent_id` int(11) DEFAULT '0' COMMENT '父id',
  `level` smallint(2) DEFAULT '1' COMMENT '级别',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `icon` varchar(50) DEFAULT NULL COMMENT 'icon',
  `url` varchar(50) DEFAULT NULL COMMENT 'url',
  `rel` varchar(50) DEFAULT NULL COMMENT 'rel',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=utf8 COMMENT='菜单表';

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`parent_id`,`level`,`sort`,`icon`,`url`,`rel`,`created`,`modified`) values (1,'系统管理',5,2,1,'cogs','','','2015-07-01 20:37:52','2015-12-18 21:38:21'),(2,'用户管理',1,3,0,'fa-user','phetom/users/index','users','2015-07-01 20:38:45','2015-12-18 20:56:33'),(3,'管理员组',1,3,1,'fa-group','phetom/roles/index','roles','2015-07-01 20:41:33','2015-07-01 20:41:34'),(4,'菜单管理',1,3,2,'fa-bars','phetom/menus/index','menus','2015-07-01 20:42:07','2015-07-01 20:42:09'),(5,'系统设置',0,1,20,'fa-cog','','','2015-07-03 15:26:33','2016-06-29 16:40:18'),(168,'文章管理',167,3,0,'fa-file-text-o','phetom/articles/index','articles','2016-01-26 16:43:35','2016-01-26 16:43:35'),(165,'栏目管理',1,3,2,'fa-folder-o','phetom/columns/index','columns','2016-01-26 16:25:47','2016-01-26 16:25:47'),(166,'信息',0,1,9,'fa-th-large','','','2016-01-26 16:42:40','2016-05-19 13:50:00'),(167,'信息管理',166,2,0,'files-o','','','2016-01-26 16:43:01','2016-06-29 15:57:15'),(160,'系统设置',1,3,3,'fa-cog','phetom/configs/setting','configs','2015-12-06 15:44:23','2015-12-06 15:48:39'),(196,'会员',0,1,10,'fa-users','','','2016-05-19 14:02:04','2016-06-29 16:40:06'),(197,'会员管理',196,2,0,'folder-o','','','2016-05-19 14:02:27','2016-05-19 14:02:27'),(198,'会员列表',197,3,0,'fa-user','phetom/members/index','members','2016-05-19 14:02:52','2016-05-23 15:40:54'),(213,'区域管理',167,3,0,'fa-plus','phetom/areas/index','areas','2016-06-29 15:18:36','2016-06-29 15:18:36'),(214,'通讯录',167,3,0,'fa-phone','phetom/contacts/index','contacts','2016-06-29 15:58:02','2016-06-29 15:58:02'),(215,'项目',0,1,0,'fa-building','','','2016-06-29 16:39:44','2016-06-29 16:39:44'),(216,'项目管理',215,2,0,'folder-o','','','2016-06-29 16:40:35','2016-06-29 16:40:35'),(217,'项目管理',216,3,0,'fa-folder-o','phetom/items/index','items','2016-06-29 16:41:01','2016-06-29 16:41:01'),(218,'模板管理',216,3,0,'fa-folder-o','phetom/templates/index','templates','2016-06-29 16:41:30','2016-06-29 16:41:30');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(30) DEFAULT NULL COMMENT '管理员组名称',
  `menus` text COMMENT '菜单权限',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员组';

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`menus`,`note`,`sort`,`created`,`modified`) values (1,'管理员','[\"215\",\"216\",\"217\",\"218\",\"166\",\"167\",\"168\",\"213\",\"214\",\"196\",\"197\",\"198\",\"5\",\"1\",\"2\",\"3\",\"4\",\"165\",\"160\"]',NULL,0,'2016-06-13 14:33:26','2016-06-29 16:41:38');

/*Table structure for table `streets` */

DROP TABLE IF EXISTS `streets`;

CREATE TABLE `streets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL COMMENT '项目id',
  `area_id` int(11) NOT NULL COMMENT '街道id',
  `created` datetime DEFAULT NULL COMMENT '添加时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `streets` */

insert  into `streets`(`id`,`item_id`,`area_id`,`created`,`modified`) values (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,2,NULL,NULL),(4,4,4,NULL,NULL),(5,5,4,NULL,NULL),(6,6,7,NULL,NULL),(7,7,7,NULL,NULL),(8,8,3,NULL,NULL),(9,9,3,NULL,NULL),(10,6,3,NULL,NULL);

/*Table structure for table `template_details` */

DROP TABLE IF EXISTS `template_details`;

CREATE TABLE `template_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `template_id` int(11) DEFAULT NULL COMMENT '模板id',
  `name` varchar(100) DEFAULT NULL COMMENT '流程名称',
  `level` int(11) DEFAULT NULL COMMENT '流程等级',
  `parent_id` int(11) DEFAULT NULL COMMENT '父id',
  `endtime` int(11) DEFAULT NULL COMMENT '截至时间',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='模板明细表';

/*Data for the table `template_details` */

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) DEFAULT NULL COMMENT '模板名称',
  `type` int(11) DEFAULT NULL COMMENT '模板分类， 200，300，50户数',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='模板表';

/*Data for the table `templates` */

insert  into `templates`(`id`,`name`,`type`,`created`,`modified`) values (2,'200户数模板',200,'2016-06-29 16:53:07','2016-06-29 16:53:07');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `nicheng` varchar(30) DEFAULT NULL COMMENT '昵称',
  `sex` smallint(1) DEFAULT '1' COMMENT '性别，1为男，2为女',
  `images` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `tel` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) DEFAULT NULL COMMENT '电子邮件',
  `role_id` int(11) DEFAULT NULL COMMENT '管理员组id',
  `state` smallint(1) DEFAULT '1' COMMENT '状态，1启用，2禁止',
  `created` datetime DEFAULT NULL COMMENT '创建时间',
  `modified` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`nicheng`,`sex`,`images`,`tel`,`email`,`role_id`,`state`,`created`,`modified`) values (1,'admin','$2y$10$.msLX5289hcy4mk8vWat1eyetrZI1QcrWukYHbazK9EhPSBjM9KW.','管理员',1,NULL,'0551-65780721','',1,1,'2016-05-19 09:09:50','2016-05-31 09:53:29');

/*Table structure for table `wx_menus` */

DROP TABLE IF EXISTS `wx_menus`;

CREATE TABLE `wx_menus` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pid` tinyint(4) DEFAULT NULL COMMENT '上级菜单',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `is_show` tinyint(2) DEFAULT '1' COMMENT '是否显示 0为不显示 1为显示',
  `type` tinyint(2) NOT NULL COMMENT '类型 1:click事件 2跳转URL',
  `sort` tinyint(4) DEFAULT NULL COMMENT '排序',
  `keyword` varchar(100) DEFAULT NULL COMMENT 'click的key',
  `url` varchar(100) DEFAULT NULL COMMENT '跳转的URL',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `wx_menus` */

insert  into `wx_menus`(`id`,`pid`,`name`,`is_show`,`type`,`sort`,`keyword`,`url`,`created`,`modified`) values (4,0,'微商城',1,2,2,'','http://www.ifocusclub.com/lianhe/micri_mart/good/lists?type=getuserinfo','2016-05-24 15:33:27','2016-05-24 15:33:27'),(6,0,'会员中心',1,2,3,'','http://www.ifocusclub.com/lianhe/ucenter/member/index?type=getuserinfo','2016-05-25 09:07:57','2016-05-25 09:07:57');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

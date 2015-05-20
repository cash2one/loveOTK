/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50528
Source Host           : 127.0.0.1:3306
Source Database       : huoyunzhanguanlixitong

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2015-05-03 13:04:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dd_role
-- ----------------------------
DROP TABLE IF EXISTS `dd_role`;
CREATE TABLE `dd_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BD9EF7A857698A6A` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dd_role
-- ----------------------------
INSERT INTO `dd_role` VALUES ('1', '员工', 'ROLE_员工');

-- ----------------------------
-- Table structure for dd_tuoyundan
-- ----------------------------
DROP TABLE IF EXISTS `dd_tuoyundan`;
CREATE TABLE `dd_tuoyundan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awbno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xianlu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jiaojiefangshi` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pinming` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jianshu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zhongliang` int(11) DEFAULT NULL,
  `tiji` int(11) DEFAULT NULL,
  `tihuodianhua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tihuodizhi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fahuomingcheng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fahuoguhua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fahuoshouji` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shouhoumingcheng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shouhouguhua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shouhoushouji` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `huidan` int(11) DEFAULT NULL,
  `teshuyaoqiu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beizhu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jifeifangshi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jibenyunfei` double DEFAULT '0' COMMENT '基本运费',
  `tihuofei` double DEFAULT '0' COMMENT '提货费',
  `songhuofei` double DEFAULT '0' COMMENT '送货费',
  `zhongzhuanfei` double DEFAULT '0' COMMENT '中转费',
  `daishouhuokuan` double DEFAULT '0' COMMENT '代收货款',
  `qitafeiyong` double DEFAULT '0' COMMENT '其他费用',
  `yunfei` double DEFAULT '0' COMMENT '运费',
  `xianfu` double DEFAULT '0' COMMENT '现付',
  `daofu` double DEFAULT '0' COMMENT '到付',
  `huidanfu` double DEFAULT '0' COMMENT '回单付',
  `yuejie` double DEFAULT '0' COMMENT '月结',
  `huikou` double DEFAULT '0' COMMENT '回扣',
  `jiesuanfangshi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fapiao` tinyint(1) DEFAULT '0' COMMENT '是否开发票',
  `feiyongshuoming` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waifa` tinyint(1) DEFAULT '0' COMMENT '是否外发',
  `date_created` datetime DEFAULT NULL COMMENT '创建时间',
  `last_updated` datetime DEFAULT NULL COMMENT '修改时间',
  `create_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '创建人',
  `last_updated_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '修改人',
  `daishouhuokuanshouyin` tinyint(1) DEFAULT '0' COMMENT '是否代收货款收银',
  `daishouhuokuanshouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '代收货款收银方式',
  `date_daishouhuokuanshouyin` datetime DEFAULT NULL COMMENT '代收货款收银时间',
  `xianfushouyin` tinyint(1) DEFAULT '0' COMMENT '是否现付收银',
  `xianfushouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '现付收银方式',
  `date_xianfushouyin` datetime DEFAULT NULL COMMENT '现付收银时间',
  `qiankuanshouyin` tinyint(1) DEFAULT '0' COMMENT '是否欠款收银',
  `qiankuanshouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '欠款收银方式',
  `date_qiankuanshouyin` datetime DEFAULT NULL COMMENT '欠款收银时间',
  `huikoushouyin` tinyint(1) DEFAULT '0' COMMENT '是否回扣收银',
  `huikoushouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '回扣收银方式',
  `date_huikoushouyin` datetime DEFAULT NULL COMMENT '回扣收银时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_93465E85F9B8146B` (`awbno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dd_tuoyundan
-- ----------------------------
INSERT INTO `dd_tuoyundan` VALUES ('1', '111111', '某地', '大连-某地', '自提', '玉米', '1', '10', '10', '0411-111111', null, '某人', null, null, '某人', null, null, '1', null, null, '按吨数', '100', '10', '10', '120', '100', '100', null, '100', '100', '50', '50', '30', '到付', '0', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `dd_tuoyundan` VALUES ('2', '22222', '某地', '大连-某地', '自提', '玉米', '1', '10', '10', '0411-111111', null, '某人', null, null, '某人', null, null, '1', null, null, '按吨数', '100', '10', '10', '120', null, '100', null, '100', null, '50', '50', '30', '现付', '0', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `dd_tuoyundan` VALUES ('3', '33333', '某地', '大连-某地', '自提', '玉米', '1', '10', '10', '0411-111111', null, '某人', null, null, '某人', null, null, '1', null, null, '按吨数', '100', '10', '10', '120', '100', '100', null, '100', '100', '50', '50', '30', '到付', '0', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for dd_users
-- ----------------------------
DROP TABLE IF EXISTS `dd_users`;
CREATE TABLE `dd_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6103F108F85E0677` (`username`),
  UNIQUE KEY `UNIQ_6103F108E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dd_users
-- ----------------------------
INSERT INTO `dd_users` VALUES ('1', 'admin', 'admin', '', '1');

-- ----------------------------
-- Table structure for dd_waifaluru
-- ----------------------------
DROP TABLE IF EXISTS `dd_waifaluru`;
CREATE TABLE `dd_waifaluru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tuoyundan_id` int(11) DEFAULT NULL COMMENT '托运单id',
  `date_zhongzhuan` datetime DEFAULT NULL COMMENT '中转时间',
  `chengyungongsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zhongzhuandan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bendidianhua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tihuodianhua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lianxiren` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lianxidizhi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zhongliang` int(11) DEFAULT NULL,
  `tiji` int(11) DEFAULT NULL,
  `waifayuan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_daoda` datetime DEFAULT NULL COMMENT '到达时间',
  `yingfuyunfei` double DEFAULT '0' COMMENT '应付运费',
  `yufuyunfei` double DEFAULT '0' COMMENT '预付运费',
  `daofuzonge` double DEFAULT '0' COMMENT '到付总额',
  `zhongzhuanjiesuanfangshi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shenhe` tinyint(1) DEFAULT '0' COMMENT '是否审核',
  `date_created` datetime DEFAULT NULL COMMENT '创建时间',
  `last_updated` datetime DEFAULT NULL COMMENT '修改时间',
  `create_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '创建人',
  `last_updated_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '修改人',
  `xianfu` double DEFAULT '0' COMMENT '现付',
  `xianfushouyin` tinyint(1) DEFAULT '0' COMMENT '是否现付收银',
  `xianfushouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '现付收银方式',
  `date_xianfushouyin` datetime DEFAULT NULL COMMENT '现付收银时间',
  `jiekuanshouyin` tinyint(1) DEFAULT '0' COMMENT '是否现付收银',
  `jiekuanshouyinfangshi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '结款收银方式',
  `date_jiekuanshouyin` datetime DEFAULT NULL COMMENT '结款收银时间',
  `yingfusonghuofei` double DEFAULT '0' COMMENT '应付送货费',
  `yingfuqita` double DEFAULT '0' COMMENT '应付其他',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A6D6015AD3E44A6` (`zhongzhuandan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dd_waifaluru
-- ----------------------------
INSERT INTO `dd_waifaluru` VALUES ('1', '1', '2015-05-03 00:00:00', null, '111111', null, null, null, null, null, null, null, null, '1000', null, '0', '现结', '0', null, null, null, null, '0', null, null, null, null, null, null, '0', '0');
INSERT INTO `dd_waifaluru` VALUES ('2', '2', '2015-05-03 00:00:00', null, '22222222', null, null, null, null, null, null, null, null, '100', '50', '0', '回单结', '0', null, null, null, null, '0', null, null, null, null, null, null, '0', '0');
INSERT INTO `dd_waifaluru` VALUES ('3', '3', '2015-05-03 00:00:00', null, '33333333', null, null, null, null, null, null, null, null, '10', null, '0', '欠款', '0', null, null, null, null, '0', null, null, null, null, null, null, '10', '10');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  KEY `IDX_2DE8C6A3D60322AC` (`role_id`),
  CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `dd_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `dd_role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1');

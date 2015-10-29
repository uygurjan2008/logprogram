/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : worklog

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2015-08-19 12:09:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `etc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for worklog
-- ----------------------------
DROP TABLE IF EXISTS `worklog`;
CREATE TABLE `worklog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_content` varchar(4000) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of worklog
-- ----------------------------

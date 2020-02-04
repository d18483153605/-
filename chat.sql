/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : chat

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-01-28 14:19:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL COMMENT '发送者的id',
  `toid` int(11) NOT NULL COMMENT '接收消息的id',
  `content` text NOT NULL COMMENT '内容',
  `time` datetime NOT NULL COMMENT '时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:未读   2 ： 已读',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '3', 'ADS FSDA FSDA FDSA ', '2019-01-16 16:11:28', '1');
INSERT INTO `message` VALUES ('2', '1', '3', '你好', '2019-01-16 16:16:11', '1');
INSERT INTO `message` VALUES ('3', '1', '3', '撒旦法十大', '2019-01-16 16:18:30', '1');
INSERT INTO `message` VALUES ('4', '1', '3', '打发撒旦法士大夫十大发打发后就撒堕落腐化拉萨的空间安徽福建省了大开发还是打了款混分巨兽打了客服就挥洒都鲁大师卡交话费了盛大开', '2019-01-16 16:38:29', '1');
INSERT INTO `message` VALUES ('5', '1', '3', '很快就拉萨的回复撒即可啥地方和阿拉基；桑德拉客服j发达发达发达发达发达发达发达发发达发 达发达发达 sad fsda fsda fsda fsda fsad fsda fsda fsad fdsa fsda f f df sad ', '2019-01-16 16:39:51', '1');
INSERT INTO `message` VALUES ('6', '1', '3', 'dasf dsaf sda', '2019-01-16 17:07:35', '1');
INSERT INTO `message` VALUES ('7', '26455', '5837', 'sdaf', '2019-01-17 10:17:55', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '用户1', null);
INSERT INTO `user` VALUES ('2', '用户2', null);
INSERT INTO `user` VALUES ('3', '客服1', null);
INSERT INTO `user` VALUES ('4', '客服2', null);

/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : article

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-04-28 12:08:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_article
-- ----------------------------
DROP TABLE IF EXISTS `think_article`;
CREATE TABLE `think_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `category` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of think_article
-- ----------------------------
INSERT INTO `think_article` VALUES ('8', '舒舒服服', '计算机，工程', '这里文章描述，用来显示在文章列表也里', '<p>大概大概<br/></p><p>对公司股东所<img src=\"/ueditor/php/upload/image/20200309/1583734823663526.png\" title=\"1583734823663526.png\" alt=\"QQ截图20200309103832.png\"/></p>', '1583831934', '1', '1');
INSERT INTO `think_article` VALUES ('9', '回忆是一条狂犬', '计算机，工程', '这里文章描述，用来显示在文章列表也里', '<p>把垃圾哈市。</p><p>阿三就是看房</p><p>色调玩儿<img src=\"/ueditor/php/upload/image/20200310/1583803252203980.png\" title=\"1583803252203980.png\" alt=\"QQ截图20200309103917.png\"/></p>', '1583803526', '1', '1');
INSERT INTO `think_article` VALUES ('2', '计算机地方', '计算机，工程', '这里文章描述，用来显示在文章列表也里', '品牌为utwejk，大数据发生。京东感觉到过', '1583734823', '1', '1');
INSERT INTO `think_article` VALUES ('21', 'sdsdsd', 'ssss', 'ssss', '<p>sfsds&nbsp;</p>', '1585732206', '1', '1');
INSERT INTO `think_article` VALUES ('22', 'fsdfsda', 'sdfsd', '', '<p>dfssdfa</p>', '1585732275', '1', '1');
INSERT INTO `think_article` VALUES ('11', '看看详情页能不能发', '计算机，工程', '这时使用ueditor编辑的文章描述页面', '<p><strong>xxx</strong></p><p><br/></p><p>欢迎来到我的地盘，这<span style=\"text-decoration: underline;\">里是快乐的源泉</span></p><p><span style=\"text-decoration: underline;\">哈哈哈<img src=\"/ueditor/php/upload/image/20200310/1583819674865698.png\" title=\"1583819674865698.png\" alt=\"image.png\"/></span></p>', '1583819680', '1', '1');
INSERT INTO `think_article` VALUES ('12', '这是一条签约的新闻', '计算机，工程', '这时使用ueditor编辑的文章描述页面', '<p>欢迎使用ueditor</p>', '1583822693', '1', '1');
INSERT INTO `think_article` VALUES ('13', '这是一条行业新闻', '计算机，工程', '这是一条行业新闻', '<p>欢迎使用ueditor</p>', '1583822723', '1', '1');
INSERT INTO `think_article` VALUES ('14', '此时已莺飞草长', '歌曲，好听的歌曲', '这是一首情歌，或者你认为是什么就是什么', '<p>你看我说的对吗，我觉得我说的很对</p>', '1583895417', '1', '1');
INSERT INTO `think_article` VALUES ('15', '看看详情页能不能发', '计算机，工程', '这时使用ueditor编辑的文章描述页面', '<p><strong>xxx</strong></p><p><br/></p><p>欢迎来到我的地盘，这<span style=\"text-decoration: underline;\">里是快乐的源泉</span></p><p><span style=\"text-decoration: underline;\">哈哈哈<img src=\"/ueditor/php/upload/image/20200310/1583819674865698.png\" title=\"1583819674865698.png\" alt=\"image.png\"/></span></p>', '1583819680', '1', '1');
INSERT INTO `think_article` VALUES ('16', '这是一条签约的新闻', '计算机，工程', '这时使用ueditor编辑的文章描述页面', '<p>欢迎使用ueditor</p>', '1583822693', '1', '1');
INSERT INTO `think_article` VALUES ('17', '这是一条行业新闻', '计算机，工程', '这是一条行业新闻', '<p>欢迎使用ueditor</p>', '1583822723', '1', '3');

-- ----------------------------
-- Table structure for think_category
-- ----------------------------
DROP TABLE IF EXISTS `think_category`;
CREATE TABLE `think_category` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of think_category
-- ----------------------------
INSERT INTO `think_category` VALUES ('1', '假新闻');
INSERT INTO `think_category` VALUES ('2', '行业新闻');
INSERT INTO `think_category` VALUES ('3', '其他新闻');

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logintime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('1', 'admin', '123456', '1587895912');

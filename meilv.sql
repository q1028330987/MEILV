/*
Navicat MySQL Data Transfer

Source Server         : Linux
Source Server Version : 50523
Source Host           : 192.168.42.123:3306
Source Database       : meilv

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2017-04-27 22:47:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mlv_address
-- ----------------------------
DROP TABLE IF EXISTS `mlv_address`;
CREATE TABLE `mlv_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '无符号的自增ID',
  `uid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '1:男 2:女',
  `status` tinyint(4) DEFAULT '1' COMMENT '1位正常，2为用户已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_address
-- ----------------------------
INSERT INTO `mlv_address` VALUES ('3', '6', '东圃珠村文华新大街三巷一号', '18320487321', '叶治良', '1', '1');
INSERT INTO `mlv_address` VALUES ('4', '1', '广州天河东圃', '18062939123', '汪亮', '1', '2');
INSERT INTO `mlv_address` VALUES ('5', '4', '北京市', '15920114635', '张', '1', '1');
INSERT INTO `mlv_address` VALUES ('6', '9', '北京市1环区天安门广场1号', '15920114635', '叶智障', '2', '1');
INSERT INTO `mlv_address` VALUES ('7', '10', '1110110110', '110110110', '张小强', '1', '1');
INSERT INTO `mlv_address` VALUES ('8', '15', '东圃珠村文华新大街三巷一号', '18320487321', '张志强', '1', '1');
INSERT INTO `mlv_address` VALUES ('9', '9', '324324324', '32432432', '432324', '2', '2');
INSERT INTO `mlv_address` VALUES ('10', '3', '背景', '15920114635', '朱忠想帅了', '1', '1');
INSERT INTO `mlv_address` VALUES ('11', '1', '爱的撒旦', '123456', '未来', '1', '2');
INSERT INTO `mlv_address` VALUES ('12', '1', '34343', '45555', '6565r65465', '1', '1');

-- ----------------------------
-- Table structure for mlv_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `mlv_auth_group`;
CREATE TABLE `mlv_auth_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_auth_group
-- ----------------------------
INSERT INTO `mlv_auth_group` VALUES ('1', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,20,21,15,16,17,19', '超级管理员', '2017-03-05 06:35:38');
INSERT INTO `mlv_auth_group` VALUES ('23', '1', '1,2,7,8,11,13', '客服人员', '2017-03-03 11:30:45');
INSERT INTO `mlv_auth_group` VALUES ('24', '1', '1,2,3,4,5,6,7,8,11', '大后台', '2017-03-01 06:15:14');

-- ----------------------------
-- Table structure for mlv_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `mlv_auth_group_access`;
CREATE TABLE `mlv_auth_group_access` (
  `uid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_auth_group_access
-- ----------------------------
INSERT INTO `mlv_auth_group_access` VALUES ('1', '1');
INSERT INTO `mlv_auth_group_access` VALUES ('41', '1');
INSERT INTO `mlv_auth_group_access` VALUES ('42', '23');
INSERT INTO `mlv_auth_group_access` VALUES ('49', '1');
INSERT INTO `mlv_auth_group_access` VALUES ('52', '23');
INSERT INTO `mlv_auth_group_access` VALUES ('53', '24');
INSERT INTO `mlv_auth_group_access` VALUES ('54', '1');

-- ----------------------------
-- Table structure for mlv_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `mlv_auth_rule`;
CREATE TABLE `mlv_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `cid` tinyint(4) NOT NULL COMMENT '所属模块ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_auth_rule
-- ----------------------------
INSERT INTO `mlv_auth_rule` VALUES ('1', 'MeilvAdmin/Index/welcome', '后台欢迎页', '1', '', '1');
INSERT INTO `mlv_auth_rule` VALUES ('2', 'MeilvAdmin/Index/index', '后台首页', '1', '', '1');
INSERT INTO `mlv_auth_rule` VALUES ('3', 'MeilvAdmin/Manager/addManager', '添加管理员', '1', '', '2');
INSERT INTO `mlv_auth_rule` VALUES ('4', 'MeilvAdmin/Manager/saveManager', '修改管理员信息', '1', '', '2');
INSERT INTO `mlv_auth_rule` VALUES ('5', 'MeilvAdmin/Manager/status', '修改管理员状态', '1', '', '2');
INSERT INTO `mlv_auth_rule` VALUES ('6', 'MeilvAdmin/Manager/delete', '删除管理员', '1', '', '2');
INSERT INTO `mlv_auth_rule` VALUES ('7', 'MeilvAdmin/Manager/adminList', '查看管理员', '1', '', '2');
INSERT INTO `mlv_auth_rule` VALUES ('8', 'MeilvAdmin/Auth/adminRole', '查看角色管理', '1', '', '3');
INSERT INTO `mlv_auth_rule` VALUES ('9', 'MeilvAdmin/Auth/adminSave', '修改角色权限', '1', '', '3');
INSERT INTO `mlv_auth_rule` VALUES ('10', 'MeilvAdmin/Auth/adminAdd', '添加角色', '1', '', '3');
INSERT INTO `mlv_auth_rule` VALUES ('11', 'MeilvAdmin/Auth/adminPermission', '查看权限管理', '1', '', '3');
INSERT INTO `mlv_auth_rule` VALUES ('12', 'MeilvAdmin/Auth/deleteAdmin', '删除角色', '1', '', '3');
INSERT INTO `mlv_auth_rule` VALUES ('13', 'MeilvAdmin/User/index', '查看会员', '1', '', '4');
INSERT INTO `mlv_auth_rule` VALUES ('14', 'MeilvAdmin/User/start', '会员权限设置', '1', '', '4');
INSERT INTO `mlv_auth_rule` VALUES ('15', 'MeilvAdmin/Friend/listShow', '查看友情链接', '1', '', '5');
INSERT INTO `mlv_auth_rule` VALUES ('16', 'MeilvAdmin/Friend/listLose', '删除友情链接', '1', '', '5');
INSERT INTO `mlv_auth_rule` VALUES ('17', 'MeilvAdmin/Friend/listEdit', '编辑友情链接', '1', '', '5');
INSERT INTO `mlv_auth_rule` VALUES ('19', 'MeilvAdmin/Friend/listAdd', '添加友情链接', '1', '', '5');
INSERT INTO `mlv_auth_rule` VALUES ('20', 'MeilvAdmin/User/change_password', '密码修改', '1', '', '4');
INSERT INTO `mlv_auth_rule` VALUES ('21', 'MeilvAdmin/User/editor', '添加会员', '1', '', '4');

-- ----------------------------
-- Table structure for mlv_auth_rule_classify
-- ----------------------------
DROP TABLE IF EXISTS `mlv_auth_rule_classify`;
CREATE TABLE `mlv_auth_rule_classify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '无符号的自增ID',
  `name` char(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_auth_rule_classify
-- ----------------------------
INSERT INTO `mlv_auth_rule_classify` VALUES ('1', '首页');
INSERT INTO `mlv_auth_rule_classify` VALUES ('2', '管理员模块');
INSERT INTO `mlv_auth_rule_classify` VALUES ('3', '权限模块');
INSERT INTO `mlv_auth_rule_classify` VALUES ('4', '会员模块');
INSERT INTO `mlv_auth_rule_classify` VALUES ('5', '友情链接模板');

-- ----------------------------
-- Table structure for mlv_collect
-- ----------------------------
DROP TABLE IF EXISTS `mlv_collect`;
CREATE TABLE `mlv_collect` (
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_collect
-- ----------------------------
INSERT INTO `mlv_collect` VALUES ('10', '8');
INSERT INTO `mlv_collect` VALUES ('6', '8');
INSERT INTO `mlv_collect` VALUES ('10', '8');
INSERT INTO `mlv_collect` VALUES ('7', '8');
INSERT INTO `mlv_collect` VALUES ('5', '8');
INSERT INTO `mlv_collect` VALUES ('10', '6');
INSERT INTO `mlv_collect` VALUES ('5', '6');
INSERT INTO `mlv_collect` VALUES ('11', '6');
INSERT INTO `mlv_collect` VALUES ('6', '6');
INSERT INTO `mlv_collect` VALUES ('7', '6');

-- ----------------------------
-- Table structure for mlv_comment
-- ----------------------------
DROP TABLE IF EXISTS `mlv_comment`;
CREATE TABLE `mlv_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` decimal(2,1) unsigned DEFAULT '5.0' COMMENT '评分',
  `content` varchar(255) DEFAULT '这家伙很懒什么都没写，不过我们推测应该吃的挺嗨。',
  `oid` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_comment
-- ----------------------------
INSERT INTO `mlv_comment` VALUES ('3', '4.5', '好鬼好食啊！！', '25', '2017-03-04 15:37:33');
INSERT INTO `mlv_comment` VALUES ('4', '5.0', '一般般', '27', '2017-03-04 16:35:39');
INSERT INTO `mlv_comment` VALUES ('5', '4.5', '挺好的，多汁', '37', '2017-03-04 16:52:22');
INSERT INTO `mlv_comment` VALUES ('6', '5.0', '上下左右baba', '40', '2017-03-04 16:52:41');
INSERT INTO `mlv_comment` VALUES ('7', '1.0', '难吃', '36', '2017-03-04 16:53:07');
INSERT INTO `mlv_comment` VALUES ('8', '2.5', '煞笔东西', '33', '2017-03-04 16:53:24');
INSERT INTO `mlv_comment` VALUES ('9', '4.5', '好好吃啊，下次带我女朋友来吃\r\n', '48', '2017-03-04 17:18:54');
INSERT INTO `mlv_comment` VALUES ('10', '0.5', '这家伙很懒什么都没写，不过我们推测应该吃的挺嗨。', '54', '2017-03-04 17:55:22');
INSERT INTO `mlv_comment` VALUES ('11', '5.0', '屌！', '52', '2017-03-04 18:37:06');
INSERT INTO `mlv_comment` VALUES ('12', '4.0', '这家伙很懒什么都没写，不过我们推测应该吃的挺嗨。', '58', '2017-03-04 20:06:16');
INSERT INTO `mlv_comment` VALUES ('13', '0.5', '这家伙很懒什么都没写，不过我们推测应该吃的挺嗨。', '57', '2017-03-04 20:13:20');
INSERT INTO `mlv_comment` VALUES ('14', '5.0', '五星好评', '59', '2017-03-04 21:35:58');
INSERT INTO `mlv_comment` VALUES ('17', '5.0', '很好', '61', '2017-03-05 04:36:31');
INSERT INTO `mlv_comment` VALUES ('18', '5.0', '好评', '65', '2017-03-05 10:16:59');
INSERT INTO `mlv_comment` VALUES ('19', '1.0', '垃圾', '64', '2017-03-05 10:37:23');
INSERT INTO `mlv_comment` VALUES ('20', '1.0', '垃圾', '67', '2017-03-05 10:38:47');

-- ----------------------------
-- Table structure for mlv_goods
-- ----------------------------
DROP TABLE IF EXISTS `mlv_goods`;
CREATE TABLE `mlv_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '无符号自增ID',
  `name` varchar(255) NOT NULL,
  `tid` int(4) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `des` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:正常  2:下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_goods
-- ----------------------------
INSERT INTO `mlv_goods` VALUES ('6', '红豆双皮奶茶', '8', 'Uploads/2016-08-17/57b3591d798b1.jpeg', '配红豆甜品!欢乐畅饮尽在果度！', '9.00', '1');
INSERT INTO `mlv_goods` VALUES ('7', '台湾烧仙草', '8', 'Uploads/2016-08-17/57b359aecad28.jpg', '配红豆甜品!欢乐畅饮尽在果度！', '10.00', '1');
INSERT INTO `mlv_goods` VALUES ('8', '咖喱饺', '9', 'Uploads/2016-08-17/57b35a2c60799.jpg', '咖喱风十足', '5.00', '1');
INSERT INTO `mlv_goods` VALUES ('9', '金丝鸡柳棒', '9', 'Uploads/2016-08-17/57b35a80ae1db.jpg', '啵啵脆啊！！', '5.00', '1');
INSERT INTO `mlv_goods` VALUES ('11', '华夫肉饼', '9', 'Uploads/2016-08-17/57b35ace1932d.jpg', '香辣脆口', '6.00', '1');
INSERT INTO `mlv_goods` VALUES ('12', '红豆派', '8', 'Uploads/2016-08-17/57b35b263993b.jpg', '情侣必备', '6.00', '1');
INSERT INTO `mlv_goods` VALUES ('14', '手抓饼+鸡蛋', '10', 'Uploads/2016-08-17/57b35bb40324a.jpg', '    粮山功夫手抓饼，身出名门宝岛，健康有机饼，作为健康时尚休闲小吃深受大家的喜欢。很多港台明星都在吃手抓饼，核心原料台湾直供，原料层层把关精心挑选。     ', '7.00', '1');
INSERT INTO `mlv_goods` VALUES ('17', '香辣车仔面', '11', 'Uploads/2016-08-17/57b35ef1e0aea.jpg', '车在面', '10.00', '1');
INSERT INTO `mlv_goods` VALUES ('22', '老北京手工炸酱面', '13', 'Uploads/2017-03-04/58ba6df375f09.jpg', '老北京手工炸酱面', '18.00', '1');
INSERT INTO `mlv_goods` VALUES ('23', '猪肉大葱包', '13', 'Uploads/2017-03-04/58ba6e4c82248.jpg', '猪肉大葱包', '28.00', '1');
INSERT INTO `mlv_goods` VALUES ('24', '牛肉圆葱包', '13', 'Uploads/2017-03-04/58ba6e6d4b8b8.jpg', '牛肉圆葱包', '32.00', '1');
INSERT INTO `mlv_goods` VALUES ('25', '韭菜鸡蛋包', '13', 'Uploads/2017-03-04/58ba6eb452b88.jpg', '韭菜鸡蛋包', '26.00', '1');
INSERT INTO `mlv_goods` VALUES ('26', '小米南瓜粥', '14', 'Uploads/2017-03-04/58ba6ee01cd14.jpg', '小米南瓜粥', '6.00', '1');
INSERT INTO `mlv_goods` VALUES ('27', '米饭', '14', 'Uploads/2017-03-04/58ba6f04a6790.jpg', '米饭', '2.00', '1');
INSERT INTO `mlv_goods` VALUES ('28', '可乐（1.25L）', '15', 'Uploads/2017-03-04/58ba6f3da808f.jpg', '可乐（1.25L）', '12.00', '1');
INSERT INTO `mlv_goods` VALUES ('30', '百威', '15', 'Uploads/2017-03-04/58ba6fc06fa43.jpg', '百威啤酒', '12.00', '1');
INSERT INTO `mlv_goods` VALUES ('31', '杜蕾斯 避孕套超薄安全套情趣型男用女用颗粒g点带刺狼牙震动高潮', '17', 'Uploads/2016-08-17/57b3aa1ae0e8c.jpg', '人气爆款 纯杜蕾斯 授权店铺', '39.00', '1');
INSERT INTO `mlv_goods` VALUES ('32', '杜蕾斯震动av按摩棒女用自慰器抽插高潮成人性用品激情趣用具跳蛋', '17', 'Uploads/2016-08-17/57b3b298644cd.jpg', '杜蕾斯爆款 官方正品 保密发货', '-1.00', '1');
INSERT INTO `mlv_goods` VALUES ('33', '小炒拆骨肉', '19', 'Uploads/2017-03-04/58ba9f2a3f61e.jpg', '小炒拆骨肉', '32.00', '1');
INSERT INTO `mlv_goods` VALUES ('34', '手撕包菜', '19', 'Uploads/2017-03-04/58ba9f90b5cbb.jpg', '手撕包菜', '22.00', '1');
INSERT INTO `mlv_goods` VALUES ('35', '香辣海龙鱼', '19', 'Uploads/2017-03-04/58ba9fe8c3bdb.jpg', '香辣海龙鱼', '32.00', '1');
INSERT INTO `mlv_goods` VALUES ('36', '水果杂切', '20', 'Uploads/2017-04-20/58f7bae22dc57.jpg', '    西瓜，番石榴，苹果，梨，火龙果，奇异果，菠萝，香蕉三种     ', '17.00', '1');
INSERT INTO `mlv_goods` VALUES ('37', '西瓜汁', '20', 'Uploads/2017-04-20/58f7bb60b5232.jpg', '香甜可口', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('38', '一粒柠檬', '21', 'Uploads/2017-04-20/58f7bc01579d1.jpeg', '    我是一整个的黄柠檬加红茶和蜂蜜哦，味道很特别哦。     ', '16.00', '1');
INSERT INTO `mlv_goods` VALUES ('39', '芒果益力多', '21', 'Uploads/2017-04-20/58f7bcb00458e.jpg', '健康又美味', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('40', '鲜柠檬薄荷冰', '21', 'Uploads/2017-04-20/58f7bce4624f7.jpg', '    哈哈，我偷吃了薄荷汁，感觉心里凉飕飕的。     ', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('41', '烤奶', '22', 'Uploads/2017-04-20/58f7bd3884185.jpg', '    我是清香型，重口味可选港式奶茶哦     ', '10.00', '1');
INSERT INTO `mlv_goods` VALUES ('42', '港式奶茶', '22', 'Uploads/2017-04-20/58f7bd646695a.jpg', '    喝不习惯吗，呵呵，喝多几次你就会爱上我哦     ', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('43', '抹茶新冰乐', '23', 'Uploads/2017-04-20/58f7be2acd82f.jpeg', '冷', '18.00', '1');
INSERT INTO `mlv_goods` VALUES ('44', '蔓越莓星冰乐', '23', 'Uploads/2017-04-20/58f7be686161c.jpeg', '冷', '17.00', '1');
INSERT INTO `mlv_goods` VALUES ('45', '吞拿鱼沙律军舰', '26', 'Uploads/2017-03-05/58baf319bc8bf.jpg', '吞拿鱼沙律军舰', '3.00', '1');
INSERT INTO `mlv_goods` VALUES ('46', '芝士金凤王', '24', 'Uploads/2017-04-20/58f7bf1b9fe5b.jpg', '可冷可暖', '19.00', '1');
INSERT INTO `mlv_goods` VALUES ('47', '芝士青龙茗茶', '24', 'Uploads/2017-04-20/58f7bfe269e3f.jpeg', '可冷可热', '16.00', '1');
INSERT INTO `mlv_goods` VALUES ('48', '鸡中翅', '25', 'Uploads/2017-04-20/58f7c02eae12b.jpg', '    3个，需酱料请备注     ', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('49', '香芋甜心', '25', 'Uploads/2017-04-20/58f7c06be0b9d.jpg', '四个', '13.00', '1');
INSERT INTO `mlv_goods` VALUES ('50', '蟹籽军舰', '26', 'Uploads/2017-03-05/58baf4e7111a4.jpg', '蟹籽军舰', '3.00', '1');
INSERT INTO `mlv_goods` VALUES ('51', '脆皮香蕉', '25', 'Uploads/2017-04-20/58f7c1096dd8e.jpg', '四个', '13.00', '1');
INSERT INTO `mlv_goods` VALUES ('52', '芒果欧蕾', '21', 'Uploads/2017-04-20/58f7c1be07a19.jpeg', '芒果', '15.00', '1');
INSERT INTO `mlv_goods` VALUES ('53', '赤贝寿司', '26', 'Uploads/2017-03-05/58baf5e7067ec.jpg', '赤贝寿司', '3.00', '1');
INSERT INTO `mlv_goods` VALUES ('54', '小汉堡', '30', 'Uploads/2016-12-04/5842fd92ba174.jpg', '好味', '8.00', '1');
INSERT INTO `mlv_goods` VALUES ('55', '汉堡王', '30', 'Uploads/2016-12-04/5842fda99fe3d.jpg', '好好吃', '8.00', '1');
INSERT INTO `mlv_goods` VALUES ('56', '汉堡', '31', 'Uploads/2017-03-05/58bb72c92ac2e.png', '撒大声地', '123.00', '1');

-- ----------------------------
-- Table structure for mlv_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `mlv_goods_type`;
CREATE TABLE `mlv_goods_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '外卖分类表id',
  `sid` int(11) NOT NULL COMMENT '商铺的id',
  `name` varchar(255) NOT NULL COMMENT '外卖分类名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_goods_type
-- ----------------------------
INSERT INTO `mlv_goods_type` VALUES ('13', '7', '美味包子类');
INSERT INTO `mlv_goods_type` VALUES ('14', '7', '米饭和粥');
INSERT INTO `mlv_goods_type` VALUES ('15', '7', '饮料');
INSERT INTO `mlv_goods_type` VALUES ('20', '10', '鲜果饮品');
INSERT INTO `mlv_goods_type` VALUES ('17', '8', '超薄安全套');
INSERT INTO `mlv_goods_type` VALUES ('8', '6', '烧仙草双皮奶玉米汁');
INSERT INTO `mlv_goods_type` VALUES ('9', '6', '鸡蛋仔章鱼丸翅包饭');
INSERT INTO `mlv_goods_type` VALUES ('10', '6', '手抓饼自由搭配');
INSERT INTO `mlv_goods_type` VALUES ('11', '6', '酸辣粉面饺子');
INSERT INTO `mlv_goods_type` VALUES ('12', '6', '鸡排汉堡');
INSERT INTO `mlv_goods_type` VALUES ('19', '7', '精品炒菜');
INSERT INTO `mlv_goods_type` VALUES ('21', '10', '特调');
INSERT INTO `mlv_goods_type` VALUES ('22', '10', '经典奶茶');
INSERT INTO `mlv_goods_type` VALUES ('23', '10', '星冰乐');
INSERT INTO `mlv_goods_type` VALUES ('24', '10', '皇芝士现泡茶');
INSERT INTO `mlv_goods_type` VALUES ('25', '10', '小吃');
INSERT INTO `mlv_goods_type` VALUES ('26', '11', '寿司3元尽享');
INSERT INTO `mlv_goods_type` VALUES ('27', '11', '招牌寿司6元尽享');
INSERT INTO `mlv_goods_type` VALUES ('28', '11', '优惠午晚餐');
INSERT INTO `mlv_goods_type` VALUES ('29', '11', '精品小食');
INSERT INTO `mlv_goods_type` VALUES ('30', '5', '汉堡');
INSERT INTO `mlv_goods_type` VALUES ('31', '14', '汉堡');

-- ----------------------------
-- Table structure for mlv_link
-- ----------------------------
DROP TABLE IF EXISTS `mlv_link`;
CREATE TABLE `mlv_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_link
-- ----------------------------
INSERT INTO `mlv_link` VALUES ('6', '三打哈网', 'http://www.sandaha.com');
INSERT INTO `mlv_link` VALUES ('8', '锤子网站', 'http://www.smartisan.com/');
INSERT INTO `mlv_link` VALUES ('9', '阿里云网', 'http://www.aliyun.com');
INSERT INTO `mlv_link` VALUES ('10', '三大哈', 'http://www.baidu.com');

-- ----------------------------
-- Table structure for mlv_manager
-- ----------------------------
DROP TABLE IF EXISTS `mlv_manager`;
CREATE TABLE `mlv_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mname` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`mname`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_manager
-- ----------------------------
INSERT INTO `mlv_manager` VALUES ('1', 'admin', '$2y$10$3VY.0fxX3hX3LxcxA3ZHLePZhVRTOlENRHCynniP44E.vgXTQgKEK', '2017-03-03 10:05:15', '1');
INSERT INTO `mlv_manager` VALUES ('41', 'zhangzhiqiang', '$2y$10$KLcme2pSg6M5YQpWU9t7ke9E93cKAci82C/U6B42oCtoYMktY9Zie', '2017-03-04 11:21:38', '2');
INSERT INTO `mlv_manager` VALUES ('42', 'zhang123', '$2y$10$htK2dNM0qnTZslA03xfVU.TtPvH3VPSzQGZvgaOegCgexbUtQGa3e', '2017-03-03 11:42:29', '1');
INSERT INTO `mlv_manager` VALUES ('49', 'zzq520', '$2y$10$zASdewxhFr4N621E5PKtUO0Cp.6K2hEYvm1ZqeAOW5T.1npt0MjrC', '2017-03-05 11:52:13', '2');
INSERT INTO `mlv_manager` VALUES ('52', 'zzxzzx', '$2y$10$3reUt5L6r0g.Ez.p9JR8quV5LLfxY9PdW72NK2X8RX66mGbnT6r3i', '2017-03-05 09:08:08', '2');
INSERT INTO `mlv_manager` VALUES ('53', '123as', '$2y$10$3IjHTjtSmAeZTqG7fg9JgOvsZGgsost2cwDH2GtTH./PHvsoW9Fqa', '2017-03-05 09:10:19', '2');
INSERT INTO `mlv_manager` VALUES ('54', 'qqqqq', '$2y$10$IkZwMS3VkCJwZtfsVFGcmeIo1iSMTEDNCLOFK8rbgCpFbS1wY9FXu', '2017-03-05 10:01:53', '1');

-- ----------------------------
-- Table structure for mlv_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `mlv_order_detail`;
CREATE TABLE `mlv_order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '无符号的自增ID',
  `oid` tinyint(4) NOT NULL,
  `gid` tinyint(4) NOT NULL,
  `num` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_order_detail
-- ----------------------------
INSERT INTO `mlv_order_detail` VALUES ('31', '25', '6', '1');
INSERT INTO `mlv_order_detail` VALUES ('32', '25', '12', '1');
INSERT INTO `mlv_order_detail` VALUES ('33', '26', '22', '5');
INSERT INTO `mlv_order_detail` VALUES ('34', '27', '27', '1');
INSERT INTO `mlv_order_detail` VALUES ('35', '27', '26', '1');
INSERT INTO `mlv_order_detail` VALUES ('36', '27', '28', '8');
INSERT INTO `mlv_order_detail` VALUES ('37', '27', '30', '5');
INSERT INTO `mlv_order_detail` VALUES ('38', '27', '25', '1');
INSERT INTO `mlv_order_detail` VALUES ('39', '27', '22', '1');
INSERT INTO `mlv_order_detail` VALUES ('40', '27', '23', '1');
INSERT INTO `mlv_order_detail` VALUES ('41', '27', '24', '1');
INSERT INTO `mlv_order_detail` VALUES ('42', '28', '22', '2');
INSERT INTO `mlv_order_detail` VALUES ('43', '29', '23', '2');
INSERT INTO `mlv_order_detail` VALUES ('44', '30', '23', '1');
INSERT INTO `mlv_order_detail` VALUES ('45', '30', '22', '1');
INSERT INTO `mlv_order_detail` VALUES ('46', '31', '7', '1');
INSERT INTO `mlv_order_detail` VALUES ('47', '31', '8', '1');
INSERT INTO `mlv_order_detail` VALUES ('48', '32', '6', '3');
INSERT INTO `mlv_order_detail` VALUES ('49', '33', '14', '1');
INSERT INTO `mlv_order_detail` VALUES ('50', '33', '17', '1');
INSERT INTO `mlv_order_detail` VALUES ('51', '34', '23', '3');
INSERT INTO `mlv_order_detail` VALUES ('52', '35', '26', '4');
INSERT INTO `mlv_order_detail` VALUES ('53', '35', '27', '2');
INSERT INTO `mlv_order_detail` VALUES ('54', '35', '30', '1');
INSERT INTO `mlv_order_detail` VALUES ('55', '36', '17', '1');
INSERT INTO `mlv_order_detail` VALUES ('56', '36', '11', '1');
INSERT INTO `mlv_order_detail` VALUES ('57', '37', '7', '1');
INSERT INTO `mlv_order_detail` VALUES ('58', '38', '23', '2');
INSERT INTO `mlv_order_detail` VALUES ('59', '39', '23', '1');
INSERT INTO `mlv_order_detail` VALUES ('60', '39', '24', '1');
INSERT INTO `mlv_order_detail` VALUES ('61', '40', '9', '1');
INSERT INTO `mlv_order_detail` VALUES ('62', '40', '8', '1');
INSERT INTO `mlv_order_detail` VALUES ('63', '41', '30', '3');
INSERT INTO `mlv_order_detail` VALUES ('64', '42', '23', '4');
INSERT INTO `mlv_order_detail` VALUES ('65', '43', '25', '3');
INSERT INTO `mlv_order_detail` VALUES ('66', '44', '24', '2');
INSERT INTO `mlv_order_detail` VALUES ('67', '45', '23', '5');
INSERT INTO `mlv_order_detail` VALUES ('68', '46', '22', '4');
INSERT INTO `mlv_order_detail` VALUES ('69', '47', '23', '3');
INSERT INTO `mlv_order_detail` VALUES ('70', '48', '6', '2');
INSERT INTO `mlv_order_detail` VALUES ('71', '49', '28', '4');
INSERT INTO `mlv_order_detail` VALUES ('72', '50', '25', '3');
INSERT INTO `mlv_order_detail` VALUES ('73', '51', '23', '2');
INSERT INTO `mlv_order_detail` VALUES ('74', '52', '23', '3');
INSERT INTO `mlv_order_detail` VALUES ('75', '53', '6', '1');
INSERT INTO `mlv_order_detail` VALUES ('76', '53', '7', '1');
INSERT INTO `mlv_order_detail` VALUES ('77', '54', '6', '1');
INSERT INTO `mlv_order_detail` VALUES ('78', '54', '12', '1');
INSERT INTO `mlv_order_detail` VALUES ('79', '55', '31', '1');
INSERT INTO `mlv_order_detail` VALUES ('80', '56', '32', '1');
INSERT INTO `mlv_order_detail` VALUES ('81', '56', '31', '1');
INSERT INTO `mlv_order_detail` VALUES ('82', '57', '6', '3');
INSERT INTO `mlv_order_detail` VALUES ('83', '58', '6', '3');
INSERT INTO `mlv_order_detail` VALUES ('84', '59', '24', '1');
INSERT INTO `mlv_order_detail` VALUES ('85', '59', '35', '1');
INSERT INTO `mlv_order_detail` VALUES ('86', '60', '23', '2');
INSERT INTO `mlv_order_detail` VALUES ('87', '61', '55', '1');
INSERT INTO `mlv_order_detail` VALUES ('88', '62', '31', '1');
INSERT INTO `mlv_order_detail` VALUES ('89', '63', '36', '2');
INSERT INTO `mlv_order_detail` VALUES ('90', '63', '37', '1');
INSERT INTO `mlv_order_detail` VALUES ('91', '63', '39', '1');
INSERT INTO `mlv_order_detail` VALUES ('92', '63', '52', '1');
INSERT INTO `mlv_order_detail` VALUES ('93', '63', '42', '1');
INSERT INTO `mlv_order_detail` VALUES ('94', '63', '41', '1');
INSERT INTO `mlv_order_detail` VALUES ('95', '63', '43', '1');
INSERT INTO `mlv_order_detail` VALUES ('96', '64', '37', '1');
INSERT INTO `mlv_order_detail` VALUES ('97', '64', '43', '1');
INSERT INTO `mlv_order_detail` VALUES ('98', '64', '51', '1');
INSERT INTO `mlv_order_detail` VALUES ('99', '64', '40', '1');
INSERT INTO `mlv_order_detail` VALUES ('100', '65', '22', '2');
INSERT INTO `mlv_order_detail` VALUES ('101', '66', '8', '2');
INSERT INTO `mlv_order_detail` VALUES ('102', '67', '7', '1');

-- ----------------------------
-- Table structure for mlv_orders
-- ----------------------------
DROP TABLE IF EXISTS `mlv_orders`;
CREATE TABLE `mlv_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '无符号的自增ID',
  `uid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `price` decimal(10,2) NOT NULL,
  `aid` int(11) NOT NULL,
  `sid` int(10) unsigned NOT NULL COMMENT '餐厅ID',
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_orders
-- ----------------------------
INSERT INTO `mlv_orders` VALUES ('25', '6', '2017-03-04 15:37:33', '22.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('26', '1', '2017-03-04 15:50:53', '110.00', '4', '7', '0');
INSERT INTO `mlv_orders` VALUES ('27', '9', '2017-03-04 16:35:39', '302.00', '6', '7', '3');
INSERT INTO `mlv_orders` VALUES ('28', '1', '2017-03-04 16:30:38', '53.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('29', '1', '2017-03-04 16:31:23', '73.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('30', '9', '2017-03-04 16:35:04', '63.00', '6', '7', '2');
INSERT INTO `mlv_orders` VALUES ('31', '6', '2017-03-04 16:37:16', '22.00', '3', '6', '2');
INSERT INTO `mlv_orders` VALUES ('32', '1', '2017-03-04 16:37:44', '35.00', '4', '6', '2');
INSERT INTO `mlv_orders` VALUES ('33', '6', '2017-03-04 16:53:24', '24.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('34', '1', '2017-03-04 16:41:52', '102.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('35', '1', '2017-03-04 16:44:34', '62.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('36', '6', '2017-03-04 16:53:07', '23.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('37', '6', '2017-03-04 16:52:22', '16.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('38', '1', '2017-03-04 16:49:04', '73.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('39', '9', '2017-03-04 16:50:25', '77.00', '6', '7', '2');
INSERT INTO `mlv_orders` VALUES ('40', '6', '2017-03-04 16:52:41', '17.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('41', '1', '2017-03-04 16:53:48', '54.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('42', '1', '2017-03-04 16:55:18', '131.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('43', '1', '2017-03-04 16:56:12', '96.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('44', '1', '2017-03-04 16:58:21', '81.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('45', '1', '2017-03-04 17:01:09', '160.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('46', '1', '2017-03-04 17:03:02', '91.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('47', '1', '2017-03-04 17:04:09', '102.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('48', '6', '2017-03-04 17:18:54', '25.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('49', '1', '2017-03-04 17:08:04', '67.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('50', '1', '2017-03-04 17:08:52', '96.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('51', '1', '2017-03-04 17:15:38', '73.00', '4', '7', '2');
INSERT INTO `mlv_orders` VALUES ('52', '1', '2017-03-04 18:37:06', '102.00', '4', '7', '3');
INSERT INTO `mlv_orders` VALUES ('53', '6', '2017-03-04 17:18:31', '26.00', '3', '6', '2');
INSERT INTO `mlv_orders` VALUES ('54', '10', '2017-03-04 17:55:22', '22.00', '7', '6', '3');
INSERT INTO `mlv_orders` VALUES ('55', '10', '2017-03-04 17:58:20', '37.90', '7', '8', '0');
INSERT INTO `mlv_orders` VALUES ('56', '6', '2017-03-04 18:29:53', '41.00', '3', '8', '0');
INSERT INTO `mlv_orders` VALUES ('57', '6', '2017-03-04 20:13:20', '35.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('58', '6', '2017-03-04 20:06:16', '35.00', '3', '6', '3');
INSERT INTO `mlv_orders` VALUES ('59', '15', '2017-03-04 21:35:58', '81.00', '8', '7', '3');
INSERT INTO `mlv_orders` VALUES ('60', '15', '2017-03-04 21:37:20', '73.00', '8', '7', '3');
INSERT INTO `mlv_orders` VALUES ('61', '3', '2017-03-05 04:36:31', '9.00', '10', '5', '3');
INSERT INTO `mlv_orders` VALUES ('62', '3', '2017-03-05 04:38:56', '41.00', '10', '8', '0');
INSERT INTO `mlv_orders` VALUES ('63', '3', '2017-03-05 04:53:05', '135.00', '10', '10', '1');
INSERT INTO `mlv_orders` VALUES ('64', '6', '2017-03-05 10:37:23', '70.00', '3', '10', '3');
INSERT INTO `mlv_orders` VALUES ('65', '1', '2017-03-05 10:16:59', '53.00', '4', '7', '3');
INSERT INTO `mlv_orders` VALUES ('66', '1', '2017-03-05 10:16:39', '17.00', '12', '6', '2');
INSERT INTO `mlv_orders` VALUES ('67', '6', '2017-03-05 10:38:47', '16.00', '3', '6', '3');

-- ----------------------------
-- Table structure for mlv_store
-- ----------------------------
DROP TABLE IF EXISTS `mlv_store`;
CREATE TABLE `mlv_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `name` varchar(255) NOT NULL,
  `tid` int(10) unsigned NOT NULL COMMENT '对应的mlv_goods_type的ID',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1是开店，0是休息,2是申请中，3是审核失败，4是封店',
  `pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '店铺申请成功的时间',
  `start` int(11) NOT NULL DEFAULT '0' COMMENT '营业开始时间',
  `stop` int(11) NOT NULL DEFAULT '24' COMMENT '关门时间',
  `clickNum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '餐厅的点击量',
  `address` varchar(255) NOT NULL COMMENT '餐厅的地址',
  `phone` varchar(50) NOT NULL COMMENT '餐厅的电话',
  `upsend` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '起送费',
  `peisend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送费',
  `atime` tinyint(4) NOT NULL DEFAULT '0' COMMENT '配送时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_store
-- ----------------------------
INSERT INTO `mlv_store` VALUES ('5', '3', '德州汉堡', '2', '1', 'Uploads/2016-12-03/584238ba97aab.jpg', '2017-03-06 22:40:47', '0', '24', '53', '北京市人民医院', '15920114635', '0', '0', '0');
INSERT INTO `mlv_store` VALUES ('7', '1', '京味包子铺', '1', '1', 'Uploads/2017-03-04/58ba6c69a6f38.jpg', '2017-03-05 10:44:30', '8', '20', '220', '广州市天河区科新路商业街35-36号首层', '13888888888', '35', '15', '30');
INSERT INTO `mlv_store` VALUES ('6', '6', '果度奶茶+粮山手抓饼', '6', '1', 'Uploads/2016-08-17/57b357ae5770a.jpeg', '2017-03-06 10:38:25', '8', '22', '455', '东圃珠村文华新大街三巷一号', '18320487321', '10', '5', '30');
INSERT INTO `mlv_store` VALUES ('8', '10', '杜蕾斯专卖店', '3', '1', './Uploads/2016-08-17/57b3a9c860ddb.jpg', '2017-03-05 10:42:06', '0', '24', '33', '兄弟连教育', '110', '1', '1', '0');
INSERT INTO `mlv_store` VALUES ('9', '12', '时光鸡', '1', '4', 'Uploads/2016-12-03/5842a219daa76.jpg', '2017-03-04 18:44:02', '0', '24', '0', '广州市天河区京溪路', '15920114635', '0', '0', '0');
INSERT INTO `mlv_store` VALUES ('10', '15', 'royaltea皇茶', '4', '1', 'Uploads/2017-04-20/58f7b90078cb8.jpg', '2017-03-05 10:40:16', '0', '24', '60', '广州市天河区中山大道中282号B20房', '18825894336/18899756535/18899736423', '15', '5', '30');
INSERT INTO `mlv_store` VALUES ('11', '17', '吉兆手握寿司', '1', '1', 'Uploads/2017-03-05/58baf1bcad98e.jpg', '2017-03-06 10:38:15', '0', '24', '3', '广州市天河区奥体南路12号高德汇购物中心一楼F107铺', '13858585858', '0', '0', '0');
INSERT INTO `mlv_store` VALUES ('14', '26', '麦当劳', '1', '1', 'Uploads/2017-03-05/58bb7289ec42b.jpg', '2017-03-05 10:42:01', '0', '24', '4', '东圃', '13005111111', '0', '0', '0');

-- ----------------------------
-- Table structure for mlv_store_type
-- ----------------------------
DROP TABLE IF EXISTS `mlv_store_type`;
CREATE TABLE `mlv_store_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商铺分类ID',
  `name` varchar(50) NOT NULL COMMENT '分类名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_store_type
-- ----------------------------
INSERT INTO `mlv_store_type` VALUES ('1', '美食');
INSERT INTO `mlv_store_type` VALUES ('2', '正餐优选');
INSERT INTO `mlv_store_type` VALUES ('3', '超市');
INSERT INTO `mlv_store_type` VALUES ('4', '精选小吃');
INSERT INTO `mlv_store_type` VALUES ('5', '鲜果购');
INSERT INTO `mlv_store_type` VALUES ('6', '下午茶');
INSERT INTO `mlv_store_type` VALUES ('7', 'zaoca');

-- ----------------------------
-- Table structure for mlv_user
-- ----------------------------
DROP TABLE IF EXISTS `mlv_user`;
CREATE TABLE `mlv_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` char(11) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:正常 2:禁用',
  `email` varchar(100) DEFAULT NULL,
  `businessman` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1:商户 2:普通用户',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sex` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:男 2:女',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) COMMENT '用户名的唯一索引'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_user
-- ----------------------------
INSERT INTO `mlv_user` VALUES ('1', 'wl123123', null, '$2y$10$APCsM.pyoxRMNi.gjFQ2MOv8kihp/tu1S/Fftf2nRGEiPjqYtcb82', '1', '617014283@qq.com', '1', '2017-03-04 15:29:54', '1');
INSERT INTO `mlv_user` VALUES ('2', 'yel8888', null, '$2y$10$DIjHe3nNDuOcqCObXJg2ie3HqQG04pP.HpHa.Mt0jUpEqMt4.AN0q', '1', '822828995@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('3', 'yzl123', null, '$2y$10$kvPZTpGh4FKSF42YHCVMb.6yt9zA608VRB5MI37A/cDhS8KmfBaYq', '1', '822828995@qq.com', '1', '2017-03-05 01:56:01', '1');
INSERT INTO `mlv_user` VALUES ('4', 'zzq123', null, '$2y$10$cpvOOUqcmKZi/I2wHQBBVOaZxo75eN8x.6XPfY2f74jhm8gkB8aeu', '1', '1061495484@qq.com', '2', '2017-03-04 14:48:52', '1');
INSERT INTO `mlv_user` VALUES ('5', 'qqqq', null, '$2y$10$e8AZYqf7F8.C30FkAfFmS..Yf2VZbHp5QTi/0lEomnWMeycUeJxxy', '1', '1061495484@qq.com', '2', '2017-03-05 01:54:18', '1');
INSERT INTO `mlv_user` VALUES ('6', 'yzlyzl', '13888888888', '$2y$10$HfVsOmwoCMo6zqZqHOPCbOjZaUu32DP31tEU8DXJgC3G6ylklqt.m', '1', '822828995@qq.com', '1', '2017-03-05 09:47:17', '1');
INSERT INTO `mlv_user` VALUES ('7', 'yzl321', null, '$2y$10$/PxUaMRewoMMHpC4UZrBIu25NYT58qeGEvic6Kmt0nYbIEumZIQpy', '1', '822828995@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('8', 'qqqqq', '13888888888', '$2y$10$qP2DbrkXLI8ZbAD.2QroIufqgNJxzAvqSh3P8VWmMO4IW7ss4qZwu', '1', '1061495484@qq.com', '2', '2017-03-05 09:45:06', '1');
INSERT INTO `mlv_user` VALUES ('9', 'qiang123', null, '$2y$10$mpoWA0VFn/dC2TWbNRZfkOC4qTVArIxXXRoJIa9UZnutSDPlmTKY.', '1', '1061495484@qq.com', '2', '2017-03-04 15:12:08', '1');
INSERT INTO `mlv_user` VALUES ('10', 'zhang', null, '$2y$10$lj0jh0TR7mMME3Buw4/63.0Zs9n5ittkMgR0WN5AC.TgGB1KklO8K', '1', '285749023@qq.com', '1', '2017-03-04 17:59:01', '1');
INSERT INTO `mlv_user` VALUES ('11', 'zhang123', null, '$2y$10$pAt28IW233q88m34ePSobeefzPf.q.8ng8CNWjnDTwNh/5.IKpuuO', '1', '285749023@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('12', 'zzq213', null, '$2y$10$Rm.a8.Ug1g8rULUQmRid4ecPzzDKU/awwcqUQxRt9bhVgHMen9kqG', '1', '822828995@qq.com', '1', '2017-03-04 18:43:36', '1');
INSERT INTO `mlv_user` VALUES ('13', 'qiang', null, '$2y$10$5950ioi7LcGvr97DZsJwtO8tJw.puiyLmMwNIRhuMqHxN815Af0sm', '1', '1061495484@qq.com', '2', '2017-03-04 19:43:50', '1');
INSERT INTO `mlv_user` VALUES ('14', 'qqqqqq', null, '$2y$10$kEmEc/QBhzmRMI3xYeBc6u4bRYQFYwlhLGVIHGlGrXYYkSpgDpaL2', '1', '1061495484@qq.com', '2', '2017-03-04 20:07:31', '1');
INSERT INTO `mlv_user` VALUES ('15', 'zhangzhiqiangsb', null, '$2y$10$Je7nyur.v0NccWSR4JnSSuUJcO31PPd7h4aI14xRojDY.gEv2Swxu', '1', '822828995@qq.com', '1', '2017-03-05 00:37:48', '1');
INSERT INTO `mlv_user` VALUES ('16', 'wqe123', null, '$2y$10$xGZfUW.scN2AaaxkU.Upte3kfm3VrreVVZWmjJktnxbL6Mmk4xsP.', '1', '1061495484@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('17', 'wl617014283', null, '$2y$10$bFYHXeusfQUMKonv1pQ6VOnG4luasa8pbqk6wkbXGkx.VXcJ9Fx2K', '1', '617014283@qq.com', '1', '2017-03-05 00:56:57', '1');
INSERT INTO `mlv_user` VALUES ('18', 'zhang123123', null, '$2y$10$ErypM6cf1rS7EejzG1c6beRkcjFm1hXhRlo31a7xYUFV8Vc0rF93m', '2', '1061495484@qq.com', '2', '2017-03-05 06:27:28', '1');
INSERT INTO `mlv_user` VALUES ('19', 'qqqqqqqq', '15920114635', '$2y$10$SqQIdxi7tK./wGQB7BasqOmQMCWR5ePGcUZq/wbfJiVSoiTOIOzCK', '1', '1061495484@qq.com', '1', '2017-03-05 06:55:21', '2');
INSERT INTO `mlv_user` VALUES ('20', 'aaaaaa', null, '$2y$10$84cBZHSMGOl8aUgXxcHFLOiNgol/gvKB2TbCVgJwHS70At90RJe5G', '1', '1061495484@qq.com', '2', '2017-03-05 09:13:15', '1');
INSERT INTO `mlv_user` VALUES ('21', '213213', null, '$2y$10$mSLTA8w3cfRGEnfx7blyvut1O4Su.GmIY4QqZxM0nG5WkT3Pqm376', '1', '1061495484@qq.com', '2', '2017-03-05 09:06:31', '1');
INSERT INTO `mlv_user` VALUES ('22', 'aaabbb', null, '$2y$10$XlPoe.Rjaq7XzxJa4d1NkORwlkJciO2qnrj9YaRM4AhpgrOZzDIny', '1', '617014283@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('23', '111111', null, '$2y$10$H6k1vLS/qJJVQJH2d3z.COxo283n5bvtqbaq7my6D5Vg70k/COmwK', '1', '1061495484@qq.com', '2', '2017-03-05 09:52:01', '1');
INSERT INTO `mlv_user` VALUES ('24', '12301230', null, '$2y$10$/s65UZ0TG3jEl/eZUwMFoO/ZhA.IKvEEtycDtClT5FIM0021fpbF6', '2', '1061495484@qq.com', '2', '2017-03-05 09:53:42', '1');
INSERT INTO `mlv_user` VALUES ('25', 'asdzxc', null, '$2y$10$G8/nJns5/Yc6KL3Iy8EJOu5Q0EC7wIflk2c9KHyGEM0MFVrX2Txp.', '1', '1061495484@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('26', 'asdzxcz', null, '$2y$10$UsxHQYh6FIVrlfioyHTBMuMknsQgpPXW8QOdWcM9PfJbQxEtjwEs2', '1', '1061495484@qq.com', '1', '2017-03-05 10:06:22', '1');
INSERT INTO `mlv_user` VALUES ('27', 'wwwwww', null, '$2y$10$kab1hBWJUxbV0LdQ9md93OgVSDXME0jW1T7oPce5GnV17DaRUY60q', '1', '1061495484@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('28', 'zzq12301230', null, '$2y$10$Q6eiM9iGTa.CWWaetMxjdOFKuoTGipjHlhSjhj7d.xWLOqp4SdFyS', '1', '1061495484@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('29', 'fsdajl', null, '$2y$10$QxIA9nTwTBNZC.NUiuaue.W.TJ.nyo4DOk5o6Wmz/DWmdAlgnz.5S', '1', 'gzfjfj@qq.com', '2', '0000-00-00 00:00:00', '1');
INSERT INTO `mlv_user` VALUES ('30', 'qiang123123', null, '$2y$10$EGrai0a6aLtiyjsCMx8siOmn6jzIi.8RctGUFVE7DdcyBvX5dHitS', '1', '1061495484@qq.com', '2', '2017-03-05 10:28:27', '1');

-- ----------------------------
-- Table structure for mlv_user_s
-- ----------------------------
DROP TABLE IF EXISTS `mlv_user_s`;
CREATE TABLE `mlv_user_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zid` int(11) NOT NULL,
  `token` varchar(50) NOT NULL COMMENT '帐号激活码',
  `token_exptime` int(10) NOT NULL COMMENT '激活码有效期',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mlv_user_s
-- ----------------------------
INSERT INTO `mlv_user_s` VALUES ('1', '1', '2c09baf38ae22f61e34ffac547cdd53f', '1488592501', '1');
INSERT INTO `mlv_user_s` VALUES ('2', '2', '789f4f33b165d634efb8e02bf3869a29', '1471363376', '0');
INSERT INTO `mlv_user_s` VALUES ('3', '3', 'de6d2a7b8a525cc57c6b7b2b084e103d', '1480747925', '1');
INSERT INTO `mlv_user_s` VALUES ('4', '4', 'c9a7c11406bfbf44802f1b8256af932d', '1480729270', '1');
INSERT INTO `mlv_user_s` VALUES ('5', '5', '2cbc243d1cd71b42d80a747c2104ce29', '1480731140', '1');
INSERT INTO `mlv_user_s` VALUES ('6', '6', '5e750bd3bfeb407e8f5ecb955cb122c8', '1480735319', '1');
INSERT INTO `mlv_user_s` VALUES ('7', '7', '5a3e12163872d4ba1e2f9604cf949130', '1471373924', '0');
INSERT INTO `mlv_user_s` VALUES ('8', '8', 'eee848a2d510d4d44728f0518043f787', '1480741397', '1');
INSERT INTO `mlv_user_s` VALUES ('9', '9', 'e7fc03fa2d71ee22bc646ac97cc9a1ec', '1480748263', '1');
INSERT INTO `mlv_user_s` VALUES ('10', '10', '498121f60b324adea76305e34ec82246', '1471391884', '1');
INSERT INTO `mlv_user_s` VALUES ('11', '11', 'd6d32c4fd475bdaa3eb27e05fc61476f', '1471391878', '0');
INSERT INTO `mlv_user_s` VALUES ('12', '12', '6166e4bd79f212a1771bf7264a3195ef', '1480762434', '1');
INSERT INTO `mlv_user_s` VALUES ('13', '13', '6c10c59eb8615ab18ef55e58d75f8a2a', '1480764719', '1');
INSERT INTO `mlv_user_s` VALUES ('14', '14', '61e11459fa086cc93ce199a25def9771', '1480766124', '0');
INSERT INTO `mlv_user_s` VALUES ('15', '15', '773558db9f3708d6dd1eebb8f3715eea', '1480770615', '1');
INSERT INTO `mlv_user_s` VALUES ('16', '16', '178be286b2d3d39c054d3b8339eb6b62', '1480771002', '1');
INSERT INTO `mlv_user_s` VALUES ('17', '17', '41b51c715ce0066f64275b2d4ad831dc', '1488633939', '1');
INSERT INTO `mlv_user_s` VALUES ('18', '18', '7500e38e616f92062339f57e00c87016', '1480804804', '1');
INSERT INTO `mlv_user_s` VALUES ('19', '20', '42c8123aef8c828c2f1333d48bdb8412', '1480811192', '1');
INSERT INTO `mlv_user_s` VALUES ('20', '21', '446171d91ab7d4534b75b84eedbb0092', '1480812031', '1');
INSERT INTO `mlv_user_s` VALUES ('21', '22', 'b2f646d901625ff85f198d43ee8bb53f', '1488679154', '1');
INSERT INTO `mlv_user_s` VALUES ('22', '23', '1c5cc2d710cce981fd48daa5038317f1', '1488679518', '1');
INSERT INTO `mlv_user_s` VALUES ('23', '24', '0a69500947a8d2caab4a6243d599900c', '1488678760', '1');
INSERT INTO `mlv_user_s` VALUES ('24', '25', '9ff87bdac71bae41aa274b680372aaae', '1488680379', '0');
INSERT INTO `mlv_user_s` VALUES ('25', '26', '3c31382b30165886e84c7e4b07c0ac55', '1488680408', '1');
INSERT INTO `mlv_user_s` VALUES ('26', '27', '1e4c7ad68d8f439de8931a3868ba71f4', '1488681310', '0');
INSERT INTO `mlv_user_s` VALUES ('27', '28', 'ba73ba7803a7177a1c26e71fd499863d', '1488681400', '0');
INSERT INTO `mlv_user_s` VALUES ('28', '29', '17562b65dad00a701e0217c398c17aa5', '1488681447', '0');
INSERT INTO `mlv_user_s` VALUES ('29', '30', '744fb9a6926d55ab2ebead4566f4a8ee', '1488681526', '1');

/*
Navicat MySQL Data Transfer

Source Server         : 22222
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : pf

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-05-11 21:27:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `admincode` varchar(255) DEFAULT NULL,
  `masknum` int(11) DEFAULT NULL,
  `mrank` varchar(255) DEFAULT NULL,
  `mrange` varchar(255) DEFAULT NULL,
  `isfirst` int(11) DEFAULT NULL,
  `atime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aname` (`aname`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', '100000000', '8', '1', null, '2', '12332');
INSERT INTO `admin` VALUES ('2', 'zhihang1', '67', '124400000', '5', '2', null, '2', '123');
INSERT INTO `admin` VALUES ('3', 'zhihang2', '123123', '124300000', '5', '2', null, '2', '123');
INSERT INTO `admin` VALUES ('4', 'zhihang3', '12', '136100000', '5', '2', null, '2', '312');
INSERT INTO `admin` VALUES ('5', 'wangdian1', '23230.0.0qwe123', '141200053', '0', '3', null, '2', '1231');
INSERT INTO `admin` VALUES ('6', 'wangdian2', '233', '141200031', '0', '3', null, '2', '12312');
INSERT INTO `admin` VALUES ('7', 'wangdian3', '12', '141200055', '0', '3', null, '2', '12312');
INSERT INTO `admin` VALUES ('8', '熊大', '111', '100000008', '8', '1', null, '2', '11111111');
INSERT INTO `admin` VALUES ('9', '熊二', '123', '100000000', '8', '1', null, '2', '12');
INSERT INTO `admin` VALUES ('10', '四糸乃1', '111', '124100000', '5', '2', null, '2', '2121');
INSERT INTO `admin` VALUES ('11', '大头儿子', '123', '124200000', '5', '2', null, '2', '1212');
INSERT INTO `admin` VALUES ('12', '隔壁老王', '12', '124300000', '5', '2', null, '2', '121');
INSERT INTO `admin` VALUES ('13', '沙鲁', '123', '141200000', '5', '2', null, '2', '2121212');
INSERT INTO `admin` VALUES ('14', 'JoJo', '123', '141200052', '0', '3', null, '2', '22323123');
INSERT INTO `admin` VALUES ('16', '鞍山新城1', '123123', '141200002', '0', '3', '建行鞍山新城支行片长', '2', '1493266358');
INSERT INTO `admin` VALUES ('17', '鞍山新城2', '122', '141200002', '0', '3', '建行鞍山新城支行片长', '2', '1493266616');
INSERT INTO `admin` VALUES ('18', '12', '122', '141200001', '0', '3', '1111111111', '2', '1493266980');
INSERT INTO `admin` VALUES ('19', '122', '1212', '141200011', '0', '3', '1111111111111', '1', '1493267178');
INSERT INTO `admin` VALUES ('20', '12去', '12', '141200001', '0', '3', '', '1', '1493267597');
INSERT INTO `admin` VALUES ('21', '让他', 'rt', '141200031', '0', '3', null, '1', '1493267897');
INSERT INTO `admin` VALUES ('22', '我我我我我我我哇', '12', '141200001', '0', '3', '建行鞍山曙光支行', '1', '1493269430');
INSERT INTO `admin` VALUES ('23', '12场', '1111111', '141200014', '0', '3', '建行海城支行', '1', '1493269469');
INSERT INTO `admin` VALUES ('24', '1211221', '1', '141200001', '0', '3', '巴拉巴拉', '1', '1493269485');
INSERT INTO `admin` VALUES ('25', '新城', '1', '141200002', '0', '3', '建行鞍山新城支行', '1', '1493269519');
INSERT INTO `admin` VALUES ('26', '新城1', '1', '141200002', '0', '3', '11111111111', '1', '1493269536');
INSERT INTO `admin` VALUES ('27', '1中', '12', '141200018', '0', '3', '建行海城南台支行', '1', '1493269631');
INSERT INTO `admin` VALUES ('28', '78', '8', '141200016', '0', '3', '建行海城顺城分理处', '1', '1493269783');
INSERT INTO `admin` VALUES ('29', '西塔支行', '83', '124300001', '0', '3', '建行沈阳西塔支行', '1', '1493270011');
INSERT INTO `admin` VALUES ('30', '204支行', '34', '124300017', '0', '3', '建行沈阳二0四分理处', '2', '1493270036');
INSERT INTO `admin` VALUES ('33', '啦啦11211', '11', '124100006', '0', '3', '建行沈阳中海城支行', '1', '1493277185');
INSERT INTO `admin` VALUES ('34', '把喇叭了', '123', '124300000', '5', '2', '管山东的管理员', '1', '1493277709');
INSERT INTO `admin` VALUES ('35', '支行1243管理员', '12', '124300000', '5', '2', '', '1', '1493278017');
INSERT INTO `admin` VALUES ('36', '支行1243写管理范围的管理员', '12', '124300000', '5', '2', '管理范围的内容', '1', '1493278062');
INSERT INTO `admin` VALUES ('37', '网点管理员', '12', '124100012', '0', '3', '建行沈阳建筑大学支行', '1', '1493278105');
INSERT INTO `admin` VALUES ('38', '12撒发生的', '23', '124200000', '5', '2', '', '1', '1493279271');
INSERT INTO `admin` VALUES ('39', '1去去去去', '1', '124100012', '0', '3', '建行沈阳建筑大学支行', '1', '1493279297');
INSERT INTO `admin` VALUES ('40', '在', '2', '124100013', '0', '3', '建行沈阳北三中路支行', '1', '1493279310');
INSERT INTO `admin` VALUES ('41', '12121212121', '22', '124100000', '5', '2', '', '1', '1493279543');
INSERT INTO `admin` VALUES ('42', '12呃呃呃', '12', '124100015', '0', '3', '建行沈阳沈北鑫城支行', '1', '1493279554');
INSERT INTO `admin` VALUES ('43', '沙鲁的小弟', '123', '141200059', '0', '3', '建行鞍山西水源支行', '1', '1493280493');
INSERT INTO `admin` VALUES ('44', 'zhihang2的小弟', '2323', '124300005', '0', '3', 'zhihang2的小弟的管辖范围', '1', '1493280598');
INSERT INTO `admin` VALUES ('45', '', 'qw', '124100015', '0', '3', '凄凄切切群群群群群群', '1', '1493281826');
INSERT INTO `admin` VALUES ('46', '乔巴', '11', '124100014', '0', '3', '建行沈阳上东支行', '1', '1493285578');
INSERT INTO `admin` VALUES ('47', '银河城', '12', '124100007', '0', '3', '建行沈阳银河城支行', '2', '1493353006');
INSERT INTO `admin` VALUES ('48', '23日让日', '1', '141200010', '0', '3', '2222222222', '2', '1493772653');
INSERT INTO `admin` VALUES ('49', '鞍山明达', '1', '141200004', '0', '3', '明达片长', '2', '1493778849');
INSERT INTO `admin` VALUES ('50', '11阿斯顿发', '11', '141200001', '0', '3', '建行鞍山曙光支行', '1', '1493794232');
INSERT INTO `admin` VALUES ('51', '三级轮播图', '1', '141200001', '0', '3', '建行鞍山曙光支行', '2', '1493794241');
INSERT INTO `admin` VALUES ('52', 'qaq', 'qq', '141200003', '0', '3', '新东方提款机', '2', '1493967240');
INSERT INTO `admin` VALUES ('53', 't', '1', '100000066', '8', '1', '加模板资源用的账号', '2', '1493967240');
INSERT INTO `admin` VALUES ('54', '加个支行', '1', '124400000', '5', '2', '', '1', '1494216342');
INSERT INTO `admin` VALUES ('55', '加个网点', '1', '124100010', '0', '3', '1', '2', '1494216374');
INSERT INTO `admin` VALUES ('56', '岛风111', '123', '141200000', '5', '2', '舰队', '2', '1494430527');
INSERT INTO `admin` VALUES ('57', '岛风', '123', '124200000', '5', '2', '舰队cl', '2', '1494430712');
INSERT INTO `admin` VALUES ('58', '陶瓷城', '123', '124200001', '0', '3', '陶瓷城管理员', '2', '1494430780');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  `content` text,
  `hits` int(255) DEFAULT NULL,
  `raid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('8', '1494222486', '<p>&lt;p&gt;&gt;&lt;</p>', '0', '60');
INSERT INTO `article` VALUES ('9', '1494431493', '<h1 style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">从前有座山</h1><p style=\"text-align: left;\"><span style=\"color: rgb(255, 0, 0);\">山上有个庙<img src=\"/ueditor/php/upload/image/20170510/1494431375459278.gif\" title=\"1494431375459278.gif\" alt=\"9]YCM9SVWI@RE2C6F%}3PP8.gif\"/><img src=\"http://img.baidu.com/hi/jx2/j_0072.gif\" width=\"426\" height=\"298\"/></span></p><p style=\"text-align: left;\"></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\"><br/></p><p style=\"text-align: left;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"background-color: rgb(149, 179, 215);\">庙里有个白龙马</span><br/></p>', '0', '84');
INSERT INTO `article` VALUES ('2', '1494169145', '<h1 style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;\">文章</h1><p>&nbsp;&nbsp;&nbsp;&nbsp;巴拉巴拉,现在时间2017年5月7日22:58:23;<img src=\"http://img.baidu.com/hi/tsj/t_0003.gif\"/>2017年5月8日00:38:59</p>', '0', '46');
INSERT INTO `article` VALUES ('5', '1494171455', '<p>1阿斯顿1111111111111111111111112</p>', '0', '49');
INSERT INTO `article` VALUES ('6', '1494171480', null, '0', '50');
INSERT INTO `article` VALUES ('7', '1494171519', null, '0', '51');
INSERT INTO `article` VALUES ('1', '1494164397', '<p style=\"text-align: center;\"><span style=\"font-size: 36px;\"><strong>巴拉巴拉</strong></span></p><p><span style=\"font-size: 16px;\">正文内容</span><br/></p><p><span style=\"font-size: 16px;\"></span></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326285731.jpg\" title=\"1494149326285731.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326702020.png\" title=\"1494149326702020.png\"/></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326328074.png\" title=\"1494149326328074.png\"/></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326285644.jpg\" title=\"1494149326285644.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326111383.jpg\" title=\"1494149326111383.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20170507/1494149326160594.png\" title=\"1494149326160594.png\"/></p><p style=\"text-align: right;\"><span style=\"font-size: 16px;\"><img src=\"/ueditor/php/upload/image/20170507/1494149309492283.jpg\" title=\"1494149309492283.jpg\" alt=\"@4}6FC8X@KTZD}MNP(KIXZR.jpg\"/></span><br/></p><p style=\"text-align: right;\"><span style=\"font-size: 16px;\">巴拉巴拉</span></p>', '10', '45');
INSERT INTO `article` VALUES ('10', '1494431568', '<p>啊啊啊啊啊啊啊<br/></p>', '0', '85');

-- ----------------------------
-- Table structure for bitmap
-- ----------------------------
DROP TABLE IF EXISTS `bitmap`;
CREATE TABLE `bitmap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `websiteid` int(11) DEFAULT NULL,
  `resourceid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bitmap
-- ----------------------------
INSERT INTO `bitmap` VALUES ('47', '4', '61');
INSERT INTO `bitmap` VALUES ('48', '4', '62');
INSERT INTO `bitmap` VALUES ('49', '4', '64');
INSERT INTO `bitmap` VALUES ('50', '4', '71');
INSERT INTO `bitmap` VALUES ('51', '4', '66');
INSERT INTO `bitmap` VALUES ('52', '4', '67');
INSERT INTO `bitmap` VALUES ('53', '4', '70');
INSERT INTO `bitmap` VALUES ('54', '4', '44');
INSERT INTO `bitmap` VALUES ('55', '4', '68');
INSERT INTO `bitmap` VALUES ('56', '4', '73');
INSERT INTO `bitmap` VALUES ('57', '4', '74');
INSERT INTO `bitmap` VALUES ('58', '7', '26');
INSERT INTO `bitmap` VALUES ('59', '7', '36');
INSERT INTO `bitmap` VALUES ('60', '7', '14');
INSERT INTO `bitmap` VALUES ('61', '7', '16');
INSERT INTO `bitmap` VALUES ('62', '7', '1');
INSERT INTO `bitmap` VALUES ('63', '7', '42');
INSERT INTO `bitmap` VALUES ('64', '7', '2');
INSERT INTO `bitmap` VALUES ('65', '7', '67');
INSERT INTO `bitmap` VALUES ('66', '7', '70');
INSERT INTO `bitmap` VALUES ('67', '7', '71');
INSERT INTO `bitmap` VALUES ('68', '7', '66');
INSERT INTO `bitmap` VALUES ('69', '7', '44');
INSERT INTO `bitmap` VALUES ('70', '7', '3');
INSERT INTO `bitmap` VALUES ('71', '7', '68');
INSERT INTO `bitmap` VALUES ('72', '7', '73');
INSERT INTO `bitmap` VALUES ('73', '7', '74');
INSERT INTO `bitmap` VALUES ('74', '7', '75');
INSERT INTO `bitmap` VALUES ('75', '10', '79');
INSERT INTO `bitmap` VALUES ('76', '10', '78');
INSERT INTO `bitmap` VALUES ('77', '10', '77');
INSERT INTO `bitmap` VALUES ('78', '10', '81');
INSERT INTO `bitmap` VALUES ('79', '10', '82');
INSERT INTO `bitmap` VALUES ('80', '10', '83');
INSERT INTO `bitmap` VALUES ('81', '10', '80');
INSERT INTO `bitmap` VALUES ('82', '10', '87');
INSERT INTO `bitmap` VALUES ('83', '10', '88');
INSERT INTO `bitmap` VALUES ('84', '10', '89');
INSERT INTO `bitmap` VALUES ('85', '10', '86');

-- ----------------------------
-- Table structure for client
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `isfirst` int(11) DEFAULT NULL,
  `websiteid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES ('25', 'taocicheng', null, '10');

-- ----------------------------
-- Table structure for office
-- ----------------------------
DROP TABLE IF EXISTS `office`;
CREATE TABLE `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onum` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `oname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalcode` int(255) DEFAULT NULL,
  `superior` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office
-- ----------------------------
INSERT INTO `office` VALUES ('1', '210004101', '124100001', '沈阳', '1建行沈阳天1龙支行1', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('2', '210100682', '124100002', '沈阳', '建行沈阳东北大马路支行', '7478595', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('6', '210100789', '124100006', '沈阳', '建行沈阳中海城支行', '23-233-2233233', '莆田系', '753918', null);
INSERT INTO `office` VALUES ('7', '210100790', '124100007', '沈阳', '建行沈阳银河城支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('3', '210100754', '124100003', '沈阳', '建行沈阳北一路支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('4', '210100772', '124100004', '沈阳', '建行沈阳青年大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('5', '210100780', '124100005', '沈阳', '建行沈阳白塔堡支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('8', '210100801', '124100008', '沈阳', '建行沈阳中海寰宇支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('9', '210100846', '124100009', '沈阳', '建行沈阳南京街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('10', '210102116', '124100010', '沈阳', '建行沈阳香炉山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('11', '210102469', '124100011', '沈阳', '建行沈阳中央大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('12', '210102576', '124100012', '沈阳', '建行沈阳建筑大学支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('13', '210102581', '124100013', '沈阳', '建行沈阳北三中路支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('14', '210102582', '124100014', '沈阳', '建行沈阳上东支行', '23-233-223', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('15', '210102604', '124100015', '沈阳', '建行沈阳沈北鑫城支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('16', '210103090', '124100016', '沈阳', '建行沈阳法库支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('17', '210103090', '124100017', '沈阳', '建行新民站前大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('18', '210104115', '124100018', '沈阳', '建行沈阳肇工支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('19', '210104237', '124100019', '沈阳', '建行沈阳怒江北街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('20', '210104259', '124100020', '沈阳', '建行康平支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('21', '210104304', '124100021', '沈阳', '建行沈阳胜利大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('22', '210104892', '124200001', '沈阳', '建行沈阳陶瓷城支行', '024-8574832', '陶瓷路', '753918', null);
INSERT INTO `office` VALUES ('23', '210104949', '124200002', '沈阳', '建行沈阳松山西路支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('24', '210105005', '124200003', '沈阳', '建行沈阳沙岭支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('25', '210360008', '124200004', '沈阳', '建行沈阳中山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('26', '210360041', '124200005', '沈阳', '建行沈阳富通分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('27', '210363701', '124200006', '沈阳', '建行沈阳和平北大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('28', '210370008', '124200007', '沈阳', '建行沈阳融汇支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('29', '210380008', '124200008', '沈阳', '建行沈阳和平支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('30', '210380041', '124200009', '沈阳', '建行沈阳中海支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('31', '210383701', '124200010', '沈阳', '建行沈阳和平大街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('32', '210383901', '124200011', '沈阳', '建行沈阳鲁美支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('33', '210384001', '124200012', '沈阳', '建行沈阳桂林支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('34', '210384101', '124200013', '沈阳', '建行沈阳马路湾支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('35', '210384201', '124200014', '沈阳', '建行沈阳民主分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('36', '210384401', '124200015', '沈阳', '建行沈阳北市分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('37', '210384501', '124200016', '沈阳', '建行沈阳民族分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('38', '210384601', '124200017', '沈阳', '建行沈阳大西支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('39', '210386701', '124200018', '沈阳', '建行沈阳新广支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('40', '210387001', '124300001', '沈阳', '建行沈阳西塔支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('41', '210387201', '124300002', '沈阳', '建行沈阳胜民支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('42', '210387501', '124300003', '沈阳', '建行沈阳宜春支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('43', '210387601', '124300004', '沈阳', '建行沈阳中山广场支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('44', '210387800', '124300005', '沈阳', '建行沈阳长白岛支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('45', '210390008', '124300006', '沈阳', '建行沈阳城内支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('46', '210390041', '124300007', '沈阳', '建行沈阳盛京支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('47', '210393601', '124300008', '沈阳', '建行沈阳中街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('48', '210393701', '124300009', '沈阳', '建行沈阳会合支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('49', '210393801', '124300010', '沈阳', '建行沈阳万莲支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('50', '210393901', '124300011', '沈阳', '建行沈阳沈南支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('51', '210394101', '124300012', '沈阳', '建行沈阳大南支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('52', '210394201', '124300013', '沈阳', '建行沈阳东亚分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('53', '210394301', '124300014', '沈阳', '建行沈阳轻轨支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('54', '210394401', '124300015', '沈阳', '建行沈阳五爱支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('55', '210394601', '124300016', '沈阳', '建行沈阳浑南新区产业园分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('56', '210395501', '124300017', '沈阳', '建行沈阳二0四分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('57', '210395801', '124300018', '沈阳', '建行沈阳东胜支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('58', '210396201', '124300019', '沈阳', '建行沈阳文艺路分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('59', '210396601', '124300020', '沈阳', '建行沈阳天光支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('60', '210396701', '124300021', '沈阳', '建行沈阳小西支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('61', '210396801', '124300022', '沈阳', '建行沈阳正阳支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('62', '210396901', '124400001', '沈阳', '建行沈阳彩塔支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('63', '210400008', '124400002', '沈阳', '建行沈阳铁西支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('64', '210400041', '124400003', '沈阳', '建行沈阳兴顺分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('65', '210400042', '124400004', '沈阳', '建行沈阳云峰街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('66', '210400043', '124400005', '沈阳', '建行沈阳沈辽路支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('67', '210400045', '124400006', '沈阳', '建行沈阳兴华北街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('68', '210403801', '124400007', '沈阳', '建行沈阳凌空支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('69', '210404001', '124400008', '沈阳', '建行沈阳保工支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('70', '210404201', '124400009', '沈阳', '建行沈阳滑翔支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('71', '210404301', '124400010', '沈阳', '建行沈阳经济技术开发区支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('72', '210405401', '124400011', '沈阳', '建行沈阳华兴支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('73', '210405601', '124400012', '沈阳', '建行沈阳马壮支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('74', '210405701', '124400013', '沈阳', '建行沈阳爱工支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('75', '210405801', '124400014', '沈阳', '建行沈阳十二路支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('76', '210406001', '124400015', '沈阳', '建行沈阳中联支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('77', '210406101', '124400016', '沈阳', '建行沈阳永善里支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('78', '210406301', '124400017', '沈阳', '建行沈阳顺兴分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('79', '210406701', '124400018', '沈阳', '建行沈阳启工支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('80', '210406901', '124400019', '沈阳', '建行沈阳滑凌支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('81', '210410008', '124400020', '沈阳', '建行沈阳大东支行', '23-233-22332333', '测试大街测试路测1', '753916', null);
INSERT INTO `office` VALUES ('82', '210410041', '124400021', '沈阳', '建行沈阳东站街支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('83', '210410042', '124400022', '沈阳', '建行沈阳七二四支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('176', '210100778', '141200001', '鞍山', '建行鞍山曙光支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('177', '210102250', '141200002', '鞍山', '建行鞍山新城支行', '23887878-233-2233233', '测试大街测试路试号', '753918', null);
INSERT INTO `office` VALUES ('178', '210102454', '141200003', '鞍山', '建行海城新东方支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('179', '210630041', '141200004', '鞍山', '建行鞍山明达支行', '23-233-2233233', '明达路', '753918', null);
INSERT INTO `office` VALUES ('180', '210630042', '141200005', '鞍山', '建行鞍山达道湾支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('181', '210630043', '141200006', '鞍山', '建行鞍山正和支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('182', '210630103', '141200007', '鞍山', '建行鞍山分行营业室', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('183', '210630204', '141200008', '鞍山', '建行鞍山铁东支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('184', '210630304', '141200009', '鞍山', '建行鞍山铁西支行', '23-233-2233233', '测试大街测试路测试号', '7539182', null);
INSERT INTO `office` VALUES ('185', '210630404', '141200010', '鞍山', '建行鞍山立山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('186', '210630504', '141200011', '鞍山', '建行鞍山鞍钢支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('187', '210630536', '141200012', '鞍山', '建行鞍山齐大山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('188', '210630604', '141200013', '鞍山', '建行鞍山站前支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('189', '210630703', '141200014', '鞍山', '建行海城支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('190', '210630736', '141200015', '鞍山', '建行海城西柳支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('191', '210630737', '141200016', '鞍山', '建行海城顺城分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('192', '210630738', '141200017', '鞍山', '建行海城中街分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('193', '210630739', '141200018', '鞍山', '建行海城南台支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('194', '210630740', '141200019', '鞍山', '建行海城建华支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('195', '210630742', '141200020', '鞍山', '建行海城建盛支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('196', '210630743', '141200021', '鞍山', '建行海城兴海支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('197', '210630803', '141200022', '鞍山', '建行岫岩支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('198', '210630836', '141200023', '鞍山', '建行岫岩农贸市场支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('199', '210630841', '141200024', '鞍山', '建行岫岩祥生支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('200', '210630903', '141200025', '鞍山', '建行台安支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('201', '210630936', '141200026', '鞍山', '建行台安银兴分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('202', '1', '141200027', '鞍山', '建行鞍山公园支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('203', '1', '141200028', '鞍山', '建行鞍山钢城支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('204', '1', '141200029', '鞍山', '建行鞍山灵山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('205', '1', '141200030', '鞍山', '建行鞍山大陆支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('206', '1', '141200031', '鞍山', '建行鞍山高新技术产业开发区支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('207', '1', '141200032', '鞍山', '建行鞍山千山支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('208', '1', '141200033', '鞍山', '建行鞍山太平支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('209', '1', '141200034', '鞍山', '建行鞍山四隆广场支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('210', '1', '141200035', '鞍山', '建行鞍山腾鳌支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('211', '1', '141200036', '鞍山', '建行鞍山钢强支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('212', '1', '141200037', '鞍山', '建行鞍山解放支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('213', '1', '141200038', '鞍山', '建行鞍山建昌支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('214', '1', '141200039', '鞍山', '建行鞍山双山分理处', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('215', '1', '141200040', '鞍山', '建行鞍山光明支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('216', '1', '141200041', '鞍山', '建行鞍山长甸支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('217', '1', '141200042', '鞍山', '建行鞍山兴盛支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('218', '1', '141200043', '鞍山', '建行鞍山爱民支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('219', '1', '141200044', '鞍山', '建行鞍山兴华支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('220', '1', '141200045', '鞍山', '建行鞍山新区支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('221', '1', '141200046', '鞍山', '建行鞍山自由支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('222', '1', '141200047', '鞍山', '建行鞍山乐民支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('223', '1', '141200048', '鞍山', '建行鞍山傢俬城支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('224', '11', '141200049', '鞍山', '建行鞍山卫钢支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('225', '1', '141200050', '鞍山', '建行鞍山对炉支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('226', '1', '141200051', '鞍山', '建行鞍山金华支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('227', '1', '141200052', '鞍山', '建行鞍山湖南支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('228', '1', '141200053', '鞍山', '建行鞍山立山公园支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('229', '1', '141200054', '鞍山', '建行鞍山新华支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('230', '1', '141200055', '鞍山', '建行鞍山和平支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('231', '1', '141200056', '鞍山', '建行鞍山红光支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('232', '1', '141200057', '鞍山', '建行鞍山虹桥支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('233', '1', '141200058', '鞍山', '建行鞍山八区支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('234', '1', '141200059', '鞍山', '建行鞍山西水源支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('235', '1', '141200060', '鞍山', '建行鞍山繁荣支行', '23-233-2233233', '测试大街测试路测试号', '753918', null);
INSERT INTO `office` VALUES ('236', '210639500', '141200061', '鞍山', '建行鞍山胜利支行', '86-0412-634223', '胜利南路85号“大德●金典世家”小区网点7-网点8', '114000', null);

-- ----------------------------
-- Table structure for resource
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `rid` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `adminid` int(11) DEFAULT NULL,
  `isaudit` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `rcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES ('1', null, '按钮1', '/ht/resource/button/1.png', '1', '1', '1', '1', '100000000');
INSERT INTO `resource` VALUES ('2', null, '按钮2', '/ht/resource/button/2.png', '10', '1', '12', '1', '124100000');
INSERT INTO `resource` VALUES ('3', null, '按钮3', '/ht/resource/button/3.png', '52', '1', '22', '1', '141200003');
INSERT INTO `resource` VALUES ('4', null, '按钮4', '/ht/resource/button/4.png', null, '1', '4', '1', null);
INSERT INTO `resource` VALUES ('5', null, '按钮5', '/ht/resource/button/5.png', null, '2', '11', '1', null);
INSERT INTO `resource` VALUES ('6', null, '按钮6', '/ht/resource/button/6.png', null, '2', '12', '1', null);
INSERT INTO `resource` VALUES ('7', null, '按钮7', '/ht/resource/button/7.png', null, '1', '13', '1', null);
INSERT INTO `resource` VALUES ('8', null, '按钮8', '/ht/resource/button/8.png', null, '1', '14', '1', null);
INSERT INTO `resource` VALUES ('9', null, '按钮9', '/ht/resource/button/9.png', null, '2', '21', '1', null);
INSERT INTO `resource` VALUES ('10', null, '按钮10', '/ht/resource/button/10.png', null, '1', '22', '1', null);
INSERT INTO `resource` VALUES ('11', null, '按钮11', '/ht/resource/button/11.png', null, '1', '23', '1', null);
INSERT INTO `resource` VALUES ('12', null, '按钮12', '/ht/resource/button/12.png', null, '2', '24', '1', null);
INSERT INTO `resource` VALUES ('13', 'www.lunbotu.c', '轮播图11', '/ht/resource/slideshow/590c4d445f2ba.jpg', '1', '1', '1', '2', '100000000');
INSERT INTO `resource` VALUES ('14', 'www.lunbotu.com', '轮播图2', '/ht/resource/slideshow/2.png', '10', '1', '2', '2', '124100000');
INSERT INTO `resource` VALUES ('90', 'www.daofengenico.com', '岛风的nico', '/ht/resource/slideshow/5913d60aaed2f.jpg', '57', '1', '15', '2', '124200000');
INSERT INTO `resource` VALUES ('16', 'www.lunbotu.com', '轮播图4', '/ht/resource/slideshow/4.png', '12', '1', '4', '2', '124300000');
INSERT INTO `resource` VALUES ('41', '123', '哇啦哇啦', '/ht/resource/slideshow/590c4e138f3ad.jpg', '13', '2', '11', '2', '141200000');
INSERT INTO `resource` VALUES ('18', 'www.lunbotu.com', '轮播图6', '/ht/resource/slideshow/6.png', '42', '1', '12', '2', '124100015');
INSERT INTO `resource` VALUES ('20', 'www.lunbotu.com1', '轮播图8', '/ht/resource/slideshow/8.png', '51', '1', '74', '2', '141200001');
INSERT INTO `resource` VALUES ('21', null, '轮播图9', '/ht/resource/slideshow/9.png', '48', '1', '21', '2', '141200010');
INSERT INTO `resource` VALUES ('22', null, '轮播图10', '/ht/resource/slideshow/10.png', '49', '1', '22', '2', '141200004');
INSERT INTO `resource` VALUES ('23', null, '轮播图11', '/ht/resource/slideshow/11.png', null, '2', '23', '2', null);
INSERT INTO `resource` VALUES ('24', null, '轮播图12', '/ht/resource/slideshow/12.png', null, '2', '24', '2', null);
INSERT INTO `resource` VALUES ('25', null, '默认按钮', '/ht/resource/button/defalut.png', null, '2', '1', '1', null);
INSERT INTO `resource` VALUES ('26', 'www.lunbotu.com', '默认轮播图', '/ht/resource/slideshow/default.png', '1', '1', '1', '2', '100000000');
INSERT INTO `resource` VALUES ('34', 'www.lunbot2u.com', '轮播图122', '/ht/resource/slideshow/590bd3d65e308.jpg', null, null, null, null, null);
INSERT INTO `resource` VALUES ('29', '123', '跳转', '/ht/resource/slideshow/590a9705d6de5.jpg', '13', '2', '15', '2', '141200000');
INSERT INTO `resource` VALUES ('40', '2222222222', '2222222222222', '/ht/resource/slideshow/590c4ce8ab86e.jpg', '52', '2', '21', '2', '141200003');
INSERT INTO `resource` VALUES ('28', '1111', '支行的轮播', '/ht/resource/slideshow/590a961718c43.jpg', '13', '2', '15', '2', '141200000');
INSERT INTO `resource` VALUES ('30', '各个', '最后测试一下', '/ht/resource/slideshow/590a9789da2d3.jpg', '13', '2', '14', '2', '141200000');
INSERT INTO `resource` VALUES ('33', '75', '5', '/ht/resource/slideshow/590ae4bc606fa.jpg', '13', '2', '15', '2', '141200000');
INSERT INTO `resource` VALUES ('35', 'www.admin.com', 'admin创建的', '/ht/resource/slideshow/590be4d538116.jpeg', '1', '1', '3', '2', '100000000');
INSERT INTO `resource` VALUES ('36', 'www.god.coom', 'god', '/ht/resource/slideshow/590be5475ec58.jpeg', '1', '1', '1', '2', '100000000');
INSERT INTO `resource` VALUES ('37', '巴拉巴拉3', '新东方3', '/ht/resource/slideshow/590c2217ecbb7.jpg', '52', '1', '24', '2', '141200003');
INSERT INTO `resource` VALUES ('42', 'www.list.com1', 'admin添加的按钮', '/ht/resource/button/590ede4880a1e.gif', '1', '1', '1', '1', '100000000');
INSERT INTO `resource` VALUES ('45', 'www.wenzhang.com1', '沙鲁的文章1', '/ht/resource/article/590ef09e63f09.jpg', '13', '1', '19', '3', '141200000');
INSERT INTO `resource` VALUES ('44', 'www.sanjilunbotu.com', '三级轮播图的按钮', '/ht/resource/button/590ee0ad487df.jpg', '51', '1', '22', '1', '141200001');
INSERT INTO `resource` VALUES ('46', 'www.article.com', 'admin2017年5月8日00:38:51修改的文章', '/ht/resource/article/590f36393a3c4.jpg', '1', '1', '3', '3', '100000000');
INSERT INTO `resource` VALUES ('52', '1', 'xqlt9b1', '/ht/resource/button/590fef814184f.png', '53', '1', '1', '1', '100000066');
INSERT INTO `resource` VALUES ('53', '2', 'xqlt9b2', '/ht/resource/button/590ff03934b50.png', '53', '1', '2', '1', '100000066');
INSERT INTO `resource` VALUES ('54', '3', 'xqlt9b3', '/ht/resource/button/590ff060d105c.png', '53', '1', '3', '1', '100000066');
INSERT INTO `resource` VALUES ('49', '', '凑数用的', '/ht/resource/article/590f3f3f8f3b4.jpg', '1', '1', '1', '3', '100000000');
INSERT INTO `resource` VALUES ('50', '', '凑数用的2', '/ht/resource/article/590f3f585f3cf.jpg', '1', '1', '1', '3', '100000000');
INSERT INTO `resource` VALUES ('51', '', '凑数用的3', '/ht/resource/article/590f3f7f6e6e9.jpg', '1', '1', '1', '3', '100000000');
INSERT INTO `resource` VALUES ('55', '4', 'xqlt9b4', '/ht/resource/button/590ff0a997eee.png', '53', '1', '4', '1', '100000066');
INSERT INTO `resource` VALUES ('56', '5', 'xqlt9b5', '/ht/resource/button/590ff117a9185.png', '53', '1', '5', '1', '100000066');
INSERT INTO `resource` VALUES ('57', '6', 'xqlt9b6', '/ht/resource/button/590ff14b960b7.png', '53', '1', '6', '1', '100000066');
INSERT INTO `resource` VALUES ('58', '7', 'xqlt9b7', '/ht/resource/button/590ff16edc9b1.png', '53', '1', '7', '1', '100000066');
INSERT INTO `resource` VALUES ('59', '8', 'xqlt9b8', '/ht/resource/button/590ff1cd7c455.png', '53', '1', '8', '1', '100000066');
INSERT INTO `resource` VALUES ('60', '巴拉巴拉', 'qaq的文章', '/ht/resource/article/59100695f2c17.png', '52', '2', '34', '3', '141200003');
INSERT INTO `resource` VALUES ('61', 'www.baidutama.com', '三级轮播图的轮播图`1', '/ht/resource/slideshow/591226e02f030.gif', '51', '1', '21', '2', '141200001');
INSERT INTO `resource` VALUES ('62', 'www.baidu.com', '三轮2', '/ht/resource/slideshow/591228192632c.jpg', '51', '1', '22', '2', '141200001');
INSERT INTO `resource` VALUES ('63', 'www.baidu.com', '三轮3', '/ht/resource/slideshow/59122864a6734.jpg', '51', '1', '23', '2', '141200001');
INSERT INTO `resource` VALUES ('64', 'www.baidu.com', '三轮4', '/ht/resource/slideshow/591228dd2739f.jpg', '51', '1', '55', '2', '141200001');
INSERT INTO `resource` VALUES ('65', 'www.baidu.com', '三轮5', '/ht/resource/slideshow/591228f9e2a3c.jpg', '51', '2', '45', '2', '141200001');
INSERT INTO `resource` VALUES ('66', 'www.baidu.com1', '三轮按钮1', '/ht/resource/button/59122a1b9eaa0.jpg', '51', '1', '21', '1', '141200001');
INSERT INTO `resource` VALUES ('67', 'www.baidu.com', '三轮按钮2', '/ht/resource/button/59122a390a261.jpg', '51', '1', '21', '1', '141200001');
INSERT INTO `resource` VALUES ('68', 'www.baidu.com', '三轮按钮3', '/ht/resource/button/59122a53449ee.jpg', '51', '1', '23', '1', '141200001');
INSERT INTO `resource` VALUES ('69', 'www.baidu.com', '三轮按钮4', '/ht/resource/button/59122d735335e.jpg', '51', '2', '21', '1', '141200001');
INSERT INTO `resource` VALUES ('70', 'www.baidu.com', '三轮按钮5', '/ht/resource/button/59122d8c8dab2.jpg', '51', '1', '21', '1', '141200001');
INSERT INTO `resource` VALUES ('71', 'www.baidu.com', '三轮按钮6', '/ht/resource/button/59122dab6c687.gif', '51', '1', '21', '1', '141200001');
INSERT INTO `resource` VALUES ('72', 'www.baidu.com', '三轮按钮7', '/ht/resource/button/59122dc4c0bf1.jpg', '51', '2', '25', '1', '141200001');
INSERT INTO `resource` VALUES ('73', ' www.baidu.com', '三轮按钮8', '/ht/resource/button/59122ddbcbcf7.gif', '51', '1', '24', '1', '141200001');
INSERT INTO `resource` VALUES ('74', 'www.baidu.com', '三轮按钮9', '/ht/resource/button/59122df6eda2f.gif', '51', '1', '29', '1', '141200001');
INSERT INTO `resource` VALUES ('75', 'www.baidu.com', '三轮按钮10', '/ht/resource/button/59122e1488bb4.jpg', '51', '1', '54', '1', '141200001');
INSERT INTO `resource` VALUES ('76', 'www.baidu.com1', '沙鲁的测试按钮', '/ht/resource/button/59122ee22936c.jpg', '13', '2', '15', '1', '141200000');
INSERT INTO `resource` VALUES ('77', 'www.baidu.com', '陶瓷城图1', '/ht/resource/slideshow/591334f9808e1.gif', '58', '1', '98', '2', '124200001');
INSERT INTO `resource` VALUES ('78', 'www.chuzu.com', '陶瓷城出租', '/ht/resource/slideshow/5913352d43441.jpg', '58', '1', '98', '2', '124200001');
INSERT INTO `resource` VALUES ('79', 'www.chushou.com', '陶瓷城出售', '/ht/resource/slideshow/591335579b810.gif', '58', '1', '50', '2', '124200001');
INSERT INTO `resource` VALUES ('80', 'www.up.com', '上', '/ht/resource/button/591335dc28e65.jpg', '58', '1', '45', '1', '124200001');
INSERT INTO `resource` VALUES ('81', '11111111', '1', '/ht/resource/button/591335f623672.jpg', '58', '1', '22', '1', '124200001');
INSERT INTO `resource` VALUES ('82', '222222', '2', '/ht/resource/button/5913360888fa8.jpg', '58', '1', '22', '1', '124200001');
INSERT INTO `resource` VALUES ('83', '33333', '3', '/ht/resource/button/59133619ecd4b.gif', '58', '1', '33', '1', '124200001');
INSERT INTO `resource` VALUES ('84', 'www.balabali.com', '陶瓷城的文章', '/ht/resource/article/591337052d891.jpg', '58', '1', '27', '3', '124200001');
INSERT INTO `resource` VALUES ('85', 'www.coushu.com', '凑数的', '/ht/resource/article/59133750ac911.jpg', '58', '2', '21', '3', '124200001');
INSERT INTO `resource` VALUES ('86', '77', '67', '/ht/resource/button/5913385bcfca8.jpg', '58', '1', '77', '1', '124200001');
INSERT INTO `resource` VALUES ('87', '77', '77', '/ht/resource/button/59133867d97b1.gif', '58', '1', '77', '1', '124200001');
INSERT INTO `resource` VALUES ('88', '7', '77777', '/ht/resource/button/591338772d934.jpg', '58', '1', '77', '1', '124200001');
INSERT INTO `resource` VALUES ('89', '7777777', '777777777', '/ht/resource/button/5913388da4c92.gif', '58', '1', '77', '1', '124200001');
INSERT INTO `resource` VALUES ('91', 'www.buyaodian.com', '不要点', '/ht/resource/slideshow/591460eea798a.jpg', '1', '1', '8', '2', '100000000');

-- ----------------------------
-- Table structure for template
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(255) DEFAULT NULL,
  `buttonnum` int(11) DEFAULT NULL,
  `slideshownum` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `thtmlurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('1', '春', '9', '3', '/ht/timg/thumbnail/1.jpg', null);
INSERT INTO `template` VALUES ('2', '夏', '12', '4', '/ht/timg/thumbnail/2.jpg', null);
INSERT INTO `template` VALUES ('3', '秋', '7', '5', '/ht/timg/thumbnail/3.jpg', null);
INSERT INTO `template` VALUES ('4', '冬', '8', '6', '/ht/timg/thumbnail/4.jpg', null);
INSERT INTO `template` VALUES ('5', '东', '9', '7', '/ht/timg/thumbnail/5.jpg', null);
INSERT INTO `template` VALUES ('6', '南', '10', '8', '/ht/timg/thumbnail/6.jpg', null);
INSERT INTO `template` VALUES ('7', '西', '3', '9', '/ht/timg/thumbnail/7.jpg', null);
INSERT INTO `template` VALUES ('8', '北', '7', '2', '/ht/timg/thumbnail/8.jpg', null);
INSERT INTO `template` VALUES ('9', '测试模板', '8', '3', '/ht/timg/thumbnail/8.jpg', null);

-- ----------------------------
-- Table structure for website
-- ----------------------------
DROP TABLE IF EXISTS `website`;
CREATE TABLE `website` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `officeid` int(11) DEFAULT NULL,
  `templateid` int(11) DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of website
-- ----------------------------
INSERT INTO `website` VALUES ('0', '别动这个条数据谢谢', '9997', '9');
INSERT INTO `website` VALUES ('7', '服务器地址/wid/7', '2', '2');
INSERT INTO `website` VALUES ('4', '服务器地址/wid/4', '176', '9');
INSERT INTO `website` VALUES ('10', '服务器地址/wid/10', '22', '9');

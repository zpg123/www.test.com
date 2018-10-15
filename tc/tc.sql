-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 10 月 15 日 09:52
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tc`
--

-- --------------------------------------------------------

--
-- 表的结构 `my_about`
--

CREATE TABLE IF NOT EXISTS `my_about` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `typename` char(25) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` smallint(3) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `dir_type` tinyint(1) NOT NULL,
  `dir_typename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_about`
--

INSERT INTO `my_about` (`id`, `typename`, `content`, `displayorder`, `pubdate`, `dir_type`, `dir_typename`) VALUES
(1, '网站简介', '<p>\r\n	mymps（蚂蚁分类信息/地方门户系统）是一款基于php mysql的建站系统.为在各种服务器上架设分类信息以及地方门户网站提供完美的解决方案。 mymps,整站生成静态，拥有世界一流的用户体验，卓越的访问速度和负载能力。\r\n</p>\r\n<p>\r\n	mymps(php分类信息系统/php地方门户系统)能让你在最短的时间架设一个专业的分类信息/地方门户网站，是一款专注分类信息领域的CMS内容管理系统，能以最低的成本，最少的人力投入，在最短的时间内架设一个功能齐全，性能优异规模庞大并且易于维护的网站平台。\r\n</p>\r\n<p>\r\n	客户指导技术、技术服从于客户需要 <br />\r\n	做客户切身需要的网站系统是我们所倡导和坚持的一贯原则 <br />\r\n	我们在系统开发上遵循人性化设计、实用、创新、力求完美\r\n</p>', 1, 0, 2, 'wangzhanjianjie'),
(2, '广告服务', '在这里填写广告服务，填写完成后保存提交即可', 2, 1263483208, 4, 'advertisement'),
(3, '联系我们', '在这里填写联系方式，填写完成后保存提交即可', 3, 1259399384, 4, 'contactus');

-- --------------------------------------------------------

--
-- 表的结构 `my_admin`
--

CREATE TABLE IF NOT EXISTS `my_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` char(30) NOT NULL DEFAULT '',
  `pwd` char(32) NOT NULL DEFAULT '',
  `uname` char(20) NOT NULL DEFAULT '',
  `tname` char(30) NOT NULL DEFAULT '',
  `email` char(30) NOT NULL DEFAULT '',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_admin`
--

INSERT INTO `my_admin` (`id`, `userid`, `pwd`, `uname`, `tname`, `email`, `typeid`, `logintime`, `loginip`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '', 'cxcx@cccc.bn', 1, 1539565993, 'unknown');

-- --------------------------------------------------------

--
-- 表的结构 `my_admin_record_action`
--

CREATE TABLE IF NOT EXISTS `my_admin_record_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` char(30) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `my_admin_record_action`
--

INSERT INTO `my_admin_record_action` (`id`, `adminid`, `pubdate`, `ip`, `action`) VALUES
(1, 'admin', 1539219593, 'unknown', '成功启用该插件！'),
(2, 'admin', 1539234430, 'unknown', '18815539872的用户信息修改成功'),
(3, 'admin', 1539234649, 'unknown', '添加会员 <b>sj18815539872</b> 成功'),
(4, 'admin', 1539235636, 'unknown', '信息分类更新成功！'),
(5, 'admin', 1539235690, 'unknown', '信息分类更新成功！'),
(6, 'admin', 1539237531, 'unknown', '分类信息删除成功！'),
(7, 'admin', 1539237827, 'unknown', '分类信息删除成功！'),
(8, 'admin', 1539238087, 'unknown', '分类信息删除成功！'),
(9, 'admin', 1539238808, 'unknown', '分类信息删除成功！'),
(10, 'admin', 1539241205, 'unknown', '芜湖阿威教育培训公司的用户信息修改成功'),
(11, 'admin', 1539241298, 'unknown', '成功更新广告设置！'),
(12, 'admin', 1539242967, 'unknown', '插件配置更新成功！<br />若未出现插件的管理菜单，请F5刷新浏览器'),
(13, 'admin', 1539243440, 'unknown', '成功上传或更新 网站首页 幻灯片!'),
(14, 'admin', 1539243468, 'unknown', '成功上传或更新 网站首页 幻灯片!'),
(15, 'admin', 1539243494, 'unknown', '成功上传或更新 网站首页 幻灯片!'),
(16, 'admin', 1539243532, 'unknown', '成功上传或更新 网站首页 幻灯片!'),
(17, 'admin', 1539243580, 'unknown', '信息分类更新成功！'),
(18, 'admin', 1539244017, 'unknown', '成功更新广告设置！'),
(19, 'admin', 1539245558, 'unknown', '成功增加一篇公告 <<请勿发布虚假信息，违者封号处理！谢谢配合！>>'),
(20, 'admin', 1539246041, 'unknown', '成功修改公告 <<请勿发布虚假信息，违者封号处理！谢谢配合！>>'),
(21, 'admin', 1539246155, 'unknown', '成功上传或更新 新闻首页 幻灯片!'),
(22, 'admin', 1539246287, 'unknown', '成功上传或更新 新闻首页 幻灯片!'),
(23, 'admin', 1539246314, 'unknown', '成功上传或更新 新闻首页 幻灯片!'),
(24, 'admin', 1539304914, 'unknown', '信息分类更新成功！');

-- --------------------------------------------------------

--
-- 表的结构 `my_admin_record_login`
--

CREATE TABLE IF NOT EXISTS `my_admin_record_login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminid` char(32) NOT NULL,
  `adminpwd` char(30) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `result` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `my_admin_record_login`
--

INSERT INTO `my_admin_record_login` (`id`, `adminid`, `adminpwd`, `pubdate`, `ip`, `result`) VALUES
(1, 'admin', '123456', 1539155898, 'unknown', 0),
(2, 'admin', '123456', 1539155921, 'unknown', 0),
(3, 'admin', '123456', 1539155944, 'unknown', 0),
(4, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539156043, 'unknown', 1),
(5, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539156896, 'unknown', 1),
(6, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539218675, 'unknown', 1),
(7, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539234340, 'unknown', 1),
(8, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539236515, 'unknown', 1),
(9, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539236921, 'unknown', 1),
(10, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539248536, 'unknown', 1),
(11, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539304292, 'unknown', 1),
(12, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539312110, 'unknown', 1),
(13, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539313273, 'unknown', 1),
(14, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539314269, 'unknown', 1),
(15, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539316593, 'unknown', 1),
(16, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317635, 'unknown', 1),
(17, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317636, 'unknown', 1),
(18, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317636, 'unknown', 1),
(19, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317637, 'unknown', 1),
(20, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317638, 'unknown', 1),
(21, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539317929, 'unknown', 1),
(22, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539320549, 'unknown', 1),
(23, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539563735, 'unknown', 1),
(24, 'admin', 'e10adc3949ba59abbe56e057f20f88', 1539565993, 'unknown', 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_admin_type`
--

CREATE TABLE IF NOT EXISTS `my_admin_type` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL,
  `ifsystem` tinyint(1) NOT NULL,
  `purviews` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_admin_type`
--

INSERT INTO `my_admin_type` (`id`, `typename`, `ifsystem`, `purviews`) VALUES
(1, '超级管理员', 1, 'purview_幻灯片列表,purview_上传幻灯片,purview_栏目设置,purview_已发布公告,purview_发布公告,purview_问题帮助,purview_发布帮助主题,purview_友情链接,purview_增加链接,purview_链接导航,purview_生活百宝箱,purview_便民电话,purview_分类信息,purview_删除重复,purview_批量管理,purview_信息评论,purview_信息举报,purview_模型管理,purview_字段管理,purview_网站会员,purview_审核会员,purview_增加会员,purview_会员组,purview_实名认证,purview_会员文档,purview_站内短消息,purview_模板点评,purview_会员登录记录,purview_会员支付记录,purview_会员消费记录,purview_信息分类,purview_添加分类,purview_地区分类,purview_增加地区,purview_商家分类,purview_增加分类,purview_用户列表,purview_用户组,purview_管理记录,purview_数据库备份,purview_数据库还原,purview_数据库维护,purview_系统配置,purview_模板管理,purview_SEO伪静态,purview_验证过滤点评,purview_积分信用等级,purview_缓存设置,purview_系统优化,purview_文字内链设置,purview_附件管理,purview_手机访问设置,purview_已安装插件,purview_新闻管理,purview_新闻类别,purview_新闻评论,purview_商品分类,purview_商品管理,purview_订单管理,purview_邮件服务器,purview_邮件模板,purview_邮件发送记录,purview_短信接口,purview_短信发送记录,purview_管理支付接口,purview_管理广告位,purview_数据调用,purview_第三方账号整合');

-- --------------------------------------------------------

--
-- 表的结构 `my_advertisement`
--

CREATE TABLE IF NOT EXISTS `my_advertisement` (
  `advid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `targets` mediumtext NOT NULL,
  `parameters` mediumtext NOT NULL,
  `code` mediumtext NOT NULL,
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`advid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `my_advertisement`
--

INSERT INTO `my_advertisement` (`advid`, `available`, `type`, `displayorder`, `title`, `targets`, `parameters`, `code`, `starttime`, `endtime`) VALUES
(9, 0, 'couplead', 6, '对联广告', 'index', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:31:"/attachment/ggg/couplefloat.jpg";s:4:"link";s:1:"#";s:5:"width";s:0:"";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:787:"theFloaters.addItem(''coupleAdL'',6,0,''<div style="position: absolute; left: 6px; top: 42px;"><a href=\\"#\\" target=\\"_blank\\"><img src=\\"/attachment/ggg/couplefloat.jpg\\" border=\\"0\\"></a><br /><span style=\\"text-align:left; display:block; width:30px\\"><a href=\\"javascript:void();\\" onMouseOver=\\"this.style.cursor=\\''pointer\\''\\" onClick=\\"closeBanner();\\">关闭</a></span></div>'');theFloaters.addItem(''coupleAdR'',''document.body.clientWidth-6'',0,''<div style="position: absolute; right: 6px; top: 42px;"><a href=\\"#\\" target=\\"_blank\\"><img src=\\"/attachment/ggg/couplefloat.jpg\\" border=\\"0\\"></a><br /><span style=\\"text-align:left; display:block; width:30px\\"><a href=\\"javascript:void();\\" onMouseOver=\\"this.style.cursor=\\''pointer\\''\\" onClick=\\"closeBanner();\\">关闭</a></span></div>'');";s:8:"position";N;s:12:"displayorder";s:0:"";}', 'theFloaters.addItem(''coupleAdL'',6,0,''<div style="position: absolute; left: 6px; top: 42px;"><a href=\\"#\\" target=\\"_blank\\"><img src=\\"/attachment/ggg/couplefloat.jpg\\" border=\\"0\\"></a><br /><span style=\\"text-align:left; display:block; width:30px\\"><a href=\\"javascript:void();\\" onMouseOver=\\"this.style.cursor=\\''pointer\\''\\" onClick=\\"closeBanner();\\">关闭</a></span></div>'');theFloaters.addItem(''coupleAdR'',''document.body.clientWidth-6'',0,''<div style="position: absolute; right: 6px; top: 42px;"><a href=\\"#\\" target=\\"_blank\\"><img src=\\"/attachment/ggg/couplefloat.jpg\\" border=\\"0\\"></a><br /><span style=\\"text-align:left; display:block; width:30px\\"><a href=\\"javascript:void();\\" onMouseOver=\\"this.style.cursor=\\''pointer\\''\\" onClick=\\"closeBanner();\\">关闭</a></span></div>'');', 1159632000, 0),
(12, 0, 'footerbanner', 31, '尾部通栏广告', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:29:"/attachment/ggg/topbanner.png";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:4:"1200";s:6:"height";s:2:"40";s:3:"alt";s:0:"";s:4:"html";s:140:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/topbanner.png" height="40" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/topbanner.png" height="40" width="1200" border="0"></a>', 0, 0),
(14, 0, 'infoad', 41, '信息页内广告', '41	42	43	45	46	47	48	49	50	11	12	13	14	15	16	17	18	19	20	21	22	23	24	25	26	27	28	29	30	31	32	33	34	35	36	37	38	39	40	51	52	53	54	55	56	57	58	59	60	61	62	63	64	65	66	67	68	69	70	71	72	73	74	75	76	77	78	79	80	81	82	83	84	85	86	87	88	89	90	91	92	93	94	95	96	97	98	99	100	101	102	103	104	105	106	107	108	109	110	111	112	113	114	115	116	117	118	119	120	121	122	123	124	125	126	127	128	129	130	131	132	133	134	135	136	137	138	139	140	141	142	143	144	145	146	147', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:24:"/attachment/ggg/ggad.gif";s:4:"link";s:1:"#";s:5:"width";s:0:"";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:79:"<a href="#" target="_blank"><img src="/attachment/ggg/ggad.gif" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/ggad.gif" border="0"></a>', 0, 0),
(55, 0, 'infoad', 0, '信息页内广告2', '3	41	42	43	45	46	47	48	49	50	1	11	148	149	150	151	152	153	154	155	156	157	158	159	12	13	14	169	170	171	172	173	15	16	160	161	162	163	164	165	166	167	168	17	18	19	20	21	22	23	24	25	26	27	2	28	29	30	31	32	33	34	35	36	37	38	39	40	4	51	52	53	174	175	176	177	178	179	180	181	182	183	184	185	186	187	188	54	55	56	57	58	59	60	61	62	63	64	65	66	67	5	68	69	70	71	72	73	74	6	75	76	77	78	79	80	81	82	83	84	85	86	87	88	89	7	90	91	92	93	94	8	95	96	97	98	99	9	100	101	102	103	104	105	106	107	108	109	110	111	112	113	114	115	116	117	118	119	120	121	122	123	124	125	126	127	128	129	130	131	132	133	134	135	136	10	137	138	139	140	141	142	143	144	145	146	147', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:27:"/attachment/ggg/acenter.jpg";s:4:"link";s:1:"#";s:5:"width";s:0:"";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:82:"<a href="#" target="_blank"><img src="/attachment/ggg/acenter.jpg" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/acenter.jpg" border="0"></a>', 0, 0),
(57, 0, 'indexcatad', 0, '首页分类间广告4', '4', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:30:"/attachment/ggg/topbanner1.png";s:4:"link";s:1:"#";s:5:"width";s:4:"1200";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:98:"<a href="#" target="_blank"><img src="/attachment/ggg/topbanner1.png" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/topbanner1.png" width="1200" border="0"></a>', 0, 0),
(16, 0, 'normalad', 61, '自定义广告', '', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:28:"<img src="/images/logo.gif">";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<img src="/images/logo.gif">', 1263312000, 1263484800),
(21, 0, 'indexcatad', 81, '求职首页分类间', '6', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:30:"/attachment/ggg/topbanner2.gif";s:4:"link";s:1:"#";s:5:"width";s:4:"1200";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:98:"<a href="#" target="_blank"><img src="/attachment/ggg/topbanner2.gif" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/topbanner2.gif" width="1200" border="0"></a>', 0, 0),
(22, 1, 'intercatad', 11, '栏目侧边页广告', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:82:"<a href="#" target="_blank"><img src="/attachment/ggg/160x600.gif" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/160x600.gif" border="0"></a>', 0, 0),
(25, 0, 'normalad', 5, '自定义广告', '', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:10:"自定义广告";s:8:"position";N;s:12:"displayorder";s:0:"";}', '自定义广告', 0, 0),
(23, 0, 'indexcatad', 82, '商务首页分类间', '189', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:29:"/attachment/ggg/topbanner.png";s:4:"link";s:1:"#";s:5:"width";s:4:"1200";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:97:"<a href="#" target="_blank"><img src="/attachment/ggg/topbanner.png" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/topbanner.png" width="1200" border="0"></a>', 0, 0),
(24, 0, 'intercatad', 15, '栏目侧边广告3', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:31:"/attachment/ggg/intercatad2.jpg";s:4:"link";s:1:"#";s:5:"width";s:3:"160";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:98:"<a href="#" target="_blank"><img src="/attachment/ggg/intercatad2.jpg" width="160" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/intercatad2.jpg" width="160" border="0"></a>', 0, 0),
(56, 0, 'topbanner', 0, '顶部横幅广告2', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:29:"/attachment/ggg/topbanner.gif";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:4:"1200";s:6:"height";s:2:"40";s:3:"alt";s:0:"";s:4:"html";s:140:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/topbanner.gif" height="40" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/topbanner.gif" height="40" width="1200" border="0"></a>', 0, 0),
(28, 0, 'headerbanner', 11, '页头通栏广告1', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner6.gif";s:4:"link";s:1:"#";s:5:"width";s:3:"152";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:112:"<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner6.gif" height="70" width="152" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner6.gif" height="70" width="152" border="0"></a>', 0, 0),
(29, 0, 'headerbanner', 12, '页头通栏广告2', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner3.gif";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:3:"152";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:143:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner3.gif" height="70" width="152" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner3.gif" height="70" width="152" border="0"></a>', 0, 0),
(30, 0, 'headerbanner', 13, '页头通栏广告3', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner5.gif";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:3:"152";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:143:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner5.gif" height="70" width="152" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner5.gif" height="70" width="152" border="0"></a>', 0, 0),
(31, 0, 'headerbanner', 14, '页头通栏广告4', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner1.gif";s:4:"link";s:1:"#";s:5:"width";s:3:"140";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:112:"<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner1.gif" height="70" width="140" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner1.gif" height="70" width="140" border="0"></a>', 0, 0),
(32, 0, 'headerbanner', 15, '页头通栏广告5', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner2.gif";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:3:"150";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:143:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner2.gif" height="70" width="150" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner2.gif" height="70" width="150" border="0"></a>', 0, 0),
(33, 0, 'headerbanner', 16, '页头通栏广告6', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner4.gif";s:4:"link";s:1:"#";s:5:"width";s:3:"140";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:112:"<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner4.gif" height="70" width="140" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner4.gif" height="70" width="140" border="0"></a>', 0, 0),
(34, 0, 'headerbanner', 17, '页头通栏广告7', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner7.gif";s:4:"link";s:1:"#";s:5:"width";s:3:"140";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:112:"<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner7.gif" height="70" width="140" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/headerbanner7.gif" height="70" width="140" border="0"></a>', 0, 0),
(36, 0, 'intercatad', 10, '栏目侧边广告2', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:31:"/attachment/ggg/intercatad2.gif";s:4:"link";s:1:"#";s:5:"width";s:0:"";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:86:"<a href="#" target="_blank"><img src="/attachment/ggg/intercatad2.gif" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="#" target="_blank"><img src="/attachment/ggg/intercatad2.gif" border="0"></a>', 0, 0),
(38, 0, 'indexcatad', 2, '首页分类间广告3', '1', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:27:"/attachment/ggg/pagetop.gif";s:4:"link";s:34:"http://www.mymps.com.cn/goumai.php";s:5:"width";s:4:"1200";s:6:"height";s:0:"";s:3:"alt";s:0:"";s:4:"html";s:128:"<a href="http://www.mymps.com.cn/goumai.php" target="_blank"><img src="/attachment/ggg/pagetop.gif" width="1200" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/goumai.php" target="_blank"><img src="/attachment/ggg/pagetop.gif" width="1200" border="0"></a>', 0, 0),
(41, 0, 'interlistad', 0, '栏目列表广告（二手市场）', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:114:"<a href="">我是栏目列表间广告，显示在列表最上端</a><br />\r\n我可以以文字，图片，联盟广告代码，flash各种形式存在 ^_^";s:8:"position";s:3:"top";s:12:"displayorder";s:0:"";}', '<a href="">我是栏目列表间广告，显示在列表最上端</a><br />\r\n我可以以文字，图片，联盟广告代码，flash各种形式存在 ^_^', 0, 0),
(45, 0, 'interlistad', 0, '栏目列表广告（跳蚤市场2）', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:174:"<a href="http://bbs.mymps.com.cn" target="_blank">我也是栏目列表间广告，我也可以显示在列表尾部</a> <br> 我也可以被添加多次，和其它广告位一样可以添加百度以及阿里妈妈等联盟广告";s:8:"position";s:6:"bottom";s:12:"displayorder";s:0:"";}', '<a href="http://bbs.mymps.com.cn" target="_blank">我也是栏目列表间广告，我也可以显示在列表尾部</a> <br> 我也可以被添加多次，和其它广告位一样可以添加百度以及阿里妈妈等联盟广告', 0, 0),
(46, 0, 'interlistad', 0, '栏目列表广告（车辆）', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:198:"<a href="http://www.mymps.com.cn/goumai.php" target="_blank">2011款Jeep牧马人现41.89万起www.Jeep.com.cn</a><br />\r\nJeep牧马人,终极四驱利器,强大的四驱动力.Sahara两门款41.89万;Rubicon两门款47.89万....";s:8:"position";s:3:"top";s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/goumai.php" target="_blank">2011款Jeep牧马人现41.89万起www.Jeep.com.cn</a><br />\r\nJeep牧马人,终极四驱利器,强大的四驱动力.Sahara两门款41.89万;Rubicon两门款47.89万....', 0, 0),
(49, 0, 'interlistad', 0, '栏目列表广告（交友）', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:205:"<a href="http://www.mymps.com.cn">找对象 上某某佳缘网</a><br />中国最受网民信赖、第一家在美上市的交友网站。提供丰富多彩的交友活动，数百万会员在这里成功找到对象。现有四千多万真实交友会员，让缘分千万里挑一！";s:8:"position";s:3:"top";s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn">找对象 上某某佳缘网</a><br />中国最受网民信赖、第一家在美上市的交友网站。提供丰富多彩的交友活动，数百万会员在这里成功找到对象。现有四千多万真实交友会员，让缘分千万里挑一！', 0, 0),
(50, 0, 'interlistad', 0, '栏目列表广告（商务）', 'all', 'a:4:{s:5:"style";s:4:"code";s:4:"html";s:161:"<a href="http://www.mymps.com.cn">北京某某圆财务咨询有限公司 http://www.mymps.com.cn</a> <br /> 北京公司注册 北京代理记账 大额增资 审计环评卫生许可证 18888888888";s:8:"position";s:6:"bottom";s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn">北京某某圆财务咨询有限公司 http://www.mymps.com.cn</a> <br /> 北京公司注册 北京代理记账 大额增资 审计环评卫生许可证 18888888888', 0, 0),
(58, 0, 'headerbanner', 0, '页头通栏广告8', 'all', 'a:9:{s:5:"style";s:5:"image";s:3:"url";s:33:"/attachment/ggg/headerbanner5.gif";s:4:"link";s:32:"http://www.mymps.com.cn/buy.html";s:5:"width";s:3:"152";s:6:"height";s:2:"70";s:3:"alt";s:0:"";s:4:"html";s:143:"<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner5.gif" height="70" width="152" border="0"></a>";s:8:"position";N;s:12:"displayorder";s:0:"";}', '<a href="http://www.mymps.com.cn/buy.html" target="_blank"><img src="/attachment/ggg/headerbanner5.gif" height="70" width="152" border="0"></a>', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_announce`
--

CREATE TABLE IF NOT EXISTS `my_announce` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `redirecturl` varchar(250) NOT NULL,
  `titlecolor` char(10) NOT NULL,
  `content` mediumtext NOT NULL,
  `author` varchar(20) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `begintime` int(10) NOT NULL,
  `endtime` int(10) NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_announce`
--

INSERT INTO `my_announce` (`id`, `title`, `redirecturl`, `titlecolor`, `content`, `author`, `pubdate`, `begintime`, `endtime`, `hits`) VALUES
(1, '请勿发布虚假信息，违者封号处理！谢谢配合！', '', '#FF0000', '<p style="margin-left:30px;font-size:32px;vertical-align:baseline;background:0px 0px #FFFFFF;color:#565656;font-family:;">\r\n	关于反欺诈联盟\r\n</p>\r\n<p style="margin-left:30px;font-size:32px;vertical-align:baseline;background:0px 0px #FFFFFF;color:#565656;font-family:;">\r\n	<br />\r\n</p>\r\n<ul style="vertical-align:baseline;background:0px 0px #FFFFFF;font-family:;">\r\n	<li style="vertical-align:baseline;background:#FBFBFB;">\r\n		<span style="font-size:18px;vertical-align:baseline;background:0px 0px;color:#5E5E5E;">我们是谁？<span></span></span> \r\n		<p style="font-size:14px;vertical-align:baseline;background:0px 0px;text-indent:25px;color:#A2A2A2;">\r\n			我们一直以来致力于<span></span>创建一个“以用户为中心且人人可信赖的生活服务平台”，并以此为宗旨一直采用各种方式、全方位打击平台上的虚假欺诈信息。\r\n		</p>\r\n		<p style="font-size:14px;vertical-align:baseline;background:0px 0px;text-indent:25px;color:#A2A2A2;">\r\n			反欺诈联盟希望通过平台效应，将怀有共同愿景的各类用户汇集到一起组成联盟，并通过对欺诈信息的举报共同打击本平台上的虚假欺诈信息。\r\n		</p>\r\n	</li>\r\n</ul>\r\n<p style="text-indent:25px;">\r\n	<span><span style="font-size:14px;"><br />\r\n</span></span>\r\n</p>\r\n<ul style="vertical-align:baseline;background:0px 0px #FFFFFF;font-family:;">\r\n	<li style="vertical-align:baseline;background:#FBFBFB;">\r\n		<span style="font-size:18px;vertical-align:baseline;background:0px 0px;color:#5E5E5E;">谁适合加入我们？</span> \r\n		<p style="font-size:14px;vertical-align:baseline;background:0px 0px;text-indent:25px;color:#A2A2A2;">\r\n			如果你对虚假欺诈信息深恶痛绝并且坚信正义终将战胜邪恶，同时，又能实事求是保证对每一个信息都尽职尽责，那么你就是我们的招募对象！\r\n		</p>\r\n	</li>\r\n</ul>\r\n<p style="text-indent:25px;">\r\n	<span><span style="font-size:14px;"><br />\r\n</span></span>\r\n</p>\r\n<ul style="vertical-align:baseline;background:0px 0px #FFFFFF;font-family:;">\r\n	<li style="vertical-align:baseline;background:#FBFBFB;">\r\n		<span style="font-size:18px;vertical-align:baseline;background:0px 0px;color:#5E5E5E;">为什么要加入我们？</span> \r\n		<p style="font-size:14px;vertical-align:baseline;background:0px 0px;text-indent:25px;color:#A2A2A2;">\r\n			通过数以万计反欺诈联盟志愿者的举报，你不仅可以帮助我们平台清理线上反欺诈信息，我们还可以通过对你投诉行为的分析，用科技的手段形成产品策略，对潜伏在平台上的各种黑色产业形成毁灭性打击。不仅如此，作为志愿者你还可以获得：<br />\r\n.志愿者举报最高优先级处理特权<br />\r\n.特定标识、荣誉称号<br />\r\n.线下线上好礼及参与志愿者线下活动机会<br />\r\n.更有机会优先加入成为我们的一员\r\n		</p>\r\n	</li>\r\n</ul>', 'admin', 1539246041, 1539187200, 1570723200, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_area`
--

CREATE TABLE IF NOT EXISTS `my_area` (
  `areaid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(32) NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `areaorder` smallint(6) NOT NULL,
  PRIMARY KEY (`areaid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `my_area`
--

INSERT INTO `my_area` (`areaid`, `areaname`, `parentid`, `areaorder`) VALUES
(1, '镜湖区', 0, 1),
(2, '弋江区', 0, 2),
(3, '鸠江区', 0, 3),
(4, '三山区', 0, 4),
(5, '芜湖县', 0, 5),
(6, '繁昌县', 0, 6),
(7, '南陵县', 0, 7),
(8, '无为县', 0, 8);

-- --------------------------------------------------------

--
-- 表的结构 `my_badwords`
--

CREATE TABLE IF NOT EXISTS `my_badwords` (
  `words` mediumtext NOT NULL,
  `view` varchar(100) NOT NULL,
  `ifcheck` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_badwords`
--

INSERT INTO `my_badwords` (`words`, `view`, `ifcheck`) VALUES
('轮功', '**', 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_cache`
--

CREATE TABLE IF NOT EXISTS `my_cache` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `page` varchar(20) NOT NULL,
  `time` int(10) NOT NULL,
  `open` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=327 ;

--
-- 转存表中的数据 `my_cache`
--

INSERT INTO `my_cache` (`id`, `page`, `time`, `open`) VALUES
(318, 'site', 0, 0),
(319, 'list', 0, 0),
(320, 'info', 0, 0),
(321, 'aboutus', 0, 0),
(322, 'announce', 0, 0),
(323, 'faq', 0, 0),
(324, 'friendlink', 0, 0),
(325, 'sitemap', 0, 0),
(326, 'changecity', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_category`
--

CREATE TABLE IF NOT EXISTS `my_category` (
  `catid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `if_view` tinyint(1) NOT NULL DEFAULT '1',
  `color` char(10) NOT NULL,
  `catname` varchar(32) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `usecoin` mediumint(8) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `gid` smallint(5) NOT NULL,
  `modid` smallint(5) NOT NULL,
  `catorder` smallint(6) NOT NULL,
  `if_upimg` tinyint(1) NOT NULL DEFAULT '1',
  `if_mappoint` tinyint(1) NOT NULL DEFAULT '0',
  `dir_type` tinyint(1) NOT NULL,
  `dir_typename` varchar(100) NOT NULL,
  `template` varchar(20) NOT NULL DEFAULT 'list',
  `template_info` varchar(20) NOT NULL DEFAULT 'info',
  `html_dir` varchar(200) NOT NULL,
  `htmlpath` varchar(200) NOT NULL,
  PRIMARY KEY (`catid`),
  KEY `parentid` (`parentid`),
  KEY `catname` (`catname`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=190 ;

--
-- 转存表中的数据 `my_category`
--

INSERT INTO `my_category` (`catid`, `if_view`, `color`, `catname`, `icon`, `usecoin`, `title`, `keywords`, `description`, `parentid`, `gid`, `modid`, `catorder`, `if_upimg`, `if_mappoint`, `dir_type`, `dir_typename`, `template`, `template_info`, `html_dir`, `htmlpath`) VALUES
(1, 2, '', '二手转让', '/template/default/images/index/icon_ershou.gif', 0, '', '', '', 0, 0, 2, 2, 1, 0, 4, 'ershou', 'list', 'info', '/ershou/', ''),
(2, 2, '', '车辆买卖', '/template/default/images/index/icon_che.gif', 0, '', '', '', 0, 0, 1, 3, 1, 0, 4, 'che', 'list', 'info', '/che/', ''),
(3, 2, '', '房屋租售', '/template/default/images/index/icon_fang.gif', 0, '', '', '', 0, 0, 1, 1, 1, 1, 4, 'fang', 'list', 'info', '/fang/', ''),
(4, 2, '', '全职招聘', '/template/default/images/index/icon_zhaopin.gif', -1, '', '', '', 0, 0, 7, 5, 1, 1, 4, 'zhaopin', 'list_zhaopin', 'info_zp', '/zhaopin/', ''),
(5, 2, '', '兼职招聘', '/template/default/images/index/icon_jzzhaopin.gif', -1, '', '', '', 0, 0, 8, 6, 1, 1, 4, 'jianzhi', 'list_zhaopin', 'info_zp', '/jianzhi/', ''),
(6, 2, '', '求职简历', '/template/default/images/index/icon_jianli.gif', 1, '', '', '', 0, 6, 9, 7, 1, 0, 4, 'qiuzhi', 'list_qiuzhi', 'info_resume', '/qiuzhi/', ''),
(7, 2, '', '交友活动', '/template/default/images/index/icon_love.gif', 0, '', '', '', 0, 7, 1, 8, 1, 0, 4, 'jiaoyou', 'list', 'info', '/jiaoyou/', ''),
(8, 1, '', '宠物', '/template/default/images/index/icon_pet.gif', 0, '', '', '', 0, 8, 1, 9, 1, 0, 4, 'chongwu', 'list', 'info', '/chongwu/', ''),
(9, 2, '', '生活服务', '/template/default/images/index/icon_life.gif', 0, '', '', '', 0, 0, 1, 10, 1, 1, 4, 'shenghuo', 'list_box', 'info', '/shenghuo/', ''),
(10, 1, '', '教育培训', '/template/default/images/index/icon_edu.gif', 0, '', '', '', 0, 10, 10, 12, 1, 0, 4, 'jiaoyu', 'list_simple', 'info', '/jiaoyu/', ''),
(11, 2, '#ff0000', '手机转让', '', 0, '', '', '', 1, 1, 28, 13, 1, 0, 4, 'shouji', 'list_ershou', 'info', '/ershou/shouji/', ''),
(12, 2, '', '台式机/笔记本', '', 0, '', '', '', 1, 1, 6, 14, 1, 0, 4, 'diannao', 'list_ershou', 'info', '/ershou/diannao/', ''),
(13, 2, '', '平板电脑', '', 0, '', '', '', 1, 1, 6, 15, 1, 0, 4, 'pingban', 'list_ershou', 'info', '/ershou/pingban/', ''),
(14, 2, '#46a200', '数码产品转让', '', 0, '', '', '', 1, 1, 2, 16, 1, 0, 4, 'shuma', 'list_ershou', 'info', '/ershou/shuma/', ''),
(15, 2, '', '家具/办公家具', '', 0, '', '', '', 1, 1, 2, 17, 1, 0, 4, 'jiaju', 'list_ershou', 'info', '/ershou/jiaju/', ''),
(16, 2, '#ff9900', '家用电器', '', 0, '', '', '', 1, 1, 2, 18, 1, 0, 4, 'jiadian', 'list_ershou', 'info', '/ershou/jiadian/', ''),
(17, 2, '', '日常用品', '', 0, '', '', '', 1, 1, 2, 19, 1, 0, 4, 'riyongpin', 'list_ershou', 'info', '/ershou/riyongpin/', ''),
(18, 2, '', '办公经营设备', '', 0, '', '', '', 1, 1, 2, 20, 1, 0, 4, 'bangong', 'list_ershou', 'info', '/ershou/bangong/', ''),
(19, 2, '', '收藏品/工艺品', '', 0, '', '', '', 1, 1, 2, 21, 1, 0, 4, 'shoucang', 'list_ershou', 'info', '/ershou/shoucang/', ''),
(20, 2, '', '服装/配饰/鞋包', '', 0, '', '', '', 1, 1, 2, 22, 1, 0, 4, 'fushi', 'list_ershou', 'info', '/ershou/fushi/', ''),
(21, 2, '', '母婴/玩具', '', 0, '', '', '', 1, 1, 2, 23, 1, 0, 4, 'yingyou', 'list_ershou', 'info', '/ershou/yingyou/', ''),
(22, 2, '', '运动/图书/乐器', '', 0, '', '', '', 1, 1, 2, 24, 1, 0, 4, 'wenti', 'list_ershou', 'info', '/ershou/wenti/', ''),
(23, 2, '', '门票卡券', '', 0, '', '', '', 1, 1, 2, 25, 1, 0, 4, 'piao', 'list_ershou', 'info', '/ershou/piao/', ''),
(24, 2, '', '工业设备', '', 0, '', '', '', 1, 1, 2, 26, 1, 0, 4, 'gongyeshebei', 'list_ershou', 'info', '/wupinjiaoyi/gongyeshebei/', ''),
(25, 2, '', '物品回收', '', 0, '', '', '', 1, 1, 2, 27, 1, 0, 4, 'huishou', 'list_ershou', 'info', '/ershou/huishou/', ''),
(26, 2, '', '设备租赁', '', 0, '', '', '', 1, 1, 2, 28, 1, 0, 4, 'zulin', 'list_ershou', 'info', '/ershou/zulin/', ''),
(27, 2, '', '其他物品', '', 0, '', '', '', 1, 1, 2, 29, 1, 0, 4, 'qitaershou', 'list_ershou', 'info', '/ershou/qitaershou/', ''),
(28, 2, '', '二手轿车', '', 0, '', '', '', 2, 2, 12, 31, 1, 0, 4, 'jiaoche', 'list', 'info', '/che/jiaoche/', ''),
(29, 2, '', '货车/工程车', '', 0, '', '', '', 2, 0, 16, 32, 1, 0, 4, 'huoche', 'list', 'info', '/che/huoche/', ''),
(30, 2, '', '面包车/客车', '', 0, '', '', '', 2, 2, 15, 33, 1, 0, 4, 'keche', 'list', 'info', '/che/keche/', ''),
(31, 2, '', '拖拉机/收割机', '', 0, '', '', '', 2, 0, 16, 34, 1, 0, 4, 'tuolaji', 'list', 'info', '/che/tuolaji/', ''),
(32, 2, '', '拼车/顺风车', '', 0, '', '', '', 2, 2, 14, 35, 1, 0, 4, 'pinche', 'list', 'info', '/che/pinche/', ''),
(33, 2, '', '新车优惠/4S店', '', 0, '', '', '', 2, 0, 12, 36, 1, 0, 4, 'xincheyouhui', 'list', 'info', '/che/xincheyouhui/', ''),
(34, 2, '', '汽车用品/配件', '', 0, '', '', '', 2, 0, 2, 37, 1, 0, 4, 'peijian', 'list', 'info', '/che/peijian/', ''),
(35, 2, '', '汽修保养', '', 0, '', '', '', 2, 0, 1, 38, 1, 0, 4, 'qixiu', 'list', 'info', '/che/qixiu/', ''),
(36, 2, '', '车辆收购服务', '', 0, '', '', '', 2, 0, 1, 39, 1, 0, 4, 'cheliangsg', 'list', 'info', '/che/cheliangsg/', ''),
(37, 2, '', '摩托车/燃气车', '', 0, '', '', '', 2, 2, 27, 40, 1, 0, 4, 'motuoche', 'list', 'info', '/che/motuoche/', ''),
(38, 2, '', '电动车', '', 0, '', '', '', 2, 2, 11, 41, 1, 0, 4, 'diandongche', 'list', 'info', '/che/diandongche/', ''),
(39, 2, '', '自行车', '', 0, '', '', '', 2, 2, 13, 42, 1, 0, 4, 'zixingche', 'list', 'info', '/che/zixingche/', ''),
(40, 2, '', '本地下线车', '', 0, '', '', '', 2, 0, 16, 43, 1, 0, 4, 'xiaxianche', 'list', 'info', '/che/xiaxianche/', ''),
(41, 2, '', '房屋出租', '', 0, '', '', '', 3, 0, 23, 45, 1, 1, 4, 'chuzu', 'list_zufang', 'info', '/fang/chuzu/', ''),
(42, 2, '', '日租/短租', '', 0, '', '', '', 3, 3, 1, 46, 1, 1, 4, 'duanzu', 'list', 'info', '/fang/duanzu/', ''),
(43, 2, '', '二手房出售', '', 0, '', '', '', 3, 0, 22, 47, 1, 1, 4, 'ershoufang', 'list_house', 'info', '/fang/ershoufang/', ''),
(45, 2, '', '店铺转让/出租', '', 0, '', '', '', 3, 3, 1, 49, 1, 1, 4, 'zhuanrang', 'list', 'info', '/fang/zhuanrang/', ''),
(46, 2, '', '商铺出售', '', 0, '', '', '', 3, 3, 1, 50, 1, 1, 4, 'shangpu', 'list', 'info', '/fang/shangpu/', ''),
(47, 2, '', '写字楼出租', '', 0, '', '', '', 3, 3, 24, 51, 1, 1, 4, 'xieziloucz', 'list', 'info', '/fang/xieziloucz/', ''),
(48, 2, '', '写字楼出售', '', 0, '', '', '', 3, 3, 25, 52, 1, 1, 4, 'xieziloucs', 'list', 'info', '/fang/xieziloucs/', ''),
(49, 2, '', '厂房/仓库/土地', '', 0, '', '', '', 3, 3, 24, 53, 1, 1, 4, 'changfang', 'list', 'info', '/fang/changfang/', ''),
(50, 2, '', '求租/求购', '', 0, '', '', '', 3, 3, 1, 54, 1, 1, 4, 'qiufang', 'list', 'info', '/fang/qiufang/', ''),
(51, 2, '', '营业员/促销/零售', '', -1, '', '', '', 4, 4, 7, 56, 1, 1, 4, 'lingshou', 'list_zhaopin', 'info_zp', '/zhaopin/lingshou/', ''),
(52, 2, '', '服务员/收银员', '', -1, '', '', '', 4, 4, 7, 57, 1, 1, 4, 'fuwuyuan', 'list_zhaopin', 'info_zp', '/zhaopin/fuwuyuan/', ''),
(53, 2, '#ff0000', '销售/市场/业务员', '', -1, '', '', '', 4, 4, 7, 58, 1, 1, 4, 'yewu', 'list_zhaopin', 'info_zp', '/zhaopin/yewu/', ''),
(54, 2, '', '文员/客服/助理', '', -1, '', '', '', 4, 4, 7, 59, 1, 1, 4, 'wenyuan', 'list_zhaopin', 'info_zp', '/zhaopin/wenyuan/', ''),
(55, 2, '', '保姆/家政', '', -1, '', '', '', 4, 4, 7, 60, 1, 1, 4, 'baomu', 'list_zhaopin', 'info_zp', '/zhaopin/baomu/', ''),
(56, 2, '', '司机/驾驶员', '', -1, '', '', '', 4, 4, 7, 61, 1, 1, 4, 'jiashi', 'list_zhaopin', 'info_zp', '/zhaopin/jiashi/', ''),
(57, 2, '', '保安/保洁', '', -1, '', '', '', 4, 4, 7, 62, 1, 1, 4, 'baoan', 'list_zhaopin', 'info_zp', '/zhaopin/baoan/', ''),
(58, 2, '', '厨师/切配', '', -1, '', '', '', 4, 4, 7, 63, 1, 1, 4, 'chushi', 'list_zhaopin', 'info_zp', '/zhaopin/chushi/', ''),
(59, 2, '', '送货/快递/仓管', '', -1, '', '', '', 4, 4, 7, 64, 1, 1, 4, 'kuaidi', 'list_zhaopin', 'info_zp', '/zhaopin/kuaidi/', ''),
(60, 2, '', '工人/技工', '', -1, '', '', '', 4, 4, 7, 65, 1, 1, 4, 'gongren', 'list_zhaopin', 'info_zp', '/zhaopin/gongren/', ''),
(61, 2, '', '财务/会计', '', -1, '', '', '', 4, 4, 7, 66, 1, 1, 4, 'caiwu', 'list_zhaopin', 'info_zp', '/zhaopin/caiwu/', ''),
(62, 2, '', '老师/培训师', '', -1, '', '', '', 4, 4, 7, 67, 1, 1, 4, 'laoshi', 'list_zhaopin', 'info_zp', '/zhaopin/laoshi/', ''),
(63, 2, '', '美工/设计/程序员', '', -1, '', '', '', 4, 4, 7, 68, 1, 1, 4, 'meigong', 'list_zhaopin', 'info_zp', '/zhaopin/meigong/', ''),
(64, 2, '', '保健师/美容师', '', -1, '', '', '', 4, 4, 7, 69, 1, 1, 4, 'baojianshi', 'list_zhaopin', 'info_zp', '/zhaopin/baojianshi/', ''),
(65, 2, '', '人才招聘会', '', -1, '', '', '', 4, 4, 7, 70, 1, 1, 4, 'zhaopinhui', 'list_zhaopin', 'info_zp', '/zhaopin/zhaopinhui/', ''),
(66, 2, '', 'KTV/酒吧', '', -1, '', '', '', 4, 4, 7, 71, 1, 1, 4, 'ktv', 'list_zhaopin', 'info_zp', '/zhaopin/ktv/', ''),
(67, 2, '', '其他招聘', '', -1, '', '', '', 4, 4, 7, 72, 1, 1, 4, 'qitazhaopin', 'list_zhaopin', 'info_zp', '/quanzhizhaopin/qitazhaopin/', ''),
(68, 2, '', '派发/促销', '', -1, '', '', '', 5, 5, 8, 74, 1, 1, 4, 'jzcuxiao', 'list_zhaopin', 'info_zp', '/jianzhi/jzcuxiao/', ''),
(69, 2, '', '家教/老师', '', -1, '', '', '', 5, 5, 8, 75, 1, 1, 4, 'jzjiajiao', 'list_zhaopin', 'info_zp', '/jianzhi/jzjiajiao/', ''),
(70, 2, '', '餐厅/服务员', '', -1, '', '', '', 5, 5, 8, 76, 1, 1, 4, 'jzfuwuyuan', 'list_zhaopin', 'info_zp', '/jianzhi/jzfuwuyuan/', ''),
(71, 2, '', '模特/礼仪', '', -1, '', '', '', 5, 5, 8, 77, 1, 1, 4, 'jzmote', 'list_zhaopin', 'info_zp', '/jianzhi/jzmote/', ''),
(72, 2, '', '网站/设计', '', -1, '', '', '', 5, 5, 8, 78, 1, 1, 4, 'jzwangzhan', 'list_zhaopin', 'info_zp', '/jianzhi/jzwangzhan/', ''),
(73, 2, '', '会计/财务', '', -1, '', '', '', 5, 5, 8, 79, 1, 1, 4, 'jzcaiwu', 'list_zhaopin', 'info_zp', '/jianzhi/jzcaiwu/', ''),
(74, 2, '', '其他兼职', '', -1, '', '', '', 5, 5, 8, 80, 1, 1, 4, 'qitajianzhi', 'list_zhaopin', 'info_zp', '/jianzhizhaopin/qitajianzhi/', ''),
(75, 2, '', '销售', '', 1, '', '', '', 6, 6, 9, 82, 1, 0, 4, 'qzxiaoshou', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzxiaoshou/', ''),
(76, 2, '', '客服', '', 1, '', '', '', 6, 6, 9, 83, 1, 0, 4, 'qzkefu', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzkefu/', ''),
(77, 2, '', '人事/行政/后勤', '', 1, '', '', '', 6, 6, 9, 84, 1, 0, 4, 'qzhouqin', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzhouqin/', ''),
(78, 2, '', '酒店/餐饮/旅游', '', 1, '', '', '', 6, 6, 9, 85, 1, 0, 4, 'qzcanyin', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzcanyin/', ''),
(79, 2, '', '美容/美发/保健/健身', '', 1, '', '', '', 6, 6, 9, 86, 1, 0, 4, 'qzmeirong', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzmeirong/', ''),
(80, 2, '', '计算机/网络/通信', '', 1, '', '', '', 6, 6, 9, 87, 1, 0, 4, 'qzcomputer', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzcomputer/', ''),
(81, 2, '', '建筑/房产/装修/物业', '', 1, '', '', '', 6, 6, 9, 88, 1, 0, 4, 'qzfangdichan', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzfangdichan/', ''),
(82, 2, '', '普工/技工/生产', '', 1, '', '', '', 6, 6, 9, 89, 1, 0, 4, 'qzjigong', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzjigong/', ''),
(83, 2, '', '司机', '', 1, '', '', '', 6, 6, 9, 90, 1, 0, 4, 'qzsiji', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzsiji/', ''),
(84, 2, '', '家政保洁/安保', '', 1, '', '', '', 6, 6, 9, 91, 1, 0, 4, 'qzjiazheng', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzjiazheng/', ''),
(85, 2, '', '影视/娱乐/KTV', '', 1, '', '', '', 6, 6, 9, 92, 1, 0, 4, 'qzktv', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzktv/', ''),
(86, 2, '', '编辑/出版/印刷', '', 1, '', '', '', 6, 6, 9, 93, 1, 0, 4, 'qzyinshua', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzyinshua/', ''),
(87, 2, '', '教育培训/翻译', '', 1, '', '', '', 6, 6, 9, 94, 1, 0, 4, 'qzjiaoyu', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzjiaoyu/', ''),
(88, 2, '', '财务/审计/统计', '', 1, '', '', '', 6, 6, 9, 95, 1, 0, 4, 'qzshenji', 'list_qiuzhi', 'info_resume', '/qiuzhi/qzshenji/', ''),
(89, 2, '', '其他职位', '', 1, '', '', '', 6, 6, 9, 96, 1, 0, 4, 'qitazhiwei', 'list_qiuzhi', 'info_resume', '/qiuzhijianli/qitazhiwei/', ''),
(90, 2, '', '找女友/找男友', '', 0, '', '', '', 7, 7, 19, 98, 1, 0, 4, 'zhaoduixiang', 'list', 'info', '/jiaoyou/zhaoduixiang/', ''),
(91, 2, '', '征婚', '', 0, '', '', '', 7, 7, 19, 99, 1, 0, 4, 'zhenghun', 'list', 'info', '/jiaoyou/zhenghun/', ''),
(92, 2, '', '结伴活动', '', 0, '', '', '', 7, 7, 1, 100, 1, 0, 4, 'huodong', 'list', 'info', '/jiaoyou/huodong/', ''),
(93, 2, '', '技能交换', '', 0, '', '', '', 7, 7, 18, 101, 1, 0, 4, 'jineng', 'list', 'info', '/jiaoyou/jineng/', ''),
(94, 2, '', '找人/寻物', '', 0, '', '', '', 7, 7, 1, 102, 1, 0, 4, 'zhaoren', 'list', 'info', '/jiaoyou/zhaoren/', ''),
(95, 2, '', '狗狗', '', 0, '', '', '', 8, 8, 20, 104, 1, 0, 4, 'gou', 'list_pet', 'info', '/chongwu/gou/', ''),
(96, 2, '', '猫猫/其他宠物', '', 0, '', '', '', 8, 8, 21, 105, 1, 0, 4, 'mao', 'list', 'info', '/chongwu/mao/', ''),
(97, 2, '', '宠物免费赠送', '', 0, '', '', '', 8, 8, 1, 106, 1, 0, 4, 'songchongwu', 'list', 'info', '/chongwu/songchongwu/', ''),
(98, 2, '', '宠物用品/食品', '', 0, '', '', '', 8, 8, 1, 107, 1, 0, 4, 'shipin', 'list', 'info', '/chongwu/shipin/', ''),
(99, 2, '', '宠物服务/配种', '', 0, '', '', '', 8, 8, 1, 108, 1, 0, 4, 'peizhong', 'list', 'info', '/chongwu/peizhong/', ''),
(100, 2, '', '驾校服务', '', 0, '', '', '', 9, 9, 1, 110, 1, 1, 4, 'jiaxiao', 'list_box', 'info', '/fuwu/jiaxiao/', ''),
(101, 2, '', '陪驾/代驾', '', 0, '', '', '', 9, 9, 1, 111, 1, 1, 4, 'daijia', 'list_box', 'info', '/fuwu/daijia/', ''),
(102, 2, '', '婚庆/化妆', '', 0, '', '', '', 9, 9, 1, 112, 1, 1, 4, 'hunqing', 'list_box', 'info', '/fuwu/hunqing/', ''),
(103, 2, '', '摄影摄像', '', 0, '', '', '', 9, 9, 1, 113, 1, 1, 4, 'sheying', 'list_box', 'info', '/fuwu/sheying/', ''),
(104, 2, '', '美容纤体', '', 0, '', '', '', 9, 9, 1, 114, 1, 1, 4, 'meirong', 'list_box', 'info', '/fuwu/meirong/', ''),
(105, 2, '', '房屋装修', '', 0, '', '', '', 9, 9, 1, 115, 1, 1, 4, 'zhuangxiu', 'list_box', 'info', '/fuwu/zhuangxiu/', ''),
(106, 2, '', '建材装饰', '', 0, '', '', '', 9, 9, 1, 116, 1, 1, 4, 'jiancai', 'list_box', 'info', '/fuwu/jiancai/', ''),
(107, 2, '', '投资理财', '', 0, '', '', '', 9, 9, 1, 117, 1, 1, 4, 'licai', 'list_box', 'info', '/fuwu/licai/', ''),
(108, 2, '', '保姆/月嫂', '', 0, '', '', '', 9, 9, 1, 118, 1, 1, 4, 'yuesao', 'list_box', 'info', '/fuwu/yuesao/', ''),
(109, 2, '#FF0000', '保洁/家政', '', 0, '', '', '', 9, 9, 1, 119, 1, 1, 4, 'baojie', 'list_box', 'info', '/shenghuo/baojie/', ''),
(110, 2, '', '搬家服务', '', 0, '', '', '', 9, 9, 1, 120, 1, 1, 4, 'banjia', 'list_box', 'info', '/shenghuo/banjia/', ''),
(111, 2, '', '家电维修', '', 0, '', '', '', 9, 9, 1, 121, 1, 1, 4, 'xiujiandian', 'list_box', 'info', '/fuwu/xiujiandian/', ''),
(112, 2, '', '电脑维修', '', 0, '', '', '', 9, 9, 1, 122, 1, 1, 4, 'xiudiannao', 'list_box', 'info', '/fuwu/xiudiannao/', ''),
(113, 2, '', '家居维修', '', 0, '', '', '', 9, 9, 1, 123, 1, 1, 4, 'jiajuweixiu', 'list_box', 'info', '/fuwu/jiajuweixiu/', ''),
(114, 2, '', '管道疏通', '', 0, '', '', '', 9, 9, 1, 124, 1, 1, 4, 'tongguandao', 'list_box', 'info', '/fuwu/tongguandao/', ''),
(115, 2, '', '外卖/送水', '', 0, '', '', '', 9, 9, 1, 125, 1, 1, 4, 'waimai', 'list_box', 'info', '/fuwu/waimai/', ''),
(116, 2, '', '开锁/修锁', '', 0, '', '', '', 9, 9, 1, 126, 1, 1, 4, 'kaisuo', 'list_box', 'info', '/fuwu/kaisuo/', ''),
(117, 2, '', '租车服务', '', 0, '', '', '', 9, 9, 1, 127, 1, 1, 4, 'zuche', 'list_box', 'info', '/fuwu/zuche/', ''),
(118, 2, '', '旅游度假', '', 0, '', '', '', 9, 9, 1, 128, 1, 1, 4, 'lvyou', 'list_box', 'info', '/fuwu/lvyou/', ''),
(119, 2, '', '休闲娱乐', '', 0, '', '', '', 9, 9, 1, 129, 1, 1, 4, 'yule', 'list_box', 'info', '/fuwu/yule/', ''),
(120, 2, '', '酒店/宾馆', '', 0, '', '', '', 9, 9, 1, 130, 1, 1, 4, 'jiudian', 'list_box', 'info', '/fuwu/jiudian/', ''),
(121, 2, '', '签证服务', '', 0, '', '', '', 9, 0, 1, 131, 1, 1, 4, 'qianzheng', 'list_box', 'info', '/shenghuo/qianzheng/', ''),
(122, 2, '', '招商加盟', '', 0, '', '', '', 189, 189, 1, 132, 1, 1, 4, 'zhaoshang', 'list_simple', 'info', '/fuwu/zhaoshang/', ''),
(123, 2, '', '担保/贷款', '', 0, '', '', '', 189, 189, 1, 133, 1, 1, 4, 'daikuan', 'list_simple', 'info', '/fuwu/daikuan/', ''),
(124, 2, '#FF0000', '公司注册', '', 0, '', '', '', 189, 189, 1, 134, 1, 1, 4, 'gongsizhuce', 'list_simple', 'info', '/shangwufuwu/gongsizhuce/', ''),
(125, 2, '', '会计/审计', '', 0, '', '', '', 189, 189, 1, 135, 1, 1, 4, 'kuaiji', 'list_simple', 'info', '/shenghuo/kuaiji/', ''),
(126, 2, '', '网站建设', '', 0, '', '', '', 189, 189, 1, 136, 1, 1, 4, 'wangzhan', 'list_simple', 'info', '/fuwu/wangzhan/', ''),
(127, 2, '', '快递/物流', '', 0, '', '', '', 189, 189, 1, 137, 1, 1, 4, 'wuliu', 'list_simple', 'info', '/fuwu/wuliu/', ''),
(128, 2, '', '庆典/演出', '', 0, '', '', '', 189, 189, 1, 138, 1, 1, 4, 'yanchu', 'list_simple', 'info', '/fuwu/yanchu/', ''),
(129, 2, '', '印刷/喷绘', '', 0, '', '', '', 189, 189, 1, 139, 1, 1, 4, 'yinshua', 'list_simple', 'info', '/fuwu/yinshua/', ''),
(130, 2, '', '设计策划', '', 0, '', '', '', 189, 189, 1, 140, 1, 1, 4, 'cehua', 'list_simple', 'info', '/fuwu/cehua/', ''),
(131, 2, '', '律师服务', '', 0, '', '', '', 189, 189, 1, 141, 1, 1, 4, 'lvshi', 'list_simple', 'info', '/fuwu/lvshi/', ''),
(132, 2, '', '翻译/速记', '', 0, '', '', '', 189, 189, 1, 142, 1, 1, 4, 'fanyi', 'list_simple', 'info', '/fuwu/fanyi/', ''),
(133, 2, '', '鲜花/盆景', '', 0, '', '', '', 189, 189, 1, 143, 1, 1, 4, 'xianhua', 'list_simple', 'info', '/fuwu/xianhua/', ''),
(134, 2, '', '礼品定制', '', 0, '', '', '', 189, 189, 1, 144, 1, 1, 4, 'lipin', 'list_simple', 'info', '/fuwu/lipin/', ''),
(135, 2, '', '本地名站', '', 0, '', '', '', 189, 189, 1, 145, 1, 1, 4, 'mingzhan', 'list_simple', 'info', '/fuwu/mingzhan/', ''),
(136, 2, '', '其他服务', '', 0, '', '', '', 189, 189, 1, 146, 1, 1, 4, 'qitafuwu', 'list_simple', 'info', '/shenghuofuwu/qitafuwu/', ''),
(137, 2, '', '职业培训', '', 0, '', '', '', 10, 10, 10, 148, 1, 0, 4, 'zhiyepeixun', 'list_simple', 'info', '/jiaoyu/zhiyepeixun/', ''),
(138, 2, '', '外语培训', '', 0, '', '', '', 10, 10, 10, 149, 1, 0, 4, 'waiyu', 'list_simple', 'info', '/jiaoyu/waiyu/', ''),
(139, 2, '', '学历教育', '', 0, '', '', '', 10, 10, 10, 150, 1, 0, 4, 'xueli', 'list_simple', 'info', '/jiaoyu/xueli/', ''),
(140, 2, '', '家教', '', 0, '', '', '', 10, 10, 10, 151, 1, 0, 4, 'jiajiao', 'list_simple', 'info', '/jiaoyoupeixun/jiajiao/', ''),
(141, 2, '', 'IT培训', '', 0, '', '', '', 10, 10, 10, 152, 1, 0, 4, 'jisuanji', 'list_simple', 'info', '/jiaoyu/jisuanji/', ''),
(142, 2, '', '留学签证', '', 0, '', '', '', 10, 10, 10, 153, 1, 0, 4, 'liuxue', 'list_simple', 'info', '/jiaoyu/liuxue/', ''),
(143, 2, '', '高等教育', '', 0, '', '', '', 10, 10, 10, 154, 1, 0, 4, 'gaodengjiaoyu', 'list_simple', 'info', '/jiaoyoupeixun/gaodengjiaoyu/', ''),
(144, 2, '', '文体培训', '', 0, '', '', '', 10, 10, 10, 155, 1, 0, 4, 'techang', 'list_simple', 'info', '/jiaoyu/techang/', ''),
(145, 2, '', '婴幼儿教育', '', 0, '', '', '', 10, 10, 10, 156, 1, 0, 4, 'youjiao', 'list_simple', 'info', '/jiaoyu/youjiao/', ''),
(146, 2, '', '中小学教育', '', 0, '', '', '', 10, 10, 10, 157, 1, 0, 4, 'zhongxiaoxue', 'list_simple', 'info', '/jiaoyu/zhongxiaoxue/', ''),
(147, 2, '', '其他培训', '', 0, '', '', '', 10, 10, 10, 158, 1, 0, 4, 'qitapeixun', 'list_simple', 'info', '/jiaoyoupeixun/qitapeixun/', ''),
(189, 2, '', '商务服务', '/template/default/images/index/icon_business.gif', 0, '', '', '', 0, 189, 1, 11, 1, 1, 2, 'shangwu', 'list_simple', 'info', '/shangwufuwu/', '');

-- --------------------------------------------------------

--
-- 表的结构 `my_certification`
--

CREATE TABLE IF NOT EXISTS `my_certification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_channel`
--

CREATE TABLE IF NOT EXISTS `my_channel` (
  `catid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `if_view` tinyint(1) NOT NULL DEFAULT '1',
  `color` char(10) NOT NULL,
  `catname` varchar(32) NOT NULL,
  `title` varchar(250) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `catorder` smallint(6) NOT NULL,
  `dir_type` tinyint(1) NOT NULL,
  `dir_typename` varchar(100) NOT NULL,
  `html_dir` varchar(200) NOT NULL,
  `htmlpath` varchar(200) NOT NULL,
  PRIMARY KEY (`catid`),
  KEY `parentid` (`parentid`),
  KEY `catname` (`catname`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_checkanswer`
--

CREATE TABLE IF NOT EXISTS `my_checkanswer` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `my_checkanswer`
--

INSERT INTO `my_checkanswer` (`id`, `question`, `answer`) VALUES
(1, '2+3=?', '5'),
(2, '本站名称[答案:蚂蚁分类信息]', '蚂蚁分类信息'),
(6, '5+8=?', '13'),
(5, '2+5=?', '7');

-- --------------------------------------------------------

--
-- 表的结构 `my_comment`
--

CREATE TABLE IF NOT EXISTS `my_comment` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `pubtime` int(10) NOT NULL,
  `ip` char(16) NOT NULL,
  `comment_level` tinyint(1) NOT NULL,
  `typeid` int(8) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'information',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `typeid` (`typeid`,`comment_level`,`type`),
  KEY `comment_level` (`comment_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `my_comment`
--

INSERT INTO `my_comment` (`id`, `userid`, `content`, `pubtime`, `ip`, `comment_level`, `typeid`, `type`) VALUES
(6, '18815539872', '狗狗很可爱！', 1539248089, 'unknown', 1, 6, 'information'),
(5, '18815539872', '楼主是有钱人啊！求带！', 1539238871, 'unknown', 1, 9, 'information'),
(3, '18815539872', '哇，好帅啊！', 1539238601, 'unknown', 1, 13, 'information'),
(4, '18815539872', '芜湖平头哥，人狠话不多，求包养！', 1539238664, 'unknown', 1, 13, 'information');

-- --------------------------------------------------------

--
-- 表的结构 `my_config`
--

CREATE TABLE IF NOT EXISTS `my_config` (
  `description` varchar(100) NOT NULL,
  `value` mediumtext NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'config',
  KEY `type` (`type`),
  KEY `description` (`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_config`
--

INSERT INTO `my_config` (`description`, `value`, `type`) VALUES
('latestbackup', '', 'database'),
('whenpost', '', 'checkanswe'),
('whenregister', '', 'checkanswe'),
('jsrefdomains', '', 'jswizard'),
('jsdateformat', 'Y/m/d', 'jswizard'),
('levelup_notice', '升级至黄金会员，您将能管理上传店铺背景banner图片，可切换使用更多的店铺模板风格，并拥有更多受限栏目的操作权限。', 'levelup'),
('credit_set', 'a:1:{s:4:"rank";a:15:{i:1;i:10;i:2;i:20;i:3;i:40;i:4;i:70;i:5;i:120;i:6;i:200;i:7;i:400;i:8;i:700;i:9;i:1200;i:10;i:1800;i:11;i:2600;i:12;i:4000;i:13;i:10000;i:14;i:30000;i:15;i:60000;}}', 'credit_sco'),
('score', 'a:1:{s:4:"rank";a:8:{s:8:"register";s:3:"+10";s:5:"login";s:2:"+2";s:11:"information";s:2:"+2";s:6:"coupon";s:2:"+2";s:5:"group";s:2:"+2";s:5:"goods";s:2:"+2";s:11:"com_certify";s:3:"+10";s:11:"per_certify";s:3:"+10";}}', 'credit_sco'),
('credit', 'a:1:{s:4:"rank";a:3:{s:11:"com_certify";s:3:"+50";s:11:"per_certify";s:3:"+50";s:11:"coin_credit";s:3:"+10";}}', 'credit_sco'),
('distort', '5', 'authcode'),
('insidelink', 'a:1:{s:7:"forward";a:5:{s:11:"information";s:1:"1";s:4:"news";s:1:"1";s:5:"goods";s:1:"1";s:5:"group";s:1:"1";s:6:"coupon";s:1:"1";}}', 'insidelink'),
('comment', 'a:3:{s:11:"information";s:1:"2";s:4:"news";s:1:"2";s:5:"store";s:1:"2";}', 'comment'),
('snow', '', 'authcode'),
('jscachelife', '0', 'jswizard'),
('jsstatus', '1', 'jswizard'),
('custombackup', 'a:1:{i:0;s:11:"my_category";}', 'database'),
('seo_force_store', 'active', 'seo'),
('seo_force_space', 'active', 'seo'),
('seo_force_yp', 'active', 'seo'),
('seo_force_news', 'active', 'seo'),
('tpl_set', 'a:15:{s:7:"banmian";s:7:"classic";s:8:"smp_cats";a:4:{s:5:"first";a:3:{i:0;s:1:"3";i:1;s:1:"1";i:2;s:1:"7";}s:6:"second";a:3:{i:0;s:1:"2";i:1;s:1:"5";i:2;s:2:"10";}s:5:"third";a:2:{i:0;s:1:"4";i:1;s:1:"6";}s:6:"fourth";a:3:{i:0;s:1:"8";i:1;s:1:"9";i:2;s:3:"189";}}s:9:"showstyle";a:11:{i:3;s:1:"2";i:1;s:1:"2";i:2;s:1:"2";i:4;s:1:"2";i:5;s:1:"2";i:6;s:1:"2";i:7;s:1:"2";i:8;s:1:"2";i:9;s:1:"3";i:189;s:1:"3";i:10;s:1:"2";}s:7:"classic";a:1:{s:4:"cats";s:2:"10";}s:6:"portal";a:10:{s:6:"ershou";s:1:"1";s:9:"ershoumod";s:1:"2";s:6:"zufang";s:2:"41";s:9:"zufangmod";s:2:"23";s:10:"ershoufang";s:2:"43";s:13:"ershoufangmod";s:2:"22";s:7:"zhaopin";s:1:"4";s:10:"zhaopinmod";s:1:"7";s:6:"jianli";s:1:"6";s:9:"jianlimod";s:1:"9";}s:7:"portali";a:3:{s:7:"acreage";s:7:"acreage";s:6:"prices";s:6:"prices";s:7:"company";s:7:"company";}s:12:"indextopinfo";s:2:"12";s:7:"newinfo";s:1:"0";s:8:"announce";s:1:"8";s:3:"faq";s:1:"0";s:4:"news";s:1:"7";s:11:"foreachinfo";s:1:"6";s:5:"goods";s:1:"8";s:9:"telephone";s:2:"12";s:7:"lifebox";s:2:"24";}', 'tpl'),
('seo_force_info', 'active', 'seo'),
('seo_force_about', 'active', 'seo'),
('seo_force_category', 'active', 'seo'),
('seo_description', '', 'seo'),
('mobile', 'a:8:{s:11:"allowmobile";s:1:"1";s:11:"autorefresh";s:1:"1";s:8:"register";s:1:"1";s:4:"post";s:1:"0";s:8:"authcode";s:1:"1";s:18:"mobiletopicperpage";s:2:"10";s:12:"mobiledomain";s:0:"";s:10:"mobilelogo";s:0:"";}', 'mobile'),
('line', '1', 'authcode'),
('mail_user', '', 'mail'),
('smtp_mail', '', 'mail'),
('smtp_serverport', '', 'mail'),
('smtp_server', '', 'mail'),
('noise', '12', 'authcode'),
('screen_info', 'full', 'config'),
('cfg_upimg_number', '4', 'config'),
('callback', '', 'qqlogin'),
('appkey', '', 'qqlogin'),
('callback', '', 'wxlogin'),
('appsecret', '', 'wxlogin'),
('appid', '', 'wxlogin'),
('open', '', 'wxlogin'),
('appid', '', 'qqlogin'),
('open', '', 'qqlogin'),
('seo_keywords', '网站关键词', 'seo'),
('sms_pwdtpl', '', 'sms'),
('mail_service', 'smtp', 'mail'),
('sms_regtpl', '', 'sms'),
('sms_service', 'no', 'sms'),
('sms_pwd', '', 'sms'),
('sms_user', '', 'sms'),
('type', 'english', 'authcode'),
('post', '1', 'authcode'),
('forgetpass', '1', 'authcode'),
('cfg_if_nonmember_info', '1', 'config'),
('cfg_forbidden_post_ip', '', 'config'),
('cfg_allow_post_area', '', 'config'),
('cfg_disallow_post_tel', '', 'config'),
('cfg_info_if_img', '0', 'config'),
('screen_cat', 'full', 'config'),
('cfg_info_if_gq', '0', 'config'),
('cfg_post_editor', '0', 'config'),
('cfg_if_info_verify', '0', 'config'),
('cfg_postfile', 'publish.php', 'config'),
('cfg_upimg_watermark_position', '9', 'config'),
('register', '1', 'authcode'),
('login', '1', 'authcode'),
('screen_search', 'full', 'config'),
('cfg_upimg_watermark_diaphaneity', '60', 'config'),
('cfg_upimg_watermark_size', '12', 'config'),
('cfg_upimg_watermark_color', '#FFFFFF', 'config'),
('cfg_upimg_watermark_text', 'http://www.mymps.com.cn', 'config'),
('cfg_upimg_watermark_img', '', 'config'),
('cfg_upimg_watermark_height', '50', 'config'),
('cfg_upimg_watermark_width', '180', 'config'),
('cfg_upimg_watermark', '1', 'config'),
('cfg_member_info_bold', '1', 'config'),
('cfg_member_info_refresh', '0', 'config'),
('cfg_upimg_type', 'png,jpg,gif,jpeg', 'config'),
('cfg_upimg_size', '1024', 'config'),
('cfg_member_upgrade_list_top', '1', 'config'),
('incline', '5', 'authcode'),
('close', '3', 'authcode'),
('number', '4', 'authcode'),
('cfg_member_info_red', '1', 'config'),
('cfg_member_upgrade_top', '2', 'config'),
('cfg_member_upgrade_index_top', '3', 'config'),
('cfg_tpl_dir', 'blue', 'config'),
('cfg_score_fee', '8', 'config'),
('cfg_coin_fee', '2', 'config'),
('cfg_member_perpost_consume', '0', 'config'),
('cfg_if_affiliate', '1', 'config'),
('cfg_affiliate_score', '5', 'config'),
('cfg_pay_min', '10', 'config'),
('screen_index', 'full', 'config'),
('cfg_member_reg_content', '尊敬的{username},您已经注册成为{sitename}的会员,请您在发表言论时,遵守当地法律法规。\r\n如果您有什么疑问可以联系管理员。\r\n\r\n\r\n{sitename}\r\n{time}', 'config'),
('cfg_member_reg_title', '{username},您好,感谢您的注册,请阅读以下内容。', 'config'),
('cfg_forbidden_reg_ip', '', 'config'),
('cfg_member_regplace', '', 'config'),
('cfg_if_corp', '1', 'config'),
('cfg_if_member_log_in', '1', 'config'),
('cfg_if_member_register', '1', 'config'),
('cfg_member_verify', '4', 'config'),
('cfg_member_logfile', 'member.php', 'config'),
('bodybg', '0', 'config'),
('seo_sitename', '分类信息网', 'seo'),
('cfg_raquo', '&gt;', 'config'),
('cfg_backup_dir', '/backup', 'config'),
('cfg_page_line', '15', 'config'),
('cfg_list_page_line', '16', 'config'),
('cfg_site_open_reason', '', 'config'),
('mail_pass', '', 'mail'),
('seo_force_goods', 'active', 'seo'),
('seo_html_make', '', 'seo'),
('cfg_authcodefile', 'randcode.php', 'config'),
('cfg_if_site_open', '1', 'config'),
('SiteStat', '', 'config'),
('SiteCity', '北京', 'config'),
('SiteLogo', '/logo.gif', 'config'),
('SiteBeian', '', 'config'),
('SiteTel', '010-00000000', 'config'),
('SiteEmail', '', 'config'),
('SiteQQ', '', 'config'),
('SiteUrl', 'http://localhost:8181', 'config'),
('SiteName', '我的网站', 'config'),
('cfg_nonmember_perday_post', '', 'config'),
('mapapi', '', 'config'),
('mapflag', '', 'config'),
('mapapi_charset', '', 'config'),
('mapview_level', '14', 'config'),
('cfg_mappoint', '', 'config'),
('head_style', 'new', 'config');

-- --------------------------------------------------------

--
-- 表的结构 `my_corp`
--

CREATE TABLE IF NOT EXISTS `my_corp` (
  `corpid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `corpname` varchar(32) NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `corporder` smallint(6) NOT NULL,
  PRIMARY KEY (`corpid`),
  KEY `areaname` (`corpname`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- 转存表中的数据 `my_corp`
--

INSERT INTO `my_corp` (`corpid`, `corpname`, `parentid`, `corporder`) VALUES
(10, '购物天地', 0, 6),
(9, '旅游出行', 0, 5),
(8, '生活便利', 0, 4),
(7, '餐饮美食', 0, 3),
(6, '休闲娱乐', 0, 2),
(11, '教育培训', 0, 7),
(12, '装饰装修', 0, 8),
(14, '酒吧', 6, 11),
(15, '茶楼', 6, 12),
(16, '咖啡厅', 6, 13),
(17, '俱乐部', 6, 14),
(18, 'KTV', 6, 15),
(19, '洗浴足疗', 6, 16),
(20, '美容', 6, 17),
(21, '健身', 6, 18),
(22, '运动', 6, 19),
(23, '票务', 6, 20),
(24, '快餐', 7, 22),
(25, '火锅', 7, 24),
(26, '海鲜', 7, 25),
(27, '川菜', 7, 26),
(28, '京菜', 7, 27),
(29, '粤菜', 7, 28),
(30, '湘菜', 7, 29),
(31, '家常', 7, 30),
(32, '西餐', 7, 31),
(33, '风味', 7, 32),
(34, '家政保洁', 8, 34),
(35, '搬家', 8, 35),
(36, '房产中介', 8, 36),
(37, '快递', 8, 37),
(38, '婚纱影楼', 8, 38),
(39, '婚庆礼仪', 8, 39),
(40, '婚介交友', 8, 40),
(41, '旅行社', 9, 42),
(42, '度假村', 9, 43),
(43, '景点', 9, 44),
(44, '酒店宾馆', 9, 45),
(45, '交通票务', 9, 46),
(46, '商场超市', 10, 48),
(47, '家电数码', 10, 49),
(48, '休闲运动', 10, 50),
(49, '文化艺术', 10, 51),
(50, '保健美容', 10, 52),
(51, '服装皮具', 10, 53),
(52, '眼镜钟表', 10, 54),
(53, '珠宝首饰', 10, 55),
(54, '外语', 11, 57),
(55, 'IT', 11, 58),
(56, '家教', 11, 59),
(57, '管理财务', 11, 60),
(58, '艺术影视', 11, 61),
(59, '远程教育', 11, 62),
(60, '技能认证', 11, 63),
(61, '留学移民', 11, 64),
(62, '装饰装修', 12, 66),
(63, '设计装修', 12, 67),
(64, '家居广场', 12, 68),
(65, '建材市场', 12, 69),
(66, '门窗', 12, 70);

-- --------------------------------------------------------

--
-- 表的结构 `my_coupon`
--

CREATE TABLE IF NOT EXISTS `my_coupon` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(5) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL,
  `pre_picture` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `begindate` int(10) NOT NULL DEFAULT '0',
  `enddate` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `des` varchar(50) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `ctype` enum('折扣券','抵价券') NOT NULL DEFAULT '折扣券',
  `sup` varchar(3) NOT NULL,
  `prints` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `comments` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `grade` smallint(5) unsigned NOT NULL DEFAULT '1',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `hit` int(10) NOT NULL DEFAULT '0',
  `qq` int(8) NOT NULL,
  `web_address` char(100) NOT NULL,
  `qq_qun` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`),
  KEY `areaid` (`areaid`),
  KEY `userid` (`userid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_coupon_category`
--

CREATE TABLE IF NOT EXISTS `my_coupon_category` (
  `cate_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `cate_view` tinyint(1) NOT NULL DEFAULT '1',
  `cate_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `my_coupon_category`
--

INSERT INTO `my_coupon_category` (`cate_id`, `cate_name`, `cate_view`, `cate_order`) VALUES
(9, '美食', 1, 1),
(10, '休闲', 1, 2),
(11, '女性', 1, 3),
(12, '出行', 1, 4),
(13, '摄影', 1, 5),
(14, '其它', 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `my_crons`
--

CREATE TABLE IF NOT EXISTS `my_crons` (
  `cronid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cronid`),
  KEY `nextrun` (`nextrun`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `my_crons`
--

INSERT INTO `my_crons` (`cronid`, `name`, `lastrun`, `nextrun`, `day`) VALUES
(1, 'information', 1539303844, 1539360000, 1),
(16, 'advertisement', 1539303844, 1539360000, 1),
(17, 'levelup', 1539303844, 1539360000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_faq`
--

CREATE TABLE IF NOT EXISTS `my_faq` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(5) NOT NULL,
  `title` char(100) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `my_faq`
--

INSERT INTO `my_faq` (`id`, `typeid`, `title`, `content`) VALUES
(2, 5, '如何成为本站的注册用户？', '注册其实很简单，只要按照如下提示操作便可。 <br />\r\n<br />\r\n1、进入网站首页，点击右上角“注册”按钮； <br />\r\n<br />\r\n2、进入到“注册”页面，根据提示信息，填写您的昵称、密码、邮箱之后，点击“注册”即可。 <br />\r\n<br />\r\n3、如果需要发布信息，在会员中心中，可以直接点击“立即免费发布信息”按钮或点击由上角的“免费发布信息”图标。 <br />\r\n<br />'),
(3, 5, '昵称有什么用？可以更改吗？', '1、昵称是你登陆本网的通行证，每个人都会有一个唯一标识的昵称，您所发布的每一条信息中也会显示出来，它是您在本网站身份的标志。目前本网站上的昵称(账号)是不允许修改的。建议用户注册时请选择您喜欢并能牢记的账号。 <br />\r\n<br />\r\n2、昵称是不能够修改的，就好像现实生活里的人名一样。 <br />\r\n<br />\r\n3、昵称将伴随你度过在本网站的快乐每一天。 <br />'),
(4, 5, '怎么登录会员管理中心？', '在注册成为本网站用户后，你就可以使用账号(即昵称)登录会员管理中心了，跟着我们来看看详细操作步骤吧： <br />\r\n<br />\r\n1、进入本网首页－＞点击右上角“登录” <br />\r\n<br />\r\n2、输入您的昵称与密码，点击“登录”。 <br />\r\n<br />\r\n3、恭喜您登陆成功，你可以发布信息或浏览信息，随你开心。 <br />\r\n<br />'),
(6, 5, '我的密码忘记了怎么办？', '如果您忘记了账号密码，别担心，您可以通过点击“登录”进入快速登录页面,点击该页面左小角中的“忘记密码 我要找回”按钮获得。<br />\r\n<br />\r\n1、进入到找回密码页面后,如果您曾设置了密保，那么直接在页面中输入密保问题与答案便可找回。 <br />\r\n<br />\r\n2、如果您没有设置密保，您也可以联系客服帮您重设密码。'),
(7, 2, '在本站发布信息要收费吗？', '1、本站是一个免费的生活信息交流平台。 <br /><br />2、我们为广大普通用户提供永久免费发布生活信息的服务。'),
(22, 4, '诚信认证流程', '一、认证目的 <br /><br />诚信认证包括个人身份认证和商家营业执照认证，本网站推出诚信认证是为规范网站诚信秩序，解决部分垃圾、虚假、违法等不良信息，提高信息真实性与可信度，也在一定程度上保证验证用户的信息质量高于非验证用户的信息质量，让用户查询使用信息更放心，给用户一个良好的诚信网络交流环境；同时，对处理不良、违法信息也会有很大帮助，有资料依据，每位认证后的用户应对所发布的信息负有诚信和法律责任。 <br /><br />二、认证规则 <br /><br />用户自愿、免费认证的原则。 <br />1. 个人身份认证中一个身份证只能认证一个用户名，用户须上传真实的个人身份资料； <br />2. 商家营业执照认证中公司姓名须与营业执照上完全一致，如果申请人不是公司法定代表人，请下载委托书，填写后再上传身份证彩色原件扫描件。 <br /><br />三、认证方式 <br /><br />1. 传真申请，须传真身份证或者营业执照复印件 <br />2. 在线申请，须填写相关认证信息，同时上传彩色原件扫描件。 <br />所有本网站用户都可以免费使用认证服务，认证流程简单，通过认证增加真实性和诚信度，可免费获得象征更值得信赖的认证用户身份标识 ，同时所发布的信息将获得免费更多展示与反馈，信息可免费展示在列表页&ldquo;诚信用户专区&rdquo;。 <br /><br /><br />四、认证审核标准 <br /><br />1.个人身份认证中一个身份证只能认证一个用户名，商家营业执照认证中公司姓名须与营业执照上完全一致，如果申请人不是公司法定代表人，请下载委托书，填写后再上传身份证彩色原件扫描件。 <br /><br />2. 认证时账号被他人使用 <br />须提交本人身份证原件复印件和户口复印件，审核通过后将使用账号封锁，并且该身份证不能申请认证，确保账号安全。 <br /><br /><br />3. 对实名资料的保密承诺 <br />通过认证后的实名资料将不能取消与更改，本网站将对您的真实姓名、身份证号码等信息资料，采取严格的保密措施，绝不会公开或者提供给除公安局以外的任何其他第三方。 <br /><br /><br />五、认证用户守则 <br /><br />1. 认证后的商家用户须保证信息的真实性，不得有虚假、违法、不良信息，要遵守版规发布信息。对于被用户投诉的商家，管理员将视情况处理，采取警告、取消商家资格、待审核或封锁其账号等处罚方式，后果严重者将配合用户追究相关商家法律责任。 <br /><br />2. 各商家之间要和睦相处，不得有诋毁、谩骂、人身攻击等行为。如果对别的商家有意见，可以通过站内短信息提出，并且尽可能地提出改善建议。对于恶意攻击行为（包括用马甲攻击），管理员将视情节采取书面警告、取消商家资格、待审核或封锁其账号等处罚方式。'),
(23, 2, '为什么我的信息是“待审核”？', '<div>为了保证本站的信息质量，我们对部分信息设置了“待审核”状态，“待审核”的信息有以下几种情况，不管您是哪种情况，我们编辑都会及时处理。 <br />\r\n<br />\r\n1、为了保证本站上的绝大多数信息合法、规范，我们会在后台设置关键字的屏蔽的功能，当您的信息含有违法、严重违规或者语言粗俗不雅、侮辱他人、产生歧义等内容，系统将会把这条信息自动列入“待审核”当中。 <br />\r\n<br />\r\n2、如果您的信息重复发表两条以上、联系方式为外地、信息缺少关键内容等情况下，也许会被本站列入“待审核”当中。 <br />\r\n<br />\r\n3、您的联系方式若之前有其他账号使用发布过信息，那么您的信息也会自动进入“待审核”状态中，遇到这样的情况，您可以联系我们进行确认，以避免他人使用您的联系方式。 <br />\r\n<br />\r\n4、当然，汉字语义丰富，也许您的某些非上述有争议性的内容发布时同样遇到这样的问题未能解决，建议您与本站客服取得联系。 <br />\r\n<br />\r\n5、 “待审核”的信息24小时内会审核完，通过审核后的信息会公布出来，没通过审核的信息将被移入“回收站”中</div>'),
(24, 1, '置顶有哪几种形式？', '<p>\r\n	置顶有3种形式，大类置顶，小类置顶和首页置顶。\r\n</p>\r\n<p>\r\n	大类置顶：可在小分类下置顶信息，可以采用分类信息的页面样式；\r\n</p>\r\n<p>\r\n	小类置顶：可在小分类下置顶信息，可以采用分类信息的页面样式；\r\n</p>\r\n<p>\r\n	首页置顶：可在首页置顶信息，可以采用分类信息的页面样式；\r\n</p>'),
(25, 1, '置顶有什么好处？', '<p>\r\n	信息置顶后，就能够很容易被更多的人关注到。因为网友在浏览信息时都会先浏览靠前的内容，这样您发布信息的有效性就得到了保障。置顶信息获得的关注是普通信息的20倍。\r\n</p>'),
(26, 1, '置顶是什么？', '<p>\r\n	信息置顶是本站为用户提供的增值服务，对自己已经发布成功的信息，您可以联系本站工作人员咨询置顶业务。置顶后该信息就会在该类别的列表页中长时间处在靠前的固定位置，并带醒目图标 \r\n。置顶信息会引起用户更多关注，不会因为有新的帖子发布，而使您的帖子被挤到后边，以至于无法被关注到。\r\n</p>'),
(27, 1, '刷新是什么？', '刷新信息相当于您把这个信息重新发布一次，信息会再次排到该类别列表页面的靠前位置。&nbsp;<br />'),
(28, 2, '为什么我发布不了信息？', '<p>\r\n	<strong>为了营造良好的网络氛围，您的账号发布不了信息或者登录不了，可能有以下原因：<br />\r\n<br />\r\n</strong> \r\n</p>\r\n1、我们根据每个分类版块限制了发布数量，你已经在该分类下达到了发布数量上限； <br />\r\n<p>\r\n	<br />\r\n</p>\r\n2、为什么我发布信息时提示我“信息内包含非法词”？ <br />\r\n非法词是指由司法机关、主管部门、网监提供的词汇表，请大家不要发布违法信息，填写完后检查一下发布内容避免无意行为。<br />\r\n<p>\r\n	<br />\r\n</p>\r\n3、为什么信息发布成功后显示“审核中”？ <br />\r\n所有发布的信息，都会先进审核区，等工作人员审核通过后才会开放出来，我站审核人员在24小时内会提供给您审核结果。<br />\r\n<p>\r\n	<br />\r\n</p>\r\n4、为什么发布信息时提示我“发布信息太过频繁”？ <br />\r\n为了防止部分用户的恶意发帖行为，我们对发帖速度进行了限制，这时建议大家稍微休息一下再发布。 <br />\r\n<p>\r\n	<br />\r\n</p>\r\n5、为什么发布信息时提示我 “信息重复”？ <br />\r\n相同的信息不允许重复发布，建议您在发布时对信息进行修改。您还可以选择在用户中心中的“刷新”来代替发布。 <br />\r\n<p>\r\n	<br />\r\n</p>\r\n6、为什么我发布不了帖子（怎么清除浏览器缓存）？ <br />\r\n当您遇到以下问题时，可以尝试清除浏览器IE临时文件或重置浏览器选项后重试: <br />\r\n1. 点击“发布”按钮无反应；<br />\r\n2. 点击“发布”按钮后，按钮为灰色，页面不跳转；<br />\r\n3. 提示可以发布0条信息；<br />\r\n4. 无法上传图片，导致发布不了信息 <br />'),
(29, 6, '警惕钓鱼网站', '<p>\r\n	<strong>什么是钓鱼网站？</strong><br />\r\n钓鱼网站通常伪装成为银行网站、淘宝店铺等这些可以利用网上交易并引导激发用户的消费行 \r\n为的网站，窃取访问者提交的账号和密码信息。它一般通过电子邮件传播，此类邮件中一个经过伪装的链接将收件人联到钓鱼网站，或者通 \r\n过信息内容里带有网站链接的行为来诱惑用户进到该网站中。\r\n</p>\r\n<p>\r\n	<strong>钓鱼网站的常见的类型</strong><br />\r\n钓鱼网站的页面与真实网站界面完全一致，要求访问者提交账号和密码。一般来说钓鱼网 \r\n站结构很简单，只有一个或几个页面，URL和真实网站有细微差别，钓鱼最常见的，一般来说还是针对淘宝的比较多。<br />\r\n如真实的工行网站 \r\n为www.icbc.com.cn，针对工行的钓鱼网站则有可能为www.1cbc.com.cn。<br />\r\n真实的淘宝店铺的网址为http://www.taobao.com/，针对淘宝 \r\n的钓鱼网站则有可能是 \r\nhttp://list.taobao.com/<br />\r\nhttp://ship.36165279taobao.com/<br />\r\nhttp://taobao.gegecn.com.cn<br />\r\nhttp://taobao0.com<br />\r\nhttp://w \r\nww.taobaoxaq.com.cn/<br />\r\nhttp://www.Taobaveng.cn<br />\r\nhttp://www.paokn.com/taobao<br />\r\nhttp://www.teobao.com<br />\r\nhttp://www.taoob \r\nao.com<br />\r\nhttp://taobaoa.w31.100dns.com/<br />\r\nhttp://www.taobaoy.com<br />\r\nhttp://taobao-hb.cn/<br />\r\n应该特别小心由不规范的字母数 \r\n字组成的CN类网址，最好禁止浏览器运行JavaScript和ActiveX代码，不要上一些不太了解的网站。\r\n</p>\r\n<p>\r\n	<strong>如何防止被骗</strong><br />\r\n以上这些都是直接链接到淘宝的真网址的，除了登录和支付的两个页面是他们做的，其他都链接到 \r\n真的淘宝网址，不良商家就是利用了顾客对淘宝官网的信任，通过在官方上注册正式的网店，再以QQ引导顾客登录内容相同的假淘宝网店网 \r\n址，窃取顾客的支付宝账号与密码并从中敛财获利。类似这样的事情很多，在这里想提醒大家的是，淘宝交易的变换形式多种多样，但还是 \r\n会有规律的，前缀都是“taobao”，只在后缀上有小小区别，或者相反，顾客如不认真比对很难看出破绽，大家如果不懂淘宝，就请切记淘 \r\n宝的真实网站。如果碰到类似的需要淘宝交易的网站，请让卖方提供淘宝的店铺名称，然后进http://www.taobao.com/这个真实的淘宝店铺里，用“阿里旺旺”在淘宝里和卖方交易，因为阿里旺旺有识别真假淘宝的功能，真网址会显示安全，假的会有提示告诫。\r\n</p>'),
(30, 6, '常见骗子手法揭秘', '<div>\r\n	<h3>\r\n		骗子的基本手段\r\n	</h3>\r\n	<p>\r\n		一直以来，网络骗子层出不穷，但万变不离其宗，都是换汤不换药的方法，化龙巷分类信息通过对骗子的仔细研究，为广大用户总结一些规律性 的东西：\r\n	</p>\r\n	<p>\r\n		<strong>1、</strong>出售商品均以“出售XXXX,价格XXX，有意的加Q详聊”这些贴子大家都要小心留意一下，而且这些贴子出所售的商 \r\n品价格都会比市面上便宜许多，这就得留意了，不要贪图小便宜，贪多必 失！\r\n	</p>\r\n	<p>\r\n		<strong>2、</strong>骗子通常都不会支持第三方，只会先打款或者先商品，提到支付宝或者财会通什么的第三方软件就说不会用，这时 \r\n候就要注意了，宁可另寻觅一台，也不要兵行险着！认真想一下到底是人<br />\r\n家的商品好重要还是自己的辛苦钱重要！\r\n	</p>\r\n	<p>\r\n		<strong>3、</strong>某些骗子的手法有一点点高（其实也一眼就能看穿的），他们手上确实是有商品，但并不是真的想卖，只是用作诱饵，先把商品的照片拍了上来，然后静等大鱼上钓，交易的时候要求先款一半，然后说会把商品邮给你，没有问题再把另外一半的钱给 \r\n的打过来，这样就正中下怀了，不要以为自己的权益有了保障，想一下自己有什么利益可言吧，不是被骗了全部，而是被骗了一半！\r\n	</p>\r\n	<p>\r\n		<strong>4、</strong>换商品或者求商品的这种骗子也会采用以上的方法，然后说交易方式的时候当然也不会采用第三方支付，而是要求 \r\n先商品后款，先款不行就会说可以大家同时把商品邮寄出去，这就要用正<br />\r\n规的邮寄公司交易了，不过这种方法确实是有，只是上当的人 应该不会很多吧~\r\n	</p>\r\n	<p>\r\n		<strong>5、</strong>还有一种就是骗子说快递公司代收的业务，这也是不可信的，正规的快递公司几乎没有这种业务。\r\n	</p>\r\n	<h3>\r\n		最实用的防骗方法\r\n	</h3>\r\n	<p>\r\n		<strong>1、</strong>最好一定要当面交易，这是最好的交易方式，骗子其实明知道你和他不是一个地方的，所以骗子一般会先提出要当成交易，这样先让你心里放松一下，让你觉得他是真诚的，其实他根本就 \r\n知道你不可能跟他当成交易，然后还会问你有没有亲戚朋友什么的 在那边，切记，遇到这样的，直接拉黑吧。\r\n	</p>\r\n	<p>\r\n		<strong>2、</strong>交易一定要用第三方支付平台，这样大家都有保障，不支持第三方的或者不能见面交易的就根本不要理会，另外再 \r\n找吧，这肯定是骗子。\r\n	</p>\r\n	<p>\r\n		<strong>3、</strong>在交易前最好先百度一下对方的QQ号码或者手机号码，网络上一般都留有骗子的信息的。\r\n	</p>\r\n	<p>\r\n		<strong>4、</strong>不要和对方聊的开心就称兄道弟而忘记了自己的利益，有的骗子就会运用心理战术，从语言上先让你觉得他很真诚 \r\n能让你相信他，一定要记住，我是在交易，而不是在交朋友，时刻要把利 益摆在第一位，安全交易才是硬道理。\r\n	</p>\r\n	<p>\r\n		<strong>5、</strong>不要以为在校学生就不会是骗子，现在很多骗子都是大学生呢，更得小心谨慎。\r\n	</p>\r\n	<p>\r\n		<strong>5、</strong>邮递方式一定要用正规的邮递公司，例如EMS、顺丰、申通等等。\r\n	</p>\r\n	<p>\r\n		<strong>6、</strong>第三方交换商品虽然麻烦，但这是除了面交之外的最安全的交易方法，因为要走法律程序，所以一定会有时间上的 \r\n耽误，但一定切记，这样才不会被骗。\r\n	</p>\r\n</div>'),
(31, 6, '互联网防骗指南', '<div>\r\n	邮件短信假链接<br />\r\n<br />\r\n1.短信诈骗耍花样 \r\n验证手机偷密码<br />\r\n突然收到条“系统”短信说验证手机长期未验证需要验证，要回复账户密码的用户更要注意了，化龙巷分类信息是不会发送任何要求用户回复账户和密码的短信的。<br />\r\n<br />\r\n2.特价机票满天飞 \r\n转账套钱现原形<br />\r\n随着春运大幕的拉开，“特价机票”悄然成为搜索热门词汇，“假机票网”也迎来了 \r\n自己的“旺季”。不法分子常以超低折扣引诱消费者订票，骗取钱财，甚至直接套取用户的银行账户和密码。不要为贪图一点小便宜导致即 \r\n损失了钱财，也买不到回家过年的那张“通行证”。为了大家可以快快乐乐的过一个欢庆的新年，请大家多加注意了。<br />\r\n<br />\r\n3.谁说账号有异常 \r\n原是骗子想钓鱼<br />\r\n随着现在骗子对互联网越来越熟悉，各种新招式层出不穷，冒充化龙巷分类信息给客户发送钓鱼邮件就是一 \r\n个新例子，请大家不要相信要求你填写化龙巷账户密码的那些邮件，化龙巷分类信息是不会要求您在邮件中填写这些信息的，那些都是骗子的邮件，只要 \r\n您填写下去就会被那个发这个邮件的人修改您的密码的，账户有余额的客户尤其要注意了。<br />\r\n<br />\r\n4.周年庆典被炒作 \r\n中奖欺诈要提防<br />\r\n化龙巷分类信息不会给用户发送邮件让用户去参加所谓 的“狂欢”。所以大家要注意这种邮件了哦。\r\n</div>'),
(32, 2, '电话被冒用', '<div>\r\n	请提供被冒用的（信息编号、冒用号码），联系我站工作人员。\r\n</div>'),
(33, 2, '我要删除信息', '<p>\r\n	<span style="font-family:宋体;">1，在顶部点击“修改</span><span>/</span><span style="font-family:宋体;">删除信息”。</span>\r\n</p>\r\n<p>\r\n	<span style="font-family:宋体;">2，登录</span><span style="font-family:宋体;">用户中心，我发布的信息内，您可以选择修改、删除、刷新等操作。</span>\r\n</p>'),
(34, 2, '信息为什么不显示？', '<div>\r\n	1、如果信息含有敏感词汇、特殊字符或版规限制的内容，就需要工作人员审核通过后才能公开显示（审核时间为24小时之内）。\r\n</div>\r\n<div>\r\n</div>\r\n<div>\r\n	2、信息状态待完善，您的信息需要您修改完善后才能公开展示。根据要求修改完善信息，并通过本站工作人员审核成功后，才能公开展示（审核时间为24小时之内）。\r\n</div>\r\n<div>\r\n</div>\r\n<div>\r\n	3、修改过的信息时间会更新但在列表中的位置不会变。如果想信息再次排到该类别列表页面的靠前位置，您可以点击“刷新”。\r\n</div>');

-- --------------------------------------------------------

--
-- 表的结构 `my_faq_type`
--

CREATE TABLE IF NOT EXISTS `my_faq_type` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `typename` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `my_faq_type`
--

INSERT INTO `my_faq_type` (`id`, `typename`) VALUES
(1, '置顶与刷新'),
(2, '信息发布与删除'),
(4, '认证服务'),
(5, '用户注册与登录'),
(6, '防骗常识');

-- --------------------------------------------------------

--
-- 表的结构 `my_flink`
--

CREATE TABLE IF NOT EXISTS `my_flink` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ifindex` tinyint(1) NOT NULL DEFAULT '1',
  `catid` mediumint(6) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL,
  `webname` char(30) NOT NULL DEFAULT '',
  `weblogo` char(250) NOT NULL DEFAULT '',
  `dayip` char(20) NOT NULL,
  `pr` smallint(1) NOT NULL,
  `msg` char(200) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `email` char(50) NOT NULL DEFAULT '',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ischeck` smallint(1) NOT NULL DEFAULT '1',
  `ordernumber` int(8) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordernumber` (`ordernumber`),
  KEY `ischeck` (`ischeck`),
  KEY `weblogo` (`weblogo`),
  KEY `ifindex` (`ifindex`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_flink`
--

INSERT INTO `my_flink` (`id`, `ifindex`, `catid`, `url`, `webname`, `weblogo`, `dayip`, `pr`, `msg`, `name`, `qq`, `email`, `typeid`, `ischeck`, `ordernumber`, `createtime`) VALUES
(1, 2, 0, 'http://www.mymps.com.cn', '蚂蚁分类信息系统', '', '1000以下', 0, '合作伙伴', '村长', '3388888888', 'mymps@qq.com', 1, 2, 2, 1267535588);

-- --------------------------------------------------------

--
-- 表的结构 `my_flink_type`
--

CREATE TABLE IF NOT EXISTS `my_flink_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `my_flink_type`
--

INSERT INTO `my_flink_type` (`id`, `typename`) VALUES
(1, '门户网站'),
(2, '分类信息'),
(4, '论坛博客'),
(8, '其它类别');

-- --------------------------------------------------------

--
-- 表的结构 `my_focus`
--

CREATE TABLE IF NOT EXISTS `my_focus` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `pre_image` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `words` varchar(50) NOT NULL,
  `pubdate` int(11) NOT NULL,
  `focusorder` smallint(5) unsigned NOT NULL,
  `typename` enum('网站首页','新闻首页') NOT NULL DEFAULT '网站首页',
  PRIMARY KEY (`id`),
  KEY `image` (`image`),
  KEY `url` (`url`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `my_focus`
--

INSERT INTO `my_focus` (`id`, `image`, `pre_image`, `url`, `words`, `pubdate`, `focusorder`, `typename`) VALUES
(1, '/attachment/focus/1539243440qdkup.jpg', '/attachment/focus/pre_1539243440qdkup.jpg', 'http://', '大美芜湖', 1539243440, 3, '网站首页'),
(2, '/attachment/focus/1539243468omfrd.jpg', '/attachment/focus/pre_1539243468omfrd.jpg', 'http://', '大美芜湖', 1539243468, 2, '网站首页'),
(3, '/attachment/focus/1539243494o9mxa.jpg', '/attachment/focus/pre_1539243494o9mxa.jpg', 'http://', '大美芜湖', 1539243494, 3, '网站首页'),
(4, '/attachment/focus/1539246287exvyo.jpg', '/attachment/focus/pre_1539246287exvyo.jpg', 'http://', '大美芜湖', 1539246287, 1, '新闻首页'),
(5, '/attachment/focus/1539246314wt9am.jpg', '/attachment/focus/pre_1539246314wt9am.jpg', 'http://', '大美芜湖', 1539246314, 2, '新闻首页');

-- --------------------------------------------------------

--
-- 表的结构 `my_goods`
--

CREATE TABLE IF NOT EXISTS `my_goods` (
  `goodsid` int(10) NOT NULL AUTO_INCREMENT,
  `goodsbh` varchar(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `goodsname` varchar(100) NOT NULL,
  `catid` smallint(3) NOT NULL,
  `oldprice` varchar(8) NOT NULL,
  `nowprice` varchar(8) NOT NULL,
  `huoyuan` tinyint(1) NOT NULL,
  `gift` varchar(100) NOT NULL,
  `oicq` varchar(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `pre_picture` varchar(255) NOT NULL,
  `rushi` tinyint(1) NOT NULL,
  `tuihuan` tinyint(1) NOT NULL,
  `jiayi` tinyint(1) NOT NULL,
  `weixiu` tinyint(1) NOT NULL,
  `fahuo` tinyint(1) NOT NULL,
  `zhengpin` tinyint(1) NOT NULL,
  `tuijian` tinyint(1) NOT NULL,
  `cuxiao` tinyint(1) NOT NULL,
  `remai` tinyint(1) NOT NULL,
  `baozhang` tinyint(1) NOT NULL,
  `onsale` tinyint(1) NOT NULL DEFAULT '1',
  `hit` int(10) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`goodsid`),
  KEY `userid` (`userid`,`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_goods`
--

INSERT INTO `my_goods` (`goodsid`, `goodsbh`, `userid`, `goodsname`, `catid`, `oldprice`, `nowprice`, `huoyuan`, `gift`, `oicq`, `content`, `picture`, `pre_picture`, `rushi`, `tuihuan`, `jiayi`, `weixiu`, `fahuo`, `zhengpin`, `tuijian`, `cuxiao`, `remai`, `baozhang`, `onsale`, `hit`, `dateline`) VALUES
(1, '20181011x8y', '18815539872', '小米5S 4+128版本 99新', 8, '3000', '2899', 1, '本商品无赠送礼品', '18815539872', '<img src="/attachment/editor/201810/1539241645poaxq.jpg" alt="" />', '', '', 0, 1, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 1539241649),
(2, '20181011hy7', '18815539872', 'kindle kpw3不伤眼阅读器', 69, '999', '899', 1, '本商品无赠送礼品', '18815539872', '<p>\r\n	<img src="/attachment/editor/201810/15392417988qx2b.jpg" alt="" /> \r\n</p>\r\n<p>\r\n	<img src="/attachment/editor/201810/1539241817sqtze.jpg" alt="" /> \r\n</p>', '', '', 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 7, 1539323568),
(3, '20181012pya', '18815539872', '索尼（SONY）MDR-XB950N1 无线蓝牙 降噪立体声耳机', 69, '1599', '1179', 1, '本商品无赠送礼品', '18815539872', '<div style="padding:30px 0px 0px;text-align:center;color:#333333;font-family:&quot;">\r\n	<h1 style="font-size:30px;color:#000000;">\r\n		索尼MDR-XB950N1耳麦 （头戴式 立体声 蓝牙 降噪 低音 黑色）\r\n	</h1>\r\n<br />\r\n</div>\r\n<div style="font-size:0px;font-family:arial;margin:0px;color:#333333;">\r\n	<div style="margin:0px auto;">\r\n		<br />\r\n	</div>\r\n	<div style="margin:0px auto;">\r\n	</div>\r\n</div>\r\n<div style="color:#333333;font-family:&quot;">\r\n	<div style="font-size:16px;">\r\n		<div style="font-size:0px;font-family:arial;margin:0px;padding:0px 0px 0px 15px;">\r\n			<div style="margin:0px auto;">\r\n				<div style="margin:0px auto;">\r\n				</div>\r\n			</div>\r\n		</div>\r\n		<p style="font-family:&quot;">\r\n			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;索尼<a href="http://detail.zol.com.cn/microphone/index1169560.shtml">MDR-XB950N1</a>是索尼公司推出的一款头戴式降噪<a href="http://detail.zol.com.cn/microphone/">耳机</a>，<a href="http://detail.zol.com.cn/microphone/index1169560.shtml">索尼MDR-XB950N1</a>耳机是一款性能强劲的降噪耳机，其除了拥有不俗的整体音质表现之外，整体的设计也是很出色的。最大功率：3W，采用锂电池。目前这款耳机正在<a href="https://item.jd.com/18372525301.html">京东 良品海外专营店</a>火热销售中，价格仅为1599元，喜欢的朋友可以关注一下。\r\n		</p>\r\n		<div style="background:#F6F6F6;border:1px solid #E8E8E8;padding:10px;margin:20px auto;">\r\n			<p style="font-size:14px;font-family:&quot;">\r\n				<br />\r\n			</p>\r\n			<p style="font-size:0px;font-family:&quot;">\r\n				<a href="https://item.jd.com/18372525301.html" target="_blank">马上抢购</a>\r\n			</p>\r\n		</div>\r\n		<p style="font-family:&quot;text-align:center;">\r\n			<span style="font-size:0px;line-height:0;"></span><span style="font-size:0px;line-height:0;"></span><img src="https://2c.zol-img.com.cn/product/182_650x500/782/cefd3fOMEQ7bo.jpg" width="640" height="480" alt="索尼MDR-XB950N1" align="no" />\r\n		</p>\r\n<br />\r\n		<p align="center" style="font-family:&quot;">\r\n			<img src="https://2f.zol-img.com.cn/product/182_650x500/797/cesMl8jUyRzJE.jpg" /><br />\r\n<strong>索尼MDR-XB950N1</strong>\r\n		</p>\r\n		<p style="font-family:&quot;">\r\n			购买此款商品有赠品：\r\n		</p>\r\n		<p style="font-family:&quot;">\r\n			收货后 评价晒图 赠福利 请联系客服领 福利包\r\n		</p>\r\n	</div>\r\n</div>', '', '', 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 2, 1539323354);

-- --------------------------------------------------------

--
-- 表的结构 `my_goods_category`
--

CREATE TABLE IF NOT EXISTS `my_goods_category` (
  `catid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `if_view` tinyint(1) NOT NULL DEFAULT '1',
  `color` char(10) NOT NULL,
  `catname` varchar(32) NOT NULL,
  `title` varchar(250) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `catorder` smallint(6) NOT NULL,
  PRIMARY KEY (`catid`),
  KEY `parentid` (`parentid`),
  KEY `catname` (`catname`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- 转存表中的数据 `my_goods_category`
--

INSERT INTO `my_goods_category` (`catid`, `if_view`, `color`, `catname`, `title`, `keywords`, `description`, `parentid`, `catorder`) VALUES
(1, 2, '', '运动/户外/休闲', '运动/户外/休闲', '运动/户外/休闲', '运动/户外/休闲', 0, 1),
(2, 2, '', '女士服装/内衣', '女士服装/内衣', '女士服装/内衣', '女士服装/内衣', 0, 2),
(3, 2, '', '男士服装与配件', '男士服装与配件', '男士服装与配件', '男士服装与配件', 0, 3),
(4, 2, '', '装潢/居家/家具', '装潢/居家/家具', '装潢/居家/家具', '装潢/居家/家具', 0, 4),
(5, 2, '', '电器/厨房用品/保健', '电器/厨房用品/保健', '电器/厨房用品/保健', '电器/厨房用品/保健', 0, 5),
(6, 2, '', '汽车/摩托车/自行车', '汽车/摩托车/自行车', '汽车/摩托车/自行车', '汽车/摩托车/自行车', 0, 6),
(7, 2, '', '珠宝/饰品/手表/眼镜', '珠宝/饰品/手表/眼镜', '珠宝/饰品/手表/眼镜', '珠宝/饰品/手表/眼镜', 0, 7),
(8, 2, '', '电脑/网络/办公', '电脑/网络/办公', '电脑/网络/办公', '电脑/网络/办公', 0, 8),
(9, 2, '', '特价机票/门票旅游/酒店', '特价机票/门票旅游/酒店', '特价机票/门票旅游/酒店', '特价机票/门票旅游/酒店', 0, 9),
(10, 2, '', '运动服', '运动服', '运动服', '运动服', 1, 11),
(11, 2, '', '野营', '野营', '野营', '野营', 1, 12),
(12, 2, '', '游泳用品', '游泳用品', '游泳用品', '游泳用品', 1, 13),
(13, 2, '', '运动包', '运动包', '运动包', '运动包', 1, 14),
(14, 2, '', '户外军品', '户外军品', '户外军品', '户外军品', 1, 15),
(15, 2, '', '健美健身', '健美健身', '健美健身', '健美健身', 1, 16),
(16, 2, '', '瑜珈用品', '瑜珈用品', '瑜珈用品', '瑜珈用品', 1, 17),
(17, 2, '', '羽毛球', '羽毛球', '羽毛球', '羽毛球', 1, 18),
(18, 2, '', '其它', '其它', '其它', '其它', 1, 19),
(19, 2, '', '衬衫', '衬衫', '衬衫', '衬衫', 2, 21),
(20, 2, '', '小吊带', '小吊带', '小吊带', '小吊带', 2, 22),
(21, 2, '', '韩版', '韩版', '韩版', '韩版', 2, 23),
(22, 2, '', '牛仔裤', '牛仔裤', '牛仔裤', '牛仔裤', 2, 24),
(23, 2, '', '蕾丝雪纺', '蕾丝雪纺', '蕾丝雪纺', '蕾丝雪纺', 2, 25),
(24, 2, '', '小外套', '小外套', '小外套', '小外套', 2, 26),
(25, 2, '', '其它', '其它', '其它', '其它', 2, 27),
(26, 2, '', '外套', '外套', '外套', '外套', 3, 29),
(27, 2, '', '西服', '西服', '西服', '西服', 3, 30),
(28, 2, '', '男鞋', '男鞋', '男鞋', '男鞋', 3, 31),
(29, 2, '', '衬衫', '衬衫', '衬衫', '衬衫', 3, 32),
(30, 2, '', '凉鞋', '凉鞋', '凉鞋', '凉鞋', 3, 33),
(31, 2, '', '休闲包', '休闲包', '休闲包', '休闲包', 3, 34),
(32, 2, '', '皮带', '皮带', '皮带', '皮带', 3, 35),
(33, 2, '', '男士内衣', '男士内衣', '男士内衣', '男士内衣', 3, 36),
(34, 2, '', '男裤', '男裤', '男裤', '男裤', 3, 37),
(35, 2, '', '其它', '其它', '其它', '其它', 3, 38),
(36, 2, '', '时尚家饰', '时尚家饰', '时尚家饰', '时尚家饰', 4, 40),
(37, 2, '', '居家日用', '居家日用', '居家日用', '居家日用', 4, 41),
(38, 2, '', '家具', '家具', '家具', '家具', 4, 42),
(39, 2, '', '灯具', '灯具', '灯具', '灯具', 4, 43),
(40, 2, '', '厨具', '厨具', '厨具', '厨具', 4, 44),
(41, 2, '', '装潢卫浴', '装潢卫浴', '装潢卫浴', '装潢卫浴', 4, 45),
(42, 2, '', '文具天文', '文具天文', '文具天文', '文具天文', 4, 46),
(43, 2, '', '其它', '其它', '其它', '其它', 4, 47),
(44, 2, '', '厨房用品', '厨房用品', '厨房用品', '厨房用品', 5, 49),
(45, 2, '', '卫生保健', '卫生保健', '卫生保健', '卫生保健', 5, 50),
(46, 2, '', '个人护理', '个人护理', '个人护理', '个人护理', 5, 51),
(47, 2, '', '卫浴电器', '卫浴电器', '卫浴电器', '卫浴电器', 5, 52),
(48, 2, '', '其它', '其它', '其它', '其它', 5, 53),
(49, 2, '', '摩托车', '摩托车', '摩托车', '摩托车', 6, 55),
(50, 2, '', '自行车', '自行车', '自行车', '自行车', 6, 56),
(51, 2, '', '汽车', '汽车', '汽车', '汽车', 6, 57),
(52, 2, '', 'GPS定位', 'GPS定位', 'GPS定位', 'GPS定位', 6, 58),
(53, 2, '', '车内饰', '车内饰', '车内饰', '车内饰', 6, 59),
(54, 2, '', '其它', '其它', '其它', '其它', 6, 60),
(55, 2, '', '手表', '手表', '手表', '手表', 7, 62),
(56, 2, '', '太阳眼镜', '太阳眼镜', '太阳眼镜', '太阳眼镜', 7, 63),
(57, 2, '', '流行饰品', '流行饰品', '流行饰品', '流行饰品', 7, 64),
(58, 2, '', '纯银', '纯银', '纯银', '纯银', 7, 65),
(59, 2, '', '钻石水晶', '钻石水晶', '钻石水晶', '钻石水晶', 7, 66),
(60, 2, '', '黄金', '黄金', '黄金', '黄金', 7, 67),
(61, 2, '', '珍珠翡翠', '珍珠翡翠', '珍珠翡翠', '珍珠翡翠', 7, 68),
(62, 2, '', '其它', '其它', '其它', '其它', 7, 69),
(63, 2, '', '整机', '整机', '整机', '整机', 8, 71),
(64, 2, '', '笔记本', '笔记本', '笔记本', '笔记本', 8, 72),
(65, 2, '', '显示器', '显示器', '显示器', '显示器', 8, 73),
(66, 2, '', '软件', '软件', '软件', '软件', 8, 74),
(67, 2, '', '硬盘/移动硬盘', '硬盘/移动硬盘', '硬盘/移动硬盘', '硬盘/移动硬盘', 8, 75),
(68, 2, '', '键盘/鼠标', '键盘/鼠标', '键盘/鼠标', '键盘/鼠标', 8, 76),
(69, 2, '', '其它', '其它', '其它', '其它', 8, 77),
(70, 2, '', '特惠酒店', '特惠酒店', '特惠酒店', '特惠酒店', 9, 79),
(72, 2, '', '旅游卡券', '旅游卡券', '旅游卡券', '旅游卡券', 9, 81),
(73, 2, '', '酒店客栈', '酒店客栈', '酒店客栈', '酒店客栈', 9, 82),
(74, 2, '', '其它', '其它', '其它', '其它', 9, 83);

-- --------------------------------------------------------

--
-- 表的结构 `my_goods_order`
--

CREATE TABLE IF NOT EXISTS `my_goods_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) NOT NULL,
  `ordernum` smallint(5) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `qq` varchar(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goodsid` (`goodsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_goods_order`
--

INSERT INTO `my_goods_order` (`id`, `goodsid`, `ordernum`, `oname`, `tel`, `mobile`, `address`, `ip`, `qq`, `msg`, `dateline`) VALUES
(1, 3, 1, '刘志威', '05585523678', '18815539872', '柏庄丽城3#3#333', 'unknown', '18815539872', '只爱sony', 1539323448);

-- --------------------------------------------------------

--
-- 表的结构 `my_group`
--

CREATE TABLE IF NOT EXISTS `my_group` (
  `groupid` int(10) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `gname` varchar(250) NOT NULL,
  `cate_id` smallint(3) NOT NULL,
  `areaid` smallint(5) NOT NULL,
  `dateline` int(10) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `signintotal` smallint(5) NOT NULL DEFAULT '0',
  `glevel` tinyint(1) NOT NULL DEFAULT '0',
  `message` varchar(250) NOT NULL,
  `gaddress` varchar(250) NOT NULL,
  `meetdate` int(10) NOT NULL,
  `enddate` int(10) NOT NULL,
  `mastername` varchar(100) NOT NULL,
  `masterqq` int(11) NOT NULL,
  `des` varchar(250) NOT NULL,
  `content` mediumtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `pre_picture` varchar(255) NOT NULL,
  `commenturl` varchar(100) NOT NULL,
  `biztype` varchar(100) NOT NULL,
  `othercontent` mediumtext NOT NULL,
  `web_address` char(100) NOT NULL,
  PRIMARY KEY (`groupid`),
  KEY `areaid` (`areaid`),
  KEY `cate_id` (`cate_id`),
  KEY `userid` (`userid`),
  KEY `glevel` (`glevel`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_group`
--

INSERT INTO `my_group` (`groupid`, `userid`, `gname`, `cate_id`, `areaid`, `dateline`, `displayorder`, `signintotal`, `glevel`, `message`, `gaddress`, `meetdate`, `enddate`, `mastername`, `masterqq`, `des`, `content`, `picture`, `pre_picture`, `commenturl`, `biztype`, `othercontent`, `web_address`) VALUES
(1, '18815539872', '第一届婚纱与摄影专场团购会', 1, 1, 1539331565, 0, 0, 0, '', '芜湖市镜湖区世茂滨江写字楼', 0, 0, '', 0, '第一届婚纱与摄影专场团购会', '<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;"><strong><br />\r\n</strong>五金件是滑动门产品的重要组成部分，高质量的滑动门主要体现在滑轮系统及轨道的设计、制造和二者的完美结合上。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利滑动门的滑轮(底轮和顶轮)滑动平稳顺畅，使用寿命长达10万次以上，并荣获国家专利。凭借高新技术和实力，史丹利于2005年郑重承诺滑轮终身保用。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利滑动门边框轨道均采用最新的生产工艺：壁柜门边框采用德国先进技术，使表面附着材料更加紧密，不变形，完全避免起泡、开胶、凹凸不平等现象，而且环保没有污染。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利折叠门独特的弹簧合页，拥有独家专利设计，一指即开，可轻松开启壁柜空间，</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">完整的家居解决方案</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利壁柜门——不同材质和颜色的壁柜门衍生出不同的设计风格，完美地配合卧室整体风格。避免了传统柜体易受潮、占空间等缺点，更方便设计，更具时尚感。避免传统木制衣柜在设计和安放上的限制，为储物带来全新理念。&nbsp;</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利折叠门——小空间的最佳选择，即使是最小的玄关和拐角等不利空间也可以得到百分之百的利用；同时结合平开门和滑动门的优点，隐框设计保持家居的整体感，使房间更加简约雅致。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利隔断门——提供完善的现代空间分割解决方案。薄而轻的隔断门、配合不同色彩、不同图案和不同材质的门体材料，为空间提供了现代分割技术，创造出一个更贴近自然、更加开阔的居室空间，满足卧室、书房、卫生间、阳台、起居室等不同空间隔断需求，让房间变得可以随心所欲的选择开放或隐秘，变换不同的采光效果和视觉感受。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">史丹利金属搁架系统——轻巧时尚、坚固耐用，通透的结构，增加了房间的透光性，可任意组合，适合办公室、居室的应用场所。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">从专利的滑轮、五金设计制造，到整体方案的设计和应用，史丹利一直保持着行业的领导地位。</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">相关链接：</span><br />\r\n<span style="color:#555555;font-family:&quot;background-color:#FFFFFF;">1997年，史丹利率先把壁柜门概念引入中国；</span>', '/attachment/group/201810/1539331565mznch.png', '/attachment/group/201810/pre_1539331565mznch.png', '', '', '', ''),
(2, '18815539872', '吃遍芜湖VIP', 9, 1, 1539331620, 0, 0, 0, '', '芜湖市镜湖区世茂滨江写字楼', 0, 0, '', 0, '吃遍芜湖VIP', '<span>吃遍芜湖VIP</span>', '/attachment/group/201810/1539331620ob649.png', '/attachment/group/201810/pre_1539331620ob649.png', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `my_group_category`
--

CREATE TABLE IF NOT EXISTS `my_group_category` (
  `cate_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `cate_view` tinyint(1) NOT NULL DEFAULT '1',
  `cate_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `my_group_category`
--

INSERT INTO `my_group_category` (`cate_id`, `cate_name`, `cate_view`, `cate_order`) VALUES
(1, '家居团', 1, 1),
(2, '婚庆团', 1, 2),
(3, '买车团', 1, 3),
(4, '建材团', 1, 4),
(5, '找驴友', 1, 5),
(6, '母婴团', 1, 6),
(9, '其它', 1, 7);

-- --------------------------------------------------------

--
-- 表的结构 `my_group_signin`
--

CREATE TABLE IF NOT EXISTS `my_group_signin` (
  `signid` int(10) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) NOT NULL,
  `sex` enum('男','女') NOT NULL,
  `age` varchar(50) NOT NULL,
  `groupid` int(10) NOT NULL,
  `qqmsn` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `dateline` int(10) NOT NULL,
  `totalnumber` smallint(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `signinip` varchar(20) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`signid`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information`
--

CREATE TABLE IF NOT EXISTS `my_information` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `gid` smallint(5) NOT NULL,
  `catid` int(8) NOT NULL,
  `catname` varchar(32) NOT NULL,
  `areaid` int(8) NOT NULL,
  `begintime` int(11) NOT NULL,
  `activetime` smallint(3) NOT NULL,
  `endtime` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `userid` varchar(30) NOT NULL,
  `contact_who` char(10) NOT NULL,
  `qq` char(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `hit` int(10) NOT NULL DEFAULT '0',
  `ismember` tinyint(1) NOT NULL,
  `manage_pwd` char(32) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ip2area` varchar(32) NOT NULL,
  `info_level` tinyint(1) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `img_count` smallint(3) NOT NULL DEFAULT '0',
  `upgrade_type` tinyint(1) NOT NULL DEFAULT '1',
  `upgrade_time` int(10) NOT NULL,
  `upgrade_type_list` tinyint(1) NOT NULL DEFAULT '1',
  `upgrade_time_list` int(10) NOT NULL,
  `ifred` tinyint(1) NOT NULL DEFAULT '0',
  `ifbold` tinyint(1) NOT NULL DEFAULT '0',
  `certify` tinyint(1) NOT NULL DEFAULT '0',
  `dir_typename` varchar(100) NOT NULL,
  `html_path` varchar(100) NOT NULL,
  `upgrade_type_index` tinyint(1) NOT NULL,
  `upgrade_time_index` int(10) NOT NULL,
  `mappoint` varchar(100) NOT NULL,
  `web_address` char(100) NOT NULL,
  `latitude` decimal(20,17) NOT NULL,
  `longitude` decimal(20,17) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `ifred` (`ifred`),
  KEY `ifbold` (`ifbold`),
  KEY `tel` (`tel`),
  KEY `upgrade_type_index` (`upgrade_type_index`),
  KEY `begintime` (`begintime`,`info_level`,`id`),
  KEY `catid` (`catid`,`info_level`,`areaid`),
  KEY `upgrade_type_list` (`upgrade_type_list`,`begintime`,`id`),
  KEY `upgrade_type` (`upgrade_type`,`begintime`,`id`),
  KEY `gid` (`gid`,`info_level`,`areaid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `my_information`
--

INSERT INTO `my_information` (`id`, `title`, `gid`, `catid`, `catname`, `areaid`, `begintime`, `activetime`, `endtime`, `content`, `userid`, `contact_who`, `qq`, `email`, `tel`, `updatetime`, `hit`, `ismember`, `manage_pwd`, `ip`, `ip2area`, `info_level`, `img_path`, `img_count`, `upgrade_type`, `upgrade_time`, `upgrade_type_list`, `upgrade_time_list`, `ifred`, `ifbold`, `certify`, `dir_typename`, `html_path`, `upgrade_type_index`, `upgrade_time_index`, `mappoint`, `web_address`, `latitude`, `longitude`) VALUES
(15, '柏庄丽城精品房', 3, 50, '求租/求购', 1, 1539240491, 0, 0, '包包抽到的', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 0, 0, '', 'wap', '', 1, '/attachment/information/201810/pre_1539240491biboc.png', 2, 1, 0, 1, 0, 0, 0, 1, 'qiufang', '', 1, 0, '', '', '0.00000000000000000', '0.00000000000000000'),
(8, '芜湖大白网络诚邀您的加入！', 189, 122, '招商加盟', 1, 1539237390, 0, 0, '芜湖大白网络诚邀您的加入！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 2, 1, '', 'wap', 'wap', 1, '/attachment/information/201810/pre_1539237390xtvpt.jpg', 2, 1, 0, 1, 0, 0, 0, 1, 'zhaoshang', '', 2, 1539326670, '', '', '0.00000000000000000', '0.00000000000000000'),
(14, '柏庄丽城精品高档小区', 0, 43, '二手房出售', 1, 1539240093, 0, 0, '柏庄丽城精品高档小区', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 0, 0, '', 'wap', '', 1, '/attachment/information/201810/pre_1539240093gj1vb.png', 2, 1, 0, 1, 0, 0, 0, 1, 'ershoufang', '', 1, 0, '', '', '0.00000000000000000', '0.00000000000000000'),
(13, '芜湖平头哥', 7, 90, '找女友/找男友', 1, 1539238476, 0, 0, '不胖不瘦，有点肌肉，有颜有钱，不是渣男！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 4, 1, '', 'wap', 'wap', 1, '/attachment/information/201810/pre_1539238476d0tem.jpg', 2, 1, 0, 1, 0, 1, 1, 1, 'zhaoduixiang', '', 2, 1539324894, '', '', '0.00000000000000000', '0.00000000000000000'),
(6, '单身贵族黄金牧羊犬', 8, 95, '狗狗', 8, 1539235148, 0, 0, '单身贵族黄金牧羊犬', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 2, 1, '', 'wap', 'wap', 1, '/attachment/information/201810/pre_1539235148x9cuj.jpg', 2, 1, 0, 1, 0, 0, 0, 1, 'gou', '', 1, 0, '', '', '0.00000000000000000', '0.00000000000000000'),
(10, '柏庄丽城精品高档电梯房', 0, 41, '房屋出租', 2, 1539237631, 0, 0, '诚心求购，非诚勿扰！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 2, 1, '', 'wap', 'wap', 1, '', 2, 1, 0, 1, 0, 1, 1, 1, 'chuzu', '', 2, 1539326201, '', '', '0.00000000000000000', '0.00000000000000000'),
(5, '诚聘美工一枚', 4, 63, '美工/设计/程序员', 5, 1539227743, 365, 1570764561, '帅哥小鲜肉优先！', 'sj_153922297566', '平头哥', '13222222222', '', '13222222222', 0, 7, 0, '', 'wap', '', 1, '/attachment/information/201810/pre_1539227743zkot9.jpg', 2, 1, 0, 1, 0, 1, 1, 0, 'meigong', '', 2, 1539314335, '', '', '0.00000000000000000', '0.00000000000000000'),
(7, '马仁奇峰福利大放送！', 9, 118, '旅游度假', 5, 1539235241, 0, 0, '马仁奇峰芜湖特惠福利！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 0, 1, '', 'wap', 'wap', 1, '/attachment/information/201810/pre_15392352413w6bd.jpg', 2, 1, 0, 1, 0, 0, 0, 1, 'lvyou', '', 1, 0, '', '', '0.00000000000000000', '0.00000000000000000'),
(9, '宝马3系320i 25万求购', 2, 28, '二手轿车', 2, 1539237481, 0, 0, '爱车一族价格可商量，本人想入手灯厂A8！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 4, 1, '', 'wap', 'wap', 1, '', 2, 1, 0, 1, 0, 0, 0, 1, 'jiaoche', '', 1, 0, '', '', '0.00000000000000000', '0.00000000000000000'),
(11, 'iPhone XMAX 99新256g版本', 1, 11, '手机转让', 3, 1539237793, 365, 1570773793, '诚心求购，非诚勿扰！', '18815539872', '刘志威', '18815539872', '', '18815539872', 0, 0, 1, '', 'wap', 'wap', 1, '/attachment/information/201810/pre_1539237793uwy6y.jpg', 2, 1, 0, 1, 0, 0, 0, 1, 'shouji', '', 2, 1539324779, '', '', '0.00000000000000000', '0.00000000000000000');

-- --------------------------------------------------------

--
-- 表的结构 `my_information_2`
--

CREATE TABLE IF NOT EXISTS `my_information_2` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_5`
--

CREATE TABLE IF NOT EXISTS `my_information_5` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `operator` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_6`
--

CREATE TABLE IF NOT EXISTS `my_information_6` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `pc_brand` tinyint(1) NOT NULL DEFAULT '0',
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `content` mediumtext,
  `from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_7`
--

CREATE TABLE IF NOT EXISTS `my_information_7` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `sex_demand` varchar(100) NOT NULL DEFAULT '0',
  `salary` tinyint(1) NOT NULL DEFAULT '0',
  `job` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `content` mediumtext,
  `education` tinyint(1) NOT NULL DEFAULT '0',
  `work_life` mediumint(7) NOT NULL DEFAULT '0',
  `fuli` varchar(100) NOT NULL DEFAULT '0',
  `property` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_information_7`
--

INSERT INTO `my_information_7` (`iid`, `id`, `sex_demand`, `salary`, `job`, `company`, `content`, `education`, `work_life`, `fuli`, `property`) VALUES
(1, 5, '1', 4, '美工', '芜湖大白网络', NULL, 3, 1, '1,5', 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_information_8`
--

CREATE TABLE IF NOT EXISTS `my_information_8` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `day_salary` mediumint(7) NOT NULL DEFAULT '0',
  `company` varchar(250) NOT NULL,
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_9`
--

CREATE TABLE IF NOT EXISTS `my_information_9` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `age` decimal(10,2) NOT NULL DEFAULT '0.00',
  `education` tinyint(1) NOT NULL DEFAULT '0',
  `graduate` tinyint(1) NOT NULL DEFAULT '0',
  `work_life` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_10`
--

CREATE TABLE IF NOT EXISTS `my_information_10` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `tuition` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_11`
--

CREATE TABLE IF NOT EXISTS `my_information_11` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `ebike_class` tinyint(1) NOT NULL DEFAULT '0',
  `ebike_brand` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_12`
--

CREATE TABLE IF NOT EXISTS `my_information_12` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `car_brand` tinyint(1) NOT NULL DEFAULT '0',
  `car_year` tinyint(1) NOT NULL DEFAULT '0',
  `mileage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `prices` decimal(10,2) NOT NULL DEFAULT '0.00',
  `content` mediumtext,
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_information_12`
--

INSERT INTO `my_information_12` (`iid`, `id`, `car_brand`, `car_year`, `mileage`, `prices`, `content`, `new_old`, `from`) VALUES
(2, 9, 7, 5, '2.50', '25.00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_information_13`
--

CREATE TABLE IF NOT EXISTS `my_information_13` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `bike_type` tinyint(1) NOT NULL DEFAULT '0',
  `bike_brand` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_14`
--

CREATE TABLE IF NOT EXISTS `my_information_14` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `carpool_type` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `destination` varchar(250) NOT NULL,
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_15`
--

CREATE TABLE IF NOT EXISTS `my_information_15` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `mileage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `car_year` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `prices` decimal(10,2) NOT NULL DEFAULT '0.00',
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_16`
--

CREATE TABLE IF NOT EXISTS `my_information_16` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `prices` decimal(10,2) NOT NULL DEFAULT '0.00',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_17`
--

CREATE TABLE IF NOT EXISTS `my_information_17` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `truke_type` tinyint(1) NOT NULL DEFAULT '0',
  `prices` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_18`
--

CREATE TABLE IF NOT EXISTS `my_information_18` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `ican` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_19`
--

CREATE TABLE IF NOT EXISTS `my_information_19` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `age` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jobs` varchar(250) NOT NULL,
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_information_19`
--

INSERT INTO `my_information_19` (`iid`, `id`, `sex`, `age`, `jobs`, `content`) VALUES
(3, 13, 1, '20.00', 'IT攻城狮', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `my_information_20`
--

CREATE TABLE IF NOT EXISTS `my_information_20` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `dog_breeds` tinyint(1) NOT NULL DEFAULT '0',
  `animal_sex` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  `from` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_information_20`
--

INSERT INTO `my_information_20` (`iid`, `id`, `dog_breeds`, `animal_sex`, `price`, `content`, `from`) VALUES
(1, 6, 3, 1, 2000, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_information_21`
--

CREATE TABLE IF NOT EXISTS `my_information_21` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `pet_class` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_22`
--

CREATE TABLE IF NOT EXISTS `my_information_22` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `position` tinyint(1) NOT NULL DEFAULT '0',
  `renovation` tinyint(1) NOT NULL DEFAULT '0',
  `room_type` tinyint(1) NOT NULL DEFAULT '0',
  `floor` mediumint(7) NOT NULL DEFAULT '0',
  `prices` decimal(10,2) NOT NULL DEFAULT '0.00',
  `acreage` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_information_22`
--

INSERT INTO `my_information_22` (`iid`, `id`, `position`, `renovation`, `room_type`, `floor`, `prices`, `acreage`, `content`) VALUES
(1, 14, 1, 1, 1, 0, '250.00', 200, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `my_information_23`
--

CREATE TABLE IF NOT EXISTS `my_information_23` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `position` tinyint(1) NOT NULL DEFAULT '0',
  `rent_type` tinyint(1) NOT NULL DEFAULT '0',
  `room_type` tinyint(1) NOT NULL DEFAULT '0',
  `mini_rent` decimal(10,2) NOT NULL DEFAULT '0.00',
  `content` mediumtext,
  `house_pro` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_information_23`
--

INSERT INTO `my_information_23` (`iid`, `id`, `position`, `rent_type`, `room_type`, `mini_rent`, `content`, `house_pro`) VALUES
(2, 10, 1, 1, 3, '2000.00', NULL, '1,2,6');

-- --------------------------------------------------------

--
-- 表的结构 `my_information_24`
--

CREATE TABLE IF NOT EXISTS `my_information_24` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `position` tinyint(1) NOT NULL DEFAULT '0',
  `acreage` mediumint(7) NOT NULL DEFAULT '0',
  `min_rent` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_25`
--

CREATE TABLE IF NOT EXISTS `my_information_25` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `acreage` mediumint(7) NOT NULL DEFAULT '0',
  `prices` decimal(10,2) NOT NULL DEFAULT '0.00',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_26`
--

CREATE TABLE IF NOT EXISTS `my_information_26` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `store_type` tinyint(1) NOT NULL DEFAULT '0',
  `acreage` mediumint(7) NOT NULL DEFAULT '0',
  `rent` mediumint(7) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_27`
--

CREATE TABLE IF NOT EXISTS `my_information_27` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `motobrand` tinyint(1) NOT NULL DEFAULT '0',
  `price` mediumint(7) NOT NULL DEFAULT '0',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_information_28`
--

CREATE TABLE IF NOT EXISTS `my_information_28` (
  `iid` mediumint(7) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL DEFAULT '0',
  `mbrand` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `new_old` tinyint(1) NOT NULL DEFAULT '0',
  `from` tinyint(1) NOT NULL DEFAULT '0',
  `content` mediumtext,
  PRIMARY KEY (`iid`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_information_28`
--

INSERT INTO `my_information_28` (`iid`, `id`, `mbrand`, `price`, `new_old`, `from`, `content`) VALUES
(2, 11, 1, '9998.00', 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `my_info_img`
--

CREATE TABLE IF NOT EXISTS `my_info_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image_id` tinyint(1) NOT NULL,
  `path` varchar(250) NOT NULL,
  `prepath` varchar(250) NOT NULL,
  `infoid` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `infoid` (`infoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `my_info_img`
--

INSERT INTO `my_info_img` (`id`, `image_id`, `path`, `prepath`, `infoid`, `uptime`) VALUES
(16, 2, '/attachment/information/201810/1539228678yjpfc.png', '/attachment/information/201810/pre_1539228678yjpfc.png', 3, 1539228678),
(23, 1, '/attachment/information/201810/1539237157xlec3.jpg', '/attachment/information/201810/pre_1539237157xlec3.jpg', 1, 1539237157),
(13, 2, '/attachment/information/201810/15392284122b7qn.png', '/attachment/information/201810/pre_15392284122b7qn.png', 4, 1539228412),
(19, 1, '/attachment/information/201810/1539235148x9cuj.jpg', '/attachment/information/201810/pre_1539235148x9cuj.jpg', 6, 1539235148),
(18, 0, '/attachment/information/201810/1539235148y2kkq.jpg', '/attachment/information/201810/pre_1539235148y2kkq.jpg', 6, 1539235148),
(17, 3, '/attachment/information/201810/1539228678p1hnx.png', '/attachment/information/201810/pre_1539228678p1hnx.png', 3, 1539228678),
(15, 2, '/attachment/information/201810/15392371575mpf5.jpg', '/attachment/information/201810/pre_15392371575mpf5.jpg', 1, 1539237157),
(8, 0, '/attachment/information/201810/15392277438s3od.jpg', '/attachment/information/201810/pre_15392277438s3od.jpg', 5, 1539227743),
(9, 1, '/attachment/information/201810/1539227743zkot9.jpg', '/attachment/information/201810/pre_1539227743zkot9.jpg', 5, 1539227743),
(10, 1, '/attachment/information/201810/1539228391ghwtv.png', '/attachment/information/201810/pre_1539228391ghwtv.png', 2, 1539228391),
(11, 2, '/attachment/information/201810/1539228391vayat.png', '/attachment/information/201810/pre_1539228391vayat.png', 2, 1539228391),
(12, 3, '/attachment/information/201810/1539228391fs1p3.png', '/attachment/information/201810/pre_1539228391fs1p3.png', 2, 1539228391),
(14, 3, '/attachment/information/201810/1539228412zj5dc.png', '/attachment/information/201810/pre_1539228412zj5dc.png', 4, 1539228412),
(20, 0, '/attachment/information/201810/1539235241yghfm.jpg', '/attachment/information/201810/pre_1539235241yghfm.jpg', 7, 1539235241),
(21, 1, '/attachment/information/201810/15392352413w6bd.jpg', '/attachment/information/201810/pre_15392352413w6bd.jpg', 7, 1539235241),
(22, 0, '/attachment/information/201810/1539237120rgeb4.jpg', '/attachment/information/201810/pre_1539237120rgeb4.jpg', 1, 1539237120),
(24, 3, '/attachment/information/201810/1539237157e6dwu.jpg', '/attachment/information/201810/pre_1539237157e6dwu.jpg', 1, 1539237157),
(25, 0, '/attachment/information/201810/1539237390e7785.jpg', '/attachment/information/201810/pre_1539237390e7785.jpg', 8, 1539237390),
(26, 1, '/attachment/information/201810/1539237390xtvpt.jpg', '/attachment/information/201810/pre_1539237390xtvpt.jpg', 8, 1539237390),
(27, 0, '/attachment/information/201810/1539237481qdap4.png', '/attachment/information/201810/pre_1539237481qdap4.png', 9, 1539237481),
(28, 1, '/attachment/information/201810/1539237481rb2tl.png', '/attachment/information/201810/pre_1539237481rb2tl.png', 9, 1539237481),
(29, 0, '/attachment/information/201810/15392376310qeqx.png', '/attachment/information/201810/pre_15392376310qeqx.png', 10, 1539237631),
(30, 1, '/attachment/information/201810/1539237631fchsd.png', '/attachment/information/201810/pre_1539237631fchsd.png', 10, 1539237631),
(31, 0, '/attachment/information/201810/1539237793mvljz.png', '/attachment/information/201810/pre_1539237793mvljz.png', 11, 1539237793),
(32, 1, '/attachment/information/201810/1539237793uwy6y.jpg', '/attachment/information/201810/pre_1539237793uwy6y.jpg', 11, 1539237793),
(33, 0, '/attachment/information/201810/1539238021efqj4.jpg', '/attachment/information/201810/pre_1539238021efqj4.jpg', 12, 1539238021),
(34, 1, '/attachment/information/201810/1539238021srzfd.jpg', '/attachment/information/201810/pre_1539238021srzfd.jpg', 12, 1539238021),
(35, 2, '/attachment/information/201810/15392382046d41j.jpg', '/attachment/information/201810/pre_15392382046d41j.jpg', 12, 1539238204),
(36, 3, '/attachment/information/201810/1539238204mjm8o.jpg', '/attachment/information/201810/pre_1539238204mjm8o.jpg', 12, 1539238204),
(37, 0, '/attachment/information/201810/15392384765q8dz.jpg', '/attachment/information/201810/pre_15392384765q8dz.jpg', 13, 1539238476),
(38, 1, '/attachment/information/201810/1539238476d0tem.jpg', '/attachment/information/201810/pre_1539238476d0tem.jpg', 13, 1539238476),
(39, 0, '/attachment/information/201810/153924009386v6x.png', '/attachment/information/201810/pre_153924009386v6x.png', 14, 1539240093),
(40, 1, '/attachment/information/201810/1539240093gj1vb.png', '/attachment/information/201810/pre_1539240093gj1vb.png', 14, 1539240093),
(41, 0, '/attachment/information/201810/1539240491a9key.jpg', '/attachment/information/201810/pre_1539240491a9key.jpg', 15, 1539240491),
(42, 1, '/attachment/information/201810/1539240491biboc.png', '/attachment/information/201810/pre_1539240491biboc.png', 15, 1539240491);

-- --------------------------------------------------------

--
-- 表的结构 `my_info_report`
--

CREATE TABLE IF NOT EXISTS `my_info_report` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `infoid` int(8) NOT NULL,
  `infotitle` char(50) NOT NULL,
  `report_type` smallint(3) NOT NULL,
  `content` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `pubtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_info_typemodels`
--

CREATE TABLE IF NOT EXISTS `my_info_typemodels` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `displayorder` int(8) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `options` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `my_info_typemodels`
--

INSERT INTO `my_info_typemodels` (`id`, `name`, `displayorder`, `type`, `options`) VALUES
(1, '空模型', 0, 1, ''),
(2, '二手物品交易模型', 2, 0, '39,9,58'),
(6, '电脑转让模型', 6, 0, '54,58,9,39'),
(7, '全职招聘模型', 7, 0, '43,40,44,42,47,49,61,62'),
(8, '兼职招聘模型', 8, 0, '41,42'),
(9, '简历模型', 9, 0, '45,46,47,48,49'),
(10, '教育培训模型', 10, 0, '50'),
(11, '电动车交易模型', 11, 0, '11,9,58,39'),
(12, '二手轿车模型', 12, 0, '14,16,17,13,58,39'),
(13, '自行车交易模型', 13, 0, '22,9,39,58'),
(14, '拼车顺风车模型', 14, 0, '20,9,21'),
(15, '面包车客车模型', 15, 0, '17,16,13,58,39'),
(16, '大件物品交易模型', 16, 0, '13,58,39'),
(18, '技能交换模型', 18, 0, '51'),
(19, '征婚交友模型', 19, 0, '45,46,52'),
(20, '狗狗模型', 20, 0, '25,26,9,39'),
(21, '猫猫等宠物模型', 21, 0, '27,9'),
(22, '二手房模型', 22, 0, '33,34,35,36,13,30'),
(23, '出租房模型', 23, 0, '33,37,35,38,64'),
(24, '厂房/写字楼出租模型', 24, 0, '33,30,29'),
(25, '商铺/写字楼出售模型', 25, 0, '30,13'),
(26, '店铺转让出租模型', 26, 0, '31,30,32'),
(27, '摩托车模型', 0, 0, '60,9,39'),
(28, '手机转让模型', 0, 0, '65,9,58,39');

-- --------------------------------------------------------

--
-- 表的结构 `my_info_typeoptions`
--

CREATE TABLE IF NOT EXISTS `my_info_typeoptions` (
  `optionid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `classid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `identifier` varchar(40) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  `rules` mediumtext NOT NULL,
  `available` char(2) NOT NULL,
  `required` char(2) NOT NULL,
  `search` char(2) NOT NULL,
  PRIMARY KEY (`optionid`),
  KEY `classid` (`classid`),
  KEY `available` (`available`),
  KEY `search` (`search`),
  KEY `displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- 转存表中的数据 `my_info_typeoptions`
--

INSERT INTO `my_info_typeoptions` (`optionid`, `classid`, `displayorder`, `title`, `description`, `identifier`, `type`, `rules`, `available`, `required`, `search`) VALUES
(1, 0, 0, '通用类', '', '', '', '', '0', '0', '0'),
(2, 0, 0, '房产类', '', '', '', '', '0', '0', '0'),
(3, 0, 0, '交友类', '', '', '', '', '0', '0', '0'),
(4, 0, 0, '求职招聘类', '', '', '', '', '0', '0', '0'),
(5, 0, 0, '交易类', '', '', '', '', '0', '0', '0'),
(6, 0, 0, '教育培训类', '', '', '', '', '0', '0', '0'),
(7, 0, 0, '宠物类', '', '', '', '', '0', '0', '0'),
(8, 0, 0, '车辆类', '', '', '', '', '0', '0', '0'),
(9, 5, 1, '价格', '小额价格', 'price', 'number', 'a:2:{s:5:"units";s:2:"元";s:7:"choices";s:98:"1~1000=1000以内\r\n1000~3000=1000~3000\r\n3000~5000=3000~5000\r\n5000~10000=5000~10000\r\n10000~=10000以上";}', 'on', 'on', 'on'),
(11, 8, 3, '电动车品牌', '电动车品牌', 'ebike_brand', 'select', 'a:1:{s:7:"choices";s:46:"1=新日\r\n2=立马\r\n3=绿源\r\n4=爱玛\r\n5=雅迪\r\n6=其它";}', 'on', 'on', 'on'),
(13, 5, 0, '价格', '万元级别的价格', 'prices', 'number', 'a:2:{s:5:"units";s:4:"万元";s:7:"choices";s:99:"1~5=5万以内\r\n5~10=5万~10万\r\n10~50=10万~50万\r\n50~100=50万~100万\r\n100~300=100万~300万\r\n300~=300万以上";}', 'on', 'on', 'on'),
(14, 8, 5, '轿车品牌', '轿车品牌', 'car_brand', 'select', 'a:1:{s:7:"choices";s:148:"1=大众\r\n2=本田\r\n3=丰田\r\n4=别克\r\n5=奥迪\r\n6=奔驰\r\n7=宝马\r\n8=比亚迪\r\n9=现代\r\n10=雪佛兰\r\n11=奇瑞\r\n12=福特\r\n13=日产\r\n14=马自达\r\n15=金杯\r\n16=路虎\r\n17=其它";}', 'on', 'on', 'on'),
(16, 8, 7, '上牌年份', '上牌年份', 'car_year', 'select', 'a:1:{s:7:"choices";s:62:"1=2012年以前\r\n2=2012年\r\n3=2013年\r\n4=2014年\r\n5=2015年\r\n6=2016年";}', 'on', 'on', ''),
(17, 8, 8, '行驶里程', '行驶里程', 'mileage', 'number', 'a:2:{s:5:"units";s:6:"万公里";s:7:"choices";s:61:"0~1=1万公里以内\r\n1~3=1~3万公里\r\n3~5=3~5万公里\r\n5~=5万公里以上";}', 'on', 'on', ''),
(18, 8, 9, '面包车类型', '面包车类型', 'minibus_type', 'select', 'a:1:{s:7:"choices";s:28:"1=大客车\r\n2=中巴车\r\n3=面包车";}', 'on', 'on', 'on'),
(19, 8, 10, '摩托车品牌', '摩托车品牌', 'moto_brand', 'select', 'a:1:{s:7:"choices";s:74:"1=雅马哈\r\n2=本田\r\n3=建设\r\n4=铃木\r\n5=宗申\r\n6=力帆\r\n7=豪爵\r\n8=新大洲\r\n9=其它";}', 'on', 'on', 'on'),
(20, 8, 11, '拼车类型', '拼车类型', 'carpool_type', 'select', 'a:1:{s:7:"choices";s:52:"1=长途车拼车\r\n2=上下班拼车\r\n3=上下学拼车\r\n4=其它拼车";}', 'on', 'on', 'on'),
(21, 8, 12, '目的地', '目的地', 'destination', 'text', 'a:1:{s:9:"maxlength";s:0:"";}', 'on', 'on', ''),
(22, 8, 13, '自行车品牌', '自行车品牌', 'bike_brand', 'select', 'a:1:{s:7:"choices";s:32:"1=永久\r\n2=凤凰\r\n3=捷安特\r\n4=其它";}', 'on', 'on', 'on'),
(24, 7, 24, '宠物类型', '宠物类型', 'pet_type', 'select', 'a:1:{s:7:"choices";s:36:"1=狗\r\n2=猫\r\n3=鸟\r\n4=鼠\r\n5=兔\r\n6=其它";}', 'on', 'on', 'on'),
(25, 7, 25, '狗狗品种', '狗狗品种', 'dog_breeds', 'select', 'a:1:{s:7:"choices";s:80:"1=泰迪\r\n2=萨摩耶\r\n3=金毛\r\n4=藏獒\r\n5=雪橇犬\r\n6=哈士奇\r\n7=拉布拉多\r\n8=贵宾\r\n9=其它";}', 'on', 'on', 'on'),
(26, 7, 0, '公母', '动物公母', 'animal_sex', 'radio', 'a:1:{s:7:"choices";s:10:"1=公\r\n2=母";}', 'on', 'on', 'on'),
(27, 7, 26, '宠物类别', '猫猫等其它宠物类别', 'pet_class', 'select', 'a:1:{s:7:"choices";s:30:"1=猫猫\r\n2=水族\r\n3=花鸟\r\n4=其它";}', 'on', 'on', 'on'),
(28, 2, 30, '厂房租售类型', '厂房/仓库/土地租售类型', 'factory_type', 'select', 'a:1:{s:7:"choices";s:94:"1=厂房出租\r\n2=厂房出售\r\n3=仓库出租\r\n4=仓库出售\r\n5=土地出租\r\n6=土地出售\r\n7=其它出租\r\n8=其它出售";}', 'on', 'on', 'on'),
(29, 2, 31, '租金', '厂房/写字楼出租价格', 'min_rent', 'number', 'a:2:{s:5:"units";s:10:"元/平米/天";s:7:"choices";s:56:"1~2=1~2元/平米/天\r\n2~4=2~4元/平米/天\r\n4~=4元以上/平米/天";}', 'on', 'on', 'on'),
(30, 2, 32, '面积', '房屋面积', 'acreage', 'number', 'a:2:{s:5:"units";s:4:"平米";s:7:"choices";s:107:"1~30=30平米以内\r\n30~50=30~50平米\r\n50~90=50~90平米\r\n90~150=90~150平米\r\n150~300=100~300平米\r\n300~=300平米以上";}', 'on', 'on', 'on'),
(31, 2, 0, '店铺分类', '店铺分类', 'store_type', 'select', 'a:1:{s:7:"choices";s:115:"1=餐饮美食\r\n2=服饰鞋包\r\n3=酒店宾馆\r\n4=超市零售\r\n5=空铺转让\r\n6=美容美发\r\n7=家居建材\r\n8=汽修美容\r\n9=电子通讯\r\n10=其它";}', 'on', 'on', 'on'),
(32, 2, 33, '租金', '店铺/房屋租金', 'rent', 'number', 'a:1:{s:5:"units";s:2:"元";}', 'on', 'on', ''),
(33, 2, 34, '身份', '个人/中介', 'position', 'radio', 'a:1:{s:7:"choices";s:16:"1=个人\r\n2=经纪人";}', 'on', 'on', 'on'),
(34, 2, 35, '装修', '装修情况', 'renovation', 'select', 'a:1:{s:7:"choices";s:42:"1=毛坯房\r\n2=简单装修\r\n3=中等装修\r\n4=精装修";}', 'on', 'on', ''),
(35, 2, 36, '房型', '房型', 'room_type', 'select', 'a:1:{s:7:"choices";s:71:"1=4室及以上\r\n2=3室2厅\r\n3=3室1厅\r\n4=2室2厅\r\n5=2室1厅\r\n6=1室1厅\r\n7=1室0厅";}', 'on', 'on', 'on'),
(36, 2, 37, '楼层', '', 'floor', 'number', 'a:1:{s:5:"units";s:2:"楼";}', 'on', 'on', ''),
(37, 2, 38, '出租形式', '出租形式', 'rent_type', 'select', 'a:1:{s:7:"choices";s:22:"1=整套\r\n2=单间\r\n3=床位";}', 'on', 'on', 'on'),
(38, 2, 39, '租金', '', 'mini_rent', 'number', 'a:2:{s:5:"units";s:2:"元";s:7:"choices";s:98:"1~1000=1000以内\r\n1000~3000=1000~3000\r\n3000~5000=3000~5000\r\n5000~10000=5000~10000\r\n10000~=10000以上";}', 'on', 'on', 'on'),
(39, 1, 0, '来源', '服务者身份', 'from', 'radio', 'a:1:{s:7:"choices";s:14:"1=个人\r\n2=商家";}', 'on', 'on', 'on'),
(40, 4, 39, '月薪', '月薪', 'salary', 'select', 'a:1:{s:7:"choices";s:112:"1=面议\r\n2=1000以下\r\n3=1000~2000\r\n3=2000~3000\r\n4=3000~6000\r\n5=6000~8000\r\n6=8000~12000\r\n7=12000~30000\r\n8=30000以上";}', 'on', 'on', 'on'),
(41, 4, 41, '日薪', '日薪', 'day_salary', 'number', 'a:2:{s:5:"units";s:5:"元/天";s:7:"choices";s:117:"1~20=20元以内/天\r\n20~50=20~50元/天\r\n50~100=50~100元/天\r\n100~300=100~300元/天\r\n300~500=300~500元/天\r\n500~=500元以上/天";}', 'on', 'on', 'on'),
(42, 4, 42, '公司名称', '公司名称', 'company', 'text', 'a:1:{s:9:"maxlength";s:0:"";}', 'on', 'on', ''),
(43, 4, 43, '性别要求', '性别要求', 'sex_demand', 'checkbox', 'a:1:{s:7:"choices";s:10:"1=男\r\n2=女";}', 'on', 'on', ''),
(44, 4, 44, '职位', '职位', 'job', 'text', 'a:1:{s:9:"maxlength";s:0:"";}', 'on', '', ''),
(45, 4, 45, '性别', '性别', 'sex', 'radio', 'a:1:{s:7:"choices";s:10:"1=男\r\n2=女";}', 'on', '', 'on'),
(46, 4, 46, '年龄', '年龄', 'age', 'number', 'a:2:{s:5:"units";s:2:"岁";s:7:"choices";s:0:"";}', 'on', 'on', ''),
(47, 4, 47, '学历', '学历', 'education', 'select', 'a:1:{s:7:"choices";s:68:"1=初中及以下\r\n2=高中/中专/技校\r\n3=大专\r\n4=本科\r\n5=硕士\r\n6=博士及以上";}', 'on', 'on', 'on'),
(48, 4, 48, '是否应届', '是否应届', 'graduate', 'radio', 'a:1:{s:7:"choices";s:16:"1=应届\r\n2=非应届";}', 'on', '', 'on'),
(49, 4, 49, '工作年限', '工作年限', 'work_life', 'number', 'a:2:{s:5:"units";s:2:"年";s:7:"choices";s:60:"1~1=1年以下\r\n1~2=1~2年\r\n3~5=3~5年\r\n6~10=6~10年\r\n10~=10年以上";}', 'on', 'on', ''),
(50, 6, 50, '学费', '课程学费', 'tuition', 'number', 'a:2:{s:5:"units";s:2:"元";s:7:"choices";s:98:"1~1000=1000以内\r\n1000~3000=1000~3000\r\n3000~5000=3000~5000\r\n5000~10000=5000~10000\r\n10000~=10000以上";}', 'on', '', 'on'),
(51, 3, 51, '我会', '我的技能', 'ican', 'checkbox', 'a:1:{s:7:"choices";s:125:"1=魔术\r\n2=古玩鉴赏\r\n3=电器维修\r\n4=唱歌\r\n5=方言\r\n6=理财/金融\r\n7=数理化\r\n8=武术\r\n9=象棋/围棋\r\n10=中医\r\n11=平面设计\r\n12=服装设计";}', 'on', '', ''),
(52, 3, 52, '职业', '', 'jobs', 'text', 'a:1:{s:9:"maxlength";s:0:"";}', 'on', '', ''),
(54, 5, 54, '电脑品牌', '电脑品牌', 'pc_brand', 'select', 'a:1:{s:7:"choices";s:109:"1=戴尔\r\n2=华硕\r\n3=惠普\r\n4=联想\r\n5=IBM\r\n6=苹果\r\n7=三星\r\n8=东芝\r\n9=神舟\r\n10=方正\r\n11=清华同方\r\n12=索尼\r\n13=其它";}', 'on', 'on', 'on'),
(55, 5, 55, '电器类型', '电器类型', 'appliances', 'select', 'a:1:{s:7:"choices";s:100:"1=空调\r\n2=厨房电器\r\n3=居家电器\r\n4=影音电器\r\n5=冰箱/冷柜\r\n6=电视机\r\n7=卫浴/护理电器\r\n8=洗衣机\r\n9=其它";}', 'on', 'on', 'on'),
(58, 5, 58, '新旧程度', '新旧程度', 'new_old', 'select', 'a:1:{s:7:"choices";s:33:"1=全新\r\n2=9成新\r\n3=7成新\r\n4=5成新";}', 'on', 'on', ''),
(60, 8, 0, '摩托车品牌', '', 'motobrand', 'select', 'a:1:{s:7:"choices";s:74:"1=雅马哈\r\n2=本田\r\n3=建设\r\n4=铃木\r\n5=宗申\r\n6=力帆\r\n7=豪爵\r\n8=新大洲\r\n9=其它";}', 'on', 'on', 'on'),
(61, 4, 0, '福利', '', 'fuli', 'checkbox', 'a:1:{s:7:"choices";s:99:"1=五险一金\r\n2=包住\r\n3=包吃\r\n4=年底双薪\r\n5=周末双休\r\n6=交通补助\r\n7=加班补助\r\n8=餐补\r\n9=话补\r\n10=房补";}', 'on', 'on', 'on'),
(62, 4, 0, '公司性质', '', 'property', 'radio', 'a:1:{s:7:"choices";s:95:"1=私营\r\n2=国有\r\n3=股份制\r\n4=外商独资办事处\r\n5=中外合资/合作\r\n6=上市公司\r\n7=事业单位\r\n8=政府机关";}', 'on', 'on', ''),
(64, 2, 0, '房屋配置', '', 'house_pro', 'checkbox', 'a:1:{s:7:"choices";s:81:"1=床\r\n2=衣柜\r\n3=沙发\r\n4=电视\r\n5=冰箱\r\n6=洗衣机\r\n7=空调\r\n8=热水器\r\n9=宽带\r\n10=暖气";}', 'on', 'on', ''),
(65, 5, 0, '手机品牌', '', 'mbrand', 'radio', 'a:1:{s:7:"choices";s:125:"1=iphone\r\n2=三星\r\n3=小米\r\n4=乐视\r\n5=华为\r\n6=联想\r\n7=锤子\r\n8=诺基亚\r\n9=HTC\r\n10=山寨/高仿机\r\n11=MOTO\r\n12=中兴\r\n13=索尼\r\n14=其他";}', 'on', 'on', 'on');

-- --------------------------------------------------------

--
-- 表的结构 `my_insidelink`
--

CREATE TABLE IF NOT EXISTS `my_insidelink` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word` char(16) NOT NULL,
  `url` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_jswizard`
--

CREATE TABLE IF NOT EXISTS `my_jswizard` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `flag` varchar(50) NOT NULL,
  `parameter` mediumtext NOT NULL,
  `edittime` int(10) NOT NULL,
  `customtype` char(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flag` (`flag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `my_jswizard`
--

INSERT INTO `my_jswizard` (`id`, `flag`, `parameter`, `edittime`, `customtype`) VALUES
(5, '5umb', 'a:8:{s:10:"jstemplate";s:25:"<li>{title} - {link}</li>";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:3:"ids";s:0:"";s:7:"keyword";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441594018, 'info'),
(2, 'asdqwe', 'a:7:{s:10:"jstemplate";s:22:"<li>{title}{link}</li>";s:5:"catid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441596141, 'news'),
(3, '329e', 'a:8:{s:10:"jstemplate";s:22:"<li>{tname}{link}</li>";s:5:"catid";s:0:"";s:7:"levelid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441595310, 'store'),
(4, '4nmv', 'a:8:{s:10:"jstemplate";s:26:"<li>{goodsname}{link}</li>";s:5:"catid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:7:"special";a:1:{i:0;s:0:"";}s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441595242, 'goods');

-- --------------------------------------------------------

--
-- 表的结构 `my_lifebox`
--

CREATE TABLE IF NOT EXISTS `my_lifebox` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL DEFAULT '2',
  `lifename` varchar(50) NOT NULL,
  `lifeurl` varchar(200) NOT NULL,
  `if_view` tinyint(1) NOT NULL,
  `displayorder` smallint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_mail_sendlist`
--

CREATE TABLE IF NOT EXISTS `my_mail_sendlist` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `template_id` varchar(50) NOT NULL,
  `email_content` mediumtext NOT NULL,
  `error` tinyint(1) NOT NULL DEFAULT '0',
  `email_subject` varchar(200) NOT NULL,
  `last_send` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_mail_template`
--

CREATE TABLE IF NOT EXISTS `my_mail_template` (
  `template_id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `is_sys` tinyint(1) NOT NULL DEFAULT '1',
  `template_code` varchar(30) NOT NULL DEFAULT '',
  `is_html` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `template_subject` varchar(200) NOT NULL DEFAULT '',
  `template_content` mediumtext NOT NULL,
  `last_modify` int(10) unsigned NOT NULL DEFAULT '0',
  `last_send` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`template_id`),
  UNIQUE KEY `template_code` (`template_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_mail_template`
--

INSERT INTO `my_mail_template` (`template_id`, `is_sys`, `template_code`, `is_html`, `template_subject`, `template_content`, `last_modify`, `last_send`) VALUES
(1, 1, 'findpwd', 1, '找回密码邮件', '亲爱的用户 {$user_name} 您好！\r\n\r\n您已经进行了密码重置的操作，请点击以下链接（如无法打开请把此链接复制粘贴到浏览器打开）:\r\n\r\n{$reset_email}\r\n\r\n以确认您的新密码重置操作！此邮件为系统发出，请勿回复邮件。\r\n\r\n{$site_name}\r\n{$send_date}', 1407235479, 0),
(2, 1, 'validate', 1, '新用户邮件验证', '{$user_name}您好！\r\n\r\n这封邮件是 {$site_name} 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。\r\n\r\n请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:\r\n{$validate_email}\r\n\r\n{$site_name}\r\n{$send_date}', 1429947607, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_member`
--

CREATE TABLE IF NOT EXISTS `my_member` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `openid_wx` varchar(50) NOT NULL,
  `userpwd` char(36) NOT NULL,
  `catid` varchar(250) NOT NULL,
  `areaid` char(8) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `introduce` mediumtext NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `tel` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `busway` mediumtext NOT NULL,
  `mappoint` varchar(100) NOT NULL,
  `qq` char(12) NOT NULL,
  `msn` char(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `template` char(250) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `prelogo` varchar(250) NOT NULL,
  `banner` varchar(250) NOT NULL,
  `safequestion` char(25) NOT NULL,
  `safeanswer` char(25) NOT NULL,
  `levelid` smallint(3) NOT NULL DEFAULT '1',
  `money_own` mediumint(8) NOT NULL DEFAULT '0',
  `credit` int(10) NOT NULL DEFAULT '0',
  `credits` smallint(2) NOT NULL DEFAULT '1',
  `score` int(10) NOT NULL DEFAULT '0',
  `joinip` char(16) NOT NULL,
  `loginip` char(16) NOT NULL,
  `jointime` int(10) unsigned NOT NULL,
  `logintime` int(10) unsigned NOT NULL,
  `web` char(50) NOT NULL,
  `per_certify` tinyint(1) NOT NULL DEFAULT '0',
  `com_certify` tinyint(1) NOT NULL DEFAULT '0',
  `if_corp` tinyint(1) NOT NULL DEFAULT '0',
  `ifindex` tinyint(1) NOT NULL DEFAULT '1',
  `iflist` tinyint(1) NOT NULL DEFAULT '1',
  `mobile` varchar(20) NOT NULL,
  `levelup_time` int(10) NOT NULL,
  `hit` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `qdtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `areaid` (`areaid`),
  KEY `catid` (`catid`),
  KEY `levelid` (`levelid`),
  KEY `if_corp` (`if_corp`),
  KEY `jointime` (`jointime`),
  KEY `ifindex` (`ifindex`),
  KEY `iflist` (`iflist`),
  KEY `openid` (`openid`),
  KEY `status` (`status`),
  KEY `openid_wx` (`openid_wx`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_member`
--

INSERT INTO `my_member` (`id`, `userid`, `openid`, `openid_wx`, `userpwd`, `catid`, `areaid`, `cname`, `tname`, `introduce`, `sex`, `tel`, `address`, `busway`, `mappoint`, `qq`, `msn`, `email`, `template`, `keywords`, `logo`, `prelogo`, `banner`, `safequestion`, `safeanswer`, `levelid`, `money_own`, `credit`, `credits`, `score`, `joinip`, `loginip`, `jointime`, `logintime`, `web`, `per_certify`, `com_certify`, `if_corp`, `ifindex`, `iflist`, `mobile`, `levelup_time`, `hit`, `status`, `qdtime`) VALUES
(1, '18815539872', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '刘志威', '芜湖阿威教育培训公司', '<span>芜湖阿威教育培训公司</span>', '男', '', '柏庄丽城3#3#333', '10路18路16路', '', '', '', '', 'blue', '', '/attachment/face/201810/1539228124hfuvq.jpg', '/attachment/face/201810/pre_1539228124hfuvq.jpg', '/attachment/banner/201810/15392410931rnnr.png', '', '', 3, 19967, 50, 3, 20010, 'wap', 'unknown', 1539222975, 1539563779, 'www.awei.com', 1, 1, 1, 2, 1, '18815539872', 0, 4, 1, 1539229094),
(2, 'sj18815539872', '', '', 'e10adc3949ba59abbe56e057f20f883e', '55', '1', '刘志威', '芜湖大白网络', '<span>18815539872</span><span>18815539872</span><span>18815539872</span><span>18815539872</span><span>18815539872</span>', '男', '18815539872', '', '', '', '18815539872', '18815539872', '315359131@qq.com', 'blue', '', '', '', '', '', '', 3, 20000, 100, 4, 20000, 'unknown', 'unknown', 1539234649, 1539248603, '', 0, 0, 1, 2, 1, '18815539872', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_album`
--

CREATE TABLE IF NOT EXISTS `my_member_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `path` varchar(250) NOT NULL,
  `prepath` varchar(250) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_member_album`
--

INSERT INTO `my_member_album` (`id`, `title`, `path`, `prepath`, `userid`, `pubtime`) VALUES
(1, '新品促销', '/attachment/album/201810/1539241951hdh7c.jpg', '/attachment/album/201810/pre_1539241951hdh7c.jpg', '18815539872', 1539241951),
(2, '新品促销', '/attachment/album/201810/15392419769v9ww.jpg', '/attachment/album/201810/pre_15392419769v9ww.jpg', '18815539872', 1539241991);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_category`
--

CREATE TABLE IF NOT EXISTS `my_member_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `catid` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_member_category`
--

INSERT INTO `my_member_category` (`id`, `userid`, `catid`) VALUES
(1, 'sj18815539872', 55),
(3, '18815539872', 0);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_comment`
--

CREATE TABLE IF NOT EXISTS `my_member_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `fromuser` varchar(20) NOT NULL,
  `face` varchar(250) NOT NULL,
  `pubtime` int(10) unsigned NOT NULL DEFAULT '0',
  `quality` tinyint(1) NOT NULL,
  `service` tinyint(1) NOT NULL,
  `environment` tinyint(1) NOT NULL,
  `price` tinyint(1) NOT NULL,
  `avgprice` varchar(20) NOT NULL,
  `enjoy` tinyint(1) NOT NULL,
  `content` mediumtext,
  `reply` mediumtext NOT NULL,
  `retime` int(10) NOT NULL,
  `commentlevel` tinyint(1) NOT NULL DEFAULT '1',
  `flower` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `enjoy` (`enjoy`),
  KEY `fromuser` (`fromuser`),
  KEY `commentlevel` (`commentlevel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_member_docu`
--

CREATE TABLE IF NOT EXISTS `my_member_docu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `title` varchar(250) NOT NULL,
  `author` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `hit` int(10) NOT NULL DEFAULT '0',
  `imgpath` varchar(250) NOT NULL,
  `pre_imgpath` varchar(250) NOT NULL,
  `pubtime` int(10) NOT NULL,
  `if_check` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_member_docu`
--

INSERT INTO `my_member_docu` (`id`, `typeid`, `userid`, `title`, `author`, `source`, `content`, `hit`, `imgpath`, `pre_imgpath`, `pubtime`, `if_check`) VALUES
(1, 1, '18815539872', '年轻人的第一个“书房”—Kindle Paperwhite3 一周年使用回顾', '18815539872', '18815539872', '<h1 style="font-weight:400;font-size:28px;">\r\n	年轻人的第一个“书房”—Kindle Paperwhite3 一周年使用回顾\r\n</h1>\r\n<p>\r\n	<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		徒弟Amy本来说要买个Kindle Voyage，到手的时候交给我写开箱体验文，不过在再三犹豫之后，她还是选择了性价比更高的Paperwhite3。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle Paperwhite3（下文简称KPW3）我自己都有，自然也就不需要拿来开箱体验了。反倒是Amy入手之后不会用然后各种找我帮助，又让我好好梳理了一下用Kindle这些年的所得。既然本周没有新品给我开苞，我就写写和KPW3这个老相好的故事吧。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">今天的主角\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		开始前首先卖卖资历，KPW3并不是我入手的第一个Kindle产品，我第一个Kindle是Kindle4 non-touch，低分辨率，无背光，无官方市场，刷了多看系统用，后来被我的朋友接收了，至今服役；第二个Kindle是Kindle Paperwhite1，我把Kindle4 non-touch转让给朋友之后，从另一个朋友手上收购了这个继任者，低清屏，有背光，刷了多看作主力，原生系统收推送，后来我想换个高清屏的版本，就把这部机子闲鱼了。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		于是我通过官方渠道，购买了现在手头上这部KPW3。高清屏，有背光，直接使用原生系统。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n</p>\r\n<h3 style="font-size:16px;color:#333333;font-family:Helvetica,;">\r\n	我为什么决定买一个Kindle\r\n</h3>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		很多人把Kindle定位为<a href="https://www.smzdm.com/fenlei/dianzishuyueduqi/" target="_blank">电子书</a>，个人觉得这并不准确，在我看来，Kindle更像是一间可以移动的书房。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		大部分人与书本的缘分其实都不算深，除了求学时期可能和书本有些孽缘，毕业后就很少碰书。在我认识的很多人里。一年看不上一本书的大有人在，剩下有读书的，大概能够维持在一个月一本的频率上，不过看的也多是休闲类的图书。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		我因为个人爱好和职业原因（我失业前是个品牌人），看的书比较多且杂，看书的频率也比较高，基本能够维持一周一到两本。看书于我，除了是休闲，也是学习，也是工作需要。我看的书很杂，休闲型的书我看，<a href="https://www.smzdm.com/fenlei/wenxue/" target="_blank">文学</a>型的书我看，知识型的书我也看，在我入手Kindle前，把书丢得一屋子都是是一种常态，那个时候我迫切需要一间书房，然而我“幸运地”生活在广州这个超一线城市，一个理想的书房的价钱，大概能买一辆奔驰B级了。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_5/" target="_blank"><img title="杂七杂八的存书" alt="杂七杂八的存书" src="https://am.zdmimg.com/201708/15/5992f25e144939558.jpg_e600.jpg" /></a>杂七杂八的存书</span> \r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		于是Kindle自然而然地进入了我的视线，和很多人把之定位为电子书不同，Kindle对我来说是一间可以移动的书房，这间书房能存300-400本书，能很好地归档我在书本里摘抄下来的有用段落，还能放下我的读书笔记，当然了，最主要的是，这本书我能随身携带，不至于说我某时突然要使用我曾经看过的一本书上的知识点，书却不知道在家里的哪个角落的尴尬。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		所以当很多朋友问我Kindle好不好用的时候，我一般都会先问他们“你需要一个移动的书房吗？”\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n	</p>\r\n	<h3 style="font-size:16px;color:#333333;font-family:Helvetica,;">\r\n		Kindle除了看书还有什么用\r\n	</h3>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle虽然是一间移动的书房，但是他还是一个很好的阅读器。几乎所有与阅读有关的工作，Kindle都能完成得很出色。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		例如我有看新闻的习惯，以前我会订一份广州日报，然后在通勤的时候了解点时事动向，后来我使用手机上的新闻订阅软件做类似的事情，而现在，我通过kindle4rss.com在每晚10点的时候打包一份资讯推送到我Kindle上，在通勤的时候看。与传统的报纸相比，Kindle订阅的信息更加个人化，与新闻订阅软件相比，Kindle订阅则能更好地保证内容的质量，标题党什么的基本就退散了。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <a href="https://post.smzdm.com/p/aex22ek/pic_6/" target="_blank"><img alt="年轻人的第一个“书房”—Kindle Paperwhite3 一周年使用回顾" title="" src="https://am.zdmimg.com/201708/15/5992f31df3be14549.png_e600.jpg" /></a> \r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_7/" target="_blank"><img title="利用Kindle4rss进行新闻订阅" alt="利用Kindle4rss进行新闻订阅" src="https://am.zdmimg.com/201708/15/5992f25a475a01254.jpg_e600.jpg" /></a>利用Kindle4rss进行新闻订阅</span> \r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		微信订阅号正在深切影响着我们的知识、资讯获取方式，我在微信上订阅了很多有料的订阅号，但我从不在手机上细看每期的推送，我会粗略浏览每一次的推送内容，然后把感兴趣的通过<a href="https://pinpai.smzdm.com/2007/" target="_blank">亚马逊</a>Kindle服务号推送到我的Kindle上，在每天晚上睡觉前的阅读时间去慢慢吸收、消化这些文章。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_8/" target="_blank"><img title="将微信公众号的文章推送到Kindle上阅读" alt="将微信公众号的文章推送到Kindle上阅读" src="https://am.zdmimg.com/201708/15/5992f25b65ad97234.jpg_e600.jpg" /></a>将微信公众号的文章推送到Kindle上阅读</span> \r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		这些年我已经渐渐减少看漫画的次数了，不过有几套漫画我还是会追一下的，例如井上的《浪客行》、例如one的《一拳超人》、例如富奸的《猎人》，我依然是通过Kindle去追这些漫画，善用百度，很容易就能找到专做Kindle漫画订阅的网站，这些网站的漫画质量都不错，很清晰。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_9/" target="_blank"><img title="用Kindle看漫画（这张照片是用mate8临时拍的，将就看哦）" alt="用Kindle看漫画（这张照片是用mate8临时拍的，将就看哦）" src="https://am.zdmimg.com/201708/16/5993c3a5a42a19060.jpg_e600.jpg" /></a>用Kindle看漫画（这张照片是用mate8临时拍的，将就看哦）</span> \r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		我甚至会拿Kindle来做点工作，例如有时候下属的文案策划给我发来一份宏大的品牌画册文档，我就会通过邮箱推送到Kindle，然后在上面慢慢看。其实这项工作用电脑进行或许更合适，但是我觉得用Kindle阅读的时候状态会更放松，阅读得也会更深入，这算是个人的一点小小不良习惯吧。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_10/" target="_blank"><img title="使用Kindle的标注功能在文档上做标注" alt="使用Kindle的标注功能在文档上做标注" src="https://am.zdmimg.com/201708/15/5992f25f600783763.jpg_e600.jpg" /></a>使用Kindle的标注功能在文档上做标注</span> \r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_11/" target="_blank"><img title="习惯了还算好用的功能，可以同步到电脑版Kindle软件" alt="习惯了还算好用的功能，可以同步到电脑版Kindle软件" src="https://am.zdmimg.com/201708/15/5992f26096d6d822.jpg_e600.jpg" /></a>习惯了还算好用的功能，可以同步到电脑版Kindle软件</span> \r\n	</p>\r\n	<h3 style="font-size:16px;color:#333333;font-family:Helvetica,;">\r\n		为什么一定是Kindle呢？\r\n	</h3>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		在我使用Kindle的不短时间里，向不少我的朋友安利过Kindle的好处，通常他们都会说“你说的这一切，手机都可以做到啊，为什么一定买Kindle呢？”\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		然后我通常会摘下眼镜，让他们看看我再怎么休息都会有血丝的眼睛，然后拿出手机打开随便一篇文字内容给他们对比“你看啊，手机通常都是细长型的屏幕，用来阅读视野很窄，更多时候你其实在盯书而不是在看书，你看半个小时手机会不会觉得很累？然而Kindle不会。一次半次可能没什么感觉，每天保持阅读的话，每半年估计就要配一副新的眼镜了。”事实上，我为了阅读舒服，现在使用的手机已经是6寸屏幕的华为mate8了，但真的长时间看的话，对不起，我不是单只mate8，而是在座的所有手机和平板（包括亚马逊自家的fire），都是……\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <span><a href="https://post.smzdm.com/p/aex22ek/pic_12/" target="_blank"><img title="mate8和KPW3，都是6寸屏幕，但是水平视野差很远" alt="mate8和KPW3，都是6寸屏幕，但是水平视野差很远" src="https://am.zdmimg.com/201708/15/5992f25c97f562017.jpg_e600.jpg" /></a>mate8和KPW3，都是6寸屏幕，但是水平视野差很远</span> \r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		所以经常看书，就一定要买个Kindle吗？\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		其实也不是。Kindle作为<a href="https://www.smzdm.com/fenlei/dianzishuyueduqi/" target="_blank">电子书阅读器</a>的开山作，发展到现在也的确很成熟了，不过前浪自古是要被后浪拍死在沙滩上的。现阶段在国内的电子书市场，不比Kindle差甚至比Kindle好的电子书产品一捉一大把，部分甚至可以说是电子墨水屏的<a href="https://www.smzdm.com/fenlei/pingbandiannao/" target="_blank">平板电脑</a>，功能更多，真觉得Kindle不合适的随便选购其他的也没什么不可，不过我的朋友们受品牌和我半个传教士的影响，一般首选Kindle了。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n	</p>\r\n	<h3 style="font-size:16px;color:#333333;font-family:Helvetica,;">\r\n		目前买Kindle，我还是推荐Paperwhite3\r\n	</h3>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		早两个月亚马逊把Oasis这款产品撤下了货架，现在国内能买到的全新行货Kindle产品就四款：Kindle入门版、Kindle咪咕版、Kindle Paperwhite3、Kindle Voyage。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle入门版可以看成是当年Kindle4 touch的小改版，机体相对大，用的是无背光的低分辨率屏幕，如果只是想单纯体验Kindle这类产品的话是可以考虑的，真正打算长用的我并不推荐购买。在手机屏幕分辨率全面拔高的今天，低分辨率屏幕的观感真的很不好，没有背光的屏幕用起来也不算方便。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle咪咕版主要是在入门版的基础上增加了咪咕的书城服务，可以追连载小说，实用性比入门版高一点，追书党还是建议考虑的，毕竟一副眼镜也差不多钱了。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle Paperwhite3已经在上文说得比较详细了，在这里不再赘述。\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"="">\r\n		Kindle Voyage自从Paperwhite3出来之后一直是个尴尬的存在，论产品，Voyage比Paperwhite3更小更轻，但实际上手你会发现这并没有多大意义；屏幕做到了机身一个平面上，多了压敏翻页键，有些用但也不是必须的升级；背光可以自适应调节，算是最人性化的一点了，只是自适应出来的亮度未必是你最舒服的就是了。综合来说Voyage比Paperwhite3多了三个并不那么直击消费者痛点的优势，却贵了500元，我是宁愿用这个钱开个KU服务的。\r\n</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""><br />\r\n	</p>\r\n<p style="color:#333333;font-family:Helvetica, " font-size:14px;"=""> <strong>最后，Kindle并不是那种全面提升你生活质量的产品，但如果你是一个与书本缘分深厚，恨不得有一间书房的人，那么Kindle Paperwhite3会是你很好的“书房”选择。</strong> \r\n</p>\r\n<div>\r\n	<strong><br />\r\n</strong> \r\n</div>\r\n	</p>', 2, '', '', 1539322846, 1),
(2, 1, '18815539872', '小米5S全面评测 买不买小米5S看完你就知道了！', '18815539872', '18815539872', '<h1 style="font-size:22px;font-weight:400;color:#333333;font-family:arial, " background-color:#ffffff;"=""> <span style="color:#FF8B3D;">小米5S全面评测 买不买小米5S看完你就知道了！</span>\r\n	</h1>\r\n<div style="font-size:16px;color:#333333;font-family:arial, " background-color:#ffffff;"="">\r\n	<p>\r\n		<br />\r\n	</p>\r\n	<p>\r\n		<strong>小米5S全面评测 买不买小米5S看完你就知道了！</strong>在手机行业有这样一种说法叫做“金九银十”，也就是说大部分厂商更愿意选择在九、十月份发布新品，这也导致该阶段手机产品成井喷式的增长。造成这一现象的原因主要是因为国庆假期、双11、双12等购物节均集中在下半年，这无形中便能为自家手机的宣传和促销造势。小米5s选择在9月底这个节点发布，首先国庆假期便能将自己积攒的第一批库存清掉，接下来一个月时间，刚好可以度过产品的产能爬坡阶段。而紧接着双11便会来临，预计小米5s的销量也将会在这个时候迎来峰值，而后面的双12、元旦假期等促销节点，则有可能会伴随着降价或是提供赠品进行销售。也就是说，小米从产品周期上就已经为自己的销量铺好了路。那么，小米5s的上市是否背负着太多商业目的，而导致产品本身缺乏竞争力呢？相信看了本篇评测你便能得到答案。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/a0ac61e680b126c0f7e54f5eb95035c2.jpg" /> \r\n	</p>\r\n	<p>\r\n		<br />\r\n	</p>\r\n	<p>\r\n		<strong> 小米5s是小米深入细分市场后的结果</strong> \r\n	</p>\r\n	<p>\r\n		雷军曾在多个产品发布会会上提到这样的语句，“网友问我能不能做个XX功能”、“大家说做了玻璃能不能做金属？”、“米粉希望手机拥有XX功能，于是我们将它加入到了我们的手机当中”。不难看出，小米在产品研发的道路上一直坚持于倾听消费者的声音，善于做市场调研，愿意将消费者需要的功能或是设计加入到自己的产品当中。这得益于小米从MIUI开始便积累的庞大用户基数，能更快的了解消费者需求并作出改善，这是小米所擅长的，也是其产业初期成功的原因。\r\n	</p>\r\n	<p>\r\n		但这其实也是束缚小米进军高端市场的一大因素。我曾记得乔布斯说过这样一句话：“亨利·福特在发明汽车之前去做市场调查，他得到的答案一定是大家都希望买到一辆更好的马车。这对亨利·福特发明第一辆汽车有帮助吗？”。细细品味不难发现，表面上用户所需要的并非是其内心真正需求的。回到小米5s身上，有些用户想要一款金属材质的旗舰机，因此小米5s做成了金属；年轻人需要一款性能剽悍的手机，因此小米5s搭载了骁龙821处理器；用户想拍出更好看的照片，因此小米5s配备了sony IMX378传感器等等。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/45e49a7c3879a0a3666bead98c388293.jpg" /> \r\n	</p>\r\n	<p>\r\n		也就是说，如今的小米依旧在为用户打造极致产品的道路上努力匍匐前行，而没有在米粉的支撑下树立起巨人的身躯，高观远瞻，打造令人惊艳的产品。当然这并非是小米的错，而是国产手机的现状。小米算是新兴国产手机品牌的代表，它拥有极高的用户群，更有能力做一些小厂商做不到的事情，所背负的“新国货”愿景也应当比别人更重。\r\n	</p>\r\n	<p>\r\n		所以在评测之前，笔者先有了一个结论，尽管小米5s被各种“黑科技”光环所笼罩，但无论是从命名上还是产品本身来看，都不是一个明显的迭代产品。它的使命更多的是深入细分市场，并保证与友商比拼不落下风。\r\n	</p>\r\n	<p style="text-align:center;">\r\n		<strong>小米5s标准版/高配版参数对比产品型号</strong> \r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/8d02a760ac742cf32bab4e54ee1346be.jpg" /> \r\n	</p>\r\n	<p>\r\n		从两个版本的对比表格来看，无论是哪个版本，小米5s的硬件惨依旧是业界顶尖级别的。这其中有小米保守的一面，例如骁龙821处理器依旧是降频版的、高配版也没有采用6GB运行内存、机身工艺一分为二，浅灰和金色采用高光拉丝、银色和玫瑰金为亚光磨砂。但同时小米5s也有激进的一面，例如引入了业界并未成熟的超声波指纹技术，以及在安卓平台体验并不好的压力屏。但综合来说，无论你是买标配版还是高配版的小米5s，整体体验出入不大，购机前主要需要考量的是颜色的挑选和机身存储空间的大小，因为不同颜色工艺不同，并且小米5s不支持TF卡扩展。\r\n	</p>\r\n	<p>\r\n		曾经跑分是小米最爱做的事情，也是自己的产品引以为傲的卖点。不过随着硬件同质化日趋严重，各个品牌的旗舰机型的跑分基本不分上下。此外用户也开始注重用户体验而非单方面的跑分数字，所以今天的小米也开始淡化硬件参数，更希望用户将关注的重点放在小米有独到之处的地方。但跑分依旧是量化性能的最好方式，我们依旧放上了小米5s高配版的跑分结果。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/22d6de181f58f9699f434ede27719aec.jpg" /> \r\n	</p>\r\n	<p>\r\n		从跑分结果来看，小米5s虽然没有配备6GB的运行内存，但实际分数已经与一加手机3保持相同。但其实同一量级的产品做跑分上的比较没有实际意义，最终能否为用户提供流畅的用户体验才是王道。对于小米5s来说，它依然是跑分王，但如今的跑分王也已经渐渐不看跑分了。\r\n	</p>\r\n	<p>\r\n		<strong>外观设计无亮点，小米5的金属版</strong> \r\n	</p>\r\n	<p>\r\n		如果让我用一句话形容小米5s的外观，那就是金属版的小米5。因为无论是机身各个开孔的位置、四周倒角的弧度还是整机尺寸的大小均和小米5基本保持相同。与前代最直观的差别仅剩Home键以及材质的差别了，对于一般消费者来说很难分别。但小米5到小米5s的过渡还与iPhone6到iPhone6s的过渡不同，细心品味的话还是能找出一些升级点的。\r\n	</p>\r\n	<p>\r\n		<strong><img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/2cc7157f1a9b639ad4778f58d8436fbc.jpg" /></strong> \r\n	</p>\r\n	<p>\r\n		首先当笔者拿到小米5s的时候，明显绝对相比之前的小米5来说略有压手，但这种感觉并不强烈，基本上就是拿着一本书和拿着一本书再加上一叠纸的差别。从参数上来看，小米5s的三围相比小米5来说均增加了1mm左右，机身重量大致增加了16g左右，如果对比小米5陶瓷版的话，那么两者的重量差基本就可以忽略不计了。根据笔者推测，导致小米5s的机身重量增加的原因主要是因为压感屏的加持，以及额外多出来的200mAh电池容量。如果对比手感的话，笔者拿到的这款浅灰色小米5s与玻璃后盖的小米5相差不大，只是玻璃表面稍微光滑一些而已。\r\n	</p>\r\n	<p>\r\n		机身正面除了Home键位置以外，值得关注的地方还有两点。其一是“mi”logo在小米5s上被去除了，这样的做法大大增加了机身正面的一体性，视觉观感看上去更好一些，这也是之前网友提出的小米5槽点之一。另外一点是机身正面覆盖了一层2.5D玻璃，使手机的握持感更加舒适，不会像小米5那样硌手，另外就是为全金属机身的手机，增添一些玻璃质感。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/325aff9a4f6edb05e91b3e6952bf95cb.jpg" /> \r\n	</p>\r\n	<p>\r\n		小米5s的Home键需要着重讲解一下。小米5s采用了无孔式超声波指纹模块，这项技术来自于高通基于超声波的3D指纹解决方案。这项技术相比传统指纹来说拥有高的识别能力、适用性和集成性。简单来说，小米5s的指纹模块能够发出超声波来感应你的指纹，它能穿透玻璃、金属表面，这便是小米能将其模块无孔化的原因。此外，即使手上粘有汗水、护手霜、小污物的话，依然能准确的识别出你的指纹。\r\n	</p>\r\n	<p>\r\n		但这项解决方案早在2015年3月就已经发布出来，但为何小米至今才将其运用到自家手机之上呢？这主要是因为这套解决方案放到手机当中拥有不少的技术难点，其一是如果将其完整的覆盖于玻璃底面，那么频繁的用手机发射声波势必会影响电池的使用寿命。其二，如果将其模块缩小到能够接受的大小，若不是不涉及一个位置来指示消费者按压的话，会导致用户无法精确的将手指放到指纹模块的位置。因此，即使这项技术不需要集成在Home键上，小米还是为其设计了一个凹槽，方便用户找到它。这确实只是个凹槽，因此你也无需担心Home键掉漆或是按键坏掉的问题了。\r\n	</p>\r\n	<p>\r\n		具体到实际使用的情况来看，一般情况下它和普通的指纹并没有什么区别，识别速度相比小米5也没有什么提升。但是相比一般指纹模块来说，当手指沾上水的时候，超声波指纹的识别率会更高。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/b30939bf3c1e3dc1ff7afabd42c8ae96.jpg" /> \r\n	</p>\r\n	<p>\r\n		中框部分，由于小米5s改用全金属机身所以也无需像小米5那样增加一个金属中框。得益于此，在金属一体式机身配合背部的3D弧度十分贴合手掌，拿起来更加舒适一些。值得注意的是，小米5s意外的取消了红外感应模块。之所以说以外是因为过去一年多的时间里，无论是小米手机还是红米手机均配备了红外模块，目前是能够将家里各个电器的遥控器进行电子平台化整合，方便使用。这次的取消是否意味着未来小米在连接性方面会有更好的解决方案？这就只能等小米官方给出准确答复了。\r\n	</p>\r\n	<p>\r\n		小米5s浅灰色的机身背面采用了与红米Pro相同的设计，在拉丝金属的表面镀膜，从而让机身表面既拥有出色的金属质感同时还具备玻璃般的光泽靓丽。这种设计方案本身看上去并不廉价，就只怪小米先将这项设计放在了红米手机上。先入为主是大家普遍的思维定式，给小米5s这款顶级旗舰机型配上红米的设计，怎么都觉得小米不厚道。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/e0bab038a5daf49931966e820272c428.jpg" /> \r\n	</p>\r\n	<p>\r\n		其实细心的网友还能发现一点，那就是小米5和小米5s的摄像头部分有点差异，小米5s的双色温闪光灯放在了摄像头的左侧，而小米5的在右侧。其实原因很简单，就是金属相比玻璃来说延展性更好，玻璃十分易碎，因此很难在弯曲的3D弧面上进行打孔，而小米5s的金属机身刚好规避了这一问题。所以仔细分析的话，其实小米5s的背部设计更为合理一些，但丑陋的纳米注塑带又将本应加分的点抹黑了。\r\n	</p>\r\n	<p>\r\n		总结下来，小米5s表面看上去是金属版的小米5，但其实在这基础上也尽可能的做了些许工艺上的努力。但终究小米5s还是为了那些钟爱金属材质的用户所打造的，单论颜值的话，或许还不及小米5。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/6486753173142479345729313911ac2d.jpg" /> \r\n	</p>\r\n	<p>\r\n		<strong>索尼定制CMOS，超光感相机惊艳</strong> \r\n	</p>\r\n	<p>\r\n		本次秋季发布会，小米5s并没有带来小米5 Plus的双摄像头，这点也类似苹果在iPhone7系列的上的配置分布。不过，小米5s在相机方面也配备了传说中的黑科技-超感光相机，这点也是雷军曾信心满满地在微博晒样张的主要原因之一。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/7ac0cf01e8b51eb660ec781612165742.jpg" /> \r\n	</p>\r\n	<p>\r\n		<span style="font-family:Simsun;font-size:14px;line-height:25px;"> 本次小米5s搭载了索尼IMX 387 1200万像素镜头与f2.0光圈、80度大广角、双色温闪光灯组合。另外，1.55 微米的超大对焦辅助像素，再配合最新的滚珠式闭环控制对焦马达，在弱光下对焦速度也相当精准。说了这么多黑科技，那么小米5s拍照到底怎样?我们也将它与安卓拍照标杆的三星Galaxy S7进行简单对比。</span> \r\n	</p>\r\n	<p>\r\n		<span style="font-family:Simsun;font-size:14px;line-height:25px;"><img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/799cf0d4811434a18bcf94cbce5b8ec4.jpg" /></span> \r\n	</p>\r\n	<p>\r\n		<span style="font-family:Simsun;font-size:14px;line-height:25px;"> 在拍照方面，评价一款相机硬件是否强悍一般都会看感光元件，感光元件面积越大，这也就意味着进光量越高，进光量越高也就意味着拍出来的照片画质越好。本次小米5s的超感光相机配备了1/2.3” 超大感光元件，面积相比iPhone6s Plus大乐59%，整体几乎与常见卡片相机相当。大感光元件的好处可以简单立即为在弱光下，它可以更好的还原场景以及拍摄出更强的细节。</span> \r\n	</p>\r\n	<p>\r\n		<span style="font-family:Simsun;font-size:14px;line-height:25px;"><img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/14c653374849ecae60f5dffb51ef75cc.jpg" /></span> \r\n	</p>\r\n	<p>\r\n		既然是配备了拍照方面的黑科技，所以我们在样张对比方面首选就是夜景样张。在这组普通夜景样张当中我们很意外的是小米居然这么厉害，曾经的标杆在这里有些黯然失色。在配备更大面积感光元件的情况下将夜色拍色的更纯净，黑色的还原更真实，三星则整体表现要更亮一些，出现比较明显的噪点。另外，我们在赛百味品牌LOGO上面可以看到较明显的曝光，小米5s则不会出现。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/0cfdf925151617791f0b147e8de1b38c.jpg" /> \r\n	</p>\r\n	<p>\r\n		在弱光下远景细节小米5s相对三星Galaxy S7也有较明显的优势，我们在看到二者同时放大到100%细节的情况下，虽然二者都不能清晰拍到车牌号，但最起码小米5s在弱光远景样张当中可以拍摄出大概轮廓。夜晚远景细节的表现还是让我们感谢超感光相机。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/51ba027937e3b7de0e1c0913a5e7811e.jpg" /> \r\n	</p>\r\n	<p>\r\n		在弱光的情况下，遇到自发光物体也十分考验这款产品的白平衡能力。我们在夜晚拍摄大厦样张当中再一次体会到号称夜视仪的三星Galaxy S7，它可以拍摄出超过肉眼看到的亮度并且还可以的还拍摄出更清晰的样张。但我们不得不承认，三星在算法上将照片更亮，但导致样张白平衡并不是很准确。通过这张样张我们可以看到小米5s虽然在细节上不如三星Galaxy S7，但整体色彩更接近真实情况。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/62a53bbbacb52cf7bcc482d1ad78dfa3.jpg" /> \r\n	</p>\r\n	<p>\r\n		我们都知道，当相机遇到红绿相接的情况下，大部分相机都会出现白平衡准确的情况。本次小米5s还是给了我们一个满意的答卷。首先，在红色、绿色水果上面都可以很好的还原本来色彩。另外，我们关注几个细节，红色苹果黄色部分、绿色苹果黄色部分都没有出现严重的白平衡色差，这点很难得。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/b2fd9beed39a99b0dae3eb4ad2491e51.jpg" /> \r\n	</p>\r\n	<p style="text-align:center;">\r\n		▲小米5s样张\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/914db77276d1882f6987dde9056cd6d8.jpg" /> \r\n	</p>\r\n	<p style="text-align:center;">\r\n		▲小米5s样张\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/8acc7e1fabdd9f3371b9c3c546fe19ac.jpg" /> \r\n	</p>\r\n	<p style="text-align:center;">\r\n		▲小米5s样张\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/7918c41c46569388db095baf9f93976b.jpg" /> \r\n	</p>\r\n	<p style="text-align:center;">\r\n		▲小米5s样张\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/56fff22490285ae53b20ad2e5f294264.jpg" /> \r\n	</p>\r\n	<p style="text-align:center;">\r\n		▲小米5s样张\r\n	</p>\r\n	<p>\r\n		通过相机部分体验，我们总结出小米5s属于2016年安卓手机当中第一梯队标准，在保障相机白平衡、对焦速度的基础上增大了感光元件，大的感光元件带来了卓越的夜景体验，光线明感过度细腻，完全符合小米声称的“黑夜之眼”口号。虽然它与标杆级别的iPhone7 Plus还存在一定差距，但1999元的售价，仅在相机方面我们是认可小米5s的。\r\n	</p>\r\n	<p>\r\n		<strong>系统体验，3D Touch体验尚不完善</strong> \r\n	</p>\r\n	<p>\r\n		小米5s依旧搭载的是基于Android 6.0.1开发的MIUI 8操作系统。目前笔者拿到的系统版本为MIUI 8 6.9.22开发版，也就是目前最新的开发版MIUI 8系统。经过长达6年的迭代，如今MIUI的体量已经非常庞大，流畅的操作体验、精美的扁平化UI以及丰富的个性化功能让其它国产ROM望尘莫及。虽然饱受诟病的广告问题仍在一些小角落存在，但相比之前也明显收敛了很多，小米也在积极的利用云端和大数据对广告推送进行优化，试图让广告也成为用户所需要的内容。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/9186db0fcb21cd2fbfe87504920fc060.jpg" /> \r\n	</p>\r\n	<p>\r\n		<br />\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/6f82c9d75a9c32a92e2ce77021f29dbd.jpg" /> \r\n	</p>\r\n	<p>\r\n		从整体界面上来看，MIUI 8依旧保持着小清新的设计风格。下拉菜单功能丰富，不但能够呼出搜索栏，同时还显示出了当前天气以及日历情况，此外还有快捷开关和亮度调节等按钮，将如此繁杂的功能集成一身还能保证颜值，可见小米的设计团队确实做出了不小的努力。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/0ab2433238af9fa8284cb38f78acf455.jpg" /> \r\n	</p>\r\n	<p>\r\n		此外，最新的MIUI 8还集成了手机分身、应用分身、生活计算器、扫一扫等多种特色功能。你能轻松的建立一个隐私系统、用一款手机同时使用两个微信号、用自带计算器计算汇率、个人所得税甚至房贷，甚至用手机扫作业题直接得到答案等等。\r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/d21f1e9d8103b44d2ea67ee1428b913f.jpg" /> \r\n	</p>\r\n	<p>\r\n		<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/3b33442fd34af22f722e4581e0783efc.jpg" /> \r\n	</p>\r\n	<p>\r\n		通过笔者的测试，小米5s的3D Touch功能还未开发完全。首先，相比于iPhone来说，小米5s的3D Touch不支持调节压感的敏感度，这导致用户无法选择一个适合自己的用力大小。同时在过渡动画上，小米只做了呼出压感菜单的动画效果，而缺失了退出菜单时的过渡动画，给人的操作感觉十分不自然。此外，虽然小米5s系统层级的应用基本均能支持3D Touch菜单，但遗憾的是，笔者目前还没有发现支持压感的第三方应用。\r\n	</p>\r\n	<p>\r\n		因此需要说明的时，目前你没有必要因为3D Touch功能为小米5s的高配版买单，因为这项技术在安卓平台的体验还不完善。虽然华为、中兴、魅族均推出过支持压力感应的手机，但无论是哪家，在用户体验上都很难与苹果抗衡。除非未来谷歌在原生Android上对此技术进行跟进，否则单靠第三方厂商的定制很难实现规模化。<img src="http://cdn.fds.api.xiaomi.com/b2c-bbs/cn/attachment/e53d24e0eb7a2814c47ceb99d4271719.jpg" /> \r\n	</p>\r\n	<p>\r\n		<strong>评测总结：迎合市场需求的时代产物</strong> \r\n	</p>\r\n	<p>\r\n		通过本篇的评测，相信你对于小米5s已经有了一定的了解。小米5s依旧是那个为发烧友而生的手机，它采用了业界一流的硬件参数，并且相机水平的提升也十分惊人，即使对比三星S7也不占下风。但如今的发烧友似乎已经渐渐退烧了，单纯的堆砌硬件已经不能他们的需求。工业设计以及真正自主研发的技术储备是未来小米需要深耕的主要方向。小米华丽转型，技压群雄，推出3000元以上价位的手机仍是万众米粉们的期待。\r\n	</p>\r\n	<p>\r\n		小米5s这款产品对于小米的意义，在笔者看来大多是顺应市场的需求，并结合有利的天时，试图进一步的扩大小米品牌的出货量。当然，其本身也拥有一定的差异化价值，例如小米5s首发IMX 378传感器，也是首款无孔超声波指纹手机。相比于同价位手机来说，小米的优势在于出色的拍照水平、成熟实用的操作系统以及发烧级别的硬件参数。另外，当小米5s发布之后，小米5的价格也得到了进一步的降低。如果你正在纠结买小米5还是小米5s的话，笔者认为，如果看中外观则选择小米5，如果看中拍照便选择小米5s。因为两者在硬件上的差距最终体现到用户体验上，几乎相当。\r\n	</p>\r\n		</div>', 6, '', '', 1539322802, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_docutype`
--

CREATE TABLE IF NOT EXISTS `my_member_docutype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) NOT NULL,
  `arrid` tinyint(1) NOT NULL DEFAULT '1',
  `ifview` tinyint(1) NOT NULL DEFAULT '1',
  `displayorder` int(5) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `my_member_docutype`
--

INSERT INTO `my_member_docutype` (`typeid`, `typename`, `arrid`, `ifview`, `displayorder`) VALUES
(1, '商家资讯', 1, 2, 1),
(2, '优惠促销', 2, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_level`
--

CREATE TABLE IF NOT EXISTS `my_member_level` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `levelname` varchar(30) NOT NULL,
  `ifsystem` tinyint(1) NOT NULL,
  `purviews` varchar(250) NOT NULL,
  `money_own` mediumint(8) NOT NULL,
  `perday_maxpost` smallint(5) NOT NULL,
  `allow_tpl` mediumtext NOT NULL,
  `member_contact` tinyint(1) NOT NULL DEFAULT '1',
  `signin_notice` tinyint(1) NOT NULL DEFAULT '0',
  `signin_del` tinyint(1) NOT NULL DEFAULT '1',
  `signin_view` tinyint(1) NOT NULL DEFAULT '1',
  `moneysettings` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_member_level`
--

INSERT INTO `my_member_level` (`id`, `levelname`, `ifsystem`, `purviews`, `money_own`, `perday_maxpost`, `allow_tpl`, `member_contact`, `signin_notice`, `signin_del`, `signin_view`, `moneysettings`) VALUES
(1, '新手上路', 1, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_banner', 5, 5, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'N;'),
(2, '普通会员', 1, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_goods,purview_banner', 0, 100, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'a:2:{s:6:"ifopen";a:3:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"1";s:7:"forever";s:1:"1";}s:5:"money";a:4:{s:5:"month";s:5:"20000";s:8:"halfyear";s:6:"300000";s:4:"year";s:7:"1000000";s:7:"forever";s:7:"2000000";}}'),
(3, '黄金会员', 0, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_coupon,purview_group,purview_goods,purview_banner', 0, 100, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'a:2:{s:6:"ifopen";a:4:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"1";s:4:"year";s:1:"1";s:7:"forever";s:1:"1";}s:5:"money";a:4:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"2";s:4:"year";s:1:"3";s:7:"forever";s:1:"4";}}');

-- --------------------------------------------------------

--
-- 表的结构 `my_member_pm`
--

CREATE TABLE IF NOT EXISTS `my_member_pm` (
  `id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,
  `fromuser` varchar(50) NOT NULL,
  `touser` varchar(50) NOT NULL,
  `pubtime` int(10) unsigned NOT NULL DEFAULT '0',
  `retime` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `retitle` varchar(250) NOT NULL,
  `content` mediumtext,
  `recontent` mediumtext NOT NULL,
  `if_read` tinyint(1) NOT NULL DEFAULT '0',
  `if_sys` tinyint(1) NOT NULL,
  `if_del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fromuser` (`fromuser`),
  KEY `touser` (`touser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_member_record_login`
--

CREATE TABLE IF NOT EXISTS `my_member_record_login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` char(32) NOT NULL,
  `userpwd` char(30) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ip2area` varchar(32) NOT NULL,
  `browser` varchar(20) NOT NULL,
  `port` varchar(20) NOT NULL,
  `os` varchar(20) NOT NULL,
  `outdate` int(10) NOT NULL,
  `result` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `my_member_record_login`
--

INSERT INTO `my_member_record_login` (`id`, `userid`, `userpwd`, `pubdate`, `ip`, `ip2area`, `browser`, `port`, `os`, `outdate`, `result`) VALUES
(7, '18815539872', '', 1539563779, 'unknown', 'IANA', 'Chrome 70.0.3534.4', '50222', 'Windows NT', 0, 1),
(4, 'sj18815539872', '', 1539248603, 'unknown', 'IANA', 'Chrome 70.0.3534.4', '59175', 'Windows NT', 1539248799, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_record_use`
--

CREATE TABLE IF NOT EXISTS `my_member_record_use` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` char(50) NOT NULL,
  `paycost` char(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `pubtime` (`pubtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `my_member_record_use`
--

INSERT INTO `my_member_record_use` (`id`, `userid`, `paycost`, `subject`, `pubtime`) VALUES
(1, 'sj_153922297566', '<font color=red>扣除金币 3 </font>', '编号为 5 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539227935),
(2, 'sj_153922297566', '<font color=red>扣除金币 3 </font>', '编号为 4 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539228265),
(3, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 3 的信息主题被执行 <font color=red>套红</font> 操作', 1539228273),
(4, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 3 的信息主题被执行 <font color=red>加粗</font> 操作', 1539228275),
(5, 'sj_153922297566', '<font color=red>扣除金币 3 </font>', '编号为 3 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539228282),
(6, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 1 的信息主题被执行 <font color=red>套红</font> 操作', 1539228289),
(7, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 1 的信息主题被执行 <font color=red>加粗</font> 操作', 1539228293),
(8, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 2 的信息主题被执行 <font color=red>套红</font> 操作', 1539228506),
(9, 'sj_153922297566', '<font color=red>扣除金币 3 </font>', '编号为 2 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539228508),
(10, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 5 的信息主题被执行 <font color=red>套红</font> 操作', 1539228569),
(11, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 5 的信息主题被执行 <font color=red>加粗</font> 操作', 1539228571),
(12, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 4 的信息主题被执行 <font color=red>套红</font> 操作', 1539228604),
(13, 'sj_153922297566', '<font color=red>扣除金币 1 </font>', '编号为 4 的信息主题被执行 <font color=red>加粗</font> 操作', 1539228611),
(14, 'sj_153922297566', '<font color=red>扣除金币 3 </font>', '编号为 1 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539229048),
(15, '18815539872', '<font color=red>扣除金币 3 </font>', '编号为 11 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539238379),
(16, '18815539872', '<font color=red>扣除金币 3 </font>', '编号为 13 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539238494),
(17, '18815539872', '<font color=red>扣除金币 1 </font>', '编号为 13 的信息主题被执行 <font color=red>套红</font> 操作', 1539238501),
(18, '18815539872', '<font color=red>扣除金币 1 </font>', '编号为 13 的信息主题被执行 <font color=red>加粗</font> 操作', 1539238513),
(19, '18815539872', '<font color=red>扣除金币 3 </font>', '编号为 10 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539239801),
(20, '18815539872', '<font color=red>扣除金币 3 </font>', '编号为 8 的信息主题被执行 <font color=red>首页置顶</font> 操作', 1539240270);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_tpl`
--

CREATE TABLE IF NOT EXISTS `my_member_tpl` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `if_view` tinyint(1) NOT NULL DEFAULT '2',
  `tpl_name` varchar(250) NOT NULL,
  `tpl_path` varchar(250) NOT NULL,
  `displayorder` int(5) NOT NULL,
  `edittime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `my_member_tpl`
--

INSERT INTO `my_member_tpl` (`id`, `if_view`, `tpl_name`, `tpl_path`, `displayorder`, `edittime`) VALUES
(1, 2, '蓝色主题', 'blue', 1, 1273410326),
(2, 2, '橙红主题', 'orange', 2, 1273410338),
(4, 2, '绿色主题', 'green', 4, 1273410646),
(6, 2, '紫色主题', 'purple', 6, 1466692165),
(7, 2, '粉色主题', 'pink', 7, 1466692175);

-- --------------------------------------------------------

--
-- 表的结构 `my_member_wx`
--

CREATE TABLE IF NOT EXISTS `my_member_wx` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `actionkey` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `userpwd` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_mobile_gg`
--

CREATE TABLE IF NOT EXISTS `my_mobile_gg` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `words` varchar(50) NOT NULL,
  `pubdate` int(11) NOT NULL,
  `displayorder` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `my_mobile_gg`
--

INSERT INTO `my_mobile_gg` (`id`, `typeid`, `image`, `url`, `words`, `pubdate`, `displayorder`) VALUES
(1, 1, '/attachment/mobile_gg/1469676806dzt6z.jpg', 'index.php', '天猫超市', 1469676806, 1),
(2, 2, '/attachment/mobile_gg/14696777801tuyl.jpg', 'index.php', '疯狂猜车', 1469677780, 2),
(3, 1, '/attachment/mobile_gg/1469677858x6r1c.png', 'index.php', '海量物品免费获取', 1469677858, 3),
(4, 2, '/attachment/mobile_gg/1469677887yuini.png', 'index.php', '7天退换', 1469677887, 4);

-- --------------------------------------------------------

--
-- 表的结构 `my_mobile_nav`
--

CREATE TABLE IF NOT EXISTS `my_mobile_nav` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `url` char(250) NOT NULL,
  `color` varchar(7) NOT NULL,
  `ico` varchar(200) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `target` varchar(10) NOT NULL,
  `isview` tinyint(1) NOT NULL,
  `displayorder` int(5) NOT NULL,
  `createtime` int(10) NOT NULL,
  `typeid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`,`isview`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `my_mobile_nav`
--

INSERT INTO `my_mobile_nav` (`id`, `title`, `url`, `color`, `ico`, `flag`, `target`, `isview`, `displayorder`, `createtime`, `typeid`) VALUES
(1, '信息分类', 'index.php?mod=category', '', '', 'category', '_self', 2, 2, 1469520429, 1),
(2, '热点资讯', 'index.php?mod=news', '', '', 'news', '_self', 2, 3, 1469520458, 1),
(3, '商家店铺', 'index.php?mod=corp', '', '', 'corp', '_self', 2, 4, 1469520485, 1),
(4, 'mymps首页', 'index.php?mod=index', '', '', 'index', '_self', 2, 1, 1469521176, 1),
(49, '商务服务', 'index.php?mod=category&catid=189', '', '/template/default/images/index/icon_business.gif', '', '_self', 2, 11, 0, 2),
(48, '教育培训', 'index.php?mod=category&catid=10', '', '/template/default/images/index/icon_edu.gif', '', '_self', 2, 10, 0, 2),
(47, '生活服务', 'index.php?mod=category&catid=9', '', '/template/default/images/index/icon_life.gif', '', '_self', 2, 9, 0, 2),
(46, '宠物', 'index.php?mod=category&catid=8', '', '/template/default/images/index/icon_pet.gif', '', '_self', 2, 8, 0, 2),
(45, '交友活动', 'index.php?mod=category&catid=7', '', '/template/default/images/index/icon_love.gif', '', '_self', 2, 7, 0, 2),
(43, '兼职招聘', 'index.php?mod=category&catid=5', '', '/template/default/images/index/icon_jzzhaopin.gif', '', '_self', 2, 5, 0, 2),
(44, '求职简历', 'index.php?mod=category&catid=6', '', '/template/default/images/index/icon_jianli.gif', '', '_self', 2, 6, 0, 2),
(42, '全职招聘', 'index.php?mod=category&catid=4', '', '/template/default/images/index/icon_zhaopin.gif', '', '_self', 2, 4, 0, 2),
(41, '房屋租售', 'index.php?mod=category&catid=3', '', '/template/default/images/index/icon_fang.gif', '', '_self', 2, 3, 0, 2),
(40, '车辆买卖', 'index.php?mod=category&catid=2', '', '/template/default/images/index/icon_che.gif', '', '_self', 2, 2, 0, 2),
(39, '二手转让', 'index.php?mod=category&catid=1', '', '/template/default/images/index/icon_ershou.gif', '', '_self', 2, 1, 0, 2),
(54, '商品展示', 'index.php?mod=goods', '', '/template/default/images/index/icon_goods.gif', '', '_self', 2, 14, 1469545508, 2),
(53, '热点资讯', 'index.php?mod=news', '', '/template/default/images/index/icon_news.gif', '', '_self', 2, 13, 1469545240, 2),
(52, '商家机构', 'index.php?mod=corp', '', '/template/default/images/index/icon_corp.gif', '', '_self', 2, 12, 1469545077, 2),
(55, '商品展示', 'index.php?mod=goods', '', '', 'goods', '_', 2, 5, 1470070591, 1);

-- --------------------------------------------------------

--
-- 表的结构 `my_navurl`
--

CREATE TABLE IF NOT EXISTS `my_navurl` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `url` char(250) NOT NULL,
  `color` varchar(7) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `ico` varchar(20) NOT NULL,
  `target` varchar(10) NOT NULL,
  `title` char(250) NOT NULL,
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `isview` smallint(1) NOT NULL DEFAULT '1',
  `displayorder` int(5) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typeid` (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_news`
--

CREATE TABLE IF NOT EXISTS `my_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `iscommend` tinyint(1) NOT NULL DEFAULT '0',
  `isfocus` varchar(10) NOT NULL,
  `isbold` tinyint(1) NOT NULL DEFAULT '0',
  `isjump` tinyint(1) NOT NULL DEFAULT '0',
  `redirect_url` varchar(250) NOT NULL,
  `title` varchar(30) NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `catid` int(8) NOT NULL,
  `begintime` int(11) NOT NULL,
  `introduction` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `author` varchar(30) NOT NULL,
  `source` varchar(100) NOT NULL,
  `hit` int(10) NOT NULL DEFAULT '0',
  `perhit` int(10) NOT NULL DEFAULT '1',
  `imgpath` varchar(100) NOT NULL DEFAULT '0',
  `html_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `imgpath` (`imgpath`),
  KEY `begintime` (`begintime`),
  KEY `hit` (`hit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_payapi`
--

CREATE TABLE IF NOT EXISTS `my_payapi` (
  `payid` smallint(6) NOT NULL AUTO_INCREMENT,
  `paytype` varchar(20) NOT NULL DEFAULT '',
  `buytype` tinyint(1) NOT NULL DEFAULT '1',
  `myorder` tinyint(4) NOT NULL DEFAULT '0',
  `payfee` varchar(10) NOT NULL DEFAULT '',
  `payuser` varchar(60) NOT NULL DEFAULT '',
  `partner` varchar(60) NOT NULL DEFAULT '',
  `paykey` varchar(120) NOT NULL DEFAULT '',
  `appid` varchar(60) NOT NULL,
  `appkey` varchar(60) NOT NULL,
  `paylogo` varchar(200) NOT NULL DEFAULT '',
  `paysay` mediumtext NOT NULL,
  `payname` varchar(120) NOT NULL DEFAULT '',
  `isclose` tinyint(1) NOT NULL DEFAULT '0',
  `payemail` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`payid`),
  UNIQUE KEY `paytype` (`paytype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `my_payapi`
--

INSERT INTO `my_payapi` (`payid`, `paytype`, `buytype`, `myorder`, `payfee`, `payuser`, `partner`, `paykey`, `appid`, `appkey`, `paylogo`, `paysay`, `payname`, `isclose`, `payemail`) VALUES
(1, 'tenpay', 0, 0, '0', '', '', '', '', '', '', '财付通（www.tenpay.com） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付。', '财付通', 0, ''),
(2, 'chinabank', 1, 1, '0', '', '', '', '', '', '', '网银在线与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。（网址：http://www.chinabank.com.cn）', '网银在线', 0, ''),
(3, 'alipay', 1, 0, '', '', '', '', '', '', '', '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。', '支付宝接口', 0, ''),
(4, 'alipay_h5', 0, 0, '', '', '', '', '', '', '', '    支付宝手机网站支付    ', '支付宝手机接口', 0, ''),
(5, 'wxpay', 0, 0, '', '', '', '', '', '', '', '    微信端手机支付    ', '微信支付', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `my_payrecord`
--

CREATE TABLE IF NOT EXISTS `my_payrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `userid` varchar(30) NOT NULL,
  `orderid` varchar(50) NOT NULL DEFAULT '',
  `money` varchar(20) NOT NULL DEFAULT '',
  `ifadd` tinyint(1) NOT NULL DEFAULT '0',
  `paybz` varchar(10) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '',
  `payip` varchar(20) NOT NULL DEFAULT '',
  `posttime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`uid`,`orderid`),
  KEY `posttime` (`posttime`),
  KEY `orderid` (`orderid`),
  KEY `ifadd` (`ifadd`),
  KEY `ifadd_2` (`ifadd`),
  KEY `orderid_2` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `my_payrecord`
--

INSERT INTO `my_payrecord` (`id`, `uid`, `userid`, `orderid`, `money`, `ifadd`, `paybz`, `type`, `payip`, `posttime`) VALUES
(1, 1, 'sj_153922297566', '1539228218', '20000', 0, '充值成功', '管理员', 'unknown', 1539228218);

-- --------------------------------------------------------

--
-- 表的结构 `my_plugin`
--

CREATE TABLE IF NOT EXISTS `my_plugin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `flag` varchar(30) NOT NULL DEFAULT '',
  `iscore` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `directory` varchar(100) NOT NULL DEFAULT '',
  `disable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `config` mediumtext NOT NULL,
  `version` varchar(60) NOT NULL DEFAULT '',
  `releasetime` int(10) NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT '',
  `introduce` mediumtext NOT NULL,
  `siteurl` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `copyright` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `my_plugin`
--

INSERT INTO `my_plugin` (`id`, `flag`, `iscore`, `name`, `directory`, `disable`, `config`, `version`, `releasetime`, `author`, `introduce`, `siteurl`, `email`, `copyright`) VALUES
(1, 'coupon', 0, '优惠券', 'coupon', 0, 'a:4:{s:8:"seotitle";s:10:"优惠券标题";s:11:"seokeywords";s:12:"优惠券关键词";s:14:"seodescription";s:10:"优惠券描述";s:9:"adminmenu";s:60:"优惠券分类=coupon_category.php\r\n已上传优惠券=coupon_list.php";}', '1.0', 1278232105, 'steven', '商铺优惠券插件', 'http://www.mymps.com.cn', 'business@live.it', 'Mymps Dev.'),
(13, 'group', 0, '团购', 'group', 0, 'a:4:{s:8:"seotitle";s:12:"团购活动标题";s:11:"seokeywords";s:14:"团购活动关键词";s:14:"seodescription";s:12:"团购活动描述";s:9:"adminmenu";s:81:"团购分类=group_category.php\r\n已发起团购=group_list.php\r\n报名管理=group_signin.php";}', '1.0', 1278232105, 'steven', '团购活动插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.'),
(3, 'news', 0, '资讯', '-', 0, 'a:4:{s:8:"seotitle";s:0:"";s:11:"seokeywords";s:8:"热点资讯";s:14:"seodescription";s:8:"热点资讯";s:9:"adminmenu";s:66:"新闻管理=news.php\r\n新闻类别=channel.php\r\n新闻评论=news_comment.php";}', '2.0', 1278232105, 'steven', '网站新闻插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.'),
(4, 'goods', 0, '商品', 'goods', 0, 'a:7:{s:8:"seotitle";s:0:"";s:11:"seokeywords";s:8:"网上商城";s:14:"seodescription";s:8:"网上商城";s:9:"adminmenu";s:78:"商品分类=goods_category.php\r\n商品管理=goods_list.php\r\n订单管理=goods_order.php";s:5:"quhuo";s:555:"1.普通快递送货上门 \r\n  覆盖全国800多个城市，运费5元/包裹\r\n2.加急快递送货上门 \r\n  支持北京、天津、上海、广州、深圳、廊坊，限当地发货订单，运费10元/包裹 \r\n3.圆通快递 \r\n  北京地区：运费10元/单 \r\n4.普通邮递 \r\n  大陆地区：运费5元/包裹，购物满29元免运费 \r\n  港澳地区：运费为商品原价总金额的30%，最低20元 \r\n  海外地区：运费为商品原价总金额的50%，最低50元 \r\n5.邮政特快专递(EMS) \r\n  北京地区：运费为订单总金额的20%，最低16元 \r\n  大陆其它地区：运费为订单总金额的40%，最低20元 \r\n  港澳台地区：运费为订单总金额的50%，最低45元 \r\n6.自提 \r\n  支持用户上门自提，免收运费。";s:6:"fukuan";s:150:"当面付款\r\n店内交易、送货上门、预约交易均可当面付款\r\n\r\n银行转账\r\n可通银行转账方式将款汇款到指定账号中\r\n\r\n网上汇款\r\n可通网上转账方式将款汇款到指定账号中";s:7:"service";s:1240:"售后服务参考条文：\r\n1、如果您购买的是数码类、手机及配件、笔记本、台式机、家电类商品，为了保证您能充分享有生产厂家提供的售后保修服务，不管您是否需要开具发票，我们都将随单为您开具，发票内容默认为您订购的商品全称，同时不支持修改发票内容。如果因为所开具的发票内容和所购商品名称不符，导致无法保修，本站概不负责。\r\n \r\n2、退货时提供发票原件，超1000元现金支付的订单办理退货将不退现金。\r\n \r\n3、数码类、手机及配件、笔记本、台式机、家电、打印机、扫描仪、一体机、车载GPS类商品，如果商品出现质量问题，请您自行到生产厂家售后服务中心进行检测，并开据检测报告（对于有些生产厂家售后服务中心无法提供检测报告的，需提供维修检验单据），如果检测报告确认属于质量问题，然后将检测报告、问题商品及完整包装附件，一并返回我司办理退换货手续。如有破损或丢失，我们将无法为您办理。\r\n \r\n4、对于钻石、黄金、手表、珠宝首饰及个人配饰类产品，如果附带国家级宝玉石鉴定中心出具的鉴定证书的、非质量问题不予以退换货。客户在收到商品之日起（以发票日期为准）3个月内，如果出现质量问题，请自行到当地的质量监督部门-珠宝玉石质量检验中心进行检测，如果检测报告确认属于质量问题，请与本站售后服务部联系办理退换货事宜。退换货时，请您务必将检测报告、商品的外包装、内带附件、鉴定证书、说明书等随同商品一起退回。如有包装破损或缺失，扣除该商品5%的折价费；如有附件破损或缺失扣除该商品10-15%的折价费。";}', '1.0', 1309753960, 'steven', '商品插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.');

-- --------------------------------------------------------

--
-- 表的结构 `my_shoucang`
--

CREATE TABLE IF NOT EXISTS `my_shoucang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `infoid` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `intime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_shoucang`
--

INSERT INTO `my_shoucang` (`id`, `infoid`, `title`, `url`, `userid`, `intime`) VALUES
(1, 1, '芜湖高富帅平头哥', '/information.php?id=1', 'sj_153922297566', 1539223908),
(2, 5, '诚聘美工一枚', '/information.php?id=5', 'sj_153922297566', 1539227972),
(3, 8, '芜湖大白网络诚邀您的加入！', '/information.php?id=8', '18815539872', 1539245173);

-- --------------------------------------------------------

--
-- 表的结构 `my_sms_sendlist`
--

CREATE TABLE IF NOT EXISTS `my_sms_sendlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `sendtime` int(10) NOT NULL,
  `sms_service` char(30) NOT NULL,
  `sms_content` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_telephone`
--

CREATE TABLE IF NOT EXISTS `my_telephone` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `telname` varchar(50) NOT NULL,
  `telnumber` varchar(50) NOT NULL,
  `color` char(10) NOT NULL,
  `if_bold` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` smallint(5) NOT NULL,
  `if_view` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `my_template`
--

CREATE TABLE IF NOT EXISTS `my_template` (
  `filepath` varchar(250) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `my_upload`
--

CREATE TABLE IF NOT EXISTS `my_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `width` varchar(10) NOT NULL DEFAULT '',
  `height` varchar(10) NOT NULL DEFAULT '',
  `playtime` varchar(10) NOT NULL DEFAULT '',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `newsid` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `adminid` int(11) NOT NULL DEFAULT '0',
  `memberid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `memberid` (`memberid`,`filesize`,`newsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `my_upload`
--

INSERT INTO `my_upload` (`id`, `title`, `url`, `width`, `height`, `playtime`, `filesize`, `newsid`, `uptime`, `adminid`, `memberid`) VALUES
(1, '/', '/attachment/editor/201810/1539241645poaxq.jpg', '790', '613', '', 70434, 0, 0, 2147483647, 0),
(2, '/', '/attachment/editor/201810/15392417988qx2b.jpg', '790', '725', '', 58799, 0, 0, 2147483647, 0),
(3, '/', '/attachment/editor/201810/1539241817sqtze.jpg', '790', '668', '', 39540, 0, 0, 2147483647, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

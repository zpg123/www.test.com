DROP TABLE IF EXISTS `my_about`;
CREATE TABLE IF NOT EXISTS `my_about` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `typename` char(25) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` smallint(3) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `dir_type` tinyint(1) NOT NULL,
  `dir_typename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_about` (`id`, `typename`, `content`, `displayorder`, `pubdate`, `dir_type`, `dir_typename`) VALUES
(1, '网站简介', '<p>\r\n	mymps（蚂蚁分类信息/地方门户系统）是一款基于php mysql的建站系统.为在各种服务器上架设分类信息以及地方门户网站提供完美的解决方案。 mymps,整站生成静态，拥有世界一流的用户体验，卓越的访问速度和负载能力。\r\n</p>\r\n<p>\r\n	mymps(php分类信息系统/php地方门户系统)能让你在最短的时间架设一个专业的分类信息/地方门户网站，是一款专注分类信息领域的CMS内容管理系统，能以最低的成本，最少的人力投入，在最短的时间内架设一个功能齐全，性能优异规模庞大并且易于维护的网站平台。\r\n</p>\r\n<p>\r\n	客户指导技术、技术服从于客户需要 <br />\r\n	做客户切身需要的网站系统是我们所倡导和坚持的一贯原则 <br />\r\n	我们在系统开发上遵循人性化设计、实用、创新、力求完美\r\n</p>', 1, 0, 2, 'wangzhanjianjie'),
(2, '广告服务', '在这里填写广告服务，填写完成后保存提交即可', 2, 1263483208, 4, 'advertisement'),
(3, '联系我们', '在这里填写联系方式，填写完成后保存提交即可', 3, 1259399384, 4, 'contactus');


DROP TABLE IF EXISTS `my_admin`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_admin_record_action`;
CREATE TABLE IF NOT EXISTS `my_admin_record_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` char(30) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;


DROP TABLE IF EXISTS `my_admin_record_login`;
CREATE TABLE IF NOT EXISTS `my_admin_record_login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminid` char(32) NOT NULL,
  `adminpwd` char(30) NOT NULL,
  `pubdate` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `result` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;


DROP TABLE IF EXISTS `my_admin_type`;
CREATE TABLE IF NOT EXISTS `my_admin_type` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL,
  `ifsystem` tinyint(1) NOT NULL,
  `purviews` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_admin_type` (`id`, `typename`, `ifsystem`, `purviews`) VALUES
(1, '超级管理员', 1, 'purview_幻灯片列表,purview_上传幻灯片,purview_栏目设置,purview_已发布公告,purview_发布公告,purview_问题帮助,purview_发布帮助主题,purview_友情链接,purview_增加链接,purview_链接导航,purview_生活百宝箱,purview_便民电话,purview_分类信息,purview_删除重复,purview_批量管理,purview_信息评论,purview_信息举报,purview_模型管理,purview_字段管理,purview_网站会员,purview_审核会员,purview_增加会员,purview_会员组,purview_实名认证,purview_会员文档,purview_站内短消息,purview_模板点评,purview_会员登录记录,purview_会员支付记录,purview_会员消费记录,purview_信息分类,purview_添加分类,purview_地区分类,purview_增加地区,purview_商家分类,purview_增加分类,purview_用户列表,purview_用户组,purview_管理记录,purview_数据库备份,purview_数据库还原,purview_数据库维护,purview_系统配置,purview_模板管理,purview_SEO伪静态,purview_验证过滤点评,purview_积分信用等级,purview_缓存设置,purview_系统优化,purview_文字内链设置,purview_附件管理,purview_手机访问设置,purview_已安装插件,purview_新闻管理,purview_新闻类别,purview_新闻评论,purview_商品分类,purview_商品管理,purview_订单管理,purview_邮件服务器,purview_邮件模板,purview_邮件发送记录,purview_短信接口,purview_短信发送记录,purview_管理支付接口,purview_管理广告位,purview_数据调用,purview_第三方账号整合');


DROP TABLE IF EXISTS `my_advertisement`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_announce`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_area`;
CREATE TABLE IF NOT EXISTS `my_area` (
  `areaid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(32) NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `areaorder` smallint(6) NOT NULL,
  PRIMARY KEY (`areaid`)
) TYPE=MyISAM;

INSERT INTO `my_area` (`areaid`, `areaname`, `parentid`, `areaorder`) VALUES
(1, '地区1', 0, 1);

DROP TABLE IF EXISTS `my_badwords`;
CREATE TABLE IF NOT EXISTS `my_badwords` (
  `words` mediumtext NOT NULL,
  `view` varchar(100) NOT NULL,
  `ifcheck` tinyint(1) NOT NULL
) TYPE=MyISAM;


INSERT INTO `my_badwords` (`words`, `view`, `ifcheck`) VALUES
('轮功', '**', 1);


DROP TABLE IF EXISTS `my_cache`;
CREATE TABLE IF NOT EXISTS `my_cache` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `page` varchar(20) NOT NULL,
  `time` int(10) NOT NULL,
  `open` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;


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


DROP TABLE IF EXISTS `my_category`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_certification`;
CREATE TABLE IF NOT EXISTS `my_certification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `img_path` varchar(250) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_channel`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_checkanswer`;
CREATE TABLE IF NOT EXISTS `my_checkanswer` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_checkanswer` (`id`, `question`, `answer`) VALUES
(1, '2+3=?', '5'),
(2, '本站名称[答案:蚂蚁分类信息]', '蚂蚁分类信息'),
(6, '5+8=?', '13'),
(5, '2+5=?', '7');

DROP TABLE IF EXISTS `my_comment`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_config`;
CREATE TABLE IF NOT EXISTS `my_config` (
  `description` varchar(100) NOT NULL,
  `value` mediumtext NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'config',
  KEY `type` (`type`),
  KEY `description` (`description`)
) TYPE=MyISAM;

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
('SiteUrl', '', 'config'),
('SiteName', '大白网络', 'config'),
('cfg_nonmember_perday_post', '', 'config'),
('mapapi', '', 'config'),
('mapflag', '', 'config'),
('mapapi_charset', '', 'config'),
('mapview_level', '14', 'config'),
('cfg_mappoint', '', 'config'),
('head_style', 'new', 'config');

DROP TABLE IF EXISTS `my_corp`;
CREATE TABLE IF NOT EXISTS `my_corp` (
  `corpid` mediumint(6) NOT NULL AUTO_INCREMENT,
  `corpname` varchar(32) NOT NULL,
  `parentid` int(11) unsigned NOT NULL,
  `corporder` smallint(6) NOT NULL,
  PRIMARY KEY (`corpid`),
  KEY `areaname` (`corpname`),
  KEY `parentid` (`parentid`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_coupon`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_coupon_category`;
CREATE TABLE IF NOT EXISTS `my_coupon_category` (
  `cate_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `cate_view` tinyint(1) NOT NULL DEFAULT '1',
  `cate_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_crons`;
CREATE TABLE IF NOT EXISTS `my_crons` (
  `cronid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cronid`),
  KEY `nextrun` (`nextrun`)
) TYPE=MyISAM;

INSERT INTO `my_crons` (`cronid`, `name`, `lastrun`, `nextrun`, `day`) VALUES
(1, 'information', 1471622409, 1471708800, 1),
(16, 'advertisement', 1471622409, 1471708800, 1),
(17, 'levelup', 1471622409, 1471708800, 1);

DROP TABLE IF EXISTS `my_faq`;
CREATE TABLE IF NOT EXISTS `my_faq` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(5) NOT NULL,
  `title` char(100) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

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

DROP TABLE IF EXISTS `my_faq_type`;
CREATE TABLE IF NOT EXISTS `my_faq_type` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `typename` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_faq_type` (`id`, `typename`) VALUES
(1, '置顶与刷新'),
(2, '信息发布与删除'),
(4, '认证服务'),
(5, '用户注册与登录'),
(6, '防骗常识');

DROP TABLE IF EXISTS `my_flink`;
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
) TYPE=MyISAM;

INSERT INTO `my_flink` (`id`, `ifindex`, `catid`, `url`, `webname`, `weblogo`, `dayip`, `pr`, `msg`, `name`, `qq`, `email`, `typeid`, `ischeck`, `ordernumber`, `createtime`) VALUES
(1, 2, 0, 'http://www.mymps.com.cn', '蚂蚁分类信息系统', '', '1000以下', 0, '合作伙伴', '村长', '3388888888', 'mymps@qq.com', 1, 2, 2, 1267535588);

DROP TABLE IF EXISTS `my_flink_type`;
CREATE TABLE IF NOT EXISTS `my_flink_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_flink_type` (`id`, `typename`) VALUES
(1, '门户网站'),
(2, '分类信息'),
(4, '论坛博客'),
(8, '其它类别');

DROP TABLE IF EXISTS `my_focus`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_goods`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_goods_category`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_goods_order`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_group`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_group_category`;
CREATE TABLE IF NOT EXISTS `my_group_category` (
  `cate_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `cate_view` tinyint(1) NOT NULL DEFAULT '1',
  `cate_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_group_signin`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_information`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_info_img`;
CREATE TABLE IF NOT EXISTS `my_info_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image_id` tinyint(1) NOT NULL,
  `path` varchar(250) NOT NULL,
  `prepath` varchar(250) NOT NULL,
  `infoid` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `infoid` (`infoid`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_info_report`;
CREATE TABLE IF NOT EXISTS `my_info_report` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `infoid` int(8) NOT NULL,
  `infotitle` char(50) NOT NULL,
  `report_type` smallint(3) NOT NULL,
  `content` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `pubtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_info_typemodels`;
CREATE TABLE IF NOT EXISTS `my_info_typemodels` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `displayorder` int(8) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `options` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_info_typeoptions`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_insidelink`;
CREATE TABLE IF NOT EXISTS `my_insidelink` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `word` char(16) NOT NULL,
  `url` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_jswizard`;
CREATE TABLE IF NOT EXISTS `my_jswizard` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `flag` varchar(50) NOT NULL,
  `parameter` mediumtext NOT NULL,
  `edittime` int(10) NOT NULL,
  `customtype` char(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flag` (`flag`)
) TYPE=MyISAM;

INSERT INTO `my_jswizard` (`id`, `flag`, `parameter`, `edittime`, `customtype`) VALUES
(5, '5umb', 'a:8:{s:10:"jstemplate";s:25:"<li>{title} - {link}</li>";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:3:"ids";s:0:"";s:7:"keyword";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441594018, 'info'),
(2, 'asdqwe', 'a:7:{s:10:"jstemplate";s:22:"<li>{title}{link}</li>";s:5:"catid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441596141, 'news'),
(3, '329e', 'a:8:{s:10:"jstemplate";s:22:"<li>{tname}{link}</li>";s:5:"catid";s:0:"";s:7:"levelid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441595310, 'store'),
(4, '4nmv', 'a:8:{s:10:"jstemplate";s:26:"<li>{goodsname}{link}</li>";s:5:"catid";s:0:"";s:5:"items";s:0:"";s:9:"maxlength";s:0:"";s:7:"special";a:1:{i:0;s:0:"";}s:9:"newwindow";s:1:"0";s:7:"orderby";s:8:"dateline";s:9:"jscharset";s:1:"0";}', 1441595242, 'goods');

DROP TABLE IF EXISTS `my_lifebox`;
CREATE TABLE IF NOT EXISTS `my_lifebox` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL DEFAULT '2',
  `lifename` varchar(50) NOT NULL,
  `lifeurl` varchar(200) NOT NULL,
  `if_view` tinyint(1) NOT NULL,
  `displayorder` smallint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `displayorder` (`displayorder`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_mail_sendlist`;
CREATE TABLE IF NOT EXISTS `my_mail_sendlist` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `template_id` varchar(50) NOT NULL,
  `email_content` mediumtext NOT NULL,
  `error` tinyint(1) NOT NULL DEFAULT '0',
  `email_subject` varchar(200) NOT NULL,
  `last_send` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_mail_template`;
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
) TYPE=MyISAM;

INSERT INTO `my_mail_template` (`template_id`, `is_sys`, `template_code`, `is_html`, `template_subject`, `template_content`, `last_modify`, `last_send`) VALUES
(1, 1, 'findpwd', 1, '找回密码邮件', '亲爱的用户 {$user_name} 您好！\r\n\r\n您已经进行了密码重置的操作，请点击以下链接（如无法打开请把此链接复制粘贴到浏览器打开）:\r\n\r\n{$reset_email}\r\n\r\n以确认您的新密码重置操作！此邮件为系统发出，请勿回复邮件。\r\n\r\n{$site_name}\r\n{$send_date}', 1407235479, 0),
(2, 1, 'validate', 1, '新用户邮件验证', '{$user_name}您好！\r\n\r\n这封邮件是 {$site_name} 发送的。你收到这封邮件是为了验证你注册邮件地址是否有效。如果您已经通过验证了，请忽略这封邮件。\r\n\r\n请点击以下链接(或者复制到您的浏览器)来验证你的邮件地址:\r\n{$validate_email}\r\n\r\n{$site_name}\r\n{$send_date}', 1429947607, 0);

DROP TABLE IF EXISTS `my_member`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_album`;
CREATE TABLE IF NOT EXISTS `my_member_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `path` varchar(250) NOT NULL,
  `prepath` varchar(250) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_category`;
CREATE TABLE IF NOT EXISTS `my_member_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `catid` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `catid` (`catid`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_comment`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_docu`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_docutype`;
CREATE TABLE IF NOT EXISTS `my_member_docutype` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) NOT NULL,
  `arrid` tinyint(1) NOT NULL DEFAULT '1',
  `ifview` tinyint(1) NOT NULL DEFAULT '1',
  `displayorder` int(5) NOT NULL,
  PRIMARY KEY (`typeid`)
) TYPE=MyISAM;

INSERT INTO `my_member_docutype` (`typeid`, `typename`, `arrid`, `ifview`, `displayorder`) VALUES
(1, '商家资讯', 1, 2, 1),
(2, '优惠促销', 2, 2, 2);

DROP TABLE IF EXISTS `my_member_level`;
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
) TYPE=MyISAM;

INSERT INTO `my_member_level` (`id`, `levelname`, `ifsystem`, `purviews`, `money_own`, `perday_maxpost`, `allow_tpl`, `member_contact`, `signin_notice`, `signin_del`, `signin_view`, `moneysettings`) VALUES
(1, '新手上路', 1, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_banner', 5, 5, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'N;'),
(2, '普通会员', 1, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_goods,purview_banner', 0, 100, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'a:2:{s:6:"ifopen";a:3:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"1";s:7:"forever";s:1:"1";}s:5:"money";a:4:{s:5:"month";s:5:"20000";s:8:"halfyear";s:6:"300000";s:4:"year";s:7:"1000000";s:7:"forever";s:7:"2000000";}}'),
(3, '黄金会员', 0, 'purview_info,purview_pay,purview_avatar,purview_shoucang,purview_base,purview_certify,purview_pm,purview_levelup,purview_password,purview_shop,purview_comment,purview_album,purview_document,purview_coupon,purview_group,purview_goods,purview_banner', 0, 100, 'blue,orange,green,purple,pink', 1, 0, 0, 0, 'a:2:{s:6:"ifopen";a:4:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"1";s:4:"year";s:1:"1";s:7:"forever";s:1:"1";}s:5:"money";a:4:{s:5:"month";s:1:"1";s:8:"halfyear";s:1:"2";s:4:"year";s:1:"3";s:7:"forever";s:1:"4";}}');

DROP TABLE IF EXISTS `my_member_pm`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_record_login`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_record_use`;
CREATE TABLE IF NOT EXISTS `my_member_record_use` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` char(50) NOT NULL,
  `paycost` char(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `pubtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `pubtime` (`pubtime`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_member_tpl`;
CREATE TABLE IF NOT EXISTS `my_member_tpl` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `if_view` tinyint(1) NOT NULL DEFAULT '2',
  `tpl_name` varchar(250) NOT NULL,
  `tpl_path` varchar(250) NOT NULL,
  `displayorder` int(5) NOT NULL,
  `edittime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_member_tpl` (`id`, `if_view`, `tpl_name`, `tpl_path`, `displayorder`, `edittime`) VALUES
(1, 2, '蓝色主题', 'blue', 1, 1273410326),
(2, 2, '橙红主题', 'orange', 2, 1273410338),
(4, 2, '绿色主题', 'green', 4, 1273410646),
(6, 2, '紫色主题', 'purple', 6, 1466692165),
(7, 2, '粉色主题', 'pink', 7, 1466692175);

DROP TABLE IF EXISTS `my_member_wx`;
CREATE TABLE IF NOT EXISTS `my_member_wx` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `actionkey` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `userpwd` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_mobile_gg`;
CREATE TABLE IF NOT EXISTS `my_mobile_gg` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `words` varchar(50) NOT NULL,
  `pubdate` int(11) NOT NULL,
  `displayorder` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

INSERT INTO `my_mobile_gg` (`id`, `typeid`, `image`, `url`, `words`, `pubdate`, `displayorder`) VALUES
(1, 1, '/attachment/mobile_gg/1469676806dzt6z.jpg', 'index.php', '天猫超市', 1469676806, 1),
(2, 2, '/attachment/mobile_gg/14696777801tuyl.jpg', 'index.php', '疯狂猜车', 1469677780, 2),
(3, 1, '/attachment/mobile_gg/1469677858x6r1c.png', 'index.php', '海量物品免费获取', 1469677858, 3),
(4, 2, '/attachment/mobile_gg/1469677887yuini.png', 'index.php', '7天退换', 1469677887, 4);

DROP TABLE IF EXISTS `my_mobile_nav`;
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
) TYPE=MyISAM;

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

DROP TABLE IF EXISTS `my_navurl`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_news`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_payapi`;
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
) TYPE=MyISAM;

INSERT INTO `my_payapi` (`payid`, `paytype`, `buytype`, `myorder`, `payfee`, `payuser`, `partner`, `paykey`, `appid`, `appkey`, `paylogo`, `paysay`, `payname`, `isclose`, `payemail`) VALUES
(1, 'tenpay', 0, 0, '0', '', '', '', '', '', '', '财付通（www.tenpay.com） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付。', '财付通', 0, ''),
(2, 'chinabank', 1, 1, '0', '', '', '', '', '', '', '网银在线与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。（网址：http://www.chinabank.com.cn）', '网银在线', 0, ''),
(3, 'alipay', 1, 0, '', '', '', '', '', '', '', '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。', '支付宝接口', 0, ''),
(4, 'alipay_h5', 0, 0, '', '', '', '', '', '', '', '    支付宝手机网站支付    ', '支付宝手机接口', 0, ''),
(5, 'wxpay', 0, 0, '', '', '', '', '', '', '', '    微信端手机支付    ', '微信支付', 0, '');


DROP TABLE IF EXISTS `my_payrecord`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_plugin`;
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
) TYPE=MyISAM;

INSERT INTO `my_plugin` (`id`, `flag`, `iscore`, `name`, `directory`, `disable`, `config`, `version`, `releasetime`, `author`, `introduce`, `siteurl`, `email`, `copyright`) VALUES
(1, 'coupon', 0, '优惠券', 'coupon', 1, 'a:4:{s:8:"seotitle";s:10:"优惠券标题";s:11:"seokeywords";s:12:"优惠券关键词";s:14:"seodescription";s:10:"优惠券描述";s:9:"adminmenu";s:60:"优惠券分类=coupon_category.php\r\n已上传优惠券=coupon_list.php";}', '1.0', 1278232105, 'steven', '商铺优惠券插件', 'http://www.mymps.com.cn', 'business@live.it', 'Mymps Dev.'),
(13, 'group', 0, '团购', 'group', 0, 'a:4:{s:8:"seotitle";s:12:"团购活动标题";s:11:"seokeywords";s:14:"团购活动关键词";s:14:"seodescription";s:12:"团购活动描述";s:9:"adminmenu";s:81:"团购分类=group_category.php\r\n已发起团购=group_list.php\r\n报名管理=group_signin.php";}', '1.0', 1278232105, 'steven', '团购活动插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.'),
(3, 'news', 0, '资讯', '-', 0, 'a:4:{s:8:"seotitle";s:0:"";s:11:"seokeywords";s:8:"热点资讯";s:14:"seodescription";s:8:"热点资讯";s:9:"adminmenu";s:66:"新闻管理=news.php\r\n新闻类别=channel.php\r\n新闻评论=news_comment.php";}', '2.0', 1278232105, 'steven', '网站新闻插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.'),
(4, 'goods', 0, '商品', 'goods', 0, 'a:7:{s:8:"seotitle";s:0:"";s:11:"seokeywords";s:8:"网上商城";s:14:"seodescription";s:8:"网上商城";s:9:"adminmenu";s:78:"商品分类=goods_category.php\r\n商品管理=goods_list.php\r\n订单管理=goods_order.php";s:5:"quhuo";s:555:"1.普通快递送货上门 \r\n  覆盖全国800多个城市，运费5元/包裹\r\n2.加急快递送货上门 \r\n  支持北京、天津、上海、广州、深圳、廊坊，限当地发货订单，运费10元/包裹 \r\n3.圆通快递 \r\n  北京地区：运费10元/单 \r\n4.普通邮递 \r\n  大陆地区：运费5元/包裹，购物满29元免运费 \r\n  港澳地区：运费为商品原价总金额的30%，最低20元 \r\n  海外地区：运费为商品原价总金额的50%，最低50元 \r\n5.邮政特快专递(EMS) \r\n  北京地区：运费为订单总金额的20%，最低16元 \r\n  大陆其它地区：运费为订单总金额的40%，最低20元 \r\n  港澳台地区：运费为订单总金额的50%，最低45元 \r\n6.自提 \r\n  支持用户上门自提，免收运费。";s:6:"fukuan";s:150:"当面付款\r\n店内交易、送货上门、预约交易均可当面付款\r\n\r\n银行转账\r\n可通银行转账方式将款汇款到指定账号中\r\n\r\n网上汇款\r\n可通网上转账方式将款汇款到指定账号中";s:7:"service";s:1240:"售后服务参考条文：\r\n1、如果您购买的是数码类、手机及配件、笔记本、台式机、家电类商品，为了保证您能充分享有生产厂家提供的售后保修服务，不管您是否需要开具发票，我们都将随单为您开具，发票内容默认为您订购的商品全称，同时不支持修改发票内容。如果因为所开具的发票内容和所购商品名称不符，导致无法保修，本站概不负责。\r\n \r\n2、退货时提供发票原件，超1000元现金支付的订单办理退货将不退现金。\r\n \r\n3、数码类、手机及配件、笔记本、台式机、家电、打印机、扫描仪、一体机、车载GPS类商品，如果商品出现质量问题，请您自行到生产厂家售后服务中心进行检测，并开据检测报告（对于有些生产厂家售后服务中心无法提供检测报告的，需提供维修检验单据），如果检测报告确认属于质量问题，然后将检测报告、问题商品及完整包装附件，一并返回我司办理退换货手续。如有破损或丢失，我们将无法为您办理。\r\n \r\n4、对于钻石、黄金、手表、珠宝首饰及个人配饰类产品，如果附带国家级宝玉石鉴定中心出具的鉴定证书的、非质量问题不予以退换货。客户在收到商品之日起（以发票日期为准）3个月内，如果出现质量问题，请自行到当地的质量监督部门-珠宝玉石质量检验中心进行检测，如果检测报告确认属于质量问题，请与本站售后服务部联系办理退换货事宜。退换货时，请您务必将检测报告、商品的外包装、内带附件、鉴定证书、说明书等随同商品一起退回。如有包装破损或缺失，扣除该商品5%的折价费；如有附件破损或缺失扣除该商品10-15%的折价费。";}', '1.0', 1309753960, 'steven', '商品插件', 'http://www.mymps.com.cn', 'business@live.it', 'MyDev.');

DROP TABLE IF EXISTS `my_shoucang`;
CREATE TABLE IF NOT EXISTS `my_shoucang` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `infoid` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `intime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_sms_sendlist`;
CREATE TABLE IF NOT EXISTS `my_sms_sendlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `sendtime` int(10) NOT NULL,
  `sms_service` char(30) NOT NULL,
  `sms_content` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_telephone`;
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
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_template`;
CREATE TABLE IF NOT EXISTS `my_template` (
  `filepath` varchar(250) NOT NULL,
  `content` longtext NOT NULL
) TYPE=MyISAM;

DROP TABLE IF EXISTS `my_upload`;
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
) TYPE=MyISAM;
<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/aboutus.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
<title><?=$page_title?></title>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?> full"><script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<div class="header">
<div class="inner">
<div class="logo"><a href="<?=$mymps_global['SiteUrl']?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>"></a></div>
<div class="nav">
<a href="<?=$mymps_global['SiteUrl']?><?=$about['aboutus_uri']?>" <? if($part == 'aboutus') { ?>class="current"<?php } ?>>关于我们</a>
<a href="<?=$mymps_global['SiteUrl']?><?=$about['announce_uri']?>" <? if($part == 'announce') { ?>class="current"<?php } ?>>网站公告</a>
<a href="<?=$mymps_global['SiteUrl']?><?=$about['faq_uri']?>" <? if($part == 'faq') { ?>class="current"<?php } ?>>帮助中心</a>
<a href="<?=$mymps_global['SiteUrl']?><?=$about['friendlink_uri']?>" <? if($part == 'friendlink') { ?>class="current"<?php } ?>>友情链接</a>
<a href="<?=$mymps_global['SiteUrl']?><?=$about['sitemap_uri']?>" <? if($part == 'sitemap') { ?>class="current"<?php } ?>>网站地图</a>
</div>
</div>
</div><div class="clear"></div>
<div class="faq">
    <?php $i=1; ?>        <?php if(is_array($faq_type)){foreach($faq_type as $mymps) { ?><dl class="qlist cfix">
<dt><i class="b-<?=$i?>"></i><?=$mymps['typename']?></dt>
<dd class="cfix">
        <?php if(is_array($mymps['faq'])){foreach($mymps['faq'] as $w) { ?>        <a class="<? if($w['id'] == $faq['id']) { ?>current<?php } ?>" href="<?=$mymps_global['SiteUrl']?><?=$w['uri']?>" title="<?=$w['title']?>"><? echo cutstr($w['title'],20); ?></a>
        <?php }} ?>
</dd>
</dl><?php $i++; ?>        <?php }} ?>
<div class="clear"></div>
<div class="faqcontent">
<h1><?=$faq['title']?></h1>
<p>
<?=$faq['content']?>
</p>
</div>
</div>
<div class="clear"></div><div class="footer">	&copy; <?=$mymps_global['SiteName']?> <a href="http://www.vwshijie.com" target="_blank"><?=$mymps_global['SiteBeian']?></a> <?=$mymps_global['SiteStat']?> <span class="none_<?=$mymps_mymps['debuginfo']?>"><? if($cachetime) { ?>This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } ?></span><span class="my_mps"><strong><a href="<?=MPS_WWW?>" target="_blank"><?=MPS_SOFTNAME?></a></strong> <em><a href="<?=MPS_BBS?>" target="_blank"><?=MPS_VERSION?></a></em></span></div></body>
</html>
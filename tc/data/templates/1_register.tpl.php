<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$page_title?></title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/login.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>"><div class="mheader">
<div class="mhead">
<div class="logo"><a href="<?=$mymps_global['SiteUrl']?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>"/></a></div>
<div class="tit" >
<span>hi，欢迎来到<?=$mymps_global['SiteName']?>！<a href="<?=$mymps_global['cfg_postfile']?>" style="color:#ff6600">快速发信息&raquo;</a></span>
    </div>
</div>
</div><div class="clearfix"></div>
<div class="inner">
<div class="body">
<div class="registerpart">
<div class="step1">
<span class="cur">1. 选择注册类型</span>
<span>2. 填写注册信息</span>
<span>3. 登录会员中心</span>
</div>
            <a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=person&cityid=<?=$city['cityid']?>">
<div class="selecter">
<div class="ico"><span class="ico2"></span></div>
<div class="des">
<div class="tit">注册个人会员 ></div>
</div>
</div>
</a>
             <a class="selecter" href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>?mod=register&action=store&cityid=<?=$city['cityid']?>">
            <div>
<div class="ico"><span class="ico1"></span></div>
<div class="des">
<div class="tit">注册机构会员 ></div>
</div>
</div>
            </a>
</div>
</div>
    <div class="clear"></div>
    <center>已有账号？去<a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_member_logfile']?>" class="godl">登录</a></center>
<div class="clear"></div><div class="footer">	&copy; <?=$mymps_global['SiteName']?> <a href="http://www.vwshijie.com" target="_blank"><?=$mymps_global['SiteBeian']?></a> <?=$mymps_global['SiteStat']?> <span class="none_<?=$mymps_mymps['debuginfo']?>"><? if($cachetime) { ?>This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } ?></span><span class="my_mps"><strong><a href="<?=MPS_WWW?>" target="_blank"><?=MPS_SOFTNAME?></a></strong> <em><a href="<?=MPS_BBS?>" target="_blank"><?=MPS_VERSION?></a></em></span></div></div>

</body>
</html>
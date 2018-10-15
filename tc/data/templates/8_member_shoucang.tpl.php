<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>我的收藏 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/member.css">
    <script>window['current'] = '我的收藏';</script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
<div class="dl_nav">
<span>
<a href="index.php">首页</a>&gt;<a href="index.php?mod=member">会员中心</a>&gt;<a href="index.php?mod=shoucang">我的收藏</a>
</span>
</div>

<div class="ucenter">
<ul class="u_infolst">
        <?php if(is_array($list)){foreach($list as $mymps) { ?><li><a href="<?=$mymps['url']?>"><h2><?=$mymps['title']?></h2><div class="attr"><span><?=$mymps['catname']?></span><span class="time"><?=$mymps['intime']?></span></div></a></li>
            <?php }} else {{ ?>
            <div style="margin:30px 0;text-align:center">您还没有收藏信息哦~</div>
            <?php }} ?>
</ul>	  
</div>

</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
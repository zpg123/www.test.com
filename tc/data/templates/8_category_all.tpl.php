<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>所有分类 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/all.css">
    <script>window['current'] = '信息分类';</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">

<div class="wrapper">
<?php include mymps_tpl('header_search'); ?><?php if(is_array($cat_list)){foreach($cat_list as $mymps) { ?><div class="navv">
<div class="nav_tt nav_ttbg1">
<? if($mymps['icon']) { ?><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['icon']?>" align="center" valign="middle" class="icon">&nbsp;<?php } ?> 
<a href="index.php?mod=category&catid=<?=$mymps['catid']?>"><?=$mymps['catname']?></a>
<span class="apost"><a href="index.php?mod=post&catid=<?=$mymps['catid']?>">发信息<i class="filt-arrowright"></i></a></span>
</div>
<div class="big_dl sale">
<ul>
    <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $c) { ?><li class="one_third"><a href="index.php?mod=category&catid=<?=$c['catid']?>"><? echo cutstr($c['catname'],8); ?></a></li>
<?php }} ?>
</ul>
</div>
</div>
<?php }} ?>
</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
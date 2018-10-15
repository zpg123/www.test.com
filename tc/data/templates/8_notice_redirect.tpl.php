<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>系统提示 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<script src="template/js/jq_min.211.js"></script>
<script src="template/js/common.js"></script>
</head>

<body>
<script>MympsWindowMsg('',1,'<?=$redirectmsg?>','<?=$url?>');</script>
</body>
</html>
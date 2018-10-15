<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>我的文章 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/member.css">
    <script>window['current'] = '我的商品';</script>
    
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
<div class="dl_nav">
<span>
<a href="index.php">首页</a>&gt;<a href="index.php?mod=member">会员中心</a>&gt;<a href="index.php?mod=member&action=goods">我的商品</a>
</span>
</div>

<div class="my_docu">
    <ul>
    <?php if(is_array($list)){foreach($list as $mymps) { ?>        <li id="info<?=$mymps['id']?>">
        	<div class="img"><img src="<?=$mymps['pre_picture']?>"></div>
            <h3><a href="index.php?mod=goods&id=<?=$mymps['goodsid']?>"><? echo cutstr($mymps['goodsname'],40); ?></a></h3>
            <dl class="cfix">
             <dt style="color:#f30">价格：&yen;<?=$mymps['nowprice']?></dt>
             <dd><del>原价：&yen;<?=$mymps['oldprice']?></del></dd>
            </dl>
        </li>
        <?php }} ?>
    </ul>
</div>
    
<? if($list) { ?>
<div class="pager" style="border-top:none; border-bottom:1px #ddd solid;">
    <?=$pageview?>
</div>
<?php } ?>
</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
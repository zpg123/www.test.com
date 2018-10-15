<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><?=$goods['goodsname']?> - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
    <link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/goods.css">
    <script>window['current'] = '商品展示';</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
    
<?php include mymps_tpl('header_search'); ?>
    <div class="clearfix"></div>
    <div class="b_main" id="b_main">
 	<div class="pro_info">
     <div class="show_pic">
      <img src="<?=$goods['picture']?>" style="width:100%" alt="<?=$goods['goodsname']?>" />
     </div>
    <div class="sp_info"> 
     <h2><?=$goods['goodsname']?></h2>
     <span class="price">&yen;<strong><?=$goods['nowprice']?></strong><del>&yen;<?=$goods['oldprice']?></del></span>
     <span class="fav_0"></span>
     <span class="k_buy"><a href="index.php?mod=store&id=<?=$goods['uid']?>">进入店铺</a></span>
    </div>
     <div class="e_condit">
     <dl>
      <dt>供货机构</dt>
      <dd><a href="index.php?mod=store&id=<?=$goods['uid']?>"><? echo cutstr($goods['tname'],16); ?></a></dd>
     </dl>
     <dl>
      <dt>人气</dt>
      <dd><?=$goods['hit']?></dd>
     </dl>                                                         
    </div>
    </div>
    <!--详情-->
    <div class="sp_detail">
     <div class="title"><span>商品详情</span></div>
     <div class="con" id="resizeIMG" style="padding:10px;">
        <?=$goods['content']?>
    </div>
    </div>

</div>
<?php include mymps_tpl('footer'); ?>
</body>
<script>(function($){IDC.resizeIMG(document.getElementById('resizeIMG'),300,480)})(jQuery);</script>
</html>
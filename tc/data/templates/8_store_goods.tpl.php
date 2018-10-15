<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>商品展示 - 商家店铺 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/store.css">
    <link type="text/css" rel="stylesheet" href="template/css/goods.css">
    <script>window['current'] = '<?=$navi[$action]?>';</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
    
<?php include mymps_tpl('store_header'); ?>
    <div class="clearfix"></div>
    
    <div class="mbox userintro">
    <p class="mbox_t" pagetitle="商品展示"> <a href="javascript:void(0)"> <b>商品展示</b> </a> </p>
    <div class="intro">
    	 <div class="commodity_list">
         
          <ul>
          <?php if(is_array($list)){foreach($list as $k => $mymps) { ?>           <li>
            <a href="index.php?mod=goods&id=<?=$mymps['goodsid']?>"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['pre_picture']?>" onerror="this.src='template/images/nopic.gif';this.onerror='';" alt="<?=$mymps['goodsname']?>" />
            <h3><?=$mymps['goodsname']?></h3>
            <div class="price">&yen;<strong><?=$mymps['nowprice']?></strong><del>&yen;<?=$mymps['oldprice']?></del></div>
            <sup class="cx<?=$cuxiao?>"></sup>
            <sup class="tj<?=$istop?>"></sup>
            </a>
           </li>
           <?php }} ?>
          </ul>
          
         </div>
    </div>
    
    <? if($list) { ?>
<div class="pager">
    <?=$pageview?>
</div>
<?php } ?>
    
    </div>
</div>
<?php include mymps_tpl('footer'); ?>
<script>(function(){window['myScroll2'].scrollTo(-130,0);})(jQuery);</script>
</body>
</html>
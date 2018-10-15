<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品展示-<?=$store['tname']?>-<?=$mymps_global['SiteName']?></title> 
<link href="<?=$mymps_global['SiteUrl']?>/template/spaces/store/css/<?=$store['template']?>.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php include mymps_tpl('header'); ?>
<div class="content">
<?php include mymps_tpl('sider'); ?>
<div class="cright">
<div class="box shop_infomain"> 
        	<div class="tit"><span>商品展示</span></div> 
            <div class="bd"><?php if(is_array($goods)){foreach($goods as $mymps) { ?><li><a href="<?=$mymps['uri']?>" title="<?=$mymps['goodsname']?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['picture']?>" width="120" height="93" /></a><span><a href="<?=$mymps['uri']?>" title="<?=$mymps['goodsname']?>" target="_blank"><?=$mymps['goodsname']?></a></span><em>&yen;<?=$mymps['nowprice']?></em></li>
<?php }} else {{ ?>
<li>暂无商品！</li>
<?php }} ?>
            </div>
            <div class="clear"></div>
            <div class="pagination" style="margin-left:15px!important;"><?=$pageview?></div>
</div>
</div>
</div>
<div class="clear15"></div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
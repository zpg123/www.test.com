<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><? if($cat['catname']) { ?><?=$cat['catname']?> - <?php } ?>商品展示 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
    <link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/goods.css">
    <link type="text/css" rel="stylesheet" href="template/css/filter.css">
    <script>window['current'] = '商品展示';</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
    
<?php include mymps_tpl('header_search'); ?>
    <div class="clearfix"></div>
    <div class="b_main" id="b_main">
 	<div class="filter2" id="filter2">
<ul class="tab cfix">
<li class="item"><a href="javascript:void(0);"><span id="str_b_node"><? echo $cat['catname'] ? $cat['catname'] : '全部分类'; ?></span><em></em></a></li>
<li class="item"><a href="javascript:void(0);"><span id="str_e_node"><? echo $orderby ? $orderbyarr[$orderby] : '默认排序'; ?></span><em></em></a></li>
</ul>
    
    
<div class="inner" style="display:none;" id="list_nav_2016">
<ul>
        	<li><a href="index.php?mod=goods">全部类别</a></li>
        <?php if(is_array($goods_cat)){foreach($goods_cat as $fcat) { ?>            <li class="item" id="cat_<?=$fcat['catid']?>">
            	<a href="javascript:void(0);" class="rights" onclick="showHide(this,'items<?=$fcat['catid']?>');" <? if($cat['parentid'] == $fcat['catid']) { ?>class='selected'<?php } ?>><? echo cutstr($fcat['catname'],20); ?></a>
                <ul id="items<?=$fcat['catid']?>">
                    <li><a href='index.php?mod=goods&catid=<?=$fcat['catid']?>' data-id='<?=$fcat['catid']?>'  id='s_b_<?=$fcat['catid']?>' <? if(!$cat['parentid']) { ?>class='selected'<?php } ?>>全部分类</a></li>
                    <?php if(is_array($fcat['children'])){foreach($fcat['children'] as $scat) { ?>                    <li><a href='index.php?mod=goods&catid=<?=$scat['catid']?>' data-id='<?=$scat['catid']?>'  id='s_b_<?=$scat['catid']?>' <? if($catid == $scat['catid']) { ?>class='selected'<?php } ?>><?=$scat['catname']?></a></li>
                    <?php }} ?>
                </ul>
            </li>
            <?php }} ?>
        </ul>
</div>
    
<div class="inner" style="display:none;">
<ul>
<li <? if(!$orderby) { ?>class="cur"<?php } ?>><a href="index.php?mod=goods&catid=<?=$catid?>">全部商品</a></li>
<li <? if($orderby=='xinpin') { ?>class="cur"<?php } ?>><a href="index.php?mod=goods&catid=<?=$catid?>&orderby=xinpin">新品</a></li>
<li <? if($orderby=='cuxiao') { ?>class="cur"<?php } ?>><a href="index.php?mod=goods&catid=<?=$catid?>&orderby=cuxiao">促销</a></li>
<li <? if($orderby=='tuijian') { ?>class="cur"<?php } ?>><a href="index.php?mod=goods&catid=<?=$catid?>&orderby=tuijian">推荐</a></li>
</ul>
</div>
    
<div class="inner_parent" id="parent_container" style="display:none;"><div class="innercontent"></div></div>
<div class="inner_child" id="inner_container" style="display:none;"><div class="innercontent"></div></div>
</div>
<div class="fullbg" id="fullbg" style="display:none;"><i class="pull2"></i></div>
 <div class="commodity_list">
 
  <ul>
  <?php if(is_array($list)){foreach($list as $k => $mymps) { ?>   <li>
<a href="index.php?mod=goods&id=<?=$mymps['goodsid']?>"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['pre_picture']?>" onerror="this.src='template/images/nopic.gif';this.onerror='';" alt="<?=$mymps['goodsname']?>" />
<h3><?=$mymps['goodsname']?></h3>
<div class="price">&yen;<strong><?=$mymps['nowprice']?></strong><del>&yen;<?=$mymps['oldprice']?></del></div>
    <sup class="cx<?=$mymps['cuxiao']?>">促</sup>
    <sup class="tj<?=$mymps['tuijian']?>">荐</sup>
    </a>
   </li>
   <?php }} ?>
  </ul>
  
 </div>

    <? if($list) { ?>
<div class="pager">
    <?=$pageview?>
</div>
<?php } ?>
</div>
</div>
<?php include mymps_tpl('footer'); ?>
</body>
<script src="template/js/iscroll.js"></script>
<script>document.addEventListener('DOMContentLoaded',function(){$('#cat_<?=$cat['parentid']?>').addClass('cur');$('#cat_<?=$catid?>').addClass('cur');$('#s_b_<?=$catid?>').parent().addClass('cur');showFilter({ibox:'filter2',content1:'parent_container',content2:'inner_container',fullbg:'fullbg'})},false);</script>
</html>
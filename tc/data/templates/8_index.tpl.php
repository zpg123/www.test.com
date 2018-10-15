<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<meta name="keywords" content="<?=$mymps_global['SiteName']?>"/>
<meta name="description" content="<?=$mymps_global['SiteName']?>手机版"/>
<title><?=$mymps_global['SiteName']?>-手机版</title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/index.css">
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
    
<?php include mymps_tpl('header_search'); ?>
    
<?php include mymps_tpl('navigation'); ?>
    <div class="clear"></div>
    <?php $focus = get_mobile_gg(1); ?>    <? if($focus) { ?>
    <section>
    <div id="slide" style="display:none;">
        <div id="content">
            <?php if(is_array($focus)){foreach($focus as $mymps) { ?>            <div class="cell">
            <a href="<?=$mymps['url']?>"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['image']?>" alt="<?=$mymps['words']?>"></a>
            </div>
            <?php }} ?>
            </div>
                                   
        <ul id="indicator"></ul>
    </div>
    
    <span class="prev" id="slide_prev" style="display:none">上一张</span><span class="next" id="slide_next" style="display:none">下一张</span>
    </section>
    <div class="clear"></div>
    <?php } ?>
        
           <div class="mod_02" id="myPicsrc">
                <div class="bd tab-cont">
                    <ul class="list_normal list_news">
                        <?php if(is_array($news)){foreach($news as $mymps) { ?>                        <li class="img">
                            <a href="<?=$mymps['uri']?>" class="link">
                          <p class="img"><img src="<?=$mymps['imgpath']?>" onerror="this.src='<?=$mymps_global['SiteUrl']?>/images/nophoto.jpg'" /></p>
                            <p class="tit"<? if($mymps['iscommend'] ==1) { ?>style="color:red"<?php } ?>><?=$mymps['title']?></p>
                            <p class="txt"><? echo cutstr($mymps['title'],20); ?></p>
                            <p class="hot po_ab"><? echo GetTime($mymps['begintime'],'m-d'); ?></p>
                            </a>
                        </li>
                        <?php }} ?>
                    </ul>
                </div>
                
            </div>
    <script src="template/js/slider.js"></script>
<script>(function($){var list=$('#content').find('.cell');if(list.length>0){var txt='';$('#content').find('.cell').each(function(i){if(i===0){txt+='<li class="active">1</li>'}else{txt+='<li>'+(i+1)+'</li>'}});$('#indicator').html(txt);var w_w=$(window).width();setTimeout(function(){new C_Scroll({container:'slide',content:'content',ct:'indicator',size:w_w,intervalTime:5000,lazyIMG:!!0})},20);setTimeout(function(){$('#slide').show()},20)}})(jQuery);</script>
    <div class="index-category">
        <div class="index_slider">
            <div class="index_slider-wrap">
                <div class="page">
                <?php $navigation = get_mobile_nav(2); ?>    <?php if(is_array($navigation)){foreach($navigation as $mymps) { ?>                <a href="<?=$mymps['url']?>" class="item food"><? if($mymps['ico']) { ?><div class="icon"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps['ico']?>"></div><?php } echo cutstr($mymps['title'],8); ?></a>
                <?php }} ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="tab_01" class="newsct">
        <div class="select_03 select_03_<?=$mymps_global['cfg_tpl_dir']?> tab-hd">
            <ul>
                <li class="item current current1"><a href="javascript:void(0);">首页置顶</a></li>
                <?php $ifnews = ifplugin('news'); ?>                <? if($ifnews) { ?><li class="item current2"><a href="javascript:void(0);">热门帖子</a></li><?php } else { ?><li class="item current2"><a href="javascript:void(0);">最新发布</a></li><?php } ?>
                <? if($mymps_global['cfg_if_corp'] == 1) { ?><li class="item current3"><a href="javascript:void(0);">推荐商家</a></li><?php } ?>
                
            </ul>
        </div>
        <div>
            <ul class="list_normal first_bold tab-cont">
            <?php $index_topinfo = mymps_get_infos(30,NULL,3,NULL,NULL,NULL,NULL,NULL,$city['cityid']); ?>            <?php if(is_array($index_topinfo)){foreach($index_topinfo as $k => $mymps) { ?>            <li style="<? if($mymps['ifbold'] == 1) { ?>font-weight:bold;<?php } if($mymps['ifred'] == 1) { ?>color:red;<?php } ?>">
            <a href="index.php?mod=category&catid=<?=$mymps['catid']?>" class="cat">[<?=$mymps['catname']?>]</a> 
            <a href="index.php?mod=information&id=<?=$mymps['id']?>"><? echo cutstr($mymps['title'],30); ?></a>
            <span class="jian"></span>
            </li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=category" class="comn-submit gray btn_block">进入分类信息频道</a></div>
            </ul>
            <? if($ifnews) { ?>
            <ul class="list_normal first_bold tab-cont" style="display:none;">
            <?php $news = mymps_get_news(6); ?>            <?php if(is_array($news)){foreach($news as $k => $mymps) { ?>            <li style="<? if($mymps['is_commend'] == 1) { ?>color:red;<?php } ?>">
            <font class="time">[<? echo GetTime($mymps['begintime'],'m-d'); ?>]</font> 
            <a href="index.php?mod=news&id=<?=$mymps['id']?>"><?=$mymps['title']?></a><span class="jian"></span>
            </li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=news" class="comn-submit gray btn_block">进入热门帖子频道</a></div>
            </ul>
            <?php } else { ?>
            <ul class="list_normal first_bold tab-cont" style="display:none;">
            <?php $newinfo = mymps_get_infos(6); ?>            <?php if(is_array($newinfo)){foreach($newinfo as $k => $mymps) { ?>            <li style="<? if($mymps['ifred'] == 1) { ?>color:red;<?php } if($mymps['ifbold'] == 1) { ?>font-weight:bold;<?php } ?>">
            <font class="time">[<? echo GetTime($mymps['begintime'],'m-d'); ?>]</font> 
            <a href="index.php?mod=information&id=<?=$mymps['id']?>"><?=$mymps['title']?></a><span class="jian"></span>
            </li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=category" class="comn-submit gray btn_block">进入分类信息频道</a></div>
            </ul>
            <?php } ?>
            <? if($mymps_global['cfg_if_corp'] == 1) { ?>
            <?php $members = mymps_get_members(!$cityid ? 6 : NULL,NULL,NULL,NULL,2,NULL,NULL,$cityid); ?>            <ul class="list_normal first_bold tab-cont" style="display:none;">
            <?php if(is_array($members)){foreach($members as $k => $mymps) { ?>            <li><img src="<?=$mymps['prelogo']?>" class="img"> <a href="index.php?mod=store&id=<?=$mymps['id']?>"><?=$mymps['tname']?></a><span class="jian"></span></li>
            <?php }} ?>
            <div class="inner_html"><a href="index.php?mod=corp" class="comn-submit gray btn_block">进入商家店铺频道</a></div>
            </ul>
            <?php } ?>
        </div>
        
    </div>
</div>
<?php include mymps_tpl('footer'); ?>
<script src="template/js/index.js"></script>
<script>(function($){var list=$('#content').find('.cell');if(list.length>0){var txt='';$('#content').find('.cell').each(function(i){if(i===0){txt+='<li class="active">1</li>'}else{txt+='<li>'+(i+1)+'</li>'}});$('#indicator').html(txt);var w_w=$(window).width();setTimeout(function(){new C_Scroll({container:'slide',content:'content',ct:'indicator',size:w_w,intervalTime:5000,lazyIMG:!!0})},20);setTimeout(function(){$('#slide').show()},20)}IDC.tabADS($('#tab_01'))})(jQuery);</script>
</body>
</html>
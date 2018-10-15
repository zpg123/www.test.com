<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><?=$cat['catname']?> - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
    <link type="text/css" rel="stylesheet" href="template/css/list.css">
    <link type="text/css" rel="stylesheet" href="template/css/filter.css">
    <script>window['current'] = '<?=$cat['catname']?>';</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">

    
<?php include mymps_tpl('header_search'); ?>
<div class="dl_nav" style="display:none">
<span><a href="index.php">首页</a><font class="raquo"></font><a href="index.php?mod=category">信息分类</a>
        <?php if(is_array($parentcats)){foreach($parentcats as $mymps) { ?>        <font class="raquo"></font><a href="index.php?mod=category&cityid=<?=$cityid?>&catid=<?=$mymps['catid']?>"><?=$mymps['catname']?></a>
        <?php }} ?>
        </span>
</div>

<div class="filter2" id="filter2">
    
        <ul class="tab cfix">
            <? if($cat_list) { ?><li class="item"><a href="javascript:void(0);"><span id="str_a_node">分类</span><em></em></a></li><?php } ?>
            <li class="item"><a href="javascript:void(0);"><span id="str_b_node">区域</span><em></em></a></li>
            <?php if(is_array($mymps_extra_model)){foreach($mymps_extra_model as $mymps) { ?>            <li class="item"><a href="javascript:void(0);"><span id="str_<?=$mymps['identifier']?>_node"><? echo cutstr($mymps['title'],8); ?></span><em></em></a></li>
            <?php }} ?>
        </ul>
        
        <div class="inner" style="display:none;">
            <?php if(is_array($cat_list)){foreach($cat_list as $k => $mymps) { ?>            <ul>
                <a class="<? echo $mymps['catid'] == $catid ? 'selected' : '';; ?>" href="index.php?mod=category&catid=<?=$mymps['catid']?>" class="t">不限</a></li>
                <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $u => $w) { ?>                <a class="<? echo $w['catid'] == $catid ? 'selected' : '';; ?>" href="index.php?mod=category&catid=<?=$w['catid']?>"><?=$w['catname']?></a>
                <?php }} ?>
            </ul>
            <?php }} ?> 
        </div>
        
        <div class="inner" style="display:none;">
            <ul>
                <a class="<? echo empty($areaid) ? 'selected' : '';; ?>" href="index.php?mod=category&catid=<?=$cat['catid']?>" class="t">不限</a></li>
                <?php if(is_array($area_list)){foreach($area_list as $k => $mymps) { ?>                <a class="<? echo $mymps['areaid'] == $areaid ? 'selected' : '';; ?>" href="index.php?mod=category&catid=<?=$catid?>&areaid=<?=$mymps['areaid']?>"><?=$mymps['areaname']?></a>
                <?php }} ?>
            </ul>
        </div>
        
        <?php if(is_array($mymps_extra_model)){foreach($mymps_extra_model as $mymps) { ?>        <div class="inner" style="display:none;">
            <ul>
            <?php if(is_array($mymps['list'])){foreach($mymps['list'] as $c) { ?>            <a class="<? echo $c['select'] == 1 ? 'selected' : '';; ?>" href="<?=$c['uri']?>"><?=$c['name']?></a>
            <?php }} ?>
            </ul>
        </div>
        <?php }} ?>
        <div class="inner_parent" id="parent_container" style="display:none;"><div class="innercontent"></div></div>
        <div class="inner_child" id="inner_container" style="display:none;"><div class="innercontent"></div></div>
    </div>
<div class="fullbg" id="fullbg" style="display:none;"><i class="pull2"></i></div>

    <? if(!$distance) { ?>
    <li class="nearbyinfo" onclick="nearby(0.5,'','')">
        <span style=" margin-right: 4px"><img src="template/images/icon_location.png" height="20" style="vertical-align:middle;"></span>
        <span id="nearby">查看附近的信息</span>
    </li>
    <?php } else { ?>
    <ul class="distance-filter" <? if(!$distance) { ?>style="display: none;"<?php } ?>>
        <li><a data-distance="500" <? if($distance == '0.5') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(0.5,'','')">500米</a></li>
        <li><a data-distance="1000" <? if($distance == '1') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(1,'','')">1000米</a></li>
        <li><a data-distance="3000" <? if($distance == '3') { ?>class="current"<?php } ?>href="javascript:" onclick="nearby(3,'','')">3000米</a></li>
        <li><a data-distance="5000" <? if($distance == '5') { ?>class="current"<?php } ?> href="javascript:" onclick="nearby(5,'','')">5000米</a></li>
    </ul>
    <?php } ?>
    <input type="hidden" id="distanceInput" value="">

<div class="infolst_w">
<ul class="list-info">
        <?php if(is_array($info_list)){foreach($info_list as $mymps) { ?>    		<li class="<? echo $mymps['upgrade_type'] > 1 ? 'dingbg' : '';; ?>">
                <a href="index.php?mod=information&id=<?=$mymps['id']?>">
                <? if($mymps['img_path']) { ?>
<img class="thumbnail" src="<?=$mymps_global['SiteUrl']?><?=$mymps['img_path']?>" alt="<?=$mymps['title']?></strong>">
<?php } else { ?>
<img class="thumbnail" src="template/images/noimg.gif" alt="nopic">
<?php } ?>
<dl>
<dt class="tit" style="<? echo $mymps['ifred'] == 1 ? 'color:red;' : ''; echo $mymps['ifbold'] == 1 ? 'font-weight:bold;' : ''; ?>"><?=$mymps['title']?>&nbsp;<? if($mymps['img_path']) { ?><span style="background:#339966; color:#FFFFFF; font-size:14px; padding:0 2px;text-align:center;"><?=$mymps['img_count']?>图</span><?php } echo $mymps['upgrade_type'] > 1 ? '<span class="ico ding"></span>' : '';; ?></dt>
<dd class="attr"><span><? echo cutstr(clear_html($mymps['content']),50); ?></span></dd>
<dd class="attr pr5">
                    <?php if(is_array($mymps['extra'])){foreach($mymps['extra'] as $w) { ?>                    <? if(strexists($w,'元')) { ?>
                    <span class="price">
                    <? echo substr($w,0,1) === '0' ? ' 面议 ' : $w; ?>                    </span>
                    <?php } ?>
                    <?php }} ?>
                    <span class="lvzi"><? echo get_format_time($mymps['begintime']); ?></span>
                    <span>阅<?=$mymps['hit']?></span>
</dd>
</dl>
                </a>
    		</li>
        <?php }} else {{ ?>
        <div style="padding:50px 0; text-align:center;color:#999; background-color:#ffffff;">没有找到<?=$cat['catname']?>相关信息记录！ <a href="javascript:history.back(-1);">返回</a></div>
<?php }} ?>
</ul>  
</div>

    <? if($info_list) { ?>
<div class="pager">
    <?=$pageview?>
</div>
<?php } ?>
</div>
<?php include mymps_tpl('footer'); ?>
<script src="template/js/iscroll.js"></script>
<script>
document.addEventListener('DOMContentLoaded',function(){
window['myScroll_parent'] = null;
window['myScroll_inner'] = null;
showFilter({ibox:'filter2',content1:'parent_container',content2:'inner_container',fullbg:'fullbg'});
},false);
</script>
</body>
</html>
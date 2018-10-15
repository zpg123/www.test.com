<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$page_title?></title>
<link rel="shortcut icon" href="<?=$mymps_global['SiteUrl']?>/favicon.ico" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/global.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/style.css" />
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/post.css" />
<script src="<?=$mymps_global['SiteUrl']?>/template/global/noerr.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/global.js" type="text/javascript"></script>
<script src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">var current_domain = '<?=$mymps_global['SiteUrl']?>';</script>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/jquery.autocomplete.min.js"></script> 
<link rel="stylesheet" href="<?=$mymps_global['SiteUrl']?>/template/default/css/jquery.autocomplete.css" />
<script type="text/javascript">
var cates = [<?php $i=1; ?><?php if(is_array($categories)){foreach($categories as $mymps) { if($i >1) { ?>,<?php } ?>
{ name1: "<?=$mymps['dir_typename']?>",name: "<?=$mymps['catid']?>", to: "<?=$mymps['catname']?>" }<?php if(is_array($mymps['children'])){foreach($mymps['children'] as $w) { ?>,
{ name1: "<?=$w['dir_typename']?>",name: "<?=$w['catid']?>", to: "<?=$w['catname']?>" }
<?php }} ?><?php $i++; ?><?php }} ?><?php $i=NULL;unset($i); ?>]; 
$(function() {
$('#catname').autocomplete(cates, { 
max: 20, 
minChars: 0, 
width: 316, 
scrollHeight: 100,
matchContains: true, 
autoFill: false,
formatItem: function(row, i, max) { 
return row.to; 
}, 
formatMatch: function(row, i, max) { 
return row.name1 + row.name + row.to; 
}, 
formatResult: function(row) { 
return row.to; 
} 
}); 
}); 
</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?> bodybg<?=$mymps_global['cfg_tpl_dir']?><?=$mymps_global['bodybg']?>"><div class="bartop">
<div class="barcenter">
<div class="barleft">
<ul class="barcity"><span><?=$mymps_global['SiteCity']?></span>[<a href="<?=$mymps_global['SiteUrl']?>">返回首页</a>]</ul> 
<ul class="line"><u></u></ul>
            <ul class="barcang"><a href="<?=$mymps_global['SiteUrl']?>/desktop.php" target="_blank" title="点击右键，选择“目标另存为”，将此快捷方式保存到桌面即可">保存到桌面</a></ul>
<ul class="line"><u></u></ul>
<ul class="barpost"><a href="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_postfile']?>">快速发布信息</a></ul>
<ul class="line"><u></u></ul>
<ul class="bardel"><a href="<?=$mymps_global['SiteUrl']?>/delinfo.php" rel="nofollow">修改/删除信息</a></ul>
<ul class="line"><u></u></ul>
<ul class="barwap"><a href="<?=$mymps_global['SiteUrl']?>/mobile.php">手机浏览</a></ul>
</div>
<div class="barright" id="iflogin"><img src="<?=$mymps_global['SiteUrl']?>/images/loading.gif" border="0" align="absmiddle"></div>
</div>
</div>
<div class="clearfix"></div>
<div class="mhead">
<div class="logo"><a href="<? echo $city['domain']?$city['domain']:$mymps_global['SiteUrl']; ?>" target="_blank"><img src="<?=$mymps_global['SiteUrl']?><?=$mymps_global['SiteLogo']?>" title="<?=$mymps_global['SiteName']?>"/></a></div>
<div class="font">
<span>
        <? if(CURSCRIPT == 'posthistory') { ?>发帖记录<?php } elseif(CURSCRIPT == 'space') { ?>用户中心<?php } elseif(CURSCRIPT == 'mobile') { ?>手机版<?php } elseif(CURSCRIPT == 'login') { ?>帐号升级<?php } elseif(CURSCRIPT == 'delinfo') { ?>修改/删除信息<?php } elseif(CURSCRIPT == 'changecity') { ?>切换分站<?php } else { ?>发布信息<?php } ?>
</span>
</div>
</div>
<div class="cleafix"></div><div class="body1000">
<div class="clear15"></div>
<div id="main" class="wrapper">
<div class="step1">
<span class="cur"><font class="number">1</font> 选择信息分类</span>
<span><font class="number">2</font> 填写信息内容</span>
<span><font class="number">3</font> 发布成功</span>
</div>
<div id="fenlei2">
            <div class="minheight" id="ymenu-side"> 
               <ul class="ym-mainmnu">
               <?php if(is_array($categories)){foreach($categories as $k => $mymps) { ?>                    <li class="ym-tab">
                        <a href="#" class="black"><?=$mymps['catname']?></a>
                        <ul class="ym-submnu">
                            <?php if(is_array($mymps['children'])){foreach($mymps['children'] as $u => $w) { ?>                            <li><a href="?action=input&catid=<?=$w['catid']?>"><?=$w['catname']?></a></li>
                            <?php }} ?>
                        </ul> 
                    </li>
                    <?php }} ?>
                </ul>
                <? if($catid > 0) { ?>
                <div class="clear"></div>
                <div class="backall"><a href="?action=input">&laquo;重新选择大类</a></div>
                <?php } ?>
            </div>
            <form action="?" method="get">
        	<div class="psearch">
                <div class="pshead"><em>搜索栏</em><input type="text" id="catname" name="catname" placeholder="请输入关键字查找您要发布的分类" class="pstxt" value=""><input type="button" value="帮我推荐类别" onclick="if(this.form.catname.value==''){this.form.catname.focus();alert('请输入类别名称！');return false;};this.form.submit()" class="psbtn" id="btn_cateSearch">
                </div>
       		</div>
            </form>
</div> 
        
</div>
<div class="clear"></div><div class="footer">	&copy; <?=$mymps_global['SiteName']?> <a href="http://www.vwshijie.com" target="_blank"><?=$mymps_global['SiteBeian']?></a> <?=$mymps_global['SiteStat']?> <span class="none_<?=$mymps_mymps['debuginfo']?>"><? if($cachetime) { ?>This page is cached at <? echo GetTime($timestamp,'Y-m-d H:i:s'); ?><?php } ?></span><span class="my_mps"><strong><a href="<?=MPS_WWW?>" target="_blank"><?=MPS_SOFTNAME?></a></strong> <em><a href="<?=MPS_BBS?>" target="_blank"><?=MPS_VERSION?></a></em></span></div></div>
</body>
</html>
<script type="text/javascript">loadDefault(['iflogin','post_select'])</script>
<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<? if($typeid) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$typename?>-<?=$store['tname']?>-<?=$mymps_global['SiteName']?></title> 
<link href="<?=$mymps_global['SiteUrl']?>/template/spaces/store/css/<?=$store['template']?>.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php include mymps_tpl('header'); ?>
<div class="content">
<?php include mymps_tpl('sider'); ?>
<div class="cright">
    	<div class="box"> 
<div class="tit"><span><?=$typename?></span></div> 
<div class="con cont_01 cfix"> 
<table class="mrw_list"> 
   <tr> 
   <th width="70%" class="list_left">标题</th> 
   <th align="left">发布时间</th>
                       <th align="left">浏览次数</th>
   </tr> 
                       <?php if(is_array($docu)){foreach($docu as $mymps) { ?>   <tr> 
   <td><a href="<?=$mymps['uri']?>"><?=$mymps['title']?></a></td> 
   <td align="left"><? echo GetTime($mymps['pubtime'],'Y-m-d'); ?></td> 
                       <td align="left"><?=$mymps['hit']?>次</td> 
   </tr>
                       <?php }} else {{ ?>
                       <tr> 
                       <td colspan="4">暂无相关记录！</td> 
                       </tr> 
                       <?php }} ?>
                       
   </table>
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
<?php } elseif($id) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$docu['title']?>-<?=$store['tname']?>-<?=$mymps_global['SiteName']?></title> 
<link href="<?=$mymps_global['SiteUrl']?>/template/spaces/store/css/<?=$store['template']?>.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php include mymps_tpl('header'); ?>
<div class="content">
<?php include mymps_tpl('sider'); ?>
<div class="cright">
<div class="box">
        <div class="tit"><span><?=$typename?></span></div>
<div class="con cont_01 cfix"> 
            <div class="kbNewsShow"> 
<h1><?=$docu['title']?></h1>
<div class="infoNews">发布者：<?=$docu['author']?> 发布时间：<? echo GetTime($docu['pubtime'],'Y-m-d'); ?> 来源：<?=$docu['source']?></div>
<div class="newsCont">
<? if($docu['imgpath']) { ?><div align=center style="margin:10px auto"><a href="<?=$docu['imgpath']?>" target="_blank"><img src="<?=$docu['pre_imgpath']?>" border="0" alt="点击查看大图"></a> </div><?php } ?>
<?=$docu['content']?>
</div>

</div>
</div>
</div>
    </div>
</div>
<div class="clear15"></div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
<?php } ?>
<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>会员中心 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/member_new.css">
    <script>window['current'] = '会员中心';</script>
    <script type="text/javascript">function qiandao(){var url='index.php?mod=member&action=qiandao';$.get(url,function(data){MympsWindowMsg('',0,data)})}</script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
 <div class="member_head">
  <div class="user_head"><a href="index.php?mod=member&action=upface"><img src="<? echo $row['prelogo'] ? $row['prelogo'] : 'template/images/center_ico.png'; ?>" width="96" height="96" alt="" /></a></div>
  <div class="clearfix"></div>
  <div class="userName"><?=$row['tname']?><? if($row['userid'] != $row['tname']) { ?><br>【<?=$row['userid']?>】<?php } ?></div>
   <div class="clearfix"></div>
  <a href="javascript:void(0);" onClick="qiandao();">签到</a> <a href="index.php?mod=member&action=editbase">完善资料</a> <a href="index.php?mod=member&action=editpwd">修改密码</a>
  <? if($row['if_corp']==1 && $mymps_global['cfg_if_corp'] == 1) { ?><a href="index.php?mod=store&id=<?=$row['id']?>">我的微店</a><?php } ?>
  
 </div>
 <div class="amount_info">
  <ul>
   <li>
     <p><?=$row['money_own']?></p>
      金币                                   
   </li>
   <li>
     <p><?=$row['score']?></p>
     积分
   </li>
   <li class="pay"><a href="index.php?mod=member&action=pay">我要充值</a></li>
  </ul>
 </div>
 <div class="memberNav">
  <ul>
   <li class="info"><a href="index.php?mod=member&action=mypost">我的信息<span class="count"><?=$total['info']?></span></a></li>
   <li class="fav"><a href="index.php?mod=member&action=shoucang">我的收藏<span class="count"><?=$total['shoucang']?></span></a></li>
  <!--新添加li标签-->
  <li class="info"><a href="index.php?mod=member&action=mypost">我的历史<span class="count"><?=$total['info']?></span></a></li>
  
   <? if($row['if_corp']==1 && $mymps_global['cfg_if_corp'] == 1) { ?>
   
   <li class="art"><a href="index.php?mod=member&action=docu">我的文章<span class="count"><?=$total['docu']?></span></a></li>
   <li class="goods"><a href="index.php?mod=member&action=goods">我的商品<span class="count"><?=$total['goods']?></span></a></li>
   <?php } ?>
  </ul>
 </div>
 <div class="member_exit"><a href="index.php?mod=login&action=logout" class="exit">安全退出</a></div>

</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title>发布信息 - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/post.css">
<script>
window['current'] = '<? echo $id ? "修改" : "发布"; ?>信息';
</script>
<script language="javascript">
function submitForm(){if(document.form1.title.value==""){alert('请填写信息标题!');document.form1.title.focus();return false}if($("#title").val()){if(!isNaN($("#title").val())){alert('请填写正确的信息标题!');$("#title").focus();return false}}var length=lenthString($("#title").val());if(length<6||length>80){alert('请填写至少3个汉字，至多40个汉字!');$("#title").focus();return false}if(document.form1.endtime.value==""){alert('请选择有效期!');document.form1.endtime.focus();return false}<?php if(is_array($show_mod_option)){foreach($show_mod_option as $mymps) { if($mymps['required']==1) { ?>if($("[name='extra[<?=$mymps['identifier']?>]']").val()==''){alert('<?=$mymps['title']?>不能为空!');$("[name='extra[<?=$mymps['identifier']?>]']").focus();return false}<?php } ?><?php }} ?>if(document.form1.contact_who.value==""){alert('请填写联系人!');document.form1.contact_who.focus();return false}if($("#contact_who").val()){if(!isNaN($("#contact_who").val())){alert('请填写正确的联系人!');document.form1.contact_who.focus();return false}}if(document.form1.tel.value==""){alert('请填写联系电话!');document.form1.tel.focus();return false}if($("#qq").val()){if(isNaN($("#qq").val())){alert('请填写正确的QQ号码!');document.form1.qq.focus();return false}}if(document.form1.content.value==""){alert('请填写信息内容!');document.form1.content.focus();return false}var lenth=lenthString($("#content").val());if(lenth<10){alert('请填写至少5个汉字!');$("#content").focus();return false}if(lenth>1000){alert('您的描述字数太多了，请精简内容描述!');$("#content").focus();return false}<? if($iflogin==0) { ?>if(document.form1.manage_pwd.value==""){alert('请填写管理密码!');document.form1.manage_pwd.focus();return false}<?php } if($info['imgcode']==1) { ?>if(document.form1.checkcode.value==""){alert('请填写验证码!');document.form1.checkcode.focus();return false;}<?php } ?>$("#loadingPostdiv").show();return true}function chk_authcode(){if($("#checkcode").val()){$.get('../javascript.php?part=chk_authcode&value='+$("#checkcode").val(),function(data){if(data!='success'){alert(data);$("#checkcode").focus();return false}})}}function loadingPost(){var _PageWidth=document.documentElement.clientWidth;var _LoadingLeft=_PageWidth>215?(_PageWidth-215)/2:0;var _LoadingHtml='<div id="loadingPostdiv" style="display:none;position:fixed;left:0;width:100%;height:100%;top:0;background:#e1e1e1;opacity:0.8;filter:alpha(opacity=80);z-index:10000;"><div style="position: absolute; cursor1: wait; left: '+_LoadingLeft+"px; top:40%; width: auto; height: 57px; line-height: 57px; padding-left: 40px; padding-right: 20px; background:#ffffff url(../images/loading.gif) no-repeat scroll 15px 20px; border: 5px solid #CCCCCC; border-radius:5px; color: #000;font-size:14px;\">数据提交中，请等待...</div></div>";document.write(_LoadingHtml)}loadingPost();
</script>
</head>
<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
    <form id="form1" method="post" enctype="multipart/form-data" action="index.php?mod=post" name="form1"  onSubmit="return submitForm();">
    <? if(empty($child)) { ?><input name="catid" type="hidden" value="<?=$catid?>"><?php } ?>
    <input name="id" type="hidden" value="<?=$id?>">
    <input name="action" type="hidden" value="post">
    <input type="hidden" value="<?=$mixcode?>" name="mixcode"/>
    <input type="hidden" id="lat" name="lat" value="">
    <input type="hidden" id="lng" name="lng" value="">
    <!--填写信息-->
 <div class="inp_Itembox">
  <dl class="cfix">
   <dt>类别</dt>
   <dd><?=$info['catname']?> <? if(!$id) { ?><a href="index.php?mod=post">(重选)</a><?php } ?></dd>
  </dl>
  <dl class="cfix">
   <dt>标题</dt>
   <dd><input name="title" id="title" type="text" size="26" value="<?=$info['title']?>" placeholder="输入标题，40字以内" /></dd>
  </dl>
  <dl class="cfix">
   <dt>区域</dt>
   <dd><select name='areaid' id='areaid' >
   <option value=''>请选择区域</option>
   <? echo cat_list('area','',$info['areaid']);; ?>   </select></dd>
   <div class="menu">
    <i></i>
    <i></i>
    <i></i>
   </div>
  </dl>
  <dl class="cfix">
   <dt>有效期</dt>
   <dd><? echo GetInfoLastTime($info['activetime'],'endtime','wap'); ?></dd>
   <div class="menu">
    <i></i>
    <i></i>
    <i></i>
   </div>
  </dl>
 </div>
 
 <div class="inp_Itembox">
 <?php if(is_array($show_mod_option)){foreach($show_mod_option as $mymps) { ?>  <dl class="cfix">
   <dt><?=$mymps['title']?></dt>
   <dd>
<?=$mymps['value']?>
    <? if(strstr($mymps['value'],'select')) { ?>
<div class="menu">
    <i></i>
    <i></i>
    <i></i>
   </div>
   <?php } ?>
   </dd>
  </dl>
  <?php }} ?>
 </div>

 <div class="inp_Itembox">
   <dl class="cfix">
   <dt>联系人</dt>
   <dd><input type="text" id="contact_who" placeholder="输入联系人" name="contact_who" value="<?=$info['contact_who']?>" /></dd>
  </dl>
  <dl class="cfix">
   <dt>手机</dt>
   <dd><input type="text" id="tel" placeholder="请输入手机号码" name="tel" value="<?=$info['tel']?>" /></dd>
  </dl>
  <dl class="cfix">
   <dt>QQ</dt>
   <dd><input type="text" id="qq" placeholder="请输入QQ号码" name="qq" value="<?=$info['qq']?>" /></dd>
  </dl>
 </div>
 
<? if($cat['if_upimg']==1) { ?>
<script type="text/javascript" src="<?=$mymps_global['SiteUrl']?>/template/default/js/a_ddimgview.js"></script>
<div class="inp_Itembox" style="overflow:auto; padding:10px 0 10px 10px"><? echo $id ? get_upload_image_edit($cat['if_upimg'],$id) : get_upload_image_view(1,'',2);; ?></div>
<?php } ?>
 
<div class="inp_Itembox">
<textarea class="txt" id="content" name="content" placeholder="输入描述文字，不能超过500字"><?=$info['content']?></textarea>
    <? if($iflogin == 0) { ?>
    <dl class="cfix">
        <dt>管理密码</dt>
        <dd><input name="manage_pwd" type="text" size="26" value="" placeholder="请牢记，用于修改/删除该信息"/></dd>
    </dl>
    <?php } ?>
</div>

 
<? if($info['imgcode'] == 1) { ?>
<div class="inp_Itembox">
<dl class="cfix">
    <dt>验证码</dt>
    <dd><input id="checkcode" name="checkcode" onBlur="chk_authcode()" placeholder="请输入下图验证码" type="text" size="26" /><img src="<?=$mymps_global['SiteUrl']?>/<?=$mymps_global['cfg_authcodefile']?>?mod=m" alt="看不清，请点击刷新" class="authcode" align="absmiddle" onClick="this.src=this.src+'?'"/></dd>
</dl>
</div>
<?php } ?>

<button type="submit" class="fb"><? echo $id ? "保存修改" : "提交发布"; ?></button>
</form>
</div>
<?php include mymps_tpl('footer'); ?>
  
<script>
if(navigator.geolocation){navigator.geolocation.getCurrentPosition(showPosition)}else{}function showPosition(position){document.getElementById("lat").value=position.coords.latitude;document.getElementById("lng").value=position.coords.longitude}
</script>
</body>
</html>
<? if(!defined('IN_MYMPS')) exit('Access Denied');
/*Mymps分类信息系统
官方网站：http://www.mymps.com.cn*/?>
<!DOCTYPE html>
<html lang="zh-CN" class="index_page">
<head>
<?php include mymps_tpl('header'); ?>
<title><? echo $type=='reg'?'填写机构资料':'完善资料'; ?> - <?=$mymps_global['SiteName']?></title>
<link type="text/css" rel="stylesheet" href="template/css/global.css">
<link type="text/css" rel="stylesheet" href="template/css/style.css">
<link type="text/css" rel="stylesheet" href="template/css/member_new.css">
    <script>window['current'] = '<? echo $type=="reg"?"填写机构资料":"完善资料"; ?>';</script>
    <script type="text/javascript">
    function chkSubmit() {
if($("#mobile").val()==''||$("#mobile").val().length!=11){$("#mobile").focus();alert('请输入11位正确的手机号码');return false}else{var myreg=/^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;if(!myreg.test($("#mobile").val())){$("#mobile").focus();alert('请输入正确的手机号码！');return false}}if($("#email").val()!=''){var reg=/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;if(!reg.test($("#email").val())){alert('请输入正确的电子邮箱地址！');$("#mobile").focus();return false}}
<? if($row['if_corp'] == 1) { ?>if($("#catid").val()==''){alert('请选择所属分类！');$("#catid").focus();return false}if($("#areaid").val()==''){alert('请选择所属地区！');$("#areaid").focus();return false}if($("#tname").val()==''){alert('请输入机构名称！');$("#tname").focus();return false}if($("#address").val()==''){alert('请输入联系地址！');$("#address").focus();return false}if($("#tel").val()==''){alert('请输入固话号码！');$("#tel").focus();return false}if($("#introduce").val()==''){alert('请输入机构简介！');$("#introduce").focus();return false}<?php } ?>
}
    </script>
</head>

<body class="<?=$mymps_global['cfg_tpl_dir']?>">
<div class="wrapper">
<?php include mymps_tpl('header_search'); ?>
<div class="dl_nav">
<span>
<a href="index.php">首页</a>&gt;<a href="index.php?mod=member">会员中心</a>&gt;<? echo $type=='reg'?'填写机构资料':'完善资料'; ?></span>
</div>

<form name="form1" method="post" action="index.php?mod=member&action=editbase&dopost=1" onSubmit="return chkSubmit();">
    <input name="per_certify" value="<?=$row['per_certify']?>" type="hidden">
    <div class="tabItem tab-cont" style="display:block;">
     <div class="inp_Itembox">
      <dl class="cfix">
       <dt><? echo $row['if_corp'] == 1 ? '机构' : '用户';; ?>头像</dt>
       <dd><img src="<? echo $row['prelogo'] ? $row['prelogo'] : 'template/images/center_ico.png'; ?>" id="Image1"  width="60" height="60" /> <a href="index.php?mod=member&action=upface" style="color:#36c; float:right;">修改</a></dd>
      </dl>
      <dl class="cfix">
       <dt>用户ID</dt>
       <dd><?=$row['id']?></dd>
      </dl>
      <dl class="cfix">
       <dt>用户名</dt>
       <dd><?=$row['userid']?></dd>
      </dl>
      <dl class="cfix">
       <dt>会员类型</dt>
       <dd> <? if(!$row['if_corp']) { ?>个人会员<a href="index.php?mod=member&action=upgradecorp" class="upjibie1" style="color:#36c; float:right;" onClick="return window.confirm('您确定申请升级成为机构会员吗？');">申请升级机构会员</a><?php } else { ?>机构会员<?php } ?></dd>
      </dl>
      <dl class="cfix">
       <dt>电子邮件</dt>
       <dd><input id="email" type="text" name="email" value="<?=$row['email']?>" placeholder="输入电子邮箱" /></dd>
      </dl>
      <dl class="cfix">
       <dt>联系QQ</dt>
       <dd><input id="qq" type="text" name="qq" value="<?=$row['qq']?>" placeholder="输入QQ号码" /></dd>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>手机号码</dt>
       <dd><? if($mymps_global['cfg_member_verify'] == 4) { ?><?=$row['mobile']?><input name="mobile" value="<?=$row['mobile']?>" type="hidden"><?php } else { ?><input id="mobile" type="text" name="mobile" value="<?=$row['mobile']?>" placeholder="输入手机号码" /><?php } ?></dd>
      </dl>
    </div>
    <? if($row['if_corp'] == 1) { ?>
    <input name="if_corp" value="1" type="hidden">
    <input name="type" value="reg" type="hidden">
    <input name="com_certify" value="<?=$row['com_certify']?>" type="hidden">
    <div class="inp_Itembox">
      <dl class="cfix">
       <dt><font color="red">*</font>所属行业</dt>
       <dd>
       <? echo get_member_cat(explode(',',$row['catid'])); ?>       </dd>
       <div class="menu">
        <i></i>
        <i></i>
        <i></i>
       </div>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>所属地区</dt>
       <dd>
       <select id="areaid" name="areaid">
       <option value="">请选择所属地区</option>
       <? echo cat_list('area',0,$row['areaid']); ?>       </select>
       </dd>
       <div class="menu">
        <i></i>
        <i></i>
        <i></i>
       </div>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>机构名称</dt>
       <dd><input id="tname" type="text" name="tname" value="<?=$row['tname']?>" placeholder="输入机构名称" /></dd>
      </dl>
       <dl class="cfix">
       <dt>联系人</dt>
       <dd><input id="cname" type="text" name="cname" value="<?=$row['cname']?>" placeholder="输入联系人" /></dd>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>联系地址</dt>
       <dd><input id="address" type="text" name="address" value="<?=$row['address']?>" placeholder="输入机构地址" /></dd>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>固定电话</dt>
       <dd><input id="tel" type="text" name="tel" value="<?=$row['tel']?>" placeholder="输入固话号码" /></dd>
      </dl>
      <dl class="cfix">
       <dt><font color="red">*</font>机构简介</dt>
       <dd><textarea id="introduce" name="introduce" class="qita" placeholder="输入机构简介" rows="6"><?=$row['introduce']?></textarea></dd>
      </dl>
     </div>
    <?php } ?>
    </div>
     <button type="submit" class="save"><? echo $type=='reg'?'填写完成，提交审核':'保存'; ?></button>
    </form>
</div>
<?php include mymps_tpl('footer'); ?>
</body>
</html>
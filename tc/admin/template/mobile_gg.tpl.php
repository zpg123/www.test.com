<?php include mymps_tpl('inc_head');?>
<script language='javascript'>
	function CheckSubmit()
  {
     if(document.form1.displayorder.value==""){
	     alert("幻灯片顺序不能为空！");
	     document.form1.displayorder.focus();
	     return false;
     }
     if(document.form1.words.value==""){
	     alert("图片说明不能为空！");
	     document.form1.words.focus();
	     return false;
     }
     if(document.form1.url.value==""){
	     alert("跳转网址不能为空！");
	     document.form1.url.focus();
	     return false;
     }
	 <? if(!$id){?>
     if(document.form1.mymps_focus.value==""){
	     alert("请上传图片！");
	     document.form1.mymps_focus.focus();
	     return false;
     }
	 <? }?>
     return true;
 }
</script>
<script type='text/javascript' src='js/vbm.js'></script>
<style>
.vtop{ background-color:#ffffff}
.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}
.altbg1{ background-color:#f1f5f8; width:45%;}
</style>
<div id="<?=MPS_SOFTNAME?>" style=" padding-bottom:0">
    <div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?">基本设置</a></li>
                <li><a href="?type=nav">文字导航设置</a></li>
                <li><a href="?type=nav_ico">图标导航设置(首页)</a></li>
                <li><a href="?type=gg" class="current">幻灯片广告设置</a></li>
            </ul>
        </div>
    </div>
</div>

<?php if(!$id){?>
<form method="post" action="?">
<input name="type" value="<?=$type?>" type="hidden">
<input name="return_url" value="<?php echo GetUrl();?>" type="hidden">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
    <td width="50"><input name="checkall" type="checkbox" class="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>
    <td align="center">显示位置</td>
    <td align="center">幻灯片路径</td>
    <td width="160" align="center">说明文字</td>
    <td align="center">添加时间</td>
    <td width="100" align="center">顺序</td>
    <td align="center">编辑</td>
  </tr>
<?php foreach($row AS $row){?>
    <tr align="center" bgcolor="white">
    <td><input type='checkbox' name='delids[]' value='<?=$row[id]?>' class="checkbox" id="<?=$row[id]?>"></td>
    <td><a href="?type=gg&typeid=<?=$row['typeid']?>"><?php echo $target[$row['typeid']]; ?></a></td>
    <td><a href='javascript:blocknone("pm_<?=$row[id]?>");'><?=$row[image]?></a></td>
    <td><?=$row[words]?></td>
    <td><em><?=GetTime($row[pubdate])?></em></td>
    <td><input name="displayorder[<?=$row[id]?>]" value="<?=$row[displayorder]?>" class="txt"/></td>
    <td>
      <a href='?type=gg&id=<?=$row[id]?>'>详情</a>
    </td>
  </tr>
  <tr style="background-color:white; display:none" id="pm_<?=$row[id]?>">
    <td>&nbsp;</td>
    <td colspan="6"><img src="<?=$row[image]?>" style="height:110px;"/></td>
    </tr>
    <? }?>
</table>
</div>
<center><input name="<?=CURSCRIPT?>_submit" type="submit" value="提 交" class="mymps large"/></center>
</form>
<div class="pagination"><?=page2()?></div>
<div class="clear"></div>
<?php }?>

<form method="post" id="form1" name="form1" action="?" enctype="multipart/form-data" onSubmit="return CheckSubmit();">
<input name="type" value="<?=$type?>" type="hidden">
<input name="id" value="<?=$id?>" type="hidden">
<div id="<?=MPS_SOFTNAME?>">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">
<tbody>
 <tr class="firstr">
    <td colspan="3"><?php echo $id?'更换':'上传';?>手机版幻灯片广告</td>
 </tr>
  <tr bgcolor="#FFFFFF">
    <td width="15%" align="right" valign="top">选择位置：</td>
    <td>
    <select name="typeid">
        <?php foreach($target as $k=>$v){?>
        <option value="<?=$k?>"<?php if($typeid == $k) echo ' selected ';?>><?=$v?></option>
        <?php }?>
    </select>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF" >
    <td width="15%" align="right" valign="top">图片顺序：</td>
    <td>
    <input name=displayorder type=text class="txt" value="<?=$edit['displayorder']?>"/>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF" >
    <td width="15%" align="right" valign="top">图片说明：</td>
    <td>
    <input name=words type=text class="text" value="<?=$edit['words']?>"/>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF" >
    <td width="15%" align="right" valign="top">跳转网址：</td>
    <td>
    <input name=url type=text class="text" value="<?=$edit['url']?>"/>
    </td>
  </tr>
  <?php if($edit['image']){?>
  <input name="image" value="<?=$edit['image']?>" type="hidden">
  <tr bgcolor="#FFFFFF" >
    <td width="15%" align="right" valign="top">原图片：</td>
    <td>
    <img src="<?=$edit['image']?>" width="640" height="110">
    </td>
  </tr>
  <?php }?>
  <tr bgcolor="#FFFFFF" >
    <td align="right" valign="top">选择上传的图片：</td>
    <td><input type="file" name="mymps_focus" size="45" id="litpic"><br /><br />
      支持上传的类型：<?=$mymps_global[cfg_upimg_type]?><br />
手机版首页幻灯片尺寸：<?=$mymps_mymps[cfg_hdp_limit][width]?> * <?=$mymps_mymps[cfg_hdp_limit][height]?><br />
手机版新闻首页幻灯片尺寸：<?=$mymps_mymps[cfg_hdp_limit][width]?> * <?=$mymps_mymps[cfg_hdp_limit][height]?><br />
</td>
  </tr>
</tbody>
</table>
</div> 
<center><input class="mymps large" type="submit" value="上 传" name="focus_submit"> <input onClick="history.back(-1);" class="gray large" type="button" value="返 回"></center>
</form>
<?php mymps_admin_tpl_global_foot();?>
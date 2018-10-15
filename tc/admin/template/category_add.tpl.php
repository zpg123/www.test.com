<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.catname.value==""){' . "\r\n\t\t" . 'alert(\'请输入栏目标题！\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form.catname.value.length<2){' . "\r\n\t\t" . 'alert(\'栏目标题请控制在2个字节以上!\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function do_copy(){' . "\r\n" . '  ff = document.form1;' . "\r\n" . '  ff.title.value=document.getElementById("catname").value;' . "\r\n" . '  ff.keywords.value=document.getElementById("catname").value;' . "\r\n" . '}' . "\r\n\r\n" . 'function isUndefined(variable) {' . "\r\n\t" . 'return typeof variable == \'undefined\' ? true : false;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit(text) {' . "\r\n\t" . '$obj(\'jstemplate\').focus();' . "\r\n\t" . '$obj(\'jstemplate\').value=text;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit2(text) {' . "\r\n\t" . '$obj(\'jstemplate2\').focus();' . "\r\n\t" . '$obj(\'jstemplate2\').value=text;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>栏目不设置为启用时，仅作为一个分类方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=add">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'1\')">栏目基本信息</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_1">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">栏目名称： </td>' . "\r\n" . '  <td><textarea rows="20" name="catname" cols="20" style="float:left"></textarea>' . "\r\n" . '<div style="margin-top:3px; float:left; margin-left:10px;">支持行业分类批量添加，多个分类换行隔开 <br />' . "\r\n" . '<font color="red">范例：<br />行业1<br />行业2<br />行业3<br />行业4<br />行业5</font></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">隶属栏目： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根栏目...</option>' . "\r\n\t";
echo cat_list('category', 0, 0, true, 2);
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">栏目排序： </td>' . "\r\n" . '  <td><input name="catorder" type="text" id="catorder" value="';
echo $maxorder;
echo '" class="txt"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">所属模型： </td>' . "\r\n" . '  <td><select name="modid">';
echo info_typemodels();
echo '</select> [<a href="info_type.php?part=mod">模型管理</a>]</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">是否启用： </td>' . "\r\n" . '  <td><select name="isview">' . "\r\n" . '      ';
echo get_ifview_options();
echo '      </select></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">是否开启图片上传模块： </td>' . "\r\n" . '  <td>' . "\r\n" . '  <label for="1"><input class="radio" type="radio" value="1" name="if_upimg" checked="checked">开启</label> ' . "\r\n" . '  <label for="0"><input class="radio" type="radio" value="0" name="if_upimg">关闭</label></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">是否开启地图标注： </td>' . "\r\n" . '  <td>' . "\r\n" . '  <label for="1"><input class="radio" type="radio" value="1" name="if_mappoint">开启</label> ' . "\r\n" . '  <label for="0"><input class="radio" type="radio" value="0" name="if_mappoint" checked="checked">关闭</label></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">目录存放形式：<br /><i style="color:#666">生成静态目录时生效</i> </td>' . "\r\n" . '  <td>';
echo GetHtmlType('2', 'dir_type', 'add');
echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="3">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'3\')">栏目应用模板</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'3\')"><img id="menuimg_3" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_3">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8" width="15%">栏目列表使用模板： </td>' . "\r\n" . '  <td width="300">' . "\r\n" . '  /template/default/ <input name="template" class="text" style="width:100px;" id="jstemplate" value="list"> .html <br />' . "\r\n" . '  </td>' . "\r\n" . '  <td>';

foreach ($category_tpl as $k => $v ) {
	echo '   <a href="###" title="点击使用';
	echo $v;
	echo '" onclick="insertunit(\'';
	echo $k;
	echo '\')" class="temp">';
	echo $v;
	echo '<br />（';
	echo $k;
	echo '）</a>' . "\r\n" . '   ';

	if ($k == 'category') {
		echo '<div class=clear></div>';
	}

	echo '  ' . "\t" . ' ';
}

echo "\t" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">栏目信息详细页使用模板：</td>' . "\r\n" . '  <td>/template/default/ <input name="template_info" class="text" style="width:100px;" id="jstemplate2" value="info"> .html </td>' . "\r\n" . '  <td>' . "\r\n" . '  ';

foreach ($information_tpl as $k => $v ) {
	echo '   <a href="###" title="点击使用';
	echo $v;
	echo '" onclick="insertunit2(\'';
	echo $k;
	echo '\')" class="temp ';

	if ($cat['template_info'] == $k) {
		echo 'curtemp';
	}

	echo '">';
	echo $v;
	echo '<br />（';
	echo $k;
	echo '）</a>' . "\r\n" . '  ';
}

echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="3">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'4\')">栏目信息联系方式查看权限</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'4\')"><img id="menuimg_4" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_4">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8" width="15%">查看隶属该栏目下的信息联系方式扣除金币数量</td>' . "\r\n" . '  <td>' . "\r\n" . '  <input name="usecoin" class="txt" id="usecoin" value="0"> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <font color="red">请填写整数！</font> <font style="color:#777; margin-left:10px;"><br>填写<font color="red">0</font>时，表示联系方式完全公开<br>填写<font color="red">-1</font>时，表示联系方式只对登录的会员公开<br>填写<font color="red">大于0的整数</font>时，表示查看联系方式需扣除会员的相应金币</font>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="确认提交" name="';
echo CURSCRIPT;
echo '_submit" class="mymps large" />　' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="gray large">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

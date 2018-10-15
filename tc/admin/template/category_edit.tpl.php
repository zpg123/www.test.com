<?php

include mymps_tpl('inc_head_jq');
echo '<script type="text/javascript" src="../include/colorpicker/jquery.colorpicker.js"></script>' . "\r\n" . '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.catname.value==""){' . "\r\n\t\t" . 'alert(\'请输入栏目标题！\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.cat.value==""){' . "\r\n\t\t" . 'alert(\'请选择栏目！\');' . "\r\n\t\t" . 'document.form1.cat.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function do_copy(){' . "\r\n" . '  ff = document.form1;' . "\r\n" . '  ff.title.value=document.getElementById("catname").value;' . "\r\n" . '  ff.keywords.value=document.getElementById("catname").value;' . "\r\n" . '}' . "\r\n\r\n" . 'function isUndefined(variable) {' . "\r\n\t" . 'return typeof variable == \'undefined\' ? true : false;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit(text) {' . "\r\n\t" . '$obj(\'jstemplate\').focus();' . "\r\n\t" . '$obj(\'jstemplate\').value=text;' . "\r\n" . '}' . "\r\n\r\n" . 'function insertunit2(text) {' . "\r\n\t" . '$obj(\'jstemplate2\').focus();' . "\r\n\t" . '$obj(\'jstemplate2\').value=text;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>栏目不设置为启用时，仅作为一个分类方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=edit">' . "\r\n" . '<input name="catid" value="';
echo $cat[catid];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'1\')">栏目基本信息</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_1">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">栏目名称： </td>' . "\r\n" . '  <td><input name="catname" type="text" class="text" id="catname" value="';
echo $cat[catname];
echo '" size="30"> ' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '<td bgcolor="#F1F5F8">标题(背景)颜色：</td>' . "\r\n" . '<td><input id="cp1" name="fontcolor" class="text" style="width:60px" value="';
echo $cat[color];
echo '"></td>' . "\r\n" . '</tr>' . "\r\n" . '<script type="text/javascript">' . "\r\n" . ' $(function() {' . "\r\n" . '      ' . "\r\n" . '        $("#cp1").colorpicker({' . "\r\n" . '            fillcolor: true' . "\r\n" . '        });' . "\r\n" . '        ' . "\r\n" . '    });' . "\r\n" . '</script>' . "\r\n\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">隶属栏目： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    ';

if (!$cat[parentid]) {
	echo '<option value="0">作为根栏目...</option>';
}

echo "\t";
echo $cat[parentid] ? cat_list('category', 0, $cat[parentid], true, 2) : '';
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n";

if ($cat[parentid] == 0) {
	echo '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">栏目图标路径： <br />尺寸/30*30</td>' . "\r\n" . '  <td><input name="icon" type="text" class="text" id="icon" value="';
	echo $cat[icon];
	echo '"> ';

	if ($cat[icon] != '') {
		echo '<img src="';
		echo $cat[icon];
		echo '">';
	}

	echo ' &nbsp;&nbsp;&nbsp;&nbsp;格式如：/template/default/images/index/icon_fang.gif</td>' . "\r\n" . '</tr>' . "\r\n";
}

echo '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">栏目排序： </td>' . "\r\n" . '  <td><input name="catorder" type="text" class="txt" id="catorder" value="';
echo $cat[catorder];
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">所属模型： ';

if (!$cat['parentid']) {
	echo '<div style="margin-top:10px; color:#666"><label for="children_mod"><input name="children_mod" value="1" type="checkbox" class="checkbox" id="children_mod">同步应用到子栏目</label></div>';
}

echo '</td>' . "\r\n" . '  <td><select name="modid">';
echo info_typemodels($cat[modid]);
echo '</select> [<a href="info_type.php?part=mod">模型管理</a>]</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">是否启用： </td>' . "\r\n" . '  <td> <select name="isview">' . "\r\n" . '      ';
echo get_ifview_options($cat[if_view]);
echo '      </select></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">是否开启图片上传： ';

if (!$cat['parentid']) {
	echo '<div style="margin-top:10px; color:#666"><label for="children_upload"><input checked="checked" name="children_upload" value="1" type="checkbox" class="checkbox" id="children_upload">同步应用到子栏目</label></div>';
}

echo '</td>' . "\r\n" . '  <td>' . "\r\n" . '  <label for="up1"><input class="radio" type="radio" value="1" id="up1" name="if_upimg" ';

if ($cat[if_upimg] == '1') {
	echo 'checked="checked"';
}

echo '>开启</label> ' . "\r\n" . '  <label for="up0"><input class="radio" type="radio" value="0" id="up0" name="if_upimg" ';

if ($cat[if_upimg] == '0') {
	echo 'checked="checked"';
}

echo '>关闭</label></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">是否开启地图标注： ';

if (!$cat['parentid']) {
	echo '<div style="margin-top:10px; color:#666"><label for="children_map"><input checked="checked" name="children_map" value="1" type="checkbox" class="checkbox" id="children_map">同步应用到子栏目</label></div>';
}

echo '</td>' . "\r\n" . '  <td>' . "\r\n" . '  <label for="map1"><input class="radio" type="radio" value="1" id="map1" name="if_mappoint" ';

if ($cat[if_mappoint] == '1') {
	echo 'checked="checked"';
}

echo '>开启</label> ' . "\r\n" . '  <label for="map0"><input class="radio" type="radio" value="0" id="map0" name="if_mappoint" ';

if ($cat[if_mappoint] == '0') {
	echo 'checked="checked"';
}

echo '>关闭</label></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'2\')">SEO优化设置<font style="color:#FF6600; font-weight:100">(若与栏目名称相同，' . "\r\n" . '<label for="copy">' . "\r\n" . '点此<input name="radio" id="copy" class="radio" type="radio" onClick="do_copy();" />复制</label>' . "\r\n" . ')</font></a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'2\')"><img id="menuimg_2" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_2">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td width="15%" bgcolor="#F1F5F8">显示标题(title)： </td>' . "\r\n" . '  <td> <input name="title" type="text" id="title" class="text" value="';
echo $cat[title];
echo '" size="50"> <font color="red">*</font>(<font style="color:#FF6600">范例：二手车求购_二手车买卖</font>,不超过15个字符)' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">关键词(keyword)： </td>' . "\r\n" . '  <td><input name="keywords" type="text" id="keywords" class="text" value="';
echo $cat[keywords];
echo '" size="50">   (多个关键字以","隔开)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">相关说明： <div style="margin-top:10px; color:#666"><label for="children_des"><input name="children_des" value="1" type="checkbox" class="checkbox" id="children_des">同步应用到子栏目</label></div></td>' . "\r\n" . '  <td><textarea name="description" cols="49" rows="5" id="description">';
echo $cat[description];
echo '</textarea> (适当出现关键字，最好是完整的句子，不超过200字符)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">目录/拼音伪静态<br />【自定义名】：</td>' . "\r\n" . '  <td>';
echo GetHtmlType($cat[dir_type], 'dir_type', 'edit', $cat[dir_typename]);
echo ' <font style="color:#666">请填写字母（勿含数字，- ，_，空格以及其它符号）正确范例：<span>fang</span></font></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="3">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'3\')">栏目应用模板</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'3\')"><img id="menuimg_3" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_3">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8" width="15%">栏目列表页使用模板： <div style="margin-top:10px; color:#666"><label for="children_tpl"><input name="children_tpl" value="1" type="checkbox" class="checkbox" id="children_tpl">同步应用到子栏目</label></div></td>' . "\r\n" . '  <td width="300">/template/default/ <input name="template" class="text" style="width:100px;" id="jstemplate" value="';
echo $cat['template'];
echo '"> .html   ' . "\r\n" . '  </td>' . "\r\n" . '  <td>' . "\r\n" . '  ';

foreach ($category_tpl as $k => $v ) {
	echo '   <a href="###" title="点击使用';
	echo $v;
	echo '" onclick="insertunit(\'';
	echo $k;
	echo '\')" class="temp ';

	if ($cat['template'] == $k) {
		echo 'curtemp';
	}

	echo '">';
	echo $v;
	echo '<br />（';
	echo $k;
	echo '）</a>' . "\r\n" . '    ';

	if ($k == 'category') {
		echo '<div class=clear></div>';
	}

	echo '  ';
}

echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8">栏目信息详细页使用模板： <div style="margin-top:10px; color:#666"><label for="children_tplinfo"><input name="children_tplinfo" value="1" type="checkbox" checked="checked" class="checkbox" id="children_tplinfo">同步应用到子栏目</label></div></td>' . "\r\n" . '  <td>/template/default/ <input name="template_info" class="text" style="width:100px;" id="jstemplate2" value="';
echo $cat['template_info'];
echo '"> .html ' . "\r\n" . '  </td>' . "\r\n" . '  <td>' . "\r\n" . '  ';

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
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="3">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'4\')">栏目信息联系方式查看权限</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'4\')"><img id="menuimg_4" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_4">' . "\r\n" . '<tr bgcolor="white">' . "\r\n" . '  <td bgcolor="#F1F5F8" width="15%">查看隶属该栏目下的信息联系方式扣除金币数量：<div style="margin-top:10px; color:#666"><label for="children_usecoin"><input name="children_usecoin" checked="checked" value="1" type="checkbox" class="checkbox" id="children_usecoin">同步应用到子栏目</label></div></td>' . "\r\n" . '  <td>' . "\r\n" . '  <input name="usecoin" class="txt" id="usecoin" value="';
echo $cat['usecoin'];
echo '"> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <font color="red">请填写整数！</font> <font style="color:#777; margin-left:10px;"><br>填写<font color="red">0</font>时，表示联系方式完全公开<br>填写<font color="red">-1</font>时，表示联系方式只对登录的会员公开<br>填写<font color="red">大于0的整数</font>时，表示查看联系方式需扣除会员的相应金币</font>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="保存修改" class="mymps large" />　' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="gray large">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

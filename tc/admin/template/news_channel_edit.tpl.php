<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.catname.value==""){' . "\r\n\t\t" . 'alert(\'请输入栏目标题！\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.cat.value==""){' . "\r\n\t\t" . 'alert(\'请选择栏目！\');' . "\r\n\t\t" . 'document.form1.cat.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . 'function do_copy(){' . "\r\n" . '  ff = document.form1;' . "\r\n" . '  ff.title.value=document.getElementById("catname").value;' . "\r\n" . '  ff.keywords.value=document.getElementById("catname").value;' . "\r\n" . '  ff.description.value=document.getElementById("catname").value;' . "\r\n" . '}' . "\r\n" . 'function copyoption(s1, s2) {' . "\r\n\t" . 'var s1 = $(s1);' . "\r\n\t" . 'var s2 = $(s2);' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t" . 'op = s1.options[i];' . "\r\n\t\t" . 'if(op.selected == true && !optionexists(s2, op.value)) {' . "\r\n\t\t\t" . 'o = op.cloneNode(true);' . "\r\n\t\t\t" . 's2.appendChild(o);' . "\r\n\t\t" . '}' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n\r\n" . 'function optionexists(s1, value) {' . "\r\n\t" . 'var len = s1.options.length;' . "\r\n\t\t" . 'for(var i=0; i<len; i++) {' . "\r\n\t\t\t" . 'if(s1.options[i].value == value) {' . "\r\n\t\t\t\t" . 'return true;' . "\r\n\t\t\t" . '}' . "\r\n\t\t" . '}' . "\r\n\t" . 'return false;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a title="已添加的新闻类别" href="channel.php">已添加的新闻类别</a></li>' . "\r\n" . '                <li><a title="新增新闻类别" href="channel.php?part=add">新增新闻类别</a></li>' . "\r\n\t\t\t\t" . '<li><a title="编辑新闻类别" href="channel.php?part=edit&catid=';
echo $catid;
echo '" class="current">编辑新闻类别</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td  id="menu_tip">' . "\r\n" . '  <li>栏目不设置为启用时，仅作为一个分类方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=edit">' . "\r\n" . '<input name="catid" value="';
echo $cat[catid];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'1\')">栏目基本信息</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'1\')"><img id="menuimg_1" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_1">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">栏目名称： </td>' . "\r\n" . '  <td><input name="catname" type="text" class="text" id="catname" value="';
echo $cat[catname];
echo '" size="30"> ' . "\r\n" . '  ' . "\t\t" . '<select name="fontcolor">' . "\r\n" . '          <option value="">默认颜色</option>' . "\r\n" . '          ';

foreach ($cat_color as $k ) {
	echo '          <option value="';
	echo $k;
	echo '" style="background-color:';
	echo $k;
	echo ';" ';

	if ($cat[color] == $k) {
		echo 'selected';
	}

	echo '></option>' . "\r\n" . '          ';
}

echo '        </select>' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>隶属栏目： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根栏目...</option>' . "\r\n";
echo cat_list('channel', 0, $cat[parentid]);
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>栏目排序： </td>' . "\r\n" . '  <td><input name="catorder" type="text" class="text" id="catorder" value="';
echo $cat[catorder];
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>是否启用： </td>' . "\r\n" . '  <td> <select name="isview">' . "\r\n" . '      ';
echo get_ifview_options($cat[if_view]);
echo '      </select></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table cellpadding="0" cellspacing="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'2\')">SEO优化设置<font style="color:#FF6600; font-weight:100">(若与栏目名称相同，' . "\r\n" . '<label for="copy">' . "\r\n" . '点此<input name="radio" id="copy" type="radio" onClick="do_copy();"  class="radio"/>复制</label>' . "\r\n" . ')</font></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'2\')"><img id="menuimg_2" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_2">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">显示标题(title)： </td>' . "\r\n" . '  <td> <input name="title" type="text" class="text" id="title" value="';
echo $cat[title];
echo '" size="50"> <font color="red">*</font>(<font style="color:#FF6600">范例：郑州本地新闻_郑州电脑新闻</font>,不超过15个字符)' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>关键词(keyword)： </td>' . "\r\n" . '  <td><input name="keywords" type="text" class="text" id="keywords" value="';
echo $cat[keywords];
echo '" size="50">   (多个关键字以","隔开;分站名用 <font color="red">{city}</font> 代替)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>介绍(description)： </td>' . "\r\n" . '  <td><textarea name="description" cols="49" rows="5" id="description">';
echo $cat[description];
echo '</textarea> (分站名用 <font color="red">{city}</font> 代替)</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>目录存放形式：<br /><i style="color:#666">生成静态目录时生效</i> </td>' . "\r\n" . '  <td>';
echo GetHtmlType($cat[dir_type], 'dir_type', 'edit', $cat[dir_typename]);
echo ' </td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="保存修改" class="mymps mini" />　' . "\r\n" . '<input type="button" onClick="location.href=\'?part=list\'" value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.catname.value==""){' . "\r\n\t\t" . 'alert(\'请输入栏目标题！\');' . "\r\n\t\t" . 'document.form1.catname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a title="已添加的新闻类别" href="channel.php" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>已添加的新闻类别</a></li>' . "\r\n" . '                <li><a title="新增新闻类别" href="channel.php?part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>新增新闻类别</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>栏目不设置为启用时，仅作为一个分类方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=add">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">' . "\r\n" . '栏目基本信息' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="menu_1">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">栏目名称： </td>' . "\r\n" . '  <td><textarea rows="5" name="catname" cols="50"></textarea><br />' . "\r\n" . '<div style="margin-top:3px">支持新闻分类批量添加，多个分类以 | 隔开 <br />' . "\r\n" . '<font color="red">范例：分类1|分类2|分类3|分类4|分类5</font></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>隶属栏目： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根栏目...</option>' . "\r\n";
echo cat_list('channel');
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>栏目排序： </td>' . "\r\n" . '  <td><input name="catorder" type="text" class="txt" id="catorder" value="';
echo $maxorder;
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>是否启用： </td>' . "\r\n" . '  <td><select name="isview">' . "\r\n" . '      ';
echo get_ifview_options($cat[if_view]);
echo '      </select></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>目录存放形式：<br /><i style="color:#666">生成静态目录时生效</i> </td>' . "\r\n" . '  <td>';
echo GetHtmlType('3', 'dir_type', 'add');
echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="确认提交" name="';
echo CURSCRIPT;
echo '_submit" class="mymps mini" />　' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

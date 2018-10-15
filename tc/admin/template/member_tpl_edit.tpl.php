<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.tpl_name.value==""){' . "\r\n\t\t" . 'alert(\'请输入模板名称！\');' . "\r\n\t\t" . 'document.form1.tpl_name.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.tpl_path.value==""){' . "\r\n\t\t" . 'alert(\'请输入模板路径！\');' . "\r\n\t\t" . 'document.form1.tpl_path.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="member_tpl.php" class="current">空间模板</a></li>' . "\r\n\t\t\t\t" . '<li><a href="member_comment.php">空间点评</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>启用状态不设置为启用时，仅作为一个链接方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=edit">' . "\r\n" . '<input name="id" value="';
echo $edit[id];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2"><a href="javascript:collapse_change(\'1\')">导航基本信息</a>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">模板名称： </td>' . "\r\n" . '  <td><input name="tpl_name" type="text" class="text" id="title" value="';
echo $edit[tpl_name];
echo '" size="30"> ' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">模板路径/标识： </td>' . "\r\n" . '  <td><input name="tpl_path" type="text" class="text" id="title" value="';
echo $edit[tpl_path];
echo '" size="30">' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>是否启用： </td>' . "\r\n" . '  <td><select name="isview">' . "\r\n" . '    ';
echo get_ifview_options($edit[if_view]);
echo '    </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>导航排序： </td>' . "\r\n" . '  <td><input name="displayorder" type="text" class="txt" value="';
echo $edit[displayorder];
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="保存修改" class="mymps mini" />　' . "\r\n" . '<input type="button" onclick="location.href=\'?\'" value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

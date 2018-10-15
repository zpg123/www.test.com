<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form1.title.value==""){' . "\r\n\t\t" . 'alert(\'请输入链接标题！\');' . "\r\n\t\t" . 'document.form1.title.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.cat.value==""){' . "\r\n\t\t" . 'alert(\'请选择链接！\');' . "\r\n\t\t" . 'document.form1.cat.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>启用状态不设置为启用时，仅作为一个链接方案保存，你可以在启用的时候开启它</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=edit">' . "\r\n" . '<input name="id" value="';
echo $navurl[id];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2"><a href="javascript:collapse_change(\'1\')">导航基本信息</a>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">链接文字： </td>' . "\r\n" . '  <td><input name="title" type="text" class="text" id="title" value="';
echo $navurl[title];
echo '" size="30"> ' . "\r\n" . '  ' . "\t\t" . '<select name="showcolor">' . "\r\n" . '          <option value="">默认颜色</option>' . "\r\n" . '          ';
echo get_color_options($navurl[color]);
echo '        </select>' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">链接地址： </td>' . "\r\n" . '  <td><input name="url" type="text" class="text" id="title" value="';
echo $navurl[url];
echo '" size="30">' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td>导航类型： </td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="typeid">' . "\r\n" . '    ';
echo get_navtype_options($navurl[typeid]);
echo '    </select>  ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td>窗口打开形式： </td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="target">' . "\r\n" . '    ';
echo get_target_options($navurl[target]);
echo '    </select>  ' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>是否启用： </td>' . "\r\n" . '  <td>     <select name="isview">' . "\r\n" . '    ';
echo get_ifview_options($navurl[isview]);
echo '    </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>导航排序： </td>' . "\r\n" . '  <td><input name="displayorder" type="text" class="txt" value="';
echo $navurl[displayorder];
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="保存修改" class="mymps mini" />　' . "\r\n" . '<input type="button" onclick="location.href=\'?\'" value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . 'label{float:left; width:180px; height:16px; display:block}' . "\r\n" . '</style>' . "\r\n" . '<script language=\'javascript\'>' . "\r\n\t" . 'function checkSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.typename.value==""){' . "\r\n\t" . '     alert("组名不能为空！");' . "\r\n\t" . '     document.form1.userid.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=group" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>用户组</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=group&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加用户组</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '<form name="form1" action="?do=group&part=insert" onSubmit="return checkSubmit();" method="post">' . "\r\n" . '    <input type="hidden" name="ifsystem" value="0">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="4">用户组基本设置</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff" >' . "\r\n" . '        <td width="80" >用户组名称：</td>' . "\r\n" . '        <td ><input name="typename" id="userid" size="16" class="text" type="text"/></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '      <td colspan="2">' . "\r\n" . '        <div class="left"><a href="javascript:collapse_change(\'2\')">用户组权限设置</a></div>' . "\r\n" . '        <div class="right"><a href="javascript:collapse_change(\'2\')"><img id="menuimg_2" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '      </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tbody id="menu_2">' . "\r\n\t" . '  ';
echo mymps_admin_purview();
echo '      </tbody>' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="60">&nbsp;</td>' . "\r\n" . '        <td>' . "\r\n" . '        <input type="submit" name="Submit" value="增加用户组" class="mymps mini"/>' . "\r\n" . '        　<input type="button" onClick=history.back() value="返 回" class="mymps mini">            </td>' . "\r\n" . '      </tr>' . "\r\n" . '        </form>' . "\r\n" . '        </table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

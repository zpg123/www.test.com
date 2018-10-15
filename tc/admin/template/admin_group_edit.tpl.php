<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . 'label{float:left; width:180px; height:16px; display:block}' . "\r\n" . '</style>' . "\r\n" . '<script language=\'javascript\'>' . "\r\n\t" . 'function checkSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.typename.value==""){' . "\r\n\t" . '     alert("组名不能为空！");' . "\r\n\t" . '     document.form1.userid.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<form name="form1" action="admin.php?do=group" onSubmit="return checkSubmit();" method="post">' . "\r\n" . '<input type="hidden" name="ifsystem" value="';
echo $group[ifsystem];
echo '">' . "\r\n" . '<input type="hidden" name="part" value="update" />' . "\r\n" . '<input name="id" value="';
echo $group[id];
echo '" type="hidden"/>' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="4">用户组基本设置</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="80" height="30">用户组名称：</td>' . "\r\n" . '    <td ><input name="typename"class="text" type="text" id="userid" size="16" value="';
echo $group[typename];
echo '"/></td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  <td colspan="2">' . "\r\n" . '    <div class="left"><a href="javascript:collapse_change(\'2\')">用户组权限设置</a></div>' . "\r\n" . '    <div class="right"><a href="javascript:collapse_change(\'2\')"><img id="menuimg_2" src="template/images/menu_reduce.gif"/></a></div>' . "\r\n" . '  </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tbody id="menu_2">' . "\r\n" . '  ';
echo mymps_admin_purview($purview);
echo '  </tbody>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="60">&nbsp;</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input type="submit" name="Submit" value="保存修改" class="mymps mini">' . "\r\n" . '    　<input type="button" onClick=history.back() value="返 回" class="mymps mini">          </td>' . "\r\n" . '  </tr>' . "\r\n" . '    </form>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

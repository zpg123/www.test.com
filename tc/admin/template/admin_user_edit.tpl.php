<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n\t" . 'function checkSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.uname.value==""){' . "\r\n\t" . '     alert("用户名不能为空！");' . "\r\n\t" . '     document.form1.uname.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<form name="form1" action="?do=user" method="post" onSubmit="return checkSubmit();">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<input type="hidden" name="part" value="update" />' . "\r\n" . '  <input type="hidden" name="id" value="';
echo $id;
echo '" />' . "\r\n" . '   ' . "\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="16%" height="30">用户登录ID：</td>' . "\r\n" . '        <td width="84%"><input name="userid" class="text" type="text" id="userid" size="16" value="';
echo $admin[userid];
echo '" style="width:200px" /></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ' . "\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '      <td height="30">用户笔名：</td>' . "\r\n" . '      <td><input name="uname" class="text" type="text" id="uname" size="16" value="';
echo $admin[uname];
echo '" style="width:200px" />' . "\r\n" . '        &nbsp;（回答网站留言时显示的名字） </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '    <td height="30">真实姓名：</td>' . "\r\n" . '    <td><input name="tname" class="text" type="text" id="tname" size="16" style="width:200px" value="';
echo $admin[tname];
echo '" />' . "\r\n" . '    &nbsp;（不对外显示，只用于方便后台记录显示） </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td height="30">用户密码：</td>' . "\r\n" . '      <td><input name="pwd" class="text" type="text" id="pwd" size="16" style="width:200px" />' . "\r\n" . '        &nbsp;（留空则不修改，只能用\'0-9a-zA-Z.@_-!\'以内范围的字符） </td>' . "\r\n" . '    </tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '            <td height="30">用户组：</td>' . "\r\n" . '            <td>' . "\r\n\t\t\t" . '    <select name=\'typeid\' style=\'width:200px\'>' . "\r\n" . '                ';
echo get_admin_group($admin[typeid]);
echo "\t\t\t" . '  </select>' . "\r\n\t\t\t" . '    &nbsp;' . "\r\n\t\t\t" . '    【<a href=\'admin.php?do=group\'><u>用户组设定</u></a>】' . "\r\n" . '            </td>' . "\r\n" . '          </tr>' . "\r\n" . '    ' . "\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '      <td height="30">电子邮箱：</td>' . "\r\n" . '      <td><input name="email" class="text" type="text" id="email" size="16" style="width:200px" value="';
echo $admin[email];
echo '" />' . "\r\n" . '        &nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="Submit" value="提 交" class="mymps large" /><input type="button" onClick=history.back() value="返 回" class="gray large"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

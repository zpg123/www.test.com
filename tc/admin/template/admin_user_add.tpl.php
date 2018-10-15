<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n\t" . 'function checkSubmit()' . "\r\n" . '  {' . "\r\n" . '     if(document.form1.userid.value==""){' . "\r\n\t" . '     alert("用户ID不能为空！");' . "\r\n\t" . '     document.form1.userid.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.uname.value==""){' . "\r\n\t" . '     alert("用户名不能为空！");' . "\r\n\t" . '     document.form1.uname.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     if(document.form1.pwd.value==""){' . "\r\n\t" . '     alert("用户密码不能为空！");' . "\r\n\t" . '     document.form1.pwd.focus();' . "\r\n\t" . '     return false;' . "\r\n" . '     }' . "\r\n" . '     return true;' . "\r\n" . ' }' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=user" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>用户列表</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=user&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加用户</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form name="form1" action="?do=user&part=insert" onSubmit="return checkSubmit();" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td width="16%" height="30">用户登录ID：</td>' . "\r\n" . '            <td width="84%"><input name="userid" class="text" type="text" id="userid" size="16" style="width:200px" />' . "\r\n" . '              （只能用\'0-9\'、\'a-z\'、\'A-Z\'、\'.\'、\'@\'、\'_\'、\'-\'、\'!\'以内范围的字符）</td>' . "\r\n" . '          </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td height="30">用户笔名：</td>' . "\r\n" . '            <td><input name="uname" class="text" type="text" id="uname" size="16" style="width:200px" /> &nbsp;（发布文章后显示责任编辑的名字）</td>' . "\r\n" . '          </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td height="30">用户密码：</td>' . "\r\n" . '            <td><input name="pwd" type="password" id="pwd" size="16" style="width:200px" class="text"/> &nbsp;（只能用\'0-9\'、\'a-z\'、\'A-Z\'、\'.\'、\'@\'、\'_\'、\'-\'、\'!\'以内范围的字符）</td>' . "\r\n" . '          </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td height="30">用户组：</td>' . "\r\n" . '            <td>' . "\r\n\t\t\t" . '  <select name=\'typeid\' style=\'width:200px\'>' . "\r\n\t\t\t\t";
echo get_admin_group();
echo "\t\t\t" . '  </select>' . "\r\n\t\t\t" . '    &nbsp;' . "\r\n\t\t\t" . '    【<a href=\'admin.php?do=group\'><u>用户组设定</u></a>】' . "\r\n" . '            </td>' . "\r\n" . '          </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td height="30">真实姓名：</td>' . "\r\n" . '            <td><input name="tname" class="text" type="text" id="tname" size="16" style="width:200px" /> &nbsp;</td>' . "\r\n" . '          </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff" >' . "\r\n" . '            <td height="30">电子邮箱：</td>' . "\r\n" . '            <td><input name="email" class="text" type="text" id="email" size="16" style="width:200px" /> &nbsp;</td>' . "\r\n" . '          </tr>' . "\r\n" . '       </table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="Submit" value="提 交" class="mymps large" />' . "\r\n" . '            　<input type="button" onClick=history.back() value="返 回" class="gray large"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

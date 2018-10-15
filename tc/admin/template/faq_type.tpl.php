<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n" . 'function CheckSubmit()' . "\r\n" . '{' . "\r\n\t" . 'if(document.form1.typename.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.typename.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("帮助问题类型不能为空！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40" align="center" valign="top">类型ID</td>' . "\r\n" . '      <td align="center" valign="top">类型名称</td>' . "\r\n" . '      <td width="36%" align="center">状态</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($links as $row ) {
	echo '    <form action="faq.php?do=type" method="post" name="form2";>' . "\r\n" . '    <input name="part" value="update" type="hidden"/>' . "\r\n" . '    <input name="id" value="';
	echo $row[id];
	echo '" type="hidden"/>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center">';
	echo $row[id];
	echo '</td>' . "\r\n" . '      <td valign="top"><input name="typename" value="';
	echo $row[typename];
	echo '" class="text" type="text" style="width:90%" /> </td>' . "\r\n" . '      <td align="center">' . "\r\n\t" . '  <input type="submit" value="更 改" class="gray mini"/>　<input type="button" onClick="location.href=\'faq.php?do=type&part=delete&id=';
	echo $row[id];
	echo '\'" value="删 除" class="gray mini"/>' . "\t" . '   </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '    ';
}

echo '    <tr class="firstr">' . "\r\n" . '      <td colspan="5" align="left"><strong>新增一个帮助类型：</strong></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <form action="faq.php?do=type" method="post" name="form1" onSubmit="return CheckSubmit();";>' . "\r\n" . '    <input name="part" value="insert" type="hidden"/>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td colspan="2" valign="top">' . "\r\n" . '      <input name="typename" class="text" type="text" style="width:70%" />' . "\r\n" . '      </td>' . "\r\n" . '      <td align="center">' . "\r\n" . '      <input type="submit" name="submit" value="新 增" class="mymps mini"/>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '   </form>' . "\r\n" . '    <tr>' . "\r\n" . '      <td height="34" colspan="5" align="center" bgcolor="white">' . "\r\n" . '      　<input type="button" onClick=history.back() value="返 回" class="mymps mini">    </td>' . "\r\n" . '    </tr>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n" . 'function CheckSubmit()' . "\r\n" . '{' . "\r\n\t" . 'if(document.form1.typename.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.typename.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("字段分类不能为空！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40" align="center" valign="top">类型ID</td>' . "\r\n" . '      <td align="center" valign="top">类型名称</td>' . "\r\n" . '      <td width="36%" align="center">状态</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($type as $row ) {
	echo '    <form action="info_type.php?part=option_type&action=update&id=';
	echo $row[optionid];
	echo '" method="post" name="form2";>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center">';
	echo $row[optionid];
	echo '</td>' . "\r\n" . '      <td valign="top"><input name="title" value="';
	echo $row[title];
	echo '" type="text" class="text" style="width:90%" /> </td>' . "\r\n" . '      <td align="center">' . "\r\n\t" . '  <input type="submit" value="更 改" class="gray mini"/>　' . "\r\n" . '      <input type="button" onClick="location.href=\'?part=option_type&action=del&id=';
	echo $row[optionid];
	echo '\'" value="删 除" class="gray mini"/></td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '    ';
}

echo '    <tr class="firstr">' . "\r\n" . '      <td colspan="5" align="left"><strong>新增一个字段分类：</strong></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <form action="?part=option_type&action=insert" method="post" name="form1" onSubmit="return CheckSubmit();";>' . "\r\n" . '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td colspan="2" valign="top">' . "\r\n" . '      <input name="title" type="text" class="text" style="width:70%" />' . "\r\n" . '      </td>' . "\r\n" . '      <td align="center">' . "\r\n" . '      <input type="submit" name="submit" value="新 增" class="mymps mini"/>' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '   </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

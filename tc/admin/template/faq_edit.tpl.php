<?php

include mymps_tpl('inc_head');
echo '<script language=\'javascript\'>' . "\r\n" . 'function CheckSubmit()' . "\r\n" . '{' . "\r\n\t" . 'if(document.form1.typeid.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.typeid.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("请选择帮助分类！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if(document.form1.title.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.title.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("请填写主题标题！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'if(document.form1.content.value=="")' . "\r\n\t" . '{' . "\r\n" . '   ' . "\t\t" . 'document.form1.content.focus();' . "\r\n" . '   ' . "\t\t" . 'alert("请填写主题内容！");' . "\r\n" . '   ' . "\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method=post  name="form1" action="?part=edit&id=';
echo $edit[id];
echo '" onSubmit="return CheckSubmit();">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<input name="action" type="hidden" value="dopost">' . "\r\n" . '<tr bgcolor="#f5fbff" >' . "\r\n" . '  <td width="10%" align="right">所属类别： </td>' . "\r\n" . '  <td colspan="3">' . "\r\n" . '  <select name="typeid">' . "\r\n" . '  ' . "\t";

foreach ($faq_type as $k ) {
	echo '    <option value="';
	echo $k[id];
	echo '"';

	if ($edit[typeid] == $k[id]) {
		echo 'selected';
	}

	echo '>';
	echo $k[typename];
	echo '</option>' . "\r\n" . '    ';
}

echo '  </select> <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff" >' . "\r\n" . '  <td width="10%" align="right">主题标题： </td>' . "\r\n" . '  <td colspan="3"> <input name="title" type="text" class="text" value="';
echo $edit[title];
echo '" size="50"> <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">' . "\r\n";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

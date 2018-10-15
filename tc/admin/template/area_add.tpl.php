<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form.areaname.value==""){' . "\r\n\t\t" . 'alert(\'请输入地区名称，多个地区以 | 隔开！\');' . "\r\n\t\t" . 'document.form.areaname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form" action="?part=add">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >地区名称： </td>' . "\r\n" . '  <td>' . "\r\n" . '  <textarea rows="5" name="areaname" cols="50"></textarea><br />' . "\r\n" . '<div style="margin-top:3px">支持地区批量添加，多个地区以 | 隔开 <br />' . "\r\n" . '<font color="red">范例：地区1|地区2|地区3|地区4|地区5</font></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >分类选择： </td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根分类...</option>' . "\r\n\t" . '<!--';
echo cat_list('area', 0, 0, true, 1);
echo '-->' . "\r\n" . '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >地区排序： </td>' . "\r\n" . '  <td><input name="areaorder" class="text" type="text" id="areaorder" value="';
echo $maxorder;
echo '" size="14"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="提交保存" class="mymps mini"/>' . "\r\n" . '&nbsp;&nbsp;' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

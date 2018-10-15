<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form.corpname.value==""){' . "\r\n\t\t" . 'alert(\'请输入商家分类名称，多个分类以 | 隔开！\');' . "\r\n\t\t" . 'document.form.corpname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form" action="?part=add">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >分类名称 </td>' . "\r\n" . '  <td>' . "\r\n" . '  <textarea rows="5" name="corpname" cols="50"></textarea><br />' . "\r\n" . '<div style="margin-top:3px">支持商家分类批量添加，多个分类以 | 隔开 <br />' . "\r\n" . '<font color="red">范例：分类1|分类2|分类3|分类4|分类5</font></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >隶属分类</td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    <option value="0">作为根分类...</option>' . "\r\n\t";
echo cat_list('corp', 0, '', true, 1);
echo '  </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td >分类排序 </td>' . "\r\n" . '  <td><input name="corporder" class="text" type="text" id="corporder" value="';
echo $maxorder;
echo '" size="14"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="提交保存" class="mymps mini"/>' . "\r\n" . '&nbsp;&nbsp;' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

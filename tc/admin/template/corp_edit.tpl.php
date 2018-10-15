<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form.corpname.value==""){' . "\r\n\t\t" . 'alert(\'请输入分类名称！\');' . "\r\n\t\t" . 'document.form.corpname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form" action="?part=edit">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<input name="part" value="update" type="hidden">' . "\r\n" . '<input type="hidden" name="corpid" value="';
echo $corp[corpid];
echo '">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>商家分类名称</td>' . "\r\n" . '  <td> ' . "\r\n" . '  <input name="corpname" class="text" type="text" id="corpname" value="';
echo $corp[corpname];
echo '" size="30">' . "\r\n" . '   <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>隶属分类</td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    ' . "\t" . '<option value="0">作为根分类...</option>' . "\r\n\t\t";
echo cat_list('corp', 0, $corp[parentid], true, 1);
echo '  </select>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>分类排序</td>' . "\r\n" . '  <td><input name="corporder" class="text" type="text" id="corporder" value="';
echo $corp[corporder];
echo '" size="30"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="提交保存" class="mymps mini"/>' . "\r\n" . '&nbsp;&nbsp;' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

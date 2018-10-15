<?php

include mymps_tpl('inc_head');
echo '<script language=javascript>' . "\r\n" . 'function chkform(){' . "\r\n\t" . 'if(document.form.areaname.value==""){' . "\r\n\t\t" . 'alert(\'请输入地区名称！\');' . "\r\n\t\t" . 'document.form.areaname.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form" action="?part=edit">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<input name="part" value="update" type="hidden">' . "\r\n" . '<input type="hidden" name="areaid" value="';
echo $area[areaid];
echo '">' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>地区名称</td>' . "\r\n" . '  <td> ' . "\r\n" . '  <input name="areaname" class="text" type="text" id="areaname" value="';
echo $area[areaname];
echo '" size="30">' . "\r\n" . '   <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>隶属分类</td>' . "\r\n" . '  <td><select name="parentid" id="parentid" >' . "\r\n" . '    ' . "\t" . '<option value="0">作为根分类...</option>' . "\r\n" . '  </select>' . "\r\n" . '  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>地区排序</td>' . "\r\n" . '  <td><input name="areaorder" class="text" type="text" id="areaorder" value="';
echo $area[areaorder];
echo '" size="30"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="提交保存" class="mymps mini"/>' . "\r\n" . '&nbsp;&nbsp;' . "\r\n" . '<input type="button" onClick=history.back() value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

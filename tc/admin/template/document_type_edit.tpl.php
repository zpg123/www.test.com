<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="document.php?do=document" ';

if ($do == 'document') {
	echo 'class="current"';
}

echo '>已发布文档</a></li>' . "\r\n\t\t\t\t" . '<li><a href="document.php" ';

if ($do == 'type') {
	echo 'class="current"';
}

echo '>文档模型管理</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form method=post onSubmit="return chkform()" name="form1" action="?part=edit">' . "\r\n" . '<input name="typeid" value="';
echo $edit[typeid];
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">会员文档模型基本信息' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td width="15%">模型名称： </td>' . "\r\n" . '  <td><input name="typename" type="text" class="text" id="title" value="';
echo $edit[typename];
echo '" size="30"> ' . "\r\n" . '  ' . "\t\t" . '<font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '    <td>模型类型： </td>' . "\r\n" . '    <td>' . "\r\n" . '    <select name="arrid">' . "\r\n" . '      ';
echo get_docuarr_options($edit[arrid]);
echo '      </select>' . "\r\n" . '    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>是否启用： </td>' . "\r\n" . '  <td><select name="ifview">' . "\r\n" . '      ';
echo get_ifview_options($edit[ifview]);
echo '      </select>  </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>显示顺序： </td>' . "\r\n" . '  <td><input name="displayorder" type="text" class="txt" value="';
echo $edit[displayorder];
echo '" size="13"></td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" name="';
echo CURSCRIPT;
echo '_submit" value="保存修改" class="mymps mini" />　' . "\r\n" . '<input type="button" onclick="location.href=\'?\'" value="返 回" class="mymps mini">' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

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

echo '>文档模型管理</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n\t\t";
echo $notice;
echo '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'document.php\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<input name="do" type="hidden" value="type">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>文档模型名称</td>' . "\r\n" . '      <td>文档类型</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>启用状态</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($docu as $k => $value ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[typeid];
	echo '\' id="';
	echo $value[typeid];
	echo '"></td>' . "\r\n" . '          <td>';
	echo $value[typename];
	echo '</td>' . "\r\n" . '          <td>';
	echo $docu_arr[$value[arrid]];
	echo '</td>' . "\r\n" . '          <td ><input name="displayorder[';
	echo $value[typeid];
	echo ']" value="';
	echo $value[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '          <td>';
	echo $if_view[$value[ifview]];
	echo '</td>' . "\r\n" . '          <td><a href="?part=edit&typeid=';
	echo $value[typeid];
	echo '">详情</a></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center"><b>新增</b></td>' . "\r\n" . '      <td><input name="add[typename]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td>' . "\r\n" . '      <select name="add[arrid]">' . "\r\n" . '      ';
echo get_docuarr_options($arrid);
echo '      </select>' . "\r\n" . '      </td>' . "\r\n" . '      <td><input name="add[displayorder]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td>' . "\r\n" . '      <select name="add[ifview]">' . "\r\n" . '      ';
echo get_ifview_options('1');
echo '      </select>' . "\r\n" . '      </td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit" style="margin-bottom:5px"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

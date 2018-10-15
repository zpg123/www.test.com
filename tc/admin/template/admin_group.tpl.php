<?php

mymps_admin_tpl_global_head();
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=group" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>用户组</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=group&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加用户组</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="60">组编号</td>' . "\r\n" . '      <td width="80">组名称</td>' . "\r\n" . '      <td width="80">属性</td>' . "\r\n" . '      <td>管理</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($group as $row ) {
	echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td height="24"> ' . "\r\n" . '        ';
	echo $row[id];
	echo '      </td>' . "\r\n" . '      <td height="24">' . "\r\n" . '      ' . "\t";
	echo $row[typename];
	echo '      </td>' . "\r\n" . '      <td height="24">' . "\r\n" . '      ' . "\t";

	if ($row[ifsystem] == '1') {
		echo '<font color=red>系统组</font>';
	}
	else {
		echo '<font color=green>自定义组</font>';
	}

	echo '      </td>' . "\r\n" . '      <td>' . "\r\n" . '        <a href=\'admin.php?do=group&part=edit&id=';
	echo $row[id];
	echo '\'>权限设定</a> / ' . "\r\n" . '      ' . "\t" . '<a href=\'admin.php?do=user&typeid=';
	echo $row[id];
	echo '\'>组用户</a>' . "\r\n" . '      ';

	if ($row[ifsystem] != '1') {
		echo ' / <a href=\'admin.php?do=group&part=delete&id=';
		echo $row[id];
		echo '\' onClick="return confirm(\'您确定要删除该用户组吗，如不确定请点取消\')">删除组</a>';
	}

	echo '      </td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

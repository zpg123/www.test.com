<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=user" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>用户列表</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=user&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加用户</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td align="center">登录ID</td>' . "\r\n" . '    <td width="100" align="center">笔名</td>' . "\r\n" . '    <td width="100" align="center">真名</td>' . "\r\n" . '    <td width="110" align="center">用户组</td>' . "\r\n" . '    <td align="center">上次登陆</td>' . "\r\n" . '    <td align="center">管理项</td>' . "\r\n" . '  </tr>' . "\r\n" . '    ';

foreach ($admin as $row ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '    <td>';
	echo $row[userid];
	echo '</td>' . "\r\n" . '    <td>';
	echo $row[uname];
	echo '</td>' . "\r\n" . '    <td>&nbsp;';
	echo $row[tname];
	echo '</td>' . "\r\n" . '    <td >';
	echo $row[typename];
	echo '</td>' . "\r\n" . '    <td><em>时间：';
	echo GetTime($row[logintime]);
	echo '　IP：';
	echo $row[loginip];
	echo '</em></td>' . "\r\n" . '    <td>' . "\r\n\t" . '  <a href=\'admin.php?do=user&part=edit&id=';
	echo $row[id];
	echo '\'><u>更改</u></a> |' . "\r\n" . '     <a href=\'admin.php?do=user&part=delete&id=';
	echo $row[id];
	echo '\' onClick="return confirm(\'您确定要删除该管理员吗，如不确定请点取消\')"><u>删除</u></a>　' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n\r\n" . '    ';
}

echo '</table>' . "\r\n" . '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

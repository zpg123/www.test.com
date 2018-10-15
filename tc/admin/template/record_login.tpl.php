<?php

include mymps_tpl('inc_head');

if ($do == 'admin') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=';
	echo $do;
	echo '&part=login" ';

	if ($part == 'login') {
		echo 'class="current"';
	}

	echo '>管理登录记录</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=';
	echo $do;
	echo '&part=action" ';

	if ($part == 'action') {
		echo 'class="current"';
	}

	echo '>管理操作记录</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n";
}

echo '<div class="ccc2">' . "\r\n\t" . '<ul>' . "\r\n" . '      <form action="?" name="form1" method="get">' . "\r\n" . '        <select name="result">' . "\r\n" . '            <option value=""';

if (empty($result)) {
	echo 'selected';
}

echo '>筛选&raquo;&nbsp;&nbsp;所有登录记录</option>' . "\r\n" . '            <option value="0"';

if ($result == '0') {
	echo 'selected';
}

echo '>筛选&raquo;&nbsp;&nbsp;登录失败记录</option>' . "\r\n" . '            <option value="1"';

if ($result == '1') {
	echo 'selected';
}

echo '>筛选&raquo;&nbsp;&nbsp;登录成功记录</option>' . "\r\n" . '        </select>' . "\r\n" . '      &nbsp;&nbsp;' . "\r\n" . '     ' . "\t" . '<input name="keywords" class="text" value="';
echo $keywords;
echo '">' . "\r\n" . '        <input name="do" value="';
echo $do;
echo '" type="hidden">' . "\r\n" . '        <input name="part" value="login" type="hidden">' . "\r\n" . '        <input type="submit" value="模糊搜索" class="gray mini">&nbsp;&nbsp;' . "\r\n" . '     </form>' . "\r\n\t" . '</ul>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <form name=\'form1\' method=\'post\' action=\'?do=';
echo $do;
echo '&part=';
echo $part;
echo '\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '    <input type=\'hidden\' name=\'action\' value=\'delall\'/>' . "\r\n" . '    <input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">选择</td>' . "\r\n" . '    <td align="center">尝试用户名</td>' . "\r\n" . '    <td align="center">尝试密码</td>' . "\r\n" . '    <td align="center">IP地址</td>' . "\r\n" . '    <td align="center">时间</td>' . "\r\n" . '    <td align="center">登录状态</td>' . "\r\n" . '    </tr>' . "\r\n" . '  ' . "\t" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n" . '    ';

foreach ($record as $k ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '    <td><input type=\'checkbox\' class="checkbox" name=\'id[]\' value=\'';
	echo $k[id];
	echo '\' id="';
	echo $k[id];
	echo '"></td>' . "\r\n" . '    <td>';
	echo $k[adminid];
	echo '</td>' . "\r\n" . '    <td>';

	if ($k[result] == '0') {
		echo $k[adminpwd];
	}
	else {
		echo '******';
	}

	echo '</td>' . "\r\n" . '    <td>';
	echo $k[ip];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo $k[pubdate];
	echo '</em></td>' . "\r\n" . '    <td>';

	if ($k[result] == '0') {
		echo '<font color=red>登录失败</font>';
	}
	else {
		echo '<font color=green>登录成功</font>';
	}

	echo '</td>' . "\r\n" . '  </tr>' . "\r\n" . '    ';
}

echo "\t" . '</tbody>' . "\r\n" . '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" class="checkbox" id="checkall" onClick="CheckAll(this.form)"/></td>' . "\r\n" . '    <td colspan="10"><input type="submit" onClick="if(!confirm(\'确定要操作吗？\\n\\n此操作不可以恢复！\'))return false;" value="批量删除" class="mymps mini" ';

if ($do == 'admin') {
	echo 'disabled';
}

echo '/>  ' . "\r\n" . '         <input type="button" value="只保存最新的';
echo $mymps_mymps['cfg_record_save'];
echo '条记录" class="mymps mini" onclick="location.href=\'?do=';
echo $do;
echo '&part=';
echo $part;
echo '&action=delrecord&url=';
echo urlencode(GetUrl());
echo '\'">    ' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

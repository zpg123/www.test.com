<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">检索指定用户名的登录日志</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td>' . "\r\n" . '<form action="?" name="form1" method="get">' . "\r\n" . '     ' . "\t" . '<input name="keywords" class="text" value="';
echo $keywords;
echo '">' . "\r\n" . '        <input name="do" value="';
echo $do;
echo '" type="hidden">' . "\r\n" . '        <input name="part" value="login" type="hidden">' . "\r\n" . '        <input type="submit" value="搜 索" class="gray mini">&nbsp;&nbsp;' . "\r\n\t\t" . '<input type="button" value="只保存最近两个月的记录" class="mymps mini" onclick="location.href=\'?do=member&part=login&action=savemonth\'">&nbsp;&nbsp;  ' . "\r\n\t\t" . '<input type="button" value="导出到excel" class="mymps mini" onclick="location.href=\'record.php?do=member&part=login&action=doexcel\';">' . "\r\n" . '     </form>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <form name=\'form1\' method=\'post\' action=\'?do=';
echo $do;
echo '&part=';
echo $part;
echo '\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '    <input type=\'hidden\' name=\'action\' value=\'delall\'/>' . "\r\n" . '    <input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="30">选择</td>' . "\r\n" . '    <td align="center">用户名</td>' . "\r\n" . '    <td align="center">IP地址</td>' . "\r\n\t" . '<td align="center">地理位置</td>' . "\r\n\t" . '<td align="center">端口</td>' . "\r\n\t" . '<td align="center">浏览器</td>' . "\r\n\t" . '<td align="center">操作系统</td>' . "\r\n" . '    <td align="center">登录时间</td>' . "\r\n\t" . '<td align="center">下线时间</td>' . "\r\n" . '    </tr>' . "\r\n" . '  ' . "\t" . '<tbody onmouseover="addMouseEvent(this);">' . "\r\n" . '    ';

foreach ($record as $k ) {
	echo '    <tr align="center" bgcolor="white">' . "\r\n" . '    <td><input type=\'checkbox\' class="checkbox" name=\'id[]\' value=\'';
	echo $k[id];
	echo '\' id="';
	echo $k[id];
	echo '"></td>' . "\r\n" . '    <td><a href="javascript:' . "\r\n" . 'setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $k[userid];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $k[userid];
	echo '</a></td>' . "\r\n" . '    <td>';
	echo $k[ip];
	echo '</td>' . "\r\n\t" . '<td>';
	echo $k[ip2area];
	echo '</td>' . "\r\n\t" . '<td>';
	echo $k[port];
	echo '</td>' . "\r\n\t" . '<td>';
	echo $k[browser];
	echo '</td>' . "\r\n\t" . '<td>';
	echo $k[os];
	echo '</td>' . "\r\n" . '    <td><em>';
	echo $k[pubdate];
	echo '</em></td>' . "\r\n\t" . '<td><em>';
	echo $k[outdate];
	echo '</em></td>' . "\r\n" . '  </tr>' . "\r\n" . '    ';
}

echo "\t" . '</tbody>' . "\r\n" . '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" class="checkbox" id="checkall" onClick="CheckAll(this.form)"/></td>' . "\r\n" . '    <td colspan="10"><input type="submit" onClick="if(!confirm(\'确定要操作吗？\\n\\n此操作不可以恢复！\'))return false;" value="批量删除" class="mymps mini" ';

if ($do == 'admin') {
	echo 'disabled';
}

echo '/>  ' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '    </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

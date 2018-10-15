<?php

include mymps_tpl('inc_head');
$admindir = getcwdOL();
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="pm.php?part=send" ';

if ($part == 'send') {
	echo 'class="current"';
}

echo '>群发短消息</a></li>' . "\r\n\t\t\t\t" . '<li><a href="pm.php?part=outbox" ';

if ($part == 'outbox') {
	echo 'class="current"';
}

echo '>已发送短消息</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<form action="?action=pm" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm" >' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '    <td width="50"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/> 删?</td>' . "\r\n" . '    <td>标题</td>' . "\r\n" . '    <td>发送者</td>' . "\r\n" . '    <td>对象</td>' . "\r\n" . '    <td>阅读状态</td>' . "\r\n" . '    <td width="120">时间</td>' . "\r\n" . '  </tr>' . "\r\n";

foreach ($pm as $row ) {
	echo '    <tr bgcolor="#ffffff" >' . "\r\n" . '    <td><input type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $row[id];
	echo '\' class=\'checkbox\'></td>' . "\r\n" . '    <td><a href=\'javascript:blocknone("pm_';
	echo $row[id];
	echo '");\'>' . "\r\n" . '    ';

	if ($row[if_sys] == 1) {
		echo '<b>[系统消息]</b> ';
	}

	echo $row[title];
	echo '    </a></td>' . "\r\n" . '    <td>';
	echo $row[fromuser];
	echo '</td>' . "\r\n" . '    <td><a href="' . "\r\n" . 'javascript:setbg(\'';
	echo MPS_SOFTNAME;
	echo '会员中心\',400,110,\'../box.php?part=member&userid=';
	echo $row[touser];
	echo '&admindir=';
	echo $admindir;
	echo '\')">';
	echo $row[touser];
	echo '</a></td>' . "\r\n" . '    <td>' . "\r\n" . '    ';

	if ($row[if_read] == 1) {
		echo '<font color=green>已读</font>';
	}
	else {
		echo '<font color=red>未读</font>';
	}

	echo '    </a></td>' . "\r\n" . '    <td>';
	echo GetTime($row[pubtime]);
	echo '</td>' . "\r\n" . '  </tr>' . "\r\n" . '   <tr style="background-color:white; display:none" id="pm_';
	echo $row[id];
	echo '">' . "\r\n" . '     <td>&nbsp;</td>' . "\r\n" . '     <td colspan="5">' . "\r\n" . '     <div class="pm_view">' . "\r\n" . '     ';
	echo $row[content];
	echo '     </div>' . "\r\n" . '     <div class="lit_manage"><a href="?part=send&id=';
	echo $row[id];
	echo '">转发</a> - ' . "\r\n\t\t\t" . '<a href="?part=del&id=';
	echo $row[id];
	echo '&url=';
	echo urlencode(GetUrl());
	echo '">删除</a></div></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="pm_submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

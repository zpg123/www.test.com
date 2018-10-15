<?php

include mymps_tpl('inc_head');
echo '<form action="?part=sendlist" method="post"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>手机号码</td>' . "\r\n" . '      <td>发送内容</td>' . "\r\n" . '      <td>发送状态</td>' . "\r\n" . '      <td>发送时间</td>' . "\r\n" . '      <td>发送接口</td>' . "\r\n" . '    </tr>' . "\r\n\t";

foreach ($list as $list ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $list[id];
	echo '\' id="';
	echo $list[id];
	echo '"></td>' . "\r\n" . '          <td>';
	echo $list[mobile];
	echo '</td>' . "\r\n" . '          <td width="40%"><font color=gray>';
	echo $list[sms_service] == 'weimi' ? '已隐藏' : $list[sms_content];
	echo '</font></td>' . "\r\n" . '          <td width="100">';
	echo strstr($list['status'], '成功') ? '<font color=green>成功</font>' : '<font color=red>' . $list[status] . '</font>';
	echo '</td>' . "\r\n" . '          ' . "\r\n" . '          <td><em>';
	echo GetTime($list[sendtime]);
	echo '</em></td>' . "\r\n" . '          <td>';

	if ($list[sms_service] == 'dxton') {
		echo '短信通';
	}
	else if ($list['sms_service'] == 'ihuyi') {
		echo '互亿无线';
	}
	else if ($list['sms_service'] == 'weimi') {
		echo '微米';
	}

	echo '</td>' . "\r\n" . '        </tr>' . "\r\n\t";
}

echo '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="mail_submit"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<form method="post" action="sms.php?part=';
echo $part;
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">配置短信供应商接口</td></tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td width="25%">' . "\r\n" . '供应商:  &nbsp;&nbsp;' . "\r\n" . '</td>' . "\r\n" . '<td>' . "\r\n" . '<label for="dxton"><input class="radio" name="sms_service" type="radio" id="dxton" value="dxton" onclick=\'document.getElementById("sms_div").style.display = "";\' ';

if ($sms_config[sms_service] == 'dxton') {
	echo 'checked="checked"';
}

echo '>通道一</label>' . "\r\n" . '<label for="ihuyi"><input name="sms_service" type="radio" class="radio" id="ihuyi" value="ihuyi" onclick=\'document.getElementById("sms_div").style.display = "";\' ';

if ($sms_config[sms_service] == 'ihuyi') {
	echo 'checked="checked"';
}

echo '>通道二</label>' . "\r\n" . '<label for="weimi"><input name="sms_service" type="radio" class="radio" id="weimi" value="weimi" onclick=\'document.getElementById("sms_div").style.display = "";\' ';

if ($sms_config[sms_service] == 'weimi') {
	echo 'checked="checked"';
}

echo '>通道三</label> ' . "\r\n" . '<label for="no"><input class="radio" name="sms_service" type="radio" id="no" value="no" onclick=\'document.getElementById("sms_div").style.display = "none";\' ';
if (($sms_config[sms_service] == 'no') || empty($sms_config[sms_service])) {
	echo 'checked="checked"';
}

echo '>不启用</label>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="sms_div" ';
if (($sms_config['sms_service'] == 'no') || empty($sms_config['sms_service'])) {
	echo 'style="display:none"';
}

echo '>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td>' . "\r\n" . '帐号' . "\r\n" . '</td>' . "\r\n" . '<td><input class="text" type="text" name="sms_user" value="';
echo $sms_config[sms_user];
echo '"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td>' . "\r\n" . '密码' . "\r\n" . '</td>' . "\r\n" . '<td><input class="text" type="password" name="sms_pwd" value="';
echo $sms_config[sms_pwd];
echo '"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td>' . "\r\n" . '新用户注册模板内容/模板ID' . "\r\n" . '</td>' . "\r\n" . '<td><input class="text" style="width:600px" name="sms_regtpl" value="';
echo $sms_config[sms_regtpl];
echo '"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor="#ffffff">' . "\r\n" . '<td>' . "\r\n" . '找回密码模板内容/模板ID' . "\r\n" . '</td>' . "\r\n" . '<td><input class="text" style="width:600px" name="sms_pwdtpl" value="';
echo $sms_config[sms_pwdtpl];
echo '"></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large" name="sms_submit"/>  </center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

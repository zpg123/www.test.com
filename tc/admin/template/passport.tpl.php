<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.ttip{ color:#666; margin-top:5px; text-align:left}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="?part=bbs" ';

if ($part == 'bbs') {
	echo 'class="current"';
}

echo '>论坛整合</a></li>' . "\r\n\t\t\t" . '<li><a href="?part=qqlogin" ';

if ($part == 'qqlogin') {
	echo 'class="current"';
}

echo '>QQ登录整合</a></li>' . "\r\n" . '            <li><a href="?part=wxlogin" ';

if ($part == 'wxlogin') {
	echo 'class="current"';
}

echo '>微信登录整合</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<form method="post" action="?">' . "\r\n" . '<input name="part" value="';
echo $part;
echo '" type="hidden">' . "\r\n";

if ($part == 'bbs') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">配置';
	echo $here;
	echo '</td></tr>' . "\r\n" . '<tr bgcolor="#ffffff" style="font-weight:bold">' . "\r\n" . '<td width="25%" style=" text-align:right;">' . "\r\n" . '选择整合服务:  &nbsp;&nbsp;' . "\r\n" . '</td>' . "\r\n" . '<td>' . "\r\n" . '<label for="none"><input name="passport_type" type="radio" class="radio" id="none" value="none" onclick=\'$obj("uc_div").style.display = "none";\' ';

	if ($selected == 'none') {
		echo 'checked';
	}

	echo '>不整合第三方论坛</label> ' . "\r\n" . '<label for="ucenter"><input class="radio" name="passport_type" type="radio" id="ucenter" value="ucenter" onclick=\'$obj("uc_div").style.display = "";$obj("client").innerHTML=$obj("server").innerHTML="ucenter";\' ';

	if ($selected == 'ucenter') {
		echo 'checked';
	}

	echo '>整合ucenter1.6</label>' . "\r\n" . '<label for="phpwind"><input class="radio" name="passport_type" type="radio" id="phpwind" value="phpwind" onclick=\'$obj("uc_div").style.display = "";$obj("client").innerHTML=$obj("server").innerHTML="phpwind";\' ';

	if ($selected == 'phpwind') {
		echo 'checked';
	}

	echo '>整合phpwind 8.x</label>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="uc_div" ';

	if ($selected == 'none') {
		echo 'style="display:none"';
	}

	echo '>' . "\r\n" . '<tr style="background-color:#f1f5f8;">' . "\r\n" . '  <td height=25 style="text-align:right"><b><span id="client">';
	echo $selected;
	echo '</span>应用设置：</b></td>' . "\r\n" . '  <td>&nbsp;</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height="25" style="text-align:right">服务端API URL：</td>' . "\r\n" . '  <td><input name="ucsettings[uc_api]" type=text id="uc_api" value="';
	echo $ucsettings[uc_api];
	echo '" class="text">' . "\r\n" . '  <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">通信密钥：</div>' . "\r\n" . '  </td>' . "\r\n" . '  <td><input name="ucsettings[uc_key]" type=text id="uc_key" value="';
	echo $ucsettings[uc_key];
	echo '" class="text">' . "\r\n" . '    <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n\t" . '<td height=25><div align="right">ucenter和mymps在：</div></td>' . "\r\n" . '    <td>      ' . "\r\n" . '    <select name="ucsettings[uc_connect]">' . "\r\n" . '        <option value="mysql" selected="selected"> 同一服务器 </option>' . "\r\n\t\t" . '<option value="NULL" selected="selected"> 不同服务器 </option>' . "\r\n" . '    </select>' . "\r\n" . '    <font color="red">*</font>    </td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">本地客户端应用ID：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_appid]" type=text id="uc_appid" value="';
	echo $ucsettings[uc_appid];
	echo '" class="text"> <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">本地客户端IP：</div>' . "\r\n" . '  </td>' . "\r\n" . '  <td><input name="ucsettings[uc_ip]" type=text id="uc_ip" value="';
	echo $ucsettings[uc_ip];
	echo '" class="text"></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr style="background-color:#f1f5f8;">' . "\r\n" . '  <td height=25 style="text-align:right"><b><span id="server">';
	echo $selected;
	echo '</span>数据库参数设置：</b></td>' . "\r\n" . '  <td>&nbsp;</td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">数据库主机名：</div>' . "\r\n" . '    </td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbhost]" type=text id="uc_dbhost" value="';
	echo $ucsettings[uc_dbhost];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font><div class="ttip"></div></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">数据库名：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbname]" type=text id="uc_dbname" value="';
	echo $ucsettings[uc_dbname];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">数据库用户名：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbuser]" type=text id="uc_dbuser" value="';
	echo $ucsettings[uc_dbuser];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">数据库密码：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbpwd]" type=password id="uc_dbpwd" value="';
	echo $ucsettings[uc_dbpwd];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">数据表前缀：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbpre]" type=text id="uc_dbpre" value="';
	echo $ucsettings[uc_dbpre];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">论坛的字符编码：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_charset]" type=text id="uc_charset" value="';
	echo $ucsettings[uc_charset];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">论坛数据库字符编码：</div></td>' . "\r\n" . '  <td><input name="ucsettings[uc_dbcharset]" type=text id="uc_dbcharset" value="';
	echo $ucsettings[uc_dbcharset];
	echo '" class="text">' . "\r\n" . '    <font color="red">*</font></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($part == 'qqlogin') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">配置QQ登录参数</td></tr>' . "\r\n" . '<tr bgcolor="#ffffff" style="font-weight:bold">' . "\r\n" . '<td width="25%" style=" text-align:right; background-color:#f7f7f7">' . "\r\n" . '是否开启QQ登录整合：' . "\r\n" . '</td>' . "\r\n" . '<td style="background-color:#f7f7f7">' . "\r\n" . '<label for="open"><input name="qqsettings[open]" type="radio" class="radio" id="open" value="1" onclick=\'$obj("qqdetail").style.display = "";\' ';

	if ($qqsettings['open'] == 1) {
		echo 'checked';
	}

	echo '>开启</label> ' . "\r\n" . '<label for="close"><input class="radio"  name="qqsettings[open]" type="radio" id="close" value="0" onclick=\'$obj("qqdetail").style.display = "none";\' ';

	if (!$qqsettings['open']) {
		echo 'checked';
	}

	echo '>关闭</label>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="qqdetail" ';

	if (!$qqsettings['open']) {
		echo 'style="display:none;"';
	}

	echo '>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25 width="25%" ><div align="right">参数一：</div></td>' . "\r\n" . '  <td><input name="qqsettings[appid]" type=text id="appid" value="';
	echo $qqsettings[appid];
	echo '" class="text">' . "\r\n" . '  <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">参数二：</div></td>' . "\r\n" . '  <td><input name="qqsettings[appkey]" type=text id="appkey" value="';
	echo $qqsettings[appkey];
	echo '" class="text">' . "\r\n" . '    <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n\t" . '<td height=25><div align="right">参数三：</div><div class="ttip"></div></td>' . "\r\n" . '    <td>      ' . "\r\n" . '    <input name="qqsettings[callback]" type=text id="callback" value="';
	echo $qqsettings[callback];
	echo '" class="text">' . "\r\n" . '    <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($part == 'wxlogin') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr"><td colspan="2">配置微信登录参数</td></tr>' . "\r\n" . '<tr bgcolor="#ffffff" style="font-weight:bold">' . "\r\n" . '<td width="25%" style=" text-align:right; background-color:#f7f7f7">' . "\r\n" . '是否开启微信登录整合：' . "\r\n" . '</td>' . "\r\n" . '<td style="background-color:#f7f7f7">' . "\r\n" . '<label for="open"><input name="wxsettings[open]" type="radio" class="radio" id="open" value="1" onclick=\'$obj("wxdetail").style.display = "";\' ';

	if ($wxsettings['open'] == 1) {
		echo 'checked';
	}

	echo '>开启</label> ' . "\r\n" . '<label for="close"><input class="radio"  name="wxsettings[open]" type="radio" id="close" value="0" onclick=\'$obj("wxdetail").style.display = "none";\' ';

	if (!$wxsettings['open']) {
		echo 'checked';
	}

	echo '>关闭</label>' . "\r\n" . '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="wxdetail" ';

	if (!$wxsettings['open']) {
		echo 'style="display:none;"';
	}

	echo '>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25 width="25%" ><div align="right">参数一：</div></td>' . "\r\n" . '  <td><input name="wxsettings[appid]" type=text id="appid" value="';
	echo $wxsettings[appid];
	echo '" class="text">' . "\r\n" . '  <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n" . '  <td height=25><div align="right">参数二：</div></td>' . "\r\n" . '  <td><input name="wxsettings[appsecret]" type=text id="appkey" value="';
	echo $wxsettings[appsecret];
	echo '" class="text">' . "\r\n" . '    <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '<tr bgcolor=#FFFFFF>' . "\r\n\t" . '<td height=25><div align="right">参数三：</div><div class="ttip"></div></td>' . "\r\n" . '    <td>      ' . "\r\n" . '    <input name="wxsettings[callback]" type=text id="callback" value="';
	echo $wxsettings[callback];
	echo '" class="text">' . "\r\n" . '    <font color="red"> *</font></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}

echo '<center><input type="submit" value="提 交" class="mymps large" name="passport_submit"/>  </center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

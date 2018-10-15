<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.vbm td li{ margin:10px 0!important;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=imgcode" ';

if ($part == 'imgcode') {
	echo 'class="current"';
}

echo '>验证码控制</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=checkask" ';

if ($part == 'checkask') {
	echo 'class="current"';
}

echo '>验证问答设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=badwords" ';

if ($part == 'badwords') {
	echo 'class="current"';
}

echo '>过滤设置</a></li>' . "\r\n\t\t\t\t" . '<li><a href="config.php?part=commentsettings" ';

if ($part == 'commentsettings') {
	echo 'class="current"';
}

echo '>评论点评设置</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>为了让系统有更强的兼容性，如果你的空间不支持GD库，请关闭相关页面的验证码显示</li>' . "\r\n" . ' <li>会员登录后发布信息和修改信息是不需要填写验证码的，这里无法对该功能修改</li>' . "\r\n" . ' <li>如需更换验证码背景图，可将你的jpg背景图替换，路径为<font color="#666">/images/authcode/background1.jpg</font>等jpg文件</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=imgcode" method="post">' . "\r\n" . '<input name="action" type="hidden" value="do_post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="2" align="left">启用验证码</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left" width="200">' . "\r\n" . '      ';

foreach (array('login' => '用户登录/login', 'register' => '用户注册/register', 'forgetpass' => '找回密码/forgetpass', 'post' => '游客发布信息/post', 'memberpost' => '会员发布信息/memberpost', 'adminlogin' => '后台管理员登录/adminlogin') as $key => $val ) {
	echo '        <li><label for="';
	echo $key;
	echo '"><input class="checkbox" type="checkbox" name="settingsnew[open][';
	echo $key;
	echo ']" value="1" id="';
	echo $key;
	echo '" ';

	if ($res[$key] == 1) {
		echo 'checked';
	}

	echo '>';
	echo $val;
	echo '</label></li>' . "\r\n\t" . '  ';
}

echo '       </td>' . "\r\n" . '      <td align="left" valign="top">' . "\r\n" . '      <div style="margin-top:20px; color:#999">' . "\r\n" . '验证码可以避免恶意注册及恶意发布信息主题，请选择需要打开验证码的操作。注意: 启用验证码会使得部分操作变得繁琐，建议仅在必需时打开<br /><br />' . "\r\n" . '<img src="../';
echo $mymps_global['cfg_authcodefile'];
echo '?action=preview" id="authcode" style="border:1px #ddd solid;"><br /><br />' . "\r\n" . '<a href="#" onClick="$obj(\'authcode\').src=$obj(\'authcode\').src+\'&\'">[刷新]</a>' . "\r\n\t" . '  </div>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td colspan="2" align="left">验证码类型</td>' . "\r\n" . '    </tr>' . "\r\n\t" . '<tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left" width="200">' . "\r\n" . '      ' . "\t";

foreach (array('engber' => '英文数字组合', 'english' => '纯英文', 'number' => '纯数字组合', 'plus' => '数字求和') as $key => $val ) {
	echo '           <li><label for="';
	echo $key;
	echo '"><input ';

	if ($key == 'plus') {
		echo 'onClick="$obj(\'show\').style.display=\'none\';"';
	}
	else {
		echo 'onClick="$obj(\'show\').style.display=\'\';"';
	}

	echo ' class="radio" type="radio" name="settingsnew[type]" value="';
	echo $key;
	echo '" ';

	if ($res[type] == $key) {
		echo 'checked';
	}

	echo ' id="';
	echo $key;
	echo '">';
	echo $val;
	echo '</label></li>' . "\r\n" . '        ';
}

echo "\t\t" . '<div class="clear"></div>' . "\r\n\t\t" . '</td>' . "\r\n" . '      <td align="left" valign="top">' . "\r\n" . '      <div style="margin-top:10px; color:#999">' . "\r\n" . '      ' . "\t" . '设置验证码的类型，经常的手工更换验证码类型，可有效防止注册机。<br /><br />' . "\r\n" . '选择随机所有类型，亦可有效杜绝注册机，发贴机' . "\r\n" . '      </div>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff" id="show" ';

if ($res['type'] == 'plus') {
	echo 'style="display:none;"';
}

echo '>' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>验证码字符显示数量</li>' . "\r\n" . '        <li><input name="settingsnew[number]" type="text" class="txt" value="';
echo $res['number'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">设置1-5之间<br>数值越大，防范注册机、发帖机效果越好</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>背景干扰点数值</li>' . "\r\n" . '        <li><input name="settingsnew[noise]" type="text" class="txt" value="';
echo $res['noise'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">数值越大背景出现的杂点越多，防范发贴机效果越好，但是给普通用户带来不便<br /><br />一般设为0-30之间，设置0则无杂点干扰</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>背景干扰斜线数值</li>' . "\r\n" . '        <li><input name="settingsnew[line]" type="text" class="txt" value="';
echo $res['line'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">设为0-3，设置3时防范发贴机效果较好但也会给普通用户带来不便，设置0则无斜线干扰</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>验证码倾斜值</li>' . "\r\n" . '        <li><input name="settingsnew[incline]" type="text" class="txt" value="';
echo $res['incline'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">设为0-50，设置50时防范发贴机效果最好但也会给普通用户带来不便，设置0则不倾斜</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>验证码扭曲值</li>' . "\r\n" . '        <li><input name="settingsnew[distort]" type="text" class="txt" value="';
echo $res['distort'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">设为0-10，设置10时防范发贴机效果最好但也会给普通用户带来不便，设置0则不扭曲</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#ffffff">' . "\r\n" . '    ' . "\t" . '<td> ' . "\r\n" . '        <li>验证码靠拢指数</li>' . "\r\n" . '        <li><input name="settingsnew[close]" type="text" class="txt" value="';
echo $res['close'];
echo '"></li>' . "\r\n" . '        </td>' . "\r\n" . '        <td><div style="margin-top:10px; color:#999">设为0-8，数值越大排列越紧密，设置8时防范发贴机效果最好但也会给普通用户带来不便，设置0则不靠拢</div></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" type="submit" > &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

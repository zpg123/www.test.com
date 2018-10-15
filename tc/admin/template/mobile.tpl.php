<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.vtop{ background-color:#ffffff}' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8; width:45%;}' . "\r\n" . '</style>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?" class="current">基本设置</a></li>' . "\r\n" . '                <li><a href="?type=nav">文字导航设置</a></li>' . "\r\n" . '                <li><a href="?type=nav_ico">图标导航设置(首页)</a></li>' . "\r\n" . '                <li><a href="?type=gg">幻灯片广告设置</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form method="post" action="?">' . "\r\n" . '<input type="hidden" name="type" value="';
echo $type;
echo '">' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr"><td colspan="2">手机版全局设置</td></tr>' . "\r\n" . '    <tbody style="display: yes; background-color:white">' . "\r\n" . '        <tr>' . "\r\n" . '            <td class="altbg1" ><b>开启手机版:</b><br /><span class="smalltxt">开启本功能，用户将能访问手机版</span></td><td class="altbg2">' . "\r\n\t\t\t" . '<label for="allowmobile1"><input class="radio" type="radio" name="settings[allowmobile]" value="1" id="allowmobile1" onclick="$(\'hidden_settings_mobile\').style.display = \'\';" ';

if ($mobile[allowmobile] == 1) {
	echo 'checked';
}

echo '> 是</label> &nbsp; &nbsp; ' . "\r\n" . '            <label for="allowmobile0"><input class="radio" type="radio"  name="settings[allowmobile]" value="0" id="allowmobile0" onclick="$(\'hidden_settings_mobile\').style.display = \'none\';" ';

if (empty($mobile[allowmobile])) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n" . '            </td>' . "\r\n" . '        </tr>' . "\r\n" . '    <tbody>' . "\r\n" . '    <tbody id="hidden_settings_mobile" style="background-color:white;';

if (empty($mobile[allowmobile])) {
	echo 'display:none;';
}

echo '">' . "\r\n\t\t" . '<!--<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>开启手机浏览器自动跳转:</b><br /><span class="smalltxt">开启后用户使用手机浏览器访问网站功能页以外页面时自动跳转到网站首页进行访问。</span></td><td class="altbg2"><label for="autorefresh1"><input class="radio" type="radio" name="settings[autorefresh]" value="1" id="autorefresh1" ';

if ($mobile[autorefresh] == 1) {
	echo 'checked';
}

echo '> 是</label> &nbsp; &nbsp; ' . "\r\n\t\t\t" . '<label for="autorefresh0"><input class="radio" type="radio"  name="settings[autorefresh]" value="0" id="autorefresh0" ';

if (empty($mobile[autorefresh])) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>-->' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>是否允许手机版注册:</b><br /><span class="smalltxt">是否开启手机版注册功能，手机注册不会对用户栏目中的注册页必填项进行检测<br />请谨慎开启</span></td><td class="altbg2"><label for="register1"><input class="radio" type="radio" name="settings[register]" value="1" id="register1" ';

if ($mobile[register] == 1) {
	echo 'checked';
}

echo '> 是</label> &nbsp; &nbsp; ' . "\r\n\t\t\t" . '<label for="register0"><input class="radio" type="radio"  name="settings[register]" value="0" id="register0" ';

if (empty($mobile[register])) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>是否允许手机版发布信息:</b><br /><span class="smalltxt">是否开启手机版发布信息功能<br />请谨慎开启</span></td><td class="altbg2"><label for="post1"><input class="radio" type="radio" name="settings[post]" value="1" id="post1" ';

if ($mobile[post] == 1) {
	echo 'checked';
}

echo '> 是</label> &nbsp; &nbsp; ' . "\r\n\t\t\t" . '<label for="post0"><input class="radio" type="radio"  name="settings[post]" value="0" id="post0" ';

if (empty($mobile[post])) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>每页显示主题数:</b><br /><span class="smalltxt">主题列表页每页显示主题个数，推荐值为10</span></td><td class="altbg2"><input name="settings[mobiletopicperpage]" value="';
echo $mobile[mobiletopicperpage] ? $mobile[mobiletopicperpage] : 10;
echo '" type="text" class="txt"   />' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>手机版访问域名:</b><br /><span class="smalltxt">如http://wap.mymps.com.cn<br />需将您指定的二级域名绑定/wap目录</span></td><td class="altbg2"><input name="settings[mobiledomain]" type="text" class="text" value="';
echo $mobile[mobiledomain];
echo '"/>' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>' . "\r\n" . '        <!--<tr>' . "\r\n\t\t\t" . '<td class="altbg1" ><b>手机版logo路径:</b><br /><span class="smalltxt">默认<font color="red">/logowap.png</font><br />建议尺寸111*26<br /><font color="blue">如没有可留空</font></span></td><td class="altbg2"><input name="settings[mobilelogo]" type="text" class="text" value="';
echo $mobile[mobilelogo];
echo '"/>' . "\r\n\t\t\t" . '</td>' . "\r\n\t\t" . '</tr>-->' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

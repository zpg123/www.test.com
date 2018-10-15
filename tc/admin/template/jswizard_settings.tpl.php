<?php

include mymps_tpl('inc_head');
echo '<style>' . "\r\n" . '.smalltxt{ font-size:12px!important; color:#999!important; font-weight:100!important}' . "\r\n" . '.altbg1{ background-color:#f1f5f8}' . "\r\n" . '</style>' . "\r\n" . '<script language="javascript" src="js/vbm.js"></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style=" padding-bottom:0">' . "\r\n" . '    <div class="mpstopic-category">' . "\r\n" . '        <div class="panel-tab">' . "\r\n" . '            <ul class="clearfix tab-list">' . "\r\n" . '                <li><a href="?part=settings" class="current">基本设置</a></li>' . "\r\n" . '                <li><a href="?">调用项目管理</a></li>' . "\r\n" . '            </ul>' . "\r\n" . '        </div>' . "\r\n" . '    </div>' . "\r\n" . '</div>' . "\r\n" . '<form method="post" action="?">' . "\r\n" . '<input name="return_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr"><td colspan="2">数据调用</td></tr>' . "\r\n" . '    <tbody style="display: yes; background-color:white">' . "\r\n" . '        <tr>' . "\r\n" . '            <td width="45%" class="altbg1" ><b>启用外部调用:</b><br /><span class="smalltxt">外部调用将使得您可以将';
echo $mymps_global['SiteName'];
echo '最新分类信息主题、排行等资料嵌入到您的普通网页中，访问者无需访问';
echo $mymps_global['SiteName'];
echo '即可获知';
echo $mymps_global['SiteName'];
echo '最近更新的情况</span></td><td class="altbg2"><label for="1"><input class="radio" type="radio" name="settingsnew[jsstatus]" value="1" id="1" ';

if ($settings[jsstatus] == 1) {
	echo 'checked';
}

echo ' ' . "\r\n" . '            onclick="$Obj(\'hidden_settings_jsstatus\').style.display = \'\';" > 是</label> &nbsp; &nbsp; ' . "\r\n" . '            <label for="0"><input class="radio" type="radio" name="settingsnew[jsstatus]" value="0" id="0" onclick="$Obj(\'hidden_settings_jsstatus\').style.display = \'none\';" ';

if ($settings[jsstatus] == 0) {
	echo 'checked';
}

echo '> 否</label>' . "\r\n" . '            </td>' . "\r\n" . '        </tr>' . "\r\n" . '    <tbody>' . "\r\n" . '    <tbody id="hidden_settings_jsstatus" style="background-color:white; ';

if ($settings[jsstatus] == 0) {
	echo 'display:none;';
}

echo '">' . "\r\n" . '    <tr>' . "\r\n" . '        <td width="45%" class="altbg1" ><b>数据调用缓存时间(秒):</b><br /><span class="smalltxt">由于一些排序检索操作比较耗费资源，数据调用程序采用缓存技术来实现数据的定期更新，默认值 1800，建议设置为 900 的数值，0 为不缓存(极耗费系统资源)</span></td><td class="altbg2"><input type="text" size="50" name="settingsnew[jscachelife]" value="';
echo $settings[jscachelife];
echo '" class="text">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '        <td width="45%" class="altbg1" ><b>外部调用数据日期格式:</b><br />' . "\r\n" . '        <span class="smalltxt">使用 Y 表示年，m 表示月，d 表示天。如 Y/m/d 表示 2010/12/31</span></td><td class="altbg2"><input type="text" size="50" name="settingsnew[jsdateformat]" value="';
echo $settings[jsdateformat];
echo '" class="text">' . "\r\n" . '        </td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr>' . "\r\n" . '        <td width="45%" class="altbg1" valign="top"><b>外部调用数据来路限制:</b><br /><span class="smalltxt">为了避免其它网站非法调用';
echo $mymps_global['SiteName'];
echo '数据，加重您的服务器负担，您可以设置允许调用';
echo $mymps_global['SiteName'];
echo '数据的来路域名列表，只有在列表中的域名和网站，才能调用您';
echo $mymps_global['SiteName'];
echo '的信息。每个域名一行，不支持通配符，请勿包含 http:// 或其它非域名内容，留空为不限制来路，即任何网站均可调用</span></td>' . "\r\n" . '        <td class="altbg2"><textarea  rows="6" name="settingsnew[jsrefdomains]" id="settingsnew[jsrefdomains]" cols="50">';
echo $settings[jsrefdomains];
echo '</textarea></td></tr>' . "\r\n" . '    </tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input class="mymps large" value="提 交" name="';
echo CURSCRIPT;
echo '_submit" type="submit"></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

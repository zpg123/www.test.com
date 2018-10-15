<?php

define('IN_MYMPS', true);
$charset = 'utf-8';
$dbcharset = 'utf8';
require_once dirname(__FILE__) . '/global.php';
require_once dirname(__FILE__) . '/../include/global.php';
require_once dirname(__FILE__) . '/../include/cache.fun.php';
chk_mymps_install();
$step = (isset($_GET['step']) ? intval($_GET['step']) : '');
$step = ($step ? $step : '1');
$installinfo = '欢迎来到 <font class="softname">' . MPS_SOFTNAME . '</font> <font class="version">' . MPS_VERSION . '</font> 安装向导，安装前请仔细阅读安装说明后才开始安装。安装文件夹里同样提供了有关软件安装的说明，请您仔细阅读。<div style="margin-top:.5em">安装过程中遇到任何问题 &nbsp;<a href="' . MPS_BBS . '" target="_blank" class="black"><u><b>请到官方讨论区寻求帮助</b></u></a></div>';

if ($step == '1') {
	$info = '阅读安装协议';
	include mymps_tpl('inc_head');
	$licence = openfile('../licence.txt');
	echo '<div class="agreement">' . "\r\n";
	echo $licence;
	echo '</div>' . "\r\n" . '<div class="c"></div>' . "\r\n" . '<div id="content">' . "\r\n\r\n" . '<div class="wrapD">' . "\r\n" . '<div class="wrapE">' . "\r\n" . '<div class="c"></div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="stepbt">' . "\r\n" . '<strong class="last">请务必认真阅读软件安装协议</strong>' . "\r\n" . '<input style="cursor:pointer;" class="next mymps large" type="button" onclick="location.href=\'?step=2\'" value="同意协议，进入下一步">' . "\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n";
}
else if ($step == '2') {
	$info = '阅读使用说明';
	include mymps_tpl('inc_head');
	$licence = openfile('../readme.txt');
	echo '<div class="agreement">' . "\r\n";
	echo $licence;
	echo '</div>' . "\r\n" . '<div class="c"></div>' . "\r\n" . '<div id="content">' . "\r\n\r\n" . '<div class="wrapD">' . "\r\n" . '<div class="wrapE">' . "\r\n" . '<div class="c"></div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="stepbt">' . "\r\n" . '<input type="button" onclick="javascript:history.go(-1);" class="mymps large last" value="上一步：阅读安装协议">' . "\r\n" . '<input style="cursor:pointer;" class="next mymps large" type="button" onclick="location.href=\'?step=3\'" value="进入下一步">' . "\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n\r\n";
}
else if ($step == '3') {
	$info = '检测系统环境';
	$phpv = @phpversion();
	$sp_server = $_SERVER['SERVER_SOFTWARE'];
	$sp_name = $_SERVER['SERVER_NAME'];
	$short_open_tag = (ini_get('short_open_tag') ? '<font color=green>支持</font>' : '<font color=red>请修改php.ini，short_open_tag=On，否则无法安装</font>');
	$disabled = (ini_get('short_open_tag') ? '' : 'disabled="disabled"');
	require_once MYMPS_DATA . '/sp_testdirs.php';
	include mymps_tpl('inc_head');
	echo '<div class="c"></div>' . "\r\n" . '<div id="content">' . "\r\n" . '  <div class="wrapD">' . "\r\n\t" . '<div class="wrapE">' . "\r\n" . '<div class="boxA">' . "\r\n\t\t" . '<div style="width:57%; float:left">' . "\r\n\t\t" . '  <h3>检测系统环境</h3>' . "\r\n" . '<table class="dlA">' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td width="130">服务器域名</td>' . "\r\n\t\t\t\t" . '<td>';
	echo $sp_name;
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td>服务器操作系统</td>' . "\r\n\t\t\t\t" . '<td>';
	echo defined('PHP_OS') ? PHP_OS : ' ';
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td>服务器解译引擎</td>' . "\r\n\t\t\t\t" . '<td>';
	echo $sp_server;
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td>PHP程式版本</td>' . "\r\n\t\t\t\t" . '<td>';
	echo $phpv;
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td>mymps路径</td>' . "\r\n\t\t\t\t" . '<td>';
	echo MYMPS_ROOT;
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t\t\t" . '<td>短标记支持</td>' . "\r\n\t\t\t\t" . '<td>';
	echo $short_open_tag;
	echo '</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t" . '</table>' . "\r\n\t\t" . '</div>' . "\r\n\t\t" . '<div style="margin-left:56%">' . "\r\n\t\t" . '  <h3>检查目录可写</h3>' . "\r\n" . '          <div style="margin-top:20px;">' . "\r\n\t\t" . '  ';
	include MYMPS_TPL . '/box/sp_testdirs.html';
	echo "\t\t" . '  </div>' . "\r\n\t\t" . '</div>' . "\r\n\t\t\r\n\t" . '  </div>' . "\r\n\t" . '  <div class="c"></div>' . "\r\n" . '      <br />' . "\r\n\t" . '</div>' . "\r\n" . '  </div>' . "\r\n" . '  <div class="stepbt">' . "\r\n\t" . '<input type="button" onclick="javascript:history.go(-1);" class="mymps large last" value="上一步：阅读使用说明">' . "\r\n\t" . '<input style="cursor:pointer;" class="next mymps large" type="button" onclick="location.href=\'?step=4\'" value="进入下一步" ';
	echo $disabled;
	echo '>' . "\r\n" . '        </button>' . "\r\n" . '  </div>' . "\r\n\r\n" . '</div>' . "\r\n\r\n\t" . '  </div>' . "\r\n";
}
else if ($step == '4') {
	$info = '填写数据库信息';
	include mymps_tpl('inc_head');
	echo '<div class="c"></div>' . "\r\n" . '<script language="JavaScript">' . "\r\n" . 'function $obj(id) {' . "\r\n\t" . 'return document.getElementById(id);' . "\r\n" . '}' . "\r\n" . 'function postcheck(){' . "\r\n\t" . 'if(document.install.db_host.value==""){' . "\r\n\t\t" . 'alert(\'数据库服务器不能为空\');' . "\r\n\t\t" . 'document.install.db_host.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.install.db_user.value=="") {' . "\r\n\t\t" . 'alert(\'数据库用户名不能为空\');' . "\r\n\t\t" . 'document.install.db_user.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (document.install.db_name.value=="") {' . "\r\n\t\t" . 'alert(\'数据库名不能为空\');' . "\r\n\t\t" . 'document.install.db_name.focus();' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'if (!document.install.db_pass.value && !confirm(\'你填的数据库密码为空，是否使用空的数据库密码\')) {' . "\r\n\t\t" . 'return false;' . "\r\n\t" . '}' . "\r\n\t" . 'document.install.mymps.disabled=true;' . "\r\n\t" . 'document.install.mymps.value="安装中...";' . "\r\n\t" . 'return true;' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n" . '<div id="content">' . "\r\n" . '<form name="install" action="index.php?step=5" method="post" onsubmit="return postcheck();">' . "\r\n" . '  <div class="wrapD">' . "\r\n\t" . '<div class="wrapE">' . "\r\n\t" . '  <div class="boxA">' . "\r\n\t\t" . '<div style="width:57%; float:left">' . "\r\n\t\t" . '  <h3>填写数据库信息</h3>' . "\r\n\t\t" . '  <table class="dlA">' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>数据库服务器</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="db_host" value="localhost" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>数据库用户名</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="db_user" value="" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>数据库密码</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="db_pass" value="" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>数据库名</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="db_name" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td height="18">数据表区分前缀(如非必要.<b>请保持默认</b>)</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="db_mymps" value="my_" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t" . '  </table>' . "\r\n\t\t" . '</div>' . "\r\n\t\t" . '<div style="margin-left:56%">' . "\r\n\t\t" . '  <h3>填写网站创始人信息</h3>' . "\r\n\t\t" . '  <table class="dlA dlB">' . "\r\n\t\t\t" . '<tbody id="showadmin">' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>用户名</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="manager" class="inputA" /> 系统登录名</td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>密码</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="manager_pass" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td>确认密码</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="manager_chkpass" class="inputA" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '<tr>' . "\r\n\t\t\t" . '  <td height="18">Email</td>' . "\r\n\t\t\t" . '  <td><input type="text" name="email" class="inputA" value="" /></td>' . "\r\n\t\t\t" . '</tr>' . "\r\n\t\t\t" . '</tbody>' . "\r\n\t\t" . '  </table>' . "\r\n\t\t" . '</div>' . "\r\n\t\t\r\n\t" . '  </div>' . "\r\n\t" . '  <div class="c"></div>' . "\r\n\t" . '</div>' . "\r\n" . '  </div>' . "\r\n" . '  <div class="c"></div>' . "\r\n" . '  <div class="wrapCC">' . "\r\n" . '  ' . "\t" . '<table cellpadding="0" cellspacing="0" class="wrapCC_table">' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">cookie加密前缀(如非必要.<b>请保持默认</b>)</td>' . "\r\n\t\t" . '  <td><input type="text" name="cookiepre" value="';
	echo random(4) . '_';
	echo '" class="inputB" /></td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">cookiedomain(如非必要.<b>请保持默认</b>)</td>' . "\r\n\t\t" . '  <td><input type="text" name="cookiedomain" value="';
	echo !in_array($_SERVER['SERVER_NAME'], array('127.0.0.1', 'localhost')) ? str_replace('www', '', $_SERVER['SERVER_NAME']) : '';
	echo '" class="inputB" /></td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">cookiepath(如非必要.<b>请保持默认</b>)</td>' . "\r\n\t\t" . '  <td><input type="text" name="cookiepath" value="/" class="inputB" /></td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装分类信息栏目分类?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installcategory" checked="checked"/>建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装分类信息模型数据?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installinfomodel" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装默认广告数据?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installadv" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装优惠券分类?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installcoupon" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装团购分类?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installgroup" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装商品分类?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installgoods" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t\t" . '<tr>' . "\r\n\t\t" . '  <td height="18">安装商家行业分类?</td>' . "\r\n\t\t" . '  <td><input type="checkbox" name="installcorp" checked="checked"/> 建议安装</td>' . "\r\n\t\t" . '</tr>' . "\r\n\t" . '</table>' . "\r\n" . '  </div>' . "\r\n" . '  <div class="stepbt">' . "\r\n\t" . '<input type="button" onclick="javascript:history.go(-1);" class="mymps large last" value="上一步：检测系统环境">' . "\r\n\t\t" . '<input style="cursor:pointer;" class="next mymps large" type="submit" value="进入下一步" name="mymps" id="mymps"></button>' . "\r\n" . '  </div>' . "\r\n" . '</form>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";
}
else if ($step == '5') {
	@set_time_limit(0);
	$db_host = trim($_POST['db_host']);
	$db_user = trim($_POST['db_user']);
	$db_pass = trim($_POST['db_pass']);
	$db_name = trim($_POST['db_name']);
	$db_mymps = trim($_POST['db_mymps']);
	$admin = trim($_POST['manager']);
	$password = trim($_POST['manager_pass']);
	$repassword = trim($_POST['manager_chkpass']);
	$email = trim($_POST['email']);
	$in_type = trim($_POST['install_type']);
	!$db_host && write_msg('未填写数据库服务器地址。');
	!$db_user && write_msg('未填写数据库服务器用户名。');
	!$db_name && write_msg('未填写数据库名称。');
	(!$db_mymps || strstr($db_mymps, '.')) && write_msg('您指定的数据表前缀包含点字符，请返回修改。');
	!$admin && write_msg('未填写创始人登录用户名。');
	!$password && write_msg('未填写创始人管理密码。');
	!$repassword && write_msg('未填写重复密码。');
	($password != $repassword) && write_msg('两次输入的密码不一致。');
	$conn = @mysql_connect($db_host, $db_user, $db_pass);
	($conn === false) && write_msg('安装失败！请检查数据库用户名以及数据库密码是否正确。');
	mysql_connect($db_host, $db_user, $db_pass);
	$cur_os = PHP_OS;
	$cur_phpversion = PHP_VERSION;
	($cur_phpversion < '4.3.0') && write_msg('您的PHP版本低于4.3.0, 无法安装使用 ' . MPS_SOFTNAME . '<br />');
	$cur_mysqlversion = mysql_get_server_info();
	($cur_mysqlversion < '3.23') && write_msg('您的MySQL版本低于3.23, 由于程序没有经过此平台的测试, 建议您换 MySQL4 的数据库服务器.<br />');
	$yes = mysql_select_db($db_name);

	if ($yes === false) {
		$sql = ('4.1' <= $mysql_version ? 'CREATE DATABASE ' . $db_name . ' DEFAULT CHARACTER SET ' . $dbcharset : 'CREATE DATABASE ' . $db_name);
		(mysql_query($sql, $conn) === false) && write_msg('无法创建数据库,请检查相关参数是否正确。');
	}

	@mysql_close($conn);
	$files = '<?php' . "\n\n";
	$files .= '$charset    = "' . $charset . '";' . "\n\n";
	$files .= '//系统字符集编码' . "\n\n";
	$files .= '$dbcharset = "' . $dbcharset . '";' . "\n\n";
	$files .= '//数据库字符集编码' . "\n\n";
	$files .= '$db_host    = "' . $db_host . '";' . "\n\n";
	$files .= '//数据库服务器地址，一般为localhost' . "\n\n";
	$files .= '$db_name    = "' . $db_name . '";' . "\n\n";
	$files .= '//使用的数据库名称' . "\n\n";
	$files .= '$db_user    = "' . $db_user . '";' . "\n\n";
	$files .= '//数据库帐号' . "\n\n";
	$files .= '$db_pass    = "' . $db_pass . '";' . "\n\n";
	$files .= '//数据库密码' . "\n\n";
	$files .= '$db_mymps   = "' . $db_mymps . '";' . "\n\n";
	$files .= '//数据库前缀' . "\n\n";
	$files .= '$db_intype  = "' . $in_type . '";' . "\n\n";
	$files .= '$cookiepre = "' . $cookiepre . '";' . "\n\n";
	$files .= '//cookies加密前缀' . "\n\n";
	$files .= '$cookiedomain = "' . $cookiedomain . '";' . "\n\n";
	$files .= '$cookiepath = "' . $cookiepath . '";' . "\n\n";
	$files .= '?>';
	$file = @fopen(MYMPS_DATA . '/config.db.php', 'wb+');
	!$file && write_msg('无法打开数据库配置文件 /config.db.php');

	if (!@fwrite($file, trim($files))) {
		write_msg('无法写入配置文件 config.db.php');
		exit();
	}

	@fclose($file);
	require_once MYMPS_INC . '/db.class.php';

	if ($install = import(MYMPS_ROOT . '/install/install.sql', $db_mymps, $dbcharset)) {
		if ($installarea) {
			import(MYMPS_ROOT . '/install/install_area.sql', $db_mymps, $dbcharset);
		}

		if ($installcategory) {
			import(MYMPS_ROOT . '/install/install_category.sql', $db_mymps, $dbcharset);
		}

		if ($installcoupon) {
			import(MYMPS_ROOT . '/install/install_coupon.sql', $db_mymps, $dbcharset);
		}

		if ($installgroup) {
			import(MYMPS_ROOT . '/install/install_group.sql', $db_mymps, $dbcharset);
		}

		if ($installgoods) {
			import(MYMPS_ROOT . '/install/install_goods.sql', $db_mymps, $dbcharset);
		}

		if ($installcorp) {
			import(MYMPS_ROOT . '/install/install_corp.sql', $db_mymps, $dbcharset);
		}

		if ($installadv) {
			import(MYMPS_ROOT . '/install/install_adv.sql', $db_mymps, $dbcharset);
		}

		if ($installinfomodel) {
			import(MYMPS_ROOT . '/install/install_infomodel.sql', $db_mymps, $dbcharset);
		}
		else {
			$db->query('INSERT INTO `my_info_typemodels` (`id`, `name`, `displayorder`, `type`, `options`) VALUES' . "\r\n" . '(1, \'空模型\', 0, 1, \'\');');
		}

		$password = md5($password);
		$now_domain = get_inurl();
		$db->query('INSERT INTO `' . $db_mymps . 'admin` (userid,uname,pwd,email,typeid) VALUES (\'' . $admin . '\',\'' . $admin . '\',\'' . $password . '\',\'' . $email . '\',\'1\')');
		$db->query('UPDATE `' . $db_mymps . 'config` SET value = \'blue\' WHERE description = \'cfg_tpl_dir\'');
		$db->query('UPDATE `' . $db_mymps . 'config` SET value = \'' . $now_domain . '\' WHERE description = \'SiteUrl\'');
		update_config_cache();
		write_lock();
		$step = '!';
		$info = '完成安装';
		$mymps_install_success_info = '恭喜，您的 ' . MPS_SOFTNAME . '分类信息系统 ' . MPS_VERSION . ' 已经安装成功！';
		include mymps_tpl('inc_head');
		echo '<div class="c"></div>' . "\r\n" . '<div id="content">' . "\r\n\r\n" . '<div class="wrapD">' . "\r\n" . '<div class="wrapE">' . "\r\n" . '<div class="boxB">' . "\r\n" . '<div class="cgLeft"></div>' . "\r\n" . '<div class="cg" style="margin-left:35%">' . "\r\n" . '  <h1>';
		echo $mymps_install_success_info;
		echo '</h1>' . "\r\n" . '  <ul class="listA">' . "\r\n" . '    <li>系统前台地址 ： <a href="';
		echo $now_domain;
		echo '/index.php" target="_blank" style="color:#000">';
		echo $now_domain;
		echo '/index.php</a></li>' . "\r\n" . '    <li>系统后台地址 ： <a href="';
		echo $now_domain;
		echo '/admin/index.php?go=config" target="_blank" style="color:#000">';
		echo $now_domain;
		echo '/admin/index.php</a></li>' . "\r\n" . '    <li>';
		echo MPS_SOFTNAME;
		echo '官方论坛 ： <a href="';
		echo MPS_BBS;
		echo '" target="_blank" style="color:#000">';
		echo MPS_BBS;
		echo '</a></li>' . "\r\n" . '  </ul>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="c"></div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div class="stepbt"><input type="button" class="next mymps mini" onClick="closewindows();" value="关闭窗口"></div>' . "\r\n" . '<script language="JavaScript">' . "\r\n" . 'function closewindows(){' . "\r\n" . 'var agt = navigator.userAgent.toLowerCase();' . "\r\n" . 'var is_ie = ((agt.indexOf("msie") != -1) && (agt.indexOf("opera") == -1));' . "\r\n" . 'if (is_ie) {' . "\r\n" . 'var ieversion = parseFloat(agt.substring(agt.indexOf("msie")+5,agt.indexOf(\';\',agt.indexOf("msie"))));' . "\r\n" . 'if (ieversion < 5.5) {' . "\r\n" . '    var str  = \'<object id="notipclose" classid="clsid:adb880a6-d8ff-11cf-9377-00aa003b7a11"><param name="command" value="close"></object>\';' . "\r\n" . '    document.body.insertadjacenthtml(beforeend,str);' . "\r\n" . '    document.all.notipclose.click();' . "\r\n" . '} else {' . "\r\n" . '    window.opener = null;' . "\r\n" . '    window.close();' . "\r\n" . '}' . "\r\n" . '} else {' . "\r\n" . 'window.close();' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '</script>' . "\r\n\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n";
	}
	else {
		write_msg('您的' . MPS_SOFTNAME . '安装失败！');
	}
}

include mymps_tpl('inc_foot');

?>

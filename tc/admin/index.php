<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
ini_set("display_errors", 1);

$do = (isset($_GET['do']) ? htmlspecialchars(trim($_GET['do'])) : 'login');
$go = (isset($_GET['go']) ? htmlspecialchars(trim($_GET['go'])) : 'mymps_right');
$part = (isset($_GET['part']) ? htmlspecialchars(trim($_GET['part'])) : 'default');

switch ($do) {
case 'login':
	define(CURSCRIPT, 'admin_login');
	define('IN_MYMPS', true);
	include './../include/global.php';
	include './../data/config.php';
	require_once MYMPS_DATA . '/config.db.php';
	require_once MYMPS_INC . '/db.class.php';
	require_once MYMPS_INC . '/admin.class.php';
	@include MYMPS_DATA . '/caches/authcodesettings.php';
	$authcodesettings = $data;
	$data = NULL;
	$url = trim($url);

	if ($part == 'chk') {
		$db->query('DELETE FROM `' . $db_mymps . 'member` WHERE openid != \'\' AND userid != \'\' AND userpwd = \'\'');
		$url = ($url ? $url : 'index.php?do=manage&go=' . $go);
		if (($authcodesettings['adminlogin'] == 1) && !$randcode = mymps_chk_randcode($checkcode)) {
			write_msg('验证码输入错误，请返回重新输入');
		}

		$username = trim($username);
		$password = trim($password);
		$pubdate = ($timestamp ? $timestamp : time());
		$ip = GetIP();
		$row = $db->getRow('SELECT id,userid,pwd,uname FROM ' . $db_mymps . 'admin WHERE userid=\'' . $username . '\' AND pwd=\'' . md5($password) . '\'');

		if ($row) {
			$admin_id = $row['userid'];
			$admin_name = $row['uname'];
			$mymps_admin->mymps_admin_login($admin_id, $admin_name);
			$db->query('UPDATE ' . $db_mymps . 'admin SET loginip=\'' . $ip . '\',logintime=\'' . $pubdate . '\' WHERE userid=\'' . $row['userid'] . '\'');
			$db->query('INSERT INTO `' . $db_mymps . 'admin_record_login` (id,adminid,adminpwd,pubdate,ip,result) VALUES (\'\',\'' . $username . '\',\'' . md5($password) . '\',\'' . $pubdate . '\',\'' . $ip . '\',\'1\')');
			write_msg($admin_name . '您已成功登陆系统管理中心', $url);
		}
		else {
			$db->query('INSERT INTO `' . $db_mymps . 'admin_record_login` (id,adminid,adminpwd,pubdate,ip,result) VALUES (\'\',\'' . $username . '\',\'' . $password . '\',\'' . $pubdate . '\',\'' . $ip . '\',\'0\')');
			write_msg('您输入的用户名或密码错误，请返回重新输入');
		}
	}
	else if ($part == 'out') {
		define('IN_MYMPS', true);
		$mymps_admin->mymps_admin_logout();
		write_msg('您已经安全退出系统管理中心', 'index.php');
	}
	else if ($part == 'default') {
		define('IN_MYMPS', true);
		$url = trim($_GET['url']);

		if ($mymps_admin->mymps_admin_chk_getinfo()) {
			write_msg('', 'index.php?do=manage');
		}
		else {
			include mymps_tpl('login');
		}
	}
	else {
		define('IN_MYMPS', true);
		write_msg('', 'index.php?do=manage');
	}

	break;

case 'manage':
	require_once dirname(__FILE__) . '/global.php';

	if ($part == 'left') {
		require_once dirname(__FILE__) . '/include/mymps.menu.inc.php';
		$part = trim($_GET['part']);
		$part = ($part ? $part : 'info');
		$mymps_admin_menu = mymps_admin_menu('left');
		include mymps_tpl('admin_left');
	}
	else if ($part == 'default') {
		include mymps_tpl('admin_default');
	}
	else if ($part == 'top') {
		require_once dirname(__FILE__) . '/include/mymps.menu.inc.php';
		$mymps_admin_menu = mymps_admin_menu('top');
		$admindir = getcwdOL();
		$level = get_admin_type();
		include mymps_tpl('admin_top');
	}
	else if ($part == 'right') {
		$go = trim($_GET['go']);
		require_once MYMPS_INC . '/db.class.php';
		require_once MYMPS_DATA . '/config.inc.php';
		require_once dirname(__FILE__) . '/include/mymps.count.inc.php';


		foreach ($ele as $w => $v ) {
			$mymps_count_str .= ($w == 'siteabout' ? '<div class="clear"></div>' : '');
			$mymps_count_str .= '<div class="countsquare">' . "\r\n\t\t\t\t" . '<div class="ab">' . "\r\n\t\t\t\t";

			foreach ($element[$w] as $k => $u ) {
				$mymps_count_str .= '<div class="b">';
				$mymps_count_str .= ($u[where] ? '<a href="#" onclick="parent.framRight.location=\'' . $u['url'] . '\';">' . $k . '<br><div class="c">' . mymps_count($u[table], $u[where]) . '</div></a>' : '<a href="#" onclick="parent.framRight.location=\'' . $u['url'] . '\';">' . $k . '<br><div class="c">' . mymps_count($u[table]) . '</div></a>');
				$mymps_count_str .= '</div>';
			}

			$mymps_count_str .= '</div>' . "\r\n\t\t\t\t" . '<div class="a">' . $v . '</div>' . "\r\n\t\t\t\t" . '</div>';
		}

		require_once dirname(__FILE__) . '/include/wel.inc.php';

		foreach ($welcome as $k => $value ) {
			$mymps_welcome_str .= '<tr bgcolor="#f5fbff"><td width="15" bgcolor="#F6FBFF" style="">' . $k . '</td><td bgcolor="white" style="padding:15px;" class="other">' . $value . '</td></tr>';
		}

		$here = '系统管理首页';
		echo mymps_admin_tpl_global_head($go);
		include mymps_tpl('admin_index');
		unset($ele);
		unset($element);
		echo mymps_admin_tpl_global_foot();
	}

	break;

case 'power':
	require_once dirname(__FILE__) . '/global.php';
	require_once MYMPS_INC . '/member.class.php';
	$s_uid = trim($_GET['userid']);
	$s_pwd = trim($_GET['password']);
	$member_log->in($s_uid, $s_pwd, 'off', $url);
	break;

default:
	define('IN_MYMPS', true);
	write_msg('未知错误，请重新登录后台操作', 'index.php?do=login&part=out');
	break;
}

is_object($db) && $db->Close();
$db = $mymps_global = $part = $action = $here = NULL;

?>

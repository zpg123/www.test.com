<?php

error_reporting(32767 ^ 8);
@header('Content-Type: text/html; charset=utf-8');

if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set('Hongkong');
}

define('IN_MYMPS', true);
define('WXLOGIN', 1);
define('WXLOGINDIR', dirname(__FILE__));
@define('MYMPS_ROOT', ereg_replace('[/\\]{1,}', '/', substr(WXLOGINDIR, 0, -15)));
define('MYMPS_DATA', MYMPS_ROOT . '/data');
define('MYMPS_INC', MYMPS_ROOT . 'include');
require_once MYMPS_DATA . '/config.php';
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
require_once MYMPS_INC . '/common.fun.php';
require_once MYMPS_INC . '/openlogin.fun.php';
require_once MYMPS_INC . '/cache.fun.php';
require_once MYMPS_ROOT . '/member/include/common.func.php';
$timestamp = time();

if (!pcclient()) {
	$_GET['mod'] = 'm';
}
else {
	$_GET['mod'] = 'pc';
}

session_save_path(MYMPS_DATA . '/sessions');
$code = (isset($_GET['code']) ? trim(htmlspecialchars($_GET['code'])) : '');
$actionkey = (isset($_GET['actionkey']) ? trim(htmlspecialchars($_GET['actionkey'])) : '');
$data = read_static_cache('wxlogin');
$appid = $data['appid'];
$appsecret = $data['appsecret'];
$callback = $data['callback'];
$scope = 'snsapi_userinfo';
$state = 'mymps';
$json_obj = get_wxuser();
$access_token = $json_obj['access_token'];
$openid = $json_obj['openid'];
$json_obj_more = get_wxuser_more();
$prelogo = $json_obj_more['headimgurl'];
$logo = $prelogo;
$row = $db->getRow('SELECT userid,userpwd FROM `' . $db_mymps . 'member` WHERE `openid_wx` = \'' . $openid . '\'');
require_once MYMPS_INC . '/member.class.php';

if (is_array($row)) {
	$userid = $row['userid'];
	$userpwd = $row['userpwd'];
	$db->query('UPDATE `' . $db_mymps . 'member` SET logintime=\'' . $timestamp . '\' WHERE userid = \'' . $userid . '\' ');

	if (PASSPORT_TYPE == 'phpwind') {
		require MYMPS_ROOT . '/pw_client/uc_client.php';
		$user_login = uc_user_login($userid, $userpwd, 0);
		$member_log->in($userid, $userpwd, 'off', 'noredirect');
		echo $user_login['synlogin'];
	}
	else if (PASSPORT_TYPE == 'ucenter') {
		$member_log->in($userid, $userpwd, 'off', 'noredirect');
		require MYMPS_ROOT . '/uc_client/client.php';
		list($uid, $username, $password, $email) = uc_user_login($userid, $userpwd);
		echo uc_user_synlogin($uid);
	}
	else {
		$member_log->in($userid, $userpwd, 'off', 'noredirect');
	}

	$db->query('INSERT INTO `' . $db_mymps . 'member_wx` (`actionkey`,`openid`,`userid`,`userpwd`)VALUES (\'' . $actionkey . '\',\'' . $openid . '\',\'' . $userid . '\',\'' . $userpwd . '\')');
	if (!pcclient() && ($view != 'pc')) {
		echo mymps_goto($mymps_global['SiteUrl'] . '/m/index.php?mod=member');
	}
	else {
		echo mymps_goto($mymps_global['SiteUrl'] . '/member/index.php');
	}
}
else {
	$userid = 'wx_' . $timestamp . rand(0, 100);
	$userpwd = md5(random());

	if ($db->getOne('SELECT COUNT(id) FROM `' . $db_mymps . 'member` WHERE userid = \'' . $userid . '\'') < 1) {
		member_reg($userid, $userpwd, '', '', '', '', '', 1, $openid, $logo, $prelogo);
	}

	$member_log->in($userid, $userpwd, 'off', 'noredirect');
	$db->query('INSERT INTO `' . $db_mymps . 'member_wx` (`actionkey`,`openid`,`userid`,`userpwd`)VALUES (\'' . $actionkey . '\',\'' . $openid . '\',\'' . $userid . '\',\'' . $userpwd . '\')');
	if (!pcclient() && ($view != 'pc')) {
		echo mymps_goto($mymps_global['SiteUrl'] . '/m/index.php?mod=member');
	}
	else {
		echo mymps_goto($mymps_global['SiteUrl'] . '/member/index.php');
	}
}
function get_wxuser()
{
	global $appid;
	global $appsecret;
	global $code;
	$graph_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appid . '&secret=' . $appsecret . '&code=' . $code . '&grant_type=authorization_code';
	$str = get_url_contents($graph_url);
	$user = json_decode($str);

	if (isset($user->errcode)) {
		echo '<h3>error:</h3>' . $user->errcode;
		echo '<h3>msg  :</h3>' . $user->errmsg;
		exit();
	}

	$userarr['openid'] = $user->openid;
	$userarr['access_token'] = $user->access_token;
	return $userarr;
}

function get_wxuser_more()
{
	global $access_token;
	global $openid;
	$graph_url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN';
	$str = get_url_contents($graph_url);
	$user = json_decode($str);

	if (isset($user->errcode)) {
		echo '<h3>error:</h3>' . $user->errcode;
		echo '<h3>msg  :</h3>' . $user->errmsg;
		exit();
	}

	$userarr['openid'] = $user->openid;
	$userarr['nickname'] = $user->nickname;
	$userarr['sex'] = $user->sex;
	$userarr['province'] = $user->province;
	$userarr['city'] = $user->city;
	$userarr['country'] = $user->country;
	$userarr['headimgurl'] = $user->headimgurl;
	$userarr['privilege'] = $user->privilege;
	$userarr['unionid'] = $user->unionid;
	return $userarr;
}


?>

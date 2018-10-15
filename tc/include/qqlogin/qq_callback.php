<?php

error_reporting(32767 ^ 8);
@header('Content-Type: text/html; charset=utf-8');
define('IN_MYMPS', true);
define('QQLOGINDIR', dirname(__FILE__));
@define('MYMPS_ROOT', ereg_replace('[/\\]{1,}', '/', substr(QQLOGINDIR, 0, -15)));
define('MYMPS_DATA', MYMPS_ROOT . '/data');
define('MYMPS_INC', MYMPS_ROOT . 'include');
require_once MYMPS_DATA . '/config.php';

if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set('Hongkong');
}

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

require_once 'session.php';
require_once 'config.php';
qq_callback();
get_openid();
$openid = $_SESSION['openid'];

if (empty($openid)) {
	write_msg('登录失败，请返回重新登陆！', $mymps_global[SiteUrl] . '/include/qqlogin/qq_login.php');
}

$row = NULL;
$row = $db->getRow('SELECT userid,userpwd FROM `' . $db_mymps . 'member` WHERE openid = \'' . $openid . '\'');
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

	if (!pcclient() && ($view != 'pc')) {
		echo mymps_goto($mymps_global['SiteUrl'] . '/m/index.php?mod=member');
	}
	else {
		echo mymps_goto($mymps_global['SiteUrl'] . '/member/index.php');
	}
}
else {
	$qquser = get_qquser_info();
	$prelogo = $logo = $qquser['figureurl_qq_1'];
	$userid = 'qq_' . $timestamp . rand(0, 100);
	$userpwd = md5(random());

	if ($db->getOne('SELECT COUNT(id) FROM `' . $db_mymps . 'member` WHERE userid = \'' . $userid . '\'') < 1) {
		member_reg($userid, $userpwd, '', '', '', $openid, '', 1, '', $logo, $prelogo);
	}

	$member_log->in($userid, $userpwd, 'off', 'noredirect');
	if (!pcclient() && ($view != 'pc')) {
		echo mymps_goto($mymps_global['SiteUrl'] . '/m/index.php?mod=member');
	}
	else {
		echo mymps_goto($mymps_global['SiteUrl'] . '/member/index.php');
	}
}
function get_qquser_info()
{
	$get_user_info = 'https://graph.qq.com/user/get_user_info?' . 'access_token=' . $_SESSION['access_token'] . '&oauth_consumer_key=' . $_SESSION['appid'] . '&openid=' . $_SESSION['openid'] . '&format=json';
	$info = get_url_contents($get_user_info);
	$arr = json_decode($info, true);
	return $arr;
}

function qq_callback()
{
	if ($_REQUEST['state'] == $_SESSION['state']) {
		$token_url = 'https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&' . 'client_id=' . $_SESSION['appid'] . '&redirect_uri=' . urlencode($_SESSION['callback']) . '&client_secret=' . $_SESSION['appkey'] . '&code=' . $_REQUEST['code'];
		$response = get_url_contents($token_url);

		if (strpos($response, 'callback') !== false) {
			$lpos = strpos($response, '(');
			$rpos = strrpos($response, ')');
			$response = substr($response, $lpos + 1, $rpos - $lpos - 1);
			$msg = json_decode($response);

			if (isset($msg->error)) {
				echo '<h3>error:</h3>' . $msg->error;
				echo '<h3>msg  :</h3>' . $msg->error_description;
				exit();
			}
		}

		$params = array();
		parse_str($response, $params);
		$_SESSION['access_token'] = $params['access_token'];
	}
	else {
		echo 'The state does not match. You may be a victim of CSRF.';
	}
}

function get_openid()
{
	$graph_url = 'https://graph.qq.com/oauth2.0/me?access_token=' . $_SESSION['access_token'];
	$str = get_url_contents($graph_url);

	if (strpos($str, 'callback') !== false) {
		$lpos = strpos($str, '(');
		$rpos = strrpos($str, ')');
		$str = substr($str, $lpos + 1, $rpos - $lpos - 1);
	}

	$user = json_decode($str);

	if (isset($user->error)) {
		echo '<h3>error:</h3>' . $user->error;
		echo '<h3>msg  :</h3>' . $user->error_description;
		exit();
	}

	$_SESSION['openid'] = $user->openid;
}


?>

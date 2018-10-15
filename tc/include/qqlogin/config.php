<?php

define('QQLOGIN', 1);
$data = NULL;
require_once dirname(__FILE__) . '/../../data/caches/qqlogin.php';
$_SESSION['appid'] = $data['appid'];
$_SESSION['appkey'] = $data['appkey'];
$_SESSION['callback'] = $data['callback'];
$_SESSION['scope'] = ($data['scope'] ? $data['scope'] : 'get_user_info');
unset($data);
function qq_login($appid, $scope, $callback)
{
	$_SESSION['state'] = md5(uniqid(rand(), true));
	$login_url = 'https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=' . $appid . '&redirect_uri=' . urlencode($callback) . '&state=' . $_SESSION['state'] . '&scope=' . $scope;
	header('Location:' . $login_url);
}

function do_post($url, $data)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	curl_close($ch);
	return $ret;
}


?>

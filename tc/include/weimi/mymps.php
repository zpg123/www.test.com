<?php

include_once MYMPS_INC . '/openlogin.fun.php';
function Post($curlPost, $url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
	$return_str = curl_exec($curl);
	curl_close($curl);
	return $return_str;
}

function msend_regsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_regtpl = '')
{
	global $charset;
	$target = 'http://api.weimi.cc/2/sms/send.html';
	$post_data = 'uid=' . $sms_user . '&pas=' . $sms_pwd . '&mob=' . $mobile . '&cid=' . $sms_regtpl . '&p1=' . $yzm . '&type=json';
	$gets = object_array(json_decode(post($post_data, $target)));

	if ($charset == 'gbk') {
		$gets['msg'] = iconv('UTF-8', 'GBK', $gets['msg']);
	}

	if ($gets['code'] == 0) {
	}

	write_sms_sendrecord($mobile, $sms_regtpl, $gets['msg'], 'weimi');
}

function msend_pwdsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_pwdtpl = '')
{
	global $charset;
	$target = 'http://api.weimi.cc/2/sms/send.html';
	$post_data = 'uid=' . $sms_user . '&pas=' . $sms_pwd . '&mob=' . $mobile . '&cid=' . $sms_pwdtpl . '&p1=' . $mobile . '&p2=' . $yzm . '&type=json';
	$gets = object_array(json_decode(post($post_data, $target)));

	if ($charset == 'gbk') {
		$gets['msg'] = iconv('UTF-8', 'GBK', $gets['msg']);
	}

	if ($gets['code'] == 0) {
	}

	write_sms_sendrecord($mobile, $sms_pwdtpl, $gets['msg'], 'weimi');
}

function object_array($array)
{
	if (is_object($array)) {
		$array = (array) $array;
	}

	if (is_array($array)) {
		foreach ($array as $key => $value ) {
			$array[$key] = object_array($value);
		}
	}

	return $array;
}


?>

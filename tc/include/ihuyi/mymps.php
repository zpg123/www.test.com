<?php

function Post($curlPost, $url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_NOBODY, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
	$return_str = curl_exec($curl);
	curl_close($curl);
	return $return_str;
}

function xml_to_array($xml)
{
	$reg = '/<(\\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/';

	if (preg_match_all($reg, $xml, $matches)) {
		$count = count($matches[0]);

		for ($i = 0; $i < $count; $i++) {
			$subxml = $matches[2][$i];
			$key = $matches[1][$i];

			if (preg_match($reg, $subxml)) {
				$arr[$key] = xml_to_array($subxml);
			}
			else {
				$arr[$key] = $subxml;
			}
		}
	}

	return $arr;
}

function msend_sms($sms_user, $sms_pwd, $mobile, $content)
{
	global $charset;
	$content = rawurlencode($content);
	$target = 'http://120.55.205.5/webservice/sms.php?method=Submit';
	$post_data = 'account=' . $sms_user . '&password=' . $sms_pwd . '&mobile=' . $mobile . '&content=' . $content;
	$gets = xml_to_array(post($post_data, $target));

	if ($charset == 'gbk') {
		$gets['SubmitResult']['msg'] = iconv('UTF-8', 'GBK', $gets['SubmitResult']['msg']);
	}

	return $gets;
}

function msend_regsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_regtpl = '')
{
	$content = str_replace('{code}', $yzm, $sms_regtpl);
	$content = str_replace('{mobile}', $mobile, $content);
	$content = ($content ? $content : '您的验证码是：【' . $yzm . '】。请不要把验证码泄露给其他人。如非本人操作，可不用理会！');
	$status = msend_sms($sms_user, $sms_pwd, $mobile, $content);

	if ($status['SubmitResult']['code'] == 2) {
	}

	write_sms_sendrecord($mobile, $content, $status['SubmitResult']['msg'], 'ihuyi');
}

function msend_pwdsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_pwdtpl = '')
{
	$content = str_replace('{code}', $yzm, $sms_pwdtpl);
	$content = str_replace('{mobile}', $mobile, $content);
	$content = ($content ? $content : '您的手机号：【' . $mobile . '】，找回密码验证码：【' . $yzm . '】，请不要把验证码泄露给其他人。如非本人操作，可不用理会！');
	$status = msend_sms($sms_user, $sms_pwd, $mobile, $content);

	if ($status['SubmitResult']['code'] == 2) {
	}

	write_sms_sendrecord($mobile, $content, $status['SubmitResult']['msg'], 'ihuyi');
}


?>

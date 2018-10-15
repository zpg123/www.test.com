<?php

function mpost($curlPost, $url)
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

function msend_sms($sms_user, $sms_pwd, $mobile, $content)
{
	global $charset;
	$content = rawurlencode($content);
	$target = 'http://sms.106jiekou.com/' . ($charset == 'gbk' ? 'gbk' : 'utf8') . '/sms.aspx';
	$post_data = 'account=' . $sms_user . '&password=' . $sms_pwd . '&mobile=' . $mobile . '&content=' . $content;
	return $gets = mpost($post_data, $target);
}

function msend_regsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_regtpl = '')
{
	$content = str_replace('{code}', $yzm, $sms_regtpl);
	$content = str_replace('{mobile}', $mobile, $content);
	$content = ($content ? $content : '您的验证码是：【' . $yzm . '】。请不要把验证码泄露给其他人。如非本人操作，可不用理会！');
	$status = msend_sms($sms_user, $sms_pwd, $mobile, $content);
	$statusarr = array();
	$statusarr[100] = '成功';
	$statusarr[101] = '验证失败';
	$statusarr[102] = '手机号码格式不正确';
	$statusarr[103] = '会员级别不够';
	$statusarr[104] = '内容未审核';
	$statusarr[105] = '内容过多';
	$statusarr[106] = '账户余额不足';
	$statusarr[107] = 'IP受限';
	$statusarr[108] = '手机号码发送太频繁，请换号或隔天再发';
	$statusarr[109] = '账号被锁定';
	$statusarr[110] = '手机号发送频率持续过高，黑名单屏蔽数日';
	$statusarr[120] = '系统升级';
	write_sms_sendrecord($mobile, $content, $statusarr[$status], 'dxton');
}

function msend_pwdsms($sms_user, $sms_pwd, $mobile, $yzm, $sms_pwdtpl = '')
{
	$content = str_replace('{code}', $yzm, $sms_pwdtpl);
	$content = str_replace('{mobile}', $mobile, $content);
	$content = ($content ? $content : '您的手机号：【' . $mobile . '】，找回密码验证码：【' . $yzm . '】，请不要把验证码泄露给其他人。如非本人操作，可不用理会！');
	$status = msend_sms($sms_user, $sms_pwd, $mobile, $content);
	$statusarr = array();
	$statusarr[100] = '成功';
	$statusarr[101] = '验证失败';
	$statusarr[102] = '手机号码格式不正确';
	$statusarr[103] = '会员级别不够';
	$statusarr[104] = '内容未审核';
	$statusarr[105] = '内容过多';
	$statusarr[106] = '账户余额不足';
	$statusarr[107] = 'IP受限';
	$statusarr[108] = '手机号码发送太频繁，请换号或隔天再发';
	$statusarr[109] = '账号被锁定';
	$statusarr[110] = '手机号发送频率持续过高，黑名单屏蔽数日';
	$statusarr[120] = '系统升级';
	write_sms_sendrecord($mobile, $content, $statusarr[$status], 'dxton');
}


?>

<?php

define('IN_MYMPS', true);
define('IN_ADMIN', true);
define('CURSCRIPT', 'payend');
require_once dirname(__FILE__) . '/../../../include/global.php';
require_once MYMPS_DATA . '/config.php';
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
require_once MYMPS_INC . '/member.class.php';

if (!$member_log->chk_in()) {
	write_msg('', $mymps_global['SiteUrl'] . '/' . $mymps_global['cfg_member_logfile'] . '?url=' . urlencode(GetUrl()));
}

$editor = 1;

if (!mgetcookie('checkpaysession')) {
	write_msg('非法操作！', 'olmsg');
}

$pay_type = mgetcookie('pay_type');
$paytype = 'alipay';
$payr = $db->getRow('SELECT * FROM ' . $db_mymps . 'payapi WHERE paytype=\'' . $paytype . '\'');
$bargainor_id = $payr['payuser'];
$paykey = $payr['paykey'];
$seller_email = $payr['payemail'];

if (!empty($_POST)) {
	foreach ($_POST as $key => $data ) {
		$_GET[$key] = $data;
	}
}

$get_seller_email = rawurldecode($_GET['seller_email']);
ksort($_GET);
reset($_GET);
if (($_GET['trade_status'] == 'TRADE_FINISHED') || ($_GET['trade_status'] == 'TRADE_SUCCESS') || ($_GET['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') || ($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS')) {
	include MYMPS_INC . '/pay.fun.php';
	$orderid = $_GET['trade_no'];
	$ddno = $_GET['out_trade_no'];
	$money = $_GET['total_fee'];

	if ($_GET['trade_status'] == 'TRADE_FINISHED') {
		$paybz = '支付完成';
	}
	else if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
		$paybz = '支付成功';
	}
	else if ($_GET['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
		$paybz = '等待确认收货';
	}
	else if ($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
		$paybz = '等待发货';
		$invoice_no = '1';
		$logistics_name = '1';
		$parameter = array('_input_charset' => trim(strtolower($charset)), 'invoice_no' => $invoice_no, 'logistics_name' => $logistics_name, 'partner' => trim($bargainor_id), 'service' => 'send_goods_confirm_by_platform', 'trade_no' => $orderid, 'transport_type' => 'EXPRESS');
		ksort($parameter);
		reset($parameter);
		$param = '';
		$sign = '';

		foreach ($parameter as $key => $val ) {
			if (strlen($val) == 0) {
				continue;
			}

			$param .= $key . '=' . urlencode($val) . '&';
			$sign .= $key . '=' . $val . '&';
		}

		$param = substr($param, 0, -1);
		$sign = md5(substr($sign, 0, -1) . $paykey);
		$gotopayurl = 'https://mapi.alipay.com/gateway.do?' . $param . '&sign=' . $sign . '&sign_type=MD5';
		$parameter = array_merge($parameter, array('sign_type' => 'MD5'));
		$html_text = getHttpResponsePOST($gotopayurl, getcwd() . '\\cacert.pem', $parameter, trim(strtolower($charset)));
		$paybz = '充值成功';
		UpdatePayRecord($ddno, $paybz);
		write_msg('您已成功支付，请前往支付宝确认收货完成金币充值！', $mymps_global['SiteUrl'] . '/member/index.php?m=pay&ac=record');
	}

	UpdatePayRecord($ddno, $paybz);
	write_msg('您已成功充值 ' . ($money * $mymps_global['cfg_coin_fee']) . ' 个金币', $mymps_global['SiteUrl'] . '/member/index.php?m=pay&ac=record');
}

is_object($db) && $db->Close();
$mymps_global = NULL;
function getHttpResponsePOST($url, $cacert_url, $para, $input_charset = '')
{
	if (trim($input_charset) != '') {
		$url = $url . '_input_charset=' . $input_charset;
	}

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $para);
	$responseText = curl_exec($curl);
	curl_close($curl);
	return $responseText;
}

function getHttpResponseGET($url, $cacert_url)
{
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($curl, CURLOPT_CAINFO, $cacert_url);
	$responseText = curl_exec($curl);
	curl_close($curl);
	return $responseText;
}

function charsetEncode($input, $_output_charset, $_input_charset)
{
	$output = '';

	if (!isset($_output_charset)) {
		$_output_charset = $_input_charset;
	}

	if (($_input_charset == $_output_charset) || ($input == NULL)) {
		$output = $input;
	}
	else if (function_exists('mb_convert_encoding')) {
		$output = mb_convert_encoding($input, $_output_charset, $_input_charset);
	}
	else if (function_exists('iconv')) {
		$output = iconv($_input_charset, $_output_charset, $input);
	}
	else {
		exit('sorry, you have no libs support for charset change.');
	}

	return $output;
}

function charsetDecode($input, $_input_charset, $_output_charset)
{
	$output = '';

	if (!isset($_input_charset)) {
		$_input_charset = $_input_charset;
	}

	if (($_input_charset == $_output_charset) || ($input == NULL)) {
		$output = $input;
	}
	else if (function_exists('mb_convert_encoding')) {
		$output = mb_convert_encoding($input, $_output_charset, $_input_charset);
	}
	else if (function_exists('iconv')) {
		$output = iconv($_input_charset, $_output_charset, $input);
	}
	else {
		exit('sorry, you have no libs support for charset changes.');
	}

	return $output;
}


?>

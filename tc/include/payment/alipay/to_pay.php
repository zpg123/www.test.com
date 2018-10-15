<?php

if (!defined('IN_MYMPS')) {
	exit();
}

$agent = '';

if ($payr['buytype'] == 2) {
	$service = 'trade_create_by_buyer';
}
else if ($payr['buytype'] == 1) {
	$service = 'create_direct_pay_by_user';
}
else if ($payr['buytype'] == 3) {
	$service = 'create_partner_trade_by_buyer';
}

$partner = $payr['payuser'];
$paykey = $payr['paykey'];
$seller_email = $payr['payemail'];
$_input_charset = ($charset == 'utf-8' ? 'UTF-8' : 'GBK');
$sign_type = 'MD5';
$return_url = $PayReturnUrlQz . '/include/payment/alipay/payend.php';
$notify_url = $PayReturnUrlQz . '/include/payment/alipay/notify.php';
$payment_type = 1;
$paymethod = '';
$defaultbank = '';
$price = $money;
$quantity = 1;
$out_trade_no = ($ddno ? $ddno : $timestamp);
msetcookie('checkpaysession', $out_trade_no);
$subject = $productname;
$body = $out_trade_no;

if ($payr['buytype'] == 2) {
	$parameter = array('service' => $service, 'partner' => $partner, 'seller_email' => $seller_email, '_input_charset' => $_input_charset, 'return_url' => $return_url, 'notify_url' => $notify_url, 'subject' => $subject, 'body' => $body, 'out_trade_no' => $out_trade_no, 'price' => $price, 'quantity' => $quantity, 'payment_type' => $payment_type, 'paymethod' => $paymethod, 'defaultbank' => $defaultbank, 'logistics_fee' => '0.00', 'logistics_payment' => 'SELLER_PAY', 'logistics_type' => 'EXPRESS');
}
else if ($payr['buytype'] == 1) {
	$parameter = array('service' => $service, 'partner' => $partner, 'seller_email' => $seller_email, '_input_charset' => $_input_charset, 'return_url' => $return_url, 'notify_url' => $notify_url, 'subject' => $subject, 'body' => $body, 'out_trade_no' => $out_trade_no, 'price' => $price, 'quantity' => $quantity, 'payment_type' => $payment_type, 'paymethod' => $paymethod, 'defaultbank' => $defaultbank);
}
else if ($payr['buytype'] == 3) {
	$parameter = array('service' => $service, 'partner' => $partner, 'seller_email' => $seller_email, '_input_charset' => $_input_charset, 'return_url' => $return_url, 'notify_url' => $notify_url, 'subject' => $subject, 'body' => $body, 'out_trade_no' => $out_trade_no, 'price' => $price, 'quantity' => $quantity, 'payment_type' => $payment_type, 'paymethod' => $paymethod, 'defaultbank' => $defaultbank, 'logistics_fee' => '0.00', 'logistics_payment' => 'SELLER_PAY', 'logistics_type' => 'DIRECT');
}

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
$gotopayurl = 'https://www.alipay.com/cooperate/gateway.do?' . $param . '&sign=' . $sign . '&sign_type=' . $sign_type;
ToPayMoney($money, $out_trade_no, $uid, $s_uid, 'alipay');
echo '<html>' . "\r\n" . '<title>支付宝支付</title>' . "\r\n" . '<meta http-equiv="Cache-Control" content="no-cache"/>' . "\r\n" . '<body>' . "\r\n" . '<script>' . "\r\n" . 'self.location.href=\'';
echo $gotopayurl;
echo '\';' . "\r\n" . '</script>' . "\r\n" . '<input type="button" style="font-size: 9pt" value="支付宝支付" name="v_action" onClick="self.location.href=\'';
echo $gotopayurl;
echo '\';">' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>

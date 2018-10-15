<?php

define('IN_AJAX', true);
@header('Content-Type: text/html; charset=utf-8');

if (!defined('IN_MYMPS')) {
	exit();
}

$payr['payuser'] = trim($payr['payuser']);
$payr['paykey'] = trim($payr['paykey']);
$s_uid = mhtmlspecialchars($_GET['s_uid']);
$_input_charset = 'utf-8';
$sign_type = 'MD5';
$total_fee = $money;
$out_trade_no = ($ddno ? $ddno : $timestamp);
$subject = ($charset == 'gbk' ? iconv('gbk', 'utf-8', $productname) : $productname);
$body = $out_trade_no;
$show_url = $mymps_global['SiteUrl'] . '/m/index.php?mod=member&action=pay';
$return_url = $PayReturnUrlQz . '/include/payment/alipay_h5/payend.php';
$notify_url = $PayReturnUrlQz . '/include/payment/alipay_h5/notify.php';
if (empty($s_uid) || empty($uid)) {
	write_msg('invalid username', 'javascript:history.back();');
}

if ($db->getOne('SELECT COUNT(id) FROM `' . $db_mymps . 'member` WHERE id = \'' . $uid . '\' AND userid = \'' . $s_uid . '\'') < 1) {
	write_msg('invalid username', 'javascript:history.back();');
}

ToPayMoney($total_fee, $out_trade_no, $uid, $s_uid, 'alipay_h5');
msetcookie('checkpaysession', $out_trade_no);
$alipay_config['partner'] = $payr['payuser'];
$alipay_config['seller_id'] = $payr['payuser'];
$alipay_config['key'] = $payr['paykey'];
$alipay_config['notify_url'] = $notify_url;
$alipay_config['return_url'] = $return_url;
$alipay_config['sign_type'] = strtoupper('MD5');
$alipay_config['input_charset'] = $_input_charset;
$alipay_config['cacert'] = getcwd() . '\\cacert.pem';
$alipay_config['transport'] = 'http';
$alipay_config['payment_type'] = '1';
$alipay_config['service'] = 'alipay.wap.create.direct.pay.by.user';
require_once 'alipay_submit.class.php';
$parameter = array('service' => 'alipay.wap.create.direct.pay.by.user', 'partner' => $payr['payuser'], 'seller_id' => $payr['payuser'], 'payment_type' => 1, 'notify_url' => $notify_url, 'return_url' => $return_url, '_input_charset' => $_input_charset, 'out_trade_no' => $out_trade_no, 'subject' => $subject, 'total_fee' => $total_fee, 'show_url' => $show_url, 'app_pay' => 'Y', 'body' => $body);
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->getHtml($parameter);
echo '<html>' . "\r\n" . '<head>' . "\r\n" . '<script type="text/javascript">var ua = navigator.userAgent.toLowerCase();if(ua.match(/MicroMessenger/i)!="micromessenger") {window.location.href=\'';
echo $html_text;
echo '\';}</script>' . "\r\n" . '<meta charset="utf-8">' . "\r\n" . '<title>支付</title>' . "\r\n" . '<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=2.0">' . "\r\n" . '<style type="text/css">' . "\r\n" . 'body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td{margin:0;padding:0;}' . "\r\n" . 'body,button,input,select,textarea{font:16px/26px \'Microsoft Yahei\',\'Arial\',\'Helvetica\',\'sans-serif\',\'Simsun\';color:#333;}' . "\r\n" . 'body { background-color:#f4f4f8;}' . "\r\n" . '.alipay_for_safari { text-align:center; padding-top:350px;}' . "\r\n" . '.alipay_for_safari .btn { color:#444; text-decoration:none; display:inline-block; padding:8px 20px; font-size:16px; background-color:#e7e8e8; border:1px solid #d9d9d9; border-radius:3px;}' . "\r\n" . '.alipay_for_safari .s { display:block; position:absolute; background:url(/m/template/images/alipayForSafari.jpg) no-repeat 0 0; background-size:352px auto; right:0; top:0; overflow:hidden;}' . "\r\n" . '.alipay_for_safari .s1 { width:56px; height:74px; background-position:-296px -0px;}' . "\r\n" . '.alipay_for_safari .s2 { width:130px; height:130px; top:150px; left:50%; right:auto; margin-left:-56px; background-position:-111px -107px;}' . "\r\n" . '.alipay_for_safari .txt { text-align:left; font-size:20px; right:45px; left:15px; top:60px; position:absolute;}' . "\r\n" . '</style>' . "\r\n" . '</head>' . "\r\n" . '<body>' . "\r\n" . '<div class="alipay_for_safari" id="alipayForSafari">' . "\r\n\t" . '<s class="s s1"></s><s class="s s2"></s>' . "\r\n\t" . '<div class="txt">请在菜单中选择在浏览器中打开，以完成支付。</div>' . "\r\n\t" . '<a href="index.php?mod=member" class="btn">已完成支付</a>　<a href="index.php?mod=member&action=pay" class="btn">取消并返回</a>' . "\r\n" . '</div>' . "\r\n\r\n" . '</body>' . "\r\n" . '</html>';

?>

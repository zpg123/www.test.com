<?php

if (!defined('IN_MYMPS')) {
	exit();
}

$v_mid = $payr['payuser'];
$key = $payr['paykey'];
$v_url = $PayReturnUrlQz . '/include/payment/chinabank/payend.php';
$remark2 = '[url:=' . $PayReturnUrlQz . '/include/payment/chinabank/notify.php]';
$v_moneytype = 'CNY';
$v_amount = $money;
$v_oid = date('Ymd') . '-' . $v_mid . '-' . date('His');
$ddno = ($ddno ? $ddno : $timestamp);
msetcookie('checkpaysession', $ddno, 0);
$text = $v_amount . $v_moneytype . $v_oid . $v_mid . $v_url . $key;
$v_md5info = strtoupper(md5($text));
$remark1 = $ddno;
ToPayMoney($v_amount, $ddno, $uid, $s_uid, 'chinabank');
echo '<html>' . "\r\n" . '<title>在线支付</title>' . "\r\n" . '<meta http-equiv="Cache-Control" content="no-cache"/>' . "\r\n" . '<body>' . "\r\n" . '<form method="post" name="dopaypost" id="dopaypost" action="https://pay3.chinabank.com.cn/PayGate">' . "\r\n\t" . '<input type="hidden" name="v_mid"    value="';
echo $v_mid;
echo '">' . "\r\n\t" . '<input type="hidden" name="v_oid"     value="';
echo $v_oid;
echo '">' . "\r\n\t" . '<input type="hidden" name="v_amount" value="';
echo $v_amount;
echo '">' . "\r\n\t" . '<input type="hidden" name="v_moneytype"  value="';
echo $v_moneytype;
echo '">' . "\r\n\t" . '<input type="hidden" name="v_url"  value="';
echo $v_url;
echo '">' . "\r\n\t" . '<input type="hidden" name="v_md5info"   value="';
echo $v_md5info;
echo '">' . "\r\n\t" . '<input type="hidden" name="remark1"   value="';
echo $remark1;
echo '">' . "\r\n\t" . '<input type="hidden" name="remark2"   value="';
echo $remark2;
echo '">' . "\r\n\t" . '<input type="submit" style="font-size: 9pt" value="在线支付" name="v_action">' . "\r\n" . '</form>' . "\r\n" . '<script>' . "\r\n" . 'document.getElementById(\'dopaypost\').submit();' . "\r\n" . '</script>' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>

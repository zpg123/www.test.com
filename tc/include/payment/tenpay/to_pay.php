<?php

if (!defined('IN_MYMPS')) {
	exit();
}

$bargainor_id = $payr['payuser'];
$key = $payr['paykey'];
$return_url = $PayReturnUrlQz . '/include/payment/tenpay/payend.php';
$fee_type = 1;
$bank_type = '0';
$total_fee = $money * 100;
$strCmdNo = '1';
$strBillDate = date('Ymd');
$desc = $productname;
$strBuyerId = '';
$strSpBillNo = ($ddno ? $ddno : $timestamp);
msetcookie('checkpaysession', $strSpBillNo, 0);
$strTransactionId = $bargainor_id . $strBillDate . $strSpBillNo;
$attach = $strSpBillNo;
$spbill_create_ip = $_SERVER['REMOTE_ADDR'];
$strSignText = 'cmdno=' . $strCmdNo . '&date=' . $strBillDate . '&bargainor_id=' . $bargainor_id . '&transaction_id=' . $strTransactionId . '&sp_billno=' . $strSpBillNo . '&total_fee=' . $total_fee . '&fee_type=' . $fee_type . '&return_url=' . $return_url . '&attach=' . $attach . '&spbill_create_ip=' . $spbill_create_ip . '&key=' . $key;
$strSign = strtoupper(md5($strSignText));
ToPayMoney($money, $attach, $uid, $s_uid, 'tenpay');
echo '<html>' . "\r\n" . '<title>财付通支付</title>' . "\r\n" . '<meta http-equiv="Cache-Control" content="no-cache"/>' . "\r\n" . '<body>' . "\r\n" . '<form action="https://www.tenpay.com/cgi-bin/v1.0/pay_gate.cgi" name="dopaypost" id="dopaypost">' . "\r\n" . '<input type=hidden name="cmdno" value="';
echo $strCmdNo;
echo '">' . "\r\n" . '<input type=hidden name="date" value="';
echo $strBillDate;
echo '">' . "\r\n" . '<input type=hidden name="bank_type" value="';
echo $bank_type;
echo '">' . "\r\n" . '<input type=hidden name="desc" value="';
echo $desc;
echo '">' . "\r\n" . '<input type=hidden name="purchaser_id" value="';
echo $strBuyerId;
echo '">' . "\r\n" . '<input type=hidden name="bargainor_id" value="';
echo $bargainor_id;
echo '">' . "\r\n" . '<input type=hidden name="transaction_id" value="';
echo $strTransactionId;
echo '">' . "\r\n" . '<input type=hidden name="sp_billno" value="';
echo $strSpBillNo;
echo '">' . "\r\n" . '<input type=hidden name="total_fee" value="';
echo $total_fee;
echo '">' . "\r\n" . '<input type=hidden name="fee_type" value="';
echo $fee_type;
echo '">' . "\r\n" . '<input type=hidden name="return_url" value="';
echo $return_url;
echo '">' . "\r\n" . '<input type=hidden name="attach" value="';
echo $attach;
echo '">' . "\r\n" . '<input type=hidden name="sign" value="';
echo $strSign;
echo '">' . "\r\n" . '<input type=hidden name="spbill_create_ip" value="';
echo $spbill_create_ip;
echo '">' . "\r\n" . '<input type="submit" name="submit2" value="财付通支付">' . "\r\n" . '</form>' . "\r\n" . '<script>' . "\r\n" . 'document.getElementById(\'dopaypost\').submit();' . "\r\n" . '</script>' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>

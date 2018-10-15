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
	write_msg('', '../' . $mymps_global['cfg_member_logfile'] . '?url=' . urlencode(GetUrl()));
}

$editor = 1;
$paytype = 'tenpay';
$payr = $db->getRow('SELECT * FROM ' . $db_mymps . 'payapi WHERE paytype=\'' . $paytype . '\'');
$bargainor_id = $payr['payuser'];
$key = $payr['paykey'];
import_request_variables('gpc', 'frm_');
$strCmdno = $frm_cmdno;
$strPayResult = $frm_pay_result;
$strPayInfo = $frm_pay_info;
$strBillDate = $frm_date;
$strBargainorId = $frm_bargainor_id;
$strTransactionId = $frm_transaction_id;
$strSpBillno = $frm_sp_billno;
$strTotalFee = $frm_total_fee;
$strFeeType = $frm_fee_type;
$strAttach = $frm_attach;
$strMd5Sign = $frm_sign;
$strCreateIp = $frm_spbill_create_ip;
$checkkey = 'cmdno=' . $strCmdno . '&pay_result=' . $strPayResult . '&date=' . $strBillDate . '&transaction_id=' . $strTransactionId . '&sp_billno=' . $strSpBillno . '&total_fee=' . $strTotalFee . '&fee_type=' . $strFeeType . '&attach=' . $strAttach . '&spbill_create_ip=' . $strCreateIp . '&key=' . $key;
$checkSign = strtoupper(md5($checkkey));

if ($bargainor_id != $strBargainorId) {
	write_msg('错误的商户号.', 'olmsg');
}

if ($strPayResult == '0') {
	include MYMPS_INC . '/pay.fun.php';
	$orderid = $strSpBillno;
	$ddno = $strAttach;
	$money = $strTotalFee / 100;
	$paybz = '支付完成';
	UpdatePayRecord($ddno, $paybz);
	write_msg('您已成功充值 ' . ($money * $mymps_global['cfg_coin_fee']) . ' 个金币', $mymps_global['SiteUrl'] . '/member/index.php?m=pay&ac=record');
}
else {
	write_msg('支付失败.', 'olmsg');
}

is_object($db) && $db->Close();
$mymps_global = NULL;

?>

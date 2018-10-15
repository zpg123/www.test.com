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
$pay_type = mgetcookie('pay_type');
$paytype = 'chinabank';
$payr = $db->getRow('select * from ' . $db_mymps . 'payapi where paytype=\'' . $paytype . '\'');
$v_mid = $payr['payuser'];
$key = $payr['paykey'];
$v_oid = trim($_POST['v_oid']);
$v_pmode = trim($_POST['v_pmode']);
$v_pstatus = trim($_POST['v_pstatus']);
$v_pstring = trim($_POST['v_pstring']);
$v_amount = trim($_POST['v_amount']);
$v_moneytype = trim($_POST['v_moneytype']);
$remark1 = trim($_POST['remark1']);
$remark2 = trim($_POST['remark2']);
$v_md5str = trim($_POST['v_md5str']);
$md5string = strtoupper(md5($v_oid . $v_pstatus . $v_amount . $v_moneytype . $key));
include MYMPS_INC . '/pay.fun.php';
$orderid = $v_oid;
$ddno = $remark1;
$money = $v_amount;

if ($v_pstatus == '20') {
	$paybz = '支付成功';
}
else if ($v_pstatus == '30') {
	$paybz = '支付失败';
}
else {
	$paybz = '支付完成';
}

UpdatePayRecord($ddno, $paybz);
write_msg('您已成功充值 ' . ($money * $mymps_global['cfg_coin_fee']) . ' 个金币', $mymps_global['SiteUrl'] . '/member/index.php?m=pay&ac=record');
is_object($db) && $db->Close();
$mymps_global = NULL;

?>

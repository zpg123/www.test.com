<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
$ip = (isset($_GET['ip']) ? trim($_GET['ip']) : '');

if ($ip == 'wap') {
	$area = '手机端';
}
else {
	$area = $address = $ipdata = '';
	require_once MYMPS_INC . '/ip.class.php';
	$ipdata = new ip();
	$address = $ipdata->getaddress($ip);
	$area = $address['area1'] . $address['area2'];
	$area = iconv('GB2312', 'UTF-8', $area);
}

include MYMPS_ROOT . '/template/box/iptoarea.html';
unset($ipdata);
unset($address);

?>

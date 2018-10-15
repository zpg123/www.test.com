<?php
define('IN_SMT',true);
define('CURSCRIPT','sendsms');
define('IN_MYMPS', true);
define('CURROOT',dirname(__FILE__));
require_once CURROOT.'/data/config.php';
require_once CURROOT.'/data/config.db.php';
require_once CURROOT.'/include/db.class.php';
require_once CURROOT.'/include/global.php';
require_once CURROOT.'/include/sms.fun.php';
$phonenum = isset($phonenum) ? mhtmlspecialchars($_REQUEST['phonenum']) : '';
//if(!$phonenum) exit;
$smsconfig = get_sms_config();
$smsconfig['sms_service'] && include CURROOT.'/include/'.$smsconfig['sms_service'].'/mymps.php';
!send_regsms($smsconfig['sms_user'],$smsconfig['sms_pwd'],$phonenum,$smsconfig['sms_regtpl']) && exit;
?>
<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
$id = ($_REQUEST['id'] ? intval($_REQUEST['id']) : '');
$tel_base64 = ($_REQUEST['tel_base64'] ? mhtmlspecialchars($_REQUEST['tel_base64']) : '');
$tel = base64_decode($tel_base64);
$url = base64_encode($mymps_global[SiteUrl] . '/m/index.php?mod=information&id=' . $id);
include MYMPS_ROOT . '/template/box/seecontact_tel.html';
$row = $infoid = $db = $mymps_global = $if_view = NULL;

?>

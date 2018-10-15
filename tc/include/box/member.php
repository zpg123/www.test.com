<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
require_once MYMPS_DATA . '/config.db.php';
require_once MYMPS_INC . '/db.class.php';
$row = $db->getRow('SELECT userpwd,if_corp,id FROM `' . $db_mymps . 'member` WHERE userid = \'' . $userid . '\'');
$password = $row['userpwd'];
$uid = $row['id'];
$if_corp = $row['if_corp'];
include MYMPS_ROOT . '/template/box/member.html';

?>

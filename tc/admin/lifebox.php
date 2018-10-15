<?php

define('CURSCRIPT', 'lifebox');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$part = (isset($part) ? $part : 'list');
$id = (isset($id) ? intval($id) : 0);

if (!submit_check(CURSCRIPT . '_submit')) {
	$here = '生活百宝箱设置';
	chk_admin_purview('purview_生活百宝箱');
	require_once dirname(__FILE__) . '/include/ifview.inc.php';
	$serv_type = array(2 => '内页嵌套', 1 => '直接跳转');
	if (($part == 'edit') && empty($id)) {
		write_msg('您未指定要修改的ID编号！');
	}

	$lifebox = $db->getAll('SELECT * FROM `' . $db_mymps . 'lifebox` ORDER BY displayorder DESC');
	include mymps_tpl(CURSCRIPT);
}
else {
	if (is_array($add) && $add['lifename'] && $add['lifeurl']) {
		$db->query('INSERT `' . $db_mymps . 'lifebox` (lifename,lifeurl,typeid,displayorder,if_view)VALUES(\'' . $add['lifename'] . '\',\'' . $add['lifeurl'] . '\',\'' . $add['typeid'] . '\',\'' . $add['displayorder'] . '\',\'' . $add['if_view'] . '\')');
	}

	if (is_array($edit)) {
		foreach ($edit as $kedit => $vedit ) {
			$db->query('UPDATE `' . $db_mymps . 'lifebox` SET lifename=\'' . $vedit['lifename'] . '\',lifeurl=\'' . $vedit['lifeurl'] . '\',typeid=\'' . $vedit['typeid'] . '\',displayorder=\'' . $vedit['displayorder'] . '\',if_view=\'' . $vedit['if_view'] . '\' WHERE id = \'' . $kedit . '\'');
		}
	}

	if (is_array($delids)) {
		$db->query('DELETE FROM `' . $db_mymps . 'lifebox` WHERE ' . create_in($delids, 'id'));
	}

	clear_cache_files('lifebox');
	write_msg('生活百宝箱设置更新成功！', 'lifebox.php', 'write_record');
}

is_object($db) && $db->Close();
$mymps_global = $db = $db_mymps = $part = NULL;
function get_servtype_options($typeid)
{
	global $serv_type;

	foreach ($serv_type as $k => $v ) {
		if (($k == $typeid) && ($k != '')) {
			$serv_type_form .= '<option value=\'' . $k . '\' selected style=\'background-color:#6EB00C;color:white\'>' . $v . '</option>' . "\r\n";
		}
		else {
			$serv_type_form .= '<option value=\'' . $k . '\'>' . $v . '</option>' . "\r\n";
		}
	}

	return $serv_type_form;
}


?>

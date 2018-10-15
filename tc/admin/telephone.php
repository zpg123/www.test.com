<?php

define('CURSCRIPT', 'telephone');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$part = (isset($part) ? $part : 'list');
$id = (isset($id) ? intval($id) : 0);

if (!submit_check(CURSCRIPT . '_submit')) {
	chk_admin_purview('purview_便民电话');
	$here = '便民电话设置';
	require_once dirname(__FILE__) . '/include/ifview.inc.php';
	require_once dirname(__FILE__) . '/include/color.inc.php';
	if (($part == 'edit') && empty($id)) {
		write_msg('您未指定要修改的ID编号！');
	}

	$rows_num = mymps_count('telephone');
	$param = setParam(array('part'));
	$telephone = page1('SELECT * FROM `' . $db_mymps . 'telephone` ORDER BY displayorder DESC');
	include mymps_tpl(CURSCRIPT);
}
else {
	if (is_array($add) && $add['telname'] && $add['telnumber']) {
		$db->query('INSERT `' . $db_mymps . 'telephone` (telname,telnumber,color,if_bold,displayorder,if_view) VALUES (\'' . $add['telname'] . '\',\'' . $add['telnumber'] . '\',\'' . $add['color'] . '\',\'' . $add['if_bold'] . '\',\'' . $add['displayorder'] . '\',\'' . $add['if_view'] . '\')');
	}

	if (is_array($edit)) {
		foreach ($edit as $kedit => $vedit ) {
			$db->query('UPDATE `' . $db_mymps . 'telephone` SET telname=\'' . $vedit['telname'] . '\',telnumber=\'' . $vedit['telnumber'] . '\',color=\'' . $vedit['color'] . '\',if_bold=\'' . $vedit['if_bold'] . '\',displayorder=\'' . $vedit['displayorder'] . '\',if_view=\'' . $vedit['if_view'] . '\' WHERE id = \'' . $kedit . '\'');
		}
	}

	if (is_array($delids)) {
		$db->query('DELETE FROM `' . $db_mymps . 'telephone` WHERE ' . create_in($delids, 'id'));
	}

	clear_cache_files('telephone');
	write_msg('便民电话设置更新成功！', $forward_url ? $forward_url : 'telephone.php', 'write_record');
}

is_object($db) && $db->Close();
$mymps_global = $db = $db_mymps = $part = NULL;

?>

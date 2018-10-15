<?php

define('CURSCRIPT', 'area');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$part = ($part ? $part : 'list');

if (!submit_check(CURSCRIPT . '_submit')) {
	if ($part == 'list') {
		chk_admin_purview('purview_地区分类');
		$area = cat_list('area', 0, 0, false);
		$here = '地区列表';
		include mymps_tpl('area_list');
	}
	else if ($part == 'add') {
		chk_admin_purview('purview_增加地区');
		$maxorder = $db->getOne('SELECT MAX(areaorder) FROM ' . $db_mymps . 'area');
		$maxorder = $maxorder + 1;
		$here = '添加地区';
		include mymps_tpl('area_add');
	}
	else if ($part == 'edit') {
		$area = $db->getRow('SELECT * FROM ' . $db_mymps . 'area WHERE areaid = \'' . $areaid . '\'');
		$here = '编辑地区';
		include mymps_tpl('area_edit');
	}
	else if ($part == 'del') {
		if (empty($areaid)) {
			write_msg('没有选择记录');
		}

		mymps_delete('area', 'WHERE areaid = \'' . $areaid . '\'');
		mymps_delete('area', 'WHERE parentid = \'' . $areaid . '\'');
		clear_cache_files('area_option_static');
		clear_cache_files('area_pid_releate');
		write_msg('删除地区 ' . $areaid . ' 成功', '?part=list', 'Mymps_record');
	}
}
else if ($part == 'add') {
	if (empty($areaname)) {
		write_msg('请填写地区名称');
	}

	$areaname = explode('|', trim($areaname));

	if (empty($areaorder)) {
		$maxorder = $db->getOne('SELECT MAX(areaorder) FROM ' . $db_mymps . 'area');
		$areaorder = $maxorder + 1;
	}

	if (is_array($areaname)) {
		foreach ($areaname as $key => $value ) {
			$areaorder++;
			$len = strlen($value);
			if (($len < 2) || (30 < $len)) {
				write_msg('地区名必须在2个至30个字符之间');
				exit();
			}

			$db->query('INSERT INTO ' . $db_mymps . 'area (areaname,parentid,areaorder) VALUES (\'' . $value . '\',\'' . $parentid . '\',\'' . $areaorder . '\')');
		}
	}

	foreach (array('option_static', 'pid_releate') as $range ) {
		clear_cache_files('area_' . $range);
	}

	write_msg('成功更新地区分类！', 'area.php?part=list', 'write_record');
}
else if ($part == 'edit') {
	if (empty($areaname)) {
		write_msg('请填写地区名称');
	}

	$len = strlen($areaname);
	($areaid == $parentid) && write_msg('隶属地区分类不能为自己！');
	if (($len < 2) || (30 < $len)) {
		write_msg('地区名必须在2个至30个字符之间');
	}

	$sql = 'UPDATE ' . $db_mymps . 'area SET areaname=\'' . $areaname . '\',' . "\r\n\t\t" . 'parentid=\'' . $parentid . '\',' . "\r\n\t\t" . 'areaorder=\'' . $areaorder . '\'' . "\r\n\t\t" . 'WHERE areaid = \'' . $areaid . '\'';
	$res = $db->query($sql);

	foreach (array('option_static', 'pid_releate') as $range ) {
		clear_cache_files('area_' . $range);
	}

	$nav_path = '地区管理 &raquo 编辑地区';
	$message = '成功编辑地区 ' . $areaname;
	$after_action = '<a href=\'?part=add\'><u>继续增加地区</u></a>' . "\r\n\t\t" . '&nbsp;&nbsp;<a href=\'?part=edit&areaid=' . $areaid . '\'><u>重新编辑该地区</u></a>&nbsp;&nbsp;<a href=\'?part=list#' . $catid . '\'><u>已增加地区管理</u></a>';
	show_message($nav_path, $message, $after_action);
}
else {
	if (($part == 'list') && is_array($areaorder)) {
		if (is_array($areaorder)) {
			foreach ($areaorder as $k => $v ) {
				$db->query('UPDATE `' . $db_mymps . 'area` SET areaname=\'' . $v['areaname'] . '\',areaorder=\'' . $v['areaorder'] . '\' WHERE areaid = \'' . $k . '\'');
			}
		}

		foreach (array('option_static', 'pid_releate') as $range ) {
			clear_cache_files('area_' . $range);
		}

		write_msg('成功更新地区分类！', 'area.php?part=list', 'write_record');
	}
}

is_object($db) && $db->Close();
$db = $mymps_global = $part = $action = $here = NULL;

?>

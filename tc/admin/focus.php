<?php

define('CURSCRIPT', 'focus');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
$part = ($part ? $part : 'list');
(!in_array($typename, array('网站首页', '新闻首页')) || !$typename) && ($typename = '网站首页');
!in_array($part, array('list', 'add', 'edit')) && ($part = 'list');
require_once MYMPS_DATA . '/config.inc.php';
$tpl_index = $db->getOne('SELECT value FROM `' . $db_mymps . 'config` WHERE type=\'tpl\' AND description = \'tpl_set\'');
$tpl_index = ($tpl_index ? ($charset == 'utf-8' ? utf8_unserialize($tpl_index) : unserialize($tpl_index)) : $defaultset['classic']);

if (!submit_check(CURSCRIPT . '_submit')) {
	if ($part == 'list') {
		chk_admin_purview('purview_幻灯片列表');
		$sql = 'SELECT * FROM `' . $db_mymps . 'focus` WHERE typename = \'' . $typename . '\' ORDER BY focusorder DESC';
		$row = $db->getAll($sql);
		$here = $typename . '幻灯片修改';
	}
	else if ($part == 'add') {
		chk_admin_purview('purview_上传幻灯片');
		$here = '添加幻灯片';
		$maxorder = $db->getOne('SELECT MAX(focusorder) FROM ' . $db_mymps . 'focus');
		$maxorder = $maxorder + 1;
	}
	else if ($part == 'edit') {
		if (empty($id)) {
			write_msg('您未指定ID');
		}

		$row = $db->getRow('SELECT * FROM ' . $db_mymps . 'focus WHERE id =\'' . $id . '\'');
		$here = '修改' . $row[typename] . '幻灯片';
	}

	include mymps_tpl(CURSCRIPT . '_' . $part);
}
else {
	require_once MYMPS_INC . '/upfile.fun.php';
	$limit = ($typename == '新闻首页' ? 'news' : 'index');

	if ($part == 'add') {
		$name_file = 'mymps_focus';

		if ($_FILES[$name_file]['name']) {
			check_upimage($name_file);
			$destination = '/focus/';
			$mymps_image = start_upload($name_file, $destination, 0, $mymps_mymps['cfg_focus_limit'][$tpl_index['banmian']]['index']['width'], $mymps_mymps['cfg_focus_limit'][$tpl_index['banmian']]['index']['height']);
			unset($limit);
			$db->query('INSERT INTO `' . $db_mymps . 'focus` (id,image,pre_image,words,url,pubdate,focusorder,typename)' . "\r\n\t\t\t\t\t" . 'VALUES(\'\',\'' . $mymps_image[0] . '\',\'' . $mymps_image[1] . '\',\'' . $words . '\',\'' . $url . '\',\'' . $timestamp . '\',\'' . $focusorder . '\',\'' . $typename . '\')');
			clear_cache_files('focus_index');
			clear_cache_files('focus_news');
		}
	}
	else if ($part == 'edit') {
		$name_file = 'mymps_focus';

		if ($_FILES[$name_file]['name']) {
			check_upimage($name_file);
			$destination = '/focus/';
			$mymps_image = start_upload($name_file, $destination, 0, $mymps_mymps['cfg_focus_limit'][$tpl_index['banmian']]['index']['width'], $mymps_mymps['cfg_focus_limit'][$tpl_index['banmian']]['index']['height'], $image, $pre_image);
			unset($limit);
			$image = $mymps_image[0];
			$pre_image = $mymps_image[1];
		}

		$res = $db->query('UPDATE `' . $db_mymps . 'focus` SET image=\'' . $image . '\',pre_image=\'' . $pre_image . '\',words=\'' . $words . '\',url=\'' . $url . '\',focusorder=\'' . $focusorder . '\' WHERE id = \'' . $id . '\'');
		clear_cache_files('focus_index');
		clear_cache_files('focus_news');
	}
	else if ($part == 'list') {
		if (is_array($delids)) {
			foreach ($delids as $kids => $vids ) {
				$delrow = $db->getRow('SELECT image,pre_image FROM `' . $db_mymps . 'focus` WHERE id = \'' . $vids . '\'');
				@unlink(MYMPS_ROOT . $delrow['image']);
				@unlink(MYMPS_ROOT . $delrow['pre_image']);
				mymps_delete(CURSCRIPT, 'WHERE id = ' . $vids);
			}
		}

		if (is_array($displayorder)) {
			foreach ($displayorder as $key => $val ) {
				$db->query('UPDATE `' . $db_mymps . 'focus` SET focusorder = \'' . $val . '\' WHERE id = ' . $key);
			}
		}

		clear_cache_files('focus_index');
		clear_cache_files('focus_news');
	}

	write_msg('成功上传或更新 ' . $typename . ' 幻灯片!', '?part=list&typename=' . $typename, 'mymps');
}

is_object($db) && $db->Close();
$db = $mymps_global = $part = $action = $here = NULL;

?>

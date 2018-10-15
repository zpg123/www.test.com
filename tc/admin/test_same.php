<?php

define('CURSCRIPT', 'test_same');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$part = (isset($part) ? $part : 'default');

if ($part == 'default') {
	$here = '重复分类信息主题检测';
	chk_admin_purview('purview_删除重复');
	include mymps_tpl('test_same');
}
else if ($part == 'do_list') {
	$query = $db->query('SELECT COUNT(title) AS dd,title FROM `' . $db_mymps . 'information` GROUP BY title ORDER BY dd DESC LIMIT 0,' . $pagesize);
	$allarc = 0;
	include mymps_tpl('test_same_list');
	exit();
}
else if ($part == 'do_action') {
	if (empty($infoTitles)) {
		header('Content-Type: text/html; charset=' . $charset . '');
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8' . $charset . '">' . "\r\n";
		write_msg('没有指定删除的文档！');
		exit();
	}

	$totalarc = 0;
	$orderby = ($deltype == 'delnew' ? ' ORDER BY id DESC ' : ' ORDER BY id ASC ');

	foreach ($infoTitles as $titles => $title ) {
		$title = trim($title);
		$title = addslashes($title == '' ? '' : urldecode($title));
		$sql = 'SELECT id,title FROM `' . $db_mymps . 'information` WHERE title=\'' . $title . '\' ' . $orderby;
		$query = $db->query($sql);
		$rownum = $db->num_rows($query);

		if ($rownum < 2) {
			continue;
		}

		$i = 1;

		while ($row = $db->fetchRow($query)) {
			$i++;
			$nid = $row['id'];
			$ntitle = $row['title'];

			if ($rownum < $i) {
				continue;
			}

			$totalarc++;
			DelInfo($nid);
		}
	}

	$db->query(' OPTIMIZE TABLE `' . $db_mymps . 'information`; ');
	write_msg('一共删除了 [<font color=red>' . $totalarc . '</font>] 篇重复的信息主题！', 'olmsg');
	exit();
}
function DelInfo($id = '')
{
	global $db;
	global $db_mymps;

	if (!$id) {
		exit();
	}

	$get_row = $db->getRow('SELECT * FROM `' . $db_mymps . 'information` WHERE id = \'' . $id . '\'');
	@unlink(MYMPS_ROOT . $get_row['html_path']);

	if (!empty($get_row['img_path'])) {
		$del = $db->getAll('SELECT path,prepath FROM `' . $db_mymps . 'info_img` WHERE infoid=\'' . $id . '\'');

		foreach ($del as $k => $v ) {
			@unlink(MYMPS_ROOT . $v[path]);
			@unlink(MYMPS_ROOT . $v[prepath]);
		}

		mymps_delete('info_img', 'WHERE infoid = \'' . $id . '\'');
	}

	mymps_delete('comment', 'WHERE type = \'information\' AND typeid = \'' . $id . '\'');
	(1 < $get_row[modid]) && mymps_delete('information_' . $get_row[modid], 'WHERE id = \'' . $id . '\'');
	mymps_delete('information', 'WHERE id = \'' . $id . '\'');
}


?>

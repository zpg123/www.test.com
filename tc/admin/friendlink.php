<?php

define('CURSCRIPT', 'friendlink');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
$do = ($do ? $do : 'link');

switch ($do) {
case 'link':
	$part = ($part ? $part : 'list');
	$catid = (isset($catid) ? intval($catid) : '');
	require_once MYMPS_INC . '/flink.fun.php';

	if ($part == 'list') {
		chk_admin_purview('purview_友情链接');
		$where = ($ifindex ? ' WHERE ifindex = \'' . $ifindex . '\'' : ' WHERE 1');
		$where .= ($catid ? ' AND catid = \'' . $catid . '\'' : '');
		$rows_num = mymps_count('flink', $where);
		$param = setParam(array('do', 'part', 'ifindex', 'catid'));
		$links = page1('SELECT * FROM ' . $db_mymps . 'flink ' . $where . ' ORDER BY ordernumber ASC');
		$here = '友情链接管理';
		$cats = $db->getAll('SELECT * FROM `' . $db_mymps . 'category` WHERE parentid = \'0\'');
		include mymps_tpl(CURSCRIPT . '_default');
	}
	else if ($part == 'add') {
		chk_admin_purview('purview_增加链接');
		$here = '添加友情链接';
		$sql = 'SELECT * FROM ' . $db_mymps . 'flink_type ORDER BY id Asc';
		$links = $db->getAll($sql);
		include mymps_tpl(CURSCRIPT . '_add');
	}
	else if ($part == 'insert') {
		$sql = 'Insert Into `' . $db_mymps . 'flink`(id,ifindex,catid,url,webname,weblogo,typeid,createtime,ischeck,ordernumber)' . "\r\n\t\t\t\t" . 'Values(\'\',\'' . $ifindex . '\',\'' . $catid . '\',\'' . $url . '\',\'' . $webname . '\',\'' . $weblogo . '\',\'' . $typeid . '\',\'' . $timestamp . '\',\'' . $ischeck . '\',\'' . $ordernumber . '\'); ';
		$res = $db->query($sql);
		clear_cache_files('friendlink');
		write_msg('添加友情链接 ' . $webname . ' 成功', '?part=list', 'mymps');
	}
	else if ($part == 'edit') {
		$sql = 'SELECT * FROM ' . $db_mymps . 'flink WHERE id = \'' . $id . '\'';
		$link = $db->getRow($sql);
		$here = '编辑友情链接';
		include mymps_tpl(CURSCRIPT . '_edit');
	}
	else if ($part == 'update') {
		if (empty($url) || empty($webname)) {
			write_msg('请输入完整信息');
			exit();
		}

		$sql = 'UPDATE ' . $db_mymps . 'flink SET webname=\'' . $webname . '\',weblogo=\'' . $weblogo . '\',url=\'' . $url . '\',ordernumber=\'' . $ordernumber . '\',createtime=\'' . $timestamp . '\',ifindex=\'' . $ifindex . '\',catid=\'' . $catid . '\',ischeck=\'' . $ischeck . '\',msg=\'' . textarea_post_change($msg) . '\',name=\'' . $name . '\',qq=\'' . $qq . '\',email=\'' . $email . '\',typeid=\'' . $typeid . '\',dayip=\'' . $dayip . '\',pr=\'' . $pr . '\' WHERE id = \'' . $id . '\'';
		$res = $db->query($sql);
		clear_cache_files('friendlink');
		write_msg('编辑链接 ' . $webname . ' 成功', '?part=edit&id=' . $id, 'mymps');
	}
	else if ($part == 'delete') {
		if (empty($id)) {
			write_msg('没有选择记录');
		}

		mymps_delete('flink', 'WHERE id = \'' . $id . '\'');
		clear_cache_files('friendlink');
		write_msg('删除友情链接 ' . $id . ' 成功', 'friendlink.php');
	}
	else if ($part == 'doall') {
		if (is_array($ordernumber)) {
			foreach ($ordernumber as $korder => $value ) {
				$db->query('UPDATE `' . $db_mymps . 'flink` SET ordernumber = \'' . $value . '\' WHERE id = \'' . $korder . '\'');
			}
		}

		if (is_array($ids)) {
			if (in_array($do_action, array('index', 'inside', 'del', 'check1', 'check2'))) {
				if ($do_action == 'index') {
					$db->query('UPDATE `' . $db_mymps . 'flink` SET ifindex = \'2\' WHERE ' . create_in($ids, 'id'));
				}
				else if ($do_action == 'inside') {
					$db->query('UPDATE `' . $db_mymps . 'flink` SET ifindex = \'1\' WHERE ' . create_in($ids, 'id'));
				}
				else if ($do_action == 'del') {
					$db->query('DELETE FROM `' . $db_mymps . 'flink` WHERE ' . create_in($ids, 'id'));
				}
				else if ($do_action == 'check1') {
					$db->query('UPDATE `' . $db_mymps . 'flink` SET ischeck = \'1\'  WHERE ' . create_in($ids, 'id'));
				}
				else if ($do_action == 'check2') {
					$db->query('UPDATE `' . $db_mymps . 'flink` SET ischeck = \'2\'  WHERE ' . create_in($ids, 'id'));
				}
			}
		}

		$return_url = ($return_url ? $return_url : '?do=link&part=list');
		clear_cache_files('friendlink');
		write_msg('友情链接更新成功！', $return_url, 'mymps');
	}

	break;

case 'type':
	$part = ($part ? $part : 'list');
	$here = '<b>网站类型管理</b>';

	if ($part == 'list') {
		$sql = 'SELECT * FROM ' . $db_mymps . 'flink_type ORDER BY id Asc';
		$links = $db->getAll($sql);
		include mymps_tpl(CURSCRIPT . '_type');
	}
	else if ($part == 'insert') {
		$typename = trim($typename);
		$sql = 'Insert Into `' . $db_mymps . 'flink_type`(id,typename)' . "\r\n\t\t\t\t" . 'Values(\'\',\'' . $typename . '\');';
		$res = $db->query($sql);
		write_msg('添加网站分类 ' . $typename . ' 成功', '?do=type', 'mymps');
	}
	else if ($part == 'update') {
		$typename = trim($_POST['typename']);
		$sql = 'UPDATE ' . $db_mymps . 'flink_type SET typename=\'' . $typename . '\' WHERE id = \'' . $id . '\'';
		$res = $db->query($sql);
		write_msg('分类 ' . $typename . ' 更改成功', '?do=type&part=edit&id=' . $id, 'mymps');
	}
	else if ($part == 'delete') {
		if (empty($id)) {
			write_msg('没有选择记录');
		}
		else {
			mymps_delete('flink_type', 'WHERE id = \'' . $id . '\'');
			write_msg('删除分类 ' . $id . ' 成功', '?do=type', 'mymps');
		}
	}

	break;
}

is_object($db) && $db->Close();
$db = $mymps_global = $part = $action = $here = NULL;

?>

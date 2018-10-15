<?php

define('CURSCRIPT', 'admin');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$do = (isset($do) ? htmlspecialchars($do) : '');

switch ($do) {
case 'user':
	$part = ($part ? $part : 'list');

	if ($part == 'list') {
		chk_admin_purview('purview_用户列表');
		$where = ($_GET['typeid'] ? 'WHERE typeid = ' . $_GET[typeid] . '' : '');
		$sql = 'SELECT a.id,a.userid,a.uname,a.tname,a.logintime,a.loginip,a.typeid,b.typename FROM `' . $db_mymps . 'admin` AS a LEFT JOIN `' . $db_mymps . 'admin_type` AS b ON a.typeid = b.id  ' . $where . ' ORDER BY a.typeid Asc';
		$admin = $db->getAll($sql);
		$here = 'mymps管理员帐号管理';
		include mymps_tpl('admin_user');
	}
	else if ($part == 'add') {
		chk_admin_purview('purview_用户列表');
		$here = '新增网站管理员帐号';
		include mymps_tpl('admin_user_add');
	}
	else if ($part == 'insert') {
		$pwd = md5(trim($pwd));
		!is_email($email) && write_msg('电子邮件格式不正确。');
		(0 < mymps_count('admin', 'WHERE userid LIKE \'' . $userid . '\'')) && write_msg('已经存在此帐号，请选择其它用户名！');
		$db->query('INSERT INTO `' . $db_mymps . 'admin`(userid,uname,tname,pwd,typeid,email)' . "\r\n\t\t\t\t" . 'VALUES(\'' . $userid . '\',\'' . $uname . '\',\'' . $tname . '\',\'' . $pwd . '\',\'' . $typeid . '\',\'' . $email . '\'); ');
		write_admin_cache();
		write_msg('添加管理员 ' . $userid . ' 成功', '?do=user', 'record');
	}
	else if ($part == 'edit') {
		$id = ($id ? $id : $db->getOne('SELECT id FROM `' . $db_mymps . 'admin` WHERE userid = \'' . $userid . '\''));
		$sql = 'SELECT * FROM ' . $db_mymps . 'admin WHERE id = \'' . $id . '\'';
		$admin = $db->getRow($sql);

		if (!$admin) {
			write_msg('该管理员帐号不存在！');
		}

		$here = '修改管理员帐号';
		include mymps_tpl('admin_user_edit');
	}
	else if ($part == 'update') {
		if (!is_email($email)) {
			write_msg('电子邮件格式不正确。');
			exit();
		}

		$pwd = (!empty($pwd) ? 'pwd=\'' . md5($pwd) . '\',' : '');
		$db->query('UPDATE ' . $db_mymps . 'admin SET ' . $pwd . ' userid=\'' . $userid . '\',uname=\'' . $uname . '\',typeid=\'' . $typeid . '\',tname=\'' . $tname . '\',email=\'' . $email . '\' WHERE id = \'' . $id . '\'');
		write_admin_cache();
		write_msg('网站管理员 ' . $uname . ' 更改成功', 'admin.php?do=user&part=edit&id=' . $id, 'record');
	}
	else if ($part == 'delete') {
		if (empty($id)) {
			write_msg('没有选择记录');
		}
		else if (mymps_delete('admin', 'WHERE id = \'' . $id . '\'')) {
			write_admin_cache();
			write_msg('删除管理员 ' . $id . ' 成功', '?do=user', 'record');
		}
		else {
			write_msg('管理员删除失败！');
		}
	}

	break;

case 'group':
	require_once dirname(__FILE__) . '/include/mymps.menu.inc.php';
	$part = ($part ? $part : 'list');

	if ($part == 'list') {
		chk_admin_purview('purview_用户组');
		$sql = 'SELECT * FROM ' . $db_mymps . 'admin_type ORDER BY id desc';
		$group = $db->getAll($sql);
		$here = '系统用户组管理';
		include mymps_tpl('admin_group');
	}
	else if ($part == 'add') {
		chk_admin_purview('purview_用户组');
		$here = '新增用户组';
		include mymps_tpl('admin_group_add');
	}
	else if ($part == 'insert') {
		$purview = (is_array($_POST['purview']) ? implode(',', $_POST['purview']) : '');
		$typename = trim($_POST['typename']);
		$ifsystem = trim($_POST['ifsystem']);

		if (!empty($typename)) {
			$sql = 'select count(*) from ' . $db_mymps . 'admin_type where typename = \'' . $typename . '\'';
			$db->getOne($sql) && write_msg('已经存在此用户组，请重新输入！');
		}

		$res = $db->query('Insert Into `' . $db_mymps . 'admin_type`(id,typename,ifsystem,purviews)' . "\r\n\t\t\t\t" . 'Values(\'\',\'' . $typename . '\',\'' . $ifsystem . '\',\'' . $purview . '\')');
		write_admin_cache();
		write_msg('添加用户组 ' . $typename . ' 成功', '?do=group', 'record');
	}
	else if ($part == 'edit') {
		$sql = 'SELECT * FROM ' . $db_mymps . 'admin_type WHERE id = \'' . $id . '\'';
		$group = $db->getRow($sql);
		$purview = explode(',', $group['purviews']);
		$here = '修改用户组权限';
		include mymps_tpl('admin_group_edit');
	}
	else if ($part == 'update') {
		$purview = (is_array($purview) ? implode(',', $purview) : '');
		$sql = 'UPDATE `' . $db_mymps . 'admin_type` SET typename=\'' . $typename . '\',ifsystem=\'' . $ifsystem . '\',purviews=\'' . $purview . '\' WHERE id = \'' . $id . '\'';

		if ($res = $db->query($sql)) {
			write_admin_cache();
			write_msg('用户组 ' . $typename . ' 修改成功', '?do=group&part=edit&id=' . $id, 'record');
		}
	}
	else if ($part == 'delete') {
		if (empty($id)) {
			write_msg('没有选择记录');
		}
		else if (0 < mymps_count('admin', 'WHERE typeid = \'' . $id . '\'')) {
			write_msg('该用户组下尚有成员，不能删除！');
		}
		else if (mymps_delete('admin_type', 'WHERE id = \'' . $id . '\'')) {
			write_admin_cache();
			write_msg('删除用户组 ' . $id . ' 成功', '?do=group', 'record');
		}
		else {
			write_msg('管理员用户组删除失败！');
		}
	}

	break;
}

is_object($db) && $db->Close();
$db = $mymps_global = $part = $action = $here = NULL;
function get_admin_group($typeid = '')
{
	global $db;
	global $db_mymps;
	$admin = $db->getAll('SELECT * FROM `' . $db_mymps . 'admin_type` ORDER BY id desc');

	foreach ($admin as $row ) {
		$mymps .= '<option value="' . $row[id] . '"';
		$mymps .= ($typeid == $row[id] ? 'selected style="background-color:#6EB00C;color:white"' : '');
		$mymps .= '>' . $row[typename] . '</option>';
	}

	return $mymps;
}


?>

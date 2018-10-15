<?php

define('CURSCRIPT', 'news');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_DATA . '/info.level.inc.php';
require_once MYMPS_INC . '/db.class.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$part = ($part ? $part : 'list');
$iscommend_arr = array('正常', '<font color=red>推荐</font>');

if (!submit_check(CURSCRIPT . '_submit')) {
	chk_admin_purview('purview_新闻管理');

	if ($part == 'list') {
		$here = '网站新闻管理';
		$where .= ($title != '' ? 'WHERE a.title LIKE \'%' . $title . '%\'' : 'WHERE 1');
		$where .= ($catid ? ' AND a.catid IN (' . get_cat_children($catid, 'channel') . ')' : '');
		$sql = 'SELECT a.*,b.catname FROM `' . $db_mymps . 'news` AS a LEFT JOIN `' . $db_mymps . 'channel` AS b ON a.catid = b.catid ' . $where . ' ORDER BY a.begintime DESC';
		$rows_num = $db->getOne('SELECT COUNT(*) FROM `' . $db_mymps . 'news` AS a ' . $where);
		$param = setParam(array('part', 'title', 'catid'));
		$news = page1($sql);
		include mymps_tpl('news_list');
	}
	else {
		if (($part == 'edit') && $id) {
			$row = $db->getRow('SELECT * FROM ' . $db_mymps . 'news WHERE id = \'' . $id . '\'');
			$acontent = get_editor('content', 'Default', $row[content], '100%', '600px');
			$here = '编辑新闻';
			include mymps_tpl(CURSCRIPT);
		}
		else if ($part == 'add') {
			$acontent = get_editor('content', 'Default', '', '100%', '600px');
			$here = '添加新闻';
			include mymps_tpl(CURSCRIPT);
		}
		else if ($part == 'del') {
			if (empty($id)) {
				write_msg('没有选择记录');
			}

			mymps_delete('news', 'WHERE id = \'' . $id . '\'');
			write_msg('删除新闻 ' . $id . ' 成功', $url, 'Mymps');
		}
	}
}
else if ($part == 'list') {
	$i = '';

	if (is_array($delids)) {
		$i = 1;

		foreach ($delids as $kids => $vids ) {
			mymps_delete('news', 'WHERE id = ' . $vids);
		}
	}
	else {
		write_msg('你没有指定新闻ID');
	}

	($i == 1) && write_msg('指定的新闻ID已经被删除！', $url, 'insertecord');
}
else if ($part == 'add') {
	!($title) && write_msg('请填写新闻标题');
	!($catid) && write_msg('请填写分类名称');
	($isjump == 1) && !$redirect_url && write_msg('请输入新闻跳转地址!');
	($isjump != 1) && !$content && write_msg('请填写新闻内容!');

	if ($isjump == 1) {
		$do_mymps = $db->query('INSERT INTO `' . $db_mymps . 'news` (title,catid,redirect_url,isjump,isbold,iscommend,begintime,introduction,author,source,keywords) VALUES (\'' . $title . '\',\'' . $catid . '\',\'' . $redirect_url . '\',\'1\',\'' . $isbold . '\',\'' . $iscommend . '\',\'' . $timestamp . '\',\'' . $introduction . '\',\'' . $author . '\',\'' . $from . '\',\'' . $keywords . '\')');
	}
	else {
		$redirect_url = '';

		if ($ifout == 'bodyimg') {
			$imgpath = bodyimg(mystripslashes($content));
		}

		$do_mymps = $db->query('INSERT INTO `' . $db_mymps . 'news` (title,keywords,catid,isbold,iscommend,content,hit,perhit,begintime,introduction,author,source,imgpath) VALUES' . "\r\n" . '(\'' . $title . '\',\'' . $keywords . '\',\'' . $catid . '\',\'' . $isbold . '\',\'' . $iscommend . '\',\'' . $content . '\',\'' . $hit . '\',\'' . $perhit . '\',\'' . $timestamp . '\',\'' . $introduction . '\',\'' . $author . '\',\'' . $from . '\',\'' . $imgpath . '\')');
	}

	$id = $db->insert_id();
	$viewpath = $mymps_global['SiteUrl'] . '/news.php?id=' . $id;
	if (is_array($isfocus) && $imgpath) {
		foreach ($isfocus as $kfocus => $vfocus ) {
			if ($vfocus == 'index') {
				$typename = '网站首页';
			}
			else {
				$typename = '新闻首页';
			}

			$db->query('INSERT INTO `' . $db_mymps . 'focus` (image,pre_image,words,url,pubdate,focusorder,typename)' . "\r\n\t\t\t\t" . 'VALUES(\'' . $imgpath . '\',\'' . $imgpath . '\',\'' . $title . '\',\'' . $viewpath . '\',\'' . $timestamp . '\',\'' . $id . '\',\'' . $typename . '\')');
		}

		clear_cache_files('focus_index');
		clear_cache_files('focus_news');
	}

	$nav_path = '新闻管理 &raquo 增加新闻';
	$message = '成功增加一篇新闻 <<' . $title . '>>';
	$after_action = '<a href="../news.php?id=' . $id . '" target="_blank"><u>查看该新闻</u></a>&nbsp;&nbsp;<a href=\'?part=add\'><u>继续增加新闻</u></a>&nbsp;&nbsp;<a href=\'?part=edit&id=' . $id . '\'><u>重新编辑该新闻</u></a>&nbsp;&nbsp;<a href=\'?part=list\'><u>已增加新闻管理</u></a>';
	show_message($nav_path, $message, $after_action);
}
else if ($part == 'edit') {
	!($id) && write_msg('您未指定要编辑的新闻');
	!($title) && write_msg('请填写新闻标题');
	!($catid) && write_msg('请填写分类名称');
	($isjump == 1) && !$redirect_url && write_msg('请输入新闻跳转地址!');
	($isjump != 1) && !$content && write_msg('请填写新闻内容!');
	$viewpath = $mymps_global['SiteUrl'] . '/news.php?id=' . $id;

	if ($isjump == 1) {
		$do_mymps = $db->query('UPDATE `' . $db_mymps . 'news` SET title = \'' . $title . '\' , redirect_url = \'' . $redirect_url . '\' , catid = \'' . $catid . '\', keywords = \'' . $keywords . '\' , iscommend = \'' . $iscommend . '\' , isbold = \'' . $isbold . '\' , isjump = \'1\' , hit = \'' . $hit . '\' , perhit = \'' . $perhit . '\' , imgpath = \'' . $imgpath . '\' , author = \'' . $author . '\' , source = \'' . $from . '\' , introduction = \'' . $introduction . '\' WHERE id = \'' . $id . '\'');
	}
	else {
		$redirect_url = '';

		if ($ifout == 'bodyimg') {
			$imgpath = bodyimg(mystripslashes($content));
		}

		$do_mymps = $db->query('UPDATE `' . $db_mymps . 'news` SET title = \'' . $title . '\', content = \'' . $content . '\', keywords = \'' . $keywords . '\' , catid = \'' . $catid . '\' , iscommend = \'' . $iscommend . '\' , isbold = \'' . $isbold . '\' , isjump = \'0\' , hit = \'' . $hit . '\' , perhit = \'' . $perhit . '\' ,begintime = \'' . $timestamp . '\' , imgpath = \'' . $imgpath . '\' , author = \'' . $author . '\' , source = \'' . $from . '\' , introduction = \'' . $introduction . '\' WHERE id = \'' . $id . '\'');
	}

	if (is_array($isfocus) && $imgpath) {
		foreach ($isfocus as $kfocus => $vfocus ) {
			if ($vfocus == 'index') {
				$typename = '网站首页';
			}
			else {
				$typename = '新闻首页';
			}

			$db->query('INSERT INTO `' . $db_mymps . 'focus` (image,pre_image,words,url,pubdate,focusorder,typename)' . "\r\n\t\t\t\t" . 'VALUES(\'' . $imgpath . '\',\'' . $imgpath . '\',\'' . $title . '\',\'' . $viewpath . '\',\'' . $timestamp . '\',\'' . $id . '\',\'' . $typename . '\')');
		}

		clear_cache_files('focus_index');
		clear_cache_files('focus_news');
	}

	$nav_path = '新闻管理 &raquo 修改新闻';
	$message = '成功修改新闻 <<' . $title . '>>';
	$after_action = '<a href=' . $viewpath . ' target="_blank"><u>查看该新闻</u></a>&nbsp;&nbsp;<a href=\'?part=add\'><u>我要新增一篇新闻</u></a>&nbsp;&nbsp;<a href=\'?part=edit&id=' . $id . '\'><u>重新编辑该新闻</u></a>&nbsp;&nbsp;<a href=\'?part=list\'><u>已增加新闻管理</u></a>';
	show_message($nav_path, $message, $after_action);
}

is_object($db) && $db->Close();
$mymps_global = $db = $db_mymps = $part = NULL;
echo '<br />' . "\r\n";
function bodyimg($obj)
{
	if (isset($obj)) {
		if (preg_match('<img.*src=["](.*?)["].*?>', $obj, $regs)) {
			return $obj = $regs[1];
		}
	}
	else {
		return false;
	}
}

function mystripslashes($string)
{
	if (!is_array($string)) {
		return stripslashes($string);
	}

	foreach ($string as $key => $val ) {
		$string[$key] = new_stripslashes($val);
	}

	return $string;
}


?>

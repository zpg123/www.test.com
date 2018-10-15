<?php

define('CURSCRIPT', 'navurl');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';
require_once dirname(__FILE__) . '/include/color.inc.php';
require_once dirname(__FILE__) . '/include/ifview.inc.php';
(!defined('IN_ADMIN') || !defined('IN_MYMPS')) && exit('Access Denied');
$typeid = ($typeid ? intval($typeid) : 3);

if (!submit_check(CURSCRIPT . '_submit')) {
	chk_admin_purview('purview_链接导航');
	$nav_type = array();
	$nav_type[3] = '主导航';
	$nav_type[1] = '副导航';
	$nav_type[2] = '尾部导航';
	$target = array('_blank' => '新窗口', '_self' => '当前窗口');

	if ($part == 'restore') {
		restore_headerurl();
		write_msg('成功恢复默认主导航!', '?typeid=3');
	}
	else if ($part == 'restorefooter') {
		restore_footerurl();
		write_msg('成功恢复默认尾部导航', '?typeid=2');
	}
	else {
		$here = '链接导航设置';
		$where = ' WHERE typeid = \'' . $typeid . '\'';
		$rows_num = mymps_count(CURSCRIPT, $where);
		$param = setParam(array('part', 'typeid'));
		$url = array();
		$url = page1('SELECT * FROM ' . $db_mymps . CURSCRIPT . ' ' . $where . ' ORDER BY displayorder ASC');
		include mymps_tpl(CURSCRIPT);
	}
}
else {
	if (is_array($navtitle)) {
		foreach ($navtitle as $key => $v ) {
			$db->query('UPDATE `' . $db_mymps . 'navurl` SET title = \'' . $v . '\',displayorder = \'' . $displayorder[$key] . '\',url=\'' . $navurl[$key] . '\',isview=\'' . $isviewids[$key] . '\',ico=\'' . $icoids[$key] . '\',target=\'' . $target[$key] . '\',flag=\'' . $flag[$key] . '\',color=\'' . $showcolor[$key] . '\' WHERE id = ' . $key);
		}
	}

	if (is_array($newtitle) && is_array($newurl)) {
		foreach ($newtitle as $key => $q ) {
			$title = trim($q);
			$url = mhtmlspecialchars(trim($newurl[$key]));
			$typeid = mhtmlspecialchars(trim($newtypeid[$key]));
			$displayorder = mhtmlspecialchars(trim($newdisplayorder[$key]));
			$isview = mhtmlspecialchars(trim($newisview[$key]));
			$ico = mhtmlspecialchars(trim($newico[$key]));
			$target = ($newtarget[$key] ? mhtmlspecialchars(trim($newtarget[$key])) : '_blank');
			$showcolor = mhtmlspecialchars(trim($newshowcolor[$key]));
			$flag = mhtmlspecialchars(trim($newflag[$key]));
			$flag = ($flag ? $flag : 'outlink');
			if ($title && $url) {
				$db->query('INSERT INTO `' . $db_mymps . 'navurl` (url,title,ico,typeid,isview,target,flag,displayorder,createtime) VALUES (\'' . $url . '\',\'' . $title . '\',\'' . $ico . '\',\'' . $typeid . '\',\'' . $isview . '\',\'' . $target . '\',\'' . $flag . '\',\'' . $displayorder . '\',\'' . $timestamp . '\')');
			}

			if ($typeid == 1) {
				clear_cache_files('city_' . $cityid);
			}
		}
	}

	if (is_array($delids)) {
		foreach ($delids as $kids => $vids ) {
			mymps_delete(CURSCRIPT, 'WHERE id = ' . $vids);
		}
	}

	clear_cache_files('navurl_head');
	clear_cache_files('navurl_foot');
	clear_cache_files('navurl_header');
	write_msg('导航链接设置更新成功！', $forward_url, 'MympsRecord');
}

is_object($db) && $db->Close();
$mymps_global = $db = $db_mymps = $part = NULL;
function get_navtype_options($typeid = '')
{
	global $nav_type;

	foreach ($nav_type as $key => $value ) {
		$mymps .= '<option value=' . $key . '';
		$mymps .= ($typeid == $key ? ' style = "background-color:#6EB00C;color:white" selected>' : '>');
		$mymps .= $value . '</option>';
	}

	return $mymps;
}

function get_target_options($ttarget = '')
{
	global $target;

	foreach ($target as $key => $value ) {
		$mymps .= '<option value=' . $key;
		$mymps .= ($ttarget == $key ? ' style = "background-color:#6EB00C;color:white" selected>' : '>');
		$mymps .= $value . '</option>';
	}

	return $mymps;
}

function restore_footerurl()
{
	global $db;
	global $db_mymps;
	global $seo;
	global $timestamp;
	global $mymps_global;

	if (!$seo) {
		$seo = get_seoset();
	}

	$db->query('DELETE FROM `' . $db_mymps . 'navurl` WHERE typeid = \'2\'');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'about` ORDER BY displayorder ASC');

	while ($row = $db->fetchRow($query)) {
		$about[$row['id']]['id'] = $row['id'];
		$about[$row['id']]['name'] = $row['typename'];
		$about[$row['id']]['uri'] = Rewrite('about', array('part' => 'aboutus', 'html_path' => '/aboutus/' . $row['dir_typename'] . $seo['seo_htmlext'], 'id' => $row['id']));
	}

	$url = array();
	$url['faq']['name'] = '网站帮助';
	$url['faq']['uri'] = Rewrite('about', array('part' => 'faq', 'html_path' => '/faq/'));
	$url['friendlink']['name'] = '友情链接';
	$url['friendlink']['uri'] = Rewrite('about', array('part' => 'friendlink', 'html_path' => '/friendlink/'));
	$url['annnounce']['name'] = '网站公告';
	$url['annnounce']['uri'] = Rewrite('about', array('part' => 'announce', 'html_path' => '/announce/'));
	$url['sitemap']['name'] = '网站地图';
	$url['sitemap']['uri'] = Rewrite('about', array('part' => 'sitemap', 'html_path' => '/sitemap.html'));
	$url = (is_array($about) ? array_merge($about, $url) : $url);
	$i = 0;

	foreach ($url as $k => $v ) {
		$i = $i + 1;
		$db->query('INSERT INTO `' . $db_mymps . 'navurl` (url,target,title,flag,typeid,isview,displayorder,createtime)VALUES(\'' . $v['uri'] . '\',\'_blank\',\'' . $v['name'] . '\',\'' . $k . '\',\'2\',\'2\',\'' . $i . '\',\'' . $timestamp . '\')');
	}

	clear_cache_files('navurl_foot');
}

function restore_headerurl()
{
	global $db;
	global $db_mymps;
	$db->query('DELETE FROM `' . $db_mymps . 'navurl` WHERE typeid = \'3\'');
	$query = $db->query('SELECT * FROM `' . $db_mymps . 'category` WHERE parentid = \'0\'');

	while ($row = $db->fetchRow($query)) {
		$category[$row['catid']]['catid'] = $row['catid'];
		$category[$row['catid']]['name'] = $row['catname'];
		$category[$row['catid']]['uri'] = Rewrite('category', array('catid' => $row['catid'], 'html_dir' => $row['html_dir'], 'dir_typename' => $row['dir_typename']));
		$category[$row['catid']]['flag'] = $row['catid'];
	}

	$category = ($category ? $category : array());
	@include MYMPS_DATA . '/caches/pluginmenu_member.php';

	if (is_array($data)) {
		$plugin = array();

		foreach ($data as $k => $v ) {
			if (($k == 'news') || ($k == 'goods')) {
				$plugin[$k]['catid'] = $k;
				$plugin[$k]['flag'] = $k;
				$plugin[$k]['uri'] = rewrite($k, array('part' => 'index'));
				$plugin[$k]['name'] = $v;
			}
			else {
				$plugin[$k]['catid'] = $k;
				$plugin[$k]['flag'] = $k;
				$plugin[$k]['uri'] = plugin_url($k, array('cate_id' => 0, 'id' => 0));
				$plugin[$k]['name'] = $v;
			}
		}

		$plugin['corp']['catid'] = 'corp';
		$plugin['corp']['flag'] = 'corp';
		$plugin['corp']['uri'] = rewrite('corp', array('part' => 'index'));
		$plugin['corp']['name'] = '店铺';
		unset($data);
	}

	$url = (is_array($plugin) && is_array($category) ? array_merge($category, $plugin) : $category);
	$i = 0;

	if (is_array($url)) {
		foreach ($url as $k => $v ) {
			$i = $i + 1;
			$db->query('INSERT INTO `' . $db_mymps . 'navurl` (url,target,title,flag,typeid,isview,displayorder,createtime)VALUES(\'' . $v['uri'] . '\',\'_self\',\'' . $v['name'] . '\',\'' . $v['catid'] . '\',\'3\',\'2\',\'' . $i . '\',\'' . $timestamp . '\')');
		}
	}

	clear_cache_files('navurl_header');
}


?>

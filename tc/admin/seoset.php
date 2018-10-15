<?php

define('CURSCRIPT', 'seoset');
require_once dirname(__FILE__) . '/global.php';
require_once MYMPS_INC . '/db.class.php';

if (!submit_check(CURSCRIPT . '_submit')) {
	$here = MPS_SOFTNAME . '_SEO伪静态';
	chk_admin_purview('purview_SEO伪静态');
	$res = $db->query('SELECT description,value FROM ' . $db_mymps . 'config WHERE type=\'seo\'');

	while ($row = $db->fetchRow($res)) {
		$seo[$row['description']] = $row['value'];
	}

	include mymps_tpl(CURSCRIPT);
}
else {
	$seo_setarr = array('seo_sitename', 'seo_keywords', 'seo_description', 'seo_force_about', 'seo_force_category', 'seo_force_info', 'seo_force_news', 'seo_force_yp', 'seo_force_space', 'seo_force_store', 'seo_force_goods', 'seo_html_make');
	mymps_delete('config', 'WHERE type = \'seo\'');

	foreach ($seo_setarr as $key ) {
		if ($key == 'keywords') {
			$key = str_replace('，', ',', $key);
		}

		$db->query('INSERT ' . $db_mymps . 'config (description,value,type) VALUES (\'' . $key . '\',\'' . $$key . '\',\'seo\')');
	}

	foreach (array('category_tree', 'corp_tree', 'seoset') as $range ) {
		clear_cache_files($range);
	}

	updateadvertisement();
	write_msg('系统SEO设置更新成功！', 'seoset.php', 'WriteRecord');
}

is_object($db) && $db->Close();
$mymps_global = $db = $db_mymps = $part = NULL;
function GetSeoType($seo_type = '', $formname = 'seo_type')
{
	global $mymps_mymps;

	if ($formname == 'seo_force_store') {
		$seo_arr = array('active' => '动态', 'rewrite' => '标准伪静态');
	}
	else {
		if (in_array($formname, array('seo_force_category', 'seo_force_info')) && ($mymps_mymps['cfg_if_rewritepy'] == 1)) {
			$seo_arr = array('active' => '动态', 'rewrite' => '标准伪静态', 'rewrite_py' => '拼音伪静态');
		}
		else {
			$seo_arr = array('active' => '动态', 'rewrite' => '标准伪静态');
		}
	}

	$seo_type_form = '<select name=\'' . $formname . '\' id=\'' . $formname . '\'>';

	foreach ($seo_arr as $k => $v ) {
		if (($k == $seo_type) && ($k != '')) {
			$seo_type_form .= '<option value=\'' . $k . '\' selected style=\'background-color:#6EB00C;color:white\'>' . $v . '/' . $k . '</option>' . "\r\n";
		}
		else {
			$seo_type_form .= '<option value=\'' . $k . '\'>' . $v . '/' . $k . '</option>' . "\r\n";
		}
	}

	$seo_type_form .= '</select>' . "\r\n";
	return $seo_type_form;
}


?>

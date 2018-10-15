<?php

if (($if_save == 'yes') && !empty($html_style)) {
	mymps_delete('config', 'WHERE description = \'glb_html_information\'');
	$db->query('INSERT INTO `' . $db_mymps . 'config` (description,value) VALUES (\'glb_html_information\',\'' . $html_style . '\')');
	update_config_cache();
}

($part == 'information') && $timer->start();
$cat_limit = '';
$end_limit = (!empty($endid) ? 'AND id <= \'' . $endid . '\'' : '');
$start_limit = (!empty($startid) ? 'AND id >= \'' . $startid . '\'' : '');

if (is_array($information_catid)) {
	foreach ($information_catid as $htmlkey => $htmlval ) {
		$htmlinfo_catid .= $htmlval . ',';
	}

	$htmlinfo_catid = substr($htmlinfo_catid, 0, -1);
	$cat_limit = 'AND catid IN(' . $htmlinfo_catid . ')';
}

$htmlinfo_ids = $db->getAll('SELECT id,html_path FROM ' . $db_mymps . 'information WHERE info_level > \'0\' ' . $cat_limit . ' ' . $start_limit . ' ' . $end_limit);

foreach ($htmlinfo_ids as $$htmlinfo_idkey => $htmlinfo_idval ) {
	$id = $htmlinfo_idval['id'];
	$infohtmlpath = $htmlinfo_idval['html_path'];
	$template_info = $db->getOne('SELECT a.template_info FROM `' . $db_mymps . 'category` AS a LEFT JOIN `' . $db_mymps . 'information` AS b ON b.catid = a.catid WHERE b.id = \'' . $id . '\'');
	$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');
	($submit == 'makehtml') && include MYMPS_ASS . '/info.php';
	$filepath = (empty($infohtmlpath) ? $seo['seo_htmldir'] . replace_html_style($mymps_global['glb_html_information'], $id) : $infohtmlpath);

	if ($submit == 'makehtml') {
		$html_c = $smarty->fetch(mymps_tpl($template_info ? $template_info : 'info_2', 'smarty'), $id);
		$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
		$db->query('UPDATE `' . $db_mymps . 'information` SET html_path = \'' . $filepath . '\' WHERE id = \'' . $id . '\'');
		echo inner('分类信息 <a href="' . $filepath . '" target="_blank">' . $filepath . '</a> 生成成功！');
	}
	else {
		if (($submit == 'delhtml') && !empty($filepath)) {
			@unlink(MYMPS_ROOT . $filepath);
			echo inner('<a href="' . $filepath . '" target="_blank">' . $filepath . '</a> 删除成功！');
		}
	}

	ob_flush();
	flush();
}

if ($part == 'information') {
	$timer->stop();
	echo '<br /><br />共耗时：' . $timer->spent();
}

?>

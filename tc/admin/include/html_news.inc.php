<?php

$cat = NULL;
$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');
if (($if_save == 'yes') && !empty($html_style)) {
	mymps_delete('config', 'WHERE description = \'glb_html_news\'');
	$db->query('INSERT INTO `' . $db_mymps . 'config` (description,value) VALUES (\'glb_html_news\',\'' . $html_style . '\')');
	update_config_cache();
}

($part == 'news') && $timer->start();
$cat_limit = '';
$end_limit = (!empty($endid) ? 'AND id <= \'' . $endid . '\'' : '');
$start_limit = (!empty($startid) ? 'AND id >= \'' . $startid . '\'' : '');

if (is_array($news_catid)) {
	foreach ($news_catid as $htmlkey => $htmlval ) {
		$htmlnews_catid .= $htmlval . ',';
	}

	$htmlnews_catid = substr($htmlnews_catid, 0, -1);
	$cat_limit = 'AND catid IN(' . $htmlnews_catid . ')';
}

$htmlnews_ids = $db->getAll('SELECT id,html_path FROM ' . $db_mymps . 'news WHERE isjump = \'0\' ' . $cat_limit . ' ' . $start_limit . ' ' . $end_limit);

foreach ($htmlnews_ids as $$htmlnews_idkey => $htmlnews_idval ) {
	$id = $htmlnews_idval['id'];
	$newshtmlpath = $htmlnews_idval['html_path'];
	($submit == 'makehtml') && include MYMPS_ASS . '/news.php';
	$filepath = (empty($newshtmlpath) ? $seo['seo_htmldir'] . $seo['seo_htmlnewsdir'] . replace_html_style($mymps_global['glb_html_news'], $id) : $newshtmlpath);

	if ($submit == 'makehtml') {
		$html_c = $smarty->fetch(mymps_tpl('news', 'smarty'));
		$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
		$db->query('UPDATE `' . $db_mymps . 'news` SET html_path = \'' . $filepath . '\' WHERE id = \'' . $id . '\'');
		echo inner('新闻<a href="' . $filepath . '" target="_blank">' . $filepath . '</a> 生成成功！');
	}
	else {
		if (($submit == 'delhtml') && !empty($filepath)) {
			@unlink(MYMPS_ROOT . $filepath);
			echo inner('新闻<a href="' . $filepath . '" target="_blank">' . $filepath . '</a> 删除成功！');
		}
	}

	ob_flush();
	flush();
}

if ($part == 'news') {
	$timer->stop();
	echo '<br /><br />共耗时：' . $timer->spent();
}

?>

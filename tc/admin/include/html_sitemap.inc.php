<?php

($part == 'sitemap') && $timer->start();

if ($type == 'normal') {
	include MYMPS_ASS . '/sitemap.php';
	$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');

	if ($submit == 'makehtml') {
		$html_c = $smarty->fetch(mymps_tpl('sitemap', 'smarty'));
		$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . '/sitemap.html', $html_c);
		$mymps .= ($html_m ? '网站地图 [sitemap.html] 生成成功！' : '网站地图生成失败！请检测相关目录的写入权限，LINUX下须为0777可写');
		$mymps .= '<br /><a href="' . $mymps_global[SiteUrl] . '/sitemap.html" target=_blank>点此此处浏览该文件 &raquo;</a><br /><br />';
	}
	else if ($submit == 'delhtml') {
		@unlink(MYMPS_ROOT . '/sitemap.html');
		$mymps .= '网站地图 [sitemap.html] 删除成功！';
	}
}

if ($part == 'sitemap') {
	$timer->stop();
	echo $mymps . '<br /><br />总共耗费时间：' . $timer->spent();
}

?>

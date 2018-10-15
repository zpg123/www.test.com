<?php

($part == 'index') && $timer->start();
unset($cat);
$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');
($submit == 'makehtml') && include MYMPS_ASS . '/index.php';
$filepath = ($html_name ? '/' . $html_name : '/index' . $seo['seo_htmlext']);

if ($submit == 'makehtml') {
	$html_c = $smarty->fetch(mymps_tpl($tpl_index['banmian'] ? $tpl_index['banmian'] : 'simple', 'smarty'));
	$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
	$mymps .= ($html_m ? '网站主页 ' . $filepath . ' 生成成功！' : '网站主页更新失败！请检测相关目录的写入权限，LINUX下须为0777可写');
	$mymps .= '<br /><br /><a href=' . $mymps_global['SiteUrl'] . $filepath . ' target=_blank>点击此处浏览该文件 &raquo;</a>';
}
else {
	if (($submit == 'delhtml') && $filepath) {
		@unlink(MYMPS_ROOT . $filepath);
		$mymps .= '网站首页html文件删除成功！';
	}
}

echo inner($mymps);
ob_flush();
flush();

if ($part == 'index') {
	$timer->stop();
	echo '<br /><br />共耗时：' . $timer->spent();
}

$tpl_index = NULL;

?>

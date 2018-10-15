<?php

if (is_array($information_catid)) {
	$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');
	($part == 'category') && $timer->start();
	$page_start = (!$page_start ? 1 : intval($page_start));
	$page_end = (isset($page_end) ? intval($page_end) : '');

	foreach ($information_catid as $k => $v ) {
		$catid = $v;
		$html_make_row = $db->getRow('SELECT html_dir,catname,template FROM `' . $db_mymps . 'category` WHERE catid = \'' . $v . '\'');
		$total = iszero(ceil(mymps_count('information', 'WHERE catid in (' . get_cat_children($v, 'category') . ')') / 15));
		$pend = (($total < $page_end) || empty($page_end) ? $total : $page_end);
		($pend < $page_start) && exit('当前生成 ' . $row[catname] . '，起始页码为 ' . $page_start . ' ,终页码为 ' . $page_end . '，起始页码不能小于终页码');

		for ($page = $page_start; $page <= $pend; $page++) {
			$areaid = 0;
			($submit == 'makehtml') && include MYMPS_ASS . '/info_list.php';
			$cat = NULL;
			$filepath = $seo['seo_htmldir'] . $html_make_row['html_dir'] . 'list_' . $page . $seo['seo_htmlext'];
			$indexpath = $seo['seo_htmldir'] . $html_make_row['html_dir'] . 'index' . $seo['seo_htmlext'];

			if ($submit == 'makehtml') {
				$html_c = $smarty->fetch(mymps_tpl($html_make_row['template'] ? $html_make_row['template'] : 'list', 'smarty'), $v . $page);
				$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
				echo inner('信息栏目 [' . $html_make_row[catname] . '] ' . $filepath . ' 生成成功！');

				if ($page == 1) {
					echo copy(MYMPS_ROOT . $filepath, MYMPS_ROOT . $indexpath) ? inner('成功复制' . $filepath . '为' . $indexpath . '!') : inner('复制' . $filepath . '为' . $indexpath . '失败!');
				}
			}
			else {
				if (($submit == 'delhtml') && $filepath) {
					@unlink(MYMPS_ROOT . $filepath);
					echo inner('信息栏目 [' . $html_make_row[catname] . '] ' . $filepath . ' 删除成功！');

					if ($page == 1) {
						@unlink(MYMPS_ROOT . $indexpath);
						echo inner('成功删除' . $indexpath . '!');
					}
				}
			}
		}

		ob_flush();
		flush();
	}

	if ($part == 'category') {
		$timer->stop();
		echo '<br /><br />共耗时：' . $timer->spent();
	}
}
else {
	exit(inner('您还没有指定需要生成的页面！'));
}

?>

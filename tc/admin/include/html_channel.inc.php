<?php

@include MYMPS_DATA . '/caches/plugin.php';
$pluginsettings = $data;
unset($data);
$cat = NULL;
$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');

if (is_array($news_catid)) {
	($part == 'channel') && $timer->start();
	$page_start = (!$page_start ? 1 : intval($page_start));
	$page_end = (isset($page_end) ? intval($page_end) : '');

	foreach ($news_catid as $k => $v ) {
		$catid = $v;

		if ($v == 0) {
			($submit == 'makehtml') && include MYMPS_ASS . '/news_index.php';
			$filepath = $seo[seo_htmldir] . $seo[seo_htmlnewsdir] . '/index' . $seo[seo_htmlext];

			if ($submit == 'makehtml') {
				$html_c = $smarty->fetch(mymps_tpl('news_index', 'smarty'));
				$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
				echo inner('新闻首页 ' . $filepath . ' 生成成功！ <a href="' . $filepath . '" target="_blank">点击此处浏览该文件</a>');
			}
			else if ($submit == 'delhtml') {
				@unlink(MYMPS_ROOT . $filepath);
				echo inner('新闻首页' . $filepath . ' 删除成功！');
			}

			ob_flush();
			flush();
		}
		else {
			$html_make_row = $db->getRow('SELECT html_dir,catname FROM `' . $db_mymps . 'channel` WHERE catid = \'' . $v . '\'');
			$catid = $v;
			$total = iszero(ceil(mymps_count('news', 'WHERE catid in (' . get_cat_children($v, 'channel') . ')') / $mymps_global['cfg_page_line']));
			$pend = (($total < $page_end) || empty($page_end) ? $total : $page_end);
			($pend < $page_start) && exit('当前生成 ' . $row[catname] . '，起始页码为 ' . $page_start . ' ,终页码为 ' . $page_end . '，起始页码不能小于终页码');

			for ($page = $page_start; $page <= $pend; $page++) {
				($submit == 'makehtml') && include MYMPS_ASS . '/news_list.php';
				$filepath = $seo['seo_htmldir'] . $seo['seo_htmlnewsdir'] . $html_make_row['html_dir'] . 'list_' . $page . $seo[seo_htmlext];
				$indexpath = $seo['seo_htmldir'] . $seo['seo_htmlnewsdir'] . $html_make_row['html_dir'] . 'index' . $seo[seo_htmlext];

				if ($submit == 'makehtml') {
					$html_c = $smarty->fetch(mymps_tpl('news_list', 'smarty'));
					$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
					echo inner('新闻栏目 [' . $html_make_row[catname] . '] ' . $filepath . ' 生成成功！');
				}
				else {
					if (($submit == 'delhtml') && $filepath) {
						@unlink(MYMPS_ROOT . $filepath);
						echo inner('新闻栏目 [' . $html_make_row[catname] . '] ' . $filepath . ' 删除成功！');
					}
				}

				if ($page == 1) {
					if ($submit == 'makehtml') {
						echo copy(MYMPS_ROOT . $filepath, MYMPS_ROOT . $indexpath) ? inner('成功复制' . $filepath . '为' . $indexpath . '!') : inner('复制' . $filepath . '为' . $indexpath . '失败!');
						$db->query('UPDATE `' . $db_mymps . 'channel` SET htmlpath = \'' . $indexpath . '\' WHERE catid = \'' . $catid . '\'');
					}
					else {
						if (($submit == 'delhtml') && $indexpath) {
							@unlink(MYMPS_ROOT . $indexpath);
							echo inner($indexpath . '删除成功！');
						}
					}
				}
			}

			ob_flush();
			flush();
		}
	}

	if ($part == 'channel') {
		$timer->stop();
		echo '<br /><br />共耗时：' . $timer->spent();
	}
}
else {
	exit(inner('您还没有指定需要生成的页面！'));
}

$pluginsettings = NULL;

?>

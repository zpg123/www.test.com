<?php

if (is_array($about_action)) {
	$submit = (in_array($submit, array('一键更新HTML', '开始生成html', '更新主页html', 'makehtml', '开始生成')) ? 'makehtml' : 'delhtml');
	($part == 'about') && $timer->start();

	foreach ($about_action as $k => $val ) {
		if ($val == 'aboutus') {
			$loop = $db->getAll('SELECT id,typename,dir_typename FROM `' . $db_mymps . 'about`');
			$i = 0;

			foreach ($loop as $loops ) {
				$i++;
				$id = $loops[id];
				($submit == 'makehtml') && include MYMPS_ASS . '/' . $val . '.php';
				$filepath = $seo['seo_htmldir'] . '/aboutus/' . $loops['dir_typename'] . $seo['seo_htmlext'];

				if ($submit == 'makehtml') {
					$html_c = $smarty->fetch(mymps_tpl($val, 'smarty'), $val, $id);
					$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
					echo inner('关于我们 => ' . $loops[typename] . ' 文件名 ' . $filepath . ' 生成成功！');
				}
				else {
					if (($submit == 'delhtml') && $filepath) {
						@unlink(MYMPS_ROOT . $filepath);
						echo inner('关于我们 => ' . $loops[typename] . ' 文件名 ' . $filepath . ' 删除成功！');
					}
				}

				if ($i == 1) {
					$indexpath = $seo['seo_htmldir'] . '/' . $val . '/index' . $seo[seo_htmlext];

					if ($submit == 'makehtml') {
						echo copy(MYMPS_ROOT . $filepath, MYMPS_ROOT . $indexpath) ? inner('成功复制' . $filepath . '为' . $indexpath . '!') : inner('复制' . $filepath . '为' . $indexpath . '失败!');
					}
					else {
						if (($submit == 'delhtml') && $indexpath) {
							@unlink(MYMPS_ROOT . $indexpath);
							echo inner('成功删除' . $indexpath . '!');
						}
					}
				}

				ob_flush();
				flush();
			}
		}
		else if ($val == 'faq') {
			$idloop = $db->getAll('SELECT id FROM `' . $db_mymps . 'faq`');
			$i = 0;

			foreach ($idloop as $loop ) {
				$i++;
				$id = $loop[id];
				($submit == 'makehtml') && include MYMPS_ASS . '/' . $val . '.php';
				$filepath = $seo['seo_htmldir'] . '/' . $val . '/' . $id . $seo[seo_htmlext];

				if ($submit == 'makehtml') {
					$html_c = $smarty->fetch(mymps_tpl($val, 'smarty'), $id);
					$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
					echo inner($about_option[$val] . ' ' . $filepath . ' 生成成功！');
				}
				else {
					if (($submit == 'delhtml') && $filepath) {
						@unlink(MYMPS_ROOT . $filepath);
						echo inner($about_option[$val] . ' ' . $filepath . ' 删除成功！');
					}
				}

				if ($i == 1) {
					$indexpath = $seo['seo_htmldir'] . '/' . $val . '/index' . $seo[seo_htmlext];

					if ($submit == 'makehtml') {
						echo copy(MYMPS_ROOT . $filepath, MYMPS_ROOT . $indexpath) ? inner('成功复制' . $filepath . '为' . $indexpath . '!') : inner('复制' . $filepath . '为' . $indexpath . '失败!');
					}
					else {
						if (($submit == 'delhtml') && $indexpath) {
							@unlink(MYMPS_ROOT . $indexpath);
							echo inner('成功删除' . $indexpath . '!');
						}
					}
				}

				ob_flush();
				flush();
			}
		}
		else if (in_array($val, array('friendlink', 'announce'))) {
			($submit == 'makehtml') && include MYMPS_ASS . '/' . $val . '.php';
			$filepath = $seo['seo_htmldir'] . '/' . $val . '/index' . $seo[seo_htmlext];

			if ($submit == 'makehtml') {
				$html_c = $smarty->fetch(mymps_tpl($val, 'smarty'), $val);
				$html_m = $smarty->MakeHtmlFile(MYMPS_ROOT . $filepath, $html_c);
				echo inner($about_option[$val] . ' 文件名 ' . $filepath . ' 生成成功！');
			}
			else {
				if (($submit == 'delhtml') && $filepath) {
					@unlink(MYMPS_ROOT . $filepath);
					echo inner($about_option[$val] . ' 文件 ' . $filepath . ' 删除成功！');
				}
			}

			ob_flush();
			flush();
		}
	}

	if ($part == 'about') {
		$timer->stop();
		echo '<br /><br />共耗时：' . $timer->spent();
	}
}
else {
	exit('您还未指定需要生成的页面！');
}

?>

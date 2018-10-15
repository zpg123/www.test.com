<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?part=cache" class="current">页面缓存</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?part=cache_sys">数据缓存</a></li>' . "\r\n" . '                <li><a href="optimise.php">系统优化</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>注意：启用缓存功能后，在你设定的时间内，系统前台页面显示将不会发生变化</li>' . "\r\n" . '  <li>如您尚未完成系统的配置和初始化安装，建议关闭所有页面的缓存功能</li>' . "\r\n" . '  <li>开启页面缓存功能，可大大提高系统负载能力，具体时间视你的网站访问量而自己拟定 </li>' . "\r\n" . '  <li>当贵站数据量过百万时，强烈建议开启页面缓存 </li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=cache_update" method="post">' . "\r\n" . '<input name="return_url" type="hidden" value="';
echo $return_url;
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">清除页面缓存</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr>' . "\r\n\t" . '<td class="altbg1" valign="center" style="text-align:center;width:15%"><b>选择清除类型</b></td>' . "\r\n\t" . '<td class="altbg2">' . "\r\n\t\r\n\t" . '<label for="smarty_caches"><input checked="checked" name="updatecache[]" value="tpl_caches" type="checkbox" class="checkbox" id="smarty_caches">清除网页缓存文件</label><br />' . "\r\n\t" . '<label for="smarty_compiles"><input checked="checked" name="updatecache[]" value="tpl_compiles" type="checkbox" class="checkbox" id="smarty_compiles">清除模板编译文件</label><br />' . "\r\n\r\n\t" . '</td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="提 交" class="mymps large"></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="clear" style="height:10px;"></div>' . "\r\n" . '<form action="?part=cacheupdate" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="200">缓存前台页面</td>' . "\r\n" . '      <td>缓存时间</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($admin_cache as $k => $a ) {
	echo '<tr bgcolor="#f1f5f8">' . "\r\n" . '      <td align="left">' . "\r\n" . '        <b>';
	echo $admin_cache_array[$k];
	echo ' (';
	echo $k;
	echo ')</b>' . "\r\n" . '       </td>' . "\r\n" . '      <td align="left">&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

	foreach ($a as $q => $w ) {
		if (is_array($w)) {
			echo '    <tr bgcolor="#ffffff">' . "\r\n" . '      <td align="left">' . "\r\n" . '        ';
			echo $w['name'];
			echo ' (';
			echo $q;
			echo ')      </td>' . "\r\n" . '      <td align="left" bgcolor="white">' . "\r\n" . '      <select name="';
			echo $q . '_time';
			echo '">' . "\r\n" . '      ' . "\t";

			foreach ($time_cache as $c => $d ) {
				echo '      ' . "\t" . '<option value="';
				echo $c;
				echo '" ';

				if ($cache[$q][time] == $c) {
					echo 'selected';
				}

				echo '>';
				echo $d;
				echo '</option>' . "\r\n" . '        ';
			}

			echo '      </select>' . "\r\n" . '      </td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
		}
	}
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" type="submit" > ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
echo mymps_admin_tpl_global_foot();

?>

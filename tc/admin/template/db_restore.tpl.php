<?php

include mymps_tpl('inc_head');
echo '<script type=\'text/javascript\' src=\'js/vbm.js\'></script>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '<li>恢复备份数据的同时将覆盖原有数据！！！！</li>' . "\r\n" . '<li>数据恢复功能只能恢复由本系统导出的数据文件</li>' . "\r\n" . '<li>从本地恢复数据需要服务器支持上传并保证数据小于上传上限</li>' . "\r\n" . '<li>如果您使用了分卷备份导入文件卷1其他数据文件会自动导入</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name="cpform" method="post" action="?part=restore&action=dodelete">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td width="50"><input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="CheckAll(this.form)" /><label for="chkall">删?</label></td>' . "\r\n" . '<td>文件名</td>' . "\r\n" . '<td>版本</td>' . "\r\n" . '<td>时间</td>' . "\r\n" . '<td>类型</td>' . "\r\n" . '<td>尺寸</td>' . "\r\n" . '<td>卷数</td>' . "\r\n" . '<td>&nbsp;</td>' . "\r\n" . '</tr>' . "\r\n\r\n";

foreach ($exportlog as $key => $val ) {
	$info = $val[1];
	$info['dateline'] = (is_int($info['dateline']) ? GetTime($info['dateline']) : '未知');
	$info['size'] = sizecount($exportsize[$key]);
	$info['volume'] = count($val);
	$info['method'] = ($info['method'] == 'multivol' ? $lang['db_multivol'] : $lang['db_shell']);
	echo '<tr bgcolor="#ffffff">' . "\r\n" . '<td  width="40"><input class="checkbox" type="checkbox" name="delete[]" value="';
	echo $key;
	echo '"></td>' . "\r\n" . '<td><a href="javascript:;" onclick="javascript:blocknone(\'exportlog_';
	echo $key;
	echo '\')"><img id="menuimg_1" src="template/images/menu_add.gif" align="absmiddle"/> ';
	echo $key;
	echo '</a></td>' . "\r\n" . '<td>';
	echo $info['version'];
	echo '</td>' . "\r\n" . '<td>';
	echo $info['dateline'];
	echo '</td>' . "\r\n" . '<td>';
	echo $backuptype[$info['type']];
	echo '</td>' . "\r\n" . '<td>';
	echo $info['size'];
	echo '</td>' . "\r\n" . '<td>';
	echo $info['volume'];
	echo '</td>' . "\r\n" . '<td>';
	echo '<a class="act" href="?part=restore&from=server&datafile_server=' . $info['filename'] . '&action=dorestore"' . ($info['version'] != $version ? ' onclick="return confirm(\'该备份文件的系统版本与你当前使用的mymps版本不同\');"' : '') . ' class="act">导入</a>';
	echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '<tbody id="exportlog_';
	echo $key;
	echo '" style="display:none">' . "\r\n";

	foreach ($val as $v ) {
		$v['dateline'] = (is_int($v['dateline']) ? GetTime($v['dateline']) : '未知');
		$v['size'] = sizecount($v['size']);
		echo '<tr bgcolor="#ffffff"><td>&nbsp;</td><td><i style="color:#666">';
		echo substr(strrchr($v['filename'], '/'), 1);
		echo '</i></td><td><i style="color:#666">';
		echo $v['version'];
		echo '</i></td><td><i style="color:#666">';
		echo $v['dateline'];
		echo '</i></td><td><i style="color:#666">';
		echo $backuptype[$v['type']];
		echo '</i></td><td><i style="color:#666">';
		echo $v['size'];
		echo '</i></td><td><i style="color:#666">';
		echo $v['volume'];
		echo '#</i></td><td>&nbsp;</td></tr>' . "\r\n";
	}

	echo '</tbody>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '  <input type="submit" name="submit" value="提 交" class="mymps large"/>' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

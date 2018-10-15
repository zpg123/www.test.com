<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n\t\t" . '<li>' . "\r\n\t" . '    数据表优化可以去除数据文件中的碎片，使记录排列紧密，提高读写速度。</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n" . '<div class="mpstopic-category">' . "\r\n\t" . '<div class="panel-tab">' . "\r\n\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t" . '<li><a href="?part=optimize" ';

if ($part == 'optimize') {
	echo 'class="current"';
}

echo '>数据库优化</a></li>' . "\r\n\t\t\t" . '<li><a href="?part=check" ';

if ($part == 'check') {
	echo 'class="current"';
}

echo '>数据库检查</a></li>' . "\r\n\t\t\t" . '<li><a href="?part=repair" ';

if ($part == 'repair') {
	echo 'class="current"';
}

echo '>数据库修复</a></li>' . "\r\n\t\t\t" . '<li><a href="data_replace.php">数据库内容替换</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n";

if ($part == 'optimize') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td>数据表</td><td>类型</td><td>记录数</td><td>数据</td><td>索引</td><td>碎片</td></tr>' . "\r\n";

	foreach ($tablearray as $tp ) {
		$query = $db->query('SHOW TABLE STATUS LIKE \'' . $tp . '%\'', 'SILENT');

		while ($table = $db->fetchRow($query)) {
			if (is_array($optimizetables) && in_array($table['Name'], $optimizetables)) {
				if ($part == 'optimize') {
					$db->query('OPTIMIZE TABLE ' . $table['Name']);
				}
				else if ($part == 'check') {
					$db->query('CHECK TABLE ' . $table['Name']);
				}
				else if ($part == 'repair') {
					$db->query('REPAIR TABLE ' . $table['Name']);
				}
			}

			echo '<tr bgcolor="#ffffff"><td>';
			echo $table[Name];
			echo '</td><td>';
			echo $table[$tabletype];
			echo '</td><td>';
			echo $table[Rows];
			echo '</td><td>';
			echo $table[Data_length];
			echo '</td><td>';
			echo $table[Index_length];
			echo '</td><td>';
			echo $table[Data_free];
			echo '</td></tr>' . "\r\n";
			$totalsize += $table['Data_length'] + $table['Index_length'];
		}
	}

	echo '<tr bgcolor="#ffffff">' . "\r\n\t" . '<td colspan="7">';
	echo sizecount($totalsize);
	echo '</td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($part == 'check') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td>检查</td><td>数据表</td><td>类型</td><td>记录数</td><td>数据</td><td>索引</td></tr>' . "\r\n";

	foreach ($tablearray as $tp ) {
		$query = $db->query('SHOW TABLE STATUS LIKE \'' . $tp . '%\'', 'SILENT');

		while ($table = $db->fetchRow($query)) {
			if (is_array($optimizetables) && in_array($table['Name'], $optimizetables)) {
				$db->query('CHECK TABLE ' . $table['Name']);
				echo '<tr bgcolor="#ffffff"><td><font color="green">成功</font></td><td>';
				echo $table[Name];
				echo '</td><td>';
				echo $table[$tabletype];
				echo '</td><td>';
				echo $table[Rows];
				echo '</td><td>';
				echo $table[Data_length];
				echo '</td><td>';
				echo $table[Index_length];
				echo '</td></tr>' . "\r\n";
			}
		}
	}

	echo '</table>' . "\r\n" . '</div>' . "\r\n";
}
else if ($part == 'repair') {
	echo '<div id="';
	echo MPS_SOFTNAME;
	echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td>修复</td><td>数据表</td><td>类型</td><td>记录数</td><td>数据</td><td>索引</td></tr>' . "\r\n";

	foreach ($tablearray as $tp ) {
		$query = $db->query('SHOW TABLE STATUS LIKE \'' . $tp . '%\'', 'SILENT');

		while ($table = $db->fetchRow($query)) {
			if (is_array($optimizetables) && in_array($table['Name'], $optimizetables)) {
				$db->query('REPAIR TABLE ' . $table['Name']);
				echo '<tr bgcolor="#ffffff"><td><font color="green">成功</font></td><td>';
				echo $table[Name];
				echo '</td><td>';
				echo $table[$tabletype];
				echo '</td><td>';
				echo $table[Rows];
				echo '</td><td>';
				echo $table[Data_length];
				echo '</td><td>';
				echo $table[Index_length];
				echo '</td></tr>' . "\r\n";
			}
		}
	}

	echo '</table>' . "\r\n" . '</div>' . "\r\n";
}

mymps_admin_tpl_global_foot();

?>

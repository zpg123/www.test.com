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

echo '>数据库修复</a></li>' . "\r\n\t\t\t" . '<li><a href="data_replace.php">数据库内容替换</a></li>' . "\r\n\t\t" . '</ul>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=repair" method="post">' . "\r\n" . '<input name="action" value="do_action" type="hidden" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '  <td width="70"><label for="chkall"><input name="chkall" id="chkall" class="checkbox" onclick="AllCheck(\'prefix\', this.form)" checked="checked" type="checkbox" />修复?</label></td><td>数据表</td><td>类型</td><td>记录数</td><td>数据</td><td>索引</td><td>碎片</td></tr>' . "\r\n";

foreach ($tablearray as $tp ) {
	$query = $db->query('SHOW TABLE STATUS LIKE \'' . $tp . '%\'', 'SILENT');

	while ($table = $db->fetchRow($query)) {
		if ($table[$tabletype] == 'MyISAM') {
			$checked = ($table[$tabletype] == 'MyISAM' ? 'checked' : 'disabled');
			echo '<tr bgcolor="#ffffff"><td><input class="checkbox" type="checkbox" name="optimizetables[]" value="';
			echo $table[Name];
			echo '" ';
			echo $checked;
			echo '></td><td>';
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
		}
	}
}

echo '</table>' . "\r\n" . '</div>' . "\r\n\r\n" . '<center><input type="submit" name="repair_submit" value="提 交" class="mymps large"/></center>' . "\r\n\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<form name="form_mymps" action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40">编号</td>' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td width="80">地区排序</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '    </tr>' . "\r\n\r\n";

foreach ($area as $area ) {
	echo "\t" . '  <tr ';

	if ($area[level] == 0) {
		echo 'bgcolor="#f5fbff" ';
	}
	else {
		echo '  bgcolor="#ffffff" ';
	}

	echo '>' . "\r\n\t" . '  <td width="40"><label>';
	echo $area[areaid];
	echo '</label></td>' . "\r\n\t" . '  <td width="60%" align="left">' . "\r\n" . '      <li style="margin-left:';
	echo $area[level];
	echo 'em;" ';

	if ($area['parentid'] != '0') {
		echo 'class="son"';
	}

	echo '><input name="areaorder[';
	echo $area[areaid];
	echo '][areaname]" value="';
	echo $area[areaname];
	echo '" class="text"></li></td>' . "\r\n" . '      <td width="40"><input name="areaorder[';
	echo $area[areaid];
	echo '][areaorder]" value="';
	echo $area[areaorder];
	echo '" class="txt" type="text"/></td>' . "\r\n\t" . '  <td><a href="area.php?part=edit&areaid=';
	echo $area[areaid];
	echo '">编辑</a> / <a href="area.php?part=del&areaid=';
	echo $area[areaid];
	echo '" onClick="if(!confirm(\'确定要删除吗？\\n\\n该操作将同时删除隶属该地区分类的子分类！\'))return false;">删除</a></td>' . "\r\n\t" . '</tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<form name="form_mymps" action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40">删除?</td>' . "\r\n" . '      <td width="40">启用?</td>' . "\r\n" . '      <td width="80">排列顺序</td>' . "\r\n" . '      <td>分类名称</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($cate as $cat ) {
	echo '  <tr ';

	if ($cat['level'] == 0) {
		echo 'bgcolor="#f5fbff" ';
	}
	else {
		echo '  bgcolor="#ffffff" ';
	}

	echo '>' . "\r\n" . '  <td width="60"><input class="checkbox" name="delete[]" value="';
	echo $cat[cate_id];
	echo '" type="checkbox"/></td>' . "\r\n" . '  <td><input class="checkbox" name="cate_view[';
	echo $cat[cate_id];
	echo ']" value="1" type="checkbox" ';

	if ($cat[cate_view] == 1) {
		echo 'checked';
	}

	echo ' /></td>' . "\r\n" . '  <td width="80"><input name="cate_order[';
	echo $cat[cate_id];
	echo ']" value="';
	echo $cat[cate_order];
	echo '" class="txt" type="text"/></td>' . "\r\n" . '  <td><input name="cate_name[';
	echo $cat[cate_id];
	echo ']" class="text" type="text" value="';
	echo $cat[cate_name];
	echo '"></td>' . "\r\n" . '</tr>' . "\r\n";
}

echo '<tbody id="secqaabody" bgcolor="white">' . "\r\n" . '<tr align="center">' . "\r\n" . '   <td>新增:<a href="###" onclick="newnode = $(\'secqaabodyhidden\').firstChild.cloneNode(true); $(\'secqaabody\').appendChild(newnode)">[+]</a></td>' . "\r\n" . '   <td><input type="checkbox" name="newcate_view[]" class="checkbox" value="1" checked="checked"></td>' . "\r\n" . '   <td><input type="text" name="newcate_order[]" class="txt"></td>' . "\r\n" . '   <td><input type="text" name="newcate_name[]" class="text"></td>' . "\r\n" . '</tr>' . "\r\n" . '</tbody>' . "\r\n\r\n" . '<tbody id="secqaabodyhidden" style="display:none">' . "\r\n" . '   <tr align="center" bgcolor="white">' . "\r\n" . '   <td>&nbsp;</td>' . "\r\n" . '   <td><input type="checkbox" name="newcate_view[]" class="checkbox" value="1" checked="checked"></td>' . "\r\n" . '   <td><input type="text" name="newcate_order[]" class="txt"></td>' . "\r\n" . '   <td><input type="text" name="newcate_name[]" class="text"></td>' . "\r\n" . '   </tr>' . "\r\n" . '</tbody>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

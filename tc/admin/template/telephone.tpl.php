<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>生活百宝箱显示在首页底部，显示12个便民电话号码</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?" method="post">' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr style="font-weight:bold; background-color:#dff6ff">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>电话所属商家或行业</td>' . "\r\n" . '      <td>电话号码</td>' . "\r\n" . '      <td>颜色</td>' . "\r\n" . '      <td>是否加粗</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>启用状态</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($telephone as $k => $value ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[id];
	echo '\' id="';
	echo $value[id];
	echo '"></td>' . "\r\n" . '          <td><input class="text" name="edit[';
	echo $value[id];
	echo '][telname]" value="';
	echo $value[telname];
	echo '" /></td>' . "\r\n" . '          <td><input class="text" value="';
	echo $value[telnumber];
	echo '" name="edit[';
	echo $value[id];
	echo '][telnumber]"/></td>' . "\r\n" . '          <td><select name="edit[';
	echo $value[id];
	echo '][color]">' . "\r\n" . '                <option value="">默认颜色</option>' . "\r\n" . '                ';

	foreach ($color as $k ) {
		echo '                <option value="';
		echo $k;
		echo '" ';

		if ($k == $value[color]) {
			echo 'selected';
		}

		echo ' style="background-color:';
		echo $k;
		echo ';"></option>' . "\r\n" . '                ';
	}

	echo '      ' . "\t\t" . '  </select>' . "\r\n" . '          </td>' . "\r\n" . '          <td><select name="edit[';
	echo $value[id];
	echo '][if_bold]">' . "\r\n" . '              <option value="0" ';

	if ($value['if_bold'] != 1) {
		echo 'selected="selected"; style="background-color:#6EB00C;color:white"';
	}

	echo '>不加粗</option>' . "\r\n" . '              <option value="1" ';

	if ($value['if_bold'] == 1) {
		echo 'selected="selected"; style="background-color:#6EB00C;color:white"';
	}

	echo '>加粗</option>' . "\r\n" . '      ' . "\t\t" . '  </select>' . "\r\n" . '          </td>' . "\r\n" . '          <td><input name="edit[';
	echo $value[id];
	echo '][displayorder]" value="';
	echo $value[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '          <td><select name="edit[';
	echo $value[id];
	echo '][if_view]">';
	echo get_ifview_options($value[if_view]);
	echo '</select></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center"><b>新增</b></td>' . "\r\n" . '      <td><input name="add[telname]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><input name="add[telnumber]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><select name="add[color]" style="float:left">' . "\r\n" . '              <option value="">默认颜色</option>' . "\r\n" . '               ';
echo get_color_options();
echo '      ' . "\t\t" . '  </select></td>' . "\r\n" . '      <td><select name="add[if_bold]">' . "\r\n" . '              <option value="0">不加粗</option>' . "\r\n" . '              <option value="1">加粗</option>' . "\r\n" . '      ' . "\t\t" . '  </select></td>' . "\r\n" . '      <td><input name="add[displayorder]" value="0" type="text" class="txt"/></td>' . "\r\n" . '      <td><select name="add[if_view]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" name="';
echo CURSCRIPT;
echo '_submit" type="submit"> &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>  ' . "\r\n";
mymps_admin_tpl_global_foot();

?>

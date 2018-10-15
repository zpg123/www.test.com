<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>生活百宝箱显示在首页的第一屏右侧，显示最新的24个文字链接，每个连接文字建议5个汉字以内</li>' . "\r\n" . ' <li>链接类型选为直接跳转，当打开页面时将至将跳转到该链接地址</li>' . "\r\n" . ' <li>填写站外链接，请确认链接地址包含http://</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="?part=service" method="post">' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden"/>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr style="font-weight:bold; background-color:#dff6ff">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>链接文字</td>' . "\r\n" . '      <td>类型</td>' . "\r\n" . '      <td>链接URL地址</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>启用状态</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($lifebox as $k => $value ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[id];
	echo '\' id="';
	echo $value[id];
	echo '"></td>' . "\r\n" . '          <td><input class="text" name="edit[';
	echo $value[id];
	echo '][lifename]" value="';
	echo $value[lifename];
	echo '" /> <a href="../lifebox.php?id=';
	echo $value['id'];
	echo '" target="_blank">预览 &raquo;</a></td>' . "\r\n" . '          <td><select name="edit[';
	echo $value[id];
	echo '][typeid]">' . "\r\n" . '      ';
	echo get_servtype_options($value[typeid]);
	echo '      </select></td>' . "\r\n" . '          <td><input class="text" value="';
	echo $value[lifeurl];
	echo '" name="edit[';
	echo $value[id];
	echo '][lifeurl]"/></td>' . "\r\n" . '          <td ><input name="edit[';
	echo $value[id];
	echo '][displayorder]" value="';
	echo $value[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '          <td><select name="edit[';
	echo $value[id];
	echo '][if_view]">';
	echo get_ifview_options($value[if_view]);
	echo '</select></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center"><b>新增</b></td>' . "\r\n" . '      <td><input name="add[lifename]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><select name="add[typeid]">';
echo get_servtype_options($typeid);
echo '</select></td>' . "\r\n" . '      <td><input name="add[lifeurl]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><input name="add[displayorder]" value="0" type="text" class="txt"/></td>' . "\r\n" . '      <td><select name="add[if_view]">' . "\r\n" . '      ';
echo get_ifview_options(2);
echo '      </select></td>' . "\r\n" . '    </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input class="mymps large" value="提 交" name="';
echo CURSCRIPT;
echo '_submit" type="submit"> &nbsp;' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

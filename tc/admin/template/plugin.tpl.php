<?php

include mymps_tpl('inc_head');
echo '<!--<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">相关说明</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . ' <li>插件目录是相对于/plugin目录下，安装新插件之前，请将插件目录上传至/plugin目录下</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>-->' . "\r\n";

if ($mymps_global['cfg_if_corp'] != 1) {
	echo '<div class="ccc2">' . "\r\n" . '    <ul>' . "\r\n" . '        <img src="../images/warn.gif" align="absmiddle"> 提示：当前你的<font color="red">商家功能已经关闭，团购插件，优惠券插件，商品插件已自动被禁用</font>，您可以在<a href="config.php">系统配置 -> 会员相关设置</a>里开启商家功能' . "\r\n" . '    </ul>' . "\r\n" . '</div>' . "\r\n" . '<div class="clear"></div>' . "\r\n";
}

echo '<form action="?part=list" method="post">' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr style="font-weight:bold; background-color:#dff6ff">' . "\r\n" . '      <td>编号</td>' . "\r\n" . '      <td>状态</td>' . "\r\n" . '      <td>名称</td>' . "\r\n" . '      <td>标识</td>' . "\r\n" . '      <td>目录</td>' . "\r\n" . '      <td>版本</td>' . "\r\n\t" . '  <td>核心</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($plugin as $list ) {
	echo '    <tr bgcolor="white">' . "\r\n" . '     ' . "\t" . '<td><i>';
	echo $list[id];
	echo '.</i></td>' . "\r\n\t\t" . '<td>';

	if ($list[disable] == 1) {
		echo '<font color="red">&times;</font>';
	}
	else {
		echo '<font color="green">√</font>';
	}

	echo '</td>' . "\r\n" . '        <td><b>';
	echo $list[name];
	echo '</b></td>' . "\r\n" . '        <td>';
	echo $list[flag];
	echo '</td>' . "\r\n" . '        <td>';
	echo $list[directory];
	echo '</td>' . "\r\n\t\t" . '<td>';
	echo $list[version];
	echo '</td>' . "\r\n" . '        <td>';
	echo $list[iscore] == 1 ? '√' : '—';
	echo '</td>' . "\r\n" . '        <td align="left">';

	if ($list[iscore] != 1) {
		echo '<a href="plugin.php?op=edit&id=';
		echo $list[id];
		echo '">配置</a> | <a href="../';
		echo $list[flag];
		echo '.php" target="_blank">预览首页</a> | ';

		if ($list[disable] == 0) {
			echo '<a href="?op=disable&id=';
			echo $list[id];
			echo '" style="color:red; text-decoration:underline;">禁用&raquo;</a>';
		}
		else {
			echo '<a href="?op=able&id=';
			echo $list[id];
			echo '" style="color:green; text-decoration:underline;">启用&raquo;</a>';
		}

		echo ' ';
	}
	else {
		echo 'N/A';
	}

	echo '</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo "\t" . '<!--<tr bgcolor="#FFFFFF" valign="top">' . "\r\n" . '      <td align="center"><b>安装</b></td>' . "\r\n" . '      <td bgcolor="#f5fbff" ><input name="add[name]" value="" type="text" class="text" style="width:100px"/></td>' . "\r\n" . '      <td><input name="add[flag]" value="" type="text" class="text" style="width:100px"/></td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="add[directory]" type="text" class="text" style="width:100px; margin-bottom:2px"><br />相对/plugin目录</td>' . "\r\n" . '      <td><input name="add[version]" type="text" class="text" style="width:100px"></td>' . "\r\n" . '      <td bgcolor="#f5fbff"><input name="add[author]" type="text" class="text" style="width:100px"></td>' . "\r\n" . '      <td colspan="3"> -> 请先将插件目录上传至/plugin目录下</td>' . "\r\n" . '    </tr>-->' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" value="更新插件缓存" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

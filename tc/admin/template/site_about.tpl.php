<?php

include mymps_tpl('inc_head');
echo '  <form action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td valign="top">栏目名称</td>' . "\r\n" . '      <td>栏目路径</td>' . "\r\n" . '      <td valign="top">栏目顺序</td>' . "\r\n" . '      <td valign="top">编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';

foreach ($about_type as $row ) {
	echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $row[id];
	echo '\' id="';
	echo $row[id];
	echo '"></td>' . "\r\n" . '      <td valign="top" bgcolor="white">';
	echo $row[typename];
	echo '</td>' . "\r\n" . '      <td align="center">';
	echo $row[dir_typename];
	echo '</td>' . "\r\n" . '      <td align="center" bgcolor="white"><input name="displayorder[';
	echo $row[id];
	echo ']" value="';
	echo $row[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '      <td align="center"><a href="?part=';
	echo $part;
	echo '&id=';
	echo $row[id];
	echo '">详情</a></td>' . "\r\n" . '    </tr>' . "\r\n" . '    ';
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="site_about_submit" value="提 交" class="mymps large"></center>' . "\r\n" . '</form>' . "\r\n" . '<form action="site_about.php?part=edit" method="post">' . "\r\n" . '<input type="hidden" name="id" value="';
echo $id;
echo '">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="margin-top:10px; clear:both">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">';
echo !$id ? '新增' : '修改';
echo '栏目</td>' . "\r\n" . '</tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="12%" height="25">栏目名称：</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input name="typename" value="';
echo $about[typename];
echo '" class="text"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="12%" height="25">栏目顺序：</td>' . "\r\n" . '    <td>' . "\r\n" . '    <input name="displayorder" value="';
echo $about[displayorder];
echo '" class="txt"/>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '<tr bgcolor="#f5fbff">' . "\r\n" . '  <td>路径存放形式：<br /><i style="color:#666">生成静态文件时生效</i> </td>' . "\r\n" . '  <td>';
echo GetHtmlType($about[dir_type], 'dir_type', 'edit', $about[dir_typename]);
echo ' </td>' . "\r\n" . '</tr>' . "\r\n" . '</table>' . "\r\n" . '<div style="margin-top:3px;">' . "\r\n";
echo $acontent;
echo '</div>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="site_about_submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '  </form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

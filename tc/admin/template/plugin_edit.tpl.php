<?php

include mymps_tpl('inc_head');
echo '<form action="plugin.php" method="post" name="form1">' . "\r\n" . '<input name="op" value="edit" type="hidden">' . "\r\n" . '<input name="id" value="';
echo $id;
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table width="100%" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '        <td colspan="5">' . "\r\n" . '       ' . "\t\t" . '插件详情 - ';
echo $edit['name'];
echo '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tbody id="menu_1">' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">插件名称</td>' . "\r\n" . '        <td><input name="name" value="';
echo $edit[name];
echo '" class="text" type="text"></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">插件标识</td>' . "\r\n" . '        <td>';
echo $edit['flag'];
echo '</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">插件目录</td>' . "\r\n" . '        <td>/plugin/';
echo $edit['directory'];
echo '</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">版本</td>' . "\r\n" . '        <td>';
echo $edit['version'];
echo '</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td width="19%" height="25">作者</td>' . "\r\n" . '        <td>';
echo $edit['author'];
echo '    ' . "\r\n\t\t" . '</td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">发布时间</td>' . "\r\n" . '        <td>';
echo GetTime($edit['releasetime']);
echo ' </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '        <td colspan="5">' . "\r\n" . '            前台设置' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">显示标题</td>' . "\r\n" . '        <td><input name="config[seotitle]" value="';
echo $edit[config][seotitle];
echo '" class="text" type="text"></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">meta keywords（关键词）</td>' . "\r\n" . '        <td><input name="config[seokeywords]" value="';
echo $edit[config][seokeywords];
echo '" class="text" type="text"></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">meta description（描述）</td>' . "\r\n" . '        <td><textarea name="config[seodescription]" style="width:300px; height:100px">';
echo $edit[config][seodescription];
echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr class="firstr">' . "\r\n" . '        <td colspan="5">' . "\r\n" . '            菜单设置' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">管理中心菜单<br /><i style="color:#666">非必要，请勿修改（<font color="red">重要</font>）</i></td>' . "\r\n" . '        <td><textarea name="config[adminmenu]" style="width:300px; height:100px">';
echo $edit[config][adminmenu];
echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  ';

if ($edit['flag'] == 'goods') {
	echo "\t" . '  <tr class="firstr">' . "\r\n" . '        <td colspan="5">' . "\r\n" . '            公用信息' . "\r\n" . '        </td>' . "\r\n" . '      </tr>' . "\r\n" . '      <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">配送与取货</td>' . "\r\n" . '        <td><textarea name="config[quhuo]" style="width:300px; height:100px">';
	echo $edit[config][quhuo];
	echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">付款方式</td>' . "\r\n" . '        <td><textarea name="config[fukuan]" style="width:300px; height:100px">';
	echo $edit[config][fukuan];
	echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '        <td height="25">售后服务</td>' . "\r\n" . '        <td><textarea name="config[service]" style="width:300px; height:100px">';
	echo $edit[config][service];
	echo '</textarea></td>' . "\r\n" . '      </tr>' . "\r\n\t" . '  ';
}

echo '      </tbody>' . "\r\n" . '      </table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="plugin_submit" value="提 交" class="mymps large" /></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

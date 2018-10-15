<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="member_tpl.php" class="current">空间模板</a></li>' . "\r\n\t\t\t\t" . '<li><a href="member_comment.php">空间点评</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <tr class="firstr">' . "\r\n" . '  ' . "\t" . '<td colspan="2">技巧提示</td>' . "\r\n" . '  </tr>' . "\r\n" . '  <tr bgcolor="#ffffff">' . "\r\n" . '    <td id="menu_tip">' . "\r\n" . '  <li>模板尾部默认都含有五个文字链接导航【需要在模板里面修改】 关于我们 - 网站公告 - 帮助中心 - 友情链接 - 网站留言</li>' . "\r\n" . '  <li>您可以在这里增加其他尾部导航，他们将与以上导航并列显示</li>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?\'>' . "\r\n" . '<input name="forward_url" value="';
echo GetUrl();
echo '" type="hidden">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '    <table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>' . "\r\n" . '      <td>模板名称</td>' . "\r\n" . '      <td>模板路径/标识</td>' . "\r\n" . '      <td>显示顺序</td>' . "\r\n" . '      <td>启用状态</td>' . "\r\n" . '      <td>修改时间</td>' . "\r\n" . '      <td>编辑</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tr bgcolor="#dff6ff">' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '      <td>个人会员模板</td>' . "\r\n" . '      <td>/template/spaces/person/</td>' . "\r\n" . '      <td colspan="4" >&nbsp;</td>' . "\r\n" . '      </tr>' . "\r\n" . '    ';

foreach ($list as $k => $value ) {
	echo '        <tr bgcolor="white">' . "\r\n" . '          <td><input class="checkbox" type=\'checkbox\' name=\'delids[]\' value=\'';
	echo $value[id];
	echo '\' id="';
	echo $value[id];
	echo '"></td>' . "\r\n" . '          <td>';
	echo $value[tpl_name];
	echo '</td>' . "\r\n" . '          <td>/template/spaces/store/<b style="color:red">';
	echo $value[tpl_path];
	echo '</b>/</td>' . "\r\n" . '          <td><input name="displayorder[';
	echo $value[id];
	echo ']" value="';
	echo $value[displayorder];
	echo '" type="text" class="txt"/></td>' . "\r\n" . '          <td>';
	echo $if_view[$value[if_view]];
	echo '</td>' . "\r\n" . '          <td>';
	echo GetTime($value[edittime]);
	echo '</td>' . "\r\n" . '          <td><a href="?part=edit&id=';
	echo $value[id];
	echo '">详情</a></td>' . "\r\n" . '        </tr>' . "\r\n" . '    ';
}

echo '    <tr bgcolor="#f5fbff">' . "\r\n" . '      <td align="center"><b>新增</b></td>' . "\r\n" . '      <td><input name="add[tpl_name]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><input name="add[tpl_path]" value="" type="text" class="text"/></td>' . "\r\n" . '      <td><input name="add[displayorder]" value="" type="text" class="txt"/></td>' . "\r\n" . '      <td><select name="add[if_view]">' . "\r\n" . '      ';
echo get_ifview_options('2');
echo '      </select></td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '      <td>&nbsp;</td>' . "\r\n" . '    </tr>' . "\r\n" . '    </table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" value="提 交" class="mymps large" name="';
echo CURSCRIPT;
echo '_submit"/>  ' . "\r\n" . '</center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

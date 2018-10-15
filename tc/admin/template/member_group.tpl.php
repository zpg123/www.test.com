<?php

include mymps_tpl('inc_head');
echo '<div id="';
echo MPS_SOFTNAME;
echo '" style="padding-bottom:0">' . "\r\n\t" . '<div class="mpstopic-category">' . "\r\n\t\t" . '<div class="panel-tab">' . "\r\n\t\t\t" . '<ul class="clearfix tab-list">' . "\r\n\t\t\t\t" . '<li><a href="?do=group" ';

if ($part == 'list') {
	echo 'class="current"';
}

echo '>会员组类型</a></li>' . "\r\n\t\t\t\t" . '<li><a href="?do=group&part=add" ';

if ($part == 'add') {
	echo 'class="current"';
}

echo '>增加会员组</a></li>' . "\r\n\t\t\t" . '</ul>' . "\r\n\t\t" . '</div>' . "\r\n\t" . '</div>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="60">组编号</td>' . "\r\n" . '      <td width="80">组名称</td>' . "\r\n" . '      <td width="80">属性</td>' . "\r\n" . '      <td>管理</td>' . "\r\n" . '    </tr>' . "\r\n";

foreach ($group as $row ) {
	echo '    <tr align="center" bgcolor="#f5fbff">' . "\r\n" . '      <td> ' . "\r\n" . '        ';
	echo $row[id];
	echo '      </td>' . "\r\n" . '      <td>' . "\r\n" . '      ' . "\t";
	echo $row[levelname];
	echo '      </td>' . "\r\n" . '      <td>' . "\r\n" . '      ' . "\t";

	if ($row[ifsystem] == '1') {
		echo '<font color=red>系统组</font>';
	}
	else {
		echo '<font color=green>自定义组</font>';
	}

	echo '      </td>' . "\r\n" . '      <td>' . "\r\n" . '        <a href=\'member.php?do=group&part=edit&id=';
	echo $row[id];
	echo '\'>编辑</a> / ' . "\r\n" . '      ' . "\t" . '<a href=\'member.php?do=member&levelid=';
	echo $row[id];
	echo '\'>组用户</a>' . "\r\n" . '      ';

	if ($row[ifsystem] != 1) {
		echo ' / <a href=\'?do=group&part=delete&id=';
		echo $row[id];
		echo '\' onClick="return confirm(\'您确定要删除该用户组吗，如不确定请点取消\')">删除组</a>';
	}

	echo '      </td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<form action="member.php?part=levelup" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '" style="margin-top:10px; clear:both">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '<tr class="firstr">' . "\r\n" . '<td colspan="2">会员自助升级页面提示信息</td>' . "\r\n" . '</tr>' . "\r\n" . '  <tr bgcolor="#f5fbff">' . "\r\n" . '    <td width="12%" height="25">提示内容：</td>' . "\r\n" . '    <td>' . "\r\n" . '   ' . "\t" . '<textarea name="levelup_notice" style="width:250px; height:120px">';
echo $levelup_notice;
echo '</textarea>' . "\r\n" . '    </td>' . "\r\n" . '  </tr>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input type="submit" name="member_submit" value="提 交" class="mymps large"/></center>' . "\r\n" . '  </form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

<?php

include mymps_tpl('inc_head');
echo '<form name="form_mymps" action="?part=list" method="post">' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="40">编号</td>' . "\r\n" . '      <td>分类名称</td>' . "\r\n" . '      <td width="80">分类排序</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '    </tr>' . "\r\n\r\n";

foreach ($corp as $corp ) {
	echo "\t" . '  <tr ';

	if ($corp[level] == 0) {
		echo 'bgcolor="#f5fbff" ';
	}
	else {
		echo '  bgcolor="#ffffff" ';
	}

	echo '>' . "\r\n\t" . '  <td width="40"><label>';
	echo $corp[corpid];
	echo '</label></td>' . "\r\n\t" . '  <td width="60%" align="left">' . "\r\n" . '      <li style="margin-left:';
	echo $corp[level];
	echo 'em;" ';

	if ($corp['parentid'] != '0') {
		echo 'class="son"';
	}

	echo '><a href="../corporation.php?catid=';
	echo $corp[corpid];
	echo '" ';

	if ($corp[level] == 0) {
		echo 'style="font-weight:bold" ';
	}

	echo ' target="_blank">';
	echo $corp[corpname];
	echo '</a></li></td>' . "\r\n" . '      <td width="40"><input name="corporder[';
	echo $corp[corpid];
	echo ']" value="';
	echo $corp[corporder];
	echo '" class="txt" type="text"/></td>' . "\r\n\t" . '  <td><a href="corp.php?part=edit&corpid=';
	echo $corp[corpid];
	echo '">编辑</a> / <a href="corp.php?part=del&corpid=';
	echo $corp[corpid];
	echo '" onClick="if(!confirm(\'确定要删除该商家分类吗？\\n\\n该操作将删除隶属该商家分类的子分类！\'))return false;">删除</a></td>' . "\r\n\t" . '</tr>' . "\r\n";
}

echo '</table>' . "\r\n" . '</div>' . "\r\n" . '<center><input name="';
echo CURSCRIPT;
echo '_submit" type="submit" value="提交" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

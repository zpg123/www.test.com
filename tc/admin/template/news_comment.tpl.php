<?php

include mymps_tpl('inc_head');
echo '<script type="text/javascript" src="../template/global/messagebox.js"></script>' . "\r\n" . '<div class="ccc2">' . "\r\n" . '<ul>' . "\r\n" . '      <form action="?" method="get">' . "\r\n" . '         关键字' . "\r\n" . ' ' . "\t\t" . '<input name="keywords" type="text" class="text" size="40" value="';
echo $keywords;
echo '">' . "\r\n" . '        <label for="c0"><input name="comment_level" class="radio" type="radio" value="0" ';

if ($_GET[comment_level] == 0) {
	echo 'checked';
}

echo ' id=c0>待审 </label>' . "\r\n" . '        <label for="c1"><input name="comment_level" class="radio" type="radio" value="1" ';

if ($_GET[comment_level] == 1) {
	echo 'checked';
}

echo ' id=c1>正常 </label>' . "\r\n" . '         <input type="submit" class="mymps mini" value="检索评论">' . "\r\n" . '       </form>' . "\r\n\t" . '</ul>' . "\r\n" . '</div>' . "\r\n" . '<form name=\'form1\' method=\'post\' action=\'?part=';
echo $part;
echo '\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '<input name="url" type="hidden" value="';
echo GetUrl();
echo '">' . "\r\n" . '<input name="action" type="hidden" value="delall" />' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="30">选择</td>' . "\r\n" . '      <td width="30">编号</td>' . "\r\n" . '      <td>评论人</td>' . "\r\n" . '      <td>评论内容</td>' . "\r\n" . '      <td>评论时间</td>' . "\r\n" . '      <td>评论对象</td>' . "\r\n" . '      <td>评论状态</td>' . "\r\n" . '      <td>相关操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tbody  onmouseover="addMouseEvent(this);">' . "\r\n\t";

foreach ($comment as $v ) {
	echo '    <tr align="center" bgcolor="#f5fbff">' . "\r\n" . '      <td><input type=\'checkbox\' name=\'id[]\' value=\'';
	echo $v[id];
	echo '\' class=\'checkbox\' id="';
	echo $v[id];
	echo '"></td>' . "\r\n" . '      <td bgcolor="white">';
	echo $v[id];
	echo '</td>' . "\r\n\t" . '  <td>';
	echo $v[userid];
	echo '</td>' . "\r\n\t" . '  <td bgcolor="white">';
	echo $v[content];
	echo '</td>' . "\r\n" . '      <td>';
	echo $v[pubtime];
	echo '</td>' . "\r\n" . '      <td bgcolor="white">';
	echo $v[title];
	echo '</td>' . "\r\n" . '      <td>';
	echo $v[comment_level];
	echo '</td>' . "\r\n" . '      <td bgcolor="white"><a href="?part=';
	echo $part;
	echo '&action=del&id=';
	echo $v[id];
	echo '" onClick="return confirm(\'您确定要删除吗，如不确定请点取消\')">删除</a></td>' . "\r\n" . '    </tr>' . "\r\n";
}

echo '    </tbody>' . "\r\n" . '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">' . "\r\n" . '    <label for="delall"><input class="radio" type="radio" value="delall" id="delall" name="action">批量删除</label> ' . "\r\n" . '    <label for="level0"><input class="radio" type="radio" value="level0" id="level0" name="action">转为待审</label> ' . "\r\n" . '    <label for="level1"><input class="radio" type="radio" value="level1" id="level1"name="action">转为正常</label> ' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<center>' . "\r\n" . '<input type="submit" onClick="if(!confirm(\'确定要操作吗？\'))return false;" value="执行操作" class="mymps large"/></center>' . "\r\n" . '</form>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>' . "\r\n";
mymps_admin_tpl_global_foot();

?>

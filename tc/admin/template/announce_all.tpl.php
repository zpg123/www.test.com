<?php

include mymps_tpl('inc_head');
echo '<div class="ccc2">' . "\r\n\t" . '<ul>' . "\r\n" . '      <form action="announce.php?part=all" method="get">' . "\r\n" . '      标题 ' . "\r\n" . '        <input name="title" class="text" type="text" size="30" value="';
echo $title;
echo '"> ' . "\r\n" . '        作者 ' . "\r\n" . '        <input name="author" class="text" type="text" size="15" value="';
echo $author;
echo '">　<input type="submit" value="检索公告" class="gray mini"> &nbsp;&nbsp;<input type="button" class="mymps mini" onClick="location.href=\'announce.php?part=add\'" value="发布公告">' . "\r\n" . '       </form>' . "\r\n\t" . '</ul>' . "\r\n" . '</div>' . "\r\n" . '<div id="';
echo MPS_SOFTNAME;
echo '">' . "\r\n" . '<table border="0" cellspacing="0" cellpadding="0" class="vbm">' . "\r\n" . '  <form name=\'form1\' method=\'post\' action=\'announce.php\' onSubmit=\'return checkSubmit();\'>' . "\r\n" . '    <input type=\'hidden\' name=\'part\' value=\'delall\'/>' . "\r\n" . '    <input type="hidden" name="url" value="';
echo GetUrl();
echo '" />' . "\r\n" . '    <tr class="firstr">' . "\r\n" . '      <td width="30">选择</td>' . "\r\n" . '      <td width="30">编号</td>' . "\r\n" . '      <td>公告标题</td>' . "\r\n" . '      <td>公告作者</td>' . "\r\n" . '      <td>起始时间</td>' . "\r\n" . '      <td>截止时间</td>' . "\r\n" . '      <td>添加时间</td>' . "\r\n" . '      <td>操作</td>' . "\r\n" . '    </tr>' . "\r\n" . '    <tbody onmouseover="addMouseEvent(this);">' . "\r\n\t";

foreach ($announce as $announce ) {
	echo "\t" . '<tr bgcolor="white">' . "\r\n" . '   ' . "\t" . '  <td><input type=\'checkbox\' class="checkbox" name=\'id[]\' value=\'';
	echo $announce[id];
	echo '\' id="';
	echo $announce[id];
	echo '"></td>' . "\r\n\t" . '  <td><label>';
	echo $announce[id];
	echo '</label></td>' . "\r\n\t" . '  <td align="left"><a href="../about.php?part=announce#';
	echo $announce[id];
	echo '" target="_blank">';
	echo $announce[title];
	echo '</a></td>' . "\r\n" . '      <td align="left">';
	echo $announce[author];
	echo '</td>' . "\r\n" . '      <td align="left"><em>';
	echo GetTime($announce[begintime]);
	echo '</em></td>' . "\r\n" . '      <td align="left"><em>';
	echo GetTime($announce[endtime]);
	echo '</em></td>' . "\r\n" . '      <td align="left">';
	echo GetTime($announce[pubdate]);
	echo '</td>' . "\r\n\t" . '  <td align="center"><a href="announce.php?part=edit&id=';
	echo $announce[id];
	echo '">编辑</a> / <a href="announce.php?part=delete&id=';
	echo $announce[id];
	echo '&url=';
	echo GetUrl();
	echo '" onClick="if(!confirm(\'确定要删除吗？\\n\\n此操作不可以恢复！\'))return false;">删除</a>' . "\r\n\t" . '  </td>' . "\r\n\t" . '</tr>' . "\r\n\t";
}

echo '    </tbody>' . "\r\n" . '    <tr bgcolor="#ffffff" height="28">' . "\r\n" . '    <td align="center" style="border-right:1px #fff solid;"><input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)" class="checkbox"/></td>' . "\r\n" . '    <td colspan="10">　' . "\r\n" . '<input type="submit" onClick="if(!confirm(\'确定要操作吗？\\n\\n此操作不可以恢复！\'))return false;" value="批量删除" class="mymps mini"/>      ' . "\r\n" . '    </td>' . "\r\n" . '    </tr>' . "\r\n" . '  </form>' . "\r\n" . '</table>' . "\r\n" . '</div>' . "\r\n" . '<div class="pagination">';
echo page2();
echo '</div>  ' . "\r\n";
mymps_admin_tpl_global_foot();

?>
